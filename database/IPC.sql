-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 15, 2020 at 02:09 AM
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
-- Table structure for table `IPC`
--

CREATE TABLE `IPC` (
  `delegation` varchar(128) NOT NULL,
  `powerranking` int(10) NOT NULL DEFAULT '0',
  `reservedby` varchar(128) NOT NULL,
  `confirmedby` varchar(128) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `IPC`
--

INSERT INTO `IPC` (`delegation`, `powerranking`, `reservedby`, `confirmedby`) VALUES
('Al Jazeera A', 1, '', ''),
('Al Jazeera B', 1, '', ''),
('British Broadcasting Corporation A', 2, '', ''),
('British Broadcasting Corporation B', 2, '', ''),
('China Daily A', 1, '', ''),
('China Daily B', 1, '', ''),
('Fox News A', 2, '', ''),
('Fox News B', 2, '', ''),
('New York Times A', 2, '', ''),
('New York Times B', 2, '', ''),
('The Globe and Mail A', 2, '', ''),
('The Globe and Mail B', 2, '', ''),
('The Onion A', 3, '', ''),
('The Onion B', 3, '', ''),
('Wall Street Journal A', 2, '', ''),
('Wall Street Journal B', 2, '', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
