<?php
session_start();
if($_POST){
	include ("../../../inc/helper.php");
	include ("../../../inc/konfigurasi.php");
	include ("../../../inc/db.pdo.class.php");

	$db=new dB($dbsetting);

	switch($_POST['act']){
		case 'config':
		//update 26/8/2014
			$setting=$_POST['setting'];
			$judul=$setting[0];
			$subjudul=$setting[1];
			$teks=$setting[2];
			$csscolor=$setting[3];
			$welcome=$setting[4];
			if($welcome==""){
				echo json_encode(array("result"=>false,"msg"=>"Pesan Selamat Datang Harus diisi"));
				exit;
			}
			$db->runQuery("UPDATE web_setting SET val='$judul' WHERE id='1' AND name='web_title'");
			$db->runQuery("UPDATE web_setting SET val='$subjudul' WHERE id='2' AND name='web_sub_title'");
			$db->runQuery("UPDATE web_setting SET val='$welcome' WHERE id='3' AND name='web_welcome'");
			$db->runQuery("UPDATE web_setting SET val='$csscolor' WHERE id='4' AND name='web_theme_csscolor'");
			$db->runQuery("UPDATE web_setting SET val='$teks' WHERE id='5' AND name='teks_berjalan'");
			
			echo json_encode(array("result"=>true,"msg"=>"Pengaturan disimpan."));
		//update 26/8/2014
		break;

		case 'addlink':

			$x="SELECT max(`order`)+1 as neworder FROM tb_linkterkait";
			$db->runQuery($x);
			$r=$db->dbFetch();

			$insert="INSERT INTO tb_linkterkait SET
			nama='".$_POST['nama']."',
			url='".$_POST['url']."',
			`order`='".$r['neworder']."',
			publish='Y'
			";
			if($db->runQuery($insert)){
				echo json_encode(array("result"=>true,"msg"=>"Link Ditambahkan."));
			}else{
				echo json_encode(array("result"=>false,"msg"=>"Aksi Gagal, DBerror."));
			}
		break;

		case 'updatelink':
			$update="UPDATE tb_linkterkait SET
			nama='".$_POST['nama']."',
			url='".$_POST['url']."'
			WHERE id='".$_POST['id']."'
			";
			if($db->runQuery($update)){
				echo json_encode(array("result"=>true,"msg"=>"Update berhasil."));
			}else{
				echo json_encode(array("result"=>false,"msg"=>"Aksi Gagal, DBerror."));
			}
		break;

		case 'editlink':
			$id=$_POST['link'];
			if(ctype_digit($id)){
				$edit="SELECT * FROM tb_linkterkait WHERE id='$id' LIMIT 1";
				$db->runQuery($edit);
				if($db->dbRows()>0){
					$e=$db->dbFetch();
					echo json_encode(array("result"=>true,"msg"=>"Data ditemukan.","url"=>$e['url'],"nama"=>$e['nama'],"idlink"=>$e['id']));
				}else{
					echo json_encode(array("result"=>false,"msg"=>"Data tidak ditemukan."));
				}
			}
		break;

		case 'hapuslink':
			$id=$_POST['link'];
			if(ctype_digit($id)){
				$del="DELETE FROM tb_linkterkait WHERE id='$id'";
				if($db->runQuery($del)){
					echo json_encode(array("result"=>true,"msg"=>"Data telah dihapus."));
				}else{
					echo json_encode(array("result"=>false,"msg"=>"Aksi Gagal, DBerror."));
				}
			}
		break;

		case 'publish':
			$id=$_POST['link'];
			if(ctype_digit($id)){
				$publish="UPDATE tb_linkterkait SET publish='Y' WHERE id='$id'";
				if($db->runQuery($publish)){
					echo json_encode(array("result"=>true,"msg"=>"Link dipublikasikan."));
				}else{
					echo json_encode(array("result"=>false,"msg"=>"Aksi Gagal, DBerror."));
				}
			}
		break;

		case 'unpublish':
			$id=$_POST['link'];
			if(ctype_digit($id)){
				$unpublish="UPDATE tb_linkterkait SET publish='N' WHERE id='$id'";
				if($db->runQuery($unpublish)){
					echo json_encode(array("result"=>true,"msg"=>"Link disembunyikan."));
				}else{
					echo json_encode(array("result"=>false,"msg"=>"Aksi Gagal, DBerror."));
				}
			}
		break;

		case 'tambahbid':
			$nama=$_POST['nmBidang'];
			$insert="INSERT INTO tb_bidang SET nm_bidang='$nama'";
			if($db->runQuery($insert)){
				echo json_encode(array("result"=>true,"msg"=>"Bidang telah ditambahkan."));
			}else{
				echo json_encode(array("result"=>false,"msg"=>"Aksi tambah kategori gagal, DBerror."));
			}
		break;

		case 'updatebid':
			$id=$_POST['idbid'];
			$nm_bidang=$_POST['enmBidang'];
			if(ctype_digit($id)){
				$update="UPDATE tb_bidang SET nm_bidang='$nm_bidang' WHERE id='$id'";
				if($db->runQuery($update)){
					echo json_encode(array("result"=>true,"msg"=>"Bidang telah diupdate."));
				}else{
					echo json_encode(array("result"=>false,"msg"=>"Aksi gagal, DBerror."));
				}
			}
		break;

		case 'moveup':
			$id=$_POST['id'];
			if(ctype_digit($id)){
				$a="SELECT `order` FROM tb_linkterkait WHERE id='$id'";
				$db->runQuery($a);
				$aa=$db->dbFetch();
				$idawal=$id;
				$orderawal=$aa['order'];

				$b="SELECT id,`order` FROM tb_linkterkait WHERE `order`< (SELECT `order` FROM tb_linkterkait WHERE id='$id') ORDER BY `order` DESC LIMIT 1 ";
				$db->runQuery($b);
				$bb=$db->dbFetch();
				$idtujuan=$bb['id'];
				$ordertujuan=$bb['order'];

				$c="UPDATE tb_linkterkait SET `order`='$orderawal' WHERE id='$idtujuan'";
				//echo $c;
				if($db->runQuery($c)){
					$d="UPDATE tb_linkterkait SET `order`='$ordertujuan' WHERE id='$idawal'";
					//echo $d;
					if($db->runQuery($d)){
						echo json_encode(array("result"=>true,"msg"=>"Sukses"));
					}else{
						echo json_encode(array("result"=>false,"msg"=>"Gagal"));
					}
				}else{
					echo json_encode(array("result"=>false,"msg"=>"Gagal"));
				}
			}else{
				echo json_encode(array("result"=>false,"msg"=>"Cant Process Your Request"));
			}
		break;

		case 'movedown':
			$id=$_POST['id'];
			if(ctype_digit($id)){
				$a="SELECT `order` FROM tb_linkterkait WHERE id='$id'";
				$db->runQuery($a);
				$aa=$db->dbFetch();
				$idawal=$id;
				$orderawal=$aa['order'];

				$b="SELECT id,`order` FROM tb_linkterkait WHERE `order`> (SELECT `order` FROM tb_linkterkait WHERE id='$id') ORDER BY `order` ASC LIMIT 1 ";
				$db->runQuery($b);
				$bb=$db->dbFetch();
				$idtujuan=$bb['id'];
				$ordertujuan=$bb['order'];

				$c="UPDATE tb_linkterkait SET `order`='$orderawal' WHERE id='$idtujuan'";
				//echo $c;
				if($db->runQuery($c)){
					$d="UPDATE tb_linkterkait SET `order`='$ordertujuan' WHERE id='$idawal'";
					//echo $d;
					if($db->runQuery($d)){
						echo json_encode(array("result"=>true,"msg"=>"Sukses"));
					}else{
						echo json_encode(array("result"=>false,"msg"=>"Gagal"));
					}
				}else{
					echo json_encode(array("result"=>false,"msg"=>"Gagal"));
				}
			}else{
				echo json_encode(array("result"=>false,"msg"=>"Cant Process Your Request"));
			}
		break;

		case 'editbid':
			$id=$_POST['id'];
			if(ctype_digit($id)){
				$edit="SELECT * FROM tb_bidang WHERE id='$id' LIMIT 1";
				$db->runQuery($edit);
				if($db->dbRows()>0){
					$r=$db->dbFetch();
					$id=$r['id'];
					$nama=$r['nm_bidang'];
					echo json_encode(array("result"=>true,"nama"=>$nama,"idbid"=>$id));
				}else{
					echo json_encode(array("result"=>false,"msg"=>"Bidang tidak ditemukan"));
				}
			}
		break;

		case 'hapusbid':
			$id=$_POST['id'];
			if(ctype_digit($id)){
				$del="DELETE FROM tb_bidang WHERE id='$id'";
				if($db->runQuery($del)){
					echo json_encode(array("result"=>true,"msg"=>"Data telah dihapus."));
				}else{
					echo json_encode(array("result"=>false,"msg"=>"Aksi Gagal, DBerror."));
				}
			}
		break;
	}
}
?>