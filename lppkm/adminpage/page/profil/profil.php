<?php $db=new dB($dbsetting); ?>
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
				Profil
			</li>
			<!-- <li class="search-box">
				<form class="sidebar-search">
					<div class="form-group">
						<input type="text" placeholder="Start Searching...">
						<button class="submit">
							<i class="clip-search-3"></i>
						</button>
					</div>
				</form>
			</li> -->
		</ol>
		<div class="page-header">
			<h1>Profil<!--  <small>overview &amp; stats </small> --></h1>
		</div>
		<!-- end: PAGE TITLE & BREADCRUMB -->
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<?php
		$profil="SELECT * FROM tb_artikel WHERE kel_artikel='pg'  LIMIT 1";
		$db->runQuery($profil);
		if($db->dbRows()>0){
			$r=$db->dbFetch();
		?>
			 <form id="profil" method="POST">
				<div class="form-group">
					<input type="text" name="profil_judul" class="form-control" value="<?php echo $r['judul'];?>"/>
				</div>
				<div class="form-group">
					<textarea class="ckeditor form-control" cols="10" rows="14" id="profil_edit" name="profil_edit">
						<?php echo $r['isi'];?>
					</textarea><br/>
					<button type="button" id="ProfilBtnSimpan" class="btn btn-primary">
						Simpan
					</button>
				</div>
			</form>
		<?php
		}
		?>
	</div>
</div>