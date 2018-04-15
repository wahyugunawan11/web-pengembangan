<?php

class lemlitpdController extends BaseController{
	public function home(){
		$thnsekarang=idate('Y');
		return View::make('user.home')->with('thnsekarang',$thnsekarang);
	}
	public function login(){
		$status = 'success';
		if (Session::has('status')){
			$status=Session::get('status');
			Session::forget('status');
		}
		$data['status']=$status;
		$thnsekarang=idate('Y');
		return View::make('layouts.loginlayout', $data)->with('thnsekarang',$thnsekarang);
	}
	public function proseslogin(){
		if(((Input::get('status')) == 'administrator')){
			$jml=DB::table('user')->where('username','=',Input::get('user'))->where('password','=',md5(Input::get('pass')))->where('status','=',Input::get('status'))->count();
			$status='success';
			if (Session::has('status')){
				$status=Session::get('status');
				Session::forget('status');
			}
			if($jml==1){
				$user=DB::table('user')->where('username','=',Input::get('user'))->where('password','=',md5(Input::get('pass')))->where('status','=',Input::get('status'))->first();
				Session::put('Sukses Login','1');
				Session::put('iduser',$user->iduser);
				Session::put('username',$user->username);
				Session::put('status',$user->status);
				Session::put('password',$user->password);
				$data['status']=$status;
				date_default_timezone_set('Asia/Jakarta');
				DB::table('history')->insert(array(
				'keterangan'=>'Login.',
				'tanggalwaktu'=>date('Y-m-d H:i:s'),
				'iduserhistory'=>Session::get('iduser')
				));
				return Redirect::to('/adminhome');
			}
			elseif((Input::get('user')) == ''){
				$status='failed';
			}
			else{
				$status='failed2';
			}
			return Redirect::to('/login')->with('status',$status);
		}
		elseif(((Input::get('status')) == 'kalemlit')){
			$jml=DB::table('user')->where('username','=',Input::get('user'))->where('password','=',md5(Input::get('pass')))->where('status','=',Input::get('status'))->count();
			$status='success';
			if (Session::has('status')){
				$status=Session::get('status');
				Session::forget('status');
			}
			if($jml==1){
				$user=DB::table('user')->where('username','=',Input::get('user'))->where('password','=',md5(Input::get('pass')))->where('status','=',Input::get('status'))->first();
				Session::put('Sukses Login','1');
				Session::put('iduser',$user->iduser);
				Session::put('username',$user->username);
				Session::put('status',$user->status);
				Session::put('password',$user->password);
				$data['status']=$status;
				date_default_timezone_set('Asia/Jakarta');
				DB::table('history')->insert(array(
				'keterangan'=>'Login.',
				'tanggalwaktu'=>date('Y-m-d H:i:s'),
				'iduserhistory'=>Session::get('iduser')
				));
				return Redirect::to('/chiefhome');
			}
			elseif((Input::get('user')) == ''){
				$status='failed';
			}
			else{
				$status='failed2';
			}
			return Redirect::to('/login')->with('status',$status);
		}
		elseif(((Input::get('status')) == 'dosen')){
			$jml=DB::table('dosen')->where('username','=',Input::get('user'))->where('password','=',md5(Input::get('pass')))->count();
			$status='success';
			if (Session::has('status')){
				$status=Session::get('status');
				Session::forget('status');
			}
			if($jml==1){
				$userdosen=DB::table('dosen')->where('username','=',Input::get('user'))->where('password','=',md5(Input::get('pass')))->first();
				Session::put('Sukses Login','1');
				Session::put('iddosen',$userdosen->iddosen);
				Session::put('username',$userdosen->username);
				Session::put('status','dosen');
				Session::put('password',$userdosen->password);
				$data['status']=$status;
				date_default_timezone_set('Asia/Jakarta');
				DB::table('history')->insert(array(
				'keterangan'=>'Login.',
				'tanggalwaktu'=>date('Y-m-d H:i:s'),
				'iduserhistory'=>Session::get('iddosen')
				));
				return Redirect::to('/lecturerhome');
			}
			elseif((Input::get('user')) == ''){
				$status='failed';
			}
			else{
				$status='failed2';
			}
			return Redirect::to('/login')->with('status',$status);
		};
	}
	public function adminhome(){
		$data['user']=DB::table('user')
		->where('username','=',Session::get('username'))
		->where('iduser','=',Session::get('iduser'))
		->get();
		$thnsekarang=idate('Y');
		if (Session::has('message')) {
			$data['message'] = Session::get('message');
			Session::forget('message');
		}
		return View::make('admin.adminhome',$data)->with('thnsekarang', $thnsekarang);
	}
	public function adminfield(){
		$data['bidang'] = DB::table('bidangilmu')
		->orderBy('idbidilmu', 'desc')->get();
		$data['user']=DB::table('user')
		->where('username','=',Session::get('username'))
		->where('iduser','=',Session::get('iduser'))
		->get();
		$thnsekarang=idate('Y');
		return View::make('admin.bidang', $data)->with('thnsekarang', $thnsekarang);
	}
	public function adminafpage(){
		$data['user']=DB::table('user')
		->where('username','=',Session::get('username'))
		->where('iduser','=',Session::get('iduser'))
		->get();
		$thnsekarang=idate('Y');
		$statusinput = 'success';
		if (Session::has('statusinput')){
			$statusinput = Session::get('statusinput');
			Session::forget('statusinput');
		}
		$data['statusinput'] = $statusinput;
		return View::make('admin.tambahbidang', $data)->with('thnsekarang', $thnsekarang);
	}
	public function tambahbidilmu(){
		$data['statusinput'] = 'success';
		if((Input::get('bidangilmu')) == ''){
			$data['statusinput'] = 'failed';
			return Redirect::to('/admin_addfield')->with('statusinput',$data['statusinput']);
		}
		elseif((Input::get('bidangilmu')) == ''){
			DB::table('bidangilmu')->insert(array(
				'bidangilmu'=>Input::get('bidangilmu')
				));
			date_default_timezone_set('Asia/Jakarta');
			DB::table('history')->insert(array(
				'keterangan'=>'Tambah data bidang ilmu.',
				'tanggalwaktu'=>date('Y-m-d H:i:s'),
				'iduserhistory'=>Session::get('iduser')
				));
		}
		return Redirect::to('/adminfield')->with('statusinput',$data['statusinput']);
	}
	public function ubah($idbidilmu){
		$statusinput = 'success';
		if (Session::has('statusinput')){
			$statusinput = Session::get('statusinput');
			Session::forget('statusinput');
		}
		$data['bidangilmu']=DB::table('bidangilmu')->where('idbidilmu','=',$idbidilmu)->first();
		$data['user']=DB::table('user')
		->where('username','=',Session::get('username'))
		->where('iduser','=',Session::get('iduser'))
		->get();
		$thnsekarang=idate('Y');
		$data['statusinput'] = $statusinput;
		return View::make('admin.ubahbidang',$data)->with('thnsekarang', $thnsekarang);
	}
	public function ubahbidilmu($idbidilmu){
		$data['statusinput'] = 'success';
		if((Input::get('bidangilmu')) == ''){
			$data['statusinput'] = 'failed';
			return Redirect::to('/admin_editfield/'.$idbidilmu)->with('statusinput',$data['statusinput']);
		}
		elseif((Input::get('bidangilmu')) != ''){
			DB::table('bidangilmu')->where('idbidilmu','=',$idbidilmu)->update(array(
				'bidangilmu'=>Input::get('bidangilmu')
				));
			date_default_timezone_set('Asia/Jakarta');
			DB::table('history')->insert(array(
				'keterangan'=>'Ubah data bidang ilmu dengan ID '.$idbidilmu.'.',
				'tanggalwaktu'=>date('Y-m-d H:i:s'),
				'iduserhistory'=>Session::get('iduser')
				));
		}
		return Redirect::to('/adminfield')->with('statusinput',$data['statusinput']);
	}
	public function hapus($idbidilmu){
		$data['bidangilmu']=DB::table('bidangilmu')->where('idbidilmu','=',$idbidilmu)->delete();
		date_default_timezone_set('Asia/Jakarta');
		DB::table('history')->insert(array(
			'keterangan'=>'Hapus data bidang ilmu dengan ID '.$idbidilmu.'.',
			'tanggalwaktu'=>date('Y-m-d H:i:s'),
			'iduserhistory'=>Session::get('iduser')
			));
		return Redirect::to('/adminfield');
	}
	public function halamanfakultas(){
		$data['fakultas'] = DB::table('fakultas')
		->orderBy('idfakultas', 'desc')->get();
		$data['user']=DB::table('user')
		->where('username','=',Session::get('username'))
		->where('iduser','=',Session::get('iduser'))
		->get();
		$thnsekarang=idate('Y');
		return View::make('admin.fakultas', $data)->with('thnsekarang', $thnsekarang);
	}
	public function formtambahfakultas(){
		$data['user']=DB::table('user')
		->where('username','=',Session::get('username'))
		->where('iduser','=',Session::get('iduser'))
		->get();
		$thnsekarang=idate('Y');
		$statusinput = 'success';
		if (Session::has('statusinput')){
			$statusinput = Session::get('statusinput');
			Session::forget('statusinput');
		}
		$data['statusinput'] = $statusinput;
		return View::make('admin.tambahfakultas',$data)->with('thnsekarang', $thnsekarang);
	}
	public function tambahfakultas(){
		$data['statusinput'] = 'success';
		if(((Input::get('kode')) == '') || ((Input::get('fakultas')) == '')){
			$data['statusinput'] = 'failed';
			return Redirect::to('/admin_addfaculty')->with('statusinput',$data['statusinput']);
		}
		elseif(((Input::get('kode')) == '') || ((Input::get('fakultas')) == '')){
			DB::table('fakultas')->insert(array(
				'kode'=>Input::get('kode'),
				'fakultas'=>Input::get('fakultas')
				));
			date_default_timezone_set('Asia/Jakarta');
			DB::table('history')->insert(array(
				'keterangan'=>'Tambah data fakultas.',
				'tanggalwaktu'=>date('Y-m-d H:i:s'),
				'iduserhistory'=>Session::get('iduser')
				));
		}
		return Redirect::to('/adminfaculty')->with('statusinput',$data['statusinput']);
	}
	public function ubahfakultas($idfakultas){
		$statusinput = 'success';
		if (Session::has('statusinput')){
			$statusinput = Session::get('statusinput');
			Session::forget('statusinput');
		}
		$data['fakultas']=DB::table('fakultas')->where('idfakultas','=',$idfakultas)->first();
		$data['user']=DB::table('user')
		->where('username','=',Session::get('username'))
		->where('iduser','=',Session::get('iduser'))
		->get();
		$thnsekarang=idate('Y');
		$data['statusinput'] = $statusinput;
		return View::make('admin.ubahfakultas',$data)->with('thnsekarang', $thnsekarang);
	}
	public function proses_ubahfakultas($idfakultas){
		$data['statusinput'] = 'success';
		if(((Input::get('kode')) == '') || ((Input::get('fakultas')) == '')){
			$data['statusinput'] = 'failed';
			return Redirect::to('/admin_editfaculty/'.$idfakultas)->with('statusinput',$data['statusinput']);
		}
		elseif(((Input::get('kode')) == '') || ((Input::get('fakultas')) == '')){
			DB::table('fakultas')->where('idfakultas','=',$idfakultas)->update(array(
				'kode'=>Input::get('kode'),
				'fakultas'=>Input::get('fakultas')
				));
			date_default_timezone_set('Asia/Jakarta');
			DB::table('history')->insert(array(
				'keterangan'=>'Ubah data fakultas dengan ID '.$idfakultas.'.',
				'tanggalwaktu'=>date('Y-m-d H:i:s'),
				'iduserhistory'=>Session::get('iduser')
				));
		}
		return Redirect::to('/adminfaculty')->with('statusinput',$data['statusinput']);
	}
	public function hapusfakultas($idfakultas){
		$data['fakultas']=DB::table('fakultas')->where('idfakultas','=',$idfakultas)->delete();
		date_default_timezone_set('Asia/Jakarta');
		DB::table('history')->insert(array(
			'keterangan'=>'Hapus data fakultas dengan ID '.$idfakultas.'.',
			'tanggalwaktu'=>date('Y-m-d H:i:s'),
			'iduserhistory'=>Session::get('iduser')
			));
		return Redirect::to('/adminfaculty');
	}
	public function getBidang(){
		if (Request::ajax()){
			$result=[];
			foreach(bidangilmu::all() as $row):
				$result[]=[
			$row->idbidilmu,
			$row->bidangilmu
			];
			endforeach;
			return json_encode(['aaData'=>$result]);
		}
		else{
			return Redirect::to('site');
		}
	}
	public function halamandosen(){
		$data['dosen'] = DB::table('fakultas')
		->join('dosen', 'fakultas.idfakultas', '=', 'dosen.idfakultas')
		->select('fakultas.*', 'dosen.*')
		->orderBy('iddosen', 'desc')->get();
		$data['user']=DB::table('user')
		->where('username','=',Session::get('username'))
		->where('iduser','=',Session::get('iduser'))
		->get();
		$thnsekarang=idate('Y');
		return View::make('admin.dosen', $data)->with('thnsekarang', $thnsekarang);
	}
	public function formtambahdosen(){
		$statusinput = 'success';
		if (Session::has('statusinput')){
			$statusinput = Session::get('statusinput');
			Session::forget('statusinput');
		}
		//queries the fakultas db table, orders by idfakultas and lists fakultas
		$data['fakultas'] = DB::table('fakultas')
		->select('fakultas.*')
		->get();
		$data['user']=DB::table('user')
		->where('username','=',Session::get('username'))
		->where('iduser','=',Session::get('iduser'))
		->get();
		$data['statusinput'] = $statusinput;
		$thnsekarang=idate('Y');
		return View::make('admin.tambahdosen', $data)->with('thnsekarang', $thnsekarang);
	}
	public function tambahdosen(){
		$nama_file='';
		$data['statusinput'] = 'success';
		if(((Input::get('nama')) == '') || ((Input::get('username')) == '') || ((Input::get('password')) == '') || ((Input::get('jeniskelamin')) == '') || ((Input::get('jabatanfungsional')) == '')){
			$data['statusinput'] = 'failed';
			return Redirect::to('/admin_addlecturer')->with('statusinput',$data['statusinput']);
		}
		elseif(((Input::get('nama')) != '') && ((Input::get('username')) != '') && ((Input::get('password')) != '') && ((Input::get('jeniskelamin')) != '') && ((Input::get('jabatanfungsional')) != '')){
			if (Input::hasFile('namafile')){
				$nama_file=md5(time().rand()).'.'.Input::file('namafile')->getClientOriginalExtension();
				Input::file('namafile')->move('Images_Dosen',$nama_file);
			}
			DB::table('dosen')->insert(array(
				'nidn'=>Input::get('nidn'),
				'nama'=>Input::get('nama'),
				'username'=>Input::get('username'),
				'password'=>Input::get('password'),
				'pangkatgolongan'=>(Input::get('pangkat')."/".Input::get('golongan')),
				'email'=>Input::get('email'),
				'notelp'=>Input::get('notelp'),
				'namafile'=>$nama_file,
				'nip'=>Input::get('nip'),
				'tempatlahir'=>Input::get('tempatlahir'),
				'tanggallahir'=>Input::get('tanggallahir'),
				'jeniskelamin'=>Input::get('jeniskelamin'),
				'jabatanfungsional'=>Input::get('jabatanfungsional'),
				'idfakultas'=>Input::get('idfakultas')
				));
			date_default_timezone_set('Asia/Jakarta');
			DB::table('history')->insert(array(
				'keterangan'=>'Tambah data dosen.',
				'tanggalwaktu'=>date('Y-m-d H:i:s'),
				'iduserhistory'=>Session::get('iduser')
				));
		}
		return Redirect::to('/adminlecturer')->with('statusinput',$data['statusinput']);
	}
	public function ubahdosen($iddosen){
		$statusinput = 'success';
		if (Session::has('statusinput')){
			$statusinput = Session::get('statusinput');
			Session::forget('statusinput');
		}
		$data['dosen'] = DB::table('fakultas')
		->join('dosen', 'fakultas.idfakultas', '=', 'dosen.idfakultas')
		->where('iddosen','=',$iddosen)
		->select('fakultas.*', 'dosen.*')
		->first();
		//queries the fakultas db table, orders by idfakultas and lists fakultas
		$data['fakultas'] = DB::table('fakultas')
		->select('fakultas.*')
		->get();
		$data['user']=DB::table('user')
		->where('username','=',Session::get('username'))
		->where('iduser','=',Session::get('iduser'))
		->get();
		$thnsekarang=idate('Y');
		$data['statusinput'] = $statusinput;
		return View::make('admin.ubahdosen',$data)->with('thnsekarang', $thnsekarang);
	}
	public function proses_ubahdosen($iddosen){
		$data['statusinput'] = 'success';
		if(((Input::get('nama')) == '') || ((Input::get('username')) == '') || ((Input::get('password')) == '')){
			$data['statusinput'] = 'failed';
			return Redirect::to('/admin_editlecturer/'.$iddosen)->with('statusinput',$data['statusinput']);
		}
		elseif(((Input::get('nama')) == '') || ((Input::get('username')) == '') || ((Input::get('password')) == '')){
			if (Input::hasFile('namafile'))
			{
				$nama_file=md5(time().rand()).'.'.Input::file('namafile')->getClientOriginalExtension();
				Input::file('namafile')->move('Images_Dosen',$nama_file);
				//update gambar
	   				DB::table('dosen')->where('iddosen', '=', $iddosen)->update(array(
						'namafile'=>$nama_file
						));
			}
			//update tabel dosen
			DB::table('dosen')->where('iddosen','=',$iddosen)->update(array(
				'nidn'=>Input::get('nidn'),
				'nama'=>Input::get('nama'),
				'username'=>Input::get('username'),
				'password'=>Input::get('password'),
				'pangkatgolongan'=>(Input::get('pangkat')."/".Input::get('golongan')),
				'email'=>Input::get('email'),
				'notelp'=>Input::get('notelp'),
				'nip'=>Input::get('nip'),
				'tempatlahir'=>Input::get('tempatlahir'),
				'tanggallahir'=>Input::get('tanggallahir'),
				'jeniskelamin'=>Input::get('jeniskelamin'),
				'jabatanfungsional'=>Input::get('jabatanfungsional'),
				'idfakultas'=>Input::get('idfakultas')
				));
			date_default_timezone_set('Asia/Jakarta');
			DB::table('history')->insert(array(
				'keterangan'=>'Ubah data dosen dengan ID '.$iddosen.'.',
				'tanggalwaktu'=>date('Y-m-d H:i:s'),
				'iduserhistory'=>Session::get('iduser')
				));
		}
		return Redirect::to('/adminlecturer')->with('statusinput',$data['statusinput']);
	}
	public function hapusdosen($iddosen){
		$data['dosen']=DB::table('dosen')->where('iddosen','=',$iddosen)->delete();
		date_default_timezone_set('Asia/Jakarta');
		DB::table('history')->insert(array(
			'keterangan'=>'Hapus data dosen dengan ID '.$iddosen.'.',
			'tanggalwaktu'=>date('Y-m-d H:i:s'),
			'iduserhistory'=>Session::get('iduser')
			));
		return Redirect::to('/adminlecturer');
	}
	public function detaildosen($iddosen){
		$data['dosen'] = DB::table('fakultas')
		->join('dosen', 'fakultas.idfakultas', '=', 'dosen.idfakultas')
		->where('iddosen','=',$iddosen)
		->select('fakultas.*', 'dosen.*')
		->first();
		//queries the fakultas db table, orders by idfakultas and lists fakultas
		$data['fakultas'] = DB::table('fakultas')
		->select('fakultas.*')
		->get();
		$data['user']=DB::table('user')
		->where('username','=',Session::get('username'))
		->where('iduser','=',Session::get('iduser'))
		->get();
		$thnsekarang=idate('Y');
		return View::make('admin.detaildosen',$data)->with('thnsekarang', $thnsekarang);
	}
	public function halamanskim(){
		$data['skimpenelitian'] = DB::table('skimpenelitian')
		->orderBy('idskimpenelitian', 'desc')->get();
		$data['user']=DB::table('user')
		->where('username','=',Session::get('username'))
		->where('iduser','=',Session::get('iduser'))
		->get();
		$thnsekarang=idate('Y');
		return View::make('admin.skim', $data)->with('thnsekarang', $thnsekarang);
	}
	public function formtambahskim(){
		$statusinput = 'success';
		if (Session::has('statusinput')){
			$statusinput = Session::get('statusinput');
			Session::forget('statusinput');
		}
		$data['user']=DB::table('user')
		->where('username','=',Session::get('username'))
		->where('iduser','=',Session::get('iduser'))
		->get();
		$thnsekarang=idate('Y');
		$data['statusinput'] = $statusinput;
		return View::make('admin.tambahskim', $data)->with('thnsekarang', $thnsekarang);
	}
	public function tambahskim(){
		$data['statusinput'] = 'success';
		if((Input::get('skim')) == ''){
			$data['statusinput'] = 'failed';
			return Redirect::to('/admin_addskim')->with('statusinput',$data['statusinput']);
		}
		elseif((Input::get('skim')) == ''){
			DB::table('skimpenelitian')->insert(array(
				'skim'=>Input::get('skim')
				));
			date_default_timezone_set('Asia/Jakarta');
			DB::table('history')->insert(array(
				'keterangan'=>'Tambah data skim penelitian.',
				'tanggalwaktu'=>date('Y-m-d H:i:s'),
				'iduserhistory'=>Session::get('iduser')
				));
		}
		return Redirect::to('/adminskim')->with('statusinput',$data['statusinput']);
	}

	public function ubahskim($idskimpenelitian){
		$statusinput = 'success';
		if (Session::has('statusinput')){
			$statusinput = Session::get('statusinput');
			Session::forget('statusinput');
		}
		$data['skimpenelitian']=DB::table('skimpenelitian')->where('idskimpenelitian','=',$idskimpenelitian)->first();
		$data['user']=DB::table('user')
		->where('username','=',Session::get('username'))
		->where('iduser','=',Session::get('iduser'))
		->get();
		$thnsekarang=idate('Y');
		$data['statusinput'] = $statusinput;
		return View::make('admin.ubahskim',$data)->with('thnsekarang', $thnsekarang);
	}

	public function proses_ubahskim($idskimpenelitian){
		$data['statusinput'] = 'success';
		if(((Input::get('skim')) == '')){
			$data['statusinput'] = 'failed';
			return Redirect::to('/admin_editskim/'.$idskimpenelitian)->with('statusinput',$data['statusinput']);
		}
		elseif(((Input::get('skim')) != '')){
			//update tabel skimpenelitian
			DB::table('skimpenelitian')->where('idskimpenelitian','=',$idskimpenelitian)->update(array(
				'skim'=>Input::get('skim')
				));
			date_default_timezone_set('Asia/Jakarta');
			DB::table('history')->insert(array(
				'keterangan'=>'Ubah data skim penelitian dengan ID '.$idskimpenelitian.'.',
				'tanggalwaktu'=>date('Y-m-d H:i:s'),
				'iduserhistory'=>Session::get('iduser')
				));
		}
		return Redirect::to('/adminskim')->with('statusinput',$data['statusinput']);
	}

	public function hapusskim($idskimpenelitian){
		$data['skimpenelitian']=DB::table('skimpenelitian')->where('idskimpenelitian','=',$idskimpenelitian)->delete();
		date_default_timezone_set('Asia/Jakarta');
		DB::table('history')->insert(array(
			'keterangan'=>'Hapus data skim penelitian dengan ID '.$idskimpenelitian.'.',
			'tanggalwaktu'=>date('Y-m-d H:i:s'),
			'iduserhistory'=>Session::get('iduser')
			));
		return Redirect::to('/adminskim');
	}

	public function halamanprogramstudi(){
		$data['programstudi'] = DB::table('fakultas')
		->join('programstudi', 'fakultas.idfakultas', '=', 'programstudi.idfakultas')
		->select('fakultas.*', 'programstudi.*')
		->orderBy('idprodi', 'desc')->get();
		$data['user']=DB::table('user')
		->where('username','=',Session::get('username'))
		->where('iduser','=',Session::get('iduser'))
		->get();
		$thnsekarang=idate('Y');
		return View::make('admin.program', $data)->with('thnsekarang', $thnsekarang);
	}
	public function formtambahprogram(){
		$statusinput = 'success';
		if (Session::has('statusinput')){
			$statusinput = Session::get('statusinput');
			Session::forget('statusinput');
		}
		//queries the fakultas db table, orders by idfakultas and lists fakultas
		$data['fakultas'] = DB::table('fakultas')
		->select('fakultas.*')
		->get();
		$data['user']=DB::table('user')
		->where('username','=',Session::get('username'))
		->where('iduser','=',Session::get('iduser'))
		->get();
		$thnsekarang=idate('Y');
		$data['statusinput'] = $statusinput;
		return View::make('admin.tambahprogram', $data)->with('thnsekarang', $thnsekarang);
	}
	public function tambahprogramstudi(){
		$data['statusinput'] = 'success';
		if((Input::get('programstudi')) == ''){
			$data['statusinput'] = 'failed';
			return Redirect::to('/admin_addprogram')->with('statusinput',$data['statusinput']);
		}
		elseif((Input::get('programstudi')) == ''){
			DB::table('programstudi')->insert(array(
				'programstudi'=>Input::get('programstudi'),
				'idfakultas'=>Input::get('idfakultas')
				));
			date_default_timezone_set('Asia/Jakarta');
			DB::table('history')->insert(array(
				'keterangan'=>'Tambah data program studi.',
				'tanggalwaktu'=>date('Y-m-d H:i:s'),
				'iduserhistory'=>Session::get('iduser')
				));
		}
		return Redirect::to('/adminprogram')->with('statusinput',$data['statusinput']);
	}
	public function ubahprogramstudi($idprodi){
		$statusinput = 'success';
		if (Session::has('statusinput')){
			$statusinput = Session::get('statusinput');
			Session::forget('statusinput');
		}
		$data['programstudi'] = DB::table('fakultas')
		->join('programstudi', 'fakultas.idfakultas', '=', 'programstudi.idfakultas')
		->where('idprodi','=',$idprodi)
		->select('fakultas.*', 'programstudi.*')
		->first();
		//queries the fakultas db table, orders by idfakultas and lists fakultas
		$data['fakultas'] = DB::table('fakultas')
		->select('fakultas.*')
		->get();
		$data['user']=DB::table('user')
		->where('username','=',Session::get('username'))
		->where('iduser','=',Session::get('iduser'))
		->get();
		$thnsekarang=idate('Y');
		$data['statusinput'] = $statusinput;
		return View::make('admin.ubahprogram',$data)->with('thnsekarang', $thnsekarang);
	}
	public function proses_ubahprogram($idprodi){
		$data['statusinput'] = 'success';
		if((Input::get('programstudi')) == ''){
			$data['statusinput'] = 'failed';
			return Redirect::to('/admin_editprogram/'.$idprodi)->with('statusinput',$data['statusinput']);
		}
		elseif((Input::get('programstudi')) == ''){
			//update tabel programstudi
			DB::table('programstudi')->where('idprodi','=',$idprodi)->update(array(
				'programstudi'=>Input::get('programstudi'),
				'idfakultas'=>Input::get('idfakultas')
				));
			date_default_timezone_set('Asia/Jakarta');
			DB::table('history')->insert(array(
				'keterangan'=>'Ubah data program studi dengan ID '.$idprodi.'.',
				'tanggalwaktu'=>date('Y-m-d H:i:s'),
				'iduserhistory'=>Session::get('iduser')
				));
		}
		return Redirect::to('/adminprogram');
	}
	public function hapusprogram($idprodi){
		$data['programstudi']=DB::table('programstudi')->where('idprodi','=',$idprodi)->delete();
		date_default_timezone_set('Asia/Jakarta');
		DB::table('history')->insert(array(
			'keterangan'=>'Hapus data program studi dengan ID '.$idprodi.'.',
			'tanggalwaktu'=>date('Y-m-d H:i:s'),
			'iduserhistory'=>Session::get('iduser')
			));
		return Redirect::to('/adminprogram');
	}
	public function halamanhistory(){
		$data['historyuser'] = DB::table('history')
		->join('user', 'user.iduser', '=', 'history.iduserhistory')
		->select('history.*', 'user.iduser', 'user.username')
		->orderBy('history.idhistory', 'desc');
		$data['history'] = DB::table('history')
		->join('dosen', 'dosen.iddosen', '=', 'history.iduserhistory')
		->union($data['historyuser'])
		->select('history.*', 'dosen.iddosen', 'dosen.username')
		->get();
		$data['user']=DB::table('user')
		->where('username','=',Session::get('username'))
		->where('iduser','=',Session::get('iduser'))
		->get();
		$thnsekarang=idate('Y');
		return View::make('admin.histori', $data)->with('thnsekarang', $thnsekarang);
	}
	public function halamanproposal(){
		$data['proposal'] = DB::select('select idproposal, judul, sumberdana, tahun, read_more, programstudi, skim, bidangilmu, fakultas, ketua, anggota1, anggota2, anggota3, dosen.nama as anggota4, anggotalain from 
			(select idproposal, judul, sumberdana, tahun, read_more, programstudi, skim, bidangilmu, fakultas, ketua, anggota1, anggota2, dosen.nama as anggota3, idanggota4, anggotalain from 
				(select idproposal, judul, sumberdana, tahun, read_more, programstudi, skim, bidangilmu, fakultas, ketua, anggota1, dosen.nama as anggota2, idanggota3, idanggota4, anggotalain from 
					(select idproposal, judul, sumberdana, tahun, read_more, programstudi, skim, bidangilmu, fakultas, ketua, dosen.nama as anggota1, idanggota2, idanggota3, idanggota4, anggotalain from 
						(select idproposal, judul, sumberdana, tahun, read_more, programstudi, skim, bidangilmu, fakultas, dosen.nama as ketua, idanggota1, idanggota2, idanggota3, idanggota4, anggotalain from 
							(select idproposal, judul, sumberdana, tahun, read_more, programstudi, skimpenelitian.skim as skim, bidangilmu, fakultas, idketua, idanggota1, idanggota2, idanggota3, idanggota4, anggotalain from
								(select idproposal, judul, sumberdana, tahun, read_more, programstudi.programstudi as programstudi, idskimpenelitian, bidangilmu.bidangilmu as bidangilmu, fakultas.fakultas as fakultas, idketua, idanggota1, idanggota2, idanggota3, idanggota4, anggotalain from proposal left join programstudi on proposal.idprodi=programstudi.idprodi left join bidangilmu on proposal.idbidilmu=bidangilmu.idbidilmu left join fakultas on proposal.idfakultas=fakultas.idfakultas)
							as tprogramstudi left join skimpenelitian on tprogramstudi.idskimpenelitian=skimpenelitian.idskimpenelitian)
						as tketua left join dosen on tketua.idketua=dosen.iddosen) 
					as t1 left join dosen on t1.idanggota1=dosen.iddosen) 
				as t2 left join dosen on t2.idanggota2=dosen.iddosen) 
			as t3 left join dosen on t3.idanggota3=dosen.iddosen) 
		as t4 left join dosen on t4.idanggota4=dosen.iddosen order by idproposal desc');
		$data['user']=DB::table('user')
		->where('username','=',Session::get('username'))
		->where('iduser','=',Session::get('iduser'))
		->get();
		$thnsekarang=idate('Y');
		return View::make('admin.proposal', $data)->with('thnsekarang', $thnsekarang);
	}
	public function halamanproposalpkm(){
		$data['proposalpkm'] = DB::select('select idproposalpkm, judul, sumberdana, tahun, read_more, programstudi, skim, bidangilmu, fakultas, ketua, anggota1, anggota2, anggota3, dosen.nama as anggota4, anggotalain from 
			(select idproposalpkm, judul, sumberdana, tahun, read_more, programstudi, skim, bidangilmu, fakultas, ketua, anggota1, anggota2, dosen.nama as anggota3, idanggota4, anggotalain from 
				(select idproposalpkm, judul, sumberdana, tahun, read_more, programstudi, skim, bidangilmu, fakultas, ketua, anggota1, dosen.nama as anggota2, idanggota3, idanggota4, anggotalain from 
					(select idproposalpkm, judul, sumberdana, tahun, read_more, programstudi, skim, bidangilmu, fakultas, ketua, dosen.nama as anggota1, idanggota2, idanggota3, idanggota4, anggotalain from 
						(select idproposalpkm, judul, sumberdana, tahun, read_more, programstudi, skim, bidangilmu, fakultas, dosen.nama as ketua, idanggota1, idanggota2, idanggota3, idanggota4, anggotalain from 
							(select idproposalpkm, judul, sumberdana, tahun, read_more, programstudi, skimpenelitian.skim as skim, bidangilmu, fakultas, idketua, idanggota1, idanggota2, idanggota3, idanggota4, anggotalain from
								(select idproposalpkm, judul, sumberdana, tahun, read_more, programstudi.programstudi as programstudi, idskimpenelitian, bidangilmu.bidangilmu as bidangilmu, fakultas.fakultas as fakultas, idketua, idanggota1, idanggota2, idanggota3, idanggota4, anggotalain from proposalpkm left join programstudi on proposalpkm.idprodi=programstudi.idprodi left join bidangilmu on proposalpkm.idbidilmu=bidangilmu.idbidilmu left join fakultas on proposalpkm.idfakultas=fakultas.idfakultas)
							as tprogramstudi left join skimpenelitian on tprogramstudi.idskimpenelitian=skimpenelitian.idskimpenelitian)
						as tketua left join dosen on tketua.idketua=dosen.iddosen) 
					as t1 left join dosen on t1.idanggota1=dosen.iddosen) 
				as t2 left join dosen on t2.idanggota2=dosen.iddosen) 
			as t3 left join dosen on t3.idanggota3=dosen.iddosen) 
		as t4 left join dosen on t4.idanggota4=dosen.iddosen order by idproposalpkm desc');
		$data['user']=DB::table('user')
		->where('username','=',Session::get('username'))
		->where('iduser','=',Session::get('iduser'))
		->get();
		$thnsekarang=idate('Y');
		return View::make('admin.proposalpkm', $data)->with('thnsekarang', $thnsekarang);
	}
	public function formtambahproposal(){
		$statusinput = 'success';
		if (Session::has('statusinput')){
			$statusinput = Session::get('statusinput');
			Session::forget('statusinput');
		}
		//queries the programstudi db table, orders by idprodi and lists all data in programstudi table
		$data['programstudi'] = DB::table('programstudi')
		->select('programstudi.*')
		->get();
		//queries the skimpenelitian db table, orders by idskimpenelitian and lists all data in skimpenelitian table
		$data['skimpenelitian'] = DB::table('skimpenelitian')
		->select('skimpenelitian.*')
		->get();
		//queries the bidangilmu db table, orders by idbidilmu and lists all data in bidangilmu table
		$data['bidangilmu'] = DB::table('bidangilmu')
		->select('bidangilmu.*')
		->get();
		//queries the fakultas db table, orders by idfakultas and lists all data in fakultas table
		$data['fakultas'] = DB::table('fakultas')
		->select('fakultas.*')
		->get();
		$data['user']=DB::table('user')
		->where('username','=',Session::get('username'))
		->where('iduser','=',Session::get('iduser'))
		->get();
		$thnsekarang=idate('Y');
		$data['statusinput'] = $statusinput;
		return View::make('admin.tambahproposal', $data)->with('thnsekarang', $thnsekarang);
	}
	public function tambahproposal(){
		$data['statusinput'] = 'success';
		if(((Input::get('judul')) == '') || ((Input::get('sumberdana')) == '') || ((Input::get('idketua2')) == '') || ((Input::get('idketua2')) == '0')){
			$data['statusinput'] = 'failed';
			return Redirect::to('/admin_addproposal')->with('statusinput',$data['statusinput']);
		}
		elseif(((Input::get('judul')) != '') && ((Input::get('sumberdana')) != '') && ((Input::get('idketua2')) != '') && ((Input::get('idketua2')) != '0')){
			$nama_file='';
			if (Input::hasFile('namafile'))
			{
				$nama_file=md5(time().rand()).'.'.Input::file('namafile')->getClientOriginalExtension();
				$destinationPath = app_path() . "/File_Proposal_Penelitian/";
				Input::file('namafile')->move($destinationPath, $nama_file);
			}
			DB::table('proposal')->insert(array(
				'judul'=>Input::get('judul'),
				'sumberdana'=>Input::get('sumberdana'),
				'tahun'=>Input::get('tahun'),
				'statusfile'=>Input::get('statusfile'),
				'namafileproposal'=>$nama_file,
				'read_more'=>(strlen(Input::get('abstrak')) > 220) ?substr(Input::get('abstrak'), 0, 220) : Input::get('abstrak'),
				'abstrak'=>Input::get('abstrak'),
				'idprodi'=>Input::get('idprodi'),
				'idskimpenelitian'=>Input::get('idskimpenelitian'),
				'idbidilmu'=>Input::get('idbidilmu'),
				'idfakultas'=>Input::get('idfakultas'),
				'idketua'=>Input::get('idketua2'),
				'idanggota1'=>Input::get('idanggota1'),
				'idanggota2'=>Input::get('idanggota2'),
				'idanggota3'=>Input::get('idanggota3'),
				'idanggota4'=>Input::get('idanggota4'),
				'anggotalain'=>Input::get('anggotalain')
				));
			date_default_timezone_set('Asia/Jakarta');
			DB::table('history')->insert(array(
				'keterangan'=>'Tambah data proposal',
				'tanggalwaktu'=>date('Y-m-d H:i:s'),
				'iduserhistory'=>Session::get('iduser')
				));
		}
		return Redirect::to('/adminproposal')->with('statusinput',$data['statusinput']);
	}
	public function ubahproposal($idproposal){
		$statusinput = 'success';
		if (Session::has('statusinput')){
			$statusinput = Session::get('statusinput');
			Session::forget('statusinput');
		}
		$data['proposal'] = DB::select('select idproposal, judul, sumberdana, tahun, statusfile, namafileproposal, read_more, abstrak, proposalidprodi, programstudi, pidskimpenelitian, skim, proposalidbidilmu, bidangilmu, proposalidfakultas, fakultas, proposalidketua, ketua, pidanggota1, anggota1, pidanggota2, anggota2, pidanggota3, anggota3, pidanggota4, dosen.nama as anggota4, anggotalain from 
			(select idproposal, judul, sumberdana, tahun, statusfile, namafileproposal, read_more, abstrak, proposalidprodi, programstudi, pidskimpenelitian, skim, proposalidbidilmu, bidangilmu, proposalidfakultas, fakultas, proposalidketua, ketua, pidanggota1, anggota1, pidanggota2, anggota2, pidanggota3, dosen.nama as anggota3, pidanggota4, idanggota4, anggotalain from 
				(select idproposal, judul, sumberdana, tahun, statusfile, namafileproposal, read_more, abstrak, proposalidprodi, programstudi, pidskimpenelitian, skim, proposalidbidilmu, bidangilmu, proposalidfakultas, fakultas, proposalidketua, ketua, pidanggota1, anggota1, pidanggota2, dosen.nama as anggota2, pidanggota3, idanggota3, pidanggota4, idanggota4, anggotalain from 
					(select idproposal, judul, sumberdana, tahun, statusfile, namafileproposal, read_more, abstrak, proposalidprodi, programstudi, pidskimpenelitian, skim, proposalidbidilmu, bidangilmu, proposalidfakultas, fakultas, proposalidketua, ketua, pidanggota1, dosen.nama as anggota1, pidanggota2, idanggota2, pidanggota3, idanggota3, pidanggota4, idanggota4, anggotalain from 
						(select idproposal, judul, sumberdana, tahun, statusfile, namafileproposal, read_more, abstrak, proposalidprodi, programstudi, pidskimpenelitian, skim, proposalidbidilmu, bidangilmu, proposalidfakultas, fakultas, proposalidketua, dosen.nama as ketua, pidanggota1, idanggota1, pidanggota2, idanggota2, pidanggota3, idanggota3, pidanggota4, idanggota4, anggotalain from 
							(select idproposal, judul, sumberdana, tahun, statusfile, namafileproposal, read_more, abstrak, proposalidprodi, programstudi, pidskimpenelitian, skimpenelitian.skim as skim, proposalidbidilmu, bidangilmu, proposalidfakultas, fakultas, proposalidketua, idketua, pidanggota1, idanggota1, pidanggota2, idanggota2, pidanggota3, idanggota3, pidanggota4, idanggota4, anggotalain from
								(select idproposal, judul, sumberdana, tahun, statusfile, namafileproposal, read_more, abstrak, proposal.idprodi as proposalidprodi, programstudi.programstudi as programstudi, proposal.idskimpenelitian as pidskimpenelitian, idskimpenelitian, proposal.idbidilmu as proposalidbidilmu, bidangilmu.bidangilmu as bidangilmu, proposal.idfakultas as proposalidfakultas, fakultas.fakultas as fakultas, proposal.idketua as proposalidketua, idketua, proposal.idanggota1 as pidanggota1, idanggota1, proposal.idanggota2 as pidanggota2, idanggota2, proposal.idanggota3 as pidanggota3, idanggota3, proposal.idanggota4 as pidanggota4, idanggota4, anggotalain from proposal left join programstudi on proposal.idprodi=programstudi.idprodi left join bidangilmu on proposal.idbidilmu=bidangilmu.idbidilmu left join fakultas on proposal.idfakultas=fakultas.idfakultas)
							as tprogramstudi left join skimpenelitian on tprogramstudi.idskimpenelitian=skimpenelitian.idskimpenelitian)
						as tketua left join dosen on tketua.idketua=dosen.iddosen) 
					as t1 left join dosen on t1.idanggota1=dosen.iddosen) 
				as t2 left join dosen on t2.idanggota2=dosen.iddosen) 
			as t3 left join dosen on t3.idanggota3=dosen.iddosen) 
		as t4 left join dosen on t4.idanggota4=dosen.iddosen where idproposal="'.$idproposal.'" limit 1');
		//queries the programstudi db table, orders by idprodi and lists all data in programstudi table
		$data['programstudi'] = DB::table('programstudi')
		->select('programstudi.*')
		->get();
		//queries the skimpenelitian db table, orders by idskimpenelitian and lists all data in skimpenelitian table
		$data['skimpenelitian'] = DB::table('skimpenelitian')
		->select('skimpenelitian.*')
		->get();
		//queries the bidangilmu db table, orders by idbidilmu and lists all data in bidangilmu table
		$data['bidangilmu'] = DB::table('bidangilmu')
		->select('bidangilmu.*')
		->get();
		//queries the fakultas db table, orders by idfakultas and lists all data in fakultas table
		$data['fakultas'] = DB::table('fakultas')
		->select('fakultas.*')
		->get();
		$data['user']=DB::table('user')
		->where('username','=',Session::get('username'))
		->where('iduser','=',Session::get('iduser'))
		->get();
		$thnsekarang=idate('Y');
		$data['statusinput'] = $statusinput;
		return View::make('admin.ubahproposal',$data)->with('thnsekarang', $thnsekarang);
	}
	public function proses_ubahproposal($idproposal){
		$data['statusinput'] = 'success';
		if(((Input::get('judul')) == '') || ((Input::get('sumberdana')) == '') || ((Input::get('idketua2')) == '') || ((Input::get('idketua2')) == '0')){
			$data['statusinput'] = 'failed';
			return Redirect::to('/admin_editproposal/'.$idproposal)->with('statusinput',$data['statusinput']);
		}
		elseif(((Input::get('judul')) != '') && ((Input::get('sumberdana')) != '') && ((Input::get('idketua2')) != '') && ((Input::get('idketua2')) != '0')){
			if (Input::hasFile('namafile'))
			{
				$nama_file=md5(time().rand()).'.'.Input::file('namafile')->getClientOriginalExtension();
				$destinationPath = app_path() . "/File_Proposal_Penelitian/";
				Input::file('namafile')->move($destinationPath, $nama_file);
				//update gambar
	   				DB::table('proposal')->where('idproposal', '=', $idproposal)->update(array(
						'namafileproposal'=>$nama_file
						));
			}
			//update tabel proposal
			DB::table('proposal')->where('idproposal','=',$idproposal)->update(array(
				'judul'=>Input::get('judul'),
				'sumberdana'=>Input::get('sumberdana'),
				'tahun'=>Input::get('tahun'),
				'statusfile'=>Input::get('statusfile'),
				'read_more'=>(strlen(Input::get('abstrak')) > 220) ?substr(Input::get('abstrak'), 0, 220) : Input::get('abstrak'),
				'abstrak'=>Input::get('abstrak'),
				'idprodi'=>Input::get('idprodi'),
				'idskimpenelitian'=>Input::get('idskimpenelitian'),
				'idbidilmu'=>Input::get('idbidilmu'),
				'idfakultas'=>Input::get('idfakultas'),
				'idketua'=>Input::get('idketua'),
				'idanggota1'=>Input::get('idanggota1'),
				'idanggota2'=>Input::get('idanggota2'),
				'idanggota3'=>Input::get('idanggota3'),
				'idanggota4'=>Input::get('idanggota4'),
				'anggotalain'=>Input::get('anggotalain')
				));
			date_default_timezone_set('Asia/Jakarta');
			DB::table('history')->insert(array(
				'keterangan'=>'Ubah data proposal dengan ID '.$idproposal.'.',
				'tanggalwaktu'=>date('Y-m-d H:i:s'),
				'iduserhistory'=>Session::get('iduser')
				));
		}
		return Redirect::to('/adminproposal')->with('statusinput',$data['statusinput']);
	}
	public function hapusproposal($idproposal){
		$data['proposal']=DB::table('proposal')->where('idproposal','=',$idproposal)->delete();
		date_default_timezone_set('Asia/Jakarta');
		DB::table('history')->insert(array(
			'keterangan'=>'Hapus data proposal dengan ID '.$idproposal.'.',
			'tanggalwaktu'=>date('Y-m-d H:i:s'),
			'iduserhistory'=>Session::get('iduser')
			));
		return Redirect::to('/adminproposal');
	}
	public function halamanlaporankemajuan(){
		$data['laporankemajuan'] = DB::select('select idlapkemajuan, judul, sumberdana, tahun, read_more, programstudi, skim, bidangilmu, fakultas, ketua, anggota1, anggota2, anggota3, dosen.nama as anggota4, anggotalain from 
			(select idlapkemajuan, judul, sumberdana, tahun, read_more, programstudi, skim, bidangilmu, fakultas, ketua, anggota1, anggota2, dosen.nama as anggota3, idanggota4, anggotalain from 
				(select idlapkemajuan, judul, sumberdana, tahun, read_more, programstudi, skim, bidangilmu, fakultas, ketua, anggota1, dosen.nama as anggota2, idanggota3, idanggota4, anggotalain from 
					(select idlapkemajuan, judul, sumberdana, tahun, read_more, programstudi, skim, bidangilmu, fakultas, ketua, dosen.nama as anggota1, idanggota2, idanggota3, idanggota4, anggotalain from 
						(select idlapkemajuan, judul, sumberdana, tahun, read_more, programstudi, skim, bidangilmu, fakultas, dosen.nama as ketua, idanggota1, idanggota2, idanggota3, idanggota4, anggotalain from 
							(select idlapkemajuan, judul, sumberdana, tahun, read_more, programstudi, skimpenelitian.skim as skim, bidangilmu, fakultas, idketua, idanggota1, idanggota2, idanggota3, idanggota4, anggotalain from
								(select idlapkemajuan, judul, sumberdana, tahun, read_more, programstudi.programstudi as programstudi, idskimpenelitian, bidangilmu.bidangilmu as bidangilmu, fakultas.fakultas as fakultas, idketua, idanggota1, idanggota2, idanggota3, idanggota4, anggotalain from laporankemajuan left join programstudi on laporankemajuan.idprodi=programstudi.idprodi left join bidangilmu on laporankemajuan.idbidilmu=bidangilmu.idbidilmu left join fakultas on laporankemajuan.idfakultas=fakultas.idfakultas)
							as tprogramstudi left join skimpenelitian on tprogramstudi.idskimpenelitian=skimpenelitian.idskimpenelitian)
						as tketua left join dosen on tketua.idketua=dosen.iddosen) 
					as t1 left join dosen on t1.idanggota1=dosen.iddosen) 
				as t2 left join dosen on t2.idanggota2=dosen.iddosen) 
			as t3 left join dosen on t3.idanggota3=dosen.iddosen) 
		as t4 left join dosen on t4.idanggota4=dosen.iddosen order by idlapkemajuan desc');
		$data['user']=DB::table('user')
		->where('username','=',Session::get('username'))
		->where('iduser','=',Session::get('iduser'))
		->get();
		$thnsekarang=idate('Y');
		$statusinput = 'success';
		if (Session::has('statusinput')){
			$statusinput = Session::get('statusinput');
			Session::forget('statusinput');
		}
		$data['statusinput'] = $statusinput;
		return View::make('admin.lkemajuan', $data)->with('thnsekarang', $thnsekarang);
	}
	public function formtambahlapkemajuan(){
		$statusinput = 'success';
		if (Session::has('statusinput')){
			$statusinput = Session::get('statusinput');
			Session::forget('statusinput');
		}
		//queries the programstudi db table, orders by idprodi and lists all data in programstudi table
		$data['programstudi'] = DB::table('programstudi')
		->select('programstudi.*')
		->get();
		//queries the skimpenelitian db table, orders by idskimpenelitian and lists all data in skimpenelitian table
		$data['skimpenelitian'] = DB::table('skimpenelitian')
		->select('skimpenelitian.*')
		->get();
		//queries the bidangilmu db table, orders by idbidilmu and lists all data in bidangilmu table
		$data['bidangilmu'] = DB::table('bidangilmu')
		->select('bidangilmu.*')
		->get();
		//queries the fakultas db table, orders by idfakultas and lists all data in fakultas table
		$data['fakultas'] = DB::table('fakultas')
		->select('fakultas.*')
		->get();
		$data['user']=DB::table('user')
		->where('username','=',Session::get('username'))
		->where('iduser','=',Session::get('iduser'))
		->get();
		$thnsekarang=idate('Y');
		$data['statusinput'] = $statusinput;
		return View::make('admin.tambahlkemajuan', $data)->with('thnsekarang', $thnsekarang);
	}
	public function tambahlapkemajuan(){
		$data['statusinput'] = 'success';
		if(((Input::get('judul')) == '') || ((Input::get('sumberdana')) == '') || ((Input::get('idketua2')) == '')  || ((Input::get('idketua2')) == '0')){
			$data['statusinput'] = 'failed';
			return Redirect::to('/admin_addprogress')->with('statusinput',$data['statusinput']);
		}
		elseif(((Input::get('judul')) == '') || ((Input::get('sumberdana')) == '') || ((Input::get('ketua')) == '')  || ((Input::get('idketua2')) == '')){
			$nama_file='';
			if (Input::hasFile('namafile'))
			{
				$nama_file=md5(time().rand()).'.'.Input::file('namafile')->getClientOriginalExtension();
				$destinationPath = app_path() . "/File_Kemajuan_Penelitian/";
				Input::file('namafile')->move($destinationPath, $nama_file);
			}
			DB::table('laporankemajuan')->insert(
				[
					'judul'=>Input::get('judul'),
					'sumberdana'=>Input::get('sumberdana'),
					'tahun'=>Input::get('tahun'),
					'statusfile'=>Input::get('statusfile'),
					'namafilekemajuan'=>$nama_file,
					'read_more'=>(strlen(Input::get('abstrak')) > 220) ?substr(Input::get('abstrak'), 0, 220) : Input::get('abstrak'),
					'abstrak'=>Input::get('abstrak'),
					'idprodi'=>Input::get('idprodi'),
					'idskimpenelitian'=>Input::get('idskimpenelitian'),
					'idbidilmu'=>Input::get('idbidilmu'),
					'idfakultas'=>Input::get('idfakultas'),
					'idketua'=>Input::get('idketua2'),
					'idanggota1'=>Input::get('idanggota1'),
					'idanggota2'=>Input::get('idanggota2'),
					'idanggota3'=>Input::get('idanggota3'),
					'idanggota4'=>Input::get('idanggota4'),
					'anggotalain'=>Input::get('anggotalain')]
				);
			date_default_timezone_set('Asia/Jakarta');
			DB::table('history')->insert(array(
				'keterangan'=>'Tambah data laporan kemajuan.',
				'tanggalwaktu'=>date('Y-m-d H:i:s'),
				'iduserhistory'=>Session::get('iduser')
				));
		}
		return Redirect::to('/adminprogress')->with('statusinput',$data['statusinput']);
	}
	public function ubahlaporankemajuan($idlapkemajuan){
		$statusinput = 'success';
		if (Session::has('statusinput')){
			$statusinput = Session::get('statusinput');
			Session::forget('statusinput');
		}
		$data['laporankemajuan'] = DB::select('select idlapkemajuan, judul, sumberdana, tahun, statusfile, namafilekemajuan, read_more, abstrak, kemajuanidprodi, programstudi, kidskimpenelitian, skim, kemajuanidbidilmu, bidangilmu, kemajuanidfakultas, fakultas, kemajuanidketua, ketua, kidanggota1, anggota1, kidanggota2, anggota2, kidanggota3, anggota3, kidanggota4, dosen.nama as anggota4, anggotalain from 
			(select idlapkemajuan, judul, sumberdana, tahun, statusfile, namafilekemajuan, read_more, abstrak, kemajuanidprodi, programstudi, kidskimpenelitian, skim, kemajuanidbidilmu, bidangilmu, kemajuanidfakultas, fakultas, kemajuanidketua, ketua, kidanggota1, anggota1, kidanggota2, anggota2, kidanggota3, dosen.nama as anggota3, kidanggota4, idanggota4, anggotalain from 
				(select idlapkemajuan, judul, sumberdana, tahun, statusfile, namafilekemajuan, read_more, abstrak, kemajuanidprodi, programstudi, kidskimpenelitian, skim, kemajuanidbidilmu, bidangilmu, kemajuanidfakultas, fakultas, kemajuanidketua, ketua, kidanggota1, anggota1, kidanggota2, dosen.nama as anggota2, kidanggota3, idanggota3, kidanggota4, idanggota4, anggotalain from 
					(select idlapkemajuan, judul, sumberdana, tahun, statusfile, namafilekemajuan, read_more, abstrak, kemajuanidprodi, programstudi, kidskimpenelitian, skim, kemajuanidbidilmu, bidangilmu, kemajuanidfakultas, fakultas, kemajuanidketua, ketua, kidanggota1, dosen.nama as anggota1, kidanggota2, idanggota2, kidanggota3, idanggota3, kidanggota4, idanggota4, anggotalain from 
						(select idlapkemajuan, judul, sumberdana, tahun, statusfile, namafilekemajuan, read_more, abstrak, kemajuanidprodi, programstudi, kidskimpenelitian, skim, kemajuanidbidilmu, bidangilmu, kemajuanidfakultas, fakultas, kemajuanidketua, dosen.nama as ketua, kidanggota1, idanggota1, kidanggota2, idanggota2, kidanggota3, idanggota3, kidanggota4, idanggota4, anggotalain from 
							(select idlapkemajuan, judul, sumberdana, tahun, statusfile, namafilekemajuan, read_more, abstrak, kemajuanidprodi, programstudi, kidskimpenelitian, skimpenelitian.skim as skim, kemajuanidbidilmu, bidangilmu, kemajuanidfakultas, fakultas, kemajuanidketua, idketua, kidanggota1, idanggota1, kidanggota2, idanggota2, kidanggota3, idanggota3, kidanggota4, idanggota4, anggotalain from
								(select idlapkemajuan, judul, sumberdana, tahun, statusfile, namafilekemajuan, read_more, abstrak, laporankemajuan.idprodi as kemajuanidprodi, programstudi.programstudi as programstudi, laporankemajuan.idskimpenelitian as kidskimpenelitian, idskimpenelitian, laporankemajuan.idbidilmu as kemajuanidbidilmu, bidangilmu.bidangilmu as bidangilmu, laporankemajuan.idfakultas as kemajuanidfakultas, fakultas.fakultas as fakultas, laporankemajuan.idketua as kemajuanidketua, idketua, laporankemajuan.idanggota1 as kidanggota1, idanggota1, laporankemajuan.idanggota2 as kidanggota2, idanggota2, laporankemajuan.idanggota3 as kidanggota3, idanggota3, laporankemajuan.idanggota4 as kidanggota4, idanggota4, anggotalain from laporankemajuan left join programstudi on laporankemajuan.idprodi=programstudi.idprodi left join bidangilmu on laporankemajuan.idbidilmu=bidangilmu.idbidilmu left join fakultas on laporankemajuan.idfakultas=fakultas.idfakultas)
							as tprogramstudi left join skimpenelitian on tprogramstudi.idskimpenelitian=skimpenelitian.idskimpenelitian)
						as tketua left join dosen on tketua.idketua=dosen.iddosen) 
					as t1 left join dosen on t1.idanggota1=dosen.iddosen) 
				as t2 left join dosen on t2.idanggota2=dosen.iddosen) 
			as t3 left join dosen on t3.idanggota3=dosen.iddosen) 
		as t4 left join dosen on t4.idanggota4=dosen.iddosen where idlapkemajuan="'.$idlapkemajuan.'" limit 1');
		//queries the programstudi db table, orders by idprodi and lists all data in programstudi table
		$data['programstudi'] = DB::table('programstudi')
		->select('programstudi.*')
		->get();
		//queries the skimpenelitian db table, orders by idskimpenelitian and lists all data in skimpenelitian table
		$data['skimpenelitian'] = DB::table('skimpenelitian')
		->select('skimpenelitian.*')
		->get();
		//queries the bidangilmu db table, orders by idbidilmu and lists all data in bidangilmu table
		$data['bidangilmu'] = DB::table('bidangilmu')
		->select('bidangilmu.*')
		->get();
		//queries the fakultas db table, orders by idfakultas and lists all data in fakultas table
		$data['fakultas'] = DB::table('fakultas')
		->select('fakultas.*')
		->get();
		$data['user']=DB::table('user')
		->where('username','=',Session::get('username'))
		->where('iduser','=',Session::get('iduser'))
		->get();
		$thnsekarang=idate('Y');
		$data['statusinput'] = $statusinput;
		return View::make('admin.ubahlkemajuan',$data)->with('thnsekarang', $thnsekarang);
	}
	public function proses_ubahkemajuan($idlapkemajuan){
		$data['statusinput'] = 'success';
		if(((Input::get('judul')) == '') || ((Input::get('sumberdana')) == '') || ((Input::get('idketua2')) == '') || ((Input::get('idketua2')) == '0')){
			$data['statusinput'] = 'failed';
			return Redirect::to('/admin_editprogress/'.$idlapkemajuan)->with('statusinput',$data['statusinput']);
		}
		elseif(((Input::get('judul')) != '') && ((Input::get('sumberdana')) != '') && ((Input::get('idketua2')) != '') && ((Input::get('idketua2')) != '0')){
			if (Input::hasFile('namafile'))
			{
				$nama_file=md5(time().rand()).'.'.Input::file('namafile')->getClientOriginalExtension();
				$destinationPath = app_path() . "/File_Kemajuan_Penelitian/";
				Input::file('namafile')->move($destinationPath, $nama_file);
				//update gambar
	   				DB::table('laporankemajuan')->where('idlapkemajuan', '=', $idlapkemajuan)->update(array(
						'namafilekemajuan'=>$nama_file
						));
			}
			//update tabel laporankemajuan
			DB::table('laporankemajuan')->where('idlapkemajuan','=',$idlapkemajuan)->update(array(
				'judul'=>Input::get('judul'),
				'sumberdana'=>Input::get('sumberdana'),
				'tahun'=>Input::get('tahun'),
				'statusfile'=>Input::get('statusfile'),
				'read_more'=>(strlen(Input::get('abstrak')) > 220) ?substr(Input::get('abstrak'), 0, 220) : Input::get('abstrak'),
				'abstrak'=>Input::get('abstrak'),
				'idprodi'=>Input::get('idprodi'),
				'idskimpenelitian'=>Input::get('idskimpenelitian'),
				'idbidilmu'=>Input::get('idbidilmu'),
				'idfakultas'=>Input::get('idfakultas'),
				'idketua'=>Input::get('idketua'),
				'idanggota1'=>Input::get('idanggota1'),
				'idanggota2'=>Input::get('idanggota2'),
				'idanggota3'=>Input::get('idanggota3'),
				'idanggota4'=>Input::get('idanggota4'),
				'anggotalain'=>Input::get('anggotalain')
				));
			date_default_timezone_set('Asia/Jakarta');
			DB::table('history')->insert(array(
				'keterangan'=>'Ubah data laporan kemajuan dengan ID '.$idlapkemajuan.'.',
				'tanggalwaktu'=>date('Y-m-d H:i:s'),
				'iduserhistory'=>Session::get('iduser')
				));
		}
		return Redirect::to('/adminprogress')->with('statusinput',$data['statusinput']);
	}
	public function hapuslaporankemajuan($idlapkemajuan){
		$data['laporankemajuan']=DB::table('laporankemajuan')->where('idlapkemajuan','=',$idlapkemajuan)->delete();
		date_default_timezone_set('Asia/Jakarta');
		DB::table('history')->insert(array(
			'keterangan'=>'Hapus data laporan kemajuan dengan ID '.$idlapkemajuan.'.',
			'tanggalwaktu'=>date('Y-m-d H:i:s'),
			'iduserhistory'=>Session::get('iduser')
			));
		return Redirect::to('/adminprogress');
	}
	public function halamanlaporanakhir(){
		$data['laporanakhir'] = DB::select('select idlapakhir, judul, sumberdana, tahun, read_more, programstudi, skim, bidangilmu, fakultas, ketua, anggota1, anggota2, anggota3, dosen.nama as anggota4, anggotalain from 
			(select idlapakhir, judul, sumberdana, tahun, read_more, programstudi, skim, bidangilmu, fakultas, ketua, anggota1, anggota2, dosen.nama as anggota3, idanggota4, anggotalain from 
				(select idlapakhir, judul, sumberdana, tahun, read_more, programstudi, skim, bidangilmu, fakultas, ketua, anggota1, dosen.nama as anggota2, idanggota3, idanggota4, anggotalain from 
					(select idlapakhir, judul, sumberdana, tahun, read_more, programstudi, skim, bidangilmu, fakultas, ketua, dosen.nama as anggota1, idanggota2, idanggota3, idanggota4, anggotalain from 
						(select idlapakhir, judul, sumberdana, tahun, read_more, programstudi, skim, bidangilmu, fakultas, dosen.nama as ketua, idanggota1, idanggota2, idanggota3, idanggota4, anggotalain from 
							(select idlapakhir, judul, sumberdana, tahun, read_more, programstudi, skimpenelitian.skim as skim, bidangilmu, fakultas, idketua, idanggota1, idanggota2, idanggota3, idanggota4, anggotalain from
								(select idlapakhir, judul, sumberdana, tahun, read_more, programstudi.programstudi as programstudi, idskimpenelitian, bidangilmu.bidangilmu as bidangilmu, fakultas.fakultas as fakultas, idketua, idanggota1, idanggota2, idanggota3, idanggota4, anggotalain from laporanakhir left join programstudi on laporanakhir.idprodi=programstudi.idprodi left join bidangilmu on laporanakhir.idbidilmu=bidangilmu.idbidilmu left join fakultas on laporanakhir.idfakultas=fakultas.idfakultas)
							as tprogramstudi left join skimpenelitian on tprogramstudi.idskimpenelitian=skimpenelitian.idskimpenelitian)
						as tketua left join dosen on tketua.idketua=dosen.iddosen) 
					as t1 left join dosen on t1.idanggota1=dosen.iddosen) 
				as t2 left join dosen on t2.idanggota2=dosen.iddosen) 
			as t3 left join dosen on t3.idanggota3=dosen.iddosen) 
		as t4 left join dosen on t4.idanggota4=dosen.iddosen order by idlapakhir desc');
		$data['user']=DB::table('user')
		->where('username','=',Session::get('username'))
		->where('iduser','=',Session::get('iduser'))
		->get();
		$thnsekarang=idate('Y');
		return View::make('admin.lakhir', $data)->with('thnsekarang', $thnsekarang);
	}
	public function formtambahlapakhir(){
		$statusinput = 'success';
		if (Session::has('statusinput')){
			$statusinput = Session::get('statusinput');
			Session::forget('statusinput');
		}
		//queries the programstudi db table, orders by idprodi and lists all data in programstudi table
		$data['programstudi'] = DB::table('programstudi')
		->select('programstudi.*')
		->get();
		//queries the skimpenelitian db table, orders by idskimpenelitian and lists all data in skimpenelitian table
		$data['skimpenelitian'] = DB::table('skimpenelitian')
		->select('skimpenelitian.*')
		->get();
		//queries the bidangilmu db table, orders by idbidilmu and lists all data in bidangilmu table
		$data['bidangilmu'] = DB::table('bidangilmu')
		->select('bidangilmu.*')
		->get();
		//queries the fakultas db table, orders by idfakultas and lists all data in fakultas table
		$data['fakultas'] = DB::table('fakultas')
		->select('fakultas.*')
		->get();
		$data['user']=DB::table('user')
		->where('username','=',Session::get('username'))
		->where('iduser','=',Session::get('iduser'))
		->get();
		$thnsekarang=idate('Y');
		$data['statusinput'] = $statusinput;
		return View::make('admin.tambahlakhir', $data)->with('thnsekarang', $thnsekarang);
	}
	public function tambahlaporanakhir(){
		$data['statusinput'] = 'success';
		if(((Input::get('judul')) == '') || ((Input::get('sumberdana')) == '') || ((Input::get('idketua2')) == '') || ((Input::get('idketua2')) == '0')){
			$data['statusinput'] = 'failed';
			return Redirect::to('/admin_addfinal')->with('statusinput',$data['statusinput']);
		}
		elseif(((Input::get('judul')) != '') && ((Input::get('sumberdana')) != '') && ((Input::get('idketua2')) != '') && ((Input::get('idketua2')) != '0')){
			$nama_file='';
			if (Input::hasFile('namafile'))
			{
				$nama_file=md5(time().rand()).'.'.Input::file('namafile')->getClientOriginalExtension();
				$destinationPath = app_path() . "/File_Akhir_Penelitian/";
				Input::file('namafile')->move($destinationPath, $nama_file);
			}
			DB::table('laporanakhir')->insert(array(
				'judul'=>Input::get('judul'),
				'sumberdana'=>Input::get('sumberdana'),
				'tahun'=>Input::get('tahun'),
				'statusfile'=>Input::get('statusfile'),
				'namafileakhir'=>$nama_file,
				'read_more'=>(strlen(Input::get('abstrak')) > 220) ?substr(Input::get('abstrak'), 0, 220) : Input::get('abstrak'),
				'abstrak'=>Input::get('abstrak'),
				'idprodi'=>Input::get('idprodi'),
				'idskimpenelitian'=>Input::get('idskimpenelitian'),
				'idbidilmu'=>Input::get('idbidilmu'),
				'idfakultas'=>Input::get('idfakultas'),
				'idketua'=>Input::get('idketua2'),
				'idanggota1'=>Input::get('idanggota1'),
				'idanggota2'=>Input::get('idanggota2'),
				'idanggota3'=>Input::get('idanggota3'),
				'idanggota4'=>Input::get('idanggota4'),
				'anggotalain'=>Input::get('anggotalain')
				));
			date_default_timezone_set('Asia/Jakarta');
			DB::table('history')->insert(array(
				'keterangan'=>'Tambah data laporan akhir.',
				'tanggalwaktu'=>date('Y-m-d H:i:s'),
				'iduserhistory'=>Session::get('iduser')
				));
		}
		return Redirect::to('/adminfinal')->with('statusinput',$data['statusinput']);
	}
	public function ubahlaporanakhir($idlapakhir){
		$statusinput = 'success';
		if (Session::has('statusinput')){
			$statusinput = Session::get('statusinput');
			Session::forget('statusinput');
		}
		$data['laporanakhir'] = DB::select('select idlapakhir, judul, sumberdana, tahun, statusfile, namafileakhir, read_more, abstrak, akhiridprodi, programstudi, aidskimpenelitian, skim, akhiridbidilmu, bidangilmu, akhiridfakultas, fakultas, akhiridketua, ketua, aidanggota1, anggota1, aidanggota2, anggota2, aidanggota3, anggota3, aidanggota4, dosen.nama as anggota4, anggotalain from 
			(select idlapakhir, judul, sumberdana, tahun, statusfile, namafileakhir, read_more, abstrak, akhiridprodi, programstudi, aidskimpenelitian, skim, akhiridbidilmu, bidangilmu, akhiridfakultas, fakultas, akhiridketua, ketua, aidanggota1, anggota1, aidanggota2, anggota2, aidanggota3, dosen.nama as anggota3, aidanggota4, idanggota4, anggotalain from 
				(select idlapakhir, judul, sumberdana, tahun, statusfile, namafileakhir, read_more, abstrak, akhiridprodi, programstudi, aidskimpenelitian, skim, akhiridbidilmu, bidangilmu, akhiridfakultas, fakultas, akhiridketua, ketua, aidanggota1, anggota1, aidanggota2, dosen.nama as anggota2, aidanggota3, idanggota3, aidanggota4, idanggota4, anggotalain from 
					(select idlapakhir, judul, sumberdana, tahun, statusfile, namafileakhir, read_more, abstrak, akhiridprodi, programstudi, aidskimpenelitian, skim, akhiridbidilmu, bidangilmu, akhiridfakultas, fakultas, akhiridketua, ketua, aidanggota1, dosen.nama as anggota1, aidanggota2, idanggota2, aidanggota3, idanggota3, aidanggota4, idanggota4, anggotalain from 
						(select idlapakhir, judul, sumberdana, tahun, statusfile, namafileakhir, read_more, abstrak, akhiridprodi, programstudi, aidskimpenelitian, skim, akhiridbidilmu, bidangilmu, akhiridfakultas, fakultas, akhiridketua, dosen.nama as ketua, aidanggota1, idanggota1, aidanggota2, idanggota2, aidanggota3, idanggota3, aidanggota4, idanggota4, anggotalain from 
							(select idlapakhir, judul, sumberdana, tahun, statusfile, namafileakhir, read_more, abstrak, akhiridprodi, programstudi, aidskimpenelitian, skimpenelitian.skim as skim, akhiridbidilmu, bidangilmu, akhiridfakultas, fakultas, akhiridketua, idketua, aidanggota1, idanggota1, aidanggota2, idanggota2, aidanggota3, idanggota3, aidanggota4, idanggota4, anggotalain from
								(select idlapakhir, judul, sumberdana, tahun, statusfile, namafileakhir, read_more, abstrak, laporanakhir.idprodi as akhiridprodi, programstudi.programstudi as programstudi, laporanakhir.idskimpenelitian as aidskimpenelitian, idskimpenelitian, laporanakhir.idbidilmu as akhiridbidilmu, bidangilmu.bidangilmu as bidangilmu, laporanakhir.idfakultas as akhiridfakultas, fakultas.fakultas as fakultas, laporanakhir.idketua as akhiridketua, idketua, laporanakhir.idanggota1 as aidanggota1, idanggota1, laporanakhir.idanggota2 as aidanggota2, idanggota2, laporanakhir.idanggota3 as aidanggota3, idanggota3, laporanakhir.idanggota4 as aidanggota4, idanggota4, anggotalain from laporanakhir left join programstudi on laporanakhir.idprodi=programstudi.idprodi left join bidangilmu on laporanakhir.idbidilmu=bidangilmu.idbidilmu left join fakultas on laporanakhir.idfakultas=fakultas.idfakultas)
							as tprogramstudi left join skimpenelitian on tprogramstudi.idskimpenelitian=skimpenelitian.idskimpenelitian)
						as tketua left join dosen on tketua.idketua=dosen.iddosen) 
					as t1 left join dosen on t1.idanggota1=dosen.iddosen) 
				as t2 left join dosen on t2.idanggota2=dosen.iddosen) 
			as t3 left join dosen on t3.idanggota3=dosen.iddosen) 
		as t4 left join dosen on t4.idanggota4=dosen.iddosen where idlapakhir="'.$idlapakhir.'" limit 1');
		//queries the programstudi db table, orders by idprodi and lists all data in programstudi table
		$data['programstudi'] = DB::table('programstudi')
		->select('programstudi.*')
		->get();
		//queries the skimpenelitian db table, orders by idskimpenelitian and lists all data in skimpenelitian table
		$data['skimpenelitian'] = DB::table('skimpenelitian')
		->select('skimpenelitian.*')
		->get();
		//queries the bidangilmu db table, orders by idbidilmu and lists all data in bidangilmu table
		$data['bidangilmu'] = DB::table('bidangilmu')
		->select('bidangilmu.*')
		->get();
		//queries the fakultas db table, orders by idfakultas and lists all data in fakultas table
		$data['fakultas'] = DB::table('fakultas')
		->select('fakultas.*')
		->get();
		$data['user']=DB::table('user')
		->where('username','=',Session::get('username'))
		->where('iduser','=',Session::get('iduser'))
		->get();
		$thnsekarang=idate('Y');
		$data['statusinput'] = $statusinput;
		return View::make('admin.ubahlakhir',$data)->with('thnsekarang', $thnsekarang);
	}
	public function proses_ubahakhir($idlapakhir){
		$data['statusinput'] = 'success';
		if(((Input::get('judul')) == '') || ((Input::get('sumberdana')) == '') || ((Input::get('idketua2')) == '') || ((Input::get('idketua2')) == '0')){
			$data['statusinput'] = 'failed';
			return Redirect::to('/admin_editfinal/'.$idlapakhir)->with('statusinput',$data['statusinput']);
		}
		elseif(((Input::get('judul')) != '') && ((Input::get('sumberdana')) != '') && ((Input::get('idketua2')) != '') && ((Input::get('idketua2')) != '0')){
			if (Input::hasFile('namafile'))
			{
				$nama_file=md5(time().rand()).'.'.Input::file('namafile')->getClientOriginalExtension();
				$destinationPath = app_path() . "/File_Akhir_Penelitian/";
				Input::file('namafile')->move($destinationPath, $nama_file);
				//update gambar
	   				DB::table('laporanakhir')->where('idlapakhir', '=', $idlapakhir)->update(array(
						'namafileakhir'=>$nama_file
						));
			}
			//update tabel laporanakhir
			DB::table('laporanakhir')->where('idlapakhir','=',$idlapakhir)->update(array(
				'judul'=>Input::get('judul'),
				'sumberdana'=>Input::get('sumberdana'),
				'tahun'=>Input::get('tahun'),
				'statusfile'=>Input::get('statusfile'),
				'read_more'=>(strlen(Input::get('abstrak')) > 220) ?substr(Input::get('abstrak'), 0, 220) : Input::get('abstrak'),
				'abstrak'=>Input::get('abstrak'),
				'idprodi'=>Input::get('idprodi'),
				'idskimpenelitian'=>Input::get('idskimpenelitian'),
				'idbidilmu'=>Input::get('idbidilmu'),
				'idfakultas'=>Input::get('idfakultas'),
				'idketua'=>Input::get('idketua'),
				'idanggota1'=>Input::get('idanggota1'),
				'idanggota2'=>Input::get('idanggota2'),
				'idanggota3'=>Input::get('idanggota3'),
				'idanggota4'=>Input::get('idanggota4'),
				'anggotalain'=>Input::get('anggotalain')
				));
			date_default_timezone_set('Asia/Jakarta');
			DB::table('history')->insert(array(
				'keterangan'=>'Ubah data laporan akhir dengan ID '.$idlapakhir.'.',
				'tanggalwaktu'=>date('Y-m-d H:i:s'),
				'iduserhistory'=>Session::get('iduser')
				));
		}
		return Redirect::to('/adminfinal')->with('statusinput',$data['statusinput']);
	}
	public function hapuslaporanakhir($idlapakhir){
		$data['laporanakhir']=DB::table('laporanakhir')->where('idlapakhir','=',$idlapakhir)->delete();
		date_default_timezone_set('Asia/Jakarta');
		DB::table('history')->insert(array(
			'keterangan'=>'Hapus data laporan akhir dengan ID '.$idlapakhir.'.',
			'tanggalwaktu'=>date('Y-m-d H:i:s'),
			'iduserhistory'=>Session::get('iduser')
			));
		return Redirect::to('/adminfinal');
	}
	public function ubahpassword(){
		$data['user']=DB::table('user')
		->where('username','=',Session::get('username'))
		->where('iduser','=',Session::get('iduser'))
		->get();
		$thnsekarang=idate('Y');
		if (Session::has('message')) {
			$data['message'] = Session::get('message');
			Session::forget('message');
		}
		return View::make('admin.ubahkkunci',$data)->with('thnsekarang', $thnsekarang);
	}
	public function ubahpassworddosen(){
		$data['dosen']=DB::table('dosen')
		->where('username','=',Session::get('username'))
		->where('iddosen','=',Session::get('iddosen'))
		->get();
		if (Session::has('message')) {
			$data['message'] = Session::get('message');
			Session::forget('message');
		}
		$thnsekarang=idate('Y');
		return View::make('lecturer.ubahkkunci',$data)->with('thnsekarang', $thnsekarang);
	}
	public function ubahpasswordketua(){
		$data['user']=DB::table('user')
		->where('username','=',Session::get('username'))
		->where('iduser','=',Session::get('iduser'))
		->get();
		if (Session::has('message')) {
			$data['message'] = Session::get('message');
			Session::forget('message');
		}
		$thnsekarang=idate('Y');
		return View::make('chief.ubahkkunci',$data)->with('thnsekarang', $thnsekarang);
	}
	public function logout(){
		date_default_timezone_set('Asia/Jakarta');
		DB::table('history')->insert(array(
			'keterangan'=>'Logout dari sistem.',
			'tanggalwaktu'=>date('Y-m-d H:i:s'),
			'iduserhistory'=>Session::get('iduser')
			));
		Session::flush(); //Menghapus semua aksi yang terjadi
		return Redirect::to('home');
	}
	public function proses_ubahpassword(){
		$iduser=Session::get('iduser');
		$pdb=Session::get('password');
		$plama=md5(Input::get('plama'));
		$pbaru=Input::get('pbaru');
		$pbaru2=Input::get('pbaru2');
		if (($plama==$pdb) AND ($pbaru==$pbaru2) AND (($pbaru != '') OR ($pbaru2 != ''))){
			//update tabel user
			DB::table('user')->where('iduser','=',$iduser)->update(array(
			'password'=>md5(Input::get('pbaru'))
			));
			date_default_timezone_set('Asia/Jakarta');
			DB::table('history')->insert(array(
				'keterangan'=>'Ubah password administrator.',
				'tanggalwaktu'=>date('Y-m-d H:i:s'),
				'iduserhistory'=>Session::get('iduser')
			));
			$user=DB::table('user')->where('iduser','=',$iduser)->first();
			Session::put('password',$user->password);
			return Redirect::to('/adminhome')->with('message','Password berhasil diubah');
		}
		else{
			return Redirect::to('/admin_editpassword')->with('message','Password lama salah/password baru belum diisi!');
		}
	}
	public function pupassworddosen(){
		$iddosen=Session::get('iddosen');
		$pdb=Session::get('password');
		$plama=md5(Input::get('plama'));
		$pbaru=Input::get('pbaru');
		$pbaru2=Input::get('pbaru2');
		if (($plama==$pdb) AND ($pbaru==$pbaru2) AND (($pbaru != '') OR ($pbaru2 != ''))){
			//update tabel dosen
			DB::table('dosen')->where('iddosen','=',$iddosen)->update(array(
			'password'=>md5(Input::get('pbaru'))
			));
			date_default_timezone_set('Asia/Jakarta');
			DB::table('history')->insert(array(
				'keterangan'=>'Ubah password dosen.',
				'tanggalwaktu'=>date('Y-m-d H:i:s'),
				'iduserhistory'=>Session::get('iddosen')
			));
			$dosen=DB::table('dosen')->where('iddosen','=',$iddosen)->first();
			Session::put('password',$dosen->password);
			return Redirect::to('/lecturerhome')->with('message','Password berhasil diubah');
		}
		else{
			return Redirect::to('/lecturer_editpassword')->with('message','Password lama salah/password baru belum diisi!');
		}
	}
	public function pupasswordketua(){
		$iduser=Session::get('iduser');
		$pdb=Session::get('password');
		$plama=md5(Input::get('plama'));
		$pbaru=Input::get('pbaru');
		$pbaru2=Input::get('pbaru2');
		if (($plama==$pdb) AND ($pbaru==$pbaru2) AND (($pbaru != '') OR ($pbaru2 != ''))){
			//update tabel user
			DB::table('user')->where('iduser','=',$iduser)->update(array(
			'password'=>md5(Input::get('pbaru'))
			));
			date_default_timezone_set('Asia/Jakarta');
			DB::table('history')->insert(array(
				'keterangan'=>'Ubah password ketua Lemlit.',
				'tanggalwaktu'=>date('Y-m-d H:i:s'),
				'iduserhistory'=>Session::get('iduser')
			));
			$user=DB::table('user')->where('iduser','=',$iduser)->first();
			Session::put('password',$user->password);
			return Redirect::to('/chiefhome')->with('message','Password berhasil diubah');
		}
		else{
			return Redirect::to('/chief_editpassword')->with('message','Masukkan kembali password Anda!');
		}
	}
	public function proposal(){
		//queries the skimpenelitian db table, orders by idskimpenelitian and lists all data in skimpenelitian table
		$data['skimpenelitian'] = DB::table('skimpenelitian')
		->select('skimpenelitian.*')
		->get();
		//queries the bidangilmu db table, orders by idbidilmu and lists all data in bidangilmu table
		$data['bidangilmu'] = DB::table('bidangilmu')
		->select('bidangilmu.*')
		->get();
		//queries the fakultas db table, orders by idfakultas and lists all data in fakultas table
		$data['fakultas'] = DB::table('fakultas')
		->select('fakultas.*')
		->get();
		$thnsekarang=idate('Y');
		$data['proposal'] = DB::table('proposal')->distinct()->select('proposal.tahun')->orderBy('tahun', 'asc')->get();
		return View::make('user.proposal', $data)->with('thnsekarang',$thnsekarang);
	}
	public function pkmproposal(){
		//queries the skimpenelitian db table, orders by idskimpenelitian and lists all data in skimpenelitian table
		$data['skimpenelitian'] = DB::table('skimpenelitian')
		->select('skimpenelitian.*')
		->get();
		//queries the bidangilmu db table, orders by idbidilmu and lists all data in bidangilmu table
		$data['bidangilmu'] = DB::table('bidangilmu')
		->select('bidangilmu.*')
		->get();
		//queries the fakultas db table, orders by idfakultas and lists all data in fakultas table
		$data['fakultas'] = DB::table('fakultas')
		->select('fakultas.*')
		->get();
		$thnsekarang=idate('Y');
		$data['proposalpkm'] = DB::table('proposalpkm')->distinct()->select('proposalpkm.tahun')->orderBy('tahun', 'asc')->get();
		return View::make('user.proposalpkm', $data)->with('thnsekarang',$thnsekarang);
	}
	public function proses_cariproposal(){ 
		$idskimpenelitian=Input::get('idskimpenelitian');
		$idbidilmu=Input::get('idbidilmu');
		$idfakultas=Input::get('idfakultas');
		$tahun=Input::get('tahun');
		$tahun2=Input::get('tahun2');
		$kunci=Input::get('kunci');
		$proposal=DB::table('proposal')
		->join('skimpenelitian', 'proposal.idskimpenelitian', '=', 'skimpenelitian.idskimpenelitian')
		->join('bidangilmu', 'proposal.idbidilmu', '=', 'bidangilmu.idbidilmu')
		->join('fakultas', 'proposal.idfakultas', '=', 'fakultas.idfakultas')
		->whereBetween('tahun', array($tahun, $tahun2));
		if ($idskimpenelitian != ''){
			$proposal->where('proposal.idskimpenelitian','=',$idskimpenelitian);
		}
		if ($idbidilmu != ''){
			$proposal->where('proposal.idbidilmu','=',$idbidilmu);
		}
		if ($idfakultas != ''){
			$proposal->where('proposal.idfakultas','=',$idfakultas);
		}
		if ($kunci != ''){
			$proposal->where('proposal.judul','LIKE','%'.$kunci.'%')->orWhere('proposal.sumberdana','LIKE','%'.$kunci.'%');
		}
		$results=$proposal->get();
		$thnsekarang=idate('Y');
		return View::make('user.cariproposal')->with('proposal', $results)->with('thnsekarang', $thnsekarang);
	}
	public function proses_cproposalpkm(){ 
		$idskimpenelitian=Input::get('idskimpenelitian');
		$idbidilmu=Input::get('idbidilmu');
		$idfakultas=Input::get('idfakultas');
		$tahun=Input::get('tahun');
		$tahun2=Input::get('tahun2');
		$kunci=Input::get('kunci');
		$proposalpkm=DB::table('proposalpkm')
		->join('skimpenelitian', 'proposalpkm.idskimpenelitian', '=', 'skimpenelitian.idskimpenelitian')
		->join('bidangilmu', 'proposalpkm.idbidilmu', '=', 'bidangilmu.idbidilmu')
		->join('fakultas', 'proposalpkm.idfakultas', '=', 'fakultas.idfakultas')
		->whereBetween('tahun', array($tahun, $tahun2));
		if ($idskimpenelitian != ''){
			$proposalpkm->where('proposalpkm.idskimpenelitian','=',$idskimpenelitian);
		}
		if ($idbidilmu != ''){
			$proposalpkm->where('proposalpkm.idbidilmu','=',$idbidilmu);
		}
		if ($idfakultas != ''){
			$proposalpkm->where('proposalpkm.idfakultas','=',$idfakultas);
		}
		if ($kunci != ''){
			$proposalpkm->where('proposalpkm.judul','LIKE','%'.$kunci.'%')->orWhere('proposalpkm.sumberdana','LIKE','%'.$kunci.'%');
		}
		$results=$proposalpkm->get();
		$thnsekarang=idate('Y');
		return View::make('user.cariproposalpkm')->with('proposalpkm', $results)->with('thnsekarang', $thnsekarang);
	}
	public function detailproposal($idproposal){
		$data['proposal'] = DB::select('select idproposal, judul, sumberdana, tahun, statusfile, namafileproposal, read_more, abstrak, proposalidprodi, programstudi, pidskimpenelitian, skim, proposalidbidilmu, bidangilmu, proposalidfakultas, fakultas, proposalidketua, ketua, pidanggota1, anggota1, pidanggota2, anggota2, pidanggota3, anggota3, pidanggota4, dosen.nama as anggota4, anggotalain from 
			(select idproposal, judul, sumberdana, tahun, statusfile, namafileproposal, read_more, abstrak, proposalidprodi, programstudi, pidskimpenelitian, skim, proposalidbidilmu, bidangilmu, proposalidfakultas, fakultas, proposalidketua, ketua, pidanggota1, anggota1, pidanggota2, anggota2, pidanggota3, dosen.nama as anggota3, pidanggota4, idanggota4, anggotalain from 
				(select idproposal, judul, sumberdana, tahun, statusfile, namafileproposal, read_more, abstrak, proposalidprodi, programstudi, pidskimpenelitian, skim, proposalidbidilmu, bidangilmu, proposalidfakultas, fakultas, proposalidketua, ketua, pidanggota1, anggota1, pidanggota2, dosen.nama as anggota2, pidanggota3, idanggota3, pidanggota4, idanggota4, anggotalain from 
					(select idproposal, judul, sumberdana, tahun, statusfile, namafileproposal, read_more, abstrak, proposalidprodi, programstudi, pidskimpenelitian, skim, proposalidbidilmu, bidangilmu, proposalidfakultas, fakultas, proposalidketua, ketua, pidanggota1, dosen.nama as anggota1, pidanggota2, idanggota2, pidanggota3, idanggota3, pidanggota4, idanggota4, anggotalain from 
						(select idproposal, judul, sumberdana, tahun, statusfile, namafileproposal, read_more, abstrak, proposalidprodi, programstudi, pidskimpenelitian, skim, proposalidbidilmu, bidangilmu, proposalidfakultas, fakultas, proposalidketua, dosen.nama as ketua, pidanggota1, idanggota1, pidanggota2, idanggota2, pidanggota3, idanggota3, pidanggota4, idanggota4, anggotalain from 
							(select idproposal, judul, sumberdana, tahun, statusfile, namafileproposal, read_more, abstrak, proposalidprodi, programstudi, pidskimpenelitian, skimpenelitian.skim as skim, proposalidbidilmu, bidangilmu, proposalidfakultas, fakultas, proposalidketua, idketua, pidanggota1, idanggota1, pidanggota2, idanggota2, pidanggota3, idanggota3, pidanggota4, idanggota4, anggotalain from
								(select idproposal, judul, sumberdana, tahun, statusfile, namafileproposal, read_more, abstrak, proposal.idprodi as proposalidprodi, programstudi.programstudi as programstudi, proposal.idskimpenelitian as pidskimpenelitian, idskimpenelitian, proposal.idbidilmu as proposalidbidilmu, bidangilmu.bidangilmu as bidangilmu, proposal.idfakultas as proposalidfakultas, fakultas.fakultas as fakultas, proposal.idketua as proposalidketua, idketua, proposal.idanggota1 as pidanggota1, idanggota1, proposal.idanggota2 as pidanggota2, idanggota2, proposal.idanggota3 as pidanggota3, idanggota3, proposal.idanggota4 as pidanggota4, idanggota4, anggotalain from proposal left join programstudi on proposal.idprodi=programstudi.idprodi left join bidangilmu on proposal.idbidilmu=bidangilmu.idbidilmu left join fakultas on proposal.idfakultas=fakultas.idfakultas)
							as tprogramstudi left join skimpenelitian on tprogramstudi.idskimpenelitian=skimpenelitian.idskimpenelitian)
						as tketua left join dosen on tketua.idketua=dosen.iddosen) 
					as t1 left join dosen on t1.idanggota1=dosen.iddosen) 
				as t2 left join dosen on t2.idanggota2=dosen.iddosen) 
			as t3 left join dosen on t3.idanggota3=dosen.iddosen) 
		as t4 left join dosen on t4.idanggota4=dosen.iddosen where idproposal="'.$idproposal.'" limit 1');
		$thnsekarang=idate('Y');
		return View::make('user.detailproposal',$data)->with('thnsekarang', $thnsekarang);
	}
	public function detailproposalpkm($idproposalpkm){
		$data['proposalpkm'] = DB::select('select idproposalpkm, judul, sumberdana, tahun, statusfile, namafileproposal, read_more, abstrak, proposalidprodi, programstudi, pidskimpenelitian, skim, proposalidbidilmu, bidangilmu, proposalidfakultas, fakultas, proposalidketua, ketua, pidanggota1, anggota1, pidanggota2, anggota2, pidanggota3, anggota3, pidanggota4, dosen.nama as anggota4, anggotalain from 
			(select idproposalpkm, judul, sumberdana, tahun, statusfile, namafileproposal, read_more, abstrak, proposalidprodi, programstudi, pidskimpenelitian, skim, proposalidbidilmu, bidangilmu, proposalidfakultas, fakultas, proposalidketua, ketua, pidanggota1, anggota1, pidanggota2, anggota2, pidanggota3, dosen.nama as anggota3, pidanggota4, idanggota4, anggotalain from 
				(select idproposalpkm, judul, sumberdana, tahun, statusfile, namafileproposal, read_more, abstrak, proposalidprodi, programstudi, pidskimpenelitian, skim, proposalidbidilmu, bidangilmu, proposalidfakultas, fakultas, proposalidketua, ketua, pidanggota1, anggota1, pidanggota2, dosen.nama as anggota2, pidanggota3, idanggota3, pidanggota4, idanggota4, anggotalain from 
					(select idproposalpkm, judul, sumberdana, tahun, statusfile, namafileproposal, read_more, abstrak, proposalidprodi, programstudi, pidskimpenelitian, skim, proposalidbidilmu, bidangilmu, proposalidfakultas, fakultas, proposalidketua, ketua, pidanggota1, dosen.nama as anggota1, pidanggota2, idanggota2, pidanggota3, idanggota3, pidanggota4, idanggota4, anggotalain from 
						(select idproposalpkm, judul, sumberdana, tahun, statusfile, namafileproposal, read_more, abstrak, proposalidprodi, programstudi, pidskimpenelitian, skim, proposalidbidilmu, bidangilmu, proposalidfakultas, fakultas, proposalidketua, dosen.nama as ketua, pidanggota1, idanggota1, pidanggota2, idanggota2, pidanggota3, idanggota3, pidanggota4, idanggota4, anggotalain from 
							(select idproposalpkm, judul, sumberdana, tahun, statusfile, namafileproposal, read_more, abstrak, proposalidprodi, programstudi, pidskimpenelitian, skimpenelitian.skim as skim, proposalidbidilmu, bidangilmu, proposalidfakultas, fakultas, proposalidketua, idketua, pidanggota1, idanggota1, pidanggota2, idanggota2, pidanggota3, idanggota3, pidanggota4, idanggota4, anggotalain from
								(select idproposalpkm, judul, sumberdana, tahun, statusfile, namafileproposal, read_more, abstrak, proposalpkm.idprodi as proposalidprodi, programstudi.programstudi as programstudi, proposalpkm.idskimpenelitian as pidskimpenelitian, idskimpenelitian, proposalpkm.idbidilmu as proposalidbidilmu, bidangilmu.bidangilmu as bidangilmu, proposalpkm.idfakultas as proposalidfakultas, fakultas.fakultas as fakultas, proposalpkm.idketua as proposalidketua, idketua, proposalpkm.idanggota1 as pidanggota1, idanggota1, proposalpkm.idanggota2 as pidanggota2, idanggota2, proposalpkm.idanggota3 as pidanggota3, idanggota3, proposalpkm.idanggota4 as pidanggota4, idanggota4, anggotalain from proposalpkm left join programstudi on proposalpkm.idprodi=programstudi.idprodi left join bidangilmu on proposalpkm.idbidilmu=bidangilmu.idbidilmu left join fakultas on proposalpkm.idfakultas=fakultas.idfakultas)
							as tprogramstudi left join skimpenelitian on tprogramstudi.idskimpenelitian=skimpenelitian.idskimpenelitian)
						as tketua left join dosen on tketua.idketua=dosen.iddosen) 
					as t1 left join dosen on t1.idanggota1=dosen.iddosen) 
				as t2 left join dosen on t2.idanggota2=dosen.iddosen) 
			as t3 left join dosen on t3.idanggota3=dosen.iddosen) 
		as t4 left join dosen on t4.idanggota4=dosen.iddosen where idproposalpkm="'.$idproposalpkm.'" limit 1');
		$thnsekarang=idate('Y');
		return View::make('user.detailproposalpkm',$data)->with('thnsekarang', $thnsekarang);
	}
	public function detailproposaldosen($idproposal){
		$data['proposal'] = DB::select('select idproposal, judul, sumberdana, tahun, statusfile, namafileproposal, read_more, abstrak, proposalidprodi, programstudi, pidskimpenelitian, skim, proposalidbidilmu, bidangilmu, proposalidfakultas, fakultas, proposalidketua, ketua, pidanggota1, anggota1, pidanggota2, anggota2, pidanggota3, anggota3, pidanggota4, dosen.nama as anggota4, anggotalain from 
			(select idproposal, judul, sumberdana, tahun, statusfile, namafileproposal, read_more, abstrak, proposalidprodi, programstudi, pidskimpenelitian, skim, proposalidbidilmu, bidangilmu, proposalidfakultas, fakultas, proposalidketua, ketua, pidanggota1, anggota1, pidanggota2, anggota2, pidanggota3, dosen.nama as anggota3, pidanggota4, idanggota4, anggotalain from 
				(select idproposal, judul, sumberdana, tahun, statusfile, namafileproposal, read_more, abstrak, proposalidprodi, programstudi, pidskimpenelitian, skim, proposalidbidilmu, bidangilmu, proposalidfakultas, fakultas, proposalidketua, ketua, pidanggota1, anggota1, pidanggota2, dosen.nama as anggota2, pidanggota3, idanggota3, pidanggota4, idanggota4, anggotalain from 
					(select idproposal, judul, sumberdana, tahun, statusfile, namafileproposal, read_more, abstrak, proposalidprodi, programstudi, pidskimpenelitian, skim, proposalidbidilmu, bidangilmu, proposalidfakultas, fakultas, proposalidketua, ketua, pidanggota1, dosen.nama as anggota1, pidanggota2, idanggota2, pidanggota3, idanggota3, pidanggota4, idanggota4, anggotalain from 
						(select idproposal, judul, sumberdana, tahun, statusfile, namafileproposal, read_more, abstrak, proposalidprodi, programstudi, pidskimpenelitian, skim, proposalidbidilmu, bidangilmu, proposalidfakultas, fakultas, proposalidketua, dosen.nama as ketua, pidanggota1, idanggota1, pidanggota2, idanggota2, pidanggota3, idanggota3, pidanggota4, idanggota4, anggotalain from 
							(select idproposal, judul, sumberdana, tahun, statusfile, namafileproposal, read_more, abstrak, proposalidprodi, programstudi, pidskimpenelitian, skimpenelitian.skim as skim, proposalidbidilmu, bidangilmu, proposalidfakultas, fakultas, proposalidketua, idketua, pidanggota1, idanggota1, pidanggota2, idanggota2, pidanggota3, idanggota3, pidanggota4, idanggota4, anggotalain from
								(select idproposal, judul, sumberdana, tahun, statusfile, namafileproposal, read_more, abstrak, proposal.idprodi as proposalidprodi, programstudi.programstudi as programstudi, proposal.idskimpenelitian as pidskimpenelitian, idskimpenelitian, proposal.idbidilmu as proposalidbidilmu, bidangilmu.bidangilmu as bidangilmu, proposal.idfakultas as proposalidfakultas, fakultas.fakultas as fakultas, proposal.idketua as proposalidketua, idketua, proposal.idanggota1 as pidanggota1, idanggota1, proposal.idanggota2 as pidanggota2, idanggota2, proposal.idanggota3 as pidanggota3, idanggota3, proposal.idanggota4 as pidanggota4, idanggota4, anggotalain from proposal left join programstudi on proposal.idprodi=programstudi.idprodi left join bidangilmu on proposal.idbidilmu=bidangilmu.idbidilmu left join fakultas on proposal.idfakultas=fakultas.idfakultas)
							as tprogramstudi left join skimpenelitian on tprogramstudi.idskimpenelitian=skimpenelitian.idskimpenelitian)
						as tketua left join dosen on tketua.idketua=dosen.iddosen) 
					as t1 left join dosen on t1.idanggota1=dosen.iddosen) 
				as t2 left join dosen on t2.idanggota2=dosen.iddosen) 
			as t3 left join dosen on t3.idanggota3=dosen.iddosen) 
		as t4 left join dosen on t4.idanggota4=dosen.iddosen where idproposal="'.$idproposal.'" limit 1');
		$thnsekarang=idate('Y');
		$data['dosen']=DB::table('dosen')
		->where('username','=',Session::get('username'))
		->where('iddosen','=',Session::get('iddosen'))
		->get();
		return View::make('lecturer.detailproposal',$data)->with('thnsekarang', $thnsekarang);
	}
	public function laporankemajuan(){
		//queries the skimpenelitian db table, orders by idskimpenelitian and lists all data in skimpenelitian table
		$data['skimpenelitian'] = DB::table('skimpenelitian')
		->select('skimpenelitian.*')
		->get();
		//queries the bidangilmu db table, orders by idbidilmu and lists all data in bidangilmu table
		$data['bidangilmu'] = DB::table('bidangilmu')
		->select('bidangilmu.*')
		->get();
		//queries the fakultas db table, orders by idfakultas and lists all data in fakultas table
		$data['fakultas'] = DB::table('fakultas')
		->select('fakultas.*')
		->get();
		$thnsekarang=idate('Y');
		$data['laporankemajuan'] = DB::table('laporankemajuan')->distinct()->select('laporankemajuan.tahun')->orderBy('tahun', 'asc')->get();
		return View::make('user.lkemajuan', $data)->with('thnsekarang', $thnsekarang);
	}
	public function laporankemajuanpkm(){
		//queries the skimpenelitian db table, orders by idskimpenelitian and lists all data in skimpenelitian table
		$data['skimpenelitian'] = DB::table('skimpenelitian')
		->select('skimpenelitian.*')
		->get();
		//queries the bidangilmu db table, orders by idbidilmu and lists all data in bidangilmu table
		$data['bidangilmu'] = DB::table('bidangilmu')
		->select('bidangilmu.*')
		->get();
		//queries the fakultas db table, orders by idfakultas and lists all data in fakultas table
		$data['fakultas'] = DB::table('fakultas')
		->select('fakultas.*')
		->get();
		$thnsekarang=idate('Y');
		$data['laporankemajuanpkm'] = DB::table('laporankemajuanpkm')->distinct()->select('laporankemajuanpkm.tahun')->orderBy('tahun', 'asc')->get();
		return View::make('user.lkemajuanpkm', $data)->with('thnsekarang', $thnsekarang);
	}
	public function proses_carilkemajuan(){
		$idskimpenelitian=Input::get('idskimpenelitian');
		$idbidilmu=Input::get('idbidilmu');
		$idfakultas=Input::get('idfakultas');
		$tahun=Input::get('tahun');
		$tahun2=Input::get('tahun2');
		$kunci=Input::get('kunci');
		$laporankemajuan=DB::table('laporankemajuan')
		->join('skimpenelitian', 'laporankemajuan.idskimpenelitian', '=', 'skimpenelitian.idskimpenelitian')
		->join('bidangilmu', 'laporankemajuan.idbidilmu', '=', 'bidangilmu.idbidilmu')
		->join('fakultas', 'laporankemajuan.idfakultas', '=', 'fakultas.idfakultas')
		->whereBetween('tahun', array($tahun, $tahun2));
		if ($idskimpenelitian != ''){
			$laporankemajuan->where('laporankemajuan.idskimpenelitian','=',$idskimpenelitian);
		}
		if ($idbidilmu != ''){
			$laporankemajuan->where('laporankemajuan.idbidilmu','=',$idbidilmu);
		}
		if ($idfakultas != ''){
			$laporankemajuan->where('laporankemajuan.idfakultas','=',$idfakultas);
		}
		if ($kunci != ''){
			$laporankemajuan->where('laporankemajuan.judul','LIKE','%'.$kunci.'%')->orWhere('laporankemajuan.sumberdana','LIKE','%'.$kunci.'%');
		}
		$results=$laporankemajuan->get();
		$thnsekarang=idate('Y');
		return View::make('user.carilkemajuan')->with('laporankemajuan', $results)->with('thnsekarang', $thnsekarang);
	}
	public function proses_clkemajuanpkm(){
		$idskimpenelitian=Input::get('idskimpenelitian');
		$idbidilmu=Input::get('idbidilmu');
		$idfakultas=Input::get('idfakultas');
		$tahun=Input::get('tahun');
		$tahun2=Input::get('tahun2');
		$kunci=Input::get('kunci');
		$laporankemajuanpkm=DB::table('laporankemajuanpkm')
		->join('skimpenelitian', 'laporankemajuanpkm.idskimpenelitian', '=', 'skimpenelitian.idskimpenelitian')
		->join('bidangilmu', 'laporankemajuanpkm.idbidilmu', '=', 'bidangilmu.idbidilmu')
		->join('fakultas', 'laporankemajuanpkm.idfakultas', '=', 'fakultas.idfakultas')
		->whereBetween('tahun', array($tahun, $tahun2));
		if ($idskimpenelitian != ''){
			$laporankemajuanpkm->where('laporankemajuanpkm.idskimpenelitian','=',$idskimpenelitian);
		}
		if ($idbidilmu != ''){
			$laporankemajuanpkm->where('laporankemajuanpkm.idbidilmu','=',$idbidilmu);
		}
		if ($idfakultas != ''){
			$laporankemajuanpkm->where('laporankemajuanpkm.idfakultas','=',$idfakultas);
		}
		if ($kunci != ''){
			$laporankemajuanpkm->where('laporankemajuanpkm.judul','LIKE','%'.$kunci.'%')->orWhere('laporankemajuanpkm.sumberdana','LIKE','%'.$kunci.'%');
		}
		$results=$laporankemajuanpkm->get();
		$thnsekarang=idate('Y');
		return View::make('user.carilkemajuanpkm')->with('laporankemajuanpkm', $results)->with('thnsekarang', $thnsekarang);
	}
	public function lihatlaporankemajuan($idlapkemajuan){
		$data['laporankemajuan'] = DB::select('select idlapkemajuan, judul, sumberdana, tahun, statusfile, namafilekemajuan, read_more, abstrak, kemajuanidprodi, programstudi, kidskimpenelitian, skim, kemajuanidbidilmu, bidangilmu, kemajuanidfakultas, fakultas, kemajuanidketua, ketua, kidanggota1, anggota1, kidanggota2, anggota2, kidanggota3, anggota3, kidanggota4, dosen.nama as anggota4, anggotalain from 
			(select idlapkemajuan, judul, sumberdana, tahun, statusfile, namafilekemajuan, read_more, abstrak, kemajuanidprodi, programstudi, kidskimpenelitian, skim, kemajuanidbidilmu, bidangilmu, kemajuanidfakultas, fakultas, kemajuanidketua, ketua, kidanggota1, anggota1, kidanggota2, anggota2, kidanggota3, dosen.nama as anggota3, kidanggota4, idanggota4, anggotalain from 
				(select idlapkemajuan, judul, sumberdana, tahun, statusfile, namafilekemajuan, read_more, abstrak, kemajuanidprodi, programstudi, kidskimpenelitian, skim, kemajuanidbidilmu, bidangilmu, kemajuanidfakultas, fakultas, kemajuanidketua, ketua, kidanggota1, anggota1, kidanggota2, dosen.nama as anggota2, kidanggota3, idanggota3, kidanggota4, idanggota4, anggotalain from 
					(select idlapkemajuan, judul, sumberdana, tahun, statusfile, namafilekemajuan, read_more, abstrak, kemajuanidprodi, programstudi, kidskimpenelitian, skim, kemajuanidbidilmu, bidangilmu, kemajuanidfakultas, fakultas, kemajuanidketua, ketua, kidanggota1, dosen.nama as anggota1, kidanggota2, idanggota2, kidanggota3, idanggota3, kidanggota4, idanggota4, anggotalain from 
						(select idlapkemajuan, judul, sumberdana, tahun, statusfile, namafilekemajuan, read_more, abstrak, kemajuanidprodi, programstudi, kidskimpenelitian, skim, kemajuanidbidilmu, bidangilmu, kemajuanidfakultas, fakultas, kemajuanidketua, dosen.nama as ketua, kidanggota1, idanggota1, kidanggota2, idanggota2, kidanggota3, idanggota3, kidanggota4, idanggota4, anggotalain from 
							(select idlapkemajuan, judul, sumberdana, tahun, statusfile, namafilekemajuan, read_more, abstrak, kemajuanidprodi, programstudi, kidskimpenelitian, skimpenelitian.skim as skim, kemajuanidbidilmu, bidangilmu, kemajuanidfakultas, fakultas, kemajuanidketua, idketua, kidanggota1, idanggota1, kidanggota2, idanggota2, kidanggota3, idanggota3, kidanggota4, idanggota4, anggotalain from
								(select idlapkemajuan, judul, sumberdana, tahun, statusfile, namafilekemajuan, read_more, abstrak, laporankemajuan.idprodi as kemajuanidprodi, programstudi.programstudi as programstudi, laporankemajuan.idskimpenelitian as kidskimpenelitian, idskimpenelitian, laporankemajuan.idbidilmu as kemajuanidbidilmu, bidangilmu.bidangilmu as bidangilmu, laporankemajuan.idfakultas as kemajuanidfakultas, fakultas.fakultas as fakultas, laporankemajuan.idketua as kemajuanidketua, idketua, laporankemajuan.idanggota1 as kidanggota1, idanggota1, laporankemajuan.idanggota2 as kidanggota2, idanggota2, laporankemajuan.idanggota3 as kidanggota3, idanggota3, laporankemajuan.idanggota4 as kidanggota4, idanggota4, anggotalain from laporankemajuan left join programstudi on laporankemajuan.idprodi=programstudi.idprodi left join bidangilmu on laporankemajuan.idbidilmu=bidangilmu.idbidilmu left join fakultas on laporankemajuan.idfakultas=fakultas.idfakultas)
							as tprogramstudi left join skimpenelitian on tprogramstudi.idskimpenelitian=skimpenelitian.idskimpenelitian)
						as tketua left join dosen on tketua.idketua=dosen.iddosen) 
					as t1 left join dosen on t1.idanggota1=dosen.iddosen) 
				as t2 left join dosen on t2.idanggota2=dosen.iddosen) 
			as t3 left join dosen on t3.idanggota3=dosen.iddosen) 
		as t4 left join dosen on t4.idanggota4=dosen.iddosen where idlapkemajuan="'.$idlapkemajuan.'" limit 1');
		$thnsekarang=idate('Y');
		return View::make('user.detaillkemajuan',$data)->with('thnsekarang', $thnsekarang);
	}
	public function llaporankemajuanpkm($idlkemajuanpkm){
		$data['laporankemajuanpkm'] = DB::select('select idlkemajuanpkm, judul, sumberdana, tahun, statusfile, namafilekemajuan, read_more, abstrak, kemajuanidprodi, programstudi, kidskimpenelitian, skim, kemajuanidbidilmu, bidangilmu, kemajuanidfakultas, fakultas, kemajuanidketua, ketua, kidanggota1, anggota1, kidanggota2, anggota2, kidanggota3, anggota3, kidanggota4, dosen.nama as anggota4, anggotalain from 
			(select idlkemajuanpkm, judul, sumberdana, tahun, statusfile, namafilekemajuan, read_more, abstrak, kemajuanidprodi, programstudi, kidskimpenelitian, skim, kemajuanidbidilmu, bidangilmu, kemajuanidfakultas, fakultas, kemajuanidketua, ketua, kidanggota1, anggota1, kidanggota2, anggota2, kidanggota3, dosen.nama as anggota3, kidanggota4, idanggota4, anggotalain from 
				(select idlkemajuanpkm, judul, sumberdana, tahun, statusfile, namafilekemajuan, read_more, abstrak, kemajuanidprodi, programstudi, kidskimpenelitian, skim, kemajuanidbidilmu, bidangilmu, kemajuanidfakultas, fakultas, kemajuanidketua, ketua, kidanggota1, anggota1, kidanggota2, dosen.nama as anggota2, kidanggota3, idanggota3, kidanggota4, idanggota4, anggotalain from 
					(select idlkemajuanpkm, judul, sumberdana, tahun, statusfile, namafilekemajuan, read_more, abstrak, kemajuanidprodi, programstudi, kidskimpenelitian, skim, kemajuanidbidilmu, bidangilmu, kemajuanidfakultas, fakultas, kemajuanidketua, ketua, kidanggota1, dosen.nama as anggota1, kidanggota2, idanggota2, kidanggota3, idanggota3, kidanggota4, idanggota4, anggotalain from 
						(select idlkemajuanpkm, judul, sumberdana, tahun, statusfile, namafilekemajuan, read_more, abstrak, kemajuanidprodi, programstudi, kidskimpenelitian, skim, kemajuanidbidilmu, bidangilmu, kemajuanidfakultas, fakultas, kemajuanidketua, dosen.nama as ketua, kidanggota1, idanggota1, kidanggota2, idanggota2, kidanggota3, idanggota3, kidanggota4, idanggota4, anggotalain from 
							(select idlkemajuanpkm, judul, sumberdana, tahun, statusfile, namafilekemajuan, read_more, abstrak, kemajuanidprodi, programstudi, kidskimpenelitian, skimpenelitian.skim as skim, kemajuanidbidilmu, bidangilmu, kemajuanidfakultas, fakultas, kemajuanidketua, idketua, kidanggota1, idanggota1, kidanggota2, idanggota2, kidanggota3, idanggota3, kidanggota4, idanggota4, anggotalain from
								(select idlkemajuanpkm, judul, sumberdana, tahun, statusfile, namafilekemajuan, read_more, abstrak, laporankemajuanpkm.idprodi as kemajuanidprodi, programstudi.programstudi as programstudi, laporankemajuanpkm.idskimpenelitian as kidskimpenelitian, idskimpenelitian, laporankemajuanpkm.idbidilmu as kemajuanidbidilmu, bidangilmu.bidangilmu as bidangilmu, laporankemajuanpkm.idfakultas as kemajuanidfakultas, fakultas.fakultas as fakultas, laporankemajuanpkm.idketua as kemajuanidketua, idketua, laporankemajuanpkm.idanggota1 as kidanggota1, idanggota1, laporankemajuanpkm.idanggota2 as kidanggota2, idanggota2, laporankemajuanpkm.idanggota3 as kidanggota3, idanggota3, laporankemajuanpkm.idanggota4 as kidanggota4, idanggota4, anggotalain from laporankemajuanpkm left join programstudi on laporankemajuanpkm.idprodi=programstudi.idprodi left join bidangilmu on laporankemajuanpkm.idbidilmu=bidangilmu.idbidilmu left join fakultas on laporankemajuanpkm.idfakultas=fakultas.idfakultas)
							as tprogramstudi left join skimpenelitian on tprogramstudi.idskimpenelitian=skimpenelitian.idskimpenelitian)
						as tketua left join dosen on tketua.idketua=dosen.iddosen) 
					as t1 left join dosen on t1.idanggota1=dosen.iddosen) 
				as t2 left join dosen on t2.idanggota2=dosen.iddosen) 
			as t3 left join dosen on t3.idanggota3=dosen.iddosen) 
		as t4 left join dosen on t4.idanggota4=dosen.iddosen where idlkemajuanpkm="'.$idlkemajuanpkm.'" limit 1');
		$thnsekarang=idate('Y');
		return View::make('user.detaillkemajuanpkm',$data)->with('thnsekarang', $thnsekarang);
	}

	public function lihatlkdosen($idlapkemajuan){
		$data['laporankemajuan'] = DB::select('select idlapkemajuan, judul, sumberdana, tahun, statusfile, namafilekemajuan, read_more, abstrak, kemajuanidprodi, programstudi, kidskimpenelitian, skim, kemajuanidbidilmu, bidangilmu, kemajuanidfakultas, fakultas, kemajuanidketua, ketua, kidanggota1, anggota1, kidanggota2, anggota2, kidanggota3, anggota3, kidanggota4, dosen.nama as anggota4, anggotalain from 
			(select idlapkemajuan, judul, sumberdana, tahun, statusfile, namafilekemajuan, read_more, abstrak, kemajuanidprodi, programstudi, kidskimpenelitian, skim, kemajuanidbidilmu, bidangilmu, kemajuanidfakultas, fakultas, kemajuanidketua, ketua, kidanggota1, anggota1, kidanggota2, anggota2, kidanggota3, dosen.nama as anggota3, kidanggota4, idanggota4, anggotalain from 
				(select idlapkemajuan, judul, sumberdana, tahun, statusfile, namafilekemajuan, read_more, abstrak, kemajuanidprodi, programstudi, kidskimpenelitian, skim, kemajuanidbidilmu, bidangilmu, kemajuanidfakultas, fakultas, kemajuanidketua, ketua, kidanggota1, anggota1, kidanggota2, dosen.nama as anggota2, kidanggota3, idanggota3, kidanggota4, idanggota4, anggotalain from 
					(select idlapkemajuan, judul, sumberdana, tahun, statusfile, namafilekemajuan, read_more, abstrak, kemajuanidprodi, programstudi, kidskimpenelitian, skim, kemajuanidbidilmu, bidangilmu, kemajuanidfakultas, fakultas, kemajuanidketua, ketua, kidanggota1, dosen.nama as anggota1, kidanggota2, idanggota2, kidanggota3, idanggota3, kidanggota4, idanggota4, anggotalain from 
						(select idlapkemajuan, judul, sumberdana, tahun, statusfile, namafilekemajuan, read_more, abstrak, kemajuanidprodi, programstudi, kidskimpenelitian, skim, kemajuanidbidilmu, bidangilmu, kemajuanidfakultas, fakultas, kemajuanidketua, dosen.nama as ketua, kidanggota1, idanggota1, kidanggota2, idanggota2, kidanggota3, idanggota3, kidanggota4, idanggota4, anggotalain from 
							(select idlapkemajuan, judul, sumberdana, tahun, statusfile, namafilekemajuan, read_more, abstrak, kemajuanidprodi, programstudi, kidskimpenelitian, skimpenelitian.skim as skim, kemajuanidbidilmu, bidangilmu, kemajuanidfakultas, fakultas, kemajuanidketua, idketua, kidanggota1, idanggota1, kidanggota2, idanggota2, kidanggota3, idanggota3, kidanggota4, idanggota4, anggotalain from
								(select idlapkemajuan, judul, sumberdana, tahun, statusfile, namafilekemajuan, read_more, abstrak, laporankemajuan.idprodi as kemajuanidprodi, programstudi.programstudi as programstudi, laporankemajuan.idskimpenelitian as kidskimpenelitian, idskimpenelitian, laporankemajuan.idbidilmu as kemajuanidbidilmu, bidangilmu.bidangilmu as bidangilmu, laporankemajuan.idfakultas as kemajuanidfakultas, fakultas.fakultas as fakultas, laporankemajuan.idketua as kemajuanidketua, idketua, laporankemajuan.idanggota1 as kidanggota1, idanggota1, laporankemajuan.idanggota2 as kidanggota2, idanggota2, laporankemajuan.idanggota3 as kidanggota3, idanggota3, laporankemajuan.idanggota4 as kidanggota4, idanggota4, anggotalain from laporankemajuan left join programstudi on laporankemajuan.idprodi=programstudi.idprodi left join bidangilmu on laporankemajuan.idbidilmu=bidangilmu.idbidilmu left join fakultas on laporankemajuan.idfakultas=fakultas.idfakultas)
							as tprogramstudi left join skimpenelitian on tprogramstudi.idskimpenelitian=skimpenelitian.idskimpenelitian)
						as tketua left join dosen on tketua.idketua=dosen.iddosen) 
					as t1 left join dosen on t1.idanggota1=dosen.iddosen) 
				as t2 left join dosen on t2.idanggota2=dosen.iddosen) 
			as t3 left join dosen on t3.idanggota3=dosen.iddosen) 
		as t4 left join dosen on t4.idanggota4=dosen.iddosen where idlapkemajuan="'.$idlapkemajuan.'" limit 1');
		$thnsekarang=idate('Y');
		$data['dosen']=DB::table('dosen')
		->where('username','=',Session::get('username'))
		->where('iddosen','=',Session::get('iddosen'))
		->get();
		return View::make('lecturer.detaillkemajuan',$data)->with('thnsekarang', $thnsekarang);
	}

	public function laporanakhir(){
		//queries the skimpenelitian db table, orders by idskimpenelitian and lists all data in skimpenelitian table
		$data['skimpenelitian'] = DB::table('skimpenelitian')
		->select('skimpenelitian.*')
		->get();
		//queries the bidangilmu db table, orders by idbidilmu and lists all data in bidangilmu table
		$data['bidangilmu'] = DB::table('bidangilmu')
		->select('bidangilmu.*')
		->get();
		//queries the fakultas db table, orders by idfakultas and lists all data in fakultas table
		$data['fakultas'] = DB::table('fakultas')
		->select('fakultas.*')
		->get();
		$thnsekarang=idate('Y');
		$data['laporanakhir'] = DB::table('laporanakhir')->distinct()->select('laporanakhir.tahun')->orderBy('tahun', 'asc')->get();
		return View::make('user.lakhir', $data)->with('thnsekarang', $thnsekarang);
	}
	public function laporanakhirpkm(){
		//queries the skimpenelitian db table, orders by idskimpenelitian and lists all data in skimpenelitian table
		$data['skimpenelitian'] = DB::table('skimpenelitian')
		->select('skimpenelitian.*')
		->get();
		//queries the bidangilmu db table, orders by idbidilmu and lists all data in bidangilmu table
		$data['bidangilmu'] = DB::table('bidangilmu')
		->select('bidangilmu.*')
		->get();
		//queries the fakultas db table, orders by idfakultas and lists all data in fakultas table
		$data['fakultas'] = DB::table('fakultas')
		->select('fakultas.*')
		->get();
		$thnsekarang=idate('Y');
		$data['laporanakhirpkm'] = DB::table('laporanakhirpkm')->distinct()->select('laporanakhirpkm.tahun')->orderBy('tahun', 'asc')->get();
		return View::make('user.lakhirpkm', $data)->with('thnsekarang', $thnsekarang);
	}
	public function proses_carilakhir(){
		$idskimpenelitian=Input::get('idskimpenelitian');
		$idbidilmu=Input::get('idbidilmu');
		$idfakultas=Input::get('idfakultas');
		$tahun=Input::get('tahun');
		$tahun2=Input::get('tahun2');
		$kunci=Input::get('kunci');
		$laporanakhir=DB::table('laporanakhir')
		->join('skimpenelitian', 'laporanakhir.idskimpenelitian', '=', 'skimpenelitian.idskimpenelitian')
		->join('bidangilmu', 'laporanakhir.idbidilmu', '=', 'bidangilmu.idbidilmu')
		->join('fakultas', 'laporanakhir.idfakultas', '=', 'fakultas.idfakultas')
		->whereBetween('tahun', array($tahun, $tahun2));
		if ($idskimpenelitian != ''){
			$laporanakhir->where('laporanakhir.idskimpenelitian','=',$idskimpenelitian);
		}
		if ($idbidilmu != ''){
			$laporanakhir->where('laporanakhir.idbidilmu','=',$idbidilmu);
		}
		if ($idfakultas != ''){
			$laporanakhir->where('laporanakhir.idfakultas','=',$idfakultas);
		}
		if ($kunci != ''){
			$laporanakhir->where('laporanakhir.judul','LIKE','%'.$kunci.'%')->orWhere('laporanakhir.sumberdana','LIKE','%'.$kunci.'%');
		}
		$results=$laporanakhir->get();
		$thnsekarang=idate('Y');
		return View::make('user.carilakhir')->with('laporanakhir', $results)->with('thnsekarang', $thnsekarang);
	}
	public function proses_clakhirpkm(){
		$idskimpenelitian=Input::get('idskimpenelitian');
		$idbidilmu=Input::get('idbidilmu');
		$idfakultas=Input::get('idfakultas');
		$tahun=Input::get('tahun');
		$tahun2=Input::get('tahun2');
		$kunci=Input::get('kunci');
		$laporanakhirpkm=DB::table('laporanakhirpkm')
		->join('skimpenelitian', 'laporanakhirpkm.idskimpenelitian', '=', 'skimpenelitian.idskimpenelitian')
		->join('bidangilmu', 'laporanakhirpkm.idbidilmu', '=', 'bidangilmu.idbidilmu')
		->join('fakultas', 'laporanakhirpkm.idfakultas', '=', 'fakultas.idfakultas')
		->whereBetween('tahun', array($tahun, $tahun2));
		if ($idskimpenelitian != ''){
			$laporanakhirpkm->where('laporanakhirpkm.idskimpenelitian','=',$idskimpenelitian);
		}
		if ($idbidilmu != ''){
			$laporanakhirpkm->where('laporanakhirpkm.idbidilmu','=',$idbidilmu);
		}
		if ($idfakultas != ''){
			$laporanakhirpkm->where('laporanakhirpkm.idfakultas','=',$idfakultas);
		}
		if ($kunci != ''){
			$laporanakhirpkm->where('laporanakhirpkm.judul','LIKE','%'.$kunci.'%')->orWhere('laporanakhirpkm.sumberdana','LIKE','%'.$kunci.'%');
		}
		$results=$laporanakhirpkm->get();
		$thnsekarang=idate('Y');
		return View::make('user.carilakhirpkm')->with('laporanakhirpkm', $results)->with('thnsekarang', $thnsekarang);
	}
	public function lihatlaporanakhir($idlapakhir){
		$data['laporanakhir'] = DB::select('select idlapakhir, judul, sumberdana, tahun, statusfile, namafileakhir, read_more, abstrak, akhiridprodi, programstudi, aidskimpenelitian, skim, akhiridbidilmu, bidangilmu, akhiridfakultas, fakultas, akhiridketua, ketua, aidanggota1, anggota1, aidanggota2, anggota2, aidanggota3, anggota3, aidanggota4, dosen.nama as anggota4, anggotalain from 
			(select idlapakhir, judul, sumberdana, tahun, statusfile, namafileakhir, read_more, abstrak, akhiridprodi, programstudi, aidskimpenelitian, skim, akhiridbidilmu, bidangilmu, akhiridfakultas, fakultas, akhiridketua, ketua, aidanggota1, anggota1, aidanggota2, anggota2, aidanggota3, dosen.nama as anggota3, aidanggota4, idanggota4, anggotalain from 
				(select idlapakhir, judul, sumberdana, tahun, statusfile, namafileakhir, read_more, abstrak, akhiridprodi, programstudi, aidskimpenelitian, skim, akhiridbidilmu, bidangilmu, akhiridfakultas, fakultas, akhiridketua, ketua, aidanggota1, anggota1, aidanggota2, dosen.nama as anggota2, aidanggota3, idanggota3, aidanggota4, idanggota4, anggotalain from 
					(select idlapakhir, judul, sumberdana, tahun, statusfile, namafileakhir, read_more, abstrak, akhiridprodi, programstudi, aidskimpenelitian, skim, akhiridbidilmu, bidangilmu, akhiridfakultas, fakultas, akhiridketua, ketua, aidanggota1, dosen.nama as anggota1, aidanggota2, idanggota2, aidanggota3, idanggota3, aidanggota4, idanggota4, anggotalain from 
						(select idlapakhir, judul, sumberdana, tahun, statusfile, namafileakhir, read_more, abstrak, akhiridprodi, programstudi, aidskimpenelitian, skim, akhiridbidilmu, bidangilmu, akhiridfakultas, fakultas, akhiridketua, dosen.nama as ketua, aidanggota1, idanggota1, aidanggota2, idanggota2, aidanggota3, idanggota3, aidanggota4, idanggota4, anggotalain from 
							(select idlapakhir, judul, sumberdana, tahun, statusfile, namafileakhir, read_more, abstrak, akhiridprodi, programstudi, aidskimpenelitian, skimpenelitian.skim as skim, akhiridbidilmu, bidangilmu, akhiridfakultas, fakultas, akhiridketua, idketua, aidanggota1, idanggota1, aidanggota2, idanggota2, aidanggota3, idanggota3, aidanggota4, idanggota4, anggotalain from
								(select idlapakhir, judul, sumberdana, tahun, statusfile, namafileakhir, read_more, abstrak, laporanakhir.idprodi as akhiridprodi, programstudi.programstudi as programstudi, laporanakhir.idskimpenelitian as aidskimpenelitian, idskimpenelitian, laporanakhir.idbidilmu as akhiridbidilmu, bidangilmu.bidangilmu as bidangilmu, laporanakhir.idfakultas as akhiridfakultas, fakultas.fakultas as fakultas, laporanakhir.idketua as akhiridketua, idketua, laporanakhir.idanggota1 as aidanggota1, idanggota1, laporanakhir.idanggota2 as aidanggota2, idanggota2, laporanakhir.idanggota3 as aidanggota3, idanggota3, laporanakhir.idanggota4 as aidanggota4, idanggota4, anggotalain from laporanakhir left join programstudi on laporanakhir.idprodi=programstudi.idprodi left join bidangilmu on laporanakhir.idbidilmu=bidangilmu.idbidilmu left join fakultas on laporanakhir.idfakultas=fakultas.idfakultas)
							as tprogramstudi left join skimpenelitian on tprogramstudi.idskimpenelitian=skimpenelitian.idskimpenelitian)
						as tketua left join dosen on tketua.idketua=dosen.iddosen) 
					as t1 left join dosen on t1.idanggota1=dosen.iddosen) 
				as t2 left join dosen on t2.idanggota2=dosen.iddosen) 
			as t3 left join dosen on t3.idanggota3=dosen.iddosen) 
		as t4 left join dosen on t4.idanggota4=dosen.iddosen where idlapakhir="'.$idlapakhir.'" limit 1');
		$thnsekarang=idate('Y');
		return View::make('user.detaillakhir',$data)->with('thnsekarang', $thnsekarang);
	}
	public function llaporanakhirpkm($idlakhir_pkm){
		$data['laporanakhirpkm'] = DB::select('select idlakhir_pkm, judul, sumberdana, tahun, statusfile, namafileakhir, read_more, abstrak, akhiridprodi, programstudi, aidskimpenelitian, skim, akhiridbidilmu, bidangilmu, akhiridfakultas, fakultas, akhiridketua, ketua, aidanggota1, anggota1, aidanggota2, anggota2, aidanggota3, anggota3, aidanggota4, dosen.nama as anggota4, anggotalain from 
			(select idlakhir_pkm, judul, sumberdana, tahun, statusfile, namafileakhir, read_more, abstrak, akhiridprodi, programstudi, aidskimpenelitian, skim, akhiridbidilmu, bidangilmu, akhiridfakultas, fakultas, akhiridketua, ketua, aidanggota1, anggota1, aidanggota2, anggota2, aidanggota3, dosen.nama as anggota3, aidanggota4, idanggota4, anggotalain from 
				(select idlakhir_pkm, judul, sumberdana, tahun, statusfile, namafileakhir, read_more, abstrak, akhiridprodi, programstudi, aidskimpenelitian, skim, akhiridbidilmu, bidangilmu, akhiridfakultas, fakultas, akhiridketua, ketua, aidanggota1, anggota1, aidanggota2, dosen.nama as anggota2, aidanggota3, idanggota3, aidanggota4, idanggota4, anggotalain from 
					(select idlakhir_pkm, judul, sumberdana, tahun, statusfile, namafileakhir, read_more, abstrak, akhiridprodi, programstudi, aidskimpenelitian, skim, akhiridbidilmu, bidangilmu, akhiridfakultas, fakultas, akhiridketua, ketua, aidanggota1, dosen.nama as anggota1, aidanggota2, idanggota2, aidanggota3, idanggota3, aidanggota4, idanggota4, anggotalain from 
						(select idlakhir_pkm, judul, sumberdana, tahun, statusfile, namafileakhir, read_more, abstrak, akhiridprodi, programstudi, aidskimpenelitian, skim, akhiridbidilmu, bidangilmu, akhiridfakultas, fakultas, akhiridketua, dosen.nama as ketua, aidanggota1, idanggota1, aidanggota2, idanggota2, aidanggota3, idanggota3, aidanggota4, idanggota4, anggotalain from 
							(select idlakhir_pkm, judul, sumberdana, tahun, statusfile, namafileakhir, read_more, abstrak, akhiridprodi, programstudi, aidskimpenelitian, skimpenelitian.skim as skim, akhiridbidilmu, bidangilmu, akhiridfakultas, fakultas, akhiridketua, idketua, aidanggota1, idanggota1, aidanggota2, idanggota2, aidanggota3, idanggota3, aidanggota4, idanggota4, anggotalain from
								(select idlakhir_pkm, judul, sumberdana, tahun, statusfile, namafileakhir, read_more, abstrak, laporanakhir.idprodi as akhiridprodi, programstudi.programstudi as programstudi, laporanakhirpkm.idskimpenelitian as aidskimpenelitian, idskimpenelitian, laporanakhirpkm.idbidilmu as akhiridbidilmu, bidangilmu.bidangilmu as bidangilmu, laporanakhirpkm.idfakultas as akhiridfakultas, fakultas.fakultas as fakultas, laporanakhirpkm.idketua as akhiridketua, idketua, laporanakhirpkm.idanggota1 as aidanggota1, idanggota1, laporanakhirpkm.idanggota2 as aidanggota2, idanggota2, laporanakhirpkm.idanggota3 as aidanggota3, idanggota3, laporanakhirpkm.idanggota4 as aidanggota4, idanggota4, anggotalain from laporanakhirpkm left join programstudi on laporanakhirpkm.idprodi=programstudi.idprodi left join bidangilmu on laporanakhirpkm.idbidilmu=bidangilmu.idbidilmu left join fakultas on laporanakhirpkm.idfakultas=fakultas.idfakultas)
							as tprogramstudi left join skimpenelitian on tprogramstudi.idskimpenelitian=skimpenelitian.idskimpenelitian)
						as tketua left join dosen on tketua.idketua=dosen.iddosen) 
					as t1 left join dosen on t1.idanggota1=dosen.iddosen) 
				as t2 left join dosen on t2.idanggota2=dosen.iddosen) 
			as t3 left join dosen on t3.idanggota3=dosen.iddosen) 
		as t4 left join dosen on t4.idanggota4=dosen.iddosen where idlakhir_pkm="'.$idlakhir_pkm.'" limit 1');
		$thnsekarang=idate('Y');
		return View::make('user.detaillakhirpkm',$data)->with('thnsekarang', $thnsekarang);
	}
	public function lihatladosen($idlapakhir){
		$data['laporanakhir'] = DB::select('select idlapakhir, judul, sumberdana, tahun, statusfile, namafileakhir, read_more, abstrak, akhiridprodi, programstudi, aidskimpenelitian, skim, akhiridbidilmu, bidangilmu, akhiridfakultas, fakultas, akhiridketua, ketua, aidanggota1, anggota1, aidanggota2, anggota2, aidanggota3, anggota3, aidanggota4, dosen.nama as anggota4, anggotalain from 
			(select idlapakhir, judul, sumberdana, tahun, statusfile, namafileakhir, read_more, abstrak, akhiridprodi, programstudi, aidskimpenelitian, skim, akhiridbidilmu, bidangilmu, akhiridfakultas, fakultas, akhiridketua, ketua, aidanggota1, anggota1, aidanggota2, anggota2, aidanggota3, dosen.nama as anggota3, aidanggota4, idanggota4, anggotalain from 
				(select idlapakhir, judul, sumberdana, tahun, statusfile, namafileakhir, read_more, abstrak, akhiridprodi, programstudi, aidskimpenelitian, skim, akhiridbidilmu, bidangilmu, akhiridfakultas, fakultas, akhiridketua, ketua, aidanggota1, anggota1, aidanggota2, dosen.nama as anggota2, aidanggota3, idanggota3, aidanggota4, idanggota4, anggotalain from 
					(select idlapakhir, judul, sumberdana, tahun, statusfile, namafileakhir, read_more, abstrak, akhiridprodi, programstudi, aidskimpenelitian, skim, akhiridbidilmu, bidangilmu, akhiridfakultas, fakultas, akhiridketua, ketua, aidanggota1, dosen.nama as anggota1, aidanggota2, idanggota2, aidanggota3, idanggota3, aidanggota4, idanggota4, anggotalain from 
						(select idlapakhir, judul, sumberdana, tahun, statusfile, namafileakhir, read_more, abstrak, akhiridprodi, programstudi, aidskimpenelitian, skim, akhiridbidilmu, bidangilmu, akhiridfakultas, fakultas, akhiridketua, dosen.nama as ketua, aidanggota1, idanggota1, aidanggota2, idanggota2, aidanggota3, idanggota3, aidanggota4, idanggota4, anggotalain from 
							(select idlapakhir, judul, sumberdana, tahun, statusfile, namafileakhir, read_more, abstrak, akhiridprodi, programstudi, aidskimpenelitian, skimpenelitian.skim as skim, akhiridbidilmu, bidangilmu, akhiridfakultas, fakultas, akhiridketua, idketua, aidanggota1, idanggota1, aidanggota2, idanggota2, aidanggota3, idanggota3, aidanggota4, idanggota4, anggotalain from
								(select idlapakhir, judul, sumberdana, tahun, statusfile, namafileakhir, read_more, abstrak, laporanakhir.idprodi as akhiridprodi, programstudi.programstudi as programstudi, laporanakhir.idskimpenelitian as aidskimpenelitian, idskimpenelitian, laporanakhir.idbidilmu as akhiridbidilmu, bidangilmu.bidangilmu as bidangilmu, laporanakhir.idfakultas as akhiridfakultas, fakultas.fakultas as fakultas, laporanakhir.idketua as akhiridketua, idketua, laporanakhir.idanggota1 as aidanggota1, idanggota1, laporanakhir.idanggota2 as aidanggota2, idanggota2, laporanakhir.idanggota3 as aidanggota3, idanggota3, laporanakhir.idanggota4 as aidanggota4, idanggota4, anggotalain from laporanakhir left join programstudi on laporanakhir.idprodi=programstudi.idprodi left join bidangilmu on laporanakhir.idbidilmu=bidangilmu.idbidilmu left join fakultas on laporanakhir.idfakultas=fakultas.idfakultas)
							as tprogramstudi left join skimpenelitian on tprogramstudi.idskimpenelitian=skimpenelitian.idskimpenelitian)
						as tketua left join dosen on tketua.idketua=dosen.iddosen) 
					as t1 left join dosen on t1.idanggota1=dosen.iddosen) 
				as t2 left join dosen on t2.idanggota2=dosen.iddosen) 
			as t3 left join dosen on t3.idanggota3=dosen.iddosen) 
		as t4 left join dosen on t4.idanggota4=dosen.iddosen where idlapakhir="'.$idlapakhir.'" limit 1');
		$thnsekarang=idate('Y');
		$data['dosen']=DB::table('dosen')
		->where('username','=',Session::get('username'))
		->where('iddosen','=',Session::get('iddosen'))
		->get();
		return View::make('lecturer.detaillakhir',$data)->with('thnsekarang', $thnsekarang);
	}
	public function halamangrafikpenelitian(){
		$data['proposal'] = DB::table('proposal')->get();
		$data['programstudi'] = DB::table('programstudi')->get();
		$data['bidangilmu'] = DB::table('bidangilmu')->get();
		$data['dosen'] = DB::table('dosen')->get();
		$data['fakultas'] = DB::table('fakultas')
		->get();
		$data['skimpenelitian'] = DB::table('skimpenelitian')->get();
		$status = 'success';
		if (Session::has('status')){
			$status=Session::get('status');
			Session::forget('status');
		}
		$data['status']=$status;
		$thnsekarang=idate('Y');
		return View::make('user.grafik', $data)->with('thnsekarang', $thnsekarang);
	}
	public function dosen(){
		//queries the fakultas db table, orders by idfakultas and lists idfakultas and fakultas in fakultas table
		$data['fakultas'] = DB::table('fakultas')
		->select('fakultas.idfakultas', 'fakultas.fakultas')
		->get();
		$thnsekarang=idate('Y');
		return View::make('user.dosenuser', $data)->with('thnsekarang', $thnsekarang);
	}
	public function proses_caridosen(){
		$idfakultas=Input::get('idfakultas');
		$kunci=Input::get('kunci');
		$dosen=DB::table('dosen')
		->join('fakultas', 'dosen.idfakultas', '=', 'fakultas.idfakultas');
		if ($idfakultas != ''){
			$dosen->where('dosen.idfakultas','=',$idfakultas);
		}
		if ($kunci != ''){
			$dosen->where('dosen.nama','LIKE','%'.$kunci.'%')->orWhere('dosen.tempatlahir','LIKE','%'.$kunci.'%');
		}
		$results=$dosen->get();
		$thnsekarang=idate('Y');
		return View::make('user.caridosen')->with('dosen', $results)->with('thnsekarang', $thnsekarang);
	}
	public function lihatdosen($iddosen){
		$data['dosen'] = DB::select('select iddosen, nidn, nama, pangkatgolongan, email, notelp, namafile, nip, tempatlahir, tanggallahir, jeniskelamin, jabatanfungsional, dosen.idfakultas as dosenidfakultas, fakultas.kode as kode, fakultas.fakultas as fakultas from dosen left join fakultas on dosen.idfakultas=fakultas.idfakultas where iddosen="'.$iddosen.'" limit 1');
		$tahun = DB::table('proposal')->where('proposal.idketua', '=', $iddosen)->orWhere('proposal.idanggota1', '=', $iddosen)->orWhere('proposal.idanggota2', '=', $iddosen)->orWhere('proposal.idanggota3', '=', $iddosen)->orWhere('proposal.idanggota4', '=', $iddosen)->max('tahun');
		$tahun2 = DB::table('laporanakhir')->where('laporanakhir.idketua', '=', $iddosen)->orWhere('laporanakhir.idanggota1', '=', $iddosen)->orWhere('laporanakhir.idanggota2', '=', $iddosen)->orWhere('laporanakhir.idanggota3', '=', $iddosen)->orWhere('laporanakhir.idanggota4', '=', $iddosen)->max('tahun');
		if ($tahun >= $tahun2){
			$tahun3=(int)$tahun;
		}
		if ($tahun2 >= $tahun){
			$tahun3=(int)$tahun2;
		}
		date_default_timezone_set('Asia/Jakarta');
		$tahunsekarang=idate('Y');
		$selisih=$tahunsekarang - $tahun3;
		if ($selisih < 4){
			$status='Aktif';
		}
		if ($selisih >= 4){
			$status='Perlu pembinaan';
		}
		$BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
		foreach ($data['dosen'] as $dosen)
			{

				$tahun = substr($dosen->tanggallahir, 0, 4);
				$bulan = substr($dosen->tanggallahir, 5, 2);
				$tgl   = substr($dosen->tanggallahir, 8, 2);
				$result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;
			}
		$thnsekarang=idate('Y');
		return View::make('user.detaildosenuser',$data)->with('status', $status)->with('result', $result)->with('thnsekarang', $thnsekarang);
	}
	public function berandadosen(){
		$data['dosen']=DB::table('dosen')
		->where('username','=',Session::get('username'))
		->where('iddosen','=',Session::get('iddosen'))
		->get();
		$thnsekarang=idate('Y');
		if (Session::has('message')) {
			$data['message'] = Session::get('message');
			Session::forget('message');
		}
		return View::make('lecturer.beranda',$data)->with('thnsekarang', $thnsekarang);
	}
	public function ubahprofildosen(){
		$statusinput = 'success';
		if (Session::has('statusinput')){
			$statusinput = Session::get('statusinput');
			Session::forget('statusinput');
		}
		$data['dosen']=DB::table('dosen')
		->where('username','=',Session::get('username'))
		->where('iddosen','=',Session::get('iddosen'))
		->get();
		$data['dosen2'] = DB::table('fakultas')
		->join('dosen', 'fakultas.idfakultas', '=', 'dosen.idfakultas')
		->where('iddosen','=',Session::get('iddosen'))
		->select('fakultas.*', 'dosen.*')
		->first();
		//queries the fakultas db table, orders by idfakultas and lists fakultas
		$data['fakultas'] = DB::table('fakultas')
		->select('fakultas.*')
		->get();
		$thnsekarang=idate('Y');
		$data['statusinput'] = $statusinput;
		return View::make('lecturer.ubahdosen',$data)->with('thnsekarang', $thnsekarang);
	}
	public function logoutdosen(){
		date_default_timezone_set('Asia/Jakarta');
		DB::table('history')->insert(array(
			'keterangan'=>'Logout dari sistem.',
			'tanggalwaktu'=>date('Y-m-d H:i:s'),
			'iduserhistory'=>Session::get('iddosen')
			));
		Session::flush(); //Menghapus semua aksi yang terjadi
		return Redirect::to('home');
	}
	public function proses_updosen(){
		$iddosen=Session::get('iddosen');
		$data['statusinput'] = 'success';
		if(((Input::get('nama')) == '') || ((Input::get('username')) == '')){
			$data['statusinput'] = 'failed';
			return Redirect::to('/lecturer_editprofile')->with('statusinput',$data['statusinput']);
		}
		elseif(((Input::get('nama')) != '') && ((Input::get('username')) != '')){
			if (Input::hasFile('namafile'))
			{
				$nama_file=md5(time().rand()).'.'.Input::file('namafile')->getClientOriginalExtension();
				Input::file('namafile')->move('Images_Dosen',$nama_file);
				//update gambar
				DB::table('dosen')->where('iddosen', '=', $iddosen)->update(array(
					'namafile'=>$nama_file
					));
			}
			//update tabel dosen
			DB::table('dosen')->where('iddosen','=',$iddosen)->update(array(
				'nidn'=>Input::get('nidn'),
				'nama'=>Input::get('nama'),
				'username'=>Input::get('username'),
				'pangkatgolongan'=>(Input::get('pangkat')."/".Input::get('golongan')),
				'email'=>Input::get('email'),
				'notelp'=>Input::get('notelp'),
				'nip'=>Input::get('nip'),
				'tempatlahir'=>Input::get('tempatlahir'),
				'tanggallahir'=>Input::get('tanggallahir'),
				'jeniskelamin'=>Input::get('jeniskelamin'),
				'jabatanfungsional'=>Input::get('jabatanfungsional'),
				'idfakultas'=>Input::get('idfakultas')
				));
			date_default_timezone_set('Asia/Jakarta');
			DB::table('history')->insert(array(
				'keterangan'=>'Ubah profil.',
				'tanggalwaktu'=>date('Y-m-d H:i:s'),
				'iduserhistory'=>Session::get('iddosen')
				));
		}
		$dosen=DB::table('dosen')->where('iddosen','=',$iddosen)->first();
		Session::put('username',$dosen->username);
		return Redirect::to('/lecturerhome')->with('statusinput',$data['statusinput']);
	}
	public function lihatgrafik($idfakultas, $idskimpenelitian){
		$data['programstudi'] = DB::table('programstudi')->get();
		$data['bidangilmu'] = DB::table('bidangilmu')->get();
		$data['dosen'] = DB::table('dosen')->get();
		$data['fakultaspilihan'] = DB::table('fakultas')
		->where('idfakultas', '=', $idfakultas)
		->get();
		$data['fakultas'] = DB::table('fakultas')
		->get();
		$data['skimpenelitianpilihan'] = DB::table('skimpenelitian')
		->where('idskimpenelitian', '=', $idskimpenelitian)
		->get();
		$data['skimpenelitian'] = DB::table('skimpenelitian')->get();
		$tahun2=(date('Y')-4);
		$tahun3=date('Y');
		$data['proposal'] = DB::table('proposal')
		->join('bidangilmu','proposal.idbidilmu','=','bidangilmu.idbidilmu')
		->join('fakultas','proposal.idfakultas','=','fakultas.idfakultas')
		->join('skimpenelitian','proposal.idskimpenelitian','=','skimpenelitian.idskimpenelitian')
		->where('proposal.idfakultas', '=', $idfakultas)
		->where('proposal.idskimpenelitian', '=', $idskimpenelitian)
		->whereBetween('tahun', array($tahun2,$tahun3))
		->select('proposal.*','bidangilmu.*','fakultas.*','skimpenelitian.*')
		->get();
		$proposal=DB::table('proposal')
		->join('bidangilmu','proposal.idbidilmu','=','bidangilmu.idbidilmu')
		->join('fakultas','proposal.idfakultas','=','fakultas.idfakultas')
		->join('skimpenelitian','proposal.idskimpenelitian','=','skimpenelitian.idskimpenelitian')
		->where('proposal.idfakultas', '=', $idfakultas)
		->where('proposal.idskimpenelitian', '=', $idskimpenelitian)
		->whereBetween('tahun', array($tahun2,$tahun3))
		->select('proposal.*','bidangilmu.*','fakultas.*','skimpenelitian.*')
		->count();
		$status='success';
		if (Session::has('status')){
			$status=Session::get('status');
			Session::forget('status');
		}
		if(!empty($data['proposal'])){
			//buat data untuk ditampilkan ke highchart
			$kategori='[';
			foreach($data['bidangilmu'] as $key => $item){
				$comma='';
				if(isset($data['bidangilmu'][$key+1])) $comma=',';
				$kategori.="'".$item->bidangilmu."'".$comma;
			}
			$kategori .= ']';
			//Array tahun
			$tahun='[';
			define('tahun_selesai',date('Y'));
			$first_year=(date('Y')-4);
			$koma2 = '';
			for($count=$first_year; $count<=tahun_selesai; $count++){
				$koma2=',';
				$tahun.="{name: ";
				$tahun.="'".$count."'";
				$tahun.=", data: ";
				$data_proposal='[';
				foreach($data['bidangilmu'] as $key => $item){
					$comma='';
					if(isset($data['bidangilmu'][$key+1])) $comma=',';
					$jumlahproposal=DB::table('proposal')
					->join('bidangilmu','proposal.idbidilmu','=','bidangilmu.idbidilmu')
					->join('fakultas','proposal.idfakultas','=','fakultas.idfakultas')
					->join('skimpenelitian','proposal.idskimpenelitian','=','skimpenelitian.idskimpenelitian')
					->where('proposal.idfakultas', '=', $idfakultas)
					->where('proposal.idskimpenelitian', '=', $idskimpenelitian)
					->where('proposal.tahun', '=', $count)
					->where('proposal.idbidilmu','=',$item->idbidilmu)
					->select('proposal.*','bidangilmu.*','fakultas.*','skimpenelitian.*')
					->count();
					$data_proposal.='{y : '.$jumlahproposal.'}'.$comma;
				}
				$data_proposal.=']';
				$tahun.=$data_proposal."}";
				if($count == tahun_selesai){
					$koma2 = '';
				}
				else{
					$koma2 = ',';
				}
				$tahun.=$koma2;
			}
			$tahun.=']';
			//Array tahun selesai
			$data['kategori'] = $kategori;
			$data['data_highchart'] = $tahun;
			$data['status']=$status;
			$thnsekarang=idate('Y');
			return View::make('user.lihatgrafikproposal', $data)->with('status',$data['status'])->with('totalproposal',$proposal)->with('thnsekarang',$thnsekarang);
		}
		else{
			$data['status']='failed';
			return Redirect::to('/graph')->with('status', $data['status']);
		}
	}
	public function halamangrafiklaporan(){
		$data['laporanakhir'] = DB::table('laporanakhir')->get();
		$data['programstudi'] = DB::table('programstudi')->get();
		$data['bidangilmu'] = DB::table('bidangilmu')->get();
		$data['dosen'] = DB::table('dosen')->get();
		$data['fakultas'] = DB::table('fakultas')
		->get();
		$data['skimpenelitian'] = DB::table('skimpenelitian')->get();
		$status = 'success';
		if (Session::has('status')){
			$status=Session::get('status');
			Session::forget('status');
		}
		$data['status']=$status;
		$thnsekarang=idate('Y');
		return View::make('user.grafiklaporan', $data)->with('thnsekarang', $thnsekarang);
	}
	public function lihatgrafiklaporan($idfakultas, $idskimpenelitian){
		$data['programstudi'] = DB::table('programstudi')->get();
		$data['bidangilmu'] = DB::table('bidangilmu')->get();
		$data['dosen'] = DB::table('dosen')->get();
		$data['fakultaspilihan'] = DB::table('fakultas')
		->where('idfakultas', '=', $idfakultas)
		->get();
		$data['fakultas'] = DB::table('fakultas')
		->get();
		$data['skimpenelitianpilihan'] = DB::table('skimpenelitian')
		->where('idskimpenelitian', '=', $idskimpenelitian)
		->get();
		$data['skimpenelitian'] = DB::table('skimpenelitian')->get();
		$tahun2=(date('Y')-4);
		$tahun3=date('Y');
		$data['laporan'] = DB::table('laporanakhir')
		->join('bidangilmu','laporanakhir.idbidilmu','=','bidangilmu.idbidilmu')
		->join('fakultas','laporanakhir.idfakultas','=','fakultas.idfakultas')
		->join('skimpenelitian','laporanakhir.idskimpenelitian','=','skimpenelitian.idskimpenelitian')
		->where('laporanakhir.idfakultas', '=', $idfakultas)
		->where('laporanakhir.idskimpenelitian', '=', $idskimpenelitian)
		->whereBetween('tahun', array($tahun2,$tahun3))
		->select('laporanakhir.*','bidangilmu.*','fakultas.*','skimpenelitian.*')
		->get();
		$laporan=DB::table('laporanakhir')
		->join('bidangilmu','laporanakhir.idbidilmu','=','bidangilmu.idbidilmu')
		->join('fakultas','laporanakhir.idfakultas','=','fakultas.idfakultas')
		->join('skimpenelitian','laporanakhir.idskimpenelitian','=','skimpenelitian.idskimpenelitian')
		->where('laporanakhir.idfakultas', '=', $idfakultas)
		->where('laporanakhir.idskimpenelitian', '=', $idskimpenelitian)
		->whereBetween('tahun', array($tahun2,$tahun3))
		->select('laporanakhir.*','bidangilmu.*','fakultas.*','skimpenelitian.*')
		->count();
		$status='success';
		if (Session::has('status')){
			$status=Session::get('status');
			Session::forget('status');
		}
		if(!empty($data['laporan'])){
			//buat data untuk ditampilkan ke highchart
			$kategori='[';
			foreach($data['bidangilmu'] as $key => $item){
				$comma='';
				if(isset($data['bidangilmu'][$key+1])) $comma=',';
				$kategori.="'".$item->bidangilmu."'".$comma;
			}
			$kategori .= ']';
			//Array tahun
			$tahun='[';
			define('tahun_selesai',date('Y'));
			$first_year=(date('Y')-4);
			$koma2 = '';
			for($count=$first_year; $count<=tahun_selesai; $count++){
				$koma2=',';
				$tahun.="{name: ";
				$tahun.="'".$count."'";
				$tahun.=", data: ";
				$datalaporan='[';
				foreach($data['bidangilmu'] as $key => $item){
					$comma='';
					if(isset($data['bidangilmu'][$key+1])) $comma=',';
					$jumlahlaporan=DB::table('laporanakhir')
					->join('bidangilmu','laporanakhir.idbidilmu','=','bidangilmu.idbidilmu')
					->join('fakultas','laporanakhir.idfakultas','=','fakultas.idfakultas')
					->join('skimpenelitian','laporanakhir.idskimpenelitian','=','skimpenelitian.idskimpenelitian')
					->where('laporanakhir.idfakultas', '=', $idfakultas)
					->where('laporanakhir.idskimpenelitian', '=', $idskimpenelitian)
					->where('laporanakhir.tahun', '=', $count)
					->where('laporanakhir.idbidilmu','=',$item->idbidilmu)
					->select('laporanakhir.*','bidangilmu.*','fakultas.*','skimpenelitian.*')
					->count();
					$datalaporan.='{y : '.$jumlahlaporan.'}'.$comma;
				}
				$datalaporan.=']';
				$tahun.=$datalaporan."}";
				if($count == tahun_selesai){
					$koma2 = '';
				}
				else{
					$koma2 = ',';
				}
				$tahun.=$koma2;
			}
			$tahun.=']';
			//Array tahun selesai
			$data['kategori'] = $kategori;
			$data['data_highchart'] = $tahun;
			$data['status']=$status;
			$thnsekarang=idate('Y');
			return View::make('user.lihatgrafiklaporan', $data)->with('status',$data['status'])->with('totallaporan',$laporan)->with('thnsekarang',$thnsekarang);
		}
		else{
			$data['status']='failed';
			return Redirect::to('/finalgraph')->with('status', $data['status']);
		}
	}
	public function halamanproposaldosen(){
		$iddosen=Session::get('iddosen');
		$data['dosen']=DB::table('dosen')
		->where('username','=',Session::get('username'))
		->where('iddosen','=',$iddosen)
		->get();
		$data['proposal'] = DB::select("select idproposal, judul, sumberdana, tahun, read_more, programstudi, skim, bidangilmu, fakultas, ketua, anggota1, anggota2, anggota3, dosen.nama as anggota4, anggotalain from 
			(select idproposal, judul, sumberdana, tahun, read_more, programstudi, skim, bidangilmu, fakultas, ketua, anggota1, anggota2, dosen.nama as anggota3, idanggota4, anggotalain from 
				(select idproposal, judul, sumberdana, tahun, read_more, programstudi, skim, bidangilmu, fakultas, ketua, anggota1, dosen.nama as anggota2, idanggota3, idanggota4, anggotalain from 
					(select idproposal, judul, sumberdana, tahun, read_more, programstudi, skim, bidangilmu, fakultas, ketua, dosen.nama as anggota1, idanggota2, idanggota3, idanggota4, anggotalain from 
						(select idproposal, judul, sumberdana, tahun, read_more, programstudi, skim, bidangilmu, fakultas, dosen.nama as ketua, idanggota1, idanggota2, idanggota3, idanggota4, anggotalain from 
							(select idproposal, judul, sumberdana, tahun, read_more, programstudi, skimpenelitian.skim as skim, bidangilmu, fakultas, idketua, idanggota1, idanggota2, idanggota3, idanggota4, anggotalain from
								(select idproposal, judul, sumberdana, tahun, read_more, programstudi.programstudi as programstudi, idskimpenelitian, bidangilmu.bidangilmu as bidangilmu, fakultas.fakultas as fakultas, idketua, idanggota1, idanggota2, idanggota3, idanggota4, anggotalain from proposal left join programstudi on proposal.idprodi=programstudi.idprodi left join bidangilmu on proposal.idbidilmu=bidangilmu.idbidilmu left join fakultas on proposal.idfakultas=fakultas.idfakultas)
							as tprogramstudi left join skimpenelitian on tprogramstudi.idskimpenelitian=skimpenelitian.idskimpenelitian)
						as tketua left join dosen on tketua.idketua=dosen.iddosen where tketua.idketua='".$iddosen."' or tketua.idanggota1='".$iddosen."' or tketua.idanggota2='".$iddosen."' or tketua.idanggota3='".$iddosen."' or tketua.idanggota4='".$iddosen."') 
					as t1 left join dosen on t1.idanggota1=dosen.iddosen) 
				as t2 left join dosen on t2.idanggota2=dosen.iddosen)
			as t3 left join dosen on t3.idanggota3=dosen.iddosen) 
		as t4 left join dosen on t4.idanggota4=dosen.iddosen order by idproposal desc");
		$thnsekarang=idate('Y');
		return View::make('lecturer.proposal', $data)->with('thnsekarang',$thnsekarang);
	}
	public function ubahproposaldosen($idproposal){
		$statusinput = 'success';
		if (Session::has('statusinput')){
			$statusinput = Session::get('statusinput');
			Session::forget('statusinput');
		}
		$data['proposal'] = DB::select('select idproposal, judul, sumberdana, tahun, statusfile, namafileproposal, read_more, abstrak, proposalidprodi, programstudi, pidskimpenelitian, skim, proposalidbidilmu, bidangilmu, proposalidfakultas, fakultas, proposalidketua, ketua, pidanggota1, anggota1, pidanggota2, anggota2, pidanggota3, anggota3, pidanggota4, dosen.nama as anggota4, anggotalain from 
			(select idproposal, judul, sumberdana, tahun, statusfile, namafileproposal, read_more, abstrak, proposalidprodi, programstudi, pidskimpenelitian, skim, proposalidbidilmu, bidangilmu, proposalidfakultas, fakultas, proposalidketua, ketua, pidanggota1, anggota1, pidanggota2, anggota2, pidanggota3, dosen.nama as anggota3, pidanggota4, idanggota4, anggotalain from 
				(select idproposal, judul, sumberdana, tahun, statusfile, namafileproposal, read_more, abstrak, proposalidprodi, programstudi, pidskimpenelitian, skim, proposalidbidilmu, bidangilmu, proposalidfakultas, fakultas, proposalidketua, ketua, pidanggota1, anggota1, pidanggota2, dosen.nama as anggota2, pidanggota3, idanggota3, pidanggota4, idanggota4, anggotalain from 
					(select idproposal, judul, sumberdana, tahun, statusfile, namafileproposal, read_more, abstrak, proposalidprodi, programstudi, pidskimpenelitian, skim, proposalidbidilmu, bidangilmu, proposalidfakultas, fakultas, proposalidketua, ketua, pidanggota1, dosen.nama as anggota1, pidanggota2, idanggota2, pidanggota3, idanggota3, pidanggota4, idanggota4, anggotalain from 
						(select idproposal, judul, sumberdana, tahun, statusfile, namafileproposal, read_more, abstrak, proposalidprodi, programstudi, pidskimpenelitian, skim, proposalidbidilmu, bidangilmu, proposalidfakultas, fakultas, proposalidketua, dosen.nama as ketua, pidanggota1, idanggota1, pidanggota2, idanggota2, pidanggota3, idanggota3, pidanggota4, idanggota4, anggotalain from 
							(select idproposal, judul, sumberdana, tahun, statusfile, namafileproposal, read_more, abstrak, proposalidprodi, programstudi, pidskimpenelitian, skimpenelitian.skim as skim, proposalidbidilmu, bidangilmu, proposalidfakultas, fakultas, proposalidketua, idketua, pidanggota1, idanggota1, pidanggota2, idanggota2, pidanggota3, idanggota3, pidanggota4, idanggota4, anggotalain from
								(select idproposal, judul, sumberdana, tahun, statusfile, namafileproposal, read_more, abstrak, proposal.idprodi as proposalidprodi, programstudi.programstudi as programstudi, proposal.idskimpenelitian as pidskimpenelitian, idskimpenelitian, proposal.idbidilmu as proposalidbidilmu, bidangilmu.bidangilmu as bidangilmu, proposal.idfakultas as proposalidfakultas, fakultas.fakultas as fakultas, proposal.idketua as proposalidketua, idketua, proposal.idanggota1 as pidanggota1, idanggota1, proposal.idanggota2 as pidanggota2, idanggota2, proposal.idanggota3 as pidanggota3, idanggota3, proposal.idanggota4 as pidanggota4, idanggota4, anggotalain from proposal left join programstudi on proposal.idprodi=programstudi.idprodi left join bidangilmu on proposal.idbidilmu=bidangilmu.idbidilmu left join fakultas on proposal.idfakultas=fakultas.idfakultas)
							as tprogramstudi left join skimpenelitian on tprogramstudi.idskimpenelitian=skimpenelitian.idskimpenelitian)
						as tketua left join dosen on tketua.idketua=dosen.iddosen) 
					as t1 left join dosen on t1.idanggota1=dosen.iddosen) 
				as t2 left join dosen on t2.idanggota2=dosen.iddosen)
			as t3 left join dosen on t3.idanggota3=dosen.iddosen) 
		as t4 left join dosen on t4.idanggota4=dosen.iddosen where idproposal="'.$idproposal.'" limit 1');
		//queries the programstudi db table, orders by idprodi and lists all data in programstudi table
		$data['programstudi'] = DB::table('programstudi')
		->select('programstudi.*')
		->get();
		//queries the skimpenelitian db table, orders by idskimpenelitian and lists all data in skimpenelitian table
		$data['skimpenelitian'] = DB::table('skimpenelitian')
		->select('skimpenelitian.*')
		->get();
		//queries the bidangilmu db table, orders by idbidilmu and lists all data in bidangilmu table
		$data['bidangilmu'] = DB::table('bidangilmu')
		->select('bidangilmu.*')
		->get();
		//queries the fakultas db table, orders by idfakultas and lists all data in fakultas table
		$data['fakultas'] = DB::table('fakultas')
		->select('fakultas.*')
		->get();
		$iddosen=Session::get('iddosen');
		$data['dosen']=DB::table('dosen')
		->where('username','=',Session::get('username'))
		->where('iddosen','=',$iddosen)
		->get();
		$data['statusinput'] = $statusinput;
		$thnsekarang=idate('Y');
		return View::make('lecturer.ubahproposal',$data)->with('thnsekarang', $thnsekarang);
	}
	public function berandaketua(){
		$data['user']=DB::table('user')
		->where('username','=',Session::get('username'))
		->where('iduser','=',Session::get('iduser'))
		->get();
		$thnsekarang=idate('Y');
		if (Session::has('message')) {
			$data['message'] = Session::get('message');
			Session::forget('message');
		}
		return View::make('chief.beranda',$data)->with('thnsekarang', $thnsekarang);
	}
	public function laporanaktifitaspenelitian(){
		$data['user']=DB::table('user')
		->where('username','=',Session::get('username'))
		->where('iduser','=',Session::get('iduser'))
		->get();
		$data['skimpenelitian'] = DB::table('skimpenelitian')->get();
		$status = 'success';
		if (Session::has('status')){
			$status=Session::get('status');
			Session::forget('status');
		}
		$data['status']=$status;
		$data['laporanakhir'] = DB::table('laporanakhir')->distinct()->select('laporanakhir.tahun')->get();
		$thnsekarang=idate('Y');
		return View::make('chief.laporanaktifitaspenelitian', $data)->with('thnsekarang', $thnsekarang);
	}
	public function lihatlap($tahun,$idskimpenelitian){
		$data['user']=DB::table('user')
		->where('username','=',Session::get('username'))
		->where('iduser','=',Session::get('iduser'))
		->get();
		$data['skimpenelitian'] = DB::table('skimpenelitian')->get();
		$laporanakhir = DB::table('laporanakhir')
			->join('skimpenelitian','laporanakhir.idskimpenelitian','=','skimpenelitian.idskimpenelitian')
			->join('fakultas','laporanakhir.idfakultas','=','fakultas.idfakultas')
			->where('laporanakhir.tahun', '=', $tahun)
			->where('laporanakhir.idskimpenelitian', '=', $idskimpenelitian)
            ->select('laporanakhir.idfakultas', DB::raw('count(*) as total'),'fakultas.fakultas as fakultas')
            ->groupBy('laporanakhir.idfakultas')
            ->lists('total','fakultas');
        $data['skimpenelitianpilihan'] = DB::table('skimpenelitian')
		->where('idskimpenelitian', '=', $idskimpenelitian)
		->get();
		$status = 'success';
		if (Session::has('status')){
			$status=Session::get('status');
			Session::forget('status');
		}
		$data['laporanakhir2'] = DB::table('laporanakhir')->distinct()->select('laporanakhir.tahun')->get();
		if(!empty($laporanakhir)){
			//buat data untuk ditampilkan ke highchart
			$datalaporanakhir='[';
			$koma = '';
			foreach($laporanakhir as $key => $item){
				if(isset($laporanakhir[$key+1])) $koma=",";
				$datalaporanakhir.="{name: '".$key."', y: ".$item."}".","."";
				}
				$datalaporanakhir.=']';
				$data['datalaporanakhir2'] = $datalaporanakhir;
			$data['status']=$status;
			$thnsekarang=idate('Y');
			return View::make('chief.lihatlap', $data)->with('status',$data['status'])->with('tahun2',$tahun)->with('idskimpenelitian2',$idskimpenelitian)->with('listla',$laporanakhir)->with('thnsekarang', $thnsekarang);
		}
		else{
			$data['status']='failed';
			return Redirect::to('/researchact')->with('status', $data['status']);
		}
	}
	public function downloadlapdosen($tahun2,$idskimpenelitian2){
		$laporanakhir = DB::table('laporanakhir')
			->join('skimpenelitian','laporanakhir.idskimpenelitian','=','skimpenelitian.idskimpenelitian')
			->join('fakultas','laporanakhir.idfakultas','=','fakultas.idfakultas')
			->where('laporanakhir.tahun', '=', $tahun2)
			->where('laporanakhir.idskimpenelitian', '=', $idskimpenelitian2)
            ->select('laporanakhir.idfakultas', DB::raw('count(*) as total'),'fakultas.fakultas as fakultas')
            ->groupBy('laporanakhir.idfakultas')
            ->lists('total','fakultas');
        $data['skimpenelitianpilihan'] = DB::table('skimpenelitian')
		->where('idskimpenelitian', '=', $idskimpenelitian2)
		->get();
		//buat data untuk ditampilkan ke highchart
		$datalaporanakhir='[';
		$koma = '';
		foreach($laporanakhir as $key => $item){
			if(isset($laporanakhir[$key+1])) $koma=',';
			$datalaporanakhir.='{name: "'.$key.'", y: '.$item.'}'.$koma;
		}
		$datalaporanakhir.=']';
		$data['datalaporanakhir2'] = $datalaporanakhir;
		// mengarahkan view pada file lap.blade.php di view/
		$pdf = PDF::loadView('chief.lap', $data, compact('laporanakhir','tahun2'));
		return $pdf->download('lap'.$tahun2.'_'.$idskimpenelitian2.'.pdf');
	}
	public function halamanproposalketua(){
		$data['proposal'] = DB::select('select idproposal, judul, sumberdana, tahun, read_more, programstudi, skim, bidangilmu, fakultas, ketua, anggota1, anggota2, anggota3, dosen.nama as anggota4, anggotalain from 
			(select idproposal, judul, sumberdana, tahun, read_more, programstudi, skim, bidangilmu, fakultas, ketua, anggota1, anggota2, dosen.nama as anggota3, idanggota4, anggotalain from 
				(select idproposal, judul, sumberdana, tahun, read_more, programstudi, skim, bidangilmu, fakultas, ketua, anggota1, dosen.nama as anggota2, idanggota3, idanggota4, anggotalain from 
					(select idproposal, judul, sumberdana, tahun, read_more, programstudi, skim, bidangilmu, fakultas, ketua, dosen.nama as anggota1, idanggota2, idanggota3, idanggota4, anggotalain from 
						(select idproposal, judul, sumberdana, tahun, read_more, programstudi, skim, bidangilmu, fakultas, dosen.nama as ketua, idanggota1, idanggota2, idanggota3, idanggota4, anggotalain from 
							(select idproposal, judul, sumberdana, tahun, read_more, programstudi, skimpenelitian.skim as skim, bidangilmu, fakultas, idketua, idanggota1, idanggota2, idanggota3, idanggota4, anggotalain from
								(select idproposal, judul, sumberdana, tahun, read_more, programstudi.programstudi as programstudi, idskimpenelitian, bidangilmu.bidangilmu as bidangilmu, fakultas.fakultas as fakultas, idketua, idanggota1, idanggota2, idanggota3, idanggota4, anggotalain from proposal left join programstudi on proposal.idprodi=programstudi.idprodi left join bidangilmu on proposal.idbidilmu=bidangilmu.idbidilmu left join fakultas on proposal.idfakultas=fakultas.idfakultas)
							as tprogramstudi left join skimpenelitian on tprogramstudi.idskimpenelitian=skimpenelitian.idskimpenelitian)
						as tketua left join dosen on tketua.idketua=dosen.iddosen) 
					as t1 left join dosen on t1.idanggota1=dosen.iddosen) 
				as t2 left join dosen on t2.idanggota2=dosen.iddosen) 
			as t3 left join dosen on t3.idanggota3=dosen.iddosen) 
		as t4 left join dosen on t4.idanggota4=dosen.iddosen order by idproposal desc');
		$data['user']=DB::table('user')
		->where('username','=',Session::get('username'))
		->where('iduser','=',Session::get('iduser'))
		->get();
		$thnsekarang=idate('Y');
		return View::make('chief.proposal', $data)->with('thnsekarang', $thnsekarang);
	}
	public function detailproposalketua($idproposal){
		$data['proposal'] = DB::select('select idproposal, judul, sumberdana, tahun, statusfile, namafileproposal, read_more, abstrak, proposalidprodi, programstudi, pidskimpenelitian, skim, proposalidbidilmu, bidangilmu, proposalidfakultas, fakultas, proposalidketua, ketua, pidanggota1, anggota1, pidanggota2, anggota2, pidanggota3, anggota3, pidanggota4, dosen.nama as anggota4, anggotalain from 
			(select idproposal, judul, sumberdana, tahun, statusfile, namafileproposal, read_more, abstrak, proposalidprodi, programstudi, pidskimpenelitian, skim, proposalidbidilmu, bidangilmu, proposalidfakultas, fakultas, proposalidketua, ketua, pidanggota1, anggota1, pidanggota2, anggota2, pidanggota3, dosen.nama as anggota3, pidanggota4, idanggota4, anggotalain from 
				(select idproposal, judul, sumberdana, tahun, statusfile, namafileproposal, read_more, abstrak, proposalidprodi, programstudi, pidskimpenelitian, skim, proposalidbidilmu, bidangilmu, proposalidfakultas, fakultas, proposalidketua, ketua, pidanggota1, anggota1, pidanggota2, dosen.nama as anggota2, pidanggota3, idanggota3, pidanggota4, idanggota4, anggotalain from 
					(select idproposal, judul, sumberdana, tahun, statusfile, namafileproposal, read_more, abstrak, proposalidprodi, programstudi, pidskimpenelitian, skim, proposalidbidilmu, bidangilmu, proposalidfakultas, fakultas, proposalidketua, ketua, pidanggota1, dosen.nama as anggota1, pidanggota2, idanggota2, pidanggota3, idanggota3, pidanggota4, idanggota4, anggotalain from 
						(select idproposal, judul, sumberdana, tahun, statusfile, namafileproposal, read_more, abstrak, proposalidprodi, programstudi, pidskimpenelitian, skim, proposalidbidilmu, bidangilmu, proposalidfakultas, fakultas, proposalidketua, dosen.nama as ketua, pidanggota1, idanggota1, pidanggota2, idanggota2, pidanggota3, idanggota3, pidanggota4, idanggota4, anggotalain from 
							(select idproposal, judul, sumberdana, tahun, statusfile, namafileproposal, read_more, abstrak, proposalidprodi, programstudi, pidskimpenelitian, skimpenelitian.skim as skim, proposalidbidilmu, bidangilmu, proposalidfakultas, fakultas, proposalidketua, idketua, pidanggota1, idanggota1, pidanggota2, idanggota2, pidanggota3, idanggota3, pidanggota4, idanggota4, anggotalain from
								(select idproposal, judul, sumberdana, tahun, statusfile, namafileproposal, read_more, abstrak, proposal.idprodi as proposalidprodi, programstudi.programstudi as programstudi, proposal.idskimpenelitian as pidskimpenelitian, idskimpenelitian, proposal.idbidilmu as proposalidbidilmu, bidangilmu.bidangilmu as bidangilmu, proposal.idfakultas as proposalidfakultas, fakultas.fakultas as fakultas, proposal.idketua as proposalidketua, idketua, proposal.idanggota1 as pidanggota1, idanggota1, proposal.idanggota2 as pidanggota2, idanggota2, proposal.idanggota3 as pidanggota3, idanggota3, proposal.idanggota4 as pidanggota4, idanggota4, anggotalain from proposal left join programstudi on proposal.idprodi=programstudi.idprodi left join bidangilmu on proposal.idbidilmu=bidangilmu.idbidilmu left join fakultas on proposal.idfakultas=fakultas.idfakultas)
							as tprogramstudi left join skimpenelitian on tprogramstudi.idskimpenelitian=skimpenelitian.idskimpenelitian)
						as tketua left join dosen on tketua.idketua=dosen.iddosen) 
					as t1 left join dosen on t1.idanggota1=dosen.iddosen) 
				as t2 left join dosen on t2.idanggota2=dosen.iddosen) 
			as t3 left join dosen on t3.idanggota3=dosen.iddosen) 
		as t4 left join dosen on t4.idanggota4=dosen.iddosen where idproposal="'.$idproposal.'" limit 1');
		$data['user']=DB::table('user')
		->where('username','=',Session::get('username'))
		->where('iduser','=',Session::get('iduser'))
		->get();
		$thnsekarang=idate('Y');
		return View::make('chief.detailproposal',$data)->with('thnsekarang', $thnsekarang);
	}
	public function halamanlkketua(){
		$data['laporankemajuan'] = DB::select('select idlapkemajuan, judul, sumberdana, tahun, read_more, programstudi, skim, bidangilmu, fakultas, ketua, anggota1, anggota2, anggota3, dosen.nama as anggota4, anggotalain from 
			(select idlapkemajuan, judul, sumberdana, tahun, read_more, programstudi, skim, bidangilmu, fakultas, ketua, anggota1, anggota2, dosen.nama as anggota3, idanggota4, anggotalain from 
				(select idlapkemajuan, judul, sumberdana, tahun, read_more, programstudi, skim, bidangilmu, fakultas, ketua, anggota1, dosen.nama as anggota2, idanggota3, idanggota4, anggotalain from 
					(select idlapkemajuan, judul, sumberdana, tahun, read_more, programstudi, skim, bidangilmu, fakultas, ketua, dosen.nama as anggota1, idanggota2, idanggota3, idanggota4, anggotalain from 
						(select idlapkemajuan, judul, sumberdana, tahun, read_more, programstudi, skim, bidangilmu, fakultas, dosen.nama as ketua, idanggota1, idanggota2, idanggota3, idanggota4, anggotalain from 
							(select idlapkemajuan, judul, sumberdana, tahun, read_more, programstudi, skimpenelitian.skim as skim, bidangilmu, fakultas, idketua, idanggota1, idanggota2, idanggota3, idanggota4, anggotalain from
								(select idlapkemajuan, judul, sumberdana, tahun, read_more, programstudi.programstudi as programstudi, idskimpenelitian, bidangilmu.bidangilmu as bidangilmu, fakultas.fakultas as fakultas, idketua, idanggota1, idanggota2, idanggota3, idanggota4, anggotalain from laporankemajuan left join programstudi on laporankemajuan.idprodi=programstudi.idprodi left join bidangilmu on laporankemajuan.idbidilmu=bidangilmu.idbidilmu left join fakultas on laporankemajuan.idfakultas=fakultas.idfakultas)
							as tprogramstudi left join skimpenelitian on tprogramstudi.idskimpenelitian=skimpenelitian.idskimpenelitian)
						as tketua left join dosen on tketua.idketua=dosen.iddosen) 
					as t1 left join dosen on t1.idanggota1=dosen.iddosen) 
				as t2 left join dosen on t2.idanggota2=dosen.iddosen) 
			as t3 left join dosen on t3.idanggota3=dosen.iddosen) 
		as t4 left join dosen on t4.idanggota4=dosen.iddosen order by idlapkemajuan desc');
		$data['user']=DB::table('user')
		->where('username','=',Session::get('username'))
		->where('iduser','=',Session::get('iduser'))
		->get();
		$thnsekarang=idate('Y');
		return View::make('chief.lkemajuan', $data)->with('thnsekarang', $thnsekarang);
	}
	public function lihatlkketua($idlapkemajuan){
		$data['laporankemajuan'] = DB::select('select idlapkemajuan, judul, sumberdana, tahun, statusfile, namafilekemajuan, read_more, abstrak, kemajuanidprodi, programstudi, kidskimpenelitian, skim, kemajuanidbidilmu, bidangilmu, kemajuanidfakultas, fakultas, kemajuanidketua, ketua, kidanggota1, anggota1, kidanggota2, anggota2, kidanggota3, anggota3, kidanggota4, dosen.nama as anggota4, anggotalain from 
			(select idlapkemajuan, judul, sumberdana, tahun, statusfile, namafilekemajuan, read_more, abstrak, kemajuanidprodi, programstudi, kidskimpenelitian, skim, kemajuanidbidilmu, bidangilmu, kemajuanidfakultas, fakultas, kemajuanidketua, ketua, kidanggota1, anggota1, kidanggota2, anggota2, kidanggota3, dosen.nama as anggota3, kidanggota4, idanggota4, anggotalain from 
				(select idlapkemajuan, judul, sumberdana, tahun, statusfile, namafilekemajuan, read_more, abstrak, kemajuanidprodi, programstudi, kidskimpenelitian, skim, kemajuanidbidilmu, bidangilmu, kemajuanidfakultas, fakultas, kemajuanidketua, ketua, kidanggota1, anggota1, kidanggota2, dosen.nama as anggota2, kidanggota3, idanggota3, kidanggota4, idanggota4, anggotalain from 
					(select idlapkemajuan, judul, sumberdana, tahun, statusfile, namafilekemajuan, read_more, abstrak, kemajuanidprodi, programstudi, kidskimpenelitian, skim, kemajuanidbidilmu, bidangilmu, kemajuanidfakultas, fakultas, kemajuanidketua, ketua, kidanggota1, dosen.nama as anggota1, kidanggota2, idanggota2, kidanggota3, idanggota3, kidanggota4, idanggota4, anggotalain from 
						(select idlapkemajuan, judul, sumberdana, tahun, statusfile, namafilekemajuan, read_more, abstrak, kemajuanidprodi, programstudi, kidskimpenelitian, skim, kemajuanidbidilmu, bidangilmu, kemajuanidfakultas, fakultas, kemajuanidketua, dosen.nama as ketua, kidanggota1, idanggota1, kidanggota2, idanggota2, kidanggota3, idanggota3, kidanggota4, idanggota4, anggotalain from 
							(select idlapkemajuan, judul, sumberdana, tahun, statusfile, namafilekemajuan, read_more, abstrak, kemajuanidprodi, programstudi, kidskimpenelitian, skimpenelitian.skim as skim, kemajuanidbidilmu, bidangilmu, kemajuanidfakultas, fakultas, kemajuanidketua, idketua, kidanggota1, idanggota1, kidanggota2, idanggota2, kidanggota3, idanggota3, kidanggota4, idanggota4, anggotalain from
								(select idlapkemajuan, judul, sumberdana, tahun, statusfile, namafilekemajuan, read_more, abstrak, laporankemajuan.idprodi as kemajuanidprodi, programstudi.programstudi as programstudi, laporankemajuan.idskimpenelitian as kidskimpenelitian, idskimpenelitian, laporankemajuan.idbidilmu as kemajuanidbidilmu, bidangilmu.bidangilmu as bidangilmu, laporankemajuan.idfakultas as kemajuanidfakultas, fakultas.fakultas as fakultas, laporankemajuan.idketua as kemajuanidketua, idketua, laporankemajuan.idanggota1 as kidanggota1, idanggota1, laporankemajuan.idanggota2 as kidanggota2, idanggota2, laporankemajuan.idanggota3 as kidanggota3, idanggota3, laporankemajuan.idanggota4 as kidanggota4, idanggota4, anggotalain from laporankemajuan left join programstudi on laporankemajuan.idprodi=programstudi.idprodi left join bidangilmu on laporankemajuan.idbidilmu=bidangilmu.idbidilmu left join fakultas on laporankemajuan.idfakultas=fakultas.idfakultas)
							as tprogramstudi left join skimpenelitian on tprogramstudi.idskimpenelitian=skimpenelitian.idskimpenelitian)
						as tketua left join dosen on tketua.idketua=dosen.iddosen) 
					as t1 left join dosen on t1.idanggota1=dosen.iddosen) 
				as t2 left join dosen on t2.idanggota2=dosen.iddosen) 
			as t3 left join dosen on t3.idanggota3=dosen.iddosen) 
		as t4 left join dosen on t4.idanggota4=dosen.iddosen where idlapkemajuan="'.$idlapkemajuan.'" limit 1');
		$thnsekarang=idate('Y');
		$data['user']=DB::table('user')
		->where('username','=',Session::get('username'))
		->where('iduser','=',Session::get('iduser'))
		->get();
		return View::make('chief.detaillkemajuan',$data)->with('thnsekarang', $thnsekarang);
	}
	public function halamanlaketua(){
		$data['laporanakhir'] = DB::select('select idlapakhir, judul, sumberdana, tahun, read_more, programstudi, skim, bidangilmu, fakultas, ketua, anggota1, anggota2, anggota3, dosen.nama as anggota4, anggotalain from 
			(select idlapakhir, judul, sumberdana, tahun, read_more, programstudi, skim, bidangilmu, fakultas, ketua, anggota1, anggota2, dosen.nama as anggota3, idanggota4, anggotalain from 
				(select idlapakhir, judul, sumberdana, tahun, read_more, programstudi, skim, bidangilmu, fakultas, ketua, anggota1, dosen.nama as anggota2, idanggota3, idanggota4, anggotalain from 
					(select idlapakhir, judul, sumberdana, tahun, read_more, programstudi, skim, bidangilmu, fakultas, ketua, dosen.nama as anggota1, idanggota2, idanggota3, idanggota4, anggotalain from 
						(select idlapakhir, judul, sumberdana, tahun, read_more, programstudi, skim, bidangilmu, fakultas, dosen.nama as ketua, idanggota1, idanggota2, idanggota3, idanggota4, anggotalain from 
							(select idlapakhir, judul, sumberdana, tahun, read_more, programstudi, skimpenelitian.skim as skim, bidangilmu, fakultas, idketua, idanggota1, idanggota2, idanggota3, idanggota4, anggotalain from
								(select idlapakhir, judul, sumberdana, tahun, read_more, programstudi.programstudi as programstudi, idskimpenelitian, bidangilmu.bidangilmu as bidangilmu, fakultas.fakultas as fakultas, idketua, idanggota1, idanggota2, idanggota3, idanggota4, anggotalain from laporanakhir left join programstudi on laporanakhir.idprodi=programstudi.idprodi left join bidangilmu on laporanakhir.idbidilmu=bidangilmu.idbidilmu left join fakultas on laporanakhir.idfakultas=fakultas.idfakultas)
							as tprogramstudi left join skimpenelitian on tprogramstudi.idskimpenelitian=skimpenelitian.idskimpenelitian)
						as tketua left join dosen on tketua.idketua=dosen.iddosen) 
					as t1 left join dosen on t1.idanggota1=dosen.iddosen) 
				as t2 left join dosen on t2.idanggota2=dosen.iddosen) 
			as t3 left join dosen on t3.idanggota3=dosen.iddosen) 
		as t4 left join dosen on t4.idanggota4=dosen.iddosen order by idlapakhir desc');
		$data['user']=DB::table('user')
		->where('username','=',Session::get('username'))
		->where('iduser','=',Session::get('iduser'))
		->get();
		$thnsekarang=idate('Y');
		return View::make('chief.lakhir', $data)->with('thnsekarang', $thnsekarang);
	}
	public function lihatlaketua($idlapakhir){
		$data['laporanakhir'] = DB::select('select idlapakhir, judul, sumberdana, tahun, statusfile, namafileakhir, read_more, abstrak, akhiridprodi, programstudi, aidskimpenelitian, skim, akhiridbidilmu, bidangilmu, akhiridfakultas, fakultas, akhiridketua, ketua, aidanggota1, anggota1, aidanggota2, anggota2, aidanggota3, anggota3, aidanggota4, dosen.nama as anggota4, anggotalain from 
			(select idlapakhir, judul, sumberdana, tahun, statusfile, namafileakhir, read_more, abstrak, akhiridprodi, programstudi, aidskimpenelitian, skim, akhiridbidilmu, bidangilmu, akhiridfakultas, fakultas, akhiridketua, ketua, aidanggota1, anggota1, aidanggota2, anggota2, aidanggota3, dosen.nama as anggota3, aidanggota4, idanggota4, anggotalain from 
				(select idlapakhir, judul, sumberdana, tahun, statusfile, namafileakhir, read_more, abstrak, akhiridprodi, programstudi, aidskimpenelitian, skim, akhiridbidilmu, bidangilmu, akhiridfakultas, fakultas, akhiridketua, ketua, aidanggota1, anggota1, aidanggota2, dosen.nama as anggota2, aidanggota3, idanggota3, aidanggota4, idanggota4, anggotalain from 
					(select idlapakhir, judul, sumberdana, tahun, statusfile, namafileakhir, read_more, abstrak, akhiridprodi, programstudi, aidskimpenelitian, skim, akhiridbidilmu, bidangilmu, akhiridfakultas, fakultas, akhiridketua, ketua, aidanggota1, dosen.nama as anggota1, aidanggota2, idanggota2, aidanggota3, idanggota3, aidanggota4, idanggota4, anggotalain from 
						(select idlapakhir, judul, sumberdana, tahun, statusfile, namafileakhir, read_more, abstrak, akhiridprodi, programstudi, aidskimpenelitian, skim, akhiridbidilmu, bidangilmu, akhiridfakultas, fakultas, akhiridketua, dosen.nama as ketua, aidanggota1, idanggota1, aidanggota2, idanggota2, aidanggota3, idanggota3, aidanggota4, idanggota4, anggotalain from 
							(select idlapakhir, judul, sumberdana, tahun, statusfile, namafileakhir, read_more, abstrak, akhiridprodi, programstudi, aidskimpenelitian, skimpenelitian.skim as skim, akhiridbidilmu, bidangilmu, akhiridfakultas, fakultas, akhiridketua, idketua, aidanggota1, idanggota1, aidanggota2, idanggota2, aidanggota3, idanggota3, aidanggota4, idanggota4, anggotalain from
								(select idlapakhir, judul, sumberdana, tahun, statusfile, namafileakhir, read_more, abstrak, laporanakhir.idprodi as akhiridprodi, programstudi.programstudi as programstudi, laporanakhir.idskimpenelitian as aidskimpenelitian, idskimpenelitian, laporanakhir.idbidilmu as akhiridbidilmu, bidangilmu.bidangilmu as bidangilmu, laporanakhir.idfakultas as akhiridfakultas, fakultas.fakultas as fakultas, laporanakhir.idketua as akhiridketua, idketua, laporanakhir.idanggota1 as aidanggota1, idanggota1, laporanakhir.idanggota2 as aidanggota2, idanggota2, laporanakhir.idanggota3 as aidanggota3, idanggota3, laporanakhir.idanggota4 as aidanggota4, idanggota4, anggotalain from laporanakhir left join programstudi on laporanakhir.idprodi=programstudi.idprodi left join bidangilmu on laporanakhir.idbidilmu=bidangilmu.idbidilmu left join fakultas on laporanakhir.idfakultas=fakultas.idfakultas)
							as tprogramstudi left join skimpenelitian on tprogramstudi.idskimpenelitian=skimpenelitian.idskimpenelitian)
						as tketua left join dosen on tketua.idketua=dosen.iddosen) 
					as t1 left join dosen on t1.idanggota1=dosen.iddosen) 
				as t2 left join dosen on t2.idanggota2=dosen.iddosen) 
			as t3 left join dosen on t3.idanggota3=dosen.iddosen) 
		as t4 left join dosen on t4.idanggota4=dosen.iddosen where idlapakhir="'.$idlapakhir.'" limit 1');
		$thnsekarang=idate('Y');
		$data['user']=DB::table('user')
		->where('username','=',Session::get('username'))
		->where('iduser','=',Session::get('iduser'))
		->get();
		return View::make('chief.detaillakhir',$data)->with('thnsekarang', $thnsekarang);
	}
	public function puproposaldosen($idproposal){
		$data['statusinput'] = 'success';
		if(((Input::get('judul')) == '') || ((Input::get('sumberdana')) == '') || ((Input::get('idketua2')) == '') || ((Input::get('idketua2')) == '0')){
			$data['statusinput'] = 'failed';
			return Redirect::to('/lecturer_editproposal/'.$idproposal)->with('statusinput',$data['statusinput']);
		}
		elseif(((Input::get('judul')) != '') && ((Input::get('sumberdana')) != '') && ((Input::get('idketua2')) != '') && ((Input::get('idketua2')) != '0')){
			if (Input::hasFile('namafile'))
			{
				$nama_file=md5(time().rand()).'.'.Input::file('namafile')->getClientOriginalExtension();
				$destinationPath = app_path() . "/File_Proposal_Penelitian/";
				Input::file('namafile')->move($destinationPath, $nama_file);
				//update gambar
	   				DB::table('proposal')->where('idproposal', '=', $idproposal)->update(array(
						'namafileproposal'=>$nama_file
						));
			}
			//update tabel proposal
			DB::table('proposal')->where('idproposal','=',$idproposal)->update(array(
				'judul'=>Input::get('judul'),
				'sumberdana'=>Input::get('sumberdana'),
				'tahun'=>Input::get('tahun'),
				'statusfile'=>Input::get('statusfile'),
				'read_more'=>(strlen(Input::get('abstrak')) > 220) ?substr(Input::get('abstrak'), 0, 220) : Input::get('abstrak'),
				'abstrak'=>Input::get('abstrak'),
				'idprodi'=>Input::get('idprodi'),
				'idskimpenelitian'=>Input::get('idskimpenelitian'),
				'idbidilmu'=>Input::get('idbidilmu'),
				'idfakultas'=>Input::get('idfakultas'),
				'idketua'=>Input::get('idketua2'),
				'idanggota1'=>Input::get('idanggota1'),
				'idanggota2'=>Input::get('idanggota2'),
				'idanggota3'=>Input::get('idanggota3'),
				'idanggota4'=>Input::get('idanggota4'),
				'anggotalain'=>Input::get('anggotalain')
				));
			date_default_timezone_set('Asia/Jakarta');
			DB::table('history')->insert(array(
				'keterangan'=>'Ubah data proposal dengan ID '.$idproposal.'.',
				'tanggalwaktu'=>date('Y-m-d H:i:s'),
				'iduserhistory'=>Session::get('iddosen')
				));
		}
		return Redirect::to('/lecturerproposal')->with('statusinput',$data['statusinput']);
	}
	public function proses_hpdosen($idproposal){
		$data['proposal']=DB::table('proposal')->where('idproposal','=',$idproposal)->delete();
		date_default_timezone_set('Asia/Jakarta');
		DB::table('history')->insert(array(
			'keterangan'=>'Hapus data proposal dengan ID '.$idproposal.'.',
			'tanggalwaktu'=>date('Y-m-d H:i:s'),
			'iduserhistory'=>Session::get('iddosen')
			));
		return Redirect::to('/lecturerproposal');
	}
	public function ftproposaldosen(){
		$statusinput = 'success';
		if (Session::has('statusinput')){
			$statusinput = Session::get('statusinput');
			Session::forget('statusinput');
		}
		//queries the programstudi db table, orders by idprodi and lists all data in programstudi table
		$data['programstudi'] = DB::table('programstudi')
		->select('programstudi.*')
		->get();
		//queries the skimpenelitian db table, orders by idskimpenelitian and lists all data in skimpenelitian table
		$data['skimpenelitian'] = DB::table('skimpenelitian')
		->select('skimpenelitian.*')
		->get();
		//queries the bidangilmu db table, orders by idbidilmu and lists all data in bidangilmu table
		$data['bidangilmu'] = DB::table('bidangilmu')
		->select('bidangilmu.*')
		->get();
		//queries the fakultas db table, orders by idfakultas and lists all data in fakultas table
		$data['fakultas'] = DB::table('fakultas')
		->select('fakultas.*')
		->get();
		$data['dosen']=DB::table('dosen')
		->where('username','=',Session::get('username'))
		->where('iddosen','=',Session::get('iddosen'))
		->get();
		$data['statusinput'] = $statusinput;
		$thnsekarang=idate('Y');
		return View::make('lecturer.tambahproposal', $data)->with('thnsekarang', $thnsekarang);
	}
	public function halamanlkdosen(){
		$iddosen=Session::get('iddosen');
		$data['dosen']=DB::table('dosen')
		->where('username','=',Session::get('username'))
		->where('iddosen','=',$iddosen)
		->get();
		$data['laporankemajuan'] = DB::select("select idlapkemajuan, judul, sumberdana, tahun, read_more, programstudi, skim, bidangilmu, fakultas, ketua, anggota1, anggota2, anggota3, dosen.nama as anggota4, anggotalain from 
			(select idlapkemajuan, judul, sumberdana, tahun, read_more, programstudi, skim, bidangilmu, fakultas, ketua, anggota1, anggota2, dosen.nama as anggota3, idanggota4, anggotalain from 
				(select idlapkemajuan, judul, sumberdana, tahun, read_more, programstudi, skim, bidangilmu, fakultas, ketua, anggota1, dosen.nama as anggota2, idanggota3, idanggota4, anggotalain from 
					(select idlapkemajuan, judul, sumberdana, tahun, read_more, programstudi, skim, bidangilmu, fakultas, ketua, dosen.nama as anggota1, idanggota2, idanggota3, idanggota4, anggotalain from 
						(select idlapkemajuan, judul, sumberdana, tahun, read_more, programstudi, skim, bidangilmu, fakultas, dosen.nama as ketua, idanggota1, idanggota2, idanggota3, idanggota4, anggotalain from 
							(select idlapkemajuan, judul, sumberdana, tahun, read_more, programstudi, skimpenelitian.skim as skim, bidangilmu, fakultas, idketua, idanggota1, idanggota2, idanggota3, idanggota4, anggotalain from
								(select idlapkemajuan, judul, sumberdana, tahun, read_more, programstudi.programstudi as programstudi, idskimpenelitian, bidangilmu.bidangilmu as bidangilmu, fakultas.fakultas as fakultas, idketua, idanggota1, idanggota2, idanggota3, idanggota4, anggotalain from laporankemajuan left join programstudi on laporankemajuan.idprodi=programstudi.idprodi left join bidangilmu on laporankemajuan.idbidilmu=bidangilmu.idbidilmu left join fakultas on laporankemajuan.idfakultas=fakultas.idfakultas)
							as tprogramstudi left join skimpenelitian on tprogramstudi.idskimpenelitian=skimpenelitian.idskimpenelitian)
						as tketua left join dosen on tketua.idketua=dosen.iddosen where tketua.idketua='".$iddosen."' or tketua.idanggota1='".$iddosen."' or tketua.idanggota2='".$iddosen."' or tketua.idanggota3='".$iddosen."' or tketua.idanggota4='".$iddosen."') 
					as t1 left join dosen on t1.idanggota1=dosen.iddosen) 
				as t2 left join dosen on t2.idanggota2=dosen.iddosen)
			as t3 left join dosen on t3.idanggota3=dosen.iddosen) 
		as t4 left join dosen on t4.idanggota4=dosen.iddosen order by idlapkemajuan desc");
		$thnsekarang=idate('Y');
		return View::make('lecturer.lkemajuan', $data)->with('thnsekarang', $thnsekarang);
	}
	public function proses_hkdosen($idlapkemajuan){
		$data['laporankemajuan']=DB::table('laporankemajuan')->where('idlapkemajuan','=',$idlapkemajuan)->delete();
		date_default_timezone_set('Asia/Jakarta');
		DB::table('history')->insert(array(
			'keterangan'=>'Hapus data laporan kemajuan dengan ID '.$idlapkemajuan.'.',
			'tanggalwaktu'=>date('Y-m-d H:i:s'),
			'iduserhistory'=>Session::get('iddosen')
			));
		return Redirect::to('/lecturerprogress');
	}

	public function ubahlkdosen($idlapkemajuan){
		$statusinput = 'success';
		if (Session::has('statusinput')){
			$statusinput = Session::get('statusinput');
			Session::forget('statusinput');
		}
		$data['laporankemajuan'] = DB::select('select idlapkemajuan, judul, sumberdana, tahun, statusfile, namafilekemajuan, read_more, abstrak, kemajuanidprodi, programstudi, kidskimpenelitian, skim, kemajuanidbidilmu, bidangilmu, kemajuanidfakultas, fakultas, kemajuanidketua, ketua, kidanggota1, anggota1, kidanggota2, anggota2, kidanggota3, anggota3, kidanggota4, dosen.nama as anggota4, anggotalain from 
			(select idlapkemajuan, judul, sumberdana, tahun, statusfile, namafilekemajuan, read_more, abstrak, kemajuanidprodi, programstudi, kidskimpenelitian, skim, kemajuanidbidilmu, bidangilmu, kemajuanidfakultas, fakultas, kemajuanidketua, ketua, kidanggota1, anggota1, kidanggota2, anggota2, kidanggota3, dosen.nama as anggota3, kidanggota4, idanggota4, anggotalain from 
				(select idlapkemajuan, judul, sumberdana, tahun, statusfile, namafilekemajuan, read_more, abstrak, kemajuanidprodi, programstudi, kidskimpenelitian, skim, kemajuanidbidilmu, bidangilmu, kemajuanidfakultas, fakultas, kemajuanidketua, ketua, kidanggota1, anggota1, kidanggota2, dosen.nama as anggota2, kidanggota3, idanggota3, kidanggota4, idanggota4, anggotalain from 
					(select idlapkemajuan, judul, sumberdana, tahun, statusfile, namafilekemajuan, read_more, abstrak, kemajuanidprodi, programstudi, kidskimpenelitian, skim, kemajuanidbidilmu, bidangilmu, kemajuanidfakultas, fakultas, kemajuanidketua, ketua, kidanggota1, dosen.nama as anggota1, kidanggota2, idanggota2, kidanggota3, idanggota3, kidanggota4, idanggota4, anggotalain from 
						(select idlapkemajuan, judul, sumberdana, tahun, statusfile, namafilekemajuan, read_more, abstrak, kemajuanidprodi, programstudi, kidskimpenelitian, skim, kemajuanidbidilmu, bidangilmu, kemajuanidfakultas, fakultas, kemajuanidketua, dosen.nama as ketua, kidanggota1, idanggota1, kidanggota2, idanggota2, kidanggota3, idanggota3, kidanggota4, idanggota4, anggotalain from 
							(select idlapkemajuan, judul, sumberdana, tahun, statusfile, namafilekemajuan, read_more, abstrak, kemajuanidprodi, programstudi, kidskimpenelitian, skimpenelitian.skim as skim, kemajuanidbidilmu, bidangilmu, kemajuanidfakultas, fakultas, kemajuanidketua, idketua, kidanggota1, idanggota1, kidanggota2, idanggota2, kidanggota3, idanggota3, kidanggota4, idanggota4, anggotalain from
								(select idlapkemajuan, judul, sumberdana, tahun, statusfile, namafilekemajuan, read_more, abstrak, laporankemajuan.idprodi as kemajuanidprodi, programstudi.programstudi as programstudi, laporankemajuan.idskimpenelitian as kidskimpenelitian, idskimpenelitian, laporankemajuan.idbidilmu as kemajuanidbidilmu, bidangilmu.bidangilmu as bidangilmu, laporankemajuan.idfakultas as kemajuanidfakultas, fakultas.fakultas as fakultas, laporankemajuan.idketua as kemajuanidketua, idketua, laporankemajuan.idanggota1 as kidanggota1, idanggota1, laporankemajuan.idanggota2 as kidanggota2, idanggota2, laporankemajuan.idanggota3 as kidanggota3, idanggota3, laporankemajuan.idanggota4 as kidanggota4, idanggota4, anggotalain from laporankemajuan left join programstudi on laporankemajuan.idprodi=programstudi.idprodi left join bidangilmu on laporankemajuan.idbidilmu=bidangilmu.idbidilmu left join fakultas on laporankemajuan.idfakultas=fakultas.idfakultas)
							as tprogramstudi left join skimpenelitian on tprogramstudi.idskimpenelitian=skimpenelitian.idskimpenelitian)
						as tketua left join dosen on tketua.idketua=dosen.iddosen) 
					as t1 left join dosen on t1.idanggota1=dosen.iddosen) 
				as t2 left join dosen on t2.idanggota2=dosen.iddosen) 
			as t3 left join dosen on t3.idanggota3=dosen.iddosen) 
		as t4 left join dosen on t4.idanggota4=dosen.iddosen where idlapkemajuan="'.$idlapkemajuan.'" limit 1');
		//queries the programstudi db table, orders by idprodi and lists all data in programstudi table
		$data['programstudi'] = DB::table('programstudi')
		->select('programstudi.*')
		->get();
		//queries the skimpenelitian db table, orders by idskimpenelitian and lists all data in skimpenelitian table
		$data['skimpenelitian'] = DB::table('skimpenelitian')
		->select('skimpenelitian.*')
		->get();
		//queries the bidangilmu db table, orders by idbidilmu and lists all data in bidangilmu table
		$data['bidangilmu'] = DB::table('bidangilmu')
		->select('bidangilmu.*')
		->get();
		//queries the fakultas db table, orders by idfakultas and lists all data in fakultas table
		$data['fakultas'] = DB::table('fakultas')
		->select('fakultas.*')
		->get();
		$iddosen=Session::get('iddosen');
		$data['dosen']=DB::table('dosen')
		->where('username','=',Session::get('username'))
		->where('iddosen','=',$iddosen)
		->get();
		$thnsekarang=idate('Y');
		$data['statusinput'] = $statusinput;
		return View::make('lecturer.ubahlkemajuan',$data)->with('thnsekarang', $thnsekarang);
	}

	public function proses_ukdosen($idlapkemajuan){
		$data['statusinput'] = 'success';
		if(((Input::get('judul')) == '') || ((Input::get('sumberdana')) == '') || ((Input::get('idketua2')) == '') || ((Input::get('idketua2')) == '0')){
			$data['statusinput'] = 'failed';
			return Redirect::to('/lecturer_editprogress/'.$idlapkemajuan)->with('statusinput',$data['statusinput']);
		}
		elseif(((Input::get('judul')) != '') && ((Input::get('sumberdana')) != '') && ((Input::get('idketua2')) != '') && ((Input::get('idketua2')) != '0')){
			if (Input::hasFile('namafile'))
			{
				$nama_file=md5(time().rand()).'.'.Input::file('namafile')->getClientOriginalExtension();
				$destinationPath = app_path() . "/File_Kemajuan_Penelitian/";
				Input::file('namafile')->move($destinationPath, $nama_file);
				//update gambar
	   				DB::table('laporankemajuan')->where('idlapkemajuan', '=', $idlapkemajuan)->update(array(
						'namafilekemajuan'=>$nama_file
						));
			}
			//update tabel laporankemajuan
			DB::table('laporankemajuan')->where('idlapkemajuan','=',$idlapkemajuan)->update(array(
				'judul'=>Input::get('judul'),
				'sumberdana'=>Input::get('sumberdana'),
				'tahun'=>Input::get('tahun'),
				'statusfile'=>Input::get('statusfile'),
				'read_more'=>(strlen(Input::get('abstrak')) > 220) ?substr(Input::get('abstrak'), 0, 220) : Input::get('abstrak'),
				'abstrak'=>Input::get('abstrak'),
				'idprodi'=>Input::get('idprodi'),
				'idskimpenelitian'=>Input::get('idskimpenelitian'),
				'idbidilmu'=>Input::get('idbidilmu'),
				'idfakultas'=>Input::get('idfakultas'),
				'idketua'=>Input::get('idketua2'),
				'idanggota1'=>Input::get('idanggota1'),
				'idanggota2'=>Input::get('idanggota2'),
				'idanggota3'=>Input::get('idanggota3'),
				'idanggota4'=>Input::get('idanggota4'),
				'anggotalain'=>Input::get('anggotalain')
				));
			date_default_timezone_set('Asia/Jakarta');
			DB::table('history')->insert(array(
				'keterangan'=>'Ubah data laporan kemajuan dengan ID '.$idlapkemajuan.'.',
				'tanggalwaktu'=>date('Y-m-d H:i:s'),
				'iduserhistory'=>Session::get('iddosen')
				));
		}
		return Redirect::to('/lecturerprogress')->with('statusinput',$data['statusinput']);
	}

	public function ftkemajuandosen(){
		$statusinput = 'success';
		if (Session::has('statusinput')){
			$statusinput = Session::get('statusinput');
			Session::forget('statusinput');
		}
		//queries the programstudi db table, orders by idprodi and lists all data in programstudi table
		$data['programstudi'] = DB::table('programstudi')
		->select('programstudi.*')
		->get();
		//queries the skimpenelitian db table, orders by idskimpenelitian and lists all data in skimpenelitian table
		$data['skimpenelitian'] = DB::table('skimpenelitian')
		->select('skimpenelitian.*')
		->get();
		//queries the bidangilmu db table, orders by idbidilmu and lists all data in bidangilmu table
		$data['bidangilmu'] = DB::table('bidangilmu')
		->select('bidangilmu.*')
		->get();
		//queries the fakultas db table, orders by idfakultas and lists all data in fakultas table
		$data['fakultas'] = DB::table('fakultas')
		->select('fakultas.*')
		->get();
		$data['dosen']=DB::table('dosen')
		->where('username','=',Session::get('username'))
		->where('iddosen','=',Session::get('iddosen'))
		->get();
		$thnsekarang=idate('Y');
		$data['statusinput'] = $statusinput;
		return View::make('lecturer.tambahlkemajuan', $data)->with('thnsekarang', $thnsekarang);
	}

	public function ptproposaldosen(){
		$nama_file='';
		$data['statusinput'] = 'success';
		if(((Input::get('judul')) == '') || ((Input::get('sumberdana')) == '') || ((Input::get('idketua2')) == '') || ((Input::get('idketua2')) == '0')){
			$data['statusinput'] = 'failed';
			return Redirect::to('/lecturer_addproposal')->with('statusinput',$data['statusinput']);
		}
		elseif(((Input::get('judul')) != '') && ((Input::get('sumberdana')) != '') && ((Input::get('idketua2')) != '') && ((Input::get('idketua2')) != '0')){
			if (Input::hasFile('namafile'))
			{
				$nama_file=md5(time().rand()).'.'.Input::file('namafile')->getClientOriginalExtension();
				$destinationPath = app_path() . "/File_Proposal_Penelitian/";
				Input::file('namafile')->move($destinationPath, $nama_file);
			}
			DB::table('proposal')->insert(array(
				'judul'=>Input::get('judul'),
				'sumberdana'=>Input::get('sumberdana'),
				'tahun'=>Input::get('tahun'),
				'statusfile'=>Input::get('statusfile'),
				'namafileproposal'=>$nama_file,
				'read_more'=>(strlen(Input::get('abstrak')) > 220) ?substr(Input::get('abstrak'), 0, 220) : Input::get('abstrak'),
				'abstrak'=>Input::get('abstrak'),
				'idprodi'=>Input::get('idprodi'),
				'idskimpenelitian'=>Input::get('idskimpenelitian'),
				'idbidilmu'=>Input::get('idbidilmu'),
				'idfakultas'=>Input::get('idfakultas'),
				'idketua'=>Input::get('idketua2'),
				'idanggota1'=>Input::get('idanggota1'),
				'idanggota2'=>Input::get('idanggota2'),
				'idanggota3'=>Input::get('idanggota3'),
				'idanggota4'=>Input::get('idanggota4'),
				'anggotalain'=>Input::get('anggotalain')
				));
			date_default_timezone_set('Asia/Jakarta');
			DB::table('history')->insert(array(
				'keterangan'=>'Tambah data proposal',
				'tanggalwaktu'=>date('Y-m-d H:i:s'),
				'iduserhistory'=>Session::get('iddosen')
				));
			$data['statusinput'] = 'Sukses';
		}
		return Redirect::to('/lecturer_addproposal')->with('statusinput',$data['statusinput']);
	}

	public function ptkemajuandosen(){
		$nama_file='';
		$data['statusinput'] = 'success';
		if(((Input::get('judul')) == '') || ((Input::get('sumberdana')) == '') || ((Input::get('idketua2')) == '') || ((Input::get('idketua2')) == '0')){
			$data['statusinput'] = 'failed';
			return Redirect::to('/lecturer_addprogress')->with('statusinput',$data['statusinput']);
		}
		elseif(((Input::get('judul')) != '') && ((Input::get('sumberdana')) != '') && ((Input::get('idketua2')) != '') && ((Input::get('idketua2')) != '0')){
			if (Input::hasFile('namafile'))
			{
				$nama_file=md5(time().rand()).'.'.Input::file('namafile')->getClientOriginalExtension();
				$destinationPath = app_path() . "/File_Kemajuan_Penelitian/";
				Input::file('namafile')->move($destinationPath, $nama_file);
			}
			DB::table('laporankemajuan')->insert(array(
				'judul'=>Input::get('judul'),
				'sumberdana'=>Input::get('sumberdana'),
				'tahun'=>Input::get('tahun'),
				'statusfile'=>Input::get('statusfile'),
				'namafilekemajuan'=>$nama_file,
				'read_more'=>(strlen(Input::get('abstrak')) > 220) ?substr(Input::get('abstrak'), 0, 220) : Input::get('abstrak'),
				'abstrak'=>Input::get('abstrak'),
				'idprodi'=>Input::get('idprodi'),
				'idskimpenelitian'=>Input::get('idskimpenelitian'),
				'idbidilmu'=>Input::get('idbidilmu'),
				'idfakultas'=>Input::get('idfakultas'),
				'idketua'=>Input::get('idketua2'),
				'idanggota1'=>Input::get('idanggota1'),
				'idanggota2'=>Input::get('idanggota2'),
				'idanggota3'=>Input::get('idanggota3'),
				'idanggota4'=>Input::get('idanggota4'),
				'anggotalain'=>Input::get('anggotalain')
				));
			date_default_timezone_set('Asia/Jakarta');
			DB::table('history')->insert(array(
				'keterangan'=>'Tambah data laporan kemajuan.',
				'tanggalwaktu'=>date('Y-m-d H:i:s'),
				'iduserhistory'=>Session::get('iddosen')
				));
		}
		return Redirect::to('/lecturer_addprogress')->with('statusinput',$data['statusinput']);
	}

	public function halamanladosen(){
		$iddosen=Session::get('iddosen');
		$data['laporanakhir'] = DB::select('select idlapakhir, judul, sumberdana, tahun, read_more, programstudi, skim, bidangilmu, fakultas, ketua, anggota1, anggota2, anggota3, dosen.nama as anggota4, anggotalain from 
			(select idlapakhir, judul, sumberdana, tahun, read_more, programstudi, skim, bidangilmu, fakultas, ketua, anggota1, anggota2, dosen.nama as anggota3, idanggota4, anggotalain from 
				(select idlapakhir, judul, sumberdana, tahun, read_more, programstudi, skim, bidangilmu, fakultas, ketua, anggota1, dosen.nama as anggota2, idanggota3, idanggota4, anggotalain from 
					(select idlapakhir, judul, sumberdana, tahun, read_more, programstudi, skim, bidangilmu, fakultas, ketua, dosen.nama as anggota1, idanggota2, idanggota3, idanggota4, anggotalain from 
						(select idlapakhir, judul, sumberdana, tahun, read_more, programstudi, skim, bidangilmu, fakultas, dosen.nama as ketua, idanggota1, idanggota2, idanggota3, idanggota4, anggotalain from 
							(select idlapakhir, judul, sumberdana, tahun, read_more, programstudi, skimpenelitian.skim as skim, bidangilmu, fakultas, idketua, idanggota1, idanggota2, idanggota3, idanggota4, anggotalain from
								(select idlapakhir, judul, sumberdana, tahun, read_more, programstudi.programstudi as programstudi, idskimpenelitian, bidangilmu.bidangilmu as bidangilmu, fakultas.fakultas as fakultas, idketua, idanggota1, idanggota2, idanggota3, idanggota4, anggotalain from laporanakhir left join programstudi on laporanakhir.idprodi=programstudi.idprodi left join bidangilmu on laporanakhir.idbidilmu=bidangilmu.idbidilmu left join fakultas on laporanakhir.idfakultas=fakultas.idfakultas)
							as tprogramstudi left join skimpenelitian on tprogramstudi.idskimpenelitian=skimpenelitian.idskimpenelitian)
						as tketua left join dosen on tketua.idketua=dosen.iddosen where tketua.idketua="'.$iddosen.'" or tketua.idanggota1="'.$iddosen.'" or tketua.idanggota2="'.$iddosen.'" or tketua.idanggota3="'.$iddosen.'" or tketua.idanggota4="'.$iddosen.'") 
					as t1 left join dosen on t1.idanggota1=dosen.iddosen) 
				as t2 left join dosen on t2.idanggota2=dosen.iddosen) 
			as t3 left join dosen on t3.idanggota3=dosen.iddosen) 
		as t4 left join dosen on t4.idanggota4=dosen.iddosen order by idlapakhir desc');
		$data['dosen']=DB::table('dosen')
		->where('username','=',Session::get('username'))
		->where('iddosen','=',Session::get('iddosen'))
		->get();
		$thnsekarang=idate('Y');
		return View::make('lecturer.lakhir', $data)->with('thnsekarang', $thnsekarang);
	}
	
	public function proses_hadosen($idlapakhir){
		$data['laporanakhir']=DB::table('laporanakhir')->where('idlapakhir','=',$idlapakhir)->delete();
		date_default_timezone_set('Asia/Jakarta');
		DB::table('history')->insert(array(
			'keterangan'=>'Hapus data laporan akhir dengan ID '.$idlapakhir.'.',
			'tanggalwaktu'=>date('Y-m-d H:i:s'),
			'iduserhistory'=>Session::get('iddosen')
			));
		return Redirect::to('/lecturerfinal');
	}

	public function ubahladosen($idlapakhir){
		$statusinput = 'success';
		if (Session::has('statusinput')){
			$statusinput = Session::get('statusinput');
			Session::forget('statusinput');
		}
		$data['laporanakhir'] = DB::select('select idlapakhir, judul, sumberdana, tahun, statusfile, namafileakhir, read_more, abstrak, akhiridprodi, programstudi, aidskimpenelitian, skim, akhiridbidilmu, bidangilmu, akhiridfakultas, fakultas, akhiridketua, ketua, aidanggota1, anggota1, aidanggota2, anggota2, aidanggota3, anggota3, aidanggota4, dosen.nama as anggota4, anggotalain from 
			(select idlapakhir, judul, sumberdana, tahun, statusfile, namafileakhir, read_more, abstrak, akhiridprodi, programstudi, aidskimpenelitian, skim, akhiridbidilmu, bidangilmu, akhiridfakultas, fakultas, akhiridketua, ketua, aidanggota1, anggota1, aidanggota2, anggota2, aidanggota3, dosen.nama as anggota3, aidanggota4, idanggota4, anggotalain from 
				(select idlapakhir, judul, sumberdana, tahun, statusfile, namafileakhir, read_more, abstrak, akhiridprodi, programstudi, aidskimpenelitian, skim, akhiridbidilmu, bidangilmu, akhiridfakultas, fakultas, akhiridketua, ketua, aidanggota1, anggota1, aidanggota2, dosen.nama as anggota2, aidanggota3, idanggota3, aidanggota4, idanggota4, anggotalain from 
					(select idlapakhir, judul, sumberdana, tahun, statusfile, namafileakhir, read_more, abstrak, akhiridprodi, programstudi, aidskimpenelitian, skim, akhiridbidilmu, bidangilmu, akhiridfakultas, fakultas, akhiridketua, ketua, aidanggota1, dosen.nama as anggota1, aidanggota2, idanggota2, aidanggota3, idanggota3, aidanggota4, idanggota4, anggotalain from 
						(select idlapakhir, judul, sumberdana, tahun, statusfile, namafileakhir, read_more, abstrak, akhiridprodi, programstudi, aidskimpenelitian, skim, akhiridbidilmu, bidangilmu, akhiridfakultas, fakultas, akhiridketua, dosen.nama as ketua, aidanggota1, idanggota1, aidanggota2, idanggota2, aidanggota3, idanggota3, aidanggota4, idanggota4, anggotalain from 
							(select idlapakhir, judul, sumberdana, tahun, statusfile, namafileakhir, read_more, abstrak, akhiridprodi, programstudi, aidskimpenelitian, skimpenelitian.skim as skim, akhiridbidilmu, bidangilmu, akhiridfakultas, fakultas, akhiridketua, idketua, aidanggota1, idanggota1, aidanggota2, idanggota2, aidanggota3, idanggota3, aidanggota4, idanggota4, anggotalain from
								(select idlapakhir, judul, sumberdana, tahun, statusfile, namafileakhir, read_more, abstrak, laporanakhir.idprodi as akhiridprodi, programstudi.programstudi as programstudi, laporanakhir.idskimpenelitian as aidskimpenelitian, idskimpenelitian, laporanakhir.idbidilmu as akhiridbidilmu, bidangilmu.bidangilmu as bidangilmu, laporanakhir.idfakultas as akhiridfakultas, fakultas.fakultas as fakultas, laporanakhir.idketua as akhiridketua, idketua, laporanakhir.idanggota1 as aidanggota1, idanggota1, laporanakhir.idanggota2 as aidanggota2, idanggota2, laporanakhir.idanggota3 as aidanggota3, idanggota3, laporanakhir.idanggota4 as aidanggota4, idanggota4, anggotalain from laporanakhir left join programstudi on laporanakhir.idprodi=programstudi.idprodi left join bidangilmu on laporanakhir.idbidilmu=bidangilmu.idbidilmu left join fakultas on laporanakhir.idfakultas=fakultas.idfakultas)
							as tprogramstudi left join skimpenelitian on tprogramstudi.idskimpenelitian=skimpenelitian.idskimpenelitian)
						as tketua left join dosen on tketua.idketua=dosen.iddosen) 
					as t1 left join dosen on t1.idanggota1=dosen.iddosen) 
				as t2 left join dosen on t2.idanggota2=dosen.iddosen) 
			as t3 left join dosen on t3.idanggota3=dosen.iddosen) 
		as t4 left join dosen on t4.idanggota4=dosen.iddosen where idlapakhir="'.$idlapakhir.'" limit 1');
		//queries the programstudi db table, orders by idprodi and lists all data in programstudi table
		$data['programstudi'] = DB::table('programstudi')
		->select('programstudi.*')
		->get();
		//queries the skimpenelitian db table, orders by idskimpenelitian and lists all data in skimpenelitian table
		$data['skimpenelitian'] = DB::table('skimpenelitian')
		->select('skimpenelitian.*')
		->get();
		//queries the bidangilmu db table, orders by idbidilmu and lists all data in bidangilmu table
		$data['bidangilmu'] = DB::table('bidangilmu')
		->select('bidangilmu.*')
		->get();
		//queries the fakultas db table, orders by idfakultas and lists all data in fakultas table
		$data['fakultas'] = DB::table('fakultas')
		->select('fakultas.*')
		->get();
		$iddosen=Session::get('iddosen');
		$data['dosen']=DB::table('dosen')
		->where('username','=',Session::get('username'))
		->where('iddosen','=',$iddosen)
		->get();
		$thnsekarang=idate('Y');
		$data['statusinput'] = $statusinput;
		return View::make('lecturer.ubahlakhir',$data)->with('thnsekarang', $thnsekarang);
	}

	public function proses_uadosen($idlapakhir){
		$data['statusinput'] = 'success';
		if(((Input::get('judul')) == '') || ((Input::get('sumberdana')) == '') || ((Input::get('idketua2')) == '') || ((Input::get('idketua2')) == '0')){
			$data['statusinput'] = 'failed';
			return Redirect::to('/lecturer_editfinal/'.$idlapakhir)->with('statusinput',$data['statusinput']);
		}
		elseif(((Input::get('judul')) != '') && ((Input::get('sumberdana')) != '') && ((Input::get('idketua2')) != '') && ((Input::get('idketua2')) != '0')){
			if (Input::hasFile('namafile'))
			{
				$nama_file=md5(time().rand()).'.'.Input::file('namafile')->getClientOriginalExtension();
				$destinationPath = app_path() . "/File_Akhir_Penelitian/";
				Input::file('namafile')->move($destinationPath, $nama_file);
				//update gambar
	   				DB::table('laporanakhir')->where('idlapakhir', '=', $idlapakhir)->update(array(
						'namafileakhir'=>$nama_file
						));
			}
			//update tabel laporanakhir
			DB::table('laporanakhir')->where('idlapakhir','=',$idlapakhir)->update(array(
				'judul'=>Input::get('judul'),
				'sumberdana'=>Input::get('sumberdana'),
				'tahun'=>Input::get('tahun'),
				'statusfile'=>Input::get('statusfile'),
				'read_more'=>(strlen(Input::get('abstrak')) > 220) ?substr(Input::get('abstrak'), 0, 220) : Input::get('abstrak'),
				'abstrak'=>Input::get('abstrak'),
				'idprodi'=>Input::get('idprodi'),
				'idskimpenelitian'=>Input::get('idskimpenelitian'),
				'idbidilmu'=>Input::get('idbidilmu'),
				'idfakultas'=>Input::get('idfakultas'),
				'idketua'=>Input::get('idketua2'),
				'idanggota1'=>Input::get('idanggota1'),
				'idanggota2'=>Input::get('idanggota2'),
				'idanggota3'=>Input::get('idanggota3'),
				'idanggota4'=>Input::get('idanggota4'),
				'anggotalain'=>Input::get('anggotalain')
				));
			date_default_timezone_set('Asia/Jakarta');
			DB::table('history')->insert(array(
				'keterangan'=>'Ubah data laporan akhir dengan ID '.$idlapakhir.'.',
				'tanggalwaktu'=>date('Y-m-d H:i:s'),
				'iduserhistory'=>Session::get('iddosen')
				));
		}
		return Redirect::to('/lecturerfinal')->with('statusinput',$data['statusinput']);
	}
	public function ftakhirdosen(){
		$statusinput = 'success';
		if (Session::has('statusinput')){
			$statusinput = Session::get('statusinput');
			Session::forget('statusinput');
		}
		//queries the programstudi db table, orders by idprodi and lists all data in programstudi table
		$data['programstudi'] = DB::table('programstudi')
		->select('programstudi.*')
		->get();
		//queries the skimpenelitian db table, orders by idskimpenelitian and lists all data in skimpenelitian table
		$data['skimpenelitian'] = DB::table('skimpenelitian')
		->select('skimpenelitian.*')
		->get();
		//queries the bidangilmu db table, orders by idbidilmu and lists all data in bidangilmu table
		$data['bidangilmu'] = DB::table('bidangilmu')
		->select('bidangilmu.*')
		->get();
		//queries the fakultas db table, orders by idfakultas and lists all data in fakultas table
		$data['fakultas'] = DB::table('fakultas')
		->select('fakultas.*')
		->get();
		$data['dosen']=DB::table('dosen')
		->where('username','=',Session::get('username'))
		->where('iddosen','=',Session::get('iddosen'))
		->get();
		$thnsekarang=idate('Y');
		$data['statusinput'] = $statusinput;
		return View::make('lecturer.tambahlakhir', $data)->with('thnsekarang', $thnsekarang);
	}

	public function ptakhirdosen(){
		$nama_file='';
		$data['statusinput'] = 'success';
		if(((Input::get('judul')) == '') || ((Input::get('sumberdana')) == '') || ((Input::get('idketua2')) == '') || ((Input::get('idketua2')) == '0')){
			$data['statusinput'] = 'failed';
			return Redirect::to('/lecturer_addfinal')->with('statusinput',$data['statusinput']);
		}
		elseif(((Input::get('judul')) != '') && ((Input::get('sumberdana')) != '') && ((Input::get('idketua2')) != '') && ((Input::get('idketua2')) != '0')){
			if (Input::hasFile('namafile'))
			{
				$nama_file=md5(time().rand()).'.'.Input::file('namafile')->getClientOriginalExtension();
				$destinationPath = app_path() . "/File_Akhir_Penelitian/";
				Input::file('namafile')->move($destinationPath, $nama_file);
			}
			DB::table('laporanakhir')->insert(array(
				'judul'=>Input::get('judul'),
				'sumberdana'=>Input::get('sumberdana'),
				'tahun'=>Input::get('tahun'),
				'statusfile'=>Input::get('statusfile'),
				'namafileakhir'=>$nama_file,
				'read_more'=>(strlen(Input::get('abstrak')) > 220) ?substr(Input::get('abstrak'), 0, 220) : Input::get('abstrak'),
				'abstrak'=>Input::get('abstrak'),
				'idprodi'=>Input::get('idprodi'),
				'idskimpenelitian'=>Input::get('idskimpenelitian'),
				'idbidilmu'=>Input::get('idbidilmu'),
				'idfakultas'=>Input::get('idfakultas'),
				'idketua'=>Input::get('idketua2'),
				'idanggota1'=>Input::get('idanggota1'),
				'idanggota2'=>Input::get('idanggota2'),
				'idanggota3'=>Input::get('idanggota3'),
				'idanggota4'=>Input::get('idanggota4'),
				'anggotalain'=>Input::get('anggotalain')
				));
			date_default_timezone_set('Asia/Jakarta');
			DB::table('history')->insert(array(
				'keterangan'=>'Tambah data laporan akhir.',
				'tanggalwaktu'=>date('Y-m-d H:i:s'),
				'iduserhistory'=>Session::get('iddosen')
				));
		}
		return Redirect::to('/lecturer_addfinal')->with('statusinput',$data['statusinput']);
	}
	
	public function lapadmin(){
		$data['user']=DB::table('user')
		->where('username','=',Session::get('username'))
		->where('iduser','=',Session::get('iduser'))
		->get();
		$data['skimpenelitian'] = DB::table('skimpenelitian')->get();
		$status = 'success';
		if (Session::has('status')){
			$status=Session::get('status');
			Session::forget('status');
		}
		$data['status']=$status;
		$data['laporanakhir'] = DB::table('laporanakhir')->distinct()->select('laporanakhir.tahun')->get();
		$thnsekarang=idate('Y');
		return View::make('admin.laporanaktifitaspenelitian', $data)->with('thnsekarang', $thnsekarang);
	}
	public function lihatlapadmin($tahun,$idskimpenelitian){
		$data['user']=DB::table('user')
		->where('username','=',Session::get('username'))
		->where('iduser','=',Session::get('iduser'))
		->get();
		$data['skimpenelitian'] = DB::table('skimpenelitian')->get();
		$laporanakhir = DB::table('laporanakhir')
			->join('skimpenelitian','laporanakhir.idskimpenelitian','=','skimpenelitian.idskimpenelitian')
			->join('fakultas','laporanakhir.idfakultas','=','fakultas.idfakultas')
			->where('laporanakhir.tahun', '=', $tahun)
			->where('laporanakhir.idskimpenelitian', '=', $idskimpenelitian)
            ->select('laporanakhir.idfakultas', DB::raw('count(*) as total'),'fakultas.fakultas as fakultas')
            ->groupBy('laporanakhir.idfakultas')
            ->lists('total','fakultas');
        $data['skimpenelitianpilihan'] = DB::table('skimpenelitian')
		->where('idskimpenelitian', '=', $idskimpenelitian)
		->get();
		$status = 'success';
		if (Session::has('status')){
			$status=Session::get('status');
			Session::forget('status');
		}
		$data['laporanakhir2'] = DB::table('laporanakhir')->distinct()->select('laporanakhir.tahun')->get();
		$thnsekarang=idate('Y');
		if(!empty($laporanakhir)){
			//buat data untuk ditampilkan ke highchart
			$datalaporanakhir='[';
			$koma = '';
			foreach($laporanakhir as $key => $item){
				if(isset($laporanakhir[$key+1])) $koma=",";
				$datalaporanakhir.="{name: '".$key."', y: ".$item."}".","."";
				}
				$datalaporanakhir.=']';
				$data['datalaporanakhir2'] = $datalaporanakhir;
			$data['status']=$status;
			return View::make('admin.lihatlap', $data)->with('status',$data['status'])->with('tahun2',$tahun)->with('idskimpenelitian2',$idskimpenelitian)->with('listla',$laporanakhir)->with('thnsekarang', $thnsekarang);
		}
		else{
			$data['status']='failed';
			return Redirect::to('/admin_researchact')->with('status', $data['status']);
		}
	}
	public function downloadlapadmin($tahun2,$idskimpenelitian2){
		$laporanakhir = DB::table('laporanakhir')
			->join('skimpenelitian','laporanakhir.idskimpenelitian','=','skimpenelitian.idskimpenelitian')
			->join('fakultas','laporanakhir.idfakultas','=','fakultas.idfakultas')
			->where('laporanakhir.tahun', '=', $tahun2)
			->where('laporanakhir.idskimpenelitian', '=', $idskimpenelitian2)
            ->select('laporanakhir.idfakultas', DB::raw('count(*) as total'),'fakultas.fakultas as fakultas')
            ->groupBy('laporanakhir.idfakultas')
            ->lists('total','fakultas');
        $data['skimpenelitianpilihan'] = DB::table('skimpenelitian')
		->where('idskimpenelitian', '=', $idskimpenelitian2)
		->get();
		//buat data untuk ditampilkan ke highchart
		$datalaporanakhir='[';
		$koma = '';
		foreach($laporanakhir as $key => $item){
			if(isset($laporanakhir[$key+1])) $koma=',';
			$datalaporanakhir.='{name: "'.$key.'", y: '.$item.'}'.$koma;
		}
		$datalaporanakhir.=']';
		$data['datalaporanakhir2'] = $datalaporanakhir;
		// mengarahkan view pada file lap.blade.php di view/
		$pdf = PDF::loadView('admin.lap', $data, compact('laporanakhir','tahun2'));
		return $pdf->download('lap'.$tahun2.'_'.$idskimpenelitian2.'.pdf');
	}

	public function contact(){
		$thnsekarang=idate('Y');
		return View::make('user.contact')->with('thnsekarang',$thnsekarang);
	}

	public function send(){
		$usernama = Input::get('nama');
		$usermail = Input::get('email');
		$saran  = Input::get('msg');
		DB::table('saran')->insert(array(
				'nama'=>$usernama,
				'email'=>$usermail,
				'saran'=>$saran
				));
		if (Session::has('message')) {
			$data['message'] = Session::get('message');
			Session::forget('message');
		}
		return Redirect::to('/contact')->with('message','Saran Anda sudah kami terima, terima kasih');
	}
}