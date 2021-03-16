  <div class="content-wrapper ">
    <section class="content-header">
      <h1>
        Data kelas
      </h1>
    </section>

    <!-- Main content -->
    <section class="content" >
      <div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">
						<a class="btn-sm btn-primary" href="<?php echo base_url("admin/kelas_tambah");?>"><i class="fa fa-plus"></i> <span>Tambah</span></a>
					</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
				  <table id="example2" class="table table-bordered table-striped">
					<thead>
					<tr>
					  <th width="40px">No</th>
					  <th>Nama kelas</th>
					  <th>Nama Input Nilai 1</th>
					  <th>Nama Input Nilai 2</th>
					  <th width="120px">Action</th>
					</tr>
					</thead>
					<tbody>
					<?php
					$no = 1;
					foreach($tbl_admin_kelas as $data){
						  echo "<tr>
						  <td>".$no."</td>
						  <td>".$data->kelas_nama."</td>
						  <td>".$data->kelas_nilai_x."</td>
						  <td>".$data->kelas_nilai_y."</td>
						  <td>
						  <a class='btn-sm btn-warning' href='".base_url("admin/kelas_ubah/".$data->kelas_id)."'>Ubah</a>
						  <a onclick=\"return confirm('Yakin untuk dihapus?')\" class='btn-sm btn-danger' href='".base_url("admin/kelas_aksi_hapus/".$data->kelas_id)."'>Hapus</a></td>
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
	
	<section class="content-header">
      <h1>
        Daftar Kelas Mahasiswa
      </h1>
    </section>

    <!-- Main content -->
    <section class="content" >
      <div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">
						<a class="btn-sm btn-primary" href="<?php echo base_url("admin/kelas_users_tambah");?>"><i class="fa fa-plus"></i> <span>Tambah</span></a>
					</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
				  <table id="example1" class="table table-bordered table-striped">
					<thead>
					<tr>
					  <th width="40px">No</th>
					  <th>NIM</th>
					  <th>Nama Mahasiswa</th>
					  <th>Nama kelas</th>
					  <th width="120px">Action</th>
					</tr>
					</thead>
					<tbody>
					<?php
					$no = 1;
					foreach($tbl_admin_kelas_users as $data){
						  echo "<tr>
						  <td>".$no."</td>
						  <td>".$data->user_nim."</td>
						  <td>".$data->user_fullname."</td>
						  <td>".$data->kelas_nama."</td>
						  <td>
						  <a class='btn-sm btn-warning' href='".base_url("admin/kelas_users_ubah/".$data->kelas_users_id)."'>Ubah</a>
						  <a onclick=\"return confirm('Yakin untuk dihapus?')\" class='btn-sm btn-danger' href='".base_url("admin/kelas_users_aksi_hapus/".$data->kelas_users_id)."'>Hapus</a></td>
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