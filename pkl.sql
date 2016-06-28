-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 16, 2014 at 01:16 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pkl`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(15) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=62 ;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `kode`, `nama`) VALUES
(1, '020603', 'KOMPUTER'),
(2, '02060301', 'Komputer Unit/Jaringan'),
(3, '0206030101', 'Mainframe'),
(4, '0206030102', 'Mini Komputer'),
(5, '0206030103', 'Local Area Network (LAN)'),
(6, '0206030104', 'Internet'),
(8, '02060302', 'Personal Komputer'),
(9, '0206030201', 'P.C. Unit'),
(10, '0206030202', 'Lap Top'),
(11, '0206030203', 'Note Book'),
(12, '0206030204', 'Palm Top'),
(14, '02060303', 'Peralatan Komputer Mainframe'),
(15, '0206030301', 'Card Reader'),
(16, '0206030302', 'Magnetic Tape Unit'),
(17, '0206030303', 'Floppy Disk Unit'),
(18, '0206030304', 'Storage Modul Disk'),
(19, '0206030305', 'Console Unit'),
(20, '0206030306', 'CPU'),
(21, '0206030307', 'Disk Parck'),
(22, '0206030308', 'Hard Copy Console'),
(23, '0206030309', 'Serial Pointer'),
(24, '0206030310', 'Line Printer'),
(25, '0206030311', 'Ploter'),
(26, '0206030312', 'Hard Disk'),
(27, '0206030313', 'KEYBOARD'),
(29, '02060304', 'Peralatan Mini Komputer'),
(30, '0206030401', 'Card Reader'),
(31, '0206030402', 'Magnetic Tape Unit'),
(32, '0206030403', 'Flopp Disk Unit'),
(33, '0206030404', 'Storage Modul Disk'),
(34, '0206030405', 'Console Unit'),
(35, '0206030406', 'CPU'),
(36, '0206030407', 'Disk Pack'),
(37, '0206030408', 'Printer'),
(38, '0206030409', 'Plotter'),
(39, '0206030410', 'Scanner'),
(40, '0206030411', 'Computer Compatible'),
(41, '0206030412', 'Viewer'),
(42, '0206030413', 'Digitzer'),
(43, '0206030414', 'Keyboard'),
(45, '02060305', 'Peralatan Personal Komputer'),
(46, '0206030501', 'CPU'),
(47, '0206030502', 'Monitor'),
(48, '0206030503', 'Printer'),
(49, '0206030504', 'Scanner'),
(50, '0206030505', 'Plotter'),
(51, '0206030506', 'Viewer'),
(52, '0206030507', 'Extermal'),
(53, '0206030508', 'Digitzer'),
(54, '0206030509', 'Keyboard'),
(56, '02060306', 'Peralatan Jaringan'),
(57, '0206030601', 'Server'),
(58, '0206030602', 'Router'),
(59, '0206030603', 'Hub'),
(60, '0206030604', 'Modem'),
(61, '0206030605', 'Netware Interface External');

-- --------------------------------------------------------

--
-- Table structure for table `dinas`
--

CREATE TABLE IF NOT EXISTS `dinas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `nip` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `dinas`
--

INSERT INTO `dinas` (`id`, `nama`, `nip`) VALUES
(1, 'ppppppp', '8888888');

-- --------------------------------------------------------

--
-- Table structure for table `inventori`
--

CREATE TABLE IF NOT EXISTS `inventori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_barang` int(11) DEFAULT NULL,
  `barang` varchar(50) NOT NULL,
  `merk` varchar(50) DEFAULT NULL,
  `sertifikat` varchar(50) DEFAULT NULL,
  `bahan` varchar(50) DEFAULT NULL,
  `asal` varchar(50) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `ukuran` varchar(50) DEFAULT NULL,
  `satuan` varchar(50) DEFAULT NULL,
  `kondisi` varchar(15) DEFAULT NULL,
  `jumlah` varchar(50) DEFAULT NULL,
  `harga` varchar(50) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `id_jurusan` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `inventori`
--

INSERT INTO `inventori` (`id`, `id_barang`, `barang`, `merk`, `sertifikat`, `bahan`, `asal`, `tanggal`, `ukuran`, `satuan`, `kondisi`, `jumlah`, `harga`, `keterangan`, `id_jurusan`) VALUES
(1, 9, '', 'Logitech', 'qwert', 'Besi', 'Beli', '2013-09-16', '000', 'buah', 'Baik', '10', '1000', 'Bantuan Diknas', 1),
(2, 9, '', '', '', '', '', '2013-09-27', '', '', 'Rusak', '3', '1000', '', 1),
(3, 9, '', '', '', '', '', '2013-09-05', '', '', 'Kurang Baik', '4', '1000', '', 1),
(4, 9, '', 'HP', '', 'Campuran', 'Beli', '2014-02-24', '', 'Buah', 'Baik', '3', '1000', 'Pengadaan Sendiri', 1),
(6, 4, '', '', '', '', '', '2013-08-06', '', '', 'Baik', '10', '1000', '', 1),
(7, 4, '', '', '', '', '', '2013-09-27', '', '', 'Rusak', '3', '1000', '', 1),
(8, 4, '', '', '', '', '', '2013-09-05', '', '', 'Kurang Baik', '4', '1000', '', 1),
(9, 4, 'Laptop', 'HP', '', 'Campuran', 'Pembelian', '2014-02-24', '', 'buah', 'Baik', '3', '1000', 'Bantuan Diknas', 1),
(10, 4, '', '', '', '', '', '2014-04-11', '', '', 'Rusak', '1', '1000', '', 1),
(11, 7, '', '', '', '', '', '2013-08-06', '', '', 'Baik', '10', '1000', '', 1),
(12, 9, '', '', '', '', '', '2013-09-30', '', '', 'Kurang Baik', '1', '1000', '', 1),
(13, 9, '', 'Logitech', 'qwert', 'Campuran', 'Beli', '2013-08-06', '000', 'buah', 'Baik', '10', '1000', 'Bantuan Diknas', 1),
(14, 9, '', 'Logitech', 'qwert', 'Campuran', 'Beli', '2013-08-06', '000', 'buah', 'Baik', '10', '1000', 'Bantuan Diknas', 1),
(15, 9, '', 'Logitech', 'qwert', 'Campuran', 'Beli', '2013-08-06', '000', 'buah', 'Baik', '10', '1000', 'Bantuan Diknas', 1),
(16, 2, 'ok', 'ok', 'q', 'Campuran', 'q', '2014-03-06', 'q', 'buah', 'Baik', '1', '444', 'Bantuan Diknas', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE IF NOT EXISTS `jurusan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id`, `nama`) VALUES
(1, 'Teknik Komputer Jaringan'),
(2, 'tata busana'),
(3, 'KCR'),
(4, 'Boga');

-- --------------------------------------------------------

--
-- Table structure for table `pengurus`
--

CREATE TABLE IF NOT EXISTS `pengurus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_jurusan` int(11) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` text,
  `nama` varchar(150) DEFAULT NULL,
  `nip` varchar(50) DEFAULT NULL,
  `lokasi` varchar(120) DEFAULT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `pengurus`
--

INSERT INTO `pengurus` (`id`, `id_jurusan`, `username`, `password`, `nama`, `nip`, `lokasi`, `status`) VALUES
(1, 1, 'tkj', 'tkj', 'Wendy Tutu Trilaksono, S.Kom', '19772906 201001 1 010', ' Gudang LAB 1 TKJ', 2),
(2, 2, 'tb', 'tb', '???', '???', '???', 0),
(3, 4, 'boga', 'boga', 'elly', '9', 'boga', 1);

-- --------------------------------------------------------

--
-- Table structure for table `skpd`
--

CREATE TABLE IF NOT EXISTS `skpd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `nip` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `skpd`
--

INSERT INTO `skpd` (`id`, `nama`, `nip`) VALUES
(1, 'ooooooo', '7777777');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
