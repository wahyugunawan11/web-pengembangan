<?php
$host = "localhost";
$username = "root";
$password = ''; $basisdata = "penelitian";
$perintah = mysql_connect ($host,$username,$password)
or die ("tidak dapat terkoneksi");
mysql_select_db ($basisdata, $perintah) or die ("tidak terkoneksi");
?>