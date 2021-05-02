-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2021 at 06:47 PM
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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
