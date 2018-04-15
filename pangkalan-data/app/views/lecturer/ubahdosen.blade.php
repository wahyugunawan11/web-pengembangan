@extends('layouts.layoutdosen')
@section('title')
<title>Data Dosen | Pangkalan Data Penelitian</title>
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
@stop

@section('include')
<script>
@if ($statusinput == 'failed')
alert("Data belum lengkap!");
@elseif ($statusinput == 'Sukses')
alert("Profil berhasil diubah.");
@endif
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
	Data dosen
	<small>Halaman dosen</small>
</h1>
<ol class="breadcrumb">
	<li><a href="{{URL::to('/lecturerhome')}}"><i class="fa fa-dashboard"></i> Beranda</a></li>
    <li class="active">Ubah Profil</li>
</ol>
@stop
@section('inner')
<div class="col-xs-12">
    <!-- general form elements -->
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Ubah Profil</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        {{Form::open(array('method'=>'post', 'url'=>'/proses_updosen', 'files'=>'true'))}}
        <div class="box-body">
        	<div class="form-group">
        		<div class="row">
        			<div class="col-xs-4">
        				<label>NIDN</label>
        				<input type="text" class="form-control" name="nidn" value='{{$dosen2->nidn}}'>
        			</div>
        		</div>
        	</div>
        	<div class="form-group">
        		<div class="row">
        			<div class="col-xs-5">
        				<label>Nama</label>
        				<input type="text" class="form-control" name="nama" value='{{$dosen2->nama}}'>
        			</div>
        		</div>
        	</div>
        	<div class="form-group">
        		<div class="row">
        			<div class="col-xs-5">
        				<label>Username</label>
        				<input type="text" class="form-control" name="username" value='{{$dosen2->username}}'>
        			</div>
        		</div>
        	</div>
        	<div class="form-group">
        		<div class="row">
        			<?php $pangkatgolongan = explode("/", "{$dosen2->pangkatgolongan}"); ?>
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
        				<input type="text" class="form-control" name="email" value='{{$dosen2->email}}'>
        			</div>
        		</div>
        	</div>
        	<div class="form-group">
        		<label>No. Telp.</label>
        		<div class="input-group">
        			<div class="input-group-addon">
        				<i class="fa fa-phone"></i>
        			</div>
        			<input type="text" class="form-control" name="notelp" value='{{$dosen2->notelp}}' data-inputmask="'mask': ['099999999999']" data-mask/>
        		</div>
        	</div>
        	<div class="form-group">
        		<label for="exampleInputFile">Foto</label>
        		<br>
                @if($dosen2->namafile == '')
                <img src="{{URL::to('erudite-pack/Preview_Not_Available-500x500.jpg')}}" width="300px">
                @elseif($dosen2->namafile != '')
        		<img src="{{URL::to('Images_Dosen/'.$dosen2->namafile)}}" width="300px">
                @endif
        		<br>
        		<input type="file" id="exampleInputFile" name="namafile">
        		<p class="help-block">Pilih foto dosen.</p>
        	</div>
        	<div class="form-group">
        		<div class="row">
        			<div class="col-xs-5">
        				<label>NIP</label>
        				<input type="text" class="form-control" name="nip" value='{{$dosen2->nip}}'>
        			</div>
        		</div>
        	</div>
        	<div class="form-group">
        		<div class="row">
        			<div class="col-xs-5">
        				<label>Tempat lahir</label>
        				<input type="text" class="form-control" name="tempatlahir" value='{{$dosen2->tempatlahir}}'>
        			</div>
        		</div>
        	</div>
        	<div class="form-group">
        		<label>Tanggal lahir:</label>
        		<div class="input-group">
        			<div class="input-group-addon">
        				<i class="fa fa-calendar"></i>
        			</div>
        			<input type="text" class="form-control" name="tanggallahir" value='{{$dosen2->tanggallahir}}' data-inputmask="'alias': 'yyyy-mm-dd'" data-mask/>
        		</div>
        	</div>
        	<div class="form-group">
        		<label>Jenis Kelamin</label>
        		<div class="row">
        			<div class="col-lg-6">
        				<div class="input-group">
        					<span class="input-group-addon">
        						<input type="radio" name="jeniskelamin" value="L" <?php if($dosen2->jeniskelamin == "L") echo 'checked="checked"'; ?>>
        					</span>
        					Laki-laki
        				</div>
        			</div>
        		</div>
        		<div class="row">
        			<div class="col-lg-6">
        				<div class="input-group">
        					<span class="input-group-addon">
        						<input type="radio" name="jeniskelamin" value="P" <?php if($dosen2->jeniskelamin == "P") echo 'checked="checked"'; ?>>
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
        						<input type="radio" name="jabatanfungsional" value="GB" <?php if($dosen2->jabatanfungsional == "GB") echo 'checked="checked"'; ?>>
        					</span>
        					Guru Besar
        				</div>
        			</div>
        		</div>
        		<div class="row">
        			<div class="col-lg-6">
        				<div class="input-group">
        					<span class="input-group-addon">
        						<input type="radio" name="jabatanfungsional" value="LK" <?php if($dosen2->jabatanfungsional == "LK") echo 'checked="checked"'; ?>>
        					</span>
        					Lektor Kepala
        				</div>
        			</div>
        		</div>
        		<div class="row">
        			<div class="col-lg-6">
        				<div class="input-group">
        					<span class="input-group-addon">
        						<input type="radio" name="jabatanfungsional" value="L" <?php if($dosen2->jabatanfungsional == "L") echo 'checked="checked"'; ?>>
        					</span>
        					Lektor
        				</div>
        			</div>
        		</div>
        		<div class="row">
        			<div class="col-lg-6">
        				<div class="input-group">
        					<span class="input-group-addon">
        						<input type="radio" name="jabatanfungsional" value="AA" <?php if($dosen2->jabatanfungsional == "AA") echo 'checked="checked"'; ?>>
        					</span>
        					Asisten Ahli
        				</div>
        			</div>
        		</div>
        		<div class="row">
        			<div class="col-lg-6">
        				<div class="input-group">
        					<span class="input-group-addon">
        						<input type="radio" name="jabatanfungsional" value="TP" <?php if($dosen2->jabatanfungsional == "TP") echo 'checked="checked"'; ?>>
        					</span>
        					Tenaga Pengajar
        				</div>
        			</div>
        		</div>
        	</div>
        	<div class="form-group">
        		<label>Fakultas</label>
        		<select class="form-control" name="idfakultas">
        			<option value="{{$dosen2->idfakultas}}">{{$dosen2->fakultas}}</option>
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
<!-- FastClick -->
{{HTML::script('/AdminLTE-2.1.1/plugins/fastclick/fastclick.min.js')}}
<!-- AdminLTE App -->
{{HTML::script('/AdminLTE-2.1.1/dist/js/app.min.js')}}
<!-- AdminLTE for demo purposes -->
{{HTML::script('/AdminLTE-2.1.1/dist/js/demo.js')}}
@stop