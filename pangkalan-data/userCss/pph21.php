<?php
  error_reporting(E_ALL & ~E_NOTICE);
  include("koneksi.php");
  $simpan=$_POST['simpan'];
  $npwp=$_POST['npwp'];
  $wp=$_POST['wp'];
  $alamat=$_POST['alamat'];
  $peneliti=$_POST['peneliti'];
  $golongan=$_POST['golongan'];
  $penyetor=$_POST['penyetor'];
  $tanggal=$_POST['tanggal'];
  $uraian=$_POST['uraian'];
  $id_penelitian=$_POST['id_penelitian'];
  $judul=$_POST['judul'];
  $bruto=$_POST['bruto'];
  $pembayaran=$_POST['pembayaran'];
  $masa=$_POST['masa'];
  $tahun=$_POST['tahun'];
  function session_register($sesipph21){
      global $$sesipph21;
      $_SESSION[$sesipph21] = $$sesipph21;
      $$sesipph21 = &$_SESSION[$sesipph21]; 
  }
  if(isset($simpan)){
    if($peneliti == ''){
      echo "<script type='text/javascript'>alert('Silakan isi nama ketua peneliti');</script>";
    }
    else if($penyetor == ''){
      echo "<script type='text/javascript'>alert('Silakan isi nama penyetor');</script>";
    }
    else if($tanggal == ''){
      echo "<script type='text/javascript'>alert('Silakan isi tanggal setor');</script>";
    }
    else if($uraian == ''){
      echo "<script type='text/javascript'>alert('Silakan isi uraian pembayaran');</script>";
    }
    else if($judul == ''){
      echo "<script type='text/javascript'>alert('Silakan isi judul penelitian');</script>";
    }
    else if($bruto == '' || $bruto == '0'){
      echo "<script type='text/javascript'>alert('Silakan isi nilai bruto');</script>";
    }
    else{
      $perintah="insert into pph21 values('', '$npwp', '$wp', '$alamat', '$tanggal', '$uraian', '$bruto', '$pembayaran', '$masa', '$tahun', '$penyetor', '$id_penelitian', '$peneliti', '$judul')";
      $masuk=mysql_query($perintah);
      session_start();
      session_register("sesipph21");
      $_SESSION[npwp]=$npwp;
      $_SESSION[wp]=$wp;
      $_SESSION[alamat]=$alamat;
      $_SESSION[peneliti]=$peneliti;
      $_SESSION[golongan]=$golongan;
      $_SESSION[penyetor]=$penyetor;
      $_SESSION[tanggal]=$tanggal;
      $_SESSION[uraian]=$uraian;
      $_SESSION[judul]=$judul;
      $_SESSION[bruto]=$bruto;
      $_SESSION[pembayaran]=$pembayaran;
      $_SESSION[masa]=$masa;
      $_SESSION[tahun]=$tahun;
      {header("location:detail_pph21.php");}
    }
  }
?>
<!DOCTYPE HTML>
<html>

<head>
  <title>SSP Lemlit UNTAN</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <!-- modernizr enables HTML5 elements and feature detects -->
  <script type="text/javascript" src="js/modernizr-1.5.min.js"></script>
  <script src="js/jquery-2.1.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/script.js"></script>
  <script type="text/javascript">
    $(function() {
      $( "#input" ).datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: "yy-mm-dd"
      });
    });
    function hitung() {
      var bruto = $("#bruto").val();
      var gol = $("#golongan").val();
      console.log('input gol : ' + gol);
      $a = 5;
      $b = 15;
      $c = 1;
      $d = 100;
      if(gol === 'III A' || gol === 'III B' || gol === 'III C' || gol === 'III D'){
        console.log('golongan 1');
            pembayaran = $a * bruto / $d;
            $("#pembayaran").val(pembayaran);
        }
        else if(gol === 'IV A' || gol === 'IV B' || gol === 'IV C' || gol === 'IV D'){
          console.log('golongan 2');
            pembayaran = $b * bruto / $d;
            $("#pembayaran").val(pembayaran);
        }
        else{
          console.log('golongan 3');
            pembayaran = $c * bruto;
            $("#pembayaran").val(pembayaran);
        }
    }
  </script>

  <script> 
    var cust; 
    function vcust(wcust){ 
    if(wcust.length==0){ 
    document.getElementById("Ctekssugest").style.visibility = "hidden"; 
    }else{ 
    cust = bcust(); 
    var Curl="keyupdata.php"; 
    cust.onreadystatechange=Cchange; 
    var Cvar = "Ctext="+wcust; 
    cust.open("POST",Curl,true); 
    //beberapa http header harus kita set kalau menggunakan POST 
    cust.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); 
    cust.setRequestHeader("Content-length", Cvar.length); 
    cust.setRequestHeader("Connection", "close"); 
    cust.send(Cvar); 
    } 
    } 
    function bcust(){ 
    if (window.XMLHttpRequest){ 
    return new XMLHttpRequest(); 
    } 
    if (window.ActiveXObject){ 
    return new ActiveXObject("Microsoft.XMLHTTP"); 
    } 
    return null; 
    } 
    function Cchange(){ 
    var Cfile; 
    if (cust.readyState==4 && cust.status==200){ 
    Cfile=cust.responseText;
    if(Cfile.length>0){ 
    document.getElementById("Ctekssugest").innerHTML = Cfile; 
    document.getElementById("Ctekssugest").style.visibility = ""; 
    }else{ 
    document.getElementById("Ctekssugest").innerHTML = ""; 
    document.getElementById("Ctekssugest").style.visibility = "hidden"; 
    } 
    } 
    } 
    function Cisi(wcust){ 
    document.getElementById("wcust").value = wcust; 
    document.getElementById("Ctekssugest").style.visibility = "hidden"; 
    document.getElementById("Ctekssugest").innerHTML = ""; 
    }

    /* Ajax */
    function getGolongan() {
      var nama = $('#wcust').val();

      $.ajax({
        type: 'post',
        url: 'getGolonganFromNama.php',
        data: {nama : nama},
        dataType: 'json',
        success: function(data) {
          console.log(data);
          $('#golongan').val(data.golongan);
          hitung();
        },
        error: function() {
          console.log("error");
        }
      }); 
    }
  </script>
  <script> 
    var namajudul; 
    function judulkeyup(judul){ 
    if(judul.length==0){ 
    document.getElementById("judulsuggest").style.visibility = "hidden"; 
    }else{ 
    namajudul = bjudul(); 
    var judulurl="keyupdata_idpenelitian.php"; 
    namajudul.onreadystatechange=judulchange; 
    var judulvar = "judultext="+judul; 
    namajudul.open("POST",judulurl,true); 
    //beberapa http header harus kita set kalau menggunakan POST 
    namajudul.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); 
    namajudul.setRequestHeader("Content-length", judulvar.length); 
    namajudul.setRequestHeader("Connection", "close"); 
    namajudul.send(judulvar); 
    } 
    } 
    function bjudul(){ 
    if (window.XMLHttpRequest){ 
    return new XMLHttpRequest(); 
    } 
    if (window.ActiveXObject){ 
    return new ActiveXObject("Microsoft.XMLHTTP"); 
    } 
    return null; 
    } 
    function judulchange(){ 
    var judulfile; 
    if (namajudul.readyState==4 && namajudul.status==200){ 
    judulfile=namajudul.responseText;
    if(judulfile.length>0){ 
    document.getElementById("judulsuggest").innerHTML = judulfile; 
    document.getElementById("judulsuggest").style.visibility = ""; 
    }else{ 
    document.getElementById("judulsuggest").innerHTML = ""; 
    document.getElementById("judulsuggest").style.visibility = "hidden"; 
    } 
    } 
    } 
    function judulisi(judul){ 
    document.getElementById("judul").value = judul; 
    document.getElementById("judulsuggest").style.visibility = "hidden"; 
    document.getElementById("judulsuggest").innerHTML = ""; 
    }

    /* Ajax */
    function getIDPenelitian() {
        var namajudul2 = $('#judul').val();
        $.ajax({
            type: 'post',
            url: 'getIDFromPenelitian.php',
            data: {namajudul2 : namajudul2},
            dataType: 'json',
            success: function(data) {
                console.log(data);
                $('#id_penelitian').val(data.id_laporan);
            },
            error: function() {
                console.log("error");
            }
        }); 
    }
  </script>
</head>

<body>
  <div id="main">
    <header>
      <div id="logo">
        <div id="logo_text">
          <!-- class="logo_colour", allows you to change the colour of the text -->
          <!--<h1><a href="index.html">CCS3<span class="logo_colour">_abstract</span></a></h1>
          <h2>Simple. Contemporary. Website Template.</h2> -->
          <img src="images/Untitled-1.png" />
        </div>
      </div>
      <nav>
        <div id="menu_container">
          <ul class="sf-menu" id="nav">
            <li><a href="index.html">Home</a></li>
            <li><a href="#">Setoran Pajak</a>
              <ul>
                <li><a href="pph21.php">PPh 21 (Honor)</a></li>
                <li><a href="pph22.php">PPh 22 (Pembelian)</a></li>
                <li><a href="pph23consume.php">PPh 23 (Konsumsi)</a></li>
                <li><a href="pph23rent.php">PPh 23 (Sewa)</a></li>
                <li><a href="ppnbuy.php">PPn Pembelian</a></li>
                <li><a href="ppnrent.php">PPn Sewa</a></li>
              </ul>
            </li>
            <li><a href="report.php">Laporan Penelitian</a></li>
            <li><a href="/ssp/logout.php">Logout</a></li>
          </ul>
        </div>
      </nav>
    </header>
    <div id="site_content">
      <div id="sidebar_container">
        <div class="sidebar">
          <h3>Fitur Aplikasi</h3>
          <ul>
            <li>Perhitungan pajak penelitian</li>
            <li>Pencetakan Surat Setoran Pajak</li>
            <li>Pencarian data penelitian</li>
          </ul>
        </div>
      </div>
      <div class="content">
        <h1>PPh 21 (Honor)</h1>
        <form id="contact" method="post" action="#">
          <div class="form_settings">
            <p><span>NPWP</span><input class="contact" type="text" name="npwp" value="000334532701000" readonly /></p>
            <p><span>Nama WP</span><input class="contact" type="text" name="wp" value="Rutin/Gaji Universitas Tanjungpura" readonly /></p>
            <p><span>Alamat</span><input class="contact" type="text" name="alamat" value="Jl. Ahmad Yani Pontianak" readonly /></p>
            <p><span>Nama Peneliti</span><input class="contact" type="text" name="peneliti" value="" id="wcust" onKeyUp='vcust(this.value)' /> <button type="button" name="ok" onclick="getGolongan()">...</button>
            <div id='Ctekssugest' style='position:absolute; background-color:white;width:200;visibility:hidden;z-index:100'></div></p>
            <p><span>Golongan</span><input class="contact" type="text" name="golongan" value="" onchange='hitung()' id='golongan' /></p>
            <p><span>Nama Penyetor</span><input class="contact" type="text" name="penyetor" value="" /></p>
            <p><span>Tanggal Setor</span><input class="contact" type="text" name="tanggal" value="" id="input" /></p>
            <p><span>Uraian</span><textarea class="contact textarea" rows="5" cols="50" name="uraian" id="" value=""></textarea></p>
            <p><span>ID Penelitian</span><input class="contact" type="text" name="id_penelitian" value="" readonly id="id_penelitian" /></p>
            <p><span>Judul Penelitian</span><input class="contact" type="text" name="judul" value="" id="judul" onKeyUp='judulkeyup(this.value)' /> <button type="button" class="btn btn-default" name="cari" onclick="getIDPenelitian()">...</button>
            <div id='judulsuggest' style='position:absolute; background-color:white;width:200;visibility:hidden;z-index:100'></div></p>
            <p><span>Jumlah Bruto</span><input class="contact" type="text" name="bruto" value="0" id="bruto" onchange="hitung();" /></p>
            <p><span>Jumlah Pembayaran</span><input class="contact" type="text" name="pembayaran" value="" id="pembayaran" readonly /></p>
            <p><span>Masa Pajak</span>
              <select name="masa" id="masa">
                <option value="Januari">Januari</option>
                <option value="Februari">Februari</option>
                <option value="Maret">Maret</option>
                <option value="April">April</option>
                <option value="Mei">Mei</option>
                <option value="Juni">Juni</option>
                <option value="Juli">Juli</option>
                <option value="Agustus">Agustus</option>
                <option value="September">September</option>
                <option value="Oktober">Oktober</option>
                <option value="Nopember">Nopember</option>
                <option value="Desember">Desember</option>
              </select>
            </p>
            <p><span>Tahun</span>
              <select name="tahun" id="">
                <?php
                for ($i=1970;$i<=2100;$i++){
                  $tahun=$i;
                  echo "<option value='$tahun'>$tahun</option>";
                }
                ?>
              </select>
            </p>
            <p style="padding-top: 15px"><span>&nbsp;</span><button type="submit" class="button" name="simpan">Simpan</button></p>
          </div>
        </form>
      </div>
    </div>
    <div id="scroll">
      <a title="Scroll to the top" class="top" href="#"><img src="images/top.png" alt="top" /></a>
    </div>
    <footer>
      <p><a href="index.html">Home</a> | <a href="report.php">Laporan Penelitian</a></p>
      <p>Copyright &copy; Lembaga Penelitian Universitas Tanjungpura | 2014</p>
    </footer>
  </div>
  <!-- javascript at the bottom for fast page loading -->
  <script type="text/javascript" src="js/jquery.easing-sooper.js"></script>
  <script type="text/javascript" src="js/jquery.sooperfish.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('ul.sf-menu').sooperfish();
      $('.top').click(function() {$('html, body').animate({scrollTop:0}, 'fast'); return false;});
    });
  </script>
</body>
</html>