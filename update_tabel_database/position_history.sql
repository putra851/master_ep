-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2022 at 04:26 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epesantr_baitulizzah`
--

-- --------------------------------------------------------

--
-- Table structure for table `position_history`
--

CREATE TABLE `position_history` (
  `poshistory_id` int(11) NOT NULL,
  `poshistory_start` date NOT NULL,
  `poshistory_end` date NOT NULL,
  `poshistory_desc` text NOT NULL,
  `poshistory_employee_id` int(10) NOT NULL,
  `sekolah_id` int(11) NOT NULL,
  `poshistory_photo` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `position_history`
--

INSERT INTO `position_history` (`poshistory_id`, `poshistory_start`, `poshistory_end`, `poshistory_desc`, `poshistory_employee_id`, `sekolah_id`, `poshistory_photo`) VALUES
(1, '2009-09-16', '2009-12-19', 'STATUS MAGANG', 120, 0, ''),
(2, '2009-01-19', '2010-12-19', 'STATUS PEGAWAI KONTRAK', 120, 0, ''),
(3, '2010-01-19', '2013-12-19', 'STATUS PEGAWAI TIDAK TETAP', 120, 0, ''),
(4, '2013-01-19', '2022-02-22', 'STATUS PEGAWAI TETAP', 120, 0, ''),
(7, '2022-03-01', '2022-03-04', 'Guru', 57, 0, 'Riwayat_Jabatan1647052516.pdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `position_history`
--
ALTER TABLE `position_history`
  ADD PRIMARY KEY (`poshistory_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `position_history`
--
ALTER TABLE `position_history`
  MODIFY `poshistory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
