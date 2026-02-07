-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2026 at 04:15 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `firebot_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `full_name`, `email`, `password`, `created_at`) VALUES
(1, 'Vince', 'vincebaena17@gmail.com', '$2y$10$eqnF4NK8RO6ZunRH8MxJg.S15G0hJV5vQQdhdp3vYajgrWJUq.kJ.', '2025-10-06 10:50:20'),
(2, 'Mark', 'mark@gmail.com', '$2y$10$ZyoLhqBqOgZWsrY2r/T/w.478ajQpuALvkD7ZH4308LSsWmNTZsri', '2025-10-06 18:05:22'),
(3, 'James Ryan Gregorio', 'gregorio.jamesryanbsit2022@gmail.com', '$2y$10$P6asMbb38KY7CdRdvvaW9Orv2VLqVl19NYMVOUnXUoHKM3G30QHDm', '2025-11-02 21:50:44'),
(4, 'Jan Ermaine Ureta', 'janermaine@gmail.com', '$2y$10$CdGK9ja9JMnUZ.v.xKedlu9Gwa/T2/1DLPy4B3fpgkGoH2c05zu.2', '2025-11-12 21:29:47');

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

CREATE TABLE `devices` (
  `id` int(11) NOT NULL,
  `device_id` varchar(100) NOT NULL,
  `device_model` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `owner_email` varchar(150) DEFAULT NULL,
  `qr_verified` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fire_stations`
--

CREATE TABLE `fire_stations` (
  `id` int(11) NOT NULL,
  `station_name` varchar(150) NOT NULL,
  `address` text DEFAULT NULL,
  `contact_number` varchar(50) DEFAULT NULL,
  `latitude` decimal(10,8) NOT NULL,
  `longitude` decimal(11,8) NOT NULL,
  `status` enum('Active','Inactive') DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fire_stations`
--

INSERT INTO `fire_stations` (`id`, `station_name`, `address`, `contact_number`, `latitude`, `longitude`, `status`) VALUES
(1, 'Bagong Barrio Fire Station', '129 Malolos Ave, Bagong Barrio West, Caloocan', '0948 881 4598', 14.65650000, 120.99860000, 'Active'),
(2, 'Transcend Fire and Rescue Volunteers', '1400 D. Arellano, Bagong Barrio West, Caloocan', 'N/A', 14.65360000, 120.99610000, 'Active'),
(3, 'Fire Brigade and Communications Group', 'Maria Clara St, Grace Park East, Caloocan', '(02) 8367 5748', 14.64690000, 120.99580000, 'Active'),
(4, 'Barrio San Jose Fire-Sub Station', 'Tagaytay Street, Brgy. 128, San Jose, Caloocan', '(02) 8363 5030', 14.64230000, 120.99020000, 'Active'),
(5, 'Caloocan City Fire Central Station', 'Samson Rd, Caloocan', '(02) 2310 6527', 14.65450000, 120.98400000, 'Active'),
(6, 'Malabon Central Fire Station', '70 Gov. Pascual Ave, Potrero, Malabon', '(02) 8361 9712', 14.66110000, 120.98860000, 'Active'),
(7, 'Triskelion Order of Firefighters', '46 MH del Pilar St, Grace Park East, Caloocan', '0956 238 5222', 14.64770000, 120.99040000, 'Active'),
(8, 'Caloocan Fil Chinese Fire Prevention', 'C. Cordero St, Grace Park West, Caloocan', 'N/A', 14.64960000, 120.98230000, 'Active'),
(9, 'Marulas Fire Sub Station', '3S Center Bldg, Pio Valenzuela, Valenzuela', '(02) 8285 4471', 14.66450000, 120.97850000, 'Active'),
(10, 'Maypajo Fire Sub-Station', 'J.P Rizal St, Maypajo, Caloocan', 'N/A', 14.63690000, 120.97650000, 'Active'),
(11, 'Valenzuela City Central Fire Station', 'MacArthur Hwy, Valenzuela', '(02) 8292 3519', 14.68190000, 120.97610000, 'Active'),
(12, 'Gen. T. de Leon Fire Sub Station', '3S Center Building, Valenzuela', '(02) 8405 4986', 14.67660000, 120.99260000, 'Active'),
(13, 'San Lazaro Fire Station', '1546 Rizal Ave, Santa Cruz, Manila', '(02) 3386 4090', 14.61860000, 120.98220000, 'Active'),
(14, 'Gagalangin Fire Station', 'Juan Luna St, Tondo, Manila', '0942 020 2823', 14.62880000, 120.97340000, 'Active'),
(15, 'La Loma Fire Station', '50-C Malaya, La Loma, Quezon City', 'N/A', 14.63180000, 120.99430000, 'Active'),
(16, 'Masambong Fire Station', 'Malac St. Quezon City, Capoas', '(02) 8373 3731', 14.64180000, 121.01180000, 'Active'),
(17, 'Volunteer Firefighters Group', '118 Old Samson Rd, Quezon City', 'N/A', 14.65960000, 121.00450000, 'Active'),
(18, 'MANRESA FIRE AND RESCUE VOLUNTEER', '1 MAKATURING STREET, Quezon City', '0976 496 7214', 14.63950000, 121.00350000, 'Active'),
(19, 'Agham Fire Station', 'Agham, Bagong Pag-asa, Quezon City', 'N/A', 14.65080000, 121.04020000, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `message_replies`
--

CREATE TABLE `message_replies` (
  `id` int(11) NOT NULL,
  `thread_id` int(11) DEFAULT NULL,
  `sender` enum('user','admin') DEFAULT 'user',
  `message` text DEFAULT NULL,
  `sent_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `message_threads`
--

CREATE TABLE `message_threads` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `device_id` varchar(100) DEFAULT NULL,
  `device_model` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `contact_no`, `address`, `created_at`, `device_id`, `device_model`) VALUES
(16, 'Vince Baena', 'vincebaena17@gmail.com', '09619260643', 'Address', '2025-11-08 02:26:02', 'FireBOT_2025', 'FireBOT_745975');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `device_id` (`device_id`);

--
-- Indexes for table `fire_stations`
--
ALTER TABLE `fire_stations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message_replies`
--
ALTER TABLE `message_replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `thread_id` (`thread_id`);

--
-- Indexes for table `message_threads`
--
ALTER TABLE `message_threads`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `devices`
--
ALTER TABLE `devices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `fire_stations`
--
ALTER TABLE `fire_stations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `message_replies`
--
ALTER TABLE `message_replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `message_threads`
--
ALTER TABLE `message_threads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `message_replies`
--
ALTER TABLE `message_replies`
  ADD CONSTRAINT `message_replies_ibfk_1` FOREIGN KEY (`thread_id`) REFERENCES `message_threads` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
