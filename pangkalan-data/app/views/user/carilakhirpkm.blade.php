@extends('layouts.homelayout')

@section('judul')
<title>Pangkalan Data Penelitian | Laporan Akhir PKM</title>
@stop

@section('style')
{{HTML::style('userCss/css/style.css')}}
<!-- DataTables CSS -->
{{HTML::style('userCss/media/css/jquery.dataTables.css')}}
@stop

@section('bagianjs')
<!-- modernizr enables HTML5 elements and feature detects -->
{{HTML::script('userCss/js/modernizr-1.5.min.js')}}
{{HTML::script('userCss/js/jquery-2.1.1.min.js')}}
{{HTML::script('userCss/js/jquery-ui.js')}}
{{HTML::script('userCss/js/script.js')}}
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
@stop

@section('content')
<div class="content">
  <?php
  if(isset($laporanakhirpkm)){
  ?>
  <table class="table table-striped table-bordered table-hover" id="dataTablesexample">
    <thead>
      <tr>
        <th style="color: #D24D57;">No.</th>
        <th style="color: #D24D57;">Judul</th>
        <th style="color: #D24D57;">Sumber Dana</th>
        <th style="color: #D24D57;">Tahun</th>
        <th style="color: #D24D57;">Abstrak</th>
        <th style="color: #D24D57;">Skim</th>
        <th style="color: #D24D57;">Bidang Ilmu</th>
        <th style="color: #D24D57;">Fakultas</th>
        <th style="color: #D24D57;"></th>
      </tr>
    </thead>
    <tbody>
      <?php
      $i = 1;
      ?>
      @foreach ($laporanakhirpkm as $result)
      <tr>
        <td>{{$i++}}</td>
        <td>{{$result->judul}}</td>
        <td>{{$result->sumberdana}}</td>
        <td>{{$result->tahun}}</td>
        <td>{{$result->read_more}}</td>
        <td>{{$result->skim}}</td>
        <td>{{$result->bidangilmu}}</td>
        <td>{{$result->fakultas}}</td>
        <td><a href="{{URL::to('/viewpkmfinal/'.$result->idlakhir_pkm)}}" target="_blank">Lihat</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <?php
  } else {
    echo "Laporan akhir tidak ditemukan";
  }
  ?>
  <div class="col span_2_of_4">
    <a href="{{URL::to('/pkmfinal')}}" class="btn btn-link">Kembali ke pencarian</a>
  </div>
</div>
@stop

@section('siteContent')
<a href="#" class="back-to-top">Back to Top</a>
@stop

@section('bagianjs2')
<!-- javascript at the bottom for fast page loading -->
{{HTML::script('/userCss/js/jquery.easing-sooper.js')}}
{{HTML::script('/userCss/js/jquery.sooperfish.js')}}
<!-- DataTables -->
{{HTML::script('/userCss/media/js/jquery.dataTables.js')}}
<script type="text/javascript">
$(document).ready(function() {
  $('ul.sf-menu').sooperfish();
  $('#dataTablesexample').dataTable({
    "scrollX": true
  });
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