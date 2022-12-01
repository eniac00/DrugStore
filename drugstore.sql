-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 01, 2022 at 07:42 PM
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
  `product_name` varchar(30) NOT NULL,
  `generic_name` varchar(150) DEFAULT NULL,
  `price` double NOT NULL,
  `product_desc` text DEFAULT NULL,
  `expiration_date` date NOT NULL,
  `company` varchar(30) NOT NULL,
  `stock` int(11) NOT NULL,
  `product_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `generic_name`, `price`, `product_desc`, `expiration_date`, `company`, `stock`, `product_img`) VALUES
(1, 'Napa Extra', 'Paracetamol', 2, 'Paracetamol is an analgesic and antipyretic with just a little anti-inflammatory effect. Paracetamol (Acetaminophen) is considered to work largely in the central nervous system (CNS)', '2029-12-29', 'Beximco', 295, '6388fab2934246.83926394.jpg'),
(2, 'Dermasol', 'Clobetasol Propinate', 71, 'Clobetasol Propionate is used to treat the following dermatoses in adults, the elderly, and children over the age of one year.', '2023-02-25', 'Square', 105, '6388fee294ee85.91952131.jpg'),
(3, 'Phenadryl', 'Diphenhydramine Hydrochloride', 40, 'PHENADRYL is indicated in all histaminic diseases such as perennial and seasonal allergic rhinitis, vasomotor rhinitis, allergic conjunctivitis, urticaria, angio-edema, allergic reactions to blood and plasma, motion sickness and drug induced parkinsonism. It is also indicated in cough.', '2023-02-27', 'ACME', 350, '6388ff45b13454.97830779.jpg'),
(4, 'Losart Plus', 'Losartan Potasssium + Hydrochlorothiazide', 12, 'Hypertension: Losartan Potassium is used to treat high blood pressure. It can be taken alone or with additional antihypertensive medications (eg. thiazide diuretics).', '2029-12-29', 'ACME', 150, '6388ffef970983.24705347.jpg'),
(5, 'Cefixim', 'Cefixime Trihydrate', 35, 'Cefixime is a third-generation semisynthetic cephalosporin antibiotic for oral administration. It is bactericidal against a broad spectrum of gram positive and gram-negative bacteria at easily achievable plasma concentrations. ', '2024-02-02', 'Ibn Sina', 348, '6389005a060a73.51287419.jpg'),
(6, 'Esocon', 'Esomeprazole Magnesium Trihydrate', 7, 'Esomeprazole is a proton pump inhibitor that inhibits gastric acid secretion by specifically inhibiting ATPase H + / K + in gastric parietal cells. Esomeprazole (omeprazole isomer) is the first unique optical isomer of proton pump inhibitors, which provides better acid control than racemic proton pump inhibitors.', '2024-09-02', 'Biopharma', 405, '638900aa150941.99945683.jpg');

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
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
