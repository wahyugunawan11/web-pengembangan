<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>Aktifitas Penelitian | KaLemlit | Pangkalan Data Penelitian</title>
		<body>
			<style type="text/css">
				.tg  {border-collapse:collapse;border-spacing:0;border-color:#ccc;width: 100%; }
				.tg td{font-family:Arial;font-size:12px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#fff;}
				.tg th{font-family:Arial;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#f0f0f0;}
				.tg .tg-3wr7{font-weight:bold;font-size:12px;font-family:"Arial", Helvetica, sans-serif !important;;text-align:center}
				.tg .tg-ti5e{font-size:10px;font-family:"Arial", Helvetica, sans-serif !important;;text-align:center}
				.tg .tg-rv4w{font-size:10px;font-family:"Arial", Helvetica, sans-serif !important;}
				table.subTable{
					background-color: transparent;
				}
				tr.subTable{
					background-color: transparent;
				}
				td.subTable{
					background-color: transparent;
				}
			</style>
			<div style="font-family:Arial; font-size:12px;">
				<center><h2>REKAP DATA PENELITIAN</h2></center>	
			</div>
			<br>
			<table class="subTable" border="0">
        		<tr class="subTable">
        			<td valign="middle" class="subTable">Tahun:</td>
        			<td class="subTable"><?php echo $tahun2; ?></td>
		        </tr>
		        <tr class="subTable">
		        	<td valign="middle" class="subTable">Skim Penelitian:</td>
		        	<?php
		        	foreach($skimpenelitianpilihan as $skimpenelitianp2){
		        		echo "<td class='subTable'>".$skimpenelitianp2->skim."</td>";
		        	}
		        	?>
		        </tr>
            </table>
			<table class="tg">
				<tr>
			    	<th class="tg-3wr7">No.<br></th>
			    	<th class="tg-3wr7">Fakultas<br></th>
			    	<th class="tg-3wr7">Jumlah<br></th>
			  	</tr>
			  	<?php
			  	$i = 1;
			  	?>
			  	<?php
			  	foreach ($laporanakhir as $fakultas=>$total){
			  		echo '<tr>
			  				<td class="tg-rv4w" width="10%"><center>'.$i++.'</center></td>
			  				<td class="tg-rv4w" width="80%">'.$fakultas.'</td>
			  				<td class="tg-rv4w" width="10%">'.$total.'</td>
			  			</tr>';
			  	}
			  	?>
			</table>
		</body>
	</head>
</html>