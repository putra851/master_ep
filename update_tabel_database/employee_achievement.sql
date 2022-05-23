-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2022 at 04:25 AM
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
-- Table structure for table `employee_achievement`
--

CREATE TABLE `employee_achievement` (
  `achievement_id` int(11) NOT NULL,
  `achievement_year` char(5) NOT NULL,
  `achievement_name` varchar(50) NOT NULL,
  `achievement_employee_id` int(10) NOT NULL,
  `sekolah_id` int(11) NOT NULL,
  `achievement_photo` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_achievement`
--

INSERT INTO `employee_achievement` (`achievement_id`, `achievement_year`, `achievement_name`, `achievement_employee_id`, `sekolah_id`, `achievement_photo`) VALUES
(1, '2001', 'WWA Globla Award', 57, 0, 'file_1646967585.pdf'),
(2, '2005', 'Miss Tercantik se Kampung', 57, 0, 'file_1646967623.jpg'),
(3, '2007', 'Miss Terupdate Se Kampung', 57, 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee_achievement`
--
ALTER TABLE `employee_achievement`
  ADD PRIMARY KEY (`achievement_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee_achievement`
--
ALTER TABLE `employee_achievement`
  MODIFY `achievement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
