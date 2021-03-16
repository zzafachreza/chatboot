<?php
	date_default_timezone_set('Asia/Jakarta');

	$nama_lengkap = $_SESSION['nama_lengkap'];

	$user_id = $_POST['user_id'];
	$pesan_isi = strtolower($_POST['pesan_isi']);
	$pesan_tipe = $_POST['pesan_tipe'];

	$sqlCek = "SELECT * FROM tbl_tanya_jawab WHERE tanya like '%$pesan_isi%'";
	$hasilCek = $this->db->query($sqlCek);
	$row = $hasilCek->result();



function clean($string) {
   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
   $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
   $string = preg_replace('/\d/', '', $string );

   return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
}


	
	if ($hasilCek->num_rows() <> 0) {
		# code...
		   $new_isi = $jawab = $row[0]->jawab;
	}else{
		 $new_isi = "pertanyaan tidak ditemukan";
		 $token = explode("-", clean($pesan_isi));
		 $cekBeyes = "";

		 for ($i=0; $i < count($token) ; $i++) { 
		 	# code...
		 	if ($i==0) {
		 		# code...
		 		$cekBeyes .="isi like '%".$token[$i]."%' ";
		 	}else{
		 		$cekBeyes .="OR isi like '%".$token[$i]."%' ";
		 	}
		 }

		 echo $sqlCek2 = "SELECT * FROM tbl_naive_beyes WHERE ".$cekBeyes;
		 $hasilCek2 = $this->db->query($sqlCek2);

		 if ($hasilCek2->num_rows() <> 0) {


		 	require_once($_SERVER['DOCUMENT_ROOT'].str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']).'/vendor/autoload.php');


			$tokenizer = new HybridLogic\Classifier\Basic;
			$classifier = new HybridLogic\Classifier($tokenizer);

			$sqlBeyes = "SELECT * FROM tbl_naive_beyes";
				$tbl_naive_beyes = $this->db->query($sqlBeyes);
									$no = 1;
									foreach($tbl_naive_beyes->result() as $data){
										$classifier->train($data->tipe, $data->isi);
									}

			echo $input = str_replace("-", " ", clean($pesan_isi));
			$groups = $classifier->classify($input);
			$POSITIF = $groups['POSITIF'];
			$NEGATIF = $groups['NEGATIF'];

			var_dump($groups);

			if ($POSITIF > $NEGATIF) {
				# code...
				$analisa_tipe ='POSITIF';
				$analisa_probabilitas = $POSITIF;
			}else{
				$analisa_tipe ='NEGATIF';
				$analisa_probabilitas = $NEGATIF;
			}


			$sqlAnalisa = "INSERT INTO`tbl_analisa`
		            (
		             `user_id`,
		             `analisa_isi`,
		             `analisa_tipe`,
		             `analisa_probabilitas`,
		             `analisa_tanggal`,
		             `analisa_jam`)
		VALUES (
		        '$user_id',
		        '$pesan_isi',
		        '$analisa_tipe',
		        '$analisa_probabilitas',
		        NOW(),NOW());";
		        $this->db->query($sqlAnalisa);



		 }

	}




			$sqlPesan = "INSERT INTO tbl_pesan(user_id,pesan_isi,pesan_tipe,pesan_tanggal,pesan_jam) VALUE('$user_id','$new_isi','$pesan_tipe',NOW(),NOW())";


        
   $this->db->query($sqlPesan);

?>