<?php
filterEmployee();
function filterEmployee()
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
    $eIDBox = $_POST['employeeIDBox'];
    $eName = $_POST['employeeName'];
    $eNameBox = $_POST['employeeNameBox'];
    $eAddress = $_POST['employeeAddress'];
    $eAddressBox = $_POST['employeeAddressBox'];
    $eSalary = $_POST['employeeSalary'];
    $eSalaryBox = $_POST['employeeSalaryBox'];
    $eDoB = $_POST['employeeDoB'];
    $eDoBBox = $_POST['employeeDoBBox'];
    $eNiN = $_POST['employeeNiN'];
    $eNiNBox = $_POST['employeeNiNBox'];
    $eDepartment = $_POST['employeeDepartment'];
    $eDepartmentBox = $_POST['employeeDepartmentBox'];
    $eEmergencyName = $_POST['employeeEmergencyName'];
    $eEmergencyNameBox = $_POST['employeeEmergencyNameBox'];
    $eEmergencyRelationship = $_POST['employeeEmergencyRelationship'];
    $eEmergencyRelationshipBox = $_POST['employeeEmergencyRelationshipBox'];
    $eEmergencyPhone = $_POST['employeeEmergencyPhone'];
    $eEmergencyPhoneBox = $_POST['employeeEmergencyPhoneBox'];

    $sql = "SELECT Employee.employee_Name, (SELECT department_Name FROM Department WHERE Department.department_ID=Employee.department_ID) as Department, EmergencyContact.emergency_Relationship, (SELECT employee_Name FROM Employee WHERE Employee.employee_Name=manager_EmployeeID) as Manager
            FROM Employee
            LEFT JOIN EmergencyContact ON Employee.employee_ID = EmergencyContact.employee_ID
            WHERE   (NOT(:eIDBox = 'on') OR (:eID = Employee.employee_ID)) AND
                    (NOT(:eNameBox = 'on') OR (:eName = Employee.employee_Name)) AND
                    (NOT(:eAddressBox = 'on') OR (:eAddress = Employee.Home_Address)) AND
                    (NOT(:eSalaryBox = 'on') OR (:eSalary = Employee.Salary)) AND
                    (NOT(:eDoBBox = 'on') OR (:eDoB = Employee.DoB)) AND
                    (NOT(:eNiNBox = 'on') OR (:eNiN = Employee.NiN)) AND
                    (NOT(:eDepartmentBox = 'on') OR (:eDepartment = (SELECT department_Name FROM Department WHERE Department.department_ID = Employee.department_ID) )) AND
                    (NOT(:eEmergencyNameBox = 'on') OR (:eEmergencyName = emergency_Name)) AND
                    (NOT(:eEmergencyRelationshipBox = 'on') OR (:eEmergencyRelationship = emergency_Relationship)) AND
                    (NOT(:eEmergencyPhoneBox = 'on') OR (:eEmergencyPhone = emergency_PhoneNumber));
                    
    ";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'eID' => $eID,
        'eIDBox' => $eIDBox,
        'eName' => $eName,
        'eNameBox' => $eNameBox,
        'eAddress' => $eAddress,
        'eAddressBox' => $eAddressBox,
        'eSalary' => $eSalary,
        'eSalaryBox' => $eSalaryBox,
        'eDoB' => $eDoB,
        'eDoBBox' => $eDoBBox,
        'eNiN' => $eNiN,
        'eNiNBox' => $eNiNBox,
        'eDepartment' => $eDepartment,
        'eDepartmentBox' => $eDepartmentBox,
        'eEmergencyName' => $eEmergencyName,
        'eEmergencyNameBox' => $eEmergencyNameBox,
        'eEmergencyRelationship' => $eEmergencyRelationship,
        'eEmergencyRelationshipBox' => $eEmergencyRelationshipBox,
        'eEmergencyPhone' => $eEmergencyPhone,
        'eEmergencyPhoneBox' => $eEmergencyPhoneBox
    ]);

    // Display the information we fetched
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    echo ("<table>
                <tr>
                    <th>Name</th>
                    <th>Department</th>
                    <th>Emergency Relationship</th>
                    <th>Manager</th>
                </tr>
        ");
    while ($row = $stmt->fetch()) {
        echo ("<tr>");
        foreach ($row as $key => $pair) {
            echo ("<td>" . $pair . "</td>");
        }
        echo ("</tr>");
    }
    echo ("</table>");
    $conn = null;
}




?>