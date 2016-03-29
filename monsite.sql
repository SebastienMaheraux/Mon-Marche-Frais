-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 25 Novembre 2015 à 18:28
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `monsite`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id_article` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `image_src` varchar(100) DEFAULT NULL,
  `id_category` int(11) DEFAULT NULL,
  `price` float NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_article`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`id_article`, `name`, `image_src`, `id_category`, `price`) VALUES
(2, 'Pomme golden', 'images\\Ail.jpg', 3, 1.53),
(3, 'Brocoli', 'images\\brocoli.jpg', 2, 3.28),
(4, 'Cerise', 'images\\cerise.jpg', 1, 2.5),
(5, 'Chou', 'images\\chou.jpg', 2, 1.23),
(6, 'Chou-Fleur', 'images\\chou-fleur.jpg', 2, 1.38),
(7, 'Citron', 'images\\citron.png', 1, 0.99),
(8, 'Clementine', 'images\\clementine.jpg', 1, 1.89),
(9, 'Courgette', 'images\\courgette.jpg', 2, 2.54),
(10, 'Echalote', 'images\\echalote.jpg', 3, 3.62),
(11, 'Fraise', 'images\\fraises.jpg', 1, 2.25),
(12, 'Haricots Verts', 'images\\haricots-verts.jpg', 2, 3.33),
(13, 'Kiwi', 'images\\Kiwi.jpg', 1, 3.12),
(14, 'Melon', 'images\\melon.png', 1, 1.56),
(15, 'Noix de coco', 'images\\Noix-de-coco.jpg', 1, 3.65),
(16, 'Orange', 'images\\orange.jpg', 1, 1.28),
(17, 'Oseille', 'images\\Oseille.jpg', 3, 11.47),
(18, 'Pasteque', 'images\\pasteque.jpg', 1, 2.25),
(19, 'Peche', 'images\\peche.jpg', 1, 5.32),
(20, 'Persil', 'images\\persil.jpg', 3, 5.65),
(21, 'Petit Pois', 'images\\petit-pois.jpg', 2, 4.62),
(22, 'Poire', 'images\\Poire.jpg', 1, 14.68),
(23, 'Pomme golden', 'images\\Pomme-golden.jpg', 1, 2.56),
(24, 'Salade', 'images\\salade.jpg', 2, 3.83);

-- --------------------------------------------------------

--
-- Structure de la table `basket`
--

CREATE TABLE IF NOT EXISTS `basket` (
  `id_basket` int(11) NOT NULL AUTO_INCREMENT,
  `price` float DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_basket`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12654879 ;

--
-- Contenu de la table `basket`
--

INSERT INTO `basket` (`id_basket`, `price`, `id_user`) VALUES
(12654872, 44.49, 8),
(12654873, 13.96, 8),
(12654875, 50, 8),
(12654876, 50, 8),
(12654877, 18.75, 8),
(12654878, 11.19, 8);

-- --------------------------------------------------------

--
-- Structure de la table `basket_line`
--

CREATE TABLE IF NOT EXISTS `basket_line` (
  `id_basket_line` int(11) NOT NULL AUTO_INCREMENT,
  `id_article` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `priceTot` float NOT NULL,
  PRIMARY KEY (`id_basket_line`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id_category` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `category`
--

INSERT INTO `category` (`id_category`, `name`) VALUES
(1, 'fruits'),
(2, 'légumes'),
(3, 'aromates');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `role` varchar(100) DEFAULT NULL,
  `login` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id_user`, `name`, `password`, `role`, `login`) VALUES
(1, 'admin', 'admin', 'admin', 'admin'),
(8, 'TestUser', 'test', 'client', 'test');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
