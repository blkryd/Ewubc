-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2018 at 03:14 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brandaid_registration`
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
  `team_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `team_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ref` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `payment_status` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'none',
  `form_status` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'none',
  `update_time` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_participants`
--

INSERT INTO `tbl_participants` (`id`, `p_name`, `uni_id`, `phone`, `team_email`, `team_name`, `ref`, `payment_status`, `form_status`, `update_time`) VALUES
(4, 'Shamem', '2222', '1684839939', 'blkryd@gmail.com', 'team name', 'ref', 'none', 'none', '2018-05-19 15:43:33'),
(5, 'Shamem', '2016-2-10-222', '1684839939', 'blkryd@gmail.com', 'Team star', 'Ref', 'none', 'none', '2018-05-19 17:57:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_participants`
--
ALTER TABLE `tbl_participants`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_participants`
--
ALTER TABLE `tbl_participants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
