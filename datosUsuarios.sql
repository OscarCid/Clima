/*
SQLyog Community v12.09 (64 bit)
MySQL - 5.6.26 : Database - clima
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`clima` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `clima`;

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `apellidos` varchar(255) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `rut` varchar(255) NOT NULL,
  `sup` int(1) NOT NULL,
  PRIMARY KEY (`id`,`rut`,`sup`),
  UNIQUE KEY `rut` (`rut`,`correo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `usuarios` */

insert  into `usuarios`(`id`,`nombre`,`apellidos`,`correo`,`password`,`rut`,`sup`) values (1,'Michel','Lira','michel.lira8@gmail.com','*0','17.972.601-7',0),(2,'Mónica','Castillo','monica.castillo@alumnos.upla.cl','*0','18.064.583-7',0),(3,'Gloria','Donoso','e.tupido2@gmail.com','*0','8.183.000-2',0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
