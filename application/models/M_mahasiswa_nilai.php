<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_mahasiswa_nilai extends CI_Model {
  // Fungsi untuk menampilkan data berdasarkan ID nya
  public function view(){
	$user_id = $this->session->userdata('userid');
	$this->db->select('*');
	$this->db->from('tbl_mahasiswa_nilai');
	$this->db->where('user_id', $user_id);
	$query = $this->db->get();
	return $query->result();
  }
  
  // Fungsi untuk melakukan simpan data ke tbl_mahasiswa_nilai
  public function add(){
	$user_id = $this->session->userdata('userid');  
	$kelas_id = $this->input->post('kelas_id');
	$data1 = array(
      "user_id" => $user_id,
      "m_nilai_ipk" => $this->input->post('m_nilai_ipk'),
      "m_nilai_algo" => $this->input->post('m_nilai_algo'),
      "kelas_id" => $this->input->post('kelas_id'),
      "m_nilai_creator" => $this->session->userdata('nim')
    );
	$data2 = array(
      "user_id" => $user_id,
      "m_nilai_ipk" => $this->input->post('m_nilai_ipk'),
      "m_nilai_algo" => $this->input->post('m_nilai_algo'),
      "m_nilai_updater" => $this->session->userdata('nim')
    );
	
    $query = $this->db->query("SELECT * FROM tbl_mahasiswa_nilai WHERE user_id = '$user_id' and kelas_id = '$kelas_id'");
    $result = $query->result_array();
    $count = count($result);

    if (empty($count)) {
        $this->db->insert('tbl_mahasiswa_nilai', $data1); 
    }	
    elseif ($count == 1) {
		$array = array('user_id' => $user_id, 'kelas_id' => $kelas_id);
		$this->db->where($array);
        $this->db->update('tbl_mahasiswa_nilai', $data2); 
    }
  }
  
}