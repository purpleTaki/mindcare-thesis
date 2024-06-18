-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2023 at 12:55 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mindcare`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `ID` int(12) NOT NULL,
  `appointer_name` varchar(255) NOT NULL,
  `studID` int(12) NOT NULL,
  `counselorID` int(12) NOT NULL,
  `Date` date NOT NULL,
  `Time` time(4) NOT NULL,
  `fromTime` time NOT NULL,
  `toTime` time NOT NULL,
  `DateAdded` datetime NOT NULL DEFAULT current_timestamp(),
  `Status` varchar(20) NOT NULL DEFAULT 'Pending' COMMENT '0 - pending / 1 - approved / 2 - denied\r\n',
  `DateStatus` datetime NOT NULL,
  `appointer` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 - student / 1 - counselor',
  `Remarks` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`ID`, `appointer_name`, `studID`, `counselorID`, `Date`, `Time`, `fromTime`, `toTime`, `DateAdded`, `Status`, `DateStatus`, `appointer`, `Remarks`) VALUES
(3, 'aldur', 5, 26, '2023-11-09', '18:53:00.0000', '00:00:00', '00:00:00', '2023-11-09 18:54:00', '0', '0000-00-00 00:00:00', 0, ''),
(4, 'aku', 5, 26, '2023-11-23', '09:24:00.0000', '00:00:00', '00:00:00', '2023-11-09 19:24:42', '0', '0000-00-00 00:00:00', 0, ''),
(5, 'Karl Alob', 10, 26, '2023-11-23', '16:30:00.0000', '13:00:00', '14:00:00', '0000-00-00 00:00:00', '2', '2023-12-08 14:18:06', 1, 'This Appointment is Cancelled because I have prior schedules'),
(6, 'Karl Alob', 10, 26, '2023-11-24', '08:05:00.0000', '09:00:00', '10:00:00', '2023-11-21 19:03:21', '0', '2023-11-29 19:32:08', 1, ''),
(7, 'Counselor Counselees', 10, 9, '2023-11-22', '00:00:08.0000', '00:00:00', '00:00:00', '2023-11-22 15:19:07', '0', '2023-11-27 22:39:37', 1, ''),
(8, 'Counselor Counselees', 10, 9, '2023-11-24', '00:00:00.0000', '08:00:00', '08:00:00', '2023-11-22 16:27:35', '1', '2023-11-27 22:28:30', 1, ''),
(9, 'Counselor Counselees', 10, 9, '2023-11-24', '00:00:00.0000', '08:00:00', '08:00:00', '2023-11-22 16:29:07', '1', '2023-11-27 22:28:34', 1, ''),
(10, '', 10, 9, '2023-11-30', '00:00:00.0000', '08:00:00', '08:00:00', '2023-11-22 16:30:12', '1', '2023-11-27 22:55:21', 0, ''),
(11, '', 10, 9, '2023-12-08', '00:00:00.0000', '08:00:00', '08:00:00', '2023-11-22 16:33:52', '0', '2023-11-27 22:46:59', 0, ''),
(12, '', 10, 9, '2023-12-07', '00:00:00.0000', '08:00:00', '09:00:00', '2023-11-22 16:38:22', '0', '2023-11-27 22:47:03', 0, ''),
(13, '', 10, 9, '2023-12-07', '00:00:00.0000', '09:00:00', '10:00:00', '2023-11-22 16:38:34', '1', '2023-11-27 22:28:31', 0, ''),
(14, '', 10, 9, '2023-11-30', '00:00:00.0000', '10:00:00', '11:00:00', '2023-11-25 23:40:27', '1', '2023-11-27 22:56:36', 0, ''),
(15, 'Oompa', 10, 26, '2023-12-06', '00:00:00.0000', '13:00:00', '14:00:00', '2023-11-27 19:07:25', '1', '2023-11-29 17:13:55', 0, ''),
(31, 'Oompaa Villee', 10, 26, '2023-11-30', '00:00:00.0000', '13:00:00', '14:00:00', '2023-11-29 12:04:51', '0', '0000-00-00 00:00:00', 0, ''),
(33, 'Oompaa Villee', 10, 26, '2023-12-27', '00:00:00.0000', '08:00:00', '09:00:00', '2023-12-03 05:45:34', '0', '0000-00-00 00:00:00', 0, ''),
(34, 'Oompaa Villee', 10, 26, '2023-12-27', '00:00:00.0000', '14:00:00', '15:00:00', '2023-12-03 05:45:42', '0', '0000-00-00 00:00:00', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `archivedarticles`
--

CREATE TABLE `archivedarticles` (
  `Title` varchar(255) NOT NULL,
  `ShortDec` varchar(255) NOT NULL,
  `Link` varchar(255) NOT NULL,
  `articleID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_article`
--

CREATE TABLE `tbl_article` (
  `Title` varchar(255) NOT NULL,
  `ShortDes` varchar(255) NOT NULL,
  `Link` varchar(255) NOT NULL,
  `ID` int(11) NOT NULL,
  `archived` varchar(20) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_article`
--

INSERT INTO `tbl_article` (`Title`, `ShortDes`, `Link`, `ID`, `archived`, `date_added`) VALUES
('asd', 'asd', 'asd', 19, '', '0000-00-00 00:00:00'),
('asd', 'asd', 'asd', 20, '', '0000-00-00 00:00:00'),
('6 Signs of Trauma Bonding', 'Here are 6\'\'\'\' signs of trauma bonding and tips to break the bond.', 'https://psychcentral.com/relationships/signs-of-traumatic-bonding-bonded-to-the-abuser', 22, '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mood_base`
--

CREATE TABLE `tbl_mood_base` (
  `ID` int(11) NOT NULL,
  `Mood` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mood_base`
--

INSERT INTO `tbl_mood_base` (`ID`, `Mood`) VALUES
(1, 'Happy'),
(2, 'Normal'),
(3, 'Sad'),
(4, 'Depressed');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `ID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `locker` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `yearSection` varchar(255) DEFAULT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `cnum` varchar(50) NOT NULL,
  `usertype` tinyint(2) NOT NULL COMMENT '0-student 1-counselor 2-admin',
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `active` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1- active 0-disabled',
  `notif` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1-acknowledge / 0-threshold met / 2-acknowledged'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`ID`, `username`, `password`, `locker`, `email`, `sex`, `yearSection`, `fname`, `mname`, `lname`, `cnum`, `usertype`, `date_created`, `active`, `notif`) VALUES
(5, '1920577', '123', '', 'cCydil@gmail.com', 'Croissant ', 'Grade 1', 'Cydillll', 'De', 'Cursed', '012345678', 0, '2023-11-14 19:41:03', 1, 1),
(8, 'admin', 'b36586e169d06988c3958863a69db733981ad14e', '1h&3Zctot1D$*1/P%^L/i<$l~4SG1~?Y6ac6*!T9iH3dE7D(yJ', '123@123', 'Main char', 'BSIT 5C', 'admin', 'a', 'admin', '1', 2, '2023-11-14 19:41:03', 1, 1),
(9, 'Counselor', '123', '', 'counselor@gmail.com', 'Male', NULL, 'Counselor', 'of', 'Counselees', '123456789', 1, '2023-11-14 19:41:03', 1, 1),
(10, '1920501', 'd8f54d59db3479d49ce76a59bffe42c29f7dc98b', 'nYR31)tl1RzLbajqDHA1yC?brOr3%/iZowipa~c4k1w!s68pV$', 'o@l', 'male', 'BSIT1D', 'Oompaa', 'Loompa', 'Villee', '', 0, '2023-11-14 21:28:52', 1, 1),
(26, 'counselor_alob', '86ab70425d8eeb83501f4a0bdabe072c52452289', '*?%tmUPzn\\g%?RxIRAX39L!4K1agX8MF$1&G5*3Y@%F^q*S!f1', 'email@email', 'male', '', 'Karl', 'Mali', 'Alob', '', 1, '2023-11-16 19:58:04', 1, 1),
(27, '1920088', '57053fd3448fd5492dc12087fad2572550d61732', 'z0I>!O1&u3LsS^c4#^@j@3P<(NnW6nr.Rzfj0WY)ZyVTj$IizG', 'njordu@gmail.com', 'male', 'BSIT-8A', 'Njord', 'A', 'Johansen', '', 0, '2023-11-29 20:08:16', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_mood`
--

CREATE TABLE `tbl_user_mood` (
  `ID` int(11) NOT NULL,
  `User` varchar(20) NOT NULL,
  `Mood` int(4) NOT NULL,
  `Points` int(5) NOT NULL,
  `DateAdded` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_mood`
--

INSERT INTO `tbl_user_mood` (`ID`, `User`, `Mood`, `Points`, `DateAdded`) VALUES
(1, '10', 4, 2, '2023-11-20 21:47:04'),
(2, '10', 3, 1, '2023-11-20 21:52:27'),
(3, '10', 4, 2, '2023-11-20 22:19:06'),
(4, '10', 3, 1, '2023-11-20 23:30:15'),
(5, '10', 4, 2, '2023-11-21 00:08:06'),
(6, '10', 4, 2, '2023-11-21 00:08:11'),
(7, '10', 4, 2, '2023-11-21 00:08:21'),
(8, '10', 4, 2, '2023-11-21 00:08:32'),
(9, '10', 4, 2, '2023-11-21 00:08:36'),
(10, '10', 1, -2, '2023-11-21 15:55:27'),
(11, '10', 1, -2, '2023-11-25 23:41:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `archivedarticles`
--
ALTER TABLE `archivedarticles`
  ADD PRIMARY KEY (`articleID`);

--
-- Indexes for table `tbl_article`
--
ALTER TABLE `tbl_article`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_mood_base`
--
ALTER TABLE `tbl_mood_base`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_user_mood`
--
ALTER TABLE `tbl_user_mood`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `ID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `archivedarticles`
--
ALTER TABLE `archivedarticles`
  MODIFY `articleID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_article`
--
ALTER TABLE `tbl_article`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_mood_base`
--
ALTER TABLE `tbl_mood_base`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_user_mood`
--
ALTER TABLE `tbl_user_mood`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
