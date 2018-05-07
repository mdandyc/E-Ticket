-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 18 Apr 2018 pada 21.47
-- Versi Server: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ticket`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `costumer`
--

CREATE TABLE `costumer` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `costumer`
--

INSERT INTO `costumer` (`id`, `name`, `address`, `phone`, `gender`, `user_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 'Dandy Chrono', 'Ujung Berung Indah', '08562335534', 'Perempuan', 'mdandyc', NULL, '2018-04-15 04:01:44', '2018-04-15 04:01:44'),
(6, 'Dandy Chrono', 'Ujung Berung Indah', '087890317128', 'Laki-Laki', 'loiseu12', NULL, '2018-04-17 05:00:04', '2018-04-17 05:00:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_01_30_013628_create_transportasi_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `reservation`
--

CREATE TABLE `reservation` (
  `id` int(10) UNSIGNED NOT NULL,
  `reservation_code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reservation_at` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reservation_date` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `costumer_id` int(10) UNSIGNED NOT NULL,
  `seat_code` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rute_id` int(10) UNSIGNED NOT NULL,
  `user_id` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `reservation`
--

INSERT INTO `reservation` (`id`, `reservation_code`, `reservation_at`, `reservation_date`, `costumer_id`, `seat_code`, `rute_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '1524029697', '05:34:57', '18-04-18', 5, '15', 1, 'dandyforze', '2018-04-17 22:34:57', '2018-04-17 22:34:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rute`
--

CREATE TABLE `rute` (
  `id` int(10) UNSIGNED NOT NULL,
  `depart_at` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rute_form` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rute_to` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transportation_id` int(10) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `rute`
--

INSERT INTO `rute` (`id`, `depart_at`, `rute_form`, `rute_to`, `price`, `transportation_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '14:30', 'Bandung', 'Jakarta', '200.000', 4, NULL, '2018-04-14 22:32:49', '2018-04-16 22:11:22'),
(2, '14:30', 'Depok', 'Bali', '1.200.000', 2, NULL, '2018-04-15 02:53:33', '2018-04-15 02:55:07'),
(3, '18:30', 'Surabaya', 'Bandung', '80.000', 4, NULL, '2018-04-16 22:11:12', '2018-04-16 22:11:12'),
(4, '08:50', 'Yogyakarta', 'Jakarta', '1.700.000', 3, NULL, '2018-04-16 22:11:56', '2018-04-16 22:11:56'),
(5, '14:30', 'Medan', 'Semarang', '2.000.000', 3, NULL, '2018-04-16 22:12:26', '2018-04-16 22:12:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transportation`
--

CREATE TABLE `transportation` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seat_qty` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transportation_type_id` int(10) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transportation`
--

INSERT INTO `transportation` (`id`, `code`, `description`, `seat_qty`, `transportation_type_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Kereta Api (C19235)', 'Kelas Karyawan', '20', 1, NULL, '2018-04-14 22:30:31', '2018-04-16 22:18:06'),
(2, 'Garuda Airlines', 'High Class', '50', 2, NULL, '2018-04-14 22:30:46', '2018-04-15 02:52:06'),
(3, 'Lion Air (F2FE42)', 'VIP', '50', 2, NULL, '2018-04-16 22:08:03', '2018-04-16 22:08:17'),
(4, 'Kereta Bandung (EAOD35)', 'Kelas Karyawan', '50', 1, NULL, '2018-04-16 22:09:48', '2018-04-16 22:09:48'),
(5, 'Kereta Amil (ABCE32)', 'High Class', '50', 1, NULL, '2018-04-16 22:10:21', '2018-04-16 22:10:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transportation_type`
--

CREATE TABLE `transportation_type` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transportation_type`
--

INSERT INTO `transportation_type` (`id`, `description`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Kereta Api', NULL, '2018-04-14 22:29:56', '2018-04-16 22:19:06'),
(2, 'Pesawat', NULL, '2018-04-14 22:30:02', '2018-04-14 22:30:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `username` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`username`, `name`, `email`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
('dandyforze', 'Muhammad Dandy Chrisnandyy', 'dandyforze21@gmail.com', '$2y$10$9yFqkDN8NOXsJvDe8bLs7uYum0Y7Jm8GUak7pDcBBI/GLgmykeNzC', 'admin', 'D49xO05NZZVxHbBP8JoGiTYrIhoV8HBvx5nQhMXhmdsKq2sZAp1uFcDkdD1h', '2018-04-13 19:39:51', '2018-04-18 08:10:41'),
('loiseu12', 'Dandy Chrono', 'klorintjohr@gmail.com', '$2y$10$pletPC9VEISaf8f43y2AMeDX08hQwsbDq4hqYXpThVKzJLrFkDgtO', 'user', NULL, '2018-04-17 05:00:04', '2018-04-17 05:00:04'),
('mdandyc', 'Dandy Chrono', 'mdandyc@gmail.com', '$2y$10$rMoCyqC62sBvG6NRYmYXR.CVdGUJ.WsKAiwmzOre9k1487luLbD8O', 'user', 'OvK2uA60lILcWihV9nq6UWYf5TTBdBvS9jbhfhmZUmUBYK10nehLPZ1anYiV', '2018-04-15 04:01:44', '2018-04-15 04:01:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `costumer`
--
ALTER TABLE `costumer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `costumer_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservation_costumer_id_foreign` (`costumer_id`),
  ADD KEY `reservation_rute_id_foreign` (`rute_id`),
  ADD KEY `reservation_user_id_foreign` (`user_id`);

--
-- Indexes for table `rute`
--
ALTER TABLE `rute`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rute_transportation_id_foreign` (`transportation_id`);

--
-- Indexes for table `transportation`
--
ALTER TABLE `transportation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transportation_transportation_type_id_foreign` (`transportation_type_id`);

--
-- Indexes for table `transportation_type`
--
ALTER TABLE `transportation_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `costumer`
--
ALTER TABLE `costumer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rute`
--
ALTER TABLE `rute`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transportation`
--
ALTER TABLE `transportation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transportation_type`
--
ALTER TABLE `transportation_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `costumer`
--
ALTER TABLE `costumer`
  ADD CONSTRAINT `costumer_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_costumer_id_foreign` FOREIGN KEY (`costumer_id`) REFERENCES `costumer` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservation_rute_id_foreign` FOREIGN KEY (`rute_id`) REFERENCES `rute` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservation_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`username`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `rute`
--
ALTER TABLE `rute`
  ADD CONSTRAINT `rute_transportation_id_foreign` FOREIGN KEY (`transportation_id`) REFERENCES `transportation` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transportation`
--
ALTER TABLE `transportation`
  ADD CONSTRAINT `transportation_transportation_type_id_foreign` FOREIGN KEY (`transportation_type_id`) REFERENCES `transportation_type` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
