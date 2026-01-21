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
-- Table structure for table `entregas_equipos`
--

DROP TABLE IF EXISTS `entregas_equipos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `entregas_equipos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre_equipo` varchar(150) NOT NULL,
  `fecha_entrega` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario` varchar(150) NOT NULL,
  `archivo` varchar(255) DEFAULT NULL,
  `auxiliar_entrega` varchar(150) NOT NULL,
  `auxiliar_recibe` varchar(150) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `aprobado` enum('Pendiente','Aprobado') DEFAULT 'Pendiente',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entregas_equipos`
--

LOCK TABLES `entregas_equipos` WRITE;
/*!40000 ALTER TABLE `entregas_equipos` DISABLE KEYS */;
INSERT INTO `entregas_equipos` VALUES (6,'D009E53-60002','2026-01-06 15:57:50','Vilma Villa Mejia','archivos_entregas/pKnfIhhhlGiG5pj4yDjohJaZjZu6TR5t11DO7fMo.jpg','Doryhan Alejandro Llanten Hernandez','Christian Camilo Guerrero','Libre','Aprobado','2026-01-06 16:14:10','2026-01-06 16:54:11'),(8,'D132E216','2026-01-07 19:13:59','Juan Manuel Gomez Gonzalez','archivos_entregas/ZjXONzZB1fonSCWzvF9hIX58P1iJZg2cqpr87D2y.jpg','Laura Ximena Bermudez Quimbayo','Christian Camilo Guerrero Romero','Remplazo','Aprobado','2026-01-07 19:45:20','2026-01-07 20:11:23'),(9,'D021ES09-61003','2026-01-07 19:56:24','Andres Camilo Romero Ruiz','archivos_entregas/tAZ6xsE1c92NiWHnKYKNF6JolObF5zKSv0eEUdaq.jpg','Doryhan Alejandro Llanten Hernandez','Christian Camilo Guerrero Romero','Remplazo','Aprobado','2026-01-07 19:57:26','2026-01-07 20:10:39'),(10,'D140E11','2026-01-07 19:45:55','Andres Felipe Ceballos','archivos_entregas/E9wssLrpQmKqj22Tq2IwSfjW3Brfv6x2QhsciVac.jpg','Jhon Jairo Castillo','Christian Camilo Guerrero Romero','Remplazo','Aprobado','2026-01-07 19:58:06','2026-01-07 20:21:58'),(11,'D142E10','2026-01-07 20:01:42','Libre',NULL,'Jhon Jairo Castillo Valencia','Christian Camilo Guerrero Romero','Libre','Aprobado','2026-01-07 20:20:10','2026-01-13 12:40:55'),(12,'Semillero-61789','2026-01-07 20:23:15','Semillero - Brayan Ortega',NULL,'Laura Ximena Bermudez Quimbayo','Christian Camilo Guerrero Romero','Remplazo','Aprobado','2026-01-07 20:23:53','2026-01-07 20:24:01'),(13,'D136E01-61919','2026-01-07 20:35:58','Libre',NULL,'Laura Ximena Bermudez Quimbayo','Christian Camilo Guerrero Romero','Libre','Aprobado','2026-01-07 20:36:45','2026-01-07 20:36:51'),(14,'D136E04-39956','2026-01-07 20:50:05','Practicante-Juanita Arango Palau',NULL,'Laura Ximena Bermudez Quimbayo','Christian Camilo Guerrero Romero','Remplazo','Aprobado','2026-01-07 20:56:07','2026-01-16 14:02:36'),(15,'Prueba 5236541 - D030E27','2026-01-16 13:46:29','Prueba Pepito Perez','archivos_entregas/W74o6keKYCdKuvu4ysJes5eQeUj3x3DGOSFWFFVN.png','Christian Camilo Guerrero Romero','Christian Camilo Guerrero Romero','Libre','Aprobado','2026-01-16 14:00:39','2026-01-16 15:25:15');
/*!40000 ALTER TABLE `entregas_equipos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-01-16 11:20:24
