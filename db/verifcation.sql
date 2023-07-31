CREATE TABLE `administrator` (
  `AdministratorID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Phone` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `CompanyName` varchar(50) NOT NULL,
  `security_question_1` varchar(255) DEFAULT NULL,
  `security_answer_1` varchar(255) DEFAULT NULL,
  `security_question_2` varchar(255) DEFAULT NULL,
  `security_answer_2` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `administrator` (`AdministratorID`, `Name`, `Email`, `Phone`, `Password`, `CompanyName`, `security_question_1`, `security_answer_1`, `security_question_2`, `security_answer_2`) VALUES
(0, 'buzz', 'handaliels@gmail.com', '', '88888888', 'buzzworks', 'What is your favorite movie?', 'movy', 'What is your favorite book?', 'book');

CREATE TABLE `collegeuniversity` (
  `CollegeUniversityID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `collegeuniversity` (`CollegeUniversityID`, `Name`) VALUES
(123, 'Evelyn Hone College'),
(145, 'University of Zambia');

CREATE TABLE `contactus` (
  `ID` int(20) NOT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Subject` varchar(250) DEFAULT NULL,
  `Message` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `course` (
  `CourseID` int(11) NOT NULL,
  `CourseName` varchar(50) NOT NULL,
  `CollegeUniversityID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `course` (`CourseID`, `CourseName`, `CollegeUniversityID`) VALUES
(32, 'Graphic Designing', 145),
(200, 'Therapy', 145),
(456, 'Diploma in Information Technology', 123);

CREATE TABLE `result` (
  `ResultID` int(11) NOT NULL,
  `Grade` float NOT NULL,
  `StudentID` int(11) NOT NULL,
  `CourseID` int(11) NOT NULL,
  `CollegeUniversityID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `result` (`ResultID`, `Grade`, `StudentID`, `CourseID`, `CollegeUniversityID`) VALUES
(1, 4.5, 21005057, 456, 123),
(2, 3.1, 21000065, 32, 145),
(4, 4.5, 21005398, 200, 145);

CREATE TABLE `student` (
  `StudentID` int(11) NOT NULL,
  `Firstname` varchar(50) NOT NULL,
  `Lastname` varchar(50) NOT NULL,
  `Balance` float NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `security_question_1` varchar(255) DEFAULT NULL,
  `
