<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$data = [
			'title' => 'Dashboard',
			'chart_data' => $this->model_barang->get_chart_datas(),
			'barang' => $this->model_barang->get_data()->result(),
			'kategori' => $this->model_kategori->tampil_data()->result(),
		];

		$this->template->load('layouts/template', 'dashboard', $data);
	}
}
