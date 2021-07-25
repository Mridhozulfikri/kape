-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Jul 2021 pada 12.24
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wpu_larave`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barangkeluar`
--

CREATE TABLE `barangkeluar` (
  `id` int(11) NOT NULL,
  `kode_barang` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_barang` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_keluar` bigint(20) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `total` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `barangkeluar`
--

INSERT INTO `barangkeluar` (`id`, `kode_barang`, `nama_barang`, `harga_keluar`, `qty`, `total`, `created_at`, `updated_at`) VALUES
(77, 'B008', 'ads', 1300, 5, 6500, '2021-07-25 03:18:42', '2021-07-25 03:18:42'),
(78, 'B006', 'asd', 160, 123, 19668, '2021-07-25 03:21:13', '2021-07-25 03:21:13');

--
-- Trigger `barangkeluar`
--
DELIMITER $$
CREATE TRIGGER `qty` AFTER INSERT ON `barangkeluar` FOR EACH ROW BEGIN
 UPDATE barangmasuk SET qty=qty-NEW.qty
 WHERE kode_barang=NEW.kode_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barangmasuk`
--

CREATE TABLE `barangmasuk` (
  `id` int(11) NOT NULL,
  `kode_barang` char(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_barang` char(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `harga_satuan` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `barangmasuk`
--

INSERT INTO `barangmasuk` (`id`, `kode_barang`, `nama_barang`, `qty`, `harga_satuan`, `created_at`, `updated_at`) VALUES
(8, 'B001', 'Pensil', 0, 2000, '2021-07-13 06:37:34', '2021-07-13 06:37:34'),
(9, 'B002', 'dasda', 0, 2311, '2021-07-13 06:39:00', '2021-07-13 06:39:00'),
(10, 'B003', 'Penghapus', 0, 3000, '2021-07-13 06:40:51', '2021-07-13 06:40:51'),
(11, 'B004', 'pen', -2, 123, '2021-07-20 03:36:16', '2021-07-20 03:36:16'),
(12, 'B005', 'asd', 0, 12, '2021-07-20 03:37:31', '2021-07-20 03:37:31'),
(14, 'B006', 'asd', 0, 123, '2021-07-22 07:58:44', '2021-07-22 07:58:44'),
(15, 'B007', 'pen', -10, 1000, '2021-07-25 01:56:37', '2021-07-25 01:56:37'),
(16, 'B008', 'ads', -4, 1000, '2021-07-25 03:18:24', '2021-07-25 03:18:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `databarang`
--

CREATE TABLE `databarang` (
  `id` int(11) NOT NULL,
  `kode_barang` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_barang` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok` int(11) NOT NULL,
  `harga_masuk` double(8,2) NOT NULL,
  `harga_keluar` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(30) DEFAULT NULL,
  `nama_barang` varchar(30) DEFAULT NULL,
  `qty` bigint(20) DEFAULT NULL,
  `harga_satuan` bigint(20) DEFAULT NULL,
  `total` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `inventory`
--

INSERT INTO `inventory` (`id`, `kode_barang`, `nama_barang`, `qty`, `harga_satuan`, `total`, `created_at`, `updated_at`) VALUES
(8, 'B001', 'Pensil', 20, 2000, 40000, '2021-07-13 06:37:34', '2021-07-13 06:37:34'),
(9, 'B002', 'dasda', 21, 2311, 48531, '2021-07-13 06:39:00', '2021-07-13 06:39:00'),
(10, 'B003', 'Penghapus', 20, 3000, 60000, '2021-07-13 06:40:50', '2021-07-13 06:40:50'),
(11, 'B004', 'pen', 23, 123, 2829, '2021-07-20 03:36:16', '2021-07-20 03:36:16'),
(12, 'B005', 'asd', 12, 12, 144, '2021-07-20 03:37:31', '2021-07-20 03:37:31'),
(13, 'B006', 'memek', 12, 12, 144, '2021-07-22 05:12:58', '2021-07-22 05:12:58'),
(14, 'B006', 'asd', 123, 123, 15129, '2021-07-22 07:58:44', '2021-07-22 07:58:44'),
(15, 'B007', 'pen', 10, 1000, 10000, '2021-07-25 01:56:37', '2021-07-25 01:56:37'),
(16, 'B008', 'ads', 1, 1000, 1000, '2021-07-25 03:18:24', '2021-07-25 03:18:24');

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
(17, '2021_06_22_104708_create_barangmasuk_table', 1),
(18, '2014_10_12_000000_create_users_table', 2),
(19, '2014_10_12_100000_create_password_resets_table', 2),
(20, '2019_08_19_000000_create_failed_jobs_table', 2),
(21, '2021_07_06_151623_databarang', 2),
(22, '2021_07_06_164631_barangkeluar', 3),
(23, '2021_07_06_165437_barangkeluar', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barangkeluar`
--
ALTER TABLE `barangkeluar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `barangmasuk`
--
ALTER TABLE `barangmasuk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barangkeluar`
--
ALTER TABLE `barangkeluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT untuk tabel `barangmasuk`
--
ALTER TABLE `barangmasuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
