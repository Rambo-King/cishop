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
-- Table structure for table `king_attribute`
--

DROP TABLE IF EXISTS `king_attribute`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `king_attribute` (
  `attr_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品属性ID',
  `attr_name` varchar(50) NOT NULL DEFAULT '' COMMENT '商品属性名称',
  `type_id` smallint(6) NOT NULL DEFAULT '0' COMMENT '商品属性所属类型ID',
  `attr_type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '属性是否可选 0 为唯一，1为单选，2为多选',
  `attr_input_type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '属性录入方式 0为手工录入，1为从列表中选择，2为文本域',
  `attr_value` text COMMENT '属性的值',
  `sort_order` tinyint(4) NOT NULL DEFAULT '50' COMMENT '属性排序依据',
  PRIMARY KEY (`attr_id`),
  KEY `type_id` (`type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `king_attribute`
--

LOCK TABLES `king_attribute` WRITE;
/*!40000 ALTER TABLE `king_attribute` DISABLE KEYS */;
INSERT INTO `king_attribute` VALUES (1,'COLOR',2,0,0,NULL,50),(2,'SIZE',2,0,1,'S\r\nM\r\nL\r\nXL\r\nXXL\r\n',50),(3,'STYLE',2,0,0,NULL,50),(4,'AUTHOR',3,0,0,NULL,50);
/*!40000 ALTER TABLE `king_attribute` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `king_brand`
--

DROP TABLE IF EXISTS `king_brand`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `king_brand` (
  `brand_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品品牌ID',
  `brand_name` varchar(30) NOT NULL DEFAULT '' COMMENT '商品品牌名称',
  `brand_desc` varchar(255) NOT NULL DEFAULT '' COMMENT '商品品牌描述',
  `site_url` varchar(100) NOT NULL DEFAULT '' COMMENT '商品品牌网址',
  `logo` varchar(50) NOT NULL DEFAULT '' COMMENT '品牌logo',
  `sort_order` tinyint(3) unsigned NOT NULL DEFAULT '50' COMMENT '商品品牌排序依据',
  `is_show` tinyint(4) NOT NULL DEFAULT '1' COMMENT '是否显示，默认显示',
  PRIMARY KEY (`brand_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `king_brand`
--

LOCK TABLES `king_brand` WRITE;
/*!40000 ALTER TABLE `king_brand` DISABLE KEYS */;
INSERT INTO `king_brand` VALUES (1,'APPLE','','','',50,1),(2,'HUAWEI','','','logoquan14917984085.PNG',50,1);
/*!40000 ALTER TABLE `king_brand` ENABLE KEYS */;
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
-- Table structure for table `king_goods`
--

DROP TABLE IF EXISTS `king_goods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `king_goods` (
  `goods_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品ID',
  `goods_sn` varchar(30) NOT NULL DEFAULT '' COMMENT '商品货号',
  `goods_name` varchar(100) NOT NULL DEFAULT '' COMMENT '商品名称',
  `goods_brief` varchar(255) NOT NULL DEFAULT '' COMMENT '商品简单描述',
  `goods_desc` text COMMENT '商品详情',
  `cat_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '商品所属类别ID',
  `brand_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '商品所属品牌ID',
  `market_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '市场价',
  `shop_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '本店价格',
  `promote_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '促销价格',
  `promote_start_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '促销起始时间',
  `promote_end_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '促销截止时间',
  `goods_img` varchar(50) NOT NULL DEFAULT '' COMMENT '商品图片',
  `goods_thumb` varchar(50) NOT NULL DEFAULT '' COMMENT '商品缩略图',
  `goods_number` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '商品库存',
  `click_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '点击次数',
  `type_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '商品类型ID',
  `is_promote` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '是否促销，默认为0不促销',
  `is_best` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '是否精品,默认为0',
  `is_new` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '是否新品，默认为0',
  `is_hot` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '是否热卖,默认为0',
  `is_onsale` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '是否上架,默认为1',
  `add_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间',
  PRIMARY KEY (`goods_id`),
  KEY `cat_id` (`cat_id`),
  KEY `brand_id` (`brand_id`),
  KEY `type_id` (`type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `king_goods`
--

LOCK TABLES `king_goods` WRITE;
/*!40000 ALTER TABLE `king_goods` DISABLE KEYS */;
INSERT INTO `king_goods` VALUES (1,'','诺基亚N85','',NULL,0,0,0.00,3010.00,0.00,0,0,'','',0,0,0,0,0,0,0,1,0),(2,'','诺基亚N85','',NULL,0,0,0.00,3010.00,0.00,0,0,'','',0,0,0,0,0,0,0,1,0),(3,'','诺基亚N85','',NULL,0,0,0.00,3010.00,0.00,0,0,'','',0,0,0,0,0,0,0,1,0),(4,'','诺基亚N85','',NULL,0,0,0.00,3010.00,0.00,0,0,'','',0,0,0,0,0,0,0,1,0),(5,'','诺基亚N85','',NULL,0,0,0.00,3010.00,0.00,0,0,'','',0,0,0,0,0,0,0,1,0),(6,'','诺基亚N85','',NULL,0,0,0.00,3010.00,0.00,0,0,'','',0,0,0,0,0,0,0,1,0),(7,'','诺基亚N85','',NULL,0,0,0.00,3010.00,0.00,0,0,'','',0,0,0,0,0,0,0,1,0),(8,'','诺基亚N85','',NULL,0,0,0.00,3010.00,0.00,0,0,'','',0,0,0,0,0,0,0,1,0),(9,'','诺基亚N858','',NULL,0,0,0.00,5995.88,0.00,0,0,'logoquan14930483832.PNG','logoquan14930483832_thumb.PNG',0,0,0,0,1,0,0,1,0),(10,'','诺基亚N85','',NULL,0,0,0.00,3010.00,0.00,0,0,'','',0,0,0,0,0,0,0,1,0);
/*!40000 ALTER TABLE `king_goods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `king_goods_attr`
--

DROP TABLE IF EXISTS `king_goods_attr`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `king_goods_attr` (
  `goods_attr_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '编号ID',
  `goods_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '商品ID',
  `attr_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '属性ID',
  `attr_value` varchar(255) NOT NULL DEFAULT '' COMMENT '属性值',
  `attr_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '属性价格',
  PRIMARY KEY (`goods_attr_id`),
  KEY `goods_id` (`goods_id`),
  KEY `attr_id` (`attr_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `king_goods_attr`
--

LOCK TABLES `king_goods_attr` WRITE;
/*!40000 ALTER TABLE `king_goods_attr` DISABLE KEYS */;
INSERT INTO `king_goods_attr` VALUES (1,9,1,'休息休息',0.00),(2,9,2,'XXL',0.00),(3,9,3,'欧美',0.00);
/*!40000 ALTER TABLE `king_goods_attr` ENABLE KEYS */;
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

--
-- Table structure for table `king_type`
--

DROP TABLE IF EXISTS `king_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `king_type` (
  `type_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品类型ID',
  `type_name` varchar(50) NOT NULL DEFAULT '' COMMENT '商品类型名称',
  PRIMARY KEY (`type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `king_type`
--

LOCK TABLES `king_type` WRITE;
/*!40000 ALTER TABLE `king_type` DISABLE KEYS */;
INSERT INTO `king_type` VALUES (1,'是是是'),(2,'AAAA'),(3,'BBB'),(4,'CCCC'),(5,'DDDD'),(6,'EEEE'),(7,'FFF'),(8,'GGG'),(9,'HHH'),(10,'IIII'),(11,'JJJJJJ'),(12,'KKKK');
/*!40000 ALTER TABLE `king_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `king_user`
--

DROP TABLE IF EXISTS `king_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `king_user` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户编号',
  `user_name` varchar(50) NOT NULL DEFAULT '' COMMENT '用户名',
  `email` varchar(50) NOT NULL DEFAULT '' COMMENT '电子邮箱',
  `password` char(32) NOT NULL DEFAULT '' COMMENT '用户密码,md5加密',
  `reg_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户注册时间',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `king_user`
--

LOCK TABLES `king_user` WRITE;
/*!40000 ALTER TABLE `king_user` DISABLE KEYS */;
INSERT INTO `king_user` VALUES (1,'test','test@qq.com','123456',1495874182),(2,'test1','test1@qq.com','e10adc3949ba59abbe56e057f20f883e',1495874496),(3,'test1','test1@qq.com','e10adc3949ba59abbe56e057f20f883e',1495875187);
/*!40000 ALTER TABLE `king_user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-05-27 18:05:47
