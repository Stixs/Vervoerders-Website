-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Gegenereerd op: 13 jun 2015 om 10:37
-- Serverversie: 5.6.17
-- PHP-versie: 5.5.12

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
  `bedrijfs_id` int(11) NOT NULL AUTO_INCREMENT,
  `bedrijfsnaam` char(50) NOT NULL,
  `beschrijving` text NOT NULL,
  `adres` char(50) NOT NULL,
  `postcode` char(50) NOT NULL,
  `plaats` char(50) NOT NULL,
  `provincie` char(50) NOT NULL,
  `telefoon` char(50) NOT NULL,
  `fax` char(50) NOT NULL,
  `specialiteit` char(50) NOT NULL,
  `type` char(50) NOT NULL,
  `bereik` char(50) NOT NULL,
  `transport_manager` varchar(50) NOT NULL,
  `aantal` int(11) NOT NULL,
  `rechtsvorm` varchar(50) NOT NULL,
  `vergunning` varchar(3) NOT NULL,
  `geldig_tot` varchar(8) NOT NULL,
  `bedrijfs_email` varchar(50) NOT NULL,
  PRIMARY KEY (`bedrijfs_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Gegevens worden geëxporteerd voor tabel `bedrijfgegevens`
--

INSERT INTO `bedrijfgegevens` (`bedrijfs_id`, `bedrijfsnaam`, `beschrijving`, `adres`, `postcode`, `plaats`, `provincie`, `telefoon`, `fax`, `specialiteit`, `type`, `bereik`, `transport_manager`, `aantal`, `rechtsvorm`, `vergunning`, `geldig_tot`, `bedrijfs_email`) VALUES
(9, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', 1, '1', '1', '1', '1'),
(10, '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', 3, '3', '3', '3', '3');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruikers`
--

CREATE TABLE IF NOT EXISTS `gebruikers` (
  `gebruiker_id` int(11) NOT NULL AUTO_INCREMENT,
  `bedrijfs_id` int(11) NOT NULL,
  `inlognaam` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `wachtwoord` char(128) NOT NULL,
  `salt` char(128) NOT NULL,
  `level` int(11) NOT NULL,
  PRIMARY KEY (`gebruiker_id`),
  UNIQUE KEY `bedrijf-id` (`bedrijfs_id`,`inlognaam`,`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Gegevens worden geëxporteerd voor tabel `gebruikers`
--

INSERT INTO `gebruikers` (`gebruiker_id`, `bedrijfs_id`, `inlognaam`, `email`, `wachtwoord`, `salt`, `level`) VALUES
(1, 0, 'admin', '', '11cd68dd995a00caf08f5304de746d965a610190acd5490e037dd8980f37478e94f1ac80e9667801f867c43ad74cb8507be07b07606f599b29ffb9b17139e569', '958cb0fee5486a62c9e742b940856e784d190d9dd71601f868e5ea282e591d28eefc2a64aea41c55ff4334b3a6187676e246dc1dd6278e57e74c529007c9abf3', 5),
(4, 9, '1', '1', '661b953ae1cf054ff5d7a989ad3f69fa735d7ca121f8330fe3122f25c3eceef3e39987c0b8f5b61b75886ab0556e0b1a7ec62d84e415f263e4b737476f0c9d1c', 'a0cfcef6e26294a5025a7e9fd9a8a05bcbf9e71cf8ca3d8b014f5d380523e29be3e73d7ed8e1b8609f0f745334e93b7028401fb85ee537403bc2bbdc5cbee35f', 1),
(5, 0, '2', '2', '710d8f66b2ace482553b8cd8f891cfe12509bb430a6a849093b2584936247e31072fec5da95d74db7b268522f1283cc1dc78c7020d3b0e7c9974b7df1377ca82', 'bdf7ee7eaf845c8d1ccde7cd5d15c10246e3cfd98949dc88d3ecfd244b94a1f12da48f0ddff01b7097fc2d67501939c498c2d25c7f1e3340617a6c792e9cc3aa', 1),
(6, 10, '3', '3', 'ea18a54249e1acaae1df4893be142aa0975d200c44808eb0e9544b1de1168112800543a33bc66a35c22208173200bf0201988eb2552c2515c79be7c3f7f545ba', '22d08099f80fc6683f739a88ad5aaa2ac6f708a4a378b99130a00a14579d1fd0dec0d3a4a9b2c1ba4f6afb91361da615f77bf5d78fa77533df14ff3a46efd47f', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `paginanr` int(11) NOT NULL,
  `tekst` varchar(15) NOT NULL,
  `level` int(11) NOT NULL,
  PRIMARY KEY (`paginanr`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `menu`
--

INSERT INTO `menu` (`paginanr`, `tekst`, `level`) VALUES
(2, 'Gids', 0),
(3, 'Zoeken', 0),
(49, 'Wijzig mijn bed', 1),
(51, 'Nieuw Bedrijf', 5);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
