-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 03 Octobre 2023 à 16:04
-- Version du serveur :  5.7.11
-- Version de PHP :  7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `meow`
--

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

CREATE TABLE `evenement` (
  `id` int(11) NOT NULL,
  `nomEvent` varchar(30) NOT NULL,
  `description` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `lieu` varchar(20) NOT NULL,
  `departement` varchar(20) NOT NULL,
  `positif` int(3) NOT NULL,
  `neutre` int(3) NOT NULL,
  `rage` int(3) NOT NULL,
  `positifEnt` int(11) NOT NULL,
  `neutreEnt` int(11) NOT NULL,
  `rageEnt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `evenement`
--

INSERT INTO `evenement` (`id`, `nomEvent`, `description`, `date`, `lieu`, `departement`, `positif`, `neutre`, `rage`, `positifEnt`, `neutreEnt`, `rageEnt`) VALUES
(1, 'Pizza Stage #1', 'AH test ', '2023-09-12', 'sous-sol', 'aucun', 0, 0, 0, 0, 0, 0),
(2, 'Pizza Stage #2', 'AH test ', '2023-09-12', 'sous-sol', 'aucun', 0, 0, 0, 0, 0, 0),
(3, 'Pizza Stage #3', 'AH test ', '2023-09-12', 'sous-sol', 'aucun', 0, 0, 0, 0, 0, 0),
(4, 'Pizza Stage #4', 'AH test ', '2023-09-12', 'sous-sol', 'aucun', 0, 0, 0, 0, 0, 0),
(5, 'Pizza Stage #5', 'AH test ', '2023-09-12', 'sous-sol', 'aucun', 3, 2, 1, 3, 2, 1),
(6, 'Pizza Stage #6', 'AH test ', '2023-09-12', 'sous-sol', 'aucun', 0, 0, 0, 0, 0, 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `evenement`
--
ALTER TABLE `evenement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
