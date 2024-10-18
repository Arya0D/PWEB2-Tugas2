-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 18, 2024 at 03:02 AM
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
-- Database: `pwebTugas2`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `mahasiswa_id` int(11) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `nama_mhs` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`mahasiswa_id`, `nim`, `nama_mhs`, `email`, `no_telp`) VALUES
(1, '2030202054', 'Arya ', 'skdflaj', '340985098093'),
(2, '2390202054', 'Budiono Siregar', 'budi@gmail.com', '08123456789'),
(3, '249432798479', 'Budi Arie Setiadi', 'budi@kominfo.com', '093456789876543');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_perbaikan`
--

CREATE TABLE `nilai_perbaikan` (
  `perbaikan_id` int(11) NOT NULL,
  `tgl_perbaikan` date NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `mahasiswa_id` int(11) NOT NULL,
  `matkul` varchar(25) NOT NULL,
  `semester` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `dosen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `nilai_perbaikan`
--

INSERT INTO `nilai_perbaikan` (`perbaikan_id`, `tgl_perbaikan`, `keterangan`, `mahasiswa_id`, `matkul`, `semester`, `nilai`, `dosen`) VALUES
(1, '2024-10-17', 'Remidi', 1, 'Rekayasa Nuklir', 3, 75, 'Budi'),
(2, '2024-10-19', 'Remidi', 2, 'Teknil Kapal Laut', 7, 80, 'Jojo'),
(3, '2024-10-19', 'gagal', 3, 'Kominfo', 99, 0, 'Mulyono');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`mahasiswa_id`);

--
-- Indexes for table `nilai_perbaikan`
--
ALTER TABLE `nilai_perbaikan`
  ADD PRIMARY KEY (`perbaikan_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `mahasiswa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nilai_perbaikan`
--
ALTER TABLE `nilai_perbaikan`
  MODIFY `perbaikan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
