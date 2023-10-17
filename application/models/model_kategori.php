<?php

class Model_kategori extends CI_Model
{
    public function data_elektronik()
    {
        return $this->db->get_where("tb_barang", array('kategori' => 1));
    }

    public function data_pakaian_pria()
    {
        return $this->db->get_where("tb_barang", array('kategori' => 2));
    }

    public function data_pakaian_wanita()
    {
        return $this->db->get_where("tb_barang", array('kategori' => 3));
    }

    public function data_pakaian_anak_anak()
    {
        return $this->db->get_where("tb_barang", array('kategori' => 4));
    }

    public function data_peralatan_olahraga()
    {
        return $this->db->get_where("tb_barang", array('kategori' => 5));
    }

    public function data_makanan()
    {
        return $this->db->get_where("tb_barang", array('kategori' => 8));
    }

    public function tampil_data()
    {
        return $this->db->get('tb_kategori');
    }

    public function tambah($data, $table)
    {
        $insert = $this->db->insert($table, $data);
        return $insert ? true : false;
    }

    public function edit($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update($where, $data, $table)
    {
        $this->db->where($where);

        $update = $this->db->update($table, $data);
        return $update ? true : false;
    }

    public function hapus($where, $table)
    {
        $this->db->where($where);

        $delete = $this->db->delete($table);
        return $delete ? true : false;
    }
}
