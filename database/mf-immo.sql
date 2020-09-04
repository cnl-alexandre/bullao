-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 07, 2020 at 10:41 PM
-- Server version: 5.7.26
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `mf-immo`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrateurs`
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
-- Dumping data for table `administrateurs`
--

INSERT INTO `administrateurs` (`administrateur_id`, `administrateur_nom`, `administrateur_prenom`, `administrateur_email`, `administrateur_tel`, `administrateur_user_id`, `created_at`, `updated_at`) VALUES
(1, 'Lémont', 'Jérémy', 'jerem-lem@hotmail.fr', '0631727083', 1, NULL, NULL),
(3, 'Conil', 'Alexandre', 'cnl.alexandre@gmail.com', '0631727083', 7, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contrats`
--

CREATE TABLE `contrats` (
  `contrat_id` int(11) NOT NULL,
  `contrat_libelle` varchar(100) NOT NULL,
  `contrat_libelle_marketing` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contrats`
--

INSERT INTO `contrats` (`contrat_id`, `contrat_libelle`, `contrat_libelle_marketing`, `created_at`, `updated_at`) VALUES
(1, 'Vente', 'Acheter', NULL, NULL),
(2, 'Location', 'Louer', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `logements`
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
  `logement_parking` varchar(250) DEFAULT NULL,
  `logement_compromis_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logements`
--

INSERT INTO `logements` (`logement_id`, `logement_type_id`, `logement_contrat_id`, `logement_exclu`, `logement_adresse`, `logement_ville`, `logement_cp`, `logement_prix`, `logement_superficie`, `logement_nbpiece`, `logement_nbchambre`, `logement_vendu`, `logement_vendu_date`, `logement_etat`, `logement_description`, `logement_nbsdb`, `logement_cuisine`, `logement_terrasse`, `logement_extension`, `logement_exterieur`, `logement_garage`, `logement_etage`, `logement_ascenseur`, `logement_copropriete`, `logement_nblots`, `logement_charges`, `logement_dpe_lettre`, `logement_honoraire`, `logement_ss_sol`, `logement_terrain`, `logement_surface_sejour`, `logement_sdo`, `logement_toilettes`, `logement_chauffage`, `logement_orientation`, `logement_position`, `logement_ratio`, `logement_parking`, `logement_compromis_date`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 0, 'rue', 'Thorigny-sur-Marne', '77400', '0', 116, 6, 4, 0, NULL, 1, 'À 15 minutes à pieds de la gare SNCF Lagny/Thorigny, maison traditionnelle indépendante des années 90, de 125m2 UTILES sur terrain clos de 500m2. De plain pied, beau séjour de 34m2 avec cheminée, accès terrasse SUD, une cuisine aménagée ouverte, deux chambres dont une avec placard, une salle de bains et wc. Abris de jardin et stationnement dans le terrain. \r\nFenêtres double vitrage, bon état général. Honoraires à la charge du vendeur.', 2, 'Standard', NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, '0', NULL, NULL, '507', 34, 0, 0, NULL, NULL, NULL, '0', NULL, NULL, '2020-07-07 14:46:06', '2020-07-07 18:27:08'),
(2, 2, 1, 0, 'rue', 'Vaires-sur-Marne', '77360', '0', 83, 4, 3, 0, NULL, 0, 'En centre ville avec gare SCNF (PARIS EST 18 mns), \r\ncommerces et écoles, dans résidence de standing BBC de 2014, très bel appartement F4 de 83 m² avec terrasse et jardin 60 m². Grande entrée avec placard, séjour 22 m² accès terrasse SUD, cuisine entièrement équipée, dégagement, 3 chambres (dont une avec placard) accès jardin, dressing, salle d\'eau et wc. 2 places de parking en sous-sol. Chauffage individuel gaz. Très bon état général, RARE. Honoraires à la charge du vendeur.', 1, 'Standard', NULL, NULL, NULL, NULL, 0, 0, '1', 15, '1692', '0', NULL, NULL, NULL, 0, 0, 1, NULL, NULL, 0, '0', NULL, NULL, '2020-07-07 14:54:41', '2020-07-07 15:11:30'),
(6, 2, 1, 0, 'rue', 'Vaires-sur-Marne', '77360', '0', 40, 2, 1, 0, NULL, 0, 'En centre ville à 200 m de la gare SNCF (PARIS EST 18 MNS) et commerces, dans petite copropriété, F2 de 40 m²  en rez-de-chaussée, comprenant un séjour SUD,  coin cuisine, une chambre, une salle d\'eau, wc. 2 caves. Idéal 1er achat ou investissement locatif. Copropriété comportant 11 lots principaux, quote part charges annuelles 1080 €. Honoraires à la charge du vendeur.', 1, 'Standard', NULL, '2 Caves', NULL, NULL, 0, 0, '1', 11, '1080', '322', NULL, NULL, NULL, 0, 0, 1, NULL, NULL, 0, '0', NULL, NULL, '2020-07-07 15:04:17', '2020-07-07 15:11:32'),
(8, 1, 1, 0, 'rue', 'Thorigny-sur-Marne', '77400', '668000', 160, 7, 4, 0, NULL, 0, 'Dans un environnement privilégié, à 8 minutes à pieds de la gare et à proximité immédiate des écoles, très belle propriété de plain-pied, indépendante, 7 pièces de 160m² habitables sur terrain clos sans vis-à-vis de 1350 m². 320 m² UTILES! \r\n\r\nUn hall d\'entrée, un séjour 33m² exposé SUD, un salon avec une vaste cuisine américaine aménagée de 35m² donnant sur une terrasse SUD de 44 m², un dégagement, 4 belles chambres dont 2 avec placard, une salle de bains + douche, un dressing et wc. Sous-sol total avec entrée indépendante composé d\'un garage 2 voitures, d\'une chaufferie-buanderie, une salle de bains avec wc, un cellier, un dégagement et 3 belles pièces. Nombreux travaux récents: fenêtres PVC double vitrage, volets roulants électriques, chaudière gaz, isolation et électricité. Alarme, visiophone. Idéal 2 familles. Nombreux stationnements. Au calme et lumineux. Honoraires à la charge du vendeur.', 2, 'Standard', NULL, NULL, NULL, 'Double', 2, NULL, NULL, NULL, NULL, '226', NULL, 'Total', '', 33, 0, 0, NULL, NULL, NULL, '0', NULL, NULL, '2020-07-07 14:46:06', '2020-07-07 15:11:29'),
(11, 2, 1, 0, 'rue', 'Vaires-sur-Marne', '77360', '225000', 93, 5, 3, 0, NULL, 0, 'Dans petite copropriété, bel F5 de 93 m² au 2ème et dernier étage, situé en cœur de ville avec gare SNCF (PARIS EST 18 mns), commerces et écoles. Une entrée avec placard, un séjour parqueté traversant de 28m² avec cheminée, une cuisine indépendante, 3 belles chambres dont 2 avec placard, grande salle de bains, wc séparés. Une cave. Fenêtres PVC double vitrage. Chauffage et eau inclus dans les charges. Du cachet, lumineux et idéalement situé. Possibilité d\'une place de parking en sous-sol. Copropriété de 8 lots principaux. Quote part de charges annuelles 3200 euros. Honoraires à la charge du vendeur.', 1, 'Standard', NULL, 'Cave', NULL, NULL, 0, 0, '1', 8, '3200', '177', NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, 2, '0', NULL, NULL, '2020-07-07 15:26:47', '2020-07-07 15:31:57'),
(12, 2, 1, 1, 'rue', 'Brou-sur-Chantereine', '77700', '0', 73, 4, 3, 0, NULL, 0, 'Résidence Chanteclair, avec écoles dans la résidence et bus pour accès gare SNCF de Vaires, F4 traversant expo EST/OUEST de 73 m² au 2ème étage comprenant une entrée avec placard, un séjour avec vue sur jardin, une cuisine aménagée donnant sur une loggia, dégagement, salle de bains, wc séparés, 3 chambres dont une de 14m². Fenêtres PVC double vitrage (changées en 2008), ballon électrique récent. Une cave et une place de parking. Chauffage et eau froide inclus dans les charges. Au calme et sans vis-à-vis, à rafraîchir. Quote part annuelle des charges 2300 euros. Honoraires à la charge du vendeur.', 1, 'Standard', NULL, 'Cave', NULL, NULL, 6, 0, '1', 481, '2300', '248', NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 2, '0', '2', NULL, '2020-07-07 15:34:46', '2020-07-07 17:59:37'),
(13, 2, 2, 0, 'rue', 'Vaujours', '93410', '1250', 82, 5, 3, 0, NULL, 1, 'En centre ville avec commerces et écoles, appartement F5 en duplex en denier étage de 82 m² avec balcon SUD, parking et cave. Entrée avec placard, wc, cuisine indépendante, séjour double accès balcon. A l\'étage, 3 chambres dont une avec placard, une salle de bains, wc. Fenêtres double vitrage, chauffage individuel électrique. Lumineux. Bus pour gare RER. Libre. Loyer 1250 euros charges comprises (dont 150 euros de charges incluses, provision mensuelle avec régularisation annuelle), dépôt de garantie 1100 euros, honoraires agence charge locataire 1066 euros.', 1, 'Standard', NULL, 'Cave', NULL, NULL, 0, 0, '1', 0, '1800', '282', '0', NULL, NULL, 0, 0, 1, NULL, NULL, 3, '0', NULL, NULL, '2020-07-07 16:31:07', '2020-07-07 16:31:07'),
(19, 2, 2, 0, 'rue', 'Serris', '77700', '807', 42, 2, 1, 0, NULL, 1, 'Idéalement situé, secteur Mairie, à proximité du Val d\'Europe et de DISNEYLAND PARIS, bel F2 de 42 m² au 2ème étage comprenant un séjour avec une cuisine ouverte aménagée et équipée, une chambre avec placard, une salle de bains, wc. Un parking sous-sol et une cave.\r\n\r\nChauffage individuel électrique. Loyer 807 euros charges comprises ( dont 77 € de charges, provision mensuelle avec régularisation annuelle). Dépôt de garantie 730 euros, honoraires d\'agence charge locataire  462 euros (dont 126 € de frais d\'état des lieux). Libre le 10 juin.', 1, 'Standard', NULL, 'Cave', NULL, NULL, 3, 1, '1', 0, '77', '189', '462', NULL, NULL, 0, 0, 1, NULL, NULL, 3, '0', NULL, NULL, '2020-07-07 17:47:31', '2020-07-07 17:47:31'),
(21, 1, 1, 0, 'rue', 'Chantereine', '77700', '470000', 150, 7, 3, 0, NULL, 1, 'Dans quartier pavillonnaire, au calme, avec écoles à proximité, maison traditionnelle de 2004, 200 m² UTILES en très bon état, sur jardin paysagé SUD de 440 m² avec arrosage automatique et un abris de jardin.\r\n\r\n\r\nEn rez-de-chaussée, vous serez séduits par une belle pièce à vivre lumineuse de 60 m² avec une cuisine aménagée de qualité et entièrement équipée, donnant accès sur terrasse et jardin SUD, un bureau, rangement et cabinet de toilettes. A l\'étage, 3 belles chambres (20, 19 et 15 m²), et une grande salle de bains+ douche. Sous-sol total avec une pièce de jeux de 40 m², salle d\'eau et nombreux rangements. Stationnements de plusieurs véhicules. Nombreux travaux récents (isolation du toit, chaudière ventouse, volets électriques). Prestations de qualité, coup de coeur assuré.Honoraires à la charge du vendeur.', 2, 'Standard', NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, '135', NULL, 'Total', '440', 60, 0, 1, NULL, NULL, NULL, '0', NULL, NULL, '2020-07-07 18:04:17', '2020-07-07 18:04:17'),
(25, 1, 1, 1, 'rue', 'Vaires-sur-Marne', '77360', '0', 84, 4, 2, 0, NULL, 1, 'Dans quartier pavillonnaire, à 1500m de la gare SNCF (PARIS EST 18 mns), maison de 84 m² entièrement rénovée et agrandie en 2011, comprenant une cuisine aménagée et équipée, un séjour de 30 m² accès terrasse et jardin, wc et rangement. A l\'étage, grand palier avec rangement, 2 chambres, un bureau et une salle d\'eau avec wc. Abris de jardin. Au calme, LUMINEUX et parfait etat!Honoraires à la charge du vendeur.', 1, 'Standard', NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, '313', NULL, NULL, '200', 30, 0, 1, NULL, NULL, NULL, '0', NULL, NULL, '2020-07-07 17:59:30', '2020-07-07 18:18:48'),
(27, 1, 1, 0, 'rue', 'Chelles', '77500', '0', 112, 6, 4, 0, NULL, 1, 'CHELLES LES COUDREAUX: Maison indépendante de 1999 d\'environ 125 m² UTILES sur parcelle de 500 m² comprenant de plain-pied, un séjour de 36 m² accès terrasse couverte, une cuisine aménagée et équipée américaine, un cellier, wc, rangement et garage. A l\'étage, 4 chambres dont une avec mezzanine (bureau), une salle de bains + douche avec wc, rangement. Abris de jardin, possibilité de stationner 3 voitures. Climatisation réversible, jardin sans vis-à-vis, très bon état général. Honoraires à la charge du vendeur.', 1, 'Standard', NULL, NULL, NULL, 'Simple', 2, NULL, NULL, NULL, NULL, '220', NULL, NULL, '500', 36, 0, 1, NULL, NULL, NULL, '0', NULL, NULL, '2020-07-07 18:16:08', '2020-07-07 18:16:08'),
(30, 1, 1, 0, 'rue', 'Chelles', '77500', '0', 105, 5, 3, 0, NULL, 1, 'A 8 minutes à pieds de la gare RER, maison de 1963, 105 m² habitables sur terrain de 200m² + un studio indépendant de 20 m².\r\n\r\nEn rez-de-jardin, une belle entrée avec placards, une chambre, une buanderie chaufferie gaz.Au rez-de-chaussée surélevé, un palier, une cuisine indépendante aménagée, un séjour traversant EST-OUEST, une salle de bains, wc. A l\'étage, un palier, une salle d\'eau avec wc, 2 chambres, placard, un grand dressing. Fenêtres double vitrage, chaudière récente. Lumineux, jardin sans vis-à-vis bien clos. Proche toutes commodités. Honoraires à la charge du vendeur.', 2, 'Standard', NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, '330', NULL, NULL, '200', 22, 0, 1, NULL, NULL, NULL, '0', NULL, NULL, '2020-07-07 18:41:53', '2020-07-07 18:41:53'),
(32, 2, 1, 0, 'rue', 'Brou-sur-Chantereine', '77177', '0', 61, 3, 2, 0, NULL, 1, 'Dans petite copropriété en centre ville, avec écoles, commerces et bus pour gare de Vaires à proximité, F3 de 61 m² au 3ème et dernier étage avec cave. Une entrée, un séjour, une cuisine indépendante aménagée, une salle d\'eau, 2 chambres, un cabinet de toilettes, un cellier. Chauffage gaz individuel, fenêtres double vitrage. FAIBLES CHARGES, idéal 1er achat ou investisseur. LUMINEUX. BOX EN OPTION EN SUS DU PRIX. Honoraires à la charge du vendeur.', 1, 'Standard', NULL, 'Cave', NULL, NULL, 3, 0, '0', 10, '1500', '330', NULL, NULL, NULL, 16, 0, 1, NULL, NULL, 3, '0', NULL, NULL, '2020-07-07 18:44:53', '2020-07-07 18:44:53');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
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
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `message_name`, `message_phone`, `message_email`, `message_note`, `message_lu`, `created_at`, `updated_at`) VALUES
(17, 'Jérémy Lémont', '0631727083', NULL, 'Ceci est un test !', 1, '2020-06-11 12:08:28', '2020-06-12 13:20:01'),
(18, 'Jérémy Lémont', NULL, 'jerem-lem@hotmail.fr', 'Ceci est un 2ème test !', 1, '2020-06-11 12:09:00', '2020-06-12 13:20:01'),
(19, 'test', '0605040302', NULL, 'test ! éçè', 1, '2020-06-12 13:24:06', '2020-06-12 13:24:33');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
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
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`photo_id`, `photo_chemin`, `photo_logement_id`, `photo_position`, `created_at`, `updated_at`) VALUES
(1, '/medias/img/annonces/1/1-1.jpg', 1, 1, NULL, NULL),
(2, '/medias/img/annonces/1/1-0.jpg', 1, 0, NULL, NULL),
(3, '/medias/img/annonces/1/1-2.jpg', 1, 2, NULL, NULL),
(4, '/medias/img/annonces/1/1-3.jpg', 1, 3, NULL, NULL),
(5, '/medias/img/annonces/1/1-4.jpg', 1, 4, NULL, NULL),
(6, '/medias/img/annonces/1/1-5.jpg', 1, 5, NULL, NULL),
(7, '/medias/img/annonces/1/1-6.jpg', 1, 6, NULL, NULL),
(8, '/medias/img/annonces/1/1-7.jpg', 1, 7, NULL, NULL),
(9, '/medias/img/annonces/1/1-8.jpg', 1, 8, NULL, NULL),
(10, '/medias/img/annonces/2/2-1.jpg', 2, 1, NULL, NULL),
(11, '/medias/img/annonces/2/2-0.jpg', 2, 0, NULL, NULL),
(12, '/medias/img/annonces/2/2-2.jpg', 2, 2, NULL, NULL),
(13, '/medias/img/annonces/6/6-1.jpg', 6, 1, NULL, NULL),
(14, '/medias/img/annonces/6/6-0.jpg', 6, 0, NULL, NULL),
(15, '/medias/img/annonces/6/6-2.jpg', 6, 2, NULL, NULL),
(16, '/medias/img/annonces/8/8-1.jpg', 8, 1, NULL, NULL),
(17, '/medias/img/annonces/8/8-0.jpg', 8, 0, NULL, NULL),
(18, '/medias/img/annonces/8/8-2.jpg', 8, 2, NULL, NULL),
(19, '/medias/img/annonces/11/11-1.jpg', 11, 1, NULL, NULL),
(20, '/medias/img/annonces/11/11-0.jpg', 11, 0, NULL, NULL),
(21, '/medias/img/annonces/11/11-2.jpg', 11, 2, NULL, NULL),
(22, '/medias/img/annonces/12/12-1.jpg', 12, 1, NULL, NULL),
(23, '/medias/img/annonces/12/12-0.jpg', 12, 0, NULL, NULL),
(24, '/medias/img/annonces/12/12-2.jpg', 12, 2, NULL, NULL),
(25, '/medias/img/annonces/21/21-1.jpg', 21, 1, NULL, NULL),
(26, '/medias/img/annonces/21/21-0.jpg', 21, 0, NULL, NULL),
(27, '/medias/img/annonces/25/25-1.jpg', 25, 1, NULL, NULL),
(28, '/medias/img/annonces/25/25-0.jpg', 25, 0, NULL, NULL),
(29, '/medias/img/annonces/25/25-2.jpg', 25, 2, NULL, NULL),
(30, '/medias/img/annonces/27/27-1.jpg', 27, 1, NULL, NULL),
(31, '/medias/img/annonces/27/27-0.jpg', 27, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ranks`
--

CREATE TABLE `ranks` (
  `rank_id` int(11) NOT NULL,
  `rank_libelle` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ranks`
--

INSERT INTO `ranks` (`rank_id`, `rank_libelle`, `created_at`, `updated_at`) VALUES
(1, 'Administrateur', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `type_id` int(11) NOT NULL,
  `type_libelle` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`type_id`, `type_libelle`, `created_at`, `updated_at`) VALUES
(1, 'Maison', NULL, NULL),
(2, 'Appartement', NULL, NULL),
(3, 'Studio', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_login`, `user_password`, `user_rank_id`, `user_last_connection`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'jlemont', '8feddb3014a070097df081ed63f1ca7c2cae3499', 1, NULL, NULL, NULL, NULL),
(7, 'alexandre', 'a64df9f267517d5caddc282637e244bd0688dc3a', 1, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrateurs`
--
ALTER TABLE `administrateurs`
  ADD PRIMARY KEY (`administrateur_id`),
  ADD KEY `administrateur_user_id` (`administrateur_user_id`);

--
-- Indexes for table `contrats`
--
ALTER TABLE `contrats`
  ADD PRIMARY KEY (`contrat_id`);

--
-- Indexes for table `logements`
--
ALTER TABLE `logements`
  ADD PRIMARY KEY (`logement_id`),
  ADD KEY `logement_type_id` (`logement_type_id`),
  ADD KEY `logement_contrat_id` (`logement_contrat_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`photo_id`),
  ADD KEY `photo_logement_id` (`photo_logement_id`);

--
-- Indexes for table `ranks`
--
ALTER TABLE `ranks`
  ADD PRIMARY KEY (`rank_id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`type_id`);

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
-- AUTO_INCREMENT for table `administrateurs`
--
ALTER TABLE `administrateurs`
  MODIFY `administrateur_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contrats`
--
ALTER TABLE `contrats`
  MODIFY `contrat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `logements`
--
ALTER TABLE `logements`
  MODIFY `logement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `photo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `ranks`
--
ALTER TABLE `ranks`
  MODIFY `rank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `administrateurs`
--
ALTER TABLE `administrateurs`
  ADD CONSTRAINT `administrateurs_ibfk_1` FOREIGN KEY (`administrateur_user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `logements`
--
ALTER TABLE `logements`
  ADD CONSTRAINT `logements_ibfk_1` FOREIGN KEY (`logement_type_id`) REFERENCES `types` (`type_id`),
  ADD CONSTRAINT `logements_ibfk_2` FOREIGN KEY (`logement_contrat_id`) REFERENCES `contrats` (`contrat_id`);

--
-- Constraints for table `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `photos_ibfk_1` FOREIGN KEY (`photo_logement_id`) REFERENCES `logements` (`logement_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_rank_id`) REFERENCES `ranks` (`rank_id`);
