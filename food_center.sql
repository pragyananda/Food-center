-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2023 at 10:24 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food_center`
--

-- --------------------------------------------------------

--
-- Table structure for table `dbl_admin`
--

CREATE TABLE `dbl_admin` (
  `id` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dbl_admin`
--

INSERT INTO `dbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(1, 'pragyanand saho', 'pragyanandasaho', 'pragya12');

-- --------------------------------------------------------

--
-- Table structure for table `dbl_cart`
--

CREATE TABLE `dbl_cart` (
  `id` int(11) NOT NULL,
  `users_id` varchar(20) NOT NULL,
  `food_name` varchar(50) NOT NULL,
  `food_id` varchar(10) NOT NULL,
  `qty` varchar(20) NOT NULL,
  `price` varchar(50) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dbl_cart`
--

INSERT INTO `dbl_cart` (`id`, `users_id`, `food_name`, `food_id`, `qty`, `price`, `added_on`) VALUES
(2, '2', 'Burger', '1', '2', '40', '2023-03-22 10:14:28');

-- --------------------------------------------------------

--
-- Table structure for table `dbl_category`
--

CREATE TABLE `dbl_category` (
  `id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `image_name` varchar(50) NOT NULL,
  `featured` varchar(20) NOT NULL,
  `active` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dbl_category`
--

INSERT INTO `dbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(2, 'Fast food', 'food_category_960.jpg', 'yes', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `dbl_food`
--

CREATE TABLE `dbl_food` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `price` varchar(50) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` varchar(10) NOT NULL,
  `description` text NOT NULL,
  `featured` varchar(20) NOT NULL,
  `active` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dbl_food`
--

INSERT INTO `dbl_food` (`id`, `title`, `price`, `image_name`, `category_id`, `description`, `featured`, `active`) VALUES
(1, 'Burger', '40', 'food_name4917.jpg', '2', 'Cheese Burger\r\n                         ', 'yes', '');

-- --------------------------------------------------------

--
-- Table structure for table `dbl_order`
--

CREATE TABLE `dbl_order` (
  `id` int(11) NOT NULL,
  `users_id` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `address` varchar(80) NOT NULL,
  `zipcode` varchar(50) NOT NULL,
  `payment_type` varchar(20) NOT NULL,
  `total_price` varchar(10) NOT NULL,
  `deliveryboy_id` varchar(20) NOT NULL,
  `payment_status` varchar(20) NOT NULL,
  `order_status` varchar(20) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dbl_order`
--

INSERT INTO `dbl_order` (`id`, `users_id`, `name`, `email`, `mobile`, `address`, `zipcode`, `payment_type`, `total_price`, `deliveryboy_id`, `payment_status`, `order_status`, `added_on`) VALUES
(1, '2', 'pragyananda saho', 'pragyanandasaho@gmail.com', '6398665353', 'shanti marg,gali no 7 ,near munshiram bhawan, house no 4,haripur kalan dehradun', '249205', 'Paytm', '40', 'akhand', 'pending', '1', '2023-03-22 10:13:45');

-- --------------------------------------------------------

--
-- Table structure for table `dbl_user`
--

CREATE TABLE `dbl_user` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` int(10) NOT NULL,
  `added_on` datetime NOT NULL,
  `profile_img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dbl_user`
--

INSERT INTO `dbl_user` (`id`, `name`, `mobile`, `email`, `password`, `status`, `added_on`, `profile_img`) VALUES
(2, 'pragyananda saho', '6398665353', 'pragyanandasaho@gmail.com', 'pragya12', 1, '2023-03-22 09:02:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `order_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dbl_admin`
--
ALTER TABLE `dbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dbl_cart`
--
ALTER TABLE `dbl_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dbl_category`
--
ALTER TABLE `dbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dbl_food`
--
ALTER TABLE `dbl_food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dbl_order`
--
ALTER TABLE `dbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dbl_user`
--
ALTER TABLE `dbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dbl_admin`
--
ALTER TABLE `dbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dbl_cart`
--
ALTER TABLE `dbl_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dbl_category`
--
ALTER TABLE `dbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dbl_food`
--
ALTER TABLE `dbl_food`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dbl_order`
--
ALTER TABLE `dbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dbl_user`
--
ALTER TABLE `dbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
