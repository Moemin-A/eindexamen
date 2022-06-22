-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 21, 2022 at 12:23 PM
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
-- Database: `eindkerntaakexamen2`
--

-- --------------------------------------------------------

--
-- Table structure for table `leerling`
--

DROP TABLE IF EXISTS `leerling`;
CREATE TABLE IF NOT EXISTS `leerling` (
  `Id` int(11) NOT NULL,
  `Naam` varchar(45) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `leerling`
--

INSERT INTO `leerling` (`Id`, `Naam`) VALUES
(3, 'Konijn'),
(4, 'Slavink'),
(6, 'Otto');

-- --------------------------------------------------------

--
-- Table structure for table `lessen`
--

DROP TABLE IF EXISTS `lessen`;
CREATE TABLE IF NOT EXISTS `lessen` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Datum` varchar(45) NOT NULL,
  `Leerling` int(11) NOT NULL,
  `Onderdeel` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_Leerling_Lessen_idx` (`Leerling`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lessen`
--

INSERT INTO `lessen` (`ID`, `Datum`, `Leerling`, `Onderdeel`) VALUES
(42, '2022-06-11', 3, 'Achteruit Rijden'),
(43, '2022-06-14', 3, 'File Rijden'),
(44, '2022-06-16', 6, 'Stadsverkeer'),
(45, '2022-06-20', 3, 'Parkeren'),
(46, '2022-06-20', 6, 'Achteruit rijden'),
(47, '2022-06-20', 4, 'Parkeren'),
(48, '2022-06-21', 6, 'Parkeren'),
(49, '2022-06-22', 3, '');

-- --------------------------------------------------------

--
-- Table structure for table `opmerkingen`
--

DROP TABLE IF EXISTS `opmerkingen`;
CREATE TABLE IF NOT EXISTS `opmerkingen` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `LES` int(11) NOT NULL,
  `Opmerking` varchar(45) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_Lessen_Opmerkingen_idx` (`LES`)
) ENGINE=InnoDB AUTO_INCREMENT=2353 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `opmerkingen`
--

INSERT INTO `opmerkingen` (`ID`, `LES`, `Opmerking`) VALUES
(2345, 45, 'Fijne les'),
(2346, 46, 'Was een beetje bang'),
(2348, 42, 'Leuke les!'),
(2349, 43, 'Geef me een voldoende!'),
(2350, 42, 'Ik wil op stage!');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lessen`
--
ALTER TABLE `lessen`
  ADD CONSTRAINT `FK_Leerling_Lessen` FOREIGN KEY (`Leerling`) REFERENCES `leerling` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `opmerkingen`
--
ALTER TABLE `opmerkingen`
  ADD CONSTRAINT `FK_Lessen_Opmerkingen` FOREIGN KEY (`LES`) REFERENCES `lessen` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
