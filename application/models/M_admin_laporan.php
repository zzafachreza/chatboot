<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_admin_laporan extends CI_Model {
  // Fungsi untuk menampilkan semua data tabel users
  
  
  public function laporan($kelas_id){
    $this->db->select('*');
	$this->db->from('tbl_users');
	$this->db->join('tbl_admin_kelas_users','tbl_users.user_id=tbl_admin_kelas_users.user_id');
	$this->db->join('tbl_mahasiswa_nilai','tbl_users.user_id=tbl_mahasiswa_nilai.user_id');
	//Associative array method:
	$array = array('tbl_admin_kelas_users.kelas_id' => $kelas_id, 'tbl_mahasiswa_nilai.kelas_id' => $kelas_id);
	$this->db->where($array); 
	$query = $this->db->get();
	return $query->result();
  }
  
  public function jumlahmahasiswakelas($kelas_id){
    $this->db->select('count(*) as jumlahmahasiswakelas');
	$this->db->from('tbl_users');
	$this->db->join('tbl_admin_kelas_users','tbl_users.user_id=tbl_admin_kelas_users.user_id');
	$this->db->join('tbl_mahasiswa_nilai','tbl_users.user_id=tbl_mahasiswa_nilai.user_id');
	//Associative array method:
	$array = array('tbl_admin_kelas_users.kelas_id' => $kelas_id, 'tbl_mahasiswa_nilai.kelas_id' => $kelas_id);
	$this->db->where($array); 
	$query = $this->db->get();
	return $query->result();
  }
  
  public function jumlahtopikkelas($kelas_id){
    $this->db->select('max(nilai_topik) as jumlahtopikkelas');
	$this->db->from('tbl_admin_nilai');
	$this->db->join('tbl_admin_kelas_users','tbl_admin_nilai.kelas_users_id=tbl_admin_kelas_users.kelas_users_id');
	$array = array('tbl_admin_kelas_users.kelas_id' => $kelas_id);
	$this->db->where($array); 
	$query = $this->db->get();
	return $query->result();
  }
  
  
}