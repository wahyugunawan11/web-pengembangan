<?php

class fakultasController extends BaseController{
	public function home(){
		return View::make('user.home');
	}
	public function login(){
		$status = 'success';
		if (Session::has('status')){
			$status=Session::get('status');
			Session::forget('status');
		}
		$data['status']=$status;
		return View::make('layouts.loginlayout', $data);
	}
	public function proseslogin(){
		$jml=DB::table('user')->where('username','=',Input::get('user'))->where('password','=',md5(Input::get('pass')))->count();
		$status='success';
		if (Session::has('status')){
			$status=Session::get('status');
			Session::forget('status');
		}
		if($jml==1){
			$user=DB::table('user')->where('username','=',Input::get('user'))->where('password','=',md5(Input::get('pass')))->first();
			Session::put('Sukses Login','1');
			Session::put('iduser',$user->iduser);
			Session::put('username',$user->username);
			Session::put('status',$user->status);
			$data['status']=$status;
			return Redirect::to('administrator/adminhome');
		}
		else{
			$status='failed';
		}
		return Redirect::to('/login')->with('status',$status);
	}
	public function adminhome(){
		/*$data['user']=DB::table('user')
		->where('status','=',Session::get('status'))
		->where('iduser','=',Session::get('iduser'))
		->get();*/
		return View::make('admin.adminhome');
	}
	public function adminfield(){
		$data['bidang'] = DB::table('bidangilmu')->get();
		return View::make('admin.bidang', $data);
	}
	public function adminafpage(){
		return View::make('admin.tambahbidang');
	}
	public function tambahbidilmu(){
		DB::table('bidangilmu')->insert(array(
			'bidangilmu'=>Input::get('bidangilmu')
			));
		return Redirect::to('/adminfield')->with('message','Data masuk');
	}
	public function ubah($idbidilmu){
		$data['bidangilmu']=DB::table('bidangilmu')->where('idbidilmu','=',$idbidilmu)->first();
		return View::make('admin.ubahbidang',$data);
	}
	public function ubahbidilmu($idbidilmu){
		DB::table('bidangilmu')->where('idbidilmu','=',$idbidilmu)->update(array(
			'bidangilmu'=>Input::get('bidangilmu')
			));
		return Redirect::to('/adminfield');
	}
	public function hapus($idbidilmu){
		$data['bidangilmu']=DB::table('bidangilmu')->where('idbidilmu','=',$idbidilmu)->delete();
		return Redirect::to('/adminfield');
	}
	public function halamanfakultas(){
		$data['fakultas'] = DB::table('fakultas')->get();
		return View::make('admin.fakultas', $data);
	}
	public function formtambahfakultas(){
		return View::make('admin.tambahfakultas');
	}
	public function tambahfakultas(){
		DB::table('fakultas')->insert(array(
			'kode'=>Input::get('kode'),
			'fakultas'=>Input::get('fakultas')
			));
		return Redirect::to('/adminfaculty')->with('message','Data masuk');
	}
	public function ubahfakultas($idfakultas){
		$data['fakultas']=DB::table('fakultas')->where('idfakultas','=',$idfakultas)->first();
		return View::make('admin.ubahfakultas',$data);
	}
	public function proses_ubahfakultas($idfakultas){
		DB::table('fakultas')->where('idfakultas','=',$idfakultas)->update(array(
			'kode'=>Input::get('kode'),
			'fakultas'=>Input::get('fakultas')
			));
		return Redirect::to('/adminfaculty');
	}
	public function hapusfakultas($idfakultas){
		$data['fakultas']=DB::table('fakultas')->where('idfakultas','=',$idfakultas)->delete();
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
		->get();
		return View::make('admin.dosen', $data);
	}
	public function formtambahdosen(){
		//queries the fakultas db table, orders by idfakultas and lists fakultas
		$fakultas_optons = DB::table('fakultas')->orderBy('idfakultas', 'asc')->lists('fakultas');
		return View::make('admin.tambahdosen', array('fakultas_optons' => $fakultas_optons));
	}
}