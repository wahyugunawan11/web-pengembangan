@extends('layouts.homelayout')

@section('judul')
<title>Pangkalan Data Penelitian | Kontak</title>
@stop

@section('style')
{{HTML::style('userCss/css/style.css')}}
{{HTML::style('userCss/formkontak.css')}}
{{HTML::style('assets/FancyBox/jquery.fancybox.css')}}
@stop

@section('bagianjs')
<!-- modernizr enables HTML5 elements and feature detects -->
{{HTML::script('/userCss/js/modernizr-1.5.min.js')}}
{{HTML::script('userCss/js/jquery-2.1.1.min.js')}}
@stop

@section('include')
<script type="text/javascript">
    jQuery(document).ready(function(){
        @if (isset($message))
        alert('{{ $message }}');
        @endif
    });
</script>
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
  <div id="wrapper">
  Kirimkan saran Anda untuk perkembangan website kami dengan mengisi formulir berikut.<br>
  </div>
  <div id="inline">
  <h2>Kirim saran</h2>
  <form id="contact" action="{{URL::to('/send')}}" method="post" name="contact">
    <label for="nama">Nama (harus diisi)</label>
    <input id="nama" class="txt" type="text" name="nama" /><br>
    <label for="email">E-mail</label>
    <input id="email" class="txt" type="email" name="email" /><br>
    <label for="msg">Saran Anda (harus diisi lebih dari 1 kata)</label>
    <textarea id="msg" class="txtarea" name="msg"></textarea>

    <button id="send">Kirim</button></form></div>
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
<script>
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