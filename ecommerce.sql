-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2023 at 08:41 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vicky_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(250) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'Cr', '2023-12-09 09:28:43', '2023-12-09 09:30:35'),
(2, 'Car', '2023-12-09 11:06:10', '2023-12-09 11:06:10'),
(3, 'Bike', '2023-12-09 11:07:14', '2023-12-09 11:07:14'),
(4, 'Bycycle', '2023-12-09 11:11:34', '2023-12-09 11:11:34'),
(5, 'Sofa', '2023-12-09 12:54:25', '2023-12-09 12:54:25');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id``` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `price` varchar(250) NOT NULL,
  `category_id` int(11) NOT NULL,
  `phone_number` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id``, `title`, `description`, `price`, `category_id`, `phone_number`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Car', 'qqqqqqqqq', '123', 1, '9944842420', 'uploads/images/Df5wSZfP6m.png', '2023-12-09 09:48:17', '2023-12-09 09:48:17'),
(2, 'Car', 'qqqqqqqqq', '123', 1, '9944842420', 'uploads/images/U4sI0qRKkI.png', '2023-12-09 09:48:49', '2023-12-09 09:48:49'),
(3, 'Car', 'qqqqqqqqq', '123', 1, '9944842420', 'uploads/images/O8ITcekXKn.png', '2023-12-09 12:46:53', '2023-12-09 12:46:53'),
(4, 'Car', 'qqqqqqqqq', '123', 2, '9944842420', 'uploads/images/QDzHy44FJc.png', '2023-12-09 12:47:39', '2023-12-09 12:47:39'),
(5, 'Car', 'qqqqqqqqq', '123', 2, '9944842420', 'uploads/images/GEPF44tOTm.png', '2023-12-09 12:48:39', '2023-12-09 12:48:39'),
(6, 'Car', 'qqqqqqqqq', '123', 3, '9944842420', 'uploads/images/dRS7QfLLbs.png', '2023-12-09 12:53:14', '2023-12-09 12:53:14'),
(7, 'Car', 'qqqqqqqqq', '123', 3, '9944842420', 'uploads/images/D5E3l5VTD1.png', '2023-12-09 12:58:27', '2023-12-09 12:58:27'),
(8, 'Car', 'qqqqqqqqq', '123', 3, '9944842420', 'uploads/images/fkOGIACOyn.png', '2023-12-09 12:59:22', '2023-12-09 12:59:22'),
(9, 'Car', 'qqqqqqqqq', '123', 3, '9944842420', 'uploads/images/8p7P7mmdky.png', '2023-12-09 13:03:06', '2023-12-09 13:03:06'),
(10, 'Car', 'qqqqqqqqq', '123', 3, '9944842420', 'uploads/images/t8wzJCW16L.png', '2023-12-09 13:07:33', '2023-12-09 13:07:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Sakthivel', 'sakthivel@gmail.com', '$2y$10$bZpp/0GbdtBpMstPZD7BN..pmWLKN9gCvZ3Ni2gixT6dWCPILwo4O', '2023-12-09 09:17:39', '2023-12-09 09:17:39'),
(2, 'sakthivel', 'iyyappan@gmail.com', '$2y$10$fx81xsA4GMnnOALe5/hHdu82o1oCp3R3ZfokAKHbBKicnTvyyAJ6C', '2023-12-09 10:45:09', '2023-12-09 10:45:09'),
(3, 'Iyappan', 'iyyappanabd@gmail.com', '$2y$10$rIrXX70j3pwd/26J4tI08.69bts5cB3xFqTd6vjTGU8dN4szTWPLy', '2023-12-09 10:45:59', '2023-12-09 10:45:59'),
(4, 'Iyappan', 'iyyappan123@gmail.com', '$2y$10$mSQRqQjAptCViZQUjg8aaem2LK9k154lVZB/jAwxVTDA.aFI/MoNG', '2023-12-09 10:46:29', '2023-12-09 10:46:29'),
(5, 'Vicky', 'vicky@gmail.com', '$2y$10$aDVhywRabaxoa3.nCkRUKO6REH4Iv6jEQO/Uj9AfSyxzjfqiLka3K', '2023-12-09 10:47:05', '2023-12-09 10:47:05'),
(6, 'sakthi', 'sakthi@gmail.com', '$2y$10$IG7z2WdwdIhglBH6BN1e6.QZn8KwcpsKnizKwOfygQwFXp8QaZ5SO', '2023-12-09 10:47:47', '2023-12-09 10:47:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id```);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id``` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
