-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2021 at 06:30 PM
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
-- Database: `ptubuddy`
--

-- --------------------------------------------------------

--
-- Table structure for table `buddy_admin`
--

CREATE TABLE `buddy_admin` (
  `admin_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buddy_admin`
--

INSERT INTO `buddy_admin` (`admin_id`, `fname`, `lname`, `admin_email`, `admin_password`) VALUES
(1, 'gaurav', 'sharma', 'sharmag8121@gmail.com', '25f9e794323b453885f5181f1b624d0b');

-- --------------------------------------------------------

--
-- Table structure for table `buddy_email_verifi`
--

CREATE TABLE `buddy_email_verifi` (
  `verifi_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `uni_roll` int(11) NOT NULL,
  `emailToken` bigint(20) NOT NULL,
  `emailSelector` varchar(255) NOT NULL,
  `emailTokentime` bigint(20) NOT NULL,
  `verification_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buddy_email_verifi`
--

INSERT INTO `buddy_email_verifi` (`verifi_id`, `email`, `uni_roll`, `emailToken`, `emailSelector`, `emailTokentime`, `verification_status`) VALUES
(1, 'sharmag8121@gmail.com', 1902060, 0, '100ce0d6b1413499', 1637608666, 1);

-- --------------------------------------------------------

--
-- Table structure for table `buddy_quote`
--

CREATE TABLE `buddy_quote` (
  `quote` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buddy_quote`
--

INSERT INTO `buddy_quote` (`quote`) VALUES
('Enjoy The Process');

-- --------------------------------------------------------

--
-- Table structure for table `buddy_teachers`
--

CREATE TABLE `buddy_teachers` (
  `teacher_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phoneNumber` varchar(15) NOT NULL,
  `Tpassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buddy_teachers`
--

INSERT INTO `buddy_teachers` (`teacher_id`, `fname`, `lname`, `email`, `phoneNumber`, `Tpassword`) VALUES
(1, 'gaurav', 'sharma', 'sharmag8121@gmail.com', '9882884643', '$2y$10$K4Xs4t/hAqMuDUaun1I8ouPurvPHZP.YlbQImNFFhDdmpcfMPAnpC');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment_by` int(11) NOT NULL,
  `comment_on` int(11) NOT NULL,
  `comment_body` varchar(255) NOT NULL,
  `comment_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_by`, `comment_on`, `comment_body`, `comment_at`) VALUES
(2, 1, 2, 'greater post buddy', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `like_by` int(11) NOT NULL,
  `likeCount` int(11) NOT NULL,
  `like_on` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`like_by`, `likeCount`, `like_on`) VALUES
(1, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `posted_by` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `body` varchar(255) NOT NULL,
  `posted_on` datetime NOT NULL,
  `likeCount` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `posted_by`, `name`, `body`, `posted_on`, `likeCount`) VALUES
(2, 1, 'Admin', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi laoreet, erat at viverra mollis, urna ante interdum diam, eu condimentum augue lectus eu purus. Vivamus quis sapien et tellus eleifend mollis. Pellentesque ullamcorper sodales rutrum. In non l', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `user_id` int(11) NOT NULL,
  `register_date` datetime NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `college` varchar(10) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `section` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `uni_roll` int(11) NOT NULL,
  `sem` int(11) NOT NULL,
  `user_phone` varchar(10) NOT NULL,
  `profile_image` varchar(255) NOT NULL DEFAULT 'assets\\images\\dp.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`user_id`, `register_date`, `fname`, `lname`, `college`, `branch`, `section`, `email`, `user_password`, `uni_roll`, `sem`, `user_phone`, `profile_image`) VALUES
(1, '2021-11-23 12:17:46', 'gaurav', 'sharma', 'cec', 'cse', 'b1', 'sharmag8121@gmail.com', '$2y$10$DGuvLfDkPbIeVCOzvUNfWuRQkS/EWANmZOoNnAuQhN4VbFFSxI21m', 1902060, 5, '2147483647', 'assets\\images\\dp.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buddy_admin`
--
ALTER TABLE `buddy_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `buddy_email_verifi`
--
ALTER TABLE `buddy_email_verifi`
  ADD PRIMARY KEY (`verifi_id`);

--
-- Indexes for table `buddy_teachers`
--
ALTER TABLE `buddy_teachers`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buddy_admin`
--
ALTER TABLE `buddy_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `buddy_email_verifi`
--
ALTER TABLE `buddy_email_verifi`
  MODIFY `verifi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `buddy_teachers`
--
ALTER TABLE `buddy_teachers`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
