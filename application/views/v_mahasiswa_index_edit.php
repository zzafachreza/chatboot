  <div class="content-wrapper ">
    <section class="content-header">
      <h1>
        Ubah
      </h1>
    </section>

    <!-- Main content -->
    <section class="content" >
      <div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">
						<span>Silahkan melengkapi form berikut</span>
					</h3>
				</div>
				<div class="box-body">
				  <div class="row">
				  <?php echo form_open_multipart("mahasiswa/index_aksi_ubah/".$tbl_users->user_id); ?>
					<div class="col-md-6">
					  <div class="form-group">
						<label>NIM</label>
						<input type="text" class="form-control" value="<?php echo set_value('user_nim', $tbl_users->user_nim); ?>" disabled>
					  </div>
					  <div class="form-group">
						<label>Password</label>
						<input type="password" class="form-control" name="user_password" value="<?php echo set_value('user_password', $tbl_users->user_password); ?>">
						<input type="hidden" class="form-control" name="user_passwordlama" value="<?php echo set_value('user_password', $tbl_users->user_password); ?>">
					  </div>
					  <div class="form-group">
						<label>Nama Lengkap</label>
						<input type="text" class="form-control" name="user_fullname" value="<?php echo set_value('user_fullname', $tbl_users->user_fullname); ?>">
					  </div>
					  <div class="form-group">
						<label>E-Mail</label>
						<input type="text" class="form-control" name="user_email" value="<?php echo set_value('user_email', $tbl_users->user_email); ?>">
					  </div>
					  <div class="form-group">
						<label>Semester</label>
						<select type="text" class="form-control select2" name="user_semester">
							<option value="<?php echo set_value('user_semester', $tbl_users->user_semester); ?>"><?php echo set_value('user_semester', $tbl_users->user_semester); ?></option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
							<option value="10">10</option>
						</select>
					  </div>
					  <div class="form-group">
						<input type="submit" name="submit" value="Submit" class="btn btn-success">
					  </div>
					</div>
					<div class="col-md-6">
					  <div class="form-group">
						<label>Foto Profile</label>
						<input type="file" onchange="readURL(this);"  class="form-control" name="userfiles">
						<input type="hidden" name="user_image" value="<?php echo set_value('user_image', $tbl_users->user_image); ?>">
					  </div>
					  <div class="form-group" style="text-align:center;">
						<img width="290" height="290" class="img" id="blah" src="<?php echo base_url();?>assets/avatar/<?php echo $tbl_users->user_image."?".strtotime("now");?>">
					  </div>
					</div>
					<?php echo form_close(); ?>
				  </div>
				</div>
			</div>
		</div>
      </div>
    </section>
	
  </div>
<script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>