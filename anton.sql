-- MySQL dump 10.13  Distrib 5.7.24, for Linux (x86_64)
--
-- Host: localhost    Database: anton
-- ------------------------------------------------------
-- Server version	5.7.24-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `cat_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`cat_id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (11,'Cryptography'),(8,'Cyber Security'),(7,'Programming'),(9,'Quiz'),(10,'Treasure Hunt');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `challenges`
--

DROP TABLE IF EXISTS `challenges`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `challenges` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `flag` varchar(100) NOT NULL,
  `score` int(10) NOT NULL,
  `file` varchar(500) DEFAULT NULL,
  `cat_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cat_id` (`cat_id`),
  CONSTRAINT `challenges_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `challenges`
--

LOCK TABLES `challenges` WRITE;
/*!40000 ALTER TABLE `challenges` DISABLE KEYS */;
INSERT INTO `challenges` VALUES (9,'Longest of names','From the given file with list of random names, print the name which has maximum number of characters in it. <br/> <br/>\r\n<a href=\"https://raw.githubusercontent.com/dominictarr/random-name/master/first-names.txt\" download>Download file</a>','Anne-Corinne',100,NULL,7),(10,'The Vowel challenge','Find the number of vowels in the given txt file.<br/><br/>\r\n<a href=\"https://gist.githubusercontent.com/nithin-thomaz/1fb61b3c735c818dd6f0c504d5be1be0/raw/cf17a38c3828158c59841b2e9479e76ee5bdca33/sample.txt\" download>Sample.txt</a>','2891',200,NULL,7),(11,'Lengthiest line finder','Find the line number which has maximum number of characters excluding special characters and numbers.<br/><br/>\r\n<a href=\"https://gist.githubusercontent.com/nithin-thomaz/926baf26f938365338ea11f5b9cda745/raw/1d55d1beb0348b7beea7185ab6ab887f127c6850/text.txt\" download>Download file</a>','52',250,NULL,7),(12,'Give the output','Predict the output for the given code snippet:<br/>\r\n<pre><code class=\"c\">\r\n#include<stdio.h> \r\nint main() \r\n{ \r\n    int a=0; \r\n    a=a++ + a++ - a++ + ++a; \r\n    printf(\"%d\\n\", a); \r\n    return 0; \r\n} \r\n</code>\r\n','3',100,NULL,9),(13,'Guess the answer','Predict the output for the given code snippet:<br/>\r\n<pre><code class=\"c\">\r\n#include<stdio.h> \r\nunion student \r\n{ \r\n    int y[34]; \r\n    char var2[7]; \r\n    char arr[8]; \r\n    char ch[5]; \r\n}; \r\nint main() \r\n{ \r\n    union student st; \r\n    printf(\"%d\", sizeof(union student)); \r\n    return 0; \r\n} \r\n</code></pre>','136',100,NULL,9),(15,'Crack the password','Bob turned 18 on June 2018, his pet is a cat named litchi. Bob doesn\'t frequently change his password. Find Bob\'s password if it only contains lower-case letters and numbers.','bob18litchi',200,NULL,8),(16,'What is my name!','Creating a fake website that looks nearly identical to a real website in order to trick users into entering their login information comes under which category of attack.','phishing',100,NULL,8),(17,'Offset Decoding','Decode the following word which is encrypted with simple offset.<br/>\r\nHint : Its an Animal\r\n\r\n<br/>\r\n<pre><code>\r\nUjhfs\r\n</code></pre>','Tiger',100,NULL,11),(18,'Decode the Message','Decode the following message<br/> \r\nHint: Base 8 and Base 2\r\n<br/>\r\n<a href=\"https://gist.githubusercontent.com/haxzie/b8cdf153e62d9a4d499c836bb7e414f8/raw/95e2e40e80aeccbf8c4fedd99c55405bae2e9f24/code.txt\" download>Download file</a>\r\n\r\n','HelloWorld',200,NULL,11),(19,'Find the Name','Find the name of the pet dog of this famous YouTuber who has the most subscribed YouTube channel in the world.\r\n<br/>\r\nhint: Dog is black.','edgar',150,NULL,9),(20,'Find the Domain','Find the first domain this famous entrepreneur brought for his startup in 1999. Which grew as one of the world\'s most famous payment network.\r\n\r\nHint:  He was born in June 28, 1971','x.com',200,NULL,9),(21,'Reveal the Key','If the key is 2, the Cleartext \"A\" would become \"C\", \"B\" would become \"D\" and so on. Find the key if the Ciphertext for \"APPLE\" is \"EUVSM\".','45678',100,NULL,11),(22,'Complete the code','In the given code segment, fill the right declaration in place of \'?\' to make it error free.\r\n<br/>\r\n<pre><code class=\"c\">\r\n#include <stdio.h> \r\nint main() \r\n{ \r\n    int x = 10, *y,  ?  ; \r\n    y = &x; \r\n    z = &y; \r\n    printf(\"The code is error free\"); \r\n    return 0; \r\n} \r\n</code>\r\n','**z',100,NULL,7),(23,'Who is missing','Given a password string of numbers in sequential order. Find the missing number.<br/>\r\n<br/>\r\n9899100101105107109','103',100,NULL,8),(24,'What\'s the quotient ','Divide (HAPPY)26 by (SAD)26. The quotient will be.','KD',200,NULL,11),(25,'What do they call me','A network or a group of computers which are affected by malware and are being constantly monitored by a server which throws the command.','botnet',100,NULL,8);
/*!40000 ALTER TABLE `challenges` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `scoreboard`
--

DROP TABLE IF EXISTS `scoreboard`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `scoreboard` (
  `s_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `c_id` int(10) NOT NULL,
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`s_id`,`user_id`,`c_id`),
  KEY `user_id` (`user_id`),
  KEY `c_id` (`c_id`),
  CONSTRAINT `scoreboard_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `scoreboard_ibfk_2` FOREIGN KEY (`c_id`) REFERENCES `challenges` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `scoreboard`
--

LOCK TABLES `scoreboard` WRITE;
/*!40000 ALTER TABLE `scoreboard` DISABLE KEYS */;
INSERT INTO `scoreboard` VALUES (13,5,16,'2018-11-29 08:38:21'),(14,5,12,'2018-11-29 08:41:24'),(15,5,13,'2018-11-29 08:42:12'),(16,9,18,'2018-11-29 08:46:20'),(17,2,21,'2018-12-03 06:21:08'),(18,10,23,'2018-12-03 06:22:43'),(19,10,22,'2018-12-03 06:23:04'),(20,11,12,'2018-12-03 06:24:35'),(21,11,19,'2018-12-03 06:25:05'),(22,12,25,'2018-12-03 06:26:28'),(23,12,20,'2018-12-03 06:26:46'),(24,12,21,'2018-12-03 06:27:04'),(25,12,24,'2018-12-03 06:27:44'),(26,14,16,'2018-12-03 06:30:04'),(27,14,25,'2018-12-03 06:30:16'),(28,14,15,'2018-12-03 06:30:36'),(29,14,22,'2018-12-03 06:31:03'),(30,14,20,'2018-12-03 06:31:42'),(31,15,11,'2018-12-03 06:33:28'),(32,16,17,'2018-12-03 06:36:31'),(33,16,18,'2018-12-03 06:38:01'),(34,16,25,'2018-12-03 06:38:17'),(35,16,16,'2018-12-03 06:38:29'),(36,16,11,'2018-12-03 06:38:46'),(37,16,12,'2018-12-03 06:39:04'),(38,17,19,'2018-12-03 06:52:13');
/*!40000 ALTER TABLE `scoreboard` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `role` varchar(10) DEFAULT 'user',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Musthaq Ahamad','musthu.gm@gmail.com','123456','admin'),(2,'Rahul N','rahulnnambiar97@gmail.com','rachana2012','user'),(3,'nithin','n@n.n','1234','user'),(4,'hari','1997hari@gmail.com','12345','user'),(5,'Musthaq Ahamad','h4xz13@gmail.com','123456','user'),(6,'Nishan','nish@gmail.com','123456','user'),(7,'haxzie','haxzieboi123@sosc.com','thisisuseless','user'),(8,'nithin','nithin@gmail.com','','user'),(9,'nithin','nithin001@gmail.com','123456','user'),(10,'Hari','hari@gmail.com','12345','user'),(11,'Lalith','lalith@gmail.com','12345','user'),(12,'Maneesh','maneesh@gmail.com','12345','user'),(13,'Ram','ram@gmail.com','12345','user'),(14,'Akash','akash@gmail.com','12345','user'),(15,'Mohan','mohan@gmail.com','12345','user'),(16,'Nithin Thomas','nithin0@gmail.com','12345','user'),(17,'Rahil','rahil@gmail.com','12345','user');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `visitors`
--

DROP TABLE IF EXISTS `visitors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `visitors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `message` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `visitors`
--

LOCK TABLES `visitors` WRITE;
/*!40000 ALTER TABLE `visitors` DISABLE KEYS */;
INSERT INTO `visitors` VALUES (1,'Rahul Nambiar','rahulnnambiar97@gmail.com','Hello\r\nHai'),(2,'Nithin','niths@ggmg.com','Hello, I am facing problem in finding my account please do the needful.');
/*!40000 ALTER TABLE `visitors` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-12-03 12:28:45
