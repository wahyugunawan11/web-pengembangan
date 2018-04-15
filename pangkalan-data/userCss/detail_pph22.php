<?php
error_reporting(E_ALL & ~E_NOTICE);
echo "<script type='text/javascript'>alert('Input data PPh 22 berhasil!');</script>";
session_start();
include("koneksi.php");
$pph22_npwp=$_SESSION[pph22_npwp];
$pph22_wp=$_SESSION[pph22_wp];
$pph22_alamat=$_SESSION[pph22_alamat];
$pph22_peneliti=$_SESSION[pph22_peneliti];
$pph22_penyetor=$_SESSION[pph22_penyetor];
$pph22_tanggal=$_SESSION[pph22_tanggal];
$pph22_uraian=$_SESSION[pph22_uraian];
$pph22_judul=$_SESSION[pph22_judul];
$pph22_bruto=$_SESSION[pph22_bruto];
$pph22_pembayaran=$_SESSION[pph22_pembayaran];
$pph22_masa=$_SESSION[pph22_masa];
$pph22_tahun=$_SESSION[pph22_tahun];
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
        <h1>Detail PPh 22 (Pembelian)</h1>
        <h4>NPWP:</h4>
        <p><?php echo $pph22_npwp;?></p>
        <h4>Nama wajib pajak:</h4>
        <p><?php echo $pph22_wp;?></p>
        <h4>Alamat wajib pajak:</h4>
        <p><?php echo $pph22_alamat;?></p>
        <h4>Nama peneliti:</h4>
        <p><?php echo $pph22_peneliti;?></p>
        <h4>Nama penyetor:</h4>
        <p><?php echo $pph22_penyetor;?></p>
        <h4>Tanggal setor:</h4>
        <p><?php echo $pph22_tanggal;?></p>
        <h4>Uraian:</h4>
        <p><?php echo $pph22_uraian;?> "<?php echo $pph22_judul;?>"</p>
        <h4>Jumlah bruto:</h4>
        <p><?php echo $pph22_bruto;?></p>
        <h4>Jumlah Pembayaran:</h4>
        <p><?php echo $pph22_pembayaran;?></p>
        <h4>Masa Pajak:</h4>
        <p><?php echo $pph22_masa;?></p>
        <h4>Tahun:</h4>
        <p><?php echo $pph22_tahun;?></p>
        <p><a href="pph22topdf.php">Cetak</a></p>
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