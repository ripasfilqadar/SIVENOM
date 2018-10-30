/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.1.16-MariaDB : Database - db_trast
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_trast` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_trast`;

/*Table structure for table `t_bidang` */

DROP TABLE IF EXISTS `t_bidang`;

CREATE TABLE `t_bidang` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `NAMA` varchar(100) DEFAULT NULL,
  `ST` varchar(2) DEFAULT NULL COMMENT 'C:Cacah,D:Dinas,CD:Cacah dan Dinas',
  `TTD` varchar(2) DEFAULT NULL COMMENT 'C:Cacah,D:Dinas,CD:Cacah dan Dinas',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

/*Data for the table `t_bidang` */

insert  into `t_bidang`(`ID`,`NAMA`,`ST`,`TTD`) values (1,'KK','CD','D'),(2,'KSBU','CD','C'),(3,'SKK','D',NULL),(4,'PKC I','CD',NULL),(5,'PKC II','CD',NULL),(6,'PKC III','CD',NULL),(7,'PKC IV','CD',NULL),(8,'PKC V','CD',NULL),(9,'PKC VI','CD',NULL),(10,'PKC VII','CD',NULL),(11,'PKC VIII','CD',NULL),(12,'PKC IX','CD',NULL),(13,'PERBEND','D',NULL),(14,'PLI','D',NULL),(15,'SBU','D',NULL),(16,'PDAD','D',NULL),(17,'KI','D',NULL),(18,'P2','D',NULL);

/*Table structure for table `t_role` */

DROP TABLE IF EXISTS `t_role`;

CREATE TABLE `t_role` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `NAMA` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `t_role` */

insert  into `t_role`(`ID`,`NAMA`) values (2,'Admin'),(3,'PIC'),(4,'USER');

/*Table structure for table `t_st` */

DROP TABLE IF EXISTS `t_st`;

CREATE TABLE `t_st` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `NO_ND` varchar(50) DEFAULT NULL,
  `NO_ST` varchar(50) DEFAULT '-',
  `USER_ID` bigint(20) DEFAULT NULL,
  `BIDANG_ID` bigint(20) DEFAULT NULL,
  `TAHAP` int(3) DEFAULT NULL,
  `STATUS` char(1) DEFAULT '-' COMMENT '1=Disetujui,0=Ditolak',
  `FILE_TAHAP_0` varchar(250) DEFAULT NULL,
  `FILE_TAHAP_1` varchar(250) DEFAULT NULL,
  `FILE_TAHAP_2` varchar(250) DEFAULT NULL,
  `FILE_TAHAP_3` varchar(250) DEFAULT NULL,
  `FILE_TAHAP_4` varchar(250) DEFAULT NULL,
  `FILE_TAHAP_5` varchar(250) DEFAULT NULL,
  `TGL_TAHAP_0` datetime DEFAULT NULL,
  `TGL_TAHAP_1` datetime DEFAULT NULL,
  `TGL_TAHAP_2` datetime DEFAULT NULL,
  `TGL_TAHAP_3` datetime DEFAULT NULL,
  `TGL_TAHAP_4` datetime DEFAULT NULL,
  `TGL_TAHAP_5` datetime DEFAULT NULL,
  `TGL_BUAT` datetime DEFAULT NULL,
  `JENIS_ST` int(2) DEFAULT NULL COMMENT '1=ST Dinas,2=ST Cacah',
  `KETERANGAN` text,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `t_st` */

/*Table structure for table `t_user` */

DROP TABLE IF EXISTS `t_user`;

CREATE TABLE `t_user` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `NAMA` varchar(100) DEFAULT NULL,
  `USERNAME` varchar(50) DEFAULT NULL,
  `PASSWORD` varchar(250) DEFAULT NULL,
  `ROLE_ID` bigint(20) DEFAULT NULL,
  `BIDANG_ID` bigint(20) DEFAULT NULL,
  `FOTO` varchar(250) DEFAULT NULL,
  `STATUS` char(1) DEFAULT NULL COMMENT '1=Aktif,0=Tidak Aktif',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

/*Data for the table `t_user` */

insert  into `t_user`(`ID`,`NAMA`,`USERNAME`,`PASSWORD`,`ROLE_ID`,`BIDANG_ID`,`FOTO`,`STATUS`) values (1,'Aris Sudarminto','Aris','16e4ef534cec559430e07e05eb71c719',2,1,NULL,NULL),(2,'Sarwo','Sarwo','e0b525f17479d2af44272652e25d55bf',2,2,NULL,NULL),(3,'Tarowati','Taro','afbcfd104c9bf6c400fdf6eaa3b560aa',3,3,NULL,NULL),(4,'Reini Adhha Nasution','Reini','afbcfd104c9bf6c400fdf6eaa3b560aa',3,3,NULL,NULL),(5,'Yanto Subroto','Yanto','7587720f4e642f71baaa4bb911f81ca7',3,4,NULL,NULL),(6,'Hanintyo Ari Utomo','Hanintyo','7587720f4e642f71baaa4bb911f81ca7',3,4,NULL,NULL),(7,'Subandriyo','Subandriyo','735efc1cb33d98028a633d1dd4064a1a',3,13,NULL,NULL),(8,'Dian Larasati','Dian','735efc1cb33d98028a633d1dd4064a1a',3,13,NULL,NULL),(9,'Wisnu Nuryanto','Wisnu','3a8d3b21028de66b00033b10abfc2cec',3,14,NULL,NULL),(10,'Rizky Arif Wahyudi','Rizky','3a8d3b21028de66b00033b10abfc2cec',3,14,NULL,NULL),(11,'Krisna Julianto','Krisna','e0e81b1856ca9d597f2f3227ea326df3',3,15,NULL,NULL),(12,'Eka Rohayati','Eka','e0e81b1856ca9d597f2f3227ea326df3',3,15,NULL,NULL),(13,'Roslindawaty BR.Ginting','Rolindawaty','8d32e3f083e317a8ecdaa72ab6abff94',2,16,NULL,NULL),(14,'Sofia Nur Kamalita','Sofia','8d32e3f083e317a8ecdaa72ab6abff94',2,16,NULL,NULL),(15,'Nurhikmah Amalia Pasi','Nurhikmah','609caf44b732b054dda5860569e7e92e',3,17,NULL,NULL),(16,'Viramiah Wijaya','Viramiah','609caf44b732b054dda5860569e7e92e',3,17,NULL,NULL),(17,'Herkan Syachrudi','Herkan','5890595e16cbebb8866e1842e4bd6ec7',3,18,NULL,NULL),(18,'Tamara Damanik','Tamara','5890595e16cbebb8866e1842e4bd6ec7',3,18,NULL,NULL),(19,'Admin','Admin','161ebd7d45089b3446ee4e0d86dbcf92',2,16,NULL,'1');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
