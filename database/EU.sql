-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 15, 2020 at 02:07 AM
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
-- Table structure for table `EU`
--

CREATE TABLE `EU` (
  `delegation` varchar(128) NOT NULL,
  `powerranking` int(10) NOT NULL DEFAULT '0',
  `reservedby` varchar(128) NOT NULL,
  `confirmedby` varchar(128) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `EU`
--

INSERT INTO `EU` (`delegation`, `powerranking`, `reservedby`, `confirmedby`) VALUES
('Austria', 0, '', ''),
('Belgium', 1, '', ''),
('Bulgaria', 0, '', ''),
('Croatia', 0, '', ''),
('Republic of Cyprus', 0, '', ''),
('Czech Republic', 0, '', ''),
('Denmark', 0, '', ''),
('Estonia', 0, '', ''),
('Finland', 2, '', ''),
('France', 4, '', ''),
('Germany', 4, '', ''),
('Greece', 1, '', ''),
('Hungary', 0, '', ''),
('Ireland', 2, '', ''),
('Italy', 3, '', ''),
('Latvia', 0, '', ''),
('Lithuania', 0, '', ''),
('Luxembourg', 0, '', ''),
('Malta', 0, '', ''),
('Netherlands', 2, '', ''),
('Poland', 0, '', ''),
('Portugal', 0, '', ''),
('Romania', 0, '', ''),
('Slovakia', 0, '', ''),
('Slovenia', 0, '', ''),
('Spain', 2, '', ''),
('Sweden', 3, '', ''),
('United Kingdom', 4, '', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
