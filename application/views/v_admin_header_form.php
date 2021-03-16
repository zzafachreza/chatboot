<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SCOP</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datepicker/datepicker3.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/iCheck/all.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/colorpicker/bootstrap-colorpicker.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/timepicker/bootstrap-timepicker.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css">
  <style>
  div, section, table, tr, th, td, button, input{
	  border-radius:10px;
  }
.none {
    display:none;
}
</style>
</head>
<body class="hold-transition skin-black-light sidebar-mini">
<div class="wrapper"> 

  <header class="main-header">
    <a href="" class="logo">
      <span class="logo-mini"></span><b><img class="profile-img" src="<?php echo base_url();?>assets/dist/img/logo.png" alt="" style="height:4vw;"></b>
    </a>
    <nav class="navbar navbar-static-top" >
      <div style="text-align:center;" class="col-xs-10">
		<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
			<span class="sr-only">Toggle navigation</span>
		</a>
		<div  style="padding-top: 15px;"><b>SMART COOPERATIVE ORIENTED PROBLEMS</b></div>
		
      </div>
        <ul class="nav navbar-nav">
		  <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url();?>assets/avatar/<?php echo $this->session->userdata("userimage")."?".strtotime("now");?>" class="user-image" alt="User Image">
              <span class="hidden-xs">Hi, { <?php echo $this->session->userdata("nama_lengkap"); ?> }</span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo base_url(); ?>login/logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
    </nav>
  </header>
  <?php
  $geturl = $this->uri->segment(2);
  $menu_admin = "";
  $menu_kelas = "";
  $menu_nilai = "";
  $menu_materi = "";
  $menu_tugas = "";
  $menu_laporan = "";
  $menu_grafik = "";
  $menu_soal = "";
  $menu_pengelompokan = "";
  
  if($geturl=="" or strpos($geturl, "index")!== FALSE){
	  $menu_admin = "active";
  }
  if(strpos($geturl, "kelas")!== FALSE){
	  $menu_kelas = "active";
  }
  if(strpos($geturl, "nilai")!== FALSE){
	  $menu_nilai = "active";
  }
  if(strpos($geturl, "materi")!== FALSE){
	  $menu_materi = "active";
  }
  if(strpos($geturl, "tugas")!== FALSE){
	  $menu_tugas = "active";
  }
  if(strpos($geturl, "laporan")!== FALSE){
	  $menu_laporan = "active";
  }
  if(strpos($geturl, "grafik")!== FALSE){
	  $menu_grafik = "active";
  }
  if(strpos($geturl, "soal")!== FALSE){
	  $menu_soal = "active";
  }
  if(strpos($geturl, "pengelompokan")!== FALSE){
	  $menu_pengelompokan = "active";
  }
  
  ?>
  <aside class="main-sidebar">
    <section class="sidebar">
      <ul class="sidebar-menu">
        <li class="<?php echo $menu_admin;?>">
          <a href="<?php echo base_url(); ?>admin">
            <i class="fa fa-users"></i> <span>DASHBOARD</span>
          </a>
        </li>
		<li class="<?php echo $menu_kelas;?>">
          <a href="<?php echo base_url(); ?>admin/kelas">
            <i class="fa fa-file-text"></i> <span>DATA KELAS</span>
          </a>
        </li>
		<li class="<?php echo $menu_nilai;?>">
          <a href="<?php echo base_url(); ?>admin/nilai">
            <i class="fa fa-pencil-square"></i> <span>INPUT NILAI</span>
          </a>
        </li>
		<li class="<?php echo $menu_materi;?>">
          <a href="<?php echo base_url(); ?>admin/materi">
            <i class="fa fa-pencil-square"></i> <span>INPUT MATERI</span>
          </a>
        </li>
		<li class="<?php echo $menu_tugas;?>">
          <a href="<?php echo base_url(); ?>admin/tugas">
            <i class="fa fa-pencil-square"></i> <span>INPUT TUGAS</span>
          </a>
        </li>
		<li class="<?php echo $menu_soal;?>">
          <a href="<?php echo base_url(); ?>admin/soal">
            <i class="fa fa-pencil-square"></i> <span>INPUT SOAL</span>
          </a>
        </li>
		<li class="<?php echo $menu_pengelompokan;?>">
          <a href="<?php echo base_url(); ?>admin/pengelompokan/0/0/1">
            <i class="fa fa-file-text"></i> <span>PENGELOMPOKAN</span>
          </a>
        </li>
		<li class="<?php echo $menu_laporan;?>">
          <a href="<?php echo base_url(); ?>admin/laporan/lainnya">
            <i class="fa fa-file-text"></i> <span>LAPORAN</span>
          </a>
        </li>
		<li class="<?php echo $menu_grafik;?>">
          <a href="<?php echo base_url(); ?>admin/grafik/0/0">
            <i class="fa fa-file-text"></i> <span>GRAFIK</span>
          </a>
        </li>
      </ul>
    </section>
  </aside>