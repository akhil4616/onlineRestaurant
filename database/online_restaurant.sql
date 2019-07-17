/*
SQLyog Community Edition- MySQL GUI v8.03 
MySQL - 5.7.9 : Database - online_restaurant
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`online_restaurant` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `online_restaurant`;

/*Table structure for table `login` */

DROP TABLE IF EXISTS `login`;

CREATE TABLE `login` (
  `login_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`login_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `login` */

insert  into `login`(`login_id`,`username`,`password`) values (1,'admin','21232f297a57a5a743894a0e4a801fc3');

/*Table structure for table `order_child` */

DROP TABLE IF EXISTS `order_child`;

CREATE TABLE `order_child` (
  `order_child_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_master_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  PRIMARY KEY (`order_child_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `order_child` */

insert  into `order_child`(`order_child_id`,`order_master_id`,`product_id`,`quantity`) values (1,1,4,1),(2,1,5,2),(3,2,4,1),(4,2,5,1),(5,3,4,4),(6,5,4,3);

/*Table structure for table `order_master` */

DROP TABLE IF EXISTS `order_master`;

CREATE TABLE `order_master` (
  `order_master_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` varchar(20) DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `delivery_date` date DEFAULT NULL,
  `delivery_time` time DEFAULT NULL,
  `customer_name` varchar(20) DEFAULT NULL,
  `house_name` varchar(50) DEFAULT NULL,
  `place` varchar(20) DEFAULT NULL,
  `phone_number` varchar(10) DEFAULT NULL,
  `delivery_status` varchar(20) DEFAULT 'pending',
  PRIMARY KEY (`order_master_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `order_master` */

insert  into `order_master`(`order_master_id`,`order_id`,`order_date`,`delivery_date`,`delivery_time`,`customer_name`,`house_name`,`place`,`phone_number`,`delivery_status`) values (1,'5','2019-08-16','2019-08-16','13:00:00','akhil','test','test','9876543210','delivered'),(2,'5d2db5768d8e6','2019-07-16','2019-07-16','13:00:00','akhil','test','test','9876543210','delivered'),(3,'5d2ee93e977c8','2019-07-17','2019-07-18','11:59:00','dfg','jyf','hrt','54','pending'),(4,'5d2ee9cde09c6','2019-07-17','2019-07-18','11:59:00','dfg','jyf','hrt','54','pending'),(5,'5d2eea46bd0eb','2019-07-17','2019-07-17','04:44:00','ujg','mjnhb','mvnb','756','pending');

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(30) DEFAULT NULL,
  `unit_price` float DEFAULT NULL,
  `unit_type` varchar(10) DEFAULT NULL,
  `available_status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `products` */

insert  into `products`(`product_id`,`product_name`,`unit_price`,`unit_type`,`available_status`) values (3,'alfahm',250,'half','Not Available'),(4,'cb',120,'full','available'),(5,'cutlet',25,'piece','available');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
