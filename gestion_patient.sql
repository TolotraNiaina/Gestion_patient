-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 11 avr. 2025 à 08:13
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_patient`
--

-- --------------------------------------------------------

--
-- Structure de la table `consultation`
--

CREATE TABLE `consultation` (
  `idconsultation` int(3) NOT NULL,
  `dateconsultation` date NOT NULL,
  `daterdv` date NOT NULL,
  `heureconsultation` int(10) NOT NULL,
  `idpatient` int(3) NOT NULL,
  `idmedecin` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `consultation`
--

INSERT INTO `consultation` (`idconsultation`, `dateconsultation`, `daterdv`, `heureconsultation`, `idpatient`, `idmedecin`) VALUES
(1, '2025-04-10', '2025-04-12', 16, 1, 1),
(2, '2025-04-10', '2025-04-20', 17, 2, 2),
(3, '2025-04-11', '2025-04-13', 9, 1, 1),
(4, '2025-04-11', '2025-04-13', 12, 2, 2),
(5, '2025-04-11', '2025-04-20', 9, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `medecine`
--

CREATE TABLE `medecine` (
  `idmedecin` int(3) NOT NULL,
  `nommedecin` varchar(30) NOT NULL,
  `prenommedecin` varchar(30) NOT NULL,
  `specialite` varchar(30) NOT NULL,
  `telmedecin` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `medecine`
--

INSERT INTO `medecine` (`idmedecin`, `nommedecin`, `prenommedecin`, `specialite`, `telmedecin`) VALUES
(1, 'RAKOTO', 'Tolotra', 'Cardiologue', '0385957096'),
(2, 'FRANCOIS', 'Frederic', 'Cardiologue', '0326271001');

-- --------------------------------------------------------

--
-- Structure de la table `patient`
--

CREATE TABLE `patient` (
  `idpatient` int(3) NOT NULL,
  `nompatient` varchar(30) NOT NULL,
  `prenompatient` varchar(30) NOT NULL,
  `telpatient` varchar(13) NOT NULL,
  `adrpatient` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `patient`
--

INSERT INTO `patient` (`idpatient`, `nompatient`, `prenompatient`, `telpatient`, `adrpatient`) VALUES
(1, 'MARIE', 'Janine', '0324569754', 'Lot MB 45 bis'),
(2, 'JEAN', 'Rigo', '0332882910', 'Lot IB 33');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `consultation`
--
ALTER TABLE `consultation`
  ADD PRIMARY KEY (`idconsultation`),
  ADD KEY `idpatient` (`idpatient`),
  ADD KEY `idmedecin` (`idmedecin`);

--
-- Index pour la table `medecine`
--
ALTER TABLE `medecine`
  ADD PRIMARY KEY (`idmedecin`);

--
-- Index pour la table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`idpatient`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `consultation`
--
ALTER TABLE `consultation`
  MODIFY `idconsultation` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `medecine`
--
ALTER TABLE `medecine`
  MODIFY `idmedecin` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `patient`
--
ALTER TABLE `patient`
  MODIFY `idpatient` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `consultation`
--
ALTER TABLE `consultation`
  ADD CONSTRAINT `consultation_ibfk_1` FOREIGN KEY (`idpatient`) REFERENCES `patient` (`idpatient`),
  ADD CONSTRAINT `consultation_ibfk_2` FOREIGN KEY (`idmedecin`) REFERENCES `medecine` (`idmedecin`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
