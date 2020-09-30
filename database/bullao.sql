-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Sep 30, 2020 at 09:03 PM
-- Server version: 5.7.26
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `bullao`
--
CREATE DATABASE IF NOT EXISTS `bullao` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `bullao`;

-- --------------------------------------------------------

--
-- Table structure for table `accessoires`
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
-- Dumping data for table `accessoires`
--

INSERT INTO `accessoires` (`accessoire_id`, `accessoire_libelle`, `accessoire_description`, `accessoire_prix`, `accessoire_stock`, `accessoire_chemin_img`, `created_at`, `updated_at`) VALUES
(1, 'Enceinte Bose', 'Description', '9.00', 1, 'medias/img/accessoires/enceinte.jpg', NULL, NULL),
(2, 'Marche pied', 'Description', '6.00', 0, 'medias/img/accessoires/marche-pied.jpg', NULL, NULL),
(3, 'Parfum positivant', 'Description', '3.00', 15, 'medias/img/accessoires/parfum-1.jpg', NULL, NULL),
(4, 'Parfum fraicheur', 'Description', '3.00', 15, 'medias/img/accessoires/parfum-2.jpg', NULL, NULL),
(5, 'Parfum Love', 'Description', '3.00', 30, 'medias/img/accessoires/parfum-3.jpg', NULL, NULL),
(6, 'Pouf lumineux', 'Description', '5.00', 0, 'medias/img/accessoires/pouf.jpg', NULL, NULL),
(7, 'Porte verre-double', 'Description', '2.00', 3, 'medias/img/accessoires/porte-verre.jpg', NULL, NULL),
(8, 'Siège confort X2', 'Description', '10.00', 1, 'medias/img/accessoires/siege-confort.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `administrateurs`
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
-- Dumping data for table `administrateurs`
--

INSERT INTO `administrateurs` (`administrateur_id`, `administrateur_name`, `administrateur_phone`, `administrateur_email`, `administrateur_user_id`, `created_at`, `updated_at`) VALUES
(1, 'Jérémy Lémont', '0631727083', 'jerem-lem@hotmail.fr', 1, '2020-09-19 22:00:00', NULL),
(2, 'Alexandre', '0613377128', 'cnl.alexandre@gmail.com', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
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
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `client_name`, `client_user_id`, `client_adresse_1`, `client_adresse_2`, `client_cp`, `client_ville`, `client_email`, `client_phone`, `created_at`, `updated_at`) VALUES
(1, 'Jérémy Lémont', 2, '11 rue Pablo Néruda', 'Interphone au nom de SKYBYK', '77200', 'Torcy', 'jerem-lem@hotmail.fr', '0631727083', '2020-09-20 22:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `indisponibilites`
--

CREATE TABLE `indisponibilites` (
  `indisponibilite_id` int(11) NOT NULL,
  `indisponibilite_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `indisponibilites`
--

INSERT INTO `indisponibilites` (`indisponibilite_id`, `indisponibilite_date`, `created_at`, `updated_at`) VALUES
(1, '2020-09-21', NULL, NULL),
(2, '2020-09-22', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `packs`
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
-- Dumping data for table `packs`
--

INSERT INTO `packs` (`pack_id`, `pack_libelle`, `pack_description`, `pack_stock`, `pack_prix`, `pack_chemin_img`, `created_at`, `updated_at`) VALUES
(1, 'Pack Fun', 'Description', 1, '20.00', 'medias/img/no-image.png', NULL, NULL),
(2, 'Pack Romance', 'Pétales de rose en soie, ballons coeur, lumière tamisée, spa parfumé Love, 2 sièges premium', 1, '20.00', 'medias/img/no-image.png', NULL, NULL),
(3, 'Pack Chill', 'Description', 1, '20.00', 'medias/img/no-image.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `promos`
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
-- Dumping data for table `promos`
--

INSERT INTO `promos` (`promo_id`, `promo_libelle`, `promo_valeur`, `promo_date_debut`, `promo_date_fin`, `created_at`, `updated_at`) VALUES
(1, 'MONTEV2020', 10, NULL, NULL, NULL, NULL),
(2, 'COPAIN2020', 15, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ranks`
--

CREATE TABLE `ranks` (
  `rank_id` int(11) NOT NULL,
  `rank_libelle` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ranks`
--

INSERT INTO `ranks` (`rank_id`, `rank_libelle`, `created_at`, `updated_at`) VALUES
(1, 'Administrateur', NULL, NULL),
(2, 'Client', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `reservation_id` int(11) NOT NULL,
  `reservation_date_debut` date NOT NULL,
  `reservation_date_fin` date NOT NULL,
  `reservation_creneau` varchar(25) NOT NULL,
  `reservation_emplacement` varchar(100) NOT NULL,
  `reservation_type_logement` varchar(100) NOT NULL,
  `reservation_spa_id` int(11) DEFAULT NULL,
  `reservation_spa_libelle` varchar(100) NOT NULL,
  `reservation_prix` decimal(10,2) NOT NULL,
  `reservation_pack_id` int(11) DEFAULT NULL,
  `reservation_prix_pack` decimal(10,2) DEFAULT NULL,
  `reservation_montant_total` decimal(10,2) NOT NULL,
  `reservation_promo` varchar(20) DEFAULT NULL,
  `reservation_paye` int(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`reservation_id`, `reservation_date_debut`, `reservation_date_fin`, `reservation_creneau`, `reservation_emplacement`, `reservation_type_logement`, `reservation_spa_id`, `reservation_spa_libelle`, `reservation_prix`, `reservation_pack_id`, `reservation_prix_pack`, `reservation_montant_total`, `reservation_promo`, `reservation_paye`, `created_at`, `updated_at`) VALUES
(1, '2020-09-28', '2020-09-30', 'aprem', 'exterieur', 'appartement', 0, '', '90.00', 3, '20.00', '90.00', 'F2P9K4', 0, '2020-09-25 23:04:14', '2020-09-25 23:04:14'),
(2, '2020-10-14', '2020-10-15', 'aprem', 'exterieur', 'appartement', 0, '', '90.00', 2, '20.00', '119.00', 'COPAIN2020', 0, '2020-09-30 16:03:02', '2020-09-30 16:03:02'),
(3, '2020-10-06', '2020-10-08', 'aprem', 'exterieur', 'appartement', 0, '', '130.00', 2, '20.00', '153.00', NULL, 0, '2020-09-30 19:55:14', '2020-09-30 19:55:14'),
(4, '2020-10-06', '2020-10-08', 'aprem', 'exterieur', 'appartement', 0, '', '130.00', 2, '20.00', '159.00', NULL, 0, '2020-09-30 19:59:25', '2020-09-30 19:59:25');

-- --------------------------------------------------------

--
-- Table structure for table `reservations_accessoires`
--

CREATE TABLE `reservations_accessoires` (
  `ra_reservation_id` int(11) NOT NULL,
  `ra_accessoire_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reservations_accessoires`
--

INSERT INTO `reservations_accessoires` (`ra_reservation_id`, `ra_accessoire_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-09-25 23:04:14', '2020-09-25 23:04:14'),
(1, 2, '2020-09-25 23:04:14', '2020-09-25 23:04:14'),
(1, 6, '2020-09-25 23:04:14', '2020-09-25 23:04:14'),
(2, 1, '2020-09-30 16:03:02', '2020-09-30 16:03:02'),
(3, 3, '2020-09-30 19:55:14', '2020-09-30 19:55:14'),
(4, 1, '2020-09-30 19:59:25', '2020-09-30 19:59:25');

-- --------------------------------------------------------

--
-- Table structure for table `spas`
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
-- Dumping data for table `spas`
--

INSERT INTO `spas` (`spa_id`, `spa_stock`, `spa_libelle`, `spa_nb_place`, `spa_desc`, `spa_chemin_img`, `spa_prix`, `created_at`, `updated_at`) VALUES
(1, 1, 'Spa Sahara', 4, 'Couleur sable<br>idéal pour l\'interieur', 'medias/img/spas/couleur-sahara.png', '90.00', NULL, NULL),
(2, 1, 'Spa Navy', 4, 'Couleur bleu nuit<br>idéal pour une soirée', 'medias/img/spas/couleur-navy.png', '90.00', NULL, NULL),
(3, 1, 'Spa Baltik', 4, 'Couleur gris boisé<br>idéal pour l\'extérieur', 'medias/img/spas/couleur-baltik.png', '90.00', NULL, NULL),
(4, 0, 'Spa Navy', 6, 'Rond et bleu nuit<br>idéal pour une soirée', 'medias/img/spas/couleur-navy.png', '120.00', NULL, NULL),
(5, 0, 'Spa Baltik', 6, 'Octogonal et gris boisé<br>idéal pour l\'extérieur', 'medias/img/spas/couleur-baltik.png', '120.00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_login`, `user_password`, `user_rank_id`, `user_last_connection`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'jlemontAdmin', '8feddb3014a070097df081ed63f1ca7c2cae3499', 1, NULL, NULL, '2020-09-19 22:00:00', NULL),
(2, 'jlemontCustomer', '8feddb3014a070097df081ed63f1ca7c2cae3499', 2, NULL, NULL, '2020-09-20 22:00:00', NULL),
(3, 'Alexandre', 'a64df9f267517d5caddc282637e244bd0688dc3a', 1, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accessoires`
--
ALTER TABLE `accessoires`
  ADD PRIMARY KEY (`accessoire_id`);

--
-- Indexes for table `administrateurs`
--
ALTER TABLE `administrateurs`
  ADD PRIMARY KEY (`administrateur_id`),
  ADD KEY `administrateur_user_id` (`administrateur_user_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`),
  ADD KEY `client_user_id` (`client_user_id`);

--
-- Indexes for table `indisponibilites`
--
ALTER TABLE `indisponibilites`
  ADD PRIMARY KEY (`indisponibilite_id`);

--
-- Indexes for table `packs`
--
ALTER TABLE `packs`
  ADD PRIMARY KEY (`pack_id`);

--
-- Indexes for table `promos`
--
ALTER TABLE `promos`
  ADD PRIMARY KEY (`promo_id`);

--
-- Indexes for table `ranks`
--
ALTER TABLE `ranks`
  ADD PRIMARY KEY (`rank_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `reservation_pack_id` (`reservation_pack_id`),
  ADD KEY `reservation_spa_id` (`reservation_spa_id`);

--
-- Indexes for table `reservations_accessoires`
--
ALTER TABLE `reservations_accessoires`
  ADD PRIMARY KEY (`ra_reservation_id`,`ra_accessoire_id`),
  ADD KEY `ra_accessoire_id` (`ra_accessoire_id`);

--
-- Indexes for table `spas`
--
ALTER TABLE `spas`
  ADD PRIMARY KEY (`spa_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_rank_id` (`user_rank_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accessoires`
--
ALTER TABLE `accessoires`
  MODIFY `accessoire_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `administrateurs`
--
ALTER TABLE `administrateurs`
  MODIFY `administrateur_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `indisponibilites`
--
ALTER TABLE `indisponibilites`
  MODIFY `indisponibilite_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `packs`
--
ALTER TABLE `packs`
  MODIFY `pack_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `promos`
--
ALTER TABLE `promos`
  MODIFY `promo_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ranks`
--
ALTER TABLE `ranks`
  MODIFY `rank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `spas`
--
ALTER TABLE `spas`
  MODIFY `spa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `administrateurs`
--
ALTER TABLE `administrateurs`
  ADD CONSTRAINT `administrateurs_ibfk_1` FOREIGN KEY (`administrateur_user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_ibfk_1` FOREIGN KEY (`client_user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_3` FOREIGN KEY (`reservation_pack_id`) REFERENCES `packs` (`pack_id`);

--
-- Constraints for table `reservations_accessoires`
--
ALTER TABLE `reservations_accessoires`
  ADD CONSTRAINT `reservations_accessoires_ibfk_1` FOREIGN KEY (`ra_reservation_id`) REFERENCES `reservations` (`reservation_id`),
  ADD CONSTRAINT `reservations_accessoires_ibfk_2` FOREIGN KEY (`ra_accessoire_id`) REFERENCES `accessoires` (`accessoire_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_rank_id`) REFERENCES `ranks` (`rank_id`);
