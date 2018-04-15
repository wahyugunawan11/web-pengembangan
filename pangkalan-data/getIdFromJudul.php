<?php
include ("koneksi.php");
$njudul = $_POST['njudul'];
$query = "select sumberdana, abstrak, proposalidprodi, programstudi, pidskimpenelitian, skim, proposalidbidilmu, bidangilmu, proposalidfakultas, fakultas, proposalidketua, ketua, pidanggota1, anggota1, pidanggota2, anggota2, pidanggota3, anggota3, pidanggota4, dosen.nama as anggota4, anggotalain from 
			(select sumberdana, abstrak, proposalidprodi, programstudi, pidskimpenelitian, skim, proposalidbidilmu, bidangilmu, proposalidfakultas, fakultas, proposalidketua, ketua, pidanggota1, anggota1, pidanggota2, anggota2, pidanggota3, dosen.nama as anggota3, pidanggota4, idanggota4, anggotalain from 
				(select sumberdana, abstrak, proposalidprodi, programstudi, pidskimpenelitian, skim, proposalidbidilmu, bidangilmu, proposalidfakultas, fakultas, proposalidketua, ketua, pidanggota1, anggota1, pidanggota2, dosen.nama as anggota2, pidanggota3, idanggota3, pidanggota4, idanggota4, anggotalain from 
					(select sumberdana, abstrak, proposalidprodi, programstudi, pidskimpenelitian, skim, proposalidbidilmu, bidangilmu, proposalidfakultas, fakultas, proposalidketua, ketua, pidanggota1, dosen.nama as anggota1, pidanggota2, idanggota2, pidanggota3, idanggota3, pidanggota4, idanggota4, anggotalain from 
						(select sumberdana, abstrak, proposalidprodi, programstudi, pidskimpenelitian, skim, proposalidbidilmu, bidangilmu, proposalidfakultas, fakultas, proposalidketua, dosen.nama as ketua, pidanggota1, idanggota1, pidanggota2, idanggota2, pidanggota3, idanggota3, pidanggota4, idanggota4, anggotalain from 
							(select sumberdana, abstrak, proposalidprodi, programstudi, pidskimpenelitian, skimpenelitian.skim as skim, proposalidbidilmu, bidangilmu, proposalidfakultas, fakultas, proposalidketua, idketua, pidanggota1, idanggota1, pidanggota2, idanggota2, pidanggota3, idanggota3, pidanggota4, idanggota4, anggotalain from
								(select sumberdana, abstrak, proposal.idprodi as proposalidprodi, programstudi.programstudi as programstudi, proposal.idskimpenelitian as pidskimpenelitian, idskimpenelitian, proposal.idbidilmu as proposalidbidilmu, bidangilmu.bidangilmu as bidangilmu, proposal.idfakultas as proposalidfakultas, fakultas.fakultas as fakultas, proposal.idketua as proposalidketua, idketua, proposal.idanggota1 as pidanggota1, idanggota1, proposal.idanggota2 as pidanggota2, idanggota2, proposal.idanggota3 as pidanggota3, idanggota3, proposal.idanggota4 as pidanggota4, idanggota4, anggotalain from proposal left join programstudi on proposal.idprodi=programstudi.idprodi left join bidangilmu on proposal.idbidilmu=bidangilmu.idbidilmu left join fakultas on proposal.idfakultas=fakultas.idfakultas)
							as tprogramstudi left join skimpenelitian on tprogramstudi.idskimpenelitian=skimpenelitian.idskimpenelitian)
						as tketua left join dosen on tketua.idketua=dosen.iddosen) 
					as t1 left join dosen on t1.idanggota1=dosen.iddosen) 
				as t2 left join dosen on t2.idanggota2=dosen.iddosen) 
			as t3 left join dosen on t3.idanggota3=dosen.iddosen) 
		as t4 left join dosen on t4.idanggota4=dosen.iddosen where judul='$njudul' limit 1";
$result = mysql_query($query);
$raw_data = mysql_fetch_assoc($result);
echo json_encode($raw_data);
?>