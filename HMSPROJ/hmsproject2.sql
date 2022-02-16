-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2022 at 03:48 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hmsproject2`
--

-- --------------------------------------------------------

--
-- Table structure for table `assigned_room`
--

CREATE TABLE `assigned_room` (
  `pID` int(11) NOT NULL,
  `bID` int(11) NOT NULL,
  `rID` int(11) NOT NULL,
  `EntryDate` date NOT NULL,
  `ExitDate` date NOT NULL,
  `Staylength` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `consultation`
--

CREATE TABLE `consultation` (
  `pID` int(11) NOT NULL,
  `dID` int(11) NOT NULL,
  `bID` int(11) NOT NULL,
  `Consultdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `doctorcost`
--

CREATE TABLE `doctorcost` (
  `Specialization` char(50) NOT NULL,
  `Cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctorcost`
--

INSERT INTO `doctorcost` (`Specialization`, `Cost`) VALUES
('Dermatology', 100),
('Opthamology', 70);

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `dID` int(11) NOT NULL,
  `dFullName` char(50) NOT NULL,
  `Specialization` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`dID`, `dFullName`, `Specialization`) VALUES
(2, 'Omar Assouma', 'dermatology');

-- --------------------------------------------------------

--
-- Table structure for table `drugs`
--

CREATE TABLE `drugs` (
  `Drugname` char(50) NOT NULL,
  `Cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `haddiseases`
--

CREATE TABLE `haddiseases` (
  `pID` int(11) NOT NULL,
  `diseasename` char(20) NOT NULL,
  `dateDiseases` date NOT NULL,
  `status` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `pID` int(11) NOT NULL,
  `pFullName` char(50) NOT NULL,
  `age` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `bloodgroup` enum('A+','A-','B+','B-','AB+','AB-','O+','O-') NOT NULL,
  `genotype` enum('AA','AS','SS','AC') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pID` int(11) NOT NULL,
  `bID` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `status` enum('Paid','Not_Paid') NOT NULL,
  `TreatmentDescription` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `pID` int(11) NOT NULL,
  `dID` int(11) NOT NULL,
  `bID` int(11) NOT NULL,
  `drugname` char(40) NOT NULL,
  `pdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `roomcost`
--

CREATE TABLE `roomcost` (
  `rtype` char(50) NOT NULL,
  `cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roomcost`
--

INSERT INTO `roomcost` (`rtype`, `cost`) VALUES
('Intensive Care', 500),
('Normal', 100);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `rID` int(11) NOT NULL,
  `rtype` char(50) NOT NULL,
  `status` enum('Empty','Occupied') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`rID`, `rtype`, `status`) VALUES
(6, 'Normal', 'Empty'),
(7, 'Intensive Care', 'Occupied');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assigned_room`
--
ALTER TABLE `assigned_room`
  ADD PRIMARY KEY (`pID`,`bID`);

--
-- Indexes for table `consultation`
--
ALTER TABLE `consultation`
  ADD PRIMARY KEY (`pID`,`bID`),
  ADD KEY `dID` (`dID`);

--
-- Indexes for table `doctorcost`
--
ALTER TABLE `doctorcost`
  ADD PRIMARY KEY (`Specialization`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`dID`);

--
-- Indexes for table `drugs`
--
ALTER TABLE `drugs`
  ADD PRIMARY KEY (`Drugname`);

--
-- Indexes for table `haddiseases`
--
ALTER TABLE `haddiseases`
  ADD PRIMARY KEY (`pID`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`pID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pID`,`bID`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`pID`,`bID`),
  ADD KEY `dID` (`dID`);

--
-- Indexes for table `roomcost`
--
ALTER TABLE `roomcost`
  ADD PRIMARY KEY (`rtype`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`rID`),
  ADD KEY `rtype` (`rtype`(1)),
  ADD KEY `rooms_ibfk_1` (`rtype`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `dID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `pID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `rID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assigned_room`
--
ALTER TABLE `assigned_room`
  ADD CONSTRAINT `assigned_room_ibfk_1` FOREIGN KEY (`pID`) REFERENCES `patients` (`pID`) ON DELETE CASCADE,
  ADD CONSTRAINT `assigned_room_ibfk_2` FOREIGN KEY (`pID`,`bID`) REFERENCES `payment` (`pID`, `bID`) ON DELETE CASCADE;

--
-- Constraints for table `consultation`
--
ALTER TABLE `consultation`
  ADD CONSTRAINT `consultation_ibfk_1` FOREIGN KEY (`pID`) REFERENCES `patients` (`pID`) ON DELETE CASCADE,
  ADD CONSTRAINT `consultation_ibfk_2` FOREIGN KEY (`dID`) REFERENCES `doctors` (`dID`) ON DELETE NO ACTION,
  ADD CONSTRAINT `consultation_ibfk_3` FOREIGN KEY (`pID`,`bID`) REFERENCES `payment` (`pID`, `bID`) ON DELETE CASCADE;

--
-- Constraints for table `haddiseases`
--
ALTER TABLE `haddiseases`
  ADD CONSTRAINT `haddiseases_ibfk_1` FOREIGN KEY (`pID`) REFERENCES `patients` (`pID`) ON DELETE NO ACTION;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`pID`) REFERENCES `patients` (`pID`) ON DELETE CASCADE;

--
-- Constraints for table `prescription`
--
ALTER TABLE `prescription`
  ADD CONSTRAINT `prescription_ibfk_1` FOREIGN KEY (`pID`) REFERENCES `patients` (`pID`) ON DELETE NO ACTION,
  ADD CONSTRAINT `prescription_ibfk_2` FOREIGN KEY (`dID`) REFERENCES `doctors` (`dID`) ON DELETE NO ACTION,
  ADD CONSTRAINT `prescription_ibfk_3` FOREIGN KEY (`pID`,`bID`) REFERENCES `payment` (`pID`, `bID`) ON DELETE NO ACTION;

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_ibfk_1` FOREIGN KEY (`rtype`) REFERENCES `roomcost` (`rtype`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
