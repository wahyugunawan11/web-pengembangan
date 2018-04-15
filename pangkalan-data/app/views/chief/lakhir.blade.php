@extends('layouts.layoutketua')
@section('title')
<title>Laporan Akhir | KaLemlit | Pangkalan Data Penelitian</title>
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

@section('sidebar')
<li>
	<a href="{{URL::to('/chiefhome')}}">
		<i class="fa fa-home"></i> <span>Beranda</span>
	</a>
</li>
<li>
    <a href="{{URL::to('/chiefproposal')}}">
        <i class="fa fa-home"></i> <span>Data proposal</span>
    </a>
</li>
<li>
    <a href="{{URL::to('/chiefprogress')}}">
        <i class="fa fa-home"></i> <span>Data laporan kemajuan</span>
    </a>
</li>
<li class="active">
    <a href="{{URL::to('/chieffinal')}}">
        <i class="fa fa-home"></i> <span>Data laporan akhir</span>
    </a>
</li>
<li>
    <a href="{{URL::to('/chiefpkmproposal')}}">
        <i class="fa fa-home"></i> <span>Data proposal PKM</span>
    </a>
</li>
<li>
    <a href="{{URL::to('/chiefpkmprogress')}}">
        <i class="fa fa-home"></i> <span>Data laporan kemajuan PKM</span>
    </a>
</li>
<li>
    <a href="{{URL::to('/chiefpkmfinal')}}">
        <i class="fa fa-home"></i> <span>Data laporan akhir PKM</span>
    </a>
</li>
<li>
	<a href="{{URL::to('/researchact')}}">
		<i class="fa fa-database"></i> <span>LAP Dosen</span>
	</a>
</li>
@stop

@section('content')
<h1>
	Laporan akhir
	<small>Halaman ketua Lemlit</small>
</h1>
<ol class="breadcrumb">
	<li><a href="{{URL::to('/chiefhome')}}"><i class="fa fa-dashboard"></i> Beranda</a></li>
	<li class="active">Data laporan akhir</li>
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
						<th>Judul</th>
						<th>Sumber Dana</th>
						<th>Tahun</th>
						<th>Abstrak</th>
						<th>Program Studi</th>
						<th>Skim</th>
						<th>Bidang Ilmu</th>
						<th>Fakultas</th>
						<th>Ketua</th>
						<th>Anggota 1</th>
						<th>Anggota 2</th>
						<th>Anggota 3</th>
						<th>Anggota 4</th>
						<th>Anggota Lain</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php
                        $i = 1;
                    ?>
					@foreach ($laporanakhir as $index => $laporanakhir2)
					<tr>
						<td>{{$i++}}</td>
						<td>{{$laporanakhir2->judul}}</td>
						<td>{{$laporanakhir2->sumberdana}}</td>
						<td>{{$laporanakhir2->tahun}}</td>
						<td>{{$laporanakhir2->read_more}}</td>
						<td>{{$laporanakhir2->programstudi}}</td>
						<td>{{$laporanakhir2->skim}}</td>
						<td>{{$laporanakhir2->bidangilmu}}</td>
						<td>{{$laporanakhir2->fakultas}}</td>
						<td>{{$laporanakhir2->ketua}}</td>
						<td>{{$laporanakhir2->anggota1}}</td>
						<td>{{$laporanakhir2->anggota2}}</td>
						<td>{{$laporanakhir2->anggota3}}</td>
						<td>{{$laporanakhir2->anggota4}}</td>
						<td>{{$laporanakhir2->anggotalain}}</td>
						<td><a href="{{URL::to('/chief_viewfinal/'.$laporanakhir2->idlapakhir)}}" target="_blank">Lihat</a></td>
					</tr>
					@endforeach
				</tbody>
				<tfoot>
					<tr>
						<th>No.</th>
						<th>Judul</th>
						<th>Sumber Dana</th>
						<th>Tahun</th>
						<th>Abstrak</th>
						<th>Program Studi</th>
						<th>Skim</th>
						<th>Bidang Ilmu</th>
						<th>Fakultas</th>
						<th>Ketua</th>
						<th>Anggota 1</th>
						<th>Anggota 2</th>
						<th>Anggota 3</th>
						<th>Anggota 4</th>
						<th>Anggota Lain</th>
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