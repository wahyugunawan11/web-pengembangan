@extends('layouts.adminlayout')
@section('title')
<title>Dosen | Administrator | Pangkalan Data Penelitian</title>
@stop
@section('style')
<!-- Bootstrap 3.3.4 -->
{{HTML::style('AdminLTE-2.1.1/bootstrap/css/bootstrap.min.css')}}
<!-- FontAwesome 4.3.0 -->
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<!-- Ionicons 2.0.0 -->
{{HTML::style('AdminLTE-2.1.1/ionicons.min.css')}}
<!-- daterange picker -->
{{HTML::style('AdminLTE-2.1.1/plugins/daterangepicker/daterangepicker-bs3.css')}}
<!-- iCheck for checkboxes and radio inputs -->
{{HTML::style('AdminLTE-2.1.1/plugins/iCheck/all.css')}}
<!-- Bootstrap Color Picker -->
{{HTML::style('AdminLTE-2.1.1/plugins/colorpicker/bootstrap-colorpicker.min.css')}}
<!-- Bootstrap time Picker -->
{{HTML::style('AdminLTE-2.1.1/plugins/timepicker/bootstrap-timepicker.min.css')}}
<!-- Theme style -->
{{HTML::style('AdminLTE-2.1.1/dist/css/AdminLTE.min.css')}}
<!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
{{HTML::style('AdminLTE-2.1.1/dist/css/skins/_all-skins.min.css')}}
<!-- Theme style -->
{{HTML::style('AdminLTE-2.1.1/plugins/iCheck/all.css')}}
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
@stop

@section('include')
<script>
@if ($statusinput == 'failed')
alert("Data belum lengkap!");
@endif
</script>
@stop

@section('sidebar')
<li class="">
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
<li class="treeview active">
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
<li>
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
<h1>
	Dosen
	<small>Halaman administrator</small>
</h1>
<ol class="breadcrumb">
	<li><a href="{{URL::to('/adminhome')}}"><i class="fa fa-dashboard"></i> Beranda</a></li>
    <li><a href="#">Manajemen dosen</a></li>
	<li class="active">Ubah data</li>
</ol>
@stop
@section('inner')
<div class="col-xs-12">
    <!-- general form elements -->
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Ubah Data Dosen</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        {{Form::open(array('method'=>'post', 'url'=>'/proses_ubahdosen/'.$dosen->iddosen, 'files'=>'true'))}}
        <div class="box-body">
        	<div class="form-group">
        		<div class="row">
        			<div class="col-xs-4">
        				<label>NIDN</label>
        				<input type="text" class="form-control" name="nidn" value='{{$dosen->nidn}}'>
        			</div>
        		</div>
        	</div>
        	<div class="form-group">
        		<div class="row">
        			<div class="col-xs-5">
        				<label>Nama</label>
        				<input type="text" class="form-control" name="nama" value='{{$dosen->nama}}'>
        			</div>
        		</div>
        	</div>
        	<div class="form-group">
        		<div class="row">
        			<div class="col-xs-5">
        				<label>Username</label>
        				<input type="text" class="form-control" name="username" value='{{$dosen->username}}'>
        			</div>
        		</div>
        	</div>
        	<div class="form-group">
        		<div class="row">
        			<div class="col-xs-5">
        				<label>Password</label>
        				<input type="text" class="form-control" name="password" value='{{$dosen->password}}'>
        			</div>
        		</div>
        	</div>
        	<div class="form-group">
        		<div class="row">
        			<?php $pangkatgolongan = explode("/", "{$dosen->pangkatgolongan}"); ?>
        			<div class="col-xs-3">
        				<label>Pangkat</label>
        				<input type="text" class="form-control" name="pangkat" value='{{@$pangkatgolongan[0]}}'>
        			</div>
        			<div class="col-xs-3">
        				<label>Golongan</label>
        				<input type="text" class="form-control" name="golongan" value='{{@$pangkatgolongan[1]}}'>
        			</div>
        		</div>
        	</div>
        	<div class="form-group">
        		<div class="row">
        			<div class="col-xs-5">
        				<label>E-mail</label>
        				<input type="text" class="form-control" name="email" value='{{$dosen->email}}'>
        			</div>
        		</div>
        	</div>
        	<div class="form-group">
        		<label>No. Telp.</label>
        		<div class="input-group">
        			<div class="input-group-addon">
        				<i class="fa fa-phone"></i>
        			</div>
        			<input type="text" class="form-control" name="notelp" value='{{$dosen->notelp}}' data-inputmask="'mask': ['099999999999']" data-mask/>
        		</div>
        	</div>
        	<div class="form-group">
        		<label for="exampleInputFile">Foto</label>
        		<br>
        		<img src="{{URL::to('Images_Dosen/'.$dosen->namafile)}}" width="300px">
        		<br>
        		<input type="file" id="exampleInputFile" name="namafile">
        		<p class="help-block">Pilih foto dosen.</p>
        	</div>
        	<div class="form-group">
        		<div class="row">
        			<div class="col-xs-5">
        				<label>NIP</label>
        				<input type="text" class="form-control" name="nip" value='{{$dosen->nip}}'>
        			</div>
        		</div>
        	</div>
        	<div class="form-group">
        		<div class="row">
        			<div class="col-xs-5">
        				<label>Tempat lahir</label>
        				<input type="text" class="form-control" name="tempatlahir" value='{{$dosen->tempatlahir}}'>
        			</div>
        		</div>
        	</div>
        	<div class="form-group">
        		<label>Tanggal lahir:</label>
        		<div class="input-group">
        			<div class="input-group-addon">
        				<i class="fa fa-calendar"></i>
        			</div>
        			<input type="text" class="form-control" name="tanggallahir" value='{{$dosen->tanggallahir}}' data-inputmask="'alias': 'yyyy-mm-dd'" data-mask/>
        		</div>
        	</div>
        	<div class="form-group">
        		<label>Jenis Kelamin</label>
        		<div class="row">
        			<div class="col-lg-6">
        				<div class="input-group">
        					<span class="input-group-addon">
        						<input type="radio" name="jeniskelamin" value="L" <?php if($dosen->jeniskelamin == "L") echo 'checked="checked"'; ?>>
        					</span>
        					Laki-laki
        				</div>
        			</div>
        		</div>
        		<div class="row">
        			<div class="col-lg-6">
        				<div class="input-group">
        					<span class="input-group-addon">
        						<input type="radio" name="jeniskelamin" value="P" <?php if($dosen->jeniskelamin == "P") echo 'checked="checked"'; ?>>
        					</span>
        					Perempuan
        				</div>
        			</div>
        		</div>
        	</div>
        	<div class="form-group">
        		<label>Jabatan Fungsional</label>
        		<div class="row">
        			<div class="col-lg-6">
        				<div class="input-group">
        					<span class="input-group-addon">
        						<input type="radio" name="jabatanfungsional" value="GB" <?php if($dosen->jabatanfungsional == "GB") echo 'checked="checked"'; ?>>
        					</span>
        					Guru Besar
        				</div>
        			</div>
        		</div>
        		<div class="row">
        			<div class="col-lg-6">
        				<div class="input-group">
        					<span class="input-group-addon">
        						<input type="radio" name="jabatanfungsional" value="LK" <?php if($dosen->jabatanfungsional == "LK") echo 'checked="checked"'; ?>>
        					</span>
        					Lektor Kepala
        				</div>
        			</div>
        		</div>
        		<div class="row">
        			<div class="col-lg-6">
        				<div class="input-group">
        					<span class="input-group-addon">
        						<input type="radio" name="jabatanfungsional" value="L" <?php if($dosen->jabatanfungsional == "L") echo 'checked="checked"'; ?>>
        					</span>
        					Lektor
        				</div>
        			</div>
        		</div>
        		<div class="row">
        			<div class="col-lg-6">
        				<div class="input-group">
        					<span class="input-group-addon">
        						<input type="radio" name="jabatanfungsional" value="AA" <?php if($dosen->jabatanfungsional == "AA") echo 'checked="checked"'; ?>>
        					</span>
        					Asisten Ahli
        				</div>
        			</div>
        		</div>
        		<div class="row">
        			<div class="col-lg-6">
        				<div class="input-group">
        					<span class="input-group-addon">
        						<input type="radio" name="jabatanfungsional" value="TP" <?php if($dosen->jabatanfungsional == "TP") echo 'checked="checked"'; ?>>
        					</span>
        					Tenaga Pengajar
        				</div>
        			</div>
        		</div>
        	</div>
        	<div class="form-group">
        		<label>Fakultas</label>
        		<select class="form-control" name="idfakultas">
        			<option value="{{$dosen->idfakultas}}">{{$dosen->fakultas}}</option>
        			@foreach($fakultas as $index => $fakultas2)
        			<option value="{{$fakultas2->idfakultas}}">{{$fakultas2->fakultas}}</option>
        			@endforeach
        		</select>
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
<!-- jQuery 2.1.4 -->
{{HTML::script('/AdminLTE-2.1.1/plugins/jQuery/jQuery-2.1.4.min.js')}}
<!-- Bootstrap 3.3.2 JS -->
{{HTML::script('/AdminLTE-2.1.1/bootstrap/js/bootstrap.min.js')}}
<!-- InputMask -->
{{HTML::script('/AdminLTE-2.1.1/plugins/input-mask/jquery.inputmask.js')}}
{{HTML::script('/AdminLTE-2.1.1/plugins/input-mask/jquery.inputmask.date.extensions.js')}}
{{HTML::script('/AdminLTE-2.1.1/plugins/input-mask/jquery.inputmask.extensions.js')}}
<!-- date-range-picker -->
{{HTML::script('/AdminLTE-2.1.1/moment.min.js')}}
{{HTML::script('/AdminLTE-2.1.1/plugins/daterangepicker/daterangepicker.js')}}
<!-- bootstrap color picker -->
{{HTML::script('/AdminLTE-2.1.1/plugins/colorpicker/bootstrap-colorpicker.min.js')}}
<!-- bootstrap time picker -->
{{HTML::script('/AdminLTE-2.1.1/plugins/timepicker/bootstrap-timepicker.min.js')}}
<!-- SlimScroll 1.3.0 -->
{{HTML::script('/AdminLTE-2.1.1/plugins/slimScroll/jquery.slimscroll.min.js')}}
<!-- iCheck 1.0.1 -->
{{HTML::script('/AdminLTE-2.1.1/plugins/iCheck/icheck.min.js')}}
<!-- FastClick -->
{{HTML::script('/AdminLTE-2.1.1/plugins/fastclick/fastclick.min.js')}}
<!-- AdminLTE App -->
{{HTML::script('/AdminLTE-2.1.1/dist/js/app.min.js')}}
<!-- AdminLTE for demo purposes -->
{{HTML::script('/AdminLTE-2.1.1/dist/js/demo.js')}}
@stop
@section('include2')
<script type="text/javascript">
$(function () {
//Datemask dd/mm/yyyy
$("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
//Datemask2 mm/dd/yyyy
$("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
//Money Euro
$("[data-mask]").inputmask();
//Date range picker
$('#reservation').daterangepicker();
//Date range picker with time picker
$('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
//Date range as a button
$('#daterange-btn').daterangepicker(
	{
		ranges: {
			'Today': [moment(), moment()],
			'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
			'Last 7 Days': [moment().subtract('days', 6), moment()],
			'Last 30 Days': [moment().subtract('days', 29), moment()],
			'This Month': [moment().startOf('month'), moment().endOf('month')],
			'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
		},
		startDate: moment().subtract('days', 29),
		endDate: moment()
	},
	function (start, end) {
		$('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
	}
	);
	//iCheck for checkbox and radio inputs
	$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
		checkboxClass: 'icheckbox_minimal-blue',
		radioClass: 'iradio_minimal-blue'
	});
	//Red color scheme for iCheck
	$('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
		checkboxClass: 'icheckbox_minimal-red',
		radioClass: 'iradio_minimal-red'
	});
	//Flat red color scheme for iCheck
	$('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
		checkboxClass: 'icheckbox_flat-green',
		radioClass: 'iradio_flat-green'
	});
	//Colorpicker
	$(".my-colorpicker1").colorpicker();
	//color picker with addon
	$(".my-colorpicker2").colorpicker();
	//Timepicker
	$(".timepicker").timepicker({
		showInputs: false
	});
});
</script>
@stop