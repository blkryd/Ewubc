-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2018 at 06:06 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cc_2018`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company`
--

CREATE TABLE `tbl_company` (
  `id` int(11) NOT NULL,
  `c_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `seats` int(10) NOT NULL,
  `seats_filled` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_company`
--

INSERT INTO `tbl_company` (`id`, `c_name`, `seats`, `seats_filled`) VALUES
(11, 'Uniliver', 25, 25),
(13, 'Reckitt Benkiser', 15, 5),
(15, 'Pran-RFL', 25, 23),
(16, 'Sajeeb Group', 15, 10),
(17, 'Standard Charterd Bank', 20, 19),
(19, 'UCB', 15, 6),
(20, 'NRB/Jamuna', 15, 6),
(21, 'MGH', 15, 13),
(22, 'Robi', 25, 24),
(24, 'Magnito', 15, 8),
(25, 'ACI Pharma', 25, 24),
(27, 'Bkash', 15, 8),
(28, 'Daraz.com.bd', 15, 7),
(29, 'Rancon Motors Ltd.', 20, 12),
(31, 'Augmedix BD', 10, 1),
(34, 'City Bank', 15, 8),
(35, 'IDLC', 15, 8),
(36, 'IPDC', 15, 8),
(37, 'Grameenphone', 30, 27),
(38, 'Banglalink', 20, 14),
(39, 'Baximco Pharma', 30, 26),
(41, 'Avery Dennison', 10, 4),
(42, 'BEOL', 15, 3),
(44, 'Eastern Bank Ltd.', 15, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_participants`
--

CREATE TABLE `tbl_participants` (
  `id` int(11) NOT NULL,
  `p_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `uni_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ref` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `company` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `update_time` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_participants`
--

INSERT INTO `tbl_participants` (`id`, `p_name`, `uni_id`, `phone`, `ref`, `company`, `status`, `update_time`) VALUES
(1, 'Ishtiaq Al-Pavel', '2015-1-10-182', '01942046588', '', 'Standard Charterd Bank', 'Verified', '2018-01-21 05:27:01'),
(2, 'Abu Saleh Sazzad', '2017-1-10-178', '01927480900', '', 'Uniliver', 'Verified', '2018-01-21 05:40:58'),
(3, 'Julkar Niem', '2016-1-10-231', '01741949043', '', 'Pran-RFL', 'Verified', '2018-01-21 05:44:44'),
(4, 'Md Johaed Hoque', '2016-2-10-054', '01881388157', '', 'Standard Charterd Bank', 'Verified', '2018-01-21 05:46:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_company`
--
ALTER TABLE `tbl_company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_participants`
--
ALTER TABLE `tbl_participants`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_company`
--
ALTER TABLE `tbl_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `tbl_participants`
--
ALTER TABLE `tbl_participants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=313;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
