-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 29, 2022 at 07:00 PM
-- Server version: 10.6.11-MariaDB-0ubuntu0.22.04.1
-- PHP Version: 8.1.2-1ubuntu2.9

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
  `product_name` varchar(50) NOT NULL,
  `product_desc` varchar(100) DEFAULT NULL,
  `price` double NOT NULL,
  `stock` int(11) NOT NULL,
  `company` varchar(30) NOT NULL,
  `gen_name` varchar(30) NOT NULL,
  `product_image` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_desc`, `price`, `stock`, `company`, `gen_name`, `product_image`) VALUES
(14, 'napa', 'sdfsdf', 23, 234, 'wass', 'napa', '63865626907188.76471045.jpg'),
(15, 'asdf', 'sdfsdf23sagae', 23, 23525, 'sdf', 'wordl', '63865664a09ca1.57374131.jpg');

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
  `password` varchar(255) DEFAULT NULL,
  `is_admin` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `phone`, `email`, `password`, `is_admin`) VALUES
(1, 'Sanjida ', 'Tasnim', '01234567892', 'sanjida@gmail.com', 'password', 0),
(2, 'John', 'Doe', '01254789630', 'john@gmail.com', 'password', 0),
(3, 'Mark ', 'Maddness', '0123648948', 'mark@gmal.com', 'password', 0),
(4, 'Anya', 'Forger', '01258963478', 'anya@gmail.com', 'password', 0),
(5, 'Sanji', 'Tas', '011354646864', 'sanji@gmail.com', 'password', 0),
(6, 'Abir', 'B', '01235648', 'abir@gmail.com', 'password', 0),
(7, 'abcd', 'were', '0125874693', 'abcd@gmail.com', 'password', 0),
(8, 'Namreen', 'S', '0123546849', 'namreen@gmail.com', 'password', 0),
(10, 'hello', 'world', '2342342342', 'hello@gmail.com', 'password', 0),
(11, 'admin', NULL, NULL, 'admin@gmail.com', 'admin', 1);

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
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
