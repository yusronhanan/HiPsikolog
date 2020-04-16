-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2020 at 03:30 PM
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
('greekLjkRu', 'Rahmad', 'rahmad@gmail.com', '11111111'),
('hisssgaknV', 'Yusron', 'yusron@gmail.com', '12121212'),
('skuttZjmxY', 'Farhan', 'farhan@gmail.com', '14141414'),
('tZuyuXevEz', 'Yusuf', 'yusuf@gmail.com', '88888888');

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
('amoeTYSQop', 'Fani', 'fani@gmail.com', '28947624', '081967354956', 'client6.jpg'),
('bnmcdrWEDH', 'Anggi', 'anggi@gmail.com', '55564937', '081564729543', 'client21.jpg'),
('Cndjsnowdf', 'Stuward', 'stuward@gmail.com', '66666666', '089461245555', 'client27.jpg'),
('cnsmjfyWvS', 'Budi', 'budi@gmail.com', '84848484', '084445559075', 'client1.jpg'),
('cosdmwGHjk', 'Dedi', 'dedi@gmail.com', '23189647', '087643195324', 'client10.jpg'),
('CXSjmnftWd', 'Rico', 'rico@gmail.com', '46464646', '089566113485', 'client22.jpg'),
('DcownSSdop', 'Dita', 'dita@gmail.com', '15648999', '081345674452', 'client24.jpg'),
('dmnsoRtiop', 'Wendy', 'wendy@gmail.com', '45613792', '089657613420', 'client15.jpg'),
('FokwnlpRhm', 'Susan', 'susan@gmail.com', '23647895', '089654732159', 'client9.jpg'),
('FopolknDwq', 'Fina', 'fina@gmail.com', '11111111', '081324562209', 'client25.jpg'),
('ghmmSggXop', 'Tini', 'tini@gmail.com', '12458794', '084566972534', 'client3.jpg'),
('GHsopkdXzm', 'Sunny', 'sunny@gmail.com', '44444444', '089431657222', 'client26.jpg'),
('godhmSdiCv', 'Surti', 'surti@gmail.com', '23156495', '084315679256', 'client13.jpg'),
('HGFdmksrQs', 'Nami', 'nami@gmail.com', '16161616', '089563145677', 'client23.jpg'),
('HjksnfdeWW', 'Beni', 'beni@gmail.com', '22156644', '081300125796', 'client20.jpg'),
('hwiqFHjkRd', 'Heru', 'heru@gmail.com', '25588793', '0815932746228', 'client4.jpg'),
('IpklhgsowZ', 'Rudi', 'rudi@gmail.com', '02315964', '089643719657', 'client8.jpg'),
('joerFYQbjk', 'Steve', 'steve@gmail.com', '569473351', '081497538645', 'client5.jpg'),
('mcidkAWDFc', 'Edo', 'edo@gmail.com', '56438512', '089435761258', 'client16.jpg'),
('MnkpoerCvk', 'Rendy', 'rendy@gmail.com', '15648957', '081596734286', 'client12.jpg'),
('MorSdonmsQ', 'Candra', 'candra@gmail.com', '23594612', '081349752355', 'client18.jpg'),
('MoWxxopwQb', 'Bobi', 'bobi@gmail.com', '12456789', '084622513484', 'client30.jpg'),
('RoqpkfbThm', 'Windy', 'windy@gmail.com', '46318954', '086943125762', 'client7.jpg'),
('rtnaDfkmxP', 'Ratna', 'ratna@gmail.com', '53534949', '087756333157', 'client2.jpg'),
('SdokwerdbA', 'Budi', 'budi@gmail.com', '23496587', '084631957265', 'client11.jpg'),
('SnjhkERtks', 'Soni', 'soni@gmail.com', '49675831', '08956741299', 'client17.jpg'),
('TjkmsERFko', 'Juki', 'juki@gmail.com', '24967351', '084637951248', 'client19.jpg'),
('VbnsmporDF', 'Giffari', 'giffari@gmail.com', '23465985', '081359467258', 'client14.jpg'),
('VOPdallqwd', 'Momo', 'momo@gmail.com', '55562148', '089546317564', 'client29.jpg'),
('W9PviHNSAx', 'Hanan', 'hanan@gmail.com', 'hanan', '08227615192', 'cartoon-young-man-icon-vector-12133300.jpg'),
('XXZZZbnYY', 'Mina', 'mina@gmail.com', '03122000', '081349556256', 'client28.jpg');

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
('1', 'Introduction Package', '1 times in 1 week', 100000, 'For the first time, we provide the Introduction Package as the counselling to build trust and comfort settings.'),
('2', 'Comfortable Package', '4 times in 1 months', 350000, 'Trust issue just solved. Feel free to consult often.'),
('3', 'Cheerful Package', '12 times in 4 months', 924000, 'We are ready to provide your long journey with best counselling sessions. ');

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
  `psyPhoto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `psy`
--

INSERT INTO `psy` (`psyID`, `psyName`, `psyEmail`, `psyPassword`, `psyPhoneNumber`, `psyPhoto`) VALUES
('argaEdnjWs', 'dr.Ganjar, S.Psi', 'ganjar@gmail.com', '11111111', '089456137544', 'psi9.jpg'),
('bopsmcAQSF', 'dr.Salman, S.Psi', 'salman@gmail.com', '01588888', '081322546522', 'psi24.jpg'),
('cmnjuSdoqA', 'dr.Sinta, S.Psi', 'sinta@gmail.com', '14714714', '081472583698', 'psi19.jpg'),
('CVBDSajdwo', 'dr.Dhiya, S.Psi', 'dhiya@gmail.com', '12456545', '089546357855', 'psi30.com'),
('dofGGhlith', 'dr.Heru, S.Psi', 'heru@gmail.com', '55555555', '081346995728', 'psi5.jpg'),
('Drrghghjga', 'dr.Vina, S.Psi', 'vina@gmail.com', '25648894', '084629785344', 'psi14.jpg'),
('fdsaERTYnk', 'dr.Karina, S.Psi', 'karina@gmail.com', '12431243', '089465723315', 'psi18.com'),
('Fgcdfrtjk', 'dr.Romi, S.Psi', 'romi@gmail.com', '45764576', '084615349575', 'psi17.jpg'),
('ghiidQfrth', 'dr.Cindy, S.Psi', 'cindy@gmail.com', '22222222', '089461257644', 'psi11.jpg'),
('hidjaksSCV', 'dr.Naufal, S.Psi', 'naufal@gmail.com', '45621879', '081546759462', 'psi23.jpg'),
('HksjdollqF', 'dr.Anna, S.Psi', 'anna@gmail.com', '56423887', '089461257988', 'psi12.jpg'),
('ImkoWesdGh', 'dr.Gani, S.Psi', 'gani@gmail.com', '45221756', '089463152477', 'psi15.jpg'),
('JkijdsDFsa', 'dr.Najmi, S.Psi', 'najmi@gmail.com', '45798457', '081355664975', 'psi29.jpg'),
('jskjdbMshf', 'dr.Rudi, S.Psi', 'rudi@gmail.com', '78945612', '087943156321', 'psi1.jpg'),
('klopDDrhna', 'dr.Kora, S.Psi', 'kora@gmail.com', '45612300', '089436157244', 'psi13.jpg'),
('mhjkSdfgWp', 'dr.Zainal, S.Psi', 'zainal@gmail.com', '36985201', '083369874123', 'psi20.jpg'),
('mnbvXDSckz', 'dr.Anisa, S.Psi', 'anisa@gmail.com', '25252525', '089566475312', 'psi28.jpg'),
('Nmdoiswnml', 'dr.Sian, S.Psi', 'sian@gmail.com', '25648975', '089431526744', 'psi16.jpg'),
('nmkjlsDFvc', 'dr.Jamal, S.Psi', 'jamal@gmail.com', '12455555', '081395786555', 'psi25.jpg'),
('nsmdiqWERdj', 'dr.Guntur, S.Psi', 'guntur@gmail.com', '45678957', '087594315988', 'psi4.jpg'),
('pcdSSWFcna', 'dr.Naomi, S.Psi', 'naomi@gmail.com', '56545654', '089531447562', 'psi27.jpg'),
('PKoputeAsCV', 'dr.Bangkit, S.Psi', 'bangkit@gmail.com', '02587531', '081379468250', 'psi22.jpg'),
('qiergDrenF', 'dr.Dono, S.Psi', 'dono@gmail.com', '99999999', '087599643178', 'psi7.jpg'),
('qwErtYuioP', 'dr.Vania, S.Psi', 'vania@gmail.com', '78787878', '084315967315', 'psi10.jpg'),
('rewRwjqegD', 'dr.Gildarts, S.Psi', 'gildarts@gmail.com', '54545454', '081344475627', 'psi8.jpg'),
('roiSwfdAfg', 'dr.Wanda, S.Psi', 'wanda@gmail.com', '22224444', '084635127955', 'psi26.jpg'),
('skjdnFgrop', 'dr.Jamal, S.Psi', 'jamal@gmail.com', '56431598', '084613759424', 'psi2.jpg'),
('sndowignDF', 'dr.Kamal, S.Psi', 'kamal@gmail.com', '15648795', '084315967222', 'psi3.jpg'),
('vbgHpklDhk', 'dr.Deru, S.Psi', 'deru@gmail.com', '66666666', '081355976244', 'psi6.jpg'),
('zxcvAWERtg', 'dr.Dilan, S.Psi', 'dilan@gmail.com', '15698742', '089512357460', 'psi21.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
