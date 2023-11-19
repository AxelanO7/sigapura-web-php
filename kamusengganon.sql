-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Nov 2023 pada 05.32
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kamusenggano`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `content_access`
--

CREATE TABLE `content_access` (
  `caid` int(11) UNSIGNED NOT NULL,
  `modul` varchar(100) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `dateaccess` int(11) DEFAULT NULL,
  `dateacess_end` int(11) DEFAULT NULL,
  `ipaddress` varchar(100) DEFAULT NULL,
  `browser` varchar(100) DEFAULT NULL,
  `os` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `shrines`
--

CREATE TABLE `shrines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name_object` varchar(255) NOT NULL,
  `description_detail` text NOT NULL,
  `description_visual` text NOT NULL,
  `year_of_creation` int(11) NOT NULL,
  `period_of_creation` varchar(255) NOT NULL,
  `name_creator` varchar(255) NOT NULL,
  `creator_style` varchar(255) NOT NULL,
  `main_material` varchar(255) NOT NULL,
  `additional_material` varchar(255) NOT NULL,
  `creation_technique` varchar(255) NOT NULL,
  `ornament` varchar(255) NOT NULL,
  `length` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `width` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `volume` int(11) NOT NULL,
  `physical_condition` varchar(255) NOT NULL,
  `level_of_damage` varchar(255) NOT NULL,
  `country_location` varchar(255) NOT NULL,
  `district_location` varchar(255) NOT NULL,
  `subdistrict_location` varchar(255) NOT NULL,
  `village_location` varchar(255) NOT NULL,
  `functional` varchar(255) NOT NULL,
  `ownership` varchar(255) NOT NULL,
  `ownership_history` varchar(255) NOT NULL,
  `historical_value` varchar(255) NOT NULL,
  `cultural_value` varchar(255) NOT NULL,
  `aesthetic_value` varchar(255) NOT NULL,
  `economic_value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `shrines`
--

INSERT INTO `shrines` (`id`, `created_at`, `updated_at`, `name_object`, `description_detail`, `description_visual`, `year_of_creation`, `period_of_creation`, `name_creator`, `creator_style`, `main_material`, `additional_material`, `creation_technique`, `ornament`, `length`, `height`, `width`, `weight`, `volume`, `physical_condition`, `level_of_damage`, `country_location`, `district_location`, `subdistrict_location`, `village_location`, `functional`, `ownership`, `ownership_history`, `historical_value`, `cultural_value`, `aesthetic_value`, `economic_value`) VALUES
(1, '2023-10-23 12:13:48', '2023-10-23 12:13:48', 'a', 'a', 'a', 1, 's', 'admin', 's', 's', 's', 's', 's', 1, 1, 1, 1, 1, 's', 's', 's', 's', 's', 's', 's', 's', 's', 's', 's', 's', 's'),
(2, NULL, NULL, '1', '1', '1', 1, '1', '1', '1', '1', '1', '1', '1', 1, 1, 1, 1, 1, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `ug_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `email`, `status`, `ug_id`) VALUES
(1, 'Gusde Sarasvananda', 'gusde', '578fd4ac8999d2fec553852813a46745', 'Gusde@gmail.com', 1, 1),
(2, 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', 1, 0),
(4, 'Unud_0001', 'unud_0001', '293c5a0d3283f7f115fd15d36fabd7cb', 'admin@kamus.web.oss.id', 1, 0),
(5, 'Unud_0002', 'unud_0002', '293c5a0d3283f7f115fd15d36fabd7cb', 'admin@kamus.web.oss.id', 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_group`
--

CREATE TABLE `user_group` (
  `ug_id` int(11) NOT NULL,
  `ug_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_group`
--

INSERT INTO `user_group` (`ug_id`, `ug_name`) VALUES
(1, 'Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `visitor`
--

CREATE TABLE `visitor` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `country_region` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `visitor`
--

INSERT INTO `visitor` (`id`, `created_at`, `updated_at`, `name`, `country_region`, `gender`) VALUES
(1, NULL, NULL, 'visitor1', 'indonesia', 'l');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `content_access`
--
ALTER TABLE `content_access`
  ADD PRIMARY KEY (`caid`);

--
-- Indeks untuk tabel `shrines`
--
ALTER TABLE `shrines`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`ug_id`);

--
-- Indeks untuk tabel `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `content_access`
--
ALTER TABLE `content_access`
  MODIFY `caid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `shrines`
--
ALTER TABLE `shrines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `visitor`
--
ALTER TABLE `visitor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
