-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2017 at 04:12 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `user_id`, `cl_type_id`, `status_id`, `pic_id`, `name`, `client_address`, `client_contactno`, `client_email`, `gender_id`, `client_datevisited`, `client_school`, `client_month`, `client_remarks`, `client_datecreated`, `client_of`, `client_birthdate`, `client_yeargraduated`, `client_yearapplied`, `client_lastupdated`, `client_formno`, `client_age`, `client_course`, `client_referredby`, `client_company`, `j1_type`, `client_mobile`, `client_enrolled`, `client_educationalattainment`, `deleted`) VALUES
(1, 1, 2, 3, 1, 'test 1234', 'dddd ggg', '678675', 'erre', 0, '23', 'dxgdh', 'may', 'hvgh', '2017-10-25', '', '45', 0, 90, '0000-00-00', 855, 78, 'llkj', 'hhhh', 'Facebook', 2, '5555', '3', 'test', 0),
(2, 1, 1, 1, 0, 'hjbhjhkjb ddddddddddddddd', 'ghvhgvjhg', '2', 'ghvhgvjhg', 2, '4/8/2', 'gvghv', 'july', 'gfvghk', '2017-11-02', '', '6/9/8', 0, 0, '0000-00-00', 3, 34, 'jnjn', '', 'friend', 0, '5', 'Enrolled', '', 0),
(3, 1, 2, 1, 0, 'judell', 'datae 22', '789', 'sample@yahoo.com', 0, '6', 'gvmgv', 'june', 'nccjgcjg', '0000-00-00', '', '7/4/9', 0, 0, '0000-00-00', 89, 1, 'gvmbv', 'gvkghv', '', 0, '123', '1', 'BJBMJ', 0),
(4, 1, 3, 2, 1, 'hjbkjh', 'gvjhv', '45', 'gvjhv', 1, '23', 'tfjtf', 'august', 'kgvhgv', '2017-11-02', '', '6/8/3', 12, 23, '0000-00-00', 12, 67, 'vgkvghv', '', 'friend', 0, '', '', '', 0),
(5, 1, 2, 0, 0, '', '', '', '', 0, '', '', '', '', '0000-00-00', '', '', 0, 0, '0000-00-00', 0, 0, '', '', '', 0, '', '', '', 0);

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
  `user_datecreated` date NOT NULL,
  `user_updateddate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_fname`, `user_lname`, `user_mname`, `user_username`, `user_password`, `user_email`, `user_rights`, `user_datecreated`, `user_updateddate`) VALUES
(1, 'Benjie', 'Caranoo', 'Gonzaga', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'caranoobenjie@gmail.com', 'Admin', '2017-10-17', '2017-10-17');

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
  MODIFY `privmsg_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;
--
-- AUTO_INCREMENT for table `privmsgs_to`
--
ALTER TABLE `privmsgs_to`
  MODIFY `pmto_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
