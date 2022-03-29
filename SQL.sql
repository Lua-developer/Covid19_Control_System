-- MySQL dump 10.13  Distrib 8.0.23, for Win64 (x86_64)
--
-- Host: kbsis.mysql.database.azure.com    Database: covid19
-- ------------------------------------------------------
-- Server version	8.0.21

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
-- Table structure for table `h_hospitalization`
--

DROP TABLE IF EXISTS `h_hospitalization`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `h_hospitalization` (
  `ID` varchar(15) NOT NULL,
  `Hopital` varchar(2) NOT NULL,
  `Admission_num` int NOT NULL,
  `Admission_date` date NOT NULL,
  `Condition` varchar(4) NOT NULL,
  `Ward` varchar(3) NOT NULL,
  `Inpatient_room` varchar(3) NOT NULL,
  `Medical_attendant` varchar(25) NOT NULL,
  `Underlying_disease` varchar(5) NOT NULL,
  `Side_effects` varchar(45) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `h_hospitalization`
--

LOCK TABLES `h_hospitalization` WRITE;
/*!40000 ALTER TABLE `h_hospitalization` DISABLE KEYS */;
INSERT INTO `h_hospitalization` VALUES ('000111-3456796','YH',157,'2021-09-17','R','3F','401','MALON','','Sickness'),('000111-3456800','DH',158,'2021-09-18','R','1A','401','JORDAN','','NONE'),('000315-3123466','DH',159,'2021-09-19','C','2C','203','IRVING','','NONE'),('000315-3123470','YH',160,'2021-09-20','R','4A','251','STUETT','9','NONE'),('000731-3196524','DH',161,'2021-09-21','HR','1E','112','PJ WALLEN','','NONE'),('000731-3196528','YH',162,'2021-09-22','C','3A','203','MALON','','NONE'),('010816-3489142','YH',156,'2021-09-16','R','1D','413','JAMES','','Sickness'),('021031-4155620','DH',25615,'2021-09-15','C','2D','312','KIDD','','NONE'),('040105-4165185','DH',25614,'2021-09-14','C','4F','302','JASON','','NONE'),('071213-3159191','DH',25616,'2021-09-13','C','2B','304','MERRY','','NONE'),('120815-4562147','DH',25614,'2021-08-03','R','1E','112','TOM','','NONE'),('120815-4562151','YH',25615,'2021-08-06','C','3A','203','JERRY','','NONE'),('330222-1149988','YH',762,'2021-09-02','R','2B','201','IRVING','','stomachache'),('330222-1149992','KH',763,'2021-09-03','R','4F','303','JIMMY','','stomachache'),('390111-1195190','YH',760,'2021-08-31','Dead','2C','222','MALON','','headache'),('390111-1195194','DH',761,'2021-09-01','R','3A','215','JORDAN','','NONE'),('410222-2149971','KH',756,'2021-08-27','R','1D','222','KIDD','4','NONE'),('410222-2149975','KH',757,'2021-08-28','C','3F','215','JAMES','','NONE'),('410222-2149995','DH',758,'2021-08-29','C','1A','201','JIMMY','4','Sickness'),('410222-2149999','YH',759,'2021-08-30','Dead','2C','303','JIMMY','','Sickness'),('440111-1195193','YH',62,'2021-09-25','Dead','2B','303','KIDD','','stomachache'),('440111-1195194','DH',63,'2021-09-26','Dead','2C','222','KIDD','','headache'),('440111-1195198','KH',64,'2021-09-27','Dead','4A','215','LOZIER','','Sickness'),('440111-1195201','KH',65,'2021-09-28','Dead','1D','201','OLYNYK','','headache'),('440111-1195205','KH',754,'2021-08-25','C','2C','201','MERRY','','Sickness'),('440111-1195209','KH',755,'2021-08-26','C','4A','303','JASON','14','Sickness'),('470222-2149967','KH',61,'2021-09-24','Dead','1D','201','MITCHELL','','NONE'),('470222-2149984','YH',187,'2021-08-21','C','2D','201','OLYNYK','','NONE'),('470222-2149988','KH',188,'2021-08-22','HR','1D','303','MITCHELL','','NONE'),('470222-2150008','KH',189,'2021-08-23','C','3F','222','KOLD','','NONE'),('470222-2150012','YH',190,'2021-08-24','C','1A','215','JIMMY','','NONE'),('490111-1195198','YH',185,'2021-08-19','C','2B','222','KIDD','','Sickness'),('490111-1195200','KH',58,'2021-10-01','Dead','1A','303','KIDD','','headache'),('490111-1195201','KH',59,'2021-10-02','Dead','2C','222','LOZIER','','Sickness'),('490111-1195202','DH',186,'2021-08-20','Dead','4F','215','LOZIER','','Sickness'),('490111-1195207','DH',60,'2021-10-03','Dead','4A','215','OLYNYK','','headache'),('520222-2149975','DH',181,'2021-08-15','C','1D','222','KIDD','','NONE'),('520222-2149979','YH',182,'2021-08-16','R','3F','215','LOZIER','','Sickness'),('520222-2149999','DH',183,'2021-08-17','C','1A','201','OLYNYK','','stomachache'),('520222-2150003','YH',184,'2021-08-18','R','2C','303','MITCHELL','','Sickness'),('560111-1195205','DH',179,'2021-11-18','C','3B','201','OLYNYK','','NONE'),('560111-1195209','YH',180,'2021-08-14','C','2C','303','MITCHELL','','NONE'),('570222-2149975','YH',173,'2021-11-12','R','4A','206','JAMES','','stomachache'),('570222-2149979','DH',174,'2021-11-13','Dead','1D','402','JERRY','3','stomachache'),('570222-2149984','YH',57,'2021-09-30','Dead','3F','201','JASON','','headache'),('570222-2150004','DH',175,'2021-11-14','C','3F','201','MERRY','','headache'),('570222-2150008','YH',176,'2021-11-15','R','1A','303','JASON','','headache'),('570222-2150028','KH',177,'2021-11-16','HR','2C','222','KIDD','','NONE'),('570222-2150032','KH',178,'2021-11-17','C','3A','215','LOZIER','','NONE'),('590111-1195197','YH',169,'2021-11-08','C','1D','501','MALON','','Sickness'),('590111-1195201','YH',170,'2021-11-09','C','3F','206','MERRY','','NONE'),('590111-1195221','KH',171,'2021-11-10','C','1A','402','JASON','','NONE'),('590111-1195225','DH',172,'2021-11-11','R','2C','501','KIDD','','NONE'),('590111-1195231','KH',56,'2021-09-29','Dead','1D','215','MERRY','','NONE'),('610222-2149978','KH',167,'2021-11-06','R','4F','206','WESTBROOK','3','headache'),('610222-2149982','YH',168,'2021-11-07','C','2D','402','WESTBROOK','2','headache'),('650111-1195190','YH',64952,'2021-11-02','C','2C','501','WESTBROOK','','Sickness'),('650111-1195194','DH',64953,'2021-11-03','C','1E','206','MALON','','NONE'),('650111-1195206','DH',764,'2021-09-04','C','2D','222','JIMMY','','stomachache'),('650111-1195207','YH',765,'2021-09-05','R','1D','215','JIMMY','','NONE'),('650111-1195208','YH',766,'2021-09-06','HR','3F','201','MERRY','','NONE'),('650111-1195209','YH',767,'2021-09-07','C','1A','303','JASON','','NONE'),('650111-1195210','YH',768,'2021-09-08','C','2C','222','KIDD','','NONE'),('650111-1195211','YH',769,'2021-09-09','C','4A','215','JAMES','','NONE'),('650111-1195212','DH',770,'2021-09-10','C','1D','201','JIMMY','','NONE'),('650111-1195214','KH',165,'2021-11-04','C','3A','402','JORDAN','','Sickness'),('650111-1195218','YH',166,'2021-11-05','C','2B','501','IRVING','','stomachache'),('650111-1195221','KH',3,'2021-09-06','HR','2B','502','MALON','','stomachache'),('660222-2149966','YH',64951,'2021-08-06','HR','3B','402','WESTBROOK','','Sickness'),('690111-1195196','DH',55,'2021-08-27','Dead','2D','222','JERRY','','Sickness'),('690111-1195205','YH',64950,'2021-10-04','C','2C','206','WESTBROOK','','headache'),('710222-2149979','DH',64948,'2021-10-02','Dead','3F','402','KIDD','','NONE'),('710222-2149983','KH',64949,'2021-10-03','Dead','1A','501','WESTBROOK','','NONE'),('720111-1195195','KH',58,'2021-09-30','Dead','3A','104','MERRY','','NONE'),('720111-1195199','YH',64947,'2021-10-01','Dead','3B','306','JASON','8','NONE'),('760222-2149968','YH',57,'2021-09-29','R','3A','110','JERRY','','NONE'),('770111-1195208','DH',56,'2021-09-28','C','2C','116','TOM','','stomachache'),('780222-2149974','DH',54,'2021-09-26','C','3A','117','JAMES','','Sickness'),('780222-2149978','YH',55,'2021-09-27','C','3B','119','WESTBROOK','','stomachache'),('790111-1195194','YH',52,'2021-09-24','HR','4A','123','JASON','','NONE'),('790111-1195198','DH',53,'2021-09-25','C','3A','165','KIDD','','stomachache'),('810111-1195190','DH',50,'2021-09-22','C','1A','413','TUCKER','','NONE'),('810111-1195194','YH',51,'2021-09-23','R','2C','401','MERRY','','Sickness'),('830111-1195197','KH',48,'2021-09-20','R','1D','302','MCCOLLUM','8','NONE'),('830111-1195201','KH',49,'2021-09-21','R','3F','312','HEERO','','Sickness'),('840222-2149973','DH',7991,'2021-08-03','Dead','4F','203','KIDD','3','stomachache'),('840222-2149977','YH',7992,'2021-09-19','Dead','2D','304','MITCH','','headache'),('850111-1195189','YH',7989,'2021-10-13','C','2C','251','MERRY','','stomachache'),('850111-1195193','YH',7990,'2021-10-14','C','2B','112','JASON','','stomachache'),('870111-1195198','KH',7987,'2021-10-11','Dead','3A','401','TOM','','NONE'),('870111-1195202','DH',7988,'2021-10-12','C','3B','203','JERRY','','Sickness'),('880222-2149966','KH',7986,'2021-10-10','C','3A','401','FAVORS','','NONE'),('890111-1195198','YH',7985,'2021-10-09','C','2C','413','JAMES','','NONE'),('910111-1195195','KH',7983,'2021-10-07','C','3A','302','JASON','','NONE'),('910111-1195199','YH',7984,'2021-10-08','C','3B','312','KIDD','7','NONE'),('930111-1195189','KH',7981,'2021-10-05','C','2F','203','KIDD','','headache'),('930111-1195193','YH',7982,'2021-10-06','HR','3A','304','MERRY','','headache'),('960222-2149968','YH',7979,'2021-10-03','C','2C','203','MERRY','','stomachache'),('960222-2149972','DH',7980,'2021-10-04','R','4A','112','JASON','','stomachache'),('980222-2149973','YH',163,'2021-09-23','C','2B','304','JORDAN','','stomachache'),('980222-2149977','KH',164,'2021-09-24','C','4F','302','IRVING','','stomachache'),('990111-1195208','KH',165,'2021-09-25','C','2D','312','MERRY','3','stomachache'),('990111-1195212','KH',166,'2021-09-26','R','1D','413','JASON','','stomachache'),('990111-1195232','YH',167,'2021-10-01','C','3F','401','KIDD','','headache'),('990111-1195236','DH',168,'2021-10-02','R','1A','401','JAMES','','Sickness');
/*!40000 ALTER TABLE `h_hospitalization` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-12-01 16:56:44
