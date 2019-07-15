# Host: localhost  (Version 5.5.16)
# Date: 2018-06-04 20:53:47
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "alternatif"
#

DROP TABLE IF EXISTS `alternatif`;
CREATE TABLE `alternatif` (
  `id_dokter` int(11) NOT NULL AUTO_INCREMENT,
  `nama_dokter` varchar(255) NOT NULL,
  `alamat_dokter` varchar(255) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `hasil_dokter` double NOT NULL,
  PRIMARY KEY (`id_dokter`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "alternatif"
#


#
# Structure for table "kriteria"
#

DROP TABLE IF EXISTS `kriteria`;
CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kriteria` varchar(255) NOT NULL,
  `tipe_kriteria` varchar(10) NOT NULL,
  `bobot_kriteria` double NOT NULL,
  PRIMARY KEY (`id_kriteria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "kriteria"
#


#
# Structure for table "nilai"
#

DROP TABLE IF EXISTS `nilai`;
CREATE TABLE `nilai` (
  `id_nilai` int(6) NOT NULL AUTO_INCREMENT,
  `ket_nilai` varchar(45) NOT NULL,
  `jum_nilai` double NOT NULL,
  PRIMARY KEY (`id_nilai`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "nilai"
#


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

INSERT INTO `pengguna` VALUES (1,'Imbar Yuli Hartoko','admin','21232f297a57a5a743894a0e4a801fc3');

#
# Structure for table "rangking"
#

DROP TABLE IF EXISTS `rangking`;
CREATE TABLE `rangking` (
  `id_dokter` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai_rangking` double NOT NULL,
  `nilai_normalisasi` double NOT NULL,
  `bobot_normalisasi` double NOT NULL,
  PRIMARY KEY (`id_dokter`,`id_kriteria`),
  KEY `id_kriteria` (`id_kriteria`),
  CONSTRAINT `rangking_ibfk_2` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `rangking_ibfk_1` FOREIGN KEY (`id_dokter`) REFERENCES `alternatif` (`id_dokter`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "rangking"
#

