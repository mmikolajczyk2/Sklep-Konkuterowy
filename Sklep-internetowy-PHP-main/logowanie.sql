-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 18 Gru 2020, 00:20
-- Wersja serwera: 10.4.14-MariaDB
-- Wersja PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `logowanie`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `daneadresowe`
--

CREATE TABLE `daneadresowe` (
  `ID_Klient` int(11) NOT NULL,
  `Adres` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Email` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `KodPocztowy` int(5) NOT NULL,
  `Miasto` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `NrLokalu` text CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT NULL,
  `unique_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `daneadresowe`
--

INSERT INTO `daneadresowe` (`ID_Klient`, `Adres`, `Email`, `KodPocztowy`, `Miasto`, `NrLokalu`, `unique_ID`) VALUES
(1, 'Ogrodowa 17', 'marek_kowalski@gmail.com', 91111, 'Łódź', NULL, 2),
(2, 'Cicha 5', 'tomasz_strzelec@gmail.com', 87124, 'Warszawa', '31', 3),
(2, 'Piotrkowska 97', 'tomasz_strzelec@gmail.com', 54124, 'Łódź', '3', 4),
(1, 'Kościelna 12a', 'bazdanych@gmail.com', 91117, 'Katowice', '49', 11);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `danelogowania`
--

CREATE TABLE `danelogowania` (
  `ID_Klient` int(11) NOT NULL,
  `login` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `password` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Imie` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Nazwisko` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `danelogowania`
--

INSERT INTO `danelogowania` (`ID_Klient`, `login`, `password`, `Imie`, `Nazwisko`, `admin`) VALUES
(1, 'marek', 'qwerty', 'Marek', 'Kowalski', 0),
(2, 'tomasz', 'kalafior', 'Tomasz', 'Adamski', 0),
(15, 'krzychu', 'admin', 'admin', 'admin', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `koszyk`
--

CREATE TABLE `koszyk` (
  `unique_ID` int(11) NOT NULL,
  `ID_Klient` int(11) NOT NULL,
  `ID_Produktu` int(11) NOT NULL,
  `IloscSztuk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkt`
--

CREATE TABLE `produkt` (
  `ID_Produktu` int(11) NOT NULL,
  `Nazwa` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Kategoria` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `CenaZaSztuke` float NOT NULL,
  `nazwaObrazku` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `opis` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Promowanie` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `produkt`
--

INSERT INTO `produkt` (`ID_Produktu`, `Nazwa`, `Kategoria`, `CenaZaSztuke`, `nazwaObrazku`, `opis`, `Promowanie`) VALUES
(1, 'Piłka nożna', 'Sport', 55.99, 'pilkanozna.jpg', '[TUTAJ jest miejsce na przykładowy opis]. Który zawieral by do około 200 znaków.', 0),
(2, 'Kij golfowy', 'Sport', 45.99, 'kijgolfowy.jpg', '[TUTAJ jest miejsce na przykładowy opis]. Który zawieral by do około 200 znaków.', 0),
(3, 'Pizza mrożona', 'Jedzenie', 8.99, 'pizzamrożona.jpg', '[TUTAJ jest miejsce na przykładowy opis]. Który zawieral by do około 200 znaków.', 0),
(5, 'Telewizor 33\'', 'Elektronika', 2000.95, 'telewizor.jpg', '[TUTAJ jest miejsce na przykładowy opis]. Który zawieral by do około 200 znaków.', 0),
(6, 'Mikrofala', 'Elektronika', 250.99, 'mikrofala.jpg', '[TUTAJ jest miejsce na przykładowy opis]. Który zawieral by do około 200 znaków.', 1),
(7, 'Nawóz 20kg', 'Ogród', 40.99, 'nawóz20kg.jpg', '[TUTAJ jest miejsce na przykładowy opis]. Który zawieral by do około 200 znaków.', 0),
(8, 'Ławka ogrodowa', 'Ogród', 450.99, 'ławkaogrodowa.jpg', '[TUTAJ jest miejsce na przykładowy opis]. Który zawieral by do około 200 znaków.', 0),
(9, 'Laptop gamingowy', 'Rozrywka i gaming', 2499.98, 'laptop.jpg', '[TUTAJ jest miejsce na przykładowy opis]. Który zawieral by do około 200 znaków.', 1),
(11, 'Buty do biegania', 'Sport', 300.99, 'butydobiegania.jpg', '[TUTAJ jest miejsce na przykładowy opis]. Który zawieral by do około 200 znaków.', 0),
(12, 'Guma oporowa', 'Sport', 20.99, 'gumaoporowa.jpg', '[TUTAJ jest miejsce na przykładowy opis]. Który zawieral by do około 200 znaków.', 0),
(13, 'Łyżwy', 'Sport', 120.99, 'łyżwy.jpg', '[TUTAJ jest miejsce na przykładowy opis]. Który zawieral by do około 200 znaków.', 1),
(14, 'Paletka do Ping-Ponga', 'Sport', 25.99, 'paletka.jpg', '[TUTAJ jest miejsce na przykładowy opis]. Który zawieral by do około 200 znaków.', 0),
(15, 'Rakietka tenisowa', 'Sport', 130.99, 'rakietatenisowa.jpg', '[TUTAJ jest miejsce na przykładowy opis]. Który zawieral by do około 200 znaków.', 0),
(16, 'Rower - góral', 'Sport', 1500.99, 'rower.jpg', '[TUTAJ jest miejsce na przykładowy opis]. Który zawieral by do około 200 znaków.', 1),
(17, 'Siatka do gry w Badmintona', 'Sport', 75.99, 'siatka.jpg', '[TUTAJ jest miejsce na przykładowy opis]. Który zawieral by do około 200 znaków.', 0),
(18, 'Rolki ', 'Sport', 175.99, 'rolki.jpg', '[TUTAJ jest miejsce na przykładowy opis]. Który zawieral by do około 200 znaków.', 0),
(35, 'Słuchawki bezprzewodowe', 'Rozrywka i gaming', 199.99, 'sluchawki.jpg', '[TUTAJ jest miejsce na przykładowy opis]. Który zawieral by do około 200 znaków.', 0),
(37, 'Lody - pudełko', 'Jedzenie', 5.99, 'lodypudełko.jpg', '[TUTAJ jest miejsce na przykładowy opis]. Który zawieral by do około 200 znaków.', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produktyzamowienia`
--

CREATE TABLE `produktyzamowienia` (
  `id_unique` int(11) NOT NULL,
  `ID_Zamowienia` int(11) NOT NULL,
  `ID_Produktu` int(11) NOT NULL,
  `Sztuki` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `produktyzamowienia`
--

INSERT INTO `produktyzamowienia` (`id_unique`, `ID_Zamowienia`, `ID_Produktu`, `Sztuki`) VALUES
(60, 2, 9, 1),
(61, 2, 35, 1),
(62, 2, 7, 1),
(63, 2, 8, 1),
(64, 2, 3, 1),
(65, 2, 1, 1),
(66, 2, 2, 1),
(70, 5, 6, 1),
(71, 5, 9, 1),
(72, 5, 13, 1),
(73, 6, 9, 2),
(74, 6, 1, 1),
(75, 6, 2, 1),
(76, 6, 11, 1),
(77, 6, 12, 1),
(78, 6, 13, 1),
(79, 6, 17, 2),
(80, 6, 18, 1),
(81, 6, 5, 1),
(82, 6, 6, 1),
(83, 6, 35, 1),
(84, 6, 7, 1),
(85, 6, 8, 1),
(86, 7, 6, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `statusy`
--

CREATE TABLE `statusy` (
  `ID_Status` int(11) NOT NULL,
  `Nazwa_Statusu` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `statusy`
--

INSERT INTO `statusy` (`ID_Status`, `Nazwa_Statusu`) VALUES
(1, 'Przyjmowanie zamówienia'),
(2, 'Pakowanie'),
(3, 'Wysyłanie'),
(4, 'Dostarczono');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `telefon`
--

CREATE TABLE `telefon` (
  `ID_Telefon` int(11) NOT NULL,
  `Telefon` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `unique_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `telefon`
--

INSERT INTO `telefon` (`ID_Telefon`, `Telefon`, `unique_ID`) VALUES
(2, '+48 905 45 21', 3),
(3, '+48 134 145 132', 4),
(4, '+48 605 32 12', 5),
(5, '+48 124 21 21', 6),
(6, '+14 893 221 23', 7),
(7, '+48 934 23 11', 8),
(8, '+49 123 12 12', 9),
(1, '+48 123 123 123', 11),
(15, '+48 123 123 123', 14),
(15, '+48 91 33 205 11', 15),
(1, '+48 521 231 23', 17),
(1, '+48 123 941 231', 18),
(1, '+48 123 123 421', 19),
(1, '+48 49 49 21 21', 20),
(1, '+48 123 943 123', 21);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowienia`
--

CREATE TABLE `zamowienia` (
  `ID_Zamowienia` int(11) NOT NULL,
  `ID_Klient` int(11) NOT NULL,
  `Adres_unique_id` int(11) NOT NULL,
  `ID_Status` int(11) NOT NULL,
  `Opłata` float NOT NULL,
  `DataDostarczeniaPrzewidywana` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `zamowienia`
--

INSERT INTO `zamowienia` (`ID_Zamowienia`, `ID_Klient`, `Adres_unique_id`, `ID_Status`, `Opłata`, `DataDostarczeniaPrzewidywana`) VALUES
(2, 1, 11, 3, 3302.92, '2020-12-31'),
(5, 2, 4, 1, 2871.96, '2020-12-31'),
(6, 1, 11, 1, 8816.79, '2020-12-31'),
(7, 1, 2, 1, 501.98, '2020-12-24');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `daneadresowe`
--
ALTER TABLE `daneadresowe`
  ADD PRIMARY KEY (`unique_ID`);

--
-- Indeksy dla tabeli `danelogowania`
--
ALTER TABLE `danelogowania`
  ADD PRIMARY KEY (`ID_Klient`);

--
-- Indeksy dla tabeli `koszyk`
--
ALTER TABLE `koszyk`
  ADD PRIMARY KEY (`unique_ID`);

--
-- Indeksy dla tabeli `produkt`
--
ALTER TABLE `produkt`
  ADD PRIMARY KEY (`ID_Produktu`);

--
-- Indeksy dla tabeli `produktyzamowienia`
--
ALTER TABLE `produktyzamowienia`
  ADD PRIMARY KEY (`id_unique`) USING BTREE;

--
-- Indeksy dla tabeli `statusy`
--
ALTER TABLE `statusy`
  ADD PRIMARY KEY (`ID_Status`);

--
-- Indeksy dla tabeli `telefon`
--
ALTER TABLE `telefon`
  ADD PRIMARY KEY (`unique_ID`);

--
-- Indeksy dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  ADD PRIMARY KEY (`ID_Zamowienia`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `daneadresowe`
--
ALTER TABLE `daneadresowe`
  MODIFY `unique_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT dla tabeli `danelogowania`
--
ALTER TABLE `danelogowania`
  MODIFY `ID_Klient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT dla tabeli `koszyk`
--
ALTER TABLE `koszyk`
  MODIFY `unique_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT dla tabeli `produkt`
--
ALTER TABLE `produkt`
  MODIFY `ID_Produktu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT dla tabeli `produktyzamowienia`
--
ALTER TABLE `produktyzamowienia`
  MODIFY `id_unique` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT dla tabeli `statusy`
--
ALTER TABLE `statusy`
  MODIFY `ID_Status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `telefon`
--
ALTER TABLE `telefon`
  MODIFY `unique_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  MODIFY `ID_Zamowienia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
