-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 16 Jul 2023 pada 08.48
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_iproject`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `username` varchar(120) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `address` text DEFAULT NULL,
  `phone` varchar(13) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `customers`
--

INSERT INTO `customers` (`id`, `user_id`, `name`, `username`, `email`, `address`, `phone`, `created_at`, `updated_at`) VALUES
(7, 8, 'Ahmad Manarul', NULL, 'arul@gmail.com', 'RIAU, KABUPATEN INDRAGIRI HILIR, RETEH, SUNGAI UNDAN,', '081299291818', '2023-07-15 08:05:54', '2023-07-16 03:58:55'),
(10, 11, 'Reyvaldo Arrizky', NULL, 'aldo354@gmail.com', 'LAMPUNG, KABUPATEN LAMPUNG TIMUR, MARGATIGA, GEDUNG WANI,', '081282298326', '2023-07-15 20:12:05', '2023-07-16 03:58:41'),
(11, 12, 'Ghomidi Lawe', NULL, 'ghomidi@gmail.com', 'SUMATERA UTARA, KABUPATEN TAPANULI SELATAN, TANO TOMBANGAN ANGKOLA, SISOMA,', '0812929291821', '2023-07-15 20:12:53', '2023-07-16 03:58:18'),
(12, 13, 'Hakim Fahrozi', 'hakimfahrozi', 'hakim@gmail.com', 'JAWA BARAT, KOTA DEPOK, CILODONG, KALIMULYA,', '08128829381', '2023-07-16 03:40:18', '2023-07-16 03:44:33'),
(20, 22, 'Dewi Persiks', 'dewipersik', 'dewipersik@gmail.com', 'SUMATERA UTARA, KABUPATEN TAPANULI SELATAN, TANO TOMBANGAN ANGKOLA, HAREAN,', '081282291129', '2023-07-16 06:14:58', '2023-07-16 06:26:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_06_28_132107_create_orders_table', 1),
(6, '2023_06_28_132502_create_products_table', 1),
(7, '2023_06_28_144518_create_customers_table', 1),
(8, '2023_07_02_075952_create_order_items_table', 1),
(9, '2023_07_02_080627_create_transactions_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customers_id` int(11) NOT NULL,
  `code` int(11) DEFAULT NULL,
  `order_date` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `customers_id`, `code`, `order_date`, `status`, `total_amount`, `created_at`, `updated_at`) VALUES
(4, 12, 605, '2023-07-16', '2', 5600000, '2023-07-16 03:41:44', '2023-07-16 03:48:05'),
(5, 11, 562, '2023-07-16', '2', 8400000, '2023-07-16 04:06:54', '2023-07-16 06:28:27'),
(6, 13, NULL, '2023-07-16', '1', 7200000, '2023-07-16 04:33:11', '2023-07-16 04:33:11'),
(8, 7, NULL, '2023-07-16', '2', 5800000, '2023-07-16 04:37:36', '2023-07-16 04:38:04'),
(9, 20, 993, '2023-07-16', '2', 5600000, '2023-07-16 06:16:49', '2023-07-16 06:27:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_amount_items` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `total_amount_items`, `created_at`, `updated_at`) VALUES
(19, 4, 2, 2, 5600000, '2023-07-16 03:41:44', '2023-07-16 03:41:44'),
(21, 5, 2, 1, 2800000, '2023-07-16 04:06:54', '2023-07-16 04:06:54'),
(22, 5, 3, 2, 5600000, '2023-07-16 04:07:02', '2023-07-16 04:07:02'),
(23, 6, 10, 2, 7200000, '2023-07-16 04:33:11', '2023-07-16 04:33:11'),
(24, 7, 26, 1, 5800000, '2023-07-16 04:35:07', '2023-07-16 04:35:07'),
(25, 8, 26, 1, 5800000, '2023-07-16 04:37:36', '2023-07-16 04:37:36'),
(27, 9, 2, 2, 5600000, '2023-07-16 06:18:36', '2023-07-16 06:18:36'),
(28, 10, 30, 1, 6900000, '2023-07-16 06:26:44', '2023-07-16 06:26:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(120) NOT NULL,
  `price` double NOT NULL,
  `description` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `description`, `gambar`, `stock`, `created_at`, `updated_at`) VALUES
(2, 'iPhone 6 Dark Grey 32 GB', 2800000, 'Apple iPhone 6\r\nDark Grey \r\n32 GB', 'AZrX3V1Z0WJVtchE5QayhUa9fWSvg2oO3EwI5x6W.jpg', 0, '2023-07-13 01:00:53', '2023-07-16 06:20:22'),
(3, 'iPhone 6 Gold 32 GB', 2800000, 'Apple iPhone 6 \r\nGold \r\n32 GB', 'E3QMaZPPX5hKZmFtHNcWmUTs3jxkfwXuNL66rYGd.jpg', 3, '2023-07-13 01:41:13', '2023-07-16 04:07:45'),
(4, 'iPhone 6 Grey 64 GB', 3000000, 'Apple iPhone 6 \r\nGrey \r\n64 GB', '5pan5LU03Kayg7Bzg2j5RGWSsrad5nTfBSUh0yTF.jpg', 10, '2023-07-13 02:12:34', '2023-07-13 02:12:34'),
(5, 'iPhone 6s Pink 32 GB', 3300000, 'Apple iPhone 6s \r\nPink \r\n32 GB', 'HBOHDlZ86t7vhnRODjGwnVQ6NClQCzRHceBj0Hg7.png', 15, '2023-07-13 02:14:09', '2023-07-13 02:14:09'),
(6, 'iPhone 6s Grey 64 GB', 3300000, 'Apple iPhone 6s \r\nGrey \r\n32 GB', '7tRuHj9rN5jM3RZ2E6oNxxuGHSeIXBsCj64j42zO.png', 10, '2023-07-13 02:14:50', '2023-07-13 02:14:50'),
(7, 'iPhone 6s Plus Grey 32 GB', 3600000, 'Apple iPhone 6s Plus \r\nGrey \r\n32 GB', '6oecA907VI21G7z77dpKJFSJvwBYsWhjuwWXoUlc.png', 5, '2023-07-13 02:16:33', '2023-07-13 02:16:33'),
(8, 'iPhone 6s Plus Gold 64 GB', 3750000, 'iPhone 6s Plus \r\nGold \r\n32 GB', 'oDvV2WVk2LKFpKRbG2owc1IGdpF8x5kUXtGZ3o6x.jpg', 12, '2023-07-13 02:17:10', '2023-07-13 02:17:10'),
(9, 'iPhone 7 Black 32 GB', 3600000, 'Apple iPhone 7 \r\nBlack \r\n32 GB', 'vwP43mh0LuSGemKvE2dAteCez5tmMhmtJ6xsN87p.jpg', 5, '2023-07-13 02:18:06', '2023-07-13 02:18:06'),
(10, 'iPhone 7 Rose Gold 32 GB', 3600000, 'Apple iPhone 7 \r\nRose Gold \r\n32 GB', '0b6MRDqGu39hOjz4QqiAmzIGOxApyfOU2bTldLkc.jpg', 8, '2023-07-13 02:19:16', '2023-07-13 02:19:16'),
(11, 'iPhone 7 Gold 64 GB', 3800000, 'Apple iPhone 7 \r\nGold \r\n64 GB', 'BUsU0N7DCT9DNxjoOUEzxqQtl58aki8TI68oFuQy.jpg', 4, '2023-07-13 02:20:18', '2023-07-13 02:20:18'),
(13, 'iPhone 7 Plus Black 32 GB', 3900000, 'Apple iPhone 7 Plus \r\nBlack \r\n32 GB', 'uYUAgIn68NIcOkCe0lQEQgpO3Bwoq6o5c1IeX7eg.jpg', 6, '2023-07-13 02:21:59', '2023-07-13 02:21:59'),
(14, 'iPhone 7 Plus Red 64 GB', 4100000, 'Apple iPhone 7 Plus \r\nRed \r\n64 GB', 'kRK3Olu6PYK23BNkMuJJe6dUZoKUAQX3yRUFMuWP.jpg', 9, '2023-07-13 02:22:49', '2023-07-13 02:22:49'),
(15, 'iPhone 8 Black 32 GB', 3900000, 'Apple iPhone 8 \r\nBlack \r\n32 GB', 'FVneb0tRg9x5nCm38tVZ2Uxn6PMhRHzEIFoSyKj2.png', 7, '2023-07-13 02:23:57', '2023-07-13 02:24:58'),
(16, 'iPhone 8 Red 64 GB', 3900000, 'Apple iPhone 8 \r\nRed \r\n64 GB', '9P7TJ62xn0psF83Xzgy11dkQfTL2FtzzhlPpw1OZ.jpg', 3, '2023-07-13 02:25:34', '2023-07-13 02:25:34'),
(17, 'iPhone 8 Plus White 32 GB', 4300000, 'Apple iPhone 8 Plus \r\nWhite \r\n32 GB', '7FLalUDHfavfrMFm5kQlitAaIRwb2nX9IFpRN1Gh.jpg', 2, '2023-07-13 02:26:37', '2023-07-13 02:27:40'),
(18, 'iPhone 8 Plus Black 64 GB', 4400000, 'Apple iPhone 8 Plus \r\nBlack \r\n32 GB', 'MZRXSziPiQXPZVJ0P3TO2rgLRK4JJ8p9y5gAxbwR.jpg', 9, '2023-07-13 02:28:15', '2023-07-13 02:28:15'),
(19, 'iPhone X White 32 GB', 4700000, 'Apple iPhone X \r\nWhite \r\n32 GB', '8Tc5yWuUZBI1RXNHYS2J9zsUKu8kOIRE0iRobJNS.jpg', 5, '2023-07-13 02:29:14', '2023-07-13 02:29:14'),
(20, 'iPhone X White 64 GB', 4850000, 'Apple iPhone X \r\nWhite \r\n32 GB', 'IV6j2wchjqL8OhO0qvCAdzGzYVtWJl02erpuYZ73.jpg', 5, '2023-07-13 02:29:51', '2023-07-13 02:29:51'),
(21, 'iPhone XR Yellow 32 GB', 4900000, 'Apple iPhone XR \r\nYellow \r\n32 GB', 'DVfygt4l3pmSAmYqKVMSXNesvqRsZfFbbrLp4Cet.jpg', 5, '2023-07-13 02:30:44', '2023-07-13 02:30:44'),
(22, 'iPhone XR Blue 32 GB', 4900000, 'Apple iPhone XR \r\nBlue \r\n32 GB', 'xPRRv6LWjH2HgJwTrku0LHQeLgD1AK8Bow19K72h.jpg', 5, '2023-07-13 02:31:38', '2023-07-13 02:31:38'),
(23, 'iPhone XR Red 64 GB', 5100000, 'Apple iPhone XR \r\nRed \r\n64 GB', 'QJ0FEk5heHaVxDyncdJXKF58q90RcADKqPP71R6q.jpg', 5, '2023-07-13 02:32:08', '2023-07-13 02:32:08'),
(24, 'iPhone XS Black 64 GB', 5300000, 'Apple iPhone XR \r\nBlack \r\n64 GB', 'cm8twbZvDYyh0GhGcKoKGrbybsaUciBYQ3HyIL5D.jpg', 6, '2023-07-13 02:33:28', '2023-07-13 02:33:28'),
(25, 'iPhone XS Gold 64 GB', 5300000, 'Apple iPhone XR \r\nGold \r\n64 GB', '6qlqCsTRRNU3xykgCGZuIOOr8m1YAIAPrwAjN1lu.jpg', 7, '2023-07-13 02:34:47', '2023-07-13 02:34:47'),
(26, 'iPhone 11 White 64 GB', 5800000, 'Apple iPhone 11 \r\nWhite \r\n64 GB', '2b049Jiz6gwrkh2ZQduzbjf4CZS8Na9baq3iHkzc.jpg', 5, '2023-07-13 02:35:45', '2023-07-13 02:35:45'),
(27, 'iPhone 11 Purple 64 GB', 5800000, 'Apple iPhone 11 \r\nPurple \r\n64 GB', 'iEV9Gv0oQOsOWOCA1jmVJamXyiK98hwHTsCEpM40.png', 5, '2023-07-13 02:36:37', '2023-07-13 02:36:54'),
(28, 'iPhone 11 Yellow 128 GB', 6000000, 'Apple iPhone 11 \r\nYellow \r\n128 GB', 'fJejG15768ELcO1U9BADhvZknToBOwBqq71XjbAR.png', 5, '2023-07-13 02:37:42', '2023-07-13 02:37:42'),
(29, 'iPhone 11 Pro Gold 64 GB', 6700000, 'Apple iPhone 11 Pro \r\nGold \r\n64 GB', 'sZMUw8jPLPaAmYba5ftHhsH3shRifM1Q2R0gRwCF.jpg', 5, '2023-07-13 02:39:36', '2023-07-13 02:39:36'),
(30, 'iPhone 11 Pro White 128 GB', 6900000, 'iPhone 11 Pro \r\nWhite\r\n128 GB', '3P7iknVyfXJJbZnWPe9qX47vMXGQCsVsIfFF0bWK.png', 6, '2023-07-13 02:40:23', '2023-07-13 02:40:23'),
(31, 'iPhone 11 Pro Max Midnight Green 64 GB', 7500000, 'Apple iPhone 11 Pro Max \r\nMidnight Green \r\n64 GB', '3VBDDnaW25PhCzP6INw6iyRntJ5M6ZG9mLzOghiJ.png', 7, '2023-07-13 02:41:11', '2023-07-13 02:41:28'),
(32, 'iPhone 11 Pro Max Gold 256 GB', 7900000, 'Apple iPhone 11 Pro Max \r\nGold \r\n256 GB', 'dstdIH9cLM5E015Luj5whiYruXN8KfDajVylvlvL.png', 4, '2023-07-13 02:42:05', '2023-07-13 02:42:05'),
(33, 'iPhone 12 White 128 GB', 8200000, 'Apple iPhone 12 \r\nWhite \r\n128 GB', 'q6IeZvFqM3sN8XUTLvOTFrR5PShN2AwnuMrj1cwD.png', 5, '2023-07-13 02:43:16', '2023-07-13 02:43:16'),
(34, 'iPhone 12 Purple 256 GB', 8500000, 'Apple iPhone 12 \r\nPurple \r\n512 GB', 'RjvSjqPO2KfBzownBAJC1Sb91jh9UvFVOpu7nqyG.png', 4, '2023-07-13 02:44:07', '2023-07-13 02:44:07'),
(35, 'iPhone 12 Green 512 GB', 8900000, 'Apple iPhone 12 \r\nGreen \r\n256 GB', 'MSzR7zeZkuSgEVIroJ1KBYgjYGOYlSGFgIDjdrTP.png', 4, '2023-07-13 02:44:44', '2023-07-13 02:44:44'),
(36, 'iPhone 12 Pro White 256 GB', 9500000, 'Apple iPhone 12 Pro \r\nWhite \r\n256 GB', 'IindXfxFRTdIYpv5eqijVOhsnjLtM50CF3yNggm1.jpg', 5, '2023-07-13 02:46:13', '2023-07-13 02:46:13'),
(37, 'iPhone 12 Pro Graphite 512 GB', 9800000, 'Apple iPhone 12 Pro \r\nGraphite \r\n256 GB', 'QMxhik3vsQyNeKX7MvB3jfPywumKMhDG1QbmCWlI.png', 4, '2023-07-13 02:46:55', '2023-07-13 02:46:55'),
(38, 'iPhone 12 Pro Max White 256 GB', 10500000, 'Apple iPhone 12 Pro Max \r\nWhite \r\n256 GB', 'HlxbAj3joWcUacIAbHGiYKBVdkApwGOngRk3yxCQ.png', 4, '2023-07-13 02:53:22', '2023-07-13 02:53:22'),
(39, 'iPhone 12 Pro Max Graphite 512 GB', 10900000, 'Apple iPhone 12 Pro Max \r\nGraphite \r\n256 GB', 'ob7hbOCdrKXWAG5eGkcCcgyRxeMYFRjzRmgyxIxH.png', 5, '2023-07-13 02:54:02', '2023-07-13 02:54:02'),
(40, 'iPhone 13 Rose Gold 256 GB', 12700000, 'Apple iPhone 13 \r\nRose Gold \r\n256 GB', 'ZAjMPwoB21Io0oJIHIIphIFN1AW9vesKs3aAE1JR.png', 5, '2023-07-13 03:00:44', '2023-07-13 03:00:44'),
(41, 'iPhone 13 Red 512 GB', 13000000, 'Apple iPhone 13 \r\nRed \r\n512 GB', 'cfCU3e7q1gjdwAVQGPxulboeAV8uHzRbzSzM0CMi.jpg', 6, '2023-07-13 03:02:50', '2023-07-13 03:02:50'),
(42, 'iPhone 13 Pro White 256 GB', 13700000, 'Apple iPhone 13 Pro \r\nWhite \r\n256 GB', 'XVJccHAPVA8LnWIKVhUU29X5Ak3MQbZY3qTw3zH2.jpg', 2, '2023-07-13 03:03:49', '2023-07-13 03:03:49'),
(43, 'iPhone 13 Pro Blue 512 GB', 14100000, 'Apple iPhone 13 Pro \r\nBlue \r\n256 GB', 's0xIGQA8qOI1paDyljWr2P7Qbrh4IeqDWOXux8Eo.jpg', 4, '2023-07-13 03:04:25', '2023-07-13 03:04:25'),
(46, 'Xr Test Kuning', 2500000, 'ini iphone xr Kuning', 'qZe3vCuEgAQqWWn737UzJlKklotJCfOFebNuJiRV.png', 5, '2023-07-16 03:49:31', '2023-07-16 03:50:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `transaction_date` date NOT NULL,
  `amount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transactions`
--

INSERT INTO `transactions` (`id`, `order_id`, `transaction_date`, `amount`, `created_at`, `updated_at`) VALUES
(1, 4, '2023-07-16', 5600000, '2023-07-16 03:44:44', '2023-07-16 03:44:44'),
(2, 5, '2023-07-16', 8400000, '2023-07-16 04:07:44', '2023-07-16 04:07:44'),
(4, 7, '2023-07-16', 5800000, '2023-07-16 04:35:07', '2023-07-16 04:35:07'),
(5, 8, '2023-07-16', 5800000, '2023-07-16 04:37:36', '2023-07-16 04:37:36'),
(6, 9, '2023-07-16', 5600000, '2023-07-16 06:20:22', '2023-07-16 06:20:22'),
(7, 10, '2023-07-16', 6900000, '2023-07-16 06:26:45', '2023-07-16 06:26:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('admin','customer') NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '2023-07-15 01:31:19', '$2y$10$8wKYr17bd5QZVJ/ClUNI6eEv34ynXJx7BSvAXSEvqmrzohEgV4iuO', 'admin', 'NhafuB4WNRBGktd5nwth1OzciHz6a7Iy7TVOHe9kElkBXOu4AO3d7DPkVR6a', '2023-07-15 01:31:19', '2023-07-15 01:31:19'),
(8, 'Ahmad Manarul', 'arul@gmail.com', NULL, '$2y$10$9VbJjsKy15ean4VMXjRSpuVbV6TO1/i3qCKYFNLLcXlIVZB4hUlm6', 'customer', 'cqOjPvcLgYU4Bn6Fw5R3QjJ6M17F7xie7UTePUiMllNLy0qKtSxW8scTOjAI', '2023-07-15 08:05:54', '2023-07-15 08:05:54'),
(11, 'Reyvaldo Arrizky', 'aldo354@gmail.com', NULL, '$2y$10$VtUmMcq/GOJ0Hd6J5fe2I.RChrz.pXCf23yzGHqXf/6KvjiDK5WDK', 'customer', 'ioHHImPNXXVksTysRUvNKHukf376Adj36TmEh1wJPSHtto0hgo1Lv7HV2yM8', '2023-07-15 20:12:05', '2023-07-15 20:12:05'),
(12, 'Ghomidi Lawe', 'ghomidi@gmail.com', NULL, '$2y$10$p9rwQ6s1X24o9iaK.SiFR.Lv8UxuMy2ovrsyVX5N1bYwM0mhzPfv.', 'customer', 'nVz2MEkk3Ey5KPVKr3XUnydaqoF733p4AOU6FwNcctnVlUgT8Bs09qK0tifJ', '2023-07-15 20:12:53', '2023-07-15 20:12:53'),
(13, 'Hakim Fahrozi', 'hakim@gmail.com', NULL, '$2y$10$FAPpklJfd9v.jr0VuHdOn.haroe2Uh4enKYM3M7VNuAxqvZTsiIjK', 'customer', 'yazfwREw79AvOxZerqbhBlkZc2sH2ZwjyghderknESSrowmvCAhSbvWoYZHe', '2023-07-16 03:40:18', '2023-07-16 03:40:18'),
(22, 'Dewi Persik', 'dewipersik@gmail.com', NULL, '$2y$10$lbq0mZEuguqz2EyfJ/gT1.RnUtY4wamBjQB/VKILjhQ4G/TbZHOa2', 'customer', 'NBnm7L11qziNHhhKJxV9trIqpCD6kKG7jD8kgwmTCUyTZrrcVTgTvG8rvQ5m', '2023-07-16 06:14:58', '2023-07-16 06:14:58');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT untuk tabel `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
