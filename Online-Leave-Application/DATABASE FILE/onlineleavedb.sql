-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2021 at 04:49 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlineleavedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `id` int(11) NOT NULL,
  `eid` int(11) NOT NULL COMMENT 'Employee ID',
  `ename` varchar(255) NOT NULL COMMENT 'Employee''s Username',
  `descr` varchar(255) NOT NULL COMMENT 'Leave Reason',
  `fromdate` date NOT NULL,
  `todate` date NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`id`, `eid`, `ename`, `descr`, `fromdate`, `todate`, `status`) VALUES
(1, 2, 'williams', 'Other : Demo Test', '2021-07-01', '2021-07-02', 'Rejected'),
(2, 2, 'williams', 'Sabbatical : Testing after setting up dates', '2021-07-25', '2021-07-27', 'Pending'),
(3, 4, 'elissa', 'Sick : Won\'t be able to join as I am not feeling well enough! Need to take some rest.', '2021-07-25', '2021-07-27', 'Pending'),
(4, 2, 'williams', 'Vacation : test after setting up interval days', '2021-07-25', '2021-08-04', 'Pending'),
(5, 5, 'gordon', 'Casual : need to spend some time with my family!', '2021-07-26', '2021-07-28', 'Pending'),
(6, 6, 'edith', 'Sick : I need to Quarantine myself!', '2021-07-26', '2021-08-09', 'Accepted'),
(7, 5, 'gordon', 'Maternity / Paternity : Need to take care of my newborn', '2021-07-26', '2021-08-02', 'Accepted'),
(8, 2, 'williams', 'Casual : going on a vacation', '2021-07-27', '2021-08-03', 'Rejected');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(150) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(150) NOT NULL,
  `city` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `phone` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `name`, `password`, `type`, `email`, `gender`, `city`, `department`, `phone`) VALUES
(1, 'Liam Moore', 'liam', '$2y$10$7rLSvRVyTQORapkDOqmkhetjF6H9lJHngr4hJMSM2lHObJbW5EQh6', 'admin', 'liamoore@gmail.com', 'Male', 'Seattle', 'HR', '7458965000'),
(2, 'Will Williams', 'williams', '$2y$10$NjAyZjNlNTlkOTMyMmIyYejMwaXLwOFJCppILaR0.AmyrNlmO0JS2', 'employee', 'williams@gmail.com', 'Male', 'Boston', 'IT Support', '7412589650'),
(3, 'John Smith', 'johnsmith', '$2y$10$ZTY1NzVmMDJjNDdjYTU5YOCU.DCwg6aozzlER9OJQZOr.ElTfDiEm', 'employee', 'johnns@gmail.com', 'Male', 'Seattle', 'Marketing and Sales', '7458965555'),
(4, 'Elissa Parker', 'elissa', '$2y$10$ZjU1MWNhNzEzYzE1NDFlNe16xtxBPvyzUvoCDarzc8.0Iy2LuAHcO', 'employee', 'eparker@gmail.com', 'Female', 'Boston', 'Marketing and Sales', '7890000010'),
(5, 'Joshua Gordon', 'gordon', '$2y$10$ODRmZWRiMDVjMjU4MmE4O.o4gd1xaga.DkOqBAkNs8gobYFOD8JNO', 'employee', 'gordonj@gmail.com', 'Male', 'Atlanta', 'Customer Support', '7458960000'),
(6, 'Edith Graham', 'edith', '$2y$10$OTUyYTFlNDg1NTlhMjEwO.Lj4vqVaPWUVdrPZQ8nj2YZ1otkAAI.O', 'employee', 'edith@gmail.com', 'Female', 'Seattle', 'Test Team', '7410256001');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
