@extends('layouts.homelayout')

@section('judul')
<title>Pangkalan Data Penelitian | Laporan Kemajuan</title>
@stop

@section('style')
{{HTML::style('userCss/css/style.css')}}
@stop

@section('bagianjs')
<!-- modernizr enables HTML5 elements and feature detects -->
{{HTML::script('/userCss/js/modernizr-1.5.min.js')}}
{{HTML::script('/userCss/js/jquery-2.1.1.min.js')}}
{{HTML::script('/userCss/js/jquery-ui.js')}}
{{HTML::script('/userCss/js/script.js')}}
@stop

@section('logo')
<!-- class="logo_colour", allows you to change the colour of the text -->
<!--<h1><a href="index.html">CCS3<span class="logo_colour">_abstract</span></a></h1>
  <h2>Simple. Contemporary. Website Template.</h2> -->
<img src="../userCss/images/Untitled-1.png">
@stop

@section('menu')
<li><a href="{{URL::to('/home')}}">Beranda</a></li>
<li><a href="#">Data Penelitian</a>
  <ul>
    <li><a href="{{URL::to('/proposal')}}">Proposal</a></li>
    <li><a href="{{URL::to('/progress')}}">Laporan Kemajuan</a></li>
    <li><a href="{{URL::to('/final')}}">Laporan Akhir</a></li>
  </ul>
</li>
<li><a href="#">Data PKM</a>
  <ul>
    <li><a href="{{URL::to('/pkmproposal')}}">Proposal</a></li>
    <li><a href="{{URL::to('/pkmprogress')}}">Laporan Kemajuan</a></li>
    <li><a href="{{URL::to('/pkmfinal')}}">Laporan Akhir</a></li>
  </ul>
</li>
<li><a href="#">Grafik Penelitian</a>
  <ul>
    <li><a href="{{URL::to('/graph')}}">Proposal</a></li>
    <li><a href="{{URL::to('/finalgraph')}}">Laporan Penelitian</a></li>
  </ul>
</li>
<li><a href="{{URL::to('/lecturer')}}">Data Dosen</a></li>
<li><a href="{{URL::to('/contact')}}">Kontak</a></li>
<li><a href="{{URL::to('/login')}}">Login</a></li>
@stop

@section('content')
<div class="content">
  @foreach ($laporankemajuan as $index => $laporankemajuan2)
  <h1>Lihat Data Laporan Kemajuan</h1>
  <h4>Judul:</h4>
  <p>{{$laporankemajuan2->judul}}</p>
  <h4>Sumber dana:</h4>
  <p>{{$laporankemajuan2->sumberdana}}</p>
  <h4>Tahun:</h4>
  <p>{{$laporankemajuan2->tahun}}</p>
  <h4>Abstrak:</h4>
  <p>{{$laporankemajuan2->abstrak}}</p>
  <h4>Program studi:</h4>
  <p>{{$laporankemajuan2->programstudi}}</p>
  <h4>Skim penelitian:</h4>
  <p>{{$laporankemajuan2->skim}}</p>
  <h4>Bidang ilmu:</h4>
  <p>{{$laporankemajuan2->bidangilmu}}</p>
  <h4>Fakultas:</h4>
  <p>{{$laporankemajuan2->fakultas}}</p>
  <h4>Ketua:</h4>
  <p>{{$laporankemajuan2->ketua}}</p>
  <h4>Anggota:</h4>
  <p>
    @if(($laporankemajuan2->kidanggota1 != '0') and ($laporankemajuan2->kidanggota1 != null))
    {{$laporankemajuan2->anggota1}}
    @if (($laporankemajuan2->kidanggota2 != '0') and ($laporankemajuan2->kidanggota2 != null))
    / {{$laporankemajuan2->anggota2}}
    @endif
    @if (($laporankemajuan2->kidanggota3 != '0') and ($laporankemajuan2->kidanggota3 != null))
    / {{$laporankemajuan2->anggota3}}
    @endif
    @if (($laporankemajuan2->kidanggota4 != '0') and ($laporankemajuan2->kidanggota4 != null))
    / {{$laporankemajuan2->anggota4}}
    @endif
    @if ($laporankemajuan2->anggotalain != '')
    / {{$laporankemajuan2->anggotalain}}
    @endif
    @elseif(($laporankemajuan2->kidanggota2 != '0') and ($laporankemajuan2->kidanggota2 != null))
    {{$laporankemajuan2->anggota2}}
    @if (($laporankemajuan2->kidanggota3 != '0') and ($laporankemajuan2->kidanggota3 != null))
    / {{$laporankemajuan2->anggota3}}
    @endif
    @if (($laporankemajuan2->kidanggota4 != '0') and ($laporankemajuan2->kidanggota4 != null))
    / {{$laporankemajuan2->anggota4}}
    @endif
    @if ($laporankemajuan2->anggotalain != '')
    / {{$laporankemajuan2->anggotalain}}
    @endif
    @elseif(($laporankemajuan2->kidanggota3 != '0') and ($laporankemajuan2->kidanggota3 != null))
    {{$laporankemajuan2->anggota3}}
    @if (($laporankemajuan2->kidanggota4 != '0') and ($laporankemajuan2->kidanggota4 != null))
    / {{$laporankemajuan2->anggota4}}
    @endif
    @if ($laporankemajuan2->anggotalain != '')
    / {{$laporankemajuan2->anggotalain}}
    @endif
    @elseif(($laporankemajuan2->kidanggota4 != '0') and ($laporankemajuan2->kidanggota4 != null))
    {{$laporankemajuan2->anggota4}}
    @if ($laporankemajuan2->anggotalain != '')
    / {{$laporankemajuan2->anggotalain}}
    @endif
    @elseif($laporankemajuan2->anggotalain != '')
    {{$laporankemajuan2->anggotalain}}
    @endif
  </p>
    @if($laporankemajuan2->namafilekemajuan == '')
      <p></p>
      <p>File laporan kemajuan tidak ada!</p>
    @elseif(($laporankemajuan2->namafilekemajuan != '') and ($laporankemajuan2->statusfile == '1'))
      <a class="btn btn-success" href="{{URL::to('/downloadprogress/'.$laporankemajuan2->idlapkemajuan)}}">Download Laporan Kemajuan</a>
    @endif
  @endforeach
</div>
@stop

@section('siteContent')
<a href="#" class="back-to-top">Back to Top</a>
@stop

@section('bagianjs2')
<!-- javascript at the bottom for fast page loading -->
{{HTML::script('/userCss/js/jquery.easing-sooper.js')}}
{{HTML::script('/userCss/js/jquery.sooperfish.js')}}
<script type="text/javascript">
$(document).ready(function() {
  $('ul.sf-menu').sooperfish();
  var amountScrolled = 300;
$(window).scroll(function() {
  if ( $(window).scrollTop() > amountScrolled ) {
    $('a.back-to-top').fadeIn('slow');
  } else {
    $('a.back-to-top').fadeOut('slow');
  }
});
$('a.back-to-top').click(function() {
  $('html, body').animate({
    scrollTop: 0
  }, 700);
  return false;
});
});
</script>
@stop