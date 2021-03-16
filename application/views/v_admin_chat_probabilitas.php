  <div class="content-wrapper ">
    <section class="content-header">
      <h1>
        Analisa Sentimen Mahasiswa Tentang Mata Kuliah
      </h1>
    </section>
    <!-- Main content -->
    <section class="content" >
      <div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
						<h1>Probabilitas</h1>
						<p>Diambil berdasarkan chatting yang terekam</p>
				
				</div>
				<!-- /.box-header -->

				<?php

if (!empty($_GET) && $_GET['aksi']=="delete") {
  	# code...
  		$id = $_GET['id'];
	    $sqlDelete = "DELETE FROM tbl_analisa WHERE id=$id";
	    $this->db->query($sqlDelete);
	    redirect('admin/probabilitas');
  }


			  if (!empty($_GET) && $_GET['aksi']=="cek") {
			  	# code...
			  		$get_user_id = $_GET['id'];
			  		$get_nama = $_GET['nama'];
			  		$get_nim = $_GET['nim'];
			  		$sqldetail= "SELECT * FROM tbl_analisa WHERE user_id='$get_user_id'";
			  		
			  
	?>

<div style="padding: 1%">
	<h2><?php echo $get_nim ?></h2>
<h2><?php echo $get_nama ?></h2>
</div>

 <table id="example2" class="table table-bordered table-striped">
					<thead>
					<tr>
					  <th width="40px">No</th>
					  <th>Tipe</th>
					  <th>Pesan</th>
					  <th>Probabilitas</th>
					  <th width="120px">Action</th>
					</tr>
					</thead>
					<tbody>
					<?php
					$tbl_naive_beyes = $this->db->query($sqldetail);
					$no = 1;
					foreach($tbl_naive_beyes->result() as $data2){
						  echo "<tr>
						  <td>".$no."</td>
						   <td>".$data2->analisa_tipe."</td>
						  	  <td>".$data2->analisa_isi."</td>
						 
						  <td>".$data2->analisa_probabilitas."</td>
						  <td>
						  <a onclick=\"return confirm('Yakin untuk dihapus?')\" class='btn-sm btn-danger' href='".base_url("admin/probabilitas/?aksi=delete&id=".$data2->id)."'>Hapus</a></td>
						  </tr>";
						  $no++;
					}
					?>
					</tbody>
				  </table>
			
<?php }else{




?>


				<div class="box-body">
				  <table id="example2" class="table table-bordered table-striped" >
					<thead>
					<tr>
					  <th width="40px">No</th>
					  <th>NIM</th>
					  <th>User Fullname</th>
					  <th>POSITIF</th>
					  <th>NEGATIF</th>
					  <th>Klasifikasi</th>
					 <th>Detail</th>
					</tr>
					</thead>
					<tbody>
					<?php
					$sql="SELECT * FROM tbl_users WHERE user_level='Mahasiswa'";
					$tbl_naive_beyes = $this->db->query($sql);
					$no = 1;
					foreach($tbl_naive_beyes->result() as $data){

			$user_id = $data->user_id;
			$sqlPositif = "SELECT count(*) as jml FROM tbl_analisa  WHERE user_id='$user_id' AND analisa_tipe='POSITIF'";
			$hasilPositif = $this->db->query($sqlPositif);
			$dataPositif = $hasilPositif->result();
			$jmlPositif = $dataPositif[0]->jml;



			$sqlNegatif = "SELECT count(*) as jml FROM tbl_analisa  WHERE user_id='$user_id' AND analisa_tipe='NEGATIF'";
			$hasilNegatif = $this->db->query($sqlNegatif);
			$dataNegatif = $hasilNegatif->result();
			$jmlNegatif = $dataNegatif[0]->jml;


			$hasil="";

			if ($jmlPositif ==0 AND $jmlNegatif ==0) {
				# code...
				$hasil = "Belum Melakukan Chatting";
		
			}elseif ($jmlPositif < $jmlNegatif) {
				# code...{
				$hasil = "Tidak Menyukai Matakuliah";
			}elseif ($jmlPositif == $jmlNegatif) {
				# code...{
				$hasil = "Biasa Saja";
			}elseif ($jmlPositif > $jmlNegatif) {
				# code...{
						$hasil =  "Menyukai Matakuliah";
			}else{
				$hasil = "Biasa Aja";
			}



						  echo "<tr>
						  <td>".$no."</td>
						  <td>".$data->user_nim."</td>
						  <td>".$data->user_fullname."</td>
						  <td>".$jmlPositif."</td>
						  <td>".$jmlNegatif."</td>
						  <td>".$hasil."</td>
						  <td><a class='btn-sm btn-primary' href='".base_url("admin/probabilitas/?aksi=cek&id=".$data->user_id."&nama=".$data->user_fullname."&nim=".$data->user_nim)."'>Detail</a></td>
						  </tr>";
						  $no++;
					}
					?>
					</tbody>
				  </table>




<?php } ?>
				</div>


				<!-- /.box-body -->
			  </div>
		</div>
      </div>
    </section>
  </div>


 