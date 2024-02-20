-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2023 at 01:21 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parkir`
--

-- --------------------------------------------------------

--
-- Table structure for table `history_parkir`
--

CREATE TABLE `history_parkir` (
  `id` int(11) NOT NULL,
  `nomor_polisi` varchar(10) DEFAULT NULL,
  `jam_masuk` datetime DEFAULT NULL,
  `jam_keluar` datetime NOT NULL DEFAULT current_timestamp(),
  `total_bayar` int(16) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `history_parkir`
--

INSERT INTO `history_parkir` (`id`, `nomor_polisi`, `jam_masuk`, `jam_keluar`, `total_bayar`, `user_id`) VALUES
(30, 'Z 20005 T', '2023-06-14 18:17:54', '2023-06-14 18:19:05', 1000, 0),
(31, 'Z 20005 T', '2023-06-14 18:19:25', '2023-06-14 18:19:28', 1000, 0),
(32, 'z 4563 yt', '2023-06-14 19:05:30', '2023-06-14 19:06:06', 1000, 29);

-- --------------------------------------------------------

--
-- Table structure for table `jeniskendaraan`
--

CREATE TABLE `jeniskendaraan` (
  `id_jenisKendaraan` int(11) NOT NULL,
  `jenis_kendaraan` varchar(20) DEFAULT NULL,
  `harga` varchar(10) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `jeniskendaraan`
--

INSERT INTO `jeniskendaraan` (`id_jenisKendaraan`, `jenis_kendaraan`, `harga`, `user_id`) VALUES
(18, 'motor', '1000', 0),
(19, 'motor', '1000', 29);

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE `kendaraan` (
  `id` int(11) NOT NULL,
  `nama_pemilik` varchar(255) NOT NULL,
  `nomor_polisi` varchar(10) DEFAULT NULL,
  `nama_kendaraan` varchar(50) DEFAULT NULL,
  `merk_kendaraan` varchar(20) DEFAULT NULL,
  `id_jenisKendaraan` int(11) DEFAULT NULL,
  `jam_masuk` datetime DEFAULT NULL,
  `jam_keluar` datetime DEFAULT current_timestamp(),
  `total_bayar` int(16) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kendaraan`
--

INSERT INTO `kendaraan` (`id`, `nama_pemilik`, `nomor_polisi`, `nama_kendaraan`, `merk_kendaraan`, `id_jenisKendaraan`, `jam_masuk`, `jam_keluar`, `total_bayar`, `user_id`) VALUES
(65, 'salamun', 'Z 20005 T', 'NMAX', 'Suzuki', 18, '2023-06-14 18:19:25', '2023-06-14 18:19:28', 1000, 0),
(66, 'warsito', 'z 4563 yt', 'beat', 'Yamaha', 19, '2023-06-14 19:05:30', '2023-06-14 19:06:06', 1000, 29);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `alamat` text NOT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `alamat`, `password`) VALUES
(29, 'setiadi', 'jalan tanuwijaya', '$2y$10$F1G./hgDVq8m5/syQ1mLqOcKVklUO.x8xR0kmDSz7Ya0Bg19k7WnS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `history_parkir`
--
ALTER TABLE `history_parkir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jeniskendaraan`
--
ALTER TABLE `jeniskendaraan`
  ADD PRIMARY KEY (`id_jenisKendaraan`);

--
-- Indexes for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_jenisKendaraan` (`id_jenisKendaraan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `history_parkir`
--
ALTER TABLE `history_parkir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `jeniskendaraan`
--
ALTER TABLE `jeniskendaraan`
  MODIFY `id_jenisKendaraan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `kendaraan`
--
ALTER TABLE `kendaraan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD CONSTRAINT `kendaraan_ibfk_1` FOREIGN KEY (`id_jenisKendaraan`) REFERENCES `jeniskendaraan` (`id_jenisKendaraan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
