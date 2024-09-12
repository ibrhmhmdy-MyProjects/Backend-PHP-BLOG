-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2024 at 09:06 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `body` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `image`, `body`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(7, 'Post 01', '2024091266e33462b262a.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque illum nisi, unde rerum consequatur veniam temporibus sed nesciunt natus vero eius est sunt quod quae asperiores sequi doloribus ut cupiditate.', 1, 3, '2024-09-12', '2024-09-12'),
(8, 'Post 02', '2024091266e33495b47c8.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque illum nisi, unde rerum consequatur veniam temporibus sed nesciunt natus vero eius est sunt quod quae asperiores sequi doloribus ut cupiditate.', 1, 3, '2024-09-12', '2024-09-12'),
(9, 'Post 03', '2024091266e334a818492.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque illum nisi, unde rerum consequatur veniam temporibus sed nesciunt natus vero eius est sunt quod quae asperiores sequi doloribus ut cupiditate.', 0, 3, '2024-09-12', '2024-09-12'),
(10, 'Post 01', '2024091266e338a291f4e.jpg', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Exercitationem nostrum aspernatur iure quasi, dolores odio harum. Amet alias nulla commodi perferendis repellendus sed, ad quia blanditiis ducimus? Iste, quae provident!', 1, 4, '2024-09-12', '2024-09-12'),
(11, 'Post 02', '2024091266e338ba3d4f6.jpg', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Exercitationem nostrum aspernatur iure quasi, dolores odio harum. Amet alias nulla commodi perferendis repellendus sed, ad quia blanditiis ducimus? Iste, quae provident!', 1, 4, '2024-09-12', '2024-09-12'),
(12, 'Post 03', '2024091266e338d78139f.jpg', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Exercitationem nostrum aspernatur iure quasi, dolores odio harum. Amet alias nulla commodi perferendis repellendus sed, ad quia blanditiis ducimus? Iste, quae provident!', 1, 4, '2024-09-12', '2024-09-12'),
(13, 'Post 04', '2024091266e33b4d024aa.png', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Exercitationem nostrum aspernatur iure quasi, dolores odio harum. Amet alias nulla commodi perferendis repellendus sed, ad quia blanditiis ducimus? Iste, quae provident!\r\n', 0, 4, '2024-09-12', '2024-09-12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(64) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(3, 'admin', 'admin@gmail.com', '$2y$10$N/yEw5l4DifW5g2QM3HQOu13.ntELUQqXIy5QwRpGkUFiC45jcXve', '2024-09-11'),
(4, 'Ibrahim Hamdy', 'ibrhmhmdy@gmail.com', '$2y$10$4l1I2gWlpCnBQuPp.YJgEOlxaC.wpNSou7JGSr.ORpy2EROVUOR9.', '2024-09-11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
