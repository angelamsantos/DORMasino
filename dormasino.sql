-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2019 at 12:22 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dormasino`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tbl`
--

CREATE TABLE `admin_tbl` (
  `admin_id` int(32) UNSIGNED NOT NULL,
  `admin_email` varchar(64) NOT NULL,
  `admin_password` varchar(64) NOT NULL,
  `admin_type` int(32) UNSIGNED NOT NULL,
  `admin_fname` varchar(64) NOT NULL,
  `admin_lname` varchar(64) NOT NULL,
  `admin_new` int(32) UNSIGNED NOT NULL,
  `admin_status` int(32) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `admin_empno` int(32) UNSIGNED NOT NULL,
  `admin_cno` varchar(64) NOT NULL,
  `admin_attempts` int(32) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_tbl`
--

INSERT INTO `admin_tbl` (`admin_id`, `admin_email`, `admin_password`, `admin_type`, `admin_fname`, `admin_lname`, `admin_new`, `admin_status`, `date_created`, `admin_empno`, `admin_cno`, `admin_attempts`) VALUES
(2, 'thores20182019@gmail.com', '09e7391395c56f591fa3ad9f004c63c9', 11111111, 'Thomasian Residences', 'Management', 0, 1, '2019-01-17 22:10:03', 1, '09999999999', 0);

-- --------------------------------------------------------

--
-- Table structure for table `annfile_tbl`
--

CREATE TABLE `annfile_tbl` (
  `annfile_id` int(32) UNSIGNED NOT NULL,
  `annfile_path` varchar(64) NOT NULL,
  `ann_id` int(32) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ann_tbl`
--

CREATE TABLE `ann_tbl` (
  `ann_id` int(32) UNSIGNED NOT NULL,
  `ann_title` varchar(200) NOT NULL,
  `ann_content` text NOT NULL,
  `date_posted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `admin_id` int(32) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ann_tbl`
--

INSERT INTO `ann_tbl` (`ann_id`, `ann_title`, `ann_content`, `date_posted`, `admin_id`) VALUES
(1, '', 'Paunawa\r\n\r\nDahil sa paghihigpit ng DPS at GARBAGE COLLECTOR, ipinagbabawal na po ang pagtatapon ng mga basura sa likod ng elevator. Kailangan niyo pong ilagay ang tapunan kung ito ay \"NABUBULOK\" at \"HINDI NABUBULOK\". Ito po ay makikita sa pagpasok ng ating building. Maraming salamat!', '2019-01-22 11:22:01', 2);

-- --------------------------------------------------------

--
-- Table structure for table `bill_tbl`
--

CREATE TABLE `bill_tbl` (
  `bill_id` int(32) UNSIGNED NOT NULL,
  `date_received` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `amount_due` double NOT NULL,
  `tenant_id` int(32) UNSIGNED NOT NULL,
  `btype_id` int(32) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `btype_tbl`
--

CREATE TABLE `btype_tbl` (
  `btype_id` int(32) UNSIGNED NOT NULL,
  `btype_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contract_tbl`
--

CREATE TABLE `contract_tbl` (
  `contract_id` int(32) UNSIGNED NOT NULL,
  `contract_start` date NOT NULL,
  `contract_status` int(32) UNSIGNED NOT NULL,
  `tenant_id` int(32) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contract_tbl`
--

INSERT INTO `contract_tbl` (`contract_id`, `contract_start`, `contract_status`, `tenant_id`) VALUES
(4, '2018-09-01', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `dir_tbl`
--

CREATE TABLE `dir_tbl` (
  `dir_id` int(10) UNSIGNED NOT NULL,
  `tenant_id` int(32) UNSIGNED NOT NULL,
  `room_id` int(32) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dir_tbl`
--

INSERT INTO `dir_tbl` (`dir_id`, `tenant_id`, `room_id`) VALUES
(4, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `father_tbl`
--

CREATE TABLE `father_tbl` (
  `father_id` int(32) UNSIGNED NOT NULL,
  `father_name` varchar(64) NOT NULL,
  `father_mno` varchar(64) NOT NULL,
  `tenant_id` int(32) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `father_tbl`
--

INSERT INTO `father_tbl` (`father_id`, `father_name`, `father_mno`, `tenant_id`) VALUES
(4, 'Virgilio P. Dela Cruz', '09178732927', 4);

-- --------------------------------------------------------

--
-- Table structure for table `floor_tbl`
--

CREATE TABLE `floor_tbl` (
  `floor_id` int(32) UNSIGNED NOT NULL,
  `floor_number` int(32) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `floor_tbl`
--

INSERT INTO `floor_tbl` (`floor_id`, `floor_number`) VALUES
(1, 3),
(2, 4),
(3, 5),
(4, 6),
(5, 7),
(6, 8),
(7, 9),
(8, 10),
(9, 11),
(10, 12);

-- --------------------------------------------------------

--
-- Table structure for table `guardian_tbl`
--

CREATE TABLE `guardian_tbl` (
  `guardian_id` int(32) UNSIGNED NOT NULL,
  `guardian_name` varchar(64) NOT NULL,
  `guardian_rel` varchar(64) NOT NULL,
  `guardian_mno` varchar(64) NOT NULL,
  `guardian_lno` varchar(64) DEFAULT NULL,
  `guardian_email` varchar(64) NOT NULL,
  `tenant_id` int(32) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guardian_tbl`
--

INSERT INTO `guardian_tbl` (`guardian_id`, `guardian_name`, `guardian_rel`, `guardian_mno`, `guardian_lno`, `guardian_email`, `tenant_id`) VALUES
(4, 'Virgilio P. Dela Cruz', 'Father', '09178732927', '', 'ghil_731@gmail.com', 4);

-- --------------------------------------------------------

--
-- Table structure for table `mother_tbl`
--

CREATE TABLE `mother_tbl` (
  `mother_id` int(32) UNSIGNED NOT NULL,
  `mother_name` varchar(64) NOT NULL,
  `mother_mno` varchar(64) NOT NULL,
  `tenant_id` int(32) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mother_tbl`
--

INSERT INTO `mother_tbl` (`mother_id`, `mother_name`, `mother_mno`, `tenant_id`) VALUES
(4, 'Ma', '09123456789', 4);

-- --------------------------------------------------------

--
-- Table structure for table `room_tbl`
--

CREATE TABLE `room_tbl` (
  `room_id` int(32) UNSIGNED NOT NULL,
  `room_number` int(32) UNSIGNED NOT NULL,
  `room_tcount` int(32) UNSIGNED NOT NULL,
  `room_price` int(32) UNSIGNED NOT NULL,
  `room_status` int(32) UNSIGNED NOT NULL,
  `floor_id` int(32) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room_tbl`
--

INSERT INTO `room_tbl` (`room_id`, `room_number`, `room_tcount`, `room_price`, `room_status`, `floor_id`) VALUES
(1, 301, 4, 14000, 1, 1),
(2, 302, 4, 14000, 1, 1),
(3, 303, 4, 14000, 1, 1),
(4, 304, 4, 14000, 1, 1),
(5, 305, 4, 14000, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tenant_tbl`
--

CREATE TABLE `tenant_tbl` (
  `tenant_id` int(32) UNSIGNED NOT NULL,
  `tenant_email` varchar(64) NOT NULL,
  `tenant_password` varchar(64) NOT NULL,
  `tenant_fname` varchar(64) NOT NULL,
  `tenant_lname` varchar(64) NOT NULL,
  `tenant_address` varchar(255) NOT NULL,
  `tenant_birthday` date NOT NULL,
  `tenant_school` varchar(255) NOT NULL,
  `tenant_course` varchar(64) NOT NULL,
  `tenant_cno` varchar(64) NOT NULL,
  `tenant_medical` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tenant_new` int(32) UNSIGNED NOT NULL,
  `tenant_status` int(32) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tenant_tbl`
--

INSERT INTO `tenant_tbl` (`tenant_id`, `tenant_email`, `tenant_password`, `tenant_fname`, `tenant_lname`, `tenant_address`, `tenant_birthday`, `tenant_school`, `tenant_course`, `tenant_cno`, `tenant_medical`, `date_created`, `tenant_new`, `tenant_status`) VALUES
(1, 'maesantos29@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Angela', 'Santos', 'Mandaluyong City', '1997-07-29', 'UST', 'BSIT', '09470142216', 'none', '2018-11-30 07:23:36', 1, 1),
(2, 'avdelacruz@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Arvin', 'Dela Cruz', 'Fairview QC', '1999-03-15', 'UST', 'BSIT', '09470142216', 'none', '2018-11-30 04:07:21', 1, 1),
(3, 'dafernandez@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Dave', 'Fernandez', 'San Pedro Laguna', '1999-05-03', 'UST', 'BSIT', '09470142216', 'none', '2018-11-30 04:08:36', 1, 1),
(4, 'delacruz.arvin04@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Arvin', 'Dela Cruz', 'Block 9 Lot 3, Franchise Street, BIR Village, Fairview, Quezon City', '1999-03-15', 'UST', 'BSIT', '09954036824', '', '2018-11-30 09:58:59', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `trans_tbl`
--

CREATE TABLE `trans_tbl` (
  `trans_id` int(32) UNSIGNED NOT NULL,
  `date_paid` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `amount_paid` double NOT NULL,
  `bill_id` int(32) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vlogs_tbl`
--

CREATE TABLE `vlogs_tbl` (
  `vlogs_id` int(32) UNSIGNED NOT NULL,
  `vlogs_name` varchar(64) NOT NULL,
  `vlogs_relation` varchar(64) NOT NULL,
  `vlogs_purpose` varchar(64) NOT NULL,
  `vlogs_id_presented` varchar(64) NOT NULL,
  `vlogs_in` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `vlogs_out` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `tenant_id` int(32) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vlogs_tbl`
--

INSERT INTO `vlogs_tbl` (`vlogs_id`, `vlogs_name`, `vlogs_relation`, `vlogs_purpose`, `vlogs_id_presented`, `vlogs_in`, `vlogs_out`, `tenant_id`) VALUES
(1, 'Dave', 'Blockmate', 'Thesis', 'School ID', '2019-01-18 12:53:11', '2019-01-18 12:53:14', 4),
(2, 'Angela Mae Santos', 'Friend', 'Makiki CR', 'School ID', '2019-01-18 13:17:47', '2019-01-22 10:08:29', 4),
(3, 'Francis Gella', 'Blockmate', 'Thesis Meeting', 'School ID', '2019-01-22 08:35:24', '2019-01-22 09:05:15', 4),
(4, 'Mark Bustos', 'Friend', 'Dinner', 'School ID', '2019-01-22 09:58:07', '2019-01-22 10:00:22', 4),
(5, 'Alwyn Santos', 'Friend', 'Dinner', 'School ID', '2019-01-22 10:03:44', '0000-00-00 00:00:00', 4),
(6, 'Andrea Mateo', 'Friend', 'Dinner', 'School ID', '2019-01-22 10:05:56', '2019-01-22 10:08:37', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `annfile_tbl`
--
ALTER TABLE `annfile_tbl`
  ADD PRIMARY KEY (`annfile_id`),
  ADD KEY `annfile_tbl_ibfk_1` (`ann_id`);

--
-- Indexes for table `ann_tbl`
--
ALTER TABLE `ann_tbl`
  ADD PRIMARY KEY (`ann_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `bill_tbl`
--
ALTER TABLE `bill_tbl`
  ADD PRIMARY KEY (`bill_id`),
  ADD KEY `tenant_id` (`tenant_id`),
  ADD KEY `btype_id` (`btype_id`);

--
-- Indexes for table `btype_tbl`
--
ALTER TABLE `btype_tbl`
  ADD PRIMARY KEY (`btype_id`);

--
-- Indexes for table `contract_tbl`
--
ALTER TABLE `contract_tbl`
  ADD PRIMARY KEY (`contract_id`),
  ADD KEY `tenant_id` (`tenant_id`);

--
-- Indexes for table `dir_tbl`
--
ALTER TABLE `dir_tbl`
  ADD PRIMARY KEY (`dir_id`),
  ADD KEY `room_id` (`room_id`),
  ADD KEY `tenant_id` (`tenant_id`);

--
-- Indexes for table `father_tbl`
--
ALTER TABLE `father_tbl`
  ADD PRIMARY KEY (`father_id`),
  ADD KEY `tenand_id` (`tenant_id`);

--
-- Indexes for table `floor_tbl`
--
ALTER TABLE `floor_tbl`
  ADD PRIMARY KEY (`floor_id`);

--
-- Indexes for table `guardian_tbl`
--
ALTER TABLE `guardian_tbl`
  ADD PRIMARY KEY (`guardian_id`),
  ADD KEY `tenant_id` (`tenant_id`);

--
-- Indexes for table `mother_tbl`
--
ALTER TABLE `mother_tbl`
  ADD PRIMARY KEY (`mother_id`),
  ADD KEY `tenand_id` (`tenant_id`);

--
-- Indexes for table `room_tbl`
--
ALTER TABLE `room_tbl`
  ADD PRIMARY KEY (`room_id`),
  ADD KEY `floor_id` (`floor_id`);

--
-- Indexes for table `tenant_tbl`
--
ALTER TABLE `tenant_tbl`
  ADD PRIMARY KEY (`tenant_id`);

--
-- Indexes for table `trans_tbl`
--
ALTER TABLE `trans_tbl`
  ADD PRIMARY KEY (`trans_id`),
  ADD KEY `bill_id` (`bill_id`);

--
-- Indexes for table `vlogs_tbl`
--
ALTER TABLE `vlogs_tbl`
  ADD PRIMARY KEY (`vlogs_id`),
  ADD KEY `tenant_id` (`tenant_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  MODIFY `admin_id` int(32) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `annfile_tbl`
--
ALTER TABLE `annfile_tbl`
  MODIFY `annfile_id` int(32) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ann_tbl`
--
ALTER TABLE `ann_tbl`
  MODIFY `ann_id` int(32) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bill_tbl`
--
ALTER TABLE `bill_tbl`
  MODIFY `bill_id` int(32) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `btype_tbl`
--
ALTER TABLE `btype_tbl`
  MODIFY `btype_id` int(32) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contract_tbl`
--
ALTER TABLE `contract_tbl`
  MODIFY `contract_id` int(32) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dir_tbl`
--
ALTER TABLE `dir_tbl`
  MODIFY `dir_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `father_tbl`
--
ALTER TABLE `father_tbl`
  MODIFY `father_id` int(32) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `floor_tbl`
--
ALTER TABLE `floor_tbl`
  MODIFY `floor_id` int(32) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `guardian_tbl`
--
ALTER TABLE `guardian_tbl`
  MODIFY `guardian_id` int(32) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mother_tbl`
--
ALTER TABLE `mother_tbl`
  MODIFY `mother_id` int(32) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `room_tbl`
--
ALTER TABLE `room_tbl`
  MODIFY `room_id` int(32) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tenant_tbl`
--
ALTER TABLE `tenant_tbl`
  MODIFY `tenant_id` int(32) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `trans_tbl`
--
ALTER TABLE `trans_tbl`
  MODIFY `trans_id` int(32) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vlogs_tbl`
--
ALTER TABLE `vlogs_tbl`
  MODIFY `vlogs_id` int(32) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `annfile_tbl`
--
ALTER TABLE `annfile_tbl`
  ADD CONSTRAINT `annfile_tbl_ibfk_1` FOREIGN KEY (`ann_id`) REFERENCES `ann_tbl` (`ann_id`) ON DELETE NO ACTION;

--
-- Constraints for table `ann_tbl`
--
ALTER TABLE `ann_tbl`
  ADD CONSTRAINT `ann_tbl_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin_tbl` (`admin_id`);

--
-- Constraints for table `bill_tbl`
--
ALTER TABLE `bill_tbl`
  ADD CONSTRAINT `bill_tbl_ibfk_1` FOREIGN KEY (`tenant_id`) REFERENCES `tenant_tbl` (`tenant_id`),
  ADD CONSTRAINT `bill_tbl_ibfk_2` FOREIGN KEY (`btype_id`) REFERENCES `btype_tbl` (`btype_id`);

--
-- Constraints for table `contract_tbl`
--
ALTER TABLE `contract_tbl`
  ADD CONSTRAINT `contract_tbl_ibfk_1` FOREIGN KEY (`tenant_id`) REFERENCES `tenant_tbl` (`tenant_id`);

--
-- Constraints for table `dir_tbl`
--
ALTER TABLE `dir_tbl`
  ADD CONSTRAINT `dir_tbl_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `room_tbl` (`room_id`),
  ADD CONSTRAINT `dir_tbl_ibfk_2` FOREIGN KEY (`tenant_id`) REFERENCES `tenant_tbl` (`tenant_id`);

--
-- Constraints for table `father_tbl`
--
ALTER TABLE `father_tbl`
  ADD CONSTRAINT `father_tbl_ibfk_1` FOREIGN KEY (`tenant_id`) REFERENCES `tenant_tbl` (`tenant_id`);

--
-- Constraints for table `guardian_tbl`
--
ALTER TABLE `guardian_tbl`
  ADD CONSTRAINT `guardian_tbl_ibfk_1` FOREIGN KEY (`tenant_id`) REFERENCES `tenant_tbl` (`tenant_id`);

--
-- Constraints for table `mother_tbl`
--
ALTER TABLE `mother_tbl`
  ADD CONSTRAINT `mother_tbl_ibfk_1` FOREIGN KEY (`tenant_id`) REFERENCES `tenant_tbl` (`tenant_id`);

--
-- Constraints for table `room_tbl`
--
ALTER TABLE `room_tbl`
  ADD CONSTRAINT `room_tbl_ibfk_1` FOREIGN KEY (`floor_id`) REFERENCES `floor_tbl` (`floor_id`);

--
-- Constraints for table `trans_tbl`
--
ALTER TABLE `trans_tbl`
  ADD CONSTRAINT `trans_tbl_ibfk_1` FOREIGN KEY (`bill_id`) REFERENCES `bill_tbl` (`bill_id`);

--
-- Constraints for table `vlogs_tbl`
--
ALTER TABLE `vlogs_tbl`
  ADD CONSTRAINT `vlogs_tbl_ibfk_1` FOREIGN KEY (`tenant_id`) REFERENCES `tenant_tbl` (`tenant_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
