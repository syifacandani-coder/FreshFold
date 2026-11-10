-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Nov 2026 pada 06.07
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `freshfold_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `coa`
--

CREATE TABLE `coa` (
  `kode_akun` varchar(10) NOT NULL,
  `nama_akun` varchar(100) NOT NULL,
  `kategori` enum('Aset','Kewajiban','Ekuitas','Pendapatan','Beban') NOT NULL,
  `saldo_normal` enum('Debit','Kredit') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `coa`
--

INSERT INTO `coa` (`kode_akun`, `nama_akun`, `kategori`, `saldo_normal`) VALUES
('1-1100', 'Kas', 'Aset', 'Debit'),
('1-1200', 'Bank', 'Aset', 'Debit'),
('1-1300', 'Piutang Usaha', 'Aset', 'Debit'),
('1-1400', 'Mesin Laundry', 'Aset', 'Debit'),
('1-2100', 'Peralatan Laundry', 'Aset', 'Debit'),
('1-2110', 'Akumulasi Penyusutan Peralatan', 'Aset', 'Kredit'),
('2-1100', 'Utang Usaha', 'Kewajiban', 'Kredit'),
('2-1200', 'Utang Gaji', 'Kewajiban', 'Kredit'),
('3-1100', 'Modal Usaha', 'Ekuitas', 'Kredit'),
('3-1200', 'Laba Ditahan', 'Ekuitas', 'Debit'),
('4-1200', 'Pendapatan Usaha', 'Pendapatan', 'Kredit'),
('4-1300', 'Pendapatan Lain-lain', 'Pendapatan', 'Kredit'),
('5-1100', 'Beban Bahan Laundry', 'Beban', 'Debit'),
('5-1200', 'Beban Gaji', 'Beban', 'Debit'),
('5-1300', 'Beban Listrik dan Air', 'Beban', 'Debit'),
('5-1400', 'Beban Sewa', 'Beban', 'Debit'),
('5-1500', 'Beban Perawatan Mesin', 'Beban', 'Debit'),
('5-1600', 'Beban Penyusutan', 'Beban', 'Debit'),
('5-1700', 'Beban Lain-lain', 'Beban', 'Debit');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `coa`
--
ALTER TABLE `coa`
  ADD PRIMARY KEY (`kode_akun`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
