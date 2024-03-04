-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Mar 2024 pada 13.03
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sourcepicture`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `album`
--

CREATE TABLE `album` (
  `id_album` int(11) NOT NULL,
  `nama_album` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggal_dibuat` date NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `album`
--

INSERT INTO `album` (`id_album`, `nama_album`, `deskripsi`, `tanggal_dibuat`, `id_user`) VALUES
(11, 'Hewan Pintar', '', '2024-03-03', 63),
(12, 'Hewan Lautan', '', '2024-03-03', 64),
(13, 'Hewan Unik', '', '2024-03-03', 64);

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto`
--

CREATE TABLE `foto` (
  `id_foto` int(11) NOT NULL,
  `judul_foto` varchar(255) NOT NULL,
  `deskripsi_foto` varchar(225) NOT NULL,
  `tanggal_unggahan` date NOT NULL,
  `lokasi_file` varchar(255) NOT NULL,
  `id_album` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `foto`
--

INSERT INTO `foto` (`id_foto`, `judul_foto`, `deskripsi_foto`, `tanggal_unggahan`, `lokasi_file`, `id_album`, `id_user`) VALUES
(7, 'Harimau', 'Harimau hewan buas', '2024-02-14', '1707916279_e87a1411a573929480d3.jpg', 0, 0),
(8, 'Burung', 'Burung hewan yang cantik', '2024-02-14', '1707916583_c086ba1e286a85c67b91.png', 0, 0),
(11, 'Kuda', 'Kuda ia berlari dengan sangat kencang', '2024-02-14', '1707918438_46873f9ae1379d320ddb.jpg', 0, 0),
(28, 'Paus Orca', 'Paus Orca adalah hewan yang pintar', '2024-03-03', '1709452589_557eb761c00f70f9a625.jpg', 0, 0),
(29, 'a', 'a', '2024-03-03', '1709452796_4e0a21eb36f25ce6b55a.jpg', 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(11) NOT NULL,
  `id_foto` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `isi_komentar` text NOT NULL,
  `tanggal_komentar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `id_foto`, `id_user`, `isi_komentar`, `tanggal_komentar`) VALUES
(45, 28, 64, 'waww Keren', '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `likefoto`
--

CREATE TABLE `likefoto` (
  `id_like` int(11) NOT NULL,
  `id_foto` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_like` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `likefoto`
--

INSERT INTO `likefoto` (`id_like`, `id_foto`, `id_user`, `tanggal_like`) VALUES
(3, 7, 53, '2024-03-01'),
(4, 8, 53, '2024-03-01'),
(14, 8, 56, '2024-03-02'),
(15, 8, 55, '2024-03-03'),
(16, 24, 60, '2024-03-03'),
(17, 25, 61, '2024-03-03'),
(18, 26, 62, '2024-03-03'),
(19, 27, 63, '2024-03-03'),
(20, 28, 64, '2024-03-03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mix`
--

CREATE TABLE `mix` (
  `id_mix` int(11) NOT NULL,
  `id_album` int(11) NOT NULL,
  `id_foto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mix`
--

INSERT INTO `mix` (`id_mix`, `id_album`, `id_foto`) VALUES
(2, 3, 7),
(7, 9, 25),
(8, 10, 26),
(9, 11, 27);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `nama_lengkap` varchar(200) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `active` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `email`, `nama_lengkap`, `alamat`, `foto`, `active`) VALUES
(34, 'frf1', '$2y$10$ltEMV.smvrlM1igbOwxn2udB2EZ2mrBp7x75bNZjDxIaOrHir3hLG', 'exx@gmail.com', 'rfs', 'hhhh', '1708649299_41384b2f3b615b57db15.jpg', ''),
(50, 'fedi', '$2y$10$aRqWAWPlxPgeBSlP0hX8k.exYL/O5.pCEld7UJYNjL.pH38ZaxPbK', 'nashrilanam42@gmail.com', 'fedi', 'banguntapan', 'default.jpg', 'ea268ca03b45b834cd3d'),
(64, 'Nashril Anam', '$2y$10$IqYOI3pSJiQZ8LuXYhvgYutiUVLw9pkHWUjkrzreGOlq.CU/icflW', 'nashrilanam42@gmail.com', 'Nashril Anam', 'Jambidan', '1709452687_9d9f67d9226bc0796c47.jpg', '045707092053e6a8d610');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id_album`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id_foto`),
  ADD KEY `id_album` (`id_album`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `id_foto` (`id_foto`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `likefoto`
--
ALTER TABLE `likefoto`
  ADD PRIMARY KEY (`id_like`),
  ADD KEY `id_foto` (`id_foto`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `mix`
--
ALTER TABLE `mix`
  ADD PRIMARY KEY (`id_mix`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `album`
--
ALTER TABLE `album`
  MODIFY `id_album` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `foto`
--
ALTER TABLE `foto`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `likefoto`
--
ALTER TABLE `likefoto`
  MODIFY `id_like` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `mix`
--
ALTER TABLE `mix`
  MODIFY `id_mix` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
