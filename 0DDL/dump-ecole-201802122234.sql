-- MySQL dump 10.13  Distrib 5.7.13, for Win32 (AMD64)
--
-- Host: localhost    Database: ecole
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
  `idPack` int(11) DEFAULT NULL,
  `type` tinyint(2) DEFAULT NULL,
  `numero` varchar(25) DEFAULT NULL,
  `isUnique` tinyint(1) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idEleve` int(11) DEFAULT NULL,
  `idAnnee` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `abonnement`
--

LOCK TABLES `abonnement` WRITE;
/*!40000 ALTER TABLE `abonnement` DISABLE KEYS */;
/*!40000 ALTER TABLE `abonnement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `absence`
--

DROP TABLE IF EXISTS `absence`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `absence` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idEleve` int(11) NOT NULL,
  `idClasse` int(11) NOT NULL,
  `idAnnee` int(11) NOT NULL,
  `sequence1` int(11) DEFAULT NULL,
  `sequence2` int(11) DEFAULT NULL,
  `sequence3` int(11) DEFAULT NULL,
  `sequence4` int(11) DEFAULT NULL,
  `sequence5` int(11) DEFAULT NULL,
  `sequence6` int(11) DEFAULT NULL,
  `ajout` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `absence`
--

LOCK TABLES `absence` WRITE;
/*!40000 ALTER TABLE `absence` DISABLE KEYS */;
/*!40000 ALTER TABLE `absence` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `absent`
--

DROP TABLE IF EXISTS `absent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `absent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idJournal` int(11) DEFAULT NULL,
  `idEleve` int(11) DEFAULT NULL,
  `libEleve` varchar(255) DEFAULT NULL,
  `libMatricule` varchar(20) DEFAULT NULL,
  `etat` tinyint(1) DEFAULT '0',
  `sequence` tinyint(4) DEFAULT NULL,
  `idAnnee` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `raison` tinytext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `absent`
--

LOCK TABLES `absent` WRITE;
/*!40000 ALTER TABLE `absent` DISABLE KEYS */;
INSERT INTO `absent` VALUES (1,1,3,'Longtio Longtio Yannick','17S09118',1,1,1,'2017-11-13','undefined'),(2,1,5,'Ovah Khe Daniel Henry','17S09112',0,1,1,'2017-11-13',NULL),(3,1,1,'Tabi Jean','17S09114',0,1,1,'2017-11-13',NULL),(4,2,3,'Longtio Longtio Yannick','17S09118',0,1,1,'2017-11-13',NULL);
/*!40000 ALTER TABLE `absent` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `annee`
--

DROP TABLE IF EXISTS `annee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `annee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session` varchar(25) NOT NULL,
  `debut` date NOT NULL,
  `fin` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `etat` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `annee`
--

LOCK TABLES `annee` WRITE;
/*!40000 ALTER TABLE `annee` DISABLE KEYS */;
INSERT INTO `annee` VALUES (1,'2017-2018','2017-09-04','2018-06-30','2017-11-09 09:57:24',1);
/*!40000 ALTER TABLE `annee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bulletin`
--

DROP TABLE IF EXISTS `bulletin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bulletin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sequence1` tinyint(1) NOT NULL DEFAULT '0',
  `sequence2` tinyint(1) NOT NULL DEFAULT '0',
  `sequence3` tinyint(1) NOT NULL DEFAULT '0',
  `sequence4` tinyint(1) NOT NULL DEFAULT '0',
  `sequence5` tinyint(1) NOT NULL DEFAULT '0',
  `sequence6` tinyint(1) NOT NULL DEFAULT '0',
  `trimestre1` tinyint(1) NOT NULL DEFAULT '0',
  `trimestre2` tinyint(1) NOT NULL DEFAULT '0',
  `trimestre3` tinyint(1) NOT NULL DEFAULT '0',
  `activeSeq` tinyint(1) NOT NULL DEFAULT '1',
  `activeTri` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idAnnee` int(11) NOT NULL,
  `etat` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bulletin`
--

LOCK TABLES `bulletin` WRITE;
/*!40000 ALTER TABLE `bulletin` DISABLE KEYS */;
INSERT INTO `bulletin` VALUES (1,1,1,0,0,0,0,1,0,0,3,2,'2017-11-15 20:50:07',1,1);
/*!40000 ALTER TABLE `bulletin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `caisse`
--

DROP TABLE IF EXISTS `caisse`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `caisse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `debit` float DEFAULT '0',
  `credit` float DEFAULT '0',
  `solde` float DEFAULT '0',
  `last_debit` datetime DEFAULT NULL,
  `last_credit` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `caisse`
--

LOCK TABLES `caisse` WRITE;
/*!40000 ALTER TABLE `caisse` DISABLE KEYS */;
INSERT INTO `caisse` VALUES (1,10250,388500,378250,'2017-12-06 01:17:01','2017-12-06 01:58:59','2017-11-10 18:22:24');
/*!40000 ALTER TABLE `caisse` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `charge`
--

DROP TABLE IF EXISTS `charge`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `charge` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `idAnnee` int(11) DEFAULT NULL,
  `classes` varchar(255) DEFAULT NULL,
  `libClasse` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `montant` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `charge`
--

LOCK TABLES `charge` WRITE;
/*!40000 ALTER TABLE `charge` DISABLE KEYS */;
INSERT INTO `charge` VALUES (2,'Tenue de sport',1,'2,1','1ère C, 2nde A4 1','2017-12-04 17:02:33',4500),(3,'Formation en Management',1,'2','1ère C','2017-12-06 00:29:24',12000),(4,'Frais d\'informatique',1,'2','1ère C','2017-12-06 00:35:25',5000);
/*!40000 ALTER TABLE `charge` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `classe`
--

DROP TABLE IF EXISTS `classe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `classe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idAnnee` int(11) NOT NULL,
  `intitule` varchar(25) NOT NULL,
  `cycle` varchar(25) NOT NULL,
  `specialite` varchar(25) NOT NULL,
  `description` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nbre` int(11) NOT NULL DEFAULT '0',
  `etat` tinyint(4) NOT NULL DEFAULT '1',
  `position` varchar(100) DEFAULT NULL,
  `nom` varchar(20) DEFAULT NULL,
  `idLesClasses` int(11) DEFAULT NULL,
  `idLesSpecialites` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `classe`
--

LOCK TABLES `classe` WRITE;
/*!40000 ALTER TABLE `classe` DISABLE KEYS */;
INSERT INTO `classe` VALUES (1,1,'2nde','Second cycle','A4','','2017-11-09 10:03:48',1,1,'1','2nde A4 1',2,1),(2,1,'1ére','Second cycle','C','','2017-11-09 10:08:29',6,1,'','1ère C',1,2);
/*!40000 ALTER TABLE `classe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `classe_eleve`
--

DROP TABLE IF EXISTS `classe_eleve`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `classe_eleve` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idEleve` int(11) DEFAULT NULL,
  `idClasse` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `etat` tinyint(4) DEFAULT '1',
  `libClasse` varchar(255) DEFAULT NULL,
  `redouble` varchar(10) DEFAULT 'NON',
  `libNom` varchar(100) DEFAULT NULL,
  `idAnnee` int(11) DEFAULT NULL,
  `idLesClasses` int(11) DEFAULT NULL,
  `libEleve` varchar(255) DEFAULT NULL,
  `libAge` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `classe_eleve`
--

LOCK TABLES `classe_eleve` WRITE;
/*!40000 ALTER TABLE `classe_eleve` DISABLE KEYS */;
INSERT INTO `classe_eleve` VALUES (1,4,2,'2017-11-09 13:21:57',1,'1ère C','NON','1ére',1,1,'Abesso Marguerite','2000-10-24'),(2,3,2,'2017-11-09 13:22:10',1,'1ère C','NON','1ére',1,1,'Longtio Longtio Yanninck','2004-04-24'),(3,2,2,'2017-11-09 13:22:22',1,'1ère C','NON','1ére',1,1,'Missah Njieh Gregorine','2001-08-13'),(4,5,2,'2017-11-09 13:22:41',1,'1ère C','OUI','1ére',1,1,'Ovah Khe Daniel Henry','1998-06-07'),(5,1,2,'2017-11-09 13:24:16',1,'1ère C','NON','1ére',1,1,'Tabi Jean','2003-11-08'),(6,6,2,'2017-11-11 11:47:56',1,'1ère C','NON','1ére',1,1,'Teguia Francine','2000-03-12'),(7,7,1,'2017-12-06 00:43:46',1,'2nde A4 1','OUI','2nde',1,2,'Kassi Pendji Jolie Helise','2001-07-23');
/*!40000 ALTER TABLE `classe_eleve` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `convocation`
--

DROP TABLE IF EXISTS `convocation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `convocation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idEleve` int(11) NOT NULL,
  `idAuteur` int(11) NOT NULL,
  `responsable` varchar(255) NOT NULL,
  `objet` tinytext NOT NULL,
  `jour` date NOT NULL,
  `heure` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `etat` tinyint(2) NOT NULL DEFAULT '0',
  `detail` text,
  `idAnnee` int(11) DEFAULT NULL,
  `idClasse` int(11) DEFAULT NULL,
  `libClasse` varchar(150) DEFAULT NULL,
  `libEleve` varchar(200) DEFAULT NULL,
  `sequence` tinyint(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `convocation`
--

LOCK TABLES `convocation` WRITE;
/*!40000 ALTER TABLE `convocation` DISABLE KEYS */;
INSERT INTO `convocation` VALUES (1,4,1,'Founda Wafo Alain Chris','Bagarre avec un camarade','2017-11-11','10:30','2017-11-10 14:19:08',0,'Il s\'est bagarré avec un élève de la classe de 2nde A4 pour des raisons que nous ignorons encore.\nBien vouloir vous rendre à l\'heure SVP',1,2,'1ère C','Abessolo Marguerite',NULL);
/*!40000 ALTER TABLE `convocation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cost`
--

DROP TABLE IF EXISTS `cost`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cost` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `type` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cost`
--

LOCK TABLES `cost` WRITE;
/*!40000 ALTER TABLE `cost` DISABLE KEYS */;
INSERT INTO `cost` VALUES (1,'Paiement des frais de scolarité',1,'2017-11-11 08:50:53'),(2,'Annulation du paiement des frais de scolarité',2,'2017-11-11 08:50:53'),(3,'Souscription aux SMS de notifications',1,'2017-11-11 08:51:35'),(4,'Paiement d\'autres frais',1,'2017-12-05 09:15:36'),(5,'Annulation du paiement d\'autres frais',2,'2017-12-06 00:12:12'),(6,'Salaire du personnel',2,'2017-11-11 09:47:32'),(7,'Nutrition',2,'2017-11-11 09:47:46'),(8,'Facture d\'electricité',2,'2017-11-11 09:46:52'),(9,'Facture d\'eau',2,'2017-11-11 09:47:13');
/*!40000 ALTER TABLE `cost` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cours`
--

DROP TABLE IF EXISTS `cours`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cours` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idEnseignant` int(11) DEFAULT NULL,
  `idClasse` int(11) NOT NULL,
  `idMatiere` int(11) NOT NULL,
  `libMatiere` varchar(100) NOT NULL,
  `libClasse` varchar(100) NOT NULL,
  `coefficient` int(2) NOT NULL,
  `etat` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `state1` tinyint(4) NOT NULL DEFAULT '0',
  `state2` tinyint(4) NOT NULL DEFAULT '0',
  `state3` tinyint(4) NOT NULL DEFAULT '0',
  `state4` tinyint(4) NOT NULL DEFAULT '0',
  `state5` tinyint(4) NOT NULL DEFAULT '0',
  `state6` tinyint(4) NOT NULL DEFAULT '0',
  `state7` tinyint(4) NOT NULL DEFAULT '0',
  `state8` tinyint(4) NOT NULL DEFAULT '0',
  `state9` tinyint(4) NOT NULL DEFAULT '0',
  `state10` tinyint(4) NOT NULL DEFAULT '0',
  `state11` tinyint(4) NOT NULL DEFAULT '0',
  `state12` tinyint(4) NOT NULL DEFAULT '0',
  `etat1` tinyint(1) NOT NULL DEFAULT '0',
  `etat2` tinyint(1) NOT NULL DEFAULT '0',
  `etat3` tinyint(1) NOT NULL DEFAULT '0',
  `etat4` tinyint(1) NOT NULL DEFAULT '0',
  `etat5` tinyint(1) NOT NULL DEFAULT '0',
  `etat6` tinyint(1) NOT NULL DEFAULT '0',
  `idsOld` varchar(255) DEFAULT NULL,
  `datesOld` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cours`
--

LOCK TABLES `cours` WRITE;
/*!40000 ALTER TABLE `cours` DISABLE KEYS */;
INSERT INTO `cours` VALUES (1,2,2,1,'Chimie','1ère C',2,1,'2017-11-09 10:08:51',1,1,1,1,0,0,0,0,0,0,0,0,1,1,0,0,0,0,NULL,NULL),(2,3,2,2,'Géographie','1ère C',1,1,'2017-11-09 10:11:20',1,1,1,1,0,0,0,0,0,0,0,0,1,1,0,0,0,0,NULL,NULL),(3,3,1,2,'Géographie','2nde A4 1',2,1,'2017-11-09 10:11:38',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),(4,5,2,5,'Physique','1ère C',3,1,'2017-11-09 15:27:42',1,1,1,1,0,0,0,0,0,0,0,0,1,1,0,0,0,0,NULL,NULL),(5,4,2,3,'Mathématiques','1ère C',6,1,'2017-11-09 15:27:59',1,1,1,1,0,0,0,0,0,0,0,0,1,1,0,0,0,0,NULL,NULL),(6,6,2,4,'Anglais','1ère C',2,1,'2017-11-09 15:29:25',1,1,1,1,0,0,0,0,0,0,0,0,1,1,0,0,0,0,'6+3','2017-11-10 08:32:43+2017-11-10 08:33:01');
/*!40000 ALTER TABLE `cours` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eleve`
--

DROP TABLE IF EXISTS `eleve`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eleve` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `naissance` date NOT NULL,
  `pere` varchar(150) DEFAULT NULL,
  `mere` varchar(150) DEFAULT NULL,
  `ville` varchar(100) NOT NULL,
  `quartier` varchar(100) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `sexe` varchar(20) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `numero` varchar(20) DEFAULT NULL,
  `matricule` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `urgences` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL DEFAULT 'assets/images/user.png',
  `acte` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `etat` tinyint(4) NOT NULL DEFAULT '1',
  `last_login` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eleve`
--

LOCK TABLES `eleve` WRITE;
/*!40000 ALTER TABLE `eleve` DISABLE KEYS */;
INSERT INTO `eleve` VALUES (1,'Tabi','Jean','2003-11-08','Tabi Honore','Tabi Jisette','Douala','Akwa','Kokotier','Masculin','','','17S09114','39dfa55283318d31afe5a3ff4a0e3253e2045e43','677778899','assets/images/user.png',NULL,'2017-11-09 13:15:54',1,NULL),(2,'Missah Njieh','Gregorine','2001-08-13','Njieh Joseph','Njieh Kevine','Douala','Village','Borne 10','Feminin','','','17S09112','39dfa55283318d31afe5a3ff4a0e3253e2045e43','655544552','assets/images/user.png',NULL,'2017-11-09 13:17:32',1,NULL),(3,'Longtio Longtio','Yannick','2004-04-24','Longtio Claude','Bissah Josline','Douala','Bonapriso','Rue Koloko','Masculin','','','17S09118','39dfa55283318d31afe5a3ff4a0e3253e2045e43','698890000','assets/images/user.png',NULL,'2017-11-09 13:18:52',1,NULL),(4,'Abessolo','Marguerite','2000-10-24','Penda Franck','Pendi Jeanne','Douala','Cité des palmiers','En face solexto','Feminin','','','17S09119','39dfa55283318d31afe5a3ff4a0e3253e2045e43','677556677','assets/images/user.png',NULL,'2017-11-09 13:20:41',1,NULL),(5,'Ovah Khe','Daniel Henry','1998-06-07','Khe Paul','Khe Aline','Douala','Bonamoussadi','Sonel','Masculin','','','17S09112','39dfa55283318d31afe5a3ff4a0e3253e2045e43','672737273','assets/images/user.png',NULL,'2017-11-09 13:21:43',1,NULL),(6,'Teguia','Francine','2000-03-12','teguia Alain','Tongou jeanne','Douala','Pk11','Arrêt bus','Feminin','','','17S11113','39dfa55283318d31afe5a3ff4a0e3253e2045e43','655555555','assets/images/user.png',NULL,'2017-11-11 11:46:45',1,NULL),(7,'Kassi Pendji','Jolie Helise','2001-07-23','Pendji Franck','Pella Vanessa','Douala','New Bell','Kassalafam','Feminin','','','17S06124','39dfa55283318d31afe5a3ff4a0e3253e2045e43','654544557','assets/images/user.png',NULL,'2017-12-06 00:43:33',1,NULL);
/*!40000 ALTER TABLE `eleve` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enseignant`
--

DROP TABLE IF EXISTS `enseignant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `enseignant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` tinyint(1) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `sexe` varchar(20) NOT NULL,
  `naissance` date NOT NULL,
  `cni` varchar(20) NOT NULL,
  `imageCni` varchar(255) DEFAULT NULL,
  `diplome` varchar(255) DEFAULT NULL,
  `imageDiplome` varchar(255) DEFAULT NULL,
  `numero` varchar(20) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `matricule` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `minibio` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ville` varchar(100) DEFAULT NULL,
  `quartier` varchar(150) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT 'assets/images/user.png',
  `fonction` varchar(255) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `etat` tinyint(4) DEFAULT '1',
  `privilege` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enseignant`
--

LOCK TABLES `enseignant` WRITE;
/*!40000 ALTER TABLE `enseignant` DISABLE KEYS */;
INSERT INTO `enseignant` VALUES (1,2,'Founda Wafo','Alain Chris','Masculin','1987-11-26','10000956676798',NULL,'Master 2',NULL,'671717171','alain@yahoo.fr','15A11261','7110eda4d09e062aa5e4a390b0a572ac0d2c0220','','2017-11-09 09:47:15','Douala','New Bell','CBC Nguangue','assets/images/user.png','Informaticien en chef','2018-02-12 21:39:04',1,'CHANGE_PRIVILEGE'),(2,1,'Ntah Teki','Manuella Caprice','Feminin','1993-06-15','1256767980090871',NULL,'Master 2',NULL,'655555555','ntah@yahoo.fr','17E09117','39dfa55283318d31afe5a3ff4a0e3253e2045e43','Une fille brave et engagée','2017-11-09 09:54:01','Douala','Cité Sic','Belle Hollandaise','assets/images/user.png','Enseignant','2018-01-17 09:01:07',1,NULL),(3,1,'Dandan','Pierre Leger','Masculin','1985-11-12','13287398383972',NULL,'Master 1',NULL,'697340877','leger@yahoo.fr','17E09111','39dfa55283318d31afe5a3ff4a0e3253e2045e43','','2017-11-09 10:10:39','Douala','Ngodi','Derrière Pharmacie Sapeurs','assets/images/user.png','Enseignant','2017-11-15 08:58:45',1,NULL),(4,1,'Yopa','Fabrice','Masculin','1991-12-13','13563813786878',NULL,'License',NULL,'697397239','fabrice@yahoo.fr','17E09115','39dfa55283318d31afe5a3ff4a0e3253e2045e43','','2017-11-09 15:26:17','Douala','Bepanda','Omnisport','assets/images/user.png','Enseignant','2017-11-15 08:54:01',1,NULL),(5,1,'Tamko','Romance Emmanuel','Masculin','1990-04-12','15677809973',NULL,'Master 2',NULL,'655443322','romance@yahoo.fr','17E09113','39dfa55283318d31afe5a3ff4a0e3253e2045e43','','2017-11-09 15:27:24','Douala','New Bell','Camp Yabassi','assets/images/user.png','PSEC','2017-11-15 08:59:34',1,NULL),(6,1,'Fontah','Derick','Masculin','1973-03-23','154543626398',NULL,'Master 2',NULL,'671538976','fontah@yahoo.fr','17E09119','39dfa55283318d31afe5a3ff4a0e3253e2045e43','','2017-11-09 15:29:10','Douala','Bonamoussadi','Lundi','assets/images/user.png','PLEG','2017-11-15 08:59:11',1,NULL);
/*!40000 ALTER TABLE `enseignant` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `journal`
--

DROP TABLE IF EXISTS `journal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `journal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idCours` int(11) NOT NULL,
  `idEnseignant` int(11) NOT NULL,
  `idClasse` int(11) NOT NULL,
  `idMatiere` int(11) NOT NULL,
  `jour` date NOT NULL,
  `debut` varchar(10) DEFAULT NULL,
  `fin` varchar(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `libMatiere` varchar(255) DEFAULT NULL,
  `libEnseignant` varchar(255) DEFAULT NULL,
  `nbre` int(11) DEFAULT '0',
  `sequence` tinyint(4) NOT NULL,
  `verbal` text,
  `idAnnee` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `journal`
--

LOCK TABLES `journal` WRITE;
/*!40000 ALTER TABLE `journal` DISABLE KEYS */;
INSERT INTO `journal` VALUES (1,2,3,2,2,'2017-11-13','7:15','9:15','2017-11-13 13:05:03','Géographie','Dandan Pierre Leger',2,1,'RAS',1),(2,5,4,2,3,'2017-11-13','9:45','11:45','2017-11-13 13:13:35','Mathématiques','Yopa Fabrice',2,1,'Beaucoup de bavardage dans la classe',1);
/*!40000 ALTER TABLE `journal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `les_classes`
--

DROP TABLE IF EXISTS `les_classes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `les_classes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `abrege` varchar(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `les_classes`
--

LOCK TABLES `les_classes` WRITE;
/*!40000 ALTER TABLE `les_classes` DISABLE KEYS */;
INSERT INTO `les_classes` VALUES (1,'Première','1ère','2017-12-05 08:15:50'),(2,'Seconde','2nde','2017-12-05 08:16:05');
/*!40000 ALTER TABLE `les_classes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `les_specialites`
--

DROP TABLE IF EXISTS `les_specialites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `les_specialites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `abrege` varchar(15) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `les_specialites`
--

LOCK TABLES `les_specialites` WRITE;
/*!40000 ALTER TABLE `les_specialites` DISABLE KEYS */;
INSERT INTO `les_specialites` VALUES (1,'Lettres et seconde langue','A4','2017-12-05 08:18:24'),(2,'Sciences Mathématiques','C','2017-12-05 08:18:55');
/*!40000 ALTER TABLE `les_specialites` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `matiere`
--

DROP TABLE IF EXISTS `matiere`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `matiere` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `intitule` varchar(50) NOT NULL,
  `sygle` varchar(10) DEFAULT NULL,
  `description` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `matiere`
--

LOCK TABLES `matiere` WRITE;
/*!40000 ALTER TABLE `matiere` DISABLE KEYS */;
INSERT INTO `matiere` VALUES (1,'Chimie','Chim','','2017-11-09 10:05:34'),(2,'Géographie','Geo','','2017-11-09 10:05:56'),(3,'Mathématiques','Maths','','2017-11-09 10:06:13'),(4,'Anglais','Ang','','2017-11-09 10:07:06'),(5,'Physique','Phy','','2017-11-09 10:09:18');
/*!40000 ALTER TABLE `matiere` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `note`
--

DROP TABLE IF EXISTS `note`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `note` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idEleve` int(11) NOT NULL,
  `idCours` int(11) NOT NULL,
  `idEnseignant` int(11) NOT NULL,
  `coefficient` tinyint(2) NOT NULL,
  `idClasse` int(11) NOT NULL,
  `cc1` float DEFAULT NULL,
  `exam1` float DEFAULT NULL,
  `dateCC1` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `dateExam1` timestamp NULL DEFAULT NULL,
  `sequence1` float DEFAULT NULL,
  `cc2` float DEFAULT NULL,
  `exam2` float DEFAULT NULL,
  `dateCC2` timestamp NULL DEFAULT NULL,
  `dateExam2` timestamp NULL DEFAULT NULL,
  `sequence2` float DEFAULT NULL,
  `cc3` float DEFAULT NULL,
  `exam3` float DEFAULT NULL,
  `dateCC3` timestamp NULL DEFAULT NULL,
  `dateExam3` timestamp NULL DEFAULT NULL,
  `sequence3` float DEFAULT NULL,
  `cc4` float DEFAULT NULL,
  `exam4` float DEFAULT NULL,
  `dateCC4` timestamp NULL DEFAULT NULL,
  `dateExam4` timestamp NULL DEFAULT NULL,
  `sequence4` float DEFAULT NULL,
  `cc5` float DEFAULT NULL,
  `exam5` float DEFAULT NULL,
  `dateCC5` timestamp NULL DEFAULT NULL,
  `dateExam5` timestamp NULL DEFAULT NULL,
  `sequence5` float DEFAULT NULL,
  `cc6` float DEFAULT NULL,
  `exam6` float DEFAULT NULL,
  `dateCC6` timestamp NULL DEFAULT NULL,
  `dateExam6` timestamp NULL DEFAULT NULL,
  `sequence6` float DEFAULT NULL,
  `trimestre1` float DEFAULT NULL,
  `trimestre2` float DEFAULT NULL,
  `trimestre3` float DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `seq1` float DEFAULT NULL,
  `seq2` float DEFAULT NULL,
  `seq3` float DEFAULT NULL,
  `seq4` float DEFAULT NULL,
  `seq5` float DEFAULT NULL,
  `seq6` float DEFAULT NULL,
  `libMatiere` varchar(255) DEFAULT NULL,
  `libEnseignant` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `note`
--

LOCK TABLES `note` WRITE;
/*!40000 ALTER TABLE `note` DISABLE KEYS */;
INSERT INTO `note` VALUES (1,4,2,3,1,2,12.5,11,'2017-12-01 18:04:43','2017-12-01 18:03:04',NULL,12,8,'2017-12-01 18:03:12','2017-12-01 18:03:20',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,9.99,NULL,NULL,'2017-11-09 14:28:20',11.38,8.6,NULL,NULL,NULL,NULL,'Géographie','Dandan Pierre Leger'),(2,3,2,3,1,2,9,15,'2017-12-01 18:04:43','2017-12-01 18:03:04',NULL,15,13,'2017-12-01 18:03:12','2017-12-01 18:03:20',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,13.4,NULL,NULL,'2017-11-09 14:28:20',13.5,13.3,NULL,NULL,NULL,NULL,'Géographie','Dandan Pierre Leger'),(3,2,2,3,1,2,8.75,9.75,'2017-12-01 18:04:43','2017-12-01 18:03:04',NULL,13,11,'2017-12-01 18:03:12','2017-12-01 18:03:20',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,10.4,NULL,NULL,'2017-11-09 14:28:20',9.5,11.3,NULL,NULL,NULL,NULL,'Géographie','Dandan Pierre Leger'),(4,5,2,3,1,2,13.25,10,'2017-12-01 18:04:43','2017-12-01 18:03:04',NULL,16.5,10,'2017-12-01 18:03:12','2017-12-01 18:03:20',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,10.9,NULL,NULL,'2017-11-09 14:28:20',10.81,10.98,NULL,NULL,NULL,NULL,'Géographie','Dandan Pierre Leger'),(5,1,2,3,1,2,11,7,'2017-12-01 18:04:43','2017-12-01 18:03:04',NULL,9,13,'2017-12-01 18:03:12','2017-12-01 18:03:20',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,10.2,NULL,NULL,'2017-11-09 14:28:20',8,12.4,NULL,NULL,NULL,NULL,'Géographie','Dandan Pierre Leger'),(6,4,6,6,2,2,12,13.25,'2017-12-01 18:05:27','2017-12-01 18:05:06',NULL,9.75,-1,'2017-12-01 18:05:17','2017-12-01 18:05:27',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,11.38,NULL,NULL,'2017-11-09 15:30:12',13,9.75,NULL,NULL,NULL,NULL,'Anglais','Fontah Derick'),(7,3,6,6,2,2,9.75,14.25,'2017-12-01 18:06:04','2017-12-01 18:05:06',NULL,8.25,13,'2017-12-01 18:05:17','2017-12-01 18:05:27',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,12.82,NULL,NULL,'2017-11-09 15:30:12',13.35,12.29,NULL,NULL,NULL,NULL,'Anglais','Fontah Derick'),(8,2,6,6,2,2,11,7,'2017-12-01 18:06:04','2017-12-01 18:05:06',NULL,12,11,'2017-12-01 18:05:17','2017-12-01 18:05:27',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,9.48,NULL,NULL,'2017-11-09 15:30:12',7.8,11.15,NULL,NULL,NULL,NULL,'Anglais','Fontah Derick'),(9,5,6,6,2,2,12,5.75,'2017-12-01 18:06:04','2017-12-01 18:05:06',NULL,11,7.75,'2017-12-01 18:05:17','2017-12-01 18:05:27',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,7.62,NULL,NULL,'2017-11-09 15:30:12',7,8.24,NULL,NULL,NULL,NULL,'Anglais','Fontah Derick'),(10,1,6,6,2,2,-1,17.5,'2017-12-01 18:06:04','2017-12-01 18:05:06',NULL,16.5,18.25,'2017-12-01 18:05:17','2017-12-01 18:05:27',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,17.75,NULL,NULL,'2017-11-09 15:30:12',17.5,17.99,NULL,NULL,NULL,NULL,'Anglais','Fontah Derick'),(11,4,5,4,6,2,9,11,'2017-11-15 07:58:28','2017-11-15 07:08:04',NULL,12,9.75,'2017-11-15 07:08:39','2017-11-15 07:09:24',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,10.46,NULL,NULL,'2017-11-15 07:07:33',10.6,10.31,NULL,NULL,NULL,NULL,'Mathématiques','Yopa Fabrice'),(12,3,5,4,6,2,8.5,9,'2017-11-15 07:58:28','2017-11-15 07:08:04',NULL,8,11,'2017-11-15 07:08:39','2017-11-15 07:09:24',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,9.58,NULL,NULL,'2017-11-15 07:07:33',8.9,10.25,NULL,NULL,NULL,NULL,'Mathématiques','Yopa Fabrice'),(13,2,5,4,6,2,6.5,7.75,'2017-11-15 07:58:28','2017-11-15 07:08:04',NULL,7,12,'2017-11-15 07:08:39','2017-11-15 07:09:24',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,9.13,NULL,NULL,'2017-11-15 07:07:33',7.5,10.75,NULL,NULL,NULL,NULL,'Mathématiques','Yopa Fabrice'),(14,5,5,4,6,2,13,12,'2017-11-15 07:58:28','2017-11-15 07:08:04',NULL,11.5,8.75,'2017-11-15 07:08:39','2017-11-15 07:09:24',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,10.82,NULL,NULL,'2017-11-15 07:07:33',12.2,9.44,NULL,NULL,NULL,NULL,'Mathématiques','Yopa Fabrice'),(15,1,5,4,6,2,11,15.5,'2017-11-15 07:58:28','2017-11-15 07:08:04',NULL,13.75,16.25,'2017-11-15 07:08:39','2017-11-15 07:09:24',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,15.12,NULL,NULL,'2017-11-15 07:07:33',14.6,15.63,NULL,NULL,NULL,NULL,'Mathématiques','Yopa Fabrice'),(16,6,5,4,6,2,5,13,'2017-11-15 07:58:28','2017-11-15 07:08:04',NULL,13.25,17.5,'2017-11-15 07:08:39','2017-11-15 07:09:24',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,13.92,NULL,NULL,'2017-11-15 07:07:33',11.4,16.44,NULL,NULL,NULL,NULL,'Mathématiques','Yopa Fabrice'),(17,4,4,5,3,2,12,9.75,'2017-11-15 07:59:49','2017-11-15 07:52:23',NULL,11,4.75,'2017-11-15 07:52:28','2017-11-15 07:52:34',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,8.36,NULL,NULL,'2017-11-15 07:24:54',10.09,6.63,NULL,NULL,NULL,NULL,'Physique','Tamko Romance Emmanuel'),(18,3,4,5,3,2,9,6.5,'2017-11-15 07:59:49','2017-11-15 07:52:23',NULL,9,7.75,'2017-11-15 07:52:28','2017-11-15 07:52:34',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,7.51,NULL,NULL,'2017-11-15 07:24:54',6.88,8.13,NULL,NULL,NULL,NULL,'Physique','Tamko Romance Emmanuel'),(19,2,4,5,3,2,11,12,'2017-11-15 07:59:49','2017-11-15 07:52:23',NULL,13,8,'2017-11-15 07:52:28','2017-11-15 07:52:34',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,10.68,NULL,NULL,'2017-11-15 07:24:54',11.85,9.5,NULL,NULL,NULL,NULL,'Physique','Tamko Romance Emmanuel'),(20,5,4,5,3,2,13,8.25,'2017-11-15 07:59:49','2017-11-15 07:52:23',NULL,11,6,'2017-11-15 07:52:28','2017-11-15 07:52:34',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,8.23,NULL,NULL,'2017-11-15 07:24:54',8.96,7.5,NULL,NULL,NULL,NULL,'Physique','Tamko Romance Emmanuel'),(21,1,4,5,3,2,16.25,15,'2017-11-15 07:59:49','2017-11-15 07:52:23',NULL,16,12.25,'2017-11-15 07:52:28','2017-11-15 07:52:34',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,14.29,NULL,NULL,'2017-11-15 07:24:54',15.19,13.38,NULL,NULL,NULL,NULL,'Physique','Tamko Romance Emmanuel'),(22,6,4,5,3,2,17,17.5,'2017-11-15 07:59:49','2017-11-15 07:52:23',NULL,18.25,18.75,'2017-11-15 07:52:28','2017-11-15 07:52:34',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,18.02,NULL,NULL,'2017-11-15 07:24:54',17.43,18.6,NULL,NULL,NULL,NULL,'Physique','Tamko Romance Emmanuel'),(23,4,1,2,2,2,12,9,'2017-11-15 08:00:13','2017-11-15 07:50:20',NULL,13,12.25,'2017-11-15 07:50:26','2017-11-15 07:50:32',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,11.13,NULL,NULL,'2017-11-15 07:28:03',9.9,12.36,NULL,NULL,NULL,NULL,'Chimie','Ntah Teki Manuella Caprice'),(24,3,1,2,2,2,11,10,'2017-11-15 08:00:13','2017-11-15 07:50:20',NULL,14,13.25,'2017-11-15 07:50:26','2017-11-15 07:50:32',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,11.83,NULL,NULL,'2017-11-15 07:28:03',10.3,13.36,NULL,NULL,NULL,NULL,'Chimie','Ntah Teki Manuella Caprice'),(25,2,1,2,2,2,13,8.5,'2017-11-15 08:00:13','2017-11-15 07:50:20',NULL,13,11,'2017-11-15 07:50:26','2017-11-15 07:50:32',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,10.58,NULL,NULL,'2017-11-15 07:28:03',9.85,11.3,NULL,NULL,NULL,NULL,'Chimie','Ntah Teki Manuella Caprice'),(26,5,1,2,2,2,8.5,13,'2017-11-15 08:00:13','2017-11-15 07:50:20',NULL,9.75,7.5,'2017-11-15 07:50:26','2017-11-15 07:50:32',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,9.75,NULL,NULL,'2017-11-15 07:28:03',11.65,7.84,NULL,NULL,NULL,NULL,'Chimie','Ntah Teki Manuella Caprice'),(27,1,1,2,2,2,14,12,'2017-11-15 08:00:13','2017-11-15 07:50:20',NULL,11.5,14.75,'2017-11-15 07:50:26','2017-11-15 07:50:32',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,13.43,NULL,NULL,'2017-11-15 07:28:03',12.6,14.26,NULL,NULL,NULL,NULL,'Chimie','Ntah Teki Manuella Caprice'),(28,6,1,2,2,2,19,18.75,'2017-11-15 08:00:13','2017-11-15 07:50:20',NULL,17.5,18,'2017-11-15 07:50:26','2017-11-15 07:50:32',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,18.38,NULL,NULL,'2017-11-15 07:28:03',18.83,17.93,NULL,NULL,NULL,NULL,'Chimie','Ntah Teki Manuella Caprice'),(29,6,6,6,2,2,11.25,14.75,'2017-12-01 18:06:04','2017-12-01 18:05:06',NULL,15.25,17.75,'2017-12-01 18:05:17','2017-12-01 18:05:27',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,15.72,NULL,NULL,'2017-12-01 17:50:43',14.05,17.38,NULL,NULL,NULL,NULL,'Anglais','Fontah Derick'),(30,6,2,3,1,2,13,14,'2017-12-01 18:04:43','2017-12-01 18:03:04',NULL,15,17,'2017-12-01 18:03:12','2017-12-01 18:03:20',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,15.23,NULL,NULL,'2017-12-01 18:02:55',13.75,16.7,NULL,NULL,NULL,NULL,'Géographie','Dandan Pierre Leger');
/*!40000 ALTER TABLE `note` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notification`
--

DROP TABLE IF EXISTS `notification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idAnnee` int(11) NOT NULL,
  `idClasse` int(11) NOT NULL,
  `idEleve` int(11) NOT NULL,
  `numero` varchar(25) NOT NULL,
  `libClasse` varchar(150) NOT NULL,
  `nbre` int(11) NOT NULL DEFAULT '1',
  `libMatiere` varchar(150) DEFAULT NULL,
  `type` varchar(25) DEFAULT NULL,
  `intitule` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `libEleve` varchar(150) DEFAULT NULL,
  `etat` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notification`
--

LOCK TABLES `notification` WRITE;
/*!40000 ALTER TABLE `notification` DISABLE KEYS */;
/*!40000 ALTER TABLE `notification` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pack`
--

DROP TABLE IF EXISTS `pack`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pack` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` tinyint(2) DEFAULT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `detail` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `prix` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pack`
--

LOCK TABLES `pack` WRITE;
/*!40000 ALTER TABLE `pack` DISABLE KEYS */;
INSERT INTO `pack` VALUES (1,2,'Pack retard','Vous envoie les SMS lorsque l\'enfant est en retard','2017-11-10 17:07:00',2500);
/*!40000 ALTER TABLE `pack` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paie`
--

DROP TABLE IF EXISTS `paie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idAnnee` int(11) DEFAULT NULL,
  `idCharge` int(11) DEFAULT NULL,
  `idEleve` int(11) DEFAULT NULL,
  `idClasse` int(11) DEFAULT NULL,
  `libEleve` varchar(255) DEFAULT NULL,
  `libClasse` varchar(100) DEFAULT NULL,
  `montant` float DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `payeur` varchar(255) DEFAULT NULL,
  `libCharge` varchar(255) DEFAULT NULL,
  `reste` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paie`
--

LOCK TABLES `paie` WRITE;
/*!40000 ALTER TABLE `paie` DISABLE KEYS */;
INSERT INTO `paie` VALUES (2,1,2,2,2,'Missah Njieh Gregorine','1ère C',4500,'2017-12-06 00:28:23','Missah Njieh Gregorine','Tenue de sport',NULL),(3,1,4,2,2,'Missah Njieh Gregorine','1ère C',5000,'2017-12-06 00:38:56','Missah Njieh Gregorine','Frais d\'informatique',NULL),(4,1,4,4,2,'Abesso Marguerite','1ère C',5000,'2017-12-06 00:45:56','Abessolo Marguerite','Frais d\'informatique',NULL),(5,1,3,4,2,'Abesso Marguerite','1ère C',12000,'2017-12-06 00:46:02','Abessolo Marguerite','Formation en Management',NULL),(6,1,2,4,2,'Abesso Marguerite','1ère C',4500,'2017-12-06 00:46:07','Abessolo Marguerite','Tenue de sport',NULL),(7,1,2,7,1,'Kassi Pendji Jolie Helise','2nde A4 1',4500,'2017-12-06 00:58:59','Kassi Pendji Jolie Helise','Tenue de sport',NULL);
/*!40000 ALTER TABLE `paie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paiement`
--

DROP TABLE IF EXISTS `paiement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paiement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idEleve` int(11) NOT NULL,
  `idScolarite` int(11) NOT NULL,
  `idAnnee` int(11) NOT NULL,
  `libSession` varchar(50) NOT NULL,
  `montant` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `libClasse` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `payeur` varchar(255) DEFAULT NULL,
  `reste` int(11) DEFAULT NULL,
  `libEleve` varchar(255) DEFAULT NULL,
  `idLesClasses` int(11) DEFAULT NULL,
  `idClasse` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paiement`
--

LOCK TABLES `paiement` WRITE;
/*!40000 ALTER TABLE `paiement` DISABLE KEYS */;
INSERT INTO `paiement` VALUES (1,6,1,1,'2017-2018',15000,'Frais d\'inscription','1ère C','2017-11-11 11:49:16','Panga Jean',168000,'Teguia Francine',1,2),(2,2,1,1,'2017-2018',90000,'Frais d\'inscription et 1ère tranche','1ère C','2017-12-06 00:26:54','Missah Njieh Gregorine',93000,'Missah Njieh Gregorine',1,2),(3,4,1,1,'2017-2018',143500,'Frais d\'inscription   1ère et 2ème tranches','1ère C','2017-12-06 00:45:24','Abessolo Marguerite',39500,'Abessolo Marguerite',1,2),(4,7,2,1,'2017-2018',100000,'Frais inscription   1ère et 2ème tranches','2nde A4 1','2017-12-06 00:58:47','Kassi Pendji Jolie Helise',20000,'Kassi Pendji Jolie Helise',2,1);
/*!40000 ALTER TABLE `paiement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sanction`
--

DROP TABLE IF EXISTS `sanction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sanction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idEleve` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `jour` datetime DEFAULT NULL,
  `detail` text NOT NULL,
  `etat` tinyint(2) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idAnnee` int(11) DEFAULT NULL,
  `idClasse` int(11) DEFAULT NULL,
  `libClasse` varchar(150) DEFAULT NULL,
  `libEleve` varchar(200) DEFAULT NULL,
  `fin` datetime DEFAULT NULL,
  `idAuteur` int(11) DEFAULT NULL,
  `responsable` varchar(255) DEFAULT NULL,
  `idType` int(11) DEFAULT NULL,
  `categorie` varchar(100) DEFAULT NULL,
  `sequence` tinyint(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sanction`
--

LOCK TABLES `sanction` WRITE;
/*!40000 ALTER TABLE `sanction` DISABLE KEYS */;
/*!40000 ALTER TABLE `sanction` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `scolarite`
--

DROP TABLE IF EXISTS `scolarite`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `scolarite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idAnnee` int(11) NOT NULL,
  `classe` varchar(100) DEFAULT NULL,
  `inscription` int(11) DEFAULT NULL,
  `tranche1` int(11) DEFAULT NULL,
  `tranche2` int(11) DEFAULT NULL,
  `tranche3` int(11) DEFAULT NULL,
  `total` int(11) NOT NULL,
  `dossier` int(11) DEFAULT NULL,
  `limite1` date DEFAULT NULL,
  `limite2` date DEFAULT NULL,
  `limite3` date DEFAULT NULL,
  `limite` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `etat` tinyint(4) DEFAULT '1',
  `ape` int(11) DEFAULT NULL,
  `autres` int(11) DEFAULT NULL,
  `delai_inscription` date DEFAULT NULL,
  `delai_tranche1` date DEFAULT NULL,
  `delai_tranche2` date DEFAULT NULL,
  `delai_tranche3` date DEFAULT NULL,
  `idLesClasses` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `scolarite`
--

LOCK TABLES `scolarite` WRITE;
/*!40000 ALTER TABLE `scolarite` DISABLE KEYS */;
INSERT INTO `scolarite` VALUES (1,1,'1ére',15000,75000,35000,25000,183000,14500,NULL,NULL,NULL,NULL,'2017-11-10 08:29:54',1,10000,8500,NULL,NULL,NULL,NULL,1),(2,1,'2nde',15000,50000,25000,20000,120000,0,NULL,NULL,NULL,NULL,'2017-12-06 00:56:32',1,10000,0,NULL,NULL,'2017-12-14','2018-01-31',2);
/*!40000 ALTER TABLE `scolarite` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `setting`
--

DROP TABLE IF EXISTS `setting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `logo` varchar(255) DEFAULT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `numero` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `slogan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `setting`
--

LOCK TABLES `setting` WRITE;
/*!40000 ALTER TABLE `setting` DISABLE KEYS */;
INSERT INTO `setting` VALUES (1,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `setting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaction`
--

DROP TABLE IF EXISTS `transaction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idCaisse` int(11) DEFAULT NULL,
  `montant` float DEFAULT NULL,
  `type` tinyint(1) DEFAULT NULL,
  `reference` varchar(25) DEFAULT NULL,
  `libelle` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `caisse` varchar(200) DEFAULT NULL,
  `description` tinytext,
  `idCost` int(11) DEFAULT NULL,
  `idAnnee` int(11) DEFAULT NULL,
  `libAnnee` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaction`
--

LOCK TABLES `transaction` WRITE;
/*!40000 ALTER TABLE `transaction` DISABLE KEYS */;
INSERT INTO `transaction` VALUES (1,1,15000,1,'17K111159','Paiement des frais de scolarité','2017-11-11 11:49:16','Founda Wafo Alain Chris','Frais d\'inscription',1,1,'2017-2018'),(2,1,5750,2,'17G111167','Facture d\'eau','2017-11-11 16:21:25','Founda Wafo Alain Chris','Paiement de la facture d\'eau du mois d\'octobre',5,1,'2017-2018'),(3,1,4500,1,'17N120614','Paiement d\'autres frais','2017-12-06 00:00:18','Founda Wafo Alain Chris','Frais de: Tenue de sport',4,1,'2017-2018'),(4,1,4500,2,'17P120618','Annulation du paiement d\'autres frais','2017-12-06 00:17:01','Founda Wafo Alain Chris','Annulation de: Frais de: Tenue de sport',5,1,'2017-2018'),(5,1,90000,1,'17V120677','Paiement des frais de scolarité','2017-12-06 00:26:54','Founda Wafo Alain Chris','Frais d\'inscription et 1ère tranche',1,1,'2017-2018'),(6,1,4500,1,'17D120636','Paiement d\'autres frais','2017-12-06 00:28:23','Founda Wafo Alain Chris','Frais de: Tenue de sport',4,1,'2017-2018'),(7,1,5000,1,'17B120643','Paiement d\'autres frais','2017-12-06 00:38:56','Founda Wafo Alain Chris','Frais de: Frais d\'informatique',4,1,'2017-2018'),(8,1,143500,1,'17H120676','Paiement des frais de scolarité','2017-12-06 00:45:24','Founda Wafo Alain Chris','Frais d\'inscription   1ère et 2ème tranches',1,1,'2017-2018'),(9,1,5000,1,'17T120652','Paiement d\'autres frais','2017-12-06 00:45:57','Founda Wafo Alain Chris','Frais de: Frais d\'informatique',4,1,'2017-2018'),(10,1,12000,1,'17B120684','Paiement d\'autres frais','2017-12-06 00:46:02','Founda Wafo Alain Chris','Frais de: Formation en Management',4,1,'2017-2018'),(11,1,4500,1,'17J120676','Paiement d\'autres frais','2017-12-06 00:46:07','Founda Wafo Alain Chris','Frais de: Tenue de sport',4,1,'2017-2018'),(12,1,100000,1,'17B120681','Paiement des frais de scolarité','2017-12-06 00:58:47','Founda Wafo Alain Chris','Frais inscription   1ère et 2ème tranches',1,1,'2017-2018'),(13,1,4500,1,'17F120622','Paiement d\'autres frais','2017-12-06 00:58:59','Founda Wafo Alain Chris','Frais de: Tenue de sport',4,1,'2017-2018');
/*!40000 ALTER TABLE `transaction` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `types`
--

DROP TABLE IF EXISTS `types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `types`
--

LOCK TABLES `types` WRITE;
/*!40000 ALTER TABLE `types` DISABLE KEYS */;
INSERT INTO `types` VALUES (1,'Retard à l\'arrivée','Retard','2017-11-13 12:09:56'),(2,'Bavardage','Trouble','2017-11-13 12:10:10'),(4,'Exclusion de 3 jours','Exclusion','2017-11-13 12:10:46'),(5,'Exclusion définitive','Exclusion','2017-11-13 12:11:02'),(6,'Exclusion de 1 jour','Exclusion','2017-11-13 12:11:21');
/*!40000 ALTER TABLE `types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'ecole'
--
