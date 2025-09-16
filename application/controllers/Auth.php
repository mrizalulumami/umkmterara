<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_read');
		// dia_login();
	}

	public function index()
	{
		$data['title'] = "login page";
		// $this->load->view('auth/partial/header', $data);
		$this->load->view('auth/pages/login', $data);
		// $this->load->view('auth/partial/footer', $data);
	}
	public function register_page()
	{
		$data['title'] = "register page";
		$data['negara']=$this->db->query("SELECT * FROM tb_negara")->result_array();
		$data['tbank']=$this->db->query("SELECT * FROM tb_bank")->result_array();


		$this->load->view('auth/pages/register', $data);
	}
	public function login()
	{
		if (isset($_POST['login'])) {
			$email    = $this->input->post('email', true);
			$password = $this->input->post('password', true);

			// Query dengan Active Record (lebih aman)
			$this->db->where('username', $email);
			$this->db->or_where('email', $email);
			$query = $this->db->get('tb_user');

			// var_dump($query->row_array());

			if ($query->num_rows() == 0) {
				$this->session->set_flashdata('error', 
					'<div class="alert alert-danger" role="alert">Username/Email belum terdaftar!</div>');
				redirect('auth');
			} else {
				$user = $query->row_array();

				// Jika pakai password hash
				if ($password !== $user['password']) {
					$this->session->set_flashdata('error', 
						'<div class="alert alert-danger" role="alert">Password salah!</div>');
					redirect('auth');
				} else {
					$this->session->set_userdata('idUser', $user['id_user']);
					$this->session->set_flashdata('message', 
						'<div class="alert alert-success" role="alert">Selamat Datang!</div>');
					redirect('guest');
				}
			}
		}
	}

	public function register(){
		if (isset($_POST['register'])) {
			$date=date("dmY");
			$time=date('s');
			$nama=$_POST['nama'];
			$jenisKelamin=$_POST['jenisKelamin'];
			$tglLahir=$_POST['tahun']."-".$_POST['bulan']."-".$_POST['hari'];
			$noHp=$_POST['kodeNegara']."".$_POST['noHp'];
			$email=$_POST['email'];
			$username=$_POST['username'];
			$alamat=$_POST['alamat'];
			$password=$_POST['password'];
			$kPassword=$_POST['kPassword'];
			$pertanyaan=$_POST['pertanyaan']."-".strtolower($_POST['jawaban']);		
			$id=$date."".$_POST['hari']."".$time;
			$idUser="US".$id;
			$idWallet="W".$id;
			$fotoSampul='img_sampul.png';
			if ($jenisKelamin=='1') {
				$fotoProfil='img_man.png';
			}else{
				$fotoProfil='img_woman.png';
			}

			if ($_POST['bank']=='1') {
				$bank=$_POST['namaBank'].'-'.$_POST['noRek'].'-'.$_POST['namaPemilik'];
			}else{
				$bank=$_POST['bank'].'-'.$_POST['noRek'].'-'.$_POST['namaPemilik'];
			}

			if ($password==$kPassword) {
				$insert=$this->db->query("INSERT INTO `tb_user` (`id_user`, `nama_user`, `tgl_lahir`, `jenis_kelamin`, `no_hp`, `email`, `username`, `alamat`, `password`, `pertanyaan`, `foto_profil`, `foto_sampul`, `akun_bank`) VALUES ('$idUser', '$nama', '$tglLahir', '$jenisKelamin', '$noHp', '$email', '$username', '$alamat', '$password', '$pertanyaan', '$fotoProfil', '$fotoSampul','$bank')");
				$wallet=$this->db->query("INSERT INTO `tb_wallet` (`id_wallet`, `id_user`) VALUES ('$idWallet','$idUser')");
				if ($insert&&$wallet) { 
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil register, silahkan Login!</div>');
					redirect('auth');
				}
			}else{
				$this->session->set_flashdata('error', '<div class="alert alert-success" role="alert">User tidak terdaftar!</div>');
				redirect('auth');
			}		
		}
	}

}
