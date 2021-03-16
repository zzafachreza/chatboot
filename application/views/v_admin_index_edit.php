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
				  <?php echo form_open("admin/index_aksi_ubah/".$tbl_users->user_id); ?>
					<div class="col-md-6">
					  <div class="form-group">
						<label>NIM</label>
						<input type="text" class="form-control" name="user_nim" value="<?php echo set_value('user_nim', $tbl_users->user_nim); ?>">
					  </div>
					  <div class="form-group">
						<label>Password</label>
						<input type="password" class="form-control" name="user_password" value="<?php echo set_value('user_password', $tbl_users->user_password); ?>">
						<input type="hidden" class="form-control" name="user_passwordlama" value="<?php echo set_value('user_password', $tbl_users->user_password); ?>">
					  </div>
					  <div class="form-group">
						<label>Level</label>
						<select type="text" class="form-control select2" name="user_level">
							<option value="<?php echo set_value('user_level', $tbl_users->user_level); ?>"><?php echo set_value('user_level', $tbl_users->user_level); ?></option>
							<option value="admin">Admin</option>
							<option value="mahasiswa">Mahasiswa</option>
						</select>
					  </div>
					  <div class="form-group">
						<label>Status</label>
						<select type="text" class="form-control select2" name="user_aktif">
							<option value="<?php echo set_value('user_aktif', $tbl_users->user_aktif); ?>"><?php if($tbl_users->user_aktif=="1"){echo "Aktif";}else{echo "Non Aktif";} ?></option>
							<option value="1">Aktif</option>
							<option value="0">Non Aktif</option>
						</select>
					  </div>
					</div>
					<div class="col-md-6">
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
						</select>
					  </div>
					  <div class="form-group">
						<input type="submit" name="submit" value="Submit" class="btn btn-success">
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