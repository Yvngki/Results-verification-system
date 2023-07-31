-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2023 at 06:06 PM
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
-- Database: `rev`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `AdministratorID` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Phone` varchar(50) NOT NULL,
  `passcode` varchar(255) NOT NULL,
  `CompanyName` varchar(50) NOT NULL,
  `security_question_1` varchar(255) DEFAULT NULL,
  `security_answer_1` varchar(255) DEFAULT NULL,
  `security_question_2` varchar(255) DEFAULT NULL,
  `security_answer_2` varchar(255) DEFAULT NULL,
  `role` enum('super','admin') NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`AdministratorID`, `Username`, `Email`, `Phone`, `passcode`, `CompanyName`, `security_question_1`, `security_answer_1`, `security_question_2`, `security_answer_2`, `role`) VALUES
(1, 'Epoch', 'handalies@gmail.com', '', '$2y$10$cQVJuf4R/UM1p6BOB1YftuStsL6oggXoRreb7grlZklkrYIIxfHBm', 'Epoch', 'What is your mother&#039;s maiden name?', 'cousin', 'What is your favorite movie?', 'Dom', 'admin'),
(2, 'Charlie', 'Maka@maka.com', '', '$2y$10$8VhtnHGc0H5JAmQqeT7SrO17XB.pcgNoaE7heQZ86qnWZdxBTgUBm', 'crockdesing', 'What is your favorite movie?', 'the kingdom', 'What is your favorite book?', 'kaili', 'super');

-- --------------------------------------------------------

--
-- Table structure for table `collegeuniversity`
--

CREATE TABLE `collegeuniversity` (
  `CollegeUniversityID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `collegeuniversity`
--

INSERT INTO `collegeuniversity` (`CollegeUniversityID`, `Name`) VALUES
(1, 'Copperbelt University'),
(2, 'University of Zambia'),
(3, 'Evelyn Hone'),
(4, 'ZCAS University'),
(5, 'Mukuba'),
(6, 'Chalimbana');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `ID` int(20) NOT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Subject` varchar(250) DEFAULT NULL,
  `Message` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `CourseID` int(11) NOT NULL,
  `CourseName` varchar(50) NOT NULL,
  `CollegeUniversityID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`CourseID`, `CourseName`, `CollegeUniversityID`) VALUES
(1, 'Computer Science', 1),
(2, 'Business Administration', 1),
(3, 'Engineering', 2),
(4, 'Nursing', 3),
(5, 'Finance', 4),
(6, 'Psychology', 5);

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `ResultID` int(11) NOT NULL,
  `Grade` float NOT NULL,
  `StudentID` int(11) NOT NULL,
  `CourseID` int(11) NOT NULL,
  `CollegeUniversityID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`ResultID`, `Grade`, `StudentID`, `CourseID`, `CollegeUniversityID`) VALUES
(1, 2.4, 78787878, 1, 1),
(2, 3.1, 63636363, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `StudentID` int(11) NOT NULL,
  `Firstname` varchar(50) NOT NULL,
  `Lastname` varchar(50) NOT NULL,
  `Balance` float NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Passcode` varchar(255) NOT NULL,
  `CollegeID` int(11) DEFAULT NULL,
  `CourseID` int(11) DEFAULT NULL,
  `security_question_1` varchar(255) DEFAULT NULL,
  `security_answer_1` varchar(255) DEFAULT NULL,
  `security_question_2` varchar(255) DEFAULT NULL,
  `security_answer_2` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`StudentID`, `Firstname`, `Lastname`, `Balance`, `Email`, `Passcode`, `CollegeID`, `CourseID`, `security_question_1`, `security_answer_1`, `security_question_2`, `security_answer_2`) VALUES
(78787878, 'pathias', 'galiatsis', 0, 'Pathias@gmail.com', '$2y$10$1qrYltimfrEmNegA/1k/cuydtZT.scdRP.IWoXD4OJl1i7agdAHw.', 1, 2, '0', '0', 'What is your mother\'s maiden name?', 'mushi'),
(63636363, 'Maka', 'Maka', 0, 'Maka@maka.com', '$2y$10$q3cc7bqUvWRuu6W/m85DFubhy97f42kHu2J3d6H8drOrW14Vykvaq', 2, 5, '0', '0', 'What is your favorite movie?', 'mumu');

-- --------------------------------------------------------

--
-- Table structure for table `verification`
--

CREATE TABLE `verification` (
  `VerificationID` int(11) NOT NULL,
  `VerificationDate` date NOT NULL,
  `VerificationStatus` varchar(50) NOT NULL,
  `StudentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `verification`
--

INSERT INTO `verification` (`VerificationID`, `VerificationDate`, `VerificationStatus`, `StudentID`) VALUES
(1, '2023-06-09', 'Verified', 78787878),
(2, '2023-06-09', 'pending', 63636363);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`AdministratorID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `AdministratorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
