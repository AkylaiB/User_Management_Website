-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 24, 2025 at 08:46 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `login` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`ID`, `login`, `password`) VALUES
(1, 'admin', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `ID` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `login` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `gender` int NOT NULL,
  `birthdate` date NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `login` (`login`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `login`, `password`, `name`, `surname`, `gender`, `birthdate`) VALUES
(1, 'efim@gmail.com', '123', 'Эфим', 'Гонохов', 0, '2005-12-20'),
(2, 'alla@gmail.com', '111', 'Алла', 'Чуликова', 1, '2000-01-23'),
(3, 'valeri@gmail.com', '145', 'Валерий', 'Шелестов', 0, '2001-03-12'),
(4, 'elvira@gmail.com', '486', 'Эльвира', 'Шафиева', 1, '2004-04-25'),
(5, 'ivan@gmail.com', '124', 'Иван', 'Вертков', 0, '1998-02-12'),
(6, 'katya@gmail.com', '188', 'Екатерина', 'Давыденкова', 1, '2002-12-12'),
(7, 'konstantin@gmail.com', '966', 'Константин', 'Малашкин', 0, '1989-10-11'),
(8, 'anna@gmail.com', '485', 'Анна', 'Ольховская', 1, '2001-12-10'),
(9, 'stepan@gmail.com', '347', 'Степан', 'Гашимов', 0, '2004-10-01'),
(10, 'tatyana@gmail.com', '963', 'Татьяна', 'Балахонова', 1, '2001-01-26'),
(11, 'ramil@gmail.com', '110', 'Рамиль', 'Лупкин', 0, '2000-12-31'),
(12, 'nadejda@gmail.com', '158', 'Надежда', 'Кутейкина', 1, '2003-02-20'),
(13, 'maksim@gmail.com', '943', 'Максим', 'Филькин', 0, '1978-09-30'),
(14, 'anjelika@gmail.com', '121', 'Анжелика', 'Винтулова', 1, '1980-02-01'),
(15, 'ildar@gmail.com', '777', 'Ильдар', 'Акмурадов', 0, '1971-02-19'),
(16, 'petr@gmail.com', '741', 'Пётр', 'Волков', 0, '2005-02-09'),
(17, 'kiril@gmail.com', '852', 'Кирилл', 'Подпорин', 0, '1976-06-23'),
(18, 'andrey@gmail.com', '396', 'Андрей', 'Медведев', 0, '2000-02-29'),
(19, 'filip@gmail.com', '159', 'Филипп', 'Артёмов', 0, '1999-05-08'),
(20, 'ekaterina@gmail.com', '753', 'Екатерина', 'Курнакова', 1, '2002-07-01'),
(21, 'ludmila@gmail.com', '258', 'Людмила', 'Этолина', 1, '1995-08-21'),
(22, 'yana@gmail.com', '369', 'Яна', 'Галкина', 1, '1900-04-13'),
(23, 'egor@gmail.com', '147', 'Егор', 'Друзяков', 0, '1991-01-18'),
(24, 'yakov@gmail.com', '357', 'Яков', 'Артыков', 0, '1988-08-15'),
(25, 'olesya@gmail.com', '951', 'Олеся', 'Стрижевская', 1, '1942-12-23');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
