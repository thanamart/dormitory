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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- dump ตาราง `files`
--

INSERT INTO `files` (`file_id`, `filename`) VALUES
(1, 'à¸à¸³à¸«à¸™à¸”à¸à¸²à¸£à¸§à¸±à¸™à¸£à¸±à¸šà¸›à¸£à¸´à¸à¸à¸² à¸¡.à¹€à¸à¸©à¸•à¸£-à¸à¸¥à¸¸à¹ˆà¸¡à¸—à');

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
  `last_login` datetime NOT NULL,
  `file_id` int(11) DEFAULT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`),
  KEY `file_id_2` (`file_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- dump ตาราง `users`
--

INSERT INTO `users` (`user_id`, `name`, `lastname`, `username`, `password`, `last_login`, `file_id`, `status`) VALUES
(1, 'Thanamart', 'Sriaiemkul', 'may', '1234', '2014-06-02 16:43:26', 1, 'ADMIN'),
(2, 'Paibool', 'Wongin', 'biw', '1234', '2014-06-02 16:44:08', 0, 'USER'),
(3, 'Nattamon', 'Dumrongkawiriyapan', 'gib', '1234', '0000-00-00 00:00:00', 0, 'ADMIN'),
(4, 'Supatra', 'Lochaikul', 'sine', '1234', '0000-00-00 00:00:00', 0, 'USER'),
(5, 'Warunee', 'Maboon', 'dawn', '1234', '2014-06-01 16:35:13', 0, 'ADMIN'),
(6, 'test', 'test', 'test', '1234', '0000-00-00 00:00:00', 0, 'ADMIN');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
