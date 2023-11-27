-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 13, 2016 at 11:32 
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_fecarugby`
--

-- --------------------------------------------------------

--
-- Table structure for table `achat`
--

CREATE TABLE `achat` (
  `internaute_id_internaute` int(11) NOT NULL,
  `produit_id_produit` int(11) NOT NULL,
  `qte` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `genre` varchar(3) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nom`, `mdp`, `genre`, `email`) VALUES
(2, 'nnidriss', '1b7e64a971f291fcf2e77a9df71b84b1', 'H', 'ngwenidriss@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `billet`
--

CREATE TABLE `billet` (
  `id_billet` int(11) NOT NULL,
  `prix_billet` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `libelle_categorie` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`id`, `libelle_categorie`) VALUES
(10, '21'),
(11, '19'),
(12, '17'),
(13, '18'),
(14, '22'),
(15, '1'),
(16, '3');

-- --------------------------------------------------------

--
-- Table structure for table `competition`
--

CREATE TABLE `competition` (
  `id` int(11) NOT NULL,
  `nom_c` varchar(255) DEFAULT NULL,
  `niveau` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `competition`
--

INSERT INTO `competition` (`id`, `nom_c`, `niveau`) VALUES
(7, 'Champions league', 'N'),
(8, 'Europa league', 'i'),
(9, 'Konami', 'N'),
(10, 'coupe internationale', 'I'),
(13, 'Championnat National de rugby Ã   XV Masculin', 'N'),
(21, 'konami', 'I');

-- --------------------------------------------------------

--
-- Table structure for table `departement`
--

CREATE TABLE `departement` (
  `id` int(11) NOT NULL,
  `nom_dep` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `departement`
--

INSERT INTO `departement` (`id`, `nom_dep`) VALUES
(1, 'Administratif'),
(2, 'Technique');

-- --------------------------------------------------------

--
-- Table structure for table `dirigeant`
--

CREATE TABLE `dirigeant` (
  `id` int(11) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `genre` varchar(3) NOT NULL,
  `poste_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dirigeant`
--

INSERT INTO `dirigeant` (`id`, `nom`, `prenom`, `photo`, `genre`, `poste_id`) VALUES
(3, 'Ngouen', 'idriss', 'images.png', 'H', 1),
(4, 'nkumbe', 'aurelio', 'images.png', 'h', 2);

-- --------------------------------------------------------

--
-- Table structure for table `equipe`
--

CREATE TABLE `equipe` (
  `id` int(11) NOT NULL,
  `nom` varchar(45) DEFAULT NULL,
  `coach` varchar(45) DEFAULT NULL,
  `categorie_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `type_equipe_id` int(11) NOT NULL,
  `lieu_id_lieu` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `equipe`
--

INSERT INTO `equipe` (`id`, `nom`, `coach`, `categorie_id`, `genre_id`, `type_equipe_id`, `lieu_id_lieu`, `photo`) VALUES
(16, 'ADAX RUBGY', 'NNID', 10, 5, 9, 56, 'user7.png'),
(17, 'YUC RUGBY', 'NNAM', 10, 5, 9, 56, 'behance13.png');

-- --------------------------------------------------------

--
-- Table structure for table `equipe_competition`
--

CREATE TABLE `equipe_competition` (
  `equipe_id` int(11) NOT NULL,
  `competition_id` int(11) NOT NULL,
  `nbre_point` int(11) DEFAULT NULL,
  `rang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `equipe_competition`
--

INSERT INTO `equipe_competition` (`equipe_id`, `competition_id`, `nbre_point`, `rang`) VALUES
(16, 7, 29, 2),
(17, 7, 121, 1);

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `id` int(11) NOT NULL,
  `libelle_genre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`id`, `libelle_genre`) VALUES
(5, 'Homme'),
(6, 'Femme');

-- --------------------------------------------------------

--
-- Table structure for table `internaute`
--

CREATE TABLE `internaute` (
  `id_internaute` int(11) NOT NULL,
  `nom` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `joueur`
--

CREATE TABLE `joueur` (
  `id_joueur` int(11) NOT NULL,
  `nom_joueur` varchar(45) DEFAULT NULL,
  `prenom` varchar(45) NOT NULL,
  `sexe` varchar(3) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `jposte_id` int(11) NOT NULL,
  `equipe_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `joueur`
--

INSERT INTO `joueur` (`id_joueur`, `nom_joueur`, `prenom`, `sexe`, `age`, `logo`, `jposte_id`, `equipe_id`) VALUES
(3, 'Ngouen', 'idriss', 'H', 21, 'images.png', 4, 17);

-- --------------------------------------------------------

--
-- Table structure for table `jposte`
--

CREATE TABLE `jposte` (
  `id` int(11) NOT NULL,
  `nom_poste` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jposte`
--

INSERT INTO `jposte` (`id`, `nom_poste`) VALUES
(4, 'Avant centre'),
(5, 'Gardien'),
(6, 'Milieu');

-- --------------------------------------------------------

--
-- Table structure for table `lieu`
--

CREATE TABLE `lieu` (
  `id_lieu` int(11) NOT NULL,
  `nom_lieu` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lieu`
--

INSERT INTO `lieu` (`id_lieu`, `nom_lieu`) VALUES
(56, 'Douala'),
(57, 'Yaounde'),
(58, 'DSCHANG'),
(59, 'Garoua');

-- --------------------------------------------------------

--
-- Table structure for table `match`
--

CREATE TABLE `match` (
  `id_match` int(11) NOT NULL,
  `equipe_id1` int(11) NOT NULL,
  `equipe_id` int(11) NOT NULL,
  `but_marque` int(11) DEFAULT NULL,
  `but_marque1` int(11) DEFAULT NULL,
  `but_encaisse` int(11) DEFAULT NULL,
  `but_encaisse1` int(11) DEFAULT NULL,
  `stade_id` int(11) NOT NULL,
  `competition_id` int(11) NOT NULL,
  `DateM` varchar(45) DEFAULT NULL,
  `Heure` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `match`
--

INSERT INTO `match` (`id_match`, `equipe_id1`, `equipe_id`, `but_marque`, `but_marque1`, `but_encaisse`, `but_encaisse1`, `stade_id`, `competition_id`, `DateM`, `Heure`) VALUES
(1, 17, 16, 1, 0, NULL, NULL, 4, 7, '07/26/2016', '20:45'),
(4, 17, 16, NULL, NULL, NULL, NULL, 4, 8, '06/26/2016', '20:00');

-- --------------------------------------------------------

--
-- Table structure for table `poste`
--

CREATE TABLE `poste` (
  `id` int(11) NOT NULL,
  `nom_p` varchar(45) DEFAULT NULL,
  `departement_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `poste`
--

INSERT INTO `poste` (`id`, `nom_p`, `departement_id`) VALUES
(1, 'President', 1),
(2, 'Coordonateur', 2);

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

CREATE TABLE `produit` (
  `id_produit` int(11) NOT NULL,
  `nom_produit` varchar(45) DEFAULT NULL,
  `photo` varchar(255) NOT NULL,
  `quantite` int(11) NOT NULL,
  `prix` double DEFAULT NULL,
  `type_produit` int(11) DEFAULT NULL,
  `disponible` int(2) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `internaute_id_internaute` int(11) NOT NULL,
  `billet_id_billet` int(11) NOT NULL,
  `nbre_reservation` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `stade`
--

CREATE TABLE `stade` (
  `id` int(11) NOT NULL,
  `nom_stade` varchar(45) DEFAULT NULL,
  `nbre_stade` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stade`
--

INSERT INTO `stade` (`id`, `nom_stade`, `nbre_stade`) VALUES
(3, 'Omnisport', NULL),
(4, 'Amadou Ahidjo', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `type_equipe`
--

CREATE TABLE `type_equipe` (
  `id` int(11) NOT NULL,
  `libelle_type` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `type_equipe`
--

INSERT INTO `type_equipe` (`id`, `libelle_type`) VALUES
(9, 'Elite1 ou Senior'),
(10, 'Elite2 ou Espoir'),
(11, 'Centre De Formation'),
(12, 'Universitaire'),
(13, 'Ecole De Rugby');

-- --------------------------------------------------------

--
-- Table structure for table `type_produit`
--

CREATE TABLE `type_produit` (
  `id_type` int(11) NOT NULL,
  `nom_type` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `type_produit`
--

INSERT INTO `type_produit` (`id_type`, `nom_type`) VALUES
(1, 'Ballon'),
(2, 'casque');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `achat`
--
ALTER TABLE `achat`
  ADD PRIMARY KEY (`internaute_id_internaute`,`produit_id_produit`),
  ADD KEY `fk_internaute_has_produit_produit1_idx` (`produit_id_produit`),
  ADD KEY `fk_internaute_has_produit_internaute_idx` (`internaute_id_internaute`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billet`
--
ALTER TABLE `billet`
  ADD PRIMARY KEY (`id_billet`);

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `competition`
--
ALTER TABLE `competition`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departement`
--
ALTER TABLE `departement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dirigeant`
--
ALTER TABLE `dirigeant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_dirigeant_poste1_idx` (`poste_id`);

--
-- Indexes for table `equipe`
--
ALTER TABLE `equipe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_equipe_genre1_idx` (`genre_id`),
  ADD KEY `fk_equipe_categorie1_idx` (`categorie_id`),
  ADD KEY `fk_equipe_type_equipe1_idx` (`type_equipe_id`),
  ADD KEY `fk_equipe_lieu1_idx` (`lieu_id_lieu`);

--
-- Indexes for table `equipe_competition`
--
ALTER TABLE `equipe_competition`
  ADD PRIMARY KEY (`equipe_id`,`competition_id`),
  ADD KEY `fk_equipe_has_competition_competition1_idx` (`competition_id`),
  ADD KEY `fk_equipe_has_competition_equipe1_idx` (`equipe_id`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `internaute`
--
ALTER TABLE `internaute`
  ADD PRIMARY KEY (`id_internaute`);

--
-- Indexes for table `joueur`
--
ALTER TABLE `joueur`
  ADD PRIMARY KEY (`id_joueur`,`equipe_id`),
  ADD KEY `fk_joueur_jposte1_idx` (`jposte_id`),
  ADD KEY `fk_joueur_equipe1_idx` (`equipe_id`);

--
-- Indexes for table `jposte`
--
ALTER TABLE `jposte`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lieu`
--
ALTER TABLE `lieu`
  ADD PRIMARY KEY (`id_lieu`);

--
-- Indexes for table `match`
--
ALTER TABLE `match`
  ADD PRIMARY KEY (`id_match`),
  ADD KEY `fk_equipe_has_equipe_equipe2_idx` (`equipe_id1`),
  ADD KEY `fk_equipe_has_equipe_equipe1_idx` (`equipe_id`),
  ADD KEY `fk_match_stade1_idx` (`stade_id`),
  ADD KEY `fk_match_competition1_idx` (`competition_id`);

--
-- Indexes for table `poste`
--
ALTER TABLE `poste`
  ADD PRIMARY KEY (`id`,`departement_id`),
  ADD KEY `fk_poste_departement1_idx` (`departement_id`);

--
-- Indexes for table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id_produit`),
  ADD KEY `produit_ibfk_1` (`type_produit`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`internaute_id_internaute`,`billet_id_billet`),
  ADD KEY `fk_internaute_has_billet_billet1_idx` (`billet_id_billet`),
  ADD KEY `fk_internaute_has_billet_internaute1_idx` (`internaute_id_internaute`);

--
-- Indexes for table `stade`
--
ALTER TABLE `stade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_equipe`
--
ALTER TABLE `type_equipe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_produit`
--
ALTER TABLE `type_produit`
  ADD PRIMARY KEY (`id_type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `billet`
--
ALTER TABLE `billet`
  MODIFY `id_billet` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `competition`
--
ALTER TABLE `competition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `departement`
--
ALTER TABLE `departement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `dirigeant`
--
ALTER TABLE `dirigeant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `equipe`
--
ALTER TABLE `equipe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `internaute`
--
ALTER TABLE `internaute`
  MODIFY `id_internaute` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `joueur`
--
ALTER TABLE `joueur`
  MODIFY `id_joueur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `jposte`
--
ALTER TABLE `jposte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `lieu`
--
ALTER TABLE `lieu`
  MODIFY `id_lieu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `match`
--
ALTER TABLE `match`
  MODIFY `id_match` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `poste`
--
ALTER TABLE `poste`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `produit`
--
ALTER TABLE `produit`
  MODIFY `id_produit` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `stade`
--
ALTER TABLE `stade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `type_equipe`
--
ALTER TABLE `type_equipe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `type_produit`
--
ALTER TABLE `type_produit`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `achat`
--
ALTER TABLE `achat`
  ADD CONSTRAINT `fk_internaute_has_produit_internaute` FOREIGN KEY (`internaute_id_internaute`) REFERENCES `internaute` (`id_internaute`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_internaute_has_produit_produit1` FOREIGN KEY (`produit_id_produit`) REFERENCES `produit` (`id_produit`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `dirigeant`
--
ALTER TABLE `dirigeant`
  ADD CONSTRAINT `fk_dirigeant_poste1` FOREIGN KEY (`poste_id`) REFERENCES `poste` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `equipe`
--
ALTER TABLE `equipe`
  ADD CONSTRAINT `fk_equipe_categorie1` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_equipe_genre1` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_equipe_lieu1` FOREIGN KEY (`lieu_id_lieu`) REFERENCES `lieu` (`id_lieu`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_equipe_type_equipe1` FOREIGN KEY (`type_equipe_id`) REFERENCES `type_equipe` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `equipe_competition`
--
ALTER TABLE `equipe_competition`
  ADD CONSTRAINT `fk_equipe_has_competition_competition1` FOREIGN KEY (`competition_id`) REFERENCES `competition` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_equipe_has_competition_equipe1` FOREIGN KEY (`equipe_id`) REFERENCES `equipe` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `joueur`
--
ALTER TABLE `joueur`
  ADD CONSTRAINT `fk_joueur_equipe1` FOREIGN KEY (`equipe_id`) REFERENCES `equipe` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_joueur_jposte1` FOREIGN KEY (`jposte_id`) REFERENCES `jposte` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `match`
--
ALTER TABLE `match`
  ADD CONSTRAINT `fk_equipe_has_equipe_equipe1` FOREIGN KEY (`equipe_id`) REFERENCES `equipe` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_equipe_has_equipe_equipe2` FOREIGN KEY (`equipe_id1`) REFERENCES `equipe` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_match_competition1` FOREIGN KEY (`competition_id`) REFERENCES `competition` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_match_stade1` FOREIGN KEY (`stade_id`) REFERENCES `stade` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `poste`
--
ALTER TABLE `poste`
  ADD CONSTRAINT `fk_poste_departement1` FOREIGN KEY (`departement_id`) REFERENCES `departement` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`type_produit`) REFERENCES `type_produit` (`id_type`);

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `fk_internaute_has_billet_billet1` FOREIGN KEY (`billet_id_billet`) REFERENCES `billet` (`id_billet`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_internaute_has_billet_internaute1` FOREIGN KEY (`internaute_id_internaute`) REFERENCES `internaute` (`id_internaute`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
