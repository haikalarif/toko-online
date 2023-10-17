<?php

class Data_barang extends CI_Controller
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
            'title' => 'Data Barang',
            'barang' => $this->model_barang->tampil_data()->result(),
            'kategori' => $this->model_kategori->tampil_data()->result(),
        ];
        $this->template->load('layouts_admin/template', 'admin/data_barang', $data);
    }

    public function tambah_aksi()
    {
        // Konfigurasi validasi form
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Nama Barang', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');
        $this->form_validation->set_rules('stok', 'Stok', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['barang'] = $this->model_barang->tampil_data()->result();
            $data['kategori'] = $this->model_kategori->tampil_data()->result();
            $this->template->load('layouts_admin/template', 'admin/data_barang', $data);
        } else {
            $name           = $this->input->post('name');
            $keterangan     = $this->input->post('keterangan');
            $kategori       = $this->input->post('kategori');
            $harga          = $this->input->post('harga');
            $stok           = $this->input->post('stok');
            $gambar         = $_FILES['gambar']['name'];
            if ($gambar = '') {
            } else {
                $config['upload_path'] = './uploads';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size'] = 2048;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('gambar')) {
                    echo "Gambar Gagal di Upload!";
                } else {
                    $gambar = $this->upload->data('file_name');
                }

                $data = array(
                    'name'          => $name,
                    'keterangan'    => $keterangan,
                    'kategori'      => $kategori,
                    'harga'         => $harga,
                    'stok'          => $stok,
                    'gambar'        => $gambar,
                );

                if ($this->model_barang->tambah_barang($data, 'tb_barang')) {
                    $this->session->set_flashdata('alert', 'Data Berhasil Ditambahkan');
                    $this->session->set_flashdata('alert_class', 'success');
                    $this->session->set_flashdata('alert_icon', 'fas fa-check-square');
                } else {
                    $this->session->set_flashdata('alert', 'Gagal Menambahkan Data');
                    $this->session->set_flashdata('alert_class', 'danger');
                    $this->session->set_flashdata('alert_icon', 'fas fa-exclamation-circle');
                }

                redirect('admin/data_barang/index');
            }
        }
    }

    public function edit($id)
    {
        $where = array('id' => $id);
        $data['barang'] = $this->model_barang->edit_barang($where, 'tb_barang')->result();
        $this->template->load('layouts_admin/template', 'admin/edit_barang', $data);
    }

    public function update()
    {
        $id = $this->input->post('id');

        // Konfigurasi validasi form
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Nama Barang', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');
        $this->form_validation->set_rules('stok', 'Stok', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['barang'] = $this->model_barang->tampil_data()->result();
            $data['kategori'] = $this->model_kategori->tampil_data()->result();
            $this->template->load('layouts_admin/template', 'admin/data_barang', $data);
        } else {
            $name = $this->input->post('name');
            $keterangan = $this->input->post('keterangan');
            $kategori = $this->input->post('kategori');
            $harga = $this->input->post('harga');
            $stok = $this->input->post('stok');
            $gambar = $_FILES['gambar']['name'];

            if ($gambar = '') {
            } else {
                $config['upload_path'] = './uploads';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size'] = 2048;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('gambar')) {
                    echo "Gambar Gagal di Upload!";
                } else {
                    $gambar = $this->upload->data('file_name');
                }

                $data = array(
                    'name' => $name,
                    'keterangan' => $keterangan,
                    'kategori' => $kategori,
                    'harga' => $harga,
                    'stok' => $stok,
                    'gambar' => $gambar
                );

                $where = array(
                    'id' => $id
                );

                if ($this->model_barang->update_data($where, $data, 'tb_barang')) {
                    $this->session->set_flashdata('alert', 'Data Berhasil Diupdate');
                    $this->session->set_flashdata('alert_class', 'success');
                    $this->session->set_flashdata('alert_icon', 'fas fa-check-square');
                } else {
                    $this->session->set_flashdata('alert', 'Gagal Mengupdate Data');
                    $this->session->set_flashdata('alert_class', 'danger');
                    $this->session->set_flashdata('alert_icon', 'fas fa-exclamation-circle');
                }

                redirect('admin/data_barang');
            }
        }
    }

    public function hapus($id)
    {
        $where = array('id' => $id);

        if ($this->model_barang->hapus_data($where, 'tb_barang')) {
            $this->session->set_flashdata('alert', 'Data Berhasil Dihapus');
            $this->session->set_flashdata('alert_class', 'success');
            $this->session->set_flashdata('alert_icon', 'fas fa-check-square');
        } else {
            $this->session->set_flashdata('alert', 'Gagal Menghapus Data');
            $this->session->set_flashdata('alert_class', 'danger');
            $this->session->set_flashdata('alert_icon', 'fas fa-exclamation-circle');
        }

        redirect('admin/data_barang/index');
    }
}
