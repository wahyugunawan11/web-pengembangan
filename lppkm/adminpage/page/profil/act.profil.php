<?php
session_start();
header("Content-Type: text/javascript; charset=utf-8");

if($_POST){
	include ("../../../inc/helper.php");
	include ("../../../inc/konfigurasi.php");
	include ("../../../inc/db.pdo.class.php");

	$db=new dB($dbsetting);
	

	$profil=$_POST['profil_edit'];
	$judul=$_POST['profil_judul'];
	
	$update="UPDATE tb_artikel SET isi='$profil', judul='$judul' WHERE kel_artikel='pg' ";
	if($db->runQuery($update)){ 
		echo json_encode(array("result"=>true,"msg"=>"Profil Berhasil Diupdate."));
	}else{
		echo json_encode(array("result"=>true,"msg"=>"Update Profil Gagal, DBERROR"));
	}
	
}

?>