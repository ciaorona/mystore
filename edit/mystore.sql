-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2021 at 08:19 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mystore`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `per_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Cameras'),
(2, 'Phones'),
(3, 'Laptops'),
(4, 'Accessories');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `per_id` int(11) NOT NULL,
  `per_name` varchar(100) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `comment_date` date DEFAULT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `per_id`, `per_name`, `comment`, `comment_date`, `product_id`) VALUES
(1, 1, 'rawan Ahmed', 'this is a very good product', '2021-02-27', 1),
(2, 1, 'rawan ahmed', 'this is a comment ', '2021-02-26', 3),
(3, 1, 'malak', 'this is a commment ', '2021-02-28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_category` varchar(255) NOT NULL,
  `product_img` varchar(255) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_brand` varchar(55) NOT NULL,
  `product_company` varchar(55) NOT NULL,
  `product_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_category`, `product_img`, `product_price`, `product_brand`, `product_company`, `product_date`) VALUES
(1, 'canon2020', 'Cameras', 'camera1.jpeg', 200, 'canon', 'arabGroubs', '2021-02-25'),
(2, 'nike2020', 'Phones', 'camera1.jpeg', 250, 'canon', 'arabGroub', '2021-02-25'),
(3, 'iphone 7 pro', 'Phones', 'phone.jpg', 300, 'iphone', 'arabGroub', '2021-02-25'),
(5, 'canon2021', 'Cameras', 'camera1.jpeg', 200, 'canon', 'arabGroubs', '2021-02-25'),
(6, 'canon2023\r\n', 'Cameras', 'camera1.jpeg', 200, 'canon', 'arabGroubs', '2021-02-25');

-- --------------------------------------------------------

--
-- Table structure for table `product_color`
--

CREATE TABLE `product_color` (
  `color_id` int(11) NOT NULL,
  `product_color` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_color`
--

INSERT INTO `product_color` (`color_id`, `product_color`, `product_id`) VALUES
(1, 'red', 1),
(2, 'green', 1),
(3, 'yellow', 2),
(4, 'black', 3);

-- --------------------------------------------------------

--
-- Table structure for table `product_information`
--

CREATE TABLE `product_information` (
  `product_id` int(11) NOT NULL,
  `product_img1` varchar(255) NOT NULL,
  `product_img2` varchar(255) NOT NULL,
  `product_img3` varchar(255) NOT NULL,
  `product_img4` varchar(255) NOT NULL,
  `product_img5` varchar(255) NOT NULL,
  `product_dscraption` varchar(255) NOT NULL,
  `pic_availble` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_information`
--

INSERT INTO `product_information` (`product_id`, `product_img1`, `product_img2`, `product_img3`, `product_img4`, `product_img5`, `product_dscraption`, `pic_availble`) VALUES
(1, 'camera2.jpeg', 'camera canon5.jpg', 'camera canon.jpg', 'images/camera canon2.jpg', 'images/camera canon3.jpg', 'this is product description hi', 55);

-- --------------------------------------------------------

--
-- Table structure for table `sold_product`
--

CREATE TABLE `sold_product` (
  `sold_product_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sold_product`
--

INSERT INTO `sold_product` (`sold_product_id`, `product_id`, `username`) VALUES
(1, 3, 'rawanbana'),
(2, 5, 'rawanbana'),
(3, 2, 'rawanbana'),
(4, 6, 'mohammed'),
(5, 6, 'rawanbana');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `per_id` int(11) NOT NULL,
  `per_name` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `per_email` varchar(30) NOT NULL,
  `per_img` varchar(255) NOT NULL,
  `per_role` varchar(50) NOT NULL DEFAULT 'user',
  `per_password` int(11) NOT NULL,
  `bio` varchar(255) NOT NULL,
  `per_phone` int(11) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`per_id`, `per_name`, `username`, `per_email`, `per_img`, `per_role`, `per_password`, `bio`, `per_phone`, `address`) VALUES
(1, 'rawanel', 'rawanbana', 'ciaorona633@gmail.com', 'the-average-tech-guy-ZURJU7yBGBo-unsplash.jpg', 'admin', 7110, 'this is my bio hi every one', 1276586545, 'Egypt,alex'),
(3, 'mohammed', 'mohammed', 'mohammed@gmail.com', '', 'company', 8, '', 0, ''),
(7, 'malak', 'malakelbana', 'malakelbana@gmail.com', '', 'user', 8, '', 0, ''),
(8, 'ahmed', 'ahmed18', 'Zoomfor82@gmail.com', '', 'user', 356, '', 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `per_id` (`per_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `per_id` (`per_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `catedory_id` (`product_category`);

--
-- Indexes for table `product_color`
--
ALTER TABLE `product_color`
  ADD PRIMARY KEY (`color_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product_information`
--
ALTER TABLE `product_information`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `sold_product`
--
ALTER TABLE `sold_product`
  ADD PRIMARY KEY (`sold_product_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`per_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `username_2` (`username`),
  ADD UNIQUE KEY `username_3` (`username`),
  ADD UNIQUE KEY `username_4` (`username`),
  ADD UNIQUE KEY `username_5` (`username`,`per_email`),
  ADD UNIQUE KEY `username_6` (`username`,`per_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_color`
--
ALTER TABLE `product_color`
  MODIFY `color_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sold_product`
--
ALTER TABLE `sold_product`
  MODIFY `sold_product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `per_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`per_id`) REFERENCES `users` (`per_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `comments_ibfk_3` FOREIGN KEY (`per_id`) REFERENCES `users` (`per_id`);

--
-- Constraints for table `product_color`
--
ALTER TABLE `product_color`
  ADD CONSTRAINT `product_color_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `product_information`
--
ALTER TABLE `product_information`
  ADD CONSTRAINT `product_information_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `sold_product`
--
ALTER TABLE `sold_product`
  ADD CONSTRAINT `sold_product_ibfk_3` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `sold_product_ibfk_4` FOREIGN KEY (`username`) REFERENCES `users` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
