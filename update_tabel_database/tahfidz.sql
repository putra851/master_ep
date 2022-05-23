-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2022 at 04:24 AM
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
-- Table structure for table `tahfidz`
--

CREATE TABLE `tahfidz` (
  `tahfidz_id` int(11) NOT NULL,
  `tahfidz_period_id` int(11) NOT NULL,
  `tahfidz_student_id` int(11) NOT NULL,
  `tahfidz_date` date DEFAULT NULL,
  `tahfidz_new` text DEFAULT NULL,
  `tahfidz_murojaah` text DEFAULT NULL,
  `tahfidz_ziyadah` text DEFAULT NULL,
  `tahfidz_user_id` int(11) NOT NULL,
  `tahfidz_input_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `tahfidz_last_update` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tahfidz`
--

INSERT INTO `tahfidz` (`tahfidz_id`, `tahfidz_period_id`, `tahfidz_student_id`, `tahfidz_date`, `tahfidz_new`, `tahfidz_murojaah`, `tahfidz_ziyadah`, `tahfidz_user_id`, `tahfidz_input_date`, `tahfidz_last_update`) VALUES
(3, 1, 900, '2022-02-19', '2', 'An Naziat', 'Abasa', 32, '2022-02-19 01:53:16', '2022-02-19 01:53:16'),
(5, 1, 95, '2022-03-07', '5', 'Al-Baqarah', 'Ali-Imron', 28, '2022-03-07 02:51:37', '2022-03-07 02:51:37'),
(6, 1, 95, '2022-03-07', '9', 'Al-Baqarah', 'Ali-Mulk', 28, '2022-03-07 02:54:28', '2022-03-07 02:54:28'),
(7, 1, 1156, '2022-03-07', '6', 'Al-Baqarah', 'Ali-Mulk', 28, '2022-03-07 08:57:35', '2022-03-07 08:57:35'),
(8, 1, 1156, '2022-03-12', '6', 'Al-Baqarah', 'Ali-Imron', 28, '2022-03-12 02:23:57', '2022-03-12 02:23:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tahfidz`
--
ALTER TABLE `tahfidz`
  ADD PRIMARY KEY (`tahfidz_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tahfidz`
--
ALTER TABLE `tahfidz`
  MODIFY `tahfidz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
