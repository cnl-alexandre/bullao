-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : sam. 13 juin 2020 à 08:45
-- Version du serveur :  5.7.24
-- Version de PHP : 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mf-immo`
--
CREATE DATABASE IF NOT EXISTS `mf-immo` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `mf-immo`;

-- --------------------------------------------------------

--
-- Structure de la table `administrateurs`
--

CREATE TABLE `administrateurs` (
  `administrateur_id` int(11) NOT NULL,
  `administrateur_nom` varchar(50) NOT NULL,
  `administrateur_prenom` varchar(50) NOT NULL,
  `administrateur_email` varchar(50) NOT NULL,
  `administrateur_tel` varchar(15) DEFAULT NULL,
  `administrateur_user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `administrateurs`
--

INSERT INTO `administrateurs` (`administrateur_id`, `administrateur_nom`, `administrateur_prenom`, `administrateur_email`, `administrateur_tel`, `administrateur_user_id`, `created_at`, `updated_at`) VALUES
(1, 'Lémont', 'Jérémy', 'jerem-lem@hotmail.fr', '0631727083', 1, NULL, NULL),
(3, 'Conil', 'Alexandre', 'cnl.alexandre@gmail.com', '0631727083', 7, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `contrats`
--

CREATE TABLE `contrats` (
  `contrat_id` int(11) NOT NULL,
  `contrat_libelle` varchar(100) NOT NULL,
  `contrat_libelle_marketing` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `contrats`
--

INSERT INTO `contrats` (`contrat_id`, `contrat_libelle`, `contrat_libelle_marketing`, `created_at`, `updated_at`) VALUES
(1, 'Vente', 'Acheter', NULL, NULL),
(2, 'Location', 'Louer', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `logements`
--

CREATE TABLE `logements` (
  `logement_id` int(11) NOT NULL,
  `logement_type_id` int(11) NOT NULL,
  `logement_contrat_id` int(11) NOT NULL,
  `logement_exclu` tinyint(1) NOT NULL DEFAULT '0',
  `logement_adresse` varchar(100) NOT NULL,
  `logement_ville` varchar(50) NOT NULL,
  `logement_cp` varchar(5) NOT NULL,
  `logement_prix` decimal(15,0) NOT NULL,
  `logement_superficie` int(5) NOT NULL,
  `logement_nbpiece` int(11) NOT NULL,
  `logement_nbchambre` int(11) NOT NULL,
  `logement_vendu` tinyint(1) NOT NULL DEFAULT '0',
  `logement_vendu_date` datetime DEFAULT NULL,
  `logement_etat` int(11) NOT NULL DEFAULT '0',
  `logement_description` text,
  `logement_nbsdb` int(11) DEFAULT NULL,
  `logement_cuisine` varchar(100) DEFAULT NULL,
  `logement_terrasse` varchar(100) DEFAULT NULL,
  `logement_extension` varchar(100) DEFAULT NULL,
  `logement_exterieur` varchar(100) DEFAULT NULL,
  `logement_garage` varchar(100) DEFAULT NULL,
  `logement_etage` int(11) DEFAULT NULL,
  `logement_ascenseur` tinyint(1) DEFAULT NULL,
  `logement_copropriete` varchar(4) DEFAULT NULL,
  `logement_nblots` int(11) DEFAULT NULL,
  `logement_charges` decimal(10,0) DEFAULT NULL,
  `logement_dpe_lettre` varchar(50) NOT NULL,
  `logement_honoraire` decimal(10,0) DEFAULT NULL,
  `logement_ss_sol` varchar(100) DEFAULT NULL,
  `logement_terrain` varchar(100) DEFAULT NULL,
  `logement_surface_sejour` int(11) DEFAULT NULL,
  `logement_sdo` int(1) DEFAULT NULL,
  `logement_toilettes` int(1) DEFAULT NULL,
  `logement_chauffage` varchar(100) DEFAULT NULL,
  `logement_orientation` varchar(100) DEFAULT NULL,
  `logement_position` int(1) DEFAULT NULL,
  `logement_ratio` decimal(10,0) NOT NULL DEFAULT '0',
  `logement_parking` int(1) DEFAULT NULL,
  `logement_compromis_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `logements`
--

INSERT INTO `logements` (`logement_id`, `logement_type_id`, `logement_contrat_id`, `logement_exclu`, `logement_adresse`, `logement_ville`, `logement_cp`, `logement_prix`, `logement_superficie`, `logement_nbpiece`, `logement_nbchambre`, `logement_vendu`, `logement_vendu_date`, `logement_etat`, `logement_description`, `logement_nbsdb`, `logement_cuisine`, `logement_terrasse`, `logement_extension`, `logement_exterieur`, `logement_garage`, `logement_etage`, `logement_ascenseur`, `logement_copropriete`, `logement_nblots`, `logement_charges`, `logement_dpe_lettre`, `logement_honoraire`, `logement_ss_sol`, `logement_terrain`, `logement_surface_sejour`, `logement_sdo`, `logement_toilettes`, `logement_chauffage`, `logement_orientation`, `logement_position`, `logement_ratio`, `logement_parking`, `logement_compromis_date`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, '3 rue des Platanes', 'Brou-sur-Chantereine', '77177', '168000', 61, 3, 2, 0, NULL, 0, 'Résidence CHANTECLAIR 1, proche écoles, commerces et clinique, bel appartement 3 pièces, situé au 2 ème étage exposé SUD-OUEST de 61 m² comprenant un séjour de 23 m² , une cuisine indépendante équipée accès loggia, un dégagement, 2 chambres avec placards, une salle de bains, wc. Rangement. Une cave et un parking. Fenêtres PVC double vitrage, eau froide et chauffage inclus dans les charges. Lumineux et en très bon état.', 1, 'Ouverte', '5', 'Box & Cave', 'Terrasse', NULL, 2, 0, 'Avec', 32, '87', '261', NULL, NULL, NULL, 15, 1, 1, NULL, 'Sud/Ouest', 4, '2378', 1, NULL, '2020-01-12 18:09:47', '2020-06-12 13:53:46'),
(5, 1, 1, 0, '11 rue Pablo Néruda', 'Vaires-sur-Marne', '77200', '799000', 165, 8, 6, 0, NULL, 0, 'Belle propriété Meulière de 1880, 165 m² habitables sur terrain clos et arboré de 950 m², comprenant un hall d\'entrée, un séjour traversant EST-OUEST avec cheminée, une cuisine indépendante équipée, un bureau. Au premier étage, un grand palier, trois chambres dont deux avec cheminée, une salle d\'eau, wc. Au deuxième étage, beau palier, deux chambres avec deux greniers, une salle de bains avec wc. En rez-de-jardin, une buanderie, une chaufferie, wc, un cellier et deux pièces, possible studio ou cabinet pour profession libérale avec entrée indépendante. Garage double et jardin d\'hiver. Emplacement privilégié, au calme et proche centre ville, avec gare SNCF (accès gare de l\'Est en 18 mns), écoles et commerces. Fenêtres double vitrage, toiture avec isolation neuve, portail automatique. Le charme de l\'ancien en parfait état avec des matériaux de qualité. Rare sur la commune. Honoraires d\'agence à la charge du vendeur.', 1, 'Equipée', '5', NULL, NULL, 'Double au sous-sol', 0, NULL, '', NULL, NULL, '242', NULL, 'Total', '319', 15, 1, 1, 'Gaz', 'Sud', NULL, '4687', 1, NULL, '2020-01-11 18:09:47', '2020-06-12 13:53:46'),
(6, 2, 2, 1, '3 rue des Platanes', 'Brou-sur-Chantereine', '77177', '853', 49, 3, 2, 0, NULL, 0, 'Dans petite résidence au calme sur parc paysagé, à 5 minutes à pieds de la gare SNCF et des commerces, vue exceptionnelle pour cet appartement F4 en dernier étage avec ascenseur, comprenant une entrée avec placard, un séjour double accès loggia exposée SUD/OUEST, une cuisine aménagée et équipée ouverte, un dégagement avec grand placard, une salle d\'eau, wc, cellier, 2 chambres. Une cave et un box. Climatisation. Eau froide, eau chaude et chauffage inclus dans les charges. Bénéficiez des commerces de lagny sur marne et des promenades en bord de Marne. Honoraires à la charge du vendeur. ', 1, 'Equipée', '5', 'Box', 'Jardin', NULL, 2, 0, 'Avec', 32, '87', '306', '50', NULL, NULL, 15, 1, 1, NULL, 'Sud/Est', 2, '2378', NULL, NULL, '2020-01-12 18:09:47', NULL),
(7, 2, 2, 1, '3 rue des Platanes', 'Thorigny-sur-Marne', '77177', '1010', 61, 4, 2, 0, NULL, 0, 'Dans petite résidence au calme sur parc paysagé, à 5 minutes à pieds de la gare SNCF et des commerces, vue exceptionnelle pour cet appartement F4 en dernier étage avec ascenseur, comprenant une entrée avec placard, un séjour double accès loggia exposée SUD/OUEST, une cuisine aménagée et équipée ouverte, un dégagement avec grand placard, une salle d\'eau, wc, cellier, 2 chambres. Une cave et un box. Climatisation. Eau froide, eau chaude et chauffage inclus dans les charges. Bénéficiez des commerces de lagny sur marne et des promenades en bord de Marne. Honoraires à la charge du vendeur. ', 1, 'Equipée', '5', 'Cave', 'Balcon', NULL, 2, 0, 'Avec', 32, '87', '357', '50', NULL, NULL, 15, 1, 1, NULL, 'Ouest', 1, '2378', NULL, NULL, '2020-01-12 18:09:47', NULL),
(8, 2, 2, 1, '3 rue des Platanes', 'Brou-sur-Chantereine', '77177', '1450', 87, 4, 2, 0, NULL, 0, 'Dans petite résidence au calme sur parc paysagé, à 5 minutes à pieds de la gare SNCF et des commerces, vue exceptionnelle pour cet appartement F4 en dernier étage avec ascenseur, comprenant une entrée avec placard, un séjour double accès loggia exposée SUD/OUEST, une cuisine aménagée et équipée ouverte, un dégagement avec grand placard, une salle d\'eau, wc, cellier, 2 chambres. Une cave et un box. Climatisation. Eau froide, eau chaude et chauffage inclus dans les charges. Bénéficiez des commerces de lagny sur marne et des promenades en bord de Marne. Honoraires à la charge du vendeur. ', 1, 'Equipée', '5', 'Box', NULL, NULL, 2, 0, 'Avec', 32, '87', '410', '50', NULL, NULL, 15, 1, 1, NULL, 'Sud', 6, '2378', NULL, NULL, '2020-01-12 18:09:47', NULL),
(9, 1, 1, 1, '3 rue des Platanes', 'Brou-sur-Chantereine', '77177', '685000', 120, 6, 3, 0, NULL, 0, 'Dans petite résidence au calme sur parc paysagé, à 5 minutes à pieds de la gare SNCF et des commerces, vue exceptionnelle pour cet appartement F4 en dernier étage avec ascenseur, comprenant une entrée avec placard, un séjour double accès loggia exposée SUD/OUEST, une cuisine aménagée et équipée ouverte, un dégagement avec grand placard, une salle d\'eau, wc, cellier, 2 chambres. Une cave et un box. Climatisation. Eau froide, eau chaude et chauffage inclus dans les charges. Bénéficiez des commerces de lagny sur marne et des promenades en bord de Marne. Honoraires à la charge du vendeur. ', 1, 'Ouverte', '5', NULL, NULL, 'Double', 2, NULL, '', NULL, NULL, '196', NULL, 'Total', '450', 15, 1, 1, 'Gaz', 'Est', NULL, '2378', 2, NULL, '2020-01-12 00:43:06', '2020-06-12 13:53:45'),
(10, 1, 1, 0, '11 rue Pablo Néruda', 'Montévrain', '77200', '682000', 140, 7, 5, 0, NULL, 0, 'Belle propriété Meulière de 1880, 165 m² habitables sur terrain clos et arboré de 950 m², comprenant un hall d\'entrée, un séjour traversant EST-OUEST avec cheminée, une cuisine indépendante équipée, un bureau. Au premier étage, un grand palier, trois chambres dont deux avec cheminée, une salle d\'eau, wc. Au deuxième étage, beau palier, deux chambres avec deux greniers, une salle de bains avec wc. En rez-de-jardin, une buanderie, une chaufferie, wc, un cellier et deux pièces, possible studio ou cabinet pour profession libérale avec entrée indépendante. Garage double et jardin d\'hiver. Emplacement privilégié, au calme et proche centre ville, avec gare SNCF (accès gare de l\'Est en 18 mns), écoles et commerces. Fenêtres double vitrage, toiture avec isolation neuve, portail automatique. Le charme de l\'ancien en parfait état avec des matériaux de qualité. Rare sur la commune. Honoraires d\'agence à la charge du vendeur.', 1, 'Equipée', '', NULL, NULL, 'Double au sous-sol', 0, NULL, '', NULL, NULL, '242', NULL, 'Total', '319', 15, 1, 1, 'Gaz', 'Sud', NULL, '4687', 1, NULL, '2020-01-11 18:09:47', '2020-06-12 13:53:45'),
(11, 1, 1, 1, '3 rue des Platanes', 'Vaires-sur-Marne', '77177', '550000', 112, 5, 3, 0, NULL, 0, 'Dans petite résidence au calme sur parc paysagé, à 5 minutes à pieds de la gare SNCF et des commerces, vue exceptionnelle pour cet appartement F4 en dernier étage avec ascenseur, comprenant une entrée avec placard, un séjour double accès loggia exposée SUD/OUEST, une cuisine aménagée et équipée ouverte, un dégagement avec grand placard, une salle d\'eau, wc, cellier, 2 chambres. Une cave et un box. Climatisation. Eau froide, eau chaude et chauffage inclus dans les charges. Bénéficiez des commerces de lagny sur marne et des promenades en bord de Marne. Honoraires à la charge du vendeur. ', 1, 'Ouverte', '5', NULL, NULL, 'Double', 2, NULL, '', NULL, NULL, '196', NULL, 'Total', '450', 15, 1, 1, 'Gaz', 'Est', NULL, '2378', 2, NULL, '2020-01-12 00:43:06', '2020-06-12 13:53:44'),
(12, 2, 1, 1, '3 rue des Platanes', 'Montévrain', '77177', '225000', 76, 4, 2, 0, NULL, 0, 'Résidence CHANTECLAIR 1, proche écoles, commerces et clinique, bel appartement 3 pièces, situé au 2 ème étage exposé SUD-OUEST de 61 m² comprenant un séjour de 23 m² , une cuisine indépendante équipée accès loggia, un dégagement, 2 chambres avec placards, une salle de bains, wc. Rangement. Une cave et un parking. Fenêtres PVC double vitrage, eau froide et chauffage inclus dans les charges. Lumineux et en très bon état.', 1, 'Ouverte', '5', 'Box & Cave', 'Terrasse', NULL, 2, 0, 'Avec', 32, '87', '261', NULL, NULL, NULL, 15, 1, 1, NULL, 'Sud/Ouest', 4, '2378', 1, NULL, '2020-01-12 18:09:47', '2020-06-12 13:53:44'),
(13, 2, 2, 1, '3 rue des Platanes', 'Thorigny-sur-Marne', '77177', '799', 45, 3, 2, 0, NULL, 0, 'Dans petite résidence au calme sur parc paysagé, à 5 minutes à pieds de la gare SNCF et des commerces, vue exceptionnelle pour cet appartement F4 en dernier étage avec ascenseur, comprenant une entrée avec placard, un séjour double accès loggia exposée SUD/OUEST, une cuisine aménagée et équipée ouverte, un dégagement avec grand placard, une salle d\'eau, wc, cellier, 2 chambres. Une cave et un box. Climatisation. Eau froide, eau chaude et chauffage inclus dans les charges. Bénéficiez des commerces de lagny sur marne et des promenades en bord de Marne. Honoraires à la charge du vendeur. ', 1, 'Equipée', '5', 'Box', 'Jardin', NULL, 2, 0, 'Avec', 32, '87', '306', '50', NULL, NULL, 15, 1, 1, NULL, 'Sud/Est', 2, '2378', NULL, NULL, '2020-01-12 18:09:47', NULL),
(14, 2, 2, 1, '3 rue des Platanes', 'Lagny-sur-Marne', '77177', '1180', 71, 4, 2, 0, NULL, 0, 'Dans petite résidence au calme sur parc paysagé, à 5 minutes à pieds de la gare SNCF et des commerces, vue exceptionnelle pour cet appartement F4 en dernier étage avec ascenseur, comprenant une entrée avec placard, un séjour double accès loggia exposée SUD/OUEST, une cuisine aménagée et équipée ouverte, un dégagement avec grand placard, une salle d\'eau, wc, cellier, 2 chambres. Une cave et un box. Climatisation. Eau froide, eau chaude et chauffage inclus dans les charges. Bénéficiez des commerces de lagny sur marne et des promenades en bord de Marne. Honoraires à la charge du vendeur. ', 1, 'Equipée', '5', 'Cave', 'Balcon', NULL, 2, 0, 'Avec', 32, '87', '357', '50', NULL, NULL, 15, 1, 1, NULL, 'Ouest', 1, '2378', NULL, NULL, '2020-01-12 18:09:47', NULL),
(15, 2, 2, 1, '3 rue des Platanes', 'Lagny-sur-Marne', '77177', '1540', 92, 5, 2, 0, NULL, 0, 'Dans petite résidence au calme sur parc paysagé, à 5 minutes à pieds de la gare SNCF et des commerces, vue exceptionnelle pour cet appartement F4 en dernier étage avec ascenseur, comprenant une entrée avec placard, un séjour double accès loggia exposée SUD/OUEST, une cuisine aménagée et équipée ouverte, un dégagement avec grand placard, une salle d\'eau, wc, cellier, 2 chambres. Une cave et un box. Climatisation. Eau froide, eau chaude et chauffage inclus dans les charges. Bénéficiez des commerces de lagny sur marne et des promenades en bord de Marne. Honoraires à la charge du vendeur. ', 1, 'Equipée', '5', 'Box', NULL, NULL, 2, 0, 'Avec', 32, '87', '410', '50', NULL, NULL, 15, 1, 1, NULL, 'Sud', 6, '2378', NULL, NULL, '2020-01-12 18:09:47', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `message_id` int(11) NOT NULL,
  `message_name` varchar(100) NOT NULL,
  `message_phone` varchar(20) DEFAULT NULL,
  `message_email` varchar(100) DEFAULT NULL,
  `message_note` text NOT NULL,
  `message_lu` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`message_id`, `message_name`, `message_phone`, `message_email`, `message_note`, `message_lu`, `created_at`, `updated_at`) VALUES
(17, 'Jérémy Lémont', '0631727083', NULL, 'Ceci est un test !', 1, '2020-06-11 12:08:28', '2020-06-12 13:20:01'),
(18, 'Jérémy Lémont', NULL, 'jerem-lem@hotmail.fr', 'Ceci est un 2ème test !', 1, '2020-06-11 12:09:00', '2020-06-12 13:20:01'),
(19, 'test', '0605040302', NULL, 'test ! éçè', 1, '2020-06-12 13:24:06', '2020-06-12 13:24:33');

-- --------------------------------------------------------

--
-- Structure de la table `photos`
--

CREATE TABLE `photos` (
  `photo_id` int(11) NOT NULL,
  `photo_chemin` varchar(200) NOT NULL,
  `photo_logement_id` int(11) NOT NULL,
  `photo_position` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `photos`
--

INSERT INTO `photos` (`photo_id`, `photo_chemin`, `photo_logement_id`, `photo_position`, `created_at`, `updated_at`) VALUES
(1, '/medias/img/annonces/1/1-1.jpg', 1, 1, NULL, NULL),
(2, '/medias/img/annonces/1/1-2.jpeg', 1, 3, NULL, NULL),
(3, '/medias/img/annonces/1/1-3.jpeg', 1, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `ranks`
--

CREATE TABLE `ranks` (
  `rank_id` int(11) NOT NULL,
  `rank_libelle` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ranks`
--

INSERT INTO `ranks` (`rank_id`, `rank_libelle`, `created_at`, `updated_at`) VALUES
(1, 'Administrateur', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `types`
--

CREATE TABLE `types` (
  `type_id` int(11) NOT NULL,
  `type_libelle` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `types`
--

INSERT INTO `types` (`type_id`, `type_libelle`, `created_at`, `updated_at`) VALUES
(1, 'Maison', NULL, NULL),
(2, 'Appartement', NULL, NULL),
(3, 'Studio', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_login` varchar(100) NOT NULL,
  `user_password` varchar(200) NOT NULL,
  `user_rank_id` int(11) NOT NULL,
  `user_last_connection` datetime DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `user_login`, `user_password`, `user_rank_id`, `user_last_connection`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'jlemont', '8feddb3014a070097df081ed63f1ca7c2cae3499', 1, NULL, NULL, NULL, NULL),
(7, 'alexandre', 'a64df9f267517d5caddc282637e244bd0688dc3a', 1, NULL, NULL, NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administrateurs`
--
ALTER TABLE `administrateurs`
  ADD PRIMARY KEY (`administrateur_id`),
  ADD KEY `administrateur_user_id` (`administrateur_user_id`);

--
-- Index pour la table `contrats`
--
ALTER TABLE `contrats`
  ADD PRIMARY KEY (`contrat_id`);

--
-- Index pour la table `logements`
--
ALTER TABLE `logements`
  ADD PRIMARY KEY (`logement_id`),
  ADD KEY `logement_type_id` (`logement_type_id`),
  ADD KEY `logement_contrat_id` (`logement_contrat_id`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Index pour la table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`photo_id`),
  ADD KEY `photo_logement_id` (`photo_logement_id`);

--
-- Index pour la table `ranks`
--
ALTER TABLE `ranks`
  ADD PRIMARY KEY (`rank_id`);

--
-- Index pour la table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`type_id`);

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
-- AUTO_INCREMENT pour la table `administrateurs`
--
ALTER TABLE `administrateurs`
  MODIFY `administrateur_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `contrats`
--
ALTER TABLE `contrats`
  MODIFY `contrat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `logements`
--
ALTER TABLE `logements`
  MODIFY `logement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `photos`
--
ALTER TABLE `photos`
  MODIFY `photo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `ranks`
--
ALTER TABLE `ranks`
  MODIFY `rank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `types`
--
ALTER TABLE `types`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `administrateurs`
--
ALTER TABLE `administrateurs`
  ADD CONSTRAINT `administrateurs_ibfk_1` FOREIGN KEY (`administrateur_user_id`) REFERENCES `users` (`user_id`);

--
-- Contraintes pour la table `logements`
--
ALTER TABLE `logements`
  ADD CONSTRAINT `logements_ibfk_1` FOREIGN KEY (`logement_type_id`) REFERENCES `types` (`type_id`),
  ADD CONSTRAINT `logements_ibfk_2` FOREIGN KEY (`logement_contrat_id`) REFERENCES `contrats` (`contrat_id`);

--
-- Contraintes pour la table `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `photos_ibfk_1` FOREIGN KEY (`photo_logement_id`) REFERENCES `logements` (`logement_id`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_rank_id`) REFERENCES `ranks` (`rank_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
