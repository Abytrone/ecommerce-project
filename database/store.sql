-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 29, 2025 at 01:34 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'shipping',
  `line_1` varchar(255) NOT NULL,
  `line_2` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zip` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `type`, `line_1`, `line_2`, `city`, `state`, `zip`, `created_at`, `updated_at`) VALUES
(1, 1, 'billing', '6172 Travon Track', 'Suite 763', 'South Daytonside', 'West Virginia', '12402-1261', '2025-12-23 08:27:34', '2025-12-23 08:27:34'),
(2, 1, 'billing', '202 Haley Roads', 'Apt. 317', 'Veumtown', 'Washington', '86368', '2025-12-23 08:27:34', '2025-12-23 08:27:34'),
(3, 2, 'shipping', '7951 Lang Cove', 'Suite 773', 'Brandistad', 'Oregon', '42246', '2025-12-23 08:27:34', '2025-12-23 08:27:34'),
(4, 2, 'billing', '7186 Ledner Lake', 'Apt. 859', 'West Guadalupe', 'Florida', '45685-8519', '2025-12-23 08:27:34', '2025-12-23 08:27:34'),
(5, 3, 'billing', '566 Legros Passage', 'Suite 865', 'East Merritt', 'Arkansas', '93865', '2025-12-23 08:27:34', '2025-12-23 08:27:34'),
(6, 3, 'billing', '31261 Hermann Ports', 'Suite 754', 'Johnstonborough', 'South Carolina', '07601-0344', '2025-12-23 08:27:34', '2025-12-23 08:27:34'),
(7, 4, 'billing', '6116 Lubowitz Orchard Apt. 432', 'Suite 225', 'Maiashire', 'Kentucky', '59460', '2025-12-23 08:27:34', '2025-12-23 08:27:34'),
(8, 4, 'shipping', '138 Mertz Oval', 'Suite 073', 'Casperchester', 'Mississippi', '77938', '2025-12-23 08:27:34', '2025-12-23 08:27:34'),
(9, 5, 'billing', '5064 Glenna Mill', 'Suite 081', 'Angelitashire', 'Ohio', '96202-5747', '2025-12-23 08:27:34', '2025-12-23 08:27:34'),
(10, 6, 'shipping', '27056 Effie Meadow', 'Suite 204', 'Gabriellaport', 'Virginia', '56743', '2025-12-23 08:27:34', '2025-12-23 08:27:34'),
(11, 6, 'shipping', '3814 Heidenreich Courts', 'Suite 789', 'New Ervin', 'Nebraska', '26985-3650', '2025-12-23 08:27:34', '2025-12-23 08:27:34'),
(12, 7, 'shipping', '318 Lind Plaza Suite 441', 'Apt. 960', 'Abbeyton', 'Tennessee', '00055', '2025-12-23 08:27:34', '2025-12-23 08:27:34'),
(13, 7, 'shipping', '58270 Bosco Centers Suite 534', 'Suite 323', 'Port Lyda', 'Washington', '97865-5945', '2025-12-23 08:27:34', '2025-12-23 08:27:34'),
(14, 8, 'shipping', '5703 Melody Ferry', 'Suite 189', 'New Justus', 'North Dakota', '56942', '2025-12-23 08:27:34', '2025-12-23 08:27:34'),
(15, 9, 'billing', '334 Wolf Mews Apt. 414', 'Apt. 544', 'Kozeybury', 'Washington', '42278-8923', '2025-12-23 08:27:34', '2025-12-23 08:27:34'),
(16, 9, 'billing', '6196 Kayleigh Underpass', 'Apt. 746', 'Diegohaven', 'Idaho', '94201', '2025-12-23 08:27:34', '2025-12-23 08:27:34'),
(17, 10, 'shipping', '422 Peyton Rapid Apt. 640', 'Suite 107', 'Emardstad', 'Ohio', '20211', '2025-12-23 08:27:34', '2025-12-23 08:27:34'),
(18, 11, 'shipping', 'K 625 Kalpohini', NULL, 'Tamale', 'North', '00233', '2025-12-24 07:40:08', '2025-12-24 07:40:08'),
(19, 12, 'shipping', 'K 625 Kalpohini', NULL, 'Tamale', 'Northern Region', '00233', '2025-12-26 11:24:16', '2025-12-26 11:24:16');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('anchor-stationery-cache-livewire-rate-limiter:a17961fa74e9275d529f489537f179c05d50c2f3', 'i:1;', 1767009418),
('anchor-stationery-cache-livewire-rate-limiter:a17961fa74e9275d529f489537f179c05d50c2f3:timer', 'i:1767009418;', 1767009418),
('anchor-stationery-cache-spatie.permission.cache', 'a:3:{s:5:\"alias\";a:4:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:10:\"guard_name\";s:1:\"r\";s:5:\"roles\";}s:11:\"permissions\";a:90:{i:0;a:4:{s:1:\"a\";i:1;s:1:\"b\";s:13:\"view_category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:1;a:4:{s:1:\"a\";i:2;s:1:\"b\";s:17:\"view_any_category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:2;a:4:{s:1:\"a\";i:3;s:1:\"b\";s:15:\"create_category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:3;a:4:{s:1:\"a\";i:4;s:1:\"b\";s:15:\"update_category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:4;a:4:{s:1:\"a\";i:5;s:1:\"b\";s:16:\"restore_category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:5;a:4:{s:1:\"a\";i:6;s:1:\"b\";s:20:\"restore_any_category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:6;a:4:{s:1:\"a\";i:7;s:1:\"b\";s:18:\"replicate_category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:7;a:4:{s:1:\"a\";i:8;s:1:\"b\";s:16:\"reorder_category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:8;a:4:{s:1:\"a\";i:9;s:1:\"b\";s:15:\"delete_category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:9;a:4:{s:1:\"a\";i:10;s:1:\"b\";s:19:\"delete_any_category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:10;a:4:{s:1:\"a\";i:11;s:1:\"b\";s:21:\"force_delete_category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:11;a:4:{s:1:\"a\";i:12;s:1:\"b\";s:25:\"force_delete_any_category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:12;a:4:{s:1:\"a\";i:13;s:1:\"b\";s:10:\"view_order\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:13;a:4:{s:1:\"a\";i:14;s:1:\"b\";s:14:\"view_any_order\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:14;a:4:{s:1:\"a\";i:15;s:1:\"b\";s:12:\"create_order\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:15;a:4:{s:1:\"a\";i:16;s:1:\"b\";s:12:\"update_order\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:16;a:4:{s:1:\"a\";i:17;s:1:\"b\";s:13:\"restore_order\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:17;a:4:{s:1:\"a\";i:18;s:1:\"b\";s:17:\"restore_any_order\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:18;a:4:{s:1:\"a\";i:19;s:1:\"b\";s:15:\"replicate_order\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:19;a:4:{s:1:\"a\";i:20;s:1:\"b\";s:13:\"reorder_order\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:20;a:4:{s:1:\"a\";i:21;s:1:\"b\";s:12:\"delete_order\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:21;a:4:{s:1:\"a\";i:22;s:1:\"b\";s:16:\"delete_any_order\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:22;a:4:{s:1:\"a\";i:23;s:1:\"b\";s:18:\"force_delete_order\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:23;a:4:{s:1:\"a\";i:24;s:1:\"b\";s:22:\"force_delete_any_order\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:24;a:4:{s:1:\"a\";i:25;s:1:\"b\";s:12:\"view_product\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:25;a:4:{s:1:\"a\";i:26;s:1:\"b\";s:16:\"view_any_product\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:26;a:4:{s:1:\"a\";i:27;s:1:\"b\";s:14:\"create_product\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:27;a:4:{s:1:\"a\";i:28;s:1:\"b\";s:14:\"update_product\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:28;a:4:{s:1:\"a\";i:29;s:1:\"b\";s:15:\"restore_product\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:29;a:4:{s:1:\"a\";i:30;s:1:\"b\";s:19:\"restore_any_product\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:30;a:4:{s:1:\"a\";i:31;s:1:\"b\";s:17:\"replicate_product\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:31;a:4:{s:1:\"a\";i:32;s:1:\"b\";s:15:\"reorder_product\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:32;a:4:{s:1:\"a\";i:33;s:1:\"b\";s:14:\"delete_product\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:33;a:4:{s:1:\"a\";i:34;s:1:\"b\";s:18:\"delete_any_product\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:34;a:4:{s:1:\"a\";i:35;s:1:\"b\";s:20:\"force_delete_product\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:35;a:4:{s:1:\"a\";i:36;s:1:\"b\";s:24:\"force_delete_any_product\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:36;a:4:{s:1:\"a\";i:37;s:1:\"b\";s:9:\"view_role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:37;a:4:{s:1:\"a\";i:38;s:1:\"b\";s:13:\"view_any_role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:38;a:4:{s:1:\"a\";i:39;s:1:\"b\";s:11:\"create_role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:39;a:4:{s:1:\"a\";i:40;s:1:\"b\";s:11:\"update_role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:40;a:4:{s:1:\"a\";i:41;s:1:\"b\";s:11:\"delete_role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:41;a:4:{s:1:\"a\";i:42;s:1:\"b\";s:15:\"delete_any_role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:42;a:4:{s:1:\"a\";i:43;s:1:\"b\";s:16:\"view_transaction\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:43;a:4:{s:1:\"a\";i:44;s:1:\"b\";s:20:\"view_any_transaction\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:44;a:4:{s:1:\"a\";i:45;s:1:\"b\";s:18:\"create_transaction\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:45;a:4:{s:1:\"a\";i:46;s:1:\"b\";s:18:\"update_transaction\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:46;a:4:{s:1:\"a\";i:47;s:1:\"b\";s:19:\"restore_transaction\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:47;a:4:{s:1:\"a\";i:48;s:1:\"b\";s:23:\"restore_any_transaction\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:48;a:4:{s:1:\"a\";i:49;s:1:\"b\";s:21:\"replicate_transaction\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:49;a:4:{s:1:\"a\";i:50;s:1:\"b\";s:19:\"reorder_transaction\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:50;a:4:{s:1:\"a\";i:51;s:1:\"b\";s:18:\"delete_transaction\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:51;a:4:{s:1:\"a\";i:52;s:1:\"b\";s:22:\"delete_any_transaction\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:52;a:4:{s:1:\"a\";i:53;s:1:\"b\";s:24:\"force_delete_transaction\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:53;a:4:{s:1:\"a\";i:54;s:1:\"b\";s:28:\"force_delete_any_transaction\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:54;a:4:{s:1:\"a\";i:55;s:1:\"b\";s:9:\"view_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:55;a:4:{s:1:\"a\";i:56;s:1:\"b\";s:13:\"view_any_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:56;a:4:{s:1:\"a\";i:57;s:1:\"b\";s:11:\"create_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:57;a:4:{s:1:\"a\";i:58;s:1:\"b\";s:11:\"update_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:58;a:4:{s:1:\"a\";i:59;s:1:\"b\";s:12:\"restore_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:59;a:4:{s:1:\"a\";i:60;s:1:\"b\";s:16:\"restore_any_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:60;a:4:{s:1:\"a\";i:61;s:1:\"b\";s:14:\"replicate_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:61;a:4:{s:1:\"a\";i:62;s:1:\"b\";s:12:\"reorder_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:62;a:4:{s:1:\"a\";i:63;s:1:\"b\";s:11:\"delete_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:63;a:4:{s:1:\"a\";i:64;s:1:\"b\";s:15:\"delete_any_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:64;a:4:{s:1:\"a\";i:65;s:1:\"b\";s:17:\"force_delete_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:65;a:4:{s:1:\"a\";i:66;s:1:\"b\";s:21:\"force_delete_any_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:66;a:4:{s:1:\"a\";i:67;s:1:\"b\";s:21:\"view_contact::message\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:67;a:4:{s:1:\"a\";i:68;s:1:\"b\";s:25:\"view_any_contact::message\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:68;a:3:{s:1:\"a\";i:69;s:1:\"b\";s:23:\"create_contact::message\";s:1:\"c\";s:3:\"web\";}i:69;a:3:{s:1:\"a\";i:70;s:1:\"b\";s:23:\"update_contact::message\";s:1:\"c\";s:3:\"web\";}i:70;a:4:{s:1:\"a\";i:71;s:1:\"b\";s:24:\"restore_contact::message\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:71;a:4:{s:1:\"a\";i:72;s:1:\"b\";s:28:\"restore_any_contact::message\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:72;a:4:{s:1:\"a\";i:73;s:1:\"b\";s:26:\"replicate_contact::message\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:73;a:4:{s:1:\"a\";i:74;s:1:\"b\";s:24:\"reorder_contact::message\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:74;a:4:{s:1:\"a\";i:75;s:1:\"b\";s:23:\"delete_contact::message\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:75;a:4:{s:1:\"a\";i:76;s:1:\"b\";s:27:\"delete_any_contact::message\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:76;a:4:{s:1:\"a\";i:77;s:1:\"b\";s:29:\"force_delete_contact::message\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:77;a:4:{s:1:\"a\";i:78;s:1:\"b\";s:33:\"force_delete_any_contact::message\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:78;a:4:{s:1:\"a\";i:79;s:1:\"b\";s:15:\"view_subscriber\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:79;a:4:{s:1:\"a\";i:80;s:1:\"b\";s:19:\"view_any_subscriber\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:80;a:3:{s:1:\"a\";i:81;s:1:\"b\";s:17:\"create_subscriber\";s:1:\"c\";s:3:\"web\";}i:81;a:3:{s:1:\"a\";i:82;s:1:\"b\";s:17:\"update_subscriber\";s:1:\"c\";s:3:\"web\";}i:82;a:4:{s:1:\"a\";i:83;s:1:\"b\";s:18:\"restore_subscriber\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:83;a:4:{s:1:\"a\";i:84;s:1:\"b\";s:22:\"restore_any_subscriber\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:84;a:4:{s:1:\"a\";i:85;s:1:\"b\";s:20:\"replicate_subscriber\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:85;a:4:{s:1:\"a\";i:86;s:1:\"b\";s:18:\"reorder_subscriber\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:86;a:4:{s:1:\"a\";i:87;s:1:\"b\";s:17:\"delete_subscriber\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:87;a:4:{s:1:\"a\";i:88;s:1:\"b\";s:21:\"delete_any_subscriber\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:88;a:4:{s:1:\"a\";i:89;s:1:\"b\";s:23:\"force_delete_subscriber\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:89;a:4:{s:1:\"a\";i:90;s:1:\"b\";s:27:\"force_delete_any_subscriber\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}}s:5:\"roles\";a:1:{i:0;a:3:{s:1:\"a\";i:1;s:1:\"b\";s:11:\"super_admin\";s:1:\"c\";s:3:\"web\";}}}', 1767034104);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `color` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `color`, `icon`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Writing Instruments', 'writing-instruments', '#14b8a6', 'heroicon-o-pencil', 1, '2025-12-23 08:27:33', '2025-12-23 08:27:33'),
(2, 'Premium Notebooks', 'premium-notebooks', '#f59e0b', 'heroicon-o-book-open', 1, '2025-12-23 08:27:33', '2025-12-23 08:27:33'),
(3, 'Desk Accessories', 'desk-accessories', '#6366f1', 'heroicon-o-computer-desktop', 1, '2025-12-23 08:27:33', '2025-12-23 08:27:33'),
(4, 'Art Supplies', 'art-supplies', '#ec4899', 'heroicon-o-paint-brush', 1, '2025-12-23 08:27:33', '2025-12-23 08:27:33');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `first_name`, `last_name`, `email`, `phone`, `subject`, `message`, `read_at`, `created_at`, `updated_at`) VALUES
(1, 'FixVerify', 'Verify', 'fix@example.com', NULL, 'FixSubject', 'Fixed message', NULL, NULL, NULL);

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_12_18_155602_create_categories_table', 1),
(5, '2025_12_18_155602_create_products_table', 1),
(6, '2025_12_18_155603_create_orders_table', 1),
(7, '2025_12_18_155604_create_order_items_table', 1),
(8, '2025_12_18_155605_create_addresses_table', 1),
(9, '2025_12_18_161643_create_permission_tables', 1),
(10, '2025_12_18_171422_create_transactions_table', 1),
(11, '2025_12_23_161453_create_contact_messages_table', 2),
(12, '2025_12_23_161454_create_subscribers_table', 2),
(13, '2025_12_24_072250_add_address_fields_to_orders_table', 3),
(14, '2025_12_26_120000_add_id_and_timestamps_to_contact_messages_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 11);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `number` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `currency` varchar(255) NOT NULL DEFAULT 'usd',
  `total_price` decimal(12,2) DEFAULT NULL,
  `shipping_price` decimal(12,2) DEFAULT NULL,
  `shipping_method` varchar(255) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `shipping_first_name` varchar(255) DEFAULT NULL,
  `shipping_last_name` varchar(255) DEFAULT NULL,
  `shipping_email` varchar(255) DEFAULT NULL,
  `shipping_line_1` varchar(255) DEFAULT NULL,
  `shipping_line_2` varchar(255) DEFAULT NULL,
  `shipping_city` varchar(255) DEFAULT NULL,
  `shipping_state` varchar(255) DEFAULT NULL,
  `shipping_zip` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `number`, `status`, `currency`, `total_price`, `shipping_price`, `shipping_method`, `notes`, `created_at`, `updated_at`, `shipping_first_name`, `shipping_last_name`, `shipping_email`, `shipping_line_1`, `shipping_line_2`, `shipping_city`, `shipping_state`, `shipping_zip`) VALUES
(1, 1, 'OR-653731', 'pending', 'usd', 274.01, 12.89, 'Next Day', 'Incidunt ipsam sapiente numquam magnam possimus voluptatem.', '2025-12-23 08:27:34', '2025-12-23 08:27:34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 1, 'OR-726663', 'cancelled', 'usd', 386.82, 9.83, 'Express', 'Quia reprehenderit repellat eaque est vel.', '2025-12-23 08:27:34', '2025-12-23 08:27:34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 1, 'OR-669713', 'delivered', 'usd', 209.80, 8.72, 'Standard', 'Nostrum cumque dolores est qui.', '2025-12-23 08:27:34', '2025-12-23 08:27:34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 1, 'OR-300069', 'cancelled', 'usd', 485.42, 12.89, 'Express', 'Aut labore labore rerum libero.', '2025-12-23 08:27:34', '2025-12-23 08:27:34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 1, 'OR-351655', 'delivered', 'usd', 31.30, 7.48, 'Express', 'Molestias architecto id totam illum.', '2025-12-23 08:27:34', '2025-12-23 08:27:34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 2, 'OR-633462', 'shipped', 'usd', 497.95, 11.72, 'Express', 'Nesciunt aut dolorem occaecati.', '2025-12-23 08:27:34', '2025-12-23 08:27:34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 2, 'OR-979811', 'processing', 'usd', 229.94, 19.55, 'Standard', 'Quia alias consequatur assumenda non quia consequatur sit error.', '2025-12-23 08:27:34', '2025-12-23 08:27:34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 2, 'OR-629735', 'processing', 'usd', 87.41, 9.51, 'Express', 'Molestiae nulla tenetur ut quod quia quis.', '2025-12-23 08:27:34', '2025-12-23 08:27:34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 3, 'OR-945823', 'delivered', 'usd', 118.31, 9.83, 'Next Day', 'Qui blanditiis porro fuga sunt.', '2025-12-23 08:27:34', '2025-12-23 08:27:34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 3, 'OR-148871', 'processing', 'usd', 95.04, 5.84, 'Express', 'Possimus sit voluptatibus unde est ea quo et.', '2025-12-23 08:27:34', '2025-12-23 08:27:34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 3, 'OR-688898', 'cancelled', 'usd', 242.71, 12.86, 'Standard', 'Odio ab ab aspernatur quibusdam.', '2025-12-23 08:27:34', '2025-12-23 08:27:34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 3, 'OR-519512', 'processing', 'usd', 40.60, 10.43, 'Express', 'Iure assumenda dolores eaque et voluptatem sit quis.', '2025-12-23 08:27:34', '2025-12-23 08:27:34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 3, 'OR-836034', 'cancelled', 'usd', 272.63, 16.73, 'Standard', 'Et odit perspiciatis temporibus eligendi maiores saepe.', '2025-12-23 08:27:34', '2025-12-23 08:27:34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 4, 'OR-291983', 'cancelled', 'usd', 150.48, 15.83, 'Express', 'Aut saepe molestiae vero.', '2025-12-23 08:27:34', '2025-12-23 08:27:34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 4, 'OR-497643', 'pending', 'usd', 485.90, 14.80, 'Standard', 'Qui laboriosam qui earum non blanditiis quis.', '2025-12-23 08:27:34', '2025-12-23 08:27:34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 4, 'OR-675675', 'processing', 'usd', 153.67, 6.27, 'Next Day', 'Ipsa mollitia iusto fuga dolores itaque quia et.', '2025-12-23 08:27:34', '2025-12-23 08:27:34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 5, 'OR-629235', 'shipped', 'usd', 179.42, 8.56, 'Next Day', 'Earum dolores modi culpa eos dolorem.', '2025-12-23 08:27:34', '2025-12-23 08:27:34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 5, 'OR-412058', 'shipped', 'usd', 475.61, 6.55, 'Next Day', 'Officia ullam ipsam et a minima consectetur consectetur et.', '2025-12-23 08:27:34', '2025-12-23 08:27:34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 5, 'OR-662647', 'pending', 'usd', 347.87, 14.75, 'Express', 'Et animi omnis aut consequatur possimus rem harum.', '2025-12-23 08:27:34', '2025-12-23 08:27:34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 5, 'OR-567682', 'delivered', 'usd', 341.51, 10.40, 'Express', 'Nemo maxime rerum perspiciatis vero qui velit.', '2025-12-23 08:27:34', '2025-12-23 08:27:34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 6, 'OR-805717', 'delivered', 'usd', 439.15, 6.41, 'Express', 'Doloremque aut reiciendis est magni rerum quia.', '2025-12-23 08:27:34', '2025-12-23 08:27:34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 7, 'OR-757539', 'pending', 'usd', 78.05, 17.05, 'Express', 'Voluptatibus officiis dolorem quo.', '2025-12-23 08:27:34', '2025-12-23 08:27:34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 7, 'OR-277634', 'cancelled', 'usd', 140.36, 10.17, 'Express', 'Exercitationem quasi eveniet facilis fugit.', '2025-12-23 08:27:34', '2025-12-23 08:27:34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 7, 'OR-644853', 'shipped', 'usd', 442.59, 8.32, 'Standard', 'Possimus voluptas unde itaque ad error autem.', '2025-12-23 08:27:34', '2025-12-23 08:27:34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 8, 'OR-283559', 'delivered', 'usd', 71.25, 9.92, 'Next Day', 'Et temporibus labore perspiciatis fugit perspiciatis.', '2025-12-23 08:27:34', '2025-12-23 08:27:34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 9, 'OR-700396', 'cancelled', 'usd', 268.94, 11.08, 'Standard', 'Qui aut aut dolores distinctio ut delectus.', '2025-12-23 08:27:34', '2025-12-23 08:27:34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 10, 'OR-452359', 'shipped', 'usd', 65.79, 7.83, 'Standard', 'Inventore suscipit assumenda rerum sit in molestiae rerum.', '2025-12-23 08:27:34', '2025-12-23 08:27:34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 10, 'OR-533903', 'shipped', 'usd', 499.26, 9.02, 'Next Day', 'Minima sequi qui deleniti.', '2025-12-23 08:27:34', '2025-12-23 08:27:34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 11, 'OR-694AE014C4B97', 'pending', 'usd', 45.00, 0.00, 'Standard', 'Placed via Checkout', '2025-12-23 18:31:48', '2025-12-23 18:31:48', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 11, 'OR-694B98D81360F', 'delivered', 'usd', 12.50, 0.00, 'Standard', 'Placed via Checkout', '2025-12-24 07:40:08', '2025-12-24 08:12:41', 'Admin', 'User', 'admin@anchor.com', 'K 625 Kalpohini', NULL, 'Tamale', 'North', '00233'),
(31, 11, 'OR-5NJTSVQGSA', 'pending', 'GHS', 35.00, 0.00, 'Standard', 'Placed via Checkout', '2025-12-24 08:10:29', '2025-12-24 08:10:29', 'Admin', 'User', 'admin@anchor.com', 'K 625 Kalpohini', NULL, 'Tamale', 'North', '00233'),
(32, 12, 'OR-XTP5XRSIGS', 'delivered', 'GHS', 57.50, 0.00, 'Standard', 'Placed via Checkout', '2025-12-26 11:24:16', '2025-12-26 11:54:07', 'Abdul Basit', 'Yahaya', 'abytrone@gmail.com', 'K 625 Kalpohini', NULL, 'Tamale', 'Northern Region', '00233');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` decimal(10,2) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `unit_price`, `total_price`, `created_at`, `updated_at`) VALUES
(1, 29, 1, 1, 45.00, 45.00, '2025-12-23 18:31:48', '2025-12-23 18:31:48'),
(2, 30, 2, 1, 12.50, 12.50, '2025-12-24 07:40:08', '2025-12-24 07:40:08'),
(3, 31, 3, 1, 35.00, 35.00, '2025-12-24 08:10:29', '2025-12-24 08:10:29'),
(4, 32, 1, 1, 45.00, 45.00, '2025-12-26 11:24:16', '2025-12-26 11:24:16'),
(5, 32, 2, 1, 12.50, 12.50, '2025-12-26 11:24:16', '2025-12-26 11:24:16');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'view_category', 'web', '2025-12-23 08:28:51', '2025-12-23 08:28:51'),
(2, 'view_any_category', 'web', '2025-12-23 08:28:51', '2025-12-23 08:28:51'),
(3, 'create_category', 'web', '2025-12-23 08:28:51', '2025-12-23 08:28:51'),
(4, 'update_category', 'web', '2025-12-23 08:28:51', '2025-12-23 08:28:51'),
(5, 'restore_category', 'web', '2025-12-23 08:28:51', '2025-12-23 08:28:51'),
(6, 'restore_any_category', 'web', '2025-12-23 08:28:51', '2025-12-23 08:28:51'),
(7, 'replicate_category', 'web', '2025-12-23 08:28:51', '2025-12-23 08:28:51'),
(8, 'reorder_category', 'web', '2025-12-23 08:28:51', '2025-12-23 08:28:51'),
(9, 'delete_category', 'web', '2025-12-23 08:28:51', '2025-12-23 08:28:51'),
(10, 'delete_any_category', 'web', '2025-12-23 08:28:51', '2025-12-23 08:28:51'),
(11, 'force_delete_category', 'web', '2025-12-23 08:28:51', '2025-12-23 08:28:51'),
(12, 'force_delete_any_category', 'web', '2025-12-23 08:28:51', '2025-12-23 08:28:51'),
(13, 'view_order', 'web', '2025-12-23 08:28:51', '2025-12-23 08:28:51'),
(14, 'view_any_order', 'web', '2025-12-23 08:28:51', '2025-12-23 08:28:51'),
(15, 'create_order', 'web', '2025-12-23 08:28:51', '2025-12-23 08:28:51'),
(16, 'update_order', 'web', '2025-12-23 08:28:51', '2025-12-23 08:28:51'),
(17, 'restore_order', 'web', '2025-12-23 08:28:51', '2025-12-23 08:28:51'),
(18, 'restore_any_order', 'web', '2025-12-23 08:28:51', '2025-12-23 08:28:51'),
(19, 'replicate_order', 'web', '2025-12-23 08:28:51', '2025-12-23 08:28:51'),
(20, 'reorder_order', 'web', '2025-12-23 08:28:51', '2025-12-23 08:28:51'),
(21, 'delete_order', 'web', '2025-12-23 08:28:51', '2025-12-23 08:28:51'),
(22, 'delete_any_order', 'web', '2025-12-23 08:28:51', '2025-12-23 08:28:51'),
(23, 'force_delete_order', 'web', '2025-12-23 08:28:51', '2025-12-23 08:28:51'),
(24, 'force_delete_any_order', 'web', '2025-12-23 08:28:51', '2025-12-23 08:28:51'),
(25, 'view_product', 'web', '2025-12-23 08:28:51', '2025-12-23 08:28:51'),
(26, 'view_any_product', 'web', '2025-12-23 08:28:51', '2025-12-23 08:28:51'),
(27, 'create_product', 'web', '2025-12-23 08:28:51', '2025-12-23 08:28:51'),
(28, 'update_product', 'web', '2025-12-23 08:28:51', '2025-12-23 08:28:51'),
(29, 'restore_product', 'web', '2025-12-23 08:28:51', '2025-12-23 08:28:51'),
(30, 'restore_any_product', 'web', '2025-12-23 08:28:51', '2025-12-23 08:28:51'),
(31, 'replicate_product', 'web', '2025-12-23 08:28:51', '2025-12-23 08:28:51'),
(32, 'reorder_product', 'web', '2025-12-23 08:28:51', '2025-12-23 08:28:51'),
(33, 'delete_product', 'web', '2025-12-23 08:28:51', '2025-12-23 08:28:51'),
(34, 'delete_any_product', 'web', '2025-12-23 08:28:51', '2025-12-23 08:28:51'),
(35, 'force_delete_product', 'web', '2025-12-23 08:28:51', '2025-12-23 08:28:51'),
(36, 'force_delete_any_product', 'web', '2025-12-23 08:28:51', '2025-12-23 08:28:51'),
(37, 'view_role', 'web', '2025-12-23 08:28:51', '2025-12-23 08:28:51'),
(38, 'view_any_role', 'web', '2025-12-23 08:28:51', '2025-12-23 08:28:51'),
(39, 'create_role', 'web', '2025-12-23 08:28:51', '2025-12-23 08:28:51'),
(40, 'update_role', 'web', '2025-12-23 08:28:51', '2025-12-23 08:28:51'),
(41, 'delete_role', 'web', '2025-12-23 08:28:51', '2025-12-23 08:28:51'),
(42, 'delete_any_role', 'web', '2025-12-23 08:28:51', '2025-12-23 08:28:51'),
(43, 'view_transaction', 'web', '2025-12-23 08:28:51', '2025-12-23 08:28:51'),
(44, 'view_any_transaction', 'web', '2025-12-23 08:28:51', '2025-12-23 08:28:51'),
(45, 'create_transaction', 'web', '2025-12-23 08:28:51', '2025-12-23 08:28:51'),
(46, 'update_transaction', 'web', '2025-12-23 08:28:51', '2025-12-23 08:28:51'),
(47, 'restore_transaction', 'web', '2025-12-23 08:28:51', '2025-12-23 08:28:51'),
(48, 'restore_any_transaction', 'web', '2025-12-23 08:28:51', '2025-12-23 08:28:51'),
(49, 'replicate_transaction', 'web', '2025-12-23 08:28:51', '2025-12-23 08:28:51'),
(50, 'reorder_transaction', 'web', '2025-12-23 08:28:51', '2025-12-23 08:28:51'),
(51, 'delete_transaction', 'web', '2025-12-23 08:28:51', '2025-12-23 08:28:51'),
(52, 'delete_any_transaction', 'web', '2025-12-23 08:28:51', '2025-12-23 08:28:51'),
(53, 'force_delete_transaction', 'web', '2025-12-23 08:28:51', '2025-12-23 08:28:51'),
(54, 'force_delete_any_transaction', 'web', '2025-12-23 08:28:51', '2025-12-23 08:28:51'),
(55, 'view_user', 'web', '2025-12-23 08:28:51', '2025-12-23 08:28:51'),
(56, 'view_any_user', 'web', '2025-12-23 08:28:51', '2025-12-23 08:28:51'),
(57, 'create_user', 'web', '2025-12-23 08:28:51', '2025-12-23 08:28:51'),
(58, 'update_user', 'web', '2025-12-23 08:28:51', '2025-12-23 08:28:51'),
(59, 'restore_user', 'web', '2025-12-23 08:28:51', '2025-12-23 08:28:51'),
(60, 'restore_any_user', 'web', '2025-12-23 08:28:51', '2025-12-23 08:28:51'),
(61, 'replicate_user', 'web', '2025-12-23 08:28:51', '2025-12-23 08:28:51'),
(62, 'reorder_user', 'web', '2025-12-23 08:28:51', '2025-12-23 08:28:51'),
(63, 'delete_user', 'web', '2025-12-23 08:28:51', '2025-12-23 08:28:51'),
(64, 'delete_any_user', 'web', '2025-12-23 08:28:51', '2025-12-23 08:28:51'),
(65, 'force_delete_user', 'web', '2025-12-23 08:28:51', '2025-12-23 08:28:51'),
(66, 'force_delete_any_user', 'web', '2025-12-23 08:28:51', '2025-12-23 08:28:51'),
(67, 'view_contact::message', 'web', '2025-12-26 11:59:25', '2025-12-26 11:59:25'),
(68, 'view_any_contact::message', 'web', '2025-12-26 11:59:25', '2025-12-26 11:59:25'),
(69, 'create_contact::message', 'web', '2025-12-26 11:59:25', '2025-12-26 11:59:25'),
(70, 'update_contact::message', 'web', '2025-12-26 11:59:25', '2025-12-26 11:59:25'),
(71, 'restore_contact::message', 'web', '2025-12-26 11:59:25', '2025-12-26 11:59:25'),
(72, 'restore_any_contact::message', 'web', '2025-12-26 11:59:25', '2025-12-26 11:59:25'),
(73, 'replicate_contact::message', 'web', '2025-12-26 11:59:25', '2025-12-26 11:59:25'),
(74, 'reorder_contact::message', 'web', '2025-12-26 11:59:25', '2025-12-26 11:59:25'),
(75, 'delete_contact::message', 'web', '2025-12-26 11:59:25', '2025-12-26 11:59:25'),
(76, 'delete_any_contact::message', 'web', '2025-12-26 11:59:25', '2025-12-26 11:59:25'),
(77, 'force_delete_contact::message', 'web', '2025-12-26 11:59:25', '2025-12-26 11:59:25'),
(78, 'force_delete_any_contact::message', 'web', '2025-12-26 11:59:25', '2025-12-26 11:59:25'),
(79, 'view_subscriber', 'web', '2025-12-26 11:59:25', '2025-12-26 11:59:25'),
(80, 'view_any_subscriber', 'web', '2025-12-26 11:59:25', '2025-12-26 11:59:25'),
(81, 'create_subscriber', 'web', '2025-12-26 11:59:25', '2025-12-26 11:59:25'),
(82, 'update_subscriber', 'web', '2025-12-26 11:59:25', '2025-12-26 11:59:25'),
(83, 'restore_subscriber', 'web', '2025-12-26 11:59:25', '2025-12-26 11:59:25'),
(84, 'restore_any_subscriber', 'web', '2025-12-26 11:59:25', '2025-12-26 11:59:25'),
(85, 'replicate_subscriber', 'web', '2025-12-26 11:59:25', '2025-12-26 11:59:25'),
(86, 'reorder_subscriber', 'web', '2025-12-26 11:59:25', '2025-12-26 11:59:25'),
(87, 'delete_subscriber', 'web', '2025-12-26 11:59:25', '2025-12-26 11:59:25'),
(88, 'delete_any_subscriber', 'web', '2025-12-26 11:59:25', '2025-12-26 11:59:25'),
(89, 'force_delete_subscriber', 'web', '2025-12-26 11:59:25', '2025-12-26 11:59:25'),
(90, 'force_delete_any_subscriber', 'web', '2025-12-26 11:59:25', '2025-12-26 11:59:25');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `sku` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `cost_price` decimal(10,2) DEFAULT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `security_stock` int(11) NOT NULL DEFAULT 0,
  `is_visible` tinyint(1) NOT NULL DEFAULT 0,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `published_at` date DEFAULT NULL,
  `images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`images`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `sku`, `description`, `price`, `cost_price`, `stock`, `security_stock`, `is_visible`, `is_featured`, `published_at`, `images`, `created_at`, `updated_at`) VALUES
(1, 1, 'Urbanist Fountain Pen', 'urbanist-fountain-pen', 'PEN-001', 'A sleek, modern fountain pen with a matte black finish and gold accents.', 45.00, 20.00, 100, 0, 1, 1, NULL, '[\"products\\/01KD558QVKHQK9J05FA9PMYTC6.jpeg\",\"products\\/01KD55TZPP2W6BCFR5HB6RW7ZP.jpeg\"]', '2025-12-23 08:27:33', '2025-12-23 08:39:59'),
(2, 1, 'Gel Ink Rollerball Set', 'gel-ink-rollerball-set', 'PEN-002', 'Set of 5 smooth-writing gel pens in assorted vibrant colors.', 12.50, 5.00, 500, 0, 1, 0, NULL, NULL, '2025-12-23 08:27:33', '2025-12-23 08:27:33'),
(3, 2, 'Leather Bound Journal', 'leather-bound-journal', 'NB-001', 'Handcrafted genuine leather journal with 100gsm cream paper.', 35.00, 15.00, 50, 0, 1, 1, NULL, NULL, '2025-12-23 08:27:33', '2025-12-23 08:27:33'),
(4, 3, 'Minimalist Desk Organizer', 'minimalist-desk-organizer', 'DA-001', 'Keep your workspace tidy with this wooden desk organizer.', 28.00, 12.00, 30, 0, 1, 0, NULL, NULL, '2025-12-23 08:27:33', '2025-12-23 08:27:33');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'super_admin', 'web', '2025-12-23 08:27:34', '2025-12-23 08:27:34');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(63, 1),
(64, 1),
(65, 1),
(66, 1),
(67, 1),
(68, 1),
(71, 1),
(72, 1),
(73, 1),
(74, 1),
(75, 1),
(76, 1),
(77, 1),
(78, 1),
(79, 1),
(80, 1),
(83, 1),
(84, 1),
(85, 1),
(86, 1),
(87, 1),
(88, 1),
(89, 1),
(90, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('gw6MxXEQHOwf7mcdwza27EEVFG8oZxMt3cAR2UFd', 11, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiYWpXREJSWjFiNzBIamI1Yks2MEtFbkFma2VQeHlxSU1nVXJBcmlhUyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjI6e3M6MzoidXJsIjtzOjI3OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYWRtaW4iO3M6NToicm91dGUiO3M6MzA6ImZpbGFtZW50LmFkbWluLnBhZ2VzLmRhc2hib2FyZCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjExO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTIkY0kydkxFenAyVXNMc3I3RmQ1ajRzLk0waVhrZkVkSTBOeUlsTHR0aFdzbG4xb0VmZllLai4iO30=', 1767011110);

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `email` varchar(255) NOT NULL,
  `subscribed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`email`, `subscribed_at`, `is_active`) VALUES
('subscriber@example.com', '2025-12-23 16:32:20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL,
  `currency` varchar(255) NOT NULL DEFAULT 'usd',
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `order_id`, `payment_method`, `transaction_id`, `amount`, `currency`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'paypal', 'b891e9b9-4ad6-3a0b-8e71-aa7ae2a37cca', 274.01, 'usd', 'success', '2025-12-23 08:27:34', '2025-12-23 08:27:34'),
(2, 2, 'credit_card', '7afb6869-f01e-3f85-b1f7-0a9b2c03a161', 386.82, 'usd', 'failed', '2025-12-23 08:27:34', '2025-12-23 08:27:34'),
(3, 3, 'stripe', '94fe72eb-e260-360f-82ae-6a2711dbe286', 209.80, 'usd', 'success', '2025-12-23 08:27:34', '2025-12-23 08:27:34'),
(4, 4, 'credit_card', '1ed1ac47-6168-316a-890e-437d4b86c795', 485.42, 'usd', 'failed', '2025-12-23 08:27:34', '2025-12-23 08:27:34'),
(5, 5, 'stripe', 'f20486de-7ba9-35e5-b922-36571a4c26cc', 31.30, 'usd', 'success', '2025-12-23 08:27:34', '2025-12-23 08:27:34'),
(6, 6, 'paypal', 'fa275806-c794-303e-9eaf-387be30c03d2', 497.95, 'usd', 'success', '2025-12-23 08:27:34', '2025-12-23 08:27:34'),
(7, 7, 'stripe', '73ddc17e-1844-3c8e-b39c-a6369343295a', 229.94, 'usd', 'success', '2025-12-23 08:27:34', '2025-12-23 08:27:34'),
(8, 8, 'paypal', '665c7bbc-aaaf-39a7-a886-96e6fd32eb9c', 87.41, 'usd', 'success', '2025-12-23 08:27:34', '2025-12-23 08:27:34'),
(9, 9, 'credit_card', '63380d1b-be51-3ec8-a184-ab9a33789286', 118.31, 'usd', 'success', '2025-12-23 08:27:34', '2025-12-23 08:27:34'),
(10, 10, 'stripe', 'c48cc113-d570-383e-87f4-77fdf4ba1f75', 95.04, 'usd', 'success', '2025-12-23 08:27:34', '2025-12-23 08:27:34'),
(11, 11, 'credit_card', 'd3784909-94b1-3fae-8be2-0ec5d49e8331', 242.71, 'usd', 'failed', '2025-12-23 08:27:34', '2025-12-23 08:27:34'),
(12, 12, 'paypal', '84b51f46-4c43-3b36-89ad-cbc3b2de397d', 40.60, 'usd', 'success', '2025-12-23 08:27:34', '2025-12-23 08:27:34'),
(13, 13, 'stripe', 'bd2a5ba4-d86f-3e37-ad94-6d3fc06c13cc', 272.63, 'usd', 'failed', '2025-12-23 08:27:34', '2025-12-23 08:27:34'),
(14, 14, 'paypal', '8b3b11bb-3e6a-37df-b388-31858a567032', 150.48, 'usd', 'failed', '2025-12-23 08:27:34', '2025-12-23 08:27:34'),
(15, 15, 'stripe', '6d0352a8-1bd9-3b02-9269-57e0f233ed23', 485.90, 'usd', 'success', '2025-12-23 08:27:34', '2025-12-23 08:27:34'),
(16, 16, 'paypal', '174425d3-a28c-351d-a1af-f301fdca6f64', 153.67, 'usd', 'success', '2025-12-23 08:27:34', '2025-12-23 08:27:34'),
(17, 17, 'stripe', '60fcf19e-6a84-397d-accc-0087765e5128', 179.42, 'usd', 'success', '2025-12-23 08:27:34', '2025-12-23 08:27:34'),
(18, 18, 'paypal', '3efdb1c0-be90-3485-ac1d-e0f03d6bfc7b', 475.61, 'usd', 'success', '2025-12-23 08:27:34', '2025-12-23 08:27:34'),
(19, 19, 'credit_card', 'e18db5c8-f8c4-37a9-be0b-ebc09bc3166b', 347.87, 'usd', 'success', '2025-12-23 08:27:34', '2025-12-23 08:27:34'),
(20, 20, 'stripe', '70605b2e-71ef-386f-952b-ec43f26ed87d', 341.51, 'usd', 'success', '2025-12-23 08:27:34', '2025-12-23 08:27:34'),
(21, 21, 'paypal', '604c000d-38f8-3c74-b8e7-1a955d1a8ffe', 439.15, 'usd', 'success', '2025-12-23 08:27:34', '2025-12-23 08:27:34'),
(22, 22, 'paypal', 'aff714d5-0d9a-3497-bc29-5d9bc07ef1a3', 78.05, 'usd', 'success', '2025-12-23 08:27:34', '2025-12-23 08:27:34'),
(23, 23, 'paypal', '38a47a37-b401-35fe-b7fc-d25e37bf6c5f', 140.36, 'usd', 'failed', '2025-12-23 08:27:34', '2025-12-23 08:27:34'),
(24, 24, 'stripe', 'f78fbd76-e6bb-32fc-b67d-9937c574c1b9', 442.59, 'usd', 'success', '2025-12-23 08:27:34', '2025-12-23 08:27:34'),
(25, 25, 'credit_card', 'b7adfced-a26c-3ea7-af1b-d58b613153ec', 71.25, 'usd', 'success', '2025-12-23 08:27:34', '2025-12-23 08:27:34'),
(26, 26, 'paypal', 'd8a63b43-85df-35d6-9b12-43fbad8b0541', 268.94, 'usd', 'failed', '2025-12-23 08:27:34', '2025-12-23 08:27:34'),
(27, 27, 'credit_card', 'bf663950-8a44-3000-9fa9-c78a736361ee', 65.79, 'usd', 'success', '2025-12-23 08:27:34', '2025-12-23 08:27:34'),
(28, 28, 'credit_card', '58324273-0487-3f2a-b238-56561fc77529', 499.26, 'usd', 'success', '2025-12-23 08:27:34', '2025-12-23 08:27:34'),
(29, 29, 'credit_card', 'TXN-694AE014CA294', 45.00, 'usd', 'success', '2025-12-23 18:31:48', '2025-12-23 18:31:48'),
(30, 30, 'paystack', 'REF-694b98d815955', 12.50, 'GHS', 'success', '2025-12-24 07:40:08', '2025-12-24 07:40:27'),
(31, 31, 'cash_on_delivery', 'COD-O8RSWN1VYW', 35.00, 'GHS', 'pending', '2025-12-24 08:10:29', '2025-12-24 08:10:29'),
(32, 32, 'paystack', 'bb85c79f-eb98-477b-9ebf-6d5a68effb33', 57.50, 'GHS', 'success', '2025-12-26 11:24:16', '2025-12-26 11:24:27'),
(33, 32, 'cash_on_delivery', 'COD-694E7239210EA', 57.50, 'usd', 'success', '2025-12-26 11:32:09', '2025-12-26 11:32:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mrs. Leanne Schaefer DDS', 'ywyman@example.org', '2025-12-23 08:27:33', '$2y$12$pMcAlvbzmik95.L7Z93CKOvXJ1SMmJcVMekkRb1DhhwSjUlgEq0mO', 'RZ2y9AF1eg', '2025-12-23 08:27:34', '2025-12-23 08:27:34'),
(2, 'Prof. Melba Legros', 'kimberly.bartoletti@example.org', '2025-12-23 08:27:34', '$2y$12$pMcAlvbzmik95.L7Z93CKOvXJ1SMmJcVMekkRb1DhhwSjUlgEq0mO', 'cQCjSfPTgK', '2025-12-23 08:27:34', '2025-12-23 08:27:34'),
(3, 'Jailyn Leffler', 'stanton.rupert@example.net', '2025-12-23 08:27:34', '$2y$12$pMcAlvbzmik95.L7Z93CKOvXJ1SMmJcVMekkRb1DhhwSjUlgEq0mO', 'g5k4G6Yf25', '2025-12-23 08:27:34', '2025-12-23 08:27:34'),
(4, 'Irwin Boehm', 'mckenzie.abbie@example.net', '2025-12-23 08:27:34', '$2y$12$pMcAlvbzmik95.L7Z93CKOvXJ1SMmJcVMekkRb1DhhwSjUlgEq0mO', 'OZQbBvOe6W', '2025-12-23 08:27:34', '2025-12-23 08:27:34'),
(5, 'Mallie Sanford', 'nicolas.dortha@example.com', '2025-12-23 08:27:34', '$2y$12$pMcAlvbzmik95.L7Z93CKOvXJ1SMmJcVMekkRb1DhhwSjUlgEq0mO', 'qw2pECICcX', '2025-12-23 08:27:34', '2025-12-23 08:27:34'),
(6, 'Dr. Emelia Prosacco', 'marcel.daugherty@example.org', '2025-12-23 08:27:34', '$2y$12$pMcAlvbzmik95.L7Z93CKOvXJ1SMmJcVMekkRb1DhhwSjUlgEq0mO', 'wslZSYrGnM', '2025-12-23 08:27:34', '2025-12-23 08:27:34'),
(7, 'Shayne Mertz PhD', 'veda.parisian@example.com', '2025-12-23 08:27:34', '$2y$12$pMcAlvbzmik95.L7Z93CKOvXJ1SMmJcVMekkRb1DhhwSjUlgEq0mO', 'PqwwEvL2qH', '2025-12-23 08:27:34', '2025-12-23 08:27:34'),
(8, 'Arnold Tromp', 'bahringer.keshaun@example.org', '2025-12-23 08:27:34', '$2y$12$pMcAlvbzmik95.L7Z93CKOvXJ1SMmJcVMekkRb1DhhwSjUlgEq0mO', 'OxS2PorSVN', '2025-12-23 08:27:34', '2025-12-23 08:27:34'),
(9, 'Prof. Otis Little', 'keebler.lynn@example.net', '2025-12-23 08:27:34', '$2y$12$pMcAlvbzmik95.L7Z93CKOvXJ1SMmJcVMekkRb1DhhwSjUlgEq0mO', 'vlXQmGEH1b', '2025-12-23 08:27:34', '2025-12-23 08:27:34'),
(10, 'Shirley Little DVM', 'esperanza.rempel@example.org', '2025-12-23 08:27:34', '$2y$12$pMcAlvbzmik95.L7Z93CKOvXJ1SMmJcVMekkRb1DhhwSjUlgEq0mO', 'TRnz3DqyED', '2025-12-23 08:27:34', '2025-12-23 08:27:34'),
(11, 'Admin User', 'admin@anchor.com', '2025-12-23 08:27:34', '$2y$12$cI2vLEzp2UsLsr7Fd5j4s.M0iXkfEdI0NyIlLtthWsln1oEffYKj.', 'dzqZZrlAK4yZCOWQUBGPVRRJgiEK7LaGE1GObRHyF4fNJzBreI7BJfLK8gG8', '2025-12-23 08:27:34', '2025-12-23 08:27:34'),
(12, 'Abdul Basit Yahaya', 'abytrone@gmail.com', NULL, '$2y$12$HpdLdRQWB4jwGrXf0X4ZoeSpBEFaa/lH8Ij15NxBV2x6jPO7GvBaK', NULL, '2025-12-26 11:23:03', '2025-12-26 11:23:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_user_id_foreign` (`user_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_number_unique` (`number`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD UNIQUE KEY `products_sku_unique` (`sku`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD UNIQUE KEY `subscribers_email_unique` (`email`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_order_id_foreign` (`order_id`);

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
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
