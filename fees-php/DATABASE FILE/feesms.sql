-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2021 at 11:46 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `feesms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_sch`
--

CREATE TABLE `admin_sch` (
  `uname` varchar(200) NOT NULL,
  `pwd` varchar(200) NOT NULL,
  `type` varchar(30) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `p_num` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_sch`
--

INSERT INTO `admin_sch` (`uname`, `pwd`, `type`, `Name`, `p_num`) VALUES
('admin', 'd00f5d5217896fb7fd601412cb890830', 'Admin', 'Administrator', 2147483647),
('admin2', 'd00f5d5217896fb7fd601412cb890830', 'Admin', 'Admin 2', 2147483647),
('admin3', 'd00f5d5217896fb7fd601412cb890830', 'Admin', 'Admin 3', 696969),
('college', 'd00f5d5217896fb7fd601412cb890830', 'College', 'College Account', 368555555),
('school', 'd00f5d5217896fb7fd601412cb890830', 'School', 'School Account', 2145555580);

-- --------------------------------------------------------

--
-- Table structure for table `clg_class`
--

CREATE TABLE `clg_class` (
  `Medium` varchar(100) NOT NULL DEFAULT '',
  `Course` varchar(100) NOT NULL DEFAULT '',
  `Std` varchar(40) NOT NULL DEFAULT '',
  `no_of_div` varchar(50) DEFAULT NULL,
  `timestamp` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clg_class`
--

INSERT INTO `clg_class` (`Medium`, `Course`, `Std`, `no_of_div`, `timestamp`) VALUES
('English', 'B.A.', 'First', '2', '00:20:14'),
('English', 'B.A.', 'Second', '1', '00:20:14'),
('English', 'B.A.', 'Third', '1', '00:20:14'),
('English', 'B.Com', 'First', '2', '00:20:14'),
('English', 'B.Com', 'Second', '2', '00:20:14'),
('English', 'B.Com', 'Third', '1', '00:20:14'),
('English', 'B.Sc.', 'Final', '1', '00:20:14'),
('English', 'B.Sc.', 'First', '2', '00:20:14'),
('English', 'B.Sc.', 'four', '1', '00:20:24'),
('English', 'B.Sc.', 'Third', '1', '00:20:14'),
('English', 'B.Tech', 'First', '2', '00:20:14'),
('English', 'B.Tech', 'Third', '2', '00:20:14'),
('English', 'MBA', 'First', '2', '00:20:14'),
('English', 'MBA', 'Third', '1', '00:20:21'),
('English', 'MIT', 'First', '2', '00:20:21'),
('French', 'B.A.', 'First', '2', '00:20:14'),
('French', 'B.A.', 'Third', '1', '00:20:14'),
('French', 'B.Com', 'Second', '1', '00:20:14'),
('French', 'B.Sc.', 'First', '1', '00:20:14'),
('French', 'B.Tech', 'Final', '2', '00:20:14'),
('French', 'B.Tech', 'Third', '2', '00:20:14');

-- --------------------------------------------------------

--
-- Table structure for table `clg_cls_fee`
--

CREATE TABLE `clg_cls_fee` (
  `Medium` varchar(100) NOT NULL DEFAULT '',
  `Course` varchar(100) NOT NULL DEFAULT '',
  `Std` varchar(40) NOT NULL DEFAULT '',
  `fee_type` varchar(50) NOT NULL DEFAULT '',
  `fee` int(10) DEFAULT NULL,
  `lfee` int(10) DEFAULT NULL,
  `one_time` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clg_cls_fee`
--

INSERT INTO `clg_cls_fee` (`Medium`, `Course`, `Std`, `fee_type`, `fee`, `lfee`, `one_time`) VALUES
('English', 'B.A.', 'First', 'Admission Fee', 3500, 1000, 'Per Year'),
('English', 'B.A.', 'First', 'End Term Fee', 1000, 100, 'Per Year'),
('English', 'B.A.', 'First', 'Mid term 1 fee', 1000, 100, 'Per Year'),
('English', 'B.A.', 'First', 'Mid term 2 fee', 1000, 100, 'Per Year'),
('English', 'B.A.', 'First', 'Monthly Fee', 1350, 100, 'Per Month'),
('English', 'B.A.', 'First', 'Sports', 1000, 100, 'Per Year'),
('English', 'B.A.', 'Second', 'Admission Fee', 3500, 1000, 'Per Year'),
('English', 'B.A.', 'Second', 'Mid term 2 fee', 1000, 10, 'Per Year'),
('English', 'B.A.', 'Third', 'Mid term 1 fee', 1000, 100, 'Per Month'),
('English', 'B.A.', 'Third', 'Mid term 2 fee', 1000, 100, 'Per Month'),
('English', 'B.A.', 'Third', 'Monthly Fee', 1000, 100, 'Per Month'),
('English', 'B.Com', 'First', 'Admission Fee', 3500, 100, 'Per Year'),
('English', 'B.Com', 'First', 'Mid term 1 fee', 1000, 100, 'Per Year'),
('English', 'B.Com', 'First', 'Monthly Fee', 15600, 100, 'Per Year'),
('English', 'B.Com', 'Second', 'Admission Fee', 3600, 1000, 'Per Year'),
('English', 'B.Com', 'Third', 'Mid term 1 fee', 1600, 10, 'Per Year'),
('English', 'MBA', 'Third', 'Mid term 1 fee', 1100, 150, 'Per Month'),
('English', 'MIT', 'First', 'Admission Fee', 1110, 0, 'Per Month'),
('English', 'MIT', 'First', 'Monthly Fee', 4250, 150, 'Per Month'),
('French', 'B.Com', 'Second', 'Admission Fee', 4560, 1000, 'Per Year');

-- --------------------------------------------------------

--
-- Table structure for table `clg_details`
--

CREATE TABLE `clg_details` (
  `Enroll` varchar(100) NOT NULL,
  `Gr_num` varchar(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `f_name` varchar(100) NOT NULL,
  `m_name` varchar(100) NOT NULL,
  `sex` varchar(20) NOT NULL,
  `course` varchar(200) NOT NULL,
  `DOB` varchar(20) NOT NULL,
  `birth_place` varchar(100) NOT NULL,
  `cont_num` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `docs` varchar(100) NOT NULL,
  `religion` varchar(100) NOT NULL,
  `caste` varchar(50) NOT NULL,
  `sub_caste` varchar(50) NOT NULL,
  `nationality` varchar(100) NOT NULL,
  `last_school` varchar(200) NOT NULL,
  `progress` varchar(100) NOT NULL,
  `adhar_num` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `timestamp` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clg_details`
--

INSERT INTO `clg_details` (`Enroll`, `Gr_num`, `name`, `f_name`, `m_name`, `sex`, `course`, `DOB`, `birth_place`, `cont_num`, `address`, `docs`, `religion`, `caste`, `sub_caste`, `nationality`, `last_school`, `progress`, `adhar_num`, `status`, `timestamp`) VALUES
('007', '007', 'Amily Dore', 'Josep Dore', 'Miah M Dore', 'female', 'B.A.', '1995-07-06', 'Australia', '5555555565', '68 Thule Drive', '09', 'Test', 'Test', 'Test', 'Australian', 'Test', '90', '1245555555', 'paying', '2021-09-24 11:58:51.247720'),
('008', '890', 'Bran Davis', 'Luis El Davis', 'Danny Davis', 'male', 'B.Com', '2014-12-31', 'Australia', '8090909090', '13 Bridge Street', '', 'Test', 'Test', 'Test', 'Australian', 'Test', '', '1245588555', 'default', '2021-09-24 11:58:57.067447'),
('1022', '1022', 'Liam Moore', 'Henry Moore', 'Christen Moore', 'male', 'MBA', '1995-02-02', 'Australia', '7014580001', '77 Carolina Park', 'Passport', 'Test', 'none', 'Test', 'Australian', 'Stuart College', '1', '1010222222', 'paying', '2021-09-24 11:59:03.099478'),
('1111', '9600', 'Williams', 'Wfather', 'Wmother', 'male', 'MIT', '1994-06-15', 'Australia', '7000000000', 'DemoAddress', 'test', 'Test', 'Test', 'Test', 'Australian', 'Test', 'n', '1010102200', 'paying', '2021-09-24 18:15:00.000000'),
('122', '123', 'Christopher', 'CFather', 'CMother', 'male', 'B.A.', '2014-12-31', 'Australia', '3245896544', '51 Wilson Street', '09', 'Test', 'Test', 'Test', 'Australian', 'Test', '90', '0233333300', 'paying', '2021-09-24 11:59:06.984884'),
('12212', '2333', 'Johnny G', 'Mark G', 'Willy G', 'male', 'B.A.', '2014-12-31', 'Australia', '1256565650', '73 Walter Crescent', '09', 'Test', 'Test', 'Test', 'Australian', 'Test', '90', '1000000069', 'paying', '2021-09-24 11:59:10.674259'),
('123', '2121', 'Sid', 'Anthony', 'Teresa', 'male', 'B.A.', '2014-12-31', 'Australia', '2222202585', '123 Ronald Crescent', '09', 'Test', 'Test', 'Test', 'Australian', 'Test', '90', '1069696969', 'paying', '2021-09-24 11:59:14.448437'),
('124', '124', 'Thomas Hudson', 'Jeffery Hudson', 'Stacy Hudson', 'male', 'B.Com', '2014-12-31', 'Australia', '1245656565', '44 Purcell Place', '09', 'Test', 'Test', 'Test', 'Australian', 'Test', '90', '1245555696', 'paying', '2021-09-24 11:59:18.831198'),
('125', '125', 'Colin', 'Colson', 'Markee', 'male', 'B.Com', '2014-12-31', 'Australia', '9012457855', '69 Zipfs Road', '09', 'Test', 'Test', 'Test', 'Australian', 'Test', '90', '1000555555', 'paying', '2021-09-24 11:59:23.803265'),
('126', '126', 'Eddie Brock', 'Jeff L Brock', 'Emy E Brock', 'male', 'B.Com', '2014-12-31', 'Australia', '3214545480', '113 Sullivan Court', '09', 'Test', 'Test', 'Test', 'Australian', 'Test', '90', '1045555555', 'paying', '2021-09-24 11:59:26.904843'),
('5672', '789', 'Philip', 'Robert', 'Eliza', 'male', 'B.A.', '2014-12-31', 'Australia', '2102457850', '104 Beach Street', '09', 'Test', 'Test', 'Test', 'Australian', 'Test', '90', '124560000', 'paying', '2021-09-24 11:59:32.861948'),
('6787', '676', 'Jeff Harvey', 'Mark Harvey', 'Alice Harvey', 'male', 'B.A.', '2014-12-31', 'Australia', '320155555', '25 Nandewar Street', '09', 'Test', 'Test', 'Test', 'Australian', 'Test', '90', '1695555555', 'paying', '2021-09-24 11:59:36.791724'),
('890', '809', 'Stuart', 'Zhans', 'Kelly', 'male', 'B.A.', '2014-12-31', 'Australia', '1973565650', '49 Nandewar Street', '', 'Test', 'Test', 'Test', 'Australian', 'Test', '', '1000002458', 'default', '2021-09-24 11:59:46.928627'),
('9090', '9091', 'Chris', 'Christopher', 'Melina', 'male', 'B.A.', '2014-12-31', 'Australia', '9090909069', '46 Argyle Street', '09', 'Test', 'Test', 'Test', 'Australian', 'Test', '90', '1247996500', 'paying', '2021-09-24 11:59:52.338657');

-- --------------------------------------------------------

--
-- Table structure for table `clg_tran`
--

CREATE TABLE `clg_tran` (
  `Reciept` varchar(100) NOT NULL,
  `Gr_num` varchar(100) NOT NULL,
  `Amount` int(100) NOT NULL,
  `Month` varchar(20) NOT NULL,
  `year` int(10) NOT NULL,
  `fee_type` varchar(30) NOT NULL,
  `pay_mode` varchar(20) NOT NULL,
  `cheque_num` int(20) NOT NULL,
  `lflag` varchar(10) NOT NULL,
  `late_fee` int(20) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clg_tran`
--

INSERT INTO `clg_tran` (`Reciept`, `Gr_num`, `Amount`, `Month`, `year`, `fee_type`, `pay_mode`, `cheque_num`, `lflag`, `late_fee`, `date`) VALUES
('RC41XPP', '2333', 1350, 'Aug', 2014, 'Monthly Fee', 'cash', 0, 'no', 100, '2014-07-22'),
('RC41XPP', '2333', 1350, 'Jul', 2014, 'Monthly Fee', 'cash', 0, 'yes', 0, '2014-07-22'),
('RC41XPP', '2333', 1350, 'Nov', 2014, 'Monthly Fee', 'cash', 0, 'yes', 0, '2014-07-22'),
('RC41XPP', '2333', 1350, 'Oct', 2014, 'Monthly Fee', 'cash', 0, 'no', 100, '2014-07-22'),
('RC41XPP', '2333', 1350, 'Sep', 2014, 'Monthly Fee', 'cash', 0, 'yes', 0, '2014-07-22'),
('RC740IX', '789', 1000, 'One time', 2014, 'Mid term 2 fee', 'cheque', 123, 'yes', 0, '2014-07-24'),
('RC74PJN', '123', 3500, 'One time', 2014, 'Admission Fee', 'cash', 0, 'no', 1000, '2014-07-22'),
('RC860KV', '123', 1350, 'Jun', 2014, 'Monthly Fee', 'cash', 0, 'no', 100, '2014-07-22'),
('RCAVPCR', '007', 1350, 'Dec', 2014, 'Monthly Fee', 'cash', 0, 'yes', 0, '2014-07-20'),
('RCAVPCR', '007', 1350, 'Feb', 2014, 'Monthly Fee', 'cash', 0, 'yes', 0, '2014-07-20'),
('RCAVPCR', '007', 1350, 'Jan', 2014, 'Monthly Fee', 'cash', 0, 'yes', 0, '2014-07-20'),
('RCAVPCR', '007', 1350, 'Mar', 2014, 'Monthly Fee', 'cash', 0, 'yes', 0, '2014-07-20'),
('RCAVPCR', '007', 1350, 'Nov', 2014, 'Monthly Fee', 'cash', 0, 'yes', 0, '2014-07-20'),
('RCB0ZV8', '9600', 3500, 'One time', 2021, 'Admission Fee', 'cash', 0, 'no', 1000, '2021-09-25'),
('RCCK4K2', '007', 1000, 'One time', 2014, 'End Term Fee', 'cash', 0, 'no', 100, '2014-07-24'),
('RCFDZMT', '123', 1350, 'Apr', 2014, 'Monthly Fee', 'cash', 0, 'yes', 0, '2014-07-22'),
('RCFDZMT', '123', 1350, 'Feb', 2014, 'Monthly Fee', 'cash', 0, 'no', 100, '2014-07-22'),
('RCFDZMT', '123', 1350, 'Jan', 2014, 'Monthly Fee', 'cash', 0, 'no', 100, '2014-07-22'),
('RCFDZMT', '123', 1350, 'Mar', 2014, 'Monthly Fee', 'cash', 0, 'no', 100, '2014-07-22'),
('RCFDZMT', '123', 1350, 'May', 2014, 'Monthly Fee', 'cash', 0, 'yes', 0, '2014-07-22'),
('RCHDFU0', '9600', 4050, 'Aug', 2021, 'Monthly Fee', 'cash', 0, 'yes', 0, '2021-09-25'),
('RCHDFU0', '9600', 4050, 'Jul', 2021, 'Monthly Fee', 'cash', 0, 'no', 100, '2021-09-25'),
('RCHDFU0', '9600', 4050, 'Sep', 2021, 'Monthly Fee', 'cash', 0, 'no', 100, '2021-09-25'),
('RCHE4DV', '007', 1350, 'Apr', 2014, 'Monthly Fee', 'cheque', 123, 'no', 100, '2014-07-22'),
('RCHE4DV', '007', 1350, 'Jun', 2014, 'Monthly Fee', 'cheque', 123, 'yes', 0, '2014-07-22'),
('RCHE4DV', '007', 1350, 'May', 2014, 'Monthly Fee', 'cheque', 123, 'no', 100, '2014-07-22'),
('RCHL8HR', '676', 3500, 'One time', 2014, 'Admission Fee', 'cash', 0, 'yes', 0, '2014-07-24'),
('RCIGNLT', '007', 1350, 'Aug', 2014, 'Monthly Fee', 'cheque', 212, 'yes', 0, '2014-07-20'),
('RCIGNLT', '007', 1350, 'Jul', 2014, 'Monthly Fee', 'cheque', 212, 'yes', 0, '2014-07-20'),
('RCIGNLT', '007', 1350, 'Oct', 2014, 'Monthly Fee', 'cheque', 212, 'yes', 0, '2014-07-20'),
('RCIGNLT', '007', 1350, 'Sep', 2014, 'Monthly Fee', 'cheque', 212, 'yes', 0, '2014-07-20'),
('RCIY7XI', '789', 1350, 'Aug', 2014, 'Monthly Fee', 'cheque', 123, 'no', 100, '2014-07-24'),
('RCIY7XI', '789', 1350, 'Jul', 2014, 'Monthly Fee', 'cheque', 123, 'no', 100, '2014-07-24'),
('RCIY7XI', '789', 1350, 'Nov', 2014, 'Monthly Fee', 'cheque', 123, 'no', 100, '2014-07-24'),
('RCIY7XI', '789', 1350, 'Oct', 2014, 'Monthly Fee', 'cheque', 123, 'yes', 0, '2014-07-24'),
('RCIY7XI', '789', 1350, 'Sep', 2014, 'Monthly Fee', 'cheque', 123, 'yes', 0, '2014-07-24'),
('RCJO1C8', '789', 1000, 'One time', 2021, 'Sports', 'cash', 0, 'no', 100, '2021-09-25'),
('RCKJ2JW', '2333', 1000, 'One time', 2014, 'End Term Fee', 'cash', 0, 'yes', 0, '2014-07-22'),
('RCL0R96', '2333', 1000, 'One time', 2014, 'Mid term 2 fee', 'cash', 0, 'no', 100, '2014-07-22'),
('RCOGM3A', '2333', 1000, 'One time', 2014, 'Mid term 1 fee', 'cash', 0, 'no', 100, '2014-07-22'),
('RCORALZ', '789', 1000, 'One time', 2014, 'End Term Fee', 'cash', 0, 'no', 100, '2014-07-24'),
('RCQI1QU', '1022', 1000, 'Jul', 2021, 'Mid term 1 fee', 'cash', 0, 'yes', 0, '2021-06-21'),
('RCQWQW1', '676', 1000, 'One time', 2014, 'Mid term 1 fee', 'cash', 0, 'yes', 0, '2014-07-24'),
('RCSK48I', '789', 3500, 'One time', 2014, 'Admission Fee', 'cash', 0, 'yes', 0, '2014-07-24'),
('RCTIRI3', '2333', 1350, 'Dec', 2014, 'Monthly Fee', 'cheque', 890, 'yes', 0, '2014-07-22'),
('RCTIRI3', '2333', 1350, 'Feb', 2014, 'Monthly Fee', 'cheque', 890, 'no', 100, '2014-07-22'),
('RCTIRI3', '2333', 1350, 'Jan', 2014, 'Monthly Fee', 'cheque', 890, 'yes', 0, '2014-07-22'),
('RCTIRI3', '2333', 1350, 'Mar', 2014, 'Monthly Fee', 'cheque', 890, 'yes', 0, '2014-07-22'),
('RCTTBOZ', '007', 3500, 'One time', 2014, 'Admission Fee', 'cash', 0, 'no', 1000, '2014-07-20'),
('RCUPX6X', '007', 1000, 'One time', 2014, 'Sports', 'cash', 0, 'yes', 0, '2014-07-24'),
('RCWPIGN', '123', 1350, 'Aug', 2014, 'Monthly Fee', 'cheque', 1211, 'yes', 0, '2014-07-22'),
('RCWPIGN', '123', 1350, 'Dec', 2014, 'Monthly Fee', 'cheque', 1211, 'yes', 0, '2014-07-22'),
('RCWPIGN', '123', 1350, 'Jul', 2014, 'Monthly Fee', 'cheque', 1211, 'no', 100, '2014-07-22'),
('RCWPIGN', '123', 1350, 'Nov', 2014, 'Monthly Fee', 'cheque', 1211, 'no', 100, '2014-07-22'),
('RCWPIGN', '123', 1350, 'Oct', 2014, 'Monthly Fee', 'cheque', 1211, 'no', 100, '2014-07-22'),
('RCWPIGN', '123', 1350, 'Sep', 2014, 'Monthly Fee', 'cheque', 1211, 'no', 100, '2014-07-22'),
('RCXB65C', '2333', 3500, 'One time', 2014, 'Admission Fee', 'cash', 0, 'no', 1000, '2014-07-22'),
('RCXRB0K', '007', 1000, 'One time', 2021, 'Mid term 2 fee', 'cash', 0, 'yes', 0, '2021-09-24'),
('RCY8MFR', '2333', 1350, 'Apr', 2014, 'Monthly Fee', 'cheque', 1212, 'no', 100, '2014-07-22'),
('RCY8MFR', '2333', 1350, 'Jun', 2014, 'Monthly Fee', 'cheque', 1212, 'no', 100, '2014-07-22'),
('RCY8MFR', '2333', 1350, 'May', 2014, 'Monthly Fee', 'cheque', 1212, 'yes', 0, '2014-07-22'),
('RCYDIOO', '789', 1000, 'One time', 2014, 'Mid term 1 fee', 'cash', 0, 'yes', 0, '2014-07-24');

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `Key_p` varchar(100) NOT NULL,
  `Name` varchar(300) NOT NULL,
  `Logo` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`Key_p`, `Name`, `Logo`) VALUES
('007', 'WestView School', 'uploads/1632554996.png'),
('008', 'XYZZ University', 'uploads/1404452748.png');

-- --------------------------------------------------------

--
-- Table structure for table `sch_class`
--

CREATE TABLE `sch_class` (
  `Medium` varchar(50) NOT NULL DEFAULT '',
  `Std` varchar(50) NOT NULL DEFAULT '',
  `no_of_div` int(11) DEFAULT NULL,
  `timestamp` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sch_class`
--

INSERT INTO `sch_class` (`Medium`, `Std`, `no_of_div`, `timestamp`) VALUES
('English', 'First', 1, '00:20:14'),
('English', 'ten', 2, '00:20:21'),
('French', 'First', 1, '00:20:21');

-- --------------------------------------------------------

--
-- Table structure for table `sch_cls_fee`
--

CREATE TABLE `sch_cls_fee` (
  `Medium` varchar(50) NOT NULL DEFAULT '',
  `Std` varchar(50) NOT NULL DEFAULT '',
  `fee_type` varchar(50) NOT NULL DEFAULT '',
  `fee` int(11) DEFAULT NULL,
  `lfee` int(11) DEFAULT NULL,
  `one_time` varchar(10) NOT NULL,
  `late_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sch_cls_fee`
--

INSERT INTO `sch_cls_fee` (`Medium`, `Std`, `fee_type`, `fee`, `lfee`, `one_time`, `late_date`) VALUES
('English', 'first', 'Admission Fee', 650, 80, 'Per Year', '2014-12-31'),
('English', 'first', 'Computer Lab', 500, 10, 'Per Year', '2014-12-31'),
('English', 'first', 'End Term Fee', 700, 80, 'Per Year', '0000-00-00'),
('English', 'first', 'Mid term 1 fee', 500, 80, 'Per Year', '0000-00-00'),
('English', 'first', 'Mid term 2 fee', 500, 80, 'Per Year', '0000-00-00'),
('English', 'first', 'Monthly Fee', 610, 10, 'Per Month', '2014-09-24'),
('English', 'first', 'Practical', 165, 10, 'Per Year', '2014-12-31'),
('English', 'first', 'Sports', 150, 80, 'Per Year', '0000-00-00'),
('English', 'ten', 'Monthly Fee', 1690, 150, 'Per Month', '2021-10-26'),
('French', 'first', 'Mid term 1 fee', 350, 25, 'Per Month', '2021-10-24');

-- --------------------------------------------------------

--
-- Table structure for table `sch_details`
--

CREATE TABLE `sch_details` (
  `Enroll` varchar(100) NOT NULL,
  `Gr_num` varchar(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `f_name` varchar(100) NOT NULL,
  `m_name` varchar(100) NOT NULL,
  `sex` varchar(20) NOT NULL,
  `DOB` varchar(20) NOT NULL,
  `birth_place` varchar(100) NOT NULL,
  `cont_num` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `docs` varchar(100) NOT NULL,
  `religion` varchar(100) NOT NULL,
  `caste` varchar(50) NOT NULL,
  `sub_caste` varchar(50) NOT NULL,
  `nationality` varchar(100) NOT NULL,
  `last_school` varchar(200) NOT NULL,
  `progress` varchar(100) NOT NULL,
  `adhar_num` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `timestamp` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sch_details`
--

INSERT INTO `sch_details` (`Enroll`, `Gr_num`, `name`, `f_name`, `m_name`, `sex`, `DOB`, `birth_place`, `cont_num`, `address`, `docs`, `religion`, `caste`, `sub_caste`, `nationality`, `last_school`, `progress`, `adhar_num`, `status`, `timestamp`) VALUES
('1212', '1212', 'Brent White', 'Clark White', 'Aunn White', 'male', '2014-01-05', 'Australia', '7455555555', '92 Ocean Pde', 'ID', 'Test', 'Test', 'Test', 'Australian', 'Test', 'Pelam', 'ADHAR', 'paying', '2021-09-24 14:58:35.293754'),
('121211', '9090', 'Cameron', 'Johnn', 'Cassie', 'male', '2014-12-31', 'Australia', '8908908908', '60 Adavale Road', 'hk', 'Test', 'Test', 'Test', 'Australian', 'Test', '', '', 'default', '2021-09-24 14:58:37.101727'),
('1212121', '100', 'Joseph Bowmaker', 'Colin', 'JMother', 'male', '2014-12-31', 'Australia', '8520000002', '86 Seninis Road', 'ID', 'Test', 'Test', 'Test', 'Australian', 'Test', 'Test', 'Test', 'non-paying', '2021-09-24 14:58:59.919746'),
('1221', '889', 'Jordan', 'JFather', 'JMother', 'male', '2014-12-31', 'Australia', '1010101022', '77 Albert Street', 'ID', 'Test', 'Test', 'Test', 'Australian', 'Test', 'Test', 'Test', 'non-paying', '2021-09-24 14:59:02.628568'),
('123', '90', 'Tobie', 'Tfather', 'Tmother', 'male', '2014-12-31', 'Australia', '9090909090', '117 Creedon Street', '', 'Test', 'Test', 'Test', 'Australian', 'Test', '', '', 'default', '2021-09-24 14:58:41.040516'),
('123456', 'GN1993', 'Tommy', 'Tmfather', 'Tmmother', 'male', '', 'Australia', '8302669560', '110 Creedon Street', 'ID', 'Test', 'Test', 'Test', 'Australian', 'Test', 'no progress', 'ASDHF9090', 'paying', '2021-09-24 14:58:42.354560'),
('124321', '8329', 'Tonny', 'Tnyfather', 'Tnymother', 'male', '2014-12-31', 'Australia', '7333333360', '47 George Street', 'ID', 'Test', 'Test', 'Test', 'Australian', 'Test', 'Test', 'Test', 'non-paying', '2021-09-24 14:59:08.042702'),
('8660', '6666', 'John Camp', 'Steeve Camp', 'Lia Camp', 'male', '2014-04-01', 'Australia', '7850120000', '35 George Street', 'none', 'Test', 'Test', 'Test', 'Australian', 'Test', 'none', '1000000020', 'paying', '2021-09-24 14:58:45.472648'),
('al02', '26969', 'Alex', 'Alfather', 'Almother', 'male', '2014-12-31', 'Australia', '9090909090', '47 Derry Street', '', 'Test', 'Test', 'Test', 'Australian', 'Test', '', '', 'default', '2021-09-24 14:58:48.469699'),
('gypsy92', '123321', 'Claudia', 'Stfather', 'Stmother', 'female', '1995-06-06', 'Australia', '9090909090', '100 Ronald Crescent', '90', 'Test', 'Test', 'Test', 'Australian', 'Test', 'Test', 'Test', 'non-paying', '2021-09-24 14:59:09.606849'),
('paul20', '1234567', 'Paul', 'Pfather', 'Pmother', 'male', '2014-12-31', 'Australia', '9090909090', '103 Benny Street', '', 'Test', 'Test', 'Test', 'Australian', 'Test', '', '', 'default', '2021-09-24 14:58:49.966883');

-- --------------------------------------------------------

--
-- Table structure for table `sch_tran`
--

CREATE TABLE `sch_tran` (
  `Reciept` varchar(100) NOT NULL,
  `Gr_num` varchar(100) NOT NULL,
  `Amount` int(100) NOT NULL,
  `Month` varchar(20) NOT NULL,
  `year` int(10) NOT NULL,
  `fee_type` varchar(30) NOT NULL,
  `pay_mode` varchar(20) NOT NULL,
  `cheque_num` int(20) NOT NULL,
  `lflag` varchar(10) NOT NULL,
  `late_fee` int(20) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sch_tran`
--

INSERT INTO `sch_tran` (`Reciept`, `Gr_num`, `Amount`, `Month`, `year`, `fee_type`, `pay_mode`, `cheque_num`, `lflag`, `late_fee`, `date`) VALUES
('RC0D6PX', '90', 610, 'Jul', 2014, 'Monthly Fee', 'cheque', 9090, 'no', 610, '2014-09-24'),
('RC0D6PX', '90', 610, 'Oct', 2014, 'Monthly Fee', 'cheque', 9090, 'yes', 0, '2014-09-24'),
('RC0D6PX', '90', 610, 'Sep', 2014, 'Monthly Fee', 'cheque', 9090, 'yes', 0, '2014-09-24'),
('RC0F7HL', 'al02', 650, 'One time', 2014, 'Admission Fee', 'cash', 0, 'no', 80, '2014-07-24'),
('RC0MZ8I', '90', 610, 'Apr', 2014, 'Monthly Fee', 'cash', 0, 'yes', 0, '2014-09-24'),
('RC0MZ8I', '90', 610, 'Dec', 2014, 'Monthly Fee', 'cash', 0, 'yes', 0, '2014-09-24'),
('RC0MZ8I', '90', 610, 'Feb', 2014, 'Monthly Fee', 'cash', 0, 'yes', 0, '2014-09-24'),
('RC0MZ8I', '90', 610, 'Jan', 2014, 'Monthly Fee', 'cash', 0, 'yes', 0, '2014-09-24'),
('RC0MZ8I', '90', 610, 'Jun', 2014, 'Monthly Fee', 'cash', 0, 'yes', 0, '2014-09-24'),
('RC0MZ8I', '90', 610, 'Mar', 2014, 'Monthly Fee', 'cash', 0, 'yes', 0, '2014-09-24'),
('RC0MZ8I', '90', 610, 'May', 2014, 'Monthly Fee', 'cash', 0, 'yes', 0, '2014-09-24'),
('RC0MZ8I', '90', 610, 'Nov', 2014, 'Monthly Fee', 'cash', 0, 'yes', 0, '2014-09-24'),
('RC0TVRY', '6666', 500, 'Aug', 2021, 'Mid term 1 fee', 'cash', 0, 'no', 175, '2021-09-24'),
('RC0TVRY', '6666', 500, 'Jul', 2021, 'Mid term 1 fee', 'cash', 0, 'yes', 0, '2021-09-24'),
('RC2VHEN', 'GN1993', 610, 'Aug', 2014, 'Monthly Fee', 'cash', 0, 'no', 80, '2014-07-22'),
('RC2VHEN', 'GN1993', 610, 'Jul', 2014, 'Monthly Fee', 'cash', 0, 'yes', 0, '2014-07-22'),
('RC2VHEN', 'GN1993', 610, 'Oct', 2014, 'Monthly Fee', 'cash', 0, 'yes', 0, '2014-07-22'),
('RC2VHEN', 'GN1993', 610, 'Sep', 2014, 'Monthly Fee', 'cash', 0, 'no', 80, '2014-07-22'),
('RC38BE5', '8329', 500, 'One time', 2021, 'Mid term 2 fee', 'cheque', 88550, 'no', 2480, '2021-09-25'),
('RC6IT8J', '123321', 610, 'Aug', 2014, 'Monthly Fee', 'cash', 0, 'no', 70, '2014-10-19'),
('RC6IT8J', '123321', 610, 'Jul', 2014, 'Monthly Fee', 'cash', 0, 'no', 70, '2014-10-19'),
('RC6IT8J', '123321', 610, 'Sep', 2014, 'Monthly Fee', 'cash', 0, 'yes', 0, '2014-10-19'),
('RC6R48E', 'GN1993', 500, 'One time', 2014, 'Mid term 1 fee', 'cash', 0, 'no', 80, '2014-07-22'),
('RCCMUK2', 'al02', 610, 'Aug', 2014, 'Monthly Fee', 'cheque', 0, 'no', 80, '2014-07-24'),
('RCCMUK2', 'al02', 610, 'Jul', 2014, 'Monthly Fee', 'cheque', 0, 'yes', 0, '2014-07-24'),
('RCCMUK2', 'al02', 610, 'Nov', 2014, 'Monthly Fee', 'cheque', 0, 'yes', 0, '2014-07-24'),
('RCCMUK2', 'al02', 610, 'Oct', 2014, 'Monthly Fee', 'cheque', 0, 'yes', 0, '2014-07-24'),
('RCCMUK2', 'al02', 610, 'Sep', 2014, 'Monthly Fee', 'cheque', 0, 'no', 80, '2014-07-24'),
('RCE1J7X', '90', 650, 'One time', 2014, 'Admission Fee', 'cash', 0, 'no', 7760, '2014-09-24'),
('RCFH09B', '1212', 610, 'Aug', 2014, 'Monthly Fee', 'cheque', 0, 'no', 0, '2014-09-23'),
('RCFH09B', '1212', 610, 'Jul', 2014, 'Monthly Fee', 'cheque', 0, 'no', 0, '2014-09-23'),
('RCFH09B', '1212', 610, 'Sep', 2014, 'Monthly Fee', 'cheque', 0, 'yes', 0, '2014-09-23'),
('RCIWVLA', 'GN1993', 650, 'One time', 2014, 'Admission Fee', 'cash', 0, 'no', 80, '2014-07-22'),
('RCJZI5A', '889', 610, 'Aug', 2014, 'Monthly Fee', 'cash', 0, 'no', 330, '2014-09-25'),
('RCJZI5A', '889', 610, 'Jul', 2014, 'Monthly Fee', 'cash', 0, 'no', 640, '2014-09-25'),
('RCKHQFA', '90', 500, 'One time', 2014, 'Computer Lab', 'cheque', 890, 'no', 970, '2014-09-24'),
('RCMC857', '1234567', 500, 'One time', 2021, 'Mid term 1 fee', 'cash', 0, 'no', 2480, '2021-09-25'),
('RCR0GSD', 'GN1993', 700, 'One time', 2014, 'End Term Fee', 'cash', 0, 'yes', 0, '2014-07-24'),
('RCRVHMU', '90', 610, 'Aug', 2014, 'Monthly Fee', 'cash', 0, 'yes', 0, '2014-09-24'),
('RCXBE5H', 'GN1993', 610, 'Dec', 2014, 'Monthly Fee', 'cheque', 1233, 'no', 80, '2014-07-22'),
('RCXBE5H', 'GN1993', 610, 'Feb', 2014, 'Monthly Fee', 'cheque', 1233, 'yes', 0, '2014-07-22'),
('RCXBE5H', 'GN1993', 610, 'Jan', 2014, 'Monthly Fee', 'cheque', 1233, 'yes', 0, '2014-07-22'),
('RCXBE5H', 'GN1993', 610, 'Mar', 2014, 'Monthly Fee', 'cheque', 1233, 'no', 80, '2014-07-22'),
('RCXBE5H', 'GN1993', 610, 'Nov', 2014, 'Monthly Fee', 'cheque', 1233, 'no', 80, '2014-07-22'),
('RCXQLVE', '1212', 500, 'One time', 2021, 'Mid term 2 fee', 'cash', 0, 'yes', 0, '2021-09-25'),
('RCY53QO', '1212', 610, 'Dec', 2014, 'Monthly Fee', 'cash', 0, 'no', 0, '2014-09-23');

-- --------------------------------------------------------

--
-- Table structure for table `user_clg`
--

CREATE TABLE `user_clg` (
  `Enroll` varchar(100) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Medium` varchar(50) NOT NULL,
  `course` varchar(100) NOT NULL,
  `Std` varchar(50) NOT NULL,
  `Section` varchar(50) NOT NULL,
  `Gr_num` varchar(100) NOT NULL,
  `timestamp` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_clg`
--

INSERT INTO `user_clg` (`Enroll`, `Name`, `Medium`, `course`, `Std`, `Section`, `Gr_num`, `timestamp`) VALUES
('007', 'Amily Dore', 'English', 'B.A.', 'First', 'A', '007', '2021-09-25 03:25:28.721200'),
('008', 'Bran Davis', 'French', 'B.Com', 'Second', 'A', '890', '2021-09-25 03:25:31.455273'),
('1022', 'Liam Moore', 'English', 'MBA', 'Third', 'A', '1022', '2021-09-25 03:25:34.239735'),
('1111', 'Williams', 'English', 'MIT', 'First', 'A', '9600', '2021-09-24 18:15:00.000000'),
('122', 'Christopher', 'English', 'B.A.', 'First', 'A', '123', '2021-09-25 03:25:37.055545'),
('12212', 'Johnny G', 'English', 'B.A.', 'First', 'A', '2333', '2021-09-25 03:25:40.572830'),
('123', 'Sid', 'English', 'B.A.', 'First', 'A', '2121', '2021-09-25 03:25:42.224917'),
('124', 'Thomas Hudson', 'French', 'B.Com', 'Second', 'A', '124', '2021-09-25 03:26:04.088012'),
('125', 'Colin', 'French', 'B.Com', 'Second', 'A', '125', '2021-09-25 03:26:05.680106'),
('126', 'Eddie Brock', 'French', 'B.Com', 'Second', 'A', '126', '2021-09-25 03:26:07.361160'),
('5672', 'Philip', 'English', 'B.A.', 'First', 'A', '789', '2021-09-25 03:25:43.784110'),
('6787', 'Jeff Harvey', 'English', 'B.A.', 'First', 'A', '676', '2021-09-25 03:25:45.249164'),
('890', 'Stuart', 'English', 'B.A.', 'First', '', '809', '2021-09-25 03:25:46.956594'),
('9090', 'Chris', 'English', 'B.A.', 'First', 'A', '9091', '2021-09-25 03:25:49.570620');

-- --------------------------------------------------------

--
-- Table structure for table `user_sch`
--

CREATE TABLE `user_sch` (
  `Enroll` varchar(100) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Medium` varchar(50) NOT NULL,
  `Std` varchar(50) NOT NULL,
  `Section` varchar(50) NOT NULL,
  `Gr_num` varchar(100) NOT NULL,
  `timestamp` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sch`
--

INSERT INTO `user_sch` (`Enroll`, `Name`, `Medium`, `Std`, `Section`, `Gr_num`, `timestamp`) VALUES
('1212', 'Brent White', 'English', 'first', 'A', '1212', '2021-09-24 15:00:13.127438'),
('121211', 'Cameron', 'English', 'second', 'A', '9090', '2021-09-24 15:00:18.724447'),
('1212121', 'Joseph Bowmaker', 'English', 'second', 'A', '100', '2021-09-24 15:00:24.053535'),
('1221', 'Jordan', 'English', 'first', 'A', '889', '2021-09-24 15:00:28.977202'),
('123', 'Tobie', 'English', 'first', 'A', '90', '2021-09-24 15:00:32.584045'),
('123456', 'Tommy', 'English', 'first', 'A', 'GN1993', '2021-09-24 15:00:36.119914'),
('124321', 'Tonny', 'English', 'first', 'A', '8329', '2021-09-24 15:00:42.703586'),
('8660', 'John Camp', 'French', 'first', 'A', '6666', '2021-09-23 18:15:00.000000'),
('al02', 'Alex', 'English', 'first', 'A', 'rohan', '2021-09-24 15:01:09.260996'),
('gypsy92', 'Claudia', 'English', 'first', 'B', '123321', '2021-09-24 15:00:52.948845'),
('paul20', 'Paul', 'English', 'first', 'A', '1234567', '2021-09-24 15:01:16.360527');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_sch`
--
ALTER TABLE `admin_sch`
  ADD PRIMARY KEY (`uname`);

--
-- Indexes for table `clg_class`
--
ALTER TABLE `clg_class`
  ADD PRIMARY KEY (`Medium`,`Course`,`Std`);

--
-- Indexes for table `clg_cls_fee`
--
ALTER TABLE `clg_cls_fee`
  ADD PRIMARY KEY (`Medium`,`Course`,`Std`,`fee_type`);

--
-- Indexes for table `clg_details`
--
ALTER TABLE `clg_details`
  ADD PRIMARY KEY (`Enroll`);

--
-- Indexes for table `clg_tran`
--
ALTER TABLE `clg_tran`
  ADD PRIMARY KEY (`Reciept`,`Gr_num`,`Month`,`fee_type`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`Key_p`);

--
-- Indexes for table `sch_class`
--
ALTER TABLE `sch_class`
  ADD PRIMARY KEY (`Medium`,`Std`);

--
-- Indexes for table `sch_cls_fee`
--
ALTER TABLE `sch_cls_fee`
  ADD PRIMARY KEY (`Medium`,`Std`,`fee_type`);

--
-- Indexes for table `sch_details`
--
ALTER TABLE `sch_details`
  ADD PRIMARY KEY (`Enroll`);

--
-- Indexes for table `sch_tran`
--
ALTER TABLE `sch_tran`
  ADD PRIMARY KEY (`Reciept`,`Gr_num`,`Month`,`fee_type`);

--
-- Indexes for table `user_clg`
--
ALTER TABLE `user_clg`
  ADD PRIMARY KEY (`Enroll`);

--
-- Indexes for table `user_sch`
--
ALTER TABLE `user_sch`
  ADD PRIMARY KEY (`Enroll`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
