<?php
	include ("koneksi.php");
	$namajudul2 = $_POST['namajudul2'];
	$query = "select id_laporan from laporan where judul = '$namajudul2'";
	$result = mysql_query($query);
	$raw_data = mysql_fetch_assoc($result);
	echo json_encode($raw_data);
?>