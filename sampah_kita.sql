-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2022 at 03:33 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

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

CREATE TABLE `tb_akses` (
  `id_akses` int(11) NOT NULL,
  `nama_akses` varchar(30) NOT NULL,
  `fungsi_akses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_akses`
--

INSERT INTO `tb_akses` (`id_akses`, `nama_akses`, `fungsi_akses`) VALUES
(1, 'admin', 1),
(2, 'member', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_datadiri`
--

CREATE TABLE `tb_datadiri` (
  `id_diri` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `tempat_lahir` varchar(43) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(32) NOT NULL,
  `alamat` text NOT NULL,
  `rt` int(11) NOT NULL,
  `rw` int(11) NOT NULL,
  `keluarahan_desa` varchar(32) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `kabupaten` varchar(50) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `no_ktp` int(16) NOT NULL,
  `foto_ktp` varchar(129) NOT NULL,
  `photo_kk` int(129) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_datadiri`
--

INSERT INTO `tb_datadiri` (`id_diri`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `rt`, `rw`, `keluarahan_desa`, `kecamatan`, `kabupaten`, `provinsi`, `no_ktp`, `foto_ktp`, `photo_kk`) VALUES
(1, 'dadan hidayat', 'sumedang', '2003-10-29', 'islam', 'd', 2, 1, 'Margalaksana', 'Sumedang selatan', 'Sumedang', 'Jawa barat', 333, 'd', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_menu`
--

CREATE TABLE `tb_menu` (
  `id_menu` varchar(18) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `link` varchar(200) NOT NULL,
  `active` enum('Y','N') NOT NULL,
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_menu`
--

INSERT INTO `tb_menu` (`id_menu`, `nama_menu`, `link`, `active`, `parent_id`) VALUES
('1', 'home', 'home.php', 'Y', 0),
('2', 'profil', 'profil.php', 'Y', 0),
('3', 'penjualan', 'penjualan', 'Y', 0),
('4', 'pemblian', '', 'Y', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_menu_akses`
--

CREATE TABLE `tb_menu_akses` (
  `akses_id` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_menu_akses`
--

INSERT INTO `tb_menu_akses` (`akses_id`, `id_menu`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 3),
(2, 1),
(2, 1),
(2, 3),
(2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(225) NOT NULL,
  `email` varchar(80) NOT NULL,
  `id_akses` int(11) NOT NULL,
  `photo_profile` varchar(223) NOT NULL,
  `jabatan` varchar(23) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `username`, `password`, `email`, `id_akses`, `photo_profile`, `jabatan`) VALUES
(1, 'dadan', 'dadanhidayat', 'dadan@dadan.com', 1, 'sumedang', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_akses`
--
ALTER TABLE `tb_akses`
  ADD PRIMARY KEY (`id_akses`),
  ADD KEY `fungsi_akses` (`fungsi_akses`);

--
-- Indexes for table `tb_datadiri`
--
ALTER TABLE `tb_datadiri`
  ADD PRIMARY KEY (`id_diri`);

--
-- Indexes for table `tb_menu`
--
ALTER TABLE `tb_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `tb_menu_akses`
--
ALTER TABLE `tb_menu_akses`
  ADD KEY `akses_id` (`akses_id`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD UNIQUE KEY `username_uniq` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_akses`
--
ALTER TABLE `tb_akses`
  MODIFY `id_akses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_datadiri`
--
ALTER TABLE `tb_datadiri`
  ADD CONSTRAINT `tb_datadiri_ibfk_1` FOREIGN KEY (`id_diri`) REFERENCES `tb_pengguna` (`id_pengguna`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tb_menu_akses`
--
ALTER TABLE `tb_menu_akses`
  ADD CONSTRAINT `tb_menu_akses_ibfk_1` FOREIGN KEY (`akses_id`) REFERENCES `tb_akses` (`fungsi_akses`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
