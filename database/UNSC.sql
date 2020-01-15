-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 15, 2020 at 02:16 AM
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
-- Table structure for table `UNSC`
--

CREATE TABLE `UNSC` (
  `delegation` varchar(128) NOT NULL,
  `powerranking` int(10) NOT NULL DEFAULT '0',
  `reservedby` varchar(128) NOT NULL,
  `confirmedby` varchar(128) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `UNSC`
--

INSERT INTO `UNSC` (`delegation`, `powerranking`, `reservedby`, `confirmedby`) VALUES
('Belgium', 2, '', ''),
('China', 3, '', ''),
('Estonia', 2, '', ''),
('France', 4, '', ''),
('Germany', 4, '', ''),
('Indonesia', 2, '', ''),
('Niger', 2, '', ''),
('Russian Federation', 4, '', ''),
('Saint Vincent and the Grenadines', 2, '', ''),
('South Africa', 2, '', ''),
('The Dominican Republic', 3, '', ''),
('Tunisia', 2, '', ''),
('United Kingdom', 4, '', ''),
('United States of America', 5, '', ''),
('Vietnam', 2, '', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
