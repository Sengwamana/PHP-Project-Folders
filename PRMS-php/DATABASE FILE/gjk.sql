-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2021 at 03:47 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gjk`
--

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `sno` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`sno`, `user`, `time`, `date`, `type`) VALUES
(9, 'liam', '22:37:42', '2021-06-27', 'normal'),
(10, 'liam', '22:20:51', '2021-09-30', 'normal'),
(11, 'liam', '23:39:34', '2021-09-30', 'normal');

-- --------------------------------------------------------

--
-- Table structure for table `obfirst`
--

CREATE TABLE `obfirst` (
  `rkey` varchar(100) NOT NULL,
  `lmp` date NOT NULL,
  `ga_lmp` varchar(100) NOT NULL,
  `eod_lmp` date NOT NULL,
  `ga_usg` varchar(100) NOT NULL,
  `eod_usg` date NOT NULL,
  `crl` varchar(30) NOT NULL,
  `ges_week` int(5) NOT NULL,
  `ges_day` int(5) NOT NULL,
  `ro` varchar(30) NOT NULL,
  `rom` varchar(30) NOT NULL,
  `lo` varchar(30) NOT NULL,
  `lom` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obfirst`
--

INSERT INTO `obfirst` (`rkey`, `lmp`, `ga_lmp`, `eod_lmp`, `ga_usg`, `eod_usg`, `crl`, `ges_week`, `ges_day`, `ro`, `rom`, `lo`, `lom`) VALUES
('VStv0kfzBM', '2021-06-27', '0weeks 0days ', '2022-03-03', '0 weeks 0 days', '2021-06-27', '101', 7, 7, '7', ' 0 X 0 X 0 ', '7', ' 0 X 0 X 0 '),
('FbUvNqe0Co', '2021-09-30', '50days ', '2022-06-07', '5weeks 0 days', '2021-10-05', '10', 5, 10, 'Testing', ' 0 X 0 X 0 ', 'Testing', ' 0 X 0 X 0 ');

-- --------------------------------------------------------

--
-- Table structure for table `obtwo`
--

CREATE TABLE `obtwo` (
  `bpd` varchar(30) NOT NULL,
  `hc` varchar(30) NOT NULL,
  `ac` varchar(30) NOT NULL,
  `fl` varchar(30) NOT NULL,
  `placenta` varchar(30) NOT NULL,
  `liquor` varchar(30) NOT NULL,
  `afi` varchar(30) NOT NULL,
  `fhr` varchar(30) NOT NULL,
  `fwt` varchar(30) NOT NULL,
  `mi` varchar(30) NOT NULL,
  `geswk` varchar(30) NOT NULL,
  `gesdays` varchar(30) NOT NULL,
  `cl` varchar(30) NOT NULL,
  `rkey` varchar(30) NOT NULL,
  `bpdwd` varchar(30) NOT NULL,
  `hcwd` varchar(30) NOT NULL,
  `acwd` varchar(30) NOT NULL,
  `flwd` varchar(30) NOT NULL,
  `sdate` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obtwo`
--

INSERT INTO `obtwo` (`bpd`, `hc`, `ac`, `fl`, `placenta`, `liquor`, `afi`, `fhr`, `fwt`, `mi`, `geswk`, `gesdays`, `cl`, `rkey`, `bpdwd`, `hcwd`, `acwd`, `flwd`, `sdate`) VALUES
('11', '11', '12', '12', '11', 'Testing', 'Testing', '11', 'Testing', ' Testing', '12', '12', 'Testing', 'HVgFl5unJN', '10 wks & 10 days', '10 wks & 0 days', '10 wks & 10 days', '0 wks & 0 days', '2021-09-30');

-- --------------------------------------------------------

--
-- Table structure for table `patient_record_header`
--

CREATE TABLE `patient_record_header` (
  `pid` int(11) NOT NULL,
  `age` int(5) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `referredby` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `study` varchar(100) NOT NULL,
  `indication` varchar(100) NOT NULL,
  `rkey` varchar(50) NOT NULL,
  `attendedby` varchar(50) NOT NULL,
  `report_type` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_record_header`
--

INSERT INTO `patient_record_header` (`pid`, `age`, `gender`, `referredby`, `name`, `date`, `study`, `indication`, `rkey`, `attendedby`, `report_type`, `status`) VALUES
(39, 30, 'female', 'Johnn', 'Emily', '2021-06-27', 'Obstetrics', 'Demo', 'VStv0kfzBM', 'admin', 'ogone', 'Printed'),
(40, 36, 'female', 'Demo Dr', 'Demoname', '2021-09-30', 'gynaec', 'Testing', 'LdK71Ot3bP', 'admin', 'pelvis', 'notPrinted'),
(41, 50, 'female', 'Demo D', 'Demo P', '2021-09-30', 'Obstetrics', 'Testing', 'FbUvNqe0Co', 'admin', 'ogone', 'notPrinted'),
(42, 41, 'male', 'Dr Testing', 'Test Patient Name', '2021-09-30', 'Obstetrics', 'Testing', 'HVgFl5unJN', 'admin', 'obtwo', 'notPrinted'),
(43, 40, 'female', 'Dr Sample', 'Sample Patient', '2021-09-30', 'gynaec', 'Demo', 'rCuc8CN90h', 'admin', 'pelvistwo', 'notPrinted');

-- --------------------------------------------------------

--
-- Table structure for table `pelvis`
--

CREATE TABLE `pelvis` (
  `rkey` varchar(30) NOT NULL,
  `tvaginal` varchar(30) NOT NULL,
  `tabdominal` varchar(30) NOT NULL,
  `uterus_appeared` varchar(30) NOT NULL,
  `uterus_measure` varchar(200) NOT NULL,
  `cavity` varchar(20) NOT NULL,
  `ro_measure` varchar(200) NOT NULL,
  `ro_appear` varchar(50) NOT NULL,
  `ro_comment` varchar(100) NOT NULL,
  `lo_mesure` varchar(200) NOT NULL,
  `lo_appear` varchar(50) NOT NULL,
  `lo_comment` varchar(100) NOT NULL,
  `date1` date NOT NULL,
  `day1` varchar(20) NOT NULL,
  `ro1` varchar(50) NOT NULL,
  `lo1` varchar(50) NOT NULL,
  `et1` varchar(20) NOT NULL,
  `date2` date DEFAULT NULL,
  `day2` varchar(20) DEFAULT NULL,
  `ro2` varchar(50) DEFAULT NULL,
  `lo2` varchar(50) DEFAULT NULL,
  `et2` varchar(20) DEFAULT NULL,
  `date3` date DEFAULT NULL,
  `day3` varchar(20) DEFAULT NULL,
  `ro3` varchar(50) DEFAULT NULL,
  `lo3` varchar(50) DEFAULT NULL,
  `et3` varchar(20) DEFAULT NULL,
  `date4` date DEFAULT NULL,
  `day4` varchar(20) DEFAULT NULL,
  `ro4` varchar(50) DEFAULT NULL,
  `lo4` varchar(50) DEFAULT NULL,
  `et4` varchar(20) DEFAULT NULL,
  `impression` varchar(250) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelvis`
--

INSERT INTO `pelvis` (`rkey`, `tvaginal`, `tabdominal`, `uterus_appeared`, `uterus_measure`, `cavity`, `ro_measure`, `ro_appear`, `ro_comment`, `lo_mesure`, `lo_appear`, `lo_comment`, `date1`, `day1`, `ro1`, `lo1`, `et1`, `date2`, `day2`, `ro2`, `lo2`, `et2`, `date3`, `day3`, `ro3`, `lo3`, `et3`, `date4`, `day4`, `ro4`, `lo4`, `et4`, `impression`) VALUES
('LdK71Ot3bP', 'no', 'no', 'antiverted', '0 X 0 X 0', 'abnormal', '0 X 0 X 0', 'normal', 'Testing', '0 X 0 X 0', 'abnormal', '', '2021-09-29', '2', 'Testing', 'Testing', 'Testing', '2021-09-30', '9', 'Sample', 'Sample', 'Sample', '2021-10-07', '16', 'Sample T', 'Sample T', 'Sample T', '2021-10-20', '21', 'F', 'F', 'F', 'Testing');

-- --------------------------------------------------------

--
-- Table structure for table `pelvistwo`
--

CREATE TABLE `pelvistwo` (
  `rkey` varchar(30) NOT NULL,
  `tvaginal` varchar(20) NOT NULL,
  `tabdominal` varchar(20) NOT NULL,
  `uterus_appeared` varchar(30) NOT NULL,
  `u_measured` varchar(100) NOT NULL,
  `cavity` varchar(50) NOT NULL,
  `endomaterial_thickness` varchar(50) NOT NULL,
  `ro_measure` varchar(100) NOT NULL,
  `ro` varchar(50) NOT NULL,
  `ro_comment` varchar(200) NOT NULL,
  `lo_measure` varchar(100) NOT NULL,
  `lo` varchar(50) NOT NULL,
  `lo_comment` varchar(200) NOT NULL,
  `impression` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelvistwo`
--

INSERT INTO `pelvistwo` (`rkey`, `tvaginal`, `tabdominal`, `uterus_appeared`, `u_measured`, `cavity`, `endomaterial_thickness`, `ro_measure`, `ro`, `ro_comment`, `lo_measure`, `lo`, `lo_comment`, `impression`) VALUES
('rCuc8CN90h', 'yes', 'no', 'antiverted', '1 X 0 X 3', 'abnormal', '6', '2 X 2 X 2', 'abnormal', 'Demo', '2 X 0 X 0', 'abnormal', 'Demo', 'This is a demo impression text for testing purpose!');

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `ID` int(8) NOT NULL,
  `username` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `degree` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`ID`, `username`, `type`, `password`, `fullname`, `address`, `email`, `phone`, `dob`, `degree`) VALUES
(1, 'admin', 'admin', 'Password@123', 'admin', 'xxx', 'xxx@gmail.com', '9998658650', '2019-11-13', 'MD (O&G)'),
(2, 'test', 'normal', 'test', 'xx', 'ccc\r\nvvv\r\nm', 'xx@gmail.com', '7894561230', '1952-03-21', 'tester'),
(3, 'liam', 'normal', 'Password@123', 'Liam Moore', '555 Demo Street', 'liamoore@gmail.com', '7412220201', '1990-06-27', 'MIT');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `obfirst`
--
ALTER TABLE `obfirst`
  ADD UNIQUE KEY `rkey` (`rkey`);

--
-- Indexes for table `obtwo`
--
ALTER TABLE `obtwo`
  ADD UNIQUE KEY `rkey` (`rkey`);

--
-- Indexes for table `patient_record_header`
--
ALTER TABLE `patient_record_header`
  ADD PRIMARY KEY (`pid`),
  ADD UNIQUE KEY `rkey` (`rkey`);

--
-- Indexes for table `pelvis`
--
ALTER TABLE `pelvis`
  ADD UNIQUE KEY `rkey` (`rkey`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `patient_record_header`
--
ALTER TABLE `patient_record_header`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `ID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
