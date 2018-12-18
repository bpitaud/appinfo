-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 19, 2018 at 09:02 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Domisep`
--

-- --------------------------------------------------------

--
-- Table structure for table `action_controleur`
--

CREATE TABLE `action_controleur` (
  `actionID` int(11) NOT NULL,
  `valeur_min` int(11) DEFAULT NULL,
  `valeur_max` int(11) NOT NULL,
  `valeur` int(11) NOT NULL,
  `controleurID` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `capteur`
--

CREATE TABLE `capteur` (
  `capteurID` varchar(15) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `type` enum('lumiere', 'camera', 'humidité', 'temperature') varchar(15) NOT NULL,
  `etat` varchar(3) NOT NULL,
  `pieceID` int(11) NOT NULL,
  FOREIGN KEY (pieceID) REFERENCES piece(pieceID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `controleur`
--

CREATE TABLE `controleur` (
  `controleurID` varchar(15) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `type` enum('chauffage')int(15) NOT NULL,
  `etat` int(3) NOT NULL,
  `pieceID` int(11) NOT NULL
  FOREIGN KEY (pieceID) REFERENCES piece(pieceID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `logement`
--

CREATE TABLE `logement` (
  `logementID` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `codepostale` int(11) NOT NULL,
  `surface` int(11) NOT NULL,
  `utilisateurID` int(11) NOT NULL,
  `pays` varchar(11) NOT NULL,
  FOREIGN KEY (utilisateurID) REFERENCES utilisateur(utilisateurID) -- Modification --
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `piece`
--

CREATE TABLE `piece` (
  `pieceID` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `surface` int(11) NOT NULL,
  `logementID` int(11) NOT NULL,
  FOREIGN KEY (logementID) REFERENCES logement(logementID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `utilisateurID` int(11) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `genre` varchar(15) NOT NULL,
  `naissance` date NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `pays` varchar(11) NOT NULL,
  `codepostale` int(11) NOT NULL,
  `mdp` varchar(200) NOT NULL,
  `administrateur` tinyint(1) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Valeur_Capteur`
--

CREATE TABLE `valeur_capteur` (
  `valeurID` int(11) NOT NULL,
  `time_update` datetime NOT NULL,
  `type` varchar(15) NOT NULL,
  `valeur` int(11) DEFAULT NULL,
  `capteurID` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `action_controleur`
--
ALTER TABLE `action_controleur`
  ADD PRIMARY KEY (`actionID`);

--
-- Indexes for table `logement`
--
ALTER TABLE `logement`
  ADD PRIMARY KEY (`logementID`);

--
-- Indexes for table `piece`
--
ALTER TABLE `piece`
  ADD PRIMARY KEY (`pieceID`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`utilisateurID`);

--
-- Indexes for table `valeur_capteur`
--
ALTER TABLE `valeur_capteur`
  ADD PRIMARY KEY (`valeurID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `action_controleur`
--
ALTER TABLE `action_controleur`
  MODIFY `actionID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Logement`
--
ALTER TABLE `logement`
  MODIFY `logementID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Pièce`
--
ALTER TABLE `piece`
  MODIFY `pieceID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `utilisateurID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Valeur_Capteur`
--
ALTER TABLE `valeur_capteur`
  MODIFY `valeurID` int(11) NOT NULL AUTO_INCREMENT;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
