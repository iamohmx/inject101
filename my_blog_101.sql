-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2023 at 04:27 AM
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
-- Database: `my_blog_101`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(150) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`) VALUES
(1, 'Computer'),
(2, 'Science'),
(3, 'Languages'),
(4, 'Education'),
(5, 'Math'),
(6, 'LifeStyle');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `com_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `commented_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`com_id`, `post_id`, `user_id`, `comment`, `commented_at`, `updated_at`) VALUES
(5, 24, 8, 'Cool Bro!', '2023-12-22 17:28:48', '2023-12-22 17:28:48'),
(6, 19, 8, 'What is it?', '2023-12-22 17:46:46', '2023-12-22 17:46:46'),
(7, 24, 2, 'What is it?', '2023-12-22 17:47:17', '2023-12-22 17:47:17'),
(8, 23, 2, 'Wow this is amazing!!', '2023-12-22 17:49:44', '2023-12-22 17:49:44'),
(9, 23, 3, 'Yeah', '2023-12-22 17:50:28', '2023-12-22 17:50:28'),
(10, 21, 9, 'Yes@@!!', '2023-12-22 17:55:26', '2023-12-22 17:55:26'),
(11, 13, 2, 'gsh', '2023-12-23 02:17:55', '2023-12-23 02:17:55');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `cat_id`, `title`, `content`, `image`, `created_at`, `updated_at`) VALUES
(3, 1, 3, 'Tres-Zap', 'PC Anywhere', 'https://i.ibb.co/THd2sP3/410659495-744330384224178-6755244670443417865-n.jpg', '2023-12-21 06:53:40', '2023-12-21 06:53:40'),
(4, 1, 3, 'Bamity', 'Affordable Housing', 'https://i.ibb.co/THd2sP3/410659495-744330384224178-6755244670443417865-n.jpg', '2023-12-21 06:53:40', '2023-12-21 06:53:40'),
(5, 1, 2, 'Veribet', 'Db4o', 'https://i.ibb.co/THd2sP3/410659495-744330384224178-6755244670443417865-n.jpg', '2023-12-21 06:53:40', '2023-12-21 06:53:40'),
(6, 1, 3, 'Holdlamis', 'Landlords', 'https://i.ibb.co/THd2sP3/410659495-744330384224178-6755244670443417865-n.jpg', '2023-12-21 06:53:40', '2023-12-21 06:53:40'),
(7, 1, 1, 'Bitchip', 'Kodaly', 'https://i.ibb.co/THd2sP3/410659495-744330384224178-6755244670443417865-n.jpg', '2023-12-21 06:53:40', '2023-12-21 06:53:40'),
(8, 1, 1, 'Fixflex', 'Seismic Attributes', 'https://i.ibb.co/THd2sP3/410659495-744330384224178-6755244670443417865-n.jpg', '2023-12-21 06:53:40', '2023-12-21 06:53:40'),
(9, 1, 1, 'Sonair', 'PeopleSoft', 'https://i.ibb.co/THd2sP3/410659495-744330384224178-6755244670443417865-n.jpg', '2023-12-21 06:53:40', '2023-12-21 06:53:40'),
(10, 1, 1, 'Stronghold', 'Soft Skills', 'https://i.ibb.co/THd2sP3/410659495-744330384224178-6755244670443417865-n.jpg', '2023-12-21 06:53:40', '2023-12-21 06:53:40'),
(11, 1, 5, 'Bytecard', 'Xeriscaping', 'https://i.ibb.co/THd2sP3/410659495-744330384224178-6755244670443417865-n.jpg', '2023-12-21 06:53:40', '2023-12-21 06:53:40'),
(12, 1, 5, 'Vagram', 'Junior Golf', 'https://i.ibb.co/THd2sP3/410659495-744330384224178-6755244670443417865-n.jpg', '2023-12-21 06:53:40', '2023-12-21 06:53:40'),
(13, 1, 1, 'Temp', 'JDE One World', 'https://i.ibb.co/THd2sP3/410659495-744330384224178-6755244670443417865-n.jpg', '2023-12-21 06:53:40', '2023-12-21 06:53:40'),
(14, 1, 3, 'Voyatouch', 'Program Evaluation', 'https://i.ibb.co/THd2sP3/410659495-744330384224178-6755244670443417865-n.jpg', '2023-12-21 06:53:40', '2023-12-21 06:53:40'),
(15, 1, 1, 'Asoka', 'Hazard Recognition', 'https://i.ibb.co/THd2sP3/410659495-744330384224178-6755244670443417865-n.jpg', '2023-12-21 06:53:40', '2023-12-21 06:53:40'),
(16, 1, 1, 'Tresom', 'Avaya Communication Manager', 'https://i.ibb.co/THd2sP3/410659495-744330384224178-6755244670443417865-n.jpg', '2023-12-21 06:53:40', '2023-12-21 06:53:40'),
(17, 1, 4, 'Domainer', 'GNU Make', 'https://i.ibb.co/THd2sP3/410659495-744330384224178-6755244670443417865-n.jpg', '2023-12-21 06:53:40', '2023-12-21 06:53:40'),
(18, 1, 1, 'Domainer', 'Custom Furniture', 'https://i.ibb.co/THd2sP3/410659495-744330384224178-6755244670443417865-n.jpg', '2023-12-21 06:53:40', '2023-12-21 06:53:40'),
(19, 1, 1, 'Matsoft', 'Oenology', 'https://i.ibb.co/THd2sP3/410659495-744330384224178-6755244670443417865-n.jpg', '2023-12-21 06:53:40', '2023-12-21 06:53:40'),
(20, 1, 1, 'Redhold', 'BST', 'https://i.ibb.co/THd2sP3/410659495-744330384224178-6755244670443417865-n.jpg', '2023-12-21 06:53:40', '2023-12-21 06:53:40'),
(21, 1, 1, 'Greenlam', 'Zendesk', 'https://i.ibb.co/THd2sP3/410659495-744330384224178-6755244670443417865-n.jpg', '2023-12-21 06:53:40', '2023-12-21 06:53:40'),
(23, 8, 2, 'Tea', 'Tea is the best in the world!', 'https://i.ibb.co/THd2sP3/410659495-744330384224178-6755244670443417865-n.jpg', '2023-12-22 12:18:25', '2023-12-22 17:05:15'),
(24, 8, 2, 'Cokey Yeah!', 'its so amazing!', 'https://i.ibb.co/THd2sP3/410659495-744330384224178-6755244670443417865-n.jpg', '2023-12-22 12:20:17', '2023-12-22 17:05:09');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `tag_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `tag_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`tag_id`, `cat_id`, `tag_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'computer', '2023-12-21 14:47:54', '2023-12-21 14:47:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(80) NOT NULL,
  `user_level` enum('member','admin') NOT NULL DEFAULT 'member',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `user_level`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin@admin', 'admin', '2023-12-21 06:50:14', '2023-12-21 06:50:15'),
(2, 'user', 'user', 'user@user', 'member', '2023-12-21 06:51:56', '2023-12-21 06:51:57'),
(3, 'guest', 'guest', 'guest@guest', 'member', '2023-12-21 14:50:16', '2023-12-21 14:50:16'),
(7, 'test', 'test', 'test@test', 'member', '2023-12-22 06:25:13', '2023-12-22 06:25:13'),
(8, 'pachara', 'pachara', 'pachara@pachara', 'admin', '2023-12-22 06:26:56', '2023-12-22 06:26:56'),
(9, 'supaporn', 'supaporn', 'supaporn@supaporn', 'admin', '2023-12-22 17:53:29', '2023-12-22 17:53:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`com_id`),
  ADD KEY `com_user_fk` (`user_id`),
  ADD KEY `com_post_fk` (`post_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `post_cat_fk` (`cat_id`),
  ADD KEY `post_user_fk` (`user_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tag_id`),
  ADD KEY `tag_cat_fk` (`cat_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `com_post_fk` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `com_user_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `post_cat_fk` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_user_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tags`
--
ALTER TABLE `tags`
  ADD CONSTRAINT `tag_cat_fk` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
