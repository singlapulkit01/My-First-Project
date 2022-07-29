-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2020 at 11:20 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fullstack`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `uid` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mob` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(300) NOT NULL,
  `state` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `qualification` mediumtext NOT NULL,
  `exp` int(11) NOT NULL,
  `spl` varchar(200) NOT NULL,
  `prev1` varchar(50) NOT NULL,
  `prev2` varchar(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`uid`, `name`, `mob`, `email`, `address`, `state`, `city`, `qualification`, `exp`, `spl`, `prev1`, `prev2`, `date`) VALUES
('aman', 'Aman', '9876543210', 'aman@gmail.com', 'Bhucho Mandi', 'Punjab', 'Bathinda', 'BV. Sc. in Animal Production & Management', 3, 'Birds', 'aman-Screenshot (58).png', 'aman-Screenshot (59).png', '2020-10-09'),
('Pulkit', 'Pulkit', '9465042060', 'singlapulkit5@gmail.com', 'Bhucho Mandi', 'Punjab', 'Bathinda', 'BV. Sc. in Veterinary Surgery & Radiology', 5, 'Honey bee', 'pulkit-Screenshot (57).png', 'pulkit-Screenshot (57).png', '2020-09-25'),
('Singla', 'Singla', '8284928841', 'singlapulkit01@gmail.com', 'Bhucho Mandi', 'Punjab', 'Jalandhar', 'BV. Sc. in Animal Genetics and Breeding', 6, 'Food Agro diagnostics in veterinary', 'singla-Screenshot (58).png', 'singla-Screenshot (58).png', '2020-09-25'),
('Singla Ji', 'Pulkit Singla', '8284928841', 'fatherrrsaaab@gmail.com', 'Bhucho Mandi', 'Punjab', 'Chandigarh', 'MV. Sc in Veterinary Medicine', 6, 'Birds', 'Singla Ji-Screenshot (56).png', 'Singla Ji-Screenshot (56).png', '2020-09-25'),
('Singla Saab', 'Pulkit Singla', '8284928841', 'fatherrrsaaab@gmail.com', 'Bhucho Mandi', 'Punjab', 'Bathinda', 'MV. Sc in Veterinary Medicine', 4, 'Birds', 'singla saab-Screenshot (59).png', 'singla saab-Screenshot (59).png', '2020-09-25');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `empid` int(11) NOT NULL,
  `ename` varchar(30) DEFAULT NULL,
  `mobile` varchar(12) DEFAULT NULL,
  `basicSal` float DEFAULT NULL,
  `da` float DEFAULT NULL,
  `hra` float DEFAULT NULL,
  `ma` float DEFAULT NULL,
  `total` float DEFAULT NULL,
  `tax` float DEFAULT NULL,
  `net` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`empid`, `ename`, `mobile`, `basicSal`, `da`, `hra`, `ma`, `total`, `tax`, `net`) VALUES
(101, 'Aman', '9465042060', 500000, 250000, 100000, 150000, 12000000, 2400000, 9600000),
(102, 'Raman', '8284928841', 350000, 175000, 70000, 105000, 8400000, 1680000, 6720000),
(103, 'Naman', '8529776077', 1000000, 500000, 200000, 300000, 24000000, 4800000, 19200000),
(104, 'Anurag', '6284166004', 100000, 50000, 20000, 30000, 2400000, 480000, 1920000),
(105, 'Anurag', '9646190577', 25000, 12500, 5000, 7500, 600000, 120000, 480000),
(106, 'Bholu Ram', '8360120447', 5000, 2500, 1000, 1500, 120000, 12000, 108000);

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy`
--

CREATE TABLE `pharmacy` (
  `uid` varchar(100) NOT NULL,
  `fname` varchar(500) NOT NULL,
  `mob` varchar(14) NOT NULL,
  `address` varchar(500) NOT NULL,
  `city` varchar(100) NOT NULL,
  `licence` varchar(50) NOT NULL,
  `qrpic` varchar(500) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pharmacy`
--

INSERT INTO `pharmacy` (`uid`, `fname`, `mob`, `address`, `city`, `licence`, `qrpic`, `date`) VALUES
('aman', 'aman pharmacy', '9465042060', 'bhucho mandi', 'Bathinda', '123 456 789 456', 'aman-Screenshot (56).png', '2020-09-25'),
('mukesh', 'mukesh pharmacy', '9465042060', 'bhucho mandi', 'Ghaziabad', '123 456 789 456', 'mukesh-Screenshot (56).png', '2020-09-25'),
('raman', 'raman pharmacy', '9465042060', 'bhucho mandi', 'Bathinda', '123 456 789 123', 'raman-Screenshot (56).png', '2020-09-25');

-- --------------------------------------------------------

--
-- Table structure for table `sellpet`
--

CREATE TABLE `sellpet` (
  `uid` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mob` varchar(13) NOT NULL,
  `address` varchar(500) NOT NULL,
  `pet` varchar(200) NOT NULL,
  `info` varchar(10000) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sellpet`
--

INSERT INTO `sellpet` (`uid`, `name`, `mob`, `address`, `pet`, `info`, `date`) VALUES
('pulkit', 'Pulkit', '9465042060', 'Bathinda', 'Cow', '', '2020-10-08'),
('singla', 'Singla', '8284928841', 'Bathinda', 'Cow', '', '2020-10-08'),
('pulkitsingla', 'Pulkit Singla', '9876543210', 'Bathinda', 'Dog', '', '2020-10-09'),
('check', 'check', '9465042060', '#309, Ward No.-3, Near Railway Station, Bhucho Mandi, Bathinda, Punjab', 'Dog', 'All vaccines are given....', '2020-10-11');

-- --------------------------------------------------------

--
-- Table structure for table `shelter`
--

CREATE TABLE `shelter` (
  `uid` varchar(50) NOT NULL,
  `pname` varchar(50) NOT NULL,
  `contact` varchar(13) NOT NULL,
  `address` varchar(600) NOT NULL,
  `city` varchar(100) NOT NULL,
  `maxd` int(11) NOT NULL,
  `selpets` varchar(1000) NOT NULL,
  `oinfo` varchar(1000) NOT NULL,
  `pic1` varchar(200) NOT NULL,
  `pic2` varchar(200) NOT NULL,
  `pic3` varchar(200) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shelter`
--

INSERT INTO `shelter` (`uid`, `pname`, `contact`, `address`, `city`, `maxd`, `selpets`, `oinfo`, `pic1`, `pic2`, `pic3`, `date`) VALUES
('pulkit', 'singla', '9465042060', 'bhucho mandi', 'Bathinda', 6, 'Cat', 'sdfg', 'pulkit-Screenshot (89).png', 'pulkit-Screenshot (62).png', 'pulkit-Screenshot (60).png', '2020-09-27'),
('Pulkit Singla', 'Pulkit Singla', '8284928841', '#309, Ward No.-3, Near Railway Station, Bhucho Mandi', 'Bathinda', 5, 'Cat,Dog,Fish', 'I will keep these animals very carefully......u can trust me on this.', 'Pulkit Singla-Screenshot (73).png', 'Pulkit Singla-Screenshot (77).png', 'Pulkit Singla-Screenshot (57).png', '2020-09-27'),
('singla', 'singla', '9465042060', 'bhucho mandi', 'Chandigarh', 5, 'Cat', 'sdfghjkl@123', 'singla-Screenshot (85).png', 'singla-Screenshot (84).png', 'singla-Screenshot (84).png', '2020-10-12');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `RollNo.` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Branch` varchar(20) NOT NULL,
  `Per` float NOT NULL,
  `MobileNumber` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`RollNo.`, `Name`, `Branch`, `Per`, `MobileNumber`) VALUES
(101, 'Aman', 'CSE', 99.5, '1234567891'),
(102, 'Raman', 'CSE', 76.5, '1234567564');

-- --------------------------------------------------------

--
-- Table structure for table `studentsdata`
--

CREATE TABLE `studentsdata` (
  `userid` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `mobilenumber` varchar(13) NOT NULL,
  `date` date NOT NULL,
  `picname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentsdata`
--

INSERT INTO `studentsdata` (`userid`, `password`, `mobilenumber`, `date`, `picname`) VALUES
('Anurag', 'Ragada', '9646190577', '2020-09-16', 'Screenshot (56).png'),
('Nikhil', 'Bholu', '9888963354', '2020-09-17', 'Screenshot (66).png'),
('Pulkit', 'Pulkit', '9465042060', '2020-09-16', 'Screenshot (65).png'),
('Singla', 'Singla', '8284928841', '2020-09-16', 'Screenshot (64).png'),
('Singla Ji', 'Singla Ji', '9600000000', '2020-09-22', 'Screenshot (63).png');

-- --------------------------------------------------------

--
-- Table structure for table `trainees`
--

CREATE TABLE `trainees` (
  `rollno` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `branch` varchar(10) DEFAULT NULL,
  `per` float DEFAULT NULL,
  `doa` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trainees`
--

INSERT INTO `trainees` (`rollno`, `name`, `branch`, `per`, `doa`) VALUES
(101, 'Aman', 'cse', 78.99, '2020-09-09'),
(102, 'Raman', 'cse', 80.01, '2020-09-09'),
(103, 'Chman', 'cse', 75.99, '2020-09-09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` varchar(100) NOT NULL,
  `pwd` varchar(100) NOT NULL,
  `mobile` varchar(13) NOT NULL,
  `dos` date NOT NULL,
  `type` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `pwd`, `mobile`, `dos`, `type`) VALUES
('aman', 'Aman@123', '9876543210', '2020-10-09', 'Doctor'),
('anurag', 'Anurag@123', '9646190577', '2020-10-12', 'Citizen'),
('chaman', 'Chaman@123', '9876543210', '2020-09-29', 'Doctor'),
('check', 'Check@123', '9465042060', '2020-10-10', 'Citizen'),
('puchii', 'Puchii@123', '9464904353', '2020-09-29', 'Pharmacy'),
('pulkit', 'Pulkit@123', '8284928841', '2020-09-29', 'Doctor'),
('pulkitsingla', 'Pulkitsingla@123', '9465042060', '2020-09-29', 'Citizen'),
('ragada', 'Ragada@123', '9646190577', '2020-09-30', 'Pharmacy'),
('raman', 'Raman@123', '9876543211', '2020-09-29', 'Pharmacy'),
('shonaksingla@gmail.com', 'Godisone@1', '7339868819', '2020-10-11', 'Citizen'),
('singla', 'Singla@123', '9417511553', '2020-09-29', 'Shelter Provider'),
('yatish', 'Yatish@123', '8284928841', '2020-10-11', 'Doctor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`empid`);

--
-- Indexes for table `pharmacy`
--
ALTER TABLE `pharmacy`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `shelter`
--
ALTER TABLE `shelter`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`RollNo.`);

--
-- Indexes for table `studentsdata`
--
ALTER TABLE `studentsdata`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `trainees`
--
ALTER TABLE `trainees`
  ADD PRIMARY KEY (`rollno`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
