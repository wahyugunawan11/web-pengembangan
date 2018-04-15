@extends('layouts.layoutdosen')

@section('title')
<title>Proposal PKM | Dosen | Pangkalan Data Penelitian</title>
@stop

@section('style')
<!-- Bootstrap 3.3.4 -->
{{HTML::style('AdminLTE-2.1.1/bootstrap/css/bootstrap.min.css')}}
<!-- FontAwesome 4.3.0 -->
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<!-- Ionicons 2.0.0 -->
{{HTML::style('AdminLTE-2.1.1/ionicons.min.css')}}
<!-- DATA TABLES -->
{{HTML::style('AdminLTE-2.1.1/plugins/datatables/dataTables.bootstrap.css')}}
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
<script type="text/javascript">
function hapusproposalpkm(idproposalpkm){
    var hasil = confirm('Apakah Anda yakin ingin menghapus data?');
    if(hasil==true){
        window.location.href="proses_hppkmdosen/"+idproposalpkm;
    }
}
</script>
@stop

@section('sidebar')
<li>
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
<li class="treeview active">
    <a href="#">
        <i class="fa fa-database"></i>
        <span>Manajemen proposal PKM</span>
        <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
        <li class="active"><a href="{{URL::to('/lecturerpkmproposal')}}"><i class="fa fa-circle-o"></i> Lihat data</a></li>
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
    Proposal PKM
    <small>Halaman dosen</small>
</h1>
<ol class="breadcrumb">
    <li><a href="{{URL::to('/lecturerhome')}}"><i class="fa fa-dashboard"></i> Beranda</a></li>
    <li><a href="#">Manajemen proposal PKM</a></li>
    <li class="active">Lihat data</li>
</ol>
@stop

@section('inner')
<div class="col-xs-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Judul</th>
                        <th>Sumber Dana</th>
                        <th>Tahun</th>
                        <th>Abstrak</th>
                        <th>Program Studi</th>
                        <th>Skim</th>
                        <th>Bidang Ilmu</th>
                        <th>Fakultas</th>
                        <th>Ketua</th>
                        <th>Anggota 1</th>
                        <th>Anggota 2</th>
                        <th>Anggota 3</th>
                        <th>Anggota 4</th>
                        <th>Anggota Lain</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i = 1;
                    ?>
                    @foreach ($proposalpkm as $index => $proposalpkm2)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$proposalpkm2->judul}}</td>
                        <td>{{$proposalpkm2->sumberdana}}</td>
                        <td>{{$proposalpkm2->tahun}}</td>
                        <td>{{$proposalpkm2->read_more}}</td>
                        <td>{{$proposalpkm2->programstudi}}</td>
                        <td>{{$proposalpkm2->skim}}</td>
                        <td>{{$proposalpkm2->bidangilmu}}</td>
                        <td>{{$proposalpkm2->fakultas}}</td>
                        <td>{{$proposalpkm2->ketua}}</td>
                        <td>{{$proposalpkm2->anggota1}}</td>
                        <td>{{$proposalpkm2->anggota2}}</td>
                        <td>{{$proposalpkm2->anggota3}}</td>
                        <td>{{$proposalpkm2->anggota4}}</td>
                        <td>{{$proposalpkm2->anggotalain}}</td>
                        <td><a href="{{URL::to('/lecturer_epkmproposal/'.$proposalpkm2->idproposalpkm)}}">Ubah</a> | <button class="btn btn-danger"><a onclick="hapusproposalpkm({{$proposalpkm2->idproposalpkm}})">Hapus</button> | <a href="{{URL::to('/lecturer_vpkmproposal/'.$proposalpkm2->idproposalpkm)}}" target="_blank">Lihat</a></td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>Judul</th>
                        <th>Sumber Dana</th>
                        <th>Tahun</th>
                        <th>Abstrak</th>
                        <th>Program Studi</th>
                        <th>Skim</th>
                        <th>Bidang Ilmu</th>
                        <th>Fakultas</th>
                        <th>Ketua</th>
                        <th>Anggota 1</th>
                        <th>Anggota 2</th>
                        <th>Anggota 3</th>
                        <th>Anggota 4</th>
                        <th>Anggota Lain</th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
</div><!-- /.col -->
@stop

@section('bagianjs')
<!-- jQuery 2.1.4 -->
{{HTML::script('/AdminLTE-2.1.1/plugins/jQuery/jQuery-2.1.4.min.js')}}
<!-- Bootstrap 3.3.2 JS -->
{{HTML::script('/AdminLTE-2.1.1/bootstrap/js/bootstrap.min.js')}}
<!-- DATA TABES SCRIPT -->
{{HTML::script('/AdminLTE-2.1.1/plugins/datatables/jquery.dataTables.min.js')}}
{{HTML::script('/AdminLTE-2.1.1/plugins/datatables/dataTables.bootstrap.min.js')}}
<!-- Slimscroll -->
{{HTML::script('/AdminLTE-2.1.1/plugins/slimScroll/jquery.slimscroll.min.js')}}
<!-- FastClick -->
{{HTML::script('/AdminLTE-2.1.1/plugins/fastclick/fastclick.min.js')}}
<!-- AdminLTE App -->
{{HTML::script('/AdminLTE-2.1.1/dist/js/app.min.js')}}
<!-- AdminLTE for demo purposes -->
{{HTML::script('/AdminLTE-2.1.1/dist/js/demo.js')}}
@stop
@section('include2')
<!-- page script -->
<script type="text/javascript">
$(function () {
    $("#example1").dataTable({
        "scrollX": true
    });
    $('#example2').dataTable({
        "bPaginate": true,
        "bLengthChange": false,
        "bFilter": false,
        "bSort": true,
        "bInfo": true,
        "bAutoWidth": false
    });
});
</script>
<script>
$(document).ready(function(){
    @if(isset($message))
    alert('{{$message}}');
    @endif
})
</script>
@stop