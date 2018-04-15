<?php
include ("koneksi.php");
$nanggota3 = $_POST['nanggota3'];
$query = "select iddosen from dosen where nama = '$nanggota3'";
$result = mysql_query($query);
$raw_data = mysql_fetch_assoc($result);
echo json_encode($raw_data);
?>