-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 19, 2020 at 04:01 PM
-- Server version: 5.7.32-log
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grethelc_group`
--

-- --------------------------------------------------------

--
-- Table structure for table `COURSES`
--

CREATE TABLE `COURSES` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(25) NOT NULL,
  `course_description` varchar(255) NOT NULL,
  `units` float NOT NULL DEFAULT '4',
  `department_id` int(11) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `COURSES`
--

INSERT INTO `COURSES` (`course_id`, `course_name`, `course_description`, `units`, `department_id`, `status`) VALUES
(1, 'COSA 50', 'Intro to IT Concepts & Applications', 4, 1, 'Active'),
(4, 'COSP 7', 'Programming Concepts and Methodologies', 4, 1, 'Active'),
(5, 'COSP 38', 'Database Concepts ', 4, 1, 'Active'),
(11, 'COSW 10', 'Beginning Website Development', 4, 1, 'Active'),
(12, 'COSW 20', 'Front End Website Development', 4, 1, 'Active'),
(13, 'COSW 30', 'Web Development with PHP/MySQL ', 4, 1, 'Active'),
(14, 'COSW 200 ', 'Introduction to JavaScript and JQuery', 4, 1, 'Active'),
(15, 'COSW 240', 'Intro to Content Management Systems', 4, 1, 'Active'),
(20, 'CS 21', 'Introduction to Computer Science - Java', 4, 1, 'Active'),
(21, 'CS 11 ', 'Introduction to Computer Science – C++', 4, 1, 'Active'),
(22, 'COSP 230', 'Android App Development in Java', 3, 1, 'Active'),
(23, 'COSP 201', 'Intro to Mobile App Development', 1, 1, 'Active'),
(36, 'BCOM 15', 'Business Communications', 3, 2, 'Inactive'),
(37, 'COSA 2 ', 'Critical Thinking Using Computers', 3, 2, 'Active'),
(38, 'COSA 25', 'Microsoft Access for Windows', 3, 2, 'Active'),
(39, 'COSN 205', 'UNIX/LINUX Fundamentals', 4, 2, 'Active'),
(40, 'COSN 250', 'Introduction to Cloud Computing', 3, 2, 'Active'),
(41, 'COSP 237', 'Database Programming with SQL', 4, 2, 'Active'),
(49, 'CS 22', 'Data Structures and Algorithms', 3, 3, 'Active'),
(50, 'CS 51', 'Introduction to Computer Architecture', 4, 3, 'Active'),
(51, 'CS 61', 'Discrete Structures', 4, 3, 'Active'),
(52, 'PHYS 3B', 'Physics for Sci. & Eng. – E & M', 4.5, 3, 'Inactive'),
(53, 'MATH 60/60H ', 'First Calculus Course/Honors', 5, 3, 'Active'),
(54, 'MATH 70/70H', 'Second Calculus Course/Honors', 5, 3, 'Active'),
(55, 'PHYS 3A', 'Physics for Sci. & Eng. - Mechanics', 5.5, 3, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `DEGREE_CERTIFICATE`
--

CREATE TABLE `DEGREE_CERTIFICATE` (
  `cert_deg_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `cert_deg_name` varchar(25) NOT NULL,
  `cert_deg_type` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `DEGREE_CERTIFICATE`
--

INSERT INTO `DEGREE_CERTIFICATE` (`cert_deg_id`, `course_id`, `cert_deg_name`, `cert_deg_type`) VALUES
(1, 1, 'test1', 'test2'),
(2, 14, 'degree name test2', 'degree type tes'),
(3, 1, 'test3', 'test3type');

-- --------------------------------------------------------

--
-- Table structure for table `DEPARTMENTS`
--

CREATE TABLE `DEPARTMENTS` (
  `department_id` int(11) NOT NULL,
  `department_name` varchar(30) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `DEPARTMENTS`
--

INSERT INTO `DEPARTMENTS` (`department_id`, `department_name`, `status`) VALUES
(1, 'Web Development', 'Active'),
(2, 'Computer_Science', 'Active'),
(3, 'Computer Security & Networking', 'Active'),
(34, 'pokemon', 'Active'),
(35, 'lets go', 'Active'),
(36, 'lets go1', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `GRADES`
--

CREATE TABLE `GRADES` (
  `course_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_name` varchar(25) NOT NULL,
  `semester` varchar(15) NOT NULL,
  `grade` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `NOTES`
--

CREATE TABLE `NOTES` (
  `record_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `course_name` varchar(25) NOT NULL,
  `scholarship` varchar(25) NOT NULL,
  `internship` varchar(25) NOT NULL,
  `notes` text NOT NULL,
  `date_created` datetime NOT NULL,
  `last_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `NOTES`
--

INSERT INTO `NOTES` (`record_id`, `user_id`, `faculty_id`, `course_name`, `scholarship`, `internship`, `notes`, `date_created`, `last_modified`) VALUES
(1, 1, 1, '', 'yes', '', 'test notes', '2020-11-19 01:19:47', '2020-11-19 06:19:47'),
(2, 2, 2, '', '', 'yes', 'test notes 2', '2020-11-19 01:19:49', '2020-11-19 06:20:05');

--
-- Triggers `NOTES`
--
DELIMITER $$
CREATE TRIGGER `creation_date1` BEFORE INSERT ON `NOTES` FOR EACH ROW SET NEW.date_created = NOW()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `USERS`
--

CREATE TABLE `USERS` (
  `user_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `major` varchar(25) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `birthday` date NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(25) NOT NULL,
  `phone_number` varchar(12) NOT NULL,
  `user_role` varchar(15) NOT NULL DEFAULT 'Student',
  `date_created` datetime NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `profile_image` varchar(80) DEFAULT 'default_pic.png',
  `status` varchar(20) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `USERS`
--

INSERT INTO `USERS` (`user_id`, `department_id`, `major`, `first_name`, `last_name`, `birthday`, `password`, `email`, `phone_number`, `user_role`, `date_created`, `last_login`, `profile_image`, `status`) VALUES
(1, 1, 'Bussiness Information', 'Boss', 'Baby', '2020-11-26', 'rattle', 'bossbaby@rattle.com', '1231234567', 'Admin', '2020-11-16 22:52:36', '2020-11-19 05:42:00', 'pfp.png', 'Active'),
(2, 1, 'Web Development', 'Gorden', 'Chow', '0000-00-00', '$2y$10$cEtx9TY88lcSl.yk1PblcOaRcMUFCOxDG7V1nhcR0B25Z73FzdJv6', 'chowgorden@yahoo.com', '6263203106', 'Student', '2020-11-17 00:56:50', '2020-11-19 05:41:56', 'default_pic.png', 'Active'),
(3, 1, 'Web Development', 'Grethel', 'Padilla', '1991-06-30', '12345', 'grethelpad@gmail.com', '5624163701', '', '2020-11-19 01:27:18', '2020-11-19 06:28:45', 'default_pic.png', 'Active');

--
-- Triggers `USERS`
--
DELIMITER $$
CREATE TRIGGER `creation_date` BEFORE INSERT ON `USERS` FOR EACH ROW SET NEW.date_created = NOW()
$$
DELIMITER ;

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
-- Indexes for table `DEGREE_CERTIFICATE`
--
ALTER TABLE `DEGREE_CERTIFICATE`
  ADD PRIMARY KEY (`cert_deg_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `DEPARTMENTS`
--
ALTER TABLE `DEPARTMENTS`
  ADD PRIMARY KEY (`department_id`);

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
  ADD KEY `user_id` (`user_id`),
  ADD KEY `faculty_id` (`faculty_id`);

--
-- Indexes for table `USERS`
--
ALTER TABLE `USERS`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `department_id` (`department_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `COURSES`
--
ALTER TABLE `COURSES`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `DEGREE_CERTIFICATE`
--
ALTER TABLE `DEGREE_CERTIFICATE`
  MODIFY `cert_deg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `DEPARTMENTS`
--
ALTER TABLE `DEPARTMENTS`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `GRADES`
--
ALTER TABLE `GRADES`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `NOTES`
--
ALTER TABLE `NOTES`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `USERS`
--
ALTER TABLE `USERS`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `COURSES`
--
ALTER TABLE `COURSES`
  ADD CONSTRAINT `COURSES_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `DEPARTMENTS` (`department_id`) ON UPDATE CASCADE;

--
-- Constraints for table `DEGREE_CERTIFICATE`
--
ALTER TABLE `DEGREE_CERTIFICATE`
  ADD CONSTRAINT `DEGREE_CERTIFICATE_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `COURSES` (`course_id`);

--
-- Constraints for table `GRADES`
--
ALTER TABLE `GRADES`
  ADD CONSTRAINT `GRADES_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `USERS` (`user_id`),
  ADD CONSTRAINT `GRADES_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `COURSES` (`course_id`);

--
-- Constraints for table `NOTES`
--
ALTER TABLE `NOTES`
  ADD CONSTRAINT `NOTES_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `USERS` (`user_id`),
  ADD CONSTRAINT `NOTES_ibfk_2` FOREIGN KEY (`faculty_id`) REFERENCES `USERS` (`user_id`);

--
-- Constraints for table `USERS`
--
ALTER TABLE `USERS`
  ADD CONSTRAINT `USERS_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `DEPARTMENTS` (`department_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
