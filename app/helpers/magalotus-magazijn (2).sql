-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 13, 2022 at 07:36 AM
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
-- Database: `magalotus-magazijn`
--

-- --------------------------------------------------------

--
-- Table structure for table `aanvraag`
--

DROP TABLE IF EXISTS `aanvraag`;
CREATE TABLE IF NOT EXISTS `aanvraag` (
  `Id` int(11) NOT NULL,
  `MagazijnArtikelId` int(11) NOT NULL,
  `Aantal` int(11) NOT NULL,
  `PersoonId` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `FK_AanvraagPersoon_idx` (`PersoonId`),
  KEY `FK_AanvraagMagazijnArtikel_idx` (`MagazijnArtikelId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `afdeling`
--

DROP TABLE IF EXISTS `afdeling`;
CREATE TABLE IF NOT EXISTS `afdeling` (
  `Id` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

DROP TABLE IF EXISTS `artikel`;
CREATE TABLE IF NOT EXISTS `artikel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `omschrijving` varchar(45) NOT NULL,
  `AantalInBeschikking` int(11) NOT NULL,
  `AantalInLeen` int(11) NOT NULL,
  `CatogorieId` int(12) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_Catogorie_Artikel_idx` (`CatogorieId`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id`, `omschrijving`, `AantalInBeschikking`, `AantalInLeen`, `CatogorieId`) VALUES
(3, 'Computer beeldscherm 24 Inch', 11, 13, 1),
(4, 'Netwerk kabel 50m', 5, 0, 1),
(5, 'GTX 960 TI Grafische video kaart', 15, 2, 1),
(6, 'Rekenenboek 2F', 81, 54, 2),
(7, 'Nederlandsboek 3F', 39, 2, 2),
(8, 'Woordenboeken', 83, 24, 2),
(9, 'VAR VR BRILL', 38, 32, 3),
(10, 'Printpapier A4', 400, 0, 4);

-- --------------------------------------------------------

--
-- Table structure for table `catogorie`
--

DROP TABLE IF EXISTS `catogorie`;
CREATE TABLE IF NOT EXISTS `catogorie` (
  `Id` int(11) NOT NULL,
  `Catogorienaam` varchar(45) NOT NULL,
  `Catogoriecode` varchar(45) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `catogorie`
--

INSERT INTO `catogorie` (`Id`, `Catogorienaam`, `Catogoriecode`) VALUES
(1, 'elektronica', '1'),
(2, 'Studieboeken', '2'),
(3, 'keuzedeel producten', '3'),
(4, 'schoolmaterialen', '4');

-- --------------------------------------------------------

--
-- Table structure for table `magazijn`
--

DROP TABLE IF EXISTS `magazijn`;
CREATE TABLE IF NOT EXISTS `magazijn` (
  `Id` int(11) NOT NULL,
  `AfdelingId` int(11) DEFAULT NULL,
  `Magazijncol` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `FK_Afdeling_Magazijn_idx` (`AfdelingId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `magazijnartikel`
--

DROP TABLE IF EXISTS `magazijnartikel`;
CREATE TABLE IF NOT EXISTS `magazijnartikel` (
  `MagazijnId` int(11) NOT NULL,
  `CatogorieId` int(11) NOT NULL,
  PRIMARY KEY (`MagazijnId`,`CatogorieId`),
  KEY `fk_magazijn_artikel_idx` (`MagazijnId`),
  KEY `fk_magazijnartikel_catogorie_idx` (`CatogorieId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `persoon`
--

DROP TABLE IF EXISTS `persoon`;
CREATE TABLE IF NOT EXISTS `persoon` (
  `Id` int(11) NOT NULL,
  `Naam` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aanvraag`
--
ALTER TABLE `aanvraag`
  ADD CONSTRAINT `FK_AanvraagMagazijnArtikel` FOREIGN KEY (`MagazijnArtikelId`) REFERENCES `magazijnartikel` (`MagazijnId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_AanvraagPersoon` FOREIGN KEY (`PersoonId`) REFERENCES `persoon` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `artikel`
--
ALTER TABLE `artikel`
  ADD CONSTRAINT `FK_Catogorie_Artikel` FOREIGN KEY (`CatogorieId`) REFERENCES `catogorie` (`Id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `magazijn`
--
ALTER TABLE `magazijn`
  ADD CONSTRAINT `FK_Afdeling_Magazijn` FOREIGN KEY (`AfdelingId`) REFERENCES `afdeling` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `magazijnartikel`
--
ALTER TABLE `magazijnartikel`
  ADD CONSTRAINT `fk_magazijn_artikel` FOREIGN KEY (`MagazijnId`) REFERENCES `magazijn` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_magazijnartikel_catogorie` FOREIGN KEY (`CatogorieId`) REFERENCES `catogorie` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
