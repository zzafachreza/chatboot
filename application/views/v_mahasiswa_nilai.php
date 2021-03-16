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
				<div class="box-body no-padding">
				<?php echo form_open("mahasiswa/nilai_aksi_tambah"); ?>
				
					<table class="table table-striped">
					<tr><td width="30%">Pilih Mata Kuliah</td><td width="3%"> : </td>
						<td>
						<div class="form-group">
						<select type="text" class="form-control select" onchange="if (this.value) window.location='<?php echo base_url();?>mahasiswa/nilai/'+this.value">
						<?php
						$kelas_id = $this->uri->segment(3);
						if($kelas_id<1){?>
							<option>-- Pilih --</option>
						<?php }else{ 
							$query_mat = $this->db->query("select * from tbl_admin_kelas where kelas_id = '$kelas_id'");
							foreach ($query_mat->result_array() as $row_mat);
							
									$nilaikelas1 = $row_mat['kelas_nilai_x'];
									$nilaikelas2 = $row_mat['kelas_nilai_y'];
							
							echo "<option value=\"$row_mat[kelas_id]\">"; $kelas_nama = $row_mat['kelas_nama']; echo "$kelas_nama</option>";
						} ?>
							<?php
							$user_id = $this->session->userdata('userid');
							$query = $this->db->query("select * from tbl_admin_kelas,tbl_admin_kelas_users,tbl_users where 
tbl_admin_kelas.kelas_id=tbl_admin_kelas_users.kelas_id and
tbl_users.user_id=tbl_admin_kelas_users.user_id and tbl_admin_kelas_users.user_id='$user_id'");
							foreach ($query->result() as $row)
							{
								echo "<option value='".$row->kelas_id."'>".$row->kelas_nama."</option>";
							}
							?>
						</select>
					  </div>
					  <input type="hidden" name="kelas_id" value="<?php echo $kelas_id;?>">
						</td>
					</tr>
					<?php
					if($kelas_id>0){
						
						$user_id = $this->session->userdata('userid');
						$cek = $this->db->query("select count(*) as nilai from tbl_mahasiswa_nilai where
user_id='$user_id' and kelas_id = '$kelas_id'")->row();
						
						if($cek->nilai==0){
						?>
					<tr><td width="30%"><?php echo $nilaikelas1;?></td><td width="3%"> : </td><td><input type="number" step="0.01" class="form-control" name="m_nilai_algo" placeholder="Contoh : 3.84"></td></tr>
					
					<tr><td width="30%"><?php echo $nilaikelas2;?></td><td width="3%"> : </td><td><input type="number" step="0.01" class="form-control" name="m_nilai_ipk" placeholder="Contoh : 3.84"></td></tr>
					
					
					<tr><td width="30%"></td><td width="3%"></td>
						<td>
							<div class="form-group">
								<input type="submit" name="submit" value="Submit" class="btn btn-success">
							</div>
						</td>
					</tr>
					<?php 
						}else{?>
					<tr><td width="30%"></td><td width="3%"></td><td>Nilai sudah pernah diinput</td></tr>
					<?php					
						}
					} ?>
					</table>
				<?php echo form_close(); ?>
				</div>
			</div>
		</div>
      </div>
    </section>
	
  </div>