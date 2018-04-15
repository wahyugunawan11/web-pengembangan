@extends('layouts.beranda')
@section('include')
{{HTML::script('ckeditor/ckeditor.js')}}
@stop
@section('content')
{{Form::open(array('method'=>'post', 'url'=>'/proses_tambah_fakultas', 'files'=>'true'))}}
Nama: <input type="text" name="nama"></input><br>
Gambar: <input type="file" name="gambar" title="gambar" size="50" required></input><br>
<textarea class="ckeditor" name="isi" required></textarea>
<button>Tambah Gambar</button>
{{Form::close()}}
@stop
@section('content2')

@stop