<?php
	date_default_timezone_set('Asia/Jakarta');

	$user_id = $_POST['user_id'];
	$pesan_isi = $_POST['pesan_isi'];
	$pesan_tipe = $_POST['pesan_tipe'];

	$sqlPesan = "INSERT INTO tbl_pesan(user_id,pesan_isi,pesan_tipe,pesan_tanggal,pesan_jam) VALUE('$user_id','$pesan_isi','$pesan_tipe',NOW(),NOW())";
    $hasil = $this->db->query($sqlPesan);

?>