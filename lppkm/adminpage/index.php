<?php
session_start();
if(!$_SESSION['login-d56b699830']){
	header('location:login.php');
}else{
	header('location:dashboard.php');
}

?>