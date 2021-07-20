-- MySQL dump 10.13  Distrib 8.0.25, for Linux (x86_64)
--
-- Host: localhost    Database: uniTesDB
-- ------------------------------------------------------
-- Server version	8.0.25-0ubuntu0.20.04.1

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
-- Table structure for table `accommodation`
--

DROP TABLE IF EXISTS `accommodation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `accommodation` (
  `id` int NOT NULL AUTO_INCREMENT,
  `accomLocation` varchar(50) NOT NULL,
  `availFrom` date NOT NULL,
  `availTo` date NOT NULL,
  `guests` int DEFAULT NULL,
  `price` int NOT NULL,
  `rooms` int NOT NULL,
  `bathrooms` int NOT NULL,
  `smoking` varchar(5) NOT NULL,
  `garage` varchar(5) NOT NULL,
  `pet` varchar(5) NOT NULL,
  `internet` varchar(5) NOT NULL,
  `accomAddress` text NOT NULL,
  `houseRating` decimal(2,1) DEFAULT NULL,
  `hostRating` decimal(2,1) DEFAULT NULL,
  `hostID` int NOT NULL,
  `accomName` varchar(50) DEFAULT NULL,
  `accomDesc` text,
  `city` varchar(50) DEFAULT NULL,
  `entireHouse` varchar(5) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `image` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `hostID` (`hostID`),
  CONSTRAINT `accommodation_ibfk_1` FOREIGN KEY (`hostID`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accommodation`
--

LOCK TABLES `accommodation` WRITE;
/*!40000 ALTER TABLE `accommodation` DISABLE KEYS */;
INSERT INTO `accommodation` VALUES (1,'Hobart','2021-01-01','2021-10-15',10,1000,3,1,'No','Yes','No','Yes','1 Swan St Hobart TAS 7000',4.0,4.4,11,NULL,NULL,NULL,NULL,0,NULL),(2,'Hobart','2021-05-01','2022-10-15',9,750,4,2,'Yes','Yes','Yes','Yes','8 Brooke St Hobart TAS 7008',3.5,2.4,11,NULL,NULL,NULL,NULL,0,NULL),(3,'Greater Hobart','2021-03-01','2022-05-10',8,500,2,3,'Yes','Yes','No','Yes','1baaa Queens Rd Cygnet TAS 7112',3.9,4.3,11,NULL,NULL,NULL,NULL,1,NULL),(4,'Greater Hobart','2021-01-01','2021-05-15',9,2000,4,3,'No','No','Yes','Yes','31aa Bruny Rd Bruny Island TAS 7117',4.0,4.4,11,NULL,NULL,NULL,NULL,1,NULL),(6,'Greater Hobart','2021-05-01','2021-12-15',8,300,2,1,'No','Yes','No','Yes','31ba King St Westwood TAS 7292',4.0,4.4,11,NULL,NULL,NULL,NULL,0,NULL),(7,'Greater Hobart','2021-02-01','2022-03-15',9,800,3,0,'No','Yes','No','Yes','25 Church St Deloraine TAS 7304',4.0,4.4,11,NULL,NULL,NULL,NULL,1,NULL),(8,'Launceston','2021-02-01','2022-05-15',15,700,5,4,'No','Yes','No','Yes','1 Invermay Rd Launceston TAS 7250',4.0,4.4,13,NULL,NULL,NULL,NULL,0,NULL),(9,'Hobart','2021-04-01','2021-11-15',7,2000,7,1,'No','Yes','No','Yes','1 Elizabeth St Hobart TAS 7000',4.0,4.4,11,NULL,NULL,NULL,NULL,1,NULL),(10,'Launceston','2021-06-01','2022-10-15',4,300,8,3,'No','Yes','No','Yes','50 Huon Hwy Huonville TAS 7109',4.0,4.4,13,NULL,NULL,NULL,NULL,1,NULL),(11,'Greater Launceston','2021-02-01','2022-10-15',55,35005,86,1,'Yes','No','No','Yes','1000 Huon Hwy Huonville TAS 7209',4.0,4.4,24,NULL,NULL,NULL,NULL,1,NULL),(12,'Greater Launceston','2021-01-01','2022-10-15',7,500,8,1,'No','Yes','No','Yes','7 Huon Hwy Huonville TAS 7309',4.0,4.4,13,NULL,NULL,NULL,NULL,1,NULL),(13,'Greater Launceston','2021-03-01','2022-10-15',10,750,8,7,'No','Yes','No','Yes','350 Huon Hwy Huonville TAS 7509',4.0,4.4,13,NULL,NULL,NULL,NULL,1,NULL),(14,'Hobart','2021-05-01','2021-12-20',8,500,5,3,'No','No','Yes','No','1 Bond Avenue',NULL,NULL,11,'Simon','Test','St Albans','Yes',1,NULL),(15,'Hobart','2021-05-20','2021-05-30',8,10000,3,3,'No','No','No','No','sds',NULL,NULL,17,'vt','cvfd','dsds','No',1,NULL),(16,'Hobart','2021-05-19','2021-05-31',5,1000,2,2,'Yes','Yes','Yes','Yes','sds',NULL,NULL,17,'vt','cvfd','dsds','No',0,NULL),(17,'Hobart','2021-05-04','2021-05-07',6,10000,3,3,'Yes','Yes','No','No','sds',NULL,NULL,24,'vt','cvfd','dsds','No',0,NULL),(18,'Hobart','2021-05-05','2021-05-31',6,10000,3,3,'Yes','Yes','Yes','Yes','sds',NULL,NULL,24,'vt','cvfd','dsds','Yes',1,NULL),(19,'Hobart','2021-05-03','2021-05-26',6,10000,3,3,'Yes','Yes','Yes','No','AS',NULL,NULL,24,'vt','cvfd','dsds','Yes',1,NULL),(20,'Hobart','2021-05-14','2021-05-15',6,10000,3,3,'Yes','Yes','Yes','Yes','sds',NULL,NULL,24,'vt','cvfd','dsds','No',1,'image.png'),(21,'Hobart','2021-05-19','2021-05-11',6,10000,3,3,'Yes','Yes','Yes','Yes','sds',NULL,NULL,24,'vt','cvfd','dsds','Yes',1,'image (2).png'),(22,'Hobart','2021-05-07','2021-05-07',6,10000,3,3,'Yes','Yes','Yes','Yes','sds',NULL,NULL,24,'vt','cvfd','dsds','Yes',1,'image (2).png');
/*!40000 ALTER TABLE `accommodation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bookings` (
  `bid` int NOT NULL AUTO_INCREMENT,
  `accomID` int NOT NULL,
  `users` int NOT NULL,
  `bookFrom` date NOT NULL,
  `bookTo` date NOT NULL,
  `bstatus` varchar(20) NOT NULL,
  `noofguests` int NOT NULL,
  `totalprice` decimal(10,2) NOT NULL,
  `comments` text,
  PRIMARY KEY (`bid`),
  KEY `accomID` (`accomID`),
  KEY `users` (`users`),
  CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`accomID`) REFERENCES `accommodation` (`id`),
  CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`users`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bookings`
--

LOCK TABLES `bookings` WRITE;
/*!40000 ALTER TABLE `bookings` DISABLE KEYS */;
INSERT INTO `bookings` VALUES (2,3,9,'2021-03-05','2021-03-10','confirmed',2,100.00,NULL),(3,10,12,'2021-10-01','2021-12-01','paid',3,1050.00,NULL),(6,2,13,'2021-05-10','2021-05-16','paid',4,4500.00,NULL),(8,2,13,'2021-05-24','2021-06-06','rejected',5,9750.00,NULL),(10,9,10,'2021-05-04','2021-05-15','paid',3,22000.00,NULL),(11,1,10,'2021-06-01','2021-07-01','paid',3,30000.00,NULL),(13,7,10,'2021-04-30','2021-05-22','rejected',5,17600.00,'TEST 8.30PM'),(14,3,10,'2021-05-10','2021-05-30','confirmed',3,10000.00,NULL),(15,1,23,'2021-05-15','2021-05-29','paid',3,14000.00,NULL),(16,11,25,'2021-05-03','2021-05-21','cancelled',1,63000.00,NULL),(17,18,25,'2021-05-05','2021-05-26','rejected',3,210000.00,'No availaable'),(18,19,25,'2021-05-04','2021-05-25','reviewed',2,210000.00,NULL);
/*!40000 ALTER TABLE `bookings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failedbooking`
--

DROP TABLE IF EXISTS `failedbooking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failedbooking` (
  `id` int NOT NULL AUTO_INCREMENT,
  `bid` int NOT NULL,
  `accomID` int NOT NULL,
  `users` int NOT NULL,
  `bookFrom` date NOT NULL,
  `bookTo` date NOT NULL,
  `bstatus` varchar(50) NOT NULL,
  `noofguests` int NOT NULL,
  `totalprice` decimal(10,2) NOT NULL,
  `comments` text,
  PRIMARY KEY (`id`),
  KEY `accomID` (`accomID`),
  KEY `users` (`users`),
  CONSTRAINT `failedbooking_ibfk_1` FOREIGN KEY (`accomID`) REFERENCES `accommodation` (`id`),
  CONSTRAINT `failedbooking_ibfk_2` FOREIGN KEY (`users`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failedbooking`
--

LOCK TABLES `failedbooking` WRITE;
/*!40000 ALTER TABLE `failedbooking` DISABLE KEYS */;
INSERT INTO `failedbooking` VALUES (4,9,12,10,'2021-05-11','2021-05-23','cancelled',4,6000.00,NULL),(5,12,11,10,'2021-05-05','2021-05-09','cancelled',3,14000.00,NULL),(7,1,11,10,'2021-02-01','2021-03-01','cancelled',0,500.00,NULL),(8,4,1,9,'2021-05-01','2021-07-01','rejected',0,1500.00,NULL),(9,8,2,13,'2021-05-24','2021-06-06','rejected',5,9750.00,NULL),(11,13,7,10,'2021-04-30','2021-05-22','rejected',5,17600.00,'TEST 8.30PM'),(12,16,11,25,'2021-05-03','2021-05-21','cancelled',1,63000.00,NULL),(13,17,18,25,'2021-05-05','2021-05-26','rejected',3,210000.00,'No availaable');
/*!40000 ALTER TABLE `failedbooking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inbox`
--

DROP TABLE IF EXISTS `inbox`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `inbox` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fromID` int NOT NULL,
  `toID` int NOT NULL,
  `msg` text,
  `bookingID` int NOT NULL,
  `inputTime` datetime DEFAULT CURRENT_TIMESTAMP,
  `mread` varchar(6) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fromID` (`fromID`),
  KEY `toID` (`toID`),
  KEY `bookingID` (`bookingID`),
  CONSTRAINT `inbox_ibfk_1` FOREIGN KEY (`fromID`) REFERENCES `users` (`id`),
  CONSTRAINT `inbox_ibfk_2` FOREIGN KEY (`toID`) REFERENCES `users` (`id`),
  CONSTRAINT `inbox_ibfk_3` FOREIGN KEY (`bookingID`) REFERENCES `bookings` (`bid`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inbox`
--

LOCK TABLES `inbox` WRITE;
/*!40000 ALTER TABLE `inbox` DISABLE KEYS */;
INSERT INTO `inbox` VALUES (1,10,11,'<p>dsad</p>asdas',13,'2021-05-14 12:16:44','unread'),(2,10,11,'<p>25 Church St Deloraine TAS 7304 </p>\r\n                               <p>2021-04-30 to 2021-05-22</p><p>HelLOOOOOOOOOO</p>',13,'2021-05-14 12:27:05','unread'),(3,10,11,'<p>25 Church St Deloraine TAS 7304 </p>\r\n                               <p>Period: 2021-04-30 to 2021-05-22</p><p>HELLO PE HEO</p>',13,'2021-05-14 12:28:19','unread'),(4,10,11,'Re: <p>25 Church St Deloraine TAS 7304 </p>\r\n                               <p>Period: 2021-04-30 to 2021-05-22</p><p>HELLO HEO 2</p>',13,'2021-05-14 12:29:05','unread'),(5,10,11,'Re: <p>25 Church St Deloraine TAS 7304 </p>\r\n                               <p>Period: 2021-04-30 to 2021-05-22</p>Msg 123',13,'2021-05-14 12:30:11','unread'),(6,10,11,'<p>Re: 25 Church St Deloraine TAS 7304 </p>\r\n                               <p>Period: 2021-04-30 to 2021-05-22</p>LAST ONE',13,'2021-05-14 12:30:35','read'),(7,10,11,'<p><b>Re:</b> 25 Church St Deloraine TAS 7304 </p>\r\n                               <p><b>Period:</b> 2021-04-30 to 2021-05-22</p>LAST 1',13,'2021-05-14 12:31:28','unread'),(8,11,10,'<p><b>Re:</b> 25 Church St Deloraine TAS 7304 </p>\r\n                               <p><b>Period:</b> 2021-04-30 to 2021-05-22</p>Reply ur arse',13,'2021-05-14 13:11:50','unread'),(10,10,11,'<p><b>Re:</b> 25 Church St Deloraine TAS 7304 </p>\r\n                               <p><b>Period:</b> 2021-04-30 to 2021-05-22</p>FK ZUUU',13,'2021-05-14 13:38:30','read'),(11,10,11,'<p><b>Re:</b> 25 Church St Deloraine TAS 7304 </p>\r\n                               <p><b>Period:</b> 2021-04-30 to 2021-05-22</p>FK ZUUU 2',13,'2021-05-14 13:38:58','unread'),(12,11,10,'<p><b>Re:</b> 25 Church St Deloraine TAS 7304 </p>\r\n                               <p><b>Period:</b> 2021-04-30 to 2021-05-22</p>Ouch :(',13,'2021-05-14 13:41:31','unread'),(13,10,11,'<p><b>Re:</b> 1 Queens Rd Cygnet TAS 7112 </p>\r\n                               <p><b>Period:</b> 2021-05-10 to 2021-05-30</p>Please accept',14,'2021-05-14 14:11:48','read'),(14,10,11,'<p><b>Re:</b> 25 Church St Deloraine TAS 7304 </p>\r\n                               <p><b>Period:</b> 2021-04-30 to 2021-05-22</p>Tests 2',13,'2021-05-14 14:13:47','unread'),(17,11,13,'<p><b>Re:</b> 8 Brooke St Hobart TAS 7008 </p>\r\n                                <p><b>Period:</b> 2021-05-24 to 2021-06-06</p>reject cause i hate zu',8,'2021-05-14 18:12:04','unread'),(18,11,13,'<p><b>REJECT Re:</b> 8 Brooke St Hobart TAS 7008 </p>\r\n                                <p><b>Period:</b> 2021-05-24 to 2021-06-06</p>TEST 2',8,'2021-05-14 18:15:23','unread'),(19,11,10,'<p><b>REJECT Re:</b> 25 Church St Deloraine TAS 7304 </p>\r\n                                <p><b>Period:</b> 2021-04-30 to 2021-05-22</p>TEST 8.30PM',13,'2021-05-14 20:36:51','unread'),(20,17,9,'<p><b>Re:</b> 1baaa Queens Rd Cygnet TAS 7112 </p>\r\n                                <p><b>Period:</b> 2021-03-05 to 2021-03-10</p>Test send to client',2,'2021-05-14 21:41:13','unread'),(21,17,11,'<p><b>Re:</b> 1baaa Queens Rd Cygnet TAS 7112 </p>\r\n                                <p><b>Period:</b> 2021-03-05 to 2021-03-10</p>Test send to host',2,'2021-05-14 21:41:31','read'),(22,23,11,'<p><b>Re:</b> 1 Swan St Hobart TAS 7000 </p>\r\n                                <p><b>Period:</b> 2021-05-15 to 2021-05-29</p>How much would it cost?',15,'2021-05-14 23:36:55','unread'),(23,25,24,'<p><b>Re:</b> 1000 Huon Hwy Huonville TAS 7209 </p>\r\n                                <p><b>Period:</b> 2021-05-03 to 2021-05-21</p>Hi',16,'2021-05-18 08:25:10','read'),(24,24,25,'<p><b>Re:</b> 1000 Huon Hwy Huonville TAS 7209 </p>\r\n                                <p><b>Period:</b> 2021-05-03 to 2021-05-21</p>Confirmed',16,'2021-05-18 08:25:32','read'),(25,17,11,'<p><b>Re:</b> 1baaa Queens Rd Cygnet TAS 7112 </p>\r\n                                <p><b>Period:</b> 2021-03-05 to 2021-03-10</p>Hi',2,'2021-05-19 21:08:21','unread'),(26,17,24,'<p><b>Re:</b> 1000 Huon Hwy Huonville TAS 7209 </p>\r\n                                <p><b>Period:</b> 2021-05-03 to 2021-05-21</p>ha g hogya?',16,'2021-05-19 23:35:23','read'),(27,24,17,'<p><b>Re:</b> 1000 Huon Hwy Huonville TAS 7209 </p>\r\n                                <p><b>Period:</b> 2021-05-03 to 2021-05-21</p>Yes',16,'2021-05-19 23:35:57','read'),(28,17,25,'<p><b>Re:</b> 1000 Huon Hwy Huonville TAS 7209 </p>\r\n                                <p><b>Period:</b> 2021-05-03 to 2021-05-21</p>done',16,'2021-05-19 23:36:27','read'),(29,25,17,'<p><b>Re:</b> 1000 Huon Hwy Huonville TAS 7209 </p>\r\n                                <p><b>Period:</b> 2021-05-03 to 2021-05-21</p>Thanks',16,'2021-05-19 23:36:41','read'),(30,17,13,'<p><b>Re:</b> 50 Huon Hwy Huonville TAS 7109 </p>\r\n                                <p><b>Period:</b> 2021-10-01 to 2021-12-01</p>rejected',3,'2021-05-19 23:39:05','unread'),(31,17,10,'<p><b>Re:</b> 1 Elizabeth St Hobart TAS 7000 </p>\r\n                                <p><b>Period:</b> 2021-05-04 to 2021-05-15</p>rejected',10,'2021-05-19 23:39:26','unread'),(32,24,17,'<p><b>Re:</b> 1000 Huon Hwy Huonville TAS 7209 </p>\r\n                                <p><b>Period:</b> 2021-05-03 to 2021-05-21</p>ok',16,'2021-05-20 10:21:10','unread'),(33,24,25,'<p><b>REJECT Re:</b> sds </p>\r\n                                <p><b>Period:</b> 2021-05-05 to 2021-05-26</p>No availaable',17,'2021-05-20 21:15:36','unread');
/*!40000 ALTER TABLE `inbox` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reviews` (
  `id` int NOT NULL AUTO_INCREMENT,
  `bid` int NOT NULL,
  `hostID` int NOT NULL,
  `reviewerID` int NOT NULL,
  `accomID` int NOT NULL,
  `accomRating` int NOT NULL,
  `hostRating` int NOT NULL,
  `review` text,
  `inputTime` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `bid` (`bid`),
  KEY `hostID` (`hostID`),
  KEY `reviewerID` (`reviewerID`),
  KEY `accomID` (`accomID`),
  CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`bid`) REFERENCES `bookings` (`bid`),
  CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`hostID`) REFERENCES `users` (`id`),
  CONSTRAINT `reviews_ibfk_3` FOREIGN KEY (`reviewerID`) REFERENCES `users` (`id`),
  CONSTRAINT `reviews_ibfk_4` FOREIGN KEY (`accomID`) REFERENCES `accommodation` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reviews`
--

LOCK TABLES `reviews` WRITE;
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
INSERT INTO `reviews` VALUES (6,11,11,10,1,4,5,'Good','2021-05-14 14:05:43'),(7,3,24,12,10,4,4,'Good ','2021-05-14 14:29:28'),(9,16,24,25,11,5,5,'Good','2021-05-18 08:16:39'),(68,18,24,25,19,5,5,'good','2021-05-20 21:18:05');
/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `access` int NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `pwd` varchar(30) NOT NULL,
  `abn` varchar(15) DEFAULT NULL,
  `userAddress` text,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (9,2,'simon1','tran2','tranphuc19991@gmail.com','0466543060','KIK9havFtW8W2','',NULL,1),(10,2,'Simon','T','simon.tran05@gmail.com','0466543060','KIK9havFtW8W2','','asdasd',0),(11,2,'Host 1','Tran','tranphuc1998@gmail.com','0466543060','KIf.an25dGUHI','12345678901',NULL,0),(12,1,'Katie','Heo','katie.heo@utas1','0466543060','KIK9havFtW8W2','',NULL,1),(13,2,'Host 2','Heo 1','peheo@utas','0412312311','KIIa.VBN3xtfQ','12345558901','sadasd',0),(17,3,'admin','admin','admin','1234567890','KI6eI1NDNwMlg','',NULL,1),(19,1,'Anh','Phan','asdsad@utas.edu.au','0452152908','KIV0So8mSP3eg','',NULL,1),(20,1,'Vinh','Tran','tranphuc1999@gmail.com','0466543060','KIV0So8mSP3eg','',NULL,1),(21,1,'Vinh','Tran','tranphuc1999a@gmail.com','0466543060','KIV0So8mSP3eg','',NULL,1),(22,1,'Vinh','Tran','tranphuc199a9@gmail.com','0466543060','KIV0So8mSP3eg','',NULL,0),(23,1,'Simon','Tran','examp@utas.edu','0412312312','KIV0So8mSP3eg','','',1),(24,2,'Shahzaib Ali','Hassan','sa@ali.com','4432323232','KI6eI1NDNwMlg','43254390876',NULL,1),(25,1,'Shahzaib Ali','Hassan','sa2@ali.com','4567898765','KI6eI1NDNwMlg','','',1),(26,1,'Cvr','ase','sa3@ali.com','4432323232','KI6eI1NDNwMlg','',NULL,1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-07-20 22:23:37
