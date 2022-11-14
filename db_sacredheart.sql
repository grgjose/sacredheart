-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2022 at 11:32 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sacredheart`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_assistance`
--

CREATE TABLE `tbl_assistance` (
  `assistance_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `assistance_type` varchar(100) NOT NULL,
  `assistance_purpose` varchar(1000) NOT NULL,
  `date_needed` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `remarks` varchar(10000) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_assistance`
--

INSERT INTO `tbl_assistance` (`assistance_id`, `user_id`, `assistance_type`, `assistance_purpose`, `date_needed`, `status`, `remarks`, `date_created`) VALUES
(1, 6, '1', '123213', '2022-10-21', 0, '', '2022-11-09 10:54:31');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_assistance_types`
--

CREATE TABLE `tbl_assistance_types` (
  `assistance_type_id` int(11) NOT NULL,
  `assistance_type` varchar(100) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_assistance_types`
--

INSERT INTO `tbl_assistance_types` (`assistance_type_id`, `assistance_type`, `date_created`) VALUES
(1, 'Man-power Assistance', '2022-11-04 14:03:10'),
(2, 'Financial Assistance', '2022-11-09 13:49:42');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaints`
--

CREATE TABLE `tbl_complaints` (
  `complaint_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `complaint_description` varchar(250) NOT NULL,
  `complaint_letter` varchar(500) NOT NULL,
  `status` int(11) NOT NULL,
  `remarks` varchar(10000) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_complaints`
--

INSERT INTO `tbl_complaints` (`complaint_id`, `user_id`, `complaint_description`, `complaint_letter`, `status`, `remarks`, `date_created`) VALUES
(1, 6, '123123', '1666196054.txt', 1, '', '2022-11-09 10:54:26'),
(2, 6, '12313123', '1666196237.txt', 0, '', '2022-10-19 16:17:17');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_info`
--

CREATE TABLE `tbl_info` (
  `info_id` int(11) NOT NULL,
  `info_logo` varchar(100) NOT NULL,
  `info_adv_logo` varchar(100) NOT NULL,
  `info_mission` text NOT NULL,
  `info_vision` text NOT NULL,
  `info_gmap` text NOT NULL,
  `info_location` text NOT NULL,
  `info_number1` varchar(100) NOT NULL,
  `info_number2` varchar(100) NOT NULL,
  `info_home_userfile` varchar(100) NOT NULL,
  `info_home_tagline` varchar(100) NOT NULL,
  `info_home_greetings` text NOT NULL,
  `info_youtube_link` text NOT NULL,
  `info_about_userfile1` varchar(100) NOT NULL,
  `info_about_userfile2` varchar(100) NOT NULL,
  `info_about_userfile3` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_info`
--

INSERT INTO `tbl_info` (`info_id`, `info_logo`, `info_adv_logo`, `info_mission`, `info_vision`, `info_gmap`, `info_location`, `info_number1`, `info_number2`, `info_home_userfile`, `info_home_tagline`, `info_home_greetings`, `info_youtube_link`, `info_about_userfile1`, `info_about_userfile2`, `info_about_userfile3`) VALUES
(1, 'logo.png', 'advocacy.jpg', 'To be able to provide quality service which will make Barangay Sacred Heart a model community where people live, work, and do business in a peaceful, drug-free and progressive environment.', 'In line with the Quezon City Local Government, the Barangay Sacred Heart envisions itself as a peaceful, drug-free, progressive local government unit in District IV Quezon City committed to the leadership formation, effective governance, working partnership with the constituents in building a better community.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d573.8602585931006!2d121.04316399476372!3d14.630021857936802!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b753b2a538db%3A0x61fd6796ee217d20!2sSacred%20Heart%20Barangay%20Hall!5e0!3m2!1sen!2sph!4v1664115324138!5m2!1sen!2sph', '3Building, Unit 2B, Forab, 121 Kamuning Rd,\r\nDiliman, Quezon City, Metro Manila', '(00) 789 456 7890 (GLOBE)', '(88) 016 725 0455 (SMART)', 'official_03.jpg', '#MALIGayangPaglilingkod', '\r\nWe adhere to provide best service possible', 'https://www.youtube.com/watch?v=6UDTMEQpW_w', 'official_01.jpg', 'official_02.jpg', 'official_03.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_logs`
--

CREATE TABLE `tbl_logs` (
  `log_id` int(11) NOT NULL,
  `log_info` varchar(500) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_projects`
--

CREATE TABLE `tbl_projects` (
  `project_id` int(11) NOT NULL,
  `project_title` varchar(200) NOT NULL,
  `project_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `project_details` varchar(10000) NOT NULL,
  `project_userfile` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_projects`
--

INSERT INTO `tbl_projects` (`project_id`, `project_title`, `project_date`, `project_details`, `project_userfile`, `user_id`, `date_created`) VALUES
(1, 'Street Mass', '2022-12-18 07:59:32', 'We have an upcoming street mass this December for our season of Christmas, This event will take place at Purok Street, Ynares Compound. The Mass starts at 7pm until Christmas.', 'event_01.jpg', 1, '2022-11-11 08:06:24'),
(2, 'Brigada Eskwela', '2022-11-02 07:59:32', 'Baranggay Personnel Volunteers performed a well assessed project for the students of Sacred Heart Barangay, Here in our Baranggay we prioritized the welfare of our students. This will be performed on November 4, 2022. 9AM.', 'event_02.jpg', 1, '2022-11-11 08:06:24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_receivers`
--

CREATE TABLE `tbl_receivers` (
  `receiver_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `current_job` varchar(250) NOT NULL,
  `date_to_receive` varchar(100) NOT NULL,
  `is_received` varchar(100) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_receivers`
--

INSERT INTO `tbl_receivers` (`receiver_id`, `fname`, `mname`, `lname`, `age`, `current_job`, `date_to_receive`, `is_received`, `date_created`) VALUES
(2, 'Sponge', 'Bob', 'Square Pants', 21, 'Cook', '11/03/2022', 'No', '2022-10-20 09:24:15'),
(3, 'Patrick', 'The', 'Star', 21, 'Friend', '11/03/2022', 'No', '2022-10-20 09:25:36'),
(4, 'Squidward', 'The', 'Squid', 21, 'Cashier', '11/03/2022', 'No', '2022-10-20 09:25:36'),
(5, 'Krusty', 'The', 'Crab', 32, 'Owner', '11/03/2022', 'No', '2022-10-20 09:30:45'),
(7, 'Naruto', 'The', 'Uzumaki', 17, 'Hokage', '11/03/2022', 'Yes', '2022-10-20 09:30:45'),
(8, 'Anya', 'The', 'Forger', 18, 'Mentalist', '2022-11-03', 'No', '2022-10-20 09:30:45'),
(9, 'Katniss', 'X', 'Everdeen', 18, 'Tribute', '11/03/2022', 'No', '2022-10-20 09:30:45'),
(10, 'Petah', 'X', 'Mellark', 19, 'Tribute', '11/03/2022', 'Yes', '2022-10-20 09:30:45'),
(11, 'Steve', 'Less', 'Jobs', 45, 'Founder', '11/03/2022', 'No', '2022-10-20 09:30:45'),
(12, 'The', 'World', 'Star', 47, 'Commet', '11/03/2022', 'Yes', '2022-10-20 09:30:45'),
(13, 'Mother', 'Lily', 'Shimmer', 33, 'Flower', '11/03/2022', 'No', '2022-10-20 09:30:45'),
(14, 'Harry', 'The', 'Potter', 26, 'Wizard', '11/03/2022', 'Yes', '2022-10-20 09:30:45'),
(15, 'Old', 'Spank', 'Harry', 92, 'Farmer', '11/03/2022', 'No', '2022-10-20 09:30:45'),
(16, 'Pat', 'Ricia', 'Velasquez', 13, 'Something', '2022-11-05', 'No', '2022-10-31 22:25:08'),
(17, 'Frank', 'The ', 'Builder', 33, 'Vocal Gawker', '2022-11-10', 'No', '2022-10-31 22:26:51');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_replies`
--

CREATE TABLE `tbl_replies` (
  `reply_id` int(11) NOT NULL,
  `reply` varchar(1000) NOT NULL,
  `reply_suggested` varchar(100) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `reply_from` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_replies`
--

INSERT INTO `tbl_replies` (`reply_id`, `reply`, `reply_suggested`, `date_created`, `reply_from`) VALUES
(1, 'I need Assistance', '2', '2022-11-10 07:19:44', 0),
(2, 'What can I do to help?', '3,4,5', '2022-11-10 07:19:44', 1),
(3, 'I need to know more about the barangay', '6', '2022-11-10 07:19:44', 0),
(4, 'I need help in using the services of the barangay or navigating the website', '13', '2022-11-10 07:19:44', 0),
(5, 'How do I login, register an account, or get verified?', '38', '2022-11-10 07:19:44', 0),
(6, 'What do you want to know?', '7,8,9', '2022-11-10 07:19:44', 1),
(7, 'Can you tell me more about Barangay Sacred Heart?', '10', '2022-11-10 07:19:44', 0),
(8, 'What is the address of the Barangay hall or their Contact Number?', '11', '2022-11-10 07:19:44', 0),
(9, 'Who are the Barangay Officials?', '12', '2022-11-10 07:19:44', 0),
(10, 'Our contact details and address is located here [LINK]', '1', '2022-11-10 07:19:44', 1),
(11, 'The members of our staff can be seen here [LINK]', '1', '2022-11-10 07:19:44', 1),
(12, 'You can read more about us here [LINK], to see more info about our projects, you need to be a registered user', '1', '2022-11-10 07:19:44', 1),
(13, 'Are you a registered resident of the barangay?', '14,15', '2022-11-10 07:19:44', 1),
(14, 'Yes', '17', '2022-11-10 07:19:44', 0),
(15, 'No', '16', '2022-11-10 07:19:44', 0),
(16, 'You need to be a registered resident to use our services', '1', '2022-11-10 07:19:44', 1),
(17, 'Do you have a registered account in our website?', '18,19', '2022-11-10 07:19:44', 1),
(18, 'Yes', '21', '2022-11-10 07:19:44', 0),
(19, 'No', '20', '2022-11-10 07:19:44', 0),
(20, 'Go here [LINK] to Register an account, once registered, await for verification of account', '1', '2022-11-10 07:19:44', 1),
(21, 'Are you logged in?', '22,23', '2022-11-10 07:19:44', 1),
(22, 'Yes', '25', '2022-11-10 07:19:44', 0),
(23, 'No', '24', '2022-11-10 07:19:44', 0),
(24, 'Log in here [LINK] with your verified account', '1', '2022-11-10 07:19:44', 1),
(25, 'What services do you need help with?', '26,27,28,29', '2022-11-10 07:19:44', 1),
(26, 'What Programs/Projects does the Barangay offer?', '30', '2022-11-10 07:19:44', 0),
(27, 'I need help Requesting a document from the Barangay', '31', '2022-11-10 07:19:44', 0),
(28, 'I need assistance from the Barangay', '32', '2022-11-10 07:19:44', 0),
(29, 'I want to file a Complaint', '33', '2022-11-10 07:19:44', 0),
(30, 'We have an Ayuda Program[LINK] and a Senior Citizen Program[LINK]. For other programs, you can read more here[LINK]', '1', '2022-11-10 07:19:44', 1),
(31, 'Go here [LINK] and choose the document you want to get, explain as to why, and the day you will retrieve it.', '1', '2022-11-10 07:19:44', 1),
(32, 'Go here [LINK] and choose the assistance you need, explain as to why and what happened, and the day need the help.', '1', '2022-11-10 07:19:44', 1),
(33, 'Go here [LINK] and type down your problem? If you have a complaint letter already, you may upload the file.', '1', '2022-11-10 07:19:44', 1),
(34, 'Login?', '24', '2022-11-10 07:19:44', 0),
(35, 'Register an account?', '20', '2022-11-10 07:19:44', 0),
(36, 'Get account verified?', '36', '2022-11-10 07:19:44', 0),
(37, 'After creating an account, you need to wait until your account is verified by checking your valid ID to prove you\'re a resident of the Barangay', '1', '2022-11-10 07:19:44', 1),
(38, 'Which is it, Login, Register, or Verification?', '34,35,36', '2022-11-10 10:47:46', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_requests`
--

CREATE TABLE `tbl_requests` (
  `request_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `document_type` varchar(250) NOT NULL,
  `document_purpose` varchar(1000) NOT NULL,
  `document_userfile` varchar(500) NOT NULL,
  `date_needed` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `remarks` varchar(10000) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_requests`
--

INSERT INTO `tbl_requests` (`request_id`, `user_id`, `document_type`, `document_purpose`, `document_userfile`, `date_needed`, `status`, `remarks`, `date_created`) VALUES
(1, 6, '1', 'Something', '', '2022-10-18', 1, '', '2022-11-11 08:54:09'),
(2, 6, '1', '1231123', '', '2022-10-19', 1, '', '2022-11-09 10:51:49');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_request_types`
--

CREATE TABLE `tbl_request_types` (
  `request_type_id` int(11) NOT NULL,
  `request_type` varchar(100) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_request_types`
--

INSERT INTO `tbl_request_types` (`request_type_id`, `request_type`, `date_created`) VALUES
(1, 'Barangay Clearance', '2022-11-04 13:51:20'),
(2, 'Cedula', '2022-11-04 13:51:20'),
(3, 'Barangay ID', '2022-11-04 13:52:03');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_seniors`
--

CREATE TABLE `tbl_seniors` (
  `senior_id` int(11) NOT NULL,
  `senior_card_id` varchar(100) NOT NULL,
  `fname` varchar(250) NOT NULL,
  `mname` varchar(250) NOT NULL,
  `lname` varchar(250) NOT NULL,
  `age` int(11) NOT NULL,
  `job` varchar(250) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_seniors`
--

INSERT INTO `tbl_seniors` (`senior_id`, `senior_card_id`, `fname`, `mname`, `lname`, `age`, `job`, `date_created`) VALUES
(1, '0728', 'Don', 'Don', 'Ritualo', 101, 'Old Job (Publisher of Rizal)', '2022-10-24 08:09:45'),
(2, '0729', 'Mondragon', 'De', 'Jonor', 126, 'Monk', '2022-10-24 08:16:31'),
(3, '0730', 'Emilito', 'De', 'Kuntador', 99, 'Veteran', '2022-10-24 08:16:31'),
(4, '0731', 'Roel', 'Castro', 'Barumbado', 165, 'Superman', '2022-10-24 08:16:31'),
(5, '0732', 'Tasing', 'Sabog', 'Tae', 125, 'Pornstar', '2022-10-24 08:16:31'),
(6, '0733', 'Bogart', 'El', 'Nombre', 111, 'Handyman', '2022-10-24 08:16:31'),
(7, '0734', 'Raul', 'De', 'Palo', 171, 'Carpenter', '2022-10-24 08:16:31'),
(8, '0735', 'Barting', 'Con', 'Tubo', 96, 'Plumber', '2022-10-24 08:16:31'),
(9, '0736', 'Tupac', 'N', 'Shakur', 95, 'Rapper', '2022-10-24 08:16:31'),
(10, '0925', 'Aling', 'X', 'Cely', 78, 'Singer', '2022-10-24 08:16:31'),
(11, '0926', 'Esparanza', 'Mel', 'Checo', 200, 'Dancer', '2022-10-24 08:16:31'),
(12, '0927', 'Magdalena', 'Anong', 'Problema', 1000, 'GRO', '2022-10-24 08:16:31'),
(13, '1256', 'Batong', 'Burngis', 'Bakal', 268, 'Welder', '2022-10-24 08:16:31');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `usertype` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `address` varchar(500) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `userfile` varchar(500) NOT NULL,
  `approved` int(11) NOT NULL,
  `verification_code` varchar(100) NOT NULL,
  `reg_userfile` varchar(250) NOT NULL,
  `position` varchar(250) NOT NULL,
  `dp_userfile` varchar(250) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `username`, `password`, `usertype`, `email`, `fname`, `mname`, `lname`, `address`, `contact`, `userfile`, `approved`, `verification_code`, `reg_userfile`, `position`, `dp_userfile`, `date_created`) VALUES
(1, 'admin', 'admin', 1, 'admin@gmail.com', 'Pat', 'Del', 'Rosario', 'Admin Hub', '92384023', '1668075732.jpg', 1, '', '', 'Punong Barangay', '1668076217.jpg', '2022-09-16 12:38:05'),
(2, 'tanod', 'tanod', 2, 'tanod@gmail.com', 'John', 'F', 'Kenedy', 'Sulok', '093131313131', 'pat.jpg', 1, '', '', '', '', '2022-09-16 12:39:14'),
(3, 'resident', 'resident', 3, 'resident@gmail.com', 'Hello3', 'Damn1', 'Purok', 'Dyan lang ako sa table', '084651', '1668191605.jpg', 1, '', '', '', '', '2022-09-16 12:39:14'),
(6, 'user_1663763872', 'password', 3, 'georgelouisjose@gmail.com', 'George Louis', 'Martinez', 'Jose', 'Binangonan, Rizal', '09363362225', 'pat.jpg', 1, '', '', '', '', '2022-09-21 12:37:52'),
(9, 'user_0', 'password', 3, 'that@gmail.com', 'Someone', '', 'Somewho', 'address', '834290582034', '1668071885.jpg', 1, '', '', '', '', '2022-11-10 09:18:05'),
(10, 'user_10', 'pussy', 3, 'pussycat@pussy.com', 'Garfield', 'The', 'Cat', 'bahay caloocan ko', '920384093284', '1668074645.jpg', 1, '', '', '', '', '2022-11-10 09:48:11');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_usertypes`
--

CREATE TABLE `tbl_usertypes` (
  `usertype_id` int(11) NOT NULL,
  `usertype` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_usertypes`
--

INSERT INTO `tbl_usertypes` (`usertype_id`, `usertype`) VALUES
(1, 'admin'),
(2, 'official'),
(3, 'resident');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_assistance`
--
ALTER TABLE `tbl_assistance`
  ADD PRIMARY KEY (`assistance_id`);

--
-- Indexes for table `tbl_assistance_types`
--
ALTER TABLE `tbl_assistance_types`
  ADD PRIMARY KEY (`assistance_type_id`);

--
-- Indexes for table `tbl_complaints`
--
ALTER TABLE `tbl_complaints`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `tbl_info`
--
ALTER TABLE `tbl_info`
  ADD PRIMARY KEY (`info_id`);

--
-- Indexes for table `tbl_logs`
--
ALTER TABLE `tbl_logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `tbl_projects`
--
ALTER TABLE `tbl_projects`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `tbl_receivers`
--
ALTER TABLE `tbl_receivers`
  ADD PRIMARY KEY (`receiver_id`);

--
-- Indexes for table `tbl_replies`
--
ALTER TABLE `tbl_replies`
  ADD PRIMARY KEY (`reply_id`);

--
-- Indexes for table `tbl_requests`
--
ALTER TABLE `tbl_requests`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `tbl_request_types`
--
ALTER TABLE `tbl_request_types`
  ADD PRIMARY KEY (`request_type_id`);

--
-- Indexes for table `tbl_seniors`
--
ALTER TABLE `tbl_seniors`
  ADD PRIMARY KEY (`senior_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tbl_usertypes`
--
ALTER TABLE `tbl_usertypes`
  ADD PRIMARY KEY (`usertype_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_assistance`
--
ALTER TABLE `tbl_assistance`
  MODIFY `assistance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_assistance_types`
--
ALTER TABLE `tbl_assistance_types`
  MODIFY `assistance_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_complaints`
--
ALTER TABLE `tbl_complaints`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_info`
--
ALTER TABLE `tbl_info`
  MODIFY `info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_logs`
--
ALTER TABLE `tbl_logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_projects`
--
ALTER TABLE `tbl_projects`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_receivers`
--
ALTER TABLE `tbl_receivers`
  MODIFY `receiver_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_replies`
--
ALTER TABLE `tbl_replies`
  MODIFY `reply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tbl_requests`
--
ALTER TABLE `tbl_requests`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_request_types`
--
ALTER TABLE `tbl_request_types`
  MODIFY `request_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_seniors`
--
ALTER TABLE `tbl_seniors`
  MODIFY `senior_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_usertypes`
--
ALTER TABLE `tbl_usertypes`
  MODIFY `usertype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
