-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2023 at 04:55 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dishnet`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_bill_collections`
--

CREATE TABLE `admin_bill_collections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sp_id` varchar(255) DEFAULT NULL,
  `package_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `collection` int(11) NOT NULL DEFAULT 0,
  `due` int(11) NOT NULL DEFAULT 0,
  `cash_handover` int(11) NOT NULL DEFAULT 0,
  `date` date DEFAULT NULL,
  `explanation` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_bill_collections`
--

INSERT INTO `admin_bill_collections` (`id`, `sp_id`, `package_id`, `collection`, `due`, `cash_handover`, `date`, `explanation`, `created_at`, `updated_at`) VALUES
(1, 'sp-02', 1, 1000, 0, 1000, '2023-01-29', 'paid', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_packages`
--

CREATE TABLE `admin_packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `package_id` varchar(255) DEFAULT NULL,
  `package_name` varchar(255) DEFAULT NULL,
  `package_description` text DEFAULT NULL,
  `price` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_packages`
--

INSERT INTO `admin_packages` (`id`, `package_id`, `package_name`, `package_description`, `price`, `status`, `created_at`, `updated_at`) VALUES
(1, 'pk1', 'Monthly Package', 'Per month package. 250 channel', 1000, 1, '2023-01-29 04:09:04', '2023-01-29 04:14:52'),
(2, 'pk2', '3 Monthly Package', '3 Monthly Package', 2400, 1, '2023-01-29 04:15:36', '2023-01-29 04:15:36'),
(3, 'pk3', '6 Monthly', '6 Monthly', 3600, 1, '2023-01-29 04:16:12', '2023-01-29 04:16:12'),
(4, 'pk4', 'Yearly', 'Yearly Package', 6000, 1, '2023-01-29 04:16:40', '2023-01-29 04:16:40');

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sp_id` varchar(255) NOT NULL,
  `area_id` varchar(255) DEFAULT NULL,
  `area_name` varchar(255) DEFAULT NULL,
  `area_description` text DEFAULT NULL,
  `area_code` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`id`, `sp_id`, `area_id`, `area_name`, `area_description`, `area_code`, `status`, `created_at`, `updated_at`) VALUES
(1, 'sp-02', 'sp-02ar1', 'Jatrabari', 'Jatrabari Area', 'NaN', 1, '2023-01-25 23:53:39', '2023-01-25 23:53:39'),
(2, 'sp-02', 'sp-02ar2', 'Uttara', 'Uttara All Sector', '1230', 1, '2023-01-25 23:54:28', '2023-01-25 23:54:28'),
(3, 'sp-02', 'sp-02ar3', 'Savar', 'Savar Area', 'NaN', 1, '2023-01-25 23:54:58', '2023-01-25 23:54:58'),
(4, 'sp-02', 'sp-02ar4', 'Mirpur', 'Mirpur all label', 'NaN', 1, '2023-01-25 23:55:30', '2023-01-25 23:55:30'),
(5, 'sp-02', 'sp-02ar5', 'Palton', 'Palton area', 'NaN', 1, '2023-01-25 23:55:54', '2023-01-25 23:55:54'),
(6, 'sp-02', 'sp-02ar6', 'Dhanmondi', 'Dhanmondi Area', 'NaN', 1, '2023-01-25 23:56:24', '2023-01-25 23:56:24'),
(7, 'sp-01', 'sp-01ar7', 'Dhanmondi', 'Dhanmondi 10', 'NaN', 1, '2023-01-26 00:54:09', '2023-01-26 00:54:09'),
(8, 'sp-01', 'sp-01ar8', 'Palton', 'Palton Area', 'NaN', 1, '2023-01-26 00:54:50', '2023-01-26 00:54:50'),
(9, 'sp-01', 'sp-01ar9', 'Mirpur', 'Mirpur area', 'NaN', 1, '2023-01-26 00:55:29', '2023-01-26 00:55:29'),
(10, 'sp-01', 'sp-01ar10', 'Savar', 'Savar Area', 'NaN', 1, '2023-01-26 00:55:54', '2023-01-26 00:55:54');

-- --------------------------------------------------------

--
-- Table structure for table `area_locations`
--

CREATE TABLE `area_locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sp_id` varchar(255) NOT NULL,
  `area_location_id` varchar(255) DEFAULT NULL,
  `area` varchar(255) DEFAULT NULL,
  `area_location_name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `area_location_code` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `area_locations`
--

INSERT INTO `area_locations` (`id`, `sp_id`, `area_location_id`, `area`, `area_location_name`, `description`, `area_location_code`, `status`, `created_at`, `updated_at`) VALUES
(1, 'sp-02', 'area-loc-1', 'sp-02ar1', 'Jatrabari Police Station', 'Jatrabari Police Station Area', 'NaN', 1, '2023-01-25 23:57:22', '2023-01-25 23:57:22'),
(2, 'sp-02', 'area-loc-2', 'sp-02ar1', 'Jatrabar Mirhajirbag', 'Jatrabar Mirhajirbag area', 'NaN', 1, '2023-01-25 23:58:29', '2023-01-25 23:58:29'),
(3, 'sp-02', 'area-loc-3', 'sp-02ar1', 'Retina Jatrabari', 'Retina Jatrabari area', 'NaN', 1, '2023-01-25 23:59:00', '2023-01-25 23:59:00'),
(4, 'sp-02', 'area-loc-4', 'sp-02ar1', 'Dholpur Road', 'Dholpur Road area', 'NaN', 1, '2023-01-25 23:59:36', '2023-01-25 23:59:36'),
(5, 'sp-02', 'area-loc-5', 'sp-02ar2', 'Sectot 1', 'Sector  1 area', 'NaN', 1, '2023-01-26 00:00:14', '2023-01-26 00:00:14'),
(6, 'sp-02', 'area-loc-6', 'sp-02ar2', 'Uttara sector 2', 'Uttara sector 2 area', 'NaN', 1, '2023-01-26 00:01:48', '2023-01-26 00:01:48'),
(7, 'sp-02', 'area-loc-7', 'sp-02ar3', 'Jainabari', 'Jainabari', 'NaN', 1, '2023-01-26 00:03:06', '2023-01-26 00:03:06'),
(8, 'sp-02', 'area-loc-8', 'sp-02ar3', 'Radio Colony', 'Radio Colony', 'NaN', 1, '2023-01-26 00:04:57', '2023-01-26 00:04:57'),
(9, 'sp-02', 'area-loc-9', 'sp-02ar4', 'Mirpur 1', 'Mirpur 1 area', 'NaN', 1, '2023-01-26 00:05:31', '2023-01-26 00:05:31'),
(10, 'sp-02', 'area-loc-10', 'sp-02ar4', 'Mirpur 10', 'Mirpur 10 ara', 'NaN', 1, '2023-01-26 00:06:04', '2023-01-26 00:06:04'),
(11, 'sp-02', 'area-loc-11', 'sp-02ar4', 'Mirpur 11', 'Mirpur 11 area', 'NaN', 1, '2023-01-26 00:06:31', '2023-01-26 00:06:31'),
(12, 'sp-02', 'area-loc-12', 'sp-02ar4', 'Mirpur 12', 'Mirpur 12 area', 'NaN', 1, '2023-01-26 00:06:51', '2023-01-26 00:06:51'),
(13, 'sp-02', 'area-loc-13', 'sp-02ar5', 'Palton 1', 'Palton 1', 'NaN', 1, '2023-01-26 00:07:13', '2023-01-26 00:07:13'),
(14, 'sp-02', 'area-loc-14', 'sp-02ar5', 'Palton 2', 'Palton 2 area', 'NaN', 1, '2023-01-26 00:07:29', '2023-01-26 00:07:29'),
(15, 'sp-02', 'area-loc-15', 'sp-02ar6', 'Dhanmondi 3', 'Dhanmondi 1 area', 'NaN', 1, '2023-01-26 00:07:57', '2023-01-26 00:56:33'),
(16, 'sp-02', 'area-loc-16', 'sp-02ar6', 'Dhanmondi 1', 'Dhanmondi 1 area', 'NaN', 1, '2023-01-26 00:07:58', '2023-01-26 00:07:58'),
(17, 'sp-02', 'area-loc-17', 'sp-02ar6', 'Dhanmondi 2', 'Dhanmondi 2 Area', 'NaN', 1, '2023-01-26 00:08:19', '2023-01-26 00:08:19'),
(18, 'sp-01', 'area-loc-18', 'sp-01ar7', 'Dhanmondi 4', 'Dhanmondi 4 area', 'NaN', 1, '2023-01-26 00:56:57', '2023-01-26 00:56:57'),
(19, 'sp-01', 'area-loc-19', 'sp-01ar7', 'Dhanmondi 5', 'Dhanmondi 5 area', 'NaN', 1, '2023-01-26 00:57:23', '2023-01-26 00:57:23'),
(20, 'sp-01', 'area-loc-20', 'sp-01ar8', 'Palton 3', 'Palton 3 area', 'NaN', 1, '2023-01-26 00:58:00', '2023-01-26 00:58:00'),
(21, 'sp-01', 'area-loc-21', 'sp-01ar8', 'Palton 4', 'Palton 4 Area', 'NaN', 1, '2023-01-26 00:58:22', '2023-01-26 00:58:22'),
(22, 'sp-01', 'area-loc-22', 'sp-01ar9', 'Mirpur 2', 'Mirpur 2 area', 'NaN', 1, '2023-01-26 01:00:10', '2023-01-26 01:00:10'),
(23, 'sp-01', 'area-loc-23', 'sp-01ar9', 'Mirpur 4', 'Mirpur 4', 'NaN', 1, '2023-01-26 01:00:28', '2023-01-26 01:00:28'),
(24, 'sp-01', 'area-loc-24', 'sp-01ar10', 'Saver 1', 'Saver 1 area', 'NaN', 1, '2023-01-26 01:01:20', '2023-01-26 01:01:20'),
(25, 'sp-01', 'area-loc-25', 'sp-01ar10', 'Saver 2', 'Saver 2 area', 'NaN', 1, '2023-01-26 01:01:37', '2023-01-26 01:01:37');

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bill_id` varchar(255) NOT NULL,
  `sp_id` varchar(255) NOT NULL,
  `em_id` varchar(255) DEFAULT NULL,
  `customer_id` varchar(255) NOT NULL,
  `month` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `service_charge` int(11) NOT NULL DEFAULT 0,
  `paid_amount` int(11) NOT NULL,
  `payment_date` date DEFAULT NULL,
  `payment_method` tinyint(4) NOT NULL DEFAULT 0,
  `payment_status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `bill_id`, `sp_id`, `em_id`, `customer_id`, `month`, `year`, `service_charge`, `paid_amount`, `payment_date`, `payment_method`, `payment_status`, `created_at`, `updated_at`) VALUES
(1, 'bill1sp-02', 'sp-02', NULL, 'sp-02c1', 'January', '2023', 0, 120, NULL, 0, 0, '2023-01-26 00:31:51', '2023-01-26 00:31:51'),
(2, 'bill2sp-02', 'sp-02', NULL, 'sp-02c2', 'January', '2023', 0, 120, NULL, 0, 0, '2023-01-26 00:31:51', '2023-01-26 00:31:51'),
(3, 'bill3sp-02', 'sp-02', NULL, 'sp-02c3', 'January', '2023', 0, 600, NULL, 0, 0, '2023-01-26 00:31:51', '2023-01-26 00:31:51'),
(4, 'bill4sp-02', 'sp-02', NULL, 'sp-02c4', 'January', '2023', 0, 600, '2023-01-26', 1, 1, '2023-01-26 00:31:51', '2023-01-26 02:19:58'),
(5, 'bill5sp-02', 'sp-02', NULL, 'sp-02c5', 'January', '2023', 0, 600, NULL, 0, 0, '2023-01-26 00:31:51', '2023-01-26 00:31:51'),
(6, 'bill6sp-02', 'sp-02', NULL, 'sp-02c6', 'January', '2023', 0, 1000, NULL, 0, 0, '2023-01-26 00:31:51', '2023-01-26 00:31:51'),
(7, 'bill7sp-02', 'sp-02', NULL, 'sp-02c7', 'January', '2023', 0, 120, NULL, 0, 0, '2023-01-26 00:31:51', '2023-01-26 00:31:51'),
(8, 'bill8sp-02', 'sp-02', NULL, 'sp-02c8', 'January', '2023', 0, 120, NULL, 0, 0, '2023-01-26 00:31:51', '2023-01-26 00:31:51'),
(9, 'bill9sp-02', 'sp-02', NULL, 'sp-02c9', 'January', '2023', 0, 1000, NULL, 0, 0, '2023-01-26 00:31:51', '2023-01-26 00:31:51'),
(10, 'bill10sp-02', 'sp-02', NULL, 'sp-02c1', 'December', '2022', 0, 120, NULL, 0, 0, '2023-01-26 00:45:16', '2023-01-26 00:45:16'),
(11, 'bill11sp-02', 'sp-02', NULL, 'sp-02c2', 'December', '2022', 0, 120, NULL, 0, 0, '2023-01-26 00:45:16', '2023-01-26 00:45:16'),
(12, 'bill12sp-02', 'sp-02', NULL, 'sp-02c3', 'December', '2022', 0, 600, NULL, 0, 0, '2023-01-26 00:45:16', '2023-01-26 00:45:16'),
(13, 'bill13sp-02', 'sp-02', NULL, 'sp-02c4', 'December', '2022', 0, 600, NULL, 0, 0, '2023-01-26 00:45:16', '2023-01-26 00:45:16'),
(14, 'bill14sp-02', 'sp-02', NULL, 'sp-02c5', 'December', '2022', 0, 600, NULL, 0, 0, '2023-01-26 00:45:16', '2023-01-26 00:45:16'),
(15, 'bill15sp-02', 'sp-02', NULL, 'sp-02c6', 'December', '2022', 0, 1000, NULL, 0, 0, '2023-01-26 00:45:16', '2023-01-26 00:45:16'),
(16, 'bill16sp-02', 'sp-02', NULL, 'sp-02c7', 'December', '2022', 0, 120, NULL, 0, 0, '2023-01-26 00:45:16', '2023-01-26 00:45:16'),
(17, 'bill17sp-02', 'sp-02', NULL, 'sp-02c8', 'December', '2022', 0, 120, NULL, 0, 0, '2023-01-26 00:45:16', '2023-01-26 00:45:16'),
(18, 'bill18sp-02', 'sp-02', NULL, 'sp-02c9', 'December', '2022', 0, 1000, NULL, 0, 0, '2023-01-26 00:45:16', '2023-01-26 00:45:16'),
(19, 'bill19sp-02', 'sp-02', NULL, 'sp-02c1', 'November', '2022', 0, 120, NULL, 0, 0, '2023-01-26 00:45:45', '2023-01-26 00:45:45'),
(20, 'bill20sp-02', 'sp-02', NULL, 'sp-02c2', 'November', '2022', 0, 120, NULL, 0, 0, '2023-01-26 00:45:45', '2023-01-26 00:45:45'),
(21, 'bill21sp-02', 'sp-02', NULL, 'sp-02c3', 'November', '2022', 0, 600, NULL, 0, 0, '2023-01-26 00:45:45', '2023-01-26 00:45:45'),
(22, 'bill22sp-02', 'sp-02', NULL, 'sp-02c4', 'November', '2022', 0, 600, NULL, 0, 0, '2023-01-26 00:45:45', '2023-01-26 00:45:45'),
(23, 'bill23sp-02', 'sp-02', NULL, 'sp-02c5', 'November', '2022', 0, 600, NULL, 0, 0, '2023-01-26 00:45:45', '2023-01-26 00:45:45'),
(24, 'bill24sp-02', 'sp-02', NULL, 'sp-02c6', 'November', '2022', 0, 1000, NULL, 0, 0, '2023-01-26 00:45:45', '2023-01-26 00:45:45'),
(25, 'bill25sp-02', 'sp-02', NULL, 'sp-02c7', 'November', '2022', 0, 120, NULL, 0, 0, '2023-01-26 00:45:45', '2023-01-26 00:45:45'),
(26, 'bill26sp-02', 'sp-02', NULL, 'sp-02c8', 'November', '2022', 0, 120, NULL, 0, 0, '2023-01-26 00:45:45', '2023-01-26 00:45:45'),
(27, 'bill27sp-02', 'sp-02', NULL, 'sp-02c9', 'November', '2022', 0, 1000, NULL, 0, 0, '2023-01-26 00:45:45', '2023-01-26 00:45:45'),
(28, 'bill28sp-02', 'sp-02', NULL, 'sp-02c1', 'October', '2022', 0, 120, NULL, 0, 0, '2023-01-26 00:46:16', '2023-01-26 00:46:16'),
(29, 'bill29sp-02', 'sp-02', NULL, 'sp-02c2', 'October', '2022', 0, 120, NULL, 0, 0, '2023-01-26 00:46:16', '2023-01-26 00:46:16'),
(30, 'bill30sp-02', 'sp-02', NULL, 'sp-02c3', 'October', '2022', 0, 600, NULL, 0, 0, '2023-01-26 00:46:16', '2023-01-26 00:46:16'),
(31, 'bill31sp-02', 'sp-02', NULL, 'sp-02c4', 'October', '2022', 0, 600, NULL, 0, 0, '2023-01-26 00:46:16', '2023-01-26 00:46:16'),
(32, 'bill32sp-02', 'sp-02', NULL, 'sp-02c5', 'October', '2022', 0, 600, NULL, 0, 0, '2023-01-26 00:46:16', '2023-01-26 00:46:16'),
(33, 'bill33sp-02', 'sp-02', NULL, 'sp-02c6', 'October', '2022', 0, 1000, NULL, 0, 0, '2023-01-26 00:46:16', '2023-01-26 00:46:16'),
(34, 'bill34sp-02', 'sp-02', NULL, 'sp-02c7', 'October', '2022', 0, 120, NULL, 0, 0, '2023-01-26 00:46:16', '2023-01-26 00:46:16'),
(35, 'bill35sp-02', 'sp-02', NULL, 'sp-02c8', 'October', '2022', 0, 120, NULL, 0, 0, '2023-01-26 00:46:16', '2023-01-26 00:46:16'),
(36, 'bill36sp-02', 'sp-02', NULL, 'sp-02c9', 'October', '2022', 0, 1000, NULL, 0, 0, '2023-01-26 00:46:16', '2023-01-26 00:46:16'),
(37, 'bill37sp-01', 'sp-01', NULL, 'sp-01c10', 'January', '2023', 0, 250, NULL, 0, 0, '2023-01-26 01:09:48', '2023-01-26 01:09:48'),
(38, 'bill38sp-01', 'sp-01', NULL, 'sp-01c11', 'January', '2023', 0, 150, NULL, 0, 0, '2023-01-26 01:09:48', '2023-01-26 01:09:48'),
(39, 'bill39sp-01', 'sp-01', NULL, 'sp-01c12', 'January', '2023', 0, 150, NULL, 0, 0, '2023-01-26 01:09:48', '2023-01-26 01:09:48'),
(40, 'bill40sp-01', 'sp-01', NULL, 'sp-01c13', 'January', '2023', 0, 250, NULL, 0, 0, '2023-01-26 01:09:48', '2023-01-26 01:09:48'),
(41, 'bill41sp-01', 'sp-01', NULL, 'sp-01c10', 'October', '2022', 0, 250, NULL, 0, 0, '2023-01-26 01:10:19', '2023-01-26 01:10:19'),
(42, 'bill42sp-01', 'sp-01', NULL, 'sp-01c11', 'October', '2022', 0, 150, NULL, 0, 0, '2023-01-26 01:10:19', '2023-01-26 01:10:19'),
(43, 'bill43sp-01', 'sp-01', NULL, 'sp-01c12', 'October', '2022', 0, 150, NULL, 0, 0, '2023-01-26 01:10:19', '2023-01-26 01:10:19'),
(44, 'bill44sp-01', 'sp-01', NULL, 'sp-01c13', 'October', '2022', 0, 250, NULL, 0, 0, '2023-01-26 01:10:19', '2023-01-26 01:10:19'),
(45, 'bill45sp-01', 'sp-01', NULL, 'sp-01c10', 'November', '2022', 0, 250, NULL, 0, 0, '2023-01-26 01:10:44', '2023-01-26 01:10:44'),
(46, 'bill46sp-01', 'sp-01', NULL, 'sp-01c11', 'November', '2022', 0, 150, NULL, 0, 0, '2023-01-26 01:10:44', '2023-01-26 01:10:44'),
(47, 'bill47sp-01', 'sp-01', NULL, 'sp-01c12', 'November', '2022', 0, 150, NULL, 0, 0, '2023-01-26 01:10:44', '2023-01-26 01:10:44'),
(48, 'bill48sp-01', 'sp-01', NULL, 'sp-01c13', 'November', '2022', 0, 250, NULL, 0, 0, '2023-01-26 01:10:44', '2023-01-26 01:10:44'),
(49, 'bill49sp-01', 'sp-01', NULL, 'sp-01c10', 'December', '2022', 0, 250, NULL, 0, 0, '2023-01-26 01:11:00', '2023-01-26 01:11:00'),
(50, 'bill50sp-01', 'sp-01', NULL, 'sp-01c11', 'December', '2022', 0, 150, NULL, 0, 0, '2023-01-26 01:11:00', '2023-01-26 01:11:00'),
(51, 'bill51sp-01', 'sp-01', NULL, 'sp-01c12', 'December', '2022', 0, 150, NULL, 0, 0, '2023-01-26 01:11:00', '2023-01-26 01:11:00'),
(52, 'bill52sp-01', 'sp-01', NULL, 'sp-01c13', 'December', '2022', 0, 250, NULL, 0, 0, '2023-01-26 01:11:00', '2023-01-26 01:11:00');

-- --------------------------------------------------------

--
-- Table structure for table `collections`
--

CREATE TABLE `collections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sp_id` varchar(255) DEFAULT NULL,
  `employee_id` varchar(255) DEFAULT NULL,
  `collection` int(11) NOT NULL DEFAULT 0,
  `due` int(11) NOT NULL DEFAULT 0,
  `cash_handover` int(11) NOT NULL DEFAULT 0,
  `date` date DEFAULT NULL,
  `explanation` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sp_id` varchar(255) NOT NULL,
  `employee_id` varchar(255) DEFAULT NULL,
  `area_id` varchar(255) DEFAULT NULL,
  `customer_id` varchar(255) NOT NULL,
  `complain` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`id`, `sp_id`, `employee_id`, `area_id`, `customer_id`, `complain`, `status`, `created_at`, `updated_at`) VALUES
(1, 'sp-02', NULL, 'ar1sp4', 'sp4c6', 'Net Jay R Ase', 0, '2023-01-30 04:32:20', '2023-01-30 04:32:20');

-- --------------------------------------------------------

--
-- Table structure for table `costs`
--

CREATE TABLE `costs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sp_id` varchar(255) DEFAULT NULL,
  `employee_id` varchar(255) DEFAULT NULL,
  `cost_details` varchar(255) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `is_Accept` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sp_id` varchar(255) NOT NULL,
  `customer_id` varchar(255) DEFAULT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `cell_number` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `profession` varchar(255) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `nid` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `package_id` varchar(255) DEFAULT NULL,
  `area_id` varchar(255) DEFAULT NULL,
  `area_loc_id` varchar(255) DEFAULT NULL,
  `isAccept` tinyint(4) NOT NULL DEFAULT 0,
  `fcm_token` varchar(255) NOT NULL DEFAULT '12345677889787dsfsdkhfsdkjfgsgfbsnfb',
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `sp_id`, `customer_id`, `customer_name`, `cell_number`, `email`, `profession`, `dob`, `nid`, `image`, `password`, `address`, `package_id`, `area_id`, `area_loc_id`, `isAccept`, `fcm_token`, `status`, `created_at`, `updated_at`) VALUES
(1, 'sp-02', 'sp-02c1', 'Rakib', '01766053807', NULL, NULL, NULL, NULL, NULL, '$2y$10$s/Zftlgu67qbAPc.Sz8vbO3gpuzNZnTaV6VwnlqkoCVoUh67QsIY6', 'Dhaka', 'sp-02pk1', 'sp-02ar1', 'area-loc-2', 1, '12345677889787dsfsdkhfsdkjfgsgfbsnfb', 1, '2023-01-26 00:11:25', '2023-01-26 00:11:25'),
(2, 'sp-02', 'sp-02c2', 'Sumon', '01766053808', NULL, NULL, NULL, NULL, NULL, '$2y$10$qSkK5aeEFMSAKJbezAHKkegXP7b./Fkw6kWCc0HeoZIcFm3I.hxvS', 'Dhaka', 'sp-02pk1', 'sp-02ar3', 'area-loc-8', 1, '12345677889787dsfsdkhfsdkjfgsgfbsnfb', 1, '2023-01-26 00:12:03', '2023-01-26 00:12:03'),
(3, 'sp-02', 'sp-02c3', 'Faruq', '01766053809', NULL, NULL, NULL, NULL, NULL, '$2y$10$zf2L2rUigH.2k/lWH6rSW.GHdvdTm2ViAzRkK2WIaQDlZxWajcMiy', 'Dhaka', 'sp-02pk2', 'sp-02ar4', 'area-loc-10', 1, '12345677889787dsfsdkhfsdkjfgsgfbsnfb', 1, '2023-01-26 00:12:37', '2023-01-26 00:12:37'),
(4, 'sp-02', 'sp-02c4', 'Soykot', '01766053810', NULL, NULL, NULL, NULL, NULL, '$2y$10$eN3gisi9T68tsDxcTjejdeqPYNL5X631/xBelvDAgCrITfKaJDQTG', 'Dhaka', 'sp-02pk2', 'sp-02ar5', 'area-loc-14', 1, '12345677889787dsfsdkhfsdkjfgsgfbsnfb', 1, '2023-01-26 00:13:11', '2023-01-26 00:13:11'),
(5, 'sp-02', 'sp-02c5', 'Hasib', '01766053811', NULL, NULL, NULL, NULL, NULL, '$2y$10$hAt7xKjrnZEYOKFpOzWG7.eiZexEf5iXaDvnNS507e7q7FgF1FGVG', 'Dhaka', 'sp-02pk1', 'sp-02ar6', 'area-loc-15', 1, '12345677889787dsfsdkhfsdkjfgsgfbsnfb', 1, '2023-01-26 00:13:36', '2023-01-30 03:47:15'),
(6, 'sp-02', 'sp-02c6', 'Minhaz', '01766053812', NULL, NULL, NULL, NULL, NULL, '$2y$10$cjfW7ia2OUuitKzqpuCRvehd7jcl/Icq22pFsKIOm6oDs7erimWNe', 'Dhaka', 'sp-02pk3', 'sp-02ar3', 'area-loc-7', 1, '12345677889787dsfsdkhfsdkjfgsgfbsnfb', 1, '2023-01-26 00:14:11', '2023-01-26 00:14:11'),
(7, 'sp-02', 'sp-02c7', 'Pavez', '01766053813', NULL, NULL, NULL, NULL, NULL, '$2y$10$hLeBzCb5SHw4kdCmwt5V8eB1zrW/OArtQLacLguz5wih9DdLbTRp2', 'Dhaka', 'sp-02pk1', 'sp-02ar1', 'area-loc-2', 1, '12345677889787dsfsdkhfsdkjfgsgfbsnfb', 1, '2023-01-26 00:14:39', '2023-01-26 00:14:39'),
(8, 'sp-02', 'sp-02c8', 'Sanjid', '01766053814', NULL, NULL, NULL, NULL, NULL, '$2y$10$1ZYp91zhqgRH6cSCzd99HOfPgxr4pP6Nm8dWLTGv8SxJdcnI5nwde', 'Dhaka', 'sp-02pk1', 'sp-02ar3', 'area-loc-8', 1, '12345677889787dsfsdkhfsdkjfgsgfbsnfb', 1, '2023-01-26 00:15:01', '2023-01-26 00:15:01'),
(9, 'sp-02', 'sp-02c9', 'Nur Jahan', '01766053815', NULL, NULL, NULL, NULL, NULL, '$2y$10$c1Uf4j63WtY546wRyZE6se0D47rIXf3DsgCLmE9IGZ9NbiLHxPYI2', 'Dhaka', 'sp-02pk3', 'sp-02ar4', 'area-loc-10', 1, '12345677889787dsfsdkhfsdkjfgsgfbsnfb', 1, '2023-01-26 00:15:53', '2023-01-26 00:15:53'),
(10, 'sp-01', 'sp-01c10', 'Nironjon', '017105289105', NULL, NULL, NULL, NULL, NULL, '$2y$10$AV4mUgi1983T9tuFrkwWd.hpb7uHTo7.GiuXS4YYDvhl2GqP4KRjm', 'Dhaka', 'sp-01pk5', 'sp-01ar10', 'area-loc-25', 1, 'amar sona bangla', 1, '2023-01-26 01:04:18', '2023-01-26 01:29:48'),
(11, 'sp-01', 'sp-01c11', 'Sadman', '01710528106', NULL, NULL, NULL, NULL, NULL, '$2y$10$9bmeYDSuGZSXRhBypmVNIeVRXsTt.oa5coG4bUVshF6.GCID3c8BS', 'Dhaka', 'sp-01pk4', 'sp-01ar7', 'area-loc-18', 1, '12345677889787dsfsdkhfsdkjfgsgfbsnfb', 1, '2023-01-26 01:04:53', '2023-01-26 01:04:53'),
(12, 'sp-01', 'sp-01c12', 'Mahib', '01710528107', NULL, NULL, NULL, NULL, NULL, '$2y$10$EVYPS1S694hxFlgW4xb7JupmxvTnP0bymZtu61eNbTbB7GskO1jnm', 'Dhaka', 'sp-01pk4', 'sp-01ar7', 'area-loc-18', 1, '12345677889787dsfsdkhfsdkjfgsgfbsnfb', 1, '2023-01-26 01:05:17', '2023-01-26 01:05:17'),
(13, 'sp-01', 'sp-01c13', 'Mursed', '01710528108', NULL, NULL, NULL, NULL, NULL, '$2y$10$.Js4NOUlUNNfeIo1oIw2Ke2PBV87MSnvHQuRya4Hbv.pfCuRLfjLW', 'Dhaka', 'sp-01pk5', 'sp-01ar8', 'area-loc-21', 1, '12345677889787dsfsdkhfsdkjfgsgfbsnfb', 1, '2023-01-26 01:05:46', '2023-01-26 01:05:46');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `bn_name` varchar(255) DEFAULT NULL,
  `lat` varchar(255) DEFAULT NULL,
  `lon` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `division_id`, `name`, `bn_name`, `lat`, `lon`, `url`, `created_at`, `updated_at`) VALUES
(1, 1, 'Comilla', 'কুমিল্লা', '23.4682747', '91.1788135', 'www.comilla.gov.bd', NULL, NULL),
(2, 1, 'Feni', 'ফেনী', '23.023231', '91.3840844', 'www.feni.gov.bd', NULL, NULL),
(3, 1, 'Brahmanbaria', 'ব্রাহ্মণবাড়িয়া', '23.9570904', '91.1119286', 'www.brahmanbaria.gov.bd', NULL, NULL),
(4, 1, 'Rangamati', 'রাঙ্গামাটি', NULL, NULL, 'www.rangamati.gov.bd', NULL, NULL),
(5, 1, 'Noakhali', 'নোয়াখালী', '22.869563', '91.099398', 'www.noakhali.gov.bd', NULL, NULL),
(6, 1, 'Chandpur', 'চাঁদপুর', '23.2332585', '90.6712912', 'www.chandpur.gov.bd', NULL, NULL),
(7, 1, 'Lakshmipur', 'লক্ষ্মীপুর', '22.942477', '90.841184', 'www.lakshmipur.gov.bd', NULL, NULL),
(8, 1, 'Chattogram', 'চট্টগ্রাম', '22.335109', '91.834073', 'www.chittagong.gov.bd', NULL, NULL),
(9, 1, 'Coxsbazar', 'কক্সবাজার', NULL, NULL, 'www.coxsbazar.gov.bd', NULL, NULL),
(10, 1, 'Khagrachhari', 'খাগড়াছড়ি', '23.119285', '91.984663', 'www.khagrachhari.gov.bd', NULL, NULL),
(11, 1, 'Bandarban', 'বান্দরবান', '22.1953275', '92.2183773', 'www.bandarban.gov.bd', NULL, NULL),
(12, 2, 'Sirajganj', 'সিরাজগঞ্জ', '24.4533978', '89.7006815', 'www.sirajganj.gov.bd', NULL, NULL),
(13, 2, 'Pabna', 'পাবনা', '23.998524', '89.233645', 'www.pabna.gov.bd', NULL, NULL),
(14, 2, 'Bogura', 'বগুড়া', '24.8465228', '89.377755', 'www.bogra.gov.bd', NULL, NULL),
(15, 2, 'Rajshahi', 'রাজশাহী', NULL, NULL, 'www.rajshahi.gov.bd', NULL, NULL),
(16, 2, 'Natore', 'নাটোর', '24.420556', '89.000282', 'www.natore.gov.bd', NULL, NULL),
(17, 2, 'Joypurhat', 'জয়পুরহাট', NULL, NULL, 'www.joypurhat.gov.bd', NULL, NULL),
(18, 2, 'Chapainawabganj', 'চাঁপাইনবাবগঞ্জ', '24.5965034', '88.2775122', 'www.chapainawabganj.gov.bd', NULL, NULL),
(19, 2, 'Naogaon', 'নওগাঁ', NULL, NULL, 'www.naogaon.gov.bd', NULL, NULL),
(20, 3, 'Jashore', 'যশোর', '23.16643', '89.2081126', 'www.jessore.gov.bd', NULL, NULL),
(21, 3, 'Satkhira', 'সাতক্ষীরা', NULL, NULL, 'www.satkhira.gov.bd', NULL, NULL),
(22, 3, 'Meherpur', 'মেহেরপুর', '23.762213', '88.631821', 'www.meherpur.gov.bd', NULL, NULL),
(23, 3, 'Narail', 'নড়াইল', '23.172534', '89.512672', 'www.narail.gov.bd', NULL, NULL),
(24, 3, 'Chuadanga', 'চুয়াডাঙ্গা', '23.6401961', '88.841841', 'www.chuadanga.gov.bd', NULL, NULL),
(25, 3, 'Kushtia', 'কুষ্টিয়া', '23.901258', '89.120482', 'www.kushtia.gov.bd', NULL, NULL),
(26, 3, 'Magura', 'মাগুরা', '23.487337', '89.419956', 'www.magura.gov.bd', NULL, NULL),
(27, 3, 'Khulna', 'খুলনা', '22.815774', '89.568679', 'www.khulna.gov.bd', NULL, NULL),
(28, 3, 'Bagerhat', 'বাগেরহাট', '22.651568', '89.785938', 'www.bagerhat.gov.bd', NULL, NULL),
(29, 3, 'Jhenaidah', 'ঝিনাইদহ', '23.5448176', '89.1539213', 'www.jhenaidah.gov.bd', NULL, NULL),
(30, 4, 'Jhalakathi', 'ঝালকাঠি', NULL, NULL, 'www.jhalakathi.gov.bd', NULL, NULL),
(31, 4, 'Patuakhali', 'পটুয়াখালী', '22.3596316', '90.3298712', 'www.patuakhali.gov.bd', NULL, NULL),
(32, 4, 'Pirojpur', 'পিরোজপুর', NULL, NULL, 'www.pirojpur.gov.bd', NULL, NULL),
(33, 4, 'Barisal', 'বরিশাল', NULL, NULL, 'www.barisal.gov.bd', NULL, NULL),
(34, 4, 'Bhola', 'ভোলা', '22.685923', '90.648179', 'www.bhola.gov.bd', NULL, NULL),
(35, 4, 'Barguna', 'বরগুনা', NULL, NULL, 'www.barguna.gov.bd', NULL, NULL),
(36, 5, 'Sylhet', 'সিলেট', '24.8897956', '91.8697894', 'www.sylhet.gov.bd', NULL, NULL),
(37, 5, 'Moulvibazar', 'মৌলভীবাজার', '24.482934', '91.777417', 'www.moulvibazar.gov.bd', NULL, NULL),
(38, 5, 'Habiganj', 'হবিগঞ্জ', '24.374945', '91.41553', 'www.habiganj.gov.bd', NULL, NULL),
(39, 5, 'Sunamganj', 'সুনামগঞ্জ', '25.0658042', '91.3950115', 'www.sunamganj.gov.bd', NULL, NULL),
(40, 6, 'Narsingdi', 'নরসিংদী', '23.932233', '90.71541', 'www.narsingdi.gov.bd', NULL, NULL),
(41, 6, 'Gazipur', 'গাজীপুর', '24.0022858', '90.4264283', 'www.gazipur.gov.bd', NULL, NULL),
(42, 6, 'Shariatpur', 'শরীয়তপুর', NULL, NULL, 'www.shariatpur.gov.bd', NULL, NULL),
(43, 6, 'Narayanganj', 'নারায়ণগঞ্জ', '23.63366', '90.496482', 'www.narayanganj.gov.bd', NULL, NULL),
(44, 6, 'Tangail', 'টাঙ্গাইল', NULL, NULL, 'www.tangail.gov.bd', NULL, NULL),
(45, 6, 'Kishoreganj', 'কিশোরগঞ্জ', '24.444937', '90.776575', 'www.kishoreganj.gov.bd', NULL, NULL),
(46, 6, 'Manikganj', 'মানিকগঞ্জ', NULL, NULL, 'www.manikganj.gov.bd', NULL, NULL),
(47, 6, 'Dhaka', 'ঢাকা', '23.7115253', '90.4111451', 'www.dhaka.gov.bd', NULL, NULL),
(48, 6, 'Munshiganj', 'মুন্সিগঞ্জ', NULL, NULL, 'www.munshiganj.gov.bd', NULL, NULL),
(49, 6, 'Rajbari', 'রাজবাড়ী', '23.7574305', '89.6444665', 'www.rajbari.gov.bd', NULL, NULL),
(50, 6, 'Madaripur', 'মাদারীপুর', '23.164102', '90.1896805', 'www.madaripur.gov.bd', NULL, NULL),
(51, 6, 'Gopalganj', 'গোপালগঞ্জ', '23.0050857', '89.8266059', 'www.gopalganj.gov.bd', NULL, NULL),
(52, 6, 'Faridpur', 'ফরিদপুর', '23.6070822', '89.8429406', 'www.faridpur.gov.bd', NULL, NULL),
(53, 7, 'Panchagarh', 'পঞ্চগড়', '26.3411', '88.5541606', 'www.panchagarh.gov.bd', NULL, NULL),
(54, 7, 'Dinajpur', 'দিনাজপুর', '25.6217061', '88.6354504', 'www.dinajpur.gov.bd', NULL, NULL),
(55, 7, 'Lalmonirhat', 'লালমনিরহাট', NULL, NULL, 'www.lalmonirhat.gov.bd', NULL, NULL),
(56, 7, 'Nilphamari', 'নীলফামারী', '25.931794', '88.856006', 'www.nilphamari.gov.bd', NULL, NULL),
(57, 7, 'Gaibandha', 'গাইবান্ধা', '25.328751', '89.528088', 'www.gaibandha.gov.bd', NULL, NULL),
(58, 7, 'Thakurgaon', 'ঠাকুরগাঁও', '26.0336945', '88.4616834', 'www.thakurgaon.gov.bd', NULL, NULL),
(59, 7, 'Rangpur', 'রংপুর', '25.7558096', '89.244462', 'www.rangpur.gov.bd', NULL, NULL),
(60, 7, 'Kurigram', 'কুড়িগ্রাম', '25.805445', '89.636174', 'www.kurigram.gov.bd', NULL, NULL),
(61, 8, 'Sherpur', 'শেরপুর', '25.0204933', '90.0152966', 'www.sherpur.gov.bd', NULL, NULL),
(62, 8, 'Mymensingh', 'ময়মনসিংহ', NULL, NULL, 'www.mymensingh.gov.bd', NULL, NULL),
(63, 8, 'Jamalpur', 'জামালপুর', '24.937533', '89.937775', 'www.jamalpur.gov.bd', NULL, NULL),
(64, 8, 'Netrokona', 'নেত্রকোণা', '24.870955', '90.727887', 'www.netrokona.gov.bd', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `bn_name` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `bn_name`, `url`, `created_at`, `updated_at`) VALUES
(1, 'Chattagram', 'চট্টগ্রাম', 'www.chittagongdiv.gov.bd', NULL, NULL),
(2, 'Rajshahi', 'রাজশাহী', 'www.rajshahidiv.gov.bd', NULL, NULL),
(3, 'Khulna', 'খুলনা', 'www.khulnadiv.gov.bd', NULL, NULL),
(4, 'Barisal', 'বরিশাল', 'www.barisaldiv.gov.bd', NULL, NULL),
(5, 'Sylhet', 'সিলেট', 'www.sylhetdiv.gov.bd', NULL, NULL),
(6, 'Dhaka', 'ঢাকা', 'www.dhakadiv.gov.bd', NULL, NULL),
(7, 'Rangpur', 'রংপুর', 'www.rangpurdiv.gov.bd', NULL, NULL),
(8, 'Mymensingh', 'ময়মনসিংহ', 'www.mymensinghdiv.gov.bd', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `forgot_pin_o_t_p_s`
--

CREATE TABLE `forgot_pin_o_t_p_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` varchar(255) NOT NULL,
  `otp` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sp_id` varchar(255) DEFAULT NULL,
  `app_name` varchar(255) DEFAULT NULL,
  `app_logo` varchar(255) DEFAULT NULL,
  `fav_icon` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `sp_id`, `app_name`, `app_logo`, `fav_icon`, `created_at`, `updated_at`) VALUES
(1, 'sp-02', 'Dot Net', 'assets/image/provider/63d78fd61757f1.jpg', 'assets/image/provider/63d78fd65012a1.jpg', '2023-01-30 03:37:26', '2023-01-30 03:37:26'),
(2, 'sp-0055', NULL, NULL, NULL, '2023-01-31 04:37:50', '2023-01-31 04:37:50'),
(3, 'sp-0079', NULL, NULL, NULL, '2023-01-31 04:39:11', '2023-01-31 04:39:11'),
(4, 'sp-79', NULL, NULL, NULL, '2023-01-31 04:41:00', '2023-01-31 04:41:00'),
(5, 'sp-96', NULL, NULL, NULL, '2023-01-31 04:42:21', '2023-01-31 04:42:21'),
(6, 'sp-104', NULL, NULL, NULL, '2023-01-31 04:43:04', '2023-01-31 04:43:04');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(10, '2022_12_29_050555_create_representatives_table', 1),
(11, '2022_12_29_053839_create_packages_table', 1),
(12, '2023_01_01_075740_create_customers_table', 1),
(13, '2023_01_01_080845_create_areas_table', 1),
(14, '2023_01_02_085741_create_costs_table', 1),
(15, '2023_01_03_045656_create_bills_table', 1),
(16, '2023_01_04_061429_create_responsible_areas_table', 1),
(17, '2023_01_04_095524_create_general_settings_table', 1),
(18, '2023_01_04_110914_create_collections_table', 1),
(19, '2023_01_05_074120_create_complaints_table', 1),
(20, '2023_01_16_093107_create_divisions_table', 1),
(21, '2023_01_16_093129_create_districts_table', 1),
(22, '2023_01_16_093224_create_thanas_table', 1),
(23, '2023_01_16_093254_create_unions_table', 1),
(24, '2023_01_16_112007_create_area_locations_table', 1),
(25, '2023_01_23_044940_create_registration_o_t_p_s_table', 1),
(26, '2023_01_24_111017_create_forgot_pin_o_t_p_s_table', 1),
(27, '2023_01_25_040437_create_notification_customers_table', 1),
(28, '2023_01_25_050630_create_surzo_pays_table', 1),
(31, '2023_01_29_093554_create_admin_packages_table', 3),
(32, '2023_01_29_090559_create_admin_bill_collections_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `notification_customers`
--

CREATE TABLE `notification_customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sp_id` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT 'Dishnet',
  `body` text NOT NULL DEFAULT 'Notification body',
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notification_customers`
--

INSERT INTO `notification_customers` (`id`, `sp_id`, `title`, `body`, `image`, `created_at`, `updated_at`) VALUES
(1, 'sp-01', 'rtr', 'ertertert', 'assets/image/provider/63d22c714efd8Screenshot (2).png', '2023-01-26 01:32:01', '2023-01-26 01:32:01'),
(2, 'sp-01', 'rtr', 'ertertert', 'assets/image/provider/63d22c737827fScreenshot (2).png', '2023-01-26 01:32:03', '2023-01-26 01:32:03'),
(3, 'superAdmin', 'uyfuisdfsdgf', 'sdfsdfsdfsdf', 'assets/image/provider/63d6619b3179bScreenshot (4).png', '2023-01-29 06:07:55', '2023-01-29 06:07:55'),
(4, 'superAdmin', 'dsfdsf', 'sdfdsfdas', 'assets/image/provider/63d7a9cdc4478Screenshot (2).png', '2023-01-30 05:28:13', '2023-01-30 05:28:13'),
(5, 'superAdmin', 'dfsdf', 'sdfsdfasd', 'assets/image/provider/63d7aa133d036Screenshot (2).png', '2023-01-30 05:29:23', '2023-01-30 05:29:23');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('1320d2641fd67fcf9e763fedd5ade6c9c5e6380ec23ec7a9e7fc1bd6e602207e65c2e69db29e5eeb', 1, 1, 'auth_token', '[]', 0, '2023-01-26 03:25:19', '2023-01-26 03:25:19', '2024-01-26 09:25:19'),
('228322348586f192b85786d9c834d9071cf6c6e98920066cfa02587da738d146a9b68723c0954338', 4, 1, 'auth_token', '[]', 0, '2023-01-26 03:58:17', '2023-01-26 03:58:17', '2024-01-26 09:58:17'),
('4d751d50fa61491c611811234ca2ed47173b579ed0eae1f9ecf4d160c4f4b1399ca59693b463f14d', 4, 1, 'auth_token', '[]', 0, '2023-01-26 03:57:51', '2023-01-26 03:57:51', '2024-01-26 09:57:51'),
('8754362b6a7b68e7124479bb99c463ad4c879d8da0d685f804f2009ad410729c503baa3166130b75', 4, 1, 'auth_token', '[]', 0, '2023-01-26 02:09:53', '2023-01-26 02:09:53', '2024-01-26 08:09:53'),
('8b83829f513404d94887069d59397c03b51743e89b08e8025a94736c7f4468ac3ebb827907844621', 4, 1, 'auth_token', '[]', 0, '2023-01-26 03:57:55', '2023-01-26 03:57:55', '2024-01-26 09:57:55'),
('dbdbb3a01b5d786e27e8cdb16a27a3d750d1b86a08b44e6313fdbc4f853bdace9b66dfecabc5a3ca', 4, 1, 'auth_token', '[]', 0, '2023-01-26 03:58:12', '2023-01-26 03:58:12', '2024-01-26 09:58:12');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `secret` varchar(100) DEFAULT NULL,
  `provider` varchar(255) DEFAULT NULL,
  `redirect` text NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'WslRyxoWQFMNmeLbzUkZGN0lO4HuUDMv4vAcNcFY', NULL, 'http://localhost', 1, 0, 0, '2023-01-26 02:09:50', '2023-01-26 02:09:50'),
(2, NULL, 'Laravel Password Grant Client', 'IiWuh5DqwldZABx5o29Aluqbo1Lf4fRyrW16gHSD', 'users', 'http://localhost', 0, 1, 0, '2023-01-26 02:09:50', '2023-01-26 02:09:50');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-01-26 02:09:50', '2023-01-26 02:09:50');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) NOT NULL,
  `access_token_id` varchar(100) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sp_id` varchar(255) NOT NULL,
  `package_id` varchar(255) DEFAULT NULL,
  `package_name` varchar(255) DEFAULT NULL,
  `package_description` text DEFAULT NULL,
  `price` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `sp_id`, `package_id`, `package_name`, `package_description`, `price`, `status`, `created_at`, `updated_at`) VALUES
(1, 'sp-02', 'sp-02pk1', 'Monthly', 'Per month 120 tk. \r\n100 channel,  300 kb speed', 120, 1, '2023-01-25 23:48:50', '2023-01-25 23:48:50'),
(2, 'sp-02', 'sp-02pk2', 'half-yearly', '6 Months per payment. 120 channels and 1mbps speed.', 600, 1, '2023-01-25 23:50:11', '2023-01-25 23:50:11'),
(3, 'sp-02', 'sp-02pk3', 'Yearly', 'Per year pay 1000 taka. 250 channels, 5 Mbps speed.', 1000, 1, '2023-01-25 23:51:24', '2023-01-25 23:51:24'),
(4, 'sp-01', 'sp-01pk4', 'Simple', 'Simple package', 150, 1, '2023-01-26 00:51:54', '2023-01-26 00:51:54'),
(5, 'sp-01', 'sp-01pk5', 'Premium', 'Premium package', 250, 1, '2023-01-26 00:52:15', '2023-01-26 00:52:15');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `registration_o_t_p_s`
--

CREATE TABLE `registration_o_t_p_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `otp` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `representatives`
--

CREATE TABLE `representatives` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sp_id` varchar(255) NOT NULL,
  `employee_id` varchar(255) DEFAULT NULL,
  `employee_name` varchar(255) DEFAULT NULL,
  `employee_designation` varchar(255) DEFAULT NULL,
  `cell_number` varchar(255) DEFAULT NULL,
  `pin` varchar(255) NOT NULL DEFAULT '$2y$10$mn9PFR7T69EnqxI3eyB7GOJhKC9MLjbVybX4283Qlna.po5YPh20m',
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `fcm_token` varchar(255) NOT NULL DEFAULT '12345677889787dsfsdkhfsdkjfgsgfbsnfb',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `representatives`
--

INSERT INTO `representatives` (`id`, `sp_id`, `employee_id`, `employee_name`, `employee_designation`, `cell_number`, `pin`, `image`, `status`, `fcm_token`, `created_at`, `updated_at`) VALUES
(1, 'sp-02', 'sp-02em1', 'Surzo Roy', 'Employee', '01710528972', '$2y$10$/X3IEJB5a93AyE9YcTrmpuFh.QWscRcXeG3FoNg/iYV3LGfMAwn4.', NULL, 1, '12345677889787dsfsdkhfsdkjfgsgfbsnfb', '2023-01-26 00:09:17', '2023-01-26 00:09:17'),
(2, 'sp-02', 'sp-02em2', 'Sadid', 'Employee', '01710528973', '$2y$10$mRYaQAJm55pyQPYvaXtDyOGYjXpFmzCSA./dVaUS4ijxXRrw82SnG', NULL, 1, '12345677889787dsfsdkhfsdkjfgsgfbsnfb', '2023-01-26 00:09:50', '2023-01-29 02:38:19'),
(3, 'sp-02', 'sp-02em3', 'Noyon', 'Employee', '01710528974', '$2y$10$M60laBd.AsEI/4Mj7MYsqeoWe6W7jeV47ePxrZJ8T3g9h1HGYqZiG', NULL, 1, '12345677889787dsfsdkhfsdkjfgsgfbsnfb', '2023-01-26 00:10:23', '2023-01-30 05:11:27'),
(4, 'sp-01', 'sp-01em4', 'Sajid', 'Employee', '01710528100', '$2y$10$4Vni0wic1n/1Rm4OR1PCb.6wTkuuk905n/6icNuTKsAj6NPm0DJpW', NULL, 1, '12345677889787dsfsdkhfsdkjfgsgfbsnfb', '2023-01-26 01:02:25', '2023-01-26 01:02:25'),
(5, 'sp-01', 'sp-01em5', 'Mustakin', 'Employee', '01710528101', '$2y$10$NedDWjvBxuJBz0nAJFJvdOpn/o9hnAFpCmhqXI/B6clujFj/khVcq', NULL, 1, '12345677889787dsfsdkhfsdkjfgsgfbsnfb', '2023-01-26 01:03:09', '2023-01-26 01:03:09');

-- --------------------------------------------------------

--
-- Table structure for table `responsible_areas`
--

CREATE TABLE `responsible_areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sp_id` varchar(255) DEFAULT NULL,
  `em_id` varchar(255) DEFAULT NULL,
  `area_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `responsible_areas`
--

INSERT INTO `responsible_areas` (`id`, `sp_id`, `em_id`, `area_id`, `created_at`, `updated_at`) VALUES
(1, 'sp-02', 'sp-02em1', 'sp-02ar1', '2023-01-26 00:09:17', '2023-01-26 00:09:17'),
(2, 'sp-02', 'sp-02em1', 'sp-02ar6', '2023-01-26 00:09:17', '2023-01-26 00:09:17'),
(3, 'sp-02', 'sp-02em2', 'sp-02ar1', '2023-01-26 00:09:50', '2023-01-26 00:09:50'),
(4, 'sp-02', 'sp-02em2', 'sp-02ar2', '2023-01-26 00:09:50', '2023-01-26 00:09:50'),
(5, 'sp-02', 'sp-02em2', 'sp-02ar3', '2023-01-26 00:09:50', '2023-01-29 02:38:19'),
(9, 'sp-01', 'sp-01em4', 'sp-01ar7', '2023-01-26 01:02:25', '2023-01-26 01:02:25'),
(10, 'sp-01', 'sp-01em4', 'sp-01ar8', '2023-01-26 01:02:25', '2023-01-26 01:02:25'),
(11, 'sp-01', 'sp-01em4', 'sp-01ar9', '2023-01-26 01:02:25', '2023-01-26 01:02:25'),
(12, 'sp-01', 'sp-01em5', 'sp-01ar10', '2023-01-26 01:03:09', '2023-01-26 01:03:09'),
(17, 'sp-02', 'sp-02em3', 'sp-02ar1', '2023-01-30 05:11:27', '2023-01-30 05:11:27'),
(18, 'sp-02', 'sp-02em3', 'sp-02ar2', '2023-01-30 05:11:27', '2023-01-30 05:11:27'),
(19, 'sp-02', 'sp-02em3', 'sp-02ar3', '2023-01-30 05:11:27', '2023-01-30 05:11:27');

-- --------------------------------------------------------

--
-- Table structure for table `surzo_pays`
--

CREATE TABLE `surzo_pays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sp_id` varchar(255) NOT NULL,
  `merchant_username` varchar(255) NOT NULL DEFAULT 'abc',
  `merchant_password` varchar(255) NOT NULL DEFAULT 'abc',
  `merchant_url` varchar(255) NOT NULL DEFAULT 'abc',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `thanas`
--

CREATE TABLE `thanas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `bn_name` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `thanas`
--

INSERT INTO `thanas` (`id`, `district_id`, `name`, `bn_name`, `url`, `created_at`, `updated_at`) VALUES
(1, 1, 'Debidwar', 'দেবিদ্বার', 'debidwar.comilla.gov.bd', NULL, NULL),
(2, 1, 'Barura', 'বরুড়া', 'barura.comilla.gov.bd', NULL, NULL),
(3, 1, 'Brahmanpara', 'ব্রাহ্মণপাড়া', 'brahmanpara.comilla.gov.bd', NULL, NULL),
(4, 1, 'Chandina', 'চান্দিনা', 'chandina.comilla.gov.bd', NULL, NULL),
(5, 1, 'Chauddagram', 'চৌদ্দগ্রাম', 'chauddagram.comilla.gov.bd', NULL, NULL),
(6, 1, 'Daudkandi', 'দাউদকান্দি', 'daudkandi.comilla.gov.bd', NULL, NULL),
(7, 1, 'Homna', 'হোমনা', 'homna.comilla.gov.bd', NULL, NULL),
(8, 1, 'Laksam', 'লাকসাম', 'laksam.comilla.gov.bd', NULL, NULL),
(9, 1, 'Muradnagar', 'মুরাদনগর', 'muradnagar.comilla.gov.bd', NULL, NULL),
(10, 1, 'Nangalkot', 'নাঙ্গলকোট', 'nangalkot.comilla.gov.bd', NULL, NULL),
(11, 1, 'Comilla Sadar', 'কুমিল্লা সদর', 'comillasadar.comilla.gov.bd', NULL, NULL),
(12, 1, 'Meghna', 'মেঘনা', 'meghna.comilla.gov.bd', NULL, NULL),
(13, 1, 'Monohargonj', 'মনোহরগঞ্জ', 'monohargonj.comilla.gov.bd', NULL, NULL),
(14, 1, 'Sadarsouth', 'সদর দক্ষিণ', 'sadarsouth.comilla.gov.bd', NULL, NULL),
(15, 1, 'Titas', 'তিতাস', 'titas.comilla.gov.bd', NULL, NULL),
(16, 1, 'Burichang', 'বুড়িচং', 'burichang.comilla.gov.bd', NULL, NULL),
(17, 1, 'Lalmai', 'লালমাই', 'lalmai.comilla.gov.bd', NULL, NULL),
(18, 2, 'Chhagalnaiya', 'ছাগলনাইয়া', 'chhagalnaiya.feni.gov.bd', NULL, NULL),
(19, 2, 'Feni Sadar', 'ফেনী সদর', 'sadar.feni.gov.bd', NULL, NULL),
(20, 2, 'Sonagazi', 'সোনাগাজী', 'sonagazi.feni.gov.bd', NULL, NULL),
(21, 2, 'Fulgazi', 'ফুলগাজী', 'fulgazi.feni.gov.bd', NULL, NULL),
(22, 2, 'Parshuram', 'পরশুরাম', 'parshuram.feni.gov.bd', NULL, NULL),
(23, 2, 'Daganbhuiyan', 'দাগনভূঞা', 'daganbhuiyan.feni.gov.bd', NULL, NULL),
(24, 3, 'Brahmanbaria Sadar', 'ব্রাহ্মণবাড়িয়া সদর', 'sadar.brahmanbaria.gov.bd', NULL, NULL),
(25, 3, 'Kasba', 'কসবা', 'kasba.brahmanbaria.gov.bd', NULL, NULL),
(26, 3, 'Nasirnagar', 'নাসিরনগর', 'nasirnagar.brahmanbaria.gov.bd', NULL, NULL),
(27, 3, 'Sarail', 'সরাইল', 'sarail.brahmanbaria.gov.bd', NULL, NULL),
(28, 3, 'Ashuganj', 'আশুগঞ্জ', 'ashuganj.brahmanbaria.gov.bd', NULL, NULL),
(29, 3, 'Akhaura', 'আখাউড়া', 'akhaura.brahmanbaria.gov.bd', NULL, NULL),
(30, 3, 'Nabinagar', 'নবীনগর', 'nabinagar.brahmanbaria.gov.bd', NULL, NULL),
(31, 3, 'Bancharampur', 'বাঞ্ছারামপুর', 'bancharampur.brahmanbaria.gov.bd', NULL, NULL),
(32, 3, 'Bijoynagar', 'বিজয়নগর', 'bijoynagar.brahmanbaria.gov.bd    ', NULL, NULL),
(33, 4, 'Rangamati Sadar', 'রাঙ্গামাটি সদর', 'sadar.rangamati.gov.bd', NULL, NULL),
(34, 4, 'Kaptai', 'কাপ্তাই', 'kaptai.rangamati.gov.bd', NULL, NULL),
(35, 4, 'Kawkhali', 'কাউখালী', 'kawkhali.rangamati.gov.bd', NULL, NULL),
(36, 4, 'Baghaichari', 'বাঘাইছড়ি', 'baghaichari.rangamati.gov.bd', NULL, NULL),
(37, 4, 'Barkal', 'বরকল', 'barkal.rangamati.gov.bd', NULL, NULL),
(38, 4, 'Langadu', 'লংগদু', 'langadu.rangamati.gov.bd', NULL, NULL),
(39, 4, 'Rajasthali', 'রাজস্থলী', 'rajasthali.rangamati.gov.bd', NULL, NULL),
(40, 4, 'Belaichari', 'বিলাইছড়ি', 'belaichari.rangamati.gov.bd', NULL, NULL),
(41, 4, 'Juraichari', 'জুরাছড়ি', 'juraichari.rangamati.gov.bd', NULL, NULL),
(42, 4, 'Naniarchar', 'নানিয়ারচর', 'naniarchar.rangamati.gov.bd', NULL, NULL),
(43, 5, 'Noakhali Sadar', 'নোয়াখালী সদর', 'sadar.noakhali.gov.bd', NULL, NULL),
(44, 5, 'Companiganj', 'কোম্পানীগঞ্জ', 'companiganj.noakhali.gov.bd', NULL, NULL),
(45, 5, 'Begumganj', 'বেগমগঞ্জ', 'begumganj.noakhali.gov.bd', NULL, NULL),
(46, 5, 'Hatia', 'হাতিয়া', 'hatia.noakhali.gov.bd', NULL, NULL),
(47, 5, 'Subarnachar', 'সুবর্ণচর', 'subarnachar.noakhali.gov.bd', NULL, NULL),
(48, 5, 'Kabirhat', 'কবিরহাট', 'kabirhat.noakhali.gov.bd', NULL, NULL),
(49, 5, 'Senbug', 'সেনবাগ', 'senbug.noakhali.gov.bd', NULL, NULL),
(50, 5, 'Chatkhil', 'চাটখিল', 'chatkhil.noakhali.gov.bd', NULL, NULL),
(51, 5, 'Sonaimori', 'সোনাইমুড়ী', 'sonaimori.noakhali.gov.bd', NULL, NULL),
(52, 6, 'Haimchar', 'হাইমচর', 'haimchar.chandpur.gov.bd', NULL, NULL),
(53, 6, 'Kachua', 'কচুয়া', 'kachua.chandpur.gov.bd', NULL, NULL),
(54, 6, 'Shahrasti', 'শাহরাস্তি	', 'shahrasti.chandpur.gov.bd', NULL, NULL),
(55, 6, 'Chandpur Sadar', 'চাঁদপুর সদর', 'sadar.chandpur.gov.bd', NULL, NULL),
(56, 6, 'Matlab South', 'মতলব দক্ষিণ', 'matlabsouth.chandpur.gov.bd', NULL, NULL),
(57, 6, 'Hajiganj', 'হাজীগঞ্জ', 'hajiganj.chandpur.gov.bd', NULL, NULL),
(58, 6, 'Matlab North', 'মতলব উত্তর', 'matlabnorth.chandpur.gov.bd', NULL, NULL),
(59, 6, 'Faridgonj', 'ফরিদগঞ্জ', 'faridgonj.chandpur.gov.bd', NULL, NULL),
(60, 7, 'Lakshmipur Sadar', 'লক্ষ্মীপুর সদর', 'sadar.lakshmipur.gov.bd', NULL, NULL),
(61, 7, 'Kamalnagar', 'কমলনগর', 'kamalnagar.lakshmipur.gov.bd', NULL, NULL),
(62, 7, 'Raipur', 'রায়পুর', 'raipur.lakshmipur.gov.bd', NULL, NULL),
(63, 7, 'Ramgati', 'রামগতি', 'ramgati.lakshmipur.gov.bd', NULL, NULL),
(64, 7, 'Ramganj', 'রামগঞ্জ', 'ramganj.lakshmipur.gov.bd', NULL, NULL),
(65, 8, 'Rangunia', 'রাঙ্গুনিয়া', 'rangunia.chittagong.gov.bd', NULL, NULL),
(66, 8, 'Sitakunda', 'সীতাকুন্ড', 'sitakunda.chittagong.gov.bd', NULL, NULL),
(67, 8, 'Mirsharai', 'মীরসরাই', 'mirsharai.chittagong.gov.bd', NULL, NULL),
(68, 8, 'Patiya', 'পটিয়া', 'patiya.chittagong.gov.bd', NULL, NULL),
(69, 8, 'Sandwip', 'সন্দ্বীপ', 'sandwip.chittagong.gov.bd', NULL, NULL),
(70, 8, 'Banshkhali', 'বাঁশখালী', 'banshkhali.chittagong.gov.bd', NULL, NULL),
(71, 8, 'Boalkhali', 'বোয়ালখালী', 'boalkhali.chittagong.gov.bd', NULL, NULL),
(72, 8, 'Anwara', 'আনোয়ারা', 'anwara.chittagong.gov.bd', NULL, NULL),
(73, 8, 'Chandanaish', 'চন্দনাইশ', 'chandanaish.chittagong.gov.bd', NULL, NULL),
(74, 8, 'Satkania', 'সাতকানিয়া', 'satkania.chittagong.gov.bd', NULL, NULL),
(75, 8, 'Lohagara', 'লোহাগাড়া', 'lohagara.chittagong.gov.bd', NULL, NULL),
(76, 8, 'Hathazari', 'হাটহাজারী', 'hathazari.chittagong.gov.bd', NULL, NULL),
(77, 8, 'Fatikchhari', 'ফটিকছড়ি', 'fatikchhari.chittagong.gov.bd', NULL, NULL),
(78, 8, 'Raozan', 'রাউজান', 'raozan.chittagong.gov.bd', NULL, NULL),
(79, 8, 'Karnafuli', 'কর্ণফুলী', 'karnafuli.chittagong.gov.bd', NULL, NULL),
(80, 9, 'Coxsbazar Sadar', 'কক্সবাজার সদর', 'sadar.coxsbazar.gov.bd', NULL, NULL),
(81, 9, 'Chakaria', 'চকরিয়া', 'chakaria.coxsbazar.gov.bd', NULL, NULL),
(82, 9, 'Kutubdia', 'কুতুবদিয়া', 'kutubdia.coxsbazar.gov.bd', NULL, NULL),
(83, 9, 'Ukhiya', 'উখিয়া', 'ukhiya.coxsbazar.gov.bd', NULL, NULL),
(84, 9, 'Moheshkhali', 'মহেশখালী', 'moheshkhali.coxsbazar.gov.bd', NULL, NULL),
(85, 9, 'Pekua', 'পেকুয়া', 'pekua.coxsbazar.gov.bd', NULL, NULL),
(86, 9, 'Ramu', 'রামু', 'ramu.coxsbazar.gov.bd', NULL, NULL),
(87, 9, 'Teknaf', 'টেকনাফ', 'teknaf.coxsbazar.gov.bd', NULL, NULL),
(88, 10, 'Khagrachhari Sadar', 'খাগড়াছড়ি সদর', 'sadar.khagrachhari.gov.bd', NULL, NULL),
(89, 10, 'Dighinala', 'দিঘীনালা', 'dighinala.khagrachhari.gov.bd', NULL, NULL),
(90, 10, 'Panchari', 'পানছড়ি', 'panchari.khagrachhari.gov.bd', NULL, NULL),
(91, 10, 'Laxmichhari', 'লক্ষীছড়ি', 'laxmichhari.khagrachhari.gov.bd', NULL, NULL),
(92, 10, 'Mohalchari', 'মহালছড়ি', 'mohalchari.khagrachhari.gov.bd', NULL, NULL),
(93, 10, 'Manikchari', 'মানিকছড়ি', 'manikchari.khagrachhari.gov.bd', NULL, NULL),
(94, 10, 'Ramgarh', 'রামগড়', 'ramgarh.khagrachhari.gov.bd', NULL, NULL),
(95, 10, 'Matiranga', 'মাটিরাঙ্গা', 'matiranga.khagrachhari.gov.bd', NULL, NULL),
(96, 10, 'Guimara', 'গুইমারা', 'guimara.khagrachhari.gov.bd', NULL, NULL),
(97, 11, 'Bandarban Sadar', 'বান্দরবান সদর', 'sadar.bandarban.gov.bd', NULL, NULL),
(98, 11, 'Alikadam', 'আলীকদম', 'alikadam.bandarban.gov.bd', NULL, NULL),
(99, 11, 'Naikhongchhari', 'নাইক্ষ্যংছড়ি', 'naikhongchhari.bandarban.gov.bd', NULL, NULL),
(100, 11, 'Rowangchhari', 'রোয়াংছড়ি', 'rowangchhari.bandarban.gov.bd', NULL, NULL),
(101, 11, 'Lama', 'লামা', 'lama.bandarban.gov.bd', NULL, NULL),
(102, 11, 'Ruma', 'রুমা', 'ruma.bandarban.gov.bd', NULL, NULL),
(103, 11, 'Thanchi', 'থানচি', 'thanchi.bandarban.gov.bd', NULL, NULL),
(104, 12, 'Belkuchi', 'বেলকুচি', 'belkuchi.sirajganj.gov.bd', NULL, NULL),
(105, 12, 'Chauhali', 'চৌহালি', 'chauhali.sirajganj.gov.bd', NULL, NULL),
(106, 12, 'Kamarkhand', 'কামারখন্দ', 'kamarkhand.sirajganj.gov.bd', NULL, NULL),
(107, 12, 'Kazipur', 'কাজীপুর', 'kazipur.sirajganj.gov.bd', NULL, NULL),
(108, 12, 'Raigonj', 'রায়গঞ্জ', 'raigonj.sirajganj.gov.bd', NULL, NULL),
(109, 12, 'Shahjadpur', 'শাহজাদপুর', 'shahjadpur.sirajganj.gov.bd', NULL, NULL),
(110, 12, 'Sirajganj Sadar', 'সিরাজগঞ্জ সদর', 'sirajganjsadar.sirajganj.gov.bd', NULL, NULL),
(111, 12, 'Tarash', 'তাড়াশ', 'tarash.sirajganj.gov.bd', NULL, NULL),
(112, 12, 'Ullapara', 'উল্লাপাড়া', 'ullapara.sirajganj.gov.bd', NULL, NULL),
(113, 13, 'Sujanagar', 'সুজানগর', 'sujanagar.pabna.gov.bd', NULL, NULL),
(114, 13, 'Ishurdi', 'ঈশ্বরদী', 'ishurdi.pabna.gov.bd', NULL, NULL),
(115, 13, 'Bhangura', 'ভাঙ্গুড়া', 'bhangura.pabna.gov.bd', NULL, NULL),
(116, 13, 'Pabna Sadar', 'পাবনা সদর', 'pabnasadar.pabna.gov.bd', NULL, NULL),
(117, 13, 'Bera', 'বেড়া', 'bera.pabna.gov.bd', NULL, NULL),
(118, 13, 'Atghoria', 'আটঘরিয়া', 'atghoria.pabna.gov.bd', NULL, NULL),
(119, 13, 'Chatmohar', 'চাটমোহর', 'chatmohar.pabna.gov.bd', NULL, NULL),
(120, 13, 'Santhia', 'সাঁথিয়া', 'santhia.pabna.gov.bd', NULL, NULL),
(121, 13, 'Faridpur', 'ফরিদপুর', 'faridpur.pabna.gov.bd', NULL, NULL),
(122, 14, 'Kahaloo', 'কাহালু', 'kahaloo.bogra.gov.bd', NULL, NULL),
(123, 14, 'Bogra Sadar', 'বগুড়া সদর', 'sadar.bogra.gov.bd', NULL, NULL),
(124, 14, 'Shariakandi', 'সারিয়াকান্দি', 'shariakandi.bogra.gov.bd', NULL, NULL),
(125, 14, 'Shajahanpur', 'শাজাহানপুর', 'shajahanpur.bogra.gov.bd', NULL, NULL),
(126, 14, 'Dupchanchia', 'দুপচাচিঁয়া', 'dupchanchia.bogra.gov.bd', NULL, NULL),
(127, 14, 'Adamdighi', 'আদমদিঘি', 'adamdighi.bogra.gov.bd', NULL, NULL),
(128, 14, 'Nondigram', 'নন্দিগ্রাম', 'nondigram.bogra.gov.bd', NULL, NULL),
(129, 14, 'Sonatala', 'সোনাতলা', 'sonatala.bogra.gov.bd', NULL, NULL),
(130, 14, 'Dhunot', 'ধুনট', 'dhunot.bogra.gov.bd', NULL, NULL),
(131, 14, 'Gabtali', 'গাবতলী', 'gabtali.bogra.gov.bd', NULL, NULL),
(132, 14, 'Sherpur', 'শেরপুর', 'sherpur.bogra.gov.bd', NULL, NULL),
(133, 14, 'Shibganj', 'শিবগঞ্জ', 'shibganj.bogra.gov.bd', NULL, NULL),
(134, 15, 'Paba', 'পবা', 'paba.rajshahi.gov.bd', NULL, NULL),
(135, 15, 'Durgapur', 'দুর্গাপুর', 'durgapur.rajshahi.gov.bd', NULL, NULL),
(136, 15, 'Mohonpur', 'মোহনপুর', 'mohonpur.rajshahi.gov.bd', NULL, NULL),
(137, 15, 'Charghat', 'চারঘাট', 'charghat.rajshahi.gov.bd', NULL, NULL),
(138, 15, 'Puthia', 'পুঠিয়া', 'puthia.rajshahi.gov.bd', NULL, NULL),
(139, 15, 'Bagha', 'বাঘা', 'bagha.rajshahi.gov.bd', NULL, NULL),
(140, 15, 'Godagari', 'গোদাগাড়ী', 'godagari.rajshahi.gov.bd', NULL, NULL),
(141, 15, 'Tanore', 'তানোর', 'tanore.rajshahi.gov.bd', NULL, NULL),
(142, 15, 'Bagmara', 'বাগমারা', 'bagmara.rajshahi.gov.bd', NULL, NULL),
(143, 16, 'Natore Sadar', 'নাটোর সদর', 'natoresadar.natore.gov.bd', NULL, NULL),
(144, 16, 'Singra', 'সিংড়া', 'singra.natore.gov.bd', NULL, NULL),
(145, 16, 'Baraigram', 'বড়াইগ্রাম', 'baraigram.natore.gov.bd', NULL, NULL),
(146, 16, 'Bagatipara', 'বাগাতিপাড়া', 'bagatipara.natore.gov.bd', NULL, NULL),
(147, 16, 'Lalpur', 'লালপুর', 'lalpur.natore.gov.bd', NULL, NULL),
(148, 16, 'Gurudaspur', 'গুরুদাসপুর', 'gurudaspur.natore.gov.bd', NULL, NULL),
(149, 16, 'Naldanga', 'নলডাঙ্গা', 'naldanga.natore.gov.bd', NULL, NULL),
(150, 17, 'Akkelpur', 'আক্কেলপুর', 'akkelpur.joypurhat.gov.bd', NULL, NULL),
(151, 17, 'Kalai', 'কালাই', 'kalai.joypurhat.gov.bd', NULL, NULL),
(152, 17, 'Khetlal', 'ক্ষেতলাল', 'khetlal.joypurhat.gov.bd', NULL, NULL),
(153, 17, 'Panchbibi', 'পাঁচবিবি', 'panchbibi.joypurhat.gov.bd', NULL, NULL),
(154, 17, 'Joypurhat Sadar', 'জয়পুরহাট সদর', 'joypurhatsadar.joypurhat.gov.bd', NULL, NULL),
(155, 18, 'Chapainawabganj Sadar', 'চাঁপাইনবাবগঞ্জ সদর', 'chapainawabganjsadar.chapainawabganj.gov.bd', NULL, NULL),
(156, 18, 'Gomostapur', 'গোমস্তাপুর', 'gomostapur.chapainawabganj.gov.bd', NULL, NULL),
(157, 18, 'Nachol', 'নাচোল', 'nachol.chapainawabganj.gov.bd', NULL, NULL),
(158, 18, 'Bholahat', 'ভোলাহাট', 'bholahat.chapainawabganj.gov.bd', NULL, NULL),
(159, 18, 'Shibganj', 'শিবগঞ্জ', 'shibganj.chapainawabganj.gov.bd', NULL, NULL),
(160, 19, 'Mohadevpur', 'মহাদেবপুর', 'mohadevpur.naogaon.gov.bd', NULL, NULL),
(161, 19, 'Badalgachi', 'বদলগাছী', 'badalgachi.naogaon.gov.bd', NULL, NULL),
(162, 19, 'Patnitala', 'পত্নিতলা', 'patnitala.naogaon.gov.bd', NULL, NULL),
(163, 19, 'Dhamoirhat', 'ধামইরহাট', 'dhamoirhat.naogaon.gov.bd', NULL, NULL),
(164, 19, 'Niamatpur', 'নিয়ামতপুর', 'niamatpur.naogaon.gov.bd', NULL, NULL),
(165, 19, 'Manda', 'মান্দা', 'manda.naogaon.gov.bd', NULL, NULL),
(166, 19, 'Atrai', 'আত্রাই', 'atrai.naogaon.gov.bd', NULL, NULL),
(167, 19, 'Raninagar', 'রাণীনগর', 'raninagar.naogaon.gov.bd', NULL, NULL),
(168, 19, 'Naogaon Sadar', 'নওগাঁ সদর', 'naogaonsadar.naogaon.gov.bd', NULL, NULL),
(169, 19, 'Porsha', 'পোরশা', 'porsha.naogaon.gov.bd', NULL, NULL),
(170, 19, 'Sapahar', 'সাপাহার', 'sapahar.naogaon.gov.bd', NULL, NULL),
(171, 20, 'Manirampur', 'মণিরামপুর', 'manirampur.jessore.gov.bd', NULL, NULL),
(172, 20, 'Abhaynagar', 'অভয়নগর', 'abhaynagar.jessore.gov.bd', NULL, NULL),
(173, 20, 'Bagherpara', 'বাঘারপাড়া', 'bagherpara.jessore.gov.bd', NULL, NULL),
(174, 20, 'Chougachha', 'চৌগাছা', 'chougachha.jessore.gov.bd', NULL, NULL),
(175, 20, 'Jhikargacha', 'ঝিকরগাছা', 'jhikargacha.jessore.gov.bd', NULL, NULL),
(176, 20, 'Keshabpur', 'কেশবপুর', 'keshabpur.jessore.gov.bd', NULL, NULL),
(177, 20, 'Jessore Sadar', 'যশোর সদর', 'sadar.jessore.gov.bd', NULL, NULL),
(178, 20, 'Sharsha', 'শার্শা', 'sharsha.jessore.gov.bd', NULL, NULL),
(179, 21, 'Assasuni', 'আশাশুনি', 'assasuni.satkhira.gov.bd', NULL, NULL),
(180, 21, 'Debhata', 'দেবহাটা', 'debhata.satkhira.gov.bd', NULL, NULL),
(181, 21, 'Kalaroa', 'কলারোয়া', 'kalaroa.satkhira.gov.bd', NULL, NULL),
(182, 21, 'Satkhira Sadar', 'সাতক্ষীরা সদর', 'satkhirasadar.satkhira.gov.bd', NULL, NULL),
(183, 21, 'Shyamnagar', 'শ্যামনগর', 'shyamnagar.satkhira.gov.bd', NULL, NULL),
(184, 21, 'Tala', 'তালা', 'tala.satkhira.gov.bd', NULL, NULL),
(185, 21, 'Kaliganj', 'কালিগঞ্জ', 'kaliganj.satkhira.gov.bd', NULL, NULL),
(186, 22, 'Mujibnagar', 'মুজিবনগর', 'mujibnagar.meherpur.gov.bd', NULL, NULL),
(187, 22, 'Meherpur Sadar', 'মেহেরপুর সদর', 'meherpursadar.meherpur.gov.bd', NULL, NULL),
(188, 22, 'Gangni', 'গাংনী', 'gangni.meherpur.gov.bd', NULL, NULL),
(189, 23, 'Narail Sadar', 'নড়াইল সদর', 'narailsadar.narail.gov.bd', NULL, NULL),
(190, 23, 'Lohagara', 'লোহাগড়া', 'lohagara.narail.gov.bd', NULL, NULL),
(191, 23, 'Kalia', 'কালিয়া', 'kalia.narail.gov.bd', NULL, NULL),
(192, 24, 'Chuadanga Sadar', 'চুয়াডাঙ্গা সদর', 'chuadangasadar.chuadanga.gov.bd', NULL, NULL),
(193, 24, 'Alamdanga', 'আলমডাঙ্গা', 'alamdanga.chuadanga.gov.bd', NULL, NULL),
(194, 24, 'Damurhuda', 'দামুড়হুদা', 'damurhuda.chuadanga.gov.bd', NULL, NULL),
(195, 24, 'Jibannagar', 'জীবননগর', 'jibannagar.chuadanga.gov.bd', NULL, NULL),
(196, 25, 'Kushtia Sadar', 'কুষ্টিয়া সদর', 'kushtiasadar.kushtia.gov.bd', NULL, NULL),
(197, 25, 'Kumarkhali', 'কুমারখালী', 'kumarkhali.kushtia.gov.bd', NULL, NULL),
(198, 25, 'Khoksa', 'খোকসা', 'khoksa.kushtia.gov.bd', NULL, NULL),
(199, 25, 'Mirpur', 'মিরপুর', 'mirpurkushtia.kushtia.gov.bd', NULL, NULL),
(200, 25, 'Daulatpur', 'দৌলতপুর', 'daulatpur.kushtia.gov.bd', NULL, NULL),
(201, 25, 'Bheramara', 'ভেড়ামারা', 'bheramara.kushtia.gov.bd', NULL, NULL),
(202, 26, 'Shalikha', 'শালিখা', 'shalikha.magura.gov.bd', NULL, NULL),
(203, 26, 'Sreepur', 'শ্রীপুর', 'sreepur.magura.gov.bd', NULL, NULL),
(204, 26, 'Magura Sadar', 'মাগুরা সদর', 'magurasadar.magura.gov.bd', NULL, NULL),
(205, 26, 'Mohammadpur', 'মহম্মদপুর', 'mohammadpur.magura.gov.bd', NULL, NULL),
(206, 27, 'Paikgasa', 'পাইকগাছা', 'paikgasa.khulna.gov.bd', NULL, NULL),
(207, 27, 'Fultola', 'ফুলতলা', 'fultola.khulna.gov.bd', NULL, NULL),
(208, 27, 'Digholia', 'দিঘলিয়া', 'digholia.khulna.gov.bd', NULL, NULL),
(209, 27, 'Rupsha', 'রূপসা', 'rupsha.khulna.gov.bd', NULL, NULL),
(210, 27, 'Terokhada', 'তেরখাদা', 'terokhada.khulna.gov.bd', NULL, NULL),
(211, 27, 'Dumuria', 'ডুমুরিয়া', 'dumuria.khulna.gov.bd', NULL, NULL),
(212, 27, 'Botiaghata', 'বটিয়াঘাটা', 'botiaghata.khulna.gov.bd', NULL, NULL),
(213, 27, 'Dakop', 'দাকোপ', 'dakop.khulna.gov.bd', NULL, NULL),
(214, 27, 'Koyra', 'কয়রা', 'koyra.khulna.gov.bd', NULL, NULL),
(215, 28, 'Fakirhat', 'ফকিরহাট', 'fakirhat.bagerhat.gov.bd', NULL, NULL),
(216, 28, 'Bagerhat Sadar', 'বাগেরহাট সদর', 'sadar.bagerhat.gov.bd', NULL, NULL),
(217, 28, 'Mollahat', 'মোল্লাহাট', 'mollahat.bagerhat.gov.bd', NULL, NULL),
(218, 28, 'Sarankhola', 'শরণখোলা', 'sarankhola.bagerhat.gov.bd', NULL, NULL),
(219, 28, 'Rampal', 'রামপাল', 'rampal.bagerhat.gov.bd', NULL, NULL),
(220, 28, 'Morrelganj', 'মোড়েলগঞ্জ', 'morrelganj.bagerhat.gov.bd', NULL, NULL),
(221, 28, 'Kachua', 'কচুয়া', 'kachua.bagerhat.gov.bd', NULL, NULL),
(222, 28, 'Mongla', 'মোংলা', 'mongla.bagerhat.gov.bd', NULL, NULL),
(223, 28, 'Chitalmari', 'চিতলমারী', 'chitalmari.bagerhat.gov.bd', NULL, NULL),
(224, 29, 'Jhenaidah Sadar', 'ঝিনাইদহ সদর', 'sadar.jhenaidah.gov.bd', NULL, NULL),
(225, 29, 'Shailkupa', 'শৈলকুপা', 'shailkupa.jhenaidah.gov.bd', NULL, NULL),
(226, 29, 'Harinakundu', 'হরিণাকুন্ডু', 'harinakundu.jhenaidah.gov.bd', NULL, NULL),
(227, 29, 'Kaliganj', 'কালীগঞ্জ', 'kaliganj.jhenaidah.gov.bd', NULL, NULL),
(228, 29, 'Kotchandpur', 'কোটচাঁদপুর', 'kotchandpur.jhenaidah.gov.bd', NULL, NULL),
(229, 29, 'Moheshpur', 'মহেশপুর', 'moheshpur.jhenaidah.gov.bd', NULL, NULL),
(230, 30, 'Jhalakathi Sadar', 'ঝালকাঠি সদর', 'sadar.jhalakathi.gov.bd', NULL, NULL),
(231, 30, 'Kathalia', 'কাঠালিয়া', 'kathalia.jhalakathi.gov.bd', NULL, NULL),
(232, 30, 'Nalchity', 'নলছিটি', 'nalchity.jhalakathi.gov.bd', NULL, NULL),
(233, 30, 'Rajapur', 'রাজাপুর', 'rajapur.jhalakathi.gov.bd', NULL, NULL),
(234, 31, 'Bauphal', 'বাউফল', 'bauphal.patuakhali.gov.bd', NULL, NULL),
(235, 31, 'Patuakhali Sadar', 'পটুয়াখালী সদর', 'sadar.patuakhali.gov.bd', NULL, NULL),
(236, 31, 'Dumki', 'দুমকি', 'dumki.patuakhali.gov.bd', NULL, NULL),
(237, 31, 'Dashmina', 'দশমিনা', 'dashmina.patuakhali.gov.bd', NULL, NULL),
(238, 31, 'Kalapara', 'কলাপাড়া', 'kalapara.patuakhali.gov.bd', NULL, NULL),
(239, 31, 'Mirzaganj', 'মির্জাগঞ্জ', 'mirzaganj.patuakhali.gov.bd', NULL, NULL),
(240, 31, 'Galachipa', 'গলাচিপা', 'galachipa.patuakhali.gov.bd', NULL, NULL),
(241, 31, 'Rangabali', 'রাঙ্গাবালী', 'rangabali.patuakhali.gov.bd', NULL, NULL),
(242, 32, 'Pirojpur Sadar', 'পিরোজপুর সদর', 'sadar.pirojpur.gov.bd', NULL, NULL),
(243, 32, 'Nazirpur', 'নাজিরপুর', 'nazirpur.pirojpur.gov.bd', NULL, NULL),
(244, 32, 'Kawkhali', 'কাউখালী', 'kawkhali.pirojpur.gov.bd', NULL, NULL),
(245, 32, 'Zianagar', 'জিয়ানগর', 'zianagar.pirojpur.gov.bd', NULL, NULL),
(246, 32, 'Bhandaria', 'ভান্ডারিয়া', 'bhandaria.pirojpur.gov.bd', NULL, NULL),
(247, 32, 'Mathbaria', 'মঠবাড়ীয়া', 'mathbaria.pirojpur.gov.bd', NULL, NULL),
(248, 32, 'Nesarabad', 'নেছারাবাদ', 'nesarabad.pirojpur.gov.bd', NULL, NULL),
(249, 33, 'Barisal Sadar', 'বরিশাল সদর', 'barisalsadar.barisal.gov.bd', NULL, NULL),
(250, 33, 'Bakerganj', 'বাকেরগঞ্জ', 'bakerganj.barisal.gov.bd', NULL, NULL),
(251, 33, 'Babuganj', 'বাবুগঞ্জ', 'babuganj.barisal.gov.bd', NULL, NULL),
(252, 33, 'Wazirpur', 'উজিরপুর', 'wazirpur.barisal.gov.bd', NULL, NULL),
(253, 33, 'Banaripara', 'বানারীপাড়া', 'banaripara.barisal.gov.bd', NULL, NULL),
(254, 33, 'Gournadi', 'গৌরনদী', 'gournadi.barisal.gov.bd', NULL, NULL),
(255, 33, 'Agailjhara', 'আগৈলঝাড়া', 'agailjhara.barisal.gov.bd', NULL, NULL),
(256, 33, 'Mehendiganj', 'মেহেন্দিগঞ্জ', 'mehendiganj.barisal.gov.bd', NULL, NULL),
(257, 33, 'Muladi', 'মুলাদী', 'muladi.barisal.gov.bd', NULL, NULL),
(258, 33, 'Hizla', 'হিজলা', 'hizla.barisal.gov.bd', NULL, NULL),
(259, 34, 'Bhola Sadar', 'ভোলা সদর', 'sadar.bhola.gov.bd', NULL, NULL),
(260, 34, 'Borhan Sddin', 'বোরহান উদ্দিন', 'borhanuddin.bhola.gov.bd', NULL, NULL),
(261, 34, 'Charfesson', 'চরফ্যাশন', 'charfesson.bhola.gov.bd', NULL, NULL),
(262, 34, 'Doulatkhan', 'দৌলতখান', 'doulatkhan.bhola.gov.bd', NULL, NULL),
(263, 34, 'Monpura', 'মনপুরা', 'monpura.bhola.gov.bd', NULL, NULL),
(264, 34, 'Tazumuddin', 'তজুমদ্দিন', 'tazumuddin.bhola.gov.bd', NULL, NULL),
(265, 34, 'Lalmohan', 'লালমোহন', 'lalmohan.bhola.gov.bd', NULL, NULL),
(266, 35, 'Amtali', 'আমতলী', 'amtali.barguna.gov.bd', NULL, NULL),
(267, 35, 'Barguna Sadar', 'বরগুনা সদর', 'sadar.barguna.gov.bd', NULL, NULL),
(268, 35, 'Betagi', 'বেতাগী', 'betagi.barguna.gov.bd', NULL, NULL),
(269, 35, 'Bamna', 'বামনা', 'bamna.barguna.gov.bd', NULL, NULL),
(270, 35, 'Pathorghata', 'পাথরঘাটা', 'pathorghata.barguna.gov.bd', NULL, NULL),
(271, 35, 'Taltali', 'তালতলি', 'taltali.barguna.gov.bd', NULL, NULL),
(272, 36, 'Balaganj', 'বালাগঞ্জ', 'balaganj.sylhet.gov.bd', NULL, NULL),
(273, 36, 'Beanibazar', 'বিয়ানীবাজার', 'beanibazar.sylhet.gov.bd', NULL, NULL),
(274, 36, 'Bishwanath', 'বিশ্বনাথ', 'bishwanath.sylhet.gov.bd', NULL, NULL),
(275, 36, 'Companiganj', 'কোম্পানীগঞ্জ', 'companiganj.sylhet.gov.bd', NULL, NULL),
(276, 36, 'Fenchuganj', 'ফেঞ্চুগঞ্জ', 'fenchuganj.sylhet.gov.bd', NULL, NULL),
(277, 36, 'Golapganj', 'গোলাপগঞ্জ', 'golapganj.sylhet.gov.bd', NULL, NULL),
(278, 36, 'Gowainghat', 'গোয়াইনঘাট', 'gowainghat.sylhet.gov.bd', NULL, NULL),
(279, 36, 'Jaintiapur', 'জৈন্তাপুর', 'jaintiapur.sylhet.gov.bd', NULL, NULL),
(280, 36, 'Kanaighat', 'কানাইঘাট', 'kanaighat.sylhet.gov.bd', NULL, NULL),
(281, 36, 'Sylhet Sadar', 'সিলেট সদর', 'sylhetsadar.sylhet.gov.bd', NULL, NULL),
(282, 36, 'Zakiganj', 'জকিগঞ্জ', 'zakiganj.sylhet.gov.bd', NULL, NULL),
(283, 36, 'Dakshinsurma', 'দক্ষিণ সুরমা', 'dakshinsurma.sylhet.gov.bd', NULL, NULL),
(284, 36, 'Osmaninagar', 'ওসমানী নগর', 'osmaninagar.sylhet.gov.bd', NULL, NULL),
(285, 37, 'Barlekha', 'বড়লেখা', 'barlekha.moulvibazar.gov.bd', NULL, NULL),
(286, 37, 'Kamolganj', 'কমলগঞ্জ', 'kamolganj.moulvibazar.gov.bd', NULL, NULL),
(287, 37, 'Kulaura', 'কুলাউড়া', 'kulaura.moulvibazar.gov.bd', NULL, NULL),
(288, 37, 'Moulvibazar Sadar', 'মৌলভীবাজার সদর', 'moulvibazarsadar.moulvibazar.gov.bd', NULL, NULL),
(289, 37, 'Rajnagar', 'রাজনগর', 'rajnagar.moulvibazar.gov.bd', NULL, NULL),
(290, 37, 'Sreemangal', 'শ্রীমঙ্গল', 'sreemangal.moulvibazar.gov.bd', NULL, NULL),
(291, 37, 'Juri', 'জুড়ী', 'juri.moulvibazar.gov.bd', NULL, NULL),
(292, 38, 'Nabiganj', 'নবীগঞ্জ', 'nabiganj.habiganj.gov.bd', NULL, NULL),
(293, 38, 'Bahubal', 'বাহুবল', 'bahubal.habiganj.gov.bd', NULL, NULL),
(294, 38, 'Ajmiriganj', 'আজমিরীগঞ্জ', 'ajmiriganj.habiganj.gov.bd', NULL, NULL),
(295, 38, 'Baniachong', 'বানিয়াচং', 'baniachong.habiganj.gov.bd', NULL, NULL),
(296, 38, 'Lakhai', 'লাখাই', 'lakhai.habiganj.gov.bd', NULL, NULL),
(297, 38, 'Chunarughat', 'চুনারুঘাট', 'chunarughat.habiganj.gov.bd', NULL, NULL),
(298, 38, 'Habiganj Sadar', 'হবিগঞ্জ সদর', 'habiganjsadar.habiganj.gov.bd', NULL, NULL),
(299, 38, 'Madhabpur', 'মাধবপুর', 'madhabpur.habiganj.gov.bd', NULL, NULL),
(300, 39, 'Sunamganj Sadar', 'সুনামগঞ্জ সদর', 'sadar.sunamganj.gov.bd', NULL, NULL),
(301, 39, 'South Sunamganj', 'দক্ষিণ সুনামগঞ্জ', 'southsunamganj.sunamganj.gov.bd', NULL, NULL),
(302, 39, 'Bishwambarpur', 'বিশ্বম্ভরপুর', 'bishwambarpur.sunamganj.gov.bd', NULL, NULL),
(303, 39, 'Chhatak', 'ছাতক', 'chhatak.sunamganj.gov.bd', NULL, NULL),
(304, 39, 'Jagannathpur', 'জগন্নাথপুর', 'jagannathpur.sunamganj.gov.bd', NULL, NULL),
(305, 39, 'Dowarabazar', 'দোয়ারাবাজার', 'dowarabazar.sunamganj.gov.bd', NULL, NULL),
(306, 39, 'Tahirpur', 'তাহিরপুর', 'tahirpur.sunamganj.gov.bd', NULL, NULL),
(307, 39, 'Dharmapasha', 'ধর্মপাশা', 'dharmapasha.sunamganj.gov.bd', NULL, NULL),
(308, 39, 'Jamalganj', 'জামালগঞ্জ', 'jamalganj.sunamganj.gov.bd', NULL, NULL),
(309, 39, 'Shalla', 'শাল্লা', 'shalla.sunamganj.gov.bd', NULL, NULL),
(310, 39, 'Derai', 'দিরাই', 'derai.sunamganj.gov.bd', NULL, NULL),
(311, 40, 'Belabo', 'বেলাবো', 'belabo.narsingdi.gov.bd', NULL, NULL),
(312, 40, 'Monohardi', 'মনোহরদী', 'monohardi.narsingdi.gov.bd', NULL, NULL),
(313, 40, 'Narsingdi Sadar', 'নরসিংদী সদর', 'narsingdisadar.narsingdi.gov.bd', NULL, NULL),
(314, 40, 'Palash', 'পলাশ', 'palash.narsingdi.gov.bd', NULL, NULL),
(315, 40, 'Raipura', 'রায়পুরা', 'raipura.narsingdi.gov.bd', NULL, NULL),
(316, 40, 'Shibpur', 'শিবপুর', 'shibpur.narsingdi.gov.bd', NULL, NULL),
(317, 41, 'Kaliganj', 'কালীগঞ্জ', 'kaliganj.gazipur.gov.bd', NULL, NULL),
(318, 41, 'Kaliakair', 'কালিয়াকৈর', 'kaliakair.gazipur.gov.bd', NULL, NULL),
(319, 41, 'Kapasia', 'কাপাসিয়া', 'kapasia.gazipur.gov.bd', NULL, NULL),
(320, 41, 'Gazipur Sadar', 'গাজীপুর সদর', 'sadar.gazipur.gov.bd', NULL, NULL),
(321, 41, 'Sreepur', 'শ্রীপুর', 'sreepur.gazipur.gov.bd', NULL, NULL),
(322, 42, 'Shariatpur Sadar', 'শরিয়তপুর সদর', 'sadar.shariatpur.gov.bd', NULL, NULL),
(323, 42, 'Naria', 'নড়িয়া', 'naria.shariatpur.gov.bd', NULL, NULL),
(324, 42, 'Zajira', 'জাজিরা', 'zajira.shariatpur.gov.bd', NULL, NULL),
(325, 42, 'Gosairhat', 'গোসাইরহাট', 'gosairhat.shariatpur.gov.bd', NULL, NULL),
(326, 42, 'Bhedarganj', 'ভেদরগঞ্জ', 'bhedarganj.shariatpur.gov.bd', NULL, NULL),
(327, 42, 'Damudya', 'ডামুড্যা', 'damudya.shariatpur.gov.bd', NULL, NULL),
(328, 43, 'Araihazar', 'আড়াইহাজার', 'araihazar.narayanganj.gov.bd', NULL, NULL),
(329, 43, 'Bandar', 'বন্দর', 'bandar.narayanganj.gov.bd', NULL, NULL),
(330, 43, 'Narayanganj Sadar', 'নারায়নগঞ্জ সদর', 'narayanganjsadar.narayanganj.gov.bd', NULL, NULL),
(331, 43, 'Rupganj', 'রূপগঞ্জ', 'rupganj.narayanganj.gov.bd', NULL, NULL),
(332, 43, 'Sonargaon', 'সোনারগাঁ', 'sonargaon.narayanganj.gov.bd', NULL, NULL),
(333, 44, 'Basail', 'বাসাইল', 'basail.tangail.gov.bd', NULL, NULL),
(334, 44, 'Bhuapur', 'ভুয়াপুর', 'bhuapur.tangail.gov.bd', NULL, NULL),
(335, 44, 'Delduar', 'দেলদুয়ার', 'delduar.tangail.gov.bd', NULL, NULL),
(336, 44, 'Ghatail', 'ঘাটাইল', 'ghatail.tangail.gov.bd', NULL, NULL),
(337, 44, 'Gopalpur', 'গোপালপুর', 'gopalpur.tangail.gov.bd', NULL, NULL),
(338, 44, 'Madhupur', 'মধুপুর', 'madhupur.tangail.gov.bd', NULL, NULL),
(339, 44, 'Mirzapur', 'মির্জাপুর', 'mirzapur.tangail.gov.bd', NULL, NULL),
(340, 44, 'Nagarpur', 'নাগরপুর', 'nagarpur.tangail.gov.bd', NULL, NULL),
(341, 44, 'Sakhipur', 'সখিপুর', 'sakhipur.tangail.gov.bd', NULL, NULL),
(342, 44, 'Tangail Sadar', 'টাঙ্গাইল সদর', 'tangailsadar.tangail.gov.bd', NULL, NULL),
(343, 44, 'Kalihati', 'কালিহাতী', 'kalihati.tangail.gov.bd', NULL, NULL),
(344, 44, 'Dhanbari', 'ধনবাড়ী', 'dhanbari.tangail.gov.bd', NULL, NULL),
(345, 45, 'Itna', 'ইটনা', 'itna.kishoreganj.gov.bd', NULL, NULL),
(346, 45, 'Katiadi', 'কটিয়াদী', 'katiadi.kishoreganj.gov.bd', NULL, NULL),
(347, 45, 'Bhairab', 'ভৈরব', 'bhairab.kishoreganj.gov.bd', NULL, NULL),
(348, 45, 'Tarail', 'তাড়াইল', 'tarail.kishoreganj.gov.bd', NULL, NULL),
(349, 45, 'Hossainpur', 'হোসেনপুর', 'hossainpur.kishoreganj.gov.bd', NULL, NULL),
(350, 45, 'Pakundia', 'পাকুন্দিয়া', 'pakundia.kishoreganj.gov.bd', NULL, NULL),
(351, 45, 'Kuliarchar', 'কুলিয়ারচর', 'kuliarchar.kishoreganj.gov.bd', NULL, NULL),
(352, 45, 'Kishoreganj Sadar', 'কিশোরগঞ্জ সদর', 'kishoreganjsadar.kishoreganj.gov.bd', NULL, NULL),
(353, 45, 'Karimgonj', 'করিমগঞ্জ', 'karimgonj.kishoreganj.gov.bd', NULL, NULL),
(354, 45, 'Bajitpur', 'বাজিতপুর', 'bajitpur.kishoreganj.gov.bd', NULL, NULL),
(355, 45, 'Austagram', 'অষ্টগ্রাম', 'austagram.kishoreganj.gov.bd', NULL, NULL),
(356, 45, 'Mithamoin', 'মিঠামইন', 'mithamoin.kishoreganj.gov.bd', NULL, NULL),
(357, 45, 'Nikli', 'নিকলী', 'nikli.kishoreganj.gov.bd', NULL, NULL),
(358, 46, 'Harirampur', 'হরিরামপুর', 'harirampur.manikganj.gov.bd', NULL, NULL),
(359, 46, 'Saturia', 'সাটুরিয়া', 'saturia.manikganj.gov.bd', NULL, NULL),
(360, 46, 'Manikganj Sadar', 'মানিকগঞ্জ সদর', 'sadar.manikganj.gov.bd', NULL, NULL),
(361, 46, 'Gior', 'ঘিওর', 'gior.manikganj.gov.bd', NULL, NULL),
(362, 46, 'Shibaloy', 'শিবালয়', 'shibaloy.manikganj.gov.bd', NULL, NULL),
(363, 46, 'Doulatpur', 'দৌলতপুর', 'doulatpur.manikganj.gov.bd', NULL, NULL),
(364, 46, 'Singiar', 'সিংগাইর', 'singiar.manikganj.gov.bd', NULL, NULL),
(365, 47, 'Savar', 'সাভার', 'savar.dhaka.gov.bd', NULL, NULL),
(366, 47, 'Dhamrai', 'ধামরাই', 'dhamrai.dhaka.gov.bd', NULL, NULL),
(367, 47, 'Keraniganj', 'কেরাণীগঞ্জ', 'keraniganj.dhaka.gov.bd', NULL, NULL),
(368, 47, 'Nawabganj', 'নবাবগঞ্জ', 'nawabganj.dhaka.gov.bd', NULL, NULL),
(369, 47, 'Dohar', 'দোহার', 'dohar.dhaka.gov.bd', NULL, NULL),
(370, 48, 'Munshiganj Sadar', 'মুন্সিগঞ্জ সদর', 'sadar.munshiganj.gov.bd', NULL, NULL),
(371, 48, 'Sreenagar', 'শ্রীনগর', 'sreenagar.munshiganj.gov.bd', NULL, NULL),
(372, 48, 'Sirajdikhan', 'সিরাজদিখান', 'sirajdikhan.munshiganj.gov.bd', NULL, NULL),
(373, 48, 'Louhajanj', 'লৌহজং', 'louhajanj.munshiganj.gov.bd', NULL, NULL),
(374, 48, 'Gajaria', 'গজারিয়া', 'gajaria.munshiganj.gov.bd', NULL, NULL),
(375, 48, 'Tongibari', 'টংগীবাড়ি', 'tongibari.munshiganj.gov.bd', NULL, NULL),
(376, 49, 'Rajbari Sadar', 'রাজবাড়ী সদর', 'sadar.rajbari.gov.bd', NULL, NULL),
(377, 49, 'Goalanda', 'গোয়ালন্দ', 'goalanda.rajbari.gov.bd', NULL, NULL),
(378, 49, 'Pangsa', 'পাংশা', 'pangsa.rajbari.gov.bd', NULL, NULL),
(379, 49, 'Baliakandi', 'বালিয়াকান্দি', 'baliakandi.rajbari.gov.bd', NULL, NULL),
(380, 49, 'Kalukhali', 'কালুখালী', 'kalukhali.rajbari.gov.bd', NULL, NULL),
(381, 50, 'Madaripur Sadar', 'মাদারীপুর সদর', 'sadar.madaripur.gov.bd', NULL, NULL),
(382, 50, 'Shibchar', 'শিবচর', 'shibchar.madaripur.gov.bd', NULL, NULL),
(383, 50, 'Kalkini', 'কালকিনি', 'kalkini.madaripur.gov.bd', NULL, NULL),
(384, 50, 'Rajoir', 'রাজৈর', 'rajoir.madaripur.gov.bd', NULL, NULL),
(385, 51, 'Gopalganj Sadar', 'গোপালগঞ্জ সদর', 'sadar.gopalganj.gov.bd', NULL, NULL),
(386, 51, 'Kashiani', 'কাশিয়ানী', 'kashiani.gopalganj.gov.bd', NULL, NULL),
(387, 51, 'Tungipara', 'টুংগীপাড়া', 'tungipara.gopalganj.gov.bd', NULL, NULL),
(388, 51, 'Kotalipara', 'কোটালীপাড়া', 'kotalipara.gopalganj.gov.bd', NULL, NULL),
(389, 51, 'Muksudpur', 'মুকসুদপুর', 'muksudpur.gopalganj.gov.bd', NULL, NULL),
(390, 52, 'Faridpur Sadar', 'ফরিদপুর সদর', 'sadar.faridpur.gov.bd', NULL, NULL),
(391, 52, 'Alfadanga', 'আলফাডাঙ্গা', 'alfadanga.faridpur.gov.bd', NULL, NULL),
(392, 52, 'Boalmari', 'বোয়ালমারী', 'boalmari.faridpur.gov.bd', NULL, NULL),
(393, 52, 'Sadarpur', 'সদরপুর', 'sadarpur.faridpur.gov.bd', NULL, NULL),
(394, 52, 'Nagarkanda', 'নগরকান্দা', 'nagarkanda.faridpur.gov.bd', NULL, NULL),
(395, 52, 'Bhanga', 'ভাঙ্গা', 'bhanga.faridpur.gov.bd', NULL, NULL),
(396, 52, 'Charbhadrasan', 'চরভদ্রাসন', 'charbhadrasan.faridpur.gov.bd', NULL, NULL),
(397, 52, 'Madhukhali', 'মধুখালী', 'madhukhali.faridpur.gov.bd', NULL, NULL),
(398, 52, 'Saltha', 'সালথা', 'saltha.faridpur.gov.bd', NULL, NULL),
(399, 53, 'Panchagarh Sadar', 'পঞ্চগড় সদর', 'panchagarhsadar.panchagarh.gov.bd', NULL, NULL),
(400, 53, 'Debiganj', 'দেবীগঞ্জ', 'debiganj.panchagarh.gov.bd', NULL, NULL),
(401, 53, 'Boda', 'বোদা', 'boda.panchagarh.gov.bd', NULL, NULL),
(402, 53, 'Atwari', 'আটোয়ারী', 'atwari.panchagarh.gov.bd', NULL, NULL),
(403, 53, 'Tetulia', 'তেতুলিয়া', 'tetulia.panchagarh.gov.bd', NULL, NULL),
(404, 54, 'Nawabganj', 'নবাবগঞ্জ', 'nawabganj.dinajpur.gov.bd', NULL, NULL),
(405, 54, 'Birganj', 'বীরগঞ্জ', 'birganj.dinajpur.gov.bd', NULL, NULL),
(406, 54, 'Ghoraghat', 'ঘোড়াঘাট', 'ghoraghat.dinajpur.gov.bd', NULL, NULL),
(407, 54, 'Birampur', 'বিরামপুর', 'birampur.dinajpur.gov.bd', NULL, NULL),
(408, 54, 'Parbatipur', 'পার্বতীপুর', 'parbatipur.dinajpur.gov.bd', NULL, NULL),
(409, 54, 'Bochaganj', 'বোচাগঞ্জ', 'bochaganj.dinajpur.gov.bd', NULL, NULL),
(410, 54, 'Kaharol', 'কাহারোল', 'kaharol.dinajpur.gov.bd', NULL, NULL),
(411, 54, 'Fulbari', 'ফুলবাড়ী', 'fulbari.dinajpur.gov.bd', NULL, NULL),
(412, 54, 'Dinajpur Sadar', 'দিনাজপুর সদর', 'dinajpursadar.dinajpur.gov.bd', NULL, NULL),
(413, 54, 'Hakimpur', 'হাকিমপুর', 'hakimpur.dinajpur.gov.bd', NULL, NULL),
(414, 54, 'Khansama', 'খানসামা', 'khansama.dinajpur.gov.bd', NULL, NULL),
(415, 54, 'Birol', 'বিরল', 'birol.dinajpur.gov.bd', NULL, NULL),
(416, 54, 'Chirirbandar', 'চিরিরবন্দর', 'chirirbandar.dinajpur.gov.bd', NULL, NULL),
(417, 55, 'Lalmonirhat Sadar', 'লালমনিরহাট সদর', 'sadar.lalmonirhat.gov.bd', NULL, NULL),
(418, 55, 'Kaliganj', 'কালীগঞ্জ', 'kaliganj.lalmonirhat.gov.bd', NULL, NULL),
(419, 55, 'Hatibandha', 'হাতীবান্ধা', 'hatibandha.lalmonirhat.gov.bd', NULL, NULL),
(420, 55, 'Patgram', 'পাটগ্রাম', 'patgram.lalmonirhat.gov.bd', NULL, NULL),
(421, 55, 'Aditmari', 'আদিতমারী', 'aditmari.lalmonirhat.gov.bd', NULL, NULL),
(422, 56, 'Syedpur', 'সৈয়দপুর', 'syedpur.nilphamari.gov.bd', NULL, NULL),
(423, 56, 'Domar', 'ডোমার', 'domar.nilphamari.gov.bd', NULL, NULL),
(424, 56, 'Dimla', 'ডিমলা', 'dimla.nilphamari.gov.bd', NULL, NULL),
(425, 56, 'Jaldhaka', 'জলঢাকা', 'jaldhaka.nilphamari.gov.bd', NULL, NULL),
(426, 56, 'Kishorganj', 'কিশোরগঞ্জ', 'kishorganj.nilphamari.gov.bd', NULL, NULL),
(427, 56, 'Nilphamari Sadar', 'নীলফামারী সদর', 'nilphamarisadar.nilphamari.gov.bd', NULL, NULL),
(428, 57, 'Sadullapur', 'সাদুল্লাপুর', 'sadullapur.gaibandha.gov.bd', NULL, NULL),
(429, 57, 'Gaibandha Sadar', 'গাইবান্ধা সদর', 'gaibandhasadar.gaibandha.gov.bd', NULL, NULL),
(430, 57, 'Palashbari', 'পলাশবাড়ী', 'palashbari.gaibandha.gov.bd', NULL, NULL),
(431, 57, 'Saghata', 'সাঘাটা', 'saghata.gaibandha.gov.bd', NULL, NULL),
(432, 57, 'Gobindaganj', 'গোবিন্দগঞ্জ', 'gobindaganj.gaibandha.gov.bd', NULL, NULL),
(433, 57, 'Sundarganj', 'সুন্দরগঞ্জ', 'sundarganj.gaibandha.gov.bd', NULL, NULL),
(434, 57, 'Phulchari', 'ফুলছড়ি', 'phulchari.gaibandha.gov.bd', NULL, NULL),
(435, 58, 'Thakurgaon Sadar', 'ঠাকুরগাঁও সদর', 'thakurgaonsadar.thakurgaon.gov.bd', NULL, NULL),
(436, 58, 'Pirganj', 'পীরগঞ্জ', 'pirganj.thakurgaon.gov.bd', NULL, NULL),
(437, 58, 'Ranisankail', 'রাণীশংকৈল', 'ranisankail.thakurgaon.gov.bd', NULL, NULL),
(438, 58, 'Haripur', 'হরিপুর', 'haripur.thakurgaon.gov.bd', NULL, NULL),
(439, 58, 'Baliadangi', 'বালিয়াডাঙ্গী', 'baliadangi.thakurgaon.gov.bd', NULL, NULL),
(440, 59, 'Rangpur Sadar', 'রংপুর সদর', 'rangpursadar.rangpur.gov.bd', NULL, NULL),
(441, 59, 'Gangachara', 'গংগাচড়া', 'gangachara.rangpur.gov.bd', NULL, NULL),
(442, 59, 'Taragonj', 'তারাগঞ্জ', 'taragonj.rangpur.gov.bd', NULL, NULL),
(443, 59, 'Badargonj', 'বদরগঞ্জ', 'badargonj.rangpur.gov.bd', NULL, NULL),
(444, 59, 'Mithapukur', 'মিঠাপুকুর', 'mithapukur.rangpur.gov.bd', NULL, NULL),
(445, 59, 'Pirgonj', 'পীরগঞ্জ', 'pirgonj.rangpur.gov.bd', NULL, NULL),
(446, 59, 'Kaunia', 'কাউনিয়া', 'kaunia.rangpur.gov.bd', NULL, NULL),
(447, 59, 'Pirgacha', 'পীরগাছা', 'pirgacha.rangpur.gov.bd', NULL, NULL),
(448, 60, 'Kurigram Sadar', 'কুড়িগ্রাম সদর', 'kurigramsadar.kurigram.gov.bd', NULL, NULL),
(449, 60, 'Nageshwari', 'নাগেশ্বরী', 'nageshwari.kurigram.gov.bd', NULL, NULL),
(450, 60, 'Bhurungamari', 'ভুরুঙ্গামারী', 'bhurungamari.kurigram.gov.bd', NULL, NULL),
(451, 60, 'Phulbari', 'ফুলবাড়ী', 'phulbari.kurigram.gov.bd', NULL, NULL),
(452, 60, 'Rajarhat', 'রাজারহাট', 'rajarhat.kurigram.gov.bd', NULL, NULL),
(453, 60, 'Ulipur', 'উলিপুর', 'ulipur.kurigram.gov.bd', NULL, NULL),
(454, 60, 'Chilmari', 'চিলমারী', 'chilmari.kurigram.gov.bd', NULL, NULL),
(455, 60, 'Rowmari', 'রৌমারী', 'rowmari.kurigram.gov.bd', NULL, NULL),
(456, 60, 'Charrajibpur', 'চর রাজিবপুর', 'charrajibpur.kurigram.gov.bd', NULL, NULL),
(457, 61, 'Sherpur Sadar', 'শেরপুর সদর', 'sherpursadar.sherpur.gov.bd', NULL, NULL),
(458, 61, 'Nalitabari', 'নালিতাবাড়ী', 'nalitabari.sherpur.gov.bd', NULL, NULL),
(459, 61, 'Sreebordi', 'শ্রীবরদী', 'sreebordi.sherpur.gov.bd', NULL, NULL),
(460, 61, 'Nokla', 'নকলা', 'nokla.sherpur.gov.bd', NULL, NULL),
(461, 61, 'Jhenaigati', 'ঝিনাইগাতী', 'jhenaigati.sherpur.gov.bd', NULL, NULL),
(462, 62, 'Fulbaria', 'ফুলবাড়ীয়া', 'fulbaria.mymensingh.gov.bd', NULL, NULL),
(463, 62, 'Trishal', 'ত্রিশাল', 'trishal.mymensingh.gov.bd', NULL, NULL),
(464, 62, 'Bhaluka', 'ভালুকা', 'bhaluka.mymensingh.gov.bd', NULL, NULL),
(465, 62, 'Muktagacha', 'মুক্তাগাছা', 'muktagacha.mymensingh.gov.bd', NULL, NULL),
(466, 62, 'Mymensingh Sadar', 'ময়মনসিংহ সদর', 'mymensinghsadar.mymensingh.gov.bd', NULL, NULL),
(467, 62, 'Dhobaura', 'ধোবাউড়া', 'dhobaura.mymensingh.gov.bd', NULL, NULL),
(468, 62, 'Phulpur', 'ফুলপুর', 'phulpur.mymensingh.gov.bd', NULL, NULL),
(469, 62, 'Haluaghat', 'হালুয়াঘাট', 'haluaghat.mymensingh.gov.bd', NULL, NULL),
(470, 62, 'Gouripur', 'গৌরীপুর', 'gouripur.mymensingh.gov.bd', NULL, NULL),
(471, 62, 'Gafargaon', 'গফরগাঁও', 'gafargaon.mymensingh.gov.bd', NULL, NULL),
(472, 62, 'Iswarganj', 'ঈশ্বরগঞ্জ', 'iswarganj.mymensingh.gov.bd', NULL, NULL),
(473, 62, 'Nandail', 'নান্দাইল', 'nandail.mymensingh.gov.bd', NULL, NULL),
(474, 62, 'Tarakanda', 'তারাকান্দা', 'tarakanda.mymensingh.gov.bd', NULL, NULL),
(475, 63, 'Jamalpur Sadar', 'জামালপুর সদর', 'jamalpursadar.jamalpur.gov.bd', NULL, NULL),
(476, 63, 'Melandah', 'মেলান্দহ', 'melandah.jamalpur.gov.bd', NULL, NULL),
(477, 63, 'Islampur', 'ইসলামপুর', 'islampur.jamalpur.gov.bd', NULL, NULL),
(478, 63, 'Dewangonj', 'দেওয়ানগঞ্জ', 'dewangonj.jamalpur.gov.bd', NULL, NULL),
(479, 63, 'Sarishabari', 'সরিষাবাড়ী', 'sarishabari.jamalpur.gov.bd', NULL, NULL),
(480, 63, 'Madarganj', 'মাদারগঞ্জ', 'madarganj.jamalpur.gov.bd', NULL, NULL),
(481, 63, 'Bokshiganj', 'বকশীগঞ্জ', 'bokshiganj.jamalpur.gov.bd', NULL, NULL),
(482, 64, 'Barhatta', 'বারহাট্টা', 'barhatta.netrokona.gov.bd', NULL, NULL),
(483, 64, 'Durgapur', 'দুর্গাপুর', 'durgapur.netrokona.gov.bd', NULL, NULL),
(484, 64, 'Kendua', 'কেন্দুয়া', 'kendua.netrokona.gov.bd', NULL, NULL),
(485, 64, 'Atpara', 'আটপাড়া', 'atpara.netrokona.gov.bd', NULL, NULL),
(486, 64, 'Madan', 'মদন', 'madan.netrokona.gov.bd', NULL, NULL),
(487, 64, 'Khaliajuri', 'খালিয়াজুরী', 'khaliajuri.netrokona.gov.bd', NULL, NULL),
(488, 64, 'Kalmakanda', 'কলমাকান্দা', 'kalmakanda.netrokona.gov.bd', NULL, NULL),
(489, 64, 'Mohongonj', 'মোহনগঞ্জ', 'mohongonj.netrokona.gov.bd', NULL, NULL),
(490, 64, 'Purbadhala', 'পূর্বধলা', 'purbadhala.netrokona.gov.bd', NULL, NULL),
(491, 64, 'Netrokona Sadar', 'নেত্রকোণা সদর', 'netrokonasadar.netrokona.gov.bd', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `unions`
--

CREATE TABLE `unions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `upazila_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `bn_name` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sp_id` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `sp_representative` varchar(255) DEFAULT NULL,
  `sp_cell_number` varchar(255) DEFAULT NULL,
  `division` varchar(255) DEFAULT NULL,
  `district` varchar(255) DEFAULT NULL,
  `upzila` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 1,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `sp_id`, `name`, `email`, `email_verified_at`, `password`, `sp_representative`, `sp_cell_number`, `division`, `district`, `upzila`, `address`, `role`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'superAdmin', 'Super Admin', 'superadmin@desktopit.com', NULL, '$2y$10$YHoIKCq/PxFXcuWH.meDs.llK436K8a8du9.lCr0IQkFIvDKMA4Dq', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, '2023-01-25 23:45:03', '2023-01-25 23:45:03'),
(2, 'sp-01', 'Super Net', 'supernet@desktopit.com', NULL, '$2y$10$IVjLkXK9SUPx/z9dRggUQOg09NUnCwzvMvzGQDXKbNGYzT0oA/tCa', NULL, NULL, '2', '1', '1', NULL, 1, 1, NULL, '2023-01-25 23:45:03', '2023-01-25 23:45:03'),
(3, 'sp-02', 'Dot Net', 'dotnet@desktopit.com', NULL, '$2y$10$3fA3X658jTqtyQUPFhtF3OwsrNAkd1Vhg2xsPuJtMWZkXbB6zzCI6', NULL, NULL, '6', '1', '1', NULL, 1, 1, NULL, '2023-01-25 23:45:03', '2023-01-25 23:45:03'),
(4, 'sp-0055', 'Test', 'test@gmail.com', NULL, '$2y$10$J0wdg1bubmfimLKL4OlME.eTBgNA4RzXcW6ASF036JMmE1JBJgXwq', 'Test', '01722334455', 'Rangpur', 'Panchagarh', 'Panchagarh Sadar', 'Panchagarh Sadar', 1, 1, NULL, '2023-01-31 04:37:50', '2023-01-31 04:37:50'),
(6, 'sp-0079', 'Test 2', 'test2@gmail.com', NULL, '$2y$10$vaAxhT/5b7pXusIS.thEOOUWPmArQO5JRnh8jYQTSfnD7HJSxI82G', 'Test 2', '01755669988', 'Rajshahi', 'Rajshahi', 'Durgapur', 'Sadar', 1, 1, NULL, '2023-01-31 04:39:11', '2023-01-31 04:39:11'),
(7, 'sp-79', 'test 3', 'test3@gmail.com', NULL, '$2y$10$jiHgaQGLBBhwaca0fy8hVupPK9Glzn9pr7vGkoCE9HB9mslpCaCPa', 'test 3', '0174545454', 'Rangpur', 'Thakurgaon', 'Ranisankail', 'dfdsfs', 1, 1, NULL, '2023-01-31 04:41:00', '2023-01-31 04:41:00'),
(9, 'sp-96', 'test 4', 'test4@gmail.com', NULL, '$2y$10$eMt74wVRopMhB3Sd3.YRtu78yudqorG5TkMnUWpDBiHGnfw6DiUq2', 'test 4', '017555666678', 'Rajshahi', 'Rajshahi', 'Paba', 'address', 1, 1, NULL, '2023-01-31 04:42:21', '2023-01-31 04:42:21'),
(10, 'sp-104', 'test 5', 'test5@gmail.com', NULL, '$2y$10$YiWV0mh.vSorqcjQ9Uq60e4hUfQjOiy5gkTnB.ANf60GUH.tWyjK6', 'test 5', '01755669887', 'Rajshahi', 'Natore', 'Bagatipara', 'Address', 1, 1, NULL, '2023-01-31 04:43:04', '2023-01-31 04:43:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_bill_collections`
--
ALTER TABLE `admin_bill_collections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_packages`
--
ALTER TABLE `admin_packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `area_locations`
--
ALTER TABLE `area_locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collections`
--
ALTER TABLE `collections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `costs`
--
ALTER TABLE `costs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_cell_number_unique` (`cell_number`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `forgot_pin_o_t_p_s`
--
ALTER TABLE `forgot_pin_o_t_p_s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification_customers`
--
ALTER TABLE `notification_customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `registration_o_t_p_s`
--
ALTER TABLE `registration_o_t_p_s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `representatives`
--
ALTER TABLE `representatives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `responsible_areas`
--
ALTER TABLE `responsible_areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surzo_pays`
--
ALTER TABLE `surzo_pays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thanas`
--
ALTER TABLE `thanas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unions`
--
ALTER TABLE `unions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_sp_cell_number_unique` (`sp_cell_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_bill_collections`
--
ALTER TABLE `admin_bill_collections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_packages`
--
ALTER TABLE `admin_packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `area_locations`
--
ALTER TABLE `area_locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `collections`
--
ALTER TABLE `collections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `costs`
--
ALTER TABLE `costs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forgot_pin_o_t_p_s`
--
ALTER TABLE `forgot_pin_o_t_p_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `notification_customers`
--
ALTER TABLE `notification_customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `registration_o_t_p_s`
--
ALTER TABLE `registration_o_t_p_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `representatives`
--
ALTER TABLE `representatives`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `responsible_areas`
--
ALTER TABLE `responsible_areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `surzo_pays`
--
ALTER TABLE `surzo_pays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `thanas`
--
ALTER TABLE `thanas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=492;

--
-- AUTO_INCREMENT for table `unions`
--
ALTER TABLE `unions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
