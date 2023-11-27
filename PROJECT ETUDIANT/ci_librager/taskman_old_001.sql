-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 16 Mai 2016 à 17:33
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
-- Structure de la table `actions`
--

CREATE TABLE `actions` (
  `id` int(10) NOT NULL,
  `concerne_id` int(10) NOT NULL,
  `intitule` varchar(255) NOT NULL,
  `date_enreg` date DEFAULT NULL,
  `echeance` int(4) DEFAULT NULL,
  `deleted` int(1) DEFAULT NULL,
  `rapport_numero` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `actions`
--

INSERT INTO `actions` (`id`, `concerne_id`, `intitule`, `date_enreg`, `echeance`, `deleted`, `rapport_numero`) VALUES
(6, 2, 'j ai putf', '2016-05-12', NULL, 0, '5aJUHK8AQ1'),
(7, 2, 'anava', '2016-05-12', NULL, 0, '5aJUHK8AQ1');

-- --------------------------------------------------------

--
-- Structure de la table `entreprises`
--

CREATE TABLE `entreprises` (
  `id` int(10) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `entreprises`
--

INSERT INTO `entreprises` (`id`, `nom`, `adresse`, `tel`) VALUES
(1, 'Digit Expert', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `fonctions`
--

CREATE TABLE `fonctions` (
  `id` int(10) NOT NULL,
  `libelle` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `fonctions`
--

INSERT INTO `fonctions` (`id`, `libelle`, `description`) VALUES
(1, 'dg', 'directeur genrale'),
(2, 'secretaire', 'secretaire');

-- --------------------------------------------------------

--
-- Structure de la table `personnes`
--

CREATE TABLE `personnes` (
  `id` int(10) NOT NULL,
  `fonction_id` int(10) NOT NULL,
  `entreprise_id` int(10) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `date_enreg` date DEFAULT NULL,
  `motdepasse` varchar(255) NOT NULL,
  `est_admin` int(1) NOT NULL DEFAULT '0',
  `deleted` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `personnes`
--

INSERT INTO `personnes` (`id`, `fonction_id`, `entreprise_id`, `nom`, `prenom`, `tel`, `email`, `date_enreg`, `motdepasse`, `est_admin`, `deleted`) VALUES
(2, 2, 1, 'aurelio', 'nkumbe', '124331', 'nkaurelien@gmail.com', '2016-05-12', 'b9cb46e055a0ccf456370808e9b6cc21', 1, 0),
(3, 1, 1, 'aurelio', 'nku', '124', 'nkumbe@gmail.cm', '2016-05-15', '6746170128d9f610ce2a3065abe42863', 0, 0),
(4, 2, 1, 'aurelio', 'nkumbe', '873324324123', 'nkaurelienas@gmail.com', '2016-05-15', '46f32e0df96032781f6ee7c92c7db96c', 1, 0),
(5, 2, 1, 'aurelio', 'nkumbe', '873324324123', 'nkaurelienas@gmail.com', '2016-05-15', '46f32e0df96032781f6ee7c92c7db96c', 1, 0),
(6, 1, 1, 'aurelio', 'nkumbe', '121243456', 'nkaurelienaure@gmail.com', '2016-05-15', '46f32e0df96032781f6ee7c92c7db96c', 0, 0),
(7, 1, 1, 'aurelio', 'nkumbe', '121243456', 'nkaurelienauerr@gmail.com', '2016-05-15', '46f32e0df96032781f6ee7c92c7db96c', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `problemes`
--

CREATE TABLE `problemes` (
  `id` int(10) NOT NULL,
  `travail_id` int(10) NOT NULL,
  `intitule` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `date_enreg` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `problemes`
--

INSERT INTO `problemes` (`id`, `travail_id`, `intitule`, `description`, `date_enreg`) VALUES
(3, 5, 'pb1', 'pb', '2016-05-12'),
(4, 5, 'âjouter', '12', '2016-05-12');

-- --------------------------------------------------------

--
-- Structure de la table `rapports`
--

CREATE TABLE `rapports` (
  `numero` varchar(255) NOT NULL,
  `personne_id` int(10) NOT NULL,
  `date_enreg` date DEFAULT NULL,
  `objet` varchar(255) DEFAULT NULL,
  `duree` int(2) DEFAULT NULL,
  `heure_debut_service` varchar(8) DEFAULT NULL,
  `deleted` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `rapports`
--

INSERT INTO `rapports` (`numero`, `personne_id`, `date_enreg`, `objet`, `duree`, `heure_debut_service`, `deleted`) VALUES
('5aJUHK8AQ1', 2, '2016-05-12', 'amen today', 5, '05:30:44', 0),
('abOf9sGI12', 2, '2016-05-13', 'undefined', 0, NULL, 0),
('lNC3cEwjVa', 2, '2016-05-16', 'maintenant', 5, '04:22:53', 0),
('raWhkeNEq7', 2, '2016-05-13', 'undefined', 0, NULL, 0),
('uwY6eBVaDl', 2, '2016-05-15', 'undefined', 0, NULL, 0);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `rapport_actions`
--
CREATE TABLE `rapport_actions` (
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `rapport_travaux`
--
CREATE TABLE `rapport_travaux` (
`numero` varchar(255)
,`intitule` varchar(255)
,`date_enreg` date
,`superviseur_id` int(10)
,`deleted` int(1)
,`heure_debut` varchar(8)
,`heure_fin` varchar(8)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `travail_problemes`
--
CREATE TABLE `travail_problemes` (
`intitule` varchar(255)
,`date_enreg` date
,`superviseur_id` int(10)
,`id_pb` int(10)
,`id` int(10)
,`intitule_pb` varchar(255)
,`date_enreg_pb` date
,`description` varchar(255)
,`deleted` int(1)
,`heure_debut` varchar(8)
,`heure_fin` varchar(8)
);

-- --------------------------------------------------------

--
-- Structure de la table `travaux`
--

CREATE TABLE `travaux` (
  `id` int(10) NOT NULL,
  `intitule` varchar(255) NOT NULL,
  `date_enreg` date DEFAULT NULL,
  `heure_debut` varchar(8) DEFAULT NULL,
  `heure_fin` varchar(8) DEFAULT NULL,
  `superviseur_id` int(10) DEFAULT NULL,
  `deleted` int(1) DEFAULT '0',
  `rapport_numero` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `travaux`
--

INSERT INTO `travaux` (`id`, `intitule`, `date_enreg`, `heure_debut`, `heure_fin`, `superviseur_id`, `deleted`, `rapport_numero`) VALUES
(5, 'ajouter', '2016-05-12', '04:40:10', '04:40:11', 2, 0, '5aJUHK8AQ1');

-- --------------------------------------------------------

--
-- Structure de la vue `rapport_actions`
--
DROP TABLE IF EXISTS `rapport_actions`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `rapport_actions`  AS  select `rapports`.`numero` AS `numero`,`action`.`concerne_id` AS `concerne_id`,`action`.`id` AS `id_action`,`action`.`intitule` AS `intitule`,`action`.`date_enreg` AS `date_enreg`,`action`.`echeance` AS `echeance`,`action`.`deleted` AS `deleted`,`personnes`.`prenom` AS `prenom`,`personnes`.`nom` AS `nom` from ((`rapports` join `action` on((`rapports`.`numero` = `action`.`rapport_numero`))) left join `personnes` on((`action`.`concerne_id` = `personnes`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure de la vue `rapport_travaux`
--
DROP TABLE IF EXISTS `rapport_travaux`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `rapport_travaux`  AS  select `rapports`.`numero` AS `numero`,`travaux`.`intitule` AS `intitule`,`travaux`.`date_enreg` AS `date_enreg`,`travaux`.`superviseur_id` AS `superviseur_id`,`travaux`.`deleted` AS `deleted`,`travaux`.`heure_debut` AS `heure_debut`,`travaux`.`heure_fin` AS `heure_fin` from (`travaux` join `rapports` on((`travaux`.`rapport_numero` = `rapports`.`numero`))) ;

-- --------------------------------------------------------

--
-- Structure de la vue `travail_problemes`
--
DROP TABLE IF EXISTS `travail_problemes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `travail_problemes`  AS  select `travaux`.`intitule` AS `intitule`,`travaux`.`date_enreg` AS `date_enreg`,`travaux`.`superviseur_id` AS `superviseur_id`,`problemes`.`id` AS `id_pb`,`travaux`.`id` AS `id`,`problemes`.`intitule` AS `intitule_pb`,`problemes`.`date_enreg` AS `date_enreg_pb`,`problemes`.`description` AS `description`,`travaux`.`deleted` AS `deleted`,`travaux`.`heure_debut` AS `heure_debut`,`travaux`.`heure_fin` AS `heure_fin` from (`travaux` join `problemes` on((`travaux`.`id` = `problemes`.`travail_id`))) ;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `actions`
--
ALTER TABLE `actions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKaction385075` (`rapport_numero`);

--
-- Index pour la table `entreprises`
--
ALTER TABLE `entreprises`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fonctions`
--
ALTER TABLE `fonctions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `personnes`
--
ALTER TABLE `personnes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attribuer` (`fonction_id`),
  ADD KEY `employer` (`entreprise_id`);

--
-- Index pour la table `problemes`
--
ALTER TABLE `problemes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lier` (`travail_id`);

--
-- Index pour la table `rapports`
--
ALTER TABLE `rapports`
  ADD PRIMARY KEY (`numero`),
  ADD KEY `rediger` (`personne_id`);

--
-- Index pour la table `travaux`
--
ALTER TABLE `travaux`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKtravaux497938` (`rapport_numero`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `actions`
--
ALTER TABLE `actions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `entreprises`
--
ALTER TABLE `entreprises`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `fonctions`
--
ALTER TABLE `fonctions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `personnes`
--
ALTER TABLE `personnes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `problemes`
--
ALTER TABLE `problemes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `travaux`
--
ALTER TABLE `travaux`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `actions`
--
ALTER TABLE `actions`
  ADD CONSTRAINT `FKaction385075` FOREIGN KEY (`rapport_numero`) REFERENCES `rapports` (`numero`);

--
-- Contraintes pour la table `personnes`
--
ALTER TABLE `personnes`
  ADD CONSTRAINT `attribuer` FOREIGN KEY (`fonction_id`) REFERENCES `fonctions` (`id`),
  ADD CONSTRAINT `employer` FOREIGN KEY (`entreprise_id`) REFERENCES `entreprises` (`id`);

--
-- Contraintes pour la table `problemes`
--
ALTER TABLE `problemes`
  ADD CONSTRAINT `lier` FOREIGN KEY (`travail_id`) REFERENCES `travaux` (`id`);

--
-- Contraintes pour la table `rapports`
--
ALTER TABLE `rapports`
  ADD CONSTRAINT `rediger` FOREIGN KEY (`personne_id`) REFERENCES `personnes` (`id`);

--
-- Contraintes pour la table `travaux`
--
ALTER TABLE `travaux`
  ADD CONSTRAINT `FKtravaux497938` FOREIGN KEY (`rapport_numero`) REFERENCES `rapports` (`numero`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
