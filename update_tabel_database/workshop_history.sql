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
-- Table structure for table `workshop_history`
--

CREATE TABLE `workshop_history` (
  `workshop_id` int(11) NOT NULL,
  `workshop_start` date NOT NULL,
  `workshop_end` date NOT NULL,
  `workshop_organizer` text NOT NULL,
  `workshop_location` varchar(50) NOT NULL,
  `workshop_employee_id` int(11) NOT NULL,
  `sekolah_id` int(11) NOT NULL,
  `workshop_photo` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workshop_history`
--

INSERT INTO `workshop_history` (`workshop_id`, `workshop_start`, `workshop_end`, `workshop_organizer`, `workshop_location`, `workshop_employee_id`, `sekolah_id`, `workshop_photo`) VALUES
(3, '2022-03-01', '2022-03-03', 'Pt. Indoweb', 'Kediri', 57, 0, 'Riwayat_Seminar_Pelatihan1647052441.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `workshop_history`
--
ALTER TABLE `workshop_history`
  ADD PRIMARY KEY (`workshop_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `workshop_history`
--
ALTER TABLE `workshop_history`
  MODIFY `workshop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
