<?php

// print_r($_POST);
insertEmployee();

function showInput()
{
    foreach ($_POST as $input_name => $value_input) {
        echo ("Inside $input_name is $value_input<br>");
    }
}

function connectDB()
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
        echo "<br>Connected successfully<br>";
        $conn = null;
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}

function insertEmployee()
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
    $eID = $_POST['employeeID'];
    $eName = $_POST['employeeName'];
    $eAddress = $_POST['employeeAddress'];
    $eSalary = $_POST['employeeSalary'];
    $eDoB = $_POST['employeeDoB'];
    $eNiN = $_POST['employeeNiN'];
    $eDepartment = $_POST['employeeDepartment'];
    $eEmergencyName = $_POST['employeeEmergencyName'];
    $eEmergencyRelationship = $_POST['employeeEmergencyRelationship'];
    $eEmergencyPhone = $_POST['employeeEmergencyPhone'];

    // Count number of records with employeeID, if > 0, then fail
    $sql = "SELECT employee_ID
            FROM Employee
            WHERE employee_ID = :eID;
    ";
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'eID' => $eID
        ]);
    } catch (PDOException $e) {
        echo ("Error");
    }
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    if ($stmt->rowCount() != 0) {
        echo ("ERROR: Employee ID Already Exists");
    } else {
        // Insert employee into database
        $sql = "INSERT INTO Employee(employee_ID, employee_Name, Home_Address, Salary, DoB, NiN, department_ID)
                VALUES (:eID, :eName, :eAddress, :eSalary, :eDoB, :eNiN, (SELECT department_ID FROM Department WHERE Department.department_Name = :eDepartment));
                
                INSERT INTO EmergencyContact(employee_ID, emergency_Name, emergency_PhoneNumber, emergency_Relationship)
                VALUES (:eID, :eEmergencyName, :eEmergencyPhone, :eEmergencyRelationship);";

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

            echo ("Successfully Uploaded to DB");
        } catch (PDOException $e) {
            echo ("Error Uploading: " . $e->getMessage());
        }
    }
    $conn = null;
}
?>