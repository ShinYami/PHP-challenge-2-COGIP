-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 08 avr. 2021 à 13:01
-- Version du serveur :  8.0.21
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cogip`
--

-- --------------------------------------------------------

--
-- Structure de la table `company`
--

DROP TABLE IF EXISTS `company`;
CREATE TABLE IF NOT EXISTS `company` (
  `company_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `company_name` varchar(70) NOT NULL,
  `company_country` varchar(70) NOT NULL,
  `company_tva` varchar(50) NOT NULL,
  `type_id` int UNSIGNED NOT NULL,
  PRIMARY KEY (`company_id`),
  KEY `type_id` (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `company`
--

INSERT INTO `company` (`company_id`, `company_name`, `company_country`, `company_tva`, `type_id`) VALUES
(1, 'ElectricPower', 'Italie', 'IT 256 852 542', 2),
(2, 'Proximdr', 'Belgique', 'BE0876 985 665', 2),
(11, 'Bob Vance Refrig.', 'United States', 'US456 654 687', 1),
(12, 'Jouets Jean-Michel', 'France', 'FR 677 544 000', 1),
(13, 'Belgalol', 'Belgique', 'BE0876 654 665', 2),
(14, 'Pierre Cailloux', 'France', 'FR 678 908 654', 2),
(15, 'Dunder Mifflin', 'United States', 'US678 765 765', 1),
(16, 'Raviga', 'United States', 'US456 654 342', 1),
(17, 'Mutiny', 'Mexique', 'MX12 345 678', 1),
(18, 'Hooli', 'Allemagne', 'DE 012 345 678', 1),
(19, 'Phoque Off', 'Royaume-Uni', 'EN987 654 321', 1),
(20, 'Pied Piper', 'United States', 'US678 765 765', 1);

-- --------------------------------------------------------

--
-- Structure de la table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
CREATE TABLE IF NOT EXISTS `invoice` (
  `invoice_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `invoice_number` varchar(20) NOT NULL,
  `invoice_date` date NOT NULL,
  `company_id` int UNSIGNED NOT NULL,
  `people_id` int UNSIGNED NOT NULL,
  PRIMARY KEY (`invoice_id`),
  KEY `company_id` (`company_id`),
  KEY `people_id` (`people_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `invoice_number`, `invoice_date`, `company_id`, `people_id`) VALUES
(1, 'F20190404-004', '2019-04-04', 12, 22),
(2, 'F20190404-003', '2019-04-04', 15, 2),
(3, 'F20190404-002', '2019-04-04', 14, 23),
(4, 'F20190404-001', '2019-04-04', 20, 6),
(5, 'F20190403-654', '2019-04-03', 16, 1),
(7, 'F20180414-008', '2018-04-14', 15, 24),
(8, 'F20180408-002', '2018-04-08', 14, 23),
(9, 'F20180407-001', '2018-04-07', 20, 6),
(10, 'F20180403-654', '2018-04-03', 16, 1),
(11, 'F20180404-004', '2018-04-04', 12, 22),
(12, 'F20170404-003', '2017-04-04', 15, 24),
(13, 'F20170524-002', '2017-02-04', 14, 23),
(14, 'F20170404-001', '2017-04-04', 20, 6),
(15, 'F20170403-654', '2017-04-03', 16, 1);

-- --------------------------------------------------------

--
-- Structure de la table `people`
--

DROP TABLE IF EXISTS `people`;
CREATE TABLE IF NOT EXISTS `people` (
  `people_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `people_firstname` varchar(70) NOT NULL,
  `people_lastname` varchar(70) NOT NULL,
  `people_phone` varchar(20) NOT NULL,
  `people_email` varchar(100) NOT NULL,
  `company_id` int UNSIGNED NOT NULL,
  PRIMARY KEY (`people_id`),
  KEY `company_id` (`company_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `people`
--

INSERT INTO `people` (`people_id`, `people_firstname`, `people_lastname`, `people_phone`, `people_email`, `company_id`) VALUES
(1, 'Peter', 'Gregory', '555-4567', 'peter.gregory@raviga.com', 16),
(2, 'Dwight', 'Schrute', '555-9859', 'dwight.schrute@ddmfl.com', 15),
(3, 'Cameron', 'Howe', '555-7896', 'cam.howe@mutiny.net', 17),
(6, 'Bertram', 'Gilfoyle', '555-0987', 'gifoyle@piedpiper.com', 20),
(18, 'Jian', 'Yang', '555-4567', 'jian.yang@phoque.off', 19),
(19, 'Gavin', 'Belson', '555-4213', 'gavin@hooli.com', 18),
(22, 'Meredith', 'Palmer', '06 85 69 74 58', 'meredith.palmer@jouetsjm.fr', 12),
(23, 'Jean-Claude', 'Dus', '01 23 45 67 89', 'jean-claude.dus@pierrecailloux.fr', 14),
(24, 'Kelly', 'Kapoor', '555-9858', 'kelly.kapoor@ddmfl.com', 15),
(25, 'Creed', 'Bratton', '555-9856', 'creed.bratton@ddmfl.com', 15);

-- --------------------------------------------------------

--
-- Structure de la table `roleofuser`
--

DROP TABLE IF EXISTS `roleofuser`;
CREATE TABLE IF NOT EXISTS `roleofuser` (
  `role_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_name` varchar(30) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `roleofuser`
--

INSERT INTO `roleofuser` (`role_id`, `role_name`) VALUES
(1, 'admin'),
(2, 'modo');

-- --------------------------------------------------------

--
-- Structure de la table `typeofcompany`
--

DROP TABLE IF EXISTS `typeofcompany`;
CREATE TABLE IF NOT EXISTS `typeofcompany` (
  `type_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `type_name` varchar(20) NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `typeofcompany`
--

INSERT INTO `typeofcompany` (`type_id`, `type_name`) VALUES
(1, 'client'),
(2, 'fournisseur');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_login` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `user_password` varchar(300) NOT NULL,
  `role_id` int UNSIGNED NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`user_id`, `user_login`, `user_password`, `role_id`) VALUES
(1, 'Jean-Christian', 'ranu', 1),
(2, 'Muriel', 'perrache', 2);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `company_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `typeofcompany` (`type_id`);

--
-- Contraintes pour la table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company` (`company_id`),
  ADD CONSTRAINT `invoice_ibfk_2` FOREIGN KEY (`people_id`) REFERENCES `people` (`people_id`);

--
-- Contraintes pour la table `people`
--
ALTER TABLE `people`
  ADD CONSTRAINT `people_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company` (`company_id`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roleofuser` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
