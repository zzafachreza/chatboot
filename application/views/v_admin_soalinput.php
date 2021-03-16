<?php 
$pretest_id = $this->uri->segment(3);
$id_soal = $this->uri->segment(4);
?>
<div class="content-wrapper ">
	<section class="content-header">
      <h1>
        Input Soal Test Online
      </h1>
    </section>
    <!-- Main content -->
    <section class="content" >
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-body no-padding">
						<div class="box-header">
							Silahkan pilih soal Test Online yang ingin dinputkan.
							
							<table width="50%">
								<tr>
									<td width="200px">Pilih Test Online</td>
									<td width="10px">:</td>
									<td>
										<select type="text" class="form-control select2" onchange="if (this.value) window.location='<?php echo base_url();?>admin/soalinput/'+this.value">
										<?php
										if($pretest_id==""){
											echo "<option> -- Pilih Pretest --</option>";
										}else{
											echo "<option value='".$tbl_pretest_by->pretest_id."'>".$tbl_pretest_by->pretest_nama."</option>";
										}
										
										foreach($tbl_pretest as $pretest){
											echo "<option value='".$pretest->pretest_id."'>".$pretest->pretest_nama."</option>";
										}
										?>
										</select>
									</td>
								</tr>
							</table>
							<hr>
							<?php if($pretest_id!="" && $id_soal==""){
								$attributes1 = array('target' => '', 'id' => 'tambah');
								echo form_open_multipart("admin/soal_aksi_tambah", $attributes1);
								?>
								<div class="col-md-12">
									<div class="form-group">
											<label>Tambah Soal</label>
											<input type="hidden" name="pretest_id" value="<?php echo $pretest_id;?>">
											
									</div>
								</div>
								<div class="col-md-9">
									<div class="form-group">
											<label>Soal</label>
											<textarea rows="1" class="form-control" name="soal" placeholder="Soal"></textarea>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
											<label>Kunci Jawaban</label>
											<input type="text" class="form-control" name="soal_jawaban" placeholder="Kunci Jawaban">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
											<label>Jawaban A</label>
											<input type="text" class="form-control" name="a" placeholder="Jawaban A">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
											<label>Jawaban B</label>
											<input type="text" class="form-control" name="b" placeholder="Jawaban B">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
											<label>Jawaban C</label>
											<input type="text" class="form-control" name="c" placeholder="Jawaban C">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
											<label>Jawaban D</label>
											<input type="text" class="form-control" name="d" placeholder="Jawaban D">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
											<label>Jawaban E</label>
											<input type="text" class="form-control" name="e" placeholder="Jawaban E">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>&nbsp;</label>
										<input type="submit" onclick="return confirm('Yakin untuk tambah?');" form="tambah" value="Simpan Tambah" class="form-control btn btn-success">
									</div>
							<hr>
								</div>
							<?php echo form_close(); 
							} 

							if($pretest_id!="" && $id_soal!=""){
								$attributes2 = array('target' => '', 'id' => 'ubah');
								echo form_open_multipart("admin/soal_aksi_ubah", $attributes2);
								?>
								<div class="col-md-12">
									<div class="form-group">
											<label>Ubah Soal</label>
											<input type="hidden" name="id_soal" value="<?php echo $id_soal;?>">
											<input type="hidden" name="pretest_id" value="<?php echo $pretest_id;?>">
									</div>
								</div>
								<div class="col-md-9">
									<div class="form-group">
											<label>Soal</label>
											<textarea rows="1" class="form-control" name="soal"><?php echo $tbl_soal_by->soal;?></textarea>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
											<label>Kunci Jawaban</label>
											<input type="text" class="form-control" name="soal_jawaban" value="<?php echo $tbl_soal_by->soal_jawaban;?>">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
											<label>Jawaban A</label>
											<input type="text" class="form-control" name="a" value="<?php echo $tbl_soal_by->a;?>">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
											<label>Jawaban B</label>
											<input type="text" class="form-control" name="b" value="<?php echo $tbl_soal_by->b;?>">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
											<label>Jawaban C</label>
											<input type="text" class="form-control" name="c" value="<?php echo $tbl_soal_by->c;?>">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
											<label>Jawaban D</label>
											<input type="text" class="form-control" name="d" value="<?php echo $tbl_soal_by->d;?>">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
											<label>Jawaban E</label>
											<input type="text" class="form-control" name="e" value="<?php echo $tbl_soal_by->e;?>">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<input type="submit" onclick="return confirm('Yakin untuk ubah?');" form="ubah" value="Simpan Ubah" class="btn btn-warning">
									</div>
							<hr>
								</div>
							<?php echo form_close(); 
							} ?>
							<table width="100%" id="soal" class="table table-stripped table-condensed">
								<thead>
								<tr>
									<th>No</th>
									<th>Soal</th>
									<th>Jawaban A</th>
									<th>Jawaban B</th>
									<th>Jawaban C</th>
									<th>Jawaban D</th>
									<th>Jawaban E</th>
									<th>Kunci</th>
									<th>Action</th>
								</tr>
								</thead>
								<tbody>
									<?php
									$base_url = base_url("admin/soal");
									$base_url2 = base_url("admin/soal_aksi_hapus");
									$no = 1;
									foreach($tbl_soal as $soal){
									echo "
									<tr>
										<td>$no</td>
										<td>$soal->soal</td>
										<td>$soal->a</td>
										<td>$soal->b</td>
										<td>$soal->c</td>
										<td>$soal->d</td>
										<td>$soal->e</td>
										<td>$soal->soal_jawaban</td>
										<td><a href='$base_url/$pretest_id/$soal->id_soal' class='btn btn-xs btn-warning'><i class='fa fa-pencil'> </i> </a>  <a onclick=\"return confirm('Yakin untuk hapus?');\" href='$base_url2/$pretest_id/$soal->id_soal' class='btn btn-xs btn-danger'><i class='fa fa-trash'> </i> </a>
										</td>
									</tr>";
									$no++; } ?>
								</tbody>
							</table>
						
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
$('#soal').DataTable({
			"processing": true,
			"ordering": false,
			"autoWidth": false,
			"paging": true,
			"info": true,
			"pageLength": 25,
			'order': [[2, 'asc']],
			columnDefs: [],
		});
				
</script>