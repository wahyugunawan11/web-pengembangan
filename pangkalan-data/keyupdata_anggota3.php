<?php
include ("koneksi.php");
$anggota3 = $_POST['anggota3text'];
$query = mysql_query("select nama from dosen where nama like '%$anggota3%' limit 10");
while($k=mysql_fetch_array($query)){
	echo '<input type="text" onclick="anggota3isi(\''.$k[0].'\');" style="cursor:pointer" value=\''.$k[0].'\' size="50"><br>';
}
?>