-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2025 at 12:20 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `content` longtext NOT NULL,
  `writer` varchar(50) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `image` varchar(150) NOT NULL,
  `tags` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `id_category`, `title`, `content`, `writer`, `is_active`, `image`, `tags`, `created_at`, `updated_at`) VALUES
(15, 2, 'Title goes here', 'dddddddddddddddddddddddddddddd                            ', 'umar', 1, '1755157729-image 18.png', '[{\"value\":\"IT\"},{\"value\":\"Podkes\"},{\"value\":\"Writer\"},{\"value\":\"Anjay\"}]', '2025-08-14 07:48:49', '2025-08-15 01:50:03'),
(16, 2, 'Adi', 'aaaaaaaaaaaaa                            ', 'umar', 1, '1755221557-image 20.png', '[{\"value\":\"business\"},{\"value\":\"Elsar\"},{\"value\":\"Podkes\"}]', '2025-08-15 01:32:37', '2025-08-15 01:49:42'),
(17, 1, 'Adimas', 'ssssssasdasdadawd', 'umar', 1, '1755222385-image 9 (1).png', '[{\"value\":\"business\"},{\"value\":\"Elsar\"},{\"value\":\"IT\"}]', '2025-08-15 01:46:25', NULL),
(18, 2, 'Entitas', 'Ditemukan sebuah entitas buas dan berbahaya', 'umar', 1, '1755222676-mukajelek.jfif', '[{\"value\":\"Anomali\"},{\"value\":\"Podkes\"},{\"value\":\"Business\"}]', '2025-08-15 01:51:16', NULL),
(19, 1, 'Non aktif', 'Blog ini nonaktif', 'umar', 0, '1755222707-capucino.jpg', '[{\"value\":\"Tidak aktif\"}]', '2025-08-15 01:51:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `type` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `type`, `created_at`, `updated_at`) VALUES
(1, 'IT', 'blog', '2025-08-13 06:51:12', NULL),
(2, 'Business', 'blog', '2025-08-13 06:51:12', NULL),
(7, 'app', 'portofolio', '2025-08-15 02:14:51', NULL),
(10, 'web', 'portofolio', '2025-08-15 02:15:41', NULL),
(11, 'card', 'portofolio', '2025-08-15 02:16:23', NULL),
(14, 'Ayam', 'portofolio', '2025-08-15 03:48:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `image` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `name`, `image`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Circle', '1755060541-Logo-5.png', '2025-08-13 04:49:01', NULL, 1),
(2, 'Nexcent', '1755060614-nexcent-logo-black.png', '2025-08-13 04:50:14', NULL, 1),
(3, 'Logo 3', '1755060626-Logo-3.png', '2025-08-13 04:50:26', NULL, 1),
(4, 'Logo 4', '1755060636-Logo-4.png', '2025-08-13 04:50:36', NULL, 1),
(5, 'Logo 6', '1755060646-Logo-6.png', '2025-08-13 04:50:46', NULL, 1),
(6, 'Logo 2', '1755060655-Logo-2.png', '2025-08-13 04:50:55', NULL, 1),
(7, 'Logo 1', '1755060663-Logo-1.png', '2025-08-13 04:51:03', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

CREATE TABLE `experience` (
  `id` int(11) NOT NULL,
  `how_long` varchar(100) NOT NULL,
  `time` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hero`
--

CREATE TABLE `hero` (
  `id` int(11) NOT NULL,
  `caption` text NOT NULL,
  `image` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hero`
--

INSERT INTO `hero` (`id`, `caption`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Crafting digital experiences with precision, passion, and purpose.', '1755531469-5s5HSFk.png', '2025-08-18 15:05:12', '2025-08-18 15:37:49');

-- --------------------------------------------------------

--
-- Table structure for table `portofolio`
--

CREATE TABLE `portofolio` (
  `id` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` longtext NOT NULL,
  `client_name` varchar(100) NOT NULL,
  `project_date` date NOT NULL,
  `project_url` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `portofolio`
--

INSERT INTO `portofolio` (`id`, `id_category`, `title`, `content`, `client_name`, `project_date`, `project_url`, `image`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 11, 'Title goes here', 'aaaaaaaaaaaaaa                            ', 'Adidas', '2025-05-27', 'http://localhost/angkatan_3_2025/compro/', '1755228336-Illustration.png', 1, '2025-08-15 03:01:36', '2025-08-15 03:25:36'),
(2, 10, 'BMW', 'aaassssss', 'BMW', '2025-08-12', 'http://localhost/angkatan_3_2025/compro/', '1755228366-download.png', 1, '2025-08-15 03:26:06', NULL),
(3, 14, 'Xiaomi', 'Xiaomi                                                                                    ', 'Xiaomi', '2025-08-19', 'http://localhost/angkatan_3_2025/compro/', '1755228404-xiaomi-pad-7-pro-3840x2160-19801.jpg', 1, '2025-08-15 03:26:44', '2025-08-15 04:01:35'),
(4, 7, 'Hamberger', 'Hamberger                            ', 'Hamberger', '2025-08-20', 'http://localhost/angkatan_3_2025/compro/', '1755230460-hamburger.jpg', 1, '2025-08-15 04:01:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `firstname` varchar(150) NOT NULL,
  `lastname` varchar(150) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `company` varchar(150) NOT NULL,
  `twitter` varchar(150) NOT NULL,
  `facebook` varchar(150) NOT NULL,
  `instagram` varchar(150) NOT NULL,
  `linkedin` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `email`, `firstname`, `lastname`, `phone`, `address`, `company`, `twitter`, `facebook`, `instagram`, `linkedin`, `created_at`, `updated_at`) VALUES
(2, 'umaraziz445@gmail.com', 'Umar', 'Aziz', '6285173479199', 'Jl. Tanah Rendah, RT016/RW007, Kebonpala, Kampung Melayu, Jatinegara, Jakarta Timur', '', 'https://x.com/', 'https://www.facebook.com/?locale=id_ID', 'https://www.instagram.com/umraziz_/', 'https://www.linkedin.com/in/umar-azz', '2025-08-11 07:56:05', '2025-08-18 15:29:44');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `skill` text NOT NULL,
  `proficient` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `title`, `description`, `image`, `created_at`, `updated_at`) VALUES
(10, 'Title goes here', 'description goes here', '1755527577-wallhaven-ox19m9.jpg', '2025-08-13 01:25:43', '2025-08-18 14:32:57'),
(11, 'Title goes here', 'description goes here', '1755527586-wallhaven-r2g7rm.jpg', '2025-08-13 01:25:49', '2025-08-18 14:33:06'),
(12, 'Title goes here', 'description goes here', '1755527594-wallhaven-vgr5op.jpg', '2025-08-13 01:25:57', '2025-08-18 14:33:14');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'umar', 'umar@gmail.com', '12345', '2025-08-08 07:12:06', '2025-08-11 04:45:20'),
(10, 'Elcast', 'eminem@gmail.com', '111', '2025-08-11 05:10:32', NULL),
(12, 'kandi candi', 'jukandi@candi.com', '222', '2025-08-11 06:33:27', '2025-08-11 06:33:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hero`
--
ALTER TABLE `hero`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portofolio`
--
ALTER TABLE `portofolio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `experience`
--
ALTER TABLE `experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hero`
--
ALTER TABLE `hero`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `portofolio`
--
ALTER TABLE `portofolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
