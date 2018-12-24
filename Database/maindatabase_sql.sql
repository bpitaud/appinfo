-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 24, 2018 at 10:23 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `domisep`
--

-- --------------------------------------------------------

--
-- Table structure for table `action_controleur`
--

CREATE TABLE `action_controleur` (
  `actionID` int(11) NOT NULL,
  `valeur_min` int(11) NOT NULL,
  `valeur_max` int(11) NOT NULL,
  `valeur` int(11) NOT NULL,
  `controleurID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `capteur`
--

CREATE TABLE `capteur` (
  `nom` varchar(20) NOT NULL,
  `capteurID` int(11) NOT NULL,
  `typ` enum('lumiere','camera','humidite','temperature') NOT NULL,
  `pieceID` varchar(200) NOT NULL,
  `etat` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `controleur`
--

CREATE TABLE `controleur` (
  `controleurID` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `typ` enum('chauffage') NOT NULL,
  `etat` tinyint(1) NOT NULL,
  `pieceID` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `logement`
--

CREATE TABLE `logement` (
  `logementID` varchar(200) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `codepostale` int(11) NOT NULL,
  `surface` int(11) NOT NULL,
  `utilisateurID` int(11) NOT NULL,
  `pays` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logement`
--

INSERT INTO `logement` (`logementID`, `nom`, `adresse`, `codepostale`, `surface`, `utilisateurID`, `pays`) VALUES
('5c20a7f2826e6', 'Meribel', '206 Avenue paul doumer', 35782, 140, 2, 'france');

-- --------------------------------------------------------

--
-- Table structure for table `piece`
--

CREATE TABLE `piece` (
  `pieceID` varchar(200) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `surface` int(11) NOT NULL,
  `logementID` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `utilisateurID` int(11) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `email` varchar(250) NOT NULL,
  `genre` varchar(15) NOT NULL,
  `naissance` date DEFAULT NULL,
  `telephone` varchar(15) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `pays` varchar(11) NOT NULL,
  `codepostale` int(11) DEFAULT NULL,
  `mdp` varchar(200) NOT NULL,
  `administrateur` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`utilisateurID`, `nom`, `prenom`, `email`, `genre`, `naissance`, `telephone`, `adresse`, `pays`, `codepostale`, `mdp`, `administrateur`) VALUES
(2, 'Bruzeau', 'Emma', 'charlotte.bruzeau@yahoo.fr', 'genre', '1998-06-24', '0663792527', 'zerze', 'pays', 35782, '$2y$10$RVJ.gILbU2f8FKOaDppauOvOUgWaNfO748MfhXNXevWRyMljU7WX6', 0),
(3, 'Bruzeau', 'Charlotte', 'charlotte.bruzeau@gmail.com', 'feminin', '1998-09-14', '0663792528', '206 Avenue paul doumer', 'royaume-Uni', 35782, '$2y$10$V3Ladt0018QShypANEgx7upg6o2iqoSqygzY1oRrY04zn2XZQ076C', 0);

-- --------------------------------------------------------

--
-- Table structure for table `valeur_capteur`
--

CREATE TABLE `valeur_capteur` (
  `valeurID` int(11) NOT NULL,
  `time_update` datetime NOT NULL,
  `type` varchar(15) NOT NULL,
  `valeur` int(11) NOT NULL,
  `capteurID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `action_controleur`
--
ALTER TABLE `action_controleur`
  ADD PRIMARY KEY (`actionID`),
  ADD KEY `controleurID` (`controleurID`);

--
-- Indexes for table `capteur`
--
ALTER TABLE `capteur`
  ADD PRIMARY KEY (`capteurID`),
  ADD KEY `pieceID` (`pieceID`);

--
-- Indexes for table `controleur`
--
ALTER TABLE `controleur`
  ADD PRIMARY KEY (`controleurID`),
  ADD KEY `pieceID` (`pieceID`);

--
-- Indexes for table `logement`
--
ALTER TABLE `logement`
  ADD PRIMARY KEY (`logementID`),
  ADD KEY `utilisateurID` (`utilisateurID`);

--
-- Indexes for table `piece`
--
ALTER TABLE `piece`
  ADD PRIMARY KEY (`pieceID`),
  ADD KEY `logementID` (`logementID`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`utilisateurID`);

--
-- Indexes for table `valeur_capteur`
--
ALTER TABLE `valeur_capteur`
  ADD PRIMARY KEY (`valeurID`),
  ADD KEY `capteurID` (`capteurID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `action_controleur`
--
ALTER TABLE `action_controleur`
  MODIFY `actionID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `utilisateurID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `valeur_capteur`
--
ALTER TABLE `valeur_capteur`
  MODIFY `valeurID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `action_controleur`
--
ALTER TABLE `action_controleur`
  ADD CONSTRAINT `action_controleur_ibfk_1` FOREIGN KEY (`controleurID`) REFERENCES `controleur` (`controleurID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `capteur`
--
ALTER TABLE `capteur`
  ADD CONSTRAINT `capteur_ibfk_1` FOREIGN KEY (`pieceID`) REFERENCES `piece` (`pieceID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `controleur`
--
ALTER TABLE `controleur`
  ADD CONSTRAINT `controleur_ibfk_1` FOREIGN KEY (`pieceID`) REFERENCES `piece` (`pieceID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `logement`
--
ALTER TABLE `logement`
  ADD CONSTRAINT `logement_ibfk_1` FOREIGN KEY (`utilisateurID`) REFERENCES `utilisateur` (`utilisateurID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `piece`
--
ALTER TABLE `piece`
  ADD CONSTRAINT `piece_ibfk_1` FOREIGN KEY (`logementID`) REFERENCES `logement` (`logementID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `valeur_capteur`
--
ALTER TABLE `valeur_capteur`
  ADD CONSTRAINT `valeur_capteur_ibfk_1` FOREIGN KEY (`capteurID`) REFERENCES `capteur` (`capteurID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
