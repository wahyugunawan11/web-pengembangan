@extends('layouts.layoutketua')
@section('title')
<title>Beranda | Ketua LPPKM | Pangkalan Data Penelitian</title>
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
<!-- iCheck -->
{{HTML::style('AdminLTE-2.1.1/plugins/iCheck/flat/blue.css')}}
<!-- Morris chart -->
{{HTML::style('AdminLTE-2.1.1/plugins/morris/morris.css')}}
<!-- jvectormap -->
{{HTML::style('AdminLTE-2.1.1/plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}
<!-- Date Picker -->
{{HTML::style('AdminLTE-2.1.1/plugins/datepicker/datepicker3.css')}}
<!-- Daterange picker -->
{{HTML::style('AdminLTE-2.1.1/plugins/daterangepicker/daterangepicker-bs3.css')}}
<!-- bootstrap wysihtml5 - text editor -->
{{HTML::style('AdminLTE-2.1.1/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<!-- jQuery 2.1.4 -->
{{HTML::script('/AdminLTE-2.1.1/plugins/jQuery/jQuery-2.1.4.min.js')}}
<!-- jQuery UI 1.11.2 -->
{{HTML::script('/AdminLTE-2.1.1/jquery-ui.min.js')}}
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

@section('sidebar')
<li class="active">
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
<li>
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
Beranda
<small>Halaman ketua LPPKM</small>
@stop
@section('inner')
<div class="small-box bg-green" width="600">
	<div class="inner">
		<p><font size="6">Selamat datang di Pangkalan Data Penelitian LPPKM Universitas Tanjungpura.</font></p>
		<p><font size="5">Anda dapat melihat data penelitian dan data aktifitas penelitian di LPPKM UNTAN pada halaman ini.</font></p>
	</div>
</div>
@stop
@section('bagianjs')
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.2 JS -->
{{HTML::script('/AdminLTE-2.1.1/bootstrap/js/bootstrap.min.js')}}
<!-- Morris.js charts -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
{{HTML::script('/AdminLTE-2.1.1/plugins/morris/morris.min.js')}}
<!-- Sparkline -->
{{HTML::script('/AdminLTE-2.1.1/plugins/sparkline/jquery.sparkline.min.js')}}
<!-- jvectormap -->
{{HTML::script('/AdminLTE-2.1.1/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}
{{HTML::script('/AdminLTE-2.1.1/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}
<!-- jQuery Knob Chart -->
{{HTML::script('/AdminLTE-2.1.1/plugins/knob/jquery.knob.js')}}
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js" type="text/javascript"></script>
{{HTML::script('/AdminLTE-2.1.1/plugins/daterangepicker/daterangepicker.js')}}
<!-- datepicker -->
{{HTML::script('/AdminLTE-2.1.1/plugins/datepicker/bootstrap-datepicker.js')}}
<!-- Bootstrap WYSIHTML5 -->
{{HTML::script('/AdminLTE-2.1.1/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}
<!-- Slimscroll -->
{{HTML::script('/AdminLTE-2.1.1/plugins/slimScroll/jquery.slimscroll.min.js')}}
<!-- FastClick -->
{{HTML::script('/AdminLTE-2.1.1/plugins/fastclick/fastclick.min.js')}}
<!-- AdminLTE App -->
{{HTML::script('/AdminLTE-2.1.1/dist/js/app.min.js')}}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{HTML::script('/AdminLTE-2.1.1/dist/js/pages/dashboard.js')}}
<!-- AdminLTE for demo purposes -->
{{HTML::script('/AdminLTE-2.1.1/dist/js/demo.js')}}
@stop