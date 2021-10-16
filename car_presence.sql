-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2021 at 09:40 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_presence`
--

-- --------------------------------------------------------

--
-- Table structure for table `log_parkir`
--

CREATE TABLE `log_parkir` (
  `id_log` int(11) NOT NULL,
  `id_parkir` varchar(191) NOT NULL,
  `start` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `end` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log_parkir`
--

INSERT INTO `log_parkir` (`id_log`, `id_parkir`, `start`, `end`) VALUES
(1, 'SR04_1', '2021-10-16 03:53:43', '2021-10-16 03:24:45'),
(2, 'SR04_2', '2021-10-16 03:53:53', '2021-10-16 03:24:33'),
(3, 'SR04_3', '2021-10-16 03:54:03', '2021-10-16 03:24:50'),
(4, 'SR04_4', '2021-10-16 03:54:08', '2021-10-16 03:24:40'),
(5, 'SR04_1', '2021-10-16 04:04:26', '2021-10-16 04:04:26');

-- --------------------------------------------------------

--
-- Table structure for table `parkirs`
--

CREATE TABLE `parkirs` (
  `id` int(20) NOT NULL,
  `sensor_name` varchar(191) NOT NULL,
  `variable_name` varchar(191) NOT NULL,
  `status` varchar(191) NOT NULL,
  `level` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `warn_detect` varchar(191) NOT NULL,
  `loc_name` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parkirs`
--

INSERT INTO `parkirs` (`id`, `sensor_name`, `variable_name`, `status`, `level`, `created_at`, `updated_at`, `warn_detect`, `loc_name`) VALUES
(1, 'SR04_1', 's_a_1', 'kosong', '1', '2021-10-16 03:10:46', '2021-10-16 04:04:26', 'running', 'S1'),
(2, 'SR04_2', 's_a_2', 'kosong', '1', '2021-10-16 03:10:46', '2021-10-16 03:10:46', 'running', 'S2'),
(3, 'SR04_3', 's_b_1', 'kosong', '1', '2021-10-16 03:11:44', '2021-10-16 03:11:44', 'running', 'S3'),
(4, 'SR04_4', 's_b_2', 'kosong', '1', '2021-10-16 03:11:44', '2021-10-16 03:11:44', 'running', 'S4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `log_parkir`
--
ALTER TABLE `log_parkir`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `parkirs`
--
ALTER TABLE `parkirs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log_parkir`
--
ALTER TABLE `log_parkir`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `parkirs`
--
ALTER TABLE `parkirs`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
