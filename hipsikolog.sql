-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2020 at 03:03 PM
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

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `adminName`, `adminEmail`, `adminPassword`) VALUES
('0000000000', 'Rahmad', 'rahmad@gmail.com', '11111111'),
('1111111111', 'Yusron', 'yusron@gmail.com', '12121212'),
('2222222222', 'Farhan', 'farhan@gmail.com', '14141414'),
('3333333333', 'Yusuf', 'yusuf@gmail.com', '88888888');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appointmentID` varchar(10) NOT NULL,
  `counsellingID` varchar(10) NOT NULL,
  `clientID` varchar(10) NOT NULL,
  `psyID` varchar(10) NOT NULL,
  `date` date DEFAULT NULL,
  `time` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointmentID`, `counsellingID`, `clientID`, `psyID`, `date`, `time`, `status`) VALUES
('1345267676', '3', '889098765', '1222231311', '2020-04-20', '13:00', 'Requested'),
('3724081659', '3', '889098765', '213123123', '2020-04-25', '08:00', 'Requested'),
('3854921670', '3', '661213289', '1222231311', '2020-04-24', '08:00', 'Requested'),
('5545567876', '3', '889098765', '4544234234', '2020-04-23', '10:00', 'Requested'),
('5556667778', '2', '889098765', '2222333222', '2020-04-20', '08:00', 'Completed'),
('6655667787', '2', '456456671', '432343421', '2020-04-20', '08:00', 'Requested'),
('6718025439', '3', '666777823', '1222231311', '2020-04-24', '08:00', 'In Session'),
('7778882371', '2', '887889876', '2222333222', '2020-04-27', '10:00', 'Completed'),
('9162750348', '2', '889098765', '121212334', '2020-04-25', '08:00', 'Cancelled'),
('9989897678', '3', '1222112112', '1222231311', '2020-04-25', '10:00', 'In Session');

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

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`clientID`, `clientName`, `clientEmail`, `clientPassword`, `clientPhoneNumber`, `clientPhoto`) VALUES
('0567345622', 'Steve', 'steve@gmail.com', '569473351', '081497538645', 'nurse_(2).png'),
('0781523496', 'Alicya', 'alicya@gmail.com', 'alicya', '082611682921', 'business-woman-character_69773-11.jpg'),
('098765432', 'Dita', 'dita@gmail.com', '15648999', '081345674452', 'welder.png'),
('0987789056', 'Beni', 'beni@gmail.com', '22156644', '081300125796', 'user1.png'),
('1111112221', 'Aqil', 'aqil@gmail.com', 'aqil', '082615161892', 'nurse.png'),
('1222112112', 'Anggi', 'anggi@gmail.com', '55564937', '081564729543', 'woman_(1).png'),
('1234512346', 'Sunny', 'sunny@gmail.com', '44444444', '089431657222', 'professions-and-jobs.png'),
('12345432167', 'Surti', 'surti@gmail.com', '23156495', '084315679256', 'cultures.png'),
('134526768', 'Wendy', 'wendy@gmail.com', '45613792', '089657613420', 'profile.png'),
('4441315782', 'Rico', 'rico@gmail.com', '46464646', '089566113485', 'man.png'),
('456456671', 'Amirah', 'amirah@outlook.com', 'amirah', '087789110888', 'nurse_(1).png'),
('5675676780', 'Susann', 'susan@gmail.com', '23647895', '089654732159', 'muslim.png'),
('661213289', 'Budi', 'budi@gmail.com', '84848484', '084445559075', 'people.png'),
('666777823', 'Stuward', 'stuward@gmail.com', '66666666', '089461245555', 'sports-and-competition.png'),
('7771823989', 'Fani Salsabilla', 'fani@gmail.com', '28947624', '081967354956', 'woman_(2).png'),
('7878787908', 'Nami', 'nami@gmail.com', '16161616', '089563145677', 'makeup.png'),
('887889876', 'Dedi', 'dedi@gmail.com', '23189647', '087643195324', 'virus1.png'),
('889098765', 'Hanan', 'hanan@gmail.com', 'hanan', '08227615192', 'man_(3).png'),
('987678678', 'Tini', 'tini@gmail.com', '12458794', '084566972534', 'teacher2.png');

-- --------------------------------------------------------

--
-- Table structure for table `counsellingpackage`
--

CREATE TABLE `counsellingpackage` (
  `counsellingID` varchar(11) NOT NULL,
  `counsellingName` varchar(200) NOT NULL,
  `counsellingDuration` varchar(50) NOT NULL,
  `counsellingPrice` int(50) NOT NULL,
  `counsellingDesc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `counsellingpackage`
--

INSERT INTO `counsellingpackage` (`counsellingID`, `counsellingName`, `counsellingDuration`, `counsellingPrice`, `counsellingDesc`) VALUES
('1', 'Introduction Package', '45', 150000, 'For the first time, we provide the Introduction Package as the counselling to build trust and comfort settings.'),
('2', 'Comfortable Package', '120', 250000, 'Trust issue just solved. Feel free to consult often.'),
('3', 'Cheerful Package', '180', 375000, 'We are ready to provide your long journey with best counselling sessions. ');

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
  `psyDesc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `psy`
--

INSERT INTO `psy` (`psyID`, `psyName`, `psyEmail`, `psyPassword`, `psyPhoneNumber`, `psyPhoto`, `psyDesc`) VALUES
('121212334', 'dr.Karina, S.Psi', 'karina@gmail.com', '12431243', '089465723315', 'download1.png', 'Romance And Family Relationships Specialist'),
('1222231311', 'dr.Sinta, S.Psi', 'sinta@gmail.com', '14714714', '081472583698', 'woman_(3).png', 'Career And Academic Specialist'),
('12312312323', 'dr.Ganjar, S.Psi', 'ganjar@gmail.com', '11111111', '089456137544', 'people_(2).png', 'Romance And Family Relationships Specialist'),
('134343434', 'dr.Anna, S.Psi', 'anna@gmail.com', '56423887', '089461257988', 'teacher.png', 'Psychological Disorder Specialist'),
('213123123', 'dr.Naufal, S.Psi', 'naufal@gmail.com', '45621879', '081546759462', 'avatars.png', 'Career And Academic Specialist'),
('213123213', 'dr.Rudi, S.Psi', 'rudi@gmail.com', '78945612', '087943156321', 'man_(1).png', 'Career And Academic Specialist'),
('2222333222', 'dr.Salman, S.Psi', 'salmann@gmail.com', '01588888', '081322546522', 'home-office.png', 'Romance And Family Relationships Specialist'),
('324235234', 'dr.Gani, S.Psi', 'gani@gmail.com', '45221756', '089463152477', 'virus.png', 'Psychological Disorder Specialist'),
('3343432234', 'dr.Romi, S.Psi', 'romi@gmail.com', '45764576', '084615349575', 'man_(2).png', 'Romance And Family Relationships Specialist'),
('3432234233', 'dr.Najmi, S.Psi', 'najmi@gmail.com', '45798457', '081355664975', 'avatar.png', 'Addiction Specialist'),
('432343421', 'dr.Cindy, S.Psi', 'cindy@gmail.com', '22222222', '089461257644', 'woman.png', 'Psychological Disorder Specialist'),
('4544234234', 'dr.Vina, S.Psi', 'vina@gmail.com', '25648894', '084629785344', 'doctor_(1).png', 'Career And Academic Specialist'),
('6767657466', 'dr.Kora, S.Psi', 'kora@gmail.com', '45612300', '089436157244', 'user.png', 'Addiction Specialist'),
('86786786765', 'dr.Zainal, S.Psi', 'zainal@gmail.com', '36985201', '083369874123', 'man1.png', 'Addiction Specialist');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointmentID`),
  ADD KEY `counsellingID` (`counsellingID`),
  ADD KEY `clientID` (`clientID`),
  ADD KEY `psyID` (`psyID`);

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
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `FK_appointment_client` FOREIGN KEY (`clientID`) REFERENCES `client` (`clientID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_appointment_counselling` FOREIGN KEY (`counsellingID`) REFERENCES `counsellingpackage` (`counsellingID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_appointment_psy` FOREIGN KEY (`psyID`) REFERENCES `psy` (`psyID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
