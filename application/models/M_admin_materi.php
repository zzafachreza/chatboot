<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_admin_materi extends CI_Model {
  // Fungsi untuk menampilkan semua data tabel users
  public function view(){
   $this->db->select('*');
	$this->db->from('tbl_admin_materi');
	$this->db->join('tbl_admin_kelas','tbl_admin_materi.kelas_id=tbl_admin_kelas.kelas_id');
	$query = $this->db->get();
	return $query->result();
  }
  
  // Fungsi untuk menampilkan data berdasarkan ID nya
  public function view_by($materi_id){
    $this->db->select('*');
	$this->db->from('tbl_admin_materi');
	$this->db->join('tbl_admin_kelas','tbl_admin_materi.kelas_id=tbl_admin_kelas.kelas_id');
	$this->db->where('materi_id', $materi_id);
	return $this->db->get()->row();
  }
 
  
  // Fungsi untuk melakukan simpan data ke tabel users
  public function add($data){
    $this->db->insert('tbl_admin_materi', $data); // Untuk mengeksekusi perintah insert data
  }
  
  // Fungsi untuk melakukan ubah data berdasarkan ID 
  public function edit($materi_id, $data){
    $this->db->where('materi_id', $materi_id);
    $this->db->update('tbl_admin_materi', $data); // Untuk mengeksekusi perintah update data
  }
  
  // Fungsi untuk melakukan menghapus data berdasarkan nim 
  public function hapus($materi_id){
    $this->db->where('materi_id', $materi_id);
    $this->db->delete('tbl_admin_materi'); // Untuk mengeksekusi perintah delete data
  }
  
}