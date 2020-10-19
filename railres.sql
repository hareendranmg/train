-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 19, 2020 at 10:18 PM
-- Server version: 8.0.21-0ubuntu0.20.04.4
-- PHP Version: 7.2.34-3+ubuntu20.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `booking_id` int NOT NULL,
  `pnr` varchar(250) NOT NULL,
  `uname` varchar(15) NOT NULL,
  `Tnumber` int NOT NULL,
  `class` varchar(2) NOT NULL,
  `doj` date NOT NULL,
  `DOB` date NOT NULL,
  `fromstn` varchar(15) NOT NULL,
  `tostn` varchar(15) NOT NULL,
  `Name` varchar(15) NOT NULL,
  `Age` int NOT NULL,
  `sex` varchar(10) NOT NULL,
  `Status` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `pnr`, `uname`, `Tnumber`, `class`, `doj`, `DOB`, `fromstn`, `tostn`, `Name`, `Age`, `sex`, `Status`) VALUES
(2, 'PNR6648', 'hmg1', 12000, 'GL', '2020-10-19', '2020-10-19', 'TVM', 'CHN', 'asdasd', 34, 'male', 'Waiting'),
(3, 'PNR6648', 'hmg1', 12000, 'GL', '2020-10-19', '2020-10-19', 'TVM', 'CHN', 'adada', 32, 'male', 'Waiting');

-- --------------------------------------------------------

--
-- Table structure for table `interlist`
--

CREATE TABLE `interlist` (
  `list_id` int NOT NULL,
  `Number` int DEFAULT NULL,
  `st1` varchar(10) DEFAULT NULL,
  `st1arri` varchar(10) DEFAULT NULL,
  `st2` varchar(10) DEFAULT NULL,
  `st2arri` varchar(10) DEFAULT NULL,
  `st3` varchar(10) DEFAULT NULL,
  `st3arri` varchar(10) DEFAULT NULL,
  `st4` varchar(10) DEFAULT NULL,
  `st4arri` varchar(10) DEFAULT NULL,
  `st5` varchar(10) DEFAULT NULL,
  `st5arri` varchar(10) DEFAULT NULL,
  `Ori` varchar(20) NOT NULL,
  `Oriarri` varchar(10) NOT NULL,
  `Dest` varchar(20) NOT NULL,
  `Desarri` varchar(10) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Mon` varchar(2) NOT NULL,
  `Tue` varchar(2) NOT NULL,
  `Wed` varchar(2) NOT NULL,
  `Thu` varchar(2) NOT NULL,
  `Fri` varchar(2) NOT NULL,
  `Sat` varchar(2) NOT NULL,
  `Sun` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `seats_availability`
--

CREATE TABLE `seats_availability` (
  `seat_id` int NOT NULL,
  `Train_No` int NOT NULL,
  `Train_Name` varchar(20) NOT NULL,
  `doj` date NOT NULL,
  `1A` int NOT NULL,
  `2A` int NOT NULL,
  `3A` int NOT NULL,
  `AC` int NOT NULL,
  `CC` int NOT NULL,
  `SL` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `train_list`
--

CREATE TABLE `train_list` (
  `Number` int NOT NULL,
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
  `1A` int NOT NULL,
  `2A` int NOT NULL,
  `3A` int NOT NULL,
  `SL` int NOT NULL,
  `General` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `train_list`
--

INSERT INTO `train_list` (`Number`, `Name`, `Origin`, `Destination`, `Arrival`, `Departure`, `Mon`, `Tue`, `Wed`, `Thu`, `Fri`, `Sat`, `Sun`, `1A`, `2A`, `3A`, `SL`, `General`) VALUES
(12000, 'TRIVANDRUM EXP', 'TVM', 'CHN', '22:15', '06:25', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'N', 2500, 1000, 500, 250, 100),
(13000, 'KOLKATA EXP', 'KOL', 'TVM', '09.00', '14:20', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'N', 2500, 1000, 500, 250, 100),
(14000, 'CHENNAI EXP', 'CHN', 'MUM', '13:00', '02.00', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'N', 2500, 1000, 500, 250, 100),
(15000, 'MUMBAI RAJDHANI', 'MUM', 'KOL', '08:25', '23.25', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 2500, 1000, 500, 250, 100);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `p_word` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `mobile` bigint NOT NULL,
  `is_admin` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `f_name`, `email`, `p_word`, `mobile`, `is_admin`) VALUES
(1, 'admin', 'hari', 'hari@gmail.com', '123456', 9639639639, 1),
(2, 'hari', 'hari', 'dsfdsf@fd.fds', '123', 5454545454, 0),
(3, 'aaaa', 'setserew', 'ewrew@dds', 'aaaaa', 4484833333, 0),
(4, 'hmg1', 'hmg1', 'hmg@hmg.com', '123', 9638527412, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `interlist`
--
ALTER TABLE `interlist`
  ADD PRIMARY KEY (`list_id`);

--
-- Indexes for table `seats_availability`
--
ALTER TABLE `seats_availability`
  ADD PRIMARY KEY (`seat_id`);

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
  MODIFY `booking_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
