-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 01 Septembre 2016 à 13:07
-- Version du serveur :  5.6.26
-- Version de PHP :  5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `kwatahelyfdigit`
--

-- --------------------------------------------------------

--
-- Structure de la table `kh_pub`
--

CREATE TABLE IF NOT EXISTS `kh_pub` (
  `id_pub` int(11) NOT NULL,
  `img_pub` varchar(50) NOT NULL DEFAULT 'pub.png',
  `text_pub` text,
  `statut` int(11) NOT NULL DEFAULT '0',
  `id_kh_ville_fk` int(11) NOT NULL,
  `id_kh_kwata_fk` int(11) NOT NULL,
  `id_kh_secto_fk` int(11) NOT NULL,
  `id_kh_user_fk` int(11) NOT NULL,
  `id_kh_metier_fk` int(11) DEFAULT NULL,
  `date_deb` varchar(255) NOT NULL,
  `date_fin` varchar(255) NOT NULL,
  `audience` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `priorite` int(11) NOT NULL DEFAULT '1',
  `url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `kh_pub`
--

INSERT INTO `kh_pub` (`id_pub`, `img_pub`, `text_pub`, `statut`, `id_kh_ville_fk`, `id_kh_kwata_fk`, `id_kh_secto_fk`, `id_kh_user_fk`, `id_kh_metier_fk`, `date_deb`, `date_fin`, `audience`, `prix`, `priorite`, `url`) VALUES
(1, 'pubdigit.jpg', 'E-Marketing, Développement web, Développement mobile, Community Management\nwww.digit-experts.com', 1, 0, 0, 0, 0, NULL, '0000-00-00', '0000-00-00', 0, 0, 1, ''),
(3, 'pub072016121228.jpg', NULL, 0, 6, 13, 33, 0, 26, '0000-00-00', '0000-00-00', 450, 4500, 1, ''),
(4, 'pub072016121620.jpg', 'hjhvjhvjhvhkvhk', 0, 74, 126, 42, 0, 70, '0000-00-00', '0000-00-00', 1000, 10000, 1, ''),
(5, 'pub072016133351.jpg', NULL, 0, 10, 24, 26, 0, 31, '0000-00-00', '0000-00-00', 4509, 45090, 1, ''),
(6, 'pub072016133556.jpg', NULL, 0, 11, 11, 29, 0, 26, '0000-00-00', '0000-00-00', 450, 4500, 1, ''),
(7, 'pub072016133814.jpg', NULL, 0, 11, 11, 29, 0, 26, '0000-00-00', '0000-00-00', 450, 4500, 1, ''),
(8, 'pub072016135742.jpg', NULL, 0, 23, 107, 19, 0, 24, '0000-00-00', '0000-00-00', 2300, 23000, 1, ''),
(9, 'pub072016104200.jpg', NULL, 0, 18, 11, 33, 0, 15, '07/23/2016', '07/31/2016', 450, 4500, 1, ''),
(10, 'pub082016134404.jpg', 'hg', 0, 11, 9, 17, 0, 18, '2016-08-25', '2016-08-31', 2340, 23400, 1, ''),
(11, 'pub082016134737.jpg', 'hg', 0, 11, 9, 17, 0, 18, '2016-08-25', '2016-08-31', 2340, 23400, 1, ''),
(12, 'pub082016141951.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 0, 12, 9, 28, 1, 11, '2016-08-25', '2016-08-31', 1250, 12500, 1, ''),
(13, 'pub082016121627.jpg', NULL, 0, 47, 94, 7, 4, 92, '2016-08-26', '2016-08-31', 1000, 10000, 1, NULL),
(14, 'pub082016121708.jpg', NULL, 0, 47, 94, 7, 4, 92, '2016-08-26', '2016-08-31', 1000, 10000, 1, NULL),
(15, 'pub082016121948.jpg', NULL, 0, 47, 94, 7, 4, 92, '2016-08-26', '2016-08-31', 1000, 10000, 1, NULL),
(16, 'pub082016122945.jpg', NULL, 0, 47, 94, 7, 4, 92, '2016-08-26', '2016-08-31', 1000, 10000, 1, NULL),
(17, 'pub082016123034.jpg', NULL, 0, 47, 94, 7, 4, 92, '2016-08-26', '2016-08-31', 1000, 10000, 1, NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `kh_pub`
--
ALTER TABLE `kh_pub`
  ADD PRIMARY KEY (`id_pub`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `kh_pub`
--
ALTER TABLE `kh_pub`
  MODIFY `id_pub` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
