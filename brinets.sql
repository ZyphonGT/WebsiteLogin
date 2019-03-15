-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2019 at 08:15 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brinets`
--

-- --------------------------------------------------------

--
-- Table structure for table `post_table`
--

CREATE TABLE `post_table` (
  `id` int(3) NOT NULL,
  `uid` varchar(10) NOT NULL,
  `post_title` varchar(50) NOT NULL,
  `post_content` text NOT NULL,
  `timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(3) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `username`, `password`) VALUES
(7, 'aaa@aaa.com', 'aaa', '$2y$10$0gJT4IySkYPfsSTh1v8nYOogVIvbnJtU/.yHHboWukMwdCHaBSCuq'),
(8, 'rickygani10@gmail.com', 'riki', '$2y$10$YUSg7LEvd58jsYZFKoZSgeXuKM4KGGLM7pO5JdXcYaK6FS9Fd2r9S'),
(9, 'test@a.a', 'test', '$2y$10$rrHjr4.hZz0dj809AAeEl.AoQyLqObNOwk.R8Mg3N4YTAQbhwy9Wq'),
(10, 'a@a.a', 'a', '$2y$10$uHbgmEJMikMMDSu.XWABMeB86t/IqB4mzUQ2IbFu.e28RuKrHnWW2'),
(11, 'admin@admin.admin', 'admin', '$2y$10$jzOqgdYScyPRczhQ8.JVru1aQmQO37VVtWXq7E0ZUUgyfswae978K'),
(12, 'bbb@bbb.com', 'bbb', '$2y$10$60GbfWwJKhx0UNJfbH7EXun9VWOZMJbcUBKNPW4nEg9F3vK9vVT3q'),
(13, 'rickygani10@gmail.com', 'rikigani', '$2y$10$k.GH.d0qk2MIBMllnCtvXOGJXK.uudwXsZtCglDHTaXIubBK4SUzS'),
(14, 'b@b.b', 'b', '$2y$10$wPHRsHd6SWtlxaY.eYc1X.4t4xF9RUn8N7yHi/6DhcnyIUDJ0F88W'),
(15, 'rickygani10@gmail.com', 'RICKYGANI', '$2y$10$vSTfEnwJyG/tB.N4vh3PT.eLhfjNSY4jzrcD8O2nDlDaWjRcO63XK'),
(16, 'asd@asd.com', 'asd', '$2y$10$4ISJaVNpUz.7zbt3ylTgy.lncdgvbzDUHS2oUFzhXtCYFsX0FYX.W'),
(17, 'rickygani10@gmail.com', 'asdasd', '$2y$10$i94LnLDlKc7D.FESQX3.Nu3KPaIxkkSguGiHvMJtuz186xNls4296'),
(18, 'rickygani10@gmail.com', 'pol', '$2y$10$ruoU8ukoF0h56MiuFdVa1.yDLuM7M0Vh.vkzn21kapPuCKlXc5Ge6'),
(19, 'rickygani10@gmail.com', 'riki1010', '$2y$10$CveDiUVfucev1JFBBn5kGuGcQnWsgq6SyfkhzmqDCR8zVndqZ3FGa'),
(20, 'rickygani10@gmail.com', 'ganigani', '$2y$10$9srM3GVGuukTgOWfzIeiKuDPf7fENij4XNaNyacNddY0kWq3YPIum');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `post_table`
--
ALTER TABLE `post_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post_table`
--
ALTER TABLE `post_table`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
