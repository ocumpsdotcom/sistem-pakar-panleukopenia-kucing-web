-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Feb 2023 pada 00.26
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sp_panleukopenia`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_gejala`
--

CREATE TABLE `daftar_gejala` (
  `id` int(11) NOT NULL,
  `kode_gejala` varchar(10) NOT NULL,
  `nama_gejala` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `daftar_gejala`
--

INSERT INTO `daftar_gejala` (`id`, `kode_gejala`, `nama_gejala`, `created_at`, `updated_at`) VALUES
(1, 'GEP01', 'Tampak Sedikit Murungg', NULL, '2023-02-07 07:01:01'),
(5, 'GEP02', 'Badan Mulai Keliatan Lesu', NULL, NULL),
(7, 'GEP03', 'Nafsu makan mulai hilang', '2023-02-07 08:13:17', NULL),
(8, 'GEP04', 'Muntah tetapi tidak berdarah', '2023-02-07 08:15:46', NULL),
(9, 'GEP05', 'Diare tetapi tidak parah', '2023-02-07 08:16:11', NULL),
(10, 'GEP06', 'Suhu tubuh mulai tinggi', '2023-02-17 16:18:20', NULL),
(11, 'GEP07', 'Tampak murung lebih parah', '2023-02-17 16:18:33', NULL),
(12, 'GEP08', 'Badan Lemas', '2023-02-17 16:18:45', NULL),
(13, 'GEP09', 'Sangat lesu', '2023-02-17 16:18:55', NULL),
(14, 'GEP10', 'Nafsu makan sudah hilang', '2023-02-17 16:19:04', NULL),
(15, 'GEP11', 'Muntah mulai berdarah', '2023-02-17 16:19:14', NULL),
(16, 'GEP12', 'Diare mulai mengeluarkan darah', '2023-02-17 16:19:24', NULL),
(17, 'GEP13', 'Suhu tubuh tinggi', '2023-02-17 16:19:32', NULL),
(19, 'GEP14', 'Murung kelihatan Parah', '2023-02-17 16:21:07', NULL),
(20, 'GEP15', 'Hanya berdiam di tempat basah', '2023-02-17 16:21:20', NULL),
(21, 'GEP16', 'Kaku', '2023-02-17 16:21:27', NULL),
(22, 'GEP17', 'Suhu tubuh dingin', '2023-02-17 16:21:54', NULL),
(23, 'GEP18', 'Muntah darah yang parah', '2023-02-17 16:22:08', NULL),
(24, 'GEP19', 'Diare banyak darah', '2023-02-17 16:22:16', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_penyakit`
--

CREATE TABLE `daftar_penyakit` (
  `id` int(11) NOT NULL,
  `kode_penyakit` varchar(10) NOT NULL,
  `nama_penyakit` varchar(256) NOT NULL,
  `solusi` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `daftar_penyakit`
--

INSERT INTO `daftar_penyakit` (`id`, `kode_penyakit`, `nama_penyakit`, `solusi`, `created_at`, `updated_at`) VALUES
(9, 'PK01', 'Panleukopenia SubKronis', '- Uji Coba <br>\n- Uji Coba<br>\n- Uji Coba<br>\n- Uji Coba<br>', '2023-02-07 06:56:18', '2023-02-07 07:04:17'),
(10, 'PK02', 'Panleukopenia Kronis', '- Uji Coba\r\n- Uji Coba\r\n- Uji Coba\r\n- Uji Coba', '2023-02-07 07:05:02', NULL),
(11, 'PK03', 'Panleukopenia Akut', '- Uji Coba\r\n- Uji Coba\r\n- Uji Coba\r\n- Uji Coba', '2023-02-07 07:05:15', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_diagnosa`
--

CREATE TABLE `hasil_diagnosa` (
  `id` int(11) NOT NULL,
  `kode_konsultasi` varchar(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `kode_penyakit` varchar(10) NOT NULL,
  `tingkat_kepercayaan` float NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `temp_diagnosa`
--

CREATE TABLE `temp_diagnosa` (
  `id` int(11) NOT NULL,
  `kode_konsultasi` varchar(10) NOT NULL,
  `kode_gejala` varchar(10) NOT NULL,
  `cf_value` float NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_hp` varchar(14) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `image` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `no_hp`, `alamat`, `image`, `password`, `role_id`) VALUES
(1, 'Admin 123', 'admin@gmail.com', '083811641671', 'GG.Kelor No.31', 'default.jpg', '$2y$10$Fu7715n0v8.lOS1xVehkfeZrHCRRlZ71eNCTA0GQZfgFLGLixNlNa', 1),
(3, 'User Aja', 'user@gmail.com', '083811641671', 'Bogor, indonesia.', 'default.jpg', '$2y$10$Fu7715n0v8.lOS1xVehkfeZrHCRRlZ71eNCTA0GQZfgFLGLixNlNa', 2),
(9, 'Kriti Mauludin', 'kritimauludin99@gmail.com', '083811641671', 'GG. NASEDIN, RT/RW 004/002, Kel/Desa CILENDEK BARAT, Kecamatan KOTA BOGOR BARAT', 'default.jpg', '$2y$10$1d83tMnc3myl5aWQwPT12OntFfV/ABoXppBSBqyd7BSa3QCambBaK', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(8, 1, 22),
(9, 6, 2),
(11, 6, 22),
(12, 6, 23),
(14, 1, 24),
(16, 1, 23),
(17, 1, 25),
(18, 2, 2),
(20, 1, 26),
(23, 3, 25),
(24, 3, 26),
(26, 2, 26),
(27, 1, 27),
(39, 1, 30),
(43, 3, 2),
(44, 3, 31),
(45, 4, 2),
(49, 3, 28),
(50, 4, 27),
(51, 1, 29),
(53, 1, 28),
(55, 1, 31),
(57, 2, 31);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'admin'),
(2, 'user'),
(3, 'Menu'),
(28, 'Penyakit'),
(29, 'Gejala'),
(31, 'Diagnosis');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator '),
(2, 'User');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(5, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(6, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(11, 1, 'Role', 'admin', 'fas fa-fw fa-user-tie', 1),
(19, 24, 'Category Management', 'category', 'fas fa-fw fa-globe', 1),
(22, 25, 'My Vacancies', 'company', 'fas fa-fw fa-user-md', 1),
(23, 26, 'All Vacancies', 'Job', 'fas fa-fw fa-globe', 1),
(26, 28, 'Data Penyakit', 'penyakit', 'fas fa-fw fa-viruses', 1),
(27, 27, 'Daftar Transaksi', 'transaksi', 'fas fa-fw fa-shopping-cart', 1),
(29, 29, 'Data Gejala', 'gejala', 'fas fa-fw fa-virus', 1),
(30, 31, 'Mulai Diagnosa', 'diagnosis', 'fas fa-fw fa-spinner', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `daftar_gejala`
--
ALTER TABLE `daftar_gejala`
  ADD PRIMARY KEY (`kode_gejala`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indeks untuk tabel `daftar_penyakit`
--
ALTER TABLE `daftar_penyakit`
  ADD PRIMARY KEY (`kode_penyakit`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indeks untuk tabel `hasil_diagnosa`
--
ALTER TABLE `hasil_diagnosa`
  ADD PRIMARY KEY (`kode_konsultasi`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indeks untuk tabel `temp_diagnosa`
--
ALTER TABLE `temp_diagnosa`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `daftar_gejala`
--
ALTER TABLE `daftar_gejala`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `daftar_penyakit`
--
ALTER TABLE `daftar_penyakit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `hasil_diagnosa`
--
ALTER TABLE `hasil_diagnosa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `temp_diagnosa`
--
ALTER TABLE `temp_diagnosa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
