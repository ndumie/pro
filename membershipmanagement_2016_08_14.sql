-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2016 at 09:00 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `membershipmanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
`id` int(11) NOT NULL,
  `memberslevel` int(4) NOT NULL,
  `name` varchar(40) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `memberslevel`, `name`, `username`, `password`, `email`, `created_at`, `modified_at`) VALUES
(1, 1, 'ndumiso mbete', 'admin', 'ayabonga', 'anoyolo@gmail.com', '2016-02-15 20:13:13', '2016-06-18 16:56:16'),
(2, 2, 'odwa', 'odwa', 'odwa123', 'odwa@gmail.com', '2016-02-15 20:18:07', '2016-02-15 20:18:07'),
(3, 0, 'Andisiwe', 'Noludwe', 'Noludwe', 'andyniludwe@gmail.com', '2016-06-13 22:17:34', '2016-06-13 22:17:34'),
(7, 0, 'Avuyile', '', '', 'Bakajana@gmail.com', '2016-06-18 17:11:03', '2016-06-18 17:11:03'),
(8, 0, 'ndumiso', '', '', 'xmbete@gmail.com', '2016-06-19 01:14:31', '2016-06-19 01:14:31'),
(9, 0, 'ndumiso mbete', '', '', 'asivikele@gmail.com', '2016-06-19 01:19:18', '2016-06-19 01:19:18');

-- --------------------------------------------------------

--
-- Table structure for table `membershipcards`
--

CREATE TABLE IF NOT EXISTS `membershipcards` (
`cardNo` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `membersId` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modefied_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
`id` int(11) NOT NULL,
  `paymentsDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nextpaymentsDate` datetime NOT NULL,
  `amount` int(11) NOT NULL,
  `membersId` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modefied_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `paymentsDate`, `nextpaymentsDate`, `amount`, `membersId`, `created_at`, `modefied_at`) VALUES
(13, '2016-06-19 03:28:46', '0000-00-00 00:00:00', 80, 1, '2016-06-19 01:28:46', '2016-06-19 01:28:46'),
(14, '2016-06-19 03:28:46', '0000-00-00 00:00:00', 80, 2, '2016-06-19 01:28:46', '2016-06-19 01:28:46'),
(16, '2016-06-19 05:08:18', '0000-00-00 00:00:00', 90, 1, '2016-06-19 03:08:18', '2016-06-19 03:08:18'),
(17, '2016-06-19 05:12:40', '0000-00-00 00:00:00', 100, 1, '2016-06-19 03:12:40', '2016-06-19 03:12:40'),
(18, '2016-06-19 05:22:52', '0000-00-00 00:00:00', 200, 1, '2016-06-19 03:22:52', '2016-06-19 03:22:52'),
(19, '2016-06-19 05:24:26', '0000-00-00 00:00:00', 200, 1, '2016-06-19 03:24:26', '2016-06-19 03:24:26'),
(20, '2016-06-19 05:25:07', '0000-00-00 00:00:00', 90, 1, '2016-06-19 03:25:07', '2016-06-19 03:25:07'),
(21, '2016-06-19 15:48:53', '0000-00-00 00:00:00', 90, 1, '2016-06-19 13:48:53', '2016-06-19 13:48:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `members`
--
ALTER TABLE `members`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `membershipcards`
--
ALTER TABLE `membershipcards`
 ADD PRIMARY KEY (`cardNo`), ADD KEY `membersId` (`membersId`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
 ADD PRIMARY KEY (`id`), ADD KEY `membersId` (`membersId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `membershipcards`
--
ALTER TABLE `membershipcards`
MODIFY `cardNo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `membershipcards`
--
ALTER TABLE `membershipcards`
ADD CONSTRAINT `membershipcards_ibfk_1` FOREIGN KEY (`membersId`) REFERENCES `members` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`membersId`) REFERENCES `members` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
