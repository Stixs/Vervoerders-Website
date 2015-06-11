-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 30 mei 2015 om 11:11
-- Serverversie: 5.6.12-log
-- PHP-versie: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `vervoeders`
--
CREATE DATABASE IF NOT EXISTS `vervoeders` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `vervoeders`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bedrijven`
--

CREATE TABLE IF NOT EXISTS `bedrijven` (
  `bedrijf-id` int(11) NOT NULL AUTO_INCREMENT,
  `b-naam` varchar(55) NOT NULL,
  `b-land` varchar(30) NOT NULL,
  `b-straat` varchar(55) NOT NULL,
  `b-postcode` char(15) NOT NULL,
  `b-telefoonnr` char(15) NOT NULL,
  `b-faxnr` char(15) NOT NULL,
  `b-email` varchar(55) NOT NULL,
  `b-type-transport` varchar(30) NOT NULL,
  `b-bereik-trasnport` varchar(30) NOT NULL,
  `b-specialiteit` varchar(30) NOT NULL,
  `b-beschrijving` text NOT NULL,
  PRIMARY KEY (`bedrijf-id`),
  UNIQUE KEY `b-email` (`b-email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruikers`
--

CREATE TABLE IF NOT EXISTS `gebruikers` (
  `gebruiker-id` int(11) NOT NULL AUTO_INCREMENT,
  `bedrijf-id` int(11) NOT NULL,
  `naam` varchar(55) NOT NULL,
  `e-mail` varchar(55) NOT NULL,
  `wachtwoord` char(128) NOT NULL,
  `salt` char(128) NOT NULL,
  PRIMARY KEY (`gebruiker-id`),
  UNIQUE KEY `bedrijf-id` (`bedrijf-id`,`naam`,`e-mail`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
