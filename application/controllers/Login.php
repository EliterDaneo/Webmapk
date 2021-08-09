<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == TRUE) {
			$username = strip_tags($this->input->post('username'));
			$password = strip_tags($this->input->post('password'));
			$this->user_login->login($username,$password);
			}

			if($this->session->userdata('level') == 'Administrator'){
				redirect('Admin');
			}elseif($this->session->userdata('level') == 'Guru'){
				redirect('Guru');
			}elseif($this->session->userdata('level') == 'Wali'){
				redirect('Wali');
			}elseif($this->session->userdata('level') == 'Siswa'){
				redirect('Siswa');
			}

		$data = array('title' => 'Login System Website' );
		$this->load->view('login/v_login', $data, FALSE);
	}

	public function logout()
	{
		$this->user_login->logout();
	}

	public function home_403()
	{
		$data = array(
			'title' => 'Aksess Ditolak' , 
			'parent' => 'Login Form',
			'isi' => 'login/home_403'
		);
		$this->load->view('login/layout/v_wrapper', $data, FALSE);
	}
}
