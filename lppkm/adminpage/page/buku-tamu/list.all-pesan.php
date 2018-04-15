<?php
	/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
	 * Easy set variables
	 */
	
	/* Array of database columns which should be read and sent back to DataTables. Use a space where
	 * you want to insert a non-database field (for example a counter or static image)
	 */
	$aColumns = array('tk.nama_lengkap','tk.komentar');
	
	/* Indexed column (used for fast and accurate table cardinality) */
	$sIndexColumn = "tk.id";
	
	/* DB table to use */
	$sTable = "tb_komentar tk ";
	
	/* Database connection information */
	include ("../../../inc/helper.php");
	include ("../../../inc/konfigurasi.php");
	include ("../../../inc/db.pdo.class.php");

	$db=new dB($dbsetting);
	
	/* 
	 * Paging
	 */
	$sLimit = "";
	if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' )
	{
		$sLimit = "LIMIT ".intval( $_GET['iDisplayStart'] ).", ".
			intval( $_GET['iDisplayLength'] );
	}
	
	
	/*
	 * Ordering
	 */
	$sOrder = "ORDER BY tk.tgl DESC, tk.waktu DESC";
	
	/* 
	 * Filtering
	 * NOTE this does not match the built-in DataTables filtering which does it
	 * word by word on any field. It's possible to do here, but concerned about efficiency
	 * on very large tables, and MySQL's regex functionality is very limited
	 */
	$sWhere = "";
	if ( isset($_GET['sSearch']) && $_GET['sSearch'] != "" )
	{
		$sWhere = "WHERE (";
		for ( $i=0 ; $i<count($aColumns) ; $i++ )
		{
			if ( isset($_GET['bSearchable_'.$i]) && $_GET['bSearchable_'.$i] == "true" )
			{
				$sWhere .= "".$aColumns[$i]." LIKE '%".$_GET['sSearch']."%' OR ";
			}
		}
		$sWhere = substr_replace( $sWhere, "", -3 );
		$sWhere .= ')';
	}
	
	/* Individual column filtering */
	for ( $i=0 ; $i<count($aColumns) ; $i++ )
	{
		if ( isset($_GET['bSearchable_'.$i]) && $_GET['bSearchable_'.$i] == "true" && $_GET['sSearch_'.$i] != '' )
		{
			if ( $sWhere == "" )
			{
				$sWhere = "WHERE ";
			}
			else
			{
				$sWhere .= " AND ";
			}
			$sWhere .= "".$aColumns[$i]." LIKE '%".$_GET['sSearch_'.$i]."%' ";
		}
	}
	$where2="";
	if($sWhere!=''){
		$where2="AND tk.jenis = 'BT'";
	}else{
		$where2="WHERE tk.jenis = 'BT'";
	}
	/*
	 * SQL queries
	 * Get data to display
	 */
	$sQuery0 = "
	SELECT tk.id,
		tk.nama_lengkap,
		tk.komentar,
		tk.tgl,
		tk.waktu,
		tk.email,
		tk.publish,
		tk.baca
	FROM   $sTable
		$sWhere
		$where2
		$sOrder 
		";

	$db->runQuery($sQuery0);
	$iFilteredTotal = $db->dbRows();

	$result=$db->runQuery($sQuery0.$sLimit);

	/* Total data set length */
	$sQuery2 = "
		SELECT COUNT(tk.id) as total FROM tb_komentar tk WHERE tk.jenis = 'BT'
	";
	$db->runQuery($sQuery2);
	$aResultTotal = $db->dbFetch();
	$iTotal = $aResultTotal['total'];

	/*$rResultTotal = mysql_query( $sQuery, $gaSql['link'] ) or fatal_error( 'MySQL Error: ' . mysql_errno() );
	$aResultTotal = mysql_fetch_array($rResultTotal);
	$iTotal = $aResultTotal[0];*/
	
	
	/*
	 * Output
	 */

	$output = array(
		"sEcho" => intval($_GET['sEcho']),
		"iTotalRecords" => $iTotal,
		"iTotalDisplayRecords" => $iFilteredTotal,
		"aaData" => array()
	);
	
	while ( $aRow = $db->dbFetch($result) )
	{
		//print_r($aRow);
		$row = array();

		$row[0]=$aRow['nama_lengkap'];
		if($aRow['publish']=="N"){
			$badge=' - <span class="label label-warning"> tidak dipublikasikan</span>';
		}else{
			$badge='';
		}
		$row[1]=$aRow['komentar'].$badge;
		$row[2]=tanggalIndo($aRow['tgl']." ".$aRow['waktu'],'j F Y H:i');
		$aksi='<a class="btn btn-xs btn-info" onClick="lihatKomentar('.$aRow['id'].')" href="#"><i class="icon-circle-arrow-right"></i>
		Lihat Pesan</a>';
		$row[3]=$aksi;

		$output['aaData'][] = $row;
		// print_r($row);
		
	}
	
	echo json_encode( $output );
?>