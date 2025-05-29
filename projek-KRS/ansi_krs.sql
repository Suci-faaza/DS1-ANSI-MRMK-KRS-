-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Bulan Mei 2025 pada 08.47
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
-- Database: `ansi_krs`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `prodi` varchar(100) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id`, `nama`, `nip`, `prodi`, `user_id`) VALUES
(2, 'Siti Mutmainnah M.Kom', '081181728', 'Ilmu Komputer', 12),
(3, 'Teguh Anshor Lorosae M.Kom', '08198746', 'Ilmu Komputer', 17),
(4, 'Miftahul Jannah M.Kom', '0820069602', 'Ilmu Komputer', 19),
(5, 'Zumhur Alamin M.Kom', '0813765437', 'Ilmu Komputer', 20),
(6, 'A Lathief Fashihullisan', '0819367836', 'Ilmu Komputer', 21),
(7, 'Mgr inz Khairunnas S.Kom', '0812009473', 'Ilmu Komputer', 22);

-- --------------------------------------------------------

--
-- Struktur dari tabel `krs`
--

CREATE TABLE `krs` (
  `id` int(11) NOT NULL,
  `mahasiswa_id` int(11) NOT NULL,
  `matakuliah_id` int(11) NOT NULL,
  `tahun_ajaran` varchar(20) DEFAULT NULL,
  `semester` enum('ganjil','genap') DEFAULT NULL,
  `approved_by` int(11) DEFAULT NULL,
  `approved_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `krs`
--

INSERT INTO `krs` (`id`, `mahasiswa_id`, `matakuliah_id`, `tahun_ajaran`, `semester`, `approved_by`, `approved_at`) VALUES
(6, 3, 20, '2025/2026', 'genap', NULL, NULL),
(7, 3, 21, '2025/2026', 'genap', NULL, NULL),
(10, 2, 16, '2025/2026', 'genap', NULL, NULL),
(11, 2, 20, '2025/2026', 'genap', NULL, NULL),
(12, 4, 20, '2025/2026', 'genap', NULL, NULL),
(13, 5, 17, '2025/2026', 'genap', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `prodi` varchar(100) DEFAULT NULL,
  `angkatan` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `user_id`, `nim`, `prodi`, `angkatan`) VALUES
(2, 'Rizki Fikriansyah', 18, 'B02220117', 'Ilmu Komputer', NULL),
(3, 'Fera Febrianti', 23, 'B02220125', 'Ilmu Komputer', NULL),
(4, 'Suci Faaza Naafia', 24, 'B02220114', 'Ilmu Komputer', NULL),
(5, 'putri windari', 25, 'B02220009', 'Ilmu Komputer', NULL),
(6, 'shinta zahira hayathnun nufus', 26, 'B02220112', 'Ilmu Komputer', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `matakuliah`
--

CREATE TABLE `matakuliah` (
  `id` int(11) NOT NULL,
  `dosen_id` int(11) DEFAULT NULL,
  `kode` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `sks` int(11) NOT NULL,
  `kelas` varchar(50) DEFAULT NULL,
  `ruang` varchar(50) DEFAULT NULL,
  `hari` varchar(20) DEFAULT NULL,
  `waktu` varchar(50) DEFAULT NULL,
  `semester` enum('ganjil','genap') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `matakuliah`
--

INSERT INTO `matakuliah` (`id`, `dosen_id`, `kode`, `nama`, `sks`, `kelas`, `ruang`, `hari`, `waktu`, `semester`, `created_at`, `updated_at`) VALUES
(14, 3, 'IKP', 'Sistem Pakar', 4, 'P1', 'KF1', 'Senin', '08.00 - 10.00', 'genap', '2025-05-22 12:11:32', NULL),
(16, 6, 'IKP2', 'Pemrograman Mobile', 4, 'P1', 'KF1', 'Rabu', '08.00 - 10.00', 'genap', '2025-05-22 12:16:44', NULL),
(17, 5, 'IKP3', 'Analisis dan Perancangan Sistem', 4, 'P1', 'KF1', 'Kamis', '08.00 - 10.00', 'genap', '2025-05-22 12:17:40', NULL),
(18, 4, 'IKP4', 'Manajemen Proyek', 4, 'P1', 'KF1', 'Selasa', '08.00 - 10.00', 'genap', '2025-05-22 12:18:20', NULL),
(20, 2, 'IKDS1', 'Natural Language Processing', 4, 'DS', 'KF2', 'Senin', '10.00 - 12.00', 'genap', '2025-05-22 12:21:28', NULL),
(21, 7, 'IKDS2', 'Deep Learning', 4, 'DS', 'KF2', 'Selasa', '10.00 - 12.00', 'genap', '2025-05-22 12:22:56', NULL),
(22, 5, 'IKJK', 'Internet of Things', 4, 'JK', 'IF1', 'Senin', '10.00 - 12.00', 'genap', '2025-05-22 12:24:08', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `role` enum('mahasiswa','dosen','admin') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `role`, `created_at`) VALUES
(8, 'admin', '0192023a7bbd73250516f069df18b500', 'ADMIN UM BIMA', 'admin', '2025-05-22 09:03:46'),
(12, 'mutmainnah', '433f78ed6ae676380fc3ef71d8ab6be4', 'Siti Mutmainnah M.Kom', 'dosen', '2025-05-22 09:53:05'),
(17, 'teguh', '261a794363c16c2a9969c2ee093673d6', 'Teguh Anshor Lorosae M.Kom', 'dosen', '2025-05-22 11:50:36'),
(18, 'rizki', '656ead03af397857bdcd84292e6a3bbd', 'Rizki Fikriansyah', 'mahasiswa', '2025-05-22 12:04:32'),
(19, 'miftahul', '1867740d5236b1cff6ed7d97be36f629', 'Miftahul Jannah M.Kom', 'dosen', '2025-05-22 12:12:55'),
(20, 'zumhur', 'f66d0b7c05fd1fac5c6c4161c2a6a589', 'Zumhur Alamin M.Kom', 'dosen', '2025-05-22 12:13:56'),
(21, 'latif', '374d6ca342e76095a4fb516b7b46cd69', 'A Lathief Fashihullisan', 'dosen', '2025-05-22 12:15:46'),
(22, 'runnas', '123798b05b89c402580372cae2301292', 'Mgr inz Khairunnas S.Kom', 'dosen', '2025-05-22 12:22:25'),
(23, 'fera', '7ab4ea3cd3dd515430aaa268f3548ecf', 'Fera Febrianti', 'mahasiswa', '2025-05-22 12:26:44'),
(24, 'suci', 'a7918ffddbdda39e5c6307dd51c94d65', 'Suci Faaza Naafia', 'mahasiswa', '2025-05-25 06:28:43'),
(25, 'putri', '82682943a05de360abb183236c632bd6', 'putri windari', 'mahasiswa', '2025-05-25 06:40:43'),
(26, 'shinta', 'ccab7b13e0d94c700ba15234e5b68aa2', 'shinta zahira hayathnun nufus', 'mahasiswa', '2025-05-25 06:46:19');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `krs`
--
ALTER TABLE `krs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mahasiswa_id` (`mahasiswa_id`),
  ADD KEY `matakuliah_id` (`matakuliah_id`),
  ADD KEY `approved_by` (`approved_by`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nim` (`nim`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_mk` (`kode`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `krs`
--
ALTER TABLE `krs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `matakuliah`
--
ALTER TABLE `matakuliah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `dosen_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `krs`
--
ALTER TABLE `krs`
  ADD CONSTRAINT `krs_ibfk_1` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswa` (`id`),
  ADD CONSTRAINT `krs_ibfk_2` FOREIGN KEY (`matakuliah_id`) REFERENCES `matakuliah` (`id`),
  ADD CONSTRAINT `krs_ibfk_3` FOREIGN KEY (`approved_by`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
