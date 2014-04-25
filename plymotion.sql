-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2014 at 11:30 AM
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
  `userID` int(11) NOT NULL,
  `sessionID` int(11) NOT NULL,
  `insuranceRead` tinyint(4) DEFAULT NULL,
  `agreeToTraining` tinyint(4) DEFAULT NULL,
  `bikeRoadworthy` tinyint(4) DEFAULT NULL,
  `dateCompleted` date DEFAULT NULL,
  PRIMARY KEY (`userID`,`sessionID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`userID`, `sessionID`, `insuranceRead`, `agreeToTraining`, `bikeRoadworthy`, `dateCompleted`) VALUES
(21, 2, NULL, NULL, NULL, NULL),
(21, 3, NULL, NULL, NULL, NULL),
(21, 5, NULL, NULL, NULL, NULL);

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
(21, 'BXLA7elnTvmYF2nNnljBDEZ20EhcpK/qWCNfJZsJF5VvEqVw+eCSSGT+OzIA6vLMI3e/v0vHRa7XlvEnwBHxkg==', 1),
(30, '0w54SLZ4ox3w2AaYTkaVmlhLBfMdXrFRVf3bIaCA+ESEMsMmHY8LDFCwsWByQrGBOQVAz6HH4hB9Bl0/dfrYag==', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=31 ;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`userID`, `firstName`, `lastName`, `address`, `dateOfBirth`, `phoneNumber`, `mobileNumber`, `email`, `newClient`) VALUES
(21, 'Chris', 'Pratt', '23 Landbroke Lane, Plymouth, PL1 1DZ', '1985-11-19', '01395515520', '09465452103', 'chrispratt1985@gmail.com', 0),
(22, 'Jake', 'White', '22 Jake Lane, Suton', '1945-12-19', '01234 215625', '09785425632', 'jake@gmail.com', 1),
(23, 'Bob', 'Smith', '45 Trint Land, London', '1956-05-06', '01252 459865', '09654235568', 'bob.smith@gmail.com', 1),
(24, 'Jay', 'Johns', '46 Wake Road, Plymouth', '1996-05-08', '01325 164598', '09456 123568', 'J.J@gmail.com', 1),
(30, 'Lee', 'Smith', '6 Branway, Plymouth', '1996-05-08', '01395 515520', '09785425632', 'lee.smith@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `clientsinformation`
--

CREATE TABLE IF NOT EXISTS `clientsinformation` (
  `userID` int(11) NOT NULL,
  `ecName` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `ecRelationship` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `ecMobileNo` varchar(60) COLLATE latin1_general_ci DEFAULT NULL,
  `ecPhoneNo` varchar(60) COLLATE latin1_general_ci DEFAULT NULL,
  `medicalConditions` tinyint(1) DEFAULT NULL,
  `medicalDetails` varchar(600) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `clientsinformation`
--

INSERT INTO `clientsinformation` (`userID`, `ecName`, `ecRelationship`, `ecMobileNo`, `ecPhoneNo`, `medicalConditions`, `medicalDetails`) VALUES
(21, 'Tim Pratt', 'Family Member', '09456894856', '01365452215', 1, 'Bad Knee'),
(22, NULL, NULL, NULL, NULL, NULL, NULL),
(23, NULL, NULL, NULL, NULL, NULL, NULL),
(24, NULL, NULL, NULL, NULL, NULL, NULL),
(30, NULL, NULL, NULL, NULL, NULL, NULL);

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
  `riskAsses` tinyint(1) NOT NULL,
  `insurance` tinyint(1) NOT NULL,
  `crb` tinyint(1) NOT NULL,
  `instructPackSent` tinyint(1) NOT NULL,
  `dateSent` date DEFAULT NULL,
  `notes` varchar(800) COLLATE latin1_general_ci DEFAULT NULL,
  `completedBy` varchar(60) COLLATE latin1_general_ci DEFAULT NULL,
  `completedDate` date DEFAULT NULL,
  PRIMARY KEY (`courseID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`courseID`, `venueID`, `altVenuID`, `startDate`, `endDate`, `riskAsses`, `insurance`, `crb`, `instructPackSent`, `dateSent`, `notes`, `completedBy`, `completedDate`) VALUES
(1, 1, 2, '2014-04-25', '2014-06-19', 0, 0, 0, 0, NULL, NULL, NULL, NULL);

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
(4, 'John Smith', '29 Albert Road, Plymouth', 'PL1 4BN', '01395 456325', '09845 236598', 'John.S@gmail.com', NULL),
(5, 'Jake Wright', '56 Albert Square, Plymouth', 'PL2 4BN', '01254 965325', NULL, 'J.W@gmail.com', NULL),
(6, 'Bob Honson', '34 Jake Land, Plymouth', 'PL3 3DZ', NULL, '09854 153256', 'Bob>b@gmail.com', NULL);

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
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `newsID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `content` longtext COLLATE latin1_general_ci NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`newsID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`newsID`, `title`, `content`, `date`) VALUES
(1, 'Plymotion on Your Doorstep', '<p>How often have you considered how you get about the city and whether there might be a better, cheaper or healthier way?</p>\r\n\r\n<p>Through Plymotion we are offering you free advice and information about how you can travel around the city – all from the comfort of your own home! A team of Plymotion travel advisors will be on hand to chat with you face-to-face about your travel needs and offer you incentives to try different modes. These alternatives might be more convenient and could help you save time and money. They might even encourage you to explore new places and become fitter!</p>', '2014-04-25'),
(2, 'Laira Rail Bridge Pedestrian and Cycle Scheme', '<p>The old Laira Rail Bridge is going to be restored and converted into a new pedestrian and cycle path crossing the River Plym.</p>\r\n<p>The new path will link into existing walking and cycling paths, including Route 27 of the National Cycle Network and improve access to the Laira Heritage Trail.</p>', '2014-04-21'),
(3, 'WAYFINDING', '<p>It will soon be easier to navigate your way around the city centre and waterfront thanks to a network of signs and information boards being updated.</p>\r\n\r\n<p>Part of our Plymotion project, which aims to make it easier for people to get around Plymouth by bus, bike or on foot, the Wayfinding project will provide functional, attractive and engaging signage for pedestrians and cyclists in the city.</p>', '2014-04-01');

-- --------------------------------------------------------

--
-- Table structure for table `sessionplanactivitys`
--

CREATE TABLE IF NOT EXISTS `sessionplanactivitys` (
  `activityID` int(11) NOT NULL AUTO_INCREMENT,
  `sessionID` int(11) NOT NULL,
  `timing` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `activity` varchar(400) COLLATE latin1_general_ci DEFAULT NULL,
  `skills` varchar(400) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`activityID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

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
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `sessionID` int(11) NOT NULL AUTO_INCREMENT,
  `courseID` int(11) NOT NULL,
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

INSERT INTO `sessions` (`sessionID`, `courseID`, `locationID`, `level`, `date`, `startTime`, `endTime`, `instructorID`, `assistantID`) VALUES
(2, 1, 2, 2, '2014-04-30', '13:25:00', '16:00:00', 4, 0),
(3, 1, 4, 3, '2014-04-25', '13:12:00', '14:25:00', 4, 0),
(5, 1, 2, 1, '2014-06-19', '13:12:00', '13:12:00', 0, 0);

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
