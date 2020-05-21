--
-- Host: localhost    Database: localhost
-- ------------------------------------------------------
-- Server version	10.1.20-MariaDB

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
-- Table structure for table `aditivos`
--

DROP TABLE IF EXISTS `aditivos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aditivos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contrato_id` int(11) NOT NULL,
  `tipo` char(1) NOT NULL DEFAULT 'T',
  `data_aditivo` date DEFAULT NULL,
  `valor_aditivado` decimal(15,3) DEFAULT NULL,
  `prazo_aditivado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`,`contrato_id`,`tipo`,`data_aditivo`),
  KEY `contrato_id` (`contrato_id`),
  CONSTRAINT `aditivos_ibfk_1` FOREIGN KEY (`contrato_id`) REFERENCES `contrato` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aditivos`
--

LOCK TABLES `aditivos` WRITE;
/*!40000 ALTER TABLE `aditivos` DISABLE KEYS */;
/*!40000 ALTER TABLE `aditivos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contrato`
--

DROP TABLE IF EXISTS `contrato`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contrato` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ano` int(11) NOT NULL,
  `nome` varchar(120) NOT NULL,
  `numero` varchar(30) NOT NULL,
  `financiador_id` int(11) NOT NULL,
  `fonterecurso_id` int(11) NOT NULL,
  `vl_inicial` decimal(15,3) NOT NULL,
  `dt_ordemservico` date DEFAULT NULL,
  `periodo_vigencia` int(11) DEFAULT '12',
  `periodo_execucao` int(11) DEFAULT '12',
  `dt_vigencia_ini` date DEFAULT NULL,
  `dt_execucao_ini` date DEFAULT NULL,
  `dt_vigencia` date DEFAULT NULL,
  `dt_execucao` date DEFAULT NULL,
  `vl_contrato` decimal(15,3) DEFAULT NULL,
  `situacao` char(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `numero` (`numero`),
  KEY `financiador_id` (`financiador_id`),
  KEY `fonterecurso_id` (`fonterecurso_id`),
  CONSTRAINT `contrato_ibfk_1` FOREIGN KEY (`financiador_id`) REFERENCES `financiador` (`id`),
  CONSTRAINT `contrato_ibfk_2` FOREIGN KEY (`fonterecurso_id`) REFERENCES `fonterecurso` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contrato`
--

LOCK TABLES `contrato` WRITE;
/*!40000 ALTER TABLE `contrato` DISABLE KEYS */;
INSERT INTO `contrato` VALUES (1,2017,'Contrato 001','12',3,1,10000.000,'2017-04-27',15,12,'2018-07-27','2018-04-27',NULL,NULL,NULL,'0'),(2,2017,'Outro contrato','123321',1,1,100000.000,'2017-01-23',3,2,'2017-04-23','2017-03-23',NULL,NULL,NULL,'0');
/*!40000 ALTER TABLE `contrato` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `financiador`
--

DROP TABLE IF EXISTS `financiador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `financiador` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `cnpj` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cnpj` (`cnpj`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `financiador`
--

LOCK TABLES `financiador` WRITE;
/*!40000 ALTER TABLE `financiador` DISABLE KEYS */;
INSERT INTO `financiador` VALUES (1,'Secretaria de Educação do Estado do Acre','00000000000000'),(2,'Governo do Estado - Gabinete da Casa Civil','11111111111111'),(3,'Conselho Nacional de Desenvolvimento Científico e Tecnológico','22222222222222'),(4,'Coordenação de Aperfeiçoamento de Pessoal de Nível Superior','33333333333333');
/*!40000 ALTER TABLE `financiador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fonterecurso`
--

DROP TABLE IF EXISTS `fonterecurso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fonterecurso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(30) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `codigo` (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fonterecurso`
--

LOCK TABLES `fonterecurso` WRITE;
/*!40000 ALTER TABLE `fonterecurso` DISABLE KEYS */;
INSERT INTO `fonterecurso` VALUES (1,'100','Recurso Próprio'),(2,'300','Recurso BNDS');
/*!40000 ALTER TABLE `fonterecurso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(40) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `nivel` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'admin','a9310913a1551696936fed6c771482af','Administrador','admin@admin.com',9),(2,'simples','471cc54aa12d573c5ad82d575087d45f','Usuario Simples','asdad@auugdua.com',1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-05-20 20:02:13
