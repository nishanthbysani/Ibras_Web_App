-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2020 at 02:47 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ibrasproject5`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `CartID` int(11) NOT NULL,
  `MenuID` int(11) DEFAULT NULL,
  `itemname` varchar(30) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `itemprice` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `ContactID` int(11) NOT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Subject` varchar(100) DEFAULT NULL,
  `Message` varchar(255) DEFAULT NULL,
  `enquiretime` timestamp NOT NULL DEFAULT current_timestamp(),
  `isresolved` tinyint(1) DEFAULT 0,
  `resolvedby` varchar(10) DEFAULT NULL,
  `resolutioncomments` varchar(255) DEFAULT NULL,
  `lastupdated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`ContactID`, `Name`, `Email`, `Subject`, `Message`, `enquiretime`, `isresolved`, `resolvedby`, `resolutioncomments`, `lastupdated`) VALUES
(1, 'Nishanth', 'nishanth.bysani@gmail.com', 'This is a test subject.', 'This is a test message.', '2020-04-13 17:47:55', 0, NULL, NULL, '2020-04-13 17:47:55'),
(2, 'Bysani', 'Bysani@gmail.com', 'This is a test subject.', 'This is a test message.', '2020-04-13 17:47:55', 1, 'User1', 'Resolved and provided info.', '2020-04-13 17:47:55'),
(3, 'Sampada Grover', 'Sampada@gmail.com', 'Regarding the New receipies', 'Hello, want to know regarding your new burger recipe.', '2020-04-14 21:13:57', 0, NULL, NULL, '2020-04-14 21:13:57'),
(17, 'Jeevesh', 'Jeevesh@gmail.com', 'What is a burger?', 'Hello, we want to do a small interview to get more information on hamburgers. Please provide your availability.', '2020-04-15 06:53:30', 0, NULL, NULL, '2020-04-15 06:53:30'),
(18, 'Jeevesh', 'Jeevesh@gmail.com', 'What is a burger?', 'Hello, we want to do a small interview to get more information on hamburgers. Please provide your availability.', '2020-04-15 06:54:09', 1, 'Staff1', 'Hello, we would love to meet you. You can come down to the restaurant on 5th May at 10:00 AM. Looking forward.', '2020-04-15 06:56:06'),
(19, 'Jeevesh', 'Jeevesh@gmail.com', 'What is a burger?', 'Hello, we want to do a small interview to get more information on hamburgers. Please provide your availability.', '2020-04-15 06:56:16', 0, NULL, NULL, '2020-04-15 06:56:16'),
(20, 'Jeevesh', 'Jeevesh@gmail.com', 'What is a burger?', 'Hello, we want to do a small interview to get more information on hamburgers. Please provide your availability.', '2020-04-15 06:57:22', 0, NULL, NULL, '2020-04-15 06:57:22'),
(21, 'Jeevesh', 'Jeevesh@gmail.com', 'What is a burger?', 'Hello, we want to do a small interview to get more information on hamburgers. Please provide your availability.', '2020-04-15 06:57:37', 0, NULL, NULL, '2020-04-15 06:57:37'),
(22, 'Nishanth', 'nishanth.bysani@gmail.com', 'Test@123', 'Test@123', '2020-04-15 21:05:59', 0, NULL, NULL, '2020-04-15 21:05:59'),
(23, 'Nick', 'Nick@gmail.com', 'Laravel Test', 'Laravel Test', '2020-04-26 00:07:52', 0, NULL, NULL, '2020-04-26 00:07:52'),
(24, 'Nishanth Bysani', 'Test@gmail.com', 'Test', 'Laravel test', '2020-04-26 00:22:01', 0, NULL, NULL, '2020-04-26 00:22:01'),
(25, 'Test', 'Test@gmail.com', 'Test1', 'Test1', '2020-04-26 01:41:29', 0, NULL, NULL, '2020-04-26 01:41:29'),
(26, 'Test', 'Test@gmail.com', 'Test', 'Test', '2020-04-26 01:55:42', 0, NULL, NULL, '2020-04-26 01:55:42'),
(27, 'New Test', 'newtest@123.com', 'Test123', 'Test123', '2020-04-26 01:56:44', 0, NULL, NULL, '2020-04-26 01:56:44'),
(28, 'Gaurav', 'gaurav@test.com', 'What?', 'Is this?', '2020-04-26 01:58:04', 0, NULL, NULL, '2020-04-26 01:58:04'),
(29, 'Nishanth Bysani', 'nishanth.bysani@gmail.com', 'Test', 'Testing', '2020-04-26 19:33:48', 0, NULL, NULL, '2020-04-26 19:33:48'),
(30, 'Sampada Grover', 'Sampada@gmail.com', 'What?', 'Burger types', '2020-05-04 15:25:23', 0, NULL, NULL, '2020-05-04 15:25:23');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `FeedbackID` int(11) NOT NULL,
  `OrderID` int(11) DEFAULT NULL,
  `Comments` varchar(100) DEFAULT NULL,
  `Ratings` int(11) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL,
  `feedbacktime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `isfeedbackprovided` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`FeedbackID`, `OrderID`, `Comments`, `Ratings`, `UserID`, `feedbacktime`, `isfeedbackprovided`) VALUES
(1, 1, NULL, NULL, 8, '2020-04-13 06:44:02', 0),
(2, 2, NULL, NULL, 9, '2020-04-13 06:44:02', 0),
(3, 16, 'Add more salt.', 4, 17, '2020-05-04 19:57:10', 1),
(4, 34, 'Amazing!', 4, 17, '2020-05-03 07:05:02', 1),
(5, 35, 'Perfect Hamburger.', 5, 17, '2020-05-04 20:04:19', 1),
(6, 36, NULL, NULL, 17, '2020-05-04 15:31:37', 0),
(7, 37, 'Perfect', 5, 17, '2020-05-04 20:10:52', 1),
(8, 38, NULL, NULL, 17, '2020-05-04 22:42:27', 0),
(9, 39, 'My burger was supposed to be medium-rare.', 3, 17, '2020-05-04 22:43:43', 1);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `inventoryid` int(11) NOT NULL,
  `stockname` varchar(100) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`inventoryid`, `stockname`, `quantity`) VALUES
(1, 'Pork', 100),
(2, 'Bell Peppers', 120);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `MenuID` int(11) NOT NULL,
  `itemname` varchar(30) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `nutrientfacts` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`MenuID`, `itemname`, `price`, `description`, `nutrientfacts`) VALUES
(1, 'Mixta', 12, 'Ibras Special Hamburger', ' Contains Carbs.'),
(3, 'Pollo', 14, 'Meat + Chips', 'High Carbs'),
(5, 'Big Joy', 95, 'Super Special Burger', ' Contains fat and fat'),
(8, 'Burger', 12, 'Burger', 'Contains Fat'),
(9, 'Is this a burger?', 10, 'Burger', 'Contains Carbs'),
(12, 'What a burger?', 90, 'Ham fried on stove', 'Contains Carbohydrates and Proteins'),
(16, 'Crisis Burger', 10, 'Best Crisis Burger', 'Contains Fat.');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

CREATE TABLE `orderitems` (
  `OrderitemID` int(11) NOT NULL,
  `orderID` int(11) DEFAULT NULL,
  `menuID` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderitems`
--

INSERT INTO `orderitems` (`OrderitemID`, `orderID`, `menuID`, `quantity`) VALUES
(1, 1, 3, 2),
(2, 1, 1, 2),
(3, 2, 3, 2),
(4, 2, 1, 1),
(5, 3, 1, 100),
(14, 11, 1, 1),
(15, 11, 3, 1),
(16, 11, 5, 1),
(17, 12, 1, 10),
(18, 12, 3, 10),
(19, 12, 5, 10),
(20, 13, 1, 4),
(21, 14, 1, 1),
(22, 15, 1, 4),
(23, 15, 3, 4),
(24, 16, 3, 1),
(25, 16, 1, 1),
(26, 16, 8, 1),
(33, 34, 1, 5),
(34, 34, 5, 3),
(35, 34, 9, 4),
(36, 35, 1, 3),
(38, 36, 1, 3),
(39, 37, 3, 3),
(40, 38, 1, 2),
(41, 39, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderID` int(11) NOT NULL,
  `OrderPrice` int(11) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL,
  `OrderTime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderID`, `OrderPrice`, `UserID`, `OrderTime`) VALUES
(1, 20, 8, '2020-04-13 02:59:09'),
(2, 20, 8, '2020-04-13 02:59:09'),
(3, 35, 9, '2020-04-15 09:09:00'),
(4, 94, 17, '2020-04-15 09:09:00'),
(11, 121, 17, '2020-04-15 20:31:08'),
(12, 1210, 17, '2020-04-15 20:32:03'),
(13, 48, 17, '2020-04-15 20:37:38'),
(14, 12, 17, '2020-04-15 20:40:13'),
(15, 104, 17, '2020-04-15 20:56:35'),
(16, 38, 17, '2020-04-15 22:25:32'),
(34, 393, 17, '2020-05-02 06:53:15'),
(35, 44, 17, '2020-05-02 07:02:40'),
(36, 36, 17, '2020-05-04 15:31:36'),
(37, 42, 17, '2020-05-04 20:10:37'),
(38, 24, 17, '2020-05-04 22:42:26'),
(39, 28, 17, '2020-05-04 22:43:02');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `ProfileID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `FullName` varchar(255) DEFAULT NULL,
  `emailid` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `phonenumber` varchar(255) DEFAULT NULL,
  `occupation` varchar(255) DEFAULT NULL,
  `worksfor` varchar(255) DEFAULT NULL,
  `profilephoto` varchar(255) DEFAULT NULL,
  `profileupdated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`ProfileID`, `UserID`, `FullName`, `emailid`, `address`, `city`, `country`, `phonenumber`, `occupation`, `worksfor`, `profilephoto`, `profileupdated`) VALUES
(1, 8, 'Nishanth Bysani', 'nishanth.bysani@gmail.com', 'Arlington', 'Arlington', 'USA', '6223032735', 'Stanford University', 'Student', NULL, '2020-05-04 16:39:46'),
(3, 15, 'test', 'test1@gmail.com', 'Arlington', 'Arlington', NULL, NULL, NULL, NULL, NULL, '2020-04-14 22:58:28'),
(4, 16, 'Nick Fury', 'NickFury@shield.com', 'NickFury@shield.com', 'Arlington', 'United States', '+1 784784874', 'Director', 'Shield', NULL, '2020-04-14 23:00:37'),
(5, 18, 'Nishanth Bysani', 'nishanth.bysani@yahoo.com', '402,Bharghav Residency, Plot -18,19,20', '402,Bharghav Residency, Plot -18,19,20', NULL, NULL, NULL, NULL, NULL, '2020-04-15 23:24:09'),
(6, 19, 'Abhinav', 'abhinav@gmail.com', 'Arlington', 'Arlington', 'USA', NULL, NULL, NULL, NULL, '2020-05-02 22:40:31'),
(7, 20, 'prady', 'prady@gmail.com', 'Arlington', 'Arlington', 'USA', NULL, NULL, NULL, NULL, '2020-05-02 23:49:21'),
(8, 21, 'madhavi', 'madhavi@gmail.com', 'Hyderabad', 'Hyderabad', 'USA', NULL, NULL, NULL, NULL, '2020-05-04 15:04:58'),
(9, 17, 'Jeevesh', 'Jeevesh@gmail.com', 'Arlington', 'Arlington', 'Arlington', '6822302787', 'Student', 'UTA', NULL, '2020-05-04 17:03:23'),
(26, 38, 'ibrasadmin', 'ibrasadmin@gmail.com', 'Arlington', 'Arlington', 'USA', NULL, NULL, NULL, NULL, '2020-05-05 00:38:35'),
(27, 39, 'ibrasuser', 'ibrasuser@gmail.com', 'Arlington', 'Arlington', 'USA', NULL, NULL, NULL, NULL, '2020-05-05 00:45:37');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `RegID` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `UserName` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `roleid` int(11) DEFAULT NULL,
  `Registrationtime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`RegID`, `Name`, `Address`, `UserName`, `Password`, `roleid`, `Registrationtime`) VALUES
(11, 'Nishanth Bysani', '402,Bharghav Residency, Plot -18,19,20', 'nishanth.bysani@gmail.com', 'Test@123', 2, '2020-04-12 19:02:47'),
(12, 'Gaurav', 'Arlington', 'gaurav@gmail.com', 'Test@123', 2, '2020-04-13 05:12:08'),
(13, 'Sampada', 'Arlington', 'Sampada@gmail.com', 'Test@123', 2, '2020-04-13 21:11:41'),
(20, 'test', 'Arlington', 'test1@gmail.com', 'Test@123', 2, '2020-04-14 22:58:26'),
(21, 'Nick Fury', 'Arlington', 'NickFury@shield.com', 'Test@123', 2, '2020-04-14 22:59:46'),
(22, 'Jeevesh', 'Arlington', 'jeevesh@gmail.com', 'Test@123', 1, '2020-04-15 04:08:08'),
(23, 'Nishanth Bysani', '402,Bharghav Residency, Plot -18,19,20', 'nishanth.bysani@yahoo.com', 'Test@123', 2, '2020-04-15 23:24:07'),
(24, 'Abhinav', 'Arlington', 'abhinav@gmail.com', 'Test@123', 1, '2020-05-02 22:40:31'),
(25, 'prady', 'Arlington', 'prady@gmail.com', 'Test@123', 1, '2020-05-02 23:49:21'),
(26, 'madhavi', 'Hyderabad', 'madhavi@gmail.com', 'Test@123', 2, '2020-05-04 15:04:58'),
(43, 'ibrasadmin', 'Arlington', 'ibrasadmin@gmail.com', 'Test@123', 2, '2020-05-05 00:39:46'),
(44, 'ibrasuser', 'Arlington', 'ibrasuser@gmail.com', 'Test@123', 1, '2020-05-05 00:45:37');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `RoleID` int(11) NOT NULL,
  `RoleName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`RoleID`, `RoleName`) VALUES
(1, 'customer'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `stafftimesheet`
--

CREATE TABLE `stafftimesheet` (
  `staffid` int(11) NOT NULL,
  `staffname` varchar(255) NOT NULL,
  `hoursclocked` int(11) NOT NULL,
  `hourstobeclocked` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stafftimesheet`
--

INSERT INTO `stafftimesheet` (`staffid`, `staffname`, `hoursclocked`, `hourstobeclocked`) VALUES
(6, 'Staff1', 8, 10),
(7, 'Staff2', 8, 12);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usersibras`
--

CREATE TABLE `usersibras` (
  `UserID` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Username` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `RegID` int(11) DEFAULT NULL,
  `RoleID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usersibras`
--

INSERT INTO `usersibras` (`UserID`, `Name`, `Username`, `Password`, `RegID`, `RoleID`) VALUES
(8, 'Nishanth Bysani', 'nishanth.bysani@gmail.com', 'Test@123', 11, 2),
(9, 'Gaurav', 'gaurav@gmail.com', 'Test@123', 12, 2),
(10, 'Sampada', 'Sampada@gmail.com', 'Test@123', 13, 2),
(15, 'test', 'test1@gmail.com', 'Test@123', 20, 2),
(16, 'Nick Fury', 'NickFury@shield.com', 'Test@123', 21, 2),
(17, 'Jeevesh', 'jeevesh@gmail.com', 'Test@123', 22, 1),
(18, 'Nishanth Bysani', 'nishanth.bysani@yahoo.com', 'Test@123', 23, 2),
(19, 'Abhinav', 'abhinav@gmail.com', 'Test@123', 24, 1),
(20, 'prady', 'prady@gmail.com', 'Test@123', 25, 1),
(21, 'madhavi', 'madhavi@gmail.com', 'Test@123', 26, 2),
(38, 'ibrasadmin', 'ibrasadmin@gmail.com', 'Test@123', 43, 2),
(39, 'ibrasuser', 'ibrasuser@gmail.com', 'Test@123', 44, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`CartID`),
  ADD KEY `MenuID` (`MenuID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`ContactID`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`FeedbackID`),
  ADD KEY `OrderID` (`OrderID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`inventoryid`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`MenuID`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD PRIMARY KEY (`OrderitemID`),
  ADD KEY `orderID` (`orderID`),
  ADD KEY `menuID` (`menuID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`ProfileID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`RegID`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`RoleID`);

--
-- Indexes for table `stafftimesheet`
--
ALTER TABLE `stafftimesheet`
  ADD PRIMARY KEY (`staffid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `usersibras`
--
ALTER TABLE `usersibras`
  ADD PRIMARY KEY (`UserID`),
  ADD KEY `RegID` (`RegID`),
  ADD KEY `RoleID` (`RoleID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `CartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `ContactID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `FeedbackID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `inventoryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `MenuID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orderitems`
--
ALTER TABLE `orderitems`
  MODIFY `OrderitemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `ProfileID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `RegID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `RoleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stafftimesheet`
--
ALTER TABLE `stafftimesheet`
  MODIFY `staffid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usersibras`
--
ALTER TABLE `usersibras`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`MenuID`) REFERENCES `menu` (`MenuID`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `usersibras` (`UserID`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `orders` (`OrderID`),
  ADD CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `usersibras` (`UserID`);

--
-- Constraints for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD CONSTRAINT `orderitems_ibfk_1` FOREIGN KEY (`orderID`) REFERENCES `orders` (`OrderID`),
  ADD CONSTRAINT `orderitems_ibfk_2` FOREIGN KEY (`menuID`) REFERENCES `menu` (`MenuID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `usersibras` (`UserID`);

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `usersibras` (`UserID`);

--
-- Constraints for table `usersibras`
--
ALTER TABLE `usersibras`
  ADD CONSTRAINT `usersibras_ibfk_1` FOREIGN KEY (`RegID`) REFERENCES `registration` (`RegID`),
  ADD CONSTRAINT `usersibras_ibfk_2` FOREIGN KEY (`RoleID`) REFERENCES `roles` (`RoleID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
