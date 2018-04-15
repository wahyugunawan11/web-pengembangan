<?php

class adminController extends BaseController{
	public function ubahproposalpkm($idproposalpkm){
		$statusinput = 'success';
		if (Session::has('statusinput')){
			$statusinput = Session::get('statusinput');
			Session::forget('statusinput');
		}
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
		return View::make('admin.ubahproposalpkm',$data)->with('thnsekarang', $thnsekarang);
	}
	public function proses_uproposalpkm($idproposalpkm){
		$data['statusinput'] = 'success';
		if(((Input::get('judul')) == '') || ((Input::get('sumberdana')) == '') || ((Input::get('idketua2')) == '') || ((Input::get('idketua2')) == '0')){
			$data['statusinput'] = 'failed';
			return Redirect::to('/admin_epkmproposal/'.$idproposalpkm)->with('statusinput',$data['statusinput']);
		}
		elseif(((Input::get('judul')) != '') && ((Input::get('sumberdana')) != '') && ((Input::get('idketua2')) != '') && ((Input::get('idketua2')) != '0')){
			if (Input::hasFile('namafile'))
			{
				$nama_file=md5(time().rand()).'.'.Input::file('namafile')->getClientOriginalExtension();
				$destinationPath = app_path() . "/File_Proposal_PKM/";
				Input::file('namafile')->move($destinationPath, $nama_file);
				//update gambar
	   				DB::table('proposalpkm')->where('idproposalpkm', '=', $idproposalpkm)->update(array(
						'namafileproposal'=>$nama_file
						));
			}
			//update tabel proposal
			DB::table('proposalpkm')->where('idproposalpkm','=',$idproposalpkm)->update(array(
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
				'keterangan'=>'Ubah data proposal pkm dengan ID '.$idproposalpkm.'.',
				'tanggalwaktu'=>date('Y-m-d H:i:s'),
				'iduserhistory'=>Session::get('iduser')
				));
		}
		return Redirect::to('/adminpkmproposal')->with('statusinput',$data['statusinput']);
	}
	public function hapusproposalpkm($idproposalpkm){
		$data['proposalpkm']=DB::table('proposalpkm')->where('idproposalpkm','=',$idproposalpkm)->delete();
		date_default_timezone_set('Asia/Jakarta');
		DB::table('history')->insert(array(
			'keterangan'=>'Hapus data proposal PKM dengan ID '.$idproposalpkm.'.',
			'tanggalwaktu'=>date('Y-m-d H:i:s'),
			'iduserhistory'=>Session::get('iduser')
			));
		return Redirect::to('/adminpkmproposal');
	}
	public function ftambahproposalpkm(){
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
		return View::make('admin.tambahproposalpkm', $data)->with('thnsekarang', $thnsekarang);
	}

	public function tambahproposalpkm(){
		$data['statusinput'] = 'success';
		if(((Input::get('judul')) == '') || ((Input::get('sumberdana')) == '') || ((Input::get('idketua2')) == '') || ((Input::get('idketua2')) == '0')){
			$data['statusinput'] = 'failed';
			return Redirect::to('/admin_apkmproposal')->with('statusinput',$data['statusinput']);
		}
		elseif(((Input::get('judul')) != '') && ((Input::get('sumberdana')) != '') && ((Input::get('idketua2')) != '') && ((Input::get('idketua2')) != '0')){
			$nama_file='';
			if (Input::hasFile('namafile'))
			{
				$nama_file=md5(time().rand()).'.'.Input::file('namafile')->getClientOriginalExtension();
				$destinationPath = app_path() . "/File_Proposal_PKM/";
				Input::file('namafile')->move($destinationPath, $nama_file);
			}
			DB::table('proposalpkm')->insert(array(
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
				'keterangan'=>'Tambah data proposal PKM',
				'tanggalwaktu'=>date('Y-m-d H:i:s'),
				'iduserhistory'=>Session::get('iduser')
				));
		}
		return Redirect::to('/adminpkmproposal')->with('statusinput',$data['statusinput']);
	}

	public function hlaporankemajuanpkm(){
		$data['laporankemajuanpkm'] = DB::select('select idlkemajuanpkm, judul, sumberdana, tahun, read_more, programstudi, skim, bidangilmu, fakultas, ketua, anggota1, anggota2, anggota3, dosen.nama as anggota4, anggotalain from 
			(select idlkemajuanpkm, judul, sumberdana, tahun, read_more, programstudi, skim, bidangilmu, fakultas, ketua, anggota1, anggota2, dosen.nama as anggota3, idanggota4, anggotalain from 
				(select idlkemajuanpkm, judul, sumberdana, tahun, read_more, programstudi, skim, bidangilmu, fakultas, ketua, anggota1, dosen.nama as anggota2, idanggota3, idanggota4, anggotalain from 
					(select idlkemajuanpkm, judul, sumberdana, tahun, read_more, programstudi, skim, bidangilmu, fakultas, ketua, dosen.nama as anggota1, idanggota2, idanggota3, idanggota4, anggotalain from 
						(select idlkemajuanpkm, judul, sumberdana, tahun, read_more, programstudi, skim, bidangilmu, fakultas, dosen.nama as ketua, idanggota1, idanggota2, idanggota3, idanggota4, anggotalain from 
							(select idlkemajuanpkm, judul, sumberdana, tahun, read_more, programstudi, skimpenelitian.skim as skim, bidangilmu, fakultas, idketua, idanggota1, idanggota2, idanggota3, idanggota4, anggotalain from
								(select idlkemajuanpkm, judul, sumberdana, tahun, read_more, programstudi.programstudi as programstudi, idskimpenelitian, bidangilmu.bidangilmu as bidangilmu, fakultas.fakultas as fakultas, idketua, idanggota1, idanggota2, idanggota3, idanggota4, anggotalain from laporankemajuanpkm left join programstudi on laporankemajuanpkm.idprodi=programstudi.idprodi left join bidangilmu on laporankemajuanpkm.idbidilmu=bidangilmu.idbidilmu left join fakultas on laporankemajuanpkm.idfakultas=fakultas.idfakultas)
							as tprogramstudi left join skimpenelitian on tprogramstudi.idskimpenelitian=skimpenelitian.idskimpenelitian)
						as tketua left join dosen on tketua.idketua=dosen.iddosen) 
					as t1 left join dosen on t1.idanggota1=dosen.iddosen) 
				as t2 left join dosen on t2.idanggota2=dosen.iddosen) 
			as t3 left join dosen on t3.idanggota3=dosen.iddosen) 
		as t4 left join dosen on t4.idanggota4=dosen.iddosen order by idlkemajuanpkm desc');
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
		return View::make('admin.lkemajuanpkm', $data)->with('thnsekarang', $thnsekarang);
	}

	public function ulaporankemajuanpkm($idlkemajuanpkm){
		$statusinput = 'success';
		if (Session::has('statusinput')){
			$statusinput = Session::get('statusinput');
			Session::forget('statusinput');
		}
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
		return View::make('admin.ubahlkemajuanpkm',$data)->with('thnsekarang', $thnsekarang);
	}

	public function proses_ukemajuanpkm($idlkemajuanpkm){
		$data['statusinput'] = 'success';
		if(((Input::get('judul')) == '') || ((Input::get('sumberdana')) == '') || ((Input::get('idketua2')) == '') || ((Input::get('idketua2')) == '0')){
			$data['statusinput'] = 'failed';
			return Redirect::to('/admin_epkmprogress/'.$idlapkemajuan)->with('statusinput',$data['statusinput']);
		}
		elseif(((Input::get('judul')) != '') && ((Input::get('sumberdana')) != '') && ((Input::get('idketua2')) != '') && ((Input::get('idketua2')) != '0')){
			if (Input::hasFile('namafile'))
			{
				$nama_file=md5(time().rand()).'.'.Input::file('namafile')->getClientOriginalExtension();
				$destinationPath = app_path() . "/File_Kemajuan_PKM/";
				Input::file('namafile')->move($destinationPath, $nama_file);
				//update gambar
	   				DB::table('laporankemajuanpkm')->where('idlkemajuanpkm', '=', $idlkemajuanpkm)->update(array(
						'namafilekemajuan'=>$nama_file
						));
			}
			//update tabel laporankemajuan
			DB::table('laporankemajuanpkm')->where('idlkemajuanpkm','=',$idlkemajuanpkm)->update(array(
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
				'keterangan'=>'Ubah data laporan kemajuan PKM dengan ID '.$idlkemajuanpkm.'.',
				'tanggalwaktu'=>date('Y-m-d H:i:s'),
				'iduserhistory'=>Session::get('iduser')
				));
		}
		return Redirect::to('/adminpkmprogress')->with('statusinput',$data['statusinput']);
	}

	public function hapuslkemajuanpkm($idlkemajuanpkm){
		$data['laporankemajuanpkm']=DB::table('laporankemajuanpkm')->where('idlkemajuanpkm','=',$idlkemajuanpkm)->delete();
		date_default_timezone_set('Asia/Jakarta');
		DB::table('history')->insert(array(
			'keterangan'=>'Hapus data laporan kemajuan PKM dengan ID '.$idlkemajuanpkm.'.',
			'tanggalwaktu'=>date('Y-m-d H:i:s'),
			'iduserhistory'=>Session::get('iduser')
			));
		return Redirect::to('/adminpkmprogress');
	}

	public function ftambahlapkemajuanpkm(){
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
		return View::make('admin.tambahlkemajuanpkm', $data)->with('thnsekarang', $thnsekarang);
	}

	public function tambahlapkemajuanpkm(){
		$data['statusinput'] = 'success';
		if(((Input::get('judul')) == '') || ((Input::get('sumberdana')) == '') || ((Input::get('idketua2')) == '')  || ((Input::get('idketua2')) == '0')){
			$data['statusinput'] = 'failed';
			return Redirect::to('/admin_apkmprogress')->with('statusinput',$data['statusinput']);
		}
		elseif(((Input::get('judul')) == '') || ((Input::get('sumberdana')) == '') || ((Input::get('ketua')) == '')  || ((Input::get('idketua2')) == '')){
			$nama_file='';
			if (Input::hasFile('namafile'))
			{
				$nama_file=md5(time().rand()).'.'.Input::file('namafile')->getClientOriginalExtension();
				$destinationPath = app_path() . "/File_Kemajuan_PKM/";
				Input::file('namafile')->move($destinationPath, $nama_file);
			}
			DB::table('laporankemajuanpkm')->insert(
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
				'keterangan'=>'Tambah data laporan kemajuan PKM.',
				'tanggalwaktu'=>date('Y-m-d H:i:s'),
				'iduserhistory'=>Session::get('iduser')
				));
		}
		return Redirect::to('/adminpkmprogress')->with('statusinput',$data['statusinput']);
	}

	public function hlaporanakhirpkm(){
		$data['laporanakhirpkm'] = DB::select('select idlakhir_pkm, judul, sumberdana, tahun, read_more, programstudi, skim, bidangilmu, fakultas, ketua, anggota1, anggota2, anggota3, dosen.nama as anggota4, anggotalain from 
			(select idlakhir_pkm, judul, sumberdana, tahun, read_more, programstudi, skim, bidangilmu, fakultas, ketua, anggota1, anggota2, dosen.nama as anggota3, idanggota4, anggotalain from 
				(select idlakhir_pkm, judul, sumberdana, tahun, read_more, programstudi, skim, bidangilmu, fakultas, ketua, anggota1, dosen.nama as anggota2, idanggota3, idanggota4, anggotalain from 
					(select idlakhir_pkm, judul, sumberdana, tahun, read_more, programstudi, skim, bidangilmu, fakultas, ketua, dosen.nama as anggota1, idanggota2, idanggota3, idanggota4, anggotalain from 
						(select idlakhir_pkm, judul, sumberdana, tahun, read_more, programstudi, skim, bidangilmu, fakultas, dosen.nama as ketua, idanggota1, idanggota2, idanggota3, idanggota4, anggotalain from 
							(select idlakhir_pkm, judul, sumberdana, tahun, read_more, programstudi, skimpenelitian.skim as skim, bidangilmu, fakultas, idketua, idanggota1, idanggota2, idanggota3, idanggota4, anggotalain from
								(select idlakhir_pkm, judul, sumberdana, tahun, read_more, programstudi.programstudi as programstudi, idskimpenelitian, bidangilmu.bidangilmu as bidangilmu, fakultas.fakultas as fakultas, idketua, idanggota1, idanggota2, idanggota3, idanggota4, anggotalain from laporanakhirpkm left join programstudi on laporanakhirpkm.idprodi=programstudi.idprodi left join bidangilmu on laporanakhirpkm.idbidilmu=bidangilmu.idbidilmu left join fakultas on laporanakhirpkm.idfakultas=fakultas.idfakultas)
							as tprogramstudi left join skimpenelitian on tprogramstudi.idskimpenelitian=skimpenelitian.idskimpenelitian)
						as tketua left join dosen on tketua.idketua=dosen.iddosen) 
					as t1 left join dosen on t1.idanggota1=dosen.iddosen) 
				as t2 left join dosen on t2.idanggota2=dosen.iddosen) 
			as t3 left join dosen on t3.idanggota3=dosen.iddosen) 
		as t4 left join dosen on t4.idanggota4=dosen.iddosen order by idlakhir_pkm desc');
		$data['user']=DB::table('user')
		->where('username','=',Session::get('username'))
		->where('iduser','=',Session::get('iduser'))
		->get();
		$thnsekarang=idate('Y');
		return View::make('admin.lakhirpkm', $data)->with('thnsekarang', $thnsekarang);
	}

	public function hapuslakhirpkm($idlakhir_pkm){
		$data['laporanakhirpkm']=DB::table('laporanakhirpkm')->where('idlakhir_pkm','=',$idlakhir_pkm)->delete();
		date_default_timezone_set('Asia/Jakarta');
		DB::table('history')->insert(array(
			'keterangan'=>'Hapus data laporan akhir PKM dengan ID '.$idlapakhir.'.',
			'tanggalwaktu'=>date('Y-m-d H:i:s'),
			'iduserhistory'=>Session::get('iduser')
			));
		return Redirect::to('/adminpkmfinal');
	}

	public function ulaporanakhirpkm($idlakhir_pkm){
		$statusinput = 'success';
		if (Session::has('statusinput')){
			$statusinput = Session::get('statusinput');
			Session::forget('statusinput');
		}
		$data['laporanakhirpkm'] = DB::select('select idlakhir_pkm, judul, sumberdana, tahun, statusfile, namafileakhir, read_more, abstrak, akhiridprodi, programstudi, aidskimpenelitian, skim, akhiridbidilmu, bidangilmu, akhiridfakultas, fakultas, akhiridketua, ketua, aidanggota1, anggota1, aidanggota2, anggota2, aidanggota3, anggota3, aidanggota4, dosen.nama as anggota4, anggotalain from 
			(select idlakhir_pkm, judul, sumberdana, tahun, statusfile, namafileakhir, read_more, abstrak, akhiridprodi, programstudi, aidskimpenelitian, skim, akhiridbidilmu, bidangilmu, akhiridfakultas, fakultas, akhiridketua, ketua, aidanggota1, anggota1, aidanggota2, anggota2, aidanggota3, dosen.nama as anggota3, aidanggota4, idanggota4, anggotalain from 
				(select idlakhir_pkm, judul, sumberdana, tahun, statusfile, namafileakhir, read_more, abstrak, akhiridprodi, programstudi, aidskimpenelitian, skim, akhiridbidilmu, bidangilmu, akhiridfakultas, fakultas, akhiridketua, ketua, aidanggota1, anggota1, aidanggota2, dosen.nama as anggota2, aidanggota3, idanggota3, aidanggota4, idanggota4, anggotalain from 
					(select idlakhir_pkm, judul, sumberdana, tahun, statusfile, namafileakhir, read_more, abstrak, akhiridprodi, programstudi, aidskimpenelitian, skim, akhiridbidilmu, bidangilmu, akhiridfakultas, fakultas, akhiridketua, ketua, aidanggota1, dosen.nama as anggota1, aidanggota2, idanggota2, aidanggota3, idanggota3, aidanggota4, idanggota4, anggotalain from 
						(select idlakhir_pkm, judul, sumberdana, tahun, statusfile, namafileakhir, read_more, abstrak, akhiridprodi, programstudi, aidskimpenelitian, skim, akhiridbidilmu, bidangilmu, akhiridfakultas, fakultas, akhiridketua, dosen.nama as ketua, aidanggota1, idanggota1, aidanggota2, idanggota2, aidanggota3, idanggota3, aidanggota4, idanggota4, anggotalain from 
							(select idlakhir_pkm, judul, sumberdana, tahun, statusfile, namafileakhir, read_more, abstrak, akhiridprodi, programstudi, aidskimpenelitian, skimpenelitian.skim as skim, akhiridbidilmu, bidangilmu, akhiridfakultas, fakultas, akhiridketua, idketua, aidanggota1, idanggota1, aidanggota2, idanggota2, aidanggota3, idanggota3, aidanggota4, idanggota4, anggotalain from
								(select idlakhir_pkm, judul, sumberdana, tahun, statusfile, namafileakhir, read_more, abstrak, laporanakhirpkm.idprodi as akhiridprodi, programstudi.programstudi as programstudi, laporanakhirpkm.idskimpenelitian as aidskimpenelitian, idskimpenelitian, laporanakhirpkm.idbidilmu as akhiridbidilmu, bidangilmu.bidangilmu as bidangilmu, laporanakhirpkm.idfakultas as akhiridfakultas, fakultas.fakultas as fakultas, laporanakhirpkm.idketua as akhiridketua, idketua, laporanakhirpkm.idanggota1 as aidanggota1, idanggota1, laporanakhirpkm.idanggota2 as aidanggota2, idanggota2, laporanakhirpkm.idanggota3 as aidanggota3, idanggota3, laporanakhirpkm.idanggota4 as aidanggota4, idanggota4, anggotalain from laporanakhirpkm left join programstudi on laporanakhirpkm.idprodi=programstudi.idprodi left join bidangilmu on laporanakhirpkm.idbidilmu=bidangilmu.idbidilmu left join fakultas on laporanakhirpkm.idfakultas=fakultas.idfakultas)
							as tprogramstudi left join skimpenelitian on tprogramstudi.idskimpenelitian=skimpenelitian.idskimpenelitian)
						as tketua left join dosen on tketua.idketua=dosen.iddosen) 
					as t1 left join dosen on t1.idanggota1=dosen.iddosen) 
				as t2 left join dosen on t2.idanggota2=dosen.iddosen) 
			as t3 left join dosen on t3.idanggota3=dosen.iddosen) 
		as t4 left join dosen on t4.idanggota4=dosen.iddosen where idlakhir_pkm="'.$idlakhir_pkm.'" limit 1');
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
		return View::make('admin.ubahlakhirpkm',$data)->with('thnsekarang', $thnsekarang);
	}

	public function proses_uakhirpkm($idlakhir_pkm){
		$data['statusinput'] = 'success';
		if(((Input::get('judul')) == '') || ((Input::get('sumberdana')) == '') || ((Input::get('idketua2')) == '') || ((Input::get('idketua2')) == '0')){
			$data['statusinput'] = 'failed';
			return Redirect::to('/admin_epkmfinal/'.$idlakhir_pkm)->with('statusinput',$data['statusinput']);
		}
		elseif(((Input::get('judul')) != '') && ((Input::get('sumberdana')) != '') && ((Input::get('idketua2')) != '') && ((Input::get('idketua2')) != '0')){
			if (Input::hasFile('namafile'))
			{
				$nama_file=md5(time().rand()).'.'.Input::file('namafile')->getClientOriginalExtension();
				$destinationPath = app_path() . "/File_Akhir_PKM/";
				Input::file('namafile')->move($destinationPath, $nama_file);
				//update gambar
	   				DB::table('laporanakhirpkm')->where('idlakhir_pkm', '=', $idlakhir_pkm)->update(array(
						'namafileakhir'=>$nama_file
						));
			}
			//update tabel laporanakhir
			DB::table('laporanakhirpkm')->where('idlakhir_pkm','=',$idlakhir_pkm)->update(array(
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
				'keterangan'=>'Ubah data laporan akhir PKM dengan ID '.$idlakhir_pkm.'.',
				'tanggalwaktu'=>date('Y-m-d H:i:s'),
				'iduserhistory'=>Session::get('iduser')
				));
		}
		return Redirect::to('/adminpkmfinal')->with('statusinput',$data['statusinput']);
	}

	public function ftambahlapakhirpkm(){
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
		return View::make('admin.tambahlakhirpkm', $data)->with('thnsekarang', $thnsekarang);
	}

	public function tlaporanakhirpkm(){
		$data['statusinput'] = 'success';
		if(((Input::get('judul')) == '') || ((Input::get('sumberdana')) == '') || ((Input::get('idketua2')) == '') || ((Input::get('idketua2')) == '0')){
			$data['statusinput'] = 'failed';
			return Redirect::to('/admin_apkmfinal')->with('statusinput',$data['statusinput']);
		}
		elseif(((Input::get('judul')) != '') && ((Input::get('sumberdana')) != '') && ((Input::get('idketua2')) != '') && ((Input::get('idketua2')) != '0')){
			$nama_file='';
			if (Input::hasFile('namafile'))
			{
				$nama_file=md5(time().rand()).'.'.Input::file('namafile')->getClientOriginalExtension();
				$destinationPath = app_path() . "/File_Akhir_PKM/";
				Input::file('namafile')->move($destinationPath, $nama_file);
			}
			DB::table('laporanakhirpkm')->insert(array(
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
				'keterangan'=>'Tambah data laporan akhir PKM.',
				'tanggalwaktu'=>date('Y-m-d H:i:s'),
				'iduserhistory'=>Session::get('iduser')
				));
		}
		return Redirect::to('/adminpkmfinal')->with('statusinput',$data['statusinput']);
	}

	public function adminfile(){
		$statusinput = 'success';
		if (Session::has('statusinput')){
			$statusinput = Session::get('statusinput');
			Session::forget('statusinput');
		}
		$data['statusinput'] = $statusinput;
		$data['user']=DB::table('user')
		->where('username','=',Session::get('username'))
		->where('iduser','=',Session::get('iduser'))
		->get();
		$data['berkas']=DB::table('berkas')
		->orderby('keterangan')->get();
		$thnsekarang=idate('Y');
		if (Session::has('message')) {
			$data['message'] = Session::get('message');
			Session::forget('message');
		}
		return View::make('admin.halamanfile',$data)->with('thnsekarang', $thnsekarang);
	}

	public function adminmessage(){
		$statusinput = 'success';
		if (Session::has('statusinput')){
			$statusinput = Session::get('statusinput');
			Session::forget('statusinput');
		}
		$data['statusinput'] = $statusinput;
		$data['user']=DB::table('user')
		->where('username','=',Session::get('username'))
		->where('iduser','=',Session::get('iduser'))
		->get();
		$data['saran']=DB::table('saran')
		->orderby('id_saran', 'desc')->get();
		$thnsekarang=idate('Y');
		if (Session::has('message')) {
			$data['message'] = Session::get('message');
			Session::forget('message');
		}
		return View::make('admin.saran',$data)->with('thnsekarang', $thnsekarang);
	}

	public function halamantambahfile(){
		$data['user']=DB::table('user')
		->where('username','=',Session::get('username'))
		->where('iduser','=',Session::get('iduser'))
		->get();
		$thnsekarang=idate('Y');
		if (Session::has('message')) {
			$data['message'] = Session::get('message');
			Session::forget('message');
		}
		$statusinput = 'success';
		if (Session::has('statusinput')){
			$statusinput = Session::get('statusinput');
			Session::forget('statusinput');
		}
		$data['statusinput'] = $statusinput;
		return View::make('admin.tambahfile',$data)->with('thnsekarang', $thnsekarang);
	}

	public function proses_tambahberkas(){
		$data['statusinput'] = 'success';
		if((Input::get('nama')) == ''){
			$data['statusinput'] = 'failed';
			return Redirect::to('/admin_addfile')->with('statusinput',$data['statusinput']);
		}
		elseif((Input::get('nama')) != ''){
			$nama_file='';
			if (Input::hasFile('namafile'))
			{
				$nama_file=Input::file('namafile')->getClientOriginalName();
				$destinationPath = app_path() . "/Berkas/";
				Input::file('namafile')->move($destinationPath, $nama_file);
			}
			DB::table('berkas')->insert(
				[
					'keterangan'=>Input::get('nama'),
					'namafile'=>$nama_file,
					'tanggalwaktu'=>date('Y-m-d H:i:s')]
				);
			date_default_timezone_set('Asia/Jakarta');
			DB::table('history')->insert(array(
				'keterangan'=>'Tambah data file.',
				'tanggalwaktu'=>date('Y-m-d H:i:s'),
				'iduserhistory'=>Session::get('iduser')
				));
		}
		return Redirect::to('/adminfile')->with('statusinput',$data['statusinput']);
	}

	public function ubahberkas($id_berkas){
		$statusinput = 'success';
		if (Session::has('statusinput')){
			$statusinput = Session::get('statusinput');
			Session::forget('statusinput');
		}
		$data['berkas']=DB::table('berkas')->where('id_berkas','=',$id_berkas)->first();
		$data['user']=DB::table('user')
		->where('username','=',Session::get('username'))
		->where('iduser','=',Session::get('iduser'))
		->get();
		$thnsekarang=idate('Y');
		$data['statusinput'] = $statusinput;
		return View::make('admin.ubahfile',$data)->with('thnsekarang', $thnsekarang);
	}

	public function proses_ubahfile($id_berkas){
		$data['statusinput'] = 'success';
		if((Input::get('nama')) == ''){
			$data['statusinput'] = 'failed';
			return Redirect::to('/admin_editfile/'.$id_berkas)->with('statusinput',$data['statusinput']);
		}
		elseif((Input::get('nama')) != ''){
			if (Input::hasFile('namafile'))
			{
				$nama_file=Input::file('namafile')->getClientOriginalName();
				$destinationPath = app_path() . "/Berkas/";
				Input::file('namafile')->move($destinationPath, $nama_file);
				//update berkas
	   				DB::table('berkas')->where('id_berkas', '=', $id_berkas)->update(array(
						'namafile'=>$nama_file
						));
			}
			//update tabel berkas
			DB::table('berkas')->where('id_berkas','=',$id_berkas)->update(array(
				'keterangan'=>Input::get('nama'),
				'tanggalwaktu'=>date('Y-m-d H:i:s')
				));
			date_default_timezone_set('Asia/Jakarta');
			DB::table('history')->insert(array(
				'keterangan'=>'Ubah data file dengan ID '.$id_berkas.'.',
				'tanggalwaktu'=>date('Y-m-d H:i:s'),
				'iduserhistory'=>Session::get('iduser')
				));
		}
		return Redirect::to('/adminfile')->with('statusinput',$data['statusinput']);
	}

	public function hapusberkas($id_berkas){
		$data['berkas']=DB::table('berkas')->where('id_berkas','=',$id_berkas)->delete();
		date_default_timezone_set('Asia/Jakarta');
		DB::table('history')->insert(array(
			'keterangan'=>'Hapus data file dengan ID '.$id_berkas.'.',
			'tanggalwaktu'=>date('Y-m-d H:i:s'),
			'iduserhistory'=>Session::get('iduser')
			));
		return Redirect::to('/adminfile');
	}

	public function hapussaran($id_saran){
		$data['saran']=DB::table('saran')->where('id_saran','=',$id_saran)->delete();
		date_default_timezone_set('Asia/Jakarta');
		DB::table('history')->insert(array(
			'keterangan'=>'Hapus data saran dengan ID '.$id_saran.'.',
			'tanggalwaktu'=>date('Y-m-d H:i:s'),
			'iduserhistory'=>Session::get('iduser')
			));
		return Redirect::to('/adminmessage');
	}

	public function ubahsaran($id_saran){
		$statusinput = 'success';
		if (Session::has('statusinput')){
			$statusinput = Session::get('statusinput');
			Session::forget('statusinput');
		}
		$data['saran']=DB::table('saran')->where('id_saran','=',$id_saran)->first();
		$data['user']=DB::table('user')
		->where('username','=',Session::get('username'))
		->where('iduser','=',Session::get('iduser'))
		->get();
		$thnsekarang=idate('Y');
		$data['statusinput'] = $statusinput;
		return View::make('admin.ubahsaran',$data)->with('thnsekarang', $thnsekarang);
	}

	public function proses_ubahsaran($id_saran){
		$data['statusinput'] = 'success';
		if(((Input::get('nama')) == '') || ((Input::get('msg')) == '')){
			$data['statusinput'] = 'failed';
			return Redirect::to('/admin_editmessage/'.$id_saran)->with('statusinput',$data['statusinput']);
		}
		elseif(((Input::get('nama')) != '') && ((Input::get('msg')) != '')){
			//update tabel saran
			DB::table('saran')->where('id_saran','=',$id_saran)->update(array(
				'nama'=>Input::get('nama'),
				'email'=>Input::get('email'),
				'saran'=>Input::get('msg')
				));
			date_default_timezone_set('Asia/Jakarta');
			DB::table('history')->insert(array(
				'keterangan'=>'Ubah data saran dengan ID '.$id_saran.'.',
				'tanggalwaktu'=>date('Y-m-d H:i:s'),
				'iduserhistory'=>Session::get('iduser')
				));
		}
		return Redirect::to('/adminmessage')->with('statusinput',$data['statusinput']);
	}
}