-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 14, 2025 at 08:35 AM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vvwu_examease`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `admin_password` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `admin_password`) VALUES
(1, 'admin_vvwu', 'admin@gmail.com', 'Ab12');

-- --------------------------------------------------------

--
-- Table structure for table `courseinfo`
--

DROP TABLE IF EXISTS `courseinfo`;
CREATE TABLE IF NOT EXISTS `courseinfo` (
  `CourseID` int NOT NULL AUTO_INCREMENT,
  `CourseName` varchar(255) NOT NULL,
  `CourseCode` varchar(50) NOT NULL,
  `NumberOfYears` int NOT NULL,
  `Description` text,
  `id` int DEFAULT NULL,
  PRIMARY KEY (`CourseID`),
  UNIQUE KEY `CourseCode` (`CourseCode`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `courseinfo`
--

INSERT INTO `courseinfo` (`CourseID`, `CourseName`, `CourseCode`, `NumberOfYears`, `Description`, `id`) VALUES
(1, 'Bachelor Of Computer Application', 'BCA', 3, NULL, 1),
(2, 'BSC IT(CS)', 'BSC IT(CS)', 5, NULL, 1),
(3, 'Bachelor of Arts in English', 'B.A.(In English)', 3, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
CREATE TABLE IF NOT EXISTS `departments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `department_name` varchar(100) NOT NULL,
  `department_code` varchar(10) NOT NULL,
  `icon` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `department_code` (`department_code`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department_name`, `department_code`, `icon`) VALUES
(1, 'Computer Science', 'CS', NULL),
(2, 'Humanities and Social Sciences', 'HSS', NULL),
(4, 'Civil Engineering', 'CE', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

DROP TABLE IF EXISTS `faculty`;
CREATE TABLE IF NOT EXISTS `faculty` (
  `faculty_id` int NOT NULL AUTO_INCREMENT,
  `faculty_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `did` int DEFAULT NULL,
  `pass` varchar(20) DEFAULT NULL,
  `profile_photo` varchar(100) NOT NULL DEFAULT 'no_photo.png',
  `status` int NOT NULL DEFAULT '0' COMMENT '0-pending,1-accept,2-reject,3-block',
  PRIMARY KEY (`faculty_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`faculty_id`, `faculty_name`, `email`, `phone`, `did`, `pass`, `profile_photo`, `status`) VALUES
(3, 'Fahad vahora', 'fahadvohra143@gmail.com', '8401495064', 1, '123456', 'no_photo.png', 1),
(4, 'Bhadresh286', 'abc@gmail.com', '9512535286', 2, '654321', 'no_photo.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `semesterdetails`
--

DROP TABLE IF EXISTS `semesterdetails`;
CREATE TABLE IF NOT EXISTS `semesterdetails` (
  `SemesterNumber` int NOT NULL,
  `CourseID` int NOT NULL,
  `Fees` decimal(10,2) DEFAULT NULL,
  `NumberOfSubjects` int DEFAULT NULL,
  `StartingDate` date DEFAULT NULL,
  `EndingDate` date DEFAULT NULL,
  `sem_id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`sem_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `semesterdetails`
--

INSERT INTO `semesterdetails` (`SemesterNumber`, `CourseID`, `Fees`, `NumberOfSubjects`, `StartingDate`, `EndingDate`, `sem_id`) VALUES
(1, 1, 20500.00, 6, '2021-07-08', '2021-12-31', 1),
(2, 1, 19500.00, 6, '2022-01-01', '2022-06-25', 2),
(3, 1, 19600.00, 6, '2022-06-30', '2022-12-31', 3),
(4, 1, 19800.00, 6, '2023-01-01', '2023-06-06', 4),
(5, 1, 19800.00, 6, '2023-06-15', '2023-12-25', 5),
(6, 1, 19800.00, 6, '2024-09-11', '2025-04-15', 6),
(1, 2, 21500.00, 6, '2024-05-11', '2024-12-15', 7);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

DROP TABLE IF EXISTS `subject`;
CREATE TABLE IF NOT EXISTS `subject` (
  `subject_id` int NOT NULL AUTO_INCREMENT,
  `subject_code` varchar(20) NOT NULL,
  `subject_name` varchar(100) NOT NULL,
  `short_name` varchar(50) DEFAULT NULL,
  `credit` int NOT NULL,
  `internal_marks` int NOT NULL,
  `passing_internal_marks` int NOT NULL,
  `external_marks` int NOT NULL,
  `passing_external_marks` int NOT NULL,
  `sem_id` int DEFAULT NULL,
  PRIMARY KEY (`subject_id`),
  UNIQUE KEY `subject_code` (`subject_code`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `subject_code`, `subject_name`, `short_name`, `credit`, `internal_marks`, `passing_internal_marks`, `external_marks`, `passing_external_marks`, `sem_id`) VALUES
(1, '101', 'Programming in Java', 'Java', 4, 50, 17, 50, 17, 1),
(2, '102', 'Web Design', 'HTML', 4, 50, 17, 50, 17, 1),
(3, '103', 'Communication Skills', 'CS', 4, 50, 17, 50, 17, 1),
(4, '601', 'Python', 'PY', 4, 40, 15, 60, 33, 6);

-- --------------------------------------------------------

--
-- Table structure for table `subjectwisefacultyallocate`
--

DROP TABLE IF EXISTS `subjectwisefacultyallocate`;
CREATE TABLE IF NOT EXISTS `subjectwisefacultyallocate` (
  `subject_id` int NOT NULL,
  `faculty_id` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `subjectwisefacultyallocate`
--

INSERT INTO `subjectwisefacultyallocate` (`subject_id`, `faculty_id`) VALUES
(1, 3),
(2, 4);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
