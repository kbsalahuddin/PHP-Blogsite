-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2019 at 04:12 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(3) NOT NULL,
  `cat_id` int(3) NOT NULL,
  `blg_title` varchar(255) NOT NULL,
  `st_des` text NOT NULL,
  `lg_des` text NOT NULL,
  `blog_image` text NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `cat_id`, `blg_title`, `st_des`, `lg_des`, `blog_image`, `status`) VALUES
(9, 19, 'New Politics-Liberal Talkheads', 'New Way for Progressives', '<p>New Way for Progressives. New Way for Progressives. New Way for Progressives.</p>', '../assets/images/politics.jpg', 'published'),
(10, 22, 'Man first steps on the moon', 'N. Armstrong became the 1st person', '<p><span style="font-family: verdana, geneva, sans-serif; font-size: 10pt; color: #000000;"><span style="text-align: start; background-color: #ffffff;">After the unsuccessful attempt by the Luna 1</span><span style="text-align: start; background-color: #ffffff;"> to land on the Moon in 1959, the Soviet Union</span><span style="text-align: start; background-color: #ffffff;"> performed the first hard (unpowered) Moon landing later that same year with the Luna 2</span><span style="text-align: start; background-color: #ffffff;"> spacecraft, a feat the U.S. duplicated in 1962 with Ranger 4</span><span style="text-align: start; background-color: #ffffff;">. Since then, twelve Soviet and U.S. spacecraft have used braking rockets to make soft landings</span><span style="text-align: start; background-color: #ffffff;"> and perform scientific operations on the lunar surface, between 1966 and 1976. In 1966 the USSR accomplished the first soft landings and took the first pictures from the lunar surface during the Luna 9</span><span style="text-align: start; background-color: #ffffff;"> and Luna 13</span><span style="text-align: start; background-color: #ffffff;"> missions. The U.S. followed with five uncrewed surveyors </span><span style="text-align: start; background-color: #ffffff;">soft landings.</span></span></p>', '../assets/images/apollo.jpg', 'published');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(3) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_description` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_description`, `status`) VALUES
(19, 'Politics', 'Politics', 'published'),
(20, 'Weather', 'Weather news', 'published'),
(22, 'Education', 'Educational Blogs', 'published');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(3) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'Mark Fisher', 'fisher.mark@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
