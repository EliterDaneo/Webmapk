<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Guru_model extends CI_Model {

//Model Nilai
	public function listsNilai()
	{
		$this->db->select('*');
		$this->db->from('tbl_nilai');
		$this->db->join('tbl_mapel', 'tbl_mapel.id_mapel = tbl_nilai.id_mapel');
		$this->db->join('tbl_siswa', 'tbl_siswa.nis = tbl_nilai.nis');
		$this->db->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_nilai.id_kelas');
		return $this->db->get()->result();
	}

	public function namaMapel($nik){
		$this->db->select('*');
		$this->db->from('tbl_mapel');
		$this->db->join('tbl_guru', 'tbl_guru.id_mapel = tbl_mapel.id_mapel');
		$this->db->where('tbl_guru.nik', $nik);
		return $this->db->get()->row();
	}

	public function namaMapelAll(){
		$this->db->select('*');
		$this->db->from('tbl_mapel');
		$this->db->order_by('id_mapel', 'DESC');
		return $this->db->get()->result();
	}

	public function namaSiswaAll(){
		$this->db->select('*');
		$this->db->from('tbl_siswa');
		$this->db->order_by('id_siswa', 'DESC');
		return $this->db->get()->result();
	}

	public function namaKelasAll(){
		$this->db->select('*');
		$this->db->from('tbl_kelas');
		$this->db->order_by('id_kelas', 'DESC');
		return $this->db->get()->result();
	}

	public function tambahNilai($data)
	{
		$this->db->insert('tbl_nilai', $data);
	}

	public function editNilai($id_nilai)
	{
		$this->db->select('*');
		$this->db->from('tbl_nilai');
		$this->db->where('id_nilai', $id_nilai);
		return $this->db->get()->row();
	}

	public function updateNilai($data)
	{
		$this->db->where('id_nilai', $data['id_nilai']);
		$this->db->update('tbl_nilai', $data);
	}


	public function detailGuru($id_guru)
	{
		$this->db->select('*');
		$this->db->from('tbl_guru');
		$this->db->where('id_guru', $id_guru);
		return $this->db->get()->row();
	}

	public function getNotif($request_guru){

		// $updateQuery= "UPDATE esurat_comment SET comment_status=1 WHERE comment_status=0";

		$query = "SELECT * FROM tbl_request WHERE request_guru = '$request_guru' ORDER BY id_request DESC LIMIT 5";

		$output = '';

		if($this->db->query($query)->num_rows() > 0){

			foreach ($this->db->query($query)->result() as $row) {
				$output .= '
				<a href="'.base_url('guru/editNilai/'.$row->id_nilai).'" class="dropdown-item">
				<div class="media">
				<div class="media-body">';

				$output .= '
				<p class="text-sm">'.$row->request_keterangan.'</p>
				<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>'.$row->request_date.'</p>
				</div>
				</div>
				</a>
				<div class="dropdown-divider"></div>
				';
			}
			$output .= '
			<div class="dropdown-divider"></div>
			<a href="'.base_url('guru/notif').'" class="dropdown-item dropdown-footer">See All Notifications</a>
			';

		}else{

			$output .= '
			<span class="dropdown-item dropdown-header">No Notification Found</span>
			<div class="dropdown-divider"></div>
			<a href="'.base_url('guru/notif').'" class="dropdown-item dropdown-footer">See All Notifications</a>
			';

		}



		$query1 = "SELECT * FROM tbl_request WHERE request_guru = '$request_guru' AND request_status_guru=0";
		$count = $this->db->query($query1)->num_rows();

		$data = array(
			'notification' => $output,
			'unseen_notification' => $count
		);



		return $data;
	}

	public function getAllNotif()
	{
		$this->db->select('*');
		$this->db->from('tbl_request');
		$this->db->order_by('id_request', 'DESC');
		return $this->db->get()->result();
	}

	public function deleteNotif($data)
	{
		$this->db->where('id_request', $data['id_request']);
		$this->db->delete('tbl_request', $data);
	}

	public function getProfile($nik){

		$this->db->select('*');
		$this->db->from('tbl_guru');
		$this->db->join('tbl_mapel', 'tbl_mapel.id_mapel = tbl_guru.id_mapel');
		// $this->db->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_guru.wali_siswa');
		$this->db->where('tbl_guru.nik', $nik);
		return $this->db->get()->row();

	}
	
}
