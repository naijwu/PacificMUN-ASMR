-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 15, 2020 at 02:13 AM
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
-- Table structure for table `UNICEF`
--

CREATE TABLE `UNICEF` (
  `id` int(11) NOT NULL,
  `delegation` varchar(128) NOT NULL,
  `powerranking` int(10) NOT NULL DEFAULT '0',
  `reservedby` varchar(128) NOT NULL,
  `confirmedby` varchar(128) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `UNICEF`
--

INSERT INTO `UNICEF` (`id`, `delegation`, `powerranking`, `reservedby`, `confirmedby`) VALUES
(2, 'Angola', 0, '', ''),
(3, 'Argentina', 0, '', ''),
(4, 'Australia', 0, '', ''),
(5, 'Brazil', 0, '', ''),
(6, 'Cambodia', 0, '', ''),
(7, 'Canada', 3, '', ''),
(8, 'Chad', 0, '', ''),
(9, 'China', 4, '', ''),
(10, 'Democratic Republic of the Congo', 0, '', ''),
(11, 'Djibouti', 0, '', ''),
(12, 'Egypt', 0, '', ''),
(13, 'France', 2, '', ''),
(14, 'Germany', 2, '', ''),
(15, 'India', 2, '', ''),
(16, 'Indonesia', 0, '', ''),
(17, 'Iran', 1, '', ''),
(18, 'Iraq', 1, '', ''),
(19, 'Israel', 2, '', ''),
(20, 'Italy', 1, '', ''),
(21, 'Japan', 1, '', ''),
(22, 'Kenya', 0, '', ''),
(23, 'Libya', 0, '', ''),
(24, 'Mexico', 2, '', ''),
(25, 'Nigeria', 0, '', ''),
(26, 'Norway', 0, '', ''),
(27, 'Pakistan', 0, '', ''),
(28, 'Philippines', 1, '', ''),
(29, 'Poland', 0, '', ''),
(30, 'Portugal', 0, '', ''),
(31, 'Republic of Korea', 2, '', ''),
(32, 'Russian Federation', 3, '', ''),
(33, 'Saudi Arabia', 3, '', ''),
(34, 'Singapore', 0, '', ''),
(35, 'South Africa', 1, '', ''),
(36, 'South Sudan', 0, '', ''),
(37, 'Sudan', 0, '', ''),
(38, 'Sweden', 1, '', ''),
(39, 'Switzerland', 1, '', ''),
(40, 'Thailand', 0, '', ''),
(41, 'Turkey', 0, '', ''),
(42, 'United Kingdom', 4, '', ''),
(43, 'United States of America', 4, '', ''),
(44, 'Vietnam', 0, '', ''),
(45, 'Yemen', 0, '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `UNICEF`
--
ALTER TABLE `UNICEF`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `UNICEF`
--
ALTER TABLE `UNICEF`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
