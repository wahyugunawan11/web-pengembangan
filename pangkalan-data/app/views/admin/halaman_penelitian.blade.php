@extends('layouts.beranda')
@section('include')
@stop
@section('content')
<ul>
	@foreach($user as $index=>$asd)
	@if($asd->status == '3' || $asd->status == '1')
	<li><a href="datapenelitian">Menu 1</a></li>
	<li><a href="">Menu 2</a></li>
	@endif
	@endforeach
</ul>
{{Form::open(array('method'=>'post', 'url'=>'/proses_tambah_fakultas'))}}
Fakultas: <input type="text" name="fakultas"></input><br>
<select name="fakultas1">
	<option value='Teknik'>Teknik</option>
	<option value='Hukum'>Hukum</option>
	<option value='Ekonomi'>Ekonomi</option>
	<option value='Ilmu Sosial dan Ilmu Politik'>Ilmu Sosial dan Ilmu Politik</option>
	<option value='Keguruan dan Ilmu Pendidikan'>Keguruan dan Ilmu Pendidikan</option>
	<option value='Kehutanan'>Kehutanan</option>
	<option value='Matematika dan Ilmu Pengetahuan Alam'>Matematika dan Ilmu Pengetahuan Alam</option>
	<option value='Kedokteran'>Kedokteran</option>
	<option value='Hukum'>Hukum</option>
	<option value='asdasdasa'>asdasdasa</option>
	<option value='gjghjhghj'>gjghjhghj</option>
	<option value='A'>A</option>
	<option value='Fakultas1'>Fakultas1</option>
	<option value='Fakultas2'>Fakultas2</option>
</select>
<button>Tambah Fakultas</button>
{{Form::close()}}
<a href="{{URL::to('/logout')}}">Logout</a>
@stop
@section('content2')

@stop