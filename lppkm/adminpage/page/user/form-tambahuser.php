<?php
session_start();
include ("../../../inc/helper.php");
include ("../../../inc/konfigurasi.php");
include ("../../../inc/db.pdo.class.php");
$db=new dB($dbsetting);
?>
	<input type="hidden" name="act" value="insert"/>
	<div class="form-group">
		<label class="col-sm-3">Nama Lengkap *</label>
		<div class="col-sm-8">
			<input type="text" name="nama_lengkap" class="form-control"/>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3">Jabatan</label>
		<div class="col-sm-8">
			<input type="text" name="jabatan" class="form-control" />
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3">NIP</label>
		<div class="col-sm-8">
			<input type="text" name="nip" class="form-control" />
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3">Email & No Telpon</label>
		<div class="col-sm-4">
			<input type="text" name="emailuser" name="emailuser" class="form-control" placeholder="Email"/>
		</div>
		<div class="col-sm-4">
			<input type="text" name="telp" class="form-control" placeholder="No Telpon"/>
		</div>
	</div>
	<?php
	if(ADMIN_BID=='0'){
	?>
	<div class="form-group">
		<label class="col-sm-3">Bidang</label>
		<div class="col-sm-8">
			<select name="bidang" class="form-control">
				<option value="0">Pilih Bidang</option>
				<?php
				$db->runQuery("SELECT * FROM tb_bidang");
				if($db->dbRows()>0){
					while($bid=$db->dbFetch()){
						echo "<option value='".$bid['id']."'>".$bid['nm_bidang']."</option>";
					}
				}
				?>
			</select>
		</div>
	</div>
	<?php 
	}else{
		echo '<input type="hidden" value="'.ADMIN_BID.'" name="bidang" />';
	}
	?>
	<div class="form-group">
		<label class="col-sm-3">Username</label>
		<div class="col-sm-8">
			<input type="text" name="username" id="username" class="form-control" />
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3">Password</label>
		<div class="col-sm-5">
			<input type="password" name="pwd" id="pwd" value="" class="form-control" />
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3">Hak Akses User</label>
		<div class="col-sm-8">
			<label class="checkbox-inline">
				<input type="checkbox" name="hak_repositori" value="9" class="grey">
				Dokumen
			</label>
			<label class="checkbox-inline">
				<input type="checkbox" name="hak_galeri" value="9" class="grey">
				Galeri
				</label>
			<label class="checkbox-inline">
				<input type="checkbox" name="hak_berita" value="9" class="grey">
				Berita
			</label>
			<label class="checkbox-inline">
				<input type="checkbox" name="hak_agenda" value="9" class="grey">
				Agenda
			</label>
			<label class="checkbox-inline">
				<input type="checkbox" name="hak_pengumuman" value="9" class="grey">
				Pengumuman
			</label>
			<!--label class="checkbox-inline">
				<input type="checkbox" name="hak_guest" value="555555" class="grey">
				Guest
			</label-->
			<?php
			if(ADMIN_BID=='0'){
			?>						
			<label class="checkbox-inline">
				<input type="checkbox" name="hak_su" value="1" class="grey">
				Super Admin
			</label>
			<?php } ?>
		</div>
	</div>