<?php

 
date_default_timezone_set('Asia/Jakarta');
$dbsetting['MySQLHost'] = "localhost";
$dbsetting['MySQLUser'] = "root";
$dbsetting['MySQLPasswd'] = "";
$dbsetting['MySQLDb'] = "lppkm";

$dbsetting['ERR_report']=FALSE;

DEFINE('DOMAIN_UTAMA',"http://localhost/lppkm");
DEFINE('ADMIN_PAGE',"http://localhost/lppkm/adminpage/");

$dir_utama="localhost/lppkm/";

DEFINE("LAMPIRAN_FILE",$_SERVER['DOCUMENT_ROOT'].$dir_utama."_lampiran/");
DEFINE("DIR_GAMBAR",$_SERVER['DOCUMENT_ROOT'].$dir_utama."img_post/");

DEFINE("ADMIN_LEVEL",$_SESSION['login-d56b699830']['lvl']);
DEFINE("ADMIN_BID",$_SESSION['login-d56b699830']['id_bid']);
DEFINE("ADMIN_ID",$_SESSION['login-d56b699830']['id']);
?>