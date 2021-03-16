<?php
//Definisikan Jumlah data topik mater dari database tabel materi
foreach($jumlahmateri as $data){
	$jumlah_materi = $data->jumlahmateri;
}
?>
  <div class="content-wrapper ">
    <section class="content-header">
      <h1>
        Materi Perkuliahan
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
										<select type="text" class="form-control select2" onchange="if (this.value) window.location='<?php echo base_url();?>mahasiswa/materi/'+this.value+'/<?php echo $gettopik;?>'">
											<option><?php 
											if($getkelas!=""){ 
												$kelas_by = $this->db->query("select * from tbl_admin_kelas where kelas_id='$getkelas'")->row();
												echo $kelas_by->kelas_nama;
												
											}else{ echo "-- Pilih Kelas--";}?>
											</option>
											<?php
											foreach($tbl_mahasiswa_materi as $materi){
												echo "<option value='".$materi->kelas_id."'>".$materi->kelas_nama."</option>";
											}
											?>
										</select>
									</td>
								</tr> 
								<?php	if($getkelas!=""){ ?>
								<tr>
									<td width="30%"> Pilih Topik </td>
									<td width="5%" style="text-align:center;"> : </td>
									<td>
										<select type="text" class="form-control select2" onchange="if (this.value) window.location='<?php echo base_url();?>mahasiswa/materi/<?php echo $getkelas;?>/'+this.value">
											<option><?php 
											if($gettopik!=""){ echo $gettopik; }else{ echo "-- Pilih Topik --";}?>
											</option>
											<?php
											for($x=1;$x<=$jumlah_materi;$x++){
												echo "<option value='".$x."'>Ke - ".$x."</option>";
											}
											?>
										</select>
									</td>
								</tr>
								<?php 
								foreach($tbl_admin_materi as $data){
								?>	
								<tr>
									<td width="30%" >
										Nama Materi 
									</td>
									<td width="5%" style="text-align:center;"> : </td>
									<td>
										<?php echo $data->materi_nama;?>
									</td>
								</tr>
								<tr>
									<td width="30%" >
										Download Materi 
									</td>
									<td width="5%" style="text-align:center;"> : </td>
									<td><?php 
									if(strpos($data->materi_linkvideo, "youtube.com")!== FALSE or strpos($data->materi_linkvideo, "youtu.be")!== FALSE){
									}else{?>
										Video : <a href="<?php echo base_url();?>upload/materi/<?php echo $data->materi_linkvideo;?>">
										<img width="50" src="<?php echo base_url();?>assets/dist/img/video.png"> </a>
									<?php } ?>
										PDF : <a href="<?php echo base_url();?>upload/materi/<?php echo $data->materi_file;?>">
										<img width="50" src="<?php echo base_url();?>assets/dist/img/pdf.png"> </a>
									</td>
								</tr>
								<tr>
									<td width="35%" >
										<?php
										if($data->materi_linkvideo!=''){
											if(strpos($data->materi_linkvideo, "youtube.com")!== FALSE or strpos($data->materi_linkvideo, "youtu.be")!== FALSE){
										?>
												<div class="embed-responsive embed-responsive-16by9">
													<iframe class="embed-responsive-item" src="<?php echo $data->materi_linkvideo;?>" frameborder="0" allowfullscreen></iframe>
												</div>
												
										<?php }else{ ?>
												<video width="550" height="" controls>
												  <source src="<?php echo base_url();?>upload/materi/<?php echo $data->materi_linkvideo;?>" type="video/mp4">
												  <source src="<?php echo base_url();?>upload/materi/<?php echo $data->materi_linkvideo;?>" type="video/ogg">
												  Your browser does not support HTML5 video.
												</video>
										<?php
											}
										}
										?>
									</td>
									<td colspan="2">
										<embed style="border:2px solid black;" src="<?php echo base_url();?>upload/materi/<?php echo $data->materi_file;?>" type="application/pdf" 
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