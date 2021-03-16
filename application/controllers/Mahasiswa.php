<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('status') != "login" or $this->session->userdata('level') != "mahasiswa"){
			redirect(base_url("login"));
		}
		
		$this->load->model('m_admin_index'); // Load  ke controller ini
		$this->load->model('m_admin_kelas'); // Load  ke controller ini
		$this->load->model('m_mahasiswa_index'); // Load  ke controller ini
		$this->load->model('m_mahasiswa_nilai'); // Load  ke controller ini
		$this->load->model('m_mahasiswa_materi'); // Load  ke controller ini
		$this->load->model('m_mahasiswa_tugas'); // Load  ke controller ini
		$this->load->model('m_mahasiswa_group'); // Load  ke controller ini
		$this->load->model('m_general'); // Load  ke controller ini
		$this->load->model('m_admin_laporan'); // Load  ke controller ini
	}
	public function index($kelas_id = "")
	{
		$data['tbl_users_by'] = $this->m_mahasiswa_index->view();
		$data['tbl_admin_kelas'] = $this->m_mahasiswa_index->viewkelas();
		
		$data['tbl_users_group'] = $this->m_mahasiswa_group->laporan($kelas_id);
		
		$data['tbl_admin_kelas_group'] = $this->m_mahasiswa_group->view();
		$data['tbl_admin_kelas_2'] = $this->m_mahasiswa_group->view_by($kelas_id);
		
		$data['tbl_users'] = $this->m_admin_laporan->laporan($kelas_id);
		$data['tbl_users_2'] = $this->m_admin_laporan->jumlahmahasiswakelas($kelas_id);
		$data['tbl_users_3'] = $this->m_admin_laporan->jumlahtopikkelas($kelas_id);
		
		$this->load->view('v_mahasiswa_header');
		$this->load->view('v_mahasiswa_index', $data);
		$this->load->view('v_admin_footer_datatables');
			$this->load->view("v_mahasiswa_chat"); //ini adalah fitur chatting


	}
	public function index_ubah()
	{
		$data['tbl_users'] = $this->m_mahasiswa_index->view();
		$this->load->view('v_mahasiswa_header');
		$this->load->view('v_mahasiswa_index_edit', $data);
		$this->load->view('v_admin_footer_datatables');
	}
	public function index_aksi_ubah($user_id)
    {
	   $data = array();
       if($this->input->post('submit')){
			$files = $_FILES['userfiles'];
			$config=array(  
                'upload_path' => './assets/avatar/', //direktori untuk menyimpan gambar  
                'allowed_types' => 'mp4|pdf|jpg|jpeg|png|gif',  
                'max_size' => '30000',  
                'max_width' => '20000',  
                'max_height' => '20000'  
            ); 
			
				$_FILES['userfile']['name'] = $files['name'];
				$_FILES['userfile']['type'] = $files['type'];
				$_FILES['userfile']['error'] = $files['error'];
				$_FILES['userfile']['tmp_name'] = $files['tmp_name'];
				$_FILES['userfile']['size'] = $files['size'];
				
				// File upload configuration
                $uploadPath = './assets/avatar/';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'mp4|pdf|jpg|jpeg|png|gif';
				
				// Load and initialize upload library
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                
                // Upload userfile to server
                if($this->upload->do_upload('userfile')){
                    // Uploaded userfile data
                    $this->upload->data();
					$user_image = $files['name'];
                }else{
					$user_image = $this->input->post('user_image');
				}
			if($this->input->post('user_passwordlama')==$this->input->post('user_password')){
					$password = $this->input->post('user_passwordlama');
			  }else{
					$password = md5($this->input->post('user_password'));
			  }
			$this->m_mahasiswa_index->edit($user_id, array(// Panggil fungsi edit() yang ada di M_mahasiswa_index.php
				  "user_fullname" => $this->input->post('user_fullname'),
				  "user_password" => $password,
				  "user_email" => $this->input->post('user_email'),
				  "user_semester" => $this->input->post('user_semester'),
				  "user_image" => $user_image,
				  "user_updater" => $this->session->userdata('nim')
				));
			redirect('mahasiswa');		
		}   
		
    }	

	public function nilai()
	{
		$data['tbl_mahasiswa_nilai'] = $this->m_mahasiswa_nilai->view();
		$this->load->view('v_mahasiswa_header');
		$this->load->view('v_mahasiswa_nilai', $data);
		$this->load->view('v_admin_footer_form');
		$this->load->view("v_mahasiswa_chat"); //ini adalah fitur chatting
	}
	public function nilai_aksi_tambah()
	{
		if($this->input->post('submit')){
			$this->m_mahasiswa_nilai->add(); // Panggil fungsi add() yang ada di M_mahasiswa_nilai.php
			redirect('mahasiswa/nilai');
		}  
	}
	public function materi()
	{
		$data['tbl_admin_materi'] = $this->m_mahasiswa_materi->materi();
		$data['tbl_mahasiswa_materi'] = $this->m_mahasiswa_materi->view();
		$data['tbl_mahasiswa_kelas'] = $this->m_mahasiswa_materi->viewkelas();
		$data['jumlahmateri'] = $this->m_mahasiswa_materi->jumlahmateri($this->uri->segment(3));
		$this->load->view('v_mahasiswa_header');
		$this->load->view('v_mahasiswa_materi', $data);
		$this->load->view('v_admin_footer_datatables');
			$this->load->view("v_mahasiswa_chat"); //ini adalah fitur chatting
	}
	public function tugas()
	{
		$data['tbl_admin_tugas'] = $this->m_mahasiswa_tugas->tugas();
		$data['tbl_mahasiswa_tugas'] = $this->m_mahasiswa_tugas->view();
		$data['tbl_mahasiswa_kelas'] = $this->m_mahasiswa_tugas->viewkelas();
		$data['jumlahtugas'] = $this->m_mahasiswa_tugas->jumlahtugas($this->uri->segment(3));
		$this->load->view('v_mahasiswa_header');
		$this->load->view('v_mahasiswa_tugas', $data);
		$this->load->view('v_admin_footer_datatables');
			$this->load->view("v_mahasiswa_chat"); //ini adalah fitur chatting
	}
	// START INI ADALAH FUNGSI FUNGSI UNTUK HALAMAN LAPORAN
	public function group($kelas_id)
    {
		$data['tbl_users'] = $this->m_mahasiswa_group->laporan($kelas_id);
		$data['tbl_users_2'] = $this->m_mahasiswa_group->jumlahmahasiswakelas($kelas_id);
		$data['tbl_users_3'] = $this->m_mahasiswa_group->jumlahtopikkelas($kelas_id);
		$data['tbl_admin_kelas'] = $this->m_mahasiswa_group->view();
		$data['tbl_admin_kelas_2'] = $this->m_mahasiswa_group->view_by($kelas_id);
        $this->load->view("v_mahasiswa_header");
        $this->load->view("v_mahasiswa_group", $data);
        $this->load->view("v_admin_footer_datatables");
    }
	// END INI ADALAH FUNGSI FUNGSI UNTUK HALAMAN LAPORAN
	
	// START INI ADALAH FUNGSI FUNGSI UNTUK HALAMAN GRAFIK
	public function grafik($kelas_id)
    {
		$data['tbl_users_1'] = $this->m_mahasiswa_index->view();
		$data['tbl_users_2'] = $this->m_mahasiswa_group->jumlahmahasiswakelas($kelas_id);
		$data['tbl_users_3'] = $this->m_mahasiswa_group->jumlahtopikkelas($kelas_id);
		$data['tbl_admin_kelas'] = $this->m_mahasiswa_group->view();
		$data['tbl_admin_kelas_2'] = $this->m_mahasiswa_group->view_by($kelas_id);
		$data['tbl_mahasiswa_kelas'] = $this->m_mahasiswa_tugas->view();
        $this->load->view("v_mahasiswa_header");
        $this->load->view("v_mahasiswa_grafik", $data);
        $this->load->view("v_admin_footer_datatables");
    }
	// END INI ADALAH FUNGSI FUNGSI UNTUK HALAMAN GRAFIK
	
	// START INI ADALAH FUNGSI FUNGSI UNTUK HALAMAN TEST ONLINE
	public function tesonline($wherekelas="", $wheretopik="", $pretest_id="")
    {
		$user_id = $this->session->userdata('userid');
		if($wherekelas!=""){		
			$where2 = array("kelas_id" => $wherekelas);
			$data['tbl_pretest'] = $this->m_general->view_where("tbl_pretest",$where2,$order="");
			
			$query_kelas_users_id = $this->db->query("select * from tbl_admin_kelas, tbl_admin_kelas_users
			where tbl_admin_kelas.kelas_id=tbl_admin_kelas_users.kelas_id AND user_id='$user_id' AND 
			tbl_admin_kelas_users.kelas_id='$wherekelas'")->row();
				
			$data['kelas_users_id'] = $query_kelas_users_id->kelas_users_id;
		}
		if($pretest_id!=""){
			$where = array("pretest_id" =>$pretest_id);
			$data['tbl_pretest_by'] = $this->m_general->view_by("tbl_pretest",$where);
			$data['jumlahsoal'] = $this->m_general->countdata("tbl_soal", $where);
		}
		$data['tbl_admin_kelas'] = $this->db->query("select * from tbl_admin_kelas, tbl_admin_kelas_users
		where tbl_admin_kelas.kelas_id=tbl_admin_kelas_users.kelas_id AND user_id='$user_id'")->result();
		$data['tbl_admin_kelas_2'] = $this->m_admin_kelas->view_by($wherekelas);
		
		
		$this->load->view("v_mahasiswa_header");
        $this->load->view("v_mahasiswa_tesonline",$data);
        $this->load->view("v_admin_footer_datatables");
    }
	// END INI ADALAH FUNGSI FUNGSI UNTUK HALAMAN TEST ONLINE
	
	// START INI ADALAH FUNGSI FUNGSI UNTUK HALAMAN SOAL TEST ONLINE
	public function soal($wherekelas="", $wheretopik="", $pretest_id="")
    {
		$where = array("pretest_id" =>$pretest_id);
		$data['tbl_pretest'] = $this->m_general->view_by("tbl_pretest",$where);
		$data['tbl_soal'] = $this->m_general->view_where("tbl_soal",$where, $order="RAND ()");
		$data['jumlahsoal'] = $this->m_general->countdata("tbl_soal", $where);
		$this->load->view("v_mahasiswa_header");
        $this->load->view("v_mahasiswa_soal",$data);
        $this->load->view("v_admin_footer_datatables");
    }
	// END INI ADALAH FUNGSI FUNGSI UNTUK HALAMAN TEST ONLINE
	
	public function soal_action()
    {
		if(isset($_POST['nilaipretest_topik'])){
			
			if(isset($_SESSION["mulai"])){
				unset($_SESSION["mulai"]);
			}

            $pilihan=$_POST["pilihan"];
            $id_soal=$_POST["id"];
            $jumlah=$_POST['jumlah'];
            $kelas_id=$_POST['kelas_id'];
            $nilaipretest_topik=$_POST['nilaipretest_topik'];
            $pretest_id=$_POST['pretest_id'];
            
			$where = array("pretest_id" => $pretest_id);
			$pretest = $this->m_general->view_by("tbl_pretest",$where);
			$user_id = $this->session->userdata('userid');
			$query_kelas_users_id = $this->db->query("select * from tbl_admin_kelas, tbl_admin_kelas_users
		where tbl_admin_kelas.kelas_id=tbl_admin_kelas_users.kelas_id AND user_id='$user_id' AND 
		tbl_admin_kelas_users.kelas_id='$kelas_id'")->row();
			
			$kelas_users_id = $query_kelas_users_id->kelas_users_id;
			
            $score=0;
            $benar=0;
            $salah=0;
            $kosong=0;
            
            for ($i=0;$i<$jumlah;$i++){
                //id nomor soal
                $nomor=$id_soal[$i];
                
                //jika user tidak memilih jawaban
                if (empty($pilihan[$nomor])){
                    $kosong++;
                }else{
                    //jawaban dari user
                    $jawaban=$pilihan[$nomor];
                    
                    //cocokan jawaban user dengan jawaban di database
                    $where = array("id_soal" =>$nomor, "soal_jawaban" =>$jawaban);
					$cek = $this->m_general->countdata("tbl_soal", $where);
                    
                    if($cek){
                        //jika jawaban cocok (benar)
                        $benar++;
                    }else{
                        //jika salah
                        $salah++;
                    }
                } 
                /*RUMUS
                Jika anda ingin mendapatkan Nilai 100, berapapun jumlah soal yang ditampilkan 
                hasil= 100 / jumlah soal * jawaban yang benar
                */
                
                $score = ROUND(100/$jumlah*$benar,0);
            }
			//Lakukan Penyimpanan Kedalam Database
      $data['benar'] = $benar;
      $data['salah'] = $salah;
      $data['kosong'] = $kosong;
      $data['score'] = $score;
	  
			if($pretest->pretest_topik>0){
			  $data = array(
				"kelas_users_id" => $kelas_users_id,
				"nilai_pretest" => $score,
				"nilaipretest_topik" => $nilaipretest_topik,
				"nilaipretest_creator" => $this->session->userdata('nim')
				);
				$this->db->insert('tbl_admin_nilai_pretest', $data);
			} 
			if($pretest->pretest_topik==0){
			  $data = array(
				"kelas_users_id" => $kelas_users_id,
				"nilai_uts" => $score,
				"uts_creator" => $this->session->userdata('nim')
				);
				$this->db->insert('tbl_admin_nilai_uts', $data);
			}
			if($pretest->pretest_topik<0){
			  $data = array(
				"kelas_users_id" => $kelas_users_id,
				"nilai_uas" => $score,
				"uas_creator" => $this->session->userdata('nim')
				);
				$this->db->insert('tbl_admin_nilai_uas', $data);
			} 
		}
	  redirect("mahasiswa/tesonline/$kelas_id/$nilaipretest_topik/$pretest_id");
    }

    	public function chatboot_list_data(){
		 $this->load->view("v_admin_chat_list");
	}

	public function chatboot_list_add(){
		 $this->load->view("v_admin_chat_add");
	}

	public function chatboot_list_addboot(){
		 $this->load->view("v_admin_chat_addboot");
	}


}