-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2020 at 01:12 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `railres`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `pnr` varchar(250) NOT NULL,
  `uname` varchar(15) NOT NULL,
  `Tnumber` int(11) NOT NULL,
  `class` varchar(2) NOT NULL,
  `doj` date NOT NULL,
  `DOB` datetime NOT NULL,
  `fromstn` varchar(15) NOT NULL,
  `tostn` varchar(15) NOT NULL,
  `Name` varchar(15) NOT NULL,
  `Age` int(11) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `Status` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `pnr`, `uname`, `Tnumber`, `class`, `doj`, `DOB`, `fromstn`, `tostn`, `Name`, `Age`, `sex`, `Status`) VALUES
(35, 'PNR2709', 'admin', 13000, '3A', '2020-08-26', '2020-08-26 12:51:00', 'KOL', 'TVM', 'ljhghjhg', 786, 'male', 'Approved'),
(34, 'PNR2709', 'admin', 13000, '3A', '2020-08-26', '2020-08-26 12:51:00', 'KOL', 'TVM', 'kgigiy', 7656, 'male', 'Approved'),
(33, 'PNR7355', 'kunjan', 14000, '3A', '2020-08-25', '2020-08-25 08:03:12', 'CHN', 'MUM', 'gffdg', 3432, 'male', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `train_list`
--

CREATE TABLE `train_list` (
  `Number` int(11) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Origin` varchar(20) NOT NULL,
  `Destination` varchar(20) NOT NULL,
  `Arrival` varchar(10) NOT NULL,
  `Departure` varchar(10) NOT NULL,
  `Mon` varchar(2) NOT NULL,
  `Tue` varchar(2) NOT NULL,
  `Wed` varchar(2) NOT NULL,
  `Thu` varchar(2) NOT NULL,
  `Fri` varchar(2) NOT NULL,
  `Sat` varchar(2) NOT NULL,
  `Sun` varchar(2) NOT NULL,
  `1A` int(11) NOT NULL,
  `2A` int(11) NOT NULL,
  `3A` int(11) NOT NULL,
  `SL` int(11) NOT NULL,
  `General` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `train_list`
--

INSERT INTO `train_list` (`Number`, `Name`, `Origin`, `Destination`, `Arrival`, `Departure`, `Mon`, `Tue`, `Wed`, `Thu`, `Fri`, `Sat`, `Sun`, `1A`, `2A`, `3A`, `SL`, `General`) VALUES
(12000, 'TRIVANDRUM EXP', 'TVM', 'CHN', '22:15', '06:25', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'N', 2500, 1000, 500, 250, 100),
(13000, 'KOLKATA EXP', 'KOL', 'TVM', '09.00', '14:20', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'N', 2500, 1000, 500, 250, 100),
(14000, 'CHENNAI EXP', 'CHN', 'MUM', '13:00', '02.00', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'N', 2500, 1000, 500, 250, 100),
(15000, 'MUMBAI RAJDHANI', 'MUM', 'KOL', '08:25', '23.25', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 2500, 1000, 500, 250, 100),
(15002, 'afsdf', 'kjbk', 'kjbjkb', '01:57', '01:03', 'Y', 'Y', 'Y', 'Y', 'N', 'Y', 'Y', 5, 1, 1, 1, 1),
(15003, 'sdfdsjkn', 'sldjfjhj', 'osdfjo', '02:36', '02:36', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `is_admin` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `f_name`, `l_name`, `email`, `password`, `gender`, `dob`, `mobile`, `is_admin`) VALUES
(1, 'admin', 'admin', 'admin@admin.com', 'admin', 'male', '2002-08-26', 9876543210, 1),
(2, 'kunjan', 'kunjadi', 'admin@gmail.com', '1234', 'male', '2002-08-30', 9876543234, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `train_list`
--
ALTER TABLE `train_list`
  ADD PRIMARY KEY (`Number`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `train_list`
--
ALTER TABLE `train_list`
  MODIFY `Number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15004;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
