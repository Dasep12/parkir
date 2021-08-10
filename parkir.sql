/*
SQLyog Enterprise - MySQL GUI v8.05 
MySQL - 5.5.5-10.4.20-MariaDB : Database - parkir
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`parkir` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `parkir`;

/*Table structure for table `daftar_kendaraan` */

DROP TABLE IF EXISTS `daftar_kendaraan`;

CREATE TABLE `daftar_kendaraan` (
  `no_ticket` varchar(255) NOT NULL,
  `jenis` varchar(20) DEFAULT NULL,
  `no_polisi` varchar(20) DEFAULT NULL,
  `jam_masuk` time DEFAULT NULL,
  `jam_keluar` time DEFAULT NULL,
  `tanggal_masuk` date DEFAULT NULL,
  `tanggal_keluar` date DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `ticket` varchar(100) DEFAULT NULL,
  `day` date DEFAULT NULL,
  `bayar` int(20) DEFAULT NULL,
  PRIMARY KEY (`no_ticket`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `daftar_kendaraan` */

insert  into `daftar_kendaraan`(`no_ticket`,`jenis`,`no_polisi`,`jam_masuk`,`jam_keluar`,`tanggal_masuk`,`tanggal_keluar`,`status`,`ticket`,`day`,`bayar`) values ('20210809P0003','Motor','BA 23A234','08:58:50',NULL,'2021-08-09',NULL,'parkir','P0003','2021-08-09',3000);

/*Table structure for table `histori` */

DROP TABLE IF EXISTS `histori`;

CREATE TABLE `histori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_ticket` varchar(255) NOT NULL,
  `jenis` varchar(20) DEFAULT NULL,
  `no_polisi` varchar(20) DEFAULT NULL,
  `jam_masuk` time DEFAULT NULL,
  `jam_keluar` time DEFAULT NULL,
  `tanggal_masuk` date DEFAULT NULL,
  `tanggal_keluar` date DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `ticket` varchar(100) DEFAULT NULL,
  `day` date DEFAULT NULL,
  `bayar` int(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `histori` */

insert  into `histori`(`id`,`no_ticket`,`jenis`,`no_polisi`,`jam_masuk`,`jam_keluar`,`tanggal_masuk`,`tanggal_keluar`,`status`,`ticket`,`day`,`bayar`) values (1,'20210809P0001','Motor','BA 23A234','06:48:00','08:55:49','2021-08-09','2021-08-09','keluar','P0001','2021-08-09',6000),(2,'20210809P0001','Mobil','BA 23A234','08:56:37','08:58:39','2021-08-09','2021-08-09','keluar','P0001','2021-08-09',3000),(3,'20210809P0002','Motor','BA 23A234','05:58:30','08:59:26','2021-08-09','2021-08-09','keluar','P0002','2021-08-09',9000);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
