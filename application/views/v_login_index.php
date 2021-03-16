<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login</title>
     <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/dist/img/icon.png">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/animate.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/iCheck/flat/blue.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/morris/morris.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datepicker/datepicker3.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
<body>

	<style type="text/css">
		input:focus{
    outline: none;
}
	</style>
	<div id="daisyjs" style="background-color:  #58985C;width: 100%;height: 800px;">
			
		
		

					<div style="position: absolute;top:1%;padding-left:5%" class="row">

				
						<div class="col col-sm-6 ">
					<div style="height: 200px;margin:5%">
						<img src="<?php echo base_url().'assets/dist/img/bawah.png' ?>" width="100%" style=" -webkit-animation: shake 20s infinite alternate;">
					</div>
						<img src="<?php echo base_url().'assets/dist/img/web.png' ?>" style="width: 70%;position:absolute;-webkit-animation: flipInY 3s infinite alternate;">
					</div>

					
					
						<div class="col col-sm-6" style="padding-top:1%">
						<?php

							if (!empty($err)) {
								# code...
								$opa = 1;
								$color ="red";
							}else{
								$opa=0;
								$color="#58985C";
							}

						?>

							<div style="width:450px;background-color: white;border-radius: 20px;margin:5%;padding-left:5%;padding-right:5%;padding-top:5%;padding-bottom:10%;opacity: 0.8;box-shadow: 1px 1px 15px gray">

								<p style="-webkit-animation: shake 10s infinite alternate;color: red;font-size: 14pt;opacity: 0.9;text-align: center;"><?php echo $err ?></p>


								<img src="<?php echo base_url().'assets/dist/img/login.svg' ?>" width="80%">
								<center><h1>LOG IN</h1></center>
								<form action="<?php echo base_url('login/aksi_login'); ?>" method="post">
									<div class="form-group">
										<label style="color: <?php echo $color ?>">NIM</label>
										<input type="text" name="user_nim" style="border-radius: :10px;width: 100%;height: 40px;border-radius: 0px;border-top:0px;border-right: 0px;border-left: 0px;border-bottom: 1px solid <?php echo $color ?>" placeholder="Enter your nim" autocomplete="off" autofocus="autofocus">
									</div>
									<div class="form-group">
										<label style="color: <?php echo $color ?>">Password</label>
										<input type="password" name="user_password" style="border-radius: :10px;width: 100%;height: 40px;border-radius: 0px;border-top:0px;border-right: 0px;border-left: 0px;border-bottom: 1px solid <?php echo $color ?>" placeholder="Enter your password">
									</div>
									<div class="form-group">
										<button style="background-color: #58985C;width: 100%;border-radius: 10px;height: 45px;margin-top: 5%;border: 0px;color: #FFF;font-size: 14pt" type="submit">MASUK</button>
										<hr />

										<center><a style="color:#000;font-size: 12pt;border-bottom: 1px solid #58985C" href="<?php echo base_url(); ?>login/daftar">Belum punya akun, silahkan daftar disini</u></a></center>
									</div>
								</form>
							</div>
						
					</div>
</div>




<style type="text/css">
	@keyframes phone {
		  from { transform: translateX(0px); }
		  to { transform: translateX(100px); }
		}
		@-webkit-keyframes phone {
		  from { transform: translateX(0px); }
		  to { transform: translateX(100px); }
		}
</style>



<script type="text/javascript">
	    // daisy effect
        document.addEventListener('DOMContentLoaded', function () {
          daisyjs(document.getElementById('daisyjs'), {
            dotColor: '#fff',
            lineColor: '#ddd'
          });
        }, false);
</script>

</body>
<script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/morris/morris.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/sparkline/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/knob/jquery.knob.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/fastclick/fastclick.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/app.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/pages/dashboard.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/daisy.js"></script>
</body>
</html>

