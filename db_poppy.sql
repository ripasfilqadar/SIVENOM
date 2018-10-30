/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.1.16-MariaDB : Database - db_poppy
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_poppy` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_poppy`;

/*Table structure for table `t_detail_st` */

DROP TABLE IF EXISTS `t_detail_st`;

CREATE TABLE `t_detail_st` (
  `ID` bigint(25) NOT NULL AUTO_INCREMENT,
  `ST_ID` bigint(20) DEFAULT NULL,
  `NIP` varchar(20) DEFAULT NULL,
  `NAMA` varchar(100) DEFAULT NULL,
  `JABATAN` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `t_detail_st_ibfk_1` (`ST_ID`),
  CONSTRAINT `t_detail_st_ibfk_1` FOREIGN KEY (`ST_ID`) REFERENCES `t_st` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `t_detail_st` */

insert  into `t_detail_st`(`ID`,`ST_ID`,`NIP`,`NAMA`,`JABATAN`) values (1,1,'1994','Popy','Kepala Kantor'),(2,1,'1993','Bunga','Kepala Seksi'),(3,2,'1992','Miraz','Kepala Ayam'),(4,2,'1994','Popy','Kepala Kantor'),(5,3,'199402092018012001','Poppy','Kepala Seksi'),(6,3,'199402092018012002','Siregar','Pelaksana'),(7,3,'199402092018012003','Bunga','Pelaksana');

/*Table structure for table `t_st` */

DROP TABLE IF EXISTS `t_st`;

CREATE TABLE `t_st` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `NO_ST` varchar(50) DEFAULT NULL,
  `TGL_MULAI` date DEFAULT NULL,
  `TGL_SELESAI` date DEFAULT NULL,
  `KOTA_ASAL` varchar(100) DEFAULT NULL,
  `KOTA_TUJUAN` varchar(100) DEFAULT NULL,
  `TGL_ST` date DEFAULT NULL,
  `PERIHAL` text,
  `FILE_ST` varchar(250) DEFAULT NULL,
  `NO_LPT` varchar(50) DEFAULT NULL,
  `TGL_LPT` date DEFAULT NULL,
  `FILE_LPT` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `t_st` */

insert  into `t_st`(`ID`,`NO_ST`,`TGL_MULAI`,`TGL_SELESAI`,`KOTA_ASAL`,`KOTA_TUJUAN`,`TGL_ST`,`PERIHAL`,`FILE_ST`,`NO_LPT`,`TGL_LPT`,`FILE_LPT`) values (1,'ST-490/KN.1/KNL02/2018','2018-10-15','2018-10-17','Jakarta','Bandung',NULL,'Sosialisasi APBN di Gedung Keuangan Negara Bandung','1.pdf',NULL,NULL,NULL),(2,'ST-500/KN.1/KNL02/2018','2018-10-22','2018-11-09','Jakarta','Medan',NULL,'Pelaksanaan Lelang melalu E-Auction atas permohonan dari pemimpin kantor PT.Tralala Trilili','2.pdf',NULL,NULL,NULL),(3,'ST-501/KN.1/KNL02/2018	','2018-10-01','2018-10-05','Jakarta','Bandung',NULL,'Sosialisasi Manajemen Keuangan Negara di Gedung Keuangan Negara Bandung dengan narasumber Bapak Soleh','3.pdf',NULL,NULL,NULL);

/*Table structure for table `t_user` */

DROP TABLE IF EXISTS `t_user`;

CREATE TABLE `t_user` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `NAMA` varchar(100) DEFAULT NULL,
  `USERNAME` varchar(50) DEFAULT NULL,
  `PASSWORD` varchar(250) DEFAULT NULL,
  `ROLE_ID` bigint(20) DEFAULT NULL COMMENT '1=Admin,2=User',
  `FOTO` varchar(250) DEFAULT NULL,
  `STATUS` char(1) DEFAULT NULL COMMENT '1=Aktif,0=Tidak Aktif',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `t_user` */

insert  into `t_user`(`ID`,`NAMA`,`USERNAME`,`PASSWORD`,`ROLE_ID`,`FOTO`,`STATUS`) values (1,'Poppy ws Siregar','Poppy','161ebd7d45089b3446ee4e0d86dbcf92',1,'1.jpeg','1'),(2,'Tuti Siregar','Siregar','d21fe1e54e2f1e45b793687f78163603',2,NULL,'1');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
