-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 22, 2017 at 06:24 PM
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
-- Table structure for table `test_category`
--

CREATE TABLE IF NOT EXISTS `test_category` (
  `tc_id` int(11) NOT NULL AUTO_INCREMENT,
  `tc_name` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`tc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `test_category`
--

INSERT INTO `test_category` (`tc_id`, `tc_name`, `created`) VALUES
(2, 'Antriksh chhipa', '2017-07-22 14:17:50');

-- --------------------------------------------------------

--
-- Table structure for table `test_heading`
--

CREATE TABLE IF NOT EXISTS `test_heading` (
  `th_id` int(11) NOT NULL AUTO_INCREMENT,
  `th_name` varchar(255) NOT NULL,
  `tc_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`th_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `test_heading`
--

INSERT INTO `test_heading` (`th_id`, `th_name`, `tc_id`, `created`) VALUES
(3, 'test head 1', 2, '2017-07-22 14:20:19');

-- --------------------------------------------------------

--
-- Table structure for table `test_name`
--

CREATE TABLE IF NOT EXISTS `test_name` (
  `tn_id` int(11) NOT NULL AUTO_INCREMENT,
  `tn_name` varchar(255) NOT NULL,
  `th_id` int(11) NOT NULL,
  `tc_id` int(11) NOT NULL,
  `no_of_q` int(255) NOT NULL,
  `time` text NOT NULL COMMENT 'hours;minutes;seconds',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`tn_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `test_name`
--

INSERT INTO `test_name` (`tn_id`, `tn_name`, `th_id`, `tc_id`, `no_of_q`, `time`, `created`) VALUES
(6, 'Antriksh', 3, 2, 5, '5;4;3', '2017-07-22 11:09:32');

-- --------------------------------------------------------

--
-- Table structure for table `test_question`
--

CREATE TABLE IF NOT EXISTS `test_question` (
  `tq_id` int(11) NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `opt1` varchar(255) NOT NULL,
  `opt2` varchar(255) NOT NULL,
  `opt3` varchar(255) NOT NULL,
  `opt4` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `tc_id` int(11) NOT NULL,
  `th_id` int(11) NOT NULL,
  `tn_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`tq_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `test_question`
--

INSERT INTO `test_question` (`tq_id`, `question`, `opt1`, `opt2`, `opt3`, `opt4`, `answer`, `tc_id`, `th_id`, `tn_id`, `created`) VALUES
(2, 'The ratio betwwen the present ages of S and T is 6:7. If T is 4 years old than S, what will be the ratio of the ages of S and T after 4 years ?', '0.1277777777777778', '0.1284722222222222', '0.16875', 'None of these', 'D', 2, 3, 6, '2017-07-22 14:01:20'),
(3, 'Ramesh was asked to tell his age in years. His reply was, "Take my age three years, multiply it  by 3  and then substract three times my age three years ago and you will know how old I am" What was the age of the person ?', ' 20 years', '16 years', '24 years', '18 years', 'D', 2, 3, 6, '2017-07-22 14:01:20'),
(4, 'Age of a man is three times the age of his son. After 10 years, the age of the man would become two times the age of his son. What is the present age of man /', '64 years', '52 years', '30 years', '48 years', 'C', 2, 3, 6, '2017-07-22 14:01:20'),
(5, 'The total of  present ages of Ram, Shyam and Ajay is 72 years. Total of present ages of Ram and Shyam is 42 years. What is the present age of Ajay ?', '30 years', '24 years', '36 years', '18 years', 'A', 2, 3, 6, '2017-07-22 14:01:20'),
(6, 'The present age of Saroj is 6 times the age of Ajay. Present age of Ajay is 20 years less than  the present age of Saroj. What is the present age of Saroj ?', '16 years', '18 years', '20 years', 'None of these', 'D', 2, 3, 6, '2017-07-22 14:01:20'),
(7, 'The total of ages of Jay, ramesh and Sunil is 93 years. Ten years ago, the ratio of their ages was 2:3:4 . What is the present age of Sunil', '34 years', '38 years', '44 years', '52 years', 'B', 2, 3, 6, '2017-07-22 14:01:20'),
(8, 'The ratio of present ages of two brothers is 1:2 and 5 years back, the ratio was 1:3. What will be the ratio of their ages after 5 years ?', '0.04444444444444445', '0.08541666666666665', '0.1284722222222222', '0.2125', 'D', 2, 3, 6, '2017-07-22 14:01:20'),
(9, 'Hritik is 40 years old and rocky is 60 years old. How many years ago was the ratio of their ages 3:5 ?', '10 years', '5 years', '7 years', '9 years', 'A', 2, 3, 6, '2017-07-22 14:01:20'),
(10, 'A man is 24 years older than his son. In two years, his age will be twice the age of his son. The present age of the son is :', '13 years', '17 years', '22 years', '7 years', 'C', 2, 3, 6, '2017-07-22 14:01:20'),
(11, 'A is two years older than B who is twice as old as C. If the total of the ages of A, B and C be 27, then how old is B ?', '5 years', '10 years', '5 years', '3 years', 'B', 2, 3, 6, '2017-07-22 14:01:20'),
(12, 'Ten years ago, A was half of B in age. If the ratio of their present ages is 3:4, what will be the total of their present ages ?', '25 years', '30 years', '65 years', 'None of these', 'D', 2, 3, 6, '2017-07-22 14:01:20'),
(13, 'Ramesh present age is two-fifth of the age of his mother. After 8 years, he will be one-half of the age of his mother. How old is the mother at present?', '24 years', '36 years', '40 years', '56 years', 'C', 2, 3, 6, '2017-07-22 14:01:20'),
(14, 'In ten years A will be twice as old as B was 10 years ago. If A is now 9 years older than B,  the present age of B is', '19 years', '39 years', '29 years', '49 years', 'B', 2, 3, 6, '2017-07-22 14:01:20'),
(15, 'The difference between the ages of two persons is 10 years. Fifteen years ago, the elder one was as old as the younger one. The present age of the elder person is', '45 years', '25 years', ' 35 years', '55 years', 'C', 2, 3, 6, '2017-07-22 14:01:20'),
(16, 'The sum of ages of 5 children born at the interval of 3 years each is 50 years. What is the age of the youngest child ?', '8 years', '4 years', '10 years', 'None of these', 'B', 2, 3, 6, '2017-07-22 14:01:20'),
(17, 'The total age A and B is 12 years more than the total age of Band C. C is how many years younger than A ?', '12 years', '24 years', 'C is elder than A', 'None of these', 'A', 2, 3, 6, '2017-07-22 14:01:20'),
(18, 'Eighteen years ago, a father was three times as old as his son. Now father is only twice as old as his son. Then the sum of the present ages of the son and the father is :', '72 years', '54 years', '108 years', '105 years', 'C', 2, 3, 6, '2017-07-22 14:01:20'),
(19, 'asdfg', 'as', '23', 'nj', 'jjjm', 'jjjj', 2, 3, 6, '2017-07-22 14:06:51');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
