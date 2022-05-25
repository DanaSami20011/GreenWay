-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: greenway
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `password` varchar(60) NOT NULL,
  `email` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'admin','$2y$12$DvsV3VRPz3oj5SNYFsWjvuqh5AQvCmSkyMtLp169dRhAd3cb08LH2','admin@greenway.com');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item` (
  `ID` int(4) NOT NULL AUTO_INCREMENT,
  `Item_number` int(10) NOT NULL,
  `name` varchar(60) NOT NULL,
  `image1` varchar(1000) NOT NULL,
  `image2` varchar(1000) DEFAULT NULL,
  `description` varchar(1000) NOT NULL,
  `avg_rate` decimal(5,2) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item`
--

LOCK TABLES `item` WRITE;
/*!40000 ALTER TABLE `item` DISABLE KEYS */;
INSERT INTO `item` VALUES (16,12654,'AFGHANI ANJEER (FIGS)','./upload_files/1/anjeer.jpg','./upload_files/1/anjeer2.jpg','Afghani Figs are a powerhouse of antioxidant flavonoids which includes carotenes, lutein, tannins, chlorogenic acids and Vitamin A, E and K and it prevents chronic diseases like diabetes, cancer and reduces inflammation.',4.00),(17,9873,'MEGHALAYA LAKADONG TURMERIC','./upload_files/1/honey.png','./upload_files/1/honey2.jpg','Bon Organo Lakadong  Turmeric has various medicinal benefits that greatly enhances Anti-inflammatory, Anti-septic, Anti-oxidant etc. properties and has incredible health benefits, aroma and unique taste.  It is 100% Lakadong turmeric powder.',5.00),(18,8732,'ORGANIC COW PEAS','./upload_files/1/peas.jpg','./upload_files/1/peas2.jpg','Organic Cowpeas help improve digestion, aid in sleep disorders, manage diabetes, and protect the heart. They also detoxify the body, promote healthy skin, aid in weight loss, and improve blood circulation.',3.00),(19,35521,'ORGANIC GARLIC PICKLES','./upload_files/1/ORGANIC-GARLIC-PICKLES-1.jpg','./upload_files/1/ORGANIC-GARLIC-PICKLES-2.jpg','Organic garlic pickles have rich antioxidants. It prevents us from skin problems and heart diseases.',2.00),(25,67231,'ORGANIC COCONUT OIL','./upload_files/1/ORGANIC-COCONUT-OIL-1.jpg','./upload_files/1/ORGANIC-COCONUT-OIL-2.jpg','HEALTH BENEFITS OF ORGANIC VIRGIN COCONUT OIL:\r\n\r\nOrganic virgin coconut oil boosts up energy and immunity.\r\nIt is benefit in diabetes and cancer disease.\r\nIt fight against Alzheimer disease.\r\nIt helps in wounds and burns.\r\nIt makes your skin shiny and beautiful.\r\nIt reduces obesity.\r\nIt increases good HDL cholesterol in your body.\r\nIt protect your teeth, hair and skins.\r\nIt gives good result in thyroid problem.',5.00),(32,345666,'ORGANIC GREEN MOONG DAL','./upload_files/1/O1.jpg','./upload_files/1/O2.jpg','BENEFITS OF ORGANIC GREEN MOONG DAL:\r\n\r\n1. Balances the Metabolism Levels\r\n2. Maintains the Cholesterol levels\r\n3. Maintains the Blood Pressure\r\n4  Increase your Energy and Concentration Levels\r\n5. Boosts up your Immunity Levels',1.00),(33,6543,'SEA BUCKTHORN JUICE','./upload_files/1/S1.jpg','./upload_files/1/S2.jpg','HEALTH BENEFITS OF SEA BUCKTHORN JUICE:\r\n\r\nSea buckthorn juice is rich in Omega 3,6, and 9. It contains Vitamin C, Calcium and 12 types of amino acid.\r\nIt protects from  cardiovascular diseases.\r\nIt support nomalizing blood sugar.\r\nIt provides us relief from gastric distress.\r\nIt increases blood circulation and energy level.\r\nIt prevent from sunburn.\r\nThis juice has powerful anti-oxidants.\r\n Improving sight.\r\nSlowing the aging process.\r\n It has no added sugar and artificial sweeteners.',4.00),(34,33442,'PLANT BASED COLLAGEN POWDER','./upload_files/1/P1.jpg','./upload_files/1/P2.jpg','BENEFITS OF PLANT BASED COLLAGEN POWDER:\r\n\r\nProtect your body from damaging compounds called free radicals, prevent UV damage to the skin.\r\nImproves your heart health, skin conditions Swelling and other skin issues.\r\nStimulate fibroblasts in the body, gives you healthy and glowing skin, has both internal and external benefits.\r\nFunction as efficient antioxidant compounds.\r\nPrevent the formation of free radicals it also inhibits tyrosinase, a skin enzyme that prevents melanin.\r\nHelp reduce hot flashes. Clear up acne, ease eczema.\r\nSupport hair growth and improves Scalp health.\r\nCollagen helps in the reduction of joint aches and pains. It  can aid cartilage repair while also acting as an anti-inflammatory.',4.00);
/*!40000 ALTER TABLE `item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `review` (
  `ID` int(4) NOT NULL AUTO_INCREMENT,
  `review_text` varchar(300) NOT NULL,
  `image1` varchar(1000) NOT NULL,
  `image2` varchar(1000) DEFAULT NULL,
  `rate` int(10) NOT NULL,
  `item_id` int(4) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `item_id` (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `review`
--

LOCK TABLES `review` WRITE;
/*!40000 ALTER TABLE `review` DISABLE KEYS */;
INSERT INTO `review` VALUES (35,'Good item!','upload_files/12654/anjeer2.jpg','',4,12654),(36,'Not bad :)','upload_files/8732/peas2.jpg','',3,8732),(37,'Yummmmmy, so good!!','upload_files/9873/honey.png','',5,9873),(38,'Good','upload_files/33442/P1.jpg','',4,33442),(39,'Amazing item','upload_files/67231/ORGANIC-COCONUT-OIL-1.jpg','',5,67231),(40,'I did not like it :(','upload_files/35521/ORGANIC-GARLIC-PICKLES-2.jpg','',2,35521),(41,'YOU REALLY SHOULD TRY IT!','upload_files/6543/S1.jpg','',4,6543),(42,'غير جيّد!','upload_files/345666/O1.jpg','upload_files/345666/O2.jpg',1,345666),(43,'أنصح به ','upload_files/8732/peas.jpg','',3,8732);
/*!40000 ALTER TABLE `review` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-05-18 20:13:48
