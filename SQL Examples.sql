-- --------------------------------------------------------

--
-- Table structure for table `Employee`
--

CREATE TABLE `Employee` (
  `employee_ID` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `employee_Name` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Home_Address` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Salary` decimal(10,2) NOT NULL,
  `DoB` date NOT NULL,
  `NiN` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `department_ID` int NOT NULL,
  `manager_EmployeeID` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Table structure for table `EmergencyContact`
--

CREATE TABLE `EmergencyContact` (
  `employee_ID` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `emergency_Name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `emergency_PhoneNumber` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `emergency_Relationship` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Constraints for table `EmergencyContact`
--
ALTER TABLE `EmergencyContact`
  ADD CONSTRAINT `EmergencyContact_ibfk_1` FOREIGN KEY (`employee_ID`) REFERENCES `Employee` (`employee_ID`) ON DELETE CASCADE ON UPDATE CASCADE;



-- --------------------------------------------------------

-- Inserts into Employee and queries the departmentID from departmentName

INSERT INTO Employee(employee_ID, Name, Home_Address, Salary, DoB, NiN, department_ID)
SELECT emp_id, name, address, salary, dob, nin, (SELECT department_ID FROM Department WHERE Department.department_Name = employeeInfo.department) FROM employeeInfo;


-- Inserts into EmergencyContact the values
INSERT INTO EmergencyContact(employee_ID emergency_Name, emergency_PhoneNumber, emergency_Relationship)
SELECT emp_id, emergency_name, emergency_phone, emergency_relationship FROM employeeInfo;

-- Assigns all employees a random manager_EmployeeID
UPDATE Employee 
SET manager_EmployeeID = (SELECT emp_id FROM employeeInfo WHERE department = 'Manager' ORDER BY RAND() LIMIT 1)


-- --------------------------------------------------------

--
-- Table structure for table `DeleteLog`
--

CREATE TABLE `DeleteLog` (
  `Deleter` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `Deleted` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Delete_Date` date NOT NULL,
  `Delete_Time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;


-- --------------------------------------------------------

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`m19364tg`@`localhost` PROCEDURE `getEmployeeBirthdayMonth` ()   BEGIN
            SELECT employee_ID, employee_Name, DoB
            FROM Employee
            WHERE monthName(DoB) = monthName(CURDATE());
        END$$

DELIMITER ;

--
-- Triggers `Employee`
--
DELIMITER $$
CREATE TRIGGER `beforeDeleteEmployee` BEFORE DELETE ON `Employee` FOR EACH ROW BEGIN
    INSERT INTO DeleteLog
    SET Deleted = OLD.employee_ID,
        Delete_Date = CURDATE(),
        Delete_Time = NOW();
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `Job`
--

CREATE TABLE `Job` (
  `job_ID` int NOT NULL,
  `job_Date` date NOT NULL,
  `route_Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `vehicle_ID` int NOT NULL,
  `driver_ID` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Indexes for table `Job`
--
ALTER TABLE `Job`
  ADD PRIMARY KEY (`job_ID`),
  ADD KEY `route_Name` (`route_Name`),
  ADD KEY `vehicle_ID` (`vehicle_ID`),
  ADD KEY `driver_ID` (`driver_ID`);

--
-- Constraints for table `Job`
--
ALTER TABLE `Job`
  ADD CONSTRAINT `Job_ibfk_1` FOREIGN KEY (`route_Name`) REFERENCES `Route` (`route_Name`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `Job_ibfk_2` FOREIGN KEY (`vehicle_ID`) REFERENCES `Vehicle` (`vehicle_ID`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `Job_ibfk_3` FOREIGN KEY (`driver_ID`) REFERENCES `Driver` (`employee_ID`) ON DELETE SET NULL ON UPDATE CASCADE;


--
-- Constraints for table `Complaint`
--
ALTER TABLE `Complaint`
  ADD CONSTRAINT `Complaint_ibfk_1` FOREIGN KEY (`customer_ID`) REFERENCES `Customer` (`customer_ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `Complaint_ibfk_2` FOREIGN KEY (`HR_ID`) REFERENCES `HR` (`employee_ID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `Orders`
--
ALTER TABLE `Orders`
  ADD CONSTRAINT `Orders_ibfk_1` FOREIGN KEY (`customer_ID`) REFERENCES `Customer` (`customer_ID`) ON DELETE SET NULL ON UPDATE CASCADE;