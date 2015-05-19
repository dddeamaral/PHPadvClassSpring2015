-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2015 at 02:27 AM
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
-- Table structure for table `final_userinfo`
--

CREATE TABLE IF NOT EXISTS `final_userinfo` (
  `Customer ID` int(3) NOT NULL,
  `Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Insurance Provider` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `Car Rented` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Car ID` int(3) NOT NULL,
  `Rental ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `final_userinfo`
--
ALTER TABLE `final_userinfo`
 ADD PRIMARY KEY (`Customer ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
