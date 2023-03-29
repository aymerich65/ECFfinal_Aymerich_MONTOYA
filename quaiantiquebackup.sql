-- MariaDB dump 10.19  Distrib 10.4.25-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: quaiantique
-- ------------------------------------------------------
-- Server version	10.4.25-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `administrateurs`
--

DROP TABLE IF EXISTS `administrateurs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `administrateurs` (
  `email` varchar(254) NOT NULL,
  `poste` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrateurs`
--

LOCK TABLES `administrateurs` WRITE;
/*!40000 ALTER TABLE `administrateurs` DISABLE KEYS */;
INSERT INTO `administrateurs` VALUES ('marcusd@fictif.fr','hôte d\'accueil','$2y$10$dGqYDz5A.r88iXN9OylpZOjfMDnBUeSjvtQxVKlA1QN5oOyherYMq');
/*!40000 ALTER TABLE `administrateurs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `capacite_d_accueil`
--

DROP TABLE IF EXISTS `capacite_d_accueil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `capacite_d_accueil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `capacite_totale` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `capacite_d_accueil`
--

LOCK TABLES `capacite_d_accueil` WRITE;
/*!40000 ALTER TABLE `capacite_d_accueil` DISABLE KEYS */;
INSERT INTO `capacite_d_accueil` VALUES (1,40);
/*!40000 ALTER TABLE `capacite_d_accueil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clients` (
  `convives` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(60) NOT NULL,
  `allergies` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES (4,'ChomonDorian@fictif.fr','$2y$10$44ORpSweoGuihA..1tCjK.1l9.AprQzZqN2/X0bF.66ocwfL/XPEK','arachides'),(2,'Edouardmorin@fictif.fr','$2y$10$NcuCxPVUSalCmsZ.hQGzAuGq6E9hACXOLPX/Yl91/kmsAHdVWkiw6','arachides'),(2,'jDoe@fictif.fr','$2y$10$8DtUa5h08WtZtSQP/HuNSeu/eG5rcHGUUCZKZxba4Z0gmPMRUsM9e','noix');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `desserts`
--

DROP TABLE IF EXISTS `desserts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `desserts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `prix` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `desserts`
--

LOCK TABLES `desserts` WRITE;
/*!40000 ALTER TABLE `desserts` DISABLE KEYS */;
INSERT INTO `desserts` VALUES (1,'glace','glace au choix :  fraise citron vanille pistache cassis',4.00),(2,'Tiramisu','Le Tiramisu est un dessert italien classique et incontournable, composé de savoureux biscuits cuillère trempés dans du café noir, alternés avec de délicieuses couches de mascarpone crémeux et de la poudre de cacao. Ce dessert fondant et léger est une véritable explosion de saveurs en bouche. Venez le déguster chez nous pour une expérience culinaire inoubliable !',6.00),(5,'Tarte aux myrtilles','Venez découvrir notre délicieux dessert savoyard : un mélange subtil de fruits rouges, de meringue fondante et de crème fraîche épaisse. Une explosion de saveurs à chaque bouchée !',7.00);
/*!40000 ALTER TABLE `desserts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entrees`
--

DROP TABLE IF EXISTS `entrees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entrees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `prix` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entrees`
--

LOCK TABLES `entrees` WRITE;
/*!40000 ALTER TABLE `entrees` DISABLE KEYS */;
INSERT INTO `entrees` VALUES (1,'Carpaccio et tartare','Carpaccio : Découvrez notre interprétation moderne de ce classique italien. Avec une variété d\'ingrédients allant de la viande de boeuf jusqu\'aux légumes, chaque bouchée dévoile une explosion de saveurs et d\'élégance. Essayez notre carpaccio dès aujourd\'hui et laissez-vous emporter par cette expérience culinaire inoubliable.',6.00),(2,'Crozets gratinés aux champignon','Crozets savoyards gratinés avec des champignons de saison et du fromage fondu, une entrée réconfortante pour les soirées d\'hiver en Savoie.',9.00),(3,'La salade savoyarde','Dégustez notre délicieuse salade savoyarde composée de jambon cru, de tomme de Savoie et de croûtons croustillants, le tout accompagné d\'une vinaigrette maison. ',10.00),(4,'Assiette de charcuterie savoyarde','Une généreuse assiette de charcuterie typiquement savoyarde, comprenant du saucisson, du jambon cru, du lard, du fromage de chèvre et de la tomme de Savoie, accompagnée de cornichons et de beurre.',12.00);
/*!40000 ALTER TABLE `entrees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `horaires`
--

DROP TABLE IF EXISTS `horaires`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `horaires` (
  `jour` varchar(10) NOT NULL,
  `statut` varchar(10) DEFAULT NULL,
  `ouverture_midi` time DEFAULT '00:00:00',
  `fermeture_midi` time DEFAULT '00:00:00',
  `ouverture_soir` time DEFAULT '00:00:00',
  `fermeture_soir` time DEFAULT '00:00:00',
  PRIMARY KEY (`jour`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `horaires`
--

LOCK TABLES `horaires` WRITE;
/*!40000 ALTER TABLE `horaires` DISABLE KEYS */;
INSERT INTO `horaires` VALUES ('Dimanche','OUVERT','12:00:00','15:00:00','19:00:00','23:00:00'),('Jeudi','OUVERT','12:00:00','15:00:00','19:00:00','23:00:00'),('Lundi','OUVERT','12:00:00','15:00:00','19:00:00','23:00:00'),('Mardi','OUVERT','12:00:00','15:00:00','19:00:00','23:00:00'),('Mercredi','OUVERT','12:00:00','14:00:00','00:00:00','00:00:00'),('Samedi','OUVERT','12:00:00','15:00:00','19:00:00','23:00:00'),('Vendredi','OUVERT','12:00:00','15:00:00','19:00:00','23:00:00');
/*!40000 ALTER TABLE `horaires` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(60) DEFAULT NULL,
  `nom_fichier` varchar(60) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `numero_image` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` VALUES (2,'Frites_maison','Frites_maison.png','Délicieuse frite faites maison',1),(3,'Steak_saignant','Steak_saignant.jpg','Viande de boeuf à la cuison saignante',2),(4,'Soupe_brocolis','Soupe_brocolis.png','Velouté de brocolis',3),(6,'Raclette_du_chef','Raclette_du_chef.jpg','La raclette du chef, un délicieux mélange de fromages fondus, accompagné de charcuterie et de pommes de terre, pour un repas savoureux et réconfortant.',5),(7,'Potée_savoyarde','Potée_savoyarde.jpg','La potée savoyarde est un plat mijoté réconfortant à base de viande de porc, de lard, de choux et de légumes d\'hiver, qui réchauffe le cœur et l\'estomac lors des soirées d\'hiver en Savoie.',6),(30,'imagetest','imagetest.jpg','cest un tets',7);
/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `images_accueil`
--

DROP TABLE IF EXISTS `images_accueil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `images_accueil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(60) DEFAULT NULL,
  `nom_fichier` varchar(60) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `numero_image` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images_accueil`
--

LOCK TABLES `images_accueil` WRITE;
/*!40000 ALTER TABLE `images_accueil` DISABLE KEYS */;
INSERT INTO `images_accueil` VALUES (13,'Steak_saignant','Steak_saignant.jpg','Viande de boeuf à la cuison saignante',2),(14,'Raclette_du_chef','Raclette_du_chef.jpg','La raclette du chef, un délicieux mélange de fromages fondus, accompagné de charcuterie et de pommes de terre, pour un repas savoureux et réconfortant.',5),(15,'Potée_savoyarde','Potée_savoyarde.jpg','La potée savoyarde est un plat mijoté réconfortant à base de viande de porc, de lard, de choux et de légumes d&#039;hiver, qui réchauffe le cœur et l&#039;estomac lors des soirées d&#039;hiver en Savoie.',6);
/*!40000 ALTER TABLE `images_accueil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) NOT NULL,
  `formule` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `prix` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus`
--

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` VALUES (3,'Menu Valentine','Tout compris','En entrée, vous pourrez déguster une délicieuse terrine de foie gras maison, accompagnée d\'une confiture d\'oignons et d\'un pain de campagne grillé. En plat, nous vous proposons un filet de boeuf Rossini, garni d\'une sauce au vin rouge et accompagné d\'une purée de pommes de terre truffée. Et pour terminer en beauté, vous pourrez savourer un soufflé au Grand Marnier, servi avec une boule de glace vanille et un coulis de fruits rouges.',29.00),(4,'Festin alpin','Tout compris','Notre menu savoyard est un voyage gustatif au cœur des Alpes. Savourez nos Crozets gratinés, ces petites pâtes carrées typiques de la région, accompagnées d\'un mélange de fromages fondus. Dégustez notre Tartiflette, un plat réconfortant et nourrissant composé de pommes de terre, de lardons et d\'oignons, le tout gratiné au reblochon. Et pour finir en beauté, goûtez à notre Tiramisu revisité à la façon savoyarde, avec une touche de Génépi pour un dessert original et délicieux. Le tout servi dans un cadre chaleureux et convivial pour une expérience culinaire authentique et mémorable.',25.00),(6,'Menu Rochelle','Plat et dessert','Dégustez notre menu raclette et plongez dans l\'ambiance chaleureuse des soirées d\'hiver ! Fondue de fromage, pommes de terre et charcuterie vous feront saliver, tandis que notre café gourmand vous transportera au paradis des desserts',25.00),(8,'Menu Rochelle','Entrée et plat','Dégustez notre menu raclette avec chips, cacahuètes grillées et boisson au choix pour une soirée conviviale réussie ! Fromage fondu, pommes de terre et charcuterie variée vous feront saliver, le tout accompagné de cornichons et d\'oignons marinés. ',25.00),(9,'Menu Valentine','Plat et dessert','Dégustez notre filet de boeuf Rossini avec sa sauce au vin rouge et sa purée de pommes de terre truffée, suivi d\'un soufflé au Grand Marnier et sa boule de glace vanille, le tout accompagné d\'un coulis de fruits rouges pour une expérience culinaire inoubliable ! ',25.00);
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plats`
--

DROP TABLE IF EXISTS `plats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `plats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `prix` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plats`
--

LOCK TABLES `plats` WRITE;
/*!40000 ALTER TABLE `plats` DISABLE KEYS */;
INSERT INTO `plats` VALUES (2,'Raclette Maison','Notre raclette maison est préparée avec du fromage fondant et gratiné, servi sur un lit de pommes de terre chaudes et accompagnée d\'une sélection de charcuteries fines et de cornichons croquants. Le tout est présenté sur une plaque de pierre chaude, pour une expérience de dégustation chaleureuse et conviviale.',18.00),(3,'Tartiflette traditionnelle','Laissez-vous envoûter par notre plat phare, une délicieuse fondue savoyarde à partager en famille ou entre amis. Notre fromage local, fondu à la perfection, n\'attend plus que vos papilles pour une expérience gustative inoubliable.',15.00),(5,'Potée savoyarde','La Potée Savoyarde est un plat typique de la région montagnarde de la Savoie. Il s\'agit d\'un délicieux mélange de pommes de terre, de choux, de lardons et de saucisses de montagne, le tout cuit ensemble pour un résultat chaud et réconfortant. Parfait pour se réchauffer après une journée sur les pistes de ski ou pour une soirée conviviale entre amis.',20.00),(6,'Steak saignant maison','Le steak saignant est un plat à base de viande rouge grillée à haute température pour obtenir une croûte croustillante à l\'extérieur et un centre rouge et juteux à l\'intérieur. Il est généralement assaisonné avec du sel et du poivre et peut être accompagné d\'une sauce au choix, de légumes grillés et de pommes de terre. Le résultat est un plat savoureux et satisfaisant pour les amateurs de viande rouge.',15.00),(7,' Poulet frites','Goûtez notre délicieux poulet-frites, croustillant à l&#039;extérieur et tendre à l&#039;intérieur. Servi avec des frites dorées à la perfection et accompagné d&#039;une sauce maison pour une expérience gustative inoubliable. ',12.00);
/*!40000 ALTER TABLE `plats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reservations` (
  `reservation` int(11) NOT NULL AUTO_INCREMENT,
  `couverts` int(11) NOT NULL,
  `email` varchar(254) NOT NULL,
  `allergies` varchar(60) DEFAULT NULL,
  `date` date NOT NULL,
  `horaire` varchar(60) NOT NULL,
  PRIMARY KEY (`reservation`)
) ENGINE=InnoDB AUTO_INCREMENT=134 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservations`
--

LOCK TABLES `reservations` WRITE;
/*!40000 ALTER TABLE `reservations` DISABLE KEYS */;
INSERT INTO `reservations` VALUES (3,10,'galdRobert@fictif.fr','tomates','2023-03-12','12:45'),(129,2,'jDoe@fictif.fr','','2023-03-29','12:00'),(130,2,'jDoe@fictif.fr','','2023-03-30','12:00'),(131,2,'damif@fictif.fr','','2023-03-31','13:15'),(132,30,'jDoe@fictif.fr','','2023-03-31','12:00'),(133,10,'jDoe@fictif.fr','','2023-03-31','12:00');
/*!40000 ALTER TABLE `reservations` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-03-29 10:21:44
