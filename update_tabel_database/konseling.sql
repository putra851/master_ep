-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2022 at 04:23 AM
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
-- Table structure for table `konseling`
--

CREATE TABLE `konseling` (
  `konseling_id` int(11) NOT NULL,
  `konseling_period_id` int(11) NOT NULL,
  `konseling_student_id` int(11) NOT NULL,
  `konseling_date` date DEFAULT NULL,
  `konseling_true` text DEFAULT NULL,
  `konseling_foul` text DEFAULT NULL,
  `konseling_action` text DEFAULT NULL,
  `konseling_code` int(11) NOT NULL,
  `konseling_poin` text DEFAULT NULL,
  `konseling_note` text DEFAULT NULL,
  `konseling_user_id` int(11) NOT NULL,
  `konseling_input_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `konseling_last_update` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konseling`
--

INSERT INTO `konseling` (`konseling_id`, `konseling_period_id`, `konseling_student_id`, `konseling_date`, `konseling_true`, `konseling_foul`, `konseling_action`, `konseling_code`, `konseling_poin`, `konseling_note`, `konseling_user_id`, `konseling_input_date`, `konseling_last_update`) VALUES
(2, 1, 550, '2022-02-19', 'Sholat Jama\'ah Full 1 Bulan', NULL, 'Hadiah Buku ', 1, NULL, 'semangat yaa', 28, '2022-02-19 02:09:02', '2022-02-19 02:09:02'),
(3, 1, 900, '2022-02-19', NULL, 'telat', 'membersigkan kelas', 2, NULL, 'jangan terlambat lagi', 32, '2022-02-19 02:09:23', '2022-02-19 02:09:23'),
(6, 1, 1156, '2022-03-08', NULL, 'Test Pelanggaran', 'pelanggaran', 2, NULL, '-', 28, '2022-03-08 02:26:47', '2022-03-08 02:26:47'),
(7, 1, 1156, '2022-03-12', 'Solat tepat Waktu', NULL, 'Mendapat Sarung', 1, NULL, '-', 28, '2022-03-12 02:25:08', '2022-03-12 02:25:08'),
(8, 1, 1156, '2022-03-12', NULL, 'Telat masuk sekolah', 'Membersihkan ruang kelas', 2, NULL, '-', 28, '2022-03-12 02:25:34', '2022-03-12 02:25:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `konseling`
--
ALTER TABLE `konseling`
  ADD PRIMARY KEY (`konseling_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `konseling`
--
ALTER TABLE `konseling`
  MODIFY `konseling_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
