/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.6.26 : Database - db_vote
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_vote` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_vote`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

/*Data for the table `admin` */

insert  into `admin`(`id`,`login`,`password`) values (1,'super_admin','9f0adb5b3512d7c59a00396d3c15a0eafe6d8199');

/*Table structure for table `bureau` */

DROP TABLE IF EXISTS `bureau`;

CREATE TABLE `bureau` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `poste` varchar(50) DEFAULT NULL,
  `sexe` char(1) DEFAULT NULL,
  `candidat_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

/*Data for the table `bureau` */

insert  into `bureau`(`id`,`nom`,`poste`,`sexe`,`candidat_id`) values (24,'Nyam','vice president','H',1),(25,'Baha Gilchrist','Secretaire general','H',1),(26,'Nyemeck','Secretaire general adjoint','H',1),(27,'Otsalie Melongo','tresorerie','H',1),(28,'Nkeng Julien ','commisaire aux comptes 1','H',1),(29,'Awa Mama','commisaire aux comptes 2','F',1),(30,'Djomo Christian','delegue GL','H',1),(31,'Dikoume Pierre ','delegue SR','H',1),(32,'Ouafo Serge','delegue sport','H',1),(33,'Timtchou Olive','delegue culturel','F',1),(34,'Nguoen Idrissou','cordonnateur de clubs','H',1),(35,'Ipouck Jeannette','vice president','F',2),(36,'Ahoukeng Audrey ','Secretaire general','F',2),(37,'Yewoh Yantoh','Secretaire general adjoint','F',2),(38,'Chouwat Aicha','tresorerie','F',2),(39,'Pategou Oscar','commisaire aux comptes 1','H',2),(40,'Mewanme tahana','commisaire aux comptes 2','H',2),(41,'Nolla loic','delegue GL','H',2),(42,'Ngouemazon loenel','delegue SR','H',2),(43,'Mboni kueda franck loenel','delegue sport','H',2),(44,'Dina valdez camille','delegue culturel','F',2),(45,'Kamo jode','cordonnateur de clubs','H',2);

/*Table structure for table `candidat` */

DROP TABLE IF EXISTS `candidat`;

CREATE TABLE `candidat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) DEFAULT NULL,
  `prenom` varchar(30) DEFAULT NULL,
  `sexe` char(2) DEFAULT NULL,
  `dateNaissance` date DEFAULT NULL,
  `photo` varchar(45) DEFAULT 'defaul_avatar.png',
  `nbreVoie` int(11) DEFAULT '0',
  `commentaire` varchar(255) DEFAULT NULL,
  `telephone` varchar(9) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `slogan` varchar(255) DEFAULT NULL,
  `couleur` varchar(7) DEFAULT '#ffffff',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `telephone` (`telephone`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

/*Data for the table `candidat` */

insert  into `candidat`(`id`,`nom`,`prenom`,`sexe`,`dateNaissance`,`photo`,`nbreVoie`,`commentaire`,`telephone`,`email`,`slogan`,`couleur`) values (1,'batalong','','H','0000-00-00','batalong.JPG',0,'ce soucie de la grande famille iai','25673872','batalong@gmail.com','ensemble pour un campus fort','#0f665e'),(2,'emati','','H','0000-00-00','emati.jpg',0,'diplome en droit','62324243','emati@gmail.com','l iai c\' est le famille','#000040');

/*Table structure for table `electeur` */

DROP TABLE IF EXISTS `electeur`;

CREATE TABLE `electeur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) DEFAULT NULL,
  `prenom` varchar(30) DEFAULT NULL,
  `sexe` char(5) DEFAULT NULL,
  `dateNaissance` date DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `matricule` varchar(255) DEFAULT NULL,
  `telephone` varchar(10) DEFAULT NULL,
  `dejaVote` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

/*Data for the table `electeur` */



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
