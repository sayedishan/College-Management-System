-- MySQL dump 10.13  Distrib 8.0.43, for macos15 (arm64)
--
-- Host: localhost    Database: SRM_University
-- ------------------------------------------------------
-- Server version	8.0.43

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Course`
--

DROP TABLE IF EXISTS `Course`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Course` (
  `Course_ID` int NOT NULL,
  `Course_Name` varchar(100) DEFAULT NULL,
  `Credits` int DEFAULT NULL,
  `Dept_ID` int DEFAULT NULL,
  `Description` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`Course_ID`),
  KEY `Dept_ID` (`Dept_ID`),
  CONSTRAINT `course_ibfk_1` FOREIGN KEY (`Dept_ID`) REFERENCES `Department` (`Dept_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Course`
--

LOCK TABLES `Course` WRITE;
/*!40000 ALTER TABLE `Course` DISABLE KEYS */;
INSERT INTO `Course` VALUES (201,'Data Structures',4,1,'C programming and data structures'),(202,'Database Systems',4,1,'SQL and relational databases'),(205,'Thermodynamics',3,2,'Mechanical core subject'),(206,'Fluid Mechanics',3,2,'Mechanical core subject'),(209,'Circuit Theory',4,3,'Electrical basics'),(210,'Power Systems',3,3,'Power generation & distribution'),(213,'Structural Analysis',4,4,'Civil engineering design'),(214,'Surveying',3,4,'Land measurement and surveying'),(217,'Financial Management',3,5,'Business finance concepts'),(218,'Marketing Principles',3,5,'Basics of marketing');
/*!40000 ALTER TABLE `Course` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Department`
--

DROP TABLE IF EXISTS `Department`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Department` (
  `Dept_ID` int NOT NULL,
  `Dept_Name` varchar(100) DEFAULT NULL,
  `Building` varchar(50) DEFAULT NULL,
  `Contact_No` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`Dept_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Department`
--

LOCK TABLES `Department` WRITE;
/*!40000 ALTER TABLE `Department` DISABLE KEYS */;
INSERT INTO `Department` VALUES (1,'Computer Science Engineering','CSE Block','044-1111111'),(2,'Mechanical Engineering','ME Block','044-2222222'),(3,'Electrical Engineering','EEE Block','044-3333333'),(4,'Civil Engineering','CE Block','044-4444444'),(5,'Management Studies','MBA Block','044-5555555');
/*!40000 ALTER TABLE `Department` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Instructor`
--

DROP TABLE IF EXISTS `Instructor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Instructor` (
  `Instructor_ID` int NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Phone` varchar(15) DEFAULT NULL,
  `Hire_Date` date DEFAULT NULL,
  `Office` varchar(50) DEFAULT NULL,
  `Dept_ID` int DEFAULT NULL,
  PRIMARY KEY (`Instructor_ID`),
  KEY `Dept_ID` (`Dept_ID`),
  CONSTRAINT `instructor_ibfk_1` FOREIGN KEY (`Dept_ID`) REFERENCES `Department` (`Dept_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Instructor`
--

LOCK TABLES `Instructor` WRITE;
/*!40000 ALTER TABLE `Instructor` DISABLE KEYS */;
INSERT INTO `Instructor` VALUES (101,'Dr. Ravi Kumar','ravi.kumar@srmist.edu.in','9000011111','2015-07-01','CSE-101',1),(102,'Dr. Meena Iyer','meena.iyer@srmist.edu.in','9000011112','2016-06-15','CSE-102',1),(103,'Dr. Vikas Sharma','vikas.sharma@srmist.edu.in','9000011113','2017-08-10','ME-201',2),(104,'Dr. Priya Nair','priya.nair@srmist.edu.in','9000011114','2018-01-05','EEE-301',3),(105,'Dr. Arjun Patel','arjun.patel@srmist.edu.in','9000011115','2019-09-20','CE-401',4),(106,'Dr. Neha Gupta','neha.gupta@srmist.edu.in','9000011116','2020-03-11','MBA-501',5),(107,'Dr. Karthik Reddy','karthik.reddy@srmist.edu.in','9000011117','2021-04-12','ME-202',2),(108,'Dr. Sunita Rao','sunita.rao@srmist.edu.in','9000011118','2017-12-30','EEE-302',3),(109,'Dr. Rohan Singh','rohan.singh@srmist.edu.in','9000011119','2016-11-25','CSE-103',1),(110,'Dr. Smita Agarwal','smita.agarwal@srmist.edu.in','9000011120','2014-10-19','MBA-502',5);
/*!40000 ALTER TABLE `Instructor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Registration`
--

DROP TABLE IF EXISTS `Registration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Registration` (
  `Reg_ID` int NOT NULL,
  `Student_ID` varchar(15) DEFAULT NULL,
  `Course_ID` int DEFAULT NULL,
  `Semester_ID` int DEFAULT NULL,
  `Registration_Date` date DEFAULT NULL,
  `Grade` char(1) DEFAULT NULL,
  PRIMARY KEY (`Reg_ID`),
  KEY `Student_ID` (`Student_ID`),
  KEY `Course_ID` (`Course_ID`),
  KEY `Semester_ID` (`Semester_ID`),
  CONSTRAINT `registration_ibfk_1` FOREIGN KEY (`Student_ID`) REFERENCES `Student` (`Student_ID`),
  CONSTRAINT `registration_ibfk_2` FOREIGN KEY (`Course_ID`) REFERENCES `Course` (`Course_ID`),
  CONSTRAINT `registration_ibfk_3` FOREIGN KEY (`Semester_ID`) REFERENCES `Semester` (`Semester_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Registration`
--

LOCK TABLES `Registration` WRITE;
/*!40000 ALTER TABLE `Registration` DISABLE KEYS */;
INSERT INTO `Registration` VALUES (1,'RA221000100001',201,1,'2022-07-10','A'),(2,'RA221000100002',202,1,'2022-07-10','B'),(3,'RA222000200001',205,1,'2022-07-10','A'),(4,'RA222000200002',206,1,'2022-07-10','A'),(5,'RA223000300001',209,1,'2022-07-10','B'),(6,'RA223000300002',210,1,'2022-07-10','C'),(7,'RA224000400001',213,1,'2022-07-10','A'),(8,'RA224000400002',214,1,'2022-07-10','B'),(9,'RA225000500001',217,1,'2022-07-10','A');
/*!40000 ALTER TABLE `Registration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Registration__Log`
--

DROP TABLE IF EXISTS `Registration__Log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Registration__Log` (
  `Log_ID` int NOT NULL AUTO_INCREMENT,
  `Reg_ID` int DEFAULT NULL,
  `Student_ID` varchar(15) DEFAULT NULL,
  `Course_ID` int DEFAULT NULL,
  `Log_Date` datetime DEFAULT NULL,
  PRIMARY KEY (`Log_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Registration__Log`
--

LOCK TABLES `Registration__Log` WRITE;
/*!40000 ALTER TABLE `Registration__Log` DISABLE KEYS */;
/*!40000 ALTER TABLE `Registration__Log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Semester`
--

DROP TABLE IF EXISTS `Semester`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Semester` (
  `Semester_ID` int NOT NULL,
  `Semester_Name` varchar(50) DEFAULT NULL,
  `Start_Date` date DEFAULT NULL,
  `End_Date` date DEFAULT NULL,
  PRIMARY KEY (`Semester_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Semester`
--

LOCK TABLES `Semester` WRITE;
/*!40000 ALTER TABLE `Semester` DISABLE KEYS */;
INSERT INTO `Semester` VALUES (1,'Semester 1','2022-07-01','2022-12-15'),(2,'Semester 2','2023-01-10','2023-06-01'),(3,'Semester 3','2023-07-01','2023-12-15'),(4,'Semester 4','2024-01-10','2024-06-01'),(5,'Semester 5','2024-07-17','2024-12-22'),(6,'Semester 6','2025-01-09','2025-05-25'),(7,'Semester 7','2025-07-15','2025-12-25'),(8,'Semester 8','2026-01-03','2026-05-29');
/*!40000 ALTER TABLE `Semester` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Student`
--

DROP TABLE IF EXISTS `Student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Student` (
  `Student_ID` varchar(15) NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Phone` varchar(15) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `Address` varchar(150) DEFAULT NULL,
  `Enrollment_Date` date DEFAULT NULL,
  PRIMARY KEY (`Student_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Student`
--

LOCK TABLES `Student` WRITE;
/*!40000 ALTER TABLE `Student` DISABLE KEYS */;
INSERT INTO `Student` VALUES ('RA221000100001','Amit Patel','amit.patel@srmist.edu.in','9000010001','2004-05-12','Chennai','2022-07-15'),('RA221000100002','Sneha Sharma','sneha.sharma@srmist.edu.in','9000010002','2003-09-21','Delhi','2022-07-15'),('RA221000100003','Divya Rathi','divya.rathi@srmist.edu.in','9000010003','2004-02-14','Pune','2022-07-15'),('RA221000100004','Nikhil Chawla','nikhil.chawla@srmist.edu.in','9000010004','2004-07-21','Gurgaon','2022-07-15'),('RA222000200001','Rahul Reddy','rahul.reddy@srmist.edu.in','9000020001','2003-03-25','Hyderabad','2022-07-15'),('RA222000200002','Neha Menon','neha.menon@srmist.edu.in','9000020002','2004-10-19','Kochi','2022-07-15'),('RA223000300001','Vikram Singh','vikram.singh@srmist.edu.in','9000030001','2004-12-05','Jaipur','2022-07-15'),('RA223000300002','Ananya Joshi','ananya.joshi@srmist.edu.in','9000030002','2004-07-15','Bengaluru','2022-07-15'),('RA224000400001','Karan Malhotra','karan.malhotra@srmist.edu.in','9000040001','2003-11-09','Delhi','2022-07-15'),('RA224000400002','Ishita Goyal','ishita.goyal@srmist.edu.in','9000040002','2004-02-14','Lucknow','2022-07-15'),('RA225000500001','Megha Kapoor','megha.kapoor@srmist.edu.in','9000050001','2003-08-22','Mumbai','2022-07-15'),('RA225000500002','Rohan Mehta','rohan.mehta@srmist.edu.in','9000050002','2004-01-11','Ahmedabad','2022-07-15'),('RA231000100005','Shreya Nambiar','shreya.nambiar@srmist.edu.in','9000010005','2005-03-30','Kochi','2023-07-15'),('RA231000100006','Aditya Rao','aditya.rao@srmist.edu.in','9000010006','2005-09-17','Bangalore','2023-07-15'),('RA231000100007','Snehal Patil','snehal.patil@srmist.edu.in','9000010007','2005-07-10','Pune','2023-07-15'),('RA231000100008','Ravi Teja','ravi.teja@srmist.edu.in','9000010008','2005-05-09','Vijayawada','2023-07-15'),('RA232000200003','Tanvi Gupta','tanvi.gupta@srmist.edu.in','9000020003','2005-05-24','Delhi','2023-07-15'),('RA232000200004','Pranav Deshmukh','pranav.deshmukh@srmist.edu.in','9000020004','2004-11-02','Nagpur','2023-07-15'),('RA233000300003','Aishwarya Menon','aishwarya.menon@srmist.edu.in','9000030003','2005-06-13','Trivandrum','2023-07-15'),('RA233000300004','Harshit Bansal','harshit.bansal@srmist.edu.in','9000030004','2005-03-10','Jaipur','2023-07-15'),('RA234000400003','Pallavi Singh','pallavi.singh@srmist.edu.in','9000040003','2004-12-25','Patna','2023-07-15'),('RA234000400004','Sameer Khan','sameer.khan@srmist.edu.in','9000040004','2005-02-14','Lucknow','2023-07-15'),('RA235000500003','Ritika Jain','ritika.jain@srmist.edu.in','9000050003','2005-08-21','Delhi','2023-07-15'),('RA235000500004','Harsha Reddy','harsha.reddy@srmist.edu.in','9000050004','2005-03-05','Hyderabad','2023-07-15'),('RA241000100009','Nisha Agarwal','nisha.agarwal@srmist.edu.in','9000010009','2006-11-18','Kolkata','2024-07-15'),('RA241000100010','Varun Nair','varun.nair@srmist.edu.in','9000010010','2006-09-27','Kochi','2024-07-15'),('RA241000100011','Shalini Verma','shalini.verma@srmist.edu.in','9000010011','2007-08-04','Jaipur','2024-07-15'),('RA241000100012','Parth Mishra','parth.mishra@srmist.edu.in','9000010012','2007-10-09','Lucknow','2024-07-15'),('RA242000200005','Muskaan Sharma','muskaan.sharma@srmist.edu.in','9000020005','2006-04-16','Bhopal','2024-07-15'),('RA242000200006','Ritika Sethi','ritika.sethi@srmist.edu.in','9000020006','2006-10-20','Delhi','2024-07-15'),('RA243000300005','Saurabh Jain','saurabh.jain@srmist.edu.in','9000030005','2006-12-22','Gurgaon','2024-07-15'),('RA243000300006','Alok Kumar','alok.kumar@srmist.edu.in','9000030006','2007-01-11','Patna','2024-07-15'),('RA244000400005','Isha Choudhary','isha.choudhary@srmist.edu.in','9000040005','2007-07-19','Delhi','2024-07-15'),('RA244000400006','Rakesh Yadav','rakesh.yadav@srmist.edu.in','9000040006','2007-09-23','Kanpur','2024-07-15'),('RA245000500005','Pooja Nair','pooja.nair@srmist.edu.in','9000050005','2007-05-12','Kochi','2024-07-15'),('RA245000500006','Devansh Kapoor','devansh.kapoor@srmist.edu.in','9000050006','2007-06-28','Delhi','2024-07-15'),('RA251000100013','Kavya Reddy','kavya.reddy@srmist.edu.in','9000010013','2007-03-15','Hyderabad','2025-07-15'),('RA251000100014','Anmol Singh','anmol.singh@srmist.edu.in','9000010014','2007-04-20','Chandigarh','2025-07-15'),('RA251000100015','Gaurav Sinha','gaurav.sinha@srmist.edu.in','9000010015','2007-04-28','Patna','2025-07-15'),('RA251000100016','Priya Das','priya.das@srmist.edu.in','9000010016','2007-09-08','Kolkata','2025-07-15'),('RA252000200007','Simran Kaur','simran.kaur@srmist.edu.in','9000020007','2007-12-30','Amritsar','2025-07-15'),('RA252000200008','Kunal Bhatia','kunal.bhatia@srmist.edu.in','9000020008','2007-06-14','Delhi','2025-07-15'),('RA253000300007','Mitali Sharma','mitali.sharma@srmist.edu.in','9000030007','2007-07-25','Bangalore','2025-07-15'),('RA253000300008','Akash Verma','akash.verma@srmist.edu.in','9000030008','2007-08-19','Pune','2025-07-15'),('RA254000400007','Naveen Raj','naveen.raj@srmist.edu.in','9000040007','2007-09-21','Chennai','2025-07-15'),('RA254000400008','Sanya Malhotra','sanya.malhotra@srmist.edu.in','9000040008','2007-10-29','Delhi','2025-07-15'),('RA255000500007','Deepak Sharma','deepak.sharma@srmist.edu.in','9000050007','2007-11-11','Lucknow','2025-07-15'),('RA255000500008','Ananya Mahajan','ananya.mahajan@srmist.edu.in','9000050008','2007-12-18','Mumbai','2025-07-15');
/*!40000 ALTER TABLE `Student` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `before_student_insert` BEFORE INSERT ON `student` FOR EACH ROW BEGIN
    IF NEW.Email IS NULL OR NEW.Email = '' THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Email cannot be empty!';
    END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-11-07  2:18:07
