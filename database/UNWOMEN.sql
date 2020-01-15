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
-- Table structure for table `UNWOMEN`
--

CREATE TABLE `UNWOMEN` (
  `delegation` varchar(128) NOT NULL,
  `powerranking` int(10) NOT NULL DEFAULT '0',
  `reservedby` varchar(128) NOT NULL,
  `confirmedby` varchar(128) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `UNWOMEN`
--

INSERT INTO `UNWOMEN` (`delegation`, `powerranking`, `reservedby`, `confirmedby`) VALUES
('Afghanistan', 0, '', ''),
('Argentina', 0, '', ''),
('Australia', 0, '', ''),
('Brazil', 0, '', ''),
('Canada', 3, '', ''),
('Chad', 0, '', ''),
('China', 4, '', ''),
('Chile', 0, '', ''),
('Cuba', 0, '', ''),
('Democratic Republic of the Congo', 0, '', ''),
('Djibouti', 0, '', ''),
('Finland', 0, '', ''),
('France', 2, '', ''),
('Germany', 2, '', ''),
('India', 2, '', ''),
('Indonesia', 0, '', ''),
('Iran', 1, '', ''),
('Iraq', 1, '', ''),
('Israel', 2, '', ''),
('Italy', 1, '', ' '),
('Japan', 1, '', ''),
('Kenya', 0, '', ''),
('Kuwait', 0, '', ''),
('Malaysia', 0, '', ''),
('Mexico', 2, '', ''),
('Morocco', 2, '', ''),
('Norway', 0, '', ''),
('Pakistan', 0, '', ''),
('Poland', 0, '', ''),
('Portugal', 0, '', ''),
('Republic of Korea', 2, '', ''),
('Romania', 0, '', ''),
('Russian Federation', 4, '', ' '),
('Rwanda', 0, '', ''),
('Saudi Arabia', 3, '', ''),
('Somalia', 0, '', ''),
('South Africa', 1, '', ''),
('Spain', 1, '', ''),
('Sudan', 0, '', ''),
('Sweden', 1, '', ''),
('Switzerland', 1, '', ''),
('Syria', 0, '', ''),
('Thailand', 0, '', ''),
('Turkey', 0, '', ''),
('Uganda', 0, '', ''),
('Ukraine', 0, '', ''),
('United Kingdom', 4, '', ''),
('United States of America', 4, '', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
