-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 04 mai 2022 à 22:20
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `paye`
--

-- --------------------------------------------------------

--
-- Structure de la table `bulletin`
--

CREATE TABLE `bulletin` (
  `Numero` int(3) NOT NULL,
  `Mois` varchar(12) NOT NULL,
  `Du` varchar(20) NOT NULL,
  `Au` varchar(20) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Emploi` varchar(20) NOT NULL,
  `Base` int(50) NOT NULL,
  `Supple` int(50) NOT NULL,
  `Indemnite` int(50) NOT NULL,
  `Renumeration` int(50) NOT NULL,
  `cnaps` int(50) NOT NULL,
  `ostie` int(50) NOT NULL,
  `Deduites` int(50) NOT NULL,
  `Net` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `bulletin`
--

INSERT INTO `bulletin` (`Numero`, `Mois`, `Du`, `Au`, `Nom`, `Emploi`, `Base`, `Supple`, `Indemnite`, `Renumeration`, `cnaps`, `ostie`, `Deduites`, `Net`) VALUES
(2, 'Janvier', '2021-12-31', '2022-01-31', 'Tsiohary', 'Prof', 100000, 50000, 50000, 200000, 5000, 5000, 10000, 190000),
(3, 'Mars', '2022-02-28', '2022-03-31', 'Maximin', 'Jardier', 80000, 10000, 10000, 100000, 1000, 2000, 3000, 97000),
(4, '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `bulletin`
--
ALTER TABLE `bulletin`
  ADD PRIMARY KEY (`Numero`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `bulletin`
--
ALTER TABLE `bulletin`
  MODIFY `Numero` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
