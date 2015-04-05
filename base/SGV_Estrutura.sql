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
) ENGINE=InnoDB AUTO_INCREMENT=219 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB AUTO_INCREMENT=134 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

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
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-04-05  1:43:43
