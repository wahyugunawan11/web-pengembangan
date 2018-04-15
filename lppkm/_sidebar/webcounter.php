<?php
	$ip   = get_client_ip();
	$tanggal = date("Ymd");
	$waktu  = time();
	$bln=date("m");
	$tgl=date("d");
	$blan=date("Y-m");
	$thn=date("Y");
	$tglk=$tgl-1;
 
    $s = $db->runQuery("SELECT ip FROM web_counter WHERE ip='$ip' AND tanggal='$tanggal'");
 
	if($db->dbRows($s) == 0){
		$db->runQuery("INSERT INTO web_counter(ip, tanggal, hits, online) VALUES('$ip','$tanggal','1','$waktu')");
	}else{
		$db->runQuery("UPDATE web_counter SET hits=hits+1, online='$waktu' WHERE ip='$ip' AND tanggal='$tanggal'");
	}

    /*if($tglk=='1' | $tglk=='2' | $tglk=='3' | $tglk=='4' | $tglk=='5' | $tglk=='6' | $tglk=='7' | $tglk=='8' | $tglk=='9'){
		$kemarin=$db->runQuery("SELECT * FROM web_counter WHERE tanggal='$thn-$bln-0$tglk'");
    }else{
		$kemarin=$db->runQuery("SELECT * FROM web_counter WHERE tanggal='$thn-$bln-$tglk'");
    }*/

    $bulan=$db->runQuery("SELECT ip FROM web_counter WHERE tanggal LIKE '%$blan%'");
    $bulan1=$db->dbRows($bulan);
    $tahunini=$db->runQuery("SELECT ip FROM web_counter WHERE tanggal LIKE '%$thn%'");
    $tahunini1=$db->dbRows($tahunini);

    $q_pengunjung 	= $db->runQuery("SELECT ip FROM web_counter WHERE tanggal='$tanggal' GROUP BY ip");
	$pengunjung       = $db->dbRows($q_pengunjung);
	
	$q_totalpengunjung =  $db->runQuery("SELECT COUNT(hits) as hitstotal FROM web_counter");
	$q_=$db->dbFetch($q_totalpengunjung);
	$totalpengunjung  = $q_['hitstotal'];

	$q_hits= $db->runQuery("SELECT SUM(hits) as hitstoday FROM web_counter WHERE tanggal='$tanggal' GROUP BY tanggal");
	$hits =$db->dbFetch($q_hits);
	//$hits             = $h_['hitstoday'];

	$q_totalhits =  $db->runQuery("SELECT SUM(hits) as hitsum FROM web_counter");
	$r_=$db->dbFetch($q_totalhits);
	$totalhits  = $r_['hitsum'];

	//$totalhits        = mysql_result(mysql_query("SELECT SUM(hits) FROM web_counter"), 0); 
	$bataswaktu       = time() - 300;
	$q_pengunjungonline = $db->runQuery("SELECT ip FROM web_counter WHERE online > '$bataswaktu'");
	$pengunjungonline = $db->dbRows($q_pengunjungonline);
	//$kemarin1 = $db->dbRows($kemarin);
 
 
 
    echo " 
	<table width='100%' border='0'>
		<tbody>
		<tr>
            <td align='right' valign='middle'><img src='img/online.png' width='16' height='16'></td>
			<td width='98' align='left' valign='middle'>Now Online</td>
			<td width='138' align='left' valign='middle'>: <b>$pengunjungonline</b> User</td>
        </tr>
		<tr>
			<td width='32' align='right' valign='middle'><img src='img/hariini.png' width='16' height='16'></td>
			<td width='98' align='left' valign='middle'> Hari Ini</td>
			<td width='138' align='left' valign='middle'>: $pengunjung</td>
		</tr>
		<!--<tr>
		  	<td align='right' valign='middle'><img src='img/hariini.png' width='16' height='16'></td>
		  	<td align='left' valign='middle'>Kemarin</td>
		  	<td align='left' valign='middle'>: $kemarin1</td>
		</tr> -->
		<tr>
		  	<td align='right' valign='middle'><img src='img/hariini.png' width='16' height='16'></td>
		  	<td align='left' valign='middle'>Bulan ini </td>
		  	<td align='left' valign='middle'> : $bulan1</td>
		</tr>
		<tr>
		  	<td align='right' valign='middle'><img src='img/hariini.png' width='16' height='16'></td>
		  	<td align='left' valign='middle'>Tahun ini </td>
		  	<td align='left' valign='middle'>:
			  $tahunini1</td>
		</tr>
		<tr>
		  	<td align='right' valign='middle'><img src='img/line_chart.png' width='16' height='16'></td>
		  	<td align='left' valign='middle'>Today Hits Count </td>
		  	<td align='left' valign='middle'>: $hits[hitstoday]</td>
		</tr>
		<tr>
		  	<td align='right' valign='middle'><img src='img/bar_chart.png' width='16' height='16'></td>
		  	<td width='98' align='left' valign='middle'>Total Hits</td>
		 	<td width='138' align='left' valign='middle'>: $totalhits</td>
		</tr>
    </tbody>
	</table>";
?>