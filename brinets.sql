-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2019 at 04:21 PM
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
(10, 'Google', 'Google Google', 'This is the header of the post.', '2019-03-16 15:59:43'),
(11, 'Google', 'Is my Post number added?', 'isitawdapwkd', '2019-03-16 16:09:24'),
(12, 'Google', 'asdasdsad', 'asdasdas das das dassdad', '2019-03-16 16:11:20'),
(13, 'OldUser', 'Old User is Back', 'what has been going on lately?', '2019-03-16 16:35:00'),
(14, 'OldUser', 'OldUser\'s Second Post', 'num of post should be 23 now', '2019-03-17 01:18:12'),
(15, 'betabeta', 'I\'m new here...', 'Hey guys, I\'m stopping by to say hi. I hope we all get along together :D', '2019-03-17 01:55:36'),
(16, 'Google', 'Hello, betabeta!', 'As one of the most esteem member of this forum, I welcome you here. Enjoy your stay. I know it\'s nothing much, but I hope this can help you connect with other people around the globe.', '2019-03-17 02:22:20'),
(17, 'MrBong', 'Hello world.', 'Siapa yang suruh wilbert beli kue?', '2019-03-18 13:33:28');

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
(22, 'google@gmail.com', 'Google', '$2y$10$tueoIO2nLyYlcrFwRZSOWu/VdE9AA.6mOOEI05AVn5Xh.hD0QbLH2', 4, '2019-03-16 15:59:07'),
(24, 'Old@user.com', 'OldUser', '$2y$10$OHAunR0MjV2tp4cToEWnQuSkkvx/KTo/PhBLgeC8wRWHfQXoL59.a', 2, '2017-01-01 16:33:53'),
(25, 'beta@beta.beta', 'betabeta', '$2y$10$h1bnVn7s3TMme19JRvxWGep/MVaUzHAH8jxCLgj08BFt8P.Sdv15e', 1, '2019-03-17 01:54:09'),
(26, 'email@gmai.com', 'TonyStark', '$2y$10$iR3abChorjCykqEiBKAUs.eRbeIEjCu81vu6nGLDl80HJhm4Jfthe', 0, '2019-03-17 16:08:55'),
(27, 'bongcenchoi@gmail.com', 'MrBong', '$2y$10$JFlDju4t8rxBKtI1WrisrOWKdlvpL7Ra/Y4OxzoUyLdC8r.RrxRoO', 1, '2019-03-18 13:30:56'),
(28, 'GabrielDejan@gmail.com', 'Garziel', '$2y$10$KcYtmij7rWdmTEJTpHlAjeTllTZykRVFSFRnzWfHX7jAm805JL7lu', 0, '2019-03-18 13:31:23'),
(29, 'admin@admin.admin', 'admin', '$2y$10$mQG8kASub/lpTmmYLjiF6OH6UszMZCHDdQgJhKMA1v/K4Q8v7tL1.', 0, '2019-03-29 22:30:54');

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
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
