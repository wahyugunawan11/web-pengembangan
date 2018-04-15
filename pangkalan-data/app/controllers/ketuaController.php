<?php

class ketuaController extends BaseController{
	public function hproposalpkmketua(){
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
		return View::make('chief.proposalpkm', $data)->with('thnsekarang', $thnsekarang);
	}

	public function dproposalpkmketua($idproposalpkm){
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
		$data['user']=DB::table('user')
		->where('username','=',Session::get('username'))
		->where('iduser','=',Session::get('iduser'))
		->get();
		$thnsekarang=idate('Y');
		return View::make('chief.detailproposalpkm',$data)->with('thnsekarang', $thnsekarang);
	}

	public function halamanlkpkmketua(){
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
		return View::make('chief.lkemajuanpkm', $data)->with('thnsekarang', $thnsekarang);
	}

	public function lihatlkpkmketua($idlkemajuanpkm){
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
		$data['user']=DB::table('user')
		->where('username','=',Session::get('username'))
		->where('iduser','=',Session::get('iduser'))
		->get();
		return View::make('chief.detaillkemajuanpkm',$data)->with('thnsekarang', $thnsekarang);
	}

	public function halamanlapkmketua(){
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
		return View::make('chief.lakhirpkm', $data)->with('thnsekarang', $thnsekarang);
	}

	public function lihatlapkmketua($idlakhir_pkm){
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
		$thnsekarang=idate('Y');
		$data['user']=DB::table('user')
		->where('username','=',Session::get('username'))
		->where('iduser','=',Session::get('iduser'))
		->get();
		return View::make('chief.detaillakhirpkm',$data)->with('thnsekarang', $thnsekarang);
	}
}