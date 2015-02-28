-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2015 at 01:39 PM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

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
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` text NOT NULL,
  `period` varchar(10) NOT NULL,
  `remarks` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dtr`
--

INSERT INTO `dtr` (`dtrid`, `room`, `day`, `time`, `fid`, `datetime`, `status`, `period`, `remarks`) VALUES
(1, 1, 'TUESDAY', '1:00-3:00', 5, '2015-01-12 04:55:11', 'ABSENT', '2nd', 'uu'),
(2, 1, 'TUESDAY', '1:00-3:00', 5, '2015-01-12 04:56:21', 'ABSENT', '2nd', 'uu');

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
(2, 'QUILALA', 'THEDA FLARE', 'C', 'e5fa0-chrysanthemum.jpg'),
(3, 'CANLAS', 'HAREN', 'E', '75c1a-koala.jpg'),
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

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
(13, 10, '2015-01-12 04:58:35', 'LOG-OUT');

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
  `fid` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`roomid`, `roomcode`, `sectioncode`, `ccode`, `day`, `time`, `period`, `fid`) VALUES
(1, 'EC1', '1', '1', 'TUESDAY', '12:00 PM- 3-:00 PM ', '1st', '5'),
(3, '1', '1', '1', 'TUESDAY', '1:00-3:00', '2nd', '5');

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
(1, 'admin', 'admin', 'a', '123700', '<p>\r\n	Tarlac</p>\r\n', 'admin@admin.com', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', '2015-01-01', 1, 0, '4d7eb-tulips.jpg'),
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
-- Indexes for table `sections`
--
ALTER TABLE `sections`
 ADD PRIMARY KEY (`secid`);

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
MODIFY `dtrid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
MODIFY `logid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
MODIFY `roomid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
MODIFY `secid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
