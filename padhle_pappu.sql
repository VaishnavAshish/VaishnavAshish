-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 22, 2017 at 04:18 AM
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
-- Table structure for table `basics`
--

CREATE TABLE IF NOT EXISTS `basics` (
  `basics_id` int(11) NOT NULL AUTO_INCREMENT,
  `heading` text NOT NULL,
  `pdf` text NOT NULL,
  `cat_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`basics_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `basics`
--

INSERT INTO `basics` (`basics_id`, `heading`, `pdf`, `cat_id`, `topic_id`, `sub_id`, `created`) VALUES
(2, 'english', 'english7.pdf', 23, 12, 7, '2017-07-22 11:30:47');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) NOT NULL,
  `cat_image` text NOT NULL,
  `page` text,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `category`, `cat_image`, `page`) VALUES
(23, 'Maths', 'Maths.png', 'topics.php'),
(24, 'Reasoning', 'Reasoning.png', 'topics.php'),
(25, 'English', 'English.png', 'topics.php'),
(26, 'G.K.', 'G.K..png', 'topics.php'),
(27, 'Medical', 'Medical.png', 'topics.php'),
(28, 'Engineering', 'Engineering.png', 'topics.php'),
(29, 'Online Test', 'Online Test.png', 'testTopics.php'),
(30, 'Exam Paper', 'Exam Paper.png', 'topics.php'),
(31, 'Interview', 'Interview.png', 'testTopics.php');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE IF NOT EXISTS `contact_us` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(25) NOT NULL,
  `message` text NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`contact_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`contact_id`, `name`, `email`, `mobile`, `message`, `created_date`) VALUES
(1, 'antriksh', 'antriksh@gmail.com', '11234', '456', '2017-07-09 01:02:31'),
(2, 'Antriksh chhipa', 'antrikshchhipa@gmail.com', '9694532756', 'message', '2017-07-09 01:05:59');

-- --------------------------------------------------------

--
-- Table structure for table `folder`
--

CREATE TABLE IF NOT EXISTS `folder` (
  `f_id` int(11) NOT NULL AUTO_INCREMENT,
  `f_name` varchar(255) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `type` text NOT NULL,
  PRIMARY KEY (`f_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `folder`
--

INSERT INTO `folder` (`f_id`, `f_name`, `cat_id`, `topic_id`, `type`) VALUES
(1, 'foler1', 23, 14, ''),
(4, 'Ashish', 24, 12, ''),
(5, 'ashis', 24, 12, ''),
(6, 'Folder new', 23, 11, ''),
(13, 'folder now add here', 23, 14, 'Question'),
(14, 'sfds', 23, 18, 'Video');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `qid` int(11) NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `opt1` varchar(255) NOT NULL,
  `opt2` varchar(255) NOT NULL,
  `opt3` varchar(255) NOT NULL,
  `opt4` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `folder_id` int(11) DEFAULT NULL,
  `sub_id` int(11) NOT NULL,
  PRIMARY KEY (`qid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=548 ;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`qid`, `question`, `opt1`, `opt2`, `opt3`, `opt4`, `answer`, `cat_id`, `topic_id`, `folder_id`, `sub_id`) VALUES
(347, 'Sunil is younger than ravi by 4 years. If their ages are in the respective ratio of 7:9, how old is sunil ?', '14 years', '17 years', '21 years', 'None of these', 'A', 24, 13, NULL, 8),
(445, 'Sunil is younger than ravi by 4 years. If their ages are in the respective ratio of 7:9, how old is sunil ?', '14 years', '17 years', '21 years', 'None of these', 'D', 24, 13, NULL, 8),
(446, 'The ratio betwwen the present ages of S and T is 6:7. If T is 4 years old than S, what will be the ratio of the ages of S and T after 4 years ?', '0.1277777777777778', '0.1284722222222222', '0.16875', 'None of these', 'D', 24, 13, NULL, 8),
(447, 'Ramesh was asked to tell his age in years. His reply was, "Take my age three years, multiply it  by 3  and then substract three times my age three years ago and you will know how old I am" What was the age of the person ?', ' 20 years', '16 years', '24 years', '18 years', 'D', 24, 13, NULL, 8),
(448, 'Age of a man is three times the age of his son. After 10 years, the age of the man would become two times the age of his son. What is the present age of man /', '64 years', '52 years', '30 years', '48 years', 'C', 24, 13, NULL, 8),
(449, 'The total of  present ages of Ram, Shyam and Ajay is 72 years. Total of present ages of Ram and Shyam is 42 years. What is the present age of Ajay ?', '30 years', '24 years', '36 years', '18 years', 'A', 24, 13, NULL, 8),
(450, 'The present age of Saroj is 6 times the age of Ajay. Present age of Ajay is 20 years less than  the present age of Saroj. What is the present age of Saroj ?', '16 years', '18 years', '20 years', 'None of these', 'D', 24, 13, NULL, 8),
(451, 'The total of ages of Jay, ramesh and Sunil is 93 years. Ten years ago, the ratio of their ages was 2:3:4 . What is the present age of Sunil', '34 years', '38 years', '44 years', '52 years', 'B', 24, 13, NULL, 8),
(452, 'The ratio of present ages of two brothers is 1:2 and 5 years back, the ratio was 1:3. What will be the ratio of their ages after 5 years ?', '0.04444444444444445', '0.08541666666666665', '0.1284722222222222', '0.2125', 'D', 24, 13, NULL, 8),
(453, 'Hritik is 40 years old and rocky is 60 years old. How many years ago was the ratio of their ages 3:5 ?', '10 years', '5 years', '7 years', '9 years', 'A', 24, 13, NULL, 8),
(454, 'A man is 24 years older than his son. In two years, his age will be twice the age of his son. The present age of the son is :', '13 years', '17 years', '22 years', '7 years', 'C', 24, 13, NULL, 8),
(455, 'A is two years older than B who is twice as old as C. If the total of the ages of A, B and C be 27, then how old is B ?', '5 years', '10 years', '5 years', '3 years', 'B', 24, 13, NULL, 8),
(456, 'Ten years ago, A was half of B in age. If the ratio of their present ages is 3:4, what will be the total of their present ages ?', '25 years', '30 years', '65 years', 'None of these', 'D', 24, 13, NULL, 8),
(457, 'Ramesh present age is two-fifth of the age of his mother. After 8 years, he will be one-half of the age of his mother. How old is the mother at present?', '24 years', '36 years', '40 years', '56 years', 'C', 24, 13, NULL, 8),
(458, 'In ten years A will be twice as old as B was 10 years ago. If A is now 9 years older than B,  the present age of B is', '19 years', '39 years', '29 years', '49 years', 'B', 24, 13, NULL, 8),
(459, 'The difference between the ages of two persons is 10 years. Fifteen years ago, the elder one was as old as the younger one. The present age of the elder person is', '45 years', '25 years', ' 35 years', '55 years', 'C', 24, 13, NULL, 8),
(460, 'The sum of ages of 5 children born at the interval of 3 years each is 50 years. What is the age of the youngest child ?', '8 years', '4 years', '10 years', 'None of these', 'B', 24, 13, NULL, 8),
(461, 'The total age A and B is 12 years more than the total age of Band C. C is how many years younger than A ?', '12 years', '24 years', 'C is elder than A', 'None of these', 'A', 24, 13, NULL, 8),
(462, 'Eighteen years ago, a father was three times as old as his son. Now father is only twice as old as his son. Then the sum of the present ages of the son and the father is :', '72 years', '54 years', '108 years', '105 years', 'C', 24, 13, NULL, 8),
(463, 'Sunil is younger than ravi by 4 years. If their ages are in the respective ratio of 7:9, how old is sunil ?', '14 years', '17 years', '21 years', 'None of these', 'D', 24, 13, NULL, 8),
(464, 'The ratio betwwen the present ages of S and T is 6:7. If T is 4 years old than S, what will be the ratio of the ages of S and T after 4 years ?', '0.1277777777777778', '0.1284722222222222', '0.16875', 'None of these', 'D', 24, 13, NULL, 8),
(465, 'Ramesh was asked to tell his age in years. His reply was, "Take my age three years, multiply it  by 3  and then substract three times my age three years ago and you will know how old I am" What was the age of the person ?', ' 20 years', '16 years', '24 years', '18 years', 'D', 24, 13, NULL, 8),
(466, 'Age of a man is three times the age of his son. After 10 years, the age of the man would become two times the age of his son. What is the present age of man /', '64 years', '52 years', '30 years', '48 years', 'C', 24, 13, NULL, 8),
(467, 'The total of  present ages of Ram, Shyam and Ajay is 72 years. Total of present ages of Ram and Shyam is 42 years. What is the present age of Ajay ?', '30 years', '24 years', '36 years', '18 years', 'A', 24, 13, NULL, 8),
(468, 'The present age of Saroj is 6 times the age of Ajay. Present age of Ajay is 20 years less than  the present age of Saroj. What is the present age of Saroj ?', '16 years', '18 years', '20 years', 'None of these', 'D', 24, 13, NULL, 8),
(469, 'The total of ages of Jay, ramesh and Sunil is 93 years. Ten years ago, the ratio of their ages was 2:3:4 . What is the present age of Sunil', '34 years', '38 years', '44 years', '52 years', 'B', 24, 13, NULL, 8),
(470, 'The ratio of present ages of two brothers is 1:2 and 5 years back, the ratio was 1:3. What will be the ratio of their ages after 5 years ?', '0.04444444444444445', '0.08541666666666665', '0.1284722222222222', '0.2125', 'D', 24, 13, NULL, 8),
(471, 'Hritik is 40 years old and rocky is 60 years old. How many years ago was the ratio of their ages 3:5 ?', '10 years', '5 years', '7 years', '9 years', 'A', 24, 13, NULL, 8),
(472, 'A man is 24 years older than his son. In two years, his age will be twice the age of his son. The present age of the son is :', '13 years', '17 years', '22 years', '7 years', 'C', 24, 13, NULL, 8),
(473, 'A is two years older than B who is twice as old as C. If the total of the ages of A, B and C be 27, then how old is B ?', '5 years', '10 years', '5 years', '3 years', 'B', 24, 13, NULL, 8),
(474, 'Ten years ago, A was half of B in age. If the ratio of their present ages is 3:4, what will be the total of their present ages ?', '25 years', '30 years', '65 years', 'None of these', 'D', 24, 13, NULL, 8),
(475, 'Ramesh present age is two-fifth of the age of his mother. After 8 years, he will be one-half of the age of his mother. How old is the mother at present?', '24 years', '36 years', '40 years', '56 years', 'C', 24, 13, NULL, 8),
(476, 'In ten years A will be twice as old as B was 10 years ago. If A is now 9 years older than B,  the present age of B is', '19 years', '39 years', '29 years', '49 years', 'B', 24, 13, NULL, 8),
(477, 'The difference between the ages of two persons is 10 years. Fifteen years ago, the elder one was as old as the younger one. The present age of the elder person is', '45 years', '25 years', ' 35 years', '55 years', 'C', 24, 13, NULL, 8),
(478, 'The sum of ages of 5 children born at the interval of 3 years each is 50 years. What is the age of the youngest child ?', '8 years', '4 years', '10 years', 'None of these', 'B', 24, 13, NULL, 8),
(479, 'The total age A and B is 12 years more than the total age of Band C. C is how many years younger than A ?', '12 years', '24 years', 'C is elder than A', 'None of these', 'A', 24, 13, NULL, 8),
(480, 'Eighteen years ago, a father was three times as old as his son. Now father is only twice as old as his son. Then the sum of the present ages of the son and the father is :', '72 years', '54 years', '108 years', '105 years', 'C', 24, 13, NULL, 8),
(530, 'Sunil is younger than ravi by 4 years. If their ages are in the respective ratio of 7:9, how old is sunil ?', '14 years', '17 years', '21 years', 'None of these', 'D', 23, 15, NULL, 9),
(531, 'The ratio betwwen the present ages of S and T is 6:7. If T is 4 years old than S, what will be the ratio of the ages of S and T after 4 years ?', '0.1277777777777778', '0.1284722222222222', '0.16875', 'None of these', 'D', 23, 15, NULL, 9),
(532, 'Ramesh was asked to tell his age in years. His reply was, "Take my age three years, multiply it  by 3  and then substract three times my age three years ago and you will know how old I am" What was the age of the person ?', ' 20 years', '16 years', '24 years', '18 years', 'D', 23, 15, NULL, 9),
(533, 'Age of a man is three times the age of his son. After 10 years, the age of the man would become two times the age of his son. What is the present age of man /', '64 years', '52 years', '30 years', '48 years', 'C', 23, 15, NULL, 9),
(534, 'The total of  present ages of Ram, Shyam and Ajay is 72 years. Total of present ages of Ram and Shyam is 42 years. What is the present age of Ajay ?', '30 years', '24 years', '36 years', '18 years', 'A', 23, 15, NULL, 9),
(535, 'The present age of Saroj is 6 times the age of Ajay. Present age of Ajay is 20 years less than  the present age of Saroj. What is the present age of Saroj ?', '16 years', '18 years', '20 years', 'None of these', 'D', 23, 15, NULL, 9),
(536, 'The total of ages of Jay, ramesh and Sunil is 93 years. Ten years ago, the ratio of their ages was 2:3:4 . What is the present age of Sunil', '34 years', '38 years', '44 years', '52 years', 'B', 23, 15, NULL, 9),
(537, 'The ratio of present ages of two brothers is 1:2 and 5 years back, the ratio was 1:3. What will be the ratio of their ages after 5 years ?', '0.04444444444444445', '0.08541666666666665', '0.1284722222222222', '0.2125', 'D', 23, 15, NULL, 9),
(538, 'Hritik is 40 years old and rocky is 60 years old. How many years ago was the ratio of their ages 3:5 ?', '10 years', '5 years', '7 years', '9 years', 'A', 23, 15, NULL, 9),
(539, 'A man is 24 years older than his son. In two years, his age will be twice the age of his son. The present age of the son is :', '13 years', '17 years', '22 years', '7 years', 'C', 23, 15, NULL, 9),
(540, 'A is two years older than B who is twice as old as C. If the total of the ages of A, B and C be 27, then how old is B ?', '5 years', '10 years', '5 years', '3 years', 'B', 23, 15, NULL, 9),
(541, 'Ten years ago, A was half of B in age. If the ratio of their present ages is 3:4, what will be the total of their present ages ?', '25 years', '30 years', '65 years', 'None of these', 'D', 23, 15, NULL, 9),
(542, 'Ramesh present age is two-fifth of the age of his mother. After 8 years, he will be one-half of the age of his mother. How old is the mother at present?', '24 years', '36 years', '40 years', '56 years', 'C', 23, 15, NULL, 9),
(543, 'In ten years A will be twice as old as B was 10 years ago. If A is now 9 years older than B,  the present age of B is', '19 years', '39 years', '29 years', '49 years', 'B', 23, 15, NULL, 9),
(544, 'The difference between the ages of two persons is 10 years. Fifteen years ago, the elder one was as old as the younger one. The present age of the elder person is', '45 years', '25 years', ' 35 years', '55 years', 'C', 23, 15, NULL, 9),
(545, 'The sum of ages of 5 children born at the interval of 3 years each is 50 years. What is the age of the youngest child ?', '8 years', '4 years', '10 years', 'None of these', 'B', 23, 15, NULL, 9),
(546, 'The total age A and B is 12 years more than the total age of Band C. C is how many years younger than A ?', '12 years', '24 years', 'C is elder than A', 'None of these', 'A', 23, 15, NULL, 9),
(547, 'Eighteen years ago, a father was three times as old as his son. Now father is only twice as old as his son. Then the sum of the present ages of the son and the father is :', '72 years', '54 years', '108 years', '105 years', 'C', 23, 15, NULL, 9);

-- --------------------------------------------------------

--
-- Table structure for table `recent_updates`
--

CREATE TABLE IF NOT EXISTS `recent_updates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `topic` varchar(255) NOT NULL,
  `url` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE IF NOT EXISTS `subscription` (
  `subscription_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`subscription_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`subscription_id`, `name`, `email`, `created`) VALUES
(1, 'Antriksh', 'antrikshchhipa@gmail.com', '2017-07-09 04:44:58');

-- --------------------------------------------------------

--
-- Table structure for table `subtopic`
--

CREATE TABLE IF NOT EXISTS `subtopic` (
  `sub_id` int(11) NOT NULL AUTO_INCREMENT,
  `subtopic` varchar(255) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `folder_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`sub_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `subtopic`
--

INSERT INTO `subtopic` (`sub_id`, `subtopic`, `cat_id`, `topic_id`, `folder_id`) VALUES
(8, 'Ratio And Proportion', 24, 13, NULL),
(9, 'Sub1', 23, 15, NULL),
(10, 'Trains And Distance', 23, 15, NULL),
(13, 'Sub1maths', 23, 12, NULL),
(14, 'Topn', 23, 14, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `test_name`
--

INSERT INTO `test_name` (`tn_id`, `tn_name`, `th_id`, `tc_id`, `no_of_q`, `time`, `created`) VALUES
(6, 'Antriksh', 3, 2, 5, '1;4;3', '2017-08-13 16:50:53'),
(8, 'second test', 3, 2, 20, '2;0;0', '2017-07-23 16:43:05'),
(9, 'test 3', 3, 2, 25, '2;0;0', '2017-07-23 16:55:50');

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

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE IF NOT EXISTS `topics` (
  `topic_id` int(11) NOT NULL AUTO_INCREMENT,
  `topic` varchar(255) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `type` text NOT NULL,
  PRIMARY KEY (`topic_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`topic_id`, `topic`, `cat_id`, `type`) VALUES
(12, 'Basics', 23, 'Basic'),
(13, 'Videos', 23, 'Video'),
(14, 'Folder', 23, 'Folder'),
(15, 'Question 2', 23, 'Question'),
(16, 'Topic Name New', 24, 'Question'),
(18, 'New Folder', 23, 'Folder');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `fbid` text NOT NULL,
  `gmailid` text,
  `profileImage` text,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '0 - admin, 1- active user, 2- disable user and 3 - deleted user',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `name`, `email`, `password`, `fbid`, `gmailid`, `profileImage`, `date_created`, `status`) VALUES
(1, 'Admin', 'admin@padhlepappu.com', '$2vJMIHXMBFH2', '', NULL, NULL, '2017-07-14 09:55:04', 0),
(10, 'Antriksh chhipa', 'antrikshchhipa@yahoo.com', '$2/UbwcMXYvRg', '', NULL, NULL, '2017-08-19 08:05:28', 1),
(13, 'Akshay Chauhan', 'king.chauhan25@gmail.com', '', '', '105212023004541967958', 'https://lh3.googleusercontent.com/-VU0Vd0ex5DY/AAAAAAAAAAI/AAAAAAAAAak/6RZHE_SNR1Y/s96-c/photo.jpg', '2017-08-26 19:13:31', 1),
(14, 'Ashish Vaishnav', 'vaishnavashish5@gmail.com', '$2/UbwcMXYvRg', '', NULL, NULL, '2017-08-26 19:04:43', 2),
(23, 'Antriksh Chhipa', 'antrikshchhipa@gmail.com', '$2jFaOvJaNWzM', '', '108969781241367481005', 'https://lh4.googleusercontent.com/-XD_l1EonboY/AAAAAAAAAAI/AAAAAAAAAAA/APJypA2ldhx2FHJD5ZoRk3LqmitBAc7_9g/s96-c/photo.jpg', '2017-08-26 19:18:08', 1),
(24, 'Antriksh chhipa', 'a@a.com', '$2cp0aiinHGS2', '', NULL, NULL, '2017-08-13 13:45:07', 1),
(25, 'Antriksh Chhipa', '', '', '1050913848374524', NULL, NULL, '2017-08-18 14:48:26', 1);

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE IF NOT EXISTS `videos` (
  `video_id` int(11) NOT NULL AUTO_INCREMENT,
  `video_name` varchar(256) NOT NULL,
  `youtube_id` text NOT NULL,
  `cat_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`video_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`video_id`, `video_name`, `youtube_id`, `cat_id`, `topic_id`, `created`) VALUES
(2, 'Aptitude Video', 'PUGkUUDEd9E', 23, 13, '2017-07-22 12:19:25'),
(3, 'Apty video', 'PUGkUUDEd9E', 23, 13, '2017-07-22 12:19:03'),
(4, 'Videoname', '6R5UveljmOQ', 23, 13, '2017-07-22 12:20:27');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
