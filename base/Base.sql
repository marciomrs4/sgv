-- MySQL dump 10.13  Distrib 5.5.41, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: sgv
-- ------------------------------------------------------
-- Server version	5.5.41-0+wheezy1

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
-- Current Database: `sgv`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `sgv` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `sgv`;

--
-- Table structure for table `tb_itens_pedido`
--

DROP TABLE IF EXISTS `tb_itens_pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_itens_pedido` (
  `vpr_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `ped_codigo` int(11) NOT NULL,
  `vpr_titulo_produto` varchar(45) NOT NULL,
  `vpr_valor_unitario` decimal(10,2) NOT NULL,
  `vpr_quantidade` smallint(6) NOT NULL,
  `vpr_valor_total` decimal(10,2) NOT NULL,
  PRIMARY KEY (`vpr_codigo`),
  KEY `fk_pedido_venda_idx` (`ped_codigo`),
  CONSTRAINT `fk_pedido_venda` FOREIGN KEY (`ped_codigo`) REFERENCES `tb_pedido` (`ped_codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=444 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_itens_pedido`
--

LOCK TABLES `tb_itens_pedido` WRITE;
/*!40000 ALTER TABLE `tb_itens_pedido` DISABLE KEYS */;
INSERT INTO `tb_itens_pedido` VALUES (1,14,'Carne Moída',15.00,2,30.00),(2,15,'Carne Moída',15.00,2,30.00),(3,15,'Frango',15.00,2,30.00),(4,15,'Carne Seca',18.00,2,36.00),(5,15,'Camarão',18.00,2,36.00),(6,15,'Calabreza',15.00,2,30.00),(7,16,'Carne Moída',15.00,3,45.00),(8,16,'Camarão',18.00,3,54.00),(9,17,'Descricao do Item: 2',15.00,1,15.00),(10,17,'Descricao do Item: 4',15.00,1,15.00),(11,18,'Descricao do Item: 1',15.00,3,45.00),(12,18,'Descricao do Item: 4',17.50,5,87.50),(13,23,'Descricao do Item: 17',15.00,3,45.00),(14,23,'Descricao do Item: 18',20.00,1,20.00),(15,24,'Carne Seca',15.00,4,60.00),(16,24,'Camarão',17.50,2,35.00),(17,25,'Carne Moída',15.00,2,30.00),(18,25,'Frango',15.00,2,30.00),(19,26,'Carne Moída',15.00,1,15.00),(20,28,'Carne Moída',15.00,1,15.00),(21,29,'Carne Seca',18.00,1,18.00),(22,29,'Camarão',18.00,2,36.00),(23,30,'Carne Moída',15.00,1,15.00),(24,32,'Chocolate',17.50,4,70.00),(25,35,'Carne Moída',15.00,1,15.00),(26,39,'Carne Moída',15.00,1,15.00),(27,39,'Frango',15.00,1,15.00),(28,39,'Camarão',18.00,3,54.00),(29,40,'Carne Seca',18.00,2,36.00),(30,40,'Calabreza',15.00,3,45.00),(31,41,'Carne Seca',18.00,3,54.00),(32,41,'Calabreza',15.00,2,30.00),(33,42,'Carne Moída',15.00,3,45.00),(34,42,'Carne Seca',18.00,2,36.00),(35,42,'Chocolate',17.50,3,52.50),(36,43,'Carne Moída',15.00,3,45.00),(37,43,'Frango',15.00,2,30.00),(38,43,'Calabreza',15.00,2,30.00),(39,44,'Calabreza',15.00,1,15.00),(40,45,'Carne Moída',15.00,2,30.00),(41,45,'Coca Cola',5.00,1,5.00),(42,45,'Guarana',5.00,1,5.00),(43,46,'Carne Moída',15.00,1,15.00),(44,46,'Carne Seca',18.00,1,18.00),(45,46,'Banana',7.00,1,7.00),(46,46,'Guarana',5.00,1,5.00),(47,47,'Carne Seca',18.00,1,18.00),(48,47,'Camarão',18.00,1,18.00),(49,47,'Coca Cola',5.00,2,10.00),(50,48,'Carne Seca',18.00,1,18.00),(51,48,'Calabreza',15.00,1,15.00),(52,48,'Banana',7.00,1,7.00),(53,48,'Guarana',5.00,1,5.00),(54,48,'Coca Zero',5.00,1,5.00),(55,49,'Carne Moída',15.00,1,15.00),(56,49,'Coca Zero',5.00,1,5.00),(57,50,'Frango',15.00,2,30.00),(58,50,'Agua',3.00,1,3.00),(59,51,'Carne Moída',20.00,1,20.00),(60,51,'Frango',20.00,1,20.00),(61,51,'Coca Cola',5.00,1,5.00),(62,51,'Agua',3.00,1,3.00),(63,52,'Carne Seca',20.00,2,40.00),(64,52,'Coca Cola',5.00,1,5.00),(65,52,'Guarana',5.00,1,5.00),(66,53,'Camarão',20.00,1,20.00),(67,53,'Calabreza',20.00,1,20.00),(68,53,'Banana',7.00,1,7.00),(69,53,'Coca Cola',5.00,2,10.00),(70,53,'Guarana',5.00,1,5.00),(71,54,'Carne Moída',20.00,1,20.00),(72,54,'Frango',20.00,1,20.00),(73,54,'Coca Cola',5.00,1,5.00),(74,54,'Agua',3.00,1,3.00),(75,55,'Carne Moída',20.00,2,40.00),(76,55,'Guarana',5.00,2,10.00),(77,56,'Carne Moída',20.00,1,20.00),(78,56,'Frango',20.00,1,20.00),(79,57,'Carne Moída',20.00,1,20.00),(80,57,'Frango',20.00,1,20.00),(81,57,'Coca Cola',5.00,1,5.00),(82,57,'Coca Zero',5.00,1,5.00),(83,58,'Carne Moída',15.00,1,15.00),(84,59,'Carne Moída',15.00,100,1500.00),(85,60,'Carne Moída',15.00,50,750.00),(86,61,'Carne Moída',20.00,3,60.00),(87,61,'Frango',20.00,1,20.00),(88,61,'Coca Zero',5.00,1,5.00),(89,62,'Carne Moída',20.00,1,20.00),(90,62,'Frango',20.00,1,20.00),(91,62,'Carne Seca',20.00,1,20.00),(92,62,'Coca Cola',5.00,1,5.00),(93,62,'Guarana',5.00,1,5.00),(94,62,'Coca Zero',5.00,1,5.00),(95,63,'Carne Seca',20.00,1,20.00),(96,63,'Camarão',20.00,1,20.00),(97,63,'Banana',7.00,1,7.00),(98,63,'Coca Cola',5.00,1,5.00),(99,63,'Guarana',5.00,1,5.00),(100,64,'Calabreza',20.00,2,40.00),(101,64,'Coca Cola',5.00,2,10.00),(102,65,'Carne Seca',20.00,2,40.00),(103,65,'Coca Cola',5.00,1,5.00),(104,65,'Coca Zero',5.00,1,5.00),(105,66,'Carne Seca',20.00,1,20.00),(106,66,'Camarão',20.00,1,20.00),(107,66,'Coca Cola',5.00,1,5.00),(108,66,'Guarana',5.00,1,5.00),(109,67,'Carne Seca',20.00,1,20.00),(110,67,'Camarão',20.00,1,20.00),(111,67,'Coca Cola',5.00,2,10.00),(112,68,'Coca Cola',5.00,1,5.00),(113,68,'Agua',3.00,1,3.00),(114,69,'Carne Seca',20.00,3,60.00),(115,69,'Coca Cola',5.00,1,5.00),(116,69,'Guarana',5.00,2,10.00),(117,70,'Camarão',20.00,1,20.00),(118,70,'Calabreza',20.00,1,20.00),(119,70,'Coca Cola',5.00,1,5.00),(120,70,'Coca Zero',5.00,1,5.00),(121,71,'Carne Seca',20.00,3,60.00),(122,71,'Camarão',20.00,1,20.00),(123,71,'Guarana',5.00,2,10.00),(124,71,'Coca Zero',5.00,2,10.00),(125,72,'Carne Moída',20.00,1,20.00),(126,73,'Frango',20.00,1,20.00),(127,74,'Frango',20.00,1,20.00),(128,75,'Carne Seca',20.00,1,20.00),(129,76,'Carne Moída',20.00,1,20.00),(136,83,'Guarana',5.00,1,5.00),(137,84,'Carne Moída',20.00,1,20.00),(138,85,'Carne Moída',20.00,1,20.00),(139,85,'Coca Zero',5.00,1,5.00),(140,86,'Carne Moída',20.00,1,20.00),(141,87,'Carne Moída',20.00,5,100.00),(142,88,'Carne Moída',20.00,2,40.00),(143,89,'Carne Moída',20.00,1,20.00),(144,89,'Carne Seca',20.00,1,20.00),(145,89,'Coca Cola',5.00,1,5.00),(146,89,'Coca Zero',5.00,1,5.00),(147,90,'Carne Moída',20.00,1,20.00),(148,90,'Guarana',5.00,1,5.00),(149,91,'Carne Moída',20.00,1,20.00),(150,91,'Carne Seca',20.00,1,20.00),(151,92,'Carne Moída',20.00,1,20.00),(152,93,'Carne Moída',20.00,1,20.00),(153,94,'Carne Moída',20.00,1,20.00),(154,94,'Frango',20.00,1,20.00),(155,95,'Banana',7.00,1,7.00),(156,95,'Carne Seca',20.00,1,20.00),(157,96,'Carne Moída',20.00,1,20.00),(158,97,'Carne Seca',20.00,3,60.00),(159,98,'Carne Moída',20.00,100,2000.00),(160,98,'Frango',20.00,100,2000.00),(161,98,'Carne Seca',20.00,100,2000.00),(162,98,'Camarão',20.00,100,2000.00),(163,98,'Calabreza',20.00,100,2000.00),(164,98,'Banana',7.00,100,700.00),(165,98,'Coca Cola',5.00,500,2500.00),(166,98,'Guarana',5.00,500,2500.00),(167,98,'Coca Zero',5.00,500,2500.00),(168,98,'Agua',3.00,1000,3000.00),(169,99,'Carne Moída',20.00,1,20.00),(170,100,'Carne Moída',20.00,1,20.00),(171,101,'Carne Moída',20.00,1,20.00),(172,101,'Frango',20.00,1,20.00),(173,101,'Guarana',5.00,1,5.00),(174,101,'Coca Zero',5.00,1,5.00),(175,102,'Carne Moída',20.00,1,20.00),(176,102,'Frango',20.00,1,20.00),(177,104,'Camarão',20.00,1,20.00),(178,105,'Carne Seca',20.00,1,20.00),(179,106,'Carne Seca',20.00,2,40.00),(180,107,'Carne Seca',20.00,2,40.00),(181,108,'Carne Seca',20.00,1,20.00),(182,109,'Camarão',20.00,1,20.00),(183,110,'Carne Seca',20.00,1,20.00),(184,110,'Camarão',20.00,1,20.00),(185,111,'Calabreza',20.00,1,20.00),(186,112,'Banana',7.00,1,7.00),(187,113,'Calabreza',20.00,1,20.00),(188,114,'Frango',15.00,1,15.00),(189,115,'Frango',15.00,2,30.00),(190,115,'Camarão',20.00,1,20.00),(191,115,'Calabresa',15.00,1,15.00),(192,116,'Grande',25.00,1,25.00),(193,117,'Calabresa',15.00,1,15.00),(194,118,'Banana',7.00,1,7.00),(195,119,'Carne Seca',20.00,2,40.00),(196,119,'Banana',7.00,1,7.00),(197,120,'Carne Seca',20.00,1,20.00),(198,120,'Banana',7.00,2,14.00),(199,121,'Camarão',20.00,1,20.00),(200,122,'Carne Seca',20.00,1,20.00),(201,123,'Carne Seca',20.00,1,20.00),(202,123,'Camarão',20.00,1,20.00),(203,123,'Calabresa',15.00,1,15.00),(204,124,'Carne Seca',20.00,1,20.00),(205,125,'Camarão',20.00,1,20.00),(206,126,'Banana',7.00,1,7.00),(207,127,'Frango',15.00,1,15.00),(208,127,'Camarão',20.00,1,20.00),(209,128,'Camarão',20.00,1,20.00),(210,129,'Frango',15.00,1,15.00),(211,129,'Carne Seca',20.00,1,20.00),(212,129,'Calabresa',15.00,1,15.00),(213,129,'Banana',7.00,2,14.00),(214,130,'Camarão',20.00,1,20.00),(215,131,'Frango',15.00,1,15.00),(216,131,'Calabresa',15.00,1,15.00),(217,131,'Legumes',15.00,1,15.00),(218,132,'Carne Seca',20.00,1,20.00),(219,133,'Carne Seca',20.00,1,20.00),(220,133,'Legumes',15.00,1,15.00),(221,134,'Carne Seca',20.00,1,20.00),(222,135,'Carne Moída',15.00,1,15.00),(223,135,'Coca Zero',5.00,1,5.00),(224,137,'Carne Seca',20.00,1,20.00),(225,137,'Camarão',20.00,1,20.00),(226,137,'Coca Cola',5.00,1,5.00),(227,137,'Guarana',5.00,1,5.00),(228,138,'Agua',3.00,1,3.00),(229,138,'Legumes',15.00,1,15.00),(230,139,'Carne Moída',15.00,1,15.00),(231,139,'Frango',15.00,1,15.00),(232,140,'Carne Seca',20.00,1,20.00),(233,140,'Camarão',20.00,1,20.00),(234,141,'Camarão',20.00,1,20.00),(235,141,'Calabresa',15.00,1,15.00),(236,141,'Coca Cola',5.00,1,5.00),(237,141,'Guarana',5.00,1,5.00),(238,142,'Carne Seca',20.00,1,20.00),(239,142,'Coca Cola',5.00,1,5.00),(240,142,'Agua',3.00,1,3.00),(241,142,'Grande',25.00,1,25.00),(242,143,'Camarão',20.00,1,20.00),(243,143,'Calabresa',15.00,1,15.00),(244,143,'Banana',7.00,1,7.00),(245,143,'Grande',25.00,1,25.00),(246,144,'Carne Moída',15.00,1,15.00),(247,144,'Carne Seca',20.00,1,20.00),(248,145,'Banana',7.00,1,7.00),(249,145,'Coca Zero',5.00,1,5.00),(250,145,'Agua',3.00,1,3.00),(251,146,'Carne Moída',15.00,1,15.00),(252,147,'Carne Moída',15.00,1,15.00),(253,147,'Frango',15.00,1,15.00),(254,148,'Camarão',20.00,1,20.00),(255,148,'Calabresa',15.00,1,15.00),(256,148,'Guarana',5.00,1,5.00),(257,149,'Calabresa',15.00,1,15.00),(258,149,'Banana',7.00,1,7.00),(259,149,'Coca Cola',5.00,1,5.00),(260,149,'Guarana',5.00,1,5.00),(261,150,'Carne Moída',15.00,1,15.00),(262,150,'Frango',15.00,1,15.00),(263,150,'Carne Seca',20.00,1,20.00),(264,151,'Carne Moída',15.00,1,15.00),(265,151,'Frango',15.00,1,15.00),(266,152,'Carne Moída',15.00,1,15.00),(267,152,'Frango',15.00,1,15.00),(268,152,'Coca Cola',5.00,1,5.00),(269,153,'Carne Seca',20.00,1,20.00),(270,153,'Legumes',15.00,1,15.00),(271,154,'Camarão',20.00,1,20.00),(272,154,'Calabresa',15.00,1,15.00),(273,154,'Grande',25.00,1,25.00),(274,155,'Carne Seca',20.00,1,20.00),(275,155,'Calabresa',15.00,1,15.00),(276,155,'Guarana',5.00,1,5.00),(277,155,'Coca Zero',5.00,1,5.00),(278,156,'Carne Moída',15.00,1,15.00),(279,156,'Guarana',5.00,1,5.00),(280,156,'Coca Zero',5.00,1,5.00),(281,157,'Carne Moída',15.00,1,15.00),(282,157,'Banana',7.00,1,7.00),(283,157,'Coca Zero',5.00,1,5.00),(284,157,'Agua',3.00,1,3.00),(285,158,'Camarão',20.00,1,20.00),(286,158,'Banana',7.00,1,7.00),(287,158,'Guarana',5.00,1,5.00),(288,158,'Coca Zero',5.00,1,5.00),(289,159,'Carne Moída',15.00,1,15.00),(290,159,'Carne Seca',20.00,1,20.00),(291,159,'Calabresa',15.00,1,15.00),(292,159,'Guarana',5.00,1,5.00),(293,159,'Coca Zero',5.00,1,5.00),(294,159,'Agua',3.00,1,3.00),(295,160,'Frango',15.00,1,15.00),(296,160,'Carne Seca',20.00,1,20.00),(297,160,'Coca Cola',5.00,1,5.00),(298,160,'Guarana',5.00,1,5.00),(299,161,'Carne Moída',15.00,1,15.00),(300,161,'Frango',15.00,1,15.00),(301,161,'Carne Seca',20.00,1,20.00),(302,162,'Frango',15.00,1,15.00),(303,163,'Carne Moída',15.00,1,15.00),(304,163,'Calabresa',15.00,1,15.00),(305,163,'Coca Zero',5.00,1,5.00),(306,163,'Agua',3.00,1,3.00),(307,164,'Carne Seca',20.00,1,20.00),(308,164,'Camarão',20.00,1,20.00),(309,164,'Calabresa',15.00,1,15.00),(310,164,'Coca Cola',5.00,1,5.00),(311,164,'Guarana',5.00,1,5.00),(312,164,'Legumes',15.00,1,15.00),(313,165,'Carne Moída',15.00,1,15.00),(314,165,'Frango',15.00,1,15.00),(315,165,'Coca Cola',5.00,1,5.00),(316,165,'Guarana',5.00,1,5.00),(317,166,'Carne Moída',15.00,1,15.00),(318,166,'Camarão',20.00,1,20.00),(319,166,'Calabresa',15.00,1,15.00),(320,166,'Agua',3.00,1,3.00),(321,166,'Legumes',15.00,1,15.00),(322,166,'Grande',25.00,1,25.00),(323,167,'Carne Seca',20.00,1,20.00),(324,167,'Camarão',20.00,1,20.00),(325,168,'Camarão',20.00,1,20.00),(326,168,'Calabresa',15.00,1,15.00),(327,168,'Coca Cola',5.00,1,5.00),(328,168,'Coca Zero',5.00,1,5.00),(329,169,'CARNE MOÍDA',15.00,1,15.00),(330,169,'FRANGO',15.00,1,15.00),(331,169,'CARNE SECA',20.00,1,20.00),(332,169,'CAMARÃO',20.00,1,20.00),(333,170,'CARNE SECA',20.00,1,20.00),(334,170,'CAMARÃO',20.00,1,20.00),(335,171,'CALABRESA',15.00,1,15.00),(336,171,'BANANA',7.00,1,7.00),(337,171,'COCA COLA',5.00,1,5.00),(338,171,'GUARANÁ',5.00,1,5.00),(339,171,'LEGUMES',15.00,1,15.00),(340,172,'CARNE MOÍDA',15.00,1,15.00),(341,172,'FRANGO',15.00,1,15.00),(342,173,'CAMARÃO',20.00,1,20.00),(343,174,'CARNE SECA',20.00,1,20.00),(344,175,'CARNE SECA',20.00,1,20.00),(345,175,'LEGUMES',15.00,1,15.00),(346,176,'FRANGO',20.00,1,20.00),(347,176,'CARNE SECA',20.00,1,20.00),(348,177,'CAMARÃO',20.00,1,20.00),(349,178,'CAMARÃO',20.00,1,20.00),(350,179,'CAMARÃO',20.00,1,20.00),(351,180,'CARNE SECA',20.00,1,20.00),(352,181,'CAMARÃO',20.00,1,20.00),(353,182,'CARNE SECA',20.00,2,40.00),(354,183,'CAMARÃO',20.00,1,20.00),(355,184,'CARNE SECA',20.00,1,20.00),(356,184,'CAMARÃO',20.00,2,40.00),(357,185,'FRANGO',20.00,1,20.00),(358,185,'CAMARÃO',20.00,1,20.00),(359,186,'CARNE SECA',20.00,2,40.00),(360,187,'CARNE SECA',20.00,1,20.00),(361,187,'CAMARÃO',20.00,1,20.00),(362,188,'CAMARÃO',20.00,2,40.00),(363,189,'CARNE SECA',20.00,2,40.00),(364,190,'CALABRESA',15.00,1,15.00),(365,191,'CARNE SECA',20.00,3,60.00),(366,192,'CARNE SECA',20.00,1,20.00),(367,193,'CALABRESA',15.00,2,30.00),(368,193,'BANANA',7.00,1,7.00),(369,194,'LEGUMES',15.00,1,15.00),(370,195,'LEGUMES',15.00,1,15.00),(371,196,'LEGUMES',15.00,1,15.00),(372,197,'CARNE SECA',20.00,1,20.00),(373,198,'CARNE SECA',20.00,1,20.00),(374,198,'CAMARÃO',20.00,1,20.00),(375,199,'FRANGO',20.00,1,20.00),(376,199,'LEGUMES',15.00,1,15.00),(377,200,'CARNE SECA',20.00,1,20.00),(378,200,'CALABRESA',15.00,1,15.00),(379,201,'CARNE SECA',20.00,1,20.00),(380,201,'CALABRESA',15.00,1,15.00),(381,201,'BANANA',7.00,1,7.00),(382,202,'FRANGO',20.00,2,40.00),(383,202,'CARNE SECA',20.00,1,20.00),(384,202,'CALABRESA',15.00,1,15.00),(385,202,'LEGUMES',15.00,2,30.00),(386,203,'CARNE SECA',20.00,1,20.00),(387,204,'FRANGO',20.00,1,20.00),(388,205,'CARNE SECA',20.00,1,20.00),(389,206,'CARNE SECA',20.00,1,20.00),(390,207,'CARNE SECA',20.00,1,20.00),(391,208,'CARNE SECA',20.00,1,20.00),(392,209,'CARNE SECA',20.00,1,20.00),(393,210,'FRANGO',20.00,1,20.00),(394,210,'CALABRESA',15.00,2,30.00),(395,211,'CAMARÃO',20.00,1,20.00),(396,212,'FRANGO',20.00,1,20.00),(397,212,'CARNE SECA',20.00,2,40.00),(398,213,'FRANGO',20.00,1,20.00),(399,213,'CARNE SECA',20.00,1,20.00),(400,214,'CARNE SECA',20.00,1,20.00),(401,214,'CAMARÃO',20.00,1,20.00),(402,215,'FRANGO',20.00,2,40.00),(403,215,'CALABRESA',15.00,2,30.00),(404,216,'BANANA',7.00,1,7.00),(405,217,'LEGUMES',15.00,2,30.00),(406,218,'CARNE SECA',20.00,1,20.00),(407,218,'LEGUMES',15.00,1,15.00),(408,219,'BANANA',7.00,1,7.00),(409,220,'CALABRESA',15.00,1,15.00),(410,221,'CARNE SECA',20.00,1,20.00),(411,222,'FRANGO',20.00,1,20.00),(412,222,'CARNE SECA',20.00,1,20.00),(413,223,'FRANGO',20.00,1,20.00),(414,223,'CARNE SECA',20.00,1,20.00),(415,223,'CAMARÃO',20.00,1,20.00),(416,224,'FRANGO',20.00,1,20.00),(417,224,'CARNE SECA',20.00,1,20.00),(418,224,'CAMARÃO',20.00,1,20.00),(419,224,'CALABRESA',15.00,1,15.00),(420,225,'CAMARÃO',20.00,1,20.00),(421,225,'CALABRESA',15.00,1,15.00),(422,225,'BANANA',7.00,1,7.00),(423,226,'BANANA',7.00,1,7.00),(424,226,'LEGUMES',15.00,1,15.00),(425,226,'GRANDE',25.00,1,25.00),(426,227,'FRANGO',20.00,1,20.00),(427,227,'CARNE SECA',20.00,1,20.00),(428,227,'CAMARÃO',20.00,1,20.00),(429,227,'CALABRESA',15.00,1,15.00),(430,228,'CARNE SECA',20.00,1,20.00),(431,228,'CAMARÃO',20.00,1,20.00),(432,228,'CALABRESA',15.00,1,15.00),(433,228,'BANANA',7.00,1,7.00),(434,229,'CALABRESA',15.00,1,15.00),(435,229,'BANANA',7.00,1,7.00),(436,229,'LEGUMES',15.00,1,15.00),(437,230,'CAMARÃO',20.00,1,20.00),(438,230,'CALABRESA',15.00,1,15.00),(439,230,'BANANA',7.00,1,7.00),(440,231,'FRANGO',20.00,1,20.00),(441,232,'BANANA',7.00,1,7.00),(442,232,'LEGUMES',15.00,1,15.00),(443,232,'GRANDE',25.00,1,25.00);
/*!40000 ALTER TABLE `tb_itens_pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_pagamento_pedido`
--

DROP TABLE IF EXISTS `tb_pagamento_pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_pagamento_pedido` (
  `ppe_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `ped_codigo` int(11) DEFAULT NULL,
  `tpa_codigo` int(11) DEFAULT NULL,
  `ppe_valor` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`ppe_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=153 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_pagamento_pedido`
--

LOCK TABLES `tb_pagamento_pedido` WRITE;
/*!40000 ALTER TABLE `tb_pagamento_pedido` DISABLE KEYS */;
INSERT INTO `tb_pagamento_pedido` VALUES (3,83,0,5.00),(4,84,0,20.00),(5,85,1,25.00),(6,86,2,20.00),(7,87,2,100.00),(8,88,3,40.00),(9,89,1,50.00),(10,90,1,25.00),(11,91,2,40.00),(12,92,1,20.00),(13,93,3,20.00),(14,94,1,40.00),(15,95,2,27.00),(16,96,1,20.00),(17,97,3,60.00),(18,98,3,21200.00),(19,99,1,20.00),(20,100,1,20.00),(21,101,1,50.00),(22,102,1,40.00),(23,103,2,0.00),(24,104,3,20.00),(25,105,3,20.00),(26,106,2,40.00),(27,107,2,40.00),(28,108,2,20.00),(29,109,1,20.00),(30,110,1,40.00),(31,111,1,20.00),(32,112,1,7.00),(33,113,1,20.00),(34,114,2,15.00),(35,115,2,65.00),(36,116,1,25.00),(37,117,1,15.00),(38,118,1,7.00),(39,119,4,47.00),(40,120,1,34.00),(41,121,2,20.00),(42,122,3,20.00),(43,123,3,55.00),(44,124,2,20.00),(45,125,1,20.00),(46,126,1,7.00),(47,127,1,35.00),(48,128,2,20.00),(49,129,3,64.00),(50,130,2,20.00),(51,131,3,45.00),(52,132,2,20.00),(53,133,2,35.00),(54,134,3,20.00),(55,135,1,20.00),(56,136,2,0.00),(57,137,3,50.00),(58,138,4,18.00),(59,139,1,30.00),(60,140,2,40.00),(61,141,3,45.00),(62,142,3,53.00),(63,143,4,67.00),(64,144,1,35.00),(65,145,2,15.00),(66,146,2,15.00),(67,147,4,30.00),(68,148,4,40.00),(69,149,3,32.00),(70,150,1,50.00),(71,151,3,30.00),(72,152,2,35.00),(73,153,4,35.00),(74,154,2,60.00),(75,155,2,45.00),(76,156,1,25.00),(77,157,1,30.00),(78,158,2,37.00),(79,159,3,63.00),(80,160,3,45.00),(81,161,3,50.00),(82,162,3,15.00),(83,163,2,38.00),(84,164,1,80.00),(85,165,1,40.00),(86,166,2,93.00),(87,167,3,40.00),(88,168,4,45.00),(89,169,3,70.00),(90,170,3,40.00),(91,171,4,47.00),(92,172,1,30.00),(93,173,2,20.00),(94,174,2,20.00),(95,175,2,35.00),(96,176,2,40.00),(97,177,2,20.00),(98,178,2,20.00),(99,179,2,20.00),(100,180,2,20.00),(101,181,2,20.00),(102,182,2,40.00),(103,183,2,20.00),(104,184,2,60.00),(105,185,2,40.00),(106,186,2,40.00),(107,187,2,40.00),(108,188,2,40.00),(109,189,2,40.00),(110,190,2,15.00),(111,191,2,60.00),(112,192,2,20.00),(113,193,2,37.00),(114,194,2,15.00),(115,195,2,15.00),(116,196,2,15.00),(117,197,1,20.00),(118,198,1,40.00),(119,199,1,35.00),(120,200,1,35.00),(121,201,1,42.00),(122,202,1,105.00),(123,203,2,20.00),(124,204,2,20.00),(125,205,2,20.00),(126,206,2,20.00),(127,207,2,20.00),(128,208,2,20.00),(129,209,2,20.00),(130,210,1,50.00),(131,211,2,20.00),(132,212,3,60.00),(133,213,2,40.00),(134,214,3,40.00),(135,215,2,70.00),(136,216,1,7.00),(137,217,4,30.00),(138,218,2,35.00),(139,219,2,7.00),(140,220,1,15.00),(141,221,2,20.00),(142,222,3,40.00),(143,223,2,60.00),(144,224,2,75.00),(145,225,2,42.00),(146,226,2,47.00),(147,227,2,75.00),(148,228,2,62.00),(149,229,2,37.00),(150,230,1,42.00),(151,231,5,20.00),(152,232,1,47.00);
/*!40000 ALTER TABLE `tb_pagamento_pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_pedido`
--

DROP TABLE IF EXISTS `tb_pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_pedido` (
  `ped_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `ped_numero` int(11) NOT NULL,
  `ped_cliente` varchar(45) DEFAULT NULL,
  `usu_codigo` int(11) NOT NULL,
  `ped_data_venda` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ped_valor_total` decimal(10,2) NOT NULL,
  `stp_codigo` int(11) NOT NULL,
  `uve_codigo` int(11) NOT NULL,
  PRIMARY KEY (`ped_codigo`),
  KEY `fk_user_pedido` (`usu_codigo`),
  KEY `fk_status_pedido_idx` (`stp_codigo`),
  KEY `fk_tb_pedido_tb_unidade_venda1_idx` (`uve_codigo`),
  CONSTRAINT `fk_status_pedido` FOREIGN KEY (`stp_codigo`) REFERENCES `tb_status_pedido` (`stp_codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_unidade_venda_pedido` FOREIGN KEY (`uve_codigo`) REFERENCES `tb_unidade_venda` (`uve_codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_pedido` FOREIGN KEY (`usu_codigo`) REFERENCES `tb_usuario` (`usu_codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=233 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_pedido`
--

LOCK TABLES `tb_pedido` WRITE;
/*!40000 ALTER TABLE `tb_pedido` DISABLE KEYS */;
INSERT INTO `tb_pedido` VALUES (14,14,'MÃ¡rcio TESTE',1,'2014-12-24 13:01:35',30.00,5,2),(15,15,'MÃ¡rcio TESTE',1,'2014-12-24 13:02:45',162.00,5,2),(16,16,'NovoCliente',1,'2014-12-24 13:04:50',99.00,5,2),(17,17,'Gordo',1,'2014-12-24 13:11:55',30.00,5,2),(18,18,'Gordo',1,'2014-12-24 13:13:02',132.50,5,2),(19,19,'MÃ¡rcio TESTE',1,'2014-12-24 13:16:40',0.00,5,2),(20,20,'MÃ¡rcio TESTE',1,'2014-12-24 13:18:41',0.00,5,2),(21,21,'MÃ¡rcio TESTE',1,'2014-12-24 13:20:55',0.00,5,2),(22,22,'',1,'2014-12-24 13:21:14',0.00,5,2),(23,23,'Rafa',1,'2014-12-24 13:31:16',65.00,5,2),(24,24,'Clay',1,'2014-12-24 13:34:45',95.00,5,2),(25,25,'Cliente',1,'2014-12-24 13:46:46',60.00,5,2),(26,26,'',1,'2014-12-24 13:48:22',15.00,5,2),(27,27,'',1,'2014-12-24 13:52:01',0.00,5,2),(28,28,'Clay',1,'2014-12-24 14:18:29',15.00,5,3),(29,29,'Wellington',1,'2014-12-24 14:18:49',54.00,5,3),(30,30,'',1,'2014-12-24 14:23:01',15.00,5,3),(32,31,'Wellington',1,'2014-12-24 14:27:41',70.00,5,3),(33,33,'',1,'2014-12-24 15:24:04',0.00,5,3),(34,34,'',1,'2014-12-24 15:24:34',0.00,5,3),(35,35,'MÃ¡rcio',1,'2014-12-24 15:42:11',15.00,5,3),(36,36,'',1,'2014-12-24 15:51:44',0.00,5,3),(37,37,'',1,'2014-12-24 15:51:50',0.00,5,2),(38,38,'',1,'2014-12-24 15:52:03',0.00,5,2),(39,39,'',1,'2014-12-24 15:56:38',84.00,5,2),(40,40,'',1,'2014-12-24 16:01:50',81.00,5,2),(41,41,'',1,'2014-12-24 16:02:37',84.00,5,2),(42,42,'',1,'2014-12-24 16:03:13',133.50,5,2),(43,43,'Wellington',1,'2014-12-24 16:04:02',105.00,5,2),(44,44,'',1,'2015-01-11 15:03:03',15.00,5,2),(45,45,'',1,'2015-01-14 19:54:33',40.00,5,2),(46,46,'',1,'2015-01-16 21:08:46',45.00,5,3),(47,47,'',1,'2015-01-16 21:11:35',46.00,5,3),(48,48,'',1,'2015-01-16 21:12:07',50.00,5,3),(49,49,'',1,'2015-01-26 20:24:42',20.00,5,3),(50,50,'',1,'2015-01-26 20:24:52',33.00,5,3),(51,51,'',1,'2015-01-27 15:55:05',48.00,5,1),(52,52,'',1,'2015-01-27 15:55:19',50.00,5,1),(53,53,'',1,'2015-01-27 15:55:36',62.00,5,1),(54,54,'',1,'2015-01-28 00:12:29',48.00,5,1),(55,55,'',1,'2015-01-28 00:12:42',50.00,5,1),(56,56,'',1,'2015-01-28 00:15:33',40.00,5,1),(57,57,'',1,'2015-01-28 00:19:56',50.00,5,1),(58,58,'Márcio TESTE',1,'2015-01-28 14:18:58',15.00,5,1),(59,59,'Gordo',1,'2015-01-28 14:19:44',1500.00,5,1),(60,60,'Rafa',1,'2015-01-28 14:20:07',750.00,5,3),(61,61,'',1,'2015-01-28 23:31:50',85.00,5,4),(62,62,'',1,'2015-01-28 23:35:27',75.00,5,4),(63,63,'',1,'2015-01-28 23:36:31',57.00,5,4),(64,64,'',1,'2015-01-28 23:36:48',50.00,5,4),(65,65,'',1,'2015-01-28 23:37:03',50.00,5,4),(66,66,'',1,'2015-01-28 23:45:08',50.00,5,4),(67,67,'',1,'2015-01-28 23:48:30',50.00,5,7),(68,68,'',1,'2015-01-28 23:48:46',8.00,5,7),(69,69,'',1,'2015-01-28 23:49:02',75.00,5,7),(70,70,'',1,'2015-01-28 23:49:14',50.00,5,7),(71,71,'',1,'2015-01-29 00:00:54',100.00,5,5),(72,72,'',1,'2015-02-05 02:08:50',20.00,5,1),(73,73,'',1,'2015-02-05 02:09:44',20.00,5,1),(74,74,'',2,'2015-02-05 02:20:24',20.00,5,1),(75,75,'Márcio Ramos',2,'2015-02-05 02:30:08',20.00,5,1),(76,76,'eu',2,'2015-02-05 03:07:24',20.00,5,7),(83,77,'',2,'2015-03-08 20:02:40',5.00,5,1),(84,84,'',2,'2015-03-08 20:06:03',20.00,5,1),(85,85,'',2,'2015-03-08 20:06:24',25.00,5,1),(86,86,'',2,'2015-03-08 20:08:55',20.00,5,1),(87,87,'',2,'2015-03-08 20:10:07',100.00,5,1),(88,88,'',2,'2015-03-08 20:12:57',40.00,5,1),(89,89,'Márcio - HOJE',2,'2015-03-08 20:22:24',50.00,5,1),(90,90,'',2,'2015-03-08 20:56:44',25.00,5,5),(91,91,'Marcio TESTE',2,'2015-03-08 20:57:26',40.00,5,5),(92,1,'Márcio Ramos',2,'2015-03-08 21:04:16',20.00,5,5),(93,1,'Clay',2,'2015-03-08 21:04:53',20.00,5,5),(94,1,'Clay',2,'2015-03-08 21:47:31',40.00,5,6),(95,2,'Clay',2,'2015-03-08 21:58:09',27.00,5,6),(96,3,'',2,'2015-03-08 22:15:38',20.00,5,6),(97,4,'',2,'2015-03-08 22:16:06',60.00,5,6),(98,5,'',2,'2015-03-08 22:28:18',21200.00,5,6),(99,1,'',2,'2015-03-09 03:05:01',20.00,5,1),(100,2,'',2,'2015-03-09 03:05:30',20.00,5,1),(101,1,'',1,'2015-03-10 21:29:52',50.00,5,1),(102,1,'1',1,'2015-03-12 21:51:20',40.00,1,2),(103,2,'',1,'2015-03-12 21:54:39',0.00,1,2),(104,1,'3214',1,'2015-03-12 22:37:37',20.00,5,1),(105,2,'',1,'2015-03-12 22:38:17',20.00,5,1),(106,3,'',1,'2015-03-12 22:38:52',40.00,5,1),(107,4,'',1,'2015-03-12 22:39:08',40.00,5,1),(108,5,'',1,'2015-03-12 22:39:22',20.00,5,1),(109,6,'',1,'2015-03-12 22:39:45',20.00,5,1),(110,7,'',1,'2015-03-12 22:40:01',40.00,5,1),(111,8,'',1,'2015-03-12 22:40:16',20.00,5,1),(112,9,'',1,'2015-03-12 22:40:29',7.00,5,1),(113,10,'',1,'2015-03-12 22:40:53',20.00,5,1),(114,10,'',1,'2015-03-12 22:46:37',15.00,5,1),(115,10,'',1,'2015-03-12 22:47:20',65.00,5,1),(116,10,'',1,'2015-03-12 22:57:40',25.00,5,1),(117,10,'',1,'2015-03-12 22:59:17',15.00,5,1),(118,10,'',1,'2015-03-12 23:03:29',7.00,5,1),(119,10,'',1,'2015-03-12 23:10:57',47.00,5,1),(120,10,'',1,'2015-03-12 23:12:08',34.00,5,1),(121,10,'',1,'2015-03-12 23:24:07',20.00,5,1),(122,10,'',1,'2015-03-12 23:26:55',20.00,5,1),(123,10,'',1,'2015-03-12 23:29:44',55.00,5,1),(124,10,'',1,'2015-03-12 23:33:07',20.00,5,1),(125,10,'',1,'2015-03-12 23:36:07',20.00,5,1),(126,10,'',1,'2015-03-12 23:36:38',7.00,5,1),(127,10,'',1,'2015-03-13 00:28:23',35.00,5,1),(128,10,'',1,'2015-03-13 00:34:45',20.00,5,1),(129,10,'',1,'2015-03-13 00:55:45',64.00,5,1),(130,10,'',1,'2015-03-13 00:58:22',20.00,5,1),(131,10,'',1,'2015-03-13 01:09:28',45.00,5,1),(132,10,'',1,'2015-03-13 01:12:13',20.00,5,1),(133,10,'',1,'2015-03-13 01:20:26',35.00,5,1),(134,10,'',1,'2015-03-13 01:31:23',20.00,5,1),(135,1,'',1,'2015-03-13 16:36:12',20.00,5,8),(136,2,'',1,'2015-03-13 16:36:45',0.00,5,8),(137,3,'',1,'2015-03-13 16:36:58',50.00,5,8),(138,4,'',1,'2015-03-13 16:37:09',18.00,5,8),(139,5,'',1,'2015-03-13 16:37:20',30.00,5,8),(140,6,'',1,'2015-03-13 16:37:31',40.00,5,8),(141,7,'',1,'2015-03-13 16:37:43',45.00,5,8),(142,8,'',1,'2015-03-13 16:37:57',53.00,5,8),(143,9,'',1,'2015-03-13 16:38:07',67.00,5,8),(144,10,'',1,'2015-03-13 16:38:17',35.00,5,8),(145,10,'',1,'2015-03-13 16:38:28',15.00,5,8),(146,11,'',1,'2015-03-13 20:21:07',15.00,5,8),(147,12,'',1,'2015-03-13 20:22:48',30.00,5,8),(148,13,'',1,'2015-03-13 21:23:50',40.00,5,8),(149,14,'',1,'2015-03-13 21:24:01',32.00,5,8),(150,15,'',1,'2015-03-13 21:24:12',50.00,5,8),(151,1,'',1,'2015-03-15 01:52:25',30.00,5,8),(152,2,'',1,'2015-03-15 01:52:44',35.00,5,8),(153,3,'',1,'2015-03-15 01:53:21',35.00,5,8),(154,4,'',1,'2015-03-15 01:54:06',60.00,5,8),(155,5,'',1,'2015-03-15 01:54:34',45.00,5,8),(156,6,'',1,'2015-03-15 01:55:03',25.00,5,8),(157,7,'',1,'2015-03-15 01:56:18',30.00,5,8),(158,8,'',1,'2015-03-15 01:57:41',37.00,5,8),(159,9,'',1,'2015-03-15 01:58:37',63.00,5,8),(160,10,'',1,'2015-03-15 02:00:32',45.00,5,8),(161,11,'',1,'2015-03-15 02:01:40',50.00,5,8),(162,1,'',1,'2015-03-15 16:28:03',15.00,5,8),(163,2,'',1,'2015-03-15 16:28:43',38.00,5,8),(164,3,'',1,'2015-03-15 16:33:45',80.00,5,8),(165,1,'',1,'2015-03-22 20:27:08',40.00,5,8),(166,2,'',1,'2015-03-22 20:28:15',93.00,5,8),(167,3,'',1,'2015-03-22 20:29:22',40.00,5,8),(168,4,'',1,'2015-03-22 20:29:51',45.00,5,8),(169,1,'',1,'2015-03-26 21:57:58',70.00,5,8),(170,2,'',1,'2015-03-26 21:59:52',40.00,5,8),(171,3,'',1,'2015-03-26 22:10:46',47.00,5,8),(172,4,'',1,'2015-03-26 22:12:23',30.00,1,8),(173,1,'',1,'2015-03-26 23:32:38',20.00,5,1),(174,2,'',1,'2015-03-26 23:33:45',20.00,5,1),(175,3,'',1,'2015-03-26 23:38:31',35.00,5,1),(176,4,'',1,'2015-03-26 23:38:44',40.00,5,1),(177,5,'',1,'2015-03-26 23:39:05',20.00,5,1),(178,6,'',1,'2015-03-26 23:39:17',20.00,5,1),(179,7,'',1,'2015-03-26 23:39:30',20.00,5,1),(180,8,'',1,'2015-03-26 23:39:42',20.00,5,1),(181,9,'',1,'2015-03-26 23:39:55',20.00,5,1),(182,10,'',1,'2015-03-26 23:40:10',40.00,5,1),(183,11,'',1,'2015-03-26 23:40:22',20.00,5,1),(184,12,'',1,'2015-03-26 23:40:51',60.00,5,1),(185,13,'',1,'2015-03-26 23:41:07',40.00,5,1),(186,14,'',1,'2015-03-26 23:41:26',40.00,5,1),(187,15,'',1,'2015-03-26 23:41:40',40.00,5,1),(188,16,'',1,'2015-03-26 23:41:56',40.00,5,1),(189,17,'',1,'2015-03-26 23:42:12',40.00,5,1),(190,18,'',1,'2015-03-26 23:42:24',15.00,5,1),(191,19,'',1,'2015-03-26 23:42:52',60.00,5,1),(192,20,'',1,'2015-03-26 23:43:21',20.00,5,1),(193,21,'',1,'2015-03-26 23:43:45',37.00,5,1),(194,22,'',1,'2015-03-26 23:44:06',15.00,5,1),(195,23,'',1,'2015-03-26 23:44:27',15.00,5,1),(196,24,'',1,'2015-03-26 23:44:52',15.00,5,1),(197,25,'',1,'2015-03-26 23:45:14',20.00,5,1),(198,26,'',1,'2015-03-26 23:45:32',40.00,5,1),(199,27,'',1,'2015-03-26 23:46:07',35.00,5,1),(200,28,'',1,'2015-03-26 23:46:21',35.00,5,1),(201,29,'',1,'2015-03-26 23:46:42',42.00,5,1),(202,30,'',1,'2015-03-26 23:48:20',105.00,5,1),(203,31,'',1,'2015-03-26 23:53:21',20.00,5,1),(204,32,'',1,'2015-03-26 23:53:33',20.00,5,1),(205,33,'',1,'2015-03-26 23:54:53',20.00,5,1),(206,34,'',1,'2015-03-26 23:55:04',20.00,5,1),(207,35,'',1,'2015-03-26 23:55:16',20.00,5,1),(208,36,'',1,'2015-03-26 23:55:27',20.00,5,1),(209,37,'',1,'2015-03-26 23:58:06',20.00,5,1),(210,38,'',1,'2015-03-27 00:07:30',50.00,5,1),(211,39,'',1,'2015-03-27 00:08:02',20.00,5,1),(212,40,'',1,'2015-03-27 00:10:05',60.00,5,1),(213,41,'',1,'2015-03-27 00:15:15',40.00,5,1),(214,42,'',1,'2015-03-27 00:15:53',40.00,5,1),(215,43,'',1,'2015-03-27 00:18:12',70.00,5,1),(216,44,'',1,'2015-03-27 00:21:37',7.00,5,1),(217,45,'',1,'2015-03-27 00:33:52',30.00,5,1),(218,46,'',1,'2015-03-27 00:52:59',35.00,5,1),(219,47,'',1,'2015-03-27 01:08:19',7.00,5,1),(220,1,'',1,'2015-04-13 14:57:29',15.00,1,1),(221,2,'',1,'2015-04-13 14:57:39',20.00,1,1),(222,3,'',1,'2015-04-13 14:57:47',40.00,1,1),(223,4,'',1,'2015-04-13 14:57:58',60.00,1,1),(224,5,'',1,'2015-04-13 14:58:12',75.00,1,1),(225,6,'',1,'2015-04-13 14:58:19',42.00,1,1),(226,7,'',1,'2015-04-13 14:58:27',47.00,1,1),(227,8,'',1,'2015-04-13 14:58:37',75.00,1,1),(228,9,'',1,'2015-04-13 14:58:50',62.00,1,1),(229,10,'',1,'2015-04-13 14:58:57',37.00,1,1),(230,11,'',1,'2015-04-13 14:59:07',42.00,1,1),(231,1,'',1,'2015-04-14 23:51:59',20.00,1,10),(232,1,'',2,'2015-05-04 16:01:21',47.00,1,1);
/*!40000 ALTER TABLE `tb_pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_produto`
--

DROP TABLE IF EXISTS `tb_produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_produto` (
  `pro_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `pro_titulo` varchar(45) NOT NULL,
  `pro_valor` decimal(10,2) NOT NULL,
  `pro_descricao` text,
  `tpr_codigo` int(11) NOT NULL,
  `pro_status` char(1) DEFAULT NULL,
  PRIMARY KEY (`pro_codigo`),
  KEY `fk_tb_produto_tb_tipo_produto1_idx` (`tpr_codigo`),
  CONSTRAINT `fk_tipo_produto` FOREIGN KEY (`tpr_codigo`) REFERENCES `tb_tipo_produto` (`tpr_codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_produto`
--

LOCK TABLES `tb_produto` WRITE;
/*!40000 ALTER TABLE `tb_produto` DISABLE KEYS */;
INSERT INTO `tb_produto` VALUES (16,'CARNE MOÍDA',15.00,'Carne moída',1,'0'),(17,'FRANGO',20.00,'Frango',1,'1'),(18,'CARNE SECA',20.00,'Carne seca',1,'1'),(19,'CAMARÃO',20.00,'Camarao',1,'1'),(20,'CALABRESA',15.00,'Calabresa',1,'1'),(21,'BANANA',7.00,'Banana',5,'1'),(22,'COCA COLA',5.00,'Coca Cola',2,'0'),(23,'GUARANÁ',5.00,'Guarana',2,'0'),(24,'COCA ZERO',5.00,'Coca zero',2,'0'),(25,'AGUA',3.00,'Agua',3,'0'),(26,'LEGUMES',15.00,'Legumes',1,'1'),(27,'GRANDE',25.00,'Grande',1,'1');
/*!40000 ALTER TABLE `tb_produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_status_pedido`
--

DROP TABLE IF EXISTS `tb_status_pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_status_pedido` (
  `stp_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `stp_descricao` varchar(45) NOT NULL,
  PRIMARY KEY (`stp_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_status_pedido`
--

LOCK TABLES `tb_status_pedido` WRITE;
/*!40000 ALTER TABLE `tb_status_pedido` DISABLE KEYS */;
INSERT INTO `tb_status_pedido` VALUES (1,'Solicitado'),(2,'Montando'),(3,'Assando'),(4,'Entregando'),(5,'Finalizado');
/*!40000 ALTER TABLE `tb_status_pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_tipo_pagamento`
--

DROP TABLE IF EXISTS `tb_tipo_pagamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_tipo_pagamento` (
  `tpa_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `tpa_descricao` varchar(45) DEFAULT NULL,
  `tpa_status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`tpa_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_tipo_pagamento`
--

LOCK TABLES `tb_tipo_pagamento` WRITE;
/*!40000 ALTER TABLE `tb_tipo_pagamento` DISABLE KEYS */;
INSERT INTO `tb_tipo_pagamento` VALUES (1,'Dinheiro','1'),(2,'Cartao Debito','1'),(3,'Cartao Credito','1'),(4,'Vale Refeicao','1'),(5,'Doaçao','1');
/*!40000 ALTER TABLE `tb_tipo_pagamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_tipo_produto`
--

DROP TABLE IF EXISTS `tb_tipo_produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_tipo_produto` (
  `tpr_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `tpr_descricao` varchar(45) NOT NULL,
  PRIMARY KEY (`tpr_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_tipo_produto`
--

LOCK TABLES `tb_tipo_produto` WRITE;
/*!40000 ALTER TABLE `tb_tipo_produto` DISABLE KEYS */;
INSERT INTO `tb_tipo_produto` VALUES (1,'Escondidinhos'),(2,'Refrigerantes'),(3,'Aguas'),(4,'Cervejas'),(5,'Doces'),(6,'Sucos');
/*!40000 ALTER TABLE `tb_tipo_produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_unidade_venda`
--

DROP TABLE IF EXISTS `tb_unidade_venda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_unidade_venda` (
  `uve_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `uve_nome` varchar(255) NOT NULL,
  `uve_logradouro` text NOT NULL,
  PRIMARY KEY (`uve_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_unidade_venda`
--

LOCK TABLES `tb_unidade_venda` WRITE;
/*!40000 ALTER TABLE `tb_unidade_venda` DISABLE KEYS */;
INSERT INTO `tb_unidade_venda` VALUES (1,'Abbatepietro','Rua Carlos Weber'),(2,'Dudalina','Moema'),(3,'Armazem','Itaim Bibi'),(4,'Shopping D Pedro','Campinas'),(5,'Lets Beer','Vila Mariana'),(6,'Capitao Barley','Pompeia'),(7,'Adega Pelotas','Vila Mariana'),(8,'Unidade de Teste','Rua Teste'),(9,'DRESS ME UP','Brooklin'),(10,'West Plaza','Oeste');
/*!40000 ALTER TABLE `tb_unidade_venda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_usuario`
--

DROP TABLE IF EXISTS `tb_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_usuario` (
  `usu_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `usu_nome` varchar(45) NOT NULL,
  `usu_senha` varchar(45) NOT NULL,
  `usu_login` varchar(45) NOT NULL,
  `per_codigo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`usu_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_usuario`
--

LOCK TABLES `tb_usuario` WRITE;
/*!40000 ALTER TABLE `tb_usuario` DISABLE KEYS */;
INSERT INTO `tb_usuario` VALUES (1,'Mario Leite','7c4a8d09ca3762af61e59520943dc26494f8941b','marioleite',NULL),(2,'Márcio Ramos','7c4a8d09ca3762af61e59520943dc26494f8941b','marcio.santos',NULL),(3,'Claudia Gonçalves Ferreira','7c4a8d09ca3762af61e59520943dc26494f8941b','claudiaferreira',NULL);
/*!40000 ALTER TABLE `tb_usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-05-04 13:04:49
