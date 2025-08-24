-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2025 at 01:26 AM
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
-- Database: `php_portfolio_3`
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

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `title`, `content`, `image`, `created_at`, `updated_at`, `status`) VALUES
(8, 'Web Designer', 'As a fresh graduate in Informatics Technology and Computer Education at University of Negeri Jakarta, I pursue reliability, diligence, and responsibility.', '', '2025-08-19 12:16:33', NULL, 1);

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
(15, 2, 'Title goes here', 'dddddddddddddddddddddddddddddd                                                        ', 'umar', 1, '1755157729-image 18.png', '', '2025-08-14 07:48:49', '2025-08-24 16:57:58'),
(16, 2, 'Adi', 'aaaaaaaaaaaaabbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb                            ', 'umar', 1, '1755221557-image 20.png', '[{\"value\":\"11\"}]', '2025-08-15 01:32:37', '2025-08-24 16:57:50'),
(17, 2, 'Adimas', 'ssssssasdasdadawd                            ', 'umar', 1, '1755222385-image 9 (1).png', '[{\"value\":\"kosong\"}]', '2025-08-15 01:46:25', '2025-08-24 16:57:43'),
(18, 2, 'Entitas', 'Ditemukan sebuah entitas buas dan berbahaya                                                        ', 'umar', 1, '1755222676-mukajelek.jfif', '[{\"value\":\"hitam\"}]', '2025-08-15 01:51:16', '2025-08-24 16:57:00'),
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
(15, 'Illustration', 'portofolio', '2025-08-23 10:20:00', NULL),
(16, 'Books', 'portofolio', '2025-08-23 10:20:19', NULL),
(17, 'Branding', 'portofolio', '2025-08-23 10:20:54', NULL);

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
(7, 'Logo 1', '1755060663-Logo-1.png', '2025-08-13 04:51:03', NULL, 1),
(8, 'Golden', '1756031121-3.png', '2025-08-24 10:25:21', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cv`
--

CREATE TABLE `cv` (
  `id` int(11) NOT NULL,
  `cv` varchar(150) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cv`
--

INSERT INTO `cv` (`id`, `cv`, `created_at`, `updated_at`) VALUES
(1, '1756030127-Umar-Aziz-CV.pdf', '2025-08-24 10:08:31', '2025-08-24 10:08:47');

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

--
-- Dumping data for table `experience`
--

INSERT INTO `experience` (`id`, `how_long`, `time`, `created_at`, `updated_at`) VALUES
(1, '2', 'Years', '2025-08-19 13:47:00', '2025-08-19 14:48:02');

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
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `id` int(11) NOT NULL,
  `company` text NOT NULL,
  `job_title` text NOT NULL,
  `description` longtext NOT NULL,
  `start` varchar(4) NOT NULL,
  `ended` varchar(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`id`, `company`, `job_title`, `description`, `start`, `ended`, `created_at`, `updated_at`) VALUES
(1, 'Clarus Innovace Teknologi', 'Network Infrastructure Intern', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '2023', '2024', '2025-08-19 16:23:37', '2025-08-20 06:39:00'),
(2, 'PPKD Jakarta Pusat', 'Peserta Pelatihan jurusan Web Programming', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', '2025', '2025', '2025-08-20 01:38:10', '2025-08-20 06:39:07'),
(3, 'SMK Negeri 7 Jakarta', 'Subtitute Teacher | Interactive Media Design', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n', '2022', '2023', '2025-08-20 01:43:30', '2025-08-20 06:00:59'),
(4, 'NexFace', 'UI/UX Designer', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam', '2021', '2022', '2025-08-20 06:02:07', '2025-08-20 06:39:18');

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `number` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `name`, `number`, `created_at`, `updated_at`) VALUES
(1, 'hero', 1, '2025-08-24 14:43:55', NULL),
(2, 'about', 2, '2025-08-24 14:44:05', NULL),
(3, 'experience', 3, '2025-08-24 14:44:17', NULL),
(4, 'projects', 4, '2025-08-24 14:44:27', NULL),
(5, 'news', 5, '2025-08-24 14:44:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `portofolio`
--

CREATE TABLE `portofolio` (
  `id` int(11) NOT NULL,
  `id_category` varchar(100) NOT NULL,
  `id_label` varchar(150) NOT NULL,
  `label_data` varchar(150) NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` longtext NOT NULL,
  `client_name` varchar(100) NOT NULL,
  `project_date` date NOT NULL,
  `project_url` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `portofolio`
--

INSERT INTO `portofolio` (`id`, `id_category`, `id_label`, `label_data`, `title`, `content`, `client_name`, `project_date`, `project_url`, `image`, `price`, `is_active`, `created_at`, `updated_at`) VALUES
(5, 'Books', 'Authors', 'Vincent Van Gogh', 'Fury', '                                                                                                                                                                                                                                                            ', 'Hollywood', '2014-06-11', 'https://www.youtube.com/', '1755945125-220px-Fury_2014_poster.jpg', 90000000, 1, '2025-08-23 10:32:05', '2025-08-23 14:47:31'),
(6, 'Illustration', 'Illustrator', 'Katsushika Hokusai', 'The Great Wave off Kanagawa', '                                                                                                                                                                                                                                ', 'Some guy in 1831 japan', '1831-06-14', 'https://en.wikipedia.org/wiki/The_Great_Wave_off_K', '1755958026-wallhaven-w8l29p.jpg', 5000, 1, '2025-08-23 14:07:06', '2025-08-23 14:46:40'),
(7, 'Branding', 'Partner', 'Elrond ', 'No', '                                                        ', 'Destroy it! cast it into the fire!', '2025-08-13', 'https://www.youtube.com/watch?v=dL1G0DGqy8w', '1755958168-raw.png', 100000000, 1, '2025-08-23 14:09:28', '2025-08-23 14:47:18');

-- --------------------------------------------------------

--
-- Table structure for table `port_label`
--

CREATE TABLE `port_label` (
  `id` int(11) NOT NULL,
  `label` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `port_label`
--

INSERT INTO `port_label` (`id`, `label`, `created_at`, `updated_at`) VALUES
(1, 'Authors', '2025-08-23 10:15:19', NULL),
(2, 'Illustrator', '2025-08-23 10:15:38', NULL),
(3, 'Partner', '2025-08-23 10:16:13', NULL),
(4, 'Distributors', '2025-08-23 10:16:51', NULL);

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

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `skill`, `proficient`, `created_at`, `updated_at`) VALUES
(2, 'PHP', 80, '2025-08-19 12:11:28', NULL),
(4, 'Figma', 80, '2025-08-19 12:11:58', NULL),
(6, 'HTML', 100, '2025-08-23 09:53:10', NULL),
(7, 'Javascript', 10, '2025-08-23 09:53:32', NULL);

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
-- Table structure for table `specialization`
--

CREATE TABLE `specialization` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `specialization`
--

INSERT INTO `specialization` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'HTML/CSS', 'Im proficient in HTML/CSS with 2 years of experience', 1, '2025-08-21 08:07:28', '2025-08-22 00:55:05'),
(2, 'Web Design', 'Experienced in using and designing Web UI/UX with figma ', 1, '2025-08-22 00:56:13', NULL),
(5, 'PHP ', 'Hands on experience PHP with Laravel projects ', 1, '2025-08-22 07:08:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `trailers`
--

CREATE TABLE `trailers` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `caption` text NOT NULL,
  `url` varchar(150) NOT NULL,
  `image` varchar(150) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trailers`
--

INSERT INTO `trailers` (`id`, `title`, `caption`, `url`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Here goes my video', 'This would be where i introduce myself', 'https://www.youtube.com/watch?v=dQw4w9WgXcQ', '1755941643-wallhaven-5wr3m7.jpg', 1, '2025-08-19 15:31:27', '2025-08-23 09:34:03');

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
-- Indexes for table `cv`
--
ALTER TABLE `cv`
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
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portofolio`
--
ALTER TABLE `portofolio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `port_label`
--
ALTER TABLE `port_label`
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
-- Indexes for table `specialization`
--
ALTER TABLE `specialization`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trailers`
--
ALTER TABLE `trailers`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cv`
--
ALTER TABLE `cv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `experience`
--
ALTER TABLE `experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hero`
--
ALTER TABLE `hero`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `portofolio`
--
ALTER TABLE `portofolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `port_label`
--
ALTER TABLE `port_label`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `specialization`
--
ALTER TABLE `specialization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `trailers`
--
ALTER TABLE `trailers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
