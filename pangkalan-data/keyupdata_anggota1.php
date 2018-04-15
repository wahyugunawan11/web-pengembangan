<?php
include ("koneksi.php");
$anggota1 = $_POST['anggota1text'];
$query = mysql_query("select nama from dosen where nama like '%$anggota1%' limit 10");
while($k=mysql_fetch_array($query)){
	echo '<input type="text" onclick="anggota1isi(\''.$k[0].'\');" style="cursor:pointer" value=\''.$k[0].'\' size="50"><br>';
}
?>