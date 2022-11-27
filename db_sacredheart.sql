-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2022 at 02:20 AM
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
  `seen` int(11) NOT NULL,
  `remarks` varchar(10000) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_assistance`
--

INSERT INTO `tbl_assistance` (`assistance_id`, `user_id`, `assistance_type`, `assistance_purpose`, `date_needed`, `status`, `seen`, `remarks`, `date_created`) VALUES
(12, 3, '1', 'asdasdasd', '2022-11-29', 0, 0, '', '2022-11-26 23:48:49'),
(13, 32, '3', 'Can I use the basketball court at December 5 for my birthday', '2022-12-07', 0, 0, '', '2022-11-27 01:10:25'),
(14, 33, '1', 'Need someone to help me pack my stuff on moving houses', '2022-12-07', 0, 0, '', '2022-11-27 01:12:00'),
(15, 35, '2', 'Request aid, im sick on covid and need help', '', 0, 0, '', '2022-11-27 01:13:32');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_assistance_remarks`
--

CREATE TABLE `tbl_assistance_remarks` (
  `assistance_remark_id` int(11) NOT NULL,
  `assistance_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `remark` varchar(10000) NOT NULL,
  `status` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_assistance_remarks`
--

INSERT INTO `tbl_assistance_remarks` (`assistance_remark_id`, `assistance_id`, `user_id`, `remark`, `status`, `date_created`) VALUES
(3, 14, 33, '5 people lang', 0, '2022-11-27 01:12:19');

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
(1, 'Man-power Assistances', '2022-11-04 14:03:10'),
(2, 'Financial Assistance', '2022-11-09 13:49:42'),
(3, 'Permission Assistance', '2022-11-14 18:35:21');

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
  `seen` int(11) NOT NULL,
  `remarks` varchar(10000) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_complaints`
--

INSERT INTO `tbl_complaints` (`complaint_id`, `user_id`, `complaint_description`, `complaint_letter`, `status`, `seen`, `remarks`, `date_created`) VALUES
(21, 32, 'My Request for a document is taking awhile', '1669511406.pdf', 0, 0, '', '2022-11-27 01:10:06'),
(22, 35, 'Ambaho ng CR sa barangay hall', '1669511584.pdf', 0, 0, '', '2022-11-27 01:13:04'),
(23, 32, 'Yung isang barangay official ang rude', '1669511718.pdf', 0, 0, '', '2022-11-27 01:15:18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaint_remarks`
--

CREATE TABLE `tbl_complaint_remarks` (
  `complaint_remark_id` int(11) NOT NULL,
  `complaint_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `remark` varchar(10000) NOT NULL,
  `status` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `info_about_userfile3` varchar(100) NOT NULL,
  `info_about_census` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_info`
--

INSERT INTO `tbl_info` (`info_id`, `info_logo`, `info_adv_logo`, `info_mission`, `info_vision`, `info_gmap`, `info_location`, `info_number1`, `info_number2`, `info_home_userfile`, `info_home_tagline`, `info_home_greetings`, `info_youtube_link`, `info_about_userfile1`, `info_about_userfile2`, `info_about_userfile3`, `info_about_census`) VALUES
(1, 'logo.png', 'advocacy.jpg', 'To be able to provide quality service which will make Barangay Sacred Heart a model community where people live, work, and do business in a peaceful, drug-free and progressive environment.', 'In line with the Quezon City Local Government, the Barangay Sacred Heart envisions itself as a peaceful, drug-free, progressive local government unit in District IV Quezon City committed to the leadership formation, effective governance, working partnership with the constituents in building a better community.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d573.8602585931006!2d121.04316399476372!3d14.630021857936802!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b753b2a538db%3A0x61fd6796ee217d20!2sSacred%20Heart%20Barangay%20Hall!5e0!3m2!1sen!2sph!4v1664115324138!5m2!1sen!2sph', '3Building, Unit 2B, Forab, 121 Kamuning Rd,Diliman, Quezon City, Metro Manila', '09262719107 (GLOBE)', '(88) 016 725 0455 (SMART)', 'official_03.jpg', '#MALIGayangPaglilingkod', 'We adhere to provide best service possible', 'https://www.youtube.com/watch?v=6UDTMEQpW_w', '1668408861.jpg', '1668391179.jpg', 'official_03.jpg', '301');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_logs`
--

CREATE TABLE `tbl_logs` (
  `log_id` int(11) NOT NULL,
  `log_info` varchar(500) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_logs`
--

INSERT INTO `tbl_logs` (`log_id`, `log_info`, `date_created`) VALUES
(1, '3 just logged in', '2022-11-14 10:33:13'),
(2, '3 just logged in', '2022-11-14 16:24:10'),
(3, 'approved a pending request', '2022-11-14 17:32:09'),
(4, 'approved a pending request', '2022-11-14 17:34:22'),
(5, 'approved a pending request', '2022-11-14 17:35:39'),
(6, '3 just logged in', '2022-11-14 18:04:12'),
(7, '3 just logged in', '2022-11-14 18:06:02'),
(8, '2 just logged in', '2022-11-14 18:08:29'),
(9, '2 just logged in', '2022-11-14 18:08:51'),
(10, '2 just logged in', '2022-11-14 18:17:11'),
(11, '2 just logged in', '2022-11-14 18:17:23'),
(12, 'approved a pending request', '2022-11-14 18:28:11'),
(13, 'approved a pending complaint', '2022-11-14 18:29:17'),
(14, 'approved a pending assistance', '2022-11-14 18:32:29'),
(15, '2 just logged in', '2022-11-14 18:59:19'),
(16, '2 just logged in', '2022-11-14 19:13:13'),
(17, '3 just logged in', '2022-11-15 09:32:20'),
(18, 'approved a pending assistance', '2022-11-15 20:48:46'),
(19, 'Archived Successfully! from project', '2022-11-15 21:08:07'),
(20, 'Archived Successfully! from project', '2022-11-15 21:08:11'),
(21, 'Archived Successfully! from project', '2022-11-15 21:08:16'),
(22, 'Archived Successfully! from project', '2022-11-15 21:08:29'),
(23, 'Archived Successfully! from project', '2022-11-15 21:08:31'),
(24, 'Archived Successfully! from project', '2022-11-15 21:10:23'),
(25, '3 just logged in', '2022-11-20 12:09:46'),
(26, '3 just logged in', '2022-11-20 12:17:58'),
(27, '3 just logged in', '2022-11-20 12:22:52'),
(28, 'approved a pending complaint', '2022-11-20 12:23:47'),
(29, 'approved a pending complaint', '2022-11-20 12:35:02'),
(30, 'approved a pending complaint', '2022-11-20 12:46:41'),
(31, '2 just logged in', '2022-11-20 12:55:20'),
(32, 'approved a pending complaint', '2022-11-21 01:29:40'),
(33, 'approved a pending complaint', '2022-11-21 01:29:54'),
(34, 'approved a pending request', '2022-11-21 01:36:30'),
(35, 'approved a pending request', '2022-11-21 01:36:40'),
(36, 'approved a pending request', '2022-11-21 01:36:54'),
(37, 'approved a pending request', '2022-11-21 01:37:28'),
(38, 'approved a pending request', '2022-11-21 01:44:15'),
(39, 'approved a pending request', '2022-11-21 01:46:08'),
(40, '2 just logged in', '2022-11-21 06:16:34'),
(41, '2 just logged in', '2022-11-21 09:51:46'),
(42, 'Street Mass project title is updated', '2022-11-23 11:14:38'),
(43, 'Street Mass project title is updated', '2022-11-23 11:15:17'),
(44, 'Street Mass project title is updated', '2022-11-23 11:15:22'),
(45, 'Brigada Eskwela project title is updated', '2022-11-23 11:16:40'),
(46, 'Roel Barumbado is an updated senior citizen', '2022-11-23 12:49:04'),
(47, 'Roel Barumbado is an updated senior citizen', '2022-11-23 12:49:12'),
(48, 'Roel Barumbado is an updated senior citizen', '2022-11-23 12:50:42'),
(49, '2 just logged in', '2022-11-23 14:45:34'),
(50, '2 just logged in', '2022-11-25 04:34:25'),
(51, '3 just logged in', '2022-11-25 04:40:20'),
(52, '3 just logged in', '2022-11-25 04:44:40'),
(53, 'The user John F Kenedy is approved by User ID: 1 Name: Admin', '2022-11-26 23:10:46'),
(54, '3 just logged in', '2022-11-26 23:12:06'),
(55, '3 just logged in', '2022-11-26 23:13:48'),
(56, '2 just logged in', '2022-11-26 23:23:56'),
(57, '3 just logged in', '2022-11-26 23:48:37'),
(58, 'Korbin Garcia Receiver is Added. ', '2022-11-27 00:32:49'),
(59, 'Tavion Monceda Receiver is Added. ', '2022-11-27 00:37:15'),
(60, 'Kennedy Pavia Receiver is Added. ', '2022-11-27 00:37:49'),
(61, 'Pamela Roa Receiver is Added. ', '2022-11-27 00:38:25'),
(62, 'Karmen Singco Receiver is Added. ', '2022-11-27 00:38:59'),
(63, 'Bembe Tongson Receiver is Added. ', '2022-11-27 00:39:56'),
(64, 'Harley Mariano Receiver is Added. ', '2022-11-27 00:40:30'),
(65, 'Kyle Sicat Receiver is Added. ', '2022-11-27 00:41:16'),
(66, 'Ginessa Medel Receiver is Added. ', '2022-11-27 00:42:02'),
(67, 'Don is Deleted Successfully!', '2022-11-27 00:42:18'),
(68, 'Mondragon is Deleted Successfully!', '2022-11-27 00:42:20'),
(69, 'Emilito is Deleted Successfully!', '2022-11-27 00:42:22'),
(70, 'Roel is Deleted Successfully!', '2022-11-27 00:42:24'),
(71, 'Tasing is Deleted Successfully!', '2022-11-27 00:42:26'),
(72, 'Bogart is Deleted Successfully!', '2022-11-27 00:42:28'),
(73, 'Raul is Deleted Successfully!', '2022-11-27 00:42:30'),
(74, 'Barting is Deleted Successfully!', '2022-11-27 00:45:38'),
(75, 'Tupac is Deleted Successfully!', '2022-11-27 00:45:40'),
(76, 'Aling is Deleted Successfully!', '2022-11-27 00:45:42'),
(77, 'Esparanza is Deleted Successfully!', '2022-11-27 00:45:44'),
(78, 'Magdalena is Deleted Successfully!', '2022-11-27 00:45:46'),
(79, 'Batong is Deleted Successfully!', '2022-11-27 00:45:48'),
(80, 'Quinten Gonzaga is an added senior citizen', '2022-11-27 00:48:47'),
(81, 'Eduardo Carino is an added senior citizen', '2022-11-27 00:49:16'),
(82, 'Hilario Manaloto is an added senior citizen', '2022-11-27 00:49:41'),
(83, 'Cory Silvestre is an added senior citizen', '2022-11-27 00:50:04'),
(84, 'Bobby Acebado is an added senior citizen', '2022-11-27 00:50:40'),
(85, 'Fraco Pelayo is an added senior citizen', '2022-11-27 00:51:10'),
(86, 'Ezra Mercado is an added senior citizen', '2022-11-27 00:51:37'),
(87, 'Ben Clemente is an added senior citizen', '2022-11-27 00:52:15'),
(88, 'Juanito Macaraeg is an added senior citizen', '2022-11-27 00:52:48'),
(89, 'Ciri Cuevas is an added senior citizen', '2022-11-27 00:53:03'),
(90, 'Roberto Caringal Receiver is Added. ', '2022-11-27 00:53:41'),
(91, 'Distribution of QC ID and Booklet project title is added', '2022-11-27 00:58:05'),
(92, 'House to House Distribution of QC ID project title is added', '2022-11-27 00:59:38'),
(93, 'Weekly Clean Up Drive project title is added', '2022-11-27 01:01:02'),
(94, 'Weekly Clean Up Drive project title is added', '2022-11-27 01:02:37'),
(95, 'Weekly Clean Up Drive project title is added', '2022-11-27 01:02:48'),
(96, 'Weekly Clean Up Drive project title is updated', '2022-11-27 01:02:57'),
(97, 'Weekly Clean Up Drive project title is updated', '2022-11-27 01:03:13'),
(98, 'Weekly Clean Up Drive project title is updated', '2022-11-27 01:03:24'),
(99, 'Weekly Clean Up Drive project title is updated', '2022-11-27 01:03:50'),
(100, 'Weekly Clean Up Drive project title is updated', '2022-11-27 01:03:57'),
(101, 'Weekly Clean Up Drive project title is updated', '2022-11-27 01:04:04'),
(102, 'Weekly Clean Up Drive project title is updated', '2022-11-27 01:04:12'),
(103, 'Weekly Clean Up Drive project title is updated', '2022-11-27 01:04:20'),
(104, 'Weekly Clean Up Drive project title is updated', '2022-11-27 01:04:25'),
(105, '32 just logged in', '2022-11-27 01:08:59'),
(106, '33 just logged in', '2022-11-27 01:10:47'),
(107, '35 just logged in', '2022-11-27 01:12:45'),
(108, '32 just logged in', '2022-11-27 01:14:54');

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
  `official_id` int(100) NOT NULL,
  `archive` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_projects`
--

INSERT INTO `tbl_projects` (`project_id`, `project_title`, `project_date`, `project_details`, `project_userfile`, `user_id`, `official_id`, `archive`, `date_created`) VALUES
(1, 'Street Mass', '2022-11-26 23:13:33', 'We have an upcoming street mass this December for our season of Christmas, This event will take place at Purok Street, Ynares Compound. The Mass starts at 7pm until Christmas.', 'event_01.jpg', 1, 26, 0, '2022-11-11 08:06:24'),
(2, 'Brigada Eskwela', '2022-11-26 23:06:11', 'Baranggay Personnel Volunteers performed a well assessed project for the students of Sacred Heart Barangay, Here in our Baranggay we prioritized the welfare of our students. This will be performed on November 4, 2022. 9AM.', 'event_02.jpg', 1, 10, 0, '2022-11-11 08:06:24'),
(5, 'Distribution of QC ID and Booklet', '2022-12-03 16:00:00', 'At the day of December 4, we will be distributing the QC ID of our community and a booklet, it will be set at 9 AM at the Barangay Hall', '1669510685.jpg', 1, 11, 0, '2022-11-27 00:58:05'),
(6, 'House to House Distribution of QC ID', '2022-12-06 16:00:00', 'Due to people not attending the event, we will be doing a house visit to distribute their QC ID, expect us at December 7 to arrive at your home', '1669510778.jpg', 1, 10, 0, '2022-11-27 00:59:38'),
(7, 'Weekly Clean Up Drive', '2022-12-10 16:00:00', 'At December 11, we will be having a clean up of our community, we will meet up at the barangay hall at 1 PM and we will move from there', '1669510968.jpg', 1, 13, 0, '2022-11-27 01:02:48');

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
(19, 'Korbin', 'Kiong', 'Garcia', 33, 'Singer', '2022-11-29', 'No', '2022-11-27 00:32:49'),
(20, 'Tavion', 'Loshang', 'Monceda', 42, 'N/A', '2022-12-02', 'No', '2022-11-27 00:37:15'),
(21, 'Kennedy', 'Ray', 'Pavia', 34, 'Carpenter', '2022-12-08', 'No', '2022-11-27 00:37:49'),
(22, 'Pamela', 'Nato', 'Roa', 41, 'House maid', '2022-12-10', 'No', '2022-11-27 00:38:25'),
(23, 'Karmen', '', 'Singco', 28, 'N/A', '2022-12-09', 'Yes', '2022-11-27 00:38:59'),
(24, 'Bembe', '', 'Tongson', 37, 'Construction Worker', '2022-12-09', 'No', '2022-11-27 00:39:56'),
(25, 'Harley', '', 'Mariano', 38, 'N/A', '2022-11-30', 'No', '2022-11-27 00:40:30'),
(26, 'Kyle', '', 'Sicat', 47, 'N/A', '2022-12-10', 'No', '2022-11-27 00:41:16'),
(27, 'Ginessa', 'Dumaloan', 'Medel', 48, 'N/A', '2022-12-08', 'Yes', '2022-11-27 00:42:02'),
(28, 'Roberto', 'Gervaso', 'Caringal', 47, 'Construction Worker', '2022-12-08', 'No', '2022-11-27 00:53:41');

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
(2, 'What can I do to help?', '3,4,5', '2022-11-10 07:19:44', 1),
(3, 'I need to know more about the barangay', '6', '2022-11-10 07:19:44', 0),
(4, 'I need help in using the services of the barangay or navigating the website', '13', '2022-11-10 07:19:44', 0),
(5, 'How do I login, register an account, or get verified?', '38', '2022-11-10 07:19:44', 0),
(6, 'What do you want to know?', '7,8,9', '2022-11-10 07:19:44', 1),
(7, 'Can you tell me more about Barangay Sacred Heart?', '12', '2022-11-10 07:19:44', 0),
(8, 'What is the address of the Barangay hall or their Contact Number?', '10', '2022-11-10 07:19:44', 0),
(9, 'Who are the Barangay Officials?', '11', '2022-11-10 07:19:44', 0),
(10, 'Our contact details and address is located <a href=\"http://sacredheart.byethost7.com/home/contact\">HERE</a>', '2', '2022-11-10 07:19:44', 1),
(11, 'The members of our staff can be seen at the bottom of the page in <a href=\"http://sacredheart.byethost7.com/home/about\">HERE</a> ', '2', '2022-11-10 07:19:44', 1),
(12, 'You can read more about us here <a href=\"http://sacredheart.byethost7.com/home/about\">HERE</a>, to see more info about our projects, you need to be a registered user', '2', '2022-11-10 07:19:44', 1),
(13, 'Are you a registered resident of the barangay?', '14,15', '2022-11-10 07:19:44', 1),
(14, 'Yes', '17', '2022-11-10 07:19:44', 0),
(15, 'No', '16', '2022-11-10 07:19:44', 0),
(16, 'You need to be a registered resident to use our services', '2', '2022-11-10 07:19:44', 1),
(17, 'Do you have a registered account in our website?', '18,19', '2022-11-10 07:19:44', 1),
(18, 'Yes', '21', '2022-11-10 07:19:44', 0),
(19, 'No', '20', '2022-11-10 07:19:44', 0),
(20, 'Go <a href=\"http://sacredheart.byethost7.com/home/register\">HERE</a> to Register an account, once registered, await for verification of account', '2', '2022-11-10 07:19:44', 1),
(21, 'Are you logged in?', '22,23', '2022-11-10 07:19:44', 1),
(22, 'Yes', '25', '2022-11-10 07:19:44', 0),
(23, 'No', '24', '2022-11-10 07:19:44', 0),
(24, 'Log in <a href=\"http://sacredheart.byethost7.com\" data-toggle=\"modal\" data-target=\"#LoginModal\">HERE</a> with your verified account', '2', '2022-11-10 07:19:44', 1),
(25, 'What services do you need help with?', '26,27,28,29', '2022-11-10 07:19:44', 1),
(26, 'What Programs/Projects does the Barangay offer?', '30', '2022-11-10 07:19:44', 0),
(27, 'I need help Requesting a document from the Barangay', '31', '2022-11-10 07:19:44', 0),
(28, 'I need assistance from the Barangay', '32', '2022-11-10 07:19:44', 0),
(29, 'I want to file a Complaint', '33', '2022-11-10 07:19:44', 0),
(30, 'We have an <a href=\"http://sacredheart.byethost7.com/events/ayuda\">Ayuda Program</a> and a <a href=\"http://sacredheart.byethost7.com/events/senior_citizen\">Senior Citizen Program</a>. For our other programs, you can read more <a href=\"http://sacredheart.byethost7.com/events/projects\">HERE</a>', '2', '2022-11-10 07:19:44', 1),
(31, 'Go <a href=\"http://sacredheart.byethost7.com/services/request_document\">HERE</a> and choose the document you want to get, explain as to why, and the day you will retrieve it.', '2', '2022-11-10 07:19:44', 1),
(32, 'Go <a href=\"http://sacredheart.byethost7.com/services/file_complaint\">HERE</a>  and choose the assistance you need, explain as to why and what happened, and the day need the help.', '2', '2022-11-10 07:19:44', 1),
(33, 'Go <a href=\"http://sacredheart.byethost7.com/services/assistance\">HERE</a>  and type down your problem? If you have a complaint letter already, you may upload the file.', '2', '2022-11-10 07:19:44', 1),
(34, 'Login?', '24', '2022-11-10 07:19:44', 0),
(35, 'Register an account?', '20', '2022-11-10 07:19:44', 0),
(36, 'Get account verified?', '36', '2022-11-10 07:19:44', 0),
(37, 'After creating an account, you need to wait until your account is verified by checking your valid ID to prove you\'re a resident of the Barangay', '2', '2022-11-10 07:19:44', 1),
(38, 'Which is it, Login, Register, or Verification?', '34,35,36', '2022-11-10 10:47:46', 1),
(39, 'Who the hell am I?', '', '2022-11-14 19:34:59', 0);

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
  `seen` int(11) NOT NULL,
  `remarks` varchar(10000) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_requests`
--

INSERT INTO `tbl_requests` (`request_id`, `user_id`, `document_type`, `document_purpose`, `document_userfile`, `date_needed`, `status`, `seen`, `remarks`, `date_created`) VALUES
(7, 32, '2', 'Need this for my job', '1669511365.png', '2022-11-30', 0, 0, '', '2022-11-27 01:09:25'),
(8, 33, '1', 'Need for house change', '1669511491.png', '2022-11-30', 0, 0, '', '2022-11-27 01:11:31'),
(9, 35, '2', 'Need for work purposes', '1669511672.png', '2022-12-07', 0, 0, '', '2022-11-27 01:14:32');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_request_remarks`
--

CREATE TABLE `tbl_request_remarks` (
  `request_remark_id` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `remark` varchar(10000) NOT NULL,
  `status` int(11) NOT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_request_types`
--

CREATE TABLE `tbl_request_types` (
  `request_type_id` int(11) NOT NULL,
  `request_type` varchar(100) NOT NULL,
  `request_price` varchar(500) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_request_types`
--

INSERT INTO `tbl_request_types` (`request_type_id`, `request_type`, `request_price`, `date_created`) VALUES
(1, 'Barangay Clearance', '300', '2022-11-04 13:51:20'),
(2, 'Cedula', '100', '2022-11-04 13:51:20'),
(3, 'Barangay ID', '100', '2022-11-04 13:52:03');

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
  `year` varchar(500) NOT NULL,
  `job` varchar(250) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_seniors`
--

INSERT INTO `tbl_seniors` (`senior_id`, `senior_card_id`, `fname`, `mname`, `lname`, `age`, `year`, `job`, `date_created`) VALUES
(15, '0727', 'Quinten', '', 'Gonzaga', 78, '2022', 'N/A', '2022-11-27 00:48:47'),
(16, '0728', 'Eduardo', '', 'Carino', 87, '2022', 'N/A', '2022-11-27 00:49:16'),
(17, '0729', 'Hilario', '', 'Manaloto', 59, '2022', 'N/A', '2022-11-27 00:49:41'),
(18, '0730', 'Cory', '', 'Silvestre', 75, '2022', 'N/A', '2022-11-27 00:50:04'),
(19, '0731', 'Bobby', '', 'Acebado', 67, '2022', 'Handyman', '2022-11-27 00:50:40'),
(20, '0732', 'Fraco', '', 'Pelayo', 66, '2022', 'N/A', '2022-11-27 00:51:10'),
(21, '0735', 'Ezra', '', 'Mercado', 82, '2022', 'N/A', '2022-11-27 00:51:37'),
(22, '0738', 'Ben', '', 'Clemente', 63, '2022', 'N/A', '2022-11-27 00:52:15'),
(23, '0741', 'Juanito', '', 'Macaraeg', 80, '2022', 'N/A', '2022-11-27 00:52:48'),
(24, '0764', 'Ciri', '', 'Cuevas', 67, '2022', 'N/A', '2022-11-27 00:53:03');

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
  `validation_code` varchar(500) NOT NULL,
  `reg_userfile` varchar(250) NOT NULL,
  `position` varchar(250) NOT NULL,
  `dp_userfile` varchar(250) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `username`, `password`, `usertype`, `email`, `fname`, `mname`, `lname`, `address`, `contact`, `userfile`, `approved`, `verification_code`, `validation_code`, `reg_userfile`, `position`, `dp_userfile`, `date_created`) VALUES
(1, 'admin', 'admin', 1, 'admin@gmail.com', 'Admin', 'The', 'Great', '1', '1', 'default.jpg', 2, '', '', '', 'Founder', '', '2022-09-16 12:38:05'),
(2, 'tanod', 'tanod', 2, 'tanod@gmail.com', 'Hello1', 'F', 'Kenedy', 'Sulok', '093131313131', 'pat.jpg', 2, '', '', '', '', '', '2022-09-16 12:39:14'),
(3, 'resident', 'resident', 3, 'resident@gmail.com', 'Sorry', 'Na', 'Uwu', 'There', '09135465', 'default.jpg', 2, '', '', '', '', '', '2022-09-16 12:39:14'),
(7, 'user_7', 'ma.francescacamille', 2, 'ma.francescacamille@gmail.com', 'Ma. Francesca Camille', 'Malig', 'David', '#190-A SCT. FUENTEBELLA EXT. STREET SACRED HEART, QUEZON CITY', '00000000000', '1668354508.PNG', 2, '', '', '', 'Barangay Captain', '1668367594.jpg', '2022-11-13 15:48:28'),
(8, 'user_8', 'jonah', 1, 'jonah@gmail.com', 'Jonah', 'C', 'Galoyo', '#88 SCT. LIMBAGA STREET SACRED HEART, QUEZON CITY', '00000000000', '1668354672.PNG', 2, '', '', '', 'Secretary', '1669507689.jpg', '2022-11-13 15:51:12'),
(9, 'user_9', 'angelo', 2, 'angelo@gmail.com', 'Angelo', 'L', 'Gatmaytan', '#154 SCT. LIMBAGA EXT. STREET SACRED HEART, QUEZON CITY', '00000000000', '1668354774.PNG', 2, '', '', '', 'Barangay Kagawad', '1668367636.jpg', '2022-11-13 15:52:54'),
(10, 'user_10', 'moises', 2, 'moises@gmail.com', 'Moises', 'P.', 'fulgar', '#175 SCT. FUENTEBELLA EXT. STREET  SACRED HEART, QUEZON CITY.', '00000000000', '1668354835.PNG', 2, '', '', '', 'Barangay Kagawad', '1668367649.jpg', '2022-11-13 15:53:55'),
(11, 'user_11', 'marissa', 2, 'marissa@gmail.com', 'Marissa', 'A.', 'Roissing', '#122 SCT. DE GUIA STREET SACRED HEART, QUEZON CITY', '00000000000', '1668355023.PNG', 2, '', '', '', 'Barangay Kagawad', '1668367669.jpg', '2022-11-13 15:57:03'),
(12, 'user_12', 'jesus', 2, 'jesus@gmail.com', 'Jesus', 'L.', 'Montealto', '#144-C SCT. LIMBAGA STREET SACRED HEART, QUEZON CITY', '00000000000', '1668355077.PNG', 2, '', '', '', 'Barangay Kagawad', '1668367681.jpg', '2022-11-13 15:57:58'),
(13, 'user_13', 'bonifacio', 2, 'bonifacio@gmail.com', 'Bonifacio', 'O.', 'Flores', '#144-C SCT. LIMBAGA STREET SACRED HEART, QUEZON CITY', '00000000000', '1668355153.PNG', 2, '', '', '', 'Barangay Kagawad', '1668367695.jpg', '2022-11-13 15:59:13'),
(26, 'user_26', 'eduardo', 2, 'eduardo@gmail.com', 'Eduardo', 'M.', 'Lapus', '#27-D SCT. YBARDOLAZA STREET SACRED HEART, QUEZON CITY', '00000000000', '1668363198.PNG', 2, '', '', '', 'Barangay Kagawad', '1668386508.jpg', '2022-11-13 18:13:18'),
(27, 'user_27', 'edwin', 2, 'edwin@gmail.com', 'Edwin', 'DG.', 'Reyes', '#168 SCT. FUENTEBELLA EXT. STREET SACRED HEART, QUEZON CITY.', '00000000000', '1668363235.PNG', 2, '', '', '', 'Barangay Kagawad', '1668386495.jpg', '2022-11-13 18:13:55'),
(32, 'user_32', 'kendrick', 3, 'kendrickmallare.km@gmail.com', 'Kendrick', 'Abelador', 'Mallare', 'Alabang Town Center, 2/F Alabang - Zapote Road, Alabang', '09279973130', 'default.jpg', 2, '', '', '', '', '', '2022-11-27 00:10:33'),
(33, 'user_33', 'christian', 3, 'christianjay@gmail.com', 'Christian', '', 'Jay', 'Suite 401 CLF Bldg. Chino Roces Ave., 1203', '00000000000', 'default.jpg', 2, '', '', '', '', '', '2022-11-27 00:11:08'),
(34, 'user_34', 'michael', 3, 'michaelangelo@gmail.com', 'Michael', '', 'Angelo', '154 H.V. Dela Costa Corner Valero St., Salcedo Village, Bel Air', '09279973130', 'default.jpg', 2, '', '', '', '', '', '2022-11-27 00:12:37'),
(35, 'user_35', 'patricia', 3, 'patriciarosario@gmail.com', 'Patricia', 'Del', 'Rosario', ' 26 Maningning Teachers Diliman 1100', '09279973130', 'default.jpg', 2, '', '', '', '', '', '2022-11-27 00:13:25');

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
-- Indexes for table `tbl_assistance_remarks`
--
ALTER TABLE `tbl_assistance_remarks`
  ADD PRIMARY KEY (`assistance_remark_id`);

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
-- Indexes for table `tbl_complaint_remarks`
--
ALTER TABLE `tbl_complaint_remarks`
  ADD PRIMARY KEY (`complaint_remark_id`);

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
-- Indexes for table `tbl_request_remarks`
--
ALTER TABLE `tbl_request_remarks`
  ADD PRIMARY KEY (`request_remark_id`);

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
  MODIFY `assistance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_assistance_remarks`
--
ALTER TABLE `tbl_assistance_remarks`
  MODIFY `assistance_remark_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_assistance_types`
--
ALTER TABLE `tbl_assistance_types`
  MODIFY `assistance_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_complaints`
--
ALTER TABLE `tbl_complaints`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_complaint_remarks`
--
ALTER TABLE `tbl_complaint_remarks`
  MODIFY `complaint_remark_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_info`
--
ALTER TABLE `tbl_info`
  MODIFY `info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_logs`
--
ALTER TABLE `tbl_logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `tbl_projects`
--
ALTER TABLE `tbl_projects`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_receivers`
--
ALTER TABLE `tbl_receivers`
  MODIFY `receiver_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_replies`
--
ALTER TABLE `tbl_replies`
  MODIFY `reply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tbl_requests`
--
ALTER TABLE `tbl_requests`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_request_remarks`
--
ALTER TABLE `tbl_request_remarks`
  MODIFY `request_remark_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_request_types`
--
ALTER TABLE `tbl_request_types`
  MODIFY `request_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_seniors`
--
ALTER TABLE `tbl_seniors`
  MODIFY `senior_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tbl_usertypes`
--
ALTER TABLE `tbl_usertypes`
  MODIFY `usertype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
