-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 10 jun 2015 om 09:57
-- Serverversie: 5.6.12-log
-- PHP-versie: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `vervoerders`
--
CREATE DATABASE IF NOT EXISTS `vervoerders` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `vervoerders`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bedrijf`
--

CREATE TABLE IF NOT EXISTS `bedrijf` (
  `bedrijfs-id` int(11) NOT NULL AUTO_INCREMENT,
  `transport-manager` varchar(50) NOT NULL,
  `aantal` varchar(50) NOT NULL,
  `rechtsvorm` varchar(50) NOT NULL,
  `vergunning` varchar(50) NOT NULL,
  `geldig tot` varchar(50) NOT NULL,
  `bedrijfs-email` varchar(50) NOT NULL,
  PRIMARY KEY (`bedrijfs-id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bedrijfgegevens`
--

CREATE TABLE IF NOT EXISTS `bedrijfgegevens` (
  `bedrijfs-id` int(11) NOT NULL AUTO_INCREMENT,
  `bedrijfsnaam` char(50) NOT NULL,
  `adres` char(50) NOT NULL,
  `postcode` char(50) NOT NULL,
  `plaats` char(50) NOT NULL,
  `provincie` char(50) NOT NULL,
  `telefoon` char(50) NOT NULL,
  `fax` char(50) NOT NULL,
  `specialiteit` char(50) NOT NULL,
  `type` char(50) NOT NULL,
  `bereik` char(50) NOT NULL,
  `transport-manager` varchar(50) NOT NULL,
  `aantal` int(11) NOT NULL,
  `rechtsvorm` varchar(50) NOT NULL,
  `vergunning` varchar(3) NOT NULL,
  `geldig-tot` varchar(8) NOT NULL,
  `berijfs-email` varchar(50) NOT NULL,
  PRIMARY KEY (`bedrijfs-id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruikers`
--

CREATE TABLE IF NOT EXISTS `gebruikers` (
  `gebruiker-id` int(11) NOT NULL AUTO_INCREMENT,
  `bedrijfs-id` int(11) NOT NULL,
  `naam` varchar(55) NOT NULL,
  `e-mail` varchar(55) NOT NULL,
  `wachtwoord` char(128) NOT NULL,
  `salt` char(128) NOT NULL,
  `level` int(11) NOT NULL,
  PRIMARY KEY (`gebruiker-id`),
  UNIQUE KEY `bedrijf-id` (`bedrijfs-id`,`naam`,`e-mail`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `pagina-nr` int(11) NOT NULL,
  `tekst` varchar(10) NOT NULL,
  `level` int(11) NOT NULL,
  PRIMARY KEY (`pagina-nr`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden uitgevoerd voor tabel `menu`
--

INSERT INTO `menu` (`pagina-nr`, `tekst`, `level`) VALUES
(1, 'Home', 0),
(2, 'Gids', 0),
(3, 'Zoeken', 0),
(50, 'inloggen', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
