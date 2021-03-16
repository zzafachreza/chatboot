  <div class="content-wrapper ">
    <section class="content-header">
      <h1>
        Tambah
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
				  <?php echo form_open("admin/kelas_aksi_tambah"); ?>
					<div class="col-md-6">
					  <div class="form-group">
						<label>Nama Mata Kuliah</label>
						<input type="text" class="form-control" name="kelas_nama">
					  </div>
					  <div class="form-group">
						<label>Nama Input Nilai 1</label>
						<input type="text" class="form-control" name="kelas_nilai_x">
					  </div>
					  <div class="form-group">
						<label>Nama Input Nilai 2</label>
						<input type="text" class="form-control" name="kelas_nilai_y">
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