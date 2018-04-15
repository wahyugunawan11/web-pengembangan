<?php
include ("koneksi.php");
$nama = $_POST['nama'];
$query = "select iddosen from dosen where nama = '$nama'";
$result = mysql_query($query);
$raw_data = mysql_fetch_assoc($result);
echo json_encode($raw_data);
?>