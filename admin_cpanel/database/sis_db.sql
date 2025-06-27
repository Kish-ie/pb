-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2025 at 10:02 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sis_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_history`
--

CREATE TABLE `academic_history` (
  `id` int(30) NOT NULL,
  `student_id` int(30) NOT NULL,
  `course_id` int(30) NOT NULL,
  `semester` varchar(200) NOT NULL,
  `year` varchar(200) NOT NULL,
  `school_year` text NOT NULL,
  `status` int(10) NOT NULL DEFAULT 1 COMMENT '1= New,\r\n2= Regular,\r\n3= Returnee,\r\n4= Transferee',
  `end_status` tinyint(3) NOT NULL DEFAULT 0 COMMENT '0=pending,\r\n1=Completed,\r\n2=Dropout,\r\n3=failed,\r\n4=Transferred-out,\r\n5=Graduated',
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `academic_history`
--

INSERT INTO `academic_history` (`id`, `student_id`, `course_id`, `semester`, `year`, `school_year`, `status`, `end_status`, `date_created`, `date_updated`) VALUES
(1, 1, 11, 'First Semester', '1st Year', '2018-2019', 1, 1, '2022-01-27 13:02:36', '2022-01-27 13:22:31'),
(2, 1, 11, 'Second Semester', '1st Year', '2018-2019', 2, 1, '2022-01-27 13:22:24', '2022-01-27 13:22:44'),
(3, 1, 11, 'Third Semester', '1st Year', '2018-2019', 2, 1, '2022-01-27 13:23:32', NULL),
(5, 1, 11, 'First Semester', '2nd Year', '2019-2020', 2, 1, '2022-01-27 13:28:01', NULL),
(6, 1, 11, 'Second Semester', '2nd Year', '2019-2020', 2, 1, '2022-01-27 13:28:26', NULL),
(7, 1, 11, 'Third Semester', '2nd Year', '2019-2020', 2, 2, '2022-01-27 13:28:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `course_list`
--

CREATE TABLE `course_list` (
  `id` int(30) NOT NULL,
  `department_id` int(30) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_list`
--

INSERT INTO `course_list` (`id`, `department_id`, `name`, `description`, `status`, `delete_flag`, `date_created`, `date_updated`) VALUES
(1, 2, 'Accounting for Non-Accountants', 'Bachelor of Science in Information Technology', 1, 0, '2022-01-27 10:03:25', '2025-06-12 17:25:04'),
(2, 4, 'CPA', 'Certified Public Accountants (CPA)', 1, 1, '2022-01-27 10:06:43', '2025-06-12 17:55:56'),
(3, 4, 'BSEd', 'Bachelor of Secondary Education', 1, 1, '2022-01-27 10:07:21', '2025-06-12 17:52:45'),
(4, 4, 'MAEd', 'Master of Arts in Education', 1, 1, '2022-01-27 10:07:52', '2025-06-12 17:55:11'),
(5, 4, 'PhD Educ', 'Doctor of Philosophy in Education', 1, 1, '2022-01-27 10:08:21', '2025-06-12 17:40:46'),
(6, 1, 'BSCE', 'Bachelor of Science in Civil Engineering', 1, 1, '2022-01-27 10:08:48', '2025-06-12 17:41:10'),
(7, 1, 'MSCE', 'Master of Science in Civil Engineering', 1, 1, '2022-01-27 10:09:00', '2025-06-12 17:54:27'),
(8, 3, 'CAMS', 'Certificate in Accounting and Management Skills', 1, 1, '2022-01-27 10:09:35', '2025-06-12 17:53:09'),
(9, 1, 'MS ChE', 'Master of Science in Chemical Engineering', 1, 1, '2022-01-27 10:10:16', '2025-06-12 17:54:49'),
(10, 1, 'DEngg ChE', 'Doctor of Engineering (Chemical Engineering)', 1, 1, '2022-01-27 10:10:39', '2025-06-12 17:55:34'),
(11, 1, 'BSCS', 'Bachelor of Science in Computer Science', 1, 1, '2022-01-27 10:12:23', '2025-06-12 17:41:33'),
(12, 1, 'MSCS', 'Master of Science in Computer Science', 1, 1, '2022-01-27 10:12:35', '2025-06-12 17:53:42'),
(13, 3, '	Advanced Portfolio Management', '	Advanced Portfolio Management', 1, 0, '2025-06-12 17:57:36', NULL),
(14, 3, 'Personal Finance', 'Personal Finance', 1, 0, '2025-06-12 17:58:13', NULL),
(15, 3, 'Treasury and Risk Management', 'Treasury and Risk Management', 1, 0, '2025-06-12 17:58:44', NULL),
(16, 3, 'Real Estate Development, Investment and Management', 'Real Estate Development, Investment and Management', 1, 0, '2025-06-12 18:00:18', NULL),
(17, 3, 'Program for Managers and Executives in Strategic Communication', 'Program for Managers and Executives in Strategic Communication', 1, 0, '2025-06-12 18:00:59', NULL),
(18, 3, 'Corporate Social Responsibility', 'Corporate Social Responsibility', 1, 0, '2025-06-12 18:02:29', NULL),
(19, 3, 'Competency-Based Hiring', 'Competency-Based Hiring', 1, 0, '2025-06-12 18:03:29', NULL),
(20, 3, 'Advanced Financial Management, Grants Management, and Auditing for Donor-Funded Projects', 'Advanced Financial Management, Grants Management, and Auditing for Donor-Funded Projects', 1, 0, '2025-06-12 18:04:41', NULL),
(21, 4, 'Advanced Excel for Corporates', 'Advanced Excel for Corporates', 1, 0, '2025-06-12 18:05:47', NULL),
(22, 4, 'Quantitative Data Management and Analysis with Stata Training', 'Quantitative Data Management and Analysis with Stata Training', 1, 0, '2025-06-12 18:06:23', NULL),
(23, 4, 'Data Management and Statistical Analysis Using Stata', 'Data Management and Statistical Analysis Using Stata', 1, 0, '2025-06-12 18:07:05', NULL),
(24, 4, 'Panel Data Models in Stata Course', 'Panel Data Models in Stata Course', 1, 0, '2025-06-12 18:07:52', NULL),
(25, 4, 'Research Design, Data Management and Statistical Analysis Using Spss Workshop', 'Research Design, Data Management and Statistical Analysis Using Spss Workshop', 1, 0, '2025-06-12 18:08:30', NULL),
(26, 1, 'Seminar on Nutritionally Intelligent and Nutritionally Resilient Programming', 'Seminar on Nutritionally Intelligent and Nutritionally Resilient Programming', 1, 0, '2025-06-12 18:09:18', NULL),
(27, 1, 'Training Course on Infectious Disease Modelling and Applications', 'Training Course on Infectious Disease Modelling and Applications', 1, 0, '2025-06-12 18:09:56', NULL),
(28, 1, 'Workshop on Behaviour Change Communication for Health Promotion', 'Workshop on Behaviour Change Communication for Health Promotion', 1, 0, '2025-06-12 18:10:47', NULL),
(29, 1, 'Monitoring and Evaluation for Health Programs', 'Monitoring and Evaluation for Health Programs', 1, 0, '2025-06-12 18:13:19', NULL),
(30, 7, 'Maintenance Scheduling Utilizing Big Data, IoT & Agent Based Simulation', 'Maintenance Scheduling Utilizing Big Data, IoT & Agent Based Simulation', 1, 0, '2025-06-12 18:14:07', NULL),
(31, 7, 'Seminar on Cybercrime and Digital Vulnerability', 'Seminar on Cybercrime and Digital Vulnerability', 1, 0, '2025-06-12 18:14:58', NULL),
(32, 7, 'Information Security and Data Management Training', 'Information Security and Data Management Training', 1, 0, '2025-06-12 18:17:11', NULL),
(33, 7, 'Mobile Data Acquisition Utilizing Ona and Kobo Toolbox', 'Mobile Data Acquisition Utilizing Ona and Kobo Toolbox', 1, 0, '2025-06-12 18:19:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `department_list`
--

CREATE TABLE `department_list` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department_list`
--

INSERT INTO `department_list` (`id`, `name`, `description`, `status`, `delete_flag`, `date_created`, `date_updated`) VALUES
(1, 'HEALTH SCIENCES COURSES', 'Health sciences is a broad field encompassing the study of human health, well-being, and medical care. It involves the application of scientific principles to understand, diagnose, treat, and prevent diseases and promote overall health.', 1, 0, '2022-01-27 09:22:31', '2025-06-12 17:29:18'),
(2, 'ACCOUNTING COURSES', 'Accounting is the process of recording, summarizing, analyzing, and interpreting financial transactions for a business or organization.', 1, 0, '2022-01-27 09:22:54', '2025-06-12 17:23:57'),
(3, 'BUSINESS COURSES', 'Business is an organization or enterprising entity engaged in commercial, industrial, or professional activities. It’s essentially any activity or enterprise undertaken for profit.', 1, 0, '2022-01-27 09:23:20', '2025-06-12 17:26:08'),
(4, 'DATA ANALYTICS COURSES', 'Data analysis is the process of examining data to extract meaningful insights and information. It involves collecting, cleaning, transforming, and modeling data to discover patterns, trends, and relationships that can be used to make informed decisions.', 1, 0, '2022-01-27 09:25:42', '2025-06-12 17:27:32'),
(5, 'CSSP', 'College of Social Sciences and Philosophy', 1, 1, '2022-01-27 09:26:35', '2025-06-12 17:37:08'),
(6, 'Sample101', 'Deleted Department', 1, 1, '2022-01-27 09:27:17', '2022-01-27 09:27:28'),
(7, 'ICT COURSES', 'ICT stands for Information and Communication Technology. It’s a broad term that refers to all the technologies used to transmit, store, create, share, or exchange information.', 1, 0, '2025-06-12 17:30:36', NULL),
(8, 'MONITORING & EVALUATION COURSES', 'Monitoring and Evaluation (M&E) is a systematic process used to assess the progress, effectiveness, and impact of projects, programs, or initiatives. It involves collecting, analyzing, and using data to inform decision-making and improve outcomes.', 1, 0, '2025-06-12 17:31:29', NULL),
(9, 'PEACE AND CONFLICT MANAGEMENT COURSES', 'Peace and conflict management is the study and practice of preventing, managing, and resolving conflicts peacefully. It involves understanding the root causes of conflict, developing conflict resolution strategies, and promoting peace and reconciliation.', 1, 0, '2025-06-12 17:32:06', NULL),
(10, 'PROJECT MANAGEMENT COURSES', 'Project management is the process of planning, organizing, and overseeing the completion of a specific project. 1 It involves coordinating a team of people and resources to achieve defined objectives within a given timeframe and budget.', 1, 0, '2025-06-12 17:32:57', NULL),
(11, 'SOCIAL DEVELOPMENT', 'Social development is an interdisciplinary field that focuses on understanding and addressing social issues and challenges. It combines elements of sociology, psychology, economics, political science, and other disciplines to examine how societies function and how they can be improved', 1, 0, '2025-06-12 17:33:42', NULL),
(12, 'AGRICULTURE', 'Agriculture is the practice of cultivating plants and animals for food and other products.', 1, 0, '2025-06-12 17:36:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `download_list`
--

CREATE TABLE `download_list` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `file_path` text NOT NULL,
  `date_uploaded` datetime DEFAULT current_timestamp(),
  `status` tinyint(1) DEFAULT 1,
  `delete_flag` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `download_list`
--

INSERT INTO `download_list` (`id`, `title`, `description`, `file_path`, `date_uploaded`, `status`, `delete_flag`) VALUES
(1, 'ict book pdf', 'ict book', 'https://www.google.com/url?client=internal-element-cse&cx=76e901c945305e40e&q=http://lgs.edu.pk/wp-content/uploads/2016/02/ICT-BOOK-New-edition.pdf&sa=U&ved=2ahUKEwiyncCBp-yNAxXWQUEAHRBPH4EQFnoECAUQAQ&usg=AOvVaw3keHcb6QzKatmpOMki9H6R&fexp=72986053,72986052', '0000-00-00 00:00:00', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `employee_list`
--

CREATE TABLE `employee_list` (
  `id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `department` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `image_url` text NOT NULL,
  `description` text DEFAULT NULL,
  `date_created` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `title`, `image_url`, `description`, `date_created`) VALUES
(1, 'pic', 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1471&q=80', 'test image', '0000-00-00 00:00:00'),
(2, 'pic', 'https://images.unsplash.com/photo-1575979016006-6c74267c4087?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjB8fGNvbGxlZ2UlMjBzdHVkZW50cyUyMGFmcmljYXxlbnwwfHwwfHx8MA%3D%3D', 'test image', '0000-00-00 00:00:00'),
(3, 'pic', 'https://images.unsplash.com/photo-1639436926668-2f8b4f32e15a?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8Y29sbGVnZSUyMHN0dWRlbnRzJTIwYWZyaWNhfGVufDB8fDB8fHww', 'test image', '0000-00-00 00:00:00'),
(4, 'pic', 'https://images.unsplash.com/photo-1645263012668-a6617115f9b9?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8Y29sbGVnZSUyMHN0dWRlbnRzJTIwYWZyaWNhfGVufDB8fDB8fHww', 'test image', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `student_list`
--

CREATE TABLE `student_list` (
  `id` int(30) NOT NULL,
  `roll` varchar(100) NOT NULL,
  `firstname` text NOT NULL,
  `middlename` text DEFAULT NULL,
  `lastname` text NOT NULL,
  `gender` varchar(100) NOT NULL,
  `contact` text NOT NULL,
  `present_address` text NOT NULL,
  `permanent_address` text NOT NULL,
  `dob` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_list`
--

INSERT INTO `student_list` (`id`, `roll`, `firstname`, `middlename`, `lastname`, `gender`, `contact`, `present_address`, `permanent_address`, `dob`, `status`, `delete_flag`, `date_created`, `date_updated`, `password`) VALUES
(1, '231415061007', 'Mark', 'D', 'Cooper', 'Male', '09123456789', 'This my sample present address.', 'This my sample permanent address.', '2007-06-23', 1, 0, '2022-01-27 11:14:07', '2025-06-08 21:25:00', 'user123');

-- --------------------------------------------------------

--
-- Table structure for table `system_info`
--

CREATE TABLE `system_info` (
  `id` int(30) NOT NULL,
  `meta_field` text NOT NULL,
  `meta_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `system_info`
--

INSERT INTO `system_info` (`id`, `meta_field`, `meta_value`) VALUES
(1, 'name', 'PB INSTITUTE OF RESEARCH AND TECHNOLOGY'),
(6, 'short_name', 'Pbirt'),
(11, 'logo', 'uploads/logo-1749035057.png'),
(13, 'user_avatar', 'uploads/user_avatar.jpg'),
(14, 'cover', 'uploads/cover-1749034962.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `middlename` text DEFAULT NULL,
  `lastname` varchar(250) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `avatar` text DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 0,
  `status` int(1) NOT NULL DEFAULT 1 COMMENT '0=not verified, 1 = verified',
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `middlename`, `lastname`, `username`, `password`, `avatar`, `last_login`, `type`, `status`, `date_added`, `date_updated`) VALUES
(1, 'Adminstrator', NULL, 'Admin', 'admin', '0192023a7bbd73250516f069df18b500', 'uploads/avatar-1.png?v=1749038029', NULL, 1, 1, '2021-01-20 14:02:37', '2025-06-04 14:53:49'),
(8, 'apollo', NULL, 'kim', 'jdoe', '6ad14ba9986e3615423dfca256d04e3f', 'uploads/avatar-8.png?v=1749397789', NULL, 2, 1, '2022-01-26 16:20:59', '2025-06-08 18:49:49');

-- --------------------------------------------------------

--
-- Table structure for table `vacancy_list`
--

CREATE TABLE `vacancy_list` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `department_id` int(11) NOT NULL,
  `date_posted` datetime DEFAULT current_timestamp(),
  `status` tinyint(1) DEFAULT 1,
  `delete_flag` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vacancy_list`
--

INSERT INTO `vacancy_list` (`id`, `title`, `description`, `department_id`, `date_posted`, `status`, `delete_flag`) VALUES
(1, 'IT Tutor', 'teaching and supervising to learners', 2, '0000-00-00 00:00:00', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_history`
--
ALTER TABLE `academic_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `course_list`
--
ALTER TABLE `course_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `department_list`
--
ALTER TABLE `department_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `download_list`
--
ALTER TABLE `download_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_list`
--
ALTER TABLE `employee_list`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_list`
--
ALTER TABLE `student_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_info`
--
ALTER TABLE `system_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vacancy_list`
--
ALTER TABLE `vacancy_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic_history`
--
ALTER TABLE `academic_history`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `course_list`
--
ALTER TABLE `course_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `department_list`
--
ALTER TABLE `department_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `download_list`
--
ALTER TABLE `download_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee_list`
--
ALTER TABLE `employee_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student_list`
--
ALTER TABLE `student_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `system_info`
--
ALTER TABLE `system_info`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `vacancy_list`
--
ALTER TABLE `vacancy_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `academic_history`
--
ALTER TABLE `academic_history`
  ADD CONSTRAINT `academic_history_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student_list` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `academic_history_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `course_list` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `course_list`
--
ALTER TABLE `course_list`
  ADD CONSTRAINT `course_list_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department_list` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
