-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 24 mai 2019 à 14:15
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `wildmapsdatabase`
--

-- --------------------------------------------------------

--
-- Structure de la table `itineraire`
--

DROP TABLE IF EXISTS `itineraire`;
CREATE TABLE IF NOT EXISTS `itineraire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pays` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ville` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billet_davion` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hotel` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activite` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentaire` longtext COLLATE utf8mb4_unicode_ci,
  `prix` double NOT NULL,
  `note` int(11) DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `itineraire`
--

INSERT INTO `itineraire` (`id`, `pays`, `ville`, `billet_davion`, `hotel`, `activite`, `description`, `commentaire`, `prix`, `note`, `nom`) VALUES
(1, 'Maroc', 'agadir', 'Paris -> Cape', 'Ibis', 'Balade', 'Good', 'tres amusant ...', 55.5, 10, 'premier'),
(2, 'SA', 'Cap', 'Depart Paris', 'ibis', 'j,lkjl', 'lkl', 'hghjkkkjlmmmmmmmmmmmm..', 525, 4, 'deuxieme'),
(3, 'France', 'kb', 'lk', 'km', 'lmù', 'mm', 'lmm;;l', 122.05, 5, 'troisieme'),
(4, 'Cote d\'ivoire', 'jkljk', 'ljjlklk', '555', '555', '555', '555', 5555, 55, 'quatrieme'),
(7, '5', '5', '5', '5', '5', '5', '5', 55, 10, 'cinquieme');

-- --------------------------------------------------------

--
-- Structure de la table `migration_versions`
--

DROP TABLE IF EXISTS `migration_versions`;
CREATE TABLE IF NOT EXISTS `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20190522230628', '2019-05-22 23:08:16'),
('20190523003757', '2019-05-23 00:38:02'),
('20190523003925', '2019-05-23 00:39:28'),
('20190523050610', '2019-05-23 05:06:17'),
('20190523121653', '2019-05-23 12:16:59');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'Notdemo', 'Notdemo'),
(2, 'demo', '$2y$13$HG3gVtb6HjrkmoQ8g/KoKue6ux2Luljdi8Cq4MuT2Tv754eVsnvkW');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
