-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2017 at 12:55 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `register_tbl`
--

CREATE TABLE IF NOT EXISTS `register_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `hobbies` varchar(100) NOT NULL,
  `pic` varchar(200) NOT NULL,
  `country` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `register_tbl`
--

INSERT INTO `register_tbl` (`id`, `name`, `phone`, `email`, `gender`, `hobbies`, `pic`, `country`) VALUES
(1, 'test', 111, 'sathyanandr@gmail.com', 'male', 'music', 'uploads/Agave.jpg', 'India'),
(2, 'test', 111, 'sathyanandr@gmail.com', 'male', 'music', 'uploads/Agave.jpg', 'India'),
(3, 'test', 111, 'sathyanandr@gmail.com', 'male', 'music', 'uploads/Agave.jpg', 'India'),
(4, 'test1', 122222, '', 'female', 'music,reading,Playing', 'uploads/Ladybug.jpg', 'India'),
(5, 'sathyanand', 1222, 'sathyanandr@gmail.com', 'male', 'music,reading', 'uploads/Flowing Rock.jpg', 'India'),
(6, 'ram', 111, 'sathyanandr@gmail.com', 'male', 'music', 'uploads/Flowing Rock.jpg', 'India');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
