<?php

updateEmployeeInformation();
function updateEmployeeInformation()
{
    // Connection Information
    $database_host = "dbhost.cs.man.ac.uk";
    $database_user = "m19364tg";
    $database_pass = "23111Kilburnazon";
    $database_name = "m19364tg";

    // Conect to database
    try {
        $pdo = new PDO("mysql:host=$database_host;dbname=$database_name", $database_user, $database_pass);
        // set the PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "<br>Connected successfully<br>";
    } catch (PDOException $e) {
        echo "ERROR Connection failed: " . $e->getMessage();
    }

    // Get all values from POST
    $eID = $_POST['changeEmployeeID'];
    $eName = $_POST['employeeName'];
    $eAddress = $_POST['employeeAddress'];
    $eSalary = $_POST['employeeSalary'];
    $eDoB = $_POST['employeeDoB'];
    $eNiN = $_POST['employeeNiN'];
    $eDepartment = $_POST['employeeDepartment'];
    $eEmergencyName = $_POST['employeeEmergencyName'];
    $eEmergencyRelationship = $_POST['employeeEmergencyRelationship'];
    $eEmergencyPhone = $_POST['employeeEmergencyPhone'];

    // Insert employee into database
    $sql = "UPDATE Employee
            SET employee_Name = :eName, Home_Address = :eAddress, Salary = :eSalary, DoB = :eDoB, NiN = :eNiN, 
                department_ID = (SELECT department_ID FROM Department WHERE Department.department_Name = :eDepartment)
            WHERE employee_ID = :eID;
            
            UPDATE EmergencyContact
            SET emergency_Name = :eEmergencyName, emergency_PhoneNumber = :eEmergencyPhone, emergency_Relationship = :eEmergencyRelationship
            WHERE employee_ID = :eID;
            ";

    try {
        // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            'eID' => $eID,
            'eName' => $eName,
            'eAddress' => $eAddress,
            'eSalary' => $eSalary,
            'eDoB' => $eDoB,
            'eNiN' => $eNiN,
            'eDepartment' => $eDepartment,
            'eEmergencyName' => $eEmergencyName,
            'eEmergencyPhone' => $eEmergencyPhone,
            'eEmergencyRelationship' => $eEmergencyRelationship
        ]);

        echo ("Successfully Updated DB");
    } catch (PDOException $e) {
        echo ("Error Uploading: " . $e->getMessage());
    }

    $conn = null;
}
?>