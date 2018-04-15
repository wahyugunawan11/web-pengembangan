@extends('layouts.adminlayout')
@section('title')
<title>Skim Penelitian | Administrator | Pangkalan Data Penelitian</title>
@stop
@section('style')
<!-- Bootstrap 3.3.4 -->
{{HTML::style('AdminLTE-2.1.1/bootstrap/css/bootstrap.min.css')}}
<!-- FontAwesome 4.3.0 -->
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<!-- Ionicons 2.0.0 -->
{{HTML::style('AdminLTE-2.1.1/ionicons.min.css')}}
<!-- DATA TABLES -->
{{HTML::style('AdminLTE-2.1.1/plugins/datatables/dataTables.bootstrap.css')}}
<!-- Theme style -->
{{HTML::style('AdminLTE-2.1.1/dist/css/AdminLTE.min.css')}}
<!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
{{HTML::style('AdminLTE-2.1.1/dist/css/skins/_all-skins.min.css')}}
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
@stop
@section('include')
<script type="text/javascript">
function hapusskim(idskimpenelitian){
	var hasil = confirm('Mau hapus?');
	if(hasil==true){
		window.location.href="proses_hapusskim/"+idskimpenelitian;
	}
}
</script>
@stop

@section('sidebar')
<li class="">
	<a href="{{URL::to('/adminhome')}}">
		<i class="fa fa-home"></i> <span>Beranda</span>
	</a>
</li>
<li class="treeview">
	<a href="#">
		<i class="fa fa-database"></i>
		<span>Manajemen bidang ilmu</span>
        <i class="fa fa-angle-left pull-right"></i>
	</a>
    <ul class="treeview-menu">
        <li class="active"><a href="{{URL::to('/adminfield')}}"><i class="fa fa-circle-o"></i> Lihat data</a></li>
        <li><a href="{{URL::to('/admin_addfield')}}"><i class="fa fa-circle-o"></i> Tambah data</a></li>
    </ul>
</li>
<li class="treeview">
	<a href="#">
		<i class="fa fa-database"></i>
		<span>Manajemen fakultas</span>
		<i class="fa fa-angle-left pull-right"></i>
	</a>
	<ul class="treeview-menu">
        <li class="active"><a href="{{URL::to('/adminfaculty')}}"><i class="fa fa-circle-o"></i> Lihat data</a></li>
        <li><a href="{{URL::to('/admin_addfaculty')}}"><i class="fa fa-circle-o"></i> Tambah data</a></li>
    </ul>
</li>
<li class="treeview">
	<a href="#">
		<i class="fa fa-database"></i>
		<span>Manajemen penelitian</span>
		<i class="fa fa-angle-left pull-right"></i>
	</a>
	<ul class="treeview-menu">
		<li>
			<a href="#"><i class="fa fa-circle-o"></i> Proposal <i class="fa fa-angle-left pull-right"></i></a>
			<ul class="treeview-menu">
				<li><a href="{{URL::to('/adminproposal')}}"><i class="fa fa-circle-o"></i> Lihat data</a></li>
				<li><a href="{{URL::to('/admin_addproposal')}}"><i class="fa fa-circle-o"></i> Tambah data</a></li>
			</ul>
		</li>
		<li>
			<a href="#"><i class="fa fa-circle-o"></i> Laporan kemajuan <i class="fa fa-angle-left pull-right"></i></a>
			<ul class="treeview-menu">
				<li><a href="{{URL::to('/adminprogress')}}"><i class="fa fa-circle-o"></i> Lihat data</a></li>
				<li><a href="{{URL::to('/admin_addprogress')}}"><i class="fa fa-circle-o"></i> Tambah data</a></li>
			</ul>
		</li>
		<li>
			<a href="#"><i class="fa fa-circle-o"></i> Laporan akhir <i class="fa fa-angle-left pull-right"></i></a>
			<ul class="treeview-menu">
				<li><a href="{{URL::to('/adminfinal')}}"><i class="fa fa-circle-o"></i> Lihat data</a></li>
				<li><a href="{{URL::to('/admin_addfinal')}}"><i class="fa fa-circle-o"></i> Tambah data</a></li>
			</ul>
		</li>
	</ul>
</li>
<li class="treeview">
	<a href="#">
		<i class="fa fa-database"></i>
		<span>Manajemen PKM</span>
		<i class="fa fa-angle-left pull-right"></i>
	</a>
	<ul class="treeview-menu">
		<li>
			<a href="#"><i class="fa fa-circle-o"></i> Proposal <i class="fa fa-angle-left pull-right"></i></a>
			<ul class="treeview-menu">
				<li><a href="{{URL::to('/adminpkmproposal')}}"><i class="fa fa-circle-o"></i> Lihat data</a></li>
				<li><a href="{{URL::to('/admin_apkmproposal')}}"><i class="fa fa-circle-o"></i> Tambah data</a></li>
			</ul>
		</li>
		<li>
			<a href="#"><i class="fa fa-circle-o"></i> Laporan kemajuan <i class="fa fa-angle-left pull-right"></i></a>
			<ul class="treeview-menu">
				<li><a href="{{URL::to('/adminpkmprogress')}}"><i class="fa fa-circle-o"></i> Lihat data</a></li>
				<li><a href="{{URL::to('/admin_apkmprogress')}}"><i class="fa fa-circle-o"></i> Tambah data</a></li>
			</ul>
		</li>
		<li>
			<a href="#"><i class="fa fa-circle-o"></i> Laporan akhir <i class="fa fa-angle-left pull-right"></i></a>
			<ul class="treeview-menu">
				<li><a href="{{URL::to('/adminpkmfinal')}}"><i class="fa fa-circle-o"></i> Lihat data</a></li>
				<li><a href="{{URL::to('/admin_apkmfinal')}}"><i class="fa fa-circle-o"></i> Tambah data</a></li>
			</ul>
		</li>
	</ul>
</li>
<li class="treeview">
	<a href="#">
		<i class="fa fa-database"></i>
		<span>Manajemen dosen</span>
		<i class="fa fa-angle-left pull-right"></i>
	</a>
	<ul class="treeview-menu">
        <li class="active"><a href="{{URL::to('/adminlecturer')}}"><i class="fa fa-circle-o"></i> Lihat data</a></li>
        <li><a href="{{URL::to('/admin_addlecturer')}}"><i class="fa fa-circle-o"></i> Tambah data</a></li>
    </ul>
</li>
<li class="treeview active">
	<a href="#">
		<i class="fa fa-database"></i>
		<span>Manajemen skim penelitian</span>
		<i class="fa fa-angle-left pull-right"></i>
	</a>
	<ul class="treeview-menu">
        <li class="active"><a href="{{URL::to('/adminskim')}}"><i class="fa fa-circle-o"></i> Lihat data</a></li>
        <li><a href="{{URL::to('/admin_addskim')}}"><i class="fa fa-circle-o"></i> Tambah data</a></li>
    </ul>
</li>
<li class="">
	<a href="{{URL::to('/adminhistory')}}">
		<i class="fa fa-database"></i>
		<span>Lihat histori</span>
	</a>
</li>
<li class="treeview">
	<a href="#">
		<i class="fa fa-database"></i>
		<span>Manajemen program studi</span>
		<i class="fa fa-angle-left pull-right"></i>
	</a>
	<ul class="treeview-menu">
        <li><a href="{{URL::to('/adminprogram')}}"><i class="fa fa-circle-o"></i> Lihat data</a></li>
        <li><a href="{{URL::to('/admin_addprogram')}}"><i class="fa fa-circle-o"></i> Tambah data</a></li>
    </ul>
</li>
<li class="treeview">
	<a href="#">
		<i class="fa fa-database"></i>
		<span>Manajemen File</span>
		<i class="fa fa-angle-left pull-right"></i>
	</a>
	<ul class="treeview-menu">
        <li><a href="{{URL::to('/adminfile')}}"><i class="fa fa-circle-o"></i> Lihat data</a></li>
        <li><a href="{{URL::to('/admin_addfile')}}"><i class="fa fa-circle-o"></i> Tambah data</a></li>
    </ul>
</li>
<li class="">
	<a href="{{URL::to('/adminmessage')}}">
		<i class="fa fa-database"></i>
		<span>Manajemen pesan/saran</span>
	</a>
</li>
<li class="">
    <a href="{{URL::to('/admin_researchact')}}">
        <i class="fa fa-database"></i>
        <span>LAP Dosen</span>
    </a>
</li>
@stop

@section('content')
<h1>
	Skim Penelitian
	<small>Halaman administrator</small>
</h1>
<ol class="breadcrumb">
	<li><a href="{{URL::to('/adminhome')}}"><i class="fa fa-dashboard"></i> Beranda</a></li>
    <li><a href="#">Manajemen skim penelitian</a></li>
	<li class="active">Lihat data</li>
</ol>
@stop
@section('inner')
<div class="col-xs-12">
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Data</h3>
		</div><!-- /.box-header -->
		<div class="box-body">
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No.</th>
						<th>Skim</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php
                        $i = 1;
                    ?>
					@foreach ($skimpenelitian as $index => $skimpenelitian2)
					<tr>
						<td>{{$i++}}</td>
						<td>{{$skimpenelitian2->skim}}</td>
						<td><a href="{{URL::to('/admin_editskim/'.$skimpenelitian2->idskimpenelitian)}}">Ubah</a> | <button class="btn btn-danger"><a onclick="hapusskim({{$skimpenelitian2->idskimpenelitian}})">Hapus</button></td>
					</tr>
					@endforeach
				</tbody>
				<tfoot>
					<tr>
						<th>No.</th>
						<th>Skim</th>
						<th></th>
					</tr>
				</tfoot>
            </table>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
</div><!-- /.col -->
@stop

@section('bagianjs')
<!-- jQuery 2.1.4 -->
{{HTML::script('/AdminLTE-2.1.1/plugins/jQuery/jQuery-2.1.4.min.js')}}
<!-- Bootstrap 3.3.2 JS -->
{{HTML::script('/AdminLTE-2.1.1/bootstrap/js/bootstrap.min.js')}}
<!-- DATA TABES SCRIPT -->
{{HTML::script('/AdminLTE-2.1.1/plugins/datatables/jquery.dataTables.min.js')}}
{{HTML::script('/AdminLTE-2.1.1/plugins/datatables/dataTables.bootstrap.min.js')}}
<!-- Slimscroll -->
{{HTML::script('/AdminLTE-2.1.1/plugins/slimScroll/jquery.slimscroll.min.js')}}
<!-- FastClick -->
{{HTML::script('/AdminLTE-2.1.1/plugins/fastclick/fastclick.min.js')}}
<!-- AdminLTE App -->
{{HTML::script('/AdminLTE-2.1.1/dist/js/app.min.js')}}
<!-- AdminLTE for demo purposes -->
{{HTML::script('/AdminLTE-2.1.1/dist/js/demo.js')}}
@stop
@section('include2')
<!-- page script -->
<script type="text/javascript">
$(function () {
	$("#example1").dataTable({
		"scrollX": true
	});
	$('#example2').dataTable({
		"bPaginate": true,
		"bLengthChange": false,
		"bFilter": false,
		"bSort": true,
		"bInfo": true,
		"bAutoWidth": false
	});
});
</script>
<script>
$(document).ready(function(){
	@if(isset($message))
	alert('{{$message}}');
	@endif
})
</script>
@stop