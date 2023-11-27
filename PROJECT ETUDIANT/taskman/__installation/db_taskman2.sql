-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 20 Juin 2016 à 12:27
-- Version du serveur :  10.1.10-MariaDB
-- Version de PHP :  5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `db_taskman2`
--

-- --------------------------------------------------------

--
-- Structure de la table `actions`
--

CREATE TABLE `actions` (
  `id_act` int(10) NOT NULL,
  `nom_act` varchar(255) NOT NULL,
  `date_act` date DEFAULT NULL,
  `echeance` datetime DEFAULT NULL,
  `resolue` int(1) NOT NULL DEFAULT '0',
  `deleted` int(1) DEFAULT NULL,
  `ass1_id` int(10) DEFAULT NULL,
  `ass2_id` int(10) DEFAULT NULL,
  `rapport_num` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `actions`
--

INSERT INTO `actions` (`id_act`, `nom_act`, `date_act`, `echeance`, `resolue`, `deleted`, `ass1_id`, `ass2_id`, `rapport_num`) VALUES
(1, 'programmer', '2016-06-18', '2012-12-12 00:00:00', 0, 0, 0, 0, '041a982a38920153474955db06f53fa3');

-- --------------------------------------------------------

--
-- Structure de la table `fonctions`
--

CREATE TABLE `fonctions` (
  `id_fonc` int(2) NOT NULL,
  `nom_fonc` varchar(255) DEFAULT NULL,
  `desc_fonc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `fonctions`
--

INSERT INTO `fonctions` (`id_fonc`, `nom_fonc`, `desc_fonc`) VALUES
(1, 'df', 'directeur genral'),
(2, 'DG', 'directeur gen'),
(3, 'DG', 'directeur gen'),
(4, 'DG', 'directeur gen'),
(5, 'DRH', 'direction des ressources humaines'),
(6, 'DRH', 'direction des ressources humaines'),
(7, 'sec', 'secretaire'),
(8, 'sec', 'secretaire'),
(9, 'Nettoyeur', 'NET');

-- --------------------------------------------------------

--
-- Structure de la table `personnes`
--

CREATE TABLE `personnes` (
  `id_pers` int(10) NOT NULL,
  `fonction_id` int(2) NOT NULL,
  `nom_pers` varchar(255) NOT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `tel_pers` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `date_pers` datetime DEFAULT CURRENT_TIMESTAMP,
  `pass` varchar(255) NOT NULL,
  `is_admin` int(1) NOT NULL DEFAULT '0',
  `is_super_admin` int(1) NOT NULL DEFAULT '0',
  `deleted` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `personnes`
--

INSERT INTO `personnes` (`id_pers`, `fonction_id`, `nom_pers`, `prenom`, `tel_pers`, `email`, `date_pers`, `pass`, `is_admin`, `is_super_admin`, `deleted`) VALUES
(1, 5, 'nkumbe', 'igor', '679897848', 'nkaurelien@gmail.com', '2016-06-19 00:00:00', '5c2160b2c7d70ed85e31394cb25cd280', 1, 1, 0),
(3, 5, 'ngouen', 'igor', '667777777', 'nnid@gmail.com', '2016-06-19 00:00:00', '4d184cbc37beaded949d853d71cc8641', 1, 0, 0),
(4, 5, 'KAMTO', 'igor', '677777776', 'kamto@gmail.com', '2016-06-19 00:00:00', '4d184cbc37beaded949d853d71cc8641', 1, 0, 0),
(11, 2, 'essongo', 'joel', '667777774', 'nnid@gmail.con', '2016-06-19 00:00:00', '4d184cbc37beaded949d853d71cc8641', 0, 0, 0),
(12, 9, 'Choupy', 'Robert', '679461064', 'choupy@outlook.com', '2016-06-20 00:00:00', '72f9f8cd94540687226c021abc2068a4', 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `problemes`
--

CREATE TABLE `problemes` (
  `id_pb` int(10) NOT NULL,
  `travail_id` int(10) NOT NULL,
  `nom_pb` varchar(255) NOT NULL,
  `desc_pb` varchar(255) DEFAULT NULL,
  `date_pb` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `rapports`
--

CREATE TABLE `rapports` (
  `num` varchar(255) NOT NULL,
  `personne_id` int(10) NOT NULL,
  `objet` varchar(255) DEFAULT NULL,
  `memo` text NOT NULL,
  `date_rap` date DEFAULT NULL,
  `hd_serv` varchar(8) DEFAULT NULL,
  `hf_serv` int(2) DEFAULT NULL,
  `deleted` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `rapports`
--

INSERT INTO `rapports` (`num`, `personne_id`, `objet`, `memo`, `date_rap`, `hd_serv`, `hf_serv`, `deleted`) VALUES
('041a982a38920153474955db06f53fa3', 1, 'maintenances', '<p>salut la planete</p>', NULL, '12:15:56', 19, 0),
('18e6c79458b833b2d7b7fe7a5bc88f08', 12, NULL, '', '2016-06-20', NULL, NULL, 0),
('9b2388c665d451cc4afd127287bb8cf9', 1, NULL, '', '2016-06-19', NULL, NULL, 0),
('e2544178489c03f9e452552135a13e9a', 1, NULL, '', '2016-06-20', NULL, NULL, 0);


-- --------------------------------------------------------

--
-- Structure de la table `travaux`
--

CREATE TABLE `travaux` (
  `id_trav` int(10) NOT NULL,
  `nom_trav` varchar(255) NOT NULL,
  `date_trav` date DEFAULT NULL,
  `hd_trav` varchar(8) DEFAULT NULL,
  `hf_trav` varchar(8) DEFAULT NULL,
  `sup_id` int(10) DEFAULT NULL,
  `deleted` int(1) DEFAULT '0',
  `rapport_num` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `travaux`
--

INSERT INTO `travaux` (`id_trav`, `nom_trav`, `date_trav`, `hd_trav`, `hf_trav`, `sup_id`, `deleted`, `rapport_num`) VALUES
(1, 'laver le sol', '2016-06-18', '12:12:12', '16:36:35', 0, 0, '041a982a38920153474955db06f53fa3'),
(6, 'dire bonjour a tous le npome', '2016-06-19', '08:50:07', '09:49:28', 0, 0, '9b2388c665d451cc4afd127287bb8cf9'),
(7, 'dire bonjour a tous le npome', '2016-06-19', '08:50:07', '09:49:28', 0, 0, '9b2388c665d451cc4afd127287bb8cf9'),
(8, 'dire bonjour a tous le npome', '2016-06-19', '08:50:07', '09:49:28', 0, 0, '9b2388c665d451cc4afd127287bb8cf9');

-- --------------------------------------------------------

--
-- Index pour les tables exportées
--

--
-- Index pour la table `actions`
--
ALTER TABLE `actions`
  ADD PRIMARY KEY (`id_act`),
  ADD KEY `ass1_id` (`ass1_id`),
  ADD KEY `ass2_id` (`ass2_id`),
  ADD KEY `programmer` (`rapport_num`);

--
-- Index pour la table `fonctions`
--
ALTER TABLE `fonctions`
  ADD PRIMARY KEY (`id_fonc`);

--
-- Index pour la table `personnes`
--
ALTER TABLE `personnes`
  ADD PRIMARY KEY (`id_pers`),
  ADD KEY `attribuer` (`fonction_id`);

--
-- Index pour la table `problemes`
--
ALTER TABLE `problemes`
  ADD PRIMARY KEY (`id_pb`),
  ADD KEY `est survenu` (`travail_id`);

--
-- Index pour la table `rapports`
--
ALTER TABLE `rapports`
  ADD PRIMARY KEY (`num`),
  ADD KEY `rediger` (`personne_id`);


--
-- Index pour la table `travaux`
--
ALTER TABLE `travaux`
  ADD PRIMARY KEY (`id_trav`),
  ADD KEY `effectuer` (`rapport_num`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `actions`
--
ALTER TABLE `actions`
  MODIFY `id_act` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `fonctions`
--
ALTER TABLE `fonctions`
  MODIFY `id_fonc` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `personnes`
--
ALTER TABLE `personnes`
  MODIFY `id_pers` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `problemes`
--
ALTER TABLE `problemes`
  MODIFY `id_pb` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `travaux`
--
ALTER TABLE `travaux`
  MODIFY `id_trav` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `actions`
--
ALTER TABLE `actions`
  ADD CONSTRAINT `programmer` FOREIGN KEY (`rapport_num`) REFERENCES `rapports` (`num`) ON DELETE CASCADE;

--
-- Contraintes pour la table `personnes`
--
ALTER TABLE `personnes`
  ADD CONSTRAINT `attribuer` FOREIGN KEY (`fonction_id`) REFERENCES `fonctions` (`id_fonc`);

--
-- Contraintes pour la table `problemes`
--
ALTER TABLE `problemes`
  ADD CONSTRAINT `est survenu` FOREIGN KEY (`travail_id`) REFERENCES `travaux` (`id_trav`) ON DELETE CASCADE;

--
-- Contraintes pour la table `rapports`
--
ALTER TABLE `rapports`
  ADD CONSTRAINT `rediger` FOREIGN KEY (`personne_id`) REFERENCES `personnes` (`id_pers`);

--
-- Contraintes pour la table `travaux`
--
ALTER TABLE `travaux`
  ADD CONSTRAINT `effectuer` FOREIGN KEY (`rapport_num`) REFERENCES `rapports` (`num`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
