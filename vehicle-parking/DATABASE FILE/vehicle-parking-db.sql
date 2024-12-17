-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2021 at 07:51 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vehicle-parking-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(10) NOT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Security_Code` int(55) NOT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Security_Code`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Administrator', 'admin', 7854445410, 1100, 'admin@gmail.com', 'd00f5d5217896fb7fd601412cb890830', '2021-01-05 05:38:23');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `c_email` varchar(55) NOT NULL,
  `c_website` varchar(55) NOT NULL,
  `c_address` varchar(255) NOT NULL,
  `last_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `c_name`, `c_email`, `c_website`, `c_address`, `last_update`) VALUES
(1, 'Demo Company', 'vparksystem@company.com', 'codeastro.com', '8169 Geigeer St NW', '2021-06-08 20:48:52');

-- --------------------------------------------------------

--
-- Table structure for table `vcategory`
--

CREATE TABLE `vcategory` (
  `ID` int(10) NOT NULL,
  `VehicleCat` varchar(120) DEFAULT NULL,
  `shortDescription` varchar(50) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vcategory`
--

INSERT INTO `vcategory` (`ID`, `VehicleCat`, `shortDescription`, `CreationDate`) VALUES
(1, 'Four Wheeler', 'Demo 4W', '2019-07-05 11:06:50'),
(2, 'Two Wheeler', 'Demo 2W', '2019-07-05 11:07:09'),
(6, 'Three Wheeler', 'MTCL 2W', '2021-03-07 16:41:57');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_info`
--

CREATE TABLE `vehicle_info` (
  `ID` int(10) NOT NULL,
  `ParkingNumber` varchar(120) DEFAULT NULL,
  `VehicleCategory` varchar(120) NOT NULL,
  `VehicleCompanyname` varchar(120) DEFAULT NULL,
  `RegistrationNumber` varchar(120) DEFAULT NULL,
  `OwnerName` varchar(120) DEFAULT NULL,
  `OwnerContactNumber` bigint(10) DEFAULT NULL,
  `InTime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `OutTime` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `ParkingCharge` varchar(120) NOT NULL,
  `Remark` mediumtext NOT NULL,
  `Status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle_info`
--

INSERT INTO `vehicle_info` (`ID`, `ParkingNumber`, `VehicleCategory`, `VehicleCompanyname`, `RegistrationNumber`, `OwnerName`, `OwnerContactNumber`, `InTime`, `OutTime`, `ParkingCharge`, `Remark`, `Status`) VALUES
(1, '96069', 'Four Wheeler', 'Hyundai', 'GGZ-1155', 'Jamie Macon', 8956232528, '2021-03-09 05:58:38', '2021-03-09 10:15:43', '34', 'NA', 'Out'),
(2, '52796', 'Two Wheeler', 'KTM', 'GTM-1069', 'Dan Wilson', 8989898989, '2021-03-09 08:58:38', '2021-03-09 14:16:26', '20', 'NA', 'Out'),
(3, '65023', 'Two Wheeler', 'Yamaha', 'JFF-7888', 'Lynn Roberts\n', 7845123697, '2021-03-09 08:58:38', '2021-03-09 12:16:31', '20', 'Vehicle Out', 'Out'),
(4, '90880', 'Two Wheeler', 'Suzuki', 'PLO-8507', 'Charles Mathew', 2132654447, '2021-03-09 08:58:38', '2021-03-09 13:58:38', '20', 'Vehicle Out', 'Out'),
(5, '09894', 'Two Wheeler', 'Piaggio', 'DLE-7701', 'Theresa Hay\n', 4654654654, '2021-03-09 08:58:38', '2021-03-09 14:58:38', '15', 'none', 'Out'),
(6, '78915', 'Two Wheeler', 'Aprilia', 'GZG-7896', 'Susie Eller', 7978999879, '2021-03-09 08:58:38', NULL, '', '', ''),
(7, '25207', 'Two Wheeler', 'Honda', 'LDC-7019', 'Shannon Pinson\n', 1234567890, '2021-03-09 11:03:05', '2021-03-09 11:58:38', '5', 'none', 'Out'),
(8, '58836', 'Two Wheeler', 'Yamaha', 'FYS-6969', 'Mark Paull', 1234567890, '2021-03-09 11:32:02', '2021-03-09 12:58:38', '5', 'Vehicle Out', 'Out'),
(9, '52207', 'Four Wheeler', 'Ford ', 'CAS-7850', 'Bernice Willilams\n', 7411112000, '2021-03-07 10:42:52', '2021-03-09 11:58:38', '7', 'none', 'Out'),
(10, '47648', 'Four Wheeler', 'Tesla', 'CST-6907', 'Myra Warnke\n', 8541112500, '2021-03-07 14:54:03', NULL, '', '', ''),
(11, '03289', 'Four Wheeler', 'Volkswagen', 'STT-7002', 'Colin Greenwood', 2574442560, '2021-03-08 13:50:15', NULL, '', '', ''),
(12, '62450', 'Two Wheeler', 'KTM', 'ILS-2580', 'Bruno Denn', 1254447850, '2021-03-08 09:34:55', '2021-03-08 15:58:38', '30', 'none', 'Out'),
(13, '28913', 'Four Wheeler', 'Hyundai', 'SSO-8800', 'Tanya Chilton\n', 2570005640, '2021-03-09 13:09:16', NULL, '', '', ''),
(14, '63879', 'Four Wheeler', 'Hyundai', 'GEP-7805', 'Matthew  Foust\n', 6667869500, '2021-07-16 15:28:32', '2021-07-16 17:17:19', '5', 'none', 'Out'),
(15, '37066', 'Four Wheeler', 'Tesla', 'QWE-9602', 'Paul Nicholls', 7412589658, '2021-07-17 16:18:01', '2021-07-17 16:49:40', '5', 'none', 'Out'),
(16, '19803', 'Four Wheeler', 'Renault', 'ABE-3470', 'Alyse Conn', 7896547850, '2021-07-17 16:59:26', '2021-07-17 17:20:22', '2', 'none', 'Out'),
(17, '25088', 'Four Wheeler', 'Volkswagen', 'TRS-8027', 'Bonnie Jackson', 7014741470, '2021-07-17 17:40:22', NULL, '', '', ''),
(18, '37496', 'Four Wheeler', 'Chevrolet', 'VNT-9135', 'Larry Clark', 7890240001, '2021-07-17 17:43:16', NULL, '', '', ''),
(19, '99316', 'Four Wheeler', 'MG', 'PIJ-8802', 'Jessica Garner', 7012560025, '2021-07-17 17:44:07', '2021-07-17 17:45:05', '3', 'none.', 'Out'),
(20, '59268', 'Two Wheeler', 'Kawasaki', 'LLL-8987', 'James', 7014569980, '2021-07-17 17:46:37', NULL, '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vcategory`
--
ALTER TABLE `vcategory`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `vehicle_info`
--
ALTER TABLE `vehicle_info`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `vcategory`
--
ALTER TABLE `vcategory`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `vehicle_info`
--
ALTER TABLE `vehicle_info`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
