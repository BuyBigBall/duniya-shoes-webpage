/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 10.4.21-MariaDB : Database - shoescustom
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`shoescustom` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `shoescustom`;

/*Table structure for table `accessories` */

DROP TABLE IF EXISTS `accessories`;

CREATE TABLE `accessories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(80) CHARACTER SET ascii NOT NULL,
  `name` varchar(80) CHARACTER SET ascii NOT NULL,
  `path` varchar(80) CHARACTER SET ascii NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=utf8;

/*Data for the table `accessories` */

insert  into `accessories`(`id`,`key`,`name`,`path`,`created_at`,`updated_at`) values 
(1,'accessoryFN9','FN9','FN9','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(2,'accessoryLT-001','LT-001','LT-001','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(3,'accessorySH-SG013','SH-SG013','SH-SG013','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(4,'accessory1100-10','1100-10','1100-10','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(5,'accessory1100-2','1100-2','1100-2','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(6,'accessorySH-SG08','SH-SG08','SH-SG08','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(7,'accessoryLT-002','LT-002','LT-002','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(8,'accessoryFN10','FN10','FN10','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(9,'accessoryFN4','FN4','FN4','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(10,'accessoryLT-005','LT-005','LT-005','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(11,'accessorySH-SG06','SH-SG06','SH-SG06','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(12,'accessorySH-SG01','SH-SG01','SH-SG01','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(13,'accessoryLT-006','LT-006','LT-006','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(14,'accessoryFN2','FN2','FN2','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(15,'accessory1100-4','1100-4','1100-4','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(16,'accessory1100-5','1100-5','1100-5','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(17,'accessoryLT-007','LT-007','LT-007','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(18,'accessoryFN13','FN13','FN13','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(19,'accessoryS012-05','S012-05','S012-05','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(20,'accessoryS012-01','S012-01','S012-01','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(21,'accessoryFN5','FN5','FN5','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(22,'accessoryLT-014','LT-014','LT-014','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(23,'accessoryLT-020','LT-020','LT-020','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(24,'accessoryGOL-06','GOL-06','GOL-06','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(25,'accessoryS012-08','S012-08','S012-08','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(26,'accessory1100-9','1100-9','1100-9','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(27,'accessory1104-1','1104-1','1104-1','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(28,'accessorySH-SW02','SH-SW02','SH-SW02','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(29,'accessoryGOL-01','GOL-01','GOL-01','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(30,'accessoryLT-015','LT-015','LT-015','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(31,'accessoryLT-018','LT-018','LT-018','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(32,'accessoryGOL-07','GOL-07','GOL-07','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(33,'accessorySH-SW06','SH-SW06','SH-SW06','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(34,'accessory1104-3','1104-3','1104-3','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(35,'accessoryArmyC','ArmyC','ArmyC','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(36,'accessorySH-SW01','SH-SW01','SH-SW01','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(37,'accessoryGOL-02','GOL-02','GOL-02','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(38,'accessoryLT-030','LT-030','LT-030','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(39,'accessoryLT-035','LT-035','LT-035','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(40,'accessoryLT-024','LT-024','LT-024','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(41,'accessoryGOL-03','GOL-03','GOL-03','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(42,'accessorySH-SW10','SH-SW10','SH-SW10','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(43,'accessoryArmyT','ArmyT','ArmyT','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(44,'accessoryGOL-05','GOL-05','GOL-05','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(45,'accessoryLT-025','LT-025','LT-025','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(46,'accessoryLT-028','LT-028','LT-028','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(47,'accessorySH-SW03','SH-SW03','SH-SW03','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(48,'accessoryItaly1','Italy1','Italy1','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(49,'accessoryItaly10','Italy10','Italy10','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(50,'accessorySH-SW05','SH-SW05','SH-SW05','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(51,'accessoryLT-048','LT-048','LT-048','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(52,'accessorySH-SW04','SH-SW04','SH-SW04','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(53,'accessoryLT-043','LT-043','LT-043','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(54,'accessoryLT-041','LT-041','LT-041','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(55,'accessoryFB01','FB01','FB01','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(56,'accessoryFB02','FB02','FB02','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(57,'accessoryItaly7','Italy7','Italy7','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(58,'accessoryLT-040','LT-040','LT-040','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(59,'accessorySHMS02-SCM-Copper','SHMS02-SCM-Copper','SHMS02-SCM-Copper','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(60,'accessorySHMS02-SCM-DarkGold','SHMS02-SCM-DarkGold','SHMS02-SCM-DarkGold','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(61,'accessoryItaly9','Italy9','Italy9','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(62,'accessoryLT-047','LT-047','LT-047','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(63,'accessoryFB03','FB03','FB03','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(64,'accessoryFB04','FB04','FB04','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(65,'accessoryItaly8','Italy8','Italy8','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(66,'accessoryLT-045','LT-045','LT-045','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(67,'accessorySHMS02-SCM-Gold','SHMS02-SCM-Gold','SHMS02-SCM-Gold','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(68,'accessoryLT-022','LT-022','LT-022','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(69,'accessoryItaly6','Italy6','Italy6','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(70,'accessoryFB05','FB05','FB05','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(71,'accessoryFB06','FB06','FB06','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(72,'accessoryBOF_1','BOF_1','BOF_1','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(73,'accessoryItaly3','Italy3','Italy3','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(74,'accessoryItaly4','Italy4','Italy4','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(75,'accessoryBOF_2','BOF_2','BOF_2','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(76,'accessoryFB07','FB07','FB07','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(77,'accessoryFB08','FB08','FB08','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(78,'accessoryBOF_3','BOF_3','BOF_3','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(79,'accessoryItaly5','Italy5','Italy5','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(80,'accessoryItaly2','Italy2','Italy2','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(81,'accessorysuede1','suede1','suede1','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(82,'accessoryLT-SM11','LT-SM11','LT-SM11','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(83,'accessorysuede2','suede2','suede2','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(84,'accessoryLT-SM20','LT-SM20','LT-SM20','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(85,'accessoryLT-SM16','LT-SM16','LT-SM16','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(86,'accessorysuede3','suede3','suede3','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(87,'accessorysuede6','suede6','suede6','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(88,'accessoryLT-013','LT-013','LT-013','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(89,'accessorysuede7','suede7','suede7','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(90,'accessoryLT-SM19','LT-SM19','LT-SM19','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(91,'accessorysuede8','suede8','suede8','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(92,'accessoryLT-SM10','LT-SM10','LT-SM10','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(93,'accessoryLT-SM12','LT-SM12','LT-SM12','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(94,'accessorysuede9','suede9','suede9','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(95,'accessorysuede10','suede10','suede10','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(96,'accessoryLT-SM14','LT-SM14','LT-SM14','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(97,'accessorysuede11','suede11','suede11','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(98,'accessoryLT-SM03','LT-SM03','LT-SM03','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(99,'accessorysuede12','suede12','suede12','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(100,'accessoryLT-SM21','LT-SM21','LT-SM21','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(101,'accessorysuede13','suede13','suede13','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(102,'accessoryLT-SM02','LT-SM02','LT-SM02','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(103,'accessoryLT-SM06','LT-SM06','LT-SM06','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(104,'accessorysuede15','suede15','suede15','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(105,'accessorysuede16','suede16','suede16','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(106,'accessoryLT-SM07','LT-SM07','LT-SM07','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(107,'accessoryLT-SM22','LT-SM22','LT-SM22','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(108,'accessoryLT-SM15','LT-SM15','LT-SM15','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(109,'accessoryLT-SM01','LT-SM01','LT-SM01','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(110,'accessoryLT-SM18','LT-SM18','LT-SM18','2022-02-04 01:59:58','2022-02-04 01:59:58'),
(111,'accessoryLT-SM23','LT-SM23','LT-SM23','2022-02-04 01:59:58','2022-02-04 01:59:58');

/*Table structure for table `backs` */

DROP TABLE IF EXISTS `backs`;

CREATE TABLE `backs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(80) CHARACTER SET ascii NOT NULL,
  `name` varchar(80) CHARACTER SET ascii NOT NULL,
  `path` varchar(80) CHARACTER SET ascii NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=utf8;

/*Data for the table `backs` */

insert  into `backs`(`id`,`key`,`name`,`path`,`created_at`,`updated_at`) values 
(1,'backFN9','FN9','FN9','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(2,'backLT-001','LT-001','LT-001','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(3,'backSH-SG013','SH-SG013','SH-SG013','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(4,'back1100-10','1100-10','1100-10','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(5,'back1100-2','1100-2','1100-2','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(6,'backSH-SG08','SH-SG08','SH-SG08','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(7,'backLT-002','LT-002','LT-002','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(8,'backFN10','FN10','FN10','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(9,'backFN4','FN4','FN4','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(10,'backLT-005','LT-005','LT-005','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(11,'backSH-SG06','SH-SG06','SH-SG06','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(12,'backSH-SG01','SH-SG01','SH-SG01','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(13,'backLT-006','LT-006','LT-006','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(14,'backFN2','FN2','FN2','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(15,'back1100-4','1100-4','1100-4','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(16,'back1100-5','1100-5','1100-5','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(17,'backLT-007','LT-007','LT-007','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(18,'backFN13','FN13','FN13','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(19,'backS012-05','S012-05','S012-05','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(20,'backS012-01','S012-01','S012-01','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(21,'backFN5','FN5','FN5','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(22,'backLT-014','LT-014','LT-014','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(23,'backLT-020','LT-020','LT-020','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(24,'backGOL-06','GOL-06','GOL-06','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(25,'backS012-08','S012-08','S012-08','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(26,'back1100-9','1100-9','1100-9','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(27,'back1104-1','1104-1','1104-1','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(28,'backSH-SW02','SH-SW02','SH-SW02','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(29,'backGOL-01','GOL-01','GOL-01','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(30,'backLT-015','LT-015','LT-015','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(31,'backLT-018','LT-018','LT-018','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(32,'backGOL-07','GOL-07','GOL-07','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(33,'backSH-SW06','SH-SW06','SH-SW06','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(34,'back1104-3','1104-3','1104-3','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(35,'backArmyC','ArmyC','ArmyC','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(36,'backSH-SW01','SH-SW01','SH-SW01','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(37,'backGOL-02','GOL-02','GOL-02','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(38,'backLT-030','LT-030','LT-030','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(39,'backLT-035','LT-035','LT-035','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(40,'backLT-024','LT-024','LT-024','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(41,'backGOL-03','GOL-03','GOL-03','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(42,'backSH-SW10','SH-SW10','SH-SW10','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(43,'backArmyT','ArmyT','ArmyT','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(44,'backGOL-05','GOL-05','GOL-05','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(45,'backLT-025','LT-025','LT-025','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(46,'backLT-028','LT-028','LT-028','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(47,'backSH-SW03','SH-SW03','SH-SW03','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(48,'backItaly1','Italy1','Italy1','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(49,'backItaly10','Italy10','Italy10','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(50,'backSH-SW05','SH-SW05','SH-SW05','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(51,'backLT-048','LT-048','LT-048','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(52,'backSH-SW04','SH-SW04','SH-SW04','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(53,'backLT-043','LT-043','LT-043','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(54,'backLT-041','LT-041','LT-041','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(55,'backFB01','FB01','FB01','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(56,'backFB02','FB02','FB02','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(57,'backItaly7','Italy7','Italy7','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(58,'backLT-040','LT-040','LT-040','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(59,'backSHMS02-SCM-Copper','SHMS02-SCM-Copper','SHMS02-SCM-Copper','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(60,'backSHMS02-SCM-DarkGold','SHMS02-SCM-DarkGold','SHMS02-SCM-DarkGold','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(61,'backItaly9','Italy9','Italy9','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(62,'backLT-047','LT-047','LT-047','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(63,'backFB03','FB03','FB03','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(64,'backFB04','FB04','FB04','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(65,'backItaly8','Italy8','Italy8','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(66,'backLT-045','LT-045','LT-045','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(67,'backSHMS02-SCM-Gold','SHMS02-SCM-Gold','SHMS02-SCM-Gold','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(68,'backLT-022','LT-022','LT-022','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(69,'backItaly6','Italy6','Italy6','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(70,'backFB05','FB05','FB05','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(71,'backFB06','FB06','FB06','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(72,'backBOF_1','BOF_1','BOF_1','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(73,'backItaly3','Italy3','Italy3','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(74,'backItaly4','Italy4','Italy4','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(75,'backBOF_2','BOF_2','BOF_2','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(76,'backFB07','FB07','FB07','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(77,'backFB08','FB08','FB08','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(78,'backBOF_3','BOF_3','BOF_3','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(79,'backItaly5','Italy5','Italy5','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(80,'backItaly2','Italy2','Italy2','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(81,'backsuede1','suede1','suede1','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(82,'backLT-SM11','LT-SM11','LT-SM11','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(83,'backsuede2','suede2','suede2','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(84,'backLT-SM20','LT-SM20','LT-SM20','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(85,'backLT-SM16','LT-SM16','LT-SM16','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(86,'backsuede3','suede3','suede3','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(87,'backsuede6','suede6','suede6','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(88,'backLT-013','LT-013','LT-013','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(89,'backsuede7','suede7','suede7','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(90,'backLT-SM19','LT-SM19','LT-SM19','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(91,'backsuede8','suede8','suede8','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(92,'backLT-SM10','LT-SM10','LT-SM10','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(93,'backLT-SM12','LT-SM12','LT-SM12','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(94,'backsuede9','suede9','suede9','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(95,'backsuede10','suede10','suede10','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(96,'backLT-SM14','LT-SM14','LT-SM14','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(97,'backsuede11','suede11','suede11','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(98,'backLT-SM03','LT-SM03','LT-SM03','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(99,'backsuede12','suede12','suede12','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(100,'backLT-SM21','LT-SM21','LT-SM21','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(101,'backsuede13','suede13','suede13','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(102,'backLT-SM02','LT-SM02','LT-SM02','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(103,'backLT-SM06','LT-SM06','LT-SM06','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(104,'backsuede15','suede15','suede15','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(105,'backsuede16','suede16','suede16','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(106,'backLT-SM07','LT-SM07','LT-SM07','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(107,'backLT-SM22','LT-SM22','LT-SM22','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(108,'backLT-SM15','LT-SM15','LT-SM15','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(109,'backLT-SM01','LT-SM01','LT-SM01','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(110,'backLT-SM18','LT-SM18','LT-SM18','2022-02-04 01:53:03','2022-02-04 01:53:03'),
(111,'backLT-SM23','LT-SM23','LT-SM23','2022-02-04 01:53:03','2022-02-04 01:53:03');

/*Table structure for table `carts` */

DROP TABLE IF EXISTS `carts`;

CREATE TABLE `carts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `gander` enum('M','Y') DEFAULT 'M',
  `type` varchar(50) DEFAULT NULL,
  `shape` varchar(50) DEFAULT NULL,
  `style` varchar(50) DEFAULT NULL,
  `desc` text DEFAULT NULL,
  `monoIn` varchar(20) DEFAULT NULL,
  `monoOut` varchar(20) DEFAULT NULL,
  `statusPreDesign` tinyint(1) DEFAULT NULL,
  `unit` enum('cm','inch') DEFAULT NULL,
  `length` int(11) DEFAULT NULL,
  `width` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `coupon_status` varchar(100) DEFAULT 'null',
  `size_type_name` varchar(20) DEFAULT 'EU',
  `size_type` varchar(20) DEFAULT 'EU',
  `size` float DEFAULT NULL,
  `lastitem` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `session` int(11) DEFAULT NULL,
  `checkout` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `carts` */

insert  into `carts`(`id`,`key`,`name`,`gander`,`type`,`shape`,`style`,`desc`,`monoIn`,`monoOut`,`statusPreDesign`,`unit`,`length`,`width`,`quantity`,`coupon_status`,`size_type_name`,`size_type`,`size`,`lastitem`,`token`,`session`,`checkout`,`created_at`,`updated_at`) values 
(1,'CR002','Model Title','M',NULL,'ShoeCare','ShoeCream',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'null','EU','EU',NULL,NULL,NULL,NULL,0,'2022-02-22 09:12:34','2022-02-22 09:12:34'),
(2,NULL,NULL,'M',NULL,'shoe','custom','eyJwcm9kdWN0VHlwZSI6InNob2UiLCJmb2xkZXJUeXBlIjoiT3hmb3JkU2hvZXMiLCJnZXRTaGFwZSI6IlJvdW5kIiwic2hvZVR5cGUiOiJveGZvcmQiLCJjdXJyZW50VmlldyI6IlJpZ2h0IiwiZ2V0TGVhdGhlck5vIjoiTFQtMDAxIiwiZ2V0TGVhdGhlciI6InByZW1pdW0iLCJnZXRMZWF0aGVyR3JvdXAiOiIxIiwiZ2V0U3R5bGUiOiJzaGFwZSIsImdldEZyb250Ijoibm9uZSIsImdldFNpZGUiOiJTRDEiLCJnZXRCYWNrIjoiQksxIiwiZ2V0U29sZSI6IkxULU4wMDciLCJnZXRBY2Nlc3NvcnkiOiJub25lIiwiZ2V0U3BlY2kiOiJtaXgtbWF0Y2giLCJnZXRTaWRlTm8iOiJub25lIiwiZ2V0RnJvbnRObyI6Im5vbmUiLCJnZXRMaW5pbmdObyI6IlNILVNXMDgiLCJnZXRTdGl0Y2hpbmdObyI6Im5vbmUiLCJnZXRMYWNlc05vIjoiSFQtQmxhY2siLCJnZXRCcm9ndWVObyI6Im5vbmUiLCJnZXRCYWNrTm8iOiJub25lIiwiZ2V0QWNjZXNzb3J5Tm8iOiJub25lIiwiZ2V0U29sZUJvcmRlciI6IkxFMiIsImdldE1vbm9JbiI6IiIsImdldE1vbm9PdXQiOiIiLCJnZXRTaXplVHlwZU5hbWUiOiJFVSIsImdldFNpemVUeXBlIjoiRVVSTyIsImdldFNpemVObyI6Im51bGwiLCJnZXRVbml0IjoibnVsbCIsImdldExlbmd0aCI6IjAiLCJnZXRXaWR0aCI6IjAiLCJnZXRRdHkiOiIxIiwiZ2V0U2hvZVByaWNlIjoiMTc5IiwiZ2V0TWl4UHJpY2UiOiI5LjkiLCJnZXRTaG9lRGlzY291bnRJdGVtIjoiMCIsIm1peFNvbGVQcmljZVN0YXR1cyI6Im5vIiwiZ2V0U2hvZVNoaXBwaW5nIjoiMCIsInNldFN0YXR1c01peCI6ImZhbHNlIiwicHJldkxlYXRoZXJObyI6Im5vbmUiLCJyZXNwb25zZSI6ImZhbHNlIiwic2hhcGUiOiJzaGFwZS1Sb3VuZCIsImZyb250Ijoibm9uZSIsInNpZGUiOiJTRDEiLCJiYWNrIjoiQksxIiwic29sZSI6IlNvbGUtMUwiLCJnZXRTaGFwZU5hbWUiOiJTaGFycCIsInNob2VUeXBlTmFtZSI6Im94Zm9yZCIsImdldExlYXRoZXJOb05hbWUiOiJub25lIiwiZ2V0TGVhdGhlck5hbWUiOiJ0aGUgcHJlbWl1bSIsImdldFN0eWxlTmFtZSI6Im5vbmUiLCJnZXRGcm9udE5hbWUiOiJub25lIiwiZ2V0U2lkZU5hbWUiOiJTRDEiLCJnZXRCYWNrTmFtZSI6IkJLMSIsImdldFNvbGVOYW1lIjoiTGVhdGhlciIsImdldEFjY2Vzc29yeU5hbWUiOiJub25lIiwiZ2V0U2lkZU5vTmFtZSI6Im5vbmUiLCJnZXRGcm9udE5vTmFtZSI6Im5vbmUiLCJnZXRMaW5pbmdOYW1lIjoiRGFyayBCcm93biIsImdldFN0aXRjaGluZ05hbWUiOiJub25lIiwiZ2V0TGFjZXNOYW1lIjoiSFQtQmxhY2siLCJnZXRCcm9ndWVOYW1lIjoibm9uZSIsImdldEJhY2tOb05hbWUiOiJub25lIiwib3B0aW9uQm9yZGVyU2xpbSI6Ik4iLCJzZXRNZW51THRoIjoicHJlbWl1bSIsImNvZGU2NCI6Im51bGwiLCJpbWciOiJudWxsIiwibWVhc3VyZU1lbnUiOiJib2R5U2l6ZSJ9',NULL,NULL,0,'cm',39,26,1,'null','EU','EURO',36,NULL,'j2gDAwdVod2AnUe6MMq7vVXlQBINISQlSw2DHzHL',NULL,0,'2022-02-22 09:12:56','2022-02-22 09:12:56'),
(3,'CR003','Model Title','M',NULL,'ShoeCare','ShoeCream',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'null','EU','EU',NULL,NULL,NULL,NULL,0,'2022-02-22 09:14:24','2022-02-22 09:14:24'),
(4,'CR004','Model Title','M',NULL,'ShoeCare','ShoeTrees',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'null','EU','EU',NULL,NULL,NULL,NULL,0,'2022-02-22 09:15:36','2022-02-22 09:15:36');

/*Table structure for table `colors` */

DROP TABLE IF EXISTS `colors`;

CREATE TABLE `colors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group` int(11) DEFAULT NULL,
  `group_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `leather_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `colors` */

insert  into `colors`(`id`,`key`,`name`,`group`,`group_name`,`leather_id`,`created_at`,`updated_at`) values 
(1,'LT-001','100% Leather Tan (Polished smooth Leather)',4,'tan brown',1,NULL,NULL),
(2,'LT-002','Cream (Polished smooth Leather)',5,'warm tone',1,NULL,NULL),
(3,'LT-005','Visky (Polished smooth Leather)',4,'tan brown',1,NULL,NULL),
(4,'LT-006','Dark Brown (Polished smooth Leather)',4,'tan brown',1,NULL,NULL),
(5,'LT-007','Black (Polished smooth Leather)',10,'black-grey tone',1,NULL,NULL),
(6,'LT-013','100% leather',4,'tan brown',1,NULL,NULL),
(7,'LT-014','100% leather',4,'tan brown',1,NULL,NULL),
(8,'LT-015','100% leather',10,'black-grey tone',1,NULL,NULL),
(9,'LT-018','100% leather',6,'red-pink tone',1,NULL,NULL),
(10,'LT-020','100% leather',4,'tan brown',1,NULL,NULL),
(11,'LT-022','100% leather',9,'orange-y tone',1,NULL,NULL),
(12,'LT-024','100% leather',6,'red-pink tone',1,NULL,NULL),
(13,'LT-025','100% leather',6,'red-pink tone',1,NULL,NULL),
(14,'LT-028','100% leather',7,'navy violet tone',1,NULL,NULL),
(15,'LT-035','100% leather',7,'navy violet tone',1,NULL,NULL),
(16,'LT-040','100% leather',8,'green tone',1,NULL,NULL),
(17,'LT-041','100% leather',8,'green tone',1,NULL,NULL),
(18,'LT-043','100% leather',5,'warm tone',1,NULL,NULL),
(19,'LT-045','100% leather',11,'yellow tone',1,NULL,NULL),
(20,'LT-SM01','Chamois Leather',4,'tan brown',1,NULL,NULL),
(21,'LT-SM02','Chamois Leather',8,'green tone',1,NULL,NULL),
(22,'LT-SM03','Chamois Leather',6,'red-pink tone',1,NULL,NULL),
(23,'LT-SM06','Chamois Leather',8,'green tone',1,NULL,NULL),
(24,'LT-SM07','Chamois Leather',7,'navy violet tone',1,NULL,NULL),
(25,'LT-SM10','Chamois Leather',11,'yellow tone',1,NULL,NULL),
(26,'LT-SM11','Chamois Leather',5,'warm tone',1,NULL,NULL),
(27,'LT-SM12','Chamois Leather',9,'orange-y tone',1,NULL,NULL),
(28,'FN2','Tan (Hair Horse on Printed Leather)',4,'tan brown',2,NULL,NULL),
(29,'FN4','Green (Hair Horse on Printed Leather)',8,'green tone',2,NULL,NULL),
(30,'FN5','Tan checkered (Hair Horse on Printed Leather)',4,'tan brown',2,NULL,NULL),
(31,'FN9','Yellow (Hair Horse on Printed Leather)',11,'yellow tone',2,NULL,NULL),
(32,'FN10','Tan (Hair Horse on Printed Leather)',4,'tan brown',2,NULL,NULL),
(33,'FN13','Hair Horse on Printed Leather',10,'black-grey tone',2,NULL,NULL),
(34,'GOL-01','Orange (Cow Embossed Ostrich-Designed Leather)',9,'orange-y tone',2,NULL,NULL),
(35,'GOL-02','Teal (Cow Embossed Ostrich-Designed Leather)',12,'blue tone',2,NULL,NULL),
(36,'GOL-03','Dim Gray (Cow Embossed Ostrich-Designed Leather)',10,'black-grey tone',2,NULL,NULL),
(37,'GOL-05','Cow Embossed Ostrich-Designed Leather',4,'tan brown',2,NULL,NULL),
(38,'GOL-06','Cream (Cow Embossed Ostrich-Designed Leather)',5,'warm tone',2,NULL,NULL),
(39,'GOL-07','sienna (Cow Embossed Ostrich-Designed Leather)',9,'orange-y tone',2,NULL,NULL),
(40,'Italy1','Italy1',NULL,NULL,2,NULL,NULL),
(41,'Italy10','Italy10',NULL,NULL,2,NULL,NULL),
(42,'Italy2','Italy2',NULL,NULL,2,NULL,NULL),
(43,'Italy3','Italy3',NULL,NULL,2,NULL,NULL),
(44,'Italy4','Italy4',NULL,NULL,2,NULL,NULL),
(45,'Italy5','Italy5',NULL,NULL,2,NULL,NULL),
(46,'Italy6','Italy6',NULL,NULL,2,NULL,NULL),
(47,'Italy7','Italy7',NULL,NULL,2,NULL,NULL),
(48,'Italy8','Italy8',NULL,NULL,2,NULL,NULL),
(49,'Italy9','Italy9',NULL,NULL,2,NULL,NULL),
(63,'S012-01','Sheep Printed Leopard-Design',9,'orange-y tone',3,NULL,NULL),
(64,'S012-05','Sheep Printed Leopard-Design',9,'orange-y tone',3,NULL,NULL),
(65,'S012-08','Sheep Printed Leopard-Design',7,'navy violet tone',3,NULL,NULL),
(69,'SH-SG01','Sheep Patent Leather',10,'black-grey tone',3,NULL,NULL),
(70,'SH-SG06','Sheep Patent Leather',6,'red-pink tone',3,NULL,NULL),
(71,'SH-SG08','Sheep Patent Leather',7,'navy violet tone',3,NULL,NULL),
(72,'SH-SW01','Sheep Suede Leather',8,'green tone',3,NULL,NULL),
(73,'SH-SW02','Sheep Suede Leather',8,'green tone',3,NULL,NULL),
(74,'SH-SW03','Sheep Suede Leather',6,'red-pink tone',3,NULL,NULL),
(75,'SH-SW04','Sheep Suede Leather',7,'navy violet tone',3,NULL,NULL),
(76,'SH-SW05','Sheep Suede Leather',7,'navy violet tone',3,NULL,NULL),
(77,'SH-SW06','Sheep Suede Leather',12,'blue tone',3,NULL,NULL),
(78,'SH-SW10','Sheep Suede Leather',9,'orange-y tone',3,NULL,NULL),
(79,'SH-SG013','orange',9,'orange-y tone',3,NULL,NULL),
(80,'1100-10','1100-10',NULL,NULL,4,NULL,NULL),
(81,'1100-2','1100-2',NULL,NULL,4,NULL,NULL),
(82,'1100-4','1100-4',NULL,NULL,4,NULL,NULL),
(83,'1100-5','1100-5',NULL,NULL,4,NULL,NULL),
(84,'1100-9','1100-9',NULL,NULL,4,NULL,NULL),
(85,'1104-1','1104-1',NULL,NULL,4,NULL,NULL),
(86,'1104-3','1104-3',NULL,NULL,4,NULL,NULL),
(87,'ArmyC','ArmyC',NULL,NULL,4,NULL,NULL),
(88,'ArmyT','ArmyT',NULL,NULL,4,NULL,NULL),
(89,'FB01','FB01',NULL,NULL,4,NULL,NULL),
(91,'FB03','FB03',NULL,NULL,4,NULL,NULL),
(92,'FB04','FB04',NULL,NULL,4,NULL,NULL),
(93,'FB05','FB05',NULL,NULL,4,NULL,NULL),
(94,'FB06','FB06',NULL,NULL,4,NULL,NULL),
(95,'FB07','FB07',NULL,NULL,4,NULL,NULL),
(96,'FB08','FB08',NULL,NULL,4,NULL,NULL);

/*Table structure for table `colors_group` */

DROP TABLE IF EXISTS `colors_group`;

CREATE TABLE `colors_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

/*Data for the table `colors_group` */

insert  into `colors_group`(`id`,`name`,`created_at`,`updated_at`) values 
(4,'TAN BROWN','2022-02-11 09:47:03','2022-02-11 09:47:05'),
(5,'WARM TONE','2022-02-11 09:47:14','2022-02-11 09:47:20'),
(6,'Red-Pink TONE','2022-02-11 09:47:24','2022-02-11 09:47:32'),
(7,'NAVY Violet TONE','2022-02-11 09:47:36','2022-02-11 09:47:44'),
(8,'GREEN TONE','2022-02-11 09:47:46','2022-02-11 09:47:53'),
(9,'ORANGE-Y TONE','2022-02-11 09:47:56','2022-02-11 09:48:04'),
(10,'BLACK-GREY TONE','2022-02-11 09:48:07','2022-02-11 09:48:12'),
(11,'YELLOW TONE','2022-02-11 09:48:15','2022-02-11 09:48:22'),
(12,'BLUE TONE','2022-02-11 09:48:25','2022-02-11 09:48:30');

/*Table structure for table `data_rows` */

DROP TABLE IF EXISTS `data_rows`;

CREATE TABLE `data_rows` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `data_type_id` int(10) unsigned NOT NULL,
  `field` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT 0,
  `browse` tinyint(1) NOT NULL DEFAULT 1,
  `read` tinyint(1) NOT NULL DEFAULT 1,
  `edit` tinyint(1) NOT NULL DEFAULT 1,
  `add` tinyint(1) NOT NULL DEFAULT 1,
  `delete` tinyint(1) NOT NULL DEFAULT 1,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `data_rows_data_type_id_foreign` (`data_type_id`),
  CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `data_rows` */

insert  into `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) values 
(1,1,'id','number','ID',1,0,0,0,0,0,NULL,1),
(2,1,'name','text','Name',1,1,1,1,1,1,NULL,2),
(3,1,'email','text','Email',1,1,1,1,1,1,NULL,3),
(4,1,'password','password','Password',1,0,0,1,1,0,NULL,4),
(5,1,'remember_token','text','Remember Token',0,0,0,0,0,0,NULL,5),
(6,1,'created_at','timestamp','Created At',0,1,1,0,0,0,NULL,6),
(7,1,'updated_at','timestamp','Updated At',0,0,0,0,0,0,NULL,7),
(8,1,'avatar','image','Avatar',0,1,1,1,1,1,NULL,8),
(9,1,'user_belongsto_role_relationship','relationship','Role',0,1,1,1,1,0,'{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"roles\",\"pivot\":0}',10),
(10,1,'user_belongstomany_role_relationship','relationship','voyager::seeders.data_rows.roles',0,1,1,1,1,0,'{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"user_roles\",\"pivot\":\"1\",\"taggable\":\"0\"}',11),
(11,1,'settings','hidden','Settings',0,0,0,0,0,0,NULL,12),
(12,2,'id','number','ID',1,0,0,0,0,0,NULL,1),
(13,2,'name','text','Name',1,1,1,1,1,1,NULL,2),
(14,2,'created_at','timestamp','Created At',0,0,0,0,0,0,NULL,3),
(15,2,'updated_at','timestamp','Updated At',0,0,0,0,0,0,NULL,4),
(16,3,'id','number','ID',1,0,0,0,0,0,NULL,1),
(17,3,'name','text','Name',1,1,1,1,1,1,NULL,2),
(18,3,'created_at','timestamp','Created At',0,0,0,0,0,0,NULL,3),
(19,3,'updated_at','timestamp','Updated At',0,0,0,0,0,0,NULL,4),
(20,3,'display_name','text','Display Name',1,1,1,1,1,1,NULL,5),
(21,1,'role_id','text','Role',1,1,1,1,1,1,NULL,9),
(40,14,'id','text','Id',1,0,0,0,0,0,'{}',1),
(41,14,'type','text','Type',1,1,1,1,1,1,'{}',2),
(42,14,'price','text','Price',1,1,1,1,1,1,'{}',3),
(43,14,'created_at','timestamp','Created At',0,1,1,1,0,1,'{}',4),
(44,14,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',5),
(54,18,'id','text','Id',1,0,0,0,0,0,'{}',1),
(55,18,'key','text','Key',1,1,1,1,1,1,'{}',2),
(56,18,'name','text','Name',1,1,1,1,1,1,'{}',3),
(57,18,'shape','text','Shape',0,1,1,1,1,1,'{}',4),
(58,18,'style','text','Style',0,1,1,1,1,1,'{}',5),
(59,18,'quantity','text','Quantity',1,1,1,1,1,1,'{}',6),
(60,18,'created_at','text','Created At',0,1,1,1,1,1,'{}',7),
(61,18,'updated_at','timestamp','Updated At',1,0,0,0,0,0,'{}',8);

/*Table structure for table `data_types` */

DROP TABLE IF EXISTS `data_types`;

CREATE TABLE `data_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_singular` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_plural` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT 0,
  `server_side` tinyint(4) NOT NULL DEFAULT 0,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `data_types_name_unique` (`name`),
  UNIQUE KEY `data_types_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `data_types` */

insert  into `data_types`(`id`,`name`,`slug`,`display_name_singular`,`display_name_plural`,`icon`,`model_name`,`policy_name`,`controller`,`description`,`generate_permissions`,`server_side`,`details`,`created_at`,`updated_at`) values 
(1,'users','users','User','Users','voyager-person','TCG\\Voyager\\Models\\User','TCG\\Voyager\\Policies\\UserPolicy','TCG\\Voyager\\Http\\Controllers\\VoyagerUserController','',1,0,NULL,'2022-02-02 12:36:10','2022-02-02 12:36:10'),
(2,'menus','menus','Menu','Menus','voyager-list','TCG\\Voyager\\Models\\Menu',NULL,'','',1,0,NULL,'2022-02-02 12:36:11','2022-02-02 12:36:11'),
(3,'roles','roles','Role','Roles','voyager-lock','TCG\\Voyager\\Models\\Role',NULL,'TCG\\Voyager\\Http\\Controllers\\VoyagerRoleController','',1,0,NULL,'2022-02-02 12:36:12','2022-02-02 12:36:12'),
(5,'price','price','Price','Prices',NULL,'App\\Price',NULL,NULL,NULL,1,0,'{\"order_column\":\"id\",\"order_display_column\":\"id\",\"order_direction\":\"asc\",\"default_search_key\":null}','2022-02-02 16:24:09','2022-02-02 16:24:09'),
(13,'pre_design','pre-design','PreDesign','PreDesigns',NULL,'App\\Models\\PreDesign',NULL,NULL,NULL,1,0,'{\"order_column\":\"id\",\"order_display_column\":null,\"order_direction\":\"desc\",\"default_search_key\":null}','2022-02-03 02:51:44','2022-02-03 02:51:44'),
(14,'prices','prices','Price','Prices',NULL,'App\\Models\\Price',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}','2022-02-03 03:31:48','2022-02-03 03:31:48'),
(18,'carts','carts','Cart','Carts',NULL,'App\\Models\\Cart',NULL,NULL,NULL,1,0,'{\"order_column\":\"updated_at\",\"order_display_column\":\"updated_at\",\"order_direction\":\"desc\",\"default_search_key\":null}','2022-02-18 09:46:33','2022-02-18 09:46:33');

/*Table structure for table `designs` */

DROP TABLE IF EXISTS `designs`;

CREATE TABLE `designs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pkey` int(10) unsigned NOT NULL,
  `codeno` varchar(40) CHARACTER SET ascii NOT NULL,
  `groupno` tinyint(4) NOT NULL,
  `model` varchar(40) CHARACTER SET ascii NOT NULL,
  `shape` varchar(40) CHARACTER SET ascii NOT NULL,
  `img` varchar(80) CHARACTER SET ascii NOT NULL,
  `selects` varchar(20) CHARACTER SET ascii NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `pkey` (`pkey`),
  KEY `groupno` (`groupno`),
  KEY `codeno` (`codeno`)
) ENGINE=InnoDB AUTO_INCREMENT=684 DEFAULT CHARSET=utf8;

/*Data for the table `designs` */

insert  into `designs`(`id`,`pkey`,`codeno`,`groupno`,`model`,`shape`,`img`,`selects`,`created_at`,`updated_at`) values 
(1,1028,'PD1028',10,'derby','Round','PD10283D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(2,1027,'PD1027',9,'derby','Sharp','PD10273D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(3,1026,'PD1026',7,'loafers','Round','PD10263D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(4,1025,'PD1025',4,'oxford','Sharp','PD10253D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(5,1024,'PD1024',5,'loafers','Round','PD10243D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(6,1023,'PD1023',9,'boot','Sharp','PD10233D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(7,1022,'PD1022',10,'derby','Round','PD10223D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(8,1021,'PD1021',5,'loafers','Round','PD10213D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(9,1019,'PD1019',6,'loafers','Cut','PD10193D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(10,1018,'PD1018',6,'loafers','Cut','PD10183D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(11,1017,'PD1017',7,'loafers','Round','PD10173D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(12,1016,'PD1016',4,'boot','Sharp','PD10163D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(13,1014,'PD1014',4,'loafers','Round','PD10143D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(14,1013,'PD1013',5,'monk','Sharp','PD10133D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(15,1011,'PD1011',8,'oxford','Sharp','PD10113D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(16,1010,'PD1010',6,'derby','Sharp','PD10103D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(17,1009,'PD1009',6,'monk','Sharp','PD10093D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(18,1008,'PD1007',7,'fashion','Round','PD10073D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(19,1006,'PD1006',4,'loafers','Sharp','PD10063D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(20,1005,'PD1005',4,'loafers','Sharp','PD10053D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(21,1004,'PD998',6,'derby','Cut','PD9983D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(22,997,'PD997',4,'oxford','Sharp','PD9973D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(23,996,'PD996',4,'loafers','Round','PD9963D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(24,995,'PD995',4,'fashion','Cut','PD9953D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(25,994,'PD994',4,'boot','Sharp','PD9943D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(26,993,'PD993',10,'monk','Sharp','PD9933D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(27,992,'PD992',6,'derby','Round','PD9923D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(28,989,'PD989',5,'fashion','Cut','PD9893D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(29,988,'PD988',6,'fashion','Cut','PD9883D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(30,987,'PD987',4,'fashion','Sharp','PD9873D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(31,986,'PD986',9,'fashion','Sharp','PD9863D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(32,985,'PD985',6,'fashion','Round','PD9853D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(33,984,'PD984',4,'fashion','Round','PD9843D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(34,983,'PD983',5,'fashion','Sharp','PD9833D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(35,982,'PD982',4,'fashion','Round','PD9823D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(36,981,'PD981',4,'fashion','Sharp','PD9813D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(37,980,'PD980',5,'fashion','Round','PD9803D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(38,979,'PD979',10,'fashion','Cut','PD9793D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(39,978,'PD978',4,'fashion','Sharp','PD9783D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(40,977,'PD977',5,'fashion','Round','PD9773D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(41,976,'PD976',4,'fashion','Sharp','PD9763D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(42,975,'PD975',4,'fashion','Round','PD9753D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(43,974,'PD974',6,'fashion','Round','PD9743D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(44,973,'PD973',4,'fashion','Cut','PD9733D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(45,972,'PD972',6,'fashion','Round','PD9723D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(46,971,'PD971',4,'fashion','Sharp','PD9713D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(47,970,'PD970',4,'monk','Round','PD9703D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(48,969,'PD969',4,'monk','Sharp','PD9693D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(49,968,'PD968',6,'monk','Sharp','PD9683D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(50,967,'PD967',4,'monk','Sharp','PD9673D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(51,966,'PD966',10,'monk','Sharp','PD9663D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(52,965,'PD965',6,'monk','Sharp','PD9653D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(53,964,'PD964',4,'monk','Sharp','PD9643D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(54,963,'PD963',5,'monk','Sharp','PD9633D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(55,962,'PD962',4,'monk','Round','PD9623D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(56,961,'PD961',4,'monk','Round','PD9613D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(57,960,'PD960',4,'monk','Sharp','PD9603D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(58,959,'PD959',6,'monk','Sharp','PD9593D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(59,958,'PD958',4,'monk','Cut','PD9583D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(60,957,'PD957',9,'monk','Round','PD9573D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(61,956,'PD956',6,'monk','Round','PD9563D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(62,953,'PD953',8,'monk','Round','PD9533D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(63,952,'PD952',6,'monk','Round','PD9523D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(64,951,'PD951',4,'monk','Round','PD9513D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(65,950,'PD950',4,'monk','Sharp','PD9503D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(66,949,'PD949',7,'monk','Sharp','PD9493D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(67,948,'PD948',10,'monk','Round','PD9483D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(68,947,'PD947',4,'monk','Sharp','PD9473D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(69,946,'PD946',5,'monk','Sharp','PD9463D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(70,945,'PD945',4,'monk','Sharp','PD9453D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(71,944,'PD944',6,'monk','Sharp','PD9443D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(72,943,'PD943',6,'monk','Sharp','PD9433D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(73,942,'PD942',4,'monk','Round','PD9423D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(74,941,'PD941',10,'monk','Sharp','PD9413D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(75,940,'PD940',4,'monk','Round','PD9403D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(76,939,'PD939',7,'monk','Cut','PD9393D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(77,938,'PD938',10,'monk','Sharp','PD9383D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(78,937,'PD937',10,'monk','Sharp','PD9373D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(79,936,'PD936',4,'monk','Sharp','PD9363D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(80,935,'PD935',7,'monk','Sharp','PD9353D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(81,934,'PD934',4,'monk','Cut','PD9343D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(82,933,'PD933',4,'monk','Sharp','PD9333D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(83,932,'PD931',10,'monk','Cut','PD9313D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(84,931,'PD931',6,'monk','Cut','PD9313D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(85,930,'PD929',6,'monk','Round','PD9293D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(86,929,'PD929',4,'monk','Sharp','PD9293D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(87,928,'PD928',4,'monk','Round','PD9283D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(88,927,'PD927',4,'monk','Round','PD9273D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(89,926,'PD926',4,'monk','Sharp','PD9263D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(90,925,'PD925',6,'monk','Sharp','PD9253D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(91,924,'PD924',4,'monk','Round','PD9243D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(92,923,'PD922',6,'monk','Sharp','PD9223D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(93,921,'PD921',4,'monk','Round','PD9213D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(94,920,'PD920',10,'monk','Round','PD9203D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(95,919,'PD919',10,'monk','Cut','PD9193D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(96,918,'PD918',4,'monk','Round','PD9183D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(97,917,'PD917',4,'monk','Round','PD9173D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(98,916,'PD916',4,'monk','Sharp','PD9163D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(99,915,'PD915',4,'monk','Sharp','PD9153D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(100,914,'PD914',4,'monk','Round','PD9143D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(101,913,'PD913',10,'monk','Round','PD9133D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(102,912,'PD912',10,'monk','Round','PD9123D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(103,911,'PD911',4,'monk','Sharp','PD9113D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(104,910,'PD910',10,'monk','Sharp','PD9103D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(105,909,'PD909',4,'monk','Round','PD9093D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(106,908,'PD908',4,'monk','Cut','PD9083D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(107,907,'PD907',4,'monk','Round','PD9073D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(108,906,'PD906',10,'monk','Sharp','PD9063D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(109,905,'PD905',10,'monk','Sharp','PD9053D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(110,904,'PD904',4,'monk','Sharp','PD9043D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(111,903,'PD903',4,'monk','Sharp','PD9033D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(112,902,'PD902',4,'monk','Sharp','PD9023D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(113,901,'PD901',4,'monk','Sharp','PD9013D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(114,900,'PD900',7,'monk','Sharp','PD9003D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(115,899,'PD899',4,'monk','Sharp','PD8993D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(116,898,'PD898',6,'monk','Sharp','PD8983D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(117,896,'PD896',8,'monk','Sharp','PD8963D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(118,895,'PD895',10,'monk','Sharp','PD8953D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(119,894,'PD894',4,'monk','Sharp','PD8943D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(120,893,'PD892',4,'monk','Sharp','PD8923D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(121,892,'PD892',4,'monk','Sharp','PD8923D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(122,890,'PD889',6,'monk','Round','PD8893D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(123,889,'PD889',5,'monk','Sharp','PD8893D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(124,888,'PD888',4,'monk','Sharp','PD8883D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(125,887,'PD887',7,'monk','Round','PD8873D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(126,886,'PD886',4,'monk','Round','PD8863D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(127,885,'PD885',9,'monk','Round','PD8853D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(128,884,'PD883',6,'monk','Sharp','PD8833D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(129,883,'PD883',4,'monk','Round','PD8833D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(130,882,'PD882',6,'monk','Cut','PD8823D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(131,881,'PD881',4,'monk','Round','PD8813D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(132,880,'PD880',4,'monk','Sharp','PD8803D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(133,879,'PD879',4,'monk','Round','PD8793D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(134,878,'PD878',9,'monk','Cut','PD8783D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(135,877,'PD877',4,'monk','Sharp','PD8773D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(136,876,'PD876',10,'monk','Round','PD8763D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(137,875,'PD875',4,'monk','Sharp','PD8753D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(138,874,'PD873',10,'monk','Sharp','PD8733D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(139,873,'PD873',4,'monk','Cut','PD8733D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(140,872,'PD872',4,'monk','Round','PD8723D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(141,871,'PD871',6,'boot','Round','PD8713D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(142,870,'PD870',4,'boot','Sharp','PD8703D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(143,869,'PD869',4,'boot','Round','PD8693D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(144,868,'PD868',5,'boot','Sharp','PD8683D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(145,867,'PD867',4,'boot','Cut','PD8673D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(146,866,'PD866',7,'boot','Sharp','PD8663D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(147,865,'PD865',7,'boot','Round','PD8653D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(148,864,'PD864',4,'boot','Sharp','PD8643D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(149,863,'PD863',6,'boot','Round','PD8633D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(150,862,'PD862',4,'boot','Round','PD8623D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(151,861,'PD861',4,'boot','Cut','PD8613D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(152,860,'PD860',10,'boot','Round','PD8603D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(153,859,'PD859',6,'boot','Round','PD8593D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(154,858,'PD858',7,'boot','Cut','PD8583D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(155,857,'PD857',9,'boot','Sharp','PD8573D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(156,856,'PD856',4,'boot','Cut','PD8563D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(157,855,'PD855',5,'boot','Round','PD8553D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(158,854,'PD854',4,'boot','Round','PD8543D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(159,853,'PD853',9,'boot','Cut','PD8533D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(160,852,'PD852',10,'boot','Cut','PD8523D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(161,851,'PD851',6,'boot','Cut','PD8513D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(162,849,'PD849',10,'boot','Round','PD8493D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(163,848,'PD848',4,'boot','Round','PD8483D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(164,847,'PD847',4,'boot','Round','PD8473D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(165,846,'PD846',8,'boot','Sharp','PD8463D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(166,845,'PD845',9,'boot','Sharp','PD8453D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(167,844,'PD844',4,'boot','Round','PD8443D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(168,843,'PD843',4,'boot','Cut','PD8433D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(169,842,'PD842',4,'boot','Cut','PD8423D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(170,841,'PD841',10,'boot','Sharp','PD8413D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(171,840,'PD839',4,'boot','Round','PD8393D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(172,839,'PD839',6,'boot','Cut','PD8393D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(173,837,'PD837',6,'boot','Cut','PD8373D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(174,836,'PD836',4,'boot','Sharp','PD8363D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(175,835,'PD835',4,'boot','Round','PD8353D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(176,834,'PD834',6,'boot','Round','PD8343D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(177,832,'PD832',10,'boot','Cut','PD8323D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(178,831,'PD831',6,'boot','Round','PD8313D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(179,830,'PD830',4,'boot','Cut','PD8303D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(180,829,'PD829',4,'boot','Cut','PD8293D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(181,828,'PD828',6,'boot','Round','PD8283D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(182,827,'PD827',10,'boot','Round','PD8273D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(183,826,'PD826',5,'boot','Cut','PD8263D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(184,825,'PD825',10,'boot','Round','PD8253D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(185,824,'PD824',6,'boot','Cut','PD8243D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(186,823,'PD823',4,'boot','Cut','PD8233D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(187,821,'PD821',4,'boot','Sharp','PD8213D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(188,820,'PD820',7,'boot','Sharp','PD8203D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(189,819,'PD819',5,'boot','Sharp','PD8193D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(190,818,'PD818',4,'boot','Sharp','PD8183D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(191,817,'PD817',7,'boot','Round','PD8173D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(192,816,'PD816',4,'boot','Cut','PD8163D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(193,815,'PD815',4,'boot','Sharp','PD8153D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(194,814,'PD814',4,'boot','Sharp','PD8143D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(195,813,'PD813',4,'boot','Sharp','PD8133D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(196,812,'PD812',5,'boot','Cut','PD8123D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(197,810,'PD810',4,'boot','Sharp','PD8103D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(198,808,'PD808',7,'derby','Sharp','PD8083D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(199,806,'PD806',10,'oxford','Round','PD8063D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(200,805,'PD805',10,'oxford','Round','PD8053D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(201,802,'PD802',10,'oxford','Round','PD8023D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(202,800,'PD800',5,'oxford','Sharp','PD8003D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(203,799,'PD799',5,'oxford','Round','PD7993D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(204,798,'PD798',4,'oxford','Cut','PD7983D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(205,797,'PD797',8,'oxford','Cut','PD7973D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(206,796,'PD796',4,'oxford','Round','PD7963D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(207,795,'PD795',7,'oxford','Sharp','PD7953D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(208,794,'PD794',9,'oxford','Sharp','PD7943D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(209,793,'PD793',4,'oxford','Cut','PD7933D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(210,792,'PD792',10,'oxford','Cut','PD7923D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(211,791,'PD791',5,'oxford','Cut','PD7913D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(212,790,'PD790',4,'oxford','Sharp','PD7903D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(213,789,'PD789',8,'oxford','Cut','PD7893D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(214,787,'PD787',7,'oxford','Round','PD7873D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(215,786,'PD786',8,'oxford','Cut','PD7863D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(216,784,'PD784',4,'oxford','Round','PD7843D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(217,783,'PD783',4,'oxford','Round','PD7833D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(218,782,'PD782',5,'oxford','Round','PD7823D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(219,781,'PD781',4,'oxford','Round','PD7813D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(220,779,'PD779',9,'oxford','Sharp','PD7793D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(221,778,'PD778',4,'oxford','Sharp','PD7783D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(222,777,'PD777',6,'oxford','Round','PD7773D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(223,776,'PD776',4,'oxford','Cut','PD7763D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(224,775,'PD775',4,'oxford','Round','PD7753D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(225,774,'PD774',4,'oxford','Round','PD7743D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(226,773,'PD773',6,'oxford','Sharp','PD7733D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(227,772,'PD772',6,'oxford','Round','PD7723D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(228,771,'PD771',6,'oxford','Round','PD7713D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(229,770,'PD770',8,'oxford','Round','PD7703D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(230,769,'PD769',10,'oxford','Round','PD7693D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(231,768,'PD768',4,'oxford','Round','PD7683D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(232,767,'PD767',5,'oxford','Round','PD7673D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(233,766,'PD766',10,'oxford','Round','PD7663D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(234,765,'PD765',6,'oxford','Round','PD7653D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(235,764,'PD764',5,'oxford','Round','PD7643D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(236,763,'PD763',5,'oxford','Round','PD7633D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(237,762,'PD762',8,'oxford','Sharp','PD7623D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(238,761,'PD761',5,'oxford','Round','PD7613D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(239,760,'PD760',6,'oxford','Round','PD7603D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(240,759,'PD759',4,'oxford','Sharp','PD7593D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(241,758,'PD758',4,'oxford','Sharp','PD7583D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(242,757,'PD757',4,'oxford','Sharp','PD7573D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(243,756,'PD756',10,'oxford','Cut','PD7563D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(244,755,'PD755',4,'oxford','Cut','PD7553D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(245,754,'PD754',6,'oxford','Sharp','PD7543D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(246,753,'PD752',6,'oxford','Round','PD7523D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(247,752,'PD752',6,'oxford','Round','PD7523D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(248,751,'PD751',8,'oxford','Sharp','PD7513D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(249,750,'PD750',6,'oxford','Round','PD7503D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(250,749,'PD749',4,'oxford','Sharp','PD7493D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(251,748,'PD748',6,'oxford','Round','PD7483D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(252,747,'PD747',4,'oxford','Round','PD7473D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(253,746,'PD746',10,'oxford','Round','PD7463D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(254,745,'PD745',4,'oxford','Round','PD7453D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(255,744,'PD744',9,'oxford','Cut','PD7443D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(256,743,'PD743',4,'oxford','Round','PD7433D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(257,742,'PD742',4,'oxford','Sharp','PD7423D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(258,741,'PD741',6,'oxford','Round','PD7413D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(259,740,'PD740',10,'oxford','Round','PD7403D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(260,739,'PD739',9,'oxford','Round','PD7393D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(261,738,'PD738',4,'oxford','Round','PD7383D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(262,737,'PD737',10,'oxford','Sharp','PD7373D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(263,736,'PD736',4,'oxford','Sharp','PD7363D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(264,735,'PD735',4,'oxford','Round','PD7353D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(265,734,'PD734',6,'oxford','Round','PD7343D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(266,733,'PD733',6,'oxford','Round','PD7333D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(267,732,'PD732',4,'oxford','Sharp','PD7323D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(268,731,'PD731',6,'oxford','Round','PD7313D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(269,730,'PD730',4,'oxford','Round','PD7303D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(270,729,'PD729',4,'oxford','Sharp','PD7293D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(271,728,'PD728',4,'oxford','Sharp','PD7283D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(272,727,'PD727',4,'oxford','Round','PD7273D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(273,726,'PD726',4,'oxford','Round','PD7263D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(274,725,'PD725',4,'oxford','Sharp','PD7253D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(275,724,'PD724',8,'oxford','Round','PD7243D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(276,723,'PD723',6,'oxford','Cut','PD7233D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(277,722,'PD722',6,'oxford','Sharp','PD7223D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(278,721,'PD721',4,'oxford','Round','PD7213D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(279,720,'PD720',4,'oxford','Round','PD7203D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(280,719,'PD719',6,'oxford','Sharp','PD7193D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(281,718,'PD718',5,'oxford','Round','PD7183D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(282,717,'PD717',9,'oxford','Round','PD7173D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(283,716,'PD715',10,'oxford','Round','PD7153D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(284,715,'PD715',5,'oxford','Round','PD7153D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(285,714,'PD714',4,'oxford','Round','PD7143D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(286,713,'PD713',5,'oxford','Round','PD7133D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(287,712,'PD712',10,'oxford','Sharp','PD7123D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(288,711,'PD711',4,'oxford','Round','PD7113D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(289,710,'PD710',6,'oxford','Round','PD7103D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(290,709,'PD709',7,'oxford','Sharp','PD7093D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(291,708,'PD708',4,'derby','Round','PD7083D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(292,707,'PD707',6,'loafers','Round','PD7073D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(293,706,'PD706',7,'oxford','Round','PD7063D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(294,704,'PD704',10,'derby','Round','PD7043D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(295,703,'PD703',4,'derby','Sharp','PD7033D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(296,702,'PD701',5,'derby','Sharp','PD7013D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(297,700,'PD700',10,'derby','Sharp','PD7003D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(298,699,'PD699',6,'loafers','Round','PD6993D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(299,698,'PD698',4,'derby','Cut','PD6983D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(300,696,'PD696',8,'fashion','Sharp','PD6963D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(301,695,'PD695',6,'fashion','Round','PD6953D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(302,694,'PD694',6,'fashion','Round','PD6943D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(303,693,'PD693',10,'fashion','Sharp','PD6933D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(304,692,'PD692',6,'fashion','Cut','PD6923D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(305,691,'PD691',8,'fashion','Sharp','PD6913D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(306,690,'PD690',10,'loafers','Round','PD6903D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(307,689,'PD689',4,'loafers','Round','PD6893D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(308,688,'PD688',10,'loafers','Sharp','PD6883D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(309,687,'PD687',10,'loafers','Round','PD6873D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(310,686,'PD686',4,'loafers','Sharp','PD6863D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(311,685,'PD685',4,'loafers','Cut','PD6853D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(312,684,'PD684',10,'loafers','Sharp','PD6843D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(313,683,'PD683',4,'loafers','Sharp','PD6833D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(314,682,'PD682',7,'loafers','Sharp','PD6823D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(315,681,'PD681',5,'loafers','Sharp','PD6813D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(316,680,'PD680',5,'derby','Sharp','PD6803D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(317,679,'PD679',4,'derby','Round','PD6793D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(318,678,'PD678',4,'monk','Sharp','PD6783D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(319,677,'PD677',6,'boot','Sharp','PD6773D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(320,676,'PD676',4,'boot','Round','PD6763D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(321,675,'PD675',4,'oxford','Round','PD6753D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(322,674,'PD674',4,'boot','Round','PD6743D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(323,673,'PD673',10,'boot','Round','PD6733D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(324,672,'PD672',10,'boot','Sharp','PD6723D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(325,671,'PD670',4,'boot','Round','PD6703D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(326,670,'PD670',4,'boot','Sharp','PD6703D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(327,669,'PD669',4,'boot','Round','PD6693D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(328,668,'PD668',4,'boot','Cut','PD6683D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(329,667,'PD667',4,'boot','Sharp','PD6673D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(330,666,'PD666',4,'boot','Cut','PD6663D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(331,665,'PD665',4,'monk','Sharp','PD6653D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(332,664,'PD664',5,'monk','Sharp','PD6643D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(333,663,'PD663',7,'monk','Sharp','PD6633D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(334,662,'PD662',10,'monk','Round','PD6623D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(335,661,'PD661',4,'monk','Sharp','PD6613D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(336,660,'PD660',7,'monk','Sharp','PD6603D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(337,659,'PD659',9,'monk','Round','PD6593D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(338,658,'PD658',6,'monk','Round','PD6583D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(339,657,'PD657',4,'monk','Sharp','PD6573D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(340,655,'PD655',4,'monk','Round','PD6553D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(341,654,'PD654',10,'monk','Sharp','PD6543D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(342,653,'PD653',10,'monk','Cut','PD6533D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(343,652,'PD652',7,'monk','Round','PD6523D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(344,651,'PD651',10,'monk','Round','PD6513D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(345,650,'PD650',10,'monk','Cut','PD6503D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(346,649,'PD649',4,'monk','Sharp','PD6493D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(347,647,'PD647',10,'loafers','Sharp','PD6473D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(348,646,'PD646',4,'loafers','Sharp','PD6463D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(349,645,'PD645',4,'loafers','Cut','PD6453D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(350,644,'PD644',10,'loafers','Sharp','PD6443D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(351,643,'PD643',10,'loafers','Sharp','PD6433D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(352,642,'PD642',9,'loafers','Sharp','PD6423D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(353,641,'PD641',4,'loafers','Cut','PD6413D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(354,640,'PD640',4,'loafers','Round','PD6403D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(355,639,'PD639',4,'loafers','Sharp','PD6393D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(356,638,'PD638',9,'loafers','Cut','PD6383D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(357,637,'PD637',7,'loafers','Sharp','PD6373D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(358,636,'PD636',8,'loafers','Cut','PD6363D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(359,635,'PD635',10,'loafers','Sharp','PD6353D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(360,634,'PD634',4,'loafers','Round','PD6343D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(361,633,'PD633',4,'loafers','Round','PD6333D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(362,632,'PD632',4,'loafers','Sharp','PD6323D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(363,631,'PD631',10,'loafers','Sharp','PD6313D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(364,630,'PD630',7,'loafers','Round','PD6303D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(365,629,'PD629',5,'loafers','Round','PD6293D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(366,626,'PD626',6,'derby','Sharp','PD6263D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(367,624,'PD624',6,'derby','Sharp','PD6243D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(368,623,'PD623',4,'derby','Round','PD6233D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(369,622,'PD622',10,'derby','Round','PD6223D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(370,621,'PD621',8,'derby','Round','PD6213D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(371,620,'PD620',9,'derby','Round','PD6203D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(372,619,'PD619',4,'derby','Sharp','PD6193D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(373,618,'PD618',6,'derby','Sharp','PD6183D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(374,617,'PD617',6,'derby','Cut','PD6173D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(375,616,'PD616',10,'derby','Cut','PD6163D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(376,615,'PD615',10,'oxford','Round','PD6153D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(377,614,'PD614',6,'oxford','Cut','PD6143D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(378,613,'PD613',4,'oxford','Round','PD6133D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(379,611,'PD611',4,'oxford','Sharp','PD6113D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(380,610,'PD610',4,'oxford','Round','PD6103D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(381,609,'PD609',4,'oxford','Sharp','PD6093D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(382,607,'PD607',4,'oxford','Round','PD6073D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(383,606,'PD606',5,'oxford','Round','PD6063D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(384,605,'PD605',4,'oxford','Round','PD6053D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(385,604,'PD604',7,'oxford','Round','PD6043D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(386,603,'PD603',10,'oxford','Round','PD6033D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(387,601,'PD601',9,'oxford','Cut','PD6013D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(388,600,'PD600',5,'oxford','Round','PD6003D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(389,599,'PD599',4,'boot','Cut','PD5993D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(390,598,'PD598',10,'boot','Cut','PD5983D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(391,597,'PD597',10,'boot','Cut','PD5973D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(392,596,'PD596',10,'monk','Round','PD5963D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(393,594,'PD594',10,'boot','Round','PD5943D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(394,593,'PD593',10,'loafers','Cut','PD5933D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(395,592,'PD592',4,'boot','Round','PD5923D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(396,591,'PD591',9,'boot','Round','PD5913D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(397,590,'PD590',4,'fashion','Sharp','PD5903D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(398,589,'PD589',4,'fashion','Round','PD5893D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(399,587,'PD587',10,'fashion','Sharp','PD5873D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(400,586,'PD586',5,'fashion','Sharp','PD5863D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(401,585,'PD585',4,'fashion','Round','PD5853D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(402,584,'PD584',10,'boot','Cut','PD5843D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(403,583,'PD583',4,'boot','Sharp','PD5833D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(404,582,'PD582',7,'oxford','Sharp','PD5823D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(405,581,'PD581',4,'oxford','Sharp','PD5813D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(406,580,'PD580',4,'oxford','Sharp','PD5803D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(407,579,'PD579',9,'oxford','Cut','PD5793D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(408,577,'PD577',4,'oxford','Sharp','PD5773D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(409,576,'PD576',4,'oxford','Round','PD5763D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(410,574,'PD574',5,'oxford','Round','PD5743D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(411,572,'PD572',7,'oxford','Round','PD5723D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(412,571,'PD571',8,'oxford','Cut','PD5713D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(413,570,'PD570',5,'oxford','Round','PD5703D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(414,569,'PD569',5,'oxford','Round','PD5693D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(415,568,'PD568',4,'oxford','Round','PD5683D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(416,567,'PD567',4,'oxford','Round','PD5673D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(417,566,'PD566',4,'oxford','Round','PD5663D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(418,565,'PD565',10,'oxford','Round','PD5653D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(419,563,'PD563',4,'oxford','Round','PD5633D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(420,562,'PD562',9,'oxford','Sharp','PD5623D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(421,561,'PD561',5,'oxford','Sharp','PD5613D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(422,560,'PD560',10,'oxford','Round','PD5603D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(423,559,'PD559',10,'oxford','Round','PD5593D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(424,558,'PD558',4,'oxford','Round','PD5583D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(425,557,'PD556',7,'oxford','Round','PD5563D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(426,555,'PD555',10,'oxford','Round','PD5553D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(427,552,'PD552',4,'oxford','Round','PD5523D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(428,550,'PD550',4,'oxford','Round','PD5503D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(429,548,'PD548',5,'oxford','Sharp','PD5483D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(430,546,'PD546',4,'oxford','Round','PD5463D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(431,545,'PD545',4,'oxford','Round','PD5453D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(432,543,'PD543',10,'fashion','Round','PD5433D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(433,542,'PD542',6,'derby','Round','PD5423D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(434,541,'PD541',5,'fashion','Cut','PD5413D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(435,540,'PD540',10,'loafers','Cut','PD5403D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(436,539,'PD539',10,'loafers','Round','PD5393D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(437,538,'PD538',4,'derby','Round','PD5383D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(438,537,'PD537',4,'loafers','Sharp','PD5373D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(439,536,'PD536',6,'oxford','Round','PD5363D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(440,535,'PD535',7,'loafers','Round','PD5353D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(441,534,'PD534',7,'loafers','Cut','PD5343D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(442,533,'PD533',6,'loafers','Cut','PD5333D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(443,532,'PD532',5,'derby','Round','PD5323D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(444,531,'PD531',4,'fashion','Cut','PD5313D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(445,529,'PD529',6,'derby','Cut','PD5293D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(446,528,'PD528',7,'oxford','Round','PD5283D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(447,527,'PD527',4,'monk','Sharp','PD5273D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(448,526,'PD526',4,'boot','Cut','PD5263D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(449,525,'PD525',4,'loafers','Cut','PD5253D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(450,524,'PD524',4,'monk','Sharp','PD5243D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(451,523,'PD523',6,'loafers','Round','PD5233D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(452,522,'PD522',9,'loafers','Cut','PD5223D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(453,521,'PD521',5,'loafers','Sharp','PD5213D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(454,520,'PD520',10,'derby','Cut','PD5203D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(455,519,'PD519',4,'derby','Sharp','PD5193D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(456,518,'PD518',10,'boot','Round','PD5183D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(457,516,'PD516',4,'fashion','Sharp','PD5163D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(458,515,'PD515',10,'fashion','Cut','PD5153D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(459,514,'PD514',5,'fashion','Cut','PD5143D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(460,513,'PD513',4,'fashion','Sharp','PD5133D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(461,512,'PD512',5,'derby','Cut','PD5123D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(462,511,'PD511',4,'derby','Sharp','PD5113D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(463,510,'PD510',6,'derby','Cut','PD5103D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(464,509,'PD509',4,'oxford','Round','PD5093D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(465,508,'PD508',5,'derby','Sharp','PD5083D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(466,507,'PD507',4,'boot','Round','PD5073D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(467,506,'PD506',5,'oxford','Sharp','PD5063D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(468,505,'PD505',7,'monk','Sharp','PD5053D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(469,504,'PD504',5,'boot','Round','PD5043D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(470,503,'PD503',5,'derby','Sharp','PD5033D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(471,502,'PD502',10,'derby','Sharp','PD5023D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(472,501,'PD501',4,'loafers','Round','PD5013D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(473,500,'PD500',4,'monk','Sharp','PD5003D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(474,499,'PD499',5,'derby','Sharp','PD4993D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(475,498,'PD498',7,'monk','Sharp','PD4983D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(476,497,'PD497',6,'boot','Sharp','PD4973D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(477,496,'PD496',5,'oxford','Round','PD4963D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(478,495,'PD495',9,'derby','Sharp','PD4953D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(479,494,'PD494',7,'derby','Sharp','PD4943D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(480,493,'PD493',10,'monk','Round','PD4933D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(481,492,'PD492',4,'boot','Cut','PD4923D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(482,491,'PD491',10,'monk','Round','PD4913D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(483,489,'PD489',6,'boot','Round','PD4893D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(484,488,'PD488',5,'monk','Sharp','PD4883D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(485,487,'PD487',5,'oxford','Cut','PD4873D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(486,485,'PD485',4,'derby','Cut','PD4853D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(487,484,'PD484',5,'derby','Cut','PD4843D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(488,483,'PD482',4,'boot','Round','PD4823D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(489,481,'PD481',9,'monk','Round','PD4813D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(490,479,'PD479',5,'monk','Round','PD4793D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(491,477,'PD477',5,'monk','Round','PD4773D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(492,476,'PD476',10,'boot','Round','PD4763D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(493,475,'PD475',4,'boot','Round','PD4753D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(494,473,'PD473',4,'boot','Round','PD4733D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(495,472,'PD472',8,'boot','Round','PD4723D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(496,471,'PD471',9,'boot','Round','PD4713D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(497,470,'PD470',4,'boot','Round','PD4703D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(498,468,'PD468',6,'boot','Sharp','PD4683D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(499,467,'PD467',10,'boot','Sharp','PD4673D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(500,466,'PD466',5,'boot','Round','PD4663D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(501,464,'PD464',4,'boot','Round','PD4643D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(502,463,'PD462',4,'monk','Round','PD4623D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(503,461,'PD461',4,'monk','Round','PD4613D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(504,460,'PD460',7,'monk','Sharp','PD4603D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(505,459,'PD459',7,'monk','Sharp','PD4593D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(506,458,'PD458',6,'monk','Sharp','PD4583D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(507,457,'PD457',8,'boot','Round','PD4573D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(508,456,'PD456',10,'loafers','Sharp','PD4563D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(509,455,'PD455',6,'loafers','Sharp','PD4553D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(510,454,'PD454',4,'loafers','Sharp','PD4543D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(511,453,'PD453',5,'loafers','Round','PD4533D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(512,452,'PD452',5,'loafers','Round','PD4523D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(513,450,'PD450',4,'loafers','Cut','PD4503D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(514,449,'PD449',5,'loafers','Round','PD4493D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(515,448,'PD448',4,'derby','Round','PD4483D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(516,446,'PD446',10,'derby','Sharp','PD4463D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(517,445,'PD445',4,'derby','Round','PD4453D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(518,444,'PD444',4,'derby','Sharp','PD4443D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(519,443,'PD443',5,'derby','Sharp','PD4433D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(520,442,'PD442',5,'derby','Sharp','PD4423D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(521,441,'PD441',10,'derby','Sharp','PD4413D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(522,440,'PD440',6,'derby','Sharp','PD4403D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(523,438,'PD438',10,'derby','Sharp','PD4383D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(524,436,'PD436',5,'derby','Round','PD4363D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(525,435,'PD435',8,'derby','Sharp','PD4353D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(526,434,'PD434',5,'derby','Sharp','PD4343D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(527,433,'PD433',5,'derby','Sharp','PD4333D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(528,432,'PD432',5,'derby','Sharp','PD4323D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(529,431,'PD431',10,'derby','Sharp','PD4313D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(530,429,'PD429',10,'derby','Sharp','PD4293D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(531,428,'PD428',9,'derby','Round','PD4283D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(532,426,'PD426',4,'derby','Round','PD4263D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(533,425,'PD425',10,'derby','Cut','PD4253D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(534,424,'PD424',4,'derby','Round','PD4243D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(535,423,'PD423',5,'derby','Round','PD4233D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(536,422,'PD422',4,'derby','Round','PD4223D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(537,421,'PD421',5,'oxford','Sharp','PD4213D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(538,420,'PD420',5,'oxford','Sharp','PD4203D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(539,419,'PD419',10,'oxford','Round','PD4193D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(540,417,'PD417',6,'oxford','Round','PD4173D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(541,416,'PD416',6,'derby','Round','PD4163D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(542,415,'PD415',9,'derby','Round','PD4153D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(543,414,'PD414',4,'oxford','Cut','PD4143D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(544,413,'PD413',4,'loafers','Sharp','PD4133D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(545,412,'PD391',10,'oxford','Cut','PD3913D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(546,390,'PD390',5,'oxford','Round','PD3903D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(547,389,'PD389',10,'derby','Round','PD3893D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(548,388,'PD388',6,'derby','Sharp','PD3883D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(549,387,'PD387',4,'loafers','Round','PD3873D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(550,378,'PD378',4,'derby','Cut','PD3783D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(551,376,'PD376',10,'fashion','Cut','PD3763D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(552,375,'PD375',10,'oxford','Round','PD3753D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(553,374,'PD374',4,'derby','Sharp','PD3743D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(554,373,'PD373',10,'oxford','Round','PD3733D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(555,372,'PD372',5,'fashion','Round','PD3723D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(556,371,'PD371',7,'derby','Sharp','PD3713D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(557,370,'PD369',6,'oxford','Round','PD3693D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(558,367,'PD367',6,'loafers','Sharp','PD3673D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(559,366,'PD366',9,'loafers','Round','PD3663D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(560,365,'PD365',4,'loafers','Sharp','PD3653D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(561,364,'PD364',4,'loafers','Round','PD3643D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(562,362,'PD362',4,'loafers','Round','PD3623D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(563,361,'PD361',8,'loafers','Round','PD3613D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(564,360,'PD360',10,'loafers','Sharp','PD3603D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(565,359,'PD359',10,'loafers','Sharp','PD3593D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(566,358,'PD358',9,'loafers','Sharp','PD3583D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(567,356,'PD356',6,'loafers','Sharp','PD3563D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(568,354,'PD354',7,'loafers','Round','PD3543D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(569,353,'PD353',8,'loafers','Round','PD3533D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(570,352,'PD352',10,'loafers','Sharp','PD3523D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(571,351,'PD351',10,'loafers','Round','PD3513D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(572,350,'PD350',10,'loafers','Sharp','PD3503D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(573,349,'PD349',4,'derby','Sharp','PD3493D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(574,348,'PD348',4,'derby','Round','PD3483D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(575,347,'PD347',4,'derby','Cut','PD3473D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(576,346,'PD346',10,'derby','Round','PD3463D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(577,345,'PD345',5,'derby','Sharp','PD3453D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(578,344,'PD344',5,'derby','Sharp','PD3443D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(579,343,'PD343',5,'derby','Sharp','PD3433D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(580,342,'PD342',6,'derby','Sharp','PD3423D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(581,340,'PD340',4,'derby','Sharp','PD3403D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(582,337,'PD337',9,'derby','Sharp','PD3373D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(583,336,'PD336',7,'derby','Round','PD3363D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(584,335,'PD335',7,'derby','Round','PD3353D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(585,334,'PD334',7,'derby','Sharp','PD3343D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(586,333,'PD333',4,'derby','Sharp','PD3333D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(587,332,'PD332',10,'derby','Sharp','PD3323D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(588,330,'PD330',4,'derby','Round','PD3303D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(589,329,'PD329',10,'derby','Cut','PD3293D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(590,328,'PD328',5,'derby','Sharp','PD3283D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(591,327,'PD327',5,'derby','Round','PD3273D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(592,326,'PD326',9,'derby','Sharp','PD3263D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(593,325,'PD325',4,'oxford','Sharp','PD3253D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(594,324,'PD324',4,'oxford','Sharp','PD3243D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(595,323,'PD323',10,'oxford','Round','PD3233D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(596,321,'PD321',6,'oxford','Sharp','PD3213D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(597,320,'PD320',10,'oxford','Sharp','PD3203D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(598,319,'PD319',10,'oxford','Cut','PD3193D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(599,318,'PD318',4,'oxford','Round','PD3183D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(600,316,'PD316',9,'oxford','Sharp','PD3163D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(601,315,'PD315',10,'oxford','Sharp','PD3153D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(602,314,'PD314',6,'oxford','Round','PD3143D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(603,313,'PD313',10,'oxford','Sharp','PD3133D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(604,312,'PD312',4,'oxford','Round','PD3123D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(605,311,'PD311',10,'oxford','Sharp','PD3113D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(606,310,'PD310',5,'oxford','Round','PD3103D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(607,309,'PD309',4,'oxford','Cut','PD3093D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(608,308,'PD308',4,'oxford','Round','PD3083D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(609,307,'PD307',10,'oxford','Sharp','PD3073D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(610,306,'PD306',4,'oxford','Round','PD3063D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(611,304,'PD304',10,'oxford','Sharp','PD3043D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(612,303,'PD303',5,'oxford','Round','PD3033D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(613,301,'PD301',4,'oxford','Sharp','PD3013D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(614,300,'PD300',10,'oxford','Sharp','PD3003D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(615,299,'PD299',6,'oxford','Round','PD2993D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(616,297,'PD297',10,'oxford','Sharp','PD2973D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(617,296,'PD296',4,'oxford','Round','PD2963D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(618,295,'PD295',4,'oxford','Round','PD2953D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(619,294,'PD294',4,'oxford','Round','PD2943D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(620,293,'PD293',9,'oxford','Sharp','PD2933D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(621,291,'PD291',5,'oxford','Sharp','PD2913D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(622,290,'PD290',10,'oxford','Cut','PD2903D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(623,289,'PD289',10,'oxford','Round','PD2893D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(624,288,'PD288',10,'oxford','Round','PD2883D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(625,287,'PD287',5,'oxford','Sharp','PD2873D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(626,285,'PD285',10,'oxford','Sharp','PD2853D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(627,284,'PD284',4,'derby','Round','PD2843D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(628,282,'PD282',10,'oxford','Cut','PD2823D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(629,281,'PD281',10,'oxford','Sharp','PD2813D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(630,280,'PD278',4,'loafers','Round','PD2783D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(631,275,'PD275',4,'fashion','Sharp','PD2753D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(632,273,'PD273',10,'oxford','Round','PD2733D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(633,271,'PD271',6,'derby','Cut','PD2713D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(634,269,'PD269',4,'derby','Sharp','PD2693D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(635,268,'PD268',8,'derby','Round','PD2683D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(636,267,'PD267',6,'fashion','Round','PD2673D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(637,265,'PD265',6,'derby','Round','PD2653D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(638,264,'PD264',4,'derby','Sharp','PD2643D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(639,263,'PD263',4,'oxford','Round','PD2633D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(640,262,'PD262',8,'loafers','Sharp','PD2623D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(641,261,'PD261',5,'oxford','Sharp','PD2613D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(642,260,'PD260',4,'derby','Sharp','PD2603D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(643,259,'PD259',6,'derby','Sharp','PD2593D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(644,258,'PD258',7,'loafers','Cut','PD2583D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(645,257,'PD257',10,'derby','Cut','PD2573D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(646,255,'PD255',4,'oxford','Round','PD2553D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(647,252,'PD252',5,'loafers','Sharp','PD2523D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(648,251,'PD251',10,'oxford','Sharp','PD2513D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(649,234,'PD234',5,'derby','Sharp','PD2343D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(650,222,'PD175',8,'oxford','Sharp','PD1753D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(651,172,'PD396881',5,'loafers','Round','loafers1723D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(652,169,'PD660950',4,'loafers','Cut','loafers1683D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(653,167,'PD304687',4,'loafers','Cut','loafers1663D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(654,165,'PD94665',6,'fashion','Sharp','fashion1653D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(655,164,'PD101654',5,'fashion','Round','fashion1643D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(656,162,'PD770905',9,'fashion','Round','fashion1623D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(657,161,'PD484070',7,'fashion','Round','fashion1613D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(658,160,'PD602417',6,'derby','Sharp','derby1603D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(659,159,'PD784088',8,'loafers','Cut','loafers1583D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(660,156,'PD30578',8,'oxford','Sharp','oxford1563D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(661,152,'PD87036',9,'derby','Sharp','derby1523D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(662,150,'PD126434',10,'derby','Round','derby1503D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(663,149,'PD310791',4,'derby','Sharp','derby1493D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(664,148,'PD99212',10,'derby','Sharp','derby1463D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(665,144,'PD184112',7,'oxford','Round','oxford1443D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(666,143,'PD216888',5,'oxford','Round','oxford1433D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(667,142,'PD618897',4,'oxford','Round','oxford1423D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(668,141,'PD224945',7,'fashion','Round','fashion1413D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(669,138,'PD887085',5,'loafers','Sharp','loafers1383D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(670,137,'PD605469',9,'loafers','Sharp','loafers1373D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(671,136,'PD319946',4,'derby','Sharp','derby1363D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(672,133,'PD920838',5,'derby','Sharp','derby1333D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(673,132,'PD714386',4,'derby','Sharp','derby1323D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(674,131,'PD908600',10,'fashion','Round','fashion1313D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(675,130,'PD678223',4,'derby','Sharp','derby1303D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(676,128,'PD889862',4,'oxford','Sharp','oxford1283D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(677,125,'PD740662',5,'loafers','Sharp','loafers1253D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(678,122,'PD509979',4,'derby','Round','derby1223D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(679,119,'PD131561',6,'loafers','Sharp','loafers1193D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(680,117,'PD343384',5,'oxford','Round','oxford1173D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(681,116,'PD416656',4,'derby','Sharp','derby1163D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(682,112,'PD307892',6,'derby','Sharp','derby1123D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12'),
(683,111,'PD781403',8,'derby','Sharp','derby03D.png','3D','2022-02-04 02:11:12','2022-02-04 02:11:12');

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `fronts` */

DROP TABLE IF EXISTS `fronts`;

CREATE TABLE `fronts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(80) CHARACTER SET ascii NOT NULL,
  `name` varchar(80) CHARACTER SET ascii NOT NULL,
  `path` varchar(80) CHARACTER SET ascii NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `key` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=utf8;

/*Data for the table `fronts` */

insert  into `fronts`(`id`,`key`,`name`,`path`,`created_at`,`updated_at`) values 
(1,'frontFN9','FN9','FN9','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(2,'frontLT-001','LT-001','LT-001','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(3,'frontSH-SG013','SH-SG013','SH-SG013','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(4,'front1100-10','1100-10','1100-10','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(5,'front1100-2','1100-2','1100-2','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(6,'frontSH-SG08','SH-SG08','SH-SG08','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(7,'frontLT-002','LT-002','LT-002','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(8,'frontFN10','FN10','FN10','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(9,'frontFN4','FN4','FN4','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(10,'frontLT-005','LT-005','LT-005','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(11,'frontSH-SG06','SH-SG06','SH-SG06','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(12,'frontSH-SG01','SH-SG01','SH-SG01','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(13,'frontLT-006','LT-006','LT-006','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(14,'frontFN2','FN2','FN2','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(15,'front1100-4','1100-4','1100-4','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(16,'front1100-5','1100-5','1100-5','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(17,'frontLT-007','LT-007','LT-007','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(18,'frontFN13','FN13','FN13','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(19,'frontS012-05','S012-05','S012-05','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(20,'frontS012-01','S012-01','S012-01','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(21,'frontFN5','FN5','FN5','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(22,'frontLT-014','LT-014','LT-014','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(23,'frontLT-020','LT-020','LT-020','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(24,'frontGOL-06','GOL-06','GOL-06','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(25,'frontS012-08','S012-08','S012-08','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(26,'front1100-9','1100-9','1100-9','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(27,'front1104-1','1104-1','1104-1','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(28,'frontSH-SW02','SH-SW02','SH-SW02','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(29,'frontGOL-01','GOL-01','GOL-01','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(30,'frontLT-015','LT-015','LT-015','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(31,'frontLT-018','LT-018','LT-018','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(32,'frontGOL-07','GOL-07','GOL-07','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(33,'frontSH-SW06','SH-SW06','SH-SW06','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(34,'front1104-3','1104-3','1104-3','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(35,'frontArmyC','ArmyC','ArmyC','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(36,'frontSH-SW01','SH-SW01','SH-SW01','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(37,'frontGOL-02','GOL-02','GOL-02','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(38,'frontLT-030','LT-030','LT-030','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(39,'frontLT-035','LT-035','LT-035','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(40,'frontLT-024','LT-024','LT-024','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(41,'frontGOL-03','GOL-03','GOL-03','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(42,'frontSH-SW10','SH-SW10','SH-SW10','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(43,'frontArmyT','ArmyT','ArmyT','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(44,'frontGOL-05','GOL-05','GOL-05','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(45,'frontLT-025','LT-025','LT-025','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(46,'frontLT-028','LT-028','LT-028','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(47,'frontSH-SW03','SH-SW03','SH-SW03','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(48,'frontItaly1','Italy1','Italy1','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(49,'frontItaly10','Italy10','Italy10','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(50,'frontSH-SW05','SH-SW05','SH-SW05','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(51,'frontLT-048','LT-048','LT-048','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(52,'frontSH-SW04','SH-SW04','SH-SW04','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(53,'frontLT-043','LT-043','LT-043','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(54,'frontLT-041','LT-041','LT-041','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(55,'frontFB01','FB01','FB01','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(56,'frontFB02','FB02','FB02','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(57,'frontItaly7','Italy7','Italy7','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(58,'frontLT-040','LT-040','LT-040','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(59,'frontSHMS02-SCM-Copper','SHMS02-SCM-Copper','SHMS02-SCM-Copper','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(60,'frontSHMS02-SCM-DarkGold','SHMS02-SCM-DarkGold','SHMS02-SCM-DarkGold','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(61,'frontItaly9','Italy9','Italy9','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(62,'frontLT-047','LT-047','LT-047','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(63,'frontFB03','FB03','FB03','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(64,'frontFB04','FB04','FB04','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(65,'frontItaly8','Italy8','Italy8','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(66,'frontLT-045','LT-045','LT-045','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(67,'frontSHMS02-SCM-Gold','SHMS02-SCM-Gold','SHMS02-SCM-Gold','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(68,'frontLT-022','LT-022','LT-022','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(69,'frontItaly6','Italy6','Italy6','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(70,'frontFB05','FB05','FB05','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(71,'frontFB06','FB06','FB06','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(72,'frontBOF_1','BOF_1','BOF_1','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(73,'frontItaly3','Italy3','Italy3','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(74,'frontItaly4','Italy4','Italy4','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(75,'frontBOF_2','BOF_2','BOF_2','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(76,'frontFB07','FB07','FB07','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(77,'frontFB08','FB08','FB08','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(78,'frontBOF_3','BOF_3','BOF_3','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(79,'frontItaly5','Italy5','Italy5','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(80,'frontItaly2','Italy2','Italy2','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(81,'frontsuede1','suede1','suede1','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(82,'frontLT-SM11','LT-SM11','LT-SM11','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(83,'frontsuede2','suede2','suede2','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(84,'frontLT-SM20','LT-SM20','LT-SM20','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(85,'frontLT-SM16','LT-SM16','LT-SM16','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(86,'frontsuede3','suede3','suede3','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(87,'frontsuede6','suede6','suede6','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(88,'frontLT-013','LT-013','LT-013','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(89,'frontsuede7','suede7','suede7','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(90,'frontLT-SM19','LT-SM19','LT-SM19','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(91,'frontsuede8','suede8','suede8','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(92,'frontLT-SM10','LT-SM10','LT-SM10','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(93,'frontLT-SM12','LT-SM12','LT-SM12','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(94,'frontsuede9','suede9','suede9','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(95,'frontsuede10','suede10','suede10','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(96,'frontLT-SM14','LT-SM14','LT-SM14','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(97,'frontsuede11','suede11','suede11','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(98,'frontLT-SM03','LT-SM03','LT-SM03','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(99,'frontsuede12','suede12','suede12','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(100,'frontLT-SM21','LT-SM21','LT-SM21','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(101,'frontsuede13','suede13','suede13','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(102,'frontLT-SM02','LT-SM02','LT-SM02','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(103,'frontLT-SM06','LT-SM06','LT-SM06','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(104,'frontsuede15','suede15','suede15','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(105,'frontsuede16','suede16','suede16','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(106,'frontLT-SM07','LT-SM07','LT-SM07','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(107,'frontLT-SM22','LT-SM22','LT-SM22','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(108,'frontLT-SM15','LT-SM15','LT-SM15','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(109,'frontLT-SM01','LT-SM01','LT-SM01','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(110,'frontLT-SM18','LT-SM18','LT-SM18','2022-02-04 01:50:24','2022-02-04 01:50:24'),
(111,'frontLT-SM23','LT-SM23','LT-SM23','2022-02-04 01:50:24','2022-02-04 01:50:24');

/*Table structure for table `laces` */

DROP TABLE IF EXISTS `laces`;

CREATE TABLE `laces` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(80) CHARACTER SET ascii NOT NULL,
  `name` varchar(80) CHARACTER SET ascii NOT NULL,
  `path` varchar(80) CHARACTER SET ascii NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `key` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `laces` */

insert  into `laces`(`id`,`key`,`name`,`path`,`created_at`,`updated_at`) values 
(1,'HT-Black','HT-Black','Special/laces/HT-Black','2022-02-04 01:59:46','2022-02-04 01:59:46'),
(2,'HT-Blue','HT-Blue','Special/laces/HT-Blue','2022-02-04 01:59:46','2022-02-04 01:59:46'),
(3,'HT-Brown','HT-Brown','Special/laces/HT-Brown','2022-02-04 01:59:46','2022-02-04 01:59:46'),
(4,'HT-Cream','HT-Cream','Special/laces/HT-Cream','2022-02-04 01:59:46','2022-02-04 01:59:46'),
(5,'HT-Green','HT-Green','Special/laces/HT-Green','2022-02-04 01:59:46','2022-02-04 01:59:46'),
(6,'HT-Orange','HT-Orange','Special/laces/HT-Orange','2022-02-04 01:59:46','2022-02-04 01:59:46'),
(7,'HT-red','HT-Red','Special/laces/HT-red','2022-02-04 01:59:46','2022-02-04 01:59:46'),
(8,'HT-Yellow','HT-Yellow','Special/laces/HT-Yellow','2022-02-04 01:59:46','2022-02-04 01:59:46');

/*Table structure for table `languages` */

DROP TABLE IF EXISTS `languages`;

CREATE TABLE `languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `texts` text DEFAULT NULL,
  `English` text DEFAULT NULL,
  `China` text DEFAULT NULL,
  `French` text DEFAULT NULL,
  `German` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `texts` (`texts`) USING HASH
) ENGINE=InnoDB AUTO_INCREMENT=283 DEFAULT CHARSET=utf8;

/*Data for the table `languages` */

insert  into `languages`(`id`,`texts`,`English`,`China`,`French`,`German`,`created_at`,`updated_at`) values 
(1,'about-us','About Us','关于我们',NULL,NULL,NULL,'2022-02-05 14:44:57'),
(2,'accessory-style','ACCESSORY STYLE','附件风格',NULL,NULL,NULL,'2022-02-05 14:44:57'),
(3,'address','Address*:','地址',NULL,NULL,NULL,'2022-02-05 14:44:57'),
(4,'back-color','Back color:','后边的颜色',NULL,NULL,NULL,'2022-02-05 14:44:57'),
(5,'back-color-detail','BACK COLOR','后面的颜色',NULL,NULL,NULL,'2022-02-05 14:44:57'),
(6,'back-style','BACK STYLE','后边的风格',NULL,NULL,NULL,'2022-02-05 14:44:57'),
(7,'bodySize','Body Size','身体的大小',NULL,NULL,NULL,'2022-02-05 14:44:57'),
(8,'boots-shoes','BOOTS SHOES','靴鞋',NULL,NULL,NULL,'2022-02-05 14:44:57'),
(9,'brogue-design','BROGUE COLOR','粗革皮鞋的颜色',NULL,NULL,NULL,'2022-02-05 14:44:57'),
(10,'brogue-designs','Brogue Design:','设计粗革皮鞋',NULL,NULL,NULL,'2022-02-05 14:44:57'),
(11,'btn-add-cart','ADD TO CART','加进购物车',NULL,NULL,NULL,'2022-02-05 14:44:57'),
(12,'btn-apply','Apply','申请',NULL,NULL,NULL,'2022-02-05 14:44:57'),
(13,'btn-back-style','BACK STEP','向后一步',NULL,NULL,NULL,'2022-02-05 14:44:57'),
(14,'btn-cont','CONTINUE SHOPPING','继续购物',NULL,NULL,NULL,'2022-02-05 14:44:57'),
(15,'btn-next-style','NEXT STEP','下一步',NULL,NULL,NULL,'2022-02-05 14:44:57'),
(16,'btn-redo','REDO','改装',NULL,NULL,NULL,'2022-02-05 14:44:57'),
(17,'btn-undo','UNDO','解开',NULL,NULL,NULL,'2022-02-05 14:44:57'),
(18,'cate-1','PREMIUM LEATHER','高级皮革',NULL,NULL,NULL,'2022-02-05 14:44:57'),
(19,'cate-2','FASHION LEATHER','时尚皮革',NULL,NULL,NULL,'2022-02-05 14:44:57'),
(20,'cate-3','SHEEPSKIN LEATHER','羊皮',NULL,NULL,NULL,'2022-02-05 14:44:57'),
(21,'cate-4','FABRIC','FABRIC',NULL,NULL,NULL,'2022-02-05 14:44:57'),
(22,'ccc5','Credit Card Surcharge :','Credit Card Surcharge :',NULL,NULL,NULL,'2022-02-05 14:44:57'),
(23,'ccc5-desc','This is for PayPal business transaction commission and exchange rate.','This is for PayPal business transaction commission and exchange rat',NULL,NULL,NULL,'2022-02-05 14:44:57'),
(24,'check-out','CHECK OUT >>','检查',NULL,NULL,NULL,'2022-02-05 14:44:57'),
(25,'chkcol1','Items','项目',NULL,NULL,NULL,'2022-02-05 14:44:57'),
(26,'chkcol2','Order Date','订单日期',NULL,NULL,NULL,'2022-02-05 14:44:57'),
(27,'chkcol3','Item Description','项目说明',NULL,NULL,NULL,'2022-02-05 14:44:57'),
(28,'chkcol4','Price','价格',NULL,NULL,NULL,'2022-02-05 14:44:57'),
(29,'chkcol5','Shipping','运输',NULL,NULL,NULL,'2022-02-05 14:44:57'),
(30,'chkcol6','Qty','数量',NULL,NULL,NULL,'2022-02-05 14:44:57'),
(31,'chkcol7','Remove','去除',NULL,NULL,NULL,'2022-02-05 14:44:57'),
(32,'chkcol8','Remain','剩余物',NULL,NULL,NULL,'2022-02-05 14:44:57'),
(33,'chkcol9','Curr.','货币',NULL,NULL,NULL,'2022-02-05 14:44:57'),
(34,'chkcol10','No.','号码',NULL,NULL,NULL,'2022-02-05 14:44:57'),
(35,'chkcol11','Product','产品',NULL,NULL,NULL,'2022-02-05 14:44:57'),
(36,'choose-accessory','Choose Your Accessory Style','选择你的附件风格',NULL,NULL,NULL,'2022-02-05 14:45:11'),
(37,'choose-back','Choose Your Back Style','选择你的后边风格',NULL,NULL,NULL,'2022-02-05 14:45:11'),
(38,'choose-continue','Choose & continue','选择&继续',NULL,NULL,NULL,'2022-02-05 14:45:11'),
(39,'choose-front','Choose Your Front Style','选择你的前边风格',NULL,NULL,NULL,'2022-02-05 14:45:11'),
(40,'choose-leather','Choose Your Leather','挑选你的皮革',NULL,NULL,NULL,'2022-02-05 14:45:11'),
(41,'choose-lining','choose Lining:','选择线',NULL,NULL,NULL,'2022-02-05 14:45:11'),
(42,'choose-shape','Choose Your Shape Style','选择你的形状风格',NULL,NULL,NULL,'2022-02-05 14:45:11'),
(43,'choose-side','Choose Your Side Style','选择你的侧面风格',NULL,NULL,NULL,'2022-02-05 14:45:11'),
(44,'choose-side-monk','Choose Your Strap Style','Choose Your Strap Style',NULL,NULL,NULL,'2022-02-05 14:45:11'),
(45,'choose-sole','Choose Your Sole Style','选择你的鞋底风格',NULL,NULL,NULL,'2022-02-05 14:45:11'),
(46,'choose-types','CHOOSE SHOE TYPE','选择鞋的种类',NULL,NULL,NULL,'2022-02-05 14:45:11'),
(47,'city','City*:','城市',NULL,NULL,NULL,'2022-02-05 14:45:11'),
(48,'click-here','click here','点击这里',NULL,NULL,NULL,'2022-02-05 14:45:11'),
(49,'close','close','关店',NULL,NULL,NULL,'2022-02-05 14:45:11'),
(50,'collection','Collection','产品类别',NULL,NULL,NULL,'2022-02-05 14:45:11'),
(51,'contact-us','Contact Us','联系我们',NULL,NULL,NULL,'2022-02-05 14:45:11'),
(52,'country','Country*:','国家',NULL,NULL,NULL,'2022-02-05 14:45:11'),
(53,'coupon-dis-text','Coupon Discount ','打折券',NULL,NULL,NULL,'2022-02-05 14:45:11'),
(54,'couponInputText','Coupon No. :','优惠券号码',NULL,NULL,NULL,'2022-02-05 14:45:11'),
(55,'couponToggle','Do you have coupon code?','你有优惠券代码吗？',NULL,NULL,NULL,'2022-02-05 14:45:11'),
(56,'currency','Currency',' 货币',NULL,NULL,NULL,'2022-02-05 14:45:11'),
(57,'custom-jeans','CUSTOM TIES','领带',NULL,NULL,NULL,'2022-02-05 14:45:11'),
(58,'delivery','Delivery','传送',NULL,NULL,NULL,'2022-02-05 14:45:11'),
(59,'derby-shoes','DERBY SHOES','德比鞋',NULL,NULL,NULL,'2022-02-05 14:45:11'),
(60,'design-by','Design by  ','设计',NULL,NULL,NULL,'2022-02-05 14:45:11'),
(61,'design-idea','Design idea!','设计思想',NULL,NULL,NULL,'2022-02-05 14:45:11'),
(62,'design-ideas','Design ideas','设计理念',NULL,NULL,NULL,'2022-02-05 14:45:11'),
(63,'detail-forget-line1','Just enter the email address associated with your itailor account below and click send.','只要输入与您的itailor帐户连接的邮箱地址，并点击“发送”。',NULL,NULL,NULL,'2022-02-05 14:45:25'),
(64,'detail-forget-line2','You will shortly receive an email containing your password.','您很快就会收到一封包含您密码的邮件。',NULL,NULL,NULL,'2022-02-05 14:45:25'),
(65,'detail-login','For first time customers,please proceed to design your order.During checkout,you will be able to submit your email and password to setup an account with us.Enjoy your designing experience on iTailor.','对于第一次订购的客户，请进行设计您的订单，结帐时，你就能提交您的邮箱',NULL,NULL,NULL,'2022-02-05 14:45:25'),
(66,'do-you-want-remove-item','Do you want to remove Item Product ?','你是否要去除产品？',NULL,NULL,NULL,'2022-02-05 14:45:25'),
(67,'email','Email*:','邮箱地址',NULL,NULL,NULL,'2022-02-05 14:45:25'),
(68,'email-or-pass','Email or Password invalid.',' 邮箱地址或者密码无效',NULL,NULL,NULL,'2022-02-05 14:45:25'),
(69,'emty-add-cart','Your cart is Empty.','您的购物车是空的',NULL,NULL,NULL,'2022-02-05 14:45:25'),
(70,'emty-pre-design','Emty Pre Design.','空虚的预设计',NULL,NULL,NULL,'2022-02-05 14:45:25'),
(71,'error','ERROR','错误',NULL,NULL,NULL,'2022-02-05 14:45:25'),
(72,'error-monogram','Your Monogram is Empty.','您的图案是空的',NULL,NULL,NULL,'2022-02-05 14:45:25'),
(73,'exit','EXIT','出口',NULL,NULL,NULL,'2022-02-05 14:45:25'),
(74,'expire-coupon','Coupon Expired.','优惠券到期',NULL,NULL,NULL,'2022-02-05 14:45:25'),
(75,'faq','FAQ','常见问题解答',NULL,NULL,NULL,'2022-02-05 14:45:25'),
(76,'fashion-shoes','FASHION SHOES','时尚鞋',NULL,NULL,NULL,'2022-02-05 14:45:25'),
(77,'first-name','First Name*:','名字',NULL,NULL,NULL,'2022-02-05 14:45:25'),
(78,'forgot-password','Forgot your Password','忘记您的密码',NULL,NULL,NULL,'2022-02-05 14:45:25'),
(79,'front-color','Front color:','前边的颜色',NULL,NULL,NULL,'2022-02-05 14:45:25'),
(80,'front-color-detail','FRONT COLOR','前面的颜色',NULL,NULL,NULL,'2022-02-05 14:45:25'),
(81,'front-style','FRONT STYLE','前面的风格',NULL,NULL,NULL,'2022-02-05 14:45:25'),
(82,'front-style-detail','FRONT STYLE','前面风格',NULL,NULL,NULL,'2022-02-05 14:45:25'),
(83,'go-back','Go Back','回去',NULL,NULL,NULL,'2022-02-05 14:45:25'),
(84,'go-back-design-idea','<< GO BACK','回去',NULL,NULL,NULL,'2022-02-05 14:45:25'),
(85,'home','HOME','家',NULL,NULL,NULL,'2022-02-05 14:45:25'),
(86,'inside-inside','INSIDE SOLE','鞋底的里面',NULL,NULL,NULL,'2022-02-05 14:45:25'),
(87,'inside-lining','INSIDE LINING','衬料的里面',NULL,NULL,NULL,'2022-02-05 14:45:25'),
(88,'invalid-coupon','Invalid Coupon.','无效优惠券',NULL,NULL,NULL,'2022-02-05 14:45:25'),
(89,'item','Item(S)','款式',NULL,NULL,NULL,'2022-02-05 14:45:25'),
(90,'item-price-text','item(s) Price :','项目的价格',NULL,NULL,NULL,'2022-02-05 14:45:25'),
(91,'laces-color','Laces color:','鞋带的颜色',NULL,NULL,NULL,'2022-02-05 14:45:25'),
(92,'laces-color-detail','LACES COLOR','鞋带的颜色',NULL,NULL,NULL,'2022-02-05 14:45:25'),
(93,'laces-stitching','Laces/Stitching','鞋带/缝纫',NULL,NULL,NULL,'2022-02-05 14:45:25'),
(94,'last-name','Last Name*:','性',NULL,NULL,NULL,'2022-02-05 14:45:25'),
(95,'leather-color','LEATHER COLOR','皮革颜色',NULL,NULL,NULL,'2022-02-05 14:45:25'),
(96,'legth','LENGTH','长度',NULL,NULL,NULL,'2022-02-05 14:46:17'),
(97,'lengthText','Length:','长度',NULL,NULL,NULL,'2022-02-05 14:46:17'),
(98,'limit-max-save-design','Limit Max Save Design 6 Item','只限于保存设计六个款式',NULL,NULL,NULL,'2022-02-05 14:46:17'),
(99,'lining','Lining','衬料',NULL,NULL,NULL,'2022-02-05 14:46:17'),
(100,'lining-detail','LINING','衬料',NULL,NULL,NULL,'2022-02-05 14:46:17'),
(101,'loafers-shoes','LOAFERS SHOES','平底便鞋',NULL,NULL,NULL,'2022-02-05 14:46:17'),
(102,'login','Login','注册',NULL,NULL,NULL,'2022-02-05 14:46:17'),
(103,'logout','Logout',' 注销',NULL,NULL,NULL,'2022-02-05 14:46:17'),
(104,'max-match','MIX & MATCH','混合&匹配',NULL,NULL,NULL,'2022-02-05 14:46:17'),
(105,'measure-header','EASY MEASUREMENTS FOR PERFECT FIT','便于测量出完美的大小',NULL,NULL,NULL,'2022-02-05 14:46:17'),
(106,'measurement','MEASUREMENT','尺寸',NULL,NULL,NULL,'2022-02-05 14:46:47'),
(107,'measurement-detail','MEASUREMENT :','尺寸',NULL,NULL,NULL,'2022-02-05 14:46:47'),
(110,'monk-shoes','MONK SHOES','僧侣鞋',NULL,NULL,NULL,'2022-02-05 14:49:16'),
(111,'monogram','Monogram',' 图案',NULL,NULL,NULL,'2022-02-05 14:49:16'),
(112,'monogram-designed-by','Designed by','由…..设计',NULL,NULL,NULL,'2022-02-05 14:49:16'),
(113,'monogram-detail','MONOGRAM :','图案',NULL,NULL,NULL,'2022-02-05 14:49:16'),
(114,'monogram-initals','MONOGRAM/INITIALS',' 图案/ 最初的',NULL,NULL,NULL,'2022-02-05 14:49:16'),
(115,'monogram-only',': {English Script Only} ','只有英语台词',NULL,NULL,NULL,'2022-02-05 14:49:16'),
(116,'monogram-outside-sole','OUTSIDE SOLE','鞋底的外面',NULL,NULL,NULL,'2022-02-05 14:49:16'),
(117,'my-account','My Account','我的账户',NULL,NULL,NULL,'2022-02-05 14:49:16'),
(118,'my-wardrobe','My Wardrobe','我的衣橱',NULL,NULL,NULL,'2022-02-05 14:49:16'),
(119,'next','NEXT >>','下一个',NULL,NULL,NULL,'2022-02-05 14:49:16'),
(120,'no','No','不是',NULL,NULL,NULL,'2022-02-05 14:49:16'),
(121,'no-product-search','No Product item Search.','没有你所搜索的产品',NULL,NULL,NULL,'2022-02-05 14:49:16'),
(122,'of','of','的',NULL,NULL,NULL,'2022-02-05 14:49:16'),
(123,'ok','OK','好了',NULL,NULL,NULL,'2022-02-05 14:49:16'),
(124,'optSizeText','Your regular size:','您正常的大小',NULL,NULL,NULL,'2022-02-05 14:49:16'),
(125,'option','OPTION','选项',NULL,NULL,NULL,'2022-02-05 14:49:16'),
(126,'outside-sole','OUTSIDE SOLE','鞋底的外面 ',NULL,NULL,NULL,'2022-02-05 14:49:16'),
(127,'overcoal','OVERCOAT','大衣',NULL,NULL,NULL,'2022-02-05 14:49:16'),
(128,'oxford-shoes','OXFORD SHOES','牛津鞋',NULL,NULL,NULL,'2022-02-05 14:49:16'),
(129,'pageof-tag','of','的',NULL,NULL,NULL,'2022-02-05 14:49:16'),
(130,'password','Password*:','密码',NULL,NULL,NULL,'2022-02-05 14:49:16'),
(131,'pay-by-credit-card','Pay By Credit Card (Paypal)','以信用证付款',NULL,NULL,NULL,'2022-02-05 14:49:16'),
(132,'please-contact-customer','Please Contact Customer Service.','请联系客户服务处',NULL,NULL,NULL,'2022-02-05 14:49:16'),
(133,'product','Product','产品',NULL,NULL,NULL,'2022-02-05 14:49:16'),
(134,'qtyText','Qty:','数量',NULL,NULL,NULL,'2022-02-05 14:49:16'),
(135,'reg-new-member','Register New Member','注册新会员',NULL,NULL,NULL,'2022-02-05 14:49:16'),
(136,'register','Register','注册',NULL,NULL,NULL,'2022-02-05 14:49:16'),
(137,'register-new-member','Register New Member','注册新会员',NULL,NULL,NULL,'2022-02-05 14:49:16'),
(138,'review','Review','评论',NULL,NULL,NULL,'2022-02-05 14:49:16'),
(139,'save','Save','保存',NULL,NULL,NULL,'2022-02-05 14:49:16'),
(140,'save-completed','Save Completed.','保存完整',NULL,NULL,NULL,'2022-02-05 14:49:16'),
(141,'save-design','Save Design','保存设计',NULL,NULL,NULL,'2022-02-05 14:49:16'),
(142,'search','search :','搜索',NULL,NULL,NULL,'2022-02-05 14:49:16'),
(143,'shape-style','SHAPE STYLE','形态风格',NULL,NULL,NULL,'2022-02-05 14:49:16'),
(144,'shipping','Shipping','运输',NULL,NULL,NULL,'2022-02-05 14:51:34'),
(145,'shipping-text','Shipping','运输',NULL,NULL,NULL,'2022-02-05 14:51:34'),
(146,'shirt-quality','Shirt Quality','衬衫质量',NULL,NULL,NULL,'2022-02-05 14:52:04'),
(147,'shopping-cart','SHOPPING BAG','购物包',NULL,NULL,NULL,'2022-02-05 14:52:21'),
(148,'side-color','Side color:','侧面的颜色',NULL,NULL,NULL,'2022-02-05 14:52:21'),
(149,'side-color-detail','Side COLOR','侧面的颜色',NULL,NULL,NULL,'2022-02-05 14:52:21'),
(150,'side-style','SIDE STYLE','侧面风格',NULL,NULL,NULL,'2022-02-05 14:52:21'),
(151,'side-style-monk','STRAP STYLE','STRAP STYLE',NULL,NULL,NULL,'2022-02-05 14:52:21'),
(152,'sole-style','SOLE STYLE','鞋底的风格',NULL,NULL,NULL,'2022-02-05 14:52:21'),
(153,'sole-style-detail','SOLE STYLE','独特风格',NULL,NULL,NULL,'2022-02-05 14:52:21'),
(154,'special-design','SPECIAL  DESIGN','特殊设计',NULL,NULL,NULL,'2022-02-05 14:52:21'),
(155,'state','State(USA)*:','地名 （美国）',NULL,NULL,NULL,'2022-02-05 14:52:21'),
(156,'stepFour','Step 4:','第四步',NULL,NULL,NULL,'2022-02-05 14:52:21'),
(157,'stepOne','Step 1:','第一步',NULL,NULL,NULL,'2022-02-05 14:52:21'),
(158,'stepThree','Step 3:','第三步',NULL,NULL,NULL,'2022-02-05 14:52:21'),
(159,'stepTwo','Step 2:','第二步',NULL,NULL,NULL,'2022-02-05 14:52:21'),
(160,'stitching-color','Stitching color:','缝纫的颜色',NULL,NULL,NULL,'2022-02-05 14:52:34'),
(161,'stitching-color-detail','STITCHING COLOR','缝纫的颜色',NULL,NULL,NULL,'2022-02-05 14:52:34'),
(162,'str-connection-privacy','connection privacy guranteed','连接隐私保证',NULL,NULL,NULL,'2022-02-05 14:52:34'),
(163,'str-customer-info','Customer Information','客户信息',NULL,NULL,NULL,'2022-02-05 14:52:34'),
(164,'str-payment-option','We offer you payment 2 Option :','我们可以为你提供两种付费方式',NULL,NULL,NULL,'2022-02-05 14:52:34'),
(165,'str-secure-payment-ssl','Secure payment through SSL','通过SSL安全付款',NULL,NULL,NULL,'2022-02-05 14:52:34'),
(166,'style','STYLE','风格',NULL,NULL,NULL,'2022-02-05 14:52:34'),
(167,'style-detail','STYLE ','风格',NULL,NULL,NULL,'2022-02-05 14:52:34'),
(168,'sub-total','Subtotal','小计',NULL,NULL,NULL,'2022-02-05 14:52:34'),
(169,'tag-custInform','Customer Information','客户信息',NULL,NULL,NULL,'2022-02-05 14:52:34'),
(170,'tag-giftCard','Gift Card','贺卡             ',NULL,NULL,NULL,'2022-02-05 14:52:34'),
(171,'tag-history','History Ordering','订购史',NULL,NULL,NULL,'2022-02-05 14:52:34'),
(172,'tag-measInform','Sizes','大小',NULL,NULL,NULL,'2022-02-05 14:52:34'),
(173,'tailored-shirts','TAILORED SHIRTS','西服衬衫',NULL,NULL,NULL,'2022-02-05 14:52:34'),
(174,'tailored-suits','TAILORED SUITS','西装',NULL,NULL,NULL,'2022-02-05 14:52:34'),
(175,'telphone','Telphone*:','电话号码',NULL,NULL,NULL,'2022-02-05 14:52:34'),
(176,'terms','Terms','条款',NULL,NULL,NULL,'2022-02-05 14:52:34'),
(177,'thank','Thank you.','谢谢',NULL,NULL,NULL,'2022-02-05 14:52:34'),
(178,'title-monogram-position','We offer 2 Monogram position:','我们提供两个图案的位子',NULL,NULL,NULL,'2022-02-05 14:52:34'),
(179,'total','Total','总数',NULL,NULL,NULL,'2022-02-05 14:52:34'),
(180,'total-text','Total :','总数',NULL,NULL,NULL,'2022-02-05 14:52:34'),
(181,'type-of-shoes','TYPE OF SHOES','鞋的种类',NULL,NULL,NULL,'2022-02-05 14:52:34'),
(182,'valid-text','*Invalid Number','无效号码',NULL,NULL,NULL,'2022-02-05 14:52:34'),
(183,'view-detail','View Detail','查看细节',NULL,NULL,NULL,'2022-02-05 14:52:34'),
(184,'width','WIDTH','宽度',NULL,NULL,NULL,'2022-02-05 14:52:34'),
(185,'widthText','Width:','宽度',NULL,NULL,NULL,'2022-02-05 14:52:34'),
(186,'women','WOMEN','女士',NULL,NULL,NULL,'2022-02-05 14:52:34'),
(187,'x3d-shoes-designer','3D Shoes Designer','三维鞋设计师 ',NULL,NULL,NULL,'2022-02-05 14:52:34'),
(188,'yes','Yes','是',NULL,NULL,NULL,'2022-02-05 14:52:34'),
(189,'zip-code','Zip Code*:','邮政骗码',NULL,NULL,NULL,'2022-02-05 14:52:34'),
(190,'menu','MENU','菜单',NULL,NULL,NULL,'2022-02-05 14:52:46'),
(191,'mix-match','Mix & Match',NULL,NULL,NULL,NULL,'2022-02-05 14:53:29'),
(192,'shop-by-product','shop by product',NULL,NULL,NULL,NULL,'2022-02-05 14:53:29'),
(262,'choose-your-leather','Choose Your Leather',NULL,NULL,NULL,NULL,'2022-02-11 09:57:15'),
(263,'choose-your-sole-style','Choose Your Sole',NULL,NULL,NULL,NULL,'2022-02-11 09:57:15'),
(264,'nextstep','NEXT STEP',NULL,NULL,NULL,NULL,'2022-02-11 09:57:15'),
(265,'backstep','BACK',NULL,NULL,NULL,NULL,'2022-02-11 09:57:15'),
(267,'easy-measurement','EASY MEASUREMENTS FOR PERFECT FIT',NULL,NULL,NULL,NULL,'2022-02-11 09:57:15'),
(268,'step1','Step 1:',NULL,NULL,NULL,NULL,'2022-02-11 09:57:15'),
(269,'step2','Step 2:',NULL,NULL,NULL,NULL,'2022-02-11 09:57:15'),
(270,'step3','Step 3:',NULL,NULL,NULL,NULL,'2022-02-11 09:57:15'),
(271,'step4','Step 4:',NULL,NULL,NULL,NULL,'2022-02-11 09:57:15'),
(272,'length','Length:',NULL,NULL,NULL,NULL,'2022-02-11 09:57:15'),
(273,'your-regular-size','Your regular size:',NULL,NULL,NULL,NULL,'2022-02-11 09:57:15'),
(274,'add-to-card','ADD TO CART',NULL,NULL,NULL,NULL,'2022-02-11 09:57:15'),
(275,'click-change-leather','Click to Change Leather',NULL,NULL,NULL,NULL,'2022-02-11 09:57:15'),
(276,'english-script','ENTER YOUR MONOGRAM (English Script Only)',NULL,NULL,NULL,NULL,'2022-02-11 09:57:15'),
(277,'oxford-desc','Oxford shoe is a style of leather shoe with enclosed lacing. You can customize each area with iShoes 3D Designer from combining 100s of leather and thousands of styles',NULL,NULL,NULL,NULL,'2022-02-11 09:57:15'),
(278,'derby-desc','Derby shoe(or Gibson) is a style of shoe characterized by shoelace eyelet tabs that are sewn on top of a single-piece vamp.You will be able to customize/design every detail of this Derby Shoes type.',NULL,NULL,NULL,NULL,'2022-02-11 09:57:15'),
(279,'loafers-desc','Loafers are typically low, lace-less shoes.there are accessory details that you can customize and create your own design in this loafer shoe type by iShoes.',NULL,NULL,NULL,NULL,'2022-02-11 09:57:15'),
(280,'fashion-desc','Fashion Shoes,are slips on lace-less shoes,it has elastic on the upper and assure high comfort,looks trendy and also smart casual shoe type.',NULL,NULL,NULL,NULL,'2022-02-11 09:57:15'),
(281,'monk-desc','Our iShoes Monk is our own collection of Monk styled shoes - no laces, closed by a buckle and strap. Monks are smart, casual-wear shoes that can also be worn formally making it the most sought after category of shoes. The design options we provide are truly limitless - you can customise the upper, side, strab, back and sole features of the shoes, as well select contrasts from over 90 leather choices.',NULL,NULL,NULL,NULL,'2022-02-11 09:57:15'),
(282,'boot-desc','Our iShoes Boot collection is our interpretation of the classic Boot design. Our boots mainly covers the foot and ankle areas. You can customise any part of the Boots with your choice of leather as well as other personalisation options.',NULL,NULL,NULL,NULL,'2022-02-11 09:57:15');

/*Table structure for table `leathers` */

DROP TABLE IF EXISTS `leathers`;

CREATE TABLE `leathers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('M','W') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'M',
  `mixgroup` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `leathers` */

insert  into `leathers`(`id`,`key`,`name`,`gender`,`mixgroup`,`created_at`,`updated_at`) values 
(1,4,'premium','M','1',NULL,NULL),
(2,5,'fashion','M','1',NULL,NULL),
(3,6,'sheep','M','2',NULL,NULL),
(4,23,'fabric','M','3',NULL,NULL);

/*Table structure for table `linings` */

DROP TABLE IF EXISTS `linings`;

CREATE TABLE `linings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(80) CHARACTER SET ascii NOT NULL,
  `name` varchar(80) CHARACTER SET ascii NOT NULL,
  `path` varchar(80) CHARACTER SET ascii NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `linings` */

insert  into `linings`(`id`,`key`,`name`,`path`,`created_at`,`updated_at`) values 
(1,'liningSH-SS01','SH-SS01','Special/Lining/SH-SS01','2022-02-04 01:59:18','2022-02-04 01:59:18'),
(2,'liningSH-SW09','SH-SW09','Special/Lining/SH-SW09','2022-02-04 01:59:18','2022-02-04 01:59:18'),
(3,'liningSH-SW08','SH-SW08','Special/Lining/SH-SW08','2022-02-04 01:59:18','2022-02-04 01:59:18'),
(4,'liningSH-SW04','SH-SW04','Special/Lining/SH-SW04','2022-02-04 01:59:18','2022-02-04 01:59:18'),
(5,'liningSH-SW13','SH-SW13','Special/Lining/SH-SW13','2022-02-04 01:59:18','2022-02-04 01:59:18'),
(6,'liningSH-SW11','SH-SW11','Special/Lining/SH-SW11','2022-02-04 01:59:18','2022-02-04 01:59:18');

/*Table structure for table `menu_items` */

DROP TABLE IF EXISTS `menu_items`;

CREATE TABLE `menu_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` int(10) unsigned DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `icon_class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `menu_items_menu_id_foreign` (`menu_id`),
  CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `menu_items` */

insert  into `menu_items`(`id`,`menu_id`,`title`,`url`,`target`,`icon_class`,`color`,`parent_id`,`order`,`created_at`,`updated_at`,`route`,`parameters`) values 
(1,1,'Dashboard','','_self','voyager-boat',NULL,NULL,1,'2022-02-02 12:36:17','2022-02-02 12:36:17','voyager.dashboard',NULL),
(2,1,'Media','','_self','voyager-images',NULL,NULL,4,'2022-02-02 12:36:17','2022-02-02 18:06:15','voyager.media.index',NULL),
(3,1,'Users','','_self','voyager-person',NULL,NULL,3,'2022-02-02 12:36:18','2022-02-02 12:36:18','voyager.users.index',NULL),
(4,1,'Roles','','_self','voyager-lock',NULL,NULL,2,'2022-02-02 12:36:18','2022-02-02 12:36:18','voyager.roles.index',NULL),
(5,1,'Tools','','_self','voyager-tools',NULL,NULL,5,'2022-02-02 12:36:18','2022-02-02 18:06:15',NULL,NULL),
(6,1,'Menu Builder','','_self','voyager-list',NULL,5,1,'2022-02-02 12:36:18','2022-02-02 18:06:15','voyager.menus.index',NULL),
(7,1,'Database','','_self','voyager-data',NULL,5,2,'2022-02-02 12:36:18','2022-02-02 18:06:15','voyager.database.index',NULL),
(8,1,'Compass','','_self','voyager-compass',NULL,5,3,'2022-02-02 12:36:19','2022-02-02 18:06:15','voyager.compass.index',NULL),
(9,1,'BREAD','','_self','voyager-bread',NULL,5,4,'2022-02-02 12:36:19','2022-02-02 18:06:15','voyager.bread.index',NULL),
(10,1,'Settings','','_self','voyager-settings',NULL,NULL,6,'2022-02-02 12:36:19','2022-02-02 18:06:15','voyager.settings.index',NULL),
(17,1,'Prices','','_self',NULL,NULL,NULL,7,'2022-02-03 03:31:48','2022-02-03 10:23:55','voyager.prices.index',NULL),
(19,1,'Carts','','_self',NULL,NULL,NULL,8,'2022-02-18 09:46:34','2022-02-18 09:46:34','voyager.carts.index',NULL);

/*Table structure for table `menus` */

DROP TABLE IF EXISTS `menus`;

CREATE TABLE `menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `menus_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `menus` */

insert  into `menus`(`id`,`name`,`created_at`,`updated_at`) values 
(1,'admin','2022-02-02 12:36:17','2022-02-02 12:36:17');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2016_01_01_000000_add_voyager_user_fields',1),
(4,'2016_01_01_000000_create_data_types_table',1),
(5,'2016_05_19_173453_create_menu_table',1),
(6,'2016_10_21_190000_create_roles_table',1),
(7,'2016_10_21_190000_create_settings_table',1),
(8,'2016_11_30_135954_create_permission_table',1),
(9,'2016_11_30_141208_create_permission_role_table',1),
(10,'2016_12_26_201236_data_types__add__server_side',1),
(11,'2017_01_13_000000_add_route_to_menu_items_table',1),
(12,'2017_01_14_005015_create_translations_table',1),
(13,'2017_01_15_000000_make_table_name_nullable_in_permissions_table',1),
(14,'2017_03_06_000000_add_controller_to_data_types_table',1),
(15,'2017_04_21_000000_add_order_to_data_rows_table',1),
(16,'2017_07_05_210000_add_policyname_to_data_types_table',1),
(17,'2017_08_05_000000_add_group_to_settings_table',1),
(18,'2017_11_26_013050_add_user_role_relationship',1),
(19,'2017_11_26_015000_create_user_roles_table',1),
(20,'2018_03_11_000000_add_user_settings',1),
(21,'2018_03_14_000000_add_details_to_data_types_table',1),
(22,'2018_03_16_000000_make_settings_value_nullable',1),
(23,'2019_08_19_000000_create_failed_jobs_table',1),
(24,'2019_12_14_000001_create_personal_access_tokens_table',1);

/*Table structure for table `mixsoleprices` */

DROP TABLE IF EXISTS `mixsoleprices`;

CREATE TABLE `mixsoleprices` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `currency` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` float NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `mixsoleprices` */

insert  into `mixsoleprices`(`id`,`currency`,`price`,`created_at`,`updated_at`) values 
(1,'USD',25,'2022-02-03 23:58:52',NULL),
(2,'GBP',15,'2022-02-03 23:58:52',NULL),
(3,'EUR',19,'2022-02-03 23:58:52',NULL),
(4,'JPY',2800,'2022-02-03 23:58:52',NULL),
(5,'DKK',159,'2022-02-03 23:58:52',NULL),
(6,'AUD',33,'2022-02-03 23:58:52',NULL),
(7,'KRW',27000,'2022-02-03 23:58:52',NULL),
(8,'THB',860,'2022-02-03 23:58:52',NULL),
(9,'SGD',34,'2022-02-03 23:58:52',NULL),
(10,'CHF',24,'2022-02-03 23:58:52',NULL),
(11,'CAD',32,'2022-02-03 23:58:52',NULL),
(12,'PLN',90,'2022-02-03 23:58:52',NULL),
(13,'CZK',542,'2022-02-03 23:58:52',NULL),
(14,'SEK',210,'2022-02-03 23:58:52',NULL),
(15,'NOK',200,'2022-02-03 23:58:52',NULL),
(16,'NZD',36,'2022-02-03 23:58:52',NULL),
(17,'RUB',1480,'2022-02-03 23:58:52',NULL);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `patina_shoes` */

DROP TABLE IF EXISTS `patina_shoes`;

CREATE TABLE `patina_shoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `title` varchar(255) DEFAULT 'Model Title',
  `details` text DEFAULT NULL,
  `sub_path1` varchar(255) DEFAULT 'view1',
  `sub_path2` varchar(255) DEFAULT 'view2',
  `sub_path3` varchar(255) DEFAULT 'view3',
  `sub_path4` varchar(255) DEFAULT 'view4',
  `sub_path5` varchar(255) DEFAULT 'view5',
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `patina_shoes` */

insert  into `patina_shoes`(`id`,`key`,`price`,`title`,`details`,`sub_path1`,`sub_path2`,`sub_path3`,`sub_path4`,`sub_path5`,`created_at`,`updated_at`) values 
(1,'PT031',233,'Model Title','<p><span style=\"color:rgb(29, 33, 41); font-size:14px\">- Upper Materials: Imported 100%\r\n	Leather with Hand Patina.</span></p>\r\n\r\n<p><span style=\"color:rgb(29, 33, 41); font-size:14px\">- Lining: Sheepskin\r\n	Leather&nbsp;</span></p>\r\n\r\n<p><span style=\"color:rgb(29, 33, 41); font-size:14px\">- Sole: Natural leather sole\r\n	with</span></p>\r\n\r\n<p><span style=\"color:rgb(29, 33, 41); font-size:14px\">- Last: Slightly Squared\r\n	Toe&nbsp;</span></p>\r\n\r\n<p><span style=\"color:rgb(29, 33, 41); font-size:14px\">&quot;Passion of Italy &amp;\r\n	France&quot;</span></p>\r\n','view1','view2','view3','view4','view5','2022-02-10 00:32:02',NULL),
(2,'PT013',233,'Flagship Espresso Crafted Patina ','<p><strong><span style=\"color:rgb(29, 33, 41); font-size:14px\">\"</span><span style=\"color:rgb(29, 33, 41); font-size:16px\">Flagship Expresso Crafted Patina Shoes-Work of Art</span><span style=\"color:rgb(29, 33, 41); font-size:14px\">\"&nbsp;</span></strong></p>\r\n\r\n<p><span style=\"color:rgb(29, 33, 41); font-size:14px\">- Upper Materials: Imported 100% Leather with Hand Patina.</span></p>\r\n\r\n<p><span style=\"color:rgb(29, 33, 41); font-size:14px\">- Lining: Sheepskin Leather&nbsp;</span></p>\r\n\r\n<p><span style=\"color:rgb(29, 33, 41); font-size:14px\">- Sole: Natural leather sole with</span></p>\r\n\r\n<p><span style=\"color:rgb(29, 33, 41); font-size:14px\">- Last: Slightly Squared Toe&nbsp;</span></p>\r\n\r\n<p><span style=\"color:rgb(29, 33, 41); font-size:14px\">\"Passion of Italy &amp; France\"</span></p>\r\n','view1','view2','view3','view4','view5','2022-02-10 00:43:09',NULL);

/*Table structure for table `permission_role` */

DROP TABLE IF EXISTS `permission_role`;

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_permission_id_index` (`permission_id`),
  KEY `permission_role_role_id_index` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `permission_role` */

insert  into `permission_role`(`permission_id`,`role_id`) values 
(1,1),
(2,1),
(3,1),
(4,1),
(5,1),
(6,1),
(7,1),
(8,1),
(9,1),
(10,1),
(11,1),
(12,1),
(13,1),
(14,1),
(15,1),
(16,1),
(17,1),
(18,1),
(19,1),
(20,1),
(21,1),
(22,1),
(23,1),
(24,1),
(25,1),
(26,1),
(27,1),
(28,1),
(29,1),
(30,1),
(51,1),
(52,1),
(53,1),
(54,1),
(55,1),
(56,1),
(57,1),
(58,1),
(59,1),
(60,1),
(66,1),
(67,1),
(68,1),
(69,1),
(70,1);

/*Table structure for table `permissions` */

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permissions_key_index` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `permissions` */

insert  into `permissions`(`id`,`key`,`table_name`,`created_at`,`updated_at`) values 
(1,'browse_admin',NULL,'2022-02-02 12:36:20','2022-02-02 12:36:20'),
(2,'browse_bread',NULL,'2022-02-02 12:36:20','2022-02-02 12:36:20'),
(3,'browse_database',NULL,'2022-02-02 12:36:21','2022-02-02 12:36:21'),
(4,'browse_media',NULL,'2022-02-02 12:36:21','2022-02-02 12:36:21'),
(5,'browse_compass',NULL,'2022-02-02 12:36:21','2022-02-02 12:36:21'),
(6,'browse_menus','menus','2022-02-02 12:36:21','2022-02-02 12:36:21'),
(7,'read_menus','menus','2022-02-02 12:36:21','2022-02-02 12:36:21'),
(8,'edit_menus','menus','2022-02-02 12:36:21','2022-02-02 12:36:21'),
(9,'add_menus','menus','2022-02-02 12:36:21','2022-02-02 12:36:21'),
(10,'delete_menus','menus','2022-02-02 12:36:22','2022-02-02 12:36:22'),
(11,'browse_roles','roles','2022-02-02 12:36:22','2022-02-02 12:36:22'),
(12,'read_roles','roles','2022-02-02 12:36:22','2022-02-02 12:36:22'),
(13,'edit_roles','roles','2022-02-02 12:36:22','2022-02-02 12:36:22'),
(14,'add_roles','roles','2022-02-02 12:36:22','2022-02-02 12:36:22'),
(15,'delete_roles','roles','2022-02-02 12:36:23','2022-02-02 12:36:23'),
(16,'browse_users','users','2022-02-02 12:36:23','2022-02-02 12:36:23'),
(17,'read_users','users','2022-02-02 12:36:23','2022-02-02 12:36:23'),
(18,'edit_users','users','2022-02-02 12:36:23','2022-02-02 12:36:23'),
(19,'add_users','users','2022-02-02 12:36:23','2022-02-02 12:36:23'),
(20,'delete_users','users','2022-02-02 12:36:23','2022-02-02 12:36:23'),
(21,'browse_settings','settings','2022-02-02 12:36:23','2022-02-02 12:36:23'),
(22,'read_settings','settings','2022-02-02 12:36:23','2022-02-02 12:36:23'),
(23,'edit_settings','settings','2022-02-02 12:36:24','2022-02-02 12:36:24'),
(24,'add_settings','settings','2022-02-02 12:36:24','2022-02-02 12:36:24'),
(25,'delete_settings','settings','2022-02-02 12:36:24','2022-02-02 12:36:24'),
(26,'browse_price','price','2022-02-02 16:24:09','2022-02-02 16:24:09'),
(27,'read_price','price','2022-02-02 16:24:09','2022-02-02 16:24:09'),
(28,'edit_price','price','2022-02-02 16:24:09','2022-02-02 16:24:09'),
(29,'add_price','price','2022-02-02 16:24:09','2022-02-02 16:24:09'),
(30,'delete_price','price','2022-02-02 16:24:09','2022-02-02 16:24:09'),
(51,'browse_pre_design','pre_design','2022-02-03 02:51:44','2022-02-03 02:51:44'),
(52,'read_pre_design','pre_design','2022-02-03 02:51:44','2022-02-03 02:51:44'),
(53,'edit_pre_design','pre_design','2022-02-03 02:51:44','2022-02-03 02:51:44'),
(54,'add_pre_design','pre_design','2022-02-03 02:51:44','2022-02-03 02:51:44'),
(55,'delete_pre_design','pre_design','2022-02-03 02:51:44','2022-02-03 02:51:44'),
(56,'browse_prices','prices','2022-02-03 03:31:48','2022-02-03 03:31:48'),
(57,'read_prices','prices','2022-02-03 03:31:48','2022-02-03 03:31:48'),
(58,'edit_prices','prices','2022-02-03 03:31:48','2022-02-03 03:31:48'),
(59,'add_prices','prices','2022-02-03 03:31:48','2022-02-03 03:31:48'),
(60,'delete_prices','prices','2022-02-03 03:31:48','2022-02-03 03:31:48'),
(66,'browse_carts','carts','2022-02-18 09:46:34','2022-02-18 09:46:34'),
(67,'read_carts','carts','2022-02-18 09:46:34','2022-02-18 09:46:34'),
(68,'edit_carts','carts','2022-02-18 09:46:34','2022-02-18 09:46:34'),
(69,'add_carts','carts','2022-02-18 09:46:34','2022-02-18 09:46:34'),
(70,'delete_carts','carts','2022-02-18 09:46:34','2022-02-18 09:46:34');

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `prices` */

DROP TABLE IF EXISTS `prices`;

CREATE TABLE `prices` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` float NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `prices` */

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `roles` */

insert  into `roles`(`id`,`name`,`display_name`,`created_at`,`updated_at`) values 
(1,'admin','Administrator','2022-02-02 12:36:19','2022-02-02 12:36:19'),
(2,'user','Normal User','2022-02-02 12:36:19','2022-02-02 12:36:19');

/*Table structure for table `settings` */

DROP TABLE IF EXISTS `settings`;

CREATE TABLE `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT 1,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_key_unique` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `settings` */

insert  into `settings`(`id`,`key`,`display_name`,`value`,`details`,`type`,`order`,`group`) values 
(1,'site.title','Site Title','Shoes Customize','','text',1,'Site'),
(2,'site.description','Site Description','Site Description','','text',2,'Site'),
(3,'site.logo','Site Logo','','','image',3,'Site'),
(4,'site.google_analytics_tracking_id','Google Analytics Tracking ID',NULL,'','text',4,'Site'),
(5,'admin.bg_image','Admin Background Image','','','image',5,'Admin'),
(6,'admin.title','Admin Title','Voyager','','text',1,'Admin'),
(7,'admin.description','Admin Description','Welcome to Voyager. The Missing Admin for Laravel','','text',2,'Admin'),
(8,'admin.loader','Admin Loader','','','image',3,'Admin'),
(9,'admin.icon_image','Admin Icon Image','','','image',4,'Admin'),
(10,'admin.google_analytics_client_id','Google Analytics Client ID (used for admin dashboard)',NULL,'','text',1,'Admin'),
(11,'site.copyright','copyright','Copyright @ 2020-2021 DuniyaTailor.com',NULL,'text',6,'Site'),
(14,'site.sign','currency','&euro;',NULL,'text',7,'Site');

/*Table structure for table `shoescare` */

DROP TABLE IF EXISTS `shoescare`;

CREATE TABLE `shoescare` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `desc` text DEFAULT NULL,
  `shape` varchar(50) DEFAULT NULL,
  `style` varchar(50) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `sale` float DEFAULT NULL,
  `arrival` enum('Y','N') DEFAULT 'N',
  `closeout` enum('Y','N') NOT NULL DEFAULT 'N',
  `view` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `shoescare` */

insert  into `shoescare`(`id`,`key`,`name`,`desc`,`shape`,`style`,`price`,`sale`,`arrival`,`closeout`,`view`,`created_at`,`update_at`) values 
(1,'CR001','Model Title','<p>Model Description<\\/p>','ShoeCare','ShoeCream',25.5,0,'N','N',1,'2022-02-18 15:08:14','2022-02-18 15:08:14'),
(2,'CR002','Model Title','<p>Model Description<\\/p>','ShoeCare','ShoeCream',25.5,0,'N','N',1,'2022-02-18 15:08:39','2022-02-18 15:09:06'),
(3,'CR003','Model Title','<p>Model Description<\\/p>','ShoeCare','ShoeCream',25.5,0,'N','N',1,'2022-02-18 15:09:10','2022-02-18 15:09:52'),
(4,'CR004','Model Title','<p>Model Description<\\/p>','ShoeCare','ShoeTrees',45,0,'N','N',1,'2022-02-18 15:09:56','2022-02-18 15:11:48');

/*Table structure for table `sides` */

DROP TABLE IF EXISTS `sides`;

CREATE TABLE `sides` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(80) CHARACTER SET ascii NOT NULL,
  `name` varchar(80) CHARACTER SET ascii NOT NULL,
  `path` varchar(80) CHARACTER SET ascii NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `key` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=utf8;

/*Data for the table `sides` */

insert  into `sides`(`id`,`key`,`name`,`path`,`created_at`,`updated_at`) values 
(1,'sideFN9','FN9','FN9','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(2,'sideLT-001','LT-001','LT-001','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(3,'sideSH-SG013','SH-SG013','SH-SG013','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(4,'side1100-10','1100-10','1100-10','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(5,'side1100-2','1100-2','1100-2','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(6,'sideSH-SG08','SH-SG08','SH-SG08','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(7,'sideLT-002','LT-002','LT-002','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(8,'sideFN10','FN10','FN10','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(9,'sideFN4','FN4','FN4','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(10,'sideLT-005','LT-005','LT-005','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(11,'sideSH-SG06','SH-SG06','SH-SG06','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(12,'sideSH-SG01','SH-SG01','SH-SG01','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(13,'sideLT-006','LT-006','LT-006','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(14,'sideFN2','FN2','FN2','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(15,'side1100-4','1100-4','1100-4','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(16,'side1100-5','1100-5','1100-5','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(17,'sideLT-007','LT-007','LT-007','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(18,'sideFN13','FN13','FN13','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(19,'sideS012-05','S012-05','S012-05','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(20,'sideS012-01','S012-01','S012-01','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(21,'sideFN5','FN5','FN5','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(22,'sideLT-014','LT-014','LT-014','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(23,'sideLT-020','LT-020','LT-020','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(24,'sideGOL-06','GOL-06','GOL-06','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(25,'sideS012-08','S012-08','S012-08','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(26,'side1100-9','1100-9','1100-9','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(27,'side1104-1','1104-1','1104-1','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(28,'sideSH-SW02','SH-SW02','SH-SW02','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(29,'sideGOL-01','GOL-01','GOL-01','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(30,'sideLT-015','LT-015','LT-015','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(31,'sideLT-018','LT-018','LT-018','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(32,'sideGOL-07','GOL-07','GOL-07','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(33,'sideSH-SW06','SH-SW06','SH-SW06','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(34,'side1104-3','1104-3','1104-3','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(35,'sideArmyC','ArmyC','ArmyC','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(36,'sideSH-SW01','SH-SW01','SH-SW01','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(37,'sideGOL-02','GOL-02','GOL-02','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(38,'sideLT-030','LT-030','LT-030','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(39,'sideLT-035','LT-035','LT-035','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(40,'sideLT-024','LT-024','LT-024','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(41,'sideGOL-03','GOL-03','GOL-03','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(42,'sideSH-SW10','SH-SW10','SH-SW10','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(43,'sideArmyT','ArmyT','ArmyT','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(44,'sideGOL-05','GOL-05','GOL-05','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(45,'sideLT-025','LT-025','LT-025','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(46,'sideLT-028','LT-028','LT-028','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(47,'sideSH-SW03','SH-SW03','SH-SW03','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(48,'sideItaly1','Italy1','Italy1','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(49,'sideItaly10','Italy10','Italy10','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(50,'sideSH-SW05','SH-SW05','SH-SW05','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(51,'sideLT-048','LT-048','LT-048','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(52,'sideSH-SW04','SH-SW04','SH-SW04','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(53,'sideLT-043','LT-043','LT-043','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(54,'sideLT-041','LT-041','LT-041','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(55,'sideFB01','FB01','FB01','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(56,'sideFB02','FB02','FB02','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(57,'sideItaly7','Italy7','Italy7','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(58,'sideLT-040','LT-040','LT-040','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(59,'sideSHMS02-SCM-Copper','SHMS02-SCM-Copper','SHMS02-SCM-Copper','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(60,'sideSHMS02-SCM-DarkGold','SHMS02-SCM-DarkGold','SHMS02-SCM-DarkGold','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(61,'sideItaly9','Italy9','Italy9','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(62,'sideLT-047','LT-047','LT-047','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(63,'sideFB03','FB03','FB03','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(64,'sideFB04','FB04','FB04','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(65,'sideItaly8','Italy8','Italy8','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(66,'sideLT-045','LT-045','LT-045','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(67,'sideSHMS02-SCM-Gold','SHMS02-SCM-Gold','SHMS02-SCM-Gold','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(68,'sideLT-022','LT-022','LT-022','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(69,'sideItaly6','Italy6','Italy6','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(70,'sideFB05','FB05','FB05','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(71,'sideFB06','FB06','FB06','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(72,'sideBOF_1','BOF_1','BOF_1','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(73,'sideItaly3','Italy3','Italy3','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(74,'sideItaly4','Italy4','Italy4','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(75,'sideBOF_2','BOF_2','BOF_2','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(76,'sideFB07','FB07','FB07','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(77,'sideFB08','FB08','FB08','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(78,'sideBOF_3','BOF_3','BOF_3','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(79,'sideItaly5','Italy5','Italy5','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(80,'sideItaly2','Italy2','Italy2','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(81,'sidesuede1','suede1','suede1','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(82,'sideLT-SM11','LT-SM11','LT-SM11','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(83,'sidesuede2','suede2','suede2','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(84,'sideLT-SM20','LT-SM20','LT-SM20','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(85,'sideLT-SM16','LT-SM16','LT-SM16','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(86,'sidesuede3','suede3','suede3','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(87,'sidesuede6','suede6','suede6','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(88,'sideLT-013','LT-013','LT-013','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(89,'sidesuede7','suede7','suede7','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(90,'sideLT-SM19','LT-SM19','LT-SM19','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(91,'sidesuede8','suede8','suede8','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(92,'sideLT-SM10','LT-SM10','LT-SM10','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(93,'sideLT-SM12','LT-SM12','LT-SM12','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(94,'sidesuede9','suede9','suede9','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(95,'sidesuede10','suede10','suede10','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(96,'sideLT-SM14','LT-SM14','LT-SM14','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(97,'sidesuede11','suede11','suede11','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(98,'sideLT-SM03','LT-SM03','LT-SM03','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(99,'sidesuede12','suede12','suede12','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(100,'sideLT-SM21','LT-SM21','LT-SM21','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(101,'sidesuede13','suede13','suede13','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(102,'sideLT-SM02','LT-SM02','LT-SM02','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(103,'sideLT-SM06','LT-SM06','LT-SM06','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(104,'sidesuede15','suede15','suede15','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(105,'sidesuede16','suede16','suede16','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(106,'sideLT-SM07','LT-SM07','LT-SM07','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(107,'sideLT-SM22','LT-SM22','LT-SM22','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(108,'sideLT-SM15','LT-SM15','LT-SM15','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(109,'sideLT-SM01','LT-SM01','LT-SM01','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(110,'sideLT-SM18','LT-SM18','LT-SM18','2022-02-04 01:55:10','2022-02-04 01:55:10'),
(111,'sideLT-SM23','LT-SM23','LT-SM23','2022-02-04 01:55:10','2022-02-04 01:55:10');

/*Table structure for table `size_country_name` */

DROP TABLE IF EXISTS `size_country_name`;

CREATE TABLE `size_country_name` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `size_country_name` */

insert  into `size_country_name`(`id`,`name`,`created_at`,`updated_at`) values 
(1,'EURO','2022-02-11 10:03:52','2022-02-11 10:03:54'),
(2,'US','2022-02-11 10:03:55','2022-02-11 10:03:57'),
(3,'UK','2022-02-11 10:03:58','2022-02-11 10:04:00'),
(4,'AU','2022-02-11 10:04:01','2022-02-11 10:04:03'),
(5,'JP',NULL,'2022-02-11 10:03:45');

/*Table structure for table `size_shoes` */

DROP TABLE IF EXISTS `size_shoes`;

CREATE TABLE `size_shoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `size_country` int(11) NOT NULL,
  `size` text NOT NULL,
  `create_at` datetime DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `size_shoes` */

insert  into `size_shoes`(`id`,`size_country`,`size`,`create_at`,`updated_at`) values 
(1,1,'36, 37, 38, 38.7, 39.3, 40, 40.5, 41, 42, 42.5, 43, 44, 44.5, 45, 46, 46.5, 47, 48, 49, 50, 51, 52',NULL,'2022-02-11 10:24:29'),
(2,2,'4.5, 5, 5.5, 6, 6.5, 7, 7.5, 8, 8.5, 9, 9.5, 10, 10.5, 11, 11.5, 12, 12.5, 13, 13.5, 14, 14.5, 15, 16',NULL,'2022-02-11 10:24:48'),
(3,3,'4, 4.5, 5, 5.5, 6, 6.5, 7, 7.5, 8, 8.5, 9, 9.5, 10, 10.5, 11, 11.5, 12, 12.5, 13, 13.5, 14, 14.5',NULL,'2022-02-11 10:25:34'),
(4,4,'4, 4.5, 5, 5.5, 6, 6.5, 7, 7.5, 8, 8.5, 9, 9.5, 10, 10.5, 11, 11.5, 12, 12.5, 13, 13.5, 14, 14.5',NULL,'2022-02-11 10:25:50'),
(5,5,'22.5, 23, 23.5, 24, 24.5, 25, 25.5, 26, 26.5, 27, 27.5, 28, 28.5, 29, 29.5, 30, 30.5, 31, 31.5, 32, 32.5, 33',NULL,'2022-02-11 10:26:13');

/*Table structure for table `style_accessories` */

DROP TABLE IF EXISTS `style_accessories`;

CREATE TABLE `style_accessories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pkey` varchar(255) DEFAULT NULL,
  `type_id` int(11) DEFAULT 1,
  `name` varchar(255) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `status` enum('Y','N') DEFAULT 'Y',
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `style_accessories` */

insert  into `style_accessories`(`id`,`pkey`,`type_id`,`name`,`path`,`status`,`created_at`,`updated_at`) values 
(1,'none',1,'none','Accessory/none/','Y',NULL,'2022-02-05 11:20:47'),
(2,'AC1',1,'Accessory style1','Accessory/AC1/','Y',NULL,'2022-02-05 11:20:47'),
(3,'AC2',1,'Accessory style2','Accessory/AC2/','Y',NULL,'2022-02-05 11:20:47'),
(4,'AC3',1,'Accessory style3','Accessory/AC3/','Y',NULL,'2022-02-05 11:20:47'),
(5,'AC4',1,'Accessory style4','Accessory/AC4/','Y',NULL,'2022-02-05 11:20:47'),
(6,'AC5',1,'Accessory style5','Accessory/AC5/','Y',NULL,'2022-02-05 11:20:47');

/*Table structure for table `style_backs` */

DROP TABLE IF EXISTS `style_backs`;

CREATE TABLE `style_backs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pkey` varchar(10) CHARACTER SET ascii NOT NULL,
  `type_id` int(11) NOT NULL DEFAULT 1,
  `name` varchar(40) CHARACTER SET ascii NOT NULL,
  `path` varchar(100) CHARACTER SET ascii NOT NULL,
  `status` enum('Y','N') NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

/*Data for the table `style_backs` */

insert  into `style_backs`(`id`,`pkey`,`type_id`,`name`,`path`,`status`,`created_at`,`updated_at`) values 
(1,'BK1',1,'BACK STYLE 1','Back/BK1/','Y','2022-02-04 02:35:25','2022-02-04 02:35:25'),
(2,'BK2',1,'BACK STYLE 2','Back/BK2/','Y','2022-02-04 02:35:25','2022-02-04 02:35:25'),
(3,'BK3',1,'BACK STYLE 3','Back/BK3/','Y','2022-02-04 02:35:25','2022-02-04 02:35:25'),
(4,'BK4',1,'BACK STYLE 4','Back/BK4/','Y','2022-02-04 02:35:25','2022-02-04 02:35:25'),
(5,'BK5',1,'BACK STYLE 5','Back/BK5/','Y','2022-02-04 02:35:25','2022-02-04 02:35:25'),
(6,'BK6',1,'BACK STYLE 6','Back/BK6/','Y','2022-02-04 02:35:25','2022-02-04 02:35:25'),
(7,'BK7',1,'BACK STYLE 7','Back/BK7/','Y','2022-02-04 02:35:25','2022-02-04 02:35:25'),
(8,'BK8',1,'BACK STYLE 8','Back/BK8/','Y','2022-02-04 02:35:25','2022-02-04 02:35:25'),
(9,'BK9',1,'BACK STYLE 9','Back/BK9/','Y','2022-02-04 02:35:25','2022-02-04 02:35:25');

/*Table structure for table `style_shapes` */

DROP TABLE IF EXISTS `style_shapes`;

CREATE TABLE `style_shapes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pkey` varchar(20) CHARACTER SET ascii NOT NULL,
  `type_id` int(11) NOT NULL DEFAULT 1,
  `name` varchar(40) CHARACTER SET ascii NOT NULL,
  `path` varchar(100) CHARACTER SET ascii NOT NULL,
  `status` enum('Y','N') NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `style_shapes` */

insert  into `style_shapes`(`id`,`pkey`,`type_id`,`name`,`path`,`status`,`created_at`,`updated_at`) values 
(1,'shape-Round',1,'Round','Style/Shape/Round/','Y','2022-02-04 02:36:24','2022-02-05 10:36:13'),
(2,'shape-Cut',1,'SQUARED','Style/Shape/Cut/','Y','2022-02-04 02:36:24','2022-02-04 02:36:24'),
(3,'shape-Sharp',1,'CHISEL TOE','Style/Shape/Sharp/','Y','2022-02-04 02:36:24','2022-02-05 10:36:15');

/*Table structure for table `style_sides` */

DROP TABLE IF EXISTS `style_sides`;

CREATE TABLE `style_sides` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `side_type` enum('SD1','SD2','SD3','SD4','SD5') DEFAULT NULL,
  `pkey` varchar(10) CHARACTER SET ascii NOT NULL,
  `type_id` int(11) NOT NULL DEFAULT 1,
  `name` varchar(40) CHARACTER SET ascii NOT NULL,
  `path` varchar(100) CHARACTER SET ascii NOT NULL,
  `fasion_type` enum('FT1','FT2','FT3','FT4','FT5','FT6','FT7','FT8','FT9','FT10','FT11','FT12','none') NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;

/*Data for the table `style_sides` */

insert  into `style_sides`(`id`,`side_type`,`pkey`,`type_id`,`name`,`path`,`fasion_type`,`created_at`,`updated_at`) values 
(1,'SD1','SD1',1,'SIDE SD1','SD1','none','2022-02-04 02:49:42','2022-02-04 02:49:42'),
(2,'SD2','SD2',1,'SIDE SD2','SD2','none','2022-02-04 02:49:42','2022-02-04 02:49:42'),
(3,'SD3','SD3',1,'SIDE SD3','SD3','none','2022-02-04 02:49:42','2022-02-04 02:49:42'),
(4,'SD4','SD4',1,'SIDE SD4','SD4','none','2022-02-04 02:49:42','2022-02-04 02:49:42'),
(5,'SD5','SD5',1,'SIDE SD5','SD5','none','2022-02-04 02:49:42','2022-02-04 02:49:42'),
(6,'SD1','SD1',1,'SIDE SD1','SD1','FT1','2022-02-04 02:49:42','2022-02-04 02:49:42'),
(7,'SD2','SD2',1,'SIDE SD2','SD2','FT1','2022-02-04 02:49:42','2022-02-04 02:49:42'),
(8,'SD3','SD3',1,'SIDE SD3','SD3','FT1','2022-02-04 02:49:42','2022-02-04 02:49:42'),
(9,'SD4','SD4',1,'SIDE SD4','SD4','FT1','2022-02-04 02:49:42','2022-02-04 02:49:42'),
(10,'SD5','SD5',1,'SIDE SD5','SD5','FT1','2022-02-04 02:49:42','2022-02-04 02:49:42'),
(11,'SD1','SD1',1,'SIDE SD1','SD1','FT2','2022-02-04 02:49:42','2022-02-04 02:49:42'),
(12,'SD2','SD2',1,'SIDE SD2','SD2','FT2','2022-02-04 02:49:42','2022-02-04 02:49:42'),
(13,'SD3','SD3',1,'SIDE SD3','SD3','FT2','2022-02-04 02:49:42','2022-02-04 02:49:42'),
(14,'SD4','SD4',1,'SIDE SD4','SD4','FT2','2022-02-04 02:49:42','2022-02-04 02:49:42'),
(15,'SD5','SD5',1,'SIDE SD5','SD5','FT2','2022-02-04 02:49:42','2022-02-04 02:49:42'),
(16,'SD1','SD1',1,'SIDE SD1','SD1','FT6','2022-02-04 02:49:42','2022-02-04 02:49:42'),
(17,'SD2','SD2',1,'SIDE SD2','SD2','FT6','2022-02-04 02:49:42','2022-02-04 02:49:42'),
(18,'SD3','SD3',1,'SIDE SD3','SD3','FT6','2022-02-04 02:49:42','2022-02-04 02:49:42'),
(19,'SD4','SD4',1,'SIDE SD4','SD4','FT6','2022-02-04 02:49:42','2022-02-04 02:49:42'),
(20,'SD5','SD5',1,'SIDE SD5','SD5','FT6','2022-02-04 02:49:42','2022-02-04 02:49:42'),
(21,'SD1','SD1',1,'SIDE SD1','SD1','FT7','2022-02-04 02:49:42','2022-02-04 02:49:42'),
(22,'SD2','SD2',1,'SIDE SD2','SD2','FT7','2022-02-04 02:49:42','2022-02-04 02:49:42'),
(23,'SD3','SD3',1,'SIDE SD3','SD3','FT7','2022-02-04 02:49:42','2022-02-04 02:49:42'),
(24,'SD4','SD4',1,'SIDE SD4','SD4','FT7','2022-02-04 02:49:42','2022-02-04 02:49:42'),
(25,'SD5','SD5',1,'SIDE SD5','SD5','FT7','2022-02-04 02:49:42','2022-02-04 02:49:42'),
(26,'SD1','SD1',1,'SIDE SD1','SD1','FT8','2022-02-04 02:49:42','2022-02-04 02:49:42'),
(27,'SD2','SD2',1,'SIDE SD2','SD2','FT8','2022-02-04 02:49:42','2022-02-04 02:49:42'),
(28,'SD3','SD3',1,'SIDE SD3','SD3','FT8','2022-02-04 02:49:42','2022-02-04 02:49:42'),
(29,'SD4','SD4',1,'SIDE SD4','SD4','FT8','2022-02-04 02:49:42','2022-02-04 02:49:42'),
(30,'SD5','SD5',1,'SIDE SD5','SD5','FT8','2022-02-04 02:49:42','2022-02-04 02:49:42'),
(31,'SD1','SD1',1,'SIDE SD1','SD1','FT9','2022-02-04 02:49:42','2022-02-04 02:49:42'),
(32,'SD3','SD3',1,'SIDE SD3','SD3','FT9','2022-02-04 02:49:42','2022-02-04 02:49:42'),
(33,'SD2','SD2',1,'SIDE SD2','SD2','FT9','2022-02-04 02:49:42','2022-02-04 02:49:42'),
(34,'SD4','SD4',1,'SIDE SD4','SD4','FT9','2022-02-04 02:49:42','2022-02-04 02:49:42'),
(35,'SD5','SD5',1,'SIDE SD5','SD5','FT9','2022-02-04 02:49:42','2022-02-04 02:49:42'),
(36,'SD1','SD1',1,'SIDE SD1','SD1','FT10','2022-02-04 02:49:42','2022-02-04 02:49:42'),
(37,'SD3','SD3',1,'SIDE SD3','SD3','FT10','2022-02-04 02:49:42','2022-02-04 02:49:42'),
(38,'SD2','SD2',1,'SIDE SD2','SD2','FT10','2022-02-04 02:49:42','2022-02-04 02:49:42'),
(39,'SD4','SD4',1,'SIDE SD4','SD4','FT10','2022-02-04 02:49:42','2022-02-04 02:49:42'),
(40,'SD5','SD5',1,'SIDE SD5','SD5','FT10','2022-02-04 02:49:42','2022-02-04 02:49:42'),
(41,'SD1','SD1',1,'SIDE SD1','SD1','FT11','2022-02-04 02:49:42','2022-02-04 02:49:42'),
(42,'SD3','SD3',1,'SIDE SD3','SD3','FT11','2022-02-04 02:49:42','2022-02-04 02:49:42'),
(43,'SD2','SD2',1,'SIDE SD2','SD2','FT11','2022-02-04 02:49:42','2022-02-04 02:49:42'),
(44,'SD4','SD4',1,'SIDE SD4','SD4','FT11','2022-02-04 02:49:42','2022-02-04 02:49:42'),
(45,'SD5','SD5',1,'SIDE SD5','SD5','FT11','2022-02-04 02:49:42','2022-02-04 02:49:42'),
(46,'SD1','SD1',1,'SIDE SD1','SD1','FT12','2022-02-04 02:49:42','2022-02-04 02:49:42'),
(47,'SD2','SD2',1,'SIDE SD2','SD2','FT12','2022-02-04 02:49:42','2022-02-04 02:49:42'),
(48,'SD3','SD3',1,'SIDE SD3','SD3','FT12','2022-02-04 02:49:42','2022-02-04 02:49:42'),
(49,'SD4','SD4',1,'SIDE SD4','SD4','FT12','2022-02-04 02:49:42','2022-02-04 02:49:42'),
(50,'SD5','SD5',1,'SIDE SD5','SD5','FT12','2022-02-04 02:49:42','2022-02-04 02:49:42');

/*Table structure for table `style_soles` */

DROP TABLE IF EXISTS `style_soles`;

CREATE TABLE `style_soles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pkey` varchar(10) CHARACTER SET ascii NOT NULL,
  `type_id` int(11) NOT NULL DEFAULT 1,
  `name` varchar(40) CHARACTER SET ascii NOT NULL,
  `path` varchar(100) CHARACTER SET ascii NOT NULL,
  `status` enum('Y','N') NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

/*Data for the table `style_soles` */

insert  into `style_soles`(`id`,`pkey`,`type_id`,`name`,`path`,`status`,`created_at`,`updated_at`) values 
(1,'Sole-1WN',1,'Wood Fiber','Sole-1WN','Y','2022-02-04 02:37:14','2022-02-04 10:30:31'),
(2,'Sole-1RN',1,'Red Rubber','Sole-1RN','Y','2022-02-04 02:37:14','2022-02-04 10:30:32'),
(3,'Sole-1BN',1,'Black Rubber','Sole-1BN','Y','2022-02-04 02:37:14','2022-02-04 10:30:33'),
(4,'LT-N007',1,'Cream Leather','LT-N007','Y','2022-02-04 02:37:14','2022-02-04 10:30:33'),
(5,'LT-LB02',1,'Brown Leather','LT-LB02','Y','2022-02-04 02:37:14','2022-02-04 10:30:34'),
(6,'LT-B01',1,'Dark Brown Leather','LT-B01','Y','2022-02-04 02:37:14','2022-02-04 10:30:34'),
(7,'LT-BB03',1,'Black Leather','LT-BB03','Y','2022-02-04 02:37:14','2022-02-04 10:30:35'),
(8,'Sole-OW1',1,'Cream Fiber','Sole-OW1','Y','2022-02-04 02:37:14','2022-02-04 10:30:42'),
(9,'RBB-22',1,'Honey Moccasin  Casual Sole no heels','RBB-22','Y','2022-02-04 02:37:14','2022-02-04 10:30:36'),
(10,'RBD',1,'Black Moccasin Casual Sole no heels ','RBD','Y','2022-02-04 02:37:14','2022-02-04 10:30:36'),
(11,'Sole-1YN',1,'Rubber','Sole-1YN','Y','2022-02-04 02:37:14','2022-02-04 10:30:37'),
(12,'Sole-SHBla',1,'Sole-SH Black','Sole-SHBlack','Y','2022-02-04 02:37:14','2022-02-04 10:30:37'),
(13,'Sole-1W',1,'Wood Brown Fiber','Sole-1W','Y','2022-02-04 02:37:14','2022-02-04 10:30:38');

/*Table structure for table `styles` */

DROP TABLE IF EXISTS `styles`;

CREATE TABLE `styles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `styles` */

/*Table structure for table `translations` */

DROP TABLE IF EXISTS `translations`;

CREATE TABLE `translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foreign_key` int(10) unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `translations_table_name_column_name_foreign_key_locale_unique` (`table_name`,`column_name`,`foreign_key`,`locale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `translations` */

/*Table structure for table `types` */

DROP TABLE IF EXISTS `types`;

CREATE TABLE `types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `src` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visible` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`,`type`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `types` */

insert  into `types`(`id`,`type`,`name`,`src`,`visible`,`created_at`,`updated_at`) values 
(1,'oxford','OXFORD SHOES','s/Oxford.png',1,'2022-02-03 22:45:41','2022-02-11 11:44:21'),
(2,'derby','DERBY SHOES','s/Derby.png',1,'2022-02-03 22:43:59','2022-02-11 11:44:21'),
(3,'loafers','LOAFERS SHOES','s/Loafers.png',1,'2022-02-03 22:44:48','2022-02-11 11:44:21'),
(4,'fashion','FASHION SHOES','s/Fashion.png',1,'2022-02-03 22:44:30','2022-02-11 11:44:21'),
(5,'monk','MONK SHOES','s/Monk.png',1,'2022-02-03 22:45:22','2022-02-11 11:44:21'),
(6,'boot','BOOTS SHOES','s/Boot.png',1,'2022-02-03 22:43:28','2022-02-11 11:44:21'),
(7,'sneaker','SNEAKER SHOES','',0,'2022-02-11 11:44:44','2022-02-11 11:44:50');

/*Table structure for table `user_roles` */

DROP TABLE IF EXISTS `user_roles`;

CREATE TABLE `user_roles` (
  `user_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `user_roles_user_id_index` (`user_id`),
  KEY `user_roles_role_id_index` (`role_id`),
  CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `user_roles` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` bigint(20) unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'users/default.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settings` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`role_id`,`name`,`email`,`avatar`,`email_verified_at`,`password`,`remember_token`,`settings`,`created_at`,`updated_at`) values 
(1,1,'sun','sun@gmail.com','users\\February2022\\5UjfK11A9nLaDr5KRkg4.jpg',NULL,'$2y$10$4LU9jvQ3E8yjkwYXWfmXI.5P0WZARCvZ28vkPGsOc9z/GNDlc.tN.','aSOv1nfgwYWQRgqV1X4lO8vcTq6igpwjLPFqAfcN6I7rL5Uyo8XzjmDqLKC3','{\"locale\":\"en\"}','2022-02-02 12:50:35','2022-02-02 17:52:55');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
