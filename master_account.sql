-- phpMyAdmin SQL Dump
-- version 5.2.1deb1+deb12u1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 10, 2026 at 03:48 AM
-- Server version: 10.11.14-MariaDB-0+deb12u2
-- PHP Version: 8.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sinarbit`
--

-- --------------------------------------------------------

--
-- Table structure for table `master_account`
--

CREATE TABLE `master_account` (
  `number` char(6) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `class` char(2) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `type` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `induk` char(6) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `levelAkun` char(1) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `master_account`
--

INSERT INTO `master_account` (`number`, `name`, `class`, `type`, `induk`, `levelAkun`) VALUES
('1-0000', 'Aktiva                                            ', 'AS', 'Header    ', '1-0000', '1'),
('1-1000', '   Aktiva Lancar                                  ', 'AS', 'Header    ', '1-0000', '2'),
('1-1100', '      Kas & Bank                                  ', 'AS', 'Header    ', '1-1000', '3'),
('1-1110', '          Kas                   ', 'AS', 'Detail    ', '1-1100', '4'),
('1-1120', '          Bank BCA                                ', 'AS', 'Detail    ', '1-1100', '4'),
('1-1130', '          Bank Mandiri                            ', 'AS', 'Detail    ', '1-1100', '4'),
('1-1200', '      Piutang Usaha                               ', 'AS', 'Detail    ', '1-1000', '3'),
('1-1210', '      Piutang Lain                                ', 'AS', 'Detail    ', '1-1000', '3'),
('1-1300', '      Persediaan Barang                           ', 'AS', 'Detail    ', '1-1000', '3'),
('1-2000', '   Aktiva Tetap                                   ', 'AS', 'Header    ', '1-0000', '2'),
('1-2100', '      Inventaris Kantor                           ', 'AS', 'Detail    ', '1-2000', '3'),
('1-2400', '      Akumulasi Depresiasi                        ', 'AS', 'Header    ', '1-2000', '3'),
('2-0000', 'Pasiva                                            ', 'LI', 'Header    ', '2-0000', '1'),
('2-1000', '   Kewajiban                                      ', 'LI', 'Header    ', '2-0000', '2'),
('2-1100', '      Hutang Usaha                                ', 'LI', 'Detail    ', '2-1000', '3'),
('2-1200', '      Hutang Bank                                 ', 'LI', 'Detail    ', '2-1000', '3'),
('2-1300', '      Hutang Lain                                 ', 'LI', 'Detail    ', '2-1000', '3'),
('2-2000', '   Ekuitas                                        ', 'LI', 'Header    ', '2-0000', '2'),
('2-2100', '      Modal Disetor                               ', 'LI', 'Detail    ', '2-2000', '3'),
('2-2200', '      Laba Periode Berjalan                       ', 'LI', 'Detail    ', '2-2000', '3'),
('2-2300', '      Laba Ditahan                                ', 'LI', 'Detail    ', '2-2000', '3'),
('4-0000', 'Pendapatan                                        ', 'IN', 'Header    ', '4-0000', '1'),
('4-1000', '   Pendapatan Server dan Program                  ', 'IN', 'Detail    ', '4-0000', '2'),
('4-2000', '   Pendapatan Hardware dan Service                ', 'IN', 'Detail    ', '4-0000', '2'),
('4-3000', '   Pendapatan Lainnya                             ', 'IN', 'Detail    ', '4-0000', '2'),
('6-0000', 'Biaya                                             ', 'EX', 'Header    ', '6-0000', '1'),
('6-1000', '   Harga Pokok Penjualan                          ', 'EX', 'Detail    ', '6-0000', '2'),
('6-2000', '   Biaya Operasional                              ', 'EX', 'Header    ', '6-0000', '2'),
('6-2001', '      Biaya Gaji dan Insentif                     ', 'EX', 'Detail    ', '6-2000', '3'),
('6-2005', '      Biaya Transportasi                          ', 'EX', 'Detail    ', '6-2000', '3'),
('6-2006', '      Biaya Rumah Tangga                          ', 'EX', 'Detail    ', '6-2000', '3'),
('6-2007', '      Biaya Asuransi, Kesehatan dan Pendidikan    ', 'EX', 'Detail    ', '6-2000', '3'),
('6-2009', '      Biaya Perawatan Kantor                      ', 'EX', 'Detail    ', '6-2000', '3'),
('6-2010', '      Biaya Perlengkapan Kantor                   ', 'EX', 'Detail    ', '6-2000', '3'),
('6-2011', '      Biaya Perbaikan Kendaraan                   ', 'EX', 'Detail    ', '6-2000', '3'),
('6-2014', '      Biaya Listrik, Telp dan Air                 ', 'EX', 'Detail    ', '6-2000', '3'),
('6-2017', '      Biaya Administrasi                          ', 'EX', 'Detail    ', '6-2000', '3'),
('6-2020', '      Biaya Bunga Bank dan Pajak                  ', 'EX', 'Detail    ', '6-2000', '3'),
('6-2021', '      Biaya Operasional Lainnya                   ', 'EX', 'Detail    ', '6-2000', '3'),
('6-2025', '      Biaya Penyusutan                            ', 'EX', 'Detail    ', '6-2000', '3'),
('6-2026', '      Biaya Kesehatan                             ', 'EX', 'Detail    ', '6-2000', '3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `master_account`
--
ALTER TABLE `master_account`
  ADD PRIMARY KEY (`number`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
