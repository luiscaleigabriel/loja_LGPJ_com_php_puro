CREATE DATABASE  IF NOT EXISTS `lojaljpg` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `lojaljpg`;
-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: localhost    Database: lojaljpg
-- ------------------------------------------------------
-- Server version	5.7.40

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
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'InformÃ¡tica','informÃ¡tica','2024-05-20 11:34:54','2024-05-20 11:34:54',1),(2,'Impressoras e Scanners','impressoras-e-scanners','2024-05-20 11:43:34','2024-05-20 11:43:34',1),(3,'Energia','energia','2024-05-20 11:43:56','2024-05-20 11:43:56',1),(4,'ConsumÃ­veis e papel','consumÃ­veis-e-papel','2024-05-20 11:44:31','2024-05-20 11:44:31',1),(5,'Imagem e Som','imagem-e-som','2024-05-20 11:44:52','2024-05-20 11:44:52',1),(6,'Smartphones e tablets','smartphones-e-tablets','2024-05-20 11:45:17','2024-05-20 11:45:17',1),(7,'Jogos Consola e Desporto','jogos-consola-e-desporto','2024-05-20 11:45:45','2024-05-20 11:45:45',1),(8,'ElectodomÃ©sticos','electodomÃ©sticos','2024-05-20 11:46:10','2024-05-20 11:46:10',1);
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `total` decimal(10,2) NOT NULL,
  `orderdate` date NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order`
--

LOCK TABLES `order` WRITE;
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
/*!40000 ALTER TABLE `order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `idcategory` int(11) NOT NULL,
  `idsubcategory` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idcategory` (`idcategory`),
  KEY `idsubcategory` (`idsubcategory`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,'SANSUNG','sansung','SMARTPHONE GALAXY A05S 4GB/128GB PRETO',183361.00,20,'./assets/images/product/664b6959289c9.jpg',1,6,1,'2024-05-20 16:16:41','2024-05-20 16:16:41'),(2,'HP','hp','COMPUTADOR PORTÃTIL 15.6\" N4020 4GB/500GB DVD W11 PRETO+',474404.00,10,'./assets/images/product/664b6c13a7069.jpg',1,1,1,'2024-05-20 16:28:19','2024-05-20 16:28:19'),(3,'NGS','ngs','COLUNA DE SOM BLUETOOTH 10W RESISTENTE A ÃGUA ROLLER NITRO1',36354.00,50,'./assets/images/product/66536d2a11eba.jpg',1,5,8,'2024-05-26 18:11:06','2024-05-26 18:11:06'),(4,'MANHATTAN','manhattan','RATO GAMER COM FIO 2400 DPI USB PRETO',14648.00,30,'./assets/images/product/66536dfc71f79.jpg',1,7,9,'2024-05-26 18:14:36','2024-05-26 18:14:36'),(5,'WINTECH','wintech','TV\" LED 4K ULTRA HD + OFERTA TV SIC XIAOMI FHD 1GB 8GB ANDROID ',529964.68,40,'./assets/images/product/66536ed5ae3f5.jpg',1,1,1,'2024-05-26 18:18:13','2024-05-26 18:18:13'),(6,'HP','hp','IMPRESSORA OFFICEJET E-AIO PRO 9013  ',288209.00,50,'./assets/images/product/6653835d41b30.jpg',1,2,4,'2024-05-26 19:45:49','2024-05-26 19:45:49'),(7,'XIAOMI','xiaomi','SMARTPHONE REDMI NOTE 9T 4GB +128GB DS PRETO',400170.00,70,'./assets/images/product/66538459bb1e0.jpg',1,6,1,'2024-05-26 19:50:01','2024-05-26 19:50:01'),(8,'HP','hp','IMPRESSORA MULTIFUNÃ‡Ã•ES DESKJET E-AIO PLUS 4120 (8.5) CEMENT 3EM1',101777.00,40,'./assets/images/product/6653855534802.jpg',1,2,4,'2024-05-26 19:54:13','2024-05-26 19:54:13'),(9,'ACER','acer','COMPUTADOR PORTÃTIL TRAVELMATE N4020 11.6\" 4G/64GB WINDOWS 10',216392.00,15,'./assets/images/product/666044faa946c.jpg',1,1,1,'2024-06-05 11:59:25','2024-06-05 11:59:25'),(10,'SONY','sony','PLAYSTATION 5 - PS5 4K 825GB BLUU-RAY COM COMANDO ',821278.00,30,'./assets/images/product/66684a2991f44.jpg',1,7,9,'2024-06-11 13:59:21','2024-06-11 13:59:21'),(11,'CANDY','candy','MÃQUINA DE LAVAR ROUPA CS1072DE/1-S 7KG 1000RPM BRANCO',347177.00,20,'./assets/images/product/66684ad04c753.jpg',1,8,11,'2024-06-11 14:02:08','2024-06-11 14:02:08');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subcategory`
--

DROP TABLE IF EXISTS `subcategory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `idcategory` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `idcategory` (`idcategory`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subcategory`
--

LOCK TABLES `subcategory` WRITE;
/*!40000 ALTER TABLE `subcategory` DISABLE KEYS */;
INSERT INTO `subcategory` VALUES (1,'Computadores portÃ¡teis','computadores-portÃ¡teis',1,'2024-05-20 12:00:01','2024-05-20 12:00:01',1),(2,'Servidores','servidores',1,'2024-05-20 12:25:22','2024-05-20 12:25:22',1),(3,'Redes e Internet','redes-e-internet',1,'2024-05-20 12:25:39','2024-05-20 12:25:39',1),(4,'Impressoras','impressoras',1,'2024-05-20 12:25:55','2024-05-20 12:25:55',1),(5,'Baterias','baterias',3,'2024-05-20 12:26:31','2024-05-20 12:26:31',1),(6,'Tinteiros','tinteiros',4,'2024-05-20 12:26:52','2024-05-20 12:26:52',1),(7,'TelevisÃµes','televisÃµes',5,'2024-05-20 12:27:12','2024-05-20 12:27:12',1),(8,'Colunas','colunas',5,'2024-05-26 18:09:42','2024-05-26 18:09:42',1),(9,'Gamer','gamer',7,'2024-05-26 18:12:49','2024-05-26 18:12:49',1),(10,'Smartphones','smartphones',6,'2024-05-26 19:50:26','2024-05-26 19:50:26',1),(11,'MobiliÃ¡rio','mobiliÃ¡rio',9,'2024-06-05 12:01:55','2024-06-05 12:01:55',1);
/*!40000 ALTER TABLE `subcategory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `gender` set('M','F') NOT NULL,
  `address` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Luis Gabriel','luisgabriel@gmail.com','929379920','M','Benfica/Mundial                        ','$2y$10$uCigVcGiLYG3kd2WcyuI9.f1JUKX7rdTd.VfCS23gi1VDwkBdoARu',NULL,1,'2024-05-12 20:59:26','2024-05-12 20:14:59',1),(2,'Manuela Silva','manuela@gmail.com','922345678','F','Mundial                                                                                                                        ','$2y$10$uCigVcGiLYG3kd2WcyuI9.f1JUKX7rdTd.VfCS23gi1VDwkBdoARu',NULL,0,'2024-05-12 20:59:26','2024-06-05 11:14:43',1),(3,'Fulano de tal','fulano@gmail.com','929379920','M','Bendica/Mundial','$2y$10$52lqlKy7faAmwpHleNiyfO0KdMoUa3aDnapaOlz5GMy81an893UK2',NULL,0,'2024-05-20 09:42:55','2024-05-20 09:42:55',1),(4,'Manuel Fonseca','manuelfonseca@gmail.com','999999999','M','Bendica/Mundial','$2y$10$7LgRpaUBAnS9Q.ieYOEjQuoNmynKrQEC.u8qftcINZRPkpaJDQJgW',NULL,0,'2024-06-08 10:30:19','2024-06-08 10:30:19',1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-06-19 10:08:43
