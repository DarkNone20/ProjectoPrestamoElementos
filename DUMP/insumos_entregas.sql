-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: insumos
-- ------------------------------------------------------
-- Server version	8.0.36

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `entregas`
--

DROP TABLE IF EXISTS `entregas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `entregas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `Articulo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Caso` int NOT NULL,
  `Fecha` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entregas`
--

LOCK TABLES `entregas` WRITE;
/*!40000 ALTER TABLE `entregas` DISABLE KEYS */;
INSERT INTO `entregas` VALUES (1,'memoria DDR4 8 GB','Adriana Maria Lerma Leon',655428,'2025-11-12','2025-11-12 18:37:09','2025-11-12 19:40:40'),(2,'Cable de Red','Jhon Jairo Castillo',658962,'2025-11-12','2025-11-13 03:22:27','2025-11-13 03:22:27'),(3,'Mouse','Kevin Sanchez',657756,'2025-11-06','2025-11-14 00:28:13','2025-11-14 00:28:13'),(4,'Cable de red','Doryhan Alejandro Llanten Hernandez',659260,'2025-11-18','2025-11-19 18:14:22','2025-11-19 18:14:22'),(5,'Batería de portátil','Doryhan Alejandro Llanten Hernandez',659260,'2025-11-19','2025-11-19 18:14:57','2025-11-19 18:14:57'),(6,'Memoria RAM DDR4 8GB','Doryhan Alejandro Llanten Hernandez',658572,'2025-11-19','2025-11-20 02:30:40','2025-11-20 02:30:40'),(7,'Memoria RAM DDR4 8GB (2)','Doryhan Alejandro Llanten Hernandez',658572,'2025-11-19','2025-11-20 02:37:34','2025-11-20 02:37:34'),(8,'Memoria RAM DDR4 8GB (2)','Doryhan Alejandro Llanten Hernandez',658572,'2025-11-19','2025-11-20 02:37:38','2025-11-20 02:37:38'),(9,'Cable Ethernet','laura Bermudez',659792,'2025-11-20','2025-11-21 02:31:07','2025-11-21 02:31:07'),(10,'mouse','laura Bermudez',660326,'2025-11-24','2025-11-24 19:34:17','2025-11-24 19:34:17'),(11,'3 Cables HDMI','Alejandra Ramirez',660476,'2025-11-24','2025-11-24 21:37:30','2025-11-24 21:37:30'),(12,'Multipuerto Usb','Angie Yarizath Parra',660673,'2025-11-26','2025-11-26 14:20:53','2025-11-26 14:20:53'),(13,'Cable de Red','Jhon Jairo Castillo',660674,'2025-11-25','2025-11-26 19:07:08','2025-11-26 19:07:08'),(14,'mouse','laura Bermudez',660630,'2025-11-26','2025-11-26 19:35:43','2025-11-26 19:35:43'),(15,'Mouse','Jean Carlos Castro Hermann',660783,'2025-11-27','2025-11-27 13:41:34','2025-11-27 13:41:34'),(16,'Mouse','Edwin Enriquez',660556,'2025-11-27','2025-11-27 14:35:56','2025-11-27 14:35:56'),(17,'Convertidor de HDMI a VGA','Doryhan Alejandro Llanten Hernandez',660269,'2025-12-01','2025-12-01 13:54:57','2025-12-01 13:54:57'),(18,'Guaya de seguridad para portátil','Doryhan Alejandro Llanten Hernandez',660269,'2025-12-01','2025-12-01 13:56:09','2025-12-01 13:56:09'),(19,'Cable de red','Doryhan Alejandro Llanten Hernandez',660269,'2025-12-01','2025-12-01 19:29:38','2025-12-01 19:29:38'),(20,'Teclado','Jhon Jairo Castillo Valencia',660955,'2025-12-01','2025-12-01 21:37:53','2025-12-01 21:37:53'),(21,'0661137','Lina Sofia Valenzuela Dow',661137,'2025-12-03','2025-12-03 17:33:20','2025-12-03 17:33:20'),(22,'Guaya de seguridad','Kevin Felipe Sanchez Molano',661498,'2025-12-04','2025-12-04 22:05:24','2025-12-04 22:05:24'),(23,'Teclado','Jhon Jairo Castillo Valencia',661277,'2025-12-05','2025-12-05 17:57:30','2025-12-05 17:57:30'),(24,'Mouse','Jhon Jairo Castillo Valencia',661277,'2025-12-05','2025-12-05 17:57:49','2025-12-05 17:57:49'),(25,'Bateria Latitude 3470','Jhon Jairo Castillo Valencia',662209,'2025-12-10','2025-12-10 12:34:38','2025-12-10 12:34:38'),(26,'Cables de red','laura Bermudez',662158,'2025-11-12','2025-12-11 20:00:25','2025-12-11 20:00:25'),(27,'Cable HDMI','laura Bermudez',0,'2025-11-12','2025-12-11 20:01:11','2025-12-11 20:01:11'),(28,'Guaya HP','laura Bermudez',0,'2025-11-12','2025-12-11 20:01:46','2025-12-11 20:01:46'),(29,'Guaya de seguridad','Kevin Felipe Sanchez Molano',0,'2025-12-11','2025-12-11 20:24:35','2025-12-11 20:24:35'),(30,'Teclado','Jhon Jairo Castillo Valencia',662493,'2025-12-15','2025-12-15 13:52:28','2025-12-15 13:52:28'),(31,'Teclado','Jhon Jairo Castillo Valencia',662477,'2025-12-15','2025-12-15 21:36:29','2025-12-15 21:36:29'),(32,'Mouse','Jhon Jairo Castillo Valencia',662477,'2025-12-15','2025-12-15 21:36:50','2025-12-15 21:36:50'),(33,'Adaptador tipo c Display Port','Jhon Jairo Castillo Valencia',662477,'2025-12-15','2025-12-15 21:37:32','2025-12-15 21:37:32'),(34,'Cable de Red','Jhon Jairo Castillo Valencia',662477,'2025-12-15','2025-12-15 22:37:30','2025-12-15 22:37:30'),(35,'Cable de Red','Jhon Jairo Castillo Valencia',662674,'2025-12-16','2025-12-16 16:48:39','2025-12-16 16:48:39'),(36,'cable de red','laura Bermudez',0,'2025-11-12','2025-12-19 14:16:52','2025-12-19 14:16:52'),(37,'cable de red','laura Bermudez',662802,'2025-11-12','2025-12-19 14:18:06','2025-12-19 14:18:06'),(38,'teclado','laura Bermudez',661549,'2025-11-19','2025-12-19 14:22:45','2025-12-19 14:22:45'),(39,'Guaya HP','laura Bermudez',653741,'2025-12-19','2025-12-19 15:15:06','2025-12-19 15:15:06'),(40,'Guaya de seguridad para portátil','Doryhan Alejandro Llanten Hernandez',662758,'2026-01-07','2026-01-07 14:04:23','2026-01-07 14:04:23'),(41,'Multipuerto usb','Jhon Jairo Castillo Valencia',663386,'2026-01-07','2026-01-07 20:51:33','2026-01-07 20:51:33'),(42,'Adaptador de Red Tipo USB','Jhon Jairo Castillo Valencia',663385,'2026-01-07','2026-01-07 22:44:50','2026-01-07 22:44:50'),(43,'multipuerto USB','Adriana Maria Lerma Leon',663484,'2026-01-09','2026-01-08 16:53:34','2026-01-08 16:53:34'),(44,'convertidor de display port a tipo C','Adriana Maria Lerma Leon',663513,'2026-01-10','2026-01-09 14:25:35','2026-01-09 14:25:35'),(45,'adaptador display port a tipo c','Adriana Maria  Lerma Leon',63483,'2026-01-10','2026-01-09 14:34:56','2026-01-09 14:34:56'),(46,'adaptador display Port a tipo C','Adriana Maria Lerma Leon',663564,'2026-01-13','2026-01-13 15:01:48','2026-01-13 15:01:48'),(47,'guata paRa HP','Adriana Maria Lerma Leon',663552,'2026-01-13','2026-01-13 15:13:12','2026-01-13 15:13:12'),(48,'adaptador display Port a tipo C','Adriana Maria Lerma Leon',663552,'2026-01-13','2026-01-13 15:58:29','2026-01-13 15:58:29'),(49,'Guaya de seguridad para pantalla','Doryhan Alejandro Llanten Hernandez',662758,'2026-01-13','2026-01-13 16:37:59','2026-01-13 16:37:59'),(50,'Convertidor de HDMI a VGA','Doryhan Alejandro Llanten Hernandez',662757,'2026-01-14','2026-01-14 15:31:17','2026-01-14 15:31:17'),(51,'Convertidor de HDMI a VGA','Doryhan Alejandro Llanten Hernandez',663593,'2026-01-14','2026-01-14 15:32:04','2026-01-14 15:32:04'),(52,'1 Memoria RAM DDR4 de 16 GB y 1 Bateria para Portatil DELL 3490','Edwin Enriquez',663360,'2026-01-14','2026-01-14 21:04:00','2026-01-14 21:04:00'),(53,'1 Bateria para Portatil DELL 3490','Edwin Enriquez',663423,'2026-01-14','2026-01-14 21:04:56','2026-01-14 21:04:56'),(54,'Cable de Red','Jhon Jairo Castillo Valencia',663747,'2026-01-14','2026-01-14 21:45:01','2026-01-14 21:45:01'),(55,'Multipuerto usb','Jhon Jairo Castillo Valencia',663562,'2026-01-14','2026-01-14 21:47:39','2026-01-14 21:47:39'),(56,'Teclado','Jhon Jairo Castillo Valencia',662493,'2026-01-14','2026-01-14 22:18:47','2026-01-14 22:18:47'),(57,'Memoria RAM DDR4 16GB','Doryhan Alejandro Llanten Hernandez',663830,'2026-01-15','2026-01-15 13:53:13','2026-01-15 13:53:13'),(58,'Convertidor de HDMI a VGA','Doryhan Alejandro Llanten Hernandez',663333,'2026-01-15','2026-01-15 19:16:27','2026-01-15 19:16:27'),(59,'convertidor HDMI a VGA','Benjamin Ballen',663942,'2026-01-15','2026-01-15 20:27:19','2026-01-15 20:27:19'),(60,'Teclado','Kevin Felipe Sanchez Molano',664052,'2026-01-16','2026-01-16 13:42:02','2026-01-16 13:42:02');
/*!40000 ALTER TABLE `entregas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-01-16 11:20:23
