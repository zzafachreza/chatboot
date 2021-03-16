<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_admin_nilai extends CI_Model {
  // Fungsi untuk menampilkan semua data
  public function view() {
	$this->db->select('*');
	$this->db->from('tbl_admin_nilai');
	$this->db->join('tbl_admin_kelas_users','tbl_admin_kelas_users.kelas_users_id=tbl_admin_nilai.kelas_users_id');
	$this->db->join('tbl_users','tbl_users.user_id=tbl_admin_kelas_users.user_id');
	$this->db->join('tbl_admin_kelas','tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id');
	$query = $this->db->get();
	return $query->result();
  }
  
  // Fungsi untuk menampilkan data berdasarkan ID nya
  public function view_by($nilai_id){
	$this->db->select('*');
	$this->db->join('tbl_admin_kelas_users','tbl_admin_kelas_users.kelas_users_id=tbl_admin_nilai.kelas_users_id');
	$this->db->join('tbl_users','tbl_users.user_id=tbl_admin_kelas_users.user_id');
	$this->db->join('tbl_admin_kelas','tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id');
    $this->db->where('nilai_id', $nilai_id);
    return $this->db->get('tbl_admin_nilai')->row();
  }

  
  // Fungsi untuk melakukan simpan data
  public function add_array(){
	$jumlah_kelas_users_id = count($this->input->post('kelas_users_id'));
	
	for($x = 0; $x<$jumlah_kelas_users_id; $x++){
		$data = array(
		"kelas_users_id" => $this->input->post('kelas_users_id')[$x],
		"nilai_topik" => $this->input->post('nilai_topik')[$x],
		"nilai_makalah" => $this->input->post('nilai_makalah')[$x],
		"nilai_presentasi" => $this->input->post('nilai_presentasi')[$x],
		"nilai_kelompok" => $this->input->post('nilai_kelompok')[$x],
		"nilai_individu" => $this->input->post('nilai_individu')[$x],
		"nilai_praktek" => $this->input->post('nilai_praktek')[$x],
		"nilai_peningkatan" => $this->input->post('nilai_peningkatan')[$x],
		"nilai_creator" => $this->session->userdata('nim')
		);
		$this->db->insert('tbl_admin_nilai', $data); // Untuk mengeksekusi perintah insert data
	}
  }
  
   // Fungsi untuk melakukan ubah data
  public function edit_array(){
	$jumlah_nilai_id = count($this->input->post('nilai_id'));
	
	for($x = 0; $x<$jumlah_nilai_id; $x++){
		$data = array(
		"nilai_topik" => $this->input->post('nilai_topik')[$x],
		"nilai_makalah" => $this->input->post('nilai_makalah')[$x],
		"nilai_presentasi" => $this->input->post('nilai_presentasi')[$x],
		"nilai_kelompok" => $this->input->post('nilai_kelompok')[$x],
		"nilai_individu" => $this->input->post('nilai_individu')[$x],
		"nilai_praktek" => $this->input->post('nilai_praktek')[$x],
		"nilai_peningkatan" => $this->input->post('nilai_peningkatan')[$x],
		"nilai_updater" => $this->session->userdata('nim')
		);
		$this->db->where('nilai_id', $this->input->post('nilai_id')[$x]);
		$this->db->update('tbl_admin_nilai', $data); // Untuk mengeksekusi perintah update data
	}
  }
  
  /////////////////////////////////////////
  
   // Fungsi untuk melakukan simpan data
  public function uts_add_array(){
	$jumlah_kelas_users_id = count($this->input->post('kelas_users_id'));
	
	for($x = 0; $x<$jumlah_kelas_users_id; $x++){
		$data = array(
		"kelas_users_id" => $this->input->post('kelas_users_id')[$x],
		"nilai_uts" => $this->input->post('nilai_uts')[$x],
		"uts_creator" => $this->session->userdata('nim')
		);
		$this->db->insert('tbl_admin_nilai_uts', $data); // Untuk mengeksekusi perintah insert data
	}
  }
  
   // Fungsi untuk melakukan ubah data
  public function uts_edit_array(){
	$jumlah_uts_id = count($this->input->post('uts_id'));
	
	for($x = 0; $x<$jumlah_uts_id; $x++){
		$data = array(
		"nilai_uts" => $this->input->post('nilai_uts')[$x],
		"uts_updater" => $this->session->userdata('nim')
		);
		$this->db->where('uts_id', $this->input->post('uts_id')[$x]);
		$this->db->update('tbl_admin_nilai_uts', $data); // Untuk mengeksekusi perintah update data
	}
  }
  
  /////////////////////////////////////////
  
  /////////////////////////////////////////
  
   // Fungsi untuk melakukan simpan data
  public function uas_add_array(){
	$jumlah_kelas_users_id = count($this->input->post('kelas_users_id'));
	
	for($x = 0; $x<$jumlah_kelas_users_id; $x++){
		$data = array(
		"kelas_users_id" => $this->input->post('kelas_users_id')[$x],
		"nilai_uas" => $this->input->post('nilai_uas')[$x],
		"nilai_uas_praktek" => $this->input->post('nilai_uas_praktek')[$x],
		"uts_creator" => $this->session->userdata('nim')
		);
		$this->db->insert('tbl_admin_nilai_uas', $data); // Untuk mengeksekusi perintah insert data
	}
  }
  
   // Fungsi untuk melakukan ubah data
  public function uas_edit_array(){
	$jumlah_uas_id = count($this->input->post('uas_id'));
	
	for($x = 0; $x<$jumlah_uas_id; $x++){
		$data = array(
		"nilai_uas" => $this->input->post('nilai_uas')[$x],
		"nilai_uas_praktek" => $this->input->post('nilai_uas_praktek')[$x],
		"uas_updater" => $this->session->userdata('nim')
		);
		$this->db->where('uas_id', $this->input->post('uas_id')[$x]);
		$this->db->update('tbl_admin_nilai_uas', $data); // Untuk mengeksekusi perintah update data
	}
  }
  
  /////////////////////////////////////////
  
  public function add(){
    $data = array(
      "kelas_users_id" => $this->input->post('kelas_users_id'),
      "nilai_angka" => $this->input->post('nilai_angka'),
      "nilai_topik" => $this->input->post('nilai_topik'),
      "nilai_creator" => $this->session->userdata('nim')
    );
    
    $this->db->insert('tbl_admin_nilai', $data); // Untuk mengeksekusi perintah insert data
  }
  
  // Fungsi untuk melakukan ubah data berdasarkan ID 
  public function edit($nilai_id){
    $data = array(
      "nilai_angka" => $this->input->post('nilai_angka'),
      "nilai_topik" => $this->input->post('nilai_topik'),
	  "nilai_updater" => $this->session->userdata('nim')
    );
    
    $this->db->where('nilai_id', $nilai_id);
    $this->db->update('tbl_admin_nilai', $data); // Untuk mengeksekusi perintah update data
  }
  
  // Fungsi untuk melakukan menghapus data berdasarkan nim siswa
  public function hapus($nilai_id){
    $this->db->where('nilai_id', $nilai_id);
    $this->db->delete('tbl_admin_nilai'); // Untuk mengeksekusi perintah delete data
  }
}