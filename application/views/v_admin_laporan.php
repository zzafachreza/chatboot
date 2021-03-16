<?php
error_reporting(0);
//Definisikan URL
$geturlkelas = $this->uri->segment(3);
$geturltopik = $this->uri->segment(4);
$geturljumlahgroup = $this->uri->segment(5);

////////////////////////////////////////////////
//Definisikan Jumlah data dari jumlah Mahasiswa pada kelas tersebut dari database
foreach($tbl_users_2 as $data){
	$jumlah_mahasiswa_kelas = $data->jumlahmahasiswakelas;
}
////////////////////////////////////////////////

//Definisikan Jumlah clustering
$jumlah_clustering = 4;
////////////////////////////////////////////////

//Definisikan total jumlah data
for($klaster=1; $klaster<=4; $klaster++){
	for($iterasi=2; $iterasi<=4; $iterasi++){
		$xborg[$klaster][$iterasi] = 0;
		$yamato[$klaster][$iterasi] = 0;
		$zabuza[$klaster][$iterasi] = 0;
	}	
}	
////////////////////////////////////////////////

//Definisikan Jumlah topik
$jumlah_topik = 4;
////////////////////////////////////////////////

//Definisikan Jumlah Kelompok, nanti bisa dibuatkan pada select
$jumlah_kelompok = $geturljumlahgroup;
$tampil_baris = $jumlah_mahasiswa_kelas/$jumlah_kelompok;
////////////////////////////////////////////////

//definisikan C1, C2, C3, C4 dan Literasi maksudnya adalah ID dari User yang kita pilih secara random
$defc[1] = "2";
$defc[2] = "8";
$defc[3] = "20";
$defc[4] = "21";

//definisikan Jumlah Literasi berdasarkan Jumlah Clustering
for($a = 1; $a <=$jumlah_clustering; $a++){
	$literasi[$a] = $a;
}
////////////////////////////////////////////////

//Definisi untuk pangkat ^2
$pangkatdua = 2;
////////////////////////////////////////////////

//Definisi untuk topik STAD , nanti diambil dari getURL segment 4 saja
$topik = $geturltopik;
////////////////////////////////////////////////

//NILAI DEFAULT APABILA TIDAK ADA DI DATABASE
for($a = 1; $a <=$jumlah_mahasiswa_kelas; $a++)
{
	$nilai[$a]="0";
	$nilai_stad[$a][$a]="0";
}

for($countp = 1; $countp<=$jumlah_clustering; $countp++){
	$count_clusterxyz[$literasi[$countp ]][$topik][$countp]['x'] = "0";
}
							
for($ifcountp = 1; $ifcountp<=$jumlah_clustering; $ifcountp++){
	$countifx[$literasi[1]][$topik][$ifcountp] = 1;
	$countify[$literasi[1]][$topik][$ifcountp] = 1;
	$countifz[$literasi[1]][$topik][$ifcountp] = 1;
}	
					
for($ifcountp = 1; $ifcountp<=$jumlah_clustering; $ifcountp++){
	$sum_clusterxyz[$literasi[1]][$topik][$ifcountp]['x'] = "0";
	$sum_clusterxyz[$literasi[1]][$topik][$ifcountp]['y'] = "0";
	$sum_clusterxyz[$literasi[1]][$topik][$ifcountp]['z'] = "0";
}

							
for($ifcountp = 1; $ifcountp<=$jumlah_clustering; $ifcountp++){
	$countifx[$literasi[2]][$topik][$ifcountp] = 1;
	$countify[$literasi[2]][$topik][$ifcountp] = 1;
	$countifz[$literasi[2]][$topik][$ifcountp] = 1;
}	
					
for($ifcountp = 1; $ifcountp<=$jumlah_clustering; $ifcountp++){
	$sum_clusterxyz[$literasi[2]][$topik][$ifcountp]['x'] = "0";
	$sum_clusterxyz[$literasi[2]][$topik][$ifcountp]['y'] = "0";
	$sum_clusterxyz[$literasi[2]][$topik][$ifcountp]['z'] = "0";
}

////////////////////////////////////////////////
?>
  <div class="content-wrapper ">
    <section class="content-header">
      <h1>
        Laporan
      </h1>
    </section>

    <!-- Main content -->
    <section class="content" >
      <div class="row">
		<div class="col-xs-12" >
			<div class="box">
				<div class="box-header">
						<table width="100%">
							<tr>
							<td width="20%">
							<div class="form-group">
								<select type="text" class="form-control select2" onchange="if (this.value) window.location='<?php echo base_url();?>admin/laporan/'+this.value+'/<?php echo $geturltopik;?>/<?php echo $geturljumlahgroup;?>'">
									<?php
									$geturlkelas = $this->uri->segment(3);
									if($geturlkelas!="0"){
										echo "<option value='".$tbl_admin_kelas_2->kelas_id."'>".$tbl_admin_kelas_2->kelas_nama."</option>";
									}else{
										echo "<option>-- Pilih kelas --</option>";
									}
									
									foreach($tbl_admin_kelas as $data1){
										echo "<option value='".$data1->kelas_id."'>".$data1->kelas_nama."</option>";
									}
									?>
								</select>
							</div>
							</td>
							<td width="20%">
							<div class="form-group">
								<select type="text" class="form-control select2" onchange="if (this.value) window.location='<?php echo base_url();?>admin/laporan/<?php echo $geturlkelas;?>/'+this.value+'/<?php echo $geturljumlahgroup;?>'">
									<?php
									if($geturltopik!="0"){
										echo "<option value='".$geturltopik."'>Topik Ke ".$geturltopik."</option>";
									}else{
										echo "<option>-- Pilih Topik --</option>";
									}
									
									for($pert = 1; $pert <=$jumlah_topik; $pert++){
										echo "<option value='".$pert."'>Topik Ke ".$pert."</option>";
									}
									?>
								</select>
							</div>
							</td>
							<td width="20%">
							<div class="form-group">
								<select type="text" class="form-control select2" onchange="if (this.value) window.location='<?php echo base_url();?>admin/laporan/<?php echo $geturlkelas;?>/<?php echo $geturltopik;?>/'+this.value">
									<?php
									if($geturljumlahgroup!="0"){
										echo "<option value='".$geturljumlahgroup."'>Jumlah Group ".$geturljumlahgroup."</option>";
									}else{
										echo "<option>-- Pilih Jumlah Group --</option>";
									}
									
									for($group = 1; $group <=$jumlah_mahasiswa_kelas; $group++){
										echo "<option value='".$group."'>Jumlah Group ".$group."</option>";
									}
									?>
								</select>
							</div>
							</td>
							<td width="40%">
								<div class="form-group" style="text-align:right;">
									<a class="no-print btn btn-success" href="javascript:printDiv('print-area-1');"><i class="fa fa-print"></i> &nbsp;&nbsp;Cetak Nama Kelompok</a>
								</div>
							</td>
							</tr>
						</table>
				</div>
			</div>
		</div>
		<div class="col-xs-12" style="display: none">
				<div class="box">
					<!-- /.box-header -->
					<div class="box-body">
					<h5 class="box-title">
						<center><label>Data Nilai IPK dan Algo</label></center>
					</h5>
					  <table id="example3" class="table table-bordered table-striped">
						<thead>
						<tr>
						  <th rowspan="2" style="text-align:center;">No</th>
						  <th rowspan="2" style="text-align:center;">Nama Lengkap</th>
						  <th colspan="2" style="text-align:center;">Nilai</th>
						  <th rowspan="2" style="text-align:center;">Nilai Akhir</th>
						</tr>
						<tr>
						  <th style="text-align:center;">IPK</th>
						  <th style="text-align:center;">Algo</th>
						</tr>
						</thead>
						<tbody>
						<?php
						//NILAI DEFAULT APABILA TIDAK ADA DI DATABASE
						for($a = 1; $a <=40; $a++)
						{
							$nilai[$a]="0";
							$nilai_stad[$a][$a]="0";
						}
						////////////////////////////////////////////////
						
						
						if($geturlkelas!="0"){
							$j = $geturltopik-1;
							$no = 1;
							foreach($tbl_users as $data){
								$nilai_ipk[$data->user_id] = ROUND($data->m_nilai_ipk,2);
								$nilai_algo[$data->user_id] = $data->m_nilai_algo;
								$nilaiakhir = $this->db->query("select 
									nilai_angka
									from tbl_users,tbl_admin_nilai, tbl_admin_kelas, tbl_admin_kelas_users
									where tbl_admin_kelas_users.kelas_users_id=tbl_admin_nilai.kelas_users_id and
									tbl_admin_kelas_users.user_id=tbl_users.user_id and tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
									and tbl_admin_nilai.nilai_id IN
									(select nilai_id as p1
									from tbl_users,tbl_admin_nilai, tbl_admin_kelas, tbl_admin_kelas_users
									where tbl_users.user_id=tbl_admin_kelas_users.user_id and tbl_admin_kelas.kelas_id=tbl_admin_kelas_users.kelas_id and
									tbl_admin_kelas_users.kelas_users_id=tbl_admin_nilai.kelas_users_id and
									tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id and nilai_topik = $j)
									and tbl_admin_kelas.kelas_id = '$geturlkelas'
									and tbl_users.user_id='$data->user_id'")->row();
									if($geturltopik!=1){
										$nilai_stad[$data->user_id][$geturltopik] = $nilaiakhir->nilai_angka;
									}else{
										$nilai_stad[$data->user_id][$geturltopik] = "0";
									}
											
								  echo "<tr>
								  <td>".$no."</td>
								  <td>".$data->user_fullname."</td>
								  <td>".$nilai_ipk[$data->user_id]."</td>
								  <td>".$nilai_algo[$data->user_id]."</td>
								  <td>".$nilai_stad[$data->user_id][$geturltopik]."</td>
								  </tr>";
								$no++;
							}
						}
						?>
						</tbody>
					  </table>
					</div>
					<!-- /.box-body -->
				</div>
		</div>
		<?php 
		if($geturltopik!=1){
			$hayabusa = 3;
		}else{
			$hayabusa = 2;
		}
		?>
		<div class="col-xs-12" style="display: none">
				<div class="box">
					<!-- /.box-header -->
					<div class="box-body">
					<h5 class="box-title">
						<center><label>Literasi Ke-1</label></center>
					</h5>
					  <table id="literasi<?php echo $literasi[1];?>" class="table table-bordered table-striped">
						<thead>
						<tr>
						  <th rowspan="2" style="text-align:center;">Data ke-i</th>
						  <?php for($ulangi = 1; $ulangi<=$jumlah_clustering; $ulangi++){	?>
						  <th rowspan="2" style="text-align:center;">C<?php echo $ulangi; ?></th>
						  <?php	} ?>
						  <th rowspan="2" style="text-align:center;">Clustering</th>
						  <?php for($ulangi = 1; $ulangi<=$jumlah_clustering; $ulangi++){	?>
						  <th colspan="<?php echo $hayabusa;?>" style="text-align:center;">Cluster <?php echo $ulangi; ?> </th>
						  <?php	} ?>
						</tr>
						<?php
							for($ulangi = 1; $ulangi<=$jumlah_clustering; $ulangi++){	?>
							  <th style="text-align:center;">x</th>	
							  <th style="text-align:center;">y</th>	
							  <?php if($geturltopik!=1){ ?>
							  <th style="text-align:center;">z</th>	
							  <?php	}
							} ?>						
						</tr>
						</thead>
						<tbody>
<?php						
if($geturlkelas!="0" and $geturltopik!="0"){
							$no = 1;
							foreach($tbl_users as $data){
								  echo "<tr>
								  <td>".$no."</td>";
								  
							for($ulangirumus = 1; $ulangirumus<=$jumlah_clustering; $ulangirumus++){	  
								  echo "<td>";
								  
								  $scop_ipk = $nilai_ipk[$data->user_id];
								  $scop_algo = $nilai_algo[$data->user_id];
								  $scop_stad = $nilai_stad[$data->user_id][$topik];
								  $scop_pangkatdua = $pangkatdua;
								  
								  $stad_ipk = $nilai_ipk[$defc[$ulangirumus]];
								  $stad_algo = $nilai_algo[$defc[$ulangirumus]];
								  $stad_stad = $nilai_stad[$defc[$ulangirumus]][$topik];
								  
								  $scop_variable_1 = pow($scop_ipk-$stad_ipk,$pangkatdua);
								  $scop_variable_2 = pow($scop_algo-$stad_algo,$pangkatdua);
								  if($geturltopik==1){
									$scop_variable_3 = 0;
								  }else{
									$scop_variable_3 = pow($scop_stad-$stad_stad,$pangkatdua);
								  }
								  
								  $scop_variable_total = $scop_variable_1+$scop_variable_2+$scop_variable_3;
								  $scop_nilai_c = ROUND(SQRT($scop_variable_total),4);
								  
								  $nilai_cluster[$topik][$ulangirumus][$data->user_id] = $scop_nilai_c;
								  $c[$topik][$ulangirumus] = $nilai_cluster[$topik][$ulangirumus][$data->user_id];
								  echo  $c[$topik][$ulangirumus];
								  echo "</td>";
							}
							
								  if($c[$topik][1]<$c[$topik][2] AND $c[$topik][1]<$c[$topik][3] AND $c[$topik][1]<$c[$topik][4]){
									  $clustering[$topik][$literasi[1]] = 1;
								  }elseif($c[$topik][2]<$c[$topik][1] AND $c[$topik][2]<$c[$topik][3] AND $c[$topik][2]<$c[$topik][4]){
									  $clustering[$topik][$literasi[1]] = 2;
								  }elseif($c[$topik][3]<$c[$topik][1] AND $c[$topik][3]<$c[$topik][2] AND $c[$topik][3]<$c[$topik][4]){
									  $clustering[$topik][$literasi[1]] = 3;
								  }else{
									  $clustering[$topik][$literasi[1]] = 4;
								  }
								  
								   echo "<td>".$clustering[$topik][$literasi[1]]."</td>";
								
							for($ulangicluster = 1; $ulangicluster<=$jumlah_clustering; $ulangicluster++){
								  if($clustering[$topik][$literasi[1]]==$ulangicluster){
									  $clusterxyz[$literasi[1]][$topik][$ulangicluster]['x'][$no] = $nilai_ipk[$data->user_id];
									  $clusterxyz[$literasi[1]][$topik][$ulangicluster]['y'][$no] = $nilai_algo[$data->user_id];
									  if($geturltopik!=1){ 
											$clusterxyz[$literasi[1]][$topik][$ulangicluster]['z'][$no] = $nilai_stad[$data->user_id][$topik];
									  }
								  }else{
									  $clusterxyz[$literasi[1]][$topik][$ulangicluster]['x'][$no] = 0;
									  $clusterxyz[$literasi[1]][$topik][$ulangicluster]['y'][$no] = 0;
									  if($geturltopik!=1){ 
											$clusterxyz[$literasi[1]][$topik][$ulangicluster]['z'][$no] = 0;
									  }
								  }
							}
							
							for($ulangiclusterxyz = 1; $ulangiclusterxyz<=$jumlah_clustering; $ulangiclusterxyz++){							
								  echo "<td>".$clusterxyz[$literasi[1]][$topik][$ulangiclusterxyz]['x'][$no]."</td>";
								  echo "<td>".$clusterxyz[$literasi[1]][$topik][$ulangiclusterxyz]['y'][$no]."</td>";
								  if($geturltopik!=1){
								  echo "<td>".$clusterxyz[$literasi[1]][$topik][$ulangiclusterxyz]['z'][$no]."</td>";
								  }
							}	  
								  echo " </tr>";
								$no++;
							}
}							
?>
						</tbody>
					  </table>
					</div>
					<!-- /.box-body -->
					<div class="box-body">
<style>
table.ctr, th.ctr, td.ctr {
  text-align: center;
}
</style>
<?php
if($geturlkelas!="0"  and $geturltopik!="0"){
							
			echo "<table class='table table-bordered table-striped ctr'>";
			echo "<th></th><th class='ctr' colspan='$hayabusa'>Cluster 1</th><th class='ctr' colspan='$hayabusa'>Cluster 2</th>
			<th class='ctr' colspan='$hayabusa'>Cluster 3</th><th class='ctr' colspan='$hayabusa'>Cluster 4</th></tr>";
			echo "<tr><th></th>";
			echo "<th class='ctr' > x </th><th class='ctr' > y </th>"; if($geturltopik!=1){ echo "<th class='ctr' > z </th>"; }
			echo "<th class='ctr' > x </th><th class='ctr' > y </th>"; if($geturltopik!=1){ echo "<th class='ctr' > z </th>"; }
			echo "<th class='ctr' > x </th><th class='ctr' > y </th>"; if($geturltopik!=1){ echo "<th class='ctr' > z </th>"; }
			echo "<th class='ctr' > x </th><th class='ctr' > y </th>"; if($geturltopik!=1){ echo "<th class='ctr' > z </th>"; }
			echo "</tr>";
							
			for($counttot = 1; $counttot<=$jumlah_clustering; $counttot++){	
				for($x = 1; $x<=$jumlah_mahasiswa_kelas; $x++){
					$jumlah_clusterxyz[$literasi[1]][$topik][$counttot]['x'] = $clusterxyz[$literasi[1]][$topik][$counttot]['x'][$x];
					$sum_clusterxyz[$literasi[1]][$topik][$counttot]['x'] +=$clusterxyz[$literasi[1]][$topik][$counttot]['x'][$x];
									
					$jumlah_clusterxyz[$literasi[1]][$topik][$counttot]['y'] = $clusterxyz[$literasi[1]][$topik][$counttot]['y'][$x];
					$sum_clusterxyz[$literasi[1]][$topik][$counttot]['y'] +=$jumlah_clusterxyz[$literasi[1]][$topik][$counttot]['y'];
									
					if($geturltopik!=1){ 
						$jumlah_clusterxyz[$literasi[1]][$topik][$counttot]['z'] = $clusterxyz[$literasi[1]][$topik][$counttot]['z'][$x];
						$sum_clusterxyz[$literasi[1]][$topik][$counttot]['z'] +=$jumlah_clusterxyz[$literasi[1]][$topik][$counttot]['z'];
					}
				}
			}		
			
			echo "<tr><th class='ctr' > TOTAL </th>";
			for($tot = 1; $tot <=$jumlah_clustering; $tot++){
				echo"<td>";
				echo $sum_clusterxyz[$literasi[1]][$topik][$tot]['x'];
				echo"</td><td>";
				echo $sum_clusterxyz[$literasi[1]][$topik][$tot]['y'];
				echo"</td>";
				if($geturltopik!=1){ 
				echo "<td>";
				echo $sum_clusterxyz[$literasi[1]][$topik][$tot]['z'];
				echo"</td>";
				}
			}
			echo "</tr>";
							
			for($countjml = 1; $countjml<=$jumlah_clustering; $countjml++){
				for($x = 1; $x<=$jumlah_mahasiswa_kelas; $x++){
					if($clusterxyz[$literasi[1]][$topik][$countjml]['x'][$x]!="0"){
						$count_clusterxyz[$literasi[1]][$topik][$countjml]['x'] = $countifx[$literasi[1]][$topik][$countjml]++;
					}
					if($clusterxyz[$literasi[1]][$topik][$countjml]['y'][$x]!="0"){
						$count_clusterxyz[$literasi[1]][$topik][$countjml]['y'] = $countify[$literasi[1]][$topik][$countjml]++;
					}
					if($geturltopik!=1){ 
						if($clusterxyz[$literasi[1]][$topik][$countjml]['z'][$x]!="0"){
							$count_clusterxyz[$literasi[1]][$topik][$countjml]['z'] = $countifz[$literasi[1]][$topik][$countjml]++;
						}
					}
				}
			}
							
			echo "<tr><th class='ctr' > JUMLAH DATA </th>";
			for($jml = 1; $jml <=$jumlah_clustering; $jml++){
				echo "<td>";echo $count_clusterxyz[$literasi[1]][$topik][$jml]['x'];
				echo"</td>";
				echo "<td>";echo $count_clusterxyz[$literasi[1]][$topik][$jml]['y'];
				echo"</td>";
				if($geturltopik!=1){ 
					echo "<td>";
					echo $count_clusterxyz[$literasi[1]][$topik][$jml]['z'];
					echo"</td>";
				}
				
			}
			echo "</tr>";
						
			for($countavg = 1; $countavg <=$jumlah_clustering; $countavg++){
				$divide[$topik][$countavg]['x'] = ROUND($sum_clusterxyz[$literasi[1]][$topik][$countavg]['x']/$count_clusterxyz[$literasi[1]][$topik][$countavg]['x'],4);
				$divide[$topik][$countavg]['y'] = ROUND($sum_clusterxyz[$literasi[1]][$topik][$countavg]['y']/$count_clusterxyz[$literasi[1]][$topik][$countavg]['y'],4);
				if($geturltopik!=1){ 
					$divide[$topik][$countavg]['z'] = ROUND($sum_clusterxyz[$literasi[1]][$topik][$countavg]['z']/$count_clusterxyz[$literasi[1]][$topik][$countavg]['z'],4);
				}
			}						
						
			echo "<tr><th class='ctr' > AVERAGE </th>";
			for($avg = 1; $avg <=$jumlah_clustering; $avg++){
				echo"<td>";echo $divide[$topik][$avg]['x'];echo"</td><td>";echo $divide[$topik][$avg]['y'];echo"</td>";
				if($geturltopik!=1){ 
					echo "<td>";
					echo $divide[$topik][$avg]['z'];
					echo"</td>";
				}
			}
			echo "</tr>";
			echo "</table>";
}
?>
					</div>
				</div>
		</div>

<?php 
for($lit = 2; $lit <=$jumlah_clustering; $lit++){
?>
		<div class="col-xs-12" style="display: none">
				<div class="box">
					<!-- /.box-header -->
					<div class="box-body">
					<h5 class="box-title">
						<center><label>Literasi Ke-<?php echo $literasi[$lit];?></label></center>
					</h5>
					  <table id="literasi<?php echo $literasi[$lit];?>" class="table table-bordered table-striped">
						<thead>
						<tr>
						  <th rowspan="2" style="text-align:center;">Data ke-i</th>
						  <?php for($ulangi = 1; $ulangi<=$jumlah_clustering; $ulangi++){	?>
						  <th rowspan="2" style="text-align:center;">C<?php echo $ulangi; ?></th>
						  <?php	} ?>
						  <th rowspan="2" style="text-align:center;">Clustering</th>
						  <?php for($ulangi = 1; $ulangi<=$jumlah_clustering; $ulangi++){	?>
						  <th colspan="<?php echo $hayabusa;?>" style="text-align:center;">Cluster <?php echo $ulangi; ?> </th>
						  <?php	} ?>
						</tr>
						<?php
							for($ulangi = 1; $ulangi<=$jumlah_clustering; $ulangi++){	?>
							  <th style="text-align:center;">x</th>	
							  <th style="text-align:center;">y</th>	
							  <?php if($geturltopik!=1){ ?>
							  <th style="text-align:center;">z</th>	
							  <?php }	
							  } ?>						
						</tr>
						</thead>
						<tbody>
<?php						
if($geturlkelas!="0" and $geturltopik!="0"){
							$no = 1;
							foreach($tbl_users as $data){
								  echo "<tr>
								  <td>".$no."</td>";
								  
							for($ulangirumus = 1; $ulangirumus<=$jumlah_clustering; $ulangirumus++){	  
								  echo "<td>";
								  
								  $scop_ipk = $nilai_ipk[$data->user_id];
								  $scop_algo = $nilai_algo[$data->user_id];
								  $scop_stad = $nilai_stad[$data->user_id][$topik];
								  $scop_average_x = $divide[$topik][$ulangirumus]['x'];
								  $scop_average_y = $divide[$topik][$ulangirumus]['y'];
								  if($geturltopik!=1){ 
									$scop_average_z = $divide[$topik][$ulangirumus]['z'];
								  }
								  $scop_pangkatdua = $pangkatdua;
								  
								  $scop_variable_1 = pow($scop_ipk-$scop_average_x,$pangkatdua);
								  $scop_variable_2 = pow($scop_algo-$scop_average_y,$pangkatdua);
								  if($geturltopik==1){
									$scop_variable_3 = 0;
								  }else{
									$scop_variable_3 = pow($scop_stad-$scop_average_z,$pangkatdua);
								  }
								  $scop_variable_total = $scop_variable_1+$scop_variable_2+$scop_variable_3;
								  $scop_nilai_c = ROUND(SQRT($scop_variable_total),4);
								  
								  $nilai_cluster[$topik][$ulangirumus][$data->user_id] = $scop_nilai_c;
								  $c[$topik][$ulangirumus] = $nilai_cluster[$topik][$ulangirumus][$data->user_id];
								  echo  $c[$topik][$ulangirumus];
								  echo "</td>";
							}
							
								  if($c[$topik][1]<$c[$topik][2] AND $c[$topik][1]<$c[$topik][3] AND $c[$topik][1]<$c[$topik][4]){
									  $clustering[$topik][$literasi[$lit]] = 1;
								  }elseif($c[$topik][2]<$c[$topik][1] AND $c[$topik][2]<$c[$topik][3] AND $c[$topik][2]<$c[$topik][4]){
									  $clustering[$topik][$literasi[$lit]] = 2;
								  }elseif($c[$topik][3]<$c[$topik][1] AND $c[$topik][3]<$c[$topik][2] AND $c[$topik][3]<$c[$topik][4]){
									  $clustering[$topik][$literasi[$lit]] = 3;
								  }else{
									  $clustering[$topik][$literasi[$lit]] = 4;
								  }
								  
								   echo "<td>";
								   
								   
								   for($ulangicluster = 1; $ulangicluster<=$jumlah_clustering; $ulangicluster++){
										  if($clustering[$topik][$literasi[$lit]]==$ulangicluster){
											  $clusterxyz[$literasi[$lit]][$topik][$ulangicluster]['x'][$no] = $nilai_ipk[$data->user_id];
											  $clusterxyz[$literasi[$lit]][$topik][$ulangicluster]['y'][$no] = $nilai_algo[$data->user_id];
											  if($geturltopik!=1){ 
												$clusterxyz[$literasi[$lit]][$topik][$ulangicluster]['z'][$no] = $nilai_stad[$data->user_id][$topik];
											  }
										  }else{
											  $clusterxyz[$literasi[$lit]][$topik][$ulangicluster]['x'][$no] = 0;
											  $clusterxyz[$literasi[$lit]][$topik][$ulangicluster]['y'][$no] = 0;
											  if($geturltopik!=1){ 
												$clusterxyz[$literasi[$lit]][$topik][$ulangicluster]['z'][$no] = 0;
											  }
										  }
									}
								   
								   $clustering_akhir[$topik][$data->user_id] = $clustering[$topik][$literasi[$lit]];
								   echo $clustering_akhir[$topik][$data->user_id];
								   
								   echo "</td>";
							
							for($ulangiclusterxyz = 1; $ulangiclusterxyz<=$jumlah_clustering; $ulangiclusterxyz++){							
								  echo "<td>".$clusterxyz[$literasi[$lit]][$topik][$ulangiclusterxyz]['x'][$no]."</td>";
								  
								  if($clusterxyz[$literasi[$lit]][$topik][$ulangiclusterxyz]['x'][$no]>0){
									  $xborg[$ulangiclusterxyz][$lit]++;
								  }
								  
								  echo "<td>".$clusterxyz[$literasi[$lit]][$topik][$ulangiclusterxyz]['y'][$no]."</td>";
								  
								  if($clusterxyz[$literasi[$lit]][$topik][$ulangiclusterxyz]['y'][$no]){
									  $yamato[$ulangiclusterxyz][$lit]++;
								  }
								  
								  if($geturltopik!=1){ 
									echo "<td>".$clusterxyz[$literasi[$lit]][$topik][$ulangiclusterxyz]['z'][$no]."</td>";
									
									if($clusterxyz[$literasi[$lit]][$topik][$ulangiclusterxyz]['z'][$no]){
									  $zabuza[$ulangiclusterxyz][$lit]++;
									}
								  
								  }
							}	  
								  echo " </tr>";
								$no++;
							}
}							
?>
						</tbody>
					  </table>
					</div>
					<!-- /.box-body -->
					<div class="box-body">
<style>
table.ctr, th.ctr, td.ctr {
  text-align: center;
}


</style>
<?php
if($geturlkelas!="0"  and $geturltopik!="0"){
							
			echo "<table class='table table-bordered table-striped ctr'>";
			echo "<th></th><th class='ctr' colspan='$hayabusa'>Cluster 1</th><th class='ctr' colspan='$hayabusa'>Cluster 2</th>
			<th class='ctr' colspan='$hayabusa'>Cluster 3</th><th class='ctr' colspan='$hayabusa'>Cluster 4</th></tr>";
			echo "<tr><th></th>";
			echo "<th class='ctr' > x </th><th class='ctr' > y </th>"; if($geturltopik!=1){  echo "<th class='ctr' > z </th>"; }
			echo "<th class='ctr' > x </th><th class='ctr' > y </th>"; if($geturltopik!=1){  echo "<th class='ctr' > z </th>"; }
			echo "<th class='ctr' > x </th><th class='ctr' > y </th>"; if($geturltopik!=1){  echo "<th class='ctr' > z </th>"; }
			echo "<th class='ctr' > x </th><th class='ctr' > y </th>"; if($geturltopik!=1){  echo "<th class='ctr' > z </th>"; }
			echo "</tr>";
							
			for($counttot = 1; $counttot<=$jumlah_clustering; $counttot++){	
				for($x = 1; $x<=$jumlah_mahasiswa_kelas; $x++){
					$jumlah_clusterxyz[$literasi[$lit]][$topik][$counttot]['x'] = $clusterxyz[$literasi[$lit]][$topik][$counttot]['x'][$x];
					$sum_clusterxyz[$literasi[$lit]][$topik][$counttot]['x'] +=$jumlah_clusterxyz[$literasi[$lit]][$topik][$counttot]['x'];
									
					$jumlah_clusterxyz[$literasi[$lit]][$topik][$counttot]['y'] = $clusterxyz[$literasi[$lit]][$topik][$counttot]['y'][$x];
					$sum_clusterxyz[$literasi[$lit]][$topik][$counttot]['y'] +=$jumlah_clusterxyz[$literasi[$lit]][$topik][$counttot]['y'];
					
					if($geturltopik!=1){					
						$jumlah_clusterxyz[$literasi[$lit]][$topik][$counttot]['z'] = $clusterxyz[$literasi[$lit]][$topik][$counttot]['z'][$x];
						$sum_clusterxyz[$literasi[$lit]][$topik][$counttot]['z'] +=$jumlah_clusterxyz[$literasi[$lit]][$topik][$counttot]['z'];
					}
				}
			}		
			
			echo "<tr><th class='ctr' > TOTAL </th>";
			for($tot = 1; $tot <=$jumlah_clustering; $tot++){
				echo"<td>";
				echo $sum_clusterxyz[$literasi[$lit]][$topik][$tot]['x'];
				echo"</td><td>";
				echo $sum_clusterxyz[$literasi[$lit]][$topik][$tot]['y'];
				echo"</td>";
				if($geturltopik!=1){
					echo "<td>";
					echo $sum_clusterxyz[$literasi[$lit]][$topik][$tot]['z'];
					echo"</td>";
				}
			}
			echo "</tr>";
							
			for($countjml = 1; $countjml<=$jumlah_clustering; $countjml++){
				for($x = 1; $x<=$jumlah_mahasiswa_kelas; $x++){
					if($clusterxyz[$literasi[$lit]][$topik][$countjml]['x'][$x]!="0"){
						$count_clusterxyz[$literasi[$lit]][$topik][$countjml]['x'] = $countifx[$literasi[$lit]][$topik][$countjml]++;
					}
					if($clusterxyz[$literasi[$lit]][$topik][$countjml]['y'][$x]!="0"){
						$count_clusterxyz[$literasi[$lit]][$topik][$countjml]['y'] = $countify[$literasi[$lit]][$topik][$countjml]++;
					}
					
					if($geturltopik!=1){
						if($clusterxyz[$literasi[$lit]][$topik][$countjml]['z'][$x]!="0"){
							$count_clusterxyz[$literasi[$lit]][$topik][$countjml]['z'] = $countifz[$literasi[$lit]][$topik][$countjml]++;
						}
					}
				}
			}
							
			echo "<tr><th class='ctr' > JUMLAH DATA </th>";
			for($jml = 1; $jml <=$jumlah_clustering; $jml++){
				echo "<td>"; 
				echo $xborg[$jml][$lit];
				echo"</td>";
				echo "<td>"; 
				echo $yamato[$jml][$lit];
				echo"</td>";
				if($geturltopik!=1){
					echo "<td>"; 
					echo $zabuza[$jml][$lit];
					echo"</td>";
				}
			}
			echo "</tr>";
						
			for($countavg = 1; $countavg <=$jumlah_clustering; $countavg++){
				$divide[$topik][$countavg]['x'] = ROUND($sum_clusterxyz[$literasi[$lit]][$topik][$countavg]['x']/$xborg[$countavg][$lit],4);
				$divide[$topik][$countavg]['y'] = ROUND($sum_clusterxyz[$literasi[$lit]][$topik][$countavg]['y']/$yamato[$countavg][$lit],4);
				if($geturltopik!=1){
					$divide[$topik][$countavg]['z'] = ROUND($sum_clusterxyz[$literasi[$lit]][$topik][$countavg]['z']/$zabuza[$countavg][$lit],4);
				}						
			}						
						
			echo "<tr><th class='ctr' > AVERAGE </th>";
			for($avg = 1; $avg <=$jumlah_clustering; $avg++){
				echo"<td>";echo $divide[$topik][$avg]['x'];echo"</td><td>";echo $divide[$topik][$avg]['y'];echo"</td>";
				if($geturltopik!=1){
					echo "<td>";echo $divide[$topik][$avg]['z'];echo"</td>";
				}
			}
			echo "</tr>";
			echo "</table>";
}
?>
					</div>
				</div>
		</div>
<?php } ?>

		<div class="col-xs-12" style="display: none">
				<div class="box">
					<!-- /.box-header -->
					<div class="box-body">
					<h5 class="box-title">
						<center><label>Hasil Clustering Akhir</label></center>
					</h5>
					  <table id="example69" class="table table-bordered table-striped">
						<thead>
						<tr>
						  <th style="text-align:center;">No</th>
						  <th style="text-align:center;">NIM</th>
						  <th style="text-align:center;">Nama Lengkap</th>
						  <th style="text-align:center;">Clustering</th>
						</tr>
						</thead>
						<tbody>
<?php						
if($geturlkelas!="0" and $geturltopik!="0"){
							$no = 1;
							foreach($tbl_users as $data){
								  echo "<tr>
								  <td>".$no."</td>
								  <td>";
								  $dataakhir_user_nim[$no] = $data->user_nim;
								  $dataakhir_user_image[$no] = $data->user_image;
								  echo $dataakhir_user_nim[$no];
								  echo "</td>
								  <td>";
								  $dataakhir_user_fullname[$no] = $data->user_fullname;
								  echo $dataakhir_user_fullname[$no];
								  echo "</td>
								  <td>";
								  $dataakhir_cluster[$no] = $clustering_akhir[$topik][$data->user_id];
								  
								  echo $dataakhir_cluster[$no];
								  echo "</td></tr>";
								$no++;
							}
}							
?>
						</tbody>
					  </table>
					</div>
				</div>
		</div>
		
		<div class="col-xs-12" style="display: none">
				<div class="box">
					<!-- /.box-header -->
					<div class="box-body">
					<h5 class="box-title">
						<center><label>Hasil Pengurutan</label></center>
					</h5>
					  <table id="example70" class="table table-bordered table-striped">
						<thead>
						<tr>
						  <th style="text-align:center;">No</th>
						  <th style="text-align:center;">NIM</th>
						  <th style="text-align:center;">Nama Lengkap</th>
						  <th style="text-align:center;">Clustering</th>
						</tr>
						</thead>
						<tbody>
<?php						
if($geturlkelas!="0" and $geturltopik!="0"){
								$nomor = 1;
								for($pengurutan=1; $pengurutan<=$jumlah_clustering; $pengurutan++){
									for ($y=1; $y<=$jumlah_mahasiswa_kelas; $y++){
										if($dataakhir_cluster[$y] == $pengurutan){
												echo "<tr><td>";
												echo $nomor;
												echo "</td><td>"; 
												$data_sorting_id[$nomor]=$y; 
												$data_sorting_user_image[$nomor]=$dataakhir_user_image[$y]; 
												$data_sorting_user_nim[$nomor]=$dataakhir_user_nim[$y]; 
												echo $data_sorting_user_nim[$nomor];
												echo "</td><td>"; 
												$data_sorting_user_fullname[$nomor]=$dataakhir_user_fullname[$y]; 
												echo $data_sorting_user_fullname[$nomor];
												echo "</td><td>";
												echo $dataakhir_cluster[$y];
												echo "</td></tr>";
										$nomor++;
										}
									}
								}
								
}							
?>
						</tbody>
					  </table>
					</div>
				</div>
		</div>

<div id="print-area-1" class="print-area">	
		
		<div class="col-xs-12">
				<div class="box">
					<div class="box-title">
						<table style="text-align:center; vertical-align:middle;" align="center"><tr><td style="text-align:center; vertical-align:middle;" align="center"><center><img width="130" src="<?php echo base_url();?>assets/dist/img/logo.png" alt=""></center></td>
						<td style="text-align:center; vertical-align:middle;" align="center"><center><h4>SMART COOPERATIVE ORIENTED PROBLEMS</h4></center></td></tr></table>
					</div>
					<!-- /.box-header -->
				</div>
		</div>
		<div class="col-xs-12">
				<div class="box">
					<!-- /.box-header -->
					<div class="box-body">
					  <table id="example8" class="table table-bordered table-striped" border="1" width="100%">
						<thead>
						<tr>
							<th style="text-align:center;" colspan="<?php echo $jumlah_kelompok;?>">Nama Kelompok</th>
						</tr>
						<tr>
						<?php 
						for($kelompok = 1; $kelompok <= $jumlah_kelompok ; $kelompok++){
							echo "<th style='text-align:center;'>$kelompok</th>";	
						}?>
						</tr>
						</thead>
						<tbody style="font-size:8pt; text-align:center;">
<?php						
if($geturlkelas!="0" and $geturltopik!="0"){
						for($transformer=0; $transformer<$tampil_baris; $transformer++){
							echo "<tr>";
								for($urutan = $jumlah_kelompok*$transformer+1; $urutan <= $jumlah_kelompok*($transformer+1) ; $urutan++){
									echo "<td>"; 
									echo "<img src='".base_url()."assets/avatar/".$data_sorting_user_image[$urutan]."?".strtotime("now")."' width='80px' height='80px'>";
									echo "<br>";
									echo "Nama: ".$data_sorting_user_fullname[$urutan];
									echo "<br>";
									echo "NIM: ".$data_sorting_user_nim[$urutan]; echo "</td>";
								}
							echo "</tr>";
						}
}							
?>
						</tbody>
					  </table>
					</div>
				</div>
		</div>


</div>
<textarea id="printing-css" style="display:none;">html,body,div,span,applet,object,iframe,h1,h2,h3,h4,h5,h6,p,blockquote,pre,a,abbr,acronym,address,big,cite,code,del,dfn,em,img,ins,kbd,q,s,samp,small,strike,strong,sub,sup,tt,var,b,u,i,center,dl,dt,dd,ol,ul,li,fieldset,form,label,legend,table,caption,tbody,tfoot,thead,tr,th,td,article,aside,canvas,details,embed,figure,figcaption,footer,header,hgroup,menu,nav,output,ruby,section,summary,time,mark,audio,video{margin:0;padding:0;border:0;font-size:100%;font:inherit;vertical-align:baseline}article,aside,details,figcaption,figure,footer,header,hgroup,menu,nav,section{display:block}body{line-height:1}ol,ul{list-style:none}blockquote,q{quotes:none}blockquote:before,blockquote:after,q:before,q:after{content:'';content:none}table{border-collapse:collapse;border-spacing:0}body{font:normal normal .8125em/1.4 Arial,Sans-Serif;background-color:white;color:#333}strong,b{font-weight:bold}cite,em,i{font-style:italic}a{text-decoration:none}a:hover{text-decoration:underline}a img{border:none}abbr,acronym{border-bottom:1px dotted;cursor:help}sup,sub{vertical-align:baseline;position:relative;top:-.4em;font-size:86%}sub{top:.4em}small{font-size:86%}kbd{font-size:80%;border:1px solid #999;padding:2px 5px;border-bottom-width:2px;border-radius:3px}mark{background-color:#ffce00;color:black}p,blockquote,pre,table,figure,hr,form,ol,ul,dl{margin:1.5em 0}hr{height:1px;border:none;background-color:#666}h1,h2,h3,h4,h5,h6{font-weight:bold;line-height:normal;margin:1.5em 0 0}h1{font-size:200%}h2{font-size:180%}h3{font-size:160%}h4{font-size:140%}h5{font-size:120%}h6{font-size:100%}ol,ul,dl{margin-left:3em}ol{list-style:decimal outside}ul{list-style:disc outside}li{margin:.5em 0}dt{font-weight:bold}dd{margin:0 0 .5em 2em}input,button,select,textarea{font:inherit;font-size:100%;line-height:normal;vertical-align:baseline}textarea{display:block;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}pre,code{font-family:"Courier New",Courier,Monospace;color:inherit}pre{white-space:pre;word-wrap:normal;overflow:auto}blockquote{margin-left:2em;margin-right:2em;border-left:4px solid #ccc;padding-left:1em;font-style:italic}table[border="1"] th,table[border="1"] td,table[border="1"] caption{border:1px solid;padding:.5em 1em;text-align:left;vertical-align:top}th{font-weight:bold}table[border="1"] caption{border:none;font-style:italic}.no-print{display:none};</textarea>
<iframe id="printing-frame" name="print_frame" src="about:blank" style="display:none;"></iframe>
	  </div>
    </section>
  </div>
<script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
$('#example69').DataTable({
			"processing": true,
			"ordering": false,
			"autoWidth": false,
			"paging": true,
			"info": true,
			'order': [[3, 'asc']],
			columnDefs: [],
		});
$('#example70').DataTable({
			"processing": true,
			"ordering": false,
			"autoWidth": false,
			"paging": true,
			"info": true,
			//'order': [[3, 'asc']],
			columnDefs: [],
		});
</script>