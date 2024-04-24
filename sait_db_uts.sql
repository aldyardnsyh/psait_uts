-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Apr 2024 pada 18.43
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sait_db_uts`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswas`
--

CREATE TABLE `mahasiswas` (
  `nim` varchar(10) NOT NULL,
  `nama` varchar(20) DEFAULT NULL,
  `alamat` varchar(40) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mahasiswas`
--

INSERT INTO `mahasiswas` (`nim`, `nama`, `alamat`, `tanggal_lahir`) VALUES
('sv_001', 'Joko', 'Bantul', '1999-12-07'),
('sv_002', 'Paul', 'Sleman', '2000-10-07'),
('sv_003', 'Andy', 'Surabaya', '2000-02-09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `matakuliahs`
--

CREATE TABLE `matakuliahs` (
  `kode_mk` varchar(10) NOT NULL,
  `nama_mk` varchar(20) DEFAULT NULL,
  `sks` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `matakuliahs`
--

INSERT INTO `matakuliahs` (`kode_mk`, `nama_mk`, `sks`) VALUES
('svpl_001', 'Database', 2),
('svpl_002', 'Kecerdasan Artifisia', 2),
('svpl_003', 'Interoperabilitas', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `perkuliahans`
--

CREATE TABLE `perkuliahans` (
  `id_perkuliahan` int(5) NOT NULL,
  `nim` varchar(10) DEFAULT NULL,
  `kode_mk` varchar(10) DEFAULT NULL,
  `nilai` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `perkuliahans`
--

INSERT INTO `perkuliahans` (`id_perkuliahan`, `nim`, `kode_mk`, `nilai`) VALUES
(11, 'sv_001', 'svpl_001', 90),
(12, 'sv_001', 'svpl_002', 87),
(13, 'sv_001', 'svpl_003', 88),
(14, 'sv_002', 'svpl_001', 98),
(15, 'sv_002', 'svpl_002', 77);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `mahasiswas`
--
ALTER TABLE `mahasiswas`
  ADD PRIMARY KEY (`nim`);

--
-- Indeks untuk tabel `matakuliahs`
--
ALTER TABLE `matakuliahs`
  ADD PRIMARY KEY (`kode_mk`);

--
-- Indeks untuk tabel `perkuliahans`
--
ALTER TABLE `perkuliahans`
  ADD PRIMARY KEY (`id_perkuliahan`),
  ADD KEY `nim` (`nim`),
  ADD KEY `kode_mk` (`kode_mk`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `perkuliahans`
--
ALTER TABLE `perkuliahans`
  MODIFY `id_perkuliahan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `perkuliahans`
--
ALTER TABLE `perkuliahans`
  ADD CONSTRAINT `perkuliahans_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mahasiswas` (`nim`),
  ADD CONSTRAINT `perkuliahans_ibfk_2` FOREIGN KEY (`kode_mk`) REFERENCES `matakuliahs` (`kode_mk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
