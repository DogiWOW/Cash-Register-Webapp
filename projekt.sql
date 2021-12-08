-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 08 Gru 2021, 15:42
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
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id` int(11) NOT NULL,
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
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
