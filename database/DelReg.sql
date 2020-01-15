-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 15, 2020 at 01:59 AM
-- Server version: 5.6.46-cll-lve
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ASMR`
--

-- --------------------------------------------------------

--
-- Table structure for table `DelReg`
--

CREATE TABLE `DelReg` (
  `id` int(255) NOT NULL,
  `fullname` varchar(128) NOT NULL, -- Might have been better to have a seperate First and Last name field... three registrations just put their first name *palm to face*
  `email` varchar(128) NOT NULL,
  `school` varchar(128) NOT NULL,
  `grade` varchar(10) NOT NULL,
  `dob` varchar(128) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `address` varchar(256) NOT NULL,
  `cellphone` varchar(128) NOT NULL,
  `homephone` varchar(128) NOT NULL,
  `ecname` varchar(128) NOT NULL,
  `ecrelationship` varchar(128) NOT NULL,
  `ecphone` varchar(128) NOT NULL,
  `pastexp` blob NOT NULL,
  `skillcap` int(10) NOT NULL, 
  `commp1` varchar(128) NOT NULL,
  `countryp1` varchar(128) NOT NULL,
  `commp2` varchar(128) NOT NULL,
  `countryp2` varchar(128) NOT NULL,
  `commp3` varchar(128) NOT NULL,
  `countryp3` varchar(128) NOT NULL,
  `isdaydel` int(1) NOT NULL,
  `ispaid` int(1) NOT NULL,
  `isassigned` int(1) NOT NULL,
  `ispaybycheque` int(1) NOT NULL,
  `confirmedcomm` varchar(128) NOT NULL,
  `confirmedcountry` varchar(128) NOT NULL,
  `timestamp` varchar(128) NOT NULL,
  `referredby` varchar(128) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Theres no data to insert here because... privacy. Also, unnecessary.
--

--
-- Indexes for table `DelReg`
--
ALTER TABLE `DelReg`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `DelReg`
--
ALTER TABLE `DelReg`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=613;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
