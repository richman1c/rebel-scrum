-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2015 at 12:46 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rebel-scrum`
--
CREATE DATABASE IF NOT EXISTS `rebel-scrum` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `rebel-scrum`;

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `addEmergencyContact`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `addEmergencyContact` (IN `firstname` VARCHAR(255), IN `lastname` VARCHAR(255), IN `phone` VARCHAR(255), IN `emailaddr` VARCHAR(255), IN `username` VARCHAR(255))  NO SQL
BEGIN
 DECLARE e_contact_key INT(5);
 DECLARE user_key INT(5);
 DECLARE EXIT HANDLER FOR SQLEXCEPTION
 BEGIN
 
 END;
  INSERT INTO person(lname,fname,phone1,email)
  VALUES(lastname,firstname,phone,emailaddr);
 select p_key into e_contact_key from person 
  WHERE email = emailaddr;
 select person_key into user_key from auth where userID = username;
 INSERT INTO occupant(emerContact,person_key,primaryFlag)
  VALUES(e_contact_key,user_key,1);
END$$

DROP PROCEDURE IF EXISTS `getPoints`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getPoints` (IN `tripname` VARCHAR(25), IN `type` ENUM('TRIP','TROPHY','BREADCRUMB'))  NO SQL
BEGIN
 DECLARE user_key INT;
 DECLARE EXIT HANDLER FOR SQLEXCEPTION
 BEGIN
 END;
 select lat,lon  from locations where trip_name=tripname OR loc_type = type;
END$$

DROP PROCEDURE IF EXISTS `registerUser`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `registerUser` (IN `lastname` VARCHAR(255), IN `firstname` VARCHAR(255), IN `phone` VARCHAR(255), IN `emailaddr` VARCHAR(255), IN `dateofbirth` DATE, IN `uname` VARCHAR(255), IN `passwd` VARCHAR(255))  NO SQL
BEGIN
 DECLARE user_key INT;
 -- DECLARE EXIT HANDLER FOR SQLEXCEPTION
 -- BEGIN
 --  RETURN 1;
 -- END;
 INSERT INTO person(lname,fname,phone1,email,dob)
  VALUES(lastname,firstname,phone,emailaddr,dateofbirth);
 select p_key into user_key from person where email=emailaddr;
 INSERT INTO auth(userID,pass,person_key) VALUES(uname,passwd,user_key);

END$$

DROP PROCEDURE IF EXISTS `updateLocation`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `updateLocation` (IN `latitude` FLOAT, IN `longitude` FLOAT, IN `username` VARCHAR(25), IN `type` ENUM('TRIP','TROPHY','BREADCRUMB'), IN `tripname` VARCHAR(25))  NO SQL
BEGIN
 DECLARE user_key INT;
 DECLARE EXIT HANDLER FOR SQLEXCEPTION
 BEGIN
 END;
 select person_key into user_key from auth where userID=username;
 INSERT INTO locations(lat,lon,person_key,trip_name,loc_type)
   VALUES(latitude,longitude,user_key,tripname,type);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

DROP TABLE IF EXISTS `auth`;
CREATE TABLE `auth` (
  `p_key` int(11) NOT NULL,
  `person_key` int(11) NOT NULL,
  `userID` varchar(25) NOT NULL,
  `pass` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`p_key`, `person_key`, `userID`, `pass`) VALUES
(18, 40, 'test@guy.com', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

DROP TABLE IF EXISTS `locations`;
CREATE TABLE `locations` (
  `lat` float NOT NULL,
  `lon` float NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `person_key` int(11) NOT NULL,
  `loc_type` enum('TRIP','TROPHY','BREADCRUMB') NOT NULL,
  `trip_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='table of location pins for mapping';

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`lat`, `lon`, `time_stamp`, `person_key`, `loc_type`, `trip_name`) VALUES
(39.9, -75.01, '2015-12-19 11:30:37', 40, 'TRIP', 'TESTTRIP1'),
(39.9, -75, '2015-12-19 11:31:53', 40, 'TRIP', 'TESTTRIP1'),
(39.9, -75.02, '2015-12-19 11:32:48', 40, 'TRIP', 'TESTTRIP1'),
(39.89, -75.015, '2015-12-19 11:37:38', 40, 'TRIP', 'TESTTRIP1');

-- --------------------------------------------------------

--
-- Table structure for table `occupant`
--

DROP TABLE IF EXISTS `occupant`;
CREATE TABLE `occupant` (
  `p_key` int(11) NOT NULL,
  `person_key` int(11) NOT NULL,
  `emerContact` int(11) NOT NULL,
  `primaryFlag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `occupant`
--

INSERT INTO `occupant` (`p_key`, `person_key`, `emerContact`, `primaryFlag`) VALUES
(10, 40, 41, 1),
(11, 40, 42, 1);

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

DROP TABLE IF EXISTS `person`;
CREATE TABLE `person` (
  `p_key` int(11) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `phone1` varchar(15) NOT NULL,
  `phone2` varchar(15) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `dob` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`p_key`, `lname`, `fname`, `phone1`, `phone2`, `email`, `dob`) VALUES
(40, 'guy', 'test', '1111111111', NULL, 'test@guy.com', '1982-03-06'),
(41, 'contact1', 'emer', '2222222222', NULL, 'emer@contact1.com', NULL),
(42, 'contact2', 'emer', '3333333333', NULL, 'emer@contact2.com', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`p_key`),
  ADD UNIQUE KEY `userID` (`userID`);

--
-- Indexes for table `occupant`
--
ALTER TABLE `occupant`
  ADD PRIMARY KEY (`p_key`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`p_key`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth`
--
ALTER TABLE `auth`
  MODIFY `p_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `occupant`
--
ALTER TABLE `occupant`
  MODIFY `p_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `p_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
