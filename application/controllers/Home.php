<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){

		parent::__construct();
		/*-- untuk mengatasi error confirm form resubmission  --*/
		header('Cache-Control: no-cache, must-revalidate, max-age=0');
		header('Cache-Control: post-check=0, pre-check=0',false);
		header('Pragma: no-cache');
		$this->load->model('home_model');
	}

	public function index()
	{
		$data = array(
			'title' => 'Web Sekolah' , 
			'parent' => 'MA PK MAARIF NGALIAN',
			'isi' => 'home/v_home'
		);
		$this->load->view('home/layout/v_wrapper', $data, FALSE);
	}

//controler dwonload
	public function download()
	{
		$data = array(
			'parent' => 'Download Area' , 
			'title' => 'MA PK MAARIF NGALIAN',
			'download' => $this->home_model->download(),
			'isi' => 'home/pengaturanHome/v_download'
		);
		$this->load->view('home/layout/v_wrapper', $data, FALSE);
	}

//controler guru
	public function guru()
	{
		$data = array(
			'parent' => 'Daftar Guru' , 
			'title' => 'MA PK MAARIF NGALIAN',
			'guru' => $this->home_model->guru(),
			'isi' => 'home/pengaturanHome/v_guru'
		);
		$this->load->view('home/layout/v_wrapper', $data, FALSE);
	}

	public function galery()
	{
		$data = array(
			'parent' => 'Daftar Galery' , 
			'title' => 'MA PK MAARIF NGALIAN',
			'galery' => $this->home_model->galery(),
			'isi' => 'home/pengaturanHome/v_galery'
		);
		$this->load->view('home/layout/v_wrapper', $data, FALSE);
	}

	public function berita()
	{
		$this->load->library('pagination');
		$config['base_url'] = base_url('home/berita');
		$config['total_rows'] = count($this->m_home->total_berita());
		$config['per_page'] = 8;
		$config['url_segmen'] = 3;
		$limit = $config['per_page'];
		$start = ($this->uri->segment(3)) ? ($this->uri->segment(3)) : 0;
			//....
		$config['first_link']	= 'first';
		$config['last_link']	= 'last';
		$config['next_link']	= 'next';
		$config['priview_link']	= 'priview';
		$config['full_tag_open']	= '<div class="pagination_container d-flex flex-row align-items-center justify-content-start text-center"><ul class="pagination_list">';
		$config['num_tag_open']		= '<li>';
		$config['num_tag_close']	= '</li>';
		$config['cur_tag_open']		= '<li class="active"><a></a>';
		$config['cur_tag_close']	= '</a></li>';
		$config['next_tag_open']		= '<li>';
		$config['next_tag_open']		= '</li>';
		$config['prev_tag_open']		= '<li>';
		$config['prev_tag_close']		= '</li>';
		$config['firts_tag_open']		= '<li>';
		$config['firts_tag_close']		= '</li>';
		$config['last_tag_open']		= '<li>';
		$config['last_tag_close']		= '</li>';
		$config['full_tag_close']		= '</ul></div>';
			//......
		$this->pagination->initialize($config);

		$data = array(
			'pagination' => $this->pagination->create_links(),
			'limit_berita' => $this->m_home->limit_berita(),
			'berita'	=> $this->m_home->berita($limit,$start),
			'title' => 'Data Berita',
			'isi' => 'home/v_berita'
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}

	public function detail_berita($slug_berita)
	{
		$data = array(
			'title' => 'Detail Berita',
			'limit_berita' => $this->m_home->limit_berita(),
			'berita' => $this->m_home->detail_berita($slug_berita),
			'isi' => 'home/v_detail_berita'
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}


}