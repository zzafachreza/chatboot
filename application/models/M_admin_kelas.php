<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_admin_kelas extends CI_Model {
  // Fungsi untuk menampilkan semua data tabel users
  public function view(){
    return $this->db->get('tbl_admin_kelas')->result();
  }
  
  public function view2(){
    $this->db->select('*');
	$this->db->from('tbl_admin_kelas_users');
	$this->db->join('tbl_users','tbl_users.user_id=tbl_admin_kelas_users.user_id');
	$this->db->join('tbl_admin_kelas','tbl_admin_kelas.kelas_id=tbl_admin_kelas_users.kelas_id');
	$query = $this->db->get();
	return $query->result();
  }
  
  public function view3(){
	$accept = $this->uri->segment(3);
    $this->db->select('*');
	$this->db->from('tbl_admin_kelas_users');
	$this->db->join('tbl_users','tbl_users.user_id=tbl_admin_kelas_users.user_id');
	$this->db->join('tbl_admin_kelas','tbl_admin_kelas.kelas_id=tbl_admin_kelas_users.kelas_id');
	$this->db->where_in('tbl_admin_kelas_users.kelas_id', $accept);
	$query = $this->db->get();
	return $query->result();
  }
  
  // Fungsi untuk menampilkan data berdasarkan ID nya
  public function view_by($kelas_id){
    $this->db->where('kelas_id', $kelas_id);
    return $this->db->get('tbl_admin_kelas')->row();
  }
  // Fungsi untuk menampilkan data berdasarkan ID nya
  public function view_kelas_users_by($kelas_users_id){
	$this->db->select('*');
	$this->db->from('tbl_admin_kelas_users');
	$this->db->join('tbl_users','tbl_users.user_id=tbl_admin_kelas_users.user_id');
	$this->db->join('tbl_admin_kelas','tbl_admin_kelas.kelas_id=tbl_admin_kelas_users.kelas_id');
    $this->db->where('kelas_users_id', $kelas_users_id);
    return $this->db->get()->row();
  }
  
  // Fungsi untuk melakukan simpan data ke tabel users
  public function add(){
    $data = array(
      "kelas_nama" => $this->input->post('kelas_nama'),
      "kelas_nilai_x" => $this->input->post('kelas_nilai_x'),
      "kelas_nilai_y" => $this->input->post('kelas_nilai_y'),
      "kelas_creator" => $this->session->userdata('nim')
    );
    
    $this->db->insert('tbl_admin_kelas', $data); // Untuk mengeksekusi perintah insert data
  }
  // Fungsi untuk melakukan simpan data ke tabel users
  public function add_kelas_users(){
    $data = array(
      "user_id" => $this->input->post('user_id'),
      "kelas_id" => $this->input->post('kelas_id'),
      "kelas_users_creator" => $this->session->userdata('nim')
    );
    
    $this->db->insert('tbl_admin_kelas_users', $data); // Untuk mengeksekusi perintah insert data
  }
  
  // Fungsi untuk melakukan ubah data berdasarkan ID 
  public function edit($kelas_id){
    $data = array(
      "kelas_nama" => $this->input->post('kelas_nama'),
      "kelas_nilai_x" => $this->input->post('kelas_nilai_x'),
      "kelas_nilai_y" => $this->input->post('kelas_nilai_y'),
	  "kelas_updater" => $this->session->userdata('nim')
    );
    
    $this->db->where('kelas_id', $kelas_id);
    $this->db->update('tbl_admin_kelas', $data); // Untuk mengeksekusi perintah update data
  }
  // Fungsi untuk melakukan ubah data berdasarkan ID 
  public function edit_kelas_users($kelas_users_id){
    $data = array(
      "user_id" => $this->input->post('user_id'),
      "kelas_id" => $this->input->post('kelas_id'),
      "tugas" => $this->input->post('tugas'),
	  "kelas_users_updater" => $this->session->userdata('nim')
    );
    
    $this->db->where('kelas_users_id', $kelas_users_id);
    $this->db->update('tbl_admin_kelas_users', $data); // Untuk mengeksekusi perintah update data
  }
  
  // Fungsi untuk melakukan menghapus data berdasarkan nim 
  public function hapus($kelas_id){
    $this->db->where('kelas_id', $kelas_id);
    $this->db->delete('tbl_admin_kelas'); // Untuk mengeksekusi perintah delete data
  }
  // Fungsi untuk melakukan menghapus data berdasarkan nim 
  public function hapus_kelas_users($kelas_users_id){
    $this->db->where('kelas_users_id', $kelas_users_id);
    $this->db->delete('tbl_admin_kelas_users'); // Untuk mengeksekusi perintah delete data
  }
}