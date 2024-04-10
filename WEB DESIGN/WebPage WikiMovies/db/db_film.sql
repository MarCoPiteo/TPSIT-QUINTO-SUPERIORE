-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql:3306
-- Creato il: Apr 10, 2024 alle 07:05
-- Versione del server: 8.0.36
-- Versione PHP: 8.2.8

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
  `id` int NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `birthday_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `actor`
--

INSERT INTO `actor` (`id`, `name`, `last_name`, `birthday_date`) VALUES
(1, 'Matthew ', 'McConaughey', '1969-11-04'),
(2, 'Jessica ', 'Chastain', '1977-03-24'),
(3, 'Anne ', 'Hathaway', '1982-11-12'),
(4, 'Timothée ', 'Chalamet', '1995-12-27'),
(5, 'Mackenzie ', 'Foy', '2000-12-10'),
(6, 'Matt ', 'Damon', '1970-10-08'),
(7, 'Michael ', 'Caine', '1933-03-14'),
(8, 'Casey ', 'Affleck', '1975-08-12'),
(9, 'Scarlett ', 'Johansson', '1984-11-22'),
(10, 'Jeremy', 'Renner', '1971-01-07'),
(11, 'Chris', 'Evans', '1981-06-13'),
(12, 'Mark', 'Ruffalo', '1967-11-22'),
(13, 'Cobie ', 'Smulders', '1982-04-03'),
(14, 'Robert', 'Downey Jr.', '1965-04-04'),
(15, 'Chris', 'Hemsworth', '1983-08-11'),
(17, 'Tom', 'Hiddleston', '1981-02-09'),
(18, 'Samuel', 'L. Jackson', '1948-12-21'),
(19, 'Clark', 'Gregg', '1962-04-02'),
(20, 'Paul', 'Rudd', '1969-04-06'),
(21, 'Brie', 'Larson', '1989-10-01'),
(22, 'Don', 'Cheadle', '1964-11-29'),
(23, 'Chadwick', 'Boseman', '1976-11-29'),
(24, 'Tom', 'Holland', '1996-06-01'),
(25, 'Stellan', 'Skarsgård', '1951-06-13'),
(26, 'Gwyneth', 'Paltrow', '1972-09-27'),
(27, 'Paul', 'Bettany', '1971-05-27'),
(28, 'Alexis', 'Denisof', '1966-02-25'),
(31, 'Aaron', 'Taylor-Johnson', '1990-06-13'),
(32, 'Hayley', 'Atwell', '1982-04-05');

-- --------------------------------------------------------

--
-- Struttura della tabella `director`
--

CREATE TABLE `director` (
  `id` int NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `birthday_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `director`
--

INSERT INTO `director` (`id`, `name`, `last_name`, `birthday_date`) VALUES
(1, 'Christopher ', 'Nolan', '1970-07-30'),
(2, 'Joss', 'Whedon', '2064-06-23');

-- --------------------------------------------------------

--
-- Struttura della tabella `genre`
--

CREATE TABLE `genre` (
  `id` int NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `genre`
--

INSERT INTO `genre` (`id`, `name`, `slug`) VALUES
(1, 'Adventure', NULL),
(2, 'Sci-fi', NULL),
(3, 'Action', NULL),
(4, 'Fantastic Cinema ', NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `movie`
--

CREATE TABLE `movie` (
  `id` int NOT NULL,
  `synopsis` text COLLATE utf8mb4_general_ci,
  `title` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `duration` int NOT NULL,
  `released_year` year NOT NULL,
  `poster` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `movie`
--

INSERT INTO `movie` (`id`, `synopsis`, `title`, `duration`, `released_year`, `poster`) VALUES
(1, 'In an unspecified future, drastic climate change will hit agriculture hard. Corn is the only crop still capable of growing and a group of scientists intends to cross space to find new places suitable for growing it.', 'Interstellar', 169, '2014', 'https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcTKNvN1d8BSJPWenCvCOx2oOTDYqBSzjLkuDplC6Iw89KZONqnk'),
(2, 'Legendary superheroes Iron Man, Hulk, Thor, Captain America, Hawkeye and Black Widow are recruited by a secret government agency to fight an unexpected enemy that threatens the safety of Earth.', 'The Avengers', 143, '2012', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQfj-Xxr1DlcuFjU4Nj0ZHm2rmEn0e7BBU0xQZzQedaWODnFw7Q');

-- --------------------------------------------------------

--
-- Struttura della tabella `movie_actor`
--

CREATE TABLE `movie_actor` (
  `movie_id` int DEFAULT NULL,
  `actor_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `movie_actor`
--

INSERT INTO `movie_actor` (`movie_id`, `actor_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(2, 9),
(2, 10),
(2, 11),
(2, 12),
(2, 13),
(2, 14),
(2, 15),
(2, 17),
(2, 18),
(2, 19),
(2, 20),
(2, 21),
(2, 22),
(2, 23),
(2, 24),
(2, 25),
(2, 26),
(2, 28),
(2, 28),
(2, 31),
(2, 32);

-- --------------------------------------------------------

--
-- Struttura della tabella `movie_director`
--

CREATE TABLE `movie_director` (
  `movie_id` int DEFAULT NULL,
  `director_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `movie_director`
--

INSERT INTO `movie_director` (`movie_id`, `director_id`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Struttura della tabella `movie_genre`
--

CREATE TABLE `movie_genre` (
  `movie_id` int DEFAULT NULL,
  `genre_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `movie_genre`
--

INSERT INTO `movie_genre` (`movie_id`, `genre_id`) VALUES
(1, 1),
(1, 2),
(2, 3),
(2, 4);

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT per la tabella `director`
--
ALTER TABLE `director`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `movie`
--
ALTER TABLE `movie`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
