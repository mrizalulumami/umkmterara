<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_read');
		dia_login();
	}

	public function index()
	{
		$data['title'] = "login page";
		$this->load->view('auth/partial/header', $data);
		$this->load->view('auth/login', $data);
		$this->load->view('auth/partial/footer', $data);
	}
	public function register_page()
	{
		$data['title'] = "register page";
		$this->load->view('auth/partial/header', $data);
		$this->load->view('auth/register', $data);
		$this->load->view('auth/partial/footer', $data);
	}
	public function login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		if($username != null && $password != null){
			$cek_data = $this->m_read->baca_by_param('tbl_petugas', 'username', $username);
			$adagak = $cek_data->num_rows();
			if($adagak > 0 ){
				$ambil_data = $cek_data->row();
				if($ambil_data->password == $password){
					$data_session = [
						'id_petugas' => $ambil_data->id_petugas,
						'username' => $ambil_data->username,
						'level' => $ambil_data->level,
						'is_login' => TRUE
					];
					$this->session->set_userdata($data_session);
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Login</div>');
					redirect('admin');
				}else{
					$this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert">password salah</div>');
					redirect('auth');
				}
			}else{
				$cek_data = $this->m_read->baca_by_param('tbl_pegawai', 'username', $username);
				$adagak = $cek_data->num_rows();
				if($adagak > 0 ){
					$ambil_data = $cek_data->row();
					if($ambil_data->password == $password){
						$data_session = [
							'id_pegawai' => $ambil_data->id_pegawai,
							'username' => $ambil_data->username,
							'level' => 'pegawai',
							'is_login' => TRUE
						];
						$this->session->set_userdata($data_session);
						$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Login</div>');
						redirect('pegawai');
					}else{
						$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">password salah</div>');
						redirect('auth');
					}
				}else{
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akun tidak ditemukan!</div>');
					redirect('auth');
				}
			}
		}else{
			$this->session->set_flashdata('error','<div class="alert alert-danger" role="alert">Login failed, silahkan isi semua form!</div>');
			redirect('auth');
		}
	}
	public function register(){
		$nik = $this->input->post('nik');
		$name = $this->input->post('nama');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$telp = $this->input->post('telp');

		$cek_data = $this->m_read->baca_by_param('tbl_masyarakat', 'nik', $nik)->num_rows();
		if($cek_data > 0){
			$this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert">NIK sudah Terdaftar, silahkan menggunakan NIK yang lain</div>');
			redirect('auth/register_page');	
		}else{
			$cek_username = $this->m_read->baca_by_param('tbl_masyarakat', 'username', $username)->num_rows();
			if($cek_username > 0){
				$this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert">Username sudah Terdaftar, silahkan menggunakan Username yang lain</div>');
				redirect('auth/register_page');	
			}else{
				$data = [
					'nik' => $nik,
					'name' => $name,
					'username' => $username,
					'password' => $password,
					'telp' => $telp
				];
				$this->db->insert('tbl_masyarakat', $data);

				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil register, silahkan Login!</div>');
				redirect('auth');
			}
		}
	}

}
