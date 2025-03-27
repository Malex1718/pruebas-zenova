-- MySQL dump 10.13  Distrib 9.2.0, for Linux (x86_64)
--
-- Host: localhost    Database: catalogo-productos
-- ------------------------------------------------------
-- Server version	9.2.0

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id_category` tinyint NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT 'Nombre de la categoría',
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Ocasiones Especiales'),(2,'Decoración Hogar'),(3,'Regalos Express'),(4,'Flores para Oficina'),(5,'Temporada: Primavera'),(6,'Premium/Lujo');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_image`
--

DROP TABLE IF EXISTS `product_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_image` (
  `id_image` tinyint NOT NULL AUTO_INCREMENT,
  `id_product` tinyint NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'Link',
  PRIMARY KEY (`id_image`),
  KEY `product_image_products_FK` (`id_product`),
  CONSTRAINT `product_image_products_FK` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_image`
--

LOCK TABLES `product_image` WRITE;
/*!40000 ALTER TABLE `product_image` DISABLE KEYS */;
INSERT INTO `product_image` VALUES (1,1,'https://i.ibb.co/RTMDmYsR/Lilac-Tulips-on-Grey-Fabric.jpg'),(2,1,'https://i.ibb.co/BVR8YSCm/White-Tulips-in-Glass-Vase.jpg'),(3,1,'https://i.ibb.co/rKkqHtYC/Vibrant-Floral-Arrangement.jpg'),(4,2,'https://i.ibb.co/NdZYxRzL/Vibrant-Celebration-Bouquet.jpg'),(5,2,'https://i.ibb.co/JRkD1LNX/Vibrant-Flower-Bouquet-in-Glass-Vase.jpg'),(6,2,'https://i.ibb.co/DnqXjm4/Elegant-Flower-Bouquet.jpg'),(7,3,'https://i.ibb.co/gLL53n5v/Vibrant-Flower-Bouquet.jpg'),(8,3,'https://i.ibb.co/tPHsXM69/Elegant-Pink-Roses-in-Classic-White-Vase.jpg'),(9,3,'https://i.ibb.co/Z63WYhzz/Elegance-in-Bloom-Dahlia-Medley-with-Rustic-Charm.jpg'),(10,4,'https://i.ibb.co/mCcDddLR/Elegant-Floral-Arrangement.jpg'),(11,4,'https://i.ibb.co/gL6TtwfT/Romantic-Opulence-A-Bouquet-of-Red-and-Pink-Roses.jpg'),(12,4,'https://i.ibb.co/yFvR3ds6/Serene-Floral-Display.jpg'),(13,5,'https://i.ibb.co/RTMDmYsR/Lilac-Tulips-on-Grey-Fabric.jpg'),(14,5,'https://i.ibb.co/BVR8YSCm/White-Tulips-in-Glass-Vase.jpg'),(15,5,'https://i.ibb.co/rKkqHtYC/Vibrant-Floral-Arrangement.jpg'),(16,6,'https://i.ibb.co/NdZYxRzL/Vibrant-Celebration-Bouquet.jpg'),(17,6,'https://i.ibb.co/JRkD1LNX/Vibrant-Flower-Bouquet-in-Glass-Vase.jpg'),(18,6,'https://i.ibb.co/DnqXjm4/Elegant-Flower-Bouquet.jpg'),(19,7,'https://i.ibb.co/gLL53n5v/Vibrant-Flower-Bouquet.jpg'),(20,7,'https://i.ibb.co/tPHsXM69/Elegant-Pink-Roses-in-Classic-White-Vase.jpg'),(21,7,'https://i.ibb.co/Z63WYhzz/Elegance-in-Bloom-Dahlia-Medley-with-Rustic-Charm.jpg'),(22,8,'https://i.ibb.co/mCcDddLR/Elegant-Floral-Arrangement.jpg'),(23,8,'https://i.ibb.co/gL6TtwfT/Romantic-Opulence-A-Bouquet-of-Red-and-Pink-Roses.jpg'),(24,8,'https://i.ibb.co/yFvR3ds6/Serene-Floral-Display.jpg'),(25,9,'https://i.ibb.co/NdZYxRzL/Vibrant-Celebration-Bouquet.jpg'),(26,9,'https://i.ibb.co/JRkD1LNX/Vibrant-Flower-Bouquet-in-Glass-Vase.jpg'),(27,9,'https://i.ibb.co/DnqXjm4/Elegant-Flower-Bouquet.jpg'),(28,10,'https://i.ibb.co/RTMDmYsR/Lilac-Tulips-on-Grey-Fabric.jpg'),(29,10,'https://i.ibb.co/BVR8YSCm/White-Tulips-in-Glass-Vase.jpg'),(30,10,'https://i.ibb.co/rKkqHtYC/Vibrant-Floral-Arrangement.jpg'),(31,11,'https://i.ibb.co/NdZYxRzL/Vibrant-Celebration-Bouquet.jpg'),(32,11,'https://i.ibb.co/JRkD1LNX/Vibrant-Flower-Bouquet-in-Glass-Vase.jpg'),(33,11,'https://i.ibb.co/DnqXjm4/Elegant-Flower-Bouquet.jpg'),(34,12,'https://i.ibb.co/gLL53n5v/Vibrant-Flower-Bouquet.jpg'),(35,12,'https://i.ibb.co/tPHsXM69/Elegant-Pink-Roses-in-Classic-White-Vase.jpg'),(36,12,'https://i.ibb.co/Z63WYhzz/Elegance-in-Bloom-Dahlia-Medley-with-Rustic-Charm.jpg'),(37,13,'https://i.ibb.co/mCcDddLR/Elegant-Floral-Arrangement.jpg'),(38,13,'https://i.ibb.co/gL6TtwfT/Romantic-Opulence-A-Bouquet-of-Red-and-Pink-Roses.jpg'),(39,13,'https://i.ibb.co/yFvR3ds6/Serene-Floral-Display.jpg'),(40,14,'https://i.ibb.co/NdZYxRzL/Vibrant-Celebration-Bouquet.jpg'),(41,14,'https://i.ibb.co/JRkD1LNX/Vibrant-Flower-Bouquet-in-Glass-Vase.jpg'),(42,14,'https://i.ibb.co/DnqXjm4/Elegant-Flower-Bouquet.jpg'),(43,15,'https://i.ibb.co/RTMDmYsR/Lilac-Tulips-on-Grey-Fabric.jpg'),(44,15,'https://i.ibb.co/BVR8YSCm/White-Tulips-in-Glass-Vase.jpg'),(45,15,'https://i.ibb.co/rKkqHtYC/Vibrant-Floral-Arrangement.jpg');
/*!40000 ALTER TABLE `product_image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id_product` tinyint NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT 'Nombre del producto',
  `price` decimal(10,2) DEFAULT '1.00',
  `category` tinyint NOT NULL,
  `score` tinyint NOT NULL,
  `on_sale` tinyint NOT NULL DEFAULT '0',
  `discount` int DEFAULT '0',
  `stock` int NOT NULL DEFAULT '1',
  `description` varchar(255) NOT NULL DEFAULT 'Descripción',
  `main_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'Link',
  `mini_description` varchar(100) NOT NULL DEFAULT 'Descripción corta',
  PRIMARY KEY (`id_product`),
  KEY `products_categories_FK` (`category`),
  KEY `products_scores_FK` (`score`),
  CONSTRAINT `products_categories_FK` FOREIGN KEY (`category`) REFERENCES `categories` (`id_category`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Elegancia Clásica',1499.00,1,5,1,20,28,'12 rosas rojas Freedom (60 cm tallo) con follaje de ruscus y gypsophila. Papel seda italiano + cinta satinada. Duración: 7-10 días.','https://i.ibb.co/cXcP3PnH/12-red-Freedom-roses-with-60-cm-stems-ruscus-and-gypsophila-foliage-Italian-silk-paper-satin-ribbon.jpg','Ramo de 12 rosas rojas premium'),(2,'Boda Minimalista',2299.00,1,4,0,0,12,'5 peonías blancas, eucalipto cinerea y astilbe rosa. Base de vidrio (35 cm diámetro). Ideal para bodas.','https://i.ibb.co/0j9JmZkt/5-peoni-as-blancas-eucalipto-cinerea-y-astilbe-rosa-Base-de-vidrio-35-cm-dia-metro.jpg','Centro de mesa con peonías'),(3,'Happy Birthday',1100.00,1,4,1,18,35,'5 girasoles + 3 rosas amarillas en caja de madera. Incluye tarjeta personalizada.','https://i.ibb.co/7d2qQ7yW/5-girasoles-3-rosas-amarillas-en-caja-de-madera-sin-ilustraciones.jpg','Girasoles y rosas amarillas'),(4,'Fresh Day',1300.00,2,5,1,19,18,'3 lirios orientales + 5 claveles en jarrón de cerámica. Altura: 45 cm.','https://i.ibb.co/3mDmt0yD/3-lirios-orientales-5-claveles-en-jarro-n-de-cera-mica.jpg','Jarrón con lirios y claveles'),(5,'Zen Style',650.00,2,3,0,0,42,'3 suculentas (Echeveria, Haworthia) en maceta de cemento. Bajo mantenimiento.','https://i.ibb.co/fYBzNCHM/3-suculentas-Echeveria-Haworthia.jpg','Suculentas en maceta'),(6,'Mini Jardín',750.00,2,3,0,0,9,'Musgo preservado, cristales y pequeñas flores en terrario de vidrio (15 cm alto).','https://i.ibb.co/r2HtYfP6/Musgo-preservado-cristales-y-pequen-as-flores-en-terrario-de-vidrio-15-cm-alto.jpg','Terrario con musgo'),(7,'Sweet Surprise',1250.00,3,5,1,16,25,'5 rosas spray + 2 barras de chocolate 70% cacao. Entrega en 2 horas.','https://i.ibb.co/Z6kYMn7f/5-rosas-spray-2-barras-de-chocolate-70-cacao.jpg','Mini ramo + chocolate'),(8,'Delicate',1299.00,3,4,0,0,15,'Orquídea blanca en recipiente de vidrio con base de madera. Dura 3 semanas.','https://i.ibb.co/LX6gffWB/Orqui-dea-blanca-en-recipiente-de-vidrio-con-base-de-madera.jpg','Orquídea en vidrio'),(9,'Desk Bliss',799.00,4,4,0,0,30,'Rosas spray + eucalipto en base de cemento. Perfecto para escritorios.','https://i.ibb.co/RpZwfkVp/Rosas-spray-eucalipto-en-base-de-cemento.jpg','Mini arreglo geométrico'),(10,'Air Purifier',599.00,4,3,0,0,50,'Mezcla de lavanda y romero en maceta de terracota. Purifica el aire.','https://i.ibb.co/0jh2v5C2/Mezcla-de-lavanda-y-romero-en-maceta-de-terracota.jpg','Lavanda y romero'),(11,'Spring Joy',1800.00,5,5,1,17,22,'10 tulipanes holandeses + 5 narcisos en canasta de mimbre. Fragancia fresca.','https://i.ibb.co/VYgLLpwK/10-tulipanes-holandeses-5-narcisos-en-canasta-de-mimbre.jpg','Tulipanes y narcisos'),(12,'Campo Fresco',1099.00,5,4,0,0,14,'Ramo campestre con 5 girasoles y ramitas de lavanda. Ideal para cocinas.','https://i.ibb.co/rf47hGhX/Ramo-campestre-con-5-girasoles-y-ramitas-de-lavanda-Realista.jpg','Girasoles y lavanda'),(13,'Golden Roses',4999.00,6,5,0,0,6,'24 rosas preservadas con oro 24k. Caja de lino con luz LED.','https://i.ibb.co/21ZJQWTX/24-preserved-roses-with-24k-gold-Linen-box-with-LED-light.jpg','Rosas bañadas en oro'),(14,'Mystery',3299.00,6,4,0,0,3,'Orquídea rara en maceta de cerámica negra. Edición limitada.','https://i.ibb.co/LX6gffWB/Orqui-dea-blanca-en-recipiente-de-vidrio-con-base-de-madera.jpg','Orquídea negra'),(15,'Tropical Vibes',3200.00,6,5,1,13,8,'Ave del paraíso, heliconias y proteas en jarrón alto. Impacto visual.','https://i.ibb.co/sdTkFBFX/Ave-del-parai-so-heliconias-y-proteas-en-jarro-n-alto.jpg','Flores exóticas');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-03-27 17:13:11
