-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2019 at 07:24 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gov`
--

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

CREATE TABLE `attachments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attachments`
--

INSERT INTO `attachments` (`id`, `menu_id`, `type`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'file', NULL, '2019-12-20 23:45:14', '2019-12-20 23:45:14'),
(2, 1, 'file', NULL, '2019-12-20 23:46:15', '2019-12-20 23:46:15'),
(3, 2, 'page', NULL, '2019-12-20 23:51:44', '2019-12-20 23:51:44'),
(4, 7, 'page', NULL, '2019-12-21 00:20:09', '2019-12-21 00:20:09'),
(5, 7, 'page', NULL, '2019-12-21 00:22:10', '2019-12-21 00:22:10');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `attachment_id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `path` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `attachment_id`, `title`, `name`, `size`, `path`, `mime_type`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'হিসাব সহকারী কাম কম্পিউটার অপারেটর’ পদের পরীক্ষা স্থগিত সংক্রান্ত', '1576907114_0a0c0b06e75b8da73c171992a4e17c85.pdf', 594289, 'files/1576907114_0a0c0b06e75b8da73c171992a4e17c85.pdf', 'application/pdf', NULL, '2019-12-20 23:45:14', '2019-12-20 23:45:14'),
(2, 2, 'চট্টগ্রাম জেলায় ইউনিয়ন পরিষদসমুহে \"হিসাব সহকারী-কাম-কম্পিউটার অপারেটর\" পদে নিয়োগ পরীক্ষার সময়সূচী', '1576907175_f33dff41bfdba9598234b8d43ad9babe.pdf', 494787, 'files/1576907175_f33dff41bfdba9598234b8d43ad9babe.pdf', 'application/pdf', NULL, '2019-12-20 23:46:15', '2019-12-20 23:46:15');

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE `links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `attachment_id` bigint(20) UNSIGNED NOT NULL,
  `text_to_display` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `hyperlink` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `parent_id`, `name`, `location`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, 'নোটিশ বোর্ড', 'body', '2019-12-20 23:43:59', '2019-12-20 23:43:59', NULL),
(2, NULL, 'খবর', 'body', '2019-12-20 23:50:49', '2019-12-20 23:50:49', NULL),
(3, NULL, 'টেন্ডার', 'side_link', '2019-12-20 23:52:27', '2019-12-20 23:52:27', NULL),
(4, NULL, 'চাকুরি', 'side_link', '2019-12-20 23:52:34', '2019-12-20 23:52:34', NULL),
(5, NULL, 'জেলা প্রশাসকের কার্যালয়ে নিয়োগ বিজ্ঞপ্তি ও আবেদন ফরম', 'side_link', '2019-12-20 23:53:03', '2019-12-20 23:53:03', NULL),
(6, NULL, 'অনলাইনে পাসপোর্ট আবেদন', 'side_link', '2019-12-20 23:53:29', '2019-12-20 23:53:29', NULL),
(7, NULL, 'জেলা সম্পর্কিত', 'nav_link', '2019-12-20 23:53:59', '2019-12-20 23:53:59', NULL),
(8, NULL, 'জেলা প্রশাসন', 'nav_link', '2019-12-20 23:54:18', '2019-12-20 23:54:18', NULL),
(9, NULL, 'স্থানীয় সরকার', 'nav_link', '2019-12-20 23:54:48', '2019-12-20 23:54:48', NULL),
(10, NULL, 'সরকারি অফিস', 'nav_link', '2019-12-20 23:55:05', '2019-12-20 23:55:05', NULL),
(11, NULL, 'অন্যান্য প্রতিষ্ঠান', 'nav_link', '2019-12-20 23:55:21', '2019-12-20 23:55:21', NULL),
(12, NULL, 'ই-সেবা', 'nav_link', '2019-12-20 23:55:36', '2019-12-20 23:55:53', '2019-12-20 23:55:53'),
(13, NULL, 'আমাদের সেবাসমূহ', 'card', '2019-12-20 23:56:46', '2019-12-20 23:56:46', NULL),
(14, 13, 'সিটিজেন চার্টার', NULL, '2019-12-20 23:56:58', '2019-12-20 23:56:58', NULL),
(15, 13, 'জেলা প্রশাসনের শাখা', NULL, '2019-12-20 23:57:43', '2019-12-20 23:57:43', NULL),
(16, 13, 'জরুরি কল', NULL, '2019-12-20 23:58:05', '2019-12-20 23:58:05', NULL),
(17, 13, 'জরুরি সেবা', NULL, '2019-12-20 23:58:38', '2019-12-20 23:58:38', NULL),
(18, NULL, 'মানবসম্পদ', 'card', '2019-12-20 23:58:55', '2019-12-20 23:58:55', NULL),
(19, 18, 'জেলা প্রশাসনের কর্মকর্তাবৃন্দ', NULL, '2019-12-20 23:59:18', '2019-12-20 23:59:18', NULL),
(20, 18, 'অফিস আদেশ/অনাপত্তিপত্র', NULL, '2019-12-20 23:59:28', '2019-12-20 23:59:28', NULL),
(21, 18, 'কমকর্তাগণের বদলী/কর্মবণ্টন', NULL, '2019-12-20 23:59:42', '2019-12-20 23:59:42', NULL),
(22, 18, 'কর্মচারীগণের বদলী/কর্মবণ্টন', NULL, '2019-12-20 23:59:55', '2019-12-20 23:59:55', NULL),
(23, NULL, 'নিরাপত্তা ও শৃঙ্খলা', 'card', '2019-12-21 00:00:43', '2019-12-21 00:24:13', NULL),
(24, 23, 'ই-মোবাইল কোর্ট', NULL, '2019-12-21 00:00:57', '2019-12-21 00:00:57', NULL),
(25, 23, 'পুলিশ সহায়তা', NULL, '2019-12-21 00:01:16', '2019-12-21 00:01:16', NULL),
(26, 23, 'ফায়ার সার্ভিস', NULL, '2019-12-21 00:01:29', '2019-12-21 00:01:29', NULL),
(27, 23, 'মোবাইলে ফায়ার সার্ভিস', NULL, '2019-12-21 00:01:42', '2019-12-21 00:01:42', NULL),
(28, NULL, 'ই-সেবা', 'nav_link', '2019-12-21 00:02:48', '2019-12-21 00:03:37', '2019-12-21 00:03:37'),
(29, NULL, 'গ্যালারি', 'nav_link', '2019-12-21 00:03:07', '2019-12-21 00:03:58', '2019-12-21 00:03:58');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_17_045259_create_menus_table', 1),
(5, '2019_12_18_042128_create_attachments_table', 1),
(6, '2019_12_18_042350_create_files_table', 1),
(7, '2019_12_18_042416_create_links_table', 1),
(8, '2019_12_18_042430_create_pages_table', 1),
(9, '2019_12_20_095510_create_sliders_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `attachment_id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `attachment_id`, `title`, `body`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 3, 'ঘূর্ণিঝড় ‘মোরা’, ৭ নম্বর বিপদ সংকেত', '<h3>ঘূর্ণিঝড় &lsquo;মোরা&rsquo;, ৭ নম্বর বিপদ সংকেত</h3>\r\n<div>\r\n<p>&nbsp;</p>\r\n<p>ঘূর্ণিঝড় &lsquo;মোরা&rsquo;, ৭ নম্বর বিপদ সংকেত; সবাইকে নিরাপদ স্থানে অবস্থান করার জন্যে প্রশাসনের পক্ষ থেকে অনুরোধ করা হয়েছে।</p>\r\n<p>&nbsp;</p>\r\n<p>ছবি</p>\r\n<br />\r\n<p>ফাইল</p>\r\n<br />\r\n<p>প্রকাশনের তারিখ</p>\r\n<p>২০১৭-০৫-২৯</p>\r\n</div>', NULL, '2019-12-20 23:51:44', '2019-12-20 23:51:44'),
(2, 4, 'কাউন্সিলরবৃন্দ', '<h3>কাউন্সিলরবৃন্দ</h3>\r\n<div>\r\n<p>&nbsp;</p>\r\n<div class=\"view-content\">\r\n<div class=\"item-list\">\r\n<ul>\r\n<li class=\"views-row views-row-1 views-row-odd views-row-first\">\r\n<div class=\"field-content councilor_image\">&nbsp;</div>\r\n<div class=\"views-field views-field-title counsilor-title\"><span class=\"field-content\">জনাব তৌফিক আহমদ চৌধুরী</span></div>\r\n<div class=\"views-field views-field-field-phone phone_wrapper\"><span class=\"views-label views-label-field-phone\">Ph:&nbsp;</span><span class=\"field-content\">০১৮১২-২৫৩২৭৩</span></div>\r\n<div class=\"views-field views-field-field-ward counsilor-ward\"><span class=\"field-content\">০১ নং দঃ পাহাড়তলী</span></div>\r\n</li>\r\n<li class=\"views-row views-row-2 views-row-even\">\r\n<div class=\"field-content councilor_image\">&nbsp;</div>\r\n<div class=\"views-field views-field-title counsilor-title\"><span class=\"field-content\">জনাব মোঃ সাহেদ ইকবাল (বাবু)</span></div>\r\n<div class=\"views-field views-field-field-phone phone_wrapper\"><span class=\"views-label views-label-field-phone\">Ph:&nbsp;</span><span class=\"field-content\">০১৮১৩-৫৪০১০৯</span></div>\r\n<div class=\"views-field views-field-field-ward counsilor-ward\"><span class=\"field-content\">০২ নং জালালাবাদ</span></div>\r\n<div class=\"field-content councilor_image\"><span class=\"views-field views-field-field-profile-picture\"><img src=\"http://www.ccc.org.bd/sites/default/files/03.jpg\" alt=\"03\" width=\"90\" height=\"100\" /></span></div>\r\n<div class=\"views-field views-field-title counsilor-title\"><span class=\"field-content\">জনাব কফিল উদ্দিন খান</span></div>\r\n<div class=\"views-field views-field-field-phone phone_wrapper\"><span class=\"views-label views-label-field-phone\">Ph:&nbsp;</span><span class=\"field-content\">০১৮১৯-৩১৩৫১৫</span></div>\r\n<div class=\"views-field views-field-field-ward counsilor-ward\"><span class=\"field-content\">০৩ নং পাঁচলাইশ</span></div>\r\n<div class=\"field-content councilor_image\"><span class=\"views-field views-field-field-profile-picture\"><img src=\"http://www.ccc.org.bd/sites/default/files/04.jpg\" alt=\"04\" width=\"45\" height=\"25\" /></span></div>\r\n<div class=\"views-field views-field-title counsilor-title\"><span class=\"field-content\">জনাব মোঃ সাইফুদ্দিন খালেদ</span></div>\r\n<div class=\"views-field views-field-field-phone phone_wrapper\"><span class=\"views-label views-label-field-phone\">Ph:&nbsp;</span><span class=\"field-content\">০১৮১৭-৭১৮৩২১</span></div>\r\n<div class=\"views-field views-field-field-ward counsilor-ward\"><span class=\"field-content\">০৪ নং চান্দগাঁও</span></div>\r\n<div class=\"field-content councilor_image\"><span class=\"views-field views-field-field-profile-picture\"><img src=\"http://www.ccc.org.bd/sites/default/files/05.jpg\" alt=\"05\" width=\"90\" height=\"100\" /></span></div>\r\n<div class=\"views-field views-field-title counsilor-title\"><span class=\"field-content\">জনাব মোঃ আজম</span></div>\r\n<div class=\"views-field views-field-field-phone phone_wrapper\"><span class=\"views-label views-label-field-phone\">Ph:&nbsp;</span><span class=\"field-content\">০১৭১৫-৯৬৫৯১১, ০৩১-৬৭২৬০৮</span></div>\r\n<div class=\"views-field views-field-field-ward counsilor-ward\"><span class=\"field-content\">০৫ নং মোহরা</span></div>\r\n</li>\r\n<li class=\"views-row views-row-6 views-row-even\">\r\n<div class=\"field-content councilor_image\"><span class=\"views-field views-field-field-profile-picture\"><img src=\"http://www.ccc.org.bd/sites/default/files/06.jpg\" alt=\"06\" width=\"90\" height=\"100\" /></span></div>\r\n<div class=\"views-field views-field-title counsilor-title\"><span class=\"field-content\">জনাব এম আশরাফুল আলম</span></div>\r\n<div class=\"views-field views-field-field-phone phone_wrapper\"><span class=\"views-label views-label-field-phone\">Ph:&nbsp;</span><span class=\"field-content\">০১৬১৬-৩৩৩৯৪২, ০১৮৪২-৩৩৩৯৪২</span></div>\r\n<div class=\"views-field views-field-field-ward counsilor-ward\"><span class=\"field-content\">০৬ নং পূর্ব ষোলশহর</span></div>\r\n</li>\r\n<li class=\"views-row views-row-7 views-row-odd\">\r\n<div class=\"field-content councilor_image\"><span class=\"views-field views-field-field-profile-picture\"><img src=\"http://www.ccc.org.bd/sites/default/files/07.jpg\" alt=\"07\" width=\"90\" height=\"100\" /></span></div>\r\n<div class=\"views-field views-field-title counsilor-title\"><span class=\"field-content\">জনাব মোঃ মোবারক আলী</span></div>\r\n<div class=\"views-field views-field-field-phone phone_wrapper\"><span class=\"views-label views-label-field-phone\">Ph:&nbsp;</span><span class=\"field-content\">০১৮১৯-২৯৪২৫৫</span></div>\r\n<div class=\"views-field views-field-field-ward counsilor-ward\"><span class=\"field-content\">০৭ নং পঃ ষোলশহর</span></div>\r\n</li>\r\n<li class=\"views-row views-row-8 views-row-even\">\r\n<div class=\"field-content councilor_image\"><span class=\"views-field views-field-field-profile-picture\"><img src=\"http://www.ccc.org.bd/sites/default/files/08.jpg\" alt=\"08\" width=\"90\" height=\"100\" /></span></div>\r\n<div class=\"views-field views-field-title counsilor-title\"><span class=\"field-content\">জনাব মোঃ মোরশেদ আলম</span></div>\r\n<div class=\"views-field views-field-field-phone phone_wrapper\"><span class=\"views-label views-label-field-phone\">Ph:&nbsp;</span><span class=\"field-content\">০১৮১৯-৫২০০০৭</span></div>\r\n<div class=\"views-field views-field-field-ward counsilor-ward\"><span class=\"field-content\">০৮ নং শুলক বহর</span></div>\r\n</li>\r\n<li class=\"views-row views-row-9 views-row-odd\">\r\n<div class=\"field-content councilor_image\"><span class=\"views-field views-field-field-profile-picture\"><img src=\"http://www.ccc.org.bd/sites/default/files/09.jpg\" alt=\"09\" width=\"90\" height=\"100\" /></span></div>\r\n<div class=\"views-field views-field-title counsilor-title\"><span class=\"field-content\">জনাব মোঃ জহুরুল আলম জসিম</span></div>\r\n<div class=\"views-field views-field-field-phone phone_wrapper\"><span class=\"views-label views-label-field-phone\">Ph:&nbsp;</span><span class=\"field-content\">০১৭১১-৯৭১৫৩২</span></div>\r\n<div class=\"views-field views-field-field-ward counsilor-ward\"><span class=\"field-content\">০৯ নং উঃ পাহাড়তলী</span></div>\r\n</li>\r\n<li class=\"views-row views-row-10 views-row-even views-row-last\">\r\n<div class=\"field-content councilor_image\"><span class=\"views-field views-field-field-profile-picture\"><img src=\"http://www.ccc.org.bd/sites/default/files/10.jpg\" alt=\"10\" width=\"90\" height=\"100\" /></span></div>\r\n<div class=\"views-field views-field-title counsilor-title\"><span class=\"field-content\">জনাব নিছার উদ্দিন আহমেদ (মঞ্জু)</span></div>\r\n<div class=\"views-field views-field-field-phone phone_wrapper\"><span class=\"views-label views-label-field-phone\">Ph:&nbsp;</span><span class=\"field-content\">০১৭১১-৩১১৭৯৭</span></div>\r\n<div class=\"views-field views-field-field-ward counsilor-ward\"><span class=\"field-content\">১০ নং উত্তর কাট্টলী</span></div>\r\n</li>\r\n<li class=\"views-row views-row-10 views-row-even views-row-last\">\r\n<div class=\"views-field views-field-field-ward counsilor-ward\">\r\n<div class=\"view-content\">\r\n<div class=\"item-list\">\r\n<ul>\r\n<li class=\"views-row views-row-1 views-row-odd views-row-first\">\r\n<div class=\"field-content councilor_image\"><span class=\"views-field views-field-field-profile-picture\"><img src=\"http://www.ccc.org.bd/sites/default/files/11.jpg\" alt=\"11\" width=\"90\" height=\"100\" /></span></div>\r\n<div class=\"views-field views-field-title counsilor-title\"><span class=\"field-content\">জনাব মোরশেদ আকতার চৌধুরী</span></div>\r\n<div class=\"views-field views-field-field-phone phone_wrapper\"><span class=\"views-label views-label-field-phone\">Ph:&nbsp;</span><span class=\"field-content\">০১৭১১-৩৫৪২৫৯</span></div>\r\n<div class=\"views-field views-field-field-ward counsilor-ward\"><span class=\"field-content\">১১ নং দক্ষিণ কাট্টলী</span></div>\r\n</li>\r\n<li class=\"views-row views-row-2 views-row-even\">\r\n<div class=\"field-content councilor_image\"><span class=\"views-field views-field-field-profile-picture\"><img src=\"http://www.ccc.org.bd/sites/default/files/12.jpg\" alt=\"12\" width=\"90\" height=\"100\" /></span></div>\r\n<div class=\"views-field views-field-title counsilor-title\"><span class=\"field-content\">জনাব মোঃ সাবের আহম্মেদ</span></div>\r\n<div class=\"views-field views-field-field-phone phone_wrapper\"><span class=\"views-label views-label-field-phone\">Ph:&nbsp;</span><span class=\"field-content\">০১৭১১-৭৪৮১৫০</span></div>\r\n<div class=\"views-field views-field-field-ward counsilor-ward\"><span class=\"field-content\">১২ নং সরাইপাড়া</span></div>\r\n</li>\r\n<li class=\"views-row views-row-3 views-row-odd\">\r\n<div class=\"field-content councilor_image\"><span class=\"views-field views-field-field-profile-picture\"><img src=\"http://www.ccc.org.bd/sites/default/files/13.jpg\" alt=\"13\" width=\"90\" height=\"100\" /></span></div>\r\n<div class=\"views-field views-field-title counsilor-title\"><span class=\"field-content\">জনাব মোহাম্মদ হোসেন হিরণ</span></div>\r\n<div class=\"views-field views-field-field-phone phone_wrapper\"><span class=\"views-label views-label-field-phone\">Ph:&nbsp;</span><span class=\"field-content\">০১৬৭০-৩১৩১৩১</span></div>\r\n<div class=\"views-field views-field-field-ward counsilor-ward\"><span class=\"field-content\">১৩ নং পাহাড়তলী</span></div>\r\n</li>\r\n<li class=\"views-row views-row-4 views-row-even\">\r\n<div class=\"field-content councilor_image\"><span class=\"views-field views-field-field-profile-picture\"><img src=\"http://www.ccc.org.bd/sites/default/files/14.jpg\" alt=\"14\" width=\"90\" height=\"100\" /></span></div>\r\n<div class=\"views-field views-field-title counsilor-title\"><span class=\"field-content\">জনাব আবুল ফজল কবির আহমদ (মানিক)</span></div>\r\n<div class=\"views-field views-field-field-phone phone_wrapper\"><span class=\"views-label views-label-field-phone\">Ph:&nbsp;</span><span class=\"field-content\">০১৭১৭-৩৭৭৮০৯</span></div>\r\n<div class=\"views-field views-field-field-ward counsilor-ward\"><span class=\"field-content\">১৪ নং লালখান বাজার</span></div>\r\n</li>\r\n<li class=\"views-row views-row-5 views-row-odd\">\r\n<div class=\"field-content councilor_image\"><span class=\"views-field views-field-field-profile-picture\"><img src=\"http://www.ccc.org.bd/sites/default/files/15.jpg\" alt=\"15\" width=\"90\" height=\"100\" /></span></div>\r\n<div class=\"views-field views-field-title counsilor-title\"><span class=\"field-content\">জনাব মোঃ গিয়াস উদ্দিন</span></div>\r\n<div class=\"views-field views-field-field-phone phone_wrapper\"><span class=\"views-label views-label-field-phone\">Ph:&nbsp;</span><span class=\"field-content\">০১৭১৫-৩২১৮২০</span></div>\r\n<div class=\"views-field views-field-field-ward counsilor-ward\"><span class=\"field-content\">১৫ নং বাগমনিরাম</span></div>\r\n</li>\r\n<li class=\"views-row views-row-6 views-row-even\">\r\n<div class=\"field-content councilor_image\"><span class=\"views-field views-field-field-profile-picture\"><img src=\"http://www.ccc.org.bd/sites/default/files/16.jpg\" alt=\"16\" width=\"90\" height=\"100\" /></span></div>\r\n<div class=\"views-field views-field-title counsilor-title\"><span class=\"field-content\">জনাব সাইয়েদ গোলাম হায়দার মিন্টু</span></div>\r\n<div class=\"views-field views-field-field-phone phone_wrapper\"><span class=\"views-label views-label-field-phone\">Ph:&nbsp;</span><span class=\"field-content\">০১৭১১-১৬৪৪৪৭</span></div>\r\n<div class=\"views-field views-field-field-ward counsilor-ward\"><span class=\"field-content\">১৬ নং চকবাজার</span></div>\r\n</li>\r\n<li class=\"views-row views-row-7 views-row-odd\">\r\n<div class=\"field-content councilor_image\"><span class=\"views-field views-field-field-profile-picture\"><img src=\"http://www.ccc.org.bd/sites/default/files/17.jpg\" alt=\"17\" width=\"90\" height=\"100\" /></span></div>\r\n<div class=\"views-field views-field-title counsilor-title\"><span class=\"field-content\">জনাব এ কে এম জাফরুল ইসলাম</span></div>\r\n<div class=\"views-field views-field-field-phone phone_wrapper\"><span class=\"views-label views-label-field-phone\">Ph:&nbsp;</span><span class=\"field-content\">০১৮১৯-৬৪২৬৮৭</span></div>\r\n<div class=\"views-field views-field-field-ward counsilor-ward\"><span class=\"field-content\">১৭ নং পঃ বাকলিয়া</span></div>\r\n</li>\r\n<li class=\"views-row views-row-8 views-row-even\">\r\n<div class=\"field-content councilor_image\"><span class=\"views-field views-field-field-profile-picture\"><img src=\"http://www.ccc.org.bd/sites/default/files/18.jpg\" alt=\"18\" width=\"90\" height=\"100\" /></span></div>\r\n<div class=\"views-field views-field-title counsilor-title\"><span class=\"field-content\">জনাব হাজী মোঃ হারুন উর রশীদ</span></div>\r\n<div class=\"views-field views-field-field-phone phone_wrapper\"><span class=\"views-label views-label-field-phone\">Ph:&nbsp;</span><span class=\"field-content\">০১৮১৯-৩১৬৮৫৮</span></div>\r\n<div class=\"views-field views-field-field-ward counsilor-ward\"><span class=\"field-content\">১৮ নং পূর্ব বাকলিয়া</span></div>\r\n</li>\r\n<li class=\"views-row views-row-9 views-row-odd\">\r\n<div class=\"field-content councilor_image\"><span class=\"views-field views-field-field-profile-picture\"><img src=\"http://www.ccc.org.bd/sites/default/files/19.jpg\" alt=\"19\" width=\"90\" height=\"100\" /></span></div>\r\n<div class=\"views-field views-field-title counsilor-title\"><span class=\"field-content\">জনাব আলহাজ্ব মোহাং ইয়াছিন চৌধুরী (আছু)</span></div>\r\n<div class=\"views-field views-field-field-phone phone_wrapper\"><span class=\"views-label views-label-field-phone\">Ph:&nbsp;</span><span class=\"field-content\">০১৭১৮-২৭৬৬০৯</span></div>\r\n<div class=\"views-field views-field-field-ward counsilor-ward\"><span class=\"field-content\">১৯ নং দঃ বাকলিয়া</span></div>\r\n</li>\r\n<li class=\"views-row views-row-10 views-row-even views-row-last\">\r\n<div class=\"field-content councilor_image\"><span class=\"views-field views-field-field-profile-picture\"><img src=\"http://www.ccc.org.bd/sites/default/files/20.jpg\" alt=\"20\" width=\"90\" height=\"100\" /></span></div>\r\n<div class=\"views-field views-field-title counsilor-title\"><span class=\"field-content\">জনাব চৌধুরী হাসান মাহমুদ হাসনী</span></div>\r\n<div class=\"views-field views-field-field-phone phone_wrapper\"><span class=\"views-label views-label-field-phone\">Ph:&nbsp;</span><span class=\"field-content\">০১৮১৯-৩১৫৯০৬</span></div>\r\n<div class=\"views-field views-field-field-ward counsilor-ward\"><span class=\"field-content\">২০ নং দেওয়ান বাজার</span></div>\r\n</li>\r\n</ul>\r\n<div class=\"views-field views-field-field-ward counsilor-ward\">\r\n<div class=\"view-content\">\r\n<div class=\"item-list\">\r\n<ul>\r\n<li class=\"views-row views-row-1 views-row-odd views-row-first\">\r\n<div class=\"field-content councilor_image\"><span class=\"views-field views-field-field-profile-picture\"><img src=\"http://www.ccc.org.bd/sites/default/files/21.jpg\" alt=\"21\" width=\"90\" height=\"100\" /></span></div>\r\n<div class=\"views-field views-field-title counsilor-title\"><span class=\"field-content\">জনাব শৈবাল দাশ সুমন</span></div>\r\n<div class=\"views-field views-field-field-phone phone_wrapper\"><span class=\"views-label views-label-field-phone\">Ph:&nbsp;</span><span class=\"field-content\">০১৯১১-৮৮৫১৯৯</span></div>\r\n<div class=\"views-field views-field-field-ward counsilor-ward\"><span class=\"field-content\">২১ নং জামালখান</span></div>\r\n</li>\r\n<li class=\"views-row views-row-2 views-row-even\">\r\n<div class=\"field-content councilor_image\"><span class=\"views-field views-field-field-profile-picture\"><img src=\"http://www.ccc.org.bd/sites/default/files/22.jpg\" alt=\"22\" width=\"90\" height=\"100\" /></span></div>\r\n<div class=\"views-field views-field-title counsilor-title\"><span class=\"field-content\">জনাব মোহাম্মদ সলিম উল্লাহ</span></div>\r\n<div class=\"views-field views-field-field-phone phone_wrapper\"><span class=\"views-label views-label-field-phone\">Ph:&nbsp;</span><span class=\"field-content\">০১৮১৯-৩২৭৬৯২</span></div>\r\n<div class=\"views-field views-field-field-ward counsilor-ward\"><span class=\"field-content\">২২ নং এনায়েত বাজার</span></div>\r\n</li>\r\n<li class=\"views-row views-row-3 views-row-odd\">\r\n<div class=\"field-content councilor_image\"><span class=\"views-field views-field-field-profile-picture\"><img src=\"http://www.ccc.org.bd/sites/default/files/23.jpg\" alt=\"23\" width=\"90\" height=\"100\" /></span></div>\r\n<div class=\"views-field views-field-title counsilor-title\"><span class=\"field-content\">জনাব মোহাম্মদ জাবেদ</span></div>\r\n<div class=\"views-field views-field-field-phone phone_wrapper\"><span class=\"views-label views-label-field-phone\">Ph:&nbsp;</span><span class=\"field-content\">০১৮১৯-৩১৭৩০১</span></div>\r\n<div class=\"views-field views-field-field-ward counsilor-ward\"><span class=\"field-content\">২৩ নং উত্তর পাঠানটুলি</span></div>\r\n</li>\r\n<li class=\"views-row views-row-4 views-row-even\">\r\n<div class=\"field-content councilor_image\"><span class=\"views-field views-field-field-profile-picture\"><img src=\"http://www.ccc.org.bd/sites/default/files/24.jpg\" alt=\"24\" width=\"90\" height=\"100\" /></span></div>\r\n<div class=\"views-field views-field-title counsilor-title\"><span class=\"field-content\">জনাব নাজমুল হক (ডিউক)</span></div>\r\n<div class=\"views-field views-field-field-phone phone_wrapper\"><span class=\"views-label views-label-field-phone\">Ph:&nbsp;</span><span class=\"field-content\">০১৮১৯-৩১২৮০৯</span></div>\r\n<div class=\"views-field views-field-field-ward counsilor-ward\"><span class=\"field-content\">২৪ নং উত্তর আগ্রাবাদ</span></div>\r\n</li>\r\n<li class=\"views-row views-row-5 views-row-odd\">\r\n<div class=\"field-content councilor_image\"><span class=\"views-field views-field-field-profile-picture\"><img src=\"http://www.ccc.org.bd/sites/default/files/25.jpg\" alt=\"25\" width=\"90\" height=\"100\" /></span></div>\r\n<div class=\"views-field views-field-title counsilor-title\"><span class=\"field-content\">জনাব এস এম এরশাদ উল্লাহ</span></div>\r\n<div class=\"views-field views-field-field-phone phone_wrapper\"><span class=\"views-label views-label-field-phone\">Ph:&nbsp;</span><span class=\"field-content\">০১৭১৪-৪৮৮৭০০</span></div>\r\n<div class=\"views-field views-field-field-ward counsilor-ward\"><span class=\"field-content\">২৫ নং রামপুর</span></div>\r\n</li>\r\n<li class=\"views-row views-row-6 views-row-even\">\r\n<div class=\"field-content councilor_image\"><span class=\"views-field views-field-field-profile-picture\"><img src=\"http://www.ccc.org.bd/sites/default/files/26.jpg\" alt=\"26\" width=\"90\" height=\"100\" /></span></div>\r\n<div class=\"views-field views-field-title counsilor-title\"><span class=\"field-content\">জনাব মোঃ আবুল হাশেম</span></div>\r\n<div class=\"views-field views-field-field-phone phone_wrapper\"><span class=\"views-label views-label-field-phone\">Ph:&nbsp;</span><span class=\"field-content\">০১৮১৮-৬২৫৭৩১</span></div>\r\n<div class=\"views-field views-field-field-ward counsilor-ward\"><span class=\"field-content\">২৬ নং উত্তর হালিশহর</span></div>\r\n</li>\r\n<li class=\"views-row views-row-7 views-row-odd\">\r\n<div class=\"field-content councilor_image\"><span class=\"views-field views-field-field-profile-picture\"><img src=\"http://www.ccc.org.bd/sites/default/files/27.jpg\" alt=\"27\" width=\"90\" height=\"100\" /></span></div>\r\n<div class=\"views-field views-field-title counsilor-title\"><span class=\"field-content\">জনাব এইচ.এম. সোহেল</span></div>\r\n<div class=\"views-field views-field-field-phone phone_wrapper\"><span class=\"views-label views-label-field-phone\">Ph:&nbsp;</span><span class=\"field-content\">০১৮১৯-৩১১০৩১, ০১৭১১-৪৪৪০১৬</span></div>\r\n<div class=\"views-field views-field-field-ward counsilor-ward\"><span class=\"field-content\">২৭ নং দক্ষিণ আগ্রাবাদ</span></div>\r\n</li>\r\n<li class=\"views-row views-row-8 views-row-even\">\r\n<div class=\"field-content councilor_image\"><span class=\"views-field views-field-field-profile-picture\"><img src=\"http://www.ccc.org.bd/sites/default/files/28.jpg\" alt=\"28\" width=\"90\" height=\"100\" /></span></div>\r\n<div class=\"views-field views-field-title counsilor-title\"><span class=\"field-content\">জনাব মোঃ আবদুল কাদের</span></div>\r\n<div class=\"views-field views-field-field-phone phone_wrapper\"><span class=\"views-label views-label-field-phone\">Ph:&nbsp;</span><span class=\"field-content\">০১৮৫৯-৩৪৬৪৬২</span></div>\r\n<div class=\"views-field views-field-field-ward counsilor-ward\"><span class=\"field-content\">২৮ নং পাঠানটুলি</span></div>\r\n</li>\r\n<li class=\"views-row views-row-9 views-row-odd\">\r\n<div class=\"field-content councilor_image\"><span class=\"views-field views-field-field-profile-picture\"><img src=\"http://www.ccc.org.bd/sites/default/files/29.jpg\" alt=\"29\" width=\"90\" height=\"100\" /></span></div>\r\n<div class=\"views-field views-field-title counsilor-title\"><span class=\"field-content\">জনাব গোলাম মোহাম্মদ জোবায়ের</span></div>\r\n<div class=\"views-field views-field-field-phone phone_wrapper\"><span class=\"views-label views-label-field-phone\">Ph:&nbsp;</span><span class=\"field-content\">০১৭১১-৩০৮০৮২</span></div>\r\n<div class=\"views-field views-field-field-ward counsilor-ward\"><span class=\"field-content\">২৯ নং পঃ মাদারবাড়ী</span></div>\r\n</li>\r\n<li class=\"views-row views-row-10 views-row-even views-row-last\">\r\n<div class=\"field-content councilor_image\"><span class=\"views-field views-field-field-profile-picture\"><img src=\"http://www.ccc.org.bd/sites/default/files/30.jpg\" alt=\"30\" width=\"90\" height=\"100\" /></span></div>\r\n<div class=\"views-field views-field-title counsilor-title\"><span class=\"field-content\">জনাব মাজহারুল ইসলাম চৌধুরী</span></div>\r\n<div class=\"views-field views-field-field-phone phone_wrapper\"><span class=\"views-label views-label-field-phone\">Ph:&nbsp;</span><span class=\"field-content\">০১৭১১-৭৬২০০১</span></div>\r\n<div class=\"views-field views-field-field-ward counsilor-ward\"><span class=\"field-content\">৩০ নং পূর্ব মাদারবাড়ী</span></div>\r\n</li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>', NULL, '2019-12-21 00:20:10', '2019-12-21 00:20:10'),
(3, 5, 'সিটিজেন চার্টার', '<p>&nbsp;</p>\r\n<h3>সিটিজেন চার্টার</h3>\r\n<div>\r\n<p>&nbsp;</p>\r\n<table border=\"1\" width=\"1030\" cellspacing=\"0\" cellpadding=\"0\" align=\"left\">\r\n<tbody>\r\n<tr>\r\n<td colspan=\"5\">\r\n<p align=\"center\"><strong>সচিবালয় বিভাগ</strong></p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<p align=\"center\"><strong>ক্রমিক নং</strong></p>\r\n</td>\r\n<td>\r\n<p align=\"center\"><strong>প্রদত্ত সেবার বিবরণ</strong></p>\r\n</td>\r\n<td>\r\n<p align=\"center\"><strong>সম্পাদনের সময়সীমা</strong></p>\r\n</td>\r\n<td>\r\n<p align=\"center\"><strong>সেবা প্রদানকারী শাখাসমূহ</strong></p>\r\n</td>\r\n<td>\r\n<p align=\"center\"><strong>মন্তব্য</strong></p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<p>১</p>\r\n</td>\r\n<td>\r\n<p>স্থায়ী কর্মকর্তা/কর্মচারীদের মাসিক বেতন প্রস্ত্ততকরণ</p>\r\n</td>\r\n<td>\r\n<p align=\"center\">৭ দিনের মধ্যে</p>\r\n</td>\r\n<td>\r\n<p align=\"center\">সংস্থাপন শাখা</p>\r\n</td>\r\n<td>\r\n<p align=\"center\">&nbsp;</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<p>২</p>\r\n</td>\r\n<td>\r\n<p>কর্মকর্তা/ কর্মচারীদের আনুতোষিক, প্রভিডেন্ট ফান্ড, ১২ মাসের জমা ছুটির বেতন, বকেয়া বেতন, আবেদন পাওয়ার পর কর্তৃপক্ষ কর্তৃক অনুমোদনের প্রসত্মাবসহ নথি উপস্থাপন বিবেচ্যপত্র</p>\r\n</td>\r\n<td>\r\n<p align=\"center\">বিবেচ্যপত্র পাওয়ার সর্বোচ্চ ৩ দিনের মধ্যে প্রসত্মাবসহ নথি উপস্থাপন</p>\r\n</td>\r\n<td>\r\n<p align=\"center\">সংস্থাপন শাখা</p>\r\n</td>\r\n<td>\r\n<p align=\"center\">কতৃর্পক্ষের অনুমোদন &nbsp;সাপেক্ষে</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<p>৩</p>\r\n</td>\r\n<td>\r\n<p>কর্মকর্তা/কর্মচারীদের চিকিৎসা/অর্জিত/নৈমিত্তিক/ঐচ্ছিক ছুটি কর্তৃপক্ষ কর্তৃক অনুমোদনের ব্যবস্থাকরণ</p>\r\n</td>\r\n<td>\r\n<p align=\"center\">সর্বোচ্চ ৩ দিনের মধ্যে প্রসত্মাবসহ নথি উপস্থাপন</p>\r\n</td>\r\n<td>\r\n<p align=\"center\">সংস্থাপন শাখা</p>\r\n</td>\r\n<td>\r\n<p align=\"center\">কতৃর্পক্ষের অনুমোদন সাপেক্ষে</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<p>৪</p>\r\n</td>\r\n<td>\r\n<p>চুক্তিভিত্তিক/নির্ধারিত বেতন/দৈনিক ভিত্তিক র্কমর্কতা/র্কমচারী ও শ্রমিকদের মাসিক বেতন প্রস্ত্ততকরণ</p>\r\n</td>\r\n<td>\r\n<p align=\"center\">৫ দিনের মধ্যে বেতন বিল প্রসত্মুত করে উপস্থাপন</p>\r\n</td>\r\n<td>\r\n<p align=\"center\">সংস্থাপন শাখা</p>\r\n</td>\r\n<td>\r\n<p align=\"center\">&nbsp;</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<p>৫</p>\r\n</td>\r\n<td>\r\n<p>প্রত্যেক বিভাগ ও শাখার কর্মকর্তা/কর্মচারীদের হাজিরা পরির্দশন</p>\r\n</td>\r\n<td>\r\n<p align=\"center\">নির্ধারিত সময়ের মধ্যে</p>\r\n</td>\r\n<td>\r\n<p align=\"center\">সাধারণ শাখা</p>\r\n</td>\r\n<td>\r\n<p align=\"center\">&nbsp;</p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>', NULL, '2019-12-21 00:22:10', '2019-12-21 00:23:38');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `path` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `name`, `size`, `path`, `mime_type`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'ফয়\'স লেক', '1576907360_foyes_lake.jpg', 196825, 'images/1576907360_foyes_lake.jpg', 'image/jpeg', NULL, '2019-12-20 23:49:20', '2019-12-20 23:49:20'),
(2, 'জেলা প্রশাসকের কার্যালয় চট্টগ্রাম', '1576907416_9903970886_7e18420545_b (1).jpg', 110866, 'images/1576907416_9903970886_7e18420545_b (1).jpg', 'image/jpeg', NULL, '2019-12-20 23:50:16', '2019-12-20 23:50:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Palash Chakraborty', 'palash2406@gmail.com', NULL, '$2y$10$Ec/VYmR2atDfLCOymm5XLuxlTD8MlfA5r5tSblDaNNdwwLy4sZJBy', NULL, '2019-12-20 23:39:11', '2019-12-20 23:39:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attachments`
--
ALTER TABLE `attachments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attachments_menu_id_foreign` (`menu_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `files_attachment_id_foreign` (`attachment_id`);

--
-- Indexes for table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`),
  ADD KEY `links_attachment_id_foreign` (`attachment_id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menus_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pages_attachment_id_foreign` (`attachment_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attachments`
--
ALTER TABLE `attachments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attachments`
--
ALTER TABLE `attachments`
  ADD CONSTRAINT `attachments_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`);

--
-- Constraints for table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_attachment_id_foreign` FOREIGN KEY (`attachment_id`) REFERENCES `attachments` (`id`);

--
-- Constraints for table `links`
--
ALTER TABLE `links`
  ADD CONSTRAINT `links_attachment_id_foreign` FOREIGN KEY (`attachment_id`) REFERENCES `attachments` (`id`);

--
-- Constraints for table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `menus` (`id`);

--
-- Constraints for table `pages`
--
ALTER TABLE `pages`
  ADD CONSTRAINT `pages_attachment_id_foreign` FOREIGN KEY (`attachment_id`) REFERENCES `attachments` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
