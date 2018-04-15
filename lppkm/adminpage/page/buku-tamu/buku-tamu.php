<?php $db=new dB($dbsetting); ?>
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
				<a href="<?php ECHO ADMIN_PAGE;?>dashboard.php?page=buku-tamu">
					Buku Tamu
				</a>
			</li>
			<li class="active">
				Buku Tamu
			</li>
			
		</ol>
		<div class="page-header">
			<h1>Buku Tamu<!--  <small>overview &amp; stats </small> --></h1>
		</div>
	</div>
</div>
<?php 
$query="SELECT COUNT(tk.id) as total FROM tb_komentar tk WHERE tk.jenis = 'BT' AND tk.publish='N' AND tk.baca='N'";
$db->runQuery($query);
if($db->dbRows()>0){
	$r=$db->dbFetch();
	$new=$r['total'];
	if($new>0){
	?>
	<div class="alert alert-warning">
		 <button data-dismiss="alert" class="close">&times;</button>
		<i class="icon-exclamation-sign"></i>
		<strong>Perhatian!</strong> Terdapat <?php echo $new;?> tamu yang belum dilihat dan diverifikasi.
	</div>
	<hr/>
	<?php
	} 
}
?>
<div class="row">
	<div class="col-sm-12">
		<div class="tabbable">
			<ul id="myTab" class="nav nav-tabs tab-bricky">
				<li class="active">
					<a href="#newkomentar" data-toggle="tab">
						<i class="green icon-comment"></i> Tamu Terbaru
						<?php echo ($new!=0)?'<span class="badge badge-danger">'.$new.'</span>':'';?>
					</a>
				</li>
				<li>
					<a href="#allkomentar" data-toggle="tab">
						<i class="icon-comments-alt"></i>Semua Tamu
					</a>
				</li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane in active" id="newkomentar">
					<table class="table table-striped table-bordered table-hover table-full-width" id="list-newkomentar">
						<thead>
							<tr>
								<th style="width:25%;text-align:center">Nama Lengkap</th>
								<th style="text-align:center">Tanggapan/Pesan/Saran/Kritik</th>
								<th style="width:20%;text-align:center">Tanggal</th>
								<th style="width:10%;text-align:center">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td colspan="4" class="dataTables_empty">Loading data from server</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="tab-pane" id="allkomentar">
					<table class="table table-striped table-bordered table-hover table-full-width" id="list-allkomentar">
						<thead>
							<tr>
								<th style="text-align:center">Nama Lengkap</th>
								<th style="text-align:center">Tanggapan/Pesan/Saran/Kritik</th>
								<th style="text-align:center">Tanggal</th>
								<th style="text-align:center">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td colspan="4" class="dataTables_empty">Loading data from server</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="komentar" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false" style="display: none;">
   	<form id="form-komentar" method="post">
	   	<div class="modal-header">
	        <h4 class="modal-title" id="myModalLabel">Isi Tanggapan/Pesan/Saran/Kritik</h4>
	    </div>
	  	<div class="modal-body">
	    
	    	<input type="hidden" name="idkom" id="idkom" value=""/>
	    	<table class="table">
	    		<tr>
	    			<td style="vertical-align:top;width:45px;">Oleh</td>
	    			<td style="vertical-align:top"><span id="nama_lengkap"></span></td>
	    		</tr>
	    		<tr>
	    			<td style="vertical-align:top;">Email</td>
	    			<td style="vertical-align:top"><span id="email"></span></td>
	    		</tr>
	    		<tr>
	    			<td style="vertical-align:top">Tanggapan/Pesan/Saran/Kritik</td>
	    			<td style="vertical-align:top"><div id="isikomentar"></div></td>
	    		</tr>
	    		<tr>
	    			<td style="vertical-align:top">Tanggal</td>
	    			<td style="vertical-align:top"><span id="tgl"></span></td>
	    		</tr>
	    	</table>
	 	</div>
	  	<div class="modal-footer">
	    	<button type="button" data-dismiss="modal" class="btn btn-default">Batal</button>
	    	<button type="submit" id="btnKomHapus"class="btn btn-bricky">Hapus</button>
	    	<button type="submit" id="btnKomAccept" class="btn btn-primary">Publikasikan</button>
	    	<button type="submit" id="btnKomDecline" style="display:none" class="btn btn-primary">Sembunyikan</button>
	  	</div>
  	</div>
  </form>
</div>