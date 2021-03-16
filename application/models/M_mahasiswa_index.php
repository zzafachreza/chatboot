<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_mahasiswa_index extends CI_Model {
  // Fungsi untuk menampilkan data berdasarkan ID nya
  public function view(){
	$user_id = $this->session->userdata('userid');
	$this->db->where('tbl_users.user_id', $user_id);
    return $this->db->get('tbl_users')->row();
  }
  public function viewkelas(){
	$user_id = $this->session->userdata('userid');
	$this->db->select('*');
	$this->db->from('tbl_admin_kelas');
	$this->db->join('tbl_admin_kelas_users','tbl_admin_kelas.kelas_id=tbl_admin_kelas_users.kelas_id');
	$this->db->join('tbl_users','tbl_users.user_id=tbl_admin_kelas_users.user_id');
    $this->db->where('tbl_users.user_id', $user_id);
	$query = $this->db->get();
	return $query->result();
  }
   // Fungsi untuk melakukan ubah data berdasarkan ID 
 
   public function edit($user_id, $data){
    $this->db->where('user_id', $user_id);
    $this->db->update('tbl_users', $data); // Untuk mengeksekusi perintah update data
  }
  
}