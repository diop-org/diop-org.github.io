-- phpMyAdmin SQL Dump
-- version 2.10.1
-- http://www.phpmyadmin.net
-- 
-- Serveur: localhost
-- Généré le : Sam 08 Juin 2013 à 14:52
-- Version du serveur: 5.0.45
-- Version de PHP: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Base de données: `institut`
-- 

-- --------------------------------------------------------

-- 
-- Structure de la table `classe`
-- 

CREATE TABLE `classe` (
  `idClasse` int(11) NOT NULL,
  `nomClasse` varchar(10) NOT NULL,
  PRIMARY KEY  (`idClasse`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Contenu de la table `classe`
-- 

INSERT INTO `classe` (`idClasse`, `nomClasse`) VALUES 
(2, 'LPMM'),
(3, 'M1MIAGE'),
(4, 'L2MI'),
(5, 'LPLG'),
(6, 'L1MM'),
(7, 'L2IG'),
(344444, 'DSFGG');

-- --------------------------------------------------------

-- 
-- Structure de la table `etudiant`
-- 

CREATE TABLE `etudiant` (
  `matricule` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `adresse` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `classe` int(11) NOT NULL,
  `photo` varchar(20) NOT NULL,
  PRIMARY KEY  (`matricule`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Contenu de la table `etudiant`
-- 

INSERT INTO `etudiant` (`matricule`, `nom`, `prenom`, `adresse`, `email`, `classe`, `photo`) VALUES 
(0, 'BALDÃ©', 'AMI', '', 'jordin1991@live.fr', 2, ''),
(2, 'NDIAYE', 'KAGNALAYE', 'AZUR', 'kagna@rat.com', 2, 'tof5.jpg'),
(5, 'hfda', 'BDHFGDF', 'HJGRE', 'yayefallbi@live.fr', 2, 'tof6.jpg');
