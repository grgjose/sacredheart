-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2022 at 05:55 AM
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
(1, 6, '1', '123213', '2022-10-21', 0, 0, '', '2022-11-09 10:54:31'),
(2, 20, '1', 'new residency, need help moving stuff', '2022-11-15', 1, 1, '', '2022-11-15 20:48:46'),
(3, 21, '2', 'covid related problem', '2022-11-14', 0, 0, '', '2022-11-14 18:33:40'),
(4, 22, '3', 'need to reserve basketball court', '2022-11-14', 0, 0, '', '2022-11-13 17:45:48'),
(5, 22, '2', 'accident happened', '2022-11-23', 0, 0, '', '2022-11-14 18:33:43'),
(6, 23, '3', 'permission to landi', '2022-11-24', 0, 0, '', '2022-11-13 17:58:33'),
(7, 23, '1', 'need visitors for lonely birthday', '2022-11-25', 0, 0, '', '2022-11-13 17:58:59'),
(8, 24, '3', 'pwede gumamit ng cr', '2022-11-27', 1, 1, 'Ayoko', '2022-11-14 18:32:29'),
(9, 24, '2', 'pyramid scheme', '2022-11-26', 0, 0, '', '2022-11-14 18:33:45'),
(10, 24, '1', 'need ng clown para sa funeral', '2022-11-26', 0, 0, '', '2022-11-13 18:03:20'),
(11, 25, '2', 'For medical reasons', '2022-11-27', 0, 0, '', '2022-11-14 18:33:48');

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
(1, 11, 1, 'okay', 0, '2022-11-21 01:49:21');

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
(1, 6, '123123', '1666196054.txt', 1, 1, '', '2022-11-21 01:29:54'),
(2, 6, '12313123', '1666196237.txt', 1, 1, 'Ayaw', '2022-11-14 18:29:17'),
(3, 15, 'poor service I received from your barangay', '1668360692.txt', 0, 0, '', '2022-11-13 17:31:33'),
(4, 15, 'May gulo sa restaurant', '1668360712.txt', 0, 0, '', '2022-11-13 17:31:52'),
(5, 16, 'lagi po may nagtatae sa tapat ng gate namin ang baho yuck', '1668360901.txt', 0, 0, '', '2022-11-13 17:35:01'),
(6, 16, 'barado kanal sa street namin, paki ayos po', '1668360914.txt', 0, 0, '', '2022-11-13 17:35:14'),
(7, 17, 'Laging may nagaaway na mongoloid at pipe sa tapat ng bahay namin', '1668361002.txt', 0, 0, '', '2022-11-13 17:36:42'),
(8, 17, 'Loud Neighborhood, laging may nagsisigawan', '1668361013.txt', 0, 0, '', '2022-11-13 17:36:53'),
(9, 18, 'Very loud car from my neighbor', '1668361050.txt', 0, 0, '', '2022-11-13 17:37:30'),
(10, 18, 'mga manginginom ang ingay!!', '1668361090.txt', 0, 0, '', '2022-11-13 17:38:10'),
(11, 20, 'Nanghahabol na aso sa kapitbahay', '1668361128.txt', 0, 0, '', '2022-11-13 17:38:48'),
(12, 20, 'Madaming tambay sa tapat namin', '1668361140.txt', 0, 0, '', '2022-11-13 17:39:00'),
(13, 21, 'Nanghahabol na aso sa kapitbahay', '1668361278.txt', 0, 0, '', '2022-11-13 17:41:18'),
(14, 21, 'Madaming tambay sa tapat namin', '1668361307.txt', 0, 0, '', '2022-11-13 17:41:47'),
(15, 22, 'may lumalangitngit po kapitbahay, di makatulog ', '1668361457.txt', 0, 0, '', '2022-11-13 17:44:17'),
(16, 23, 'Si kuya andoy po may hawak laging itak pag lasing', '1668362285.txt', 0, 0, '', '2022-11-13 17:58:05'),
(17, 24, 'May mga lasingero na gumagawa ng gulo sa street namin', '1668362497.txt', 0, 0, '', '2022-11-13 18:01:37'),
(18, 24, 'may mga tambay po ', '1668362509.txt', 0, 0, '', '2022-11-13 18:01:49'),
(19, 25, 'May customer sa Jollibee naninigaw ng manager', '1668362704.txt', 0, 0, '', '2022-11-13 18:05:04'),
(20, 25, 'Yung mga tanod po nantututok lang ng flashlight sa mukha during curfew hours', '1668362718.txt', 0, 0, '', '2022-11-13 18:05:18');

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

--
-- Dumping data for table `tbl_complaint_remarks`
--

INSERT INTO `tbl_complaint_remarks` (`complaint_remark_id`, `complaint_id`, `user_id`, `remark`, `status`, `date_created`) VALUES
(1, 8, 1, 'Saan ito?', 0, '2022-11-20 09:31:16'),
(2, 1, 1, 'Hello', 1, '2022-11-20 11:14:47'),
(3, 8, 1, 'Sa bahay pugay ata', 0, '2022-11-20 11:22:54'),
(4, 7, 1, 'Pupuntahin po namin mam para maresolve issue', 0, '2022-11-20 12:34:30'),
(5, 8, 1, 'para', 0, '2022-11-20 12:34:47'),
(6, 1, 1, 'Kulang bayad', 0, '2022-11-21 01:29:40'),
(7, 1, 1, 'Okay na bayad, Goods', 1, '2022-11-21 01:29:54'),
(8, 1, 2, 'Basta goods na yan', 1, '2022-11-23 15:19:34'),
(9, 1, 2, 'all goods', 1, '2022-11-23 15:20:53'),
(10, 1, 2, 'yown', 1, '2022-11-23 15:21:54'),
(11, 3, 3, 'Thanks po', 1, '2022-11-25 04:51:59'),
(12, 3, 3, 'Thanks po', 1, '2022-11-25 04:52:15');

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
(52, '3 just logged in', '2022-11-25 04:44:40');

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
(1, 'Street Mass', '2022-11-23 16:00:00', 'We have an upcoming street mass this December for our season of Christmas, This event will take place at Purok Street, Ynares Compound. The Mass starts at 7pm until Christmas.', 'event_01.jpg', 1, 26, 0, '2022-11-11 08:06:24'),
(2, 'Brigada Eskwela', '2022-11-24 16:00:00', 'Baranggay Personnel Volunteers performed a well assessed project for the students of Sacred Heart Barangay, Here in our Baranggay we prioritized the welfare of our students. This will be performed on November 4, 2022. 9AM.', 'event_02.jpg', 1, 10, 0, '2022-11-11 08:06:24');

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
(2, 'What can I do to help?', '3,4,5', '2022-11-10 07:19:44', 1),
(3, 'I need to know more about the barangay', '6', '2022-11-10 07:19:44', 0),
(4, 'I need help in using the services of the barangay or navigating the website', '13', '2022-11-10 07:19:44', 0),
(5, 'How do I login, register an account, or get verified?', '38', '2022-11-10 07:19:44', 0),
(6, 'What do you want to know?', '7,8,9', '2022-11-10 07:19:44', 1),
(7, 'Can you tell me more about Barangay Sacred Heart?', '10', '2022-11-10 07:19:44', 0),
(8, 'What is the address of the Barangay hall or their Contact Number?', '11', '2022-11-10 07:19:44', 0),
(9, 'Who are the Barangay Officials?', '12', '2022-11-10 07:19:44', 0),
(10, 'Our contact details and address is located here [LINK]', '2', '2022-11-10 07:19:44', 1),
(11, 'The members of our staff can be seen here <a href=\"#\" data-target=\"#LoginModal\" data-toggle=\"modal\" ></a>', '2', '2022-11-10 07:19:44', 1),
(12, 'You can read more about us here [LINK], to see more info about our projects, you need to be a registered user', '2', '2022-11-10 07:19:44', 1),
(13, 'Are you a registered resident of the barangay?', '14,15', '2022-11-10 07:19:44', 1),
(14, 'Yes', '17', '2022-11-10 07:19:44', 0),
(15, 'No', '16', '2022-11-10 07:19:44', 0),
(16, 'You need to be a registered resident to use our services', '2', '2022-11-10 07:19:44', 1),
(17, 'Do you have a registered account in our website?', '18,19', '2022-11-10 07:19:44', 1),
(18, 'Yes', '21', '2022-11-10 07:19:44', 0),
(19, 'No', '20', '2022-11-10 07:19:44', 0),
(20, 'Go here [LINK] to Register an account, once registered, await for verification of account', '2', '2022-11-10 07:19:44', 1),
(21, 'Are you logged in?', '22,23', '2022-11-10 07:19:44', 1),
(22, 'Yes', '25', '2022-11-10 07:19:44', 0),
(23, 'No', '24', '2022-11-10 07:19:44', 0),
(24, 'Log in here [LINK] with your verified account', '2', '2022-11-10 07:19:44', 1),
(25, 'What services do you need help with?', '26,27,28,29', '2022-11-10 07:19:44', 1),
(26, 'What Programs/Projects does the Barangay offer?', '30', '2022-11-10 07:19:44', 0),
(27, 'I need help Requesting a document from the Barangay', '31', '2022-11-10 07:19:44', 0),
(28, 'I need assistance from the Barangay', '32', '2022-11-10 07:19:44', 0),
(29, 'I want to file a Complaint', '33', '2022-11-10 07:19:44', 0),
(30, 'We have an Ayuda Program[LINK] and a Senior Citizen Program[LINK]. For other programs, you can read more here[LINK]', '2', '2022-11-10 07:19:44', 1),
(31, 'Go here [LINK] and choose the document you want to get, explain as to why, and the day you will retrieve it.', '2', '2022-11-10 07:19:44', 1),
(32, 'Go here [LINK] and choose the assistance you need, explain as to why and what happened, and the day need the help.', '2', '2022-11-10 07:19:44', 1),
(33, 'Go here [LINK] and type down your problem? If you have a complaint letter already, you may upload the file.', '2', '2022-11-10 07:19:44', 1),
(34, 'Login?', '24', '2022-11-10 07:19:44', 0),
(35, 'Register an account?', '20', '2022-11-10 07:19:44', 0),
(36, 'Get account verified?', '36', '2022-11-10 07:19:44', 0),
(37, 'After creating an account, you need to wait until your account is verified by checking your valid ID to prove you\'re a resident of the Barangay', '2', '2022-11-10 07:19:44', 1),
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
  `seen` int(11) NOT NULL,
  `remarks` varchar(10000) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_requests`
--

INSERT INTO `tbl_requests` (`request_id`, `user_id`, `document_type`, `document_purpose`, `document_userfile`, `date_needed`, `status`, `seen`, `remarks`, `date_created`) VALUES
(1, 6, '1', 'Something', '', '2022-10-18', 1, 1, '', '2022-11-21 01:36:40'),
(2, 6, '1', '1231123', '', '2022-10-19', 1, 0, '', '2022-11-09 10:51:49'),
(3, 3, '2', 'Please', '', '2022-11-16', 1, 0, '', '2022-11-25 04:40:23'),
(4, 3, '3', 'Please', '', '2022-11-17', 1, 0, '', '2022-11-14 10:13:54'),
(5, 3, '3', 'Hello', '', '2022-11-17', 1, 0, '', '2022-11-14 10:18:52');

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

--
-- Dumping data for table `tbl_request_remarks`
--

INSERT INTO `tbl_request_remarks` (`request_remark_id`, `request_id`, `user_id`, `remark`, `status`, `date_created`) VALUES
(1, 1, 1, 'sa', 1, '2022-11-21 01:36:23'),
(2, 1, 1, 'aaa', 0, '2022-11-21 01:36:30'),
(3, 1, 1, 'aaa', 1, '2022-11-21 01:36:40'),
(4, 3, 1, 'aaaaaa', 0, '2022-11-21 01:36:54'),
(5, 3, 1, 'okay na', 1, '2022-11-21 01:37:28'),
(6, 3, 1, 'nope', 1, '2022-11-21 01:41:28'),
(7, 3, 1, '111', 0, '2022-11-21 01:44:15'),
(8, 3, 1, '111', 1, '2022-11-21 01:46:08'),
(9, 3, 3, 'Thanks po', 1, '2022-11-25 04:54:45');

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
(1, 'Barangay Clearance (300 Pesos)', '300', '2022-11-04 13:51:20'),
(2, 'Cedula (100 Pesos)', '100', '2022-11-04 13:51:20'),
(3, 'Barangay ID (100 Pesos)', '100', '2022-11-04 13:52:03'),
(6, 'Certificate of Residential', '100', '2022-11-23 12:48:37');

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
(1, '0728', 'Don', 'Don', 'Ritualo', 101, '2020', 'Old Job (Publisher of Rizal)', '2022-10-24 08:09:45'),
(2, '0729', 'Mondragon', 'De', 'Jonor', 126, '2020', 'Monk', '2022-10-24 08:16:31'),
(3, '0730', 'Emilito', 'De', 'Kuntador', 99, '2020', 'Veteran', '2022-10-24 08:16:31'),
(4, '0731', 'Roel', 'Castro', 'Barumbado', 165, '2022', 'Superman', '2022-10-24 08:16:31'),
(5, '0732', 'Tasing', 'Sabog', 'Tae', 125, '', 'Pornstar', '2022-10-24 08:16:31'),
(6, '0733', 'Bogart', 'El', 'Nombre', 111, '', 'Handyman', '2022-10-24 08:16:31'),
(7, '0734', 'Raul', 'De', 'Palo', 171, '', 'Carpenter', '2022-10-24 08:16:31'),
(8, '0735', 'Barting', 'Con', 'Tubo', 96, '', 'Plumber', '2022-10-24 08:16:31'),
(9, '0736', 'Tupac', 'N', 'Shakur', 95, '', 'Rapper', '2022-10-24 08:16:31'),
(10, '0925', 'Aling', 'X', 'Cely', 78, '', 'Singer', '2022-10-24 08:16:31'),
(11, '0926', 'Esparanza', 'Mel', 'Checo', 200, '', 'Dancer', '2022-10-24 08:16:31'),
(12, '0927', 'Magdalena', 'Anong', 'Problema', 1000, '', 'GRO', '2022-10-24 08:16:31'),
(13, '1256', 'Batong', 'Burngis', 'Bakal', 268, '', 'Welder', '2022-10-24 08:16:31');

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
(2, 'tanod', 'tanod', 2, 'tanod@gmail.com', 'John', 'F', 'Kenedy', 'Sulok', '093131313131', 'pat.jpg', 2, '', '', '', '', '', '2022-09-16 12:39:14'),
(3, 'resident', 'resident', 3, 'resident@gmail.com', 'Sorry', 'Na', 'Uwu', 'There', '09135465', 'default.jpg', 2, '', '', '', '', '', '2022-09-16 12:39:14'),
(7, 'user_7', 'ma.francescacamille', 2, 'ma.francescacamille@gmail.com', 'Ma. Francesca Camille', 'Malig', 'David', '#190-A SCT. FUENTEBELLA EXT. STREET SACRED HEART, QUEZON CITY', '00000000000', '1668354508.PNG', 2, '', '', '', 'Barangay Captain', '1668367594.jpg', '2022-11-13 15:48:28'),
(8, 'user_8', 'jonah', 2, 'jonah@gmail.com', 'Jonah', 'C', 'Galoyo', '#88 SCT. LIMBAGA STREET SACRED HEART, QUEZON CITY', '00000000000', '1668354672.PNG', 2, '', '', '', 'Secretary', '1668367607.jpg', '2022-11-13 15:51:12'),
(9, 'user_9', 'angelo', 2, 'angelo@gmail.com', 'Angelo', 'L', 'Gatmaytan', '#154 SCT. LIMBAGA EXT. STREET SACRED HEART, QUEZON CITY', '00000000000', '1668354774.PNG', 2, '', '', '', 'Barangay Kagawad', '1668367636.jpg', '2022-11-13 15:52:54'),
(10, 'user_10', 'moises', 2, 'moises@gmail.com', 'Moises', 'P.', 'fulgar', '#175 SCT. FUENTEBELLA EXT. STREET  SACRED HEART, QUEZON CITY.', '00000000000', '1668354835.PNG', 2, '', '', '', 'Barangay Kagawad', '1668367649.jpg', '2022-11-13 15:53:55'),
(11, 'user_11', 'marissa', 2, 'marissa@gmail.com', 'Marissa', 'A.', 'Roissing', '#122 SCT. DE GUIA STREET SACRED HEART, QUEZON CITY', '00000000000', '1668355023.PNG', 2, '', '', '', 'Barangay Kagawad', '1668367669.jpg', '2022-11-13 15:57:03'),
(12, 'user_12', 'jesus', 2, 'jesus@gmail.com', 'Jesus', 'L.', 'Montealto', '#144-C SCT. LIMBAGA STREET SACRED HEART, QUEZON CITY', '00000000000', '1668355077.PNG', 2, '', '', '', 'Barangay Kagawad', '1668367681.jpg', '2022-11-13 15:57:58'),
(13, 'user_13', 'bonifacio', 2, 'bonifacio@gmail.com', 'Bonifacio', 'O.', 'Flores', '#144-C SCT. LIMBAGA STREET SACRED HEART, QUEZON CITY', '00000000000', '1668355153.PNG', 2, '', '', '', 'Barangay Kagawad', '1668367695.jpg', '2022-11-13 15:59:13'),
(14, 'user_14', 'rosemaganda', 3, 'rosemaganda23@gmail.com', 'Rose', 'A.', 'Hatfield', '46, M.H. Del Pilar', '00000000000', '1668356173.PNG', 2, '', '', '', '', '', '2022-11-13 16:04:36'),
(15, 'user_15', 'Robert061598', 3, 'robert15@gmail.com', 'Robert', 'C.', 'Maglinao', '4, Kaimito Street', '00000000000', '1668357520.PNG', 2, '', '', '', '', '', '2022-11-13 16:17:16'),
(16, 'user_16', 'Albert102299', 3, 'Albert22@gmail.com', 'Albert', 'C.', 'Legazpi', 'Lot 9 Block 7, Taas Road', '00000000000', '1668357529.PNG', 2, '', '', '', '', '', '2022-11-13 16:17:49'),
(17, 'user_17', 'Nics120100', 3, 'Nicolai01@gmail.com', 'Nicolai', 'V.', 'Valdez', 'Lot 9 Block 7, Taas Road', '00000000000', '1668357742.PNG', 2, '', '', '', '', '', '2022-11-13 16:18:25'),
(18, 'user_18', 'AmySR1128', 3, 'AmySR@gmail.com', 'Amy', 'S.', 'Reyes', '14, Simeon Ola Avenue', '00000000000', '1668357734.PNG', 2, '', '', '', '', '', '2022-11-13 16:22:29'),
(20, 'user_20', 'vanessa456', 3, 'vanessa564@gmail.com', 'Vanessa', 'A.', 'Johnston', '422, Elisco Road', '00000000000', '1668357538.PNG', 2, '', '', '', '', '', '2022-11-13 16:26:27'),
(21, 'user_21', 'djbombay34', 3, 'projas345@gmail.com', 'Peter', 'R.', 'Hayes', '44, Madrid', '00000000000', '1668357622.PNG', 2, '', '', '', '', '', '2022-11-13 16:27:22'),
(22, 'user_22', 'annmateo123', 3, 'ann.norton@gmail.com', 'Ann', 'N.', 'Lee', '62, Don Gonzalo Puyat', '00000000000', '1668357560.PNG', 2, '', '', '', '', '', '2022-11-13 16:28:47'),
(23, 'user_23', 'secret345', 3, 'mbrown@gmail.com', 'Mackenzie', 'P.', 'Brown', '38, Avocado Street', '00000000000', '1668357568.PNG', 2, '', '', '', '', '', '2022-11-13 16:29:14'),
(24, 'user_24', 'oppakankita', 3, 'megan.archer.98@gmail.com', 'Megan', 'A.', 'Dixon', '44, Redwood', '00000000000', '1668357576.PNG', 2, '', '', '', '', '', '2022-11-13 16:30:11'),
(25, 'user_25', 'MamamoAndoy01', 3, 'Andoy13@gmail.com', 'Andrew', 'S.', 'Hernandez', '4, Mount Pinatubo Drive', '00000000000', '1668357582.PNG', 2, '', '', '', '', '', '2022-11-13 16:30:55'),
(26, 'user_26', 'eduardo', 2, 'eduardo@gmail.com', 'Eduardo', 'M.', 'Lapus', '#27-D SCT. YBARDOLAZA STREET SACRED HEART, QUEZON CITY', '00000000000', '1668363198.PNG', 2, '', '', '', 'Barangay Kagawad', '1668386508.jpg', '2022-11-13 18:13:18'),
(27, 'user_27', 'edwin', 2, 'edwin@gmail.com', 'Edwin', 'DG.', 'Reyes', '#168 SCT. FUENTEBELLA EXT. STREET SACRED HEART, QUEZON CITY.', '00000000000', '1668363235.PNG', 2, '', '', '', 'Barangay Kagawad', '1668386495.jpg', '2022-11-13 18:13:55');

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
  MODIFY `assistance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_assistance_remarks`
--
ALTER TABLE `tbl_assistance_remarks`
  MODIFY `assistance_remark_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_assistance_types`
--
ALTER TABLE `tbl_assistance_types`
  MODIFY `assistance_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_complaints`
--
ALTER TABLE `tbl_complaints`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `tbl_projects`
--
ALTER TABLE `tbl_projects`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_receivers`
--
ALTER TABLE `tbl_receivers`
  MODIFY `receiver_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_replies`
--
ALTER TABLE `tbl_replies`
  MODIFY `reply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tbl_requests`
--
ALTER TABLE `tbl_requests`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `senior_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_usertypes`
--
ALTER TABLE `tbl_usertypes`
  MODIFY `usertype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
