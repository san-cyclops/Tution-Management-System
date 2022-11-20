
CREATE TABLE `tblcourse` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `courseId` varchar(45) DEFAULT NULL,
  `courseName` varchar(45) DEFAULT NULL,
  `LectureId` varchar(45) DEFAULT NULL,
  `cDay` varchar(45) DEFAULT NULL,
  `ctimeS` varchar(45) DEFAULT NULL,
  `ctimeE` varchar(45) DEFAULT NULL,
  `coursePic` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) 


CREATE TABLE `tbllectures` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `tID` varchar(45) DEFAULT NULL,
  `tName` varchar(45) DEFAULT NULL,
  `nic` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `birthday` varchar(45) DEFAULT NULL,
  `gender` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `pPic` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) 


CREATE TABLE `tblstudents` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `RFIDNumber` varchar(200) DEFAULT NULL,
  `StudentID` varchar(200) DEFAULT NULL,
  `StudentName` varchar(200) DEFAULT NULL,
  `NIC` varchar(200) DEFAULT NULL,
  `Address` mediumtext,
  `Gender` varchar(200) DEFAULT NULL,
  `Birthday` varchar(200) DEFAULT NULL,
  `ContactNumber` varchar(200) DEFAULT NULL,
  `EmailAddress` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `ParentName` varchar(45) DEFAULT NULL,
  `ParentContactNumber` varchar(45) DEFAULT NULL,
  `ParentEmailAddress` varchar(45) DEFAULT NULL,
  `ProfilePicture` varchar(250) NOT NULL,
  PRIMARY KEY (`ID`)
)


CREATE TABLE `tblusers` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(200) DEFAULT NULL,
  `LastName` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Address` mediumtext,
  `CreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) 
