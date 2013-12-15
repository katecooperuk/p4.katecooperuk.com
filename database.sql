-- phpMyAdmin SQL Dump
-- version 4.0.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 15, 2013 at 10:50 AM
-- Server version: 5.1.70-cll
-- PHP Version: 5.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `katecoop_p4_katecooperuk_com`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `book_id` int(11) NOT NULL AUTO_INCREMENT,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `author` text NOT NULL,
  `isbn` varchar(255) NOT NULL,
  PRIMARY KEY (`book_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `created`, `modified`, `user_id`, `title`, `author`, `isbn`) VALUES
(1, 1387021889, 1387021889, 4, 'Dracula', 'Bram Stoker', '9781904633143'),
(2, 1387103441, 1387103441, 5, 'Frankenstein', 'Mary Shelley', '1551113082'),
(4, 1387103716, 1387103716, 6, 'The Strange Case of Dr. Jekyll and Mr. Hyde', 'R. L. Stevenson', '1602911460'),
(5, 1387121350, 1387121350, 7, 'The Picture of Dorian Gray', 'Oscar Wilde', '0141199490');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`post_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `created`, `modified`, `user_id`, `content`) VALUES
(2, 1386434282, 1386434282, 5, 'welcome to my house'),
(5, 1387103677, 1387103677, 6, 'Some sort of shadowy pall seems to be coming over our happiness.'),
(6, 1387103835, 1387103835, 4, '3 May, Bistritz - Left Munich at 8.35pm on 1st May, arriving at Vienna early next morning'),
(7, 1387105030, 1387105030, 4, 'Doctor, you don''t know what it is to doubt everything, even yourself. No, you don''t; you couldn''t with eyebrows like yours.'),
(8, 1387121273, 1387121273, 7, 'There are darknesses in life and there are lights, and you are one of the lights, the light of all lights.'),
(9, 1387121830, 1387121830, 5, 'Listen to them, the children of the night. What music they make!'),
(10, 1387121890, 1387121890, 5, 'Once again...welcome to my house. Come freely. Go safely; and leave something of the happiness you bring.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `last_login` int(11) NOT NULL,
  `timezone` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `avatar` mediumblob NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `created`, `modified`, `token`, `password`, `last_login`, `timezone`, `first_name`, `last_name`, `email`, `avatar`) VALUES
(4, 1386427736, 1386427736, '994cca16139dd5540ee7cb47ff7942c6439372bb', 'e96196b2d5a34c5a23d12469ba6c0107155b01e3', 0, '', 'Jonathan', 'Harker', 'jonathan@gmail.com', 0x342e6a7067),
(5, 1386432652, 1386432652, 'de73c58d785a964b72aea1215b4540a2beeb0dc3', '0e7071c03ee3be82893f52678280498648859ab6', 0, '', 'Count', 'Dracula', 'dracula@gmail.com', 0x352e6a7067),
(6, 1387103593, 1387103593, '6f63b6b343e5e8bd6a5ecc32d74036eb21dd149b', '6f3f9673d94d59ca96ae8e92c7bc004d02fee6ed', 0, '', 'Mina', 'Harker', 'mina@gmail.com', 0x362e6a7067),
(7, 1387105805, 1387105805, 'abe9c462fa8d279c0027e7b740e3c77b797076f4', 'b32baed56e2dab3c62cbfdee14004350a2748a97', 0, '', 'Abraham', 'Van Helsing', 'abraham@gmail.com', 0x372e6a7067),
(8, 1387121523, 1387121523, '1b1e4d25acab9bd45e5d74f9006a83e98e2cf542', '3f672a422e289626a89a17719269b89dfea2d9ee', 0, '', 'Arthur', 'Holmwood', 'arthur@gmail.com', 0x382e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `users_users`
--

CREATE TABLE IF NOT EXISTS `users_users` (
  `user_user_id` int(11) NOT NULL AUTO_INCREMENT,
  `created` int(11) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'follower',
  `user_id_followed` int(11) NOT NULL COMMENT 'followed',
  PRIMARY KEY (`user_user_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `users_users`
--

INSERT INTO `users_users` (`user_user_id`, `created`, `user_id`, `user_id_followed`) VALUES
(1, 1387021608, 4, 4),
(2, 1387021609, 4, 5),
(3, 1387040998, 5, 4),
(4, 1387040999, 5, 5),
(5, 1387103682, 6, 4),
(6, 1387103684, 6, 5),
(7, 1387103687, 6, 6),
(8, 1387103844, 4, 6),
(9, 1387121016, 5, 6),
(10, 1387121017, 5, 7),
(11, 1387121222, 7, 4),
(12, 1387121225, 7, 5),
(13, 1387121226, 7, 6),
(14, 1387121228, 7, 7),
(15, 1387121548, 8, 4),
(16, 1387121550, 8, 5),
(17, 1387121551, 8, 6),
(18, 1387121552, 8, 7),
(19, 1387121553, 8, 8);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users_users`
--
ALTER TABLE `users_users`
  ADD CONSTRAINT `users_users_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
