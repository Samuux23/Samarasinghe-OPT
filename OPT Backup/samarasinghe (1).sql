-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2024 at 11:50 AM
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
(3, 'neyomal', 'neyomal@gmail.com', 'kandy', '0715368650', '2024-10-07', '4:00pm-6:00pm', 'Confirmed');

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
(12, 'softtechlk', 'softtech.incorporations@gmail.com', '0715368650', '$2y$10$GBFPc6KV/mIgr9d1Os2QCegaCY11qYKQBeX6XzZCv5iFdyuzCRrcy', 'rrr'),
(13, 'Samunda De Silva', 'samundasilva23@gmail.com', '0763256609', 'samu1234', 'galaha'),
(14, 'udith', 'udithneyomalt@gmail.com', '0763256609', '89b89caee38f3b3af4a76b39a6f0c5ec', ''),
(15, 'maneth siriwardhgana', 'neyomal.ss@gmail.com', '0763256609', '89b89caee38f3b3af4a76b39a6f0c5ec', '');

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
(7, 'COLOMBO 11 â€‹', 'â€‹ No. 85, Olcott Mawatha, Colombo 11', '0112381800/011233873'),
(8, 'COLOMBO 11 â€‹', 'â€‹ No. 85, Olcott Mawatha, Colombo 11', '0112381800/011233873');

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
(5, 'NEyomal udith ', 'neyo@gmail.com', 'test neyo', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem '),
(10, 'Samunda De Silva', 'brightercodez@gmail.com', 'trtrt', 'trgrgfgffbbfgbgbg'),
(11, 'assdasd', 'neyomal@gmail.com', 'asdasd', 'asdasdasd'),
(12, 'neyomal', 'neyomal@gmail.com', 'test', 'sjkdhfkusdhfksjhdf'),
(13, 'neyomal', 'neyomal@gmail.com', 'test', 'sjkdhfkusdhfksjhdf'),
(14, 'Neyomal', 'neyomaludith@gmail.com', 'hi', 'adsdsd');

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
(5, 'softtech.incorporations@gmail.com', 'softtechlk', '0715368650', '120,moladanda, kiribathkumbura', '20442', '15600', 'Untitled design (2).png', 'Paid'),
(7, 'samundasilva23@gmail.com', 'Samunda De Silva', '0763256609', '300/G Warathanna, Halloluwa, Kandy', '20000', '14500', 'Samunda De Silva (1).pdf', 'Pending'),
(8, 'udithneyomalt@gmail.com', 'neyomal Udith', '0763256609', '300/G Warathanna, Halloluwa, Kandy', '2000', '13400', '1687247lkl100768.png', 'Pending'),
(9, 'udithneyomalt@gmail.com', 'CLASSIC FRAME', '0763256609', '300/G Warathanna, Halloluwa, Kandy', '20000', '6700', 'screencapture-localhost-3000-eyeExams-php-2024-09-03-20_29_48.png', 'Rejected'),
(10, 'neyomal.ss@gmail.com', 'FULL BLACK CLASSIC, ', '0763256609', '300/G Warathanna, Halloluwa, Kandy', '20000', '35500', '3.png', 'Paid');

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
(5, '01.jpeg', 'Rayban Black', 'sunglasses', 'Reban', 'temp', '7800'),
(6, '02.jpg', 'Classic Frame', 'spectacles', 'Reban', 'temp', '6700'),
(8, '3.jpg', 'blue', 'contact lenses', 'Speck', 'tempppppppp', '8900'),
(9, '6.png', 'Round glass', 'sunglasses', 'raynban', 'temppppp', '5600'),
(10, '1.png', 'Rose Gold / Half Fade', 'sunglasses', 'Rayban', 'temp', '12500'),
(11, '2.png', 'Full Black Classic', 'sunglasses', 'Rayban', 'vfbghnhjm', '13500'),
(12, '3.png', 'Green Classic Men', 'sunglasses', 'Rayban', 'vcbhmm', '22000'),
(13, '4.png', 'Brown Classic Men', 'sunglasses', 'Rayban', 'vfdbgng', '14200');

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
(4, 'Nethmi Anushka', 'nethmi@gmail.com', '111111');

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
  MODIFY `AppointmentID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CustomerID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `StaffID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
