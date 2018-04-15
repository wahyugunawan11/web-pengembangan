<?php $db=new dB($dbsetting); 

$db->runQuery("SELECT * FROM web_setting WHERE id IN(1,2,3,4,5)");
if($db->dbRows()>0){
    while($r=$db->dbFetch()){
        $web[$r['name']]=$r['val'];
    }
}

?>
<div class="row">
	<div class="col-sm-12">
		<ol class="breadcrumb">
			<li>
				<i class="clip-home-3"></i>
				<a href="<?php ECHO ADMIN_PAGE;?>">
					Beranda
				</a>
			</li>
			<li>
				<a href="<?php ECHO ADMIN_PAGE;?>dashboard.php?page=pengaturan&menu=web-setting">
					Konfigurasi
				</a>
			</li>
			<li class="active">
				Tema Konten
			</li>
			
		</ol>
		<div class="page-header">
			<h1>Tema Konten<!--  <small>overview &amp; stats </small> --></h1>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<form id="websetting" method="post">
			<input type="hidden" name="act" value="config"/>
			<div class="form-group">
				<label>Judul Konten</label>
				<input type="text" class="form-control required" title="Judul Website harus diisi" name="setting[]" value="<?php echo $web['web_title'];?>" />
			</div>
			<div class="form-group">
				<label>Sub Judul Konten</label>
				<input type="text" class="form-control" name="setting[]" value="<?php echo $web['web_sub_title'];?>" />
			</div>
			<!-- update 24 juni 2016 -->
			<div class="form-group">
				<label>Teks Berjalan</label>
				<input type="text" class="form-control" name="setting[]" value="<?php echo $web['teks_berjalan'];?>" />
			</div>
			<!-- update 26/8/2014 -->
			<div class="form-group">
				<label>Warna Tema<?php echo $web['web_theme_csscolor'];?></label>
				<select name="setting[]" class="form-control">
					<option <?php echo (($web['web_theme_csscolor']=='blue.css')?'selected':'');?> value="blue.css">Blue</option>
					<option <?php echo (($web['web_theme_csscolor']=='default.css')?'selected':'');?> value="default.css">Default (Red)</option>
					<option <?php echo (($web['web_theme_csscolor']=='coban.css')?'selected':'');?> value="coban.css">Coban</option>
					<option <?php echo (($web['web_theme_csscolor']=='gray.css')?'selected':'');?> value="gray.css">Gray</option>
					<option <?php echo (($web['web_theme_csscolor']=='navy.css')?'selected':'');?> value="navy.css">Navy</option>
					<option <?php echo (($web['web_theme_csscolor']=='yellow.css')?'selected':'');?> value="yellow.css">Yellow</option>
				</select>
			</div>
			<!-- update 26/8/2014 -->
			<div class="form-group">
				<label>Ucapan Selamat Datang</label>
				<textarea class="editor1" name="setting[]"><?php echo $web['web_welcome'];?></textarea>
			</div>
			<div class="form-group">
				<button class="btn btn-primary btn-sm"><i class="icon-save"></i> Simpan Konfigurasi</button>
				<span id="loading" style="display:none"><i class="clip-spin-alt icon-spin"></i><em> Loading..</em></span>
			</div>
		</form>
	</div>
</div>