-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2024 at 03:57 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `komunitas`
--

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tanggalpertandingan` varchar(50) NOT NULL,
  `jam` varchar(50) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id`, `nama`, `tanggalpertandingan`, `jam`, `gambar`) VALUES
(1, 'RRQ VS EVOS', 'Rabu,18 Januari 2024', '17 : 00', '659a12412a79a.jpeg'),
(2, 'Onic VS Btr', 'Rabu,18 Januari 2024', '19 : 00', '659a1277c8e5a.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `id` int(11) NOT NULL,
  `nik` char(12) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nohp` char(14) NOT NULL,
  `jeniskelamin` enum('pria','wanita','','') NOT NULL,
  `tanggallahir` date NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `posisi` set('Exp Lane','Mid Lane','Gold Lane','Jungler','Roamer') NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`id`, `nik`, `nama`, `email`, `nohp`, `jeniskelamin`, `tanggallahir`, `alamat`, `posisi`, `gambar`) VALUES
(1, '701220026', 'Xinn', 'xinn@gmail.com', '085768979940', 'pria', '2000-02-03', 'medan', 'Exp Lane', '659a0c9552b6c.jpeg'),
(14, '701220028', 'Wann', 'wann@gmail.com', '085234465789', 'pria', '2002-06-13', 'depok', 'Exp Lane', '659a0cd631524.jpeg'),
(15, '701220030', 'Sanz', 'sanz@gmail.com', '085768978920', 'pria', '2003-08-25', 'Palembang', 'Mid Lane', '659a0d68a49d8.jpeg'),
(16, '701220034', 'Pai', 'pai@gmail.com', '082364976940', 'pria', '2001-01-06', 'jambi', 'Exp Lane', '659a10c2d4adc.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tim`
--

CREATE TABLE `tim` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `posisi` set('Exp Lane','Mid Lane','Gold Lane','Jungler','Roamer') NOT NULL,
  `namatim` varchar(50) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tim`
--

INSERT INTO `tim` (`id`, `nama`, `posisi`, `namatim`, `gambar`) VALUES
(1, 'Xinn', 'Gold Lane', 'RRQ', '659a0ed9458b5.jpeg'),
(6, 'Wann', 'Mid Lane', 'Evos', '659a0fed61a64.jpeg'),
(7, 'Sanz', 'Mid Lane', 'Onic', '659a0fdf67909.jpeg'),
(8, 'Pai', 'Exp Lane', 'Alter Ego', '659a11acd472d.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `level`) VALUES
(1, 'admin ', 'admin', 'admin123', 'admin'),
(2, 'peserta', 'peserta', 'peserta123', 'peserta'),
(3, 'pemilik', 'pemilik', 'pemilik123', 'pemilik');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tim`
--
ALTER TABLE `tim`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tim`
--
ALTER TABLE `tim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
