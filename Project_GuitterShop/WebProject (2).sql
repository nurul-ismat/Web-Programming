-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 25, 2020 at 12:11 AM
-- Server version: 5.7.30-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `WebProject`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `price`) VALUES
(1, 'Gibson Slash #1 Les Paul VOS w/c Hardcase', 'img/gibson1.jpg', 63599),
(2, 'Fender American Professional Stratocaster', 'img/fender1.jpg', 7690),
(3, 'PRS Tremonti SE EL GTR', 'img/prs1.jpg', 3500),
(4, 'Epiphone Ltd Ed SG Express Electric Guitar', 'img/epiphone1.jpg', 719),
(5, 'Cort CJ5X Left Hand NS Electro-Acoustic Guitar', 'img/cort1.jpg', 2200),
(6, 'Yamaha RBX 500 Superbass', 'img/yamaha1.jpg', 1480),
(7, 'Yamaha FX370C AC El Guitar', 'img/yamaha2.jpg', 1557),
(8, 'LTD AX-104 Bass Black', 'img/ltd1.jpg', 2119);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idUsers` int(11) NOT NULL,
  `uid` tinytext NOT NULL,
  `email` tinytext NOT NULL,
  `pwd` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idUsers`, `uid`, `email`, `pwd`) VALUES
(1, 'jon23', 'john@gmail.com', '$2y$10$4UUx0K9bRvroYj.19vlD/.20gOgmystV1CcKCxu03Wh5aT4Te6BPe'),
(2, 'Test', 'test@test.com', '$2y$10$J3AcQWIzGWsx4dEJewOWBea7RA6vhJ44kTyV7itQbXuxp6qgQIHy6'),
(3, 'niga', 'niga@gmail.com', '$2y$10$S3DdN1Jg4A2jtlvbV/6mYemn7E2HGKvbDx1e4/raOEJQZzOQvgvxC'),
(4, 'Test2', 'asd@aa.com', '$2y$10$7P6a95XwheKtQLd28U3JeuxHx9CXrCBUuOpaFpvF46l8.nYY/7j4S'),
(5, 'Babu12', 'babu@gmail.com', '$2y$10$ot6bGfyuVUGrDljmbXDc4u5EcnhTqqYombqxTkrP349hj3uUaV4h6'),
(6, 'ali', 'ali@email.com', '$2y$10$qNtBU9ObJm/TcDyPTbqhyusIQDcd0FTSEobqSnIedkMNyJPEXXbp.'),
(7, 'pravineish', 'pravineish@gmail.com', '$2y$10$2LTcwXzTi3E6GvEW3UUjBuj1tIzQsBnmUI6QfLZUO83cj7bLTyFoy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUsers`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idUsers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
