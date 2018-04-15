@extends('layouts.homelayout')

@section('judul')
<title>Pangkalan Data Penelitian | Dosen</title>
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
  @foreach ($dosen as $index => $dosen2)
  <h1>Lihat Data Dosen</h1>
  @if($dosen2->namafile == '')
  <p><center><img src="{{URL::to('erudite-pack/Preview_Not_Available-500x500.jpg')}}" width="300px"></center></p>
  @elseif($dosen2->namafile != '')
  <p><center><img src="{{URL::to('Images_Dosen/'.$dosen2->namafile)}}" width="300px"></center></p>
  @endif
  <h4>NIDN:</h4>
  <p>{{$dosen2->nidn}}</p>
  <h4>Nama:</h4>
  <p>{{$dosen2->nama}}</p>
  @endforeach
  <h4>Status:</h4>
  <p>{{$status}}</p>
  @foreach ($dosen as $index => $dosen2)
  <h4>Pangkat/Golongan:</h4>
  <p>{{$dosen2->pangkatgolongan}}</p>
  <h4>E-mail:</h4>
  @if($dosen2->email == '')
  <p>-</p>
  @elseif($dosen2->email != '')
  <p>{{$dosen2->email}}</p>
  @endif
  <h4>No. Telpon:</h4>
  @if($dosen2->notelp == '')
  <p>-</p>
  @elseif($dosen2->notelp != '')
  <p>{{$dosen2->notelp}}</p>
  @endif
  <h4>NIP:</h4>
  <p>{{$dosen2->nip}}</p>
  <h4>Tempat Lahir:</h4>
  <p>{{$dosen2->tempatlahir}}</p>
  @endforeach
  <h4>Tanggal Lahir:</h4>
  <p>{{$result}}</p>
  @foreach ($dosen as $index => $dosen2)
  <h4>Jenis Kelamin:</h4>
  @if($dosen2->jeniskelamin == 'L')
  <p>Laki-laki</p>
  @else
  <p>Perempuan</p>
  @endif
  <h4>Jabatan Fungsional:</h4>
  @if($dosen2->jabatanfungsional == 'GB')
  <p>Guru Besar</p>
  @elseif($dosen2->jabatanfungsional == 'LK')
  <p>Lektor Kepala</p>
  @elseif($dosen2->jabatanfungsional == 'L')
  <p>Lektor</p>
  @elseif($dosen2->jabatanfungsional == 'AA')
  <p>Asisten Ahli</p>
  @else
  <p>Tenaga Pengajar</p>
  @endif
  <h4>Fakultas:</h4>
  <p>{{$dosen2->fakultas}}</p>
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