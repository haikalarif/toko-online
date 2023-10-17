<?php

class Kategori extends CI_Controller
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
            'title' => 'Kategori',
            'kategori' => $this->model_kategori->tampil_data()->result()
        ];

        $this->template->load('layouts_admin/template', 'admin/kategori/data', $data);
    }

    public function tambah()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('admin/kategori/data');
        } else {
            $nama = $this->input->post('nama');

            $data = array(
                'nama' => $nama
            );

            if ($this->model_kategori->tambah($data, 'tb_kategori')) {
                $this->session->set_flashdata('alert', 'Data Berhasil Ditambahkan');
                $this->session->set_flashdata('alert_class', 'success');
                $this->session->set_flashdata('alert_icon', 'fas fa-check-square');
            } else {
                $this->session->set_flashdata('alert', 'Gagal Menambahkan Data');
                $this->session->set_flashdata('alert_class', 'danger');
                $this->session->set_flashdata('alert_icon', 'fas fa-exclamation-circle');
            }

            redirect('admin/kategori');
        }
    }

    public function edit($id)
    {
        $where = array('id' => $id);
        $data['kategori'] = $this->model_kategori->edit($where, 'tb_kategori')->result();
        $this->template->load('layouts_admin/template', 'admin/kategori/edit', $data);
    }

    public function update()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('admin/kategori/data');
        } else {
            $id = $this->input->post('id');
            $nama = $this->input->post('nama');

            $data = array(
                'nama' => $nama
            );

            $where = array(
                'id' => $id
            );

            if ($this->model_kategori->update($where, $data, 'tb_kategori')) {
                $this->session->set_flashdata('alert', 'Data Berhasil Diupdate');
                $this->session->set_flashdata('alert_class', 'success');
                $this->session->set_flashdata('alert_icon', 'fas fa-check-square');
            } else {
                $this->session->set_flashdata('alert', 'Gagal Mengupdate Data');
                $this->session->set_flashdata('alert_class', 'danger');
                $this->session->set_flashdata('alert_icon', 'fas fa-exclamation-circle');
            }

            redirect('admin/kategori');
        }
    }

    public function hapus($id)
    {
        $where = array('id' => $id);

        if ($this->model_kategori->hapus($where, 'tb_kategori')) {
            $this->session->set_flashdata('alert', 'Data Berhasil Dihapus');
            $this->session->set_flashdata('alert_class', 'success');
            $this->session->set_flashdata('alert_icon', 'fas fa-check-square');
        } else {
            $this->session->set_flashdata('alert', 'Gagal Menghapus Data');
            $this->session->set_flashdata('alert_class', 'danger');
            $this->session->set_flashdata('alert_icon', 'fas fa-exclamation-circle');
        }

        redirect('admin/kategori');
    }
}
