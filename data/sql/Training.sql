CREATE DATABASE IF NOT EXISTS `Training`;

USE `Training`;

--
-- Database: `Training`
--

-- --------------------------------------------------------

--
-- Table structure for table `Categories`
--

CREATE TABLE `Categories` (
  `cat_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Categories`
--

INSERT INTO `Categories` (`cat_id`, `name`) VALUES
(1, 'Memory'),
(2, 'Reasoning'),
(3, 'Perception');

-- --------------------------------------------------------

--
-- Table structure for table `Courses`
--

CREATE TABLE `Courses` (
  `course_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Courses`
--

INSERT INTO `Courses` (`course_id`, `name`) VALUES
(1, 'Memory check for brain fit'),
(2, 'Reasoning for personality development '),
(3, 'Power of perception'),
(4, 'Memory online free check'),
(5, 'Reasoning for logical development'),
(6, 'Perception finding');

-- --------------------------------------------------------

--
-- Table structure for table `Exercises`
--

CREATE TABLE `Exercises` (
  `exercise_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `points` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Exercises`
--

INSERT INTO `Exercises` (`exercise_id`, `name`, `points`, `course_id`, `cat_id`) VALUES
(1, 'The power of focus - boost your brain', 127, 1, 1),
(2, 'Rewire your brain', 140, 1, 1),
(3, 'Improve reasoning by brain training', 189, 2, 2),
(4, 'Reasoning development by logical working of brain', 177, 2, 2),
(5, 'Visual Perception and the Brain', 145, 3, 3),
(6, 'Natural Perception with games', 189, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `Scores`
--

CREATE TABLE `Scores` (
  `user_id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Scores`
--

INSERT INTO `Scores` (`user_id`, `session_id`, `score`) VALUES
(2, 1, 267),
(2, 2, 366),
(2, 3, 334),
(3, 2, 183),
(3, 3, 167),
(4, 1, 67),
(4, 2, 92),
(2, 4, 366),
(2, 5, 334);

-- --------------------------------------------------------

--
-- Table structure for table `Sessions`
--

CREATE TABLE `Sessions` (
  `session_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `course_id` int(11) NOT NULL,
  `total_points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Sessions`
--

INSERT INTO `Sessions` (`session_id`, `date`, `course_id`, `total_points`) VALUES
(1, '2020-01-09 06:19:37', 1, 267),
(2, '2020-01-10 07:35:26', 2, 366),
(3, '2020-01-11 10:29:30', 3, 334),
(4, '2020-01-16 08:15:33', 5, 366),
(5, '2020-01-14 12:23:30', 6, 334);

-- --------------------------------------------------------

--
-- Table structure for table `Session_exercise`
--

CREATE TABLE `Session_exercise` (
  `session_id` int(11) NOT NULL,
  `exercise_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Session_exercise`
--

INSERT INTO `Session_exercise` (`session_id`, `exercise_id`) VALUES
(1, 1),
(1, 2),
(2, 3),
(2, 4),
(3, 5),
(3, 6),
(4, 4),
(4, 3),
(5, 5),
(5, 6);

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`user_id`, `username`, `status`) VALUES
(1, 'Stephen', 1),
(2, 'John', 1),
(3, 'Michael', 1),
(4, 'Parker', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Categories`
--
ALTER TABLE `Categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `Courses`
--
ALTER TABLE `Courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `Exercises`
--
ALTER TABLE `Exercises`
  ADD PRIMARY KEY (`exercise_id`),
  ADD KEY `Exercises_fk0` (`course_id`),
  ADD KEY `Exercises_fk1` (`cat_id`);

--
-- Indexes for table `Scores`
--
ALTER TABLE `Scores`
  ADD KEY `Scores_fk0` (`user_id`),
  ADD KEY `Scores_fk1` (`session_id`);

--
-- Indexes for table `Sessions`
--
ALTER TABLE `Sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `Sessions_fk0` (`course_id`);

--
-- Indexes for table `Session_exercise`
--
ALTER TABLE `Session_exercise`
  ADD KEY `Session_exercise_fk0` (`session_id`),
  ADD KEY `Session_exercise_fk1` (`exercise_id`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Categories`
--
ALTER TABLE `Categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `Courses`
--
ALTER TABLE `Courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `Exercises`
--
ALTER TABLE `Exercises`
  MODIFY `exercise_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `Sessions`
--
ALTER TABLE `Sessions`
  MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Exercises`
--
ALTER TABLE `Exercises`
  ADD CONSTRAINT `Exercises_fk0` FOREIGN KEY (`course_id`) REFERENCES `Courses` (`course_id`),
  ADD CONSTRAINT `Exercises_fk1` FOREIGN KEY (`cat_id`) REFERENCES `Categories` (`cat_id`);

--
-- Constraints for table `Scores`
--
ALTER TABLE `Scores`
  ADD CONSTRAINT `Scores_fk0` FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`),
  ADD CONSTRAINT `Scores_fk1` FOREIGN KEY (`session_id`) REFERENCES `Sessions` (`session_id`);

--
-- Constraints for table `Sessions`
--
ALTER TABLE `Sessions`
  ADD CONSTRAINT `Sessions_fk0` FOREIGN KEY (`course_id`) REFERENCES `Courses` (`course_id`);

--
-- Constraints for table `Session_exercise`
--
ALTER TABLE `Session_exercise`
  ADD CONSTRAINT `Session_exercise_fk0` FOREIGN KEY (`session_id`) REFERENCES `Sessions` (`session_id`),
  ADD CONSTRAINT `Session_exercise_fk1` FOREIGN KEY (`exercise_id`) REFERENCES `Exercises` (`exercise_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
