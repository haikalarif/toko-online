<?php

class Model_user extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->where('role_id', 2)->get('tb_user');
    }
}
