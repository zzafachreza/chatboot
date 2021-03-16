<?php
//Definisikan Jumlah data topik mater dari database tabel materi
foreach($jumlahtugas as $data){
	$jumlah_materi = $data->jumlahtugas;
}
?>
  <div class="content-wrapper ">
    <section class="content-header">
      <h1>
        Tugas Perkuliahan
      </h1>
    </section>

    <!-- Main content -->
    <section class="content" >
      <div class="row">
		<div class="col-xs-12">
			<div class="box">
			<?php
			$getkelas = $this->uri->segment(3);
			$gettopik = $this->uri->segment(4);
			?>	<hr/>
				<div class="box-body">
					<div class="col-md-12">
						<div class="box-body no-padding">
							<table class="table table-bordered table-striped table-condensed">
								<tr>
									<td width="30%"> Pilih Kelas </td>
									<td width="5%" style="text-align:center;"> : </td>
									<td>
										<select type="text" class="form-control select2" onchange="if (this.value) window.location='<?php echo base_url();?>mahasiswa/tugas/'+this.value+'/<?php echo $gettopik;?>'">
											<option><?php 
											if($getkelas!=""){ 
												$kelas_by = $this->db->query("select * from tbl_admin_kelas where kelas_id='$getkelas'")->row();
												echo $kelas_by->kelas_nama;
												
											}else{ echo "-- Pilih Kelas--";}?>
											</option>
											<?php
											foreach($tbl_mahasiswa_tugas as $tugas){
												echo "<option value='".$tugas->kelas_id."'>".$tugas->kelas_nama."</option>";
											}
											?>
										</select>
									</td>
								</tr> 
								<?php	if($getkelas!=""){ ?>
								<tr>
									<td width="30%"> Pilih topik </td>
									<td width="5%" style="text-align:center;"> : </td>
									<td>
										<select type="text" class="form-control select2" onchange="if (this.value) window.location='<?php echo base_url();?>mahasiswa/tugas/<?php echo $getkelas;?>/'+this.value">
											<option><?php 
											if($gettopik!=""){ echo $gettopik; }else{ echo "-- Pilih --";}?>
											</option>
											<?php
											for($x=1;$x<=$jumlah_materi;$x++){
												echo "<option value='".$x."'>".$x."</option>";
											}
											?>
										</select>
									</td>
								</tr>
								<?php 
								foreach($tbl_admin_tugas as $data){
								?>
								<tr>
									<td width="30%" >
										Nama Tugas 
									</td>
									<td width="5%" style="text-align:center;"> : </td>
									<td>
										<?php echo $data->tugas_nama;?>
									</td>
								</tr>
								<tr>
									<td width="30%" >
										Download Tugas 
									</td>
									<td width="5%" style="text-align:center;"> : </td>
									<td><?php 
									if(strpos($data->tugas_linkvideo, "youtube.com")!== FALSE or strpos($data->tugas_linkvideo, "youtu.be")!== FALSE){
									}else{?>
										Video : <a href="<?php echo base_url();?>upload/tugas/<?php echo $data->tugas_linkvideo;?>">
										<img width="50" src="<?php echo base_url();?>assets/dist/img/video.png"> </a>
									<?php } ?>
										PDF : <a href="<?php echo base_url();?>upload/tugas/<?php echo $data->tugas_file;?>">
										<img width="50" src="<?php echo base_url();?>assets/dist/img/pdf.png"> </a>
									</td>
								</tr>
								<tr>
									<td width="35%" >
										<?php
										if($data->tugas_linkvideo!=''){
											if(strpos($data->tugas_linkvideo, "youtube.com")!== FALSE or strpos($data->tugas_linkvideo, "youtu.be")!== FALSE){
										?>
												<div class="embed-responsive embed-responsive-16by9">
													<iframe class="embed-responsive-item" src="<?php echo $data->tugas_linkvideo;?>" frameborder="0" allowfullscreen></iframe>
												</div>
												
										<?php }else{ ?>
												<video width="550" height="" controls>
												  <source src="<?php echo base_url();?>upload/tugas/<?php echo $data->tugas_linkvideo;?>" type="video/mp4">
												  <source src="<?php echo base_url();?>upload/tugas/<?php echo $data->tugas_linkvideo;?>" type="video/ogg">
												  Your browser does not support HTML5 video.
												</video>
										<?php
											}
										}
										?>
									</td>
									<td colspan="2">
										<embed style="border:2px solid black;" src="<?php echo base_url();?>upload/tugas/<?php echo $data->tugas_file;?>" type="application/pdf" 
										width="100%" height="320" scrollbar="1" navpanes="1" />
									</td>
								</tr>
								<?php }?>
							<?php } ?>
							</table>
						</div>
					</div>
				</div>
			</div>		
		</div>
      </div>
    </section>
	
  </div>