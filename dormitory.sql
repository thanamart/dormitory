-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 
-- Server version: 5.5.36
-- PHP Version: 5.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dormitory`
--

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `file_id` int(4) NOT NULL AUTO_INCREMENT,
  `filename` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`file_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- dump ตาราง `files`
--

INSERT INTO `files` (`file_id`, `filename`) VALUES
(1, '10270342_694573697274210_446047749849750974_n.jpg'),
(2, 'Cat-Wallpaper-6.jpg'),
(3, '1229916_513327892085999_538638260_n.jpg'),
(4, '1798574_698284026903177_2926521874166932544_n.jpg');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `username` varchar(32) CHARACTER SET utf8 NOT NULL,
  `password` varchar(32) CHARACTER SET utf8 NOT NULL,
  `tel` varchar(10) NOT NULL,
  `last_login` datetime NOT NULL,
  `file_id` int(11) DEFAULT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`),
  KEY `file_id_2` (`file_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- dump ตาราง `users`
--

INSERT INTO `users` (`user_id`, `name`, `lastname`, `username`, `password`, `tel`, `last_login`, `file_id`, `status`) VALUES
(1, 'Thanamart', 'Sriaiemkul', 'may', '1234', '081234567', '2014-06-07 03:02:42', 1, 'ADMIN'),
(2, 'Paibool', 'Wongin', 'biw', '1234', '0800000000', '2014-06-07 03:02:07', 4, 'USER'),
(3, 'Nattamon', 'Dumrongkawiriyapan', 'gib', '1234', '', '0000-00-00 00:00:00', NULL, 'ADMIN'),
(4, 'Supatra', 'Lochaikul', 'sine', '1234', '', '0000-00-00 00:00:00', NULL, 'USER'),
(5, 'Warunee', 'Maboon', 'dawn', '1234', '', '2014-06-01 16:35:13', NULL, 'ADMIN'),
(6, 'test', 'test', 'test', '1234', '', '0000-00-00 00:00:00', NULL, 'ADMIN'),
(7, 'a', 'a', 'a', 'a', '1', '0000-00-00 00:00:00', 2, 'ADMIN'),
(8, 'Jessada', 'Kaerattana', 'noom', '1234', '0899999999', '2014-06-07 01:57:49', 3, 'ADMIN');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
