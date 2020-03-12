-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
<<<<<<< HEAD
-- Gegenereerd op: 12 mrt 2020 om 15:37
=======
-- Gegenereerd op: 10 mrt 2020 om 14:14
>>>>>>> 4072b4ab52d5b6d2690d9e9fa1c5d3d6522c98d4
-- Serverversie: 10.4.8-MariaDB
-- PHP-versie: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `it-dashboard`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `afspraken`
--

CREATE TABLE `afspraken` (
  `id` int(11) NOT NULL,
  `klant_id` int(11) NOT NULL,
  `datum` date NOT NULL,
  `tijd` time NOT NULL,
  `omschrijving` varchar(255) NOT NULL,
  `datum_afspr_gemaakt` date NOT NULL DEFAULT current_timestamp(),
  `afspraak_voltooid` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `chat_message`
--

CREATE TABLE `chat_message` (
  `chat_message_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `bericht` varchar(255) NOT NULL,
  `time_stamp` datetime NOT NULL DEFAULT current_timestamp(),
  `urgentie` varchar(45) NOT NULL,
  `gelezen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `diensten`
--

CREATE TABLE `diensten` (
  `id` int(11) NOT NULL,
  `dienstnaam` varchar(255) NOT NULL,
  `dienstprijs` varchar(45) NOT NULL,
  `aantal_verkocht` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `diensten`
--

INSERT INTO `diensten` (`id`, `dienstnaam`, `dienstprijs`, `aantal_verkocht`) VALUES
(1, 'opschoning laptop', '125.00', 0),
(2, 'Opschoning pc', '125.00', 0),
(3, 'Onderzoekskosten', '45.00', 0),
(4, 'Arbeid per uur (Particulier)', '55.00', 0),
(5, 'Arbeid per uur (Zakelijk)', '66.55', 0),
(6, 'Norton Security 1 Jaar 1 PC ', '45.00', 0),
(7, 'Microsoft office 2019 (1)', '180.00', 1),
(8, 'Microsoft office 2019', '140.00', 0),
(9, 'Windows 10 installatie', '140.00', 0),
(10, 'Voorrijkosten', '22.50', 0),
(11, 'Bestanden overzetten', '55.00', 0),
(12, 'Hosting & Domein registratie 1 jaar', '121.00', 0),
(13, 'SSL Certificaat 1 jaar', '109.45', 0),
(14, 'Losse domeinnaam (inc. doorverwijzing)', '22.50', 0),
(15, 'Losse domeinnaam', '12.00', 0),
(16, 'Gereed klaar maken', '55.00', 0),
(17, 'Uitlezen en terugzetten bestanden', '70.00', 0),
(18, 'Iphone x achterkant', '220.00', 0),
(19, 'Installatie op locatie', '110.00', 0),
(20, 'Iphone x achterkant', '109.45', 0),
(21, 'bestanden overzetten 1', '70.00', 0),
(22, 'aansluiten en configureren deco system', '210.00', 0),
(23, 'Printer nakijken', '27.25', 0),
(24, 'Printer op locatie installeren', '40.00', 0),
(25, 'Domeinnaamregistratie .nl', '15.00', 0),
(26, 'Domeinnaamregistratie .com', '25.00', 0),
(27, 'Microsoft Office 2019 (Black Friday actie)', '150.00', 0),
(28, 'Samsung Tab A 2019', '199.00', 0),
(29, 'Upgrade Hostingpakket naar onbeperkt opslag ', '55.00', 0),
(30, '3 jaar garantie', '0.00', 0),
(31, 'cindy', '230.45', 0),
(32, 'Sony KD-55AG9 Oled', '1965.00', 0),
(33, 'Norton Sercurity 2 pc 1 jaar', '75.00', 0),
(34, 'Norton Sercurity 3 pc 1 jaar', '75.00', 0),
(35, 'Aced Virus scan NOD 32 2 jaar', '75.00', 0),
(36, 'diensten en producten', '383.10', 0),
(37, 'Pc reiniging', '20.00', 0),
(38, 'opstart probleem opgelost', '25.00', 0),
(39, 'Koppeling server exchange-online 1 jaar', '33.88', 0),
(40, 'Upgrade onbeperkt data verkeer 1 jaar', '55.00', 0),
(41, 'Hosting en Domeinregistratie 1 jaar (112-rijn', '200.00', 0),
(42, 'internet gebruik 1 jaar (2020)', '220.00', 0),
(43, 'Installatie & Configuratie ', '55.00', 0),
(44, 'Software herstellen', '35.00', 0),
(45, 'upgrade Hosting  jaar 2019/2020', '110.00', 0),
(46, 'Windows leeghalen/opnieuw instellen', '125.00', 0),
(47, 'Draadloze muis', '29.95', 0),
(48, 'Installatie en configuratie op locatie', '22.50', 0),
(49, 'Moederbord + Schermreparatie', '230.00', 0),
(50, 'werkzaamheden mailbox (2 uur)', '133.10', 0),
(51, 'mailbox pellikaanfruit.nl', '55.00', 0),
(52, '', '0.00', 2),
(53, 'ICT ondersteuning personeel (januari 2020 en ', '1464.10', 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `facturen`
--

CREATE TABLE `facturen` (
  `factuurnummer` int(11) NOT NULL,
  `voornaam` varchar(255) NOT NULL,
  `tussenvoegsels` varchar(255) NOT NULL,
  `achternaam` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `straatnaam` varchar(255) NOT NULL,
  `postcode` varchar(255) NOT NULL,
  `woonplaats` varchar(255) NOT NULL,
  `telefoonnummer` varchar(255) NOT NULL,
  `klantnummer` int(11) NOT NULL,
  `product1` varchar(255) NOT NULL,
  `product2` varchar(255) NOT NULL,
  `product3` varchar(255) NOT NULL,
  `dienst1` varchar(255) NOT NULL,
  `dienst2` varchar(255) NOT NULL,
  `dienst3` varchar(255) NOT NULL,
  `product_prijs1` varchar(45) NOT NULL,
  `product_prijs2` varchar(45) NOT NULL,
  `product_prijs3` varchar(45) NOT NULL,
  `dienst_prijs1` varchar(45) NOT NULL,
  `dienst_prijs2` varchar(45) NOT NULL,
  `dienst_prijs3` varchar(45) NOT NULL,
  `totaalIncBtw` varchar(255) NOT NULL,
  `totaalExBtw` varchar(255) NOT NULL,
  `totaalBTW` varchar(255) NOT NULL,
  `datum` date NOT NULL,
  `betaalOpties` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

<<<<<<< HEAD
=======
--
-- Gegevens worden geëxporteerd voor tabel `facturen`
--

INSERT INTO `facturen` (`factuurnummer`, `voornaam`, `tussenvoegsels`, `achternaam`, `email`, `straatnaam`, `postcode`, `woonplaats`, `telefoonnummer`, `klantnummer`, `product1`, `product2`, `product3`, `dienst1`, `dienst2`, `dienst3`, `product_prijs1`, `product_prijs2`, `product_prijs3`, `dienst_prijs1`, `dienst_prijs2`, `dienst_prijs3`, `totaalIncBtw`, `totaalExBtw`, `totaalBTW`, `datum`, `betaalOpties`) VALUES
(1, 'Toos', 'de', 'Raad', 'toos-wil@hetnet.nl', 'Slotsedijk', '3161PG', 'Rhoon', '622078081', 1, 'HP Deskjet All-in-one printer ', ' ', ' ', 'Microsoft office 2019 (1) ', ' ', ' ', ' 69.00', ' 0', ' 0', ' 180.00', ' 0', ' 0', '249.00', '205.79', '43.21', '2020-03-10', 'per omgaande');

>>>>>>> 4072b4ab52d5b6d2690d9e9fa1c5d3d6522c98d4
-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klanten`
--

CREATE TABLE `klanten` (
  `id` int(11) NOT NULL,
  `voornaam` varchar(255) NOT NULL,
  `tussenvoegsels` varchar(255) NOT NULL,
  `achternaam` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `straatnaam` varchar(255) NOT NULL,
  `postcode` varchar(255) NOT NULL,
  `woonplaats` varchar(255) NOT NULL,
  `telefoonnummer` varchar(11) DEFAULT NULL,
  `reden_bezoek` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

<<<<<<< HEAD
-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `login_details`
--

CREATE TABLE `login_details` (
  `login_details_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `last_activity` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
=======
--
-- Gegevens worden geëxporteerd voor tabel `klanten`
--

INSERT INTO `klanten` (`id`, `voornaam`, `tussenvoegsels`, `achternaam`, `email`, `straatnaam`, `postcode`, `woonplaats`, `telefoonnummer`, `reden_bezoek`) VALUES
(1, 'Toos', 'de', 'Raad', 'toos-wil@hetnet.nl', 'Slotsedijk', '3161PG', 'Rhoon', '622078081', ''),
(2, 'Rogier', 'van der', 'Vries', 'christiaanrogier@gmail.com', 'd. de Haanstraat', '3161XA', 'Rhoon', '6', ''),
(3, 'Andre', '', 'Draaij', 'a.draaij@kpnmail.nl', 'Uiterdijk ', '3195GK', 'Pernis Rotterdam', '620079774', ''),
(4, 'Harry', '', 'Verschuur', 'a.draaij@kpnmail.nl', 'Uiterdijk ', '3195GK', 'Pernis Rotterdam', '104198754', ''),
(5, 'John', '', 'Bruning', 'johnbr@caiway.nl', 'De Beuk', '3161JG', 'Rhoon', '105013022', ''),
(6, 'Willy', '', 'Bal', 'madalton@upcmail.nl', 'Puitstraat', '3192SH', 'Hoogvliet', '104167597', ''),
(7, 'PC ', '', 'Tronics BVBA', 'info@pctronics.be', 'Sint Hubertusstraat', '2940 H', 'Antwerpen (BE)', '2147483647', ''),
(8, 'Gijs', '', 'Snoep', 'gijssnoep54@gmail.com', 'Ravelstraat', '3161WE', 'Rhoon', '105013259', ''),
(9, 'Elly', '', 'Vollegraaf', 'ravel57@hetnet.nl', 'Ravelstraat', '3161WE', 'Rhoon', '105016822', ''),
(10, 'Bert', '', 'Plaizier', 'g.plaizier@hetnet.nl', 'dr. w. vosstraat', '3172VM', 'Poortugaal', '630586155', ''),
(11, 'Floris', '', 'Hattink', 'floris@it-skills.nl', 'Dorpsdijk', '3161CH', 'Rhoon', '611097375', ''),
(12, 'Aad', '', 'Hordijk', 'Aadhordijk@xs4all.nl', 'Ghijseland ', '3161VR', 'Rhoon', '651336959', ''),
(13, 'Capar', '', 'Robbemont', 'info@capar.nl', 'van de Venlaan ', '5374 G', 'SCHAIJK', '681882710', ''),
(14, 'J', '', 'Oostdijk', 'Gerrit.oostdijk@plannet.nl', 'Oostdorpseweg ', '3167 P', 'Poortugaal', '615406459', ''),
(15, 'Cees', '', 'Cramm', 'ceescramm@gmail.com', 'Ghijseland ', '3161 V', 'Rhoon', '620968485', ''),
(16, 'Transpro', '', 'Executive', 'info@transpro-executive.com', 'Anatole Franceplaats', '3069', 'ROTTERDAM', '634860368', ''),
(17, 'Cafetaria', '', 'Familieland', 'aimeichen@hotmail.com', 'Strawinksieplein', '3161WG', 'Rhoon', '105012034', ''),
(18, 'Cool Climate', '', 'Airconditioning', 'coolclimate@planet.nl', 'Portus', '3176TG', 'Poortugaal', '629606139', ''),
(19, 'STI ', '', 'SERVICES BV', 'dlos@stisgroup.eu', 'C. Barendregtlaan', '3161HA', 'Rhoon', '646853820', ''),
(20, 'l.', '', 'Roobol', 'loes.roobol@gmail.com', 'De Eik', '3161JA', 'Rhoon', '105017578', ''),
(21, 'MGG Golfexploitaties', '', 'BV', 'rinus@rinusgoor.nl', 'Veerweg', '3161EX', 'Rhoon', '653741764', ''),
(22, 'iTanks', '', 'BV', 'vazdias@itanks.eu', 'Scheepsbouwweg', '3089JW', 'Heijplaat Rotterdam', '651619419', ''),
(23, 'Bruidshuis', 'van', 'Sonja', 'info@sonjadordt.nl', 'Spuiweg ', '3311 G', 'DORDRECHT', '786130147', ''),
(24, 'J.D.A.', '', 'Driel', 'sjaak.0v.driel@gmail.com', 'Ravelstraat', '3161WE', 'Rhoon', '102016560', ''),
(25, 'Jan', 'van der', 'Verheij', 'jan.verheij@kabelfoon.nl', 'Ravelstraat', '3161WE', 'Rhoon', '105012251', ''),
(26, 'Joop', '', 'Leeuw', 'vdleeuw@kabelfoon.nl', 'Ghyseland', '3161 V', 'Rhoon', '651147144', ''),
(27, 'Janssen', '', 'Huidtherapie', 'info@huidtherapiejanssen.nl', 'Hongerlandsedijk', '3201LZ', 'Spijkenisse', '104387238', ''),
(28, 'Klusbedrijf', '', 'Oomen', 'info@klusjesman-rotterdam.nl', 'De Beuk', '3161JH', 'Rhoon', '614366693', ''),
(29, 'Monique van Noordt', '', 'Rijopleidingen', 'info@moniquevannoordt.nl', 'Valkenier ', '3161 L', 'RHOON', '2147483647', ''),
(30, 'Preparateur', '', 'Schouten', 'preparateur.schouten@gmail.com', 'Kruisdijk', '3176PJ', 'Poortugaal', '633608244', ''),
(31, 'Bianca', 'de', 'Zonneveld', 'czonneveld@caiway.nl', 'Lange zantelweg', '3171', 'Poortugaal', '649905750', ''),
(32, 'Carola', '', 'Koning', 'mail@caroladekoning.nl', 'Dorpsdijk ', '3161CE', 'Rhoon', '652544797', ''),
(33, 'Jan Willem', '', 'Slabbekoorn', 'jws62@planet.nl', 'Irenestraat', '3171CE', 'Poortugaal', '643523343', ''),
(34, 'Mieke', '', 'Geuke', 'mieke.geuke@kpnmail.nl', 'Waddenring', '2993VG', 'Barendrecht', '655780542', ''),
(35, 'Cees', 'van', 'Verbeten', 'fiai23ry@kpnmail.nl', 'Gildebrink', '3161LC', 'Rhoon', '610716850', ''),
(36, 'Jet', '', 'Loenen', 'vanloenenj@hotmail.com', 'Jacob van rijsoord', '3161XC', 'Rhoon', '654684060', ''),
(37, 'Hans', 'en', 'Hendriksen', 'jwjhendriksen@gmail.com', 'Landheer', '3171DD', 'Poortugaal', '623366226', ''),
(38, 'Florus Pellikaan Groente', 'van', 'Fruit', 'Florus@pellikaanfruit.nl', 'Weverwijk ', '4231 J', 'MEERKERK', '1075343434', ''),
(39, 'Wioletta', '', 'Maastrigt', 'wioletta0703@gmail.com', 'Landheer', '3171DC', 'Poortugaal', '619860051', ''),
(40, 'Kievits', 'van der', 'Onderhoudsbedrijf', 'ykbooks1@gmail.com', 'Melchertstraat', '3084', 'Rotterdam', '657540008', ''),
(41, 'Thomas', '', 'Knaap', 'thomasvanderknaap@hotmail.com', 'Waalstraat', '3161XN', 'Rhoon', '615836692', ''),
(42, 'Herma', '', 'Davids', 'hermadavids@gmail.com', 'Ghijselland', '3161VV', 'Rhoon', '622118698', ''),
(43, 'Taco', '', 'Wijmans', 'Tac_78@hotmail.com', 'Singel ', '3161BK', 'Rhoon', '619197561', ''),
(44, 'D', '', 'Bastemeijer', 'nellendirk@live.nl', 'Irenestraat', '3171CG', 'Poortugaal', '102266699', ''),
(45, 'Giddy', '', 'Wolff', 'gid.wolff@kpnmail.nl', 'Staringplantsoen', '3202XC', 'Spijkenisse', '181283619', ''),
(46, 'R.P.', '', 'Brockhus', 'Hennierichard@hotmail.com', 'Portus ', '3176TG', 'Poortugaal', '105018779', ''),
(47, 'Martin', '', 'Peperkamp', 'martin.peperkamp@hotmail.com', 'Hongerlandsedijk', '3201LZ', 'Spijkenisse', '683212228', ''),
(48, 'Nicolette', '', 'Meijboom', 'nicmeijboom@kpnmail.nl', 'Doelwijck', '3162 S', 'Rhoon', '628292420', ''),
(49, 'Judith', '', 'Joppe', 'judith.joppe@12move.nl', 'Ghijseland', '3161VR', 'Rhoon', '657143393', ''),
(50, 'M&H Exploitatie ', '', 'BV', 'hans@kade4.nl', 'Spaansekade ', '3011ML', 'Rotterdam', '102709001', ''),
(51, 'Sunnyside', 'den', 'Water Management', 'edh.sunnyside@gmail.com', 'Apartado ', '7250-9', 'Alandroal Portugal', '651607369', ''),
(52, 'Jacob', '', 'Arend', 'jdenarend@kpnmail.nl', 'Valkenier', '3161LV', 'Rhoon', '105014463', ''),
(53, 'Mischa', 'de', 'Maatkamp', 'm.maatkamp@ebele-schiedam.nl', 'Bernhardstraat', '3161AD', 'Rhoon', '621168917', ''),
(54, 'Stichting', 'de', 'Omschakeling', 'info@stichtingdeomschakeling.nl', 'Vorkstraat', '3075 N', 'Rotterdam', '621644470', ''),
(55, 'Ineke', 'van', 'Klerk', 'kedeklerk@planet.nl', 'Rietdekker', '3171HK', 'Poortugaal', '623170201', ''),
(56, 'Andre', '', 'Draaij', 'a.draaij@kpn.nl', 'Uiterdijk', '3195GC', 'Pernis', '620079774', ''),
(57, 'Clown', '', 'Kim', 'info@clownkim.nl', 'Else van der Banstraat', '3207JA', 'Spijkenisse', '2147483647', ''),
(58, 'M', 'Mac', 'Muno-Godijn', 'cormuno@online.nl', 'Clematis ', '3171 P', 'Poortugaal', '620503701', ''),
(59, 'Annelies', 'de', 'Pherson', 'amac@telfort.nl', 'bachlaan', '3161RB', 'Rhoon', '105016179', ''),
(60, 'A', '', 'Hooge', 'a.de.hooge@xs4all.nl', 'De Eik', '3161JB', 'Rhoon', '105015744', ''),
(61, 'Els', 'van', 'Bastemeijer', 'info@masonrei.nl', 'Korteweg ', '3161EL', 'RHOON', '105015058', ''),
(62, 'H', '', 'Ven', 'hubertusvandeven@gmail.com', 'Gijseland', '3161VG', 'Rhoon', '613314853', ''),
(63, 'GEB', '', 'Majenburg', 'wrieken@planet.nl', 'Klompenmaker', '3171HD', 'POORTUGAAL', '10', ''),
(64, 'Corrie', '', 'Meijboom', 'pcmeijboom@kpnmail.nl', 'De Eik ', '3161', 'RHOON', '638344456', ''),
(65, 'FAB', 'van', 'West-Nederland', 'info@fabwestnederland.nl', 'M Doorman-Kielstrastr ', '3207 S', 'SPIJKENISSE', '181646984', ''),
(66, 'Leo', '', 'Stoep', 'leoennetty@kpnplanet.nl', 'A van Hobokenstraat', '3161KS', 'Rhoon', '610076075', ''),
(67, 'Henry', '', 'Verstelle', 'verstelle@caiway.nl', 'Limes', '3176TE', 'Poortugaal', '612960496', ''),
(68, 'A', '', 'Los', 'adalos@gmail.com', 'Groede ', '3209 B', 'Hekelingen', '181646523', ''),
(69, 'C.A.J', 'the', 'Scheffers', 'scheff@kpnplanet.nl', 'Ghijseland', '3161VP', 'Rhoon', '105018875', ''),
(70, 'Stichting Dreamnight at', '', 'Zoo', 'info@dreamnightatthezoo.nl', 'Pootstraat', '3034BA', 'ROTTERDAM', '624227667', ''),
(71, 'F.A.', '', 'Odijk', 'amieko@hotmail.com', 'Johannes Taspad', '3191XE', 'Hoogvliet Rotterdam', '104162746', ''),
(72, 'Blossom', 'Van der ', 'Queen', 'blossomqueen@mail.com', 'Carsveldstraat', '3077TM', 'Rotterdam', '685846125', ''),
(73, 'Marco', '', 'Draaij', 'mdraaij@tele2.nl', 'Aleijd van Strienhof ', '3176VE', 'Poortugaal', '650979708', ''),
(74, 'Hans', 'van', 'Keij', 'keij@kabelfoon.nl', 'Sleedoorn', '3171PN', 'Poortugaal', '626745072', ''),
(75, 'Stucadoorsbedrijf', '', 'Voorst tot Voorst', 'info@voorsttotvoorst.nl', 'Hulsthof', '3181BJ', 'Rozenburg', '624193772', ''),
(76, 'C.', '', 'Bruggeman', 'cbruggeman@caiway.nl', 'Bartokstraat', '3161WB', 'Rhoon', '104167630', ''),
(77, 'Adri', 'de', 'Andeweg', 'a3rhoon@hetnet.nl', 'Tuinstraat', '3171AW', 'Poortugaal', '626344543', ''),
(78, 'L.', '', 'Haan', 'lenie39@xs4all.nl', 'Hof van Portland', '3161WK', 'Rhoon', '627567705', ''),
(79, 'Irma', '', 'Remeeus', 'irma28@live.nl', 'Agaatlaan', '3162TA', 'Rhoon', '630335961', ''),
(80, 'Chantal', 'de', 'Hoogstad', 'chantalhoogstad@gmail.com', 'Julianastraat', '3161AJ', 'Rhoon', '651197464', ''),
(81, 'Pauliene', '', 'Ruiter', 'fam-deruiter@kpnmail.nl', 'C.A. Dekkerstraat', '3161BA', 'Rhoon', '646195998', ''),
(82, 'V.', '', 'Nederhof', 'fohredenv@hetnet.nl', 'Ghijseland', '3161VG', 'Rhoon', '105016685', ''),
(83, 'HBB', '', 'Bouwbegeleiding', 'hbb@xs4all.nl', 'Marskramer', '3161ND', 'Rhoon', '654315263', ''),
(84, 'G.', '', 'Top', 'gertop9@hotmail.com', 'Anna Griesepad', '3191 X', 'Hoogvliet Rotterdam', '104168777', ''),
(85, 'Lexiverb', '', 'KvK 24467235', 'aglaia@lexiverb.com', 'Prunus ', '3161 C', 'Rhoon', '621644470', ''),
(86, 'Jura', '', 'Consult', 'ja.gardien@juraconsult.nl', 'Maasdijk', '2676AD', 'Maasdijk', '6', ''),
(87, 'Frans', '&', 'Heezen', 'frans.heezen07@gmail.com', 'Waalstraat', '3161XM', 'Rhoon', '616176527', ''),
(88, 'Health, fitness', 'De Suikerboon', 'aerobic centrum Carla van Gameren', 'info@gamerensport.nl', 'Albrandswaardsedijk', '3161XB', 'Poortugaal', '10', ''),
(89, 'Bruids.', '', 'Import', 'info@chocolaterieseip.nl', 'Dorpsdijk', '3161', 'RHOON', '105014426', ''),
(90, 'Floor', 'Praktijk', 'Barendregt', 'f.barendregt@xs4all.nl', 'Binnenbaan ', '3161VB', 'Rhoon', '105016290', ''),
(91, 'Logopedie', 'van', 'Rhoon', 'estherenanna@logopedierhoon.nl', 'Julianastraat', '3161AJ', 'Rhoon', '644023111', ''),
(92, 'M.', '', 'Veen', 'mvanveen@live.nl', 'Rijsdijk', '3161EW', 'Rhoon', '655125164', ''),
(93, 'K.', '', 'Roest', 'corrieroest@tele2.nl', 'De Beuk', '3161JG', 'Rhoon', '105017764', ''),
(94, 'Raymond', '', 'freriks', 'raymond_freriks@hotmail.com', 'Schenkelstraat', '3161XL', 'Rhoon', '654916219', ''),
(95, 'Maasvuur', '', '.', 'wrieken@planet.nl', 'Klompenmaker', '371HD', 'Poortugaal', '102810021', ''),
(96, 'T.H.J.M', '', 'Bouman', 'thebouman@hetnet.nl', 'Dorpsdijk ', '3161CD', 'Rhoon', '10', ''),
(97, 'R', '', 'Alblas', 'rinekealblas@gmail.com', 'Zonnebloem', '3161SJ', 'Rhoon', '638537043', ''),
(98, 'Geert', '', 'Vellinger', 'geert@online-band.nl', 'Ghijselland', '3161VT', 'Rhoon', '681917658', ''),
(99, 'J.L.', '&', 'Boer', 'jlboer.rhoon@hetnet.nl', 'Wilhelminastraat ', '3161AP', 'Rhoon', '105016005', ''),
(100, 'Liedewij', 'van', 'Spijker BV', 'annemarie@liedewijenspijker.nl', 'Rijsdijk', '3161HP', 'Rhoon', '623257049', ''),
(101, 'Margo', '', 'Leeuwen-blok', 'luke2008@live.nl', 'Kruisvaarder', '3161LJ', 'Rhoon', '105010096', ''),
(102, 'P.', '', 'Maduro', 'p.vanelshuis@hotmail.com', 'Dijkje', '3077CM', 'Beverwaard', '104829495', ''),
(103, 'Kees', 'van', 'Hoogenboom', 'khoogenb@xs4all.nl', 'Egge', '3171DE', 'Poortugaal', '642381014', ''),
(104, 'M.', '', 'Hoenderdaal', 'fwvanthoe@caiway.nl', 'Kievitsplantsoen', '3161TB', 'Rhoon', '620419920', ''),
(105, 'Tadashii-do', '', 'Vereniging', 'w.mallens@dji.minjus.nl', 'Schefferstraat', '3161DH', 'Rhoon', '630543800', ''),
(106, 'L.', '', 'koot', 'l.koot6@chello.nl', 'Ankerkuilstraat', '3192GC', 'Hoogvliet Rotterdam', '104162913', ''),
(107, 'Ruud', 'van', 'Brom', 'morb@live.nl', 'Laqndvoogd', '3161NC', 'Rhoon', '655408047', ''),
(108, 'B.', '', 'As', 'info@weenahouse.com', 'De Eik', '3161JB', 'Rhoon', '105014839', ''),
(109, 'T.', '', 'Noordijk', 'kooijman46@hetnet.nl', 'Ghijseland', '3161VL', 'Rhoon', '105016984', ''),
(110, 'Tina', 'de', 'Kortekaas', 'tinamae@freenet.de', 'Albrandswaardseweg', '3171AC', 'poortugaal', '643801308', ''),
(111, 'Richard', 'van', 'Vos', 'rawdevos@hotmail.com', 'De Eik', '3161JB', 'Rhoon', '615671435', ''),
(112, 'M.', '', 'Driel', 'miepvandriel@hotmail.nl', 'Ravelstraat', '3161WE', 'Rhoon', '102016560', ''),
(113, 'Stitch', 'van der', 'Bitch', 'info@stitch-bitch.com', 'Julianastraat', '3161AJ', 'Rhoon', '630383620', ''),
(114, 'Bert', 'van', 'Burg', 'burgbert@outlook.com', 'Poortugaalseweg', '3176 P', 'Poortugaal', '651666104', ''),
(115, 'A.', '', 'Dijk', 'adriaan.vandijk@planet.nl', 'Sweelincklaan', '3161RR', 'Rhoon', '625385474', ''),
(116, 'Andre', 'de ', 'Niessen', 'aniessen@online.nl', 'Parallelstraat', '3161BE', 'Rhoon', '650819212', ''),
(117, 'J.', '', 'Winter', 'your-homecare@hotmail.com', 'Sperwerstraat', '3082MD', 'Rotterdam', '643228501', ''),
(118, 'C.', '', 'Duinhouwer', 'c.duinhouwer@gmail.com', 'Ravelstraat', '3161WE', 'Rhoon', '105016093', ''),
(119, 'Marjan', '-', 'Stougie', 'marjan.stougie@gmail.com', 'Zwaluwlaan', '3161TX', 'Rhoon', '628086850', ''),
(120, 'Suri', '', 'Change', 'virenbm@gmail.com', 'West-Kruiskade', '3014', 'Rotterdam', '620182315', ''),
(121, 'Schoonheidssalon', '', 'Style', 'info@instituutstyle.nl', 'Julianastraat', '3161AJ', 'Rhoon', '10', ''),
(122, '112', 'Naaimachines', 'Rijnmond', '112rijnmond@hotmail.nl', 'Kamperfoelie', '3171PC', 'Poortugaal', '623781350', ''),
(123, 'Irene', 'van ', 'Naaiatelier', 'info@irenenaaimachines.nl', 'Nieuwstraat ', '3201EA', 'SPIJKENISSE', '181621261', ''),
(124, 'C.', '', 'Waardenburg', 'cokvanwaardenburg@gmail.com', 'Heliotroop', '3162TK', 'Rhoon', '104801250', ''),
(125, 'R.', '', 'Petie', 'r.petie@kpnplanet.nl', 'Bruidsluier', '3171PK', 'Poortugaal', '105015382', ''),
(126, 'Guido', '', 'Westerman', 'westerman.gs@gmail.com', 'Parelmoervlinder', '7943 R', 'Meppel', '647071821', ''),
(127, 'Zwierig', '', 'Lederwaren', 'info@zwieriglederwaren.nl', 'Hoogstraat', '3011PM', 'Rotterdam', '621644470', ''),
(128, 'M.A.', 'de', 'Visser', 'devissermarieke@hotmail.com', 'Waalstraat', '3161XM', 'Rhoon', '629002359', ''),
(129, 'J.E.', 'van', 'Bruin', 'hans79@caiway.nl', 'Schroeder v/d Kolklaan', '3171XC', 'Poortugaal', '612413568', ''),
(130, 'Sylvia', '', 'Emmerik', 'jansil@deonlinekeuken.com', 'Dorpsdijk', '3161KD', 'Rhoon', '621574655', ''),
(131, 'W', '', 'Willems', 'woutw@hotmail.com', 'Hoogvlietsekerkweg', '3194 A', 'Hoogvliet-Rotterdam', '104160404', ''),
(132, 'M.H.', '', 'Spieringhs', 'shsh@hotmail.com', 'Brem', '3171NA', 'Poortugaal', '652384981', ''),
(133, 'Jerrel', '', 'Sadhoe', 'jerrel75@hotmail.com', 'Malachiet', '3162PM', 'Rhoon', '611355287', ''),
(134, 'L.W.', '', 'Kok', 'boogie1@caiway.nl', 'Safierlaan', '3162PL', 'Rhoon', '104704051', ''),
(135, 'Privǟ��huis Lust', '', 'Rotterdam', 'info@privehuislust.nl', 'Lange Hilleweg', '3073BX', 'Rotterdam', '620081862', ''),
(136, 'Kleurkracht', 'de', '.', 'marieke@kleurkracht.nl', 'Beugkant', '2993DK', 'Barendrecht', '648120002', ''),
(137, 'G.H.', '', 'Weerdt', 'ghdeweerdt@gmail.com', 'Waldeck Pyrmontlaan', '3762CL', 'Soest', '35', ''),
(138, 'Hans', '', 'Scheffer', 'scheffer1960@gmail.com', 'Margrietstraat', '3171AP', 'Poortugaal', '653530691', ''),
(139, 'J.M.', '', 'Hilhorst', 'jansil@deonlinekeuken.com', 'Dorpsdijk', '3161KD', 'Rhoon', '621562737', ''),
(140, 'Lucie', '', 'Spruit', 'ergverweg@live.nl', 'Nachtwaker', '3161LL', 'Rhoon', '618563014', ''),
(141, 'Banketbakkerij', '', 'BV', 'info@koekjesvanmaris.nl', 'Zonnekracht', '3255SC', 'Oude-Tonge', '187', ''),
(142, 'Insighter', 'Visser', '.', 'kevin@insighter.nl', 'Blijdorp-Oost', '2992LA', 'Barendrecht', '623225367', ''),
(143, 'Arie', 'van', 'Avisbouw', 'info@avisbouw.nl', 'Gaspeldoorn', '3171PS', 'Poortugaal', '653577853', ''),
(144, 'Dennis', '', 'Vliet', 'biancadennisenaimee@live.nl', 'L.G. Molenaarstraat', '3161XD', 'Rhoon', '652221288', ''),
(145, 'Astrid', 'Heezen Aziatisc', 'Roest', 'asroest@gmail.com', 'Dorpsdijk', '3161CG', 'Rhoon', '102263398', ''),
(146, 'M.C.', 'Achitectuur en', 'Producten BV', 'info@tokoheezen.nl', 'Langenhorst ', '3085HE', 'Rotterdam', '10', ''),
(147, 'LENING', 'Communicatie', 'Bouwadvies', 'info@bertlening.nl', 'Langeweg', '3257 K', 'Ooltgensplaat', '683235950', ''),
(148, 'Zeno', '', '.', 'beate@zenocommunicatie.nl', 'Ribiuslaan', '3161HB', 'Rhoon', '646626007', ''),
(149, 'J.', '', 'Vermeulen', 'jacqueline.vermeulen@versatel.nl', 'Clematis', '3171PA', 'Poortugaal', '615472518', ''),
(150, 'R.', 'de ', 'Benne', 'rietbenne@online.nl', 'Pinksterbloem', '3161SH', 'Rhoon', '612372939', ''),
(151, 'Ria', '', 'Groot de lange', 'riadegrootdelange@gmail.com', 'Dorpsdijk', '3161CB', 'Rhoon', '614963581', ''),
(152, 'P', '', 'Vermeulen', 'P.T.vermeulen@kpn.mail.nl', 'Ghijseland', '3162 V', 'Rhoon', '105014560', ''),
(153, 'Fred', '', 'Kok', 'fkok1@caiway.nl', 'Rhodenstraat', '3161BG', 'Rhoon', '105017232', ''),
(154, 'Macotra', '', 'BV', 'weg001@planet.nl', 'Oranje Nassaulaan', '3161BC', 'Rhoon', '653265774', ''),
(155, 'Orlando', '', 'Jessurun', 'orlandojessurun@hotmail.com', 'L. G. Molenaarstraat', '3161XE', 'Rhoon', '639355950', ''),
(156, 'Marion', 'der', 'Wever', 'm.wever@kpnplanet.nl', 'Molendijk', '3161KL', 'Rhoon', '655105107', ''),
(157, 'Van ', '', 'Helm-Hudig ', 'P.Voogt@vdhelm.com', 'Debussystraat ', '3161WD', 'Rhoon', '105066596', ''),
(158, 'Gerrit', 'van', 'Schorel', 'gerritschorel114@gmail.com', 'Nieuwe wetering', '3194TB', 'Hoogvliet-Rotterdam', '637160373', ''),
(159, 'Ria', '', 'Ruijven', 'b.l.vanruyven@hetnet.nl', 'Hoogeweg', '3161GS', 'Rhoon', '105016620', ''),
(160, 'Marcel', '', 'Romberg', 'm.romberg@hotmail.com', 'Rietdekker', '3171', 'Poortugaal', '625552184', ''),
(161, 'Erik', '	', 'Vermaak', 'e.vermaak@caiway.nl', 'Kroon ', '3162VD', 'RHOON', '644234226', ''),
(162, 'A', 'van', 'Radder', 'a.c.radder@umail.nl', 'F. van der Poest Clementlaan ', '3171EB', 'Poortugaal', '105012397', ''),
(163, 'Dick', '', 'opstal', 'dvopstal@caiway.nl', 'Kamperfoelie', '3171PD', 'Poortugaal', '105013412', ''),
(164, 'Marco ', '', 'Suurland', 'angelikasuur@1cloud.com', '', '3161AN', 'Rhoon', '620896778', ''),
(165, 'P.C.', '', 'Kamminga', 'petrabc76@gmail.com', 'Amethysthof', '3162RB', 'Rhoon', '620542767', ''),
(166, 'Avetu', '', '.', 'info@avetu.eu', 'Dorpsdijk', '3161CD', 'Rhoon', '613493406', ''),
(167, 'Kim', 'De', 'Noordermeer', 'kimnoordermeer81@gmail.com', 'Stolpmand ', '3192PK', 'Hoogvliet-Rotterdam', '638917181', ''),
(168, 'Lyazzat', '', 'Jong', 'Lyazzat888@yahoo.com', 'J.Louwerensplein', '3161WC', 'Rhoon', '634057788', ''),
(169, 'Bram', 'van', 'Herremans', 'a.herremans1@upcmail.nl', 'Dorpsweg', '3082LH', 'rotterdam', '614805304', ''),
(170, 'Remon', '', 'Heiden', 'moray1980.rvdh@gmail.com', 'julianastraat ', '3161AK', 'Rhoon ', '648834491', ''),
(171, 'Wil', '&', 'Minkhorst', 'wil.minkhorst@gmail.com', 'Waalstraat', '3161XN', 'Rhoon', '105016344', ''),
(172, 'Bags', '', 'Georgia', 'georgiabaas@hotmail.com', 'Gedempte Zalmhaven ', '3011BT', 'Rotterdam', '611788785', ''),
(173, 'M.A.', '', 'Karremans', 'petrakarremans@hotmail.com', 'leeuwerik ', '3161TE', 'rhoon', '621986738', ''),
(174, 'Sylvia', '', 'Jaarsma', 'ishmir@caiway.nl', 'Watering', '3171BG', 'Poortugaal', '651078223', ''),
(175, 'M', '', 'Liefkens', 'rialiefkens@hotmail.com', 'kievitsplantsoen', '3161TB', 'Rhoon', '105015177', ''),
(176, 'Caiway', '', '.', 'retail@caiway', 'molenstraat', '2671EW', 'Naaldwijk', '174', ''),
(177, 'Wim ', 'Van der', 'Gemert', 'wim-els04@hetnet.nl', 'Julianastraat', '3161AJ', 'Rhoon', '105010423', ''),
(178, 'Erik', 'Van der', 'Wind', 'erikjhu@hotmail.com', 'Albrandswaartsedijk', '3172XB', 'Poortugaal', '683981591', ''),
(179, 'S', '', 'Griend', 'dderijk@planet.nl', 'Lenghenhof', '3162RE', 'Rhoon', '644316141', ''),
(180, 'R&R', '', 'Constructions', 'info@rrconstructions.nl', 'Insula ', '3176TD', 'Poortugaal', '652384344', ''),
(181, 'M', '', 'Mostert', 'MaartjeCatharinaphotographie@gmail.com', 'Irenestraat', '3161AH', 'Rhoon ', '625347062', ''),
(182, 'Th.A', '', 'Binder', 'thedie@box.nl', 'rijsdijk ', '3161EW', 'Rhoon ', '651315128', ''),
(183, 'E', '', 'Salas', 'alivekicken@hotmail.com', 'Nachtwaker ', '3161LL', 'Rhoon ', '614232420', ''),
(184, 'Wim', '', 'Mallens', 'w.mallens@dji.minjus.nl', 'Scheffersstraat ', '3161 D', 'Rhoon', '60543800', ''),
(185, 'A', '', 'Noordzij', 'a-noordzij@outlook.com', 'Ghijseland ', '3161VR', 'Rhoon', '102162492', ''),
(186, 'C', 'de', 'Heiden', 'janheiden@hetnet.nl', 'Ghijseland', '3161VV', 'Rhoon', '10', ''),
(187, 'M', '', 'Jong-Beheer BV', 'jongmde@planet.nl', 'De beuk', '3161JH', 'Rhoon', '651499375', ''),
(188, 'R.A', '', 'Steger', 'rstegert@kpnmail.nl', 'julianastraat ', '3161', 'Rhoon', '612601271', ''),
(189, 'Schoonheidssalon', 'Bouw', 'Anett', 'anettkollath@hotmail.com', 'De beuk', '3161JH', 'Rhoon', '643225212', ''),
(190, 'Steger', 'van', 'Service', 'rsteger@kpnmail.nl', 'Julianastraat', '3161AK', 'Rhoon', '612601271', ''),
(191, 'Jeroen', '', 'Dinther', 'vandinther.jeroen@gmail.com', 'Jeroen van molenaarstraat', '3161XD', 'Rhoon', '105011521', ''),
(192, 'Lizette', '', 'Allart-Bremmers', 'lizette.bremmers@online.nl', 'De Eik', '3161JB', 'Rhoom', '651803394', ''),
(193, 'J.A.', '', 'Schenk', 'j.schenk20@kpnplanet.nl', 'Kampfoelie ', '3171PC', 'Poortugaal', '6', ''),
(194, 'Garage van Treuren', 'St ', 'van Treuren', 'info@garagevantreuren.nl', 'Dwerggras ', '3068PC', 'Rotterdam ', '10', ''),
(195, 'Taxi', '', 'Job', 'info@st-job.nl', 'Satijnbloem ', '3068 J', 'Rotterdam ', '10', ''),
(196, 'Pieter', 'De', 'Ouderkerk', 'pietero@telfort.nl', 'Mezenstraat ', '3161', 'Rhoon', '650517955', ''),
(197, 'HG', '', 'Lange', 'Lang3817@planet.nl', 'Thijsjesdijk ', '3161CV', 'Rhoon', '653849072', ''),
(198, 'Rody', '', 'Ouwendijk', 'r_ouwendijk@hotmail.com', 'Molendijk', '3161KN', 'Rhoon', '646331370', ''),
(199, 'Laura', '', 'Simonse', 'eenl23@kpnmail.nl', 'Nicolaas van Puttenstraat', '3176VD', 'Poortugaal', '622451091', ''),
(200, 'Marcel', 'Van', 'Romberg', 'm.romberg@hotmail.com', 'Rietdekker', '3171HK', 'Poortugaal', '625552184', ''),
(201, 'Johan', '', 'Nielen', 'johanvannielen@gmail.com', 'D de Haanstraat ', '3161XA', 'Rhoon	', '620656156', ''),
(202, 'Bjorn ', '', 'Bergwerff', 'bjornbergwerf@hotmail.com', 'Weelsedijk', '3291LR', 'Strijen ', '653899914', ''),
(203, 'JC', 'van', 'Overbeek', 'overbeekjohn@hotmail.com', 'Toren ', '3161LR', 'Rhoon', '625586851', ''),
(204, 'Suzan', '', 'Waardenburg', 'svanwaardenburg@yahoo.com', 'Oostdorpseweg', '3176PL', 'Poortugaal', '650405748', ''),
(205, 'jessica', 'Van den', 'Hillen ', 'jessica_hillen@hotmail.com', 'keesvandongenlaan', '3161DL', 'Rhoon', '643093629', ''),
(206, 'Remon', 'Club', 'Houwen', 'info@it-skills.nl', '', '3161TE', 'rhoon', '628905154', ''),
(207, 'Sportstudio ', 'Van', 'Active', 'slenderyou.barendrecht@planet.nl', 'brugge', '2993LB', 'Barendrecht', '612169473', ''),
(208, 'marja', '', 'Dijk', 'marjavandijkverbaas@gmail.com', 'Minstreel', '3161NE', 'Rhoon', '683233760', ''),
(209, 'Edwin', '', 'Kort', 'edwin.kort@gmail.com', 'Jonkerhof', '3161LH', 'Rhoon', '649988172', ''),
(210, 'Bianca', '', 'Heezen', 'bianca.heezen.984@gmail.com', 'Merellaan', '3161TH', 'Rhoon', '641788358', ''),
(211, 'Nirafa', '', 'BV', 'raies_8@hotmail.com', 'Overwegwachter', '3034 K', 'Rotterdam', '6', ''),
(212, 'Joop', '', 'Vestergaard', 'administratie@it-skills.nl', 'Reiger', '3191GB', 'Hoogvliet', '104169508', ''),
(213, 'Stukadoorsbedrijf', 'de', 'Rhoon', 'milousmaal5@hotmail.com', 'prisma ', '3162', 'Rhoon', '623847706', ''),
(214, 'V.O.F', '', 'Raad', 'patrickderaad77@hotmail.com', 'Kwartslaan ', '3162', 'Rhoon', '621541387', ''),
(215, 'Jacobus', '', 'Tempelman', 'jac.tempelman@upcmail.nl', 'boet', '3192NJ', 'HOOGVLIET', '104383103', ''),
(216, 'Mansion', 'van', 'Makelaardij', 'info@mansionmakelaardij.nl', 'Lichtenauerlaan', '3062ME', 'Rotterdam', '10', ''),
(217, 'Angela', '', 'Groeningen', 'info@socialpointrotterdam.nl', 'Pauwenburg', '3085KR', 'Rotterdam', '6', ''),
(218, 'Gerard', '-', 'Zantman', 'gerardzan@gmail.com', 'Parallelstraat', '3161BD', 'Rhoon', '105017521', ''),
(219, 'PV', '', 'Finance', 'vetonagroup.enterprises@gmail.com', 'Ceresstraat', '4811CA', 'Breda', '615686327', ''),
(220, 'Remon', 'van den', 'Brands', 'remon.brands@gmail.com', 'Zadkinerade', '2907MB', 'Capelle a/d Ijssel', '653344988', ''),
(221, 'C.', '', 'Engel', 'engel3217@planet.nl', 'Bartokstraat', '3161WB', 'Rhoon', '620964777', ''),
(222, 'Lida', '', 'Tamminga', 'tamminga44@planet.nl', 'Bouwlust', '3162SB', 'Rhoon', '651955570', ''),
(223, 'Dicky', '', 'Verhoeven', 'dickyverhoeven@hotmail.com', 'Rijsdijk', '3161HP', 'Rhoon', '104204671', ''),
(224, 'T-Rex ', '', 'Transport B.V', 'info@T-RexTransport.nl', 'Dorpsdijk ', '3161CC', 'Rhoon', '636300658', ''),
(225, 'Joke', '', 'Doorn', 'joke.doorn@planet.nl', 'Dorpsdijik', '3161KD', 'Rhoon', '624364246', ''),
(226, 'Bram', '', 'Lodder', 'lodderbram59@gmail.com', 'Wilhelminagevestraat', '3172VE', 'Poortugaal', '652481775', ''),
(227, 'Frenk', '', 'Friggers', 'frenkfriggers@gmail.com', 'Binnenban ', '3191CJ', 'Hoogvliet-Rotterdam', '6', ''),
(228, 'The Ginger', 'Corporation', 'Groomer', 'merlingouw@gmail.com', 'Reigerstraat', '3161TN', 'Rhoon', '6', ''),
(229, 'Bluelab', '', 'Europe', 'tania@bluelab.com', 'Diamantweg', '1812RC', 'Alkmaar', '628329060', ''),
(230, 'Jeroen ', '', 'Pieterse', 'jp_exclusive@hotmail.com', 'Julianastraat ', '3161AK', 'Rhoon', '643975062', ''),
(231, 'PEBO', 'de', 'Group', 'corinne.verhagen@pebogroup.nl', 'Kolfstraat', '3311XL', 'Dordrecht', '783032466', ''),
(232, 'Quinty', '', 'Mooij', 'quinty.demooij@hotmail.nl', 'Rietdekker', '3171HK', 'Poortugaal', '626194965', ''),
(233, 'L.C.', 'Barendrecht', 'Mulder', 'lc.mulder@hotmail.com', 'Corellistraat', '3161RG', 'Rhoon', '628273245', ''),
(234, 'Brandstore', '', 'BV', 'renate@brand-store.nl', 'Postbus ', '3160AA', 'Rhoon', '652460982', ''),
(235, 'rick', '', 'mostert', 'rick@konektaindustries.nl', 'ambachtsweg ', '3161 G', 'Rhoon', '646221401', ''),
(236, 'Henk', '', 'Barbier', 'hbarbier@caiway.nl', 'Ghijseland ', '3161VV', 'Rhoon', '618503244', ''),
(237, '2', '', 'Times', 'marco@2times.nl', 'Spui', '3161ED', 'Rhoon', '626456079', ''),
(238, 'Brussels', 'den', 'Lof', 'info@brussels-lof.nl', 'Koningsplein ', '2981EA', 'Ridderkerk', '643975062', ''),
(239, 'J.H', '', 'Ouden Bestrating', 'j.ouden12@gmail.com', 'Jacob van Rijsoordstraat ', '3161XC', 'Rhoon', '655764784', ''),
(240, 'C', '', 'Kooy', 'ckrhoon@planet.nl', 'C.A Dekkerstraat', '3161BA', 'Rhoon', '105015150', ''),
(241, 'L.', '', 'Bontes', 'l.bontes@hotmail.com', 'De Eik', '3161JA', 'Rhoon', '629092873', ''),
(242, 'Gemeente', '', 'Albrandswaard', 'b.korkmaz@albrandswaard.nl', 'Hofhoek', '3176PD', 'Poortugaal', '105013222', ''),
(243, 'Henk', '', 'Duurkoop', 'oelduurkoop@hetnet.nl', 'Hovenier', '3161LG', 'Rhoon', '5013088', ''),
(244, 'Marcel', '', 'Koole', 'koolefaessen@hetnet.nl', 'Troubadour', '3161LT', 'Rhoon', '655893221', ''),
(245, 'Arne', '', 'Prins', 'arneprins09@hotmail.com', 'Hofnar', '3161LE', 'Rhoon', '102261409', ''),
(246, 'Marco', 'van den', 'Bijl', 'marco-bijl@hotmail.com', 'Loevestein', '3171JD', 'Poortugaal', '651575286', ''),
(247, 'Anjo', '', 'Hooven', 'janzand20@gmail.com', 'Zantelweg', '3161XS', 'Rhoon', '621983962', ''),
(248, 'Jan', '', 'Groenenboom', 'janw.groenenboom@gmail.com', 'Kerkachterweg', '3171GC', 'Poortugaal', '1050118808', ''),
(249, 'John ', '', 'Bosman', 'info@it-skills.nl', '', '3161TE', 'rhoon', '630260889', ''),
(250, 'Patries', '', 'Bijholt', 'patriesbijholt@live.nl', 'Weeldeweg', '4328NA', 'Burgh-Haamstede', '627553372', ''),
(251, 'Wim', 'van', 'Pellikaan', 'wimpellikaan@gmail.com', 'Ghijseland', '3161VD', 'Rhoon', '654105421', ''),
(252, 'H.E.', '', 'der Spek', 'wiefke.s@gmail.com', 'Dorpsdijk', '3161KG', 'Rhoon', '105018534', ''),
(253, 'Bram', 'van der', 'Scheffer', '2201bram@gmail.com', 'Magnolia', '3161CM', 'Rhoon', '105015947', ''),
(254, 'M', '', 'Griendt', 'admin@griendt-glasbewassing.nl', 'a.diepenbrockstraat', '3208AB', 'Spijkenisse', '657409297', ''),
(255, 'Mar-Vic ', '', 'Trading BV', 'kim@mar-vic.nl', 'De Beuk ', '3161JG', 'Rhoon', '6', ''),
(256, 'Audrey', '', 'Knijn', 'audreyknijn@hotmail.com', 'Gooimeer', '2993RJ', 'Barendrecht', '641218666', ''),
(257, 'Julianaschool', '', 'Rhoon', 'directie@julianaschoolrhoon.nl', 'Julianastraat', '3161AK', 'Rhoon', '10', ''),
(258, 'Jessica', '', 'Quant', 'j.quant07@gmail.com', 'Schoonegge', '3085CT', 'Rotterdam', '651699346', ''),
(259, 'Ger', '', 'Schuurmans', 'gjschuurmans@planet.nl', 'Anthony van Hobokenstraat', '3161KR', 'Rhoon', '654773338', ''),
(260, 'GTS ', '', 'Nederland B.V', 'n.ahsman@gtslogisticnl.com', 'vasteland ', '3011BM', 'Rotterdam', '631352152', ''),
(261, 'Borges', '', 'Projects', 'borgesprojects@hotmail.com', 'Beatrixstraat', '3161AA', 'Rhoon', '651359700', ''),
(262, 'A.J', '', 'van Gend', 'aad-sonja@outlook.com', 'Hofnar ', '3161LE', 'Rhoon', '104340924', ''),
(263, 'Andre ', 'Solutions', 'de Reus', 'adereus@kabelphone.nl', 'Dorpsdijk ', '3161CB', 'Rhoon', '653421021', ''),
(264, 'Chat', '', 'BV', 'info@chatsolutions.nl', 'Leemansweg', '6827BX', 'Arnhem', '628767935', ''),
(265, 'Dick', '', 'Vergoes Houwens', 'dvergoes@caiway.nl', 'Blaakse Wetering', '3176XB', 'Poortugaal', '611765257', ''),
(266, 'A.H', 'van ', 'Ekker', 'a.ekker@online.nl', 'Telemanstraat', '3161RT', 'Rhoon', '105012051', ''),
(267, 'R.C .', 'van den ', 'Keulen', 'keulen@vkadvocatuur.nl', 'Hoefsmitstraat ', '3194AA', 'Hoogvliet-Rotterdam', '643378381', ''),
(268, 'Hans ', '', 'Dorpel', 'hanslydi@gmail.com', 'Adriana van Roonhof ', '3161KT', 'Rhoon', '622990215', ''),
(269, 'Dylan', '', 'Scholten', 'd.scholten94@gmail.com', 'Lelieplein', '3202HE', 'Spijkenisse', '611054534', ''),
(270, 'Fietsverhuur', '', 'Zeeland', 'info@fietsverhuurzeeland.nl', 'Burgsheweg', '4328LB', 'Burgh-Haamstede', '111407498', ''),
(271, 'Jan', 'de', 'Wittenberg', 'info@fbw-zeeland.nl', 'boeijesbosch', '4328LN', 'Burgh-haamstede', '621445843', ''),
(272, 'Lily', 'van', 'Vette', 'administratie@it-skills.nl', 'Bartokstraat', '3161WB', 'Rhoon', '105018583', ''),
(273, 'Caroline', 'van', 'Keulen', 'mulder3054@kpnmail.nl', 'Maurits Escherlaan', '3161', 'Rhoon', '102161969', ''),
(274, 'Michiel', 'in de ', 'Keulen', 'michiel_van_keulen@hotmail.com', 'van gogh allee', '3161DA', 'Rhoon', '654974748', ''),
(275, 'Bakkerij ', '', 'Soete Suikerbol', 'soete-suikerbol@zeelandnet.nl', 'Burghse ring ', '4328LL', 'Burgh-Haamstede', '11165', ''),
(276, 'martha', '', 'marre', 'jaan01@hotmail.nl', 'nicolaas van puttenstraat', '3176vd', 'Poortugaal', '651181204', ''),
(277, 'A.S.', '', 'Koning', 'info@tonkoning.com', 'Boterbloemweg', '2403 T', 'Alphen aan den Rijn', '616812792', ''),
(278, 'TW', '', 'Waarneming', 'hpfvantwesteinde@gmail.com', 'Lord Kelvinstraat', '1098SG', 'Amsterdam', '641055184', ''),
(279, 'Coen Hendriks', 'H', 'Vastgoed BV', 'administratie@it-skills.nl', 'Weegbreestraat', '3053JS', 'Rotterdam', '621531479', ''),
(280, 'Schildersbedrijf', '', 'van Strijbos', 'hvanstrijbos@versatel.nl', 'Marskramer', '3161ND', 'Rhoon', '653840512', ''),
(281, 'elody', '', 'Hogerwerf', 'mv.hogerwerf@hotmail.com', 'dorpsdijk ', '3161CJ', 'Rhoon', '651125276', ''),
(282, 'Loodgietersbedrijf ', '', 'K Wijntjes', 'administratie@it-skills.nl', 'Koninginnelaan ', '3171CK', 'Poortugaal', '105013222', ''),
(283, 'Technolux', '', 'BV', 'koosbok@technolux.nl', 'Wilgenhoven', '3162PE', 'Rhoon', '102200340', ''),
(284, 'R', 'van', 'Prins', 'r_prins@hotmail.com', 'westerenbanweg', '4328GT', 'Burgh-Haamste', '111851297', ''),
(285, 'B', '', 'Damme', 'basicway@zeelandnet.nl', 'weststraat', '4328AB', 'burgh-haamstede', '612329571', ''),
(286, 'nicole', '', 'verbrugge', 'nicoleverbrugge123@gmail.com', 'Akkerstraat', '3171AB', 'Poortugaal', '647924948', ''),
(287, 'Max ', '', 'Krul', '77@gmail.com', 'Cornelisschuytstraat ', '1071 J', 'Amsterdam', '646616993', ''),
(288, 'Bianca', 'van', 'Todd', 'bianca_todd@hotmail.com', 'achterweg', '3171 E', 'Poortugaal', '622703745', ''),
(289, 'LIA', 'de', 'oel', 'liavanoel@hotmail.com', 'hovenier ', '3161 L', 'Rhoon', '651976625', ''),
(290, 'Gall&Gall', '', 'Raadt', 'robderaadt@yahoo.com', 'Dr.H. Colijnlaan', '2283XK', 'Rijswijk', '703931414', ''),
(291, 'Hans', '', 'Du Mortier', 'hdm.123@12move.nl', 'Plein 1953', '3086EM', 'Rotterdam', '653745729', ''),
(292, 'Bako', '', 'Airconditioning', 'info@bako.nl', 'Nijverheidsweg', '3161GJ', 'Rhoon', '651499375', ''),
(293, 'Zeelt ', '', 'Dordrecht BV', 'administratie@it-skills.nl', 'Kolfstraat', '3311XL', 'Dordrecht', '105013222', ''),
(294, 'Rudolf ', 'Het', 'Hermann', 'hermann@zeelandnet.nl', 'Perenmeet ', '4328CM', 'Haamstede', '0', ''),
(295, 'Hotel', '', 'Spui', 'info@hotelhetspui.nl', 'Havendam', '3161XB', 'Rhoon', '630413651', ''),
(296, 'Gans Cargo', '', ' Transport operations', 'oscar.molenaar@ganscargo.com', 'Ravelstraat ', '3161WE', 'Rhoon', '105013455', ''),
(297, 'A.S.', 'van ', 'Schovelverhuur', 'sharsh@kpnmail.nl', 'Kleidijk', '3161HD', 'Rhoon', '647075519', ''),
(298, 'G.', '', 'Staveren', 'stave344@caiway.nl', 'Ghijseland', '3161VM', 'Rhoon', '654600125', ''),
(299, 'Maceo', '', 'Ramesar', 'maceo@live.nl', 'Topaaslaan', '3162TD', 'Rhoon', '610837936', ''),
(300, 'Fam', 'Totaal', 'Martens', 'm@botacryl.nl', 'molendijk', '3161KM', 'Rhoon', '654311655', ''),
(301, 'Bike', 'de', 'Spijkenisse', 'corinne.verhagen@pebogroup.nl', 'Kolfstraat ', '3311XL', 'Dordrecht', '621644470', ''),
(302, 'Mevr.', '', 'Raadt', 'administratie@it-skills.nl', 'Leeuwerikstraat', '3161TE', 'Rhoon', '105013872', ''),
(303, 'D.', '', 'Halk', 'djhalk@hotmail.com', 'adriana van roonhof ', '3161 k', 'rhoon', '651321326', ''),
(304, 'Gerser', '', 'schouten', 'ronald@gerser.nl', 'jan van herwijnenlaan', '3161DX', 'Rhoon', '652878487', ''),
(305, 'Novotem', '', '.', 'info@novotem.com', 'Hornweg', '1432GD', 'Aalsmeer', '651422067', ''),
(306, 'Jolanda ', '', 'Hulshof', 'jolanda@yenots.demon.nl', 'willem alexanderlaan', '3171CR', 'PoortugaaL', '630648891', ''),
(307, 'Cor', '', 'De', 'cordejongste@gmail.com', 'rijsdijk ', '3161HK', 'Rhoon', '620827555', ''),
(308, 'DB Media &', '', 'Marketing B.V', 'simon@dbmedia-marketing.nl', 'Lulofsstraat', '2521AL', 'Den-Haag', '105013222', ''),
(309, 'Gerser', '', 'Media', 'ronald@gerser.nl', 'Stadionweg', '3077AS', 'Rotterdam', '652878487', ''),
(310, 'H.K ', '', 'Leentvaar', 'h.leentvaar@hotmail.com', 'everhildestraat', '3084MA', 'Rotterdam', '613805030', ''),
(311, 'Botacryl ', '', 'BV', 'lm@botacryl.nl', 'Molendijk ', '3161KM', 'Rhoon', '105013222', ''),
(312, 'Peter', '', 'Beije', 'peterbeije01@zeelandnet.nl', 'dreef', '4328LL', 'Burgh-Haamstede', '634171060', ''),
(313, 'Bella', 'Het ', 'Derma', 'info@belladerma.nl', 'Bouwlust', '3162SB', 'Rhoon', '641296916', ''),
(314, 'Galerie ', '', 'Oude Raadhuis', 'joopskunst@gmail.com', 'Ring', '4328AE', 'Burgh-Haamstede', '111652928', ''),
(315, 'Sabi ', '', 'Entertainment', 'administratie@it-skills.nl', 'Anna Griesepad ', '3191XD', 'Hoogvliet-Rotterdam', '105013222', ''),
(316, 'C.J', '', 'Remeeus', 'administratie@it-skills.nl', 'Landheer ', '3171DD', 'Poortugaal', '611082783', ''),
(317, 'Robert', '', 'Bos', 'rwpbos@xs4all.nl', 'Christinastraat', '4328CB', 'Burgh-Haamstede', '111769046', ''),
(318, 'R.van den Houwen', '', 'Holding BV', 'raymond@vdhouwen.nl', 'William Boothlaan ', '3012VJ', 'Rotterdam', '628905154', ''),
(319, 'Stichting Kenniscentrum', '', 'Pro Work', 'tgrefkens@pro-work.nl', 'Hogeweg', '4328PB', 'Burgh-Haamstede', '653497522', ''),
(320, 'W.A.', 'van', 'Knoops', 'waknoops@gmail.com', 'Molen het Hert', '3161KV', 'Rhoon', '646822199', ''),
(321, 'M', '', 'Lenteren', 'vanlent7@gmail.com', 'Oud Rhoonsedijk', '3176PM', 'Poortugaal', '683906328', ''),
(322, 'Ed', '', 'Verhage', 'epverhage@zeelandnet.nl', 'Grevelingenlaan', '4328EV', 'Burgh-Haamstede', '650686408', ''),
(323, 'H C ', '', 'Heezen', 'h.heezen7@kpnplanet.nl', 'Mezenstraat', '3161tT', 'Rhoon', '105015718', ''),
(324, 'C M', '&', 'Saris van Loon', 'May.van.Loon@live.nl', 'Margrietstraat', '3161AL', 'Rhoon', '105015827', ''),
(325, 'Spee', '', 'Massar', 'speevast@caiway.net', 'Breitnerlaan ', '3161DB', 'Rhoon', '102439956', ''),
(326, 'De', '', 'Luchter', 'rwpbos@xs4all.nl', 'Christinastraat', '4328CB', 'Burgh-Haamstede', '111769046', ''),
(327, 'Cees Jan', '', 'Kooman', 'info@minicampingburgh.nl', 'Meeldijk', '4328NG', 'Burgh-Haamstede', '651772443', ''),
(328, 'Yvonne', '', 'Gielen', 'administratie@it-skills.nl', 'Serverinusstraat', '6096BS', 'Grathem', '105013222', ''),
(329, 'MLW', '', 'Consultancy', 'menno.de.leeuw@mlwconsultancy.nl', 'Duivelandstraat ', '3161BB', 'Rhoon', '641360470', ''),
(330, 'L L', '', 'Askes', 'Ll.askes@upcmail.nl', 'Blinkerd', '3192HP', 'Hoogvliet', '104168646', ''),
(331, 'michel', '', 'casanova', 'fvlammeren@live.nl', 'Robijnhoven', '3162 p', 'Rhoon', '617756932', ''),
(332, 'Ria ', '', 'Rosel', 'riarosel@kpnmail.nl', 'sweelinckstraat', '3161rr', 'Rhoon', '102107755', ''),
(333, 'J', 'van het', 'Gerlach', 'cgerlach@kpnplanet.nl', 'Ghijseland ', '3161VM', 'Rhoon', '614272865', ''),
(334, 'Bob', 'Solutions', 'Hof', 'bvanthof@caiway.nl', 'onyxlaan', '3162TC', 'Rhoon', '615570858', ''),
(335, 'Particle ', 'Solutions', 'BV', 'psseuro@zeelandnet.nl', 'Grevelingenlaan', '4328 E', 'Burgh- Haamstede', '615822288', ''),
(336, 'Partical', '', 'BV', 'psseuro@zeelandnet.nl', 'Grevelingenlaan', '4328EV', 'Burgh-Haamstede', '621644470', ''),
(337, 'charlotte ', '', 'Kloeg', 'charlottekloeg@gmail.com', 'rijsdijk ', '3161HM', 'Rhoon', '638342666', ''),
(338, 'Maud', '', 'Westerveld', 'b.westerveld5@kpnplanet.nl', 'Anthony van Hoboken', '3161KS', 'Rhoon', '643822949', ''),
(339, 'Dieyelle', 'Ton en', 'Reed', 'direed2@msn.com', '', '', '', '0', ''),
(340, 'Kapsalon', '', 'Yvon', 'yvonnehieselaar@gmail.com', 'Wilgenlaan', '4493CV', 'Kamperland', '642093922', ''),
(341, 'Klaas', '', 'Nieuwehuizen', 'klaas-wies@hetnet.nl', 'Riddergracht ', '3161NG', 'Rhoon', '10', ''),
(342, 'R', 'van ', 'Boenders', 're.boender@gmail.com', 'Bartokstraat', '3161WB', 'Rhoon', '618978965', ''),
(343, 'Coen', '', 'Alphen', 'cdvanalphen@hotmail.com', 'singel', '3161BJ', 'Rhoon', '628128220', ''),
(344, 'J.', '', 'Jonker', 'jannekej@zeelandnet.nl', 'Duinwegje ', '4328LE', 'Burgh-Haamstede', '111652697', ''),
(345, 'Evelina', '', 'Jonker', 'emion@zeelandnet.nl', 't lage burgh', '4328pb', 'Burgh-Haamstede', '618516411', ''),
(346, 'I', 'Van', 'Driesprong', 'ingedekok@hotmail.com', 'Mesdagstraat', '3161DD', 'Rhoon', '647144171', ''),
(347, 'Wim', '', 'Meerten', 'wimenalette@zeelandnet.nl', 'Burgemeester M. Bollelaan', '4328', 'Burgh-', '111651776', ''),
(348, 'B', '', 'Gielbert', 'bertgielbert@online.nl', 'Oudeland', '3335VH', 'Zwijndrecht', '617179672', ''),
(349, 'Jolanda ', '', 'Koert', 'Jolandakoert@gmail.com', 'Van Goch Allee', '', 'Rhoon', '644811435', ''),
(350, 'Mvr.', '', 'Schoenaker', 'banjo3@hetnet.nl', 'Scheepswerfstraat', '4328', 'Burgh-Haamstede', '2147483647', ''),
(351, 'Consensis', '', '.', 'mmboer@hotmail.com', 'Rijsdijk', '3161HM', 'Rhoon', '641253560', ''),
(352, 'Sandra', '', 'Oosterlee- De Vos', 'sfox@post.com', 'Welhoeksedijk', '3171TD', 'Poortugaal', '642066282', ''),
(353, 'Bert', '', 'Coenen', 'coenenb@zeelandnet.nl', 'Bramenlaan', '4328KJ', 'Nieuw-Haamstede', '657349066', ''),
(354, 'Marissa', '', 'Blom', 'marissablom1998@hotmail.com', 'Ring', '4328 A', 'Burgh-Haamstede', '640107977', ''),
(355, 'Girard', '', 'Equipment', 'vbrackx@girardequip.com', 'Zwolseweg', '299LB', 'Barendrecht', '624509577', ''),
(356, 'Brand', '', 'Zone', 'arthur@branzone.nl', 'Pascalstraat', '3316GR', 'Dordrecht', '653608668', ''),
(357, 'R', '', 'Mol', 'info@maildokter.nl', 'Achterdijk', '3161EB', 'Rhoon', '653483764', ''),
(358, 'Bas ', '', 'Muller', 'info@it-skills.nl', 'Binnenban', '3191CC', 'Hoogvliet-Rotterdam', '105013222', ''),
(359, 'Bert ', '', 'Gielbert', 'bertgielbert@online.nl', 'Oudeland', '3335VH', 'Zwijndrecht', '105013222', ''),
(360, 'Paul ', '', 'Groenenboom', 'info@it-skills.nl', 'Kamperfoelie', '3171PE', 'Poortugaal', '105013222', ''),
(361, 'M.', '', 'Pon', 'info@it-skills.nl', 'Ligusterlaan', '4328 K', 'Burgh-Haamstede', '622392113', ''),
(362, 'T', '', 'Korporaal', 'thomkorporaal@hotmail.com', 'St Josefstraat', '6039BS', 'Stramproy', '647962226', ''),
(363, 'Arie', '', 'Rietdijk', 'arie.rietdijk@kpnmail.nl', 'Waddenring', '2993VG', 'Barendrecht', '620132121', ''),
(364, 'Domingo', 'van', 'Domingo', 'administratie@it-skills.nl', 'Julianastraat, 41', '3161AJ', 'Rhoon', '682001653', ''),
(365, 'Dick', '', 'Heerik', 'dvdheerik@hetnet.nl', 'prikkorf', '3292ZB', 'hoogvliet', '682815065', ''),
(366, 'Domingo', '', 'Ondersteuning', 'info@it-skills.nl', 'Bijster', '3191SC', 'Hoogvliet-Rotterdam', '682001653', ''),
(367, 'Marina', '', 'Visser', 'marvis_94@hotmail.com', 'Kleidijk', '3161EK', 'Rhoon', '624695586', ''),
(368, 'MY ', '', 'Streaming', 'info@mystreaming.nl', 'Kamperfoeli', '3171PC', 'Poortugaal', '623781350', ''),
(369, 'Aad', '', 'Baas', 'adriaanbaas@hotmail.com', 'Albrandwaardseweg', '3171AC', 'Poortugaal', '625018189', ''),
(370, 'Willem', '', 'Dekker', 'wilcordekker@gmail.com', 'Margrietstraat', '3161AM', 'Rhoon', '611334609', ''),
(371, 'M', '', 'Brink', 'mbrink@zeelandnet.nl', 'Kerkstraat', '4328LH', 'Burgh-Haamstede', '111653824', ''),
(372, 'Guus', '', 'Marchand', 'bb-advies@zeelandnet.nl', 'boeijesbosch', '4328LP', 'zeeland', '628560263', ''),
(373, 'P.A', '', 'Hutten', 'pascalhutten@hotmail.com', 'Landheer ', '3171DD', 'Poortugaal', '646208434', ''),
(374, 'S.T', '', 'Zeegers', 'zirachzeegers@gmail.com', 'Peur', '3192JG', 'Hoogvliet-Rotterdam', '617588995', ''),
(375, 'Nico ', '', 'Erwich', 'nicoerwich@xs4all.nl', 'stappeland ', '1796BS', 'De Koog', '620052375', ''),
(376, 'Jan', 'van', 'Hendriks', 'jh0@kpnplanet.nl', 'Landjonker', '3171HG', 'poortugaal', '649335244', ''),
(377, 'A.', '', 'Houten', 'a.van.houten4@kpnplanet.nl', 'Wilhelmina Geevestraat', '3172VC', 'Poortugaal', '105014562', ''),
(378, 'FaSiam', '', '.', 'info@fasiam.nl', 'Avenue Carnisse ', '2993MG', 'Barendrecht', '644575423', ''),
(379, 'A', '', 'Maas Hoogerheiden', 'info@it-skills.nl', 'Burghse ring', '4326LK', 'Burgh-Haamstede', '111462429', ''),
(380, 'Lauren', '', 'Stoppelenburg', 'lauren3171@gmail.com', 'Emmastraat', '3171AH', 'Poortugaal', '624799800', ''),
(381, 'Bianca', 'de', 'Jongerius', 'leo.jongerius@kpnplanet.nl', 'Molen t Hert', '3161KV', 'Rhoon', '620211360', ''),
(382, 'Dirk', '', 'Haan', 'pasidirk@gmail.com', 'Nachtwaker ', '3161LL', 'Rhoon', '643488514', '');
>>>>>>> 4072b4ab52d5b6d2690d9e9fa1c5d3d6522c98d4

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `producten`
--

CREATE TABLE `producten` (
  `id` int(11) NOT NULL,
  `productnaam` varchar(255) NOT NULL,
  `prijs` varchar(45) NOT NULL,
  `aantal_verkocht` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

<<<<<<< HEAD
=======
--
-- Gegevens worden geëxporteerd voor tabel `producten`
--

INSERT INTO `producten` (`id`, `productnaam`, `prijs`, `aantal_verkocht`) VALUES
(13, 'desktop', '1195.00', 0),
(14, 'HDMI naar VGA kabel', '22.95', 0),
(15, 'Deco 2+ installatie', '350.00', 0),
(16, 'HP Deskjet All-in-one printer', '69.00', 1),
(17, 'HP 15DB0945ND', '479.00', 0),
(18, 'iPad R 2019 64GB Spacegrey wifi only', '499.00', 0),
(19, 'ipad', '180.00', 0),
(20, 'HP304', '28.00', 0),
(21, 'Powerline', '55.00', 0),
(22, 'Adapter', '100.00', 0),
(23, 'Cartridges', '60.00', 0),
(24, 'wifi router', '59.95', 0),
(25, 'deco systeem tweedelig 5 jaar garantie ', '230.45', 0),
(26, 'iPad R 2019 64GB Spacegrey wifi only lekker een scheetje laten', '230.45', 0),
(27, 'Videokaart Pc', '85.00', 0),
(28, 'Deco 3 + installatie', '450.00', 0),
(29, 'Inkt zwart HP 21', '24.95', 0),
(30, 'HDD schijf', '70.00', 0),
(31, 'SSD 250 GB', '110.00', 0),
(32, 'Accu Dell laptop', '47.00', 0);

>>>>>>> 4072b4ab52d5b6d2690d9e9fa1c5d3d6522c98d4
-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profiel_foto` varchar(255) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `profiel_foto`, `level`) VALUES
(1, 'admin', '$2y$10$vh23JnfmKbTjna54e19.2eJUG1B5N4HOXVVpj8FxFfNYsnzPJ7jfe', 'users/profielfoto/renato_pf.jpg', 1),
(2, 'renato', '$2y$10$XL2zEeuWhOdumFrJTj5gBufT3t1gvWXmqgtlNHTu02OrdoRUWzKAe', 'users/profielfoto/Default-Profile.png', 0);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `afspraken`
--
ALTER TABLE `afspraken`
  ADD PRIMARY KEY (`id`),
  ADD KEY `klanten_afspraken` (`klant_id`);

--
-- Indexen voor tabel `chat_message`
--
ALTER TABLE `chat_message`
  ADD PRIMARY KEY (`chat_message_id`);

--
-- Indexen voor tabel `diensten`
--
ALTER TABLE `diensten`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `facturen`
--
ALTER TABLE `facturen`
  ADD PRIMARY KEY (`factuurnummer`);

--
-- Indexen voor tabel `klanten`
--
ALTER TABLE `klanten`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `producten`
--
ALTER TABLE `producten`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `afspraken`
--
ALTER TABLE `afspraken`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `chat_message`
--
ALTER TABLE `chat_message`
  MODIFY `chat_message_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `diensten`
--
ALTER TABLE `diensten`
<<<<<<< HEAD
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT voor een tabel `facturen`
--
ALTER TABLE `facturen`
  MODIFY `factuurnummer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT voor een tabel `login_details`
--
ALTER TABLE `login_details`
  MODIFY `login_details_id` int(11) NOT NULL AUTO_INCREMENT;
=======
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT voor een tabel `klanten`
--
ALTER TABLE `klanten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=383;
>>>>>>> 4072b4ab52d5b6d2690d9e9fa1c5d3d6522c98d4

--
-- AUTO_INCREMENT voor een tabel `producten`
--
ALTER TABLE `producten`
<<<<<<< HEAD
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
=======
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
>>>>>>> 4072b4ab52d5b6d2690d9e9fa1c5d3d6522c98d4

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
