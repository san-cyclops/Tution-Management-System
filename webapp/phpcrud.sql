CREATE DATABASE  IF NOT EXISTS `phpcrud` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `phpcrud`;
-- MySQL dump 10.13  Distrib 8.0.29, for Win64 (x86_64)
--
-- Host: localhost    Database: phpcrud
-- ------------------------------------------------------
-- Server version	8.0.29

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
-- Table structure for table `imageupload`
--

DROP TABLE IF EXISTS `imageupload`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `imageupload` (
  `id` int NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imageupload`
--

LOCK TABLES `imageupload` WRITE;
/*!40000 ALTER TABLE `imageupload` DISABLE KEYS */;
INSERT INTO `imageupload` VALUES (3,'product-img-2.jpg'),(4,'product-img-1.jpg'),(5,'product-img-6.jpg'),(6,'vimansa2.png'),(7,'800px_COLOURBOX11070263.jpg'),(8,''),(9,''),(10,''),(11,''),(12,''),(13,'121212.png'),(14,'11947401_115773048772370_8917868097657113624_n.jpg');
/*!40000 ALTER TABLE `imageupload` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblcourse`
--

DROP TABLE IF EXISTS `tblcourse`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblcourse` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `courseId` varchar(45) DEFAULT NULL,
  `courseName` varchar(45) DEFAULT NULL,
  `LectureId` varchar(45) DEFAULT NULL,
  `cDay` varchar(45) DEFAULT NULL,
  `ctimeS` varchar(45) DEFAULT NULL,
  `ctimeE` varchar(45) DEFAULT NULL,
  `coursePic` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblcourse`
--

LOCK TABLES `tblcourse` WRITE;
/*!40000 ALTER TABLE `tblcourse` DISABLE KEYS */;
INSERT INTO `tblcourse` VALUES (1,'665767','fghfg','lect0001','Monday','16:27','16:29','1429377.jpg'),(2,'665767','34343','lect0001','Monday','16:27','16:29','Untitled-2.jpg'),(3,'005541','stess','lect0001','Monday','00:01','00:02','1_0007_40.jpg');
/*!40000 ALTER TABLE `tblcourse` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbllectures`
--

DROP TABLE IF EXISTS `tbllectures`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbllectures` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `tID` varchar(45) DEFAULT NULL,
  `tName` varchar(45) DEFAULT NULL,
  `nic` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `birthday` varchar(45) DEFAULT NULL,
  `gender` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `pPic` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbllectures`
--

LOCK TABLES `tbllectures` WRITE;
/*!40000 ALTER TABLE `tbllectures` DISABLE KEYS */;
INSERT INTO `tbllectures` VALUES (1,'45454','sdfsdf','3434','sdf','2022-11-24','male','44545','admin@sdf','a','800px_COLOURBOX11070263.jpg');
/*!40000 ALTER TABLE `tbllectures` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblstudents`
--

DROP TABLE IF EXISTS `tblstudents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblstudents` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `RFIDNumber` varchar(200) DEFAULT NULL,
  `StudentID` varchar(200) DEFAULT NULL,
  `StudentName` varchar(200) DEFAULT NULL,
  `NIC` varchar(200) DEFAULT NULL,
  `Address` mediumtext,
  `Gender` varchar(200) DEFAULT NULL,
  `Birthday` varchar(200) DEFAULT NULL,
  `ContactNumber` varchar(200) DEFAULT NULL,
  `EmailAddress` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `ParentName` varchar(45) DEFAULT NULL,
  `ParentContactNumber` varchar(45) DEFAULT NULL,
  `ParentEmailAddress` varchar(45) DEFAULT NULL,
  `ProfilePicture` varchar(250) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblstudents`
--

LOCK TABLES `tblstudents` WRITE;
/*!40000 ALTER TABLE `tblstudents` DISABLE KEYS */;
INSERT INTO `tblstudents` VALUES (1,'120','3434','saedd','343434','gaee','Male','2022-11-18','34343434','admin@sdfsdf','a','sdfsdf','343434','sab@sdf','800px_COLOURBOX11070263.jpg'),(3,'343434','34343','kumesha','34343434343','sdfsdf','Male','2022-11-18','343434','admin@sdfsdf','a','sdfsdf','3434343','sdf@sdfsd','121212.png');
/*!40000 ALTER TABLE `tblstudents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblusers`
--

DROP TABLE IF EXISTS `tblusers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblusers` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(200) DEFAULT NULL,
  `LastName` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Address` mediumtext,
  `CreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblusers`
--

LOCK TABLES `tblusers` WRITE;
/*!40000 ALTER TABLE `tblusers` DISABLE KEYS */;
INSERT INTO `tblusers` VALUES (3,'Sarita','Pandey',5454987631,'sarita@gmail.com','H-987 Bihari Puram Ghazibad','2022-11-18 14:18:56','admin','a'),(6,'Krishna','Dutt',4654564464,'krishna@gmail.com','J&K Block-789 Laxmi Nagar','2020-09-20 09:00:28',NULL,NULL),(8,'dfg','dfg',3434343,'23@gmail.com','adf\r\n','2022-10-28 08:25:09',NULL,NULL);
/*!40000 ALTER TABLE `tblusers` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-11-20 20:32:23
CREATE TABLE `tblclass` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `courseId` varchar(45) DEFAULT NULL,
  `classID` varchar(45) DEFAULT NULL,
  `className` varchar(45) DEFAULT NULL,
  `clzStatus` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
