-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 29, 2017 at 06:43 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

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
-- Table structure for table `blog_members`
--

CREATE TABLE `blog_members` (
  `memberID` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `postID` int(11) DEFAULT NULL,
  `roleID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2;

--
-- Dumping data for table `blog_members`
--

INSERT INTO `blog_members` (`memberID`, `username`, `password`, `email`, `postID`, `roleID`) VALUES
(2, 'guest1', '43wrgyF5vJdE2', 'guest1@example.com', NULL, 2),
(3, 'blog_admin', '61nD5J/beFkl2', 'blog_admin@example.com', NULL, 1),
(4, 'guest2', '93/jqcA0Nl4m.', 'guest2@example.com', NULL, 2),
(5, 'guest3', '95d7gQyBTRbBg', 'guest3@example.com', NULL, 2),
(6, 'guest4', '66KDpGv/3xRq6', 'guest4@example.com', NULL, 2),
(8, 'guest5', '94I7wO7mDxvBE', 'guest5@example.com', NULL, 2),
(9, 'guest6', '57nLJSrz4UBhM', 'guest6@example.com', NULL, 2),
(11, 'guest7', '64IFIuzIY8IRo', 'guest7@example.com', NULL, 2),
(12, 'guest8', '16N9NpxCE7LDE', 'guest8@example.com', NULL, 2),
(13, 'guest9', '83Ea3ffWcpve6', 'guest9@example.com', NULL, 2),
(15, 'guest10', '44.py6tr7b3Cc', 'guest10@example.com', NULL, 2),
(22, 'guest11', '820MraJAxL.yY', 'guest11@example.com', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE `blog_posts` (
  `postID` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `content` varchar(10000) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `movieID` int(11) DEFAULT NULL,
  `ratingID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`postID`, `title`, `description`, `content`, `date`, `movieID`, `ratingID`) VALUES
(1, 'The Godfather Film Review', 'The aging patriarch of an organized crime dynasty transfers control of his clandestine empire to his reluctant son.', 'This movie is strong, good script, great casting, excellent acting, and over the top directing. It is hard to fine a movie done this well, it is 29 years old and has aged well. Even if the viewer does not like mafia type of movies, he or she will watch the entire film, the audiences is glued to what will happen next as the film progresses. Its about, family, loyalty, greed, relationships, and real life. This is a great mix, and the artistic style make the film memorable.', '2017-05-13 19:00:00', 1, 5),
(2, 'Shawshank blog', 'just wanting to add a blog', 'to ensure linking to the comment does really work', '2017-05-22 23:57:04', 2, 4),
(3, 'jaws review', 'lalalala', 'pls work', '2017-05-27 19:29:31', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_members`
--
ALTER TABLE `blog_members`
  ADD PRIMARY KEY (`memberID`),
  ADD KEY `postID` (`postID`);

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`postID`),
  ADD KEY `movieID` (`movieID`),
  ADD KEY `ratingID` (`ratingID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_members`
--
ALTER TABLE `blog_members`
  MODIFY `memberID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `postID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog_members`
--
ALTER TABLE `blog_members`
  ADD CONSTRAINT `blog_members_ibfk_1` FOREIGN KEY (`postID`) REFERENCES `blog_posts` (`postID`);

--
-- Constraints for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD CONSTRAINT `blog_posts_ibfk_1` FOREIGN KEY (`movieID`) REFERENCES `movies` (`movieID`),
  ADD CONSTRAINT `blog_posts_ibfk_2` FOREIGN KEY (`ratingID`) REFERENCES `Rating` (`ratingID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
