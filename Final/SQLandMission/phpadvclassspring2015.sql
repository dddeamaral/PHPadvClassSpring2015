-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2015 at 01:56 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `phpadvclassspring2015`
--

-- --------------------------------------------------------

--
-- Table structure for table `final_carrental`
--

CREATE TABLE IF NOT EXISTS `final_carrental` (
  `Car Name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `Customer ID` int(3) DEFAULT NULL,
  `Car Make/Model` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
`Car ID` int(5) NOT NULL,
  `Rentable` tinyint(1) NOT NULL,
  `Rental ID` int(3) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `final_carrental`
--

INSERT INTO `final_carrental` (`Car Name`, `Customer ID`, `Car Make/Model`, `Car ID`, `Rentable`, `Rental ID`) VALUES
('Mustang Old', 2, '1998 Mustang', 2, 1, 2),
('G20', 24, '2000 Infiniti', 20, 0, 1),
('Honda', NULL, 'Civic', 21, 1, NULL),
('Civic', NULL, '2000 Honda', 22, 1, NULL),
('Lacrosse', NULL, 'Buick', 23, 1, NULL),
('Lacrosse', NULL, 'Buick', 24, 1, NULL),
('Lacrosse', 1234, 'Buick', 25, 0, NULL),
('Baby', NULL, '1996 Gay', 26, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `final_userinfo`
--

CREATE TABLE IF NOT EXISTS `final_userinfo` (
`Customer ID` int(3) NOT NULL,
  `Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Insurance Provider` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `Car Rented` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Car ID` int(3) DEFAULT NULL,
  `Rental ID` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `final_userinfo`
--

INSERT INTO `final_userinfo` (`Customer ID`, `Name`, `Address`, `Insurance Provider`, `Car Rented`, `Car ID`, `Rental ID`) VALUES
(1, 'Dylan DeAmaral', '56 Cole Street', 'AAA', 'Infinity G20', 20, 1),
(2, 'Anthony Pirolli', '27 something lane', 'AAA', '1998 Mustang', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `final_users`
--

CREATE TABLE IF NOT EXISTS `final_users` (
  `Username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
`UserID` int(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `final_users`
--

INSERT INTO `final_users` (`Username`, `Email`, `Password`, `UserID`) VALUES
('dylan', 'dddeamaral@email.neit.edu', '$2y$10$TSO0afrC1wPhpXA1a/knQuXbqQqYX5V6n3BIHjoQDUTptm4iyzMm.', 23);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `final_carrental`
--
ALTER TABLE `final_carrental`
 ADD PRIMARY KEY (`Car ID`), ADD UNIQUE KEY `Car ID` (`Car ID`), ADD UNIQUE KEY `Customer ID` (`Customer ID`), ADD UNIQUE KEY `Rental ID` (`Rental ID`), ADD KEY `Customer ID_2` (`Customer ID`), ADD KEY `Car ID_2` (`Car ID`), ADD KEY `Rental ID_2` (`Rental ID`);

--
-- Indexes for table `final_userinfo`
--
ALTER TABLE `final_userinfo`
 ADD PRIMARY KEY (`Customer ID`), ADD UNIQUE KEY `Rental ID` (`Rental ID`), ADD UNIQUE KEY `Car ID` (`Car ID`);

--
-- Indexes for table `final_users`
--
ALTER TABLE `final_users`
 ADD PRIMARY KEY (`UserID`), ADD UNIQUE KEY `Email` (`Email`), ADD UNIQUE KEY `Username` (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `final_carrental`
--
ALTER TABLE `final_carrental`
MODIFY `Car ID` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `final_userinfo`
--
ALTER TABLE `final_userinfo`
MODIFY `Customer ID` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `final_users`
--
ALTER TABLE `final_users`
MODIFY `UserID` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
