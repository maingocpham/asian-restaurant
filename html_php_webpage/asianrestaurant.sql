-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2024 at 09:53 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asianrestaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `email`) VALUES
(1, 'admin_rockstar', 'SecurePass123!', 'rockstar_admin@company.com'),
(2, 'superboss', 'Adm1nMaster!', 'superboss@companydomain.com'),
(3, 'chef_in_charge', 'KitchensAreSecure!', 'chef_in_charge@restaurant.com'),
(4, 'tech_guru', 'TechyAdmin42!', 'tech_guru@techworld.com'),
(5, 'account_wizard', 'MoneyMagic789!', 'account_wizard@finances.com'),
(6, 'creative_mind', 'ThinkOutLoud2024!', 'creative.mind@designs.com'),
(7, 'marketing_maven', 'Marketer1234!', 'marketing.maven@brand.com'),
(8, 'operations_king', 'OpsKing2024!', 'operations_king@workplace.com'),
(9, 'admin_jedi', 'ForceAdmin2024!', 'admin.jedi@galaxy.com'),
(10, 'security_sensei', 'GuardiansOfData123!', 'security_sensei@security.com');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `category` varchar(50) NOT NULL,
  `cuisine` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`item_id`, `item_name`, `price`, `category`, `cuisine`) VALUES
(1, 'Edamame', 5.50, 'Appetizer', 'Japanese'),
(2, 'Gyoza', 7.50, 'Appetizer', 'Japanese'),
(3, 'Satay Chicken Skewers', 8.99, 'Appetizer', 'Thai'),
(4, 'Pork Dumplings', 6.99, 'Appetizer', 'Chinese'),
(5, 'Fresh Spring Rolls', 7.50, 'Appetizer', 'Vietnamese'),
(6, 'Crab Rangoon', 6.99, 'Appetizer', 'Chinese'),
(7, 'Vegetable Tempura', 9.99, 'Appetizer', 'Japanese'),
(8, 'Shrimp Toast', 7.99, 'Appetizer', 'Chinese'),
(9, 'Teriyaki Chicken', 14.99, 'Entree', 'Japanese'),
(10, 'Beef Pho', 13.99, 'Entree', 'Vietnamese'),
(11, 'Kung Pao Chicken', 12.99, 'Entree', 'Chinese'),
(12, 'Massaman Curry', 14.99, 'Entree', 'Thai'),
(13, 'Shrimp Fried Rice', 11.50, 'Entree', 'Chinese'),
(14, 'General Tso\'s Chicken', 13.50, 'Entree', 'Chinese'),
(15, 'Spicy Tuna Roll', 12.99, 'Entree', 'Japanese'),
(16, 'Pad See Ew', 13.50, 'Entree', 'Thai'),
(17, 'Miso Soup', 3.99, 'Soup', 'Japanese'),
(18, 'Tom Yum Soup', 8.99, 'Soup', 'Thai'),
(19, 'Hot and Sour Soup', 6.99, 'Soup', 'Chinese'),
(20, 'Egg Drop Soup', 5.50, 'Soup', 'Chinese'),
(21, 'Seaweed Soup', 7.50, 'Soup', 'Japanese'),
(22, 'Chicken Coconut Soup', 9.50, 'Soup', 'Thai'),
(23, 'Mango Sticky Rice', 6.50, 'Dessert', 'Thai'),
(24, 'Fried Banana with Honey', 5.99, 'Dessert', 'Thai'),
(25, 'Sesame Balls', 4.50, 'Dessert', 'Chinese'),
(26, 'Mochi Ice Cream', 4.99, 'Dessert', 'Japanese'),
(27, 'Red Bean Pancake', 5.50, 'Dessert', 'Chinese'),
(28, 'Green Tea Cheesecake', 6.50, 'Dessert', 'Japanese'),
(29, 'Taro Custard', 5.99, 'Dessert', 'Thai'),
(30, 'Bun Bo Hue', 15.00, 'Main Course', 'Vietnamese'),
(31, 'Banh Xeo', 13.00, 'Main Course', 'Vietnamese');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `reservation_id` int(11) NOT NULL,
  `staff_no` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `order_type` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `reservation_id`, `staff_no`, `item_id`, `quantity`, `order_type`) VALUES
(1, 1, 1, 1, 2, 'Dine-In'),
(2, 2, 2, 2, 1, 'Takeout'),
(3, 3, 3, 3, 3, 'Dine-In'),
(4, 4, 4, 4, 1, 'Takeout'),
(5, 5, 5, 5, 2, 'Dine-In'),
(6, 6, 6, 6, 4, 'Dine-In'),
(7, 7, 7, 7, 1, 'Takeout'),
(8, 8, 8, 8, 2, 'Dine-In'),
(9, 9, 9, 9, 3, 'Takeout'),
(10, 10, 10, 10, 2, 'Dine-In');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `reservation_id` int(11) NOT NULL,
  `amount_paid` decimal(10,2) DEFAULT NULL,
  `payment_method` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `reservation_id`, `amount_paid`, `payment_method`) VALUES
(1, 1, 23.96, 'Credit Card'),
(2, 2, 18.99, 'Cash'),
(3, 3, 38.97, 'Credit Card'),
(4, 4, 7.49, 'Cash'),
(5, 5, 74.95, 'Credit Card'),
(6, 6, 39.96, 'Cash'),
(7, 7, 23.98, 'Credit Card'),
(8, 8, 68.97, 'Cash'),
(9, 9, 19.98, 'Credit Card'),
(10, 10, 8.99, 'Cash'),
(11, 3, 50.50, 'Cash'),
(12, 5, 10.00, 'Cash');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reservation_id` int(11) NOT NULL,
  `customer_name` varchar(100) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `number_of_guest` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservation_id`, `customer_name`, `phone_number`, `email`, `date`, `time`, `number_of_guest`) VALUES
(1, 'John Doe', '555-1234', 'johndoe@example.com', '2024-11-24', '19:00:00', 4),
(2, 'Jane Smith', '555-2345', 'janesmith@example.com', '2024-11-25', '20:00:00', 2),
(3, 'Mark Lee', '555-3456', 'marklee@example.com', '2024-11-26', '18:30:00', 3),
(4, 'Sarah Kim', '555-4567', 'sarahkim@example.com', '2024-11-27', '21:00:00', 5),
(5, 'Michael Chan', '555-5678', 'michaelchan@example.com', '2024-11-28', '19:30:00', 6),
(6, 'Linda Wu', '555-6789', 'lindawu@example.com', '2024-11-29', '18:00:00', 2),
(7, 'David Zhang', '555-7890', 'davidzhang@example.com', '2024-12-01', '20:30:00', 4),
(8, 'Rachel Lee', '555-8901', 'rachellee@example.com', '2024-12-02', '19:45:00', 3),
(9, 'Sophia Chen', '555-9012', 'sophiachen@example.com', '2024-12-03', '21:15:00', 5),
(10, 'Brian Park', '555-0123', 'brianpark@example.com', '2024-12-04', '17:00:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `staff_name` varchar(100) DEFAULT NULL,
  `staff_shift` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `staff_username` varchar(50) NOT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `staff_name`, `staff_shift`, `email`, `phone_number`, `staff_username`, `password`) VALUES
(1, 'Michael Scott', 'Morning', 'michael.scott@email.com', '555-1111', 'mscott', 'password1'),
(2, 'Dwight Schrute', 'Afternoon', 'dwight.schrute@email.com', '555-2222', 'dschrute', 'password2'),
(3, 'Jim Halpert', 'Evening', 'jim.halpert@email.com', '555-3333', 'jhalpert', 'password3'),
(4, 'Pam Beesly', 'Morning', 'pam.beesly@email.com', '555-4444', 'pbeesly', 'password4'),
(5, 'Angela Martin', 'Afternoon', 'angela.martin@email.com', '555-5555', 'amartin', 'password5'),
(6, 'Ryan Howard', 'Evening', 'ryan.howard@email.com', '555-6666', 'rhoward', 'password6'),
(7, 'Stanley Hudson', 'Morning', 'stanley.hudson@email.com', '555-7777', 'shudson', 'password7'),
(8, 'Phyllis Vance', 'Afternoon', 'phyllis.vance@email.com', '555-8888', 'pvance', 'password8'),
(9, 'Creed Bratton', 'Evening', 'creed.bratton@email.com', '555-9999', 'cbratton', 'password9'),
(10, 'Oscar Martinez', 'Morning', 'oscar.martinez@email.com', '555-0000', 'omartinez', 'password10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `reservation_id` (`reservation_id`),
  ADD KEY `staff_no` (`staff_no`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `reservation_id` (`reservation_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservation_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`),
  ADD UNIQUE KEY `staff_username` (`staff_username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`reservation_id`) REFERENCES `reservation` (`reservation_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`staff_no`) REFERENCES `staff` (`staff_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`item_id`) REFERENCES `menu` (`item_id`) ON DELETE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`reservation_id`) REFERENCES `reservation` (`reservation_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
