@extends('layouts.layoutdosen')

@section('judul')
<title>Lihat Laporan Akhir PKM | Dosen | Pangkalan Data Penelitian</title>
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
    <a href="{{URL::to('/lecturerhome')}}">
        <i class="fa fa-home"></i> <span>Beranda</span>
    </a>
</li>
<li class="treeview">
    <a href="#">
        <i class="fa fa-database"></i>
        <span>Manajemen proposal</span>
        <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
        <li><a href="{{URL::to('/lecturerproposal')}}"><i class="fa fa-circle-o"></i> Lihat data</a></li>
        <li><a href="{{URL::to('/lecturer_addproposal')}}"><i class="fa fa-circle-o"></i> Tambah data</a></li>
    </ul>
</li>
<li class="treeview">
    <a href="#">
        <i class="fa fa-database"></i>
        <span>Manajemen laporan kemajuan</span>
        <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
        <li><a href="{{URL::to('/lecturerprogress')}}"><i class="fa fa-circle-o"></i> Lihat data</a></li>
        <li><a href="{{URL::to('/lecturer_addprogress')}}"><i class="fa fa-circle-o"></i> Tambah data</a></li>
    </ul>
</li>
<li class="treeview">
    <a href="#">
        <i class="fa fa-database"></i>
        <span>Manajemen lap.akhir</span>
        <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
        <li><a href="{{URL::to('/lecturerfinal')}}"><i class="fa fa-circle-o"></i> Lihat data</a></li>
        <li><a href="{{URL::to('/lecturer_addfinal')}}"><i class="fa fa-circle-o"></i> Tambah data</a></li>
    </ul>
</li>
<li class="treeview">
    <a href="#">
        <i class="fa fa-database"></i>
        <span>Manajemen proposal PKM</span>
        <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
        <li><a href="{{URL::to('/lecturerpkmproposal')}}"><i class="fa fa-circle-o"></i> Lihat data</a></li>
        <li><a href="{{URL::to('/lecturer_apkmproposal')}}"><i class="fa fa-circle-o"></i> Tambah data</a></li>
    </ul>
</li>
<li class="treeview">
    <a href="#">
        <i class="fa fa-database"></i>
        <span>Manajemen lap.kemajuan PKM</span>
        <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
        <li><a href="{{URL::to('/lecturerpkmprogress')}}"><i class="fa fa-circle-o"></i> Lihat data</a></li>
        <li><a href="{{URL::to('/lecturer_apkmprogress')}}"><i class="fa fa-circle-o"></i> Tambah data</a></li>
    </ul>
</li>
<li class="treeview active">
    <a href="#">
        <i class="fa fa-database"></i>
        <span>Manajemen lap.akhir PKM</span>
        <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
        <li class="active"><a href="{{URL::to('/lecturerpkmfinal')}}"><i class="fa fa-circle-o"></i> Lihat data</a></li>
        <li><a href="{{URL::to('/lecturer_apkmfinal')}}"><i class="fa fa-circle-o"></i> Tambah data</a></li>
    </ul>
</li>
<li>
    <a href="{{URL::to('/lecturerfile')}}">
        <i class="fa fa-home"></i> <span>Download file</span>
    </a>
</li>
@stop

@section('content')
<h1>
  Detail laporan akhir PKM
  <small>Halaman dosen</small>
</h1>
<ol class="breadcrumb">
  <li><a href="{{URL::to('/lecturerhome')}}"><i class="fa fa-dashboard"></i> Beranda</a></li>
  <li><a href="#">Manajemen laporan akhir PKM</a></li>
  <li class="active">Lihat data</li>
</ol>
@stop

@section('inner')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-solid">
            <div class="box-header with-border">
                <i class="fa fa-check"></i>
                <h3 class="box-title">Data laporan akhir PKM</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <dl class="dl-horizontal">
                    @foreach ($laporanakhirpkm as $index => $laporanakhirpkm2)
                    <dt>Judul</dt>
                    <dd>{{$laporanakhirpkm2->judul}}</dd>
                    <dt>Sumber dana</dt>
                    <dd>{{$laporanakhirpkm2->sumberdana}}</dd>
                    <dt>Tahun</dt>
                    <dd>{{$laporanakhirpkm2->tahun}}</dd>
                    <dt>Abstrak</dt>
                    <dd>{{$laporanakhirpkm2->abstrak}}</dd>
                    <dt>Program studi</dt>
                    <dd>{{$laporanakhirpkm2->programstudi}}</dd>
                    <dt>Skim penelitian</dt>
                    <dd>{{$laporanakhirpkm2->skim}}</dd>
                    <dt>Bidang ilmu</dt>
                    <dd>{{$laporanakhirpkm2->bidangilmu}}</dd>
                    <dt>Fakultas</dt>
                    <dd>{{$laporanakhirpkm2->fakultas}}</dd>
                    <dt>Ketua</dt>
                    <dd>{{$laporanakhirpkm2->ketua}}</dd>
                    <dt>Anggota</dt>
                    <dd>
                        @if(($laporanakhirpkm2->aidanggota1 != '0') and ($laporanakhirpkm2->aidanggota1 != null))
                        {{$laporanakhirpkm2->anggota1}}
                        @if (($laporanakhirpkm2->aidanggota2 != '0') and ($laporanakhirpkmpkm2->aidanggota2 != null))
                        / {{$laporanakhirpkm2->anggota2}}
                        @endif
                        @if (($laporanakhirpkm2->aidanggota3 != '0') and ($laporanakhirpkm2->aidanggota3 != null))
                        / {{$laporanakhirpkm2->anggota3}}
                        @endif
                        @if (($laporanakhirpkm2->aidanggota4 != '0') and ($laporanakhirpkm2->aidanggota4 != null))
                        / {{$laporanakhirpkm2->anggota4}}
                        @endif
                        @if ($laporanakhirpkm2->anggotalain != '')
                        / {{$laporanakhirpkm2->anggotalain}}
                        @endif
                        @elseif(($laporanakhirpkm2->aidanggota2 != '0') and ($laporanakhirpkm2->aidanggota2 != null))
                        {{$laporanakhirpkm2->anggota2}}
                        @if (($laporanakhirpkm2->aidanggota3 != '0') and ($laporanakhirpkm2->aidanggota3 != null))
                        / {{$laporanakhirpkm2->anggota3}}
                        @endif
                        @if (($laporanakhirpkm2->aidanggota4 != '0') and ($laporanakhirpkm2->aidanggota4 != null))
                        / {{$laporanakhirpkm2->anggota4}}
                        @endif
                        @if ($laporanakhirpkm2->anggotalain != '')
                        / {{$laporanakhirpkm2->anggotalain}}
                        @endif
                        @elseif(($laporanakhirpkm2->aidanggota3 != '0') and ($laporanakhirpkm2->aidanggota3 != null))
                        {{$laporanakhirpkm2->anggota3}}
                        @if (($laporanakhirpkm2->aidanggota4 != '0') and ($laporanakhirpkm2->aidanggota4 != null))
                        / {{$laporanakhirpkm2->anggota4}}
                        @endif
                        @if ($laporanakhirpkm2->anggotalain != '')
                        / {{$laporanakhirpkm2->anggotalain}}
                        @endif
                        @elseif(($laporanakhirpkm2->aidanggota4 != '0') and ($laporanakhirpkm2->aidanggota4 != null))
                        {{$laporanakhirpkm2->anggota4}}
                        @if ($laporanakhirpkm2->anggotalain != '')
                        / {{$laporanakhirpkm2->anggotalain}}
                        @endif
                        @elseif($laporanakhirpkm2->anggotalain != '')
                        {{$laporanakhirpkm2->anggotalain}}
                        @endif
                    </dd>
                    @if($laporanakhirpkm2->namafileakhir == '')
                    <dt></dt>
                    <dd>File laporan akhir PKM tidak ada!</dd>
                    @else
                      <div class="col span_2_of_4">
                        <a class="btn btn-success" href="{{URL::to('/lecturer_dpkmfinal/'.$laporanakhirpkm2->idlakhir_pkm)}}">Download Laporan Akhir PKM</a>
                      </div>
                    @endif
                </dl>
                @endforeach
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div><!-- /.col -->
</div>
@stop

@section('bagianjs2')
<!-- javascript at the bottom for fast page loading -->
{{HTML::script('/userCss/js/jquery.easing-sooper.js')}}
{{HTML::script('/userCss/js/jquery.sooperfish.js')}}
<script type="text/javascript">
$(document).ready(function() {
  $('ul.sf-menu').sooperfish();
  $('.top').click(function() {$('html, body').animate({scrollTop:0}, 'fast'); return false;});
});
</script>
@stop