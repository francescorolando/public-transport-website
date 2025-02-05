-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Feb 02, 2025 alle 06:42
-- Versione del server: 10.4.32-MariaDB
-- Versione PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tbt`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `ticket`
--

CREATE TABLE `ticket` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `prezzo` decimal(10,1) NOT NULL,
  `descrizione` tinytext NOT NULL,
  `disponibilita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `ticket`
--

INSERT INTO `ticket` (`id`, `nome`, `tipo`, `prezzo`, `descrizione`, `disponibilita`) VALUES
(1, 'Singolo', 'Biglietto', 1.7, 'Valido per 100 minuti dal momento della prima convalida e da convalidare ogni qualvolta si cambi mezzo.', 400),
(2, 'Mezza giornata', 'Biglietto', 4.5, 'Valido per 6 ore dal momento della prima convalida e da convalidare ogni qualvolta si cambi mezzo.', 400),
(3, 'Giornaliero', 'Biglietto', 7.9, 'Valido per 24 ore dal momento della prima convalida e da convalidare ogni qualvolta si cambi mezzo.', 400),
(4, 'Settimanale', 'Abbonamento', 17, 'Valido fino alle ore 23:59 della domenica della settimana in cui si convalida il titolo.', 200),
(5, 'Mensile', 'Abbonamento', 38, 'Valido per 30 giorni dal momento della convalida.', 200),
(6, 'Annuale', 'Abbonamento', 310, 'Valido per 365 giorni dal momento in cui si acquista il titolo.', 200);

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cognome` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`id`, `email`, `nome`, `cognome`, `password`, `admin`) VALUES
(1, 'francesco@mail.com', 'Francesco', 'Rolando', 'francesco', 0),
(2, 'admin@mail.com', 'Francesco', 'Rolando', 'admin', 1);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT per la tabella `utenti`
--
ALTER TABLE `utenti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
