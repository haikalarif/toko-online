<?php

class Model_metode extends CI_Model
{
    public function get_data()
    {
        return $this->db->get('tb_metode');
    }

    public function get_filter_data($limit = null, $offset = null, $filtering = null)
    {
        $this->db->select('*');
        $this->db->from('tb_metode');
        $this->db->where($filtering);

        if ($limit) $this->db->limit($limit, $offset);

        return $this->db->get();
    }
}
