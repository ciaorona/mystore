-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2021 at 07:09 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `product_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `product_id`, `username`) VALUES
(29, 26, 'rawanbana');

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
  `product_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_category`, `product_img`, `product_price`, `product_brand`, `product_company`, `product_date`) VALUES
(26, 'cameraaaa', 'Cameras', 'camera canon4.jpg', 55, 'canon', 'arabgroup', '2021-03-08 17:20:45'),
(27, 'phone', 'Phones', 'phones1.jpg', 55, 'oppo', 'arabgroup', '2021-03-08 18:22:51'),
(28, 'laptop', 'Laptops', 'laptop2.jpg', 66, 'apple', 'arabgroup', '2021-03-08 18:32:44'),
(29, 'HeadPhone', 'Accessories', 'lee-campbell-GI6L2pkiZgQ-unsplash.jpg', 33, 'oppo', 'arabgroup', '2021-03-08 18:33:59'),
(30, 'laptop', 'Laptops', 'laptop.jpeg', 11, 'Dell', 'arabgroup', '2021-03-08 18:35:14');

-- --------------------------------------------------------

--
-- Table structure for table `product_color`
--

CREATE TABLE `product_color` (
  `color_id` int(11) NOT NULL,
  `product_color` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `product_description` varchar(255) NOT NULL,
  `pic_availble` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_information`
--

INSERT INTO `product_information` (`product_id`, `product_img1`, `product_img2`, `product_img3`, `product_img4`, `product_img5`, `product_description`, `pic_availble`) VALUES
(26, '', '', '', '', '', 'this is a canon camera\r\n', 55),
(27, ' sajad-nori-FubJKiVaaZs-unsplash.jpg', ' smartphone.jpg', ' the-average-tech-guy-ZURJU7yBGBo-unsplash.jpg', 'NULL', 'NULL', 'this is oppo phone ', 66),
(28, ' laptop_main.jpg', ' laptop1.jpg', ' laptop2.jpg', 'NULL', 'NULL', '', 66),
(29, ' headphones2.jpg', ' headphones3.jpg', 'NULL', 'NULL', 'NULL', '', 88),
(30, ' laptop_main.jpg', ' laptop1.jpg', 'NULL', 'NULL', 'NULL', '', 22);

-- --------------------------------------------------------

--
-- Table structure for table `sold_product`
--

CREATE TABLE `sold_product` (
  `sold_product_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `per_id` int(11) NOT NULL,
  `per_name` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `per_email` varchar(30) NOT NULL,
  `per_img` varchar(255) NOT NULL DEFAULT 'images - 2021-02-28T055930.611.jpeg',
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
(1, 'rawanelbana100 ', 'rawanbana', 'ciaorona633@gmail.com', 'images - 2021-02-28T055930.611.jpeg', 'admin', 7110, '', 1276586545, 'cand'),
(3, 'mohammed ', 'mohammed1888', 'mohammed@gmail.com', 'images - 2021-02-28T055930.611.jpeg', 'company', 8, '', 0, ''),
(7, 'malak', 'malakelbana', 'malakelbana@gmail.com', 'images - 2021-02-28T055930.611.jpeg', 'user', 8, '', 0, ''),
(8, 'ahmed  ', 'ahmed188', 'Zoomfor82@gmail.com', 'images - 2021-02-28T055930.611.jpeg', 'user', 356, '', 0, ''),
(15, 'Rawan Ahmed  ', 'rawan888', 'rawana8888ed@gmail.com', '6-2-rapunzel-free-png-image-thumb.png', 'user', 6216, '', 1276586545, ''),
(17, 'salsabel100', 'salsabeltaha', 'salsabeltaha@gmail.com', '', 'admin', 11, '', 1276586545, '');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `wish_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`wish_id`, `product_id`, `username`) VALUES
(10, 26, 'rawanbana');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `username` (`username`);

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
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wish_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

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
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `product_color`
--
ALTER TABLE `product_color`
  MODIFY `color_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sold_product`
--
ALTER TABLE `sold_product`
  MODIFY `sold_product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `per_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wish_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `cart_ibfk_3` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

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

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`username`) REFERENCES `users` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
