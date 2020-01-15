-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 15, 2020 at 01:57 AM
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
-- Table structure for table `ASEAN`
--

CREATE TABLE `ASEAN` (
  `delegation` varchar(128) NOT NULL,
  `powerranking` int(10) NOT NULL DEFAULT '0',
  `reservedby` varchar(128) NOT NULL,
  `confirmedby` varchar(128) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ASEAN`
--

INSERT INTO `ASEAN` (`delegation`, `powerranking`, `reservedby`, `confirmedby`) VALUES
('Brunei A', 0, '', ''),
('Brunei B', 0, '', ''),
('Cambodia B', 1, '', ''),
('Cambodia A', 1, '', ''),
('Indonesia A', 1, '', ''),
('Indonesia B', 1, '', ''),
('Laos A', 0, '', ''),
('Laos B', 0, '', ''),
('Malaysia A', 1, '', ''),
('Malaysia B', 1, '', ''),
('Myanmar A', 0, '', ''),
('Myanmar B', 0, '', ''),
('Philippines A', 2, '', ''),
('Philippines B', 2, '', ''),
('Singapore A', 2, '', ''),
('Singapore B', 2, '', ''),
('Thailand A', 1, '', ''),
('Thailand B', 1, '', ''),
('Vietnam A', 1, '', ''),
('Vietnam B', 1, '', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
