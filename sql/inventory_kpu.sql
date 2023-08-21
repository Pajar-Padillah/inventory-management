-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2023 at 12:36 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory_kpu`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` char(7) NOT NULL,
  `nama_barang` varchar(35) NOT NULL,
  `ruang_id` int(11) NOT NULL,
  `satuan_id` int(11) NOT NULL,
  `jenis_id` int(11) NOT NULL,
  `nilai_perolehan` int(11) NOT NULL,
  `kondisi` enum('baik','rusak','keluar') NOT NULL,
  `tanggal_perolehan` date NOT NULL,
  `tanggal_rusak` date NOT NULL,
  `tanggal_keluar` date DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `keterangan_rusak` text DEFAULT NULL,
  `approved_rusak` enum('pending','ya','tidak') NOT NULL,
  `approved_keluar` enum('pending','ya','tidak') NOT NULL,
  `kuitansi` text NOT NULL,
  `nilai_lelang` int(11) NOT NULL,
  `keterangan_tolak` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `ruang_id`, `satuan_id`, `jenis_id`, `nilai_perolehan`, `kondisi`, `tanggal_perolehan`, `tanggal_rusak`, `tanggal_keluar`, `foto`, `keterangan_rusak`, `approved_rusak`, `approved_keluar`, `kuitansi`, `nilai_lelang`, `keterangan_tolak`, `user_id`) VALUES
('BMN0009', 'Olympic meja', 2, 1, 12, 790000, 'keluar', '0000-00-00', '2022-12-29', '2023-01-13', 'Bukti_Kerusakan_bmn0009.jpg', 'Rusak Parah', 'ya', 'tidak', 'Kuitansi_bmn0009.jpg', 20000, 'No', 14),
('BMN0012', 'Samsung TV', 2, 3, 7, 760990, 'rusak', '2022-12-30', '2023-01-03', NULL, 'Bukti_Kerusakan_bmn0012.jpeg', 'rusak paah', 'pending', 'pending', '', 0, 'anjay', 14),
('BMN0013', 'Laptop Lenovo Thinkpad', 3, 1, 3, 4700000, 'rusak', '2023-01-07', '2023-01-07', NULL, 'Bukti_Kerusakan_bmn0013.jpeg', 'Rusak keyboard', 'ya', 'pending', '', 0, '', 14),
('BMN0014', 'Laptop Lenovo Thinkpad', 2, 1, 3, 7600999, 'baik', '2023-01-08', '0000-00-00', NULL, '', NULL, 'ya', 'pending', '', 0, '', 14),
('BMN0015', 'Hai', 2, 1, 17, 0, 'baik', '2022-12-08', '0000-00-00', NULL, NULL, NULL, 'pending', 'pending', '', 0, '', 14);

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `nama_jenis`) VALUES
(1, 'Lemari Besi'),
(2, 'White Board'),
(3, 'Laptop'),
(4, 'LCD Projector'),
(5, 'Sepeda Motor'),
(6, 'Mobil'),
(7, 'Perangkat Komputer'),
(8, 'Mini Bus'),
(9, 'Printer'),
(10, 'Printer'),
(11, 'PC'),
(12, 'Meja Kerja Kayu'),
(13, 'Kursi Besi'),
(14, 'Rak Kayu'),
(15, 'Tv Monitor'),
(16, 'Sound System'),
(17, 'Scanner');

-- --------------------------------------------------------

--
-- Table structure for table `ruang`
--

CREATE TABLE `ruang` (
  `id_ruang` int(11) NOT NULL,
  `nama_ruang` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ruang`
--

INSERT INTO `ruang` (`id_ruang`, `nama_ruang`) VALUES
(2, 'A'),
(3, 'B');

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `id_satuan` int(11) NOT NULL,
  `nama_satuan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`id_satuan`, `nama_satuan`) VALUES
(1, 'Unit'),
(3, 'Buah');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `role` enum('gudang','admin','umum') NOT NULL,
  `password` varchar(65) NOT NULL,
  `created_at` int(11) NOT NULL,
  `foto` text NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `email`, `no_telp`, `role`, `password`, `created_at`, `foto`, `is_active`) VALUES
(1, 'Adminisitrator', 'admin', 'admin@admin.com', '025123456789', 'admin', '$2y$10$wMgi9s3FEDEPEU6dEmbp8eAAEBUXIXUy3np3ND2Oih.MOY.q/Kpoy', 1568689561, '9ebda9d58e1e70cfd764563e83afb3d3.png', 1),
(14, 'Pajar Padillah', 'pajar', 'pajar@gmail.com', '0909898998', 'gudang', '$2y$10$phuV2Rt/enXQiwIjsg4VIO047lBuvRogUh605yP9cXFImgY8vJLxW', 1671280655, '793486174c903ecf17c86b4c08b120fd.png', 1),
(16, 'Rama Yusuf', 'rama', 'rama@gmail.com', '0897867677', 'umum', '$2y$10$qbIbtglXXB05xqedJDXZEunnBLKJJ1WwF5D9EcsMEQrO9koxKnfVW', 1672315885, 'a259484dd14cd92f12c652333c92682a.png', 1),
(17, 'Pebriansyah', 'pebri', 'pebri@gmail.com', '0898978787', 'umum', '$2y$10$No00R5Zgr.W7em75h4xrHezdtvV6yvxIjwr7B5t70vy/RyIZsklrm', 1672316835, 'b767606e4ce3daf629387652cafb6a3a.png', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `satuan_id` (`satuan_id`),
  ADD KEY `kategori_id` (`jenis_id`),
  ADD KEY `ruang_id` (`ruang_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`id_ruang`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `ruang`
--
ALTER TABLE `ruang`
  MODIFY `id_ruang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`satuan_id`) REFERENCES `satuan` (`id_satuan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_ibfk_2` FOREIGN KEY (`jenis_id`) REFERENCES `jenis` (`id_jenis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_ibfk_3` FOREIGN KEY (`ruang_id`) REFERENCES `ruang` (`id_ruang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
