-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2025 at 10:45 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `singzone`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$hS8o5QgOxUeIbR3rIqk4cO1V0M7V6eozhQyU5nOUwE2ffLCKTxQHy');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `booking_date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `room_type` varchar(50) DEFAULT NULL,
  `people` int(11) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `payment_method` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `payment_status` varchar(20) DEFAULT 'Belum Dibayar',
  `total_price` int(11) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'booked',
  `room_number` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `name`, `email`, `phone`, `booking_date`, `start_time`, `end_time`, `room_type`, `people`, `notes`, `payment_method`, `created_at`, `payment_status`, `total_price`, `status`, `room_number`) VALUES
(30, 'Dona Robiha', 'ridwan@gmail.com', '081292703061', '2025-05-25', '01:00:00', '13:00:00', 'Ruang Standart', 2, '', NULL, '2025-05-24 11:43:13', 'unpaid', 200000, 'in_use', '31'),
(37, 'Davi Praba', 'sisfo@gmail.com', '081292701313', '2025-05-28', '05:00:00', '13:00:00', 'Ruang Standart', 4, 'gaada', NULL, '2025-05-24 16:09:04', 'unpaid', 90000, 'in_use', '20'),
(39, 'Ikram', 'sisfo@gmail.com', '081292703061', '2025-05-31', '05:00:00', '15:00:00', 'Ruang Standart', 3, 'Lc yang cakep', NULL, '2025-05-27 12:34:56', 'paid', 270000, 'booked', '01'),
(40, 'Muhammad Zikri Rausyan Hermawan', 'sisfo@gmail.com', '081292703061', '2025-05-28', '10:00:00', '23:00:00', 'Ruang VIP', 6, 'gaada', NULL, '2025-05-27 12:40:07', 'paid', 90000, 'in_use', '05');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `song_request` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `message`, `song_request`, `created_at`) VALUES
(1, 'Ridwan', 'ridwan@gmail.com', 'mantap king', 'Ratna anjink', '2025-05-27 13:22:59');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `email`, `phone`, `password`, `created_at`) VALUES
(1, 'Zikri', 'jikri@gmail.com', '081292703061', '$2y$10$qtE0NIiXJ9xHSTE4iHuJO.XCkfUsp6YiJSAsIJnNehZMkxYaDRpmy', '2025-05-22 15:48:12'),
(2, 'Muhammad Zikri Rausyan Hermawan', 'sisfo@gmail.com', '081292703061', '$2y$10$O0FzbZu1O0P3zHxGGXoh4udQAEt1mD6b2kbbaqdnUbm3Q0ObG71C2', '2025-05-27 12:37:45');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `number` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `customer` varchar(100) DEFAULT NULL,
  `waktu` varchar(50) DEFAULT NULL,
  `payment` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_member` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `created_at`, `is_member`) VALUES
(5, 'Muhammad Zikri Rausyan Hermawan', 'sisfo@gmail.com', '081292703061', '$2y$10$6h/VqS7yP7ZtNXnxYHenrekleOHxg0WE0kLPnYtM6ak5EniBt2qsm', '2025-05-15 09:31:43', 1),
(6, 'Dona Robiha', 'muhammadzikrirausyan@gmail.com', '081292703061', '$2y$10$2hKYptxXxy0O/CFGtgJYXuTdUVB9.t0KYmmnBKUeLbK3A1vmlG0Q2', '2025-05-15 10:16:52', 0),
(7, 'Ridwan', 'ridwan@gmail.com', '08957890321', '$2y$10$F8aptVvBWadM1VDWoR2Cyun5YvRlYxEd.cWXuoYuBAMGqviJnL19i', '2025-05-24 09:47:03', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
