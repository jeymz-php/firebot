-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2026 at 06:12 PM
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
(4, 'Jan Ermaine Ureta', 'janermaine@gmail.com', '$2y$10$CdGK9ja9JMnUZ.v.xKedlu9Gwa/T2/1DLPy4B3fpgkGoH2c05zu.2', '2025-11-12 21:29:47'),
(6, 'FireBOT Admin 1', 'ucc.firebot.2025@gmail.com', '$2y$10$b.Gek2l07c2K9ya3pasVZubLGwURpje1K.9K2KNkFMtjbThgfeYhW', '2026-02-17 06:36:01');

-- --------------------------------------------------------

--
-- Table structure for table `barangays`
--

CREATE TABLE `barangays` (
  `id` int(11) NOT NULL,
  `barangay_name` varchar(150) NOT NULL,
  `address` text DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `latitude` decimal(10,8) NOT NULL,
  `longitude` decimal(11,8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barangays`
--

INSERT INTO `barangays` (`id`, `barangay_name`, `address`, `phone`, `latitude`, `longitude`) VALUES
(1, 'Barangay 161', 'REPARO, 324 Rose, Caloocan', '09071829723', 14.67561851, 121.00425361),
(2, 'Barangay 160', 'Barangay Hall, 160 Reyes Drv, Caloocan', 'N/A', 14.68257120, 121.00040531),
(3, 'Barangay 162', '28 Tullahan Rd, Caloocan', '0289833284', 14.68221698, 121.00888968),
(4, 'Barangay 158', 'Bayanihan St, Baesa Rd, Caloocan', 'N/A', 14.67356829, 121.00491821),
(5, 'Barangay 163', 'Santa Quiteria Rd, Caloocan', '0283305443', 14.69021347, 121.00872874),
(6, 'Barangay 164', '061 Rd 8, Caloocan', 'N/A', 14.69036490, 121.01731417),
(7, 'Barangay 157', '93 Cabrea Street, Baesa, Caloocan', 'N/A', 14.65311175, 120.99064394),
(8, 'Barangay 154', '173 Raminad Street, Bagong Barrio West, Caloocan', 'N/A', 14.66742654, 120.99927027),
(9, 'Barangay 152', '187 Milagrosa, Bagong Barrio West, Caloocan', 'N/A', 14.66912872, 120.99678118),
(10, 'Barangay 149', '149 Reparo Rd, Potrero, Caloocan', 'N/A', 14.66858900, 120.99523622),
(11, 'Barangay 145', 'Multi-Purpose Bldg, Reparo Rd, Caloocan', 'N/A', 14.66734350, 120.99360544),
(12, 'Barangay 150', '162 Panday Pira, Bagong Barrio West, Caloocan', 'N/A', 14.66679396, 120.99722783),
(13, 'Barangay 153', '21 Intan, Bagong Barrio West, Caloocan', 'N/A', 14.66769753, 120.99884397),
(14, 'Barangay 82', '91 V. Concepcion, Morning Breeze, Caloocan', 'N/A', 14.66345178, 120.98932298),
(15, 'Barangay 93', '11th Ave Cor 10th Street Grace Park, Caloocan', '0283512195', 14.65487173, 120.99163991),
(16, 'Barangay 128', '1404 Tagaytay St, Caloocan', '09289355673', 14.64174863, 120.98853629),
(17, 'Barangay 105', '105 8th Ave, Grace Park East, Caloocan', 'N/A', 14.64944521, 120.99367638),
(18, 'Barangay 88', '729 L. Tolentino, Grace Park East, Caloocan', '09095952380', 14.65532929, 120.98768698),
(19, 'Barangay 12', 'Dagat-Dagatan, Caloocan', 'N/A', 14.65385716, 120.96540370),
(20, 'Barangay 8', 'Sabalo St, Sangandaan, Caloocan', '09302543585', 14.65688147, 120.96462428),
(21, 'Barangay 14', 'Dagat-Dagatan, Caloocan', 'N/A', 14.65132256, 120.96804350),
(22, 'Barangay 28', '24-L Kapanalig, Maypajo, Caloocan', '0270009321', 14.64370416, 120.97079158),
(23, 'Barangay 19', 'Dona Consuelo, Poblacion, Caloocan', 'N/A', 14.64827665, 120.97463787),
(24, 'Barangay 18', 'Poblacion, Caloocan', '2750976', 14.64811223, 120.97157277),
(25, 'Barangay 40', '1st Avenue Grace Park, Caloocan', 'N/A', 14.63931915, 120.98239213),
(26, 'Barangay 1', '1107 A.P.Aquino, Sangandaan, Caloocan', 'N/A', 14.65803302, 120.97276550),
(27, 'Barangay 90', 'Grace Park East, Caloocan', 'N/A', 14.65391330, 120.98536847),
(28, 'Barangay 94', '19A Biglang Awa, Grace Park East, Caloocan', 'N/A', 14.65607345, 120.99438911),
(29, 'Barangay 95', 'Pacita Street, Grace Park East, Caloocan', '09335638999', 14.65643267, 120.99829288),
(30, 'Barangay 96', 'Cor Biglang Awa, CPO, Caloocan', '09433336100', 14.65378687, 120.99430856),
(31, 'Barangay 97', '11 Ave Ilang-ilang, Grace Park East, Caloocan', '0283769063', 14.65271541, 120.99285630),
(32, 'Barangay 108', '4th St, Grace Park East, Caloocan', '23100092', 14.64999855, 120.98744372),
(33, 'Barangay 104', '9Th Avenue Cor. 6Th & 7Th Avenue, Caloocan', '09351840128', 14.65012294, 120.98908762),
(34, 'Barangay 91', '148 3rd St, Grace Park East, Caloocan', 'N/A', 14.65240985, 120.98670890);

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

--
-- Dumping data for table `devices`
--

INSERT INTO `devices` (`id`, `device_id`, `device_model`, `created_at`, `owner_email`, `qr_verified`) VALUES
(12, 'FireBOT-1072', 'ESP32-FireBOT', '2026-02-17 16:40:03', 'gregorio.jamesryanbsit2022@gmail.com', 1);

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
-- Table structure for table `flame_status`
--

CREATE TABLE `flame_status` (
  `id` int(11) NOT NULL,
  `front` int(1) DEFAULT 0,
  `left_side` int(1) DEFAULT 0,
  `right_side` int(1) DEFAULT 0,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `flame_status`
--

INSERT INTO `flame_status` (`id`, `front`, `left_side`, `right_side`, `last_update`) VALUES
(1, 0, 0, 0, '2026-02-17 16:11:13');

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

--
-- Dumping data for table `robots`
--

INSERT INTO `robots` (`id`, `name`, `latitude`, `longitude`, `status`, `last_updated`) VALUES
(6, 'FireBOT_2025', 14.656032, 120.969426, 'Idle', '2026-02-17 17:12:20');

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
-- Table structure for table `robot_status`
--

CREATE TABLE `robot_status` (
  `id` int(11) NOT NULL,
  `fire_size` varchar(20) DEFAULT 'NONE',
  `intensity` int(11) DEFAULT 0,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `robot_status`
--

INSERT INTO `robot_status` (`id`, `fire_size`, `intensity`, `last_update`) VALUES
(1, 'NONE', 0, '2026-02-08 04:39:01');

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
(19, 'James Ryan Gregorio', 'gregorio.jamesryanbsit2022@gmail.com', '09764334228', '#512 Llano Road, Barangay 167, Caloocan City', '2026-02-17 16:40:03', 'FireBOT-1072', 'ESP32-FireBOT');

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
-- Indexes for table `barangays`
--
ALTER TABLE `barangays`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `flame_status`
--
ALTER TABLE `flame_status`
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
-- Indexes for table `robot_status`
--
ALTER TABLE `robot_status`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `barangays`
--
ALTER TABLE `barangays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `devices`
--
ALTER TABLE `devices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `fire_stations`
--
ALTER TABLE `fire_stations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `flame_status`
--
ALTER TABLE `flame_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `robot_logs`
--
ALTER TABLE `robot_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `robot_status`
--
ALTER TABLE `robot_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
