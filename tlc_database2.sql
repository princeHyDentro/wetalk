-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2017 at 03:06 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.0.24

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

CREATE TABLE `client` (
  `client_id` int(11) NOT NULL,
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
  `j1_type` varchar(50) NOT NULL,
  `client_mobile` varchar(200) NOT NULL,
  `client_enrolled` varchar(255) NOT NULL,
  `client_educationalattainment` text NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `user_id`, `cl_type_id`, `status_id`, `pic_id`, `name`, `client_address`, `client_contactno`, `client_email`, `password`, `gender_id`, `client_datevisited`, `client_school`, `client_month`, `client_remarks`, `client_datecreated`, `client_of`, `client_birthdate`, `client_yeargraduated`, `client_yearapplied`, `client_lastupdated`, `client_formno`, `client_age`, `client_course`, `client_referredby`, `client_company`, `j1_type`, `client_mobile`, `client_enrolled`, `client_educationalattainment`, `deleted`) VALUES
(1, 1, 1, 3, 1, 'sample 1223', 'gvghvggg', '455', 'sample', 'a09c25e8b7c86eb1a961616f5709ef', 1, '2017-11-14', '', 'november', 'asdsdasd', '2017-11-08', '', '2017-11-14', 345, 78, '0000-00-00', 1, 67, 'hjkh', 'afsdsfsdf', '', '0', '', '', '', 0),
(2, 1, 1, 1, 1, ' jhbjhb', 'hvbjhbhbh', '678', 'fcfgvg', '35f9739a17ae5cfcb49dc7894091f9', 2, '2017-11-14', 'fgcgcvj', 'january', 'vhbhkl', '2017-11-08', '', '2017-11-14', 56, 667, '0000-00-00', 222, 56, 'hvkhgv', '', 'friend', '0', '', '', '', 0),
(3, 1, 2, 0, 0, 'testing 333', 'ghghigb', '77', 'ygvgiu', '8d5e5d9efd844d7bb80704684cf06b', 2, '78', 'hvhjkb', '', 'jhljl', '2017-11-08', '', '2017-11-07', 0, 0, '0000-00-00', 990, 34, 'hbkh', 'cfc', '', '0', '233', 'cancelled', 'gygvg', 0),
(4, 1, 3, 1, 1, 'hbjhb', 'hbhb', '67', 'hbhb', 'c994657946e1e8e8b96bbe85f61b44', 1, '2017-11-29', 'dfssdfsdfs', 'Select', 'gvjvvjg', '2017-11-08', '', '2017-11-23', 89, 89, '0000-00-00', 90, 78, 'bljk', '', 'Online Website', '0', '', '', '', 0),
(5, 1, 3, 1, 1, 'kkkkk', 'fgcfgfg', '344', 'fgcfgfg', '28ca1f2610d5eafeb7f12bb4664ce0', 1, '2017-11-24', 'hjhhjjh', 'march', 'vghfvgf', '2017-11-08', '', '2017-11-15', 678, 909, '0000-00-00', 1233, 12234, 'sdsd', '', 'Facebook', 'intern', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `client_type`
--

CREATE TABLE `client_type` (
  `cl_type_id` int(11) NOT NULL,
  `cl_type_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `employee_type` (
  `id` int(11) NOT NULL,
  `type` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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

CREATE TABLE `gender` (
  `gender_id` int(11) NOT NULL,
  `gender` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `kbl` (
  `kbl_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `kbl_phone_no` varchar(50) NOT NULL,
  `kbl_age` int(11) NOT NULL,
  `kbl_educationalattainment` text NOT NULL,
  `kbl_purposeenrollment` text NOT NULL,
  `kbl_referrals` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

CREATE TABLE `pictures` (
  `pic_id` int(11) NOT NULL,
  `pic_path` text NOT NULL,
  `client_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `privmsgs` (
  `privmsg_id` bigint(20) NOT NULL,
  `privmsg_author` bigint(20) NOT NULL,
  `from_name` varchar(50) NOT NULL,
  `privmsg_date` varchar(20) NOT NULL,
  `privmsg_subject` varchar(1024) NOT NULL,
  `privmsg_body` varchar(60000) NOT NULL,
  `privmsg_notify` tinyint(1) DEFAULT NULL,
  `sent` varchar(10) NOT NULL DEFAULT 'read',
  `privmsg_deleted` tinyint(1) DEFAULT NULL,
  `privmsg_ddate` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `privmsgs_to` (
  `pmto_id` bigint(20) NOT NULL,
  `pmto_message` bigint(20) NOT NULL,
  `pmto_recipient` bigint(20) NOT NULL,
  `pmto_read` int(1) DEFAULT NULL,
  `pmto_rdate` text,
  `pmto_deleted` tinyint(1) DEFAULT NULL,
  `pmto_ddate` varchar(20) DEFAULT NULL,
  `pmto_allownotify` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `status` (
  `status_id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_fname` varchar(50) NOT NULL,
  `user_lname` varchar(30) NOT NULL,
  `user_mname` varchar(50) NOT NULL,
  `user_username` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_rights` text NOT NULL,
  `user_datecreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_updateddate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `flag` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_fname`, `user_lname`, `user_mname`, `user_username`, `user_password`, `user_email`, `user_rights`, `user_datecreated`, `user_updateddate`, `flag`) VALUES
(1, 'Benjie', 'Caranoo', 'Gonzaga', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'caranoobenjie@gmail.com', 'Admin', '2017-10-16 16:00:00', '2017-10-16 16:00:00', 0),
(4, 'Nursing', 'Nursing', 'Nursing', 'Nursing', 'c1311fa3447790f02b8e9181846c2205', 'Nursing@yahoo.com', 'Nursing', '2017-11-05 07:05:10', '2017-11-04 23:10:23', 0),
(5, 'J1', 'J1', 'J1', 'J1', '49b5926251bfc0e5166a1c407ccd1050', 'J1@gmail.com', 'J1', '2017-11-06 09:53:28', '0000-00-00 00:00:00', 0),
(6, 'kbl', 'kbl', 'kbl', 'kbl', 'fa623b24a9f8d07c9c21652d3db0e569', 'kbl', 'KBL', '2017-11-06 09:53:56', '0000-00-00 00:00:00', 0),
(7, 'Nursing1', 'Nursing1', 'Nursing1', 'Nursing1', 'aa91b896dfd9b371622c5d8bbc4ecdcb', 'Nursing1@gmail.com', 'Nursing', '2017-11-06 11:16:00', '0000-00-00 00:00:00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `client_type`
--
ALTER TABLE `client_type`
  ADD PRIMARY KEY (`cl_type_id`);

--
-- Indexes for table `employee_type`
--
ALTER TABLE `employee_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`gender_id`);

--
-- Indexes for table `kbl`
--
ALTER TABLE `kbl`
  ADD PRIMARY KEY (`kbl_id`),
  ADD KEY `client_id` (`client_id`);

--
-- Indexes for table `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`pic_id`);

--
-- Indexes for table `privmsgs`
--
ALTER TABLE `privmsgs`
  ADD UNIQUE KEY `privmsg_id` (`privmsg_id`);

--
-- Indexes for table `privmsgs_to`
--
ALTER TABLE `privmsgs_to`
  ADD UNIQUE KEY `pmto_id` (`pmto_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `client_type`
--
ALTER TABLE `client_type`
  MODIFY `cl_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee_type`
--
ALTER TABLE `employee_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `gender_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kbl`
--
ALTER TABLE `kbl`
  MODIFY `kbl_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `pic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `privmsgs`
--
ALTER TABLE `privmsgs`
  MODIFY `privmsg_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `privmsgs_to`
--
ALTER TABLE `privmsgs_to`
  MODIFY `pmto_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
