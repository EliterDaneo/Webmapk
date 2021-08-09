<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function login($username)
	{
		$this->db->select('*');
		$this->db->from('tbl_user');
		$this->db->where('username', $username);
		return $this->db->get()->row();
	}

	public function website(){

		$query = "SELECT * FROM tbl_seting";
		return $this->db->query($query)->row()->nama_sekolah;

	}

}
