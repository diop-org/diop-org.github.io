-- phpMyAdmin SQL Dump
-- version 2.10.1
-- http://www.phpmyadmin.net
-- 
-- Serveur: localhost
-- Généré le : Sam 20 Avril 2013 à 13:49
-- Version du serveur: 5.0.45
-- Version de PHP: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Base de données: `evaluation`
-- 

-- --------------------------------------------------------

-- 
-- Structure de la table `candidat`
-- 

CREATE TABLE `candidat` (
  `idCandidat` int(11) NOT NULL,
  `nomCandidat` varchar(25) NOT NULL,
  `pnomCandidat` varchar(50) NOT NULL,
  `adresse` varchar(30) NOT NULL,
  `nationalite` varchar(30) NOT NULL,
  `telephone` int(11) NOT NULL,
  PRIMARY KEY  (`idCandidat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Contenu de la table `candidat`
-- 


-- --------------------------------------------------------

-- 
-- Structure de la table `centre`
-- 

CREATE TABLE `centre` (
  `idcentre` int(11) NOT NULL,
  `nomCentre` varchar(30) NOT NULL,
  PRIMARY KEY  (`idcentre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Contenu de la table `centre`
-- 


-- --------------------------------------------------------

-- 
-- Structure de la table `composer`
-- 

CREATE TABLE `composer` (
  `idExamen` int(11) NOT NULL,
  `idCandidat` int(11) NOT NULL,
  `note` int(2) NOT NULL,
  `appreciation` varchar(25) NOT NULL,
  PRIMARY KEY  (`idExamen`,`idCandidat`),
  KEY `idCandidat` (`idCandidat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Contenu de la table `composer`
-- 


-- --------------------------------------------------------

-- 
-- Structure de la table `examen`
-- 

CREATE TABLE `examen` (
  `idExamen` int(11) NOT NULL,
  `libExamen` varchar(30) NOT NULL,
  `option` varchar(30) NOT NULL,
  `session` varchar(30) NOT NULL,
  `nomCentre` varchar(30) NOT NULL,
  PRIMARY KEY  (`idExamen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Contenu de la table `examen`
-- 


-- 
-- Contraintes pour les tables exportées
-- 

-- 
-- Contraintes pour la table `composer`
-- 
ALTER TABLE `composer`
  ADD CONSTRAINT `composer_ibfk_1` FOREIGN KEY (`idExamen`) REFERENCES `examen` (`idExamen`),
  ADD CONSTRAINT `composer_ibfk_2` FOREIGN KEY (`idCandidat`) REFERENCES `candidat` (`idCandidat`);
