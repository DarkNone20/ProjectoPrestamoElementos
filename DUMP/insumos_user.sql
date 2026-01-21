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
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `Cedula` varchar(20) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Alias` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Cargo` varchar(50) DEFAULT NULL,
  `Correo` varchar(100) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`Cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('1000130218','Laura Ximena Bermudez Quimbayo','LQUIMBAYO','$2y$10$nAs96spntsl38ihugGm50O8xCzqjZSNu.ni2P16vIU7U5DDuN5pTe','Auxiliar de Soporte','lxbermudez@icesi.edu.co',NULL,'2026-01-07 19:44:49','2026-01-07 19:44:49'),('1002971304','Doryhan Alejandro Llanten Hernandez','DALLANTEN','$2y$10$AP7.KHyA381WdfskX90vHeejqCDzBHcpgFKAFowFWSGqn59hSZJOu','Auxiliar de Soporte','dallanten@icesi.edu.co',NULL,'2025-12-17 19:15:35','2025-12-17 19:15:35'),('1005786445','Kevin Felipe Sanchez Molano','KSANCHEZ','$2y$10$B2oHKZJBoZQTTetTlID9vu8N8KXyBuuLiMIqSyJsmjNC0RR5B2RRS','Auxiliar de Soporte','kfsanchez@icesi.edu.co',NULL,'2026-01-16 13:44:25','2026-01-16 13:44:25'),('1005874985','ALEJANDRA RAMIREZ BRAVO','ARAMIREZ','$2y$10$prh5GNLZozobnuf1hpBwEu8V4YyfwMr3IvCh.iKHAx2IXLRgbRbj.','Analista gestión de activos tecnológicos','aramirez@icesi.edu.co',NULL,'2026-01-16 13:38:57','2026-01-16 13:38:57'),('1108332956','Jhon Esteban Restrepo Gordillo','JRESTREPO','$2y$10$n/KFmEBJtV7QzK6mDpmHAet4lQS3Pgq2HjWwYgkip0z2a3N2Ml6gy','Auxiliar de Soporte','jerestrepo@icesi.edu.co',NULL,'2026-01-16 13:42:47','2026-01-16 13:42:47'),('1128281027','Benjamin Ballen Montoya','BBALLEN','$2y$10$yFwbFKXC7XV4GnEZ1O1QsujayeIGWf0yQfUsp6sjEOUI.9jS3EoFu','Auxiliar de Soporte','bballen@icesi.edu.co',NULL,'2026-01-16 13:39:39','2026-01-16 13:39:39'),('1128452450','Christian Camilo Guerrero Romero','CCGUERRERO','$2y$10$QjAoJ0ztSfA3JWKhn10Boux5lu12h4MdsVnG2giXrN9ioLcJvV1ji','Auxiliar de Soporte','ccguerrero@icesi.edu.co',NULL,'2026-01-06 17:59:53','2026-01-06 17:59:53'),('1130628344','Carlos Alberto Gomez Mazuera','CGOMEZ','$2y$10$uGhclhL3X25wDul0DDe7cuTdRkqS7OUPF/B/EEAo3E6LSZzQ0oBXC','Administrador de Soporte Técnico Syri Operaciones','camosquera@icesi.edu.co',NULL,'2026-01-16 13:40:52','2026-01-16 13:40:52'),('1144052996','Jhon Jairo Castillo','JJCASTILLO','$2y$10$PN50fzVjgkxL9qVJMgc5OOXneIjaN3f.xTA6C2GMQNLRe1uO14MAK','Auxiliar de Soporte','jjcastillo@icesi.edu.co',NULL,'2025-11-19 17:46:53','2025-11-19 17:46:53'),('1193550122','Jean Carlos Castro Hermann','JCCASTRO','$2y$10$Z6CeUeEyyDg4rzwQH0HtSe926ET6P7KIXk1pA0se/FKKVTins.udy','Auxiliar de Soporte','jccastro@icesi.edu.co',NULL,'2026-01-06 16:28:48','2026-01-06 16:28:48'),('38611980','ADRIANA MARIA LERMA LEON','ALEON','$2y$10$g42XAk2Yn3SnHLJ91xmhB.SwLAOzHvDR7Hoo.m8TLO9uwkjVr5AW.','Auxiliar de Soporte','amlerma@icesi.edu.co',NULL,'2026-01-16 13:37:55','2026-01-16 13:37:55');
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

-- Dump completed on 2026-01-16 11:20:23
