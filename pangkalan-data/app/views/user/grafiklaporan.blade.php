@extends('layouts.homelayout')

@section('judul')
<title>Pangkalan Data Penelitian | Grafik Laporan Penelitian</title>
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

@section('logo')
<!-- class="logo_colour", allows you to change the colour of the text -->
<!--<h1><a href="index.html">CCS3<span class="logo_colour">_abstract</span></a></h1>
  <h2>Simple. Contemporary. Website Template.</h2> -->
<img src="userCss/images/Untitled-1.png">
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
  <table class="subTable" border="0">
    <tr class="subTable">
      <td valign="middle" class="subTable" style="border-right: 0px; border-top: 0px">Fakultas:</td>
      <td class="subTable" style="border-top: 0px">
        <select name="fakultas" id="fakultas">
          @foreach($fakultas as $fakultas2)
          <option value='{{$fakultas2->idfakultas}}'>{{$fakultas2->fakultas}}</option>
          @endforeach
        </select>
      </td>
    </tr>
    <tr class="subTable">
      <td valign="middle" class="subTable" style="border-right: 0px; border-top: 0px">Skim penelitian:</td>
      <td class="subTable" style="border-top: 0px">
        <select name="skim" id="skim">
          @foreach($skimpenelitian as $skimpenelitian2)
          <option value='{{$skimpenelitian2->idskimpenelitian}}'>{{$skimpenelitian2->skim}}</option>
          @endforeach
        </select>
      </td>
    </tr>
    <tr class="subTable">
      <td class="subTable" style="border-right: 0px; border-top: 0px"></td>
      <td class="subTable" style="border-top: 0px"><a onclick="lihatgrafiklaporan()"><button class="button">Lihat grafik</button></td>
    </tr>
  </table>
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
<script>
function lihatgrafiklaporan() {
  console.log($('#fakultas').val());
  document.location.href = "{{URL::to('/viewfinalgraph')}}" + '/' + $('#fakultas').val() + '/' + $('#skim').val();
}
</script>
@stop