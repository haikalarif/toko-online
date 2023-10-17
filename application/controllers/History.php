<?php

class History extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    public function index()
    {
        $filter = [
            'user_id' => $this->session->userdata('id'),
        ];

        $data = [
            'title' => 'Detail History',
            'pesanan' => $this->model_invoice->get_pesanan(),
            'detail_pesanan' => $this->model_invoice->get_filter_user('', '', $filter),
        ];

        $this->template->load('layouts/template', 'history_pesanan', $data);
    }

    public function terima($id)
    {
        $data = array(
            'status' => 1
        );

        $where = array(
            'id' => $id
        );

        $this->model_invoice->update($where, $data, 'tb_pesanan');

        redirect('history');
    }

    public function detail($id)
    {
        $data = [
            'title' => 'Detail Pesanan',
            'pesanan' => $this->model_invoice->detail_pesanan($id)
        ];

        $this->template->load('layouts/template', 'detail_pesanan', $data);
    }

    public function getMetode($metode = null)
    {
        if ($metode) {
            $filter = [
                'id' => $metode,
            ];
        }

        $result = $this->model_metode->get_filter_data('', '', $filter)->row_array();

        echo json_encode($result);
    }
}
