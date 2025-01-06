-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 06, 2025 at 10:31 AM
-- Server version: 9.0.1
-- PHP Version: 8.2.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int NOT NULL,
  `option_id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `option_id`, `name`, `price`, `created_at`) VALUES
(41, 14, 'Dorian Jordan', 957.00, '2025-01-06 10:29:33'),
(43, 16, 'Option 1', 500.00, '2025-01-06 10:29:37');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `created_at`) VALUES
(22, 'Judah Young', 'Electronics', '2025-01-06 08:43:35'),
(23, 'Judah Young', 'Electronics', '2025-01-06 08:44:01'),
(24, 'Option tst', 'Fashion', '2025-01-06 09:13:25'),
(25, 'Option tst', 'Fashion', '2025-01-06 09:16:13'),
(26, 'Lavinia Johns', 'Fashion', '2025-01-06 09:47:45'),
(27, 'test product', 'Electronics', '2025-01-06 09:48:17'),
(28, 'test product', 'Electronics', '2025-01-06 09:50:15');

-- --------------------------------------------------------

--
-- Table structure for table `product_options`
--

CREATE TABLE `product_options` (
  `id` int NOT NULL,
  `product_id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product_options`
--

INSERT INTO `product_options` (`id`, `product_id`, `name`, `image`, `price`, `created_at`) VALUES
(12, 20, 'Portia Lopez', '1736152928_6325712114148294876.jpg', 999.00, '2025-01-06 08:42:08'),
(13, 21, 'Portia Lopez', '1736152961_6325712114148294876.jpg', 999.00, '2025-01-06 08:42:41'),
(14, 22, 'Dorian Jordan', '1736153015_photo_2024-12-18_15-39-40.jpg', 957.00, '2025-01-06 08:43:35'),
(15, 23, 'Dorian Jordan', '1736153041_photo_2024-12-18_15-39-40.jpg', 957.00, '2025-01-06 08:44:01'),
(16, 24, 'Option 1', '1736154805_photo_2024-12-17_17-26-57.jpg', 500.00, '2025-01-06 09:13:25'),
(17, 24, 'Option 2', '1736154805_photo_2024-12-18_15-39-40.jpg', 400.00, '2025-01-06 09:13:25'),
(18, 25, 'Option 1', '1736154973_photo_2024-12-17_17-26-57.jpg', 500.00, '2025-01-06 09:16:13'),
(19, 25, 'Option 2', '1736154973_photo_2024-12-18_15-39-40.jpg', 400.00, '2025-01-06 09:16:13'),
(20, 26, 'Jameson Love', '1736156865_6325712114148294876.jpg', 276.00, '2025-01-06 09:47:45'),
(21, 27, 'Carissa Ramos', '1736156897_DALL·E 2025-01-03 12.22.36 - A bold and energetic logo design for a cricket team named \'Thunderbolt\'. The design includes a large, dynamic lightning bolt in the center, with a cri.webp', 324234.00, '2025-01-06 09:48:17'),
(22, 28, 'Carissa Ramos', '1736157015_DALL·E 2025-01-03 12.22.36 - A bold and energetic logo design for a cricket team named \'Thunderbolt\'. The design includes a large, dynamic lightning bolt in the center, with a cri.webp', 324234.00, '2025-01-06 09:50:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `option_id` (`option_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_options`
--
ALTER TABLE `product_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `product_options`
--
ALTER TABLE `product_options`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`option_id`) REFERENCES `product_options` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_options`
--
ALTER TABLE `product_options`
  ADD CONSTRAINT `product_options_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
