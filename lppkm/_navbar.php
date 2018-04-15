<nav id="main-nav">
	
	<ul id="main-menu" class="clearfix">
		<li <?php echo ($_GET['page']=='')?'class="current-menu-item"':'';?> ><a href="<?php echo DOMAIN_UTAMA;?>">BERANDA</a><span></span></li>
		<li <?php echo ($_GET['page']=='profil')?'class="current-menu-item"':'';?> ><a href="<?php echo DOMAIN_UTAMA;?>/?page=profil">PROFIL</a><span></span></li>
		<li <?php echo ($_GET['page']=='buku-tamu')?'class="current-menu-item"':'';?> ><a href="<?php echo DOMAIN_UTAMA;?>/?page=buku-tamu">BUKU TAMU</a><span></span></li>
		
		<!-- ini adalah fitur baru untuk pengajuan surat tugas -->
		<li <?php echo ($_GET['page']=='surat-tugas')?'class="current-menu-item"':'';?> ><a href="<?php echo DOMAIN_UTAMA;?>/?page=surat-tugas">PENGAJUAN SURAT TUGAS</a><span></span></li>
		
		<li <?php echo ($_GET['page']=='link')?'class="current-menu-item"':'';?> ><a href="http://simlitabmas.ristekdikti.go.id" target="_blank">SIMLITABMAS</a><span></span></li>
		<li <?php echo ($_GET['page']=='link')?'class="current-menu-item"':'';?> ><a href="http://lppkm.untan.ac.id/edata/home" target="_blank">PANGKALAN DATA</a><span></span></li>
	
				
	</ul>	
	
</nav>