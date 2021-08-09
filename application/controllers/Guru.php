<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {

	public function __construct(){

		parent::__construct();
		/*-- Check Session  --*/
		is_login();
		/*-- untuk mengatasi error confirm form resubmission  --*/
		header('Cache-Control: no-cache, must-revalidate, max-age=0');
		header('Cache-Control: post-check=0, pre-check=0',false);
		header('Pragma: no-cache');
		$this->load->model('guru_model');
	}

	public function index()
	{
		$data = array(
			'user' => $this->db->get_where('tbl_user',['username' => $this->session->userdata('username')])->row() ,
			'profile' => $this->guru_model->getProfile(str_replace("guru","", $this->session->userdata('username'))),
			'title' => 'Web Sekolah' , 
			'parent' => 'MA PK MAaFIF NGALIAN',
			'isi' => 'guru/v_guru_dashboard'
		);
		$this->load->view('guru/layout/v_wrapper', $data, FALSE);
	}

	public function dashboardNilai()
	{
		
		$data = array(
			'user' => $this->db->get_where('tbl_user',['username' => $this->session->userdata('username')])->row() ,
			'title' => 'Data Nilai Siswa' , 
			'parent' => 'MA PK MAaFIF NGALIAN',
			'nilai' => $this->guru_model->listsNilai(),
			'isi' => 'guru/pengaturanNilai/DashboardNilai'
		);
		$this->load->view('guru/layout/v_wrapper', $data, FALSE);
	}

	public function tambahNilai()
	{
		$this->form_validation->set_rules('id_mapel', 'Nama Mapel', 'required');	
		$this->form_validation->set_rules('nis', 'Nama Siswa', 'required|is_unique[tbl_nilai.nis]', [
			'is_unique' => 'Nilai Siswa ini Sudah diinputkan'
		]);
		$this->form_validation->set_rules('id_kelas', 'Nama Kelas', 'required');
		$this->form_validation->set_rules('nilai', 'Nilai', 'required');
		if ($this->form_validation->run() == FALSE)
		{


			$data = array
			(	
				'user' => $this->db->get_where('tbl_user',['username' => $this->session->userdata('username')])->row() ,
				'title' => 'Tambah Data Nilai', 
				'mapel' => $this->guru_model->namaMapel(str_replace("guru","", $this->session->userdata('username'))),
				'siswa' => $this->guru_model->namaSiswaAll(),
				'kelas' => $this->guru_model->namaKelasAll(),
				'isi' => 'guru/pengaturanNilai/tambahNilai'
			);
			$this->load->view('guru/layout/v_wrapper', $data, FALSE);
		}else{

			$data = array(
				'id_mapel' => $this->input->post('id_mapel'),
				'nis' => $this->input->post('nis'),
				'id_kelas' => $this->input->post('id_kelas'),
				'nilai' => $this->input->post('nilai'),
			);
			$this->guru_model->tambahNilai($data);
			$this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan!!!');
			redirect('guru/dashboardNilai');
		}
	}

	public function editNilai($id_nilai = null ){

		$this->form_validation->set_rules('id_mapel', 'Nama Mapel', 'required');	
		$this->form_validation->set_rules('nis', 'Nama Siswa', 'required');
		$this->form_validation->set_rules('id_kelas', 'Nama Kelas', 'required');
		$this->form_validation->set_rules('nilai', 'Nilai', 'required');

		if ($this->form_validation->run() == FALSE)
		{

			$data = array
			(	
				'user' => $this->db->get_where('tbl_user',['username' => $this->session->userdata('username')])->row() ,
				'title' => 'Edit Data Nilai',
				'editNilai' => $this->guru_model->editNilai($id_nilai),
				'mapel' => $this->guru_model->namaMapel(str_replace("guru","", $this->session->userdata('username'))),
				'siswa' => $this->guru_model->namaSiswaAll(),
				'kelas' => $this->guru_model->namaKelasAll(),
				'isi' => 'guru/pengaturanNilai/editNilai'
			);
			$this->load->view('guru/layout/v_wrapper', $data, FALSE);
		}else{

			$data = array(
				'id_nilai' => $id_nilai,
				'id_mapel' => $this->input->post('id_mapel'),
				'nis' => $this->input->post('nis'),
				'id_kelas' => $this->input->post('id_kelas'),
				'nilai' => $this->input->post('nilai'),
			);
			$this->guru_model->updateNilai($data);

			$this->db->where('id_nilai',$id_nilai);
			$this->db->update('tbl_request',['request_status_siswa' => 0]);
			$this->session->set_flashdata('pesan', 'Data Berhasil Di Update!!!');
			redirect('guru/dashboardNilai');
		}
	}

//controler Profile
	public function Profile(){
		$data = array(
			'user' => $this->db->get_where('tbl_user',['username' => $this->session->userdata('username')])->row() ,
			'title' => $this->admin_model->website(),
			'parent' => 'Profile', 
			'page' => 'Profile Guru',
			'isi' => 'guru/pengaturanProfile/GuruProfile'
		);
		$this->load->view('guru/layout/v_wrapper', $data, FALSE);
	}

	public function getNotif(){
		
		$view = $this->input->post('view');
		$guru = $this->db->get_where('tbl_guru',['nik' => str_replace("guru","", $this->session->userdata('username'))])->row();
		$data = $this->guru_model->getNotif($guru->id_guru);

		echo json_encode($data);

	}

	public function updateNotif(){

		$nik = $this->input->post('guru');
		$guru = $this->db->get_where('tbl_guru',['nik' => $nik ])->row()->id_guru;

		$updateNotif = [ 

			'request_status_guru' => 1,
		];

		$this->db->where('request_guru', $guru);
		$data = $this->db->update('tbl_request',$updateNotif);
		echo json_encode($data);
	}

	public function deleteNotif($id_request){

		$this->db->delete('tbl_request',['id_request' => $this->encrypt->decode($id_request)]);
		$this->toastr->success('Notification Telah Di Hapus!');
		redirect('guru/notif');

	}

	// public function deleteNotif($id_request)
	// 	{
	// 		$data = array('id_request' => $id_request );
	// 		$this->guru_model->deleteNotif($data);
	// 		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Berhasil Dihapus!!!</div>');
	// 		redirect('guru/notif');
	// 	}

	public function notif(){

		$data = array(
			'user' => $this->db->get_where('tbl_user',['username' => $this->session->userdata('username')])->row() ,
			'allnotif' => $this->guru_model->getAllNotif($this->session->userdata('id_guru')),
			'title' => 'Guru | Notification', 
			'page' => 'Notification',
			'isi' => 'guru/v_guru_notif'
		);
		$this->load->view('guru/layout/v_wrapper', $data, FALSE);

	}

	public function changePassword(){
		$data = array(
			'user' => $this->db->get_where('tbl_user',['username' => $this->session->userdata('username')])->row()
		);

		$this->form_validation->set_rules('bb', 'New Password','required|trim|min_length[4]|matches[cc]');
		$this->form_validation->set_rules('cc', 'Confirm New Password','required|trim|min_length[4]|matches[bb]');

		if($this->form_validation->run() == false){
			$data = array(
				'title' => $this->guru_model->website() ,
				'parent' => 'Profile', 
				'page' => 'Profile',
				'isi' => 'guru/pengaturanProfile/GuruProfile'
			);

		}else{


			$new_password = $this->input->post('bb');


			$password_hash = password_hash($new_password, PASSWORD_DEFAULT);

			$this->db->set('password', $password_hash);
			$this->db->where('id_user', $this->input->post('dd'));
			$this->db->update('tbl_user');

			$this->toastr->success('<div class="alert alert-success" role="alert">Password berhasil diubah!</div>');
			redirect('guru/profile');
		}

	}

	public function editProfile(){

		$data['user'] = $this->db->get_where('tbl_user',['username' => $this->session->userdata('username')])->row();
		
		$this->form_validation->set_rules('fullname','Fullname','required');

		if($this->form_validation->run() == false){
			$data = array(
				'title' => $this->admin_model->website(),
				'parent' => 'Profile',
				'page' => 'Profile',
				'isi' => 'guru/pengaturanProfile/GuruProfile'
			);
			$this->load->view('guru/layout/v_wrapper', $data, FALSE);
			

		}else{

			//check jika ada gmabar yang akan diupload, "f" itu nama inputnya
			// $upload_image = $_FILES['photo']['name'];
			$filename = $this->session->userdata('username');

			$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']     = '5120'; // dalam hitungan kilobyte(kb), aslinya 1mb itu 1024kb
				$config['upload_path'] = './assets/data/foto/user/img/guru/';
				$config['overwrite'] = "TRUE";
				$config['file_name'] = $filename;

				$this->load->library('upload', $config);
				$this->upload->overwrite = true;
				if(! $this->upload->do_upload('guru')){

					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
					redirect('Guru/profile');

				}else{

					$data = [

						'full_name' => $this->input->post('fullname'),
						'email' => $this->input->post('email'),
					];

					$this->db->where('id_user', $this->input->post('z'));
					$this->db->update('tbl_user',$data);
					$this->toastr->success('Profile Telah Di Update!');
					redirect('Guru/profile');
				}

			}
		}
	}
