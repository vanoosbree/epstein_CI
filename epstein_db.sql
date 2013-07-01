CREATE DATABASE  IF NOT EXISTS `epstein` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `epstein`;
-- MySQL dump 10.13  Distrib 5.5.24, for osx10.5 (i386)
--
-- Host: 127.0.0.1    Database: epstein
-- ------------------------------------------------------
-- Server version	5.5.29

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
-- Table structure for table `bands`
--

DROP TABLE IF EXISTS `bands`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bands` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `band_name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bands`
--

LOCK TABLES `bands` WRITE;
/*!40000 ALTER TABLE `bands` DISABLE KEYS */;
INSERT INTO `bands` VALUES (1,'Heart Rock','2013-06-27 19:21:45','2013-06-27 19:21:45'),(3,'Dark Rock','2013-06-27 19:45:33','2013-06-27 19:45:33'),(4,'Cool Joe','2013-06-27 19:53:06','2013-06-27 19:53:06'),(5,'Lumpy Joe','2013-06-27 19:53:32','2013-06-27 19:53:32'),(6,'Cats in Bag','2013-06-27 19:56:52','2013-06-27 19:56:52'),(7,'Jerry and the Sailors','2013-06-27 20:08:45','2013-06-27 20:08:45'),(9,'Pumping Iron','2013-06-27 20:13:07','2013-06-27 20:13:07'),(10,'Harry Partched','2013-06-27 20:37:42','2013-06-27 20:37:42'),(11,'Moon Dumplings','2013-06-27 20:44:39','2013-06-27 20:44:39'),(12,'Gary\'s Band','2013-06-27 21:03:59','2013-06-27 21:03:59'),(14,'Grass Fed Beef','2013-06-27 21:38:19','2013-06-27 21:38:19'),(15,'Hotcake Creation','2013-06-27 22:46:33','2013-06-27 22:46:33'),(16,'Crunchy Biscuits','2013-06-27 23:56:35','2013-06-27 23:56:35'),(17,'Killswitch Whoopie!','2013-06-28 01:57:59','2013-06-28 01:57:59'),(18,'Cheesesteak Surprise','2013-06-28 19:18:57','2013-06-28 19:18:57'),(19,'Mark\'s Men','2013-06-28 22:10:14','2013-06-28 22:10:14'),(20,'Tiny Fingers','2013-06-28 22:11:12','2013-06-28 22:11:12'),(21,'Sandbag Station','2013-06-29 23:22:41','2013-06-29 23:22:41'),(22,'Last Best Chance','2013-06-29 23:37:19','2013-06-29 23:37:19');
/*!40000 ALTER TABLE `bands` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `setlists`
--

DROP TABLE IF EXISTS `setlists`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `setlists` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `show_id` int(11) NOT NULL,
  `songs` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_setlists_gigs1_idx` (`show_id`),
  CONSTRAINT `fk_setlists_gigs1` FOREIGN KEY (`show_id`) REFERENCES `shows` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `setlists`
--

LOCK TABLES `setlists` WRITE;
/*!40000 ALTER TABLE `setlists` DISABLE KEYS */;
INSERT INTO `setlists` VALUES (1,14,'\'a:5:{s:8:\"Chrysopa\";s:8:\"Chrysopa\";s:7:\"Broiled\";s:7:\"Broiled\";s:9:\"Gabionage\";s:9:\"Gabionage\";s:12:\"chicken_soup\";s:12:\"chicken soup\";i:0;s:6:\"Nicely\";}\'','2013-06-29 00:16:21','2013-06-29 00:16:21'),(2,15,'\'a:3:{s:7:\"Oviform\";s:7:\"Oviform\";s:24:\"Nonindustrial_Prosperous\";s:24:\"Nonindustrial Prosperous\";s:9:\"Laplander\";s:9:\"Laplander\";}\'','2013-06-29 00:55:07','2013-06-29 00:55:07'),(3,16,NULL,'2013-06-29 23:17:41','2013-06-29 23:17:41'),(4,17,'\'a:1:{i:0;s:13:\"Solderers Joy\";}\'','2013-06-29 23:24:39','2013-06-29 23:24:39'),(5,18,NULL,'2013-06-29 23:37:52','2013-06-29 23:37:52');
/*!40000 ALTER TABLE `setlists` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shows`
--

DROP TABLE IF EXISTS `shows`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shows` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `band_id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `description` tinytext,
  `address` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_gigs_bands1_idx` (`band_id`),
  CONSTRAINT `fk_gigs_bands1` FOREIGN KEY (`band_id`) REFERENCES `bands` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shows`
--

LOCK TABLES `shows` WRITE;
/*!40000 ALTER TABLE `shows` DISABLE KEYS */;
INSERT INTO `shows` VALUES (5,15,'2013-11-15','08:30:00','Clownie\'s Birthday','1000 Happy Ave.','2013-06-28 18:39:27','2013-06-28 18:39:27'),(6,15,'2013-10-25','10:15:00','Cool gig','5010 Avenue st.','2013-06-28 18:40:09','2013-06-28 18:40:09'),(7,9,'2013-06-29','02:30:00','Happy Funtime Park','5010 Avenue st.','2013-06-28 19:01:25','2013-06-28 19:01:25'),(8,15,'2013-11-03','07:00:00','Roller Rink','302 West Ave.','2013-06-28 21:58:25','2013-06-28 21:58:25'),(9,15,'2013-09-04','03:00:00','Union 76 Gas Station','4000 Gassy Way','2013-06-28 21:59:01','2013-06-28 21:59:01'),(10,15,'2013-09-30','01:00:00','Mike\'s Bar','421 Heavenly Blvd','2013-06-28 22:02:29','2013-06-28 22:02:29'),(11,19,'2013-08-28','03:45:00','Hay Ride @ the Pumpkin Patch','4512 Agriculture Way','2013-06-28 22:10:47','2013-06-28 22:10:47'),(12,20,'2013-09-30','06:00:00','Booze \'n Blues','201 Saucy Way','2013-06-28 22:11:45','2013-06-28 22:11:45'),(13,15,'2013-06-22','03:45:00','Roller Rink','1500 Skating St.','2013-06-29 00:13:12','2013-06-29 00:13:12'),(14,15,'2013-06-29','04:00:00','Rickets Ticks Show','1260 Broadway','2013-06-29 00:16:21','2013-06-29 00:16:21'),(15,14,'2013-07-31','05:30:00','Movie Night @ Tim\'s','3412 Crescent Pl','2013-06-29 00:55:07','2013-06-29 00:55:07'),(16,11,'2013-08-28','03:00:00','Funtime Polka','201 Saucy Way','2013-06-29 23:17:41','2013-06-29 23:17:41'),(17,21,'2013-06-30','09:00:00','Round Table pizza','3453 Mt. Diablo Lafayette, CA','2013-06-29 23:24:39','2013-06-29 23:24:39'),(18,22,'1970-01-01','00:00:00','','','2013-06-29 23:37:52','2013-06-29 23:37:52');
/*!40000 ALTER TABLE `shows` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `songs`
--

DROP TABLE IF EXISTS `songs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `songs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `band_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_songs_bands1_idx` (`band_id`),
  CONSTRAINT `fk_songs_bands1` FOREIGN KEY (`band_id`) REFERENCES `bands` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `songs`
--

LOCK TABLES `songs` WRITE;
/*!40000 ALTER TABLE `songs` DISABLE KEYS */;
INSERT INTO `songs` VALUES (3,15,'Nicely','2013-06-29 00:28:15','2013-06-29 00:28:15'),(5,15,'Gabionage','2013-06-29 00:38:59','2013-06-29 00:38:59'),(6,15,'Broiled','2013-06-29 00:39:17','2013-06-29 00:39:17'),(8,9,'Chafery','2013-06-29 00:48:20','2013-06-29 00:48:20'),(9,9,'Snail','2013-06-29 00:48:30','2013-06-29 00:48:30'),(10,9,'Moabitess','2013-06-29 00:49:48','2013-06-29 00:49:48'),(11,14,'Morbific','2013-06-29 01:13:57','2013-06-29 01:13:57'),(12,15,'chicken soup','2013-06-29 04:05:19','2013-06-29 04:05:19'),(13,15,'chicken soup','2013-06-29 04:06:21','2013-06-29 04:06:21'),(14,15,'Chrysopa','2013-06-29 04:13:58','2013-06-29 04:13:58'),(15,14,'Laplander','2013-06-29 04:21:04','2013-06-29 04:21:04'),(16,14,'Nonindustrial Prosperous','2013-06-29 04:21:18','2013-06-29 04:21:18'),(17,14,'Oviform','2013-06-29 04:21:29','2013-06-29 04:21:29'),(18,21,'Old Joe Clark','2013-06-29 23:25:16','2013-06-29 23:25:16'),(19,21,'Solderers Joy','2013-06-29 23:26:35','2013-06-29 23:26:35'),(20,21,'Bury Me','2013-06-29 23:30:49','2013-06-29 23:30:49'),(21,22,'Moondance','2013-06-29 23:38:22','2013-06-29 23:38:22'),(22,22,'Somewhere over the rainbow','2013-06-29 23:38:52','2013-06-29 23:38:52');
/*!40000 ALTER TABLE `songs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_levels`
--

DROP TABLE IF EXISTS `user_levels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_levels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_levels`
--

LOCK TABLES `user_levels` WRITE;
/*!40000 ALTER TABLE `user_levels` DISABLE KEYS */;
INSERT INTO `user_levels` VALUES (1,'admin'),(2,'user');
/*!40000 ALTER TABLE `user_levels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'Eddie Van Halen','eddie@vanhalen.com','s7Sc6/Tr9gaNA6tF9kZbnkHZAhEQzX1OVNl4rLi9+mGOa3c6B+OmPueXFy8sFZm1OA0UaBijlxnmJM/4ccAyRQ==','2013-06-27 18:38:31','2013-06-27 18:38:31'),(3,'Mike Patton','mr.bungle@fantomas.com','IXu8r/qTHKy+qfaDtzaFB3zfOfbiX3f8OYfEdUjBZQz8qfZ4tPBFER6xHE/ysKBfHTlwsa06IFaQaF6x3uF/BQ==','2013-06-27 18:39:20','2013-06-27 18:39:20'),(4,'Gary Newman','gary@newman.com','ALunXuel7YM0bU0xb+VVlHsvgWL2BHlqt3Ucvj2cOjrMEh+RObiNs1X4g3RHuWxGui26DJ3vMUjrBWByzUmZZQ==','2013-06-27 21:03:51','2013-06-27 21:03:51'),(5,'Tommy Iommi','black@sabbath.com','EmeYdQ7uDVRXV5Sy+/cEFwgk8ZwWTdYzoDvpgkxvODcOmeqrrYJoDJ+9WU/drBOeIl2akrt6//rtJTjY4d5wqA==','2013-06-27 22:01:59','2013-06-27 22:01:59'),(6,'Pete Townsend','pete@who.com','kG1DqMeTN5kHxeLlw9uW83QX1BHP2c2bRvpWDahAHoIb1RTbVBLvgNOsO/kXFSvrJZO7EZ+R2VJCQpIZCyfHNQ==','2013-06-27 22:51:18','2013-06-27 22:51:18'),(7,'Eddie Vedder','pearl@jam.com','UPbdSDNnVhWM03azas2nectg6U94zsxT+DxuObKY0aHcZu5cGTP9AE5DtOoFEcRqTJThRrjOKYg2hzWE2fZIow==','2013-06-27 23:56:23','2013-06-27 23:56:23'),(8,'Howard','killswitch@engage.com','Bd7tLALtRDS2zdNTYXKalOQ0GJGR8NGZLBAm7geV83LixiQrQcz70lcnTXQOMRgaD6mewwCcBYwmIBC/4QoePA==','2013-06-28 01:57:30','2013-06-28 01:57:30'),(9,'Jon Van Oosbree','jvanoo@mac.com','561CY6Agy18GKUmGxonuhdY3uInLGs/2gewdvp9KthxDk/5upAvazLMCAaTmAChpJfmEDBiEq4g0s6NZLGhYPA==','2013-06-29 23:22:05','2013-06-29 23:22:05');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_has_bands`
--

DROP TABLE IF EXISTS `users_has_bands`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_has_bands` (
  `user_id` int(11) NOT NULL,
  `band_id` int(11) NOT NULL,
  `user_level_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`band_id`),
  KEY `fk_users_has_bands_bands1_idx` (`band_id`),
  KEY `fk_users_has_bands_users1_idx` (`user_id`),
  KEY `fk_users_has_bands_user_levels1_idx` (`user_level_id`),
  CONSTRAINT `fk_users_has_bands_bands1` FOREIGN KEY (`band_id`) REFERENCES `bands` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_has_bands_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_has_bands_user_levels1` FOREIGN KEY (`user_level_id`) REFERENCES `user_levels` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_has_bands`
--

LOCK TABLES `users_has_bands` WRITE;
/*!40000 ALTER TABLE `users_has_bands` DISABLE KEYS */;
INSERT INTO `users_has_bands` VALUES (2,9,1),(2,18,1),(3,10,1),(3,11,1),(3,15,1),(4,12,1),(4,14,1),(5,19,1),(5,20,1),(7,16,1),(8,17,1),(9,21,1),(9,22,1);
/*!40000 ALTER TABLE `users_has_bands` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-06-30 11:54:47
