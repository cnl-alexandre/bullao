-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : sam. 17 oct. 2020 à 12:50
-- Version du serveur :  5.7.24
-- Version de PHP : 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bullao`
--

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

INSERT INTO `accessoires` VALUES
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

INSERT INTO `administrateurs` VALUES
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

INSERT INTO `adresses` VALUES
(5, 'Principale', 7, '11 rue Pablo Néruda', NULL, 'Torcy', 'Interphone au nom de Skybyk', '77', '2020-10-17 11:15:29', '2020-10-17 11:15:29'),
(6, 'Principale', 8, '11 rue Pablo Néruda', NULL, 'Torcy', 'Interphone au nom de Skybyk', '77', '2020-10-17 11:19:43', '2020-10-17 11:19:43'),
(7, 'Principale', 9, '11 rue Pablo Néruda', NULL, 'Torcy', 'Interphone au nom de Skybyk', '77', '2020-10-17 11:24:33', '2020-10-17 11:24:33');

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

INSERT INTO `clients` VALUES
(7, 'Jérémy Lémont', NULL, 'jerem-lem@hotmail.fr', '0631727083', '2020-10-17 11:15:29', '2020-10-17 11:15:29'),
(8, 'Jérémy Lémont', NULL, 'jerem-lem@hotmail.fr', '0631727083', '2020-10-17 11:19:43', '2020-10-17 11:19:43'),
(9, 'Jérémy Lémont', NULL, 'jerem-lem@hotmail.fr', '0631727083', '2020-10-17 11:24:33', '2020-10-17 11:24:33');

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

INSERT INTO `indisponibilites` VALUES
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

INSERT INTO `packs` VALUES
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

INSERT INTO `promos` VALUES
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

INSERT INTO `ranks` VALUES
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

INSERT INTO `reservations` VALUES
(20, '2020-10-18', '2020-10-19', 'matin', 'interieur', '11 rue Pablo Néruda', NULL, 'Torcy', 'Interphone au nom de Skybyk', '77', 'appartement', 5, 'Spa Carbone 6 places', '160.00', 1, '20.00', '173.40', 'COPAIN2020', 0, 7, '2020-10-17 11:13:43', '2020-10-17 11:15:29'),
(21, '2020-10-18', '2020-10-22', 'aprem', 'interieur', '11 rue Pablo Néruda', NULL, 'Torcy', 'Interphone au nom de Skybyk', '77', 'appartement', 4, 'Spa Baltik 6 places', '120.00', 3, '20.00', '232.00', NULL, 0, 8, '2020-10-17 11:19:03', '2020-10-17 11:19:43'),
(22, '2020-10-18', '2020-10-19', 'soir', 'interieur', '11 rue Pablo Néruda', NULL, 'Torcy', 'Interphone au nom de Skybyk', '77', 'appartement', 1, 'Spa Sahara 4 places', '90.00', 1, '20.00', '97.75', 'COPAIN2020', 0, 9, '2020-10-17 11:20:45', '2020-10-17 11:24:33'),
(23, '2020-10-26', '2020-10-28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Spa Sahara 4 places', '90.00', 2, '20.00', '143.00', NULL, 0, NULL, '2020-10-17 11:25:55', '2020-10-17 11:25:55'),
(24, '2020-10-18', '2020-10-19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', 1, '20.00', '113.00', NULL, 0, NULL, '2020-10-17 11:28:12', '2020-10-17 11:28:12'),
(25, '2020-10-18', '2020-10-19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 'Spa Baltik 4 places', '90.00', NULL, NULL, '95.00', NULL, 0, NULL, '2020-10-17 11:31:11', '2020-10-17 11:31:11');

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

INSERT INTO `reservations_accessoires` VALUES
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
(25, 7, '2020-10-17 11:31:11', '2020-10-17 11:31:11');

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
  `spa_prix_jour_supp` decimal(10,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `spas`
--

INSERT INTO `spas` VALUES
(1, 1, 'Spa Sahara', 4, 'Couleur sable<br>idéal pour l\'interieur', 'medias/img/spas/spa-sahara.png', '90.00', '30.00', NULL, NULL),
(2, 1, 'Spa Navy', 4, 'Couleur bleu nuit<br>idéal pour une soirée', 'medias/img/spas/spa-navy.png', '90.00', '30.00', NULL, NULL),
(3, 1, 'Spa Baltik', 4, 'Couleur gris boisé<br>idéal pour l\'extérieur', 'medias/img/spas/spa-baltik.png', '90.00', '30.00', NULL, NULL),
(4, 0, 'Spa Baltik', 6, 'Octogonal et gris boisé<br>idéal pour l\'extérieur', 'medias/img/spas/spa-baltik.png', '120.00', '30.00', NULL, NULL),
(5, 0, 'Spa Carbone', 6, 'Octogonal soir et blanc<br>idéal pour une soirée', 'medias/img/spas/spa-carbone.png', '160.00', '40.00', NULL, NULL);

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

INSERT INTO `users` VALUES
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
  MODIFY `adresse_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
