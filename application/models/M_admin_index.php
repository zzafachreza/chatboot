<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_admin_index extends CI_Model {
  // Fungsi untuk menampilkan semua data tabel users
  public function view(){
	$this->db->where('user_level', 'mahasiswa');
    return $this->db->get('tbl_users')->result();
  }
  
  public function viewadmin(){
	$this->db->where('user_level', 'admin');
    return $this->db->get('tbl_users')->result();
  }
  
  // Fungsi untuk menampilkan semua data tabel kelas
  public function view2(){
    return $this->db->get('tbl_admin_kelas')->result();
  }
  
  // Fungsi untuk menampilkan semua data tabel users yang tidak dalam id berikut
  public function view3($accept){
	$this->db->where_in('user_id', $accept);
    return $this->db->get('tbl_admin_kelas_users')->result();
  }
  
  // Fungsi untuk menampilkan data berdasarkan ID nya
  public function view_by($user_id){
    $this->db->where('user_id', $user_id);
    return $this->db->get('tbl_users')->row();
  }
  
  // Fungsi untuk melakukan simpan data ke tabel users
  public function add(){
    $data = array(
      "user_nim" => $this->input->post('user_nim'),
      "user_fullname" => $this->input->post('user_fullname'),
      "user_password" => md5($this->input->post('user_password')),
      "user_email" => $this->input->post('user_email'),
      "user_semester" => $this->input->post('user_semester'),
      "user_level" => $this->input->post('user_level'),
      "user_aktif" => $this->input->post('user_aktif'),
      "user_creator" => $this->session->userdata('nim')
    );
    
    $this->db->insert('tbl_users', $data); // Untuk mengeksekusi perintah insert data
  }
  
  // Fungsi untuk melakukan ubah data berdasarkan ID 
  public function edit($user_id){
	  if($this->input->post('user_passwordlama')==$this->input->post('user_password')){
			$password = $this->input->post('user_passwordlama');
	  }else{
			$password = md5($this->input->post('user_password'));
	  }
    $data = array(
      "user_nim" => $this->input->post('user_nim'),
      "user_fullname" => $this->input->post('user_fullname'),
      "user_password" => $password,
      "user_email" => $this->input->post('user_email'),
      "user_semester" => $this->input->post('user_semester'),
      "user_level" => $this->input->post('user_level'),
      "user_aktif" => $this->input->post('user_aktif'),
	  "user_updater" => $this->session->userdata('nim')
    );
    
    $this->db->where('user_id', $user_id);
    $this->db->update('tbl_users', $data); // Untuk mengeksekusi perintah update data
  }
  
  // Fungsi untuk melakukan aktivasi berdasarkan ID 
  public function aktivasi($user_id){
    $data = array(
      "user_aktif" => 1,
	  "user_updater" => $this->session->userdata('nim')
    );
    
    $this->db->where('user_id', $user_id);
    $this->db->update('tbl_users', $data); // Untuk mengeksekusi perintah update data
  }
  
  // Fungsi untuk melakukan menghapus data berdasarkan nim siswa
  public function hapus($user_id){
    $this->db->where('user_id', $user_id);
    $this->db->delete('tbl_users'); // Untuk mengeksekusi perintah delete data
  }
}