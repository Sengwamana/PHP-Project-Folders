-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2021 at 06:04 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apartment-visitor-nb`
--

-- --------------------------------------------------------

--
-- Table structure for table `apartment`
--

CREATE TABLE `apartment` (
  `ID` int(11) NOT NULL,
  `apartment_number` varchar(255) NOT NULL,
  `building_number` varchar(20) NOT NULL,
  `apartment_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `apartment`
--

INSERT INTO `apartment` (`ID`, `apartment_number`, `building_number`, `apartment_status`) VALUES
(6, '201', 'C', 'Empty'),
(7, '269', 'A', 'Owned'),
(8, '333', 'D', 'Owned'),
(9, '69', 'B', 'Owned'),
(10, '255', 'B', 'Empty'),
(11, '86', 'A', 'Empty'),
(12, '179', 'A', 'Empty'),
(13, '321', 'D', 'Owned'),
(14, '203', 'B', 'Owned'),
(15, '888', 'A', 'Owned'),
(16, '170', 'C', 'Owned'),
(17, '401', 'A', 'Empty'),
(18, '444', 'D', 'Owned'),
(19, '580', 'A', 'Owned');

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(5) NOT NULL,
  `AdminName` varchar(45) DEFAULT NULL,
  `UserName` char(45) DEFAULT NULL,
  `Security_Code` int(50) NOT NULL,
  `MobileNumber` bigint(11) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `Security_Code`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Administrator', 'admin', 1010, 7898799797, 'admin@gmail.com', 'd00f5d5217896fb7fd601412cb890830', '2020-04-22 03:35:37');

-- --------------------------------------------------------

--
-- Table structure for table `tblvisitor`
--

CREATE TABLE `tblvisitor` (
  `ID` int(5) NOT NULL,
  `VisitorName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(11) DEFAULT NULL,
  `Address` varchar(250) DEFAULT NULL,
  `Gender` varchar(11) NOT NULL,
  `Apartment` varchar(120) NOT NULL,
  `BuildingNo` varchar(55) NOT NULL,
  `WhomtoMeet` varchar(120) DEFAULT NULL,
  `Reason` varchar(120) DEFAULT NULL,
  `EnterDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `remark` varchar(255) DEFAULT NULL,
  `outtime` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblvisitor`
--

INSERT INTO `tblvisitor` (`ID`, `VisitorName`, `MobileNumber`, `Address`, `Gender`, `Apartment`, `BuildingNo`, `WhomtoMeet`, `Reason`, `EnterDate`, `remark`, `outtime`) VALUES
(1, 'Mark', 1478520000, '2915 Brannon Street', 'Male', '201', 'C', 'Billy', 'Product Delivery', '2019-07-12 06:11:53', 'OK.', '2021-09-12 05:14:20'),
(2, 'Russell Womble', 14789632140, '1726 Mapleview Drive', 'Male', '333', 'D', 'Jeniffer', 'Relative: Meetups', '2019-06-27 06:41:05', 'OK', '2021-09-12 05:15:54'),
(3, 'TestAcc', 7850000010, 'Sample Address', 'Male', '203', 'B', 'TestAccount', 'Official Works', '2019-04-03 06:42:40', 'ok', '2021-09-12 05:13:21'),
(4, 'Eric Woodruff', 1234567890, '2471 Godfrey Street', 'Others', '321', 'D', 'Xavier', 'Personal', '2019-07-12 15:52:09', 'Out', '2021-09-12 05:12:54'),
(5, 'Evelyn Morrison', 2580000010, '4237 Golden Street', 'Male', '888', 'A', 'Simuu', 'Personal', '2019-07-12 15:56:42', 'Out', '2021-09-12 05:16:40'),
(10, 'Brandon', 7896547800, '2562 Stoneybrook Road', 'Male', '201', '        C    ', 'Billy', 'Meetup', '2021-03-10 14:04:53', 'OUT', '2021-09-12 05:17:42'),
(11, 'Colin Greenwood', 2547778569, 'NYStreet 12', 'Male', '333', '        D    ', 'Thomas', 'Invitation', '2021-03-12 14:41:57', 'none', '2021-09-11 15:59:45'),
(12, 'Willie Downs', 7101010101, '7777 Bleck Street', 'Male', '255', '        B    ', 'Sophie', 'Some official works', '2021-09-11 15:58:59', 'none', '2021-09-11 16:28:37'),
(13, 'Betty Nicholas', 7111111110, '699 Fantages Way', 'Female', '86', '        A    ', 'Thom Hudson', 'weekly checkup', '2021-09-12 05:07:35', 'none..', '2021-09-12 15:29:18'),
(14, 'Kevin', 7890000000, '3760 Alpha Avenue', 'Male', '333', '        D    ', 'Thomas', 'sample reason', '2021-09-12 05:09:55', NULL, NULL),
(15, 'Eddie Bryan', 7014444444, '7851 Bleck Street', 'Male', '170', '        C    ', 'Philip', 'sample reason', '2021-09-12 05:19:37', 'Sample Remarks', '2021-09-12 15:39:18'),
(16, 'Bryan', 700000010, '123 Demo Address', 'Male', '580', '        A    ', 'Ellen', 'Demo Reasons', '2021-09-12 15:38:00', 'This is a sample text for remarks!', '2021-09-12 15:38:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apartment`
--
ALTER TABLE `apartment`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblvisitor`
--
ALTER TABLE `tblvisitor`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apartment`
--
ALTER TABLE `apartment`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tblvisitor`
--
ALTER TABLE `tblvisitor`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
