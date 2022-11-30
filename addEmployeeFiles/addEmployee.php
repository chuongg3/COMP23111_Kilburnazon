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
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" -->
    <!-- integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> -->

</head>

<body>
    <?php
    require_once "../Default.php";
    echoHeader();
    ?>
    <h2 class="pageHeading">Please Enter the New Employee's Information</h2>
    <div class="generalForm">
        <!-- <div class="generalForm"> -->
        <form id="addEmployeeForm" onsubmit="return validateAddForm();" method="POST" action="newEmployeeInput.php">
            <label class="form-label">Employee's ID</label><br>
            <input type="text" class="form-control" id="employeeID" name="employeeID">
            <span class="inputInformation" id="inputRecommendation">'XX-XXXXXXX'</span><br>
            <span class="error" id="errorID"></span><br>

            <label class="form-label">Name</label><br>
            <input type="text" class="form-control" id="employeeName" name="employeeName">
            <span class="error" id="errorName"></span><br>

            <label class="form-label">Address</label><br>
            <input type="text" class="form-control" id="employeeAddress" name="employeeAddress">
            <span class="error" id="errorAddress"></span><br>

            <label class="form-label">Salary</label><br>
            <label>£</label>
            <input type="text" class="form-control" id="employeeSalary" name="employeeSalary">
            <span class="error" id="errorSalary"></span><br>

            <label class="form-label">Date of Birth</label><br>
            <input type="date" class="form-control" id="employeeDoB" name="employeeDoB">
            <span class="error" id="errorDoB"></span><br>

            <label class="form-label">National Insurance Number</label><br>
            <input type="text" class="form-control" id="employeeNiN" name="employeeNiN">
            <span class="inputInformation" id="inputRecommendation">'AA1234567A'</span><br>
            <span class="error" id="errorNiN"></span><br>

            <label class="form-label">Department</label><br>
            <select id="employeeDepartment" name="employeeDepartment" class="form-select">
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
    </div>
    <br>
</body>

</html>