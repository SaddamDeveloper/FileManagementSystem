-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2018 at 02:16 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digitallibrary`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `adminID` varchar(20) NOT NULL,
  `adminName` varchar(200) NOT NULL,
  `schoolID` varchar(20) NOT NULL,
  `password` varchar(300) NOT NULL,
  `createdOn` datetime NOT NULL,
  `lastLogin` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`adminID`, `adminName`, `schoolID`, `password`, `createdOn`, `lastLogin`) VALUES
('ADM2018001', 'Himanshu Saikia', '1001', '$2y$11$50c96685398647ac29dbeuW/Whb1Sy.LkOSLnBXwl6NZdNctyHX4m', '2018-02-07 13:42:54', '2018-12-01 14:31:29');

-- --------------------------------------------------------

--
-- Table structure for table `data_access_list`
--

CREATE TABLE `data_access_list` (
  `viewID` int(11) NOT NULL,
  `viewerID` varchar(20) NOT NULL,
  `dataID` varchar(30) NOT NULL,
  `timing` datetime NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `schoolID` varchar(20) NOT NULL,
  `board` varchar(100) NOT NULL,
  `schoolName` varchar(200) NOT NULL,
  `availability` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`schoolID`, `board`, `schoolName`, `availability`) VALUES
('1001', 'MBOSE', 'DEMO SCHOOL', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `studentID` varchar(20) NOT NULL,
  `schoolID` varchar(20) NOT NULL,
  `courseID` varchar(20) NOT NULL,
  `firstName` varchar(200) NOT NULL,
  `lastName` varchar(200) NOT NULL,
  `rollNo` varchar(50) NOT NULL,
  `studentAddress` varchar(500) NOT NULL,
  `studentMobile` varchar(10) NOT NULL,
  `password` varchar(300) NOT NULL,
  `availability` varchar(50) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `imageName` varchar(200) NOT NULL,
  `imageType` varchar(100) NOT NULL,
  `imageData` mediumblob NOT NULL,
  `createdOn` datetime NOT NULL,
  `lastLogin` datetime NOT NULL,
  `totalVisits` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`studentID`, `schoolID`, `courseID`, `firstName`, `lastName`, `rollNo`, `studentAddress`, `studentMobile`, `password`, `availability`, `gender`, `imageName`, `imageType`, `imageData`, `createdOn`, `lastLogin`, `totalVisits`) VALUES
('STU2018001', '1001', 'MBGEN08', 'Saddam', 'Hussain', '23', 'Vill- Bardoloni No 4 P.O- Satrakanara', '8486935380', '$2y$11$a1d7096e5cc85bf96754cuCtLLEQi4A.pILps8Xi2H7GGWgWhcLSO', 'available', 'Male', '', '', 0x30, '2018-12-01 14:31:16', '0000-00-00 00:00:00', '4');

-- --------------------------------------------------------

--
-- Table structure for table `studentsubject`
--

CREATE TABLE `studentsubject` (
  `studentID` varchar(20) NOT NULL,
  `subjectID` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentsubject`
--

INSERT INTO `studentsubject` (`studentID`, `subjectID`) VALUES
('STU2018001', 'MBGEN08GEN563'),
('STU2018001', 'MBGEN08GEN616');

-- --------------------------------------------------------

--
-- Table structure for table `teachersubject`
--

CREATE TABLE `teachersubject` (
  `teacherID` varchar(20) NOT NULL,
  `subjectID` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `data_access_list`
--
ALTER TABLE `data_access_list`
  ADD PRIMARY KEY (`viewID`),
  ADD KEY `dataID` (`dataID`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`schoolID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`studentID`),
  ADD KEY `courseID` (`courseID`),
  ADD KEY `schoolID` (`schoolID`);

--
-- Indexes for table `studentsubject`
--
ALTER TABLE `studentsubject`
  ADD KEY `studentsubject_ibfk_1` (`studentID`),
  ADD KEY `studentsubject_ibfk_2` (`subjectID`);

--
-- Indexes for table `teachersubject`
--
ALTER TABLE `teachersubject`
  ADD KEY `subjectID` (`subjectID`),
  ADD KEY `teacherID` (`teacherID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_access_list`
--
ALTER TABLE `data_access_list`
  MODIFY `viewID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `studentsubject`
--
ALTER TABLE `studentsubject`
  ADD CONSTRAINT `studentsubject_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `students` (`studentID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
