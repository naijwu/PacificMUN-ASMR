-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 15, 2020 at 02:02 AM
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
-- Table structure for table `DISEC`
--

CREATE TABLE `DISEC` (
  `delegation` varchar(128) NOT NULL,
  `powerranking` int(10) NOT NULL,
  `reservedby` varchar(128) NOT NULL,
  `confirmedby` varchar(128) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `DISEC`
--

INSERT INTO `DISEC` (`delegation`, `powerranking`, `reservedby`, `confirmedby`) VALUES
('Afghanistan', 0, '', ''),
('Argentina', 0, '', ''),
('Australia', 1, '', ''),
('Austria', 0, '', ''),
('Belgium', 1, '', ''),
('Bolivia', 0, '', ''),
('Brazil', 0, '', ''),
('Canada', 3, '', ''),
('Chile', 1, '', ''),
('China', 4, '', ''),
('Columbia', 2, '', ''),
('Costa Rica', 0, '', ''),
('Croatia', 0, '', ''),
('Cuba', 0, '', ''),
('Czechia', 0, '', ''),
('Cote d\'Ivoire', 0, '', ''),
('Democratic People\'s Republic of Korea', 3, '', ''),
('Democratic Republic of Congo', 3, '', ''),
('Denmark', 2, '', ''),
('Ecuador', 0, '', ''),
('Egypt', 1, '', ''),
('Estonia', 0, '', ''),
('Ethiopia', 0, '', ''),
('Finland', 0, '', ''),
('France', 3, '', ''),
('Germany', 3, '', ''),
('Ghana', 0, '', ''),
('Greece', 1, '', ''),
('Honduras', 0, '', ''),
('Hungary', 0, '', ''),
('India', 3, '', ''),
('Iran', 1, '', ''),
('Iraq', 1, '', ''),
('Israel', 2, '', ''),
('Italy', 2, '', ''),
('Japan', 2, '', ''),
('Kazakhstan', 0, '', ''),
('Kenya', 0, '', ''),
('Lithuania', 0, '', ''),
('Malaysia', 0, '', ''),
('Mexico', 2, '', ''),
('Morocco', 0, '', ''),
('Myanmar', 0, '', ''),
('Netherlands', 2, '', ''),
('New Zealand', 1, '', ''),
('Nigeria', 0, '', ''),
('Norway', 1, '', ''),
('Pakistan', 0, '', ''),
('Peru', 0, '', ''),
('Philippines', 1, '', ''),
('Poland', 1, '', ''),
('Portugal', 0, '', ''),
('Republic of Korea', 2, '', ''),
('Romania', 0, '', ''),
('Russian Federation', 4, '', ''),
('Saudi Arabia', 3, '', ''),
('Singapore', 2, '', ''),
('Somalia', 0, '', ''),
('South Africa', 1, '', ''),
('Spain', 1, '', ''),
('Sudan', 0, '', ''),
('Sweden', 2, '', ''),
('Switzerland', 0, '', ''),
('Syrian Arab Republic', 0, '', ''),
('Thailand', 2, '', ''),
('Turkey', 2, '', ''),
('Ukraine', 0, '', ''),
('United Kingdom', 4, '', ''),
('United States of America', 4, '', ''),
('Venezuela', 0, '', ''),
('Vietnam', 0, '', ''),
('Yemen', 0, '', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
