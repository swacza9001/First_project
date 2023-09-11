-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Pon 11. zář 2023, 14:32
-- Verze serveru: 10.4.28-MariaDB
-- Verze PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `insurance_db`
--
CREATE DATABASE IF NOT EXISTS `insurance_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_czech_ci;
USE `insurance_db`;

-- --------------------------------------------------------

--
-- Struktura tabulky `insured`
--

DROP TABLE IF EXISTS `insured`;
CREATE TABLE `insured` (
  `insured_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `phone_number` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `insured`
--

INSERT INTO `insured` (`insured_id`, `name`, `surname`, `age`, `phone_number`) VALUES
(47, 'Tomáš', 'Swaczyna', 33, '+605004167');

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `insured`
--
ALTER TABLE `insured`
  ADD PRIMARY KEY (`insured_id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `insured`
--
ALTER TABLE `insured`
  MODIFY `insured_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
