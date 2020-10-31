-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 31, 2020 at 02:25 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `OnlineExam`
--

-- --------------------------------------------------------

--
-- Table structure for table `addTest`
--

CREATE TABLE `addTest` (
  `testid` int(40) NOT NULL,
  `testname` varchar(40) NOT NULL,
  `ques` int(40) NOT NULL,
  `positive` int(40) NOT NULL,
  `negative` int(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addTest`
--

INSERT INTO `addTest` (`testid`, `testname`, `ques`, `positive`, `negative`) VALUES
(3, 'Java', 10, 1, 0),
(4, 'Python', 5, 1, 1),
(5, 'Aptitude', 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `answerTable`
--

CREATE TABLE `answerTable` (
  `ansid` int(40) NOT NULL,
  `answer` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `questionTable`
--

CREATE TABLE `questionTable` (
  `quesid` int(40) NOT NULL,
  `testid` int(40) NOT NULL,
  `ques` varchar(300) NOT NULL,
  `option1` varchar(200) NOT NULL,
  `option2` varchar(200) NOT NULL,
  `option3` varchar(200) NOT NULL,
  `option4` varchar(200) NOT NULL,
  `answer` int(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questionTable`
--

INSERT INTO `questionTable` (`quesid`, `testid`, `ques`, `option1`, `option2`, `option3`, `option4`, `answer`) VALUES
(1, 3, 'Which of the following option leads to the portability and security of Java?', 'Bytecode is executed by JVM', 'The applet makes the Java code secure and portable', 'Use of exception handling', 'Dynamic binding between objects', 1),
(2, 3, 'Which of the following is not a Java features?', 'Dynamic', 'Architecture Neutral', 'Use of pointers', 'Object-oriented', 3),
(3, 3, 'What is the return type of the hashCode() method in the Object class?', 'Object', 'int', 'void', 'long', 2),
(4, 3, 'Which of the following is a valid long literal?', 'ABH8097', 'L990023', '904423', '0xnf029L', 4),
(5, 3, 'Java is plateform independent?', 'yes', 'no', 'dont know', 'yes know but dont know', 1),
(6, 3, 'Which package contains the Random class?', 'java.util package', 'java.lang package', 'java.awt package', 'java.io package', 1),
(7, 4, 'What is output for − min(\'hello world\')', 'e', 'blank space', 'w', 'none of the above', 2),
(8, 4, ' Which keyword is use for function?', 'define', 'fun', 'def', 'function', 3),
(9, 4, 'Which of the following items are present in the function header?', ' function name', 'parameter list', 'return value', 'Both A and B', 4),
(10, 5, 'A fruit seller had some apples. He sells 40% apples and still has 420 apples. Originally, he had:', '588 apples', '600 apples', '672 apples', '700 apples', 4),
(11, 5, 'The population of a town increased from 1,75,000 to 2,62,500 in a decade. The average percent increase of population per year is:', '4.37', '5', '6', '8', 2);

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `rid` int(40) NOT NULL,
  `sessid` varchar(100) NOT NULL,
  `testname` varchar(40) NOT NULL,
  `username` varchar(40) NOT NULL,
  `totalmarks` varchar(40) NOT NULL,
  `usermarks` varchar(40) NOT NULL,
  `status` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(40) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(40) NOT NULL,
  `role` varchar(40) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `password`, `email`, `role`) VALUES
(2, 'sumit', '123', 'gsgsgs@nchft.com', 'admin'),
(3, 'amit', '123', 'amit@gmail.com', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `useranswer`
--

CREATE TABLE `useranswer` (
  `uid` int(40) NOT NULL,
  `sessid` varchar(100) NOT NULL,
  `quesid` int(40) NOT NULL,
  `testid` int(40) NOT NULL,
  `ques` varchar(200) NOT NULL,
  `option1` varchar(200) NOT NULL,
  `option2` varchar(200) NOT NULL,
  `option3` varchar(200) NOT NULL,
  `option4` varchar(200) NOT NULL,
  `userans` varchar(200) NOT NULL,
  `rightans` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addTest`
--
ALTER TABLE `addTest`
  ADD PRIMARY KEY (`testid`),
  ADD UNIQUE KEY `testname` (`testname`);

--
-- Indexes for table `answerTable`
--
ALTER TABLE `answerTable`
  ADD PRIMARY KEY (`ansid`);

--
-- Indexes for table `questionTable`
--
ALTER TABLE `questionTable`
  ADD PRIMARY KEY (`quesid`),
  ADD KEY `testid` (`testid`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `useranswer`
--
ALTER TABLE `useranswer`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addTest`
--
ALTER TABLE `addTest`
  MODIFY `testid` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `answerTable`
--
ALTER TABLE `answerTable`
  MODIFY `ansid` int(40) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questionTable`
--
ALTER TABLE `questionTable`
  MODIFY `quesid` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `rid` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `useranswer`
--
ALTER TABLE `useranswer`
  MODIFY `uid` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `questionTable`
--
ALTER TABLE `questionTable`
  ADD CONSTRAINT `questionTable_ibfk_1` FOREIGN KEY (`testid`) REFERENCES `addTest` (`testid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
