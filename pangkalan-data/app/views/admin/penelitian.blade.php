@extends('layouts.beranda')
@section('include')
	<script type="text/javascript">
	function hapus(idfakultas){
		var hasil = confirm('Mau hapus?');
		if(hasil==true){
			window.location.href="proses_hapus/"+idfakultas;
		}
	}
	</script>
	<script type="text/javascript">
	function hapus_dosen(nipdosen){
		var hasil = confirm('Mau hapus data dosen?');
		if(hasil==true){
			window.location.href="proses_hapus_dosen/"+nipdosen;
		}
	}
	</script>
	<script>
	$(document).ready(function(){
		@if(isset($message))
		alert('{{$message}}');
		@endif
	})
	</script>
@stop
@section('content')
@foreach($fakultas as $index=>$ggg)
{{$ggg->fakultas}}
@if(@ggg->id_user == Session::get('user_id')||Session::get('user_id')=='1')
<button><a href = "{{URL::to('/ubah/'.$ggg->id_fakultas)}}">Edit</button>
@endif
@if(@ggg->id_user == Session::get('user_id')||Session::get('user_id')=='1')
<button><a onclick="hapus({{$ggg->id_fakultas}})">Hapus</button>
@endif
@endforeach
<br><br>
@foreach($tiwi as $index=>$dsn)
{{$dsn->nama}}
<button><a href = "{{URL::to('/ubah/'.$dsn->nip)}}">Edit</button>
<button><a onclick="hapus_dosen({{$dsn->nip}})">Hapus</button>
@endforeach
@foreach($gambar as $index=>$gambarvar)
{{$gambarvar->nama}}
<button><a href = "{{URL::to('/ubah/'.$dsn->nip)}}">Edit</button>
<button><a onclick="hapus_dosen({{$dsn->nip}})">Hapus</button>
@endforeach
<br><a href="{{URL::to('/logout')}}">Logout</a>
@stop
@section('content2')

@stop