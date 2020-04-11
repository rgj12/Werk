-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 11 apr 2020 om 14:18
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
-- Database: `dash`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `beschikbare_tijden`
--

CREATE TABLE `beschikbare_tijden` (
  `id` int(11) NOT NULL,
  `tijden` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `beschikbare_tijden`
--

INSERT INTO `beschikbare_tijden` (`id`, `tijden`) VALUES
(1, '10:00-10:30'),
(2, '10:30-11:00'),
(3, '11:00-11:30'),
(4, '11:30-12:00'),
(5, '12:00-12:30'),
(6, '12:30-13:00'),
(7, '13:00-13:30'),
(8, '13:30-14:00'),
(9, '14:00-14:30'),
(10, '14:30-15:00'),
(11, '15:00-15:30'),
(12, '15:30-16:00'),
(13, '16:00-16:30'),
(14, '16:30-17:00');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bookings`
--

CREATE TABLE `bookings` (
  `afspraak_id` varchar(255) NOT NULL,
  `datum` date NOT NULL,
  `tijd` varchar(255) NOT NULL,
  `omschrijving` text NOT NULL,
  `medewerker` varchar(255) NOT NULL,
  `datum_afspr_gemaakt` date NOT NULL DEFAULT current_timestamp(),
  `afspraak_voltooid` tinyint(1) NOT NULL DEFAULT 0,
  `datum_afspr_voltooid` varchar(255) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `achternaam` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `bookings`
--

INSERT INTO `bookings` (`afspraak_id`, `datum`, `tijd`, `omschrijving`, `medewerker`, `datum_afspr_gemaakt`, `afspraak_voltooid`, `datum_afspr_voltooid`, `naam`, `achternaam`) VALUES
('zKYfg68J6A07Fmu', '2020-04-14', '16:30-17:00', 'test', 'renato', '2020-04-11', 0, '', 'renato', 'Gomes');

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

--
-- Gegevens worden geëxporteerd voor tabel `chat_message`
--

INSERT INTO `chat_message` (`chat_message_id`, `to_user_id`, `from_user_id`, `bericht`, `time_stamp`, `urgentie`, `gelezen`) VALUES
(2, 2, 1, 'h0ojhgug', '2020-04-02 22:31:18', 'hoog', 'niet');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `diensten`
--

CREATE TABLE `diensten` (
  `id` varchar(255) NOT NULL,
  `dienstnaam` varchar(255) NOT NULL,
  `dienstprijs` varchar(45) NOT NULL,
  `aantal_verkocht` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `diensten`
--

INSERT INTO `diensten` (`id`, `dienstnaam`, `dienstprijs`, `aantal_verkocht`) VALUES
('2hKAlcUXesycIrS', 'testa', '12.12', 2);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `facturen`
--

CREATE TABLE `facturen` (
  `id` varchar(255) NOT NULL,
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

--
-- Gegevens worden geëxporteerd voor tabel `facturen`
--

INSERT INTO `facturen` (`id`, `factuurnummer`, `voornaam`, `achternaam`, `email`, `straatnaam`, `postcode`, `woonplaats`, `telefoonnummer`, `klantnummer`, `product1`, `product2`, `product3`, `dienst1`, `dienst2`, `dienst3`, `product_prijs1`, `product_prijs2`, `product_prijs3`, `dienst_prijs1`, `dienst_prijs2`, `dienst_prijs3`, `totaalIncBtw`, `totaalExBtw`, `totaalBTW`, `datum`, `betaalOpties`) VALUES
('cCdGhPGvbaAnL3R', 22, 'Renato', 'gomes faial', 'renatogomes600@gmail.com', 'zuidakker 98', '3206tj', 'spijkenisse', '', 3, 'product ', 'product ', ' ', ' ', ' ', ' ', ' 21.00', ' 21.00', ' 0', ' 0', ' 0', ' 0', '42.00', '34.71', '7.29', '2020-03-19', '14 dagen');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klanten`
--

CREATE TABLE `klanten` (
  `id` varchar(255) NOT NULL,
  `klantnummer` int(11) NOT NULL,
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

--
-- Gegevens worden geëxporteerd voor tabel `klanten`
--

INSERT INTO `klanten` (`id`, `klantnummer`, `voornaam`, `tussenvoegsels`, `achternaam`, `email`, `straatnaam`, `postcode`, `woonplaats`, `telefoonnummer`, `reden_bezoek`) VALUES
('MPMuqKIhQpJQvFv', 3, 'Renato', '', 'gomes faial', 'renatogomes600@gmail.com', 'zuidakker 98', '3206tj', 'spijkenisse', '0637278708', 'test'),
('MjSk7ryrD8vT6uW', 5, 'gerrit', '', 'test', 'yo@gmail.com', 'teststraat', '3201ik', 'RDAM', '25666', 'TEST');

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
  `id` varchar(255) NOT NULL,
  `productnaam` varchar(255) NOT NULL,
  `prijs` varchar(255) NOT NULL,
  `aantal_verkocht` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `producten`
--

INSERT INTO `producten` (`id`, `productnaam`, `prijs`, `aantal_verkocht`) VALUES
('UC0ZcNVpHA3BzvG', 'product', '21.00', 7),
('wQfo65I0cdsSlz5', 'testa', '33.00', 1);

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
-- Indexen voor tabel `beschikbare_tijden`
--
ALTER TABLE `beschikbare_tijden`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`afspraak_id`);

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
  ADD PRIMARY KEY (`klantnummer`);

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
-- AUTO_INCREMENT voor een tabel `beschikbare_tijden`
--
ALTER TABLE `beschikbare_tijden`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT voor een tabel `chat_message`
--
ALTER TABLE `chat_message`
  MODIFY `chat_message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `facturen`
--
ALTER TABLE `facturen`
  MODIFY `factuurnummer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT voor een tabel `klanten`
--
ALTER TABLE `klanten`
  MODIFY `klantnummer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT voor een tabel `login_details`
--
ALTER TABLE `login_details`
  MODIFY `login_details_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
