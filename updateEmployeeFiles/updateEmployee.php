<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Employee Document</title>
    <script type="text/javascript" src="../EmployeeValidate.js"></script>
    <link rel="stylesheet" type="text/css" href="../Employee.css">
    <!-- Bootstrap core CSS -->
    <link href="../bootstrap.css" rel="stylesheet">
</head>

<body>
    <!-- Form to ask for user information -->

    <!-- PHP to get information from database -->
    <?php
    require_once "../Default.php";
    echoHeader();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Contains the employee ID of the employee we are going to update information for
        $changeEmployeeID = $_POST['changeEmployeeID'];
        // Show the form to look up user
        echo ('
            <h2 class="pageHeading">Please Enter the Employee\'s ID that you would like to update </h2><br>
            <form id="chooseUpdateEmployeeForm" onsubmit="return validateChooseUpdateEmployee();" method="POST"
                action="' . $_SERVER['PHP_SELF'] . '" class = "generalForm">

                <label>Employee\'s ID</label><br>
                <input type="text" class="form-textBox" id="changeEmployeeID" name="changeEmployeeID" value = "' . $changeEmployeeID . '"><br>
                <span class="error" id="errorChangeEmployeeID"></span><br>
                <input type="submit" class="btn btn-secondary" value="Look Up">
            </form>        
        ');
    } else {
        echo ('
            <h2 class="pageHeading">Please Enter the Employee\'s ID that you would like to update </h2><br>
            <form id="chooseUpdateEmployeeForm" onsubmit="return validateChooseUpdateEmployee();" method="POST"
                action="' . $_SERVER['PHP_SELF'] . '" class = "generalForm">

                <label>Employee\'s ID</label><br>
                <input type="text" class="form-textBox" id="changeEmployeeID" name="changeEmployeeID"><br>
                <span class="error" id="errorChangeEmployeeID"></span><br>
                <input type="submit" class="btn btn-secondary" value="Look Up">
            </form>        
        ');
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // echo ("Inside POST");
        $changeEmployeeID = $_POST['changeEmployeeID'];

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

        // Read from Employee table
        $sql = "SELECT employee_Name, Home_Address, Salary, DoB, NiN, department_ID
                FROM Employee
                WHERE employee_ID = :changeEmployeeID;";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'changeEmployeeID' => $changeEmployeeID
        ]);

        // Read the output from database
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        while ($row = $stmt->fetch()) {
            $eName = $row['employee_Name'];
            $eAddress = $row['Home_Address'];
            $eSalary = $row['Salary'];
            $eDoB = $row['DoB'];
            $eNiN = $row['NiN'];
            $eDepartment = $row['department_ID'];
        }

        // Read the from EmergencyContact Table
        $sql = "SELECT emergency_Name, emergency_PhoneNumber, emergency_Relationship
                FROM EmergencyContact
                WHERE employee_ID = :changeEmployeeID";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'changeEmployeeID' => $changeEmployeeID
        ]);


        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        while ($row = $stmt->fetch()) {
            $eEmergencyName = $row['emergency_Name'];
            $eEmergencyNumber = $row['emergency_PhoneNumber'];
            $eEmergencyRelationship = $row['emergency_Relationship'];
        }
        echo ('
            <br>
            <h3 class="pageSubHeading">Please Enter the New Employee\'s Information </h3>
            <form id="updateEmployeeForm" onsubmit="return validateUpdateForm();" method="POST" action="updateEmployeeInput.php" class="generalForm">
                <input type="hidden" id="changeEmployeeID" name="changeEmployeeID" value="' . $changeEmployeeID . '">

                <label>Name</label><br>
                <input type="text" class="form-textBox" id="employeeName" name="employeeName" value = "' . $eName . '"><br>
                <span class="error" id="errorName"></span><br>

                <label>Address</label><br>
                <input type="text" class="form-textBox" id="employeeAddress" name="employeeAddress" value = "' . $eAddress . '"><br>
                <span class="error" id="errorAddress"></span><br>

                <label>Salary</label><br>
                <label>£</label>
                <input type="text" class="form-textBox" id="employeeSalary" name="employeeSalary" value = "' . $eSalary . '"><br>
                <span class="error" id="errorSalary"></span><br>

                <label>Date of Birth</label><br>
                <input type="date" class="form-textBox" id="employeeDoB" name="employeeDoB" value = "' . $eDoB . '"><br>
                <span class="error" id="errorDoB"></span><br>

                <label>National Insurance Number</label><br>
                <input type="text" class="form-textBox" id="employeeNiN" name="employeeNiN" value = "' . $eNiN . '"><br>
                <span class="error" id="errorNiN"></span><br>

                <label>Department</label><br>
                <select id="employeeDepartment" name="employeeDepartment">');
        // Print the selected value of the department
        if ($eDepartment == "1") {
            echo ('
                <option>------</option>
                <option value="Driver" selected>Driver</option>
                <option value="Packager">Packager</option>
                <option value="HR">Human Resources</option>
                <option value="Manager">Management</option>
            ');
        } else if ($eDepartment == "2") {
            echo ('
                <option>------</option>
                <option value="Driver">Driver</option>
                <option value="Packager" selected>Packager</option>
                <option value="HR">Human Resources</option>
                <option value="Manager">Management</option>
            ');
        } else if ($eDepartment == "3") {
            echo ('
                <option>------</option>
                <option value="Driver">Driver</option>
                <option value="Packager">Packager</option>
                <option value="HR" selected>Human Resources</option>
                <option value="Manager">Management</option>
            ');
        } else if ($eDepartment == "4") {
            echo ('
                <option>------</option>
                <option value="Driver">Driver</option>
                <option value="Packager">Packager</option>
                <option value="HR">Human Resources</option>
                <option value="Manager" selected>Management</option>
            ');
        } else {
            echo ('
                <option selected>------</option>
                <option value="Driver">Driver</option>
                <option value="Packager">Packager</option>
                <option value="HR">Human Resources</option>
                <option value="Manager">Management</option>
            ');
        }

        // Print rest of the form
        echo ('</select><br>
                <span class="error" id="errorDepartment"></span><br>

                <label>Emergency Contact Name</label><br>
                <input type="text" class="form-textBox" id="employeeEmergencyName" name="employeeEmergencyName" value = "' . $eEmergencyName . '"><br>
                <span class="error" id="errorEmergencyName"></span><br>

                <label>Emergency Contact Relationship</label><br>
                <input type="text" class="form-textBox" id="employeeEmergencyRelationship" name="employeeEmergencyRelationship" value = "' . $eEmergencyRelationship . '"><br>
                <span class="error" id="errorEmergencyRelationship"></span><br>

                <label>Emergency Contact Phone Number</label><br>
                <input type="text" class="form-textBox" id="employeeEmergencyPhone" name="employeeEmergencyPhone" value = "' . $eEmergencyNumber . '"><br><br>
                <span class="error" id="errorEmergencyPhone"></span><br>

                <input type="submit" class="btn btn-secondary" value="Update">
            </form>
        ');

        //End connection
        $conn = null;
    }
    ?>
</body>