<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct()
	{
		parent::__construct();		
		$this->load->model('m_login');
 
	}	
	public function index()
	{

	error_reporting(0);
    $useragent = $_SERVER['HTTP_USER_AGENT']; 
    $iPod = stripos($useragent, "iPod"); 
    $iPad = stripos($useragent, "iPad"); 
    $iPhone = stripos($useragent, "iPhone");
    $Android = stripos($useragent, "Android"); 
    $iOS = stripos($useragent, "iOS");
    //-- You can add billion devices 
    $DEVICE = ($iPod||$iPad||$iPhone||$Android||$iOS||$webOS||$Blackberry||$IEMobile||$OperaMini);
     $data['DEVICE'] = $DEVICE;

		$this->load->view('v_login_index',$data);
	}
	public function daftar()
	{

		error_reporting(0);
	    $useragent = $_SERVER['HTTP_USER_AGENT']; 
	    $iPod = stripos($useragent, "iPod"); 
	    $iPad = stripos($useragent, "iPad"); 
	    $iPhone = stripos($useragent, "iPhone");
	    $Android = stripos($useragent, "Android"); 
	    $iOS = stripos($useragent, "iOS");
	    //-- You can add billion devices 
	    $DEVICE = ($iPod||$iPad||$iPhone||$Android||$iOS||$webOS||$Blackberry||$IEMobile||$OperaMini);
	     $data['DEVICE'] = $DEVICE;
		$this->load->view('v_login_daftar',$data);
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
	
	function aksi_login(){
		$user_nim = $this->input->post('user_nim');
		$user_password = md5($this->input->post('user_password'));
		$where = array(
			'user_nim' => $user_nim,
			'user_password' => $user_password
			);
		$checking = $this->m_login->check_login('tbl_users', array('user_nim' => $user_nim), array('user_password' => $user_password));
		
		if($checking > 0){
			foreach ($checking as $apps) {
				$data_session = array(
					'userid' => $apps->user_id,
					'nim' => $apps->user_nim,
					'nama_lengkap' => $apps->user_fullname,
					'level' => $apps->user_level,
					'aktif' => $apps->user_aktif,
					'userimage' => $apps->user_image,
					'status' => "login"
					);
	 
				$this->session->set_userdata($data_session);
				
				if($apps->user_level=="admin" and $this->session->userdata('aktif') != "0"){
					redirect(base_url("admin"));
				}elseif($apps->user_level=="mahasiswa" and $this->session->userdata('aktif') != "0"){
					redirect(base_url("mahasiswa"));
				}else{
					$data['err'] = "User belum aktif !";
					$this->load->view('v_login_index',$data);
				}
			
			}
		}else{
			$data['err'] = "Username dan password salah !";
			$this->load->view('v_login_index',$data);
		}
	}
	
	function aksi_daftar()
	{
		if($this->input->post('user_password')==$this->input->post('user_password2')){
				
			$data = array(
			  "user_nim" => $this->input->post('user_nim'),
			  "user_fullname" => $this->input->post('user_fullname'),
			  "user_password" => md5($this->input->post('user_password')),
			  "user_email" => $this->input->post('user_email'),
			  "user_semester" => $this->input->post('user_semester'),
			  "user_level" => 'mahasiswa',
			  "user_aktif" => '0',
			  "user_creator" => $this->input->post('user_nim')
			);
			
			$this->db->insert('tbl_users', $data); // Untuk mengeksekusi perintah insert data
			echo "Sudah terdaftar, menunggu konfirmasi dari Admin";
		}else{
			$data['err'] = "Password tidak cocok, mohon diulangi pendaftaran anda";
		}
		$this->load->view('v_login_daftar',$data);
	}
 
}
