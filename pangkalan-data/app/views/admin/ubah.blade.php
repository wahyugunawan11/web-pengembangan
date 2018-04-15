@extends('layouts.beranda')
@section('include')
{{HTML::script('ckeditor/ckeditor.js')}}
@stop
@section('content')
{{Form::open(array('method'=>'post', 'url'=>'/proses_ubah_fakultas/'.$fakultas->id_fakultas, 'files'=>"true"))}}
Fakultas: <input type="text" name="fakultas1" value='{{$fakultas->fakultas}}'></input><br>
Fakultas: <textarea class="ckeditor" name="fakultas" required>{{$fakultas->fakultas}}</textarea><br>
<select name="fakultas2">
	<option value='Teknik' @if($fakultas->fakultas == 'Teknik') selected="selected" @endif>Teknik</option>
	<option value='Hukum' @if($fakultas->fakultas == 'Hukum') selected="selected" @endif>Hukum</option>
	<option value='Ekonomi' @if($fakultas->fakultas == 'Ekonomi') selected="selected" @endif>Ekonomi</option>
	<option value='Ilmu Sosial dan Ilmu Politik' @if($fakultas->fakultas == 'Ilmu Sosial dan Ilmu Politik') selected="selected" @endif>Ilmu Sosial dan Ilmu Politik</option>
	<option value='Keguruan dan Ilmu Pendidikan' @if($fakultas->fakultas == 'Keguruan dan Ilmu Pendidikan') selected="selected" @endif>Keguruan dan Ilmu Pendidikan</option>
	<option value='Kehutanan' @if($fakultas->fakultas == 'Kehutanan') selected="selected" @endif>Kehutanan</option>
	<option value='Matematika dan Ilmu Pengetahuan Alam' @if($fakultas->fakultas == 'Matematika dan Ilmu Pengetahuan Alam') selected="selected" @endif>Matematika dan Ilmu Pengetahuan Alam</option>
	<option value='Kedokteran' @if($fakultas->fakultas == 'Kedokteran') selected="selected" @endif>Kedokteran</option>
	<option value='Hukum' @if($fakultas->fakultas == 'Hukum') selected="selected" @endif>Hukum</option>
	<option value='asdasdasa' @if($fakultas->fakultas == 'asdasdasa') selected="selected" @endif>asdasdasa</option>
	<option value='gjghjhghj' @if($fakultas->fakultas == 'gjghjhghj') selected="selected" @endif>gjghjhghj</option>
	<option value='A' @if($fakultas->fakultas == 'A') selected="selected" @endif>A</option>
	<option value='Fakultas1' @if($fakultas->fakultas == 'Fakultas1') selected="selected" @endif>Fakultas1</option>
	<option value='Fakultas2' @if($fakultas->fakultas == 'Fakultas2') selected="selected" @endif>Fakultas2</option>
</select>
<button>Ubah Fakultas</button>
{{Form::close()}}
@stop
@section('content2')

@stop