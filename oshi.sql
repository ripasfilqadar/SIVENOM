-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.30-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for db_venom
DROP DATABASE IF EXISTS `db_venom`;
CREATE DATABASE IF NOT EXISTS `db_venom` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `db_venom`;

-- Dumping structure for table db_venom.attachment
DROP TABLE IF EXISTS `attachment`;
CREATE TABLE IF NOT EXISTS `attachment` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `FileName` varchar(255) NOT NULL DEFAULT '0',
  `LaporanId` int(11) NOT NULL DEFAULT '0',
  `Path` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id`),
  KEY `AttachXLaporan` (`LaporanId`),
  CONSTRAINT `AttachXLaporan` FOREIGN KEY (`LaporanId`) REFERENCES `kontrak` (`KontrakId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_venom.attachment: ~0 rows (approximately)
/*!40000 ALTER TABLE `attachment` DISABLE KEYS */;
/*!40000 ALTER TABLE `attachment` ENABLE KEYS */;

-- Dumping structure for table db_venom.kontrak
DROP TABLE IF EXISTS `kontrak`;
CREATE TABLE IF NOT EXISTS `kontrak` (
  `KontrakId` int(11) NOT NULL AUTO_INCREMENT,
  `VendorId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `NoKontrak` varchar(255) NOT NULL,
  `Deskripsi` varchar(255) DEFAULT NULL,
  `SLA` varchar(255) DEFAULT NULL,
  `ResponseTime` varchar(255) DEFAULT NULL,
  `ProblemSolving` varchar(255) DEFAULT NULL,
  `PSSukuCadang` varchar(255) DEFAULT NULL,
  `TanggalPembuatan` date NOT NULL,
  `HargaKehadiranDC` varchar(255) NOT NULL,
  `PengaliDenda` int(11) NOT NULL DEFAULT '1',
  `HargaKehadiranDRC` varchar(255) NOT NULL,
  `TanggalKontrak` date NOT NULL,
  `KontrakKehadiranDC` int(11) DEFAULT '0',
  `KontrakKehadiranDRC` int(11) DEFAULT '0',
  PRIMARY KEY (`KontrakId`),
  KEY `KontrakXUser` (`UserId`),
  KEY `KontrakXVendor` (`VendorId`),
  CONSTRAINT `KontrakXUser` FOREIGN KEY (`UserId`) REFERENCES `user` (`Id`),
  CONSTRAINT `KontrakXVendor` FOREIGN KEY (`VendorId`) REFERENCES `vendor` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table db_venom.kontrak: ~1 rows (approximately)
/*!40000 ALTER TABLE `kontrak` DISABLE KEYS */;
INSERT INTO `kontrak` (`KontrakId`, `VendorId`, `UserId`, `NoKontrak`, `Deskripsi`, `SLA`, `ResponseTime`, `ProblemSolving`, `PSSukuCadang`, `TanggalPembuatan`, `HargaKehadiranDC`, `PengaliDenda`, `HargaKehadiranDRC`, `TanggalKontrak`, `KontrakKehadiranDC`, `KontrakKehadiranDRC`) VALUES
	(2, 3, 6, 'sfasfsfes', '     123  4  ', '99', '10', '1 x 24 jam', '1 bulan', '0000-00-00', '200000', 5, '230000', '2018-10-15', 64, 24);
/*!40000 ALTER TABLE `kontrak` ENABLE KEYS */;

-- Dumping structure for table db_venom.laporan
DROP TABLE IF EXISTS `laporan`;
CREATE TABLE IF NOT EXISTS `laporan` (
  `LaporanId` int(11) NOT NULL AUTO_INCREMENT,
  `RealisasiKehadiranDC` int(11) NOT NULL,
  `RealisasiKehadiranDRC` int(11) NOT NULL,
  `CreatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `RealisasiSLA` varchar(50) DEFAULT NULL,
  `Status` int(11) NOT NULL,
  `KontrakId` int(11) NOT NULL,
  `ResponseTime` varchar(50) DEFAULT NULL,
  `ProblemSolving` varchar(50) DEFAULT NULL,
  `SukuCadang` varchar(50) DEFAULT NULL,
  `KehadiranDC` int(11) NOT NULL DEFAULT '0',
  `KehadiranDRC` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`LaporanId`),
  KEY `LaporanXKontrak` (`KontrakId`),
  CONSTRAINT `LaporanXKontrak` FOREIGN KEY (`KontrakId`) REFERENCES `kontrak` (`KontrakId`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table db_venom.laporan: ~2 rows (approximately)
/*!40000 ALTER TABLE `laporan` DISABLE KEYS */;
INSERT INTO `laporan` (`LaporanId`, `RealisasiKehadiranDC`, `RealisasiKehadiranDRC`, `CreatedAt`, `RealisasiSLA`, `Status`, `KontrakId`, `ResponseTime`, `ProblemSolving`, `SukuCadang`, `KehadiranDC`, `KehadiranDRC`) VALUES
	(6, 22, 9, '2018-10-21 17:09:53', '98', 2, 2, '40', '', '', 23, 10),
	(7, 20, 8, '2018-10-21 19:12:08', '', 1, 2, '', '', '', 21, 8);
/*!40000 ALTER TABLE `laporan` ENABLE KEYS */;

-- Dumping structure for table db_venom.refmaster
DROP TABLE IF EXISTS `refmaster`;
CREATE TABLE IF NOT EXISTS `refmaster` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Value` varchar(50) NOT NULL,
  `Type` varchar(255) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table db_venom.refmaster: ~3 rows (approximately)
/*!40000 ALTER TABLE `refmaster` DISABLE KEYS */;
INSERT INTO `refmaster` (`Id`, `Value`, `Type`) VALUES
	(1, 'Submitted', 'Laporan'),
	(2, 'Approved', 'Laporan'),
	(3, 'Revised', 'Laporan'),
	(4, 'Rejected', 'Laporan');
/*!40000 ALTER TABLE `refmaster` ENABLE KEYS */;

-- Dumping structure for table db_venom.user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `NIP` varchar(50) DEFAULT NULL,
  `Jabatan` varchar(50) DEFAULT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Alamat` varchar(255) DEFAULT NULL,
  `Nama` varchar(255) NOT NULL,
  `VendorId` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `VendorXuser` (`VendorId`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table db_venom.user: ~3 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`Id`, `NIP`, `Jabatan`, `Email`, `Password`, `Alamat`, `Nama`, `VendorId`) VALUES
	(6, '199402262018011003', 'Pelaksana', 'ripas@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Indomaret', 'Ripas', NULL),
	(7, NULL, NULL, 'rif2602@gmail.com', '', 'Inuman, 5', 'Sampl', 3),
	(8, NULL, NULL, 'rif2602@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Inuman, 5', 'test', 2),
	(9, '121', NULL, 'oshi@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'admald', 'oshi', NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- Dumping structure for table db_venom.vendor
DROP TABLE IF EXISTS `vendor`;
CREATE TABLE IF NOT EXISTS `vendor` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `NamaVendor` varchar(255) DEFAULT NULL,
  `Keterangan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table db_venom.vendor: ~2 rows (approximately)
/*!40000 ALTER TABLE `vendor` DISABLE KEYS */;
INSERT INTO `vendor` (`Id`, `NamaVendor`, `Keterangan`) VALUES
	(2, 'Telkom 2', 'Testing'),
	(3, 'Sample', 'coba');
/*!40000 ALTER TABLE `vendor` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
