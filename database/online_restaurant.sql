/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.7.9 : Database - online_restaurant
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `order_child` */

insert  into `order_child`(`order_child_id`,`order_master_id`,`product_id`,`quantity`) values (1,1,2,1),(2,1,3,1),(3,2,2,1),(4,2,4,2),(5,3,3,4),(6,4,4,5),(7,4,5,1),(8,4,2,3);

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `order_master` */

insert  into `order_master`(`order_master_id`,`order_id`,`order_date`,`delivery_date`,`delivery_time`,`customer_name`,`house_name`,`place`,`phone_number`,`delivery_status`) values (1,'5d3034cae2515','2019-06-30','2019-06-30','13:00:00','amal','amal nivas','kochi','9876543210','cancelled'),(2,'5d3037778ca4d','2019-06-30','2019-06-30','13:00:00','akash','Flat no 33 confident gorups kaloor','kaloor','9876123450','delivered'),(3,'5d30382624af1','2019-07-18','2019-07-18','14:22:00','anjaly','federal bank mg road','mg road','9987654123','delivered'),(4,'5d3038981f12e','2019-07-18','2019-07-18','15:00:00','rajesh','joy alukkas jewellery','mg road','6629123450','delivered');

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(30) DEFAULT NULL,
  `unit_price` float DEFAULT NULL,
  `unit_type` varchar(10) DEFAULT NULL,
  `available_status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `products` */

insert  into `products`(`product_id`,`product_name`,`unit_price`,`unit_type`,`available_status`) values (1,'alfahm',120,'piece','not available'),(2,'Chilli Chicken',80,'Plate','available'),(3,'Butter Chicken',110,'Plate','available'),(4,'Chappathi',10,'piece','available'),(5,'Beef Roast',80,'Plate','available'),(6,'Beef Biriyani full',120,'Plate','available');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
