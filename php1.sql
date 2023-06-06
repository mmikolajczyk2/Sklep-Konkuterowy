-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Cze 06, 2023 at 02:17 PM
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
(22, 'os.gutowe 32', 'teeest@gmail.com', 35323, 'Poznan', '44', 14),
(27, 'hutowa 12', 'test@gmail.com', 42420, 'Poznan', '56', 15);

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
(22, 'mikson123', 'rlpi9pxkQ80EI', 'mati', 'smiri', 1),
(24, 'lukassliw', 'rlQ3JVeiIa2Xk', 'admin', 'admin', 1),
(25, 'tomaszewski', 'rlnv0Nb3SOjJA', 'tomasz', 'zegota', 0),
(27, 'tomcio123', 'rlQ3JVeiIa2Xk', 'Tomasz', 'Zigi', 0),
(28, 'mateusz321', 'rlOF/ZiBjZkDQ', 'Mateusz', 'Kopytko', 2);

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
(139, 25, 8, 1);

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
(1, 'Laptop Gamingowy GYGABYTE', 'Laptop', 2800.99, 'assets/laptop01.jpg', 'Fajny prezent na dzien dziecka', 0),
(2, 'Laptop TUF', 'Laptop', 3899.99, 'assets/laptop02.jpg', 'Idealny do grania w najnowsze produkcje', 0),
(5, 'Sluchawki douszne', 'Sluchawki', 750, 'assets/sluchawki01.jpg', 'Bardzo dobrej jakosci sluchawki douszne firmy apple', 0),
(6, 'Sluchawki dla producentów', 'Sluchawki', 1800, 'assets/sluchawki02.jpg', 'fenomenalne sluchawki nauszne, idealne dla przyszlych producentow muzycznych', 1),
(7, 'sluchawki gamingowe', 'Sluchawki', 750.99, 'assets/sluchawki03.jpg', 'Sluchawki dla prawdziwych gamerow, dzieki nim uslyszysz przeciwnika z kazdej strony', 0),
(8, 'Xbox series S', 'Konsola', 1399.99, 'assets/konsola02.jpg', 'konsola najnowszej generacji od Microsoftu, zagraj w gry juz teraz!!', 0),
(9, 'PS5', 'Konsola', 2499.98, 'assets/konsola03.jpg', 'Konsola od Sony, zagraj w takie tytuły jak god of war, last of us, spiderman 2', 1),
(11, 'laptop gamingowy ROG', 'Laptop', 3400.99, 'assets/laptop03.jpg', 'najpotezniejsza maszyna na rynku', 0),
(40, 'Nintendo Switch', 'Konsola', 2300.99, 'assets/konsola01.jpg', 'przenosna konsola do grania', 0);

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
(104, 4, 9, 1),
(105, 4, 2, 1),
(106, 4, 7, 1),
(108, 1, 8, 1),
(109, 1, 9, 1);

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
(1, 25, 13, 1, 3899.97, '2023-06-20'),
(4, 27, 15, 1, 7150.96, '2023-06-19');

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
  MODIFY `unique_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `danelogowania`
--
ALTER TABLE `danelogowania`
  MODIFY `ID_Klient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `koszyk`
--
ALTER TABLE `koszyk`
  MODIFY `unique_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `produkt`
--
ALTER TABLE `produkt`
  MODIFY `ID_Produktu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `produktyzamowienia`
--
ALTER TABLE `produktyzamowienia`
  MODIFY `id_unique` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

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
