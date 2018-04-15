	<div class="row-fluid">
		<div class="span12">
			<div class="breadcrumb clearfix">
				<span>You are here:</span>
				<a href="<?php echo DOMAIN_UTAMA;?>">Beranda</a>
				<span>/</span>
				<span class="current-page">Profil</span>
			</div>
		</div><!--span12-->
	</div><!--row-fluid-->
<div id="main-col">	
	<div class="entry-box clearfix">	
		<?php 
		$db->runQuery("SELECT * FROM tb_artikel WHERE kel_artikel='Pg'");
		if($db->dbRows()>0){
			$p=$db->dbFetch();
			?>
			<header>
				<h4 class="entry-title"><?php echo $p['judul'];?></h4>
			</header>
			<?php echo $p['isi'];
		}
		?>
	</div><!--entry-box-->
</div>


	
	<div class="clear"></div>