-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2023 at 02:43 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `candidate_register`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`username`, `password`) VALUES
('admin_123', 'admin_123');

-- --------------------------------------------------------

--
-- Table structure for table `demo_table`
--

CREATE TABLE `demo_table` (
  `pdf_file` longblob NOT NULL,
  `resume1` longblob NOT NULL,
  `checkbox` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Demo table';

--
-- Dumping data for table `demo_table`
--

INSERT INTO `demo_table` (`pdf_file`, `resume1`, `checkbox`) VALUES
(0x4954534d5f50726163312e706466, 0x4954534d5f50726163322e706466, 'Rahul Dube,Rajesh Ve');

-- --------------------------------------------------------

--
-- Table structure for table `experienced_details`
--

CREATE TABLE `experienced_details` (
  `username` varchar(20) NOT NULL,
  `f_name` varchar(20) NOT NULL,
  `m_name` varchar(20) NOT NULL,
  `l_name` varchar(20) NOT NULL,
  `d_o_b` date NOT NULL,
  `mobno` bigint(20) UNSIGNED NOT NULL,
  `add_ress` varchar(250) NOT NULL,
  `certificate` longblob DEFAULT NULL,
  `educ_qual` varchar(100) NOT NULL,
  `w_domain` varchar(100) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `yoe` int(4) UNSIGNED NOT NULL,
  `a_resume` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `experienced_details`
--

INSERT INTO `experienced_details` (`username`, `f_name`, `m_name`, `l_name`, `d_o_b`, `mobno`, `add_ress`, `certificate`, `educ_qual`, `w_domain`, `company_name`, `designation`, `yoe`, `a_resume`) VALUES
('', 'nzb', 'MLJH', 'NBJ', '1987-12-12', 1234567899, 'DF', 0x6578705f63657274695f666f6c6465727265666572656e6365732e706466, 'Graduation', 'Productions Research and Development', 'ads', 'we', 12, 0x202e2e2f43616e6469646174652f6578705f726573756d655f666f6c64657273796e6f707369732866696e616c292e706466);

-- --------------------------------------------------------

--
-- Table structure for table `fresher_details`
--

CREATE TABLE `fresher_details` (
  `username` varchar(20) NOT NULL,
  `fname` varchar(20) NOT NULL COMMENT 'first name',
  `mname` varchar(20) NOT NULL COMMENT 'middle name',
  `lname` varchar(20) NOT NULL COMMENT 'last name',
  `dob` date NOT NULL COMMENT 'date of birth',
  `mob_no` bigint(20) UNSIGNED NOT NULL COMMENT 'phone number',
  `address` varchar(300) NOT NULL COMMENT 'address',
  `certi` varchar(500) DEFAULT NULL COMMENT 'certifications',
  `edu_qual` varchar(30) NOT NULL COMMENT 'education qualifications',
  `domain` varchar(30) NOT NULL COMMENT 'Applying domain',
  `resume` varchar(500) NOT NULL COMMENT 'Resume to be attached.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Details of freshers to be displayed to the HR';

--
-- Dumping data for table `fresher_details`
--

INSERT INTO `fresher_details` (`username`, `fname`, `mname`, `lname`, `dob`, `mob_no`, `address`, `certi`, `edu_qual`, `domain`, `resume`) VALUES
('Kanha', 'Radhe', 'Kanha', 'Radhe', '1967-08-23', 1234321235, 'asdjnca', 'certificate_folder/Smart HR_front.pdf', 'Post Graduation', 'Productions Research and Devel', '../Candidate/resume_folder/synopsis(final).pdf'),
('Krishna', 'Krishna', 'Kanha', 'Yadav', '2001-09-11', 7045545498, 'A/20, Shivam Wing, Dombivli-(East)  ', 'certificate_folder/synopsis(final).pdf', 'Post Graduation', 'Operations management', '../Candidate/resume_folder/references.pdf'),
('Radhe', 'Radhe', 'Kanha', 'Yadav', '2018-09-11', 9869615274, 'Bhayander-east', 'certificate_folder/Smart HR_front.pdf', 'Post Graduation', 'Human Resources', 'resume_folder/references.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `job_id` int(10) NOT NULL,
  `job_title` varchar(20) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `job_title`, `category`) VALUES
(4, 'HR Assistant', 'Productions Research and Development'),
(11, 'Manager', 'Productions Research and Development'),
(15, 'Sales Executive', 'Sales and Purchase');

-- --------------------------------------------------------

--
-- Table structure for table `register_login`
--

CREATE TABLE `register_login` (
  `cid` int(20) NOT NULL COMMENT 'candidate id',
  `username` varchar(20) NOT NULL COMMENT 'candidate name',
  `password` varchar(20) NOT NULL COMMENT 'password',
  `email` varchar(30) NOT NULL COMMENT 'email-id',
  `cadidate_log` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'timestamp of user login and registration',
  `eligible` int(10) NOT NULL DEFAULT 0 COMMENT 'candidate eligibility',
  `c_resume` varchar(1000) NOT NULL COMMENT 'candidate resume\r\n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register_login`
--

INSERT INTO `register_login` (`cid`, `username`, `password`, `email`, `cadidate_log`, `eligible`, `c_resume`) VALUES
(100, 'Radhe', 'Ruhi', 'rr@gmail.com', '2023-04-25 14:42:10', 0, '../Candidate/resume_folder/references.pdf'),
(253, 'Vikas', 'Naina', 'vn@gmail.com', '2023-04-25 17:22:19', 0, '../Candidate/resume_folder/Smart HR_front.pdf'),
(255, 'Krishna', 'Kanha', 'rk@gmail.com', '2023-04-25 17:33:06', 1, '../Candidate/resume_folder/references.pdf'),
(261, 'Kanha', 'Radhe', 'kr@gmail.com', '2023-04-25 19:18:39', 1, '../Candidate/resume_folder/synopsis(final).pdf'),
(272, 'Shiv', 'Parvati', 'sp@gmail.com', '2023-04-25 20:59:36', 0, '../Candidate/resume_folder/references.pdf'),
(282, 'Mihir', 'mihir', 'mihir@gmail.com', '2023-04-26 03:20:07', 1, '../Candidate/resume_folder/Smart HR_front.pdf'),
(288, 'Shyama', 'ss', 's@gmail.com', '2023-04-26 04:41:42', 0, '../Candidate/resume_folder/Smart HR_front.pdf'),
(296, 'Ganesh', 'gaju', 'ganesh@gmail.com', '2023-04-26 04:52:07', 0, '../Candidate/resume_folder/Smart HR_front.pdf'),
(299, '', '', '', '2023-04-26 04:57:33', 0, ''),
(300, 'abs', 'abs', 'abs@gmail.com', '2023-04-26 05:31:46', 0, '../Candidate/resume_folder/synopsis(final).pdf'),
(302, 'Swami', 'sa', 's1@gmail.com', '2023-04-27 14:49:42', 1, '../Candidate/resume_folder/Smart HR_front.pdf'),
(304, 'Sarojini', 'saro', 'sarojinichandu@gmail.com', '2023-04-27 14:51:56', 0, '../Candidate/resume_folder/synopsis(final).pdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `password` (`password`);

--
-- Indexes for table `demo_table`
--
ALTER TABLE `demo_table`
  ADD UNIQUE KEY `pdf_file` (`pdf_file`,`resume1`,`checkbox`) USING HASH;

--
-- Indexes for table `experienced_details`
--
ALTER TABLE `experienced_details`
  ADD PRIMARY KEY (`mobno`);

--
-- Indexes for table `fresher_details`
--
ALTER TABLE `fresher_details`
  ADD PRIMARY KEY (`mob_no`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `register_login`
--
ALTER TABLE `register_login`
  ADD PRIMARY KEY (`cid`),
  ADD UNIQUE KEY `Unique` (`username`),
  ADD UNIQUE KEY `UNIQUE_P` (`password`),
  ADD UNIQUE KEY `UNIQUE_E` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `register_login`
--
ALTER TABLE `register_login`
  MODIFY `cid` int(20) NOT NULL AUTO_INCREMENT COMMENT 'candidate id', AUTO_INCREMENT=305;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
