-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Apr 04, 2024 alle 08:48
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
-- Database: `db_film`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `actor`
--

CREATE TABLE `actor` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `birthday_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `director`
--

CREATE TABLE `director` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `birthday_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `genre`
--

CREATE TABLE `genre` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `slug` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `movie`
--

CREATE TABLE `movie` (
  `id` int(11) NOT NULL,
  `synopsis` text DEFAULT NULL,
  `title` varchar(128) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `released_year` date DEFAULT NULL,
  `poster` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `movie_actor`
--

CREATE TABLE `movie_actor` (
  `movie_id` int(11) DEFAULT NULL,
  `actor_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `movie_director`
--

CREATE TABLE `movie_director` (
  `movie_id` int(11) DEFAULT NULL,
  `director_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `movie_genre`
--

CREATE TABLE `movie_genre` (
  `movie_id` int(11) DEFAULT NULL,
  `genre_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `actor`
--
ALTER TABLE `actor`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `director`
--
ALTER TABLE `director`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `movie_actor`
--
ALTER TABLE `movie_actor`
  ADD KEY `movie_id` (`movie_id`),
  ADD KEY `actor_id` (`actor_id`);

--
-- Indici per le tabelle `movie_director`
--
ALTER TABLE `movie_director`
  ADD KEY `movie_id` (`movie_id`),
  ADD KEY `director_id` (`director_id`);

--
-- Indici per le tabelle `movie_genre`
--
ALTER TABLE `movie_genre`
  ADD KEY `movie_id` (`movie_id`),
  ADD KEY `genre_id` (`genre_id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `actor`
--
ALTER TABLE `actor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `director`
--
ALTER TABLE `director`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `movie`
--
ALTER TABLE `movie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `movie_actor`
--
ALTER TABLE `movie_actor`
  ADD CONSTRAINT `movie_actor_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`id`),
  ADD CONSTRAINT `movie_actor_ibfk_2` FOREIGN KEY (`actor_id`) REFERENCES `actor` (`id`);

--
-- Limiti per la tabella `movie_director`
--
ALTER TABLE `movie_director`
  ADD CONSTRAINT `movie_director_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`id`),
  ADD CONSTRAINT `movie_director_ibfk_2` FOREIGN KEY (`director_id`) REFERENCES `director` (`id`);

--
-- Limiti per la tabella `movie_genre`
--
ALTER TABLE `movie_genre`
  ADD CONSTRAINT `movie_genre_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`id`),
  ADD CONSTRAINT `movie_genre_ibfk_2` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
