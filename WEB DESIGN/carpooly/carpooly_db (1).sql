-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 01, 2024 alle 13:32
-- Versione del server: 10.4.32-MariaDB
-- Versione PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carpooly_db`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `assegna`
--

CREATE TABLE `assegna` (
  `id_viaggio` int(11) NOT NULL,
  `id_autista` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `autisti`
--

CREATE TABLE `autisti` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `N_Patente` text NOT NULL,
  `E_Patente` date NOT NULL,
  `S_Patente` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `autisti`
--

INSERT INTO `autisti` (`id`, `email`, `password`, `name`, `surname`, `birthdate`, `gender`, `N_Patente`, `E_Patente`, `S_Patente`) VALUES
(1, 'franco@autista.it', 'autista01', 'Franco', 'Calabrese', '1950-01-15', 'male', 'ABCD123456', '2024-01-15', '2034-01-14'),

-- --------------------------------------------------------

--
-- Struttura della tabella `automobile`
--

CREATE TABLE `automobile` (
  `id` int(11) NOT NULL,
  `id_autista` int(11) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `modello` varchar(50) NOT NULL,
  `anno` int(11) NOT NULL,
  `colore` varchar(50) NOT NULL,
  `targa` varchar(20) NOT NULL,
  `posti_disponibili` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `effettua`
--

CREATE TABLE `effettua` (
  `id_passeggero` int(11) NOT NULL,
  `id_prenotazione` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `id_utente` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `commento` text DEFAULT NULL,
  `valutazione` int(11) NOT NULL,
  `creato_il` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `prenotazioni`
--

CREATE TABLE `prenotazioni` (
  `id` int(11) NOT NULL,
  `id_viaggio` int(11) NOT NULL,
  `id_passeggero` int(11) NOT NULL,
  `posti_prenotati` int(11) NOT NULL,
  `creato_il` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `riceve`
--

CREATE TABLE `riceve` (
  `id_viaggio` int(11) NOT NULL,
  `id_passeggero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `surname`, `birthdate`, `gender`, `created_at`) VALUES
(1, 'marco@panetti.it', 'marcoferri', 'Marco', 'Ferri', '2005-06-06', 'male', '2024-04-30 22:01:01');

-- --------------------------------------------------------

--
-- Struttura della tabella `viaggi`
--

CREATE TABLE `viaggi` (
  `id` int(11) NOT NULL,
  `id_autista` int(11) NOT NULL,
  `partenza` varchar(255) NOT NULL,
  `destinazione` varchar(255) NOT NULL,
  `data_viaggio` date NOT NULL,
  `nPasseggeri` int(11) NOT NULL,
  `modello` varchar(255) NOT NULL,
  `targa` text NOT NULL,
  `colore` varchar(255) NOT NULL,
  `anno` date NOT NULL,
  `nPostitotale` int(11) NOT NULL,
  `nPostiDisponibili` int(11) NOT NULL,
  `creato_il` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `assegna`
--
ALTER TABLE `assegna`
  ADD PRIMARY KEY (`id_viaggio`,`id_autista`),
  ADD KEY `id_autista` (`id_autista`);

--
-- Indici per le tabelle `autisti`
--
ALTER TABLE `autisti`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `automobile`
--
ALTER TABLE `automobile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_autista` (`id_autista`);

--
-- Indici per le tabelle `effettua`
--
ALTER TABLE `effettua`
  ADD PRIMARY KEY (`id_passeggero`,`id_prenotazione`),
  ADD KEY `id_prenotazione` (`id_prenotazione`);

--
-- Indici per le tabelle `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_utente` (`id_utente`);

--
-- Indici per le tabelle `prenotazioni`
--
ALTER TABLE `prenotazioni`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_viaggio` (`id_viaggio`),
  ADD KEY `id_passeggero` (`id_passeggero`);

--
-- Indici per le tabelle `riceve`
--
ALTER TABLE `riceve`
  ADD PRIMARY KEY (`id_viaggio`,`id_passeggero`),
  ADD KEY `id_passeggero` (`id_passeggero`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `viaggi`
--
ALTER TABLE `viaggi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_autista` (`id_autista`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `autisti`
--
ALTER TABLE `autisti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT per la tabella `automobile`
--
ALTER TABLE `automobile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `prenotazioni`
--
ALTER TABLE `prenotazioni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `viaggi`
--
ALTER TABLE `viaggi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `assegna`
--
ALTER TABLE `assegna`
  ADD CONSTRAINT `assegna_ibfk_1` FOREIGN KEY (`id_viaggio`) REFERENCES `viaggi` (`id`),
  ADD CONSTRAINT `assegna_ibfk_2` FOREIGN KEY (`id_autista`) REFERENCES `autisti` (`id`);

--
-- Limiti per la tabella `automobile`
--
ALTER TABLE `automobile`
  ADD CONSTRAINT `automobile_ibfk_1` FOREIGN KEY (`id_autista`) REFERENCES `autisti` (`id`);

--
-- Limiti per la tabella `effettua`
--
ALTER TABLE `effettua`
  ADD CONSTRAINT `effettua_ibfk_1` FOREIGN KEY (`id_passeggero`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `effettua_ibfk_2` FOREIGN KEY (`id_prenotazione`) REFERENCES `prenotazioni` (`id`);

--
-- Limiti per la tabella `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`id_utente`) REFERENCES `users` (`id`);

--
-- Limiti per la tabella `prenotazioni`
--
ALTER TABLE `prenotazioni`
  ADD CONSTRAINT `prenotazioni_ibfk_1` FOREIGN KEY (`id_viaggio`) REFERENCES `viaggi` (`id`),
  ADD CONSTRAINT `prenotazioni_ibfk_2` FOREIGN KEY (`id_passeggero`) REFERENCES `users` (`id`);

--
-- Limiti per la tabella `riceve`
--
ALTER TABLE `riceve`
  ADD CONSTRAINT `riceve_ibfk_1` FOREIGN KEY (`id_viaggio`) REFERENCES `viaggi` (`id`),
  ADD CONSTRAINT `riceve_ibfk_2` FOREIGN KEY (`id_passeggero`) REFERENCES `users` (`id`);

--
-- Limiti per la tabella `viaggi`
--
ALTER TABLE `viaggi`
  ADD CONSTRAINT `viaggi_ibfk_1` FOREIGN KEY (`id_autista`) REFERENCES `autisti` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
