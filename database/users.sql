-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2017 at 10:57 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users`
--
CREATE DATABASE IF NOT EXISTS `users` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `users`;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(4) NOT NULL,
  `nickname` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `nickname`, `password`) VALUES
(1, 'batman', '$2y$11$MQABnVcYlJhLet7zOroHNebeigC8jZ.NrhCQBbTeQDyscx8FoUMhy'),
(2, 'spiderman', '$2y$11$fhbY7d1VSzkVqs6hT8CII.cnMjf13bka5owUvOMsjGtGbOGhk9SOq'),
(3, 'superman', '$2y$11$oBW12YUDFobJqTZTabZqIeMhfK78Jy1v5JMIFY/WHzQqJZA9MrR6.'),
(4, 'ironman', '$2y$11$rd990tJdJ32lMxgRS2KuoubQiYhPpaajCBtVtEPQADsM.dCTbdWKa'),
(5, 'daredevil', '$2y$11$6PymUqHwo8tiR0/rYFfjeOMIkfxT//MnRNkRzXwAPURZ7a/IeVu6S'),
(6, 'flash', '$2y$11$X5edCniPK3b0ouqY6g/eueMXLfZMQ4cnIr1h2v7JUohg7TT2ymxBa'),
(7, 'arrow', '$2y$11$Eo0dmJc/sWietU0yXdZLdexs20LIQJXQl72U9uWQm2ozagfLJ0FWy'),
(8, 'antiflash', '$2y$11$3vUc98wbcq8tYEYRay8wcuWptbeJVEavZjrmQIGHAkJOMh5iH88iu'),
(39, 'veliko', '$2y$11$5fso9BXnZ6ztb04OAg9ZzOGot2NU3uJAjv/87LdGBP97SS7s7imzK'),
(40, 'stefan', '$2y$11$B1YwxRfoTmODwDEM4acAP.ECGWCRMaAxZLi/iXJDRK6ZFBnjIf1iG'),
(41, 'ivan', '$2y$11$HRXhBP3djjDzEesbStBmwO/PCey50c/.zKbU.OC2yaTceApRdJ/L2');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(4) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `nick_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `nick_id`) VALUES
(1, 'Bruce', 'Wayne', 1),
(2, 'Peter', 'Parker', 2),
(3, 'Clark', 'Kent', 3),
(4, 'Tony', 'Stark', 4),
(5, 'Matthew', 'Murdock', 5),
(6, 'Barry', 'Allen', 6),
(7, 'Oliver', 'Queen', 7),
(8, 'Eboard', 'Thawn', 8),
(28, 'veliko', 'kosev', 39),
(29, 'Stefan', 'Milanov', 40),
(30, 'ivan', 'ivanov', 41);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `nickname` (`nickname`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `nick_id` (`nick_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
