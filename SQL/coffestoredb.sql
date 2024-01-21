-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 21, 2024 lúc 04:09 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `coffestoredb`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bills`
--

CREATE TABLE `bills` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_customer` int(11) DEFAULT NULL,
  `date_order` date DEFAULT NULL,
  `total` float DEFAULT NULL COMMENT 'tổng tiền',
  `payment` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'hình thức thanh toán',
  `status` int(11) DEFAULT NULL,
  `note` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `bills`
--

INSERT INTO `bills` (`id`, `id_customer`, `date_order`, `total`, `payment`, `status`, `note`, `created_at`, `updated_at`) VALUES
(1, 5, '2024-01-18', 18000, NULL, 0, 'sadasd', '2024-01-17 19:01:59', '2024-01-17 19:01:59'),
(2, 6, '2024-01-18', 18000, NULL, 0, 'qưeqdsadasdasdas', '2024-01-17 19:03:25', '2024-01-17 19:03:25'),
(3, 7, '2024-01-18', 18000, NULL, 0, 'sadasd', '2024-01-17 19:09:03', '2024-01-17 19:09:03'),
(4, 8, '2024-01-18', 18000, 'VNPAY', 0, 'sadasd', '2024-01-17 19:17:37', '2024-01-17 19:17:37'),
(5, 9, '2024-01-21', 18000, NULL, 0, 'qưeqdsadasdasdas', '2024-01-20 18:32:43', '2024-01-20 18:32:43'),
(6, 10, '2024-01-21', 18000, NULL, 0, 'ádasda', '2024-01-20 18:47:56', '2024-01-20 18:47:56'),
(7, 11, '2024-01-21', 36000, 'VNPAY', 0, 'sadasd', '2024-01-20 19:08:58', '2024-01-20 19:08:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_detail`
--

CREATE TABLE `bill_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_bill` int(10) NOT NULL,
  `id_product` int(10) NOT NULL,
  `quantity` int(11) NOT NULL COMMENT 'số lượng',
  `unit_price` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `bill_detail`
--

INSERT INTO `bill_detail` (`id`, `id_bill`, `id_product`, `quantity`, `unit_price`, `created_at`, `updated_at`) VALUES
(30, 3, 5, 1, 15000, '2023-09-23 06:11:11', '2023-09-23 06:11:11'),
(29, 3, 3, 1, 12000, '2023-09-23 06:11:11', '2023-09-23 06:11:11'),
(28, 3, 2, 1, 12000, '2023-09-23 06:11:11', '2023-09-23 06:11:11'),
(27, 3, 1, 1, 25000, '2023-09-23 06:11:11', '2023-09-23 06:11:11'),
(26, 3, 1, 1, 25000, '2023-09-22 19:57:15', '2023-09-22 19:57:15'),
(25, 2, 5, 1, 15000, '2023-09-13 00:52:08', '2023-09-13 00:52:08'),
(24, 2, 1, 1, 25000, '2023-09-13 00:52:08', '2023-09-13 00:52:08'),
(23, 1, 2, 1, 12000, '2023-09-11 00:44:39', '2023-09-11 00:44:39'),
(22, 1, 5, 1, 15000, '2023-09-11 00:44:39', '2023-09-11 00:44:39'),
(21, 1, 1, 2, 25000, '2023-09-11 00:44:39', '2023-09-11 00:44:39'),
(31, 4, 2, 1, 12000, '2023-12-29 01:53:06', '2023-12-29 01:53:06'),
(32, 5, 1, 1, 32000, '2024-01-05 20:44:11', '2024-01-05 20:44:11'),
(33, 6, 1, 1, 32000, '2024-01-05 20:57:07', '2024-01-05 20:57:07'),
(34, 7, 1, 1, 32000, '2024-01-05 20:58:47', '2024-01-05 20:58:47'),
(35, 1, 1, 1, 5000, '2024-01-17 18:43:53', '2024-01-17 18:43:53'),
(36, 2, 1, 2, 18000, '2024-01-17 18:50:28', '2024-01-17 18:50:28'),
(37, 3, 1, 1, 18000, '2024-01-17 18:57:42', '2024-01-17 18:57:42'),
(38, 4, 1, 1, 18000, '2024-01-17 18:58:30', '2024-01-17 18:58:30'),
(39, 5, 1, 1, 18000, '2024-01-17 19:00:21', '2024-01-17 19:00:21'),
(40, 1, 1, 1, 18000, '2024-01-17 19:01:59', '2024-01-17 19:01:59'),
(41, 2, 1, 1, 18000, '2024-01-17 19:03:25', '2024-01-17 19:03:25'),
(42, 3, 1, 1, 18000, '2024-01-17 19:09:03', '2024-01-17 19:09:03'),
(43, 4, 1, 1, 18000, '2024-01-17 19:17:37', '2024-01-17 19:17:37'),
(44, 5, 1, 1, 18000, '2024-01-20 18:32:43', '2024-01-20 18:32:43'),
(45, 6, 1, 1, 18000, '2024-01-20 18:47:56', '2024-01-20 18:47:56'),
(46, 7, 1, 2, 18000, '2024-01-20 19:08:58', '2024-01-20 19:08:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contacts`
--

CREATE TABLE `contacts` (
  `ID` int(255) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `status` int(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `contacts`
--

INSERT INTO `contacts` (`ID`, `name`, `email`, `subject`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Nghĩa khôn', 'longthaithien98@gmail.com', '', 'sadsađấ', 1, '2023-10-04 14:40:22', '2023-09-22 20:13:42'),
(2, 'Long', 'cpevnteam2018@gmail.com', '', 'hello', 0, '2023-10-04 14:46:11', '2023-09-23 06:19:03'),
(3, 'Long', 'cpevnteam2018@gmail.com', '', 'test', 1, '2023-10-04 14:49:48', '2023-10-01 20:44:27'),
(5, 'Long', 'longthaithien98@gmail.com', 'Test', 'sdasd', 0, '2023-11-24 00:41:58', '2023-11-24 00:41:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `note` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id`, `name`, `gender`, `email`, `address`, `phone_number`, `note`, `created_at`, `updated_at`) VALUES
(1, 'Cà phê sữa', 'male', 'longthaithien98@gmail.com', 'ha huy tao', '9051165522', '123123131', '2024-01-17 18:57:42', '2024-01-17 18:57:42'),
(2, 'Long', 'male', 'longthaithien98@gmail.com', '20 Ngo quyen', '9051165522', 'sadasd', '2024-01-17 18:58:07', '2024-01-17 18:58:07'),
(3, 'Capuchino', 'male', 'longthaithien98@gmail.com', 'dasadad232', '9051165522', 'sadasd', '2024-01-17 18:58:30', '2024-01-17 18:58:30'),
(4, 'Long', 'male', 'longthaithien98@gmail.com', '21 Ngo Quyen', '9051165522', 'sadasd', '2024-01-17 19:00:21', '2024-01-17 19:00:21'),
(5, 'Long', 'male', 'cpevnteam2018@gmail.com', '21 Ngo Quyen', '9051165522', 'sadasd', '2024-01-17 19:01:59', '2024-01-17 19:01:59'),
(6, 'Capuchino', 'male', 'longthaithien98@gmail.com', 'dasadad232', '9051165522', 'qưeqdsadasdasdas', '2024-01-17 19:03:25', '2024-01-17 19:03:25'),
(7, 'Long', 'male', 'longthaithien98@gmail.com', '21 Ngo Quyen', '9051165522', 'sadasd', '2024-01-17 19:09:03', '2024-01-17 19:09:03'),
(8, 'Long', 'male', 'longthaithien98@gmail.com', '21 Ngo Quyen', '9051165522', 'sadasd', '2024-01-17 19:17:37', '2024-01-17 19:17:37'),
(9, 'Long', 'male', 'longthaithien98@gmail.com', '12312312 adnhwr', '9051165522', 'qưeqdsadasdasdas', '2024-01-20 18:32:43', '2024-01-20 18:32:43'),
(10, 'Cà phê sữa', 'male', 'longthaithien98@gmail.com', 'ha huy tao', '9051165522', 'ádasda', '2024-01-20 18:47:56', '2024-01-20 18:47:56'),
(11, 'Long', 'male', 'longthaithien98@gmail.com', '21 Ngo Quyen', '9051165522', 'sadasd', '2024-01-20 19:08:58', '2024-01-20 19:08:58');

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
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `id_type` int(10) UNSIGNED DEFAULT NULL,
  `description` text DEFAULT NULL,
  `unit_price` float DEFAULT NULL,
  `promotion_price` float DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `new` tinyint(4) DEFAULT 0,
  `popular` int(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `id_type`, `description`, `unit_price`, `promotion_price`, `image`, `new`, `popular`, `created_at`, `updated_at`) VALUES
(1, 'cà phê sữa', 1, 'ngon', 28000, 18000, '1705797674_caphesua.jpg', 1, 1, '2024-01-07 08:39:39', '2024-01-20 17:41:14'),
(2, 'cà phê đen', 1, 'thơm', 27000, 5000, '1705563266_blackcoffe.jpg', 1, 1, '2024-01-07 08:44:05', '2024-01-18 00:34:26'),
(3, 'Bạc Sỉu Sky', 1, 'ly', 3500, 5000, '1705563286_caphesua.jpg', 1, 1, '2024-01-07 08:44:54', '2024-01-18 00:38:52'),
(4, '7up', 1, 'chai', 15000, 5000, '1705563389_7u.jpg', 1, 0, '2024-01-07 08:47:38', '2024-01-18 00:38:41'),
(5, 'Mirinda Cam', 2, 'lon', 15000, 8000, '1705563462_mirinda.jpg', 1, 0, '2024-01-07 08:52:59', '2024-01-18 00:37:42'),
(6, 'nước chanh', 2, 'ly', 32000, 5000, '1705564095_nc.jpg', 1, 0, '2024-01-07 09:10:00', '2024-01-18 00:48:15'),
(8, 'Bánh nhân kem', 3, 'ngọt', 25000, 5000, '1705564111_banhnhankem.jpg', 1, 0, '2024-01-07 09:21:01', '2024-01-18 00:48:31'),
(9, 'Bánh donut', 3, 'ngọt', 25000, 5000, '1705564123_donus.jpg', 1, 0, '2024-01-07 09:21:59', '2024-01-18 00:48:43'),
(10, 'bánh su kem', 3, 'ngọt', 28000, 5000, '1705564137_banhsukem.jpg', 1, 0, '2024-01-07 09:27:28', '2024-01-18 00:48:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slide`
--

CREATE TABLE `slide` (
  `id` int(11) NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `slide`
--

INSERT INTO `slide` (`id`, `image`, `created_at`, `updated_at`) VALUES
(1, '1704472121_logo.png', '2024-01-05 08:59:56', '2024-01-05 09:28:41');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `type_products`
--

CREATE TABLE `type_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `type_products`
--

INSERT INTO `type_products` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Cà phê', 'Cà phê', 'Screenshot 2023-12-23 081737.png', '2024-01-05 09:17:20', '2024-01-05 09:17:20'),
(2, 'Giải khát', 'lon', '3.png', '2024-01-07 08:51:32', '2024-01-07 08:51:32'),
(3, 'bánh ngọt', 'ngon', 'banh_vung_la_mon_banh_ngot_de_lam_de_an.jpg', '2024-01-07 09:12:06', '2024-01-07 09:12:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `repassword` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `repassword`, `phone`, `address`, `image`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Long Thien', 'longthaithien98@gmail.com', '$2y$10$cgxAO053p9ZJvaKtxWVO7.tezIdQuS761k1VIq/66wKwR9WJkNxky', 'thienlong2003', '0905116522', '21 Ngo Quyen', 'Screenshot (192).png', 1, NULL, '2024-01-05 23:37:31', '2024-01-20 19:42:50'),
(2, 'Đức', 'cpevnteam2018@gmail.com', '$2y$10$7iOLrTF1rlTYpFuMfr24Ou.Q737nH1cJqTjT9VVxDUf4U45u5Foze', 'cYSy8GT1', '0905116522123', 'adsada', 'LSPD.png', 3, NULL, '2024-01-05 23:39:40', '2024-01-20 19:57:00');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bills_ibfk_1` (`id_customer`);

--
-- Chỉ mục cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bill_detail_ibfk_2` (`id_product`);

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_id_type_foreign` (`id_type`);

--
-- Chỉ mục cho bảng `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `type_products`
--
ALTER TABLE `type_products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT cho bảng `contacts`
--
ALTER TABLE `contacts`
  MODIFY `ID` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `type_products`
--
ALTER TABLE `type_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_id_type_foreign` FOREIGN KEY (`id_type`) REFERENCES `type_products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
