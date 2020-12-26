-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 17, 2020 at 07:00 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `COURSES`
--

CREATE TABLE `COURSES` (
  `department_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `course_name` varchar(80) NOT NULL,
  `course_units` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `COURSES`
--

INSERT INTO `COURSES` (`department_id`, `user_id`, `course_name`, `course_units`, `course_id`, `status`) VALUES
(1, 0, 'Operations', 0, 1, 'I'),
(2, 3, 'COSW-30 PHP MySQL', 4, 2, 'Inactive'),
(3, 5, 'COSP-38 Database Concepts', 4, 3, 'Inactive'),
(1, 0, 'broom', 4, 8, 'Inactive'),
(1, 0, 'brooms', 4, 9, 'Inactive'),
(1, 0, 'witches', 5, 10, 'Inactive'),
(1, NULL, 'COSA 50 Intro to IT Concepts & Applications ', 4, 11, 'Active'),
(1, NULL, 'COSP 7 Programming Concepts and Methodologies', 4, 12, 'Active'),
(1, NULL, 'COSP 38 Database Concepts', 4, 13, 'Active'),
(1, NULL, 'COSW 10 Beginning Website Development', 4, 14, 'Active'),
(1, NULL, 'COSW 20 Front End Website Development', 4, 15, 'Active'),
(1, NULL, 'COSW 30 Web Development with PHP/MySQL ', 4, 16, 'Active'),
(1, NULL, 'COSW 200 Introduction to JavaScript and JQuery ', 4, 17, 'Active'),
(1, NULL, 'COSW 240 Intro to Content Management Systems ', 3, 18, 'Active'),
(1, NULL, 'COSA 50 Intro to IT Concepts & Applications ', 4, 19, 'Active'),
(1, NULL, 'COSP 7 Programming Concepts and Methodologies', 4, 20, 'Active'),
(1, NULL, 'COSP 38 Database Concepts', 4, 21, 'Active'),
(1, NULL, 'COSW 10 Beginning Website Development', 4, 22, 'Active'),
(1, NULL, 'COSW 20 Front End Website Development', 4, 23, 'Active'),
(1, NULL, 'COSW 30 Web Development with PHP/MySQL ', 4, 24, 'Active'),
(1, NULL, 'COSW 200 Introduction to JavaScript and JQuery ', 4, 25, 'Active'),
(1, NULL, 'COSW 240 Intro to Content Management Systems ', 3, 26, 'Active'),
(1, NULL, 'COSA 50 Intro to IT Concepts & Applications ', 4, 27, 'Active'),
(1, NULL, 'COSP 7 Programming Concepts and Methodologies', 4, 28, 'Active'),
(1, NULL, 'COSP 38 Database Concepts', 4, 29, 'Active'),
(1, NULL, 'COSW 10 Beginning Website Development', 4, 30, 'Active'),
(1, NULL, 'COSW 20 Front End Website Development', 4, 31, 'Active'),
(1, NULL, 'COSW 30 Web Development with PHP/MySQL ', 4, 32, 'Active'),
(1, NULL, 'COSW 200 Introduction to JavaScript and JQuery ', 4, 33, 'Active'),
(1, NULL, 'COSW 240 Intro to Content Management Systems ', 3, 34, 'Active'),
(1, NULL, 'COSP 230 Android App Development in Java', 3, 35, 'Active'),
(1, NULL, 'COSP 38 Database Concepts ', 4, 36, 'Active'),
(1, NULL, 'COSW 10 Beginning Website Development ', 4, 37, 'Active'),
(1, NULL, 'COSW 30 Web Development with PHP/MySQL ', 4, 38, 'Active'),
(1, NULL, 'COSW 200 Introduction to JavaScript and jQuery ', 4, 39, 'Active'),
(1, NULL, 'COSW 10 Beginning Website Development ', 4, 40, 'Active'),
(1, NULL, 'COSW 20 Front End Website Development', 4, 41, 'Active'),
(1, NULL, 'COSW 200 Introduction to JavaScript and jQuery ', 4, 42, 'Active'),
(1, NULL, 'COSP 201 Intro to Mobile App Development *', 1, 43, 'Active'),
(1, NULL, 'COSW 30 Database Programming with PHP/MySQL  *', 3, 44, 'Active'),
(1, NULL, 'COSW 230 Web Development Frameworks *', 4, 45, 'Active'),
(1, NULL, ' COSW 240 Intro to Content Management Systems*', 3, 46, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `DEPARTMENTS`
--

CREATE TABLE `DEPARTMENTS` (
  `department_id` int(11) NOT NULL,
  `department_name` varchar(30) NOT NULL,
  `degree_certificate` varchar(55) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `DEPARTMENTS`
--

INSERT INTO `DEPARTMENTS` (`department_id`, `department_name`, `degree_certificate`, `user_id`, `status`) VALUES
(1, 'Operations', 'Certificate', 1, 'Active'),
(2, 'Web Development', 'Degree', 3, 'I'),
(3, 'Database Management', 'Degree', 5, 'Active'),
(6, 'math', 'calc', 3, 'Active'),
(7, 'slytherin', 'purple', 3, 'Active'),
(8, 'Muggle Land', 'purple', 3, 'Active'),
(9, 'Web Developer', 'degree', 9, 'Active'),
(10, 'Android App Development', 'certificate', 9, 'Active'),
(11, 'PHP Web Development', 'certificate', 9, 'Active'),
(12, 'Web Developer', 'certificate', 9, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `GRADES`
--

CREATE TABLE `GRADES` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(25) NOT NULL,
  `grade` varchar(1) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `GRADES`
--

INSERT INTO `GRADES` (`course_id`, `course_name`, `grade`, `user_id`) VALUES
(2, 'COSW-30 PHP MySQL', 'A', 2),
(3, 'COSP-38 Database Concepts', 'B', 4);

-- --------------------------------------------------------

--
-- Table structure for table `NOTES`
--

CREATE TABLE `NOTES` (
  `course_name` varchar(25) NOT NULL,
  `student_id` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `scholarship` varchar(25) NOT NULL,
  `internship` varchar(25) NOT NULL,
  `notes` text NOT NULL,
  `record_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `NOTES`
--

INSERT INTO `NOTES` (`course_name`, `student_id`, `faculty_id`, `scholarship`, `internship`, `notes`, `record_id`) VALUES
('COSW-30', 2, 3, '', 'Yes', 'Student expressed interest in local web development internship', 1),
('COSP-38 Database Concepts', 4, 5, 'Yes', '', 'Promising student', 2);

-- --------------------------------------------------------

--
-- Table structure for table `STUDENT_ENROLLMENT`
--

CREATE TABLE `STUDENT_ENROLLMENT` (
  `student_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `enrollment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `STUDENT_ENROLLMENT`
--

INSERT INTO `STUDENT_ENROLLMENT` (`student_id`, `department_id`, `enrollment_date`) VALUES
(2, 2, '2020-09-01'),
(4, 3, '2019-08-01');

-- --------------------------------------------------------

--
-- Table structure for table `USERS`
--

CREATE TABLE `USERS` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(25) NOT NULL,
  `phone_number` varchar(12) NOT NULL,
  `user_role` varchar(15) NOT NULL,
  `major` varchar(25) NOT NULL,
  `status` varchar(30) NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `USERS`
--

INSERT INTO `USERS` (`user_id`, `first_name`, `last_name`, `password`, `email`, `phone_number`, `user_role`, `major`, `status`, `last_login`) VALUES
(1, 'Boss', 'Baby', '1developer', 'bossbaby@rattle.com', '123-234-4567', 'Admin', '', 'inactive', '2020-11-16 00:52:19'),
(2, 'H T', 'Emel', 'javascript', 'notfound@hotmail.com', '123-456-7890', 'Student', 'Web Development', 'active', '2020-11-13 05:15:32'),
(3, 'professor', 'webdev', 'developer', 'webdev@lbcc.edu', '555-555-5555', 'Faculty', 'Web Development', 'active', '2020-11-13 05:15:37'),
(4, 'Jenny', 'Oracle', 'oraclesql', 'calljenny@hotmail.com', '981-867-5309', 'Student', 'Database Management', 'active', '2020-11-13 05:15:42'),
(5, 'Doctor', 'Database', 'microsoft', 'database@lbcc.edu', '555-555-5555', 'Faculty', 'Database Management', 'active', '2020-11-13 05:15:46'),
(6, 'Eric', 'Johnson', 'tempABC123!', 'me@example.com', '', 'Student', '', 'I', '2020-11-15 21:39:32'),
(7, 'Eric', 'Johnson', 'tempABC123!', 'eric@example', '', 'Student', '', 'I', '2020-11-15 21:15:24'),
(8, 'Alivia', 'Rossw', 'tempABC123!', 'winner@example.com', '', 'Student', '', 'active', '2020-11-15 18:52:48'),
(9, 'Alivia', 'Rossw', 'tempABC123!', 'winner@example.com', '', 'Student', '', 'active', '2020-11-15 18:53:13'),
(10, 'tom', 'thumb', 'ABC123!', 'tom@example.com', '', 'Faculty', '', 'active', '2020-11-16 03:25:53'),
(11, 'tom', 'thumb', 'tempABC123!', 'thumb@example.com', '', 'Faculty', '', 'active', '2020-11-16 03:11:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `COURSES`
--
ALTER TABLE `COURSES`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `DEPARTMENTS`
--
ALTER TABLE `DEPARTMENTS`
  ADD PRIMARY KEY (`department_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `GRADES`
--
ALTER TABLE `GRADES`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `GRADES_ibfk_1` (`user_id`);

--
-- Indexes for table `NOTES`
--
ALTER TABLE `NOTES`
  ADD PRIMARY KEY (`record_id`),
  ADD KEY `user_id` (`student_id`),
  ADD KEY `faculty_id` (`faculty_id`);

--
-- Indexes for table `STUDENT_ENROLLMENT`
--
ALTER TABLE `STUDENT_ENROLLMENT`
  ADD PRIMARY KEY (`department_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `USERS`
--
ALTER TABLE `USERS`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `COURSES`
--
ALTER TABLE `COURSES`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `DEPARTMENTS`
--
ALTER TABLE `DEPARTMENTS`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `GRADES`
--
ALTER TABLE `GRADES`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `NOTES`
--
ALTER TABLE `NOTES`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `STUDENT_ENROLLMENT`
--
ALTER TABLE `STUDENT_ENROLLMENT`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `USERS`
--
ALTER TABLE `USERS`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `COURSES`
--
ALTER TABLE `COURSES`
  ADD CONSTRAINT `COURSES_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `DEPARTMENTS` (`department_id`);

--
-- Constraints for table `DEPARTMENTS`
--
ALTER TABLE `DEPARTMENTS`
  ADD CONSTRAINT `DEPARTMENTS_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `USERS` (`user_id`);

--
-- Constraints for table `GRADES`
--
ALTER TABLE `GRADES`
  ADD CONSTRAINT `GRADES_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `STUDENT_ENROLLMENT` (`student_id`),
  ADD CONSTRAINT `GRADES_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `COURSES` (`course_id`);

--
-- Constraints for table `NOTES`
--
ALTER TABLE `NOTES`
  ADD CONSTRAINT `NOTES_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `STUDENT_ENROLLMENT` (`student_id`),
  ADD CONSTRAINT `NOTES_ibfk_2` FOREIGN KEY (`faculty_id`) REFERENCES `USERS` (`user_id`);

--
-- Constraints for table `STUDENT_ENROLLMENT`
--
ALTER TABLE `STUDENT_ENROLLMENT`
  ADD CONSTRAINT `STUDENT_ENROLLMENT_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `USERS` (`user_id`),
  ADD CONSTRAINT `STUDENT_ENROLLMENT_ibfk_2` FOREIGN KEY (`department_id`) REFERENCES `DEPARTMENTS` (`department_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
