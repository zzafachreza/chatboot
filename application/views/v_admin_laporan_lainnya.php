<?php
$geturllaporan = $this->uri->segment(4);
$topik = $this->uri->segment(5);
$kelas_id = $this->uri->segment(6);
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
		<div class="col-xs-12">
			<div class="box">
				.<div class="box-header">
						<table width="100%">
							<tr>
								<td width="20%">
									<div class="form-group">
										<select  class="form-control select2" onchange="if (this.value) window.location=this.value">
											<option>
												-- Pilih Laporan -- 
											</option>
											<option value='<?php echo base_url();?>admin/laporan/1/1/8'> Pengelompokkan</option>
											<option value='<?php echo base_url();?>admin/laporan/lainnya/nilaikelas'> Nilai Kelas </option>
											<option value='<?php echo base_url();?>admin/laporan/lainnya/nilaiuts'> Nilai UTS </option>
											<option value='<?php echo base_url();?>admin/laporan/lainnya/nilaiuas'> Nilai UAS </option>
											<option value='<?php echo base_url();?>admin/laporan/lainnya/nilaikeseluruhan'> Nilai Keseluruhan </option>
										</select>
									</div>
								</td>
							</tr>
						</table>
				</div>
			</div>
		</div>

		<?php
			if($geturllaporan == "nilaikelas" ){
		?>
			<div class="col-xs-12">
				<div class="box">
					<div class="box-body">
						<table>
							<tr>
								<td>
									<div class="form-group">
										<select  class="form-control select2" onchange="if (this.value) window.location=this.value">
											<?php 
											if($topik!=""){
												echo "<option value='".base_url()."admin/laporan/lainnya/nilaikelas/$topik/$kelas_id'>Topik Ke $topik</option>";
											}else{
												echo "<option> -- Pilih Topik -- </option>";
											}
											
											for($x=1; $x<=4; $x++){ ?>
											<option value='<?php echo base_url();?>admin/laporan/lainnya/nilaikelas/<?php echo $x;?>/<?php echo $kelas_id;?>'> Topik Ke <?php echo $x;?></option>
											<?php } ?>
										</select>
									</div>
								</td>
								<td>
									<div class="form-group">
										<select  class="form-control select2" onchange="if (this.value) window.location=this.value">
											<?php 
											if($kelas_id!=""){
												echo "<option value='".base_url()."admin/laporan/lainnya/nilaikelas/$topik/$tbl_admin_kelas_2->kelas_id;?>'>$tbl_admin_kelas_2->kelas_nama</option>";
											}else{
												echo "<option> -- Pilih Kelas -- </option>";
											}
											foreach($tbl_admin_kelas as $kelas){ ?>
											<option value='<?php echo base_url();?>admin/laporan/lainnya/nilaikelas/<?php echo $topik;?>/<?php echo $kelas->kelas_id;?>'> <?php echo $kelas->kelas_nama;?> </option>
											<?php } ?>
										</select>
									</div>
								</td>
								<td>
									<?php if($kelas_id!=""){ ?>
									<div class="form-group" style="text-align:right;">
										<a class="no-print btn btn-success" href="javascript:printDiv('print-area-1');"><i class="fa fa-print"></i> &nbsp;&nbsp;Cetak</a>
									</div>
									<?php } ?>
								</td>
							</tr>
						</table>
					<br>
					<?php if($kelas_id!=""){?>
					<div id="print-area-1" class="print-area">
					<table width="50%">
						<tr>
							<td>Nama Laporan</td>
							<td>:</td>
							<td>Nilai Kelas</td>
						</tr>
						<tr>
							<td>Topik</td>
							<td>:</td>
							<td><?php echo $topik; ?></td>
						</tr>
						<tr>
							<td>Kelas</td>
							<td>:</td>
							<td><?php echo $tbl_admin_kelas_2->kelas_nama; ?></td>
						</tr>
					</table>
					<br>
					<table id="scop1" class="table table-bordered table-striped " style="width:100%;" border="1">
					<thead>
					<tr>
					  <th rowspan="2">No</th>
					  <th rowspan="2">NIM</th>
					  <th rowspan="2">Nama Mahasiswa</th>
					  <th colspan="2">Penilaian Kinerja</th>
					  <th colspan="2">Penilaian Kompetensi 4C</th>
					  <th rowspan="2">Penilaian Praktek</th>
					  <th rowspan="2">Penilaian Pretest</th>
					  <th rowspan="2">Penilaian Peningkatan</th>
					  <th rowspan="2">Total Nilai</th>
					</tr>
					<tr>
					  <th>Makalah</th>
					  <th>Presentasi</th>
					  <th>Kelompok</th>
					  <th>Individu</th>
					</tr>
					</thead>
					<tbody>
				<?php					
					$no = 1;
						foreach($tbl_admin_nilai as $data){
							  echo "<tr>
							  <td>$no</td>
							  <td>$data->user_nim</td>
							  <td width='150px'>$data->user_fullname</td>
							  <td>$data->nilai_makalah</td>
							  <td>$data->nilai_presentasi</td>
							  <td>$data->nilai_kelompok</td>
							  <td>$data->nilai_individu</td>
							  <td>$data->nilai_praktek</td>
							  <td>$data->nilai_pretest</td>
							  <td>$data->nilai_peningkatan</td>
							  <td>$data->nilai_total</td>
							  </tr>";
							$no++;
						}?>
					</tbody>
				  </table>
				  </div>
					<?php } ?>
					</div>
				</div>
			</div>
		<?php
		}
		?>
		
		<?php
			if($geturllaporan == "nilaiuts" ){
		?>
			<div class="col-xs-12">
				<div class="box">
					<div class="box-body">
						<table>
							<tr>
								<td>
									<div class="form-group">
										<select  class="form-control select2" onchange="if (this.value) window.location=this.value">
											<?php 
											if($topik!=""){
												echo "<option value='".base_url()."admin/laporan/lainnya/nilaiuts/$tbl_admin_kelas_2->kelas_id;?>'>$tbl_admin_kelas_2->kelas_nama</option>";
											}else{
												echo "<option> -- Pilih Kelas -- </option>";
											}
											foreach($tbl_admin_kelas as $kelas){ ?>
											<option value='<?php echo base_url();?>admin/laporan/lainnya/nilaiuts/<?php echo $kelas->kelas_id;?>'> <?php echo $kelas->kelas_nama;?> </option>
											<?php } ?>
										</select>
									</div>
								</td>
								<td>
									<?php if($topik!=""){ ?>
									<div class="form-group" style="text-align:right;">
										<a class="no-print btn btn-success" href="javascript:printDiv('print-area-2');"><i class="fa fa-print"></i> &nbsp;&nbsp;Cetak</a>
									</div>
									<?php } ?>
								</td>
							</tr>
						</table>
					<br>
					<?php if($topik!=""){?>
					<div id="print-area-2" class="print-area">
					<table width="50%">
						<tr>
							<td>Nama Laporan</td>
							<td>:</td>
							<td>Nilai Ujian Tengah Semester</td>
						</tr>
						<tr>
							<td>Kelas</td>
							<td>:</td>
							<td><?php echo $tbl_admin_kelas_2->kelas_nama; ?></td>
						</tr>
					</table>
					<br>
					<table id="scop1" class="table table-bordered table-striped " style="width:100%;" border="1">
					<thead>
					<tr>
					  <th>No</th>
					  <th>NIM</th>
					  <th>Nama Mahasiswa</th>
					  <th>Nilai UTS</th>
					</tr>
					</thead>
					<tbody>
					<?php					
					$no = 1;
						foreach($tbl_admin_nilai_uts as $uts){
							  echo "<tr>
							  <td>$no</td>
							  <td>$uts->user_nim</td>
							  <td width='150px'>$uts->user_fullname</td>
							  <td>$uts->nilai_uts</td>
							  </tr>";
							$no++;
						}?>
					</tbody>
				  </table>
				  </div>
					<?php } ?>
					</div>
				</div>
			</div>
		<?php
		}
		?>
		
		
		<?php
			if($geturllaporan == "nilaiuas" ){
		?>
			<div class="col-xs-12">
				<div class="box">
					<div class="box-body">
						<table>
							<tr>
								<td>
									<div class="form-group">
										<select  class="form-control select2" onchange="if (this.value) window.location=this.value">
											<?php 
											if($topik!=""){
												echo "<option value='".base_url()."admin/laporan/lainnya/nilaiuas/$tbl_admin_kelas_2->kelas_id;?>'>$tbl_admin_kelas_2->kelas_nama</option>";
											}else{
												echo "<option> -- Pilih Kelas -- </option>";
											}
											foreach($tbl_admin_kelas as $kelas){ ?>
											<option value='<?php echo base_url();?>admin/laporan/lainnya/nilaiuas/<?php echo $kelas->kelas_id;?>'> <?php echo $kelas->kelas_nama;?> </option>
											<?php } ?>
										</select>
									</div>
								</td>
								<td>
									<?php if($topik!=""){ ?>
									<div class="form-group" style="text-align:right;">
										<a class="no-print btn btn-success" href="javascript:printDiv('print-area-3');"><i class="fa fa-print"></i> &nbsp;&nbsp;Cetak</a>
									</div>
									<?php } ?>
								</td>
							</tr>
						</table>
					<br>
					<?php if($topik!=""){?>
					<div id="print-area-3" class="print-area">
					<table width="50%">
						<tr>
							<td>Nama Laporan</td>
							<td>:</td>
							<td>Nilai Ujian Akhir Semester</td>
						</tr>
						<tr>
							<td>Kelas</td>
							<td>:</td>
							<td><?php echo $tbl_admin_kelas_2->kelas_nama; ?></td>
						</tr>
					</table>
					<br>
					<table id="scop1" class="table table-bordered table-striped " style="width:100%;" border="1">
					<thead>
					<tr>
					  <th>No</th>
					  <th>NIM</th>
					  <th>Nama Mahasiswa</th>
					  <th>Nilai UAS</th>
					  <th>Nilai UAS Praktek</th>
					</tr>
					</thead>
					<tbody>
					<?php					
					$no = 1;
						foreach($tbl_admin_nilai_uas as $uas){
							  echo "<tr>
							  <td>$no</td>
							  <td>$uas->user_nim</td>
							  <td width='150px'>$uas->user_fullname</td>
							  <td>$uas->nilai_uas</td>
							  <td>$uas->nilai_uas_praktek</td>
							  </tr>";
							$no++;
						}?>
					</tbody>
				  </table>
					</div>
					<?php } ?>
					</div>
				</div>
			</div>
		<?php
		}
		?>
		
		<?php
			if($geturllaporan == "nilaikeseluruhan" ){
		?>
			<div class="col-xs-12">
				<div class="box">
					<div class="box-body">
						<table>
							<tr>
								<td>
									<div class="form-group">
										<select  class="form-control select2" onchange="if (this.value) window.location=this.value">
											<?php 
											if($topik!=""){
												echo "<option value='".base_url()."admin/laporan/lainnya/nilaikeseluruhan/$tbl_admin_kelas_2->kelas_id;?>'>$tbl_admin_kelas_2->kelas_nama</option>";
											}else{
												echo "<option> -- Pilih Kelas -- </option>";
											}
											foreach($tbl_admin_kelas as $kelas){ ?>
											<option value='<?php echo base_url();?>admin/laporan/lainnya/nilaikeseluruhan/<?php echo $kelas->kelas_id;?>'> <?php echo $kelas->kelas_nama;?> </option>
											<?php } ?>
										</select>
									</div>
								</td>
								<td>
									<?php if($topik!=""){ ?>
									<div class="form-group" style="text-align:right;">
										<a class="no-print btn btn-success" href="javascript:printDiv('print-area-4');"><i class="fa fa-print"></i> &nbsp;&nbsp;Cetak</a>
									</div>
									<?php } ?>
								</td>
							</tr>
						</table>
					<br>
					<?php if($topik!=""){?>
					<div id="print-area-4" class="print-area">
					<table width="50%">
						<tr>
							<td>Nama Laporan</td>
							<td>:</td>
							<td>Nilai Keseluruhan</td>
						</tr>
						<tr>
							<td>Kelas</td>
							<td>:</td>
							<td><?php echo $tbl_admin_kelas_2->kelas_nama; ?></td>
						</tr>
					</table>
					<br>
					<table id="scop1" class="table table-bordered table-striped " style="width:100%;" border="1">
					<thead>
					<tr>
					  <th rowspan="2">No</th>
					  <th rowspan="2">NIM</th>
					  <th rowspan="2">Nama Mahasiswa</th>
					  <th rowspan="2">Topik 1<br>10%</th>
					  <th rowspan="2">Topik 2<br>10%</th>
					  <th rowspan="2">UTS<br>15%</th>
					  <th rowspan="2">Topik 3<br>10%</th>
					  <th rowspan="2">Topik 4<br>10%</th>
					  <th colspan="2">UAS</th>
					  <th rowspan="2">Nilai Akhir</th>
					  <th rowspan="2">Konversi Nilai</th>
					</tr>
					<tr>
					  <th>Teori<br>15%</th>
					  <th>Praktek<br>30%</th>
					</tr>
					</thead>
					<tbody>
				<?php					
					$no = 1;
						foreach($tbl_admin_nilai_keseluruhan as $keseluruhan){
								$total = round($keseluruhan->total,2);
							  echo "<tr>
							  <td>$no</td>
							  <td>$keseluruhan->user_nim</td>
							  <td width='150px'>$keseluruhan->user_fullname</td>
							  <td>$keseluruhan->topik1</td>
							  <td>$keseluruhan->topik2</td>
							  <td>$keseluruhan->uts</td>
							  <td>$keseluruhan->topik3</td>
							  <td>$keseluruhan->topik4</td>
							  <td>$keseluruhan->uas</td>
							  <td>$keseluruhan->uas_praktek</td>
							  <td>$total</td>
							  <td>$keseluruhan->konversi</td>
							  </tr>";
							$no++;
						}?>
					</tbody>
				  </table>
					</div>
					<?php } ?>
					</div>
				</div>
			</div>
		<?php
		}
		?>
      </div>
    </section>
  </div>
<textarea id="printing-css" style="display:none;">html,body,div,span,applet,object,iframe,h1,h2,h3,h4,h5,h6,p,blockquote,pre,a,abbr,acronym,address,big,cite,code,del,dfn,em,img,ins,kbd,q,s,samp,small,strike,strong,sub,sup,tt,var,b,u,i,center,dl,dt,dd,ol,ul,li,fieldset,form,label,legend,table,caption,tbody,tfoot,thead,tr,th,td,article,aside,canvas,details,embed,figure,figcaption,footer,header,hgroup,menu,nav,output,ruby,section,summary,time,mark,audio,video{margin:0;padding:0;border:0;font-size:100%;font:inherit;vertical-align:baseline}article,aside,details,figcaption,figure,footer,header,hgroup,menu,nav,section{display:block}body{line-height:1}ol,ul{list-style:none}blockquote,q{quotes:none}blockquote:before,blockquote:after,q:before,q:after{content:'';content:none}table{border-collapse:collapse;border-spacing:0}body{font:normal normal .8125em/1.4 Arial,Sans-Serif;background-color:white;color:#333}strong,b{font-weight:bold}cite,em,i{font-style:italic}a{text-decoration:none}a:hover{text-decoration:underline}a img{border:none}abbr,acronym{border-bottom:1px dotted;cursor:help}sup,sub{vertical-align:baseline;position:relative;top:-.4em;font-size:86%}sub{top:.4em}small{font-size:86%}kbd{font-size:80%;border:1px solid #999;padding:2px 5px;border-bottom-width:2px;border-radius:3px}mark{background-color:#ffce00;color:black}p,blockquote,pre,table,figure,hr,form,ol,ul,dl{margin:1.5em 0}hr{height:1px;border:none;background-color:#666}h1,h2,h3,h4,h5,h6{font-weight:bold;line-height:normal;margin:1.5em 0 0}h1{font-size:200%}h2{font-size:180%}h3{font-size:160%}h4{font-size:140%}h5{font-size:120%}h6{font-size:100%}ol,ul,dl{margin-left:3em}ol{list-style:decimal outside}ul{list-style:disc outside}li{margin:.5em 0}dt{font-weight:bold}dd{margin:0 0 .5em 2em}input,button,select,textarea{font:inherit;font-size:100%;line-height:normal;vertical-align:baseline}textarea{display:block;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}pre,code{font-family:"Courier New",Courier,Monospace;color:inherit}pre{white-space:pre;word-wrap:normal;overflow:auto}blockquote{margin-left:2em;margin-right:2em;border-left:4px solid #ccc;padding-left:1em;font-style:italic}table[border="1"] th,table[border="1"] td,table[border="1"] caption{border:1px solid;padding:.5em 1em;text-align:left;vertical-align:top}th{font-weight:bold}table[border="1"] caption{border:none;font-style:italic}.no-print{display:none};</textarea>
<iframe id="printing-frame" name="print_frame" src="about:blank" style="display:none;"></iframe>