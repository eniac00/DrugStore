-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2022 at 06:34 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `drugstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `product_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `description`, `price`, `quantity`, `company`, `product_image`) VALUES
(1, 'MULTIVIT PLUS', 'Multi-vitamin supplements', 60, 1500, 'SQUARE PHARMACEUTICALS LIMITED', 'product1.png'),
(2, 'CEEVIT 250MG Tab', 'Vitamin c supplements', 2, 2300, 'SQUARE PHARMACEUTICALS LIMITED', 'product2.png'),
(3, 'GENSULIN R 100 IU VIAL INSULIN', 'Insulin', 450, 1200, 'BEXIMCO PHARMACEUTICALS LTD', 'product3.png'),
(4, 'MAXPRO EC 20 MG Tab', 'Used as treatment for acidity', 45, 600, 'RENATA LIMITED', 'product4.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `phone`, `email`, `password`) VALUES
(1, 'Sanjida ', 'Tasnim', '01234567892', 'sanjida@gmail.com', 'password'),
(2, 'John', 'Doe', '01254789630', 'john@gmail.com', 'password'),
(3, 'Mark ', 'Maddness', '0123648948', 'mark@gmal.com', 'password'),
(4, 'Anya', 'Forger', '01258963478', 'anya@gmail.com', 'password'),
(5, 'Sanji', 'Tas', '011354646864', 'sanji@gmail.com', 'password'),
(6, 'Abir', 'B', '01235648', 'abir@gmail.com', 'password'),
(7, 'abcd', 'were', '0125874693', 'abcd@gmail.com', 'password'),
(8, 'Namreen', 'S', '0123546849', 'namreen@gmail.com', 'password');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
