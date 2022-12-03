-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 03, 2022 at 10:40 AM
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
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`) VALUES
(3),
(5);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`) VALUES
(1),
(2),
(6),
(8),
(13),
(15);

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
(6, 'Esocon', 'Esomeprazole Magnesium Trihydrate', 7, 'Esomeprazole is a proton pump inhibitor that inhibits gastric acid secretion by specifically inhibiting ATPase H + / K + in gastric parietal cells. Esomeprazole (omeprazole isomer) is the first unique optical isomer of proton pump inhibitors, which provides better acid control than racemic proton pump inhibitors.', '2024-09-02', 'Biopharma', 405, '638900aa150941.99945683.jpg'),
(13, 'Rabe', 'Rabeprazole Sodium', 7, 'Rabeprazole is indicated in Duodenal ulcer Healing of erosive or ulcerative Gastroesophageal Reflux Disease (GERD). Treatment of symptomatic GERD. Maintenance of healing of erosive or ulcerative GERD Zollinger-Ellison Syndrome. Helicobacter pylori eradication to reduce the Risk of Duodenal Ulcer Recurrence.', '2024-07-06', 'Aristopharma', 448, '63890795262b57.05366327.jpg'),
(14, 'Finix', 'Rabeprazole Sodium', 7, 'Rabeprazole suppresses gastric acid secretion by inhibiting the gastric H+/K+-ATPase at the secretory surface of the gastric parietal cell.', '2023-12-12', 'Opsonin Pharma', 335, '63890808466eb1.80431037.jpg'),
(15, 'Rabifast', 'Rabeprazole Sodium', 5, 'Rabeprazole Sodium', '2024-02-01', 'SK+F', 471, '6389085d064f32.17123599.jpg'),
(16, 'Alatrol', 'Rabeprazole Sodium', 10, 'Alatrol is an effective H1 receptor antagonist and has no significant anticholinergic or antiserum effects. At the pharmacologically active dose level, it has almost no drowsiness and does not cause behavior changes. ', '2023-02-02', 'Square', 290, '638908a3ce41c4.28371108.jpg'),
(17, 'Rupa', 'Rupatadine Fumarate', 12, 'Rupatadine is a non-sedative antagonist of histamine H1-receptors with a lengthy half-life. It also inhibits platelet-activating factor (PAF) (PAF). Histamine and PAF both produce bronchoconstriction, which increases vascular permeability and serves as a mediator in the inflammatory process.', '2024-05-05', 'Aristopharma', 90, '638908e7786b95.93101997.jpg'),
(18, 'Monas', 'Montelukast Sodium', 16, 'Montelukast is a selective and orally active leukotriene receptor antagonist that inhibits the cysteinyl leukotriene receptor (CysLT1). The cysteinyl leukotrienes (LTC4, LTD4, LTE4) are products of arachidonic acid metabolism and are released from various cells, including mast cells and eosinophils. ', '2024-02-02', 'ACME', 195, '63890926b5aa17.82374312.jpg'),
(19, 'Azin', 'Azithromycin Dihydrate', 35, 'Azithromycin is stable to acid, so it can be taken orally without protecting stomach acid. Easily absorbed; greater absorption on an empty stomach. For oral dosage forms, the time for adults to reach maximum concentration is 2.1 to 3.2 hours. ', '2024-05-26', 'ACME', 190, '638909871c0560.27840587.jpg'),
(20, 'Cal X', 'Sucralose', 1, '250 mg or 500 mg tablet: Usually utilized for the treatment or avoidance of calcium exhaustion in patients in whom dietary measures are lacking. ', '2026-05-01', 'ACME', 90, '63890a04d83453.95022903.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(30) DEFAULT NULL,
  `lname` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `house` varchar(30) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `street` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fname`, `lname`, `email`, `phone`, `password`, `house`, `city`, `street`) VALUES
(1, 'sanjida', 'tasnim', 'sanjida@gmail.com', '234234234342', 'password', 'house', 'city', 'street'),
(2, 'namreen', 'shaiyaz', 'namreen@gmail.com', '234234234342', 'password', 'house', 'city', 'street'),
(3, 'admin1', 'admin1', 'admin1@gmail.com', '', 'admin1', '', '', ''),
(5, 'admin2', 'admin2', 'admin2@gmail.com', '', 'admin2', '', '', ''),
(6, 'abir', 'wow', 'abir@gmail.com', '01875217186', 'password', 'wowhouse', 'wowcity', 'wowstreet'),
(8, 'Maisha', 'Tanzim', 'maisha@gmail.com', '01875217186', 'password', 'wowhouse', 'wowcity', 'wowstreet'),
(13, 'wassup', 'man', 'wow@gmail.com', '234234', 'password', NULL, NULL, NULL),
(15, 'kimi', 'no nawa', 'kimi@gmail.com', '23432424', 'kimikimi', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
