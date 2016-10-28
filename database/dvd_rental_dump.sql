CREATE DATABASE  IF NOT EXISTS `dvd_rental` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `dvd_rental`;
-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: localhost    Database: dvd_rental
-- ------------------------------------------------------
-- Server version	5.7.11-log

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
-- Table structure for table `cua_hang`
--

DROP TABLE IF EXISTS `cua_hang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cua_hang` (
  `MaCH` int(11) NOT NULL AUTO_INCREMENT,
  `DiaChi` mediumtext NOT NULL,
  `Sdt` varchar(45) DEFAULT NULL,
  `NvQuanLy` int(11) DEFAULT NULL,
  PRIMARY KEY (`MaCH`),
  KEY `fk_nvql_idx` (`NvQuanLy`),
  CONSTRAINT `fk_nvql` FOREIGN KEY (`NvQuanLy`) REFERENCES `nhan_vien` (`MaNV`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cua_hang`
--

LOCK TABLES `cua_hang` WRITE;
/*!40000 ALTER TABLE `cua_hang` DISABLE KEYS */;
INSERT INTO `cua_hang` VALUES (1,'144 Xuan Thuy, Cau Giay, Ha Noi','04341454234',NULL);
/*!40000 ALTER TABLE `cua_hang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dia_phim`
--

DROP TABLE IF EXISTS `dia_phim`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dia_phim` (
  `MaDP` int(11) NOT NULL AUTO_INCREMENT,
  `MaPhim` int(11) NOT NULL,
  `TrangThai` tinyint(1) NOT NULL,
  `MaCH` int(11) NOT NULL,
  PRIMARY KEY (`MaDP`),
  KEY `fk_maphim_idx` (`MaPhim`),
  KEY `fk_cuahang_idx` (`MaCH`),
  CONSTRAINT `fk_cuahang` FOREIGN KEY (`MaCH`) REFERENCES `cua_hang` (`MaCH`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_maphim` FOREIGN KEY (`MaPhim`) REFERENCES `phim` (`MaPhim`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dia_phim`
--

LOCK TABLES `dia_phim` WRITE;
/*!40000 ALTER TABLE `dia_phim` DISABLE KEYS */;
/*!40000 ALTER TABLE `dia_phim` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dien_vien`
--

DROP TABLE IF EXISTS `dien_vien`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dien_vien` (
  `MaDV` int(11) NOT NULL AUTO_INCREMENT,
  `Ten` varchar(45) NOT NULL,
  PRIMARY KEY (`MaDV`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dien_vien`
--

LOCK TABLES `dien_vien` WRITE;
/*!40000 ALTER TABLE `dien_vien` DISABLE KEYS */;
/*!40000 ALTER TABLE `dien_vien` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `khach_hang`
--

DROP TABLE IF EXISTS `khach_hang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `khach_hang` (
  `MaKH` int(11) NOT NULL,
  `HoTen` varchar(45) NOT NULL,
  `DiaChi` varchar(45) NOT NULL,
  `Sdt` varchar(45) NOT NULL,
  `Email` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`MaKH`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `khach_hang`
--

LOCK TABLES `khach_hang` WRITE;
/*!40000 ALTER TABLE `khach_hang` DISABLE KEYS */;
INSERT INTO `khach_hang` VALUES (1,'Lê Khánh Vân','175 Xuân Thủy, Cầu Giấy, Hà Nội','01682345876','van@vnu'),(2,'Hà Quang Thái','235 Hồ Tùng Mậu, Cầu Giấy, Hà Nội','09734155463','thai@vnu');
/*!40000 ALTER TABLE `khach_hang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lan_muon`
--

DROP TABLE IF EXISTS `lan_muon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lan_muon` (
  `MaLM` int(11) NOT NULL AUTO_INCREMENT,
  `MaKH` int(11) NOT NULL,
  `MaNV` int(11) NOT NULL,
  `MaDP` int(11) NOT NULL,
  `NgayMuon` date NOT NULL,
  `HanTra` date NOT NULL,
  `MaCH` int(11) NOT NULL,
  `CapNhat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`MaLM`),
  KEY `fk_lm_kh_idx` (`MaKH`),
  KEY `fk_lm_nv_idx` (`MaNV`),
  KEY `fk_lm_dp_idx` (`MaDP`),
  KEY `fk_cuahang_idx` (`MaCH`),
  CONSTRAINT `fk_lm_ch` FOREIGN KEY (`MaCH`) REFERENCES `cua_hang` (`MaCH`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_lm_dp` FOREIGN KEY (`MaDP`) REFERENCES `dia_phim` (`MaDP`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_lm_kh` FOREIGN KEY (`MaKH`) REFERENCES `khach_hang` (`MaKH`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_lm_nv` FOREIGN KEY (`MaNV`) REFERENCES `nhan_vien` (`MaNV`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lan_muon`
--

LOCK TABLES `lan_muon` WRITE;
/*!40000 ALTER TABLE `lan_muon` DISABLE KEYS */;
/*!40000 ALTER TABLE `lan_muon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lan_tra`
--

DROP TABLE IF EXISTS `lan_tra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lan_tra` (
  `MaLT` int(11) NOT NULL,
  `MaLM` int(11) NOT NULL,
  `MaNV` int(11) NOT NULL,
  `SoTien` double NOT NULL,
  `CapNhat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`MaLT`),
  KEY `fk_lt_nv` (`MaNV`),
  CONSTRAINT `fk_lt_lm` FOREIGN KEY (`MaLT`) REFERENCES `lan_muon` (`MaLM`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_lt_nv` FOREIGN KEY (`MaNV`) REFERENCES `nhan_vien` (`MaNV`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lan_tra`
--

LOCK TABLES `lan_tra` WRITE;
/*!40000 ALTER TABLE `lan_tra` DISABLE KEYS */;
/*!40000 ALTER TABLE `lan_tra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ngon_ngu`
--

DROP TABLE IF EXISTS `ngon_ngu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ngon_ngu` (
  `MaNN` int(11) NOT NULL AUTO_INCREMENT,
  `Ten` varchar(45) NOT NULL,
  PRIMARY KEY (`MaNN`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ngon_ngu`
--

LOCK TABLES `ngon_ngu` WRITE;
/*!40000 ALTER TABLE `ngon_ngu` DISABLE KEYS */;
INSERT INTO `ngon_ngu` VALUES (1,'Tiếng Việt'),(2,'Tiếng Anh'),(3,'Trung Quốc'),(4,'Nhật Bản');
/*!40000 ALTER TABLE `ngon_ngu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nhan_vien`
--

DROP TABLE IF EXISTS `nhan_vien`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nhan_vien` (
  `MaNV` int(11) NOT NULL,
  `HoTen` varchar(45) NOT NULL,
  `NgaySinh` date NOT NULL,
  `DiaChi` varchar(45) NOT NULL,
  `Sdt` varchar(45) NOT NULL,
  `GioiTinh` tinyint(1) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `AnhDD` varchar(45) DEFAULT NULL,
  `TenTK` varchar(45) NOT NULL,
  `MatKhau` varchar(45) NOT NULL,
  PRIMARY KEY (`MaNV`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nhan_vien`
--

LOCK TABLES `nhan_vien` WRITE;
/*!40000 ALTER TABLE `nhan_vien` DISABLE KEYS */;
INSERT INTO `nhan_vien` VALUES (1,'Bùi Quang Cường','1996-12-22','234 Trần Thái Tông, Cầu Giấy, Hà Nội','01681253134',1,'cuong@dvd',NULL,'cuong','1234'),(2,'Đinh Tiến Lộc','1996-12-20','165 Mai Dịch, Cầu Giấy, Hà Nội','09992411464',1,'loc@dvd',NULL,'loc','1234'),(3,'Phạm Minh Hoàng Linh','1996-11-04','183 Trần Quốc Hoàn, Cầu Giấy, Hà Nội','08431285511',1,'linh@dvd',NULL,'linh','1234');
/*!40000 ALTER TABLE `nhan_vien` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phim`
--

DROP TABLE IF EXISTS `phim`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phim` (
  `MaPhim` int(11) NOT NULL AUTO_INCREMENT,
  `Ten` varchar(255) NOT NULL,
  `MoTa` mediumtext,
  `NamPhatHanh` int(11) DEFAULT NULL,
  `QuocGia` int(11) DEFAULT NULL,
  `NgonNgu` int(11) NOT NULL,
  `NgonNguGoc` int(11) DEFAULT NULL,
  `DoDai` int(11) DEFAULT NULL,
  `GiaDatCoc` decimal(5,2) NOT NULL,
  `ThoiHanTra` int(11) NOT NULL,
  `GiaDonVi` decimal(5,2) NOT NULL,
  `XepLoai` int(11) NOT NULL,
  PRIMARY KEY (`MaPhim`),
  KEY `fk_quocgia_idx` (`QuocGia`),
  KEY `fk_ngonngu_idx` (`NgonNgu`),
  KEY `fk_ngonngugoc_idx` (`NgonNguGoc`),
  CONSTRAINT `fk_ngonngu` FOREIGN KEY (`NgonNgu`) REFERENCES `ngon_ngu` (`MaNN`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ngonngugoc` FOREIGN KEY (`NgonNguGoc`) REFERENCES `ngon_ngu` (`MaNN`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_quocgia` FOREIGN KEY (`QuocGia`) REFERENCES `quoc_gia` (`MaQG`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phim`
--

LOCK TABLES `phim` WRITE;
/*!40000 ALTER TABLE `phim` DISABLE KEYS */;
/*!40000 ALTER TABLE `phim` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phim_dienvien`
--

DROP TABLE IF EXISTS `phim_dienvien`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phim_dienvien` (
  `MaPhim` int(11) NOT NULL,
  `MaDV` int(11) NOT NULL,
  PRIMARY KEY (`MaPhim`,`MaDV`),
  KEY `fk_PHIM_has_DIEN_VIEN_DIEN_VIEN1_idx` (`MaDV`),
  KEY `fk_PHIM_has_DIEN_VIEN_PHIM1_idx` (`MaPhim`),
  CONSTRAINT `fk_PHIM_has_DIEN_VIEN_DIEN_VIEN1` FOREIGN KEY (`MaDV`) REFERENCES `dien_vien` (`MaDV`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_PHIM_has_DIEN_VIEN_PHIM1` FOREIGN KEY (`MaPhim`) REFERENCES `phim` (`MaPhim`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phim_dienvien`
--

LOCK TABLES `phim_dienvien` WRITE;
/*!40000 ALTER TABLE `phim_dienvien` DISABLE KEYS */;
/*!40000 ALTER TABLE `phim_dienvien` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phim_theloai`
--

DROP TABLE IF EXISTS `phim_theloai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phim_theloai` (
  `MaPhim` int(11) NOT NULL,
  `MaTL` int(11) NOT NULL,
  PRIMARY KEY (`MaPhim`,`MaTL`),
  KEY `fk_PHIM_has_THE_LOAI_THE_LOAI1_idx` (`MaTL`),
  KEY `fk_PHIM_has_THE_LOAI_PHIM1_idx` (`MaPhim`),
  CONSTRAINT `fk_PHIM_has_THE_LOAI_PHIM1` FOREIGN KEY (`MaPhim`) REFERENCES `phim` (`MaPhim`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_PHIM_has_THE_LOAI_THE_LOAI1` FOREIGN KEY (`MaTL`) REFERENCES `the_loai` (`MaTL`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phim_theloai`
--

LOCK TABLES `phim_theloai` WRITE;
/*!40000 ALTER TABLE `phim_theloai` DISABLE KEYS */;
/*!40000 ALTER TABLE `phim_theloai` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quoc_gia`
--

DROP TABLE IF EXISTS `quoc_gia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quoc_gia` (
  `MaQG` int(11) NOT NULL AUTO_INCREMENT,
  `HoTen` varchar(45) NOT NULL,
  PRIMARY KEY (`MaQG`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quoc_gia`
--

LOCK TABLES `quoc_gia` WRITE;
/*!40000 ALTER TABLE `quoc_gia` DISABLE KEYS */;
INSERT INTO `quoc_gia` VALUES (1,'Mỹ'),(2,'Việt Nam'),(3,'Hàn Quốc'),(4,'Nhật Bản'),(5,'Pháp'),(6,'Anh');
/*!40000 ALTER TABLE `quoc_gia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `the_loai`
--

DROP TABLE IF EXISTS `the_loai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `the_loai` (
  `MaTL` int(11) NOT NULL AUTO_INCREMENT,
  `Ten` varchar(45) NOT NULL,
  PRIMARY KEY (`MaTL`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `the_loai`
--

LOCK TABLES `the_loai` WRITE;
/*!40000 ALTER TABLE `the_loai` DISABLE KEYS */;
INSERT INTO `the_loai` VALUES (1,'Hài hước'),(2,'Hành động'),(3,'Tâm lý'),(4,'Tình cảm'),(5,'Viễn tưởng'),(6,'Phiêu lưu'),(7,'Hoạt hình');
/*!40000 ALTER TABLE `the_loai` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-10-28 20:05:44
