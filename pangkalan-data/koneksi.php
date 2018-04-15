<?php
$host = "localhost";
$username = "lppkm_pdp";
$password = 'lppkmpdp2016%$#@!'; $basisdata = "lppkm_pdplemlit";
$perintah = mysql_connect ($host,$username,$password)
or die ("tidak dapat terkoneksi");
mysql_select_db ($basisdata, $perintah) or die ("tidak terkoneksi");
?>