-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 06, 2021 lúc 02:21 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `face-social`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) UNSIGNED NOT NULL,
  `post_cap` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`post_id`, `post_cap`, `post_img`, `user_id`) VALUES
(2, 'This is an apple.', 'apple.jpg', 1),
(4, 'Đây là quả chanh .', 'lemom.jpg', 4),
(5, 'Huy đẹp trai........', 'huy2.jpg', 6),
(6, 'Mai thi rồi huhuhuhu.....', 'oi doi oik.jpg', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(11) UNSIGNED NOT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_regis_date` datetime DEFAULT current_timestamp(),
  `user_status` tinyint(1) DEFAULT 0,
  `user_level` tinyint(1) DEFAULT 0,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `phone_number` int(10) NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `user_email`, `user_pass`, `user_regis_date`, `user_status`, `user_level`, `name`, `date_of_birth`, `phone_number`, `address`, `avatar`) VALUES
(1, 'thehuyvtvp@gmail.com', '$2y$10$pgP325Ol/.YEBrDMWVmDR.kW0huiEOecjTNXzdNGb9KE/nOMDrkOm', '2021-11-03 23:18:10', 0, 0, 'Thế Huy', '2001-07-06', 968249207, 'Vĩnh Phúc', 'avatar-admin.png'),
(4, 'huypt@gmail.com', '$2y$10$m3APHezCudmCIDyB0wA45uLQdyNnmK.D8RdjyFqbePfq4Pyui9Gm.', '2021-11-04 00:19:36', 0, 0, 'Phạm Thế Huy', '2021-07-06', 968249333, 'Hà Nội', 'huy2.jpg'),
(6, 'thehuydeptrai@gmail.com', '$2y$10$aangtOvEXGf3N53o7NGemOIbpdHat87ooOvjmiHsYZQnUYushIbxu', '2021-11-05 23:18:09', 0, 0, 'Huy Đẹp Trai', '2015-07-06', 123654987, 'Hồ Chí Minh', 'orange.jpg'),
(7, 'admin@gmail.com', '$2y$10$YuFxPGzn1EYoa8fopvb2huA6mSwR4Oaetd4w6K1EjSGgx4SL/DNfu', '2021-11-06 02:10:22', 0, 1, 'Admin', '0000-00-00', 988886666, 'Hà Nội', 'admin-avatar.png');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`),
  ADD UNIQUE KEY `phone_number` (`phone_number`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
