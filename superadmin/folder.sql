-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 21, 2017 at 07:04 PM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `padhle_pappu`
--

-- --------------------------------------------------------

--
-- Table structure for table `folder`
--

CREATE TABLE IF NOT EXISTS `folder` (
  `f_id` int(11) NOT NULL AUTO_INCREMENT,
  `f_name` varchar(255) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  PRIMARY KEY (`f_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `folder`
--

INSERT INTO `folder` (`f_id`, `f_name`, `cat_id`, `topic_id`) VALUES
(1, 'foler1', 0, 0),
(2, 'foler1', 0, 0),
(3, 'Ashish', 0, 0),
(4, 'Ashish', 24, 12),
(5, 'ashis', 24, 12);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
