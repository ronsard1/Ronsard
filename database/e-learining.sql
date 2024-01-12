-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2024 at 11:14 AM
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
-- Database: `e-learining`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_name` varchar(200) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `first_name`, `last_name`, `email`, `user_name`, `password`, `role`) VALUES
(5, 'rugirangoga', 'ronsard ', 'ronsardrugirangoga2003@gmail.com', 'ronsard', '1234', 'supper_admin'),
(6, 'rugirangoga', 'ronsard ', 'mwesigyenathan42@gmail.com', 'ron12', '0000', 'admin\r\n'),
(7, 'ishimwe', 'kevin', 'bushugukevin02@gmail.com', 'kevin', 'kevin', 'admin'),
(30, 'dieudonne', 'byiringiro', 'dieudonnebyiringiro2020@gmail.com', 'didos', '   ', 'admin'),
(60, 'niyonzima', 'elyse', 'elyse@gmail.com', 'ronsard_1', 'elyse', 'admin'),
(61, 'niyigena ', 'abel', 'abel@gmail.com', 'abel', 'abel', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `aid` int(11) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `ans_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`aid`, `answer`, `ans_id`) VALUES
(1, 'Iron Man', 1),
(2, 'Sherlock Holmes', 1),
(3, 'Avatar', 1),
(4, 'Detective Doodle', 1),
(5, 'India', 2),
(6, 'United States', 2),
(7, 'Finland', 2),
(8, 'Germany', 2),
(9, 'Mercury', 3),
(10, 'Venus', 3),
(11, 'Earth', 3),
(12, 'Mars', 3),
(13, 'Alpha', 4),
(14, 'Beta', 4),
(15, 'Gamma', 4),
(16, 'Delta', 4);

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `id` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `content_text` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `instructor_id` int(11) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `file_data` blob DEFAULT NULL,
  `course_photo` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `title`, `description`, `instructor_id`, `category`, `file_data`, `course_photo`) VALUES
(9, 'cprogram', 'nice course for all', NULL, 'programing', 0x646f776e6c6f616473312061737369676e6d656e742e706466, 0x7069637475726573636f75727365342e6a7067),
(23, 'cyber security', 'this nice course for all ', NULL, 'computer security', 0x646f776e6c6f616473646f776e6c6f6164737068797369632061737369676e6d656e742e706466, 0x7069637475726573636f75727365322e6a7067),
(24, 'Html', 'for beginners  ', NULL, 'programing', 0x646f776e6c6f616473646f776e6c6f616473646f776e6c6f6164737068797369632061737369676e6d656e742e706466, 0x7069637475726573636f75727365332e706e67),
(25, 'Html', 'for beginners  ', NULL, 'programing', 0x646f776e6c6f616473646f776e6c6f616473646f776e6c6f6164737068797369632061737369676e6d656e742e706466, 0x7069637475726573636f75727365332e706e67),
(26, 'networking', 'network course for all', NULL, 'networking', 0x646f776e6c6f616473646f776e6c6f616473646f776e6c6f616473646f776e6c6f6164737068797369632061737369676e6d656e742e706466, 0x7069637475726573636f75727365342e6a7067),
(27, 'data analysis', ' special course', NULL, '', 0x646f776e6c6f616473312061737369676e6d656e742e706466, 0x636f75727365332e706e67),
(28, 'data analysis', 'special course', NULL, 'computer security', 0x646f776e6c6f616473646f776e6c6f616473646f776e6c6f6164737068797369632061737369676e6d656e742e706466, 0x7069637475726573636f75727365332e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `message_content` varchar(255) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `message_content`, `student_id`, `email`, `time_stamp`) VALUES
(1, 'i appreciate so much for the content u&#39;ve been provided.', NULL, NULL, '2024-01-03 10:10:38'),
(2, 'ffffff', NULL, NULL, '2024-01-03 10:10:38'),
(9, 'i like content', NULL, 'dieudonnebyiringiro2020@gmail.com', '2024-01-03 11:23:00'),
(10, 'nice  content', NULL, 'ronsardrugirangoga2003@gmail.com', '2024-01-03 11:29:17');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `qid` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `ans_id` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`qid`, `question`, `ans_id`, `course_id`) VALUES
(1, 'What character has both Robert Downey Jr. and Benedict Cumberbatch played?', 2, 9),
(2, 'What country drinks the most coffee per capita?', 7, 9),
(3, 'Which planet in the Milky Way is the hottest?', 10, 9),
(4, 'What is the 4th letter of the Greek alphabet?', 16, 9);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `enrollment_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `first_name`, `last_name`, `email`, `user_name`, `password`, `enrollment_date`) VALUES
(8, 'rugirangoga', 'porte', 'titorutaremara85@gmail.com', 'mwesigye', '1234', NULL),
(13, 'rugirangoga', 'ronsard ', 'ronsardrugirangoga2003@gmail.com', 'ronsard', '123', NULL),
(17, 'rugirangoga', 'ronsard ', 'ronsardrugirangoga2003@gmail.com', 'ronsard', 'rugambwa', NULL),
(21, 'dieudonne', 'byiringiro', 'dieudonnebyiringiro2020@gmail.com', 'ronsard_1', '    ', NULL),
(22, 'dieudonne', 'byiringiro', 'dieudonnebyiringiro2020@gmail.com', 'ronsard_1', '    ', NULL),
(23, 'dieudonne', 'byiringiro', 'dieudonnebyiringiro2020@gmail.com', 'ronsard_1', '    ', NULL),
(24, 'dieudonne', 'byiringiro', 'dieudonnebyiringiro2020@gmail.com', 'ronsard_1', '     2222', NULL),
(25, 'dieudonne', 'byiringiro', 'dieudonnebyiringiro2020@gmail.com', 'ronsard_1', '1111', NULL),
(26, 'dieudonne', 'byiringiro', 'dieudonnebyiringiro2020@gmail.com', 'ronsard_1', '1111', NULL),
(27, 'ruhinda', 'hertier', 'dieudonnebyiringiro2020@gmail.com', 'gifunga', '33333', NULL),
(28, 'ruhinda', 'hertier', 'dieudonnebyiringiro2020@gmail.com', 'gifunga', '33333', NULL),
(29, 'ruhinda', 'hertier', 'dieudonnebyiringiro2020@gmail.com', 'gifunga', '33333', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tutorial`
--

CREATE TABLE `tutorial` (
  `tutorial_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `video_path` varchar(255) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tutorial`
--

INSERT INTO `tutorial` (`tutorial_id`, `title`, `video_path`, `course_id`) VALUES
(1, 'c programming', 'videosvid1.mp4', 9),
(2, 'c programming', 'videosvid1.mp4', 9),
(3, 'cyber security', 'videosvid1.mp4', 23),
(9, 'c program', 'videos1.mp4', 9),
(10, 'c program', 'videos1.mp4', 9),
(11, 'c program', 'videos1.mp4', 9),
(12, 'c program', 'videosMwarakoze Inkotanyi By Nyirinkindi Official Video - Trim3.mp4', 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `instructor_id` (`instructor_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`qid`),
  ADD KEY `FK_questions_course_id` (`course_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `tutorial`
--
ALTER TABLE `tutorial`
  ADD PRIMARY KEY (`tutorial_id`),
  ADD KEY `course_id` (`course_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tutorial`
--
ALTER TABLE `tutorial`
  MODIFY `tutorial_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `content`
--
ALTER TABLE `content`
  ADD CONSTRAINT `content_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`);

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`instructor_id`) REFERENCES `admin` (`admin_id`);

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `FK_questions_course_id` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`);

--
-- Constraints for table `tutorial`
--
ALTER TABLE `tutorial`
  ADD CONSTRAINT `tutorial_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
