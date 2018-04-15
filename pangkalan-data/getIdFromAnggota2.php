<?php
include ("koneksi.php");
$nanggota2 = $_POST['nanggota2'];
$query = "select iddosen from dosen where nama = '$nanggota2'";
$result = mysql_query($query);
$raw_data = mysql_fetch_assoc($result);
echo json_encode($raw_data);
?>