-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 02, 2017 at 10:50 AM
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
(22, 'guest11', '820MraJAxL.yY', 'guest11@example.com', NULL, 2),
(23, 'guest12', '43wrgyF5vJdE2', 'guest12@example.com', NULL, 2),
(26, 'guest15', '52jnMDup5ciNc', 'guest15@example.com', NULL, 2);

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
(3, 'jaws review', 'lalalala', 'pls work', '2017-05-27 19:29:31', NULL, NULL),
(4, 'review', 'Hoping I have not broken it.', 'Been trying too many things, and now look.', '2017-06-01 20:56:07', 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `catID` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`catID`, `name`) VALUES
(1, 'crime'),
(2, 'comedy'),
(3, 'drama'),
(4, 'horror');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `commentID` int(11) NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `date` datetime DEFAULT NULL,
  `member` varchar(100) NOT NULL,
  `postID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`commentID`, `comment`, `date`, `member`, `postID`) VALUES
(1, 'Test comment', '2017-05-19 00:00:00', 'emileelam', 1),
(4, 'testing whether I have linked the Godfather post with the comment', '2017-05-22 23:50:15', 'guest1', 1),
(13, 'testing 30th may', '2017-05-30 21:55:55', 'guest2', 2),
(14, 'testing again', '2017-05-30 22:36:43', 'guest2', 2),
(15, 'test', '2017-05-31 18:57:17', 'guest4', 2),
(16, 'test2', '2017-05-31 19:01:43', 'guest4', 2),
(17, 'test3', '2017-05-31 19:09:10', 'guest4', 2),
(18, 'testing.', '2017-06-01 21:01:11', 'blog_admin', 4);

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `movieID` int(11) NOT NULL,
  `name` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `certificate` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `runTime` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `image` varchar(5000) DEFAULT NULL,
  `video` varchar(5000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`movieID`, `name`, `year`, `certificate`, `runTime`, `image`, `video`) VALUES
(1, 'The Godfather', 1972, '18', '2 hrs 55 mins', 'https://i.ytimg.com/vi/rt-r-w7Z2Ag/maxresdefault.jpg', 'https://www.youtube.com/watch?v=sY1S34973zA'),
(2, 'Shawshank Redemption', 1995, '18', '200mins', 'http://www.wow247.co.uk/wp-content/uploads/2014/07/Shawshank-Redemption.jpg', NULL),
(3, 'Jaws', 1975, '18', '124 mins', 'http://az616578.vo.msecnd.net/files/2016/11/04/636138952733962231-1976331244_jaws.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `movie_categories`
--

CREATE TABLE `movie_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `movieID` int(11) DEFAULT NULL,
  `catID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movie_categories`
--

INSERT INTO `movie_categories` (`id`, `name`, `movieID`, `catID`) VALUES
(1, 'The Godfather - Drama Category', 1, 1),
(2, 'The Godfather - Crime Category', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `Rating`
--

CREATE TABLE `Rating` (
  `ratingID` int(11) NOT NULL,
  `rating` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Rating`
--

INSERT INTO `Rating` (`ratingID`, `rating`) VALUES
(1, '1/5'),
(2, '2/5'),
(3, '3/5'),
(4, '4/5'),
(5, '5/5');

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
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`catID`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentID`),
  ADD KEY `postID` (`postID`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`movieID`);

--
-- Indexes for table `movie_categories`
--
ALTER TABLE `movie_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movieID` (`movieID`),
  ADD KEY `catID` (`catID`);

--
-- Indexes for table `Rating`
--
ALTER TABLE `Rating`
  ADD PRIMARY KEY (`ratingID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_members`
--
ALTER TABLE `blog_members`
  MODIFY `memberID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `postID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `catID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `movieID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `movie_categories`
--
ALTER TABLE `movie_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `Rating`
--
ALTER TABLE `Rating`
  MODIFY `ratingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
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

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`postID`) REFERENCES `blog_posts` (`postID`);

--
-- Constraints for table `movie_categories`
--
ALTER TABLE `movie_categories`
  ADD CONSTRAINT `movie_categories_ibfk_1` FOREIGN KEY (`movieID`) REFERENCES `movies` (`movieID`),
  ADD CONSTRAINT `movie_categories_ibfk_2` FOREIGN KEY (`catID`) REFERENCES `category` (`catID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
