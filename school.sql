-- MySQL dump 10.13  Distrib 9.7.0, for Win64 (x86_64)
--
-- Host: localhost    Database: school
-- ------------------------------------------------------
-- Server version	9.7.0

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
SET @MYSQLDUMP_TEMP_LOG_BIN = @@SESSION.SQL_LOG_BIN;
SET @@SESSION.SQL_LOG_BIN= 0;

--
-- GTID state at the beginning of the backup 
--

SET @@GLOBAL.GTID_PURGED=/*!80000 '+'*/ '11e6f0d0-67f3-11f1-aba6-4a651d608c9d:1-2946';

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admins` (
  `adminId` bigint unsigned NOT NULL AUTO_INCREMENT,
  `userId` int NOT NULL,
  `notifications_Posted` int NOT NULL DEFAULT '0',
  `adminDetailId` int DEFAULT NULL,
  `status` int NOT NULL,
  `batchId` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`adminId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,1,0,1,1,1,NULL,NULL);
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attendences`
--

DROP TABLE IF EXISTS `attendences`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `attendences` (
  `attendanceDataId` bigint unsigned NOT NULL AUTO_INCREMENT,
  `yes_or_no` int NOT NULL,
  `userId` int NOT NULL,
  `userRole` int NOT NULL,
  `todaysDate` date NOT NULL,
  `status` int NOT NULL,
  `batchId` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`attendanceDataId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attendences`
--

LOCK TABLES `attendences` WRITE;
/*!40000 ALTER TABLE `attendences` DISABLE KEYS */;
/*!40000 ALTER TABLE `attendences` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `batches`
--

DROP TABLE IF EXISTS `batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `batches` (
  `batchId` bigint unsigned NOT NULL AUTO_INCREMENT,
  `batchName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batchStartingYear` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batchEndingYear` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '67',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`batchId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `batches`
--

LOCK TABLES `batches` WRITE;
/*!40000 ALTER TABLE `batches` DISABLE KEYS */;
INSERT INTO `batches` VALUES (1,'2025-2026','2025','2026',40,NULL,NULL);
/*!40000 ALTER TABLE `batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `class_rooms`
--

DROP TABLE IF EXISTS `class_rooms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `class_rooms` (
  `classroomDetailId` bigint unsigned NOT NULL AUTO_INCREMENT,
  `grade` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roomNo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `departmentId` int NOT NULL,
  `semester` int NOT NULL,
  `classTeacher` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacity` int NOT NULL DEFAULT '0',
  `classTimeTableId` int NOT NULL DEFAULT '0',
  `status` int NOT NULL DEFAULT '1',
  `batchId` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`classroomDetailId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `class_rooms`
--

LOCK TABLES `class_rooms` WRITE;
/*!40000 ALTER TABLE `class_rooms` DISABLE KEYS */;
INSERT INTO `class_rooms` VALUES (1,'1','0','1',1,1,'1','Registered',1,1,1,1,NULL,NULL);
/*!40000 ALTER TABLE `class_rooms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `constant_controllers`
--

DROP TABLE IF EXISTS `constant_controllers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `constant_controllers` (
  `constantId` bigint unsigned NOT NULL AUTO_INCREMENT,
  `constantName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `constantValue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`constantId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `constant_controllers`
--

LOCK TABLES `constant_controllers` WRITE;
/*!40000 ALTER TABLE `constant_controllers` DISABLE KEYS */;
INSERT INTO `constant_controllers` VALUES (1,'defaultPassword','abcd1234',NULL,NULL);
/*!40000 ALTER TABLE `constant_controllers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `daily_teacher_allocation`
--

DROP TABLE IF EXISTS `daily_teacher_allocation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `daily_teacher_allocation` (
  `daily_Teacher_AllocationId` bigint unsigned NOT NULL AUTO_INCREMENT,
  `classRoomId` int NOT NULL,
  `teacherId` int NOT NULL,
  `subjectId` int NOT NULL,
  `dayId` int NOT NULL,
  `hourId` int NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL,
  `subjectForSectionId` int NOT NULL,
  `batchId` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`daily_Teacher_AllocationId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `daily_teacher_allocation`
--

LOCK TABLES `daily_teacher_allocation` WRITE;
/*!40000 ALTER TABLE `daily_teacher_allocation` DISABLE KEYS */;
/*!40000 ALTER TABLE `daily_teacher_allocation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `days`
--

DROP TABLE IF EXISTS `days`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `days` (
  `dayId` bigint unsigned NOT NULL AUTO_INCREMENT,
  `dayName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`dayId`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `days`
--

LOCK TABLES `days` WRITE;
/*!40000 ALTER TABLE `days` DISABLE KEYS */;
INSERT INTO `days` VALUES (1,'Monday',1,NULL,NULL),(2,'Tuesday',1,NULL,NULL),(3,'Wednesday',1,NULL,NULL),(4,'Thursday',1,NULL,NULL),(5,'Friday',1,NULL,NULL),(6,'Saturday',1,NULL,NULL);
/*!40000 ALTER TABLE `days` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `departments` (
  `departmentId` bigint unsigned NOT NULL AUTO_INCREMENT,
  `departmentName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL,
  `batchId` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`departmentId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departments`
--

LOCK TABLES `departments` WRITE;
/*!40000 ALTER TABLE `departments` DISABLE KEYS */;
INSERT INTO `departments` VALUES (1,'Registered',1,1,NULL,NULL),(2,'Mechanical Engineering',1,1,NULL,NULL),(3,'Electrical Engineering',1,1,NULL,NULL),(4,'Civil Engineering',1,1,NULL,NULL);
/*!40000 ALTER TABLE `departments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `details`
--

DROP TABLE IF EXISTS `details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `details` (
  `detailId` bigint unsigned NOT NULL AUTO_INCREMENT,
  `sal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Mr./Ms.',
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int NOT NULL,
  `dob` date NOT NULL,
  `contactNumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alternateContactNumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `roleId` int NOT NULL,
  `userId` int NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `bloodGroup` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `identificationMark` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parentNumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `homePhoneNumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fatherSpouseName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `motherName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guardianName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `batchId` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`detailId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `details`
--

LOCK TABLES `details` WRITE;
/*!40000 ALTER TABLE `details` DISABLE KEYS */;
INSERT INTO `details` VALUES (1,'Mr./Ms.','Admin','Jr.',25,'2001-01-01','1234567893','9874563652',1,1,'45, Main Street, Tudor City','A +ve','None','9456231212','6541239541','Admin Sr.','Admin Mother','Admin Sr.',1,1,NULL,NULL),(2,'Mr./Ms.','Default Teacher','Jr.',25,'2001-01-01','1234567893','9874563652',2,2,'45, Fun Street, Day City','A +ve','None','9456231212','6541239541','Teacher Sr.','Teacher Mother','Teacher Sr.',1,1,NULL,NULL),(3,'Mr./Ms.','Default Student','Jr.',20,'2001-01-01','1234567893','9874563652',3,3,'45, Hola Street, Nehru City','A +ve','None','9456231212','6541239541','Student Sr.','Student Mother','Student Sr.',1,1,NULL,NULL),(4,'Mr./Ms.','Guest','Jr.',20,'2001-11-21','1234567893','9874563652',4,4,'45, Guest Street, Nehru City','A +ve','None','9456231212','6541239541','Guest Sr.','Guest Mother','Guest Sr.',1,1,NULL,NULL);
/*!40000 ALTER TABLE `details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entities`
--

DROP TABLE IF EXISTS `entities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `entities` (
  `entityId` bigint unsigned NOT NULL AUTO_INCREMENT,
  `entityName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entityForStatus` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`entityId`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entities`
--

LOCK TABLES `entities` WRITE;
/*!40000 ALTER TABLE `entities` DISABLE KEYS */;
INSERT INTO `entities` VALUES (1,'People',1,NULL,NULL),(2,'Admin',1,NULL,NULL),(3,'Teacher',1,NULL,NULL),(4,'Student',1,NULL,NULL),(5,'ClassRoom',1,NULL,NULL),(6,'Subject',1,NULL,NULL),(7,'Attendance',1,NULL,NULL),(8,'Student - Marks',1,NULL,NULL),(9,'Subject - Teachers',1,NULL,NULL),(10,'Constants',1,NULL,NULL),(11,'Student Subject Attendance',1,NULL,NULL),(12,'Teacher Daily Allocation',1,NULL,NULL),(13,'Priority',1,NULL,NULL),(14,'Batch',1,NULL,NULL),(15,'Day',1,NULL,NULL),(16,'Not - People',1,NULL,NULL),(17,'Hour',1,NULL,NULL),(18,'Department',1,NULL,NULL),(19,'Grade',1,NULL,NULL),(20,'Role',1,NULL,NULL),(21,'Section',1,NULL,NULL),(22,'Semester',1,NULL,NULL);
/*!40000 ALTER TABLE `entities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grades`
--

DROP TABLE IF EXISTS `grades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `grades` (
  `gradeId` bigint unsigned NOT NULL AUTO_INCREMENT,
  `grade` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL,
  `batchId` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`gradeId`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grades`
--

LOCK TABLES `grades` WRITE;
/*!40000 ALTER TABLE `grades` DISABLE KEYS */;
INSERT INTO `grades` VALUES (1,'Registered',1,1,NULL,NULL),(2,'Standard 1',1,1,NULL,NULL),(3,'Standard 2',1,1,NULL,NULL),(4,'Standard 3',1,1,NULL,NULL),(5,'Standard 4',1,1,NULL,NULL),(6,'Standard 5',1,1,NULL,NULL);
/*!40000 ALTER TABLE `grades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hours`
--

DROP TABLE IF EXISTS `hours`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hours` (
  `hourId` bigint unsigned NOT NULL AUTO_INCREMENT,
  `hourName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hourStartingTime` time NOT NULL,
  `hourEndingTime` time NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`hourId`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hours`
--

LOCK TABLES `hours` WRITE;
/*!40000 ALTER TABLE `hours` DISABLE KEYS */;
INSERT INTO `hours` VALUES (1,'1st Hour','08:00:00','09:00:00',1,NULL,NULL),(2,'2nd Hour','09:00:00','10:00:00',1,NULL,NULL),(3,'3rd Hour','10:00:00','11:00:00',1,NULL,NULL),(4,'4th Hour','11:00:00','12:00:00',1,NULL,NULL),(5,'5th Hour','12:00:00','13:00:00',1,NULL,NULL),(6,'6th Hour','13:00:00','14:00:00',1,NULL,NULL),(7,'7th Hour','14:00:00','15:00:00',1,NULL,NULL),(8,'8th Hour','15:00:00','16:00:00',1,NULL,NULL);
/*!40000 ALTER TABLE `hours` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2023_06_22_042001_create_admins_table',1),(6,'2023_06_22_042257_create_teachers_table',1),(7,'2023_06_22_042323_create_students_table',1),(8,'2023_06_22_042640_create_grades_table',1),(9,'2023_06_22_042659_create_sections_table',1),(10,'2023_06_22_042717_create_subjects_table',1),(11,'2023_06_22_042750_create_attendences_table',1),(12,'2023_06_22_044946_create_class_rooms_table',1),(13,'2023_06_22_050529_create_roles_table',1),(14,'2023_06_22_050555_create_details_table',1),(15,'2023_06_22_050640_create_security_facilities_table',1),(16,'2023_08_26_082501_semester',1),(17,'2023_08_26_083014_create_departments_table',1),(18,'2023_08_28_143428_create_student_marks_table',1),(19,'2023_09_01_062547_create_subject_teacher_for_each_sections_table',1),(20,'2023_09_01_145636_create_constant_controllers_table',1),(21,'2023_09_02_150836_create_student_subject_attendances_table',1),(22,'2023_09_03_132547_create_days_table',1),(23,'2023_09_03_132825_create_hours_table',1),(24,'2023_09_05_141238_daily_teacher_allocation',1),(25,'2023_09_08_045851_create_batches_table',1),(26,'2023_09_13_100012_create_statuses_table',1),(27,'2023_09_17_113119_create_todos_table',1),(28,'2023_09_20_045711_create_projects_table',1),(29,'2024_02_04_045558_create_priorities_table',1),(30,'2024_02_05_053804_create_timetables_table',1),(31,'2026_07_04_143506_create_entities_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `priority`
--

DROP TABLE IF EXISTS `priority`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `priority` (
  `priorityId` bigint unsigned NOT NULL AUTO_INCREMENT,
  `priorityName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priorityValue` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`priorityId`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `priority`
--

LOCK TABLES `priority` WRITE;
/*!40000 ALTER TABLE `priority` DISABLE KEYS */;
INSERT INTO `priority` VALUES (1,'Extremely Important',6,NULL,NULL),(2,'Very Important',5,NULL,NULL),(3,'Important',4,NULL,NULL),(4,'Moderately Important',3,NULL,NULL),(5,'Necessarily Important',2,NULL,NULL),(6,'Required',1,NULL,NULL);
/*!40000 ALTER TABLE `priority` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `projects` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects`
--

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `roleId` bigint unsigned NOT NULL AUTO_INCREMENT,
  `roleName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `entityId` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`roleId`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Admin',1,1,NULL,NULL),(2,'Teacher',1,1,NULL,NULL),(3,'Student',1,1,NULL,NULL),(4,'Guest',1,1,NULL,NULL),(5,'New User',1,1,NULL,NULL),(6,'Subject',1,2,NULL,NULL),(7,'Department',1,4,NULL,NULL),(8,'Semester',1,5,NULL,NULL),(9,'Grade',1,6,NULL,NULL),(10,'Section',1,7,NULL,NULL),(11,'Classroom',1,8,NULL,NULL),(12,'Details',1,9,NULL,NULL),(13,'Student Marks',1,10,NULL,NULL),(14,'Subject Teachers',1,11,NULL,NULL),(15,'Constants',1,12,NULL,NULL),(16,'Student Subject Attendance',1,13,NULL,NULL),(17,'Daily Teacher Allocation',1,14,NULL,NULL),(18,'Priority',1,15,NULL,NULL),(19,'Batch',1,16,NULL,NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sections`
--

DROP TABLE IF EXISTS `sections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sections` (
  `sectionId` bigint unsigned NOT NULL AUTO_INCREMENT,
  `sectionName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL,
  `batchId` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`sectionId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sections`
--

LOCK TABLES `sections` WRITE;
/*!40000 ALTER TABLE `sections` DISABLE KEYS */;
INSERT INTO `sections` VALUES (1,'Registered',1,1,NULL,NULL),(2,'Section A',1,1,NULL,NULL),(3,'Section B',1,1,NULL,NULL),(4,'Section C',1,1,NULL,NULL),(5,'Section D',1,1,NULL,NULL);
/*!40000 ALTER TABLE `sections` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `security_facilities`
--

DROP TABLE IF EXISTS `security_facilities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `security_facilities` (
  `securityId` bigint unsigned NOT NULL AUTO_INCREMENT,
  `detail1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `detail3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`securityId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `security_facilities`
--

LOCK TABLES `security_facilities` WRITE;
/*!40000 ALTER TABLE `security_facilities` DISABLE KEYS */;
/*!40000 ALTER TABLE `security_facilities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `semesters`
--

DROP TABLE IF EXISTS `semesters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `semesters` (
  `semesterId` bigint unsigned NOT NULL AUTO_INCREMENT,
  `semesterName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL,
  `batchId` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`semesterId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `semesters`
--

LOCK TABLES `semesters` WRITE;
/*!40000 ALTER TABLE `semesters` DISABLE KEYS */;
INSERT INTO `semesters` VALUES (1,'Registered',1,1,NULL,NULL),(2,'Semester 1',1,1,NULL,NULL),(3,'Semester 2',1,1,NULL,NULL),(4,'Semester 3',1,1,NULL,NULL),(5,'Semester 4',1,1,NULL,NULL);
/*!40000 ALTER TABLE `semesters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `statuses`
--

DROP TABLE IF EXISTS `statuses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `statuses` (
  `statusId` bigint unsigned NOT NULL AUTO_INCREMENT,
  `statusForEntity` int NOT NULL,
  `statusName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`statusId`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `statuses`
--

LOCK TABLES `statuses` WRITE;
/*!40000 ALTER TABLE `statuses` DISABLE KEYS */;
INSERT INTO `statuses` VALUES (1,1,'Registered',NULL,NULL),(2,1,'Created',NULL,NULL),(3,1,'Active',NULL,NULL),(4,1,'Inactive',NULL,NULL),(5,1,'Suspended',NULL,NULL),(6,1,'Deleted',NULL,NULL),(7,1,'Flagged',NULL,NULL),(8,2,'Registered',NULL,NULL),(9,2,'Created',NULL,NULL),(10,2,'Active',NULL,NULL),(11,2,'Inactive',NULL,NULL),(12,2,'Suspended',NULL,NULL),(13,2,'Deleted',NULL,NULL),(14,2,'Flagged',NULL,NULL),(15,3,'Registered',NULL,NULL),(16,3,'Created',NULL,NULL),(17,3,'Active',NULL,NULL),(18,3,'Inactive',NULL,NULL),(19,3,'Suspended',NULL,NULL),(20,3,'Deleted',NULL,NULL),(21,3,'Flagged',NULL,NULL),(22,4,'Registered',NULL,NULL),(23,4,'Created',NULL,NULL),(24,4,'Active',NULL,NULL),(25,4,'Inactive',NULL,NULL),(26,4,'Suspended',NULL,NULL),(27,4,'Deleted',NULL,NULL),(28,4,'Flagged',NULL,NULL),(29,4,'Assigned to a classroom',NULL,NULL),(30,4,'Not added to attendance table',NULL,NULL),(31,4,'Marklist not created',NULL,NULL),(32,4,'Absent',NULL,NULL),(33,4,'On leave',NULL,NULL),(34,5,'Created!',NULL,NULL),(35,5,'Active',NULL,NULL),(36,5,'Inactive!',NULL,NULL),(37,6,'Created!',NULL,NULL),(38,6,'Active',NULL,NULL),(39,6,'Inactive!',NULL,NULL),(40,14,'Batch Assigned CURRENT status',NULL,NULL),(41,14,'Batch removed CURRENT status',NULL,NULL),(42,5,'Classroom not assigned Room No',NULL,NULL),(43,5,'Classroom not assigned section',NULL,NULL),(44,5,'Classroom not assigned Grade',NULL,NULL),(45,5,'Classroom not assigned Semester',NULL,NULL),(46,5,'Classroom not assigned Department',NULL,NULL),(47,5,'Classroom not assigned Class Teacher',NULL,NULL),(48,7,'Classroom daily attendance list not generated',NULL,NULL),(49,7,'Attendance details not submitted',NULL,NULL),(50,7,'Daily attendance table not generated for student',NULL,NULL),(51,7,'Daily teacher/staff attendance list not generated',NULL,NULL),(52,8,'Student marklist table not generated',NULL,NULL),(53,8,'Student marklist table generated',NULL,NULL),(54,8,'Student marklist table filled and submitted',NULL,NULL),(55,11,'Student subjectwise attendance table not generated',NULL,NULL),(56,11,'Student subjectwise attendance table generated',NULL,NULL),(57,11,'Student subjectwise attendance table filled and submitted',NULL,NULL),(58,3,'Teacher assigned to each classoom',NULL,NULL),(59,9,'Subject teachers not assigned to each classes.',NULL,NULL),(60,4,'Student details not filled completely',NULL,NULL),(61,3,'Teacher details not filled completely',NULL,NULL),(62,2,'Admin details not filled completely',NULL,NULL),(63,15,'Day active',NULL,NULL),(64,17,'Hour active',NULL,NULL),(65,7,'Attendance details created',NULL,NULL),(66,7,'Attendance details submitted',NULL,NULL),(67,14,'Batch active',NULL,NULL),(68,7,'Daily teacher/staff attendance list generated',NULL,NULL),(69,18,'Department active',NULL,NULL),(70,19,'Grade active',NULL,NULL),(71,20,'Role active',NULL,NULL),(72,21,'Section active',NULL,NULL),(73,22,'Semester active',NULL,NULL),(74,7,'Daily teacher/staff attendance list deleted.',NULL,NULL);
/*!40000 ALTER TABLE `statuses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_marks`
--

DROP TABLE IF EXISTS `student_marks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `student_marks` (
  `student_marksId` bigint unsigned NOT NULL AUTO_INCREMENT,
  `userId` int NOT NULL,
  `studentId` int NOT NULL,
  `classRoomId` int NOT NULL,
  `subjectId` int NOT NULL,
  `marks` int NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `batchId` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`student_marksId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_marks`
--

LOCK TABLES `student_marks` WRITE;
/*!40000 ALTER TABLE `student_marks` DISABLE KEYS */;
/*!40000 ALTER TABLE `student_marks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_subject_attendances`
--

DROP TABLE IF EXISTS `student_subject_attendances`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `student_subject_attendances` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `classRoomId` int NOT NULL,
  `studentId` int NOT NULL,
  `date` date NOT NULL,
  `teacherId` int NOT NULL,
  `subjectId` int NOT NULL,
  `dayId` int NOT NULL,
  `hourId` int NOT NULL,
  `presentOrAbsent` int NOT NULL,
  `daily_Teacher_AllocationId` int NOT NULL,
  `status` int NOT NULL,
  `batchId` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_subject_attendances`
--

LOCK TABLES `student_subject_attendances` WRITE;
/*!40000 ALTER TABLE `student_subject_attendances` DISABLE KEYS */;
/*!40000 ALTER TABLE `student_subject_attendances` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `students` (
  `studentId` bigint unsigned NOT NULL AUTO_INCREMENT,
  `userId` int NOT NULL,
  `studentDetailsId` int NOT NULL,
  `studentClassroom` int NOT NULL,
  `studentGrade` int NOT NULL,
  `studentSection` int NOT NULL,
  `studentSemester` int NOT NULL,
  `studentDepartmentId` int NOT NULL,
  `status` int NOT NULL,
  `batchId` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`studentId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` VALUES (1,3,3,1,1,1,1,1,1,1,NULL,NULL);
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subject_teacher_for_each_sections`
--

DROP TABLE IF EXISTS `subject_teacher_for_each_sections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subject_teacher_for_each_sections` (
  `subjectForSectionId` bigint unsigned NOT NULL AUTO_INCREMENT,
  `teacherId` int NOT NULL,
  `classRoomId` int NOT NULL,
  `subjectId` int NOT NULL,
  `departmentId` int NOT NULL,
  `semesterId` int NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `batchId` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`subjectForSectionId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subject_teacher_for_each_sections`
--

LOCK TABLES `subject_teacher_for_each_sections` WRITE;
/*!40000 ALTER TABLE `subject_teacher_for_each_sections` DISABLE KEYS */;
INSERT INTO `subject_teacher_for_each_sections` VALUES (1,1,1,1,1,1,1,1,NULL,NULL);
/*!40000 ALTER TABLE `subject_teacher_for_each_sections` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subjects` (
  `subjectId` bigint unsigned NOT NULL AUTO_INCREMENT,
  `semesterId` int NOT NULL,
  `departmentId` int NOT NULL,
  `subjectName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subjectGrade` int NOT NULL,
  `subjectMaxMarks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subjectTextName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subjectCode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `torlab` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` int NOT NULL DEFAULT '3',
  `status` int NOT NULL,
  `batchId` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`subjectId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subjects`
--

LOCK TABLES `subjects` WRITE;
/*!40000 ALTER TABLE `subjects` DISABLE KEYS */;
INSERT INTO `subjects` VALUES (1,1,1,'Registered',1,'100','Registered Textbook','REG001','Theory',2,1,1,NULL,NULL);
/*!40000 ALTER TABLE `subjects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teachers`
--

DROP TABLE IF EXISTS `teachers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `teachers` (
  `teacherId` bigint unsigned NOT NULL AUTO_INCREMENT,
  `userId` int NOT NULL,
  `teacherDetailId` int NOT NULL,
  `status` int NOT NULL,
  `batchId` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`teacherId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teachers`
--

LOCK TABLES `teachers` WRITE;
/*!40000 ALTER TABLE `teachers` DISABLE KEYS */;
INSERT INTO `teachers` VALUES (1,2,2,1,1,NULL,NULL);
/*!40000 ALTER TABLE `teachers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `timetables`
--

DROP TABLE IF EXISTS `timetables`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `timetables` (
  `timetableId` bigint unsigned NOT NULL AUTO_INCREMENT,
  `dayId` int NOT NULL,
  `hourId` int NOT NULL,
  `classroomId` int NOT NULL,
  `oddOrEven` int NOT NULL DEFAULT '1',
  `semesterId` int NOT NULL DEFAULT '1',
  `teacherId` int NOT NULL DEFAULT '0',
  `subjectId` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`timetableId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `timetables`
--

LOCK TABLES `timetables` WRITE;
/*!40000 ALTER TABLE `timetables` DISABLE KEYS */;
/*!40000 ALTER TABLE `timetables` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `todos`
--

DROP TABLE IF EXISTS `todos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `todos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `todos`
--

LOCK TABLES `todos` WRITE;
/*!40000 ALTER TABLE `todos` DISABLE KEYS */;
/*!40000 ALTER TABLE `todos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `userId` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detailsId` int DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` int NOT NULL DEFAULT '4',
  `batchId` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`userId`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','admin@admin.com','2026-07-11 03:05:24','$2y$10$CEUNGqPaYQId5pg7I0l7iOcTcq4cTe0WPLwcPQh1uSCeN5sz61Ibe',1,'9845632151',1,1,'2026-07-11 03:05:24','2026-07-11 03:05:24',NULL),(2,'Teacher','teacher@teacher.com','2026-07-11 03:05:24','$2y$10$01WK5dP7VzC7Tlvz7F/gkO0zDO1NaeL9zLt701cbcrkVhwq3k9J3G',2,'9845632151',2,1,'2026-07-11 03:05:25','2026-07-11 03:05:25',NULL),(3,'Student','student@student.com','2026-07-11 03:05:25','$2y$10$WMvu4KCbZ2nsvsz9Hj.cTOMqYCUZHIJGeYUAXAbTsn5JWfII2b0yS',3,'9845632151',3,1,'2026-07-11 03:05:25','2026-07-11 03:05:25',NULL),(4,'Guest','guest@guest.com','2026-07-11 03:05:25','$2y$10$1sKaBkqMwdXsWu4EBT56CuT1FmRjvhLslkJDJnNZzxAPqv2Q0ySTW',4,'9845632151',4,1,'2026-07-11 03:05:25','2026-07-11 03:05:25',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
SET @@SESSION.SQL_LOG_BIN = @MYSQLDUMP_TEMP_LOG_BIN;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-07-11 14:06:39
