-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  mer. 23 jan. 2019 à 14:21
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
('alarme entree', '468086431', 'camera', '5c38f2a15fe26', 1),
('Ampoule cuisine', '6798643', 'lumiere', '5c38f2a15fe26', 1),
('humidite', '9876534', 'humidite', '5c38f2a15fe26', 1),
('température', '9876543456', 'temperature', '5c38f2a15fe26', 1);

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
('0987654', 'chauffage', 'chauffage', 1, '5c38f2a15fe26');

-- --------------------------------------------------------

--
-- Structure de la table `logement`
--

CREATE TABLE `logement` (
  `logementID` varchar(200) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `codepostale` int(11) DEFAULT NULL,
  `surface` int(11) NOT NULL,
  `utilisateurID` varchar(200) NOT NULL,
  `pays` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `logement`
--

INSERT INTO `logement` (`logementID`, `nom`, `adresse`, `codepostale`, `surface`, `utilisateurID`, `pays`) VALUES
('5c20fe562474c', 'Paris', '206 Avenue paul doumer', 35782, 60975, '2', 'france'),
('5c2f6d305292d', 'Meribel', '206 Avenue paul doumer', 35782, 6000, '4', 'france'),
('5c45f1b16b732', 'Rueil', 'le plateau', 35782, 4000, '2', 'france'),
('5c475360049b9', 'Sa Riera', 'le plateau', 35782, 4000, '2', 'france'),
('5c4764365dc2a', 'Mériblel', 'le plateau', 35782, 400, '2', 'france'),
('5c47644f324c3', 'zeuhozr', 'zierhizeor', 1887, 17899, '2', 'france');

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
('5c38f2a15fe26', 'salle à manger', 350, '5c20fe562474c'),
('5c3dfb5c5c57c', 'bureau', 15, '5c20fe562474c'),
('5c4224c79b504', 'salle de bain', 16, '5c20fe562474c'),
('5c432ba454a97', 'salle à manger', 15, '5c20fe562474c');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `utilisateurID` varchar(200) NOT NULL,
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
('13', 'Bruzeau', 'Haude', 'haudebruzeau@yahoo.fr', 'feminin', '12 mai 1997', '0663792528', '206 Avenue paul doumer', 'italie', 75016, '$2y$10$7CbOh9SJliGrSIpF3v5NjOWggUjd4Xy4cDypY5q.GRPWHQseeqtUK', 0),
('14', 'du Besset', 'Augustin', 'augustindubesset@sfr.fr', 'masculin', '12 mai 1997', '0662022527', 'le plateau', 'france', 35782, '$2y$10$SJlrJfNOUgCrenPZGbYd6OmUJt4kPHHaeVXVdikeJl7kFByBPrwf2', 0),
('2', 'Bruzeau', 'Camille', 'charlotte.bruzeau@yahoo.fr', 'masculin', '24/09/1997', '0663792527', '206 Avenue paul doumer', 'france', 36000, '$2y$10$f74hW2pBIbHEP/zkRfU.WuAJCTD5H3Du6.03avnYNMVxdAF/Buagm', 0),
('4', 'du Besset', 'Augustin', 'charlotte.bruzeau@gmail.com', 'feminin', '1998-08-23', '0662022527', '206 Avenue paul doumer', 'france', 92500, '$2y$10$Mo5qYhOBJ89QSb7HIWffu.75gcnTrWqJhwvZkcltW1CM.dYfS4wTG', 1),
('5c486f4213939', 'Berton', 'Léo', 'leoantoineberton@gmail.com', 'masculin', '16 juillet 1997', '0637462538', '206 Avenue paul doumer', 'italie', 78420, '$2y$10$suvSEV.ZD0L1lbmEUM9PKOZ.7YTNQTs1Uz9QExPN1JjPI6kmvSSWW', 0);

--
-- Index pour les tables déchargées
--

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
