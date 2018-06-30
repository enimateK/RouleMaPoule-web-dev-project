-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 21 Mars 2017 à 23:07
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `ihm_covoiturage`
--

-- --------------------------------------------------------

--
-- Structure de la table `advert`
--

CREATE TABLE IF NOT EXISTS `advert` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `published` tinyint(1) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `nb_inscrip` int(11) NOT NULL,
  `date_depart` datetime NOT NULL,
  `prix_trajet` decimal(10,0) NOT NULL,
  `nb_places` int(11) NOT NULL,
  `heure_depart` time NOT NULL,
  `fumeur` tinyint(1) NOT NULL,
  `ville_depart_id` int(11) DEFAULT NULL,
  `ville_arrivee_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_54F1F40B497832A6` (`ville_depart_id`),
  KEY `IDX_54F1F40B34AC9A4B` (`ville_arrivee_id`),
  KEY `IDX_54F1F40BA76ED395` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=26 ;

--
-- Contenu de la table `advert`
--

INSERT INTO `advert` (`id`, `date`, `title`, `content`, `published`, `updated_at`, `nb_inscrip`, `date_depart`, `prix_trajet`, `nb_places`, `heure_depart`, `fumeur`, `ville_depart_id`, `ville_arrivee_id`, `user_id`) VALUES
(22, '2017-03-20 20:59:50', 'Trajet Nantes Le Mans', 'zzarra', 1, '2017-03-21 01:26:01', 4, '2017-03-20 00:00:00', '20', 2, '05:00:00', 1, 11, 9, 4),
(23, '2017-03-21 20:44:38', 'Trajet Paris Toulouse', 'Bonjour, je propose un trajet Paris Toulouse...', 1, '2017-03-21 20:48:20', 1, '2017-03-26 00:00:00', '30', 4, '00:00:00', 0, 7, 12, 8),
(24, '2017-03-21 20:45:28', 'Trajet Toulouse Paris', 'Bonjour ...', 1, NULL, 0, '2017-03-30 00:00:00', '40', 1, '17:10:00', 0, 12, 7, 8),
(25, '2017-03-21 20:47:17', 'Trajet Paris Lyon', 'Bonjour ..', 1, NULL, 0, '2017-04-20 00:00:00', '40', 5, '14:00:00', 1, 7, 8, 7);

-- --------------------------------------------------------

--
-- Structure de la table `advert_ville`
--

CREATE TABLE IF NOT EXISTS `advert_ville` (
  `advert_id` int(11) NOT NULL,
  `ville_id` int(11) NOT NULL,
  PRIMARY KEY (`advert_id`,`ville_id`),
  KEY `IDX_4BE7C4AFD07ECCB6` (`advert_id`),
  KEY `IDX_4BE7C4AFA73F0036` (`ville_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `inscrip_covoit`
--

CREATE TABLE IF NOT EXISTS `inscrip_covoit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` longtext COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `advert_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_9DFC9D17D07ECCB6` (`advert_id`),
  KEY `IDX_9DFC9D17A76ED395` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;

--
-- Contenu de la table `inscrip_covoit`
--

INSERT INTO `inscrip_covoit` (`id`, `message`, `date`, `advert_id`, `user_id`) VALUES
(14, 'Bonjour', '2017-03-21 00:53:11', 22, 5),
(15, 'cc', '2017-03-21 01:26:00', 22, 5),
(16, 'Bonjour, je suis interessé', '2017-03-21 20:48:19', 23, 7);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D64992FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_8D93D649A0D96FBF` (`email_canonical`),
  UNIQUE KEY `UNIQ_8D93D649C05FB297` (`confirmation_token`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `salt`, `roles`, `username_canonical`, `email`, `email_canonical`, `enabled`, `last_login`, `confirmation_token`, `password_requested_at`) VALUES
(4, 'Alex', 'rgeetUgQsl0FezOZPW22PpVwRprxy1BCO8uK0QD2ip3MNkzQMvjthi+1F/Se3oz2TkluVYjO1maP7ePGltYSnQ==', 'vpjVepafZQLuNC9gqRc0WqAe8HLGIEmJTO/m7.uA500', 'a:0:{}', 'alex', 'alex@gmx.fr', 'alex@gmx.fr', 1, '2017-03-21 20:17:53', NULL, NULL),
(5, 'Marine', 'xfyY3bjP6Uq3nkFwHeVNvpKM9rXyVekrTKfeHi4WTNqvM/iQAm3kMYnsFOFxpruLGTQS9VhMOtICXMtxb4jihA==', 'JTppDJqFVVNECdWV9KWCJKwzZwl7qtWVpRfv.ClBYiA', 'a:0:{}', 'marine', 'marine@gmail.com', 'marine@gmail.com', 1, '2017-03-21 01:25:34', NULL, NULL),
(7, 'Yohann', 'RMOo5jP8baxNhdIPZD41cf2m40ETbZl5AsqQR/eHbzN6eB4mlxwh+f/Idp0Y1yffunZ4lp7cs8qo5rlLFSppyA==', '.BeKV.RG8/UPpmJ8HBgeYlI5qXz9qvaRf19T6wO8x60', 'a:0:{}', 'yohann', 'yohann@gmail.com', 'yohann@gmail.com', 1, '2017-03-21 20:46:17', NULL, NULL),
(8, 'Silvio', 'CGDLS+c4S4d5KCkNmVFUgNf1k0IrMHIGa0vPmlbOukp/foZR/gJJpGOZPAC9tdZjRdgWlFt3WnsbkrW2BrrvRw==', 'CRWs8S.tBvnSunaw6bm/b5mqMpkfpCsnQP8IkPZVQ1w', 'a:0:{}', 'silvio', 'silvio@gmail.com', 'silvio@gmail.com', 1, '2017-03-21 20:43:04', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `ville`
--

CREATE TABLE IF NOT EXISTS `ville` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `departement` int(11) NOT NULL,
  `code_postal` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `latitude` decimal(10,8) NOT NULL,
  `longitude` decimal(10,8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `ville_arrivee`
--

CREATE TABLE IF NOT EXISTS `ville_arrivee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `departement` int(11) NOT NULL,
  `code_postal` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `latitude` decimal(10,8) NOT NULL,
  `longitude` decimal(10,8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Contenu de la table `ville_arrivee`
--

INSERT INTO `ville_arrivee` (`id`, `name`, `departement`, `code_postal`, `latitude`, `longitude`) VALUES
(7, 'Paris', 75, '75000', '48.86666700', '2.33333300'),
(8, 'Lyon', 69, '69000', '45.75000000', '4.85000000'),
(9, 'Le Mans', 72, '72000', '48.00000000', '0.20000000'),
(10, 'Marseille', 13, '13000', '43.30000000', '5.40000000'),
(11, 'Nantes', 44, '44000', '47.21725000', '-1.55336000'),
(12, 'Toulouse', 31, '31000', '43.60000000', '1.43333300');

-- --------------------------------------------------------

--
-- Structure de la table `ville_depart`
--

CREATE TABLE IF NOT EXISTS `ville_depart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `departement` int(11) NOT NULL,
  `code_postal` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `latitude` decimal(10,8) NOT NULL,
  `longitude` decimal(10,8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Contenu de la table `ville_depart`
--

INSERT INTO `ville_depart` (`id`, `name`, `departement`, `code_postal`, `latitude`, `longitude`) VALUES
(7, 'Paris', 75, '75000', '48.86666700', '2.33333300'),
(8, 'Lyon', 69, '69000', '45.75000000', '4.85000000'),
(9, 'Le Mans', 72, '72000', '48.00000000', '0.20000000'),
(10, 'Marseille', 13, '13000', '43.30000000', '5.40000000'),
(11, 'Nantes', 44, '44000', '47.21725000', '-1.55336000'),
(12, 'Toulouse', 31, '31000', '43.60000000', '1.43333300');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `advert`
--
ALTER TABLE `advert`
  ADD CONSTRAINT `FK_54F1F40BA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_54F1F40B34AC9A4B` FOREIGN KEY (`ville_arrivee_id`) REFERENCES `ville_arrivee` (`id`),
  ADD CONSTRAINT `FK_54F1F40B497832A6` FOREIGN KEY (`ville_depart_id`) REFERENCES `ville_depart` (`id`);

--
-- Contraintes pour la table `advert_ville`
--
ALTER TABLE `advert_ville`
  ADD CONSTRAINT `FK_4BE7C4AFA73F0036` FOREIGN KEY (`ville_id`) REFERENCES `ville` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_4BE7C4AFD07ECCB6` FOREIGN KEY (`advert_id`) REFERENCES `advert` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `inscrip_covoit`
--
ALTER TABLE `inscrip_covoit`
  ADD CONSTRAINT `FK_9DFC9D17A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_9DFC9D17D07ECCB6` FOREIGN KEY (`advert_id`) REFERENCES `advert` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
