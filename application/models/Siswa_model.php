<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa_model extends CI_Model {

	public function getProfile($nis){

		$this->db->select('*');
		$this->db->from('tbl_siswa');
		$this->db->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_siswa.kelas');
		$this->db->where('tbl_siswa.nis', $nis);
		return $this->db->get()->row();

	}

	public function detailSiswa($id_siswa)
	{
		$this->db->select('*');
		$this->db->from('tbl_siswa');
		$this->db->join('tbl_kelas', 'tbl_kelas.jenis_kelas = tbl_siswa.kelas', 'left');
		$this->db->where('id_siswa', $id_siswa);
		return $this->db->get()->row();
	}

	public function editSiswa($data)
	{
		$this->db->where('id_siswa', $data['id_siswa']);
		$this->db->update('tbl_siswa', $data);
	}

	public function detailNilai($nis){

		$this->db->select('*');
		$this->db->from('tbl_siswa');
		$this->db->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_siswa.kelas');
		$this->db->where('tbl_siswa.nis', $nis);
		return $this->db->get()->row();
	}

	public function allNilai($nis){

		$this->db->select('*');
		$this->db->from('tbl_nilai');
		$this->db->join('tbl_mapel', 'tbl_mapel.id_mapel = tbl_nilai.id_mapel');
		$this->db->join('tbl_siswa', 'tbl_siswa.nis = tbl_nilai.nis');
		$this->db->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_nilai.id_kelas');
		$this->db->where('tbl_nilai.nis', $nis);
		return $this->db->get()->result();
	}

	public function getNotif($request_siswa){

		// $updateQuery= "UPDATE esurat_comment SET comment_status=1 WHERE comment_status=0";

		$query = "SELECT * FROM tbl_request WHERE request_siswa = '$request_siswa' ORDER BY id_request DESC LIMIT 5";


		$output = '';

		if($this->db->query($query)->num_rows() > 0){

			foreach ($this->db->query($query)->result() as $row) {
				$output .= '
				<a href="'.base_url('siswa/notif/').'" class="dropdown-item">
				<div class="media">
				<div class="media-body">';

				$output .= '
				<p class="text-sm"> Nilai Mapel telah DiUpdate  ||  '.$row->request_keterangan.'</p>
				<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>'.$row->request_date.'</p>
				</div>
				</div>
				</a>
				<div class="dropdown-divider"></div>
				';
			}
			$output .= '
			<div class="dropdown-divider"></div>
			<a href="'.base_url('siswa/notif').'" class="dropdown-item dropdown-footer">See All Notifications</a>
			';

		}else{

			$output .= '
			<span class="dropdown-item dropdown-header">No Notification Found</span>
			<div class="dropdown-divider"></div>
			<a href="'.base_url('siswa/notif').'" class="dropdown-item dropdown-footer">See All Notifications</a>
			';

		}



		$query1 = "SELECT * FROM tbl_request WHERE request_siswa = '$request_siswa' AND request_status_siswa=0";
		$count = $this->db->query($query1)->num_rows();

		$data = array(
			'notification' => $output,
			'unseen_notification' => $count
		);



		return $data;
	}

	public function getAllNotif($id_request)
	{
		$query = "SELECT * FROM  tbl_request WHERE request_siswa = '$request_siswa' ORDER BY  id_request DESC";
		return $this->db->query($query)->result();
	}

	public function logo($id_logo){

		$this->db->select('*');
		$this->db->from('tbl_logo');
		$this->db->where('tbl_logo.id_logo', $id_logo);
		return $this->db->get()->result();

	}

}
