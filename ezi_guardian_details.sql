-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2017 at 07:42 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ezi_reports`
--

-- --------------------------------------------------------

--
-- Table structure for table `ezi_guardian_details`
--

CREATE TABLE `ezi_guardian_details` (
  `guardian_id` int(11) NOT NULL,
  `student_code` varchar(20) NOT NULL,
  `guardian_code` varchar(20) NOT NULL,
  `guardian_name` varchar(80) NOT NULL,
  `guardian_occupation` varchar(30) DEFAULT NULL,
  `guardian_contact1` varchar(15) NOT NULL,
  `guardian_contact2` varchar(15) DEFAULT NULL,
  `guardian_city` varchar(20) NOT NULL,
  `guardian_street` varchar(50) DEFAULT NULL,
  `guardian_country` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ezi_guardian_details`
--
ALTER TABLE `ezi_guardian_details`
  ADD PRIMARY KEY (`guardian_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ezi_guardian_details`
--
ALTER TABLE `ezi_guardian_details`
  MODIFY `guardian_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
