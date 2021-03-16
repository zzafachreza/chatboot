  <div class="content-wrapper ">
    <section class="content-header">
      <h1>
        Data Tanya Jawab
      </h1>
    </section>

 <?php

  	// cek add/edit or delete
$aksi="add";
$tanya="";
$jawab="";
$inputID="";

  if (!empty($_POST) && $_POST['aksi']=="add") {
  	# code...
  		$tanya = $_POST['tanya'];
  		$jawab = $_POST['jawab'];
	    $sqlAdd = "INSERT tbl_tanya_jawab(tanya,jawab) VALUES('$tanya','$jawab')";
	    $this->db->query($sqlAdd);
	    redirect('admin/tanya');
  }

    if (!empty($_GET) && $_GET['aksi']=="delete") {
  	# code...
  		$id = $_GET['id'];
	    $sqlDelete = "DELETE FROM tbl_tanya_jawab WHERE id=$id";
	    $this->db->query($sqlDelete);
	    redirect('admin/tanya');
  }


    if (!empty($_GET) && $_GET['aksi']=="ubah") {
  	# code...
  		$id = $_GET['id'];
  		$tanya = $_GET['tanya'];
  		$jawab = $_GET['jawab'];
  		$aksi="ubah";
  		$inputID='<input type="hiddean" name="id" value="'.$id.'">';
	    // $sqlDelete = "DELETE FROM tbl_tanya_jawab WHERE id=$id";
	    // $this->db->query($sqlDelete);
	    // redirect('admin/tanya');
  }

    if (!empty($_POST) && $_POST['aksi']=="ubah") {
  	# code...
    	$id = $_POST['id'];
  		$tanya = $_POST['tanya'];
  		$jawab = $_POST['jawab'];
	    $sqlAdd = "UPDATE tbl_tanya_jawab SET tanya='$tanya',jawab='$jawab' WHERE id='$id'";
	    $this->db->query($sqlAdd);
	    redirect('admin/tanya');
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
								<label>Pertanyaan</label>
								<input type="text" name="tanya" class="form-control" value="<?php echo $tanya ?>">
						
							</div>
							<div class="form-group">
								<label>Jawaban</label>
								<input type="text" name="jawab" class="form-control" value="<?php echo $jawab ?>">
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
					  <th>Pertanyaan</th>
					  <th>Jawaban</th>
					  <th width="120px">Action</th>
					</tr>
					</thead>
					<tbody>
					<?php
					$sql="SELECT * FROM tbl_tanya_jawab";
					$tbl_tanya_jawab = $this->db->query($sql);
					$no = 1;
					foreach($tbl_tanya_jawab->result() as $data){
						  echo "<tr>
						  <td>".$no."</td>
						  <td>".$data->tanya."</td>
						  <td>".$data->jawab."</td>
						  <td>
						  <a class='btn-sm btn-warning' href='".base_url("admin/tanya/?aksi=ubah&id=".$data->id."&tanya=".$data->tanya."&jawab=".$data->jawab)."'>Ubah</a>
						  <a onclick=\"return confirm('Yakin untuk dihapus?')\" class='btn-sm btn-danger' href='".base_url("admin/tanya/?aksi=delete&id=".$data->id)."'>Hapus</a></td>
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


 