@extends('layouts.homelayout')

@section('judul')
<title>Pangkalan Data Penelitian | Grafik Proposal Penelitian</title>
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
{{HTML::script('/userCss/js/jquery.easing-sooper.js')}}
{{HTML::script('/userCss/js/jquery.sooperfish.js')}}
{{HTML::script('/js/highcharts.js')}}
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
<script type="text/javascript">
$(document).ready(function() {
  $('ul.sf-menu').sooperfish();
  $('.top').click(function() {$('html, body').animate({scrollTop:0}, 'fast'); return false;});
});
</script>
<script>
$(function(){
  $('#graf').highcharts({
    chart:{
      type: 'column'
    },
    title:{
      text: 'Data Proposal'
    },
    subtitle:{
      text: 'LPPKM Universitas Tanjungpura'
    },
    xAxis:{
      categories: {{$kategori}}
    },
    yAxis:{
      min: 0,
      title: {
        text: 'Proposal'
      }
    },
    tooltip:{
      formatter: function(){
        var point = '';
        var i = 1;

        var header = '<span style="font-size:10px">' + this.x + '</span><table>';
        
        for(i = 0; i <= 4; i++){
          point = point + '<tr><td style="color: '+this.points[i].series.color+' ;padding:0">'+this.points[i].series.name+': </td>' + '<td style="padding:0"><b>'+this.points[i].point.y+'</b></td></tr>';
        }
        var footer = '</table>';
        return header + point + footer;
      },
      shared: true,
      useHTML: true
    },
    plotOptions:{
      column:{
        pointPadding: 0.2,
        borderWidth: 0
      }
    },
    series:{{$data_highchart}}
  });
});
</script>
@stop

@section('logo')
<!-- class="logo_colour", allows you to change the colour of the text -->
<!--<h1><a href="index.html">CCS3<span class="logo_colour">_abstract</span></a></h1>
  <h2>Simple. Contemporary. Website Template.</h2> -->
<img src="{{URL::to('/userCss/images/Untitled-1.png')}}">
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
      <td class="subTable" style="border-top: 0px"><a onclick="lihatgrafik()"><button class="button">Lihat grafik</button></td>
    </tr>
    <tr class="subTable">
      <td class="subTable" style="border-right: 0px; border-top: 0px">Fakultas</td>
      @foreach($fakultaspilihan as $fakultaspilihan2)
      <td class="subTable" style="border-top: 0px">{{$fakultaspilihan2->fakultas}}</td>
      @endforeach
    </tr>
    <tr class="subTable">
      <td class="subTable" style="border-right: 0px; border-top: 0px">Skim penelitian</td>
      @foreach($skimpenelitianpilihan as $skimpenelitianp2)
      <td class="subTable" style="border-top: 0px">{{$skimpenelitianp2->skim}}</td>
      @endforeach
    </tr>
    <tr class="subTable">
      <td class="subTable" style="border-right: 0px; border-top: 0px">Proposal</td>
      <td class="subTable" style="border-top: 0px">{{$totalproposal}}</td>
    </tr>
  </table>
  <div id="graf" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
</div>
@stop

@section('siteContent')
<a href="#" class="back-to-top">Back to Top</a>
@stop

@section('bagianjs2')
<!-- javascript at the bottom for fast page loading -->
<script type="text/javascript">
$(document).ready(function() {
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
function lihatgrafik() {
  console.log($('#fakultas').val());
  document.location.href = "{{URL::to('/viewgraph')}}" + '/' + $('#fakultas').val() + '/' + $('#skim').val();
}
</script>
@stop