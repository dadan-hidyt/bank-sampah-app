-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 19, 2022 at 08:17 AM
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
(1, 'dadan hidayat', 'sumedang', '2003-10-29', 'islam', 'd', 2, 1, 'Margalaksana', 'Sumedang selatan', 'Sumedang', 'Jawa barat', '333', 'd', '3'),
(2, 'Dadan Hidayat ', 'Sumedang ', '2022-08-14', 'ISLAM', 'Jln antum dimana saja ', 3, 4, 'Margalaksana', 'Sumedang ', 'Sumedang ', 'Jawa barat ', '202123223', 'files/penampung1/62fa4385bb25c1660568453fc80c9a4bd05139e4ae0af7af1c16ed5.jpeg', 'files/penampung1/62fa4385b82211660568453b269cbc84d50ebbd32e6d7b91f727ea1.jpeg'),
(3, 'iwan', '3423423423432', '2022-08-12', 'islam', '234', 44, 4, 'Margalaksana', 'dada', 'sess', '234234', '342423432423', 'files/member1/62fa3b18b896916605662963f5863e9b6a242b447dd2f0262f54562.jpg', 'files/member1/62fa3b18b88f91660566296c1210e2e4d20834edee79a329339acbb.png'),
(4, 'Dadan Hidayat ', 'Sumedang ', '2022-08-15', 'ISLAM', 'Jln antum dimana saja ', 3, 8, 'Margalaksana', 'Sumedang ', 'Sumedang ', 'Jawa barat ', 'Hh', 'files/member2/62fa454315bb71660568899e19b02d0161b9935c6e92430a0e26e33.svg', 'files/member2/62fa454315b8216605688997e20caedb76da62671b3092b2820f271.jpeg');

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
  `photo_profile` varchar(223) NOT NULL,
  `jabatan` varchar(23) NOT NULL,
  PRIMARY KEY (`id_pengguna`),
  UNIQUE KEY `username_uniq` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `username`, `password`, `email`, `id_akses`, `photo_profile`, `jabatan`) VALUES
(1, 'administrator', '$2y$10$N9wPe.zRqwwtg7u80B7bFuDyrmYBsI8OzrpNYsRif.wLbYMPo5S3W', 'admin@admin.com', 0, 'sumedang', 'super admin'),
(2, 'penampung1', '$2y$10$N9wPe.zRqwwtg7u80B7bFuDyrmYBsI8OzrpNYsRif.wLbYMPo5S3W', 'penampung1@gmail.com', 3, 'files/images/avatar/avatar-penampung1-ec7d8ab06d09c2ae1aef53299457de1b.jpg', 'penampung'),
(3, 'member1', '$2y$10$N9wPe.zRqwwtg7u80B7bFuDyrmYBsI8OzrpNYsRif.wLbYMPo5S3W', 'member@gmail.com', 2, 'files/images/avatar/avatar-member1-ae2b697435027ad7dd84701447dfd362.gif', 'Member'),
(4, 'member2', '$2y$10$N9wPe.zRqwwtg7u80B7bFuDyrmYBsI8OzrpNYsRif.wLbYMPo5S3W', 'member2@gmail.com', 2, '', 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `tb_produkjual`
--

DROP TABLE IF EXISTS `tb_produkjual`;
CREATE TABLE IF NOT EXISTS `tb_produkjual` (
  `id_produkjual` int(11) NOT NULL AUTO_INCREMENT,
  `id_pangguna` varchar(100) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `harga` varchar(221) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `status` varchar(20) NOT NULL,
  `deskripsi` text NOT NULL,
  PRIMARY KEY (`id_produkjual`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_sessions`
--

INSERT INTO `tb_sessions` (`id`, `id_pengguna`, `ip`, `token`, `platform`, `browser`, `create_at`, `expire`) VALUES
(55, 2, '192.168.43.253', '30dd9c71d405e687c14bb25462a2aa5b2e6d576d90c3a7a60b970b4a65ee0697', 'Windows', 'Chrome', '1660354805', '1691890805'),
(78, 3, '::1', '333e219511a41045fa84206611bf426d54da5fc0b0c17874884b697200a05806', 'Windows', 'Edge', '1660580087', '1692116087'),
(79, 2, '::1', '28d6a8227937e601a7572943a1254dde57a0da1199545e07ebd1187bc76acd1c', 'Windows 10', 'Chrome', '1660580443', '1692116443'),
(80, 2, '192.168.43.1', 'a0aed98382dfa4030ae98c8a04b12dac2d25a62c5008868e5c71fad6a42d986a', 'Android', 'Chrome', '1660581924', '1692117924'),
(81, 3, '::1', 'c74588df677ca3d5158384c4a49cc4972681563ee1518610827b9c9914b026c7', 'Windows 10', 'Chrome', '1660638136', '1692174136'),
(83, 2, '::1', 'f5430543f2d84a6e77e36ea822a6aacf9b323c93cb27e6708ecff0d39f92b38a', 'Windows 10', 'Chrome', '1660727334', '1692263334');

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

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_datadiri`
--
ALTER TABLE `tb_datadiri`
  ADD CONSTRAINT `tb_datadiri_ibfk_1` FOREIGN KEY (`id_diri`) REFERENCES `tb_pengguna` (`id_pengguna`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
