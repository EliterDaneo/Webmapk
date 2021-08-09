<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {
	
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
//model Home
	public function download()
	{
		$this->db->select('*');
		$this->db->from('tbl_file');
		$this->db->order_by('id_file', 'DESC');
		return $this->db->get()->result();
	}

	public function guru()
	{
		$this->db->select('*');
		$this->db->from('tbl_guru');
		$this->db->join('tbl_mapel', 'tbl_mapel.id_mapel = tbl_guru.id_mapel', 'left');
		$this->db->order_by('id_guru', 'desc');
		return $this->db->get()->result();
	}

	public function galery()
	{
		$this->db->select('tbl_galery.*,count(tbl_foto.id_galery)as jml_foto');
		$this->db->from('tbl_galery');
		$this->db->join('tbl_foto','tbl_foto.id_galery = tbl_galery.id_galery', 'left');
		$this->db->group_by('tbl_galery.id_galery');
		$this->db->order_by('tbl_galery.id_galery', 'DESC');
		return $this->db->get()->result();
	}

	public function detail_galery($id_galery)
	{
		$this->db->select('*');
		$this->db->from('tbl_foto');
		$this->db->where('id_galery', $id_galery);
		$this->db->order_by('foto', 'DESC');
		return $this->db->get()->result();
	}

	public function berita($limit,$start)
	{
		$this->db->select('*');
		$this->db->from('tbl_berita');
		$this->db->join('tbl_user','tbl_user.id_user = tbl_berita.id_user','left');
		$this->db->order_by('id_berita', 'desc');
		$this->db->limit($limit,$start);
		return $this->db->get()->result();
	}

	public function total_berita()
	{
		$this->db->select('*');
		$this->db->from('tbl_berita');
		$this->db->join('tbl_user','tbl_user.id_user = tbl_berita.id_user','left');
		$this->db->order_by('id_berita', 'desc');
		return $this->db->get()->result();
	}

	public function detail_berita($slug_berita)
	{
		$this->db->select('*');
		$this->db->from('tbl_berita');
		$this->db->join('tbl_user','tbl_user.id_user = tbl_berita.id_user','left');
		$this->db->where('slug_berita', $slug_berita);
		return $this->db->get()->row();
	}

	public function limit_berita()
	{
		$this->db->select('*');
		$this->db->from('tbl_berita');
		$this->db->join('tbl_user','tbl_user.id_user = tbl_berita.id_user','left');
		$this->db->order_by('id_berita', 'desc');
		$this->db->limit(10);
		return $this->db->get()->result();
	}

}