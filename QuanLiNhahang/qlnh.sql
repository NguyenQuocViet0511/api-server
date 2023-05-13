-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 13, 2023 lúc 09:48 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlnh`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id` char(10) NOT NULL,
  `timein` datetime DEFAULT NULL,
  `timeout` datetime DEFAULT NULL,
  `discount` float DEFAULT NULL,
  `sum` double DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `id_user` char(10) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`id`, `timein`, `timeout`, `discount`, `sum`, `status`, `id_user`, `created_at`, `updated_at`) VALUES
('HD000000', '2023-05-12 06:44:44', '2023-05-12 16:16:45', 0, 280000, 'Yes', 'US000000', '2023-05-12 06:44:44', '2023-05-12 16:16:45'),
('HD000001', '2023-05-12 06:50:02', '2023-05-12 16:22:27', 0, 1345000, 'Yes', 'US000000', '2023-05-12 06:50:02', '2023-05-12 16:22:27'),
('HD000002', '2023-05-12 06:53:29', '2023-05-12 16:24:04', 0, 135000, 'Yes', 'US000000', '2023-05-12 06:53:29', '2023-05-12 16:24:04'),
('HD000003', '2023-05-12 14:58:22', '2023-05-12 14:59:02', 0, 900000, 'Yes', 'US000000', '2023-05-12 14:58:22', '2023-05-12 14:59:02'),
('HD000004', '2023-05-12 14:59:56', '2023-05-12 15:04:23', 0, 1440000, 'Yes', 'US000000', '2023-05-12 14:59:56', '2023-05-12 15:04:23'),
('HD000005', '2023-05-12 15:03:09', '2023-05-12 15:04:15', 0, 190000, 'Yes', 'US000000', '2023-05-12 15:03:09', '2023-05-12 15:04:15'),
('HD000006', '2023-05-12 15:05:27', '2023-05-12 15:19:20', 0, 475000, 'Yes', 'US000000', '2023-05-12 15:05:27', '2023-05-12 15:19:20'),
('HD000007', '2023-05-12 15:05:40', '2023-05-12 15:06:18', 0, 405000, 'Yes', 'US000000', '2023-05-12 15:05:40', '2023-05-12 15:06:18'),
('HD000008', '2023-05-12 15:20:15', '2023-05-12 15:20:28', 0, 90000, 'Yes', 'US000000', '2023-05-12 15:20:15', '2023-05-12 15:20:28'),
('HD000009', '2023-05-12 15:22:16', '2023-05-12 16:26:08', 0, 135000, 'Yes', 'US000000', '2023-05-12 15:22:16', '2023-05-12 16:26:08'),
('HD000010', '2023-05-12 15:23:11', '2023-05-12 15:23:21', 0, 90000, 'Yes', 'US000000', '2023-05-12 15:23:11', '2023-05-12 15:23:21'),
('HD000011', '2023-05-12 15:24:40', '2023-05-12 15:24:55', 0, 90000, 'Yes', 'US000000', '2023-05-12 15:24:40', '2023-05-12 15:24:55'),
('HD000012', '2023-05-12 15:27:55', '2023-05-12 15:34:41', 0, 270000, 'Yes', 'US000000', '2023-05-12 15:27:55', '2023-05-12 15:34:41'),
('HD000013', '2023-05-12 15:30:37', '2023-05-12 15:33:47', 0, 90000, 'Yes', 'US000000', '2023-05-12 15:30:37', '2023-05-12 15:33:47'),
('HD000014', '2023-05-12 15:30:59', '2023-05-12 15:31:28', 0, 90000, 'Yes', 'US000000', '2023-05-12 15:30:59', '2023-05-12 15:31:28'),
('HD000015', '2023-05-12 15:39:30', '2023-05-12 15:39:41', 0, 90000, 'Yes', 'US000000', '2023-05-12 15:39:30', '2023-05-12 15:39:41'),
('HD000016', '2023-05-12 15:42:23', '2023-05-12 15:42:33', 0, 45000, 'Yes', 'US000000', '2023-05-12 15:42:23', '2023-05-12 15:42:33'),
('HD000017', '2023-05-12 15:43:43', '2023-05-12 15:43:53', 0, 45000, 'Yes', 'US000000', '2023-05-12 15:43:43', '2023-05-12 15:43:53'),
('HD000018', '2023-05-13 09:19:37', '2023-05-13 09:20:51', 0, 960000, 'Yes', 'US000000', '2023-05-13 09:19:37', '2023-05-13 09:20:51'),
('HD000019', '2023-05-13 10:51:30', NULL, 0, 0, 'No', 'US000000', '2023-05-13 10:51:30', '2023-05-13 10:51:30'),
('HD000020', '2023-05-13 15:34:45', '2023-05-13 19:43:26', 0, 90000, 'Yes', 'US000000', '2023-05-13 15:34:45', '2023-05-13 19:43:26'),
('HD000021', '2023-05-13 19:42:43', '2023-05-13 19:42:58', 0, 900000, 'Yes', 'US000000', '2023-05-13 19:42:43', '2023-05-13 19:42:58'),
('HD000022', '2023-05-13 19:44:40', '2023-05-13 19:44:51', 0, 90000, 'Yes', 'US000000', '2023-05-13 19:44:40', '2023-05-13 19:44:51');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `billinfo`
--

CREATE TABLE `billinfo` (
  `id` char(10) NOT NULL,
  `id_bill` char(10) NOT NULL,
  `count` int(11) DEFAULT NULL,
  `sum` double DEFAULT NULL,
  `note` varchar(50) DEFAULT NULL,
  `status` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `billinfo`
--

INSERT INTO `billinfo` (`id`, `id_bill`, `count`, `sum`, `note`, `status`, `created_at`, `updated_at`) VALUES
('FD000003', 'HD000000', 9, 0, NULL, 'Yes', '2023-05-12 06:44:44', '2023-05-12 06:54:10'),
('FD000011', 'HD000000', 2, 100000, NULL, 'Yes', '2023-05-12 06:44:51', '2023-05-12 06:54:10'),
('FD000014', 'HD000000', 2, 90000, NULL, 'Yes', '2023-05-12 06:45:07', '2023-05-12 06:54:10'),
('FD000002', 'HD000000', 6, 0, NULL, 'Yes', '2023-05-12 06:45:51', '2023-05-12 06:54:10'),
('FD000000', 'HD000000', 2, 90000, NULL, 'Yes', '2023-05-12 06:48:12', '2023-05-12 06:54:10'),
('FD000006', 'HD000001', 2, 90000, NULL, 'Yes', '2023-05-12 06:50:02', '2023-05-12 06:58:02'),
('FD000002', 'HD000002', 1, 45000, NULL, 'Yes', '2023-05-12 06:53:29', '2023-05-12 06:56:44'),
('FD000004', 'HD000002', 2, 90000, NULL, 'Yes', '2023-05-12 06:53:44', '2023-05-12 06:56:44'),
('FD000006', 'HD000001', 2, 90000, NULL, 'Yes', '2023-05-12 08:06:08', '2023-05-12 08:13:09'),
('FD000002', 'HD000001', 2, 90000, NULL, 'Yes', '2023-05-12 08:08:40', '2023-05-12 08:13:09'),
('FD000011', 'HD000001', 2, 100000, NULL, 'Yes', '2023-05-12 08:09:58', '2023-05-12 08:13:09'),
('FD000013', 'HD000001', 5, 750000, NULL, 'Yes', '2023-05-12 08:12:38', '2023-05-12 08:13:09'),
('FD000003', 'HD000001', 5, 225000, NULL, 'Yes', '2023-05-12 08:12:55', '2023-05-12 08:13:09'),
('FD000002', 'HD000003', 10, 450000, NULL, 'Yes', '2023-05-12 14:58:22', '2023-05-12 14:58:43'),
('FD000006', 'HD000003', 10, 450000, NULL, 'Yes', '2023-05-12 14:58:32', '2023-05-12 14:58:43'),
('FD000003', 'HD000004', 2, 90000, NULL, 'Yes', '2023-05-12 14:59:56', '2023-05-12 15:03:44'),
('FD000004', 'HD000004', 10, 450000, NULL, 'Yes', '2023-05-12 15:01:34', '2023-05-12 15:03:44'),
('FD000001', 'HD000004', 10, 450000, NULL, 'Yes', '2023-05-12 15:01:52', '2023-05-12 15:03:44'),
('FD000006', 'HD000004', 10, 450000, NULL, 'Yes', '2023-05-12 15:02:08', '2023-05-12 15:03:44'),
('FD000004', 'HD000005', 2, 90000, NULL, 'Yes', '2023-05-12 15:03:09', '2023-05-12 15:04:11'),
('FD000011', 'HD000005', 2, 100000, NULL, 'Yes', '2023-05-12 15:04:06', '2023-05-12 15:04:11'),
('FD000004', 'HD000006', 5, 225000, 'Không Cay', 'No', '2023-05-12 15:05:27', '2023-05-12 15:05:27'),
('FD000001', 'HD000007', 7, 315000, 'Không Cay', 'Yes', '2023-05-12 15:05:40', '2023-05-12 15:06:13'),
('FD000004', 'HD000007', 2, 90000, 'Không Cay', 'Yes', '2023-05-12 15:05:45', '2023-05-12 15:06:13'),
('FD000011', 'HD000006', 5, 250000, 'Không Cay', 'No', '2023-05-12 15:06:02', '2023-05-12 15:06:02'),
('FD000006', 'HD000008', 2, 90000, NULL, 'Yes', '2023-05-12 15:20:15', '2023-05-12 15:20:20'),
('FD000006', 'HD000009', 3, 135000, NULL, 'Yes', '2023-05-12 15:22:16', '2023-05-12 15:22:20'),
('FD000002', 'HD000010', 2, 90000, NULL, 'Yes', '2023-05-12 15:23:11', '2023-05-12 15:23:15'),
('FD000004', 'HD000011', 2, 90000, NULL, 'Yes', '2023-05-12 15:24:40', '2023-05-12 15:24:47'),
('FD000002', 'HD000012', 2, 90000, NULL, 'Yes', '2023-05-12 15:27:55', '2023-05-12 15:28:02'),
('FD000003', 'HD000012', 4, 180000, NULL, 'Yes', '2023-05-12 15:28:22', '2023-05-12 15:28:31'),
('FD000003', 'HD000013', 2, 90000, NULL, 'Yes', '2023-05-12 15:30:37', '2023-05-12 15:31:16'),
('FD000003', 'HD000014', 2, 90000, NULL, 'Yes', '2023-05-12 15:30:59', '2023-05-12 15:31:08'),
('FD000002', 'HD000015', 2, 90000, NULL, 'No', '2023-05-12 15:39:30', '2023-05-12 15:39:30'),
('FD000006', 'HD000016', 1, 45000, NULL, 'No', '2023-05-12 15:42:23', '2023-05-12 15:42:23'),
('FD000003', 'HD000017', 1, 45000, NULL, 'No', '2023-05-12 15:43:43', '2023-05-12 15:43:43'),
('FD000003', 'HD000018', 5, 225000, NULL, 'Yes', '2023-05-13 09:19:37', '2023-05-13 09:20:05'),
('FD000002', 'HD000018', 3, 135000, NULL, 'Yes', '2023-05-13 09:19:51', '2023-05-13 09:20:05'),
('FD000011', 'HD000018', 3, 150000, NULL, 'Yes', '2023-05-13 09:19:54', '2023-05-13 09:20:05'),
('FD000013', 'HD000018', 3, 450000, NULL, 'Yes', '2023-05-13 09:19:59', '2023-05-13 09:20:05'),
('FD000002', 'HD000019', 1, 45000, NULL, 'No', '2023-05-13 10:51:31', '2023-05-13 10:51:31'),
('FD000002', 'HD000020', 2, 90000, NULL, 'No', '2023-05-13 15:34:45', '2023-05-13 15:34:45'),
('FD000004', 'HD000021', 20, 900000, NULL, 'No', '2023-05-13 19:42:43', '2023-05-13 19:42:43'),
('FD000000', 'HD000022', 2, 90000, NULL, 'No', '2023-05-13 19:44:40', '2023-05-13 19:44:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` char(10) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `status` char(10) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `created_by` char(10) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `status`, `count`, `created_by`, `created_at`, `updated_at`) VALUES
('CG000000', 'Món Ăn', 'Yes', 0, 'US000000', NULL, NULL),
('CG000001', 'Nước', 'Yes', 0, 'US000000', '2023-05-10 11:23:03', '2023-05-13 02:30:49'),
('CG000002', 'Ăn vặt', 'Yes', 0, 'US000000', '2023-05-13 02:51:09', '2023-05-13 02:51:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
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
-- Cấu trúc bảng cho bảng `food`
--

CREATE TABLE `food` (
  `id` char(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` double NOT NULL,
  `discount` float NOT NULL,
  `count` int(11) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `status` char(10) NOT NULL,
  `id_category` char(10) NOT NULL,
  `created_by` char(10) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `food`
--

INSERT INTO `food` (`id`, `name`, `price`, `discount`, `count`, `image`, `status`, `id_category`, `created_by`, `created_at`, `updated_at`) VALUES
('FD000000', 'Gà Quay', 45000, 0, 0, NULL, 'Yes', 'CG000000', 'US000000', NULL, NULL),
('FD000001', 'Gà Cháy Tỏi', 45000, 0, 0, NULL, 'Yes', 'CG000000', 'US000000', NULL, NULL),
('FD000002', 'Bò Xào', 45000, 0, 0, NULL, 'Yes', 'CG000000', 'US000000', NULL, NULL),
('FD000003', 'Bánh Hỏi Thịt Heo', 45000, 0, 0, NULL, 'Yes', 'CG000000', 'US000000', NULL, NULL),
('FD000004', 'Tôm Nướng', 45000, 0, 0, NULL, 'Yes', 'CG000000', 'US000000', NULL, NULL),
('FD000006', 'Cơm Chiên', 45000, 0, 0, NULL, 'yes', 'CG000000', 'US000000', '2023-05-09 11:02:37', '2023-05-09 11:02:37'),
('FD000011', 'Mực Xào Cay', 50000, 0, 0, NULL, 'Yes', 'CG000000', 'US000000', '2023-05-09 13:38:19', '2023-05-09 14:22:00'),
('FD000013', 'Ba Ba Nấu Chuối', 150000, 0, 0, NULL, 'Yes', 'CG000000', 'US000000', '2023-05-09 13:55:35', '2023-05-09 13:55:35'),
('FD000014', 'Cánh gà chiên mắm', 45000, 0, 0, NULL, 'Yes', 'CG000000', 'US000000', '2023-05-10 00:24:43', '2023-05-10 00:24:43'),
('FD000015', 'Bia 333', 20000, 0, 0, NULL, 'yes', 'CG000001', 'US000000', '2023-05-13 03:03:27', '2023-05-13 03:03:53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `historyinventory`
--

CREATE TABLE `historyinventory` (
  `date` datetime NOT NULL,
  `id_material` char(10) NOT NULL,
  `quantityfirst` int(11) DEFAULT 0,
  `quantityin` int(11) DEFAULT 0,
  `quantityout` int(11) DEFAULT 0,
  `quantityend` int(11) DEFAULT 0,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `historyinventory`
--

INSERT INTO `historyinventory` (`date`, `id_material`, `quantityfirst`, `quantityin`, `quantityout`, `quantityend`, `created_at`, `updated_at`) VALUES
('2023-05-13 17:42:56', 'MT000001', 0, 2, 0, 2, '2023-05-13', '2023-05-13'),
('2023-05-13 17:43:09', 'MT000001', 2, 5, 0, 7, '2023-05-13', '2023-05-13'),
('2023-05-13 17:43:13', 'MT000001', 7, 10, 0, 17, '2023-05-13', '2023-05-13'),
('2023-05-13 17:44:32', 'MT000000', 0, 2, 0, 2, '2023-05-13', '2023-05-13'),
('2023-05-13 17:45:00', 'MT000000', 2, 20, 0, 22, '2023-05-13', '2023-05-13'),
('2023-05-13 19:09:33', 'MT000000', 22, 50, 0, 72, '2023-05-13', '2023-05-13'),
('2023-05-13 19:31:49', 'MT000000', 67, 0, 5, 62, '2023-05-13', '2023-05-13'),
('2023-05-13 19:34:02', 'MT000000', 62, 0, 5, 57, '2023-05-13', '2023-05-13'),
('2023-05-13 19:34:35', 'MT000000', 57, 0, 5, 52, '2023-05-13', '2023-05-13'),
('2023-05-13 19:35:38', 'MT000001', 12, 0, 5, 7, '2023-05-13', '2023-05-13'),
('2023-05-13 19:36:11', 'MT000001', 7, 0, 5, 2, '2023-05-13', '2023-05-13'),
('2023-05-13 19:36:21', 'MT000000', 52, 0, 5, 47, '2023-05-13', '2023-05-13'),
('2023-05-13 19:36:31', 'MT000001', 2, 0, 5, -3, '2023-05-13', '2023-05-13'),
('2023-05-13 19:37:18', 'MT000000', 42, 0, 10, 32, '2023-05-13', '2023-05-13'),
('2023-05-13 19:37:54', 'MT000000', 32, 0, 10, 22, '2023-05-13', '2023-05-13'),
('2023-05-13 19:39:27', 'MT000000', 32, 0, 10, 22, '2023-05-13', '2023-05-13'),
('2023-05-13 19:39:49', 'MT000001', 2, 0, 2, 0, '2023-05-13', '2023-05-13'),
('2023-05-13 19:40:37', 'MT000000', 22, 0, 12, 10, '2023-05-13', '2023-05-13'),
('2023-05-13 19:41:24', 'MT000000', 10, 50, 0, 60, '2023-05-13', '2023-05-13'),
('2023-05-13 19:41:47', 'MT000000', 60, 0, 27, 33, '2023-05-13', '2023-05-13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `inventory`
--

CREATE TABLE `inventory` (
  `id` char(10) NOT NULL DEFAULT '',
  `quantity` int(11) NOT NULL DEFAULT 0,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `inventory`
--

INSERT INTO `inventory` (`id`, `quantity`, `created_at`, `updated_at`) VALUES
('MT000000', 33, '2023-05-13', '2023-05-13'),
('MT000001', 0, '2023-05-13', '2023-05-13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `material`
--

CREATE TABLE `material` (
  `id` char(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` double DEFAULT NULL,
  `unit` varchar(20) NOT NULL,
  `status` char(10) DEFAULT NULL,
  `created_by` char(10) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `material`
--

INSERT INTO `material` (`id`, `name`, `price`, `unit`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
('MT000000', 'Nước Mắm', 45000, 'chai', 'Yes', 'US000000', NULL, '2023-05-13'),
('MT000001', 'Dầu Ăn', 20000, 'chai', 'Yes', 'US000000', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `materialbill`
--

CREATE TABLE `materialbill` (
  `id` char(10) NOT NULL,
  `timein` date DEFAULT NULL,
  `sum` double NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_by` char(10) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `materialbill`
--

INSERT INTO `materialbill` (`id`, `timein`, `sum`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
('HD000000', '2023-05-13', 5830000, 'Nhập Kho', 'US000000', '2023-05-13', '2023-05-13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `materialbillinfo`
--

CREATE TABLE `materialbillinfo` (
  `id` char(10) NOT NULL,
  `id_materialbill` char(10) NOT NULL,
  `count` int(11) NOT NULL DEFAULT 0,
  `sum` double DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `materialbillinfo`
--

INSERT INTO `materialbillinfo` (`id`, `id_materialbill`, `count`, `sum`, `created_at`, `updated_at`) VALUES
('MT000001', 'HD000000', 17, 340000, '2023-05-13', '2023-05-13'),
('MT000000', 'HD000000', 122, 5490000, '2023-05-13', '2023-05-13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--
-- Error reading structure for table qlnh.migrations: #1932 - Table 'qlnh.migrations' doesn't exist in engine
-- Error reading data for table qlnh.migrations: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `qlnh`.`migrations`' at line 1

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
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
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `id` char(10) NOT NULL,
  `name` char(15) NOT NULL,
  `status` char(10) NOT NULL DEFAULT '0',
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
('RL000000', 'supperadmin', 'yes', NULL, NULL),
('RL000001', 'manager', 'yes', NULL, NULL),
('RL000002', 'staff', 'yes', NULL, NULL),
('RL000003', 'user', 'yes', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tablefood`
--

CREATE TABLE `tablefood` (
  `id` char(10) NOT NULL,
  `name` varchar(10) NOT NULL,
  `status` varchar(10) DEFAULT NULL,
  `id_bill` char(10) DEFAULT NULL,
  `created_by` char(10) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tablefood`
--

INSERT INTO `tablefood` (`id`, `name`, `status`, `id_bill`, `created_by`, `created_at`, `updated_at`) VALUES
('TB000000', 'B20', 'No', NULL, 'US000000', '0000-00-00 00:00:00', '2023-05-13 02:41:45'),
('TB000001', 'B2', 'No', NULL, 'US000000', '0000-00-00 00:00:00', '2023-05-12 16:24:04'),
('TB000002', 'B3', 'Yes', 'HD000019', 'US000000', '0000-00-00 00:00:00', '2023-05-13 10:51:31'),
('TB000003', 'B4', 'No', NULL, 'US000000', '0000-00-00 00:00:00', '2023-05-12 16:26:08'),
('TB000004', 'B5', 'No', NULL, 'US000000', '2023-05-13 02:11:42', '2023-05-13 02:11:42'),
('TB000006', 'B6', 'No', NULL, 'US000000', '2023-05-13 02:14:31', '2023-05-13 19:44:51'),
('TB000007', 'B7', 'No', NULL, 'US000000', '2023-05-13 02:15:35', '2023-05-13 02:15:35'),
('TB000008', 'B8', 'No', NULL, 'US000000', '2023-05-13 02:18:06', '2023-05-13 02:18:06'),
('TB000009', 'B10', 'No', NULL, 'US000000', '2023-05-13 02:23:03', '2023-05-13 19:42:58'),
('TB000010', 'B11', 'No', NULL, 'US000000', '2023-05-13 02:36:00', '2023-05-13 02:36:00'),
('TB000011', 'B12', 'No', NULL, 'US000000', '2023-05-13 02:36:56', '2023-05-13 02:36:56'),
('TB000012', 'B13', 'No', NULL, 'US000000', '2023-05-13 02:37:58', '2023-05-13 09:20:51'),
('TB000013', 'B14', 'No', NULL, 'US000000', '2023-05-13 02:38:37', '2023-05-13 02:38:37'),
('TB000014', 'B15', 'No', NULL, 'US000000', '2023-05-13 02:40:36', '2023-05-13 02:40:36'),
('TB000015', 'B16', 'No', NULL, 'US000000', '2023-05-13 02:41:25', '2023-05-13 02:41:25'),
('TB000016', 'b55', 'No', NULL, 'US000000', '2023-05-13 02:45:00', '2023-05-13 02:45:00'),
('TB000017', 'B30', 'No', NULL, 'US000000', '2023-05-13 02:45:39', '2023-05-13 02:45:39'),
('TB000018', 'B14', 'No', NULL, 'US000000', '2023-05-13 02:46:08', '2023-05-13 02:46:08'),
('TB000019', 'B200', 'No', NULL, 'US000000', '2023-05-13 02:48:31', '2023-05-13 02:48:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `timesheet`
--

CREATE TABLE `timesheet` (
  `datein` datetime NOT NULL,
  `id_user` char(10) NOT NULL DEFAULT '',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` char(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL DEFAULT '1',
  `sex` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `number` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `id_role` char(10) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `sex`, `date`, `number`, `address`, `status`, `id_role`, `remember_token`, `created_at`, `updated_at`) VALUES
('US000000', 'Nguyễn Quốc Việt', 'admin', 'lonconbaby@gmail.com', '2023-05-08 21:24:49', 'admin', 'Nam', '2001-12-30', '0859723713', 'Bình Thuận', 'Yes', 'RL000000', NULL, NULL, NULL),
('US000002', 'Nguyễn Quốc Việt', 'US000002', 'lonconbaby2210@gmail.com', NULL, 'US000002', 'Nam', '2001-05-11', '0859723713', 'Binh Thuận', 'Yes', 'RL000003', NULL, '2023-05-09 18:30:02', '2023-05-12 19:33:05'),
('US000003', 'Nguyễn Quốc Việt', 'US000003', NULL, NULL, 'US000003', 'Nam', '2023-05-12', '0859723713', 'Bình Thuận', 'Yes', 'RL000000', NULL, '2023-05-09 19:25:51', '2023-05-09 19:38:20'),
('US000004', 'Lê Thanh Nam', 'US000004', NULL, NULL, 'US000004', 'Nam', '2023-05-12', NULL, NULL, 'Yes', 'RL000000', NULL, '2023-05-09 19:40:14', '2023-05-09 19:40:14');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Chỉ mục cho bảng `billinfo`
--
ALTER TABLE `billinfo`
  ADD KEY `id_bill` (`id_bill`),
  ADD KEY `id_food` (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_category_users` (`created_by`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_category` (`id_category`),
  ADD KEY `FK_food_users` (`created_by`);

--
-- Chỉ mục cho bảng `historyinventory`
--
ALTER TABLE `historyinventory`
  ADD PRIMARY KEY (`date`),
  ADD KEY `FK_historyinventory_material` (`id_material`);

--
-- Chỉ mục cho bảng `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_material_users` (`created_by`);

--
-- Chỉ mục cho bảng `materialbill`
--
ALTER TABLE `materialbill`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `materialbillinfo`
--
ALTER TABLE `materialbillinfo`
  ADD KEY `FK_materialbillinfo_materialbill` (`id_materialbill`),
  ADD KEY `id` (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tablefood`
--
ALTER TABLE `tablefood`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_tablefood_users` (`created_by`),
  ADD KEY `FK_tablefood_bill` (`id_bill`);

--
-- Chỉ mục cho bảng `timesheet`
--
ALTER TABLE `timesheet`
  ADD PRIMARY KEY (`datein`),
  ADD KEY `FK_timesheet_users` (`id_user`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `FK_users_role` (`id_role`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `billinfo`
--
ALTER TABLE `billinfo`
  ADD CONSTRAINT `billinfo_ibfk_2` FOREIGN KEY (`id_bill`) REFERENCES `bill` (`id`),
  ADD CONSTRAINT `billinfo_ibfk_3` FOREIGN KEY (`id`) REFERENCES `food` (`id`);

--
-- Các ràng buộc cho bảng `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `FK_category_users` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `food`
--
ALTER TABLE `food`
  ADD CONSTRAINT `FK_food_users` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `food_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`);

--
-- Các ràng buộc cho bảng `historyinventory`
--
ALTER TABLE `historyinventory`
  ADD CONSTRAINT `FK_historyinventory_material` FOREIGN KEY (`id_material`) REFERENCES `material` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `FK_inventory_material` FOREIGN KEY (`id`) REFERENCES `material` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `material`
--
ALTER TABLE `material`
  ADD CONSTRAINT `FK_material_users` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `materialbillinfo`
--
ALTER TABLE `materialbillinfo`
  ADD CONSTRAINT `FK_materialbillinfo_material` FOREIGN KEY (`id`) REFERENCES `material` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_materialbillinfo_materialbill` FOREIGN KEY (`id_materialbill`) REFERENCES `materialbill` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `tablefood`
--
ALTER TABLE `tablefood`
  ADD CONSTRAINT `FK_tablefood_bill` FOREIGN KEY (`id_bill`) REFERENCES `bill` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_tablefood_users` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `timesheet`
--
ALTER TABLE `timesheet`
  ADD CONSTRAINT `FK_timesheet_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_users_role` FOREIGN KEY (`id_role`) REFERENCES `role` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
