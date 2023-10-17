<?php

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    public function tambah_ke_keranjang($id)
    {
        if ($this->session->userdata('role_id') != '2') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Anda Belum Login!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('auth/login');
        }

        $barang = $this->model_barang->find($id);

        $data = array(
            'id' => $barang->id,
            'qty' => 1,
            'price' => $barang->harga,
            'name' => $barang->name,
        );

        $this->cart->insert($data);
        redirect('welcome');
    }

    public function detail_keranjang()
    {
        $data['title'] = 'Keranjang Belanja';

        $this->template->load('layouts/template', 'keranjang', $data);
    }

    public function hapus_keranjang()
    {
        $this->cart->destroy();
        redirect('welcome');
    }

    public function pembayaran()
    {
        $data['title'] = 'Proses Pembayaran';
        $data['metode'] = $this->model_metode->get_data();

        $this->template->load('layouts/template', 'pembayaran', $data);
    }

    public function proses_pesanan()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('alamat', 'Alamat Lengkap', 'required');

        date_default_timezone_set('Asia/Jakarta');

        $user_id = $this->session->userdata('id');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $no_telp = $this->input->post('no_telp');
        $jasa_kirim = $this->input->post('jasa_kirim');
        $metode_bayar = $this->input->post('metode_bayar');

        if ($this->form_validation->run() == TRUE) {
            $title['title'] = 'Proses Pesanan';
            $file_name = '';

            if ($metode_bayar !== "6") {
                $config['upload_path'] = './uploads/bukti_transfer';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = 10000;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('bukti_bayar')) {
                    $error = array('error' => $this->upload->display_errors());
                } else {
                    $bukti = $this->upload->data();
                    $file_name = $bukti['file_name'];
                }

                $invoice = array(
                    'nama' => $nama,
                    'alamat' => $alamat,
                    'tgl_pesan' => date('Y-m-d H:i:s'),
                    'batas_bayar' => date('Y-m-d H:i:s', mktime(date('H'), date('i'), date('s'), date('m'), date('d') + 1, date('Y')))
                );

                $this->model_invoice->insert_pesanan('tb_invoice', $invoice);
                $id_invoice = $this->db->insert_id();

                foreach ($this->cart->contents() as $item) {
                    $data = array(
                        'id_invoice' => $id_invoice,
                        'id_brg' => $item['id'],
                        'nama_brg' => $item['name'],
                        'jumlah' => $item['qty'],
                        'harga' => $item['price'],
                        'user_id' => $user_id,
                        'no_telp' => $no_telp,
                        'jasa_kirim' => $jasa_kirim,
                        'metode_id' => $metode_bayar,
                        'bukti_bayar' => $file_name
                    );
                    $this->model_invoice->insert_pesanan('tb_pesanan', $data);
                }
            }

            $this->cart->destroy();

            $this->template->load('layouts/template', 'proses_pesanan', $title);
        }
    }

    public function detail($id)
    {
        $data = [
            'title' => 'Detail Produk',
            'barang' => $this->model_barang->detail_brg($id)
        ];

        $this->template->load('layouts/template', 'detail_barang', $data);
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
