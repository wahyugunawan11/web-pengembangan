@extends('layouts.homelayout')

@section('judul')
<title>Pangkalan Data Penelitian | Dosen</title>
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
  if(isset($dosen)){ 
  ?>
  <table class="table table-striped table-bordered table-hover" id="dataTablesexample">
    <thead>
      <tr>
        <th style="color: #D24D57;">No.</th>
        <th style="color: #D24D57;">NIDN</th>
        <th style="color: #D24D57;">Nama</th>
        <th style="color: #D24D57;">Pangkat/Golongan</th>
        <th style="color: #D24D57;">E-mail</th>
        <th style="color: #D24D57;">No. Telpon</th>
        <th style="color: #D24D57;">NIP</th>
        <th style="color: #D24D57;">Tempat Lahir</th>
        <th style="color: #D24D57;">Tanggal Lahir</th>
        <th style="color: #D24D57;">Jenis Kelamin</th>
        <th style="color: #D24D57;">Jabatan Fungsional</th>
        <th style="color: #D24D57;">Fakultas</th>
        <th style="color: #D24D57;"></th>
      </tr>
    </thead>
    <tbody>
      <?php
      $i = 1;
      ?>
      @foreach ($dosen as $result)
      <tr>
        <td>{{$i++}}</td>
        <td>{{$result->nidn}}</td>
        <td>{{$result->nama}}</td>
        <td>{{$result->pangkatgolongan}}</td>
        <td>{{$result->email}}</td>
        <td>{{$result->notelp}}</td>
        <td>{{$result->nip}}</td>
        <td>{{$result->tempatlahir}}</td>
        <td>{{$result->tanggallahir}}</td>
        @if($result->jeniskelamin == 'L')
          <td>Laki-laki</td>
        @elseif($result->jeniskelamin != 'L')
          <td>Perempuan</td>
        @endif
        <td>{{$result->jabatanfungsional}}</td>
        <td>{{$result->fakultas}}</td>
        <td><a href="{{URL::to('/viewlecturer/'.$result->iddosen)}}" target="_blank">Lihat</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <?php
  } else {
    echo "Data dosen tidak ditemukan";
  }
  ?>
  <div class="col span_2_of_4">
    <a href="{{URL::to('/lecturer')}}" class="btn btn-link">Kembali ke pencarian</a>
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