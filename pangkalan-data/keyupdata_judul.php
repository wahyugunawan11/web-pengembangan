<?php
include ("koneksi.php");
$judul = $_POST['judultext'];
if ($_POST){
	$query = mysql_query("select judul from proposal where judul like '%$judul%' limit 10");
	while($k=mysql_fetch_array($query)){
		echo '<input type="text" onclick="judulisi(\''.$k[0].'\');" style="cursor:pointer" value=\''.$k[0].'\' size="50"><br>';
	}
}
?>