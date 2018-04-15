<?php
session_start();
if($_POST){
	include ("../../../inc/helper.php");
	include ("../../../inc/konfigurasi.php");
	include ("../../../inc/db.pdo.class.php");

	$db=new dB($dbsetting);

	switch($_POST['act']){
		case 'insert':
		$password=md5($_POST['pwd']);
		$level="";

		if($_POST['hak_berita']){ $level.="9"; }else{ $level.="1";}
		if($_POST['hak_agenda']){ $level.="9"; }else{ $level.="1";}
		if($_POST['hak_pengumuman']){ $level.="9"; }else{ $level.="1";}
		if($_POST['hak_repositori']){ $level.="9"; }else{ $level.="1";}
		if($_POST['hak_galeri']){ $level.="9"; }else{ $level.="1";}
		if($_POST['hak_su']){ $level="999991"; }else{ $level.="0";}
		
		if($_POST['hak_guest']){
			if($level=="111110"){
				$level="555555";
			}else{
				echo json_encode(array("result"=>false,"msg"=>"User Guest/Pengunjung Tidak Dizinkan untuk Mendapatkan Hak Manajemen "));
				exit;
			}
		}

		$insert="INSERT INTO tb_user SET
		nama_lengkap='".$_POST['nama_lengkap']."',
		jabatan='".$_POST['jabatan']."',
		nip='".$_POST['nip']."',
		email='".$_POST['emailuser']."',
		username='".$_POST['username']."',
		pwd='".$password."',
		id_bidang='".$_POST['bidang']."',
		telp='".$_POST['telp']."',
		level='".$level."'
		";
		//echo $insert;
		if($db->runQuery($insert)){
			echo json_encode(array("result"=>true,"msg"=>"User berhasil ditambahkan."));
		}else{
			echo json_encode(array("result"=>false,"msg"=>"Aksi Gagal DBERROR."));
		}
		break;

		case 'update':
		$id=$_POST['id'];
		if(ctype_digit($id)){
			$level="";
			if($_POST['hak_berita']){ $level.="9"; }else{ $level.="1";}
			if($_POST['hak_agenda']){ $level.="9"; }else{ $level.="1";}
			if($_POST['hak_pengumuman']){ $level.="9"; }else{ $level.="1";}
			if($_POST['hak_repositori']){ $level.="9"; }else{ $level.="1";}
			if($_POST['hak_galeri']){ $level.="9"; }else{ $level.="1";}
			if($_POST['hak_su']){ $level="999991"; }else{ $level.="0";}

			if($_POST['hak_guest']){
				if($level=="111110"){
					$level="555555";
				}else{
					echo json_encode(array("result"=>false,"msg"=>"User Guest/Pengunjung Tidak Dizinkan untuk Mendapatkan Hak Manajemen "));
					exit;
				}
			}
			
			if($_POST['reset_pwd']=='yes'){
				$password="pwd='".md5($_POST['username']."12345")."',";
			}else{
				$password="";
			}	

			$update="UPDATE tb_user SET
			nama_lengkap='".$_POST['nama_lengkap']."',
			jabatan='".$_POST['jabatan']."',
			nip='".$_POST['nip']."',
			email='".$_POST['emailuser']."',
			id_bidang='".$_POST['bidang']."',
			$password
			telp='".$_POST['telp']."',
			level='".$level."'
			WHERE id='$id'";	
			//echo $update;
			if($db->runQuery($update)){
				echo json_encode(array("result"=>true,"msg"=>"Data user telah diupdate."));
			}else{
				echo json_encode(array("result"=>false,"msg"=>"Aksi update Gagal DBERROR."));
			}
		}
		break;

		case 'updatemyprofile':
			$id=$_POST['id'];
			if($_POST['pwd']!=""){
				$pwd_lama=md5($_POST['pwd_lama']);
				$check="SELECT id FROM tb_user WHERE id='$id' AND pwd='$pwd_lama' LIMIT 1";
				//echo $check;
				$db->runQuery($check);
				if($db->dbRows()>0){
					$password="pwd='".md5($_POST['pwd'])."',";
				}else{
					echo json_encode(array("result"=>false,"msg"=>"Password lama anda tidak cocok, silakan masukkan password dengan benar untuk mengganti password."));
					exit;
				}
			}else{
				$password="";
			}
			$queryUpdate="UPDATE tb_user SET
			nama_lengkap='".$_POST['nama_lengkap']."',
			jabatan='".$_POST['jabatan']."',
			nip='".$_POST['nip']."',
			email='".$_POST['emailuser']."',
			$password
			telp='".$_POST['telp']."'
			WHERE id='$id'
			";
			//echo $queryUpdate;
			if($db->runQuery($queryUpdate)){
				echo json_encode(array("result"=>true,"msg"=>"Profil telah diupdate."));
			}else{
				echo json_encode(array("result"=>false,"msg"=>"Profil gagal diupdate DBERROR."));
			}
		break;

		case 'hapususer':
		$id=$_POST['id'];
		if(ctype_digit($id)){
			$hapus="DELETE FROM tb_user WHERE id='$id'";
			if($db->runQuery($hapus)){
				echo json_encode(array("result"=>true,"msg"=>"User telah dihapus."));
			}else{
				echo json_encode(array("result"=>true,"msg"=>"Aksi gagal DBERROR."));
			}
		}
		break;

		case 'aktifkanuser':
		$id=$_POST['id'];
		if(ctype_digit($id)){
			$aktifkan="UPDATE tb_user SET aktif='Y' WHERE id='$id'";
			if($db->runQuery($aktifkan)){
				echo json_encode(array("result"=>true,"msg"=>"User Aktif."));
			}else{
				echo json_encode(array("result"=>true,"msg"=>"Aksi gagal DBERROR."));
			}
		}
		break;

		case 'nonaktifkanuser':
		$id=$_POST['id'];
		if(ctype_digit($id)){
			$nonaktifkan="UPDATE tb_user SET aktif='N' WHERE id='$id'";
			if($db->runQuery($nonaktifkan)){
				echo json_encode(array("result"=>true,"msg"=>"User Non Aktif."));
			}else{
				echo json_encode(array("result"=>true,"msg"=>"Aksi gagal DBERROR."));
			}
		}
		break;
	}
}
?>