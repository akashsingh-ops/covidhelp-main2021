-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2021 at 08:16 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `healthyagra4`
--

-- --------------------------------------------------------

--
-- Table structure for table `checklist`
--

CREATE TABLE `checklist` (
  `checkbox` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `checklist`
--

INSERT INTO `checklist` (`checkbox`) VALUES
('ICU'),
('Normal Beds'),
('Oxygen'),
('Ventilator');

-- --------------------------------------------------------

--
-- Table structure for table `log_table`
--

CREATE TABLE `log_table` (
  `log_id` int(100) NOT NULL,
  `resource_name` varchar(100) NOT NULL,
  `one_unit_size` int(10) NOT NULL,
  `measuring_unit` varchar(10) NOT NULL,
  `modified_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` int(100) NOT NULL,
  `vendor_id` int(100) NOT NULL,
  `resource_id` int(100) NOT NULL,
  `total` int(11) NOT NULL,
  `available` int(11) DEFAULT NULL,
  `action` enum('add','delete','increase','decrease','update') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `resource_id` int(100) NOT NULL,
  `resource_name` varchar(100) NOT NULL,
  `one_unit_size` int(11) NOT NULL,
  `measuring_unit` varchar(10) NOT NULL,
  `total` int(11) NOT NULL,
  `available` int(11) DEFAULT NULL,
  `vendor_id` int(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`resource_id`, `resource_name`, `one_unit_size`, `measuring_unit`, `total`, `available`, `vendor_id`, `created_at`, `updated_at`) VALUES
(7, 'Normal Beds', 1, 'Number', 50, 21, 12, '2021-05-12 16:00:05', '2021-05-13 23:13:15'),
(8, 'Oxygen', 9, 'L', 50, 6, 12, '2021-05-12 16:00:31', '2021-05-12 16:00:31'),
(9, 'Ventilator', 1, 'Number', 15, 3, 12, '2021-05-12 16:00:52', '2021-05-12 16:00:52'),
(10, 'ICU', 1, 'Number', 25, 5, 12, '2021-05-12 16:01:55', '2021-05-12 16:01:55'),
(11, 'Oxygen', 9, 'Litre', 60, 6, 13, '2021-05-12 16:21:55', '2021-05-12 16:21:55'),
(12, 'Normal Beds', 1, 'Number', 55, 15, 13, '2021-05-12 16:22:37', '2021-05-12 16:22:37'),
(13, 'Oxygen', 9, 'Litre', 70, 50, 14, '2021-05-12 16:32:29', '2021-05-12 16:32:29'),
(14, 'Oxygen', 9, 'L', 85, 9, 34, '2021-05-13 23:34:29', '2021-05-13 23:34:55'),
(15, 'Oxygen', 9, 'L', 60, 56, 36, '2021-05-15 23:17:45', '2021-05-15 23:17:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `email` varchar(120) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(60) NOT NULL,
  `lastname` varchar(60) NOT NULL,
  `phone_no` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `vendor_id` int(100) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `firstname`, `lastname`, `phone_no`, `created_at`, `update_at`, `vendor_id`, `status`) VALUES
(0, 'admin1@gmail.com', '$2y$10$ZO34DoYLyeuOoPF5wuHA4uDOesrkQ1txByLth/66n2b61DyZYbRgW', 'Admin1', 'Chand', '4587965785', '2021-05-12 10:23:31', '2021-05-12 11:06:18', 0, 'inactive'),
(12, 'admin2@gmail.com', '$2y$10$2IJ4PVM6H2HzUuDe5.kZyezHCFiggIXk0d0JeKWyqYwGd7K6rOsja', 'Admin2', 'aaaa', '4563217895', '2021-05-12 11:23:47', '2021-05-12 11:24:09', 0, 'active'),
(13, 'lala1@gmail.com', '$2y$10$oS40IDGrK8SzaxKH7LhuSudV3M.Iw7pGEs3mVYsPvcgW46Xj10Y4O', 'Lala1', 'Chandni', '4569863254', '2021-05-12 11:32:51', '2021-05-13 23:13:46', 12, 'active'),
(14, 'kala1@gmail.com', '$2y$10$ql1pmaYkPrv6toJvg9q0juPvVwD0KjnI3AVpKXUP0zOxxasmVSy0G', 'Kala1', 'Ghantoli', '4589657125', '2021-05-12 16:20:38', '2021-05-12 16:21:03', 13, 'active'),
(15, 'seetadevi1@gmail.com', '$2y$10$XEccBxFpjOwDxWdTWqZti.uH9zWfJNKUck8kHl.2l7zAFztVAr/RW', 'Seeta Devi1', 'Gaaaaaa', '4587965896', '2021-05-12 16:31:40', '2021-05-12 16:32:03', 14, 'active'),
(16, 'lala2@gmail.com', '$2y$10$ZzFPlihSr95IQUwBy7/6..SYdaf3qnLDrOrTQnC7vl3mirusaKysu', 'Lala2', 'chand', '9286423874', '2021-05-12 10:34:19', '2021-05-12 10:34:44', 12, 'active'),
(17, 'gauri1@gmail.com', '$2y$10$UG/o/RHR.4TphdhckZE1Ze8EXqwSyjkuRos7zmIz/o0Ha6ivRjGJa', 'Gauri1', 'Lali', '4578987456', '2021-05-13 23:08:32', '2021-05-13 23:08:54', 33, 'active'),
(19, 'kaka1@gmail.com', '$2y$10$S0QyYzS2LQfyU3lXhPRECekSm9FNnA.rA/Y3.DbVzDN1Uz29pVb.a', 'Kaka1', 'Chand', '4756987452', '2021-05-13 23:33:09', '2021-05-13 23:39:01', 34, 'active'),
(20, 'titu1@gmail.com', '$2y$10$aESZwuDuc5gg14hODvSXwOvt/TRgs9PrW3qgqt5/2pT2SHbFonh4S', 'Titu1', 'Ghantoli', '4587456987', '2021-05-15 22:04:11', '2021-05-15 22:06:02', 35, 'active'),
(21, 'lily1@gmail.com', '$2y$10$XVkBF8rlQFhfnofBzGggiegYOBu72flh4tWrm3/9ACEfS7SD7TYAm', 'Lily1', 'Sharma', '4578987454', '2021-05-15 23:16:44', '2021-05-15 23:18:22', 36, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `id` int(100) NOT NULL,
  `orgname` varchar(200) NOT NULL,
  `orgemail` varchar(150) NOT NULL,
  `orgpassword` varchar(255) NOT NULL,
  `orgphoneno` varchar(10) NOT NULL,
  `orgaddress` varchar(300) NOT NULL,
  `orgtype` varchar(50) NOT NULL,
  `orgcity` text NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`id`, `orgname`, `orgemail`, `orgpassword`, `orgphoneno`, `orgaddress`, `orgtype`, `orgcity`, `status`, `created_at`, `updated_at`) VALUES
(0, 'Admin', 'admin@gmail.com', '$2y$10$KHe64ULFy0tS3C8Y6BQHju16B3azJ2IsUgJSceA6mEgHt4jjUWsf2', '7896541236', 'Khandari', 'Admin', 'Agra', 'active', '2021-05-12 10:20:43', '2021-05-12 10:22:18'),
(12, 'Lala Hospital', 'lala@gmail.com', '$2y$10$uW40AOnOb6epK.d6fY0Lh.8ISDOwkM6ieoq5BFt3W7trGoAe0MQ3W', '4569877562', 'Khandari', 'Hospital', 'Agra', 'active', '2021-05-12 10:27:15', '2021-05-12 11:31:36'),
(13, 'Kala Hospital', 'kala@gmail.com', '$2y$10$ZQ.1hkpfEGrAmiStSMX5pOp7t/M2H5KZUViuwH6bC.RPkV4gRJcY2', '4569874512', 'Khandari', 'Hospital', 'Agra', 'active', '2021-05-12 16:15:39', '2021-05-12 16:19:59'),
(14, 'Seeta Devi Pharmacy', 'seetadevi@gmail.com', '$2y$10$WrFZjVxN0WuxRnS1h1LjVOi9JL.1.3Td4itociU/9eU2I9hsXJXGK', '7845963214', 'Khandari', 'Pharmacy', 'Agra', 'active', '2021-05-12 16:29:42', '2021-05-12 16:29:53'),
(33, 'Gauri Hospital', 'gauri@gmail.com', '$2y$10$.t2SxFAUYRZ9XZx4GmflOu7p8Jg2RnJKgEi6AvC1Q9qskNpH.tbHO', '7896541239', 'Khandari', 'Hospital', 'Agra', 'active', '2021-05-13 23:06:43', '2021-05-13 23:08:13'),
(34, 'Kaka', 'kaka@gmail.com', '$2y$10$kYot5IJTU.t7W7cSxVfhxu5Rns.KXNO/E4l3H/iSNADbHRQ9cqBju', '4125897457', 'Khandari', 'Hospital', 'Agra', 'active', '2021-05-13 23:31:17', '2021-05-13 23:32:44'),
(35, 'Titu Hospital', 'titu@gmail.com', '', '4587456987', 'Khandari', 'Hospital', 'Agra', 'active', '2021-05-15 22:03:02', '2021-05-15 22:03:36'),
(36, 'Lily', 'lily@gmail.com', '', '4587985641', 'Khandari', 'Hospital', 'Agra', 'active', '2021-05-15 23:15:10', '2021-05-15 23:16:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `checklist`
--
ALTER TABLE `checklist`
  ADD UNIQUE KEY `checkbox` (`checkbox`);

--
-- Indexes for table `log_table`
--
ALTER TABLE `log_table`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `resource_id` (`resource_id`),
  ADD KEY `vendor_id` (`vendor_id`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`resource_id`),
  ADD KEY `vendor_id` (`vendor_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendor_id` (`vendor_id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orgemail` (`orgemail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log_table`
--
ALTER TABLE `log_table`
  MODIFY `log_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `resource_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `log_table`
--
ALTER TABLE `log_table`
  ADD CONSTRAINT `log_table_ibfk_1` FOREIGN KEY (`resource_id`) REFERENCES `resources` (`resource_id`),
  ADD CONSTRAINT `log_table_ibfk_2` FOREIGN KEY (`vendor_id`) REFERENCES `vendor` (`id`),
  ADD CONSTRAINT `log_table_ibfk_3` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `resources`
--
ALTER TABLE `resources`
  ADD CONSTRAINT `resources_ibfk_1` FOREIGN KEY (`vendor_id`) REFERENCES `vendor` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`vendor_id`) REFERENCES `vendor` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
