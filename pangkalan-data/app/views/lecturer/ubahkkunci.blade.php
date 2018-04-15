@extends('layouts.layoutdosen')
@section('title')
<title>Ubah Password | Dosen | Pangkalan Data Penelitian</title>
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
    <a href="{{URL::to('/lecturerhome')}}">
        <i class="fa fa-home"></i> <span>Beranda</span>
    </a>
</li>
<li class="treeview">
    <a href="#">
        <i class="fa fa-database"></i>
        <span>Manajemen proposal</span>
        <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
        <li><a href="{{URL::to('/lecturerproposal')}}"><i class="fa fa-circle-o"></i> Lihat data</a></li>
        <li><a href="{{URL::to('/lecturer_addproposal')}}"><i class="fa fa-circle-o"></i> Tambah data</a></li>
    </ul>
</li>
<li class="treeview">
    <a href="#">
        <i class="fa fa-database"></i>
        <span>Manajemen laporan kemajuan</span>
        <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
        <li><a href="{{URL::to('/lecturerprogress')}}"><i class="fa fa-circle-o"></i> Lihat data</a></li>
        <li><a href="{{URL::to('/lecturer_addprogress')}}"><i class="fa fa-circle-o"></i> Tambah data</a></li>
    </ul>
</li>
<li class="treeview">
    <a href="#">
        <i class="fa fa-database"></i>
        <span>Manajemen lap.akhir</span>
        <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
        <li><a href="{{URL::to('/lecturerfinal')}}"><i class="fa fa-circle-o"></i> Lihat data</a></li>
        <li><a href="{{URL::to('/lecturer_addfinal')}}"><i class="fa fa-circle-o"></i> Tambah data</a></li>
    </ul>
</li>
<li class="treeview">
    <a href="#">
        <i class="fa fa-database"></i>
        <span>Manajemen proposal PKM</span>
        <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
        <li><a href="{{URL::to('/lecturerpkmproposal')}}"><i class="fa fa-circle-o"></i> Lihat data</a></li>
        <li><a href="{{URL::to('/lecturer_apkmproposal')}}"><i class="fa fa-circle-o"></i> Tambah data</a></li>
    </ul>
</li>
<li class="treeview">
    <a href="#">
        <i class="fa fa-database"></i>
        <span>Manajemen lap.kemajuan PKM</span>
        <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
        <li><a href="{{URL::to('/lecturerpkmprogress')}}"><i class="fa fa-circle-o"></i> Lihat data</a></li>
        <li><a href="{{URL::to('/lecturer_apkmprogress')}}"><i class="fa fa-circle-o"></i> Tambah data</a></li>
    </ul>
</li>
<li class="treeview">
    <a href="#">
        <i class="fa fa-database"></i>
        <span>Manajemen lap.akhir PKM</span>
        <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
        <li><a href="{{URL::to('/lecturerpkmfinal')}}"><i class="fa fa-circle-o"></i> Lihat data</a></li>
        <li><a href="{{URL::to('/lecturer_apkmfinal')}}"><i class="fa fa-circle-o"></i> Tambah data</a></li>
    </ul>
</li>
<li>
    <a href="{{URL::to('/lecturerfile')}}">
        <i class="fa fa-home"></i> <span>Download file</span>
    </a>
</li>
@stop

@section('content')
<h1>
	Data password
	<small>Halaman dosen</small>
</h1>
<ol class="breadcrumb">
	<li><a href="{{URL::to('/lecturerhome')}}"><i class="fa fa-dashboard"></i> Beranda</a></li>
    <li class="active">Ubah Password</li>
</ol>
@stop

@section('inner')
<div class="col-xs-12">
    <!-- general form elements -->
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Ubah Password</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        {{Form::open(array('method'=>'post', 'url'=>'/pupassworddosen'))}}
        <div class="box-body">
        	<div class="form-group">
        		<div class="row">
        			<div class="col-xs-5">
        				<label>Password Lama</label>
        				<input type="password" class="form-control" name="plama" placeholder="Password sebelumnya">
        			</div>
        		</div>
        	</div>
        	<div class="form-group">
        		<div class="row">
        			<div class="col-xs-5">
        				<label>Password Baru</label>
        				<input type="password" class="form-control" name="pbaru" placeholder="Password baru">
        			</div>
        		</div>
        	</div>
        	<div class="form-group">
        		<div class="row">
        			<div class="col-xs-5">
        				<p class="help-block">Ketikkan kembali password baru.</p>
        				<input type="password" class="form-control" name="pbaru2">
        			</div>
        		</div>
        	</div>
        </div><!-- /.box-body -->
        <div class="box-footer">
        	<button type="submit" class="btn btn-primary">Submit</button>
        	<button type="reset" class="btn btn-primary">Reset</button>
        </div>
        {{Form::close()}}
    </div><!-- /.box -->
</div><!-- /.col -->
@stop

@section('bagianjs')
<!-- Bootstrap 3.3.2 JS -->
{{HTML::script('/AdminLTE-2.1.1/bootstrap/js/bootstrap.min.js')}}
<!-- FastClick -->
{{HTML::script('/AdminLTE-2.1.1/plugins/fastclick/fastclick.min.js')}}
<!-- AdminLTE App -->
{{HTML::script('/AdminLTE-2.1.1/dist/js/app.min.js')}}
<!-- AdminLTE for demo purposes -->
{{HTML::script('/AdminLTE-2.1.1/dist/js/demo.js')}}
@stop