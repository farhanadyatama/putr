-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Jan 2023 pada 11.51
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

--
-- Dumping data untuk tabel `information`
--

INSERT INTO `information` (`id_information`, `nama_dokumen_file`, `file`) VALUES
(9, 'tes', 'tes.pdf'),
(10, 'tes2', 'tes2.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembangunan`
--

CREATE TABLE `pembangunan` (
  `id_pembangunan` int(11) NOT NULL,
  `tanggal2` date NOT NULL,
  `nama_kegiatan2` text NOT NULL,
  `targett2` varchar(19) NOT NULL,
  `kontrak2` varchar(19) NOT NULL,
  `nama_perusahaan2` varchar(255) NOT NULL,
  `konsultan_pengawas2` varchar(255) NOT NULL,
  `tanggal_kontra2` date NOT NULL,
  `pelaksanaan2` int(11) NOT NULL,
  `pemberian_kesempatan2` varchar(11) NOT NULL,
  `tanggal_akhir_kontra2` varchar(19) NOT NULL,
  `keuangan_rp2` varchar(19) NOT NULL,
  `keuangan_persen2` varchar(19) NOT NULL,
  `fisik_rencana2` varchar(19) NOT NULL,
  `fisik_realisasi2` varchar(19) NOT NULL,
  `fisik_deviasi2` varchar(19) NOT NULL,
  `keterangan2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembangunan`
--

INSERT INTO `pembangunan` (`id_pembangunan`, `tanggal2`, `nama_kegiatan2`, `targett2`, `kontrak2`, `nama_perusahaan2`, `konsultan_pengawas2`, `tanggal_kontra2`, `pelaksanaan2`, `pemberian_kesempatan2`, `tanggal_akhir_kontra2`, `keuangan_rp2`, `keuangan_persen2`, `fisik_rencana2`, `fisik_realisasi2`, `fisik_deviasi2`, `keterangan2`) VALUES
(4, '2022-11-04', 'PEMBANGUNAN JALAN RUAS RANTEPAO-SADAN-BATUSITANDUK DI KAB. LUWU', '2.400', '13,598,726,305', 'PT. RIDWAN JAYA LESTARI', 'PT. IRAYA KONSULTAN', '2022-03-17', 224, '50', '15 Desember 2022', '2,719,745,261', '20.00 ', '62.653', '60.251', '-2.402', ' Pas. Batu mortar, galian biasa dan batu, timb. Pilihan dari sumber galian, LPA Kls A, Lapis resap pengikat, Lapis perekat, AC-BC  serta pas. Batu talud  '),
(6, '2023-01-17', 'fffffffffffffffff', '1', '1', 'fffffffff', 'ffffffffff', '2023-01-17', 1, '1', '1', '1', '1', '1', '1', '1', 'fffffffffff');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reservasi`
--

CREATE TABLE `reservasi` (
  `id_reservasi` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_kegiatan` text NOT NULL,
  `targett` varchar(19) NOT NULL,
  `kontrak` varchar(19) NOT NULL,
  `nama_perusahaan` varchar(255) NOT NULL,
  `konsultan_pengawas` varchar(255) NOT NULL,
  `tanggal_kontra` date NOT NULL,
  `pelaksanaan` int(11) NOT NULL,
  `pemberian_kesempatan` varchar(11) NOT NULL,
  `tanggal_akhir_kontra` varchar(19) NOT NULL,
  `keuangan_rp` varchar(19) NOT NULL,
  `keuangan_persen` varchar(19) NOT NULL,
  `fisik_rencana` varchar(19) NOT NULL,
  `fisik_realisasi` varchar(19) NOT NULL,
  `fisik_deviasi` varchar(19) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `reservasi`
--

INSERT INTO `reservasi` (`id_reservasi`, `tanggal`, `nama_kegiatan`, `targett`, `kontrak`, `nama_perusahaan`, `konsultan_pengawas`, `tanggal_kontra`, `pelaksanaan`, `pemberian_kesempatan`, `tanggal_akhir_kontra`, `keuangan_rp`, `keuangan_persen`, `fisik_rencana`, `fisik_realisasi`, `fisik_deviasi`, `keterangan`) VALUES
(31, '2022-11-04', 'PRESERVASI JALAN RUAS BORO-JENEPONTO 	', '2.770', '4,199,890,419', 'CV. CITRA LESTARI MANDIRI', 'PT. INDRA CIPTA DIMENSI', '2022-03-30', 150, '0', '26 Agustus 2022', '4,199,890,419', '100 ', '100', '100', '0.000', '-'),
(33, '2023-01-17', 'fffffffffffffff', '1', '1', 'ffffffffff', 'ffffffffffffff', '2023-01-17', 1, '1', '1', '1', '1', '1', '1', '1', 'ffffffffffff');

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
(2, 'user001', 'user001@gmail.com', 'user12345', 'user001_pic_1673779861.png'),
(19, 'farhann', 'farhann@gmail.com', 'farhan126', '_pic_1673956925.png');

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
  MODIFY `id_information` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `pembangunan`
--
ALTER TABLE `pembangunan`
  MODIFY `id_pembangunan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `id_reservasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
