-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 03, 2021 at 07:55 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nmaist_sris`
--
CREATE DATABASE IF NOT EXISTS `nmaist_sris` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `nmaist_sris`;

-- --------------------------------------------------------

--
-- Table structure for table `academic_year`
--
-- Creation: Apr 23, 2021 at 09:47 PM
--

DROP TABLE IF EXISTS `academic_year`;
CREATE TABLE IF NOT EXISTS `academic_year` (
  `academic_id` int(10) NOT NULL AUTO_INCREMENT,
  `year` varchar(12) NOT NULL,
  `detail` varchar(30) NOT NULL DEFAULT 'inactive',
  PRIMARY KEY (`academic_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `academic_year`:
--

--
-- Truncate table before insert `academic_year`
--

TRUNCATE TABLE `academic_year`;
--
-- Dumping data for table `academic_year`
--

INSERT INTO `academic_year` (`academic_id`, `year`, `detail`) VALUES
(1, '2009/10', 'inactive'),
(2, '2010/11', 'inactive'),
(3, '2011/12', 'inactive'),
(4, '2012/13', 'inactive'),
(5, '2013/14', 'inactive'),
(6, '2014/15', 'inactive'),
(7, '2015/16', 'inactive'),
(8, '2016/17', 'inactive'),
(9, '2017/18', 'inactive'),
(10, '2018/19', 'inactive'),
(11, '2019/20', 'inactive'),
(12, '2020/21', 'active'),
(13, '2021/22', 'inactive'),
(14, '2022/23', 'inactive'),
(15, '2023/24', 'inactive');

-- --------------------------------------------------------

--
-- Stand-in structure for view `authentication_view`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `authentication_view`;
CREATE TABLE IF NOT EXISTS `authentication_view` (
`f_name` varchar(30)
,`m_name` varchar(20)
,`l_name` varchar(20)
,`email` varchar(30)
,`system_level` varchar(20)
,`password` varchar(80)
);

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--
-- Creation: Apr 23, 2021 at 09:48 PM
--

DROP TABLE IF EXISTS `bill`;
CREATE TABLE IF NOT EXISTS `bill` (
  `bill_id` int(10) NOT NULL AUTO_INCREMENT,
  `bill_name` varchar(30) NOT NULL,
  PRIMARY KEY (`bill_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `bill`:
--

--
-- Truncate table before insert `bill`
--

TRUNCATE TABLE `bill`;
--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`bill_id`, `bill_name`) VALUES
(14, 'Accomodation'),
(15, 'Student Union'),
(16, 'Caution Money'),
(17, 'Identity Card'),
(18, 'Medical Capitation'),
(19, 'Registration Fee'),
(20, 'TCU Fees'),
(21, 'Examinations Appeal'),
(22, 'Tuition Fee'),
(23, 'Graduation Gown'),
(24, 'Other'),
(25, 'Progress Report'),
(26, 'Lupsum');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--
-- Creation: Apr 23, 2021 at 09:49 PM
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE IF NOT EXISTS `course` (
  `course_id` int(10) NOT NULL AUTO_INCREMENT,
  `course_short_form` varchar(10) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `course_desc` varchar(100) NOT NULL,
  `school_id` int(10) NOT NULL,
  `level` varchar(10) NOT NULL,
  PRIMARY KEY (`course_id`),
  KEY `school_id` (`school_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `course`:
--   `school_id`
--       `school` -> `school_id`
--

--
-- Truncate table before insert `course`
--

TRUNCATE TABLE `course`;
--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_short_form`, `course_name`, `course_desc`, `school_id`, `level`) VALUES
(5, 'MCSE', 'Mathematical and Computer Science and Engineering', 'Mathematics', 2, 'Masters'),
(6, 'ICSE', 'Information and Communication Science and Engineering', 'Two specialities', 2, 'Masters'),
(7, 'EMoS', 'Embedded and Mobile System', 'Two specialities', 2, 'Masters'),
(8, 'WiMC', 'Wireless and Mobile Computing', 'Out of cables', 2, 'Masters'),
(9, 'ISNS', 'Information System and Network Security', 'Security and Hacking', 2, 'Masters'),
(10, 'MCSE - PhD', 'Mathematical and Computer Science and Engineering', 'PhD mathematics', 2, 'PhD'),
(11, 'ICSE - PhD', 'Information and Communication Science and Engineering', 'PhD in ICSE', 2, 'PhD'),
(12, 'HBS', 'Health and Biomedical Sciences', 'Health', 1, 'Masters'),
(13, 'BEM', 'Biodiversity and Ecosystem Management', 'Biodiversity', 1, 'Masters'),
(14, 'SA', 'Sustainable Agriculture', 'Agriculture', 1, 'Masters'),
(15, 'FoSB', 'Food Science and Biotechnology', 'Food', 1, 'Masters'),
(16, 'HuND', 'Human Nutrition and Dietetic', 'Nutrition', 1, 'Masters'),
(17, 'PHR', 'Public Health Research', 'Public Health', 1, 'Masters'),
(18, 'HSB - PhD', 'Health and Biomedical Sciences', 'PhD Health', 1, 'PhD'),
(19, 'BEM - PhD', 'Biodiversity and Ecosystem Management', 'PhD Ecosystem', 1, 'PhD'),
(20, 'SA - PhD', 'Sustainable Agriculture', 'Agriculture', 1, 'PhD'),
(21, 'FoSB - PhD', 'Food Science and Biotechnology', 'Food food', 1, 'PhD'),
(22, 'HuND - PhD', 'Human Nutrition and Dietetic', 'Human Nutrition', 1, 'PhD'),
(23, 'MaSE', 'Materials Science and Engineering', 'Materials', 3, 'Masters'),
(24, 'SESE', 'Sustainable Energy Science and Engineering', 'Sustainable energy', 3, 'Masters'),
(25, 'HWRE', 'Hydrology and Water Resources Engineering', 'Hydrology', 3, 'Masters'),
(26, 'EnSE', 'Environmental Science and Engineering', 'Environmental Sciences', 3, 'Masters'),
(27, 'MaSE - PhD', 'Materials Science and Engineering', 'Materials', 3, 'PhD'),
(28, 'SESE - PhD', 'Sustainable Energy Science and Engineering', 'Sustained energy', 3, 'PhD'),
(29, 'HWRE - PhD', 'Hydrology and Water Resources Engineering', 'Hydro stuffs', 3, 'PhD'),
(30, 'EnSE - PhD', 'Environmental Science and Engineering', 'Mazingira', 3, 'PhD');

-- --------------------------------------------------------

--
-- Table structure for table `dean_appointment`
--
-- Creation: May 31, 2021 at 01:23 PM
--

DROP TABLE IF EXISTS `dean_appointment`;
CREATE TABLE IF NOT EXISTS `dean_appointment` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `student_id` varchar(10) NOT NULL,
  `service_nature` varchar(20) NOT NULL,
  `details` text NOT NULL,
  `date_submited` timestamp NOT NULL DEFAULT current_timestamp(),
  `phone` varchar(17) NOT NULL,
  `email` varchar(40) NOT NULL,
  `dean_instruction` varchar(50) DEFAULT NULL,
  `meeting_date` datetime DEFAULT NULL,
  `meeting_location` varchar(20) DEFAULT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`id`),
  KEY `student_id` (`student_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `dean_appointment`:
--   `student_id`
--       `student` -> `student_id`
--

--
-- Truncate table before insert `dean_appointment`
--

TRUNCATE TABLE `dean_appointment`;
--
-- Dumping data for table `dean_appointment`
--

INSERT INTO `dean_appointment` (`id`, `student_id`, `service_nature`, `details`, `date_submited`, `phone`, `email`, `dean_instruction`, `meeting_date`, `meeting_location`, `status`) VALUES
(1, 'M054/T19', 'Advice', 'Blaablaaa', '2021-04-19 00:24:26', '765475736', 'mwinukal@nm-aist.ac.tz', 'Come alone', '2021-04-30 11:18:23', 'Office', 'approved'),
(2, 'M054/T19', 'Education', 'Hello hello, we are trying               ', '2021-04-19 11:57:34', '765268371', 'lunomwinuka@gmail.com', '', '0000-00-00 00:00:00', '', 'pending'),
(3, 'M054/T19', 'Counselling', 'Hello hello, we are trying', '2021-04-19 12:02:22', '765268371', 'lunomwinuka@gmail.com', '', '0000-00-00 00:00:00', '', 'pending'),
(4, 'M054/T19', 'Ushauri', 'Matatizo makubwa', '2021-05-11 19:00:09', '76452532', 'mwinukal@nm-aist.ac.tz', NULL, NULL, NULL, 'pending'),
(5, 'M054/T19', 'Advise', 'Hkdjfksd fksdhfisdlfksd                                                                ', '2021-05-31 13:23:37', '+255765268371', 'mwinukal@nm-aist.ac.tz', NULL, NULL, NULL, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `document_category`
--
-- Creation: Apr 23, 2021 at 09:52 PM
--

DROP TABLE IF EXISTS `document_category`;
CREATE TABLE IF NOT EXISTS `document_category` (
  `document_category_id` int(10) NOT NULL AUTO_INCREMENT,
  `document_cat` varchar(30) NOT NULL,
  PRIMARY KEY (`document_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `document_category`:
--

--
-- Truncate table before insert `document_category`
--

TRUNCATE TABLE `document_category`;
--
-- Dumping data for table `document_category`
--

INSERT INTO `document_category` (`document_category_id`, `document_cat`) VALUES
(1, 'Personal Identification'),
(2, 'Academic Qualification'),
(3, 'Admissions'),
(4, 'Scholarship'),
(5, 'Payment'),
(6, 'Health'),
(7, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `document_type`
--
-- Creation: Apr 23, 2021 at 09:53 PM
--

DROP TABLE IF EXISTS `document_type`;
CREATE TABLE IF NOT EXISTS `document_type` (
  `document_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `document_category_id` int(10) NOT NULL,
  `document_type` varchar(40) NOT NULL,
  PRIMARY KEY (`document_type_id`),
  KEY `document_category_id` (`document_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `document_type`:
--   `document_category_id`
--       `document_category` -> `document_category_id`
--

--
-- Truncate table before insert `document_type`
--

TRUNCATE TABLE `document_type`;
--
-- Dumping data for table `document_type`
--

INSERT INTO `document_type` (`document_type_id`, `document_category_id`, `document_type`) VALUES
(19, 1, 'National ID'),
(20, 1, 'Birth Certificate'),
(21, 1, 'Passport'),
(22, 2, 'Certificate'),
(23, 2, 'Diploma'),
(24, 2, 'Bachelor Degree'),
(25, 2, 'Masters Degree'),
(26, 2, 'PhD'),
(27, 3, 'Admission Offer'),
(28, 3, 'Acceptance Letter'),
(29, 3, 'Recommendation Letter'),
(30, 7, 'Permission Letter'),
(31, 7, 'Other'),
(32, 4, 'Scholarship Offer'),
(33, 4, 'Scholarship agreement/Acceptance'),
(34, 5, 'Pay in Slips'),
(35, 6, 'Health Insurance'),
(36, 6, 'Medical Form');

-- --------------------------------------------------------

--
-- Table structure for table `hostel`
--
-- Creation: Apr 23, 2021 at 09:54 PM
--

DROP TABLE IF EXISTS `hostel`;
CREATE TABLE IF NOT EXISTS `hostel` (
  `hostel_id` int(10) NOT NULL AUTO_INCREMENT,
  `hostel_name` varchar(20) NOT NULL,
  `capacity` int(10) NOT NULL,
  PRIMARY KEY (`hostel_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `hostel`:
--

--
-- Truncate table before insert `hostel`
--

TRUNCATE TABLE `hostel`;
--
-- Dumping data for table `hostel`
--

INSERT INTO `hostel` (`hostel_id`, `hostel_name`, `capacity`) VALUES
(1, 'Hostel A', 100),
(2, 'Hostel B', 100),
(3, 'PhD Village', 50);

-- --------------------------------------------------------

--
-- Table structure for table `registration_session`
--
-- Creation: May 31, 2021 at 01:27 PM
--

DROP TABLE IF EXISTS `registration_session`;
CREATE TABLE IF NOT EXISTS `registration_session` (
  `reg_session_id` int(10) NOT NULL AUTO_INCREMENT,
  `academic_id` int(10) NOT NULL,
  `semester_id` int(10) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`reg_session_id`),
  KEY `academic_id` (`academic_id`),
  KEY `semester_id` (`semester_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `registration_session`:
--   `academic_id`
--       `academic_year` -> `academic_id`
--   `semester_id`
--       `semester` -> `semester_id`
--

--
-- Truncate table before insert `registration_session`
--

TRUNCATE TABLE `registration_session`;
--
-- Dumping data for table `registration_session`
--

INSERT INTO `registration_session` (`reg_session_id`, `academic_id`, `semester_id`, `status`) VALUES
(1, 11, 2, ''),
(2, 11, 1, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--
-- Creation: Apr 23, 2021 at 09:56 PM
--

DROP TABLE IF EXISTS `room`;
CREATE TABLE IF NOT EXISTS `room` (
  `room_id` int(11) NOT NULL AUTO_INCREMENT,
  `room_name` varchar(6) NOT NULL,
  `hostel_id` int(10) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Okay',
  PRIMARY KEY (`room_id`),
  KEY `hostel_id` (`hostel_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `room`:
--   `hostel_id`
--       `hostel` -> `hostel_id`
--

--
-- Truncate table before insert `room`
--

TRUNCATE TABLE `room`;
--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `room_name`, `hostel_id`, `status`) VALUES
(1, 'HA100A', 1, 'Not Okay'),
(2, 'HA101A', 1, 'Okay'),
(3, 'HA102A', 1, 'Okay'),
(4, 'HA103A', 1, 'Okay'),
(5, 'HA104A', 1, 'Okay'),
(6, 'HA105A', 1, 'Okay'),
(7, 'HA106A', 1, 'Okay'),
(8, 'HA107A', 1, 'Okay'),
(9, 'HA108A', 1, 'Okay'),
(10, 'HA109A', 1, 'Okay'),
(11, 'HB210A', 2, 'Okay'),
(12, 'HB201A', 2, 'Okay'),
(13, 'HB202A', 2, 'Okay'),
(14, 'HB203A', 2, 'Okay'),
(15, 'HB204A', 2, 'Okay'),
(16, 'HB205A', 2, 'Okay'),
(17, 'HB206A', 2, 'Okay'),
(18, 'HB207A', 2, 'Okay'),
(19, 'HB208A', 2, 'Okay'),
(20, 'HB209A', 2, 'Okay'),
(21, 'HB101A', 2, 'Okay'),
(22, 'HB102A', 2, 'Okay');

-- --------------------------------------------------------

--
-- Table structure for table `room_allocation`
--
-- Creation: May 13, 2021 at 12:28 PM
--

DROP TABLE IF EXISTS `room_allocation`;
CREATE TABLE IF NOT EXISTS `room_allocation` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `room_id` int(11) NOT NULL,
  `request_id` int(10) NOT NULL,
  `reg_session_id` int(10) NOT NULL,
  `date_allocated` timestamp NOT NULL DEFAULT current_timestamp(),
  `expire_date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reg_session_id` (`reg_session_id`),
  KEY `room_id` (`room_id`),
  KEY `request_id` (`request_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `room_allocation`:
--   `reg_session_id`
--       `registration_session` -> `reg_session_id`
--   `room_id`
--       `room` -> `room_id`
--   `request_id`
--       `room_requests` -> `request_id`
--

--
-- Truncate table before insert `room_allocation`
--

TRUNCATE TABLE `room_allocation`;
-- --------------------------------------------------------

--
-- Table structure for table `room_requests`
--
-- Creation: Apr 23, 2021 at 09:58 PM
--

DROP TABLE IF EXISTS `room_requests`;
CREATE TABLE IF NOT EXISTS `room_requests` (
  `request_id` int(10) NOT NULL AUTO_INCREMENT,
  `student_id` varchar(10) NOT NULL,
  `date_requested` datetime NOT NULL DEFAULT current_timestamp(),
  `special_need` varchar(200) NOT NULL,
  PRIMARY KEY (`request_id`),
  KEY `student_id` (`student_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `room_requests`:
--   `student_id`
--       `student` -> `student_id`
--

--
-- Truncate table before insert `room_requests`
--

TRUNCATE TABLE `room_requests`;
--
-- Dumping data for table `room_requests`
--

INSERT INTO `room_requests` (`request_id`, `student_id`, `date_requested`, `special_need`) VALUES
(1, 'M054/T19', '2021-04-18 16:13:49', 'Hello, I am having a family with me');

-- --------------------------------------------------------

--
-- Table structure for table `school`
--
-- Creation: Apr 23, 2021 at 09:49 PM
--

DROP TABLE IF EXISTS `school`;
CREATE TABLE IF NOT EXISTS `school` (
  `school_id` int(10) NOT NULL AUTO_INCREMENT,
  `school_short_form` varchar(10) NOT NULL,
  `school_name` varchar(100) NOT NULL,
  `school_desc` text NOT NULL,
  PRIMARY KEY (`school_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `school`:
--

--
-- Truncate table before insert `school`
--

TRUNCATE TABLE `school`;
--
-- Dumping data for table `school`
--

INSERT INTO `school` (`school_id`, `school_short_form`, `school_name`, `school_desc`) VALUES
(1, 'LiSBE', 'Life Sciences and Bio-Engineering', 'Our School is equipped with the state-of-the-art-laboratories and learning facilities as well as world class faculty, all of which make it occupy a premium position and respect in SSA especially in offering highly specialized, research-intensive post-graduate (Masters, PhD) degrees and Post-doctoral research associate-ships. Arusha, where the NM-AIST is located, is a hub of biodiversity and tourist activity.'),
(2, 'CoCSE', 'Computational and Communication Science and Engineering', 'The school values research excellence and innovation, as we believe these are key components needed to creating technological products that can boost industrial productivity and lower the societal challenges faced in Tanzania and Sub-Saharan Africa in general. We therefore encourage students to develop and exhibit working prototypes and to publish in indexed journals, international conference proceedings and get patents for the innovate products. '),
(3, 'MEWES', 'Materials, Energy, Water and Environmental Sciences', 'The faculty and staff in MEWES are committed to preparing students to work with emerging technologies and become future leaders in their areas of expertise. This is well supported by our reviewed and new courses and programmes that we keep updating in order to ensure they meet the current demand while responding to our learning objectives.'),
(4, 'BuSH', 'Business Studies and Humanities', 'The School has been offering common core courses in Innovation Management and Competitiveness; Entrepreneurship and Management; Philosophy, Ethics and Law; as well as Research Methodology and Communication Skills. In connection to this, the school is in the process of finalizing the curriculum on Master and PhD in Innovation Management and Entrepreneurship. In addition, the School also offers tailor-made short courses in business management, Entrepreneurship, international trade and marketing on a regular basis as well as spearhead outreach activities and linkages with the industry.');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--
-- Creation: Apr 23, 2021 at 09:55 PM
--

DROP TABLE IF EXISTS `semester`;
CREATE TABLE IF NOT EXISTS `semester` (
  `semester_id` int(10) NOT NULL AUTO_INCREMENT,
  `semester_name` text NOT NULL,
  `details` text NOT NULL,
  PRIMARY KEY (`semester_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `semester`:
--

--
-- Truncate table before insert `semester`
--

TRUNCATE TABLE `semester`;
--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`semester_id`, `semester_name`, `details`) VALUES
(1, 'Semester 1', ''),
(2, 'Semester 2', ''),
(3, 'Semester 3', ''),
(4, 'Semester 4', ''),
(5, 'Semester 5', ''),
(6, 'Semester 6', ''),
(7, 'Extension', 'This is for students who are requesting an extension.');

-- --------------------------------------------------------

--
-- Table structure for table `sponsor`
--
-- Creation: Apr 23, 2021 at 09:59 PM
--

DROP TABLE IF EXISTS `sponsor`;
CREATE TABLE IF NOT EXISTS `sponsor` (
  `sponsor_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `details` varchar(20) NOT NULL,
  PRIMARY KEY (`sponsor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `sponsor`:
--

--
-- Truncate table before insert `sponsor`
--

TRUNCATE TABLE `sponsor`;
--
-- Dumping data for table `sponsor`
--

INSERT INTO `sponsor` (`sponsor_id`, `name`, `details`) VALUES
(1, 'Private', 'Anajilipia'),
(2, 'Scholarship', ''),
(3, 'HESLB', ''),
(4, 'NM-AIST', ''),
(5, 'MoEST', 'Wizara ya Elimu'),
(6, 'CENIT@EA', 'Project');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--
-- Creation: Apr 23, 2021 at 10:00 PM
--

DROP TABLE IF EXISTS `staff`;
CREATE TABLE IF NOT EXISTS `staff` (
  `staff_id` int(10) NOT NULL AUTO_INCREMENT,
  `f_name` varchar(30) NOT NULL,
  `m_name` varchar(20) NOT NULL,
  `l_name` varchar(20) NOT NULL,
  `system_level` varchar(20) NOT NULL DEFAULT 'Admission',
  `email` varchar(30) DEFAULT NULL,
  `phone` int(12) NOT NULL,
  `password` varchar(80) NOT NULL,
  PRIMARY KEY (`staff_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `staff`:
--

--
-- Truncate table before insert `staff`
--

TRUNCATE TABLE `staff`;
--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `f_name`, `m_name`, `l_name`, `system_level`, `email`, `phone`, `password`) VALUES
(1, 'Mwajuma', 'Kelvin', 'Bakayoko', 'admission', 'bakayokom@nm-aist.ac.tz', 765268371, '7c222fb2927d828af22f592134e8932480637c0d'),
(2, 'Lunodzo', 'M', 'Admin', 'admin', 'mwinuka@nm-aist.ac.tz', 765268371, '7c222fb2927d828af22f592134e8932480637c0d'),
(3, 'Amina', 'S', 'Yahaya', 'accountant', 'aminay@nm-aist.ac.tz', 765268371, '7c222fb2927d828af22f592134e8932480637c0d'),
(4, 'Victoria', 'K', 'Ndossi', 'welfare', 'victoria.ndossi@nm-aist.ac.tz', 787654352, '7c222fb2927d828af22f592134e8932480637c0d'),
(5, 'John', 'A', 'Hassan', 'computer', 'john.hassan@nm-aist.ac.tz', 765268371, '7c222fb2927d828af22f592134e8932480637c0d');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--
-- Creation: May 31, 2021 at 04:05 PM
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `student_id` varchar(10) NOT NULL,
  `f_name` varchar(20) NOT NULL,
  `m_name` varchar(20) NOT NULL,
  `l_name` varchar(20) NOT NULL,
  `sex` varchar(6) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `dob` date NOT NULL,
  `marital_status` varchar(10) NOT NULL,
  `date_registered` date NOT NULL DEFAULT current_timestamp(),
  `address` varchar(60) NOT NULL,
  `nationality` varchar(30) NOT NULL,
  `course_id` int(10) NOT NULL,
  `cohort` int(2) NOT NULL,
  `study_type` varchar(15) NOT NULL,
  `system_level` varchar(20) NOT NULL DEFAULT 'student',
  `sponsor_id` int(10) NOT NULL,
  `password` varchar(80) DEFAULT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`student_id`),
  KEY `course_id` (`course_id`),
  KEY `sponsor_id` (`sponsor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `student`:
--   `course_id`
--       `course` -> `course_id`
--   `sponsor_id`
--       `sponsor` -> `sponsor_id`
--

--
-- Truncate table before insert `student`
--

TRUNCATE TABLE `student`;
--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `f_name`, `m_name`, `l_name`, `sex`, `phone`, `email`, `dob`, `marital_status`, `date_registered`, `address`, `nationality`, `course_id`, `cohort`, `study_type`, `system_level`, `sponsor_id`, `password`, `status`) VALUES
('M005/T19', 'Rosemary', 'Tlatlaa', 'Panga', 'Female', '+255745336879', 'pangar@nm-aist.ac.tz', '1987-12-02', 'Married', '2021-04-10', 'Buza, Dar es Salaam', 'Tanzanian', 9, 9, 'Dissertation', 'student', 5, '7c222fb2927d828af22f592134e8932480637c0d', 'Active'),
('M007/T19', 'Marco', 'P', 'Mwaimu', 'Male', '+255713065894', 'mwaimum@nm-aist.ac.tz', '1987-04-16', 'Married', '2021-04-14', 'Moshono, Arusha', 'Tanzanian', 8, 9, 'Dissertation', 'student', 5, '7c222fb2927d828af22f592134e8932480637c0d', 'Active'),
('M023/T19', 'Restituta', '', 'Kingili', 'Female', '255754324789', 'kingilir@nm-aist.ac.tz', '1989-06-15', 'Single', '2021-05-31', 'P.O.Box 4243423, Dar es Salaam', 'Tanzanian', 9, 9, 'Dissertation', 'student', 5, '7c222fb2927d828af22f592134e8932480637c0d', 'Active'),
('M043/T19', 'Mike', '', 'Mahjam', 'Male', '0789765632', 'majhamm@nm-aist.ac.tz', '1989-10-07', 'Single', '2021-03-31', 'Ngarenaro, Arusha', 'Tanzanian', 8, 9, 'Dissertation', 'student', 5, '7c222fb2927d828af22f592134e8932480637c0d', 'Active'),
('M054/T19', 'Lunodzo', 'Justine', 'Mwinuka', 'Male', '+255765268371', 'mwinukal@nm-aist.ac.tz', '1994-03-15', 'Single', '2021-03-17', 'Mzumbe, Morogoro', 'Tanzanian', 8, 9, 'Dissertation', 'student', 2, '7c222fb2927d828af22f592134e8932480637c0d', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `student_bill`
--
-- Creation: Apr 23, 2021 at 09:51 PM
-- Last update: Jun 02, 2021 at 06:59 AM
--

DROP TABLE IF EXISTS `student_bill`;
CREATE TABLE IF NOT EXISTS `student_bill` (
  `std_bill_id` int(10) NOT NULL AUTO_INCREMENT,
  `bill_id` int(10) NOT NULL,
  `student_id` varchar(10) NOT NULL,
  `control_no` int(15) NOT NULL,
  `date_created` date NOT NULL DEFAULT current_timestamp(),
  `date_paid` date NOT NULL DEFAULT '2000-12-02',
  `amount` int(20) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`std_bill_id`),
  KEY `bill_id` (`bill_id`),
  KEY `student_id` (`student_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `student_bill`:
--   `bill_id`
--       `bill` -> `bill_id`
--   `student_id`
--       `student` -> `student_id`
--

--
-- Truncate table before insert `student_bill`
--

TRUNCATE TABLE `student_bill`;
--
-- Dumping data for table `student_bill`
--

INSERT INTO `student_bill` (`std_bill_id`, `bill_id`, `student_id`, `control_no`, `date_created`, `date_paid`, `amount`, `status`) VALUES
(1, 14, 'M043/T19', 43534543, '2021-03-31', '0000-00-00', 120000, 'paid'),
(2, 16, 'M054/T19', 435344334, '2021-04-30', '0000-00-00', 400000, 'paid'),
(3, 16, 'M054/T19', 562792857, '2021-04-06', '0000-00-00', 20000, 'paid'),
(4, 14, 'M054/T19', 356477672, '2021-04-06', '0000-00-00', 50000, 'paid'),
(5, 26, 'M054/T19', 703609312, '2021-04-06', '0000-00-00', 2000000, 'paid'),
(6, 24, 'M043/T19', 932837258, '2021-04-06', '0000-00-00', 300000, 'paid'),
(7, 21, 'M043/T19', 908339497, '2021-04-06', '0000-00-00', 50000, 'paid'),
(8, 17, 'M054/T19', 485644191, '2021-04-06', '0000-00-00', 50000, 'paid'),
(9, 25, 'M054/T19', 903928257, '2021-04-06', '0000-00-00', 10000, 'paid'),
(10, 22, 'M054/T19', 413160529, '2021-04-06', '0000-00-00', 4500000, 'paid'),
(11, 19, 'M054/T19', 230561848, '2021-04-06', '0000-00-00', 1000000, 'paid'),
(14, 14, 'M043/T19', 235355169, '2021-04-06', '0000-00-00', 120000, 'paid'),
(15, 14, 'M043/T19', 937089053, '2021-04-06', '0000-00-00', 120000, 'paid'),
(16, 14, 'M043/T19', 711864359, '2021-04-06', '0000-00-00', 120000, 'pending'),
(17, 14, 'M043/T19', 597250030, '2021-04-06', '0000-00-00', 120000, 'pending'),
(18, 14, 'M043/T19', 177547831, '2021-04-06', '0000-00-00', 120000, 'pending'),
(19, 14, 'M043/T19', 429997771, '2021-04-06', '0000-00-00', 120000, 'pending'),
(20, 14, 'M043/T19', 281747228, '2021-04-06', '0000-00-00', 120000, 'paid'),
(21, 14, 'M005/T19', 630241015, '2021-04-10', '2000-12-02', 120000, 'pending'),
(22, 16, 'M005/T19', 792306143, '2021-04-10', '2000-12-02', 10000, 'pending'),
(23, 25, 'M005/T19', 414917311, '2021-04-10', '2000-12-02', 20000, 'pending'),
(24, 14, 'M007/T19', 161209189, '2021-04-16', '2000-12-02', 120000, 'pending'),
(25, 24, 'M054/T19', 465543854, '2021-05-11', '2000-12-02', 40000, 'pending');

-- --------------------------------------------------------

--
-- Stand-in structure for view `student_bill_view`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `student_bill_view`;
CREATE TABLE IF NOT EXISTS `student_bill_view` (
`f_name` varchar(20)
,`l_name` varchar(20)
,`email` varchar(30)
,`bill_name` varchar(30)
,`control_no` int(15)
,`date_created` date
,`date_paid` date
,`amount` int(20)
,`status` varchar(20)
);

-- --------------------------------------------------------

--
-- Table structure for table `student_document`
--
-- Creation: Apr 23, 2021 at 10:02 PM
-- Last update: Jun 02, 2021 at 07:06 AM
--

DROP TABLE IF EXISTS `student_document`;
CREATE TABLE IF NOT EXISTS `student_document` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `student_id` varchar(10) NOT NULL,
  `document_type_id` int(11) NOT NULL,
  `file` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `document_type_id` (`document_type_id`),
  KEY `student_id` (`student_id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `student_document`:
--   `document_type_id`
--       `document_type` -> `document_type_id`
--   `student_id`
--       `student` -> `student_id`
--

--
-- Truncate table before insert `student_document`
--

TRUNCATE TABLE `student_document`;
--
-- Dumping data for table `student_document`
--

INSERT INTO `student_document` (`id`, `student_id`, `document_type_id`, `file`) VALUES
(21, 'M054/T19', 19, '90770-nida.pdf'),
(22, 'M054/T19', 21, '36169-passport_ya_kusafiria.pdf'),
(23, 'M054/T19', 31, '41793-work-id.pdf'),
(24, 'M043/T19', 19, '62079-work-id.pdf'),
(25, 'M043/T19', 31, '37332-mikemajham.pdf'),
(27, 'M005/T19', 33, '29481-ch11_1.pdf'),
(28, 'M054/T19', 35, '95301-invoice-888.pdf'),
(29, 'M005/T19', 28, 'dfsdfsd'),
(30, 'M005/T19', 19, '37792-ap3---proposals-decision.pdf'),
(31, 'M005/T19', 20, '12407-ap3---proposals-decision.pdf'),
(32, 'M005/T19', 27, '33701-ap3---proposals-decision.pdf'),
(33, 'M005/T19', 36, '50424-ap3---proposals-decision.pdf'),
(34, 'M005/T19', 24, '27783-ap3---proposals-decision.pdf'),
(36, 'M054/T19', 23, '27719-installation-guide-for-linux.pdf'),
(37, 'M054/T19', 32, '94579-installation-guide-for-linux.pdf'),
(38, 'M007/T19', 19, '86447-installation-guide-for-linux.pdf'),
(39, 'M054/T19', 20, '51813-usecasediagram.pdf'),
(40, 'M054/T19', 34, '94509-usecasediagram.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `student_insurance`
--
-- Creation: May 31, 2021 at 01:15 PM
--

DROP TABLE IF EXISTS `student_insurance`;
CREATE TABLE IF NOT EXISTS `student_insurance` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `student_id` varchar(10) NOT NULL,
  `company` varchar(20) NOT NULL,
  `date_created` date NOT NULL,
  `period` int(20) NOT NULL,
  `package` varchar(30) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'active',
  `other_details` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `student_id` (`student_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `student_insurance`:
--   `student_id`
--       `student` -> `student_id`
--

--
-- Truncate table before insert `student_insurance`
--

TRUNCATE TABLE `student_insurance`;
--
-- Dumping data for table `student_insurance`
--

INSERT INTO `student_insurance` (`id`, `student_id`, `company`, `date_created`, `period`, `package`, `status`, `other_details`) VALUES
(2, 'M043/T19', 'Resolution', '2021-05-06', 15, 'Premier', 'active', 'dsfsdfgsdgsd'),
(3, 'M054/T19', 'Resolution', '2021-04-26', 23, 'Mjasiliamali', 'active', 'Tunafaidi tu huku');

-- --------------------------------------------------------

--
-- Table structure for table `student_profile`
--
-- Creation: Apr 23, 2021 at 10:03 PM
--

DROP TABLE IF EXISTS `student_profile`;
CREATE TABLE IF NOT EXISTS `student_profile` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `student_id` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `picture` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `student_id` (`student_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `student_profile`:
--   `student_id`
--       `student` -> `student_id`
--

--
-- Truncate table before insert `student_profile`
--

TRUNCATE TABLE `student_profile`;
--
-- Dumping data for table `student_profile`
--

INSERT INTO `student_profile` (`id`, `student_id`, `email`, `picture`) VALUES
(1, 'M054/T19', 'mwinukal@nm-aist.ac.tz', 0x333535372d446973706c617950686f746f2d4c756e6f647a6f2d4c696768742d7371756172652e706e67),
(2, 'M005/T19', 'pangar@nm-aist.ac.tz', 0x333734342d4d3030352d5431392e6a706567),
(10, 'M043/T19', 'majhamm@nm-aist.ac.tz', 0x343430372d4d3030332d5431392e6a706567),
(11, 'M043/T19', 'majhamm@nm-aist.ac.tz', 0x343430372d4d3030332d5431392e6a706567),
(12, 'M043/T19', 'majhamm@nm-aist.ac.tz', 0x343430372d4d3030332d5431392e6a706567),
(13, 'M043/T19', 'majhamm@nm-aist.ac.tz', 0x343430372d4d3030332d5431392e6a706567),
(14, 'M007/T19', 'mwaimum@nm-aist.ac.tz', 0x333532382d494d475f373437322e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `student_service`
--
-- Creation: Apr 23, 2021 at 10:03 PM
--

DROP TABLE IF EXISTS `student_service`;
CREATE TABLE IF NOT EXISTS `student_service` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `student_id` varchar(10) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `department` varchar(30) NOT NULL,
  `location` varchar(30) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `student_id` (`student_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `student_service`:
--   `student_id`
--       `student` -> `student_id`
--

--
-- Truncate table before insert `student_service`
--

TRUNCATE TABLE `student_service`;
--
-- Dumping data for table `student_service`
--

INSERT INTO `student_service` (`id`, `student_id`, `phone`, `email`, `department`, `location`, `description`) VALUES
(1, 'M054/T19', '+255765268371', 'mwinukal@nm-aist.ac.tz', 'IT', 'A201', 'Njooni haraka, kuna hatari ya kuwaka moto'),
(2, 'M054/T19', '+255765268371', 'mwinukal@nm-aist.ac.tz', 'Plumbing', 'Morogoro', 'Nina shida'),
(3, 'M054/T19', '+255765268371', 'mwinukal@nm-aist.ac.tz', 'IT', 'dfs', 'sfdsd'),
(4, 'M007/T19', '+255713065894', 'mwaimum@nm-aist.ac.tz', 'Electricity', 'A201', 'jkdshfkje');

-- --------------------------------------------------------

--
-- Stand-in structure for view `unallocated_hostels`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `unallocated_hostels`;
CREATE TABLE IF NOT EXISTS `unallocated_hostels` (
`room_name` varchar(6)
,`hostel_name` varchar(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `unsubmitted_docs_view`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `unsubmitted_docs_view`;
CREATE TABLE IF NOT EXISTS `unsubmitted_docs_view` (
`student_id` varchar(10)
,`document_type_id` int(11)
,`document_type` varchar(40)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `uploaded_docs`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `uploaded_docs`;
CREATE TABLE IF NOT EXISTS `uploaded_docs` (
`email` varchar(30)
,`student_id` varchar(10)
,`document_type` varchar(40)
,`file` varchar(50)
);

-- --------------------------------------------------------

--
-- Structure for view `authentication_view`
--
DROP TABLE IF EXISTS `authentication_view`;

DROP VIEW IF EXISTS `authentication_view`;
CREATE OR REPLACE VIEW `authentication_view`  AS SELECT `student`.`f_name` AS `f_name`, `student`.`m_name` AS `m_name`, `student`.`l_name` AS `l_name`, `student`.`email` AS `email`, `student`.`system_level` AS `system_level`, `student`.`password` AS `password` FROM `student` ;

-- --------------------------------------------------------

--
-- Structure for view `student_bill_view`
--
DROP TABLE IF EXISTS `student_bill_view`;

DROP VIEW IF EXISTS `student_bill_view`;
CREATE OR REPLACE VIEW `student_bill_view`  AS SELECT `student`.`f_name` AS `f_name`, `student`.`l_name` AS `l_name`, `student`.`email` AS `email`, `bill`.`bill_name` AS `bill_name`, `student_bill`.`control_no` AS `control_no`, `student_bill`.`date_created` AS `date_created`, `student_bill`.`date_paid` AS `date_paid`, `student_bill`.`amount` AS `amount`, `student_bill`.`status` AS `status` FROM ((`student` join `bill`) join `student_bill`) WHERE `student`.`student_id` = `student_bill`.`student_id` AND `bill`.`bill_id` = `student_bill`.`bill_id` ;

-- --------------------------------------------------------

--
-- Structure for view `unallocated_hostels`
--
DROP TABLE IF EXISTS `unallocated_hostels`;

DROP VIEW IF EXISTS `unallocated_hostels`;
CREATE OR REPLACE VIEW `unallocated_hostels`  AS SELECT `room`.`room_name` AS `room_name`, `hostel`.`hostel_name` AS `hostel_name` FROM (`hostel` join `room` on(`room`.`hostel_id` = `hostel`.`hostel_id`)) WHERE !exists(select `room`.`room_name`,`hostel`.`hostel_name` from ((`room` join `hostel`) join `room_allocation`) where `room`.`room_id` = `room_allocation`.`room_id` AND `room`.`hostel_id` = `hostel`.`hostel_id` limit 1) ;

-- --------------------------------------------------------

--
-- Structure for view `unsubmitted_docs_view`
--
DROP TABLE IF EXISTS `unsubmitted_docs_view`;

DROP VIEW IF EXISTS `unsubmitted_docs_view`;
CREATE OR REPLACE VIEW `unsubmitted_docs_view`  AS SELECT `sp`.`student_id` AS `student_id`, `da`.`document_type_id` AS `document_type_id`, `da`.`document_type` AS `document_type` FROM (`student_profile` `sp` join `document_type` `da`) WHERE !exists(select `sd`.`student_id`,`sd`.`document_type_id`,`d`.`document_type` from (`student_document` `sd` join `document_type` `d` on(`sd`.`document_type_id` = `d`.`document_type_id`)) where `da`.`document_type_id` = `sd`.`document_type_id` AND `sp`.`student_id` = `sd`.`student_id` limit 1) ;

-- --------------------------------------------------------

--
-- Structure for view `uploaded_docs`
--
DROP TABLE IF EXISTS `uploaded_docs`;

DROP VIEW IF EXISTS `uploaded_docs`;
CREATE OR REPLACE VIEW `uploaded_docs`  AS SELECT `student`.`email` AS `email`, `student_document`.`student_id` AS `student_id`, `document_type`.`document_type` AS `document_type`, `student_document`.`file` AS `file` FROM ((`student` join `student_document`) join `document_type`) WHERE `student`.`student_id` = `student_document`.`student_id` AND `document_type`.`document_type_id` = `student_document`.`document_type_id` ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `school` (`school_id`) ON UPDATE CASCADE;

--
-- Constraints for table `dean_appointment`
--
ALTER TABLE `dean_appointment`
  ADD CONSTRAINT `dean_appointment_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON UPDATE CASCADE;

--
-- Constraints for table `document_type`
--
ALTER TABLE `document_type`
  ADD CONSTRAINT `document_type_ibfk_1` FOREIGN KEY (`document_category_id`) REFERENCES `document_category` (`document_category_id`) ON UPDATE CASCADE;

--
-- Constraints for table `registration_session`
--
ALTER TABLE `registration_session`
  ADD CONSTRAINT `registration_session_ibfk_1` FOREIGN KEY (`academic_id`) REFERENCES `academic_year` (`academic_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `registration_session_ibfk_2` FOREIGN KEY (`semester_id`) REFERENCES `semester` (`semester_id`) ON UPDATE CASCADE;

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`hostel_id`) REFERENCES `hostel` (`hostel_id`) ON UPDATE CASCADE;

--
-- Constraints for table `room_allocation`
--
ALTER TABLE `room_allocation`
  ADD CONSTRAINT `room_allocation_ibfk_1` FOREIGN KEY (`reg_session_id`) REFERENCES `registration_session` (`reg_session_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `room_allocation_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `room` (`room_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `room_allocation_ibfk_3` FOREIGN KEY (`request_id`) REFERENCES `room_requests` (`request_id`) ON UPDATE CASCADE;

--
-- Constraints for table `room_requests`
--
ALTER TABLE `room_requests`
  ADD CONSTRAINT `room_requests_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`sponsor_id`) REFERENCES `sponsor` (`sponsor_id`) ON UPDATE CASCADE;

--
-- Constraints for table `student_bill`
--
ALTER TABLE `student_bill`
  ADD CONSTRAINT `student_bill_ibfk_1` FOREIGN KEY (`bill_id`) REFERENCES `bill` (`bill_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `student_bill_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON UPDATE CASCADE;

--
-- Constraints for table `student_document`
--
ALTER TABLE `student_document`
  ADD CONSTRAINT `student_document_ibfk_1` FOREIGN KEY (`document_type_id`) REFERENCES `document_type` (`document_type_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `student_document_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON UPDATE CASCADE;

--
-- Constraints for table `student_insurance`
--
ALTER TABLE `student_insurance`
  ADD CONSTRAINT `student_insurance_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON UPDATE CASCADE;

--
-- Constraints for table `student_profile`
--
ALTER TABLE `student_profile`
  ADD CONSTRAINT `student_profile_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON UPDATE CASCADE;

--
-- Constraints for table `student_service`
--
ALTER TABLE `student_service`
  ADD CONSTRAINT `student_service_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
