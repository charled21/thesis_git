-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 30, 2021 at 03:23 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thesis_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicant_details`
--

CREATE TABLE `applicant_details` (
  `applicant_id` int(100) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `dateBirth` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `app_status` int(4) NOT NULL,
  `date_applied` date NOT NULL,
  `job_history_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applicant_details`
--

INSERT INTO `applicant_details` (`applicant_id`, `firstname`, `middlename`, `lastname`, `gender`, `dateBirth`, `address`, `address2`, `city`, `state`, `zipcode`, `app_status`, `date_applied`, `job_history_id`) VALUES
(4, 'Angela', 'Macabugto', 'Luso', 'F', '1988-06-27', 'P-8 Libertad', 'JC Aquino ', 'Butuan City', 'Agusan del Norte', '8600', 3, '2021-10-22', 2),
(5, 'Dhanika', 'Sugbo', 'Cagas', 'F', '1997-08-18', 'Blk 34 Lot 18', 'Northtown Subdivision', 'Butuan City', 'Agusan del Norte', '8600', 3, '2021-10-18', 2),
(7, 'Teofisto', 'Tuman', 'Lumad', 'M', '1989-07-29', 'P-1 Bading', 'Bading Rampa Road', 'Butuan City', 'Agusan del Norte', '8600', 4, '2017-03-03', 3),
(8, 'Raymart', 'Naquila', 'Norberte', 'M', '1991-01-05', 'P-1 San Agustin ', 'Talacogon', 'Talacogon', 'Agusan del Sur', '8510', 4, '2016-03-12', 3),
(9, 'Jhuanna', 'Avenido', 'Dampa', 'F', '1994-12-21', 'P-3 San Agustin', 'Talacogon', 'Talacogon', 'Agusan del Sur', '8510', 4, '2015-04-02', 2),
(10, 'Arthur', 'Yantoc', 'Pajo', 'M', '1990-08-08', 'San Isidro I', 'Sibagat', 'Sibagat', 'Agusan del Sur', '8503', 4, '2017-02-27', 9),
(11, 'Jennifer', 'Macadulot', 'Pacyas', 'F', '1992-02-05', 'Libertad', 'San Isidro I', 'Sibagat', 'Agusan del Sur', '8503', 4, '2017-03-04', 9),
(12, 'Ralph', 'Cep', 'Alf', 'M', '1993-03-01', 'P5', 'B4', 'Bayugan City', 'Agusan del Norte', '8502', 3, '2021-10-27', 12),
(13, 'Dwight', 'Macabaca', 'Howard', 'M', '1984-09-01', 'P41', 'B27', 'Butuan City', 'Agusan del Norte', '8600', 2, '2021-10-28', 12),
(14, 'Melissa', 'Hicky', 'Ricks', 'F', '1986-04-01', 'P90', 'B98', 'Bayugan City', 'Agusan del Norte', '8502', 3, '2021-10-28', 12),
(39, 'Johnson', 'Travis', 'McCoy', 'M', '2020-12-01', 'P15', 'B24', 'Bayugan City', 'Agusan del Norte', '8502', 4, '2021-11-04', 12);

-- --------------------------------------------------------

--
-- Table structure for table `app_add_details`
--

CREATE TABLE `app_add_details` (
  `app_details_id` int(11) NOT NULL,
  `app_email` varchar(255) NOT NULL,
  `app_religion` int(11) NOT NULL,
  `app_citizenship` int(11) NOT NULL,
  `app_civil_status` int(11) NOT NULL,
  `app_landline` int(50) NOT NULL,
  `app_mobile` int(50) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `per_id` int(11) NOT NULL,
  `init_score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `app_add_details`
--

INSERT INTO `app_add_details` (`app_details_id`, `app_email`, `app_religion`, `app_citizenship`, `app_civil_status`, `app_landline`, `app_mobile`, `applicant_id`, `per_id`, `init_score`) VALUES
(1, 'email_1@sample.com', 1, 1, 1, 3000000, 999999999, 1, 12, 2),
(2, 'email_2@sample.com', 1, 1, 1, 3000000, 999999999, 2, 12, 2),
(3, 'email_3@sample.com', 1, 1, 1, 3000000, 999999999, 3, 8, 2),
(4, 'email_4@sample.com', 1, 1, 1, 3000000, 999999999, 4, 12, 1),
(5, 'email_5@sample.com', 1, 1, 1, 3000000, 999999999, 5, 7, 1),
(6, 'email_7@sample.com', 1, 1, 1, 3000000, 999999999, 7, 12, 2),
(7, 'email_8@sample.com', 1, 1, 1, 3000000, 999999999, 8, 12, 2),
(8, 'email_9@sample.com', 1, 1, 1, 3000000, 999999999, 9, 11, 1),
(9, 'email_10@sample.com', 1, 1, 1, 3000000, 999999999, 10, 7, 2),
(10, 'email_11@sample.com', 1, 1, 1, 3000000, 999999999, 11, 7, 1),
(11, 'email_12@sample.com', 1, 1, 1, 3000000, 999999999, 12, 8, 1),
(12, 'email_13@sample.com', 1, 1, 1, 3000000, 999999999, 13, 0, 2),
(13, 'email_14@sample.com', 1, 1, 1, 3000000, 999999999, 14, 10, 1),
(14, 'email_23@sample.com', 1, 1, 1, 3000000, 999999999, 23, 12, 0),
(18, 'email@sample.com', 1, 2, 2, 341, 999, 25, 0, 0),
(19, 'email@sample.com', 1, 2, 2, 341, 999, 27, 0, 0),
(20, 'email@sample.com', 1, 2, 2, 341, 999, 27, 0, 0),
(21, 'email@sample.com', 2, 2, 1, 341, 999, 23, 0, 0),
(22, 'email@sample.com', 2, 2, 1, 341, 999, 29, 0, 0),
(25, 'email@sample.com', 1, 1, 1, 341, 999, 31, 0, 0),
(27, 'email@sample.com', 1, 1, 1, 341, 999, 34, 0, 0),
(28, 'email@sample.com', 1, 2, 1, 341, 999, 35, 0, 0),
(30, 'email@sample.com', 1, 1, 1, 341, 999, 37, 0, 0),
(33, 'email@sample.com', 1, 2, 1, 341, 999, 39, 0, 7);

-- --------------------------------------------------------

--
-- Table structure for table `app_educ_bg`
--

CREATE TABLE `app_educ_bg` (
  `educ_id` int(11) NOT NULL,
  `educ_attain` int(11) NOT NULL,
  `educ_deg` int(11) NOT NULL,
  `educ_univ` varchar(255) NOT NULL,
  `educ_univ_yr` int(11) NOT NULL,
  `educ_hs` varchar(255) NOT NULL,
  `educ_hs_grad` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `app_educ_bg`
--

INSERT INTO `app_educ_bg` (`educ_id`, `educ_attain`, `educ_deg`, `educ_univ`, `educ_univ_yr`, `educ_hs`, `educ_hs_grad`, `applicant_id`) VALUES
(1, 1, 1, 'Caraga State University - Cabadbaran Campus', 2011, 'Cabadbaran City National High School', 2007, 1),
(2, 1, 1, 'Father Saturnino Urios University', 2014, 'Agusan National High School', 2010, 2),
(3, 1, 1, 'Father Saturnino Urios University', 2016, 'Agusan National High School', 2012, 3),
(4, 1, 1, 'Philippine Electronics and Communication Institute of Technology', 2016, 'Agusan National High School', 2012, 4),
(5, 1, 1, 'Philippine Electronics and Communication Institute of Technology', 2017, 'Libertad National High School', 2012, 5),
(6, 1, 1, 'Caraga State University', 2015, 'Tiniwisan National High School', 2011, 7),
(7, 1, 1, 'AMA Computer Learning Center', 2017, 'Talacogon National High School', 2013, 8),
(8, 1, 1, 'Father Saturnino Urios University', 2017, 'Talacogon National High School', 2013, 9),
(9, 1, 1, 'Holy Child Colleges of Butuan', 2017, 'Sibagat National High School Home of Industries', 2013, 10),
(10, 1, 1, 'Butuan City Colleges', 2017, 'Sibagat National High School Home of Industries', 2013, 11),
(11, 1, 1, 'Caraga State University - Main Campus', 2018, 'Bayugan National Comprehensive High School', 2014, 12),
(12, 1, 1, 'Caraga State University - Main Campus', 2018, 'Agusan National High School', 2014, 13),
(13, 1, 1, 'Caraga State University - Main Campus', 2019, 'Bayugan National Comprehensive High School', 2015, 14),
(14, 1, 1, 'Father Saturnino Urios University', 2020, 'Agusan National High School', 2016, 23),
(32, 7, 4, 'Father Saturnino Urios University', 1988, 'Agusan National High School', 1984, 25),
(33, 7, 4, 'Father Saturnino Urios University', 1988, 'Agusan National High School', 1984, 27),
(34, 6, 3, 'Father Saturnino Urios University', 1988, 'Agusan National High School', 1984, 27),
(35, 6, 3, 'Father Saturnino Urios University', 1988, 'Agusan National High School', 1984, 23),
(36, 3, 1, 'Father Saturnino Urios University', 1988, 'Agusan National High School', 1984, 29),
(37, 3, 1, 'Father Saturnino Urios University', 1988, 'Agusan National High School', 1984, 14),
(38, 3, 1, 'Father Saturnino Urios University', 1988, 'Agusan National High School', 1984, 14),
(39, 2, 1, 'Father Saturnino Urios University', 1988, 'Agusan National High School', 1984, 31),
(40, 3, 1, 'Father Saturnino Urios University', 1988, 'Agusan National High School', 1984, 14),
(41, 3, 1, 'Father Saturnino Urios University', 1988, 'Agusan National High School', 1984, 34),
(42, 3, 1, 'Father Saturnino Urios University', 1988, 'Agusan National High School', 1984, 39),
(43, 3, 1, 'Father Saturnino Urios University', 1988, 'Agusan National High School', 1984, 14),
(44, 3, 1, 'Father Saturnino Urios University', 1988, 'Agusan National High School', 1984, 37),
(45, 3, 1, 'Father Saturnino Urios University', 1988, 'Agusan National High School', 1984, 14),
(46, 0, 0, 'Father Saturnino Urios University', 1988, 'Agusan National High School', 1984, 14),
(47, 3, 1, 'Father Saturnino Urios University', 1988, 'Agusan National High School', 1984, 39);

-- --------------------------------------------------------

--
-- Table structure for table `app_emp_details`
--

CREATE TABLE `app_emp_details` (
  `app_emp_id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `hired_date` date NOT NULL,
  `job_history_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `app_emp_details`
--

INSERT INTO `app_emp_details` (`app_emp_id`, `applicant_id`, `hired_date`, `job_history_id`) VALUES
(4, 39, '2021-11-30', 12),
(5, 39, '2021-11-30', 12),
(6, 39, '2021-11-30', 12),
(7, 39, '2021-11-30', 12),
(8, 39, '2021-11-30', 12),
(9, 39, '2021-11-30', 12),
(10, 39, '2021-11-30', 12),
(11, 39, '2021-11-30', 12),
(12, 39, '2021-11-30', 12),
(13, 39, '2021-11-30', 12);

-- --------------------------------------------------------

--
-- Table structure for table `citizenship`
--

CREATE TABLE `citizenship` (
  `app_citizenship` int(11) NOT NULL,
  `citizenship_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `citizenship`
--

INSERT INTO `citizenship` (`app_citizenship`, `citizenship_name`) VALUES
(1, 'Filipino'),
(2, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `civil_status`
--

CREATE TABLE `civil_status` (
  `app_civil_status` int(11) NOT NULL,
  `app_civil_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `civil_status`
--

INSERT INTO `civil_status` (`app_civil_status`, `app_civil_name`) VALUES
(1, 'Single'),
(2, 'Married'),
(3, 'Divorced'),
(4, 'Widowed');

-- --------------------------------------------------------

--
-- Table structure for table `employment_status`
--

CREATE TABLE `employment_status` (
  `emp_status_id` int(11) NOT NULL,
  `emp_status_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employment_status`
--

INSERT INTO `employment_status` (`emp_status_id`, `emp_status_name`) VALUES
(1, 'Missing Personal Info'),
(2, 'Lacking Examination'),
(3, 'Awaiting Interview'),
(4, 'Employed');

-- --------------------------------------------------------

--
-- Table structure for table `eval_details`
--

CREATE TABLE `eval_details` (
  `instance_id` int(100) NOT NULL,
  `applicant_id` int(100) NOT NULL,
  `eval_datetime` datetime DEFAULT NULL,
  `eval_status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eval_details`
--

INSERT INTO `eval_details` (`instance_id`, `applicant_id`, `eval_datetime`, `eval_status`) VALUES
(1, 7, '2021-10-18 07:55:54', 1),
(2, 7, '2021-10-19 07:35:46', 1),
(3, 7, '2021-10-20 07:58:01', 1),
(4, 7, '2021-10-21 08:05:24', 2),
(5, 7, '2021-10-22 08:12:26', 2),
(6, 8, '2021-10-18 07:39:45', 1),
(7, 8, '2021-10-19 07:40:01', 1),
(8, 8, '2021-10-20 07:57:57', 1),
(9, 8, '2021-10-21 07:49:10', 1),
(10, 8, '2021-10-22 07:46:35', 1),
(11, 9, '2021-10-18 08:01:34', 2),
(12, 9, '2021-10-19 08:03:00', 2),
(13, 9, '2021-10-20 07:58:27', 1),
(14, 9, '2021-10-21 08:00:58', 2),
(15, 9, '2021-10-22 07:53:48', 1),
(16, 10, '2021-10-18 07:42:50', 1),
(17, 10, '2021-10-19 08:22:31', 2),
(18, 10, '2021-10-20 08:08:12', 2),
(19, 10, '2021-10-21 08:02:01', 2),
(20, 10, '2021-10-22 08:18:11', 2),
(21, 11, '2021-10-18 07:21:34', 1),
(22, 11, '2021-10-19 07:31:55', 1),
(23, 11, '2021-10-20 07:47:00', 1),
(24, 11, '2021-10-21 07:51:55', 1),
(25, 11, '2021-10-22 07:38:36', 1);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `img_id` int(11) NOT NULL,
  `img_name` varchar(255) NOT NULL,
  `img_dir` varchar(255) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `img_class` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`img_id`, `img_name`, `img_dir`, `applicant_id`, `img_class`) VALUES
(9, 'doggo1.jpg', '/thesis_git/img/uploads/2021-11-26-doggo1.jpg', 4, 1),
(10, 'doggo2.jpg', '/thesis_git/img/uploads/2021-11-26-doggo2.jpg', 5, 1),
(11, 'doggo3.jpg', '/thesis_git/img/uploads/2021-11-26-doggo3.jpg', 7, 1),
(12, 'img1.jpg', '/thesis_git/img/uploads/2021-11-26-img1.jpg', 8, 1),
(13, 'img2.jpg', '/thesis_git/img/uploads/2021-11-26-img2.jpg', 9, 1),
(14, 'img3.jpg', '/thesis_git/img/uploads/2021-11-26-img3.jpg', 10, 1),
(15, 'img4.jpg', '/thesis_git/img/uploads/2021-11-26-img4.jpg', 11, 1),
(16, 'img5.jpg', '/thesis_git/img/uploads/2021-11-26-img5.jpg', 12, 1),
(17, 'png1.png', '/thesis_git/img/uploads/2021-11-26-png1.png', 13, 1),
(18, 'img6.jpg', '/thesis_git/img/uploads/2021-11-26-img6.jpg', 14, 1),
(41, '1.jpg', '/thesis_git/img/uploads/certificates/2021-11-28-1.jpg', 14, 2),
(42, '4.jpg', '/thesis_git/img/uploads/certificates/2021-11-28-4.jpg', 14, 2),
(43, '7.jpg', '/thesis_git/img/uploads/certificates/2021-11-28-7.jpg', 5, 2),
(44, '3.png', '/thesis_git/img/uploads/prof-pics/prof-pic-3.png', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `job_history`
--

CREATE TABLE `job_history` (
  `job_history_id` int(100) NOT NULL,
  `job_id` int(11) NOT NULL,
  `job_applicants` int(100) NOT NULL,
  `job_date` datetime NOT NULL,
  `job_city` varchar(255) NOT NULL,
  `branch_no` int(11) NOT NULL,
  `emp_type` varchar(50) NOT NULL,
  `emp_term` int(11) NOT NULL,
  `min_rate` int(255) NOT NULL,
  `max_rate` int(255) NOT NULL,
  `job_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_history`
--

INSERT INTO `job_history` (`job_history_id`, `job_id`, `job_applicants`, `job_date`, `job_city`, `branch_no`, `emp_type`, `emp_term`, `min_rate`, `max_rate`, `job_status`) VALUES
(1, 5, 0, '2021-10-27 08:34:25', 'Butuan City', 1, 'Full-time', 1, 12000, 18000, 1),
(2, 3, 0, '2021-10-27 09:14:25', 'Cabadbaran City', 3, 'Full-time', 1, 12000, 15000, 1),
(3, 2, 0, '2021-10-13 08:41:03', 'Butuan City', 2, 'Permanent', 1, 0, 0, 1),
(9, 7, 0, '2021-11-16 00:33:45', 'Butuan City', 3, 'Full-time', 1, 0, 0, 0),
(12, 4, 0, '2021-11-25 01:47:03', 'Butuan City', 1, 'Full-time', 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `job_req`
--

CREATE TABLE `job_req` (
  `job_id` int(11) NOT NULL,
  `job_name` varchar(255) NOT NULL,
  `job_score` int(11) NOT NULL,
  `job_priv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_req`
--

INSERT INTO `job_req` (`job_id`, `job_name`, `job_score`, `job_priv`) VALUES
(1, 'Manager', 16, 7),
(2, 'Mechanic', 12, 1),
(3, 'Treasury Staff', 12, 1),
(4, 'IT Staff', 8, 1),
(5, 'Cost Engineer', 16, 3),
(6, 'HR Staff', 16, 5),
(7, 'Store Clerk', 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `login_accounts`
--

CREATE TABLE `login_accounts` (
  `id` int(30) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `confirmpassword` varchar(50) DEFAULT NULL,
  `email_acct` varchar(50) DEFAULT NULL,
  `acct_priv` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_accounts`
--

INSERT INTO `login_accounts` (`id`, `username`, `password`, `confirmpassword`, `email_acct`, `acct_priv`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin@rustydev.com', '10'),
(2, 'hr_admin', '08d928c3547ae46a3a44e028c7237d7daaa04c59', '08d928c3547ae46a3a44e028c7237d7daaa04c59', 'hr_admin@gmail.com', '5'),
(14, 'admin3', '33aab3c7f01620cade108f488cfd285c0e62c1ec', '33aab3c7f01620cade108f488cfd285c0e62c1ec', 'admin_3_email@sample.com', '5'),
(15, 'admin4', 'ea053d11a8aad1ccf8c18f9241baeb9ec47e5d64', 'ea053d11a8aad1ccf8c18f9241baeb9ec47e5d64', 'admin_email@sample.com', '5'),
(17, 'admin5', '35cc6a0d62fb5a6042d2bb250adfb03ef31a45c8', '35cc6a0d62fb5a6042d2bb250adfb03ef31a45c8', 'admin5@aol.com', '10'),
(18, 'admin6', '16b4d433eeef71946e93341822786a196549c2c5', '16b4d433eeef71946e93341822786a196549c2c5', 'admin6@sample.com', '10');

-- --------------------------------------------------------

--
-- Table structure for table `login_history`
--

CREATE TABLE `login_history` (
  `instance_id` int(30) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `login_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_history`
--

INSERT INTO `login_history` (`instance_id`, `username`, `login_datetime`) VALUES
(1, 'admin', '2020-10-09 10:03:46'),
(2, 'admin', '2020-10-09 10:37:59'),
(3, 'admin', '2020-10-09 10:39:51'),
(4, 'admin', '2020-10-09 10:40:07'),
(5, 'admin', '2020-10-09 10:40:29'),
(6, 'admin', '2020-10-09 10:40:51'),
(7, 'admin', '2020-10-09 10:41:41'),
(8, 'admin', '2020-10-09 10:41:48'),
(9, 'admin', '2020-10-09 10:42:09'),
(10, 'admin', '2020-10-09 10:44:06'),
(11, 'admin ', '2020-10-09 10:47:46'),
(12, 'admin', '2020-10-09 11:12:25'),
(13, 'admina', '2020-10-09 13:21:41'),
(14, 'admin', '2020-10-09 17:29:50'),
(15, 'qwerty', '2020-10-09 17:30:37'),
(16, 'admina', '2020-10-09 21:25:18'),
(17, 'admina', '2020-10-10 20:29:32'),
(18, 'admina', '2020-10-11 00:14:06'),
(19, 'admin', '2020-10-11 00:18:34'),
(20, 'admina', '2020-10-11 00:18:44'),
(21, 'admina', '2020-10-11 00:46:53'),
(22, 'admina', '2020-10-11 11:05:49'),
(23, 'admina', '2020-10-11 19:27:33'),
(24, 'admina', '2020-10-11 21:56:23'),
(25, 'admina', '2020-10-19 00:31:29'),
(26, 'admina', '2020-10-19 16:09:56'),
(27, 'admina', '2020-10-19 23:32:37'),
(28, 'admina', '2020-10-20 12:01:03'),
(29, 'admina', '2020-10-21 00:19:56'),
(30, 'admina', '2020-10-21 11:38:25'),
(31, 'admina', '2020-10-21 11:42:56'),
(32, 'admina', '2020-10-21 18:06:00'),
(33, 'admin', '2021-01-29 22:08:57'),
(34, 'admina', '2021-02-03 10:59:24'),
(35, 'admina', '2021-02-03 11:57:59'),
(36, 'admina', '2021-02-03 12:13:42'),
(37, 'admina', '2021-02-09 13:16:05'),
(38, 'admin', '2021-04-24 09:26:02'),
(39, 'admin', '2021-07-14 16:45:24'),
(40, 'admin', '2021-07-14 16:55:15'),
(41, 'admin', '2021-09-25 12:56:05'),
(42, 'admin', '2021-09-25 12:59:59'),
(43, 'admin', '2021-09-25 13:00:31'),
(44, 'admin', '2021-09-25 13:00:55'),
(45, 'admin', '2021-09-25 13:04:50'),
(46, 'admin', '2021-09-25 13:23:18'),
(47, 'admin', '2021-09-25 13:26:19'),
(48, 'admin', '2021-09-25 13:27:41'),
(49, 'admin', '2021-09-25 13:32:02'),
(50, 'admin', '2021-09-26 22:24:47'),
(51, 'admin', '2021-09-26 22:25:24'),
(52, 'admin', '2021-09-26 22:35:03'),
(53, 'admin', '2021-09-29 18:44:59'),
(54, 'admin', '2021-09-29 18:47:32'),
(55, 'admin', '2021-10-12 10:14:05'),
(56, 'admin', '2021-10-12 11:40:39'),
(57, 'admin', '2021-10-12 11:50:14'),
(58, 'admin', '2021-10-12 14:58:00'),
(59, 'admin', '2021-10-12 15:31:36'),
(60, 'admin', '2021-10-12 15:40:56'),
(61, 'admin', '2021-10-12 16:01:20'),
(62, 'admin', '2021-10-12 16:06:13'),
(63, 'admin', '2021-10-12 16:19:35'),
(64, 'admin', '2021-10-12 17:47:18'),
(65, 'admin', '2021-10-12 17:47:40'),
(66, 'admin', '2021-10-12 17:51:38'),
(67, 'admin', '2021-10-13 11:43:57'),
(68, 'admin', '2021-10-13 11:45:52'),
(69, 'admin', '2021-10-13 19:59:54'),
(70, 'admin', '2021-10-13 21:49:56'),
(71, 'admin', '2021-10-13 22:02:21'),
(72, 'admin', '2021-10-13 23:01:50'),
(73, 'admin', '2021-10-14 03:02:19'),
(74, 'admin', '2021-10-20 18:04:37'),
(75, 'admin', '2021-10-20 19:40:15'),
(76, 'admin', '2021-10-21 13:29:09'),
(77, 'admin', '2021-10-21 17:11:49'),
(78, 'admin', '2021-10-21 17:16:37'),
(79, 'admin', '2021-10-21 17:16:54'),
(80, 'admin', '2021-10-21 17:40:02'),
(81, 'admin', '2021-10-21 17:40:20'),
(82, 'admin', '2021-10-21 17:51:57'),
(83, 'admin', '2021-10-21 18:20:40'),
(84, 'admin', '2021-10-21 19:42:41'),
(85, 'admin', '2021-10-21 20:16:46'),
(86, 'admin', '2021-10-22 10:27:49'),
(87, 'admin', '2021-10-23 20:15:01'),
(88, 'admin', '2021-10-23 20:19:21'),
(89, 'admin', '2021-10-23 21:45:47'),
(90, 'hr_admin', '2021-10-23 21:51:13'),
(91, 'hr_admin', '2021-10-23 22:01:25'),
(92, 'admin', '2021-10-23 22:01:34'),
(93, 'admin', '2021-10-23 22:07:36'),
(94, 'admin', '2021-10-23 22:08:11'),
(95, 'admin', '2021-10-23 22:10:58'),
(96, 'admin', '2021-10-23 22:11:29'),
(97, 'admin', '2021-10-23 22:14:14'),
(98, 'admin', '2021-10-23 22:14:34'),
(99, 'admin', '2021-10-25 12:24:43'),
(100, 'admin', '2021-10-27 11:12:36'),
(101, 'admin', '2021-10-31 20:33:11'),
(102, 'admin', '2021-11-01 00:51:41'),
(103, 'admin', '2021-11-01 14:05:12'),
(104, 'admin', '2021-11-01 15:37:29'),
(105, 'admin', '2021-11-01 16:41:57'),
(106, 'admin', '2021-11-04 09:25:10'),
(107, 'admin', '2021-11-04 09:26:20'),
(108, 'admin', '2021-11-04 17:31:35'),
(109, 'admin', '2021-11-04 23:09:58'),
(110, 'admin', '2021-11-05 00:00:45'),
(111, 'admin', '2021-11-05 21:00:29'),
(112, 'admin', '2021-11-06 00:09:20'),
(113, 'admin', '2021-11-06 00:10:42'),
(114, 'admin', '2021-11-06 00:16:12'),
(115, 'admin', '2021-11-06 00:29:26'),
(116, 'admin', '2021-11-06 23:39:48'),
(117, 'admin', '2021-11-07 13:54:47'),
(118, 'admin', '2021-11-07 14:17:39'),
(119, 'admin', '2021-11-07 14:48:01'),
(120, 'admin', '2021-11-07 19:40:54'),
(121, 'admin', '2021-11-07 19:47:53'),
(122, 'admin', '2021-11-07 19:53:25'),
(123, 'admin', '2021-11-07 19:54:10'),
(124, 'admin', '2021-11-07 19:56:45'),
(125, 'admin', '2021-11-07 20:09:50'),
(126, 'admin', '2021-11-08 14:09:00'),
(127, 'admin', '2021-11-08 14:12:50'),
(128, 'admin', '2021-11-08 14:13:33'),
(129, 'admin', '2021-11-08 14:16:59'),
(130, 'admin', '2021-11-08 14:17:47'),
(131, 'admin', '2021-11-08 14:21:13'),
(132, 'admin', '2021-11-08 14:22:06'),
(133, 'hr_admin', '2021-11-08 14:22:18'),
(134, 'admin', '2021-11-08 14:24:19'),
(135, 'hr_admin', '2021-11-08 14:24:52'),
(136, 'admin', '2021-11-08 14:36:25'),
(137, 'hr_admin', '2021-11-08 14:36:34'),
(138, 'admin', '2021-11-08 14:36:46'),
(139, 'admin', '2021-11-09 13:01:25'),
(140, 'hr_admin', '2021-11-09 13:01:50'),
(141, 'admin', '2021-11-09 13:56:03'),
(142, 'admin', '2021-11-09 15:55:23'),
(143, 'hr_admin', '2021-11-09 15:55:48'),
(144, 'admin', '2021-11-11 02:20:31'),
(145, 'admin', '2021-11-11 03:56:35'),
(146, 'admin', '2021-11-11 10:53:19'),
(147, 'hr_admin', '2021-11-11 11:01:47'),
(148, 'admin', '2021-11-11 11:04:38'),
(149, 'admin', '2021-11-11 11:05:40'),
(150, 'admin', '2021-11-12 00:09:22'),
(151, 'admin', '2021-11-12 01:37:28'),
(152, 'hr_admin', '2021-11-12 02:35:12'),
(153, 'admin', '2021-11-12 02:35:21'),
(154, 'admin', '2021-11-12 02:46:00'),
(155, 'admin', '2021-11-12 11:23:11'),
(156, 'hr_admin', '2021-11-12 11:26:25'),
(157, 'admin', '2021-11-13 08:46:35'),
(158, 'admin', '2021-11-13 09:02:54'),
(159, 'admin', '2021-11-13 09:48:08'),
(160, 'hr_admin', '2021-11-13 09:50:40'),
(161, 'admin', '2021-11-13 09:52:00'),
(162, 'admin', '2021-11-23 19:51:20'),
(163, 'hr_admin', '2021-11-23 21:29:24'),
(164, 'admin', '2021-11-23 21:29:31'),
(165, 'admin', '2021-11-23 21:59:26'),
(166, 'admin', '2021-11-25 00:33:02'),
(167, 'admin', '2021-11-25 01:14:10'),
(168, 'admin', '2021-11-25 02:02:18'),
(169, 'admin', '2021-11-25 02:20:53'),
(170, 'admin', '2021-11-25 14:14:03'),
(171, 'admin', '2021-11-25 14:25:37'),
(172, 'admin', '2021-11-25 14:39:01'),
(173, 'admin', '2021-11-25 14:44:23'),
(174, 'admin', '2021-11-25 14:49:55'),
(175, 'admin', '2021-11-25 14:56:54'),
(176, 'admin', '2021-11-25 14:58:31'),
(177, 'admin', '2021-11-25 15:02:32'),
(178, 'admin', '2021-11-25 15:07:34'),
(179, 'admin', '2021-11-25 15:20:13'),
(180, 'admin', '2021-11-25 15:34:10'),
(181, 'admin', '2021-11-25 15:58:11'),
(182, 'admin', '2021-11-25 17:38:21'),
(183, 'admin', '2021-11-25 18:09:19'),
(184, 'hr_admin', '2021-11-25 19:01:08'),
(185, 'admin', '2021-11-25 19:01:26'),
(186, 'admin', '2021-11-26 03:22:08'),
(187, 'admin', '2021-11-26 03:36:47'),
(188, 'admin', '2021-11-26 03:37:19'),
(189, 'admin', '2021-11-26 19:39:19'),
(190, 'admin', '2021-11-26 19:51:06'),
(191, 'admin', '2021-11-26 20:05:17'),
(192, 'admin', '2021-11-26 21:12:04'),
(193, 'admin', '2021-11-27 20:25:35'),
(194, 'admin', '2021-11-27 21:09:14'),
(195, 'hr_admin', '2021-11-27 21:12:02'),
(196, 'admin', '2021-11-27 21:12:54'),
(197, 'admin', '2021-11-27 22:35:23'),
(198, 'hr_admin', '2021-11-28 01:16:35'),
(199, 'admin', '2021-11-28 01:32:41'),
(200, 'admin6', '2021-11-28 01:48:47'),
(201, 'admin3', '2021-11-28 01:48:55'),
(202, 'admin', '2021-11-28 01:49:11'),
(203, 'admin', '2021-11-28 13:21:54'),
(204, 'admin', '2021-11-28 15:09:09'),
(205, 'admin', '2021-11-28 15:28:29'),
(206, 'admin', '2021-11-29 01:24:35'),
(207, 'admin', '2021-11-29 10:54:36'),
(208, 'admin', '2021-11-29 14:46:04'),
(209, 'admin', '2021-11-29 17:02:20'),
(210, 'hr_admin', '2021-11-29 17:02:45'),
(211, 'admin', '2021-11-29 17:06:34'),
(212, 'admin', '2021-11-29 22:17:22'),
(213, 'admin', '2021-11-30 00:12:40'),
(214, 'admin', '2021-11-30 00:20:15');

-- --------------------------------------------------------

--
-- Table structure for table `personality_types`
--

CREATE TABLE `personality_types` (
  `per_id` int(11) NOT NULL,
  `per_name` varchar(255) NOT NULL,
  `per_choose_count` int(11) NOT NULL,
  `per_score` int(11) NOT NULL,
  `w_score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personality_types`
--

INSERT INTO `personality_types` (`per_id`, `per_name`, `per_choose_count`, `per_score`, `w_score`) VALUES
(0, 'NONE', 0, 0, 0),
(1, 'INTJ', 2, 30, 6),
(2, 'INTP', 1, 30, 6),
(3, 'ENTJ', 3, 65, 10),
(4, 'ENTP', 1, 70, 11),
(5, 'INFJ', 1, 30, 6),
(6, 'INFP', 1, 30, 6),
(7, 'ENFJ', 1, 75, 12),
(8, 'ENFP', 2, 80, 13),
(9, 'ISTJ', 1, 35, 7),
(10, 'ISFJ', 1, 45, 8),
(11, 'ESTJ', 1, 85, 14),
(12, 'ESFJ', 4, 90, 15),
(13, 'ISTP', 1, 55, 9),
(14, 'ISFP', 1, 65, 10),
(15, 'ESTP', 6, 100, 16),
(16, 'ESFP', 2, 95, 16);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `q_id` int(11) NOT NULL,
  `q_txt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`q_id`, `q_txt`) VALUES
(1, 'You enjoy vibrant social events with lots of people'),
(2, 'You often spend time exploring unrealistic yet intriguing ideas'),
(3, 'Your travel plans are more likely to look like a rough list of ideas than a detailed itinerary'),
(4, 'You often think about what you should have said in a conversation long after it has taken place'),
(5, 'If your friend is sad about something, your first instinct is to support them emotionally, not try to solve their problem'),
(6, 'People can rarely upset you'),
(7, 'You often rely on other people to be the ones to start a conversation and keep it going'),
(8, 'If you have to temporarily put your plans on hold, you make sure it is your top priority to get back on track as soon as possible'),
(9, 'You rarely worry if you made a good impression on someone you met'),
(10, 'It would be a challenge for you to spend the whole weekend all by yourself without feeling bored'),
(11, 'You are more of a detail-oriented than a big picture person'),
(12, 'You are very affectionate with people you care about'),
(13, 'You have a careful and methodical approach to life'),
(14, 'You are still bothered by the mistakes you made a long time ago'),
(15, 'At parties and similar events you can mostly be found farther away from the action'),
(16, 'You often find it difficult to relate to people who let their emotions guide them'),
(17, 'When looking for a movie to watch, you can spend ages browsing the catalog'),
(18, 'You can stay calm under a lot of pressure'),
(19, 'When in a group of people you do not know, you have no problem jumping right into their conversation'),
(20, 'When you sleep, your dreams tend to be bizarre and fantastical'),
(21, 'In your opinion, it is sometimes OK to step on others to get ahead in life'),
(22, 'You are dedicated and focused on your goals, only rarely getting sidetracked'),
(23, 'If you make a mistake, you tend to start doubting yourself, your abilities, or your knowledge'),
(24, 'When at a social event, you rarely try to introduce yourself to new people and mostly talk to the ones you already know'),
(25, 'You usually lose interest in a discussion when it gets philosophical'),
(26, 'You would never let yourself cry in front of others'),
(27, 'You feel more drawn to places with a bustling and busy atmosphere than to more quiet and intimate ones'),
(28, 'You like discussing different views and theories on what the world could look like in the future'),
(29, 'When it comes to making life-changing choices, you mostly listen to your heart rather than your head'),
(30, 'You cannot imagine yourself dedicating your life to the study of something that you cannot see, touch, or experience'),
(31, 'You usually prefer to get your revenge rather than forgive'),
(32, 'You often make decisions on a whim'),
(33, 'The time you spend by yourself often ends up being more interesting and satisfying than the time you spend with other people'),
(34, 'You often put special effort into interpreting the real meaning or the message of a song or a movie'),
(35, 'You always know exactly what you want'),
(36, 'You rarely think back on the choices you made and wonder what you could have done differently'),
(37, 'When in a public place, you usually stick to quieter and less crowded areas'),
(38, 'You tend to focus on present realities rather than future possibilities'),
(39, 'You often have a hard time understanding other people’s feelings'),
(40, 'When starting to work on a project, you prefer to make as many decisions upfront as possible'),
(41, 'When you know someone thinks highly of you, you also wonder how long it will be until they become disappointed in you'),
(42, 'You feel comfortable just walking up to someone you find interesting and striking up a conversation'),
(43, 'You often drift away into daydreaming about various ideas or scenarios'),
(44, 'You look after yourself first, and others come in second'),
(45, 'Even when you have planned a particular daily routine, you usually just end up doing what you feel like at any given moment'),
(46, 'Your mood can change very quickly'),
(47, 'You often contemplate the reasons for human existence or the meaning of life'),
(48, 'You often talk about your own feelings and emotions'),
(49, 'You have got detailed education or career development plans stretching several years into the future'),
(50, 'You rarely dwell on your regrets'),
(51, 'Spending time in a dynamic atmosphere with lots of people around quickly makes you feel drained and in need of a getaway'),
(52, 'You see yourself as more of a realist than a visionary'),
(53, 'You find it easy to empathize with a person who has gone through something you never have '),
(54, 'Your personal work style is closer to spontaneous bursts of energy than to organized and consistent efforts'),
(55, 'Your emotions control you more than you control them'),
(56, 'After a long and exhausting week, a fun party is just what you need'),
(57, 'You frequently find yourself wondering how technological advancement could change everyday life'),
(58, 'You always consider how your actions might affect other people before doing something'),
(59, 'You still honor the commitments you have made even if you have a change of heart'),
(60, 'You still honor the commitments you have made even if you have a change of heart');

-- --------------------------------------------------------

--
-- Table structure for table `religion`
--

CREATE TABLE `religion` (
  `app_religion_id` int(11) NOT NULL,
  `religion_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `religion`
--

INSERT INTO `religion` (`app_religion_id`, `religion_name`) VALUES
(1, 'Roman Catholic'),
(2, 'Christian'),
(3, 'Protestant'),
(4, 'Islam');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicant_details`
--
ALTER TABLE `applicant_details`
  ADD PRIMARY KEY (`applicant_id`);

--
-- Indexes for table `app_add_details`
--
ALTER TABLE `app_add_details`
  ADD PRIMARY KEY (`app_details_id`);

--
-- Indexes for table `app_educ_bg`
--
ALTER TABLE `app_educ_bg`
  ADD PRIMARY KEY (`educ_id`);

--
-- Indexes for table `app_emp_details`
--
ALTER TABLE `app_emp_details`
  ADD PRIMARY KEY (`app_emp_id`);

--
-- Indexes for table `citizenship`
--
ALTER TABLE `citizenship`
  ADD PRIMARY KEY (`app_citizenship`);

--
-- Indexes for table `civil_status`
--
ALTER TABLE `civil_status`
  ADD PRIMARY KEY (`app_civil_status`);

--
-- Indexes for table `employment_status`
--
ALTER TABLE `employment_status`
  ADD PRIMARY KEY (`emp_status_id`);

--
-- Indexes for table `eval_details`
--
ALTER TABLE `eval_details`
  ADD PRIMARY KEY (`instance_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `job_history`
--
ALTER TABLE `job_history`
  ADD PRIMARY KEY (`job_history_id`);

--
-- Indexes for table `job_req`
--
ALTER TABLE `job_req`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `login_accounts`
--
ALTER TABLE `login_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_history`
--
ALTER TABLE `login_history`
  ADD PRIMARY KEY (`instance_id`);

--
-- Indexes for table `personality_types`
--
ALTER TABLE `personality_types`
  ADD PRIMARY KEY (`per_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`q_id`);

--
-- Indexes for table `religion`
--
ALTER TABLE `religion`
  ADD PRIMARY KEY (`app_religion_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicant_details`
--
ALTER TABLE `applicant_details`
  MODIFY `applicant_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `app_add_details`
--
ALTER TABLE `app_add_details`
  MODIFY `app_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `app_educ_bg`
--
ALTER TABLE `app_educ_bg`
  MODIFY `educ_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `app_emp_details`
--
ALTER TABLE `app_emp_details`
  MODIFY `app_emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `citizenship`
--
ALTER TABLE `citizenship`
  MODIFY `app_citizenship` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `civil_status`
--
ALTER TABLE `civil_status`
  MODIFY `app_civil_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employment_status`
--
ALTER TABLE `employment_status`
  MODIFY `emp_status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `eval_details`
--
ALTER TABLE `eval_details`
  MODIFY `instance_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `job_history`
--
ALTER TABLE `job_history`
  MODIFY `job_history_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `job_req`
--
ALTER TABLE `job_req`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `login_accounts`
--
ALTER TABLE `login_accounts`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `login_history`
--
ALTER TABLE `login_history`
  MODIFY `instance_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=215;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `religion`
--
ALTER TABLE `religion`
  MODIFY `app_religion_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
