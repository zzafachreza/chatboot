<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_mahasiswa_tugas extends CI_Model {
  // Fungsi untuk menampilkan data berdasarkan ID nya
  public function view(){
	$user_id = $this->session->userdata('userid');
	$this->db->select('*');
	$this->db->from('tbl_admin_kelas');
	$this->db->join('tbl_admin_kelas_users','tbl_admin_kelas.kelas_id=tbl_admin_kelas_users.kelas_id');
	$this->db->join('tbl_users','tbl_users.user_id=tbl_admin_kelas_users.user_id');
	$this->db->join('tbl_admin_tugas','tbl_admin_tugas.kelas_id=tbl_admin_kelas_users.kelas_id');
    $this->db->where('tbl_users.user_id', $user_id);
    $this->db->group_by('tbl_admin_tugas.kelas_id'); 
	$query = $this->db->get();
	return $query->result();
  }
  public function viewkelas(){
	$getkelas = $this->uri->segment(3);
	$this->db->select('*');
	$this->db->from('tbl_admin_kelas');
	$this->db->where('kelas_id', $getkelas);
	$query = $this->db->get();
	return $query->result();
  }
  public function tugas(){
	$getkelas = $this->uri->segment(3);
	$gettopik = $this->uri->segment(4);
	$this->db->select('*');
	$this->db->from('tbl_admin_tugas');
	$array = array('kelas_id' => $getkelas, 'tugas_topik' => $gettopik);
	$this->db->where($array); 
	$query = $this->db->get();
	return $query->result();
  }
  public function jumlahtugas($kelas_id){
    $this->db->select('max(tugas_topik) as jumlahtugas');
	$this->db->from('tbl_admin_tugas');
	$this->db->where('tbl_admin_tugas.kelas_id', $kelas_id);
	$query = $this->db->get();
	return $query->result();
  }
  
}