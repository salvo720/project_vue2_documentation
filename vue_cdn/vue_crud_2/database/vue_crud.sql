-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Feb 27, 2022 alle 21:37
-- Versione del server: 8.0.18
-- Versione PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vue_crud`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`) VALUES
(1, 'wolf', 'wolfmania@gmail.com', '123456'),
(2, 'wolf_2', 'wolfmania_2@gmail.com', '123456'),
(3, 'wolf_3', 'wolfmania_3@gmail.com', '123456'),
(4, 'wolf_4', 'wolfmania_4@gmail.com', '123456'),
(5, 'wolf_5', 'wolfmania_5@gmail.com', '123456'),
(6, 'wolf_6', 'wolfmania_6@gmail.com', '123456'),
(7, 'wolf_7', 'wolfmania_7@gmail.com', '123456'),
(8, 'wolf_8', 'wolfmania_8@gmail.com', '123456'),
(9, 'wolf_9', 'wolfmania_9@gmail.com', '123456'),
(10, 'wolf_10', 'wolfmania_10@gmail.com', '123456'),
(17, 'asd', 'asd', '213'),
(18, 'asd', 'asd2', '213');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
