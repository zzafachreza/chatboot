<?php 
$wherekelas = $this->uri->segment(3);
$wheretopik = $this->uri->segment(4);
$pretest_id = $this->uri->segment(5);
?>
<div class="content-wrapper ">
	<section class="content-header">
      <h1>
        Test Online
      </h1>
    </section>
    <!-- Main content -->
    <section class="content" >
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-body no-padding">
						<div class="box-header">
						</div>
						<div class="col-xs-12">
							
							<div class="form-group">
								<p>
								Silahkan pilih test yang ingin dilakukan.<br>
								Setiap Test hanya dapat dilakukan sekali.<br>
								Harap mengikuti instruksi dari Dosen yang bersangkutan!
								</p>
							</div>
							<div class="form-group">
								<table width="50%">
						<tr>
							<td>Pilih Kelas</td>
							<td>:</td>
							<td>
								<select type="text" class="form-control select2" onchange="if (this.value) window.location='<?php echo base_url();?>mahasiswa/tesonline/'+this.value">
								<?php
								if($wherekelas==""){
									echo "<option> -- Pilih Kelas --</option>";
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
					</table>
							</div>
						</div>
						<?php if($wherekelas!=""){ ?>
						<div class="col-xs-12">
							<div class="form-group">
							<?php foreach($tbl_pretest as $pretest){ 
							if($pretest->pretest_id==$pretest_id){
								$warna = "danger";
							}else{
								$warna = "success";
							}
							?>
								
								<a href="<?php echo base_url();?>mahasiswa/tesonline/<?php echo $wherekelas;?>/<?php echo $pretest->pretest_topik;?>/<?php echo $pretest->pretest_id;?>" class="btn btn-lg btn-<?php echo $warna;?>"><?php echo $pretest->pretest_nama;?>
								</a>
							<?php } ?>
							</div>
						</div>
						<?php } 
						
						if($pretest_id!=""){
							if($tbl_pretest_by->pretest_topik>0){
								$cek_nilai = $this->db->query("select count(*) as total from tbl_admin_nilai_pretest
where kelas_users_id='$kelas_users_id' and nilaipretest_topik='$wheretopik'")->row();
							}
							
							if($tbl_pretest_by->pretest_topik==0){
								$cek_nilai = $this->db->query("select count(*) as total from tbl_admin_nilai_uts
where kelas_users_id='$kelas_users_id'")->row();
							}
							
							if($tbl_pretest_by->pretest_topik<0){
								$cek_nilai = $this->db->query("select count(*) as total from tbl_admin_nilai_uas
where kelas_users_id='$kelas_users_id'")->row();
							}
						
						
						if($cek_nilai->total>0){ 
							if($tbl_pretest_by->pretest_topik>0){
								$query_nilai = $this->db->query("select * from tbl_admin_nilai_pretest
where kelas_users_id='$kelas_users_id' and nilaipretest_topik='$wheretopik'")->row();
								$nilai_anda = $query_nilai->nilai_pretest;
							}
							
							if($tbl_pretest_by->pretest_topik==0){
								$query_nilai = $this->db->query("select * from tbl_admin_nilai_uts
where kelas_users_id='$kelas_users_id'")->row();
								$nilai_anda = $query_nilai->nilai_uts;
							}
							
							if($tbl_pretest_by->pretest_topik<0){
								$query_nilai = $this->db->query("select * from tbl_admin_nilai_uas
where kelas_users_id='$kelas_users_id'")->row();
								$nilai_anda = $query_nilai->nilai_uas;
							}
						?>
						
						<div class="col-xs-12">
							<table class="table table-stripped table-bordered" style="width:50%">
								<tr>
									<td colspan="3">Soal Sudah Pernah Dikerjakan</td>
								</tr>
								<tr>
									<td>Nilai Anda</td>
									<td> : </td>
									<td> <?php echo $nilai_anda; ?></td>
								</tr>
							</table>
						</div>
						<?php }else{ 
						
						?>
						<div class="col-xs-12">
							<table class="table table-stripped table-bordered" style="width:50%">
								<tr>
									<td>Test Online</td>
									<td> : </td>
									<td> <?php echo $tbl_pretest_by->pretest_nama; ?> </td>
								</tr>
								<tr>
									<td>Waktu Ujian</td>
									<td> : </td>
									<td> <?php echo $tbl_pretest_by->pretest_waktu; ?> Menit</td>
								</tr>
								<tr>
									<td>Jumlah Soal	</td>
									<td> : </td>
									<td> <?php echo $jumlahsoal; ?> </td>
								</tr>
								<tr>
									<td colspan="3"> 
									<?php if($jumlahsoal==0){
										echo "Soal Belum Tersedia";
									}else{ ?>
									<a href="<?php echo base_url();?>mahasiswa/soal/<?php echo $wherekelas;?>/<?php echo $tbl_pretest_by->pretest_topik;?>/<?php echo $tbl_pretest_by->pretest_id;?>" class="btn btn-md btn-primary"> Mulai</a>
									<?php } ?>
									</td>
								</tr>
							</table>
						</div>
						<?php } 
						} ?>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>