-- MySQL dump 10.13  Distrib 5.5.53, for Win32 (AMD64)
--
-- Host: localhost    Database: cishop
-- ------------------------------------------------------
-- Server version	5.5.53

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
-- Table structure for table `king_admin`
--

DROP TABLE IF EXISTS `king_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `king_admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `created_at` int(11) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `king_admin`
--

LOCK TABLES `king_admin` WRITE;
/*!40000 ALTER TABLE `king_admin` DISABLE KEYS */;
INSERT INTO `king_admin` VALUES (1,'admin','admin','admin@admin.com',0);
/*!40000 ALTER TABLE `king_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `king_category`
--

DROP TABLE IF EXISTS `king_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `king_category` (
  `cat_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品类别ID',
  `cat_name` varchar(30) NOT NULL DEFAULT '' COMMENT '商品类别名称',
  `parent_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '商品类别父ID',
  `cat_desc` varchar(255) NOT NULL DEFAULT '' COMMENT '商品类别描述',
  `sort_order` tinyint(4) NOT NULL DEFAULT '50' COMMENT '排序依据',
  `unit` varchar(15) NOT NULL DEFAULT '' COMMENT '单位',
  `is_show` tinyint(4) NOT NULL DEFAULT '1' COMMENT '是否显示，默认显示',
  PRIMARY KEY (`cat_id`),
  KEY `pid` (`parent_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `king_category`
--

LOCK TABLES `king_category` WRITE;
/*!40000 ALTER TABLE `king_category` DISABLE KEYS */;
INSERT INTO `king_category` VALUES (1,'手机类型',0,'',50,'',1),(2,'充值卡',0,'',50,'',1),(3,'手机配件',0,'',50,'',1),(4,'CDMA手机',1,'',50,'',1),(5,'3G手机',1,'',50,'',1),(6,'iphone 4s',5,'',50,'',1),(7,'联通手机充值卡',2,'',50,'',1),(8,'移动手机充值卡',2,'',50,'',1),(9,'耳机',3,'',50,'',1),(10,'电池',3,'',50,'',1);
/*!40000 ALTER TABLE `king_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `king_news`
--

DROP TABLE IF EXISTS `king_news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `king_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL DEFAULT '',
  `author` varchar(30) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `created_at` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `king_news`
--

LOCK TABLES `king_news` WRITE;
/*!40000 ALTER TABLE `king_news` DISABLE KEYS */;
INSERT INTO `king_news` VALUES (1,'','','',0),(2,'','','',1495597217),(3,'fdfd','sfwefwef','sfsdfsfd',1495598053);
/*!40000 ALTER TABLE `king_news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `king_region`
--

DROP TABLE IF EXISTS `king_region`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `king_region` (
  `cat_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品类别ID',
  `cat_name` varchar(30) NOT NULL DEFAULT '' COMMENT '商品类别名称',
  `parent_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '商品类别父ID',
  `cat_desc` varchar(255) NOT NULL DEFAULT '' COMMENT '商品类别描述',
  `sort_order` tinyint(4) NOT NULL DEFAULT '50' COMMENT '排序依据',
  `unit` varchar(15) NOT NULL DEFAULT '' COMMENT '单位',
  `is_show` tinyint(4) NOT NULL DEFAULT '1' COMMENT '是否显示，默认显示',
  PRIMARY KEY (`cat_id`),
  KEY `pid` (`parent_id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `king_region`
--

LOCK TABLES `king_region` WRITE;
/*!40000 ALTER TABLE `king_region` DISABLE KEYS */;
INSERT INTO `king_region` VALUES (20,'宝安',13,'',50,'',1),(19,'顺德',18,'',50,'',1),(18,'中山',11,'',50,'',1),(17,'广州',11,'',50,'',1),(16,'武昌',15,'',50,'',1),(15,'武汉',12,'',50,'',1),(14,'南山',13,'',50,'',1),(13,'深圳',11,'',50,'',1),(12,'湖北',0,'',50,'',1),(11,'广东',0,'',50,'',1);
/*!40000 ALTER TABLE `king_region` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-05-25 18:18:39
