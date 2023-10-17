<?php

class Model_barang extends CI_Model
{
    public function get_data()
    {
        return $this->db->get('tb_barang');
    }

    public function tampil_data()
    {
        $this->db->select('*, tb_kategori.nama');
        $this->db->from('tb_barang');
        $this->db->join('tb_kategori', 'tb_barang.kategori = tb_kategori.id_kategori', 'left');

        return $this->db->get();
    }

    public function tambah_barang($data, $table)
    {
        $insert = $this->db->insert($table, $data);
        return $insert ? true : false;
    }

    public function edit_barang($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $update = $this->db->update($table, $data);
        return $update ? true : false;
    }

    public function hapus_data($where, $table)
    {
        $this->db->where($where);

        $delete = $this->db->delete($table);
        return $delete ? true : false;
    }

    public function find($id)
    {
        $result = $this->db->where('id', $id)
            ->limit(1)
            ->get('tb_barang');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }

    public function detail_brg($id)
    {
        $this->db->select('tb_barang.*, tb_kategori.nama');
        $this->db->from('tb_barang');
        $this->db->join('tb_kategori', 'tb_barang.kategori = tb_kategori.id_kategori', 'left');
        $this->db->where('tb_barang.id', $id);

        $result = $this->db->get();

        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }

    public function get_chart_data()
    {
        $this->db->select('kategori, COUNT(*) as jumlah_barang');
        $this->db->from('tb_barang');
        $this->db->group_by('kategori');

        $query = $this->db->get();

        $data = array(
            'kategori' => array(),
            'data' => array()
        );

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data['categories'][] = $row->kategori;
                $data['data'][] = (int) $row->jumlah_barang;
            }
        }

        return $data;
    }

    public function get_chart_datas()
    {
        // $this->db->select('tb_barang.kategori, COUNT(tb_pesanan.id_brg) as jumlah_terjual, tb_kategori.nama');
        // $this->db->from('tb_pesanan');
        // $this->db->join('tb_barang', 'tb_pesanan.id_brg = tb_barang.id', 'left');
        // $this->db->join('tb_kategori', 'tb_barang.kategori = tb_kategori.id_kategori', 'left');
        // $this->db->group_by('tb_barang.kategori');

        $this->db->select('tb_kategori.nama AS nama_kategori, COUNT(tb_pesanan.id_brg) AS jumlah_terjual');
        $this->db->from('tb_pesanan');
        $this->db->join('tb_barang', 'tb_pesanan.id_brg = tb_barang.id', 'left');
        $this->db->join('tb_kategori', 'tb_barang.kategori = tb_kategori.id_kategori', 'left');
        $this->db->group_by('tb_kategori.nama');

        $query = $this->db->get();

        $data = array(
            'labels' => array(),
            'datas' => array()
        );

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data['labels'][] = $row->nama_kategori;
                $data['datas'][] = (int) $row->jumlah_terjual;
            }
        }

        return $data;
    }
}
