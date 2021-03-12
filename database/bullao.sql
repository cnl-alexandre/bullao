-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 12, 2021 at 06:27 PM
-- Server version: 5.7.26
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `bullao`
--

-- --------------------------------------------------------

--
-- Table structure for table `accessoires`
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
-- Dumping data for table `accessoires`
--

INSERT INTO `accessoires` (`accessoire_id`, `accessoire_libelle`, `accessoire_description`, `accessoire_prix`, `accessoire_stock`, `accessoire_conso`, `accessoire_chemin_img`, `created_at`, `updated_at`) VALUES
(1, 'Enceinte Bose', 'Description', '9.00', 12, 0, 'medias/img/accessoires/enceinte.png', NULL, '2020-10-20 14:22:26'),
(2, 'Marche pied', 'Description', '6.00', 1, 0, 'medias/img/accessoires/marche-pied.png', NULL, '2020-10-31 12:22:34'),
(3, 'Parfum positivant', 'Description', '3.00', 14, 1, 'medias/img/accessoires/parfum-positive.png', NULL, '2020-12-18 12:47:22'),
(4, 'Parfum fraicheur', 'Description', '3.00', 15, 1, 'medias/img/accessoires/parfum-energie.png', NULL, NULL),
(5, 'Parfum Love', 'Description', '3.00', 30, 1, 'medias/img/accessoires/parfum-love.png', NULL, NULL),
(6, 'Pouf lumineux', 'Description', '5.00', 2, 0, 'medias/img/accessoires/pouf-lumineux.png', NULL, '2020-10-31 12:22:57'),
(7, 'Porte verre', 'Description', '2.00', 3, 0, 'medias/img/accessoires/porte-verre.png', NULL, NULL),
(8, 'Lot 2 sièges confort', 'Description', '10.00', 1, 0, 'medias/img/accessoires/siege-confort.png', NULL, NULL);

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
(2, 'Alexandre', '0613377128', 'cnl.alexandre@gmail.com', 3, NULL, NULL),
(3, 'Greg', '0613377128', 'gregoireconil@bullao.fr', 7, NULL, NULL),
(4, 'Alessandra Caillaud', NULL, 'alessandra.caillaud@yahoo.com', 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `adresses`
--

CREATE TABLE `adresses` (
  `adresse_id` int(11) NOT NULL,
  `adresse_name` varchar(100) NOT NULL,
  `adresse_client_id` int(11) NOT NULL,
  `adresse_rue` varchar(100) NOT NULL,
  `adresse_cp` varchar(5) DEFAULT NULL,
  `adresse_ville` varchar(100) NOT NULL,
  `adresse_complement` varchar(100) DEFAULT NULL,
  `adresse_departement` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `adresses`
--

INSERT INTO `adresses` (`adresse_id`, `adresse_name`, `adresse_client_id`, `adresse_rue`, `adresse_cp`, `adresse_ville`, `adresse_complement`, `adresse_departement`, `created_at`, `updated_at`) VALUES
(5, 'Principale', 4, '19 CHEMIN DE LA PORTE VERTE', NULL, 'MONTEVRAIN', NULL, '77', '2020-11-04 17:29:53', '2020-11-04 17:29:53'),
(6, 'Principale', 5, '19 chemin de la porte verte', NULL, 'Montévrain', NULL, '77', '2020-11-06 16:27:19', '2020-11-06 16:27:19'),
(7, 'Principale', 7, '12 rue d\'annet', NULL, 'Thorigny-sur-Marne', NULL, '77', NULL, NULL),
(8, 'Principale', 8, 'chemin de la glacière', NULL, 'Montévrain', NULL, '77', NULL, NULL),
(9, 'Principale', 9, '9 rue des binaches', NULL, 'Montevrain', NULL, '77', '2020-12-18 12:45:21', '2020-12-18 12:45:21'),
(10, 'Principale', 10, '3 allée des tonnelles', NULL, 'Lognes', 'Rdc porte droite', '77', '2020-12-28 23:01:53', '2020-12-28 23:01:53'),
(11, 'Principale', 11, '5 rue du docteur Dufraigne', NULL, 'Meaux', '4ieme étage. Code 1973. Interphone : frot', '77', '2021-01-16 18:20:48', '2021-01-16 18:20:48'),
(12, 'Principale', 12, '3 rue Antoine de saint exupery', NULL, 'Coupvray', NULL, '77', '2021-01-16 22:29:51', '2021-01-16 22:29:51'),
(13, 'Principale', 13, '25 bis rue de la fraternité', NULL, 'Esbly', NULL, '77', '2021-01-17 08:14:24', '2021-01-17 08:14:24'),
(14, 'Principale', 14, '6 rue du Gripet', NULL, 'Magny-le-Hongre', '6 rue du Gripet', '77', '2021-01-18 11:57:01', '2021-01-18 11:57:01'),
(15, 'Principale', 15, '3 rue de l’arcade', NULL, 'Lagny sur Marne', '2eme étage avec ascenseur', '77', '2021-01-18 19:39:36', '2021-01-18 19:39:36'),
(16, 'Principale', 16, '12 rue du lievre', NULL, 'thorigny sur marne', NULL, '77', '2021-01-19 15:44:17', '2021-01-19 15:44:17'),
(17, 'Principale', 17, '16 rue du 8 mai 1945', NULL, '77450 esbly', NULL, '77', '2021-01-20 12:14:27', '2021-01-20 12:14:27'),
(18, 'Principale', 21, '9 rue de torcy', NULL, 'Chelles', NULL, '77', '2021-01-23 11:01:36', '2021-01-23 11:01:36'),
(19, 'Principale', 22, '15 ALLEE DES FENAISONS', NULL, 'CHANTELOUP EN BRIE', NULL, '77', '2021-01-23 11:12:44', '2021-01-23 11:12:44'),
(20, 'Principale', 23, '9 rue du bois de la fontaine', NULL, 'VAIRES SUR MARNE', '9 rue du bois de la fontaine', '77', '2021-01-24 08:13:26', '2021-01-24 08:13:26'),
(21, 'Principale', 24, '52 BOUCLE BELLE JOSEPHINE', NULL, 'MAGNY LE HONGRE', NULL, '77', '2021-01-29 09:30:05', '2021-01-29 09:30:05'),
(22, 'Principale', 25, '3 rue de la vallée', NULL, 'Collegien', 'Interphone ; Douraguia', '77', '2021-02-01 19:51:47', '2021-02-01 19:51:47'),
(23, 'Principale', 29, '6 rue de l\'orangerie', NULL, 'TORCY', '3 ème étage code 23081', '77', '2021-02-03 14:41:20', '2021-02-03 14:41:20'),
(24, 'Principale', 30, '6 rue d\'Ariane', NULL, 'Chessy', 'codes A2910, B1506, C21', '77', '2021-02-03 15:20:16', '2021-02-03 15:20:16'),
(25, 'Principale', 32, '19 chemin de la porte verte', NULL, '77144 - MONTEVRAIN', NULL, '77', '2021-02-06 14:01:37', '2021-02-06 14:01:37'),
(26, 'Principale', 4, '19 CHEMIN DE LA PORTE VERTE, 19', NULL, 'MONTEVRAIN', NULL, '77', '2021-02-10 21:38:51', '2021-02-10 21:38:51'),
(27, 'Principale', 40, '19 che du pré', NULL, 'LAgny Zoo', NULL, '77', '2021-02-11 13:43:25', '2021-02-11 13:43:25'),
(28, 'Principale', 42, '19 chemin de la porte verte', NULL, 'Montévrain', NULL, NULL, '2021-02-11 13:52:10', '2021-02-11 13:52:10'),
(29, 'Principale', 43, '93 efzjks', NULL, 'Clay Souilly', NULL, NULL, '2021-02-11 13:53:58', '2021-02-11 13:53:58');

-- --------------------------------------------------------

--
-- Table structure for table `cadeaux`
--

CREATE TABLE `cadeaux` (
  `cadeau_id` int(11) NOT NULL,
  `cadeau_client_id` int(11) DEFAULT NULL,
  `cadeau_montant` decimal(10,2) NOT NULL,
  `cadeau_montant_restant` decimal(10,2) NOT NULL DEFAULT '0.00',
  `cadeau_date_debut` date DEFAULT NULL,
  `cadeau_date_fin` date DEFAULT NULL,
  `cadeau_code` varchar(12) DEFAULT NULL,
  `cadeau_offre` varchar(100) DEFAULT NULL,
  `cadeau_date_paie` date DEFAULT NULL,
  `cadeau_rue` varchar(100) DEFAULT NULL,
  `cadeau_cp` varchar(5) DEFAULT NULL,
  `cadeau_ville` varchar(100) DEFAULT NULL,
  `cadeau_complement` varchar(100) DEFAULT NULL,
  `cadeau_departement` varchar(100) DEFAULT NULL,
  `cadeau_client_id_used` int(11) DEFAULT NULL,
  `cadeau_date_used` date DEFAULT NULL,
  `cadeau_used` int(11) NOT NULL DEFAULT '0',
  `cadeau_paye` int(1) DEFAULT '0',
  `cadeau_payment_id` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `client_id` int(11) NOT NULL,
  `client_name` varchar(100) NOT NULL,
  `client_user_id` int(11) DEFAULT NULL,
  `client_email` varchar(100) DEFAULT NULL,
  `client_phone` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `client_name`, `client_user_id`, `client_email`, `client_phone`, `created_at`, `updated_at`) VALUES
(1, 'Bullao', NULL, 'contact@bullao.fr', '0613377128', '2020-10-31 23:00:00', '2020-10-31 23:00:00'),
(4, 'Sophie Conil', 8, 'cnl.sophie@gmail.com', '0686928915', '2020-11-04 17:29:53', '2020-11-04 17:29:53'),
(5, 'Alexandre', 4, 'cnl.alexandre@gmail.com', '0613377128', '2020-11-06 16:27:19', '2020-11-06 16:27:19'),
(7, 'Alexandra Menny', NULL, 'alexandra.menny@hotmail.fr', '0634542127', '2020-11-17 22:34:00', '2020-12-15 23:00:00'),
(8, 'Sandrine Vaysse', NULL, 'nomail@mail.com', '0785388262', '2020-11-17 22:34:00', NULL),
(9, 'Morini', 9, 'cf.morini@free.fr', '0675250340', '2020-12-18 12:45:21', '2020-12-18 12:45:21'),
(10, 'Anaïs Thomas Febvre', 10, 'evaadoc77@gmail.com', '0680175204', '2020-12-28 23:01:53', '2020-12-28 23:01:53'),
(11, 'Frot fabien', 11, 'ffrot@hotmail.com', '0617345744', '2021-01-16 18:20:48', '2021-01-16 18:20:48'),
(12, 'Céline MUNOZ', 12, 'celine.munoz@gmail.com', '0649801688', '2021-01-16 22:29:51', '2021-01-16 22:29:51'),
(13, 'Vibet renaud', 13, 'renaud.vibet@laposte.net', '0663338919', '2021-01-17 08:14:24', '2021-01-17 08:14:24'),
(14, 'Bordet-Davignon Sandrine', 14, 'sbordet@orange.fr', '0659756660', '2021-01-18 11:57:01', '2021-01-18 11:57:01'),
(15, 'LUU marine', 15, 'marineluu2201@yahoo.fr', '0677847018', '2021-01-18 19:39:36', '2021-01-18 19:39:36'),
(16, 'GUILLAUME CHAUVIN', 16, 'guycho974@gmail.com', '0622705831', '2021-01-19 15:44:17', '2021-01-19 15:44:17'),
(17, 'Moreira stephanie', 17, 'stephaniechascomoreira@gmail.com', '0685217186', '2021-01-20 12:14:27', '2021-01-20 12:14:27'),
(21, 'Devulder claudie', 18, 'claudie.87@hotmail.com', '0635151124', '2021-01-23 11:01:36', '2021-01-23 11:01:36'),
(22, 'TE STEPHANIE', 19, 'stephanie.tesooukian@gmail.com', '0632920453', '2021-01-23 11:12:44', '2021-01-23 11:12:44'),
(23, 'Carrere ludivine', 20, 'ludivinepierre@live.fr', '0658628942', '2021-01-24 08:13:26', '2021-01-24 08:13:26'),
(24, 'Noël Christelle', 21, 'gouleret.christelle@gmail.com', '0785386976', '2021-01-29 09:30:05', '2021-01-29 09:30:05'),
(25, 'Douraguia Jennifer', 22, 'jennifer.douraguia@gmail.com', '0766385263', '2021-02-01 19:51:47', '2021-02-01 19:51:47'),
(26, 'Lhomel Vincent', NULL, 'vincentdu77600@gmail.com', '0761754985', NULL, NULL),
(27, 'Thomas Fouchy', NULL, 'fouchythomas@gmail.com', NULL, NULL, NULL),
(28, 'Claudie Devulder', NULL, 'claudie.87@hotmail.com', '0635151124', NULL, NULL),
(29, 'Nicolas Tranchant', 23, 'Nicow1816@gmail.com', '0658231488', '2021-02-03 14:41:20', '2021-02-03 14:41:20'),
(30, 'BRANDI Marisa', 24, 'marisabrandi235@gmail.com', '0753712444', '2021-02-03 15:20:15', '2021-02-03 15:20:15'),
(31, 'Seinde Toure', NULL, 'seinde@hotmail.fr', '0622025780', NULL, NULL),
(32, 'Alessandra', 6, 'alessandra.caillaud@yahoo.com', '0606060606', NULL, NULL),
(33, 'Adeline Chan', 26, 'adeline.barthe20@gmail.com', '0642482866', NULL, NULL),
(34, 'Madeline Rayer', 27, 'madi_cool77@hotmail.fr', '0615148371', '2021-02-10 13:00:00', NULL),
(35, 'Sylvie Da Costa', 28, 'msylvie77@gmail.com', '0609666585', '2021-02-10 13:00:00', NULL),
(36, 'Xavier Couttelle', 29, 'xaviercouttelle@gmail.com', '0603201169', NULL, NULL),
(38, 'Benjamin Beaupré', 30, 'benjamin.beaupre@laposte.net', NULL, NULL, NULL),
(39, 'Valérie Gowry', 31, 'valerie.gowry@outlook.com', '0695972756', NULL, NULL),
(40, 'Beauf Service', 32, 'cejzinczi@fzjno.fr', '0284924729', '2021-02-11 13:43:25', '2021-02-11 13:43:25'),
(41, 'Beauf 2', 33, 'cziezbci@vzodzo.fr', '0138424328', '2021-02-11 13:49:55', '2021-02-11 13:49:55'),
(42, 'Beauf 2', 33, 'cziezbci@vzodzo.fr', '0138424328', '2021-02-11 13:52:10', '2021-02-11 13:52:10'),
(43, 'Beauf 3 de service', 34, 'céeijn.cezo@vez.fr', NULL, '2021-02-11 13:53:58', '2021-02-11 13:53:58');

-- --------------------------------------------------------

--
-- Table structure for table `indisponibilites`
--

CREATE TABLE `indisponibilites` (
  `indisponibilite_id` int(11) NOT NULL,
  `indisponibilite_date` date NOT NULL,
  `indisponibilite_desc` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `indisponibilites`
--

INSERT INTO `indisponibilites` (`indisponibilite_id`, `indisponibilite_date`, `indisponibilite_desc`, `created_at`, `updated_at`) VALUES
(1, '2020-09-21', NULL, NULL, NULL),
(2, '2020-09-22', NULL, NULL, NULL),
(3, '2020-11-16', 'caserne', '2020-10-23 13:28:51', '2020-10-23 13:29:06'),
(4, '2020-11-02', 'caserne', '2020-10-31 14:40:22', '2020-10-31 14:40:22'),
(5, '2020-11-03', 'caserne', '2020-10-31 14:40:32', '2020-10-31 14:40:32'),
(6, '2020-11-09', NULL, '2020-10-31 14:40:42', '2020-10-31 14:40:42'),
(7, '2020-11-16', NULL, '2020-10-31 14:40:56', '2020-10-31 14:40:56'),
(8, '2020-11-18', NULL, '2020-10-31 14:41:32', '2020-10-31 14:41:32'),
(9, '2020-11-25', NULL, '2020-10-31 14:41:42', '2020-10-31 14:41:42'),
(10, '2020-11-28', 'COMPLET', '2020-11-15 14:46:18', '2020-11-15 14:46:18'),
(11, '2020-12-30', NULL, '2020-12-29 00:08:30', '2020-12-29 00:08:30'),
(12, '2020-12-31', 'full', '2020-12-29 00:08:39', '2020-12-29 00:08:39'),
(13, '2021-01-01', NULL, '2020-12-29 00:08:52', '2020-12-29 00:08:52'),
(14, '2021-01-02', NULL, '2020-12-29 00:08:57', '2020-12-29 00:08:57'),
(15, '2021-01-22', NULL, '2021-01-18 21:17:14', '2021-01-18 21:17:14'),
(16, '2021-01-23', NULL, '2021-01-18 21:17:20', '2021-01-18 21:17:20'),
(17, '2021-01-24', NULL, '2021-01-18 21:17:26', '2021-01-18 21:17:26'),
(18, '2021-01-20', NULL, '2021-01-18 21:17:58', '2021-01-18 21:17:58'),
(19, '2021-01-21', NULL, '2021-01-18 21:18:04', '2021-01-18 21:18:04'),
(20, '2021-02-12', NULL, '2021-01-24 10:14:34', '2021-01-24 10:14:43'),
(21, '2021-02-13', NULL, '2021-01-24 10:15:06', '2021-01-24 10:15:06'),
(22, '2021-02-14', NULL, '2021-01-24 10:15:15', '2021-01-24 10:15:15'),
(23, '2021-02-15', NULL, '2021-01-24 10:15:22', '2021-01-24 10:15:22'),
(24, '2021-02-05', NULL, '2021-02-01 21:40:42', '2021-02-01 21:40:42'),
(25, '2021-02-06', NULL, '2021-02-01 21:40:46', '2021-02-01 21:40:46'),
(26, '2021-02-07', NULL, '2021-02-01 21:40:51', '2021-02-01 21:40:51'),
(27, '2021-02-08', NULL, '2021-02-01 21:40:56', '2021-02-01 21:40:56'),
(28, '2021-02-16', NULL, '2021-02-03 18:01:28', '2021-02-03 18:01:28'),
(29, '2021-02-17', NULL, '2021-02-03 18:01:33', '2021-02-03 18:01:33'),
(30, '2021-02-22', NULL, '2021-02-03 18:01:47', '2021-02-03 18:01:47'),
(31, '2021-02-01', NULL, '2021-02-11 10:58:26', '2021-02-11 10:58:26');

-- --------------------------------------------------------

--
-- Table structure for table `packs`
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
-- Dumping data for table `packs`
--

INSERT INTO `packs` (`pack_id`, `pack_libelle`, `pack_description`, `pack_stock`, `pack_prix`, `pack_chemin_img`, `created_at`, `updated_at`) VALUES
(1, 'Pack Fun', 'Pour une fête réussie : une guirlande lumineuse, des ballons brillants métallisés, un pose-verre en plus, une enceinte portable étanche Bose©, une petite machine à fumée et une dose de parfum positivant.', 1, '20.00', 'medias/img/packs/pack-fun.png', NULL, '2020-10-20 13:49:22'),
(2, 'Pack Romance', 'Sortez-lui le grand jeu avec ce pack romantique comprenant : des pétales de   rose en soie, des ballons en forme de coeur, une lumière tamisée, un spa parfumé « Love ».', 1, '20.00', 'medias/img/packs/pack-love.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `parametres`
--

CREATE TABLE `parametres` (
  `parametre_id` int(11) NOT NULL,
  `parametre_libelle` varchar(110) NOT NULL,
  `parametre_value` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `parametres`
--

INSERT INTO `parametres` (`parametre_id`, `parametre_libelle`, `parametre_value`, `created_at`, `updated_at`) VALUES
(1, 'maintenance', '0', '2021-01-31 21:26:51', '2021-01-31 22:55:02'),
(2, 'maintenance_message', 'Bonjour, une mise à jour du site est en cours. \r\n<br>Nous allons revenir dans pas longtemps !', '2021-01-31 21:26:51', '2021-01-31 22:55:02');

-- --------------------------------------------------------

--
-- Table structure for table `promos`
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
-- Dumping data for table `promos`
--

INSERT INTO `promos` (`promo_id`, `promo_libelle`, `promo_valeur`, `promo_date_debut`, `promo_date_fin`, `created_at`, `updated_at`) VALUES
(1, 'MONTEV2020', 10, '2020-11-01', NULL, NULL, NULL),
(2, 'COPAIN2020', 15, '2020-11-01', '2020-12-31', NULL, '2020-10-22 14:45:02'),
(3, 'LGM2020', 15, '2020-11-01', '2021-05-31', NULL, '2021-02-11 10:59:33'),
(4, 'NEW2020', 10, '2020-11-03', '2021-01-31', '2020-11-03 16:14:36', '2020-11-03 16:14:36'),
(5, 'BLACKFRIDAY', 15, '2020-11-27', '2020-11-30', '2020-11-27 12:04:46', '2020-11-27 12:04:46');

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
  `reservation_active` int(1) NOT NULL DEFAULT '0',
  `reservation_date_debut` date NOT NULL,
  `reservation_heure_install` time DEFAULT NULL,
  `reservation_date_fin` date NOT NULL,
  `reservation_heure_desinstall` time DEFAULT NULL,
  `reservation_creneau` varchar(50) DEFAULT NULL,
  `reservation_emplacement` varchar(100) DEFAULT NULL,
  `reservation_rue` varchar(100) DEFAULT NULL,
  `reservation_cp` varchar(5) DEFAULT NULL,
  `reservation_ville` varchar(100) DEFAULT NULL,
  `reservation_complement` varchar(100) DEFAULT NULL,
  `reservation_departement` varchar(100) DEFAULT NULL,
  `reservation_type_logement` varchar(100) DEFAULT NULL,
  `reservation_remplissage` varchar(100) DEFAULT NULL,
  `reservation_spa_id` int(11) DEFAULT NULL,
  `reservation_spa_libelle` varchar(100) DEFAULT NULL,
  `reservation_prix` decimal(10,2) DEFAULT NULL,
  `reservation_pack_id` int(11) DEFAULT NULL,
  `reservation_prix_pack` decimal(10,2) DEFAULT NULL,
  `reservation_montant_total` decimal(10,2) DEFAULT NULL,
  `reservation_promo` varchar(20) DEFAULT NULL,
  `reservation_cadeau_id` int(11) DEFAULT NULL,
  `reservation_frais_km` decimal(10,2) NOT NULL DEFAULT '0.00',
  `reservation_moyen_paiement` varchar(100) DEFAULT NULL,
  `reservation_moyen_contact` varchar(100) DEFAULT NULL,
  `reservation_paye` int(1) NOT NULL DEFAULT '0',
  `reservation_payment_id` varchar(100) DEFAULT NULL,
  `reservation_notation_prestation` int(1) NOT NULL DEFAULT '0',
  `reservation_client_id` int(11) DEFAULT NULL,
  `reservation_email` varchar(100) DEFAULT NULL,
  `reservation_phone` varchar(10) DEFAULT NULL,
  `reservation_info_complementaires` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`reservation_id`, `reservation_active`, `reservation_date_debut`, `reservation_heure_install`, `reservation_date_fin`, `reservation_heure_desinstall`, `reservation_creneau`, `reservation_emplacement`, `reservation_rue`, `reservation_cp`, `reservation_ville`, `reservation_complement`, `reservation_departement`, `reservation_type_logement`, `reservation_remplissage`, `reservation_spa_id`, `reservation_spa_libelle`, `reservation_prix`, `reservation_pack_id`, `reservation_prix_pack`, `reservation_montant_total`, `reservation_promo`, `reservation_cadeau_id`, `reservation_frais_km`, `reservation_moyen_paiement`, `reservation_moyen_contact`, `reservation_paye`, `reservation_payment_id`, `reservation_notation_prestation`, `reservation_client_id`, `reservation_email`, `reservation_phone`, `reservation_info_complementaires`, `created_at`, `updated_at`) VALUES
(48, 0, '2020-11-13', NULL, '2020-11-15', NULL, 'Entre 8h et 12h', 'Interieur', '19 CHEMIN DE LA PORTE VERTE', NULL, 'MONTEVRAIN', NULL, '77', 'Appartement', NULL, 2, 'Spa Navy 4 places', '90.00', NULL, NULL, '123.00', NULL, NULL, '0.00', NULL, NULL, 0, 'pi_1HjpnyGOBvkHIeeTo6f9CEdd', 0, 4, 'cnl.sophie@gmail.com', NULL, NULL, '2020-11-04 17:29:36', '2020-11-04 17:29:56'),
(53, 0, '2021-05-28', NULL, '2021-05-30', NULL, 'Entre 12h et 15h', 'Interieur', '19 chemin de la porte verte', NULL, 'Montévrain', NULL, '77', 'Maison', NULL, 1, 'Spa Sahara 4 places', '90.00', NULL, NULL, '102.00', 'COPAIN2020', NULL, '0.00', NULL, NULL, 0, 'pi_1HkXmWGOBvkHIeeTHunFh6EW', 0, 5, 'cnl.alexandre@gmail.com', NULL, NULL, '2020-11-06 16:26:21', '2020-11-06 16:27:21'),
(67, 1, '2020-11-28', NULL, '2020-11-29', NULL, 'Entre 8h et 12h', 'Interieur', '12 rue d\'annet', NULL, 'Thorigny-sur-Marne', NULL, '77', 'Maison', NULL, 2, 'Spa Navy 4 places', '90.00', NULL, NULL, '90.00', NULL, NULL, '0.00', NULL, NULL, 1, NULL, 0, 7, 'alexandra.menny@hotmail.fr', NULL, NULL, NULL, NULL),
(113, 1, '2020-12-12', NULL, '2020-12-14', NULL, 'Entre 8h et 12h', 'Interieur', '31 chemin de la glacière', NULL, 'Chessy', NULL, '77', 'Maison', NULL, 2, 'Spa Navy 4 places', '90.00', NULL, NULL, '90.00', NULL, NULL, '0.00', NULL, NULL, 1, NULL, 0, 8, 'nomail@nomail.fr', NULL, NULL, NULL, NULL),
(114, 0, '2020-12-31', NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 'Spa Carbone 6 places', '160.00', 1, '20.00', '180.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2020-12-16 13:33:48', '2020-12-16 13:33:48'),
(115, 0, '2020-12-30', NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 'Spa Carbone 6 places', '160.00', NULL, NULL, '200.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2020-12-16 13:48:35', '2020-12-16 13:48:35'),
(116, 0, '2020-12-24', NULL, '2020-12-25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', 1, '20.00', '113.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2020-12-18 09:10:04', '2020-12-18 09:10:04'),
(117, 1, '2020-12-20', NULL, '2020-12-21', NULL, 'Entre 12h et 15h', 'Intérieur', '9 rue des binaches', NULL, 'Montevrain', NULL, '77', 'Maison', NULL, 1, 'Spa Sahara 4 places', '90.00', NULL, NULL, '93.00', NULL, NULL, '0.00', NULL, NULL, 1, 'pi_1HziKkGOBvkHIeeT7ZqWRxMA', 0, 9, 'cf.morini@free.fr', NULL, NULL, '2020-12-18 12:43:31', '2020-12-18 12:47:22'),
(118, 0, '2020-12-24', NULL, '2020-12-25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Spa Sahara 4 places', '90.00', NULL, NULL, '90.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2020-12-22 11:37:05', '2020-12-22 11:37:05'),
(119, 0, '2020-12-25', NULL, '2020-12-26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 'Spa Baltik 4 places', '90.00', NULL, NULL, '90.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2020-12-23 11:00:07', '2020-12-23 11:00:07'),
(120, 0, '2020-12-30', NULL, '2020-12-31', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 'Spa Baltik 4 places', '90.00', NULL, NULL, '90.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2020-12-28 22:34:55', '2020-12-28 22:34:55'),
(121, 0, '2020-12-31', NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Spa Sahara 4 places', '90.00', NULL, NULL, '90.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2020-12-28 22:53:26', '2020-12-28 22:53:26'),
(122, 1, '2020-12-31', NULL, '2021-01-01', NULL, 'Entre 12h et 15h', 'Intérieur', '3 allée des tonnelles', NULL, 'Lognes', 'Rdc porte droite', '77', 'Appartement', NULL, 1, 'Spa Sahara 4 places', '90.00', NULL, NULL, '90.00', NULL, NULL, '0.00', NULL, NULL, 1, 'pi_1I3UisGOBvkHIeeTXAcMSYlZ', 0, 10, 'evaadoc77@gmail.com', NULL, NULL, '2020-12-28 22:58:35', '2020-12-28 23:03:08'),
(123, 0, '2021-01-16', NULL, '2021-01-17', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', 2, '20.00', '113.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-01 17:45:52', '2021-01-01 17:45:52'),
(124, 0, '2021-02-13', NULL, '2021-02-14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 'Spa Baltik 4 places', '90.00', 2, '20.00', '110.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-01 18:17:11', '2021-01-01 18:17:11'),
(125, 0, '2021-01-04', NULL, '2021-01-05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 'Spa Baltik 4 places', '90.00', 2, '20.00', '116.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-02 14:39:15', '2021-01-02 14:39:15'),
(126, 1, '2021-01-01', NULL, '2021-01-04', NULL, NULL, NULL, '59 rue Berthelot', '77', 'Pomponne', NULL, '77', 'Maison', NULL, 4, 'Spa Baltik 6 places', '120.00', NULL, NULL, '150.00', NULL, NULL, '0.00', NULL, NULL, 1, NULL, 0, 1, 'cnl.alexandre@gmail.com', NULL, NULL, NULL, '2021-02-11 13:25:36'),
(127, 0, '2021-01-05', NULL, '2021-01-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Spa Sahara 4 places', '90.00', NULL, NULL, '93.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-03 10:39:39', '2021-01-03 10:39:39'),
(128, 0, '2021-01-05', NULL, '2021-01-05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', NULL, NULL, '60.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-03 13:53:31', '2021-01-03 13:53:31'),
(129, 0, '2021-01-28', NULL, '2021-01-29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Spa Sahara 4 places', '90.00', 2, '20.00', '110.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-03 14:09:26', '2021-01-03 14:09:26'),
(130, 0, '2021-02-13', NULL, '2021-02-14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', 2, '20.00', '110.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-03 14:13:34', '2021-01-03 14:13:34'),
(131, 0, '2021-02-07', NULL, '2021-02-08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 'Spa Baltik 4 places', '90.00', 2, '20.00', '135.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-03 14:46:08', '2021-01-03 14:46:08'),
(132, 0, '2021-02-05', NULL, '2021-02-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Spa Sahara 4 places', '90.00', 2, '20.00', '115.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-03 20:11:08', '2021-01-03 20:11:08'),
(133, 0, '2021-02-15', NULL, '2021-02-16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', 2, '20.00', '113.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-05 23:02:03', '2021-01-05 23:02:03'),
(134, 0, '2021-01-08', NULL, '2021-01-09', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', NULL, NULL, '90.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-06 22:18:27', '2021-01-06 22:18:27'),
(135, 0, '2021-01-08', NULL, '2021-01-09', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Spa Sahara 4 places', '90.00', NULL, NULL, '90.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-06 22:25:35', '2021-01-06 22:25:35'),
(136, 0, '2021-01-29', NULL, '2021-01-30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', NULL, NULL, '90.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-16 09:36:37', '2021-01-16 09:36:37'),
(137, 0, '2021-02-28', NULL, '2021-03-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Spa Sahara 4 places', '90.00', 2, '20.00', '110.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-16 09:42:06', '2021-01-16 09:42:06'),
(138, 0, '2021-01-18', NULL, '2021-01-19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 'Spa Baltik 6 places', '120.00', 2, '20.00', '142.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-16 15:26:54', '2021-01-16 15:26:54'),
(139, 0, '2021-01-23', NULL, '2021-01-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', NULL, NULL, '93.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-16 17:42:14', '2021-01-16 17:42:14'),
(140, 0, '2021-01-31', NULL, '2021-02-07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Spa Sahara 4 places', '90.00', NULL, NULL, '275.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-16 17:56:00', '2021-01-16 17:56:00'),
(141, 0, '2021-01-19', NULL, '2021-01-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Spa Sahara 4 places', '90.00', NULL, NULL, '90.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-16 17:56:16', '2021-01-16 17:56:16'),
(142, 0, '2021-01-30', NULL, '2021-01-31', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 'Spa Carbone 6 places', '160.00', 2, '20.00', '183.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-16 18:00:30', '2021-01-16 18:00:30'),
(143, 0, '2021-01-23', NULL, '2021-01-24', NULL, 'Entre 8h et 12h', 'Intérieur', '5 rue du docteur Dufraigne', NULL, 'Meaux', '4ieme étage. Code 1973. Interphone : frot', '77', 'Appartement', NULL, 2, 'Spa Navy 4 places', '90.00', 2, '20.00', '110.00', NULL, NULL, '0.00', NULL, NULL, 0, 'pi_1IAJOHGOBvkHIeeTp5zVm3xm', 0, 11, 'ffrot@hotmail.com', NULL, NULL, '2021-01-16 18:18:28', '2021-01-16 18:20:51'),
(144, 0, '2021-01-18', NULL, '2021-01-19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', NULL, NULL, '90.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-16 18:23:45', '2021-01-16 18:23:45'),
(145, 0, '2021-01-18', NULL, '2021-01-19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 'Spa Carbone 6 places', '160.00', 2, '20.00', '180.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-16 18:28:56', '2021-01-16 18:28:56'),
(146, 0, '2021-02-13', NULL, '2021-02-14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', 2, '20.00', '110.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-16 18:50:03', '2021-01-16 18:50:03'),
(147, 0, '2021-02-14', NULL, '2021-02-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 'Spa Baltik 6 places', '120.00', 2, '20.00', '140.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-16 19:05:29', '2021-01-16 19:05:29'),
(148, 0, '2021-03-25', NULL, '2021-03-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', NULL, NULL, '120.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-16 19:07:52', '2021-01-16 19:07:52'),
(149, 0, '2021-01-18', NULL, '2021-01-18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', 2, '20.00', '80.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-16 19:17:21', '2021-01-16 19:17:21'),
(150, 0, '2021-02-17', NULL, '2021-02-18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', 2, '20.00', '110.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-16 19:22:01', '2021-01-16 19:22:01'),
(151, 0, '2021-02-12', NULL, '2021-02-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 'Spa Carbone 6 places', '160.00', 2, '20.00', '260.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-16 19:42:47', '2021-01-16 19:42:47'),
(152, 0, '2021-01-18', NULL, '2021-01-19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Spa Sahara 4 places', '90.00', NULL, NULL, '90.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-16 20:03:35', '2021-01-16 20:03:35'),
(153, 0, '2021-01-28', NULL, '2021-01-29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', 2, '20.00', '110.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-16 20:14:01', '2021-01-16 20:14:01'),
(154, 0, '2021-01-30', NULL, '2021-01-31', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Spa Sahara 4 places', '90.00', NULL, NULL, '90.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-16 20:25:11', '2021-01-16 20:25:11'),
(155, 0, '2021-02-14', NULL, '2021-02-14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', 2, '20.00', '80.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-16 21:39:58', '2021-01-16 21:39:58'),
(156, 0, '2021-01-22', NULL, '2021-01-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', 1, '20.00', '150.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-16 21:41:23', '2021-01-16 21:41:23'),
(157, 0, '2021-02-21', NULL, '2021-02-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', 2, '20.00', '80.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-16 21:43:13', '2021-01-16 21:43:13'),
(158, 0, '2021-01-18', NULL, '2021-01-19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Spa Sahara 4 places', '90.00', 2, '20.00', '110.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-16 21:53:36', '2021-01-16 21:53:36'),
(159, 0, '2021-02-14', NULL, '2021-02-14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Spa Sahara 4 places', '90.00', 2, '20.00', '80.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-16 21:55:09', '2021-01-16 21:55:09'),
(160, 0, '2021-02-21', NULL, '2021-02-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Spa Sahara 4 places', '90.00', 2, '20.00', '80.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-16 21:55:47', '2021-01-16 21:55:47'),
(161, 0, '2021-02-14', NULL, '2021-02-14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Spa Sahara 4 places', '90.00', 2, '20.00', '80.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-16 22:06:50', '2021-01-16 22:06:50'),
(162, 0, '2021-01-18', NULL, '2021-01-19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Spa Sahara 4 places', '90.00', 2, '20.00', '110.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-16 22:07:25', '2021-01-16 22:07:25'),
(163, 0, '2021-02-21', NULL, '2021-02-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Spa Sahara 4 places', '90.00', 2, '20.00', '80.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-16 22:15:14', '2021-01-16 22:15:14'),
(164, 0, '2021-01-18', NULL, '2021-01-19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Spa Sahara 4 places', '90.00', 2, '20.00', '110.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-16 22:24:46', '2021-01-16 22:24:46'),
(165, 0, '2021-01-18', NULL, '2021-01-19', NULL, 'Entre 8h et 12h', 'Intérieur', '3 rue Antoine de saint exupery', NULL, 'Coupvray', NULL, '77', 'Maison', NULL, 1, 'Spa Sahara 4 places', '90.00', 2, '20.00', '110.00', NULL, NULL, '0.00', NULL, NULL, 0, 'pi_1IANHIGOBvkHIeeTOtSaeIwP', 0, 12, 'celine.munoz@gmail.com', NULL, NULL, '2021-01-16 22:29:08', '2021-01-16 22:29:53'),
(166, 0, '2021-02-14', NULL, '2021-02-14', NULL, 'Entre 8h et 12h', 'Intérieur', '3 rue Antoine de saint exupery', NULL, 'Coupvray', NULL, '77', 'Maison', NULL, 1, 'Spa Sahara 4 places', '90.00', 2, '20.00', '80.00', NULL, NULL, '0.00', NULL, NULL, 0, 'pi_1IANMsGOBvkHIeeT7Tkaf2cS', 0, 12, 'celine.munoz@gmail.com', NULL, NULL, '2021-01-16 22:31:48', '2021-01-16 22:35:39'),
(167, 0, '2021-01-19', NULL, '2021-01-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 'Spa Carbone 6 places', '160.00', 2, '20.00', '190.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-16 23:20:32', '2021-01-16 23:20:32'),
(168, 0, '2021-01-24', NULL, '2021-01-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Spa Sahara 4 places', '90.00', NULL, NULL, '60.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-17 01:40:07', '2021-01-17 01:40:07'),
(169, 0, '2021-01-22', NULL, '2021-01-30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Spa Sahara 4 places', '90.00', NULL, NULL, '300.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-17 01:41:02', '2021-01-17 01:41:02'),
(170, 0, '2021-02-12', NULL, '2021-02-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', NULL, NULL, '150.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-17 01:47:13', '2021-01-17 01:47:13'),
(171, 0, '2021-01-19', NULL, '2021-01-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', NULL, NULL, '90.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-17 06:20:26', '2021-01-17 06:20:26'),
(172, 0, '2021-01-19', NULL, '2021-01-20', NULL, 'Entre 8h et 12h', 'Intérieur', '25 bis rue de la fraternité', NULL, 'Esbly', NULL, '77', 'Maison', NULL, 2, 'Spa Navy 4 places', '90.00', 2, '20.00', '113.00', NULL, NULL, '0.00', NULL, NULL, 0, 'pi_1IAWOzGOBvkHIeeTz9kgqPAk', 0, 13, 'renaud.vibet@laposte.net', NULL, NULL, '2021-01-17 08:12:26', '2021-01-17 08:14:26'),
(173, 0, '2021-01-30', NULL, '2021-02-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 'Spa Carbone 6 places', '160.00', NULL, NULL, '210.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-17 08:19:49', '2021-01-17 08:19:49'),
(174, 0, '2021-01-19', NULL, '2021-01-20', NULL, 'Entre 8h et 12h', 'Intérieur', '25 bis rue de la fraternité', NULL, 'ESBLY', NULL, '77', 'Maison', NULL, 5, 'Spa Carbone 6 places', '160.00', 2, '20.00', '180.00', NULL, NULL, '0.00', NULL, NULL, 0, 'pi_1IAWXKGOBvkHIeeTZHNp2CUV', 0, 13, 'renaud.vibet@laposte.net', NULL, NULL, '2021-01-17 08:21:36', '2021-01-17 08:23:02'),
(175, 0, '2021-02-13', NULL, '2021-02-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 'Spa Carbone 6 places', '160.00', 2, '20.00', '225.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-17 08:22:24', '2021-01-17 08:22:24'),
(176, 0, '2021-01-19', NULL, '2021-01-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Spa Sahara 4 places', '90.00', 2, '20.00', '110.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-17 08:23:56', '2021-01-17 08:23:56'),
(177, 0, '2021-01-22', NULL, '2021-01-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 'Spa Carbone 6 places', '160.00', 2, '20.00', '220.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-17 08:23:59', '2021-01-17 08:23:59'),
(178, 0, '2021-01-19', NULL, '2021-01-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', 2, '20.00', '110.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-17 08:32:20', '2021-01-17 08:32:20'),
(179, 0, '2021-01-19', NULL, '2021-01-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 'Spa Baltik 6 places', '120.00', 1, '20.00', '140.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-17 08:47:36', '2021-01-17 08:47:36'),
(180, 0, '2021-01-19', NULL, '2021-01-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', NULL, NULL, '93.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-17 08:58:00', '2021-01-17 08:58:00'),
(181, 0, '2021-01-30', NULL, '2021-01-30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', 2, '20.00', '83.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-17 09:21:41', '2021-01-17 09:21:41'),
(182, 0, '2021-01-19', NULL, '2021-01-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', NULL, NULL, '90.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-17 09:37:52', '2021-01-17 09:37:52'),
(183, 0, '2021-01-19', NULL, '2021-01-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', 2, '20.00', '110.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-17 10:32:48', '2021-01-17 10:32:48'),
(184, 0, '2021-01-23', NULL, '2021-01-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Spa Sahara 4 places', '90.00', NULL, NULL, '90.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-17 11:18:53', '2021-01-17 11:18:53'),
(185, 0, '2021-01-28', NULL, '2021-01-29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', NULL, NULL, '90.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-17 11:19:02', '2021-01-17 11:19:02'),
(186, 0, '2021-01-28', NULL, '2021-01-29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', 2, '20.00', '120.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-17 11:37:30', '2021-01-17 11:37:30'),
(187, 0, '2021-01-19', NULL, '2021-01-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', 2, '20.00', '113.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-17 11:40:31', '2021-01-17 11:40:31'),
(188, 0, '2021-01-19', NULL, '2021-01-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Spa Sahara 4 places', '90.00', 2, '20.00', '113.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-17 11:41:13', '2021-01-17 11:41:13'),
(189, 0, '2021-01-23', NULL, '2021-01-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Spa Sahara 4 places', '90.00', NULL, NULL, '90.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-17 12:36:38', '2021-01-17 12:36:38'),
(190, 0, '2021-01-19', NULL, '2021-01-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 'Spa Baltik 6 places', '120.00', NULL, NULL, '120.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-17 12:43:05', '2021-01-17 12:43:05'),
(191, 0, '2021-01-27', NULL, '2021-01-31', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', NULL, NULL, '180.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-17 13:26:10', '2021-01-17 13:26:10'),
(192, 0, '2021-02-07', NULL, '2021-02-13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', 2, '20.00', '260.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-17 13:34:30', '2021-01-17 13:34:30'),
(193, 0, '2021-02-13', NULL, '2021-02-14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', 2, '20.00', '113.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-17 13:36:05', '2021-01-17 13:36:05'),
(194, 0, '2021-01-22', NULL, '2021-01-23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', NULL, NULL, '92.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-17 14:57:42', '2021-01-17 14:57:42'),
(195, 0, '2021-02-13', NULL, '2021-02-14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', NULL, NULL, '90.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-17 15:43:29', '2021-01-17 15:43:29'),
(196, 0, '2021-01-23', NULL, '2021-01-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', 2, '20.00', '110.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-17 16:03:10', '2021-01-17 16:03:10'),
(197, 0, '2021-01-19', NULL, '2021-01-19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', NULL, NULL, '60.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-17 16:16:15', '2021-01-17 16:16:15'),
(198, 0, '2021-01-23', NULL, '2021-01-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', 2, '20.00', '110.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-17 16:33:10', '2021-01-17 16:33:10'),
(199, 0, '2021-01-19', NULL, '2021-01-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 'Spa Baltik 6 places', '120.00', 1, '20.00', '149.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-17 17:06:46', '2021-01-17 17:06:46'),
(200, 0, '2021-01-19', NULL, '2021-01-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 'Spa Baltik 6 places', '120.00', NULL, NULL, '126.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-17 17:18:08', '2021-01-17 17:18:08'),
(201, 0, '2021-01-19', NULL, '2021-01-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', NULL, NULL, '90.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-17 17:31:00', '2021-01-17 17:31:00'),
(202, 0, '2021-01-19', NULL, '2021-01-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Spa Sahara 4 places', '90.00', NULL, NULL, '90.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-17 17:31:20', '2021-01-17 17:31:20'),
(203, 0, '2021-01-22', NULL, '2021-01-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', NULL, NULL, '120.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-17 17:31:24', '2021-01-17 17:31:24'),
(204, 0, '2021-02-18', NULL, '2021-02-18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', NULL, NULL, '60.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-17 17:32:03', '2021-01-17 17:32:03'),
(205, 0, '2021-01-23', NULL, '2021-01-23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', NULL, NULL, '60.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-17 17:32:50', '2021-01-17 17:32:50'),
(206, 0, '2021-01-23', NULL, '2021-01-23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Spa Sahara 4 places', '90.00', NULL, NULL, '60.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-17 17:32:54', '2021-01-17 17:32:54'),
(207, 0, '2021-01-19', NULL, '2021-01-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Spa Sahara 4 places', '90.00', NULL, NULL, '90.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-17 17:57:00', '2021-01-17 17:57:00'),
(208, 0, '2021-01-25', NULL, '2021-01-26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 'Spa Carbone 6 places', '160.00', NULL, NULL, '160.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-17 18:03:34', '2021-01-17 18:03:34'),
(209, 0, '2021-02-14', NULL, '2021-02-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Spa Sahara 4 places', '90.00', 2, '20.00', '118.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-17 18:03:42', '2021-01-17 18:03:42'),
(210, 0, '2021-01-24', NULL, '2021-01-25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', 2, '20.00', '110.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-17 18:09:14', '2021-01-17 18:09:14'),
(211, 0, '2021-01-19', NULL, '2021-01-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Spa Sahara 4 places', '90.00', NULL, NULL, '93.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-17 18:09:22', '2021-01-17 18:09:22'),
(212, 0, '2021-02-14', NULL, '2021-02-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 'Spa Carbone 6 places', '160.00', NULL, NULL, '163.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-17 18:09:45', '2021-01-17 18:09:45'),
(213, 0, '2021-02-14', NULL, '2021-02-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', 2, '20.00', '110.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-17 18:09:52', '2021-01-17 18:09:52'),
(214, 0, '2021-02-14', NULL, '2021-02-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', 2, '20.00', '110.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-17 18:10:02', '2021-01-17 18:10:02'),
(215, 0, '2021-02-14', NULL, '2021-02-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', 2, '20.00', '110.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-17 18:13:47', '2021-01-17 18:13:47'),
(216, 0, '2021-02-11', NULL, '2021-02-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', NULL, NULL, '90.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-17 18:15:20', '2021-01-17 18:15:20'),
(217, 0, '2021-01-19', NULL, '2021-01-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', 2, '20.00', '110.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-17 18:15:22', '2021-01-17 18:15:22'),
(218, 0, '2021-01-22', NULL, '2021-01-23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', NULL, NULL, '93.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-17 18:20:34', '2021-01-17 18:20:34'),
(219, 0, '2021-01-19', NULL, '2021-01-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Spa Sahara 4 places', '90.00', NULL, NULL, '92.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-17 19:18:58', '2021-01-17 19:18:58'),
(220, 0, '2021-02-21', NULL, '2021-02-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Spa Sahara 4 places', '90.00', 2, '20.00', '110.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-17 19:37:04', '2021-01-17 19:37:04'),
(221, 0, '2021-01-19', NULL, '2021-01-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Spa Sahara 4 places', '90.00', 2, '20.00', '110.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-17 19:38:46', '2021-01-17 19:38:46'),
(222, 0, '2021-02-14', NULL, '2021-02-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Spa Sahara 4 places', '90.00', 2, '20.00', '290.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-17 19:39:27', '2021-01-17 19:39:27'),
(223, 0, '2021-02-21', NULL, '2021-02-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Spa Sahara 4 places', '90.00', 2, '20.00', '110.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-17 19:39:58', '2021-01-17 19:39:58'),
(224, 0, '2021-02-21', NULL, '2021-02-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Spa Sahara 4 places', '90.00', 2, '20.00', '110.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-17 19:40:23', '2021-01-17 19:40:23'),
(225, 0, '2021-02-21', NULL, '2021-02-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', 2, '20.00', '110.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-17 19:41:17', '2021-01-17 19:41:17'),
(226, 0, '2021-01-22', NULL, '2021-01-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', NULL, NULL, '120.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-17 19:48:24', '2021-01-17 19:48:24'),
(227, 1, '2021-02-14', NULL, '2021-02-15', NULL, 'Entre 8h et 12h', 'Intérieur', '3 rue Antoine de saint exupery', '77', 'Coupvray', NULL, '77', 'Maison', NULL, 1, 'Sahara 4 places', '90.00', 2, '20.00', '99.00', 'PromoInstagram', NULL, '0.00', NULL, NULL, 1, NULL, 0, 12, 'celine.munoz@gmail.com', NULL, NULL, NULL, NULL),
(228, 0, '2021-01-19', NULL, '2021-01-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', NULL, NULL, '92.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-17 20:09:16', '2021-01-17 20:09:16'),
(229, 0, '2021-01-22', NULL, '2021-01-24', NULL, 'Entre 8h et 12h', 'Intérieur', '19 chemin de la porte verte', NULL, '77144 - MONTEVRAIN', NULL, '77', 'Maison', NULL, 2, 'Spa Navy 4 places', '90.00', 2, '20.00', '140.00', NULL, NULL, '0.00', NULL, NULL, 0, 'pi_1IAha5GOBvkHIeeTlevC0wJc', 0, 5, 'cnl.alexandre@gmail.com', NULL, NULL, '2021-01-17 20:10:05', '2021-01-17 20:10:38'),
(230, 0, '2021-01-22', NULL, '2021-01-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 'Spa Carbone 6 places', '160.00', NULL, NULL, '200.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-17 20:57:47', '2021-01-17 20:57:47'),
(231, 0, '2021-02-14', NULL, '2021-02-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', 2, '20.00', '110.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-17 21:04:35', '2021-01-17 21:04:35'),
(232, 0, '2021-01-19', NULL, '2021-01-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', NULL, NULL, '90.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-17 21:36:59', '2021-01-17 21:36:59'),
(233, 0, '2021-02-14', NULL, '2021-02-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', NULL, NULL, '90.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-17 21:38:33', '2021-01-17 21:38:33'),
(234, 0, '2021-01-19', NULL, '2021-01-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Spa Sahara 4 places', '90.00', NULL, NULL, '90.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-17 21:54:13', '2021-01-17 21:54:13'),
(235, 0, '2021-02-14', NULL, '2021-02-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 'Spa Baltik 6 places', '120.00', NULL, NULL, '120.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-18 00:29:51', '2021-01-18 00:29:51'),
(236, 0, '2021-02-05', NULL, '2021-02-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', NULL, NULL, '90.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-18 05:48:54', '2021-01-18 05:48:54'),
(237, 0, '2021-04-30', NULL, '2021-05-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', 2, '20.00', '110.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-18 06:40:38', '2021-01-18 06:40:38'),
(238, 0, '2021-01-26', NULL, '2021-01-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Spa Sahara 4 places', '90.00', 2, '20.00', '112.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-18 07:56:50', '2021-01-18 07:56:50'),
(239, 0, '2021-02-13', NULL, '2021-02-14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', NULL, NULL, '90.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-18 08:54:50', '2021-01-18 08:54:50'),
(240, 0, '2021-02-13', NULL, '2021-02-14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', NULL, NULL, '90.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-18 08:56:22', '2021-01-18 08:56:22'),
(241, 0, '2021-03-23', NULL, '2021-03-28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Spa Sahara 4 places', '90.00', NULL, NULL, '215.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-18 09:54:20', '2021-01-18 09:54:20'),
(242, 0, '2021-01-21', NULL, '2021-01-23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', 2, '20.00', '142.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-18 10:55:58', '2021-01-18 10:55:58'),
(243, 0, '2021-01-20', NULL, '2021-01-21', NULL, 'Entre 12h et 15h', 'Intérieur', '6 rue du Gripet', NULL, 'Magny-le-Hongre', '6 rue du Gripet', '77', 'Maison', NULL, 4, 'Spa Baltik 6 places', '120.00', NULL, NULL, '120.00', NULL, NULL, '0.00', NULL, NULL, 0, 'pi_1IAwLyGOBvkHIeeTalh157dm', 0, 14, 'sbordet@orange.fr', NULL, NULL, '2021-01-18 11:56:00', '2021-01-18 11:57:03'),
(244, 0, '2021-01-20', NULL, '2021-01-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 'Spa Baltik 6 places', '120.00', NULL, NULL, '120.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-18 11:59:24', '2021-01-18 11:59:24'),
(245, 0, '2021-01-23', NULL, '2021-01-24', NULL, 'Entre 12h et 15h', 'Intérieur', '6 rue du Gripet', NULL, 'Magny-le-Hongre', '6 rue du Gripet', '77', 'Maison', NULL, 4, 'Spa Baltik 6 places', '120.00', NULL, NULL, '120.00', NULL, NULL, '0.00', NULL, NULL, 0, 'pi_1IAwPrGOBvkHIeeThoR5a3Jn', 0, 14, 'sbordet@orange.fr', NULL, NULL, '2021-01-18 12:00:36', '2021-01-18 12:01:03'),
(246, 0, '2021-02-01', NULL, '2021-02-07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', NULL, NULL, '240.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-18 12:13:16', '2021-01-18 12:13:16'),
(247, 0, '2021-01-23', NULL, '2021-01-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Spa Sahara 4 places', '90.00', NULL, NULL, '90.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-18 14:01:24', '2021-01-18 14:01:24'),
(248, 0, '2021-01-21', NULL, '2021-01-23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', 2, '20.00', '142.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-18 17:38:01', '2021-01-18 17:38:01'),
(249, 0, '2021-01-23', NULL, '2021-01-24', NULL, 'Entre 12h et 15h', 'Intérieur', '6 rue du Gripet', NULL, 'Magny-le-Hongre', '6 rue du Gripet', '77', 'Maison', NULL, 1, 'Spa Sahara 4 places', '90.00', NULL, NULL, '90.00', NULL, NULL, '0.00', NULL, NULL, 0, 'pi_1IB3T7GOBvkHIeeTlwGVnUrz', 0, 14, 'sbordet@orange.fr', NULL, NULL, '2021-01-18 19:32:26', '2021-01-18 19:32:55'),
(250, 0, '2021-01-20', NULL, '2021-01-21', NULL, 'Entre 8h et 12h', 'Intérieur', '6 rue du Gripet', NULL, 'Magny-le-Hongre', '6 rue du Gripet', '77', 'Maison', NULL, 1, 'Spa Sahara 4 places', '90.00', NULL, NULL, '90.00', NULL, NULL, '0.00', NULL, NULL, 0, 'pi_1IB3V5GOBvkHIeeTmNrh1vSZ', 0, 14, 'sbordet@orange.fr', NULL, NULL, '2021-01-18 19:34:07', '2021-01-18 19:34:55'),
(251, 0, '2021-01-23', NULL, '2021-01-24', NULL, 'Entre 8h et 12h', 'Intérieur', '6 rue du Gripet', NULL, 'Magny-le-Hongre', '6 rue du Gripet', '77', 'Maison', NULL, 1, 'Spa Sahara 4 places', '90.00', NULL, NULL, '90.00', NULL, NULL, '0.00', NULL, NULL, 0, 'pi_1IB3VoGOBvkHIeeTexj6u3XS', 0, 14, 'sbordet@orange.fr', NULL, NULL, '2021-01-18 19:35:18', '2021-01-18 19:35:40'),
(252, 1, '2021-01-22', NULL, '2021-01-24', NULL, 'Entre 12h et 15h', 'Intérieur', '3 rue de l’arcade', NULL, 'Lagny sur Marne', '2eme étage avec ascenseur', '77', 'Appartement', NULL, 2, 'Spa Navy 4 places', '90.00', NULL, NULL, '120.00', NULL, NULL, '0.00', NULL, NULL, 1, 'pi_1IB3ZdGOBvkHIeeTYUeyq0tw', 0, 15, 'marineluu2201@yahoo.fr', NULL, NULL, '2021-01-18 19:37:18', '2021-01-18 19:40:38'),
(253, 0, '2021-02-06', NULL, '2021-02-07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Spa Sahara 4 places', '90.00', NULL, NULL, '90.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-18 20:51:50', '2021-01-18 20:51:50'),
(254, 0, '2021-02-13', NULL, '2021-02-14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', NULL, NULL, '100.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-18 22:53:23', '2021-01-18 22:53:23'),
(255, 0, '2021-02-05', NULL, '2021-02-14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', NULL, NULL, '330.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-19 08:50:39', '2021-01-19 08:50:39'),
(256, 0, '2021-01-30', NULL, '2021-01-31', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', NULL, NULL, '90.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-19 08:51:28', '2021-01-19 08:51:28'),
(257, 0, '2021-02-17', NULL, '2021-02-18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', NULL, NULL, '92.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-19 09:21:23', '2021-01-19 09:21:23'),
(258, 0, '2021-02-01', NULL, '2021-02-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', NULL, NULL, '120.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-19 13:53:24', '2021-01-19 13:53:24'),
(259, 0, '2021-01-30', NULL, '2021-01-31', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', NULL, NULL, '90.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-19 15:07:02', '2021-01-19 15:07:02'),
(260, 0, '2021-02-12', NULL, '2021-02-14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', 2, '20.00', '140.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-19 15:33:02', '2021-01-19 15:33:02'),
(261, 0, '2021-02-14', NULL, '2021-02-15', NULL, 'Entre 8h et 12h', 'Intérieur', '12 rue du lievre', NULL, 'Thorigny sur marne', NULL, '77', 'Maison', NULL, 2, 'Spa Navy 4 places', '90.00', 2, '20.00', '110.00', NULL, NULL, '0.00', NULL, NULL, 0, 'pi_1IBMNSGOBvkHIeeTS9BhfV1I', 0, 16, 'guycho974@gmail.com', NULL, NULL, '2021-01-19 15:35:06', '2021-01-19 15:44:20'),
(262, 0, '2021-02-14', NULL, '2021-02-15', NULL, 'Entre 8h et 12h', 'Intérieur', '12 rue du lievre', NULL, 'Thorigny sur marne', NULL, '77', 'Maison', NULL, 2, 'Spa Navy 4 places', '90.00', 2, '20.00', '110.00', NULL, NULL, '0.00', NULL, NULL, 0, 'pi_1IBMXnGOBvkHIeeTL6rFE0C6', 0, 16, 'guycho974@gmail.com', NULL, NULL, '2021-01-19 15:48:25', '2021-01-19 15:54:59'),
(263, 0, '2021-02-14', NULL, '2021-02-15', NULL, 'Entre 8h et 12h', 'Intérieur', '12 rue du lievre', NULL, 'Thorigny sur marne', NULL, '77', 'Maison', NULL, 2, 'Spa Navy 4 places', '90.00', 2, '20.00', '110.00', NULL, NULL, '0.00', NULL, NULL, 0, 'pi_1IBMajGOBvkHIeeTD1fYLrYd', 0, 16, 'guycho974@gmail.com', NULL, NULL, '2021-01-19 15:57:07', '2021-01-19 15:58:02'),
(264, 0, '2021-02-14', NULL, '2021-02-15', NULL, 'Entre 8h et 12h', 'Intérieur', '19 chemin de la porte verte', NULL, '77144 - MONTEVRAIN', NULL, '77', 'Maison', NULL, 2, 'Spa Navy 4 places', '90.00', 2, '20.00', '110.00', NULL, NULL, '0.00', NULL, NULL, 0, 'pi_1IBNKlGOBvkHIeeTRWD3oOng', 0, 5, 'cnl.alexandre@gmail.com', NULL, NULL, '2021-01-19 16:41:58', '2021-01-19 16:45:35'),
(265, 1, '2021-02-21', NULL, '2021-02-22', NULL, 'Entre 8h et 12h', 'Intérieur', '12 rue du lievre', NULL, 'Thorigny sur marne', '12 rue du lievre', '77', 'Maison', NULL, 2, 'Spa Navy 4 places', '90.00', 2, '20.00', '110.00', NULL, NULL, '0.00', NULL, NULL, 1, 'pi_1IBNWiGOBvkHIeeTc5eRoAYR', 0, 16, 'guycho974@gmail.com', NULL, NULL, '2021-01-19 16:57:01', '2021-01-19 16:59:16'),
(266, 0, '2021-01-21', NULL, '2021-01-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Spa Sahara 4 places', '90.00', NULL, NULL, '90.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-19 20:33:48', '2021-01-19 20:33:48'),
(267, 0, '2021-02-10', NULL, '2021-02-11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', NULL, NULL, '90.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-19 22:53:24', '2021-01-19 22:53:24'),
(268, 0, '2021-04-17', NULL, '2021-04-25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Spa Sahara 4 places', '90.00', NULL, NULL, '300.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-20 01:56:06', '2021-01-20 01:56:06'),
(269, 0, '2021-01-22', NULL, '2021-01-23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Spa Sahara 4 places', '90.00', 2, '20.00', '113.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-20 03:34:58', '2021-01-20 03:34:58'),
(270, 0, '2021-02-06', NULL, '2021-02-07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', NULL, NULL, '90.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-20 06:04:33', '2021-01-20 06:04:33'),
(271, 0, '2021-01-22', NULL, '2021-01-23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 'Spa Carbone 6 places', '160.00', NULL, NULL, '160.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-20 10:41:47', '2021-01-20 10:41:47'),
(272, 1, '2021-02-06', NULL, '2021-02-07', NULL, 'Entre 8h et 12h', 'Intérieur', '16 rue du 8 mai 1945', NULL, 'Esbly', NULL, '77', 'Maison', NULL, 5, 'Spa Carbone 6 places', '160.00', NULL, NULL, '160.00', NULL, NULL, '0.00', NULL, NULL, 1, 'pi_1IBfZwGOBvkHIeeTPsyxoL9T', 0, 17, 'stephaniechascomoreira@gmail.com', NULL, NULL, '2021-01-20 12:12:49', '2021-01-20 12:14:52'),
(273, 1, '2020-12-31', NULL, '2021-01-01', NULL, 'Entre 8h et 12h', 'Intérieur', '31 rue Louis Braille', NULL, 'Chalifert', NULL, '77', 'Maison', NULL, 5, 'Spa Carbone 6 places', '120.00', NULL, NULL, '120.00', NULL, NULL, '0.00', NULL, NULL, 1, '', 0, 1, '', NULL, NULL, '2021-01-20 12:12:49', '2021-01-20 12:14:52'),
(274, 1, '2021-01-09', NULL, '2021-01-10', NULL, 'Entre 8h et 12h', 'Intérieur', '11 cours de la gondoire', NULL, 'Serris', NULL, '77', 'Maison', NULL, 2, 'Spa Navy 4 places', '90.00', NULL, NULL, '90.00', NULL, NULL, '0.00', NULL, NULL, 1, '', 0, 1, '', NULL, NULL, '2021-01-20 12:12:49', '2021-01-20 12:14:52'),
(276, 1, '2021-01-23', NULL, '2021-01-24', NULL, 'Entre 8h et 12h', 'Intérieur', '6 rue du gripet', NULL, 'Magny-le-Hongre', NULL, '77', 'Maison', NULL, 1, 'Spa Sahara 4 places', '90.00', NULL, NULL, '90.00', NULL, NULL, '0.00', NULL, NULL, 1, '', 0, 1, '', NULL, NULL, '2021-01-20 12:12:49', '2021-01-20 12:14:52'),
(277, 0, '2021-01-22', NULL, '2021-01-23', NULL, 'Entre 8h et 12h', 'Intérieur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 'Spa Baltik 6 places', '120.00', NULL, NULL, '120.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-20 22:15:18', '2021-01-20 22:15:18'),
(278, 0, '2021-01-23', NULL, '2021-01-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', 2, '20.00', '110.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-21 14:33:50', '2021-01-21 14:33:50'),
(279, 0, '2021-01-26', NULL, '2021-01-28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Spa Sahara 4 places', '90.00', NULL, NULL, '120.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-21 14:54:48', '2021-01-21 14:54:48'),
(280, 0, '2021-01-23', NULL, '2021-01-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', NULL, NULL, '90.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-21 18:42:19', '2021-01-21 18:42:19'),
(281, 1, '2021-01-30', NULL, '2021-01-31', NULL, 'Entre 8h et 12h', 'Intérieur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 'Spa Baltik 4 places', '90.00', NULL, NULL, '90.00', NULL, NULL, '0.00', NULL, NULL, 1, NULL, 0, 1, 'Fanny Bobo', NULL, NULL, '2021-01-21 18:42:19', '2021-01-21 18:42:19');
INSERT INTO `reservations` (`reservation_id`, `reservation_active`, `reservation_date_debut`, `reservation_heure_install`, `reservation_date_fin`, `reservation_heure_desinstall`, `reservation_creneau`, `reservation_emplacement`, `reservation_rue`, `reservation_cp`, `reservation_ville`, `reservation_complement`, `reservation_departement`, `reservation_type_logement`, `reservation_remplissage`, `reservation_spa_id`, `reservation_spa_libelle`, `reservation_prix`, `reservation_pack_id`, `reservation_prix_pack`, `reservation_montant_total`, `reservation_promo`, `reservation_cadeau_id`, `reservation_frais_km`, `reservation_moyen_paiement`, `reservation_moyen_contact`, `reservation_paye`, `reservation_payment_id`, `reservation_notation_prestation`, `reservation_client_id`, `reservation_email`, `reservation_phone`, `reservation_info_complementaires`, `created_at`, `updated_at`) VALUES
(282, 0, '2021-01-24', NULL, '2021-01-25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 'Spa Carbone 6 places', '160.00', 1, '20.00', '191.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-22 11:17:45', '2021-01-22 11:17:46'),
(283, 0, '2021-01-24', NULL, '2021-01-25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Spa Sahara 4 places', '90.00', NULL, NULL, '90.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-22 11:37:29', '2021-01-22 11:37:29'),
(284, 0, '2021-01-24', NULL, '2021-01-25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Spa Sahara 4 places', '90.00', 2, '20.00', '113.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-22 18:26:55', '2021-01-22 18:26:55'),
(285, 0, '2021-02-13', NULL, '2021-02-14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 'Spa Baltik 4 places', '90.00', 2, '20.00', '110.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-23 08:59:53', '2021-01-23 08:59:53'),
(286, 0, '2021-02-13', NULL, '2021-02-14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Spa Sahara 4 places', '90.00', 2, '20.00', '110.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-23 09:01:07', '2021-01-23 09:01:07'),
(287, 0, '2021-02-13', NULL, '2021-02-14', NULL, 'Entre 8h et 12h', 'Intérieur', '9 rue de torcy', NULL, 'Chelles', NULL, '77', 'Maison', NULL, 1, 'Spa Sahara 4 places', '90.00', 2, '20.00', '112.00', NULL, NULL, '0.00', NULL, NULL, 0, 'pi_1ICkTAGOBvkHIeeTcdwcj6rE', 0, 21, 'claudie.87@hotmail.com', NULL, NULL, '2021-01-23 11:00:21', '2021-01-23 11:39:58'),
(288, 0, '2021-02-13', NULL, '2021-02-14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Spa Sahara 4 places', '90.00', 2, '20.00', '112.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-23 11:00:21', '2021-01-23 11:00:21'),
(289, 0, '2021-02-13', NULL, '2021-02-14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Spa Sahara 4 places', '90.00', 2, '20.00', '112.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-23 11:00:21', '2021-01-23 11:00:21'),
(290, 1, '2021-01-30', NULL, '2021-01-31', NULL, 'Entre 8h et 12h', 'Intérieur', '15 ALLEE DES FENAISONS', NULL, 'Chanteloup-en-Brie', NULL, '77', 'Maison', NULL, 1, 'Spa Sahara 4 places', '90.00', NULL, NULL, '90.00', NULL, NULL, '0.00', NULL, NULL, 1, 'pi_1ICk2uGOBvkHIeeTxeNYl4BO', 0, 22, 'stephanie.tesooukian@gmail.com', NULL, NULL, '2021-01-23 11:11:25', '2021-01-23 11:14:48'),
(291, 0, '2021-01-30', NULL, '2021-01-31', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', 2, '20.00', '110.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-23 13:48:27', '2021-01-23 13:48:27'),
(292, 0, '2021-01-29', NULL, '2021-01-30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', 2, '20.00', '110.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-23 13:49:17', '2021-01-23 13:49:17'),
(293, 0, '2021-02-07', NULL, '2021-02-08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 'Spa Baltik 4 places', '90.00', 2, '20.00', '118.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-23 18:27:21', '2021-01-23 18:27:21'),
(294, 0, '2021-02-21', NULL, '2021-02-22', NULL, 'Entre 8h et 12h', 'Intérieur', '9 rue du bois de la fontaine', NULL, 'VAIRES SUR MARNE', '9 rue du bois de la fontaine', '77', 'Maison', NULL, 3, 'Spa Baltik 4 places', '90.00', 2, '20.00', '110.00', NULL, NULL, '0.00', NULL, NULL, 0, 'pi_1ID3iuGOBvkHIeeTazlwcI5E', 0, 23, 'ludivinepierre@live.fr', NULL, NULL, '2021-01-24 08:12:16', '2021-01-24 08:13:30'),
(295, 1, '2021-02-13', NULL, '2021-02-14', NULL, 'Entre 8h et 12h', 'Intérieur', '9 rue du bois de la fontaine', NULL, 'Vaires-sur-Marne', '9 rue du bois de la fontaine', '77', 'Maison', NULL, 3, 'Spa Baltik 4 places', '90.00', 2, '20.00', '110.00', NULL, NULL, '0.00', NULL, NULL, 1, 'pi_1ID3mnGOBvkHIeeTDho8hYCl', 0, 23, 'ludivinepierre@live.fr', NULL, NULL, '2021-01-24 08:17:05', '2021-01-24 08:17:55'),
(296, 0, '2021-01-30', NULL, '2021-01-31', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', 2, '20.00', '110.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-24 11:54:38', '2021-01-24 11:54:38'),
(297, 0, '2021-02-11', NULL, '2021-02-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', NULL, NULL, '330.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-24 13:17:15', '2021-01-24 13:17:15'),
(298, 0, '2021-01-26', NULL, '2021-01-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 'Spa Baltik 4 places', '90.00', NULL, NULL, '90.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-24 13:26:34', '2021-01-24 13:26:34'),
(299, 0, '2021-01-30', NULL, '2021-01-31', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', 2, '20.00', '110.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-25 23:28:01', '2021-01-25 23:28:01'),
(300, 0, '2021-02-05', NULL, '2021-02-07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', 2, '20.00', '140.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-26 15:28:43', '2021-01-26 15:28:43'),
(301, 0, '2021-02-06', NULL, '2021-02-07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', 2, '20.00', '110.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-26 15:29:22', '2021-01-26 15:29:22'),
(302, 0, '2021-01-28', NULL, '2021-01-29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', NULL, NULL, '90.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-26 20:25:18', '2021-01-26 20:25:18'),
(303, 0, '2021-02-05', NULL, '2021-02-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 'Spa Baltik 4 places', '90.00', NULL, NULL, '92.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-27 16:36:52', '2021-01-27 16:36:52'),
(304, 0, '2021-02-03', NULL, '2021-02-04', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Spa Sahara 4 places', '90.00', 2, '20.00', '113.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-27 17:13:05', '2021-01-27 17:13:05'),
(305, 0, '2021-01-29', NULL, '2021-01-30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', 2, '20.00', '110.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-27 17:51:39', '2021-01-27 17:51:39'),
(306, 0, '2021-01-30', NULL, '2021-01-31', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Spa Sahara 4 places', '90.00', 1, '20.00', '110.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-27 23:05:17', '2021-01-27 23:05:17'),
(307, 1, '2021-02-06', NULL, '2021-02-07', NULL, 'Entre 8h et 12h', 'Intérieur', '52 Boucle Belle Josephine', NULL, 'Magny-le-Hongre', NULL, '77', 'Maison', NULL, 2, 'Spa Navy 4 places', '90.00', NULL, NULL, '90.00', NULL, NULL, '0.00', NULL, NULL, 1, 'pi_1IEtIpGOBvkHIeeTUjCpTzp2', 0, 24, 'gouleret.christelle@gmail.com', NULL, NULL, '2021-01-29 08:08:44', '2021-01-29 09:31:16'),
(308, 0, '2021-01-31', NULL, '2021-02-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', NULL, NULL, '90.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-29 08:25:34', '2021-01-29 08:25:34'),
(309, 0, '2021-01-31', NULL, '2021-02-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Spa Sahara 4 places', '90.00', NULL, NULL, '90.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-29 22:45:56', '2021-01-29 22:45:56'),
(310, 0, '2021-01-31', NULL, '2021-02-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Spa Sahara 4 places', '90.00', NULL, NULL, '90.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-29 22:50:11', '2021-01-29 22:50:11'),
(311, 0, '2021-02-19', NULL, '2021-02-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', NULL, NULL, '96.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-30 14:19:45', '2021-01-30 14:19:45'),
(312, 0, '2021-02-01', NULL, '2021-02-02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 'Spa Baltik 4 places', '90.00', 2, '20.00', '113.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-30 19:44:19', '2021-01-30 19:44:19'),
(313, 0, '2021-02-27', NULL, '2021-02-28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Spa Sahara 4 places', '90.00', NULL, NULL, '90.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-01-31 17:53:12', '2021-01-31 17:53:12'),
(314, 0, '2021-02-17', NULL, '2021-02-18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 'Spa Carbone 6 places', '160.00', 1, '20.00', '188.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-02-01 06:32:19', '2021-02-01 06:32:19'),
(315, 0, '2021-02-19', NULL, '2021-02-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', NULL, NULL, '132.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-02-01 15:28:37', '2021-02-01 15:28:37'),
(316, 1, '2021-02-06', NULL, '2021-02-07', NULL, 'Entre 8h et 12h', 'Intérieur', '3 rue de la vallée', NULL, 'Collegien', 'Interphone ; Douraguia', '77', 'Maison', NULL, 1, 'Spa Sahara 4 places', '90.00', NULL, NULL, '90.00', NULL, NULL, '0.00', NULL, NULL, 1, 'pi_1IG8R7GOBvkHIeeT7GOWQX6E', 0, 25, 'jennifer.douraguia@gmail.com', NULL, NULL, '2021-02-01 19:50:38', '2021-02-01 19:53:27'),
(317, 1, '2021-02-06', NULL, '2021-02-07', NULL, NULL, NULL, '', '77', 'Ferrieres-en-Brie', NULL, '77', NULL, NULL, 1, 'Spa Sahara 4 Places', NULL, NULL, NULL, NULL, NULL, NULL, '0.00', NULL, NULL, 1, NULL, 0, 26, 'vincentdu77600@gmail.com', NULL, NULL, NULL, NULL),
(318, 1, '2021-02-05', NULL, '2021-02-06', NULL, NULL, NULL, '23 rue saint denis', '77700', 'Coupvray', NULL, NULL, NULL, NULL, 3, 'Spa Baltik 4 places', '110.00', NULL, NULL, '110.00', NULL, NULL, '0.00', NULL, NULL, 1, NULL, 0, 27, 'fouchythomas@gmail.com', NULL, NULL, NULL, NULL),
(319, 1, '2021-02-13', NULL, '2021-02-14', NULL, NULL, NULL, '9 rue de Torcy', '77', 'Chelles', NULL, '77', NULL, NULL, 4, 'Spa Baltik 6 places', '120.00', NULL, NULL, '120.00', NULL, NULL, '0.00', NULL, NULL, 1, NULL, 0, 28, 'claudie.87@hotmail.com', NULL, NULL, NULL, NULL),
(320, 0, '2021-02-16', NULL, '2021-02-17', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Spa Sahara 4 places', '90.00', 2, '20.00', '110.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-02-02 00:25:22', '2021-02-02 00:25:22'),
(321, 0, '2021-02-19', NULL, '2021-02-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', 1, '20.00', '110.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-02-02 14:34:25', '2021-02-02 14:34:25'),
(322, 0, '2021-02-04', NULL, '2021-02-05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', 2, '20.00', '113.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-02-02 17:55:52', '2021-02-02 17:55:52'),
(323, 0, '2021-02-20', NULL, '2021-02-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Spa Sahara 4 places', '90.00', 2, '20.00', '110.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-02-02 18:16:00', '2021-02-02 18:16:00'),
(324, 0, '2021-02-20', NULL, '2021-02-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Spa Sahara 4 places', '90.00', 2, '20.00', '110.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-02-02 18:16:00', '2021-02-02 18:16:00'),
(325, 0, '2021-02-04', NULL, '2021-02-16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', NULL, NULL, '420.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-02-02 18:41:13', '2021-02-02 18:41:13'),
(326, 0, '2021-02-04', NULL, '2021-02-05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Spa Sahara 4 places', '90.00', NULL, NULL, '96.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-02-02 20:53:23', '2021-02-02 20:53:23'),
(327, 0, '2021-02-16', NULL, '2021-02-18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', NULL, NULL, '130.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-02-02 22:12:06', '2021-02-02 22:12:06'),
(328, 0, '2021-02-09', NULL, '2021-02-10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', NULL, NULL, '92.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-02-02 22:53:32', '2021-02-02 22:53:32'),
(329, 0, '2021-02-05', NULL, '2021-02-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', 2, '20.00', '110.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-02-02 23:54:41', '2021-02-02 23:54:41'),
(330, 0, '2021-02-27', NULL, '2021-02-28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 'Spa Carbone 6 places', '160.00', 1, '20.00', '180.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-02-03 00:04:18', '2021-02-03 00:04:18'),
(331, 0, '2021-02-05', NULL, '2021-02-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', NULL, NULL, '90.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-02-03 10:14:16', '2021-02-03 10:14:16'),
(332, 0, '2021-02-16', NULL, '2021-02-17', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', 2, '20.00', '116.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-02-03 11:32:01', '2021-02-03 11:32:01'),
(333, 1, '2021-02-16', NULL, '2021-02-17', NULL, 'Entre 15h et 20h', 'Intérieur', '6 rue de l\'orangerie', NULL, 'TORCY', '3 ème étage code 23081', '77', 'Appartement', NULL, 2, 'Spa Navy 4 places', '90.00', 2, '20.00', '112.00', NULL, NULL, '0.00', NULL, NULL, 1, 'pi_1IGmXlGOBvkHIeeTUjOmI3k5', 0, 29, 'Nicow1816@gmail.com', NULL, NULL, '2021-02-03 14:40:51', '2021-02-03 14:41:48'),
(334, 0, '2021-02-05', NULL, '2021-02-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', NULL, NULL, '90.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-02-03 15:03:48', '2021-02-03 15:03:49'),
(335, 1, '2021-02-17', NULL, '2021-02-18', NULL, 'Entre 8h et 12h', 'Intérieur', '6 rue d\'Ariane', NULL, 'Chessy', 'codes A2910, B1506, C21', '77', 'Appartement', NULL, 2, 'Spa Navy 4 places', '90.00', NULL, NULL, '90.00', NULL, NULL, '0.00', NULL, NULL, 1, 'pi_1IGn9QGOBvkHIeeTvwgt7WYF', 0, 30, 'marisabrandi235@gmail.com', NULL, NULL, '2021-02-03 15:12:48', '2021-02-03 15:22:49'),
(336, 0, '2021-02-27', NULL, '2021-03-02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 'Spa Carbone 6 places', '160.00', NULL, NULL, '246.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-02-03 15:47:58', '2021-02-03 15:47:58'),
(337, 1, '2021-02-20', NULL, '2021-02-21', NULL, '10h', 'Intérieur', '160 rue de malnoue', '77', 'Noisy-le-Grand', '1er étage', '77', NULL, NULL, 2, 'Spa Navy 4 places', '90.00', 2, '10.00', NULL, NULL, NULL, '5.00', NULL, NULL, 1, NULL, 0, 31, NULL, NULL, NULL, NULL, NULL),
(338, 0, '2021-03-01', NULL, '2021-03-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', NULL, NULL, '123.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-02-03 20:15:12', '2021-02-03 20:15:12'),
(339, 0, '2021-02-27', NULL, '2021-02-28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', 2, '20.00', '110.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-02-04 17:01:23', '2021-02-04 17:01:23'),
(340, 0, '2021-02-25', NULL, '2021-02-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Spa Sahara 4 places', '90.00', 2, '20.00', '145.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-02-04 20:45:15', '2021-02-04 20:45:15'),
(341, 0, '2021-02-19', NULL, '2021-02-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 'Spa Baltik 4 places', '90.00', 2, '20.00', '140.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-02-05 17:48:45', '2021-02-05 17:48:45'),
(342, 0, '2021-02-19', NULL, '2021-02-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 'Spa Baltik 4 places', '90.00', NULL, NULL, '120.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-02-05 19:34:43', '2021-02-05 19:34:43'),
(343, 0, '2021-03-19', NULL, '2021-03-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 'Spa Baltik 4 places', '90.00', NULL, NULL, '123.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-02-05 19:35:03', '2021-02-05 19:35:03'),
(344, 0, '2021-03-09', NULL, '2021-03-11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 'Spa Baltik 4 places', '90.00', 2, '20.00', '143.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-02-05 19:35:33', '2021-02-05 19:35:33'),
(345, 0, '2021-03-10', NULL, '2021-03-11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 'Spa Carbone 6 places', '160.00', NULL, NULL, '165.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-02-05 19:39:37', '2021-02-05 19:39:37'),
(346, 0, '2021-03-10', NULL, '2021-03-11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 'Spa Carbone 6 places', '160.00', NULL, NULL, '168.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-02-05 19:43:51', '2021-02-05 19:43:51'),
(347, 0, '2021-02-08', NULL, '2021-02-09', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Spa Sahara 4 places', '90.00', NULL, NULL, '90.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-02-06 11:03:55', '2021-02-06 11:03:55'),
(348, 0, '2021-03-10', NULL, '2021-03-12', NULL, 'Entre 8h et 12h', 'Intérieur', '19 chemin de la porte verte', NULL, '77144 - MONTEVRAIN', NULL, '77', 'Maison', NULL, 2, 'Spa Navy 4 places', '90.00', NULL, NULL, '120.00', NULL, NULL, '0.00', NULL, NULL, 0, 'pi_1IHrLyGOBvkHIeeTwFMaXDfA', 0, 32, 'alessandra.caillaud@yahoo.com', NULL, NULL, '2021-02-06 14:01:18', '2021-02-06 14:01:39'),
(349, 0, '2021-02-19', NULL, '2021-03-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Spa Sahara 4 places', '90.00', NULL, NULL, '420.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-02-06 19:46:29', '2021-02-06 19:46:29'),
(350, 0, '2021-02-25', NULL, '2021-02-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 'Spa Carbone 6 places', '150.00', NULL, NULL, '190.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-02-06 20:06:33', '2021-02-06 20:06:33'),
(351, 0, '2021-02-09', NULL, '2021-02-10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Spa Sahara 4 places', '90.00', NULL, NULL, '90.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-02-07 14:00:28', '2021-02-07 14:00:28'),
(352, 0, '2021-02-10', NULL, '2021-02-11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 places', '90.00', NULL, NULL, '90.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-02-08 12:02:39', '2021-02-08 12:02:39'),
(353, 0, '2021-02-20', NULL, '2021-02-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Spa Sahara 4 places', '90.00', NULL, NULL, '90.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-02-08 19:05:16', '2021-02-08 19:05:16'),
(354, 0, '2021-02-20', NULL, '2021-02-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 'Spa Baltik 4 places', '90.00', NULL, NULL, '90.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-02-08 20:54:18', '2021-02-08 20:54:18'),
(355, 0, '2021-03-04', NULL, '2021-03-05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 'Spa Baltik 4 places', '90.00', 1, '20.00', '110.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-02-08 21:01:40', '2021-02-08 21:01:40'),
(356, 0, '2021-02-19', NULL, '2021-02-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Spa Sahara 4 places', '90.00', NULL, NULL, '95.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-02-09 19:44:23', '2021-02-09 19:44:23'),
(357, 0, '2021-03-01', NULL, '2021-03-05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Spa Sahara 4 places', '90.00', NULL, NULL, '180.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-02-09 23:06:38', '2021-02-09 23:06:38'),
(358, 1, '2021-02-26', NULL, '2021-03-01', NULL, '12h', 'Intérieur', '59 avenue Francois Mittérand', '77144', 'Montévrain', '4e étage', '77', 'Appartement', NULL, 2, 'Spa Navy 4 places', '150.00', NULL, NULL, '150.00', NULL, NULL, '0.00', NULL, NULL, 1, NULL, 0, 33, 'adeline.barthe20@gmail.com', NULL, NULL, NULL, NULL),
(359, 1, '2021-02-13', NULL, '2021-02-14', NULL, '9h30', 'Intérieur', '2 impasse du grand clos', '77', 'Villeneuve Saint-Denis', NULL, '77', 'Maison', NULL, NULL, NULL, '120.00', NULL, NULL, '120.00', NULL, NULL, '0.00', NULL, NULL, 1, NULL, 0, 34, 'madi_cool@hotmail.fr', NULL, NULL, NULL, NULL),
(360, 1, '2021-02-13', NULL, '2021-02-14', NULL, '13h30', 'Intérieur', '25 rue des scandinaves', '77', 'Serris', NULL, '77', 'Appartement résidence', NULL, NULL, NULL, '90.00', 2, NULL, '120.00', NULL, NULL, '0.00', NULL, NULL, 1, NULL, 0, 35, 'msylvie77@gmail.com', NULL, NULL, NULL, NULL),
(361, 1, '2021-02-20', NULL, '2021-02-21', NULL, NULL, 'Intérieur', '40 rue de la brosse', '77', 'Coutevroult', NULL, NULL, 'Maison', NULL, NULL, NULL, '90.00', NULL, NULL, '90.00', NULL, NULL, '0.00', NULL, NULL, 1, NULL, 0, 36, 'xaviercouttelle@gmail.com', NULL, NULL, NULL, NULL),
(362, 1, '2021-02-16', NULL, '2021-02-17', NULL, NULL, NULL, '31 rue jean Mermoz', '77', 'Claye-Souilly', NULL, '77', 'Maison', NULL, 3, 'Spa Baltik 4 places', '90.00', 2, '30.00', '120.00', NULL, NULL, '0.00', NULL, NULL, 1, NULL, 0, 38, 'benjamin.beaupre@laposte.net', NULL, NULL, NULL, NULL),
(363, 1, '2021-02-23', NULL, '2021-02-24', NULL, '12h', NULL, '5 chemin de la bergerie', '77515', 'Hautefeuille', NULL, '77', 'Maison', NULL, 2, 'Spa Navy 4 places', '90.00', NULL, NULL, '90.00', NULL, NULL, '0.00', NULL, NULL, 1, NULL, 0, 39, 'valerie.gowry@outlook.com', NULL, NULL, NULL, NULL),
(364, 0, '2021-02-20', NULL, '2021-02-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Spa Sahara 4 places', '90.00', NULL, NULL, '90.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-02-10 19:51:50', '2021-02-10 19:51:50'),
(365, 0, '2021-03-12', NULL, '2021-03-13', NULL, 'Entre 8h et 12h', 'Intérieur', '19 CHEMIN DE LA PORTE VERTE, 19', NULL, 'MONTEVRAIN', NULL, '77', 'Maison', NULL, 5, 'Spa Carbone 6 places', '150.00', 1, '20.00', '173.00', NULL, NULL, '0.00', NULL, NULL, 0, 'pi_1IJQOeGOBvkHIeeTCB7pfIIt', 0, 4, 'cnl.sophie@gmail.com', NULL, NULL, '2021-02-10 21:37:58', '2021-02-10 21:38:53'),
(366, 0, '2021-03-26', NULL, '2021-03-28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 pers.', '90.00', NULL, NULL, '120.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-03-12 16:37:19', '2021-03-12 16:37:19'),
(367, 0, '2021-03-17', NULL, '2021-03-19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 'Spa Baltik 4 pers.', '90.00', 1, '20.00', '140.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-03-12 16:41:11', '2021-03-12 16:41:11'),
(368, 0, '2021-03-26', NULL, '2021-03-28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 'Spa Carbone 6 pers.', '150.00', NULL, NULL, '190.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-03-12 16:43:19', '2021-03-12 16:43:19'),
(369, 0, '2021-03-14', NULL, '2021-03-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Spa Navy 4 pers.', '90.00', NULL, NULL, '90.00', NULL, NULL, '0.00', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-03-12 16:47:41', '2021-03-12 16:47:41');

-- --------------------------------------------------------

--
-- Table structure for table `reservations_accessoires`
--

CREATE TABLE `reservations_accessoires` (
  `ra_id` int(11) NOT NULL,
  `ra_reservation_id` int(11) NOT NULL,
  `ra_accessoire_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reservations_accessoires`
--

INSERT INTO `reservations_accessoires` (`ra_id`, `ra_reservation_id`, `ra_accessoire_id`, `created_at`, `updated_at`) VALUES
(24, 48, 4, '2020-11-04 17:29:36', '2020-11-04 17:29:36'),
(50, 116, 3, '2020-12-18 09:10:04', '2020-12-18 09:10:04'),
(51, 117, 3, '2020-12-18 12:43:31', '2020-12-18 12:43:31'),
(52, 123, 5, '2021-01-01 17:45:52', '2021-01-01 17:45:52'),
(53, 125, 5, '2021-01-02 14:39:15', '2021-01-02 14:39:15'),
(54, 125, 4, '2021-01-02 14:39:15', '2021-01-02 14:39:15'),
(55, 127, 3, '2021-01-03 10:39:39', '2021-01-03 10:39:39'),
(56, 131, 5, '2021-01-03 14:46:08', '2021-01-03 14:46:08'),
(57, 131, 1, '2021-01-03 14:46:08', '2021-01-03 14:46:08'),
(58, 131, 7, '2021-01-03 14:46:08', '2021-01-03 14:46:08'),
(59, 131, 6, '2021-01-03 14:46:08', '2021-01-03 14:46:08'),
(60, 131, 2, '2021-01-03 14:46:08', '2021-01-03 14:46:08'),
(61, 132, 5, '2021-01-03 20:11:08', '2021-01-03 20:11:08'),
(62, 132, 7, '2021-01-03 20:11:08', '2021-01-03 20:11:08'),
(63, 133, 4, '2021-01-05 23:02:03', '2021-01-05 23:02:03'),
(64, 138, 7, '2021-01-16 15:26:54', '2021-01-16 15:26:54'),
(65, 139, 5, '2021-01-16 17:42:14', '2021-01-16 17:42:14'),
(66, 140, 5, '2021-01-16 17:56:00', '2021-01-16 17:56:00'),
(67, 140, 7, '2021-01-16 17:56:00', '2021-01-16 17:56:00'),
(68, 142, 5, '2021-01-16 18:00:30', '2021-01-16 18:00:30'),
(69, 156, 8, '2021-01-16 21:41:23', '2021-01-16 21:41:23'),
(70, 167, 8, '2021-01-16 23:20:32', '2021-01-16 23:20:32'),
(71, 172, 5, '2021-01-17 08:12:26', '2021-01-17 08:12:26'),
(72, 173, 8, '2021-01-17 08:19:49', '2021-01-17 08:19:49'),
(73, 175, 5, '2021-01-17 08:22:24', '2021-01-17 08:22:24'),
(74, 175, 7, '2021-01-17 08:22:24', '2021-01-17 08:22:24'),
(75, 180, 3, '2021-01-17 08:58:00', '2021-01-17 08:58:00'),
(76, 181, 5, '2021-01-17 09:21:41', '2021-01-17 09:21:41'),
(77, 186, 8, '2021-01-17 11:37:30', '2021-01-17 11:37:30'),
(78, 187, 5, '2021-01-17 11:40:31', '2021-01-17 11:40:31'),
(79, 188, 5, '2021-01-17 11:41:13', '2021-01-17 11:41:13'),
(80, 193, 4, '2021-01-17 13:36:05', '2021-01-17 13:36:05'),
(81, 194, 7, '2021-01-17 14:57:42', '2021-01-17 14:57:42'),
(82, 199, 1, '2021-01-17 17:06:46', '2021-01-17 17:06:46'),
(83, 200, 2, '2021-01-17 17:18:08', '2021-01-17 17:18:08'),
(84, 209, 7, '2021-01-17 18:03:42', '2021-01-17 18:03:42'),
(85, 209, 2, '2021-01-17 18:03:42', '2021-01-17 18:03:42'),
(86, 211, 5, '2021-01-17 18:09:22', '2021-01-17 18:09:22'),
(87, 212, 5, '2021-01-17 18:09:45', '2021-01-17 18:09:45'),
(88, 218, 5, '2021-01-17 18:20:34', '2021-01-17 18:20:34'),
(89, 219, 7, '2021-01-17 19:18:58', '2021-01-17 19:18:58'),
(90, 228, 7, '2021-01-17 20:09:16', '2021-01-17 20:09:16'),
(91, 238, 7, '2021-01-18 07:56:50', '2021-01-18 07:56:50'),
(92, 241, 6, '2021-01-18 09:54:20', '2021-01-18 09:54:20'),
(93, 242, 7, '2021-01-18 10:55:58', '2021-01-18 10:55:58'),
(94, 248, 7, '2021-01-18 17:38:01', '2021-01-18 17:38:01'),
(95, 254, 8, '2021-01-18 22:53:23', '2021-01-18 22:53:23'),
(96, 257, 7, '2021-01-19 09:21:23', '2021-01-19 09:21:23'),
(97, 269, 5, '2021-01-20 03:34:58', '2021-01-20 03:34:58'),
(98, 282, 3, '2021-01-22 11:17:45', '2021-01-22 11:17:45'),
(99, 282, 7, '2021-01-22 11:17:46', '2021-01-22 11:17:46'),
(100, 282, 2, '2021-01-22 11:17:46', '2021-01-22 11:17:46'),
(101, 284, 5, '2021-01-22 18:26:55', '2021-01-22 18:26:55'),
(102, 288, 7, '2021-01-23 11:00:21', '2021-01-23 11:00:21'),
(103, 287, 7, '2021-01-23 11:00:21', '2021-01-23 11:00:21'),
(104, 289, 7, '2021-01-23 11:00:21', '2021-01-23 11:00:21'),
(105, 293, 5, '2021-01-23 18:27:21', '2021-01-23 18:27:21'),
(106, 293, 6, '2021-01-23 18:27:21', '2021-01-23 18:27:21'),
(107, 303, 7, '2021-01-27 16:36:52', '2021-01-27 16:36:52'),
(108, 304, 5, '2021-01-27 17:13:05', '2021-01-27 17:13:05'),
(109, 311, 2, '2021-01-30 14:19:45', '2021-01-30 14:19:45'),
(110, 312, 5, '2021-01-30 19:44:19', '2021-01-30 19:44:19'),
(111, 314, 3, '2021-02-01 06:32:19', '2021-02-01 06:32:19'),
(112, 314, 6, '2021-02-01 06:32:19', '2021-02-01 06:32:19'),
(113, 315, 7, '2021-02-01 15:28:37', '2021-02-01 15:28:37'),
(114, 315, 8, '2021-02-01 15:28:37', '2021-02-01 15:28:37'),
(115, 322, 5, '2021-02-02 17:55:52', '2021-02-02 17:55:52'),
(116, 326, 2, '2021-02-02 20:53:23', '2021-02-02 20:53:23'),
(117, 327, 8, '2021-02-02 22:12:06', '2021-02-02 22:12:06'),
(118, 328, 7, '2021-02-02 22:53:32', '2021-02-02 22:53:32'),
(119, 332, 2, '2021-02-03 11:32:01', '2021-02-03 11:32:01'),
(120, 333, 7, '2021-02-03 14:40:51', '2021-02-03 14:40:51'),
(121, 336, 2, '2021-02-03 15:47:58', '2021-02-03 15:47:58'),
(122, 338, 5, '2021-02-03 20:15:12', '2021-02-03 20:15:12'),
(123, 340, 6, '2021-02-04 20:45:15', '2021-02-04 20:45:15'),
(124, 343, 5, '2021-02-05 19:35:03', '2021-02-05 19:35:03'),
(125, 344, 5, '2021-02-05 19:35:33', '2021-02-05 19:35:33'),
(126, 345, 5, '2021-02-05 19:39:37', '2021-02-05 19:39:37'),
(127, 345, 7, '2021-02-05 19:39:37', '2021-02-05 19:39:37'),
(128, 346, 5, '2021-02-05 19:43:51', '2021-02-05 19:43:51'),
(129, 346, 6, '2021-02-05 19:43:51', '2021-02-05 19:43:51'),
(130, 356, 6, '2021-02-09 19:44:23', '2021-02-09 19:44:23'),
(131, 365, 4, '2021-02-10 21:37:58', '2021-02-10 21:37:58');

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
  `spa_color` varchar(10) NOT NULL,
  `spa_chemin_img` varchar(100) DEFAULT NULL,
  `spa_prix` decimal(10,2) NOT NULL DEFAULT '0.00',
  `spa_prix_jour_supp` decimal(10,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `spas`
--

INSERT INTO `spas` (`spa_id`, `spa_stock`, `spa_libelle`, `spa_nb_place`, `spa_desc`, `spa_color`, `spa_chemin_img`, `spa_prix`, `spa_prix_jour_supp`, `created_at`, `updated_at`) VALUES
(1, 2, 'Spa Sahara', 4, 'Couleur beige sable<br>120 diffuseurs de bulles', 'FFB300', 'medias/img/spas/spa-sahara-4.png', '90.00', '30.00', '2020-10-20 14:07:33', '2021-01-21 14:27:07'),
(2, 2, 'Spa Navy', 4, 'Couleur bleu nuit<br>140 diffuseurs de bulles', '29B6F6', 'medias/img/spas/spa-navy-4.png', '90.00', '30.00', '2020-10-20 14:07:33', '2021-01-21 14:27:23'),
(3, 1, 'Spa Baltik', 4, 'Couleur gris boisé<br>140 diffuseurs de bulles', '039BE5', 'medias/img/spas/spa-baltik-4.png', '90.00', '30.00', '2020-10-20 14:07:33', '2021-01-21 14:26:47'),
(4, 0, 'Spa Baltik', 6, 'Octogonal et gris boisé<br>170 diffuseurs de bulles', '546e7a', 'medias/img/spas/spa-baltik-6.png', '120.00', '30.00', '2020-10-20 14:07:33', '2021-01-21 14:26:42'),
(5, 1, 'Spa Carbone', 6, 'Octogonal noir et blanc<br>140 diffuseurs et 6 jets massants', '263238', 'medias/img/spas/spa-carbone-6.png', '150.00', '40.00', '2020-10-20 14:07:33', '2020-10-30 22:54:10');

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
(1, 'jer.lemont@gmail.com', '8feddb3014a070097df081ed63f1ca7c2cae3499', 1, NULL, NULL, '2020-09-19 22:00:00', NULL),
(2, 'jlemontCustomer', '8feddb3014a070097df081ed63f1ca7c2cae3499', 2, NULL, NULL, '2020-09-20 22:00:00', NULL),
(3, 'Alexandre', 'a64df9f267517d5caddc282637e244bd0688dc3a', 1, NULL, NULL, NULL, NULL),
(4, 'cnl.alexandre@gmail.com', 'afb847c7a95b2f235f302e856e9181e52b50fdeb', 2, NULL, NULL, '2020-10-30 19:46:00', '2020-10-30 19:46:00'),
(5, 'test@test.fr', '8587f16632db25b07f69606d364e11af6ae75828', 2, NULL, NULL, '2020-10-30 23:30:16', '2020-10-30 23:30:16'),
(6, 'alessandra.caillaud@yahoo.com', 'a64df9f267517d5caddc282637e244bd0688dc3a', 1, NULL, '2e3b73d331fb10a437f96e0b6cee5140', '2020-10-31 11:50:01', '2021-02-10 13:42:25'),
(7, 'Greg', 'a64df9f267517d5caddc282637e244bd0688dc3a', 1, NULL, NULL, NULL, '2020-11-20 00:11:02'),
(8, 'cnl.sophie@gmail.com', 'e6bb1e4796d27e3ec853ff3adf5b357713a6bf3f', 2, NULL, NULL, '2020-11-04 17:29:53', '2020-11-04 17:29:53'),
(9, 'cf.morini@free.fr', 'bcb457135fb4ae9644ff51bcf41ad58cc447fea1', 2, NULL, NULL, '2020-12-18 12:45:21', '2020-12-18 12:45:21'),
(10, 'evaadoc77@gmail.com', 'f4d4282c52b746d0f8f394a5f973394210a62840', 2, NULL, NULL, '2020-12-28 23:01:53', '2020-12-28 23:01:53'),
(11, 'ffrot@hotmail.com', 'b8556707efc09c405658b479dda62082d294c73b', 2, NULL, NULL, '2021-01-16 18:20:48', '2021-01-16 18:20:48'),
(12, 'celine.munoz@gmail.com', 'ca6f3c7665f6dc6dc86986b94fd627f38a7fe1fc', 2, NULL, NULL, '2021-01-16 22:26:24', '2021-01-16 22:26:24'),
(13, 'renaud.vibet@laposte.net', '1498174261b3941355e1c0d6fe965d11299c5536', 2, NULL, NULL, '2021-01-17 08:14:24', '2021-01-17 08:14:24'),
(14, 'sbordet@orange.fr', '3e661d8b3af2560345f9306751be6e08bf91aa6d', 2, NULL, NULL, '2021-01-18 11:57:01', '2021-01-18 11:57:01'),
(15, 'marineluu2201@yahoo.fr', 'e01da5a03dd9cdcfec8d7e594e41d22c73d96d1d', 2, NULL, NULL, '2021-01-18 19:39:36', '2021-01-18 19:39:36'),
(16, 'guycho974@gmail.com', '7158d8105e2250645c09233e5255a9a9e827ed84', 2, NULL, NULL, '2021-01-19 15:44:17', '2021-01-19 15:44:17'),
(17, 'stephaniechascomoreira@gmail.com', 'b4574526faeec7edab13575bba99d15b6eb6ec74', 2, NULL, NULL, '2021-01-20 12:14:27', '2021-01-20 12:14:27'),
(18, 'claudie.87@hotmail.com', '1d203cf208cb3abae08d6cacde5eb3cab4014ba2', 2, NULL, NULL, '2021-01-23 09:00:40', '2021-01-23 09:00:40'),
(19, 'stephanie.tesooukian@gmail.com', '1dc23c3b35997c9498c7904369e022770a289476', 2, NULL, NULL, '2021-01-23 11:12:44', '2021-01-23 11:12:44'),
(20, 'ludivinepierre@live.fr', '27b6f7d5d2a520ce152aa1d6fdc9506ef9607564', 2, NULL, NULL, '2021-01-24 08:13:26', '2021-01-24 08:13:26'),
(21, 'gouleret.christelle@gmail.com', '6436e15b101a6bc3c23a3919ac9a1c5db9642340', 2, NULL, NULL, '2021-01-29 09:30:05', '2021-01-29 09:30:05'),
(22, 'jennifer.douraguia@gmail.com', '8c19b3cae9909f6073c78e029157ffa948fcce76', 2, NULL, NULL, '2021-02-01 19:51:47', '2021-02-01 19:51:47'),
(23, 'Nicow1816@gmail.com', '5ac0383764d9758c5040bea4864e9aee169a8d67', 2, NULL, NULL, '2021-02-03 14:41:20', '2021-02-03 14:41:20'),
(24, 'marisabrandi235@gmail.com', '5b0e658e3d763b389ae410fc74559ad0e35e23f3', 2, NULL, NULL, '2021-02-03 15:20:15', '2021-02-03 15:20:15'),
(26, 'adeline.barthe20@gmail.com', '5b0e658e3d763b389ae410fc74559ad0e35e23f3', 2, NULL, NULL, '2021-02-03 15:20:15', '2021-02-03 15:20:15'),
(27, 'madi_cool77@hotmail.fr', '5b0e658e3d763b389ae410fc74559ad0e35e23f3', 2, NULL, NULL, '2021-02-03 15:20:15', '2021-02-03 15:20:15'),
(28, 'msylvie77@gmail.com', '5b0e658e3d763b389ae410fc74559ad0e35e23f3', 2, NULL, NULL, '2021-02-10 15:20:15', '2021-02-10 15:20:15'),
(29, 'xaviercouttelle@gmail.com', '5b0e658e3d763b389ae410fc74559ad0e35e23f3', 2, NULL, NULL, '2021-02-10 15:20:15', '2021-02-10 15:20:15'),
(30, 'benjamin.beaupre@laposte.net', '5b0e658e3d763b389ae410fc74559ad0e35e23f3', 2, NULL, NULL, '2021-02-10 15:20:15', '2021-02-10 15:20:15'),
(31, 'valerie.gowry@outlook.com', '5b0e658e3d763b389ae410fc74559ad0e35e23f3', 2, NULL, NULL, '2021-02-10 15:20:15', '2021-02-10 15:20:15'),
(32, 'cejzinczi@fzjno.fr', 'adb3d664e0c6e6cb56746243d5c741f7792e5ea0', 2, NULL, NULL, '2021-02-11 13:43:25', '2021-02-11 13:43:25'),
(33, 'cziezbci@vzodzo.fr', '0a6218928cb559896ad2b24dd6001f06cc8c609d', 2, NULL, NULL, '2021-02-11 13:49:55', '2021-02-11 13:49:55'),
(34, 'céeijn.cezo@vez.fr', 'aebd4949b8e10daa3250239cc0bcf05aa7ad8ac7', 2, NULL, NULL, '2021-02-11 13:53:58', '2021-02-11 13:53:58');

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
-- Indexes for table `adresses`
--
ALTER TABLE `adresses`
  ADD PRIMARY KEY (`adresse_id`),
  ADD KEY `adresse_client_id` (`adresse_client_id`);

--
-- Indexes for table `cadeaux`
--
ALTER TABLE `cadeaux`
  ADD PRIMARY KEY (`cadeau_id`),
  ADD KEY `cadeau_client_id` (`cadeau_client_id`),
  ADD KEY `cadeau_client_id_used` (`cadeau_client_id_used`),
  ADD KEY `cadeau_id` (`cadeau_id`);

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
-- Indexes for table `parametres`
--
ALTER TABLE `parametres`
  ADD PRIMARY KEY (`parametre_id`);

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
  ADD KEY `reservation_spa_id` (`reservation_spa_id`),
  ADD KEY `reservation_client_id` (`reservation_client_id`),
  ADD KEY `reservation_cadeau_id` (`reservation_cadeau_id`);

--
-- Indexes for table `reservations_accessoires`
--
ALTER TABLE `reservations_accessoires`
  ADD PRIMARY KEY (`ra_id`),
  ADD KEY `ra_accessoire_id` (`ra_accessoire_id`),
  ADD KEY `ra_reservation_id` (`ra_reservation_id`,`ra_accessoire_id`);

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
  MODIFY `administrateur_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `adresses`
--
ALTER TABLE `adresses`
  MODIFY `adresse_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `cadeaux`
--
ALTER TABLE `cadeaux`
  MODIFY `cadeau_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `indisponibilites`
--
ALTER TABLE `indisponibilites`
  MODIFY `indisponibilite_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `packs`
--
ALTER TABLE `packs`
  MODIFY `pack_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `parametres`
--
ALTER TABLE `parametres`
  MODIFY `parametre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `promos`
--
ALTER TABLE `promos`
  MODIFY `promo_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ranks`
--
ALTER TABLE `ranks`
  MODIFY `rank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=370;

--
-- AUTO_INCREMENT for table `reservations_accessoires`
--
ALTER TABLE `reservations_accessoires`
  MODIFY `ra_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `spas`
--
ALTER TABLE `spas`
  MODIFY `spa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `administrateurs`
--
ALTER TABLE `administrateurs`
  ADD CONSTRAINT `administrateurs_ibfk_1` FOREIGN KEY (`administrateur_user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `adresses`
--
ALTER TABLE `adresses`
  ADD CONSTRAINT `adresses_ibfk_1` FOREIGN KEY (`adresse_client_id`) REFERENCES `clients` (`client_id`);

--
-- Constraints for table `cadeaux`
--
ALTER TABLE `cadeaux`
  ADD CONSTRAINT `cadeaux_ibfk_1` FOREIGN KEY (`cadeau_client_id`) REFERENCES `clients` (`client_id`),
  ADD CONSTRAINT `cadeaux_ibfk_2` FOREIGN KEY (`cadeau_client_id_used`) REFERENCES `clients` (`client_id`);

--
-- Constraints for table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_ibfk_1` FOREIGN KEY (`client_user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_3` FOREIGN KEY (`reservation_pack_id`) REFERENCES `packs` (`pack_id`),
  ADD CONSTRAINT `reservations_ibfk_4` FOREIGN KEY (`reservation_spa_id`) REFERENCES `spas` (`spa_id`),
  ADD CONSTRAINT `reservations_ibfk_5` FOREIGN KEY (`reservation_client_id`) REFERENCES `clients` (`client_id`),
  ADD CONSTRAINT `reservations_ibfk_6` FOREIGN KEY (`reservation_cadeau_id`) REFERENCES `cadeaux` (`cadeau_id`);

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
