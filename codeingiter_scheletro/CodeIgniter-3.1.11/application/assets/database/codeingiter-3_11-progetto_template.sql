-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Ago 01, 2022 alle 17:49
-- Versione del server: 8.0.28
-- Versione PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codeingiter-3.11-progetto_template`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `elemento`
--

CREATE TABLE `elemento` (
  `id` int NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `descrizione` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `tipologia` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `quantita` int NOT NULL,
  `prezzo` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `elemento`
--

INSERT INTO `elemento` (`id`, `nome`, `descrizione`, `tipologia`, `quantita`, `prezzo`) VALUES
(1, 'patate', 'patate', 'dop', 100, 20.29),
(2, 'mele', 'mele', 'frutta', 100, 20.8),
(3, 'cipolla', 'cipolla', 'hawaiana', 22, 11),
(4, 'fragole', 'fragole dei macedoni', 'fragole dop', 22, 16);

-- --------------------------------------------------------

--
-- Struttura della tabella `produttori`
--

CREATE TABLE `produttori` (
  `id` int NOT NULL,
  `nome_produttore` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `partita_iva_produttore` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `id_element` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `produttori`
--

INSERT INTO `produttori` (`id`, `nome_produttore`, `partita_iva_produttore`, `id_element`) VALUES
(1, 'patate fresche', 'asd', 1),
(2, 'mele per tutti', 'asd', 2);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `elemento`
--
ALTER TABLE `elemento`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `produttori`
--
ALTER TABLE `produttori`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `elemento`
--
ALTER TABLE `elemento`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `produttori`
--
ALTER TABLE `produttori`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
