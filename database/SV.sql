-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 15, 2020 at 02:11 AM
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
-- Table structure for table `SV`
--

CREATE TABLE `SV` (
  `delegation` varchar(128) NOT NULL,
  `corporation` varchar(128) NOT NULL,
  `role` varchar(128) NOT NULL,
  `powerranking` int(10) NOT NULL DEFAULT '0',
  `reservedby` varchar(128) NOT NULL,
  `confirmedby` varchar(128) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `SV`
--

INSERT INTO `SV` (`delegation`, `corporation`, `role`, `powerranking`, `reservedby`, `confirmedby`) VALUES
('Larry Page', 'Alphabet Inc.', 'Chief Executive Officer of Alphabet Inc.', 4, '', ''),
('Sundar Pichai', 'Alphabet Inc.', 'Chief Executive Officer of Google', 3, '', ''),
('Susan Wojcicki', 'Alphabet Inc.', 'Chief Executive Officer of Youtube', 3, '', ''),
('Jeff Bezos', 'Amazon', 'Chief Executive Officer', 4, '', ''),
('Brian Olsavsky', 'Amazon', 'Senior Vice President and Chief Financial Officer', 3, '', ''),
('Jeffrey Blackburn', 'Amazon', 'Senior Vice President of Business Development', 3, '', ''),
('Tim Cook', 'Apple', 'Chief Executive Officer', 4, '', ''),
('Katherine Adams', 'Apple', 'Senior Vice President & General Counsel', 3, '', ''),
('Eddy Cue', 'Apple', 'Senior Vice President, Internet Software and Services', 3, '', ''),
('Chuck Robbins', 'Cisco', 'Chief Executive Officer', 2, '', ''),
('Kelly A. Kramer', 'Cisco', 'Executive VP & Chief Financial Officer', 2, '', ''),
('Irving Tan', 'Cisco', 'Chief of Operations', 2, '', ''),
('Mark Zuckerberg', 'Facebook', 'Chief Executive Officer', 4, '', ''),
('Sheryl Sandberg', 'Facebook', 'Chief Operating Officer', 3, '', ''),
('Mike Schroepfer', 'Facebook', 'Chief Technology Officer', 3, '', ''),
('Mark Hurd', 'Oracle', 'Chief Executive Officer', 3, '', ''),
('Safra Catz', 'Oracle', 'Chief Executive Officer', 2, '', ''),
('Larry Ellison', 'Oracle', 'Executive Chairman & Chief Technology Officer', 2, '', ''),
('Steve Huffman', 'Reddit', 'Chief Executive Officer', 3, '', ''),
('Jen Wong', 'Reddit', 'Chief Executive Officer', 2, '', ''),
('Christopher Slowe', 'Reddit', 'Chief Executive Officer', 2, '', ''),
('Elon Musk', 'Tesla', 'Chief Executive Officer', 4, '', ''),
('Zachary Kirkhorn', 'Tesla', 'Chief Financial Officer', 2, '', ''),
('Jeffrey Straubel', 'Tesla', 'Chief Technology Officer', 3, '', ''),
('Jack Dorsey', 'Twitter', 'Chief Executive Officer', 4, '', ''),
('Ned Segal', 'Twitter', 'Chief Financial Officer', 3, '', ''),
('Leslie Berland', 'Twitter', 'People and Marketing Lead', 3, '', ''),
('Alfred Kelly Jr', 'Visa', 'Chief Executive Officer', 2, '', ''),
('Lynne Biggar', 'Visa', 'Executive VP & Chief Marketing and Communications Officer', 2, '', ''),
('Ryan McInerney', 'Visa', 'President', 2, '', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
