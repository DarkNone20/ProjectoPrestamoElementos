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
-- Table structure for table `entregas_discos`
--

DROP TABLE IF EXISTS `entregas_discos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `entregas_discos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre_disco` varchar(150) NOT NULL,
  `fecha_entrega` date NOT NULL,
  `usuario` varchar(150) NOT NULL,
  `archivo` varchar(255) DEFAULT NULL,
  `auxiliar_entrega` varchar(150) NOT NULL,
  `auxiliar_recibe` varchar(150) NOT NULL,
  `estado` enum('Remplazo','Libre') NOT NULL,
  `aprobado` enum('Pendiente','Aprobado') NOT NULL DEFAULT 'Pendiente',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entregas_discos`
--

LOCK TABLES `entregas_discos` WRITE;
/*!40000 ALTER TABLE `entregas_discos` DISABLE KEYS */;
INSERT INTO `entregas_discos` VALUES (1,'D009E53','2026-01-06','Vilma Villa Mejia','archivos_entregas_discos/aA7IGCWQR21IzJ0WfxRz0LsC3Zp1vG7Kctk00LVu.png','Doryhan Alejandro Llanten Hernandez','Jhon Jairo Castillo','Remplazo','Aprobado','2026-01-06 21:41:59','2026-01-06 22:28:02'),(2,'D142E168','2026-01-06','Estefanía Giraldo Gomez','archivos_entregas_discos/isRAlunt8Fia3ZPVQFxY1uT38HTilrQHdYRnkyhc.png','Doryhan Alejandro Llanten Hernandez','Jhon Jairo Castillo','Libre','Aprobado','2026-01-06 22:05:51','2026-01-06 22:27:54'),(3,'D006E04','2026-01-06','John Forero Pinzon','archivos_entregas_discos/cQB2EzZOqRplugSvhhoScVC2zCsGfRPRSg68Vy4B.png','Doryhan Alejandro Llanten Hernandez','Jhon Jairo Castillo','Libre','Aprobado','2026-01-06 22:11:51','2026-01-06 22:27:37'),(4,'D142E109','2026-01-06','Paula Daniela Saenz','archivos_entregas_discos/df9DG7CUyWfACsRZVCSPkQsYLrl8Wgkx8IBAYDvx.png','Doryhan Alejandro Llanten Hernandez','Jhon Jairo Castillo','Libre','Aprobado','2026-01-06 22:14:12','2026-01-06 22:27:28'),(5,'D136E51','2026-01-06','Sofia Carvajal Rios','archivos_entregas_discos/7eRw1oUJ2UKd5FWuEwyf2ID6mpxnXj6utgr3KMJ4.png','Doryhan Alejandro Llanten Hernandez','Jhon Jairo Castillo','Libre','Aprobado','2026-01-06 22:16:40','2026-01-06 22:27:19'),(6,'D129E12','2026-01-06','Maria Elena Velásquez','archivos_entregas_discos/DONJ6QUcNKILvxhLNtz39NUPrOPZQLkrBmPS8xi0.png','Doryhan Alejandro Llanten Hernandez','Jhon Jairo Castillo','Libre','Aprobado','2026-01-06 22:24:03','2026-01-06 22:27:10');
/*!40000 ALTER TABLE `entregas_discos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-01-16 11:20:25
