-- MySQL dump 10.9
--
-- Host: localhost    Database: dropschema
-- ------------------------------------------------------
-- Server version	5.1.16-beta

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE="NO_AUTO_VALUE_ON_ZERO" */;

--
-- Table structure for table `drops`
--

CREATE TABLE `drops2` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `summary` varchar(32) DEFAULT NULL,
  `date` datetime NOT NULL,
  `droptext` longtext NOT NULL,
  `ip` varchar(50) DEFAULT NULL,
  `language` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drops`
--


/*!40000 ALTER TABLE `drops` DISABLE KEYS */;
LOCK TABLES `drops` WRITE;
INSERT INTO `drops` VALUES (1,'Jake Dahn','2007-02-17 02:03:00','This is just a test drop, hello!',NULL,NULL),(2,'testing ','2007-02-19 21:29:07','wheee',NULL,NULL),(3,'Jake Dahn','2007-02-19 21:33:11','testing',NULL,NULL),(4,'Jake Dahn','2007-02-19 21:33:28','testing',NULL,NULL),(5,'Jake Dahn','2007-02-19 21:33:49','testing',NULL,NULL),(6,'Jake Dahn','2007-02-19 21:34:21','testing',NULL,NULL),(7,'Jake Dahn','2007-02-19 21:34:37','testing',NULL,NULL),(8,'Jake Dahn','2007-02-19 21:34:49','testing\r\n',NULL,NULL),(9,'Jake Dahn','2007-02-19 21:35:01','testing',NULL,NULL),(10,'Jake Dahn','2007-02-19 21:35:23','testing\r\n',NULL,NULL),(11,'Jake Dahn','2007-02-19 21:35:26','testing\r\n',NULL,NULL);
UNLOCK TABLES;
/*!40000 ALTER TABLE `drops` ENABLE KEYS */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

