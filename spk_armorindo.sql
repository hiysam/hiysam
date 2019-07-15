# Host: localhost  (Version 5.5.5-10.1.38-MariaDB)
# Date: 2019-07-15 19:15:41
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "absen"
#

DROP TABLE IF EXISTS `absen`;
CREATE TABLE `absen` (
  `nik` int(8) NOT NULL,
  `tahun` varchar(4) NOT NULL DEFAULT '',
  `rata` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "absen"
#

INSERT INTO `absen` VALUES (118133,'2019',10);

#
# Structure for table "hasil"
#

DROP TABLE IF EXISTS `hasil`;
CREATE TABLE `hasil` (
  `nik` varchar(6) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `id_hasil` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_hasil`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

#
# Data for table "hasil"
#

INSERT INTO `hasil` VALUES ('118133','2019',1),('118251','2019',2),('118133','2019',3);

#
# Structure for table "karyawan"
#

DROP TABLE IF EXISTS `karyawan`;
CREATE TABLE `karyawan` (
  `nik` int(8) NOT NULL,
  `nama_karyawan` varchar(30) NOT NULL DEFAULT '',
  `alamat_karyawan` varchar(50) NOT NULL DEFAULT '',
  `telepon` varchar(15) NOT NULL DEFAULT '',
  `hasil_karyawan` double NOT NULL,
  PRIMARY KEY (`nik`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "karyawan"
#

INSERT INTO `karyawan` VALUES (118133,'Budi Wijaya Kusuma','jl.Kemanggisan','082112546778',0.9243069641649699),(118251,'Zulfikri Baihaqi','jl.Palmerah Utara','087867543256',0.96851521298174),(118271,'Ali Sadewo','jl.Tanjung Duren IV','082166778545',0.97888888888889),(118339,'Irawan Andi S','jl.Kepa duri','087853247789',0.90608519269777),(119010,'Fella Yuda Perkasa','jl.Petamburan III','082167894134',0.92710389903088);

#
# Structure for table "kriteria"
#

DROP TABLE IF EXISTS `kriteria`;
CREATE TABLE `kriteria` (
  `id_kriteria` int(2) NOT NULL AUTO_INCREMENT,
  `nama_kriteria` varchar(25) NOT NULL DEFAULT '',
  `tipe_kriteria` varchar(10) NOT NULL DEFAULT '',
  `bobot_kriteria` double NOT NULL,
  PRIMARY KEY (`id_kriteria`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

#
# Data for table "kriteria"
#

INSERT INTO `kriteria` VALUES (1,'Absensi','benefit',0.2),(2,'Kualitas Kerja','benefit',0.3),(3,'Kerjasama','benefit',0.3),(4,'Kedisiplinan','benefit',0.2);

#
# Structure for table "nilai"
#

DROP TABLE IF EXISTS `nilai`;
CREATE TABLE `nilai` (
  `id_nilai` int(2) NOT NULL AUTO_INCREMENT,
  `ket_nilai` varchar(45) NOT NULL DEFAULT '',
  `jum_nilai` double NOT NULL,
  PRIMARY KEY (`id_nilai`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Data for table "nilai"
#

INSERT INTO `nilai` VALUES (1,'20%',0.2),(2,'30%',0.3);

#
# Structure for table "pengguna"
#

DROP TABLE IF EXISTS `pengguna`;
CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id_pengguna`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Data for table "pengguna"
#

INSERT INTO `pengguna` VALUES (1,'Hiysam Ash Shiddigie','admin','21232f297a57a5a743894a0e4a801fc3');

#
# Structure for table "rangking"
#

DROP TABLE IF EXISTS `rangking`;
CREATE TABLE `rangking` (
  `nik` int(8) NOT NULL,
  `id_kriteria` int(2) NOT NULL,
  `nilai_rangking` double NOT NULL,
  `nilai_normalisasi` double NOT NULL,
  `bobot_normalisasi` double NOT NULL,
  `tahun_normalisasi` date DEFAULT NULL,
  PRIMARY KEY (`nik`,`id_kriteria`),
  KEY `id_kriteria` (`id_kriteria`),
  CONSTRAINT `rangking_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `karyawan` (`nik`),
  CONSTRAINT `rangking_ibfk_2` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "rangking"
#

INSERT INTO `rangking` VALUES (118133,1,95,0.95,0.19,'2019-06-25'),(118133,2,80,0.94117647058824,0.28235294117647,'2019-06-25'),(118133,3,75,0.86206896551724,0.25862068965517,'2019-06-25'),(118133,4,87,0.96666666666667,0.19333333333333,'2019-06-25'),(118251,1,93,0.93,0.186,'2019-06-25'),(118251,2,82,0.96470588235294,0.28941176470588,'2019-06-25'),(118251,3,85,0.97701149425287,0.29310344827586,'2019-06-25'),(118251,4,90,1,0.2,'2019-06-25'),(118271,1,95,0.95,0.19,'2019-06-25'),(118271,2,85,1,0.3,'2019-06-25'),(118271,3,87,1,0.3,'2019-06-25'),(118271,4,85,0.94444444444444,0.18888888888889,'2019-06-25'),(118339,1,100,1,0.2,'2019-06-25'),(118339,2,75,0.88235294117647,0.26470588235294,'2019-06-25'),(118339,3,70,0.80459770114943,0.24137931034483,'2019-06-25'),(118339,4,90,1,0.2,'2019-06-25'),(119010,1,90,0.9,0.18,'2019-06-25'),(119010,2,80,0.94117647058824,0.28235294117647,'2019-06-25'),(119010,3,80,0.91954022988506,0.27586206896552,'2019-06-25'),(119010,4,85,0.94444444444444,0.18888888888889,'2019-06-25');
