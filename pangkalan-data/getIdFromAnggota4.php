<?php
include ("koneksi.php");
$nanggota4 = $_POST['nanggota4'];
$query = "select iddosen from dosen where nama = '$nanggota4'";
$result = mysql_query($query);
$raw_data = mysql_fetch_assoc($result);
echo json_encode($raw_data);
?>