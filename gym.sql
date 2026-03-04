-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2026 at 12:44 PM
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
-- Database: `gum`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'jad', '$2y$10$UVQG3UMSpfzEct67.U/RL.pB6b9s29W93PsURfOzRzTHvITPhGajW', '2026-02-08 09:45:34');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `member_name` varchar(255) DEFAULT NULL,
  `subscribed_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `member_name`, `subscribed_date`) VALUES
(46, 'John Smith', '2026-01-05'),
(47, 'Michael Johnson', '2026-01-07'),
(48, 'David Williams', '2026-01-10'),
(49, 'James Brown', '2026-01-12'),
(50, 'Robert Jones', '2026-01-15'),
(51, 'William Garcia', '2026-01-18'),
(52, 'Richard Miller', '2026-01-20'),
(53, 'Thomas Davis', '2026-01-22'),
(54, 'Christopher Wilson', '2026-01-25'),
(55, 'Daniel Anderson', '2026-01-27'),
(56, 'Matthew Taylor', '2026-02-01'),
(57, 'Anthony Moore', '2026-02-02'),
(58, 'Mark Jackson', '2026-02-03'),
(59, 'Donald Martin', '2026-02-04'),
(60, 'Steven Lee', '2026-02-05'),
(61, 'Paul Perez', '2026-02-06'),
(62, 'Andrew Thompson', '2026-02-07'),
(63, 'Joshua White', '2026-02-08'),
(64, 'Kevin Harris', '2026-02-09'),
(65, 'Brian Clark', '2026-02-10'),
(66, 'George Lewis', '2026-02-11'),
(67, 'Edward Walker', '2026-02-12'),
(68, 'Ronald Hall', '2026-02-13'),
(69, 'Timothy Allen', '2026-02-14'),
(70, 'Jason Young', '2026-02-15'),
(71, 'Jeffrey King', '2026-02-16'),
(72, 'Ryan Wright', '2026-02-17');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trainers`
--

CREATE TABLE `trainers` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `years of experience` int(30) NOT NULL,
  `program` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trainers`
--

INSERT INTO `trainers` (`id`, `name`, `years of experience`, `program`) VALUES
(44, 'John Smith', 5, 'Muscle Gain'),
(45, 'Emma Johnson', 3, 'Yoga Basics'),
(46, 'Michael Brown', 7, 'Weight Loss'),
(47, 'Sophia Davis', 4, 'Pilates Core'),
(48, 'David Wilson', 6, 'HIIT Challenge'),
(49, 'Olivia Martinez', 2, 'Beginner Fitness'),
(50, 'Daniel Taylor', 8, 'Strength Training');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainers`
--
ALTER TABLE `trainers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `trainers`
--
ALTER TABLE `trainers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
