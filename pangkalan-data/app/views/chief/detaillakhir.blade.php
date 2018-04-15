@extends('layouts.layoutketua')
@section('title')
<title>Laporan Akhir | Ketua LPPKM | Pangkalan Data Penelitian</title>
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
<style>
      .color-palette {
        height: 35px;
        line-height: 35px;
        text-align: center;

      }
      .color-palette-set {
        margin-bottom: 15px;
      }
      .color-palette span {
        display: none;
        font-size: 12px;
      }
      .color-palette:hover span {
        display: block;
      }
      .color-palette-box h4 {
        position: absolute;
        top: 100%;
        left: 25px;
        margin-top: -40px;
        color: rgba(255, 255, 255, 0.8);
        font-size: 12px;
        display: block;    
        z-index: 7;
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
  Detail laporan akhir
  <small>Halaman ketua Lemlit</small>
</h1>
<ol class="breadcrumb">
  <li><a href="{{URL::to('/chiefhome')}}"><i class="fa fa-dashboard"></i> Beranda</a></li>
  <li class="active">Data laporan akhir</li>
</ol>
@stop
@section('inner')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-solid">
            <div class="box-header with-border">
                <i class="fa fa-check"></i>
                <h3 class="box-title">Data laporan akhir</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <dl class="dl-horizontal">
                    @foreach ($laporanakhir as $index => $laporanakhir2)
                    <dt>Judul</dt>
                    <dd>{{$laporanakhir2->judul}}</dd>
                    <dt>Sumber dana</dt>
                    <dd>{{$laporanakhir2->sumberdana}}</dd>
                    <dt>Tahun</dt>
                    <dd>{{$laporanakhir2->tahun}}</dd>
                    <dt>Abstrak</dt>
                    <dd>{{$laporanakhir2->abstrak}}</dd>
                    <dt>Program studi</dt>
                    <dd>{{$laporanakhir2->programstudi}}</dd>
                    <dt>Skim penelitian</dt>
                    <dd>{{$laporanakhir2->skim}}</dd>
                    <dt>Bidang ilmu</dt>
                    <dd>{{$laporanakhir2->bidangilmu}}</dd>
                    <dt>Fakultas</dt>
                    <dd>{{$laporanakhir2->fakultas}}</dd>
                    <dt>Ketua</dt>
                    <dd>{{$laporanakhir2->ketua}}</dd>
                    <dt>Anggota</dt>
                    <dd>
                        @if(($laporanakhir2->aidanggota1 != '0') and ($laporanakhir2->aidanggota1 != null))
                        {{$laporanakhir2->anggota1}}
                        @if (($laporanakhir2->aidanggota2 != '0') and ($laporanakhir2->aidanggota2 != null))
                        / {{$laporanakhir2->anggota2}}
                        @endif
                        @if (($laporanakhir2->aidanggota3 != '0') and ($laporanakhir2->aidanggota3 != null))
                        / {{$laporanakhir2->anggota3}}
                        @endif
                        @if (($laporanakhir2->aidanggota4 != '0') and ($laporanakhir2->aidanggota4 != null))
                        / {{$laporanakhir2->anggota4}}
                        @endif
                        @if ($laporanakhir2->anggotalain != '')
                        / {{$laporanakhir2->anggotalain}}
                        @endif
                        @elseif(($laporanakhir2->aidanggota2 != '0') and ($laporanakhir2->aidanggota2 != null))
                        {{$laporanakhir2->anggota2}}
                        @if (($laporanakhir2->aidanggota3 != '0') and ($laporanakhir2->aidanggota3 != null))
                        / {{$laporanakhir2->anggota3}}
                        @endif
                        @if (($laporanakhir2->aidanggota4 != '0') and ($laporanakhir2->aidanggota4 != null))
                        / {{$laporanakhir2->anggota4}}
                        @endif
                        @if ($laporanakhir2->anggotalain != '')
                        / {{$laporanakhir2->anggotalain}}
                        @endif
                        @elseif(($laporanakhir2->aidanggota3 != '0') and ($laporanakhir2->aidanggota3 != null))
                        {{$laporanakhir2->anggota3}}
                        @if (($laporanakhir2->aidanggota4 != '0') and ($laporanakhir2->aidanggota4 != null))
                        / {{$laporanakhir2->anggota4}}
                        @endif
                        @if ($laporanakhir2->anggotalain != '')
                        / {{$laporanakhir2->anggotalain}}
                        @endif
                        @elseif(($laporanakhir2->aidanggota4 != '0') and ($laporanakhir2->aidanggota4 != null))
                        {{$laporanakhir2->anggota4}}
                        @if ($laporanakhir2->anggotalain != '')
                        / {{$laporanakhir2->anggotalain}}
                        @endif
                        @elseif($laporanakhir2->anggotalain != '')
                        {{$laporanakhir2->anggotalain}}
                        @endif
                    </dd>
                   @if($laporanakhir2->namafileakhir == '')
                    <dt></dt>
                    <dd>File laporan akhir tidak ada!</dd>
                    @else
                      <div class="col span_2_of_4">
                        <a class="btn btn-success" href="{{URL::to('/downloadfinal/'.$laporanakhir2->idlapakhir)}}">Download Laporan Akhir</a>
                      </div>
                    @endif
                </dl>
                @endforeach
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div><!-- /.col -->
</div>
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
@stop