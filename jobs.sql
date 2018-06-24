-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2018 at 08:34 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobs`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employee_id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(6) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `telephone` varchar(13) NOT NULL,
  `description` text NOT NULL,
  `profile_pic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `fname`, `lname`, `dob`, `gender`, `address1`, `address2`, `telephone`, `description`, `profile_pic`) VALUES
(27, 'kamal', 'chamara', '1990-09-13', 'male', 'colombo', 'srilanka', '12341234', 'Founder of The Muse and loves helping people find careers they actually enjoy. I am speaking at MIT and Harvard, appeared on The TODAY Show and CNN, and contributes on career and entrepreneurship topics to the Wall Street Journal and Harvard Business Review. Before founding The Muse, Kathryn worked on vaccine introduction in Rwanda and Malawi with the Clinton Health Access Initiative and was previously at the management consultancy McKinsey &amp; Company.', 'uploads/img/f9.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `employee_job`
--

CREATE TABLE `employee_job` (
  `employee_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `cv` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_job`
--

INSERT INTO `employee_job` (`employee_id`, `job_id`, `cv`) VALUES
(27, 13, 'uploads/cv/1NF.docx');

-- --------------------------------------------------------

--
-- Table structure for table `employers`
--

CREATE TABLE `employers` (
  `employer_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `telephone` varchar(13) NOT NULL,
  `website` varchar(255) NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employers`
--

INSERT INTO `employers` (`employer_id`, `name`, `telephone`, `website`, `profile_pic`, `description`) VALUES
(26, 'facebook', '12341234', 'https://facebook.com', 'uploads/img/a2.jpg', 'Facebook is an American online social media and social networking service company based in Menlo Park, California. Its website was launched on February 4, 2004, by Mark Zuckerberg, along with fellow Harvard College students and roommates Eduardo Saverin, ');

-- --------------------------------------------------------

--
-- Table structure for table `employer_job`
--

CREATE TABLE `employer_job` (
  `employer_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employer_job`
--

INSERT INTO `employer_job` (`employer_id`, `job_id`) VALUES
(26, 13),
(26, 14);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `job_id` int(11) NOT NULL,
  `employer_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `job_description` text NOT NULL,
  `salary` double NOT NULL,
  `age_limit` varchar(50) NOT NULL,
  `location` varchar(255) NOT NULL,
  `posted_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `job_pic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `employer_id`, `title`, `job_description`, `salary`, `age_limit`, `location`, `posted_on`, `job_pic`) VALUES
(13, 26, 'Software Engineering', 'As a software engineer, you ll work in a constantly evolving environment, due to technological advances and the strategic direction of their organisation. You ll create, maintain, audit and improve systems to meet particular needs, often as advised by a systems analyst or architect, testing both hard and software systems to diagnose and resolve system faults.', 80000, 'below 35', 'Colombo - 07', '2018-06-23 16:08:45', 'uploads/img/a1.jpg'),
(14, 26, 'Graphic Designer', 'You ll work to a brief agreed with the client, creative director or account manager, and will develop appropriate creative ideas and concepts for the client s objectives.\r\n\r\nThe work demands creative flair, up-to-date knowledge of industry software and a professional approach to time, costs and deadlines.\r\nmeeting clients or account managers to discuss the business objectives and requirements of the job\r\nestimating the time required to complete a job and providing quotes for clients\r\ndeveloping design briefs that suit the clients purpose\r\nthinking creatively to produce new ideas and concepts and developing interactive design', 70000, '25 - 30', 'Colombo - 07', '2018-06-23 16:08:45', 'uploads/img/a2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `mes_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `messages` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`mes_id`, `name`, `email`, `messages`) VALUES
(13, 'amal sampath', 'amal.sampath@gmail.com', 'This is a very cool site. I is very helpful to me.');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role`) VALUES
(1, 'admin'),
(2, 'employee'),
(3, 'employer');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`, `role`) VALUES
(24, 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', 1),
(26, 'admin@facebook.com', '26cae7718c32180a7a0f8e19d6d40a59', 3),
(27, 'kamal.chamara@gmail.com', '081ab01e42d0d5889c695fff853fc76c', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `employee_job`
--
ALTER TABLE `employee_job`
  ADD KEY `job_id` (`job_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `employers`
--
ALTER TABLE `employers`
  ADD PRIMARY KEY (`employer_id`);

--
-- Indexes for table `employer_job`
--
ALTER TABLE `employer_job`
  ADD KEY `job_id` (`job_id`),
  ADD KEY `employer_job_ibfk_3` (`employer_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`),
  ADD KEY `employer_id` (`employer_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`mes_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role` (`role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `employers`
--
ALTER TABLE `employers`
  MODIFY `employer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `mes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee_job`
--
ALTER TABLE `employee_job`
  ADD CONSTRAINT `employee_job_ibfk_2` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`job_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_job_ibfk_3` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employers`
--
ALTER TABLE `employers`
  ADD CONSTRAINT `employers_ibfk_1` FOREIGN KEY (`employer_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employer_job`
--
ALTER TABLE `employer_job`
  ADD CONSTRAINT `employer_job_ibfk_2` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`job_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employer_job_ibfk_3` FOREIGN KEY (`employer_id`) REFERENCES `employers` (`employer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_ibfk_1` FOREIGN KEY (`employer_id`) REFERENCES `employers` (`employer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role`) REFERENCES `roles` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
