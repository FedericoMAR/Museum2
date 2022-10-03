-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 03 oct. 2022 à 21:09
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `museo_it`
--

-- --------------------------------------------------------

--
-- Structure de la table `computer`
--

CREATE TABLE `computer` (
  `ID` int(5) NOT NULL,
  `nome_modello` varchar(50) NOT NULL,
  `anno` int(4) NOT NULL,
  `CPU` varchar(20) NOT NULL,
  `velocita_MHz` varchar(20) NOT NULL,
  `RAM_MB` varchar(20) NOT NULL,
  `dim_hard_disk_MB` varchar(20) DEFAULT NULL,
  `OS` varchar(50) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `URL_appr` varchar(2048) DEFAULT NULL,
  `tag` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `computer`
--

INSERT INTO `computer` (`ID`, `nome_modello`, `anno`, `CPU`, `velocita_MHz`, `RAM_MB`, `dim_hard_disk_MB`, `OS`, `note`, `URL_appr`, `tag`) VALUES
(1, 'Atari ST', 1985, 'Motorola 680x0', '8', '1 ', '20', 'Digital Research\'s GEM on Atari TOS', NULL, NULL, NULL),
(2, 'Altair 8800', 1975, 'Intel 8080', '2', '0,064', '0,800', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `libro`
--

CREATE TABLE `libro` (
  `ID` int(5) NOT NULL,
  `titolo` varchar(100) NOT NULL,
  `autori` varchar(100) NOT NULL,
  `casa_editrice` varchar(100) NOT NULL,
  `anno_pubbl` int(4) NOT NULL,
  `numero_pagine` int(5) DEFAULT NULL,
  `ISBN` varchar(13) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `URL_appr` varchar(2048) DEFAULT NULL,
  `tag` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `periferica`
--

CREATE TABLE `periferica` (
  `ID` int(5) NOT NULL,
  `nome_modello` varchar(50) NOT NULL,
  `tipologia` varchar(50) NOT NULL,
  `note` text DEFAULT NULL,
  `URL_appr` varchar(2048) DEFAULT NULL,
  `tag` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `rivista`
--

CREATE TABLE `rivista` (
  `ID` int(5) NOT NULL,
  `titolo` varchar(100) NOT NULL,
  `numero_rivista` int(5) NOT NULL,
  `anno` int(4) NOT NULL,
  `casa_editrice` varchar(100) NOT NULL,
  `note` text DEFAULT NULL,
  `URL_appr` varchar(2048) DEFAULT NULL,
  `tag` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `software`
--

CREATE TABLE `software` (
  `ID` int(5) NOT NULL,
  `titolo` varchar(100) NOT NULL,
  `OS` varchar(50) NOT NULL,
  `tipologia` varchar(50) NOT NULL,
  `supporto` varchar(50) NOT NULL,
  `note` text DEFAULT NULL,
  `URL_appr` varchar(2048) DEFAULT NULL,
  `tag` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `software`
--

INSERT INTO `software` (`ID`, `titolo`, `OS`, `tipologia`, `supporto`, `note`, `URL_appr`, `tag`) VALUES
(1, 'Paint', 'Windows', 'Immagini', 'DVD', NULL, NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `computer`
--
ALTER TABLE `computer`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `periferica`
--
ALTER TABLE `periferica`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `rivista`
--
ALTER TABLE `rivista`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `software`
--
ALTER TABLE `software`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `computer`
--
ALTER TABLE `computer`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `libro`
--
ALTER TABLE `libro`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `periferica`
--
ALTER TABLE `periferica`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `rivista`
--
ALTER TABLE `rivista`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `software`
--
ALTER TABLE `software`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
