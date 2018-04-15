@extends('layouts.layoutketua')
@section('title')
<title>Aktifitas Penelitian | KaLemlit | Pangkalan Data Penelitian</title>
@stop
@section('style')
<!-- Bootstrap 3.3.4 -->
{{HTML::style('AdminLTE-2.1.1/bootstrap/css/bootstrap.min.css')}}
<!-- FontAwesome 4.3.0 -->
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<!-- Ionicons 2.0.0 -->
{{HTML::style('AdminLTE-2.1.1/ionicons.min.css')}}
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
<script>
@if ($status == 'failed')
  alert("Data tidak ada!");
@endif
</script>
<style type="text/css">
table.subTable{
	background-color: transparent;
}
tr.subTable{
	background-color: transparent;
}
td.subTable{
	background-color: transparent;
}
</style>
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
<li>
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
<li class="active">
	<a href="{{URL::to('/researchact')}}">
		<i class="fa fa-database"></i> <span>LAP Dosen</span>
	</a>
</li>
@stop

@section('content')
<h1>
	Aktifitas Penelitian
	<small>Halaman ketua Lemlit</small>
</h1>
<ol class="breadcrumb">
	<li><a href="{{URL::to('/chiefhome')}}"><i class="fa fa-dashboard"></i> Beranda</a></li>
	<li class="active">LAP Dosen</li>
</ol>
@stop
@section('inner')
<div class="col-xs-12">
    <!-- general form elements -->
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Cari Data Aktifitas Penelitian</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
        	<table class="subTable" border="0">
        		<tr class="subTable">
        			<td valign="middle" class="subTable">Tahun:</td>
        			<td class="subTable">
        				<select class="form-control" name="tahun" id="tahun">
                            @foreach($laporanakhir as $laporanakhir2)
                            <option value="{{$laporanakhir2->tahun}}">{{$laporanakhir2->tahun}}</option>
                            @endforeach
		        		</select>
		        	</td>
		        	<td valign="middle" class="subTable">Skim Penelitian:</td>
        			<td class="subTable">
        				<select class="form-control" name="idskimpenelitian" id="idskimpenelitian">
        					@foreach($skimpenelitian as $index => $skimpenelitian2)
        					<option value="{{$skimpenelitian2->idskimpenelitian}}">{{$skimpenelitian2->skim}}</option>
        					@endforeach
        				</select>
        			</td>
		        </tr>
		        <tr class="subTable">
		        	<td class="subTable"></td>
		        	<td class="subTable"><a onclick="cariaktifitaspenelitian()"><button class="button">Cari Data Penelitian</button></td>
		        </tr>
            </table>
        </div><!-- /.box-body -->
        <div class="box-footer">
        </div>
    </div><!-- /.box -->
</div><!-- /.col -->
@stop
@section('bagianjs')
<!-- jQuery 2.1.4 -->
{{HTML::script('/AdminLTE-2.1.1/plugins/jQuery/jQuery-2.1.4.min.js')}}
<!-- Bootstrap 3.3.2 JS -->
{{HTML::script('/AdminLTE-2.1.1/bootstrap/js/bootstrap.min.js')}}
<!-- FastClick -->
{{HTML::script('/AdminLTE-2.1.1/plugins/fastclick/fastclick.min.js')}}
<!-- AdminLTE App -->
{{HTML::script('/AdminLTE-2.1.1/dist/js/app.min.js')}}
<!-- AdminLTE for demo purposes -->
{{HTML::script('/AdminLTE-2.1.1/dist/js/demo.js')}}
<script>
function cariaktifitaspenelitian() {
  console.log($('#tahun').val());
  document.location.href = "{{URL::to('/viewactivity')}}" + '/' + $('#tahun').val() + '/' + $('#idskimpenelitian').val();
}
</script>
@stop