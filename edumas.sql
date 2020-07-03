-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2020 at 03:30 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `edumas`
--

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id_laporan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `subjek` varchar(50) NOT NULL,
  `masalah` varchar(255) NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `status` enum('1','2','3') NOT NULL,
  `waktu_lapor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id_laporan`, `id_user`, `subjek`, `masalah`, `lokasi`, `detail`, `gambar`, `status`, `waktu_lapor`) VALUES
(1, 18, 'Pengaduan', 'Kerusakan Listrik', 'NA XI SIJA', '0', '5ed5dc9b3a3ed.png', '2', '1591909018'),
(3, 9, 'Pengaduan', 'Kehilangan Barang', 'WS SIJA', 'Saya kehilangan uang 50.000 ', '5ee25d30bdbf1.jpg', '2', '1591911296'),
(4, 20, '', 'Kerusakan Sarana', 'NA X SIJA', 'Meja &amp; kursi penopangnya rusak dan kelas X SIJA kekurangan kursi ', '5ee2d41c9ef54.jpg', '3', '1591941740');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `profil` varchar(100) DEFAULT NULL,
  `level` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `password`, `profil`, `level`) VALUES
(5, 'Yoga Adi Putra', 'yogaadi2693@gmail.com', '202cb962ac59075b964b07152d234b70', 'user.png', 'admin'),
(9, 'Yoga', '123@user.com', '202cb962ac59075b964b07152d234b70', 'user.png', 'user'),
(18, 'Agoy Putra', '123@gmail.com', '202cb962ac59075b964b07152d234b70', 'user.png', 'user'),
(20, 'Farhan Ramadhan', 'farhan@gmail.com', '202cb962ac59075b964b07152d234b70', 'user.png', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_laporan`),
  ADD KEY `fk_laporan_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `laporan`
--
ALTER TABLE `laporan`
  ADD CONSTRAINT `fk_laporan_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
