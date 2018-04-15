<?php
include ("koneksi.php");
$nanggota1 = $_POST['nanggota1'];
$query = "select iddosen from dosen where nama = '$nanggota1'";
$result = mysql_query($query);
$raw_data = mysql_fetch_assoc($result);
echo json_encode($raw_data);
?>