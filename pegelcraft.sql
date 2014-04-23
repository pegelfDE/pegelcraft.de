-- MySQL dump 10.14  Distrib 5.5.36-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: pegelcraft
-- ------------------------------------------------------
-- Server version	5.5.36-MariaDB

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
-- Table structure for table `navbar`
--

DROP TABLE IF EXISTS `navbar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `navbar` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `link` text COLLATE utf8_unicode_ci NOT NULL,
  `position` int(11) NOT NULL,
  `visible` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `has_children` int(11) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `navbar`
--

LOCK TABLES `navbar` WRITE;
/*!40000 ALTER TABLE `navbar` DISABLE KEYS */;
INSERT INTO `navbar` VALUES (1,'Home','index.php',1,1,0,0),(2,'Regeln','regeln.php',2,1,0,0),(3,'Map','map.php',3,1,0,0);
/*!40000 ALTER TABLE `navbar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `regeln`
--

DROP TABLE IF EXISTS `regeln`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `regeln` (
  `id` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `parent` int(11) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `regeln`
--

LOCK TABLES `regeln` WRITE;
/*!40000 ALTER TABLE `regeln` DISABLE KEYS */;
INSERT INTO `regeln` VALUES (1,'§1. Ingame-Chat Verhalten',0),(2,'Beleidigen von anderen Spielern ist verboten!',1),(3,'Übermäßiges Fluchen ist zu unterlassen',1),(4,'Auseinandersetzungen über das Thema Religion sind zu unterlassen',1),(5,'Spamen/Flooden ist verboten',1),(6,'Werbung für andere Server ist verboten. Es ist genauso verboten, auf anderen Minecraft-Servern für Pegelcraft zu werben.',1),(7,'Das Werben für andere Foren, Clans, etc. ist ebenso verboten',1),(8,'§2. Spielverhalten',0),(9,'Mutwillige Zerstörung anderer Bauten wird bestraft.',8),(10,'Rassistische, Perverse und Beleidigende Bauten werden ohne Itemersatz entfernt und bestraft.',8),(11,'PVP (Player vs Player) ist nicht erlaubt. Selbstverteidigung und Abwehr von Dieben ist hier eine Ausnahme. Es ist weiterhin erlaubt, auf seinem Grundstück nach eindeutiger Kennzeichnung ein PvP-Event zu veranstallten.',8),(12,'§3. Mods, Texturepacks, Skins und sämtliche andere Modifikationen',0),(13,'Diese Regeln werden in kürze ergänzt',12),(14,'§4. Sonstiges',0),(15,'Wenn ihr gesperrt wurdet und den Grund nicht versteht oder ihr eine 2. Chance haben wollt, schreibt es ins Forum. Bei umgehen der Sperre wird die IP-Adresse gesperrt.',14),(16,'Das Ausnutzen von Bugs wird je nach schwerheit bestraft. Jeder Spieler ist dazu verpflichtet, Bugs einem Teammitglied mitzuteilen.',14),(17,'Den Anweisungen eines Teammitgliedes sind folge zu leisten.',14);
/*!40000 ALTER TABLE `regeln` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-04-23 13:12:54
