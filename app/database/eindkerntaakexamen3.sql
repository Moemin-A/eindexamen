-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 22, 2022 at 09:06 AM
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
-- Database: `eindkerntaakexamen3`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatieveophaallocatie`
--

DROP TABLE IF EXISTS `alternatieveophaallocatie`;
CREATE TABLE IF NOT EXISTS `alternatieveophaallocatie` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `LES` int(11) NOT NULL,
  `Straat` varchar(45) NOT NULL,
  `Woonplaats` varchar(45) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_AlternatieveOphaallocatie_Lessen_idx` (`LES`)
) ENGINE=InnoDB AUTO_INCREMENT=2346 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `alternatieveophaallocatie`
--

INSERT INTO `alternatieveophaallocatie` (`ID`, `LES`, `Straat`, `Woonplaats`) VALUES
(2343, 45, 'Daltonlaan 200', 'Utrecht'),
(2344, 50, 'Neude 22', 'Utrecht'),
(2345, 52, 'Daltonlaan 300', 'Utrecht');

-- --------------------------------------------------------

--
-- Table structure for table `instructeur`
--

DROP TABLE IF EXISTS `instructeur`;
CREATE TABLE IF NOT EXISTS `instructeur` (
  `Email` varchar(45) NOT NULL,
  `Naam` varchar(45) NOT NULL,
  UNIQUE KEY `Email_UNIQUE` (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `instructeur`
--

INSERT INTO `instructeur` (`Email`, `Naam`) VALUES
('frasi@google.sp', 'Frasi'),
('groen@mail.nl', 'Groen'),
('konijn@google.com', 'Konijn');

-- --------------------------------------------------------

--
-- Table structure for table `leerling`
--

DROP TABLE IF EXISTS `leerling`;
CREATE TABLE IF NOT EXISTS `leerling` (
  `Id` int(11) NOT NULL,
  `Naam` varchar(45) NOT NULL,
  `Woonplaats` varchar(45) NOT NULL,
  `Postcode` varchar(45) NOT NULL,
  `straat` varchar(45) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `leerling`
--

INSERT INTO `leerling` (`Id`, `Naam`, `Woonplaats`, `Postcode`, `straat`) VALUES
(3, 'Konijn', 'Utrecht', '3590 UV', 'Laan 45'),
(4, 'Slavink', 'Nieuwegein', '3678 II ', 'Overweg 7'),
(6, 'Otto', 'Houten', '3822 AS', 'Groenlo 44');

-- --------------------------------------------------------

--
-- Table structure for table `lessen`
--

DROP TABLE IF EXISTS `lessen`;
CREATE TABLE IF NOT EXISTS `lessen` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Datum` varchar(45) NOT NULL,
  `Leerling` int(11) NOT NULL,
  `instructeur` varchar(45) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_Leerling_Lessen_idx` (`Leerling`),
  KEY `FK_Instructeur_Lessen_idx` (`instructeur`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lessen`
--

INSERT INTO `lessen` (`ID`, `Datum`, `Leerling`, `instructeur`) VALUES
(45, '2022-05-20', 3, 'groen@mail.nl'),
(46, '2022-05-20', 6, 'frasi@google.sp'),
(47, '2022-05-21', 4, 'konijn@google.com'),
(48, '2022-05-21', 6, 'frasi@google.sp'),
(49, '2022-05-22', 3, 'groen@mail.nl'),
(50, '2022-05-28', 4, 'konijn@google.com'),
(51, '2022-06-01', 3, 'konijn@google.com'),
(52, '2022-06-12', 3, 'groen@mail.nl'),
(53, '2022-06-22', 3, 'groen@mail.nl'),
(54, '2022-06-24', 4, 'konijn@google.com'),
(55, '2022-06-24', 3, 'groen@mail.nl'),
(56, '2022-06-28', 3, 'frasi@google.sp');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alternatieveophaallocatie`
--
ALTER TABLE `alternatieveophaallocatie`
  ADD CONSTRAINT `FK_AlternatieveOphaallocatie_Lessen` FOREIGN KEY (`LES`) REFERENCES `lessen` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `lessen`
--
ALTER TABLE `lessen`
  ADD CONSTRAINT `FK_Instructeur_Lessen` FOREIGN KEY (`instructeur`) REFERENCES `instructeur` (`Email`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_Leerling_Lessen` FOREIGN KEY (`Leerling`) REFERENCES `leerling` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
