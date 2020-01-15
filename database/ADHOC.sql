-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 15, 2020 at 01:56 AM
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
-- Table structure for table `ADHOC`
--

CREATE TABLE `ADHOC` (
  `delegation` varchar(128) NOT NULL,
  `type` varchar(128) NOT NULL,
  `powerranking` int(10) NOT NULL DEFAULT '0',
  `reservedby` varchar(128) NOT NULL,
  `confirmedby` varchar(128) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ADHOC`
--

INSERT INTO `ADHOC` (`delegation`, `type`, `powerranking`, `reservedby`, `confirmedby`) VALUES
('Adelina Amouteru (Minister of Justice)', 'X', 3, '', ''),
('Alex Stowe (Minister of Energy)', 'X', 3, '', ''),
('Bob Marley (Minister of Finance)', 'X', 4, '', ''),
('Daryl Cantu (Minister of Education)', 'X', 1, '', ''),
('Dr. Ashley Hawking (Professor of Astronomy)', 'X', 1, '', ''),
('Dr.Samson Clifford (Minister of Health)', 'X', 3, '', ''),
('Emily Quenning (Minister of Agriculture)', 'X', 3, '', ''),
('Karen Oakley (Secretary of Defense)', 'X', 4, '', ''),
('Lani Haluki (Professor of Cyptography)', 'X', 4, '', ''),
('President Cyndi Finley', 'X', 4, '', ''),
('President Daniel Guire', 'X', 3, '', ''),
('President Earnest Wright', 'X', 5, '', ''),
('President Isha Ho', 'X', 3, '', ''),
('President Peter Hanson', 'X', 5, '', ''),
('Robert Frost (Minister of Interstellar Travel)', 'X', 4, '', ''),
('Rufus Mohammed (Secretary of Communications)', 'X', 2, '', ''),
('Shelly Annikdon (Secretary of Precious Metals)', 'X', 1, '', ''),
('Agent I', 'Y', 5, '', ''),
('Agent II', 'Y', 5, '', ''),
('Agent III', 'Y', 5, '', ''),
('Agent IV', 'Y', 5, '', ''),
('Agent V', 'Y', 5, '', ''),
('Alien 1', 'Y', 5, '', ''),
('Alien 2', 'Y', 5, '', ''),
('Alien 3', 'Y', 5, '', ''),
('Alien 4', 'Y', 5, '', ''),
('Alien 5', 'Y', 5, '', ''),
('President Piper Salane', 'X', 4, '', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
