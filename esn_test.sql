-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2021 at 10:35 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `esn_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_id` int(11) NOT NULL,
  `User_type` enum('u','a') NOT NULL DEFAULT 'u',
  `Nama` varchar(25) NOT NULL,
  `Alamat` varchar(30) NOT NULL,
  `No_telepon` bigint(20) NOT NULL,
  `Tanggal_lahir` date NOT NULL,
  `Jenis_kelamin` enum('m','f') NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `User_rank` int(3) NOT NULL DEFAULT 1,
  `User_desc` text DEFAULT NULL,
  `User_photo` mediumblob DEFAULT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_id`, `User_type`, `Nama`, `Alamat`, `No_telepon`, `Tanggal_lahir`, `Jenis_kelamin`, `Email`, `Password`, `User_rank`, `User_desc`, `User_photo`, `created_at`, `updated_at`) VALUES
(1, 'u', 'Joni', 'ketintang surabaya', 6281345678911, '2001-05-20', 'm', 'joni12345@gmail.com', 'hastahato145', 1, 'halo, namaku joni', NULL, '0000-00-00', '0000-00-00'),
(2, 'u', 'Dita', 'ketintang surabaya', 6281891134567, '2001-07-20', 'f', 'ditadito@dita.com', 'dotadita145', 1, 'halo namaku dita', NULL, '0000-00-00', '0000-00-00'),
(3, 'u', 'Hatori', 'Kutoarjo, Kepuh', 62812309866, '1960-08-20', 'm', 'asd@asd.com', 'Hatori1945', 1, 'im a shinobi', NULL, '2021-05-20', '2021-05-20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
