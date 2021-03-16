<style type="text/css">
	.kiri{
	float: left;background-color: #E2E3E4;width: 70%;text-align: left;padding:10px;border-top-left-radius: 10px;border-bottom-right-radius: 10px;margin-bottom: 5px;
}

.kanan span{
	float: right;
}

.kanan{
	float: right;background-color: #DCF8C6;width: 70%;text-align: right;padding:10px;border-top-right-radius: 10px;border-bottom-left-radius: 10px;margin-bottom: 5px;
}

.kiri span{
	float: right;
}
</style>

<?php
     		date_default_timezone_set('Asia/Jakarta');
     		$user_id = $_SESSION['userid'];
     		$sqlPesan = "SELECT * FROM tbl_pesan WHERE user_id='$user_id' ORDER BY pesan_tanggal ASC,pesan_jam ASC";
     		$hasil = $this->db->query($sqlPesan);

     		

    		foreach ($hasil->result() as $row) {
    			# code...
    			?>

    		<div class="<?php echo $row->pesan_tipe ?>">
    					<?php echo $row->pesan_isi ?>
     		<br/><span><?php echo substr($row->pesan_jam , 0,5) ?></span>
     	</div>

     <?php } ?>