<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('status') != "login" or $this->session->userdata('level') != "admin"){
			redirect(base_url("login"));
		}
		$this->load->model('m_admin_index'); // Load  ke controller ini
		$this->load->model('m_admin_kelas'); // Load  ke controller ini
		$this->load->model('m_admin_nilai'); // Load  ke controller ini
		$this->load->model('m_admin_materi'); // Load  ke controller ini
		$this->load->model('m_admin_tugas'); // Load  ke controller ini
		$this->load->model('m_admin_laporan'); // Load  ke controller ini
		$this->load->model('m_general'); // Load  ke controller ini
	}
	
	// START INI ADALAH FUNGSI FUNGSI UNTUK HALAMAN KONFIRMASI
	public function index()
    {
		$data['tbl_users'] = $this->m_admin_index->view();
        $this->load->view("v_admin_header");


        $this->load->view("v_admin_index", $data);

       $this->load->view("v_admin_footer_datatables");
$this->load->view("v_admin_chat"); //ini adalah fitur chatting
        
    }
	public function indexadmin()
    {
		$data['tbl_users'] = $this->m_admin_index->viewadmin();
        $this->load->view("v_admin_header");

        $this->load->view("v_admin_index", $data);
        $this->load->view("v_admin_footer_datatables");
		$this->load->view("v_admin_chat"); //ini adalah fitur chatting
    }		
	public function index_tambah()
    {
		$this->load->view("v_admin_header_form");
        $this->load->view("v_admin_index_add");
		$this->load->view("v_admin_footer_form");
    }
	public function index_ubah($user_id)
	{
		$data['tbl_users'] = $this->m_admin_index->view_by($user_id);
		$this->load->view("v_admin_header_form");
		$this->load->view('v_admin_index_edit', $data);
		$this->load->view("v_admin_footer_form");
	}	
	public function index_aksi_tambah()
    {
        if($this->input->post('submit')){
			$this->m_admin_index->add(); // Panggil fungsi add() yang ada di M_admin_index.php
			redirect('admin');
		}    
    }	
	public function index_aksi_ubah($user_id)
    {
        if($this->input->post('submit')){
			$this->m_admin_index->edit($user_id); // Panggil fungsi edit() yang ada di M_admin_index.php
			redirect('admin');
		}    
    }
	public function index_ubah_konfirmasi($user_id)
    {
        $this->m_admin_index->aktivasi($user_id); // Panggil fungsi edit() yang ada di M_admin_index.php
		redirect('admin');   
    }	
	public function index_aksi_hapus($user_id){
			$this->m_admin_index->hapus($user_id); // Panggil fungsi hapus() yang ada di M_admin_index.php
			redirect('admin');
	}
	// END INI ADALAH FUNGSI FUNGSI UNTUK HALAMAN KONFIRMASI
	
	
	// START INI ADALAH FUNGSI FUNGSI UNTUK HALAMAN INPUT kelas
	public function kelas()
    {
		$data['tbl_admin_kelas'] = $this->m_admin_kelas->view();
		$data['tbl_admin_kelas_users'] = $this->m_admin_kelas->view2();
        $this->load->view("v_admin_header");
        $this->load->view("v_admin_kelas", $data);
       $this->load->view("v_admin_footer_datatables");
$this->load->view("v_admin_chat"); //ini adalah fitur chatting
    }	
	public function kelas_tambah()
    {
		$this->load->view("v_admin_header_form");
        $this->load->view("v_admin_kelas_add");
		$this->load->view("v_admin_footer_form");
    }
	public function kelas_ubah($kelas_id)
	{
		$data['tbl_admin_kelas'] = $this->m_admin_kelas->view_by($kelas_id);
		$this->load->view("v_admin_header_form");
		$this->load->view('v_admin_kelas_edit', $data);
		$this->load->view("v_admin_footer_form");
	}	
	public function kelas_aksi_tambah()
    {
        if($this->input->post('submit')){
			$this->m_admin_kelas->add(); // Panggil fungsi add() yang ada di M_admin_kelas.php
			redirect('admin/kelas');
		}    
    }	
	public function kelas_aksi_ubah($kelas_id)
    {
        if($this->input->post('submit')){
			$this->m_admin_kelas->edit($kelas_id); // Panggil fungsi edit() yang ada di M_admin_kelas.php
			redirect('admin/kelas');
		}    
    }	
	public function kelas_aksi_hapus($kelas_id){
			$this->m_admin_kelas->hapus($kelas_id); // Panggil fungsi hapus() yang ada di M_admin_kelas.php
			redirect('admin/kelas');
	}
	// END INI ADALAH FUNGSI FUNGSI UNTUK HALAMAN INPUT kelas
	
	
	// START INI ADALAH FUNGSI FUNGSI UNTUK HALAMAN INPUT kelas USERS
	public function kelas_users_tambah()
    {
		$data['tbl_admin_kelas'] = $this->m_admin_kelas->view();
		$data['tbl_users'] = $this->m_admin_index->view();
		$this->load->view("v_admin_header_form");
        $this->load->view("v_admin_kelas_users_add", $data);
		$this->load->view("v_admin_footer_form");
    }
	public function kelas_users_ubah($kelas_users_id)
	{
		$data['tbl_admin_kelas'] = $this->m_admin_kelas->view();
		$data['tbl_users'] = $this->m_admin_index->view();
		$data['tbl_admin_kelas_users'] = $this->m_admin_kelas->view_kelas_users_by($kelas_users_id);
		$this->load->view("v_admin_header_form");
		$this->load->view('v_admin_kelas_users_edit', $data);
		$this->load->view("v_admin_footer_form");
	}	
	public function kelas_users_aksi_tambah()
    {
        if($this->input->post('submit')){
			$this->m_admin_kelas->add_kelas_users(); // Panggil fungsi add_users() yang ada di M_admin_kelas.php
			redirect('admin/kelas');
		}    
    }	
	public function kelas_users_aksi_ubah($kelas_users_id)
    {
        if($this->input->post('submit')){
			$this->m_admin_kelas->edit_kelas_users($kelas_users_id); // Panggil fungsi edit_users() yang ada di M_admin_kelas.php
			redirect('admin/kelas');
		}    
    }	
	public function kelas_users_aksi_hapus($kelas_users_id){
			$this->m_admin_kelas->hapus_kelas_users($kelas_users_id); // Panggil fungsi hapus_users() yang ada di M_admin_kelas.php
			redirect('admin/kelas');
	}
	// END INI ADALAH FUNGSI FUNGSI UNTUK HALAMAN INPUT kelas USERS
	
	// START INI ADALAH FUNGSI FUNGSI UNTUK HALAMAN INPUT NILAI
	public function nilai($wherekelas="", $wheretopik="")
    {
		$data['tbl_admin_nilai'] = $this->db->query("select 
tbl_admin_kelas.kelas_id,
tbl_admin_nilai.nilai_topik,
tbl_admin_nilai.nilai_id,
tbl_users.user_nim,
tbl_users.user_fullname,
tbl_admin_nilai.nilai_makalah,
tbl_admin_nilai.nilai_presentasi,
tbl_admin_nilai.nilai_kelompok,
tbl_admin_nilai.nilai_individu,
tbl_admin_nilai.nilai_praktek,
(SELECT nilai_pretest
         FROM tbl_admin_nilai_pretest
         WHERE tbl_admin_nilai_pretest.kelas_users_id = tbl_admin_nilai.kelas_users_id
         AND tbl_admin_nilai_pretest.nilaipretest_topik=tbl_admin_nilai.nilai_topik
               ) AS nilai_pretest,
tbl_admin_nilai.nilai_peningkatan,
tbl_admin_nilai.nilai_angka,
ROUND((
(((tbl_admin_nilai.nilai_makalah*3)+(tbl_admin_nilai.nilai_presentasi*2))/5*2)+
(((tbl_admin_nilai.nilai_kelompok*3)+(tbl_admin_nilai.nilai_individu*3))/6*3)+
(tbl_admin_nilai.nilai_praktek*2)+
((SELECT nilai_pretest
         FROM tbl_admin_nilai_pretest
         WHERE tbl_admin_nilai_pretest.kelas_users_id = tbl_admin_nilai.kelas_users_id
         AND tbl_admin_nilai_pretest.nilaipretest_topik=tbl_admin_nilai.nilai_topik)*2)+
(tbl_admin_nilai.nilai_peningkatan*1)
)/10,2) as nilai_total
 from tbl_admin_nilai
		join tbl_admin_kelas_users ON tbl_admin_nilai.kelas_users_id=tbl_admin_kelas_users.kelas_users_id
		join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
		join tbl_users ON tbl_users.user_id=tbl_admin_kelas_users.user_id
		WHERE tbl_admin_kelas.kelas_id='$wherekelas' AND tbl_admin_nilai.nilai_topik='$wheretopik'	
		ORDER by tbl_users.user_fullname ASC
		")->result();
		
		$data['tbl_admin_inputnilai'] = $this->db->query("select 
tbl_admin_kelas.kelas_id,
tbl_admin_kelas_users.kelas_users_id,
tbl_users.user_nim,
tbl_users.user_fullname
 from tbl_users
		join tbl_admin_kelas_users ON tbl_users.user_id=tbl_admin_kelas_users.user_id
		join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
WHERE tbl_admin_kelas.kelas_id='$wherekelas' 
AND kelas_users_id NOT IN (SELECT kelas_users_id FROM tbl_admin_nilai WHERE nilai_topik='$wheretopik')
		ORDER by tbl_users.user_fullname ASC
		")->result();
		$data['tbl_admin_kelas'] = $this->m_admin_index->view2();
		$data['tbl_admin_kelas_2'] = $this->m_admin_kelas->view_by($wherekelas);
		$this->load->view("v_admin_header");
        $this->load->view("v_admin_nilai", $data);
		$this->load->view("v_admin_footer_datatables");
    }	
	
	// START INI ADALAH FUNGSI FUNGSI UNTUK HALAMAN INPUT NILAI UTS
	public function nilaiuts($wherekelas="")
    {
		$data['tbl_admin_nilai_uts'] = $this->db->query("select 
tbl_admin_kelas.kelas_id,
tbl_admin_nilai_uts.uts_id,
tbl_admin_nilai_uts.nilai_uts,
tbl_users.user_nim,
tbl_users.user_fullname
 from tbl_admin_nilai_uts
		join tbl_admin_kelas_users ON tbl_admin_nilai_uts.kelas_users_id=tbl_admin_kelas_users.kelas_users_id
		join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
		join tbl_users ON tbl_users.user_id=tbl_admin_kelas_users.user_id
		WHERE tbl_admin_kelas.kelas_id='$wherekelas' 
		ORDER by tbl_users.user_fullname ASC
		")->result();
		
		$data['tbl_admin_inputnilai'] = $this->db->query("select 
tbl_admin_kelas.kelas_id,
tbl_admin_kelas_users.kelas_users_id,
tbl_users.user_nim,
tbl_users.user_fullname
 from tbl_users
		join tbl_admin_kelas_users ON tbl_users.user_id=tbl_admin_kelas_users.user_id
		join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
		WHERE tbl_admin_kelas.kelas_id='$wherekelas' AND kelas_users_id NOT IN (SELECT kelas_users_id FROM tbl_admin_nilai_uts)
		ORDER by tbl_users.user_fullname ASC
		")->result();
		
		$data['tbl_admin_kelas'] = $this->m_admin_index->view2();
		$data['tbl_admin_kelas_2'] = $this->m_admin_kelas->view_by($wherekelas);
		$this->load->view("v_admin_header");
        $this->load->view("v_admin_nilai_uts", $data);
		$this->load->view("v_admin_footer_datatables");
    }
	
	// START INI ADALAH FUNGSI FUNGSI UNTUK HALAMAN INPUT NILAI UAS
	public function nilaiuas($wherekelas="")
    {
		$data['tbl_admin_nilai_uas'] = $this->db->query("select 
tbl_admin_kelas.kelas_id,
tbl_admin_nilai_uas.uas_id,
tbl_admin_nilai_uas.nilai_uas,
tbl_admin_nilai_uas.nilai_uas_praktek,
tbl_users.user_nim,
tbl_users.user_fullname
 from tbl_admin_nilai_uas
		join tbl_admin_kelas_users ON tbl_admin_nilai_uas.kelas_users_id=tbl_admin_kelas_users.kelas_users_id
		join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
		join tbl_users ON tbl_users.user_id=tbl_admin_kelas_users.user_id
		WHERE tbl_admin_kelas.kelas_id='$wherekelas' 
		ORDER by tbl_users.user_fullname ASC
		")->result();
		
		$data['tbl_admin_inputnilai'] = $this->db->query("select 
tbl_admin_kelas.kelas_id,
tbl_admin_kelas_users.kelas_users_id,
tbl_users.user_nim,
tbl_users.user_fullname
 from tbl_users
		join tbl_admin_kelas_users ON tbl_users.user_id=tbl_admin_kelas_users.user_id
		join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
		WHERE tbl_admin_kelas.kelas_id='$wherekelas' AND kelas_users_id NOT IN (SELECT kelas_users_id FROM tbl_admin_nilai_uas)
		ORDER by tbl_users.user_fullname ASC
		")->result();
		
		$data['tbl_admin_kelas'] = $this->m_admin_index->view2();
		$data['tbl_admin_kelas_2'] = $this->m_admin_kelas->view_by($wherekelas);
		$this->load->view("v_admin_header");
        $this->load->view("v_admin_nilai_uas", $data);
		$this->load->view("v_admin_footer_datatables");
    }
	
	public function nilai_tambah()
    {
		$accept = $this->uri->segment(3);
		$kelas_id = $this->uri->segment(3);
		$data['tbl_admin_kelas_users'] = $this->m_admin_kelas->view3($accept);
		$data['tbl_admin_kelas'] = $this->m_admin_index->view2();
		$data['tbl_admin_kelas_2'] = $this->m_admin_kelas->view_by($kelas_id);
		$this->load->view("v_admin_header_form");
        $this->load->view("v_admin_nilai_add", $data);
		$this->load->view("v_admin_footer_form");
    }
	public function nilai_ubah($nilai_id)
	{
		$data['tbl_admin_nilai'] = $this->m_admin_nilai->view_by($nilai_id);
		$this->load->view("v_admin_header_form");
		$this->load->view('v_admin_nilai_edit', $data);
		$this->load->view("v_admin_footer_form");
	}	
	public function nilai_aksi_tambah($wherekelas="", $wheretopik="")
    {
        if($this->input->post('submit')){
			$this->m_admin_nilai->add_array(); // Panggil fungsi add_array() yang ada di M_admin_nilai.php
			redirect('admin/nilai/'.$wherekelas.'/'.$wheretopik.'/ubah');
		}    
    }	
	public function nilai_aksi_ubah($wherekelas="", $wheretopik="")
    {
        if($this->input->post('submit')){
			$this->m_admin_nilai->edit_array(); // Panggil fungsi edit_array() yang ada di M_admin_nilai.php
			redirect('admin/nilai/'.$wherekelas.'/'.$wheretopik.'/ubah');
		}    
    }

	public function nilai_uts_aksi_tambah($wherekelas="")
    {
        if($this->input->post('submit')){
			$this->m_admin_nilai->uts_add_array(); // Panggil fungsi add_array() yang ada di M_admin_nilai.php
			redirect('admin/nilaiuts/'.$wherekelas.'/ubah');
		}    
    }	
	public function nilai_uts_aksi_ubah($wherekelas="")
    {
        if($this->input->post('submit')){
			$this->m_admin_nilai->uts_edit_array(); // Panggil fungsi edit_array() yang ada di M_admin_nilai.php
			redirect('admin/nilaiuts/'.$wherekelas.'/ubah');
		}    
    }	
	
	public function nilai_uas_aksi_tambah($wherekelas="")
    {
        if($this->input->post('submit')){
			$this->m_admin_nilai->uas_add_array(); // Panggil fungsi add_array() yang ada di M_admin_nilai.php
			redirect('admin/nilaiuas/'.$wherekelas.'/ubah');
		}    
    }	
	public function nilai_uas_aksi_ubah($wherekelas="")
    {
        if($this->input->post('submit')){
			$this->m_admin_nilai->uas_edit_array(); // Panggil fungsi edit_array() yang ada di M_admin_nilai.php
			redirect('admin/nilaiuas/'.$wherekelas.'/ubah');
		}    
    }
		
	public function nilai_aksi_hapus($nilai_id){
			$this->m_admin_nilai->hapus($nilai_id); // Panggil fungsi hapus() yang ada di M_admin_nilai.php
			redirect('admin/nilai');
	}
	// END INI ADALAH FUNGSI FUNGSI UNTUK HALAMAN INPUT NILAI
	
	// START INI ADALAH FUNGSI FUNGSI UNTUK HALAMAN INPUT MATERI
	public function materi()
    {
		$data['tbl_admin_materi'] = $this->m_admin_materi->view();
		$data['tbl_admin_kelas'] = $this->m_admin_kelas->view();
        $this->load->view("v_admin_header");
        $this->load->view("v_admin_materi", $data);
       $this->load->view("v_admin_footer_datatables");
$this->load->view("v_admin_chat"); //ini adalah fitur chatting
    }	
	public function materi_tambah()
    {
		$data['tbl_admin_kelas'] = $this->m_admin_kelas->view();
		$this->load->view("v_admin_header_form");
        $this->load->view("v_admin_materi_add", $data);
		$this->load->view("v_admin_footer_form");
    }
	public function materi_ubah($materi_id)
	{
		$data['tbl_admin_kelas'] = $this->m_admin_kelas->view();
		$data['tbl_admin_materi'] = $this->m_admin_materi->view_by($materi_id);
		$this->load->view("v_admin_header_form");
		$this->load->view('v_admin_materi_edit', $data);
		$this->load->view("v_admin_footer_form");
	}	
	public function materi_aksi_tambah()
    {
		$data = array();
		if($this->input->post('submit'))
		{
			$file_upload1 = $_FILES['userfiles1'];
			$file_upload2 = $_FILES['userfiles2'];
			$files1 = $file_upload1;
			$files2 = $file_upload2;
			
			if($files1['name'] != "" OR $files1['name'] != NULL){
				$nama_fileupload1 = $this->m_general->file_upload_admin($file_upload1, "materi");
			}else{
				$nama_fileupload1 = "";
			}
			
			if($files2['name'] != "" OR $files2['name'] != NULL){
				$nama_fileupload2 = $this->m_general->file_upload_admin($file_upload2, "materi");
			}else{
				$nama_fileupload2 = "";
			}
			
				$this->m_admin_materi->add(array(
				  "kelas_id" => $this->input->post('kelas_id'),
				  "materi_nama" => $this->input->post('materi_nama'),
				  "materi_topik" => $this->input->post('materi_topik'),
				  "materi_linkvideo" => $nama_fileupload1,
				  "materi_file" => $nama_fileupload2,
				  "materi_creator" => $this->session->userdata('nim')
				));
				redirect('admin/materi');
		}
    }	
	public function materi_aksi_ubah($materi_id)
    {
		$data = array();
        if($this->input->post('submit')){
			$file_upload1 = $_FILES['userfiles1'];
			$file_upload2 = $_FILES['userfiles2'];
			$files1 = $file_upload1;
			$files2 = $file_upload2;
			
			if($files1['name'] != "" OR $files1['name'] != NULL){
				$nama_fileupload1 = $this->m_general->file_upload_admin($file_upload1, "materi");
			}else{
				$nama_fileupload1 = $this->input->post('materi_linkvideo');
			}
			
			if($files2['name'] != "" OR $files2['name'] != NULL){
				$nama_fileupload2 = $this->m_general->file_upload_admin($file_upload2, "materi");
			}else{
				$nama_fileupload2 = $this->input->post('materi_file');
			}
			$this->m_admin_materi->edit($materi_id, array(
				  "kelas_id" => $this->input->post('kelas_id'),
				  "materi_nama" => $this->input->post('materi_nama'),
				  "materi_topik" => $this->input->post('materi_topik'),
				  "materi_linkvideo" => $nama_fileupload1,
				  "materi_file" => $nama_fileupload2,
				  "materi_updater" => $this->session->userdata('nim')
				));
			redirect('admin/materi');
		}    
    }	
	public function materi_aksi_hapus($materi_id){
			$this->m_admin_materi->hapus($materi_id); // Panggil fungsi hapus() yang ada di M_admin_materi.php
			redirect('admin/materi');
	}
	// END INI ADALAH FUNGSI FUNGSI UNTUK HALAMAN INPUT MATERI
	
	// START INI ADALAH FUNGSI FUNGSI UNTUK HALAMAN INPUT TUGAS
	public function tugas()
    {
		$data['tbl_admin_tugas'] = $this->m_admin_tugas->view();
		$data['tbl_admin_kelas'] = $this->m_admin_kelas->view();
        $this->load->view("v_admin_header");
        $this->load->view("v_admin_tugas", $data);
       $this->load->view("v_admin_footer_datatables");
$this->load->view("v_admin_chat"); //ini adalah fitur chatting
    }	
	public function tugas_tambah()
    {
		$data['tbl_admin_kelas'] = $this->m_admin_kelas->view();
		$this->load->view("v_admin_header_form");
        $this->load->view("v_admin_tugas_add", $data);
		$this->load->view("v_admin_footer_form");
    }
	public function tugas_ubah($tugas_id)
	{
		$data['tbl_admin_kelas'] = $this->m_admin_kelas->view();
		$data['tbl_admin_tugas'] = $this->m_admin_tugas->view_by($tugas_id);
		$this->load->view("v_admin_header_form");
		$this->load->view('v_admin_tugas_edit', $data);
		$this->load->view("v_admin_footer_form");
	}	
	public function tugas_aksi_tambah()
    {
		$data = array();
		if($this->input->post('submit'))
		{
			$file_upload1 = $_FILES['userfiles1'];
			$file_upload2 = $_FILES['userfiles2'];
			$files1 = $file_upload1;
			$files2 = $file_upload2;
			
			if($files1['name'] != "" OR $files1['name'] != NULL){
				$nama_fileupload1 = $this->m_general->file_upload_admin($file_upload1, "tugas");
			}else{
				$nama_fileupload1 = "";
			}
			
			if($files2['name'] != "" OR $files2['name'] != NULL){
				$nama_fileupload2 = $this->m_general->file_upload_admin($file_upload2, "tugas");
			}else{
				$nama_fileupload2 = "";
			}
				
				$this->m_admin_tugas->add(array(
				  "kelas_id" => $this->input->post('kelas_id'),
				  "tugas_nama" => $this->input->post('tugas_nama'),
				  "tugas_topik" => $this->input->post('tugas_topik'),
				  "tugas_linkvideo" => $nama_fileupload1,
				  "tugas_file" => $nama_fileupload2,
				  "tugas_creator" => $this->session->userdata('nim')
				));
				redirect('admin/tugas');
		}
    }	
	public function tugas_aksi_ubah($tugas_id)
    {
		$data = array();
        if($this->input->post('submit')){
			$file_upload1 = $_FILES['userfiles1'];
			$file_upload2 = $_FILES['userfiles2'];
			$files1 = $file_upload1;
			$files2 = $file_upload2;
			
			if($files1['name'] != "" OR $files1['name'] != NULL){
				$nama_fileupload1 = $this->m_general->file_upload_admin($file_upload1, "tugas");
			}else{
				$nama_fileupload1 = $this->input->post('tugas_linkvideo');
			}
			
			if($files2['name'] != "" OR $files2['name'] != NULL){
				$nama_fileupload2 = $this->m_general->file_upload_admin($file_upload2, "tugas");
			}else{
				$nama_fileupload2 = $this->input->post('tugas_file');
			}
			
			$this->m_admin_tugas->edit($tugas_id, array(
				  "kelas_id" => $this->input->post('kelas_id'),
				  "tugas_nama" => $this->input->post('tugas_nama'),
				  "tugas_topik" => $this->input->post('tugas_topik'),
				  "tugas_linkvideo" => $nama_fileupload1,
				  "tugas_file" => $nama_fileupload2,
				  "tugas_updater" => $this->session->userdata('nim')
				));
			redirect('admin/tugas');
		}    
    }	
	public function tugas_aksi_hapus($tugas_id){
			$this->m_admin_tugas->hapus($tugas_id); // Panggil fungsi hapus() yang ada di M_admin_tugas.php
			redirect('admin/tugas');
	}
	// END INI ADALAH FUNGSI FUNGSI UNTUK HALAMAN INPUT TUGAS
	
	// START INI ADALAH FUNGSI FUNGSI UNTUK HALAMAN PENGELOMPOKAN
	public function pengelompokan($kelas_id)
    {
		$data['tbl_users'] = $this->m_admin_laporan->laporan($kelas_id);
		$data['tbl_users_2'] = $this->m_admin_laporan->jumlahmahasiswakelas($kelas_id);
		$data['tbl_users_3'] = $this->m_admin_laporan->jumlahtopikkelas($kelas_id);
		$data['tbl_admin_kelas'] = $this->m_admin_kelas->view();
		$data['tbl_admin_kelas_2'] = $this->m_admin_kelas->view_by($kelas_id);
        $this->load->view("v_admin_header");
        $this->load->view("v_admin_pengelompokan", $data);
        $this->load->view("v_admin_footer");
    }
	
	public function pengelompokan_aksi()
    {
		$where = array("kelas_id" => $_POST['kelas_id'], "topik_group" => $_POST['topik_group']);
		$cek = $this->m_general->countdata("tbl_group",$where);
		if($cek==0){
			$_POST['group_creator'] = $this->session->userdata('nim');
			$this->m_general->add("tbl_group", $_POST);
		}else{
			$_POST['group_updater'] = $this->session->userdata('nim');
			$this->m_general->edit("tbl_group", $where, $_POST);
		}
		redirect("admin/pengelompokan/".$_POST['kelas_id']."/".$_POST['topik_group']."/".$_POST['jumlah_group']);
    }
	// END INI ADALAH FUNGSI FUNGSI UNTUK HALAMAN PENGELOMPOKAN
	
	// START INI ADALAH FUNGSI FUNGSI UNTUK HALAMAN LAPORAN
	public function laporan($kelas_id="", $pilihan="", $topik="", $kelas="")
    {
		$this->load->view("v_admin_header");
		$data['tbl_admin_kelas'] = $this->m_admin_kelas->view();
		if($kelas_id!="lainnya"){
			$data['tbl_users'] = $this->m_admin_laporan->laporan($kelas_id);
			$data['tbl_users_2'] = $this->m_admin_laporan->jumlahmahasiswakelas($kelas_id);
			$data['tbl_users_3'] = $this->m_admin_laporan->jumlahtopikkelas($kelas_id);
			$data['tbl_admin_kelas_2'] = $this->m_admin_kelas->view_by($kelas_id);
			$this->load->view("v_admin_laporan", $data);
		}else{
			$data[''] = '';
			if($pilihan=="nilaikelas"){
				$data['tbl_admin_kelas_2'] = $this->m_admin_kelas->view_by($kelas);
				
				$data['tbl_admin_nilai'] = $this->db->query("select 
				tbl_admin_kelas.kelas_id,
				tbl_admin_nilai.nilai_topik,
				tbl_admin_nilai.nilai_id,
				tbl_users.user_nim,
				tbl_users.user_fullname,
				tbl_admin_nilai.nilai_makalah,
				tbl_admin_nilai.nilai_presentasi,
				tbl_admin_nilai.nilai_kelompok,
				tbl_admin_nilai.nilai_individu,
				tbl_admin_nilai.nilai_praktek,
				(SELECT nilai_pretest
						 FROM tbl_admin_nilai_pretest
						 WHERE tbl_admin_nilai_pretest.kelas_users_id = tbl_admin_nilai.kelas_users_id
						 AND tbl_admin_nilai_pretest.nilaipretest_topik=tbl_admin_nilai.nilai_topik
							   ) AS nilai_pretest,
				tbl_admin_nilai.nilai_peningkatan,
				tbl_admin_nilai.nilai_angka,
				ROUND((
				(((tbl_admin_nilai.nilai_makalah*3)+(tbl_admin_nilai.nilai_presentasi*2))/5*2)+
				(((tbl_admin_nilai.nilai_kelompok*3)+(tbl_admin_nilai.nilai_individu*3))/6*3)+
				(tbl_admin_nilai.nilai_praktek*2)+
				((SELECT nilai_pretest
						 FROM tbl_admin_nilai_pretest
						 WHERE tbl_admin_nilai_pretest.kelas_users_id = tbl_admin_nilai.kelas_users_id
						 AND tbl_admin_nilai_pretest.nilaipretest_topik=tbl_admin_nilai.nilai_topik)*2)+
				(tbl_admin_nilai.nilai_peningkatan*1)
				)/10,2) as nilai_total
				 from tbl_admin_nilai
						right join tbl_admin_kelas_users ON 
						tbl_admin_nilai.kelas_users_id=tbl_admin_kelas_users.kelas_users_id
						join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
						join tbl_users ON tbl_users.user_id=tbl_admin_kelas_users.user_id
						WHERE tbl_admin_kelas.kelas_id='$kelas' AND tbl_admin_nilai.nilai_topik='$topik'	
						ORDER by tbl_users.user_fullname ASC
						")->result();
			}
			
			if($pilihan=="nilaiuts"){
				$data['tbl_admin_kelas_2'] = $this->m_admin_kelas->view_by($topik);
				$data['tbl_admin_nilai_uts'] = $this->db->query("select 
				tbl_admin_kelas.kelas_id,
				tbl_users.user_nim,
				tbl_users.user_fullname,
				tbl_admin_nilai_uts.nilai_uts
				from tbl_admin_nilai_uts
						right join tbl_admin_kelas_users ON tbl_admin_nilai_uts.kelas_users_id=tbl_admin_kelas_users.kelas_users_id
						join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
						join tbl_users ON tbl_users.user_id=tbl_admin_kelas_users.user_id
						WHERE tbl_admin_kelas.kelas_id='$topik'
						ORDER by tbl_users.user_fullname ASC
						")->result();
			}
			
			if($pilihan=="nilaiuas"){
				$data['tbl_admin_kelas_2'] = $this->m_admin_kelas->view_by($topik);
				$data['tbl_admin_nilai_uas'] = $this->db->query("select 
				tbl_admin_kelas.kelas_id,
				tbl_users.user_nim,
				tbl_users.user_fullname,
				tbl_admin_nilai_uas.nilai_uas,
				tbl_admin_nilai_uas.nilai_uas_praktek
				from tbl_admin_nilai_uas
						right join tbl_admin_kelas_users ON tbl_admin_nilai_uas.kelas_users_id=tbl_admin_kelas_users.kelas_users_id
						join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
						join tbl_users ON tbl_users.user_id=tbl_admin_kelas_users.user_id
						WHERE tbl_admin_kelas.kelas_id='$topik'
						ORDER by tbl_users.user_fullname ASC
						")->result();
			}
			
			if($pilihan=="nilaikeseluruhan"){
				$data['tbl_admin_kelas_2'] = $this->m_admin_kelas->view_by($topik);
				$data['tbl_admin_nilai_keseluruhan'] = $this->db->query("select tbl_users.user_nim, tbl_users.user_fullname,
	tbl_admin_kelas_users.kelas_users_id as marksman,
	IFNULL((SELECT nilai_angka FROM tbl_admin_nilai 
	join tbl_admin_kelas_users ON tbl_admin_kelas_users.kelas_users_id=tbl_admin_nilai.kelas_users_id
	join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
	WHERE tbl_admin_kelas.kelas_id='$topik' AND nilai_topik='1' AND tbl_admin_nilai.kelas_users_id=marksman
	),0) as topik1,
	IFNULL((SELECT nilai_angka FROM tbl_admin_nilai 
	join tbl_admin_kelas_users ON tbl_admin_kelas_users.kelas_users_id=tbl_admin_nilai.kelas_users_id
	join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
	WHERE tbl_admin_kelas.kelas_id='$topik' AND nilai_topik='2' AND tbl_admin_nilai.kelas_users_id=marksman
	),0) as topik2,
	IFNULL((SELECT nilai_angka FROM tbl_admin_nilai 
	join tbl_admin_kelas_users ON tbl_admin_kelas_users.kelas_users_id=tbl_admin_nilai.kelas_users_id
	join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
	WHERE tbl_admin_kelas.kelas_id='$topik' AND nilai_topik='3' AND tbl_admin_nilai.kelas_users_id=marksman
	),0) as topik3,	
	IFNULL((SELECT nilai_angka FROM tbl_admin_nilai 
	join tbl_admin_kelas_users ON tbl_admin_kelas_users.kelas_users_id=tbl_admin_nilai.kelas_users_id
	join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
	WHERE tbl_admin_kelas.kelas_id='$topik' AND nilai_topik='4' AND tbl_admin_nilai.kelas_users_id=marksman
	),0) as topik4,
	IFNULL((SELECT nilai_uts FROM tbl_admin_nilai_uts
	join tbl_admin_kelas_users ON tbl_admin_kelas_users.kelas_users_id=tbl_admin_nilai_uts.kelas_users_id
	join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
	WHERE tbl_admin_kelas.kelas_id='$topik' AND tbl_admin_nilai_uts.kelas_users_id=marksman
	),0) as uts,
	IFNULL((SELECT nilai_uas FROM tbl_admin_nilai_uas
	join tbl_admin_kelas_users ON tbl_admin_kelas_users.kelas_users_id=tbl_admin_nilai_uas.kelas_users_id
	join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
	WHERE tbl_admin_kelas.kelas_id='$topik' AND tbl_admin_nilai_uas.kelas_users_id=marksman
	),0) as uas,
	IFNULL((SELECT nilai_uas_praktek FROM tbl_admin_nilai_uas
	join tbl_admin_kelas_users ON tbl_admin_kelas_users.kelas_users_id=tbl_admin_nilai_uas.kelas_users_id
	join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
	WHERE tbl_admin_kelas.kelas_id='$topik' AND tbl_admin_nilai_uas.kelas_users_id=marksman
	),0) as uas_praktek,
	
	((SELECT nilai_angka FROM tbl_admin_nilai 
	join tbl_admin_kelas_users ON tbl_admin_kelas_users.kelas_users_id=tbl_admin_nilai.kelas_users_id
	join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
	WHERE tbl_admin_kelas.kelas_id='$topik' AND nilai_topik='1' AND tbl_admin_nilai.kelas_users_id=marksman
	)*0.1)+((SELECT nilai_angka FROM tbl_admin_nilai 
	join tbl_admin_kelas_users ON tbl_admin_kelas_users.kelas_users_id=tbl_admin_nilai.kelas_users_id
	join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
	WHERE tbl_admin_kelas.kelas_id='$topik' AND nilai_topik='2' AND tbl_admin_nilai.kelas_users_id=marksman
	)*0.1)+((SELECT nilai_angka FROM tbl_admin_nilai 
	join tbl_admin_kelas_users ON tbl_admin_kelas_users.kelas_users_id=tbl_admin_nilai.kelas_users_id
	join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
	WHERE tbl_admin_kelas.kelas_id='$topik' AND nilai_topik='3' AND tbl_admin_nilai.kelas_users_id=marksman
	)*0.1)+((SELECT nilai_angka FROM tbl_admin_nilai 
	join tbl_admin_kelas_users ON tbl_admin_kelas_users.kelas_users_id=tbl_admin_nilai.kelas_users_id
	join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
	WHERE tbl_admin_kelas.kelas_id='$topik' AND nilai_topik='4' AND tbl_admin_nilai.kelas_users_id=marksman
	)*0.1)+((SELECT nilai_uts FROM tbl_admin_nilai_uts
	join tbl_admin_kelas_users ON tbl_admin_kelas_users.kelas_users_id=tbl_admin_nilai_uts.kelas_users_id
	join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
	WHERE tbl_admin_kelas.kelas_id='$topik' AND tbl_admin_nilai_uts.kelas_users_id=marksman
	)*0.15)+((SELECT nilai_uas FROM tbl_admin_nilai_uas
	join tbl_admin_kelas_users ON tbl_admin_kelas_users.kelas_users_id=tbl_admin_nilai_uas.kelas_users_id
	join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
	WHERE tbl_admin_kelas.kelas_id='$topik' AND tbl_admin_nilai_uas.kelas_users_id=marksman
	)*0.15)+((SELECT nilai_uas_praktek FROM tbl_admin_nilai_uas
	join tbl_admin_kelas_users ON tbl_admin_kelas_users.kelas_users_id=tbl_admin_nilai_uas.kelas_users_id
	join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
	WHERE tbl_admin_kelas.kelas_id='$topik' AND tbl_admin_nilai_uas.kelas_users_id=marksman
	)*0.30) as total,
	
	CASE
		WHEN (((SELECT nilai_angka FROM tbl_admin_nilai 
	join tbl_admin_kelas_users ON tbl_admin_kelas_users.kelas_users_id=tbl_admin_nilai.kelas_users_id
	join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
	WHERE tbl_admin_kelas.kelas_id='$topik' AND nilai_topik='1' AND tbl_admin_nilai.kelas_users_id=marksman
	)*0.1)+((SELECT nilai_angka FROM tbl_admin_nilai 
	join tbl_admin_kelas_users ON tbl_admin_kelas_users.kelas_users_id=tbl_admin_nilai.kelas_users_id
	join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
	WHERE tbl_admin_kelas.kelas_id='$topik' AND nilai_topik='2' AND tbl_admin_nilai.kelas_users_id=marksman
	)*0.1)+((SELECT nilai_angka FROM tbl_admin_nilai 
	join tbl_admin_kelas_users ON tbl_admin_kelas_users.kelas_users_id=tbl_admin_nilai.kelas_users_id
	join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
	WHERE tbl_admin_kelas.kelas_id='$topik' AND nilai_topik='3' AND tbl_admin_nilai.kelas_users_id=marksman
	)*0.1)+((SELECT nilai_angka FROM tbl_admin_nilai 
	join tbl_admin_kelas_users ON tbl_admin_kelas_users.kelas_users_id=tbl_admin_nilai.kelas_users_id
	join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
	WHERE tbl_admin_kelas.kelas_id='$topik' AND nilai_topik='4' AND tbl_admin_nilai.kelas_users_id=marksman
	)*0.1)+((SELECT nilai_uts FROM tbl_admin_nilai_uts
	join tbl_admin_kelas_users ON tbl_admin_kelas_users.kelas_users_id=tbl_admin_nilai_uts.kelas_users_id
	join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
	WHERE tbl_admin_kelas.kelas_id='$topik' AND tbl_admin_nilai_uts.kelas_users_id=marksman
	)*0.15)+((SELECT nilai_uas FROM tbl_admin_nilai_uas
	join tbl_admin_kelas_users ON tbl_admin_kelas_users.kelas_users_id=tbl_admin_nilai_uas.kelas_users_id
	join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
	WHERE tbl_admin_kelas.kelas_id='$topik' AND tbl_admin_nilai_uas.kelas_users_id=marksman
	)*0.15)+((SELECT nilai_uas_praktek FROM tbl_admin_nilai_uas
	join tbl_admin_kelas_users ON tbl_admin_kelas_users.kelas_users_id=tbl_admin_nilai_uas.kelas_users_id
	join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
	WHERE tbl_admin_kelas.kelas_id='$topik' AND tbl_admin_nilai_uas.kelas_users_id=marksman
	)*0.30)) BETWEEN '80' AND '100.01' THEN 'A'
	
	WHEN (((SELECT nilai_angka FROM tbl_admin_nilai 
	join tbl_admin_kelas_users ON tbl_admin_kelas_users.kelas_users_id=tbl_admin_nilai.kelas_users_id
	join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
	WHERE tbl_admin_kelas.kelas_id='$topik' AND nilai_topik='1' AND tbl_admin_nilai.kelas_users_id=marksman
	)*0.1)+((SELECT nilai_angka FROM tbl_admin_nilai 
	join tbl_admin_kelas_users ON tbl_admin_kelas_users.kelas_users_id=tbl_admin_nilai.kelas_users_id
	join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
	WHERE tbl_admin_kelas.kelas_id='$topik' AND nilai_topik='2' AND tbl_admin_nilai.kelas_users_id=marksman
	)*0.1)+((SELECT nilai_angka FROM tbl_admin_nilai 
	join tbl_admin_kelas_users ON tbl_admin_kelas_users.kelas_users_id=tbl_admin_nilai.kelas_users_id
	join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
	WHERE tbl_admin_kelas.kelas_id='$topik' AND nilai_topik='3' AND tbl_admin_nilai.kelas_users_id=marksman
	)*0.1)+((SELECT nilai_angka FROM tbl_admin_nilai 
	join tbl_admin_kelas_users ON tbl_admin_kelas_users.kelas_users_id=tbl_admin_nilai.kelas_users_id
	join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
	WHERE tbl_admin_kelas.kelas_id='$topik' AND nilai_topik='4' AND tbl_admin_nilai.kelas_users_id=marksman
	)*0.1)+((SELECT nilai_uts FROM tbl_admin_nilai_uts
	join tbl_admin_kelas_users ON tbl_admin_kelas_users.kelas_users_id=tbl_admin_nilai_uts.kelas_users_id
	join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
	WHERE tbl_admin_kelas.kelas_id='$topik' AND tbl_admin_nilai_uts.kelas_users_id=marksman
	)*0.15)+((SELECT nilai_uas FROM tbl_admin_nilai_uas
	join tbl_admin_kelas_users ON tbl_admin_kelas_users.kelas_users_id=tbl_admin_nilai_uas.kelas_users_id
	join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
	WHERE tbl_admin_kelas.kelas_id='$topik' AND tbl_admin_nilai_uas.kelas_users_id=marksman
	)*0.15)+((SELECT nilai_uas_praktek FROM tbl_admin_nilai_uas
	join tbl_admin_kelas_users ON tbl_admin_kelas_users.kelas_users_id=tbl_admin_nilai_uas.kelas_users_id
	join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
	WHERE tbl_admin_kelas.kelas_id='$topik' AND tbl_admin_nilai_uas.kelas_users_id=marksman
	)*0.30)) BETWEEN '70' AND '79.99999' THEN 'B'
	
	WHEN (((SELECT nilai_angka FROM tbl_admin_nilai 
	join tbl_admin_kelas_users ON tbl_admin_kelas_users.kelas_users_id=tbl_admin_nilai.kelas_users_id
	join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
	WHERE tbl_admin_kelas.kelas_id='$topik' AND nilai_topik='1' AND tbl_admin_nilai.kelas_users_id=marksman
	)*0.1)+((SELECT nilai_angka FROM tbl_admin_nilai 
	join tbl_admin_kelas_users ON tbl_admin_kelas_users.kelas_users_id=tbl_admin_nilai.kelas_users_id
	join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
	WHERE tbl_admin_kelas.kelas_id='$topik' AND nilai_topik='2' AND tbl_admin_nilai.kelas_users_id=marksman
	)*0.1)+((SELECT nilai_angka FROM tbl_admin_nilai 
	join tbl_admin_kelas_users ON tbl_admin_kelas_users.kelas_users_id=tbl_admin_nilai.kelas_users_id
	join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
	WHERE tbl_admin_kelas.kelas_id='$topik' AND nilai_topik='3' AND tbl_admin_nilai.kelas_users_id=marksman
	)*0.1)+((SELECT nilai_angka FROM tbl_admin_nilai 
	join tbl_admin_kelas_users ON tbl_admin_kelas_users.kelas_users_id=tbl_admin_nilai.kelas_users_id
	join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
	WHERE tbl_admin_kelas.kelas_id='$topik' AND nilai_topik='4' AND tbl_admin_nilai.kelas_users_id=marksman
	)*0.1)+((SELECT nilai_uts FROM tbl_admin_nilai_uts
	join tbl_admin_kelas_users ON tbl_admin_kelas_users.kelas_users_id=tbl_admin_nilai_uts.kelas_users_id
	join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
	WHERE tbl_admin_kelas.kelas_id='$topik' AND tbl_admin_nilai_uts.kelas_users_id=marksman
	)*0.15)+((SELECT nilai_uas FROM tbl_admin_nilai_uas
	join tbl_admin_kelas_users ON tbl_admin_kelas_users.kelas_users_id=tbl_admin_nilai_uas.kelas_users_id
	join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
	WHERE tbl_admin_kelas.kelas_id='$topik' AND tbl_admin_nilai_uas.kelas_users_id=marksman
	)*0.15)+((SELECT nilai_uas_praktek FROM tbl_admin_nilai_uas
	join tbl_admin_kelas_users ON tbl_admin_kelas_users.kelas_users_id=tbl_admin_nilai_uas.kelas_users_id
	join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
	WHERE tbl_admin_kelas.kelas_id='$topik' AND tbl_admin_nilai_uas.kelas_users_id=marksman
	)*0.30)) BETWEEN '60' AND '69.99999' THEN 'C'
	
	WHEN (((SELECT nilai_angka FROM tbl_admin_nilai 
	join tbl_admin_kelas_users ON tbl_admin_kelas_users.kelas_users_id=tbl_admin_nilai.kelas_users_id
	join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
	WHERE tbl_admin_kelas.kelas_id='$topik' AND nilai_topik='1' AND tbl_admin_nilai.kelas_users_id=marksman
	)*0.1)+((SELECT nilai_angka FROM tbl_admin_nilai 
	join tbl_admin_kelas_users ON tbl_admin_kelas_users.kelas_users_id=tbl_admin_nilai.kelas_users_id
	join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
	WHERE tbl_admin_kelas.kelas_id='$topik' AND nilai_topik='2' AND tbl_admin_nilai.kelas_users_id=marksman
	)*0.1)+((SELECT nilai_angka FROM tbl_admin_nilai 
	join tbl_admin_kelas_users ON tbl_admin_kelas_users.kelas_users_id=tbl_admin_nilai.kelas_users_id
	join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
	WHERE tbl_admin_kelas.kelas_id='$topik' AND nilai_topik='3' AND tbl_admin_nilai.kelas_users_id=marksman
	)*0.1)+((SELECT nilai_angka FROM tbl_admin_nilai 
	join tbl_admin_kelas_users ON tbl_admin_kelas_users.kelas_users_id=tbl_admin_nilai.kelas_users_id
	join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
	WHERE tbl_admin_kelas.kelas_id='$topik' AND nilai_topik='4' AND tbl_admin_nilai.kelas_users_id=marksman
	)*0.1)+((SELECT nilai_uts FROM tbl_admin_nilai_uts
	join tbl_admin_kelas_users ON tbl_admin_kelas_users.kelas_users_id=tbl_admin_nilai_uts.kelas_users_id
	join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
	WHERE tbl_admin_kelas.kelas_id='$topik' AND tbl_admin_nilai_uts.kelas_users_id=marksman
	)*0.15)+((SELECT nilai_uas FROM tbl_admin_nilai_uas
	join tbl_admin_kelas_users ON tbl_admin_kelas_users.kelas_users_id=tbl_admin_nilai_uas.kelas_users_id
	join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
	WHERE tbl_admin_kelas.kelas_id='$topik' AND tbl_admin_nilai_uas.kelas_users_id=marksman
	)*0.15)+((SELECT nilai_uas_praktek FROM tbl_admin_nilai_uas
	join tbl_admin_kelas_users ON tbl_admin_kelas_users.kelas_users_id=tbl_admin_nilai_uas.kelas_users_id
	join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
	WHERE tbl_admin_kelas.kelas_id='$topik' AND tbl_admin_nilai_uas.kelas_users_id=marksman
	)*0.30)) BETWEEN '50' AND '59.99999' THEN 'D'
	
	WHEN (((SELECT nilai_angka FROM tbl_admin_nilai 
	join tbl_admin_kelas_users ON tbl_admin_kelas_users.kelas_users_id=tbl_admin_nilai.kelas_users_id
	join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
	WHERE tbl_admin_kelas.kelas_id='$topik' AND nilai_topik='1' AND tbl_admin_nilai.kelas_users_id=marksman
	)*0.1)+((SELECT nilai_angka FROM tbl_admin_nilai 
	join tbl_admin_kelas_users ON tbl_admin_kelas_users.kelas_users_id=tbl_admin_nilai.kelas_users_id
	join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
	WHERE tbl_admin_kelas.kelas_id='$topik' AND nilai_topik='2' AND tbl_admin_nilai.kelas_users_id=marksman
	)*0.1)+((SELECT nilai_angka FROM tbl_admin_nilai 
	join tbl_admin_kelas_users ON tbl_admin_kelas_users.kelas_users_id=tbl_admin_nilai.kelas_users_id
	join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
	WHERE tbl_admin_kelas.kelas_id='$topik' AND nilai_topik='3' AND tbl_admin_nilai.kelas_users_id=marksman
	)*0.1)+((SELECT nilai_angka FROM tbl_admin_nilai 
	join tbl_admin_kelas_users ON tbl_admin_kelas_users.kelas_users_id=tbl_admin_nilai.kelas_users_id
	join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
	WHERE tbl_admin_kelas.kelas_id='$topik' AND nilai_topik='4' AND tbl_admin_nilai.kelas_users_id=marksman
	)*0.1)+((SELECT nilai_uts FROM tbl_admin_nilai_uts
	join tbl_admin_kelas_users ON tbl_admin_kelas_users.kelas_users_id=tbl_admin_nilai_uts.kelas_users_id
	join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
	WHERE tbl_admin_kelas.kelas_id='$topik' AND tbl_admin_nilai_uts.kelas_users_id=marksman
	)*0.15)+((SELECT nilai_uas FROM tbl_admin_nilai_uas
	join tbl_admin_kelas_users ON tbl_admin_kelas_users.kelas_users_id=tbl_admin_nilai_uas.kelas_users_id
	join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
	WHERE tbl_admin_kelas.kelas_id='$topik' AND tbl_admin_nilai_uas.kelas_users_id=marksman
	)*0.15)+((SELECT nilai_uas_praktek FROM tbl_admin_nilai_uas
	join tbl_admin_kelas_users ON tbl_admin_kelas_users.kelas_users_id=tbl_admin_nilai_uas.kelas_users_id
	join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
	WHERE tbl_admin_kelas.kelas_id='$topik' AND tbl_admin_nilai_uas.kelas_users_id=marksman
	)*0.30)) BETWEEN '0' AND '49.99999' THEN 'E'
	
	END as konversi			 
from tbl_admin_kelas_users
						join tbl_users ON tbl_users.user_id=tbl_admin_kelas_users.user_id
						join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
						WHERE tbl_admin_kelas.kelas_id='$topik'
						ORDER by tbl_users.user_fullname ASC")->result();
			}
			
			$this->load->view("v_admin_laporan_lainnya", $data);
		}
       $this->load->view("v_admin_footer_datatables");
$this->load->view("v_admin_chat"); //ini adalah fitur chatting
    }
	// END INI ADALAH FUNGSI FUNGSI UNTUK HALAMAN LAPORAN
	
	// START INI ADALAH FUNGSI FUNGSI UNTUK HALAMAN GRAFIK
	public function grafik($grafik="", $kelas_id="")
    {
		$data['tbl_users'] = $this->m_general->view_order("tbl_users","user_fullname ASC");
		$where = array("user_level" => "mahasiswa");
		$where2 = array("kelas_id >" => "0");
		$data['jumlah_mahasiswa_kelas'] = $this->m_general->countdata("tbl_users",$where);
		$data['jumlah_kelas'] = $this->m_general->countdata("tbl_admin_kelas",$where2);
		$data['tbl_admin_kelas'] = $this->m_admin_kelas->view();
		if($kelas_id!="0"){
			$data['tbl_admin_kelas_2'] = $this->m_admin_kelas->view_by($kelas_id);
        }
		
		$this->load->view("v_admin_header");
        $this->load->view("v_admin_grafik", $data);
       $this->load->view("v_admin_footer_datatables");
$this->load->view("v_admin_chat"); //ini adalah fitur chatting
    }
	// END INI ADALAH FUNGSI FUNGSI UNTUK HALAMAN GRAFIK
	
	
	// START INI ADALAH FUNGSI FUNGSI UNTUK HALAMAN INPUT SOAL
	public function soal($pretest_id="")
    {
		$data['tbl_pretest'] = $this->m_general->view_order("tbl_pretest","pretest_nama ASC");
		$data['tbl_admin_kelas'] = $this->m_general->view_order("tbl_admin_kelas","kelas_nama ASC");
		if($pretest_id!="tambah"){
			if($pretest_id!="" && ($pretest_id!="tambah" && $pretest_id!="tambahuts" && $pretest_id!="tambahuas")){
				$where = array("pretest_id" => $pretest_id);
				$data['tbl_pretest_by'] = $this->m_general->view_by("tbl_pretest",$where);
				$where2 = array("kelas_id" => $data['tbl_pretest_by']->kelas_id);
				$data['tbl_admin_kelas_by'] = $this->m_general->view_by("tbl_admin_kelas",$where2);
			}
		}
		$this->load->view("v_admin_header");
        $this->load->view("v_admin_soal", $data);
        $this->load->view("v_admin_footer");
    }
	
	public function soalinput($pretest_id="", $id_soal="")
    {
		$where = array("pretest_id" => $pretest_id);
		$data['tbl_pretest'] = $this->m_general->view_order("tbl_pretest","pretest_nama ASC");
		$data['tbl_pretest_by'] = $this->m_general->view_by("tbl_pretest",$where);
		$data['tbl_soal'] = $this->m_general->view_where("tbl_soal",$where, "id_soal DESC");
		$where2 = array("id_soal" => $id_soal);
		$data['tbl_soal_by'] = $this->m_general->view_by("tbl_soal",$where2);
		$this->load->view("v_admin_header");
        $this->load->view("v_admin_soalinput", $data);
        $this->load->view("v_admin_footer");
    }
	
	public function pretest_aksi_tambah()
    {
		$this->m_general->add("tbl_pretest", $_POST);
		redirect("admin/soal");
    }
	
	public function pretest_aksi_ubah()
    {
		if($this->input->post('pretest_id')){
			$where = array("pretest_id" => $this->input->post('pretest_id'));
			$this->m_general->edit("tbl_pretest", $where, $_POST);
		}
		redirect("admin/soal/".$this->input->post('pretest_id')."/ubah");
    }
	
	public function pretest_aksi_hapus($pretest_id="")
    {
		$where = array("pretest_id" => $pretest_id);
		$this->m_general->hapus("tbl_pretest", $where);
		redirect("admin/soal");
    }	
	
	public function soal_aksi_tambah()
    {
		if($this->input->post('pretest_id')){
			$this->m_general->add("tbl_soal", $_POST);
		}
		redirect("admin/soal/".$this->input->post('pretest_id'));
    }
	
	public function soal_aksi_ubah()
    {
		if($this->input->post('id_soal')){
			$where = array("id_soal" => $this->input->post('id_soal'));
			$this->m_general->edit("tbl_soal", $where, $_POST);
		}
		redirect("admin/soal/".$this->input->post('pretest_id'));
    }
	
	public function soal_aksi_hapus($pretest_id="", $id_soal="")
    {
		$where = array("id_soal" => $id_soal);
		$this->m_general->hapus("tbl_soal", $where);
		redirect("admin/soal/".$pretest_id);
    }
	// END INI ADALAH FUNGSI FUNGSI UNTUK HALAMAN INPUT SOAL



	// INI ADALAH FUNGSI UNTUK CHATBOOT

	public function chatboot_list_data(){
		 $this->load->view("v_admin_chat_list");
	}

	public function chatboot_list_add(){
		 $this->load->view("v_admin_chat_add");
	}

	public function chatboot_list_addboot(){
		 $this->load->view("v_admin_chat_addboot");
	}


	// INI ADALAH FUNGSI UNTUK DATA TANYA JAWAB
	public function tanya()
    {
	
        $this->load->view("v_admin_header");
        $this->load->view("v_admin_chat_tanya");
       $this->load->view("v_admin_footer_datatables");
	   $this->load->view("v_admin_chat"); //ini adalah fitur chatting
    }

    // INI ADALAH FUNGSI UNTUK DATA TANYA JAWAB
	public function beyes()
    {
	
       $this->load->view("v_admin_header");
       $this->load->view("v_admin_chat_beyes");
       $this->load->view("v_admin_footer_datatables");
	   $this->load->view("v_admin_chat"); //ini adalah fitur chatting
    }

        // INI ADALAH FUNGSI UNTUK DATA TANYA JAWAB
	public function probabilitas()
    {
	
       $this->load->view("v_admin_header");
       $this->load->view("v_admin_chat_probabilitas");
       $this->load->view("v_admin_footer_datatables");
	   $this->load->view("v_admin_chat"); //ini adalah fitur chatting
    }
	
}