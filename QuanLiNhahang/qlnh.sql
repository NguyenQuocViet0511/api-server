-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 10, 2023 lúc 01:30 PM
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
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
('CG000001', 'Nước', 'Yes', 0, 'US000000', '2023-05-10 11:23:03', '2023-05-10 11:23:03');

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
('FD000014', 'Cánh gà chiên mắm', 45000, 0, 0, NULL, 'Yes', 'CG000000', 'US000000', '2023-05-10 00:24:43', '2023-05-10 00:24:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `inventory`
--

CREATE TABLE `inventory` (
  `datein` date NOT NULL,
  `id_material` char(10) NOT NULL DEFAULT '',
  `quantityfirst` int(11) NOT NULL DEFAULT 0,
  `quantityin` int(11) NOT NULL DEFAULT 0,
  `quantityout` int(11) NOT NULL DEFAULT 0,
  `quantityend` int(11) NOT NULL DEFAULT 0,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `materialbill`
--

CREATE TABLE `materialbill` (
  `id` char(10) NOT NULL,
  `timein` date DEFAULT NULL,
  `tiemout` date DEFAULT NULL,
  `sum` double NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_by` char(10) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
('TB000000', 'B1', 'No', NULL, 'US000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('TB000001', 'B2', 'No', NULL, 'US000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('TB000002', 'B3', 'No', NULL, 'US000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('TB000003', 'B4', 'No', NULL, 'US000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
('US000002', 'Nguyễn Quốc Việt', 'US000002', 'lonconbaby2210@gmail.com', NULL, 'US000002', 'Nam', '2001-05-11', '0859723713', 'Binh Thuận', 'Yes', 'RL000000', NULL, '2023-05-09 18:30:02', '2023-05-09 18:30:02'),
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
  ADD UNIQUE KEY `id_food` (`id`),
  ADD KEY `id_bill` (`id_bill`);

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
-- Chỉ mục cho bảng `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`datein`),
  ADD KEY `FK__material` (`id_material`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_materialbillinfo_materialbill` (`id_materialbill`);

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
  ADD KEY `FK_tablefood_users` (`created_by`);

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
-- Các ràng buộc cho bảng `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `FK__material` FOREIGN KEY (`id_material`) REFERENCES `material` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
