-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 18, 2018 at 07:19 AM
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
-- Database: `tlc_wetalk_new`
--

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicant`
--

INSERT INTO `applicant` (`id`, `service_id`, `encoder_id`, `sales_id`, `sales_name`, `encoder_name`, `name`, `contact`, `address`, `email`, `service`, `status`, `username`, `password`, `created_at`, `updated_at`, `deleted_at`) VALUES
(13, 1, 41, 40, 'Sales Sales Sales', 'First Encoder Encoder ', 'tet', 'qwerqe', 'qwerqwer', 'qwerqwe@Yahoo.com', 'J-1 Cultural Exchange', 'Enrolled', 'qwerqwer', '795c08a0cf9d0bdc6d806a976ac09716', '2018-01-18 06:33:03', NULL, NULL),
(14, 2, 41, 40, 'Sales Sales Sales', 'First Encoder Encoder', 'yrdy', '434534', 'ertwertwer', 'ewrtwer@yahoo.com', 'NCLEX', 'Enrolled', 'qwerqwer', 'd74682ee47c3fffd5dcd749f840fcdd4', '2018-01-18 06:41:32', NULL, NULL);

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
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assign_staff_service`
--

INSERT INTO `assign_staff_service` (`id`, `_userID`, `service_id`, `admin`, `created_at`, `deleted_at`) VALUES
(28, 40, 1, NULL, '2018-01-11 02:45:56', NULL),
(27, 41, 3, NULL, '2018-01-11 02:45:39', NULL),
(26, 41, 2, NULL, '2018-01-11 02:45:39', NULL),
(25, 41, 1, NULL, '2018-01-11 02:45:39', NULL),
(24, 47, NULL, 'all', '2018-01-11 02:44:48', NULL),
(29, 40, 2, NULL, '2018-01-11 02:45:56', NULL),
(30, 40, 3, NULL, '2018-01-11 02:45:56', NULL),
(31, 48, 1, NULL, '2018-01-16 02:54:42', NULL),
(32, 48, 2, NULL, '2018-01-16 02:54:42', NULL),
(33, 48, 3, NULL, '2018-01-16 02:54:42', NULL);

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
  `encoder_name` varchar(50) NOT NULL,
  `sales_name` varchar(50) NOT NULL,
  `service_name` varchar(100) NOT NULL,
  `status` enum('Pending','Complete','Ongoing') DEFAULT NULL,
  `applicant_data` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `udpated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `encoder_assign_tickets`
--

INSERT INTO `encoder_assign_tickets` (`id`, `sales_id`, `encoder_id`, `service_id`, `encoder_name`, `sales_name`, `service_name`, `status`, `applicant_data`, `created_at`, `udpated_at`, `deleted_at`) VALUES
(2, 40, 41, 2, 'First Encoder Encoder', 'Sales Sales Sales', 'NCLEX', 'Complete', '<p style=\"text-align: center;\">&nbsp;</p>\n<table style=\"height: 232px; width: 100.418%; border-collapse: collapse;\" border=\"1\" cellspacing=\"1\">\n<tbody>\n<tr style=\"height: 18px;\">\n<td style=\"width: 715px; text-align: center; height: 18px;\"><strong>APPLICANT INFORMATION</strong></td>\n</tr>\n<tr style=\"height: 40px;\">\n<td style=\"width: 715px; height: 40px;\"><br />\n<table style=\"border-collapse: collapse; width: 100%;\" border=\"1\">\n<tbody>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Name :</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Current Address :</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Date of Birth :</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Email Address :</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Contact No.&nbsp; &nbsp; &nbsp;:</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Status&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; :&nbsp;</strong></td>\n<td style=\"width: 74.8951%;\"><strong>&nbsp; Enroll</strong></td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Username&nbsp; &nbsp;:</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Password&nbsp; &nbsp; :</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n</tbody>\n</table>\n</td>\n</tr>\n<tr style=\"height: 18px;\">\n<td style=\"width: 715px; height: 18px;\">&nbsp;</td>\n</tr>\n</tbody>\n</table>\n<p style=\"text-align: center;\">&nbsp;</p>\n<p>&nbsp;</p>', '2018-01-17 02:23:27', NULL, NULL),
(3, 40, 48, 3, 'Second G Encoder', 'Sales Sales Sales', 'Korean Basic Language', 'Pending', '<p style=\"text-align: center;\">&nbsp;</p>\n<table style=\"height: 232px; width: 100.418%; border-collapse: collapse;\" border=\"1\" cellspacing=\"1\">\n<tbody>\n<tr style=\"height: 18px;\">\n<td style=\"width: 715px; text-align: center; height: 18px;\"><strong>APPLICANT INFORMATION</strong></td>\n</tr>\n<tr style=\"height: 40px;\">\n<td style=\"width: 715px; height: 40px;\"><br />\n<table style=\"border-collapse: collapse; width: 100%;\" border=\"1\">\n<tbody>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Name :</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Current Address :</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Date of Birth :</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Email Address :</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Contact No.&nbsp; &nbsp; &nbsp;:</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Status&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; :&nbsp;</strong></td>\n<td style=\"width: 74.8951%;\"><strong>&nbsp; Enroll</strong></td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Username&nbsp; &nbsp;:</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Password&nbsp; &nbsp; :</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n</tbody>\n</table>\n</td>\n</tr>\n<tr style=\"height: 18px;\">\n<td style=\"width: 715px; height: 18px;\">&nbsp;</td>\n</tr>\n</tbody>\n</table>\n<p style=\"text-align: center;\">&nbsp;</p>\n<p>&nbsp;</p>', '2018-01-17 02:25:05', NULL, NULL),
(4, 40, 41, 2, 'First Encoder Encoder', 'Sales Sales Sales', 'NCLEX', 'Pending', '<p style=\"text-align: center;\">&nbsp;</p>\n<table style=\"height: 232px; width: 100.418%; border-collapse: collapse;\" border=\"1\" cellspacing=\"1\">\n<tbody>\n<tr style=\"height: 18px;\">\n<td style=\"width: 715px; text-align: center; height: 18px;\"><strong>APPLICANT INFORMATION</strong></td>\n</tr>\n<tr style=\"height: 40px;\">\n<td style=\"width: 715px; height: 40px;\"><br />\n<table style=\"border-collapse: collapse; width: 100%;\" border=\"1\">\n<tbody>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Name :</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Current Address :</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Date of Birth :</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Email Address :</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Contact No.&nbsp; &nbsp; &nbsp;:</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Status&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; :&nbsp;</strong></td>\n<td style=\"width: 74.8951%;\"><strong>&nbsp; Enroll</strong></td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Username&nbsp; &nbsp;:</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Password&nbsp; &nbsp; :</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n</tbody>\n</table>\n</td>\n</tr>\n<tr style=\"height: 18px;\">\n<td style=\"width: 715px; height: 18px;\">&nbsp;</td>\n</tr>\n</tbody>\n</table>\n<p style=\"text-align: center;\">&nbsp;</p>\n<p>&nbsp;</p>', '2018-01-17 02:35:05', NULL, NULL),
(5, 40, 48, 2, 'Second G Encoder', 'Sales Sales Sales', 'NCLEX', 'Pending', '<p style=\"text-align: center;\">&nbsp;</p>\n<table style=\"height: 232px; width: 100.418%; border-collapse: collapse;\" border=\"1\" cellspacing=\"1\">\n<tbody>\n<tr style=\"height: 18px;\">\n<td style=\"width: 715px; text-align: center; height: 18px;\"><strong>APPLICANT INFORMATION</strong></td>\n</tr>\n<tr style=\"height: 40px;\">\n<td style=\"width: 715px; height: 40px;\"><br />\n<table style=\"border-collapse: collapse; width: 100%;\" border=\"1\">\n<tbody>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Name :</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Current Address :</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Date of Birth :</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Email Address :</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Contact No.&nbsp; &nbsp; &nbsp;:</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Status&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; :&nbsp;</strong></td>\n<td style=\"width: 74.8951%;\"><strong>&nbsp; Enroll</strong></td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Username&nbsp; &nbsp;:</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Password&nbsp; &nbsp; :</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n</tbody>\n</table>\n</td>\n</tr>\n<tr style=\"height: 18px;\">\n<td style=\"width: 715px; height: 18px;\">&nbsp;</td>\n</tr>\n</tbody>\n</table>\n<p style=\"text-align: center;\">&nbsp;</p>\n<p>&nbsp;</p>', '2018-01-17 02:36:05', NULL, NULL),
(6, 40, 48, 2, 'Second G Encoder', 'Sales Sales Sales', 'NCLEX', 'Pending', '<p style=\"text-align: center;\">&nbsp;</p>\n<table style=\"height: 232px; width: 100.418%; border-collapse: collapse;\" border=\"1\" cellspacing=\"1\">\n<tbody>\n<tr style=\"height: 18px;\">\n<td style=\"width: 715px; text-align: center; height: 18px;\"><strong>APPLICANT INFORMATION</strong></td>\n</tr>\n<tr style=\"height: 40px;\">\n<td style=\"width: 715px; height: 40px;\"><br />\n<table style=\"border-collapse: collapse; width: 100%;\" border=\"1\">\n<tbody>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Name :</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Current Address :</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Date of Birth :</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Email Address :</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Contact No.&nbsp; &nbsp; &nbsp;:</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Status&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; :&nbsp;</strong></td>\n<td style=\"width: 74.8951%;\"><strong>&nbsp; Enroll</strong></td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Username&nbsp; &nbsp;:</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Password&nbsp; &nbsp; :</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n</tbody>\n</table>\n</td>\n</tr>\n<tr style=\"height: 18px;\">\n<td style=\"width: 715px; height: 18px;\">&nbsp;</td>\n</tr>\n</tbody>\n</table>\n<p style=\"text-align: center;\">&nbsp;</p>\n<p>&nbsp;</p>', '2018-01-17 02:36:09', NULL, NULL),
(7, 40, 48, 2, 'Second G Encoder', 'Sales Sales Sales', 'NCLEX', 'Pending', '<p style=\"text-align: center;\">&nbsp;</p>\n<table style=\"height: 232px; width: 100.418%; border-collapse: collapse;\" border=\"1\" cellspacing=\"1\">\n<tbody>\n<tr style=\"height: 18px;\">\n<td style=\"width: 715px; text-align: center; height: 18px;\"><strong>APPLICANT INFORMATION</strong></td>\n</tr>\n<tr style=\"height: 40px;\">\n<td style=\"width: 715px; height: 40px;\"><br />\n<table style=\"border-collapse: collapse; width: 100%;\" border=\"1\">\n<tbody>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Name :</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Current Address :</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Date of Birth :</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Email Address :</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Contact No.&nbsp; &nbsp; &nbsp;:</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Status&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; :&nbsp;</strong></td>\n<td style=\"width: 74.8951%;\"><strong>&nbsp; Enroll</strong></td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Username&nbsp; &nbsp;:</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Password&nbsp; &nbsp; :</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n</tbody>\n</table>\n</td>\n</tr>\n<tr style=\"height: 18px;\">\n<td style=\"width: 715px; height: 18px;\">&nbsp;</td>\n</tr>\n</tbody>\n</table>\n<p style=\"text-align: center;\">&nbsp;</p>\n<p>&nbsp;</p>', '2018-01-17 02:36:10', NULL, NULL),
(8, 40, 48, 3, 'Second G Encoder', 'Sales Sales Sales', 'Korean Basic Language', 'Pending', '<p style=\"text-align: center;\">&nbsp;</p>\n<table style=\"height: 232px; width: 100.418%; border-collapse: collapse;\" border=\"1\" cellspacing=\"1\">\n<tbody>\n<tr style=\"height: 18px;\">\n<td style=\"width: 715px; text-align: center; height: 18px;\"><strong>APPLICANT INFORMATION</strong></td>\n</tr>\n<tr style=\"height: 40px;\">\n<td style=\"width: 715px; height: 40px;\"><br />\n<table style=\"border-collapse: collapse; width: 100%;\" border=\"1\">\n<tbody>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Name :</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Current Address :</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Date of Birth :</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Email Address :</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Contact No.&nbsp; &nbsp; &nbsp;:</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Status&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; :&nbsp;</strong></td>\n<td style=\"width: 74.8951%;\"><strong>&nbsp; Enroll</strong></td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Username&nbsp; &nbsp;:</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Password&nbsp; &nbsp; :</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n</tbody>\n</table>\n</td>\n</tr>\n<tr style=\"height: 18px;\">\n<td style=\"width: 715px; height: 18px;\">&nbsp;</td>\n</tr>\n</tbody>\n</table>\n<p style=\"text-align: center;\">&nbsp;</p>\n<p>&nbsp;</p>', '2018-01-17 02:37:02', NULL, NULL),
(9, 40, 41, 2, 'First Encoder Encoder', 'Sales Sales Sales', 'NCLEX', 'Pending', '<p style=\"text-align: center;\">&nbsp;</p>\n<table style=\"height: 232px; width: 100.418%; border-collapse: collapse;\" border=\"1\" cellspacing=\"1\">\n<tbody>\n<tr style=\"height: 18px;\">\n<td style=\"width: 715px; text-align: center; height: 18px;\"><strong>APPLICANT INFORMATION</strong></td>\n</tr>\n<tr style=\"height: 40px;\">\n<td style=\"width: 715px; height: 40px;\"><br />\n<table style=\"border-collapse: collapse; width: 100%;\" border=\"1\">\n<tbody>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Name :</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Current Address :</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Date of Birth :</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Email Address :</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Contact No.&nbsp; &nbsp; &nbsp;:</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Status&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; :&nbsp;</strong></td>\n<td style=\"width: 74.8951%;\"><strong>&nbsp; Enroll</strong></td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Username&nbsp; &nbsp;:</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Password&nbsp; &nbsp; :</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n</tbody>\n</table>\n</td>\n</tr>\n<tr style=\"height: 18px;\">\n<td style=\"width: 715px; height: 18px;\">&nbsp;</td>\n</tr>\n</tbody>\n</table>\n<p style=\"text-align: center;\">&nbsp;</p>\n<p>&nbsp;</p>', '2018-01-17 02:37:37', NULL, NULL),
(10, 40, 48, 2, 'Second G Encoder', 'Sales Sales Sales', 'NCLEX', 'Pending', '<p style=\"text-align: center;\">&nbsp;</p>\n<table style=\"height: 232px; width: 100.418%; border-collapse: collapse;\" border=\"1\" cellspacing=\"1\">\n<tbody>\n<tr style=\"height: 18px;\">\n<td style=\"width: 715px; text-align: center; height: 18px;\"><strong>APPLICANT INFORMATION</strong></td>\n</tr>\n<tr style=\"height: 40px;\">\n<td style=\"width: 715px; height: 40px;\"><br />\n<table style=\"border-collapse: collapse; width: 100%;\" border=\"1\">\n<tbody>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Name :</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Current Address :</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Date of Birth :</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Email Address :</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Contact No.&nbsp; &nbsp; &nbsp;:</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Status&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; :&nbsp;</strong></td>\n<td style=\"width: 74.8951%;\"><strong>&nbsp; Enroll</strong></td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Username&nbsp; &nbsp;:</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Password&nbsp; &nbsp; :</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n</tbody>\n</table>\n</td>\n</tr>\n<tr style=\"height: 18px;\">\n<td style=\"width: 715px; height: 18px;\">&nbsp;</td>\n</tr>\n</tbody>\n</table>\n<p style=\"text-align: center;\">&nbsp;</p>\n<p>&nbsp;</p>', '2018-01-17 02:38:18', NULL, NULL),
(11, 40, 48, 3, 'Second G Encoder', 'Sales Sales Sales', 'Korean Basic Language', 'Pending', '<p style=\"text-align: center;\">&nbsp;</p>\n<table style=\"height: 232px; width: 100.418%; border-collapse: collapse;\" border=\"1\" cellspacing=\"1\">\n<tbody>\n<tr style=\"height: 18px;\">\n<td style=\"width: 715px; text-align: center; height: 18px;\"><strong>APPLICANT INFORMATION</strong></td>\n</tr>\n<tr style=\"height: 40px;\">\n<td style=\"width: 715px; height: 40px;\"><br />\n<table style=\"border-collapse: collapse; width: 100%;\" border=\"1\">\n<tbody>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Name :</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Current Address :</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Date of Birth :</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Email Address :</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Contact No.&nbsp; &nbsp; &nbsp;:</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Status&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; :&nbsp;</strong></td>\n<td style=\"width: 74.8951%;\"><strong>&nbsp; Enroll</strong></td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Username&nbsp; &nbsp;:</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Password&nbsp; &nbsp; :</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n</tbody>\n</table>\n</td>\n</tr>\n<tr style=\"height: 18px;\">\n<td style=\"width: 715px; height: 18px;\">&nbsp;</td>\n</tr>\n</tbody>\n</table>\n<p style=\"text-align: center;\">&nbsp;</p>\n<p>&nbsp;</p>', '2018-01-17 02:38:58', NULL, NULL),
(12, 40, 48, 3, 'Second G Encoder', 'Sales Sales Sales', 'Korean Basic Language', 'Pending', '<p style=\"text-align: center;\">&nbsp;</p>\n<table style=\"height: 232px; width: 100.418%; border-collapse: collapse;\" border=\"1\" cellspacing=\"1\">\n<tbody>\n<tr style=\"height: 18px;\">\n<td style=\"width: 715px; text-align: center; height: 18px;\"><strong>APPLICANT INFORMATION</strong></td>\n</tr>\n<tr style=\"height: 40px;\">\n<td style=\"width: 715px; height: 40px;\"><br />\n<table style=\"border-collapse: collapse; width: 100%;\" border=\"1\">\n<tbody>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Name :</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Current Address :</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Date of Birth :</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Email Address :</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Contact No.&nbsp; &nbsp; &nbsp;:</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Status&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; :&nbsp;</strong></td>\n<td style=\"width: 74.8951%;\"><strong>&nbsp; Enroll</strong></td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Username&nbsp; &nbsp;:</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Password&nbsp; &nbsp; :</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n</tbody>\n</table>\n</td>\n</tr>\n<tr style=\"height: 18px;\">\n<td style=\"width: 715px; height: 18px;\">&nbsp;</td>\n</tr>\n</tbody>\n</table>\n<p style=\"text-align: center;\">&nbsp;</p>\n<p>&nbsp;</p>', '2018-01-17 02:40:23', NULL, NULL),
(13, 40, 48, 1, 'Second G Encoder ', 'Sales Sales Sales', 'J-1 Cultural Exchange', 'Pending', '<p style=\"text-align: center;\">&nbsp;</p>\n<table style=\"height: 232px; width: 100.418%; border-collapse: collapse;\" border=\"1\" cellspacing=\"1\">\n<tbody>\n<tr style=\"height: 18px;\">\n<td style=\"width: 715px; text-align: center; height: 18px;\"><strong>APPLICANT INFORMATION</strong></td>\n</tr>\n<tr style=\"height: 40px;\">\n<td style=\"width: 715px; height: 40px;\"><br />\n<table style=\"border-collapse: collapse; width: 100%;\" border=\"1\">\n<tbody>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Name :</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Current Address :</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Date of Birth :</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Email Address :</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Contact No.&nbsp; &nbsp; &nbsp;:</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Status&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; :&nbsp;</strong></td>\n<td style=\"width: 74.8951%;\"><strong>&nbsp; Enroll</strong></td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Username&nbsp; &nbsp;:</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Password&nbsp; &nbsp; :</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n</tbody>\n</table>\n</td>\n</tr>\n<tr style=\"height: 18px;\">\n<td style=\"width: 715px; height: 18px;\">&nbsp;</td>\n</tr>\n</tbody>\n</table>\n<p style=\"text-align: center;\">&nbsp;</p>\n<p>&nbsp;</p>', '2018-01-17 03:26:21', NULL, NULL),
(14, 40, 48, 2, 'Second G Encoder ', 'Sales Sales Sales', 'NCLEX', 'Pending', '<p style=\"text-align: center;\">&nbsp;</p>\n<table style=\"height: 232px; width: 100.418%; border-collapse: collapse;\" border=\"1\" cellspacing=\"1\">\n<tbody>\n<tr style=\"height: 18px;\">\n<td style=\"width: 715px; text-align: center; height: 18px;\"><strong>APPLICANT INFORMATION</strong></td>\n</tr>\n<tr style=\"height: 40px;\">\n<td style=\"width: 715px; height: 40px;\"><br />\n<table style=\"border-collapse: collapse; width: 100%;\" border=\"1\">\n<tbody>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Name :</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Current Address :</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Date of Birth :</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Email Address :</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Contact No.&nbsp; &nbsp; &nbsp;:</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Status&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; :&nbsp;</strong></td>\n<td style=\"width: 74.8951%;\"><strong>&nbsp; Enroll</strong></td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Username&nbsp; &nbsp;:</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 25.1049%;\"><strong>Password&nbsp; &nbsp; :</strong></td>\n<td style=\"width: 74.8951%;\">&nbsp;</td>\n</tr>\n</tbody>\n</table>\n</td>\n</tr>\n<tr style=\"height: 18px;\">\n<td style=\"width: 715px; height: 18px;\">&nbsp;</td>\n</tr>\n</tbody>\n</table>\n<p style=\"text-align: center;\">&nbsp;</p>\n<p>&nbsp;</p>', '2018-01-17 03:30:40', NULL, NULL),
(15, 40, 41, 1, 'First Encoder Encoder ', 'Sales Sales Sales', 'J-1 Cultural Exchange', 'Pending', '<table class=\"striped\" style=\"height: 161px;\" width=\"658\">\n<thead>\n<tr>\n<th style=\"width: 173px;\" data-field=\"id\">Name</th>\n<th style=\"width: 239px;\" data-field=\"name\">Item Name</th>\n<th style=\"width: 224px;\" data-field=\"price\">Item Price</th>\n</tr>\n</thead>\n<tbody>\n<tr>\n<td style=\"width: 173px;\">Alvin</td>\n<td style=\"width: 239px;\">Eclair</td>\n<td style=\"width: 224px;\">$0.87</td>\n</tr>\n<tr>\n<td style=\"width: 173px;\">Alan</td>\n<td style=\"width: 239px;\">Jellybean</td>\n<td style=\"width: 224px;\">$3.76</td>\n</tr>\n<tr>\n<td style=\"width: 173px;\">Jonathan</td>\n<td style=\"width: 239px;\">Lollipop</td>\n<td style=\"width: 224px;\">$7.00</td>\n</tr>\n<tr>\n<td style=\"width: 173px;\">Shannon</td>\n<td style=\"width: 239px;\">KitKat</td>\n<td style=\"width: 224px;\">$9.99</td>\n</tr>\n</tbody>\n</table>', '2018-01-18 02:57:00', NULL, NULL),
(16, 40, 41, 1, 'First Encoder Encoder ', 'Sales Sales Sales', 'J-1 Cultural Exchange', 'Complete', '<table class=\"striped\" style=\"height: 161px;\" width=\"658\">\n<thead>\n<tr>\n<th style=\"width: 173px;\" colspan=\"5\" data-field=\"id\">Applicant Information</th>\n</tr>\n</thead>\n<tbody>\n<tr>\n<td style=\"width: 173px;\"><strong>Name :</strong></td>\n<td style=\"width: 239px;\" colspan=\"3\">&nbsp;Benjie Caranoo</td>\n</tr>\n<tr>\n<td style=\"width: 173px;\"><strong>Current Address :</strong></td>\n<td style=\"width: 239px;\" colspan=\"3\">&nbsp;CEbu City</td>\n</tr>\n<tr>\n<td style=\"width: 173px;\"><strong>Date of Birth :</strong></td>\n<td style=\"width: 239px;\" colspan=\"3\">&nbsp;May 25, 1991</td>\n</tr>\n<tr>\n<td style=\"width: 173px;\"><strong>Email Address :</strong></td>\n<td style=\"width: 239px;\" colspan=\"3\">&nbsp;caranoobenjie@gmail.com</td>\n</tr>\n<tr>\n<td style=\"width: 173px;\"><strong>Contact No.&nbsp; &nbsp; &nbsp;:</strong></td>\n<td style=\"width: 239px;\" colspan=\"3\">&nbsp;24234234</td>\n</tr>\n<tr>\n<td style=\"width: 173px;\"><strong>Status&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; :&nbsp;</strong></td>\n<td style=\"width: 239px;\" colspan=\"3\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 173px;\"><strong>Username&nbsp; &nbsp;:</strong></td>\n<td style=\"width: 239px;\" colspan=\"3\">&nbsp;benjie</td>\n</tr>\n<tr>\n<td style=\"width: 173px;\"><strong>Password&nbsp; &nbsp; :</strong></td>\n<td style=\"width: 239px;\" colspan=\"3\">&nbsp;caranoo</td>\n</tr>\n</tbody>\n</table>', '2018-01-18 03:07:33', NULL, NULL);

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
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `fname`, `lname`, `middle`, `full_name`, `roles`, `type_of_user`, `created_at`, `created_by`, `updated_at`, `deleted_at`, `deleted_by`, `flag`) VALUES
(1, 'superadmin', 'caranoobenjie@gmail.com', '17c4520f6cfd1ab53d8745e84681eb49', 'Benjie', 'Caranoo', 'G.', 'Benjie G. Caranoo', 'super', 'staff', '2017-12-13 04:33:42', NULL, '2018-01-11 10:49:07', NULL, NULL, 1),
(47, 'Admin', 'admin@yahoo.com', 'e3afed0047b08059d0fada10f400c1e5', 'Admin', 'Admin', 'A', 'Admin A Admin', 'office-admin', 'staff', '2018-01-11 02:44:47', 1, NULL, NULL, NULL, 0),
(41, 'Encoder', 'firstencode@yahoo.com', 'cee50e0f8095ca8f33cb1e789d120213', 'First', 'Encoder', 'Encoder', 'First Encoder Encoder', 'encoder', 'staff', '2017-12-21 04:40:01', 1, '2018-01-16 10:53:15', NULL, NULL, 0),
(40, 'Sales', 'sales@yahoo.com', '11ff9f68afb6b8b5b8eda218d7c83a65', 'Sales', 'Sales', 'Sales', 'Sales Sales Sales', 'sales', 'staff', '2017-12-21 04:38:31', 1, '2018-01-11 10:48:23', NULL, NULL, 0),
(39, 'Admin', 'Admin@yahoo.com', 'e3afed0047b08059d0fada10f400c1e5', 'Admin22', 'Admin', 'A', 'Admin22 A Admin', 'office-admin', 'staff', '2017-12-20 04:25:57', 1, '2018-01-11 10:39:22', '2018-01-11 10:44:11', '1', 0),
(48, 'Encoder2', 'encoder2@yahoo.com', '12e02df6a6c8b6c30e4f4a86c5d070e5', 'Second', 'Encoder', 'G', 'Second G Encoder', 'encoder', 'staff', '2018-01-16 02:54:42', 1, NULL, NULL, NULL, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
