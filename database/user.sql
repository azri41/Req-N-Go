-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2020 at 05:36 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Identity_No` int(12) NOT NULL,
  `Fullname` varchar(30) NOT NULL,
  `Address` varchar(30) NOT NULL,
  `Email` varchar(15) NOT NULL,
  `Phone_Number` varchar(11) NOT NULL,
  `Nationality` varchar(3) NOT NULL,
  `State` varchar(10) NOT NULL,
  `Area` varchar(30) NOT NULL,
  `Poscode` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Identity_No`, `Fullname`, `Address`, `Email`, `Phone_Number`, `Nationality`, `State`, `Area`, `Poscode`) VALUES
(12345689, 'ali bin abu', 'batu belah', 'ali@gmail.com', '0122848493', 'Mal', 'Melaka', 'Alor Gajah', 78000),
(987654321, 'haziq qwe', 'qweasd432', 'qwe123@gmail.co', '0122948123', 'Mal', 'ICD', 'alor gajah duduk', 78001);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Identity_No`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
