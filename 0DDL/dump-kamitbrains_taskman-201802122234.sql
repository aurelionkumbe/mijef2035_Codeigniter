-- MySQL dump 10.13  Distrib 5.7.13, for Win32 (AMD64)
--
-- Host: localhost    Database: kamitbrains_taskman
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
-- Table structure for table `actions`
--

DROP TABLE IF EXISTS `actions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `actions` (
  `id_act` int(10) NOT NULL AUTO_INCREMENT,
  `nom_act` varchar(255) NOT NULL,
  `date_act` date DEFAULT NULL,
  `echeance` int(4) DEFAULT NULL,
  `resolue int` int(1) DEFAULT NULL,
  `deleted` int(1) DEFAULT NULL,
  `ass1_id` int(10) DEFAULT NULL,
  `ass2_id` int(10) DEFAULT NULL,
  `rapport_num` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_act`),
  KEY `ass1_id` (`ass1_id`),
  KEY `ass2_id` (`ass2_id`),
  KEY `programmer` (`rapport_num`),
  CONSTRAINT `programmer` FOREIGN KEY (`rapport_num`) REFERENCES `rapports` (`num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `actions`
--

LOCK TABLES `actions` WRITE;
/*!40000 ALTER TABLE `actions` DISABLE KEYS */;
/*!40000 ALTER TABLE `actions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fonctions`
--

DROP TABLE IF EXISTS `fonctions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fonctions` (
  `id_fonc` tinyint(2) NOT NULL,
  `nom_fonc` varchar(255) DEFAULT NULL,
  `desc_fonc` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_fonc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fonctions`
--

LOCK TABLES `fonctions` WRITE;
/*!40000 ALTER TABLE `fonctions` DISABLE KEYS */;
INSERT INTO `fonctions` VALUES (1,'Administrateur','Administrateur'),(2,'Superviseur','Superviseur'),(3,'Employé','Employé');
/*!40000 ALTER TABLE `fonctions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personnes`
--

DROP TABLE IF EXISTS `personnes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personnes` (
  `id_pers` int(10) NOT NULL AUTO_INCREMENT,
  `fonction_id` int(2) NOT NULL,
  `nom_pers` varchar(255) NOT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `tel_pers` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `date_pers` date DEFAULT NULL,
  `pass` varchar(255) NOT NULL,
  `is_admin` int(1) NOT NULL DEFAULT '0',
  `deleted` int(1) DEFAULT '0',
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_pers`),
  KEY `attribuer` (`fonction_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personnes`
--

LOCK TABLES `personnes` WRITE;
/*!40000 ALTER TABLE `personnes` DISABLE KEYS */;
/*!40000 ALTER TABLE `personnes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `problemes`
--

DROP TABLE IF EXISTS `problemes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `problemes` (
  `id_pb` int(10) NOT NULL AUTO_INCREMENT,
  `travail_id` int(10) NOT NULL,
  `nom_pb` varchar(255) NOT NULL,
  `desc_pb` varchar(255) DEFAULT NULL,
  `date_pb` datetime DEFAULT NULL,
  PRIMARY KEY (`id_pb`),
  KEY `est survenu` (`travail_id`),
  CONSTRAINT `est survenu` FOREIGN KEY (`travail_id`) REFERENCES `travaux` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `problemes`
--

LOCK TABLES `problemes` WRITE;
/*!40000 ALTER TABLE `problemes` DISABLE KEYS */;
/*!40000 ALTER TABLE `problemes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `rapport_actions`
--

DROP TABLE IF EXISTS `rapport_actions`;
/*!50001 DROP VIEW IF EXISTS `rapport_actions`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `rapport_actions` AS SELECT 
 1 AS `num`,
 1 AS `ass1_id`,
 1 AS `id_action`,
 1 AS `nom_act`,
 1 AS `date_act`,
 1 AS `echeance`,
 1 AS `deleted`,
 1 AS `prenom`,
 1 AS `nom_pers`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `rapport_travaux`
--

DROP TABLE IF EXISTS `rapport_travaux`;
/*!50001 DROP VIEW IF EXISTS `rapport_travaux`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `rapport_travaux` AS SELECT 
 1 AS `num`,
 1 AS `nom_trav`,
 1 AS `date_trav`,
 1 AS `sup_id`,
 1 AS `deleted`,
 1 AS `hd_trav`,
 1 AS `hf_trav`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `rapports`
--

DROP TABLE IF EXISTS `rapports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rapports` (
  `num` varchar(255) NOT NULL,
  `personne_id` int(10) NOT NULL,
  `objet` varchar(255) DEFAULT NULL,
  `date_rap` date DEFAULT NULL,
  `hd_serv` varchar(8) DEFAULT NULL,
  `hf_serv` int(2) DEFAULT NULL,
  `deleted` int(1) DEFAULT '0',
  PRIMARY KEY (`num`),
  KEY `rediger` (`personne_id`),
  CONSTRAINT `rediger` FOREIGN KEY (`personne_id`) REFERENCES `personnes` (`id_pers`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rapports`
--

LOCK TABLES `rapports` WRITE;
/*!40000 ALTER TABLE `rapports` DISABLE KEYS */;
/*!40000 ALTER TABLE `rapports` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `super_admin`
--

DROP TABLE IF EXISTS `super_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `super_admin` (
  `id_admin` int(1) NOT NULL AUTO_INCREMENT,
  `nom_admin` varchar(11) DEFAULT NULL,
  `login` varchar(11) DEFAULT NULL,
  `pass` varchar(200) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `super_admin`
--

LOCK TABLES `super_admin` WRITE;
/*!40000 ALTER TABLE `super_admin` DISABLE KEYS */;
INSERT INTO `super_admin` VALUES (1,'superadmin','superadmin','f1a3ba82657a92caa97ec22d3d4897991f49543d53d1b68e2e8782df53c991a8');
/*!40000 ALTER TABLE `super_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `travail_problemes`
--

DROP TABLE IF EXISTS `travail_problemes`;
/*!50001 DROP VIEW IF EXISTS `travail_problemes`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `travail_problemes` AS SELECT 
 1 AS `nom_trav`,
 1 AS `date_trav`,
 1 AS `sup_id`,
 1 AS `id_pb`,
 1 AS `id`,
 1 AS `intitule_pb`,
 1 AS `date_enreg_pb`,
 1 AS `desc_pb`,
 1 AS `deleted`,
 1 AS `hd_trav`,
 1 AS `hf_trav`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `travaux`
--

DROP TABLE IF EXISTS `travaux`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `travaux` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nom_trav` varchar(255) NOT NULL,
  `date_trav` date DEFAULT NULL,
  `hd_trav` varchar(8) DEFAULT NULL,
  `hf_trav` varchar(8) DEFAULT NULL,
  `sup_id` int(10) DEFAULT NULL,
  `deleted` int(1) DEFAULT '0',
  `rapport_num` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `effectuer` (`rapport_num`),
  CONSTRAINT `effectuer` FOREIGN KEY (`rapport_num`) REFERENCES `rapports` (`num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `travaux`
--

LOCK TABLES `travaux` WRITE;
/*!40000 ALTER TABLE `travaux` DISABLE KEYS */;
/*!40000 ALTER TABLE `travaux` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'kamitbrains_taskman'
--
