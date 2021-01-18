-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2021 at 05:28 AM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
  `Fullname` varchar(255) NOT NULL,
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
  `Health_Status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `Request_Id` int(3) NOT NULL,
  `Identity_No` int(12) NOT NULL,
  `Vehicle_Req_No` varchar(255) NOT NULL,
  `Departure_Date` date NOT NULL,
  `Arrival_Date` date NOT NULL,
  `Reason` varchar(255) NOT NULL,
  `Request_Date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `Request_Status` varchar(255) NOT NULL,
  `Form_Id` int(5) NOT NULL,
  `Staff_Id` int(6) NOT NULL,
  `Mode_Of_Transportation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Identity_No` int(12) NOT NULL,
  `Identity_Type` varchar(255) NOT NULL,
  `Fullname` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `State` varchar(255) NOT NULL,
  `Nationality` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) CHARACTER SET latin1 NOT NULL,
  `Phone_Number` varchar(14) NOT NULL,
  `User_Type` varchar(255) NOT NULL DEFAULT 'Customer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  ADD PRIMARY KEY (`Form_Id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`Request_Id`),
  ADD UNIQUE KEY `Request_Id` (`Request_Id`),
  ADD KEY `fk_foreign_key_name` (`Identity_No`),
  ADD KEY `fk_foreign_key_name1` (`Form_Id`),
  ADD KEY `fk_foreign_key_name2` (`Staff_Id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Identity_No`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Staff_Id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `health`
--
ALTER TABLE `health`
  MODIFY `Form_Id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `Request_Id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `fk_foreign_key_name` FOREIGN KEY (`Identity_No`) REFERENCES `user` (`Identity_No`),
  ADD CONSTRAINT `fk_foreign_key_name1` FOREIGN KEY (`Form_Id`) REFERENCES `health` (`Form_Id`),
  ADD CONSTRAINT `fk_foreign_key_name2` FOREIGN KEY (`Staff_Id`) REFERENCES `admin` (`Staff_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
