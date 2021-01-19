-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2021 at 01:33 PM
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
  `Fullname` varchar(30) NOT NULL,
  `Position` varchar(255) NOT NULL,
  `Position_Station_No` int(11) NOT NULL,
  `User_Type` varchar(255) NOT NULL DEFAULT 'Admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Staff_Id`, `Email`, `Password`, `Fullname`, `Position`, `Position_Station_No`, `User_Type`) VALUES
(1, 'admin@gmail.com', '123', 'Sergeant Azri', 'Sergeant', 413, 'Admin');

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
  `Identity_No` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `health`
--

INSERT INTO `health` (`Form_Id`, `IsFever`, `IsCough`, `IsSore_Throat`, `IsDifficult_Breath`, `OtherSymptoms`, `CloseContact`, `IsRed_Area`, `Health_Status`, `Identity_No`) VALUES
(5, 'Yes', 'No', 'No', 'Yes', 'no', 'Yes', 'Yes', 'Bad', '99021233313'),
(9, 'Yes', 'No', 'No', 'Yes', 'No', 'Yes', 'Yes', 'Bad', '81923891382'),
(10, 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'Good', '65783919233'),
(11, 'No', 'No', 'No', 'Yes', 'No', 'Yes', 'Yes', 'Bad', '0910912311'),
(12, 'Yes', 'No', 'No', 'No', 'No', 'No', 'Yes', 'Bad', '51256361523'),
(13, 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'Good', '6721398198312'),
(14, 'No', 'No', 'No', 'No', '', 'No', 'No', 'Good', '78810741812132'),
(15, 'No', 'No', 'No', 'No', '', 'Yes', 'No', 'Bad', '888912312344'),
(16, 'Yes', 'No', 'No', 'Yes', '', 'Yes', 'No', 'Bad', '899813132'),
(17, 'Yes', 'No', 'No', 'No', '', 'Yes', 'Yes', 'Bad', '9901471271171'),
(18, 'Yes', 'No', 'No', 'Yes', '', 'Yes', 'Yes', 'Bad', '9902171234124');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `Request_Id` int(3) NOT NULL,
  `Identity_No` varchar(50) NOT NULL,
  `Vehicle_Req_No` varchar(255) NOT NULL,
  `Destination` varchar(255) NOT NULL,
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

INSERT INTO `request` (`Request_Id`, `Identity_No`, `Vehicle_Req_No`, `Destination`, `Departure_Date`, `Arrival_Date`, `Reason`, `Request_Date`, `Request_Status`, `Form_Id`, `Mode_Of_Transportation`) VALUES
(13, '99021233313', 'abc 1243', 'KL', '2021-01-20', '2021-01-21', 'Saja', '2021-01-19 02:14:33', 'Approved', 5, 'Terbang'),
(14, '81923891382', 'abc 1243', 'Kedah', '2021-01-20', '2021-01-22', 'Saja', '2021-01-19 02:29:00', 'Rejected', 9, 'Selam'),
(15, '65783919233', 'abc 1243', 'Hotel Hatten, Melaka', '2021-01-19', '2021-01-20', 'Bercuti', '2021-01-19 05:09:59', 'Approved', 10, 'Kereta'),
(16, '0910912311', 'jas 213', 'Kedah', '2021-01-20', '2021-02-05', 'Bercuti', '2021-01-19 06:09:49', 'Rejected', 11, 'Selam'),
(17, '51256361523', 'asd 1411', 'Shigansian', '2021-01-29', '2021-01-30', 'Entah la', '2021-01-19 06:10:06', 'Approved', 12, 'Kereta'),
(18, '6721398198312', 'erw 123', 'Kedah', '2021-01-20', '2021-01-20', 'Bercuti', '2021-01-19 06:10:08', 'Approved', 13, 'Terbang'),
(19, '78810741812132', 'fag 1412', 'Hotel Hatten, Melaka', '2021-01-19', '2021-01-20', 'Bercuti', '2021-01-19 06:10:10', 'Approved', 14, 'kereta'),
(20, '888912312344', 'bah 123', 'Marley', '2021-02-25', '2021-03-11', 'Bercuti', '2021-01-19 06:10:12', 'Approved', 15, 'Terbang'),
(21, '899813132', 'abc 1243', 'Korea', '2021-01-20', '2021-01-21', 'Entah la', '2021-01-19 06:10:14', 'Approved', 16, 'Kebal'),
(22, '9901471271171', 'dac 4132', 'Kuala Lumpur', '2021-01-19', '2021-01-20', 'Saja', '2021-01-19 06:16:17', 'Approved', 17, 'Kereta'),
(23, '9901471271171', 'ncb 1234', 'Kedah', '2021-01-29', '2021-01-30', 'Bercuti', '2021-01-19 06:16:19', 'Approved', 17, 'Selam'),
(24, '9902171234124', 'aaa 1234', 'KL', '2021-01-19', '2021-01-20', 'Bercuti', '2021-01-19 06:49:10', 'Approved', 18, 'Kereta');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Identity_No` varchar(50) NOT NULL,
  `Identity_Type` varchar(255) NOT NULL,
  `Fullname` varchar(30) NOT NULL,
  `Address` varchar(30) NOT NULL,
  `State` varchar(255) NOT NULL,
  `Nationality` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) CHARACTER SET latin1 NOT NULL,
  `Phone_Number` varchar(14) NOT NULL,
  `User_Type` varchar(256) NOT NULL DEFAULT 'Customer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Identity_No`, `Identity_Type`, `Fullname`, `Address`, `State`, `Nationality`, `Email`, `Password`, `Phone_Number`, `User_Type`) VALUES
('0910912311', 'Passport', 'Genos', 'Japan Town', 'Negeri Sembilan', 'Foreigner', 'g@gmail.com', '202cb962ac59075b964b07152d234b70', '01523123312', 'Customer'),
('51256361523', 'Passport', 'Lian', 'Lot rumah aku', 'Labuan', 'Foreigner', 'c@gmail.com', '202cb962ac59075b964b07152d234b70', '0192139129', 'Customer'),
('65783919233', 'I/C', 'aiman', 'Rumah dia rumah saya', 'Sabah', 'Malaysian', 'aiman120899@gmail.com', '202cb962ac59075b964b07152d234b70', '019283123', 'Customer'),
('6721398198312', 'I/C', 'Eren JAEGER', 'Shigansina', 'Sarawak', 'Malaysian', 'eren@gmail.com', '202cb962ac59075b964b07152d234b70', '017626321132', 'Customer'),
('78810741812132', 'I/C', 'Izzuddin', 'Jalan Kampung, Alam sebalik ma', 'Kelantan', 'Malaysian', 'izz@gmail.com', '202cb962ac59075b964b07152d234b70', '01912939123', 'Customer'),
('81923891382', 'I/C', 'aa', 'Rumah aku', 'Putrajaya', 'Malaysian', 'b@gmail.com', '202cb962ac59075b964b07152d234b70', '112312134', 'Customer'),
('888912312344', 'I/C', 'Levi ACKERMAN', 'Durian Tunggal', 'Melaka', 'Malaysian', 'levi@gmail.com', '202cb962ac59075b964b07152d234b70', '0141723612763', 'Customer'),
('899813132', 'Passport', 'Saitama', 'Japan Town', 'Kelantan', 'Foreigner', 's@gmail.com', '202cb962ac59075b964b07152d234b70', '01432134123', 'Customer'),
('9180913123132', 'I/C', 'Mikasa', 'Rose wall', 'Kelantan', 'Malaysian', 'mikasa@gmail.com', '202cb962ac59075b964b07152d234b70', '01612631263', 'Customer'),
('9901471271171', 'I/C', 'Ariff Rahimin', 'Rumah budu', 'Kelantan', 'Foreigner', 'ariff@gmail.com', '202cb962ac59075b964b07152d234b70', '0186214133', 'Customer'),
('99021233313', 'I/C', 'Muhammad Azri bin Azmi', 'Lot 2101, Batu 10 1/4, Kampung', 'Kedah', 'Malaysian', 'abc@gmail.com', '202cb962ac59075b964b07152d234b70', '0172276503', 'Customer'),
('9902171234124', 'I/C', 'Azri Azmi', 'Lot 2101, Batu 10 1/4, Kampung', 'Negeri Sembilan', 'Malaysian', 'azri@gmail.com', '202cb962ac59075b964b07152d234b70', '01841241234', 'Customer');

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
  ADD KEY `fk_foreign_key_name3` (`Identity_No`) USING BTREE;

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`Request_Id`),
  ADD UNIQUE KEY `Request_Id` (`Request_Id`),
  ADD KEY `fk_foreign_key_name` (`Identity_No`),
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Staff_Id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `health`
--
ALTER TABLE `health`
  MODIFY `Form_Id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `Request_Id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `health`
--
ALTER TABLE `health`
  ADD CONSTRAINT `fk_foreign_key_name3` FOREIGN KEY (`Identity_No`) REFERENCES `user` (`Identity_No`);

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `fk_foreign_key_name` FOREIGN KEY (`Identity_No`) REFERENCES `user` (`Identity_No`),
  ADD CONSTRAINT `fk_foreign_key_name1` FOREIGN KEY (`Form_Id`) REFERENCES `health` (`Form_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
