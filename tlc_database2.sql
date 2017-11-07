-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 07, 2017 at 02:15 PM
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
-- Database: `tlc_database2`
--

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
  `pic_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `client_address` varchar(50) NOT NULL,
  `client_contactno` varchar(50) NOT NULL,
  `client_email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `gender_id` int(11) NOT NULL,
  `client_datevisited` varchar(50) NOT NULL,
  `client_school` varchar(50) NOT NULL,
  `client_month` varchar(50) NOT NULL,
  `client_remarks` text NOT NULL,
  `client_datecreated` date NOT NULL,
  `client_of` varchar(50) NOT NULL,
  `client_birthdate` varchar(50) NOT NULL,
  `client_yeargraduated` int(11) NOT NULL,
  `client_yearapplied` int(11) NOT NULL,
  `client_lastupdated` date NOT NULL,
  `client_formno` int(11) NOT NULL,
  `client_age` int(11) NOT NULL,
  `client_course` varchar(255) NOT NULL,
  `client_referredby` varchar(255) NOT NULL,
  `client_company` varchar(255) NOT NULL,
  `j1_type` int(11) NOT NULL,
  `client_mobile` varchar(200) NOT NULL,
  `client_enrolled` varchar(255) NOT NULL,
  `client_educationalattainment` text NOT NULL,
  `deleted` int(11) NOT NULL,
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `user_id`, `cl_type_id`, `status_id`, `pic_id`, `name`, `client_address`, `client_contactno`, `client_email`, `password`, `gender_id`, `client_datevisited`, `client_school`, `client_month`, `client_remarks`, `client_datecreated`, `client_of`, `client_birthdate`, `client_yeargraduated`, `client_yearapplied`, `client_lastupdated`, `client_formno`, `client_age`, `client_course`, `client_referredby`, `client_company`, `j1_type`, `client_mobile`, `client_enrolled`, `client_educationalattainment`, `deleted`) VALUES
(3, 5, 1, 1, 1, 'j133', 'j1', 'j1', 'j1@yahoo.com', '14bd6122beda6377928efa73886dd4', 1, '2017-11-20', 'USJR', 'febuary', 'qwer', '2017-11-06', '', '2017-11-15', 2012, 1012, '0000-00-00', 234234, 23, 'BIST', '', 'friend', 0, '', '', '', 0),
(4, 6, 2, 0, 0, 'kbl', 'kbl', '234234', 'kbl@yahoo.com', '220129196adc6aac44166b28cbf1c4', 0, '2014-11-05', 'usjr', '', 'werwer', '0000-00-00', '', '2017-11-21', 0, 0, '0000-00-00', 234234, 34, 'bsit', 'wer', '', 0, '234234', '1', 'usjr', 0);

-- --------------------------------------------------------

--
-- Table structure for table `client_type`
--

DROP TABLE IF EXISTS `client_type`;
CREATE TABLE IF NOT EXISTS `client_type` (
  `cl_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `cl_type_desc` varchar(255) NOT NULL,
  PRIMARY KEY (`cl_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_type`
--

INSERT INTO `client_type` (`cl_type_id`, `cl_type_desc`) VALUES
(1, 'J-1 Cultural Exchange'),
(2, 'Korean Basic Language'),
(3, 'NCLEX');

-- --------------------------------------------------------

--
-- Table structure for table `employee_type`
--

DROP TABLE IF EXISTS `employee_type`;
CREATE TABLE IF NOT EXISTS `employee_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_type`
--

INSERT INTO `employee_type` (`id`, `type`) VALUES
(1, 'Admin'),
(2, 'Nursing'),
(3, 'J1'),
(4, 'KBL');

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

DROP TABLE IF EXISTS `gender`;
CREATE TABLE IF NOT EXISTS `gender` (
  `gender_id` int(11) NOT NULL AUTO_INCREMENT,
  `gender` varchar(50) NOT NULL,
  PRIMARY KEY (`gender_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`gender_id`, `gender`) VALUES
(1, 'Male'),
(2, 'Female');

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
-- Table structure for table `pictures`
--

DROP TABLE IF EXISTS `pictures`;
CREATE TABLE IF NOT EXISTS `pictures` (
  `pic_id` int(11) NOT NULL AUTO_INCREMENT,
  `pic_path` text NOT NULL,
  `client_id` int(11) NOT NULL,
  PRIMARY KEY (`pic_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pictures`
--

INSERT INTO `pictures` (`pic_id`, `pic_path`, `client_id`) VALUES
(1, '', 1),
(2, '', 1),
(3, '', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `privmsgs`
--

INSERT INTO `privmsgs` (`privmsg_id`, `privmsg_author`, `from_name`, `privmsg_date`, `privmsg_subject`, `privmsg_body`, `privmsg_notify`, `sent`, `privmsg_deleted`, `privmsg_ddate`) VALUES
(4, 1, 'Benjie Caranoo', '2017-11-06 12:20:13', 'tet', 'weqr', 1, 'read', NULL, '2017-11-06 20:20:13'),
(5, 1, 'Benjie Caranoo', '2017-11-06 12:22:41', 'qwr', 'wqer', 1, 'read', NULL, '2017-11-06 20:22:41'),
(20, 5, 'J1 J1', '2017-11-06 12:42:01', 'tet', 'testing', 1, 'read', NULL, '2017-11-06 20:42:01'),
(21, 1, 'Benjie Caranoo', '2017-11-06 12:42:34', 'tet', 'qwerqwer', 1, 'read', NULL, '2017-11-06 20:42:34');

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `privmsgs_to`
--

INSERT INTO `privmsgs_to` (`pmto_id`, `pmto_message`, `pmto_recipient`, `pmto_read`, `pmto_rdate`, `pmto_deleted`, `pmto_ddate`, `pmto_allownotify`) VALUES
(7, 4, 5, 1, '2017-11-06 12:41:57', NULL, NULL, NULL),
(10, 20, 1, 1, '2017-11-06 12:42:32', NULL, NULL, NULL),
(11, 21, 5, 1, '2017-11-06 13:01:22', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
CREATE TABLE IF NOT EXISTS `status` (
  `status_id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `status`) VALUES
(1, 'Inquire'),
(2, 'Sign Up'),
(3, 'Cancelled'),
(4, 'Departed');

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
  `user_datecreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_updateddate` timestamp NOT NULL,
  `flag` int(10) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_fname`, `user_lname`, `user_mname`, `user_username`, `user_password`, `user_email`, `user_rights`, `user_datecreated`, `user_updateddate`, `flag`) VALUES
(1, 'Benjie', 'Caranoo', 'Gonzaga', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'caranoobenjie@gmail.com', 'Admin', '2017-10-16 16:00:00', '2017-10-16 16:00:00', 0),
(4, 'Nursing', 'Nursing', 'Nursing', 'Nursing', 'c1311fa3447790f02b8e9181846c2205', 'Nursing@yahoo.com', 'Nursing', '2017-11-05 07:05:10', '2017-11-04 23:10:23', 0),
(5, 'J1', 'J1', 'J1', 'J1', '49b5926251bfc0e5166a1c407ccd1050', 'J1@gmail.com', 'J1', '2017-11-06 09:53:28', '0000-00-00 00:00:00', 0),
(6, 'kbl', 'kbl', 'kbl', 'kbl', 'fa623b24a9f8d07c9c21652d3db0e569', 'kbl', 'KBL', '2017-11-06 09:53:56', '0000-00-00 00:00:00', 0),
(7, 'Nursing1', 'Nursing1', 'Nursing1', 'Nursing1', 'aa91b896dfd9b371622c5d8bbc4ecdcb', 'Nursing1@gmail.com', 'Nursing', '2017-11-06 11:16:00', '0000-00-00 00:00:00', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
