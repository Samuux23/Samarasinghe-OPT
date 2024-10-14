-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2024 at 11:10 AM
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
-- Database: `samarasinghe`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AdminID` int(50) NOT NULL,
  `AdminEmail` varchar(100) NOT NULL,
  `AdminPassword` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminID`, `AdminEmail`, `AdminPassword`) VALUES
(1, 'admin@gmail.com', 'Admin1234');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `AppointmentID` int(20) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `NearTown` varchar(50) NOT NULL,
  `Contact` varchar(50) NOT NULL,
  `Date` date NOT NULL,
  `Time` varchar(20) NOT NULL,
  `Status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`AppointmentID`, `Name`, `Email`, `NearTown`, `Contact`, `Date`, `Time`, `Status`) VALUES
(5, 'neyomal udith', 'udithneyomalt@gmail.com', 'kandy', '0715368650', '2024-10-17', '4:00pm-6:00pm', 'Confirmed'),
(6, 'neyomal udith', 'neyomaludith@gmail.com', 'Kandy', '0763256609', '2024-10-10', '4:00pm-6:00pm', 'Pending..'),
(7, 'sadins', 'neyomaludith@gmail.com', 'colombo', '0763256609', '2024-10-11', '4:00pm-6:00pm', 'Confirmed');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CustomerID` int(50) NOT NULL,
  `CustomerName` varchar(100) NOT NULL,
  `CustomerEmail` varchar(100) NOT NULL,
  `CustomerContact` varchar(100) NOT NULL,
  `CustomerPassword` varchar(100) NOT NULL,
  `Address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CustomerID`, `CustomerName`, `CustomerEmail`, `CustomerContact`, `CustomerPassword`, `Address`) VALUES
(17, 'neyomal udith', 'udithneyomalt@gmail.com', '0715368650', 'Neyo1234', '120, Moladanda, kiribathkumbura'),
(19, 'Samunda De Silva', 'samundasilva23@gmail.com', '0763256609', '123456', ''),
(20, 'vbfbgn', 'seyew44590@skrank.com', '0763256609', 'e63c482a15d8aeed3c3465a1106564f7', ''),
(21, 'SAMUNDA', 'tijofep314@skrank.com', '0763256609', '$2y$10$VK8lT2KrTpsI6aYwvY5Vu.KoaOF9/dj9ZYeYh76vaSMxWPMP5JdWS', 'ghjyjkm'),
(22, 'sadinathalangama', 'sadinathalangama123@gmail.com', '0763256609', 'sadina1234', 'pataleege niwasa '),
(23, 'neyomal udith', 'neyomaludith@gmail.com', '0763256609', '11111', '');

-- --------------------------------------------------------

--
-- Table structure for table `home_images`
--

CREATE TABLE `home_images` (
  `id` int(11) NOT NULL,
  `slide_number` int(11) NOT NULL,
  `image_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `home_images`
--

INSERT INTO `home_images` (`id`, `slide_number`, `image_name`) VALUES
(1, 1, '66e318634f2f2.png'),
(3, 2, '66e31947624e8.png');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `branch`, `address`, `phone`) VALUES
(2, 'KEGALLE 1', 'No. 162, Colombo Road, Kegalle', '0352223079'),
(3, 'KEGALLE 2', 'No. 103 Francis Molamure Mawatha Kegalle', '0352222238 / 0702222'),
(4, ' KANDY (Kings Street)', 'No.61, Kings Street, Kandy', '0812200156/7'),
(5, 'KANDY (Queens Hotel)', 'Queens Hotel, Kandy', '0812223745'),
(6, 'KANDY (N.H.D.A. Building)', 'No. 81, N.H.D.A. Building, Yatinuwara Veediya, Kandy', '0812233719'),
(7, 'COLOMBO 11 Ã¢â‚¬â€¹', 'Ã¢â‚¬â€¹ No. 85, Olcott Mawatha, Colombo 11', '0112381800/011233873'),
(8, 'COLOMBO 11 Ã¢â‚¬â€¹', 'Ã¢â‚¬â€¹ No. 85, Olcott Mawatha, Colombo 11', '0112381800/011233873');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `subject`, `message`) VALUES
(15, 'neyomal udith', 'udithneyomalt@gmail.com', 'How can i contact you', 'can i get more details about your Kandy branch ? where is it exactly located ?'),
(16, 'Samunda De Silva', 'samundasilva23@gmail.com', 'test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderID` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Contact` varchar(20) NOT NULL,
  `Delivery address` varchar(200) NOT NULL,
  `Postal` varchar(50) NOT NULL,
  `TotalPrice` varchar(100) NOT NULL,
  `Proof` varchar(200) NOT NULL,
  `Status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderID`, `Email`, `Name`, `Contact`, `Delivery address`, `Postal`, `TotalPrice`, `Proof`, `Status`) VALUES
(12, 'udithneyomalt@gmail.com', 'POLARIZED - ROUND GL', '0715368650', '120,moladanda, kiribathkumbura', '20442', '16900', 'photo_2024-10-09_21-48-20.jpg', 'Paid'),
(13, 'sadinathalangama123@gmail.com', 'ROSE GOLD / HALF FAD', '0763256609', '300/G Warathanna, Halloluwa, Kandy', '20000', '12500', '2.png', 'Shipped'),
(14, 'neyomaludith@gmail.com', 'RT - GREEN CLASSIC M', '0763256609', '300/G Warathanna, Halloluwa, Kandy', '20000', '22000', '3.png', 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductID` int(50) NOT NULL,
  `ProductImage` varchar(100) NOT NULL,
  `ProductName` varchar(100) NOT NULL,
  `Category` varchar(100) NOT NULL,
  `Brand` varchar(100) NOT NULL,
  `ProductDes` varchar(200) NOT NULL,
  `ProductPrice` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductID`, `ProductImage`, `ProductName`, `Category`, `Brand`, `ProductDes`, `ProductPrice`) VALUES
(9, '6.png', 'Polarized - Round glass', 'sunglasses', 'Polar Sun', 'Premium black sun glasses', '16900'),
(10, '1.png', 'Rose Gold / Half Fade', 'sunglasses', 'Polar Sun', 'Fashionable for women', '12500'),
(11, '2.png', 'RT - Full Black Classic', 'sunglasses', 'RT', 'extra thin layer polazied', '19800'),
(12, '3.png', 'RT - Green Classic Men', 'sunglasses', 'RT', 'Green mist - faded', '22000'),
(13, '4.png', 'RT - Brown Classic Men', 'sunglasses', 'RT', 'Brown mist, extra light', '20500'),
(14, 'lense4.jpg', 'Radiant Hazel Color Lenses', 'contact lenses', 'Acuvue', ' maximum comfort and UV protection.', '6500'),
(15, 'lense3.jpg', 'Golden Sun Color Lenses', 'contact lenses', 'Acuvue', 'with a shimmering effect.', '6900'),
(16, 'lense2.jpg', 'Oceanic Blue Lenses', 'contact lenses', 'Acuvue', ' high moisture retention', '7000'),
(17, 'lense1.jpg', ' Gray Mist Contact Lenses', 'contact lenses', 'Acuvue', 'Ideal for a chic', '6000'),
(18, '3.jpg', 'Carlo Rino - Bold Black Frame', 'spectacles', 'Carlo Rino', 'Extra light-weight', '13500'),
(19, '2.jpg', 'Polar Sun Metal Aviator - Frames', 'spectacles', 'Polar Sun', 'lightweight metal frame', '12600'),
(20, '1.jpg', 'Carlo Rino - retro round frame', 'spectacles', 'Carlo Rino', 'Retro look for you', '11600');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `service_title` varchar(255) NOT NULL,
  `service_description` text NOT NULL,
  `service_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_title`, `service_description`, `service_image`) VALUES
(1, 'Comprehensive Eye Exams', 'We provide thorough eye exams to ensure your vision is at its best.', '66e3211023ec9.webp'),
(2, 'Contact Lenses', 'Get the perfect contact lenses for your eyes, customized just for you.', '66e321803fdce.webp'),
(3, 'Designer Eyeglasses', 'Choose from a wide range of designer eyeglasses to suit your style', '66e321c331006.webp');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `StaffID` int(100) NOT NULL,
  `StaffName` varchar(100) NOT NULL,
  `StaffEmail` varchar(100) NOT NULL,
  `StaffPassword` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`StaffID`, `StaffName`, `StaffEmail`, `StaffPassword`) VALUES
(4, 'Staff', 'staff@gmail.com', 'Staff1234'),
(5, 'sadina', 'sadina@gmail.com', 'sadina1234'),
(6, 'nethmi', 'nethmianushka@gmail.com', '11111');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminID`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`AppointmentID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `home_images`
--
ALTER TABLE `home_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`StaffID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `AdminID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `AppointmentID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CustomerID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `home_images`
--
ALTER TABLE `home_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `StaffID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
