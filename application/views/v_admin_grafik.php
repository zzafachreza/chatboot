<?php
$getgrafik = $this->uri->segment(3);
$geturlkelas = $this->uri->segment(4);

if($getgrafik =="1"){
	$label_grafik = "Grafik Nilai Akhir Per Mahasiswa";
	$color_grafik = "rgba(60,141,188,0.7)";
	$jumlah_grafik = $jumlah_mahasiswa_kelas;
	$data_axis_x = 'user_fullname';
	$grafix_axis_x       = $this->db->query("select $data_axis_x,
	tbl_admin_kelas_users.kelas_users_id as marksman,
	
	((SELECT nilai_angka FROM tbl_admin_nilai 
	join tbl_admin_kelas_users ON tbl_admin_kelas_users.kelas_users_id=tbl_admin_nilai.kelas_users_id
	join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
	WHERE tbl_admin_kelas.kelas_id='$geturlkelas' AND nilai_topik='1' AND tbl_admin_nilai.kelas_users_id=marksman
	)*0.1)+((SELECT nilai_angka FROM tbl_admin_nilai 
	join tbl_admin_kelas_users ON tbl_admin_kelas_users.kelas_users_id=tbl_admin_nilai.kelas_users_id
	join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
	WHERE tbl_admin_kelas.kelas_id='$geturlkelas' AND nilai_topik='2' AND tbl_admin_nilai.kelas_users_id=marksman
	)*0.1)+((SELECT nilai_angka FROM tbl_admin_nilai 
	join tbl_admin_kelas_users ON tbl_admin_kelas_users.kelas_users_id=tbl_admin_nilai.kelas_users_id
	join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
	WHERE tbl_admin_kelas.kelas_id='$geturlkelas' AND nilai_topik='3' AND tbl_admin_nilai.kelas_users_id=marksman
	)*0.1)+((SELECT nilai_angka FROM tbl_admin_nilai 
	join tbl_admin_kelas_users ON tbl_admin_kelas_users.kelas_users_id=tbl_admin_nilai.kelas_users_id
	join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
	WHERE tbl_admin_kelas.kelas_id='$geturlkelas' AND nilai_topik='4' AND tbl_admin_nilai.kelas_users_id=marksman
	)*0.1)+((SELECT nilai_uts FROM tbl_admin_nilai_uts
	join tbl_admin_kelas_users ON tbl_admin_kelas_users.kelas_users_id=tbl_admin_nilai_uts.kelas_users_id
	join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
	WHERE tbl_admin_kelas.kelas_id='$geturlkelas' AND tbl_admin_nilai_uts.kelas_users_id=marksman
	)*0.15)+((SELECT nilai_uas FROM tbl_admin_nilai_uas
	join tbl_admin_kelas_users ON tbl_admin_kelas_users.kelas_users_id=tbl_admin_nilai_uas.kelas_users_id
	join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
	WHERE tbl_admin_kelas.kelas_id='$geturlkelas' AND tbl_admin_nilai_uas.kelas_users_id=marksman
	)*0.15)+((SELECT nilai_uas_praktek FROM tbl_admin_nilai_uas
	join tbl_admin_kelas_users ON tbl_admin_kelas_users.kelas_users_id=tbl_admin_nilai_uas.kelas_users_id
	join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
	WHERE tbl_admin_kelas.kelas_id='$geturlkelas' AND tbl_admin_nilai_uas.kelas_users_id=marksman
	)*0.30) as total		 
from tbl_admin_kelas_users
						join tbl_users ON tbl_users.user_id=tbl_admin_kelas_users.user_id
						join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
						WHERE tbl_admin_kelas.kelas_id='$geturlkelas'
						ORDER by tbl_users.user_fullname ASC");

	$data_axis_y = 'nilai_akhir';
	$grafix_axis_y       = $this->db->query("select 
	tbl_admin_kelas_users.kelas_users_id as marksman,
	IFNULL((SELECT nilai_angka FROM tbl_admin_nilai 
	join tbl_admin_kelas_users ON tbl_admin_kelas_users.kelas_users_id=tbl_admin_nilai.kelas_users_id
	join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
	WHERE tbl_admin_kelas.kelas_id='$geturlkelas' AND nilai_topik='1' AND tbl_admin_nilai.kelas_users_id=marksman
	),0) as topik1,
	IFNULL((SELECT nilai_angka FROM tbl_admin_nilai 
	join tbl_admin_kelas_users ON tbl_admin_kelas_users.kelas_users_id=tbl_admin_nilai.kelas_users_id
	join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
	WHERE tbl_admin_kelas.kelas_id='$geturlkelas' AND nilai_topik='2' AND tbl_admin_nilai.kelas_users_id=marksman
	),0) as topik2,
	IFNULL((SELECT nilai_angka FROM tbl_admin_nilai 
	join tbl_admin_kelas_users ON tbl_admin_kelas_users.kelas_users_id=tbl_admin_nilai.kelas_users_id
	join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
	WHERE tbl_admin_kelas.kelas_id='$geturlkelas' AND nilai_topik='3' AND tbl_admin_nilai.kelas_users_id=marksman
	),0) as topik3,	
	IFNULL((SELECT nilai_angka FROM tbl_admin_nilai 
	join tbl_admin_kelas_users ON tbl_admin_kelas_users.kelas_users_id=tbl_admin_nilai.kelas_users_id
	join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
	WHERE tbl_admin_kelas.kelas_id='$geturlkelas' AND nilai_topik='4' AND tbl_admin_nilai.kelas_users_id=marksman
	),0) as topik4,
	IFNULL((SELECT nilai_uts FROM tbl_admin_nilai_uts
	join tbl_admin_kelas_users ON tbl_admin_kelas_users.kelas_users_id=tbl_admin_nilai_uts.kelas_users_id
	join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
	WHERE tbl_admin_kelas.kelas_id='$geturlkelas' AND tbl_admin_nilai_uts.kelas_users_id=marksman
	),0) as uts,
	IFNULL((SELECT nilai_uas FROM tbl_admin_nilai_uas
	join tbl_admin_kelas_users ON tbl_admin_kelas_users.kelas_users_id=tbl_admin_nilai_uas.kelas_users_id
	join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
	WHERE tbl_admin_kelas.kelas_id='$geturlkelas' AND tbl_admin_nilai_uas.kelas_users_id=marksman
	),0) as uas,
	IFNULL((SELECT nilai_uas_praktek FROM tbl_admin_nilai_uas
	join tbl_admin_kelas_users ON tbl_admin_kelas_users.kelas_users_id=tbl_admin_nilai_uas.kelas_users_id
	join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
	WHERE tbl_admin_kelas.kelas_id='$geturlkelas' AND tbl_admin_nilai_uas.kelas_users_id=marksman
	),0) as uas_praktek,
	
	((SELECT nilai_angka FROM tbl_admin_nilai 
	join tbl_admin_kelas_users ON tbl_admin_kelas_users.kelas_users_id=tbl_admin_nilai.kelas_users_id
	join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
	WHERE tbl_admin_kelas.kelas_id='$geturlkelas' AND nilai_topik='1' AND tbl_admin_nilai.kelas_users_id=marksman
	)*0.1)+((SELECT nilai_angka FROM tbl_admin_nilai 
	join tbl_admin_kelas_users ON tbl_admin_kelas_users.kelas_users_id=tbl_admin_nilai.kelas_users_id
	join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
	WHERE tbl_admin_kelas.kelas_id='$geturlkelas' AND nilai_topik='2' AND tbl_admin_nilai.kelas_users_id=marksman
	)*0.1)+((SELECT nilai_angka FROM tbl_admin_nilai 
	join tbl_admin_kelas_users ON tbl_admin_kelas_users.kelas_users_id=tbl_admin_nilai.kelas_users_id
	join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
	WHERE tbl_admin_kelas.kelas_id='$geturlkelas' AND nilai_topik='3' AND tbl_admin_nilai.kelas_users_id=marksman
	)*0.1)+((SELECT nilai_angka FROM tbl_admin_nilai 
	join tbl_admin_kelas_users ON tbl_admin_kelas_users.kelas_users_id=tbl_admin_nilai.kelas_users_id
	join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
	WHERE tbl_admin_kelas.kelas_id='$geturlkelas' AND nilai_topik='4' AND tbl_admin_nilai.kelas_users_id=marksman
	)*0.1)+((SELECT nilai_uts FROM tbl_admin_nilai_uts
	join tbl_admin_kelas_users ON tbl_admin_kelas_users.kelas_users_id=tbl_admin_nilai_uts.kelas_users_id
	join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
	WHERE tbl_admin_kelas.kelas_id='$geturlkelas' AND tbl_admin_nilai_uts.kelas_users_id=marksman
	)*0.15)+((SELECT nilai_uas FROM tbl_admin_nilai_uas
	join tbl_admin_kelas_users ON tbl_admin_kelas_users.kelas_users_id=tbl_admin_nilai_uas.kelas_users_id
	join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
	WHERE tbl_admin_kelas.kelas_id='$geturlkelas' AND tbl_admin_nilai_uas.kelas_users_id=marksman
	)*0.15)+((SELECT nilai_uas_praktek FROM tbl_admin_nilai_uas
	join tbl_admin_kelas_users ON tbl_admin_kelas_users.kelas_users_id=tbl_admin_nilai_uas.kelas_users_id
	join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
	WHERE tbl_admin_kelas.kelas_id='$geturlkelas' AND tbl_admin_nilai_uas.kelas_users_id=marksman
	)*0.30) as $data_axis_y		 
from tbl_admin_kelas_users
						join tbl_users ON tbl_users.user_id=tbl_admin_kelas_users.user_id
						join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
						WHERE tbl_admin_kelas.kelas_id='$geturlkelas'
						ORDER by tbl_users.user_fullname ASC"); 
}else{
	$label_grafik = "Grafik Rata-Rata Nilai Akhir Seluruh Kelas";
	$color_grafik = "rgba(60,141,188,0.7)";
	$jumlah_grafik = $jumlah_kelas;
	$data_axis_x = 'kelas_nama';
	$grafix_axis_x       = $this->db->query("select 
	tbl_admin_kelas_users.kelas_users_id as marksman,
	$data_axis_x	 
from tbl_admin_kelas_users
						join tbl_users ON tbl_users.user_id=tbl_admin_kelas_users.user_id
						join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
						group by tbl_admin_kelas.kelas_id
						ORDER by tbl_admin_kelas.kelas_id ASC");

	$data_axis_y = 'nilairatarata';
	$grafix_axis_y       = $this->db->query("select 
	tbl_admin_kelas_users.kelas_users_id as marksman,
	ROUND(AVG(((SELECT nilai_angka FROM tbl_admin_nilai 
	join tbl_admin_kelas_users ON tbl_admin_kelas_users.kelas_users_id=tbl_admin_nilai.kelas_users_id
	join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
	WHERE nilai_topik='1' AND tbl_admin_nilai.kelas_users_id=marksman
	)*0.1)+((SELECT nilai_angka FROM tbl_admin_nilai 
	join tbl_admin_kelas_users ON tbl_admin_kelas_users.kelas_users_id=tbl_admin_nilai.kelas_users_id
	join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
	WHERE nilai_topik='2' AND tbl_admin_nilai.kelas_users_id=marksman
	)*0.1)+((SELECT nilai_angka FROM tbl_admin_nilai 
	join tbl_admin_kelas_users ON tbl_admin_kelas_users.kelas_users_id=tbl_admin_nilai.kelas_users_id
	join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
	WHERE nilai_topik='3' AND tbl_admin_nilai.kelas_users_id=marksman
	)*0.1)+((SELECT nilai_angka FROM tbl_admin_nilai 
	join tbl_admin_kelas_users ON tbl_admin_kelas_users.kelas_users_id=tbl_admin_nilai.kelas_users_id
	join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
	WHERE nilai_topik='4' AND tbl_admin_nilai.kelas_users_id=marksman
	)*0.1)+((SELECT nilai_uts FROM tbl_admin_nilai_uts
	join tbl_admin_kelas_users ON tbl_admin_kelas_users.kelas_users_id=tbl_admin_nilai_uts.kelas_users_id
	join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
	WHERE tbl_admin_nilai_uts.kelas_users_id=marksman
	)*0.15)+((SELECT nilai_uas FROM tbl_admin_nilai_uas
	join tbl_admin_kelas_users ON tbl_admin_kelas_users.kelas_users_id=tbl_admin_nilai_uas.kelas_users_id
	join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
	WHERE tbl_admin_nilai_uas.kelas_users_id=marksman
	)*0.15)+((SELECT nilai_uas_praktek FROM tbl_admin_nilai_uas
	join tbl_admin_kelas_users ON tbl_admin_kelas_users.kelas_users_id=tbl_admin_nilai_uas.kelas_users_id
	join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
	WHERE tbl_admin_nilai_uas.kelas_users_id=marksman
	)*0.30)),2) as $data_axis_y		 
from tbl_admin_kelas_users
						join tbl_users ON tbl_users.user_id=tbl_admin_kelas_users.user_id
						join tbl_admin_kelas ON tbl_admin_kelas_users.kelas_id=tbl_admin_kelas.kelas_id
						group by tbl_admin_kelas.kelas_id
						ORDER by tbl_admin_kelas.kelas_id ASC"); 
}
////////////////////////////////////////////////


?>
<script src="<?php echo base_url(); ?>assets/plugins/chartjs/Chart.bundle.js"></script>
<div class="content-wrapper ">
    <!-- Main content -->
    <section class="content" >
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<table width="100%">
							<tr>
							<td width="30%">
							<div class="form-group">
								<select type="text" class="form-control select2" onchange="if (this.value) window.location='<?php echo base_url();?>admin/grafik/'+this.value+'/<?php echo $geturlkelas;?>'">
									<?php
									if($getgrafik!="0"){
										echo "<option value='".$getgrafik."'>".$label_grafik."</option>";
									}else{
										echo "<option>-- Pilih Grafik --</option>";
									}
									
									echo "<option value='1'>Grafik Nilai Akhir Per Mahasiswa</option>";
									echo "<option value='2'>Grafik Rata-Rata Nilai Akhir Seluruh Kelas</option>";
									
									?>
								</select>
							</div>
							</td>
							<?php if($getgrafik!="2"){ ?>
							<td width="30%">
							<div class="form-group">
								<select type="text" class="form-control select2" onchange="if (this.value) window.location='<?php echo base_url();?>admin/grafik/<?php echo $getgrafik;?>/'+this.value">
									<?php
									if($geturlkelas!="0"){
										echo "<option value='".$tbl_admin_kelas_2->kelas_id."'>".$tbl_admin_kelas_2->kelas_nama."</option>";
									}else{
										echo "<option>-- Pilih kelas --</option>";
									}
									
									foreach($tbl_admin_kelas as $data0){
										echo "<option value='".$data0->kelas_id."'>".$data0->kelas_nama."</option>";
									}
									?>
								</select>
							</div>
							</td>
							<?php } ?>
								<td>
									<?php if($geturlkelas!="0"){ ?>
									<div class="form-group" style="text-align:right;">
										<a class="no-print btn btn-success" href="javascript:printDiv('print-area-1');"><i class="fa fa-print"></i> &nbsp;&nbsp;Cetak Grafik</a>
									</div>
									<?php } ?>
								</td>
							</tr>
						</table>
						<div id="print-area-1" class="print-area">	
							<div class="container">
								<canvas id="myChart" style="height:230px"></canvas>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<textarea id="printing-css" style="display:none;">html,body,div,span,applet,object,iframe,h1,h2,h3,h4,h5,h6,p,blockquote,pre,a,abbr,acronym,address,big,cite,code,del,dfn,em,img,ins,kbd,q,s,samp,small,strike,strong,sub,sup,tt,var,b,u,i,center,dl,dt,dd,ol,ul,li,fieldset,form,label,legend,table,caption,tbody,tfoot,thead,tr,th,td,article,aside,canvas,details,embed,figure,figcaption,footer,header,hgroup,menu,nav,output,ruby,section,summary,time,mark,audio,video{margin:0;padding:0;border:0;font-size:100%;font:inherit;vertical-align:baseline}article,aside,details,figcaption,figure,footer,header,hgroup,menu,nav,section{display:block}body{line-height:1}ol,ul{list-style:none}blockquote,q{quotes:none}blockquote:before,blockquote:after,q:before,q:after{content:'';content:none}table{border-collapse:collapse;border-spacing:0}body{font:normal normal .8125em/1.4 Arial,Sans-Serif;background-color:white;color:#333}strong,b{font-weight:bold}cite,em,i{font-style:italic}a{text-decoration:none}a:hover{text-decoration:underline}a img{border:none}abbr,acronym{border-bottom:1px dotted;cursor:help}sup,sub{vertical-align:baseline;position:relative;top:-.4em;font-size:86%}sub{top:.4em}small{font-size:86%}kbd{font-size:80%;border:1px solid #999;padding:2px 5px;border-bottom-width:2px;border-radius:3px}mark{background-color:#ffce00;color:black}p,blockquote,pre,table,figure,hr,form,ol,ul,dl{margin:1.5em 0}hr{height:1px;border:none;background-color:#666}h1,h2,h3,h4,h5,h6{font-weight:bold;line-height:normal;margin:1.5em 0 0}h1{font-size:200%}h2{font-size:180%}h3{font-size:160%}h4{font-size:140%}h5{font-size:120%}h6{font-size:100%}ol,ul,dl{margin-left:3em}ol{list-style:decimal outside}ul{list-style:disc outside}li{margin:.5em 0}dt{font-weight:bold}dd{margin:0 0 .5em 2em}input,button,select,textarea{font:inherit;font-size:100%;line-height:normal;vertical-align:baseline}textarea{display:block;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}pre,code{font-family:"Courier New",Courier,Monospace;color:inherit}pre{white-space:pre;word-wrap:normal;overflow:auto}blockquote{margin-left:2em;margin-right:2em;border-left:4px solid #ccc;padding-left:1em;font-style:italic}table[border="1"] th,table[border="1"] td,table[border="1"] caption{border:1px solid;padding:.5em 1em;text-align:left;vertical-align:top}th{font-weight:bold}table[border="1"] caption{border:none;font-style:italic}.no-print{display:none};</textarea>
<iframe id="printing-frame" name="print_frame" src="about:blank" style="display:none;"></iframe>
<?php if($getgrafik !="0"){ ?>
<script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script>
            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [<?php foreach ($grafix_axis_x->result_array() as $row_axis_x) { echo '"' . $row_axis_x[$data_axis_x] . '",';}?>],
                    datasets: [{
                            label: '<?php echo $label_grafik;?>',
                            data: [<?php foreach ($grafix_axis_y->result_array() as $row_axis_y) { echo '"' . $row_axis_y[$data_axis_y] . '",';}?>],
                            backgroundColor: [
                                /* ''*/
								<?php for($x=0; $x<$jumlah_grafik; $x++){?>
									'<?php echo $color_grafik;?>',
								<?php }?>
                            ],
                            borderColor: [
                                /* 'rgba(255,99,132,1)',*/
                            ],
                            borderWidth: 1
                        }]
                },
                options: {
                    scales: {
                        yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                    }
                }
            });

//console.log(ctx);

</script>
<?php } ?>