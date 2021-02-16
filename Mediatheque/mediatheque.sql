-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 16 fév. 2021 à 09:12
-- Version du serveur :  8.0.22-0ubuntu0.20.04.3
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mediatheque`
--

-- --------------------------------------------------------

--
-- Structure de la table `films`
--

CREATE TABLE `films` (
  `id_film` int NOT NULL,
  `titre` varchar(255) NOT NULL,
  `affiche` varchar(255) NOT NULL,
  `acteurs` varchar(255) NOT NULL,
  `sortie` date NOT NULL,
  `synopsis` varchar(255) NOT NULL,
  `realisateur` varchar(255) NOT NULL,
  `date_entree` date DEFAULT NULL,
  `date_sortie` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `films`
--

INSERT INTO `films` (`id_film`, `titre`, `affiche`, `acteurs`, `sortie`, `synopsis`, `realisateur`, `date_entree`, `date_sortie`) VALUES
(1, 'ET', 'https://en.wikipedia.org/wiki/E.T._the_Extra-Terrestrial#/media/File:E_t_the_extra_terrestrial_ver3.jpg', 'Pat Welsh, Henry Thomas', '2021-02-09', 'blablabla', 'Steven Spielberg', NULL, NULL),
(2, 'un film', 'une url', 'acteurs', '2021-02-08', 'un synopsis', 'un réalisateur1', '2021-02-14', '2021-02-02'),
(7, 'film3', 'url3', 'acteur3', '2021-01-29', 'synopsis3', 'real3', NULL, NULL),
(8, 'film4', 'url4', 'acteur4', '2021-01-28', 'synopsis4', 'real4', '2021-02-09', '2021-02-03');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`id_film`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `films`
--
ALTER TABLE `films`
  MODIFY `id_film` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
