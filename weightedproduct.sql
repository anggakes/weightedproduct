-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 30 Apr 2015 pada 10.17
-- Versi Server: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `weightedproduct`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE IF NOT EXISTS `karyawan` (
`id` int(10) unsigned NOT NULL,
  `nik` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `tempat_lahir` varchar(70) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tahun_masuk` date NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id`, `nik`, `nama`, `jenis_kelamin`, `no_hp`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `tahun_masuk`, `updated_at`, `created_at`) VALUES
(2, '091019000', 'Isa', 'perempuan', '1293293', '2324', '1987-11-29', 'dsdsdsd', '2006-07-31', '2015-04-26 07:18:20', '2015-04-19 06:47:49'),
(3, '626152', 'Rini', 'perempuan', '1293293', 'asdasd', '2002-03-01', 'Palembang', '2010-09-28', '2015-04-30 03:21:39', '2015-04-19 06:48:41'),
(4, '12912898', 'angga', 'laki-laki', '089661147512', 'sukabumi', '1992-11-01', 'palembang', '2012-04-08', '2015-04-19 08:12:14', '2015-04-19 08:12:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE IF NOT EXISTS `kriteria` (
`id` int(10) unsigned NOT NULL,
  `nama` varchar(40) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `bobot` decimal(3,2) NOT NULL,
  `tipe_konversi` int(11) NOT NULL,
  `sumber_data` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id`, `nama`, `kode`, `bobot`, `tipe_konversi`, `sumber_data`, `updated_at`, `created_at`) VALUES
(1, 'Absensi', 'C1', '0.25', 1, 1, '2015-04-23 11:39:06', '0000-00-00 00:00:00'),
(2, 'Prilaku', 'C2', '0.12', 2, 1, '2015-04-23 11:39:03', '0000-00-00 00:00:00'),
(3, 'Pengalaman', 'C3', '0.25', 2, 2, '2015-04-23 11:39:00', '0000-00-00 00:00:00'),
(4, 'Wawasan', 'C4', '0.12', 2, 1, '2015-04-23 11:39:08', '0000-00-00 00:00:00'),
(5, 'Tanggung Jawab', 'C5', '0.20', 2, 1, '2015-04-23 11:39:11', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_kriteria`
--

CREATE TABLE IF NOT EXISTS `nilai_kriteria` (
`id` int(10) unsigned NOT NULL,
  `kode_kriteria` varchar(20) NOT NULL,
  `bobot` int(11) NOT NULL,
  `batas_atas` int(11) NOT NULL,
  `batas_bawah` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data untuk tabel `nilai_kriteria`
--

INSERT INTO `nilai_kriteria` (`id`, `kode_kriteria`, `bobot`, `batas_atas`, `batas_bawah`) VALUES
(1, 'C1', 5, 0, 0),
(2, 'C1', 4, 3, 1),
(3, 'C1', 3, 6, 4),
(4, 'C1', 2, 9, 7),
(5, 'C1', 1, 999999, 10),
(6, 'C2', 5, 999999, 90),
(7, 'C2', 4, 89, 70),
(8, 'C2', 3, 69, 50),
(9, 'C2', 2, 49, 30),
(10, 'C2', 1, 29, -999999),
(11, 'C3', 5, 999999, 9),
(12, 'C3', 4, 8, 7),
(13, 'C3', 3, 6, 5),
(14, 'C3', 2, 4, 3),
(15, 'C3', 1, 2, -999999),
(16, 'C4', 5, 999999, 90),
(17, 'C4', 4, 89, 70),
(18, 'C4', 3, 69, 50),
(19, 'C4', 2, 49, 30),
(20, 'C4', 1, 29, -999999),
(21, 'C5', 5, 999999, 9),
(22, 'C5', 4, 89, 70),
(23, 'C5', 3, 69, 50),
(24, 'C5', 2, 49, 30),
(25, 'C5', 1, 29, -999999);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian`
--

CREATE TABLE IF NOT EXISTS `penilaian` (
`id` int(10) unsigned NOT NULL,
  `kode_kriteria` varchar(255) NOT NULL,
  `id_karyawan` int(11) unsigned NOT NULL,
  `nilai` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `periode` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=196 ;

--
-- Dumping data untuk tabel `penilaian`
--

INSERT INTO `penilaian` (`id`, `kode_kriteria`, `id_karyawan`, `nilai`, `updated_at`, `created_at`, `periode`) VALUES
(76, 'C1', 2, 3, '2015-04-26 07:06:30', '2015-04-26 07:06:30', '2015-05-01'),
(77, 'C2', 2, 50, '2015-04-26 07:06:30', '2015-04-26 07:06:30', '2015-05-01'),
(78, 'C3', 2, 8, '2015-04-26 07:06:30', '2015-04-26 07:06:30', '2015-05-01'),
(79, 'C4', 2, 70, '2015-04-26 07:06:30', '2015-04-26 07:06:30', '2015-05-01'),
(80, 'C5', 2, 80, '2015-04-26 07:06:30', '2015-04-26 07:06:30', '2015-05-01'),
(81, 'C1', 3, 0, '2015-04-26 07:06:30', '2015-04-26 07:06:30', '2015-05-01'),
(82, 'C2', 3, 70, '2015-04-26 07:06:30', '2015-04-26 07:06:30', '2015-05-01'),
(83, 'C3', 3, 4, '2015-04-26 07:06:30', '2015-04-26 07:06:30', '2015-05-01'),
(84, 'C4', 3, 50, '2015-04-26 07:06:30', '2015-04-26 07:06:30', '2015-05-01'),
(85, 'C5', 3, 60, '2015-04-26 07:06:30', '2015-04-26 07:06:30', '2015-05-01'),
(86, 'C1', 4, 1, '2015-04-26 07:06:30', '2015-04-26 07:06:30', '2015-05-01'),
(87, 'C2', 4, 80, '2015-04-26 07:06:30', '2015-04-26 07:06:30', '2015-05-01'),
(88, 'C3', 4, 3, '2015-04-26 07:06:30', '2015-04-26 07:06:30', '2015-05-01'),
(89, 'C4', 4, 80, '2015-04-26 07:06:30', '2015-04-26 07:06:30', '2015-05-01'),
(90, 'C5', 4, 80, '2015-04-26 07:06:30', '2015-04-26 07:06:30', '2015-05-01'),
(151, 'C1', 2, 0, '2015-04-28 05:22:11', '2015-04-28 05:22:11', '2015-03-01'),
(152, 'C2', 2, 80, '2015-04-28 05:22:11', '2015-04-28 05:22:11', '2015-03-01'),
(153, 'C3', 2, 8, '2015-04-28 05:22:11', '2015-04-28 05:22:11', '2015-03-01'),
(154, 'C4', 2, 90, '2015-04-28 05:22:11', '2015-04-28 05:22:11', '2015-03-01'),
(155, 'C5', 2, 90, '2015-04-28 05:22:11', '2015-04-28 05:22:11', '2015-03-01'),
(156, 'C1', 3, 2, '2015-04-28 05:22:11', '2015-04-28 05:22:11', '2015-03-01'),
(157, 'C2', 3, 80, '2015-04-28 05:22:11', '2015-04-28 05:22:11', '2015-03-01'),
(158, 'C3', 3, 4, '2015-04-28 05:22:11', '2015-04-28 05:22:11', '2015-03-01'),
(159, 'C4', 3, 70, '2015-04-28 05:22:11', '2015-04-28 05:22:11', '2015-03-01'),
(160, 'C5', 3, 80, '2015-04-28 05:22:11', '2015-04-28 05:22:11', '2015-03-01'),
(161, 'C1', 4, 2, '2015-04-28 05:22:11', '2015-04-28 05:22:11', '2015-03-01'),
(162, 'C2', 4, 59, '2015-04-28 05:22:11', '2015-04-28 05:22:11', '2015-03-01'),
(163, 'C3', 4, 3, '2015-04-28 05:22:11', '2015-04-28 05:22:11', '2015-03-01'),
(164, 'C4', 4, 90, '2015-04-28 05:22:11', '2015-04-28 05:22:11', '2015-03-01'),
(165, 'C5', 4, 90, '2015-04-28 05:22:11', '2015-04-28 05:22:11', '2015-03-01'),
(181, 'C1', 2, 0, '2015-04-30 02:39:14', '2015-04-30 02:39:14', '2015-04-01'),
(182, 'C2', 2, 12, '2015-04-30 02:39:14', '2015-04-30 02:39:14', '2015-04-01'),
(183, 'C3', 2, 8, '2015-04-30 02:39:14', '2015-04-30 02:39:14', '2015-04-01'),
(184, 'C4', 2, 90, '2015-04-30 02:39:14', '2015-04-30 02:39:14', '2015-04-01'),
(185, 'C5', 2, 90, '2015-04-30 02:39:14', '2015-04-30 02:39:14', '2015-04-01'),
(186, 'C1', 3, 0, '2015-04-30 02:39:14', '2015-04-30 02:39:14', '2015-04-01'),
(187, 'C2', 3, 30, '2015-04-30 02:39:14', '2015-04-30 02:39:14', '2015-04-01'),
(188, 'C3', 3, 4, '2015-04-30 02:39:14', '2015-04-30 02:39:14', '2015-04-01'),
(189, 'C4', 3, 50, '2015-04-30 02:39:14', '2015-04-30 02:39:14', '2015-04-01'),
(190, 'C5', 3, 40, '2015-04-30 02:39:14', '2015-04-30 02:39:14', '2015-04-01'),
(191, 'C1', 4, 0, '2015-04-30 02:39:14', '2015-04-30 02:39:14', '2015-04-01'),
(192, 'C2', 4, 40, '2015-04-30 02:39:14', '2015-04-30 02:39:14', '2015-04-01'),
(193, 'C3', 4, 3, '2015-04-30 02:39:14', '2015-04-30 02:39:14', '2015-04-01'),
(194, 'C4', 4, 50, '2015-04-30 02:39:14', '2015-04-30 02:39:14', '2015-04-01'),
(195, 'C5', 4, 50, '2015-04-30 02:39:14', '2015-04-30 02:39:14', '2015-04-01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `roles` enum('admin','direktur','manajer') COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `roles`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', '$2y$10$Kx1I3a3YsqWTM2jW0qkXPuRJk5ZSh4q8kg9OyF0ntogts1ELBjBAW', 'admin', '2H2T9Dnuidj4Cy9bYaoxOutFviyj69LPBtXTYmY3AICdbXLnrqdBL5Knzgch', '2015-04-23 09:21:51', '2015-04-30 05:51:09'),
(2, 'Andri', 'manajer', '$2y$10$g6My3f3vjc19ajJPxmVXGuIebLHApKpXBXFbmIk0HvvPJDZVQT/W2', 'manajer', 'AoSAFmls1glW3xM3RweP3tZ0rjTX0wB7WPJc05676ryljhE5gXuwNWdfQyWI', '2015-04-26 09:11:53', '2015-04-30 02:42:28'),
(5, 'direktur', 'direktur', '$2y$10$rL9o/UI3r7YYwxEzOdmFI.5BbGsimFsKggT1mX1uOU.buAGlNSD72', 'direktur', NULL, '2015-04-26 09:15:13', '2015-04-26 09:15:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `kode` (`kode`);

--
-- Indexes for table `nilai_kriteria`
--
ALTER TABLE `nilai_kriteria`
 ADD PRIMARY KEY (`id`), ADD KEY `id_kriteria` (`kode_kriteria`), ADD KEY `kode_kriteria` (`kode_kriteria`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
 ADD KEY `password_resets_email_index` (`email`), ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
 ADD PRIMARY KEY (`id`), ADD KEY `kode_kriteria` (`kode_kriteria`), ADD KEY `id_karyawan` (`id_karyawan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_email_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `nilai_kriteria`
--
ALTER TABLE `nilai_kriteria`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=196;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `nilai_kriteria`
--
ALTER TABLE `nilai_kriteria`
ADD CONSTRAINT `nilai_kriteria_ibfk_1` FOREIGN KEY (`kode_kriteria`) REFERENCES `kriteria` (`kode`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
ADD CONSTRAINT `penilaian_ibfk_1` FOREIGN KEY (`kode_kriteria`) REFERENCES `kriteria` (`kode`) ON DELETE NO ACTION ON UPDATE CASCADE,
ADD CONSTRAINT `penilaian_ibfk_2` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
