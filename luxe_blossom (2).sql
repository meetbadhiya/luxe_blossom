-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2025 at 05:12 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `luxe_blossom`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(6) UNSIGNED NOT NULL,
  `user_id` int(6) UNSIGNED DEFAULT NULL,
  `product_id` int(6) UNSIGNED DEFAULT NULL,
  `quantity` int(6) DEFAULT 1,
  `added_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `price`, `description`, `image`, `created_at`) VALUES
(1, 'Eternal Elegance', 'women', '129.99', 'A floral fragrance with notes of jasmine and vanilla', 'https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/44e2f4bd-3b75-4f41-8c68-002558dae795.png', '2025-07-23 03:17:01'),
(2, 'Noir Enigma', 'men', '149.99', 'Woody and masculine with hints of amber and leather', 'https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/87fa7e58-70a1-4e35-a8ee-4256b9c579a4.png', '2025-07-23 03:17:01'),
(3, 'Aqua Blossom', 'unisex', '99.99', 'Fresh aquatic fragrance for everyday wear', 'https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/728a47db-bec6-4e9f-b20f-1af7005efd36.png', '2025-07-23 03:17:01'),
(4, 'Velvet Rose', 'women', '139.99', 'Luxurious rose fragrance with warm amber base', 'https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/7853bee3-2703-4440-9590-d7ae5a3c5308.png', '2025-07-23 03:17:01'),
(5, 'Tobacco Oud', 'men', '169.99', 'Rich tobacco and oud combination for special occasions', 'https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/e9b10ea3-f86c-45b5-870a-10271dae6021.png', '2025-07-23 03:17:01'),
(6, 'Citrus Zest', 'body spray', '49.99', 'Energizing citrus blend for refreshing moments', 'https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/9beb0d27-827a-498c-ae7f-3a8854fab4a7.png', '2025-07-23 03:17:01'),
(7, 'Silk Powder', 'women', '119.99', 'Delicate powdery fragrance with soft musk', 'https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/40238691-ac81-4757-9cbd-f1b85fb6904d.png', '2025-07-23 03:17:01'),
(8, 'Royal Mystique', 'men', '159.99', 'Luxurious blend of spices and precious woods', 'https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/bf794933-9186-4e31-901d-05a8ae821f64.png', '2025-07-23 03:17:01'),
(9, 'Bamboo Mist', 'body spray', '39.99', 'Fresh green bamboo fragrance for daily freshness', 'https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/5bd66d9e-0d0b-4f18-a5ee-301b2b7c00ed.png', '2025-07-23 03:17:01'),
(10, 'Vanilla Bloom', 'women', '109.99', 'Warm vanilla with hints of coconut and caramel', 'https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/8850f8ae-c618-4845-8862-e21c49ba1515.png', '2025-07-23 03:17:01'),
(11, 'Golden Tobacco', 'men', '149.99', 'Rich honeyed tobacco with subtle floral notes', 'https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/c1bf77a8-5121-4950-94b0-dc18d2b8361b.png', '2025-07-23 03:17:01'),
(12, 'Lavender Haze', 'body spray', '44.99', 'Soothing lavender with herbal undertones', 'https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/1f68a141-16d4-42dd-bf87-77ad42485052.png', '2025-07-23 03:17:01'),
(13, 'Jasmine Noir', 'women', '129.99', 'Dark floral with jasmine and patchouli base', 'https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/906a0dd5-a1f0-4c33-8263-0e91c9f31d24.png', '2025-07-23 03:17:01'),
(14, 'Mahogany Woods', 'men', '139.99', 'Deep woody fragrance with fresh bergamot top', 'https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/4a7d8a46-84f2-44ee-af48-aacb781d47f3.png', '2025-07-23 03:17:01'),
(15, 'Aqua Mint', 'body spray', '39.99', 'Cooling mint with sparkling water effect', 'https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/62eb0089-c717-4644-82c0-b9de21e417e2.png', '2025-07-23 03:17:01');

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE `userdata` (
  `Username` varchar(10) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Number` int(10) NOT NULL,
  `Password` varchar(15) NOT NULL,
  `ConfirmPwd` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userdata`
--
ALTER TABLE `userdata`
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
