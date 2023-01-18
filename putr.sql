-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Jan 2023 pada 13.33
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `putr`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `information`
--

CREATE TABLE `information` (
  `id_information` int(11) NOT NULL,
  `nama_dokumen_file` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembangunan`
--

CREATE TABLE `pembangunan` (
  `id_pembangunan` int(11) NOT NULL,
  `tanggal2` date NOT NULL,
  `nama_kegiatan2` text NOT NULL,
  `targett2` int(11) NOT NULL,
  `kontrak2` int(11) NOT NULL,
  `nama_perusahaan2` varchar(255) NOT NULL,
  `konsultan_pengawas2` varchar(255) NOT NULL,
  `tanggal_kontra2` date NOT NULL,
  `pelaksanaan2` int(11) NOT NULL,
  `pemberian_kesempatan2` int(11) NOT NULL,
  `tanggal_akhir_kontra2` date NOT NULL,
  `keuangan_rp2` int(11) NOT NULL,
  `keuangan_persen2` int(11) NOT NULL,
  `fisik_rencana2` int(11) NOT NULL,
  `fisik_realisasi2` int(11) NOT NULL,
  `fisik_deviasi2` int(11) NOT NULL,
  `keterangan2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `reservasi`
--

CREATE TABLE `reservasi` (
  `id_reservasi` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_kegiatan` text NOT NULL,
  `targett` int(11) NOT NULL,
  `kontrak` int(11) NOT NULL,
  `nama_perusahaan` varchar(255) NOT NULL,
  `konsultan_pengawas` varchar(255) NOT NULL,
  `tanggal_kontra` date NOT NULL,
  `pelaksanaan` int(11) NOT NULL,
  `pemberian_kesempatan` int(11) NOT NULL,
  `tanggal_akhir_kontra` date NOT NULL,
  `keuangan_rp` int(11) NOT NULL,
  `keuangan_persen` int(11) NOT NULL,
  `fisik_rencana` int(11) NOT NULL,
  `fisik_realisasi` int(11) NOT NULL,
  `fisik_deviasi` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_login` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `photo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_login`, `name`, `email`, `password`, `photo`) VALUES
(1, 'user', 'user@gmail.com', 'user1234', '_pic_1673779810.png'),
(2, 'user001', 'user001@gmail.com', 'user12345', 'user001_pic_1673779861.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`id_information`);

--
-- Indeks untuk tabel `pembangunan`
--
ALTER TABLE `pembangunan`
  ADD PRIMARY KEY (`id_pembangunan`);

--
-- Indeks untuk tabel `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`id_reservasi`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_login`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `information`
--
ALTER TABLE `information`
  MODIFY `id_information` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pembangunan`
--
ALTER TABLE `pembangunan`
  MODIFY `id_pembangunan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `id_reservasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
