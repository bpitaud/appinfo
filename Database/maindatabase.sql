-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  lun. 21 jan. 2019 à 08:57
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `nom` varchar(20) NOT NULL,
  `capteurID` varchar(200) NOT NULL,
  `typ` enum('lumiere','camera','humidite','temperature') NOT NULL,
  `pieceID` varchar(200) NOT NULL,
  `etat` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `capteur`
--

INSERT INTO `capteur` (`nom`, `capteurID`, `typ`, `pieceID`, `etat`) VALUES
('température', '24091997', 'temperature', '35', 1),
('alarme entree', '468086431', 'camera', '5c38f2a15fe26', 1),
('Ampoule cuisine', '6798643', 'lumiere', '5c38f2a15fe26', 0),
('humidite', '9876534', 'humidite', '5c38f2a15fe26', 1);

-- --------------------------------------------------------

--
-- Structure de la table `controleur`
--

CREATE TABLE `controleur` (
  `controleurID` varchar(200) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `typ` enum('chauffage') NOT NULL,
  `etat` int(6) NOT NULL,
  `pieceID` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `controleur`
--

INSERT INTO `controleur` (`controleurID`, `nom`, `typ`, `etat`, `pieceID`) VALUES
('998643345', 'chauffage', 'chauffage', 0, '5c38f2a15fe26');

-- --------------------------------------------------------

--
-- Structure de la table `logement`
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
-- Déchargement des données de la table `logement`
--

INSERT INTO `logement` (`logementID`, `nom`, `adresse`, `codepostale`, `surface`, `utilisateurID`, `pays`) VALUES
('21', 'espagne', '32 rue de la cloche', 44123, 150, 5, 'France'),
('5c20fe562474c', 'Rueil', '206 Avenue paul doumer', 35782, 6000, 2, 'france'),
('5c2f3f5d84bd2', 'Méribel', '206 Avenue paul doumer', 35782, 6000, 2, 'france'),
('5c2f6d305292d', 'Meribel', '206 Avenue paul doumer', 35782, 6000, 4, 'france'),
('5c434a09074ef', 'Sa Riera', 'le plateau', 35782, 500, 2, 'france');

-- --------------------------------------------------------

--
-- Structure de la table `piece`
--

CREATE TABLE `piece` (
  `pieceID` varchar(200) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `surface` int(11) NOT NULL,
  `logementID` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `piece`
--

INSERT INTO `piece` (`pieceID`, `nom`, `surface`, `logementID`) VALUES
('35', 'salle à manger', 21, '21'),
('5c38f2a15fe26', 'salle à manger', 28, '5c20fe562474c'),
('5c3dfb5c5c57c', 'bureau', 15, '5c20fe562474c'),
('5c40f727ca149', 'toilette', 140, '5c20fe562474c'),
('5c4224c79b504', 'salle de bain', 16, '5c20fe562474c'),
('5c432ba454a97', 'salle à manger', 15, '5c20fe562474c'),
('5c434a2932bc5', 'Buanderie', 15, '5c20fe562474c');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `utilisateurID` int(11) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `email` varchar(250) NOT NULL,
  `genre` varchar(15) NOT NULL,
  `naissance` varchar(200) DEFAULT NULL,
  `telephone` varchar(15) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `pays` varchar(11) NOT NULL,
  `codepostale` int(11) DEFAULT NULL,
  `mdp` varchar(200) NOT NULL,
  `administrateur` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`utilisateurID`, `nom`, `prenom`, `email`, `genre`, `naissance`, `telephone`, `adresse`, `pays`, `codepostale`, `mdp`, `administrateur`) VALUES
(2, 'Bruzeau', 'Charlotte', 'charlotte.bruzeau@yahoo.fr', 'masculin', '24/09/1997', '0662022527', 'le plateau', 'france', 72800, '$2y$10$FZxW2sdww0D20YCs3Pf3TOsWnTGLtYBIfFkLYo1FWyrnA/paPwDyS', 0),
(4, 'du Besset', 'Augustin', 'charlotte.bruzeau@gmail.com', 'feminin', '1998-08-23', '0662022527', '206 Avenue paul doumer', 'france', 92500, '$2y$10$Mo5qYhOBJ89QSb7HIWffu.75gcnTrWqJhwvZkcltW1CM.dYfS4wTG', 1),
(5, 'Denis-le-Sève', 'julien', 'louisdls@gmail.com', 'masculin', '12 mai 1998', '0677905007', '12 rue du boulanger', 'France', 44123, 'louis', 0),
(13, 'Bruzeau', 'Haude', 'haudebruzeau@yahoo.fr', 'feminin', '12 mai 1997', '0663792528', '206 Avenue paul doumer', 'italie', 75016, '$2y$10$7CbOh9SJliGrSIpF3v5NjOWggUjd4Xy4cDypY5q.GRPWHQseeqtUK', 0),
(14, 'du Besset', 'Augustin', 'augustindubesset@sfr.fr', 'masculin', '12 mai 1997', '0662022527', 'le plateau', 'france', 35782, '$2y$10$SJlrJfNOUgCrenPZGbYd6OmUJt4kPHHaeVXVdikeJl7kFByBPrwf2', 0);

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
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
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
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `utilisateurID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `valeur_capteur`
--
ALTER TABLE `valeur_capteur`
  MODIFY `valeurID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

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
  ADD CONSTRAINT `logement_ibfk_1` FOREIGN KEY (`utilisateurID`) REFERENCES `utilisateur` (`utilisateurID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `piece`
--
ALTER TABLE `piece`
  ADD CONSTRAINT `piece_ibfk_1` FOREIGN KEY (`logementID`) REFERENCES `logement` (`logementID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
