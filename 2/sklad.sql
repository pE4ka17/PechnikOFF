-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 14, 2024 at 08:10 AM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sklad`
--

-- --------------------------------------------------------

--
-- Table structure for table `fabricator`
--

CREATE TABLE `fabricator` (
  `id` int(5) NOT NULL,
  `f_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fabricator`
--

INSERT INTO `fabricator` (`id`, `f_name`) VALUES
(1, 'изготовитель_первый'),
(2, 'изготовитель_второй'),
(3, 'какой то'),
(4, 'тоже какой то');

-- --------------------------------------------------------

--
-- Table structure for table `provider`
--

CREATE TABLE `provider` (
  `id` int(5) NOT NULL,
  `p_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `provider`
--

INSERT INTO `provider` (`id`, `p_name`) VALUES
(1, 'поставщик_первый'),
(2, 'поставщик_второй'),
(3, 'какой то'),
(4, 'тоже какой то');

-- --------------------------------------------------------

--
-- Table structure for table `storage`
--

CREATE TABLE `storage` (
  `d_id` int(5) NOT NULL,
  `d_name` varchar(255) NOT NULL,
  `entrance` date NOT NULL,
  `provider_id` varchar(255) NOT NULL,
  `fabricator_id` varchar(255) NOT NULL,
  `price_euro` int(7) NOT NULL,
  `price_rub` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `storage`
--

INSERT INTO `storage` (`d_id`, `d_name`, `entrance`, `provider_id`, `fabricator_id`, `price_euro`, `price_rub`) VALUES
(1, 'деталь_1', '2024-02-16', '1', '2', 5, 500),
(2, 'вторая', '2024-02-15', '3', '3', 4, 400),
(3, 'третья_деталь', '2024-02-15', '4', '4', 3, 333);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fabricator`
--
ALTER TABLE `fabricator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provider`
--
ALTER TABLE `provider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `storage`
--
ALTER TABLE `storage`
  ADD PRIMARY KEY (`d_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fabricator`
--
ALTER TABLE `fabricator`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `provider`
--
ALTER TABLE `provider`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `storage`
--
ALTER TABLE `storage`
  MODIFY `d_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
