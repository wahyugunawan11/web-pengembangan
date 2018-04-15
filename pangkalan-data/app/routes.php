<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return Redirect::to('/home');
});
Route::get('/home',array('uses'=>'lemlitpdController@home'));
Route::get('/login',array('uses'=>'lemlitpdController@login'));
Route::post('/login',array('uses'=>'lemlitpdController@proseslogin'));
Route::get('/adminhome',array('uses'=>'lemlitpdController@adminhome'));
Route::get('/adminfield',array('uses'=>'lemlitpdController@adminfield'));
Route::get('/admin_addfield',array('uses'=>'lemlitpdController@adminafpage'));
Route::post('/proses_tambahbidilmu',array('uses'=>'lemlitpdController@tambahbidilmu'));
Route::get('/admin_editfield/{idbidilmu}',array('uses'=>'lemlitpdController@ubah'));
Route::get('/admin_editfile/{id_berkas}',array('uses'=>'adminController@ubahberkas'));
Route::post('/proses_ubahbidilmu/{idbidilmu}',array('uses'=>'lemlitpdController@ubahbidilmu'));
Route::get('/proses_hapus/{idbidilmu}',array('uses'=>'lemlitpdController@hapus'));
Route::get('/adminfaculty',array('uses'=>'lemlitpdController@halamanfakultas'));
Route::get('/admin_addfaculty',array('uses'=>'lemlitpdController@formtambahfakultas'));
Route::post('/proses_tambahfakultas',array('uses'=>'lemlitpdController@tambahfakultas'));
Route::get('/admin_editfaculty/{idfakultas}',array('uses'=>'lemlitpdController@ubahfakultas'));
Route::post('/proses_ubahfakultas/{idfakultas}',array('uses'=>'lemlitpdController@proses_ubahfakultas'));
Route::get('/proses_hapusfakultas/{idfakultas}',array('uses'=>'lemlitpdController@hapusfakultas'));
Route::controller('site', 'lemlitpdController');
Route::get('/adminlecturer',array('uses'=>'lemlitpdController@halamandosen'));
Route::get('/admin_addlecturer',array('uses'=>'lemlitpdController@formtambahdosen'));
Route::post('/proses_tambahdosen',array('uses'=>'lemlitpdController@tambahdosen'));
Route::get('/admin_editlecturer/{iddosen}',array('uses'=>'lemlitpdController@ubahdosen'));
Route::post('/proses_ubahdosen/{iddosen}',array('uses'=>'lemlitpdController@proses_ubahdosen'));
Route::get('/proses_hapusdosen/{iddosen}',array('uses'=>'lemlitpdController@hapusdosen'));
Route::get('/admin_detaillecturer/{iddosen}',array('uses'=>'lemlitpdController@detaildosen'));
Route::get('/adminskim',array('uses'=>'lemlitpdController@halamanskim'));
Route::get('/admin_addskim',array('uses'=>'lemlitpdController@formtambahskim'));
Route::post('/proses_tambahskim',array('uses'=>'lemlitpdController@tambahskim'));
Route::get('/admin_editskim/{idskimpenelitian}',array('uses'=>'lemlitpdController@ubahskim'));
Route::get('/admin_editmessage/{id_saran}',array('uses'=>'adminController@ubahsaran'));
Route::post('/proses_ubahskim/{idskimpenelitian}',array('uses'=>'lemlitpdController@proses_ubahskim'));
Route::post('/proses_ubahsaran/{id_saran}',array('uses'=>'adminController@proses_ubahsaran'));
Route::get('/proses_hapusskim/{idskimpenelitian}',array('uses'=>'lemlitpdController@hapusskim'));
Route::get('/proses_hsaran/{id_saran}',array('uses'=>'adminController@hapussaran'));
Route::get('/adminprogram',array('uses'=>'lemlitpdController@halamanprogramstudi'));
Route::get('/admin_addprogram',array('uses'=>'lemlitpdController@formtambahprogram'));
Route::post('/proses_tambahprogram',array('uses'=>'lemlitpdController@tambahprogramstudi'));
Route::get('/admin_editprogram/{idprodi}',array('uses'=>'lemlitpdController@ubahprogramstudi'));
Route::post('/proses_ubahprogram/{idprodi}',array('uses'=>'lemlitpdController@proses_ubahprogram'));
Route::get('/proses_hapusprogram/{idprodi}',array('uses'=>'lemlitpdController@hapusprogram'));
Route::get('/adminhistory',array('uses'=>'lemlitpdController@halamanhistory'));
Route::get('/adminproposal',array('uses'=>'lemlitpdController@halamanproposal'));
Route::get('/adminpkmproposal',array('uses'=>'lemlitpdController@halamanproposalpkm'));
Route::get('/admin_addproposal',array('uses'=>'lemlitpdController@formtambahproposal'));
Route::get('/admin_apkmproposal',array('uses'=>'adminController@ftambahproposalpkm'));
Route::post('/proses_tambahproposal',array('uses'=>'lemlitpdController@tambahproposal'));
Route::post('/proses_tproposalpkm',array('uses'=>'adminController@tambahproposalpkm'));
Route::get('/admin_editproposal/{idproposal}',array('uses'=>'lemlitpdController@ubahproposal'));
Route::get('/admin_epkmproposal/{idproposalpkm}',array('uses'=>'adminController@ubahproposalpkm'));
Route::post('/proses_ubahproposal/{idproposal}',array('uses'=>'lemlitpdController@proses_ubahproposal'));
Route::post('/proses_uproposalpkm/{idproposalpkm}',array('uses'=>'lemlitpdController@proses_uproposalpkm'));
Route::get('/proses_hapusproposal/{idproposal}',array('uses'=>'lemlitpdController@hapusproposal'));
Route::get('/proses_hproposalpkm/{idproposalpkm}',array('uses'=>'adminController@hapusproposalpkm'));
Route::get('/adminprogress',array('uses'=>'lemlitpdController@halamanlaporankemajuan'));
Route::get('/adminpkmprogress',array('uses'=>'adminController@hlaporankemajuanpkm'));
Route::get('/admin_addprogress',array('uses'=>'lemlitpdController@formtambahlapkemajuan'));
Route::get('/admin_apkmprogress',array('uses'=>'adminController@ftambahlapkemajuanpkm'));
Route::post('/proses_tambahkemajuan',array('uses'=>'lemlitpdController@tambahlapkemajuan'));
Route::post('/proses_tkemajuanpkm',array('uses'=>'adminController@tambahlapkemajuanpkm'));
Route::get('/admin_editprogress/{idlapkemajuan}',array('uses'=>'lemlitpdController@ubahlaporankemajuan'));
Route::get('/admin_epkmprogress/{idlkemajuanpkm}',array('uses'=>'adminController@ulaporankemajuanpkm'));
Route::post('/proses_ubahkemajuan/{idlapkemajuan}',array('uses'=>'lemlitpdController@proses_ubahkemajuan'));
Route::post('/proses_ukemajuanpkm/{idlkemajuanpkm}',array('uses'=>'adminController@proses_ukemajuanpkm'));
Route::get('/proses_hapuskemajuan/{idlapkemajuan}',array('uses'=>'lemlitpdController@hapuslaporankemajuan'));
Route::get('/proses_hkemajuanpkm/{idlkemajuanpkm}',array('uses'=>'adminController@hapuslkemajuanpkm'));
Route::get('/proses_hberkas/{id_berkas}',array('uses'=>'adminController@hapusberkas'));
Route::get('/adminfinal',array('uses'=>'lemlitpdController@halamanlaporanakhir'));
Route::get('/adminpkmfinal',array('uses'=>'adminController@hlaporanakhirpkm'));
Route::get('/admin_addfinal',array('uses'=>'lemlitpdController@formtambahlapakhir'));
Route::get('/admin_apkmfinal',array('uses'=>'adminController@ftambahlapakhirpkm'));
Route::post('/proses_tambahakhir',array('uses'=>'lemlitpdController@tambahlaporanakhir'));
Route::post('/proses_takhirpkm',array('uses'=>'adminController@tlaporanakhirpkm'));
Route::get('/admin_editfinal/{idlapakhir}',array('uses'=>'lemlitpdController@ubahlaporanakhir'));
Route::get('/admin_epkmfinal/{idlakhir_pkm}',array('uses'=>'adminController@ulaporanakhirpkm'));
Route::post('/proses_ubahakhir/{idlapakhir}',array('uses'=>'lemlitpdController@proses_ubahakhir'));
Route::post('/proses_ubahfile/{id_berkas}',array('uses'=>'adminController@proses_ubahfile'));
Route::post('/proses_uakhirpkm/{idlakhir_pkm}',array('uses'=>'adminController@proses_uakhirpkm'));
Route::get('/proses_hapusakhir/{idlapakhir}',array('uses'=>'lemlitpdController@hapuslaporanakhir'));
Route::get('/proses_hakhirpkm/{idlakhir_pkm}',array('uses'=>'adminController@hapuslakhirpkm'));
Route::get('/admin_editpassword',array('uses'=>'lemlitpdController@ubahpassword'));
Route::get('/lecturer_editpassword',array('uses'=>'lemlitpdController@ubahpassworddosen'));
Route::get('/chief_editpassword',array('uses'=>'lemlitpdController@ubahpasswordketua'));
Route::get('/logout',array('uses'=>'lemlitpdController@logout'));
Route::post('/proses_ubahpassword',array('uses'=>'lemlitpdController@proses_ubahpassword'));
Route::post('/pupassworddosen',array('uses'=>'lemlitpdController@pupassworddosen'));
Route::post('/pupasswordketua',array('uses'=>'lemlitpdController@pupasswordketua'));
Route::get('/proposal',array('uses'=>'lemlitpdController@proposal'));
Route::get('/pkmproposal',array('uses'=>'lemlitpdController@pkmproposal'));
Route::post('/searchproposal',array('uses'=>'lemlitpdController@proses_cariproposal'));
Route::post('/searchpkmproposal',array('uses'=>'lemlitpdController@proses_cproposalpkm'));
Route::get('/viewproposal/{idproposal}',array('uses'=>'lemlitpdController@detailproposal'));
Route::get('/viewpkmproposal/{idproposalpkm}',array('uses'=>'lemlitpdController@detailproposalpkm'));
Route::get('/lecturer_viewproposal/{idproposal}',array('uses'=>'lemlitpdController@detailproposaldosen'));
Route::get('/lecturer_vpkmproposal/{idproposalpkm}',array('uses'=>'dosenController@dproposalpkmdosen'));
Route::get('/downloadproposal/{idproposal}', function($idproposal)
	{
		$file = DB::select('SELECT * FROM proposal WHERE idproposal = ?', array($idproposal));
		$data = $file[0]->namafileproposal;
		$data2=app_path()."/File_Proposal_Penelitian/".$data;
		$headers = array(
			'Content-Type' => 'application/pdf',
			);
		return Response::download($data2, $data, $headers);
	});
Route::get('/downloadpkmproposal/{idproposalpkm}', function($idproposalpkm)
	{
		$file = DB::select('SELECT * FROM proposalpkm WHERE idproposalpkm = ?', array($idproposalpkm));
		$data = $file[0]->namafileproposal;
		$data2=app_path()."/File_Proposal_PKM/".$data;
		$headers = array(
			'Content-Type' => 'application/pdf',
			);
		return Response::download($data2, $data, $headers);
	});
Route::get('/lecturer_downloadproposal/{idproposal}', function($idproposal)
	{
		$file = DB::select('SELECT * FROM proposal WHERE idproposal = ?', array($idproposal));
		$data = $file[0]->namafileproposal;
		$data2=app_path()."/File_Proposal_Penelitian/".$data;
		$headers = array(
			'Content-Type' => 'application/pdf',
			);
		return Response::download($data2, $data, $headers);
	});
Route::get('/lecturer_dpkmproposal/{idproposalpkm}', function($idproposalpkm)
	{
		$file = DB::select('SELECT * FROM proposalpkm WHERE idproposalpkm = ?', array($idproposalpkm));
		$data = $file[0]->namafileproposal;
		$data2=app_path()."/File_Proposal_PKM/".$data;
		$headers = array(
			'Content-Type' => 'application/pdf',
			);
		return Response::download($data2, $data, $headers);
	});
Route::get('/progress',array('uses'=>'lemlitpdController@laporankemajuan'));
Route::get('/pkmprogress',array('uses'=>'lemlitpdController@laporankemajuanpkm'));
Route::post('/searchprogress',array('uses'=>'lemlitpdController@proses_carilkemajuan'));
Route::post('/searchpkmprogress',array('uses'=>'lemlitpdController@proses_clkemajuanpkm'));
Route::get('/viewprogress/{idlapkemajuan}',array('uses'=>'lemlitpdController@lihatlaporankemajuan'));
Route::get('/viewpkmprogress/{idlkemajuanpkm}',array('uses'=>'lemlitpdController@llaporankemajuanpkm'));
Route::get('/lecturer_viewprogress/{idlapkemajuan}',array('uses'=>'lemlitpdController@lihatlkdosen'));
Route::get('/lecturer_vpkmprogress/{idlkemajuanpkm}',array('uses'=>'dosenController@lihatlkpkmdosen'));
Route::get('/downloadprogress/{idlapkemajuan}', function($idlapkemajuan)
	{
		$file = DB::select('SELECT * FROM laporankemajuan WHERE idlapkemajuan = ?', array($idlapkemajuan));
		$data = $file[0]->namafilekemajuan;
		$data2=app_path()."/File_Kemajuan_Penelitian/".$data;
		$headers = array(
			'Content-Type' => 'application/pdf',
			);
		return Response::download($data2, $data, $headers);
	});
Route::get('/downloadpkmprogress/{idlkemajuanpkm}', function($idlkemajuanpkm)
	{
		$file = DB::select('SELECT * FROM laporankemajuanpkm WHERE idlkemajuanpkm = ?', array($idlkemajuanpkm));
		$data = $file[0]->namafilekemajuan;
		$data2=app_path()."/File_Kemajuan_PKM/".$data;
		$headers = array(
			'Content-Type' => 'application/pdf',
			);
		return Response::download($data2, $data, $headers);
	});
Route::get('/lecturer_downloadprogress/{idlapkemajuan}', function($idlapkemajuan)
	{
		$file = DB::select('SELECT * FROM laporankemajuan WHERE idlapkemajuan = ?', array($idlapkemajuan));
		$data = $file[0]->namafilekemajuan;
		$data2=app_path()."/File_Kemajuan_Penelitian/".$data;
		$headers = array(
			'Content-Type' => 'application/pdf',
			);
		return Response::download($data2, $data, $headers);
	});
Route::get('/lecturer_downloadfinal/{idlapakhir}', function($idlapakhir)
	{
		$file = DB::select('SELECT * FROM laporanakhir WHERE idlapakhir = ?', array($idlapakhir));
		$data = $file[0]->namafileakhir;
		$data2=app_path()."/File_Akhir_Penelitian/".$data;
		$headers = array(
			'Content-Type' => 'application/pdf',
			);
		return Response::download($data2, $data, $headers);
	});
Route::get('/lecturer_downloadfile/{id_berkas}', function($id_berkas)
	{
		$file = DB::select('SELECT * FROM berkas WHERE id_berkas = ?', array($id_berkas));
		$data = $file[0]->namafile;
		$data2=app_path()."/Berkas/".$data;
		$headers = array(
			'Content-Type' => 'application/pdf',
			);
		return Response::download($data2, $data, $headers);
	});
Route::get('/lecturer_dpkmfinal/{idlakhir_pkm}', function($idlakhir_pkm)
	{
		$file = DB::select('SELECT * FROM laporanakhirpkm WHERE idlakhir_pkm = ?', array($idlakhir_pkm));
		$data = $file[0]->namafileakhir;
		$data2=app_path()."/File_Akhir_PKM/".$data;
		$headers = array(
			'Content-Type' => 'application/pdf',
			);
		return Response::download($data2, $data, $headers);
	});
Route::get('/lecturer_dpkmprogress/{idlkemajuanpkm}', function($idlkemajuanpkm)
	{
		$file = DB::select('SELECT * FROM laporankemajuanpkm WHERE idlkemajuanpkm = ?', array($idlkemajuanpkm));
		$data = $file[0]->namafilekemajuan;
		$data2=app_path()."/File_Kemajuan_PKM/".$data;
		$headers = array(
			'Content-Type' => 'application/pdf',
			);
		return Response::download($data2, $data, $headers);
	});
Route::get('/final',array('uses'=>'lemlitpdController@laporanakhir'));
Route::get('/pkmfinal',array('uses'=>'lemlitpdController@laporanakhirpkm'));
Route::post('/searchfinal',array('uses'=>'lemlitpdController@proses_carilakhir'));
Route::post('/searchpkmfinal',array('uses'=>'lemlitpdController@proses_clakhirpkm'));
Route::get('/viewfinal/{idlapakhir}',array('uses'=>'lemlitpdController@lihatlaporanakhir'));
Route::get('/viewpkmfinal/{idlakhir_pkm}',array('uses'=>'lemlitpdController@llaporanakhirpkm'));
Route::get('/lecturer_viewfinal/{idlapakhir}',array('uses'=>'lemlitpdController@lihatladosen'));
Route::get('/lecturer_vpkmfinal/{idlakhir_pkm}',array('uses'=>'dosenController@lihatlapkmdosen'));
Route::get('/downloadfile/{id_berkas}', function($id_berkas)
	{
		$file = DB::select('SELECT * FROM berkas WHERE id_berkas = ?', array($id_berkas));
		$data = $file[0]->namafile;
		$data2=app_path()."/Berkas/".$data;
		$headers = array(
			'Content-Type' => 'application/pdf',
			);
		return Response::download($data2, $data, $headers);
	});
Route::get('/downloadfinal/{idlapakhir}', function($idlapakhir)
	{
		$file = DB::select('SELECT * FROM laporanakhir WHERE idlapakhir = ?', array($idlapakhir));
		$data = $file[0]->namafileakhir;
		$data2=app_path()."/File_Akhir_Penelitian/".$data;
		$headers = array(
			'Content-Type' => 'application/pdf',
			);
		return Response::download($data2, $data, $headers);
	});
Route::get('/downloadpkmfinal/{idlakhir_pkm}', function($idlakhir_pkm)
	{
		$file = DB::select('SELECT * FROM laporanakhirpkm WHERE idlakhir_pkm = ?', array($idlakhir_pkm));
		$data = $file[0]->namafileakhir;
		$data2=app_path()."/File_Akhir_PKM/".$data;
		$headers = array(
			'Content-Type' => 'application/pdf',
			);
		return Response::download($data2, $data, $headers);
	});
Route::get('/graph',array('uses'=>'lemlitpdController@halamangrafikpenelitian'));
Route::get('/lecturer',array('uses'=>'lemlitpdController@dosen'));
Route::post('/searchlecturer',array('uses'=>'lemlitpdController@proses_caridosen'));
Route::get('/viewlecturer/{iddosen}',array('uses'=>'lemlitpdController@lihatdosen'));
Route::get('/lecturerhome',array('uses'=>'lemlitpdController@berandadosen'));
Route::get('/lecturer_editprofile',array('uses'=>'lemlitpdController@ubahprofildosen'));
Route::get('/lecturer_logout',array('uses'=>'lemlitpdController@logoutdosen'));
Route::post('/proses_updosen',array('uses'=>'lemlitpdController@proses_updosen'));
Route::get('/viewgraph/{idfakultas}/{idskimpenelitian}', array('uses'=>'lemlitpdController@lihatgrafik'));
Route::get('/finalgraph',array('uses'=>'lemlitpdController@halamangrafiklaporan'));
Route::get('/viewfinalgraph/{idfakultas}/{idskimpenelitian}', array('uses'=>'lemlitpdController@lihatgrafiklaporan'));
Route::get('/lecturerproposal', array('uses'=>'lemlitpdController@halamanproposaldosen'));
Route::get('/lecturerpkmproposal', array('uses'=>'dosenController@hproposalpkmdosen'));
Route::get('/lecturer_editproposal/{idproposal}',array('uses'=>'lemlitpdController@ubahproposaldosen'));
Route::get('/lecturer_epkmproposal/{idproposalpkm}',array('uses'=>'dosenController@uproposalpkmdosen'));
Route::get('/chiefhome',array('uses'=>'lemlitpdController@berandaketua'));
Route::get('/researchact',array('uses'=>'lemlitpdController@laporanaktifitaspenelitian'));
Route::get('/viewactivity/{tahun}/{idskimpenelitian}', array('uses'=>'lemlitpdController@lihatlap'));
Route::any('lap/pdf/{tahun2}/{idskimpenelitian2}', array('as' => 'lap/pdf', 'uses' => 'lemlitpdController@downloadlapdosen'));
Route::get('/chiefproposal',array('uses'=>'lemlitpdController@halamanproposalketua'));
Route::get('/chiefpkmproposal',array('uses'=>'ketuaController@hproposalpkmketua'));
Route::get('/chief_viewproposal/{idproposal}',array('uses'=>'lemlitpdController@detailproposalketua'));
Route::get('/chief_vpkmproposal/{idproposalpkm}',array('uses'=>'ketuaController@dproposalpkmketua'));
Route::get('/chief_viewprogress/{idlapkemajuan}',array('uses'=>'lemlitpdController@lihatlkketua'));
Route::get('/chief_vpkmprogress/{idlkemajuanpkm}',array('uses'=>'ketuaController@lihatlkpkmketua'));
Route::get('/chiefprogress',array('uses'=>'lemlitpdController@halamanlkketua'));
Route::get('/chiefpkmprogress',array('uses'=>'ketuaController@halamanlkpkmketua'));
Route::get('/chieffinal',array('uses'=>'lemlitpdController@halamanlaketua'));
Route::get('/chiefpkmfinal',array('uses'=>'ketuaController@halamanlapkmketua'));
Route::get('/chief_viewfinal/{idlapakhir}',array('uses'=>'lemlitpdController@lihatlaketua'));
Route::get('/chief_vpkmfinal/{idlakhir_pkm}',array('uses'=>'ketuaController@lihatlapkmketua'));
Route::post('/puproposaldosen/{idproposal}',array('uses'=>'lemlitpdController@puproposaldosen'));
Route::post('/puproposalpkmdosen/{idproposalpkm}',array('uses'=>'dosenController@puproposalpkmdosen'));
Route::get('/proses_hpdosen/{idproposal}',array('uses'=>'lemlitpdController@proses_hpdosen'));
Route::get('/proses_hppkmdosen/{idproposalpkm}',array('uses'=>'dosenController@proses_hppkmdosen'));
Route::get('/lecturer_addproposal',array('uses'=>'lemlitpdController@ftproposaldosen'));
Route::get('/lecturer_apkmproposal',array('uses'=>'dosenController@ftproposalpkmdosen'));
Route::get('/lecturerprogress', array('uses'=>'lemlitpdController@halamanlkdosen'));
Route::get('/proses_hkdosen/{idlapkemajuan}',array('uses'=>'lemlitpdController@proses_hkdosen'));
Route::get('/proses_hkpkmdosen/{idlkemajuanpkm}',array('uses'=>'dosenController@proses_hkpkmdosen'));
Route::get('/lecturer_editprogress/{idlapkemajuan}',array('uses'=>'lemlitpdController@ubahlkdosen'));
Route::get('/lecturer_epkmprogress/{idlkemajuanpkm}',array('uses'=>'dosenController@ubahlkpkmdosen'));
Route::post('/proses_ukdosen/{idlapkemajuan}',array('uses'=>'lemlitpdController@proses_ukdosen'));
Route::post('/proses_ukpkmdosen/{idlkemajuanpkm}',array('uses'=>'dosenController@proses_ukpkmdosen'));
Route::get('/lecturer_addprogress',array('uses'=>'lemlitpdController@ftkemajuandosen'));
Route::get('/lecturer_apkmprogress',array('uses'=>'dosenController@ftkemajuanpkmdosen'));
Route::post('/ptproposaldosen',array('uses'=>'lemlitpdController@ptproposaldosen'));
Route::post('/ptproposalpkmdosen',array('uses'=>'dosenController@ptproposalpkmdosen'));
Route::post('/ptkemajuandosen',array('uses'=>'lemlitpdController@ptkemajuandosen'));
Route::post('/ptkemajuanpkmdosen',array('uses'=>'dosenController@ptkemajuanpkmdosen'));
Route::get('/lecturerfinal', array('uses'=>'lemlitpdController@halamanladosen'));
Route::get('/lecturerpkmfinal', array('uses'=>'dosenController@halamanlapkmdosen'));
Route::get('/lecturerfile', array('uses'=>'dosenController@halamanfile'));
Route::get('/proses_hadosen/{idlapakhir}',array('uses'=>'lemlitpdController@proses_hadosen'));
Route::get('/proses_hapkmdosen/{idlakhir_pkm}',array('uses'=>'dosenController@proses_hapkmdosen'));
Route::get('/lecturer_editfinal/{idlapakhir}',array('uses'=>'lemlitpdController@ubahladosen'));
Route::get('/lecturer_epkmfinal/{idlakhir_pkm}',array('uses'=>'dosenController@ubahlapkmdosen'));
Route::post('/proses_uadosen/{idlapakhir}',array('uses'=>'lemlitpdController@proses_uadosen'));
Route::post('/proses_uapkmdosen/{idlakhir_pkm}',array('uses'=>'dosenController@proses_uapkmdosen'));
Route::get('/proses_hadosen/{idlapakhir}',array('uses'=>'lemlitpdController@proses_hadosen'));
Route::get('/lecturer_addfinal',array('uses'=>'lemlitpdController@ftakhirdosen'));
Route::get('/lecturer_apkmfinal',array('uses'=>'dosenController@ftakhirpkmdosen'));
Route::post('/ptakhirdosen',array('uses'=>'lemlitpdController@ptakhirdosen'));
Route::post('/ptakhirpkmdosen',array('uses'=>'dosenController@ptakhirpkmdosen'));
Route::get('/admin_researchact',array('uses'=>'lemlitpdController@lapadmin'));
Route::get('/admin_viewactivity/{tahun}/{idskimpenelitian}', array('uses'=>'lemlitpdController@lihatlapadmin'));
Route::any('admin_lap/pdf/{tahun2}/{idskimpenelitian2}', array('as' => 'admin_lap/pdf', 'uses' => 'lemlitpdController@downloadlapadmin'));
Route::get('search/autocomplete', 'SearchController@autocomplete');
Route::any('search', function(){
	$keyword = Input::get('auto');
	$models = DB::table("users")->where('first_name', '=', $keyword)->orderby('first_name')->take(10)->skip(0)->get();
	$count = count($models);
	return View::make('Contoh.contoh')->with("contents", $models)->with("counts", $count);
});
// 3: Create this route to process the user input (Input::get('term')) in the database query.
Route::any('getdata', function(){
	$term = Str::lower(Input::get('term'));
	// 4: Check if any matches found in the database table
	$data = DB::table("users")->distinct()->select('first_name')->where('first_name', 'LIKE', $term.'%')->groupBy('first_name')->take(10)->get();
	foreach($data as $v){
		$return_array[] = array('value' => $v->first_name);
	}
	// If matches found it first create the array of the result and then convert it to json format so that it can be processed in the autocomplete script
	return Response::json($return_array);
});
Route::POST('hasil/', function(){
	$keyword = Str::lower(Input::get('auto'));
	$data['users'] = DB::table('users')->where('first_name', '=', $keyword)
		->orderBy('first_name')->take(10)->skip(0)->get();
	$count = count($data);
	return View::make('Contoh.hasil', $data)->with("counts", $count);
});
Route::any('getproposal', function(){
	$term = Str::lower(Input::get('term'));
	$data = DB::table("proposal")->distinct()->select('judul')->where('judul', 'LIKE', $term.'%')->groupBy('judul')->take(10)->get();
	foreach($data as $v){
		$return_array[] = array('value' => $v->judul);
	}
	return Response::json($return_array);
});
Route::POST('admin_addprogress/1/',array('uses'=>'lemlitpdController@formtambahlapkemajuan'));
Route::get('/contact',array('uses'=>'lemlitpdController@contact'));
Route::post('/send',array('uses'=>'lemlitpdController@send'));
Route::get('/adminfile',array('uses'=>'adminController@adminfile'));
Route::get('/adminmessage',array('uses'=>'adminController@adminmessage'));
Route::get('/admin_addfile', array('uses'=>'adminController@halamantambahfile'));
Route::post('/proses_tambahberkas',array('uses'=>'adminController@proses_tambahberkas'));