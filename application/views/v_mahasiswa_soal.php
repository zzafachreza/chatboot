<?php 
$wherekelas = $this->uri->segment(3);
$wheretopik = $this->uri->segment(4);
$pretest_id = $this->uri->segment(5);
	//set session dulu dengan nama $_SESSION["mulai"]
    if (isset($_SESSION["mulai"])) { 
        //jika session sudah ada
        $telah_berlalu = time() - $_SESSION["mulai"];
    } else { 
        //jika session belum ada
        $_SESSION["mulai"]  = time();
        $telah_berlalu      = 0;
    } 
	
$temp_waktu = ($tbl_pretest->pretest_waktu*60) - $telah_berlalu; //dijadikan detik dan dikurangi waktu yang berlalu
    $temp_menit = (int)($temp_waktu/60);                //dijadikan menit lagi
    $temp_detik = $temp_waktu%60;                       //sisa bagi untuk detik
     
    if ($temp_menit < 60) { 
        /* Apabila $temp_menit yang kurang dari 60 meni */
        $jam    = 0; 
        $menit  = $temp_menit; 
        $detik  = $temp_detik; 
    } else { 
        /* Apabila $temp_menit lebih dari 60 menit */           
        $jam    = (int)($temp_menit/60);    //$temp_menit dijadikan jam dengan dibagi 60 dan dibulatkan menjadi integer 
        $menit  = $temp_menit%60;           //$temp_menit diambil sisa bagi ($temp_menit%60) untuk menjadi menit
        $detik  = $temp_detik;
    }   
?>
<div class="content-wrapper ">
	<section class="content-header">
      <h1>
        <table width="100%">
			<tr>
				<td width="50%"><?php echo $tbl_pretest->pretest_nama;?></td>
				<td width="50%" style="text-align:right;"><div id='timer'></div></td>
			</tr>
		</table>
      </h1>
    </section>
    <!-- Main content -->
    <section class="content" >
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
					</div>
					<div class="box-body no-padding">
						<div class="col-xs-12">
							<div style='width:100%; border: 1px solid #EBEBEB; overflow:scroll;height:700px;'>
								<table width="100%" border="0">
								<?php
								$urut=0;
								foreach($tbl_soal as $row)
								{
								$id=$row->id_soal;
								$pertanyaan=$row->soal;
								$pilihan_a=$row->a;
								$pilihan_b=$row->b;
								$pilihan_c=$row->c;
								$pilihan_d=$row->d; 
								$pilihan_e=$row->e; 
								
								?>
								<form name="frmSoal" id="frmSoal" method="post" action="<?php echo base_url();?>mahasiswa/soal_action" enctype='multipart/form-data'>
								<input type="hidden" name="id[]" value=<?php echo $id; ?>>
								<input type="hidden" name="jumlah" value=<?php echo $jumlahsoal; ?>>
								<input type="hidden" name="kelas_id" value=<?php echo $wherekelas; ?>>
								<input type="hidden" name="nilaipretest_topik" value=<?php echo $wheretopik; ?>>
								<input type="hidden" name="pretest_id" value=<?php echo $pretest_id; ?>>
								<tr>
									  <td width="17"><font color="#000000"><?php echo $urut=$urut+1; ?></font></td>
									  <td width="430"><font color="#000000"><?php echo "$pertanyaan"; ?></font></td>
								</tr>
								<?php
									if (!empty($row->soal_gambar)) {
										echo "<tr><td></td><td><img src='foto/$row->soal_gambar' width='200' hight='200'></td></tr>";
									}
								?>
								<tr>
									  <td height="21"><font color="#000000">&nbsp;</font></td>
									<td><font color="#000000">
								   A.  <input name="pilihan[<?php echo $id; ?>]" type="radio" value="A"> 
									<?php echo "$pilihan_a";?></font> </td>
								</tr>
								<tr>
									  <td><font color="#000000">&nbsp;</font></td>
									<td><font color="#000000">
								   B. <input name="pilihan[<?php echo $id; ?>]" type="radio" value="B"> 
									<?php echo "$pilihan_b";?></font> </td>
								</tr>
								<tr>
									  <td><font color="#000000">&nbsp;</font></td>
									<td><font color="#000000">
								  C.  <input name="pilihan[<?php echo $id; ?>]" type="radio" value="C"> 
									<?php echo "$pilihan_c";?></font> </td>
								</tr>
								<tr>
									<td><font color="#000000">&nbsp;</font></td>
									<td><font color="#000000">
								  D.   <input name="pilihan[<?php echo $id; ?>]" type="radio" value="D"> 
									<?php echo "$pilihan_d";?></font> </td>
								</tr>
								<tr>
									<td><font color="#000000">&nbsp;</font></td>
									<td><font color="#000000">
								  E.   <input name="pilihan[<?php echo $id; ?>]" type="radio" value="E"> 
									<?php echo "$pilihan_e";?></font> </td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									  <td></td>
								</tr>
							<?php
							}
							?>
								<tr>
									<td>&nbsp;</td>
									  <td></td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									  <td><button onclick="return confirm('Apakah Anda yakin dengan jawaban Anda?')" class="btn btn-md btn-info">Selesai</button></td>
								</tr>
								</table>
							</form>
									</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script type="text/javascript">
        $(document).ready(function() {
            /** Membuat Waktu Mulai Hitung Mundur Dengan 
                * var detik;
                * var menit;
                * var jam;
            */
            var detik   = <?= $detik; ?>;
            var menit   = <?= $menit; ?>;
            var jam     = <?= $jam; ?>;
                  
            /**
               * Membuat function hitung() sebagai Penghitungan Waktu
            */
            function hitung() {
                /** setTimout(hitung, 1000) digunakan untuk 
                     * mengulang atau merefresh halaman selama 1000 (1 detik) 
                */
                setTimeout(hitung,1000);
  
                /** Jika waktu kurang dari 10 menit maka Timer akan berubah menjadi warna merah */
                if(menit < 10 && jam == 0){
                    var peringatan = 'style="color:red"';
                };
				
                /** Menampilkan Waktu Timer pada Tag #Timer di HTML yang tersedia */
                $('#timer').html(
                    '<h4 '+peringatan+'>Sisa waktu anda <br />' + jam + ' jam : ' + menit + ' menit : ' + detik + ' detik</h4>'
                );
  
                /** Melakukan Hitung Mundur dengan Mengurangi variabel detik - 1 */
                detik --;
  
                /** Jika var detik < 0
                    * var detik akan dikembalikan ke 59
                    * Menit akan Berkurang 1
                */
                if(detik < 0) {
                    detik = 59;
                    menit --;
  
                   /** Jika menit < 0
                        * Maka menit akan dikembali ke 59
                        * Jam akan Berkurang 1
                    */
                    if(menit < 0) {
                        menit = 59;
                        jam --;
  
                        /** Jika var jam < 0
                            * clearInterval() Memberhentikan Interval dan submit secara otomatis
                        */
                             
                        if(jam < 0) { 
                            clearInterval(hitung); 
                            var frmSoal = document.getElementById("frmSoal"); 
                            alert('Waktu Anda telah habis, Jawaban akan tersimpan otomatis');
                            frmSoal.submit(); 
                        } 
                    } 
                } 
            }           
            /** Menjalankan Function Hitung Waktu Mundur */
            hitung();
        });
    </script>