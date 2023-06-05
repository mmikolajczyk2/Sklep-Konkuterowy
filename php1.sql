-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Cze 05, 2023 at 01:49 PM
-- Wersja serwera: 10.4.28-MariaDB
-- Wersja PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php1`
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
-- Dumping data for table `daneadresowe`
--

INSERT INTO `daneadresowe` (`ID_Klient`, `Adres`, `Email`, `KodPocztowy`, `Miasto`, `NrLokalu`, `unique_ID`) VALUES
(20, 'os.gutowe 19', 'lukassliw115@gmail.com', 42420, 'Poznan', '54', 12),
(25, 'os.gutowe 19', 'test@gmail.com', 37436, 'Poznan', '43', 13),
(22, 'os.gutowe 32', 'teeest@gmail.com', 35323, 'Poznan', '44', 14);

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
-- Dumping data for table `danelogowania`
--

INSERT INTO `danelogowania` (`ID_Klient`, `login`, `password`, `Imie`, `Nazwisko`, `admin`) VALUES
(22, 'mikson123', 'rlpi9pxkQ80EI', 'mati', 'szmik', 1),
(24, 'lukassliw', 'rlQ3JVeiIa2Xk', 'admin', 'admin', 1),
(25, 'tomaszewski', 'rlnv0Nb3SOjJA', 'tomasz', 'zegota', 0),
(26, 'robson123', 'rlryBEHtlAXFI', 'robert', 'robson', 2);

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

--
-- Dumping data for table `koszyk`
--

INSERT INTO `koszyk` (`unique_ID`, `ID_Klient`, `ID_Produktu`, `IloscSztuk`) VALUES
(133, 25, 3, 2);

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
-- Dumping data for table `produkt`
--

INSERT INTO `produkt` (`ID_Produktu`, `Nazwa`, `Kategoria`, `CenaZaSztuke`, `nazwaObrazku`, `opis`, `Promowanie`) VALUES
(1, 'Laptop Gamingowy GYGABYTE', 'laptop', 2800.99, 'assets/laptop01.jpg', 'Fajny prezent na dzien dziecka', 0),
(2, 'Laptop TUF', 'laptop', 3899.99, 'assets/laptop02.jpg', 'Idealny do grania w najnowsze produkcje', 0),
(3, 'Nintendo Switch', 'konsola', 1200.99, 'assets/konsola01.jpg', 'Konsola na której pograsz w takie gry jak :Legend of Zelda, Mario, Metroid Prime', 0),
(5, 'Sluchawki douszne', 'sluchawki', 750, 'assets/sluchawki01.jpg', 'Bardzo dobrej jakosci sluchawki douszne firmy apple', 0),
(6, 'Sluchawki dla producentów', 'sluchawki', 1800, 'assets/sluchawki02.jpg', 'fenomenalne sluchawki nauszne, idealne dla przyszlych producentow muzycznych', 1),
(7, 'sluchawki gamingowe', 'sluchawki', 750.99, 'assets/sluchawki03.jpg', 'Sluchawki dla prawdziwych gamerow, dzieki nim uslyszysz przeciwnika z kazdej strony', 0),
(8, 'Xbox series S', 'konsola', 1399.99, 'assets/konsola02.jpg', 'konsola najnowszej generacji od Microsoftu, zagraj w gry juz teraz!!', 0),
(9, 'PS5', 'konsola', 2499.98, 'assets/konsola03.jpg', 'Konsola od Sony, zagraj w takie tytuły jak god of war, last of us, spiderman 2', 1),
(11, 'laptop gamingowy ROG', 'laptop', 3400.99, 'assets/laptop03.jpg', 'najpotezniejsza maszyna na rynku', 0);

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
-- Dumping data for table `produktyzamowienia`
--

INSERT INTO `produktyzamowienia` (`id_unique`, `ID_Zamowienia`, `ID_Produktu`, `Sztuki`) VALUES
(98, 1, 3, 1),
(99, 1, 2, 1),
(100, 1, 6, 1),
(101, 2, 8, 1),
(102, 2, 3, 1),
(103, 3, 3, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `statusy`
--

CREATE TABLE `statusy` (
  `ID_Status` int(11) NOT NULL,
  `Nazwa_Statusu` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `statusy`
--

INSERT INTO `statusy` (`ID_Status`, `Nazwa_Statusu`) VALUES
(1, 'Przyjmowanie zamówienia'),
(2, 'Pakowanie'),
(3, 'Wysyłanie'),
(4, 'Dostarczono');

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
-- Dumping data for table `zamowienia`
--

INSERT INTO `zamowienia` (`ID_Zamowienia`, `ID_Klient`, `Adres_unique_id`, `ID_Status`, `Opłata`, `DataDostarczeniaPrzewidywana`) VALUES
(1, 25, 13, 3, 6900.98, '2023-06-21'),
(2, 25, 13, 1, 2600.98, '2023-06-18'),
(3, 22, 14, 1, 2401.98, '2023-06-18');

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
-- Indeksy dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  ADD PRIMARY KEY (`ID_Zamowienia`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daneadresowe`
--
ALTER TABLE `daneadresowe`
  MODIFY `unique_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `danelogowania`
--
ALTER TABLE `danelogowania`
  MODIFY `ID_Klient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `koszyk`
--
ALTER TABLE `koszyk`
  MODIFY `unique_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `produkt`
--
ALTER TABLE `produkt`
  MODIFY `ID_Produktu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `produktyzamowienia`
--
ALTER TABLE `produktyzamowienia`
  MODIFY `id_unique` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `statusy`
--
ALTER TABLE `statusy`
  MODIFY `ID_Status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `zamowienia`
--
ALTER TABLE `zamowienia`
  MODIFY `ID_Zamowienia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
