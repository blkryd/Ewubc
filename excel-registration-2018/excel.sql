-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2018 at 08:18 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `excel`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_participants`
--

CREATE TABLE `tbl_participants` (
  `id` int(11) NOT NULL,
  `p_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `uni_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `day1` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `day2` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `update_time` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_seat`
--

CREATE TABLE `tbl_seat` (
  `id` int(11) NOT NULL,
  `seat` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `slot` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sold` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `sday` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_seat`
--

INSERT INTO `tbl_seat` (`id`, `seat`, `slot`, `sold`, `sday`) VALUES
(1, '24', 'A1 (10.10-11.40)', '0', 'day1'),
(2, '24', 'A2 (11.50-1.20)', '0', 'day1'),
(3, '24', 'A3 (3.00-4.30)', '0', 'day1'),
(4, '24', 'A4 (4.40-6.10)', '0', 'day1'),
(5, '24', 'B1 (10.10-11.40)', '0', 'day2'),
(6, '24', 'B2 (11.50-1.20)', '0', 'day2'),
(7, '24', 'B3 (3.00-4.30)', '0', 'day2'),
(8, '24', 'B4 (4.40-6.10)', '0', 'day2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_participants`
--
ALTER TABLE `tbl_participants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_seat`
--
ALTER TABLE `tbl_seat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_participants`
--
ALTER TABLE `tbl_participants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_seat`
--
ALTER TABLE `tbl_seat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
