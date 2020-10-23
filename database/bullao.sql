-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  ven. 23 oct. 2020 à 23:09
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
  `accessoire_description` text,
  `accessoire_prix` decimal(10,2) NOT NULL,
  `accessoire_stock` int(11) NOT NULL DEFAULT '0',
  `accessoire_conso` int(1) NOT NULL DEFAULT '0',
  `accessoire_chemin_img` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `accessoires`
--

INSERT INTO `accessoires` (`accessoire_id`, `accessoire_libelle`, `accessoire_description`, `accessoire_prix`, `accessoire_stock`, `accessoire_conso`, `accessoire_chemin_img`, `created_at`, `updated_at`) VALUES
(1, 'Enceinte Bose', 'Description', '9.00', 12, 0, 'medias/img/accessoires/enceinte.png', NULL, '2020-10-20 14:22:26'),
(2, 'Marche pied', 'Description', '6.00', 0, 0, 'medias/img/accessoires/marche-pied.png', NULL, NULL),
(3, 'Parfum positivant', 'Description', '3.00', 15, 1, 'medias/img/accessoires/parfum-positive.png', NULL, NULL),
(4, 'Parfum fraicheur', 'Description', '3.00', 15, 1, 'medias/img/accessoires/parfum-energie.png', NULL, NULL),
(5, 'Parfum Love', 'Description', '3.00', 30, 1, 'medias/img/accessoires/parfum-love.png', NULL, NULL),
(6, 'Pouf lumineux', 'Description', '5.00', 0, 0, 'medias/img/accessoires/pouf-lumineux.png', NULL, NULL),
(7, 'Porte verre', 'Description', '2.00', 3, 0, 'medias/img/accessoires/porte-verre.png', NULL, NULL),
(8, 'Siège confort X2', 'Description', '10.00', 1, 0, 'medias/img/accessoires/siege-confort.png', NULL, NULL);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `adresses`
--

INSERT INTO `adresses` (`adresse_id`, `adresse_name`, `adresse_client_id`, `adresse_rue`, `adresse_cp`, `adresse_ville`, `adresse_complement`, `adresse_departement`, `created_at`, `updated_at`) VALUES
(5, 'Principale', 7, '11 rue Pablo Néruda', NULL, 'Torcy', 'Interphone au nom de Skybyk', '77', '2020-10-17 11:15:29', '2020-10-17 11:15:29'),
(6, 'Principale', 8, '11 rue Pablo Néruda', NULL, 'Torcy', 'Interphone au nom de Skybyk', '77', '2020-10-17 11:19:43', '2020-10-17 11:19:43'),
(7, 'Principale', 9, '11 rue Pablo Néruda', NULL, 'Torcy', 'Interphone au nom de Skybyk', '77', '2020-10-17 11:24:33', '2020-10-17 11:24:33'),
(8, 'Principale', 10, '19 chemin de la porte verte', NULL, '77144 - MONTEVRAIN', NULL, '75', '2020-10-20 11:36:10', '2020-10-20 11:36:10'),
(9, 'Principale', 11, '19 chemin de la porte verte', NULL, 'MONTEVRAIN', NULL, '77', '2020-10-20 15:23:59', '2020-10-20 15:23:59');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `client_id` int(11) NOT NULL,
  `client_name` varchar(100) NOT NULL,
  `client_user_id` int(11) DEFAULT NULL,
  `client_email` varchar(100) NOT NULL,
  `client_phone` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`client_id`, `client_name`, `client_user_id`, `client_email`, `client_phone`, `created_at`, `updated_at`) VALUES
(7, 'Jérémy Lémont', NULL, 'jerem-lem@hotmail.fr', '0631727083', '2020-10-17 11:15:29', '2020-10-17 11:15:29'),
(8, 'Jérémy Lémont', NULL, 'jerem-lem@hotmail.fr', '0631727083', '2020-10-17 11:19:43', '2020-10-17 11:19:43'),
(9, 'Jérémy Lémont', NULL, 'cnl.alexandre@gmail.com', '0631727083', '2020-10-17 11:24:33', '2020-10-17 11:24:33'),
(10, 'Alexandre Conil', NULL, 'cnl.alexandre@gmail.com', '0613377128', '2020-10-20 11:36:10', '2020-10-20 11:36:10'),
(11, 'Alexandre Conil', NULL, 'cnl.alexandre@gmail.com', '0613377128', '2020-10-20 15:23:59', '2020-10-20 15:23:59');

-- --------------------------------------------------------

--
-- Structure de la table `indisponibilites`
--

CREATE TABLE `indisponibilites` (
  `indisponibilite_id` int(11) NOT NULL,
  `indisponibilite_date` date NOT NULL,
  `indisponibilite_desc` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `indisponibilites`
--

INSERT INTO `indisponibilites` (`indisponibilite_id`, `indisponibilite_date`, `indisponibilite_desc`, `created_at`, `updated_at`) VALUES
(1, '2020-09-21', NULL, NULL, NULL),
(2, '2020-09-22', NULL, NULL, NULL),
(3, '2020-11-16', 'caserne', '2020-10-23 13:28:51', '2020-10-23 13:29:06');

-- --------------------------------------------------------

--
-- Structure de la table `packs`
--

CREATE TABLE `packs` (
  `pack_id` int(11) NOT NULL,
  `pack_libelle` varchar(100) NOT NULL,
  `pack_description` text,
  `pack_stock` int(11) NOT NULL DEFAULT '0',
  `pack_prix` decimal(10,2) NOT NULL,
  `pack_chemin_img` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `packs`
--

INSERT INTO `packs` (`pack_id`, `pack_libelle`, `pack_description`, `pack_stock`, `pack_prix`, `pack_chemin_img`, `created_at`, `updated_at`) VALUES
(1, 'Pack Fun', 'Pour une fête réussie : une guirlande lumineuse, des ballons brillants métallisés, un pose-verre en plus, une enceinte portable étanche Bose©, une petite machine à fumée et une dose de parfum positivant.', 1, '20.00', 'medias/img/packs/pack-fun.png', NULL, '2020-10-20 13:49:22'),
(2, 'Pack Romance', 'Sortez-lui le grand jeu avec ce pack romantique comprenant : des pétales de   rose en soie, des ballons en forme de coeur, une lumière tamisée, un spa parfumé « Love » et 2 sièges confort premium.', 1, '20.00', 'medias/img/packs/pack-love.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `promos`
--

CREATE TABLE `promos` (
  `promo_id` int(5) NOT NULL,
  `promo_libelle` varchar(25) NOT NULL,
  `promo_valeur` int(5) NOT NULL,
  `promo_date_debut` date DEFAULT NULL,
  `promo_date_fin` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `promos`
--

INSERT INTO `promos` (`promo_id`, `promo_libelle`, `promo_valeur`, `promo_date_debut`, `promo_date_fin`, `created_at`, `updated_at`) VALUES
(1, 'MONTEV2020', 10, '2020-11-01', NULL, NULL, NULL),
(2, 'COPAIN2020', 15, '2020-11-01', '2020-12-31', NULL, '2020-10-22 14:45:02'),
(3, 'LGM2020', 15, '2020-11-01', NULL, NULL, NULL);

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
  `reservation_creneau` varchar(50) DEFAULT NULL,
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
  `reservation_payment_id` varchar(100) DEFAULT NULL,
  `reservation_client_id` int(11) DEFAULT NULL,
  `reservation_email` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`reservation_id`, `reservation_date_debut`, `reservation_date_fin`, `reservation_creneau`, `reservation_emplacement`, `reservation_rue`, `reservation_cp`, `reservation_ville`, `reservation_complement`, `reservation_departement`, `reservation_type_logement`, `reservation_spa_id`, `reservation_spa_libelle`, `reservation_prix`, `reservation_pack_id`, `reservation_prix_pack`, `reservation_montant_total`, `reservation_promo`, `reservation_paye`, `reservation_payment_id`, `reservation_client_id`, `reservation_email`, `created_at`, `updated_at`) VALUES
(20, '2020-10-18', '2020-10-19', 'Entre 8h et 12h', 'Interieur', '11 rue Pablo Néruda', NULL, 'Torcy', 'Interphone au nom de Skybyk', '77', 'Appartement', 5, 'Spa Carbone 6 places', '160.00', 1, '20.00', '173.40', 'COPAIN2020', 1, '', 7, NULL, '2020-10-17 11:13:43', '2020-10-17 11:15:29'),
(21, '2020-10-18', '2020-10-22', 'Entre 12h et 15h', 'Interieur', '11 rue Pablo Néruda', NULL, 'Torcy', 'Interphone au nom de Skybyk', '77', 'Appartement', 4, 'Spa Baltik 6 places', '120.00', NULL, '20.00', '232.00', NULL, 1, '', 8, NULL, '2020-10-17 11:19:03', '2020-10-17 11:19:43'),
(22, '2020-10-18', '2020-10-19', 'Entre 15h et 20h', 'Interieur', '11 rue Pablo Néruda', NULL, 'Torcy', 'Interphone au nom de Skybyk', '77', 'Appartement', 1, 'Spa Sahara 4 places', '90.00', 1, '20.00', '97.75', 'COPAIN2020', 1, '', 9, 'cnl.alexandre@gmail.com', '2020-10-17 11:20:45', '2020-10-17 11:24:33'),
(23, '2020-10-26', '2020-10-28', 'Entre 8h et 12h', 'Interieur', '11 rue Pablo Néruda', NULL, 'Torcy', NULL, '77', 'Maison', 1, 'Spa Sahara 4 places', '90.00', 2, '20.00', '143.00', NULL, 1, '', 9, 'cnl.alexandre@gmail.com', '2020-10-17 11:25:55', '2020-10-17 11:25:55'),
(24, '2020-10-18', '2020-10-19', 'Entre 12h et 15h', 'Interieur', '11 rue Pablo Néruda', NULL, 'Torcy', 'Interphone au nom de Skybyk', '77', 'Appartement', 2, 'Spa Navy 4 places', '90.00', 1, '20.00', '113.00', NULL, 1, '', 9, 'cnl.alexandre@gmail.com', '2020-10-17 11:28:12', '2020-10-17 11:28:12'),
(25, '2020-10-14', '2020-10-16', 'Entre 12h et 15h', 'Interieur', '11 rue Pablo Néruda', NULL, 'Torcy', NULL, '77', 'Maison', 3, 'Spa Baltik 4 places', '90.00', NULL, NULL, '95.00', NULL, 1, '', 9, 'cnl.alexandre@gmail.com', '2020-10-17 11:31:11', '2020-10-17 11:31:11'),
(26, '2020-10-22', '2020-10-24', 'Entre 15h et 20h', 'Interieur', '11 rue Pablo Néruda', NULL, 'Torcy', NULL, '77', 'Maison', 2, 'Spa Navy 4 places', '90.00', NULL, NULL, '123.00', NULL, 1, '', 9, 'cnl.alexandre@gmail.com', '2020-10-18 15:46:56', '2020-10-18 15:46:56'),
(27, '2020-10-21', '2020-10-22', 'Entre 12h et 15h', 'Interieur', '19 chemin de la porte verte', NULL, '77144 - MONTEVRAIN', NULL, '75', 'Maison', 1, 'Spa Sahara 4 places', '90.00', 2, '20.00', '122.00', NULL, 0, 'pi_1HeJfkGOBvkHIeeTX1ebfCi6', 10, 'cnl.alexandre@gmail.com', '2020-10-20 11:34:10', '2020-10-20 12:10:36'),
(28, '2020-10-21', '2020-10-22', 'Entre 12h et 15h', 'Interieur', '19 chemin de la porte verte', NULL, 'MONTEVRAIN', NULL, '77', 'Appartement', 5, 'Spa Carbone 6 places', '160.00', NULL, NULL, '179.00', NULL, 1, 'pi_1HeMguGOBvkHIeeTqonkU2ND', 11, 'cnl.alexandre@gmail.com', '2020-10-20 15:23:43', '2020-10-20 15:24:11'),
(29, '2020-10-24', '2020-10-25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 'Spa Baltik 4 places', '90.00', NULL, NULL, '109.00', NULL, 0, NULL, NULL, NULL, '2020-10-21 12:52:26', '2020-10-21 12:52:26'),
(30, '2021-02-11', '2021-02-13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 'Spa Baltik 4 places', '90.00', 2, '20.00', '140.00', NULL, 0, NULL, NULL, NULL, '2020-10-23 10:43:05', '2020-10-23 10:43:05'),
(31, '2020-11-05', '2020-11-07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Spa Sahara 4 places', '90.00', NULL, NULL, '120.00', NULL, 0, NULL, NULL, NULL, '2020-10-23 22:17:39', '2020-10-23 22:17:39');

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
(20, 1, '2020-10-17 11:13:43', '2020-10-17 11:13:43'),
(20, 5, '2020-10-17 11:13:43', '2020-10-17 11:13:43'),
(20, 7, '2020-10-17 11:13:43', '2020-10-17 11:13:43'),
(20, 8, '2020-10-17 11:13:43', '2020-10-17 11:13:43'),
(21, 7, '2020-10-17 11:19:03', '2020-10-17 11:19:03'),
(22, 5, '2020-10-17 11:20:45', '2020-10-17 11:20:45'),
(22, 7, '2020-10-17 11:20:45', '2020-10-17 11:20:45'),
(23, 5, '2020-10-17 11:25:55', '2020-10-17 11:25:55'),
(24, 5, '2020-10-17 11:28:12', '2020-10-17 11:28:12'),
(25, 3, '2020-10-17 11:31:11', '2020-10-17 11:31:11'),
(25, 7, '2020-10-17 11:31:11', '2020-10-17 11:31:11'),
(26, 3, '2020-10-18 15:46:56', '2020-10-18 15:46:56'),
(27, 1, '2020-10-20 11:34:10', '2020-10-20 11:34:10'),
(27, 5, '2020-10-20 11:34:10', '2020-10-20 11:34:10'),
(28, 1, '2020-10-20 15:23:43', '2020-10-20 15:23:43'),
(29, 1, '2020-10-21 12:52:26', '2020-10-21 12:52:26');

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
  `spa_color` varchar(10) NOT NULL,
  `spa_chemin_img` varchar(100) DEFAULT NULL,
  `spa_prix` decimal(10,2) NOT NULL DEFAULT '0.00',
  `spa_prix_jour_supp` decimal(10,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `spas`
--

INSERT INTO `spas` (`spa_id`, `spa_stock`, `spa_libelle`, `spa_nb_place`, `spa_desc`, `spa_color`, `spa_chemin_img`, `spa_prix`, `spa_prix_jour_supp`, `created_at`, `updated_at`) VALUES
(1, 1, 'Spa Sahara', 4, 'Couleur sable<br>idéal pour l\'interieur', 'f0ad4e', 'medias/img/spas/spa-sahara.png', '90.00', '30.00', '2020-10-20 14:07:33', '2020-10-22 20:19:29'),
(2, 1, 'Spa Navy', 4, 'Couleur bleu nuit<br>idéal pour une soirée', '0288d1', 'medias/img/spas/spa-navy.png', '90.00', '30.00', '2020-10-20 14:07:33', '2020-10-20 14:07:33'),
(3, 1, 'Spa Baltik', 4, 'Couleur gris boisé<br>idéal pour l\'extérieur', '78909c', 'medias/img/spas/spa-baltik.png', '90.00', '30.00', '2020-10-20 14:07:33', '2020-10-20 14:07:33'),
(4, 0, 'Spa Baltik', 6, 'Octogonal et gris boisé<br>idéal pour l\'extérieur', '546e7a', 'medias/img/spas/spa-baltik.png', '120.00', '30.00', '2020-10-20 14:07:33', '2020-10-20 14:07:33'),
(5, 0, 'Spa Carbone', 6, 'Octogonal soir et blanc<br>idéal pour une soirée', '212121', 'medias/img/spas/spa-carbone.png', '160.00', '40.00', '2020-10-20 14:07:33', '2020-10-20 14:07:33');

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
  MODIFY `adresse_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `indisponibilites`
--
ALTER TABLE `indisponibilites`
  MODIFY `indisponibilite_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `packs`
--
ALTER TABLE `packs`
  MODIFY `pack_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

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
