<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_mahasiswa_group extends CI_Model {
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
	$query = $this->db->get();
	return $query->result();
  }
  
  public function view(){
    return $this->db->get('tbl_admin_kelas')->result();
  }
  
 public function view_by($kelas_id){
    $this->db->where('kelas_id', $kelas_id);
    return $this->db->get('tbl_admin_kelas')->row();
  }
  
  
}