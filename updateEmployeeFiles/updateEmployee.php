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
    <!-- <link href="../bootstrap.css" rel="stylesheet"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>

<body>
    <!-- Form to ask for user information -->

    <!-- PHP to get information from database -->
    <?php
    require_once "../Default.php";
    echoHeader();
    echo ('<h2 class="pageHeading">Update Employee</h2>');
    // print_r($_POST);
    if (empty($_POST)) {
        echoForm();
    } else {
        if (isset($_POST['updateButton'])) {
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
            updateEmployee($eID, $eName, $eAddress, $eSalary, $eDoB, $eNiN, $eDepartment, $eEmergencyName, $eEmergencyRelationship, $eEmergencyPhone);
            echoUpdateEmployee($eID);
        } else {
            // Contains the employee ID of the employee we are going to update information for
            $changeEmployeeID = $_POST['changeEmployeeID'];
            // // Show the form to look up user
            // echoFormValue($changeEmployeeID);
    
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
            $sql = "SELECT COUNT(*) as count
                FROM Employee
                WHERE employee_ID = :changeEmployeeID;";

            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                'changeEmployeeID' => $changeEmployeeID
            ]);
            if ($stmt->fetch()['count'] == 0) {
                echoFormValue($changeEmployeeID);
                echo ('<script>document.getElementById("errorChangeEmployeeID").innerHTML = "Employee ID does not exists!";</script>');
            } else {
                echoFormValue($changeEmployeeID);
                echoUpdateEmployee($changeEmployeeID);
            }
        }
    }

    function updateEmployee($eID, $eName, $eAddress, $eSalary, $eDoB, $eNiN, $eDepartment, $eEmergencyName, $eEmergencyRelationship, $eEmergencyPhone)
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

        // // Get all values from POST
        // $eID = $_POST['changeEmployeeID'];
        // $eName = $_POST['employeeName'];
        // $eAddress = $_POST['employeeAddress'];
        // $eSalary = $_POST['employeeSalary'];
        // $eDoB = $_POST['employeeDoB'];
        // $eNiN = $_POST['employeeNiN'];
        // $eDepartment = $_POST['employeeDepartment'];
        // $eEmergencyName = $_POST['employeeEmergencyName'];
        // $eEmergencyRelationship = $_POST['employeeEmergencyRelationship'];
        // $eEmergencyPhone = $_POST['employeeEmergencyPhone'];
    
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

            echo ("<h5 class='pageSubHeading'>Successfully Updated Employee's Information</h5>");
        } catch (PDOException $e) {
            echo ("Error Uploading: " . $e->getMessage());
        }

        // $pdo = null;
    }

    function echoUpdateEmployee($changeEmployeeID)
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
            <h4 class="pageSubHeading">Please Enter the New Employee\'s Information </h4>
            <form id="updateEmployeeForm" onsubmit="return validateUpdateForm();" method="POST" action="" class="generalForm">
                <input type="hidden" id="changeEmployeeID" name="changeEmployeeID" value="' . $changeEmployeeID . '">

                <label class="form-label">Name</label>
                <input type="text" class="form-control" id="employeeName" name="employeeName" value = "' . $eName . '"><br>
                <span class="error" id="errorName"></span>

                <label class="form-label">Address</label>
                <input type="text" class="form-control" id="employeeAddress" name="employeeAddress" value = "' . $eAddress . '"><br>
                <span class="error" id="errorAddress"></span>

                <label class="form-label">Salary</label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="poundAddOn">£</span>
                    <input type="text" class="form-control" id="employeeSalary" name="employeeSalary" value = "' . $eSalary . '"><br>
                </div>
                <span class="error" id="errorSalary"></span>

                <label class="form-label">Date of Birth</label>
                <input type="date" class="form-control" id="employeeDoB" name="employeeDoB" value = "' . $eDoB . '"><br>
                <span class="error" id="errorDoB"></span>

                <label class="form-label">National Insurance Number</label>
                <input type="text" class="form-control" id="employeeNiN" name="employeeNiN" value = "' . $eNiN . '"><br>
                <span class="error" id="errorNiN"></span>

                <label class="form-label">Department</label>
                <select class="form-select" id="employeeDepartment" name="employeeDepartment">');
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
        echo ('</select>
                <span class="error" id="errorDepartment"></span><br>

                <label class="form-label">Emergency Contact Name</label>
                <input type="text" class="form-control" id="employeeEmergencyName" name="employeeEmergencyName" value = "' . $eEmergencyName . '"><br>
                <span class="error" id="errorEmergencyName"></span>

                <label class="form-label">Emergency Contact Relationship</label>
                <input type="text" class="form-control" id="employeeEmergencyRelationship" name="employeeEmergencyRelationship" value = "' . $eEmergencyRelationship . '"><br>
                <span class="error" id="errorEmergencyRelationship"></span>

                <label class="form-label">Emergency Contact Phone Number</label>
                <input type="text" class="form-control" id="employeeEmergencyPhone" name="employeeEmergencyPhone" value = "' . $eEmergencyNumber . '"><br><br>
                <span class="error" id="errorEmergencyPhone"></span>

                <input name="updateButton" type="submit" class="btn btn-secondary" value="Update">
                <a href="../KilburnazonEmployeeManagement.php"><button style="margin-left:1%;" type="button"
                        class="btn btn-secondary">Back</button></a>
            </form><br>
        ');
        $pdo = null;
    }

    function echoForm()
    {
        echo ('
            <h4 class="pageSubHeading">Please Enter the Employee\'s ID that you would like to update </h4><br>
            <form id="chooseUpdateEmployeeForm" onsubmit="return validateChooseUpdateEmployee();" method="POST"
                action="" class = "generalForm">

                <label class="form-label" >Employee\'s ID</label><br>
                <input type="text" class="form-control" id="changeEmployeeID" name="changeEmployeeID"><br>
                <span class="error" id="errorChangeEmployeeID"></span>
                <input name="LookUp" type="submit" class="btn btn-secondary" value="Look Up">
                <a href="../KilburnazonEmployeeManagement.php"><button style="margin-left:1%;" type="button"
                        class="btn btn-secondary">Back</button></a>
            </form>        
        ');
    }

    function echoFormMessage()
    {
        echo ('
            <h4 class="pageSubHeading">Please Enter the Employee\'s ID that you would like to update </h4><br>
            <form id="chooseUpdateEmployeeForm" onsubmit="return validateChooseUpdateEmployee();" method="POST"
                action="" class = "generalForm">

                <label class="form-label" >Employee\'s ID</label><br>
                <input type="text" class="form-control" id="changeEmployeeID" name="changeEmployeeID"><br>
                <span class="error" id="errorChangeEmployeeID"></span>
                <input name="LookUp" type="submit" class="btn btn-secondary" value="Look Up">
                <a href="../KilburnazonEmployeeManagement.php"><button style="margin-left:1%;" type="button"
                        class="btn btn-secondary">Back</button></a>
            </form>        
        ');
    }

    function echoFormValue($changeEmployeeID)
    {
        // Show the form to look up user
        echo ('
            <h4 class="pageSubHeading">Please Enter the Employee\'s ID that you would like to update </h4><br>
            <form id="chooseUpdateEmployeeForm" onsubmit="return validateChooseUpdateEmployee();" method="POST"
                action="" class = "generalForm">

                <label class="form-label" >Employee\'s ID</label><br>
                <input type="text" class="form-control" id="changeEmployeeID" name="changeEmployeeID" value = "' . $changeEmployeeID . '"><br>
                <span class="error" id="errorChangeEmployeeID"></span>
                <input name="LoopUp" type="submit" class="btn btn-secondary" value="Look Up">
                <a href="../KilburnazonEmployeeManagement.php"><button style="margin-left:1%;" type="button"
                        class="btn btn-secondary">Back</button></a>
            </form>        
        ');
    }
    ?>
</body>