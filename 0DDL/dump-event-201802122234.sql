-- MySQL dump 10.13  Distrib 5.7.13, for Win32 (AMD64)
--
-- Host: localhost    Database: event
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
-- Table structure for table `abonnement`
--

DROP TABLE IF EXISTS `abonnement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `abonnement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idProfil` int(11) DEFAULT NULL,
  `libProfil` varchar(255) DEFAULT NULL,
  `nbre` int(4) DEFAULT NULL,
  `prix` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `abonnement`
--

LOCK TABLES `abonnement` WRITE;
/*!40000 ALTER TABLE `abonnement` DISABLE KEYS */;
INSERT INTO `abonnement` VALUES (1,4,'Ndjeunou Steve',1,10000,'2017-12-26 15:44:15');
/*!40000 ALTER TABLE `abonnement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `activite`
--

DROP TABLE IF EXISTS `activite`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `activite` (
  `idclient` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `detail` varchar(100) DEFAULT NULL,
  `idservice` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomClient` varchar(100) DEFAULT NULL,
  `nomService` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activite`
--

LOCK TABLES `activite` WRITE;
/*!40000 ALTER TABLE `activite` DISABLE KEYS */;
INSERT INTO `activite` VALUES (3,'2018-01-09 12:06:08','sdsd',1,1,NULL,'maintenance'),(3,'2018-01-11 12:06:19','rapperation de samsung s7',1,2,'Ndjeunou Steve','maintenance'),(2,'2018-01-11 12:06:22','sds',1,3,'tchana Joseline','maintenance'),(7,'2018-01-11 15:13:43','kkll',1,4,'Martiel Djembi',NULL),(3,'2018-01-11 15:13:43','kkll',1,5,'Ndjeunou Steve',NULL),(1,'2018-01-11 15:13:43','kkll',1,6,'Nkumbe Aurelien',NULL),(2,'2018-01-11 15:13:43','kkll',1,7,'tchana Joseline',NULL),(7,'2018-01-11 15:15:31','kkll',1,8,'Martiel Djembi','maintenance'),(3,'2018-01-11 15:15:31','kkll',1,9,'Ndjeunou Steve','maintenance'),(1,'2018-01-11 15:15:31','kkll',1,10,'Nkumbe Aurelien','maintenance'),(2,'2018-01-11 15:15:31','kkll',1,11,'tchana Joseline','maintenance'),(2,'2018-01-11 15:21:36','fdfd',1,13,'tchana Joseline','maintenance'),(3,'2018-01-14 17:16:48','allez ',1,14,'Ndjeunou Steve','1'),(2,'2018-01-14 17:52:45','maintenace',1,15,'tchana Joseline','1'),(2,'2018-01-14 17:54:06','amzn',1,16,'tchana Joseline','1'),(7,'2018-01-15 09:53:01','aurelio',1,19,'Martiel Djembo','maintenance'),(7,'2018-01-15 09:54:16','slut',1,20,'Martiel Djembo','maintenance'),(1,'2018-01-15 12:32:12','deco',2,21,'Nkumbe Aurelien','Decoration'),(3,'2018-01-15 12:32:12','deco',2,23,'Ndjeunou Steve','Decoration'),(7,'2018-01-15 12:32:12','deco',2,24,'Martiel Djembo','Decoration');
/*!40000 ALTER TABLE `activite` ENABLE KEYS */;
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
  `idEvenement` int(11) NOT NULL,
  `libEvenement` varchar(255) NOT NULL,
  `montant` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorie`
--

LOCK TABLES `categorie` WRITE;
/*!40000 ALTER TABLE `categorie` DISABLE KEYS */;
INSERT INTO `categorie` VALUES (1,'Invités VIP',3,'Mariage de Luc et Lucie',0,'2017-12-21 14:13:39'),(2,'Classe VIP',3,'Anniversaire de Thierry',1000,'2017-12-22 09:34:12');
/*!40000 ALTER TABLE `categorie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `commande`
--

DROP TABLE IF EXISTS `commande`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `commande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nbre` int(11) DEFAULT NULL,
  `prix` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `etat` tinyint(1) DEFAULT '0',
  `idProfil` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `libProfil` varchar(255) DEFAULT NULL,
  `nom` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `commande`
--

LOCK TABLES `commande` WRITE;
/*!40000 ALTER TABLE `commande` DISABLE KEYS */;
INSERT INTO `commande` VALUES (1,5000,14,70000,0,4,'2017-12-22 15:37:01','Ndjeunou Steve','Ndjeunou Steve'),(2,3000,24,72000,0,4,'2017-12-23 13:49:22','Ndjeunou Steve','Ndjeunou Steve'),(3,500,20,10000,1,4,'2017-12-26 14:58:01','Ndjeunou Steve','Ndjeunou Audrey'),(4,3000,24,72000,0,4,'2017-12-29 13:57:43','Ndjeunou Steve','Ndjeunou Steve');
/*!40000 ALTER TABLE `commande` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `message` text,
  `idProfil` int(11) DEFAULT NULL,
  `libProfil` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sujet` varchar(255) DEFAULT NULL,
  `etat` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact`
--

LOCK TABLES `contact` WRITE;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
INSERT INTO `contact` VALUES (1,'dneodnz','ndjeunousteve@yahoo.fr','dzbduoezijnoizen,izp,odzedcdc\ndcezdezdzedzdezdezdz',1,'Startup Academy','2017-12-22 07:48:27','nizon',1),(2,'Startup Academy','startupacademy237@yahoo.fr','ceonzzinzeoz',1,'Startup Academy','2017-12-22 07:49:26','nioeniondn',0),(3,'Ndjeunou Steve','ndjeunousteve@yahoo.fr','ijnlkm,zfklnzfk,z\nzfezfdfccccccccce',4,'Ndjeunou Steve','2017-12-22 09:43:31','Une bonne idée',0),(4,'Aurelio  Nkumbe','nkaurelien@gmail.com','Test effectuer par aurelien nkumbe pour tester le support par mail\n\nveiller m informer si tout va bien par whatsapp ou ...\n',5,'Aurelio  Nkumbe','2018-01-08 12:04:29','Test effectuer par aurelien nkumbe pour tester le support par mail',0);
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evenement`
--

DROP TABLE IF EXISTS `evenement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `evenement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idProfil` int(11) NOT NULL,
  `idTypes` int(11) NOT NULL,
  `libType` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date` datetime DEFAULT NULL,
  `ville` varchar(255) DEFAULT NULL,
  `lieu` varchar(255) DEFAULT NULL,
  `detail` text,
  `etat` tinyint(1) NOT NULL DEFAULT '0',
  `libProfil` varchar(255) DEFAULT NULL,
  `rappel` tinyint(1) DEFAULT '1',
  `fin` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evenement`
--

LOCK TABLES `evenement` WRITE;
/*!40000 ALTER TABLE `evenement` DISABLE KEYS */;
INSERT INTO `evenement` VALUES (1,1,1,'Mariages','Mariage de Luc et Lucie','2017-12-21 13:48:05','2017-12-23 09:30:00','Douala','Salle de fêtes de Makepé','Tenue et billet exigés, sis immeuble Sans ton Caleçon de Makepe rond poulain.',0,'Startup Academy',1,'2017-12-24 07:30:00'),(2,4,3,'Anninversaires','Anniversaire de Thierry','2017-12-22 09:29:50','2017-12-31 14:25:00','Douala','Salle des fêtes d\'akwa','Un detail un peu long',0,'Ndjeunou Steve',1,'2017-12-31 23:30:00'),(3,5,3,'Anninversaires','Anniversaire de Aurelien Nkumbe','2018-01-08 12:52:04','2018-05-14 13:45:00','Yaounde','Parc Kyriakides','Ternor Ebanflang sera inviter , ainsi que tout mes Ex que j veux relancer',0,'Aurelio  Nkumbe',1,'2018-01-15 13:45:00'),(4,5,2,'Concerts','X Maleya','2018-01-15 10:57:46','2018-01-16 11:50:00','Douala','Stade Omnisport','Samuel Etoo sera present, Billet a 5000 VIP',0,'Aurelio  Nkumbe',1,'2018-01-18 11:50:00');
/*!40000 ALTER TABLE `evenement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invite`
--

DROP TABLE IF EXISTS `invite`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idProfil` int(11) NOT NULL,
  `libProfil` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `numero` varchar(50) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `photo` varchar(255) NOT NULL DEFAULT 'assets/images/invite.png',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `etat` tinyint(1) NOT NULL DEFAULT '0',
  `sexe` varchar(50) DEFAULT NULL,
  `isClient` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invite`
--

LOCK TABLES `invite` WRITE;
/*!40000 ALTER TABLE `invite` DISABLE KEYS */;
INSERT INTO `invite` VALUES (1,5,'Aurelio  Nkumbe','Nkumbe','Aurelien','654306774','nkaurelien@gmail.com','assets/images/invite.png','2018-01-09 17:05:55',0,'Masculin',0),(2,5,'Aurelio  Nkumbe','tchana','Joseline','699854563','joseline@yahoo.fr','assets/images/invite.png','2018-01-09 17:07:28',0,'Feminin',0),(3,5,'Aurelio  Nkumbe','Ndjeunou','Steve','693381374','ndjeunousteve@yahoo.fr','assets/images/invite.png','2018-01-09 17:07:57',0,'Masculin',1),(7,5,'Aurelio  Nkumbe','Martiel','Djembo','654306774','nkaurelien@gmail.com','assets/images/invite.png','2018-01-10 10:52:41',0,'Masculin',0),(8,5,'Aurelio  Nkumbe','Kankeu','Arnold','654306773','nkaurelien@gmail.com','assets/images/invite.png','2018-01-15 19:34:46',0,'Masculin',0);
/*!40000 ALTER TABLE `invite` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invite_evenement`
--

DROP TABLE IF EXISTS `invite_evenement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invite_evenement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idEvenement` int(11) NOT NULL,
  `libEvenement` varchar(255) NOT NULL,
  `idInvite` int(11) NOT NULL,
  `libInvite` varchar(255) NOT NULL,
  `libNumero` varchar(25) NOT NULL,
  `idMembre` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idCategorie` int(11) DEFAULT NULL,
  `idPosition` int(11) DEFAULT NULL,
  `ref` varchar(50) NOT NULL,
  `etat` tinyint(1) NOT NULL DEFAULT '1',
  `isHonore` tinyint(1) NOT NULL DEFAULT '0',
  `isPaye` tinyint(1) NOT NULL DEFAULT '0',
  `moyens` varchar(255) DEFAULT NULL,
  `validDate` timestamp NULL DEFAULT NULL,
  `refusDate` timestamp NULL DEFAULT NULL,
  `raisonRefus` tinytext,
  `montant` int(11) DEFAULT NULL,
  `libCategorie` varchar(255) DEFAULT NULL,
  `libPosition` varchar(255) DEFAULT NULL,
  `state` tinyint(4) NOT NULL DEFAULT '0',
  `libMembre` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invite_evenement`
--

LOCK TABLES `invite_evenement` WRITE;
/*!40000 ALTER TABLE `invite_evenement` DISABLE KEYS */;
INSERT INTO `invite_evenement` VALUES (1,3,'Anniversaire de Aurelien Nkumbe',7,'Martiel Djembi','654306774',5,'2018-01-10 10:52:41',2,2,'G183105232',1,0,0,NULL,NULL,NULL,NULL,NULL,'Classe VIP','Table Dubai',1,'Aurelio  Nkumbe'),(3,3,'Anniversaire de Aurelien Nkumbe',7,'Martiel Djembi','654306774',5,'2018-01-11 15:57:48',NULL,NULL,'G183115763',1,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,'Aurelio  Nkumbe'),(4,3,'Anniversaire de Aurelien Nkumbe',3,'Ndjeunou Steve','693381374',5,'2018-01-11 15:57:48',NULL,NULL,'G183115763',1,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,'Aurelio  Nkumbe'),(5,3,'Anniversaire de Aurelien Nkumbe',1,'Nkumbe Aurelien','654306774',5,'2018-01-11 15:57:48',NULL,NULL,'G183115796',1,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,'Aurelio  Nkumbe'),(6,3,'Anniversaire de Aurelien Nkumbe',2,'tchana Joseline','699854563',5,'2018-01-11 15:57:48',NULL,NULL,'G183115728',1,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,'Aurelio  Nkumbe'),(7,3,'Anniversaire de Aurelien Nkumbe',2,'tchana Joseline','699854563',5,'2018-01-11 16:04:10',NULL,NULL,'G183110489',1,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,'Aurelio  Nkumbe'),(8,3,'Anniversaire de Aurelien Nkumbe',7,'Martiel Djembo','654306774',5,'2018-01-15 09:48:40',NULL,NULL,'G183154855',1,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,'Aurelio  Nkumbe'),(9,3,'Anniversaire de Aurelien Nkumbe',8,'Kankeu Arnold','654306773',5,'2018-01-15 20:23:48',NULL,NULL,'G183152328',1,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,'Aurelio  Nkumbe');
/*!40000 ALTER TABLE `invite_evenement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `membre`
--

DROP TABLE IF EXISTS `membre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `membre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `idProfil` int(11) NOT NULL,
  `libProfil` varchar(255) NOT NULL,
  `etat` tinyint(1) NOT NULL DEFAULT '1',
  `nom` varchar(255) NOT NULL,
  `numero` varchar(50) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `roles` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `libEtat` tinyint(1) NOT NULL DEFAULT '1',
  `sexe` varchar(25) DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `photo` varchar(255) DEFAULT 'assets/images/user.png',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `membre`
--

LOCK TABLES `membre` WRITE;
/*!40000 ALTER TABLE `membre` DISABLE KEYS */;
INSERT INTO `membre` VALUES (1,'1E1','39dfa55283318d31afe5a3ff4a0e3253e2045e43',1,'Startup Academy',1,'Startup Academy','655555555','startupacademy237@yahoo.fr',3,'2017-12-21 11:58:17',1,'Masculin','2017-12-22 06:59:49','assets/images/user.png'),(3,'4E1','39dfa55283318d31afe5a3ff4a0e3253e2045e43',4,'Ndjeunou Steve',1,'Ndjeunou Steve','671747474','ndjeunousteve@yahoo.fr',3,'2017-12-22 09:21:56',1,'Masculin','2017-12-29 13:55:37','assets/images/user.png'),(4,'4E2','209105f4c8d296f5f672054021f7d3d9d21c2176',4,'Ndjeunou Steve',1,'Piam Aline','655455455','piamaline@yahoo.fr',2,'2017-12-22 09:22:37',1,'Feminin',NULL,'assets/images/user.png'),(5,'5E1','39dfa55283318d31afe5a3ff4a0e3253e2045e43',5,'Aurelio  Nkumbe',1,'Aurelio  Nkumbe','654306774','nkaurelien@gmail.com',3,'2018-01-08 12:00:31',1,'Masculin','2018-01-16 21:06:31','assets/images/user.png'),(6,'5E2','39dfa55283318d31afe5a3ff4a0e3253e2045e43',5,'Aurelio  Nkumbe',1,'Steve','650000000','',2,'2018-01-08 12:44:57',1,'Masculin',NULL,'assets/images/user.png');
/*!40000 ALTER TABLE `membre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idEvenement` int(11) DEFAULT NULL,
  `libEvenement` varchar(255) DEFAULT NULL,
  `idInvite` int(11) DEFAULT NULL,
  `libInvite` varchar(255) DEFAULT NULL,
  `libNumero` varchar(25) DEFAULT NULL,
  `message` varchar(161) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idProfil` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `message`
--

LOCK TABLES `message` WRITE;
/*!40000 ALTER TABLE `message` DISABLE KEYS */;
INSERT INTO `message` VALUES (1,2,'Anniversaire de Thierry',2,'Fiang Jean','693381374','Je vous attend ce jour làbas, venez rapidement jfe,defr,nk,kl,zkn ezj czjk ccz cn cjzc nc zcuhjiuzjiejiojzoiez inoijneofiz,nofdez,ie,f','2017-12-29 21:20:36',4),(2,2,'Anniversaire de Thierry',2,'Fiang Jean','693381374','Je vous attend ce jour làbas, venez rapidement jfe,defr,nk,kl,zkn ezj czjk ccz cn cjzc nc zcuhjiuzjiejiojzoiez inoijneofiz,nofdez,ie,f','2017-12-29 21:22:09',4),(3,2,'Anniversaire de Thierry',2,'Fiang Jean','693381374','Je vous attend ce jour làbas, venez rapidement jfe,defr,nk,kl,zkn ezj czjk ccz cn cjzc nc zcuhjiuzjiejiojzoiez inoijneofiz,nofdez,ie,f','2017-12-29 21:22:19',4);
/*!40000 ALTER TABLE `message` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `position`
--

DROP TABLE IF EXISTS `position`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `position` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `idEvenement` int(11) DEFAULT NULL,
  `libEvenement` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nbre` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `position`
--

LOCK TABLES `position` WRITE;
/*!40000 ALTER TABLE `position` DISABLE KEYS */;
INSERT INTO `position` VALUES (1,'Table Saint Joseph',3,'Mariage de Luc et Lucie','2017-12-21 14:04:07',15),(2,'Table Dubai',3,'Anniversaire de Thierry','2017-12-22 09:39:48',10);
/*!40000 ALTER TABLE `position` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profil`
--

DROP TABLE IF EXISTS `profil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(10) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `numero` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `etat` tinyint(1) NOT NULL DEFAULT '1',
  `abonnement` date NOT NULL,
  `sms` int(11) DEFAULT '0',
  `photo` varchar(255) DEFAULT 'assets/images/profil.jpg',
  `nbre` int(11) DEFAULT '1',
  `max` int(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profil`
--

LOCK TABLES `profil` WRITE;
/*!40000 ALTER TABLE `profil` DISABLE KEYS */;
INSERT INTO `profil` VALUES (1,'16U08081','Startup Academy','655555555','startupacademy@yahoo.fr','Douala','Apères Bucavoyages, immeuble Express Union','2017-12-22 16:19:12','2017-12-21 11:58:13',1,'2017-12-22',0,'assets/images/profil.jpg',1,1),(4,'17U22122','Ndjeunou Steve','671747474','ndjeunousteve@yahoo.fr','Douala','Akwa rue Castelnau','2017-12-29 21:22:19','2017-12-22 09:21:56',1,'2017-12-22',497,'assets/images/profil.jpg',2,1),(5,'18U08019','Aurelio  Nkumbe','654306774','nkaurelien@gmail.com','Douala','133','2018-01-16 21:06:31','2018-01-08 12:00:31',1,'2018-01-08',0,'assets/images/profil.jpg',7,0);
/*!40000 ALTER TABLE `profil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rappel`
--

DROP TABLE IF EXISTS `rappel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rappel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idEvenement` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date` date DEFAULT NULL,
  `libEvenement` varchar(255) DEFAULT NULL,
  `idProfil` int(11) DEFAULT NULL,
  `message` varchar(161) DEFAULT NULL,
  `etat` tinyint(1) DEFAULT '0',
  `conf` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rappel`
--

LOCK TABLES `rappel` WRITE;
/*!40000 ALTER TABLE `rappel` DISABLE KEYS */;
INSERT INTO `rappel` VALUES (1,1,'2017-12-21 15:26:58','2017-12-22','Mariage de Luc et Lucie',1,NULL,0,1),(2,2,'2017-12-22 09:42:56','2017-12-29','Anniversaire de Thierry',4,'Je vous attend ce jour làbas, venez rapidement jfe,defr,nk,kl,zkn ezj czjk ccz cn cjzc nc zcuhjiuzjiejiojzoiez inoijneofiz,nofdez,ie,f',0,2);
/*!40000 ALTER TABLE `rappel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `service`
--

DROP TABLE IF EXISTS `service`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idProfil` int(11) DEFAULT NULL,
  `intitule` varchar(100) NOT NULL,
  `detail` varchar(100) DEFAULT NULL,
  `disabled_at` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `service`
--

LOCK TABLES `service` WRITE;
/*!40000 ALTER TABLE `service` DISABLE KEYS */;
INSERT INTO `service` VALUES (1,5,'maintenance','man',NULL,'2018-01-09 14:13:22'),(2,5,'Decoration','tout en black and  white',NULL,'2018-01-15 11:15:10');
/*!40000 ALTER TABLE `service` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `types`
--

DROP TABLE IF EXISTS `types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `types`
--

LOCK TABLES `types` WRITE;
/*!40000 ALTER TABLE `types` DISABLE KEYS */;
INSERT INTO `types` VALUES (1,'Mariages','2017-12-21 13:23:18'),(2,'Concerts','2017-12-21 13:23:28'),(3,'Anninversaires','2017-12-21 13:23:43'),(4,'Conférences','2017-12-21 13:23:51');
/*!40000 ALTER TABLE `types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `numero` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `etat` tinyint(1) DEFAULT '1',
  `last_login` datetime DEFAULT NULL,
  `photo` varchar(255) DEFAULT 'assets/images/user.png',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Ndjeunou Audrey','671747474','39dfa55283318d31afe5a3ff4a0e3253e2045e43','2017-12-23 14:30:03',1,'2017-12-23 15:30:55','assets/images/user.png');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'event'
--
