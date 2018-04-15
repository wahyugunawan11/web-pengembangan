@extends('layouts.adminlayout')

@section('title')
<title>Laporan Akhir PKM | Administrator | Pangkalan Data Penelitian</title>
@stop

@section('style')
<!-- Other Csses -->
{{HTML::style('AdminLTE-2.1.1/jquery-ui.css')}}
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
var cust; 
function vcust(wcust){ 
    if(wcust.length==0){
        document.getElementById("Ctekssugest").style.visibility = "hidden";
    }else{
        cust = bcust();
        var Curl="keyupdata.php";
        cust.onreadystatechange=Cchange;
        var Cvar = "Ctext="+wcust;
        cust.open("POST",Curl,true);
        //beberapa http header harus kita set kalau menggunakan POST
        cust.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        cust.setRequestHeader("Content-length", Cvar.length);
        cust.setRequestHeader("Connection", "close");
        cust.send(Cvar);
    }
}
function bcust(){
    if (window.XMLHttpRequest){
        return new XMLHttpRequest();
    }
    if (window.ActiveXObject){
        return new ActiveXObject("Microsoft.XMLHTTP");
    }
    return null;
}
function Cchange(){
    var Cfile;
    if (cust.readyState==4 && cust.status==200){
        Cfile=cust.responseText;
        if(Cfile.length>0){
            document.getElementById("Ctekssugest").innerHTML = Cfile;
            document.getElementById("Ctekssugest").style.visibility = "";
        }else{
            document.getElementById("Ctekssugest").innerHTML = "";
            document.getElementById("Ctekssugest").style.visibility = "hidden";
        }
    }
}
function Cisi(wcust){
    document.getElementById("wcust").value = wcust;
    document.getElementById("Ctekssugest").style.visibility = "hidden";
    document.getElementById("Ctekssugest").innerHTML = "";
}
/* Ajax */
function getIdDosen() {
    var nama = $('#wcust').val();
    $.ajax({
        type: 'post',
        url: 'getIdFromNama.php',
        data: {nama : nama},
        dataType: 'json',
        success: function(data) {
            console.log(data);
            $('#idketua2').val(data.iddosen);
        },
        error: function() {
            console.log("error");
        }
    });
}
</script>
<script>
var namaanggota1; 
function anggota1ku(anggota1){ 
    if(anggota1.length==0){
        document.getElementById("anggota1suggest").style.visibility = "hidden";
    }else{
        namaanggota1 = banggota1();
        var anggota1url="keyupdata_anggota1.php";
        namaanggota1.onreadystatechange=anggota1change;
        var anggota1var = "anggota1text="+anggota1;
        namaanggota1.open("POST",anggota1url,true);
        //beberapa http header harus kita set kalau menggunakan POST
        namaanggota1.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        namaanggota1.setRequestHeader("Content-length", anggota1var.length);
        namaanggota1.setRequestHeader("Connection", "close");
        namaanggota1.send(anggota1var);
    }
}
function banggota1(){
    if (window.XMLHttpRequest){
        return new XMLHttpRequest();
    }
    if (window.ActiveXObject){
        return new ActiveXObject("Microsoft.XMLHTTP");
    }
    return null;
}
function anggota1change(){
    var anggota1file;
    if (namaanggota1.readyState==4 && namaanggota1.status==200){
        anggota1file=namaanggota1.responseText;
        if(anggota1file.length>0){
            document.getElementById("anggota1suggest").innerHTML = anggota1file;
            document.getElementById("anggota1suggest").style.visibility = "";
        }else{
            document.getElementById("anggota1suggest").innerHTML = "";
            document.getElementById("anggota1suggest").style.visibility = "hidden";
        }
    }
}
function anggota1isi(anggota1){
    document.getElementById("anggota1").value = anggota1;
    document.getElementById("anggota1suggest").style.visibility = "hidden";
    document.getElementById("anggota1suggest").innerHTML = "";
}
/* Ajax */
function getIdA1() {
    var nanggota1 = $('#anggota1').val();
    $.ajax({
        type: 'post',
        url: 'getIdFromAnggota1.php',
        data: {nanggota1 : nanggota1},
        dataType: 'json',
        success: function(data) {
            console.log(data);
            $('#idanggota1').val(data.iddosen);
        },
        error: function() {
            console.log("error");
        }
    });
}
</script>
<script>
var namaanggota2; 
function anggota2ku(anggota2){ 
    if(anggota2.length==0){
        document.getElementById("anggota2suggest").style.visibility = "hidden";
    }else{
        namaanggota2 = banggota2();
        var anggota2url="keyupdata_anggota2.php";
        namaanggota2.onreadystatechange=anggota2change;
        var anggota2var = "anggota2text="+anggota2;
        namaanggota2.open("POST",anggota2url,true);
        //beberapa http header harus kita set kalau menggunakan POST
        namaanggota2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        namaanggota2.setRequestHeader("Content-length", anggota2var.length);
        namaanggota2.setRequestHeader("Connection", "close");
        namaanggota2.send(anggota2var);
    }
}
function banggota2(){
    if (window.XMLHttpRequest){
        return new XMLHttpRequest();
    }
    if (window.ActiveXObject){
        return new ActiveXObject("Microsoft.XMLHTTP");
    }
    return null;
}
function anggota2change(){
    var anggota2file;
    if (namaanggota2.readyState==4 && namaanggota2.status==200){
        anggota2file=namaanggota2.responseText;
        if(anggota2file.length>0){
            document.getElementById("anggota2suggest").innerHTML = anggota2file;
            document.getElementById("anggota2suggest").style.visibility = "";
        }else{
            document.getElementById("anggota2suggest").innerHTML = "";
            document.getElementById("anggota2suggest").style.visibility = "hidden";
        }
    }
}
function anggota2isi(anggota2){
    document.getElementById("anggota2").value = anggota2;
    document.getElementById("anggota2suggest").style.visibility = "hidden";
    document.getElementById("anggota2suggest").innerHTML = "";
}
/* Ajax */
function getIdA2() {
    var nanggota2 = $('#anggota2').val();
    $.ajax({
        type: 'post',
        url: 'getIdFromAnggota2.php',
        data: {nanggota2 : nanggota2},
        dataType: 'json',
        success: function(data) {
            console.log(data);
            $('#idanggota2').val(data.iddosen);
        },
        error: function() {
            console.log("error");
        }
    });
}
</script>
<script>
var namaanggota3; 
function anggota3ku(anggota3){ 
    if(anggota3.length==0){
        document.getElementById("anggota3suggest").style.visibility = "hidden";
    }else{
        namaanggota3 = banggota3();
        var anggota3url="keyupdata_anggota3.php";
        namaanggota3.onreadystatechange=anggota3change;
        var anggota3var = "anggota3text="+anggota3;
        namaanggota3.open("POST",anggota3url,true);
        //beberapa http header harus kita set kalau menggunakan POST
        namaanggota3.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        namaanggota3.setRequestHeader("Content-length", anggota3var.length);
        namaanggota3.setRequestHeader("Connection", "close");
        namaanggota3.send(anggota3var);
    }
}
function banggota3(){
    if (window.XMLHttpRequest){
        return new XMLHttpRequest();
    }
    if (window.ActiveXObject){
        return new ActiveXObject("Microsoft.XMLHTTP");
    }
    return null;
}
function anggota3change(){
    var anggota3file;
    if (namaanggota3.readyState==4 && namaanggota3.status==200){
        anggota3file=namaanggota3.responseText;
        if(anggota3file.length>0){
            document.getElementById("anggota3suggest").innerHTML = anggota3file;
            document.getElementById("anggota3suggest").style.visibility = "";
        }else{
            document.getElementById("anggota3suggest").innerHTML = "";
            document.getElementById("anggota3suggest").style.visibility = "hidden";
        }
    }
}
function anggota3isi(anggota3){
    document.getElementById("anggota3").value = anggota3;
    document.getElementById("anggota3suggest").style.visibility = "hidden";
    document.getElementById("anggota3suggest").innerHTML = "";
}
/* Ajax */
function getIdA3() {
    var nanggota3 = $('#anggota3').val();
    $.ajax({
        type: 'post',
        url: 'getIdFromAnggota3.php',
        data: {nanggota3 : nanggota3},
        dataType: 'json',
        success: function(data) {
            console.log(data);
            $('#idanggota3').val(data.iddosen);
        },
        error: function() {
            console.log("error");
        }
    });
}
</script>
<script>
var namaanggota4; 
function anggota4ku(anggota4){ 
    if(anggota4.length==0){
        document.getElementById("anggota4suggest").style.visibility = "hidden";
    }else{
        namaanggota4 = banggota4();
        var anggota4url="keyupdata_anggota4.php";
        namaanggota4.onreadystatechange=anggota4change;
        var anggota4var = "anggota4text="+anggota4;
        namaanggota4.open("POST",anggota4url,true);
        //beberapa http header harus kita set kalau menggunakan POST
        namaanggota4.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        namaanggota4.setRequestHeader("Content-length", anggota4var.length);
        namaanggota4.setRequestHeader("Connection", "close");
        namaanggota4.send(anggota4var);
    }
}
function banggota4(){
    if (window.XMLHttpRequest){
        return new XMLHttpRequest();
    }
    if (window.ActiveXObject){
        return new ActiveXObject("Microsoft.XMLHTTP");
    }
    return null;
}
function anggota4change(){
    var anggota4file;
    if (namaanggota4.readyState==4 && namaanggota4.status==200){
        anggota4file=namaanggota4.responseText;
        if(anggota4file.length>0){
            document.getElementById("anggota4suggest").innerHTML = anggota4file;
            document.getElementById("anggota4suggest").style.visibility = "";
        }else{
            document.getElementById("anggota4suggest").innerHTML = "";
            document.getElementById("anggota4suggest").style.visibility = "hidden";
        }
    }
}
function anggota4isi(anggota4){
    document.getElementById("anggota4").value = anggota4;
    document.getElementById("anggota4suggest").style.visibility = "hidden";
    document.getElementById("anggota4suggest").innerHTML = "";
}
/* Ajax */
function getIdA4() {
    var nanggota4 = $('#anggota4').val();
    $.ajax({
        type: 'post',
        url: 'getIdFromAnggota4.php',
        data: {nanggota4 : nanggota4},
        dataType: 'json',
        success: function(data) {
            console.log(data);
            $('#idanggota4').val(data.iddosen);
        },
        error: function() {
            console.log("error");
        }
    });
}
</script>
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
<li class="treeview active">
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
        <li class="active">
            <a href="#"><i class="fa fa-circle-o"></i> Laporan akhir <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
                <li class="active"><a href="{{URL::to('/adminpkmfinal')}}"><i class="fa fa-circle-o"></i> Lihat data</a></li>
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
	Laporan akhir PKM
	<small>Halaman administrator</small>
</h1>
<ol class="breadcrumb">
	<li><a href="{{URL::to('/adminhome')}}"><i class="fa fa-dashboard"></i> Beranda</a></li>
    <li><a href="#">Manajemen PKM</a></li>
    <li><a href="#">Laporan akhir</a></li>
	<li class="active">Ubah data</li>
</ol>
@stop

@section('inner')
<div class="col-xs-12">
    <!-- general form elements -->
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Ubah Data Laporan Akhir PKM</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        @foreach ($laporanakhirpkm as $index => $laporanakhirpkm2)
        {{Form::open(array('method'=>'post', 'url'=>'/proses_uakhirpkm/'.$laporanakhirpkm2->idlakhir_pkm, 'files'=>'true'))}}
        <div class="box-body">
        	<div class="form-group">
                <label>Judul</label>
                <input type="text" class="form-control" name="judul" value='{{$laporanakhirpkm2->judul}}'>
        	</div>
            <div class="form-group">
                <div class="row">
                    <div class="col-xs-4">
                        <label>Sumber Dana</label>
                        <input type="text" class="form-control" name="sumberdana" value='{{$laporanakhirpkm2->sumberdana}}'>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Tahun</label>
                <select class="form-control" name="tahun">
                    <option value="{{$laporanakhirpkm2->tahun}}">{{$laporanakhirpkm2->tahun}}</option>
                    <?php 
                    for ($i=1970;$i<=2100;$i++){
                        $tahun=$i;
                         ?>
                    <option value="{{$tahun}}">{{$tahun}}</option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputFile">File</label>
                <input type="file" id="exampleInputFile" name="namafile">
                <p class="help-block">Pilih file laporan akhir PKM (ekstensi *.pdf)</p>
                <?php
                    if($laporanakhirpkm2->namafileakhir != "")
                        echo '<p class="help-block" style="color:green"><b>Laporan akhir PKM sudah pernah di-upload.</b></p>';
                    else
                        echo '<p class="help-block" style="color:red"><b>Laporan akhir PKM belum di-upload!</b></p>';
                ?>
            </div>
            <div class="form-group">
                <label>Status File</label>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <input type="radio" name="statusfile" value="1" <?php if($laporanakhirpkm2->statusfile == "1") echo 'checked="checked"'; ?>>
                            </span>
                            Open
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <input type="radio" name="statusfile" value="2" <?php if($laporanakhirpkm2->statusfile == "2") echo 'checked="checked"'; ?>>
                            </span>
                            Protected
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Abstrak</label>
                <textarea class="form-control" rows="3" placeholder="Abstrak" name="abstrak">{{$laporanakhirpkm2->abstrak}}</textarea>
            </div>
            <div class="form-group">
                <label>Program Studi</label>
                <select class="form-control" name="idprodi">
                    <option value="{{$laporanakhirpkm2->akhiridprodi}}">{{$laporanakhirpkm2->programstudi}}</option>
                    @foreach($programstudi as $index => $programstudi2)
                    <option value="{{$programstudi2->idprodi}}">{{$programstudi2->programstudi}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Skim Penelitian</label>
                <select class="form-control" name="idskimpenelitian">
                    <option value="{{$laporanakhirpkm2->aidskimpenelitian}}">{{$laporanakhirpkm2->skim}}</option>
                    @foreach($skimpenelitian as $index => $skimpenelitian2)
                    <option value="{{$skimpenelitian2->idskimpenelitian}}">{{$skimpenelitian2->skim}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Bidang Ilmu</label>
                <select class="form-control" name="idbidilmu">
                    <option value="{{$laporanakhirpkm2->akhiridbidilmu}}">{{$laporanakhirpkm2->bidangilmu}}</option>
                    @foreach($bidangilmu as $index => $bidangilmu2)
                    <option value="{{$bidangilmu2->idbidilmu}}">{{$bidangilmu2->bidangilmu}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Fakultas</label>
                <select class="form-control" name="idfakultas">
                    <option value="{{$laporanakhirpkm2->akhiridfakultas}}">{{$laporanakhirpkm2->fakultas}}</option>
                    @foreach($fakultas as $index => $fakultas2)
                    <option value="{{$fakultas2->idfakultas}}">{{$fakultas2->fakultas}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Ketua</label>
                <input type="text" class="form-control" name="idketua" value="{{$laporanakhirpkm2->ketua}}" id="wcust" onKeyUp='vcust(this.value)' />
                <button type="button" class="btn btn-primary" name="ok" onclick="getIdDosen()">...</button>
                <div id='Ctekssugest' style='position:absolute; background-color:white;width:200;visibility:hidden;z-index:100'></div>
                <input type="text" class="form-control" name="idketua2" value="{{$laporanakhirpkm2->akhiridketua}}" id='idketua2'>
            </div>
            <div class="form-group">
                <label>Anggota 1</label>
                <input type="text" class="form-control" name="anggota1" value="{{$laporanakhirpkm2->anggota1}}" id="anggota1" onKeyUp='anggota1ku(this.value)' />
                <button type="button" class="btn btn-primary" name="okanggota1" onclick="getIdA1()">...</button>
                <div id='anggota1suggest' style='position:absolute; background-color:white;width:200;visibility:hidden;z-index:100'></div>
                <input type="text" class="form-control" name="idanggota1" value="{{$laporanakhirpkm2->aidanggota1}}" id='idanggota1'>
            </div>
            <div class="form-group">
                <label>Anggota 2</label>
                <input type="text" class="form-control" name="anggota2" value="{{$laporanakhirpkm2->anggota2}}" id="anggota2" onKeyUp='anggota2ku(this.value)' />
                <button type="button" class="btn btn-primary" name="okanggota2" onclick="getIdA2()">...</button>
                <div id='anggota2suggest' style='position:absolute; background-color:white;width:200;visibility:hidden;z-index:100'></div>
                <input type="text" class="form-control" name="idanggota2" value="{{$laporanakhirpkm2->aidanggota2}}" id='idanggota2'>
            </div>
            <div class="form-group">
                <label>Anggota 3</label>
                <input type="text" class="form-control" name="anggota3" value="{{$laporanakhirpkm2->anggota3}}" id="anggota3" onKeyUp='anggota3ku(this.value)' />
                <button type="button" class="btn btn-primary" name="okanggota3" onclick="getIdA3()">...</button>
                <div id='anggota3suggest' style='position:absolute; background-color:white;width:200;visibility:hidden;z-index:100'></div>
                <input type="text" class="form-control" name="idanggota3" value="{{$laporanakhirpkm2->aidanggota3}}" id='idanggota3'>
            </div>
            <div class="form-group">
                <label>Anggota 4</label>
                <input type="text" class="form-control" name="anggota4" value="{{$laporanakhirpkm2->anggota4}}" id="anggota4" onKeyUp='anggota4ku(this.value)' />
                <button type="button" class="btn btn-primary" name="okanggota4" onclick="getIdA4()">...</button>
                <div id='anggota4suggest' style='position:absolute; background-color:white;width:200;visibility:hidden;z-index:100'></div>
                <input type="text" class="form-control" name="idanggota4" value="{{$laporanakhirpkm2->aidanggota4}}" id='idanggota4'>
            </div>
            <div class="form-group">
                <label>Anggota Lain</label>
                <input type="text" class="form-control" name="anggotalain" value="{{$laporanakhirpkm2->anggotalain}}">
            </div>
        </div><!-- /.box-body -->
        <div class="box-footer">
        	<button type="submit" class="btn btn-primary">Submit</button>
        	<button type="reset" class="btn btn-primary">Reset</button>
        </div>
        {{Form::close()}}
        @endforeach
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
<!-- Other scripts -->
{{HTML::script('/AdminLTE-2.1.1/jquery-ui.js')}}
@stop