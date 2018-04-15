<?php

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
		$sLimit = " LIMIT ".intval( $_GET['iDisplayStart'] ).", ".
			intval( $_GET['iDisplayLength'] );
	}
	
	
	/*
	 * SQL queries
	 * Get data to display
	 */
	$sQuery0="SELECT * FROM tb_bidang ORDER BY id";
	//echo $sQuery0;
	$db->runQuery($sQuery0);
	$iFilteredTotal = $db->dbRows();

	$result=$db->runQuery($sQuery0.$sLimit);

	/* Total data set length */
	$sQuery2 = "SELECT COUNT(id) as total FROM tb_bidang";
	$db->runQuery($sQuery2);
	$aResultTotal = $db->dbFetch();
	$iTotal = $aResultTotal['total'];

	
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

		$row[0]=$aRow['nm_bidang'];
		$tombolaksi='<div class="btn-group">
						<a class="btn btn-primary dropdown-toggle btn-sm" data-toggle="dropdown" href="#">
							<i class="icon-cog"></i> <span class="caret"></span>
						</a>
						<ul role="menu" class="dropdown-menu pull-right">
							<li role="presentation">
								<a role="menuitem" tabindex="-1" href="#" onClick="EditBidang('.$aRow['id'].')">
									<i class="icon-edit"></i> Edit
								</a>
							</li>							
							<li role="presentation">
								<a role="menuitem" tabindex="-1" href="#" onClick="HapusBidang('.$aRow['id'].')">
									<i class="icon-remove"></i> Hapus
								</a>
							</li>
						</ul>
					</div>';

		$row[1]=$tombolaksi;

		$output['aaData'][] = $row;
		// print_r($row);
		
	}
	
	echo json_encode( $output );
?>