<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guest extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		$this->load->model('M_read');   // model yang kamu pakai
        $this->load->database();
        $this->load->helper(array('url', 'text')); // helper bawaan CI
		// is_login();
	}

	public function index()
	{                             
		$data['path_headline'] = base_url('assets/admin/assets/images/headline/');
		$this->load->helper('custom_helper'); // jika kamu pakai helper rupiah

        // Ambil data dari model atau query builder
        $data['headlines'] = $this->M_read->baca_data("tb_headline")->result_array();
		$data['list_desain'] = $this->M_read->get_latest_desain_with_gambar();
		$data['ugd_desain'] = $this->M_read->get_desain_by_pemilik_prefix();
		$data['list_cetak'] = $this->M_read->get_cetak_limited();
		$data['list_jobs'] = $this->M_read->get_random_jobs_with_user_and_image();
		$data['list_artikel'] = $this->M_read->get_published_artikel_with_meta();
		$data['list_visit'] = $this->M_read->get_visit_with_image();
		$data['list_clients'] = $this->M_read->get_all_clients();

		// var_dump($data['path']);

		$this->load->view('guest/part/header', $data);
		$this->load->view('guest/part/header_menu', $data);
		$this->load->view('guest/index', $data);
		$this->load->view('guest/part/footer', $data);
	}
	public function maintenance()
	{
		$this->load->view('maintenance/maintenance');
	}
}
