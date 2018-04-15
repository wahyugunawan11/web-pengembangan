<?php
include ("koneksi.php");
$anggota2 = $_POST['anggota2text'];
$query = mysql_query("select nama from dosen where nama like '%$anggota2%' limit 10");
while($k=mysql_fetch_array($query)){
	echo '<input type="text" onclick="anggota2isi(\''.$k[0].'\');" style="cursor:pointer" value=\''.$k[0].'\' size="50"><br>';
}
?>