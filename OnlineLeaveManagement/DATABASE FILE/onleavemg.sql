-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2021 at 04:40 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onleavemg`
--

-- --------------------------------------------------------

--
-- Table structure for table `employeeblood`
--

CREATE TABLE `employeeblood` (
  `bId` int(11) NOT NULL,
  `bName` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employeeblood`
--

INSERT INTO `employeeblood` (`bId`, `bName`) VALUES
(1, 'AB+'),
(2, 'AB-'),
(3, 'A+'),
(4, 'A-'),
(5, 'B+'),
(6, 'B-'),
(7, 'O+'),
(8, 'O-');

-- --------------------------------------------------------

--
-- Table structure for table `employeedepartment`
--

CREATE TABLE `employeedepartment` (
  `dptId` int(11) NOT NULL,
  `dptName` varchar(100) DEFAULT NULL,
  `dptEmployeeCodeNumberWhoAddDept` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employeedepartment`
--

INSERT INTO `employeedepartment` (`dptId`, `dptName`, `dptEmployeeCodeNumberWhoAddDept`) VALUES
(1, 'BOE', 'BOE0001'),
(2, 'Presentation', 'BOE0001'),
(3, 'Personnel', 'BOE0001'),
(4, 'Production', 'BOE0001'),
(5, 'Sales & Marketing', 'BOE0001'),
(6, 'Operations', 'BOE0001'),
(7, 'Customer Support', 'BOE0001'),
(8, 'Test Team', 'BOE0001');

-- --------------------------------------------------------

--
-- Table structure for table `employeedesignation`
--

CREATE TABLE `employeedesignation` (
  `desiId` int(11) NOT NULL,
  `desiDptId` int(11) DEFAULT NULL,
  `desiDesignationName` varchar(100) DEFAULT NULL,
  `desiEmployeeCodeNumberWhoAddDesi` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employeedesignation`
--

INSERT INTO `employeedesignation` (`desiId`, `desiDptId`, `desiDesignationName`, `desiEmployeeCodeNumberWhoAddDesi`) VALUES
(1, 1, 'Software Developer', 'BOE0001'),
(2, 2, 'Sr. Executive', 'BOE0001'),
(3, 2, 'Executive', 'BOE0001'),
(4, 2, 'Jr. Executive', 'BOE0001'),
(5, 8, 'Certified Computer Examiner', 'BOE0001'),
(6, 5, 'Certified Digital Marketing Professional', 'BOE0001'),
(7, 8, 'Certified Software Tester', 'BOE0001'),
(8, 4, 'Microsoft Certified Professional Developer', 'BOE0001'),
(9, 4, 'Microsoft Certified Solutions Developer', 'BOE0001');

-- --------------------------------------------------------

--
-- Table structure for table `employeeinfo`
--

CREATE TABLE `employeeinfo` (
  `eId` int(11) NOT NULL,
  `eEmployeeCodeNumber` varchar(100) DEFAULT NULL,
  `eFirstName` varchar(45) DEFAULT NULL,
  `eLastName` varchar(45) DEFAULT NULL,
  `eDateOfBirth` date DEFAULT NULL,
  `eBloodGroup` int(11) DEFAULT NULL,
  `eGender` varchar(10) DEFAULT NULL,
  `ePhoneNumberPersonal` varchar(20) DEFAULT NULL,
  `ePhoneNumberOffice` varchar(20) DEFAULT NULL,
  `eParmanentAddress` varchar(255) DEFAULT NULL,
  `ePresentAddress` varchar(255) DEFAULT NULL,
  `eDptId` int(11) DEFAULT NULL,
  `eDesignationId` int(11) DEFAULT NULL,
  `eEmailAddress` varchar(100) DEFAULT NULL,
  `ePassword` varchar(255) DEFAULT NULL,
  `eEmployeeCodeNumberWhoAddEmployee` varchar(45) DEFAULT NULL,
  `eEmployeeVerification` int(11) DEFAULT NULL,
  `eWhoVerifytheEmployee` varchar(45) DEFAULT NULL,
  `eLastLogin` datetime DEFAULT NULL,
  `eEmpType` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employeeinfo`
--

INSERT INTO `employeeinfo` (`eId`, `eEmployeeCodeNumber`, `eFirstName`, `eLastName`, `eDateOfBirth`, `eBloodGroup`, `eGender`, `ePhoneNumberPersonal`, `ePhoneNumberOffice`, `eParmanentAddress`, `ePresentAddress`, `eDptId`, `eDesignationId`, `eEmailAddress`, `ePassword`, `eEmployeeCodeNumberWhoAddEmployee`, `eEmployeeVerification`, `eWhoVerifytheEmployee`, `eLastLogin`, `eEmpType`) VALUES
(1, 'BOE0001', 'Thomas', 'Dryden', '1991-03-02', 1, 'Male', '2022225658', '2022225658', '1369 Ralph Street', '1369 Ralph Street', 1, 1, 'thomas@mail.com', '123456', 'BOE0001', 1, 'BOE0001', '2021-12-10 21:22:08', 1),
(2, 'PRE0001', 'Johnny', 'Harris', '1991-03-02', 1, 'Male', '2145896666', '2145896666', '4159 Franklin Street', '4159 Franklin Street', 2, 2, 'harris@mail.com', '123', 'BOE0001', 1, 'BOE0001', '2021-12-08 22:22:33', 2),
(3, 'BOE0002', 'Larry', 'Webb', '1991-02-03', 2, 'Male', '2568966666', '2568966666', '2697 Upton Avenue', '1475 Golden Ridge Road', 1, 1, 'webbl@mail.com', '123', 'BOE0001', 1, 'BOE0001', '2021-12-08 22:22:58', 3),
(4, 'PRE0002', 'Marc', 'Spectre', '1991-02-03', 2, 'Male', '3589654122', '3589654122', '2866 Dane Street', '2866 Dane Street', 2, 3, 'spect@mail.com', '123', 'BOE0001', 1, 'BOE0001', '2021-12-09 09:49:56', 3),
(5, 'BOE0003', 'Fredd', 'Brewington', '1991-02-03', 3, 'Male', '4500006969', '4500006969', '3346 Rockwell Lane', '3346 Rockwell Lane', 1, 1, 'fred@mail.com', '123', 'BOE0001', 1, 'BOE0001', '2015-08-24 13:17:17', 3),
(6, 'PRE0003', 'Jess', 'Farrelly', '1991-02-03', 3, 'Male', '6969002558', '6969002558', '1510 Webster Street', '1510 Webster Street', 2, 2, 'jess@mail.com', '123', 'BOE0001', 1, 'BOE0001', '2021-07-01 18:40:12', 3),
(7, 'PRE0004', 'Lia', 'Shaffer', '1991-02-03', 4, 'Female', '7532565588', '7532565588', '4422 Mount Tabor', '4422 Mount Tabor', 2, 2, 'liash@mail.com', '123', 'BOE0001', 1, 'BOE0001', '2021-12-09 11:25:41', 3),
(8, 'PRE0005', 'Colin', 'Yorke', '1991-02-03', 4, 'Male', '1258888890', '1258888890', '1475 Golden Ridge Road', '2866 Dane Street', 2, 2, 'colin@mail.com', '123', 'BOE0001', 1, 'BOE0001', '2015-08-24 13:17:17', 3),
(9, 'PRE0006', 'Christine', 'Moore', '1991-02-03', 5, 'Female', '4555025699', '4555025699', '1504 Sun Valley Road', '2375 Tree Top Lane', 2, 4, 'christine@mail.com', '123', 'BOE0001', 1, 'BOE0001', '2015-08-24 13:17:17', 3),
(10, 'PRE0007', 'Patricia', 'Stine', '1991-02-03', 6, 'Female', '7500002566', '7500002566', '4259 Gorby Lane', '4259 Gorby Lane', 2, 4, 'patst@mail.com', '123', 'BOE0001', 1, 'BOE0001', '2015-08-24 13:17:17', 3),
(12, 'PRE0008', 'Margaret', 'Taylor', '1991-02-03', 7, 'Female', '8855000002', '8855000002', '1506 Crowfield Road', '1506 Crowfield Road', 2, 4, 'taylor@mail.com', '123', 'BOE0001', 1, 'BOE0001', '2015-08-24 13:17:17', 3),
(13, 'BOE0004', 'Eddy', 'K Brock', '1991-02-03', 8, 'Male', '4560002565', '4560002565', '368 Oakdale Avenue', '368 Oakdale Avenue', 1, 1, 'brockedi@mail.com', '123', 'BOE0001', 1, 'BOE0001', '2021-12-09 21:16:44', 3),
(14, 'BOE0012', 'Florence', 'Maurice', '1987-11-05', 1, 'Female', '1568965555', '1568965555', '2121 Bell Street', '1504 Sun Valley Road', 1, 3, 'florence@mail.com', '123', 'BOE0001', 1, 'BOE0001', '2015-08-30 11:59:47', 3),
(15, 'ET00633', 'Will', 'Williams', '2015-01-01', 1, 'Male', '1234567890', '1234567890', '2825 Felosa Drive', '1591 Charter Street', 1, 2, 'williams@mail.com', '123', 'BOE0001', 1, 'BOE0001', '2021-12-09 11:03:33', 3),
(16, '999', 'Harold', 'Feizer', '1991-05-11', 5, 'Male', '7144445520', '4521114580', '2682 Forest Avenue', '2682 Forest Avenue', 5, 6, 'harold@mail.com', 'password', 'BOE0001', 1, 'BOE0001', '2021-12-09 01:11:13', 3),
(17, 'ASTR0000', 'Kathryn', 'Majors', '1991-12-03', 7, 'Female', '0111452125', '7410000000', '552 PA Avenue', '552 PA Avenue', 5, 6, 'kathryn@mail.com', 'pass', 'BOE0001', 1, 'BOE0001', '2021-12-09 10:32:33', 3),
(18, 'ASTR0001', 'Test', 'Account', '1992-12-02', 3, 'Male', '7774440000', '7410001450', '446 Per Address', '696 Pre Address', 8, 7, 'testacc@mail.com', 'password', 'BOE0001', 1, 'BOE0001', '2021-12-09 21:36:43', 3);

-- --------------------------------------------------------

--
-- Table structure for table `employeeleaveapplicationdetails`
--

CREATE TABLE `employeeleaveapplicationdetails` (
  `lId` int(11) NOT NULL,
  `lEmployeeCodeNumberWhoApply` varchar(45) DEFAULT NULL,
  `lApplyDate` date DEFAULT NULL,
  `lLeaveId` tinyint(4) DEFAULT NULL,
  `lEmployeeImargencyAddress` varchar(255) DEFAULT NULL,
  `lLeaveFromDate` date DEFAULT NULL,
  `lLeaveToDate` date DEFAULT NULL,
  `lTotalLeaveDays` int(11) DEFAULT NULL,
  `lTotalLeaveDaysRemain` int(11) DEFAULT NULL,
  `lLeaveReason` varchar(255) DEFAULT NULL,
  `lAlternativeEmployeeCardNumber` varchar(45) DEFAULT NULL,
  `lIsApproved` tinyint(4) DEFAULT NULL,
  `lIsRecomanded` tinyint(4) DEFAULT NULL,
  `lWhoRecomand` varchar(100) DEFAULT NULL,
  `lWhoApproved` varchar(100) DEFAULT NULL,
  `lWhoEdit` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employeeleaveapplicationdetails`
--

INSERT INTO `employeeleaveapplicationdetails` (`lId`, `lEmployeeCodeNumberWhoApply`, `lApplyDate`, `lLeaveId`, `lEmployeeImargencyAddress`, `lLeaveFromDate`, `lLeaveToDate`, `lTotalLeaveDays`, `lTotalLeaveDaysRemain`, `lLeaveReason`, `lAlternativeEmployeeCardNumber`, `lIsApproved`, `lIsRecomanded`, `lWhoRecomand`, `lWhoApproved`, `lWhoEdit`) VALUES
(1, 'BOE0001', '2015-08-24', 2, 'sfsadf', '2015-08-24', '2015-08-27', 3, 12, 'fsdfaf', 'BOE0012', 1, 1, 'BOE0001', 'BOE0001', NULL),
(2, '999', '2021-07-18', 2, '2682 Forest Avenue', '2021-07-18', '2021-07-19', 1, 14, 'not feeling well enough to join the office', '999', 1, 1, 'BOE0001', 'BOE0001', NULL),
(3, '999', '2021-12-08', 1, 'Democt adr', '2021-12-09', '2021-12-12', 3, 15, 'demo test', '999', 0, 1, 'BOE0001', NULL, NULL),
(4, 'BOE0002', '2021-12-08', 2, 'TestAddress', '2021-12-09', '2021-12-15', 6, 9, 'testing', 'BOE0002', 1, 1, 'BOE0001', 'BOE0001', NULL),
(5, 'ASTR0000', '2021-12-09', 6, '1125 Allace St', '2021-12-09', '2021-12-14', 5, 1, 'This is a test reason for OLMS', 'ASTR0000', 0, 0, NULL, NULL, NULL),
(6, 'ET00633', '2021-12-09', 1, '88 ASL Road', '2021-12-09', '2021-12-23', 14, 4, 'Few days Quarantine', 'ET00633', 1, 1, 'BOE0001', 'BOE0001', NULL),
(7, 'PRE0004', '2021-12-09', 2, '5562 Bl Rd', '2021-12-09', '2021-12-13', 4, 11, 'Demo Demo Demo Demo', 'PRE0004', 1, 1, 'BOE0001', 'BOE0001', NULL),
(9, 'ASTR0001', '2021-12-09', 7, '4477 Test Address', '2021-12-09', '2021-12-12', 3, 152, 'This is a testing desc', 'ASTR0001', 1, 1, 'BOE0001', 'BOE0001', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `leavedetails`
--

CREATE TABLE `leavedetails` (
  `lId` tinyint(4) NOT NULL,
  `lType` varchar(30) DEFAULT NULL,
  `lTotalDays` int(11) DEFAULT NULL,
  `lEmployeeCodeNumberWhoAddLeave` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `leavedetails`
--

INSERT INTO `leavedetails` (`lId`, `lType`, `lTotalDays`, `lEmployeeCodeNumberWhoAddLeave`) VALUES
(1, 'Casual Leave', 18, 'BOE0001'),
(2, 'Sick Leave', 15, 'BOE0001'),
(3, 'Earn Leave', 12, 'BOE0001'),
(4, 'Maternity Leave', 180, 'BOE0001'),
(5, 'Paternity Leave', 14, 'BOE0001'),
(6, 'Bereavement Leave', 6, 'BOE0001'),
(7, 'Sabbatical Leave', 155, 'BOE0001'),
(8, 'Unpaid Leave', 1000, 'BOE0001');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employeeblood`
--
ALTER TABLE `employeeblood`
  ADD PRIMARY KEY (`bId`);

--
-- Indexes for table `employeedepartment`
--
ALTER TABLE `employeedepartment`
  ADD PRIMARY KEY (`dptId`),
  ADD KEY `employeedepartment_ibfk_1` (`dptEmployeeCodeNumberWhoAddDept`);

--
-- Indexes for table `employeedesignation`
--
ALTER TABLE `employeedesignation`
  ADD PRIMARY KEY (`desiId`),
  ADD KEY `desiDptId` (`desiDptId`) USING BTREE,
  ADD KEY `desiDesignationName` (`desiDesignationName`),
  ADD KEY `employeedesignation_ibfk_1` (`desiEmployeeCodeNumberWhoAddDesi`);

--
-- Indexes for table `employeeinfo`
--
ALTER TABLE `employeeinfo`
  ADD PRIMARY KEY (`eId`),
  ADD UNIQUE KEY `eCodeNumber_UNIQUE` (`eEmployeeCodeNumber`);

--
-- Indexes for table `employeeleaveapplicationdetails`
--
ALTER TABLE `employeeleaveapplicationdetails`
  ADD PRIMARY KEY (`lId`),
  ADD KEY `lEmployeeLeaveType_fk_lType` (`lLeaveId`),
  ADD KEY `lEmployeeCodeNumberWhoApply` (`lEmployeeCodeNumberWhoApply`),
  ADD KEY `lWhoRecomand` (`lWhoRecomand`),
  ADD KEY `lWhoApproved` (`lWhoApproved`);

--
-- Indexes for table `leavedetails`
--
ALTER TABLE `leavedetails`
  ADD PRIMARY KEY (`lId`),
  ADD KEY `lType` (`lType`),
  ADD KEY `employeeleave_ibfk_1` (`lEmployeeCodeNumberWhoAddLeave`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employeeblood`
--
ALTER TABLE `employeeblood`
  MODIFY `bId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `employeedepartment`
--
ALTER TABLE `employeedepartment`
  MODIFY `dptId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `employeedesignation`
--
ALTER TABLE `employeedesignation`
  MODIFY `desiId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `employeeinfo`
--
ALTER TABLE `employeeinfo`
  MODIFY `eId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `employeeleaveapplicationdetails`
--
ALTER TABLE `employeeleaveapplicationdetails`
  MODIFY `lId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `leavedetails`
--
ALTER TABLE `leavedetails`
  MODIFY `lId` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `employeedepartment`
--
ALTER TABLE `employeedepartment`
  ADD CONSTRAINT `employeedepartment_ibfk_1` FOREIGN KEY (`dptEmployeeCodeNumberWhoAddDept`) REFERENCES `employeeinfo` (`eEmployeeCodeNumber`);

--
-- Constraints for table `employeedesignation`
--
ALTER TABLE `employeedesignation`
  ADD CONSTRAINT `desiDeptId_fk_dptId` FOREIGN KEY (`desiDptId`) REFERENCES `employeedepartment` (`dptId`),
  ADD CONSTRAINT `employeedesignation_ibfk_1` FOREIGN KEY (`desiEmployeeCodeNumberWhoAddDesi`) REFERENCES `employeeinfo` (`eEmployeeCodeNumber`);

--
-- Constraints for table `employeeleaveapplicationdetails`
--
ALTER TABLE `employeeleaveapplicationdetails`
  ADD CONSTRAINT `employeeleaveapplicationdetails_ibfk_1` FOREIGN KEY (`lEmployeeCodeNumberWhoApply`) REFERENCES `employeeinfo` (`eEmployeeCodeNumber`),
  ADD CONSTRAINT `employeeleaveapplicationdetails_ibfk_2` FOREIGN KEY (`lLeaveId`) REFERENCES `leavedetails` (`lId`),
  ADD CONSTRAINT `employeeleaveapplicationdetails_ibfk_3` FOREIGN KEY (`lWhoRecomand`) REFERENCES `employeeinfo` (`eEmployeeCodeNumber`),
  ADD CONSTRAINT `employeeleaveapplicationdetails_ibfk_4` FOREIGN KEY (`lWhoApproved`) REFERENCES `employeeinfo` (`eEmployeeCodeNumber`);

--
-- Constraints for table `leavedetails`
--
ALTER TABLE `leavedetails`
  ADD CONSTRAINT `leavedetails_ibfk_1` FOREIGN KEY (`lEmployeeCodeNumberWhoAddLeave`) REFERENCES `employeeinfo` (`eEmployeeCodeNumber`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
