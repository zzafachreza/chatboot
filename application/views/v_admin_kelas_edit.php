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
				  <?php echo form_open("admin/kelas_aksi_ubah/".$tbl_admin_kelas->kelas_id); ?>
					<div class="col-md-6">
					  <div class="form-group">
						<label>Nama Mata Kuliah</label>
						<input type="text" class="form-control" name="kelas_nama" value="<?php echo set_value('kelas_nama', $tbl_admin_kelas->kelas_nama); ?>">
					  </div>
					  <div class="form-group">
						<label>Nama Input Nilai 1</label>
						<input type="text" class="form-control" name="kelas_nilai_x" value="<?php echo set_value('kelas_nilai_x', $tbl_admin_kelas->kelas_nilai_x); ?>">
					  </div>
					  <div class="form-group">
						<label>Mata Input Nilai 2</label>
						<input type="text" class="form-control" name="kelas_nilai_y" value="<?php echo set_value('kelas_nilai_y', $tbl_admin_kelas->kelas_nilai_y); ?>">
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