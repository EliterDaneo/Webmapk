<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

	public function __construct(){

		parent::__construct();
		/*-- Check Session  --*/
		is_login();
		/*-- untuk mengatasi error confirm form resubmission  --*/
		header('Cache-Control: no-cache, must-revalidate, max-age=0');
		header('Cache-Control: post-check=0, pre-check=0',false);
		header('Pragma: no-cache');
		$this->load->model('siswa_model');
	}

	public function index()
	{

		$data = array(
			'title' => 'Web Sekolah' , 
			'parent' => 'MA PK MAaFIF NGALIAN',
			'isi' => 'siswa/v_siswa_dashboard',
			'user' =>$this->db->get_where('tbl_user',['username' => $this->session->userdata('username')])->row(),
			'profile' => $this->siswa_model->getProfile(str_replace("siswa","", $this->session->userdata('username'))),
			'page' => $this->siswa_model->logo(),
		);
		$this->load->view('siswa/layout/v_wrapper', $data, FALSE);

	}

	public function profile($id_siswa){

		$this->form_validation->set_rules('nis', 'nis siswa', 'required');
		$this->form_validation->set_rules('nama_siswa', 'nama_siswa', 'required');
		$this->form_validation->set_rules('tempat_lahir', 'tempat_lahir', 'required');
		$this->form_validation->set_rules('tanggal_lahir', 'tanggal_lahir', 'required');	
		$this->form_validation->set_rules('wali_siswa', 'wali_kelas', 'required');
		$this->form_validation->set_rules('hp', 'hp', 'required');
		$this->form_validation->set_rules('alamat', 'alamat', 'required');

		if ($this->form_validation->run() == TRUE)
		{
			$config['upload_path']          = './assets/data/foto/user/img/siswa/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 2000;
			$this->upload->initialize($config);

			if ( ! $this->upload->do_upload('foto_siswa'))
			{

				$data = array(
					'title' => 'Edit Data', 
					'error' => $this->upload->display_errors(),
					'profile' => $this->siswa_model->getProfile(str_replace("siswa","", $this->session->userdata('username'))),
					'isi' => 'siswa/v_siswa_dashboard',
				);
				$this->load->view('admin/layout/v_wrapper', $data, FALSE);
			}
			else
			{
				$upload_data 						= array('uploads' => $this->upload->data());
				$config['image_library']          	= '.gd2';
				$config['source_image']          	= './assets/data/foto/user/img/siswa/'.$upload_data['uploads']['file_name'];
				$this->load->library('image_lib', $config);
			//menghapus foto
				$siswa=$this->siswa_model->detailSiswa($id_siswa);
				if ($siswa->foto_siswa !="") {
					unlink('./assets/data/foto/user/img/siswa/'.$siswa->foto_siswa);
				}
			//tutup

				$data = array(
					'id_siswa'			=> $id_siswa,
					'nis' 				=> $this->input->post('nis'),
					'nama_siswa'		=> $this->input->post('nama_siswa'),
					'tempat_lahir' 		=> $this->input->post('tempat_lahir'),
					'tanggal_lahir'		=> $this->input->post('tanggal_lahir'),
					'foto_siswa' 		=> $upload_data['uploads']['file_name'],
					'wali_siswa'		=> $this->input->post('wali_siswa'),
					'hp'		=> $this->input->post('hp'),
					'alamat'		=> $this->input->post('alamat'),
				);
				$this->siswa_model->editSiswa($data);
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil DiUbah!</div>');
				redirect ('siswa');
			}
			$upload_data 						= array('uploads' => $this->upload->data());
			$config['image_library']          	= '.gd2';
			$config['source_image']          	= './assets/data/foto/user/img/siswa/'.$upload_data['uploads']['file_name'];
			$this->load->library('image_lib', $config);

			$data = array(
				'id_siswa'			=> $id_siswa,
				'nis' 				=> $this->input->post('nis'),
				'nama_siswa'		=> $this->input->post('nama_siswa'),
				'tempat_lahir' 		=> $this->input->post('tempat_lahir'),
				'tanggal_lahir'		=> $this->input->post('tanggal_lahir'),
				'wali_siswa'		=> $this->input->post('wali_siswa'),
				'hp'		=> $this->input->post('hp'),
				'alamat'		=> $this->input->post('alamat'),
			);
			$this->siswa_model->editSiswa($data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil DiUbah!</div>');
			redirect ('siswa');

		}

		$data = array(
			'title' => 'Web Sekolah' , 
			'parent' => 'MA PK MAaFIF NGALIAN',
			'isi' => 'siswa/v_siswa_dashboard',
			'user' =>$this->db->get_where('tbl_user',['username' => $this->session->userdata('username')])->row(),
			'profile' => $this->siswa_model->getProfile(str_replace("siswa","", $this->session->userdata('username'))),
		);
		$this->load->view('siswa/layout/v_wrapper', $data, FALSE);

	}

	public function allNilai(){

		$data = array(
			'title' => 'List Semua Nilai' , 
			'parent' => 'MA PK MAaFIF NGALIAN',
			'isi' => 'siswa/v_siswa_allNilai',
			'user' =>$this->db->get_where('tbl_user',['username' => $this->session->userdata('username')])->row(),
			'detailNilai' => $this->siswa_model->detailNilai(str_replace("siswa","", $this->session->userdata('username'))),
			'allNilai' => $this->siswa_model->allNilai(str_replace("siswa","", $this->session->userdata('username')))
		);
		$this->load->view('siswa/layout/v_wrapper', $data, FALSE);
	}

	public function getNotif(){
		
		$view = $this->input->post('view');
		$siswa = $this->db->get_where('tbl_siswa',['nis' => str_replace("siswa","", $this->session->userdata('username'))])->row();
		$data = $this->siswa_model->getNotif($siswa->id_siswa);

		echo json_encode($data);

	}

	public function updateNotif(){

		$nis = $this->input->post('siswa');
		$siswa = $this->db->get_where('tbl_siswa',['nis' => $nis ])->row()->id_siswa;

		$updateNotif = [ 

			'request_status_siswa' => 1,
		];

		$this->db->where('request_siswa', $siswa);
		$data = $this->db->update('tbl_request',$updateNotif);
		echo json_encode($data);
	}

	public function deleteNotif($id_request){

		$this->db->delete('tbl_request',['id_request' => $this->encrypt->decode($id_request)]);
		$this->toastr->success('Notification Telah Di Hapus!');
		redirect('siswa/notif');

	}

	public function notif()
	{

		$data = array(
			'user' => $this->db->get_where('tbl_user',['username' => $this->session->userdata('username')])->row() ,
			'allnotif' => $this->siswa_model->getAllNotif(str_replace("siswa","", $this->session->userdata('username'))),
			'title' => 'Siswa | Notification', 
			'parent' => 'Siswa | Notification',
			'page' => 'Notification',
			'isi' => 'siswa/v_siswa_notif',
		);
		$this->load->view('siswa/layout/v_wrapper', $data, FALSE);
	}
}