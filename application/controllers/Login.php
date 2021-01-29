<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
	}

	// MULAI LOGIN
	public function index()
	{
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->load->view('login/login');
			$this->load->view('login/footer-login');
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		$username = $this->input->post('username');
		$pw = $this->input->post('password');

		$user = $this->db->get_where('user', ['username' => $username])->row_array();

		$pass = $user['password'];
		// var_dump($pass); die;

		if ($user) {
			if ($user['is_active'] == 1) {
				// if(password_verify($pw, $user['password'])){
				if ($pw == $pass) {
					$data = [
						'username' => $user['username'],
						'name' => $user['name'],
						'level_id' => $user['level_id'],
						'is_active' => $user['is_active']
					];
					$this->session->set_userdata($data);
					if ($user['level_id'] == 1) {
						$this->session->set_flashdata('success', 'Selamat Datang, Kader!');
						redirect('kader');
					} else {
						$this->session->set_flashdata('success', 'Selamat Datang, Bidan!');
						redirect('bidan');
					}
				} else {
					$this->session->set_flashdata('msg-info', 'Password yang anda masukkan salah');
					redirect('login');
				}
			} else {
				$this->session->set_flashdata('msg-info', 'Username belum aktif');
				redirect('login');
			}
		} else {
			$this->session->set_flashdata('msg-info', 'Username yang anda masukkan belum terdaftar');
			redirect('login');
		}
	}
	// SELESAI LOGIN

	// MULAI LOGOUT
	public function logout()
	{

		$this->session->unset_userdata('username');
		$this->session->unset_userdata('name');
		$this->session->unset_userdata('level_id');

		$this->session->set_flashdata('warning', 'Anda sudah keluar dari aplikasi!');
		redirect('login');
	}
	// SELESAI LOGOUT
}
