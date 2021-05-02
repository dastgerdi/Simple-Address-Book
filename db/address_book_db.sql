-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2021 at 06:46 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `address_book_db`
--
CREATE DATABASE IF NOT EXISTS `address_book_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `address_book_db`;

-- --------------------------------------------------------

--
-- Table structure for table `address_book_tbl`
--

CREATE TABLE `address_book_tbl` (
  `user_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `firstname` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `street` text NOT NULL,
  `zip_code` varchar(8) NOT NULL,
  `city_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `address_book_tbl`
--

INSERT INTO `address_book_tbl` (`user_id`, `name`, `firstname`, `email`, `street`, `zip_code`, `city_id`) VALUES
(22, 'Travolta', 'John', 'john@gmail.com', 'John Street', '4000-100', 3),
(23, 'Beckham', 'David', 'david@yahoo.com', 'David Street', '5000-900', 4),
(24, 'Guetta', 'David', 'guetta@gmail.com', 'Guetta Street', '1000-500', 1),
(25, 'Foster', 'Jodie', 'foster@gmail.com', 'Foster Street', '8000-500', 5),
(26, 'Foster', 'Woodie', 'foster2@gmail.com', 'Foster Street', '8000-502', 5),
(27, 'Mourinho', 'Jose', 'jose@gmail.com', 'Jose Street', '5000-600', 3),
(28, 'Ronaldo', 'Cristiano', 'cr7@gmail.com', 'CR Street', '7000-777', 3),
(29, 'Bowie', 'David', 'bowie@gmail.com', 'Bow Street', '2000-200', 2),
(30, 'Reina', 'Pepe', 'reina@yahoo.com', 'Pepe Street', '5000-100', 1),
(31, 'Marley', 'Bob', 'bob@gmail.com', 'Bobby Street', '8000-900', 4);

-- --------------------------------------------------------

--
-- Table structure for table `cities_tbl`
--

CREATE TABLE `cities_tbl` (
  `city_id` int(11) NOT NULL,
  `city` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cities_tbl`
--

INSERT INTO `cities_tbl` (`city_id`, `city`) VALUES
(1, 'Braga'),
(2, 'Coimbra'),
(3, 'Lisbon'),
(4, 'Porto'),
(5, 'Vila Nova de Gaia');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address_book_tbl`
--
ALTER TABLE `address_book_tbl`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `city_fk` (`city_id`) USING BTREE;

--
-- Indexes for table `cities_tbl`
--
ALTER TABLE `cities_tbl`
  ADD PRIMARY KEY (`city_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address_book_tbl`
--
ALTER TABLE `address_book_tbl`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `cities_tbl`
--
ALTER TABLE `cities_tbl`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address_book_tbl`
--
ALTER TABLE `address_book_tbl`
  ADD CONSTRAINT `address_book_tbl_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `cities_tbl` (`city_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
