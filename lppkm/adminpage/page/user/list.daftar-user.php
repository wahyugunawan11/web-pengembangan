<?php
	session_start();
	$idlogin=$_SESSION['login-d56b699830']['id'];
	/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
	 * Easy set variables
	 */
	
	/* Array of database columns which should be read and sent back to DataTables. Use a space where
	 * you want to insert a non-database field (for example a counter or static image)
	 */
	$aColumns = array('username','nama_lengkap');
	
	/* Indexed column (used for fast and accurate table cardinality) */
	$sIndexColumn = "id";
	
	/* DB table to use */
	$sTable = "tb_user ";
	
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
	$sOrder = "";
	if ( isset( $_GET['iSortCol_0'] ) )
	{
		$sOrder = "ORDER BY  ";
		for ( $i=0 ; $i<intval( $_GET['iSortingCols'] ) ; $i++ )
		{
			if ( $_GET[ 'bSortable_'.intval($_GET['iSortCol_'.$i]) ] == "true" )
			{
				$sOrder .= "".$aColumns[ intval( $_GET['iSortCol_'.$i] ) ]." ".
					($_GET['sSortDir_'.$i]==='desc' ? 'asc' : 'desc') .", ";
			}
		}
		
		$sOrder = substr_replace( $sOrder, "", -2 );
		if ( $sOrder == "ORDER BY" )
		{
			$sOrder = "";
		}
	}
	
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


	if(ADMIN_BID!=0){
		$filterbidang="AND id_bidang='".ADMIN_BID."' ";
	}else{
		$filterbidang="";
	}

	$where2="";
	if($sWhere!=''){
		$where2="AND id <> $idlogin $filterbidang ";
	}else{
		$where2="WHERE id <> $idlogin $filterbidang ";
	}

	/*
	 * SQL queries
	 * Get data to display
	 */
	$sQuery0 = "
	SELECT id,username,(SELECT nm_bidang FROM tb_bidang WHERE id=tb_user.id_bidang) as nmbidang,pwd,level,nama_lengkap,jabatan,nip,email,aktif
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
		SELECT COUNT(id) as total FROM tb_user WHERE id<> '$idlogin'
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
		if(ADMIN_BID=='0'){
			$ket="<br/>Bidang :".($aRow['nmbidang']!=""?$aRow['nmbidang']:"Tidak Ada");
		}else{
			$ket="";
		}
		if($aRow['aktif']=="N"){
			$badge=' - <span class="label label-warning"> tidak aktif</span>';
			$tombol='<li role="presentation">
								<a role="menuitem" tabindex="-1" href="#" onClick="AktifkanUser('.$aRow['id'].')">
									<i class="clip-checkmark-circle-2"></i> Aktifkan User
								</a>
							</li>';
		}else{
			$badge='';
			$tombol='<li role="presentation">
								<a role="menuitem" tabindex="-1" href="#" onClick="NonaktifkanUser('.$aRow['id'].')">
									<i class="clip-cancel-circle-2"></i> Nonaktifkan
								</a>
							</li>';
		}

		$row[0]=$aRow['nama_lengkap'].$badge."<br/><strong>(<em>".$aRow['username']."</em>)</strong> $ket";
		$row[1]=$aRow['jabatan'];
		$row[2]=$aRow['nip'];
		$aksi='<div class="btn-group">
						<a class="btn btn-primary dropdown-toggle btn-sm" data-toggle="dropdown" href="#">
							<i class="icon-cog"></i> <span class="caret"></span>
						</a>
						<ul role="menu" class="dropdown-menu pull-right">
							'.$tombol.'
							<li role="presentation">
								<a role="menuitem" tabindex="-1" href="#" onClick="EditUser('.$aRow['id'].')">
									<i class="icon-edit"></i> Edit
								</a>
							</li>							
							<li role="presentation">
								<a role="menuitem" tabindex="-1" href="#" onClick="HapusUser('.$aRow['id'].')">
									<i class="icon-remove"></i> Hapus
								</a>
							</li>
						</ul>
					</div>';
		$row[3]=show_level($aRow['level']);
		$row[4]=$aksi;

		$output['aaData'][] = $row;
		// print_r($row);
		
	}
	
	echo json_encode( $output );
?>