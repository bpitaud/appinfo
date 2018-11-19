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
-- Table structure for table `Action_controleur`
--

CREATE TABLE `Action_controleur` (
  `ID_action` int(11) NOT NULL,
  `valeur_min` int(11) DEFAULT NULL,
  `valeur_max` int(11) NOT NULL,
  `valeur` int(11) NOT NULL,
  `ID_controleur` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `capteur`
--

CREATE TABLE `capteur` (
  `ID_capteur` varchar(15) NOT NULL,
  `Nom` varchar(20) NOT NULL,
  `Type` varchar(15) NOT NULL,
  `Etat` varchar(3) NOT NULL,
  `ID_pièce` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `controleur`
--

CREATE TABLE `controleur` (
  `ID_controleur` varchar(15) NOT NULL,
  `Nom` varchar(20) NOT NULL,
  `Type` int(15) NOT NULL,
  `Etat` int(3) NOT NULL,
  `ID_pièce` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Logement`
--

CREATE TABLE `Logement` (
  `ID_logement` int(11) NOT NULL,
  `Nom` varchar(15) NOT NULL,
  `Adresse` varchar(100) NOT NULL,
  `codepostale` int(11) NOT NULL,
  `surface` int(11) NOT NULL,
  `ID_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Pièce`
--

CREATE TABLE `Pièce` (
  `ID_pièce` int(11) NOT NULL,
  `Nom` varchar(20) NOT NULL,
  `Superficie` int(11) NOT NULL,
  `ID_Logement` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `ID_utilisateur` int(11) NOT NULL,
  `Prénom` varchar(20) NOT NULL,
  `Nom` varchar(25) NOT NULL,
  `adressemail` varchar(255) NOT NULL,
  `téléphone` varchar(15) NOT NULL,
  `naissance` date NOT NULL,
  `motdepasse` varchar(12) NOT NULL,
  `Admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Valeur_Capteur`
--

CREATE TABLE `Valeur_Capteur` (
  `ID_valeur` int(11) NOT NULL,
  `Time_update` datetime NOT NULL,
  `Type` varchar(15) NOT NULL,
  `Valeur` int(11) DEFAULT NULL,
  `ID_capteur` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Action_controleur`
--
ALTER TABLE `Action_controleur`
  ADD PRIMARY KEY (`ID_action`);

--
-- Indexes for table `capteur`
--
ALTER TABLE `capteur`
  ADD PRIMARY KEY (`ID_capteur`);

--
-- Indexes for table `controleur`
--
ALTER TABLE `controleur`
  ADD PRIMARY KEY (`ID_controleur`);

--
-- Indexes for table `Logement`
--
ALTER TABLE `Logement`
  ADD PRIMARY KEY (`ID_logement`);

--
-- Indexes for table `Pièce`
--
ALTER TABLE `Pièce`
  ADD PRIMARY KEY (`ID_pièce`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`ID_utilisateur`);

--
-- Indexes for table `Valeur_Capteur`
--
ALTER TABLE `Valeur_Capteur`
  ADD PRIMARY KEY (`ID_valeur`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Action_controleur`
--
ALTER TABLE `Action_controleur`
  MODIFY `ID_action` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Logement`
--
ALTER TABLE `Logement`
  MODIFY `ID_logement` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Pièce`
--
ALTER TABLE `Pièce`
  MODIFY `ID_pièce` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `ID_utilisateur` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Valeur_Capteur`
--
ALTER TABLE `Valeur_Capteur`
  MODIFY `ID_valeur` int(11) NOT NULL AUTO_INCREMENT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
