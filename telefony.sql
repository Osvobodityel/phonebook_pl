-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 02 Mar 2022, 11:20
-- Wersja serwera: 10.4.11-MariaDB
-- Wersja PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `telefony`
--
CREATE DATABASE IF NOT EXISTS `telefony` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `telefony`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `telefony`
--

CREATE TABLE `telefony` (
  `Id_telefony` int(11) NOT NULL,
  `Imie` varchar(20) NOT NULL,
  `Nazwisko` varchar(30) NOT NULL,
  `Telefon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `telefony`
--

INSERT INTO `telefony` (`Id_telefony`, `Imie`, `Nazwisko`, `Telefon`) VALUES
(142, 'Bogdan', 'Pacyniak', '123-543-990'),
(143, 'Anna', 'Kocimiętkowska', '666-345-222'),
(152, 'Vladimir', 'Putinas', '666-666-666'),
(165, 'Jan', 'Borutas', '666-111-222');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `telefony`
--
ALTER TABLE `telefony`
  ADD PRIMARY KEY (`Id_telefony`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `telefony`
--
ALTER TABLE `telefony`
  MODIFY `Id_telefony` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
