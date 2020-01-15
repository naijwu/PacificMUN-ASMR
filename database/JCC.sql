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
-- Table structure for table `JCC`
--

CREATE TABLE `JCC` (
  `delegation` varchar(128) NOT NULL,
  `bloc` varchar(128) NOT NULL,
  `powerranking` int(10) NOT NULL DEFAULT '0',
  `reservedby` varchar(128) NOT NULL,
  `confirmedby` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `JCC`
--

INSERT INTO `JCC` (`delegation`, `bloc`, `powerranking`, `reservedby`, `confirmedby`, `email`) VALUES
('Empress Dowager Cixi, Qing Dynasty', 'Yihetuan Movement', 4, '', '', ''),
('Prince Duan, Qing Dynasty', 'Yihetuan Movement', 4, '', '', ''),
('Prince Qing, Qing Dynasty', 'Yihetuan Movement', 3, '', '', ''),
('Yuxian, Official of the Qing Dynasty', 'Yihetuan Movement', 2, '', '', ''),
('RongLu, Commander in Chief of the Qing Dynasty', 'Yihetuan Movement', 3, '', '', ''),
('Zhang Decheng, Leader of the Fists of Harmony and Justice', 'Yihetuan Movement', 4, '', '', ''),
('Cao Futian, Second in Command of the Boxers', 'Yihetuan Movement', 3, '', '', ''),
('Ni ZanQing, Leader of the Boxers', 'Yihetuan Movement', 2, '', '', ''),
('Zhu HongDeng, Leader of the Boxers', 'Yihetuan Movement', 2, '', '', ''),
('Dong Fuxiang, Leader of the Gansu Army', 'Yihetuan Movement', 3, '', '', ''),
('Ma Biao, General of the Gansu Army', 'Yihetuan Movement', 2, '', '', ''),
('Ma Haiyan, General of the Gansu Army', 'Yihetuan Movement', 2, '', '', ''),
('Nie Shicheng, General of the Gansu Army', 'Yihetuan Movement', 1, '', '', ''),
('Ma Fuxiang, Commander of the Gansu Army', 'Yihetuan Movement', 1, '', '', ''),
('Ma FuLu, Officer of the Gansu Army', 'Yihetuan Movement', 1, '', '', ''),
('Aema, Officer of the Gansu Army', 'Yihetuan Movement', 1, '', '', ''),
('Yao Wang, Colonel of the Gansu Army', 'Yihetuan Movement', 2, '', '', ''),
('Edwin Conger, The United States\' Minister to China', 'Foreign Powers', 4, '', '', ''),
('Adna Chaffee, Lieutenant General of the US Army', 'Foreign Powers', 2, '', '', ''),
('Emerson H. Liscum, US Army Officer', 'Foreign Powers', 3, '', '', ''),
('Sir Edward Seymour, Commander-in-Chief of the British Army', 'Foreign Powers', 3, '', '', ''),
('Claude MacDonald, Britain\'s Minister to China', 'Foreign Powers', 4, '', '', ''),
('Alfred Gaselee, Lieutenant General of the British Army', 'Foreign Powers', 1, '', '', ''),
('Clemens Ketteler, Minister of the German Empire to China', 'Foreign Powers', 3, '', '', ''),
('Alfred Von Waldersee, Chief of the German General Staff', 'Foreign Powers', 2, '', '', ''),
('Eric Von Falkenhayn, Prussian General', 'Foreign Powers', 1, '', '', ''),
('Robert Nivelle, French Artillery Officer', 'Foreign Powers', 4, '', '', ''),
('Fukushima Yasumasa, Commander of the Japanese Forces', 'Foreign Powers', 3, '', '', ''),
('Yamaguchi Motomi, General of the Imperial Japanese Army', 'Foreign Powers', 3, '', '', ''),
('Aleksey Kuropatkin, Commander of the Russian Forces', 'Foreign Powers', 4, '', '', ''),
('Paul Rennenkampf, Cavalry Commander of the Russian Army', 'Foreign Powers', 3, '', '', ''),
('Franz Joseph I, Emperor of the Austro-Hungarian Empire', 'Foreign Powers', 1, '', '', ''),
('Eduard Von Thomann, Commander of the Austro-Hungarian Navy', 'Foreign Powers', 2, '', '', ''),
('Signor Di Martino, Ambassador of Italy to China', 'Foreign Powers', 4, '', '', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
