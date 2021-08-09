<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){

		parent::__construct();
		/*-- Check Session  --*/
		is_login();
		/*-- untuk mengatasi error confirm form resubmission  --*/
		header('Cache-Control: no-cache, must-revalidate, max-age=0');
		header('Cache-Control: post-check=0, pre-check=0',false);
		header('Pragma: no-cache');
		$this->load->model('admin_model');
	}

	public function index()
	{
		$data = array(
			'user' => $this->db->get_where('tbl_user',['username' => $this->session->userdata('username')])->row(),
			'title' => 'MA PK NGALIAN' ,
			'title1' => 'Dashboard', 
			'isi' => 'admin/v_admin_dashboard',
		);
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}

//controler profile
	public function Profile(){
		$data = array(
			'user' => $this->db->get_where('tbl_user',['username' => $this->session->userdata('username')])->row() ,
			'title' => $this->admin_model->website(),
			'parent' => 'Profile', 
			'page' => 'Profile', 
			'isi' => 'admin/profile/admin_profile'
		);
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}

	public function editProfile(){
		$data = array(
			'user' => $this->db->get_where('tbl_user',['username' => $this->session->userdata('username')])->row()
		);

		$this->form_validation->set_rules('nama_user','Nama User','required');

		if($this->form_validation->run() == false){

			$data = array(
				'title' => $this->admin_model->website() ,
				'parent' => 'Profile', 
				'page' => 'Profile',
				'isi' => 'admin/profile/admin_profile'
			);
			$this->load->view('admin/layout/v_wrapper', $data, FALSE);

		}else{

			//check jika ada gmabar yang akan diupload, "f" itu nama inputnya
			// $upload_image = $_FILES['photo']['name'];
			$filename = $this->session->userdata('username');

			$config['allowed_types'] = 'png';
				$config['max_size']     = '5120'; // dalam hitungan kilobyte(kb), aslinya 1mb itu 1024kb
				$config['upload_path'] = './assets/data/foto/user/img/admin/';
				$config['overwrite'] = "TRUE";
				$config['file_name'] = $filename;

				$this->load->library('upload', $config);
				$this->upload->overwrite = true;
				if(! $this->upload->do_upload('photo')){

					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
					redirect('Admin/profile');

				}else{

					$data = [

						'nama_user' => $this->input->post('namauser'),
					];

					$this->db->where('id', $this->input->post('z'));
					$this->db->update('tbl_user',$data);
					$this->toastr->success('Profile Telah Di Update!');
					redirect('Admin/profile');
				}

			}
		}


		public function changePassword(){
			$data = array(
				'user' => $this->db->get_where('tbl_user',['username' => $this->session->userdata('username')])->row()
			);

			$this->form_validation->set_rules('bb', 'New Password','required|trim|min_length[4]|matches[cc]');
			$this->form_validation->set_rules('cc', 'Confirm New Password','required|trim|min_length[4]|matches[bb]');

			if($this->form_validation->run() == false){
				$data = array(
					'title' => $this->admin_model->website() ,
					'parent' => 'Profile', 
					'page' => 'Profile',
					'isi' => 'admin/profile/admin_profile'
				);

			}else{


				$new_password = $this->input->post('bb');


				$password_hash = password_hash($new_password, PASSWORD_DEFAULT);

				$this->db->set('password', $password_hash);
				$this->db->where('id', $this->input->post('dd'));
				$this->db->update('tbl_user');

				$this->toastr->success('password Berahasil Di Ubah!');
				redirect('Admin/profile');
			}

		}

//controler website
		
		public function pengaturanWebsite()
		{

			$this->form_validation->set_rules('nip', 'NIP', 'required');
			$this->form_validation->set_rules('nama_sekolah', 'Nama Sekolah', 'required');	
			$this->form_validation->set_rules('alamat', 'Alamat', 'required');
			$this->form_validation->set_rules('telepon', 'No Telepon', 'required');	
			$this->form_validation->set_rules('email', 'Emai', 'required');
			$this->form_validation->set_rules('kepala_sekolah', 'Kepala sekolah', 'required');	
			$this->form_validation->set_rules('visi', 'Visi', 'required');
			$this->form_validation->set_rules('misi', 'Misi', 'required');
			$this->form_validation->set_rules('sejarah', 'Sejarah', 'required');
			if ($this->form_validation->run() == TRUE)
			{
				$config['upload_path']          = './assets/data/foto/sekolah/foto_kapsek/';
				$config['allowed_types']        = 'gif|jpg|png';
				$config['max_size']             = 2000;
				$this->upload->initialize($config);

				if ( ! $this->upload->do_upload('foto_kapsek'))
				{

					$data = array(
						'user' => $this->db->get_where('tbl_user',['username' => $this->session->userdata('username')])->row(),
						'title' => 'Settings Website' ,
						'seting' => $this->admin_model->detailSettings(),
						'isi' => 'admin/pengaturan/admin_website'
					);
					$this->load->view('admin/layout/v_wrapper', $data, FALSE);
				}
				else
				{
					$upload_data 						= array('uploads' => $this->upload->data());
					$config['image_library']          	= '.gd2';
					$config['source_image']          	= './assets/data/foto/sekolah/foto_kapsek/'.$upload_data['uploads']['file_name'];
					$this->load->library('image_lib', $config);
				//menghapus foto
					$seting = $this->admin_model->detailSettings();
					if ($seting->foto_kapsek !="") {
						unlink('./assets/data/foto/sekolah/foto_kapsek/'.$seting->foto_kapsek);
					}
				//tutup

					$data = array(
						'id' 						=> '1',
						'nip' 						=> $this->input->post('nip'),
						'nama_sekolah' 				=> $this->input->post('nama_sekolah'),
						'alamat'		 			=> $this->input->post('alamat'),
						'telepon' 					=> $this->input->post('telepon'),
						'email'						=> $this->input->post('email'),
						'kepala_sekolah'			=> $this->input->post('kepala_sekolah'),
						'visi' 						=> $this->input->post('visi'),
						'misi' 						=> $this->input->post('misi'),
						'sejarah' 					=> $this->input->post('sejarah'),
						'foto_kapsek' 				=> $upload_data['uploads']['file_name'],
					);
					$this->admin_model->save_seting($data);
					$this->session->set_flashdata('pesan', 'Settings Web Berhasil Di Update!!');
					redirect ('admin/pengaturanWebsite');
				}
				$data = array(
					'id' 						=> '1',
					'nip' 						=> $this->input->post('nip'),
					'nama_sekolah' 				=> $this->input->post('nama_sekolah'),
					'alamat'		 			=> $this->input->post('alamat'),
					'telepon' 					=> $this->input->post('telepon'),
					'email'						=> $this->input->post('email'),
					'kepala_sekolah'			=> $this->input->post('kepala_sekolah'),
					'visi' 						=> $this->input->post('visi'),
					'misi' 						=> $this->input->post('misi'),
					'sejarah' 					=> $this->input->post('sejarah'),
				);
				$this->admin_model->save_seting($data);
				$this->session->set_flashdata('pesan', 'Settings Web Berhasil Di Update!!');
				redirect ('admin/pengaturanWebsite');

			}
			$data = array(
				'user' => $this->db->get_where('tbl_user',['username' => $this->session->userdata('username')])->row(),
				'title' 	=> 'Settings Website' ,
				'seting' 	=> $this->admin_model->detailSettings(),
				'title1' 	=> 'MA PK NGALIAN', 
				'isi'		=> 'admin/pengaturan/admin_website'
			);
			$this->load->view('admin/layout/v_wrapper', $data, FALSE);
		}

//controler pengguna
		public function pengaturanPengguna()
		{
			$data = array(
				'user' => $this->db->get_where('tbl_user',['username' => $this->session->userdata('username')])->row(),
				'title' => 'Data Pengguna' ,
				'pengguna' => $this->admin_model->listsPengguna(),
				'title1' => 'User Settings', 
				'isi' => 'admin/pengaturan/admin_pengguna'
			);
			$this->load->view('admin/layout/v_wrapper', $data, FALSE);
		}

		public function tambahPengguna()
		{

			if($this->input->post('level') == 'Administrator'){

				$this->form_validation->set_rules('fullnameAdmin','FullName','required');
			// $this->form_validation->set_rules('emailAdmin','Email','trim|required|valid_email');
				$this->form_validation->set_rules('usernameAdmin','Username','required|is_unique[tbl_user.username]',[
					'is_unique' => 'Username Sudah Dipakai!'
				]);
				$this->form_validation->set_rules('passwordAdmin','Password','required');

			}elseif($this->input->post('level') == 'Guru'){

				$this->form_validation->set_rules('fullnameGuru','FullName','required');
			// $this->form_validation->set_rules('emailGuru','Email','trim|required|valid_email');
				$this->form_validation->set_rules('usernameGuru','Username','required|is_unique[tbl_user.username]',[
					'is_unique' => 'Username Sudah Dipakai!'
				]);
				$this->form_validation->set_rules('passwordGuru','Password','required');

			}elseif($this->input->post('level') == 'Wali'){
				$this->form_validation->set_rules('fullnameWali','FullName','required');
			// $this->form_validation->set_rules('emailWali','Email','trim|required|valid_email');
				$this->form_validation->set_rules('usernameWali','Username','required|is_unique[tbl_user.username]',[
					'is_unique' => 'Username Sudah Dipakai!'
				]);
				$this->form_validation->set_rules('passwordWali','Password','required');

			}elseif($this->input->post('level') == 'Siswa'){
				$this->form_validation->set_rules('fullnameSiswa','FullName','required');
			// $this->form_validation->set_rules('emailSiswa','Email','trim|required|valid_email');
				$this->form_validation->set_rules('usernameSiswa','Username','required|is_unique[tbl_user.username]',[
					'is_unique' => 'Username Sudah Dipakai!'
				]);
				$this->form_validation->set_rules('passwordSiswa','Password','required');

			}

			$this->form_validation->set_rules('level','Level','required');


			if($this->form_validation->run() == false){

				$data = array(
					'title' => $this->admin_model->website() ,
					'parent' => 'Pengguna',
					'page' => 'Data Pengguna Add', 
					'isi' => 'admin/pengaturan/admin_penggunaAdd',
					'user' => $this->db->get_where('tbl_user',['username' => $this->session->userdata('username')])->row() ,
					'userAll' => $this->admin_model->getUsers(),
					'guruAll' => $this->admin_model->getGuru(), 
					'siswaAll' => $this->admin_model->getSiswa()
				);

				$this->load->view('admin/layout/v_wrapper', $data, FALSE);

			}else{

				if($this->input->post('level') == 'Administrator'){

					$data = [

						'nama_user' => $this->input->post('fullnameAdmin'),
						'email' => $this->input->post('emailAdmin'),
						'username' => $this->input->post('usernameAdmin'),
						'password' => password_hash($this->input->post('passwordAdmin'), PASSWORD_DEFAULT),
						'level' => $this->input->post('level')

					];

				}elseif($this->input->post('level') == 'Guru'){

					$data = [

						'nama_user' => $this->input->post('fullnameGuru'),
						'email' => $this->input->post('emailGuru'),
						'username' => $this->input->post('usernameGuru'),
						'password' => password_hash($this->input->post('passwordGuru'), PASSWORD_DEFAULT),
						'level' => $this->input->post('level')

					];

				}elseif($this->input->post('level') == 'Wali'){

					$data = [

						'nama_user' => $this->input->post('fullnameWali'),
						'email' => $this->input->post('emailWali'),
						'username' => $this->input->post('usernameWali'),
						'password' => password_hash($this->input->post('passwordWali'), PASSWORD_DEFAULT),
						'level' => $this->input->post('level')

					];

				}elseif($this->input->post('level') == 'Siswa'){
//
					$username = $this->input->post('usernameSiswa');
 					$pecahusername = str_replace("siswa","", $username);
					$foto = $this->db->get_where('tbl_siswa',['nis' => $pecahusername])->row();

					$data = [

						'nama_user' => $this->input->post('fullnameSiswa'),
						'email' => $this->input->post('emailSiswa'),
						'username' => $this->input->post('usernameSiswa'),
						'password' => password_hash($this->input->post('passwordSiswa'), PASSWORD_DEFAULT),
						'level' => $this->input->post('level'),
						'foto_user' => $foto->foto_siswa,

					];

				}

				$this->db->insert('tbl_user', $data);
				$this->toastr->success('Data User Telah Ditambahkan!');
				redirect('admin/pengaturanPengguna');

			}
		}

		public function pengaturanPenggunaEdit($id = null){

			if (count($this->uri->segment_array()) > 3) {
				redirect('admin');
			}
			if (!isset($id)) {
				$this->toastr->error('Data yang Anda Inginkan Tidak Mempunyai ID');
				redirect('admin/pengaturanPengguna');
			}
			if (is_numeric($id)) {
				$this->toastr->error('Hanya Bisa Menggunakan Enkripsi');
				redirect('admin/pengaturanPengguna');
			} 

			$data = array(
				'user' => $this->db->get_where('tbl_user',['username' => $this->session->userdata('username')])->row(),
				'oneUsers' => $this->admin_model->getOneUsers($this->encrypt->decode($id))
			);
			/*-- Load One Data Administrator --*/

			$this->form_validation->set_rules('fullname','FullName','required');
			$this->form_validation->set_rules('email','Email','trim|required|valid_email');
			$this->form_validation->set_rules('username','Userame','required');
		// $this->form_validation->set_rules('password','Password','required');
			$this->form_validation->set_rules('level','Level','required');


			if($this->form_validation->run() == false){
				$data = array(
					'title' => $this->admin_model->website(),
					'parent' => 'Data Pengguna',
					'page' => 'Data Pengguna Edit',
					'isi' => 'admin/pengaturan/admin_penggunaEdit'
				);
				$this->load->view('admin/layout/v_wrapper', $data, FALSE);


			}else{

				$data = [

					'full_name' => $this->db->escape_str($this->input->post('fullname', true)),
					'email' => $this->db->escape_str($this->input->post('email', true)),
					'username' => $this->db->escape_str($this->input->post('username', true)),
					'password' => $this->db->escape_str(password_hash($this->input->post('password', true), PASSWORD_DEFAULT)),
					'level' => $this->db->escape_str($this->input->post('level', true))

				];

				$this->db->where('id', $this->input->post('z'));
				$this->db->update('tbl_user',$data);
				$this->toastr->success('Data Users  '.$this->input->post('fullname').' dan Wali Telah Di Update!');
				redirect('admin/pengaturanPengguna');

			}

		}

		public function pengaturanPenggunaDelete(){

			$id = $this->input->post("id");
			$this->db->delete('tbl_user',['id' => $id]);
			$sukses = "Deleted successfully.";
			echo json_encode($sukses);
		}

		public function fetch_nikGuru(){

			if($this->input->post('idGuru')){

				$dataGuru = $this->db->get_where('tbl_guru',['id_guru' => $this->input->post('idGuru')])->row();
				$data['nama'] = $dataGuru->nama_guru;
				$data['nik'] = "guru$dataGuru->nik";
				echo json_encode($data);
			}
		}


		public function fetch_nisnWali(){

			if($this->input->post('nisnWali')){

				$dataNISNWali = $this->db->get_where('tbl_siswa',['id_siswa' => $this->input->post('nisnWali')])->row();
				$dataWali = $this->db->get_where('tbl_siswa',['id_siswa' => $this->input->post('nisnWali')])->row();
				$data['nama'] = $dataWali->wali_siswa;
				$data['nisn'] = "wali$dataNISNWali->nis";
				echo json_encode($data);
			}
		}

		public function fetch_nisnSiswa(){
			if($this->input->post('nisnSiswa')){

				$dataNISSiswa = $this->db->get_where('tbl_siswa',['id_siswa' => $this->input->post('nisnSiswa')])->row();
				$data['nama'] = $dataNISSiswa->nama_siswa;
				$data['nisn'] = "siswa$dataNISSiswa->nis";
				echo json_encode($data);
			}
		}

//controler guru
		public function pengaturanGuru()
		{
			$data = array(
				'user' => $this->db->get_where('tbl_user',['username' => $this->session->userdata('username')])->row(),
				'title' => 'MA PK NGALIAN' ,
				'guru' => $this->admin_model->listsGuru(),
				'title1' => 'Data Guru', 
				'isi' => 'admin/master/pengaturanguru/guru'
			);
			$this->load->view('admin/layout/v_wrapper', $data, FALSE);
		}

		public function tambahGuru()
		{
			$this->form_validation->set_rules('nik', 'NIK', 'required');	
			$this->form_validation->set_rules('nama_guru', 'nama_guru', 'required');
			$this->form_validation->set_rules('tempat_lahir', 'tempat_lahir', 'required');
			$this->form_validation->set_rules('tanggal_lahir', 'tanggal_lahir', 'required');	
			$this->form_validation->set_rules('id_mapel', 'id_mapel', 'required');
			$this->form_validation->set_rules('pendidikan', 'pendidikan', 'required');
		// $this->form_validation->set_rules('foto_guru', 'foto_guru', 'required');

			if ($this->form_validation->run() == TRUE)
			{
				$config['upload_path']          = './assets/data/foto/user/img/guru';
				$config['allowed_types']        = 'gif|jpg|png';
				$config['max_size']             = 2000;
				$this->upload->initialize($config);

				if ( ! $this->upload->do_upload('foto_guru'))
				{

					$data = array(
						'user' => $this->db->get_where('tbl_user',['username' => $this->session->userdata('username')])->row(),
						'title' => 'Tambah Data Guru', 
						'isi' => 'admin/master/pengaturanguru/gurutambah',
						'error' => $this->upload->display_errors(),
						'mapel' => $this->admin_model->listsMapel(),
					);
					$this->load->view('admin/layout/v_wrapper', $data, FALSE);
				}
				else
				{
					$upload_data 						= array('uploads' => $this->upload->data());
					$config['image_library']          	= '.gd2';
					$config['source_image']          	= './assets/data/foto/user/img/guru/'.$upload_data['uploads']['file_name'];
					$this->load->library('image_lib', $config);

					$data = array(
						'nik' 				=> $this->input->post('nik'),
						'nama_guru'		 	=> $this->input->post('nama_guru'),
						'tempat_lahir' 		=> $this->input->post('tempat_lahir'),
						'tanggal_lahir'		=> $this->input->post('tanggal_lahir'),
						'id_mapel' 			=> $this->input->post('id_mapel'),
						'pendidikan' 		=> $this->input->post('pendidikan'),
						'foto_guru' 		=> $upload_data['uploads']['file_name'],
					);
					$this->admin_model->tambahGuru($data);
					$this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan!!');
					redirect ('admin/pengaturanGuru');
				}
			}		
			$data = array(
				'user' => $this->db->get_where('tbl_user',['username' => $this->session->userdata('username')])->row(),
				'title' => 'Tambah Data Guru', 
				'isi' => 'admin/master/pengaturanguru/gurutambah',
				'mapel' => $this->admin_model->listsGuru(),
			);
			$this->load->view('admin/layout/v_wrapper', $data, FALSE);

		}

		public function editGuru($id_guru)
		{

			$this->form_validation->set_rules('nik', 'NIK', 'required');	
			$this->form_validation->set_rules('nama_guru', 'nama_guru', 'required');
			$this->form_validation->set_rules('tempat_lahir', 'tempat_lahir', 'required');
			$this->form_validation->set_rules('tanggal_lahir', 'tanggal_lahir', 'required');	
			$this->form_validation->set_rules('id_mapel', 'id_mapel', 'required');
			$this->form_validation->set_rules('pendidikan', 'pendidikan', 'required');
		// $this->form_validation->set_rules('foto_guru', 'foto_guru', 'required');

			if ($this->form_validation->run() == TRUE)
			{
				$config['upload_path']          = './assets/data/foto/user/img/guru';
				$config['allowed_types']        = 'gif|jpg|png';
				$config['max_size']             = 2000;
				$this->upload->initialize($config);

				if ( ! $this->upload->do_upload('foto_guru'))
				{

					$data = array(
						'user' => $this->db->get_where('tbl_user',['username' => $this->session->userdata('username')])->row(),
						'title' => 'MA PK NGALIAN',
						'title' => 'Edit Data Guru', 
						'error' => $this->upload->display_errors(),
						'guru' => $this->admin_model->detailGuru($id_guru),
						'mapel' => $this->admin_model->listsMapel(),
						'isi' => 'admin/master/pengaturanguru/guru'
					);
					$this->load->view('admin/layout/v_wrapper', $data, FALSE);
				}
				else
				{
					$upload_data 						= array('uploads' => $this->upload->data());
					$config['image_library']          	= '.gd2';
					$config['source_image']          	= './assets/data/foto/user/img/guru/'.$upload_data['uploads']['file_name'];
					$this->load->library('image_lib', $config);
				//menghapus foto
					$guru=$this->admin_model->detailGuru($id_guru);
					if ($guru->foto_guru !="") {
						unlink('./assets/data/foto/user/img/guru/'.$guru->foto_guru);
					}
				//tutup

					$data = array(
						'id_guru'			=> $id_guru,
						'nik' 				=> $this->input->post('nik'),
						'nama_guru'		 	=> $this->input->post('nama_guru'),
						'tempat_lahir' 		=> $this->input->post('tempat_lahir'),
						'tanggal_lahir'		=> $this->input->post('tanggal_lahir'),
						'id_mapel' 			=> $this->input->post('id_mapel'),
						'pendidikan' 		=> $this->input->post('pendidikan'),
						'foto_guru' 		=> $upload_data['uploads']['file_name'],
					);
					$this->admin_model->editGuru($data);
					$this->session->set_flashdata('pesan', 'Data Berhasil Diubah!!');
					redirect ('admin/pengaturanGuru');
				}
				$upload_data 						= array('uploads' => $this->upload->data());
				$config['image_library']          	= '.gd2';
				$config['source_image']          	= './assets/data/foto/user/img/guru/'.$upload_data['uploads']['file_name'];
				$this->load->library('image_lib', $config);

				$data = array(
					'id_guru'			=> $id_guru,
					'nik' 				=> $this->input->post('nik'),
					'nama_guru'		 	=> $this->input->post('nama_guru'),
					'tempat_lahir' 		=> $this->input->post('tempat_lahir'),
					'tanggal_lahir'		=> $this->input->post('tanggal_lahir'),
					'id_mapel' 			=> $this->input->post('id_mapel'),
					'pendidikan' 		=> $this->input->post('pendidikan'),
				);
				$this->admin_model->editGuru($data);
				$this->session->set_flashdata('pesan', 'Data Berhasil Diubah!!');
				redirect ('admin/pengaturanGuru');

			}
			$data = array(
				'user' => $this->db->get_where('tbl_user',['username' => $this->session->userdata('username')])->row(),
				'title' => 'Edit Data Guru', 
				'mapel' => $this->admin_model->listsMapel(),
				'guru' => $this->admin_model->detailGuru($id_guru),
				'isi' => 'admin/master/pengaturanguru/guruedit',
			);
			$this->load->view('admin/layout/v_wrapper', $data, FALSE);
		}

		public function deleteGuru($id_guru)
		{
		//menghapus foto
			$guru=$this->admin_model->detailGuru($id_guru);
			if ($guru->foto_guru !="") {
				unlink('./assets/data/foto/user/img/guru/'.$guru->foto_guru);
			}
				//tutup

			$data = array('id_guru' => $id_guru );
			$this->admin_model->deleteGuru($data);
			$this->session->set_flashdata('pesan', 'data berhasil dihapus!!');
			redirect('admin/pengaturanGuru');
		}

//controler kelas
		public function pengaturanKelas()
		{

			$data = array(
				'user' => $this->db->get_where('tbl_user',['username' => $this->session->userdata('username')])->row(),
				'parent' =>'Data Master',
				'title' => 'Data Semua Kelas',
				'kelas' => $this->admin_model->listsKelas(),
				'isi' => 'admin/master/pengaturankelas/kelas'
			);
			$this->load->view('admin/layout/v_wrapper', $data, FALSE);
		}

		public function tambahKelas()
		{
			$this->form_validation->set_rules('wali_kelas', 'Wali Kelas', 'required');	
			$this->form_validation->set_rules('nama_kelas', 'Nama Kelas', 'required');
			$this->form_validation->set_rules('jenis_kelas', 'Jenis Kelas', 'required');
			$this->form_validation->set_rules('total_siswa', 'Total Siswa', 'required');	

			if ($this->form_validation->run() == FALSE)
			{
				$data = array(	
					'user' => $this->db->get_where('tbl_user',['username' => $this->session->userdata('username')])->row(),
					'title' => 'Tambah Kelas',
					'guru' => $this->admin_model->listsGuru(),
					'isi' => 'admin/master/pengaturankelas/tambahkelas'
				);
				$this->load->view('admin/layout/v_wrapper', $data, FALSE);
			}else{
				$data = array(
					'wali_kelas' => $this->input->post('wali_kelas'),
					'nama_kelas' => $this->input->post('nama_kelas'),
					'jenis_kelas' => $this->input->post('jenis_kelas'),
					'total_siswa' => $this->input->post('total_siswa'),
				);
				$this->admin_model->tambahKelas($data);
				$this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan!!!');
				redirect('admin/pengaturanKelas');
			}
		}

		public function editKelas($id_kelas)
		{

			$this->form_validation->set_rules('wali_kelas', 'Wali Kelas', 'required');	
			$this->form_validation->set_rules('jenis_kelas', 'Jenis Kelas', 'required');
			$this->form_validation->set_rules('nama_kelas', 'Nama Kelas', 'required');
			$this->form_validation->set_rules('total_siswa', 'Total Siswa', 'required');
			if ($this->form_validation->run() == FALSE)
			{
				$data = array(	
					'user' => $this->db->get_where('tbl_user',['username' => $this->session->userdata('username')])->row(),
					'title' => 'Edit Kelas', 
					'kelas' => $this->admin_model->detailKelas($id_kelas),
					'guru' => $this->admin_model->listsGuru(),
					'isi' => 'admin/master/pengaturankelas/editkelas'
				);
				$this->load->view('admin/layout/v_wrapper', $data, FALSE);
			}else{
				$data = array(
					'id_kelas' => $id_kelas,
					'wali_kelas' => $this->input->post('wali_kelas'),
					'jenis_kelas' => $this->input->post('jenis_kelas'),
					'nama_kelas' => $this->input->post('nama_kelas'),
					'total_siswa' => $this->input->post('total_siswa'),
				);
				$this->admin_model->editKelas($data);
				$this->session->set_flashdata('pesan', 'Data Berhasil Di Ubah!!!');
				redirect('admin/pengaturanKelas');
			}
		}

		public function deleteKelas($id_kelas)
		{
			$data = array('id_kelas' => $id_kelas );
			$this->admin_model->deleteKelas($data);
			$this->session->set_flashdata('pesan', 'data berhasil dihapus!!');
			redirect('admin/pengaturanKelas');
		}


//controler siswa
		public function pengaturanSiswa()
		{
			$data = array(
				'user' => $this->db->get_where('tbl_user',['username' => $this->session->userdata('username')])->row(),
				'title' => 'Data Siswa', 
				'siswa' => $this->admin_model->listsSiswa(),
				'isi' => 'admin/master/pengaturansiswa/siswa'
			);
			$this->load->view('admin/layout/v_wrapper', $data, FALSE);

		}

		public function tambahSiswa()
		{
			$this->form_validation->set_rules('nis', 'NIS', 'required');	
			$this->form_validation->set_rules('nama_siswa', 'nama_siswa', 'required');
			$this->form_validation->set_rules('tempat_lahir', 'tempat_lahir', 'required');
			$this->form_validation->set_rules('tanggal_lahir', 'tanggal_lahir', 'required');	
			$this->form_validation->set_rules('id_kelas', 'Kelas', 'required');
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
						'user' => $this->db->get_where('tbl_user',['username' => $this->session->userdata('username')])->row(),
						'title' => 'Tambah Data Siswa', 
						'kelas' => $this->admin_model->getKelas(),
						'isi' => 'admin/master/pengaturansiswa/siswatambah',
						'error' => $this->upload->display_errors(),
					);
					$this->load->view('admin/layout/v_wrapper', $data, FALSE);
				}
				else
				{
					$upload_data 						= array('uploads' => $this->upload->data());
					$config['image_library']          	= '.gd2';
					$config['source_image']          	= './assets/data/foto/user/img/guru/'.$upload_data['uploads']['file_name'];
					$this->load->library('image_lib', $config);

					$data = array(
						'nis' 				=> $this->input->post('nis'),
						'nama_siswa'		=> $this->input->post('nama_siswa'),
						'tempat_lahir' 		=> $this->input->post('tempat_lahir'),
						'tanggal_lahir'		=> $this->input->post('tanggal_lahir'),
						'kelas' 			=> $this->input->post('id_kelas'),
						'wali_siswa' 		=> $this->input->post('wali_siswa'),
						'hp' 				=> $this->input->post('hp'),
						'alamat' 			=> $this->input->post('alamat'),
						'foto_siswa' 		=> $upload_data['uploads']['file_name'],
					);
					$this->admin_model->tambahSiswa($data);
					$this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan!!');
					redirect ('admin/pengaturanSiswa');
				}
			}		
			$data = array(
				'user' => $this->db->get_where('tbl_user',['username' => $this->session->userdata('username')])->row(),
				'title' => 'Tambah Data siswa', 
				'isi' => 'admin/master/pengaturansiswa/siswatambah',
				'kelas' => $this->admin_model->getKelas(),
			);
			$this->load->view('admin/layout/v_wrapper', $data, FALSE);

		}

		public function editSiswa($id_siswa)
		{

			$this->form_validation->set_rules('nis', 'NIS', 'required');	
			$this->form_validation->set_rules('nama_siswa', 'nama_siswa', 'required');
			$this->form_validation->set_rules('tempat_lahir', 'tempat_lahir', 'required');
			$this->form_validation->set_rules('tanggal_lahir', 'tanggal_lahir', 'required');	
			$this->form_validation->set_rules('kelas', 'kelas', 'required');
			if ($this->form_validation->run() == TRUE)
			{
				$config['upload_path']          = './assets/data/foto/user/img/guru/';
				$config['allowed_types']        = 'gif|jpg|png';
				$config['max_size']             = 2000;
				$this->upload->initialize($config);

				if ( ! $this->upload->do_upload('foto_siswa'))
				{

					$data = array(
						'user' => $this->db->get_where('tbl_user',['username' => $this->session->userdata('username')])->row(),
						'title' => 'Edit Data Siswa', 
						'error' => $this->upload->display_errors(),
						'siswa' => $this->admin_model->detailSiswa($id_siswa),
						'isi' => 'admin/master/pengaturansiswa/siswaedit'
					);
					$this->load->view('admin/layout/v_wrapper', $data, FALSE);
				}
				else
				{
					$upload_data 						= array('uploads' => $this->upload->data());
					$config['image_library']          	= '.gd2';
					$config['source_image']          	= './assets/data/foto/user/img/guru/'.$upload_data['uploads']['file_name'];
					$this->load->library('image_lib', $config);
				//menghapus foto
					$siswa=$this->admin_model->detailSiswa($id_siswa);
					if ($siswa->foto_siswa !="") {
						unlink('./assets/data/foto/user/img/guru/'.$siswa->foto_siswa);
					}
				//tutup

					$data = array(
						'id_siswa'			=> $id_siswa,
						'nis' 				=> $this->input->post('nis'),
						'nama_siswa'		 	=> $this->input->post('nama_siswa'),
						'tempat_lahir' 		=> $this->input->post('tempat_lahir'),
						'tanggal_lahir'		=> $this->input->post('tanggal_lahir'),
						'kelas' 			=> $this->input->post('kelas'),
						'foto_siswa' 		=> $upload_data['uploads']['file_name'],
					);
					$this->admin_model->editSiswa($data);
					$this->session->set_flashdata('pesan', 'Data Berhasil Diubah!!');
					redirect ('admin/pengaturanSiswa');
				}
				$upload_data 						= array('uploads' => $this->upload->data());
				$config['image_library']          	= '.gd2';
				$config['source_image']          	= './assets/data/foto/user/img/guru/'.$upload_data['uploads']['file_name'];
				$this->load->library('image_lib', $config);

				$data = array(
					'id_siswa'			=> $id_siswa,
					'nis' 				=> $this->input->post('nis'),
					'nama_siswa'		 	=> $this->input->post('nama_siswa'),
					'tempat_lahir' 		=> $this->input->post('tempat_lahir'),
					'tanggal_lahir'		=> $this->input->post('tanggal_lahir'),
					'kelas' 			=> $this->input->post('kelas'),
				);
				$this->admin_model->editSiswa($data);
				$this->session->set_flashdata('pesan', 'Data Berhasil Diubah!!');
				redirect ('admin/pengaturanSiswa');

			}
			$data = array(
				'user' => $this->db->get_where('tbl_user',['username' => $this->session->userdata('username')])->row(),
				'title' => 'Edit Data Siswa', 
				'isi' => 'admin/master/pengaturansiswa/siswaedit',
				'siswa' => $this->admin_model->detailSiswa($id_siswa),
			);
			$this->load->view('admin/layout/v_wrapper', $data, FALSE);
		}

		public function deleteSiswa($id_siswa)
		{
		//menghapus foto
			$siswa=$this->admin_model->detailSiswa($id_siswa);
			if ($siswa->foto_siswa !="") {
				unlink('./assets/data/foto/user/img/guru/'.$siswa->foto_siswa);
			}
				//tutup

			$data = array('id_siswa' => $id_siswa );
			$this->admin_model->deleteSiswa($data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil Di Hapus!</div>');
			redirect('admin/pengaturanSiswa');
		}

//controler mapel
		public function pengaturanMapel()
		{
			$data = array(
				'user' => $this->db->get_where('tbl_user',['username' => $this->session->userdata('username')])->row(),
				'title' => 'MA PK NGALIAN' ,
				'mapel' => $this->admin_model->listsMapel(),
				'title1' => 'Data Mapel', 
				'isi' => 'admin/master/pengaturanmapel/mapel'
			);
			$this->load->view('admin/layout/v_wrapper', $data, FALSE);
		}

		public function tambahMapel()
		{
			$data = array(	
				'user' => $this->db->get_where('tbl_user',['username' => $this->session->userdata('username')])->row(),
			);
			$this->admin_model->tambahMapel(['nama_mapel' => $this->input->post('nama_mapel')]);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan!!!</div>');
			redirect('admin/pengaturanMapel');
		}

		public function editMapel($id_mapel)
		{
			$data = array(
				'id_mapel' => $id_mapel,
				'nama_mapel' => $this->input->post('nama_mapel'),
			);
			$this->admin_model->editMapel($data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Berhasil Diubah!!!</div>');
			redirect('admin/pengaturanMapel');
		}

		public function detailMapel($id_mapel)
		{
			$data = array('id_mapel' => $id_mapel,
				'nama_mapel' => $this->input->post('nama_mapel'),
			);
			$this->admin_model->detailMapel($data);
			redirect('admin/peggaturanMapel');
		}

		public function deleteMapel($id_mapel)
		{
			$data = array('id_mapel' => $id_mapel,);
			$this->admin_model->deleteMapel($data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Berhasil Dihapus!!!</div>');
			redirect('admin/pengaturanMapel');
		}

		
//controler pengumuman
		public function pengaturanPengumuman()
		{
			$data = array(
				'user' => $this->db->get_where('tbl_user',['username' => $this->session->userdata('username')])->row(),
				'title' => 'Pengumuman', 
				'title1' => 'Pengumuman', 
				'pengumuman' => $this->admin_model->listsPengumuman(),
				'isi' => 'admin/master/pengaturanpengumuman/pengumuman'
			);
			$this->load->view('admin/layout/v_wrapper', $data, FALSE);
		}

		public function tambahPengumuman()
		{

			$this->form_validation->set_rules('judul_pengumuman', 'Judul Pengumuman', 'required');	
			$this->form_validation->set_rules('isi_pengumuman', 'Isi Pengumuman', 'required');
			if ($this->form_validation->run() == FALSE)
			{
				$data = array(							
					'user' => $this->db->get_where('tbl_user',['username' => $this->session->userdata('username')])->row(),
					'title' => 'Tambah Pengumuman', 
					'isi' => 'admin/master/pengaturanpengumuman/pengumumantambah'
				);
				$this->load->view('admin/layout/v_wrapper', $data, FALSE);
			}else{
				$data = array(
					'judul_pengumuman' => $this->input->post('judul_pengumuman'),
					'isi_pengumuman' => $this->input->post('isi_pengumuman'),
					'tanggal_pengumuman' => date('Y-m-d'),
				);
				$this->admin_model->tambahPengumuman($data);
				$this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan!!!');
				redirect('admin/pengaturanPengumuman');
			}
		}

		public function editPengumuman($id_pengumuman)
		{

			$this->form_validation->set_rules('judul_pengumuman', 'Judul Pengumuman', 'required');	
			$this->form_validation->set_rules('isi_pengumuman', 'Isi Pengumuman', 'required');
			if ($this->form_validation->run() == FALSE)
			{
				$data = array
				(	
					'user' => $this->db->get_where('tbl_user',['username' => $this->session->userdata('username')])->row(),
					'title' => 'Edit Pengumuman', 
					'pengumuman' => $this->admin_model->detailPengumuman($id_pengumuman),
					'isi' => 'admin/master/pengaturanpengumuman/pengumumanedit'
				);
				$this->load->view('admin/layout/v_wrapper', $data, FALSE);
			}else{
				$data = array(
					'id_pengumuman' => $id_pengumuman,
					'judul_pengumuman' => $this->input->post('judul_pengumuman'),
					'isi_pengumuman' => $this->input->post('isi_pengumuman'),
					'tanggal_pengumuman' => date('Y-m-d'),
				);
				$this->admin_model->editPengumuman($data);
				$this->session->set_flashdata('pesan', 'Data Berhasil Di Ubah!!!');
				redirect('admin/pengaturanPengumuman');
			}
		}


		public function deletePengumuman($id_pengumuman)
		{
			$data = array('id_pengumuman' => $id_pengumuman );
			$this->admin_model->deletePengumuman($data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Berhasil Dihapus!!!</div>');
			redirect('admin/pengaturanPengumuman');
		}

//controler galery
		public function pengaturanGalery()
		{
			$data = array(
				'user' => $this->db->get_where('tbl_user',['username' => $this->session->userdata('username')])->row(),
				'title' => 'Galery Foto', 
				'galery' => $this->admin_model->listsGalery(),
				'isi' => 'admin/master/pengaturangalery/galery'
			);
			$this->load->view('admin/layout/v_wrapper', $data, FALSE);
		}

		public function tambahGalery()
		{
			$this->form_validation->set_rules('nama_galery', 'nama_galery', 'required');

			if ($this->form_validation->run() == TRUE)
			{
				$config['upload_path']          = './assets/data/foto/sampul/';
				$config['allowed_types']        = 'gif|jpg|png';
				$config['max_size']             = 2000;
				$this->upload->initialize($config);

				if ( ! $this->upload->do_upload('sampul'))
				{

					$data = array(
						'user' => $this->db->get_where('tbl_user',['username' => $this->session->userdata('username')])->row(),
						'title' => 'Tambah Foto Sampul', 
						'isi' => 'admin/master/pengaturangalery/tambahgalery',
						'error' => $this->upload->display_errors(),
						'galery' => $this->admin_model->listsGalery(),
					);
					$this->load->view('admin/layout/v_wrapper', $data, FALSE);
				}
				else
				{
					$upload_data 						= array('uploads' => $this->upload->data());
					$config['image_library']          	= '.gd2';
					$config['source_image']          	= './assets/data/foto/sampul/'.$upload_data['uploads']['file_name'];
					$this->load->library('image_lib', $config);

					$data = array(
						'nama_galery' 				=> $this->input->post('nama_galery'),
						'sampul'		 			=> $upload_data['uploads']['file_name'],
					);
					$this->admin_model->tambahGalery($data);
					$this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan!!');
					redirect ('admin/pengaturanGalery');
				}
			}		
			$data = array(
				'user' => $this->db->get_where('tbl_user',['username' => $this->session->userdata('username')])->row(),
				'title' => 'Tambah Foto Sampul', 
				'isi' => 'admin/master/pengaturangalery/tambahgalery',
				'mapel' => $this->admin_model->listsGalery(),
			);
			$this->load->view('admin/layout/v_wrapper', $data, FALSE);

		}

		public function tambahFotoGalery($id_galery)
		{
			$this->form_validation->set_rules('ket_foto', 'Keterangan Foto', 'required');

			if ($this->form_validation->run() == TRUE)
			{
				$config['upload_path']          = './assets/data/foto/sampul/foto/';
				$config['allowed_types']        = 'gif|jpg|png';
				$config['max_size']             = 2000;
				$this->upload->initialize($config);

				if ( ! $this->upload->do_upload('foto'))
				{
					$galery = $this->admin_model->detailGalery($id_galery);
					$data = array(
						'title' => 'Tambah Foto Galery : '.$galery->nama_galery, 
						'isi' => 'admin/master/pengaturangalery/tambahfoto',
						'galery' => $galery,
						'foto' => $this->admin_model->listsFotoGalery($id_galery),
						'error' => $this->upload->display_errors(),

					);
					$this->load->view('admin/layout/v_wrapper', $data, FALSE);
				}
				else
				{
					$upload_data 						= array('uploads' => $this->upload->data());
					$config['image_library']          	= '.gd2';
					$config['source_image']          	= './assets/data/foto/sampul/foto/'.$upload_data['uploads']['file_name'];
					$this->load->library('image_lib', $config);
					$data = array(
						'user' => $this->db->get_where('tbl_user',['username' => $this->session->userdata('username')])->row(),
						'id_galery'					=> $id_galery,
						'ket_foto' 				=> $this->input->post('ket_foto'),
						'foto'		 			=> $upload_data['uploads']['file_name'],
					);
					$this->admin_model->tambahFoto($data);
					$this->session->set_flashdata('pesan', 'Foto Galery Berhasil Di Tambah!!');
					redirect ('admin/pengaturanGalery/'.$id_galery);
				}
			}		
			$galery = $this->admin_model->detailGalery($id_galery);
			$data = array(
				'user' => $this->db->get_where('tbl_user',['username' => $this->session->userdata('username')])->row(),
				'title' => 'Tambah Foto Galery : '.$galery->nama_galery, 
				'galery' => $galery,
				'foto' => $this->admin_model->listsFotoGalery($id_galery),
				'isi' => 'admin/master/pengaturangalery/tambahfoto',
			);
			$this->load->view('admin/layout/v_wrapper', $data, FALSE);
		}

		public function editGalery($id_galery)
		{
			$this->form_validation->set_rules('nama_galery', 'Nama Galery', 'required');

			if ($this->form_validation->run() == TRUE)
			{
				$config['upload_path']          = './assets/data/foto/sampul/';
				$config['allowed_types']        = 'gif|jpg|png';
				$config['max_size']             = 2000;
				$this->upload->initialize($config);

				if ( ! $this->upload->do_upload('sampul'))
				{

					$data = array(
						'user' => $this->db->get_where('tbl_user',['username' => $this->session->userdata('username')])->row(),
						'title' => 'Edit Galery', 
						'isi' => 'admin/master/pengaturangalery/editgalery',
						'galery' => $this->admin_model->detailGalery($id_galery),
						'error' => $this->upload->display_errors(),

					);
					$this->load->view('admin/layout/v_wrapper', $data, FALSE);
				}
				else
				{
					$upload_data 						= array('uploads' => $this->upload->data());
					$config['image_library']          	= '.gd2';
					$config['source_image']          	= './assets/data/foto/sampul/'.$upload_data['uploads']['file_name'];
					$this->load->library('image_lib', $config);
				//menghapus foto
					$galery=$this->admin_model->detailGalery($id_galery);
					if ($galery->sampul !="") {
						unlink('./assets/data/foto/sampul/'.$galery->sampul);
					}
				//tutup
					$data = array(
						'user' => $this->db->get_where('tbl_user',['username' => $this->session->userdata('username')])->row(),
						'id_galery'					=> $id_galery,
						'nama_galery' 				=> $this->input->post('nama_galery'),
						'sampul'		 			=> $upload_data['uploads']['file_name'],
					);
					$this->admin_model->editGalery($data);
					$this->session->set_flashdata('pesan', 'Data Galery Berhasil Di Ubah!!');
					redirect ('admin/pengaturanGalery');
				}
				$data = array(
					'id_galery'					=> $id_galery,
					'nama_galery' 				=> $this->input->post('nama_galery'),
				);
				$this->admin_model->editGalery($data);
				$this->session->set_flashdata('pesan', 'Data Galery Berhasil Di Ubah!!');
				redirect ('admin/pengaturanGalery');
			}		
			$data = array(
				'user' => $this->db->get_where('tbl_user',['username' => $this->session->userdata('username')])->row(),
				'title' => 'Edit Galery', 
				'galery' => $this->admin_model->detailGalery($id_galery),
				'isi' => 'admin/master/pengaturangalery/editgalery',
			);
			$this->load->view('admin/layout/v_wrapper', $data, FALSE);

		}

		public function deleteGalery($id_galery)
		{
		//menghapus foto
			$galery=$this->admin_model->detailGalery($id_galery);
			if ($galery->sampul !="") {
				unlink('./assets/data/foto/sampul/'.$galery->sampul);
			}
				//tutup

			$data = array('id_galery' => $id_galery );
			$this->admin_model->deleteGalery($data);
			$this->session->set_flashdata('pesan', 'data berhasil dihapus!!');
			redirect('admin/pengaturanGalery');
		}


		public function delete_fotoGalery($id_galery,$id_foto)
		{
		//menghapus foto
			$foto=$this->admin_model->detail_fotoGalery($id_foto);
			if ($foto->foto !="") {
				unlink('./assets/img/foto/'.$foto->foto);
			}
				//tutup

			$data = array('id_foto' => $id_foto );
			$this->admin_model->delete_fotoGalery($data);
			$this->session->set_flashdata('pesan', 'Foto berhasil dihapus!!');
			redirect('galery/tambah_foto/'.$id_galery);
		}

//controler Berita
		public function pengaturanBerita()
		{
			$data = array(
				'user' => $this->db->get_where('tbl_user',['username' => $this->session->userdata('username')])->row(),
				'title' => 'Data Berita', 
				'berita' => $this->admin_model->listsBerita(),
				'isi' => 'admin/master/pengaturanberita/berita'
			);
			$this->load->view('admin/layout/v_wrapper', $data, FALSE);
		}

		public function tambahBerita()
		{
			$this->form_validation->set_rules('judul_berita', 'judul_berita', 'required');
			$this->form_validation->set_rules('isi_berita', 'isi_berita', 'required', array('required' => '%s Harus diisi!!'));

			if ($this->form_validation->run() == TRUE)
			{
				$config['upload_path']          = './assets/data/foto/gambar_berita/';
				$config['allowed_types']        = 'gif|jpg|png';
				$config['max_size']             = 2000;
				$this->upload->initialize($config);

				if ( ! $this->upload->do_upload('gambar_berita'))
				{

					$data = array(
						'user' => $this->db->get_where('tbl_user',['username' => $this->session->userdata('username')])->row(),
						'title' => 'Tambah Berita', 
						'isi' => 'admin/master/pengaturanberita/tambahberita',
						'error' => $this->upload->display_errors(),
					);
					$this->load->view('admin/layout/v_wrapper', $data, FALSE);
				}else{
					$upload_data 						= array('uploads' => $this->upload->data());
					$config['image_library']          	= '.gd2';
					$config['source_image']          	= './assets/data/foto/gambar_berita/'.$upload_data['uploads']['file_name'];
					$this->load->library('image_lib', $config);

					$data = array(
						'judul_berita' 				=> $this->input->post('judul_berita'),
						'slug_berita'		 		=> url_title($this->input->post('judul_berita'),'dash', TRUE),
						'isi_berita' 				=> $this->input->post('isi_berita'),
						'tanggal_berita'			=> date('Y-m-d'),
						'id_user'					=> $this->session->userdata('id_user'),
						'gambar_berita' 			=> $upload_data['uploads']['file_name'],
					);
					$this->admin_model->tambahBerita($data);
					$this->session->set_flashdata('pesan', 'Data Berhasil Di Posting!!');
					redirect ('admin/pengaturanBerita');
				}
			}		

			$data = array(
				'user' => $this->db->get_where('tbl_user',['username' => $this->session->userdata('username')])->row(),
				'title' => 'Tambah Berita', 
				'isi' => 'admin/master/pengaturanberita/tambahberita'
			);
			$this->load->view('admin/layout/v_wrapper', $data, FALSE);
		}


		public function editBerita($id_berita)
		{
			$this->form_validation->set_rules('judul_berita', 'judul_berita', 'required');
			$this->form_validation->set_rules('isi_berita', 'isi_berita', 'required', array('required' => '%s Harus diisi!!'));

			if ($this->form_validation->run() == TRUE)
			{
				$config['upload_path']          = './assets/data/foto/gambar_berita/';
				$config['allowed_types']        = 'gif|jpg|png';
				$config['max_size']             = 2000;
				$this->upload->initialize($config);

				if ( ! $this->upload->do_upload('gambar_berita'))
				{

					$data = array(
						'user' => $this->db->get_where('tbl_user',['username' => $this->session->userdata('username')])->row(),
						'title'	 	=> 'Edit Berita', 
						'isi' 			=> 'admin/master/pengaturanberita/editberita',
						'error' 		=> $this->upload->display_errors(),
						'berita'	 	=> $this->admin_model->detailBerita($id_berita),
					);
					$this->load->view('admin/layout/v_wrapper', $data, FALSE);
				}else{
					$upload_data 						= array('uploads' => $this->upload->data());
					$config['image_library']          	= '.gd2';
					$config['source_image']          	= './assets/img/gambar_berita/'.$upload_data['uploads']['file_name'];
					$this->load->library('image_lib', $config);
				//menghapus foto
					$berita=$this->admin_model->detailBerita($id_berita);
					if ($berita->gambar_berita !="") {
						unlink('./assets/data/foto/gambar_berita/'.$berita->gambar_berita);
					}
				//tutup
					$data = array(
						'id_berita'					=> $id_berita,
						'judul_berita' 				=> $this->input->post('judul_berita'),
						'slug_berita'		 		=> url_title($this->input->post('slug_berita'),'dash', TRUE),
						'isi_berita' 				=> $this->input->post('isi_berita'),
						'tanggal_berita'			=> date('Y-m-d'),
						'id_user'					=> $this->session->userdata('id_user'),
						'gambar_berita' 			=> $upload_data['uploads']['file_name'],
					);
					$this->admin_model->editBerita($data);
					$this->session->set_flashdata('pesan', 'Data Berhasil Di Edit!!');
					redirect ('admin/pengaturanBerita');
				}
				$data = array(
					'id_berita'					=> $id_berita,
					'judul_berita' 				=> $this->input->post('judul_berita'),
					'slug_berita'		 		=> url_title($this->input->post('slug_berita'),'dash', TRUE),
					'isi_berita' 				=> $this->input->post('isi_berita'),
					'tanggal_berita'			=> date('Y-m-d'),
					'id_user'					=> $this->session->userdata('id_user'),
				);
				$this->admin_model->editBerita($data);
				$this->session->set_flashdata('pesan', 'Data Berhasil Di Edit!!');
				redirect ('admin/pengaturanBerita');
			}		

			$data = array(
				'user' => $this->db->get_where('tbl_user',['username' => $this->session->userdata('username')])->row(),
				'title' => 'Edit Berita', 
				'berita' => $this->admin_model->detailBerita($id_berita),
				'isi' => 'admin/master/pengaturanberita/editberita',
			);
			$this->load->view('admin/layout/v_wrapper', $data, FALSE);
		}

		public function deleteBerita($id_berita)
		{
		//menghapus foto
			$berita=$this->m_berita->detail($id_berita);
			if ($berita->gambar_berita !="") {
				unlink('./assets/img/gambar_berita/'.$berita->gambar_berita);
			}
				//tutup

			$data = array('id_berita' => $id_berita );
			$this->m_berita->delete($data);
			$this->session->set_flashdata('pesan', 'data berhasil dihapus!!');
			redirect('berita');
		}

//contorler Download
		public function pengaturanDownload()
		{
			$data = array(
				'user' => $this->db->get_where('tbl_user',['username' => $this->session->userdata('username')])->row(),
				'title' => 'Data File Download', 
				'download' => $this->admin_model->listsDownload(),
				'isi' => 'admin/master/pengaturandownload/download'
			);
			$this->load->view('admin/layout/v_wrapper', $data, FALSE);
		}

		public function tambahDownload()
		{
			$this->form_validation->set_rules('nama_file', 'Nama File', 'required');
			$this->form_validation->set_rules('ket_file', 'Keterangan File', 'required');	

			if ($this->form_validation->run() == TRUE)
			{
				$config['upload_path']          = './assets/data/foto/file/';
				$config['allowed_types']        = 'docx|pdf|txt|doc|pptx|excel';
				$config['max_size']             = 10000;
				$this->upload->initialize($config);

				if ( ! $this->upload->do_upload('file'))
				{

					$data = array(
						'user' => $this->db->get_where('tbl_user',['username' => $this->session->userdata('username')])->row(),
						'title' => 'Tambah File Download', 
						'isi' => 'admin/master/pengaturandownload/tambahdownload',
						'error_upload' => $this->upload->display_errors(),
						'download' => $this->admin_model->listsDownload(),
					);
					$this->load->view('admin/layout/v_wrapper', $data, FALSE);
				}
				else
				{
					$upload_data 						= array('uploads' => $this->upload->data());
					$config['image_library']          	= '.gd2';
					$config['source_image']          	= './assets/data/foto/file/'.$upload_data['uploads']['file_name'];
					$this->load->library('image_lib', $config);

					$data = array(
						'nama_file' => $this->input->post('nama_file'),
						'ket_file' 				=> $this->input->post('ket_file'),
						'file' 		=> $upload_data['uploads']['file_name'],
					);
					$this->admin_model->tambahDownload($data);
					$this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan!!');
					redirect ('admin/pengaturanDownload');
				}
			}		
			$data = array(
				'user' => $this->db->get_where('tbl_user',['username' => $this->session->userdata('username')])->row(),
				'title' => 'Tambah File Download', 
				'isi' => 'admin/master/pengaturandownload/tambahdownload',
			);
			$this->load->view('admin/layout/v_wrapper', $data, FALSE);

		}

		public function editDownload($id_file)
		{
			$this->form_validation->set_rules('nama_file', 'Nama File', 'required');
			$this->form_validation->set_rules('ket_file', 'Keterangan File', 'required');	

			if ($this->form_validation->run() == TRUE)
			{
				$config['upload_path']          = './assets/data/foto/file/';
				$config['allowed_types']        = 'docx|pdf|txt|doc|pptx|excel';
				$config['max_size']             = 10000;
				$this->upload->initialize($config);

				if ( ! $this->upload->do_upload('file'))
				{

					$data = array(
						'user' => $this->db->get_where('tbl_user',['username' => $this->session->userdata('username')])->row(),
						'title' => 'Edit File Download', 
						'isi' => 'admin/master/pengaturandownload/editdownload',
						'download'=>$this->admin_model->detailDownload($id_file),
						'error_upload' => $this->upload->display_errors(),
						'download' => $this->admin_model->listsDownload(),
					);
					$this->load->view('admin/layout/v_wrapper', $data, FALSE);
				}
				else
				{
					$upload_data 						= array('uploads' => $this->upload->data());
					$config['image_library']          	= '.gd2';
					$config['source_image']          	= './assets/data/foto/file/'.$upload_data['uploads']['file_name'];
					$this->load->library('image_lib', $config);
				//menghapus foto
					$download=$this->admin_model->detailDownload($id_file);
					if ($download->file !="") {
						unlink('./assets/data/foto/file/'.$download->file);
					}
				//tutup

					$data = array(
						'id_file' 	=>$id_file,
						'nama_file' 				=> $this->input->post('nama_file'),
						'ket_file' 				=> $this->input->post('ket_file'),
						'file' 		=> $upload_data['uploads']['file_name'],
					);
					$this->admin_model->editDownload($data);
					$this->session->set_flashdata('pesan', 'File Berhasil Di Ubah!!');
					redirect ('admin/pengaturanDownload');
				}
				$data = array(
					'id_file' 	=>$id_file,
					'nama_file' 				=> $this->input->post('nama_file'),
					'ket_file' 				=> $this->input->post('ket_file'),
				);
				$this->admin_model->editDownload($data);
				$this->session->set_flashdata('pesan', 'File Berhasil Di Ubah!!');
				redirect ('admin/pengaturanDownload');
			}		
			$data = array(
				'user' => $this->db->get_where('tbl_user',['username' => $this->session->userdata('username')])->row(),
				'title' => 'Edit File Download', 
				'isi' => 'admin/master/pengaturandownload/editdownload',
				'download'=>$this->admin_model->detailDownload($id_file),
			);
			$this->load->view('admin/layout/v_wrapper', $data, FALSE);

		}

		public function deleteDownload($id_file)
		{
		//menghapus foto
			$download=$this->admin_model->detailDownload($id_file);
			if ($download->file !="") {
				unlink('./assets/data/foto/file/'.$download->file);
			}
				//tutup

			$data = array('id_file' => $id_file );
			$this->admin_model->deleteDownload($data);
			$this->session->set_flashdata('pesan', 'File berhasil dihapus!!');
			redirect('admin/pengaturanDownload');
		}


		public function dashboardNilai()
		{
			
			$data = array(
				'user' => $this->db->get_where('tbl_user',['username' => $this->session->userdata('username')])->row(),
				'title' => 'Data Nilai Siswa' , 
				'parent' => 'MA PK MAaFIF NGALIAN',
				'nilai' => $this->admin_model->listsNilai(),
				'isi' => 'admin/master/pengaturanNilai/DashboardNilai'
			);
			$this->load->view('admin/layout/v_wrapper', $data, FALSE);
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
			$data = array(	
				'user' => $this->db->get_where('tbl_user',['username' => $this->session->userdata('username')])->row(),
				'title' => 'Tambah Data Nilai', 
				'mapelList' => $this->admin_model->namaMapelList(str_replace("guru","", $this->session->userdata('username'))),
				'siswa' => $this->admin_model->namaSiswaList(),
				'kelas' => $this->admin_model->namaKelasList(),
				'isi' => 'admin/master/pengaturanNilai/tambahNilai'
			);
			$this->load->view('admin/layout/v_wrapper', $data, FALSE);
		}else{

			$data = array(
				'user' => $this->db->get_where('tbl_user',['username' => $this->session->userdata('username')])->row(),
				'id_mapel' => $this->input->post('id_mapel'),
				'nis' => $this->input->post('nis'),
				'id_kelas' => $this->input->post('id_kelas'),
				'nilai' => $this->input->post('nilai'),
			);
			$this->admin_model->tambahNilai($data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan!!!</div>');
			redirect('admin/dashboardNilai');
		}
	}

	public function editNilai($id_nilai){

		$this->form_validation->set_rules('id_mapel', 'Nama Mapel', 'required');	
		$this->form_validation->set_rules('nis', 'Nama Siswa', 'required');
		$this->form_validation->set_rules('id_kelas', 'Nama Kelas', 'required');
		$this->form_validation->set_rules('nilai', 'Nilai', 'required');


			$data = array(	
				'user' => $this->db->get_where('tbl_user',['username' => $this->session->userdata('username')])->row(),
				'title' => 'Edit Data Nilai',
				'editNilai' => $this->admin_model->editNilai($id_nilai),
				'mapel' => $this->admin_model->namaMapel(),
				'siswa' => $this->admin_model->namaSiswa(),
				'kelas' => $this->admin_model->namaKelas(),
				'isi' => 'admin/master/pengaturanNilai/editNilai'
			);
			$this->load->view('admin/layout/v_wrapper', $data, FALSE);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Berhasil DiEdit!!!</div>');

	}

	public function requestNilai(){

		$this->form_validation->set_rules('nis', 'Nama Siswa', 'required');
		$this->form_validation->set_rules('id_nilai', 'Nilai', 'required');
		$this->form_validation->set_rules('nama_mapel', 'Nama Mapel', 'required');	
		$this->form_validation->set_rules('id_guru', 'Nama Guru', 'required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required');


			$data = array(	
				'request_siswa' => $this->input->post('nis'),
				'id_nilai' => $this->input->post('id_nilai'),
				'request_guru' => $this->input->post('id_guru'),
				'request_keterangan' => $this->input->post('nama_mapel').' -- '.$this->input->post('keterangan'),
				'request_date' => date('Y-m-d'),
				'request_status_guru' => 0,
			);
			$this->admin_model->requestNilai($data);
			$this->load->view('admin/layout/v_wrapper', $data, FALSE);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Request Nilai berhasil!!!</div>');
			redirect('admin/dashboardNilai');
	}



}

