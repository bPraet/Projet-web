-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 13 mai 2019 à 18:23
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `pluch`
--

-- --------------------------------------------------------

--
-- Structure de la table `bestproducts`
--

DROP TABLE IF EXISTS `bestproducts`;
CREATE TABLE IF NOT EXISTS `bestproducts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idProduct` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idProduct` (`idProduct`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `bestproducts`
--

INSERT INTO `bestproducts` (`id`, `idProduct`) VALUES
(1, 7),
(2, 47),
(3, 48);

-- --------------------------------------------------------

--
-- Structure de la table `carts`
--

DROP TABLE IF EXISTS `carts`;
CREATE TABLE IF NOT EXISTS `carts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) DEFAULT NULL,
  `idProduct` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idUser` (`idUser`),
  KEY `idProduct` (`idProduct`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `firstname` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `message` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `name`, `firstname`, `email`, `message`) VALUES
(5, 'benoit', 'praet', 'benoit.praet@hotmail.be', 'blablabla');

-- --------------------------------------------------------

--
-- Structure de la table `orderedproducts`
--

DROP TABLE IF EXISTS `orderedproducts`;
CREATE TABLE IF NOT EXISTS `orderedproducts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idOrder` int(11) DEFAULT NULL,
  `idProduct` int(11) DEFAULT NULL,
  `price` decimal(12,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idOrder` (`idOrder`),
  KEY `idProduct` (`idProduct`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) DEFAULT NULL,
  `idStatus` int(11) DEFAULT NULL,
  `total` decimal(12,2) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `adress` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idUser` (`idUser`),
  KEY `idStatus` (`idStatus`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `orderstatus`
--

DROP TABLE IF EXISTS `orderstatus`;
CREATE TABLE IF NOT EXISTS `orderstatus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `orderstatus`
--

INSERT INTO `orderstatus` (`id`, `name`) VALUES
(1, 'payÃ©'),
(2, 'en attente');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `price` decimal(12,2) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `size` decimal(12,2) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `brand` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `link`, `size`, `color`, `brand`) VALUES
(1, 'Lapin', '9.99', 'ressources/images/lapin.jpg', '30.00', 'Gris', 'Pluch'),
(2, 'Ane', '7.00', 'ressources/images/ane.jpg', '32.00', 'Gris', 'Pluch'),
(3, 'Renne', '5.50', 'ressources/images/renne.jpg', '32.00', 'Brun', 'Pluch'),
(4, 'Ours', '6.00', 'ressources/images/ours.jpg', '25.00', 'Brun', 'Pluch'),
(5, 'Renard', '8.00', 'ressources/images/renard.jpg', '25.00', 'Orange', 'Pluch'),
(6, 'Lion', '6.99', 'ressources/images/Lion.jpg', '28.00', 'Sable', 'Pluch'),
(7, 'Dragon', '9.99', 'ressources/images/dragon.jpg', '30.00', 'Noir', 'Disney'),
(44, 'Panda', '7.99', 'ressources/images/panda.jpg', '30.00', 'Noir/blanc', 'Pluch'),
(46, 'Paresseux', '8.00', 'ressources/images/paresseux.jpg', '27.00', 'Kaki', 'Pluch'),
(47, 'Stitch', '9.99', 'ressources/images/stitch.jpg', '30.00', 'Bleu', 'Disney'),
(48, 'Carapuce', '10.00', 'ressources/images/carapuce.jpg', '30.00', 'Bleu', 'Pokemon');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `statusId` int(11) DEFAULT '2',
  `name` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `statusId` (`statusId`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `statusId`, `name`, `firstname`, `email`) VALUES
(1, 'admin', '$2y$10$C9XpR/WxEQeVtJeI63qAwu.AsWogUw6O2K9UrS9YkJzYOghgkMvs.', 1, 'administrateur', 'admin', 'admin@admin.admin'),
(13, 'benoit', '$2y$10$GDQHaB9tFZopX4ejdE9ExuLAnAhXtdoYSGDUsrCU3vQYyZsAo4vtW', 2, 'Praet', 'Benoit', 'benoit.praet@hotmail.be'),
(18, 'test', '$2y$10$BrZtK230aua33XAvEVREnO1Xdu69y1ijP3bXdwA5wNmUf4SVr9wPm', 2, 'test', 'test', 'test@test.test');

-- --------------------------------------------------------

--
-- Structure de la table `userstatus`
--

DROP TABLE IF EXISTS `userstatus`;
CREATE TABLE IF NOT EXISTS `userstatus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `userstatus`
--

INSERT INTO `userstatus` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'user');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `bestproducts`
--
ALTER TABLE `bestproducts`
  ADD CONSTRAINT `bestproducts_ibfk_1` FOREIGN KEY (`idProduct`) REFERENCES `products` (`id`);

--
-- Contraintes pour la table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `carts_ibfk_2` FOREIGN KEY (`idProduct`) REFERENCES `products` (`id`);

--
-- Contraintes pour la table `orderedproducts`
--
ALTER TABLE `orderedproducts`
  ADD CONSTRAINT `orderedproducts_ibfk_1` FOREIGN KEY (`idOrder`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `orderedproducts_ibfk_2` FOREIGN KEY (`idProduct`) REFERENCES `products` (`id`);

--
-- Contraintes pour la table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`idStatus`) REFERENCES `orderstatus` (`id`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`statusId`) REFERENCES `userstatus` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
