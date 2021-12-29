-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Des 2021 pada 15.11
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `omkost`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `blacklists`
--

CREATE TABLE `blacklists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `identitas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bukti` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `submit_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `submit_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `validate_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `validate_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status_validasi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `blacklists`
--

INSERT INTO `blacklists` (`id`, `jenis`, `kota`, `identitas`, `nama`, `telp`, `keterangan`, `bukti`, `submit_by`, `submit_at`, `validate_by`, `validate_at`, `created_at`, `updated_at`, `status_validasi`) VALUES
(1, 'pencari', 'Solo', '257236951235', 'Himawati', '07452371735', 'Kriminal', NULL, 'test@gmail.com', '2021-12-22 15:57:45', 'test@gmail.com', '2021-12-22 08:57:45', '2021-12-07 09:17:05', '2021-12-22 08:57:45', 1),
(26, 'pencari', 'Madiun', '6517626267', 'Jajang Suka', '0176231236326', 'Kriminal', '116391465991600px_IQiyi_logo-1024x706.png', 'test@gmail.com', '2021-12-22 15:58:16', NULL, NULL, '2021-12-10 07:30:01', '2021-12-22 08:58:16', 2),
(32, 'pencari', 'Solo', '216263173473', 'Patrick K', '081636716345', 'Kriminal', '81640531667twinkle.png', 'animeloverz072@gmail.com', '2021-12-26 15:15:56', NULL, NULL, '2021-12-14 22:45:56', '2021-12-26 08:15:56', NULL),
(33, 'pencari', 'Madiun', '2572369512354', 'Jajang Supriatma', '07452371735', 'Kriminal', '81640271422product__5_-removebg-preview.png', 'animeloverz072@gmail.com', '2021-12-23 14:57:03', NULL, NULL, '2021-12-23 07:57:03', '2021-12-23 07:57:03', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2021_04_24_155722_create_blacklist_table', 1),
(5, '2021_04_24_194604_add_kota_to_blacklist', 1),
(6, '2021_04_24_224306_rename_table_blacklist', 1),
(7, '2021_04_28_103801_create_tukangs_table', 1),
(8, '2021_04_28_104339_create_tokos_table', 1),
(9, '2021_12_07_154820_add_isadmin_to_users_table', 1),
(10, '2021_12_08_113617_create_notifications_table', 1),
(11, '2021_12_22_140228_add_status_validasi_to_tukangs_table', 1),
(12, '2021_12_22_140254_add_status_validasi_to_tokos_table', 1),
(13, '2021_12_22_140319_add_status_validasi_to_blacklist_table', 1),
(15, '2021_12_28_125438_add_veriftoken_to_users', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `validation_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_validation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_user_rekomendasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_item_rekomendasi` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `notifications`
--

INSERT INTO `notifications` (`id`, `validation_status`, `jenis_validation`, `keterangan`, `email_user_rekomendasi`, `id_item_rekomendasi`, `created_at`, `updated_at`) VALUES
(1, 'Diterima', 'Blacklist', 'Data sudah berhasil divalidasi', 'test@gmail.com', 1, '2021-12-22 08:57:45', '2021-12-22 08:57:45'),
(2, 'Ditolak', 'Blacklist', 'Gambar kurang jelas', 'test@gmail.com', 26, '2021-12-22 08:58:16', '2021-12-22 08:58:16'),
(3, 'Diterima', 'Blacklist', 'Data sudah berhasil divalidasi', 'animeloverz072@gmail.com', 32, '2021-12-22 08:59:47', '2021-12-22 08:59:47'),
(4, 'Diterima', 'Tukang', 'Data sudah berhasil divalidasi', 'animeloverz072@gmail.com', 3, '2021-12-22 09:17:19', '2021-12-22 09:17:19'),
(5, 'Diterima', 'Toko', 'Data sudah berhasil divalidasi', 'animeloverz072@gmail.com', 3, '2021-12-22 09:17:28', '2021-12-22 09:17:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\User', 1, 'OmkostToken', '749a82efb8d8f68e4aee6fe9632055944ed2c5defb496700dc40376543f0228f', '[\"*\"]', NULL, '2021-12-07 09:16:46', '2021-12-07 09:16:46'),
(3, 'App\\User', 2, 'OmkostToken', 'eb1571bb70ba6c95d421301f5a74e4feb7aa74294434654322952e427cf790b5', '[\"*\"]', NULL, '2021-12-07 22:31:39', '2021-12-07 22:31:39'),
(4, 'App\\User', 3, 'OmkostToken', '3ba66ee48a49d3c05bab7a40149f0ae038fa4126345efecbe545b9590766cb72', '[\"*\"]', NULL, '2021-12-07 22:36:37', '2021-12-07 22:36:37'),
(5, 'App\\User', 4, 'OmkostToken', 'b8c89de178e714c081f64fce608fa33886fb2ac198135d16f2529a73a2738918', '[\"*\"]', NULL, '2021-12-07 22:40:22', '2021-12-07 22:40:22'),
(6, 'App\\User', 4, 'OmkostToken', '3daa9256a832f7eb11b1a96a15d36429ea87d732665247b5bcbe6ad18d6aa89f', '[\"*\"]', NULL, '2021-12-07 22:40:48', '2021-12-07 22:40:48'),
(7, 'App\\User', 5, 'OmkostToken', '9b37ef75c49ad7120396d7dd91d6808bc9e4456f546005d2532ca31ab7cf2af0', '[\"*\"]', NULL, '2021-12-07 22:44:16', '2021-12-07 22:44:16'),
(8, 'App\\User', 6, 'OmkostToken', 'b5d115764ef10910fd1c633000b70596f316f7bb803bee0b590e8cedeb233201', '[\"*\"]', NULL, '2021-12-07 22:54:08', '2021-12-07 22:54:08'),
(14, 'App\\User', 7, 'OmkostToken', '1cef75c531ae8c3cb7c28373903aed0eabc144c0424636d4569f5e2d2be2fb51', '[\"*\"]', NULL, '2021-12-09 05:05:57', '2021-12-09 05:05:57'),
(16, 'App\\User', 8, 'OmkostToken', '7c33e8607ba42d170d622097050c52bb82c741b73f8ccfa501dff9b2c6416dff', '[\"*\"]', NULL, '2021-12-09 05:06:41', '2021-12-09 05:06:41'),
(33, 'App\\User', 1, 'OmkostToken', 'f6d0899af6ee611e9e7b400f8b10218605c45fcee665868561478d7ac3b5a8bb', '[\"*\"]', NULL, '2021-12-09 08:45:06', '2021-12-09 08:45:06'),
(35, 'App\\User', 1, 'OmkostToken', '2865a2734e2c7211177537b124d21cc7b51a4f8126600115d247e31a59f19915', '[\"*\"]', '2021-12-10 08:36:51', '2021-12-10 08:17:19', '2021-12-10 08:36:51'),
(37, 'App\\User', 1, 'OmkostToken', '6c72b027dfa7b79c6cca1219f7b6da3bab729248490575f6d9247c86c8469811', '[\"*\"]', NULL, '2021-12-13 01:09:00', '2021-12-13 01:09:00'),
(38, 'App\\User', 1, 'OmkostToken', 'f288001c499a6a457b9685825282746c132d79f5cb8e141b94b087e5cd2da1d6', '[\"*\"]', NULL, '2021-12-13 01:13:39', '2021-12-13 01:13:39'),
(45, 'App\\User', 8, 'OmkostToken', 'cf662e1c96f164ec8131e46aeb7a94db2c8339982d1f98302e895e77ee937de8', '[\"*\"]', NULL, '2021-12-13 03:07:21', '2021-12-13 03:07:21'),
(50, 'App\\User', 1, 'OmkostToken', '2ff302319481797dc30a822909cba8eb5548a4922fd67026d39084eb0766a93c', '[\"*\"]', NULL, '2021-12-14 23:07:13', '2021-12-14 23:07:13'),
(53, 'App\\User', 1, 'OmkostToken', '24ed21132cd3556cdd59bc578679794e8f92e684306082fbb825b35363081c3c', '[\"*\"]', '2021-12-22 07:56:04', '2021-12-22 07:38:44', '2021-12-22 07:56:04'),
(58, 'App\\User', 9, 'OmkostToken', '9029fb1b737d529c4765099cb0967caed3aa34cb0b4ba43a25a83ab36835bdca', '[\"*\"]', NULL, '2021-12-28 06:15:53', '2021-12-28 06:15:53'),
(59, 'App\\User', 10, 'OmkostToken', '1f62b18a96c8afd23c9f2a681124612c6089ae42f43006e82719e3b0b20b5cd4', '[\"*\"]', NULL, '2021-12-28 06:18:08', '2021-12-28 06:18:08'),
(60, 'App\\User', 11, 'OmkostToken', 'ee1edd71686c042bce4191b0b19b0a6246f3971dc7a2acdd79e98f1e025ff51d', '[\"*\"]', NULL, '2021-12-28 06:21:22', '2021-12-28 06:21:22'),
(61, 'App\\User', 12, 'OmkostToken', '14fee22b924c3bcd5a4604fc52b753695fc157170862da6315be82d3384ec0a1', '[\"*\"]', NULL, '2021-12-28 06:47:28', '2021-12-28 06:47:28'),
(62, 'App\\User', 13, 'OmkostToken', '313e99176b273da571dc691390efcceb7a2dd2827d4171a804fde3aa67a77c87', '[\"*\"]', NULL, '2021-12-28 06:53:26', '2021-12-28 06:53:26'),
(63, 'App\\User', 14, 'OmkostToken', '8044580c0db4826a658df930e41728eb8ac1896578e99d5d9e37c696ea199175', '[\"*\"]', NULL, '2021-12-28 06:55:22', '2021-12-28 06:55:22'),
(64, 'App\\User', 15, 'OmkostToken', '688fee834a37642841152422d1959e86f5c477e41b21cf342ee1b7654128ada3', '[\"*\"]', NULL, '2021-12-28 06:58:47', '2021-12-28 06:58:47'),
(65, 'App\\User', 16, 'OmkostToken', 'e8efebc4df50f8d1e5ace99773b3c3540aba41c0f9c6bfd0340fa2c1d1035501', '[\"*\"]', NULL, '2021-12-28 07:11:53', '2021-12-28 07:11:53'),
(66, 'App\\User', 17, 'OmkostToken', 'd3e1df8981a1baa5a57e78b4692e96fcaebce6d9930c3fef47f99a03a6980691', '[\"*\"]', NULL, '2021-12-28 07:12:45', '2021-12-28 07:12:45'),
(67, 'App\\User', 18, 'OmkostToken', '26992b8fdfc1fa9b37e7bae11fde7bbfe645ef7a9a731bd0965c73d47b5cfd02', '[\"*\"]', NULL, '2021-12-28 07:18:35', '2021-12-28 07:18:35'),
(68, 'App\\User', 19, 'OmkostToken', '090ae921a47f40364500f5077143878689ae75bc1de3f3269027b25a28d7f9c1', '[\"*\"]', NULL, '2021-12-28 07:19:56', '2021-12-28 07:19:56'),
(69, 'App\\User', 20, 'OmkostToken', '78359e7363b83ce32b2ba6f2343e1a187fafbebde808b114ee8d8aa933029e86', '[\"*\"]', NULL, '2021-12-28 07:23:42', '2021-12-28 07:23:42'),
(70, 'App\\User', 21, 'OmkostToken', 'beb664c44acde02993601452db7077b6246d73095b5df688e00705ca476991bf', '[\"*\"]', NULL, '2021-12-28 07:28:41', '2021-12-28 07:28:41'),
(71, 'App\\User', 22, 'OmkostToken', '34a82715dceb12cbd7811cb1b9f612a8f1eb5b798bbfbfbb8f2fc5ba48551e9e', '[\"*\"]', NULL, '2021-12-28 07:29:45', '2021-12-28 07:29:45'),
(72, 'App\\User', 23, 'OmkostToken', 'af6eeb0a1fd1f92a809cee5146b31083acb96f8229020fbe1a4fa5dbd9816851', '[\"*\"]', NULL, '2021-12-28 07:30:43', '2021-12-28 07:30:43'),
(73, 'App\\User', 24, 'OmkostToken', '1d53fdd028d5076e682132ea86bd4b3f3102cf9724ee24114e7c1b26c3291710', '[\"*\"]', NULL, '2021-12-28 07:34:28', '2021-12-28 07:34:28'),
(74, 'App\\User', 25, 'OmkostToken', '19290a1157615cdbe3e2b63817ee9d2ede6939887b246386eacc4414b8ed584d', '[\"*\"]', NULL, '2021-12-28 07:34:51', '2021-12-28 07:34:51'),
(75, 'App\\User', 26, 'OmkostToken', 'c8dec74cb5963a469c4f9236a78749ec82534028e1f083c35d29529803fc9031', '[\"*\"]', NULL, '2021-12-28 07:35:11', '2021-12-28 07:35:11'),
(76, 'App\\User', 27, 'OmkostToken', 'f0da8c646dc7d0d062214edd3ddd09de04811c18f82c351090210bf721a98b52', '[\"*\"]', NULL, '2021-12-28 07:36:32', '2021-12-28 07:36:32'),
(77, 'App\\User', 28, 'OmkostToken', '391a654e620a5133d41c4f3e88b413d27841833a2a4af328ebaedcdb8ab1484d', '[\"*\"]', NULL, '2021-12-28 07:37:39', '2021-12-28 07:37:39'),
(78, 'App\\User', 29, 'OmkostToken', '0650a667b40fd8357f5aa01ab4a7457a7553833cc10f283415c82238785b2617', '[\"*\"]', NULL, '2021-12-28 07:43:20', '2021-12-28 07:43:20'),
(79, 'App\\User', 30, 'OmkostToken', '4368c0efb921e394532fc1a12f29ed0ec4e4dd828d1b27ba24d57cae3660ed3d', '[\"*\"]', NULL, '2021-12-28 07:43:39', '2021-12-28 07:43:39'),
(80, 'App\\User', 31, 'OmkostToken', 'f818c0b2f49b9d3754eab36b13a0bd78484ef85307695dbe579fecbe41c42550', '[\"*\"]', NULL, '2021-12-28 07:44:02', '2021-12-28 07:44:02'),
(81, 'App\\User', 32, 'OmkostToken', '3cd1a19b68e64b548668bb6ae024805e60a0d3abff200309d9e4ab2e02953fd8', '[\"*\"]', NULL, '2021-12-28 07:45:59', '2021-12-28 07:45:59'),
(82, 'App\\User', 33, 'OmkostToken', 'a79a09785d6f0c8a6397c25716c7fc66d68406f618c81dcc841431e50da2a9b9', '[\"*\"]', NULL, '2021-12-28 07:46:42', '2021-12-28 07:46:42'),
(83, 'App\\User', 34, 'OmkostToken', '6d2057ea71aab81738f3cb3030d3198e17a94eedb9d45bd2bd316939cbd12b7b', '[\"*\"]', NULL, '2021-12-28 07:49:51', '2021-12-28 07:49:51'),
(84, 'App\\User', 35, 'OmkostToken', '1910e6349f182ab63c08d85d781603f9a8d2415ebf55d4f0d4994dd284cc9b77', '[\"*\"]', NULL, '2021-12-28 07:56:17', '2021-12-28 07:56:17'),
(85, 'App\\User', 36, 'OmkostToken', '520558470c5dc29c95424efe3ff6bde05286c395d8649eabf5c595c2ab3aeede', '[\"*\"]', NULL, '2021-12-28 07:57:46', '2021-12-28 07:57:46'),
(86, 'App\\User', 37, 'OmkostToken', 'fed4962b62e8302d772658af2a66b3c7968919c8abb36986b562fd3eef3410e2', '[\"*\"]', NULL, '2021-12-28 08:00:16', '2021-12-28 08:00:16'),
(87, 'App\\User', 38, 'OmkostToken', '0b33267c1a96b7e0753e0ef05912ef0e7829e7dd69408de1e04209bb0b3ef040', '[\"*\"]', NULL, '2021-12-28 08:01:23', '2021-12-28 08:01:23'),
(88, 'App\\User', 39, 'OmkostToken', '8200d6e68534a4d044d1810880085b73fcb7834141f041ae86598269093b8491', '[\"*\"]', NULL, '2021-12-28 08:02:15', '2021-12-28 08:02:15'),
(89, 'App\\User', 40, 'OmkostToken', 'd6fe7dbcd752aefbbf0b4726326ef15118d9a48812bb2bff1aff13deba28a67c', '[\"*\"]', NULL, '2021-12-28 08:05:54', '2021-12-28 08:05:54'),
(90, 'App\\User', 41, 'OmkostToken', '4ac53f9abe5db548e3a261e0d865fd9c72a67a6b1ae74051db1acbb31df8e971', '[\"*\"]', NULL, '2021-12-28 08:06:33', '2021-12-28 08:06:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tokos`
--

CREATE TABLE `tokos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `submit_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `submit_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `validate_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `validate_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status_validasi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tokos`
--

INSERT INTO `tokos` (`id`, `jenis`, `kota`, `nama`, `telp`, `alamat`, `keterangan`, `submit_by`, `submit_at`, `validate_by`, `validate_at`, `created_at`, `updated_at`, `status_validasi`) VALUES
(1, 'ac', 'Madiun', 'Megah Jati Jaya', '08265621677', 'Jl. Apa Aja Boleh no 102', 'Kualitas top, penggunaan jangka panjang OK', 'test@gmail.com', '2021-12-10 15:23:36', 'test@gmail.com', '2021-12-10 08:23:36', '2021-12-07 09:18:51', '2021-12-10 08:23:36', NULL),
(3, 'ac', 'Surabaya', 'Halo AC', '0715471852135', 'Jalan Mana Aja Bisa', 'Bagus dna murah', 'animeloverz072@gmail.com', '2021-12-26 15:25:05', NULL, NULL, '2021-12-14 07:17:15', '2021-12-26 08:25:05', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tukangs`
--

CREATE TABLE `tukangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `submit_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `submit_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `validate_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `validate_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status_validasi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tukangs`
--

INSERT INTO `tukangs` (`id`, `jenis`, `kota`, `nama`, `telp`, `keterangan`, `submit_by`, `submit_at`, `validate_by`, `validate_at`, `created_at`, `updated_at`, `status_validasi`) VALUES
(1, 'ac', 'Surabaya', 'Pak Karji', '0812658235263', 'Bagus, harga terjangkau, kerja cepat', 'test@gmail.com', '2021-12-10 15:36:44', 'test@gmail.com', '2021-12-10 08:36:44', '2021-12-07 09:18:02', '2021-12-10 08:36:44', NULL),
(3, 'ac', 'Solo', 'Tukang AC mantab', '0712457231', 'Berkualitas tinggi hasil servisannya', 'animeloverz072@gmail.com', '2021-12-26 15:28:42', NULL, NULL, '2021-12-21 08:46:01', '2021-12-26 08:28:42', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `isAdmin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verifToken` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `telp`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `isAdmin`, `verifToken`) VALUES
(1, 'test', '08123456789', 'test@gmail.com', NULL, '$2y$10$a2fivlRyL/C0DohFJCxUsuBwcEEQAW.6gGSTGJ5I4B43/C4kEM8ye', 'EXW6Yu5QGHLNJ96LBGvfEcGBcrYW5i4jVtAcXiik5zamocMpo00ngG5qmEZt', '2021-12-07 09:16:45', '2021-12-07 09:16:45', '1', ''),
(7, 'halo', '123', 'halo@gmail.com', NULL, '$2y$10$4b.ePOjn9aao5PQYquwE6.Xo1XAZBz1jCij9PMkUozX/wDo3CTCma', NULL, '2021-12-09 05:05:57', '2021-12-09 05:05:57', '0', ''),
(8, 'jonathan', '08126526621', 'animeloverz072@gmail.com', '2021-12-09 06:49:16', '$2y$10$Xdp9KHZLem6/f/iYX7urSulsf.7HDS1SMIVe0lnFEN8CPSp8.GRKi', NULL, '2021-12-09 05:06:41', '2021-12-20 05:39:17', '0', ''),
(34, 'haha', '08123456789', 'jonathanalphabert0504@gmail.com', '2021-12-28 07:51:46', '$2y$10$jSWXRsoC4wY7PYD5rbD0tOaL0FPWD9Z6uLuANgq0jidSMCFgTwuJ.', NULL, '2021-12-28 07:49:51', '2021-12-28 07:51:46', '0', 'absc'),
(36, 'hahaaa', '08123456781', 'aaaa@gmail.com', '2021-12-28 07:58:24', '$2y$10$20YQsekT7EoV6uOvkGSsq.FZkP8qWQh/Fql3HOz3r276S8hriiqti', NULL, '2021-12-28 07:57:46', '2021-12-28 07:58:24', '0', 'mqin0NwfefkPXyBPNiVe2mynI0AXVJHYSnTmAidy'),
(41, 'Bambang Pamungkas', '08126526621', 'bbbb@gmail.com', '2021-12-28 08:08:46', '$2y$10$3iju5hLRKMIB0G3SWzuxh.coGj0JZccZjIKXGxc8ovYrKnM9dn9ou', NULL, '2021-12-28 08:06:33', '2021-12-28 08:08:46', '0', '7sjfCSYD1Z2QJf3SMlkODN1M74aTXDwgMbVcAhLU');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `blacklists`
--
ALTER TABLE `blacklists`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `tokos`
--
ALTER TABLE `tokos`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tukangs`
--
ALTER TABLE `tukangs`
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
-- AUTO_INCREMENT untuk tabel `blacklists`
--
ALTER TABLE `blacklists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT untuk tabel `tokos`
--
ALTER TABLE `tokos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tukangs`
--
ALTER TABLE `tukangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
