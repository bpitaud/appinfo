-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 19 déc. 2018 à 15:38
-- Version du serveur :  10.1.36-MariaDB
-- Version de PHP :  7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `domisep`
--

-- --------------------------------------------------------

--
-- Structure de la table `action_controleur`
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
-- Structure de la table `capteur`
--

CREATE TABLE `capteur` (
  `capteurID` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `type` enum('camera','humidite','temperature','lumiere') NOT NULL,
  `etat` tinyint(1) NOT NULL,
  `pieceID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `controleur`
--

CREATE TABLE `controleur` (
  `controleurID` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `type` enum('chauffage') NOT NULL,
  `etat` tinyint(1) NOT NULL,
  `pieceID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `logement`
--

CREATE TABLE `logement` (
  `logementID` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `codepostale` int(11) NOT NULL,
  `surface` int(11) NOT NULL,
  `utilisateurID` int(11) NOT NULL,
  `pays` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `piece`
--

CREATE TABLE `piece` (
  `pieceID` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `surface` int(11) NOT NULL,
  `logementID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilasteur`
--

CREATE TABLE `utilasteur` (
  `utilisateurID` int(11) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `email` varchar(250) NOT NULL,
  `genre` varchar(15) NOT NULL,
  `naissance` date NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `pays` varchar(11) NOT NULL,
  `codepostale` int(11) NOT NULL,
  `mdp` varchar(200) NOT NULL,
  `administrateur` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `valeur_capteur`
--

CREATE TABLE `valeur_capteur` (
  `valeurID` int(11) NOT NULL,
  `time_update` datetime NOT NULL,
  `type` varchar(15) NOT NULL,
  `valeur` int(11) NOT NULL,
  `capteurID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `action_controleur`
--
ALTER TABLE `action_controleur`
  ADD PRIMARY KEY (`actionID`),
  ADD KEY `controleurID` (`controleurID`);

--
-- Index pour la table `capteur`
--
ALTER TABLE `capteur`
  ADD PRIMARY KEY (`capteurID`),
  ADD KEY `pieceID` (`pieceID`);

--
-- Index pour la table `controleur`
--
ALTER TABLE `controleur`
  ADD PRIMARY KEY (`controleurID`),
  ADD KEY `pieceID` (`pieceID`);

--
-- Index pour la table `logement`
--
ALTER TABLE `logement`
  ADD PRIMARY KEY (`logementID`),
  ADD KEY `utilisateurID` (`utilisateurID`);

--
-- Index pour la table `piece`
--
ALTER TABLE `piece`
  ADD PRIMARY KEY (`pieceID`),
  ADD KEY `logementID` (`logementID`);

--
-- Index pour la table `utilasteur`
--
ALTER TABLE `utilasteur`
  ADD PRIMARY KEY (`utilisateurID`);

--
-- Index pour la table `valeur_capteur`
--
ALTER TABLE `valeur_capteur`
  ADD PRIMARY KEY (`valeurID`),
  ADD KEY `capteurID` (`capteurID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `action_controleur`
--
ALTER TABLE `action_controleur`
  MODIFY `actionID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `capteur`
--
ALTER TABLE `capteur`
  MODIFY `capteurID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `controleur`
--
ALTER TABLE `controleur`
  MODIFY `controleurID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `logement`
--
ALTER TABLE `logement`
  MODIFY `logementID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `piece`
--
ALTER TABLE `piece`
  MODIFY `pieceID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilasteur`
--
ALTER TABLE `utilasteur`
  MODIFY `utilisateurID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `valeur_capteur`
--
ALTER TABLE `valeur_capteur`
  MODIFY `valeurID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `action_controleur`
--
ALTER TABLE `action_controleur`
  ADD CONSTRAINT `action_controleur_ibfk_1` FOREIGN KEY (`controleurID`) REFERENCES `controleur` (`controleurID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `capteur`
--
ALTER TABLE `capteur`
  ADD CONSTRAINT `capteur_ibfk_1` FOREIGN KEY (`pieceID`) REFERENCES `piece` (`pieceID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `controleur`
--
ALTER TABLE `controleur`
  ADD CONSTRAINT `controleur_ibfk_1` FOREIGN KEY (`pieceID`) REFERENCES `piece` (`pieceID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `logement`
--
ALTER TABLE `logement`
  ADD CONSTRAINT `logement_ibfk_1` FOREIGN KEY (`utilisateurID`) REFERENCES `utilasteur` (`utilisateurID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `piece`
--
ALTER TABLE `piece`
  ADD CONSTRAINT `piece_ibfk_1` FOREIGN KEY (`logementID`) REFERENCES `logement` (`logementID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `valeur_capteur`
--
ALTER TABLE `valeur_capteur`
  ADD CONSTRAINT `valeur_capteur_ibfk_1` FOREIGN KEY (`capteurID`) REFERENCES `capteur` (`capteurID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
