-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 26, 2021 at 08:10 AM
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
  `suffix` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `dateBirth` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `status` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applicant_details`
--

INSERT INTO `applicant_details` (`applicant_id`, `firstname`, `middlename`, `lastname`, `suffix`, `gender`, `dateBirth`, `address`, `address2`, `city`, `state`, `zipcode`, `status`) VALUES
(1, 'Jejomar', 'Mondejar', 'Binay', 'Jr.', 'M', '2000-05-10', 'Kurog St.', 'J.C Aparment, 3rd floor', 'Cabadbaran City', 'Agusan del Norte', '8605', 1),
(2, 'Junard', 'Reyes', 'Miranda', '', 'M', '1980-02-06', 'P-6 Leon Kilat', 'JC Aquino', 'Butuan City', 'Agusan del Norte', '8600', 1),
(3, 'Juan ', 'Aguilar', 'Dela Cruz', '', 'M', '1998-10-10', 'P-1 Obrero', 'Montilla Blvd.', 'Butuan City', 'Agusan del Norte', '8600', 1),
(4, 'Angela', 'Macabugto', 'Luso', '', 'F', '1988-06-27', 'P-8 Libertad', 'JC Aquino ', 'Butuan City', 'Agusan del Norte', '8600', 2),
(5, 'Dhanika', 'Sugbo', 'Cagas', '', 'F', '1997-08-18', 'Blk 34 Lot 18', 'Northtown Subdivision', 'Butuan City', 'Agusan del Norte', '8600', 1),
(7, 'Teofisto', 'Tuman', 'Lumad', '', 'M', '1989-07-29', 'P-1 Bading', 'Bading Rampa Road', 'Butuan City', 'Agusan del Norte', '8600', 4),
(8, 'Raymart', 'Naquila', 'Norberte', '', 'M', '1991-01-05', 'P-1 San Agustin ', 'Talacogon', 'Talacogon', 'Agusan del Sur', '8510', 4),
(9, 'Jhuanna', 'Avenido', 'Dampa', '', 'F', '1994-12-21', 'P-3 San Agustin', 'Talacogon', 'Talacogon', 'Agusan del Sur', '8510', 4),
(10, 'Arthur', 'Yantoc', 'Pajo', '', 'M', '1990-08-08', 'San Isidro I', 'Sibagat', 'Sibagat', 'Agusan del Sur', '8503', 4),
(11, 'Jennifer', 'Macadulot', 'Pacyas', '', 'F', '1992-02-05', 'Libertad', 'San Isidro I', 'Sibagat', 'Agusan del Sur', '8503', 4);

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
(2, 'hr_admin', '08d928c3547ae46a3a44e028c7237d7daaa04c59', '08d928c3547ae46a3a44e028c7237d7daaa04c59', 'hr_admin@gmail.com', '5');

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
(99, 'admin', '2021-10-25 12:24:43');

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicant_details`
--
ALTER TABLE `applicant_details`
  ADD PRIMARY KEY (`applicant_id`);

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
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`q_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicant_details`
--
ALTER TABLE `applicant_details`
  MODIFY `applicant_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `login_accounts`
--
ALTER TABLE `login_accounts`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `login_history`
--
ALTER TABLE `login_history`
  MODIFY `instance_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;