<?php

class Invoice extends CI_Controller
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
            'title' => 'Invoice',
            'invoice' => $this->model_invoice->tampil_data()
        ];

        $this->template->load('layouts_admin/template', 'admin/invoice', $data);
    }

    public function detail($id_invoice)
    {
        $data = [
            'title' => 'Detail Invoice',
            'pesanan' => $this->model_invoice->detail_pesanan($id_invoice),
        ];

        $this->template->load('layouts_admin/template', 'admin/detail_invoice', $data);
    }
}
