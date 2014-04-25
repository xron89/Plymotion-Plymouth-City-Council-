-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2014 at 05:22 PM
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
  `instructor` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`adminID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `adminlogins`
--

INSERT INTO `adminlogins` (`adminID`, `username`, `password`, `admin`, `instructor`) VALUES
(2, 'Shadow2004', 'LPoy6dUUePo40QnJ/qS2mZV4F5vpJGbakYjFJwxXicAOTdP0dCtAqruCvalpEKtrwnIfH0TJ/tDsoBEQ/WTA+Q==', 1, 0),
(3, 'admin', 'R90cA5lXkIcNe3aSzj0g5cUJpzJjNcMFvB8YrtH/eeq8Pygb/+Xwt/i7IcxuLwhqvOvgyRMV4CzXZJTKWLHJ9A==', 1, 0),
(4, 'trainer', 'QL5ZpCSMXBdRAQlejjRQXmqu6ePw5i6e2Vti/MRj99sw+zN2NGfnQ5ed1a0N/NVIEyqBLhe522oxLnylpY7IYw==', 0, 1);

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

--
-- Dumping data for table `instructors`
--

INSERT INTO `instructors` (`instructorID`, `name`, `address`, `postCode`, `phoneNo`, `mobileNo`, `email`, `website`) VALUES
(4, 'Test', 'test', 'tttt', '1165156', '45454', 'fgfd@df.com', 'fsdfs.com');

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
  `clientNeeds` varchar(600) COLLATE latin1_general_ci DEFAULT NULL,
  `outcomes` varchar(600) COLLATE latin1_general_ci DEFAULT NULL,
  `revRiskAsses` tinyint(1) DEFAULT NULL,
  `checkEquip` tinyint(1) DEFAULT NULL,
  `docReady` tinyint(1) DEFAULT NULL,
  `helmAndCloth` tinyint(1) DEFAULT NULL,
  `bikeCheck` tinyint(1) DEFAULT NULL,
  `safetyBrief` tinyint(1) DEFAULT NULL,
  `notes` varchar(1000) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`sessionID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `sessionplans`
--

INSERT INTO `sessionplans` (`sessionID`, `clientNeeds`, `outcomes`, `revRiskAsses`, `checkEquip`, `docReady`, `helmAndCloth`, `bikeCheck`, `safetyBrief`, `notes`) VALUES
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
  `instructorID` int(11) DEFAULT NULL,
  `assistantID` int(11) DEFAULT NULL,
  PRIMARY KEY (`sessionID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`sessionID`, `locationID`, `level`, `date`, `startTime`, `endTime`, `instructorID`, `assistantID`) VALUES
(2, 2, 2, '2014-04-30', '13:25:00', '16:00:00', NULL, NULL),
(5, 4, 2, '2014-11-19', '13:12:00', '14:12:00', 4, 0);

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

--
-- Dumping data for table `venuefacilites`
--

INSERT INTO `venuefacilites` (`venueID`, `toilets`, `bikePark`, `changing`, `lockers`, `carPark`, `refreshments`) VALUES
(1, 1, 1, 0, 1, 1, 1),
(2, 1, 0, 0, 0, 1, 0),
(3, 1, 0, 0, 0, 0, 1),
(6, 1, 0, 0, 0, 1, 0),
(7, 0, 1, 0, 0, 0, 0),
(10, 1, 0, 1, 0, 1, 1),
(11, 1, 1, 0, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `venuelocations`
--

CREATE TABLE IF NOT EXISTS `venuelocations` (
  `locationID` int(11) NOT NULL AUTO_INCREMENT,
  `venueID` int(11) NOT NULL,
  `name` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`locationID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `venuelocations`
--

INSERT INTO `venuelocations` (`locationID`, `venueID`, `name`) VALUES
(2, 1, 'Bottom of Park'),
(4, 1, 'High Way');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `venues`
--

INSERT INTO `venues` (`venueID`, `name`, `opening`, `address`, `phone`, `email`, `website`, `mapLink`) VALUES
(1, 'Central Park', 'See website', 'Plymouth Life Centre, Mayflower Drive, Plymouth, PL2 3DG', '01752 606900', 'PlymLifeCentreInfo@everyoneactive.com', 'http://www.everyoneactive.com/tabid/1683/Default.aspx', 'www.test.com'),
(2, 'Civic Centre', '08:30 – 17:00 Mon - Fri ', 'Civic Centre, Armada Way, Plymouth ,PL1 2EW', '01752 668000', '', 'www.plymouth.gov.uk', 'www.googlemaps.com'),
(3, 'Devonport Park', 'Vary by time of year – check website ', 'Lower Lodge, Devonport Park, Plymouth PL1 4BU', '01752 563625', '', 'http://www.plymouth.gov.uk/devonportpark', 'www.googlemap.com'),
(6, 'Tothill Community Centre', 'Vary by time of year – check website ', 'Knighton Road, Plymouth, PL4 9DA', '01752 665919', '', 'http://www.tothillpark.co.uk/', 'www.googlemap.com'),
(7, 'Victoria Park', 'See Website', 'Victoria Park, Victoria Avenue, Plymouth, PL1 5NJ', '', '', 'www.plymouth.gov.uk/homepage/leisureandtourism/parksnatureandgreenspaces/parks/victoriapark.htm', 'www.googlemap.com'),
(10, 'Hoe Park', 'The Hoe Park is open 24 hours a day and is free to access', 'Hoe Park, Hoe Road, Plymouth, PL1 2PA', '01752 606034', 'streetsceneservices@plymouth.gov.uk', 'www.plymouth.gov.uk/homepage/leisureandtourism/parksnatureandgreenspaces/parks/hoepark.htm', 'www.googlemap.com'),
(11, 'Saltram House', 'Vary by time of year – check website', 'Plympton, Plymouth, PL7 1UH', '01752 333503', '', 'www.nationaltrust.org.uk/saltram/', 'www.googlemap.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
