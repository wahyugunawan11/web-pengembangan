<?php 
session_start();
if(!$_SESSION['login-d56b699830']){
	header('location:login.php');
}
include ("../inc/helper.php");
include ("../inc/konfigurasi.php");
include ("../inc/db.pdo.class.php");
?>
<!DOCTYPE html>
<!-- Template Name: Clip-One - Responsive Admin Template build with Twitter Bootstrap 3 Version: 1.0 Author: ClipTheme -->
<!--[if IE 8]><html class="ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9 no-js" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
	<!--<![endif]-->
	<!-- start: HEAD -->
	<head>
		<title>HALAMAN OPERATOR/KA.LPPKM</title>
		<!-- start: META -->
		<meta charset="utf-8" />
		<!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta content="" name="description" />
		<meta content="" name="author" />
		<!-- end: META -->
		<!-- start: MAIN CSS -->
		<link href="assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/fonts/style.css">
		<link rel="stylesheet" href="assets/css/main.css">
		<link rel="stylesheet" href="assets/css/main-responsive.css">
		<link rel="stylesheet" href="assets/plugins/iCheck/skins/all.css">
		<link rel="stylesheet" href="assets/plugins/perfect-scrollbar/src/perfect-scrollbar.css">
		<link rel="stylesheet" href="assets/css/theme_light.css" id="skin_color">
		<!--[if IE 7]>
		<link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome-ie7.min.css">
		<![endif]-->
		<!-- end: MAIN CSS -->
		<link rel="shortcut icon" href="../images/logountan.png">

	</head>
	<!-- end: HEAD -->
	<!-- start: BODY -->
	<body class="layout-boxed layout-boxed">
		<!-- start: HEADER -->
		<?php require ("_header.php");?>
		<!-- end: HEADER -->
		<!-- start: MAIN CONTAINER -->
		<div class="main-container">
			<?php require("_navbar.php");?>
			<!-- start: PAGE -->
			<div class="main-content">
				<!-- start: PANEL CONFIGURATION MODAL FORM -->
				<!-- <div class="modal fade" id="panel-config" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
									&times;
								</button>
								<h4 class="modal-title">Panel Configuration</h4>
							</div>
							<div class="modal-body">
								Here will be a configuration form
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">
									Close
								</button>
								<button type="button" class="btn btn-primary">
									Save changes
								</button>
							</div>
						</div>
					</div>
				</div> -->
				<!-- /.modal -->
				<!-- end: SPANEL CONFIGURATION MODAL FORM -->
				<div class="container">
					<!-- start: PAGE HEADER -->
					<?php
					switch ($_GET['page']){
						default:
							include "page/dashboard/dashboard.php";
						break;

						case 'pengaturan':
							include "page/pengaturan/pengaturan.php";
						break;
						
						case 'user':
							include "page/user/user.php";
						break;

						case 'profil':
							include "page/profil/profil.php";
						break;
						
						case 'buku-tamu':
							include "page/buku-tamu/buku-tamu.php";
						break;
						
						case 'surat-tugas':
							include "page/surat-tugas/surat-tugas.php";
						break;



						
					}
					?>
					<!-- end: PAGE CONTENT-->
				</div>
			</div>
			<!-- end: PAGE -->
		</div>
		<!-- end: MAIN CONTAINER -->
		<!-- start: FOOTER -->
		<div class="footer clearfix">
			<?php require "_footer.php";?>
		</div>
		<!-- end: FOOTER -->
		<div id="event-management" class="modal fade" tabindex="-1" data-width="760" style="display: none;">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
							&times;
						</button>
						<h4 class="modal-title">Event Management</h4>
					</div>
					<div class="modal-body"></div>
					<div class="modal-footer">
						<button type="button" data-dismiss="modal" class="btn btn-light-grey">
							Close
						</button>
						<button type="button" class="btn btn-danger remove-event no-display">
							<i class='icon-trash'></i> Delete Event
						</button>
						<button type='submit' class='btn btn-success save-event'>
							<i class='icon-ok'></i> Save
						</button>
					</div>
				</div>
			</div>
		</div>
		<!-- start: MAIN JAVASCRIPTS -->
		<!--[if lt IE 9]>
		<script src="assets/plugins/respond.min.js"></script>
		<script src="assets/plugins/excanvas.min.js"></script>
		<![endif]-->
		<script src="../js/jquery-1.8.3.min.js"></script>
		<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->
		<script src="assets/plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js"></script>
		<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
		<script src="assets/plugins/blockUI/jquery.blockUI.js"></script>
		<script src="assets/plugins/iCheck/jquery.icheck.min.js"></script>
		<script src="assets/plugins/perfect-scrollbar/src/jquery.mousewheel.js"></script>
		<script src="assets/plugins/perfect-scrollbar/src/perfect-scrollbar.js"></script>
		<script src="assets/js/main.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$("#btnLogout").click(function(){
					if(confirm("Keluar dari Halaman Data Management ??")){
						$.ajax({
							url:'act.auth.php',
							cache:false,
							type:'post',
							data:'act=logout',
							dataType:'json',
							success:function(json){
								if(json.result){
									location.href='<?php echo DOMAIN_UTAMA;?>';
								}
							}
						});
					}
					return false;
				});
			});
		</script>
		<!-- end: MAIN JAVASCRIPTS -->
		
	<?php
	switch ($_GET['page']){
		default:
			include "assets/js/_dashboard.php";
		break;

		case 'profil':
			include "assets/js/_profil.php";
		break;
		
		case 'berita':
			include "assets/js/_berita.php";
		break;

		case 'agenda':
			include "assets/js/_agenda.php";
		break;

		case 'pengumuman':
			include "assets/js/_pengumuman.php";
		break;

		case 'galeri':
			include "assets/js/_galeri.php";
		break;

		case 'dokumen':
			include "assets/js/_dokumen.php";
		break;

		case 'buku-tamu':
			include "assets/js/_buku-tamu.php";
		break;

		case 'user':
			include "assets/js/_user.php";
		break;

		case 'pengaturan':
			include "assets/js/_pengaturan.php";
		break;

		case 'pengaduan':
			include "assets/js/_pengaduan.php";
		break;

		case 'monev':
			include "assets/js/_monev.php";
		break;

		case 'data-statistik':
			include "assets/js/_data-statistik.php";
		break;

		
	}
	?>
	</body>
	<!-- end: BODY -->
</html>