-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 01. Jul 2024 um 15:41
-- Server-Version: 10.4.32-MariaDB
-- PHP-Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `pizza`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bestellungen`
--

CREATE TABLE `bestellungen` (
  `Kundennummer` int(11) NOT NULL,
  `Margerita` int(11) NOT NULL,
  `Schinken` int(11) NOT NULL,
  `Vegetarisch` int(11) NOT NULL,
  `Fungi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `bestellungen`
--

INSERT INTO `bestellungen` (`Kundennummer`, `Margerita`, `Schinken`, `Vegetarisch`, `Fungi`) VALUES
(1, 0, 0, 0, 1),
(1, 0, 0, 2, 1),
(1, 0, 0, 0, 1),
(1, 0, 0, 0, 1),
(1, 0, 0, 1, 3),
(1, 2, 1, 1, 1),
(0, 0, 1, 0, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kundennummer`
--

CREATE TABLE `kundennummer` (
  `Vorname` text NOT NULL,
  `Nachname` text NOT NULL,
  `Anschrift` text NOT NULL,
  `Telefonnummer` bigint(20) NOT NULL,
  `Kundennummer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `kundennummer`
--

INSERT INTO `kundennummer` (`Vorname`, `Nachname`, `Anschrift`, `Telefonnummer`, `Kundennummer`) VALUES
('FAB', 'LO', 'AHAHAA', 11111, 1),
('Arda', 'Duman', 'FBI', 911, 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `speisekarte`
--

CREATE TABLE `speisekarte` (
  `Name` text NOT NULL,
  `Preis` int(11) NOT NULL,
  `Nummer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `speisekarte`
--

INSERT INTO `speisekarte` (`Name`, `Preis`, `Nummer`) VALUES
('Margerita', 10, 1),
('Schinken', 12, 2),
('Vegetarisch', 9, 3),
('Fungi', 11, 4);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `kundennummer`
--
ALTER TABLE `kundennummer`
  ADD PRIMARY KEY (`Kundennummer`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `kundennummer`
--
ALTER TABLE `kundennummer`
  MODIFY `Kundennummer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
