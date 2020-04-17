-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 26, 2020 at 04:51 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pidev`
--

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `ref_cmd` varchar(760) NOT NULL,
  `ref_user` int(11) NOT NULL,
  `date_cmd` date NOT NULL,
  `etat_cmd` varchar(1000) NOT NULL,
  `prix_cmd` float NOT NULL,
  PRIMARY KEY (`ref_cmd`),
  KEY `ref_user` (`ref_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_location`
--

DROP TABLE IF EXISTS `detail_location`;
CREATE TABLE IF NOT EXISTS `detail_location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_type` int(11) NOT NULL,
  `id_site` int(11) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_type` (`id_type`),
  KEY `id_site` (`id_site`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `evenements`
--

DROP TABLE IF EXISTS `evenements`;
CREATE TABLE IF NOT EXISTS `evenements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_evenements` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` int(11) NOT NULL,
  `dateeve` date NOT NULL,
  `lieuxeve` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descreptioneve` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `evenements`
--

INSERT INTO `evenements` (`id`, `nom_evenements`, `nombre`, `dateeve`, `lieuxeve`, `descreptioneve`) VALUES
(1, 'tunisia', 26, '2019-05-04', 'aazerty', 'zertrtrttr'),
(2, 'aaa', 2, '2015-01-01', 'dsadasdasasdas', 'asdasdas');

-- --------------------------------------------------------

--
-- Table structure for table `fos_user`
--

DROP TABLE IF EXISTS `fos_user`;
CREATE TABLE IF NOT EXISTS `fos_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_957A647992FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_957A6479A0D96FBF` (`email_canonical`),
  UNIQUE KEY `UNIQ_957A6479C05FB297` (`confirmation_token`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `fos_user`
--

INSERT INTO `fos_user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `confirmation_token`, `password_requested_at`, `roles`) VALUES
(1, 'testuser', 'testuser', 'test@test', 'test@test', 1, NULL, '$2y$13$QqUuQjjzYHVW62783Cv2.eVutAhHLYZPD4Q/4zQphnkPpKxWhN4yO', NULL, NULL, NULL, 'a:0:{}'),
(2, 'fares fares', 'asdasdas', 'f@dsda.com', 'sadasdassa', 1, NULL, 'fifa20', NULL, NULL, NULL, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `livraison`
--

DROP TABLE IF EXISTS `livraison`;
CREATE TABLE IF NOT EXISTS `livraison` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `etat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prix` int(11) NOT NULL,
  `tel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dateCreation` datetime NOT NULL,
  `dateLivraison` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `livraison`
--

INSERT INTO `livraison` (`id`, `titre`, `etat`, `adresse`, `prix`, `tel`, `dateCreation`, `dateLivraison`) VALUES
(6, 'sdasdasdaassas', 'en cours', 'dsaasdasdasdas', 4444, '15412587', '2020-03-25 12:10:49', NULL),
(7, 'sdasdasdaassash', 'en cours', 'dsaasdasdasdas', 4444, '15412587', '2020-03-25 12:11:06', NULL),
(8, 'sas', 'en cours', 'sa', 1, '25478124', '2020-03-25 12:16:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `maintenance`
--

DROP TABLE IF EXISTS `maintenance`;
CREATE TABLE IF NOT EXISTS `maintenance` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `titre` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `etat` int(10) NOT NULL,
  `client` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `maintenance`
--

INSERT INTO `maintenance` (`id`, `titre`, `description`, `date`, `etat`, `client`) VALUES
(1, '', '', '0000-00-00', 0, 0),
(11, 'Velo', 'Volant déréglé', '3920-03-30', 2, 3489990),
(16, 'Siege', 'siege abimé', '1923-09-10', 2, 12333),
(17, 'Siege', 'siege abimé', '1923-09-10', 2, 12333);

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

DROP TABLE IF EXISTS `participants`;
CREATE TABLE IF NOT EXISTS `participants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idEvenements` int(11) DEFAULT NULL,
  `idUser` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_7169709263FECAEA` (`idEvenements`),
  KEY `IDX_71697092FE6E88D7` (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `couleur` varchar(255) NOT NULL,
  `prix` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reclamation`
--

DROP TABLE IF EXISTS `reclamation`;
CREATE TABLE IF NOT EXISTS `reclamation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `typeReclamation` varchar(45) NOT NULL,
  `dateReclamation` date NOT NULL,
  `image` varchar(250) DEFAULT NULL,
  `status` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `objet` varchar(45) NOT NULL,
  `description` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reclamation`
--

INSERT INTO `reclamation` (`id`, `typeReclamation`, `dateReclamation`, `image`, `status`, `email`, `objet`, `description`, `id_user`) VALUES
(2, 'Location', '2020-02-15', 'No picture', 'Traité', 'hamouchka7@gmail.com', '', '2', 0),
(3, 'Commande', '2020-02-15', 'No picture', 'En traitement', '', '', '', 0),
(7, 'Maintenance', '2020-02-12', 'No picture', 'En traitement', 'test@', 'obj', 'Description', 0),
(8, 'Maintenance', '2020-02-13', 'No picture', 'En traitement', '', '', '', 0),
(9, 'Commande', '2020-02-12', 'No picture', 'En traitement', '', '', '', 0),
(11, 'Location', '2020-02-13', 'C:+Users+ASUS+Desktop+pi.jpg', '', '', '', '', 0),
(13, 'Evenement', '2020-02-13', 'No picture', '', '', '', '', 0),
(14, 'Commande', '2020-02-16', 'No picture', 'Traité', '', '', '', 0),
(15, 'Commande', '2020-02-16', 'No picture', 'En attente', 'test@', 'jnmmm', 'Description', 0),
(16, 'Evenement', '2020-02-16', 'No picture', 'En attente', 'test@', 'jnmmm', 'Description', 0),
(17, 'Evenement', '2020-02-16', 'No picture', 'En attente', 'test@', 'jnmmm', 'Description', 0),
(18, 'Evenement', '2020-02-16', 'No picture', 'En attente', 'test@', 'jnmmm', 'Description', 0),
(19, 'Maintenance', '2020-02-17', 'C:+Users+ASUS+Desktop+Nopic.png', 'En attente', 'test@', 'test', 'test', 2),
(39, 'Location', '2020-02-22', 'No picture', 'En attente', 'test@', 'fff', 'Description', 2),
(40, 'Location', '2020-02-22', 'C:+Users+ASUS+Desktop+UseCaseDiagram1.jpg', 'En attente', 'test@', 'obj', 'Description', 2);

-- --------------------------------------------------------

--
-- Table structure for table `retours`
--

DROP TABLE IF EXISTS `retours`;
CREATE TABLE IF NOT EXISTS `retours` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_location` int(11) NOT NULL,
  `etat` tinyint(1) NOT NULL,
  `retard` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_location` (`id_location`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `site`
--

DROP TABLE IF EXISTS `site`;
CREATE TABLE IF NOT EXISTS `site` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emplacement` varchar(255) NOT NULL,
  `langitude` double NOT NULL,
  `latitude` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site`
--

INSERT INTO `site` (`id`, `emplacement`, `langitude`, `latitude`) VALUES
(44, 'Manouba', 158.23, 99.47),
(45, 'Marsa', 45.57, 65.47),
(46, 'Manouba', 158.23, 99.47);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE IF NOT EXISTS `type` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `role` text NOT NULL,
  `login` text NOT NULL,
  `password` text NOT NULL,
  `nomComplet` text NOT NULL,
  `mail` text NOT NULL,
  `adresse` text NOT NULL,
  `tel` text NOT NULL,
  `dateNaissance` text NOT NULL,
  `dateCreation` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`id_user`, `role`, `login`, `password`, `nomComplet`, `mail`, `adresse`, `tel`, `dateNaissance`, `dateCreation`) VALUES
(0, 'Administrateur', 'test@test.com', 'test@test.com', 'root', 'root', 'root', 'root', 'root', '2020-02-17 22:01:46'),
(2, 'Client', 'pass@oass.tn', 'pass@oass.tn', 'nom', 'mail', 'addresse', '2566656', '2020-20-11', '2020-02-05 00:00:00');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`ref_user`) REFERENCES `fos_user` (`id`);

--
-- Constraints for table `detail_location`
--
ALTER TABLE `detail_location`
  ADD CONSTRAINT `FK_site1` FOREIGN KEY (`id_site`) REFERENCES `site` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_type1` FOREIGN KEY (`id_type`) REFERENCES `type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `participants`
--
ALTER TABLE `participants`
  ADD CONSTRAINT `FK_7169709263FECAEA` FOREIGN KEY (`idEvenements`) REFERENCES `evenements` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `FK_71697092FE6E88D7` FOREIGN KEY (`idUser`) REFERENCES `fos_user` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `reclamation`
--
ALTER TABLE `reclamation`
  ADD CONSTRAINT `reclamation_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `utilisateur` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `retours`
--
ALTER TABLE `retours`
  ADD CONSTRAINT `fk_idlocation` FOREIGN KEY (`id_location`) REFERENCES `detail_location` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
