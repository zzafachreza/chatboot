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
				  <?php echo form_open_multipart("admin/tugas_aksi_tambah"); ?>
					<div class="col-md-6">
					  <div class="form-group">
						<label>Nama kelas</label>
						<select type="text" class="form-control select2" name="kelas_id">
							<option>-- Pilih kelas --</option>
							<?php
							foreach($tbl_admin_kelas as $data){
								echo "<option value='".$data->kelas_id."'>".$data->kelas_nama."</option>";
							}
							?>
						</select>
					  </div>
					  <div class="form-group">
						<label>topik</label>
						<input type="text" class="form-control" name="tugas_topik">
					  </div>
					  <div class="form-group">
						<label>Nama Tugas</label>
						<input type="text" class="form-control" name="tugas_nama">
					  </div>
					  <div class="form-group">
						<label>Pilih Sumber Video : </label>
						<label>
						<input type="radio" name='thing' value='valuable' data-id="berkas" /> Youtube
						</label>
						<label>
						<input type="radio" name='thing' value='valuable' data-id="youtube" /> Berkas Video
						</label>
					  </div>
					  <div id="berkas" class="none form-group">
						<label>Video File</label>
						<input type="file" class="form-control" name="userfiles1">
					  </div>
					  <div id="youtube" class="none form-group">
						<label>Video Link (Youtube Only)</label>
						<input type="text" class="form-control" name="tugas_linkvideo">
					  </div>
					  <div class="form-group">
						<label>File</label>
						<input type="file" class="form-control" name="userfiles2">
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