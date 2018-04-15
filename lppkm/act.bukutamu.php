<?php
session_start();
include "inc/helper.php";
include "inc/konfigurasi.php";
include "inc/db.pdo.class.php";

$db=new dB($dbsetting);

// Clean up the input values
foreach($_POST as $key => $value) {
	if(ini_get('magic_quotes_gpc'))
		$_POST[$key] = stripslashes($_POST[$key]);
	
	$_POST[$key] = htmlspecialchars(strip_tags($_POST[$key]));
}

// Assign the input values to variables for easy reference
$in_captcha=$_POST['captcha'];
$name = $_POST["name"];
$email = $_POST["email"];
$message = $_POST["message"];
$temp_msg = "
Message: ".$message;
$id_konten=$_POST['id_konten'];
$ip=get_client_ip();
// Test input values for errors
$errors = array();
if(strlen($name) < 3) {
	if(!$name) {
		$errors[] = "Anda harus mengisikan nama anda";
	} else {
		$errors[] = "Panjang nama minimal 3 karakter";
	}
}
if(strlen($in_captcha) < 6) {
	if(!$in_captcha) {
		$errors[] = "Isikan captcha.";
	} else {
		$errors[] = "Kode Captcha ada 6 karakter.";
	}
}
if($in_captcha!=$_SESSION['cap_code']){
	$errors[] = "Kode Captcha tidak sesuai.";
}
if(!$email) {
	$errors[] = "Anda harus mengisikan email.";
} else if(!validEmail($email)) {
	$errors[] = "Email anda harus valid.";
}
if(strlen($message) < 12) {
	if(!$message) {
		$errors[] = "Tuliskan pesan/tanggapan/saran/kritik anda";
	} else {
		$errors[] = "Panjang tulisan minimal 10 karakter.";
	}
}

if($errors) {
	// Output errors and die with a failure message
	$errortext = "";
	foreach($errors as $error) {
		$errortext .= "<li>".$error."</li>";
	}
	die("<div class='failure alert alert-error'>Terdapat kesalahan:<ul>". $errortext ."</ul></div>");
}

$insert="
INSERT INTO tb_komentar SET
jenis='BT',
nama_lengkap='$name',
email='$email',
ip_address='$ip',
komentar='$message',
tgl=NOW(),
waktu=NOW(),
baca='N',
publish='N'
";
// Die with a success message
if($db->runQuery($insert)){
die("<div class='alert alert-success'>Sukses! Pesan Anda telah dikirim, dan menunggu admin untuk persetujuan dari admin.</div><script>alert('Sukses! Pesan Anda telah dikirim, dan menunggu admin untuk persetujuan dari admin');location.reload();</script>");
}
// A function that checks to see if
// an email is valid
function validEmail($email)
{
	$isValid = true;
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$isValid = false;
	}else{
		$isValid = true;
	}
   return $isValid;
}

?>