-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 08, 2020 at 04:22 AM
-- Server version: 10.3.22-MariaDB-log-cll-lve
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digilokset_distributor`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `brand_description`, `brand_status`, `created_at`, `updated_at`) VALUES
(7, 'BBEL-PO-R', 'good company', 'active', '2019-10-19 22:30:32', '2019-10-19 22:30:32'),
(8, 'BPCNO-SP', 'good company', 'active', '2019-10-19 22:30:46', '2019-10-19 22:30:46'),
(9, 'BPADV-EXC', 'good company', 'active', '2019-10-19 22:31:10', '2019-10-19 22:31:10'),
(10, 'BPCNO-LP', 'good company', 'active', '2019-10-19 22:31:28', '2019-10-19 22:31:28'),
(11, 'IB FREE', 'good company', 'active', '2019-10-19 22:31:44', '2019-10-19 22:31:44'),
(12, 'JFB_LOTN', 'good company', 'active', '2019-10-19 22:31:58', '2019-10-19 22:31:58'),
(13, 'LIVON SLP', 'good company', 'active', '2019-10-19 22:33:42', '2019-10-19 22:33:42'),
(14, 'NHR_NHO_E', 'good company', 'active', '2019-10-19 22:34:17', '2019-10-19 22:34:17'),
(15, 'SW STLDEO', 'good company', 'active', '2019-10-19 22:34:53', '2019-10-19 22:34:53'),
(16, 'BPA-ALO-H', 'good company', 'active', '2019-10-19 22:35:09', '2019-10-19 22:35:09'),
(17, 'SW PKTDEO', 'good company', 'active', '2019-10-19 22:35:21', '2019-10-19 22:35:21'),
(18, 'H&C', 'good company', 'active', '2019-10-19 22:35:42', '2019-10-19 22:35:42'),
(19, 'PA-BDYLOT', 'good company', 'active', '2019-10-19 22:36:05', '2019-10-19 22:36:05'),
(20, 'BNHR-AMLA', 'good company', 'active', '2019-10-19 22:36:17', '2019-10-19 22:36:17'),
(21, 'BPA_PET_J', 'good company', 'active', '2019-10-19 22:37:02', '2019-10-19 22:37:02'),
(22, 'BHRC_CRCL', 'good company', 'active', '2019-10-19 22:37:15', '2019-10-19 22:37:15'),
(23, 'SW HRGEL', 'good company', 'active', '2019-10-19 22:37:26', '2019-10-19 22:37:26'),
(24, 'JFB_POWDR', 'good company', 'active', '2019-10-19 22:37:48', '2019-10-19 22:37:48'),
(25, 'SAFF ACTV', 'good company', 'active', '2019-10-19 22:38:09', '2019-10-19 22:38:09');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_29_095241_add_columns_to_the_user', 2),
(4, '2019_08_29_104241_add_column_to_the_user', 3),
(5, '2019_08_31_064926_add_columnd_to_the_users', 4),
(7, '2019_09_04_071027_create_product_categories_table', 6),
(8, '2019_09_03_085814_create_products_table', 7),
(9, '2019_09_08_111159_create_brands_table', 7),
(10, '2019_09_08_111230_create_taxes_table', 7),
(11, '2019_09_08_111252_create_units_table', 7),
(13, '2019_09_18_053820_creat_product_categories_table', 8),
(14, '2019_09_18_094407_add_columns_to_product_categories_table', 9),
(19, '2019_09_25_060107_create_stock_table', 12),
(20, '2019_09_25_053943_create_offer_tabel', 13),
(21, '2019_09_25_073556_add_column_offer_table', 14),
(22, '2019_10_02_041035_create_sales_table', 15),
(23, '2019_10_07_063736_create_warehouses_table', 16),
(24, '2019_10_07_065341_add_columns_sales_table', 17),
(25, '2019_10_07_095334_create_stock_offers_table', 18),
(35, '2019_10_22_082703_add_columns_product_category_table', 20),
(36, '2019_10_17_045744_create_sale_invoices_table', 21),
(37, '2019_10_22_050014_add_columns_sale_invoice', 21),
(38, '2019_10_22_092803_create_invoices_table', 21);

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `offer_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pieces` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `offer` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `brand_name`, `product_name`, `product_code`, `offer_type`, `start`, `end`, `pieces`, `offer`, `slug`, `created_at`, `updated_at`) VALUES
(51, 'BBEL-PO-R', 'P BELIPHOOL 100ml -144 (BD)', '710085', '%', '2019-10-22', '2019-10-17', '1', '1', '505835921', '2019-10-20 00:02:35', '2019-10-20 00:02:35'),
(52, 'BBEL-PO-R', 'P BELIPHOOL 400ml', '713088', 'TK', '2019-10-16', '2019-10-17', '1', '5', '505835921', '2019-10-20 00:02:35', '2019-10-20 00:02:35'),
(53, 'BBEL-PO-R', 'P BELIPHOOL 300ml x 48', '715230', 'Product', '2019-10-22', '2019-11-02', '1', 'P BELIPHOOL 100ml -144 (BD)(710085)', '505835921', '2019-10-20 00:02:35', '2019-10-20 00:02:35'),
(54, 'BBEL-PO-R', 'P BELIPHOOL 200ml', '711848', 'Not Set', 'Not Set', 'Not Set', 'Not Set', 'Not Set', '505835921', '2019-10-20 00:02:35', '2019-10-20 00:02:35'),
(55, 'BBEL-PO-R', 'P BELIPHOOL 38ml (BD)', '713046', 'Not Set', 'Not Set', 'Not Set', 'Not Set', 'Not Set', '505835921', '2019-10-20 00:02:35', '2019-10-20 00:02:35'),
(56, 'NHR_NHO_E', 'Nihar Seed Oil 200ml -BD', '716186', 'Not Set', 'Not Set', 'Not Set', 'Not Set', 'Not Set', NULL, '2019-10-21 00:04:51', '2019-10-21 00:04:51'),
(57, 'BPADV-EXC', 'PAEC 150ML (FR UPTAN SOAP 75G)', '716356', '%', '2019-10-22', '2019-11-02', '1', '1', '902722937', '2019-10-21 01:47:08', '2019-10-21 01:47:08'),
(58, 'BPADV-EXC', 'PAEC 300ML APPLICATOR', '714609', 'Not Set', 'Not Set', 'Not Set', 'Not Set', 'Not Set', '902722937', '2019-10-21 01:47:08', '2019-10-21 05:13:44');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_brand` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_measurement` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `selling_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `product_brand`, `product_code`, `product_name`, `unit_type`, `unit_measurement`, `unit`, `selling_price`, `purchase_price`, `product_status`, `created_at`, `updated_at`) VALUES
(11, 'BBEL-PO-R', '710085', 'P BELIPHOOL 100ml -144 (BD)', 'cartoon', '20', '1 Unit', '50', '42', 'active', '2019-10-19 22:48:31', '2019-10-22 02:43:49'),
(12, 'BPCNO-SP', '711289', 'PCNO 50ML FT (ATLO)', 'cartoon', '20', '1 Unit', '58', '98', 'active', '2019-10-19 22:48:57', '2019-10-22 02:43:24'),
(13, 'BBEL-PO-R', '713088', 'P BELIPHOOL 400ml', 'cartoon', '20', '1 Unit', '106', '98', 'active', '2019-10-19 22:49:30', '2019-10-22 02:43:12'),
(14, 'BBEL-PO-R', '715230', 'P BELIPHOOL 300ml x 48', 'box', '20', '1 Unit', '105', '98', 'active', '2019-10-19 22:51:55', '2019-10-22 02:42:55'),
(15, 'BPADV-EXC', '716356', 'PAEC 150ML (FR UPTAN SOAP 75G)', 'cartoon', '20', '1 Unit', '58', '65', 'active', '2019-10-19 22:52:31', '2019-10-22 02:42:42'),
(16, 'BPCNO-LP', '711343', 'PCNO 500ml FT (NMIDS)', 'cartoon', '20', '1 Unit', '65', '25', 'active', '2019-10-19 22:53:04', '2019-10-22 02:42:29'),
(17, 'IB FREE', '806456', 'UPTAN SOAP 75G', 'cartoon', '20', '1 Unit', '90', '85', 'active', '2019-10-19 22:56:02', '2019-10-22 02:42:17'),
(18, 'JFB_LOTN', '715166', 'JFB LOTION 100ML', 'cartoon', '20', '1 Unit', '75', '70', 'active', '2019-10-19 23:00:09', '2019-10-22 02:42:03'),
(19, 'BBEL-PO-R', '711848', 'P BELIPHOOL 200ml', 'cartoon', '20', '1 Unit', '65', '56', 'active', '2019-10-19 23:01:01', '2019-10-22 02:41:50'),
(20, 'LIVON SLP', '709795', 'LIVON SERUM 50ML-EXP', 'cartoon', '20', '1 Unit', '75', '69', 'active', '2019-10-19 23:01:45', '2019-10-22 02:41:38'),
(21, 'LIVON SLP', '709798', 'LIVON SERUM 20ML-EXP', 'cartoon', '20', '1 Unit', '98', '52', 'active', '2019-10-19 23:02:13', '2019-10-22 02:41:25'),
(22, 'NHR_NHO_E', '716186', 'Nihar Seed Oil 200ml -BD', 'cartoon', '20', '1 Unit', '90', '88', 'active', '2019-10-19 23:02:37', '2019-10-22 02:40:18'),
(23, 'BPADV-EXC', '714609', 'PAEC 300ML APPLICATOR', 'cartoon', '20', '1 Unit', '95', '88', 'active', '2019-10-19 23:03:03', '2019-10-22 02:40:04'),
(24, 'BPCNO-LP', '711340', 'PCNO 200ml FT (NMIDS)', 'cartoon', '20', '1 Unit', '88', '75', 'active', '2019-10-19 23:03:52', '2019-10-22 02:39:52'),
(25, 'BPCNO-LP', '715926', 'PCNO 350ML CO (50ML EXTRA)', 'cartoon', '20', '1 Unit', '75', '68', 'active', '2019-10-19 23:04:13', '2019-10-22 02:39:39'),
(26, 'BPCNO-SP', '711339', 'PCNO 100ml FT (NMIDS)', 'cartoon', '20', '1 Unit', '46', '45', 'active', '2019-10-19 23:04:48', '2019-10-22 02:39:25'),
(27, 'SW STLDEO', '711085', 'SW THRILL AVTR DEOSP 150ML-EXP', 'cartoon', '20', '1 Unit', '110', '100', 'active', '2019-10-19 23:05:16', '2019-10-22 02:39:15'),
(28, 'SW STLDEO', '711086', 'SW CHILL AVTR DEOSP 150ML-EXP', 'cartoon', '20', '1 Unit', '95', '92', 'active', '2019-10-19 23:05:45', '2019-10-22 02:39:04'),
(29, 'BPA-ALO-H', '713680', 'P ALOE VERA 250ML-(BD)', 'cartoon', '20', '1 Unit', '88', '85', 'active', '2019-10-19 23:06:18', '2019-10-22 02:38:56'),
(30, 'SW PKTDEO', '715429', 'SW PKT DEO ROCKSTAR 17ML EXP', 'cartoon', '20', '1 Unit', '80', '75', 'active', '2019-10-19 23:06:44', '2019-10-22 02:38:46'),
(31, 'BPA-ALO-H', '713681', 'P ALOE VERA 150ML-(BD)', 'cartoon', '20', '1 Unit', '90', '85', 'active', '2019-10-19 23:07:05', '2019-10-22 02:38:37'),
(32, 'H&C', '711749', 'H&C FRUIT OILS GREEN 200ML-EXP', 'cartoon', '20', '1 Unit', '76', '74', 'active', '2019-10-19 23:07:23', '2019-10-22 02:38:28'),
(33, 'BPCNO-LP', '714763', 'PCNO 350ml TIN', 'cartoon', '20', '1 Unit', '98', '95', 'active', '2019-10-19 23:07:57', '2019-10-22 02:38:19'),
(34, 'BPCNO-LP', '714764', 'PCNO 200ml TIN', 'cartoon', '20', '1 Unit', '955', '822.55', 'active', '2019-10-19 23:08:19', '2019-10-22 02:38:07'),
(35, 'PA-BDYLOT', '714292', 'PABL DN 80ML (FR WT 300ML BS)', 'cartoon', '20', '1 Unit', '80', '78', 'active', '2019-10-19 23:08:55', '2019-10-22 02:37:58'),
(36, 'PA-BDYLOT', '714293', 'PABL BS 300ML CO(FR 80ML DN)', 'cartoon', '20', '1 Unit', '60', '56', 'active', '2019-10-19 23:09:16', '2019-10-22 02:37:49'),
(37, 'BNHR-AMLA', '707936', 'NIHAR SHANTI BDM AMLA 200ML-N', 'cartoon', '20', '1 Unit', '90', '80', 'active', '2019-10-19 23:09:42', '2019-10-22 02:37:39'),
(38, 'PA-BDYLOT', '714294', 'PABL DN 80ML (FR WT 300ML DN)', 'cartoon', '20', '1 Unit', '56', '45', 'active', '2019-10-19 23:10:11', '2019-10-22 02:37:29'),
(39, 'PA-BDYLOT', '714295', 'PABL DN 300ML CO(FR 80ML DN)', 'cartoon', '20', '1 Unit', '23', '20', 'active', '2019-10-19 23:10:27', '2019-10-22 02:37:20'),
(40, 'BPA_PET_J', '714557', 'PJ 50ML FG', 'cartoon', '20', '1 Unit', '950', '901', 'active', '2019-10-19 23:10:45', '2019-10-22 02:37:10'),
(41, 'BHRC_CRCL', '711882', 'Hair Code Creme 40gm', 'cartoon', '20', '1 Unit', '100', '80', 'active', '2019-10-19 23:11:08', '2019-10-22 02:36:59'),
(42, 'BPCNO-LP', '711383', 'PCNO 500ml EJ (New)', 'cartoon', '20', '1 Unit', '1000', '914', 'active', '2019-10-19 23:11:25', '2019-10-22 02:36:48'),
(43, 'SW HRGEL', '706646', 'SW HrGel Cool 100ml Tube-EXP', 'cartoon', '20', '1 Unit', '108', '95', 'active', '2019-10-19 23:11:48', '2019-10-22 02:36:37'),
(44, 'SW PKTDEO', '715427', 'SW PKT DEO AVIATOR 17ML EXP', 'cartoon', '20', '1 Unit', '250', '241', 'active', '2019-10-19 23:12:15', '2019-10-22 02:36:27'),
(45, 'JFB_POWDR', '716308', 'JFB TALCUM POWDER 100G', 'cartoon', '20', '1 Unit', '80', '70', 'active', '2019-10-19 23:12:36', '2019-10-22 02:36:17'),
(46, 'JFB_LOTN', '715164', 'JFB LOTION 200ML', 'cartoon', '20', '1 Unit', '100', '90', 'active', '2019-10-19 23:12:57', '2019-10-22 02:36:07'),
(47, 'SAFF ACTV', '716635', 'SAFF ACTIVE 5 LTR NEW-BD', 'cartoon', '20', '1 Unit', '60', '50', 'active', '2019-10-19 23:13:17', '2019-10-22 02:35:57'),
(48, 'SAFF ACTV', '716636', 'SAFF ACTIVE 4 LTR NEW-BD', 'cartoon', '20', '1 Unit', '123', '80', 'active', '2019-10-19 23:13:32', '2019-10-22 02:35:46'),
(49, 'BBEL-PO-R', '713046', 'P BELIPHOOL 38ml (BD)', 'cartoon', '20', '1 Unit', '120', '100', 'active', '2019-10-19 23:13:55', '2019-10-22 02:33:31');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `auth_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `upload_file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `auth_id`, `name`, `email`, `phone`, `nid`, `upload_file`, `message`, `created_at`, `updated_at`) VALUES
(16, '6', 'rodoshi zaman', 'rodoshi@gmail.com', '01836362798', '13131313131361', '1571283592.xlsx', 'another test', '2019-10-16 21:39:52', '2019-10-16 21:39:52'),
(17, '1', 'rijwan chowdhury', 'rijwanc007@gmail.com', NULL, NULL, '1579949191.xlsx', 'lkjlkjlj', '2020-01-25 15:46:31', '2020-01-25 15:46:31');

-- --------------------------------------------------------

--
-- Table structure for table `sale_invoices`
--

CREATE TABLE `sale_invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sale_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `selling_rates` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sales_qty` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `offer_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_offer` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sale_invoices`
--

INSERT INTO `sale_invoices` (`id`, `sale_id`, `brand_name`, `product_code`, `product_name`, `selling_rates`, `sales_qty`, `offer_type`, `total_offer`, `created_at`, `updated_at`) VALUES
(1, '17', 'BBEL-PO-R', '710085', 'P BELIPHOOL 100ml -144 (BD)', '61', '99', '%', NULL, '2019-10-22 03:39:12', '2019-10-22 03:39:20'),
(2, '17', 'BPCNO-SP', '711289', 'PCNO 50ML FT (ATLO)', '28', '168', 'Not Set', NULL, '2019-10-22 03:39:12', '2019-10-22 03:39:20'),
(3, '17', 'BBEL-PO-R', '713088', 'P BELIPHOOL 400ml', '229', '21', 'TK', NULL, '2019-10-22 03:39:12', '2019-10-22 03:39:20'),
(4, '17', 'BBEL-PO-R', '715230', 'P BELIPHOOL 300ml x 48', '173.001', '70', 'Product', NULL, '2019-10-22 03:39:12', '2019-10-22 03:39:20'),
(5, '17', 'BPADV-EXC', '716356', 'PAEC 150ML (FR UPTAN SOAP 75G)', '124', '36', '%', NULL, '2019-10-22 03:39:12', '2019-10-22 03:39:20'),
(6, '17', 'BPCNO-LP', '711343', 'PCNO 500ml FT (NMIDS)', '258', '38', 'Not Set', NULL, '2019-10-22 03:39:12', '2019-10-22 03:39:20'),
(7, '17', 'IB FREE', '806456', 'UPTAN SOAP 75G', '0', '0', 'Not Set', NULL, '2019-10-22 03:39:12', '2019-10-22 03:39:12'),
(8, '17', 'JFB_LOTN', '715166', 'JFB LOTION 100ML', '116.5', '9', 'Not Set', NULL, '2019-10-22 03:39:12', '2019-10-22 03:39:20'),
(9, '17', 'BBEL-PO-R', '711848', 'P BELIPHOOL 200ml', '121', '259', 'Not Set', NULL, '2019-10-22 03:39:12', '2019-10-22 03:39:20'),
(10, '17', 'LIVON SLP', '709795', 'LIVON SERUM 50ML-EXP', '172', '1', 'Not Set', NULL, '2019-10-22 03:39:12', '2019-10-22 03:39:12'),
(11, '17', 'LIVON SLP', '709798', 'LIVON SERUM 20ML-EXP', '80', '3', 'Not Set', NULL, '2019-10-22 03:39:12', '2019-10-22 03:39:13'),
(12, '17', 'NHR_NHO_E', '716186', 'Nihar Seed Oil 200ml -BD', '176', '7', 'Not Set', NULL, '2019-10-22 03:39:12', '2019-10-22 03:39:20'),
(13, '17', 'BPADV-EXC', '714609', 'PAEC 300ML APPLICATOR', '233', '17', 'Not Set', NULL, '2019-10-22 03:39:12', '2019-10-22 03:39:19'),
(14, '17', 'BPCNO-LP', '711340', 'PCNO 200ml FT (NMIDS)', '110.5', '392', 'Not Set', NULL, '2019-10-22 03:39:12', '2019-10-22 03:39:20'),
(15, '17', 'BPCNO-LP', '715926', 'PCNO 350ML CO (50ML EXTRA)', '193', '78', 'Not Set', NULL, '2019-10-22 03:39:13', '2019-10-22 03:39:20'),
(16, '17', 'BPCNO-SP', '711339', 'PCNO 100ml FT (NMIDS)', '65', '135', 'Not Set', NULL, '2019-10-22 03:39:13', '2019-10-22 03:39:19'),
(17, '17', 'SW STLDEO', '711085', 'SW THRILL AVTR DEOSP 150ML-EXP', '209.9995', '6', 'Not Set', NULL, '2019-10-22 03:39:14', '2019-10-22 03:39:17'),
(18, '17', 'SW STLDEO', '711086', 'SW CHILL AVTR DEOSP 150ML-EXP', '209.9995', '3', 'Not Set', NULL, '2019-10-22 03:39:14', '2019-10-22 03:39:14'),
(19, '17', 'BPA-ALO-H', '713680', 'P ALOE VERA 250ML-(BD)', '171', '6', 'Not Set', NULL, '2019-10-22 03:39:14', '2019-10-22 03:39:17'),
(20, '17', 'SW PKTDEO', '715429', 'SW PKT DEO ROCKSTAR 17ML EXP', '80', '9', 'Not Set', NULL, '2019-10-22 03:39:14', '2019-10-22 03:39:18'),
(21, '17', 'BPA-ALO-H', '713681', 'P ALOE VERA 150ML-(BD)', '105', '2', 'Not Set', NULL, '2019-10-22 03:39:14', '2019-10-22 03:39:14'),
(22, '17', 'H&C', '711749', 'H&C FRUIT OILS GREEN 200ML-EXP', '152', '8', 'Not Set', NULL, '2019-10-22 03:39:14', '2019-10-22 03:39:19'),
(23, '17', 'BPCNO-LP', '714763', 'PCNO 350ml TIN', '184', '6', 'Not Set', NULL, '2019-10-22 03:39:14', '2019-10-22 03:39:16'),
(24, '17', 'BPCNO-LP', '714764', 'PCNO 200ml TIN', '111', '40', 'Not Set', NULL, '2019-10-22 03:39:14', '2019-10-22 03:39:18'),
(25, '17', 'PA-BDYLOT', '714292', 'PABL DN 80ML (FR WT 300ML BS)', '0', '0', 'Not Set', NULL, '2019-10-22 03:39:15', '2019-10-22 03:39:15'),
(26, '17', 'PA-BDYLOT', '714293', 'PABL BS 300ML CO(FR 80ML DN)', '269', '4', 'Not Set', NULL, '2019-10-22 03:39:15', '2019-10-22 03:39:15'),
(27, '17', 'BNHR-AMLA', '707936', 'NIHAR SHANTI BDM AMLA 200ML-N', '127', '6', 'Not Set', NULL, '2019-10-22 03:39:16', '2019-10-22 03:39:16'),
(28, '17', 'PA-BDYLOT', '714294', 'PABL DN 80ML (FR WT 300ML DN)', '0', '0', 'Not Set', NULL, '2019-10-22 03:39:16', '2019-10-22 03:39:16'),
(29, '17', 'PA-BDYLOT', '714295', 'PABL DN 300ML CO(FR 80ML DN)', '232', '4', 'Not Set', NULL, '2019-10-22 03:39:16', '2019-10-22 03:39:16'),
(30, '17', 'BPA_PET_J', '714557', 'PJ 50ML FG', '42', '48', 'Not Set', NULL, '2019-10-22 03:39:16', '2019-10-22 03:39:16'),
(31, '17', 'BHRC_CRCL', '711882', 'Hair Code Creme 40gm', '31', '6', 'Not Set', NULL, '2019-10-22 03:39:16', '2019-10-22 03:39:16'),
(32, '17', 'BPCNO-LP', '711383', 'PCNO 500ml EJ (New)', '258', '4', 'Not Set', NULL, '2019-10-22 03:39:16', '2019-10-22 03:39:16'),
(33, '17', 'SW HRGEL', '706646', 'SW HrGel Cool 100ml Tube-EXP', '120', '3', 'Not Set', NULL, '2019-10-22 03:39:17', '2019-10-22 03:39:17'),
(34, '17', 'SW PKTDEO', '715427', 'SW PKT DEO AVIATOR 17ML EXP', '80', '3', 'Not Set', NULL, '2019-10-22 03:39:17', '2019-10-22 03:39:17'),
(35, '17', 'JFB_POWDR', '716308', 'JFB TALCUM POWDER 100G', '88', '3', 'Not Set', NULL, '2019-10-22 03:39:17', '2019-10-22 03:39:17'),
(36, '17', 'JFB_LOTN', '715164', 'JFB LOTION 200ML', '208.33', '1', 'Not Set', NULL, '2019-10-22 03:39:17', '2019-10-22 03:39:17'),
(37, '17', 'SAFF ACTV', '716635', 'SAFF ACTIVE 5 LTR NEW-BD', '859', '4', 'Not Set', NULL, '2019-10-22 03:39:19', '2019-10-22 03:39:19'),
(38, '17', 'SAFF ACTV', '716636', 'SAFF ACTIVE 4 LTR NEW-BD', '695', '4', 'Not Set', NULL, '2019-10-22 03:39:19', '2019-10-22 03:39:19'),
(39, '17', 'BBEL-PO-R', '713046', 'P BELIPHOOL 38ml (BD)', '18', '12', 'Not Set', NULL, '2019-10-22 03:39:20', '2019-10-22 03:39:20');

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_measurement` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock_measurement` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `selling_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `store_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `brand_name`, `product_name`, `product_code`, `unit_type`, `unit_measurement`, `unit`, `stock_measurement`, `purchase_price`, `selling_price`, `store_date`, `slug`, `created_at`, `updated_at`) VALUES
(29, 'BBEL-PO-R', '[\"P BELIPHOOL 100ml -144 (BD)\",\"P BELIPHOOL 400ml\",\"P BELIPHOOL 300ml x 48\",\"P BELIPHOOL 200ml\",\"P BELIPHOOL 38ml (BD)\"]', '[\"710085\",\"713088\",\"715230\",\"711848\",\"713046\"]', '[\"cartoon\",\"cartoon\",\"box\",\"cartoon\",\"cartoon\"]', '[\"20\",\"20\",\"20\",\"20\",\"20\"]', '[\"1 Unit\",\"1 Unit\",\"1 Unit\",\"1 Unit\",\"1 Unit\"]', '[\"50000\",\"50000\",\"50000\",\"50000\",\"50000\"]', '[\"50\",\"220\",\"170\",\"115\",\"10\"]', '[\"61\",\"229\",\"173.001\",\"121\",\"18\"]', '2019-10-25', '505835921', '2019-10-20 00:02:35', '2019-10-20 00:02:35'),
(30, 'BPADV-EXC', '[\"PAEC 150ML (FR UPTAN SOAP 75G)\",\"PAEC 300ML APPLICATOR\"]', '[\"716356\",\"714609\"]', '[\"cartoon\",\"cartoon\"]', '[\"20\",\"20\"]', '[\"1 Unit\",\"1 Unit\"]', '[\"50000\",\"50000\"]', '[\"222\",\"222\"]', '[\"555\",\"2200\"]', '2019-10-22', '902722937', '2019-10-21 01:47:08', '2019-10-21 01:47:08');

-- --------------------------------------------------------

--
-- Table structure for table `stock_offers`
--

CREATE TABLE `stock_offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `offer_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pieces` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `offer` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stock_offers`
--

INSERT INTO `stock_offers` (`id`, `brand_name`, `product_name`, `product_code`, `offer_type`, `start`, `end`, `pieces`, `offer`, `slug`, `created_at`, `updated_at`) VALUES
(13, 'BBEL-PO-R', 'P BELIPHOOL 100ml -144 (BD)', '710085', '%', '2019-10-22', '2019-10-17', '1', '1', '505835921', '2019-10-20 00:02:35', '2019-10-20 00:02:35'),
(14, 'BBEL-PO-R', 'P BELIPHOOL 400ml', '713088', 'TK', '2019-10-16', '2019-10-17', '1', '5', '505835921', '2019-10-20 00:02:35', '2019-10-20 00:02:35'),
(15, 'BBEL-PO-R', 'P BELIPHOOL 300ml x 48', '715230', 'Product', '2019-10-22', '2019-11-02', '1', 'P BELIPHOOL 100ml -144 (BD)(710085)', '505835921', '2019-10-20 00:02:35', '2019-10-20 00:02:35'),
(16, 'BBEL-PO-R', 'P BELIPHOOL 200ml', '711848', 'Not Set', 'Not Set', 'Not Set', 'Not Set', 'Not Set', '505835921', '2019-10-20 00:02:35', '2019-10-20 00:02:35'),
(17, 'BBEL-PO-R', 'P BELIPHOOL 38ml (BD)', '713046', 'Not Set', 'Not Set', 'Not Set', 'Not Set', 'Not Set', '505835921', '2019-10-20 00:02:35', '2019-10-20 00:02:35'),
(18, 'BPADV-EXC', 'PAEC 150ML (FR UPTAN SOAP 75G)', '716356', '%', '2019-10-22', '2019-11-02', '1', '1', '902722937', '2019-10-21 01:47:08', '2019-10-21 01:47:08'),
(19, 'BPADV-EXC', 'PAEC 300ML APPLICATOR', '714609', 'Product', '2019-10-23', '2019-10-25', '1', 'PAEC 300ML APPLICATOR(714609)', '902722937', '2019-10-21 01:47:08', '2019-10-21 01:47:08');

-- --------------------------------------------------------

--
-- Table structure for table `taxes`
--

CREATE TABLE `taxes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tax_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_value` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taxes`
--

INSERT INTO `taxes` (`id`, `tax_title`, `tax_value`, `tax_status`, `created_at`, `updated_at`) VALUES
(1, 'vat', '5%', 'active', '2019-10-06 22:59:47', '2019-10-06 22:59:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `first_name`, `last_name`, `gender`, `image`, `email`, `phone`, `nid`, `address`, `position`, `category`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'faruk alamin', 'faruk', 'alamin', 'male', '1575370090.jpg', 'faruk@gmail.com', '01913315151', '0123456214856', '135/1 matikata,dhaka-1206', 'email_marketer', 'employee', 'test', NULL, '$2y$10$i1DqeI4BpGvBraVUaIOwx.M7SsZdH2nMq1/XtT7A4Geh.QZGXZ5gm', NULL, '2019-09-01 05:15:37', '2019-12-03 15:48:10'),
(7, 'faruk zaman', 'faruk', 'zaman', 'male', '1567336721.png', 'zaman@gmail.com', '01836362798', '1234567896', '135/1 matikata,dhaka-1206', 'email_marketer', 'vendor', 'test', NULL, '$2y$10$gQsyVmAdeelKKt.adtBsdO85vCMO6lVYzcYCjpEJ0mdqlCcChrPA2', NULL, '2019-09-01 05:18:41', '2019-09-02 03:49:15'),
(9, 'nadim hridoy', 'nadim', 'hridoy', 'male', '1567490826.png', 'nadim@gmail.com', '01836362798', '12345678963256789', '135/1 matikata,dhaka-1206', 'software engineer', 'distributor', 'test', NULL, '$2y$10$uWUUz/RYBuAF58SvWbvo6OxuVEGMUneCtquym8ZuwTKnXYtx2CiC6', NULL, '2019-09-02 04:52:06', '2020-02-17 10:24:32');

-- --------------------------------------------------------

--
-- Table structure for table `warehouses`
--

CREATE TABLE `warehouses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_availability` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `warehouses`
--

INSERT INTO `warehouses` (`id`, `brand_name`, `product_name`, `product_code`, `product_availability`, `created_at`, `updated_at`) VALUES
(6, 'BBEL-PO-R', 'P BELIPHOOL 100ml -144 (BD)', '710085', '50000', '2019-10-20 00:02:35', '2019-10-20 00:02:35'),
(7, 'BBEL-PO-R', 'P BELIPHOOL 400ml', '713088', '50000', '2019-10-20 00:02:35', '2019-10-20 00:02:35'),
(8, 'BBEL-PO-R', 'P BELIPHOOL 300ml x 48', '715230', '50000', '2019-10-20 00:02:35', '2019-10-20 00:02:35'),
(9, 'BBEL-PO-R', 'P BELIPHOOL 200ml', '711848', '50000', '2019-10-20 00:02:35', '2019-10-20 00:02:35'),
(10, 'BBEL-PO-R', 'P BELIPHOOL 38ml (BD)', '713046', '50000', '2019-10-20 00:02:35', '2019-10-20 00:02:35'),
(11, 'BPADV-EXC', 'PAEC 150ML (FR UPTAN SOAP 75G)', '716356', '50000', '2019-10-21 01:47:08', '2019-10-21 01:47:08'),
(12, 'BPADV-EXC', 'PAEC 300ML APPLICATOR', '714609', '50000', '2019-10-21 01:47:08', '2019-10-21 01:47:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_invoices`
--
ALTER TABLE `sale_invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_offers`
--
ALTER TABLE `stock_offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taxes`
--
ALTER TABLE `taxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `warehouses`
--
ALTER TABLE `warehouses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `sale_invoices`
--
ALTER TABLE `sale_invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `stock_offers`
--
ALTER TABLE `stock_offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `taxes`
--
ALTER TABLE `taxes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `warehouses`
--
ALTER TABLE `warehouses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
