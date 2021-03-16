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
				  <?php echo form_open("admin/nilai_aksi_ubah/".$tbl_admin_nilai->nilai_id); ?>
					<div class="col-md-6">
					  <div class="form-group">
						<label>Nama Mahasiswa</label>
						<input type="text" class="form-control" value="<?php echo set_value('user_nim', $tbl_admin_nilai->user_nim); ?> - <?php echo set_value('user_fullname', $tbl_admin_nilai->user_fullname); ?>" readonly>
					  </div>
					  <div class="form-group">
						<label>Nama kelas</label>
						<input type="text" class="form-control" value="<?php echo set_value('kelas_nama', $tbl_admin_nilai->kelas_nama); ?>" readonly>
					  </div>
					  <div class="form-group">
						<label>topik</label>
						<input type="text" class="form-control" name="nilai_topik" value="<?php echo set_value('nilai_topik', $tbl_admin_nilai->nilai_topik); ?>">
					  </div>
					  <div class="form-group">
						<label>Nilai</label>
						<input type="text" class="form-control" name="nilai_angka" value="<?php echo set_value('nilai_angka', $tbl_admin_nilai->nilai_angka); ?>">
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