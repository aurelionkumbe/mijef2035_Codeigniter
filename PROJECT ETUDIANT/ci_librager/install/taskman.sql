-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Sam 09 Avril 2016 à 19:03
-- Version du serveur :  10.1.10-MariaDB
-- Version de PHP :  5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `taskman`
--

-- --------------------------------------------------------

--
-- Structure de la table `Action`
--

CREATE TABLE `Action` (
  `id` int(10) NOT NULL,
  `idConcerne` int(10) NOT NULL,
  `intitule` varchar(255) NOT NULL,
  `date_enreg` date DEFAULT NULL,
  `echeance` int(4) DEFAULT NULL,
  `deleted` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Action`
--

INSERT INTO `Action` (`id`, `idConcerne`, `intitule`, `date_enreg`, `echeance`, `deleted`) VALUES
(1, 1, 'ACTE1', '2016-03-29', 4, 1),
(2, 1, 'ACTE2', '2016-03-29', 4, 1),
(3, 1, 'ACTE2', '2016-03-29', 4, 1),
(4, 1, 'ACTE23', '2016-04-01', 234, 0),
(6, 1, 'as', '2016-04-01', 12, 0),
(11, 1, 's', '2016-04-08', NULL, 1),
(12, 1, 'moi j edeo', '2016-04-08', NULL, 1),
(13, 1, 'moi j edeo', '2016-04-08', NULL, 1),
(14, 1, 'moi j ede', '2016-04-08', NULL, 0),
(15, 4, 'demain', '2016-04-09', 0, 1),
(16, 1, 'action1', '2016-04-09', 123, 1),
(17, 1, 'act2367', '2016-04-09', 12, 1),
(18, 1, 'sd', '2016-04-09', 2, 1),
(19, 1, 'amie', '2016-04-09', NULL, 1),
(20, 1, 'amieas', '2016-04-09', NULL, 1),
(21, 1, 'ewwew', '2016-04-09', NULL, 1),
(22, 1, 'pour', '2016-04-09', NULL, 1),
(23, 1, 'moan', '2016-04-09', NULL, 1),
(24, 1, 'mesd', '2016-04-09', NULL, 1),
(25, 1, 'moin', '2016-04-09', NULL, 1),
(26, 1, 'as', '2016-04-09', NULL, 1),
(27, 1, 'tvaa', '2016-04-09', NULL, 1),
(28, 1, 'main', '2016-04-09', NULL, 1),
(29, 1, 'main', '2016-04-09', NULL, 1),
(30, 1, 'asas', '2016-04-09', NULL, 0),
(31, 4, 'asaas', '2016-04-09', NULL, 0),
(32, 4, 'sd', '2016-04-09', NULL, 0),
(33, 4, 'sds', '2016-04-09', NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `Entreprise`
--

CREATE TABLE `Entreprise` (
  `id` int(10) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Entreprise`
--

INSERT INTO `Entreprise` (`id`, `nom`, `adresse`, `tel`) VALUES
(1, 'digit expert', 'dla 121', '87655261789');

-- --------------------------------------------------------

--
-- Structure de la table `Fonction`
--

CREATE TABLE `Fonction` (
  `id` int(10) NOT NULL,
  `libelle` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Fonction`
--

INSERT INTO `Fonction` (`id`, `libelle`, `description`) VALUES
(1, 'dga', 'dg adjoint'),
(2, 'dg', 'directerir gen'),
(3, 'sec', 'secretaire');

-- --------------------------------------------------------

--
-- Structure de la table `Personne`
--

CREATE TABLE `Personne` (
  `id` int(10) NOT NULL,
  `Fonctionid` int(10) NOT NULL,
  `Entrepriseid` int(10) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `date_enreg` date DEFAULT NULL,
  `motdepasse` varchar(255) DEFAULT NULL,
  `est_admin` int(1) NOT NULL DEFAULT '0',
  `deleted` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Personne`
--

INSERT INTO `Personne` (`id`, `Fonctionid`, `Entrepriseid`, `nom`, `prenom`, `tel`, `email`, `date_enreg`, `motdepasse`, `est_admin`, `deleted`) VALUES
(1, 1, 1, 'nkumbe', 'aurelien', '7777777777', 'nkumbeas@gmail.cm', '1970-01-01', 'b9cb46e055a0ccf456370808e9b6cc21', 1, 0),
(4, 2, 1, 'ngouen', 'idriss', '12345', 'ngouen@gmail.cm', '2016-03-31', 'd60b8b92480a26bf0a469b5c1823eacc', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `Probleme`
--

CREATE TABLE `Probleme` (
  `id` int(10) NOT NULL,
  `Travailid` int(10) NOT NULL,
  `intitule` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `date_enreg` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Probleme`
--

INSERT INTO `Probleme` (`id`, `Travailid`, `intitule`, `description`, `date_enreg`) VALUES
(4, 3, 'int1', 'desc1', '2016-03-28'),
(5, 3, 'int2', 'dsc2', '2016-03-28'),
(6, 3, 'int3', 'desc3', '2016-03-28'),
(7, 4, 'int1', 'desc1', '2016-03-28'),
(8, 4, 'int2', 'dsc2', '2016-03-28'),
(9, 4, 'int3', 'desc3', '2016-03-28'),
(10, 5, 'pb1', 'dsc1', '2016-03-28'),
(11, 5, 'pb2', 'sds2', '2016-03-28'),
(12, 6, 'sd', 'sds', '2016-03-28'),
(13, 7, 'asd1', 'asd3', '2016-03-28'),
(14, 7, 'asd4', 'asd4', '2016-03-28'),
(15, 8, 'bv1', 'bvqwe', '2016-03-28'),
(16, 8, 'nb2', 'nkjh1', '2016-03-28'),
(17, 9, 'pb23', 'sdes12', '2016-03-28'),
(18, 9, 'pb48', 'jsds34', '2016-03-28'),
(19, 10, 'pb8', 'cdesc8', '2016-03-28'),
(20, 10, 'pb9', 'desc9', '2016-03-28'),
(21, 32, 'moisds', 'sds', '2016-04-08'),
(22, 32, 'ax', 'moi', '2016-04-08'),
(23, 34, 'as', '', '2016-04-08'),
(24, 44, 'sd', '', '2016-04-09'),
(25, 45, 'sd', '', '2016-04-09'),
(26, 46, 'as', 'as', '2016-04-09'),
(27, 46, 'as', '', '2016-04-09'),
(28, 50, 'as', 'as', '2016-04-09'),
(29, 50, 'osd', 'as', '2016-04-09'),
(30, 51, 'as', '', '2016-04-09'),
(31, 51, 'as', '', '2016-04-09');

-- --------------------------------------------------------

--
-- Structure de la table `Rapport`
--

CREATE TABLE `Rapport` (
  `numero` varchar(255) NOT NULL,
  `Personneid` int(10) NOT NULL,
  `date_enreg` date DEFAULT NULL,
  `objet` varchar(255) DEFAULT NULL,
  `duree` int(2) DEFAULT NULL,
  `heure_debut_service` varchar(8) DEFAULT NULL,
  `deleted` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Rapport`
--

INSERT INTO `Rapport` (`numero`, `Personneid`, `date_enreg`, `objet`, `duree`, `heure_debut_service`, `deleted`) VALUES
('08e8156ee5', 1, '2016-04-01', 'avent', 12, '02:35:06', 0),
('460ce23131', 1, '2016-04-05', NULL, NULL, NULL, 0),
('d35df8a371', 4, '2016-04-01', NULL, NULL, NULL, 0),
('d9c9bd8999', 1, NULL, 'mager coller swouler', 23, '11:03:33', 0),
('eec1924646', 4, '2016-04-09', 'mon vieus rapport', 1234, '12:52:08', 0);

-- --------------------------------------------------------

--
-- Structure de la table `Rapport_Action`
--

CREATE TABLE `Rapport_Action` (
  `Actionid` int(10) NOT NULL,
  `Rapportnumero` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Rapport_Action`
--

INSERT INTO `Rapport_Action` (`Actionid`, `Rapportnumero`) VALUES
(1, 'd9c9bd8999'),
(2, 'd9c9bd8999'),
(3, 'd9c9bd8999'),
(4, '08e8156ee5'),
(6, '08e8156ee5'),
(11, 'd9c9bd8999'),
(12, 'd9c9bd8999'),
(13, 'd9c9bd8999'),
(14, 'd9c9bd8999'),
(15, 'eec1924646'),
(16, 'eec1924646'),
(17, 'eec1924646'),
(18, 'eec1924646'),
(19, 'eec1924646'),
(20, 'eec1924646'),
(21, 'eec1924646'),
(22, 'eec1924646'),
(23, 'eec1924646'),
(24, 'eec1924646'),
(25, 'eec1924646'),
(26, 'eec1924646'),
(27, 'eec1924646'),
(28, 'eec1924646'),
(29, 'eec1924646'),
(30, 'eec1924646'),
(31, 'eec1924646'),
(32, 'eec1924646'),
(33, 'eec1924646');

-- --------------------------------------------------------

--
-- Structure de la table `Rapport_Travail`
--

CREATE TABLE `Rapport_Travail` (
  `Travailid` int(10) NOT NULL,
  `Rapportnumero` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Rapport_Travail`
--

INSERT INTO `Rapport_Travail` (`Travailid`, `Rapportnumero`) VALUES
(4, 'd9c9bd8999'),
(9, 'd9c9bd8999'),
(13, '08e8156ee5'),
(14, '08e8156ee5'),
(15, '08e8156ee5'),
(20, 'd9c9bd8999'),
(21, 'd9c9bd8999'),
(22, 'd9c9bd8999'),
(24, 'd9c9bd8999'),
(24, 'eec1924646'),
(25, 'd9c9bd8999'),
(26, 'd9c9bd8999'),
(27, 'd9c9bd8999'),
(28, 'd9c9bd8999'),
(29, 'd9c9bd8999'),
(30, 'd9c9bd8999'),
(31, 'd9c9bd8999'),
(32, 'd9c9bd8999'),
(32, 'eec1924646'),
(33, 'd9c9bd8999'),
(34, 'd9c9bd8999'),
(35, 'd9c9bd8999'),
(36, 'eec1924646'),
(37, 'eec1924646'),
(38, 'eec1924646'),
(39, 'eec1924646'),
(40, 'eec1924646'),
(41, 'eec1924646'),
(42, 'eec1924646'),
(43, 'eec1924646'),
(44, 'eec1924646'),
(45, 'eec1924646'),
(46, 'eec1924646'),
(47, 'eec1924646'),
(48, 'eec1924646'),
(49, 'eec1924646'),
(50, 'eec1924646'),
(51, 'eec1924646'),
(53, 'eec1924646');

-- --------------------------------------------------------

--
-- Structure de la table `Travail`
--

CREATE TABLE `Travail` (
  `id` int(10) NOT NULL,
  `intitule` varchar(255) NOT NULL,
  `date_enreg` date DEFAULT NULL,
  `heure_debut` varchar(8) DEFAULT NULL,
  `heure_fin` varchar(8) DEFAULT NULL,
  `superviseurid` int(10) DEFAULT NULL,
  `deleted` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Travail`
--

INSERT INTO `Travail` (`id`, `intitule`, `date_enreg`, `heure_debut`, `heure_fin`, `superviseurid`, `deleted`) VALUES
(2, 'intitule', '2016-03-28', '09:07:28', '09:07:29', NULL, 0),
(3, 'tv1', '2016-03-28', '09:15:22', '09:15:24', NULL, 0),
(4, 'tv2', '2016-03-28', '09:15:22', '09:15:24', NULL, 1),
(5, 'TV3', '2016-03-28', '09:28:15', '09:28:17', 1, 0),
(6, 'tv4', '2016-03-28', '09:32:54', '09:32:55', 1, 0),
(7, 'tv45', '2016-03-28', '09:35:20', '09:35:20', 1, 0),
(8, 'tv6', '2016-03-28', '09:37:16', '09:37:16', 1, 0),
(9, 'tv7', '2016-03-28', '09:41:43', '09:41:44', 1, 1),
(10, 'tv8', '2016-03-28', '09:45:38', '09:45:40', 1, 0),
(11, 'tvra', '2016-04-01', '01:16:02', '01:16:04', 1, 0),
(12, 'trav23', '2016-04-01', '12:16:02', '01:18:47', 1, 0),
(13, 'travail1', '2016-04-01', '12:16:03', '06:19:47', 1, 0),
(14, 'traveaux', '2016-04-01', '01:21:20', '01:21:21', 1, 0),
(15, 'tv1', '2016-04-01', '02:22:48', '02:22:48', 1, 0),
(16, 'jouer', '2016-04-01', '03:27:32', '03:27:33', 1, 0),
(17, 'tv5', '2016-04-08', '10:56:06', '10:56:10', 4, 0),
(18, 'trva34', '2016-04-08', '10:57:11', '10:57:11', 1, 0),
(20, 'traveaux', '2016-04-08', '10:06:52', '10:06:53', 1, 0),
(21, 'traveau', '2016-04-08', '11:11:52', '11:11:55', 1, 1),
(22, 'travaus', '2016-04-08', '11:51:07', '11:51:08', 1, 0),
(24, 'travasad', '2016-04-08', '01:22:32', '01:22:33', 1, 1),
(25, 'travada', '2016-04-08', '01:22:32', '02:22:33', 1, 1),
(26, 'raver', '2016-04-08', '12:39:03', '12:39:04', 1, 1),
(27, 'sds', '2016-04-08', '12:39:03', '12:39:04', 1, 1),
(28, 'aad', '2016-04-08', '12:39:03', '12:39:04', 1, 0),
(29, 'sdssa', '2016-04-08', '12:42:39', '12:42:40', 1, 1),
(30, 'asahjgew', '2016-04-08', '12:46:32', '12:46:33', 1, 1),
(31, 'aas', '2016-04-08', '12:48:21', '12:48:21', 1, 1),
(32, 'mamas', '2016-04-08', '01:02:22', '01:02:22', 1, 1),
(33, 'ander', '2016-04-08', '01:02:22', '01:02:22', 1, 0),
(34, 'dfsd', '2016-04-08', '01:02:22', '01:02:22', 1, 0),
(35, '', '2016-04-08', '', '', 1, 1),
(36, 'merde', '2016-04-09', '01:53:12', '01:53:12', 1, 1),
(37, 'marrdi', '2016-04-09', '01:53:12', '01:53:12', 1, 1),
(38, 'perep', '2016-04-09', '02:01:42', '02:01:42', 1, 1),
(39, 'wew', '2016-04-09', '02:13:29', '02:13:29', 1, 1),
(40, 'msd', '2016-04-09', '02:13:29', '02:13:29', 1, 1),
(41, 'msd', '2016-04-09', '02:13:29', '02:13:29', 1, 1),
(42, 'avant', '2016-04-09', '09:03:49', '09:03:49', 1, 1),
(43, 'asbas', '2016-04-09', '09:04:35', '09:04:38', 1, 0),
(44, 'mon taf', '2016-04-09', '10:38:53', '10:38:55', 1, 0),
(45, 'mon taf', '2016-04-09', '10:38:53', '10:38:55', 1, 0),
(46, 'as', '2016-04-09', '10:51:19', '10:51:19', 1, 1),
(47, 'as', '2016-04-09', '10:53:41', '10:53:41', 1, 1),
(48, '', '2016-04-09', '', '', 1, 1),
(49, 'trav345', '2016-04-09', '10:55:19', '10:55:20', 1, 0),
(50, 'as', '2016-04-09', '11:04:14', '11:04:14', 1, 1),
(51, 'sdsd', '2016-04-09', '11:09:34', '', 1, 1),
(53, 'asa', '2016-04-09', '', '', 1, 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Action`
--
ALTER TABLE `Action`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Entreprise`
--
ALTER TABLE `Entreprise`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Fonction`
--
ALTER TABLE `Fonction`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Personne`
--
ALTER TABLE `Personne`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attribuer` (`Fonctionid`),
  ADD KEY `employer` (`Entrepriseid`);

--
-- Index pour la table `Probleme`
--
ALTER TABLE `Probleme`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lier` (`Travailid`);

--
-- Index pour la table `Rapport`
--
ALTER TABLE `Rapport`
  ADD PRIMARY KEY (`numero`),
  ADD KEY `FKRapport518794` (`Personneid`);

--
-- Index pour la table `Rapport_Action`
--
ALTER TABLE `Rapport_Action`
  ADD PRIMARY KEY (`Actionid`,`Rapportnumero`),
  ADD KEY `FKAction_Rap421910` (`Actionid`),
  ADD KEY `FKAction_Rap635086` (`Rapportnumero`);

--
-- Index pour la table `Rapport_Travail`
--
ALTER TABLE `Rapport_Travail`
  ADD PRIMARY KEY (`Travailid`,`Rapportnumero`),
  ADD KEY `FKRapport_Tr829870` (`Rapportnumero`),
  ADD KEY `FKRapport_Tr507377` (`Travailid`);

--
-- Index pour la table `Travail`
--
ALTER TABLE `Travail`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `Action`
--
ALTER TABLE `Action`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT pour la table `Entreprise`
--
ALTER TABLE `Entreprise`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `Fonction`
--
ALTER TABLE `Fonction`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `Personne`
--
ALTER TABLE `Personne`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `Probleme`
--
ALTER TABLE `Probleme`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT pour la table `Travail`
--
ALTER TABLE `Travail`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `Personne`
--
ALTER TABLE `Personne`
  ADD CONSTRAINT `attribuer` FOREIGN KEY (`Fonctionid`) REFERENCES `Fonction` (`id`),
  ADD CONSTRAINT `employer` FOREIGN KEY (`Entrepriseid`) REFERENCES `Entreprise` (`id`);

--
-- Contraintes pour la table `Probleme`
--
ALTER TABLE `Probleme`
  ADD CONSTRAINT `lier` FOREIGN KEY (`Travailid`) REFERENCES `Travail` (`id`);

--
-- Contraintes pour la table `Rapport`
--
ALTER TABLE `Rapport`
  ADD CONSTRAINT `FKRapport518794` FOREIGN KEY (`Personneid`) REFERENCES `Personne` (`id`);

--
-- Contraintes pour la table `Rapport_Action`
--
ALTER TABLE `Rapport_Action`
  ADD CONSTRAINT `FKAction_Rap421910` FOREIGN KEY (`Actionid`) REFERENCES `Action` (`id`),
  ADD CONSTRAINT `FKAction_Rap635086` FOREIGN KEY (`Rapportnumero`) REFERENCES `Rapport` (`numero`);

--
-- Contraintes pour la table `Rapport_Travail`
--
ALTER TABLE `Rapport_Travail`
  ADD CONSTRAINT `FKRapport_Tr507377` FOREIGN KEY (`Travailid`) REFERENCES `Travail` (`id`),
  ADD CONSTRAINT `FKRapport_Tr829870` FOREIGN KEY (`Rapportnumero`) REFERENCES `Rapport` (`numero`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
