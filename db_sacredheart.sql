-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2022 at 10:51 PM
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
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_assistance`
--

INSERT INTO `tbl_assistance` (`assistance_id`, `user_id`, `assistance_type`, `assistance_purpose`, `date_needed`, `status`, `date_created`) VALUES
(1, 6, '1', '123213', '2022-10-21', 0, '2022-11-09 10:54:31');

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
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_complaints`
--

INSERT INTO `tbl_complaints` (`complaint_id`, `user_id`, `complaint_description`, `complaint_letter`, `status`, `date_created`) VALUES
(1, 6, '123123', '1666196054.txt', 1, '2022-11-09 10:54:26'),
(2, 6, '12313123', '1666196237.txt', 0, '2022-10-19 16:17:17');

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
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_replies`
--

INSERT INTO `tbl_replies` (`reply_id`, `reply`, `reply_suggested`, `date_created`) VALUES
(1, 'How can I help you?', '2,3,4,5', '2022-10-24 12:35:17'),
(2, 'I need help from the Barangay', '6,7', '2022-10-24 12:36:24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_requests`
--

CREATE TABLE `tbl_requests` (
  `request_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `document_type` varchar(250) NOT NULL,
  `document_purpose` varchar(1000) NOT NULL,
  `date_needed` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_requests`
--

INSERT INTO `tbl_requests` (`request_id`, `user_id`, `document_type`, `document_purpose`, `date_needed`, `status`, `date_created`) VALUES
(1, 6, '1', 'Something', '2022-10-18', 0, '2022-11-09 13:27:22'),
(2, 6, '1', '1231123', '2022-10-19', 1, '2022-11-09 10:51:49');

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
  `dp_userfile` varchar(250) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `username`, `password`, `usertype`, `email`, `fname`, `mname`, `lname`, `address`, `contact`, `userfile`, `approved`, `verification_code`, `reg_userfile`, `dp_userfile`, `date_created`) VALUES
(1, 'admin', 'admin', 1, 'admin@gmail.com', '', '', '', '', '', 'default.jpg', 1, '', '', '', '2022-09-16 12:38:05'),
(2, 'tanod', 'tanod', 2, 'tanod@gmail.com', 'John', 'F', 'Kenedy', 'Sulok', '093131313131', 'pat.jpg', 1, '', '', '', '2022-09-16 12:39:14'),
(3, 'resident', 'resident', 3, 'resident@gmail.com', '', '', '', '', '', 'default.jpg', 1, '', '', '', '2022-09-16 12:39:14'),
(6, 'user_1663763872', 'password', 3, 'georgelouisjose@gmail.com', 'George Louis', 'Martinez', 'Jose', 'Binangonan, Rizal', '09363362225', 'pat.jpg', 1, '', '', '', '2022-09-21 12:37:52');

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
-- Indexes for table `tbl_logs`
--
ALTER TABLE `tbl_logs`
  ADD PRIMARY KEY (`log_id`);

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
-- AUTO_INCREMENT for table `tbl_logs`
--
ALTER TABLE `tbl_logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_receivers`
--
ALTER TABLE `tbl_receivers`
  MODIFY `receiver_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_replies`
--
ALTER TABLE `tbl_replies`
  MODIFY `reply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_usertypes`
--
ALTER TABLE `tbl_usertypes`
  MODIFY `usertype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
