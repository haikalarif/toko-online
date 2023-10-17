<?php

class Model_invoice extends CI_Model
{
    public function index()
    {
        date_default_timezone_set('Asia/Jakarta');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');

        $invoice = array(
            'nama' => $nama,
            'alamat' => $alamat,
            'tgl_pesan' => date('Y-m-d H:i:s'),
            'batas_bayar' => date('Y-m-d H:i:s', mktime(date('H'), date('i'), date('s'), date('m'), date('d') + 1, date('Y')))
        );
        $this->db->insert('tb_invoice', $invoice);
        $id_invoice = $this->db->insert_id();

        foreach ($this->cart->contents() as $item) {
            $data = array(
                'id_invoice' => $id_invoice,
                'id_brg' => $item['id'],
                'nama_brg' => $item['name'],
                'jumlah' => $item['qty'],
                'harga' => $item['price'],
            );
            $this->db->insert('tb_pesanan', $data);
        }
        return TRUE;
    }

    public function insert_invoice($table, $data)
    {
        $insert = $this->db->insert($table, $data);
        return $insert ? true : false;
    }

    public function insert_pesanan($table, $data)
    {
        $insert = $this->db->insert($table, $data);
        return $insert ? true : false;
    }

    public function tampil_data()
    {
        $this->db->select('tb_pesanan.*, tb_metode.nama_metode, tb_barang.gambar, tb_barang.keterangan, tb_invoice.nama, tb_invoice.alamat, tb_invoice.tgl_pesan, tb_invoice.batas_bayar, tb_user.nama AS nama_user');
        $this->db->from('tb_pesanan');
        $this->db->join('tb_metode', 'tb_pesanan.metode_id = tb_metode.id', 'left');
        $this->db->join('tb_barang', 'tb_pesanan.id_brg = tb_barang.id', 'left');
        $this->db->join('tb_invoice', 'tb_pesanan.id_invoice = tb_invoice.id', 'left');
        $this->db->join('tb_user', 'tb_pesanan.user_id = tb_user.id', 'left');

        $result = $this->db->get();

        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return FALSE;
        }
    }

    public function ambil_id_invoice($id_invoice)
    {
        $result = $this->db->where('id', $id_invoice)->limit(1)->get('tb_invoice');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return false;
        }
    }

    public function ambil_id_pesanan($id_invoice)
    {
        $result = $this->db->where('id_invoice', $id_invoice)->get('tb_pesanan');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }

    public function jumlah_data()
    {
        $result = $this->db->get('tb_invoice');
        if ($result->num_rows() > 0) {
            return $result->num_rows();
        } else {
            return FALSE;
        }
    }

    function get_pesanan()
    {
        return $this->db->get('tb_pesanan');
    }

    public function get_filter_user($limit = null, $offset = null, $filtering = null)
    {
        $this->db->select('*, tb_pesanan.id AS id_pesanan, tb_metode.nama_metode, tb_barang.gambar');
        $this->db->from('tb_pesanan');
        $this->db->join('tb_metode', 'tb_pesanan.metode_id = tb_metode.id', 'left');
        $this->db->join('tb_barang', 'tb_pesanan.id_brg = tb_barang.id', 'left');
        $this->db->where($filtering);

        if ($limit) $this->db->limit($limit, $offset);

        return $this->db->get();
    }

    public function update($where, $data, $table)
    {
        $this->db->where($where);

        $update = $this->db->update($table, $data);
        return $update ? true : false;
    }

    public function detail_pesanan($id)
    {
        $this->db->select('tb_pesanan.*, tb_metode.nama_metode, tb_barang.gambar, tb_barang.keterangan, tb_invoice.nama, tb_invoice.alamat, tb_invoice.tgl_pesan');
        $this->db->from('tb_pesanan');
        $this->db->join('tb_metode', 'tb_pesanan.metode_id = tb_metode.id', 'left');
        $this->db->join('tb_barang', 'tb_pesanan.id_brg = tb_barang.id', 'left');
        $this->db->join('tb_invoice', 'tb_pesanan.id_invoice = tb_invoice.id', 'left');
        $this->db->where('tb_pesanan.id', $id);

        $result = $this->db->get();

        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }
}
