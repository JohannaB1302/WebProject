-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Ven 26 Mai 2017 à 11:40
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `jeuxindés`
--
CREATE DATABASE IF NOT EXISTS `jeuxindés` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `jeuxindés`;

-- --------------------------------------------------------

--
-- Structure de la table `critere`
--
-- Création :  Mer 24 Mai 2017 à 19:45
--

DROP TABLE IF EXISTS `critere`;
CREATE TABLE `critere` (
  `idCritere` int(20) NOT NULL,
  `parTitre` tinyint(1) NOT NULL,
  `parPrix` tinyint(1) NOT NULL,
  `parAnneeSortie` tinyint(1) NOT NULL,
  `parGenre` tinyint(1) NOT NULL,
  `parPlateForme` tinyint(1) NOT NULL,
  `parEditeur` tinyint(1) NOT NULL,
  `parMotCle` tinyint(1) NOT NULL,
  `parNote` tinyint(1) NOT NULL,
  `numRecherche` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `editeur`
--
-- Création :  Mer 24 Mai 2017 à 19:22
--

DROP TABLE IF EXISTS `editeur`;
CREATE TABLE `editeur` (
  `idEditeur` int(20) NOT NULL,
  `estPartenaire` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `evaluation`
--
-- Création :  Mer 24 Mai 2017 à 15:36
--

DROP TABLE IF EXISTS `evaluation`;
CREATE TABLE `evaluation` (
  `idEval` int(20) NOT NULL,
  `noteEval` int(20) NOT NULL,
  `commentaire` varchar(100) NOT NULL,
  `pseudo` varchar(20) NOT NULL,
  `idJeu` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `evaluation`
--

INSERT INTO `evaluation` (`idEval`, `noteEval`, `commentaire`, `pseudo`, `idJeu`) VALUES
(1, 20, 'Super !', 'Jonah', 1),
(2, 14, 'Pas mal', 'Val', 2);

-- --------------------------------------------------------

--
-- Structure de la table `image`
--
-- Création :  Mer 24 Mai 2017 à 19:38
--

DROP TABLE IF EXISTS `image`;
CREATE TABLE `image` (
  `idImage` int(20) NOT NULL,
  `longueur` int(20) NOT NULL,
  `largeur` int(20) NOT NULL,
  `format` varchar(20) NOT NULL,
  `idJeu` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `jeu`
--
-- Création :  Mer 24 Mai 2017 à 14:32
--

DROP TABLE IF EXISTS `jeu`;
CREATE TABLE `jeu` (
  `idJeu` int(20) NOT NULL,
  `titre` varchar(30) NOT NULL,
  `description` varchar(100) NOT NULL,
  `prix` int(100) NOT NULL,
  `anneeSortie` int(4) NOT NULL,
  `genre` varchar(20) NOT NULL,
  `plateForme` varchar(20) NOT NULL,
  `nbConsultations` int(255) NOT NULL,
  `noteMoyenne` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `jeu`
--

INSERT INTO `jeu` (`idJeu`, `titre`, `description`, `prix`, `anneeSortie`, `genre`, `plateForme`, `nbConsultations`, `noteMoyenne`) VALUES
(1, 'Night in the Woods', 'Meilleur jeu du monde', 20, 2017, 'Visual Novel', 'PC', 0, 20),
(2, 'Oxenfree', 'Lost pour teenager', 20, 2017, 'Visual Novel', 'PC', 0, 2);

-- --------------------------------------------------------

--
-- Structure de la table `membre_premium`
--
-- Création :  Ven 26 Mai 2017 à 08:03
--

DROP TABLE IF EXISTS `membre_premium`;
CREATE TABLE `membre_premium` (
  `pseudo` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `adresseMail` varchar(255) NOT NULL,
  `motDePasse` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `membre_premium`
--

INSERT INTO `membre_premium` (`pseudo`, `prenom`, `adresseMail`, `motDePasse`) VALUES
('Jonah', 'Johanna', 'johanna;b@monmail.fr', 'coucou'),
('Val', 'BOITEUX', 'valentin.b@monmail.fr', 'salut');

-- --------------------------------------------------------

--
-- Structure de la table `motcle`
--
-- Création :  Mer 24 Mai 2017 à 19:35
--

DROP TABLE IF EXISTS `motcle`;
CREATE TABLE `motcle` (
  `mot` varchar(20) NOT NULL,
  `idJeu` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `recherche`
--
-- Création :  Mer 24 Mai 2017 à 15:45
--

DROP TABLE IF EXISTS `recherche`;
CREATE TABLE `recherche` (
  `numRecherche` int(20) NOT NULL,
  `aTrouve` tinyint(1) NOT NULL,
  `duree` float NOT NULL,
  `notePertinence` int(5) NOT NULL,
  `idJeu` int(20) NOT NULL,
  `pseudo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `recherche`
--

INSERT INTO `recherche` (`numRecherche`, `aTrouve`, `duree`, `notePertinence`, `idJeu`, `pseudo`) VALUES
(1, 1, 0.001, 5, 2, 'Johanna'),
(2, 1, 0.004, 3, 1, 'Val');

-- --------------------------------------------------------

--
-- Structure de la table `reduction`
--
-- Création :  Mer 24 Mai 2017 à 19:46
--

DROP TABLE IF EXISTS `reduction`;
CREATE TABLE `reduction` (
  `idReduc` int(20) NOT NULL,
  `montantReduc` int(100) NOT NULL,
  `idJeu` int(20) NOT NULL,
  `idEditeur` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `critere`
--
ALTER TABLE `critere`
  ADD PRIMARY KEY (`idCritere`),
  ADD KEY `numRecherche` (`numRecherche`);

--
-- Index pour la table `editeur`
--
ALTER TABLE `editeur`
  ADD PRIMARY KEY (`idEditeur`);

--
-- Index pour la table `evaluation`
--
ALTER TABLE `evaluation`
  ADD PRIMARY KEY (`idEval`),
  ADD KEY `pseudo` (`pseudo`),
  ADD KEY `idJeu` (`idJeu`);

--
-- Index pour la table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`idImage`),
  ADD KEY `idJeu` (`idJeu`);

--
-- Index pour la table `jeu`
--
ALTER TABLE `jeu`
  ADD PRIMARY KEY (`idJeu`);

--
-- Index pour la table `membre_premium`
--
ALTER TABLE `membre_premium`
  ADD PRIMARY KEY (`pseudo`);

--
-- Index pour la table `motcle`
--
ALTER TABLE `motcle`
  ADD PRIMARY KEY (`mot`),
  ADD KEY `idJeu` (`idJeu`);

--
-- Index pour la table `recherche`
--
ALTER TABLE `recherche`
  ADD PRIMARY KEY (`numRecherche`),
  ADD KEY `idJeu` (`idJeu`),
  ADD KEY `pseudo` (`pseudo`);

--
-- Index pour la table `reduction`
--
ALTER TABLE `reduction`
  ADD PRIMARY KEY (`idReduc`),
  ADD KEY `idJeu` (`idJeu`),
  ADD KEY `idEditeur` (`idEditeur`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `critere`
--
ALTER TABLE `critere`
  MODIFY `idCritere` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `editeur`
--
ALTER TABLE `editeur`
  MODIFY `idEditeur` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `evaluation`
--
ALTER TABLE `evaluation`
  MODIFY `idEval` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `image`
--
ALTER TABLE `image`
  MODIFY `idImage` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `jeu`
--
ALTER TABLE `jeu`
  MODIFY `idJeu` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `recherche`
--
ALTER TABLE `recherche`
  MODIFY `numRecherche` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `reduction`
--
ALTER TABLE `reduction`
  MODIFY `idReduc` int(20) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `evaluation`
--
ALTER TABLE `evaluation`
  ADD CONSTRAINT `evaluation_ibfk_1` FOREIGN KEY (`pseudo`) REFERENCES `membre_premium` (`pseudo`),
  ADD CONSTRAINT `evaluation_ibfk_2` FOREIGN KEY (`idJeu`) REFERENCES `jeu` (`idJeu`);

--
-- Contraintes pour la table `recherche`
--
ALTER TABLE `recherche`
  ADD CONSTRAINT `recherche_ibfk_1` FOREIGN KEY (`idJeu`) REFERENCES `jeu` (`idJeu`);

--
-- Contraintes pour la table `reduction`
--
ALTER TABLE `reduction`
  ADD CONSTRAINT `reduction_ibfk_1` FOREIGN KEY (`idJeu`) REFERENCES `jeu` (`idJeu`),
  ADD CONSTRAINT `reduction_ibfk_2` FOREIGN KEY (`idEditeur`) REFERENCES `editeur` (`idEditeur`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
