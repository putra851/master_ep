-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2022 at 04:27 AM
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
-- Table structure for table `teaching_history`
--

CREATE TABLE `teaching_history` (
  `teaching_id` int(11) NOT NULL,
  `teaching_start` date NOT NULL,
  `teaching_end` date NOT NULL,
  `teaching_lesson` varchar(50) NOT NULL,
  `teaching_desc` text NOT NULL,
  `teaching_employee_id` int(10) NOT NULL,
  `sekolah_id` int(11) NOT NULL,
  `teaching_photo` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teaching_history`
--

INSERT INTO `teaching_history` (`teaching_id`, `teaching_start`, `teaching_end`, `teaching_lesson`, `teaching_desc`, `teaching_employee_id`, `sekolah_id`, `teaching_photo`) VALUES
(1, '2022-02-08', '2022-02-01', 'EKONOMI', 'OK', 120, 0, NULL),
(2, '2020-01-01', '2021-12-31', 'Agama Islam', 'Baik', 57, 0, 'file_1646966026.pdf'),
(3, '2021-01-01', '2022-01-31', 'Penjaskes', 'Sangat Baik', 57, 0, 'file_1646966073.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `teaching_history`
--
ALTER TABLE `teaching_history`
  ADD PRIMARY KEY (`teaching_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `teaching_history`
--
ALTER TABLE `teaching_history`
  MODIFY `teaching_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
