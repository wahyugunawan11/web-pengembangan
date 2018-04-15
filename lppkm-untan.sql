-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 12, 2018 at 05:20 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lppkm`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_artikel`
--

CREATE TABLE IF NOT EXISTS `tb_artikel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kategori` int(11) NOT NULL,
  `id_bidang` int(11) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `isi` longtext NOT NULL,
  `user` varchar(75) NOT NULL,
  `img` varchar(225) NOT NULL,
  `id_galeri` int(11) NOT NULL,
  `kel_artikel` enum('B','A','P','Pg') NOT NULL COMMENT 'Berita, Agenda, Pengumuman, Page',
  `slide` enum('Y','N') NOT NULL DEFAULT 'N',
  `publish` enum('Y','N') NOT NULL,
  `komentar` enum('Y','N') DEFAULT 'Y',
  `count` int(11) DEFAULT '0',
  `tgl1` datetime NOT NULL COMMENT 'hanya untuk kel_artikel A',
  `tgl2` datetime NOT NULL COMMENT 'hanya untuk kel_artikel A',
  `tgl_buat` datetime NOT NULL,
  `tgl_publish` datetime NOT NULL,
  `keyword` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `tb_artikel`
--

INSERT INTO `tb_artikel` (`id`, `id_kategori`, `id_bidang`, `judul`, `isi`, `user`, `img`, `id_galeri`, `kel_artikel`, `slide`, `publish`, `komentar`, `count`, `tgl1`, `tgl2`, `tgl_buat`, `tgl_publish`, `keyword`) VALUES
(1, 0, 0, 'TENTANG  LPPKM   UNTAN', '<p><strong><span style="font-size:18px">SEJARAH LPPKM UNTAN</span>&nbsp;</strong></p>\r\n\r\n<p><span style="line-height:1.6em; text-align:justify">Lembaga Penelitian merupakan salah satu unsur pelaksanaan Perguruan Tinggi yang melaksanakan tugas dibidang penelitian, yang mengkoordinir, memantau, menilai pelaksanaan kegiatan penelitian yang dilaksanakan oleh peneliti yang ada di Pusat Penelitian/ Pusat Studi /Pusat Kajian, Fakultas/Jurusan, serta ikut mengusahakan dan mengelola sumberdaya yang diperlukan dalam penyelenggaraan kegiatan penelitian. Sejarah berdirinya Lembaga Penelitian yang berada di lingkungan Universitas Tanjungpura, sebagai pengembangan dari Balai Penelitian Universitas Tanjungpura ini sesuai dengan Surat Keputusan Rektor Untan Nomor 994/PT29.H/C/1993 tanggal 18 Maret 1993 tentang pengangkatan</span></p>\r\n\r\n<p style="text-align:justify">Ketua Lembaga Penelitian dan didalam Surat Keputusan Menteri Pendidikan dan Kebudayaan RI Nomor: 0171/O/1995 tentang Organisasi dan Tata Kerja Universitas Tanjungpura jo Kepmendiknas Nomor: 095/O/2001 tentang Perubahan atas Kepmendikbud Nomor: 0171/O/1995, kemudian menurut Peraturan Pemerintah No. 60 Tahun 1999 tentang Perguruan Tinggi, dimana untuk menjadi Lembaga Penelitian Universitas Tanjungpura harus memiliki 4 (empat) Pusat Studi, dan hal tersebut sudah dimiliki Universitas Tanjungpura, yaitu Pusat Studi Wanita, Pusat Studi Lingkungan, Pusat Studi Kependudukan, dan Pusat Studi Masalah Sosial. Kemudian bertambah lagi Pusat Penelitian Ekonomi dan Manajemen, Pusat Kajian Makanan Tradisional, Pusat Kajian Pendidikan, Pusat Kajian Kebudayaan Melayu, Pusat Kajian Kebudayaan Dayak, Pusat Studi Pembangunan dan Kewilayahan, Pusat Studi Agroindustri dan Agrobisnis, Pusat Studi Perairan Tawar dan Pantai, Pusat Penelitian HAM, Pusat Penelitian Sumber Daya Alam dan Pemberdayaan Masyarakat, Pusat Penelitian Keanekaragaman Hayati dan</p>\r\n\r\n<p style="text-align:justify">Masyarakat Lahan Basah, dan Pusat Penelitian Resolusi Konflik dan Perdamaian, Pusat Studi Energi Terbarukan, dan Pusat Studi Disain. Sepanjang perjalannya terjadi pergantian nama beberapa Pusat Studi, seperti Pusat Studi Wanita menjadi Pusat Penelitian Peranan Wanita, Pusat Studi Lingkungan menjadi Pusat Penelitian Lingkungan Hidup, Pusat Studi Kependudukan menjadi Pusat Penelitian Kependudukan, Pusat Studi Masalah Sosial menjadi Pusat Penelitian Masalah Sosial, Pusat Kajian Kebudayaan Dayak menjadi Pusat Penelitian Kebudayaan Dayak. Lembaga Penelitian mempunyai fungsi, diantaranya melaksanakan penelitian ilmiah murni, melaksanakan penelitian ilmu pengetahuan/ teknologi untuk menunjang pembangunan, melaksanakan penelitian untuk pendidikan dan pengembangan institusi, melaksanakan urusan tata usaha Lembaga.</p>\r\n\r\n<p style="text-align:justify">Sejak terbentuknya Balai Penelitian/ Lembaga Penelitian tahun 1992 hingga sekarang, Lembaga Penelitian Universitas Tanjungpura telah mengalami delapan kali pergantian pucuk pimpinan Ketua Lembaga Penelitian, yaitu :&nbsp;<br />\r\n1. Prof. Muh. Landawe, SE (Alm) ( 1992 - 1993 )&nbsp;<br />\r\n2. Prof. Ir. Alamsyah HB ( 1993 - 1995 )&nbsp;<br />\r\n3. Prof. Dr. Mudiyono ( 1995 - 1999 )&nbsp;<br />\r\n4. Ir. Augustine Lumangkun, M.Sc ( 1999 - 2004 )&nbsp;<br />\r\n5. Dr. Ir. Abdurrani Muin, MS ( 2004 - 2007 )&nbsp;<br />\r\n6. Ir. H. Syafruddin Said, MS ( 2007 - 2008 )&nbsp;<br />\r\n7. Prof. Dr.H. M. Asrori, M.Pd ( 2008 - 2012)&nbsp;<br />\r\n8. Dr. Amrazi Zakso (2012 - 2016);<br />\r\n9. Prof. Dr. Eng. Ir. H. M. Ismail Yusuf, MT (2016 - sekarang)</p>\r\n\r\n<p style="text-align:justify">Secara struktural, kedudukan Lembaga Penelitian Universitas Tanjungpura merupakan bagian dari struktur organisasi Universitas Tanjungpura yang melaksanakan tugas dan fungsinya dibawah Rektor. Lembaga Penelitian dipimpin oleh seorang Ketua yang diangkat dan bertanggung jawab langsung kepada Rektor, yang dalam pelaksanaan tugas sehari-harinya dikoordinasikan oleh Pembantu Rektor I. Dalam melaksanakan tugasnya, Ketua dibantu oleh Sekretaris. Pejabat Sekretaris Lembaga Penelitian Universitas Tanjungpura sejak tahun 1995 &ndash; sekarang adalah:&nbsp;<br />\r\n1. Nurjanah, SH, M.Hum ( 1993 - 1995 )&nbsp;<br />\r\n2. Dr. Leo Sutrisno ( 1995 - 1999 )&nbsp;<br />\r\n3. Dr. H. M. Asrori, M.Pd ( 1999 - 2004 )&nbsp;<br />\r\n4. Dr. Ir. Radian, MS ( 2004 - 2007 )&nbsp;<br />\r\n5. Ir. Ani Muani, MS ( 2007 - 2008 )&nbsp;<br />\r\n6. H. Jamaluddin M. Yusuf, SH ( 2008 - 2012)&nbsp;<br />\r\n7. Drs. Suyono Sadeli (2012 &ndash; 2016);<br />\r\n8. Ir. Surachman,  MMA (2016 -  sekarang)</p>\r\n\r\n<p style="text-align:justify"><strong><span style="font-size:18px">VISI MISI LPPKM UNTAN</span></strong></p>\r\n\r\n<p>Visi</p>\r\n\r\n<div style="padding: 0px; margin: 0px; font-family: Arial; -webkit-font-smoothing: antialiased; color: rgb(85, 85, 85); line-height: 20px;"><span style="color:rgb(51, 51, 51); font-family:sans-serif,arial,verdana,trebuchet ms; line-height:1.6em; text-align:justify">Menjadi pusat informasi ilmiah Kalimantan Barat serta menghasilkan penelitian yang berdaya guna bagi kemajuan ilmu dan teknologi</span></div>\r\n\r\n<p>Misi</p>\r\n\r\n<ol>\r\n	<li>Menyelenggarakan penelitian secara berkualitas, sehingga dapat memajukan dan mengembangkan ilmu pengetahuan teknologi sesuai dengan disiplin ilmu masing-masing&rdquo;.&nbsp;</li>\r\n	<li>Menyelenggarakan kegiatan penelitian dan pengembangan untuk menunjang pembangunan daerah dan turut menyelesaikan permasalahan masyarakat.&nbsp;</li>\r\n	<li>Melakukan kerjasama penelitian yang sinergis baik secara internal dilingkungan Universitas Tanjungpura maupun secara eksternal dengan pihak luar (pemerintah , swasta, dan stokeholder yang lain )</li>\r\n</ol>\r\n\r\n<p><span style="line-height:1.6em">Tugas</span></p>\r\n\r\n<div style="padding: 0px; margin: 0px; font-family: Arial; -webkit-font-smoothing: antialiased; color: rgb(85, 85, 85); line-height: 20px;"><span style="color:rgb(51, 51, 51); font-family:sans-serif,arial,verdana,trebuchet ms; line-height:1.6em; text-align:justify">Melaksanakan, mengkoordinasikan, memantau, menilai pelaksanaan kegiatan penelitian yang diselenggarakan oleh pusat penelitian serta ikut mengusahakan serta mengendalikan administrasi sumber daya yang diperlukan.&rdquo;</span></div>\r\n\r\n<p>Fungsi</p>\r\n\r\n<ol>\r\n	<li>Melaksanakan penelitian ilmiah murni, teknologi, dan atau kesenian.&nbsp;</li>\r\n	<li>Melaksanakan penelitian ilmu pengetahuan dan/ atau kesenian tertentu untuk menunjang pembangunan.&nbsp;</li>\r\n	<li>Melaksanakan penelitian untuk pendidikan dan pengembangan ilmu pengetahuan.&nbsp;</li>\r\n	<li>Melaksanakan penelitian ilmu pengetahuan, teknologi, dan/atau kesenian serta penelitian untuk mengembangkan konsepsi pembangunan nasional, wilayah, dan atau daerah melalui kerjasama antar perguruan tinggi dan badan lain baik didalam negeri maupun luar negeri .&nbsp;</li>\r\n	<li>Melaksanakan pembinaan dosen peneliti.&nbsp;</li>\r\n	<li>Melaksanakan urusan tata usaha lembaga.</li>\r\n</ol>\r\n\r\n<p><strong>LPPKM UNTAN</strong> merupakan bagian dari Struktur Organisasi dan Tata Kelola (SOTK) Universitas Tanjungpura (UNTAN) yang dibentuk pada tahun 2016. LPPKM merupakan penggabungan dua lembaga, yaitu Lembaga Penelitian (Lemlit) dan Lembaga Pengabdian Kepada Masyatakat (LPKM).</p>\r\n\r\n<p>&nbsp;</p>\r\n', '2', '', 0, 'Pg', 'N', 'Y', 'Y', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-09-30 08:03:55', '2013-09-30 08:03:55', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_komentar`
--

CREATE TABLE IF NOT EXISTS `tb_komentar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_konten` varchar(10) NOT NULL,
  `jenis` enum('B','A','P','G','D','BT') NOT NULL COMMENT 'Artikel, File, bukutamu',
  `user` varchar(50) NOT NULL,
  `nama_lengkap` varchar(74) NOT NULL,
  `email` varchar(50) NOT NULL,
  `ip_address` varchar(25) NOT NULL,
  `komentar` text NOT NULL,
  `tgl` date NOT NULL,
  `waktu` time NOT NULL,
  `baca` enum('Y','N') NOT NULL,
  `publish` enum('Y','N') NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tb_komentar`
--


-- --------------------------------------------------------

--
-- Table structure for table `tb_linkterkait`
--

CREATE TABLE IF NOT EXISTS `tb_linkterkait` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(150) DEFAULT NULL,
  `url` varchar(250) DEFAULT NULL,
  `publish` enum('Y','N') DEFAULT NULL,
  `order` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tb_linkterkait`
--

INSERT INTO `tb_linkterkait` (`id`, `nama`, `url`, `publish`, `order`) VALUES
(1, 'WEBSITE UNTAN', 'http://untan.ac.id/', 'Y', 3),
(2, 'WEBSITE DIKTI', 'http://www.dikti.go.id/perguruan-tinggi/', 'Y', 1),
(3, 'WESITE KEMENRISTEKDIKTI', 'http://ristekdikti.go.id/', 'Y', 0),
(4, 'PANGKALAN DATA PENELITIAN & PKM (E-DATA)', 'http://edata.lppkm.untan.ac.id', 'N', 4),
(5, 'KEPEGAWAIAN UNTAN', 'http://kepegawaian.untan.ac.id', 'Y', 5),
(6, 'WEBSITE BAN-PT', 'http://ban-pt.ristekdikti.go.id/', 'Y', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `id_bidang` int(11) NOT NULL,
  `username` varchar(75) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  `level` int(7) NOT NULL,
  `nama_lengkap` varchar(150) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `email` varchar(75) NOT NULL,
  `telp` varchar(50) NOT NULL,
  `aktif` enum('Y','N') NOT NULL DEFAULT 'Y',
  `auth` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `id_bidang`, `username`, `pwd`, `level`, `nama_lengkap`, `jabatan`, `nip`, `email`, `telp`, `aktif`, `auth`) VALUES
(1, 0, 'operator', '25d55ad283aa400af464c76d713c07ad', 999991, 'Operator', 'Operator', '', '', '', 'Y', '');

-- --------------------------------------------------------

--
-- Table structure for table `web_counter`
--

CREATE TABLE IF NOT EXISTS `web_counter` (
  `ip` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `hits` int(10) NOT NULL DEFAULT '1',
  `online` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `web_counter`
--

INSERT INTO `web_counter` (`ip`, `tanggal`, `hits`, `online`) VALUES
('::1', '2018-04-11', 46, '1523459549'),
('::1', '2018-04-12', 1, '1523524433');

-- --------------------------------------------------------

--
-- Table structure for table `web_setting`
--

CREATE TABLE IF NOT EXISTS `web_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `val` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `web_setting`
--

INSERT INTO `web_setting` (`id`, `name`, `val`) VALUES
(1, 'web_title', 'LEMBAGA PENELITIAN DAN PENGABDIAN KEPADA MASYARAKAT (LPPKM)'),
(2, 'web_sub_title', 'U N I V E R S I T A S      T A N J U N G P U R A'),
(3, 'web_welcome', '<p style="text-align:justify"><span style="font-size:18px"><strong>Selamat Datang di Website Lembaga Penelitian dan Pengabdian Kepada Masyarakat (LPPKM) Universitas Tanjungpura Pontianak</strong></span></p>\r\n\r\n<p style="text-align:justify"><span style="font-size:14px">Website ini merupakan website resmi, yang dibangun atas kerjasama LPPKM Untan dengan Program Studi Teknik Informatika. Website ini dipublikasi dengan tujuan memberikan informasi yang seluas luasnya, tentang kegiatan penelitian dan pengabdian kepada masyarakat yang menjadi tupoksi LPPKM Untan. </span></p>\r\n\r\n<p style="text-align:justify"><span style="font-size:14px">Semoga Website ini bermanfaat bagi seluruh civitas akademika Universitas Tanjungpura maupun masyarakat umum.</span></p>\r\n\r\n<p style="text-align:justify"><span style="font-size:14px">Pontianak, Mei 2016</span></p>\r\n\r\n<p style="text-align:justify"><strong><span style="font-size:14px">Ketua LPPKM Untan</span></strong></p>\r\n'),
(4, 'web_theme_csscolor', 'default.css'),
(5, 'teks_berjalan', '[ SIDDIQ... AMANAH... TABLIGH... FATHONAH ]');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
