-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 22, 2017 at 09:07 AM
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
  `folder_id` int(11) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`basics_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `basics`
--

INSERT INTO `basics` (`basics_id`, `heading`, `pdf`, `cat_id`, `topic_id`, `folder_id`, `created`) VALUES
(2, 'english', 'english7.pdf', 23, 12, 7, '2017-07-22 11:30:47'),
(3, 'heading here', 'heading here.pdf', 23, 24, 0, '2017-09-22 05:48:33');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `folder`
--

INSERT INTO `folder` (`f_id`, `f_name`, `cat_id`, `topic_id`, `type`) VALUES
(15, 'maths sub-category topic', 23, 19, 'Question'),
(16, 'folder secound', 23, 20, 'Question'),
(17, 'videos', 23, 20, 'Video');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=623 ;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`qid`, `question`, `opt1`, `opt2`, `opt3`, `opt4`, `answer`, `cat_id`, `topic_id`, `folder_id`, `sub_id`) VALUES
(573, '&quot;Sunil is younger than ravi by 4 years. If their ages are in the respective ratio of 7:9', ' how old is sunil ?&quot;', '&quot;14 years&quot;', '&quot;17 years&quot;', '&quot;21 years&quot;', '&quot;None of these&quot;', 23, 19, 15, 15),
(574, '&quot;The ratio betwwen the present ages of S and T is 6:7. If T is 4 years old than S', ' what will be the ratio of the ages of S and T after 4 years ?&quot;', '&quot;0.1277777777777778&quot;', '&quot;0.1284722222222222&quot;', '&quot;0.16875&quot;', '&quot;None of these&quot;', 23, 19, 15, 15),
(575, '&quot;Present ages of P and Q are in the ratio 5:6 respectively. Seven years hence this ratio will become 6:7 respectively. What is P&#039;s present age in years ?&quot;', '&quot;42&quot;', '&quot;49&quot;', '&quot;32&quot;', '&quot;25&quot;', '&quot;C&quot;', 23, 19, 15, 15),
(576, '&quot;At present', ' the ratio between the ages of aman and david is 4:3 . After 6 years', ' aman&#039;s age will be 26 years. What is the age of david ?&quot;', '&quot;12 years&quot;', '&quot;21 years&quot;', '&quot;15 years&quot;', 23, 19, 15, 15),
(577, '&quot;The ratio between the present ages of A and B is 5:7 respectively. If the difference between B&#039;s present age and A&#039;s age after 6 years is 2', ' what is the total of A&#039;s and B&#039;s  present ages ?&quot;', '&quot;52 years&quot;', '&quot;63 years&quot;', '&quot;44 years&quot;', '&quot;48 years&quot;', 23, 19, 15, 15),
(578, '&quot;Ramesh was asked to tell his age in years. His reply was', ' &quot;&quot;Take my age three years', ' multiply it  by 3  and then substract three times my age three years ago and you will know how old I am&quot;&quot; What was the age of the person ?&quot;', '&quot; 20 years&quot;', '&quot;16 years&quot;', '&quot;24 years&quot;', 23, 19, 15, 15),
(579, '&quot;Age of a man is three times the age of his son. After 10 years', ' the age of the man would become two times the age of his son. What is the present age of man /&quot;', '&quot;64 years&quot;', '&quot;52 years&quot;', '&quot;30 years&quot;', '&quot;48 years&quot;', 23, 19, 15, 15),
(580, '&quot;The total of  present ages of Ram', ' Shyam and Ajay is 72 years. Total of present ages of Ram and Shyam is 42 years. What is the present age of Ajay ?&quot;', '&quot;30 years&quot;', '&quot;24 years&quot;', '&quot;36 years&quot;', '&quot;18 years&quot;', 23, 19, 15, 15),
(581, '&quot;The present age of Saroj is 6 times the age of Ajay. Present age of Ajay is 20 years less than  the present age of Saroj. What is the present age of Saroj ?&quot;', '&quot;16 years&quot;', '&quot;18 years&quot;', '&quot;20 years&quot;', '&quot;None of these&quot;', '&quot;D&quot;', 23, 19, 15, 15),
(582, '&quot;Six years ago', ' the ratio of the ages of Kamal And Sagar was 6:5. Four years hence', 'the ratio of their ages will be 11:10. What is Sagar&#039;s age at present ?&quot;', '&quot;12 years&quot;', '&quot;18 years&quot;', '&quot;16 years&quot;', 23, 19, 15, 15),
(583, '&quot;The total of ages of Jay', ' ramesh and Sunil is 93 years. Ten years ago', ' the ratio of their ages was 2:3:4 . What is the present age of Sunil&quot;', '&quot;34 years&quot;', '&quot;38 years&quot;', '&quot;44 years&quot;', 23, 19, 15, 15),
(584, '&quot;The ratio of present ages of two brothers is 1:2 and 5 years back', ' the ratio was 1:3. What will be the ratio of their ages after 5 years ?&quot;', '&quot;0.04444444444444445&quot;', '&quot;0.08541666666666665&quot;', '&quot;0.1284722222222222&quot;', '&quot;0.2125&quot;', 23, 19, 15, 15),
(585, '&quot;Hritik is 40 years old and rocky is 60 years old. How many years ago was the ratio of their ages 3:5 ?&quot;', '&quot;10 years&quot;', '&quot;5 years&quot;', '&quot;7 years&quot;', '&quot;9 years&quot;', '&quot;A&quot;', 23, 19, 15, 15),
(586, '&quot;A man is 24 years older than his son. In two years', ' his age will be twice the age of his son. The present age of the son is :&quot;', '&quot;13 years&quot;', '&quot;17 years&quot;', '&quot;22 years&quot;', '&quot;7 years&quot;', 23, 19, 15, 15),
(587, '&quot;A is two years older than B who is twice as old as C. If the total of the ages of A', ' B and C be 27', ' then how old is B ?&quot;', '&quot;5 years&quot;', '&quot;10 years&quot;', '&quot;5 years&quot;', 23, 19, 15, 15),
(588, '&quot;Ten years ago', ' A was half of B in age. If the ratio of their present ages is 3:4', ' what will be the total of their present ages ?&quot;', '&quot;25 years&quot;', '&quot;30 years&quot;', '&quot;65 years&quot;', 23, 19, 15, 15),
(589, '&quot;The ratio between the present ages of A and B is 5:3 respectively. The ratio betweenA&#039;s age 4 years ago and B&#039;s age 4 years hence is 1:1. What is the ratio between A&#039;sage 4 years ago and B&#039;s age 4 years ago ?&quot;', '&quot;0.08402777777777777&quot;', '&quot;0.1256944444444444&quot;', '&quot;0.2111111111111111&quot;', '&quot;0.1277777777777778&quot;', '&quot;B&quot;', 23, 19, 15, 15),
(590, '&quot;Asha&#039;s father was 38 years of age when she was born while her mother was 36 years old when her brother four years younger to her was born. What is the difference between the ages of her parents?&quot;', '&quot;6 years&quot;', '&quot;4 years&quot;', '&quot;8 years&quot;', '&quot;16 years&quot;', '&quot;A&quot;', 23, 19, 15, 15),
(591, '&quot;Ramesh present age is two-fifth of the age of his mother. After 8 years', ' he will be one-half of the age of his mother. How old is the mother at present?&quot;', '&quot;24 years&quot;', '&quot;36 years&quot;', '&quot;40 years&quot;', '&quot;56 years&quot;', 23, 19, 15, 15),
(592, '&quot;In ten years A will be twice as old as B was 10 years ago. If A is now 9 years older than B', '  the present age of B is&quot;', '&quot;19 years&quot;', '&quot;39 years&quot;', '&quot;29 years&quot;', '&quot;49 years&quot;', 23, 19, 15, 15),
(593, '&quot;The difference between the ages of two persons is 10 years. Fifteen years ago', ' the elder one was as old as the younger one. The present age of the elder person is&quot;', '&quot;45 years&quot;', '&quot;25 years&quot;', '&quot; 35 years&quot;', '&quot;55 years&quot;', 23, 19, 15, 15),
(594, '&quot;The father is aged three times ore than his son ravi. After 8 years', ' he would be two and a half times of ravi&#039;s age. After further 8 years', ' how many times would he be of ravi&#039;s age ?&quot;', '&quot;2 times&quot;', '&quot;2.5 times&quot;', '&quot;2.75 times &quot;', 23, 19, 15, 15),
(595, '&quot;The sum of ages of 5 children born at the interval of 3 years each is 50 years. What is the age of the youngest child ?&quot;', '&quot;8 years&quot;', '&quot;4 years&quot;', '&quot;10 years&quot;', '&quot;None of these&quot;', '&quot;B&quot;', 23, 19, 15, 15),
(596, '&quot;The total age A and B is 12 years more than the total age of Band C. C is how many years younger than A ?&quot;', '&quot;12 years&quot;', '&quot;24 years&quot;', '&quot;C is elder than A&quot;', '&quot;None of these&quot;', '&quot;A&quot;', 23, 19, 15, 15),
(597, '&quot;Eighteen years ago', ' a father was three times as old as his son. Now father is only twice as old as his son. Then the sum of the present ages of the son and the father is :&quot;', '&quot;72 years&quot;', '&quot;54 years&quot;', '&quot;108 years&quot;', '&quot;105 years&quot;', 23, 19, 15, 15),
(598, '&quot;Sunil is younger than ravi by 4 years. If their ages are in the respective ratio of 7:9', ' how old is sunil ?&quot;', '&quot;14 years&quot;', '&quot;17 years&quot;', '&quot;21 years&quot;', '&quot;None of these&quot;', 23, 20, 16, 17),
(599, '&quot;The ratio betwwen the present ages of S and T is 6:7. If T is 4 years old than S', ' what will be the ratio of the ages of S and T after 4 years ?&quot;', '&quot;0.1277777777777778&quot;', '&quot;0.1284722222222222&quot;', '&quot;0.16875&quot;', '&quot;None of these&quot;', 23, 20, 16, 17),
(600, '&quot;Present ages of P and Q are in the ratio 5:6 respectively. Seven years hence this ratio will become 6:7 respectively. What is P&#039;s present age in years ?&quot;', '&quot;42&quot;', '&quot;49&quot;', '&quot;32&quot;', '&quot;25&quot;', '&quot;C&quot;', 23, 20, 16, 17),
(601, '&quot;At present', ' the ratio between the ages of aman and david is 4:3 . After 6 years', ' aman&#039;s age will be 26 years. What is the age of david ?&quot;', '&quot;12 years&quot;', '&quot;21 years&quot;', '&quot;15 years&quot;', 23, 20, 16, 17),
(602, '&quot;The ratio between the present ages of A and B is 5:7 respectively. If the difference between B&#039;s present age and A&#039;s age after 6 years is 2', ' what is the total of A&#039;s and B&#039;s  present ages ?&quot;', '&quot;52 years&quot;', '&quot;63 years&quot;', '&quot;44 years&quot;', '&quot;48 years&quot;', 23, 20, 16, 17),
(603, '&quot;Ramesh was asked to tell his age in years. His reply was', ' &quot;&quot;Take my age three years', ' multiply it  by 3  and then substract three times my age three years ago and you will know how old I am&quot;&quot; What was the age of the person ?&quot;', '&quot; 20 years&quot;', '&quot;16 years&quot;', '&quot;24 years&quot;', 23, 20, 16, 17),
(604, '&quot;Age of a man is three times the age of his son. After 10 years', ' the age of the man would become two times the age of his son. What is the present age of man /&quot;', '&quot;64 years&quot;', '&quot;52 years&quot;', '&quot;30 years&quot;', '&quot;48 years&quot;', 23, 20, 16, 17),
(605, '&quot;The total of  present ages of Ram', ' Shyam and Ajay is 72 years. Total of present ages of Ram and Shyam is 42 years. What is the present age of Ajay ?&quot;', '&quot;30 years&quot;', '&quot;24 years&quot;', '&quot;36 years&quot;', '&quot;18 years&quot;', 23, 20, 16, 17),
(606, '&quot;The present age of Saroj is 6 times the age of Ajay. Present age of Ajay is 20 years less than  the present age of Saroj. What is the present age of Saroj ?&quot;', '&quot;16 years&quot;', '&quot;18 years&quot;', '&quot;20 years&quot;', '&quot;None of these&quot;', '&quot;D&quot;', 23, 20, 16, 17),
(607, '&quot;Six years ago', ' the ratio of the ages of Kamal And Sagar was 6:5. Four years hence', 'the ratio of their ages will be 11:10. What is Sagar&#039;s age at present ?&quot;', '&quot;12 years&quot;', '&quot;18 years&quot;', '&quot;16 years&quot;', 23, 20, 16, 17),
(608, '&quot;The total of ages of Jay', ' ramesh and Sunil is 93 years. Ten years ago', ' the ratio of their ages was 2:3:4 . What is the present age of Sunil&quot;', '&quot;34 years&quot;', '&quot;38 years&quot;', '&quot;44 years&quot;', 23, 20, 16, 17),
(609, '&quot;The ratio of present ages of two brothers is 1:2 and 5 years back', ' the ratio was 1:3. What will be the ratio of their ages after 5 years ?&quot;', '&quot;0.04444444444444445&quot;', '&quot;0.08541666666666665&quot;', '&quot;0.1284722222222222&quot;', '&quot;0.2125&quot;', 23, 20, 16, 17),
(610, '&quot;Hritik is 40 years old and rocky is 60 years old. How many years ago was the ratio of their ages 3:5 ?&quot;', '&quot;10 years&quot;', '&quot;5 years&quot;', '&quot;7 years&quot;', '&quot;9 years&quot;', '&quot;A&quot;', 23, 20, 16, 17),
(611, '&quot;A man is 24 years older than his son. In two years', ' his age will be twice the age of his son. The present age of the son is :&quot;', '&quot;13 years&quot;', '&quot;17 years&quot;', '&quot;22 years&quot;', '&quot;7 years&quot;', 23, 20, 16, 17),
(612, '&quot;A is two years older than B who is twice as old as C. If the total of the ages of A', ' B and C be 27', ' then how old is B ?&quot;', '&quot;5 years&quot;', '&quot;10 years&quot;', '&quot;5 years&quot;', 23, 20, 16, 17),
(613, '&quot;Ten years ago', ' A was half of B in age. If the ratio of their present ages is 3:4', ' what will be the total of their present ages ?&quot;', '&quot;25 years&quot;', '&quot;30 years&quot;', '&quot;65 years&quot;', 23, 20, 16, 17),
(614, '&quot;The ratio between the present ages of A and B is 5:3 respectively. The ratio betweenA&#039;s age 4 years ago and B&#039;s age 4 years hence is 1:1. What is the ratio between A&#039;sage 4 years ago and B&#039;s age 4 years ago ?&quot;', '&quot;0.08402777777777777&quot;', '&quot;0.1256944444444444&quot;', '&quot;0.2111111111111111&quot;', '&quot;0.1277777777777778&quot;', '&quot;B&quot;', 23, 20, 16, 17),
(615, '&quot;Asha&#039;s father was 38 years of age when she was born while her mother was 36 years old when her brother four years younger to her was born. What is the difference between the ages of her parents?&quot;', '&quot;6 years&quot;', '&quot;4 years&quot;', '&quot;8 years&quot;', '&quot;16 years&quot;', '&quot;A&quot;', 23, 20, 16, 17),
(616, '&quot;Ramesh present age is two-fifth of the age of his mother. After 8 years', ' he will be one-half of the age of his mother. How old is the mother at present?&quot;', '&quot;24 years&quot;', '&quot;36 years&quot;', '&quot;40 years&quot;', '&quot;56 years&quot;', 23, 20, 16, 17),
(617, '&quot;In ten years A will be twice as old as B was 10 years ago. If A is now 9 years older than B', '  the present age of B is&quot;', '&quot;19 years&quot;', '&quot;39 years&quot;', '&quot;29 years&quot;', '&quot;49 years&quot;', 23, 20, 16, 17),
(618, '&quot;The difference between the ages of two persons is 10 years. Fifteen years ago', ' the elder one was as old as the younger one. The present age of the elder person is&quot;', '&quot;45 years&quot;', '&quot;25 years&quot;', '&quot; 35 years&quot;', '&quot;55 years&quot;', 23, 20, 16, 17),
(619, '&quot;The father is aged three times ore than his son ravi. After 8 years', ' he would be two and a half times of ravi&#039;s age. After further 8 years', ' how many times would he be of ravi&#039;s age ?&quot;', '&quot;2 times&quot;', '&quot;2.5 times&quot;', '&quot;2.75 times &quot;', 23, 20, 16, 17),
(620, '&quot;The sum of ages of 5 children born at the interval of 3 years each is 50 years. What is the age of the youngest child ?&quot;', '&quot;8 years&quot;', '&quot;4 years&quot;', '&quot;10 years&quot;', '&quot;None of these&quot;', '&quot;B&quot;', 23, 20, 16, 17),
(621, '&quot;The total age A and B is 12 years more than the total age of Band C. C is how many years younger than A ?&quot;', '&quot;12 years&quot;', '&quot;24 years&quot;', '&quot;C is elder than A&quot;', '&quot;None of these&quot;', '&quot;A&quot;', 23, 20, 16, 17),
(622, '&quot;Eighteen years ago', ' a father was three times as old as his son. Now father is only twice as old as his son. Then the sum of the present ages of the son and the father is :&quot;', '&quot;72 years&quot;', '&quot;54 years&quot;', '&quot;108 years&quot;', '&quot;105 years&quot;', 23, 20, 16, 17);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `subtopic`
--

INSERT INTO `subtopic` (`sub_id`, `subtopic`, `cat_id`, `topic_id`, `folder_id`) VALUES
(15, 'Maths Maths-sub Category Topic Subtopic', 23, 19, 15),
(16, 'Folder Question Topic Of Maths', 23, 21, 0),
(17, '1', 23, 20, 16);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`topic_id`, `topic`, `cat_id`, `type`) VALUES
(19, 'Maths Sub-category', 23, 'Folder'),
(20, 'Secound', 23, 'Folder'),
(21, 'maths folder topic', 23, 'Question'),
(23, 'New VIDEO TOPIC', 23, 'Video'),
(24, 'basic type topc', 23, 'Basics');

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
  `folder_id` int(11) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`video_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`video_id`, `video_name`, `youtube_id`, `cat_id`, `topic_id`, `folder_id`, `created`) VALUES
(5, '', 'IVMvq9rd8dA', 23, 20, 17, '2017-09-22 05:23:31');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
