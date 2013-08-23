CREATE USER 'bells'@'localhost' IDENTIFIED BY 'Yuh4D6E9G5wFxVUa';
CREATE DATABASE `bells`;
GRANT ALL PRIVILEGES ON bells.* TO 'bells'@'localhost' WITH GRANT OPTION;

USE `bells`;


-- MySQL dump 10.13  Distrib 5.5.32, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: bells
-- ------------------------------------------------------
-- Server version	5.5.32-0ubuntu0.12.04.1

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
-- Table structure for table `BellAudio`
--

DROP TABLE IF EXISTS `BellAudio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `BellAudio` (
  `idBellAudio` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `description` text NOT NULL,
  `filename` text NOT NULL,
  `default` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idBellAudio`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `BellAudio`
--

LOCK TABLES `BellAudio` WRITE;
/*!40000 ALTER TABLE `BellAudio` DISABLE KEYS */;
INSERT INTO `BellAudio` VALUES (1,'One Ding','This is the audio for a single ding.','resources/audio/SingleDing_NEW.wav',0),(11,'Four Dings','','resources/audio/FourDings_NEW.wav',0),(10,'Three Digns','','resources/audio/ThreeDings_NEW.wav',1),(9,'Two Dings','','resources/audio/TwoDings_NEW.wav',0),(16,'Classic Bell','','resources/audio/ClassicSchoolBell1_NEW.wav',0);
/*!40000 ALTER TABLE `BellAudio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `BellDates`
--

DROP TABLE IF EXISTS `BellDates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `BellDates` (
  `idBellDate` int(11) NOT NULL AUTO_INCREMENT,
  `idBellProfile` int(11) NOT NULL,
  `idBellZone` int(11) NOT NULL DEFAULT '0',
  `date` date NOT NULL,
  `last_idBellTime` int(11) NOT NULL,
  PRIMARY KEY (`idBellDate`)
) ENGINE=InnoDB AUTO_INCREMENT=2072 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `BellProfiles`
--

DROP TABLE IF EXISTS `BellProfiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `BellProfiles` (
  `idBellProfile` int(11) NOT NULL AUTO_INCREMENT,
  `idBellZone` int(11) NOT NULL DEFAULT '0',
  `idBellAudio` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` text NOT NULL,
  `order` int(11) NOT NULL DEFAULT '99999999',
  PRIMARY KEY (`idBellProfile`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `BellProfiles`
--

LOCK TABLES `BellProfiles` WRITE;
/*!40000 ALTER TABLE `BellProfiles` DISABLE KEYS */;
INSERT INTO `BellProfiles` VALUES (1,0,0,'Elementary','',99999999),(2,0,0,'Friday','',99999999),(3,0,9,'Weekend','',99999999),(4,0,0,'Holidays','',99999999),(5,0,0,'High School','',99999999);
/*!40000 ALTER TABLE `BellProfiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `BellTimes`
--

DROP TABLE IF EXISTS `BellTimes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `BellTimes` (
  `idBellTime` int(11) NOT NULL AUTO_INCREMENT,
  `idBellProfile` int(11) NOT NULL,
  `idBellAudio` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `hour` int(11) NOT NULL DEFAULT '0',
  `minute` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idBellTime`)
) ENGINE=InnoDB AUTO_INCREMENT=2117 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `BellTimes`
--

LOCK TABLES `BellTimes` WRITE;
/*!40000 ALTER TABLE `BellTimes` DISABLE KEYS */;
INSERT INTO `BellTimes` VALUES (1944,3,0,'Test File!',2,2),(1945,3,11,'Second Test!',2,3),(2090,1,0,'Start',7,45),(2091,1,0,'',8,45),(2092,1,0,'',9,30),(2093,1,0,'',10,15),(2094,1,0,'',11,0),(2095,1,0,'',12,0),(2096,1,0,'',12,45),(2097,1,0,'',13,30),(2098,1,0,'',14,15),(2099,1,0,'End',15,0),(2100,1,0,'test',14,36),(2101,5,0,'Period 1',7,41),(2102,5,0,'Period 1 Warning',7,44),(2103,5,0,'Period 1 Last',7,45),(2104,5,0,'Period 2',9,24),(2105,5,0,'Period 2 Warning',9,27),(2106,5,0,'Period 2 Last',9,28),(2107,5,0,'Period 3',10,39),(2108,5,0,'Period 3 Warning',10,42),(2109,5,0,'Period 3 Last',10,43),(2110,5,0,' Period 4',12,44),(2111,5,0,' Period 4 Warning',12,47),(2112,5,0,' Period 4 Last',12,48),(2113,5,0,'Period 5',13,34),(2114,5,0,'Period 5 Warning',13,37),(2115,5,0,'Period 5 Last',13,38),(2116,5,0,' Release Bell',15,0);
/*!40000 ALTER TABLE `BellTimes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `BellZoneDefaultProfiles`
--

DROP TABLE IF EXISTS `BellZoneDefaultProfiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `BellZoneDefaultProfiles` (
  `idBellZone` int(11) NOT NULL,
  `idBellProfileMonday` int(11) NOT NULL,
  `idBellProfileTuesday` int(11) NOT NULL,
  `idBellProfileWednesday` int(11) NOT NULL,
  `idBellProfileThursday` int(11) NOT NULL,
  `idBellProfileFriday` int(11) NOT NULL,
  `idBellProfileSaturday` int(11) NOT NULL,
  `idBellProfileSunday` int(11) NOT NULL,
  PRIMARY KEY (`idBellZone`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `BellZoneDefaultProfiles`
--

LOCK TABLES `BellZoneDefaultProfiles` WRITE;
/*!40000 ALTER TABLE `BellZoneDefaultProfiles` DISABLE KEYS */;
/*!40000 ALTER TABLE `BellZoneDefaultProfiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `BellZones`
--

DROP TABLE IF EXISTS `BellZones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `BellZones` (
  `idBellZone` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `endpoint_data` varchar(255) NOT NULL,
  PRIMARY KEY (`idBellZone`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `BellZones`
--

LOCK TABLES `BellZones` WRITE;
/*!40000 ALTER TABLE `BellZones` DISABLE KEYS */;
INSERT INTO `BellZones` VALUES (13,'Elementary','Local/elementary@SkyTechPaging'),(14,'High School','Local/highschool@SkyTechPaging');
/*!40000 ALTER TABLE `BellZones` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-08-22 15:18:39
