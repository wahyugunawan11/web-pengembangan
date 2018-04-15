<link rel="stylesheet" type="text/css" href="assets/plugins/select2/select2.css" />
<link rel="stylesheet" href="assets/plugins/DataTables/media/css/DT_bootstrap.css" />		
<link href="assets/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/bootstrap-modal/css/bootstrap-modal.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="assets/plugins/gritter/css/jquery.gritter.css">

<script type="text/javascript" src="assets/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="assets/plugins/DataTables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/plugins/DataTables/media/js/DT_bootstrap.js"></script>
<script src="assets/plugins/bootstrap-modal/js/bootstrap-modal.js"></script>
<script src="assets/plugins/bootstrap-modal/js/bootstrap-modalmanager.js"></script>
<script src="assets/plugins/gritter/js/jquery.gritter.min.js"></script>
<script>
	jQuery(document).ready(function() {
		Main.init();
		$("#myTab").tab();
		$("#list-newkomentar").dataTable({
			"iDisplayLength": 5,
			"aLengthMenu": [
                [5, 10, 15, 20, 50, -1],
                [5, 10, 15, 20, 50, "All"] // change per page values here
            ],
			"bProcessing": true,
			"bServerSide": true,
			"bSort": false,
			"bFilter": false,
			"sAjaxSource": "page/buku-tamu/list.new-pesan.php",
			"oLanguage": {
	            "sLengthMenu": "Menampilkan _MENU_ Data per halaman",
	            "sZeroRecords": "Maaf, Data tidak ada",
	            "sInfo": "Menampilkan _START_ s/d _END_ dari _TOTAL_ data",
	            "sInfoEmpty": "Menampilakan 0 s/d 0 dari 0 data",
	            "sSearch": "",
	            "sInfoFiltered": "",
	            "oPaginate": {
                    "sPrevious": "",
                    "sNext": ""
                }
	        },
	        "aoColumnDefs": [
		      { "sClass": "text-center", "aTargets": [ 3 ] }
		    ]
		});

		$("#list-allkomentar").dataTable({
			"iDisplayLength": 5,
			"aLengthMenu": [
                [5, 10, 15, 20, 50, 100, -1],
                [5, 10, 15, 20, 50, 100, "All"] // change per page values here
            ],
			"bProcessing": true,
			"bSort": false,
			"bServerSide": true,
			"sAjaxSource": "page/buku-tamu/list.all-pesan.php",
			"oLanguage": {
	            "sLengthMenu": "Menampilkan _MENU_ Data per halaman",
	            "sZeroRecords": "Maaf, Data tidak ada",
	            "sInfo": "Menampilkan _START_ s/d _END_ dari _TOTAL_ data",
	            "sInfoEmpty": "Menampilakan 0 s/d 0 dari 0 data",
	            "sSearch": "",
	            "sInfoFiltered": "",
	            "oPaginate": {
                    "sPrevious": "",
                    "sNext": ""
                }
	        }/*,"aoColumns": [
			    { "sWidth": "200%" },
			    null,
			    { "sWidth": "20%" },
			    { "sWidth": "20%" }
			]*/,
	        "aoColumnDefs": [
		      { "sClass": "text-center", "aTargets": [ 3 ] }
		    ]
		});

		$('#list-allkomentar_wrapper .dataTables_filter input,#list-newkomentar_wrapper .dataTables_filter input').addClass("form-control input-sm").attr("placeholder", "Search");
        $('#list-allkomentar_wrapper .dataTables_length select, #list-newkomentar_wrapper .dataTables_length select').addClass("m-wrap small");
        $('#list-allkomentar_wrapper .dataTables_length select, #list-newkomentar_wrapper .dataTables_length select').select2();


		$("#btnKomAccept").click(function(){
			if(confirm("Publikasikan Pesan ini???")){
				$.ajax({
					url:'page/buku-tamu/act.buku-tamu.php',
					type:'post',
					dataType:'json',
					cache:false,
					data:$("#form-komentar").serialize()+'&act=acceptkomentar',
					success:function(json){
						if(json.result){
							$.gritter.add({
								title:'Sukses',
				                time: 1000,
				                text: json.msg,
				                after_close: function(){
									$("#list-newkomentar").dataTable().fnDraw();
									$("#list-allkomentar").dataTable().fnDraw();
									$("#komentar").modal('hide');
								}
					        });
							
						}else{
							$.gritter.add({
								title:'Kesalahan',
				                time: 4000,
				                text: json.msg
					        });
						}
					}
				});
				return false;
			}
			return false;
		});

		$("#btnKomHapus").click(function(){
			if(confirm("Hapus Pesan ini???")){
				$.ajax({
					url:'page/buku-tamu/act.buku-tamu.php',
					type:'post',
					dataType:'json',
					cache:false,
					data:$("#form-komentar").serialize()+'&act=hapuskomentar',
					success:function(json){
						if(json.result){
							$.gritter.add({
								title:'Sukses',
				                time: 1000,
				                text: json.msg,
				                after_close: function(){
									$("#list-newkomentar").dataTable().fnDraw();
									$("#list-allkomentar").dataTable().fnDraw();
									$("#komentar").modal('hide');
								}
					        });
							
						}else{
							$.gritter.add({
							title:'Kesalahan',
			                time: 4000,
			                text: json.msg
				        });
						}
					}
				});	
				return false;					
			}
			return false;
		});

		$("#btnKomDecline").click(function(){
			if(confirm("Sembunyikan Pesan ini???")){
				$.ajax({
					url:'page/buku-tamu/act.buku-tamu.php',
					type:'post',
					dataType:'json',
					cache:false,
					data:$("#form-komentar").serialize()+'&act=declinekomentar',
					success:function(json){
						if(json.result){
							$.gritter.add({
								title:'Sukses',
				                time: 1000,
				                text: json.msg,
				                after_close: function(){
									$("#list-newkomentar").dataTable().fnDraw();
									$("#list-allkomentar").dataTable().fnDraw();
									$("#komentar").modal('hide');
								}
					        });
							
						}else{
							$.gritter.add({
								title:'Kesalahan',
				                time: 4000,
				                text: json.msg
					        });
						}
					}
				});
				return false;
			}
			return false;
		});
	});

	function lihatKomentar(id){
		//$("#komentar").modal('show');
		$.ajax({
			url:'page/buku-tamu/act.buku-tamu.php',
			type:'post',
			dataType:'json',
			cache:false,
			data:'act=lihatkomentar&komentar='+id,
			success:function(json){
				if(json.result){
					$("#idkom").val(json.idkom);
					$("#nama_lengkap").html(json.nama_lengkap);
					$("#email").html(json.email);
					$("#tgl").html(json.tgl);
					$("#isikomentar").html(json.komentar);
					if(json.publish=='Y'){
						$("#btnKomAccept").hide();
						$("#btnKomDecline").show();
					}else{
						$("#btnKomAccept").show();
						$("#btnKomDecline").hide();
					}
					$("#komentar").modal('show');
				}else{
					$.gritter.add({
						title:'Kesalahan',
		                time: 1000,
		                text: json.msg
			        });
				}
			}
		});
	}
</script>