  <div class="content-wrapper ">
    <section class="content-header">
      <h1>
        Tambah Kelas Mahasiswa
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
				  <?php echo form_open("admin/kelas_users_aksi_tambah"); ?>
					<div class="col-md-6">
					  <div class="form-group">
						<label>Nama kelas</label>
						<select type="text" class="form-control select2" name="kelas_id">
							<option>-- Pilih --</option>
							<?php
							foreach($tbl_admin_kelas as $data){
								echo "<option value='".$data->kelas_id."'>".$data->kelas_nama."</option>";
							}
							?>
						</select>
					  </div>
					  <div class="form-group">
						<label>Nama Mahasiswa</label>
						<select type="text" class="form-control select2" name="user_id">
							<option>-- Pilih --</option>
							<?php
							foreach($tbl_users as $data2){
								echo "<option value='".$data2->user_id."'>".$data2->user_nim." - ".$data2->user_fullname."</option>";
							}
							?>
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