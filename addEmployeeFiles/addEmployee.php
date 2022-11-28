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
    <?php
    require_once "../Default.php";
    echoHeader();
    ?>
    <h2 class="pageHeading">Please Enter the New Employee's Information</h2>
    <!-- <div class="generalForm"> -->
    <form id="addEmployeeForm" onsubmit="return validateAddForm();" method="POST" action="newEmployeeInput.php"
        class="generalForm">
        <label>Employee's ID</label><br>
        <input type="text" class="form-textBox" id="employeeID" name="employeeID"><br>
        <span class="inputInformation" id="inputRecommendation">'XX-XXXXXXX'</span><br>
        <span class="error" id="errorID"></span><br>

        <label>Name</label><br>
        <input type="text" class="form-textBox" id="employeeName" name="employeeName"><br>
        <span class="error" id="errorName"></span><br>

        <label>Address</label><br>
        <input type="text" class="form-textBox" id="employeeAddress" name="employeeAddress"><br>
        <span class="error" id="errorAddress"></span><br>

        <label>Salary</label><br>
        <label>£</label>
        <input type="text" class="form-textBox" id="employeeSalary" name="employeeSalary"><br>
        <span class="error" id="errorSalary"></span><br>

        <label>Date of Birth</label><br>
        <input type="date" class="form-textBox" id="employeeDoB" name="employeeDoB"><br>
        <span class="error" id="errorDoB"></span><br>

        <label>National Insurance Number</label><br>
        <input type="text" class="form-textBox" id="employeeNiN" name="employeeNiN"><br>
        <span class="inputInformation" id="inputRecommendation">'AA1234567A'</span><br>
        <span class="error" id="errorNiN"></span><br>

        <label>Department</label><br>
        <div class="form-dropDown">
            <select id="employeeDepartment" name="employeeDepartment">
                <option>------</option>
                <option value="Driver">Driver</option>
                <option value="Packager">Packager</option>
                <option value="HR">Human Resources</option>
                <option value="Manager">Management</option>
            </select><br>
        </div>
        <span class="error" id="errorDepartment"></span><br>

        <label>Emergency Contact Name</label><br>
        <input type="text" class="form-textBox" id="employeeEmergencyName" name="employeeEmergencyName"><br>
        <span class="error" id="errorEmergencyName"></span><br>

        <label>Emergency Contact Relationship</label><br>
        <input type="text" class="form-textBox" id="employeeEmergencyRelationship"
            name="employeeEmergencyRelationship"><br>
        <span class="error" id="errorEmergencyRelationship"></span><br>

        <label>Emergency Contact Phone Number</label><br>
        <input type="text" class="form-textBox" id="employeeEmergencyPhone" name="employeeEmergencyPhone"
            placeholder="01234 567 890"><br><br>
        <span class="error" id="errorEmergencyPhone"></span>

        <input type="submit" class="btn btn-secondary" value="Add Employee">
    </form>
    <!-- </div> -->
</body>

</html>