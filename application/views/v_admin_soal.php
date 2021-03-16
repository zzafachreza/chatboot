<?php 
$pretest_id = $this->uri->segment(3);
$pilihan = $this->uri->segment(4);
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
							
							<table width="50%">
								<?php if($pretest_id!="tambah" && $pretest_id!="tambahuts" && $pretest_id!="tambahuas"){ ?>
								<tr>
									<td colspan="3">Silahkan pilih soal Test Online yang ingin dinputkan. </td>
								</tr>
								<tr>
									<td width="200px">Pilih Test Online</td>
									<td width="10px">:</td>
									<td><div class="form-group">
										<select class="form-control select2" onchange="if (this.value) window.location='<?php echo base_url();?>admin/soal/'+this.value">
										<?php
										if($pretest_id==""){
											echo "<option> -- Pilih Pretest --</option>";
										}else{
											echo "<option value='".$tbl_pretest_by->pretest_id."'>".$tbl_pretest_by->pretest_nama."</option>";
										}
										
										foreach($tbl_pretest as $pretest){
											echo "<option value='".$pretest->pretest_id."'>".$pretest->pretest_nama."</option>";
										}
										echo "<option value='tambah'> ++ Tambah Pretest ++ </option>";
										echo "<option value='tambahuts'> ++ Tambah UTS ++ </option>";
										echo "<option value='tambahuas'> ++ Tambah UAS ++ </option>";
										?>
										</select>
										</div>
									</td>
								</tr>
								<?php }?>
								
								<?php if($pretest_id!="" && ($pretest_id!="tambah" || $pretest_id!="tambahuts" || $pretest_id!="tambahuas")){ ?>
									<?php if($pilihan=="ubah"){ 
									$attributes1 = array('target' => '', 'id' => 'ubah');
									echo form_open_multipart("admin/pretest_aksi_ubah", $attributes1);
									
									if($tbl_pretest_by->pretest_topik!="0" && $tbl_pretest_by->pretest_topik!="-1"){
										?>
								<tr>
									<td width="200px">Topik</td>
									<td width="10px">:</td>
									<td><div class="form-group">
										<select class="form-control select2" name="pretest_topik">
										<?php
										echo "<option value='".$tbl_pretest_by->pretest_topik."'> Topik Ke ".$tbl_pretest_by->pretest_topik."</option>";
										for($x=1; $x<=4; $x++){
											echo "<option value='".$x."'> Topik Ke ".$x."</option>";
										}
										?>
										</select>
										</div>
									</td>
								</tr>
								<?php } ?><input type="hidden" name="pretest_id" value="<?php echo $pretest_id;?>">
								<tr>
									<td width="200px">Nama Test Online</td>
									<td width="10px">:</td>
									<td><div class="form-group">
										<input type="text" class="form-control" name="pretest_nama" placeholder="Nama Test Online" value="<?php echo $tbl_pretest_by->pretest_nama;?>">
										</div>
									</td>
								</tr>
								<tr>
									<td width="200px">Waktu Ujian</td>
									<td width="10px">:</td>
									<td><div class="form-group">
										<input type="number" class="form-control" name="pretest_waktu" placeholder="Waktu Ujian (menit)" value="<?php echo $tbl_pretest_by->pretest_waktu;?>">
										</div>
									</td>
								</tr>
								<tr>
									<td width="200px">Kelas</td>
									<td width="10px">:</td>
									<td><div class="form-group">
										<select class="form-control select2" name="kelas_id">
										<?php
										echo "<option value='".$tbl_admin_kelas_by->kelas_id."'>".$tbl_admin_kelas_by->kelas_nama."</option>";
										foreach($tbl_admin_kelas as $kelas){
											echo "<option value='".$kelas->kelas_id."'>".$kelas->kelas_nama."</option>";
										}
										?>
										</select>
										</div>
									</td>
								</tr>
								<tr>
									<td colspan="3">
										<div class="form-group">
											<input type="submit" onclick="return confirm('Yakin untuk ubah?');" form="ubah" value="Simpan Ubah" class="btn btn-warning">
										</div>
									</td>
								</tr>
									<?php echo form_close(); 
										} ?>
								
									<?php if($pilihan!="ubah" && $pretest_id!="tambah" && $pretest_id!="tambahuts" && $pretest_id!="tambahuas"){?> 
								<tr>
									<td colspan="2">
									</td>
									<td>
										<div class="form-group">
											<a href="<?php echo base_url();?>admin/soalinput/<?php echo $tbl_pretest_by->pretest_id;?>" class="btn btn-primary">Mulai Input Soal</a>
										</div>
									</td>
								</tr>
									<?php } ?>
								<?php } ?>
								
								
									<?php if($pretest_id=="tambah" || $pretest_id=="tambahuts" || $pretest_id=="tambahuas"){ 
									$attributes2 = array('target' => '', 'id' => 'tambah');
									echo form_open_multipart("admin/pretest_aksi_tambah", $attributes2);
									
									if($pretest_id=="tambahuts"){
										echo "<input type='hidden' name='pretest_topik' value='0'>";
									}
									if($pretest_id=="tambahuas"){
										echo "<input type='hidden' name='pretest_topik' value='-1'>";
									}
									
									if($pretest_id!="tambahuts" && $pretest_id!="tambahuas"){
										?>
								<tr>
									<td width="200px">Topik</td>
									<td width="10px">:</td>
									<td><div class="form-group">
										<select class="form-control select2" name="pretest_topik">
										<?php
										echo "<option> -- Pilih Topik --</option>";
										for($x=1; $x<=4; $x++){
											echo "<option value='".$x."'> Topik Ke ".$x."</option>";
										}
										?>
										</select>
										</div>
									</td>
								</tr>
								<?php } ?>
								<tr>
									<td width="200px">Nama Test Online</td>
									<td width="10px">:</td>
									<td><div class="form-group">
										<input type="text" class="form-control" name="pretest_nama" placeholder="Nama Test Online">
										</div>
									</td>
								</tr>
								<tr>
									<td width="200px">Waktu Ujian</td>
									<td width="10px">:</td>
									<td><div class="form-group">
										<input type="number" class="form-control" name="pretest_waktu" placeholder="Waktu Ujian (menit)">
										</div>
									</td>
								</tr>
								<tr>
									<td width="200px">Kelas</td>
									<td width="10px">:</td>
									<td><div class="form-group">
										<select class="form-control select2" name="kelas_id">
										<?php
										echo "<option> -- Pilih Kelas --</option>";
										foreach($tbl_admin_kelas as $kelas){
											echo "<option value='".$kelas->kelas_id."'>".$kelas->kelas_nama."</option>";
										}
										?>
										</select>
										</div>
									</td>
								</tr>
								<tr>
									<td colspan="3">
										<div class="form-group">
											<input type="submit" onclick="return confirm('Yakin untuk tambah?');" form="tambah" value="Simpan Tambah" class="btn btn-success">
										</div>
									</td>
								</tr>
									<?php echo form_close(); 
										} ?>
									
									
							</table>
							<br>
							<hr>
							<table width="100%" id="soal" class="table table-stripped table-condensed">
								<thead>
								<tr>
									<th>No</th>
									<th>Nama Test Online</th>
									<th>Topik</th>
									<th>Kelas</th>
									<th>Waktu (menit)</th>
									<th>Jumlah Soal</th>
									<th>Action</th>
								</tr>
								</thead>
								<tbody>
									<?php
									$base_url = base_url("admin/soal");
									$base_url2 = base_url("admin/pretest_aksi_hapus");
									$no = 1;
									foreach($tbl_pretest as $pretest){
										
										$kelas_id = $pretest->kelas_id;
										$kelas = $this->db->query("select * from tbl_admin_kelas where kelas_id='$kelas_id'")->row();
										
										$pretest_id = $pretest->pretest_id;
										$soal = $this->db->query("select count(*) as total from tbl_soal where pretest_id='$pretest_id'")->row();
									
if($pretest->pretest_topik==0 || $pretest->pretest_topik==-1){
	$pretest_topik = "";
}else{
	$pretest_topik = $pretest->pretest_topik;
}	
									echo "
									<tr>
										<td>$no</td>
										<td>$pretest->pretest_nama</td>
										<td>$pretest_topik</td>
										<td>$kelas->kelas_nama</td>
										<td>$pretest->pretest_waktu</td>
										<td>$soal->total</td>
										<td><a href='$base_url/$pretest->pretest_id/ubah' class='btn btn-xs btn-warning'><i class='fa fa-pencil'> </i> </a>  <a onclick=\"return confirm('Yakin untuk hapus?');\" href='$base_url2/$pretest->pretest_id' class='btn btn-xs btn-danger'><i class='fa fa-trash'> </i> </a>
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