-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 01 Septembre 2016 à 13:34
-- Version du serveur :  5.6.26
-- Version de PHP :  5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `kwatahelpdigit`
--

-- --------------------------------------------------------

--
-- Structure de la table `kh_user`
--

CREATE TABLE IF NOT EXISTS `kh_user` (
  `id_user` int(11) NOT NULL,
  `nom_user` varchar(20) DEFAULT NULL,
  `prenom` varchar(30) DEFAULT NULL,
  `pseudo` varchar(25) DEFAULT NULL,
  `telephone` int(15) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `secto` varchar(45) NOT NULL,
  `kh_metier_id` int(11) DEFAULT NULL,
  `kh_kwata_id` int(11) DEFAULT NULL,
  `type_user` int(1) DEFAULT '1',
  `type_compte` int(1) DEFAULT '1',
  `statut` int(1) DEFAULT '1',
  `avatar` varchar(255) DEFAULT 'avatar.png',
  `langue` int(2) DEFAULT NULL,
  `kh_secto_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4461 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `kh_user`
--

INSERT INTO `kh_user` (`id_user`, `nom_user`, `prenom`, `pseudo`, `telephone`, `password`, `email`, `secto`, `kh_metier_id`, `kh_kwata_id`, `type_user`, `type_compte`, `statut`, `avatar`, `langue`, `kh_secto_id`) VALUES
(4166, NULL, NULL, 'zebaze martial', 677547952, '1234', NULL, 'Bonambape', 156, 131, 1, 1, 1, 'avatar.png', NULL, NULL),
(4167, NULL, NULL, 'tiatse achille', 679753346, '1234', NULL, 'Bonambape', 34, 131, 1, 1, 1, 'avatar.png', NULL, NULL),
(4168, NULL, NULL, 'Tagalong Patrick', 656475409, '1234', NULL, 'Bonambape', 203, 131, 1, 1, 1, 'avatar.png', NULL, NULL),
(4169, NULL, NULL, 'Mbogning Nona', 674648180, '1234', NULL, 'Bonambape', 13, 131, 1, 1, 1, 'avatar.png', NULL, NULL),
(4170, NULL, NULL, 'JOSUE KAMENI', 694191788, '1234', NULL, 'Avant Grand Baobab', 78, 154, 1, 1, 1, 'avatar.png', NULL, NULL),
(4171, NULL, NULL, 'GHISLAIN FONGOH', 676934810, '1234', NULL, 'Avant Grand Baobab', 193, 154, 1, 1, 1, 'avatar.png', NULL, NULL),
(4172, NULL, NULL, 'MIENGUE CONSTANT', 675344820, '1234', NULL, 'Avant Grand Baobab', 18, 154, 1, 1, 1, 'avatar.png', NULL, NULL),
(4173, NULL, NULL, 'LE Diamant blanc', 677740170, '1234', NULL, 'Centre Caisse', 178, 154, 1, 1, 1, 'avatar.png', NULL, NULL),
(4174, NULL, NULL, 'NAFACK STEPHANE', 651360379, '1234', NULL, 'Centre Caisse', 55, 154, 1, 1, 1, 'avatar.png', NULL, NULL);
INSERT INTO `kh_user` (`id_user`, `nom_user`, `prenom`, `pseudo`, `telephone`, `password`, `email`, `secto`, `kh_metier_id`, `kh_kwata_id`, `type_user`, `type_compte`, `statut`, `avatar`, `langue`, `kh_secto_id`) VALUES
(4175, NULL, NULL, 'NTUI VALERY', 674758481, '1234', NULL, 'Centre Caisse', 49, 154, 1, 1, 1, 'avatar.png', NULL, NULL),
(4176, NULL, NULL, 'VU NUS CAM', 656679313, '1234', NULL, 'Centre Caisse', 49, 154, 1, 1, 1, 'avatar.png', NULL, NULL),
(4177, NULL, NULL, 'NKONGH VICTOR', 675112804, '1234', NULL, 'Centre Caisse', 210, 154, 1, 1, 1, 'avatar.png', NULL, NULL),
(4178, NULL, NULL, 'EWOUDOU ESSE', 694815293, '1234', NULL, 'Panneaux STOP', 34, 154, 1, 1, 1, 'avatar.png', NULL, NULL),
(4179, NULL, NULL, 'YAMI JUBRINE', 671125226, '1234', NULL, 'Panneaux STOP', 47, 154, 1, 1, 1, 'avatar.png', NULL, NULL),
(4180, NULL, NULL, 'CATHY COIFFURE', 693361987, '1234', NULL, 'Panneaux STOP', 13, 154, 1, 1, 1, 'avatar.png', NULL, NULL),
(4181, NULL, NULL, 'EMMANUEL', 660579552, '1234', NULL, 'Panneaux STOP', 13, 154, 1, 1, 1, 'avatar.png', NULL, NULL),
(4182, NULL, NULL, 'SWAG HOUZE', 675002649, '1234', NULL, 'Panneaux STOP', 13, 154, 1, 1, 1, 'avatar.png', NULL, NULL),
(4183, NULL, NULL, 'MBAKOP', 674023549, '1234', NULL, 'Panneaux STOP', 17, 154, 1, 1, 1, 'avatar.png', NULL, NULL),
(4184, NULL, NULL, 'KING SOUDURE', 677056918, '1234', NULL, 'Panneaux STOP', 84, 154, 1, 1, 1, 'avatar.png', NULL, NULL),
(4185, NULL, NULL, 'STELLA SHOPPING', 674147976, '1234', NULL, 'Panneaux STOP', 9, 154, 1, 1, 1, 'avatar.png', NULL, NULL),
(4186, NULL, NULL, 'CLIM FROID', 677860076, '1234', NULL, 'Panneaux STOP', 18, 154, 1, 1, 1, 'avatar.png', NULL, NULL),
(4187, NULL, NULL, 'DICKO TOUBE', 675213564, '1234', NULL, 'Carrefour Roi BELL', 202, 138, 1, 1, 1, 'avatar.png', NULL, NULL),
(4188, NULL, NULL, 'JIMMY', 677169550, '1234', NULL, 'Carrefour Roi BELL', 156, 138, 1, 1, 1, 'avatar.png', NULL, NULL),
(4189, NULL, NULL, 'CLARK FASHION', 691328667, '1234', NULL, 'Carrefour Roi BELL', 178, 138, 1, 1, 1, 'avatar.png', NULL, NULL),
(4190, NULL, NULL, 'EMMA & SONS', 677138343, '1234', NULL, 'Carrefour Roi BELL', 193, 138, 1, 1, 1, 'avatar.png', NULL, NULL),
(4191, NULL, NULL, 'GASTBY', 691664448, '1234', NULL, 'Carrefour Roi BELL', 56, 138, 1, 1, 1, 'avatar.png', NULL, NULL),
(4192, NULL, NULL, 'TAPISSIER IGOR', 675906771, '1234', NULL, 'Carrefour Roi BELL', 57, 138, 1, 1, 1, 'avatar.png', NULL, NULL),
(4193, NULL, NULL, 'LAMOT''S FASHION', 694316635, '1234', NULL, 'Carrefour Roi BELL', 9, 138, 1, 1, 1, 'avatar.png', NULL, NULL),
(4194, NULL, NULL, 'PATERSON', 674862783, '1234', NULL, 'Panneaux STOP', 249, 154, 1, 1, 1, 'avatar.png', NULL, NULL),
(4195, NULL, NULL, 'LE PLOMBIER', 677109020, '1234', NULL, 'Carrefour Roi BELL', 250, 138, 1, 1, 1, 'avatar.png', NULL, NULL),
(4252, NULL, NULL, 'tume meg', 678496119, '1234', NULL, '', 1, 143, 1, 1, 1, 'avatar.png', NULL, NULL),
(4253, NULL, NULL, 'olivier', 676539548, '1234', NULL, '', 1, 143, 1, 1, 1, 'avatar.png', NULL, NULL),
(4254, NULL, NULL, 'maison des parres brise', 677502739, '1234', NULL, '', 1, 143, 1, 1, 1, 'avatar.png', NULL, NULL),
(4255, NULL, NULL, 'nobisse dieudonne', 670351998, '1234', NULL, '', 1, 140, 1, 1, 1, 'avatar.png', NULL, NULL),
(4256, NULL, NULL, 'djona justn', 675201174, '1234', NULL, '', 1, 140, 1, 1, 1, 'avatar.png', NULL, NULL),
(4257, NULL, NULL, 'antoine', 675961901, '1234', NULL, '', 1, 140, 1, 1, 1, 'avatar.png', NULL, NULL),
(4258, NULL, NULL, 'jean', 675444570, '1234', NULL, '', 1, 140, 1, 1, 1, 'avatar.png', NULL, NULL),
(4259, NULL, NULL, 'eric', 679495459, '1234', NULL, '', 1, 140, 1, 1, 1, 'avatar.png', NULL, NULL),
(4260, NULL, NULL, 'john', 671653050, '1234', NULL, '', 1, 140, 1, 1, 1, 'avatar.png', NULL, NULL),
(4261, NULL, NULL, 'kankan', 678167830, '1234', NULL, '', 1, 140, 1, 1, 1, 'avatar.png', NULL, NULL),
(4262, NULL, NULL, 'isuzu', 676040710, '1234', NULL, '', 1, 140, 1, 1, 1, 'avatar.png', NULL, NULL),
(4263, NULL, NULL, 'joseph', 674760648, '1234', NULL, '', 1, 140, 1, 1, 1, 'avatar.png', NULL, NULL),
(4264, NULL, NULL, 'joe bass', 675949648, '1234', NULL, '', 1, 140, 1, 1, 1, 'avatar.png', NULL, NULL),
(4265, NULL, NULL, 'brenda', 683281981, '1234', NULL, '', 1, 140, 1, 1, 1, 'avatar.png', NULL, NULL),
(4266, NULL, NULL, 'pe bolengo', 677442245, '1234', NULL, '', 1, 140, 1, 1, 1, 'avatar.png', NULL, NULL),
(4267, NULL, NULL, 'mike', 677241484, '1234', NULL, '', 1, 140, 1, 1, 1, 'avatar.png', NULL, NULL),
(4268, NULL, NULL, 'dimitrole', 699995616, '1234', NULL, '', 1, 140, 1, 1, 1, 'avatar.png', NULL, NULL),
(4269, NULL, NULL, 'celestin', 677555839, '1234', NULL, '', 1, 140, 1, 1, 1, 'avatar.png', NULL, NULL),
(4270, NULL, NULL, 'cyprain', 699907187, '1234', NULL, '', 1, 140, 1, 1, 1, 'avatar.png', NULL, NULL),
(4271, NULL, NULL, 'D clerent', 696929084, '1234', NULL, '', 1, 140, 1, 1, 1, 'avatar.png', NULL, NULL),
(4272, NULL, NULL, 'quincaillerie', 23429708, '1234', NULL, '', 1, 140, 1, 1, 1, 'avatar.png', NULL, NULL),
(4273, NULL, NULL, 'tobiz auto mobile', 672393101, '1234', NULL, '', 1, 140, 1, 1, 1, 'avatar.png', NULL, NULL),
(4274, NULL, NULL, 'ngia kundu robert', 677849623, '1234', NULL, '', 1, 140, 1, 1, 1, 'avatar.png', NULL, NULL),
(4275, NULL, NULL, 'letrage publicitaie', 699771199, '1234', NULL, '', 1, 140, 1, 1, 1, 'avatar.png', NULL, NULL),
(4276, NULL, NULL, 'Berthen', 651714578, '1234', NULL, 'carrefour Defosto pres de rico', 1, 32, 1, 1, 1, 'avatar.png', NULL, NULL),
(4277, NULL, NULL, 'Talefam', 678289353, '1234', NULL, 'carrefour Defosto pres de rico', 168, 32, 1, 1, 1, 'avatar.png', NULL, NULL),
(4278, NULL, NULL, 'eric photo', 699852296, '1234', NULL, 'carrefour Defosto pres de rico', 11, 32, 1, 1, 1, 'avatar.png', NULL, NULL),
(4279, NULL, NULL, 'emirates', 650752685, '1234', NULL, 'carrefour Defosto pres de rico', 19, 32, 1, 1, 1, 'avatar.png', NULL, NULL),
(4280, NULL, NULL, 'Honorable', 677802882, '1234', NULL, 'carrefour Defosto pres de rico', 13, 32, 1, 1, 1, 'avatar.png', NULL, NULL),
(4281, NULL, NULL, 'Lipabes', 699520499, '1234', NULL, 'carrefour Defosto pres de rico', 152, 32, 1, 1, 1, 'avatar.png', NULL, NULL),
(4282, NULL, NULL, 'jovani', 679976232, '1234', NULL, 'carrefour Defosto pres de rico', 1, 32, 1, 1, 1, 'avatar.png', NULL, NULL),
(4283, NULL, NULL, 'Dash fashion', 677243911, '1234', NULL, 'carrefour Defosto pres de rico', 153, 32, 1, 1, 1, 'avatar.png', NULL, NULL),
(4284, NULL, NULL, 'sergio', 699119392, '1234', NULL, 'carrefour Defosto pres de rico', 1, 32, 1, 1, 1, 'avatar.png', NULL, NULL),
(4285, NULL, NULL, 'pierro', 677130728, '1234', NULL, 'carrefour Defosto pres de rico', 1, 32, 1, 1, 1, 'avatar.png', NULL, NULL),
(4286, NULL, NULL, 'honorine', 674738013, '1234', NULL, 'carrefour Defosto pres de rico', 153, 32, 1, 1, 1, 'avatar.png', NULL, NULL),
(4287, NULL, NULL, 'lili fashion', 677376822, '1234', NULL, 'carrefour Defosto pres de rico', 144, 32, 1, 1, 1, 'avatar.png', NULL, NULL),
(4288, NULL, NULL, 'Christ neh', 675411128, '1234', NULL, 'carrefour Defosto pres de rico', 13, 32, 1, 1, 1, 'avatar.png', NULL, NULL),
(4289, NULL, NULL, 'Nyam paul', 676478798, '1234', NULL, 'carrefour pasteur', 193, 32, 1, 1, 1, 'avatar.png', NULL, NULL),
(4290, NULL, NULL, 'chigaelle', 677342089, '1234', NULL, 'carrefour pasteur', 153, 32, 1, 1, 1, 'avatar.png', NULL, NULL),
(4291, NULL, NULL, 'herve wonda', 674432488, '1234', NULL, 'carrefour pasteur', 1, 32, 1, 1, 1, 'avatar.png', NULL, NULL),
(4292, NULL, NULL, 'Toudeu george', 679771515, '1234', NULL, 'carrefour pasteur', 1, 32, 1, 1, 1, 'avatar.png', NULL, NULL),
(4293, NULL, NULL, 'Junior auto', 673338330, '1234', NULL, 'boulangerie de la paix', 168, 32, 1, 1, 1, 'avatar.png', NULL, NULL),
(4294, NULL, NULL, 'Florentine', 650509212, '1234', NULL, 'boulangerie de la paix', 153, 32, 1, 1, 1, 'avatar.png', NULL, NULL),
(4295, NULL, NULL, 'Super', 693010609, '1234', NULL, 'boulangerie de la paix', 168, 32, 1, 1, 1, 'avatar.png', NULL, NULL),
(4296, NULL, NULL, 'Naomi andruth', 674950384, '1234', NULL, 'boulangerie de la paix', 144, 32, 1, 1, 1, 'avatar.png', NULL, NULL),
(4297, NULL, NULL, 'blaise armand', 671879121, '1234', NULL, 'boulangerie de la paix', 1, 32, 1, 1, 1, 'avatar.png', NULL, NULL),
(4298, NULL, NULL, 'princess', 696302991, '1234', NULL, 'boulangerie de la paix', 153, 32, 1, 1, 1, 'avatar.png', NULL, NULL),
(4299, NULL, NULL, 'Ngocheu', 672069234, '1234', NULL, 'boulangerie de la paix', 208, 32, 1, 1, 1, 'avatar.png', NULL, NULL),
(4300, NULL, NULL, 'Frank', 676340194, '1234', NULL, 'boulangerie de la paix', 193, 32, 1, 1, 1, 'avatar.png', NULL, NULL),
(4301, NULL, NULL, 'fabrice', 678309366, '1234', NULL, 'boulangerie de la paix', 208, 32, 1, 1, 1, 'avatar.png', NULL, NULL),
(4302, NULL, NULL, 'Mirielle', 694472255, '1234', NULL, 'boulangerie de la paix', 13, 32, 1, 1, 1, 'avatar.png', NULL, NULL),
(4303, NULL, NULL, 'william airforce', 650509851, '1234', NULL, 'panneau stop', 25, 36, 1, 1, 1, 'avatar.png', NULL, 25),
(4304, NULL, NULL, 'boucharo', 656131558, '1234', NULL, '', 25, 26, 1, 1, 1, 'avatar.png', NULL, NULL),
(4305, NULL, NULL, 'ebenye lydie', 696207747, '1234', NULL, 'bonamikano', 14, 11, 1, 1, 1, 'avatar.png', NULL, 7),
(4306, NULL, NULL, 'bobystar', 699811489, '1234', NULL, '', NULL, NULL, 1, 1, 1, 'avatar.png', NULL, 7),
(4307, NULL, NULL, 'francis', 670215437, '1234', NULL, '', 35, 7, 1, 1, 1, 'avatar.png', NULL, 8),
(4308, NULL, NULL, 'poula francis', 652003936, '1234', NULL, 'bonamikano', NULL, 7, 1, 1, 1, 'avatar.png', NULL, 15),
(4309, NULL, NULL, 'le grand metal', 673333092, '1234', NULL, 'bonamikano', 77, 7, 1, 1, 1, 'avatar.png', NULL, NULL),
(4310, NULL, NULL, 'embolo georges', 690191149, '1234', NULL, 'bonamikano', 4, 7, 1, 1, 1, 'avatar.png', NULL, NULL),
(4311, NULL, NULL, 'nomo bengono', 695326633, '1234', NULL, 'bonamikano', 55, 7, 1, 1, 1, 'avatar.png', NULL, NULL),
(4312, NULL, NULL, 'perla coiffure', 679913075, '1234', NULL, 'bonamikano', 74, 7, 1, 1, 1, 'avatar.png', NULL, NULL),
(4313, NULL, NULL, 'ebene ebongue', 675899793, '1234', NULL, 'bonamikano', 55, 7, 1, 1, 1, 'avatar.png', NULL, NULL),
(4314, NULL, NULL, 'bona paolo', 694902790, '1234', NULL, 'bonamikano', 66, 7, 1, 1, 1, 'avatar.png', NULL, NULL),
(4315, NULL, NULL, 'helena', 673385334, '1234', NULL, 'bonamikano', NULL, 7, 1, 1, 1, 'avatar.png', NULL, NULL),
(4316, NULL, NULL, 'asongmbu', 674670930, '1234', NULL, 'bonamikano', 23, 7, 1, 1, 1, 'avatar.png', NULL, NULL),
(4317, NULL, NULL, 'etel ngomba', 67, NULL, NULL, '', NULL, NULL, 1, 1, 1, 'avatar.png', NULL, NULL),
(4318, NULL, NULL, 'c larissa', 676678210, '1234', NULL, 'bonamikano', 33, 7, 1, 1, 1, 'avatar.png', NULL, NULL),
(4319, NULL, NULL, 'elle et lui', 676599570, NULL, NULL, 'bonamikano', 36, 7, 1, 1, 1, 'avatar.png', NULL, NULL),
(4320, NULL, NULL, 'essang cedric', 676522485, '1234', NULL, 'bonamikano', 11, 7, 1, 1, 1, 'avatar.png', NULL, NULL),
(4321, NULL, NULL, 'bambay samuel', 695764400, '1234', NULL, 'bonamikano', 22, 7, 1, 1, 1, 'avatar.png', NULL, NULL),
(4322, NULL, NULL, 'maurice', 676332432, '1234', NULL, 'bonamikano', NULL, 7, 1, 1, 1, 'avatar.png', NULL, NULL),
(4323, NULL, NULL, 'nkongho charles', 675102552, '1234', NULL, 'bonamikano', NULL, 7, 1, 1, 1, 'avatar.png', NULL, NULL),
(4324, NULL, NULL, 'mbuityson', 651416500, '1234', NULL, 'bonamikano', NULL, 7, 1, 1, 1, 'avatar.png', NULL, NULL),
(4325, NULL, NULL, 'jean', 679737956, '1234', NULL, 'bonamikano', NULL, 7, 1, 1, 1, 'avatar.png', NULL, NULL),
(4326, NULL, NULL, 'christophe', 674470500, '1234', NULL, 'bonamikano', NULL, 7, 1, 1, 1, 'avatar.png', NULL, NULL),
(4327, NULL, NULL, 'solo mixt', 677176269, '1234', NULL, 'bonamikano', NULL, NULL, 1, 1, 1, 'avatar.png', NULL, NULL),
(4328, NULL, NULL, 'ngueyo rose', 678022590, '1234', NULL, 'bonamikano', NULL, 7, 1, 1, 1, 'avatar.png', NULL, NULL),
(4329, NULL, NULL, 'anas center', 695851632, '1234', NULL, 'FACE MARIE', 1, 7, 1, 1, 1, 'avatar.png', NULL, NULL),
(4330, NULL, NULL, 'anas center', 695851632, '1234', NULL, 'FACE MARIE', 1, 7, 1, 1, 1, 'avatar.png', NULL, NULL),
(4331, NULL, NULL, 'anas center', 695851632, '1234', NULL, 'FACE MARIE', 1, 7, 1, 1, 1, 'avatar.png', NULL, NULL),
(4332, NULL, NULL, 'GERMANY', 699665920, '1234', NULL, 'FACE MARIE', 1, 7, 1, 1, 1, 'avatar.png', NULL, NULL),
(4333, NULL, NULL, 'NATHALIE', 694206884, '1234', NULL, 'FACE MARIE', 1, 7, 1, 1, 1, 'avatar.png', NULL, NULL),
(4334, NULL, NULL, 'POLINA DIBIGN', 670851970, '1234', NULL, 'FACE MARIE', 1, 7, 1, 1, 1, 'avatar.png', NULL, NULL),
(4335, NULL, NULL, 'FIROT GLASS', 633785245, '1234', NULL, 'FACE MARIE', 1, 7, 1, 1, 1, 'avatar.png', NULL, NULL),
(4336, NULL, NULL, 'KOSSA BOIS', 699380722, '1234', NULL, 'FACE MARIE', 1, 7, 1, 1, 1, 'avatar.png', NULL, NULL),
(4337, NULL, NULL, 'TIKOTTO ALEX', 698917089, '1234', NULL, 'FACE MARIE', 1, 7, 1, 1, 1, 'avatar.png', NULL, NULL),
(4338, NULL, NULL, 'JOSEPHINE', 679439340, '1234', NULL, 'FACE MARIE', 1, 7, 1, 1, 1, 'avatar.png', NULL, NULL),
(4339, NULL, NULL, 'FATOU FASHION', 695244537, '1234', NULL, 'FACE MARIE', 1, 7, 1, 1, 1, 'avatar.png', NULL, NULL),
(4340, NULL, NULL, 'YANNICK', 670077774, '1234', NULL, 'CARREFOUR MACON', 1, 7, 1, 1, 1, 'avatar.png', NULL, NULL),
(4341, NULL, NULL, 'KADEM JULES', 677437025, '1234', NULL, 'CARREFOUR MACON', 1, 7, 1, 1, 1, 'avatar.png', NULL, NULL),
(4342, NULL, NULL, 'FREDERIC LEBEH', 676922698, '1234', NULL, 'CARREFOUR MACON', 1, 7, 1, 1, 1, 'avatar.png', NULL, NULL),
(4343, NULL, NULL, 'CHAMPION', 699937546, '1234', NULL, 'CARREFOUR MACON', 1, 7, 1, 1, 1, 'avatar.png', NULL, NULL),
(4344, NULL, NULL, 'JAMES TELECOM', 695025250, '1234', NULL, 'CARREFOUR MACON', 1, 7, 1, 1, 1, 'avatar.png', NULL, NULL),
(4345, NULL, NULL, 'ODILIA PRESSING', 694400952, '1234', NULL, 'CARREFOUR MACON', 1, 7, 1, 1, 1, 'avatar.png', NULL, NULL),
(4346, NULL, NULL, 'JOSEPHA', 677966019, '1234', NULL, 'CARREFOUR MACON', 1, 7, 1, 1, 1, 'avatar.png', NULL, NULL),
(4347, NULL, NULL, 'CRIZA SHOPPING', 677020112, '1234', NULL, 'CARREFOUR ETO''O', 1, 7, 1, 1, 1, 'avatar.png', NULL, NULL),
(4348, NULL, NULL, 'SASSY DECO', 673488881, '1234', NULL, 'CARREFOUR ETO''O', 1, 7, 1, 1, 1, 'avatar.png', NULL, NULL),
(4349, NULL, NULL, 'RISTANNY', 670196387, '1234', NULL, 'CARREFOUR ETO''O', 1, 7, 1, 1, 1, 'avatar.png', NULL, NULL),
(4350, NULL, NULL, 'CARINE BEAUTE', 675136256, '1234', NULL, 'CARREFOUR ETO''O', 1, 7, 1, 1, 1, 'avatar.png', NULL, NULL),
(4351, NULL, NULL, 'CHICO CLIM', 674638847, '1234', NULL, 'CARREFOUR ETO''O', 1, 7, 1, 1, 1, 'avatar.png', NULL, NULL),
(4352, NULL, NULL, 'MARIE CHARLOTTE', 695795566, '1234', NULL, 'CARREFOUR ETO''O', 1, 7, 1, 1, 1, 'avatar.png', NULL, NULL),
(4353, NULL, NULL, 'UNTELHO', 677961016, '1234', NULL, 'CARREFOUR ETO''O', 1, 7, 1, 1, 1, 'avatar.png', NULL, NULL),
(4354, NULL, NULL, 'MIGUELO', 677579378, '1234', NULL, 'CARREFOUR ETO''O', 1, 7, 1, 1, 1, 'avatar.png', NULL, NULL),
(4355, NULL, NULL, 'PABLO', 650650065, '1234', NULL, 'CARREFOUR ETO''O', 1, 7, 1, 1, 1, 'avatar.png', NULL, NULL),
(4356, NULL, NULL, 'PATOU FASHION', 677100605, '1234', NULL, 'CARREFOUR ETO''O', 1, 7, 1, 1, 1, 'avatar.png', NULL, NULL),
(4357, NULL, NULL, 'FAC FASHION', 652635830, '1234', NULL, 'CARREFOUR ETO''O', 1, 7, 1, 1, 1, 'avatar.png', NULL, NULL),
(4358, NULL, NULL, 'SOFT FASHION', 699314285, '1234', NULL, 'CARREFOUR ETO''O', 1, 7, 1, 1, 1, 'avatar.png', NULL, NULL),
(4359, NULL, NULL, 'UNIVERS FROID ET CLIM', 652635830, '1234', NULL, 'CARREFOUR ETO''O', 1, 7, 1, 1, 1, 'avatar.png', NULL, NULL),
(4360, NULL, NULL, 'TAKAM', 691829421, '1234', NULL, 'total Bessengue', 119, 17, 1, 1, 1, 'avatar.png', NULL, NULL),
(4361, NULL, NULL, 'Joel', 699904675, '1234', NULL, 'total Bessengue', 63, 17, 1, 1, 1, 'avatar.png', NULL, NULL),
(4362, NULL, NULL, 'Mariame', 697013177, '1234', NULL, 'total Bessengue', 77, 17, 1, 1, 1, 'avatar.png', NULL, NULL),
(4363, NULL, NULL, 'Mohamed', 694443064, '1234', NULL, 'total Bessengue', 119, 17, 1, 1, 1, 'avatar.png', NULL, NULL),
(4364, NULL, NULL, 'Vidram', 696856108, '1234', NULL, 'total Bessengue', 179, 17, 1, 1, 1, 'avatar.png', NULL, NULL),
(4365, NULL, NULL, 'Yves', 697068949, '1234', NULL, 'total Bessengue', 246, 17, 1, 1, 1, 'avatar.png', NULL, NULL),
(4366, NULL, NULL, 'Nyame', 655109893, '1234', NULL, 'total Bessengue', 179, 17, 1, 1, 1, 'avatar.png', NULL, NULL),
(4367, NULL, NULL, 'Sunny', 672117498, '1234', NULL, 'total Bessengue', 91, 17, 1, 1, 1, 'avatar.png', NULL, NULL),
(4368, NULL, NULL, 'Tessie', 669212604, '1234', NULL, 'total Bessengue', 49, 17, 1, 1, 1, 'avatar.png', NULL, NULL),
(4369, NULL, NULL, 'Wisdom', 677853842, '1234', NULL, 'total Bessengue', 61, 17, 1, 1, 1, 'avatar.png', NULL, NULL),
(4370, NULL, NULL, 'Divine', 677791571, '1234', NULL, 'total Bessengue', 167, 153, 1, 1, 1, 'avatar.png', NULL, NULL),
(4371, NULL, NULL, 'Ets DOMAC', 699571260, '1234', NULL, 'total Bessengue', 214, 153, 1, 1, 1, 'avatar.png', NULL, NULL),
(4372, NULL, NULL, 'Laverie Moderne', 694698254, '1234', NULL, 'total Bessengue', 239, 153, 1, 1, 1, 'avatar.png', NULL, NULL),
(4373, NULL, NULL, 'Lifelec', 695239495, '1234', NULL, 'total Bessengue', 207, 153, 1, 1, 1, 'avatar.png', NULL, NULL),
(4374, NULL, NULL, 'Keba', 233472449, '1234', NULL, 'total Bessengue', 36, 153, 1, 1, 1, 'avatar.png', NULL, NULL),
(4375, NULL, NULL, 'JCM', 679738550, '1234', NULL, 'total Bessengue', 210, 153, 1, 1, 1, 'avatar.png', NULL, NULL),
(4376, NULL, NULL, 'Clement', 679953836, '1234', NULL, 'total Bessengue', 120, 153, 1, 1, 1, 'avatar.png', NULL, NULL),
(4377, NULL, NULL, 'Mike', 651158786, '1234', NULL, 'total Bessengue', 232, 153, 1, 1, 1, 'avatar.png', NULL, NULL),
(4378, NULL, NULL, 'Yvette', 698620499, '1234', NULL, 'total Bessengue', 54, 153, 1, 1, 1, 'avatar.png', NULL, NULL),
(4379, NULL, NULL, 'Colba', 670287698, '1234', NULL, 'total Bessengue', 55, 153, 1, 1, 1, 'avatar.png', NULL, NULL),
(4380, NULL, NULL, 'Pa Tagni', 693532728, '1234', NULL, 'total Bessengue', 88, 153, 1, 1, 1, 'avatar.png', NULL, NULL),
(4381, NULL, NULL, 'BillyShoo', 678847334, '1234', NULL, 'total Bessengue', 13, 153, 1, 1, 1, 'avatar.png', NULL, NULL),
(4382, NULL, NULL, 'Victoire', 677740010, '1234', NULL, 'Rond Point Village', 17, 3, 1, 1, 1, 'avatar.png', NULL, NULL),
(4383, NULL, NULL, 'Salim', 674841480, '1234', NULL, 'Rond Point Village', 145, 3, 1, 1, 1, 'avatar.png', NULL, NULL),
(4384, NULL, NULL, 'Cama Auto', 674293983, '1234', NULL, 'Rond Point Village', 83, 3, 1, 1, 1, 'avatar.png', NULL, NULL),
(4385, NULL, NULL, 'Sumy Auto', 650720314, '1234', NULL, 'Rond Point Village', 83, 3, 1, 1, 1, 'avatar.png', NULL, NULL),
(4386, NULL, NULL, 'Bache-Pro', 693456643, '1234', NULL, 'Rond Point Village', 136, 3, 1, 1, 1, 'avatar.png', NULL, NULL),
(4387, NULL, NULL, 'La Fleur', 670303151, '1234', NULL, 'Rond Point Village', 77, 3, 1, 1, 1, 'avatar.png', NULL, NULL),
(4388, NULL, NULL, 'La maison du fer', 679755753, '1234', NULL, 'Rond Point Village', 84, 3, 1, 1, 1, 'avatar.png', NULL, NULL),
(4389, NULL, NULL, 'Yvonne', 682812480, '1234', NULL, 'Rond Point Village', 50, 3, 1, 1, 1, 'avatar.png', NULL, NULL),
(4390, NULL, NULL, 'L''univers des eleveurs', 656066729, '1234', NULL, 'Rond Point Village', 62, 3, 1, 1, 1, 'avatar.png', NULL, NULL),
(4391, NULL, NULL, 'Steve', 678421740, '1234', NULL, 'Rond Point Village', 211, 3, 1, 1, 1, 'avatar.png', NULL, NULL),
(4392, NULL, NULL, 'Alu-Pro', 698770703, '1234', NULL, 'Rond Point Village', 86, 3, 1, 1, 1, 'avatar.png', NULL, NULL),
(4393, NULL, NULL, 'FAFOMA', 233150621, '1234', NULL, 'Rond Point Village', 44, 3, 1, 1, 1, 'avatar.png', NULL, NULL),
(4394, NULL, NULL, 'Le Bien Etre', 699545882, '1234', NULL, 'Rond Point Village', 77, 3, 1, 1, 1, 'avatar.png', NULL, NULL),
(4395, NULL, NULL, 'Nadege', 675134632, '1234', NULL, 'Rond Point Village', 202, 3, 1, 1, 1, 'avatar.png', NULL, NULL),
(4396, NULL, NULL, 'Desy', 698914359, '1234', NULL, 'Rond Point Village', 11, 3, 1, 1, 1, 'avatar.png', NULL, NULL),
(4397, NULL, NULL, 'Le Bonheur', 675176049, '1234', NULL, 'Entree Bir', 50, 3, 1, 1, 1, 'avatar.png', NULL, NULL),
(4398, NULL, NULL, 'EURO', 675338637, '1234', NULL, 'Entree Bir', 111, 3, 1, 1, 1, 'avatar.png', NULL, NULL),
(4399, NULL, NULL, 'Diamant', 679957551, '1234', NULL, 'Entree Bir', 77, 3, 1, 1, 1, 'avatar.png', NULL, NULL),
(4400, NULL, NULL, 'nelly', 674200021, '1234', NULL, 'Entree Bir', 15, 3, 1, 1, 1, 'avatar.png', NULL, NULL),
(4401, NULL, NULL, 'Authentique', 696084918, '1234', NULL, 'Entree Bir', 9, 3, 1, 1, 1, 'avatar.png', NULL, NULL),
(4402, NULL, NULL, 'Philip', 670679874, '1234', NULL, 'Entree Bir', 18, 3, 1, 1, 1, 'avatar.png', NULL, NULL),
(4403, NULL, NULL, 'Virtral', 691197248, '1234', NULL, 'Entree Bir', 67, 3, 1, 1, 1, 'avatar.png', NULL, NULL),
(4404, NULL, NULL, 'Elect''MA', 699858232, '1234', NULL, 'Entree Bir', 119, 3, 1, 1, 1, 'avatar.png', NULL, NULL),
(4405, NULL, NULL, 'Geric', 677512603, '1234', NULL, 'Entree Bir', 207, 3, 1, 1, 1, 'avatar.png', NULL, NULL),
(4406, NULL, NULL, 'Ma Mado', 695474377, '1234', NULL, 'Entree Bir', 83, 3, 1, 1, 1, 'avatar.png', NULL, NULL),
(4407, NULL, NULL, 'Picardie', 676174477, '1234', NULL, 'Entree Bir', 198, 3, 1, 1, 1, 'avatar.png', NULL, NULL),
(4408, NULL, NULL, 'Auto Ecole', 699594244, '1234', NULL, 'Entree Bir', 118, 3, 1, 1, 1, 'avatar.png', NULL, NULL),
(4409, NULL, NULL, 'Fast-food', 654410602, '1234', NULL, 'Entree Bir', 72, 3, 1, 1, 1, 'avatar.png', NULL, NULL),
(4410, NULL, NULL, 'Germinal', 654181597, '1234', NULL, 'Entree Bir', 32, 3, 1, 1, 1, 'avatar.png', NULL, NULL),
(4411, NULL, NULL, 'Princesse', 690573134, '1234', NULL, 'Entree Bir', 197, 3, 1, 1, 1, 'avatar.png', NULL, NULL),
(4412, NULL, NULL, 'akama judith', 675906285, '1234', NULL, '', 1, 144, 1, 1, 1, 'avatar.png', NULL, NULL),
(4413, NULL, NULL, 'moise', 670170101, '1234', NULL, '', 1, 144, 1, 1, 1, 'avatar.png', NULL, NULL),
(4414, NULL, NULL, 'koul', 670288657, '1234', NULL, '', 1, 144, 1, 1, 1, 'avatar.png', NULL, NULL),
(4415, NULL, NULL, 'groupe marcel investissem', NULL, '1234', NULL, '', 1, 144, 1, 1, 1, 'avatar.png', NULL, NULL),
(4416, NULL, NULL, 'ousman', 655281662, '1234', NULL, '', 1, 144, 1, 1, 1, 'avatar.png', NULL, NULL),
(4417, NULL, NULL, 'merlin', 676354968, '1234', NULL, '', 1, 144, 1, 1, 1, 'avatar.png', NULL, NULL),
(4418, NULL, NULL, 'berthin', 652291116, '1234', NULL, '', 1, 144, 1, 1, 1, 'avatar.png', NULL, NULL),
(4419, NULL, NULL, 'création le bel', 674043279, '1234', NULL, '', 1, 144, 1, 1, 1, 'avatar.png', NULL, NULL),
(4420, NULL, NULL, 'gladis armel', 696436627, '1234', NULL, '', 1, 144, 1, 1, 1, 'avatar.png', NULL, NULL),
(4421, 'les depenneurs ', 'reunis', 'les depreunis', 677940536, '1234', NULL, '', 1, 144, 1, 1, 1, 'avatar.png', NULL, NULL),
(4422, NULL, NULL, 'le français telecom', 678152761, '1234', NULL, '', 1, 144, 1, 1, 1, 'avatar.png', NULL, NULL),
(4423, NULL, '', 'minoue thomas', 654430838, '1234', NULL, '', 1, 144, 1, 1, 1, 'avatar.png', NULL, NULL),
(4424, NULL, NULL, 'sundayatajuh', 699982549, '1234', NULL, '', 1, 144, 1, 1, 1, 'avatar.png', NULL, NULL),
(4425, NULL, NULL, 'onyama david', 677405868, '1234', NULL, '', 1, 144, 1, 1, 1, 'avatar.png', NULL, NULL),
(4426, NULL, NULL, 'ebile', 654703770, '1234', NULL, '', 1, 144, 1, 1, 1, 'avatar.png', NULL, NULL),
(4427, NULL, NULL, 'itech consulting', 699575749, '1234', NULL, '', 1, 144, 1, 1, 1, 'avatar.png', NULL, NULL),
(4428, NULL, NULL, 'international games', 674071008, '1234', NULL, '', 1, 144, 1, 1, 1, 'avatar.png', NULL, NULL),
(4429, NULL, NULL, 'chofroeric', 690198813, '1234', NULL, '', 1, 144, 1, 1, 1, 'avatar.png', NULL, NULL),
(4430, NULL, '', 'sakho', 655281662, '1234', NULL, '', 1, 144, 1, 1, 1, 'avatar.png', NULL, NULL),
(4431, NULL, NULL, 'fotso', 654454240, '1234', NULL, '', 1, 144, 1, 1, 1, 'avatar.png', NULL, NULL),
(4432, NULL, NULL, 'gouloum jean', 697094517, '1234', NULL, '', 1, 144, 1, 1, 1, 'avatar.png', NULL, NULL),
(4433, NULL, NULL, 'auto ecole le soi', 679434453, '1234', NULL, '', 1, 144, 1, 1, 1, 'avatar.png', NULL, NULL),
(4434, NULL, NULL, 'christiane fashion', 697405078, '1234', NULL, '', 1, 144, 1, 1, 1, 'avatar.png', NULL, NULL),
(4435, NULL, NULL, 'alain', 676724454, '1234', NULL, '', 1, 144, 1, 1, 1, 'avatar.png', NULL, NULL),
(4436, NULL, NULL, 'nkit simon', 691335800, '1234', NULL, '', 1, 144, 1, 1, 1, 'avatar.png', NULL, NULL),
(4437, NULL, NULL, 'arnaud', 679103899, '1234', NULL, '', 1, 144, 1, 1, 1, 'avatar.png', NULL, NULL),
(4438, NULL, NULL, 'talla fidele', 671616081, '1234', NULL, '', 1, 144, 1, 1, 1, 'avatar.png', NULL, NULL),
(4439, NULL, NULL, 'kevin', 699053610, '1234', NULL, '', 1, 144, 1, 1, 1, 'avatar.png', NULL, NULL),
(4440, NULL, NULL, 'talla', 696229715, '1234', NULL, '', 1, 144, 1, 1, 1, 'avatar.png', NULL, NULL),
(4441, NULL, NULL, 'toukam stephane', 651185106, '1234', NULL, '', 1, 144, 1, 1, 1, 'avatar.png', NULL, NULL),
(4442, NULL, NULL, 'polistyl decor', 677805432, '1234', NULL, '', 1, 144, 1, 1, 1, 'avatar.png', NULL, NULL),
(4443, NULL, NULL, 'lybado librerie', 699736922, '1234', NULL, '', 1, 144, 1, 1, 1, 'avatar.png', NULL, NULL),
(4444, NULL, NULL, 'ado japan', 968355387, '1234', NULL, '', 1, 144, 1, 1, 1, 'avatar.png', NULL, NULL),
(4445, NULL, NULL, 'nathalie', 690460966, '1234', NULL, '', 1, 144, 1, 1, 1, 'avatar.png', NULL, NULL),
(4446, NULL, NULL, 'tendance beaute', 674407509, '1234', NULL, '', 1, 144, 1, 1, 1, 'avatar.png', NULL, NULL),
(4447, NULL, NULL, 'martin', 695104910, '1234', NULL, '', 1, 144, 1, 1, 1, 'avatar.png', NULL, NULL),
(4448, NULL, NULL, 'cathy', 675134509, '1234', NULL, '', 1, 144, 1, 1, 1, 'avatar.png', NULL, NULL),
(4449, NULL, NULL, 'krisia distribution', 679408268, '1234', NULL, '', 1, 144, 1, 1, 1, 'avatar.png', NULL, NULL),
(4450, NULL, NULL, 'baba', 679342318, '1234', NULL, '', 1, 144, 1, 1, 1, 'avatar.png', NULL, NULL),
(4451, NULL, NULL, 'royaum multimedia', 677070833, '1234', NULL, '', 1, 144, 1, 1, 1, 'avatar.png', NULL, NULL),
(4452, NULL, NULL, 'auto ecole brit', 677967400, '1234', NULL, '', 1, 144, 1, 1, 1, 'avatar.png', NULL, NULL),
(4453, NULL, NULL, 'la perfection', 677276731, '1234', NULL, '', 1, 144, 1, 1, 1, 'avatar.png', NULL, NULL),
(4454, NULL, NULL, 'le roche', 676387383, '1234', NULL, '', 1, 144, 1, 1, 1, 'avatar.png', NULL, NULL),
(4455, NULL, NULL, 'froid et climatisation', 699683148, '1234', NULL, '', 1, 144, 1, 1, 1, 'avatar.png', NULL, NULL),
(4456, NULL, NULL, 'da frie fachion', 697802284, '1234', NULL, '', 1, 144, 1, 1, 1, 'avatar.png', NULL, NULL),
(4457, NULL, NULL, 'paris mode', 679921445, '1234', NULL, '', 1, 144, 1, 1, 1, 'avatar.png', NULL, NULL),
(4458, NULL, NULL, 'vitrerie', 699925512, '1234', NULL, '', 1, 144, 1, 1, 1, 'avatar.png', NULL, NULL),
(4459, NULL, NULL, 'amerinan lottery', 678439355, '1234', NULL, '', 1, 144, 1, 1, 1, 'avatar.png', NULL, NULL),
(4460, NULL, NULL, 'nana', 676554792, '1234', NULL, '', 1, 144, 1, 1, 1, 'avatar.png', NULL, NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `kh_user`
--
ALTER TABLE `kh_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `fk_kh_user_kh_metier1_idx` (`kh_metier_id`),
  ADD KEY `fk_kh_user_kh_kwata1_idx` (`kh_kwata_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `kh_user`
--
ALTER TABLE `kh_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4461;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `kh_user`
--
ALTER TABLE `kh_user`
  ADD CONSTRAINT `fk_kh_user_kh_kwata1` FOREIGN KEY (`kh_kwata_id`) REFERENCES `kh_kwata` (`id_kwata`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;