-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 09 jan. 2020 à 15:45
-- Version du serveur :  5.7.26
-- Version de PHP :  7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bd_gestion_utilisateurs`
--

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

DROP TABLE IF EXISTS `classe`;
CREATE TABLE IF NOT EXISTS `classe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `diplome_id` int(11) DEFAULT NULL,
  `nom_classe` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_8F87BF9626F859E2` (`diplome_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `classe`
--

INSERT INTO `classe` (`id`, `diplome_id`, `nom_classe`) VALUES
(1, 1, 'SIO1'),
(2, 1, 'SIO2'),
(3, 2, 'GPME1'),
(4, 2, 'GPME2');

-- --------------------------------------------------------

--
-- Structure de la table `diplome`
--

DROP TABLE IF EXISTS `diplome`;
CREATE TABLE IF NOT EXISTS `diplome` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_formation_id` int(11) DEFAULT NULL,
  `nom_diplome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lv2_obligatoire` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_EB4C4D4ED543922B` (`type_formation_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `diplome`
--

INSERT INTO `diplome` (`id`, `type_formation_id`, `nom_diplome`, `lv2_obligatoire`) VALUES
(1, 3, 'BTS SIO', 0),
(2, 3, 'BTS GPME', 0),
(3, 2, 'Prépa métier', 1),
(4, 1, 'BAC général', 1);

-- --------------------------------------------------------

--
-- Structure de la table `eleves`
--

DROP TABLE IF EXISTS `eleves`;
CREATE TABLE IF NOT EXISTS `eleves` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexe` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_naissance` date NOT NULL,
  `statut` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lv2` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarque` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amenagement_pedagogique` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `etablissement_origine_id` int(11) DEFAULT NULL,
  `classe_id` int(11) DEFAULT NULL,
  `enseignement_comp_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_383B09B134849FFF` (`etablissement_origine_id`),
  KEY `IDX_383B09B18F5EA509` (`classe_id`),
  KEY `IDX_383B09B190E84B90` (`enseignement_comp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `enseignement_comp`
--

DROP TABLE IF EXISTS `enseignement_comp`;
CREATE TABLE IF NOT EXISTS `enseignement_comp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `diplome_id` int(11) DEFAULT NULL,
  `nom_enseignement_comp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_86E81FC626F859E2` (`diplome_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `enseignement_comp`
--

INSERT INTO `enseignement_comp` (`id`, `diplome_id`, `nom_enseignement_comp`) VALUES
(1, 3, 'First'),
(2, 3, 'Cervantes'),
(3, 3, 'At. Musique');

-- --------------------------------------------------------

--
-- Structure de la table `etablissement_origine`
--

DROP TABLE IF EXISTS `etablissement_origine`;
CREATE TABLE IF NOT EXISTS `etablissement_origine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_etablissement_origine` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `etablissement_origine`
--

INSERT INTO `etablissement_origine` (`id`, `nom_etablissement_origine`) VALUES
(1, 'Aucun'),
(2, 'Vie active'),
(3, 'Julliot de la Morandiere / GRANVILLE'),
(4, 'Tocqueville / CHERBOURG'),
(5, 'Charles Tellier / CONDE SUR NOIREAU');

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
('20191128133933', '2019-11-28 13:40:23'),
('20191205133004', '2019-12-05 13:31:58'),
('20191205143332', '2019-12-05 14:34:00');

-- --------------------------------------------------------

--
-- Structure de la table `type_formation`
--

DROP TABLE IF EXISTS `type_formation`;
CREATE TABLE IF NOT EXISTS `type_formation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_type_formation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `type_formation`
--

INSERT INTO `type_formation` (`id`, `nom_type_formation`) VALUES
(1, 'Lycée Général'),
(2, 'Lycée Professionnel'),
(3, 'Lycée Technologique');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `utilisateur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `utilisateur`, `password`, `roles`) VALUES
(3, 'Turkovics', '$argon2id$v=19$m=65536,t=4,p=1$c254bjNQVkp6VnVKWFVsMQ$35rgShjG+zuZQtx2lAcCH5bBY2h/nXVD4ERmj74Ff8s', '[\"ROLE_SUPER_ADMIN\"]'),
(4, 'User', '$argon2id$v=19$m=65536,t=4,p=1$c254bjNQVkp6VnVKWFVsMQ$35rgShjG+zuZQtx2lAcCH5bBY2h/nXVD4ERmj74Ff8s', '[\"ROLE_USER\"]');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `classe`
--
ALTER TABLE `classe`
  ADD CONSTRAINT `FK_8F87BF9626F859E2` FOREIGN KEY (`diplome_id`) REFERENCES `diplome` (`id`);

--
-- Contraintes pour la table `diplome`
--
ALTER TABLE `diplome`
  ADD CONSTRAINT `FK_EB4C4D4ED543922B` FOREIGN KEY (`type_formation_id`) REFERENCES `type_formation` (`id`);

--
-- Contraintes pour la table `eleves`
--
ALTER TABLE `eleves`
  ADD CONSTRAINT `FK_383B09B134849FFF` FOREIGN KEY (`etablissement_origine_id`) REFERENCES `etablissement_origine` (`id`),
  ADD CONSTRAINT `FK_383B09B18F5EA509` FOREIGN KEY (`classe_id`) REFERENCES `classe` (`id`),
  ADD CONSTRAINT `FK_383B09B190E84B90` FOREIGN KEY (`enseignement_comp_id`) REFERENCES `enseignement_comp` (`id`);

--
-- Contraintes pour la table `enseignement_comp`
--
ALTER TABLE `enseignement_comp`
  ADD CONSTRAINT `FK_86E81FC626F859E2` FOREIGN KEY (`diplome_id`) REFERENCES `diplome` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
