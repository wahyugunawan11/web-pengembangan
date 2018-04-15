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
<img src="userCss/images/Untitled-1.png" />
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
</ul>
@stop

@section('content')
<div class="content">
  <h1>Cari Data Laporan Kemajuan</h1>
  <!-- form start -->
  {{Form::open(array('method'=>'post', 'url'=>'/searchprogress'))}}
  <div class="form_settings">
    <p><span>Skim penelitian:</span>
      <select name="idskimpenelitian">
        <option value="">Semua</option>
        @foreach($skimpenelitian as $index => $skimpenelitian2)
        <option value="{{$skimpenelitian2->idskimpenelitian}}">{{$skimpenelitian2->skim}}</option>
        @endforeach
      </select>
    </p>
    <p><span>Bidang ilmu:</span>
      <select name="idbidilmu">
        <option value="">Semua</option>
        @foreach($bidangilmu as $index => $bidangilmu2)
        <option value="{{$bidangilmu2->idbidilmu}}">{{$bidangilmu2->bidangilmu}}</option>
        @endforeach
      </select>
    </p>
    <p><span>Fakultas:</span>
      <select name="idfakultas">
        <option value="">Semua</option>
        @foreach($fakultas as $index => $fakultas2)
        <option value="{{$fakultas2->idfakultas}}">{{$fakultas2->fakultas}}</option>
        @endforeach
      </select>
    </p>
    <p><span>Tahun:</span>
      <select name="tahun">
        @foreach($laporankemajuan as $laporankemajuan2)
        <option value="{{$laporankemajuan2->tahun}}">{{$laporankemajuan2->tahun}}</option>
        @endforeach
      </select> - 
      <select name="tahun2">
        @foreach($laporankemajuan as $laporankemajuan2)
        <option value="{{$laporankemajuan2->tahun}}">{{$laporankemajuan2->tahun}}</option>
        @endforeach
      </select>
    </p>
    <p><span>Kata kunci:</span><input class="contact" type="text" name="kunci" value="" placeholder="Judul/sumber dana" /></p>
    <p style="padding-top: 15px"><span>&nbsp;</span><button type="submit" class="button">Cari</button></p>
  </div>
  {{Form::close()}}
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