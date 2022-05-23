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
-- Table structure for table `status_history`
--

CREATE TABLE `status_history` (
  `stahistory_id` int(11) NOT NULL,
  `stahistory_start` date NOT NULL,
  `stahistory_end` date NOT NULL,
  `stahistory_name` text NOT NULL,
  `stahistory_emp` text NOT NULL,
  `stahistory_desc` text NOT NULL,
  `stahistory_employee_id` int(10) NOT NULL,
  `sekolah_id` int(11) NOT NULL,
  `stahistory_photo` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_history`
--

INSERT INTO `status_history` (`stahistory_id`, `stahistory_start`, `stahistory_end`, `stahistory_name`, `stahistory_emp`, `stahistory_desc`, `stahistory_employee_id`, `sekolah_id`, `stahistory_photo`) VALUES
(2, '2022-03-01', '2022-03-04', 'II-C', 'Pegawai Tetap', '-', 57, 0, ''),
(3, '2022-03-01', '2022-03-04', 'IV-D', 'Pegawai Teteap', '-', 57, 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `status_history`
--
ALTER TABLE `status_history`
  ADD PRIMARY KEY (`stahistory_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `status_history`
--
ALTER TABLE `status_history`
  MODIFY `stahistory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
