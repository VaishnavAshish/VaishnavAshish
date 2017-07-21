-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 21, 2017 at 07:59 PM
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
(2, 'english', 'english7.pdf', 23, 11, 7, '2017-07-16 13:36:09');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) NOT NULL,
  `cat_image` text NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `category`, `cat_image`) VALUES
(23, 'Maths', 'Maths.png'),
(24, 'Reasoning', 'Reasoning.png'),
(25, 'English', 'English.png'),
(26, 'G.K.', 'G.K..png'),
(27, 'Medical', 'Medical.png'),
(28, 'Engineering', 'Engineering.png'),
(29, 'Online Test', 'Online Test.png'),
(30, 'Exam Paper', 'Exam Paper.png'),
(31, 'Interview', 'Interview.png');

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
  `sub_id` int(11) NOT NULL,
  PRIMARY KEY (`qid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=517 ;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`qid`, `question`, `opt1`, `opt2`, `opt3`, `opt4`, `answer`, `cat_id`, `topic_id`, `sub_id`) VALUES
(347, 'Sunil is younger than ravi by 4 years. If their ages are in the respective ratio of 7:9, how old is sunil ?', '14 years', '17 years', '21 years', 'None of these', 'A', 24, 13, 8),
(348, 'The ratio betwwen the present ages of S and T is 6:7. If T is 4 years old than S, what will be the ratio of the ages of S and T after 4 years ?', '3:04', '3:05', '4:03', 'None of these', 'D', 23, 11, 7),
(349, 'Ramesh was asked to tell his age in years. His reply was, "Take my age three years, multiply it  by 3  and then substract three times my age three years ago and you will know how old I am" What was the age of the person ?', ' 20 years', '16 years', '24 years', '18 years', 'D', 23, 11, 7),
(350, 'Age of a man is three times the age of his son. After 10 years, the age of the man would become two times the age of his son. What is the present age of man /', '64 years', '52 years', '30 years', '48 years', 'C', 23, 11, 7),
(351, 'The total of  present ages of Ram, Shyam and Ajay is 72 years. Total of present ages of Ram and Shyam is 42 years. What is the present age of Ajay ?', '30 years', '24 years', '36 years', '18 years', 'A', 23, 11, 7),
(352, 'The present age of Saroj is 6 times the age of Ajay. Present age of Ajay is 20 years less than  the present age of Saroj. What is the present age of Saroj ?', '16 years', '18 years', '20 years', 'None of these', 'D', 23, 11, 7),
(353, 'The total of ages of Jay, ramesh and Sunil is 93 years. Ten years ago, the ratio of their ages was 2:3:4 . What is the present age of Sunil', '34 years', '38 years', '44 years', '52 years', 'B', 23, 11, 7),
(354, 'The ratio of present ages of two brothers is 1:2 and 5 years back, the ratio was 1:3. What will be the ratio of their ages after 5 years ?', '1:04', '2:03', '3:05', '5:06', 'D', 23, 11, 7),
(355, 'Sunil is younger than ravi by 4 years. If their ages are in the respective ratio of 7:9, how old is sunil ?', '14 years', '17 years', '21 years', 'None of these', 'D', 23, 11, 7),
(356, 'The ratio betwwen the present ages of S and T is 6:7. If T is 4 years old than S, what will be the ratio of the ages of S and T after 4 years ?', '0.1277777777777778', '0.1284722222222222', '0.16875', 'None of these', 'D', 23, 11, 7),
(357, 'Ramesh was asked to tell his age in years. His reply was, "Take my age three years, multiply it  by 3  and then substract three times my age three years ago and you will know how old I am" What was the age of the person ?', ' 20 years', '16 years', '24 years', '18 years', 'D', 23, 11, 7),
(358, 'Age of a man is three times the age of his son. After 10 years, the age of the man would become two times the age of his son. What is the present age of man /', '64 years', '52 years', '30 years', '48 years', 'C', 23, 11, 7),
(359, 'The total of  present ages of Ram, Shyam and Ajay is 72 years. Total of present ages of Ram and Shyam is 42 years. What is the present age of Ajay ?', '30 years', '24 years', '36 years', '18 years', 'A', 23, 11, 7),
(360, 'The present age of Saroj is 6 times the age of Ajay. Present age of Ajay is 20 years less than  the present age of Saroj. What is the present age of Saroj ?', '16 years', '18 years', '20 years', 'None of these', 'D', 23, 11, 7),
(361, 'The total of ages of Jay, ramesh and Sunil is 93 years. Ten years ago, the ratio of their ages was 2:3:4 . What is the present age of Sunil', '34 years', '38 years', '44 years', '52 years', 'B', 23, 11, 7),
(362, 'The ratio of present ages of two brothers is 1:2 and 5 years back, the ratio was 1:3. What will be the ratio of their ages after 5 years ?', '0.04444444444444445', '0.08541666666666665', '0.1284722222222222', '0.2125', 'D', 23, 11, 7),
(363, 'Hritik is 40 years old and rocky is 60 years old. How many years ago was the ratio of their ages 3:5 ?', '10 years', '5 years', '7 years', '9 years', 'A', 23, 11, 7),
(364, 'A man is 24 years older than his son. In two years, his age will be twice the age of his son. The present age of the son is :', '13 years', '17 years', '22 years', '7 years', 'C', 23, 11, 7),
(365, 'A is two years older than B who is twice as old as C. If the total of the ages of A, B and C be 27, then how old is B ?', '5 years', '10 years', '5 years', '3 years', 'B', 23, 11, 7),
(366, 'Ten years ago, A was half of B in age. If the ratio of their present ages is 3:4, what will be the total of their present ages ?', '25 years', '30 years', '65 years', 'None of these', 'D', 23, 11, 7),
(367, 'Ramesh present age is two-fifth of the age of his mother. After 8 years, he will be one-half of the age of his mother. How old is the mother at present?', '24 years', '36 years', '40 years', '56 years', 'C', 23, 11, 7),
(368, 'In ten years A will be twice as old as B was 10 years ago. If A is now 9 years older than B,  the present age of B is', '19 years', '39 years', '29 years', '49 years', 'B', 23, 11, 7),
(369, 'The difference between the ages of two persons is 10 years. Fifteen years ago, the elder one was as old as the younger one. The present age of the elder person is', '45 years', '25 years', ' 35 years', '55 years', 'C', 23, 11, 7),
(370, 'The sum of ages of 5 children born at the interval of 3 years each is 50 years. What is the age of the youngest child ?', '8 years', '4 years', '10 years', 'None of these', 'B', 23, 11, 7),
(371, 'The total age A and B is 12 years more than the total age of Band C. C is how many years younger than A ?', '12 years', '24 years', 'C is elder than A', 'None of these', 'A', 23, 11, 7),
(372, 'Eighteen years ago, a father was three times as old as his son. Now father is only twice as old as his son. Then the sum of the present ages of the son and the father is :', '72 years', '54 years', '108 years', '105 years', 'C', 23, 11, 7),
(373, 'Sunil is younger than ravi by 4 years. If their ages are in the respective ratio of 7:9, how old is sunil ?', '14 years', '17 years', '21 years', 'None of these', 'D', 23, 11, 7),
(374, 'The ratio betwwen the present ages of S and T is 6:7. If T is 4 years old than S, what will be the ratio of the ages of S and T after 4 years ?', '0.1277777777777778', '0.1284722222222222', '0.16875', 'None of these', 'D', 23, 11, 7),
(375, 'Ramesh was asked to tell his age in years. His reply was, "Take my age three years, multiply it  by 3  and then substract three times my age three years ago and you will know how old I am" What was the age of the person ?', ' 20 years', '16 years', '24 years', '18 years', 'D', 23, 11, 7),
(376, 'Age of a man is three times the age of his son. After 10 years, the age of the man would become two times the age of his son. What is the present age of man /', '64 years', '52 years', '30 years', '48 years', 'C', 23, 11, 7),
(377, 'The total of  present ages of Ram, Shyam and Ajay is 72 years. Total of present ages of Ram and Shyam is 42 years. What is the present age of Ajay ?', '30 years', '24 years', '36 years', '18 years', 'A', 23, 11, 7),
(378, 'The present age of Saroj is 6 times the age of Ajay. Present age of Ajay is 20 years less than  the present age of Saroj. What is the present age of Saroj ?', '16 years', '18 years', '20 years', 'None of these', 'D', 23, 11, 7),
(379, 'The total of ages of Jay, ramesh and Sunil is 93 years. Ten years ago, the ratio of their ages was 2:3:4 . What is the present age of Sunil', '34 years', '38 years', '44 years', '52 years', 'B', 23, 11, 7),
(380, 'The ratio of present ages of two brothers is 1:2 and 5 years back, the ratio was 1:3. What will be the ratio of their ages after 5 years ?', '0.04444444444444445', '0.08541666666666665', '0.1284722222222222', '0.2125', 'D', 23, 11, 7),
(381, 'Hritik is 40 years old and rocky is 60 years old. How many years ago was the ratio of their ages 3:5 ?', '10 years', '5 years', '7 years', '9 years', 'A', 23, 11, 7),
(382, 'A man is 24 years older than his son. In two years, his age will be twice the age of his son. The present age of the son is :', '13 years', '17 years', '22 years', '7 years', 'C', 23, 11, 7),
(383, 'A is two years older than B who is twice as old as C. If the total of the ages of A, B and C be 27, then how old is B ?', '5 years', '10 years', '5 years', '3 years', 'B', 23, 11, 7),
(384, 'Ten years ago, A was half of B in age. If the ratio of their present ages is 3:4, what will be the total of their present ages ?', '25 years', '30 years', '65 years', 'None of these', 'D', 23, 11, 7),
(385, 'Ramesh present age is two-fifth of the age of his mother. After 8 years, he will be one-half of the age of his mother. How old is the mother at present?', '24 years', '36 years', '40 years', '56 years', 'C', 23, 11, 7),
(386, 'In ten years A will be twice as old as B was 10 years ago. If A is now 9 years older than B,  the present age of B is', '19 years', '39 years', '29 years', '49 years', 'B', 23, 11, 7),
(387, 'The difference between the ages of two persons is 10 years. Fifteen years ago, the elder one was as old as the younger one. The present age of the elder person is', '45 years', '25 years', ' 35 years', '55 years', 'C', 23, 11, 7),
(388, 'The sum of ages of 5 children born at the interval of 3 years each is 50 years. What is the age of the youngest child ?', '8 years', '4 years', '10 years', 'None of these', 'B', 23, 11, 7),
(389, 'The total age A and B is 12 years more than the total age of Band C. C is how many years younger than A ?', '12 years', '24 years', 'C is elder than A', 'None of these', 'A', 23, 11, 7),
(390, 'Eighteen years ago, a father was three times as old as his son. Now father is only twice as old as his son. Then the sum of the present ages of the son and the father is :', '72 years', '54 years', '108 years', '105 years', 'C', 23, 11, 7),
(391, 'Sunil is younger than ravi by 4 years. If their ages are in the respective ratio of 7:9, how old is sunil ?', '14 years', '17 years', '21 years', 'None of these', 'D', 23, 11, 7),
(392, 'The ratio betwwen the present ages of S and T is 6:7. If T is 4 years old than S, what will be the ratio of the ages of S and T after 4 years ?', '0.1277777777777778', '0.1284722222222222', '0.16875', 'None of these', 'D', 23, 11, 7),
(393, 'Ramesh was asked to tell his age in years. His reply was, "Take my age three years, multiply it  by 3  and then substract three times my age three years ago and you will know how old I am" What was the age of the person ?', ' 20 years', '16 years', '24 years', '18 years', 'D', 23, 11, 7),
(394, 'Age of a man is three times the age of his son. After 10 years, the age of the man would become two times the age of his son. What is the present age of man /', '64 years', '52 years', '30 years', '48 years', 'C', 23, 11, 7),
(395, 'The total of  present ages of Ram, Shyam and Ajay is 72 years. Total of present ages of Ram and Shyam is 42 years. What is the present age of Ajay ?', '30 years', '24 years', '36 years', '18 years', 'A', 23, 11, 7),
(396, 'The present age of Saroj is 6 times the age of Ajay. Present age of Ajay is 20 years less than  the present age of Saroj. What is the present age of Saroj ?', '16 years', '18 years', '20 years', 'None of these', 'D', 23, 11, 7),
(397, 'The total of ages of Jay, ramesh and Sunil is 93 years. Ten years ago, the ratio of their ages was 2:3:4 . What is the present age of Sunil', '34 years', '38 years', '44 years', '52 years', 'B', 23, 11, 7),
(398, 'The ratio of present ages of two brothers is 1:2 and 5 years back, the ratio was 1:3. What will be the ratio of their ages after 5 years ?', '0.04444444444444445', '0.08541666666666665', '0.1284722222222222', '0.2125', 'D', 23, 11, 7),
(399, 'Hritik is 40 years old and rocky is 60 years old. How many years ago was the ratio of their ages 3:5 ?', '10 years', '5 years', '7 years', '9 years', 'A', 23, 11, 7),
(400, 'A man is 24 years older than his son. In two years, his age will be twice the age of his son. The present age of the son is :', '13 years', '17 years', '22 years', '7 years', 'C', 23, 11, 7),
(401, 'A is two years older than B who is twice as old as C. If the total of the ages of A, B and C be 27, then how old is B ?', '5 years', '10 years', '5 years', '3 years', 'B', 23, 11, 7),
(402, 'Ten years ago, A was half of B in age. If the ratio of their present ages is 3:4, what will be the total of their present ages ?', '25 years', '30 years', '65 years', 'None of these', 'D', 23, 11, 7),
(403, 'Ramesh present age is two-fifth of the age of his mother. After 8 years, he will be one-half of the age of his mother. How old is the mother at present?', '24 years', '36 years', '40 years', '56 years', 'C', 23, 11, 7),
(404, 'In ten years A will be twice as old as B was 10 years ago. If A is now 9 years older than B,  the present age of B is', '19 years', '39 years', '29 years', '49 years', 'B', 23, 11, 7),
(405, 'The difference between the ages of two persons is 10 years. Fifteen years ago, the elder one was as old as the younger one. The present age of the elder person is', '45 years', '25 years', ' 35 years', '55 years', 'C', 23, 11, 7),
(406, 'The sum of ages of 5 children born at the interval of 3 years each is 50 years. What is the age of the youngest child ?', '8 years', '4 years', '10 years', 'None of these', 'B', 23, 11, 7),
(407, 'The total age A and B is 12 years more than the total age of Band C. C is how many years younger than A ?', '12 years', '24 years', 'C is elder than A', 'None of these', 'A', 23, 11, 7),
(408, 'Eighteen years ago, a father was three times as old as his son. Now father is only twice as old as his son. Then the sum of the present ages of the son and the father is :', '72 years', '54 years', '108 years', '105 years', 'C', 23, 11, 7),
(409, 'Sunil is younger than ravi by 4 years. If their ages are in the respective ratio of 7:9, how old is sunil ?', '14 years', '17 years', '21 years', 'None of these', 'D', 23, 11, 7),
(410, 'The ratio betwwen the present ages of S and T is 6:7. If T is 4 years old than S, what will be the ratio of the ages of S and T after 4 years ?', '0.1277777777777778', '0.1284722222222222', '0.16875', 'None of these', 'D', 23, 11, 7),
(411, 'Ramesh was asked to tell his age in years. His reply was, "Take my age three years, multiply it  by 3  and then substract three times my age three years ago and you will know how old I am" What was the age of the person ?', ' 20 years', '16 years', '24 years', '18 years', 'D', 23, 11, 7),
(412, 'Age of a man is three times the age of his son. After 10 years, the age of the man would become two times the age of his son. What is the present age of man /', '64 years', '52 years', '30 years', '48 years', 'C', 23, 11, 7),
(413, 'The total of  present ages of Ram, Shyam and Ajay is 72 years. Total of present ages of Ram and Shyam is 42 years. What is the present age of Ajay ?', '30 years', '24 years', '36 years', '18 years', 'A', 23, 11, 7),
(414, 'The present age of Saroj is 6 times the age of Ajay. Present age of Ajay is 20 years less than  the present age of Saroj. What is the present age of Saroj ?', '16 years', '18 years', '20 years', 'None of these', 'D', 23, 11, 7),
(415, 'The total of ages of Jay, ramesh and Sunil is 93 years. Ten years ago, the ratio of their ages was 2:3:4 . What is the present age of Sunil', '34 years', '38 years', '44 years', '52 years', 'B', 23, 11, 7),
(416, 'The ratio of present ages of two brothers is 1:2 and 5 years back, the ratio was 1:3. What will be the ratio of their ages after 5 years ?', '0.04444444444444445', '0.08541666666666665', '0.1284722222222222', '0.2125', 'D', 23, 11, 7),
(417, 'Hritik is 40 years old and rocky is 60 years old. How many years ago was the ratio of their ages 3:5 ?', '10 years', '5 years', '7 years', '9 years', 'A', 23, 11, 7),
(418, 'A man is 24 years older than his son. In two years, his age will be twice the age of his son. The present age of the son is :', '13 years', '17 years', '22 years', '7 years', 'C', 23, 11, 7),
(419, 'A is two years older than B who is twice as old as C. If the total of the ages of A, B and C be 27, then how old is B ?', '5 years', '10 years', '5 years', '3 years', 'B', 23, 11, 7),
(420, 'Ten years ago, A was half of B in age. If the ratio of their present ages is 3:4, what will be the total of their present ages ?', '25 years', '30 years', '65 years', 'None of these', 'D', 23, 11, 7),
(421, 'Ramesh present age is two-fifth of the age of his mother. After 8 years, he will be one-half of the age of his mother. How old is the mother at present?', '24 years', '36 years', '40 years', '56 years', 'C', 23, 11, 7),
(422, 'In ten years A will be twice as old as B was 10 years ago. If A is now 9 years older than B,  the present age of B is', '19 years', '39 years', '29 years', '49 years', 'B', 23, 11, 7),
(423, 'The difference between the ages of two persons is 10 years. Fifteen years ago, the elder one was as old as the younger one. The present age of the elder person is', '45 years', '25 years', ' 35 years', '55 years', 'C', 23, 11, 7),
(424, 'The sum of ages of 5 children born at the interval of 3 years each is 50 years. What is the age of the youngest child ?', '8 years', '4 years', '10 years', 'None of these', 'B', 23, 11, 7),
(425, 'The total age A and B is 12 years more than the total age of Band C. C is how many years younger than A ?', '12 years', '24 years', 'C is elder than A', 'None of these', 'A', 23, 11, 7),
(426, 'Eighteen years ago, a father was three times as old as his son. Now father is only twice as old as his son. Then the sum of the present ages of the son and the father is :', '72 years', '54 years', '108 years', '105 years', 'C', 23, 11, 7),
(427, 'Sunil is younger than ravi by 4 years. If their ages are in the respective ratio of 7:9, how old is sunil ?', '14 years', '17 years', '21 years', 'None of these', 'D', 23, 11, 7),
(428, 'The ratio betwwen the present ages of S and T is 6:7. If T is 4 years old than S, what will be the ratio of the ages of S and T after 4 years ?', '0.1277777777777778', '0.1284722222222222', '0.16875', 'None of these', 'D', 23, 11, 7),
(429, 'Ramesh was asked to tell his age in years. His reply was, "Take my age three years, multiply it  by 3  and then substract three times my age three years ago and you will know how old I am" What was the age of the person ?', ' 20 years', '16 years', '24 years', '18 years', 'D', 23, 11, 7),
(430, 'Age of a man is three times the age of his son. After 10 years, the age of the man would become two times the age of his son. What is the present age of man /', '64 years', '52 years', '30 years', '48 years', 'C', 23, 11, 7),
(431, 'The total of  present ages of Ram, Shyam and Ajay is 72 years. Total of present ages of Ram and Shyam is 42 years. What is the present age of Ajay ?', '30 years', '24 years', '36 years', '18 years', 'A', 23, 11, 7),
(432, 'The present age of Saroj is 6 times the age of Ajay. Present age of Ajay is 20 years less than  the present age of Saroj. What is the present age of Saroj ?', '16 years', '18 years', '20 years', 'None of these', 'D', 23, 11, 7),
(433, 'The total of ages of Jay, ramesh and Sunil is 93 years. Ten years ago, the ratio of their ages was 2:3:4 . What is the present age of Sunil', '34 years', '38 years', '44 years', '52 years', 'B', 23, 11, 7),
(434, 'The ratio of present ages of two brothers is 1:2 and 5 years back, the ratio was 1:3. What will be the ratio of their ages after 5 years ?', '0.04444444444444445', '0.08541666666666665', '0.1284722222222222', '0.2125', 'D', 23, 11, 7),
(435, 'Hritik is 40 years old and rocky is 60 years old. How many years ago was the ratio of their ages 3:5 ?', '10 years', '5 years', '7 years', '9 years', 'A', 23, 11, 7),
(436, 'A man is 24 years older than his son. In two years, his age will be twice the age of his son. The present age of the son is :', '13 years', '17 years', '22 years', '7 years', 'C', 23, 11, 7),
(437, 'A is two years older than B who is twice as old as C. If the total of the ages of A, B and C be 27, then how old is B ?', '5 years', '10 years', '5 years', '3 years', 'B', 23, 11, 7),
(438, 'Ten years ago, A was half of B in age. If the ratio of their present ages is 3:4, what will be the total of their present ages ?', '25 years', '30 years', '65 years', 'None of these', 'D', 23, 11, 7),
(439, 'Ramesh present age is two-fifth of the age of his mother. After 8 years, he will be one-half of the age of his mother. How old is the mother at present?', '24 years', '36 years', '40 years', '56 years', 'C', 23, 11, 7),
(440, 'In ten years A will be twice as old as B was 10 years ago. If A is now 9 years older than B,  the present age of B is', '19 years', '39 years', '29 years', '49 years', 'B', 23, 11, 7),
(441, 'The difference between the ages of two persons is 10 years. Fifteen years ago, the elder one was as old as the younger one. The present age of the elder person is', '45 years', '25 years', ' 35 years', '55 years', 'C', 23, 11, 7),
(442, 'The sum of ages of 5 children born at the interval of 3 years each is 50 years. What is the age of the youngest child ?', '8 years', '4 years', '10 years', 'None of these', 'B', 23, 11, 7),
(443, 'The total age A and B is 12 years more than the total age of Band C. C is how many years younger than A ?', '12 years', '24 years', 'C is elder than A', 'None of these', 'A', 23, 11, 7),
(444, 'Eighteen years ago, a father was three times as old as his son. Now father is only twice as old as his son. Then the sum of the present ages of the son and the father is :', '72 years', '54 years', '108 years', '105 years', 'C', 23, 11, 7),
(445, 'Sunil is younger than ravi by 4 years. If their ages are in the respective ratio of 7:9, how old is sunil ?', '14 years', '17 years', '21 years', 'None of these', 'D', 24, 13, 8),
(446, 'The ratio betwwen the present ages of S and T is 6:7. If T is 4 years old than S, what will be the ratio of the ages of S and T after 4 years ?', '0.1277777777777778', '0.1284722222222222', '0.16875', 'None of these', 'D', 24, 13, 8),
(447, 'Ramesh was asked to tell his age in years. His reply was, "Take my age three years, multiply it  by 3  and then substract three times my age three years ago and you will know how old I am" What was the age of the person ?', ' 20 years', '16 years', '24 years', '18 years', 'D', 24, 13, 8),
(448, 'Age of a man is three times the age of his son. After 10 years, the age of the man would become two times the age of his son. What is the present age of man /', '64 years', '52 years', '30 years', '48 years', 'C', 24, 13, 8),
(449, 'The total of  present ages of Ram, Shyam and Ajay is 72 years. Total of present ages of Ram and Shyam is 42 years. What is the present age of Ajay ?', '30 years', '24 years', '36 years', '18 years', 'A', 24, 13, 8),
(450, 'The present age of Saroj is 6 times the age of Ajay. Present age of Ajay is 20 years less than  the present age of Saroj. What is the present age of Saroj ?', '16 years', '18 years', '20 years', 'None of these', 'D', 24, 13, 8),
(451, 'The total of ages of Jay, ramesh and Sunil is 93 years. Ten years ago, the ratio of their ages was 2:3:4 . What is the present age of Sunil', '34 years', '38 years', '44 years', '52 years', 'B', 24, 13, 8),
(452, 'The ratio of present ages of two brothers is 1:2 and 5 years back, the ratio was 1:3. What will be the ratio of their ages after 5 years ?', '0.04444444444444445', '0.08541666666666665', '0.1284722222222222', '0.2125', 'D', 24, 13, 8),
(453, 'Hritik is 40 years old and rocky is 60 years old. How many years ago was the ratio of their ages 3:5 ?', '10 years', '5 years', '7 years', '9 years', 'A', 24, 13, 8),
(454, 'A man is 24 years older than his son. In two years, his age will be twice the age of his son. The present age of the son is :', '13 years', '17 years', '22 years', '7 years', 'C', 24, 13, 8),
(455, 'A is two years older than B who is twice as old as C. If the total of the ages of A, B and C be 27, then how old is B ?', '5 years', '10 years', '5 years', '3 years', 'B', 24, 13, 8),
(456, 'Ten years ago, A was half of B in age. If the ratio of their present ages is 3:4, what will be the total of their present ages ?', '25 years', '30 years', '65 years', 'None of these', 'D', 24, 13, 8),
(457, 'Ramesh present age is two-fifth of the age of his mother. After 8 years, he will be one-half of the age of his mother. How old is the mother at present?', '24 years', '36 years', '40 years', '56 years', 'C', 24, 13, 8),
(458, 'In ten years A will be twice as old as B was 10 years ago. If A is now 9 years older than B,  the present age of B is', '19 years', '39 years', '29 years', '49 years', 'B', 24, 13, 8),
(459, 'The difference between the ages of two persons is 10 years. Fifteen years ago, the elder one was as old as the younger one. The present age of the elder person is', '45 years', '25 years', ' 35 years', '55 years', 'C', 24, 13, 8),
(460, 'The sum of ages of 5 children born at the interval of 3 years each is 50 years. What is the age of the youngest child ?', '8 years', '4 years', '10 years', 'None of these', 'B', 24, 13, 8),
(461, 'The total age A and B is 12 years more than the total age of Band C. C is how many years younger than A ?', '12 years', '24 years', 'C is elder than A', 'None of these', 'A', 24, 13, 8),
(462, 'Eighteen years ago, a father was three times as old as his son. Now father is only twice as old as his son. Then the sum of the present ages of the son and the father is :', '72 years', '54 years', '108 years', '105 years', 'C', 24, 13, 8),
(463, 'Sunil is younger than ravi by 4 years. If their ages are in the respective ratio of 7:9, how old is sunil ?', '14 years', '17 years', '21 years', 'None of these', 'D', 24, 13, 8),
(464, 'The ratio betwwen the present ages of S and T is 6:7. If T is 4 years old than S, what will be the ratio of the ages of S and T after 4 years ?', '0.1277777777777778', '0.1284722222222222', '0.16875', 'None of these', 'D', 24, 13, 8),
(465, 'Ramesh was asked to tell his age in years. His reply was, "Take my age three years, multiply it  by 3  and then substract three times my age three years ago and you will know how old I am" What was the age of the person ?', ' 20 years', '16 years', '24 years', '18 years', 'D', 24, 13, 8),
(466, 'Age of a man is three times the age of his son. After 10 years, the age of the man would become two times the age of his son. What is the present age of man /', '64 years', '52 years', '30 years', '48 years', 'C', 24, 13, 8),
(467, 'The total of  present ages of Ram, Shyam and Ajay is 72 years. Total of present ages of Ram and Shyam is 42 years. What is the present age of Ajay ?', '30 years', '24 years', '36 years', '18 years', 'A', 24, 13, 8),
(468, 'The present age of Saroj is 6 times the age of Ajay. Present age of Ajay is 20 years less than  the present age of Saroj. What is the present age of Saroj ?', '16 years', '18 years', '20 years', 'None of these', 'D', 24, 13, 8),
(469, 'The total of ages of Jay, ramesh and Sunil is 93 years. Ten years ago, the ratio of their ages was 2:3:4 . What is the present age of Sunil', '34 years', '38 years', '44 years', '52 years', 'B', 24, 13, 8),
(470, 'The ratio of present ages of two brothers is 1:2 and 5 years back, the ratio was 1:3. What will be the ratio of their ages after 5 years ?', '0.04444444444444445', '0.08541666666666665', '0.1284722222222222', '0.2125', 'D', 24, 13, 8),
(471, 'Hritik is 40 years old and rocky is 60 years old. How many years ago was the ratio of their ages 3:5 ?', '10 years', '5 years', '7 years', '9 years', 'A', 24, 13, 8),
(472, 'A man is 24 years older than his son. In two years, his age will be twice the age of his son. The present age of the son is :', '13 years', '17 years', '22 years', '7 years', 'C', 24, 13, 8),
(473, 'A is two years older than B who is twice as old as C. If the total of the ages of A, B and C be 27, then how old is B ?', '5 years', '10 years', '5 years', '3 years', 'B', 24, 13, 8),
(474, 'Ten years ago, A was half of B in age. If the ratio of their present ages is 3:4, what will be the total of their present ages ?', '25 years', '30 years', '65 years', 'None of these', 'D', 24, 13, 8),
(475, 'Ramesh present age is two-fifth of the age of his mother. After 8 years, he will be one-half of the age of his mother. How old is the mother at present?', '24 years', '36 years', '40 years', '56 years', 'C', 24, 13, 8),
(476, 'In ten years A will be twice as old as B was 10 years ago. If A is now 9 years older than B,  the present age of B is', '19 years', '39 years', '29 years', '49 years', 'B', 24, 13, 8),
(477, 'The difference between the ages of two persons is 10 years. Fifteen years ago, the elder one was as old as the younger one. The present age of the elder person is', '45 years', '25 years', ' 35 years', '55 years', 'C', 24, 13, 8),
(478, 'The sum of ages of 5 children born at the interval of 3 years each is 50 years. What is the age of the youngest child ?', '8 years', '4 years', '10 years', 'None of these', 'B', 24, 13, 8),
(479, 'The total age A and B is 12 years more than the total age of Band C. C is how many years younger than A ?', '12 years', '24 years', 'C is elder than A', 'None of these', 'A', 24, 13, 8),
(480, 'Eighteen years ago, a father was three times as old as his son. Now father is only twice as old as his son. Then the sum of the present ages of the son and the father is :', '72 years', '54 years', '108 years', '105 years', 'C', 24, 13, 8),
(481, 'Sunil is younger than ravi by 4 years. If their ages are in the respective ratio of 7:9, how old is sunil ?', '14 years', '17 years', '21 years', 'None of these', 'D', 23, 11, 7),
(482, 'The ratio betwwen the present ages of S and T is 6:7. If T is 4 years old than S, what will be the ratio of the ages of S and T after 4 years ?', '0.1277777777777778', '0.1284722222222222', '0.16875', 'None of these', 'D', 23, 11, 7),
(483, 'Ramesh was asked to tell his age in years. His reply was, "Take my age three years, multiply it  by 3  and then substract three times my age three years ago and you will know how old I am" What was the age of the person ?', ' 20 years', '16 years', '24 years', '18 years', 'D', 23, 11, 7),
(484, 'Age of a man is three times the age of his son. After 10 years, the age of the man would become two times the age of his son. What is the present age of man /', '64 years', '52 years', '30 years', '48 years', 'C', 23, 11, 7),
(485, 'The total of  present ages of Ram, Shyam and Ajay is 72 years. Total of present ages of Ram and Shyam is 42 years. What is the present age of Ajay ?', '30 years', '24 years', '36 years', '18 years', 'A', 23, 11, 7),
(486, 'The present age of Saroj is 6 times the age of Ajay. Present age of Ajay is 20 years less than  the present age of Saroj. What is the present age of Saroj ?', '16 years', '18 years', '20 years', 'None of these', 'D', 23, 11, 7),
(487, 'The total of ages of Jay, ramesh and Sunil is 93 years. Ten years ago, the ratio of their ages was 2:3:4 . What is the present age of Sunil', '34 years', '38 years', '44 years', '52 years', 'B', 23, 11, 7),
(488, 'The ratio of present ages of two brothers is 1:2 and 5 years back, the ratio was 1:3. What will be the ratio of their ages after 5 years ?', '0.04444444444444445', '0.08541666666666665', '0.1284722222222222', '0.2125', 'D', 23, 11, 7),
(489, 'Hritik is 40 years old and rocky is 60 years old. How many years ago was the ratio of their ages 3:5 ?', '10 years', '5 years', '7 years', '9 years', 'A', 23, 11, 7),
(490, 'A man is 24 years older than his son. In two years, his age will be twice the age of his son. The present age of the son is :', '13 years', '17 years', '22 years', '7 years', 'C', 23, 11, 7),
(491, 'A is two years older than B who is twice as old as C. If the total of the ages of A, B and C be 27, then how old is B ?', '5 years', '10 years', '5 years', '3 years', 'B', 23, 11, 7),
(492, 'Ten years ago, A was half of B in age. If the ratio of their present ages is 3:4, what will be the total of their present ages ?', '25 years', '30 years', '65 years', 'None of these', 'D', 23, 11, 7),
(493, 'Ramesh present age is two-fifth of the age of his mother. After 8 years, he will be one-half of the age of his mother. How old is the mother at present?', '24 years', '36 years', '40 years', '56 years', 'C', 23, 11, 7),
(494, 'In ten years A will be twice as old as B was 10 years ago. If A is now 9 years older than B,  the present age of B is', '19 years', '39 years', '29 years', '49 years', 'B', 23, 11, 7),
(495, 'The difference between the ages of two persons is 10 years. Fifteen years ago, the elder one was as old as the younger one. The present age of the elder person is', '45 years', '25 years', ' 35 years', '55 years', 'C', 23, 11, 7),
(496, 'The sum of ages of 5 children born at the interval of 3 years each is 50 years. What is the age of the youngest child ?', '8 years', '4 years', '10 years', 'None of these', 'B', 23, 11, 7),
(497, 'The total age A and B is 12 years more than the total age of Band C. C is how many years younger than A ?', '12 years', '24 years', 'C is elder than A', 'None of these', 'A', 23, 11, 7),
(498, 'Eighteen years ago, a father was three times as old as his son. Now father is only twice as old as his son. Then the sum of the present ages of the son and the father is :', '72 years', '54 years', '108 years', '105 years', 'C', 23, 11, 7),
(499, 'Sunil is younger than ravi by 4 years. If their ages are in the respective ratio of 7:9, how old is sunil ?', '14 years', '17 years', '21 years', 'None of these', 'D', 23, 11, 7),
(500, 'The ratio betwwen the present ages of S and T is 6:7. If T is 4 years old than S, what will be the ratio of the ages of S and T after 4 years ?', '0.1277777777777778', '0.1284722222222222', '0.16875', 'None of these', 'D', 23, 11, 7),
(501, 'Ramesh was asked to tell his age in years. His reply was, "Take my age three years, multiply it  by 3  and then substract three times my age three years ago and you will know how old I am" What was the age of the person ?', ' 20 years', '16 years', '24 years', '18 years', 'D', 23, 11, 7),
(502, 'Age of a man is three times the age of his son. After 10 years, the age of the man would become two times the age of his son. What is the present age of man /', '64 years', '52 years', '30 years', '48 years', 'C', 23, 11, 7),
(503, 'The total of  present ages of Ram, Shyam and Ajay is 72 years. Total of present ages of Ram and Shyam is 42 years. What is the present age of Ajay ?', '30 years', '24 years', '36 years', '18 years', 'A', 23, 11, 7),
(504, 'The present age of Saroj is 6 times the age of Ajay. Present age of Ajay is 20 years less than  the present age of Saroj. What is the present age of Saroj ?', '16 years', '18 years', '20 years', 'None of these', 'D', 23, 11, 7),
(505, 'The total of ages of Jay, ramesh and Sunil is 93 years. Ten years ago, the ratio of their ages was 2:3:4 . What is the present age of Sunil', '34 years', '38 years', '44 years', '52 years', 'B', 23, 11, 7),
(506, 'The ratio of present ages of two brothers is 1:2 and 5 years back, the ratio was 1:3. What will be the ratio of their ages after 5 years ?', '0.04444444444444445', '0.08541666666666665', '0.1284722222222222', '0.2125', 'D', 23, 11, 7),
(507, 'Hritik is 40 years old and rocky is 60 years old. How many years ago was the ratio of their ages 3:5 ?', '10 years', '5 years', '7 years', '9 years', 'A', 23, 11, 7),
(508, 'A man is 24 years older than his son. In two years, his age will be twice the age of his son. The present age of the son is :', '13 years', '17 years', '22 years', '7 years', 'C', 23, 11, 7),
(509, 'A is two years older than B who is twice as old as C. If the total of the ages of A, B and C be 27, then how old is B ?', '5 years', '10 years', '5 years', '3 years', 'B', 23, 11, 7),
(510, 'Ten years ago, A was half of B in age. If the ratio of their present ages is 3:4, what will be the total of their present ages ?', '25 years', '30 years', '65 years', 'None of these', 'D', 23, 11, 7),
(511, 'Ramesh present age is two-fifth of the age of his mother. After 8 years, he will be one-half of the age of his mother. How old is the mother at present?', '24 years', '36 years', '40 years', '56 years', 'C', 23, 11, 7),
(512, 'In ten years A will be twice as old as B was 10 years ago. If A is now 9 years older than B,  the present age of B is', '19 years', '39 years', '29 years', '49 years', 'B', 23, 11, 7),
(513, 'The difference between the ages of two persons is 10 years. Fifteen years ago, the elder one was as old as the younger one. The present age of the elder person is', '45 years', '25 years', ' 35 years', '55 years', 'C', 23, 11, 7),
(514, 'The sum of ages of 5 children born at the interval of 3 years each is 50 years. What is the age of the youngest child ?', '8 years', '4 years', '10 years', 'None of these', 'B', 23, 11, 7),
(515, 'The total age A and B is 12 years more than the total age of Band C. C is how many years younger than A ?', '12 years', '24 years', 'C is elder than A', 'None of these', 'A', 23, 11, 7),
(516, 'Eighteen years ago, a father was three times as old as his son. Now father is only twice as old as his son. Then the sum of the present ages of the son and the father is :', '72 years', '54 years', '108 years', '105 years', 'C', 23, 11, 7);

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
  PRIMARY KEY (`sub_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `subtopic`
--

INSERT INTO `subtopic` (`sub_id`, `subtopic`, `cat_id`, `topic_id`) VALUES
(7, 'Time And Distance', 23, 11),
(8, 'Ratio And Proportion', 24, 13);

-- --------------------------------------------------------

--
-- Table structure for table `test_category`
--

CREATE TABLE IF NOT EXISTS `test_category` (
  `tc_id` int(11) NOT NULL AUTO_INCREMENT,
  `tc_name` varchar(255) NOT NULL,
  PRIMARY KEY (`tc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `test_category`
--

INSERT INTO `test_category` (`tc_id`, `tc_name`) VALUES
(2, 'newwww');

-- --------------------------------------------------------

--
-- Table structure for table `test_heading`
--

CREATE TABLE IF NOT EXISTS `test_heading` (
  `th_id` int(11) NOT NULL AUTO_INCREMENT,
  `th_name` varchar(255) NOT NULL,
  `tc_id` int(11) NOT NULL,
  PRIMARY KEY (`th_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `test_heading`
--

INSERT INTO `test_heading` (`th_id`, `th_name`, `tc_id`) VALUES
(2, 'helloww', 0),
(3, 'hello', 2),
(4, 'hiiii', 2),
(5, 'rafii', 0);

-- --------------------------------------------------------

--
-- Table structure for table `test_name`
--

CREATE TABLE IF NOT EXISTS `test_name` (
  `tn_id` int(11) NOT NULL AUTO_INCREMENT,
  `tn_name` varchar(255) NOT NULL,
  `th_id` int(11) NOT NULL,
  `no_of_q` int(255) NOT NULL,
  `hours` int(255) NOT NULL,
  PRIMARY KEY (`tn_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `test_name`
--

INSERT INTO `test_name` (`tn_id`, `tn_name`, `th_id`, `no_of_q`, `hours`) VALUES
(1, 'test3', 3, 20, 1),
(3, 'test3', 3, 20, 1),
(4, 'test3', 3, 20, 1),
(5, 'test1', 3, 20, 3);

-- --------------------------------------------------------

--
-- Table structure for table `test_question`
--

CREATE TABLE IF NOT EXISTS `test_question` (
  `tq_id` int(11) NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `opt1` varchar(255) NOT NULL,
  `opt2` varchar(255) NOT NULL,
  `otp3` varchar(255) NOT NULL,
  `otp4` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `tn_id` int(11) NOT NULL,
  PRIMARY KEY (`tq_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE IF NOT EXISTS `topics` (
  `topic_id` int(11) NOT NULL AUTO_INCREMENT,
  `topic` varchar(255) NOT NULL,
  `cat_id` int(11) NOT NULL,
  PRIMARY KEY (`topic_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`topic_id`, `topic`, `cat_id`) VALUES
(11, 'Questions And Answer', 23),
(12, 'Basics', 23),
(13, 'Questions & Answers', 24);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `name`, `email`, `password`, `fbid`, `gmailid`, `profileImage`, `date_created`, `status`) VALUES
(1, 'Admin', 'admin@padhlepappu.com', '$2vJMIHXMBFH2', '', NULL, NULL, '2017-07-14 09:55:04', 0),
(7, 'Antriksh Chhipa', 'antrikshchhipa@gmail.com', '', '1086747071455694', NULL, NULL, '2017-07-18 16:11:54', 1),
(10, 'Antriksh chhipa', 'antrikshchhipa@yahoo.com', '$2/UbwcMXYvRg', '', NULL, NULL, '2017-07-15 05:06:38', 1),
(13, 'Akshay Chauhan', 'king.chauhan25@gmail.com', '', '', '105212023004541967958', 'https://lh3.googleusercontent.com/-VU0Vd0ex5DY/AAAAAAAAAAI/AAAAAAAAAak/6RZHE_SNR1Y/s96-c/photo.jpg', '2017-07-21 17:32:05', 1);

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
  `sub_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`video_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`video_id`, `video_name`, `youtube_id`, `cat_id`, `topic_id`, `sub_id`, `created`) VALUES
(2, 'Aptitude Video', 'PUGkUUDEd9E', 24, 13, 8, '2017-07-16 10:56:22'),
(3, 'Apty video', 'PUGkUUDEd9E', 23, 11, 7, '2017-07-16 10:59:35');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
