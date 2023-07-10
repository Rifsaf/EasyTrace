-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2023 at 08:24 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `et`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_brg` varchar(225) NOT NULL,
  `stok` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_brg`, `stok`, `id_jenis`) VALUES
(1001, 'helem', 96, 3),
(1002, 'safety gloves', 99, 3),
(1003, 'safety vest', 100, 3),
(1004, 'safety glasses', 101, 3),
(1005, 'safety shoes', 100, 3),
(1101, 'palu', 300, 2),
(1102, 'bor mesin', 100, 2),
(1103, 'gerenda', 50, 2);

-- --------------------------------------------------------

--
-- Table structure for table `barang_klr`
--

CREATE TABLE `barang_klr` (
  `jumlah` int(11) NOT NULL,
  `tanggal_klr` date NOT NULL,
  `id_pinjam` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `data_pinjam`
--

CREATE TABLE `data_pinjam` (
  `id_pinjam` int(11) NOT NULL,
  `nama_pinjam` varchar(225) NOT NULL,
  `nama_barang` varchar(225) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `tanggal_pinjam` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_pinjam`
--

INSERT INTO `data_pinjam` (`id_pinjam`, `nama_pinjam`, `nama_barang`, `jumlah_barang`, `tanggal_pinjam`) VALUES
(22, 'megan', 'helem', 1, '2023-01-26'),
(23, 'danielle', 'safety glasses', 1, '2023-01-27'),
(24, 'tita', 'safety gloves', 1, '2023-02-02');

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` int(11) NOT NULL,
  `jenis_brg` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `jenis_brg`) VALUES
(1, 'Alat berat'),
(2, 'Alat ringan'),
(3, 'Alat keselamatan');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `name`, `password`) VALUES
(1001, 'dashi', 'dashi123'),
(1002, 'ryan renold', 'hitme123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_jenis` (`id_jenis`);

--
-- Indexes for table `barang_klr`
--
ALTER TABLE `barang_klr`
  ADD KEY `id_pinjam` (`id_pinjam`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `data_pinjam`
--
ALTER TABLE `data_pinjam`
  ADD PRIMARY KEY (`id_pinjam`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_pinjam`
--
ALTER TABLE `data_pinjam`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_jenis`) REFERENCES `jenis` (`id_jenis`);

--
-- Constraints for table `barang_klr`
--
ALTER TABLE `barang_klr`
  ADD CONSTRAINT `barang_klr_ibfk_1` FOREIGN KEY (`id_pinjam`) REFERENCES `data_pinjam` (`id_pinjam`),
  ADD CONSTRAINT `barang_klr_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
