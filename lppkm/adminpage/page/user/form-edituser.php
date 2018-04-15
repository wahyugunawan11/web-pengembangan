<?php
session_start();
include ("../../../inc/helper.php");
include ("../../../inc/konfigurasi.php");
include ("../../../inc/db.pdo.class.php");
if(ADMIN_LEVEL==999991){
	$db=new dB($dbsetting);
	$id=$_GET['user'];
	if(ctype_digit($id)){
		$query="SELECT * FROM tb_user WHERE id='$id' LIMIT 1";
		$db->runQuery($query);
		if($db->dbRows()>0){
		$e=$db->dbFetch();
	?>
		<input type="hidden" name="act" value="update"/>
		<input type="hidden" name="id" value="<?php echo $id;?>"/>
		<div class="form-group">
			<label class="col-sm-3">Nama Lengkap *</label>
			<div class="col-sm-8">
				<input type="text" name="nama_lengkap" value="<?php echo $e['nama_lengkap'];?>" class="form-control"/>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3">Jabatan</label>
			<div class="col-sm-8">
				<input type="text" name="jabatan" value="<?php echo $e['jabatan'];?>" class="form-control" />
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3">NIP</label>
			<div class="col-sm-8">
				<input type="text" name="nip" value="<?php echo $e['nip'];?>" class="form-control" />
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3">Email & No Telpon</label>
			<div class="col-sm-4">
				<input type="text" name="emailuser" name="emailuser" value="<?php echo $e['email'];?>" class="form-control" placeholder="Email"/>
			</div>
			<div class="col-sm-4">
				<input type="text" name="telp" value="<?php echo $e['telp'];?>" class="form-control" placeholder="No Telpon"/>
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
						if($bid['id']==$e['id_bidang']){
							echo "<option selected value='".$bid['id']."'>".$bid['nm_bidang']."</option>";
						}else{
							echo "<option value='".$bid['id']."'>".$bid['nm_bidang']."</option>";
						}
						
					}
				}
				?>
			</select>
		</div>
		<?php
		}else{
			echo '<input type="hidden" value="'.$e['id_bidang'].'" name="bidang" />';
		}
		?>
	</div>
		<div class="form-group">
			<label class="col-sm-3">Username</label>
			<div class="col-sm-8">
				<input type="text" name="username" readonly id="username" value="<?php echo $e['username'];?>" id="username" class="form-control" />
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3">Password</label>
			<div class="col-sm-8">
				<label class="checkbox-inline">
					<input type="checkbox" name="reset_pwd" value="yes" class="grey">
					Reset Password (<em>Password : [username]12345</em>)
				</label>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3">Hak Akses User</label>
			<div class="col-sm-8">
				<label class="checkbox-inline">
					<input type="checkbox" name="hak_berita" <?php echo(substr($e['level'],0,1)==9)?"checked":"";?> value="9" class="grey">
					Berita
				</label>
				<label class="checkbox-inline">
					<input type="checkbox" name="hak_agenda" <?php echo(substr($e['level'],1,1)==9)?"checked":"";?> value="9" class="grey">
					Agenda
				</label>
				<label class="checkbox-inline">
					<input type="checkbox" name="hak_pengumuman" <?php echo(substr($e['level'],2,1)==9)?"checked":"";?> value="9" class="grey">
					Pengumuman
				</label>
				<label class="checkbox-inline">
					<input type="checkbox" name="hak_repositori" <?php echo(substr($e['level'],3,1)==9)?"checked":"";?> value="9" class="grey">
					Dokumen
				</label>
				<label class="checkbox-inline">
					<input type="checkbox" name="hak_galeri" <?php echo(substr($e['level'],4,1)==9)?"checked":"";?> value="9" class="grey">
					Galeri
				</label>
				<!--label class="checkbox-inline">
					<input type="checkbox" name="hak_guest" <?php echo($e['level']==555555)?"checked":"";?> value="555555" class="grey">
					Guest
				</label-->
				<?php
				if(ADMIN_BID=='0'){
				?>
				<label class="checkbox-inline">
					<input type="checkbox" name="hak_su" <?php echo(substr($e['level'],5,1)==1)?"checked":"";?> value="1" class="grey">
					Super Admin
				</label>
				<?php
				}
				?>
			</div>
		</div>
	<?php
		}
	}
}
?>
