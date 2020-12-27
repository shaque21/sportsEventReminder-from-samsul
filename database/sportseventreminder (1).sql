-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2020 at 03:58 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sportseventreminder`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `username`, `password`, `photo`, `date`, `role`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin01', 'admin1', 'admin01.jpg', '2020-12-15 12:33:01', 1),
(3, 'Samsul Haque', 'samsul@gmail.com', 'Hsamsul', 'samsul', 'Hsamsul.2018-03-24-18-27-58-880.jpg', '2020-12-15 14:10:08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `approved_team`
--

CREATE TABLE `approved_team` (
  `id` int(11) NOT NULL,
  `team_name` varchar(50) NOT NULL,
  `college_name` varchar(255) NOT NULL,
  `captain_name` varchar(30) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `category` varchar(30) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `approved_team`
--

INSERT INTO `approved_team` (`id`, `team_name`, `college_name`, `captain_name`, `mobile`, `category`, `date`) VALUES
(10, 'Janina', 'Tejgaon College', 'Osama Sharif', '01677102422', '14', '2020-12-24 20:57:41'),
(13, 'test', 'Tejgaon College', 'Samsul Haquedd', '01687546952', '14', '2020-12-24 22:14:17'),
(16, 'Dhaka Dynamites', 'Tejgaon College', 'Samsul Haque', '01627309821', '14', '2020-12-24 22:41:56'),
(17, 'Dhaka Dynamites', 'BM College', 'Hanin Tahsin', '01724945272', '18', '2020-12-26 20:02:03'),
(18, 'Dhaka Dynamites', 'BM College', 'Hanin Tahsin', '01724945272', '17', '2020-12-26 20:03:53');

-- --------------------------------------------------------

--
-- Table structure for table `badminton`
--

CREATE TABLE `badminton` (
  `id` int(255) UNSIGNED NOT NULL,
  `team_name` varchar(255) DEFAULT NULL,
  `college_name` varchar(255) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `captain_name` varchar(50) DEFAULT NULL,
  `player_1` varchar(50) DEFAULT NULL,
  `date` datetime DEFAULT current_timestamp(),
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `badminton`
--

INSERT INTO `badminton` (`id`, `team_name`, `college_name`, `mobile`, `captain_name`, `player_1`, `date`, `status`) VALUES
(1, 'test', 'Tejgaon College', '01687546952', 'Samsul Haquedd', 'ggg', '2020-12-19 00:38:13', 1),
(2, 'Janina', 'Tejgaon College', '01677102422', 'Osama Sharif', 'Samsul', '2020-12-19 00:40:40', 1),
(4, 'Dhaka Platoon', 'Tejgaon College', '01724945272', 'Samsul Haque', 'Osama Sharif', '2020-12-24 17:04:13', 0),
(5, 'Barisailla Monu', 'BM College', '01677102422', 'Samsul Haque', 'Osama Sharif', '2020-12-24 17:21:53', 0),
(6, 'Dhaka Dynamites', 'Tejgaon College', '01627309821', 'Samsul Haque', 'Shamim Molla', '2020-12-24 22:41:28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `category` varchar(60) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(14, 'Badminton'),
(17, 'Football'),
(18, 'Cricket');

-- --------------------------------------------------------

--
-- Table structure for table `contact_info`
--

CREATE TABLE `contact_info` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_info`
--

INSERT INTO `contact_info` (`id`, `name`, `mobile`, `email`, `message`) VALUES
(1, 'fake', '234567894', 'samsul@gmail.com', 'sagdg'),
(2, 'Samsul Haque', '01627309821', 'hshamsul894@gmail.com', 'I am a Developer.'),
(3, 'Hanin Tahsin', '01724945272', 'hanin@gmail.com', 'Kaj kore na'),
(4, 'fake', '234567894', 's@gmail.com', 'agsagsg'),
(5, 'fake', '234567894', 'secupussy-6092@yopmail.com', 'agsagsag');

-- --------------------------------------------------------

--
-- Table structure for table `cricket`
--

CREATE TABLE `cricket` (
  `id` int(255) UNSIGNED NOT NULL,
  `team_name` varchar(255) DEFAULT NULL,
  `college_name` varchar(255) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `captain_name` varchar(50) DEFAULT NULL,
  `player_1` varchar(50) DEFAULT NULL,
  `player_2` varchar(50) DEFAULT NULL,
  `player_3` varchar(50) DEFAULT NULL,
  `player_4` varchar(50) DEFAULT NULL,
  `player_5` varchar(50) DEFAULT NULL,
  `player_6` varchar(50) DEFAULT NULL,
  `player_7` varchar(50) DEFAULT NULL,
  `player_8` varchar(50) DEFAULT NULL,
  `player_9` varchar(50) DEFAULT NULL,
  `player_10` varchar(50) DEFAULT NULL,
  `date` datetime DEFAULT current_timestamp(),
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cricket`
--

INSERT INTO `cricket` (`id`, `team_name`, `college_name`, `mobile`, `captain_name`, `player_1`, `player_2`, `player_3`, `player_4`, `player_5`, `player_6`, `player_7`, `player_8`, `player_9`, `player_10`, `date`, `status`) VALUES
(1, 'Dhaka Dynamites', 'BM College', '01724945272', 'Hanin Tahsin', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', '2020-12-26 20:01:42', 1);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` int(11) NOT NULL,
  `event_title` varchar(255) NOT NULL,
  `category` int(11) NOT NULL,
  `starting_date` datetime NOT NULL DEFAULT current_timestamp(),
  `ending_date` date NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `event_title`, `category`, `starting_date`, `ending_date`, `description`, `image`) VALUES
(1, 'This is Badminton Event', 14, '2020-12-17 21:43:39', '2020-12-22', 'It\'s just for testing purpose.t is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like', 'This is Badminton Event.download (2).jpg'),
(7, 'This is Cricket Event', 18, '2020-12-24 23:41:52', '2020-12-31', 'This is Cricket Event. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, ', 'This is Cricket Event.cricket-724614_1920.jpg'),
(8, 'This is Football Event', 17, '2020-12-24 23:44:21', '2020-12-30', 'This is Football Event. but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'This is Football Event.football-3471402_1920.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `football`
--

CREATE TABLE `football` (
  `id` int(255) UNSIGNED NOT NULL,
  `team_name` varchar(255) DEFAULT NULL,
  `college_name` varchar(255) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `captain_name` varchar(50) DEFAULT NULL,
  `player_1` varchar(50) DEFAULT NULL,
  `player_2` varchar(50) DEFAULT NULL,
  `player_3` varchar(50) DEFAULT NULL,
  `player_4` varchar(50) DEFAULT NULL,
  `player_5` varchar(50) DEFAULT NULL,
  `player_6` varchar(50) DEFAULT NULL,
  `player_7` varchar(50) DEFAULT NULL,
  `player_8` varchar(50) DEFAULT NULL,
  `player_9` varchar(50) DEFAULT NULL,
  `player_10` varchar(50) DEFAULT NULL,
  `date` datetime DEFAULT current_timestamp(),
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `football`
--

INSERT INTO `football` (`id`, `team_name`, `college_name`, `mobile`, `captain_name`, `player_1`, `player_2`, `player_3`, `player_4`, `player_5`, `player_6`, `player_7`, `player_8`, `player_9`, `player_10`, `date`, `status`) VALUES
(1, 'Dhaka Dynamites', 'BM College', '01724945272', 'Hanin Tahsin', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', '2020-12-26 20:03:24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `notice_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`notice_id`, `title`, `description`, `user_email`, `date`) VALUES
(1, 'First Test', 'It\'s just for testing purpose.(First Test)', 'samsul@gmail.com', '2020-12-21 23:53:38'),
(3, 'Cancelled', 'Due to some reason today\'s match is postponed', 'samsul@gmail.com', '2020-12-26 16:52:07'),
(4, 'New Notice For Check mail', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Let', 'rosehappy272@gmail.com', '2020-12-26 19:30:52'),
(5, 'Apu New Notice For Check mail', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Let', 'rosehappy272@gmail.com', '2020-12-26 19:42:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `image` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `mobile`, `email`, `password`, `gender`, `image`, `dob`, `date`, `role`) VALUES
(2, 'Samsul Haque', '01627309821', 'samsul@gmail.com', '12345', 'Male', 'Samsul Haque.jpg', '1995-12-16', '2020-12-15 16:36:59', 0),
(3, 'test', '01687546952', 'hshamsul894@gmail.com', '1234', 'male', '95392781_651196009055976_5451690486613934080_n.jpg', '2020-12-03', '2020-12-15 16:36:59', 0),
(4, 'Happy Rose', '01724945285', 'rosehappy272@gmail.com', '12345', 'female', 'images.jpg', '1995-01-01', '2020-12-26 19:29:28', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `approved_team`
--
ALTER TABLE `approved_team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `badminton`
--
ALTER TABLE `badminton`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_name` (`team_name`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `contact_info`
--
ALTER TABLE `contact_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cricket`
--
ALTER TABLE `cricket`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_name` (`team_name`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `football`
--
ALTER TABLE `football`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_name` (`team_name`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`notice_id`);

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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `approved_team`
--
ALTER TABLE `approved_team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `badminton`
--
ALTER TABLE `badminton`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `contact_info`
--
ALTER TABLE `contact_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cricket`
--
ALTER TABLE `cricket`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `football`
--
ALTER TABLE `football`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `notice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
