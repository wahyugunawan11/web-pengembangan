<?php
session_start();

include ("../inc/helper.php");
include ("../inc/konfigurasi.php");
include ("../inc/db.pdo.class.php");


//md5 login= d56b699830e77ba53855679cb1d252da
//require ("../inc/costum.class.php");
/*
Pendefinisian level user
user000 = super admin
user001 = admin berita 
user002 = admin agenda + upload galeri/gambar 
user003 = admin repositori
user004 = admin galeri

*/
$db=new dB($dbsetting);
if($_POST){

	switch ($_POST['act']) {
		case 'login':
			
			$username=$_POST['username'];
			$password=$_POST['password'];
			
			$check="SELECT id,id_bidang,username,pwd,`level`,nama_lengkap,jabatan 
			FROM tb_user WHERE username='$username' AND aktif='Y' LIMIT 1";
			$db->runQuery($check);
			
			if($db->dbRows()>0){
				$log=$db->dbFetch();
				if($log['pwd']==md5($password)){
					$sesilogin=array(
						"username"=>$log['username'],
						"lvl"=>$log['level'],
						"nama_lengkap"=>$log['nama_lengkap'],
						"id"=>$log['id'],
						"id_bid"=>$log['id_bidang'],
						"jabatan"=>$log['jabatan']
					);
					
					// switch ($log['level']) {
					// 	case 'user000':
					// 		DEFINE("ADMIN_LEVEL","SUPER_USER");
					// 	break;
					// 	case 'user001':
					// 		DEFINE("ADMIN_LEVEL","ADMIN_BERITA");
					// 	break;
					// 	case 'user002':
					// 		DEFINE("ADMIN_LEVEL","ADMIN_AGENDA");
					// 	break;
					// 	case 'user003':
					// 		DEFINE("ADMIN_LEVEL","ADMIN_REPOSITORI");
					// 	break;
					// 	case 'user004':
					// 		DEFINE("ADMIN_LEVEL","ADMIN_GALERI");
					// 	break;
					// }

					$_SESSION['login-d56b699830']=$sesilogin; 
					echo json_encode(
						array(
						"result" =>TRUE,
						"msg" =>"Login Sukses."
						));
				}else{
					//password salah
					echo json_encode(
						array(
						"result" =>FALSE,
						"msg" =>"Gagal Login, Password anda tidak sesuai/salah."
						));
				}
			}else{
				//username tidak terdaftar
				echo json_encode(array(
					"result" =>FALSE,
					"msg" =>"Gagal Login, Username Anda tidak terdaftar."
					));
			}
		break;
		case 'logout':
			unset($_SESSION['login-d56b699830']);
			DEFINE("ADMIN_LEVEL","");
			echo json_encode(array("result"=>true));
		break;
		
		/*default:
		break;*/
	}

	
}
// //optional
// if($_GET['act']=='logout'){
// 	unset($_SESSION['login-d56b699830']);
// 	DEFINE("ADMIN_LEVEL","");
// }

?>