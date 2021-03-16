<?php 
$wherekelas = $this->uri->segment(3);
$whereopsi = $this->uri->segment(4);
?>
<style>
	th{
		vertical-align:middle;
		text-align:center;
	}
	
	input[type=number]{
		size:3;
		color:red;
		width: 100%;
	}
</style>
  <div class="content-wrapper ">
    <section class="content-header">
      <h1>
        Input Nilai
      </h1>
    </section>
    <!-- Main content -->
    <section class="content" >
      <div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<table width="50%">
						<tr>
							<td colspan="3">
								<div class="form-group">
									<a href="<?php echo base_url();?>admin/nilai" class="btn btn-sm btn-success">Nilai Topik
									</a>
									<a href="<?php echo base_url();?>admin/nilaiuts" class="btn btn-sm btn-success">Nilai UTS
									</a>
									<a href="<?php echo base_url();?>admin/nilaiuas" class="btn btn-sm btn-danger">Nilai UAS
									</a>
								</div>
							</td>
						</tr>
						<tr>
							<td>Pilih Kelas</td>
							<td>:</td>
							<td>
								<select type="text" class="form-control select2" onchange="if (this.value) window.location='<?php echo base_url();?>admin/nilaiuas/'+this.value">
								<?php
								if($wherekelas==""){
									echo "<option value=''> -- Pilih Kelas -- </option>";
								}else{
									echo "<option value='".$tbl_admin_kelas_2->kelas_id."'>".$tbl_admin_kelas_2->kelas_nama."</option>";
								}
								
								foreach($tbl_admin_kelas as $data1){
									echo "<option value='".$data1->kelas_id."'>".$data1->kelas_nama."</option>";
								}
								?>
								</select>
							</td>
						</tr>
						<?php if($whereopsi!="ubah" && $wherekelas!=""){?>
						<tr>
							<td colspan="3">
							<div class="form-group">
								<a href="<?php echo base_url();?>admin/nilaiuas/<?php echo $wherekelas;?>/ubah" class="btn btn-info"> <i class="fa fa-pencil"></i> Ubah</a>
							  </div>
							</td>
						</tr>
						<?php } ?>
					</table>
					
				</div>
				
				
				<!-- /.box-header -->
				<div class="box-body">
				<?php
				if($whereopsi=="tambah"  && $wherekelas!=""){	
				   $attributes1 = array('target' => '', 'id' => 'tambah');
				   echo form_open_multipart("admin/nilai_uas_aksi_tambah/$wherekelas", $attributes1); ?>
				  <table id="nilai3" class="table table-bordered table-striped " style="width:100%;">
					<thead>
					<tr>
					  <th width="5%">No</th>
					  <th width="20%">NIM</th>
					  <th width="45%">Nama Mahasiswa</th>
					  <th width="15%">Nilai UAS</th>
					  <th width="15%">Nilai UAS Praktek</th>
					</tr>
					</thead>
					<tbody>
					<?php
						$no = 1;
						foreach($tbl_admin_inputnilai as $data){
							  echo "<tr>
							  <td>".$no."<input type='hidden' name='kelas_users_id[]' value='".$data->kelas_users_id."'>
							  </td>
							  <td>".$data->user_nim."</td>
							  <td width='150px'>".$data->user_fullname."</td>
							  <td><input maxlength='3' size='3' type='number' name='nilai_uas[]'></td>
							  <td><input maxlength='3' size='3' type='number' name='nilai_uas_praktek[]'></td>
							  </tr>";
							$no++;
						}
					?>
					</tbody>
				  </table>
					  <div class="form-group">
						<input type="submit" onclick="return confirm('Yakin untuk submit?');" name="submit" form="tambah" value="Simpan" class="btn btn-success">
					  </div>
				  <?php echo form_close(); 
				}else if($whereopsi=="ubah" && $wherekelas!=""){	
					$attributes2 = array('target' => '', 'id' => 'ubah');
				   echo form_open_multipart("admin/nilai_uas_aksi_ubah/$wherekelas", $attributes2);
				?>
				 <table id="nilai4" class="table table-bordered table-striped " style="width:100%;">
					<thead>
					<tr>
					  <th width="5%">No</th>
					  <th width="20%">NIM</th>
					  <th width="45%">Nama Mahasiswa</th>
					  <th width="15%">Nilai UAS</th>
					  <th width="15%">Nilai UAS Praktek</th>
					</tr>
					</thead>
					<tbody>
				<?php					
					$no = 1;
						foreach($tbl_admin_nilai_uas as $data){
							  echo "<tr>
							  <td>".$no."<input type='hidden' name='uas_id[]' value='".$data->uas_id."'>
							  </td>
							  <td>".$data->user_nim."</td>
							  <td width='150px'>".$data->user_fullname."</td>
							  <td><input maxlength='3' size='3' type='number' name='nilai_uas[]' value='".$data->nilai_uas."'></td>
							  <td><input maxlength='3' size='3' type='number' name='nilai_uas_praktek[]' value='".$data->nilai_uas_praktek."'></td>
							  </tr>";
							$no++;
						}?>
					</tbody>
				  </table>
					  <div class="form-group">
						<input type="submit" onclick="return confirm('Yakin untuk submit?');" name="submit" form="ubah" value="Simpan" class="btn btn-success">
					  </div>
				  <?php echo form_close(); 
				}
				?>
				</div>
				<!-- /.box-body -->
			  </div>
		</div>
      </div>
    </section>
  </div>
<script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
$('#nilai3').DataTable({
			"processing": true,
			//"serverSide": true,
			"ordering": false,
			"autoWidth": false,
			"paging": true,
			"info": true,
			//"scrollX": true,
			"pageLength": 50,
			'order': [[2, 'asc']],
			//"ajax": "<?php echo base_url('admin/get_data_master_nilai/'.$wherekelas.'/'.$wheretopik);?>" ,
			columnDefs: [],
		});
$('#nilai4').DataTable({
			"processing": true,
			//"serverSide": true,
			"ordering": false,
			"autoWidth": false,
			"paging": true,
			"info": true,
			//"scrollX": true,
			"pageLength": 50,
			'order': [[2, 'asc']],
			//"ajax": "<?php echo base_url('admin/get_data_master_nilai/'.$wherekelas.'/'.$wheretopik);?>" ,
			columnDefs: [],
		});				
</script>