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
		$sLimit = "LIMIT ".intval( $_GET['iDisplayStart'] ).", ".
			intval( $_GET['iDisplayLength'] );
	}
	
	
	/*
	 * SQL queries
	 * Get data to display
	 */
	/*$sQuery0 = "
		SELECT tk.id,tk.nama_kategori,COUNT(ta.id) as jlh_galeri
		FROM  tb_galeri ta LEFT JOIN tb_kategori tk ON(tk.id=ta.id_kategori)
		WHERE ta.kel_galeri='B'
		GROUP BY tk.nama_kategori 
		";*/
	$sQuery0=" SELECT * FROM tb_linkterkait ORDER BY `order`";
	//echo $sQuery0;
	$db->runQuery($sQuery0);
	$iFilteredTotal = $db->dbRows();

	$result=$db->runQuery($sQuery0.$sLimit);

	/* Total data set length */
	$sQuery2 = "
		SELECT COUNT(id) as total FROM tb_linkterkait";
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
		$publish='';
		if($aRow['publish']=="Y"){
			$publish='<li role="presentation">
						<a role="menuitem" tabindex="-1" href="#" onClick="UnPublishLink('.$aRow['id'].')">
							<i class="clip-world"></i> Sembunyikan Link
						</a>
					</li>';
			$button="btn-primary";
		}else{
			$publish='<li role="presentation">
						<a role="menuitem" tabindex="-1" href="#" onClick="PublishLink('.$aRow['id'].')">
							<i class=" clip-earth-2"></i> Publikasikan Link
						</a>
					</li>';
			$button="btn-orange";
		}
		$row[0]=$aRow['nama'];
		$row[1]=$aRow['url'];
		$tombolaksi='<div class="btn-group">
						<a class="btn '.$button.' dropdown-toggle btn-sm" data-toggle="dropdown" href="#">
							<i class="icon-cog"></i> <span class="caret"></span>
						</a>
						<ul role="menu" class="dropdown-menu pull-right">
							'.$publish.'
							<li role="presentation">
								<a role="menuitem" tabindex="-1" href="#" onClick="EditLink('.$aRow['id'].')">
									<i class="icon-edit"></i> Edit
								</a>
							</li>							
							<li role="presentation">
								<a role="menuitem" tabindex="-1" href="#" onClick="HapusLink('.$aRow['id'].')">
									<i class="icon-remove"></i> Hapus
								</a>
							</li>
						</ul>
					</div>';

		$row[2]=$tombolaksi;
		$row[3]='<div class="btn-group-vertical"><a class="btn btn-xs btn-orange" onClick="moveup(\''.($aRow['id']).'\')" href="#"><i class="clip-arrow-up"></i></a>
		<a class="btn btn-xs btn-info" onClick="movedown(\''.($aRow['id']).'\')" href="#"><i class="clip-arrow-down"></i></a></div>';

		$output['aaData'][] = $row;
		// print_r($row);
		
	}
	
	echo json_encode( $output );
?>