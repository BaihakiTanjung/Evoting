-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 18, 2017 at 05:13 PM
-- Server version: 5.5.58-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tugasakhir_evoting`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE IF NOT EXISTS `tb_admin` (
  `user` varchar(16) NOT NULL,
  `pass` varchar(16) NOT NULL,
  `level` varchar(16) NOT NULL,
  PRIMARY KEY (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`user`, `pass`, `level`) VALUES
('admin', 'admin', 'admin'),
('pengawas', 'pengawas', 'pengawas');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pemilih`
--

CREATE TABLE IF NOT EXISTS `tb_pemilih` (
  `id_pemilih` int(11) NOT NULL AUTO_INCREMENT,
  `ktp` varchar(16) NOT NULL,
  `nama_pemilih` varchar(64) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `pass` varchar(16) NOT NULL,
  PRIMARY KEY (`id_pemilih`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tb_pemilih`
--

INSERT INTO `tb_pemilih` (`id_pemilih`, `ktp`, `nama_pemilih`, `alamat`, `pass`) VALUES
(1, '1234567890', 'Alfreds Futterkiste', 'Obere Str. 57', '123'),
(2, '3216549870', 'Ana Trujillo Emparedados y helados', 'Avda. de la Constitucion 2222', '123'),
(3, '0987654321', 'Antonio Moreno Taqueria', 'Mataderos 2312', '123'),
(4, '1324657980', 'Around the Horn', '120 Hanover Sq.', '123'),
(5, '0897564231', 'Berglunds snabbkop', 'Berguvsvagen 8', '123'),
(7, '1123123123123', '2', '3', '4123123213');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pencalon`
--

CREATE TABLE IF NOT EXISTS `tb_pencalon` (
  `id_pencalon` int(11) NOT NULL AUTO_INCREMENT,
  `kode_pencalon` varchar(16) NOT NULL,
  `nama_pencalon` varchar(64) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  PRIMARY KEY (`id_pencalon`,`kode_pencalon`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tb_pencalon`
--

INSERT INTO `tb_pencalon` (`id_pencalon`, `kode_pencalon`, `nama_pencalon`, `gambar`, `keterangan`) VALUES
(2, '1', 'Prabowo Hatta', '3653prabowo-hatta.jpg', '-'),
(5, '2', 'Jokowi JK', '3680jokowi-jk.jpg', ''),
(6, '3', 'SBY Yudhoyono', '6277sby-yudhoyono.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pilih`
--

CREATE TABLE IF NOT EXISTS `tb_pilih` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `id_pencalon` int(16) NOT NULL,
  `id_pemilih` int(16) NOT NULL,
  `tanda_terima` varchar(10) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tb_pilih`
--

INSERT INTO `tb_pilih` (`ID`, `id_pencalon`, `id_pemilih`, `tanda_terima`) VALUES
(1, 5, 1, '1KUMJXICWN'),
(2, 2, 2, '2JKIZLVRYA');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
