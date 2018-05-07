-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 15 Apr 2018 pada 14.11
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
(3, 'Lousin Jhon', 'Cibiru', '08906155301', 'Laki-Laki', 'loiseu12', NULL, '2018-04-13 20:03:01', '2018-04-14 04:03:31'),
(4, 'Klorin Tjor', 'Bandung Raya', '087890317128', 'Laki-Laki', 'loiseuw', NULL, '2018-04-13 20:09:57', '2018-04-13 20:09:57'),
(5, 'Dandy Chrono', 'Ujung Berung Indah', '08562335534', 'Perempuan', 'mdandyc', NULL, '2018-04-15 04:01:44', '2018-04-15 04:01:44');

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
(1, '1523770728', '14:30', '2018-10-30', 3, '19A', 1, 'loiseu12', '2018-04-14 22:38:48', '2018-04-14 22:38:48'),
(8, '1523790115', '11:01:55', '2018-04-15', 3, '12', 2, 'mdandyc', '2018-04-15 04:01:55', '2018-04-15 04:01:55'),
(13, '1523794237', '12:10:37', '15-04-18', 3, '0', 2, 'mdandyc', '2018-04-15 05:10:37', '2018-04-15 05:10:37');

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
(1, '14:30', 'Bandung', 'Jakarta', '200.000', 1, NULL, '2018-04-14 22:32:49', '2018-04-14 22:32:49'),
(2, '14:30', 'Depok', 'Bali', '1.200.000', 2, NULL, '2018-04-15 02:53:33', '2018-04-15 02:55:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transportation`
--

CREATE TABLE `transportation` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(1, 'C19235F', 'Kelas Karyawan', '20', 1, NULL, '2018-04-14 22:30:31', '2018-04-14 22:30:31'),
(2, 'Garuda Airlines', 'High Class', '50', 2, NULL, '2018-04-14 22:30:46', '2018-04-15 02:52:06');

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
(1, 'Kereta', NULL, '2018-04-14 22:29:56', '2018-04-14 22:29:56'),
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
('dandyforze', 'Muhammad Dandy Chrisnandy', 'dandyforze@gmail.com', '$2y$10$.6wsba1.E3XVND5uQAFdP.L9B7AL5XM8.GP7QMu3/Jm5hTwcCdfm.', 'admin', '7aurby4t6g9ybdumgWj6x7gFDFP4k5yMQf1FGbEd3S7T5jiHvfu7PBgHVnuM', '2018-04-13 19:39:51', '2018-04-13 19:39:51'),
('loiseu12', 'Lousin Jhon', 'awfaw@gaw22j.com', '$2y$10$c5G0LXQGfjZbx30soIlnm.Leodwd70z.rwLcVjVWp3NIPaoPeL6Mm', 'user', 'Qy7qaU1dZ6kykS1JmqI80qHOoPzyXv9M9AZ8AKP933cHazKc8fTAxqDYgiMA', '2018-04-13 20:03:01', '2018-04-14 03:06:57'),
('loiseuw', 'Klorin Tjor', 'luvifebriana@yahoo.com', '$2y$10$QohE/JJFMzb40US0.465xuYnJ2N0L7ax.uGkzEU2ra3lGXV5zyFx.', 'user', 'tQde81m7iTUwmPjiYuvd1YyafPb6tRCA74ZNOZfssQeTwGRCchTkT92qWixm', '2018-04-13 20:09:57', '2018-04-13 20:09:57'),
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `rute`
--
ALTER TABLE `rute`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transportation`
--
ALTER TABLE `transportation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
