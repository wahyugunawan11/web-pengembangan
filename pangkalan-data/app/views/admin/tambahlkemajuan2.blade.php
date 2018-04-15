@extends('layouts.adminlayout')
@section('title')
<title>Tambah Laporan Kemajuan | Administrator | Pangkalan Data Penelitian</title>
@stop

@section('style')
<!-- Bootstrap 3.3.4 -->
{{HTML::style('AdminLTE-2.1.1/bootstrap/css/bootstrap.min.css')}}
<!-- Other Csses -->
<link rel="stylesheet" href="http://codeorigin.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
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
<!-- modernizr enables HTML5 elements and feature detects -->
{{HTML::script('/userCss/js/modernizr-1.5.min.js')}}
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
<li class="treeview active">
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
        <li class="active">
            <a href="#"><i class="fa fa-circle-o"></i> Laporan kemajuan <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
                <li><a href="{{URL::to('/adminprogress')}}"><i class="fa fa-circle-o"></i> Lihat data</a></li>
                <li class="active"><a href="{{URL::to('/admin_addprogress')}}"><i class="fa fa-circle-o"></i> Tambah data</a></li>
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
        <li class="active"><a href="{{URL::to('/admin_addprogram')}}"><i class="fa fa-circle-o"></i> Tambah data</a></li>
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
	Laporan kemajuan
	<small>Halaman administrator</small>
</h1><br>
<ol class="breadcrumb">
	<li><a href="{{URL::to('/adminhome')}}"><i class="fa fa-dashboard"></i> Beranda</a></li>
    <li><a href="#">Manajemen penelitian</a></li>
    <li><a href="#">Laporan kemajuan</a></li>
	<li class="active">Tambah data</li>
</ol>
@stop

@section('inner')
<div class="col-xs-12">
    <!-- general form elements -->
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Tambah Data Laporan Kemajuan</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        @foreach ($proposal as $index => $proposal2)
        {{Form::open(array('method'=>'post', 'url'=>'/proses_tambahkemajuan', 'files'=>'true'))}}
        <div class="box-body">
            <div class="form-group">
                <label>Judul</label>
                <input type="text" class="form-control" name="judul" value='{{$proposal2->judul}}'>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-xs-4">
                        <label>Sumber Dana</label>
                        <input type="text" class="form-control" name="sumberdana" value='{{$proposal2->sumberdana}}'>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-xs-4">
                        <label>Tahun</label>
                        <input type="text" class="form-control" name="tkemajuan" value=
                        <?php
                            $tkemajuan=$proposal2->tahun + 1;
                        ?>
                        '{{$tkemajuan}}'>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputFile">File</label>
                <input type="file" id="exampleInputFile" name="namafile">
                <p class="help-block">Pilih file laporan kemajuan (ekstensi *.pdf)</p>
            </div>
            <div class="form-group">
                <label>Status File</label>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <input type="radio" name="statusfile" value="1" checked>
                            </span>
                            Open
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <input type="radio" name="statusfile" value="2">
                            </span>
                            Protected
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Abstrak</label>
                <textarea class="form-control" rows="3" name="abstrak">{{$proposal2->abstrak}}</textarea>
            </div>
            <div class="form-group">
                <label>Program Studi</label>
                <select class="form-control" name="idprodi">
                    <option value="{{$proposal2->proposalidprodi}}">{{$proposal2->programstudi}}</option>
                    @foreach($programstudi as $index => $programstudi2)
                    <option value="{{$programstudi2->idprodi}}">{{$programstudi2->programstudi}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Skim Penelitian</label>
                <select class="form-control" name="idskimpenelitian">
                    <option value="{{$proposal2->pidskimpenelitian}}">{{$proposal2->skim}}</option>
                    @foreach($skimpenelitian as $index => $skimpenelitian2)
                    <option value="{{$skimpenelitian2->idskimpenelitian}}">{{$skimpenelitian2->skim}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Bidang Ilmu</label>
                <select class="form-control" name="idbidilmu">
                    <option value="{{$proposal2->proposalidbidilmu}}">{{$proposal2->bidangilmu}}</option>
                    @foreach($bidangilmu as $index => $bidangilmu2)
                    <option value="{{$bidangilmu2->idbidilmu}}">{{$bidangilmu2->bidangilmu}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Fakultas</label>
                <select class="form-control" name="idfakultas">
                    <option value="{{$proposal2->proposalidfakultas}}">{{$proposal2->fakultas}}</option>
                    @foreach($fakultas as $index => $fakultas2)
                    <option value="{{$fakultas2->idfakultas}}">{{$fakultas2->fakultas}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Ketua</label>
                <input type="text" class="form-control" name="ketua" value="{{$proposal2->ketua}}"/>
                <input type="text" class="form-control" name="idketua" value="{{$proposal2->proposalidketua}}">
            </div>
            <div class="form-group">
                <label>Anggota 1</label>
                <input type="text" class="form-control" name="anggota1" value="{{$proposal2->anggota1}}"/>
                <input type="text" class="form-control" name="idanggota1" value="{{$proposal2->pidanggota1}}">
            </div>
            <div class="form-group">
                <label>Anggota 2</label>
                <input type="text" class="form-control" name="anggota2" value="{{$proposal2->anggota2}}"/>
                <input type="text" class="form-control" name="idanggota2" value="{{$proposal2->pidanggota2}}">
            </div>
            <div class="form-group">
                <label>Anggota 3</label>
                <input type="text" class="form-control" name="anggota3" value="{{$proposal2->anggota3}}"/>
                <input type="text" class="form-control" name="idanggota3" value="{{$proposal2->pidanggota3}}">
            </div>
            <div class="form-group">
                <label>Anggota 4</label>
                <input type="text" class="form-control" name="anggota4" value="{{$proposal2->anggota4}}"/>
                <input type="text" class="form-control" name="idanggota4" value="{{$proposal2->pidanggota4}}">
            </div>
            <div class="form-group">
                <label>Anggota Lain</label>
                <input type="text" class="form-control" value="{{$proposal2->anggotalain}}" name="anggotalain">
            </div>
        </div><!-- /.box-body -->
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="reset" class="btn btn-primary">Reset</button>
        </div>
        {{Form::close()}}
        @endforeach
    </div><!-- /.box -->
</div><!-- /.col -->
@stop

@section('bagianjs')
{{HTML::script('/userCss/js/jquery-2.1.1.min.js')}}
<!-- Bootstrap 3.3.2 JS -->
{{HTML::script('/AdminLTE-2.1.1/bootstrap/js/bootstrap.min.js')}}
<!-- FastClick -->
{{HTML::script('/AdminLTE-2.1.1/plugins/fastclick/fastclick.min.js')}}
<!-- AdminLTE App -->
{{HTML::script('/AdminLTE-2.1.1/dist/js/app.min.js')}}
<!-- AdminLTE for demo purposes -->
{{HTML::script('/AdminLTE-2.1.1/dist/js/demo.js')}}
<!-- Other scripts -->
{{HTML::script('/AdminLTE-2.1.1/jquery-ui.js')}}
<script type="text/javascript">
    $(document).ready(function(){
        $('input:text').bind({});
        $("#auto").autocomplete({
            minLength:3,
            autoFocus:true,
            source:'{{URL('getproposal')}}'
        });
    });
</script>
@stop