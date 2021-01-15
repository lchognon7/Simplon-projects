-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 15 jan. 2021 à 13:50
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
-- Base de données : `micro-url`
--

-- --------------------------------------------------------

--
-- Structure de la table `assoc_url_keyword`
--

CREATE TABLE `assoc_url_keyword` (
  `assoc_id` int NOT NULL,
  `assoc_url_id` int NOT NULL,
  `assoc_keyword_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `assoc_url_keyword`
--

INSERT INTO `assoc_url_keyword` (`assoc_id`, `assoc_url_id`, `assoc_keyword_id`) VALUES
(1, 18, 10),
(8, 32, 17),
(9, 34, 18),
(10, 36, 19),
(11, 38, 20),
(12, 40, 21),
(13, 42, 22),
(14, 46, 23),
(15, 48, 24);

-- --------------------------------------------------------

--
-- Structure de la table `keyword`
--

CREATE TABLE `keyword` (
  `id_keyword` int NOT NULL,
  `keyword` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `keyword`
--

INSERT INTO `keyword` (`id_keyword`, `keyword`) VALUES
(1, 'actualités'),
(3, 'culture'),
(5, 'sport'),
(7, 'technologies'),
(10, 'piratage'),
(17, 'piratage'),
(18, 'piratage'),
(19, 'piratage'),
(20, 'piratage'),
(21, 'piratage'),
(22, 'piratage'),
(23, 'piratage'),
(24, 'piratage');

-- --------------------------------------------------------

--
-- Structure de la table `url`
--

CREATE TABLE `url` (
  `id_url` int NOT NULL,
  `url` text NOT NULL,
  `shortcut` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `url`
--

INSERT INTO `url` (`id_url`, `url`, `shortcut`, `datetime`, `description`) VALUES
(1, 'URL1 qui est super long', 'URL1 court', '2021-01-14 17:47:01', 'Description modifiée'),
(2, 'URL2 qui est super long', 'URL2 court', '2021-01-14 17:48:04', 'lorem ipsum2'),
(3, 'URL3 qui est super long', 'URL3 court', '2021-01-14 17:54:04', 'lorem ipsum3'),
(4, 'URL3 qui est super long', 'URL3 court', '2021-01-14 17:55:04', 'lorem ipsum3'),
(5, 'URL3 qui est super long', 'URL3 court', '2021-01-14 18:03:30', 'lorem ipsum3'),
(6, 'URL3 qui est super long', 'URL3 court', '2021-01-14 18:09:33', 'lorem ipsum3'),
(7, 'URL3 qui est super long', 'URL3 court', '2021-01-14 18:09:55', 'lorem ipsum3'),
(8, 'URL3 qui est super long', 'URL3 court', '2021-01-14 18:11:48', 'lorem ipsum3'),
(10, 'URL3 qui est super long', 'URL3 court', '2021-01-14 18:20:01', 'Description modifiée'),
(11, 'URL3 qui est super long', 'URL3 court', '2021-01-14 18:20:22', 'Description modifiée'),
(12, 'URL3 qui est super long', 'URL3 court', '2021-01-14 18:20:42', 'Description modifiée'),
(13, 'URL3 qui est super long', 'URL3 court', '2021-01-14 18:22:57', 'Description modifiée'),
(14, 'https://www.zataz.com/total-energie-direct-obligee-de-stopper-un-jeu-en-ligne-suite-a-une-fuite-de-donnees/', 'ztz7', '2021-01-14 18:22:57', 'L\'entreprise Total Energie Direct avait lancé un jeu en ligne. Le concours a dû être stoppé. Il était possible d\'accéder aux données des autres joueurs.'),
(15, 'URL3 qui est super long', 'URL3 court', '2021-01-14 18:47:08', 'Description modifiée'),
(16, 'https://www.zataz.com/total-energie-direct-obligee-de-stopper-un-jeu-en-ligne-suite-a-une-fuite-de-donnees/', 'ztz7', '2021-01-14 18:47:08', 'L\'entreprise Total Energie Direct avait lancé un jeu en ligne. Le concours a dû être stoppé. Il était possible d\'accéder aux données des autres joueurs.'),
(17, 'URL3 qui est super long', 'URL3 court', '2021-01-15 09:37:57', 'Description modifiée'),
(18, 'https://www.zataz.com/total-energie-direct-obligee-de-stopper-un-jeu-en-ligne-suite-a-une-fuite-de-donnees/', 'ztz7', '2021-01-15 09:37:57', 'L\'entreprise Total Energie Direct avait lancé un jeu en ligne. Le concours a dû être stoppé. Il était possible d\'accéder aux données des autres joueurs.'),
(19, 'URL3 qui est super long', 'URL3 court', '2021-01-15 09:48:21', 'Description modifiée'),
(20, 'https://www.zataz.com/total-energie-direct-obligee-de-stopper-un-jeu-en-ligne-suite-a-une-fuite-de-donnees/', 'ztz7', '2021-01-15 09:48:21', 'L\'entreprise Total Energie Direct avait lancé un jeu en ligne. Le concours a dû être stoppé. Il était possible d\'accéder aux données des autres joueurs.'),
(21, 'URL3 qui est super long', 'URL3 court', '2021-01-15 09:48:52', 'Description modifiée'),
(22, 'https://www.zataz.com/total-energie-direct-obligee-de-stopper-un-jeu-en-ligne-suite-a-une-fuite-de-donnees/', 'ztz7', '2021-01-15 09:48:52', 'L\'entreprise Total Energie Direct avait lancé un jeu en ligne. Le concours a dû être stoppé. Il était possible d\'accéder aux données des autres joueurs.'),
(23, 'URL3 qui est super long', 'URL3 court', '2021-01-15 09:49:15', 'Description modifiée'),
(24, 'https://www.zataz.com/total-energie-direct-obligee-de-stopper-un-jeu-en-ligne-suite-a-une-fuite-de-donnees/', 'ztz7', '2021-01-15 09:49:15', 'L\'entreprise Total Energie Direct avait lancé un jeu en ligne. Le concours a dû être stoppé. Il était possible d\'accéder aux données des autres joueurs.'),
(25, 'URL3 qui est super long', 'URL3 court', '2021-01-15 09:49:38', 'Description modifiée'),
(26, 'https://www.zataz.com/total-energie-direct-obligee-de-stopper-un-jeu-en-ligne-suite-a-une-fuite-de-donnees/', 'ztz7', '2021-01-15 09:49:38', 'L\'entreprise Total Energie Direct avait lancé un jeu en ligne. Le concours a dû être stoppé. Il était possible d\'accéder aux données des autres joueurs.'),
(27, 'URL3 qui est super long', 'URL3 court', '2021-01-15 09:53:02', 'Description modifiée'),
(28, 'https://www.zataz.com/total-energie-direct-obligee-de-stopper-un-jeu-en-ligne-suite-a-une-fuite-de-donnees/', 'ztz7', '2021-01-15 09:53:02', 'L\'entreprise Total Energie Direct avait lancé un jeu en ligne. Le concours a dû être stoppé. Il était possible d\'accéder aux données des autres joueurs.'),
(29, 'URL3 qui est super long', 'URL3 court', '2021-01-15 09:53:09', 'Description modifiée'),
(30, 'https://www.zataz.com/total-energie-direct-obligee-de-stopper-un-jeu-en-ligne-suite-a-une-fuite-de-donnees/', 'ztz7', '2021-01-15 09:53:09', 'L\'entreprise Total Energie Direct avait lancé un jeu en ligne. Le concours a dû être stoppé. Il était possible d\'accéder aux données des autres joueurs.'),
(31, 'URL3 qui est super long', 'URL3 court', '2021-01-15 11:03:16', 'Description modifiée'),
(32, 'https://www.zataz.com/total-energie-direct-obligee-de-stopper-un-jeu-en-ligne-suite-a-une-fuite-de-donnees/', 'ztz7', '2021-01-15 11:03:16', 'L\'entreprise Total Energie Direct avait lancé un jeu en ligne. Le concours a dû être stoppé. Il était possible d\'accéder aux données des autres joueurs.'),
(33, 'URL3 qui est super long', 'URL3 court', '2021-01-15 11:03:56', 'Description modifiée'),
(34, 'https://www.zataz.com/total-energie-direct-obligee-de-stopper-un-jeu-en-ligne-suite-a-une-fuite-de-donnees/', 'ztz7', '2021-01-15 11:03:56', 'L\'entreprise Total Energie Direct avait lancé un jeu en ligne. Le concours a dû être stoppé. Il était possible d\'accéder aux données des autres joueurs.'),
(35, 'URL3 qui est super long', 'URL3 court', '2021-01-15 11:04:06', 'Description modifiée'),
(36, 'https://www.zataz.com/total-energie-direct-obligee-de-stopper-un-jeu-en-ligne-suite-a-une-fuite-de-donnees/', 'ztz7', '2021-01-15 11:04:06', 'L\'entreprise Total Energie Direct avait lancé un jeu en ligne. Le concours a dû être stoppé. Il était possible d\'accéder aux données des autres joueurs.'),
(37, 'URL3 qui est super long', 'URL3 court', '2021-01-15 11:13:55', 'Description modifiée'),
(38, 'https://www.zataz.com/total-energie-direct-obligee-de-stopper-un-jeu-en-ligne-suite-a-une-fuite-de-donnees/', 'ztz7', '2021-01-15 11:13:55', 'L\'entreprise Total Energie Direct avait lancé un jeu en ligne. Le concours a dû être stoppé. Il était possible d\'accéder aux données des autres joueurs.'),
(39, 'URL3 qui est super long', 'URL3 court', '2021-01-15 11:14:42', 'Description modifiée'),
(40, 'https://www.zataz.com/total-energie-direct-obligee-de-stopper-un-jeu-en-ligne-suite-a-une-fuite-de-donnees/', 'ztz7', '2021-01-15 11:14:42', 'L\'entreprise Total Energie Direct avait lancé un jeu en ligne. Le concours a dû être stoppé. Il était possible d\'accéder aux données des autres joueurs.'),
(41, 'URL3 qui est super long', 'URL3 court', '2021-01-15 11:14:56', 'Description modifiée'),
(42, 'https://www.zataz.com/total-energie-direct-obligee-de-stopper-un-jeu-en-ligne-suite-a-une-fuite-de-donnees/', 'ztz7', '2021-01-15 11:14:56', 'L\'entreprise Total Energie Direct avait lancé un jeu en ligne. Le concours a dû être stoppé. Il était possible d\'accéder aux données des autres joueurs.'),
(43, 'URL3 qui est super long', 'URL3 court', '2021-01-15 11:15:38', 'Description modifiée'),
(44, 'https://www.zataz.com/total-energie-direct-obligee-de-stopper-un-jeu-en-ligne-suite-a-une-fuite-de-donnees/', 'ztz7', '2021-01-15 11:15:39', 'L\'entreprise Total Energie Direct avait lancé un jeu en ligne. Le concours a dû être stoppé. Il était possible d\'accéder aux données des autres joueurs.'),
(45, 'URL3 qui est super long', 'URL3 court', '2021-01-15 11:16:10', 'Description modifiée'),
(46, 'https://www.zataz.com/total-energie-direct-obligee-de-stopper-un-jeu-en-ligne-suite-a-une-fuite-de-donnees/', 'ztz7', '2021-01-15 11:16:10', 'L\'entreprise Total Energie Direct avait lancé un jeu en ligne. Le concours a dû être stoppé. Il était possible d\'accéder aux données des autres joueurs.'),
(47, 'URL3 qui est super long', 'URL3 court', '2021-01-15 13:15:49', 'Description modifiée'),
(48, 'https://www.zataz.com/total-energie-direct-obligee-de-stopper-un-jeu-en-ligne-suite-a-une-fuite-de-donnees/', 'ztz7', '2021-01-15 13:15:49', 'L\'entreprise Total Energie Direct avait lancé un jeu en ligne. Le concours a dû être stoppé. Il était possible d\'accéder aux données des autres joueurs.');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `assoc_url_keyword`
--
ALTER TABLE `assoc_url_keyword`
  ADD PRIMARY KEY (`assoc_id`),
  ADD KEY `assoc_url_id` (`assoc_url_id`,`assoc_keyword_id`),
  ADD KEY `assoc_keyword_id` (`assoc_keyword_id`);

--
-- Index pour la table `keyword`
--
ALTER TABLE `keyword`
  ADD PRIMARY KEY (`id_keyword`);

--
-- Index pour la table `url`
--
ALTER TABLE `url`
  ADD PRIMARY KEY (`id_url`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `assoc_url_keyword`
--
ALTER TABLE `assoc_url_keyword`
  MODIFY `assoc_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `keyword`
--
ALTER TABLE `keyword`
  MODIFY `id_keyword` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `url`
--
ALTER TABLE `url`
  MODIFY `id_url` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `assoc_url_keyword`
--
ALTER TABLE `assoc_url_keyword`
  ADD CONSTRAINT `assoc_url_keyword_ibfk_1` FOREIGN KEY (`assoc_keyword_id`) REFERENCES `keyword` (`id_keyword`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assoc_url_keyword_ibfk_2` FOREIGN KEY (`assoc_url_id`) REFERENCES `url` (`id_url`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
