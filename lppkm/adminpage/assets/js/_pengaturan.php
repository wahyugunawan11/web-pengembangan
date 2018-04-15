<link rel="stylesheet" type="text/css" href="assets/plugins/select2/select2.css" />
<link rel="stylesheet" href="assets/plugins/DataTables/media/css/DT_bootstrap.css" />
<link rel="stylesheet" href="assets/plugins/ckeditor/contents.css">
<link href="assets/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/bootstrap-modal/css/bootstrap-modal.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="assets/plugins/datepicker/css/datepicker.css">
<link rel="stylesheet" href="assets/plugins/gritter/css/jquery.gritter.css">

<script type="text/javascript" src="assets/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="assets/plugins/DataTables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/plugins/DataTables/media/js/DT_bootstrap.js"></script>
<script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="assets/plugins/ckeditor/ckeditor.js"></script>
<script src="assets/plugins/ckeditor/adapters/jquery.js"></script>
<script src="assets/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="assets/plugins/bootstrap-modal/js/bootstrap-modal.js"></script>
<script src="assets/plugins/bootstrap-modal/js/bootstrap-modalmanager.js"></script>
<script src="assets/plugins/gritter/js/jquery.gritter.min.js"></script>
<script>
	jQuery(document).ready(function() {
		Main.init();
		$( '.editor1' ).ckeditor( {
		     height:150
		 } );

		$("#websetting").validate({
			errorPlacement: function(error, element) {
			    error.appendTo( element.parent("div"));
			},
			submitHandler:function(form){
				for ( instance in CKEDITOR.instances ){
			        CKEDITOR.instances[instance].updateElement();
			    }
			    $.ajax({
					url:'page/pengaturan/act.pengaturan.php',
					type:'POST',
					dataType:'json',
					data:$("#websetting").serialize(),
			    	cache: false,
					beforeSend:function(){
						$("#loading").show();
					},
					success:function(json){
						if(json.result){
							$("#loading").html(json.msg);
							$.gritter.add({
								title:'Sukses',
				                time: 3000,
				                text: json.msg
					        });
							$("#loading").fadeOut('slow');
							//alert();
						}else{
							$("#loading").hide();
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
		});

		//linkterkait
		$('#list-daftarlinkterkait').dataTable({
			"iDisplayLength": 5,
			"aLengthMenu": [
                [5, 10, 15, 20, 50, -1],
                [5, 10, 15, 20, 50, "All"] // change per page values here
            ],
			"bProcessing": true,
			"bServerSide": true,
			"bSort": false,
			"bFilter": false,
			"sAjaxSource": "page/pengaturan/list.link-terkait.php",
			"oLanguage": {
	            "sLengthMenu": "Menampilkan _MENU_ Data per halaman",
	            "sZeroRecords": "Maaf, Data tidak ditemukan",
	            "sInfo": "Menampilkan _START_ s/d _END_ dari _TOTAL_ data",
	            "sInfoEmpty": "Menampilakan 0 s/d 0 dari 0 data",
	            "sSearch": "",
	            "sInfoFiltered": "",
	            "oPaginate": {
                    "sPrevious": "",
                    "sNext": ""
                }
	        }
		});

		$('#Btntambahlinkterkait').click(function(){
			$("#nama_linkterkait").val("");
			$("#tambahlinkterkait").modal('show');
		});

		$("#form-linkterkait").validate({
			errorPlacement: function(error, element) {
			    error.appendTo( element.parent("div"));
			},
			rules:{
				url:{
					url:true
				}
			},
			messages:{
				url:{
					url:"URL tidak valid."
				}
			},
			submitHandler:function(form){
				//alert($("#form-linkterkait").serialize());
				$.ajax({
					url:'page/pengaturan/act.pengaturan.php',
					type:'post',
					dataType:'json',
					cache:false,
					data:'act=addlink&'+$("#form-linkterkait").serialize(),
					success:function(json){
						if(json.result){
							$("#tambahlinkterkait").modal('hide');
							$.gritter.add({
								title:'Sukses',
				                time: 1000,
				                text: json.msg,
				                after_close: function(){
									$('#list-daftarlinkterkait').dataTable().fnDraw();
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
		});

		$("#eform-linkterkait").validate({
			errorPlacement: function(error, element) {
			    error.appendTo( element.parent("div"));
			},
			rules:{
				url:{
					url:true
				}
			},
			messages:{
				url:{
					url:"URL tidak valid."
				}
			},
			submitHandler:function(form){
				//alert($("#form-linkterkait").serialize());
				$.ajax({
					url:'page/pengaturan/act.pengaturan.php',
					type:'post',
					dataType:'json',
					cache:false,
					data:'act=updatelink&'+$("#eform-linkterkait").serialize(),
					success:function(json){
						if(json.result){
							$("#editlinkterkait").modal('hide');
							$.gritter.add({
								title:'Sukses',
				                time: 1000,
				                text: json.msg,
				                after_close: function(){
									$('#list-daftarlinkterkait').dataTable().fnDraw();
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
		});

		$('#list-daftarlinkterkait_wrapper .dataTables_filter input').addClass("form-control input-sm").attr("placeholder", "Search");
        $('#list-daftarlinkterkait_wrapper .dataTables_length select').addClass("m-wrap small");
        $('#list-daftarlinkterkait_wrapper .dataTables_length select').select2();
		//end linkterkait
//	---------------start manajemen bidang ------
		$('#list-bidang').dataTable({
			"iDisplayLength": 5,
			"aLengthMenu": [
                [5, 10, 15, 20, 50, -1],
                [5, 10, 15, 20, 50, "All"] // change per page values here
            ],
			"bProcessing": true,
			"bServerSide": true,
			"bSort": false,
			"bFilter": false,
			"sAjaxSource": "page/pengaturan/list.bidang.php",
			"oLanguage": {
	            "sLengthMenu": "Menampilkan _MENU_ Data per halaman",
	            "sZeroRecords": "Maaf, Data tidak ditemukan",
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
		      { "sClass": "text-center", "aTargets": [ 1 ] }
		    ]
		});
		$('#Btntambahbidang').click(function(){
			$("#nmBidang").val("");
			$("#tambahbidang").modal('show');
		});
		$("#form-bidang").validate({
			errorPlacement: function(error, element) {
			    error.appendTo( element.parent("div"));
			},
			submitHandler:function(form){
				$.ajax({
					url:'page/pengaturan/act.pengaturan.php',
					type:'post',
					dataType:'json',
					cache:false,
					data:'act=tambahbid&'+$("#form-bidang").serialize(),
					success:function(json){
						if(json.result){
							$("#tambahbidang").modal('hide');
							$.gritter.add({
								title:'Sukses',
					                time: 1000,
					                text: json.msg
					            });
							$('#list-bidang').dataTable().fnDraw();
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
		});
		$("#eform-bidang").validate({
			errorPlacement: function(error, element) {
			    error.appendTo( element.parent("div"));
			},
			submitHandler:function(form){
				$.ajax({
					url:'page/pengaturan/act.pengaturan.php',
					type:'post',
					dataType:'json',
					cache:false,
					data:'act=updatebid&'+$("#eform-bidang").serialize(),
					success:function(json){
						if(json.result){
							$("#editbidang").modal('hide');
							$.gritter.add({
							title:'Sukses',
				                time: 1000,
				                text: json.msg
				            });
							$('#list-bidang').dataTable().fnDraw();
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
		});
		
		$('#list-bidang_wrapper .dataTables_filter input').addClass("form-control input-sm").attr("placeholder", "Search");
        $('#list-bidang_wrapper .dataTables_length select').addClass("m-wrap small");
        $('#list-bidang_wrapper .dataTables_length select').select2();
//	end manajemen bidang
	});

	function EditLink(id){
		$.ajax({
			url:'page/pengaturan/act.pengaturan.php',
			type:'post',
			dataType:'json',
			cache:false,
			data:'act=editlink&link='+id,
			success:function(json){
				if(json.result){
					$("#e_url").val(json.url);
					$("#e_nama").val(json.nama);
					$("#idlink").val(json.idlink);
					$("#editlinkterkait").modal('show');
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

	function HapusLink(id){
		if(confirm('Hapus Kategori Agenda ini ??')){
			$.ajax({
				url:'page/pengaturan/act.pengaturan.php',
				type:'post',
				dataType:'json',
				cache:false,
				data:'act=hapuslink&link='+id,
				success:function(json){
					if(json.result){
						$.gritter.add({
							title:'Sukses',
			                time: 1000,
			                text: json.msg,
			                after_close: function(){
								$('#list-daftarlinkterkait').dataTable().fnDraw();
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
		}
		return false;
	}

	function UnPublishLink(id){
		if(confirm('Sembunyikan link ini ??')){
			$.ajax({
				url:'page/pengaturan/act.pengaturan.php',
				type:'post',
				dataType:'json',
				cache:false,
				data:'act=unpublish&link='+id,
				success:function(json){
					if(json.result){
						$.gritter.add({
							title:'Sukses',
			                time: 1000,
			                text: json.msg,
			                after_close: function(){
								$('#list-daftarlinkterkait').dataTable().fnDraw();
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
		}
		return false;
	}

	function PublishLink(id){
		if(confirm('Publikasikan link ini ??')){
			$.ajax({
				url:'page/pengaturan/act.pengaturan.php',
				type:'post',
				dataType:'json',
				cache:false,
				data:'act=publish&link='+id,
				success:function(json){
					if(json.result){
						$.gritter.add({
							title:'Sukses',
			                time: 1000,
			                text: json.msg,
			                after_close: function(){
								$('#list-daftarlinkterkait').dataTable().fnDraw();
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
		}
		return false;
	}

	function EditBidang(id){
		$.ajax({
			url:'page/pengaturan/act.pengaturan.php',
			type:'post',
			dataType:'json',
			cache:false,
			data:'act=editbid&id='+id,
			success:function(json){
				if(json.result){
					$("#enmBidang").val(json.nama);
					$("#idbid").val(json.idbid);
					$("#editbidang").modal('show');
				}else{
					$.gritter.add({
						title:'Kesalahan',
		                time: 4000,
		                text: json.msg
		            });
				}
			}
		});
	}

	function HapusBidang(id){
		if(confirm('Hapus data ini ??')){
			$.ajax({
				url:'page/pengaturan/act.pengaturan.php',
				type:'post',
				dataType:'json',
				cache:false,
				data:'act=hapusbid&id='+id,
				success:function(json){
					if(json.result){
						$.gritter.add({
						title:'Sukses',
			                time: 1000,
			                text: json.msg
			            });
						$('#list-bidang').dataTable().fnDraw();
					}else{
						$.gritter.add({
						title:'Kesalahan',
			                time: 4000,
			                text: json.msg
			            });
					}
				}
			});
		}
	}

	function moveup(id){
		if(confirm('Ganti Urutan Link Berikut??')){
			$.ajax({
				url:'page/pengaturan/act.pengaturan.php',
				type:'post',
				dataType:'json',
				cache:false,
				data:'act=moveup&id='+id,
				success:function(json){
					if(json.result){
						$('#list-daftarlinkterkait').dataTable().fnDraw();
					}else{
						$.gritter.add({
						title:'Kesalahan',
			                time: 4000,
			                text: json.msg
			            });
					}
				}
			});
		}
	}

	function movedown(id){
		if(confirm('Ganti Urutan Link Berikut??')){
			$.ajax({
				url:'page/pengaturan/act.pengaturan.php',
				type:'post',
				dataType:'json',
				cache:false,
				data:'act=movedown&id='+id,
				success:function(json){
					if(json.result){
						$('#list-daftarlinkterkait').dataTable().fnDraw();
					}else{
						$.gritter.add({
						title:'Kesalahan',
			                time: 4000,
			                text: json.msg
			            });
					}
				}
			});
		}
	}
</script>