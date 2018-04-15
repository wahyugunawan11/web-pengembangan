<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
include("koneksi.php");
$idfakultas=$_SESSION[sesiidfakultas];
?>
<!DOCTYPE HTML>
<html>

<head>
  <title>SSP Lemlit UNTAN</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <!-- DataTables CSS -->
  <link rel="stylesheet" type="text/css" href="media/css/jquery.dataTables.css">
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
        <table class="table table-striped table-bordered table-hover" id="dataTablesexample">
          <thead>
            <tr>
              <th style="color: #D24D57;">ID</th>
              <th style="color: #D24D57;">Nama</th>
              <th style="color: #D24D57;">Judul</th>
              <th style="color: #D24D57;">Fakultas</th>
              <th style="color: #D24D57;">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include ("koneksi.php");
            $lihat = "select * from laporan inner join dosen on laporan.nip=dosen.nip inner join fakultas on dosen.id_fakultas=fakultas.id_fakultas where laporan.id_fakultas = '$idfakultas' order by laporan.id_laporan";
            $hasil = mysql_query ($lihat);
            while ($row = mysql_fetch_array ($hasil)){
              echo "<tr><td>$row[id_laporan]</td><td>$row[nama]</td><td>$row[judul]</td><td>$row[fakultas]</td><td><a href = detail_report.php?id_laporan=$row[id_laporan]>Detail</a></td></td></tr>";
            }
            ?>
          </tbody>
        </table>
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
  <!-- DataTables -->
  <script type="text/javascript" charset="utf8" src="media/js/jquery.dataTables.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('ul.sf-menu').sooperfish();
      $('.top').click(function() {$('html, body').animate({scrollTop:0}, 'fast'); return false;});
      $('#dataTablesexample').dataTable();
    });
  </script>
</body>
</html>