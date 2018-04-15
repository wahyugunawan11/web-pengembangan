@extends('layouts.adminlayout')
@section('title')
<title>Beranda | Administrator | Pangkalan Data Penelitian</title>
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
	<a href="{{URL::to('/adminhome')}}">
		<i class="fa fa-home"></i> <span>Beranda</span>
	</a>
</li>
<li class="treeview">
	<a href="#">
		<i class="fa fa-database"></i>
		<span>Manajemen bidang ilmu</span>
		<i class="fa fa-angle-left pull-right"></i>
	</a>
	<ul class="treeview-menu">
		<li><a href="{{URL::to('/adminfield')}}"><i class="fa fa-circle-o"></i> Lihat data</a></li>
		<li><a href="{{URL::to('/admin_addfield')}}"><i class="fa fa-circle-o"></i> Tambah data</a></li>
	</ul>
</li>
<li class="treeview">
	<a href="#">
		<i class="fa fa-database"></i>
		<span>Manajemen fakultas</span>
		<i class="fa fa-angle-left pull-right"></i>
	</a>
	<ul class="treeview-menu">
        <li><a href="{{URL::to('/adminfaculty')}}"><i class="fa fa-circle-o"></i> Lihat data</a></li>
        <li><a href="{{URL::to('/admin_addfaculty')}}"><i class="fa fa-circle-o"></i> Tambah data</a></li>
    </ul>
</li>
<li class="treeview">
	<a href="#">
		<i class="fa fa-database"></i>
		<span>Manajemen penelitian</span>
		<i class="fa fa-angle-left pull-right"></i>
	</a>
	<ul class="treeview-menu">
		<li>
			<a href="#"><i class="fa fa-circle-o"></i> Proposal <i class="fa fa-angle-left pull-right"></i></a>
			<ul class="treeview-menu">
				<li><a href="{{URL::to('/adminproposal')}}"><i class="fa fa-circle-o"></i> Lihat data</a></li>
				<li><a href="{{URL::to('/admin_addproposal')}}"><i class="fa fa-circle-o"></i> Tambah data</a></li>
			</ul>
		</li>
		<li>
			<a href="#"><i class="fa fa-circle-o"></i> Laporan kemajuan <i class="fa fa-angle-left pull-right"></i></a>
			<ul class="treeview-menu">
				<li><a href="{{URL::to('/adminprogress')}}"><i class="fa fa-circle-o"></i> Lihat data</a></li>
				<li><a href="{{URL::to('/admin_addprogress')}}"><i class="fa fa-circle-o"></i> Tambah data</a></li>
			</ul>
		</li>
		<li>
			<a href="#"><i class="fa fa-circle-o"></i> Laporan akhir <i class="fa fa-angle-left pull-right"></i></a>
			<ul class="treeview-menu">
				<li><a href="{{URL::to('/adminfinal')}}"><i class="fa fa-circle-o"></i> Lihat data</a></li>
				<li><a href="{{URL::to('/admin_addfinal')}}"><i class="fa fa-circle-o"></i> Tambah data</a></li>
			</ul>
		</li>
	</ul>
</li>
<li class="treeview">
	<a href="#">
		<i class="fa fa-database"></i>
		<span>Manajemen PKM</span>
		<i class="fa fa-angle-left pull-right"></i>
	</a>
	<ul class="treeview-menu">
		<li>
			<a href="#"><i class="fa fa-circle-o"></i> Proposal <i class="fa fa-angle-left pull-right"></i></a>
			<ul class="treeview-menu">
				<li><a href="{{URL::to('/adminpkmproposal')}}"><i class="fa fa-circle-o"></i> Lihat data</a></li>
				<li><a href="{{URL::to('/admin_apkmproposal')}}"><i class="fa fa-circle-o"></i> Tambah data</a></li>
			</ul>
		</li>
		<li>
			<a href="#"><i class="fa fa-circle-o"></i> Laporan kemajuan <i class="fa fa-angle-left pull-right"></i></a>
			<ul class="treeview-menu">
				<li><a href="{{URL::to('/adminpkmprogress')}}"><i class="fa fa-circle-o"></i> Lihat data</a></li>
				<li><a href="{{URL::to('/admin_apkmprogress')}}"><i class="fa fa-circle-o"></i> Tambah data</a></li>
			</ul>
		</li>
		<li>
			<a href="#"><i class="fa fa-circle-o"></i> Laporan akhir <i class="fa fa-angle-left pull-right"></i></a>
			<ul class="treeview-menu">
				<li><a href="{{URL::to('/adminpkmfinal')}}"><i class="fa fa-circle-o"></i> Lihat data</a></li>
				<li><a href="{{URL::to('/admin_apkmfinal')}}"><i class="fa fa-circle-o"></i> Tambah data</a></li>
			</ul>
		</li>
	</ul>
</li>
<li class="treeview">
	<a href="#">
		<i class="fa fa-database"></i>
		<span>Manajemen dosen</span>
		<i class="fa fa-angle-left pull-right"></i>
	</a>
	<ul class="treeview-menu">
        <li><a href="{{URL::to('/adminlecturer')}}"><i class="fa fa-circle-o"></i> Lihat data</a></li>
        <li><a href="{{URL::to('/admin_addlecturer')}}"><i class="fa fa-circle-o"></i> Tambah data</a></li>
    </ul>
</li>
<li class="treeview">
	<a href="#">
		<i class="fa fa-database"></i>
		<span>Manajemen skim penelitian</span>
		<i class="fa fa-angle-left pull-right"></i>
	</a>
	<ul class="treeview-menu">
        <li><a href="{{URL::to('/adminskim')}}"><i class="fa fa-circle-o"></i> Lihat data</a></li>
        <li><a href="{{URL::to('/admin_addskim')}}"><i class="fa fa-circle-o"></i> Tambah data</a></li>
    </ul>
</li>
<li class="">
	<a href="{{URL::to('/adminhistory')}}">
		<i class="fa fa-database"></i>
		<span>Lihat histori</span>
	</a>
</li>
<li class="treeview">
	<a href="#">
		<i class="fa fa-database"></i>
		<span>Manajemen program studi</span>
		<i class="fa fa-angle-left pull-right"></i>
	</a>
	<ul class="treeview-menu">
        <li><a href="{{URL::to('/adminprogram')}}"><i class="fa fa-circle-o"></i> Lihat data</a></li>
        <li><a href="{{URL::to('/admin_addprogram')}}"><i class="fa fa-circle-o"></i> Tambah data</a></li>
    </ul>
</li>
<li class="treeview">
	<a href="#">
		<i class="fa fa-database"></i>
		<span>Manajemen File</span>
		<i class="fa fa-angle-left pull-right"></i>
	</a>
	<ul class="treeview-menu">
        <li><a href="{{URL::to('/adminfile')}}"><i class="fa fa-circle-o"></i> Lihat data</a></li>
        <li><a href="{{URL::to('/admin_addfile')}}"><i class="fa fa-circle-o"></i> Tambah data</a></li>
    </ul>
</li>
<li class="">
	<a href="{{URL::to('/adminmessage')}}">
		<i class="fa fa-database"></i>
		<span>Manajemen pesan/saran</span>
	</a>
</li>
<li class="">
	<a href="{{URL::to('/admin_researchact')}}">
		<i class="fa fa-database"></i>
		<span>LAP Dosen</span>
	</a>
</li>
@stop

@section('content')
Beranda
<small>Halaman administrator</small>
@stop
@section('inner')
<div class="small-box bg-green" width="600">
	<div class="inner">
		<p><font size="6">Selamat datang di Pangkalan Data Penelitian Lemlit Universitas Tanjungpura.</font></p>
		<p><font size="5">Anda dapat melihat histori dan Laporan Aktifitas Penelitian serta memanajemen data penelitian, data dosen, dan data lain-lain di Lemlit UNTAN pada halaman ini.</font></p>
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