-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : Dim 13 sep. 2020 à 16:36
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `client_id` int(11) NOT NULL,
  `client_name` varchar(100) NOT NULL,
  `client_user_id` int(11) NOT NULL,
  `client_adresse_1` varchar(100) NOT NULL,
  `client_adresse_2` varchar(100) DEFAULT NULL,
  `client_cp` varchar(5) NOT NULL,
  `client_ville` varchar(100) NOT NULL,
  `client_email` varchar(100) NOT NULL,
  `client_phone` varchar(10) NOT NULL,
  `client_type_logement` varchar(50) DEFAULT NULL,
  `client_emplacement` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

CREATE TABLE `reservations` (
  `reservation_id` int(11) NOT NULL,
  `reservation_date_debut` datetime NOT NULL,
  `reservation_date_fin` datetime NOT NULL,
  `reservation_emplacement` varchar(100) NOT NULL,
  `reservation_type_logement` varchar(100) NOT NULL,
  `reservation_prix` decimal(10,2) NOT NULL,
  `reservation_pack_id` int(11) DEFAULT NULL,
  `reservation_prix_pack` decimal(10,2) DEFAULT NULL,
  `reservation_accessoire_1_id` int(11) DEFAULT NULL,
  `reservation_prix_accessoire_1` decimal(10,2) DEFAULT NULL,
  `reservation_accessoire_2_id` int(11) DEFAULT NULL,
  `reservation_prix_accessoire_2` decimal(10,2) DEFAULT NULL,
  `reservation_montant_total` decimal(10,2) NOT NULL,
  `reservation_promo` decimal(5,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `spas`
--

CREATE TABLE `spas` (
  `spa_id` int(11) NOT NULL,
  `spa_stock` int(11) NOT NULL DEFAULT '0',
  `spa_libelle` varchar(100) NOT NULL,
  `spa_nb_place` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_login` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`),
  ADD KEY `client_user_id` (`client_user_id`);

--
-- Index pour la table `packs`
--
ALTER TABLE `packs`
  ADD PRIMARY KEY (`pack_id`);

--
-- Index pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `reservation_accessoire_1_id` (`reservation_accessoire_1_id`),
  ADD KEY `reservation_accessoire_2_id` (`reservation_accessoire_2_id`),
  ADD KEY `reservation_pack_id` (`reservation_pack_id`);

--
-- Index pour la table `spas`
--
ALTER TABLE `spas`
  ADD PRIMARY KEY (`spa_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `accessoires`
--
ALTER TABLE `accessoires`
  MODIFY `accessoire_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `administrateurs`
--
ALTER TABLE `administrateurs`
  MODIFY `administrateur_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `packs`
--
ALTER TABLE `packs`
  MODIFY `pack_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `spas`
--
ALTER TABLE `spas`
  MODIFY `spa_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `administrateurs`
--
ALTER TABLE `administrateurs`
  ADD CONSTRAINT `administrateurs_ibfk_1` FOREIGN KEY (`administrateur_user_id`) REFERENCES `users` (`user_id`);

--
-- Contraintes pour la table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_ibfk_1` FOREIGN KEY (`client_user_id`) REFERENCES `users` (`user_id`);

--
-- Contraintes pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`reservation_accessoire_1_id`) REFERENCES `accessoires` (`accessoire_id`),
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`reservation_accessoire_2_id`) REFERENCES `accessoires` (`accessoire_id`),
  ADD CONSTRAINT `reservations_ibfk_3` FOREIGN KEY (`reservation_pack_id`) REFERENCES `packs` (`pack_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
