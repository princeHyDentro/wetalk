-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 30, 2018 at 06:47 AM
-- Server version: 5.7.19
-- PHP Version: 7.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tlc_wetalk_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tickets`
--

DROP TABLE IF EXISTS `admin_tickets`;
CREATE TABLE IF NOT EXISTS `admin_tickets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_id` int(11) DEFAULT NULL,
  `service_name` varchar(50) DEFAULT NULL,
  `requestor_name` varchar(50) DEFAULT NULL,
  `requestor_id` int(11) DEFAULT NULL,
  `desc` text,
  `reason` text,
  `status` enum('New','Complete') DEFAULT NULL,
  `request_for` enum('delete','update') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_tickets`
--

INSERT INTO `admin_tickets` (`id`, `service_id`, `service_name`, `requestor_name`, `requestor_id`, `desc`, `reason`, `status`, `request_for`, `created_at`, `updated_at`, `deleted_at`) VALUES
(9, 3, 'Korean Basic Language', 'Naruto  Uzomaki', 50, 'qwerqwe', 'qwerqwer', 'New', 'update', '2018-01-30 02:40:44', NULL, NULL),
(10, 2, 'NCLEX', 'Naruto  Uzomaki', 50, 'weq', 'wqerwqer', 'New', 'update', '2018-01-30 04:33:14', NULL, NULL),
(11, 2, 'NCLEX', 'Naruto  Uzomaki', 50, 'de', 'dg', 'New', 'update', '2018-01-30 05:14:17', NULL, NULL),
(12, 2, 'NCLEX', 'Naruto  Uzomaki', 50, 'weq', 'qwer', 'New', 'delete', '2018-01-30 05:16:43', NULL, NULL),
(13, 2, 'NCLEX', 'Naruto  Uzomaki', 50, 'qwer', 'qwer', 'New', 'delete', '2018-01-30 05:21:28', NULL, NULL),
(14, 2, 'NCLEX', 'Naruto  Uzomaki', 50, 'qw', 'q', 'New', 'delete', '2018-01-30 05:24:28', NULL, NULL),
(15, 2, 'NCLEX', 'Naruto  Uzomaki', 50, 'eee', 'werwer', 'New', 'delete', '2018-01-30 05:53:23', NULL, NULL),
(16, 2, 'NCLEX', 'Naruto  Uzomaki', 50, 'qwer', 'qwer', 'New', 'delete', '2018-01-30 05:56:49', NULL, NULL),
(17, 2, 'NCLEX', 'Naruto  Uzomaki', 50, 'qwer', 'qwer', 'New', 'delete', '2018-01-30 05:58:03', NULL, NULL),
(18, 2, 'NCLEX', 'Naruto  Uzomaki', 50, 'weqwe', 'qwerqwer', 'New', 'delete', '2018-01-30 05:59:08', NULL, NULL),
(19, 2, 'NCLEX', 'Naruto  Uzomaki', 50, 'qwer', 'qwerqewr', 'New', 'delete', '2018-01-30 06:00:08', NULL, NULL),
(20, 2, 'NCLEX', 'Kaede  Rukawa', 49, 'qe', 'qwerqwer', 'New', 'delete', '2018-01-30 06:19:21', NULL, NULL),
(21, 2, 'NCLEX', 'Kaede  Rukawa', 49, 'tet', 'qwerqwerqwer', 'New', 'delete', '2018-01-30 06:24:03', NULL, NULL),
(22, 2, 'NCLEX', 'Kaede  Rukawa', 49, 'qwerqwer', 'qwerwqer', 'New', 'delete', '2018-01-30 06:25:21', NULL, NULL),
(23, 2, 'NCLEX', 'Kaede  Rukawa', 49, 'qwer', 'qwerqwer', 'New', 'delete', '2018-01-30 06:26:00', NULL, NULL),
(24, 2, 'NCLEX', 'Kaede  Rukawa', 49, 'qwerw', 'qwerqwer', 'New', 'delete', '2018-01-30 06:27:11', NULL, NULL),
(25, 2, 'NCLEX', 'Kaede  Rukawa', 49, 'qwerqwe', 'qwerqwer', 'New', 'update', '2018-01-30 06:32:08', NULL, NULL),
(26, 2, 'NCLEX', 'Kaede  Rukawa', 49, 'qer', 'qwerqwer', 'New', 'delete', '2018-01-30 06:34:53', NULL, NULL),
(27, 2, 'NCLEX', 'Kaede  Rukawa', 49, 'qwer', 'qwer', 'New', 'update', '2018-01-30 06:39:46', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `applicant`
--

DROP TABLE IF EXISTS `applicant`;
CREATE TABLE IF NOT EXISTS `applicant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_id` int(11) DEFAULT NULL,
  `encoder_id` int(11) DEFAULT NULL,
  `sales_id` int(11) DEFAULT NULL,
  `sales_name` varchar(100) DEFAULT NULL,
  `encoder_name` varchar(100) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `service` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `request_admin` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicant`
--

INSERT INTO `applicant` (`id`, `service_id`, `encoder_id`, `sales_id`, `sales_name`, `encoder_name`, `name`, `contact`, `address`, `email`, `service`, `status`, `username`, `password`, `created_at`, `updated_at`, `deleted_at`, `request_admin`) VALUES
(15, 2, 50, 49, 'Kaede  Rukawa', 'Naruto  Uzomaki ', 'Benjie Caranoo', '(032)-267-3334', '236 tabada st.', 'benjie@yahoo.com', 'NCLEX', 'Inquired', 'benjie', 'f0aa89df271baedee97af2eda75afc30', '2018-01-19 07:51:07', '2018-01-30 13:02:42', NULL, NULL),
(16, 3, 50, 49, 'Kaede  Rukawa', 'Naruto  Uzomaki ', 'Testing ME', '233-234-22', 'cebu', 'testme@yahoo.com', 'Korean Basic Language', 'Enrolled', 'testme', '582b3a51289e1c7a898a18fd221d74d0', '2018-01-23 04:42:25', '2018-01-30 14:46:14', NULL, 'Request for Update Pending');

-- --------------------------------------------------------

--
-- Table structure for table `assign_staff_service`
--

DROP TABLE IF EXISTS `assign_staff_service`;
CREATE TABLE IF NOT EXISTS `assign_staff_service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `_userID` int(11) NOT NULL,
  `service_id` int(11) DEFAULT NULL,
  `admin` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assign_staff_service`
--

INSERT INTO `assign_staff_service` (`id`, `_userID`, `service_id`, `admin`, `created_at`, `deleted_at`) VALUES
(40, 51, NULL, 'all', '2018-01-19 06:24:28', NULL),
(39, 50, 3, NULL, '2018-01-19 06:22:53', NULL),
(38, 50, 2, NULL, '2018-01-19 06:22:53', NULL),
(37, 50, 1, NULL, '2018-01-19 06:22:53', NULL),
(36, 49, 3, NULL, '2018-01-19 06:21:12', NULL),
(35, 49, 2, NULL, '2018-01-19 06:21:12', NULL),
(34, 49, 1, NULL, '2018-01-19 06:21:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `encoder_assign_tickets`
--

DROP TABLE IF EXISTS `encoder_assign_tickets`;
CREATE TABLE IF NOT EXISTS `encoder_assign_tickets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sales_id` int(11) DEFAULT NULL,
  `encoder_id` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `applicant_name` varchar(100) DEFAULT NULL,
  `encoder_name` varchar(50) NOT NULL,
  `sales_name` varchar(50) NOT NULL,
  `service_name` varchar(100) NOT NULL,
  `status` enum('Pending','Complete','Ongoing') DEFAULT NULL,
  `applicant_data` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `udpated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `encoder_assign_tickets`
--

INSERT INTO `encoder_assign_tickets` (`id`, `sales_id`, `encoder_id`, `service_id`, `applicant_name`, `encoder_name`, `sales_name`, `service_name`, `status`, `applicant_data`, `created_at`, `udpated_at`, `deleted_at`) VALUES
(39, 49, 50, 3, 'Tesing lang', 'Naruto  Uzomaki ', 'Kaede  Rukawa', 'Korean Basic Language', 'Complete', '<table class=\"striped\" style=\"height: 161px;\" width=\"658\">\n<thead>\n<tr>\n<th style=\"width: 173px;\" colspan=\"5\" data-field=\"id\">Applicant Information</th>\n</tr>\n</thead>\n<tbody>\n<tr>\n<td style=\"width: 173px;\"><strong>Name</strong></td>\n<td style=\"width: 239px;\" colspan=\"3\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 173px;\"><strong>Current Address</strong></td>\n<td style=\"width: 239px;\" colspan=\"3\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 173px;\"><strong>Date of Birth</strong></td>\n<td style=\"width: 239px;\" colspan=\"3\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 173px;\"><strong>Email Address</strong></td>\n<td style=\"width: 239px;\" colspan=\"3\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 173px;\"><strong>Contact No.</strong></td>\n<td style=\"width: 239px;\" colspan=\"3\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 173px;\"><strong>Status</strong></td>\n<td style=\"width: 239px;\" colspan=\"3\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 173px;\"><strong>Username</strong></td>\n<td style=\"width: 239px;\" colspan=\"3\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 173px;\"><strong>Password</strong></td>\n<td style=\"width: 239px;\" colspan=\"3\">&nbsp;</td>\n</tr>\n</tbody>\n</table>', '2018-01-19 08:06:58', NULL, NULL),
(38, 49, 50, 2, 'Benjie Caranoo', 'Naruto  Uzomaki ', 'Kaede  Rukawa', 'NCLEX', 'Complete', '<table class=\"striped\" style=\"height: 161px;\" width=\"658\">\n<thead>\n<tr>\n<th style=\"width: 173px;\" colspan=\"5\" data-field=\"id\">Applicant Information</th>\n</tr>\n</thead>\n<tbody>\n<tr>\n<td style=\"width: 173px;\"><strong>Name</strong></td>\n<td style=\"width: 239px;\" colspan=\"3\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 173px;\"><strong>Current Address</strong></td>\n<td style=\"width: 239px;\" colspan=\"3\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 173px;\"><strong>Date of Birth</strong></td>\n<td style=\"width: 239px;\" colspan=\"3\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 173px;\"><strong>Email Address</strong></td>\n<td style=\"width: 239px;\" colspan=\"3\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 173px;\"><strong>Contact No.</strong></td>\n<td style=\"width: 239px;\" colspan=\"3\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 173px;\"><strong>Status</strong></td>\n<td style=\"width: 239px;\" colspan=\"3\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 173px;\"><strong>Username</strong></td>\n<td style=\"width: 239px;\" colspan=\"3\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 173px;\"><strong>Password</strong></td>\n<td style=\"width: 239px;\" colspan=\"3\">&nbsp;</td>\n</tr>\n</tbody>\n</table>', '2018-01-19 07:46:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_name` varchar(100) DEFAULT NULL,
  `service_desc` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_name`, `service_desc`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'J-1 Cultural Exchange', 'test resrwerwer', '2017-12-14 03:29:32', '2018-01-09 13:30:38', NULL),
(2, 'NCLEX', 'test', '2017-12-14 03:29:32', '2017-12-21 09:56:52', NULL),
(3, 'Korean Basic Language', 'test', '2017-12-14 03:30:26', '2017-12-21 09:56:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `staff_position`
--

DROP TABLE IF EXISTS `staff_position`;
CREATE TABLE IF NOT EXISTS `staff_position` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_roles` varchar(50) DEFAULT NULL,
  `value` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_position`
--

INSERT INTO `staff_position` (`id`, `staff_roles`, `value`) VALUES
(1, 'Office Admin', 'office-admin'),
(2, 'Sales', 'sales'),
(3, 'Encoder', 'encoder');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `middle` varchar(11) DEFAULT NULL,
  `full_name` varchar(100) NOT NULL,
  `roles` varchar(100) NOT NULL,
  `type_of_user` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(100) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` varchar(100) DEFAULT NULL,
  `flag` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `fname`, `lname`, `middle`, `full_name`, `roles`, `type_of_user`, `created_at`, `created_by`, `updated_at`, `deleted_at`, `deleted_by`, `flag`) VALUES
(1, 'superadmin', 'caranoobenjie@gmail.com', '17c4520f6cfd1ab53d8745e84681eb49', 'Benjie', 'Caranoo', 'G.', 'Benjie G. Caranoo', 'super', 'staff', '2017-12-13 04:33:42', NULL, '2018-01-11 10:49:07', NULL, NULL, 0),
(51, 'Admin', 'monkey@yahoo.com', 'e3afed0047b08059d0fada10f400c1e5', 'Monkey', 'Lupi', '', 'Monkey  Lupi', 'office-admin', 'staff', '2018-01-19 06:24:28', 1, NULL, NULL, NULL, 0),
(50, 'Encoder', 'naruto@yahoo.com', '87d487f6f605eb96e61be67988e41e6d', 'Naruto', 'Uzomaki', '', 'Naruto  Uzomaki', 'encoder', 'staff', '2018-01-19 06:22:53', 1, NULL, NULL, NULL, 0),
(49, 'Sales', 'kaede@yahoo.com', '11ff9f68afb6b8b5b8eda218d7c83a65', 'Kaede', 'Rukawa', '', 'Kaede  Rukawa', 'sales', 'staff', '2018-01-19 06:21:12', 1, NULL, NULL, NULL, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
