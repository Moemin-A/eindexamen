-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 21, 2022 at 09:45 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eindkerntaakexamen`
--

-- --------------------------------------------------------

--
-- Table structure for table `leerling`
--

DROP TABLE IF EXISTS `leerling`;
CREATE TABLE IF NOT EXISTS `leerling` (
  `Id` int(11) NOT NULL,
  `Naam` varchar(45) NOT NULL,
  `tussenvoegsel` varchar(45) DEFAULT NULL,
  `Achternaam` varchar(45) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `leerling`
--

INSERT INTO `leerling` (`Id`, `Naam`, `tussenvoegsel`, `Achternaam`) VALUES
(1, 'Moemin', NULL, 'Amhaini'),
(2, 'Hans', NULL, 'Odijk'),
(3, 'Berkan', NULL, 'Hergul'),
(4, 'Adam', NULL, 'Bacha'),
(5, 'Arjan', 'de', 'Ruijter');

-- --------------------------------------------------------

--
-- Table structure for table `lesplanning`
--

DROP TABLE IF EXISTS `lesplanning`;
CREATE TABLE IF NOT EXISTS `lesplanning` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `DatumTijd` varchar(45) NOT NULL,
  `Ophaaladres` varchar(45) NOT NULL,
  `Lesdoel` varchar(45) NOT NULL,
  `LeerlingId` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `FK_Leerling_LesPlanning_idx` (`LeerlingId`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lesplanning`
--

INSERT INTO `lesplanning` (`Id`, `DatumTijd`, `Ophaaladres`, `Lesdoel`, `LeerlingId`) VALUES
(23, '2022-06-21T23:11', 'Daltonlaan 300', 'BijzondereManoeuvres', 1),
(24, '2022-06-21T23:11', 'Daltonlaan 300', 'BijzondereManoeuvres', 2),
(25, '2022-06-21T23:11', 'Daltonlaan 300', 'BijzondereManoeuvres', 3),
(26, '2022-06-21T23:11', 'Daltonlaan 300', 'BijzondereManoeuvres', 4),
(27, '2022-06-21T23:11', 'Daltonlaan 300', 'BijzondereManoeuvres', 5);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lesplanning`
--
ALTER TABLE `lesplanning`
  ADD CONSTRAINT `FK_Leerling_LesPlanning` FOREIGN KEY (`LeerlingId`) REFERENCES `leerling` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
