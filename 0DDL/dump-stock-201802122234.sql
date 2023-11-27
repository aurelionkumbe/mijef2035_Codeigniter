-- MySQL dump 10.13  Distrib 5.7.13, for Win32 (AMD64)
--
-- Host: localhost    Database: stock
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
-- Table structure for table `achat`
--

DROP TABLE IF EXISTS `achat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `achat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idHistorique` int(11) NOT NULL COMMENT 'stock',
  `idArticle` int(11) NOT NULL,
  `prixAchat` varchar(255) NOT NULL,
  `etat` int(2) NOT NULL DEFAULT '0' COMMENT '1:vendu et servi, 2:a credit, 3:sans servi',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `achat`
--

LOCK TABLES `achat` WRITE;
/*!40000 ALTER TABLE `achat` DISABLE KEYS */;
INSERT INTO `achat` VALUES (1,1,1,'3996',1,'2018-02-04 12:48:14'),(2,1,1,'3996',2,'2018-02-04 12:48:14'),(9,1,1,'3996',0,'2018-02-04 12:48:14'),(10,1,1,'3996',0,'2018-02-04 12:48:14'),(11,1,1,'3996',0,'2018-02-04 12:48:14'),(12,1,1,'3996',0,'2018-02-04 12:48:14'),(14,2,3,'1800',2,'2018-02-04 17:17:21'),(15,2,3,'1800',0,'2018-02-04 17:17:21'),(16,2,3,'1800',0,'2018-02-04 17:17:21'),(17,2,3,'1800',0,'2018-02-04 17:17:21'),(18,2,3,'1800',0,'2018-02-04 17:17:21'),(19,2,3,'1800',0,'2018-02-04 17:17:21'),(20,2,3,'1800',0,'2018-02-04 17:17:21'),(21,2,3,'1800',0,'2018-02-04 17:17:21'),(22,2,3,'1800',0,'2018-02-04 17:17:21'),(23,2,3,'1800',0,'2018-02-04 17:17:21'),(24,2,3,'1800',0,'2018-02-04 17:17:21'),(25,3,2,'500',2,'2018-02-04 17:17:43'),(26,3,2,'500',2,'2018-02-04 17:17:43'),(27,3,2,'500',2,'2018-02-04 17:17:43'),(28,3,2,'500',2,'2018-02-04 17:17:43'),(38,3,2,'500',0,'2018-02-04 17:17:43'),(39,3,2,'500',0,'2018-02-04 17:17:43'),(40,3,2,'500',0,'2018-02-04 17:17:43'),(41,3,2,'500',0,'2018-02-04 17:17:43'),(42,3,2,'500',0,'2018-02-04 17:17:43'),(43,3,2,'500',0,'2018-02-04 17:17:43'),(44,3,2,'500',0,'2018-02-04 17:17:43'),(45,3,2,'500',0,'2018-02-04 17:17:43'),(46,3,2,'500',0,'2018-02-04 17:17:43'),(47,3,2,'500',0,'2018-02-04 17:17:43'),(48,3,2,'500',0,'2018-02-04 17:17:43'),(49,3,2,'500',0,'2018-02-04 17:17:43'),(50,3,2,'500',0,'2018-02-04 17:17:43'),(51,3,2,'500',0,'2018-02-04 17:17:43'),(52,3,2,'500',0,'2018-02-04 17:17:43'),(53,3,2,'500',0,'2018-02-04 17:17:43'),(54,3,2,'500',0,'2018-02-04 17:17:43'),(58,33,1,'1400',0,'2018-02-08 19:19:50'),(59,33,1,'1400',0,'2018-02-08 19:19:50'),(60,33,1,'1400',0,'2018-02-08 19:19:50'),(61,33,1,'1400',0,'2018-02-08 19:19:50'),(62,33,1,'1400',0,'2018-02-08 19:19:50'),(63,33,1,'1400',0,'2018-02-08 19:19:50');
/*!40000 ALTER TABLE `achat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `article`
--

DROP TABLE IF EXISTS `article`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `intitule` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `nbreCritique` int(11) NOT NULL DEFAULT '0',
  `prixMax` int(11) DEFAULT NULL,
  `prixMin` int(11) DEFAULT NULL,
  `detail` text,
  `image` varchar(255) NOT NULL DEFAULT 'img/article.png',
  `idCaisse` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article`
--

LOCK TABLES `article` WRITE;
/*!40000 ALTER TABLE `article` DISABLE KEYS */;
INSERT INTO `article` VALUES (1,'1 Poulet entier','PL1',15,5000,4000,'','img/article.png',2),(2,'33 Export','33Exp',10,1000,600,'','img/article.png',1),(3,'1/2 Poulet','PL0.5',2,2500,2000,'','img/article.png',2);
/*!40000 ALTER TABLE `article` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `caisse`
--

DROP TABLE IF EXISTS `caisse`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `caisse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `etat` tinyint(4) NOT NULL DEFAULT '1',
  `validOtherCommand` tinyint(4) NOT NULL DEFAULT '0',
  `dateDerniereTransaction` datetime DEFAULT NULL,
  `solde` double NOT NULL DEFAULT '0' COMMENT 'le montant qui revient normalement a la caisse apres recouvrement en fin de journee',
  `soldeReel` double NOT NULL DEFAULT '0' COMMENT 'le montant encaisse . elle contient un part de montant a recourvir dans les autres caisses, ',
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idPersonneConnecte` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idPersonneConnecte` (`idPersonneConnecte`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `caisse`
--

LOCK TABLES `caisse` WRITE;
/*!40000 ALTER TABLE `caisse` DISABLE KEYS */;
INSERT INTO `caisse` VALUES (1,'Caisse Liqueurs',1,0,NULL,0,15000,'2018-02-04 12:34:18',NULL),(2,'Caisse Rotisserie',1,0,NULL,15000,0,'2018-02-04 12:40:54',NULL);
/*!40000 ALTER TABLE `caisse` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `caisse_login`
--

DROP TABLE IF EXISTS `caisse_login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `caisse_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idCaisse` int(11) NOT NULL,
  `idCaissier` int(11) NOT NULL,
  `dateLogin` datetime DEFAULT NULL,
  `dateLogout` datetime DEFAULT NULL,
  `isActive` tinyint(4) NOT NULL DEFAULT '0',
  `date` date NOT NULL,
  `nbre` tinyint(4) DEFAULT '0',
  `forcenbre` tinyint(4) NOT NULL DEFAULT '0',
  `montant` double DEFAULT NULL,
  `idManager` int(11) DEFAULT NULL,
  `operationDone` tinyint(4) NOT NULL DEFAULT '0',
  `dateOperationDone` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idCaisse` (`idCaisse`),
  KEY `idCaissier` (`idCaissier`),
  KEY `idManager` (`idManager`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `caisse_login`
--

LOCK TABLES `caisse_login` WRITE;
/*!40000 ALTER TABLE `caisse_login` DISABLE KEYS */;
INSERT INTO `caisse_login` VALUES (1,2,1,'2018-02-04 12:41:56',NULL,1,'2018-02-04',0,0,NULL,NULL,0,NULL,'2018-02-04 12:41:56'),(2,2,7,'2018-02-05 14:09:30',NULL,1,'2018-02-05',0,0,NULL,NULL,0,NULL,'2018-02-05 14:09:30'),(3,1,7,'2018-02-06 09:53:20',NULL,1,'2018-02-06',0,0,NULL,NULL,0,NULL,'2018-02-06 09:53:20'),(4,1,7,'2018-02-07 12:24:41','2018-02-07 17:01:29',0,'2018-02-07',0,0,NULL,NULL,0,NULL,'2018-02-07 17:01:29');
/*!40000 ALTER TABLE `caisse_login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `commande`
--

DROP TABLE IF EXISTS `commande`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `commande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ref` varchar(255) NOT NULL,
  `idUser` int(11) DEFAULT NULL,
  `date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `montant` varchar(255) DEFAULT NULL,
  `prix` varchar(255) NOT NULL,
  `etat` int(2) DEFAULT '0' COMMENT '0 = commande , 1 = payer , 2 = rejeter, 3 = Annuler',
  `estServir` tinyint(1) NOT NULL DEFAULT '0',
  `client` varchar(255) DEFAULT 'Client Anonyme',
  `libCaisse` varchar(255) DEFAULT NULL,
  `idServeur` int(11) NOT NULL,
  `libServeur` varchar(255) NOT NULL,
  `dateService` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `datePaiement` date DEFAULT NULL,
  `idCaisse` int(11) NOT NULL COMMENT 'la caisse qui encaisse l''argent de la commande',
  PRIMARY KEY (`id`),
  KEY `idCaisse` (`idCaisse`),
  KEY `idUser` (`idUser`),
  KEY `idServeur` (`idServeur`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `commande`
--

LOCK TABLES `commande` WRITE;
/*!40000 ALTER TABLE `commande` DISABLE KEYS */;
INSERT INTO `commande` VALUES (5,'18L04022716',NULL,'2018-02-04 22:45:01','2018-02-04 22:57:02','10000','10000',3,0,'Gyso',NULL,1,'Wambo Christian','2018-02-04 17:23:28','2018-02-04',2),(6,'18P05020275',NULL,'2018-02-05 12:29:53','2018-02-05 13:29:53','15000','14000',0,1,'Yafred',NULL,7,'paul','2018-02-05 12:29:52',NULL,2),(15,'18U05023267',NULL,'2018-02-07 11:55:55','2018-02-07 12:55:55','undefined','5000',1,1,'undefined',NULL,2,'Nicole Ngnie','2018-02-07 11:55:55','2018-02-07',1),(16,'18N05023586',NULL,'2018-02-07 11:58:39','2018-02-07 12:58:39','undefined','5000',1,0,'undefined',NULL,2,'Nicole Ngnie','2018-02-05 12:43:35','2018-02-07',1),(17,'18Y05023056',NULL,'2018-02-07 14:27:50','2018-02-07 15:27:50','5000','5000',1,1,'undefined',NULL,2,'Nicole Ngnie','2018-02-07 14:27:49','2018-02-07',1),(18,'18L07025719',NULL,'2018-02-07 13:56:58','2018-02-07 14:56:58','undefined','5000',0,0,'undefined',NULL,2,'Nicole Ngnie','2018-02-07 13:56:57',NULL,1),(19,'18H09021872',NULL,'2018-02-09 08:40:18','2018-02-09 09:40:18','undefined','5000',0,0,'undefined',NULL,2,'Nicole Ngnie','2018-02-09 08:40:18',NULL,1),(20,'18F09023576',NULL,'2018-02-09 08:40:35','2018-02-09 09:40:35','undefined','2500',0,1,'undefined',NULL,2,'Nicole Ngnie','2018-02-09 08:40:35',NULL,1),(21,'18W09023835',NULL,'2018-02-09 12:12:39','2018-02-09 13:12:39','undefined','1000',0,0,'undefined',NULL,2,'Nicole Ngnie','2018-02-09 12:12:38',NULL,1),(22,'18J09023389',NULL,'2018-02-09 12:16:33','2018-02-09 13:16:33','undefined','2500',0,0,'undefined',NULL,2,'Nicole Ngnie','2018-02-09 12:16:33',NULL,1),(23,'18R09021788',NULL,'2018-02-09 12:19:17','2018-02-09 13:19:17','undefined','2500',0,0,'undefined',NULL,2,'Nicole Ngnie','2018-02-09 12:19:17',NULL,1);
/*!40000 ALTER TABLE `commande` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `histo_caisse`
--

DROP TABLE IF EXISTS `histo_caisse`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `histo_caisse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idCaisse` int(11) NOT NULL,
  `idCaissier` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `montantAvant` double NOT NULL,
  `montantApres` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `somme` double NOT NULL COMMENT 'sommeEnMouvement',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `histo_caisse`
--

LOCK TABLES `histo_caisse` WRITE;
/*!40000 ALTER TABLE `histo_caisse` DISABLE KEYS */;
INSERT INTO `histo_caisse` VALUES (9,2,1,'0',0,'0','2018-02-04 18:23:27',0),(10,2,1,'1',0,'10000','2018-02-04 18:23:27',10000),(11,2,1,'0',10000,'10000','2018-02-04 22:57:01',0),(12,2,1,'2',10000,'0','2018-02-04 22:57:01',10000),(13,1,7,'1',0,'5000','2018-02-07 12:40:46',5000),(14,2,7,'0',0,'0','2018-02-07 12:40:46',0),(15,1,7,'1',5000,'10000','2018-02-07 12:58:39',5000),(16,2,7,'0',0,'0','2018-02-07 12:58:39',0),(17,1,7,'1',10000,'15000','2018-02-07 15:25:34',5000),(18,2,7,'0',0,'0','2018-02-07 15:25:34',0);
/*!40000 ALTER TABLE `histo_caisse` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `histo_commande`
--

DROP TABLE IF EXISTS `histo_commande`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `histo_commande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idCommande` int(11) NOT NULL,
  `raison` varchar(255) DEFAULT NULL,
  `operation` varchar(200) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `idManager` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idManager` (`idManager`),
  KEY `idCommande` (`idCommande`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `histo_commande`
--

LOCK TABLES `histo_commande` WRITE;
/*!40000 ALTER TABLE `histo_commande` DISABLE KEYS */;
/*!40000 ALTER TABLE `histo_commande` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `histo_magasin`
--

DROP TABLE IF EXISTS `histo_magasin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `histo_magasin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idMagasin` int(11) NOT NULL,
  `idMagasinier` int(11) DEFAULT NULL,
  `nbreAvant` int(11) NOT NULL,
  `nbreApres` int(11) NOT NULL,
  `operation` varchar(200) NOT NULL,
  `idSource` int(11) DEFAULT NULL,
  `description` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idDestination` (`idSource`),
  KEY `idMagasin` (`idMagasin`),
  KEY `idMagasinier` (`idMagasinier`),
  KEY `idMagasin_2` (`idMagasin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `histo_magasin`
--

LOCK TABLES `histo_magasin` WRITE;
/*!40000 ALTER TABLE `histo_magasin` DISABLE KEYS */;
/*!40000 ALTER TABLE `histo_magasin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `histo_stock`
--

DROP TABLE IF EXISTS `histo_stock`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `histo_stock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idStock` int(11) NOT NULL,
  `nbreAvant` int(11) NOT NULL,
  `nbre` int(11) NOT NULL,
  `nbreApres` int(11) NOT NULL,
  `date` date NOT NULL,
  `heure` time DEFAULT NULL,
  `idUser` int(11) NOT NULL,
  `type` tinyint(1) NOT NULL COMMENT '1:entree, 2:sortie',
  `raison` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idStock` (`idStock`),
  KEY `idUser` (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `histo_stock`
--

LOCK TABLES `histo_stock` WRITE;
/*!40000 ALTER TABLE `histo_stock` DISABLE KEYS */;
INSERT INTO `histo_stock` VALUES (1,1,0,12,12,'2018-02-04',NULL,1,1,''),(2,3,0,12,12,'2018-02-04',NULL,1,1,''),(3,2,0,30,30,'2018-02-04',NULL,1,1,''),(4,1,10,2,8,'2018-02-04',NULL,1,2,'Vente'),(5,1,12,2,14,'2018-02-04',NULL,1,1,'Retour'),(8,1,12,6,10,'2018-02-05',NULL,7,2,NULL),(9,2,30,6,26,'2018-02-05',NULL,7,2,NULL),(10,1,11,1,10,'2018-02-07',NULL,7,3,NULL),(11,1,10,1,9,'2018-02-07',NULL,7,3,NULL),(12,1,9,1,8,'2018-02-07',NULL,7,3,NULL),(13,1,9,2,11,'2018-02-08',NULL,1,1,''),(14,1,8,3,5,'2018-02-08','19:43:23',1,2,'Diminution'),(17,1,6,2,4,'2018-02-08','19:47:20',1,2,'Diminution'),(18,1,5,1,4,'2018-02-08','19:47:20',1,2,'Diminution'),(29,3,11,1,10,'2018-02-08','19:52:30',1,2,'Diminution'),(30,2,21,9,12,'2018-02-08','19:52:53',1,2,'Diminution'),(32,1,4,1,3,'2018-02-08','20:16:54',1,2,'Diminution'),(33,1,4,7,11,'2018-02-08',NULL,1,1,''),(34,1,10,1,9,'2018-02-08','20:20:05',1,2,'Diminution'),(35,1,9,1,8,'2018-02-08','20:20:15',1,2,'Diminution'),(36,3,11,1,10,'2018-02-09','09:40:35',2,2,NULL);
/*!40000 ALTER TABLE `histo_stock` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jour`
--

DROP TABLE IF EXISTS `jour`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jour` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `nbre` int(11) NOT NULL,
  `cout` double NOT NULL DEFAULT '0',
  `credit` double NOT NULL DEFAULT '0',
  `dette` double NOT NULL DEFAULT '0',
  `achat` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jour`
--

LOCK TABLES `jour` WRITE;
/*!40000 ALTER TABLE `jour` DISABLE KEYS */;
INSERT INTO `jour` VALUES (1,'2018-02-04',0,0,0,0,0),(2,'2018-02-05',0,0,14000,0,0),(3,'2018-02-07',2,0,0,15000,7992),(4,'2018-02-09',0,0,2500,0,0);
/*!40000 ALTER TABLE `jour` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ligne`
--

DROP TABLE IF EXISTS `ligne`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ligne` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idArticle` int(11) NOT NULL,
  `nbre` int(11) NOT NULL,
  `prixUnitaire` varchar(255) NOT NULL,
  `prixTotal` varchar(255) NOT NULL,
  `idCommande` int(11) NOT NULL,
  `idsAchat` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `idCaisse` int(11) NOT NULL,
  `idCaisseCommande` int(11) NOT NULL,
  `etat` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ligne`
--

LOCK TABLES `ligne` WRITE;
/*!40000 ALTER TABLE `ligne` DISABLE KEYS */;
INSERT INTO `ligne` VALUES (5,1,2,'5000','10000',5,'[1,2]','2018-02-04','2018-02-04 18:23:27',2,2,0),(6,1,2,'5000','10000',6,'[1,2]','2018-02-05','2018-02-05 10:33:04',2,2,0),(7,2,4,'1000','4000',6,'[25,26,27,28]','2018-02-05','2018-02-05 10:33:04',1,2,0),(18,1,1,'5000','5000',15,'[1]','2018-02-05','2018-02-05 13:42:32',2,1,0),(19,1,1,'5000','5000',16,'[1]','2018-02-05','2018-02-05 13:43:35',2,1,0),(20,1,1,'5000','5000',17,'[1]','2018-02-05','2018-02-05 13:46:30',2,1,0),(21,1,1,'5000','5000',18,'[1]','2018-02-07','2018-02-07 14:56:58',2,1,0),(22,1,1,'5000','5000',19,'[1]','2018-02-09','2018-02-09 09:40:18',2,1,0),(23,3,1,'2500','2500',20,'[14]','2018-02-09','2018-02-09 09:40:35',2,1,0),(24,2,1,'1000','1000',21,'[25]','2018-02-09','2018-02-09 13:12:39',1,1,0),(25,3,1,'2500','2500',22,'[14]','2018-02-09','2018-02-09 13:16:33',2,1,0),(26,3,1,'2500','2500',23,'[14]','2018-02-09','2018-02-09 13:19:17',2,1,0);
/*!40000 ALTER TABLE `ligne` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `magasin`
--

DROP TABLE IF EXISTS `magasin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `magasin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `lieu` varchar(255) DEFAULT NULL,
  `nbre` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `magasin`
--

LOCK TABLES `magasin` WRITE;
/*!40000 ALTER TABLE `magasin` DISABLE KEYS */;
/*!40000 ALTER TABLE `magasin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recouvrement`
--

DROP TABLE IF EXISTS `recouvrement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recouvrement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idCaisseSrc` int(11) NOT NULL,
  `idCaisseDest` int(11) NOT NULL,
  `montant` double NOT NULL DEFAULT '0',
  `date` date DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `idCaisseSrc` (`idCaisseSrc`),
  KEY `idCaisseDest` (`idCaisseDest`),
  KEY `id_2` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recouvrement`
--

LOCK TABLES `recouvrement` WRITE;
/*!40000 ALTER TABLE `recouvrement` DISABLE KEYS */;
INSERT INTO `recouvrement` VALUES (1,2,2,0,'2018-02-04','2018-02-04 22:57:01'),(2,1,2,15000,'2018-02-07','2018-02-07 15:25:34');
/*!40000 ALTER TABLE `recouvrement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `intitule` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `logo` varchar(100) DEFAULT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `telephone` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `siteweb` varchar(100) DEFAULT NULL,
  `adresse` varchar(100) DEFAULT NULL,
  `bp` varchar(100) DEFAULT NULL,
  `slogan` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (1,'files/0a3c77201c838274bed0ae5069497460.png','STOCK','654306774','admin','www.hellocare.com','yde','1245','Stock it well',NULL,'2018-01-18 14:17:20');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stock`
--

DROP TABLE IF EXISTS `stock`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idArticle` int(11) NOT NULL,
  `nbre` int(11) NOT NULL DEFAULT '0',
  `nbreEnReserve` int(11) DEFAULT '0',
  `nbreCritique` int(11) NOT NULL DEFAULT '0',
  `prixAchat` double NOT NULL DEFAULT '1',
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  `dateModif` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stock`
--

LOCK TABLES `stock` WRITE;
/*!40000 ALTER TABLE `stock` DISABLE KEYS */;
INSERT INTO `stock` VALUES (1,1,9,-1,0,1,'2018-02-04 13:37:41','2018-02-08 19:20:15'),(2,2,21,-4,0,1,'2018-02-04 16:34:31','2018-02-08 18:52:53'),(3,3,11,-1,0,1,'2018-02-04 16:38:44','2018-02-09 08:40:35');
/*!40000 ALTER TABLE `stock` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `roles` int(2) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT 'img/icon.png',
  `password` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `numero` varchar(255) DEFAULT NULL,
  `etat` tinyint(1) NOT NULL DEFAULT '1',
  `deletedAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  `canEditPrice` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,5,'Wambo Christian','files/620b479d45be211eb948b79f8204be8f.jpg','7110eda4d09e062aa5e4a390b0a572ac0d2c0220','christian','2017-10-30 09:00:00','671717171',1,'2018-01-06 10:35:14',NULL,0),(2,1,'Nicole Ngnie','img/icon.png','5fee00239940f883d4c2854e41c7f989e75278a3','nicole','2018-01-05 17:43:08',NULL,1,'2018-01-06 10:35:34','2018-02-02 20:30:56',0),(3,4,'Aurelio  Nkumbe','img/icon.png','7c4a8d09ca3762af61e59520943dc26494f8941b','nkaurelien','2018-01-08 09:43:41','654306774',1,NULL,'2018-02-02 21:02:53',0),(7,4,'paul','img/icon.png','a027184a55211cd23e3f3094f1fdc728df5e0500','paul','2018-01-29 10:57:58',NULL,1,NULL,NULL,0);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'stock'
--
