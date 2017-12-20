-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 20, 2017 at 07:14 AM
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
-- Database: `tlc_wetalk`
--

-- --------------------------------------------------------

--
-- Table structure for table `assign_staff_service`
--

DROP TABLE IF EXISTS `assign_staff_service`;
CREATE TABLE IF NOT EXISTS `assign_staff_service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `_userID` int(11) NOT NULL,
  `service_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assign_staff_service`
--

INSERT INTO `assign_staff_service` (`id`, `_userID`, `service_id`, `created_at`, `deleted_at`) VALUES
(18, 39, 2, '2017-12-20 04:25:57', NULL),
(17, 39, 1, '2017-12-20 04:25:57', NULL);

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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_name`, `service_desc`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'J-1 Cultural Exchange', 'test', '2017-12-14 03:29:32', NULL, NULL),
(2, 'NCLEX', 'test', '2017-12-14 03:29:32', NULL, NULL),
(3, 'Korean Basic Language', 'test', '2017-12-14 03:30:26', NULL, '2017-12-20 07:11:37');

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
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `fname`, `lname`, `middle`, `full_name`, `roles`, `type_of_user`, `created_at`, `created_by`, `updated_at`, `deleted_at`, `deleted_by`, `flag`) VALUES
(1, 'superadmin', 'superadmin@wetalk.com', '17c4520f6cfd1ab53d8745e84681eb49', 'Benjie', 'Caranoo', 'G.', 'Benjie G. Caranoo', 'super', 'staff', '2017-12-13 04:33:42', NULL, '2017-12-12 08:00:00', NULL, NULL, 0),
(39, 'Admin', 'Admin@yahoo.com', 'e3afed0047b08059d0fada10f400c1e5', 'Benjie', 'Admin', 'A', 'Benjie A Admin', 'encoder', 'staff', '2017-12-20 04:25:57', 1, '2017-12-20 13:40:41', NULL, NULL, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
