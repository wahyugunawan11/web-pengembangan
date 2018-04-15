<?php
session_start();
include "inc/helper.php";
include "inc/konfigurasi.php";
include "inc/db.pdo.class.php";
include "inc/costum.class.php";


$db=new dB($dbsetting);
$db->runQuery("SELECT * FROM web_setting");// update tgl 26/8/2014
if($db->dbRows()>0){
    while($r=$db->dbFetch()){
        $web[$r['name']]=$r['val'];
    }
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <!--title><?php echo $web['web_title'];?> - <?php echo $web['web_sub_title'];?></title-->
        <title>LPPKM-UNTAN</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="stylesheet" href="css/bootstrap.css" media="screen" />
        <link rel="stylesheet" href="css/icoMoon.css" media="all" />
        <link rel="stylesheet" href="css/superfish.css" media="screen" />
        <link rel="stylesheet" href="css/prettyPhoto.css" media="screen" />
        <link rel="stylesheet" href="css/flexslider.css" media="screen" />
        <link rel="stylesheet" href="style.css">        
        <link rel="stylesheet" href="css/bootstrap-responsive.css" media="all">
        <!-- <link href="css/responsive.css" rel="stylesheet"> -->
        <script src="js/modernizr.custom.js"></script>
    

        <!--link href='http://fonts.googleapis.com/css?family=Rokkitt' rel='stylesheet' type='text/css'-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>

        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->

        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
            <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
            <link rel="stylesheet" href="css/ie.css" type="text/css" media="all" />
			<script src="js/PIE_IE678.js"></script>
        <![endif]-->
        <!-- update 26/8/2014 -->
    	<link rel="stylesheet" href="css/colors/<?php echo $web['web_theme_csscolor'];?>" type="text/css" id="colors" />

        <link rel="shortcut icon" href="images/logountan.png">

        <?php
        if ($_GET['page']=='agenda'){
        loadCss("css/calendar.css");
        }
        ?>

        <script src="js/jquery-1.8.3.min.js"></script>
        <script src="js/superfish.js"></script>
        <script src="js/retina.js"></script>
        <script src="js/bootstrap.js"></script>
        <?php
        if($_GET['page']=='agenda'){
            ?>
            <script type="text/javascript" src="js/underscore-min.js"></script>
            <script type="text/javascript" src="js/language/id-ID.js"></script>
            <script type="text/javascript" src="js/calendar.js"></script>
            <script type="text/javascript" src="js/calender_config.js"></script>
            <?php
        }
        ?>
        <script src="js/jquery.carouFredSel-6.0.4-packed.js"></script>
        <script src="js/classie.js"></script>
        <script src="js/uisearch.js"></script>
        <script src="js/jquery.flexslider-min.js"></script>
        <script src="js/jquery.prettyPhoto.js"></script>
        <script src="js/tweetable.jquery.js"></script>
        <script src="js/jquery.timeago.js"></script>
        <script src="js/jquery.backstretch.js"></script>
        <script src="js/jquery.validate.min.js"></script>
        <script src="js/jquery.form.js"></script>
        <script src="js/custom.js" charset="utf-8"></script>
        <?php if ($_GET['page']=='repositori'){ ?>
            <link rel="stylesheet" type="text/css" href="js/DTable/css/jquery.dataTables.css"/>
            <script type="text/javascript" src="js/DTable/js/jquery.dataTables.js"></script>
        <?php } 

        if($_GET['page']=='statistik'){ ?>
            <script type="text/javascript" src="adminpage/assets/plugins/highcharts/js/highcharts.js"></script>
            <script type="text/javascript" src="adminpage/assets/plugins/highcharts/js/modules/data.js"></script>
            <script type="text/javascript" src="adminpage/assets/plugins/highcharts/js/modules/exporting.js"></script>
        <?php } ?>
        <script type="text/javascript">
        $(document).ready(function(){
            $("#formcari").validate({
                errorPlacement:function(error,element){
                    error.appendTo( element.parent("div"));
                },
                rules:{
                    katakunci:{
                        required:true,
                        minlength:5
                    }
                },
                messages:{
                    katakunci:{
                        required:"Kata Kunci harus diisi untuk mencari dokumen",
                        minlength:"Minimal 5 karakter kata."
                    }

                },
                submitHandler:function(form){
                    //alert("Hei");
                    $.ajax({
                        url:'act.cari.php',
                        dataType:'json',
                        type:'post',
                        cache:false,
                        data:$("#formcari").serialize(),
                        beforeSend:function(){
                            $("#hasil_cari").html("Mencari Dokumen....");
                        },
                        success:function(json){
                            if(json.result){
                                $("#infocari").html(json.msg);
                                $("#hasil_cari").html(json.hasil);
                            }else{
                                $("#infocari").html("silahkan masukkan kata kunci untuk mencari dokumen.");
                                $("#hasil_cari").html(json.msg);
                            }
                        }
                    });
                    return false;
                }
            });

            $("#carilengkap").validate({
                errorPlacement:function(error,element){
                    error.appendTo( element.parent("td"));
                },
                rules:{
                    katakunci:{
                        // required:true,
                        minlength:5
                    },
                    tahun:{
                        digits:true,
                        maxlength:4
                    }
                },
                messages:{
                    katakunci:{
                        // required:"Kata Kunci harus diisi untuk mencari dokumen",
                        minlength:"Minimal 5 karakter kata."
                    },
                    tahun:{
                        digits:"Hanya Digit",
                        maxlength:"Maksimal Karakter hanya 4 digit"
                    }

                },
                submitHandler:function(form){
                    //alert("Hei");
                    $.ajax({
                        url:'act.cari.php',
                        dataType:'json',
                        type:'post',
                        cache:false,
                        data:$("#carilengkap").serialize(),
                        beforeSend:function(){
                            $("#hasil_cari").html("Mencari Dokumen....");
                        },
                        success:function(json){
                            if(json.result){
                                $("#infocari").html(json.msg);
                                $("#hasil_cari").html(json.hasil);
                            }else{
                                $("#infocari").html("silahkan Masukkan Kata Kunci Pencarian untuk mencari dokumen.");
                                $("#hasil_cari").html(json.msg);
                            }
                        }
                    });
                    return false;
                }
            });
            <?php if ($_GET['page']=='repositori'){  ?>
            
            $('#list-dokumen').dataTable({
                "bLengthChange":false,
                "iDisplayLength": 10,
                "aLengthMenu": [
                    [10, 15, 20, 50, 100, -1],
                    [10, 15, 20, 50, 100, "All"] // change per page values here
                ],
                "bProcessing": true,
                "bServerSide": true,
                "bSort": false,
                "sAjaxSource": "_repositori.php",
                "oLanguage": {
                    "sLengthMenu": "Menampilkan _MENU_ Data per halaman",
                    "sZeroRecords": "Maaf, Data tidak ada",
                    "sInfo": "Menampilkan _START_ s/d _END_ dari _TOTAL_ data",
                    "sInfoEmpty": "Menampilakan 0 s/d 0 dari 0 data",
                    "sSearch": "Cari Dokumen",
                    "sInfoFiltered": "",
                    "oPaginate": {
                        "sPrevious": "",
                        "sNext": ""
                    }
                }
            });

            //$('#list-dokumen_wrapper .dataTables_filter input').addClass("input-large").attr("placeholder", "Masukkan Kata Kunci Pencarian");
            //$('#list-dokumen_wrapper .dataTables_length select').addClass("m-wrap small");
           // $('#list-dokumen_wrapper .dataTables_length select').select2();


            <?php } ?>

            <?php if($_GET['page']=='statistik'){ ?>

                $('#monevgrafik').highcharts({
                    data: {
                        table: document.getElementById('tabelGrafik')
                    },
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: $("#grafik_title").html()
                    },
                    subtitle: {
                        text: $("#grafik_subtitle").html()
                    },
                    yAxis: {
                        labels: {
                            formatter: function () {
                                return Highcharts.numberFormat(this.value,0,',','.');
                            }
                        },
                        title: {
                            text: 'Total Anggaran (Rp)'
                        },
                        allowDecimals: false
                    },
                    tooltip: {
                        formatter: function () {
                            return '<b>' + this.series.name + '</b><br/>Rp. ' +
                                Highcharts.numberFormat(this.point.y,0,',','.');
                        }
                        //pointFormat: "Rp. {point.y:.,0f}"
                    }
                });
                
                
                    }
                }
                ?>
            <?php } ?>
        });
        </script>
       

    </head>
    
<body>
<div class="kopa-pattern"></div>
<div class="wrapper kopa-shadow">
    
    <div class="row-fluid">
        
        <div class="span12 clearfix">
			<!--page-header-->
			<?php include "_header.php";?>
<?php $db=new dB($dbsetting); 

$db->runQuery("SELECT * FROM web_setting WHERE id = 5");
if($db->dbRows()>0){
    while($r=$db->dbFetch()){
        $web[$r['name']]=$r['val'];
    }
}

?>
<span style="font-family:arial; font-size: 14px; font-weight:bold; color:#F0F8FF;"> <marquee direction="left" scrollamount="5" height="20px" width="100%" bgcolor="#DC143C" > <?php echo $web['teks_berjalan'];?> </marquee></span>
            
            <div id="main-content">
            <?php
                switch ($_GET['page']) {
                                        
                    default:
                        @include "home.php";
                        break;					
                    case 'profil':
                        @include "profil.php";
                        break;                
                    case 'buku-tamu':
                        @include "buku-tamu.php";
                        break;
						
                    /* ini untuk fitur baru : pengajuan surat tugas	*/
					case 'surat-tugas':
                        @include "surat-tugas.php";
                        break;
					
            
                }
            ?>
            </div><!--main-content-->
            
            <?php include "_footer.php";?>
            
            <p id="back-top">
                <a href="#top">Back to Top</a>
            </p>

		</div><!--span12-->
                
	</div><!--row-fluid-->
            
</div><!--wrapper-->  

     <script>
        new UISearch( document.getElementById( 'sb-search' ) );
    </script>
    
    
</body>

</html>
