<?php
include ("koneksi.php");
$anggota4 = $_POST['anggota4text'];
$query = mysql_query("select nama from dosen where nama like '%$anggota4%' limit 10");
while($k=mysql_fetch_array($query)){
	echo '<input type="text" onclick="anggota4isi(\''.$k[0].'\');" style="cursor:pointer" value=\''.$k[0].'\' size="50"><br>';
}
?>