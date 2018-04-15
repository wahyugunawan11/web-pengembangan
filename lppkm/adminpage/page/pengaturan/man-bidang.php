<?php $db=new dB($dbsetting); ?>
<div class="row">
	<div class="col-sm-12">
		<ol class="breadcrumb">
			<li>
				<i class="clip-home-3"></i>
				<a href="<?php ECHO ADMIN_PAGE;?>">
					Home
				</a>
			</li>
			<li class="active">
				Manajemen Bidang
			</li>
			
		</ol>
		<div class="page-header">
			<h1>Manajemen Bidang<!--  <small>overview &amp; stats </small> --></h1>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<a href="#" id="Btntambahbidang" class="btn btn-primary btn-sm"><i class="icon-plus"></i> Tambah</a><hr/>
		<!-- start: DYNAMIC TABLE PANEL -->
		<table class="table table-striped table-bordered table-hover table-full-width" id="list-bidang">
			<thead>
				<tr>
					<th style="text-align:center">Nama Bidang</th>
					<th style="width:10%">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td colspan="2" class="dataTables_empty">Loading data from server</td>
				</tr>
			</tbody>
		</table>

		<!-- end: DYNAMIC TABLE PANEL -->
	</div>
</div>

<div id="tambahbidang" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false" style="display: none;">
   	<form id="form-bidang" method="post">
	   	<div class="modal-header">
	        <h4 class="modal-title" id="myModalLabel">Tambah Bidang</h4>
	    </div>
	  	<div class="modal-body">
	    	<div class="form-group">
	    	<label>Nama Bidang</label>
	    	: <input id="nmBidang" type="text" class="form-control required" name="nmBidang" title="Silakan masukkan nama bidang" />
	    	</div>
	 	</div>
	  	<div class="modal-footer">
	    	<button type="button" data-dismiss="modal" class="btn btn-default">Batal</button>
	    	<button type="submit" class="btn btn-primary">Simpan</button>
	  	</div>
  	</div>
  </form>
</div>
<div id="editbidang" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false" style="display: none;">
   	<form id="eform-bidang" method="post">
	   	<div class="modal-header">
	        <h4 class="modal-title" id="myModalLabel">Edit Bidang</h4>
	    </div>
	  	<div class="modal-body">
	    	<div class="form-group">
	    	<input type="hidden" id="idbid" name="idbid" />
	    	<label>Nama Bidang</label>
	    	: <input id="enmBidang" type="text" class="form-control required" name="enmBidang" title="Silakan masukkan nama bidang" />
	    	</div>
	 	</div>
	  	<div class="modal-footer">
	    	<button type="button" data-dismiss="modal" class="btn btn-default">Batal</button>
	    	<button type="submit" class="btn btn-primary">Update</button>
	  	</div>
  	</div>
  	 </form>
</div>