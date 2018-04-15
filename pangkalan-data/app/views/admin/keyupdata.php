<?php
$wcust = $_POST['Ctext'];
$query = mysql_query("select nama from dosen where nama like '%$wcust%' limit 10");
while($k=mysql_fetch_array($query)){
	echo '<input type="text" onclick="Cisi(\''.$k[0].'\');" style="cursor:pointer" value=\''.$k[0].'\' size="50"><br>';
}
?>