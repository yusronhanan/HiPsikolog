-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2020 at 07:44 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hipsikolog`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` varchar(11) NOT NULL,
  `adminName` varchar(200) NOT NULL,
  `adminEmail` text NOT NULL,
  `adminPassword` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `appoinment`
--

CREATE TABLE `appoinment` (
  `appoinmentID` varchar(11) NOT NULL,
  `counsellingID` varchar(11) NOT NULL,
  `clientID` varchar(11) NOT NULL,
  `psyID` varchar(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `clientID` varchar(11) NOT NULL,
  `clientName` varchar(200) NOT NULL,
  `clientEmail` text NOT NULL,
  `clientPassword` text NOT NULL,
  `clientPhoneNumber` varchar(30) NOT NULL,
  `clientPhoto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `counsellingpackage`
--

CREATE TABLE `counsellingpackage` (
  `counsellingID` varchar(11) NOT NULL,
  `counsellingName` varchar(200) NOT NULL,
  `counsellingDuration` varchar(50) NOT NULL,
  `counsellingPrice` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `psy`
--

CREATE TABLE `psy` (
  `psyID` varchar(11) NOT NULL,
  `psyName` varchar(200) NOT NULL,
  `psyEmail` text NOT NULL,
  `psyPassword` text NOT NULL,
  `psyPhoneNumber` varchar(30) NOT NULL,
  `psyPhoto` text NOT NULL,
  `psyStatus` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `appoinment`
--
ALTER TABLE `appoinment`
  ADD PRIMARY KEY (`appoinmentID`),
  ADD KEY `client_appoinment_fk` (`clientID`),
  ADD KEY `psy_appoinment_fk` (`psyID`),
  ADD KEY `counselling_appoinment_fk` (`counsellingID`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`clientID`);

--
-- Indexes for table `counsellingpackage`
--
ALTER TABLE `counsellingpackage`
  ADD PRIMARY KEY (`counsellingID`);

--
-- Indexes for table `psy`
--
ALTER TABLE `psy`
  ADD PRIMARY KEY (`psyID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appoinment`
--
ALTER TABLE `appoinment`
  ADD CONSTRAINT `client_appoinment_fk` FOREIGN KEY (`clientID`) REFERENCES `client` (`clientID`),
  ADD CONSTRAINT `counselling_appoinment_fk` FOREIGN KEY (`counsellingID`) REFERENCES `counsellingpackage` (`counsellingID`),
  ADD CONSTRAINT `psy_appoinment_fk` FOREIGN KEY (`psyID`) REFERENCES `psy` (`psyID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
