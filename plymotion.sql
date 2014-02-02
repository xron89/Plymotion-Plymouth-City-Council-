-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2014 at 11:49 PM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `plymotion`
--
CREATE DATABASE IF NOT EXISTS `plymotion` DEFAULT CHARACTER SET latin1 COLLATE latin1_general_ci;
USE `plymotion`;

-- --------------------------------------------------------

--
-- Table structure for table `adminlogins`
--

CREATE TABLE IF NOT EXISTS `adminlogins` (
  `adminID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(400) COLLATE latin1_general_ci NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `trainer` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`adminID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `adminlogins`
--

INSERT INTO `adminlogins` (`adminID`, `username`, `password`, `admin`, `trainer`) VALUES
(2, 'Shadow2004', 'LPoy6dUUePo40QnJ/qS2mZV4F5vpJGbakYjFJwxXicAOTdP0dCtAqruCvalpEKtrwnIfH0TJ/tDsoBEQ/WTA+Q==', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE IF NOT EXISTS `bookings` (
  `clientID` int(11) NOT NULL,
  `sessionID` int(11) NOT NULL,
  PRIMARY KEY (`clientID`,`sessionID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clientlogins`
--

CREATE TABLE IF NOT EXISTS `clientlogins` (
  `userID` int(20) NOT NULL,
  `reference` varchar(400) COLLATE latin1_general_ci NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `clientlogins`
--

INSERT INTO `clientlogins` (`userID`, `reference`, `verified`) VALUES
(21, 'BXLA7elnTvmYF2nNnljBDEZ20EhcpK/qWCNfJZsJF5VvEqVw+eCSSGT+OzIA6vLMI3e/v0vHRa7XlvEnwBHxkg==', 1);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `lastName` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `address` varchar(400) COLLATE latin1_general_ci NOT NULL,
  `dateOfBirth` date NOT NULL,
  `phoneNumber` varchar(60) COLLATE latin1_general_ci DEFAULT NULL,
  `mobileNumber` varchar(40) COLLATE latin1_general_ci DEFAULT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `newClient` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=22 ;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`userID`, `firstName`, `lastName`, `address`, `dateOfBirth`, `phoneNumber`, `mobileNumber`, `email`, `newClient`) VALUES
(21, 'Chris', 'Pratt', '23 Landbroke Lane', '1985-11-19', '01395515520', '09465452103', 'chrispratt1985@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `clientsinformation`
--

CREATE TABLE IF NOT EXISTS `clientsinformation` (
  `clientID` int(11) NOT NULL,
  `ecName` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `ecRelationship` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `ecMobileNo` varchar(60) COLLATE latin1_general_ci DEFAULT NULL,
  `ecPhoneNo` varchar(60) COLLATE latin1_general_ci DEFAULT NULL,
  `medicalConditions` tinyint(1) NOT NULL,
  `medicalDetails` varchar(600) COLLATE latin1_general_ci DEFAULT NULL,
  `insuranceCheckl` tinyint(1) NOT NULL,
  `agreeToTraining` tinyint(1) NOT NULL,
  `bikeRoadworthy` tinyint(1) NOT NULL,
  `dateCompleted` date NOT NULL,
  PRIMARY KEY (`clientID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `courseID` int(11) NOT NULL AUTO_INCREMENT,
  `venueID` int(11) NOT NULL,
  `altVenuID` int(11) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `noOfTrainees` int(11) NOT NULL,
  `noOfSessions` int(11) NOT NULL,
  `riskAsses` tinyint(1) NOT NULL,
  `insurance` tinyint(1) NOT NULL,
  `crb` tinyint(1) NOT NULL,
  `instructPackSent` tinyint(1) NOT NULL,
  `dateSent` date NOT NULL,
  `notes` varchar(800) COLLATE latin1_general_ci NOT NULL,
  `completedBy` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `completedDate` date NOT NULL,
  PRIMARY KEY (`courseID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `instructors`
--

CREATE TABLE IF NOT EXISTS `instructors` (
  `instructorID` int(11) NOT NULL,
  `name` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `address` varchar(600) COLLATE latin1_general_ci NOT NULL,
  `postCode` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `phoneNo` varchar(60) COLLATE latin1_general_ci DEFAULT NULL,
  `mobileNo` varchar(60) COLLATE latin1_general_ci DEFAULT NULL,
  `email` varchar(600) COLLATE latin1_general_ci DEFAULT NULL,
  `website` varchar(600) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`instructorID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `instructorscertificates`
--

CREATE TABLE IF NOT EXISTS `instructorscertificates` (
  `instructorID` int(11) NOT NULL,
  `name` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `issueOrg` varchar(400) COLLATE latin1_general_ci NOT NULL,
  `issueDate` date NOT NULL,
  `expiryDate` date DEFAULT NULL,
  PRIMARY KEY (`instructorID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `instructorsinformation`
--

CREATE TABLE IF NOT EXISTS `instructorsinformation` (
  `instructorID` int(11) NOT NULL,
  `ecName` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `ecRelation` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `ecMobile` varchar(60) COLLATE latin1_general_ci DEFAULT NULL,
  `ecPhone` varchar(60) COLLATE latin1_general_ci DEFAULT NULL,
  `medicalConditions` tinyint(1) NOT NULL,
  `medicalDetails` varchar(600) COLLATE latin1_general_ci DEFAULT NULL,
  `agreeToTerms` tinyint(1) NOT NULL,
  `addedToScheme` tinyint(1) NOT NULL,
  `dataCompleted` date NOT NULL,
  PRIMARY KEY (`instructorID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessionplans`
--

CREATE TABLE IF NOT EXISTS `sessionplans` (
  `sessionID` int(11) NOT NULL,
  `clientNeeds` varchar(600) COLLATE latin1_general_ci NOT NULL,
  `outcomes` varchar(600) COLLATE latin1_general_ci NOT NULL,
  `revRiskAsses` tinyint(1) NOT NULL,
  `checkEquip` tinyint(1) NOT NULL,
  `docReady` tinyint(1) NOT NULL,
  `helmAndCloth` tinyint(1) NOT NULL,
  `bikeCheck` tinyint(1) NOT NULL,
  `safetyBrief` tinyint(1) NOT NULL,
  `notes` varchar(1000) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`sessionID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `sessionID` int(11) NOT NULL AUTO_INCREMENT,
  `locationID` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `date` date NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  `instructorID` int(11) NOT NULL,
  `assistantID` int(11) NOT NULL,
  `noInGroup` int(11) NOT NULL,
  PRIMARY KEY (`sessionID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `venuefacilites`
--

CREATE TABLE IF NOT EXISTS `venuefacilites` (
  `venueID` int(11) NOT NULL,
  `toilets` tinyint(1) NOT NULL,
  `bikePark` tinyint(1) NOT NULL,
  `changing` tinyint(1) NOT NULL,
  `lockers` tinyint(1) NOT NULL,
  `carPark` tinyint(1) NOT NULL,
  `refreshments` tinyint(1) NOT NULL,
  PRIMARY KEY (`venueID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `venuelocations`
--

CREATE TABLE IF NOT EXISTS `venuelocations` (
  `locationID` int(11) NOT NULL,
  `venueID` int(11) NOT NULL,
  `name` varchar(100) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `venues`
--

CREATE TABLE IF NOT EXISTS `venues` (
  `venueID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `opening` varchar(400) COLLATE latin1_general_ci NOT NULL,
  `address` varchar(400) COLLATE latin1_general_ci NOT NULL,
  `phone` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(200) COLLATE latin1_general_ci DEFAULT NULL,
  `website` varchar(200) COLLATE latin1_general_ci DEFAULT NULL,
  `mapLink` varchar(200) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`venueID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
