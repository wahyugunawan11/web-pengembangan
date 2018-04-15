<?php $db=new dB($dbsetting); 
$lvl=$_SESSION['login-d56b699830']['lvl'];
?>
<div class="row">
	<div class="col-sm-12">
		<!-- start: PAGE TITLE & BREADCRUMB -->
		<ol class="breadcrumb">
			<li>
				<i class="clip-home-3"></i>
				<a href="<?php ECHO ADMIN_PAGE;?>">
					Beranda
				</a>
			</li>
			<li class="active">
				Dashboard
			</li>
		</ol>
		<div class="page-header">
			<h1>Dashboard <!-- <small>overview &amp; stats </small> --></h1>
		</div>
		<!-- end: PAGE TITLE & BREADCRUMB -->
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<div class="well well-lg">
			<h4>Hallo, <?php echo $_SESSION['login-d56b699830']['nama_lengkap'];?></h4>
			<p>Selamat datang di Halaman Operator / Ka.LPPKM!!</p>
			<?php
			if($lvl!="555555"){
				?>
				<p>Halaman ini memungkinkan Operator mengelola data dan informasi yang akan di tampilkan pada Website LPPKM UNTAN</p>
				<p>Hak akses Anda terbatas pada MENU  pada sisi kiri halaman ini.</p>
				<p>Selamat bekerja.</p>
				<br>
				<p><b>Author</p>
				<?php 
			} 
			?>
		</div>
			
	
	</div>
</div>