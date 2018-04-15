@extends('layouts.homelayout')

@section('judul')
<title>Pangkalan Data Penelitian | Beranda</title>
@stop

@section('style')
<link rel="stylesheet" type="text/css" href="userCss/css/style.css" />
@stop

@section('bagianjs')
<!-- modernizr enables HTML5 elements and feature detects -->
{{HTML::script('/userCss/js/modernizr-1.5.min.js')}}
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

@section('sidebar')
<div class="sidebar">
  <h3>Fitur Aplikasi</h3>
  <ul>
    <li>Pencarian data penelitian</li>
    <li>Pencarian data PKM</li>
    <li>Pencarian data peneliti</li>
    <li>Informasi grafik penelitian</li>
    <li>Kotak saran.</li>
  </ul>
</div>
@stop

@section('content')
<div class="content" style="width: 700px">
  <h1>Pangkalan Data Penelitian Universitas Tanjungpura</h1>
  <p><strong>Lembaga Penelitian dan Pengabdian kepada Masyarakat (LPPKM) UNTAN</strong></p>
  <p>LPPKM merupakan salah satu unsur pelaksanaan Perguruan Tinggi yang melaksanakan tugas dibidang penelitian, yang mengkoordinir, memantau, dan menilai pelaksanaan kegiatan penelitian yang dilaksanakan oleh peneliti yang ada di Pusat Penelitian/Pusat Studi/Pusat Kajian, Fakultas/Jurusan, serta ikut mengusahakan dan mengelola sumberdaya yang diperlukan dalam penyelenggaraan kegiatan penelitian.</p>
  <p><strong>Fungsi LPPKM UNTAN</strong></p>
  <p>
    <ul>
      <li>Melaksanakan penelitian ilmiah murni, teknologi, dan/atau kesenian</li>
      <li>Melaksanakan penelitian ilmu pengetahuan dan/atau kesenian tertentu untuk menunjang pembangunan</li>
      <li>Melaksanakan penelitian untuk pendidikan dan pengembangan ilmu</li>
      <li>Melaksanakan penelitian ilmu pengetahuan, teknologi, dan/atau kesenian serta penelitian untuk mengembangkan konsepsi pembangunan nasional, wilayah, dan/atau daerah melalui kerjasama antar perguruan tinggi dan badan lain baik di dalam negeri maupun luar negeri</li>
      <li>Melaksanakan pembinaan dosen peneliti</li>
      <li>Melaksanakan urusan tata usaha lembaga.</li>
    </ul>
  </p>
  <p><strong>Visi</strong></p>
  <p>Menjadi pusat informasi ilmiah Kalimantan Barat serta menghasilkan penelitian yang berdaya guna bagi kemajuan ilmu dan teknologi.</p>
  <p><strong>Misi</strong></p>
  <p>
    <ul>
      <li>Menyelenggarakan penelitian secara berkualitas, sehingga dapat memajukan dan mengembangkan ilmu pengetahuan teknologi sesuai dengan disiplin ilmu masing-masing</li>
      <li>Menyelenggarakan kegiatan penelitian dan pengembangan untuk menunjang pembangunan daerah dan turut menyelesaikan permasalahan masyarakat</li>
      <li>Melakukan kerjasama penelitian yang sinergis baik secara internal di lingkungan Universitas Tanjungpura maupun secara eksternal dengan pihak luar (pemerintah, swasta, dan stokeholder yang lain).</li>
    </ul>
  </p>
</div>
@stop

@section('siteContent')
<a href="#" class="back-to-top">Back to Top</a>
@stop

@section('bagianjs2')
<!-- javascript at the bottom for fast page loading -->
{{HTML::script('/userCss/js/jquery.js')}}
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