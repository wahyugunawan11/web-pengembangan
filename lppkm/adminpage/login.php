<!DOCTYPE html>
<!-- Template Name: Clip-One - Responsive Admin Template build with Twitter Bootstrap 3 Version: 1.0 Author: ClipTheme -->
<!--[if IE 8]><html class="ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9 no-js" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
	<!--<![endif]-->
	<!-- start: HEAD -->
	<head>
		<title>LOGIN</title>
		<!-- start: META -->
		<meta charset="utf-8" />
		<!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta content="" name="Halaman Login" />
		<meta content="" name="BAppeda Kabupaten Sambas" />
		<!-- end: META -->
		<!-- start: MAIN CSS -->
		<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/fonts/style.css">
		<link rel="stylesheet" href="assets/css/main.css">
		
		<link rel="shortcut icon" href="../images/logountan.png">
		<!--[if IE 7]>
		<link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome-ie7.min.css">
		<![endif]-->
		<!-- end: MAIN CSS -->
		<!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
		<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
	</head>
	<!-- end: HEAD -->
	<!-- start: BODY -->
	<body class="login example2">
		<div class="main-login col-sm-4 col-sm-offset-4">
			<div class="logo">WEBSITE LPPKM UNIVERSITAS TANJUNGPURA</div>
			<!-- start: LOGIN BOX -->
			<div class="box-login">
				<h3><center>HALAMAN LOGIN</h3>
				<p>
					Silahkan masukkan <b>USERNAME</b> dan <b>PASSWORD</b> anda untuk masuk ke <b>Halaman Kelola Data</b>.
				</p>
				<form class="form-login" action="" method="POST">
					<input type="hidden" name="act" value="login" />
					<div class="errorHandler alert alert-danger no-display">
						<i class="icon-remove-sign"></i> Terdapat Kesalahan. Silakan periksa username dan password anda.
					</div>
					<fieldset>
						<div class="form-group">
							<span class="input-icon">
								<input type="text" class="form-control" name="username" placeholder="Username">
								<i class="icon-user"></i> </span>
						</div>
						<div class="form-group form-actions">
							<span class="input-icon">
								<input type="password" class="form-control password" name="password" placeholder="Password">
								<i class="icon-lock"></i>
						</div>
						<div class="form-actions">
							<!--<label for="remember" class="checkbox-inline">
								 <input type="checkbox" class="grey remember" id="remember" name="remember">
								Keep me signed in 
							</label>-->
							<button type="submit" class="btn btn-bricky pull-right">
								<span id="logintext">Masuk</span> <i class="icon-circle-arrow-right"></i>
							</button>
						</div>
					</fieldset>
				</form>
			</div>
			<!-- end: LOGIN BOX -->
			<!-- start: COPYRIGHT -->
			<div class="copyright">
				 Copyright&copy2016 LPPKM UNTAN
			</div>
			<!-- end: COPYRIGHT -->
		</div>
		<!-- start: MAIN JAVASCRIPTS -->
		<!--[if lt IE 9]>
		<script src="assets/plugins/respond.min.js"></script>
		<script src="assets/plugins/excanvas.min.js"></script>
		<![endif]-->
		<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->
		<script src="../js/jquery-1.8.3.min.js"></script>
		<!--<script src="assets/plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js"></script>-->
		<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
		<!--<script src="assets/plugins/blockUI/jquery.blockUI.js"></script>
		<script src="assets/plugins/iCheck/jquery.icheck.min.js"></script>
		<script src="assets/plugins/perfect-scrollbar/src/jquery.mousewheel.js"></script>
		<script src="assets/plugins/perfect-scrollbar/src/perfect-scrollbar.js"></script>
		<script src="assets/js/main.js"></script> -->
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="assets/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
		<script src="assets/js/login.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script>
			jQuery(document).ready(function() {
				//Main.init();
				Login.init();
			});
		</script>
	</body>
	<!-- end: BODY -->
</html>