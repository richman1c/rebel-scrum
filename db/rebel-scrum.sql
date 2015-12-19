-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2015 at 01:37 AM
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
-- Functions
--
DROP FUNCTION IF EXISTS `addEmergencyContact`$$
CREATE DEFINER=`root`@`localhost` FUNCTION `addEmergencyContact` (`firstname` VARCHAR(255), `lastname` VARCHAR(255), `phone` VARCHAR(255), `emailaddr` VARCHAR(255), `username` VARCHAR(255)) RETURNS INT(10) UNSIGNED NO SQL
BEGIN
 DECLARE e_contact_key INT(5);
 DECLARE user_key INT(5);
 DECLARE EXIT HANDLER FOR SQLEXCEPTION
 BEGIN
  RETURN 1;
 END;
  INSERT INTO person(lname,fname,phone1,email)
  VALUES(lastname,firstname,phone,emailaddr);
 select p_key into e_contact_key from person 
  WHERE email = emailaddr;
 select person_key into user_key from auth where userID = username;
 INSERT INTO occupant(emerContact,person_key,primaryFlag)
  VALUES(e_contact_key,user_key,"EMERGENCY");
 RETURN 0;
END$$

DROP FUNCTION IF EXISTS `registerUser`$$
CREATE DEFINER=`root`@`localhost` FUNCTION `registerUser` (`lastname` VARCHAR(255), `firstname` VARCHAR(255), `phone` VARCHAR(255), `emailaddr` VARCHAR(255), `dateofbirth` DATE, `uname` VARCHAR(255), `passwd` VARCHAR(255)) RETURNS INT(10) UNSIGNED NO SQL
BEGIN
 DECLARE user_key INT;
 DECLARE EXIT HANDLER FOR SQLEXCEPTION
 BEGIN
  RETURN 1;
 END;
 INSERT INTO person(lname,fname,phone1,email,dob)
  VALUES(lastname,firstname,phone,emailaddr,dateofbirth);
 select p_key into user_key from person where email=emailaddr;
 INSERT INTO auth(userID,pass,person_key) VALUES(uname,passwd,user_key);
 RETURN 0;
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
  MODIFY `p_key` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `occupant`
--
ALTER TABLE `occupant`
  MODIFY `p_key` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `p_key` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
