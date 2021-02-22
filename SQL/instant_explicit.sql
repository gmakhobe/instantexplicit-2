-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 22, 2021 at 08:25 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `instant_explicit`
--

-- --------------------------------------------------------

--
-- Table structure for table `bananas`
--

CREATE TABLE `bananas` (
  `Id` bigint(20) NOT NULL,
  `post_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `created_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bananas`
--

INSERT INTO `bananas` (`Id`, `post_id`, `user_id`, `created_date`) VALUES
(4, 4, 2, '2021-01-31 22:07:13'),
(5, 7, 2, '2021-02-01 00:05:58'),
(6, 2, 4, '2021-02-03 19:12:31'),
(7, 2, 4, '2021-02-03 19:12:38'),
(8, 5, 4, '2021-02-03 19:13:53'),
(9, 5, 4, '2021-02-03 19:14:19'),
(10, 5, 4, '2021-02-03 19:14:25'),
(11, 8, 4, '2021-02-03 19:38:49'),
(12, 3, 4, '2021-02-03 20:47:07'),
(13, 9, 4, '2021-02-03 21:23:24'),
(14, 6, 2, '2021-02-21 08:37:37');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `Id` bigint(20) NOT NULL,
  `post_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `comment` text NOT NULL,
  `created_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`Id`, `post_id`, `user_id`, `comment`, `created_date`) VALUES
(1, 3, 4, 'Hello World Beautiful', '2021-01-31 09:18:53'),
(2, 3, 5, 'Hello World Beautiful', '2021-01-31 09:19:21'),
(3, 3, 2, 'Hello World Beautiful', '2021-01-31 09:19:35'),
(4, 3, 4, 'Hello World Beautiful', '2021-01-31 09:48:24'),
(5, 3, 5, 'Hello World Beautiful', '2021-01-31 09:48:24'),
(6, 3, 2, 'Hello World Beautiful', '2021-01-31 09:48:24'),
(7, 4, 2, 'Hello Son', '2021-01-31 20:46:35'),
(8, 1, 4, 'Hello', '2021-01-31 23:42:14'),
(9, 1, 2, 'Dintsha', '2021-01-31 23:43:23'),
(10, 8, 2, 'fuffyfy', '2021-02-01 00:28:53'),
(11, 7, 2, 'Nice vision', '2021-02-01 01:09:06'),
(12, 3, 4, 'kkk', '2021-02-03 20:46:29'),
(13, 3, 4, '@gmakhobe', '2021-02-03 20:49:01');

-- --------------------------------------------------------

--
-- Table structure for table `followers`
--

CREATE TABLE `followers` (
  `Id` bigint(20) NOT NULL,
  `followed_user_id` bigint(20) NOT NULL,
  `following_user_id` bigint(20) NOT NULL,
  `created_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `followers`
--

INSERT INTO `followers` (`Id`, `followed_user_id`, `following_user_id`, `created_date`) VALUES
(5, 5, 4, '2021-02-03 18:32:47'),
(8, 9, 4, '2021-02-03 21:17:09'),
(9, 2, 4, '2021-02-03 21:24:17'),
(10, 2, 2, '2021-02-21 08:36:52'),
(12, 4, 4, '2021-02-21 13:53:37'),
(15, 3, 4, '2021-02-21 18:54:53');

-- --------------------------------------------------------

--
-- Table structure for table `peachs`
--

CREATE TABLE `peachs` (
  `Id` bigint(20) NOT NULL,
  `post_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `created_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peachs`
--

INSERT INTO `peachs` (`Id`, `post_id`, `user_id`, `created_date`) VALUES
(1, 4, 2, '2021-01-31 21:43:14'),
(2, 1, 2, '2021-01-31 22:07:53'),
(3, 1, 4, '2021-01-31 23:41:57'),
(4, 8, 2, '2021-02-01 00:29:06'),
(5, 5, 4, '2021-02-03 19:55:14'),
(6, 3, 4, '2021-02-03 20:46:15'),
(7, 6, 2, '2021-02-21 08:37:31');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `Id` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `path` varchar(1000) NOT NULL,
  `caption` text NOT NULL,
  `type` int(11) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`Id`, `user_id`, `path`, `caption`, `type`, `created_date`) VALUES
(1, 2, '/post_images/gmakhobe_1612020002_post_image.png', 'Hello World', 0, '2021-01-30 17:20:02'),
(2, 2, '/post_images/gmakhobe_1612020796_post_image.png', 'Thi issa dope thing', 0, '2021-01-30 17:33:16'),
(3, 2, '/post_images/gmakhobe_1612020854_post_image.jpg', 'Another one', 0, '2021-01-30 17:34:14'),
(4, 2, '/post_images/gmakhobe_1612020996_post_image.jpg', 'Mona Lisa', 0, '2021-01-30 17:36:36'),
(5, 2, '/post_images/gmakhobe_1612130005_post_image.jpg', 'This is Scream', 0, '2021-01-31 23:53:25'),
(6, 2, '/post_images/gmakhobe_1612130157_post_image.jpg', 'Another Scream', 0, '2021-01-31 23:55:57'),
(7, 4, '/post_images/aaxe_1612130656_post_image.jpg', 'I like this one because it portays how I see life now. I mean literally so. I so I have to fix this sickness with the money I have to get from wor.', 0, '2021-02-01 00:04:16'),
(8, 2, '/post_images/gmakhobe_1612132119_post_image.jpg', 'Beatufguui bguiguigb', 0, '2021-02-01 00:28:39'),
(9, 4, '/post_images/aaxe_1612380161_post_image.jpg', 'This is an image', 0, '2021-02-03 21:22:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` bigint(20) NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `email_address` varchar(100) DEFAULT NULL,
  `passcode` varchar(250) DEFAULT NULL,
  `activation_hash` varchar(250) DEFAULT NULL,
  `activation_status` int(11) DEFAULT NULL,
  `user_type` int(11) DEFAULT NULL,
  `url_banner` varchar(250) NOT NULL,
  `url_profile` varchar(250) NOT NULL,
  `url_twitter` varchar(250) NOT NULL,
  `url_instagram` varchar(250) NOT NULL,
  `url_onlyfans` varchar(250) NOT NULL,
  `url_website` varchar(250) NOT NULL,
  `biography` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `subscription_fee` float NOT NULL,
  `registration_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `full_name`, `username`, `email_address`, `passcode`, `activation_hash`, `activation_status`, `user_type`, `url_banner`, `url_profile`, `url_twitter`, `url_instagram`, `url_onlyfans`, `url_website`, `biography`, `category`, `subscription_fee`, `registration_date`) VALUES
(2, 'Given Seakamela', 'gmakhobe', 'nzilanegiven@gmail.com', 'Hello@World', '441574486', 1, 0, '/profile_banners/gmakhobe_1611533652_profile_banner.jpg', '/profile_pictures/gmakhobe_1611533619_profile_picture.jpg', 'gmakhobe', 'gmakhobe', 'gmakhobe', 'www.website.com', 'I like shoes', 'Comedian', 0, '2021-01-25 22:47:23'),
(3, 'Adam Alan', 'aalan', 'aalan@gmail.com', 'Hello@World', '441574488', 1, 0, '', '', '', 'aalan', '', 'www.website.com', 'I like tables', 'Comedian', 80, '2021-01-25 23:47:40'),
(4, 'Ann Axe', 'aaxe', 'aaxe@gmail.com', 'Hello@World', '441574402', 1, 1, '/profile_pictures/gmakhobe_1611533619_profile_picture.jpg', '/profile_pictures/gmakhobe_1611533619_profile_picture.jpg', '', 'aaxe', '', 'www.website.com', 'I like exes', 'Comedian', 1000000, '2021-01-26 00:00:02'),
(5, 'Alex Ashton', 'aashton', 'aashton@gmail.com', 'Hello@World', '441574403', 1, 0, '/profile_pictures/gmakhobe_1611533619_profile_picture.jpg', '/profile_pictures/gmakhobe_1611533619_profile_picture.jpg', '', 'aashton', '', 'www.website.com', 'I like rows', 'Comedian', 104, '2021-01-26 00:00:02'),
(6, 'Ben Bently', 'bbently', 'bbently@gmail.com', 'Hello@World', '441574404', 1, 0, '', '', '', 'bbently', '', 'www.website.com', 'I like colomns', 'Comedian', 80, '2021-01-26 00:03:39'),
(7, 'Ban Bangie', 'bbangie', 'bbangie@gmail.com', 'Hello@World', '441574405', 1, 0, '', '', '', 'bbangie', '', 'www.website.com', 'I like bans', 'Comedian', 10, '2021-01-26 00:03:39'),
(8, 'Cain Chain', 'cchain', 'cchain@gmail.com', 'Hello@World', '441574406', 1, 0, '', '', '', 'cchain', '', 'www.website.com', 'I like chains', 'Comedian', 50, '2021-01-26 00:03:39'),
(9, 'Dan Dam', 'ddam', 'ddam@gmail.com', 'Hello@World', '441574407', 1, 0, '', '', '', 'ddam', '', 'www.website.com', 'I like dams', 'Comedian', 63, '2021-01-26 00:03:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bananas`
--
ALTER TABLE `bananas`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `followers`
--
ALTER TABLE `followers`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `peachs`
--
ALTER TABLE `peachs`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `path` (`path`) USING HASH;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email_address` (`email_address`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bananas`
--
ALTER TABLE `bananas`
  MODIFY `Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `followers`
--
ALTER TABLE `followers`
  MODIFY `Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `peachs`
--
ALTER TABLE `peachs`
  MODIFY `Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
