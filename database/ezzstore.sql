-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2023 at 05:29 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ezzstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(100) NOT NULL,
  `brand_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'HP'),
(2, 'Samsung'),
(3, 'Apple'),
(4, 'Sony'),
(5, 'LG'),
(6, 'Ezz Clothes Brand');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `qty` int(10) NOT NULL,
  `qual` varchar(255) DEFAULT NULL,
  `qual2` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `p_id`, `ip_add`, `user_id`, `qty`, `qual`, `qual2`) VALUES
(145, 31, '::1', 7, 2, 'Metalic', 'Normal');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Mobile & Tab'),
(2, 'Ladies Wear'),
(3, 'Mens Wear'),
(4, 'Kids Wear'),
(5, 'Furnitures'),
(6, 'Home Appliances'),
(7, 'Electronics Gadgets'),
(8, 'Computers');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `qual` varchar(255) DEFAULT NULL,
  `qual2` varchar(25) DEFAULT NULL,
  `trx_id` varchar(255) NOT NULL,
  `p_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `product_id`, `qty`, `qual`, `qual2`, `trx_id`, `p_status`) VALUES
(33, 4, 32, 1, 'black', 'Mini', 'on cash', 'Completed'),
(35, 4, 2, 1, 'white', '', 'on cash', 'in process'),
(36, 4, 2, 1, 'white', '', 'on cash', 'Completed'),
(44, 4, 1, 1, 'metalic', '256GB', 'on cash', 'in process'),
(72, 4, 32, 1, 'black', 'Normal', 'on cash', 'in process');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `product_cat` int(100) NOT NULL,
  `product_brand` int(100) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_quantity` text NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` text NOT NULL,
  `product_keywords` text NOT NULL,
  `rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_quantity`, `product_desc`, `product_image`, `product_keywords`, `rating`) VALUES
(1, 1, 2, 'Samsung Galaxy S23 Ultra', 1099, 'Stock: 7', 'Meet the new Galaxy S23 Ultra, designed with the planet in mind and equipped with a built-in S Pen, Nightography camera and powerful chip for epic gaming.', '1.jfif', 'Samsung Galaxy S23 Ultra', 4),
(2, 1, 3, 'iPhone 14 Pro', 1369, 'Stock: 8', 'The iPhone 14 Pro Max display has rounded corners that follow a beautiful curved design, and these corners are within a standard rectangle. When measured as a standard rectangular shape, the screen is 6.69 inches diagonally (actual viewable area is less). Both models: Dynamic Island.', '2.jfif', 'iPhone 14 pro', 4),
(3, 1, 3, 'iPad Pro', 999, 'Stock: 9', 'An iPad is a tablet PC designed by Apple Inc. The iPad features a 9.7-inch touch screen that users can interact with directly through finger touch', '3.jfif', 'ipad pro apple tab tablet', 5),
(4, 1, 2, 'Samsung Galaxy Tab S6', 699, 'Stock: 6', 'Samsung Galaxy Tab S6 · Released 2021· 138g, 6.8mm thickness · Android 5.0.2, up to Android 8.0, TouchWiz UI', '5.jfif', 'ipad samsung tab s6 tablet ', 4),
(5, 8, 1, 'HP Gaming Laptop', 799, 'Stock: 5', 'The HP Gaming Laptop PC is equipped with a dual fan system for enhanced thermal cooling. Wide rear corner vents and additional air inlets', '6.jfif', 'hp gaming laptop ', 3),
(6, 8, 1, 'HP Pavillion Laptop 14', 999, 'Stock: 7', 'The HP Pavilion Laptop 14 PC is equipped with a dual fan system for enhanced thermal cooling. Wide rear corner vents and smooth design', '7.jfif', 'HP Pavillion Laptop 14', 3),
(7, 1, 4, 'Sony Xperia 5 III', 399, 'Stock: 4', 'The Xperia 5 III blends its predecessor s remarkable AF speed with new optics reaching up to 105mm. From imaging to gaming, this is a hand-fit smartphone that goes above and beyond your expectations.', '8.jfif', 'Sony Xperia 5 III mobile', 5),
(8, 2, 6, 'Ladies Dress', 39, 'Stock: 15', 'Dress for girls made of finest of fabrics and Latest Fashion for comfort and grace', '10.jfif', 'red ladies dress', 5),
(9, 2, 6, 'Heave Dress', 29, 'Stock: 12', 'Dress for girls made of finest of fabrics and Latest Fashion for comfort and grace', '11.jfif', 'blue heave dress cloths', 5),
(10, 2, 6, 'Ladies Casual Cloths', 35, 'Stock: 13', 'Dress for girls made of finest of fabrics and Latest Fashion for comfort and grace', '12.jfif', 'Girl Dress Ladies Casual Cloths', 5),
(11, 2, 6, 'Spring Autumn Dress', 25, 'Stock: 11', 'Dress for girls made of finest of fabrics and Latest Fashion for comfort and grace', '13.jfif', 'girl Spring Autumn Dress', 5),
(12, 2, 6, 'Casual Dress', 39, 'Stock: 12', 'Dress for girls made of finest of fabrics and Latest Fashion for comfort and grace', '14.jfif', 'ladies Casual Dress cloths girl', 5),
(13, 2, 6, 'Formal Look For Ladies', 49, 'Stock: 10', 'Dress for girls made of finest of fabrics and Latest Fashion for comfort and grace', '15.jfif', 'ladies wears Formal Look dress girl Formal Look For Ladies', 5),
(14, 3, 6, 'Men Sweater', 25, 'Stock: 20', 'Cloths for men made of finest of fabrics and Latest Fashion for comfort and grace', '16.jfif', 'black men sweater cloth winter', 5),
(15, 3, 6, 'Gents Formal', 119, 'Stock: 17', 'Cloths for men made of finest of fabrics and Latest Fashion for comfort and grace', '17.jfif', 'gents formal wear cloths', 5),
(16, 3, 6, 'Formal Coat', 49, 'Stock: 16', 'Cloths for men made of finest of fabrics and Latest Fashion for comfort and grace', '19.jfif', 'formal coat blazer gents', 5),
(17, 3, 6, 'Men Sweater', 39, 'Stock: 14', 'Cloths for men made of finest of fabrics and Latest Fashion for comfort and grace', '20.jfif', 'men sweater gents ', 5),
(18, 3, 6, 'T shirt W', 29, 'Stock: 17', 'Cloths for men made of finest of fabrics and Latest Fashion for comfort and grace', '21.jfif', 'formal t shirt w white', 5),
(19, 4, 6, 'Kids T shirt Y', 25, 'Stock: 16', 'Clothe for Kids made of finest of fabrics and Latest Fashion for comfort and grace', '22.jfif', 'kids t shirt y yellow', 5),
(20, 4, 6, 'Kids Girls Cloths', 49, 'Stock: 20', 'Clothe for Kids made of finest of fabrics and Latest Fashion for comfort and grace', '23.jfif', 'formal Kids Girls Cloths wear dress', 5),
(21, 4, 6, 'Kids T shirt B', 29, 'Stock: 17', 'Clothe for Kids made of finest of fabrics and Latest Fashion for comfort and grace', '24.jfif', 'kids T shirt b blue', 5),
(22, 4, 6, 'Stylish Girls Dress', 39, 'Stock: 18', 'Clothe for Kids made of finest of fabrics and Latest Fashion for comfort and grace', '25.jfif', 'Stylish girls dress  kids', 5),
(23, 4, 6, 'Girls Party Dress', 59, 'Stock: 20', 'Clothe for Kids made of finest of fabrics and Latest Fashion for comfort and grace', '26.jfif', 'Girls Party dress  kids', 5),
(24, 4, 6, 'Formal Look For kids', 49, 'Stock: 13', 'Clothe for Kids made of finest of fabrics and Latest Fashion for comfort and grace', '27.jfif', 'formal look for kids', 5),
(25, 5, 0, 'Book Shelf', 119, 'Stock: 5', 'Made finest of wood with an elegent design', '32.jfif', 'book shelf furniture', 4),
(26, 6, 2, 'Samsung Refrigerator', 1750, 'Stock: 4', 'Refrigerator for Cool and comfort. Keeps your food fresh', '33.jfif', 'Samsung refrigerator', 4),
(27, 7, 4, 'Sony Sound Bar', 159, 'Stock: 13', 'Rich surround sound and deep bass with a powerful wireless subwoofer. Easy & simple connection with your TV via HDMI ARC single cable.', '34.jfif', 'Sony Sound Bar', 4),
(28, 6, 0, 'Vaccum Cleaner', 399, 'Stock: 6', 'Vacuum cleaners use an electric motor that spins a fan, sucking in air – and any small particles caught up in it', '35.jfif', 'Vaccum Cleaner', 4),
(29, 6, 5, 'LG Iron', 59, 'Stock: 9', 'LG Iron  is designed to save you time, energy, and costs associated with pressing, ironing, or disinfecting clothing.', '36.jfif', 'LG Iron', 4),
(30, 6, 5, 'LG LED TV', 499, 'Stock: 7', 'LG TVs suit every room and budget. From premium OLED and the ultimate LED TV, NanoCell, to our wider Ultra HD range', '37.jfif', 'lg led tv', 4),
(31, 7, 4, 'Sony Camera ZV-1', 699, 'Stock: 8', 'The Z-V1 has oversampled 4K video and Full HD to 120 fps. It supports HLG and S-Log2/3 for easier color grading.', '38.jfif', 'Sony Camera ZV-1', 4),
(32, 6, 5, 'LG Mixer Grinder', 139, 'Stock: 10', 'LG Mixer Grinder is the ultimate helper in the kitchen that ensure convenience in your cooking activities. ', '39.jfif', 'LG Mixer Grinder', 4),
(33, 2, 6, 'Formal Girls Denim', 45, 'Stock: 18', 'Formal Denim for girls made of finest of fabrics and Latest Fashion for comfort and grace', '40.jfif', 'Formal girls Denim ladies', 5),
(34, 1, 2, 'Samsung Galaxy Note 20', 399, 'Stock: 7', 'Samsung Galaxy Note20 ; Size, 6.7 inches, 108.4 cm2 (~89.2% screen-to-body ratio) ; Resolution, 1080 x 2400 pixels', '45.jfif', 'Samsung Galaxy Note 20', 4),
(35, 8, 3, 'Apple MacBook Laptop', 1699, 'Stock: 5', 'Apple 2022 MacBook Pro Laptop with M2 chip: 13-inch Retina Display, 8GB RAM, Touch Bar, Backlit Keyboard, FaceTime HD Camera. Works with iPhone and', '47.jfif', 'Apple MacBook Laptop', 3),
(36, 8, 3, 'Apple IMAC', 1399, 'Stock: 8', 'The new iMac. 7 vibrant colors. Impossibly thin design. 24-inch 4.5K Retina display. The best camera, mics, and speakers in a Mac', '48.jfif', 'Apple IMAC', 5),
(37, 5, 0, 'Cubiker Computer Desk', 89, 'Stock: 4', 'Cubiker Computer Desk 40 inch Home Office Writing Study Desk, Modern Simple Style Laptop Table ', '51.jfif', 'Cubiker Computer Desk', 3),
(38, 5, 0, 'Foldable Tea Table', 59, 'Stock: 5', 'Foldable Tea Table easy to carry and heavy-duty', '52.jfif', 'Foldable Tea Table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE `rate` (
  `rate_id` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rate`
--

INSERT INTO `rate` (`rate_id`, `rate`, `pro_id`, `user_id`) VALUES
(1, 5, 1, 4),
(7, 3, 4, 4),
(8, 1, 5, 4),
(9, 5, 8, 4),
(11, 4, 2, 4),
(12, 5, 3, 4),
(13, 3, 51, 4),
(15, 5, 48, 4);

-- --------------------------------------------------------

--
-- Table structure for table `refund`
--

CREATE TABLE `refund` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `qual` varchar(50) NOT NULL,
  `qual2` varchar(25) DEFAULT NULL,
  `trx_id` varchar(50) NOT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `refund`
--

INSERT INTO `refund` (`id`, `order_id`, `user_id`, `product_id`, `qty`, `qual`, `qual2`, `trx_id`, `status`) VALUES
(9, 2, 4, 2, 1, 'white', '128GB', '07M47684BS5725041', 'Refunded'),
(10, 3, 4, 2, 1, 'white', '128GB', '07M47684BS5725041', 'pending'),
(11, 4, 4, 8, 1, 'Small', 'Red', '07M47684BS5725041', 'pending'),
(12, 5, 4, 5, 1, 'white', '256GB', '07M47684BS5725041', 'pending'),
(14, 71, 8, 25, 1, 'wooden', '', '07M47684BS5725041', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(10) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `address1` varchar(300) NOT NULL,
  `address2` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `address1`, `address2`) VALUES
(4, 'Admin', 'Ezz', 'one@gmail.com', '12345', '0188706883', 'cyberjaya, Malaysia', 'Malaysia'),
(5, 'abc', 'abc', 'a@gmail.com', '1234567', '2345623421', 'johor', 'Malaysia'),
(6, 'ab', 'ab', 'b@gmail.com', '1234567', '1234567890', 'Qatar', 'Doha'),
(7, 'abdullah', 'sanad', 'abdullah@gmail.com', 'Abdullah.12345', '0123456789', 'aden', 'yemen'),
(8, 'Mohd', 'sharaf', 'mohd@gmail.com', 'Mohd.12345', '0123456789', 'selangor', 'malaysia');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`rate_id`);

--
-- Indexes for table `refund`
--
ALTER TABLE `refund`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `rate`
--
ALTER TABLE `rate`
  MODIFY `rate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `refund`
--
ALTER TABLE `refund`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
