<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_admin_tugas extends CI_Model {
  // Fungsi untuk menampilkan semua data tabel users
  public function view(){
   $this->db->select('*');
	$this->db->from('tbl_admin_tugas');
	$this->db->join('tbl_admin_kelas','tbl_admin_tugas.kelas_id=tbl_admin_kelas.kelas_id');
	$query = $this->db->get();
	return $query->result();
  }
  
  // Fungsi untuk menampilkan data berdasarkan ID nya
  public function view_by($tugas_id){
    $this->db->select('*');
	$this->db->from('tbl_admin_tugas');
	$this->db->join('tbl_admin_kelas','tbl_admin_tugas.kelas_id=tbl_admin_kelas.kelas_id');
	$this->db->where('tugas_id', $tugas_id);
	return $this->db->get()->row();
  }
 
  
  // Fungsi untuk melakukan simpan data ke tabel users
  public function add($data){
    $this->db->insert('tbl_admin_tugas', $data); // Untuk mengeksekusi perintah insert data
  }
  
  // Fungsi untuk melakukan ubah data berdasarkan ID 
  public function edit($tugas_id, $data){
    $this->db->where('tugas_id', $tugas_id);
    $this->db->update('tbl_admin_tugas', $data); // Untuk mengeksekusi perintah update data
  }
  
  // Fungsi untuk melakukan menghapus data berdasarkan nim 
  public function hapus($tugas_id){
    $this->db->where('tugas_id', $tugas_id);
    $this->db->delete('tbl_admin_tugas'); // Untuk mengeksekusi perintah delete data
  }
  
}