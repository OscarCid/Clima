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

/*Table structure for table `estacioneshab` */

DROP TABLE IF EXISTS `estacioneshab`;

CREATE TABLE `estacioneshab` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `estacion` varchar(255) COLLATE utf8_bin NOT NULL,
  `nombreEstacion` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `estado` int(1) DEFAULT NULL,
  `lat` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `lon` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `emb` text COLLATE utf8_bin,
  `creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`,`estacion`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `estacioneshab` */

insert  into `estacioneshab`(`id`,`estacion`,`nombreEstacion`,`estado`,`lat`,`lon`,`emb`,`creacion`) values (1,'yali','Reserva Nacional El Yali',1,'-33.7488','-71.7021','!1m18!1m12!1m3!1d3317.4558502148225!2d-71.70218868514273!3d-33.74888442027571!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzPCsDQ0JzU2LjAiUyA3McKwNDInMDAuMCJX!5e0!3m2!1ses!2scl!4v1448075117442','2016-02-03 15:07:23'),(2,'campana','Parque Nacional La Campana',1,'-32.9912','-71.1403','!1m18!1m12!1m3!1d16385.062089666924!2d-71.14036530093792!3d-32.9912300371242!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzLCsDU5JzE3LjAiUyA3McKwMDgnMzQuMCJX!5e0!3m2!1ses!2scl!4v1448075283755','2016-02-03 15:07:23'),(3,'peral','Laguna El Peral',1,'-33.5042','-71.6104','!1m18!1m12!1m3!1d3326.8909039657547!2d-71.61048165048022!3d-33.50421541725178!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzPCsDMwJzE0LjAiUyA3McKwMzYnMzcuMCJX!5e0!3m2!1ses!2scl!4v1448074950703','2016-02-03 15:07:23'),(6,'rioblanco','Reserva Nacional Río Blanco',0,'-32.9815','-70.2984','!1m14!1m8!1m3!1d46507.14866305966!2d-70.298421!3d-32.981589!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0xb5104da6d15a26db!2sReserva+Nacional+Rio+Blanco!5e1!3m2!1ses-419!2scl!4v1454507231516','2016-02-07 23:24:54'),(9,'andes','Los Andes',0,'-32.8313','-70.6128','!1m18!1m12!1m3!1d3352.524951608066!2d-70.6143476335795!3d-32.83134980314894!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzLCsDQ5JzUyLjkiUyA3MMKwMzYnNDYuMSJX!5e0!3m2!1ses-419!2scl!4v1454499234659','2016-02-04 11:05:15');

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `apellidos` varchar(255) DEFAULT NULL,
  `correo` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `sup` int(1) NOT NULL,
  `tipo` varchar(255) DEFAULT NULL,
  `fechaIngreso` timestamp NULL DEFAULT NULL,
  `ultimoLogeo` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`,`correo`,`sup`),
  UNIQUE KEY `rut` (`correo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `usuarios` */

insert  into `usuarios`(`id`,`nombre`,`apellidos`,`correo`,`password`,`sup`,`tipo`,`fechaIngreso`,`ultimoLogeo`) values (0,'Michel','Lira','michel.lira8@gmail.com','$1$$6vy9sumsKpLV7l2Dd9MzL.',0,'admin','2016-02-03 17:21:42','2016-02-07 23:24:13');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
