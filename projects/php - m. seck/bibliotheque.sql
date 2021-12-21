-- phpMyAdmin SQL Dump
-- version 2.9.1.1
-- http://www.phpmyadmin.net
-- 
-- Serveur: localhost
-- Généré le : Mardi 08 Juin 2010 à 21:41
-- Version du serveur: 5.0.27
-- Version de PHP: 5.2.0
-- 
-- Base de données: `bibliotheque`
-- 

-- --------------------------------------------------------

-- 
-- Structure de la table `auteur`
-- 

CREATE TABLE `auteur` (
  `numaut` varchar(5) NOT NULL,
  `nomaut` varchar(45) NOT NULL,
  `prenomaut` varchar(34) NOT NULL,
  `adresseaut` varchar(15) NOT NULL,
  PRIMARY KEY  (`numaut`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Contenu de la table `auteur`
-- 

INSERT INTO `auteur` (`numaut`, `nomaut`, `prenomaut`, `adresseaut`) VALUES 
('23', 'DIALLO', 'ABDOURAHMAN', 'POUT'),
('234', 'sere', 'Modou', 'sgre'),
('77', 'bh', 'efg', 'nk');

-- --------------------------------------------------------

-- 
-- Structure de la table `categorie`
-- 

CREATE TABLE `categorie` (
  `idc` varchar(5) NOT NULL,
  `libc` varchar(50) NOT NULL,
  PRIMARY KEY  (`idc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Contenu de la table `categorie`
-- 

INSERT INTO `categorie` (`idc`, `libc`) VALUES 
('1', 'gy');

-- --------------------------------------------------------

-- 
-- Structure de la table `editeu`
-- 

CREATE TABLE `editeu` (
  `cde` varchar(4) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `adres` varchar(35) NOT NULL,
  `tel` varchar(10) NOT NULL,
  PRIMARY KEY  (`cde`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Contenu de la table `editeu`
-- 

INSERT INTO `editeu` (`cde`, `nome`, `adres`, `tel`) VALUES 
('009', 'dd', 'dd', 'dd'),
('89', 'de', 'qq', 'sd');

-- --------------------------------------------------------

-- 
-- Structure de la table `etreobjet`
-- 

CREATE TABLE `etreobjet` (
  `idpret` varchar(4) NOT NULL,
  `ISBN` varchar(4) NOT NULL,
  `date` varchar(10) NOT NULL,
  `nbrepag4` varchar(50) NOT NULL,
  KEY `idpret` (`idpret`,`ISBN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Contenu de la table `etreobjet`
-- 


-- --------------------------------------------------------

-- 
-- Structure de la table `livre`
-- 

CREATE TABLE `livre` (
  `ISBN` varchar(5) NOT NULL,
  `titre` varchar(25) NOT NULL,
  `nbrepag` varchar(20) NOT NULL,
  `numaut` varchar(15) NOT NULL,
  `idc` varchar(15) NOT NULL,
  `cde` varchar(5) NOT NULL,
  PRIMARY KEY  (`ISBN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Contenu de la table `livre`
-- 

INSERT INTO `livre` (`ISBN`, `titre`, `nbrepag`, `numaut`, `idc`, `cde`) VALUES 
('12', 'le lac', '300', '43', '1', '1'),
('23', 'hjjk', '', '', '', ''),
('24', 'lang c', '345', '23', '1', '1'),
('25', 'reveil', '250', '23', '2', '1');

-- --------------------------------------------------------

-- 
-- Structure de la table `pret`
-- 

CREATE TABLE `pret` (
  `idpret` varchar(4) NOT NULL,
  `designpret` varchar(54) NOT NULL,
  PRIMARY KEY  (`idpret`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Contenu de la table `pret`
-- 

INSERT INTO `pret` (`idpret`, `designpret`) VALUES 
('34', ''),
('349', 'nn'),
('78', '');

-- --------------------------------------------------------

-- 
-- Structure de la table `user`
-- 

CREATE TABLE `user` (
  `login` varchar(30) NOT NULL,
  `pass` varchar(10) NOT NULL,
  PRIMARY KEY  (`login`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Contenu de la table `user`
-- 

INSERT INTO `user` (`login`, `pass`) VALUES 
('admin', 'pass');
