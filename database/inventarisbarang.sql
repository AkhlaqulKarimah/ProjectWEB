-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2021 at 06:36 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `inventarisbarang`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `hitungjenisbarang`
--
CREATE TABLE IF NOT EXISTS `hitungjenisbarang` (
`IDjenisbarang` int(50)
,`jumlah` bigint(21)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `hitungkondisi`
--
CREATE TABLE IF NOT EXISTS `hitungkondisi` (
`IDkondisi` int(50)
,`jumlah` bigint(21)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `hitungruangan`
--
CREATE TABLE IF NOT EXISTS `hitungruangan` (
`IDruangan` int(50)
,`jumlah` bigint(21)
);
-- --------------------------------------------------------

--
-- Table structure for table `jenisbarang`
--

CREATE TABLE IF NOT EXISTS `jenisbarang` (
`IDjenisbarang` int(50) NOT NULL,
  `namajenisbarang` varchar(50) NOT NULL,
  `kodejenisbarang` varchar(32) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenisbarang`
--

INSERT INTO `jenisbarang` (`IDjenisbarang`, `namajenisbarang`, `kodejenisbarang`) VALUES
(1, 'Routerboard', 'ROUBD'),
(2, 'Router Enterprise', 'ROUEN'),
(3, 'LAN Tester Digital', 'LANTD'),
(4, 'Mesin Press 5 in 1', 'MP5I1'),
(5, 'Mesin Press Mug', 'MPMUG'),
(9, 'LAPTOP', 'LPTOP');

-- --------------------------------------------------------

--
-- Table structure for table `kondisi`
--

CREATE TABLE IF NOT EXISTS `kondisi` (
`IDkondisi` int(50) NOT NULL,
  `namakondisi` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kondisi`
--

INSERT INTO `kondisi` (`IDkondisi`, `namakondisi`) VALUES
(1, 'Baik'),
(2, 'Rusak Ringan'),
(3, 'Rusak Berat');

-- --------------------------------------------------------

--
-- Table structure for table `merk`
--

CREATE TABLE IF NOT EXISTS `merk` (
`IDmerk` int(50) NOT NULL,
  `namamerk` varchar(50) NOT NULL,
  `kodemerk` varchar(32) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `merk`
--

INSERT INTO `merk` (`IDmerk`, `namamerk`, `kodemerk`) VALUES
(1, 'Mikrotik', 'MKRTK'),
(2, 'Cisco', 'CISCO'),
(3, 'Goldtool', 'GLDTL'),
(4, 'Hotplate', 'HTPLT');

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE IF NOT EXISTS `ruangan` (
`IDruangan` int(50) NOT NULL,
  `namaruangan` varchar(50) NOT NULL,
  `keteranganruangan` varchar(200) NOT NULL,
  `fotoruangan` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`IDruangan`, `namaruangan`, `keteranganruangan`, `fotoruangan`) VALUES
(1, 'LabTKJ', 'Ruang Kelas di samping ruang instruktur', '2148_LABTKJ.jpg'),
(2, 'LabDG', 'Ruang Kelas di kantor pusat lantai 2', '3395_5252_LABDG.jpg'),
(3, 'LabWEb', 'Ruang Kelas di samping ruang instruktur 2', '16320_9325_bg-title-01.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblbarang`
--

CREATE TABLE IF NOT EXISTS `tblbarang` (
`IDbarang` int(50) NOT NULL,
  `kode` varchar(40) NOT NULL,
  `tipe` varchar(50) NOT NULL,
  `spesifikasi` varchar(200) NOT NULL,
  `nomorinventaris` int(50) NOT NULL,
  `tahunperolehan` int(20) NOT NULL,
  `tglcek` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fotobarang` varchar(40) NOT NULL,
  `ket` varchar(100) NOT NULL,
  `IDuser` int(50) NOT NULL,
  `IDjenisbarang` int(50) NOT NULL,
  `IDmerk` int(50) NOT NULL,
  `IDruangan` int(50) NOT NULL,
  `IDkondisi` int(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbarang`
--

INSERT INTO `tblbarang` (`IDbarang`, `kode`, `tipe`, `spesifikasi`, `nomorinventaris`, `tahunperolehan`, `tglcek`, `fotobarang`, `ket`, `IDuser`, `IDjenisbarang`, `IDmerk`, `IDruangan`, `IDkondisi`) VALUES
(2, 'NET.R-M-002', 'RB750Gr3', '- Architecture: MMIPS\r\n- CPU: MT7621A 2 Core 4 thr 880Mhz\r\n- Main Storage/NAND: 16MB\r\n- Power on USB\r\n- MicroSD Memory Cards Port\r\n- POE Input: 8-30V\r\n- Voltage Monitor\r\n- Temperature Sensor\r\n- Operat', 1996218004, 2017, '2021-04-12 11:35:32', '6960_2148_LABTKJ.jpg', 'sudak baik', 2, 4, 1, 1, 1),
(3, 'NET.RBM-003', 'RB750Gr3', '- Architecture: MMIPS\r\n- CPU: MT7621A 2 Core 4 thr 880Mhz\r\n- Main Storage/NAND: 16MB\r\n- Power on USB\r\n- MicroSD Memory Cards Port\r\n- POE Input: 8-30V\r\n- Voltage Monitor\r\n- Temperature Sensor\r\n- Operat', 1996218004, 2016, '2021-04-12 11:34:24', '1889925306_1683_3878_3395_5252_LABDG.jpg', 'sudak baik', 2, 5, 2, 3, 1),
(4, 'NET.REC-001', 'RB750Gr3', '"- Architecture: MMIPS\r\n- CPU: MT7621A 2 Core 4 thr 880Mhz\r\n- Main Storage/NAND: 16MB\r\n- RAM: 256MB\r\n- 5 LAN Ports Gigabit\r\n- 1 Switch Chip\r\n- USB Port\r\n- Power on USB\r\n- MicroSD Memory Cards Port\r\n- ', 1975710002, 2020, '2021-04-12 11:34:24', '555645253_1683_3878_3395_5252_LABDG.jpg', 'sudak baik', 2, 1, 3, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `foto` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`, `foto`) VALUES
(1, 'danar', 'danar', 'danar', '4556_2258_5646_13321_153650101311.png'),
(2, 'rima', 'rima', 'rima', '6338_20492_1537840377928.png'),
(3, 'bima', 'bima', 'bima', '1469122762_7656_13321_153650101311.png'),
(4, 'lordgent', 'lordgent', 'lorgent', '548172172_5646_13321_153650101311.png');

-- --------------------------------------------------------

--
-- Structure for view `hitungjenisbarang`
--
DROP TABLE IF EXISTS `hitungjenisbarang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `hitungjenisbarang` AS select `tblbarang`.`IDjenisbarang` AS `IDjenisbarang`,count(0) AS `jumlah` from `tblbarang` group by `tblbarang`.`IDjenisbarang`;

-- --------------------------------------------------------

--
-- Structure for view `hitungkondisi`
--
DROP TABLE IF EXISTS `hitungkondisi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `hitungkondisi` AS select `tblbarang`.`IDkondisi` AS `IDkondisi`,count(0) AS `jumlah` from `tblbarang` group by `tblbarang`.`IDkondisi`;

-- --------------------------------------------------------

--
-- Structure for view `hitungruangan`
--
DROP TABLE IF EXISTS `hitungruangan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `hitungruangan` AS select `tblbarang`.`IDruangan` AS `IDruangan`,count(0) AS `jumlah` from `tblbarang` group by `tblbarang`.`IDruangan`;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenisbarang`
--
ALTER TABLE `jenisbarang`
 ADD PRIMARY KEY (`IDjenisbarang`);

--
-- Indexes for table `kondisi`
--
ALTER TABLE `kondisi`
 ADD PRIMARY KEY (`IDkondisi`);

--
-- Indexes for table `merk`
--
ALTER TABLE `merk`
 ADD PRIMARY KEY (`IDmerk`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
 ADD PRIMARY KEY (`IDruangan`);

--
-- Indexes for table `tblbarang`
--
ALTER TABLE `tblbarang`
 ADD PRIMARY KEY (`IDbarang`), ADD KEY `inventaris_barang1` (`IDjenisbarang`), ADD KEY `inventaris_barang2` (`IDkondisi`), ADD KEY `inventaris_barang3` (`IDmerk`), ADD KEY `IDuser` (`IDuser`), ADD KEY `IDruangan` (`IDruangan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenisbarang`
--
ALTER TABLE `jenisbarang`
MODIFY `IDjenisbarang` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `kondisi`
--
ALTER TABLE `kondisi`
MODIFY `IDkondisi` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `merk`
--
ALTER TABLE `merk`
MODIFY `IDmerk` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
MODIFY `IDruangan` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tblbarang`
--
ALTER TABLE `tblbarang`
MODIFY `IDbarang` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblbarang`
--
ALTER TABLE `tblbarang`
ADD CONSTRAINT `inventaris_barang1` FOREIGN KEY (`IDjenisbarang`) REFERENCES `jenisbarang` (`IDjenisbarang`),
ADD CONSTRAINT `inventaris_barang2` FOREIGN KEY (`IDkondisi`) REFERENCES `kondisi` (`IDkondisi`),
ADD CONSTRAINT `inventaris_barang3` FOREIGN KEY (`IDmerk`) REFERENCES `merk` (`IDmerk`),
ADD CONSTRAINT `tblbarang_ibfk_1` FOREIGN KEY (`IDuser`) REFERENCES `users` (`id`),
ADD CONSTRAINT `tblbarang_ibfk_2` FOREIGN KEY (`IDruangan`) REFERENCES `ruangan` (`IDruangan`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
