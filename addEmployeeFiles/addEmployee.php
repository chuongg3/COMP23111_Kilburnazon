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
    <?php
    require_once "../Default.php";
    echoHeader();

    echo ('<h2 class="pageHeading">Add New Employee</h2>');
    if (empty($_POST)) {
        echoForm();
    } else {
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
        $sql = "SELECT COUNT(*) as count
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
        if ($stmt->fetch()['count'] != 0) {
            echoFormValue($eID, $eName, $eAddress, $eSalary, $eDoB, $eNiN, $eDepartment, $eEmergencyName, $eEmergencyRelationship, $eEmergencyPhone);
            echo ('<script>document.getElementById("errorID").innerHTML = "Employee ID already exists!";</script>');
        } else {
            insertEmployee($eID, $eName, $eAddress, $eSalary, $eDoB, $eNiN, $eDepartment, $eEmergencyName, $eEmergencyRelationship, $eEmergencyPhone);
            echoSuccessForm();
        }
    }

    function echoForm()
    {
        echo ('
        <h5 class="pageSubHeading">Please Enter the New Employee\'s Information</h5>
        <div class="generalForm">
            <form id="addEmployeeForm" onsubmit="return validateAddForm();" method="POST" action="">
                <label class="form-label">Employee\'s ID</label><br>
                <input type="text" class="form-control" id="employeeID" name="employeeID">
                <span class="inputInformation" id="inputRecommendation">\'XX-XXXXXXX\'</span><br>
                <span class="error" id="errorID"></span><br>

                <label class="form-label">Name</label><br>
                <input type="text" class="form-control" id="employeeName" name="employeeName">
                <span class="error" id="errorName"></span><br>

                <label class="form-label">Address</label><br>
                <input type="text" class="form-control" id="employeeAddress" name="employeeAddress">
                <span class="error" id="errorAddress"></span><br>

                <label class="form-label">Salary</label><br>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="poundAddOn">£</span>
                    <input type="text" class="form-control" id="employeeSalary" name="employeeSalary">
                </div>
                <span class="error" id="errorSalary"></span><br>

                <label class="form-label">Date of Birth</label><br>
                <input type="date" class="form-control" id="employeeDoB" name="employeeDoB">
                <span class="error" id="errorDoB"></span><br>

                <label class="form-label">National Insurance Number</label><br>
                <input type="text" class="form-control" id="employeeNiN" name="employeeNiN">
                <span class="inputInformation" id="inputRecommendation">\'AA1234567A\'</span><br>
                <span class="error" id="errorNiN"></span><br>

                <label class="form-label">Department</label><br>
                <select class="form-select" id="employeeDepartment" name="employeeDepartment">
                    <option>------</option>
                    <option value="Driver">Driver</option>
                    <option value="Packager">Packager</option>
                    <option value="HR">Human Resources</option>
                    <option value="Manager">Management</option>
                </select>
                <span class="error" id="errorDepartment"></span><br>


                <label class="form-label">Emergency Contact Name</label><br>
                <input type="text" class="form-control" id="employeeEmergencyName" name="employeeEmergencyName">
                <span class="error" id="errorEmergencyName"></span><br>

                <label class="form-label">Emergency Contact Relationship</label><br>
                <input type="text" class="form-control" id="employeeEmergencyRelationship"
                    name="employeeEmergencyRelationship">
                <span class="error" id="errorEmergencyRelationship"></span><br>

                <label class="form-label">Emergency Contact Phone Number</label><br>
                <input type="text" class="form-control" id="employeeEmergencyPhone" name="employeeEmergencyPhone"
                    placeholder="01234 567 890"><br>
                <span class="error" id="errorEmergencyPhone"></span>

                <input type="submit" class="btn btn-secondary" value="Add Employee">
                <a href="../KilburnazonEmployeeManagement.php"><button style="margin-left:1%;" type="button"
                        class="btn btn-secondary">Back</button></a>
            </form>
        </div><br>
        ');
    }

    function echoSuccessForm()
    {
        echo ('
        <h4 class="pageSubHeading">Successfully Added an employee</h4>
        <h5 class="pageSubHeading">Please Enter Another New Employee\'s Information</h5>
        <div class="generalForm">
            <form id="addEmployeeForm" onsubmit="return validateAddForm();" method="POST" action="">
                <label class="form-label">Employee\'s ID</label><br>
                <input type="text" class="form-control" id="employeeID" name="employeeID">
                <span class="inputInformation" id="inputRecommendation">\'XX-XXXXXXX\'</span><br>
                <span class="error" id="errorID"></span><br>

                <label class="form-label">Name</label><br>
                <input type="text" class="form-control" id="employeeName" name="employeeName">
                <span class="error" id="errorName"></span><br>

                <label class="form-label">Address</label><br>
                <input type="text" class="form-control" id="employeeAddress" name="employeeAddress">
                <span class="error" id="errorAddress"></span><br>

                <label class="form-label">Salary</label><br>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="poundAddOn">£</span>
                    <input type="text" class="form-control" id="employeeSalary" name="employeeSalary">
                </div>
                <span class="error" id="errorSalary"></span><br>

                <label class="form-label">Date of Birth</label><br>
                <input type="date" class="form-control" id="employeeDoB" name="employeeDoB">
                <span class="error" id="errorDoB"></span><br>

                <label class="form-label">National Insurance Number</label><br>
                <input type="text" class="form-control" id="employeeNiN" name="employeeNiN">
                <span class="inputInformation" id="inputRecommendation">\'AA1234567A\'</span><br>
                <span class="error" id="errorNiN"></span><br>

                <label class="form-label">Department</label><br>
                <select class="form-select" id="employeeDepartment" name="employeeDepartment">
                    <option>------</option>
                    <option value="Driver">Driver</option>
                    <option value="Packager">Packager</option>
                    <option value="HR">Human Resources</option>
                    <option value="Manager">Management</option>
                </select>
                <span class="error" id="errorDepartment"></span><br>


                <label class="form-label">Emergency Contact Name</label><br>
                <input type="text" class="form-control" id="employeeEmergencyName" name="employeeEmergencyName">
                <span class="error" id="errorEmergencyName"></span><br>

                <label class="form-label">Emergency Contact Relationship</label><br>
                <input type="text" class="form-control" id="employeeEmergencyRelationship"
                    name="employeeEmergencyRelationship">
                <span class="error" id="errorEmergencyRelationship"></span><br>

                <label class="form-label">Emergency Contact Phone Number</label><br>
                <input type="text" class="form-control" id="employeeEmergencyPhone" name="employeeEmergencyPhone"
                    placeholder="01234 567 890"><br>
                <span class="error" id="errorEmergencyPhone"></span>

                <input type="submit" class="btn btn-secondary" value="Add Employee">
                <a href="../KilburnazonEmployeeManagement.php"><button style="margin-left:1%;" type="button"
                        class="btn btn-secondary">Back</button></a>
            </form>
        </div><br>
        ');
    }

    function echoFormValue($eID, $eName, $eAddress, $eSalary, $eDoB, $eNiN, $eDepartment, $eEmergencyName, $eEmergencyRelationship, $eEmergencyPhone)
    {
        echo ('
        <h5 class="pageSubHeading">Please Enter the New Employee\'s Information</h5>
        <div class="generalForm">
            <form id="addEmployeeForm" onsubmit="return validateAddForm();" method="POST" action="">
                <label class="form-label">Employee\'s ID</label><br>
                <input type="text" class="form-control" id="employeeID" name="employeeID" value="' . $eID . '">
                <span class="inputInformation" id="inputRecommendation">\'XX-XXXXXXX\'</span><br>
                <span class="error" id="errorID"></span><br>

                <label class="form-label">Name</label><br>
                <input type="text" class="form-control" id="employeeName" name="employeeName" value="' . $eName . '">
                <span class="error" id="errorName"></span><br>

                <label class="form-label">Address</label><br>
                <input type="text" class="form-control" id="employeeAddress" name="employeeAddress" value="' . $eAddress . '">
                <span class="error" id="errorAddress"></span><br>

                <label class="form-label">Salary</label><br>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="poundAddOn">£</span>
                    <input type="text" class="form-control" id="employeeSalary" name="employeeSalary" value="' . $eSalary . '">
                </div>
                <span class="error" id="errorSalary"></span><br>

                <label class="form-label">Date of Birth</label><br>
                <input type="date" class="form-control" id="employeeDoB" name="employeeDoB" value="' . $eDoB . '">
                <span class="error" id="errorDoB"></span><br>

                <label class="form-label">National Insurance Number</label><br>
                <input type="text" class="form-control" id="employeeNiN" name="employeeNiN" value="' . $eNiN . '">
                <span class="inputInformation" id="inputRecommendation">\'AA1234567A\'</span><br>
                <span class="error" id="errorNiN"></span><br>

                <label class="form-label">Department</label><br>
                <select class="form-select" id="employeeDepartment" name="employeeDepartment">
                    option>------</option>');
        if ($eDepartment == "Driver") {
            echo ('
                        <option value="Driver" selected>Driver</option>
                        <option value="Packager">Packager</option>
                        <option value="HR">Human Resources</option>
                        <option value="Manager">Management</option>
                ');
        } elseif ($eDepartment == "Packager") {
            echo ('
                        <option value="Driver">Driver</option>
                        <option value="Packager" selected>Packager</option>
                        <option value="HR">Human Resources</option>
                        <option value="Manager">Management</option>
                ');
        } elseif ($eDepartment == "HR") {
            echo ('
                        <option value="Driver">Driver</option>
                        <option value="Packager">Packager</option>
                        <option value="HR" selected>Human Resources</option>
                        <option value="Manager">Management</option>
                ');
        } elseif ($eDepartment == "Manager") {
            echo ('
                        <option value="Driver">Driver</option>
                        <option value="Packager">Packager</option>
                        <option value="HR">Human Resources</option>
                        <option value="Manager" selected>Management</option>
                ');
        } else {
            echo ('
                        <option value="Driver">Driver</option>
                        <option value="Packager">Packager</option>
                        <option value="HR">Human Resources</option>
                        <option value="Manager">Management</option>
                ');
        }

        echo ('
                </select>
                <span class="error" id="errorDepartment"></span><br>


                <label class="form-label">Emergency Contact Name</label><br>
                <input type="text" class="form-control" id="employeeEmergencyName" name="employeeEmergencyName" value="' . $eEmergencyName . '">
                <span class="error" id="errorEmergencyName"></span><br>

                <label class="form-label">Emergency Contact Relationship</label><br>
                <input type="text" class="form-control" id="employeeEmergencyRelationship"
                    name="employeeEmergencyRelationship" value="' . $eEmergencyRelationship . '">
                <span class="error" id="errorEmergencyRelationship"></span><br>

                <label class="form-label">Emergency Contact Phone Number</label><br>
                <input type="text" class="form-control" id="employeeEmergencyPhone" name="employeeEmergencyPhone"
                    placeholder="01234 567 890" value="' . $eEmergencyPhone . '"><br>
                <span class="error" id="errorEmergencyPhone"></span>

                <input type="submit" class="btn btn-secondary" value="Add Employee">
                <a href="../KilburnazonEmployeeManagement.php"><button style="margin-left:1%;" type="button"
                        class="btn btn-secondary">Back</button></a>
            </form>
        </div><br>
        ');
    }
    function insertEmployee($eID, $eName, $eAddress, $eSalary, $eDoB, $eNiN, $eDepartment, $eEmergencyName, $eEmergencyRelationship, $eEmergencyPhone)
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

            // echo ("Successfully Uploaded to DB");
        } catch (PDOException $e) {
            echo ("Error Uploading: " . $e->getMessage());
        }

        $pdo = null;
    }
    ?>
</body>

</html>