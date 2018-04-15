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
				<a href="<?php ECHO ADMIN_PAGE;?>dashboard.php?page=pengaturan&menu=link-terkait">
					Konfigurasi
				</a>
			</li>
			<li class="active">
				URL Terkait
			</li>
			
		</ol>
		<div class="page-header">
			<h1>URL Terkait<!--  <small>overview &amp; stats </small> --></h1>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<a href="#" id="Btntambahlinkterkait" class="btn btn-primary btn-sm"><i class="icon-plus"></i> Tambah URL</a><hr/>
		<!-- start: DYNAMIC TABLE PANEL -->
		<table class="table table-striped table-bordered table-hover table-full-width" id="list-daftarlinkterkait">
			<thead>
				<tr>
					<th style="text-align:center">Nama URL Terkait</th>
					<th style="width:20%;text-align:center">Alamat URL</th>
					<th style="width:10%;text-align:center">Aksi</th>
					<th style="width:10%;text-align:center"></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td colspan="4" class="dataTables_empty">Loading data from server</td>
				</tr>
			</tbody>
		</table>

		<!-- end: DYNAMIC TABLE PANEL -->
	</div>
</div>

<div id="tambahlinkterkait" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false" style="display: none;">
   	<form id="form-linkterkait" method="post">
	   	<div class="modal-header">
	        <h4 class="modal-title" id="myModalLabel">Tambah URL</h4>
	    </div>
	  	<div class="modal-body">
	    	<div class="form-group">
	    		<label>Nama URL Terkait</label>
	    		<input id="nama" type="text" class="form-control required" name="nama" title="Silakan masukkan nama website" />
	    	</div>
	    	<div class="form-group">
	    		<label>Alamat URL</label>
	    		<input id="url" type="text" class="form-control required" name="url" title="Silakan masukkan alamat/url website" />
	    	</div>
	 	</div>
	  	<div class="modal-footer">
	    	<button type="button" data-dismiss="modal" class="btn btn-default">Batal</button>
	    	<button type="submit" class="btn btn-primary">Simpan</button>
	  	</div>
  	</div>
  </form>
</div>
<div id="editlinkterkait" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false" style="display: none;">
   	<form id="eform-linkterkait" method="post">
	   	<div class="modal-header">
	        <h4 class="modal-title" id="myModalLabel">Edit URL Terkait</h4>
	    </div>
	  	<div class="modal-body">
	  		<input type="hidden" id="idlink" name="id" />
	    	<div class="form-group">
	    		<label>Nama URL</label>
	    		<input id="e_nama" type="text" class="form-control required" name="nama" title="Silakan masukkan nama website" />
	    	</div>
	    	<div class="form-group">
	    		<label>Alamat URL</label>
	    		<input id="e_url" type="text" class="form-control required" name="url" title="Silakan masukkan alamat/url website" />
	    	</div>
	 	</div>
	  	<div class="modal-footer">
	    	<button type="button" data-dismiss="modal" class="btn btn-default">Batal</button>
	    	<button type="submit" class="btn btn-primary">Update</button>
	  	</div>
  	</div>
  	 </form>
</div>