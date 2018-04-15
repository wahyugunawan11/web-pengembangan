@extends('layouts.beranda')
@section('include')
@stop
@section('content')
{{Form::open(array('method'=>'post', 'url'=>'/proses_ubah_fakultas/'.$datafakultas.id_fakultas))}}
Fakultas: <input type="text" name="fakultas" value='{{$datafakultas->fakultas}}'></input><br>
<button>Ubah Fakultas</button>
{{Form::close()}}
@stop
@section('content2')

@stop