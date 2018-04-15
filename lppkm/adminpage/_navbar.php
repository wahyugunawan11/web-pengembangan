<?php $db=new dB($dbsetting); 
$lvl=$_SESSION['login-d56b699830']['lvl'];
/*
berita substr($lvl,0,1)
agenda substr($lvl,1,1)
pengumuman substr($lvl,2,1)
repositori substr($lvl,3,1)
galeri substr($lvl,4,1)
*/
if($lvl!="555555"){
?>
<div class="navbar-content">
	<!-- start: SIDEBAR -->
	<div class="main-navigation navbar-collapse collapse">
		<!-- start: MAIN MENU TOGGLER BUTTON -->
		<div class="navigation-toggler">
			<i class="clip-chevron-left"></i>
			<i class="clip-chevron-right"></i>
		</div>
		<!-- end: MAIN MENU TOGGLER BUTTON -->
		<!-- start: MAIN NAVIGATION MENU -->
		<ul class="main-navigation-menu">
			<li <?php echo ($_GET['page']=="")?'class="active open"':'';?>>
				<a href="dashboard.php">
					<i class="clip-home-3"></i>
					<span class="title"> Dashboard </span><span class="selected"></span>
				</a>
			</li>
			<?php 
			if($lvl==999991){ 
			?>
			<li <?php echo ($_GET['page']=="pengaturan")?'class="active open"':'';?>>
				<a href="javascript:void(0)">
					<i class="clip-cogs"></i>
					<span class="title"> Pengaturan </span><i class="icon-arrow"></i><span class="selected"></span>
				</a>
				<ul class="sub-menu">
					<?php if(ADMIN_BID=='0'){ ?><li <?php echo ($_GET['page']=="pengaturan" AND $_GET['menu']=="web-setting")?'class="active open"':'';?> >
						<a href="?page=pengaturan&menu=web-setting">
							<span class="title"> Tema Konten</span>
						</a>
					</li>
					
					<?php } ?>
					
					<li <?php echo ($_GET['page']=="pengaturan" AND $_GET['menu']=="link-terkait")?'class="active open"':'';?> >
						<a href="?page=pengaturan&menu=link-terkait">
							<span class="title"> URL Terkait</span>
						</a>
					</li>
				</ul>
			</li>
			
			<li <?php echo ($_GET['page']=="user")?'class="active open"':'';?>>
				<a href="javascript:void(0)">
					<i class="clip-user-2"></i>
					<span class="title"> Manajemen Pengguna </span><i class="icon-arrow"></i><span class="selected"></span>
				</a>
				<ul class="sub-menu">
					<?php if($lvl==999991){?>
					<li <?php echo ($_GET['page']=="user" AND $_GET['menu']=="man-user")?'class="active open"':'';?>>
						<a href="?page=user&menu=man-user">
							<span class="title"> Akun Pengguna</span>
						</a>
					</li>
					<?php } ?>
					<li <?php echo ($_GET['page']=="user" AND $_GET['menu']=="my-profile")?'class="active open"':'';?>>
						<a href="?page=user&menu=my-profile">
							<span class="title"> Akun Saya </span>
						</a>
					</li>
				</ul>
			</li>
			
			<li <?php echo ($_GET['page']=="profil")?'class="active open"':'';?>>
				<a href="?page=profil">
					<i class="clip-file-2"></i>
					<span class="title"> Manajemen Profil </span><span class="selected"></span>
				</a>
			</li>
			
			<li <?php echo ($_GET['page']=="buku-tamu")?'class="active open"':'';?>>
				<a href="?page=buku-tamu">
					<i class="clip-file-2"></i>
					<span class="title"> Buku Tamu </span><span class="selected"></span>
				</a>
			</li>
			
			<li <?php echo ($_GET['page']=="surat-tugas")?'class="active open"':'';?>>
				<a href="?page=surat-tugas">
					<i class="clip-file-2"></i>
					<span class="title"> Surat Tugas</span><span class="selected"></span>
				</a>
			</li>
			<?php
			}		
						
								
			
			if(substr($lvl,0,1)==9){ 
			?>
			
			<?php
			}
			if(substr($lvl,1,1)==9){ 
			?>
			
			
			<?php 
			}
			
			if(substr($lvl,2,1)==9){ 
			?>
			
			<?php
			}	
			
			if(substr($lvl,3,1)==9){ 
			?>			
					
			<?php
			}	
			
			if(substr($lvl,4,1)==9){ 
			?>
			
			<?php
			}
					
			?>
		</ul>
		<!-- end: MAIN NAVIGATION MENU -->
	</div>
	<!-- end: SIDEBAR -->
</div>
<?php
}else{
?>
<div class="navbar-content">
	<!-- start: SIDEBAR -->
	<div class="main-navigation navbar-collapse collapse">
		<!-- start: MAIN MENU TOGGLER BUTTON -->
		<div class="navigation-toggler">
			<i class="clip-chevron-left"></i>
			<i class="clip-chevron-right"></i>
		</div>
		<!-- end: MAIN MENU TOGGLER BUTTON -->
		<!-- start: MAIN NAVIGATION MENU -->
		<ul class="main-navigation-menu">
			<li <?php echo ($_GET['page']=="")?'class="active open"':'';?>>
				<a href="dashboard.php">
					<i class="clip-home-3"></i>
					<span class="title"> Dashboard </span><span class="selected"></span>
				</a>
			</li>			
			
		<!-- end: MAIN NAVIGATION MENU -->
	</div>
	<!-- end: SIDEBAR -->
</div>
<?php	
}
?>