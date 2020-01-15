-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 15, 2020 at 02:12 AM
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
-- Table structure for table `UNEP`
--

CREATE TABLE `UNEP` (
  `delegation` varchar(128) NOT NULL,
  `powerranking` int(10) NOT NULL DEFAULT '0',
  `reservedby` varchar(128) NOT NULL,
  `confirmedby` varchar(128) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `UNEP`
--

INSERT INTO `UNEP` (`delegation`, `powerranking`, `reservedby`, `confirmedby`) VALUES
('Afghanistan', 0, '', ''),
('Australia', 0, '', ''),
('Bangladesh', 0, '', ''),
('Belgium', 0, '', ''),
('Brazil', 0, '', ''),
('Canada', 3, '', ''),
('China', 4, '', ''),
('Colombia', 2, '', ''),
('Cuba', 0, '', ''),
('Democratic People\'s Republic of Korea', 3, '', ''),
('Democratic Republic of the Congo', 0, '', ''),
('Egypt', 1, '', ''),
('El Salvador', 1, '', ''),
('Ethiopia', 0, '', ''),
('France', 4, '', ''),
('Germany', 3, '', ''),
('Greece', 0, '', ''),
('India', 2, '', ''),
('Indonesia', 0, '', ''),
('Iran', 1, '', ''),
('Iraq', 1, '', ''),
('Italy', 1, '', ''),
('Kuwait', 1, '', ''),
('Malaysia', 0, '', ''),
('Mexico', 3, '', ''),
('Mozambique', 0, '', ''),
('Netherlands', 2, '', ''),
('Nicaragua', 0, '', ''),
('Niger', 0, '', ''),
('Nigeria', 0, '', ''),
('Norway', 1, '', ''),
('Pakistan', 0, '', ''),
('Peru', 1, '', ''),
('Poland', 0, '', ''),
('Republic of Korea', 2, '', ''),
('Russian Federation', 4, '', ''),
('Saudi Arabia', 2, '', ''),
('South Africa', 1, '', ''),
('South Sudan', 1, '', ''),
('Spain', 2, '', ''),
('Sweden', 1, '', ''),
('Thailand', 0, '', ''),
('Turkey', 0, '', ''),
('United Arab Emirites', 0, '', ''),
('United Kingdom', 4, '', ''),
('United States of America', 4, '', ''),
('Venezuela', 0, '', ''),
('Vietnam', 0, '', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
