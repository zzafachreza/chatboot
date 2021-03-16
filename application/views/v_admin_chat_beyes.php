  <div class="content-wrapper ">
    <section class="content-header">
      <h1>
        Data tipe isi
      </h1>
    </section>

 <?php

  	// cek add/edit or delete
$aksi="add";
$tipe="";
$isi="";
$inputID="";

  if (!empty($_POST) && $_POST['aksi']=="add") {
  	# code...
  		$tipe = $_POST['tipe'];
  		$isi = $_POST['isi'];
	    $sqlAdd = "INSERT tbl_naive_beyes(tipe,isi) VALUES('$tipe','$isi')";
	    $this->db->query($sqlAdd);
	    redirect('admin/beyes');
  }

    if (!empty($_GET) && $_GET['aksi']=="delete") {
  	# code...
  		$id = $_GET['id'];
	    $sqlDelete = "DELETE FROM tbl_naive_beyes WHERE id=$id";
	    $this->db->query($sqlDelete);
	    redirect('admin/beyes');
  }


    if (!empty($_GET) && $_GET['aksi']=="ubah") {
  	# code...
  		$id = $_GET['id'];
  		$tipe = $_GET['tipe'];
  		$isi = $_GET['isi'];
  		$aksi="ubah";
  		$inputID='<input type="hiddean" name="id" value="'.$id.'">';
	    // $sqlDelete = "DELETE FROM tbl_naive_beyes WHERE id=$id";
	    // $this->db->query($sqlDelete);
	    // redirect('admin/tipe');
  }

    if (!empty($_POST) && $_POST['aksi']=="ubah") {
  	# code...
    	$id = $_POST['id'];
  		$tipe = $_POST['tipe'];
  		$isi = $_POST['isi'];
	    $sqlAdd = "UPDATE tbl_naive_beyes SET tipe='$tipe',isi='$isi' WHERE id='$id'";
	    $this->db->query($sqlAdd);
	    redirect('admin/beyes');
  }






  ?>

    <!-- Main content -->
    <section class="content" >
      <div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
						<form method="POST">
							<input type="hidden" name="aksi" value="<?php echo $aksi ?>">
							<?php echo $inputID ?>
							<div class="col col-sm-6">
								<div class="form-group">
								<label>Tipe</label>
								<select name="tipe" class="form-control">
									<option>...</option>
									<option <?php echo !empty($_GET['tipe']) && $_GET['tipe']=='POSITIF'?'selected="selected"':'' ?>>POSITIF</option>
									<option <?php echo !empty($_GET['tipe']) && $_GET['tipe']=='NEGATIF'?'selected="selected"':'' ?>>NEGATIF</option>
								</select>
								
						
							</div>
							<div class="form-group">
								<label>isian</label>
								<input type="text" name="isi" class="form-control" value="<?php echo $isi ?>">
							</div>
						
							<div class="form-group">
							
								<button class="btn btn-primary" type="submit" class="form-control"><i class="fa fa-plus"></i> Tambah</button>
							</div>
						</form>
					</div>
				</div>
				<!-- /.box-header -->


			



				<div class="box-body">
				  <table id="example2" class="table table-bordered table-striped">
					<thead>
					<tr>
					  <th width="40px">No</th>
					  <th>Tipe</th>
					  <th>isi</th>
					  <th width="120px">Action</th>
					</tr>
					</thead>
					<tbody>
					<?php
					$sql="SELECT * FROM tbl_naive_beyes";
					$tbl_naive_beyes = $this->db->query($sql);
					$no = 1;
					foreach($tbl_naive_beyes->result() as $data){
						  echo "<tr>
						  <td>".$no."</td>
						  <td>".$data->tipe."</td>
						  <td>".$data->isi."</td>
						  <td>
						  <a class='btn-sm btn-warning' href='".base_url("admin/beyes/?aksi=ubah&id=".$data->id."&tipe=".$data->tipe."&isi=".$data->isi)."'>Ubah</a>
						  <a onclick=\"return confirm('Yakin untuk dihapus?')\" class='btn-sm btn-danger' href='".base_url("admin/beyes/?aksi=delete&id=".$data->id)."'>Hapus</a></td>
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


 