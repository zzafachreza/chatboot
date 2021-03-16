<style>
.hide {
  display: none;
}
</style>
  <div class="content-wrapper ">
    <section class="content-header">
      <h1>
        Input Materi
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
				  <?php echo form_open_multipart("admin/materi_aksi_tambah"); ?>
					<div class="col-md-6">
					  <table class="table table-condensed table-striped" width="100%">
						<tr>
							<td>Pilih Topik</td>
							<td>:</td>
							<td><select class="form-control select2" name="materi_topik">
							<option>-- Pilih Topik --</option>
							<?php
							for($x=1;$x<=4;$x++){
										echo "<option value='".$x."'> Topik Ke ".$x."</option>";
									}
							?>
							</select>
							</td>
						</tr>
						<tr>
							<td>Nama kelas</td>
							<td>:</td>
							<td><div class="form-group"><select  class="form-control select2" name="kelas_id">
							<option>-- Pilih kelas --</option>
							<?php
							foreach($tbl_admin_kelas as $data){
								echo "<option value='".$data->kelas_id."'>".$data->kelas_nama."</option>";
							}
							?>
						</select></div>
							</td>
						</tr>
						<tr>
							<td>Nama Materi</td>
							<td>:</td>
							<td><div class="form-group"><input type="text" class="form-control" name="materi_nama"></div>
							</td>
						</tr>
						<tr>
							<td>Pilih Sumber Video</td>
							<td>:</td>
							<td><div class="form-group"><label>
							<input type="radio" name='sumbervideo' value='link' > Youtube
							</label>
							<label>
							<input type="radio" name='sumbervideo' value='file' > Berkas Video
							</label></div>
							</td>
						</tr>
						<tr>
							<td>Video File</td>
							<td>:</td>
							<td>
							<div id="file" class="desd" style="display: none;">
								<div class="form-group">
									<input type="file" class="form-control" name="userfiles1">
								</div>
							</div>
							<div id="link" class="desd" style="display: none;">
								<div class="form-group">
									<input type="text" class="form-control" name="materi_linkvideo">
								</div>
							</div>
							</td>
						</tr>
						<tr>
							<td>File</td>
							<td>:</td>
							<td><div class="form-group"><input type="file" class="form-control" name="userfiles2"></div>
							</td>
						</tr>
						<tr>
							<td colspan="3"><div class="form-group">
						<input type="submit" name="submit" value="Submit" class="btn btn-success">
					  </div> </td>
						</tr>
					  </table>
					</div>
					<?php echo form_close(); ?>
				  </div>
				</div>
				
				<!-- /.box-header -->
				<div class="box-body">
				  <table id="example2" class="table table-bordered table-striped">
					<thead>
					<tr>
					  <th width="40px">No</th>
					  <th>Topik</th>
					  <th>Nama kelas</th>
					  <th>Nama Materi</th>
					  <th>Video</th>
					  <th>File</th>
					  <th width="120px">Action</th>
					</tr>
					</thead>
					<tbody>
					<?php
					$no = 1;
					foreach($tbl_admin_materi as $data){
						  echo "<tr>
						  <td>".$no."</td>
						  <td>".$data->materi_topik."</td>
						  <td>".$data->kelas_nama."</td>
						  <td>".$data->materi_nama."</td>
						  <td>";
					if($data->materi_linkvideo!=''){
						if(strpos($data->materi_linkvideo, "youtube.com")!== FALSE or strpos($data->materi_linkvideo, "youtu.be")!== FALSE){
					?>
							<div class="embed-responsive embed-responsive-16by9">
								<iframe class="embed-responsive-item" src="<?php echo $data->materi_linkvideo;?>" frameborder="0" allowfullscreen></iframe>
							</div>
							
					<?php }else{ ?>
							<video width="60" height="60" controls>
							  <source src="<?php echo base_url();?>upload/materi/<?php echo $data->materi_linkvideo;?>" type="video/mp4">
							  <source src="<?php echo base_url();?>upload/materi/<?php echo $data->materi_linkvideo;?>" type="video/ogg">
							  Your browser does not support HTML5 video.
							</video>
					<?php
						}
					}
					 echo "</td>
					<td>";
					if($data->materi_file!=''){
					?>
						<a href="<?php echo base_url();?>upload/materi/<?php echo $data->materi_file;?>" target="_blank"><img src="<?php echo base_url(); ?>assets/dist/img/pdf.png" width="60" height="60"></a>
					<?php
					}else{
							echo "";
					}
						  echo "</td>
						  <td>
						  <a class='btn-sm btn-warning' href='".base_url("admin/materi_ubah/".$data->materi_id)."'>Ubah</a>
						  <a onclick=\"return confirm('Yakin untuk dihapus?')\" class='btn-sm btn-danger' href='".base_url("admin/materi_aksi_hapus/".$data->materi_id)."'>Hapus</a></td>
						  </tr>";
						  $no++;
					}
					?>
					</tbody>
				  </table>
				</div>
				<!-- /.box-body -->
			  </div>
		</div>
      </div>
    </section>
 </div>
<script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
 <script>
$("div.desd").hide();
$("input[name$='sumbervideo']").click(function() {
        var valueradio = $(this).val();
		if(valueradio=="link"){
			$("div.desd").hide();
			$("#link").show();
		}else if(valueradio=="file"){
			$("div.desd").hide(); 
			$("#file").show();
		}
    });
</script>