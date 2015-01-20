-- MySQL dump 10.13  Distrib 5.5.29, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: sgv
-- ------------------------------------------------------
-- Server version	5.5.29-0ubuntu0.12.04.2

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
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_itens_pedido`
--

LOCK TABLES `tb_itens_pedido` WRITE;
/*!40000 ALTER TABLE `tb_itens_pedido` DISABLE KEYS */;
INSERT INTO `tb_itens_pedido` VALUES (1,14,'Carne Moída',15.00,2,30.00),(2,15,'Carne Moída',15.00,2,30.00),(3,15,'Frango',15.00,2,30.00),(4,15,'Carne Seca',18.00,2,36.00),(5,15,'Camarão',18.00,2,36.00),(6,15,'Calabreza',15.00,2,30.00),(7,16,'Carne Moída',15.00,3,45.00),(8,16,'Camarão',18.00,3,54.00),(9,17,'Descricao do Item: 2',15.00,1,15.00),(10,17,'Descricao do Item: 4',15.00,1,15.00),(11,18,'Descricao do Item: 1',15.00,3,45.00),(12,18,'Descricao do Item: 4',17.50,5,87.50),(13,23,'Descricao do Item: 17',15.00,3,45.00),(14,23,'Descricao do Item: 18',20.00,1,20.00),(15,24,'Carne Seca',15.00,4,60.00),(16,24,'Camarão',17.50,2,35.00),(17,25,'Carne Moída',15.00,2,30.00),(18,25,'Frango',15.00,2,30.00),(19,26,'Carne Moída',15.00,1,15.00),(20,28,'Carne Moída',15.00,1,15.00),(21,29,'Carne Seca',18.00,1,18.00),(22,29,'Camarão',18.00,2,36.00),(23,30,'Carne Moída',15.00,1,15.00),(24,32,'Chocolate',17.50,4,70.00),(25,35,'Carne Moída',15.00,1,15.00),(26,39,'Carne Moída',15.00,1,15.00),(27,39,'Frango',15.00,1,15.00),(28,39,'Camarão',18.00,3,54.00),(29,40,'Carne Seca',18.00,2,36.00),(30,40,'Calabreza',15.00,3,45.00),(31,41,'Carne Seca',18.00,3,54.00),(32,41,'Calabreza',15.00,2,30.00),(33,42,'Carne Moída',15.00,3,45.00),(34,42,'Carne Seca',18.00,2,36.00),(35,42,'Chocolate',17.50,3,52.50),(36,43,'Carne Moída',15.00,3,45.00),(37,43,'Frango',15.00,2,30.00),(38,43,'Calabreza',15.00,2,30.00),(39,44,'Carne Moída',15.00,1,15.00),(40,44,'Frango',15.00,1,15.00);
/*!40000 ALTER TABLE `tb_itens_pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_pedido`
--

DROP TABLE IF EXISTS `tb_pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_pedido` (
  `ped_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `ped_numero` varchar(45) NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_pedido`
--

LOCK TABLES `tb_pedido` WRITE;
/*!40000 ALTER TABLE `tb_pedido` DISABLE KEYS */;
INSERT INTO `tb_pedido` VALUES (14,'1','MÃ¡rcio TESTE',1,'2014-12-24 13:01:35',30.00,1,1),(15,'15','MÃ¡rcio TESTE',1,'2014-12-24 13:02:45',162.00,1,1),(16,'16','NovoCliente',1,'2014-12-24 13:04:50',99.00,1,1),(17,'17','Gordo',1,'2014-12-24 13:11:55',30.00,1,1),(18,'18','Gordo',1,'2014-12-24 13:13:02',132.50,1,1),(19,'19','MÃ¡rcio TESTE',1,'2014-12-24 13:16:40',0.00,1,1),(20,'20','MÃ¡rcio TESTE',1,'2014-12-24 13:18:41',0.00,1,1),(21,'21','MÃ¡rcio TESTE',1,'2014-12-24 13:20:55',0.00,1,1),(22,'22','',1,'2014-12-24 13:21:14',0.00,1,1),(23,'23','Rafa',1,'2014-12-24 13:31:16',65.00,1,1),(24,'24','Clay',1,'2014-12-24 13:34:45',95.00,1,1),(25,'25','Cliente',1,'2014-12-24 13:46:46',60.00,1,1),(26,'26','',1,'2014-12-24 13:48:22',15.00,1,1),(27,'27','',1,'2014-12-24 13:52:01',0.00,1,1),(28,'28','Clay',1,'2014-12-24 14:18:29',15.00,1,1),(29,'29','Wellington',1,'2014-12-24 14:18:49',54.00,1,1),(30,'30','',1,'2014-12-24 14:23:01',15.00,1,1),(32,'31','Wellington',1,'2014-12-24 14:27:41',70.00,1,1),(33,'33','',1,'2014-12-24 15:24:04',0.00,1,1),(34,'34','',1,'2014-12-24 15:24:34',0.00,1,1),(35,'35','MÃ¡rcio',1,'2014-12-24 15:42:11',15.00,1,1),(36,'36','',1,'2014-12-24 15:51:44',0.00,1,1),(37,'37','',1,'2014-12-24 15:51:50',0.00,1,1),(38,'38','',1,'2014-12-24 15:52:03',0.00,1,1),(39,'39','',1,'2014-12-24 15:56:38',84.00,1,1),(40,'40','',1,'2014-12-24 16:01:50',81.00,1,1),(41,'41','',1,'2014-12-24 16:02:37',84.00,1,1),(42,'42','',1,'2014-12-24 16:03:13',133.50,1,1),(43,'43','Wellington',1,'2014-12-24 16:04:02',105.00,1,1),(44,'44','',1,'2015-01-11 16:01:44',30.00,1,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_produto`
--

LOCK TABLES `tb_produto` WRITE;
/*!40000 ALTER TABLE `tb_produto` DISABLE KEYS */;
INSERT INTO `tb_produto` VALUES (16,'Carne Moída',15.00,NULL,1),(17,'Frango',15.00,NULL,1),(18,'Carne Seca',18.00,NULL,1),(19,'Camarão',18.00,NULL,1),(20,'Calabreza',15.00,NULL,1),(21,'Chocolate',17.50,NULL,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_status_pedido`
--

LOCK TABLES `tb_status_pedido` WRITE;
/*!40000 ALTER TABLE `tb_status_pedido` DISABLE KEYS */;
INSERT INTO `tb_status_pedido` VALUES (1,'Solicitado');
/*!40000 ALTER TABLE `tb_status_pedido` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_tipo_produto`
--

LOCK TABLES `tb_tipo_produto` WRITE;
/*!40000 ALTER TABLE `tb_tipo_produto` DISABLE KEYS */;
INSERT INTO `tb_tipo_produto` VALUES (1,'Escondidinhos'),(2,'Refrigerantes'),(3,'Aguas'),(4,'Cervejas'),(5,'Doces');
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_unidade_venda`
--

LOCK TABLES `tb_unidade_venda` WRITE;
/*!40000 ALTER TABLE `tb_unidade_venda` DISABLE KEYS */;
INSERT INTO `tb_unidade_venda` VALUES (1,'Abatepietro','Rua Carlos Weber');
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_usuario`
--

LOCK TABLES `tb_usuario` WRITE;
/*!40000 ALTER TABLE `tb_usuario` DISABLE KEYS */;
INSERT INTO `tb_usuario` VALUES (1,'Mario','123','marioleite','1');
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

-- Dump completed on 2015-01-20  8:53:04
