-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2019 at 11:47 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wamuiga_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `fingerprints`
--

CREATE TABLE `fingerprints` (
  `f_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `fingerprint_data` text NOT NULL,
  `finger_type_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `finger_type`
--

CREATE TABLE `finger_type` (
  `finger_type_id` int(5) NOT NULL,
  `finger_name` varchar(50) NOT NULL,
  `finger_abbrev` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `finger_type`
--

INSERT INTO `finger_type` (`finger_type_id`, `finger_name`, `finger_abbrev`) VALUES
(11, 'Right Thumb', 'RT'),
(12, 'Right Index Finger', 'RIF'),
(13, 'Right Middle Finger', 'RMF'),
(14, 'Right Ring Finger', 'RRF'),
(15, 'Right Small Finger', 'RSF'),
(16, 'Left Thumb', 'LT'),
(17, 'Left Index Finger', 'LIF'),
(18, 'Left Middle Finger', 'LMF'),
(19, 'Left Ring finger', 'LRF'),
(20, 'Left Small Finger', 'LSF');

-- --------------------------------------------------------

--
-- Table structure for table `login_session_ids`
--

CREATE TABLE `login_session_ids` (
  `s_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `session_id` varchar(200) NOT NULL,
  `date_created` datetime NOT NULL,
  `lifetime` int(10) NOT NULL DEFAULT '10800',
  `date_logged_out` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `role_types`
--

CREATE TABLE `role_types` (
  `role_id` int(5) NOT NULL,
  `role_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_types`
--

INSERT INTO `role_types` (`role_id`, `role_name`) VALUES
(1, 'ADMINISTRATOR'),
(2, 'DOCTOR');

-- --------------------------------------------------------

--
-- Table structure for table `user_accounts`
--

CREATE TABLE `user_accounts` (
  `u_id` int(11) NOT NULL,
  `surname` varchar(25) NOT NULL,
  `other_names` varchar(60) NOT NULL,
  `national_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_accounts`
--

INSERT INTO `user_accounts` (`u_id`, `surname`, `other_names`, `national_id`, `username`, `password`) VALUES
(1, 'admin', 'first_name_is_admin', 11223344, 'admin', 'admin'),
(8, 'Munene', 'James', 3329, 'munene', 'munene');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `user_role_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`user_role_id`, `u_id`, `role_id`) VALUES
(1, 1, 1),
(2, 8, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fingerprints`
--
ALTER TABLE `fingerprints`
  ADD PRIMARY KEY (`f_id`),
  ADD KEY `user_account_fingerprints` (`u_id`),
  ADD KEY `finger_type_fingerprint` (`finger_type_id`);

--
-- Indexes for table `finger_type`
--
ALTER TABLE `finger_type`
  ADD PRIMARY KEY (`finger_type_id`);

--
-- Indexes for table `login_session_ids`
--
ALTER TABLE `login_session_ids`
  ADD PRIMARY KEY (`s_id`),
  ADD KEY `user_account_session_id` (`u_id`);

--
-- Indexes for table `role_types`
--
ALTER TABLE `role_types`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `user_accounts`
--
ALTER TABLE `user_accounts`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`user_role_id`),
  ADD KEY `user_account_user_role` (`u_id`),
  ADD KEY `role_types_user_roles` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fingerprints`
--
ALTER TABLE `fingerprints`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `finger_type`
--
ALTER TABLE `finger_type`
  MODIFY `finger_type_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `login_session_ids`
--
ALTER TABLE `login_session_ids`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `role_types`
--
ALTER TABLE `role_types`
  MODIFY `role_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_accounts`
--
ALTER TABLE `user_accounts`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `user_role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fingerprints`
--
ALTER TABLE `fingerprints`
  ADD CONSTRAINT `finger_type_fingerprint` FOREIGN KEY (`finger_type_id`) REFERENCES `finger_type` (`finger_type_id`),
  ADD CONSTRAINT `user_account_fingerprints` FOREIGN KEY (`u_id`) REFERENCES `user_accounts` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `login_session_ids`
--
ALTER TABLE `login_session_ids`
  ADD CONSTRAINT `user_account_session_id` FOREIGN KEY (`u_id`) REFERENCES `user_accounts` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `role_types_user_roles` FOREIGN KEY (`role_id`) REFERENCES `role_types` (`role_id`),
  ADD CONSTRAINT `user_account_user_role` FOREIGN KEY (`u_id`) REFERENCES `user_accounts` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
