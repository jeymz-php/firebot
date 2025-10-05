-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2025 at 08:46 PM
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
-- Database: `firebot`
--

-- --------------------------------------------------------

--
-- Table structure for table `robots`
--

CREATE TABLE `robots` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `latitude` decimal(10,6) NOT NULL,
  `longitude` decimal(10,6) NOT NULL,
  `status` enum('Active','Idle','Offline') DEFAULT 'Idle',
  `last_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `robots`
--

INSERT INTO `robots` (`id`, `name`, `latitude`, `longitude`, `status`, `last_updated`) VALUES
(1, 'Firebot 1', 14.609053, 121.022256, 'Active', '2025-10-05 17:02:42'),
(2, 'Firebot 2 ', 14.561555, 120.993230, 'Idle', '2025-10-05 17:02:42'),
(3, 'Firebot 3', 14.676041, 121.043700, 'Offline', '2025-10-05 17:02:42'),
(4, 'Firebot 4 ', 14.572456, 121.010748, 'Active', '2025-10-05 17:02:42');

-- --------------------------------------------------------

--
-- Table structure for table `robot_logs`
--

CREATE TABLE `robot_logs` (
  `id` int(11) NOT NULL,
  `robot_name` varchar(100) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `status` enum('Emergency','Resolved') DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `robot_logs`
--

INSERT INTO `robot_logs` (`id`, `robot_name`, `message`, `status`, `timestamp`) VALUES
(1, 'ROBOT-1', '[ALERT] Smoke and heat detected at Barangay Pinyahan, Quezon City. FIREBOT activated for suppression.', 'Emergency', '2025-10-05 17:31:26'),
(2, 'ROBOT-2', '[ALERT] Fire detected in Barangay Malate, Manila City. FIREBOT suppression sequence initiated.', 'Emergency', '2025-10-05 17:31:26'),
(3, 'ROBOT-3', 'Early-stage fire outbreak in Barangay Hulo, Mandaluyong City. FIREBOT responding to contain.', 'Emergency', '2025-10-05 17:31:26'),
(4, 'ROBOT-4', 'Household fire at Barangay 183, Pasay City suppressed. Situation normal.', 'Resolved', '2025-10-05 17:31:26'),
(5, 'ROBOT-5', 'Minor fire in Barangay San Antonio, Pasig City extinguished. No further hazards detected.', 'Resolved', '2025-10-05 17:31:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `contact_no`, `address`, `created_at`) VALUES
(1, 'Mark Santiago', 'marksantiago69@gmail.com', '09696969696', 'Jan lang sa tabe tumatae', '2025-10-05 18:25:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `robots`
--
ALTER TABLE `robots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `robot_logs`
--
ALTER TABLE `robot_logs`
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
-- AUTO_INCREMENT for table `robots`
--
ALTER TABLE `robots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `robot_logs`
--
ALTER TABLE `robot_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
