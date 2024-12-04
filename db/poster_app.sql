-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2024 at 08:04 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `poster_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `f_name` varchar(225) NOT NULL,
  `l_name` varchar(225) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `role` varchar(100) NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `f_name`, `l_name`, `mobile`, `email`, `password`, `role`, `profile_pic`, `created_at`, `status`) VALUES
(1, 'vijuuu', 'salve ', '9168585280', 'vijaysalve8080@gmail.com', '$2a$04$upzlrxY9/M9yIjdoiYCBp.kFZH4YSX7CUwLEw1nzvjJaI6qDmw6Ue', 'admin', 'ce86c50551201cda48210cfc35e6fde1.jpg', '2023-09-03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `business_data`
--

CREATE TABLE `business_data` (
  `id` int(11) DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `address` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `business_data`
--

INSERT INTO `business_data` (`id`, `name`, `email`, `mobile`, `address`) VALUES
(NULL, 'Codepallet asdf', 'vijaysalve8080@gmail.com', '9168585280', 'Plat no. 168 gandhi nagar chitegaon Aurangabad'),
(NULL, 'Codepallet asdf', 'vijaysalve8080@gmail.com', '9168585280', 'Plat no. 168 gandhi nagar chitegaon Aurangabad'),
(NULL, 'Codepallet asdf', 'vijaysalve8080@gmail.com', '9168585280', 'Plat no. 168 gandhi nagar chitegaon Aurangabad'),
(NULL, 'Codepallet asdf', 'vijaysalve8080@gmail.com', '9168585280', 'Plat no. 168 gandhi nagar chitegaon Aurangabad'),
(NULL, 'Codepallet asdf', 'vijaysalve8080@gmail.com', '9168585280', 'Plat no. 168 gandhi nagar chitegaon Aurangabad'),
(NULL, 'Codepallet asdf', 'vijaysalve8080@gmail.com', '9168585280', 'Plat no. 168 gandhi nagar chitegaon Aurangabad'),
(NULL, 'Codepallet asdf', 'vijaysalve8080@gmail.com', '9168585280', 'Plat no. 168 gandhi nagar chitegaon Aurangabad'),
(NULL, 'Codepallet asdf', 'vijaysalve8080@gmail.com', '9168585280', 'Plat no. 168 gandhi nagar chitegaon Aurangabad'),
(NULL, 'Codepallet asdf', 'vijaysalve8080@gmail.com', '9168585280', 'Plat no. 168 gandhi nagar chitegaon Aurangabad'),
(NULL, 'Codepallet asdf', 'vijaysalve8080@gmail.com', '9168585280', 'Plat no. 168 gandhi nagar chitegaon Aurangabad'),
(NULL, 'Codepallet asdf', 'vijaysalve8080@gmail.com', '9168585280', 'Plat no. 168 gandhi nagar chitegaon Aurangabad'),
(NULL, 'Codepallet asdf', 'vijaysalve8080@gmail.com', '9168585280', 'Plat no. 168 gandhi nagar chitegaon Aurangabad'),
(NULL, 'Codepallet asdf', 'vijaysalve8080@gmail.com', '9168585280', 'Plat no. 168 gandhi nagar chitegaon Aurangabad'),
(NULL, 'Codepallet asdf', 'vijaysalve8080@gmail.com', '9168585280', 'Plat no. 168 gandhi nagar chitegaon Aurangabad'),
(NULL, 'Codepallet asdf', 'vijaysalve8080@gmail.com', '9168585280', 'Plat no. 168 gandhi nagar chitegaon Aurangabad'),
(NULL, 'Codepallet asdf', 'vijaysalve8080@gmail.com', '9168585280', 'Plat no. 168 gandhi nagar chitegaon Aurangabad');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(191) DEFAULT NULL,
  `b_name` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `address` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `b_name`, `email`, `mobile`, `address`) VALUES
(1, 'vijay salve', 'Codepallet as', 'vijaysalve8080@gmail.com', '9168585280', 'Plat no. 168 gandhi nagar chitegaon Aurangabad pincode -431105');

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE `templates` (
  `id` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `category` varchar(225) NOT NULL,
  `template_img` varchar(255) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`id`, `title`, `category`, `template_img`, `create_at`, `status`) VALUES
(1, 'asfsdf', 'Offerc\'s', 'ccf3b0e99e3370c3bdd7446f8f983af4.png', '2023-09-02 17:36:19', 0),
(2, 'only text- template ', 'Birthday Wish', '30757591.jpg', '2023-09-02 17:40:21', 0),
(3, 'asdfsdf asdf sdafdsd asdf ', 'Offerc\'s', '6844076-removebg-preview.png', '2023-09-02 17:42:43', 0),
(4, 'asdf', 'Festival', '30757592.jpg', '2023-09-02 17:43:06', 0),
(5, 'template ', 'Birthday Wish', 'f6a994fafc9a92501a557f41fde37436.jpg', '2023-09-02 17:43:56', 0),
(6, 'sdf', 'Festival', '62da18beaf2830f3dd507da4e6c38e0b.jpg', '2023-09-02 17:55:31', 0),
(7, 'asdf hhh', 'Festival', '6780ae83a8b6a7b80436ba148501940d.png', '2023-09-02 18:10:33', 0),
(8, 'onam festiwal', 'Birthday Wish', '7.png', '2023-09-02 18:11:24', 1),
(9, 'asd', 'Festival', '6480a966377c9f9cb7b86d2cdcf1e4df.jpg', '2023-09-02 18:12:04', 0),
(10, 'HAppy Diwali', 'Festival', '6.png', '2023-09-02 18:58:20', 1),
(11, 'janmastami', 'Festival', '5.png', '2023-09-02 20:14:19', 1),
(12, 'sankranti jj', 'Festival', '4.png', '2023-09-03 07:32:36', 1),
(13, 'janmashtami', 'Festival', '3.png', '2023-09-03 07:34:45', 1),
(14, 'janmashtami', 'Festival', '2.png', '2023-09-03 07:37:28', 1),
(15, 'ganesh chaturthi', 'Festival', 'ce11a8b698bba6429dfe8fa70093f3dd.png', '2023-09-03 12:25:18', 1),
(16, 'test', 'Birthday Wish', '2b4b13c91762e7d9d3595d3037a2ad36.png', '2023-09-10 05:27:44', 1),
(17, 'ttttt', 'Festival', '02751e88bd16302cc5fd13c86bf734fa.png', '2023-09-10 07:20:39', 1),
(18, 'template ', 'Festival', 'd92ee1ff5d8031244e0319e034f83b19.png', '2023-09-10 08:08:06', 0),
(19, 'testing festival', 'Festival', '669630f52a5a7b119577c58720afe37d.png', '2023-09-11 17:38:01', 1),
(20, 'asdfsdf', 'Birthday Wish', 'e2979fa2b9f018e627fd9a7b0d29f04f.jpg', '2023-09-23 15:29:07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_auth`
--

CREATE TABLE `user_auth` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `mobile_no` varchar(225) NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `json_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`json_data`)),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_auth`
--

INSERT INTO `user_auth` (`id`, `name`, `mobile_no`, `profile_pic`, `email`, `password`, `json_data`, `created_at`, `user_status`) VALUES
(15, 'vijay salve', '9168585280', '', 'vijaysalve8080@gmail.com', '$2y$10$9GgSH/lZINppTEcTKZTdZ.k/6IKHRk4/AnJFxKEPvEL7NWb5nBV7O', NULL, '2023-09-23 20:40:34', 0),
(16, 'sadf', '', '', 'vijaysalve8080ssss@gmail.com', '$2y$10$jLYiN/wuvKfN0A1tnbC77ux9IFv/r.Sc0PLpQzIotnIpFbzZ4Gc0C', NULL, '2023-09-24 12:40:34', 0),
(17, 'asdf', '', '', 'vijaysalve8080ssdd@gmail.com', '$2y$10$hXKP5Lr5gUhSSJ81.o574.YLaU2cIs/3LPo5Y59Ig60C8ENt48Oqy', NULL, '2023-09-24 12:58:29', 0),
(18, 'asdf', '', '', 'vijaysalvasdfe8080@gmail.com', '$2y$10$LBfXh.KqLrncyiUgCMJkCOvX50xzOOXONff99yEFlG2ruEpgH7EIi', NULL, '2023-09-24 13:01:49', 0),
(19, 'afsdf', '', '', 'vijayddddsalve8080@gmail.com', '$2y$10$02uGh1yIRyrVtyrt1pZyt.UwGAlUHesPGtSMCSbfeFQULJvjIhv3m', NULL, '2023-09-24 13:02:58', 0),
(20, 'asdf', '', '', 'vijaysalve8080dddd@gmail.com', '$2y$10$an2HZpPVUFlr6jrX7J68j.GVyijp5LW95lV.aIrW3dPy7bVjdevHi', NULL, '2023-09-24 13:03:38', 0),
(21, 'asdfs', '', '', 'vijaysalve8080@dddgmail.com', '$2y$10$wtMkZcDqvu8J1WwI7iAbHOYn0o/GcO7r/0HTBsu8A0khHGqJAsQw.', NULL, '2023-09-24 13:04:21', 0),
(22, 'asdf', '', '', 'vijaysalve8080dd@gmail.com', '$2y$10$2SatwacRmTdmPnBVpFvk4uwMov67OP8fJoPdIWQyZXpqyPbdRg4IW', NULL, '2023-09-24 13:47:02', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `templates`
--
ALTER TABLE `templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_auth`
--
ALTER TABLE `user_auth`
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
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `templates`
--
ALTER TABLE `templates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user_auth`
--
ALTER TABLE `user_auth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
