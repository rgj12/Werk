-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 12 mrt 2020 om 15:45
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

--
-- Gegevens worden geëxporteerd voor tabel `afspraken`
--

INSERT INTO `afspraken` (`id`, `klant_id`, `datum`, `tijd`, `omschrijving`, `datum_afspr_gemaakt`, `afspraak_voltooid`) VALUES
(39, 2, '2020-02-26', '12:20:00', '', '2020-02-25', 1),
(40, 2, '2020-02-25', '12:12:00', 'test', '2020-02-25', 1),
(41, 2, '2020-02-25', '12:12:00', 'tesdt', '2020-02-25', 1),
(42, 2, '2020-02-25', '12:12:00', 'th', '2020-02-25', 1),
(43, 2, '2020-02-20', '12:42:00', 'test', '2020-02-25', 0),
(44, 2, '2020-03-03', '12:30:00', 'test', '2020-03-03', 0),
(45, 3, '2020-03-25', '12:30:00', 'test\r\n', '2020-03-03', 0),
(46, 4, '2020-03-03', '12:12:00', 'test', '2020-03-03', 1);

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
(1, 'testdiensten', '7.80', 2),
(5, 'opschonen', '125.00', 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `facturen`
--

CREATE TABLE `facturen` (
  `factuurnummer` int(11) NOT NULL,
  `voornaam` varchar(255) NOT NULL,
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

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klanten`
--

CREATE TABLE `klanten` (
  `id` int(11) NOT NULL,
  `voornaam` varchar(255) NOT NULL,
  `achternaam` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `straatnaam` varchar(255) NOT NULL,
  `postcode` varchar(255) NOT NULL,
  `woonplaats` varchar(255) NOT NULL,
  `telefoonnummer` varchar(11) DEFAULT NULL,
  `reden_bezoek` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `login_details`
--

CREATE TABLE `login_details` (
  `login_details_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `last_activity` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Indexen voor tabel `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`login_details_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT voor een tabel `chat_message`
--
ALTER TABLE `chat_message`
  MODIFY `chat_message_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `diensten`
--
ALTER TABLE `diensten`
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

--
-- AUTO_INCREMENT voor een tabel `producten`
--
ALTER TABLE `producten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
