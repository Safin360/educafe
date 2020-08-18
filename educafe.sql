-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2020 at 07:51 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `educafe`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 1,
  `image` varchar(191) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `phone`, `password`, `status`, `image`, `created_at`, `update_at`) VALUES
(1, 'Sahab Uddin', 'sahabuddinriyaj984@gmail.com', '01867033550', 'e10adc3949ba59abbe56e057f20f883e', 1, 'uploads/admin/Capture.PNG', '2020-08-05 09:51:01', '2020-08-05 09:51:01');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(10) NOT NULL,
  `name` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `course_duration` varchar(5) NOT NULL,
  `class_duration` varchar(2) NOT NULL,
  `seat_available` varchar(100) NOT NULL,
  `class_size` varchar(100) NOT NULL,
  `course_price` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `short_description` varchar(100) NOT NULL,
  `long_description` varchar(10000) NOT NULL,
  `t_id` int(5) NOT NULL,
  `status` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `name`, `date`, `course_duration`, `class_duration`, `seat_available`, `class_size`, `course_price`, `image`, `short_description`, `long_description`, `t_id`, `status`, `created_at`) VALUES
(2, 'biology', '2020-08-28', '90', '3', '20', '59', '150', 'uploads/course/Capture.PNG', 'it\'s a hard course', '<p>All student shouls learn their courses carefully.</p>\r\n', 4, '1', '2020-08-11 06:06:58'),
(3, 'shafins', '2020-08-12', '5', '1', '12', '12', '12k', 'uploads/course/Capture3.PNG', 'fasdfds', '<p>adhfsdhfdhdhad</p>\r\n\r\n<p>dghadfghafg</p>\r\n\r\n<p>fga;gfhdsfgj</p>\r\n', 1, '1', '2020-08-11 06:06:51');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `h_title` varchar(191) DEFAULT NULL,
  `p_title` varchar(191) DEFAULT NULL,
  `f_b_link` varchar(191) DEFAULT NULL,
  `l_b_link` varchar(191) DEFAULT NULL,
  `image` varchar(191) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `h_title`, `p_title`, `f_b_link`, `l_b_link`, `image`, `status`, `created_at`) VALUES
(1, 'Educafe', 'lorem20', 'http://satech360.ebookstand.net', '#', 'uploads/slider/cnFQR6bkMPkULdGQkKMyhL3A3yW0ZhyIdGVDuAFU.jpeg', 1, '2020-08-06 11:10:19'),
(4, 'Educafe 2', 'lorem20', 'http://satech360.ebookstand.net', '#', 'uploads/slider/czs1ZRVkV2UnpHW7l13CFxsUU3gZnPtjwvOVDTji.jpeg', 1, '2020-08-10 09:57:00'),
(5, 'Educafe 3', 'lorem20', 'http://satech360.ebookstand.net', '#', 'uploads/slider/slide_1.png', 0, '2020-08-10 09:58:19');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `designation` varchar(191) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` int(2) DEFAULT NULL,
  `religion` varchar(191) DEFAULT NULL,
  `e_qualification` varchar(191) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `f_link` varchar(191) DEFAULT NULL,
  `t_link` varchar(191) DEFAULT NULL,
  `g_link` varchar(191) DEFAULT NULL,
  `i_link` varchar(191) DEFAULT NULL,
  `l_link` varchar(191) DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `long_description` longtext DEFAULT NULL,
  `joining_date` date DEFAULT NULL,
  `resign_date` date DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `is_delete` int(2) DEFAULT NULL,
  `image` varchar(191) DEFAULT NULL,
  `password` varchar(191) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `email`, `phone`, `designation`, `dob`, `gender`, `religion`, `e_qualification`, `address`, `f_link`, `t_link`, `g_link`, `i_link`, `l_link`, `short_description`, `long_description`, `joining_date`, `resign_date`, `status`, `is_delete`, `image`, `password`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'shafins', 'motaleb@gmail.com', '+880', 'instructor', '2020-08-11', 1, '1', '4', 'asdasds', 'https://bd.linkedin.com/', 'https://bd.linkedin.com/', 'https://bd.linkedin.com/', 'https://bd.linkedin.com/', 'https://bd.linkedin.com/', 'fasdfds', 'sdasd', '2020-08-09', NULL, 1, NULL, 'uploads/teachers/Capture.PNG', '123456', '2020-08-11 17:42:41', '2020-08-11 17:42:41', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
