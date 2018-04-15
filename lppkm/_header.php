<header id="page-header">
	<div id="header-top" class="clearfix">		
		<div class="kp-headline-wrapper clearfix">
			<h6 class="kp-headline-title"><?php echo tanggalIndo(date('Y-m-d'),'l, j F Y');?><span></span></h6>	
		</div>
		<?php
			if($_GET['page']=='berita'){
				$formcari='';
				$login_pos='';
			}else if($_GET['page']=='agenda'){
				$formcari='';
				$login_pos='';
			}else if($_GET['page']=='pengumuman'){
				$formcari='';
				$login_pos='';
			}/*else if($_GET['page']=='repositori'){
				$formcari='';
				$login_pos='';
			}*/else{
				$formcari='style="display:none"';
				$login_pos='style="margin-right:0px;"';
			}
		?>
		<div class="social-search-box">
			<ul class="social-links clearfix" <?php echo $login_pos;?>>
				<li><a href="adminpage"><i class="icon-user"></i><?php echo ($_SESSION['login-d56b699830']==FALSE)?"LOGIN":"HALAMAN OPERATOR";?></a></li>
			</ul>
			<div class="sb-search-wrapper" <?php echo $formcari;?>>
				<div id="sb-search" class="sb-search">
					<form>
						<input type="hidden" name="page" value="<?php echo $_GET['page'];?>" />
						<input type="hidden" name="list" value="cari" />
						<input class="sb-search-input" placeholder="Masukkan Kata Kunci" type="text" value="" name="search" id="search">
						<input class="sb-search-submit" type="submit" value="">
						<span class="sb-icon-search"></span>
					</form>
				</div>
			</div>
		</div>                  
	</div>
	
	<div id="header-middle" class="clearfix">
	
		<div id="logo-image">
			<a href="<?php echo DOMAIN_UTAMA;?>">
				<img src="images/logountan.png" alt="" />
			</a>
		</div>
		
		<div class="top-banner">
			<h1><?php echo $web['web_title'];?></h1>
			<h3><?php echo $web['web_sub_title'];?></h3>
		</div>	
		
	</div>	
   <div id="header-bottom">
		<?php include "_navbar.php";?> 
   </div>

</header>