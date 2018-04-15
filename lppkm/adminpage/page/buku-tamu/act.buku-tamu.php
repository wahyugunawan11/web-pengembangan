<?php
session_start();
if($_POST){
	include ("../../../inc/helper.php");
	include ("../../../inc/konfigurasi.php");
	include ("../../../inc/db.pdo.class.php");

	$db=new dB($dbsetting);

	// print_r($_POST);
	// exit;
	switch($_POST['act']){
		case 'lihatkomentar':
		$idkom=$_POST['komentar'];
		if(ctype_digit($idkom)){
			$lihat="SELECT tk.id, tk.nama_lengkap, tk.komentar,tk.email, tk.tgl, tk.waktu, tk.publish, tk.baca 
			FROM tb_komentar tk WHERE tk.jenis='BT' AND tk.id='$idkom' LIMIT 1";
			$db->runQuery($lihat);
			if($db->dbRows()>0){
				$r=$db->dbFetch();
				echo json_encode(array(
					"result"=>true,
					"idkom"=>$r['id'],
					"nama_lengkap"=>$r['nama_lengkap'],
					"email"=>$r['email'],
					"publish"=>$r['publish'],
					"komentar"=>$r['komentar'],
					"tgl"=>tanggalIndo($r['tgl'],'j F Y')." ".$r['waktu']
					));
				$db->runQuery("UPDATE tb_komentar SET baca='Y' WHERE id='$idkom' AND jenis='BT'");
			}else{
				echo json_encode(array("result"=>false,"msg"=>"Komentar tidak ditemukan"));
			}
		}
		break;

		case 'hapuskomentar':
		$idkom=$_POST['idkom'];
		if(ctype_digit($idkom)){
			$hapus="DELETE FROM tb_komentar WHERE id='$idkom' AND jenis='BT'";
			if($db->runQuery($hapus)){
				echo json_encode(array("result"=>true,"msg"=>"Komentar telah dihapus."));
			}else{
				echo json_encode(array("result"=>false,"msg"=>"Aksi Gagal, DBerror."));
			}
		}
		break;

		case 'acceptkomentar':
		$idkom=$_POST['idkom'];
		if(ctype_digit($idkom)){
			$acc="UPDATE tb_komentar SET publish='Y' WHERE id='$idkom' AND jenis='BT'";
			if($db->runQuery($acc)){
				echo json_encode(array("result"=>true,"msg"=>"Komentar dipublikasikan."));
			}else{
				echo json_encode(array("result"=>false,"msg"=>"Aksi Gagal, DBerror."));
			}
		}
		break;

		case 'declinekomentar':
		$idkom=$_POST['idkom'];
		if(ctype_digit($idkom)){
			$dec="UPDATE tb_komentar SET publish='N' WHERE id='$idkom' AND jenis='BT'";
			if($db->runQuery($dec)){
				echo json_encode(array("result"=>true,"msg"=>"Komentar tidak dipublikasikan."));
			}else{
				echo json_encode(array("result"=>false,"msg"=>"Aksi Gagal, DBerror."));
			}
		}
		break;
	}
	
}
?>