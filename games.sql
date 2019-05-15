-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 20, 2019 at 02:26 PM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `games`
--

-- --------------------------------------------------------

--
-- Table structure for table `case_case`
--

DROP TABLE IF EXISTS `case_case`;
CREATE TABLE IF NOT EXISTS `case_case` (
  `ticket_id` int(6) NOT NULL,
  `doctor_id` int(6) NOT NULL,
  `patient_id` int(6) DEFAULT NULL,
  `comment` text,
  `diagnosis` text,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `case_case`
--

INSERT INTO `case_case` (`ticket_id`, `doctor_id`, `patient_id`, `comment`, `diagnosis`, `id`) VALUES
(1, 1, NULL, 'JBGJHBN', 'JBKJBKJBJKB;B', 1),
(1, 1, NULL, 'JBGJHBN', 'JBKJBKJBJKB;B', 2);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

DROP TABLE IF EXISTS `doctor`;
CREATE TABLE IF NOT EXISTS `doctor` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `counter` int(6) NOT NULL DEFAULT '1',
  `exit_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `username`, `counter`, `exit_stamp`) VALUES
(1, 'ben', 1, '2019-03-19 22:03:19'),
(2, 'ben', 1, '2019-03-19 22:03:19'),
(3, 'ben', 1, '2019-03-19 22:03:19'),
(4, 'ben', 1, '2019-03-19 22:03:19'),
(5, 'ben', 1, '2019-03-19 22:03:19'),
(6, 'ben', 1, '2019-03-19 22:03:19'),
(7, 'ben', 1, '2019-03-19 22:03:19'),
(8, 'ben', 1, '2019-03-19 22:03:19'),
(9, 'ben', 1, '2019-03-19 22:03:19'),
(10, 'ben', 1, '2019-03-19 22:03:19'),
(11, 'ben', 1, '2019-03-19 22:03:19'),
(12, 'ben', 1, '2019-03-19 22:03:19'),
(13, 'ben', 1, '2019-03-19 22:03:19'),
(14, 'kevin', 1, '2019-03-19 22:03:19'),
(15, 'kevin', 1, '2019-03-19 22:03:19'),
(16, 'kevin', 1, '2019-03-19 22:03:19'),
(17, 'kevin', 1, '2019-03-19 22:03:19'),
(18, 'kevin', 1, '2019-03-19 22:03:19'),
(19, 'kevin', 1, '2019-03-19 22:03:19'),
(20, 'kevin', 1, '2019-03-19 22:03:19'),
(21, 'kevin', 1, '2019-03-19 22:03:19'),
(22, 'kevin', 1, '2019-03-19 22:03:19'),
(23, 'kevin', 1, '2019-03-19 22:03:19'),
(24, 'kevin', 1, '2019-03-19 22:03:19'),
(25, 'kevin', 1, '2019-03-19 22:03:19'),
(26, 'kevin', 1, '2019-03-19 22:03:19'),
(27, 'kevin', 1, '2019-03-19 22:03:19'),
(28, 'kevin', 1, '2019-03-19 22:03:19'),
(29, 'kevin', 1, '2019-03-19 22:03:19'),
(30, 'kevin', 1, '2019-03-19 22:03:19'),
(31, 'kevin', 1, '2019-03-19 22:03:19'),
(32, 'kevin', 1, '2019-03-19 22:03:19'),
(33, 'kevin', 1, '2019-03-19 22:03:19'),
(34, 'kevin', 1, '2019-03-19 22:03:19'),
(35, 'juma', 1, '2019-03-19 22:03:19'),
(36, 'juma', 1, '2019-03-19 22:03:19'),
(37, 'juma', 1, '2019-03-19 22:03:19'),
(38, 'juma', 1, '2019-03-19 22:03:19'),
(39, 'juma', 1, '2019-03-19 22:03:19'),
(40, 'juma', 1, '2019-03-19 22:03:19'),
(41, 'juma', 1, '2019-03-19 22:03:19'),
(42, 'juma', 1, '2019-03-19 22:03:19');

-- --------------------------------------------------------

--
-- Table structure for table `infor`
--

DROP TABLE IF EXISTS `infor`;
CREATE TABLE IF NOT EXISTS `infor` (
  `firstname` varchar(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `age` int(6) NOT NULL,
  `date_checked` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `city` varchar(25) NOT NULL,
  `phonenumber` int(10) NOT NULL,
  `diagosis` text NOT NULL,
  `comment` text NOT NULL,
  `username` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `infor`
--

INSERT INTO `infor` (`firstname`, `lastname`, `age`, `date_checked`, `city`, `phonenumber`, `diagosis`, `comment`, `username`) VALUES
('jill', 'cole', 24, '2019-03-17 12:38:48', 'Nairobi', 754325678, 'Osteoarthritis', 'hmmmmmmmmmmmmmmmmm', 'ben'),
('kev', 'jane', 67, '2019-03-17 12:39:00', 'Nairobi', 754325678, 'Major depressive disorder', '', 'ben'),
('kings', 'tim', 24, '2019-03-17 21:04:24', 'embu', 754325678, 'Pain in joint', 'hehehehehe', 'king'),
('jane', 'maina', 24, '2019-03-18 10:01:22', 'Nairobi', 754325678, 'Obesity', 'kjhkgufjghf', 'kevin'),
('ppp', 'jane', 56, '2019-03-18 14:06:19', 'Nairobi', 754325678, 'Hypothyroidism', 'igyufhghfgh', 'kevin'),
('juma', 'juma', 56, '2019-03-19 21:36:39', 'Nairobi', 754325678, 'Visual refractive errors', '', 'juma'),
('juma', 'juma', 56, '2019-03-19 21:43:59', 'Nairobi', 754325678, 'Visual refractive errors', '', 'juma'),
('john', 'juma', 67, '2019-03-19 21:44:50', 'Nairobi', 754325678, 'Acute laryngopharyngitis', '', 'juma'),
('kev', 'cole', 55, '2019-03-19 21:45:55', 'embu', 754325678, 'Pain in joint', '', 'ben'),
('jane', 'maina', 24, '2019-03-19 21:48:05', 'Kisumu', 789452312, 'Osteoarthritis', '', 'kevin'),
('jill', 'tim', 78, '2019-03-19 21:48:22', 'Kisumu', 754325678, 'Major depressive disorder', '', 'kevin');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

DROP TABLE IF EXISTS `ticket`;
CREATE TABLE IF NOT EXISTS `ticket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entry_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `exit_stamp` timestamp NULL DEFAULT NULL,
  `total_tickets` int(6) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`id`, `entry_stamp`, `exit_stamp`, `total_tickets`) VALUES
(1, '2019-03-19 21:52:56', NULL, 1),
(2, '2019-03-19 21:52:57', '2019-03-20 13:02:08', 1),
(3, '2019-03-19 21:52:57', '2019-03-19 22:01:27', 1),
(4, '2019-03-19 21:52:58', '2019-03-19 22:01:25', 1),
(5, '2019-03-19 21:52:58', '2019-03-19 22:01:23', 1),
(6, '2019-03-19 21:52:59', '2019-03-19 22:01:03', 1),
(7, '2019-03-19 21:52:59', '2019-03-19 22:01:01', 1),
(8, '2019-03-19 21:53:00', '2019-03-19 22:01:00', 1),
(9, '2019-03-19 21:53:00', '2019-03-19 22:00:58', 1),
(10, '2019-03-19 21:53:00', '2019-03-19 22:00:56', 1),
(11, '2019-03-19 21:53:00', '2019-03-19 21:58:32', 1),
(12, '2019-03-19 21:53:01', '2019-03-19 21:58:29', 1),
(13, '2019-03-19 21:53:02', '2019-03-19 21:58:28', 1),
(14, '2019-03-19 21:53:02', '2019-03-19 21:58:26', 1),
(15, '2019-03-19 21:53:03', '2019-03-19 21:57:40', 1),
(16, '2019-03-19 21:53:03', '2019-03-19 21:57:38', 1),
(17, '2019-03-19 21:53:05', '2019-03-19 21:57:35', 1),
(18, '2019-03-19 21:53:17', '2019-03-19 21:56:49', 1),
(19, '2019-03-19 21:53:17', '2019-03-19 21:56:47', 1),
(20, '2019-03-19 21:53:18', '2019-03-19 21:56:46', 1),
(21, '2019-03-19 21:53:18', '2019-03-19 21:56:45', 1),
(22, '2019-03-19 21:53:19', '2019-03-19 21:55:32', 1),
(23, '2019-03-19 21:53:19', '2019-03-19 21:55:31', 1),
(24, '2019-03-19 21:53:20', '2019-03-19 21:55:29', 1),
(25, '2019-03-19 21:53:20', '2019-03-19 21:55:23', 1),
(26, '2019-03-19 21:53:20', '2019-03-19 21:53:39', 1),
(27, '2019-03-19 21:53:21', '2019-03-19 21:53:38', 1),
(28, '2019-03-19 21:53:22', '2019-03-19 21:53:37', 1),
(29, '2019-03-19 21:53:23', '2019-03-19 21:53:36', 1),
(30, '2019-03-19 21:53:24', '2019-03-19 21:53:35', 1),
(31, '2019-03-20 13:03:16', NULL, 1),
(32, '2019-03-20 13:03:17', NULL, 1),
(33, '2019-03-20 13:03:17', NULL, 1),
(34, '2019-03-20 13:03:18', NULL, 1),
(35, '2019-03-20 13:03:18', NULL, 1),
(36, '2019-03-20 13:03:18', NULL, 1),
(37, '2019-03-20 13:03:19', NULL, 1),
(38, '2019-03-20 13:03:19', NULL, 1),
(39, '2019-03-20 13:03:20', '2019-03-20 13:03:30', 1),
(40, '2019-03-20 13:03:20', '2019-03-20 13:03:28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `logged_in` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`, `logged_in`) VALUES
(1, 'kevin', '$2y$10$9iSl2w.8rTtEe.bPNPuIiuhTwGF3VKPrsJnetGF6HOvJvCqzXYnPS', '2019-03-14 14:12:17', '2019-03-19 22:04:46'),
(2, 'james', '$2y$10$YU8O0HapkHZnDQVFArRGoeuPPKM6AME6OHz2BwrJh0tfowt.3Ziye', '2019-03-14 14:22:16', '2019-03-19 22:04:46'),
(3, 'king', '$2y$10$baxyZTacIBGu1rA3ZPVF8u0lOYYW2hV9EGx97qYumdx7w65B.6RoS', '2019-03-17 13:30:57', '2019-03-19 22:04:46'),
(4, 'vinnie', '$2y$10$dmEpS1cBsip44vym4Ayt1.p6dD69mX5395GzxzBoG4/vSgJ2grUOC', '2019-03-17 13:31:24', '2019-03-19 22:04:46'),
(5, 'Denzel', '$2y$10$jrZfOgcYkHCv8KGCnYMtp.UGSyNv9w/LbXrhP9FXpwIGlH94EiJXK', '2019-03-17 13:31:57', '2019-03-19 22:04:46'),
(6, 'jane', '$2y$10$bCQ7uUx4JgB2g3ETWx6PF.Aej.5Vl.pgd3b/OLgo3EPF2woNFNrrW', '2019-03-17 13:40:22', '2019-03-19 22:04:46'),
(7, 'jill', '$2y$10$2qKBYlYI9zMG2uQTO6zt.uBGXnzMiScH.WIvIEaEdu0hke3ueN5zW', '2019-03-17 13:40:41', '2019-03-19 22:04:46'),
(8, 'ben', '$2y$10$ZdZDfTS6QHzBqq81eWdlQ.OKrhSzilH1dVM7m9pRHNRRYFu0yqBS.', '2019-03-17 15:10:43', '2019-03-19 22:04:46'),
(9, 'juma', '$2y$10$D/u5iI9Rwvyh1tqWOvOTZuujcsmTB2bE5COdFYBMoPDmVartJGwym', '2019-03-19 15:06:16', '2019-03-19 22:04:46'),
(10, 'tim', '$2y$10$Hft1naGuUEvkRAQ5pk7FWuzDq1MC7CCPWp1mvEmD4oWR4SykiSt1W', '2019-03-20 01:07:54', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
