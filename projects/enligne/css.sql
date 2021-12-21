-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Ven 26 Avril 2013 à 19:40
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `online`
--

-- --------------------------------------------------------

--
-- Structure de la table `css`
--

CREATE TABLE IF NOT EXISTS `css` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `commentaire` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `code` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `css`
--

INSERT INTO `css` (`id`, `commentaire`, `code`) VALUES
(6, 'body', 'body{\r\nbackground:#ffffff;\r\n\r\n}'),
(7, '#ban', '#ban{\r\ntext-align:center;\r\nborder:1px solid black;\r\nheight:124px;\r\nwidth:90%;\r\n}');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
