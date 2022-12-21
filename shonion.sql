-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Des 2022 pada 13.11
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shonion`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `email`, `password`) VALUES
(6, 'admin@gmail.com', '$2y$10$LuxSdb7GrVK2..xzdZwLdOO6yENqYNE.NXJZy7WMCE5nGgrg27un.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `daerah`
--

CREATE TABLE `daerah` (
  `id_daerah` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `daerah`
--

INSERT INTO `daerah` (`id_daerah`, `nama`, `gambar`) VALUES
(8, 'Aceh', '6394133c9efc9.png'),
(9, 'Sumatera Utara', '6394138b99ef9.png'),
(10, 'Sumatera Barat', '639413963b506.png'),
(11, 'Riau', '6394139f1a7bf.png'),
(12, 'Jambi', '639414d28ddbc.png'),
(13, 'Sumatera Selatan', '639414e0442c3.png'),
(14, 'Bengkulu', '639414fa80e4d.png'),
(15, 'Lampung', '639415028dcf0.png'),
(16, 'Kepulauan Bangka Belitung', '63941513e3115.png'),
(17, 'Kepulauan Riau', '6394151e3078b.png'),
(18, 'DKI Jakarta', '63941526075a5.png'),
(19, 'Jawa Barat', '6394152cef368.png'),
(20, 'Jawa Tengah', '63941534aa214.png'),
(21, 'DI Yogyakarta', '6394154413253.png'),
(22, 'Jawa Timur', '6394154dcb7c9.png'),
(23, 'Banten', '6394155701ad1.png'),
(24, 'Bali', '6394155f67fc9.png'),
(25, 'Nusa Tenggara Barat', '6394156aab0c8.png'),
(26, 'Nusa Tenggara Timur', '6394157442198.png'),
(27, 'Kalimantan Barat', '6394157d54ba1.png'),
(28, 'Kalimantan Tengah', '6394158a20ce0.png'),
(29, 'Kalimantan Selatan', '6394159454faa.png'),
(30, 'Kalimantan Timur', '639415a023190.png'),
(31, 'Kalimantan Utara', '639415b2ec2ad.png'),
(32, 'Sulawesi Utara', '639415bd96a3e.png'),
(33, 'Sulawesi Tengah', '639415c6e859e.png'),
(34, 'Sulawesi Selatan', '639415ce62c62.png'),
(35, 'Sulawesi Tenggara', '639415d7936c8.png'),
(36, 'Gorontalo', '639415dfeca8b.png'),
(37, 'Sulawesi Barat', '639415e73cc0a.png'),
(38, 'Maluku', '639415eed4227.png'),
(39, 'Maluku Utara', '639415f65318a.png'),
(41, 'Papua', '639416c12ce28.png'),
(42, 'Papua Barat', '639416c709e87.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petani`
--

CREATE TABLE `petani` (
  `id_petani` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `notelp` varchar(255) NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `kabupaten` varchar(255) NOT NULL,
  `ketersediaan` varchar(255) NOT NULL,
  `harga` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `petani`
--

INSERT INTO `petani` (`id_petani`, `gambar`, `nama`, `alamat`, `notelp`, `provinsi`, `kabupaten`, `ketersediaan`, `harga`) VALUES
(3, '6394515beef5d.jpeg', 'Nama', 'Alamat', '0897', 'Aceh', 'Aceh Barat', 'Sedia', 15000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `email`, `password`, `role`) VALUES
(11, 'user@gmail.com', '$2y$10$04d2Vfb1VOE6ZYoma.6efuVWNzaKBKf0m3/Yk0qb.VwWDVKFhsE9K', 'user'),
(12, 'user2@gmail.com', '$2y$10$Hhm/cI6AJaI17oAR3yNSieca0WNm0Gnkw7Jas7n4WcKqL2bS3u7ue', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `daerah`
--
ALTER TABLE `daerah`
  ADD PRIMARY KEY (`id_daerah`);

--
-- Indeks untuk tabel `petani`
--
ALTER TABLE `petani`
  ADD PRIMARY KEY (`id_petani`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `daerah`
--
ALTER TABLE `daerah`
  MODIFY `id_daerah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `petani`
--
ALTER TABLE `petani`
  MODIFY `id_petani` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
