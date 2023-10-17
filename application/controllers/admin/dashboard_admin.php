<?php

class Dashboard_admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('role_id') != '1') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Anda Belum Login!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('auth/login');
        }
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'chart_data' => $this->model_barang->get_chart_datas(),
            'jml_barang' => $this->model_barang->tampil_data()->num_rows(),
            'jml_invoice' => $this->model_invoice->jumlah_data(),
            'jml_user' => $this->model_user->tampil_data()->num_rows(),
            'jml_kategori' => $this->model_kategori->tampil_data()->num_rows()
        ];

        $this->template->load('layouts_admin/template', 'admin/dashboard', $data);
    }
}
