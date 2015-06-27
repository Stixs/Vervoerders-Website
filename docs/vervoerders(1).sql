-- phpMyAdmin SQL Dump
-- version 4.4.9
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Gegenereerd op: 27 jun 2015 om 11:05
-- Serverversie: 5.5.40
-- PHP-versie: 5.5.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vervoerders`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bedrijf`
--

CREATE TABLE IF NOT EXISTS `bedrijf` (
  `bedrijfs-id` int(11) NOT NULL,
  `transport-manager` varchar(50) NOT NULL,
  `aantal` varchar(50) NOT NULL,
  `rechtsvorm` varchar(50) NOT NULL,
  `vergunning` varchar(50) NOT NULL,
  `geldig tot` varchar(50) NOT NULL,
  `bedrijfs-email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bedrijfgegevens`
--

CREATE TABLE IF NOT EXISTS `bedrijfgegevens` (
  `bedrijfs_id` int(11) NOT NULL,
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
  `premium` varchar(3) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `bedrijfgegevens`
--

INSERT INTO `bedrijfgegevens` (`bedrijfs_id`, `bedrijfsnaam`, `beschrijving`, `adres`, `postcode`, `plaats`, `provincie`, `telefoon`, `fax`, `specialiteit`, `type`, `bereik`, `transport_manager`, `aantal`, `rechtsvorm`, `vergunning`, `geldig_tot`, `bedrijfs_email`, `premium`) VALUES
(9, 'Koller Transport BV', 'Transportbedrijf in Amersfoort\r\nKoller Transport is gevestigd in Amersfoort, de perfecte uitvalsbasis om uw goederen te bezorgen overal in Nederland en België. Wij zijn een middelgroot familiebedrijf met 16 vrachtauto’s, 20 personeelsleden en een warehouse van 5500 m2 waarin wij opslagfaciliteiten aanbieden.\r\nEigen wagenpark\r\nOns wagenpark bestaat uit bakwagens, aanhangers, trekkers en opleggers waaronder ook city-opleggers. Al onze voertuigen zijn voorzien van laad- en loskleppen zodat onze chauffeurs op iedere locatie zelfstandig kunnen laden en lossen. Een aantal vrachtauto’s en opleggers is voorzien van schuifzeilen en schuifdaken, waardoor ook grotere ladingen van opzij en van boven geladen en gelost kunnen worden. Voor vervoer van pallets, complete ladingen tot ondeelbare ladingen kunt u bij ons terecht. ', 'Kryptonweg 3', '3812 RZ', 'Amersfoort', 'Utrecht', '033 - 463 74 44', 'nvt', 'Koeling', 'Wegtransport', 'Nederland', 'onbekend', 100, 'BV', 'eur', '1-1-2099', 'info@koller-transport.nl', 'ja'),
(10, 'CP Benelux BV | ADR transportl', 'Transport: meer dan ladingen vervoeren\r\n\r\nCP Benelux is specialist in het transport, de opslag en distributie van ADR-goederen. Onze opslagloodsen zijn volledig toegerust op veilige en verantwoorde op- en overslag van ADR-goederen. Ook onze medewerkers beschikken over de juiste kennis, ervaring en certificaten om met ADR-goederen te werken.\r\n \r\nTransport binnen Europa\r\nMet CP Benelux is elke Europese bestemming binnen handbereik. Of u nu een spoedlevering heeft, ADR goederen wilt vervoeren of een speciale lading wilt transporteren. Over de weg, over water of door de lucht. \r\n\r\nBetrouwbare partner in transport\r\nKwaliteit voert bij ons de boventoon. De regie over het transport houden wij daarom geheel in eigen hand. Wij beschikken over eigen trucks, die volledig zijn toegerust op het vervoer van ADR goederen en het lossen en laden aan boord van schepen. Daarnaast hebben we een zorgvuldig netwerk opgebouwd met vervoerders in heel Europa. Dit in combinatie met onze jarenlange marktkennis en expertise binnen de CP Group maakt van ons een betrouwbare partner voor multimodaal transport in heel Europa.', 'G.Burgerlaan 33', '3131 KZ', 'Vlaardingen', 'Zuid-Holland', '0102994999', 'nvt', 'Autotransport', 'Wegtransport', 'Europa', 'onbekend', 50, 'BV.', 'eur', '1-1-2099', 'order@cpgroup.nl', 'nee'),
(11, 'Veldwerk Transport B.V.', 'Het begin\r\n\r\nHet was ergens in het voorjaar van 1988 toen Koos van Velden, indertijd taxichauffeur, een passagier veilig en snel naar een opgegeven adres had gebracht en een toekomstplan kreeg: “Ik ken het Westland op m’n duimpje, vind autorijden leuk (het was toen ook nog niet zo druk in het verkeer) en service verlenen zit me in het bloed, weet je wat? Ik ga een koeriersbedrijfje beginnen!”\r\n\r\nDus zo gezegd, zo gedaan. Na grondig overleg met zijn vrouw Ella en de zaakjes berekend te hebben, bleek dat het haalbaar zou kunnen zijn. In mei van dat jaar kwam de eerste auto, een Volkswagen Golf.\r\n\r\nHet was een tweedehandsje en toen ze in juli 1992 met pensioen ging had ze er 292.000 kilometer op zitten. Natuurlijk kwamen er meer auto’s bij, ook combo’s en  bussen en er werd zelfs naar vrachtauto’s gekeken, want de klanten kwamen en ieder met eigen wensen. Veldwerk Koerier begon echt te groeien, dus verstandig investeren in mens en materieel was het credo.', 'De Hondert Margen 16', '2678 AC', 'De Lier', 'Zuid-holland', '0174 - 44 10 77', 'nvt', 'Gevaarlijke stoffen', 'Wegtransport', 'Europa', 'onbekend', 30, 'BV.', 'eur', '1-1-2099', 'planning@veldwerk.info', 'ja');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruikers`
--

CREATE TABLE IF NOT EXISTS `gebruikers` (
  `gebruiker_id` int(11) NOT NULL,
  `bedrijfs_id` int(11) NOT NULL,
  `inlognaam` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `wachtwoord` char(128) NOT NULL,
  `salt` char(128) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

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
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `menu`
--

INSERT INTO `menu` (`paginanr`, `tekst`, `level`) VALUES
(2, 'Gids', 0),
(3, 'Zoeken', 0),
(49, 'Wijzig mijn bed', 1),
(51, 'Nieuw Bedrijf', 5);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `bedrijf`
--
ALTER TABLE `bedrijf`
  ADD PRIMARY KEY (`bedrijfs-id`);

--
-- Indexen voor tabel `bedrijfgegevens`
--
ALTER TABLE `bedrijfgegevens`
  ADD PRIMARY KEY (`bedrijfs_id`),
  ADD FULLTEXT KEY `bedrijfsnaam` (`bedrijfsnaam`,`beschrijving`,`adres`,`postcode`,`plaats`,`provincie`,`telefoon`,`fax`,`transport_manager`,`rechtsvorm`,`vergunning`,`geldig_tot`,`bedrijfs_email`);
ALTER TABLE `bedrijfgegevens`
  ADD FULLTEXT KEY `telefoon` (`telefoon`);
ALTER TABLE `bedrijfgegevens`
  ADD FULLTEXT KEY `plaats` (`plaats`);
ALTER TABLE `bedrijfgegevens`
  ADD FULLTEXT KEY `bedrijfsnaam_2` (`bedrijfsnaam`,`beschrijving`,`adres`,`postcode`,`plaats`,`provincie`,`telefoon`,`fax`,`specialiteit`,`type`,`bereik`,`transport_manager`,`rechtsvorm`,`vergunning`,`geldig_tot`,`bedrijfs_email`);
ALTER TABLE `bedrijfgegevens`
  ADD FULLTEXT KEY `beschrijving` (`beschrijving`);
ALTER TABLE `bedrijfgegevens`
  ADD FULLTEXT KEY `plaats_2` (`plaats`);
ALTER TABLE `bedrijfgegevens`
  ADD FULLTEXT KEY `rechtsvorm` (`rechtsvorm`);
ALTER TABLE `bedrijfgegevens`
  ADD FULLTEXT KEY `bedrijfsnaam_3` (`bedrijfsnaam`);
ALTER TABLE `bedrijfgegevens`
  ADD FULLTEXT KEY `bedrijfsnaam_4` (`bedrijfsnaam`,`plaats`,`rechtsvorm`);
ALTER TABLE `bedrijfgegevens`
  ADD FULLTEXT KEY `bedrijfsnaam_5` (`bedrijfsnaam`);
ALTER TABLE `bedrijfgegevens`
  ADD FULLTEXT KEY `beschrijving_2` (`beschrijving`);
ALTER TABLE `bedrijfgegevens`
  ADD FULLTEXT KEY `adres` (`adres`);
ALTER TABLE `bedrijfgegevens`
  ADD FULLTEXT KEY `adres_2` (`adres`,`postcode`,`plaats`,`provincie`,`telefoon`,`fax`,`transport_manager`,`rechtsvorm`,`vergunning`,`geldig_tot`,`bedrijfs_email`);
ALTER TABLE `bedrijfgegevens`
  ADD FULLTEXT KEY `bedrijfsnaam_6` (`bedrijfsnaam`,`beschrijving`,`adres`,`postcode`,`plaats`,`provincie`,`telefoon`,`fax`,`specialiteit`,`type`,`bereik`,`transport_manager`,`rechtsvorm`,`vergunning`,`geldig_tot`,`bedrijfs_email`);
ALTER TABLE `bedrijfgegevens`
  ADD FULLTEXT KEY `specialiteit` (`specialiteit`,`type`,`bereik`);

--
-- Indexen voor tabel `gebruikers`
--
ALTER TABLE `gebruikers`
  ADD PRIMARY KEY (`gebruiker_id`),
  ADD UNIQUE KEY `bedrijf-id` (`bedrijfs_id`,`inlognaam`,`email`);

--
-- Indexen voor tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`paginanr`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `bedrijf`
--
ALTER TABLE `bedrijf`
  MODIFY `bedrijfs-id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `bedrijfgegevens`
--
ALTER TABLE `bedrijfgegevens`
  MODIFY `bedrijfs_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT voor een tabel `gebruikers`
--
ALTER TABLE `gebruikers`
  MODIFY `gebruiker_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
