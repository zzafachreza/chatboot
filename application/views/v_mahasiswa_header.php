<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SCOP</title>
     <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/dist/img/icon.png">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/iCheck/all.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/iCheck/flat/blue.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/morris/morris.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datepicker/datepicker3.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css">
  <style>
  div, section, table, tr, th, td, button{
	  border-radius: 2px;
  }
  </style>
</head>
<body class="hold-transition skin-black-light sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <a href="" class="logo">
      <span class="logo-mini"></span><b><img class="profile-img" src="<?php echo base_url();?>assets/dist/img/logo.png" alt="" style="height:3vw;"></b>
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
  $menu_mahasiswa = "";
  $menu_nilai = "";
  $menu_materi = "";
  $menu_tugas = "";
  $menu_grafik = "";
  
  if($geturl=="" or strpos($geturl, "index")!== FALSE){
	  $menu_mahasiswa = "active";
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
  if(strpos($geturl, "grafik")!== FALSE){
	  $menu_grafik = "active";
  }
  
  ?>
  <aside class="main-sidebar">
    <section class="sidebar">
      <ul class="sidebar-menu">
        <li class="<?php echo $menu_mahasiswa;?>">
          <a href="<?php echo base_url(); ?>mahasiswa">
            <i class="fa fa-users"></i> <span>Profile</span>
          </a>
        </li>
		<li class="<?php echo $menu_nilai;?>">
          <a href="<?php echo base_url(); ?>mahasiswa/nilai">
            <i class="fa fa-pencil-square"></i> <span>Input Nilai</span>
          </a>
        </li>
		<li class="<?php echo $menu_materi;?>">
          <a href="<?php echo base_url(); ?>mahasiswa/materi">
            <i class="fa fa-pencil-square"></i> <span>Materi</span>
          </a>
        </li>
		<li class="<?php echo $menu_tugas;?>">
          <a href="<?php echo base_url(); ?>mahasiswa/tugas">
            <i class="fa fa-pencil-square"></i> <span>Tugas</span>
          </a>
        </li>
		<li class="<?php echo $menu_grafik;?>">
          <a href="<?php echo base_url(); ?>mahasiswa/grafik/0/0">
            <i class="fa fa-file-text"></i> <span>Grafik</span>
          </a>
        </li>
		<li class="<?php echo $menu_grafik;?>">
          <a href="<?php echo base_url(); ?>mahasiswa/tesonline">
            <i class="fa fa-pencil-square-o"></i> <span>Tes Online</span>
          </a>
        </li>
      </ul>
    </section>
  </aside>