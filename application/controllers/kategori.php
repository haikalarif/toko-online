<?php

class Kategori extends CI_Controller
{
    public function elektronik()
    {
        $data = [
            'title' => 'Elektronik',
            'elektronik' => $this->model_kategori->data_elektronik()->result(),
            'kategori' => $this->model_kategori->tampil_data()->result(),
        ];

        $this->template->load('layouts/template', 'elektronik', $data);
    }

    public function pakaian_pria()
    {
        $data = [
            'title' => 'Pakaian Pria',
            'pakaian_pria' => $this->model_kategori->data_pakaian_pria()->result(),
            'kategori' => $this->model_kategori->tampil_data()->result(),
        ];

        $this->template->load('layouts/template', 'pakaian_pria', $data);
    }

    public function pakaian_wanita()
    {
        $data = [
            'title' => 'Pakaian Wanita',
            'pakaian_wanita' => $this->model_kategori->data_pakaian_wanita()->result(),
            'kategori' => $this->model_kategori->tampil_data()->result(),
        ];

        $this->template->load('layouts/template', 'pakaian_wanita', $data);
    }

    public function pakaian_anak_anak()
    {
        $data = [
            'title' => 'Pakaian Anak-Anak',
            'pakaian_anak_anak' => $this->model_kategori->data_pakaian_anak_anak()->result(),
            'kategori' => $this->model_kategori->tampil_data()->result(),
        ];

        $this->template->load('layouts/template', 'pakaian_anak_anak', $data);
    }

    public function peralatan_olahraga()
    {
        $data = [
            'title' => 'Peralatan Olahraga',
            'peralatan_olahraga' => $this->model_kategori->data_peralatan_olahraga()->result(),
            'kategori' => $this->model_kategori->tampil_data()->result(),
        ];

        $this->template->load('layouts/template', 'peralatan_olahraga', $data);
    }

    public function makanan()
    {
        $data = [
            'title' => 'Makanan',
            'makanan' => $this->model_kategori->data_makanan()->result(),
            'kategori' => $this->model_kategori->tampil_data()->result(),
        ];

        $this->template->load('layouts/template', 'makanan', $data);
    }
}
