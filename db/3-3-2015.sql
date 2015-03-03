-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3333
-- Generation Time: Mar 03, 2015 at 04:38 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `schoolmon`
--

-- --------------------------------------------------------

--
-- Table structure for table `college`
--

CREATE TABLE IF NOT EXISTS `college` (
`cid` int(11) NOT NULL,
  `ccode` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `dean` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `college`
--

INSERT INTO `college` (`cid`, `ccode`, `name`, `dean`) VALUES
(1, 'CCS', 'COLLEGE OF COMPUTER STUDIES', 'MARLON GAMIDO'),
(2, 'CASS', 'COLLEGE OF ARTS AND SOCIAL SCIENCES', 'MACARAEG'),
(3, 'CBA', 'COLLEGE OF BUSINESS ADMINISTRATION', 'MIKAELA SAGUN'),
(4, 'COE', 'COLLEGE OF ENGINEERING', 'MIRIAM GALVES'),
(5, 'COED', 'COLLEGE OF EDUCATION', 'ENGR. ADONIS AVIGUETERO JR.');

-- --------------------------------------------------------

--
-- Table structure for table `dtr`
--

CREATE TABLE IF NOT EXISTS `dtr` (
`dtrid` int(11) NOT NULL,
  `room` int(25) NOT NULL,
  `day` varchar(25) NOT NULL,
  `time` varchar(25) NOT NULL,
  `fid` int(11) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` text NOT NULL,
  `period` varchar(10) NOT NULL,
  `remarks` text NOT NULL,
  `checker` varchar(200) NOT NULL,
  `collegeid` int(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dtr`
--

INSERT INTO `dtr` (`dtrid`, `room`, `day`, `time`, `fid`, `datetime`, `status`, `period`, `remarks`, `checker`, `collegeid`) VALUES
(20, 117, 'Tuesday', '1:00-3:00 PM', 3, '2015-03-03 16:16:04', 'ABSENT', '2nd', 'sdfgsdfgsdfg', 'me check', 1);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE IF NOT EXISTS `faculty` (
`fid` int(11) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `mi` varchar(255) NOT NULL,
  `file_url` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`fid`, `lastname`, `firstname`, `mi`, `file_url`) VALUES
(2, 'aaron', 'garcia', 'C', 'e5fa0-chrysanthemum.jpg'),
(3, 'canlas', 'haren', 'E', '8e2a3-portfolio-nature-small.jpg'),
(4, 'GAMIDO', 'HEIDILYN', 'V', 'a6562-hydrangeas.jpg'),
(5, 'DELOS REYES', 'EDJIE', 'D', '98764-tulips.jpg'),
(6, 'MERCADO', 'RONIIE', 'M', '4458f-desert.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
`logid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `logdatetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`logid`, `userid`, `logdatetime`, `status`) VALUES
(1, 10, '2015-01-12 01:30:40', 'LOG-OUT'),
(2, 1, '2015-01-12 01:30:57', 'LOG-IN'),
(3, 2, '2015-01-12 01:50:20', 'LOG-IN'),
(4, 2, '2015-01-12 01:50:43', 'LOG-IN'),
(5, 2, '2015-01-12 01:53:38', 'LOG-IN'),
(6, 2, '2015-01-12 01:54:29', 'LOG-OUT'),
(7, 10, '2015-01-12 02:14:33', 'LOG-IN'),
(8, 10, '2015-01-12 02:17:06', 'LOG-OUT'),
(9, 10, '2015-01-12 02:27:13', 'LOG-IN'),
(10, 10, '2015-01-12 02:46:41', 'LOG-IN'),
(11, 10, '2015-01-12 03:37:59', 'LOG-OUT'),
(12, 10, '2015-01-12 03:44:09', 'LOG-IN'),
(13, 10, '2015-01-12 04:58:35', 'LOG-OUT'),
(14, 10, '2015-02-18 06:18:22', 'LOG-IN'),
(15, 10, '2015-02-18 06:20:38', 'LOG-IN'),
(16, 10, '2015-02-18 06:24:05', 'LOG-OUT'),
(17, 10, '2015-02-18 06:25:02', 'LOG-IN'),
(18, 10, '2015-02-25 08:54:27', 'LOG-IN'),
(19, 10, '2015-02-25 08:57:23', 'LOG-OUT'),
(20, 10, '2015-02-28 18:29:41', 'LOG-IN'),
(21, 10, '2015-02-28 18:37:10', 'LOG-OUT'),
(22, 10, '2015-02-28 18:37:40', 'LOG-IN'),
(23, 10, '2015-02-28 18:40:22', 'LOG-OUT'),
(24, 10, '2015-02-28 18:40:26', 'LOG-IN'),
(25, 10, '2015-02-28 18:40:28', 'LOG-OUT'),
(26, 10, '2015-02-28 21:55:03', 'LOG-IN'),
(27, 10, '2015-02-28 23:15:32', 'LOG-OUT'),
(28, 10, '2015-02-28 23:35:34', 'LOG-IN'),
(29, 10, '2015-03-03 07:24:54', 'LOG-IN'),
(30, 10, '2015-03-04 07:25:34', 'LOG-IN'),
(31, 10, '2015-03-04 07:28:16', 'LOG-IN'),
(32, 10, '2015-03-04 07:52:00', 'LOG-OUT'),
(33, 10, '2015-03-05 08:08:23', 'LOG-IN'),
(34, 10, '2015-03-06 08:08:40', 'LOG-IN');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE IF NOT EXISTS `rooms` (
`roomid` int(11) NOT NULL,
  `roomcode` varchar(255) NOT NULL,
  `sectioncode` varchar(255) NOT NULL,
  `ccode` varchar(255) NOT NULL,
  `day` varchar(25) NOT NULL,
  `time` varchar(255) NOT NULL,
  `period` varchar(10) NOT NULL,
  `fid` varchar(255) NOT NULL,
  `sy` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=144 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`roomid`, `roomcode`, `sectioncode`, `ccode`, `day`, `time`, `period`, `fid`, `sy`) VALUES
(116, 'CCS-2/INTERNET LAB.', '1', '1', 'Monday', '1:00-5:30 PM', '1st', '0', 0),
(117, 'CCS-6', '2', '1', 'Tuesday', '1:00-3:00 PM', '2nd', '3', 0),
(118, 'CCS-7/STUDENT CENTER', '0', '1', 'Wednesday', '1:00-3:00 PM', '3rd', '0', 0),
(119, 'LAB-3', '0', '1', 'Thursday', '1:00-5:30 PM', '4th', '0', 0),
(120, 'LAB-2', '0', '1', 'Friday', '1:00-5:30 PM', '5th', '0', 0),
(121, 'CISCO LAB.', '0', '1', 'Saturday', '1:00-5:30 PM', '6th', '0', 0),
(122, 'CCS -4', '0', '1', 'Sunday', '1:00-4:00 PM', '7th', '0', 0),
(123, 'CCS-2/INTERNET LAB.', '1', '1', 'Monday', '1:00-5:30 PM', '1st', '0', 0),
(124, 'CCS-6', '2', '1', 'Tuesday', '1:00-3:00 PM', '2nd', '3', 0),
(125, 'CCS-7/STUDENT CENTER', '0', '1', 'Wednesday', '1:00-3:00 PM', '3rd', '0', 0),
(126, 'LAB-3', '0', '1', 'Thursday', '1:00-5:30 PM', '4th', '0', 0),
(127, 'LAB-2', '0', '1', 'Friday', '1:00-5:30 PM', '5th', '0', 0),
(128, 'CISCO LAB.', '0', '1', 'Saturday', '1:00-5:30 PM', '6th', '0', 0),
(129, 'CCS -4', '0', '1', 'Sunday', '1:00-4:00 PM', '7th', '0', 0),
(130, 'CCS-2/INTERNET LAB.', '1', '1', 'Monday', '1:00-5:30 PM', '1st', '0', 8),
(131, 'CCS-6', '2', '1', 'Tuesday', '1:00-3:00 PM', '2nd', '3', 8),
(132, 'CCS-7/STUDENT CENTER', '0', '1', 'Wednesday', '1:00-3:00 PM', '3rd', '0', 8),
(133, 'LAB-3', '0', '1', 'Thursday', '1:00-5:30 PM', '4th', '0', 8),
(134, 'LAB-2', '0', '1', 'Friday', '1:00-5:30 PM', '5th', '0', 8),
(135, 'CISCO LAB.', '0', '1', 'Saturday', '1:00-5:30 PM', '6th', '0', 8),
(136, 'CCS -4', '0', '1', 'Sunday', '1:00-4:00 PM', '7th', '0', 8),
(137, 'CCS-2/INTERNET LAB.', '1', '1', 'WEDNESDAY & FRIDAY', '1:00-5:30 PM', '1st', '5', 3),
(138, 'CCS-6', '2', '1', 'WEDNESDAY & FRIDAY', '2:00-4:00 PM', '2nd', '3', 9),
(139, 'CCS-7/STUDENT CENTER', '0', '1', 'Wednesday', '1:00-3:00 PM', '3rd', '0', 9),
(140, 'LAB-3', '0', '1', 'Thursday', '1:00-5:30 PM', '4th', '0', 9),
(141, 'LAB-2', '0', '1', 'Friday', '1:00-5:30 PM', '5th', '0', 9),
(142, 'CISCO LAB.', '0', '1', 'Saturday', '1:00-5:30 PM', '6th', '0', 9),
(143, 'CCS -4', '0', '1', 'Sunday', '1:00-4:00 PM', '7th', '0', 9);

-- --------------------------------------------------------

--
-- Table structure for table `schedule_imports`
--

CREATE TABLE IF NOT EXISTS `schedule_imports` (
`id` int(10) unsigned NOT NULL,
  `imported` int(1) NOT NULL DEFAULT '0',
  `filename` varchar(255) NOT NULL,
  `filepath` varchar(255) NOT NULL,
  `savepath` varchar(255) NOT NULL,
  `uploaded` varchar(255) NOT NULL,
  `size` int(10) NOT NULL,
  `uploaded_by_id` int(10) NOT NULL,
  `uploaded_by_name` varchar(255) NOT NULL,
  `uploaded_by_uname` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule_imports`
--

INSERT INTO `schedule_imports` (`id`, `imported`, `filename`, `filepath`, `savepath`, `uploaded`, `size`, `uploaded_by_id`, `uploaded_by_name`, `uploaded_by_uname`, `created_at`, `updated_at`) VALUES
(19, 0, '1425190562_6e8a7ae54ee09c637e206d85091af951.csv', 'C:/xampp/htdocs/schoolmon/imports/', 'C:/xampp/htdocs/schoolmon/imports/1425190562_6e8a7ae54ee09c637e206d85091af951.csv', 'sample_upload_schedule.csv', 0, 1, 'admin-admin', 'admin@admin.com', '2015-03-01 07:16:02', '2015-03-01 07:16:02');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE IF NOT EXISTS `sections` (
`secid` int(11) NOT NULL,
  `sectioncode` varchar(255) NOT NULL,
  `ccode` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`secid`, `sectioncode`, `ccode`) VALUES
(1, 'BSIT1', '1'),
(2, 'BSIT2', '1');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE IF NOT EXISTS `semester` (
`id` int(10) unsigned NOT NULL,
  `code` varchar(200) NOT NULL,
  `year_from` int(4) NOT NULL,
  `year_to` int(4) NOT NULL,
  `current` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `comment` text NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`id`, `code`, `year_from`, `year_to`, `current`, `created_at`, `updated_at`, `comment`, `status`) VALUES
(1, 'last', 2015, 2016, 0, '2015-02-25 13:59:50', '2015-02-25 14:53:22', 'this will be the greates year of all/', 0),
(2, 'first', 2000, 2013, 0, '2015-02-25 14:02:45', '2015-02-25 14:53:15', 'test', 0),
(3, 'bvbvbvbvbvbvb', 1111, 2222, 0, '2015-02-25 14:05:04', '2015-02-25 14:45:59', 'aaaaaaaaaaaaaaaaaaaaaaaaaaa', 0),
(4, 'dfasdf', 3423, 2423, 1, '2015-02-25 14:05:50', '2015-02-25 14:05:50', 'asfasdfsd', 0),
(5, 'first sem', 2013, 2014, 1, '2015-02-25 15:00:17', '2015-02-25 15:00:17', 'trest', 0),
(6, 'second', 2015, 2090, 0, '2015-02-25 15:05:22', '2015-02-25 15:05:30', '2016', 0),
(7, 'first sem', 2015, 2016, 1, '2015-02-25 16:22:28', '2015-02-25 16:22:55', 'testament', 0),
(8, 'second', 2015, 2016, 0, '2015-02-28 17:33:57', '2015-02-28 17:33:57', 'test', 1),
(9, 'First Semester of 2015 - 2016', 2015, 2016, 1, '2015-03-01 02:59:56', '2015-03-01 02:59:56', 'test', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`userid` int(11) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `mi` varchar(255) NOT NULL,
  `contactno` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `datejoin` date NOT NULL,
  `status` int(11) NOT NULL,
  `userlevel` int(11) NOT NULL,
  `profile_img` varchar(255) NOT NULL DEFAULT 'NA'
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `lastname`, `firstname`, `mi`, `contactno`, `address`, `email`, `password`, `datejoin`, `status`, `userlevel`, `profile_img`) VALUES
(1, 'admin', 'admin', 'a', '123700', '<p>\r\n	Tarlac</p>\r\n', 'admin@admin.com', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', '2015-01-01', 1, 0, '8b4c4-1.5.png'),
(2, 'chum', 'cham cham', 's', '123123', '<p>\r\n	tarlac</p>\r\n', 'chumchum@gmail.com', '96a7c27f36fe80e554ab6d836e4369847b41dc9f', '2015-01-12', 1, 1, '50c89-koala.jpg'),
(3, 'Santiago', 'Jan Charlo', 'Q.', '09174882399', '<p>\r\n	Tibag, Tarlac City</p>\r\n', 'jancharlo005@gmail.com', '', '2015-01-12', 1, 0, '1326b-jc.jpg'),
(4, 'De Guzman ', 'Monette', '', '', '', 'monette@checker.com', '67a2761c081c355a8ea524e0d189008bdf34ba3a', '2015-01-12', 1, 2, 'e4fb3-koala.jpg'),
(5, 'Carlos', 'Cierana', '', '', '', 'cierina@checker.com', '46fdb9c63a61137c91be6ca177c3db7e914c3df9', '2015-01-12', 1, 2, '68373-koala.jpg'),
(6, 'Obiena', 'Andress Josephus', '', '', '', 'andress@checker.com', 'a72a2f5bcab8cb3313dffbfc37bc5c7f421c6cc4', '2015-01-12', 1, 2, 'baeed-andress.jpg'),
(7, 'Zapata', 'Raymond', '', '', '', 'raymond@checker.com', '324535bd233c3a3163a38cecf4b38c24c1e47f18', '2015-01-12', 1, 2, '372d1-raymond.jpg'),
(8, 'Teofilo', 'Elena May', '', '', '', 'elena@ckecker.com', '62ac9e2aa4535064c0e60d45964015b0c71d09aa', '2015-01-12', 1, 2, '945e6-elena.jpg'),
(9, 'Tuazon ', 'Estelita', '', '', '', 'estelita@checker.com', 'd38e2d19c5a66eecfcbc04b515db40f48daaa6cc', '2015-01-12', 1, 2, '7d9e5-estelita.jpg'),
(10, 'check', 'me', 'n.', '09987678653', '<p>\r\n	Tarlac State University</p>\r\n', 'checker@checker.com', '1010cdba503627f8a4b170695fe335df47e4f7c3', '2015-01-12', 1, 2, 'e2691-jellyfish.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `college`
--
ALTER TABLE `college`
 ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `dtr`
--
ALTER TABLE `dtr`
 ADD PRIMARY KEY (`dtrid`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
 ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
 ADD PRIMARY KEY (`logid`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
 ADD PRIMARY KEY (`roomid`);

--
-- Indexes for table `schedule_imports`
--
ALTER TABLE `schedule_imports`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
 ADD PRIMARY KEY (`secid`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `college`
--
ALTER TABLE `college`
MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `dtr`
--
ALTER TABLE `dtr`
MODIFY `dtrid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
MODIFY `logid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
MODIFY `roomid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=144;
--
-- AUTO_INCREMENT for table `schedule_imports`
--
ALTER TABLE `schedule_imports`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
MODIFY `secid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
