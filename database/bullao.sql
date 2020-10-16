-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  ven. 16 oct. 2020 à 14:29
-- Version du serveur :  5.7.26
-- Version de PHP :  7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `bullao`
--
CREATE DATABASE IF NOT EXISTS `bullao` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `bullao`;

-- --------------------------------------------------------

--
-- Structure de la table `accessoires`
--

CREATE TABLE `accessoires` (
  `accessoire_id` int(11) NOT NULL,
  `accessoire_libelle` varchar(100) NOT NULL,
  `accessoire_description` text NOT NULL,
  `accessoire_prix` decimal(10,2) NOT NULL,
  `accessoire_stock` int(11) NOT NULL DEFAULT '0',
  `accessoire_chemin_img` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `accessoires`
--

INSERT INTO `accessoires` (`accessoire_id`, `accessoire_libelle`, `accessoire_description`, `accessoire_prix`, `accessoire_stock`, `accessoire_chemin_img`, `created_at`, `updated_at`) VALUES
(1, 'Enceinte Bose', 'Description', '9.00', 1, 'medias/img/accessoires/enceinte.png', NULL, NULL),
(2, 'Marche pied', 'Description', '6.00', 0, 'medias/img/accessoires/marche-pied.png', NULL, NULL),
(3, 'Parfum positivant', 'Description', '3.00', 15, 'medias/img/accessoires/parfum-1.jpg', NULL, NULL),
(4, 'Parfum fraicheur', 'Description', '3.00', 15, 'medias/img/accessoires/parfum-2.jpg', NULL, NULL),
(5, 'Parfum Love', 'Description', '3.00', 30, 'medias/img/accessoires/parfum-3.jpg', NULL, NULL),
(6, 'Pouf lumineux', 'Description', '5.00', 0, 'medias/img/accessoires/pouf-lumineux.png', NULL, NULL),
(7, 'Porte verre-double', 'Description', '2.00', 3, 'medias/img/accessoires/porte-verre.png', NULL, NULL),
(8, 'Siège confort X2', 'Description', '10.00', 1, 'medias/img/accessoires/siege-confort.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `administrateurs`
--

CREATE TABLE `administrateurs` (
  `administrateur_id` int(11) NOT NULL,
  `administrateur_name` varchar(100) NOT NULL,
  `administrateur_phone` varchar(10) DEFAULT NULL,
  `administrateur_email` varchar(100) NOT NULL,
  `administrateur_user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `administrateurs`
--

INSERT INTO `administrateurs` (`administrateur_id`, `administrateur_name`, `administrateur_phone`, `administrateur_email`, `administrateur_user_id`, `created_at`, `updated_at`) VALUES
(1, 'Jérémy Lémont', '0631727083', 'jerem-lem@hotmail.fr', 1, '2020-09-19 22:00:00', NULL),
(2, 'Alexandre', '0613377128', 'cnl.alexandre@gmail.com', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `adresses`
--

CREATE TABLE `adresses` (
  `adresse_id` int(11) NOT NULL,
  `adresse_name` varchar(100) NOT NULL,
  `adresse_client_id` int(11) NOT NULL,
  `adresse_rue` varchar(100) NOT NULL,
  `adresse_cp` varchar(5) DEFAULT NULL,
  `adresse_ville` varchar(100) NOT NULL,
  `adresse_complement` varchar(100) DEFAULT NULL,
  `adresse_departement` varchar(100) NOT NULL,
  `adresse_type` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `client_id` int(11) NOT NULL,
  `client_name` varchar(100) NOT NULL,
  `client_user_id` int(11) DEFAULT NULL,
  `client_adresse_1` varchar(100) NOT NULL,
  `client_adresse_2` varchar(100) DEFAULT NULL,
  `client_cp` varchar(5) NOT NULL,
  `client_ville` varchar(100) NOT NULL,
  `client_email` varchar(100) NOT NULL,
  `client_phone` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`client_id`, `client_name`, `client_user_id`, `client_adresse_1`, `client_adresse_2`, `client_cp`, `client_ville`, `client_email`, `client_phone`, `created_at`, `updated_at`) VALUES
(1, 'Jérémy Lémont', 2, '11 rue Pablo Néruda', 'Interphone au nom de SKYBYK', '77200', 'Torcy', 'jerem-lem@hotmail.fr', '0631727083', '2020-09-20 22:00:00', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `indisponibilites`
--

CREATE TABLE `indisponibilites` (
  `indisponibilite_id` int(11) NOT NULL,
  `indisponibilite_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `indisponibilites`
--

INSERT INTO `indisponibilites` (`indisponibilite_id`, `indisponibilite_date`, `created_at`, `updated_at`) VALUES
(1, '2020-09-21', NULL, NULL),
(2, '2020-09-22', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `packs`
--

CREATE TABLE `packs` (
  `pack_id` int(11) NOT NULL,
  `pack_libelle` varchar(100) NOT NULL,
  `pack_description` text NOT NULL,
  `pack_stock` int(11) NOT NULL DEFAULT '0',
  `pack_prix` decimal(10,2) NOT NULL,
  `pack_chemin_img` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `packs`
--

INSERT INTO `packs` (`pack_id`, `pack_libelle`, `pack_description`, `pack_stock`, `pack_prix`, `pack_chemin_img`, `created_at`, `updated_at`) VALUES
(1, 'Pack Fun', 'Pour une fête réussie : une guirlande\r\nlumineuse, des ballons brillants métallisés, un pose-verre supplémentaire, une enceinte\r\nportable étanche Bose©, une petite machine à fumée et une dose de parfum positivant.', 1, '20.00', 'medias/img/no-image.png', NULL, NULL),
(2, 'Pack Romance', 'Sortez-lui le grand jeu avec ce pack romantique comprenant : des pétales de   rose en soie, des ballons en forme de coeur, une lumière tamisée, un spa parfumé « Love » et 2 sièges confort premium.', 1, '20.00', 'medias/img/no-image.png', NULL, NULL),
(3, 'Pack Chill', 'Description', 1, '20.00', 'medias/img/no-image.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `promos`
--

CREATE TABLE `promos` (
  `promo_id` int(5) NOT NULL,
  `promo_libelle` varchar(25) NOT NULL,
  `promo_valeur` int(5) NOT NULL,
  `promo_date_debut` datetime DEFAULT NULL,
  `promo_date_fin` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `promos`
--

INSERT INTO `promos` (`promo_id`, `promo_libelle`, `promo_valeur`, `promo_date_debut`, `promo_date_fin`, `created_at`, `updated_at`) VALUES
(1, 'MONTEV2020', 10, NULL, NULL, NULL, NULL),
(2, 'COPAIN2020', 15, NULL, NULL, NULL, NULL),
(3, 'LGM2020', 15, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `ranks`
--

CREATE TABLE `ranks` (
  `rank_id` int(11) NOT NULL,
  `rank_libelle` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ranks`
--

INSERT INTO `ranks` (`rank_id`, `rank_libelle`, `created_at`, `updated_at`) VALUES
(1, 'Administrateur', NULL, NULL),
(2, 'Client', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

CREATE TABLE `reservations` (
  `reservation_id` int(11) NOT NULL,
  `reservation_date_debut` date NOT NULL,
  `reservation_date_fin` date NOT NULL,
  `reservation_creneau` varchar(25) DEFAULT NULL,
  `reservation_emplacement` varchar(100) DEFAULT NULL,
  `reservation_rue` varchar(100) DEFAULT NULL,
  `reservation_cp` varchar(5) DEFAULT NULL,
  `reservation_ville` varchar(100) DEFAULT NULL,
  `reservation_complement` varchar(100) DEFAULT NULL,
  `reservation_departement` varchar(100) DEFAULT NULL,
  `reservation_type_logement` varchar(100) DEFAULT NULL,
  `reservation_spa_id` int(11) DEFAULT NULL,
  `reservation_spa_libelle` varchar(100) DEFAULT NULL,
  `reservation_prix` decimal(10,2) DEFAULT NULL,
  `reservation_pack_id` int(11) DEFAULT NULL,
  `reservation_prix_pack` decimal(10,2) DEFAULT NULL,
  `reservation_montant_total` decimal(10,2) DEFAULT NULL,
  `reservation_promo` varchar(20) DEFAULT NULL,
  `reservation_paye` int(1) NOT NULL DEFAULT '0',
  `reservation_client_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`reservation_id`, `reservation_date_debut`, `reservation_date_fin`, `reservation_creneau`, `reservation_emplacement`, `reservation_rue`, `reservation_cp`, `reservation_ville`, `reservation_complement`, `reservation_departement`, `reservation_type_logement`, `reservation_spa_id`, `reservation_spa_libelle`, `reservation_prix`, `reservation_pack_id`, `reservation_prix_pack`, `reservation_montant_total`, `reservation_promo`, `reservation_paye`, `reservation_client_id`, `created_at`, `updated_at`) VALUES
(1, '2020-09-28', '2020-09-30', 'aprem', 'exterieur', '', '', '', '', '', 'appartement', NULL, '', '90.00', 3, '20.00', '90.00', 'F2P9K4', 0, NULL, '2020-09-25 23:04:14', '2020-09-25 23:04:14'),
(2, '2020-10-14', '2020-10-15', 'aprem', 'exterieur', '', '', '', '', '', 'appartement', NULL, '', '90.00', 2, '20.00', '119.00', 'COPAIN2020', 0, NULL, '2020-09-30 16:03:02', '2020-09-30 16:03:02'),
(3, '2020-10-06', '2020-10-08', 'aprem', 'exterieur', '', '', '', '', '', 'appartement', NULL, '', '130.00', 2, '20.00', '153.00', NULL, 0, NULL, '2020-09-30 19:55:14', '2020-09-30 19:55:14'),
(4, '2020-10-06', '2020-10-08', 'aprem', 'exterieur', '', '', '', '', '', 'appartement', NULL, '', '130.00', 2, '20.00', '159.00', NULL, 0, NULL, '2020-09-30 19:59:25', '2020-09-30 19:59:25'),
(5, '2020-10-22', '2020-10-24', 'aprem', 'interieur', '', '', '', '', '', 'appartement', 2, 'Spa Navy 4 places', '130.00', NULL, NULL, '139.00', NULL, 0, NULL, '2020-09-30 21:26:14', '2020-09-30 21:26:14'),
(6, '2020-11-05', '2020-11-07', 'aprem', 'exterieur', '', '', '', '', '', 'maison', 2, 'Spa Navy 4 places', '130.00', 2, '20.00', '159.00', NULL, 0, NULL, '2020-10-01 11:11:47', '2020-10-01 11:11:47'),
(7, '2020-11-05', '2020-11-07', 'aprem', 'exterieur', '', '', '', '', '', 'maison', 2, 'Spa Navy 4 places', '130.00', NULL, NULL, '130.00', NULL, 0, NULL, '2020-10-01 11:13:25', '2020-10-01 11:13:25'),
(8, '2020-11-05', '2020-11-07', 'aprem', 'exterieur', '', '', '', '', '', 'maison', 2, 'Spa Navy 4 places', '130.00', NULL, NULL, '130.00', NULL, 0, NULL, '2020-10-01 11:13:46', '2020-10-01 11:13:46'),
(9, '2020-11-11', '2020-11-13', 'aprem', 'interieur', '', '', '', '', '', 'maison', 2, 'Spa Navy 4 places', '130.00', NULL, NULL, '130.00', NULL, 0, NULL, '2020-10-01 11:14:30', '2020-10-01 11:14:30'),
(10, '2020-11-10', '2020-11-12', 'aprem', 'exterieur', '', '', '', '', '', 'appartement', 2, 'Spa Navy 4 places', '130.00', 2, '20.00', '159.00', NULL, 0, NULL, '2020-10-01 11:18:53', '2020-10-01 11:18:53'),
(11, '2020-11-04', '2020-11-06', 'aprem', 'exterieur', '', '', '', '', '', 'appartement', 2, 'Spa Navy 4 places', '130.00', NULL, NULL, '130.00', NULL, 0, NULL, '2020-10-01 11:35:52', '2020-10-01 11:35:52'),
(12, '2020-11-04', '2020-11-06', 'aprem', 'exterieur', '', '', '', '', '', 'appartement', 2, 'Spa Navy 4 places', '130.00', NULL, NULL, '130.00', NULL, 0, NULL, '2020-10-01 11:38:51', '2020-10-01 11:38:51'),
(13, '2020-10-04', '2020-10-06', 'aprem', 'exterieur', '', '', '', '', '', 'appartement', 2, 'Spa Navy 4 places', '130.00', 2, '20.00', '159.00', NULL, 0, NULL, '2020-10-01 11:39:34', '2020-10-01 11:39:34'),
(14, '2020-10-02', '2020-10-03', 'aprem', 'interieur', '', '', '', '', '', 'maison', 3, 'Spa Baltik 4 places', '90.00', 2, '20.00', '79.47', 'LGM2020', 0, NULL, '2020-10-01 13:26:50', '2020-10-01 13:26:50'),
(15, '2020-11-03', '2020-11-06', 'aprem', 'exterieur', '', '', '', '', '', 'maison', 2, 'Spa Navy 4 places', '130.00', NULL, NULL, '130.00', NULL, 0, NULL, '2020-10-01 14:33:54', '2020-10-01 14:33:54'),
(16, '2020-10-09', '2020-10-10', 'aprem', 'exterieur', '', '', '', '', '', 'appartement', 5, 'Spa Baltik 6 places', '120.00', 2, '20.00', '140.00', NULL, 0, NULL, '2020-10-01 14:39:32', '2020-10-01 14:39:32'),
(17, '2020-11-03', '2020-11-04', 'aprem', 'exterieur', '', '', '', '', '', 'appartement', 5, 'Spa Baltik 6 places', '120.00', NULL, NULL, '129.00', NULL, 0, NULL, '2020-10-01 14:41:03', '2020-10-01 14:41:03'),
(18, '2020-11-04', '2020-11-05', 'aprem', 'exterieur', '', '', '', '', '', 'appartement', 2, 'Spa Navy 4 places', '90.00', NULL, NULL, '90.00', NULL, 0, NULL, '2020-10-01 15:04:09', '2020-10-01 15:04:09'),
(19, '2020-11-11', '2020-11-13', 'aprem', 'exterieur', '', '', '', '', '', 'maison', 2, 'Spa Navy 4 places', '130.00', 2, '20.00', '159.00', NULL, 0, NULL, '2020-10-01 15:05:58', '2020-10-01 15:05:58'),
(20, '2020-11-03', '2020-11-04', 'aprem', 'exterieur', '', '', '', '', '', 'maison', 2, 'Spa Navy 4 places', '90.00', 2, '20.00', '119.00', NULL, 0, NULL, '2020-10-01 15:08:57', '2020-10-01 15:08:57'),
(21, '2020-11-03', '2020-11-08', 'aprem', 'interieur', '', '', '', '', '', 'maison', 5, 'Spa Baltik 6 places', '250.00', 2, '20.00', '255.00', 'COPAIN2020', 0, NULL, '2020-10-01 15:13:37', '2020-10-01 15:13:37'),
(22, '2020-10-09', '2020-10-10', 'aprem', 'exterieur', '', '', '', '', '', 'appartement', 2, 'Spa Navy 4 places', '0.00', 2, '20.00', '29.00', NULL, 0, NULL, '2020-10-01 15:18:49', '2020-10-01 15:18:49'),
(23, '2020-10-28', '2020-10-30', 'aprem', 'exterieur', '', '', '', '', '', 'maison', 2, 'Spa Navy 4 places', '130.00', 2, '20.00', '159.00', NULL, 0, NULL, '2020-10-01 16:05:58', '2020-10-01 16:05:58'),
(24, '2020-11-03', '2020-11-05', 'matin', 'exterieur', '', '', '', '', '', 'appartement', 2, 'Spa Navy 4 places', '130.00', 2, '20.00', '165.00', NULL, 0, NULL, '2020-10-02 16:23:45', '2020-10-02 16:23:45'),
(25, '2020-10-05', '2020-10-08', 'aprem', 'interieur', '', '', '', '', '', 'appartement', 1, 'Spa Sahara 4 places', '170.00', 1, '20.00', '199.00', NULL, 0, NULL, '2020-10-04 15:46:41', '2020-10-04 15:46:41'),
(26, '2020-10-16', '2020-10-18', 'aprem', 'interieur', '', '', '', '', '', 'appartement', 2, 'Spa Navy 4 places', '130.00', 2, '20.00', '162.00', NULL, 0, NULL, '2020-10-04 16:33:37', '2020-10-04 16:33:37'),
(27, '2020-10-14', '2020-10-15', 'aprem', 'interieur', '', '', '', '', '', 'maison', 2, 'Spa Navy 4 places', '90.00', NULL, NULL, '102.00', NULL, 0, NULL, '2020-10-04 16:36:14', '2020-10-04 16:36:14'),
(28, '2020-10-16', '2020-10-17', 'aprem', 'interieur', '', '', '', '', '', 'appartement', 2, 'Spa Navy 4 places', '90.00', 2, '20.00', '119.00', NULL, 0, NULL, '2020-10-04 16:38:00', '2020-10-04 16:38:00'),
(29, '2020-10-17', '2020-10-18', 'aprem', 'interieur', '', '', '', '', '', 'maison', 2, 'Spa Navy 4 places', '90.00', 2, '20.00', '122.00', NULL, 0, NULL, '2020-10-04 16:43:17', '2020-10-04 16:43:17'),
(30, '2020-10-09', '2020-10-11', 'aprem', 'exterieur', '', '', '', '', '', 'appartement', 4, 'Spa Navy 6 places', '160.00', 2, '20.00', '183.00', NULL, 0, NULL, '2020-10-09 14:17:49', '2020-10-09 14:17:49'),
(31, '2020-10-15', '2020-10-17', 'aprem', 'exterieur', '', '', '', '', '', 'appartement', 3, 'Spa Baltik 4 places', '130.00', 3, '20.00', '139.40', 'LGM2020', 0, NULL, '2020-10-12 14:03:45', '2020-10-12 14:03:45'),
(32, '2020-10-15', '2020-10-17', 'aprem', 'interieur', '', '', '', '', '', 'maison', 2, 'Spa Navy 4 places', '130.00', 2, '20.00', '150.00', NULL, 0, NULL, '2020-10-12 14:08:59', '2020-10-12 14:08:59'),
(33, '2020-10-13', '2020-10-14', 'aprem', 'exterieur', '', '', '', '', '', 'appartement', 2, 'Spa Navy 4 places', '90.00', NULL, NULL, '90.00', NULL, 0, NULL, '2020-10-12 14:40:22', '2020-10-12 14:40:22'),
(34, '2020-10-16', '2020-10-18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 'Spa Carbone 6 places', '120.00', 2, '20.00', NULL, NULL, 0, NULL, '2020-10-16 14:28:42', '2020-10-16 14:28:42');

-- --------------------------------------------------------

--
-- Structure de la table `reservations_accessoires`
--

CREATE TABLE `reservations_accessoires` (
  `ra_reservation_id` int(11) NOT NULL,
  `ra_accessoire_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reservations_accessoires`
--

INSERT INTO `reservations_accessoires` (`ra_reservation_id`, `ra_accessoire_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-09-25 23:04:14', '2020-09-25 23:04:14'),
(1, 2, '2020-09-25 23:04:14', '2020-09-25 23:04:14'),
(1, 6, '2020-09-25 23:04:14', '2020-09-25 23:04:14'),
(2, 1, '2020-09-30 16:03:02', '2020-09-30 16:03:02'),
(3, 3, '2020-09-30 19:55:14', '2020-09-30 19:55:14'),
(4, 1, '2020-09-30 19:59:25', '2020-09-30 19:59:25'),
(5, 1, '2020-09-30 21:26:14', '2020-09-30 21:26:14'),
(6, 1, '2020-10-01 11:11:47', '2020-10-01 11:11:47'),
(10, 1, '2020-10-01 11:18:53', '2020-10-01 11:18:53'),
(13, 1, '2020-10-01 11:39:34', '2020-10-01 11:39:34'),
(17, 1, '2020-10-01 14:41:03', '2020-10-01 14:41:03'),
(19, 1, '2020-10-01 15:05:58', '2020-10-01 15:05:58'),
(20, 1, '2020-10-01 15:08:57', '2020-10-01 15:08:57'),
(21, 1, '2020-10-01 15:13:37', '2020-10-01 15:13:37'),
(21, 3, '2020-10-01 15:13:37', '2020-10-01 15:13:37'),
(21, 4, '2020-10-01 15:13:37', '2020-10-01 15:13:37'),
(21, 5, '2020-10-01 15:13:37', '2020-10-01 15:13:37'),
(21, 7, '2020-10-01 15:13:37', '2020-10-01 15:13:37'),
(21, 8, '2020-10-01 15:13:37', '2020-10-01 15:13:37'),
(22, 1, '2020-10-01 15:18:49', '2020-10-01 15:18:49'),
(23, 1, '2020-10-01 16:05:58', '2020-10-01 16:05:58'),
(24, 1, '2020-10-02 16:23:45', '2020-10-02 16:23:45'),
(24, 3, '2020-10-02 16:23:45', '2020-10-02 16:23:45'),
(24, 4, '2020-10-02 16:23:45', '2020-10-02 16:23:45'),
(25, 1, '2020-10-04 15:46:41', '2020-10-04 15:46:41'),
(25, 2, NULL, NULL),
(26, 1, '2020-10-04 16:33:37', '2020-10-04 16:33:37'),
(26, 3, '2020-10-04 16:33:37', '2020-10-04 16:33:37'),
(27, 1, '2020-10-04 16:36:14', '2020-10-04 16:36:14'),
(27, 3, '2020-10-04 16:36:14', '2020-10-04 16:36:14'),
(28, 1, '2020-10-04 16:38:00', '2020-10-04 16:38:00'),
(29, 1, '2020-10-04 16:43:17', '2020-10-04 16:43:17'),
(29, 3, '2020-10-04 16:43:17', '2020-10-04 16:43:17'),
(30, 3, '2020-10-09 14:17:49', '2020-10-09 14:17:49'),
(31, 1, '2020-10-12 14:03:45', '2020-10-12 14:03:45'),
(31, 5, '2020-10-12 14:03:45', '2020-10-12 14:03:45'),
(31, 7, '2020-10-12 14:03:45', '2020-10-12 14:03:45'),
(34, 3, '2020-10-16 14:28:42', '2020-10-16 14:28:42');

-- --------------------------------------------------------

--
-- Structure de la table `spas`
--

CREATE TABLE `spas` (
  `spa_id` int(11) NOT NULL,
  `spa_stock` int(11) NOT NULL DEFAULT '0',
  `spa_libelle` varchar(100) NOT NULL,
  `spa_nb_place` int(11) NOT NULL DEFAULT '0',
  `spa_desc` text,
  `spa_chemin_img` varchar(100) DEFAULT NULL,
  `spa_prix` decimal(10,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `spas`
--

INSERT INTO `spas` (`spa_id`, `spa_stock`, `spa_libelle`, `spa_nb_place`, `spa_desc`, `spa_chemin_img`, `spa_prix`, `created_at`, `updated_at`) VALUES
(1, 1, 'Spa Sahara', 4, 'Couleur sable<br>idéal pour l\'interieur', 'medias/img/spas/spa-sahara.png', '90.00', NULL, NULL),
(2, 1, 'Spa Navy', 4, 'Couleur bleu nuit<br>idéal pour une soirée', 'medias/img/spas/spa-navy.png', '90.00', NULL, NULL),
(3, 1, 'Spa Baltik', 4, 'Couleur gris boisé<br>idéal pour l\'extérieur', 'medias/img/spas/spa-baltik.png', '90.00', NULL, NULL),
(4, 0, 'Spa Baltik', 6, 'Octogonal et gris boisé<br>idéal pour l\'extérieur', 'medias/img/spas/spa-baltik.png', '120.00', NULL, NULL),
(5, 0, 'Spa Carbone', 6, 'Octogonal soir et blanc<br>idéal pour une soirée', 'medias/img/spas/spa-carbone.png', '160.00', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_login` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_rank_id` int(11) NOT NULL,
  `user_last_connection` datetime DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `user_login`, `user_password`, `user_rank_id`, `user_last_connection`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'jlemontAdmin', '8feddb3014a070097df081ed63f1ca7c2cae3499', 1, NULL, NULL, '2020-09-19 22:00:00', NULL),
(2, 'jlemontCustomer', '8feddb3014a070097df081ed63f1ca7c2cae3499', 2, NULL, NULL, '2020-09-20 22:00:00', NULL),
(3, 'Alexandre', 'a64df9f267517d5caddc282637e244bd0688dc3a', 1, NULL, NULL, NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `accessoires`
--
ALTER TABLE `accessoires`
  ADD PRIMARY KEY (`accessoire_id`);

--
-- Index pour la table `administrateurs`
--
ALTER TABLE `administrateurs`
  ADD PRIMARY KEY (`administrateur_id`),
  ADD KEY `administrateur_user_id` (`administrateur_user_id`);

--
-- Index pour la table `adresses`
--
ALTER TABLE `adresses`
  ADD PRIMARY KEY (`adresse_id`),
  ADD KEY `adresse_client_id` (`adresse_client_id`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`),
  ADD KEY `client_user_id` (`client_user_id`);

--
-- Index pour la table `indisponibilites`
--
ALTER TABLE `indisponibilites`
  ADD PRIMARY KEY (`indisponibilite_id`);

--
-- Index pour la table `packs`
--
ALTER TABLE `packs`
  ADD PRIMARY KEY (`pack_id`);

--
-- Index pour la table `promos`
--
ALTER TABLE `promos`
  ADD PRIMARY KEY (`promo_id`);

--
-- Index pour la table `ranks`
--
ALTER TABLE `ranks`
  ADD PRIMARY KEY (`rank_id`);

--
-- Index pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `reservation_pack_id` (`reservation_pack_id`),
  ADD KEY `reservation_spa_id` (`reservation_spa_id`),
  ADD KEY `reservation_client_id` (`reservation_client_id`);

--
-- Index pour la table `reservations_accessoires`
--
ALTER TABLE `reservations_accessoires`
  ADD PRIMARY KEY (`ra_reservation_id`,`ra_accessoire_id`),
  ADD KEY `ra_accessoire_id` (`ra_accessoire_id`);

--
-- Index pour la table `spas`
--
ALTER TABLE `spas`
  ADD PRIMARY KEY (`spa_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_rank_id` (`user_rank_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `accessoires`
--
ALTER TABLE `accessoires`
  MODIFY `accessoire_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `administrateurs`
--
ALTER TABLE `administrateurs`
  MODIFY `administrateur_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `adresses`
--
ALTER TABLE `adresses`
  MODIFY `adresse_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `indisponibilites`
--
ALTER TABLE `indisponibilites`
  MODIFY `indisponibilite_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `packs`
--
ALTER TABLE `packs`
  MODIFY `pack_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `promos`
--
ALTER TABLE `promos`
  MODIFY `promo_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `ranks`
--
ALTER TABLE `ranks`
  MODIFY `rank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pour la table `spas`
--
ALTER TABLE `spas`
  MODIFY `spa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `administrateurs`
--
ALTER TABLE `administrateurs`
  ADD CONSTRAINT `administrateurs_ibfk_1` FOREIGN KEY (`administrateur_user_id`) REFERENCES `users` (`user_id`);

--
-- Contraintes pour la table `adresses`
--
ALTER TABLE `adresses`
  ADD CONSTRAINT `adresses_ibfk_1` FOREIGN KEY (`adresse_client_id`) REFERENCES `clients` (`client_id`);

--
-- Contraintes pour la table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_ibfk_1` FOREIGN KEY (`client_user_id`) REFERENCES `users` (`user_id`);

--
-- Contraintes pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_3` FOREIGN KEY (`reservation_pack_id`) REFERENCES `packs` (`pack_id`),
  ADD CONSTRAINT `reservations_ibfk_4` FOREIGN KEY (`reservation_spa_id`) REFERENCES `spas` (`spa_id`),
  ADD CONSTRAINT `reservations_ibfk_5` FOREIGN KEY (`reservation_client_id`) REFERENCES `clients` (`client_id`);

--
-- Contraintes pour la table `reservations_accessoires`
--
ALTER TABLE `reservations_accessoires`
  ADD CONSTRAINT `reservations_accessoires_ibfk_1` FOREIGN KEY (`ra_reservation_id`) REFERENCES `reservations` (`reservation_id`),
  ADD CONSTRAINT `reservations_accessoires_ibfk_2` FOREIGN KEY (`ra_accessoire_id`) REFERENCES `accessoires` (`accessoire_id`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_rank_id`) REFERENCES `ranks` (`rank_id`);
