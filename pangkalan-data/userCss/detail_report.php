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
        <?php
        error_reporting(E_ALL & ~E_NOTICE);
        include("koneksi.php");
        $result = mysql_query ("select laporan.id_laporan as id_laporan, laporan.nip as nip, laporan.nama as nama, laporan.anggota1 as anggota1, laporan.anggota2 as anggota2, laporan.anggota3 as anggota3, laporan.anggota4 as anggota4, laporan.judul as judul, laporan.dana as dana, laporan.tahun as tahun, laporan.abstrak as abstrak, laporan.id_fakultas as id_fakultas, fakultas.fakultas as fakultas from laporan inner join dosen on laporan.nip=dosen.nip inner join fakultas on dosen.id_fakultas=fakultas.id_fakultas where laporan.id_laporan = '$_GET[id_laporan]'");
        while($data=mysql_fetch_array($result)){
        ?>
        <h1>Detail Laporan</h1>
        <h4>ID:</h4>
        <p><?php echo $data['id_laporan']; ?></p>
        <h4>NIP:</h4>
        <p><?php echo $data['nip']; ?></p>
        <h4>Ketua Peneliti:</h4>
        <p><?php echo $data['nama']; ?></p>
        <h4>ID Fakultas:</h4>
        <p><?php echo $data['id_fakultas'];?></p>
        <h4>Fakultas:</h4>
        <p><?php echo $data['fakultas'];?></p>
        <h4>Anggota 1:</h4>
        <p><?php echo $data['anggota1'];?></p>
        <h4>Anggota 2:</h4>
        <p><?php echo $data['anggota2'];?></p>
        <h4>Anggota 3:</h4>
        <p><?php echo $data['anggota3'];?></p>
        <h4>Anggota 4:</h4>
        <p><?php echo $data['anggota4'];?></p>
        <h4>Judul:</h4>
        <p><?php echo $data['judul'];?></p>
        <h4>Dana:</h4>
        <p><?php echo $data['dana'];?></p>
        <h4>Tahun:</h4>
        <p><?php echo $data['tahun']; ?></p>
        <h4>Abstrak:</h4>
        <p><?php echo $data['abstrak']; ?></p>
        <p><a href="report.php">Kembali</a></p>
      <?php
      }
      ?>
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