<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>Aktifitas Penelitian | Administrator | Pangkalan Data Penelitian</title>
		{{HTML::script('/js/highcharts.js')}}
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
		<script>
		$(function () {
    		$('#graf').highcharts({
        		chart: {
            		plotBackgroundColor: null,
            		plotBorderWidth: null,
            		plotShadow: false,
            		type: 'pie'
        		},
        		title: {
            		text: 'Data Penelitian'
        		},
        		tooltip: {
            		pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        		},
        		plotOptions: {
            		pie: {
                		allowPointSelect: true,
                		cursor: 'pointer',
                		dataLabels: {
                    		enabled: true,
                    		format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    		style: {
                        		color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    		}
                		}
            		}
        		},
        		series: [{
            		name: "Total",
            		colorByPoint: true,
            		data: {{$datalaporanakhir2}}
        		}]
    		});
		});
		</script>
	</head>
	<body>
		<div style="font-family:Arial; font-size:12px;">
			<center><h2>REKAP DATA PENELITIAN
				<br>LPPKM UNIVERSITAS TANJUNGPURA</h2></center>
		</div>
		<br>
		<table class="subTable" border="0">
			<tr class="subTable">
				<td valign="middle" class="subTable">Tahun:</td>
				<td class="subTable">{{$tahun2}}</td>
			</tr>
			<tr class="subTable">
				<td valign="middle" class="subTable">Skim Penelitian:</td>
				@foreach($skimpenelitianpilihan as $skimpenelitianp2)
				<td class='subTable'>{{$skimpenelitianp2->skim}}
				@endforeach
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
			@foreach($laporanakhir as $fakultas=>$total)
			<tr>
			  	<td class="tg-rv4w" width="10%"><center>{{$i++}}</center></td>
			  	<td class="tg-rv4w" width="80%">{{$fakultas}}</td>
			  	<td class="tg-rv4w" width="10%">{{$total}}</td>
			</tr>
			@endforeach
		</table>
		<div id="graf" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
	</body>
</html>