-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2019 at 10:43 AM
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
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post_table`
--

INSERT INTO `post_table` (`id`, `uid`, `post_title`, `post_content`, `datetime`) VALUES
(1, 'aaa', 'The First Post Ever', 'Sda sd asd a sd as d sa d as da sad', '2019-03-16 12:02:37'),
(2, 'admin', 'My Second Post', 'sadasdasdsaddasdasd', '2019-03-16 13:01:55'),
(3, 'admin', 'Spacing Test', 'asd asd asd asd asd a dw ad aw d aw da d wa d wa  wda', '2019-03-16 13:17:19'),
(4, 'admin', 'sadasdaw', ' Sdasd lwop lllsadwmfaw sadlld awkdalwdlaw sdaklsda Sdasd lwop lllsadwmfaw sadlld awkdalwdlaw sdaklsda Sdasd lwop lllsadwmfaw sadlld awkdalwdlaw sdaklsda Sdasd lwop lllsadwmfaw sadlld awkdalwdlaw sdaklsda Sdasd lwop lllsadwmfaw sadlld awkdalwdlaw sdaklsda Sdasd lwop lllsadwmfaw sadlld awkdalwdlaw sdaklsda Sdasd lwop lllsadwmfaw sadlld awkdalwdlaw sdaklsda', '2019-03-16 13:18:05'),
(5, 'Please rel', 'asdasd', 'asd as adsdsadsa  sadsad as', '2019-03-16 13:31:56'),
(6, 'Please rel', 'awdawd wadawda', 'wadawd awd  awd awd wadwa ', '2019-03-16 13:33:04'),
(7, 'Please rel', 'wad2 2d', '2d d2d2d2 2d2', '2019-03-16 13:33:22'),
(8, 'admin', 'sadsad', 'sda ssdsad sdsad', '2019-03-16 13:57:19'),
(9, 'admin', 'It finally works!', 'Nice nice nice nice', '2019-03-16 15:53:19'),
(10, 'Google', 'Google Google', 'This is the header of the post.', '2019-03-16 15:59:43'),
(11, 'Google', 'Is my Post number added?', 'isitawdapwkd', '2019-03-16 16:09:24'),
(12, 'Google', 'asdasdsad', 'asdasdas das das dassdad', '2019-03-16 16:11:20'),
(13, 'OldUser', 'Old User is Back', 'what has been going on lately?', '2019-03-16 16:35:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(3) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `num_of_posts` int(11) NOT NULL DEFAULT '0',
  `date_joined` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `username`, `password`, `num_of_posts`, `date_joined`) VALUES
(7, 'aaa@aaa.com', 'aaa', '$2y$10$0gJT4IySkYPfsSTh1v8nYOogVIvbnJtU/.yHHboWukMwdCHaBSCuq', 0, '2019-03-16 15:58:14'),
(8, 'rickygani10@gmail.com', 'riki', '$2y$10$YUSg7LEvd58jsYZFKoZSgeXuKM4KGGLM7pO5JdXcYaK6FS9Fd2r9S', 0, '2019-03-16 15:58:14'),
(9, 'test@a.a', 'test', '$2y$10$rrHjr4.hZz0dj809AAeEl.AoQyLqObNOwk.R8Mg3N4YTAQbhwy9Wq', 0, '2019-03-16 15:58:14'),
(10, 'a@a.a', 'a', '$2y$10$uHbgmEJMikMMDSu.XWABMeB86t/IqB4mzUQ2IbFu.e28RuKrHnWW2', 0, '2019-03-16 15:58:14'),
(11, 'admin@admin.admin', 'admin', '$2y$10$jzOqgdYScyPRczhQ8.JVru1aQmQO37VVtWXq7E0ZUUgyfswae978K', 0, '2019-03-16 15:58:14'),
(12, 'bbb@bbb.com', 'bbb', '$2y$10$60GbfWwJKhx0UNJfbH7EXun9VWOZMJbcUBKNPW4nEg9F3vK9vVT3q', 0, '2019-03-16 15:58:14'),
(13, 'rickygani10@gmail.com', 'rikigani', '$2y$10$k.GH.d0qk2MIBMllnCtvXOGJXK.uudwXsZtCglDHTaXIubBK4SUzS', 0, '2019-03-16 15:58:14'),
(14, 'b@b.b', 'b', '$2y$10$wPHRsHd6SWtlxaY.eYc1X.4t4xF9RUn8N7yHi/6DhcnyIUDJ0F88W', 0, '2019-03-16 15:58:14'),
(15, 'rickygani10@gmail.com', 'RICKYGANI', '$2y$10$vSTfEnwJyG/tB.N4vh3PT.eLhfjNSY4jzrcD8O2nDlDaWjRcO63XK', 0, '2019-03-16 15:58:14'),
(16, 'asd@asd.com', 'asd', '$2y$10$4ISJaVNpUz.7zbt3ylTgy.lncdgvbzDUHS2oUFzhXtCYFsX0FYX.W', 0, '2019-03-16 15:58:14'),
(17, 'rickygani10@gmail.com', 'asdasd', '$2y$10$i94LnLDlKc7D.FESQX3.Nu3KPaIxkkSguGiHvMJtuz186xNls4296', 0, '2019-03-16 15:58:14'),
(18, 'rickygani10@gmail.com', 'pol', '$2y$10$ruoU8ukoF0h56MiuFdVa1.yDLuM7M0Vh.vkzn21kapPuCKlXc5Ge6', 0, '2019-03-16 15:58:14'),
(19, 'rickygani10@gmail.com', 'riki1010', '$2y$10$CveDiUVfucev1JFBBn5kGuGcQnWsgq6SyfkhzmqDCR8zVndqZ3FGa', 0, '2019-03-16 15:58:14'),
(20, 'rickygani10@gmail.com', 'ganigani', '$2y$10$9srM3GVGuukTgOWfzIeiKuDPf7fENij4XNaNyacNddY0kWq3YPIum', 0, '2019-03-16 15:58:14'),
(22, 'google@gmail.com', 'Google', '$2y$10$tueoIO2nLyYlcrFwRZSOWu/VdE9AA.6mOOEI05AVn5Xh.hD0QbLH2', 1, '2019-03-16 15:59:07'),
(24, 'Old@user.com', 'OldUser', '$2y$10$OHAunR0MjV2tp4cToEWnQuSkkvx/KTo/PhBLgeC8wRWHfQXoL59.a', 22, '2017-01-01 16:33:53');

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
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
