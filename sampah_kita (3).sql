-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 27, 2022 at 12:25 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sampah_kita`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_akses`
--

DROP TABLE IF EXISTS `tb_akses`;
CREATE TABLE IF NOT EXISTS `tb_akses` (
  `id_akses` int(11) NOT NULL AUTO_INCREMENT,
  `nama_akses` varchar(30) NOT NULL,
  `fungsi_akses` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_akses`),
  KEY `fungsi_akses` (`fungsi_akses`),
  KEY `fungsi_akses_2` (`fungsi_akses`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_akses`
--

INSERT INTO `tb_akses` (`id_akses`, `nama_akses`, `fungsi_akses`) VALUES
(1, 'admin', NULL),
(2, 'member', 2),
(3, 'penampung', 3),
(4, 'pengelola', 1),
(6, 'rw', 4),
(7, 'rt', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tb_datadiri`
--

DROP TABLE IF EXISTS `tb_datadiri`;
CREATE TABLE IF NOT EXISTS `tb_datadiri` (
  `id_diri` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `tempat_lahir` varchar(43) NOT NULL,
  `tanggal_lahir` varchar(55) NOT NULL,
  `agama` varchar(32) NOT NULL,
  `alamat` text NOT NULL,
  `rt` int(11) NOT NULL,
  `rw` int(11) NOT NULL,
  `kelurahan_desa` varchar(32) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `kabupaten` varchar(50) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `no_ktp` varchar(16) NOT NULL,
  `foto_ktp` varchar(129) NOT NULL,
  `photo_kk` varchar(129) NOT NULL,
  PRIMARY KEY (`id_diri`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_datadiri`
--

INSERT INTO `tb_datadiri` (`id_diri`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `rt`, `rw`, `kelurahan_desa`, `kecamatan`, `kabupaten`, `provinsi`, `no_ktp`, `foto_ktp`, `photo_kk`) VALUES
(11, 'Dadan Hidayat', 'SUMEDANG', '2003-08-24', 'islam', 'SUMEDANG', 4, 4, 'Desa Margalaksana', 'SUMEDANG SELATAN', 'SUMEDANG', 'JAWA BARAT', '3211172910030001', 'files/dadanhidayat/6304cf14be0781661259540ff6ff23a2f94fee528be0e91bad79e7e.jpg', 'files/dadanhidayat/6304cf14be04516612595402c8cee477ddccaca2b46ece98ae772da.png'),
(12, 'Felix', 'sumedang', '1992-02-09', 'islam', 'JL. Sumedang merdeka NO9 Kabupaten sumedang, PERUM 43', 4, 4, 'DESA SEKAR WANGI', 'SUMEDANG', 'Sumedang', '234', '202113238493434', 'files/sumedang/63052b14e80b2166128309233f25d9a8015406fb36d4618d886297e.jpg', 'files/sumedang/63052af72dffc1661283063db82315c9710f5710922489e14ba456d.png'),
(13, 'Muhamad rfly', 'BOGOR', '2004-02-23', 'islam', 'JL. Medan raya NO1, RT03/05 Desa Mekar jaya', 3, 3, 'DESA SEKAR WANGI', 'SUMEDANG SELATAN', 'SUMEDANG', 'JAWA BARAT', '202113238493431', 'files/mard12/63052dc4cb129166128378069a6b391bccbc40bdacbb348dfcecc78.png', 'files/mard12/63052dc4cb0931661283780e0dfd4dcdb74333bf458e3b55ae5b1cd.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_det_transjual`
--

DROP TABLE IF EXISTS `tb_det_transjual`;
CREATE TABLE IF NOT EXISTS `tb_det_transjual` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kwitansi` varchar(255) DEFAULT NULL,
  `id_produkjual` varchar(255) DEFAULT NULL,
  `tanggal` varchar(255) DEFAULT NULL,
  `harga` varchar(255) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `jumlah` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_keuangan`
--

DROP TABLE IF EXISTS `tb_keuangan`;
CREATE TABLE IF NOT EXISTS `tb_keuangan` (
  `id_keuangan` int(11) NOT NULL AUTO_INCREMENT,
  `id_pengguna` int(11) NOT NULL,
  `tanggal_laporan` date NOT NULL,
  `bln_laporan` varchar(225) NOT NULL,
  `judul_laporan` varchar(225) NOT NULL,
  `deskripsi` text NOT NULL,
  `nominal` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_keuangan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_menu`
--

DROP TABLE IF EXISTS `tb_menu`;
CREATE TABLE IF NOT EXISTS `tb_menu` (
  `id_menu` varchar(18) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `link` varchar(200) NOT NULL,
  `active` enum('Y','N') NOT NULL,
  `parent_id` int(11) DEFAULT '0',
  `icon` varchar(23) NOT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_menu`
--

INSERT INTO `tb_menu` (`id_menu`, `nama_menu`, `link`, `active`, `parent_id`, `icon`) VALUES
('1', 'Transaksi', '', 'Y', 0, 'mdi mdi-cash\n'),
('2', 'Penjualan', 'penjualan.php', 'Y', 1, ''),
('3', 'Pembelian', 'pembelian.php', 'Y', 1, 'mdi-account'),
('4', 'produk jual', 'produk_jual.php', 'Y', 0, 'mdi mdi-cart'),
('5', 'akun', 'akun.php', 'Y', 0, 'mdi-account');

-- --------------------------------------------------------

--
-- Table structure for table `tb_menu_akses`
--

DROP TABLE IF EXISTS `tb_menu_akses`;
CREATE TABLE IF NOT EXISTS `tb_menu_akses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `akses_id` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `akses_id` (`akses_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_menu_akses`
--

INSERT INTO `tb_menu_akses` (`id`, `akses_id`, `id_menu`) VALUES
(1, 2, 1),
(2, 2, 2),
(3, 2, 3),
(4, 2, 5),
(5, 3, 1),
(6, 3, 2),
(7, 3, 3),
(8, 3, 4),
(9, 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

DROP TABLE IF EXISTS `tb_pengguna`;
CREATE TABLE IF NOT EXISTS `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(225) NOT NULL,
  `email` varchar(80) NOT NULL,
  `id_akses` int(11) NOT NULL,
  `photo_profile` varchar(223) DEFAULT NULL,
  `confirmation` enum('Y','N') NOT NULL,
  PRIMARY KEY (`id_pengguna`),
  UNIQUE KEY `username_uniq` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `username`, `password`, `email`, `id_akses`, `photo_profile`, `confirmation`) VALUES
(1, 'administrator', '$2y$10$N9wPe.zRqwwtg7u80B7bFuDyrmYBsI8OzrpNYsRif.wLbYMPo5S3W', 'admin@admin.com', 0, 'sumedang', 'Y'),
(11, 'dadanhidayat', '$2y$10$T8WHw2RZeCSwMpk4qGPbD.8adbmuOmgJzfP./K8d5a5uo0UZ3rvwS', 'dadanhidayat@dadan.com', 2, 'files/images/avatar/avatar-dadanhidayat-90e1d183a5b03ff7df6dd2cd69be09f3.gif', 'N'),
(12, 'sumedang', '$2y$10$WzI.99sFaKvK2KgkySKp5OeKhD1sFE4daTLjJNVVVU59SviyDr3HK', 'dadan@gmail.com', 2, NULL, 'N'),
(13, 'mard12', '$2y$10$b1Cbc3B5viNCtEoR39YKsuf.n2w4yXhnDHFGwZYq/APIATX0LrzTa', 'mard12@gmail.com', 3, 'files/images/avatar/avatar-mard12-23997b2a2c13557a3b23ab2561924e39.jpg', 'N'),
(14, 'sumedang_penampung', '$2y$10$yiEKD9BfL5HQ.MNCw1HEh.cAAoldyduWjF3IhiNs5gjlUI14f3CZ2', 'sumedang_penampung@sumedang.com', 3, NULL, 'N'),
(15, 'ridarmasteradmin', '$2y$10$MTcg4SrvAwsZJQv1SamW.OZMCQui22izmsdSIHS88jKmRF55KD/6O', 'dadan0@dadan.com', 3, 'files/images/avatar/avatar-ridarmasteradmin-1f14571bd4a6c2537041df08b195817c.jpg', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `tb_produkbeli`
--

DROP TABLE IF EXISTS `tb_produkbeli`;
CREATE TABLE IF NOT EXISTS `tb_produkbeli` (
  `id_produkbeli` int(11) NOT NULL AUTO_INCREMENT,
  `id_pengguna` int(11) NOT NULL,
  `nama` varchar(120) DEFAULT NULL,
  `harga` varchar(255) DEFAULT NULL,
  `harga_lama` varchar(225) NOT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `pj` varchar(100) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `deskripsi` text,
  PRIMARY KEY (`id_produkbeli`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_produkbeli`
--

INSERT INTO `tb_produkbeli` (`id_produkbeli`, `id_pengguna`, `nama`, `harga`, `harga_lama`, `satuan`, `pj`, `status`, `deskripsi`) VALUES
(1, 15, 'KARDUS', '7400', '7000', 'lusin', NULL, 'null', 'neak'),
(2, 15, 'Kaleng', '10000', '0', 'pcs', NULL, 'null', ''),
(3, 15, 'bunda rahma', '100000000', '0', 'lusin', NULL, 'null', 'da'),
(4, 15, 'besi', '9000', '10000', 'KG', NULL, 'null', 'Yang punya besi baja bisa di jual di sini\r\natau 0882238376253'),
(5, 15, 'Komputer Rongsok', '50000', '0', 'BIJI', NULL, 'null', 'Di beli komputer bekas all spek'),
(6, 15, 'TV Rongsok', '50000', '0', 'PCS', NULL, 'null', 'Di beli komputer bekas all spek');

-- --------------------------------------------------------

--
-- Table structure for table `tb_produkjual`
--

DROP TABLE IF EXISTS `tb_produkjual`;
CREATE TABLE IF NOT EXISTS `tb_produkjual` (
  `id_produkjual` int(11) NOT NULL AUTO_INCREMENT,
  `id_pengguna` varchar(100) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `harga` varchar(221) NOT NULL,
  `harga_lama` varchar(233) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `status` varchar(20) NOT NULL,
  `deskripsi` text NOT NULL,
  PRIMARY KEY (`id_produkjual`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_produkjual`
--

INSERT INTO `tb_produkjual` (`id_produkjual`, `id_pengguna`, `nama`, `harga`, `harga_lama`, `satuan`, `status`, `deskripsi`) VALUES
(18, '15', 'Indonesia', '10000', '0', 'lusin', 'null', 'da'),
(17, '14', 'kondom bekas', '1000', '0', 'lusin', 'null', 'wkwkwk'),
(16, '14', 'Komputer rongsok', '50000', '0', 'lusin', 'null', 'Komputer rongsok yang harganya murah silahkan'),
(15, '14', 'Kelapa muda enak', '5000', '0', 'lusin', 'null', 'dadan hidayat'),
(14, '14', 'Kertas Bekas', '1000', '0', 'lusin', 'null', 'dadan hidayat');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sessions`
--

DROP TABLE IF EXISTS `tb_sessions`;
CREATE TABLE IF NOT EXISTS `tb_sessions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pengguna` int(11) NOT NULL,
  `ip` varchar(69) NOT NULL,
  `token` varchar(225) NOT NULL,
  `platform` varchar(50) NOT NULL,
  `browser` varchar(10) NOT NULL,
  `create_at` varchar(100) NOT NULL,
  `expire` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_sessions`
--

INSERT INTO `tb_sessions` (`id`, `id_pengguna`, `ip`, `token`, `platform`, `browser`, `create_at`, `expire`) VALUES
(100, 13, '::1', 'ac3703a0191d667a6b5ce59d559b03ea1e8affa8bc84a26afb31b2470233887b', 'Windows 10', 'Chrome', '1661283673', '1692819673'),
(102, 15, '::1', '0a47efa0dc69992c59fa66c6d2d228cd5ae9acc83398abad4fd562dfca70e739', 'Windows 10', 'Chrome', '1661592477', '1693128477');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tabungan`
--

DROP TABLE IF EXISTS `tb_tabungan`;
CREATE TABLE IF NOT EXISTS `tb_tabungan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_tabungan` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `saldo` int(11) NOT NULL,
  `saldo_masuk` int(11) NOT NULL,
  `saldo_keluar` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `deskripsi` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_tabungan`
--

INSERT INTO `tb_tabungan` (`id`, `id_tabungan`, `id_pengguna`, `saldo`, `saldo_masuk`, `saldo_keluar`, `tanggal`, `deskripsi`) VALUES
(1, 1, 2, 5000, 0, 0, '2022-08-12', 'Penjualan barang\r\n'),
(2, 1, 2, 10000, 5000, 0, '2022-08-26', 'Open BO'),
(3, 2, 2, 20000, 10000, 0, '2022-08-19', 'Jual Ginjal'),
(4, 2, 2, 15000, 0, 5000, '2022-08-19', 'sewa lonte');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transjual`
--

DROP TABLE IF EXISTS `tb_transjual`;
CREATE TABLE IF NOT EXISTS `tb_transjual` (
  `id_jual` int(255) NOT NULL AUTO_INCREMENT,
  `id_invoice` varchar(255) DEFAULT NULL,
  `id_pengguna` varchar(255) DEFAULT NULL,
  `id_penampung` int(11) NOT NULL,
  `tanggal` datetime DEFAULT NULL,
  `harga` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_jual`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
