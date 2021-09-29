-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 29, 2021 at 12:32 PM
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
-- Database: `rusty_db_01`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_details`
--

CREATE TABLE `account_details` (
  `acc_id` int(20) NOT NULL,
  `firstname` varchar(30) DEFAULT NULL,
  `middlename` varchar(30) DEFAULT NULL,
  `lastname` varchar(30) DEFAULT NULL,
  `suffix` varchar(10) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `dateBirth` date DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `dateRegister` datetime DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `account_privilege` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cmp_history`
--

CREATE TABLE `cmp_history` (
  `cmp_id` int(30) DEFAULT NULL,
  `cmp_share` double(10,2) DEFAULT NULL,
  `cmp_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `game_accounts`
--

CREATE TABLE `game_accounts` (
  `bm_id` int(30) NOT NULL,
  `bm_company` varchar(100) DEFAULT NULL,
  `bm_region` varchar(50) DEFAULT NULL,
  `bm_city` varchar(50) DEFAULT NULL,
  `bm_user` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `game_accounts`
--

INSERT INTO `game_accounts` (`bm_id`, `bm_company`, `bm_region`, `bm_city`, `bm_user`) VALUES
(1, 'Bachelor Express Inc.', 'Caraga Region', 'Butuan City', 'admina'),
(2, 'Land Car Inc.', 'Caraga Region', 'Butuan City', 'qwerty'),
(3, 'Balbautog Inc..', 'Caraga Region', 'Butuan City', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `gm_dest`
--

CREATE TABLE `gm_dest` (
  `gm_id` int(30) DEFAULT NULL,
  `gm_place` varchar(100) DEFAULT NULL,
  `gm_distance` double(10,2) DEFAULT NULL,
  `gm_econ` double(10,2) DEFAULT NULL,
  `gm_luxury` double(10,2) DEFAULT NULL,
  `gm_fare` double(30,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gm_dest`
--

INSERT INTO `gm_dest` (`gm_id`, `gm_place`, `gm_distance`, `gm_econ`, `gm_luxury`, `gm_fare`) VALUES
(1, 'Bayugan City', 43.50, 83.00, 13.00, 85.00);

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
  `acct_priv` varchar(50) DEFAULT NULL,
  `game_id` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_accounts`
--

INSERT INTO `login_accounts` (`id`, `username`, `password`, `confirmpassword`, `email_acct`, `acct_priv`, `game_id`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin@rustydev.com', NULL, NULL),
(2, 'admina', 'bc5832de4d1698bcf6f07c366072a262892b4c25', 'bc5832de4d1698bcf6f07c366072a262892b4c25', 'admina@aol.com', NULL, NULL),
(3, 'qwerty', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e', 'qwerty@qwerty.com', NULL, NULL);

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
(52, 'admin', '2021-09-26 22:35:03');

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `ud_id` int(30) DEFAULT NULL,
  `ud_user` varchar(50) DEFAULT NULL,
  `ud_bal` double(30,2) DEFAULT NULL,
  `ud_comp_share` double(10,2) DEFAULT NULL,
  `ud_bus_total` int(30) DEFAULT NULL,
  `ud_bus_used` int(30) DEFAULT NULL,
  `ud_bus_vacant` int(30) DEFAULT NULL,
  `ud_comp_rep` double(10,2) DEFAULT NULL,
  `ud_staff_driver_tot` int(30) DEFAULT NULL,
  `ud_staff_assist_tot` int(30) DEFAULT NULL,
  `ud_staff_mech_tot` int(30) DEFAULT NULL,
  `ud_staff_util_tot` int(30) DEFAULT NULL,
  `ud_staff_driver_av` int(30) DEFAULT NULL,
  `ud_staff_assist_av` int(30) DEFAULT NULL,
  `ud_staff_mech_av` int(30) DEFAULT NULL,
  `ud_staff_util_av` int(30) DEFAULT NULL,
  `ud_staff_driver_used` int(30) DEFAULT NULL,
  `ud_staff_assist_used` int(30) DEFAULT NULL,
  `ud_staff_mech_used` int(30) DEFAULT NULL,
  `ud_staff_util_used` int(30) DEFAULT NULL,
  `ud_garage_cap` int(10) DEFAULT NULL,
  `ud_fuel_av` double(30,2) DEFAULT NULL,
  `ud_fuel_cap` double(30,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`ud_id`, `ud_user`, `ud_bal`, `ud_comp_share`, `ud_bus_total`, `ud_bus_used`, `ud_bus_vacant`, `ud_comp_rep`, `ud_staff_driver_tot`, `ud_staff_assist_tot`, `ud_staff_mech_tot`, `ud_staff_util_tot`, `ud_staff_driver_av`, `ud_staff_assist_av`, `ud_staff_mech_av`, `ud_staff_util_av`, `ud_staff_driver_used`, `ud_staff_assist_used`, `ud_staff_mech_used`, `ud_staff_util_used`, `ud_garage_cap`, `ud_fuel_av`, `ud_fuel_cap`) VALUES
(1, 'admina', 33450.33, 255.68, 1, 0, 1, 50.00, 1, 1, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 12, 1000.00, 10000.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_details`
--
ALTER TABLE `account_details`
  ADD PRIMARY KEY (`acc_id`);

--
-- Indexes for table `game_accounts`
--
ALTER TABLE `game_accounts`
  ADD PRIMARY KEY (`bm_id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_details`
--
ALTER TABLE `account_details`
  MODIFY `acc_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `game_accounts`
--
ALTER TABLE `game_accounts`
  MODIFY `bm_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login_accounts`
--
ALTER TABLE `login_accounts`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login_history`
--
ALTER TABLE `login_history`
  MODIFY `instance_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
