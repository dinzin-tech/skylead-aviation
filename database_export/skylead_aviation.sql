-- MySQL dump 10.13  Distrib 8.0.38, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: skylead_aviation
-- ------------------------------------------------------
-- Server version	8.0.39

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
-- Table structure for table `aircraft`
--

DROP TABLE IF EXISTS `aircraft`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `aircraft` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `registration_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `capacity` int DEFAULT NULL,
  `range` int DEFAULT NULL,
  `cruise_speed` int DEFAULT NULL,
  `manufacturer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year_manufactured` int DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `sort_order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `aircraft_is_active_index` (`is_active`),
  KEY `aircraft_sort_order_index` (`sort_order`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aircraft`
--

LOCK TABLES `aircraft` WRITE;
/*!40000 ALTER TABLE `aircraft` DISABLE KEYS */;
INSERT INTO `aircraft` VALUES (1,'Cessna 172',NULL,NULL,'The Cessna 172 Skyhawk is an American four-seat, single-engine, high wing, fixed-wing aircraft made by the Cessna Aircraft Company.','aircrafts/m69uvL2KmzpnBD1DoFmvB3yBdE5KXOxMH1AU98Pq.webp',NULL,NULL,NULL,NULL,NULL,1,0,'2025-10-25 22:58:50','2025-10-25 22:58:50'),(2,'Tecnam P2006',NULL,NULL,'The Tecnam P2006 is a single-engine, high-wing two-seat aircraft built in Italy but aimed at the US market.','aircrafts/5Rq9nZbxlckUk2V3shDCRUkBeC93UgBTm0NFE8gR.webp',NULL,NULL,NULL,NULL,NULL,1,0,'2025-10-25 22:59:48','2025-10-25 22:59:48'),(3,'Tecnam P2008',NULL,NULL,'The Tecnam P2008 is a single-engine, high-wing two-seat aircraft built in Italy but aimed at the US market.','aircrafts/KfZnT8fWRyp2jZ3IbkDCv2TonzATWmRVIkVjjZKe.webp',NULL,NULL,NULL,NULL,NULL,1,0,'2025-10-25 23:00:41','2025-10-25 23:00:41');
/*!40000 ALTER TABLE `aircraft` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blogs`
--

DROP TABLE IF EXISTS `blogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `blogs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `published_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `blogs_slug_unique` (`slug`),
  KEY `blogs_user_id_foreign` (`user_id`),
  CONSTRAINT `blogs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blogs`
--

LOCK TABLES `blogs` WRITE;
/*!40000 ALTER TABLE `blogs` DISABLE KEYS */;
INSERT INTO `blogs` VALUES (1,'this is a test','this-is-a-test','test','<p>test</p>','Test',NULL,NULL,NULL,0,NULL,2,'2025-10-22 21:34:37','2025-10-22 21:34:37');
/*!40000 ALTER TABLE `blogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contacts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacts`
--

LOCK TABLES `contacts` WRITE;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `countries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL,
  `flag_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `countries_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `countries`
--

LOCK TABLES `countries` WRITE;
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;
INSERT INTO `countries` VALUES (1,'India',22.10928800,78.59233300,'flags/sRv084dKWlOej9aMswIqWHNASgQEO7rbp1oprN0C.png',1,'2025-10-25 21:20:50','2025-10-25 21:20:50'),(2,'United States of America',39.43417415,-102.72378059,'flags/g0v670e0Zu2LNiWUGJSMreFUJsboPVMuAkbTiVdV.png',1,'2025-10-25 21:23:12','2025-10-25 21:23:12');
/*!40000 ALTER TABLE `countries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `courses` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'regular_course',
  `program_tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `program_level` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hero_description` text COLLATE utf8mb4_unicode_ci,
  `hero_description_1` text COLLATE utf8mb4_unicode_ci,
  `hero_description_2` text COLLATE utf8mb4_unicode_ci,
  `benefits` json DEFAULT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` decimal(3,1) NOT NULL DEFAULT '0.0',
  `number_of_students` int NOT NULL DEFAULT '0',
  `video_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hero_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `requirements` json DEFAULT NULL,
  `selection_process` json DEFAULT NULL,
  `training_stages` json DEFAULT NULL,
  `objectives` text COLLATE utf8mb4_unicode_ci,
  `eligibility` text COLLATE utf8mb4_unicode_ci,
  `outline` json DEFAULT NULL,
  `fee` decimal(10,2) NOT NULL DEFAULT '0.00',
  `available_seats` int NOT NULL DEFAULT '0',
  `schedule` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating_categories` json DEFAULT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `courses_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courses`
--

LOCK TABLES `courses` WRITE;
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
INSERT INTO `courses` VALUES (1,'This is a test Course','this-is-a-test-course','regular_course','Air Asia','intermediate','This is a hero description','Hero Desc 1','Hero Desc 2','[]','4',4.0,34,NULL,NULL,'[{\"icon\": \"ti-user\", \"title\": \"18\", \"description\": \"age\"}]','[{\"icon\": \"ti-file\", \"title\": \"Test\", \"description\": \"test\"}]','[{\"title\": \"test\", \"description\": \"test\", \"stageNumber\": \"1\"}]',NULL,NULL,'[{\"link\": \"#\", \"title\": \"Test intro\"}]',0.00,0,NULL,NULL,1,'2025-11-11 21:57:15','2025-11-11 21:59:27');
/*!40000 ALTER TABLE `courses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `destination_flying_school`
--

DROP TABLE IF EXISTS `destination_flying_school`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `destination_flying_school` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `destination_id` bigint unsigned NOT NULL,
  `flying_school_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `destination_flying_school_destination_id_flying_school_id_unique` (`destination_id`,`flying_school_id`),
  KEY `destination_flying_school_flying_school_id_foreign` (`flying_school_id`),
  CONSTRAINT `destination_flying_school_destination_id_foreign` FOREIGN KEY (`destination_id`) REFERENCES `destinations` (`id`) ON DELETE CASCADE,
  CONSTRAINT `destination_flying_school_flying_school_id_foreign` FOREIGN KEY (`flying_school_id`) REFERENCES `flying_schools` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `destination_flying_school`
--

LOCK TABLES `destination_flying_school` WRITE;
/*!40000 ALTER TABLE `destination_flying_school` DISABLE KEYS */;
INSERT INTO `destination_flying_school` VALUES (1,1,1,NULL,NULL),(2,2,1,NULL,NULL),(3,3,1,NULL,NULL);
/*!40000 ALTER TABLE `destination_flying_school` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `destinations`
--

DROP TABLE IF EXISTS `destinations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `destinations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_of_schools` int NOT NULL DEFAULT '0',
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` json DEFAULT NULL,
  `guide` json DEFAULT NULL,
  `gallery` json DEFAULT NULL,
  `advantages` json DEFAULT NULL,
  `courses_offered` json DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `sort_order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `destinations_slug_unique` (`slug`),
  KEY `destinations_slug_index` (`slug`),
  KEY `destinations_is_active_index` (`is_active`),
  KEY `destinations_sort_order_index` (`sort_order`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `destinations`
--

LOCK TABLES `destinations` WRITE;
/*!40000 ALTER TABLE `destinations` DISABLE KEYS */;
INSERT INTO `destinations` VALUES (1,'united-states-of-america','United States of America','The United States of America','testing',1,'United States of America','[]',NULL,'[]',NULL,'[{\"icon\": \"fas fa-plane\", \"logo\": \"\", \"title\": \"Test\", \"subtitle\": \"testing course\", \"description\": \"test desc\"}, {\"icon\": \"fas fa-plane\", \"logo\": \"\", \"title\": \"Another Course\", \"subtitle\": \"Another course\", \"description\": \"This is a test\"}]',1,0,'2025-10-26 23:19:02','2025-11-09 03:26:23'),(2,'india','India','Commercial Pilot Training in the India','The India is the world\'s leading destination for international students looking to undertake Commercial Pilot Training, with the country continuing to dominate the rankings thanks to its wide choice of exciting study and flight training options.',1,'India','[\"destinations/images/E6DieRBFUHePx6OqXlKtMb9fwXW1lI9hAbLJE0VC.jpg\", \"destinations/images/tfRzsAHQIddD4Esp4v8nBtLNkBV1v39Qt9TO2kTN.jpg\", \"destinations/images/WpmnSXMv9wleM41O7CIO2OCG9PWT8h8ENo8pw7pH.jpg\", \"destinations/images/BaakJqOwKnNIUu6ReFH3sV4LxcMIBMIb08Mnql3Z.jpg\"]','[{\"title\": \"test\", \"value\": \"desc\"}, {\"title\": \"test 2\", \"value\": \"desc\"}, {\"title\": \"test 3\", \"value\": \"desc 3\"}]','[\"destinations/gallery/58lmK5LDgizMwmdUiASix4ltsa31NyMF9Qw9W0ak.jpg\", \"destinations/gallery/NuhnvmdsYRV3UgCpvGSfJfuYNXeTyTLSG6skJyk3.jpg\", \"destinations/gallery/0Xbl90fK5besawgqVg07iqVtJgJ29YUFEPftBPYY.jpg\", \"destinations/gallery/8qzmr2DxRQtVpzU4BYB0ukZjHStEEIz0knNL7U9r.jpg\"]','[\"testing 1\", \"testing 2\", \"testing 3\", \"testing 4\"]','[{\"icon\": \"fas fa-plane\", \"logo\": \"destinations/course-logos/dAuV6fhzcBMiHBkzSiBWrHLgyBr4uw0Op4q9w5n6.png\", \"title\": \"test\", \"subtitle\": \"test sb\", \"description\": \"testing desc\"}]',1,0,'2025-11-11 09:15:58','2025-11-11 09:15:58'),(3,'india-test','India','Commercial Pilot Training in the India','The India is the world\'s leading destination for international students looking to undertake Commercial Pilot Training, with the country continuing to dominate the rankings thanks to its wide choice of exciting study and flight training options.',1,'India','[\"destinations/images/uCgzbqnCmgaVmaneH81apktJBFrjNKbXklnBmUnb.jpg\", \"destinations/images/PwPM8x0iuIH0lQpx5uXgZoUsZFuzUvQd7QtUbKOV.jpg\", \"destinations/images/Yt8037CaUjzvFyuxrZzIpdyYa3hAOyekU25anjj9.jpg\", \"destinations/images/rNynYgOK5gHnCeiHXOrTEA5ZVXh3ioc7RAgUXSz7.jpg\"]','[{\"title\": \"test\", \"value\": \"desd\"}, {\"title\": \"test\", \"value\": \"desc\"}]','[\"destinations/gallery/0ssYUO4KW43D9OeeKdoH6WyOqmJyCxNGp53nw7Nw.jpg\", \"destinations/gallery/tQCe6tqagCqRa3AYc09N3rIl7JHvDTaU5BDLUZWA.jpg\"]','[\"testing 1\", \"testing 2\"]','[{\"icon\": \"fas fa-plane\", \"logo\": \"destinations/course-logos/1hnpjMRSH1t2P1HsKHn01PL2Si29SUs5zPB4e0Mp.png\", \"title\": \"Test title\", \"subtitle\": \"sub test\", \"description\": \"cs desc\"}]',1,0,'2025-11-11 09:17:39','2025-11-11 09:17:39');
/*!40000 ALTER TABLE `destinations` ENABLE KEYS */;
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
-- Table structure for table `flying_school_aircraft`
--

DROP TABLE IF EXISTS `flying_school_aircraft`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `flying_school_aircraft` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `flying_school_id` bigint unsigned NOT NULL,
  `aircraft_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `flying_school_aircraft_flying_school_id_aircraft_id_unique` (`flying_school_id`,`aircraft_id`),
  KEY `flying_school_aircraft_aircraft_id_foreign` (`aircraft_id`),
  CONSTRAINT `flying_school_aircraft_aircraft_id_foreign` FOREIGN KEY (`aircraft_id`) REFERENCES `aircraft` (`id`) ON DELETE CASCADE,
  CONSTRAINT `flying_school_aircraft_flying_school_id_foreign` FOREIGN KEY (`flying_school_id`) REFERENCES `flying_schools` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `flying_school_aircraft`
--

LOCK TABLES `flying_school_aircraft` WRITE;
/*!40000 ALTER TABLE `flying_school_aircraft` DISABLE KEYS */;
INSERT INTO `flying_school_aircraft` VALUES (1,1,1,NULL,NULL),(2,1,2,NULL,NULL);
/*!40000 ALTER TABLE `flying_school_aircraft` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `flying_schools`
--

DROP TABLE IF EXISTS `flying_schools`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `flying_schools` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` bigint unsigned NOT NULL,
  `course_duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fleet_size` int DEFAULT NULL,
  `flying_hours` int DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `sort_order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `flying_schools_country_id_index` (`country_id`),
  KEY `flying_schools_is_active_index` (`is_active`),
  KEY `flying_schools_sort_order_index` (`sort_order`),
  CONSTRAINT `flying_schools_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `flying_schools`
--

LOCK TABLES `flying_schools` WRITE;
/*!40000 ALTER TABLE `flying_schools` DISABLE KEYS */;
INSERT INTO `flying_schools` VALUES (1,'Flying School I','Florida USA',2,'10 to 12 Months',26,260,NULL,1,0,'2025-10-25 23:45:46','2025-10-25 23:45:46');
/*!40000 ALTER TABLE `flying_schools` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `global_destinations`
--

DROP TABLE IF EXISTS `global_destinations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `global_destinations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `country_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `introduction` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `regulatory_body` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_hours_required` int NOT NULL,
  `training_steps` json NOT NULL,
  `flying_hours_breakdown` json NOT NULL,
  `advantages` json NOT NULL,
  `images` json DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `sort_order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `global_destinations_slug_unique` (`slug`),
  KEY `global_destinations_slug_index` (`slug`),
  KEY `global_destinations_is_active_index` (`is_active`),
  KEY `global_destinations_sort_order_index` (`sort_order`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `global_destinations`
--

LOCK TABLES `global_destinations` WRITE;
/*!40000 ALTER TABLE `global_destinations` DISABLE KEYS */;
INSERT INTO `global_destinations` VALUES (1,'India','india','Commercial Pilot Training Pathway in the USA (for Indian Students)','The FAA (Federal Aviation Administration) governs pilot training in the USA. To get an FAA Commercial Pilot Licence (CPL), you need a minimum of 250 flying hours.','Federal Aviation Administration',250,'[{\"hours\": \"10\", \"title\": \"Student Pilot Certificate (FAA SPL)\", \"description\": \"• Issued after FAA medical + TSA approval (for foreign students).\\r\\n• No flying hours yet, but this certificate allows you to start actual flight training.\"}, {\"hours\": \"20\", \"title\": \"Private Pilot Licence (PPL – FAA)\", \"description\": \"•\\tFoundation of flight training – learning to fly small single-engine aircraft.\\r\\n•\\tMinimum 40 hours required by FAA (realistically 55–60 hrs for most students):\\r\\no\\t20 hours Dual Instruction (with instructor)\\r\\no\\t10 hours Solo Flight (independent flying)\\r\\no\\t5 hours Cross-Country Solo (navigating between airports >50 NM)\\r\\no\\t3 hours Night Flying (including 10 take-offs & landings)\\r\\no\\t3 hours Instrument Training (introduction to flying by reference to instruments)\\r\\n\\r\\nBy end of PPL: You can fly as Pilot-in-Command (PIC) of small aircraft, but not for commercial purposes.\"}, {\"hours\": \"40\", \"title\": \"Instrument Rating (IR)\", \"description\": \"•\\tAllows flying in Instrument Meteorological Conditions (IMC), i.e., when visibility is poor and flying is based only on instruments.\\r\\n•\\t40 hours of Instrument Time (on simulator + aircraft)\\r\\no\\tAt least 15 hours with instructor\\r\\no\\tThe rest can be a mix of simulator and actual aircraft flying\\r\\no\\tTraining includes approaches, holding patterns, and IFR cross-country flights\\r\\n✅ Crucial for airline-level flying and international standards.\"}]','[{\"hours\": \"40 hours\", \"notes\": \"Usually ~55–60 hrs in practice\", \"stage\": \"Private Pilot Licence (PPL)\"}, {\"hours\": \"20 hours\", \"notes\": \"Basic maneuvers, take-off/landing\", \"stage\": \"Dual Instruction\"}, {\"hours\": \"10 hours\", \"notes\": \"Independent Flying\", \"stage\": \"Solo\"}]','[\"1.\\tFaster Training: 300+ flying days a year (Florida, Arizona, California), finishing CPL in 12–18 months vs 2–3 years in India.\", \"2.\\tHigher Flying Hours: FAA CPL requires 250 hrs vs 200 hrs in India, giving you extra experience.\", \"Modern Aircraft & Tech: Cessna 172 G1000, Piper, Diamond → glass cockpit experience.\", \"International Exposure: Training in busy US airspaces builds world-class ATC communication skills.\"]','[\"global-destinations/fSqMnJmZRbKAM0PCXbtVMO7IahjreA6ws955UDos.jpg\", \"global-destinations/4yCkjIh5RAPOKStAYWVQpqCO2VJurgXHVzE0RHCk.jpg\", \"global-destinations/ftVRZhEuBNFiT9XxIKf4Ia5MDmu1xYdlZADsphHs.jpg\", \"global-destinations/V3k9Ne7e1DkFD1Ze4JSD0hQJOnLmJRkoWfbjlnuJ.jpg\"]',1,0,'2025-11-12 03:21:13','2025-11-12 03:21:13');
/*!40000 ALTER TABLE `global_destinations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2025_09_01_195538_create_permission_tables',1),(5,'2025_09_01_212624_create_posts_table',1),(6,'2025_09_06_183904_create_blogs_table',1),(7,'2025_09_07_074535_create_volunteers_table',1),(8,'2025_09_09_034843_create_contacts_table',1),(9,'2025_09_09_160756_create_donations_table',1),(10,'2025_09_09_192436_create_galleries_table',1),(11,'2025_09_11_201219_create_hero_content_table',1),(12,'2025_09_12_160942_create_events_table',1),(13,'2025_09_13_085014_update_hero_content_video_to_youtube_url',1),(14,'2025_09_27_183008_drop_unwanted_tables',2),(15,'2025_10_26_022716_create_countries_table',3),(17,'2025_10_26_041442_create_aircrafts_table',4),(20,'2025_10_26_044410_create_flying_schools_table',5),(21,'2025_10_26_065550_create_page_sections_table',6),(22,'2025_10_26_065642_create_section_elements_table',6),(23,'2025_10_26_070504_create_pages_table',7),(24,'2025_10_27_043304_create_destinations_table',8),(25,'2025_11_07_102614_create_courses_table',9),(26,'2025_11_10_150308_add_cadet_program_fields_to_courses_table',10),(27,'2025_11_12_083032_create_global_destinations_table',11);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` VALUES (1,'App\\Models\\User',2);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `page_sections`
--

DROP TABLE IF EXISTS `page_sections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `page_sections` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `page_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section_header` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section_description` text COLLATE utf8mb4_unicode_ci,
  `sort_order` int NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `background_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `layout_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `page_sections_page_name_sort_order_index` (`page_name`,`sort_order`),
  KEY `page_sections_is_active_index` (`is_active`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `page_sections`
--

LOCK TABLES `page_sections` WRITE;
/*!40000 ALTER TABLE `page_sections` DISABLE KEYS */;
INSERT INTO `page_sections` VALUES (1,'about-us','hero-section','This is Hero Section Test','This si to test hero section in about page',0,1,'#ffffff','#000000','hero','2025-11-09 03:50:29','2025-11-09 03:50:29');
/*!40000 ALTER TABLE `page_sections` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `show_in_menu` tinyint(1) NOT NULL DEFAULT '1',
  `menu_order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pages_slug_unique` (`slug`),
  KEY `pages_slug_index` (`slug`),
  KEY `pages_is_active_index` (`is_active`),
  KEY `pages_show_in_menu_index` (`show_in_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages`
--

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` VALUES (1,'About Us','about-us','About - Skylead Aviation Academy',NULL,1,1,0,'2025-11-09 03:49:26','2025-11-09 03:49:26');
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin','web','2025-10-22 21:08:53','2025-10-22 21:08:53');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `section_elements`
--

DROP TABLE IF EXISTS `section_elements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `section_elements` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `page_section_id` bigint unsigned NOT NULL,
  `element_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon_class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `button_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'primary',
  `sort_order` int NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `custom_styles` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `section_elements_page_section_id_sort_order_index` (`page_section_id`,`sort_order`),
  KEY `section_elements_element_type_index` (`element_type`),
  KEY `section_elements_is_active_index` (`is_active`),
  CONSTRAINT `section_elements_page_section_id_foreign` FOREIGN KEY (`page_section_id`) REFERENCES `page_sections` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `section_elements`
--

LOCK TABLES `section_elements` WRITE;
/*!40000 ALTER TABLE `section_elements` DISABLE KEYS */;
/*!40000 ALTER TABLE `section_elements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('8nlZ99vk0gzlXRKf6DEA08lMlb9CM5rULpOsAyyT',2,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiaElWeHUxcld0NGNoc2RmcEdQeXNUSDJuaDZ3cEVOa05kbkJERWlFdyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9nbG9iYWwtZGVzdGluYXRpb25zL2luZGlhIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mjt9',1762952613);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Test User','test@example.com','2025-10-22 21:07:20','$2y$12$BpzmaeExrxlusk3x/aShF.530A3s1XvkoWD5pLkc515aWlxbd/eEq','kzb3vBJDhL','2025-10-22 21:07:21','2025-10-22 21:07:21'),(2,'Admin User','admin@example.com',NULL,'$2y$12$zxosk1bEuYRBaNUtdcbqAe0lIGPMNswCWkY/DEB5By2DuXuLosIjy','nWWzLyKtrd5gDLESblM2SqPA07uwFY9tn276hLhoahaoTf8rBxmQAqMrednE','2025-10-22 21:08:53','2025-10-22 21:08:53');
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

-- Dump completed on 2025-11-12 18:37:37
