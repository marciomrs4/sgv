-- MySQL dump 10.13  Distrib 5.5.41, for debian-linux-gnu (x86_64)
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
) ENGINE=InnoDB AUTO_INCREMENT=206 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_itens_pedido`
--

LOCK TABLES `tb_itens_pedido` WRITE;
/*!40000 ALTER TABLE `tb_itens_pedido` DISABLE KEYS */;
INSERT INTO `tb_itens_pedido` VALUES (1,14,'Carne Moída',15.00,2,30.00),(2,15,'Carne Moída',15.00,2,30.00),(3,15,'Frango',15.00,2,30.00),(4,15,'Carne Seca',18.00,2,36.00),(5,15,'Camarão',18.00,2,36.00),(6,15,'Calabreza',15.00,2,30.00),(7,16,'Carne Moída',15.00,3,45.00),(8,16,'Camarão',18.00,3,54.00),(9,17,'Descricao do Item: 2',15.00,1,15.00),(10,17,'Descricao do Item: 4',15.00,1,15.00),(11,18,'Descricao do Item: 1',15.00,3,45.00),(12,18,'Descricao do Item: 4',17.50,5,87.50),(13,23,'Descricao do Item: 17',15.00,3,45.00),(14,23,'Descricao do Item: 18',20.00,1,20.00),(15,24,'Carne Seca',15.00,4,60.00),(16,24,'Camarão',17.50,2,35.00),(17,25,'Carne Moída',15.00,2,30.00),(18,25,'Frango',15.00,2,30.00),(19,26,'Carne Moída',15.00,1,15.00),(20,28,'Carne Moída',15.00,1,15.00),(21,29,'Carne Seca',18.00,1,18.00),(22,29,'Camarão',18.00,2,36.00),(23,30,'Carne Moída',15.00,1,15.00),(24,32,'Chocolate',17.50,4,70.00),(25,35,'Carne Moída',15.00,1,15.00),(26,39,'Carne Moída',15.00,1,15.00),(27,39,'Frango',15.00,1,15.00),(28,39,'Camarão',18.00,3,54.00),(29,40,'Carne Seca',18.00,2,36.00),(30,40,'Calabreza',15.00,3,45.00),(31,41,'Carne Seca',18.00,3,54.00),(32,41,'Calabreza',15.00,2,30.00),(33,42,'Carne Moída',15.00,3,45.00),(34,42,'Carne Seca',18.00,2,36.00),(35,42,'Chocolate',17.50,3,52.50),(36,43,'Carne Moída',15.00,3,45.00),(37,43,'Frango',15.00,2,30.00),(38,43,'Calabreza',15.00,2,30.00),(39,44,'Calabreza',15.00,1,15.00),(40,45,'Carne Moída',15.00,2,30.00),(41,45,'Coca Cola',5.00,1,5.00),(42,45,'Guarana',5.00,1,5.00),(43,46,'Carne Moída',15.00,1,15.00),(44,46,'Carne Seca',18.00,1,18.00),(45,46,'Banana',7.00,1,7.00),(46,46,'Guarana',5.00,1,5.00),(47,47,'Carne Seca',18.00,1,18.00),(48,47,'Camarão',18.00,1,18.00),(49,47,'Coca Cola',5.00,2,10.00),(50,48,'Carne Seca',18.00,1,18.00),(51,48,'Calabreza',15.00,1,15.00),(52,48,'Banana',7.00,1,7.00),(53,48,'Guarana',5.00,1,5.00),(54,48,'Coca Zero',5.00,1,5.00),(55,49,'Carne Moída',15.00,1,15.00),(56,49,'Coca Zero',5.00,1,5.00),(57,50,'Frango',15.00,2,30.00),(58,50,'Agua',3.00,1,3.00),(59,51,'Carne Moída',20.00,1,20.00),(60,51,'Frango',20.00,1,20.00),(61,51,'Coca Cola',5.00,1,5.00),(62,51,'Agua',3.00,1,3.00),(63,52,'Carne Seca',20.00,2,40.00),(64,52,'Coca Cola',5.00,1,5.00),(65,52,'Guarana',5.00,1,5.00),(66,53,'Camarão',20.00,1,20.00),(67,53,'Calabreza',20.00,1,20.00),(68,53,'Banana',7.00,1,7.00),(69,53,'Coca Cola',5.00,2,10.00),(70,53,'Guarana',5.00,1,5.00),(71,54,'Carne Moída',20.00,1,20.00),(72,54,'Frango',20.00,1,20.00),(73,54,'Coca Cola',5.00,1,5.00),(74,54,'Agua',3.00,1,3.00),(75,55,'Carne Moída',20.00,2,40.00),(76,55,'Guarana',5.00,2,10.00),(77,56,'Carne Moída',20.00,1,20.00),(78,56,'Frango',20.00,1,20.00),(79,57,'Carne Moída',20.00,1,20.00),(80,57,'Frango',20.00,1,20.00),(81,57,'Coca Cola',5.00,1,5.00),(82,57,'Coca Zero',5.00,1,5.00),(83,58,'Carne Moída',15.00,1,15.00),(84,59,'Carne Moída',15.00,100,1500.00),(85,60,'Carne Moída',15.00,50,750.00),(86,61,'Carne Moída',20.00,3,60.00),(87,61,'Frango',20.00,1,20.00),(88,61,'Coca Zero',5.00,1,5.00),(89,62,'Carne Moída',20.00,1,20.00),(90,62,'Frango',20.00,1,20.00),(91,62,'Carne Seca',20.00,1,20.00),(92,62,'Coca Cola',5.00,1,5.00),(93,62,'Guarana',5.00,1,5.00),(94,62,'Coca Zero',5.00,1,5.00),(95,63,'Carne Seca',20.00,1,20.00),(96,63,'Camarão',20.00,1,20.00),(97,63,'Banana',7.00,1,7.00),(98,63,'Coca Cola',5.00,1,5.00),(99,63,'Guarana',5.00,1,5.00),(100,64,'Calabreza',20.00,2,40.00),(101,64,'Coca Cola',5.00,2,10.00),(102,65,'Carne Seca',20.00,2,40.00),(103,65,'Coca Cola',5.00,1,5.00),(104,65,'Coca Zero',5.00,1,5.00),(105,66,'Carne Seca',20.00,1,20.00),(106,66,'Camarão',20.00,1,20.00),(107,66,'Coca Cola',5.00,1,5.00),(108,66,'Guarana',5.00,1,5.00),(109,67,'Carne Seca',20.00,1,20.00),(110,67,'Camarão',20.00,1,20.00),(111,67,'Coca Cola',5.00,2,10.00),(112,68,'Coca Cola',5.00,1,5.00),(113,68,'Agua',3.00,1,3.00),(114,69,'Carne Seca',20.00,3,60.00),(115,69,'Coca Cola',5.00,1,5.00),(116,69,'Guarana',5.00,2,10.00),(117,70,'Camarão',20.00,1,20.00),(118,70,'Calabreza',20.00,1,20.00),(119,70,'Coca Cola',5.00,1,5.00),(120,70,'Coca Zero',5.00,1,5.00),(121,71,'Carne Seca',20.00,3,60.00),(122,71,'Camarão',20.00,1,20.00),(123,71,'Guarana',5.00,2,10.00),(124,71,'Coca Zero',5.00,2,10.00),(125,72,'Carne Moída',20.00,1,20.00),(126,73,'Frango',20.00,1,20.00),(127,74,'Frango',20.00,1,20.00),(128,75,'Carne Seca',20.00,1,20.00),(129,76,'Carne Moída',20.00,1,20.00),(136,83,'Guarana',5.00,1,5.00),(137,84,'Carne Moída',20.00,1,20.00),(138,85,'Carne Moída',20.00,1,20.00),(139,85,'Coca Zero',5.00,1,5.00),(140,86,'Carne Moída',20.00,1,20.00),(141,87,'Carne Moída',20.00,5,100.00),(142,88,'Carne Moída',20.00,2,40.00),(143,89,'Carne Moída',20.00,1,20.00),(144,89,'Carne Seca',20.00,1,20.00),(145,89,'Coca Cola',5.00,1,5.00),(146,89,'Coca Zero',5.00,1,5.00),(147,90,'Carne Moída',20.00,1,20.00),(148,90,'Guarana',5.00,1,5.00),(149,91,'Carne Moída',20.00,1,20.00),(150,91,'Carne Seca',20.00,1,20.00),(151,92,'Carne Moída',20.00,1,20.00),(152,93,'Carne Moída',20.00,1,20.00),(153,94,'Carne Moída',20.00,1,20.00),(154,94,'Frango',20.00,1,20.00),(155,95,'Banana',7.00,1,7.00),(156,95,'Carne Seca',20.00,1,20.00),(157,96,'Carne Moída',20.00,1,20.00),(158,97,'Carne Seca',20.00,3,60.00),(159,98,'Carne Moída',20.00,100,2000.00),(160,98,'Frango',20.00,100,2000.00),(161,98,'Carne Seca',20.00,100,2000.00),(162,98,'Camarão',20.00,100,2000.00),(163,98,'Calabreza',20.00,100,2000.00),(164,98,'Banana',7.00,100,700.00),(165,98,'Coca Cola',5.00,500,2500.00),(166,98,'Guarana',5.00,500,2500.00),(167,98,'Coca Zero',5.00,500,2500.00),(168,98,'Agua',3.00,1000,3000.00),(169,99,'Carne Moída',20.00,2,40.00),(170,100,'Carne Moída',20.00,3,60.00),(171,101,'Carne Moída',20.00,1,20.00),(172,102,'Carne Moída',20.00,1,20.00),(173,103,'Agua',3.00,1,3.00),(174,104,'Agua',3.00,1,3.00),(175,105,'Agua',3.00,1,3.00),(176,106,'Agua',3.00,1,3.00),(177,107,'Carne Moída',20.00,1,20.00),(178,108,'Agua',3.00,1,3.00),(179,109,'Agua',3.00,1,3.00),(180,110,'Agua',3.00,1,3.00),(181,111,'Agua',3.00,1,3.00),(182,112,'Agua',3.00,1,3.00),(183,113,'Agua',3.00,2,6.00),(184,114,'Guarana',5.00,1,5.00),(185,114,'Coca Zero',5.00,1,5.00),(186,115,'Calabreza',20.00,1,20.00),(187,115,'Coca Cola',5.00,1,5.00),(188,115,'Coca Zero',5.00,1,5.00),(189,116,'Carne Moída',20.00,1,20.00),(190,117,'Agua',3.00,1,3.00),(191,118,'Guarana',5.00,1,5.00),(192,118,'Coca Zero',5.00,1,5.00),(193,119,'Coca Zero',5.00,2,10.00),(194,129,'Carne Moída',20.50,1,20.50),(195,129,'Frango',20.00,1,20.00),(196,129,'Carne Seca',20.00,1,20.00),(197,129,'Camarão',20.00,1,20.00),(198,129,'Calabreza',20.00,1,20.00),(199,129,'Banana',7.00,1,7.00),(200,129,'Coca Cola',5.00,1,5.00),(201,129,'Guarana',5.00,1,5.00),(202,129,'Coca Zero',5.00,1,5.00),(203,129,'Agua',3.00,1,3.00),(204,130,'Coca Zero',5.00,10,50.00),(205,130,'Agua',3.00,2,6.00);
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
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_pagamento_pedido`
--

LOCK TABLES `tb_pagamento_pedido` WRITE;
/*!40000 ALTER TABLE `tb_pagamento_pedido` DISABLE KEYS */;
INSERT INTO `tb_pagamento_pedido` VALUES (3,83,0,5.00),(4,84,0,20.00),(5,85,1,25.00),(6,86,2,20.00),(7,87,2,100.00),(8,88,3,40.00),(9,89,1,50.00),(10,90,1,25.00),(11,91,2,40.00),(12,92,1,20.00),(13,93,3,20.00),(14,94,1,40.00),(15,95,2,27.00),(16,96,1,20.00),(17,97,3,60.00),(18,98,3,21200.00),(19,99,1,40.00),(20,100,3,60.00),(21,101,1,20.00),(22,102,2,20.00),(23,103,2,3.00),(24,104,3,3.00),(25,105,2,3.00),(26,106,1,3.00),(27,107,2,20.00),(28,108,1,3.00),(29,109,2,3.00),(30,110,3,3.00),(31,111,2,3.00),(32,112,1,3.00),(33,113,1,6.00),(34,114,1,10.00),(35,115,1,30.00),(36,116,2,20.00),(37,117,1,3.00),(38,118,1,10.00),(39,119,1,10.00),(40,120,2,0.00),(41,121,1,0.00),(42,122,1,0.00),(43,123,1,0.00),(44,124,1,0.00),(45,125,1,0.00),(46,126,1,0.00),(47,127,1,0.00),(48,128,1,0.00),(49,129,1,125.50),(50,130,3,56.00);
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
) ENGINE=InnoDB AUTO_INCREMENT=131 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_pedido`
--

LOCK TABLES `tb_pedido` WRITE;
/*!40000 ALTER TABLE `tb_pedido` DISABLE KEYS */;
INSERT INTO `tb_pedido` VALUES (14,14,'MÃ¡rcio TESTE',1,'2014-12-24 13:01:35',30.00,2,2),(15,15,'MÃ¡rcio TESTE',1,'2014-12-24 13:02:45',162.00,3,2),(16,16,'NovoCliente',1,'2014-12-24 13:04:50',99.00,2,2),(17,17,'Gordo',1,'2014-12-24 13:11:55',30.00,1,2),(18,18,'Gordo',1,'2014-12-24 13:13:02',132.50,1,2),(19,19,'MÃ¡rcio TESTE',1,'2014-12-24 13:16:40',0.00,1,2),(20,20,'MÃ¡rcio TESTE',1,'2014-12-24 13:18:41',0.00,2,2),(21,21,'MÃ¡rcio TESTE',1,'2014-12-24 13:20:55',0.00,1,2),(22,22,'',1,'2014-12-24 13:21:14',0.00,1,2),(23,23,'Rafa',1,'2014-12-24 13:31:16',65.00,1,2),(24,24,'Clay',1,'2014-12-24 13:34:45',95.00,1,2),(25,25,'Cliente',1,'2014-12-24 13:46:46',60.00,1,2),(26,26,'',1,'2014-12-24 13:48:22',15.00,1,2),(27,27,'',1,'2014-12-24 13:52:01',0.00,1,2),(28,28,'Clay',1,'2014-12-24 14:18:29',15.00,1,3),(29,29,'Wellington',1,'2014-12-24 14:18:49',54.00,1,3),(30,30,'',1,'2014-12-24 14:23:01',15.00,1,3),(32,31,'Wellington',1,'2014-12-24 14:27:41',70.00,1,3),(33,33,'',1,'2014-12-24 15:24:04',0.00,1,3),(34,34,'',1,'2014-12-24 15:24:34',0.00,1,3),(35,35,'MÃ¡rcio',1,'2014-12-24 15:42:11',15.00,1,3),(36,36,'',1,'2014-12-24 15:51:44',0.00,1,3),(37,37,'',1,'2014-12-24 15:51:50',0.00,1,2),(38,38,'',1,'2014-12-24 15:52:03',0.00,1,2),(39,39,'',1,'2014-12-24 15:56:38',84.00,1,2),(40,40,'',1,'2014-12-24 16:01:50',81.00,1,2),(41,41,'',1,'2014-12-24 16:02:37',84.00,1,2),(42,42,'',1,'2014-12-24 16:03:13',133.50,1,2),(43,43,'Wellington',1,'2014-12-24 16:04:02',105.00,1,2),(44,44,'',1,'2015-01-11 15:03:03',15.00,1,2),(45,45,'',1,'2015-01-14 19:54:33',40.00,1,2),(46,46,'',1,'2015-01-16 21:08:46',45.00,1,3),(47,47,'',1,'2015-01-16 21:11:35',46.00,1,3),(48,48,'',1,'2015-01-16 21:12:07',50.00,1,3),(49,49,'',1,'2015-01-26 20:24:42',20.00,1,3),(50,50,'',1,'2015-01-26 20:24:52',33.00,1,3),(51,51,'',1,'2015-01-27 15:55:05',48.00,1,1),(52,52,'',1,'2015-01-27 15:55:19',50.00,1,1),(53,53,'',1,'2015-01-27 15:55:36',62.00,1,1),(54,54,'',1,'2015-01-28 00:12:29',48.00,1,1),(55,55,'',1,'2015-01-28 00:12:42',50.00,1,1),(56,56,'',1,'2015-01-28 00:15:33',40.00,1,1),(57,57,'',1,'2015-01-28 00:19:56',50.00,1,1),(58,58,'Márcio TESTE',1,'2015-01-28 14:18:58',15.00,1,1),(59,59,'Gordo',1,'2015-01-28 14:19:44',1500.00,1,1),(60,60,'Rafa',1,'2015-01-28 14:20:07',750.00,1,3),(61,61,'',1,'2015-01-28 23:31:50',85.00,1,4),(62,62,'',1,'2015-01-28 23:35:27',75.00,1,4),(63,63,'',1,'2015-01-28 23:36:31',57.00,1,4),(64,64,'',1,'2015-01-28 23:36:48',50.00,1,4),(65,65,'',1,'2015-01-28 23:37:03',50.00,1,4),(66,66,'',1,'2015-01-28 23:45:08',50.00,1,4),(67,67,'',1,'2015-01-28 23:48:30',50.00,1,7),(68,68,'',1,'2015-01-28 23:48:46',8.00,1,7),(69,69,'',1,'2015-01-28 23:49:02',75.00,1,7),(70,70,'',1,'2015-01-28 23:49:14',50.00,1,7),(71,71,'',1,'2015-01-29 00:00:54',100.00,1,5),(72,72,'',1,'2015-02-05 02:08:50',20.00,1,1),(73,73,'',1,'2015-02-05 02:09:44',20.00,1,1),(74,74,'',2,'2015-02-05 02:20:24',20.00,1,1),(75,75,'Márcio Ramos',2,'2015-02-05 02:30:08',20.00,1,1),(76,76,'eu',2,'2015-02-05 03:07:24',20.00,1,7),(83,77,'',2,'2015-03-08 20:02:40',5.00,1,1),(84,84,'',2,'2015-03-08 20:06:03',20.00,1,1),(85,85,'',2,'2015-03-08 20:06:24',25.00,1,1),(86,86,'',2,'2015-03-08 20:08:55',20.00,1,1),(87,87,'',2,'2015-03-08 20:10:07',100.00,1,1),(88,88,'',2,'2015-03-08 20:12:57',40.00,1,1),(89,89,'Márcio - HOJE',2,'2015-03-08 20:22:24',50.00,1,1),(90,90,'',2,'2015-03-08 20:56:44',25.00,1,5),(91,91,'Marcio TESTE',2,'2015-03-08 20:57:26',40.00,1,5),(92,1,'Márcio Ramos',2,'2015-03-08 21:04:16',20.00,1,5),(93,1,'Clay',2,'2015-03-08 21:04:53',20.00,1,5),(94,1,'Clay',2,'2015-03-08 21:47:31',40.00,1,6),(95,2,'Clay',2,'2015-03-08 21:58:09',27.00,1,6),(96,3,'',2,'2015-03-08 22:15:38',20.00,1,6),(97,4,'',2,'2015-03-08 22:16:06',60.00,1,6),(98,5,'',2,'2015-03-08 22:28:18',21200.00,4,6),(99,1,'',2,'2015-03-09 03:21:00',40.00,1,1),(100,2,'',2,'2015-03-09 03:22:10',60.00,1,1),(101,1,'',2,'2015-03-14 18:37:00',20.00,1,1),(102,2,'',2,'2015-03-14 18:37:20',20.00,1,1),(103,3,'',2,'2015-03-14 18:39:13',3.00,1,1),(104,4,'',2,'2015-03-14 18:41:19',3.00,1,1),(105,5,'',2,'2015-03-14 18:43:04',3.00,1,1),(106,6,'',2,'2015-03-14 18:43:18',3.00,1,1),(107,7,'',2,'2015-03-14 18:44:56',20.00,1,1),(108,8,'',2,'2015-03-14 18:46:09',3.00,1,1),(109,9,'',2,'2015-03-14 18:46:15',3.00,1,1),(110,10,'',2,'2015-03-14 18:46:21',3.00,1,1),(111,10,'',2,'2015-03-14 18:47:13',3.00,1,1),(112,11,'',2,'2015-03-14 18:55:25',3.00,1,1),(113,12,'',2,'2015-03-14 19:47:41',6.00,1,1),(114,13,'',2,'2015-03-14 20:04:04',10.00,1,1),(115,14,'',2,'2015-03-14 22:57:19',30.00,1,1),(116,15,'',2,'2015-03-14 22:57:35',20.00,1,1),(117,16,'',2,'2015-03-14 23:16:04',3.00,1,1),(118,17,'',2,'2015-03-14 23:59:52',10.00,1,1),(119,18,'',2,'2015-03-15 02:38:10',10.00,1,1),(120,19,'',2,'2015-03-15 02:40:00',0.00,1,1),(121,20,'',2,'2015-03-15 02:40:43',0.00,1,1),(122,21,'',2,'2015-03-15 02:58:04',0.00,1,1),(123,1,'',2,'2015-03-15 03:05:11',0.00,1,1),(124,2,'',2,'2015-03-15 03:09:20',0.00,1,1),(125,3,'',2,'2015-03-15 03:10:56',0.00,1,1),(126,4,'',2,'2015-03-15 03:15:42',0.00,1,1),(127,5,'',2,'2015-03-15 03:17:00',0.00,1,1),(128,6,'',2,'2015-03-15 03:17:41',0.00,1,1),(129,7,'',2,'2015-03-15 03:25:39',125.50,1,1),(130,8,'',2,'2015-03-15 03:28:09',56.00,1,1);
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
  PRIMARY KEY (`pro_codigo`),
  KEY `fk_tb_produto_tb_tipo_produto1_idx` (`tpr_codigo`),
  CONSTRAINT `fk_tipo_produto` FOREIGN KEY (`tpr_codigo`) REFERENCES `tb_tipo_produto` (`tpr_codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_produto`
--

LOCK TABLES `tb_produto` WRITE;
/*!40000 ALTER TABLE `tb_produto` DISABLE KEYS */;
INSERT INTO `tb_produto` VALUES (16,'Carne Moída',20.50,'produto',1),(17,'Frango',20.00,NULL,1),(18,'Carne Seca',20.00,NULL,1),(19,'Camarão',20.00,NULL,1),(20,'Calabreza',20.00,NULL,1),(21,'Banana',7.00,NULL,5),(22,'Coca Cola',5.00,NULL,2),(23,'Guarana',5.00,NULL,2),(24,'Coca Zero',5.00,NULL,2),(25,'Agua',3.00,NULL,3);
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
  PRIMARY KEY (`tpa_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_tipo_pagamento`
--

LOCK TABLES `tb_tipo_pagamento` WRITE;
/*!40000 ALTER TABLE `tb_tipo_pagamento` DISABLE KEYS */;
INSERT INTO `tb_tipo_pagamento` VALUES (1,'Dinheiro'),(2,'Cartao Debito'),(3,'Cartao Credito');
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_unidade_venda`
--

LOCK TABLES `tb_unidade_venda` WRITE;
/*!40000 ALTER TABLE `tb_unidade_venda` DISABLE KEYS */;
INSERT INTO `tb_unidade_venda` VALUES (1,'Abbatepietro','Rua Carlos Weber'),(2,'Dudalina','Moema'),(3,'Armazem','Itaim Bibi'),(4,'Shopping D Pedro','Campinas'),(5,'Lets Beer','Vila Mariana'),(6,'Capitao Barley','Pompeia'),(7,'Adega Pelotas','Vila Mariana');
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_usuario`
--

LOCK TABLES `tb_usuario` WRITE;
/*!40000 ALTER TABLE `tb_usuario` DISABLE KEYS */;
INSERT INTO `tb_usuario` VALUES (1,'Mario Leite','7c4a8d09ca3762af61e59520943dc26494f8941b','marioleite',NULL),(2,'Márcio Ramos','7c4a8d09ca3762af61e59520943dc26494f8941b','marcio.santos',NULL);
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

-- Dump completed on 2015-03-15  0:35:54
