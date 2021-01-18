-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2021 at 12:18 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reqngo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Staff_Id` int(6) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Fullname` varchar(30) NOT NULL,
  `Position` varchar(255) NOT NULL,
  `Position_Station_No` int(11) NOT NULL,
  `User_Type` varchar(255) NOT NULL DEFAULT 'Admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `health`
--

CREATE TABLE `health` (
  `Form_Id` int(5) NOT NULL,
  `IsFever` varchar(5) NOT NULL,
  `IsCough` varchar(5) NOT NULL,
  `IsSore_Throat` varchar(5) NOT NULL,
  `IsDifficult_Breath` varchar(5) NOT NULL,
  `OtherSymptoms` varchar(20) NOT NULL,
  `CloseContact` varchar(5) NOT NULL,
  `IsRed_Area` varchar(5) NOT NULL,
  `Health_Status` varchar(10) DEFAULT NULL,
  `Identity_No` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `health`
--

INSERT INTO `health` (`Form_Id`, `IsFever`, `IsCough`, `IsSore_Throat`, `IsDifficult_Breath`, `OtherSymptoms`, `CloseContact`, `IsRed_Area`, `Health_Status`, `Identity_No`) VALUES
(1, 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', NULL, '1234'),
(2, 'yes', '', '', '', '', '', '', NULL, '1234');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `Request_Id` int(3) NOT NULL,
  `Identity_No` varchar(255) NOT NULL,
  `Vehicle_Req_No` varchar(255) NOT NULL,
  `Departure_Date` date NOT NULL,
  `Arrival_Date` date NOT NULL,
  `Reason` varchar(100) NOT NULL,
  `Request_Date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `Request_Status` varchar(10) NOT NULL,
  `Form_Id` int(5) NOT NULL,
  `Mode_Of_Transportation` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`Request_Id`, `Identity_No`, `Vehicle_Req_No`, `Departure_Date`, `Arrival_Date`, `Reason`, `Request_Date`, `Request_Status`, `Form_Id`, `Mode_Of_Transportation`) VALUES
(4, '1234', 'WED2310', '2021-01-30', '2021-01-31', 'WEDDING', '2021-01-18 11:05:38', 'Pending', 0, 'MOTOR'),
(6, '1234', 'CCR4321', '2021-01-20', '2021-01-31', 'Business purpose', '2021-01-18 11:12:19', 'Pending', 2, 'HELICOPTER'),
(8, '1234', 'DEW4567', '2021-01-18', '2021-01-26', 'MEETING', '2021-01-18 11:14:23', 'Pending', 2, 'PLANE');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Identity_No` varchar(50) NOT NULL,
  `Identity_Type` varchar(50) NOT NULL,
  `Fullname` varchar(30) NOT NULL,
  `Address` varchar(30) NOT NULL,
  `State` varchar(50) NOT NULL,
  `Nationality` varchar(50) NOT NULL,
  `Email` varchar(15) NOT NULL,
  `Password` varchar(255) CHARACTER SET latin1 NOT NULL,
  `Phone_Number` varchar(14) NOT NULL,
  `User_Type` varchar(50) NOT NULL DEFAULT 'Customer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Identity_No`, `Identity_Type`, `Fullname`, `Address`, `State`, `Nationality`, `Email`, `Password`, `Phone_Number`, `User_Type`) VALUES
('1234', 'I/C', 'NUR ALIS SOPHIA BINTI SUHAIMI', 'NO. 14, LORONG 4,', 'Pahang', 'Malaysian', 'lol@example.com', '9cdfb439c7876e703e307864c9167a15', '0199659579', 'Customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Staff_Id`);

--
-- Indexes for table `health`
--
ALTER TABLE `health`
  ADD PRIMARY KEY (`Form_Id`),
  ADD KEY `Identity_No` (`Identity_No`(191));

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`Request_Id`),
  ADD UNIQUE KEY `Request_Id` (`Request_Id`),
  ADD KEY `fk_foreign_key_name` (`Identity_No`(191)),
  ADD KEY `fk_foreign_key_name1` (`Form_Id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Identity_No`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `Request_Id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
