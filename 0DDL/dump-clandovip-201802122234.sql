-- MySQL dump 10.13  Distrib 5.7.13, for Win32 (AMD64)
--
-- Host: localhost    Database: clandovip
-- ------------------------------------------------------
-- Server version	5.7.13-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `adhesion`
--

DROP TABLE IF EXISTS `adhesion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `adhesion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `annee` varchar(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adhesion`
--

LOCK TABLES `adhesion` WRITE;
/*!40000 ALTER TABLE `adhesion` DISABLE KEYS */;
/*!40000 ALTER TABLE `adhesion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alerte`
--

DROP TABLE IF EXISTS `alerte`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alerte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `idDepart` int(11) NOT NULL,
  `idArrivee` int(11) NOT NULL,
  `date` date NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alerte`
--

LOCK TABLES `alerte` WRITE;
/*!40000 ALTER TABLE `alerte` DISABLE KEYS */;
INSERT INTO `alerte` VALUES (2,1,2,5,'2017-06-18','2017-06-14 15:29:29');
/*!40000 ALTER TABLE `alerte` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `avis`
--

DROP TABLE IF EXISTS `avis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `avis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `idSender` int(11) NOT NULL,
  `note` int(5) NOT NULL,
  `detail` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `avis`
--

LOCK TABLES `avis` WRITE;
/*!40000 ALTER TABLE `avis` DISABLE KEYS */;
INSERT INTO `avis` VALUES (1,4,1,5,'Il s\'est bien sorti de la merde, un bravo particulier.','2017-02-13 13:18:47'),(2,3,1,2,'Il est nul à chier, Faut plus le faire voyager','2017-02-11 13:18:47'),(5,1,3,3,'Bon voyage','2017-03-16 14:02:41'),(7,1,4,2,'Mauvaise expérience','2017-03-18 14:03:33'),(12,3,1,3,'Il s\'est bien sorti de la merde, un bravo particulier.','2017-02-18 13:18:47'),(13,4,1,4,'Il s\'est bien sorti de la merde, un bravo particulier. C\'est u gars des situations il mérite vraiment beaucoup plus encore et beaucoup plus vraiment, super ce mec','2017-02-21 13:18:47'),(22,1,7,3,'Assez bon chaufeur, le voyage a été un succès','2017-06-05 16:11:38'),(23,8,7,3,'Assez bon chauffeur','2017-06-15 07:18:14');
/*!40000 ALTER TABLE `avis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorie`
--

LOCK TABLES `categorie` WRITE;
/*!40000 ALTER TABLE `categorie` DISABLE KEYS */;
/*!40000 ALTER TABLE `categorie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `couleur`
--

DROP TABLE IF EXISTS `couleur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `couleur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `code` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `couleur`
--

LOCK TABLES `couleur` WRITE;
/*!40000 ALTER TABLE `couleur` DISABLE KEYS */;
/*!40000 ALTER TABLE `couleur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `destination`
--

DROP TABLE IF EXISTS `destination`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `destination` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idDepart` int(11) NOT NULL,
  `idArrivee` int(11) NOT NULL,
  `ids` varchar(255) DEFAULT NULL,
  `cout` varchar(255) NOT NULL,
  `reference` int(5) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `destination`
--

LOCK TABLES `destination` WRITE;
/*!40000 ALTER TABLE `destination` DISABLE KEYS */;
INSERT INTO `destination` VALUES (1,2,4,'','3000',1),(2,2,5,'4','5000',1),(3,2,3,'4,5','10000',3),(4,4,5,'','2500',1),(5,4,3,'5','5000',2),(6,5,3,'','4000',1),(7,2,6,'','10000',2);
/*!40000 ALTER TABLE `destination` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equipe`
--

DROP TABLE IF EXISTS `equipe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `equipe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `fonction` varchar(255) NOT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `typeMembre` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipe`
--

LOCK TABLES `equipe` WRITE;
/*!40000 ALTER TABLE `equipe` DISABLE KEYS */;
INSERT INTO `equipe` VALUES (1,'Ndjeunou Steve','Project Manager','http://facebook.com/steve.ndjeunou','http://twitter.com/steve.ndjeunou','ndjeunou@yahoo.fr','http://clandovip.dev/Public/site/img/user.png','0');
/*!40000 ALTER TABLE `equipe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `etape`
--

DROP TABLE IF EXISTS `etape`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `etape` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idTrajet` int(11) NOT NULL,
  `idDepart` int(11) NOT NULL,
  `idArrivee` int(11) NOT NULL,
  `cout` int(11) NOT NULL,
  `comission` int(11) NOT NULL,
  `lieu` text,
  `one` int(2) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `etape`
--

LOCK TABLES `etape` WRITE;
/*!40000 ALTER TABLE `etape` DISABLE KEYS */;
INSERT INTO `etape` VALUES (1,1,2,5,6000,1000,'Total Japoma',1),(2,1,2,4,3700,700,'Total Japoma',0),(3,2,2,3,12000,2000,'Total Japoma',1),(4,2,2,5,600,100,'Total Japoma',0),(5,2,4,3,9500,1500,'Gare centrale',0),(6,2,5,3,4850,850,'Pesage',0),(7,3,2,3,12000,2000,'Total Japoma',1),(8,3,2,4,1700,500,'Total Japoma',0),(9,4,4,5,1000,700,'Gare centrale',1),(10,5,2,3,14500,2500,'Total Japoma',1),(11,5,2,4,6000,1000,'Total Japoma',0),(12,5,4,3,9500,1500,'Gare centrale',0),(13,6,3,2,14500,2500,'Santa Lucia Mvan',1),(14,7,2,4,1500,500,'Bonanjo',1);
/*!40000 ALTER TABLE `etape` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `localite`
--

DROP TABLE IF EXISTS `localite`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `localite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idVille` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `localite`
--

LOCK TABLES `localite` WRITE;
/*!40000 ALTER TABLE `localite` DISABLE KEYS */;
INSERT INTO `localite` VALUES (1,2,'Total Japoma','',''),(2,2,'Bonanjo','',''),(3,6,'Marché de Bazou','',''),(4,3,'Santa Lucia Mvan','',''),(5,3,'Poste centrale','',''),(6,4,'Gare centrale','',''),(7,5,'Pesage','','');
/*!40000 ALTER TABLE `localite` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idSender` int(11) NOT NULL,
  `idReceiver` int(11) NOT NULL,
  `reponse` int(11) DEFAULT NULL,
  `idEtape` int(11) DEFAULT NULL,
  `contenu` text NOT NULL,
  `statut` int(2) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lu` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `message`
--

LOCK TABLES `message` WRITE;
/*!40000 ALTER TABLE `message` DISABLE KEYS */;
INSERT INTO `message` VALUES (1,7,1,NULL,8,'Ou puis-je vous rencontrer, je voudrai quitter à 6H.\nC\'est possible?',0,'2017-06-02 17:12:37',0),(2,1,7,NULL,2,'Commen vous allez Mr Talla, je voudrai savoir si vous pourrez me prendre un peu plus tôt?',0,'2017-06-02 17:26:01',0),(3,1,7,NULL,2,'Pourquoi vous ne répondez pas?',0,'2017-06-02 18:07:19',0),(4,7,1,NULL,4,'Bonjour vous pouvez me prendre à bonanjo?',0,'2017-06-03 14:26:11',0),(5,7,1,NULL,4,'Bjr j\'atends toujours votre réponse Mr Ndjeunou',1,'2017-06-05 19:04:47',0),(6,7,1,NULL,2,'Merci de m\'avoir écrit, j\'étais un peu occupé.\nJe reviens vers vous plus tard',0,'2017-06-05 19:59:25',0),(7,3,7,NULL,2,'Je suis intéressé, c\'est possible d\'avoir votre numéro de téléphone?',1,'2017-06-05 21:59:59',0),(8,1,7,NULL,1,'bjr, on peut partir à 17H?',1,'2017-06-14 10:01:02',0),(9,9,7,NULL,1,'bonjour vous êtes déjà partir?',1,'2017-06-15 16:09:36',0),(10,9,7,NULL,1,'Vous ne répondez pas?',0,'2017-06-15 16:13:00',0);
/*!40000 ALTER TABLE `message` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `detail` text NOT NULL,
  `vues` int(11) NOT NULL DEFAULT '0',
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `etat` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notification`
--

DROP TABLE IF EXISTS `notification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `annonce_created` int(2) NOT NULL DEFAULT '1',
  `annonce_updated` int(2) NOT NULL DEFAULT '1',
  `message` int(2) NOT NULL DEFAULT '1',
  `avis_receive` int(2) NOT NULL DEFAULT '1',
  `avis_send` int(2) NOT NULL DEFAULT '1',
  `sms_go` int(2) NOT NULL DEFAULT '1',
  `notify` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notification`
--

LOCK TABLES `notification` WRITE;
/*!40000 ALTER TABLE `notification` DISABLE KEYS */;
INSERT INTO `notification` VALUES (1,1,0,1,0,1,0,0,0),(2,2,1,1,1,1,1,1,1),(3,3,1,1,1,1,1,1,1),(4,4,1,1,1,1,1,1,1),(5,5,1,1,1,1,1,1,1),(6,6,1,1,1,1,1,1,1),(7,7,1,1,1,1,1,1,1),(8,8,1,1,1,1,1,1,1),(9,8,1,1,1,1,1,1,1),(10,9,1,1,1,1,1,1,0),(11,9,1,1,1,1,1,1,1),(12,11,1,1,1,1,1,1,1);
/*!40000 ALTER TABLE `notification` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notify`
--

DROP TABLE IF EXISTS `notify`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notify` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notify`
--

LOCK TABLES `notify` WRITE;
/*!40000 ALTER TABLE `notify` DISABLE KEYS */;
INSERT INTO `notify` VALUES (1,'ndjeunousteve@yahoo.fr');
/*!40000 ALTER TABLE `notify` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `passager`
--

DROP TABLE IF EXISTS `passager`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `passager` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `idEtape` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `transac_id` varchar(255) DEFAULT NULL,
  `notif_token` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `etat` int(2) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `passager`
--

LOCK TABLES `passager` WRITE;
/*!40000 ALTER TABLE `passager` DISABLE KEYS */;
INSERT INTO `passager` VALUES (1,4,1,'ajdlok451d','125478965325','defrfrfr454frfded','dd497bda3b250e536186fc0663f32f40',1,'2017-06-13 16:12:37'),(2,1,1,'frfr48448s','253698754685','fcrefrf4846558c','dd497bda3b2536186fccd20663f32f40',1,'2017-06-14 07:58:37'),(13,9,1,'CV149754294022370',NULL,'aaccf34185c5d05ea155b64e3354d0ba','b286b3f2667fd33860daeb3d92f40e0b543c39fe0de76e44fa6fc1ef20cc2272',0,'2017-06-15 17:09:01'),(30,7,14,'CV149799712447356','MP1497997124876867','','',1,'2017-06-20 23:18:44'),(33,7,8,'CV149802844304901','MP1498028443020000','','',1,'2017-06-21 08:00:43'),(34,7,4,'CV149804177828583','MP170621.1243.B00070','bc076697f602332aa08f3c5bf188352c','708086178801374036f13fbf21344424e0e6407d764c264d43d26e5f0e5e3509',1,'2017-06-21 11:42:59'),(35,8,4,'CV149804282364203','MP170621.1300.B00071','637c3cfc7518a166c874e4df3d2c8719','a95ef2a338d6a68ed7a878babb666c820a77c1b27939e406540d0484cbbff8c9',1,'2017-06-21 12:00:25'),(36,7,10,'CV149805280856451',NULL,'4346f199a2c62dc6b9c5c0ca9e229585','d90eb22daf92a21211d8b392a00f6dcd8870cfd197cb15de4ba1569446ac1cfe',0,'2017-06-21 14:47:05');
/*!40000 ALTER TABLE `passager` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pays`
--

DROP TABLE IF EXISTS `pays`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pays` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `intitule` varchar(255) NOT NULL,
  `code` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pays`
--

LOCK TABLES `pays` WRITE;
/*!40000 ALTER TABLE `pays` DISABLE KEYS */;
INSERT INTO `pays` VALUES (1,'Cameroun','237'),(2,'France','336'),(3,'Gabon','224');
/*!40000 ALTER TABLE `pays` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `preference`
--

DROP TABLE IF EXISTS `preference`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `preference` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `parle` int(2) NOT NULL DEFAULT '2',
  `cigarette` int(2) NOT NULL DEFAULT '1',
  `animal` int(2) NOT NULL DEFAULT '1',
  `musique` int(2) NOT NULL DEFAULT '3',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `preference`
--

LOCK TABLES `preference` WRITE;
/*!40000 ALTER TABLE `preference` DISABLE KEYS */;
INSERT INTO `preference` VALUES (1,1,1,3,2,3),(2,2,2,1,1,3),(3,3,2,1,1,3),(4,4,3,3,3,2),(5,5,2,1,1,3),(6,6,2,1,1,3),(7,7,2,1,1,3),(8,8,2,1,1,3),(9,9,2,1,1,3),(10,11,2,1,1,3);
/*!40000 ALTER TABLE `preference` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `remarque`
--

DROP TABLE IF EXISTS `remarque`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `remarque` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idPassager` int(11) NOT NULL,
  `idEtape` int(11) NOT NULL,
  `objet` varchar(255) NOT NULL,
  `detail` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `remarque`
--

LOCK TABLES `remarque` WRITE;
/*!40000 ALTER TABLE `remarque` DISABLE KEYS */;
INSERT INTO `remarque` VALUES (1,1,1,'Le chauffeur n\'a pas de papiers','Le chauffeur ne possède aucun papier d\'identification, ni de CNI , ni les papiers du véhicule.','2017-06-05 19:14:54');
/*!40000 ALTER TABLE `remarque` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reset`
--

DROP TABLE IF EXISTS `reset`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reset` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reset`
--

LOCK TABLES `reset` WRITE;
/*!40000 ALTER TABLE `reset` DISABLE KEYS */;
INSERT INTO `reset` VALUES ('pablosteve00@gmail.com','BZZSJLVPT85XZZ1','2017-06-13 12:55:07'),('ndjeunousteve@yahoo.fr','ZJLPL149735948421097',NULL);
/*!40000 ALTER TABLE `reset` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trajet`
--

DROP TABLE IF EXISTS `trajet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trajet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idChaufeur` int(11) NOT NULL,
  `idVoiture` int(11) NOT NULL,
  `jour` date NOT NULL,
  `heure` int(5) NOT NULL,
  `minutes` int(5) NOT NULL,
  `places` int(5) DEFAULT NULL,
  `vues` int(11) NOT NULL DEFAULT '0',
  `detail` text,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `limite` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trajet`
--

LOCK TABLES `trajet` WRITE;
/*!40000 ALTER TABLE `trajet` DISABLE KEYS */;
INSERT INTO `trajet` VALUES (1,7,10,'2017-06-21',17,15,4,0,'Bien vouloir me contacter avant le voyage','2017-06-02 17:17:44',NULL,2),(2,1,7,'2017-06-25',15,30,5,0,'Je suis disponible pour tout information, juste me communiquer vos coordonées ou me contacter sur le site.','2017-06-02 17:22:44',NULL,3),(3,8,11,'2017-06-23',8,30,5,0,'','2017-06-15 07:03:51',NULL,4),(4,7,10,'2017-06-24',14,0,4,0,'Je pars à l\'heure exacte, pas de bagages. Merci','2017-06-15 12:45:19',NULL,4),(5,9,12,'2017-06-27',8,30,2,0,'Je ne veux pas de bagages','2017-06-15 16:33:37',NULL,1),(6,9,12,'2017-06-21',9,0,2,0,'Je ne veux pas de bagages','2017-06-15 16:33:37',NULL,2),(7,9,12,'2017-07-12',6,0,3,0,'biensur','2017-06-15 17:12:05',NULL,3);
/*!40000 ALTER TABLE `trajet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tranche`
--

DROP TABLE IF EXISTS `tranche`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tranche` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `start` int(11) NOT NULL,
  `fin` int(11) NOT NULL,
  `cout` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tranche`
--

LOCK TABLES `tranche` WRITE;
/*!40000 ALTER TABLE `tranche` DISABLE KEYS */;
INSERT INTO `tranche` VALUES (1,2001,3000,700),(2,3001,4000,850),(3,4001,5000,1000),(4,5001,8000,1500),(5,8001,9000,1700),(6,9001,10000,2000),(7,10001,13000,2500),(8,13001,15000,2700),(9,15001,20000,3000),(10,20001,25000,3500),(11,25001,30000,4000),(12,30001,35000,4500),(13,35001,50000,5000),(16,0,500,100),(17,501,1000,200),(18,1001,2000,500);
/*!40000 ALTER TABLE `tranche` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaction`
--

DROP TABLE IF EXISTS `transaction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idTrajet` int(11) DEFAULT NULL,
  `idUser` int(11) NOT NULL,
  `type` tinyint(2) NOT NULL DEFAULT '1',
  `cout` int(11) NOT NULL,
  `comission` int(11) NOT NULL DEFAULT '0',
  `intitule` varchar(255) NOT NULL,
  `etat` tinyint(2) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `progress` int(5) NOT NULL DEFAULT '0',
  `valid` int(5) NOT NULL DEFAULT '0',
  `facture` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaction`
--

LOCK TABLES `transaction` WRITE;
/*!40000 ALTER TABLE `transaction` DISABLE KEYS */;
INSERT INTO `transaction` VALUES (1,1,7,1,12000,2000,'Frais de covoiturage',1,'2017-06-14 11:09:14',3,2,NULL),(4,3,8,1,1700,500,'Frais de covoiturage',1,'2017-06-15 10:13:42',6,0,NULL),(5,NULL,7,2,5000,0,'Retrait d\'argent',0,'2017-06-15 15:46:26',0,0,NULL),(6,7,9,1,1500,500,'Frais de covoiturage',1,'2017-06-15 16:12:31',2,0,NULL),(7,NULL,7,2,2000,0,'Droit d\'adhésion',1,'2017-06-20 17:08:50',0,0,NULL),(11,NULL,7,2,1500,500,'Frais de covoiturage',1,'2017-06-20 22:18:44',0,0,NULL),(14,NULL,7,2,1700,500,'Frais de covoiturage',1,'2017-06-21 07:00:43',0,0,NULL),(15,2,1,1,1200,200,'Frais de covoiturage',1,'2017-06-21 10:42:59',2,2,NULL),(16,5,9,1,0,0,'Frais de covoiturage',0,'2017-06-21 13:47:05',1,0,NULL);
/*!40000 ALTER TABLE `transaction` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `sexe` varchar(255) DEFAULT NULL,
  `naissance` date DEFAULT NULL,
  `cni` varchar(255) DEFAULT NULL,
  `numero` varchar(255) DEFAULT NULL,
  `pays` varchar(255) DEFAULT NULL,
  `ville` varchar(255) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `etat` int(2) NOT NULL DEFAULT '1',
  `note` float DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `photo` varchar(255) DEFAULT 'site/img/user.png',
  `roles` varchar(255) NOT NULL DEFAULT 'ROLE_USER',
  `last_login` datetime DEFAULT NULL,
  `infos` text,
  `taux` varchar(5) DEFAULT '0',
  `solde` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `pseudo` (`pseudo`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `numero` (`numero`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'@audrey.ndjeunou','7c4a8d09ca3762af61e59520943dc26494f8941b','ndjeunousteve@yahoo.fr','Ndjeunou','Audrey Steve','Feminin','1992-03-20',NULL,'237693381374',NULL,NULL,NULL,1,2.6667,'2017-02-07 00:47:52','http://clandovip.dev/Public/uploads/c7d871d1bccb8adf75971dff7cbc3d21.','ROLE_USER','2017-06-15 16:38:58',NULL,'30',1000),(3,'@carole.djantan','7c4a8d09ca3762af61e59520943dc26494f8941b','carole@clandovip.com','Djantan','Carole','Masculin','1987-01-30',NULL,'237695948606',NULL,NULL,NULL,1,NULL,'2017-02-12 13:43:53','http://clandovip.dev/Public/site/img/user.png','ROLE_USER',NULL,NULL,'30',0),(4,'@aline.foaguam','aafdc23870ecbcd3d557b6423a8982134e17927e','fadouandji@yahoo.fr','Foaguam','Aline','Masculin','1967-06-18',NULL,'237651366372',NULL,NULL,NULL,1,NULL,'2017-02-12 15:04:11','http://clandovip.dev/Public/site/img/user.png','ROLE_USER','2017-06-15 15:20:33',NULL,'30',0),(5,'@aline.foungiam','7c4a8d09ca3762af61e59520943dc26494f8941b','aline@clandovip.com','Foungiam','Aline','Masculin','1975-02-07',NULL,'237699366372',NULL,NULL,NULL,1,NULL,'2017-02-12 16:26:29','http://clandovip.dev/Public/site/img/user.png','ROLE_USER','2017-06-15 13:12:00',NULL,'30',0),(6,'@elvige.lele','c984aed014aec7623a54f0591da07a85fd4b762d','elvigelele@yahoo.fr','Lele','Elvige','Masculin','1986-02-11',NULL,'237691763500',NULL,NULL,NULL,1,NULL,'2017-04-23 15:30:05','http://clandovip.dev/Public/site/img/user.png','ROLE_USER','2017-06-15 04:08:00',NULL,'30',0),(7,'@jean.talla','7c4a8d09ca3762af61e59520943dc26494f8941b','talla@yahoo.fr','Talla','Jean','Masculin','1979-03-15',NULL,'237671747474',NULL,NULL,NULL,1,NULL,'2017-06-01 14:00:59','http://clandovip.dev/Public/uploads/bfabf8e25b203ef2a8890f092cf3df5f.png','ROLE_USER','2017-06-21 11:09:40','bjr à tous','30',2800),(8,'@steve.ndjeunou','f7c3bc1d808e04732adf679965ccc34ca7ae3441','pablosteve00@gmail.com','Ndjeunou','Steve','Feminin','1986-04-12',NULL,'237674674004',NULL,NULL,NULL,1,3,'2017-06-13 01:21:56','http://clandovip.dev/Public/uploads/47de4889ad623f9dec67c71e9cb25d5d.png','ROLE_USER','2017-06-21 11:59:14',NULL,'30',1200),(9,'@yves.onana','5a3dafaa1421688d19b9347aa41d6ba0b9f89fd6','yvesonana22@gmail.com','Onana','Yves','Feminin','1991-04-22',NULL,'237693381378',NULL,NULL,NULL,1,NULL,'2017-06-15 15:59:27','http://clandovip.dev/Public/uploads/4b60b3bb1599aaacf38a98c71a2a968b.png','ROLE_USER','2017-06-20 23:39:46',NULL,'45',1000),(10,'admin','7c4a8d09ca3762af61e59520943dc26494f8941b','admin@yahoo.fr','Tamo','Alain','Masculin','1992-03-20',NULL,'237671717171',NULL,NULL,NULL,1,2.6667,'2017-02-07 00:47:52','http://clandovip.dev/Public/uploads/c7d871d1bccb8adf75971dff7cbc3d21.','ROLE_ADMIN','2017-06-15 16:38:58',NULL,'0',0);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `verification`
--

DROP TABLE IF EXISTS `verification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `verification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `email` int(2) NOT NULL DEFAULT '0',
  `numero` int(2) NOT NULL DEFAULT '0',
  `photo` int(2) NOT NULL DEFAULT '0',
  `cni` int(2) NOT NULL DEFAULT '0',
  `charte` int(2) NOT NULL DEFAULT '0',
  `facebook` int(2) NOT NULL DEFAULT '0',
  `google` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `verification`
--

LOCK TABLES `verification` WRITE;
/*!40000 ALTER TABLE `verification` DISABLE KEYS */;
INSERT INTO `verification` VALUES (1,1,0,0,1,1,0,0,0),(2,2,0,0,0,0,0,0,0),(3,3,0,0,0,0,0,0,0),(4,4,0,0,0,0,0,0,0),(5,5,0,0,0,0,0,0,0),(6,6,0,0,0,0,0,0,0),(7,7,1,1,0,1,1,0,0),(8,8,0,0,0,0,0,0,0),(9,9,0,0,0,0,0,0,0),(10,11,0,0,0,0,0,0,0);
/*!40000 ALTER TABLE `verification` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ville`
--

DROP TABLE IF EXISTS `ville`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ville` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idPays` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ville`
--

LOCK TABLES `ville` WRITE;
/*!40000 ALTER TABLE `ville` DISABLE KEYS */;
INSERT INTO `ville` VALUES (2,1,'Douala','',''),(3,1,'Yaoundé','',''),(4,1,'Edéa','',''),(5,1,'Mboumnyebel','',''),(6,1,'Bazou','','');
/*!40000 ALTER TABLE `ville` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `visite`
--

DROP TABLE IF EXISTS `visite`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `visite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(255) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `pays` varchar(255) DEFAULT NULL,
  `region` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `visite`
--

LOCK TABLES `visite` WRITE;
/*!40000 ALTER TABLE `visite` DISABLE KEYS */;
/*!40000 ALTER TABLE `visite` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `voiture`
--

DROP TABLE IF EXISTS `voiture`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `voiture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idVoitures` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `couleur` varchar(255) DEFAULT NULL,
  `modele` varchar(255) NOT NULL,
  `places` int(5) NOT NULL,
  `immatriculation` varchar(255) NOT NULL,
  `categorie` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `detail` text,
  `images` text,
  `statut` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `voiture`
--

LOCK TABLES `voiture` WRITE;
/*!40000 ALTER TABLE `voiture` DISABLE KEYS */;
INSERT INTO `voiture` VALUES (2,1,1,'blanc','Kompressor',4,'LT12587','Berline','2017-03-24 13:46:44',NULL,'http://clandovip.dev/Public/site/img/layout-styles.png;http://clandovip.dev/Public/site/img/updates.png;http://clandovip.dev/Public/site/img/device.png;site/img/style-switcher.png;http://clandovip.dev/Public/site/img/custom-header.png',0),(3,2,1,'blanc','Modèle 1',4,'CE25369','Véhicule de tourisme','2017-03-20 11:46:44',NULL,'http://clandovip.dev/Public/site/img/layout-styles.png;http://clandovip.dev/Public/site/img/updates.png;http://clandovip.dev/Public/site/img/device.png;http://clandovip.dev/Public/site/img/style-switcher.png;http://clandovip.dev/Public/site/img/custom-header.png',1),(7,1,1,'bordeaux','Formatic',5,'LT12121','4×4','2017-03-24 17:52:14','Voiture presque neuve avec climatisation et système de refroidissement intelligent à haute fréquence, bénéficiant d\'une plusvalue en rebobinnage intensif accéléré.','http://clandovip.dev/Public/voitures/de7acf94ba3f0b4372719f220f1fc7e5.png;http://clandovip.dev/Public/voitures/3bd524eb96c82679fd6a759a03a0a1f5.png;http://clandovip.dev/Public/voitures/17c79e7eccb5eee3afed10e43ddd4c57.png;http://clandovip.dev/Public/voitures/fa2b4837c961fb06b750d9cb9b400e70.png;http://clandovip.dev/Public/voitures/aab2e814d40770477efcaae2dedd6853.png',0),(8,2,1,'bleu','Modèle2',2,'SW14001','Cabriolet','2017-03-24 18:04:22','Coupe double cabriolet','http://clandovip.dev/Public/voitures/c5219bbb8d7b763fcc8b341aa24ab6f8.png;http://clandovip.dev/Public/voitures/2912f03987d2cc0f4fa5b9246c549c13.png;http://clandovip.dev/Public/voitures/4895fe43dc68bf63e30765cc44ba4f55.png;http://clandovip.dev/Public/voitures/242068c8d60c264d234d1a34c7b28960.png',0),(10,1,7,'vert foncé','Kompressor',4,'CE15249','Cabriolet','2017-06-02 11:04:55','Une superbe voiture de luxe tout terrain','http://clandovip.dev/Public/voitures/18231a16ae486a332f86618eb0c17bb3.png;http://clandovip.dev/Public/voitures/e68d7474166c70bbbdaa260b9f87f52c.png;http://clandovip.dev/Public/voitures/79ec36f4c37e373525d9e5b2b0fd7135.png',0),(11,1,8,'noir','Formatic',5,'LT15476','4×4','2017-06-15 06:58:55','','http://clandovip.dev/Public/voitures/dfbc67ea7b23310969ce188ca844e733.png;http://clandovip.dev/Public/voitures/3c95db49a8a3c2d6d81fd927de327c32.png;http://clandovip.dev/Public/voitures/3ce9a62e7cac1aed2bf5dcc767862000.png;http://clandovip.dev/Public/voitures/efa0b8caaa770dde8e31d998e11845ec.png',0),(12,1,9,'bleu foncé','Formatic',3,'CE12356','4×4','2017-06-15 16:23:34','Voiture climatisée avec WIFI à bord et espace détente et rafraichissement','http://clandovip.dev/Public/voitures/fbf30476cddb1d8c8e715941aaf57b72.png;http://clandovip.dev/Public/voitures/02dff3c0a71647e77ad5bf67129192d7.png;http://clandovip.dev/Public/voitures/8c883c78126c2ba5dd477bfe83da752d.png',0);
/*!40000 ALTER TABLE `voiture` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `voitures`
--

DROP TABLE IF EXISTS `voitures`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `voitures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `marque` varchar(255) NOT NULL,
  `categorie` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `voitures`
--

LOCK TABLES `voitures` WRITE;
/*!40000 ALTER TABLE `voitures` DISABLE KEYS */;
INSERT INTO `voitures` VALUES (1,'Mercedes Benz','Classe E,Classe F,Kompressor,Formatic'),(2,'RAV4','Modèle1,Modèle2,Modèle3');
/*!40000 ALTER TABLE `voitures` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'clandovip'
--
