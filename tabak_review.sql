-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 12. Nov 2018 um 21:33
-- Server-Version: 10.1.36-MariaDB
-- PHP-Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `tabak_review`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `geschmack`
--

CREATE TABLE `geschmack` (
  `ID_Geschmack` int(11) NOT NULL,
  `Geschmacksrichtung` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `geschmack`
--

INSERT INTO `geschmack` (`ID_Geschmack`, `Geschmacksrichtung`) VALUES
(1, 'Minze'),
(2, 'Limette'),
(3, 'Pfirsich');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `geschmack_zu_tabak`
--

CREATE TABLE `geschmack_zu_tabak` (
  `ID_Tabak` int(11) NOT NULL,
  `ID_Geschmack` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `geschmack_zu_tabak`
--

INSERT INTO `geschmack_zu_tabak` (`ID_Tabak`, `ID_Geschmack`) VALUES
(1, 1),
(2, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `hersteller`
--

CREATE TABLE `hersteller` (
  `ID_Hersteller` int(11) NOT NULL,
  `Bezeichnung` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `hersteller`
--

INSERT INTO `hersteller` (`ID_Hersteller`, `Bezeichnung`) VALUES
(1, 'Aqua Mentha'),
(2, 'Milano');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `images`
--

CREATE TABLE `images` (
  `ID_Image` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tabak`
--

CREATE TABLE `tabak` (
  `ID_Tabak` int(11) NOT NULL,
  `ID_Hersteller` int(11) NOT NULL,
  `Tabakname` varchar(200) NOT NULL,
  `Bewertung` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `tabak`
--

INSERT INTO `tabak` (`ID_Tabak`, `ID_Hersteller`, `Tabakname`, `Bewertung`) VALUES
(1, 1, 'Crazy Pych', 8),
(2, 2, 'Tropical Cooler', 10);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `ID_User` int(11) NOT NULL,
  `Loginname` varchar(200) NOT NULL,
  `Passwort` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`ID_User`, `Loginname`, `Passwort`) VALUES
(1, 'gbenske', '$2y$10$7UYKsYG4pK0NWTL3SJ0bNObsBptEa9KX5mtb5gSP0lKr6TeSraN9u');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `geschmack`
--
ALTER TABLE `geschmack`
  ADD PRIMARY KEY (`ID_Geschmack`);

--
-- Indizes für die Tabelle `hersteller`
--
ALTER TABLE `hersteller`
  ADD PRIMARY KEY (`ID_Hersteller`);

--
-- Indizes für die Tabelle `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`ID_Image`);

--
-- Indizes für die Tabelle `tabak`
--
ALTER TABLE `tabak`
  ADD PRIMARY KEY (`ID_Tabak`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_User`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `geschmack`
--
ALTER TABLE `geschmack`
  MODIFY `ID_Geschmack` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `hersteller`
--
ALTER TABLE `hersteller`
  MODIFY `ID_Hersteller` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `images`
--
ALTER TABLE `images`
  MODIFY `ID_Image` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `tabak`
--
ALTER TABLE `tabak`
  MODIFY `ID_Tabak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `ID_User` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
