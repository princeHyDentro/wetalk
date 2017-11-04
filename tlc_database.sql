-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 04, 2017 at 03:35 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tlc_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `author` varchar(255) NOT NULL,
  `rating` int(11) NOT NULL,
  `publisher` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`ID`, `name`, `price`, `author`, `rating`, `publisher`) VALUES
(1, 'Harry Potter And The Order Of The Phoenix', '10.99', 'J.K. Rowling', 9, 'Bloomsbury'),
(2, 'Harry Potter And The Goblet Of Fire', '6.99', 'J.K Rowling', 8, 'Bloomsbury'),
(3, 'Lord Of The Rings: The Fellowship Of The Ring', '8.99', 'J. R. R. Tolkien', 8, 'George Allen & Unwin'),
(4, 'Lord Of The Rings: The Two Towers', '4.55', 'J. R. R. Tolkien', 8, 'George Allen & Unwin'),
(5, 'Lord Of The Rings: The Return Of The King', '7.99', 'J. R. R. Tolkien', 9, 'George Allen & Unwin'),
(6, 'End of Watch: A Novel', '5.00', 'Stephen King', 7, 'Scribner'),
(7, 'Truly Madly Guilty', '4.55', 'Liane Moriarty', 6, 'Flatiron Books'),
(8, 'All There Was', '3.99', 'John Davidson', 3, 'Newton'),
(9, 'Mystery In The Eye', '8.44', 'E.L. Joseph', 8, 'Red Books'),
(10, 'Neo Lights', '12.99', 'George Nord', 8, 'Heltower'),
(11, 'Universe: History', '13.99', 'Albert Shoon', 4, 'Easy Books'),
(12, 'Green Earth', '7.99', 'Ashleigh Turner', 4, 'Yellowhouse'),
(13, 'Music Of The Ages', '3.83', 'James King', 3, 'Universe Co'),
(14, 'Ancient Tea', '3.99', 'Jess Red', 8, 'Yellowhouse');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `client_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `cl_type_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `pic_id` int(11) NOT NULL,
  `client_fname` varchar(50) NOT NULL,
  `client_mname` varchar(50) NOT NULL,
  `client_lname` varchar(50) NOT NULL,
  `client_address` varchar(50) NOT NULL,
  `client_contactno` varchar(50) NOT NULL,
  `client_email` varchar(50) NOT NULL,
  `gender_id` int(11) NOT NULL,
  `client_datevisited` date NOT NULL,
  `clint_school` varchar(50) NOT NULL,
  `client_month` varchar(50) NOT NULL,
  `client_remarks` text NOT NULL,
  `client_datecreated` date NOT NULL,
  `client_of` varchar(50) NOT NULL,
  `client_birthdate` varchar(50) NOT NULL,
  `client_yeargraduated` int(11) NOT NULL,
  `client_yearapplied` int(11) NOT NULL,
  `client_lastupdated` date NOT NULL,
  `client_wheredidyoufinds` text NOT NULL,
  PRIMARY KEY (`client_id`),
  KEY `user_id` (`user_id`),
  KEY `cl_type_id` (`cl_type_id`),
  KEY `status_id` (`status_id`),
  KEY `course_id` (`course_id`),
  KEY `pic_id` (`pic_id`),
  KEY `gender_id` (`gender_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `client_type`
--

DROP TABLE IF EXISTS `client_type`;
CREATE TABLE IF NOT EXISTS `client_type` (
  `cl_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `cl_type_desc` varchar(255) NOT NULL,
  PRIMARY KEY (`cl_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE IF NOT EXISTS `course` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `course` varchar(50) NOT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

DROP TABLE IF EXISTS `gender`;
CREATE TABLE IF NOT EXISTS `gender` (
  `gender_id` int(11) NOT NULL AUTO_INCREMENT,
  `gender` varchar(50) NOT NULL,
  PRIMARY KEY (`gender_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kbl`
--

DROP TABLE IF EXISTS `kbl`;
CREATE TABLE IF NOT EXISTS `kbl` (
  `kbl_id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `kbl_phone_no` varchar(50) NOT NULL,
  `kbl_age` int(11) NOT NULL,
  `kbl_educationalattainment` text NOT NULL,
  `kbl_purposeenrollment` text NOT NULL,
  `kbl_referrals` int(11) NOT NULL,
  PRIMARY KEY (`kbl_id`),
  KEY `client_id` (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `persons`
--

DROP TABLE IF EXISTS `persons`;
CREATE TABLE IF NOT EXISTS `persons` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `firstName` varchar(100) DEFAULT NULL,
  `lastName` varchar(100) DEFAULT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `persons`
--

INSERT INTO `persons` (`id`, `firstName`, `lastName`, `gender`, `address`, `dob`) VALUES
(1, 'Airi', 'Satou', 'female', 'Tokyo', '1964-03-04'),
(4, 'Tatyana', 'Fitzpatrick', 'male', 'London', '1989-01-01'),
(5, 'Quinn', 'Flynn', 'male', 'Edinburgh', '1977-03-24');

-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

DROP TABLE IF EXISTS `pictures`;
CREATE TABLE IF NOT EXISTS `pictures` (
  `pic_id` int(11) NOT NULL AUTO_INCREMENT,
  `pic_name` varchar(50) NOT NULL,
  `pic_type` varchar(50) NOT NULL,
  PRIMARY KEY (`pic_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `privmsgs`
--

DROP TABLE IF EXISTS `privmsgs`;
CREATE TABLE IF NOT EXISTS `privmsgs` (
  `privmsg_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `privmsg_author` bigint(20) NOT NULL,
  `from_name` varchar(50) NOT NULL,
  `privmsg_date` varchar(20) NOT NULL,
  `privmsg_subject` varchar(1024) NOT NULL,
  `privmsg_body` varchar(60000) NOT NULL,
  `privmsg_notify` tinyint(1) DEFAULT NULL,
  `sent` varchar(10) NOT NULL DEFAULT 'read',
  `privmsg_deleted` tinyint(1) DEFAULT NULL,
  `privmsg_ddate` datetime DEFAULT CURRENT_TIMESTAMP,
  UNIQUE KEY `privmsg_id` (`privmsg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `privmsgs`
--

INSERT INTO `privmsgs` (`privmsg_id`, `privmsg_author`, `from_name`, `privmsg_date`, `privmsg_subject`, `privmsg_body`, `privmsg_notify`, `sent`, `privmsg_deleted`, `privmsg_ddate`) VALUES
(87, 1, 'Benjie Caranoo', '2017-10-30 10:24:47', 'test', 'test', 1, 'read', NULL, '2017-10-30 18:24:47'),
(88, 2, 'Nursing Nursing', '2017-10-30 10:25:36', 'test', 'rwerwer', 1, 'read', NULL, '2017-10-30 18:25:36'),
(89, 1, 'Benjie Caranoo', '2017-10-30 10:45:14', 'test', 'qwer', 1, 'read', NULL, '2017-10-30 18:45:14'),
(90, 2, 'Nursing Nursing', '2017-10-30 10:45:27', 'test', 'qwe', 1, 'read', NULL, '2017-10-30 18:45:27');

-- --------------------------------------------------------

--
-- Table structure for table `privmsgs_to`
--

DROP TABLE IF EXISTS `privmsgs_to`;
CREATE TABLE IF NOT EXISTS `privmsgs_to` (
  `pmto_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `pmto_message` bigint(20) NOT NULL,
  `pmto_recipient` bigint(20) NOT NULL,
  `pmto_read` int(1) DEFAULT NULL,
  `pmto_rdate` text,
  `pmto_deleted` tinyint(1) DEFAULT NULL,
  `pmto_ddate` varchar(20) DEFAULT NULL,
  `pmto_allownotify` tinyint(1) DEFAULT NULL,
  UNIQUE KEY `pmto_id` (`pmto_id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `privmsgs_to`
--

INSERT INTO `privmsgs_to` (`pmto_id`, `pmto_message`, `pmto_recipient`, `pmto_read`, `pmto_rdate`, `pmto_deleted`, `pmto_ddate`, `pmto_allownotify`) VALUES
(51, 87, 2, 1, '2017-10-30 10:27:58', NULL, NULL, NULL),
(52, 88, 1, 1, '2017-10-30 10:45:12', NULL, NULL, NULL),
(53, 89, 2, 1, '2017-10-30 10:45:25', NULL, NULL, NULL),
(54, 90, 1, 1, '2017-10-30 11:11:14', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
CREATE TABLE IF NOT EXISTS `status` (
  `status_id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_fname` varchar(50) NOT NULL,
  `user_lname` varchar(30) NOT NULL,
  `user_mname` varchar(50) NOT NULL,
  `user_username` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_rights` text NOT NULL,
  `user_datecreated` date NOT NULL,
  `user_updateddate` date NOT NULL,
  `flag` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_fname`, `user_lname`, `user_mname`, `user_username`, `user_password`, `user_email`, `user_rights`, `user_datecreated`, `user_updateddate`, `flag`) VALUES
(1, 'Benjie', 'Caranoo', 'Gonzaga', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'caranoobenjie@gmail.com', 'Admin', '2017-10-17', '2017-10-17', 0),
(2, 'Nursing', 'Nursing', 'Nursing', 'Nursing', 'c1311fa3447790f02b8e9181846c2205', 'Nursing@gmail.com', 'Nursing', '0000-00-00', '0000-00-00', 0),
(3, 'J1.username', 'J1.usernameL', 'J1.usernameM', 'J1.usernameU', 'fb18af7a9b76c2c51d51fd5ab33c26dc', 'J1.username@yahoo.com', 'J1', '0000-00-00', '0000-00-00', 0),
(4, 'KBL', 'KBL', 'KBL', 'KBL', 'fa623b24a9f8d07c9c21652d3db0e569', 'KBL@yahoo.com', 'KBL', '0000-00-00', '0000-00-00', 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `client_ibfk_2` FOREIGN KEY (`cl_type_id`) REFERENCES `client_type` (`cl_type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `client_ibfk_3` FOREIGN KEY (`pic_id`) REFERENCES `pictures` (`pic_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `client_ibfk_4` FOREIGN KEY (`gender_id`) REFERENCES `gender` (`gender_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `client_ibfk_5` FOREIGN KEY (`status_id`) REFERENCES `status` (`status_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `client_ibfk_6` FOREIGN KEY (`client_id`) REFERENCES `kbl` (`client_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `client` (`course_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
