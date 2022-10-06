-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 05 oct. 2022 à 21:12
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet_ssi`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` char(120) DEFAULT NULL,
  `id_utilisateur` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_utilisateur` (`id_utilisateur`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`id`, `description`, `id_utilisateur`) VALUES
(10, 'Yo', 7),
(4, 'Ceci est un message constructif', 10);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `secure_utilisateurs`
-- (Voir ci-dessous la vue réelle)
--
DROP VIEW IF EXISTS `secure_utilisateurs`;
CREATE TABLE IF NOT EXISTS `secure_utilisateurs` (
`id` int(11)
,`Nom` char(20)
,`Prenom` char(20)
,`Ville` char(20)
);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` char(20) DEFAULT NULL,
  `Prenom` char(20) DEFAULT NULL,
  `Datedenaissance` date DEFAULT NULL,
  `NumeroCB` decimal(16,0) DEFAULT NULL,
  `Ville` char(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `Nom`, `Prenom`, `Datedenaissance`, `NumeroCB`, `Ville`) VALUES
(13, 'Cloe', 'Eremeef', '2001-03-22', '1234567876543234', 'Bougival'),
(16, 'Kylian', 'Artu-Lequint', '2001-03-17', '9765467890876546', 'Maurecourt'),
(6, 'Pierrick', 'Delrieu', '2001-09-28', '4567654567898765', 'Saint Paul de Vence'),
(7, 'Raphael', 'Cadillat', '2001-07-07', '5283928350289285', 'Marly le Roi');

-- --------------------------------------------------------

--
-- Structure de la vue `secure_utilisateurs`
--
DROP TABLE IF EXISTS `secure_utilisateurs`;

DROP VIEW IF EXISTS `secure_utilisateurs`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `secure_utilisateurs`  AS SELECT `utilisateurs`.`id` AS `id`, `utilisateurs`.`Nom` AS `Nom`, `utilisateurs`.`Prenom` AS `Prenom`, `utilisateurs`.`Ville` AS `Ville` FROM `utilisateurs` ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
