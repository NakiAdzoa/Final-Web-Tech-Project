-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2021 at 07:59 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `staffinfo_db`
--
CREATE DATABASE IF NOT EXISTS `staffinfo_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `staffinfo_db`;

-- --------------------------------------------------------

--
-- Table structure for table `deliveryteam`
--

CREATE TABLE `deliveryteam` (
  `staffName` varchar(50) DEFAULT NULL,
  `phoneNumber` varchar(11) DEFAULT NULL,
  `assignedPassword` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deliveryteam`
--

INSERT INTO `deliveryteam` (`staffName`, `phoneNumber`, `assignedPassword`) VALUES
('Solo Afenyo', '0202088119', 'sol.afeDT1'),
('Yaa Asante', '0202088124', 'yaa.asaDT1');

-- --------------------------------------------------------

--
-- Table structure for table `duediligenceteam`
--

CREATE TABLE `duediligenceteam` (
  `staffName` varchar(50) DEFAULT NULL,
  `phoneNumber` varchar(11) DEFAULT NULL,
  `assignedPassword` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `duediligenceteam`
--

INSERT INTO `duediligenceteam` (`staffName`, `phoneNumber`, `assignedPassword`) VALUES
('Joseph Abeiku', '0202088126', 'jos.abeDDT1'),
('Abdul Dramani', '0202088123', 'abd.draDDT2'),
('Edem Johnson', '0202088111', 'ede.johDDT3');

-- --------------------------------------------------------

--
-- Table structure for table `generalmanagers`
--

CREATE TABLE `generalmanagers` (
  `staffName` varchar(50) DEFAULT NULL,
  `phoneNumber` varchar(11) DEFAULT NULL,
  `assignedPassword` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `generalmanagers`
--

INSERT INTO `generalmanagers` (`staffName`, `phoneNumber`, `assignedPassword`) VALUES
('Dominic Anyasor', '0202088129', 'dom.anyGM1'),
('Dzifa Anyasor', '0202088130', 'dzi.anyGM2');

-- --------------------------------------------------------

--
-- Table structure for table `marketers`
--

CREATE TABLE `marketers` (
  `staffName` varchar(50) DEFAULT NULL,
  `phoneNumber` varchar(11) DEFAULT NULL,
  `assignedPassword` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marketers`
--

INSERT INTO `marketers` (`staffName`, `phoneNumber`, `assignedPassword`) VALUES
('Steven Appiah', '0202088114', 'ste.appMM1'),
('Daafua Benni', '0202088112', 'daa.benMM2'),
('Gloria Asiedu', '0202088113', 'glo.aseMM3'),
('Hannah Owureko', '0202088128', 'han.owuMM4'),
('Anton Brightson', '0202088127', 'ant.briMM5');

-- --------------------------------------------------------

--
-- Table structure for table `operationmanagers`
--

CREATE TABLE `operationmanagers` (
  `staffName` varchar(50) DEFAULT NULL,
  `phoneNumber` varchar(11) DEFAULT NULL,
  `assignedPassword` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `operationmanagers`
--

INSERT INTO `operationmanagers` (`staffName`, `phoneNumber`, `assignedPassword`) VALUES
('Kukua Akorful', '0202088125', 'kuk.akoOM1'),
('Leslie Nelson', '0202088115', 'les.nelOM2');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staffName` varchar(50) DEFAULT NULL,
  `phoneNumber` varchar(11) DEFAULT NULL,
  `assignedPassword` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staffName`, `phoneNumber`, `assignedPassword`) VALUES
('Dominic Anyasor', '0202088129', 'dom.anyGM1'),
('Dzifa Anyasor', '0202088130', 'dzi.anyGM2'),
('Kukua Akorful', '0202088125', 'kuk.akoOM1'),
('Leslie Nelson', '0202088115', 'les.nelOM2'),
('Solo Afenyo', '0202088119', 'sol.afeDT1'),
('Steven Appiah', '0202088114', 'ste.appMM1'),
('Daafua Benni', '0202088112', 'daa.benMM2'),
('Yaa Asante', '0202088124', 'yaa.asaDT2'),
('Gloria Aseidu', '0202088113', 'glo.aseMM3'),
('Hannah Owureko', '0202088128', 'han.owuMM4'),
('Anton Brightson', '0202088127', 'ant.briMM5'),
('Joseph Abeiku', '0202088123', 'jos.abeDDT1'),
('Abdul Dramani', '0202088126', 'abd.draDDT2'),
('Edem Johnson', '0202088111', 'ede.johDDT3'),
('Joseph Abeiku', '0202088126', 'jos.abeDDT1'),
('Abdul Dramani', '0202088123', 'abd.draDDT2'),
('Edem Johnson', '0202088111', 'ede.johDDT3');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
