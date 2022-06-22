-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 22 jun 2022 om 11:33
-- Serverversie: 10.4.22-MariaDB
-- PHP-versie: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `geannuleerdles`
--

CREATE TABLE `geannuleerdles` (
  `id` int(225) NOT NULL,
  `les` int(225) NOT NULL,
  `reden` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `instructeur`
--

CREATE TABLE `instructeur` (
  `email` varchar(225) NOT NULL,
  `naam` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `les`
--

CREATE TABLE `les` (
  `id` int(225) NOT NULL,
  `datum` date NOT NULL,
  `leerling` int(225) NOT NULL,
  `instructeur` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `les`
--

INSERT INTO `les` (`id`, `datum`, `leerling`, `instructeur`) VALUES
(1, '2022-06-23', 5, 'bob@hotmail.com');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `student`
--

CREATE TABLE `student` (
  `id` int(225) NOT NULL,
  `naam` varchar(225) NOT NULL,
  `woonplaats` varchar(225) NOT NULL,
  `postcode` varchar(225) NOT NULL,
  `staat` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `student`
--

INSERT INTO `student` (`id`, `naam`, `woonplaats`, `postcode`, `staat`) VALUES
(5, 'Chris', 'Breukelen', '2200 BB', 'Kersenstraat');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `geannuleerdles`
--
ALTER TABLE `geannuleerdles`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `instructeur`
--
ALTER TABLE `instructeur`
  ADD PRIMARY KEY (`email`);

--
-- Indexen voor tabel `les`
--
ALTER TABLE `les`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `geannuleerdles`
--
ALTER TABLE `geannuleerdles`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `les`
--
ALTER TABLE `les`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `student`
--
ALTER TABLE `student`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
