<?php 
$wherekelas = $this->uri->segment(3);
if($wherekelas==""){
	$wherekelas=1;
}
$wheretopik = $this->uri->segment(4);
$whereopsi = $this->uri->segment(5);


$query_nilai= $this->db->query("select 
tbl_admin_kelas.kelas_id,
tbl_admin_nilai.nilai_topik,
tbl_admin_nilai.nilai_id,
tbl_users.user_nim,
tbl_users.user_fullname,
tbl_admin_nilai.nilai_makalah,
tbl_admin_nilai.nilai_presentasi,
tbl_admin_nilai.nilai_kelompok,
tbl_admin_nilai.nilai_individu,
tbl_admin_nilai.nilai_praktek,
(SELECT nilai_pretest
         FROM tbl_admin_nilai_pretest
         WHERE tbl_admin_nilai_pretest.kelas_users_id = tbl_admin_nilai.kelas_users_id
         AND tbl_admin_nilai_pretest.nilaipretest_topik=tbl_admin_nilai.nilai_topik
               ) AS nilai_pretest,
tbl_admin_nilai.nilai_peningkatan,
tbl_admin_nilai.nilai_angka,
ROUND((
(((tbl_admin_nilai.nilai_makalah*3)+(tbl_admin_nilai.nilai_presentasi*2))/5*2)+
(((tbl_admin_nilai.nilai_kelompok*3)+(tbl_admin_nilai.nilai_individu*3))/6*3)+
(tbl_admin_nilai.nilai_praktek*2)+
((SELECT nilai_pretest
         FROM tbl_admin_nilai_pretest
         WHERE tbl_admin_nilai_pretest.kelas_users_id = tbl_admin_nilai.kelas_users_id
         AND tbl_admin_nilai_pretest.nilaipretest_topik=tbl_admin_nilai.nilai_topik)*2)+
(tbl_admin_nilai.nilai_peningkatan*1)
)/10,2) as nilai_total
 from tbl_admin_nilai
		join tbl_admin_kelas_users ON tbl_admin_nilai.kelas_users_id=tbl_admin_kelas_users.kelas_users_id
		join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
		join tbl_users ON tbl_users.user_id=tbl_admin_kelas_users.user_id
		WHERE tbl_admin_kelas.kelas_id='$wherekelas' AND tbl_admin_nilai.nilai_topik='$wheretopik'	
		ORDER by tbl_users.user_fullname ASC
		")->result();
foreach($query_nilai as $nilai){
	if(
	$nilai->nilai_makalah>0 && 
	$nilai->nilai_presentasi>0 &&
	$nilai->nilai_kelompok>0 &&
	$nilai->nilai_individu>0 &&
	$nilai->nilai_praktek>0 &&
	$nilai->nilai_pretest>0 &&
	$nilai->nilai_peningkatan>0
	){
		$data = array(
		"nilai_angka" => $nilai->nilai_total,
		"nilai_updater" => $this->session->userdata('nim')
		);
		$this->db->where('nilai_id', $nilai->nilai_id);
		$this->db->update('tbl_admin_nilai', $data); // Untuk mengeksekusi perintah update data
	}
}

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
									<a href="<?php echo base_url();?>admin/nilai" class="btn btn-sm btn-danger">Nilai Topik
									</a>
									<a href="<?php echo base_url();?>admin/nilaiuts" class="btn btn-sm btn-success">Nilai UTS
									</a>
									<a href="<?php echo base_url();?>admin/nilaiuas" class="btn btn-sm btn-success">Nilai UAS
									</a>
								</div>
							</td>
						</tr>
						<tr>
							<td>Pilih Topik</td>
							<td>:</td>
							<td>
								<select type="text" class="form-control select2" onchange="if (this.value) window.location='<?php echo base_url();?>admin/nilai/<?php echo $wherekelas;?>/'+this.value">
									<?php
									if($wheretopik!=""){
										echo "<option value='".$wheretopik."'> Topik Ke ".$wheretopik."</option>";
									}else{
										echo "<option> --Pilih Topik-- </option>";
									}
									
									for($x=1;$x<=4;$x++){
										echo "<option value='".$x."'> Topik Ke ".$x."</option>";
									}
									?>
								</select>
							</td>
						</tr>
						<tr>
							<td>Pilih Kelas</td>
							<td>:</td>
							<td>
								<select type="text" class="form-control select2" onchange="if (this.value) window.location='<?php echo base_url();?>admin/nilai/'+this.value+'/<?php echo $wheretopik;?>'">
								<?php
								echo "<option value='".$tbl_admin_kelas_2->kelas_id."'>".$tbl_admin_kelas_2->kelas_nama."</option>";
								
								foreach($tbl_admin_kelas as $data1){
									echo "<option value='".$data1->kelas_id."'>".$data1->kelas_nama."</option>";
								}
								?>
								</select>
							</td>
						</tr>
						<?php if($whereopsi!="ubah" && $wheretopik!=""){?>
						<tr>
							<td colspan="3">
							<div class="form-group">
								<a href="<?php echo base_url();?>admin/nilai/<?php echo $wherekelas;?>/<?php echo $wheretopik;?>/ubah" class="btn btn-info"> <i class="fa fa-pencil"></i> Ubah</a>
							  </div>
							</td>
						</tr>
						<?php } ?>
					</table>
					
				</div>
				
				
				<!-- /.box-header -->
				<div class="box-body">
				<?php
				if($whereopsi==""  && $wherekelas!="" && $wheretopik!=""){	
				   $attributes1 = array('target' => '', 'id' => 'tambah');
				   echo form_open_multipart("admin/nilai_aksi_tambah/$wherekelas/$wheretopik", $attributes1); ?>
				  <table id="nilai1" class="table table-bordered table-striped " style="width:100%;">
					<thead>
					<tr>
					  <th rowspan="2">No</th>
					  <th rowspan="2">NIM</th>
					  <th rowspan="2">Nama Mahasiswa</th>
					  <th colspan="2">Penilaian Kinerja</th>
					  <th colspan="2">Penilaian Kompetensi 4C</th>
					  <th rowspan="2">Penilaian Praktek</th>
					  <th rowspan="2">Penilaian Peningkatan</th>
					</tr>
					<tr>
					  <th>Makalah</th>
					  <th>Presentasi</th>
					  <th>Kelompok</th>
					  <th>Individu</th>
					</tr>
					</thead>
					<tbody>
					<?php
						$no = 1;
						foreach($tbl_admin_inputnilai as $data){
							  echo "<tr>
							  <td>".$no."<input type='hidden' name='kelas_users_id[]' value='".$data->kelas_users_id."'>
							  <input type='hidden' name='nilai_topik[]' value='".$wheretopik."'>
							  </td>
							  <td>".$data->user_nim."</td>
							  <td width='150px'>".$data->user_fullname."</td>
							  <td><input maxlength='3' size='3' type='number' name='nilai_makalah[]'></td>
							  <td><input maxlength='3' size='3' type='number' name='nilai_presentasi[]'></td>
							  <td><input maxlength='3' size='3' type='number' name='nilai_kelompok[]'></td>
							  <td><input maxlength='3' size='3' type='number' name='nilai_individu[]'></td>
							  <td><input maxlength='3' size='3' type='number' name='nilai_praktek[]'></td>
							  <td><input maxlength='3' size='3' type='number' name='nilai_peningkatan[]'></td>
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
				}else if($whereopsi=="ubah" && $wherekelas!="" && $wheretopik!=""){	
					$attributes2 = array('target' => '', 'id' => 'ubah');
				   echo form_open_multipart("admin/nilai_aksi_ubah/$wherekelas/$wheretopik", $attributes2);
				?>
				 <table id="nilai2" class="table table-bordered table-striped " style="width:100%;">
					<thead>
					<tr>
					  <th rowspan="2">No</th>
					  <th rowspan="2">NIM</th>
					  <th rowspan="2">Nama Mahasiswa</th>
					  <th colspan="2">Penilaian Kinerja</th>
					  <th colspan="2">Penilaian Kompetensi 4C</th>
					  <th rowspan="2">Penilaian Praktek</th>
					  <th rowspan="2">Penilaian Pretest</th>
					  <th rowspan="2">Penilaian Peningkatan</th>
					  <th rowspan="2">Total Nilai</th>
					</tr>
					<tr>
					  <th>Makalah</th>
					  <th>Presentasi</th>
					  <th>Kelompok</th>
					  <th>Individu</th>
					</tr>
					</thead>
					<tbody>
				<?php					
					$no = 1;
						foreach($tbl_admin_nilai as $data){
							  echo "<tr>
							  <td>".$no."<input type='hidden' name='nilai_id[]' value='".$data->nilai_id."'>
							  <input type='hidden' name='nilai_topik[]' value='".$wheretopik."'>
							  </td>
							  <td>".$data->user_nim."</td>
							  <td width='150px'>".$data->user_fullname."</td>
							  <td><input maxlength='3' size='3' type='number' name='nilai_makalah[]' value='".$data->nilai_makalah."'></td>
							  <td><input maxlength='3' size='3' type='number' name='nilai_presentasi[]' value='".$data->nilai_presentasi."'></td>
							  <td><input maxlength='3' size='3' type='number' name='nilai_kelompok[]' value='".$data->nilai_kelompok."'></td>
							  <td><input maxlength='3' size='3' type='number' name='nilai_individu[]' value='".$data->nilai_individu."'></td>
							  <td><input maxlength='3' size='3' type='number' name='nilai_praktek[]' value='".$data->nilai_praktek."'></td>
							  <td>".$data->nilai_pretest."</td>
							  <td><input maxlength='3' size='3' type='number' name='nilai_peningkatan[]' value='".$data->nilai_peningkatan."'></td>
							  <td>".$data->nilai_total."</td>
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
$('#nilai1').DataTable({
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
$('#nilai2').DataTable({
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