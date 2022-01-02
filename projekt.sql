-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 02 Sty 2022, 11:07
-- Wersja serwera: 10.4.22-MariaDB
-- Wersja PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `projekt`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klienci`
--

CREATE TABLE `klienci` (
  `id` int(2) NOT NULL,
  `imie` varchar(15) NOT NULL,
  `nazwisko` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pracownicy`
--

CREATE TABLE `pracownicy` (
  `id` int(2) NOT NULL,
  `imie` varchar(20) NOT NULL,
  `nazwisko` varchar(20) NOT NULL,
  `pesel` varchar(11) NOT NULL,
  `nip` varchar(13) NOT NULL,
  `pensja` int(4) NOT NULL,
  `staz` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `pracownicy`
--

INSERT INTO `pracownicy` (`id`, `imie`, `nazwisko`, `pesel`, `nip`, `pensja`, `staz`) VALUES
(1, 'Tomasz', 'Kowalski', '81071243536', '125-523-41-63', 3100, 7),
(2, 'Wiktoria', 'Orzechowska', '87021457426', '763-174-89-47', 4500, 3),
(3, 'Patrycja', 'Nowak', '87081243447', '845-326-64-25', 3000, 5),
(4, 'Piotr', 'Szewczyk', '83011243272', '647-852-15-36', 2400, 10),
(5, 'Robert', 'Szymanski', '85050344216', '642-515-75-35', 4200, 1),
(6, 'Marcin', 'Wisniewski', '75081761753', '857-534-73-15', 5000, 15),
(7, 'Alicja', 'Kowalczyk', '89052153521', '647-378-83-58', 4700, 11),
(8, 'Katarzyna', 'Zalewska', '90051653561', '745-743-84-43', 2200, 8),
(9, 'Marcin', 'Ostrowski', '85110748914', '835-674-74-25', 4300, 7),
(10, 'Kamil', 'Nowakowski', '83041548279', '647-184-37-29', 4600, 9);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id` int(2) NOT NULL,
  `imie` varchar(15) DEFAULT NULL,
  `nazwisko` varchar(15) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `login` varchar(30) DEFAULT NULL,
  `haslo` varchar(20) DEFAULT NULL,
  `administrator` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `imie`, `nazwisko`, `email`, `login`, `haslo`, `administrator`) VALUES
(1, 'Grzegorz', 'Kowalski', 'grze326@interia.pl', 'grzegorzk', 'gjd83kf9', 0),
(2, 'Alicja', 'Kwiatkowska', 'alikwi613@wp.pl', 'kwiatk135', 'gj48fj39d', 0),
(3, 'Robert', 'Nowak', 'nowro533@onet.pl', 'nowak12351', 'f34h893', 1),
(4, 'Gabriela', 'Piotrkowska', 'piotra32@gmail.com', 'gabipiotr1314', '3c525vb5', 0),
(5, 'Ewelina', 'Korzeniowska', 'korze533@wp.pl', 'korz515', 'gv34mi9', 0),
(6, 'Damian', 'Zielinski', 'ziela254@gmail.com', 'zieldam2341', '54ybwwb46', 0),
(7, 'Karolina', 'Pocztowska', 'karpocz131@interia.pl', 'poczt4144', '523b5v35', 0),
(8, 'Kamil', 'Michalski', 'michal43@o2.pl', 'michkam413', 'gbj903ge54y', 0),
(9, 'Justyna', 'Jaworska', 'jawor32@onet.pl', 'justynaj21', 'f344v6364', 0),
(10, 'Emil', 'Malinowski', 'malina52@gmail.com', 'emilmal51', 'v535b533', 0);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `pracownicy`
--
ALTER TABLE `pracownicy`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
