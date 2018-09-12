-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 12 Wrz 2018, 01:03
-- Wersja serwera: 10.1.33-MariaDB
-- Wersja PHP: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `uczniowie`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `aktualny`
--

CREATE TABLE `aktualny` (
  `ID_Ucznia` char(3) NOT NULL,
  `ID_egzaminu` char(20) NOT NULL,
  `pytanie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `aktualny`
--

INSERT INTO `aktualny` (`ID_Ucznia`, `ID_egzaminu`, `pytanie`) VALUES
('001', 'NVM', 96),
('002', 'NWM', 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `egzaminy`
--

CREATE TABLE `egzaminy` (
  `ID_Egzaminu` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Pytanie` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `CzyABCD` char(3) NOT NULL DEFAULT 'NIE',
  `A` text CHARACTER SET utf8 COLLATE utf8_polish_ci,
  `B` text CHARACTER SET utf8 COLLATE utf8_polish_ci,
  `C` text CHARACTER SET utf8 COLLATE utf8_polish_ci,
  `D` text CHARACTER SET utf8 COLLATE utf8_polish_ci,
  `klucz_nauczyciela` char(5) NOT NULL,
  `Nr_pytania` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `egzaminy`
--

INSERT INTO `egzaminy` (`ID_Egzaminu`, `Pytanie`, `CzyABCD`, `A`, `B`, `C`, `D`, `klucz_nauczyciela`, `Nr_pytania`) VALUES
('NWM', 'eagtewefte', 'tak', '1', '23', '4', '', 'klucz', 1),
('NWM', 'gh5w4y457', 'nie', '', '', '', '', 'klucz', 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `nauczyciellogowanie`
--

CREATE TABLE `nauczyciellogowanie` (
  `klucz` char(5) NOT NULL,
  `haslo` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `nauczyciellogowanie`
--

INSERT INTO `nauczyciellogowanie` (`klucz`, `haslo`) VALUES
('kluc1', 'asdfg'),
('klucz', 'qwert');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `oceny`
--

CREATE TABLE `oceny` (
  `ID_Ucznia` char(3) NOT NULL,
  `Ocena` float NOT NULL,
  `Egzamin` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `oceny`
--

INSERT INTO `oceny` (`ID_Ucznia`, `Ocena`, `Egzamin`) VALUES
('001', 3, 'Narzedzia'),
('001', 4.5, 'Matematyka'),
('002', 3.5, 'Matematyka');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `odpowiedzi`
--

CREATE TABLE `odpowiedzi` (
  `ID_Ucznia` int(11) NOT NULL,
  `nr_pytania` int(11) NOT NULL,
  `odp` text NOT NULL,
  `egzamin` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `studentlogowanie`
--

CREATE TABLE `studentlogowanie` (
  `ID` char(3) NOT NULL,
  `haslo` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `studentlogowanie`
--

INSERT INTO `studentlogowanie` (`ID`, `haslo`) VALUES
('001', 'qwert'),
('002', 'zxcvb');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `nauczyciellogowanie`
--
ALTER TABLE `nauczyciellogowanie`
  ADD PRIMARY KEY (`klucz`);

--
-- Indeksy dla tabeli `studentlogowanie`
--
ALTER TABLE `studentlogowanie`
  ADD PRIMARY KEY (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
