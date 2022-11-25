<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script type="text/javascript" src="../EmployeeValidate.js"></script>
    <link rel="stylesheet" type="text/css" href="../Employee.css">
</head>

<body>
    <h2>Please Enter the New Employee's Information </h2><br>
    <form id="filterEmployeeForm" onsubmit="return validateAddForm();" method="POST" action="newEmployeeInput.php">
        <label>ID</label><br>
        <input type="checkbox" id="employeeIDBox">
        <input type="text" id="employeeID" name="employeeID"><br>
        <span class="error" id="errorID"></span><br>
        <script>
            document.getElementById('employeeIDBox').onchange = function () {
                document.getElementById('employeeID').disabled = this.checked;
            };
        </script>


        <label>Name</label><br>
        <input type="checkbox" id="employeeNameBox">
        <input type="text" id="employeeName" name="employeeName"><br>
        <span class="error" id="errorName"></span><br>
        <script>
            document.getElementById('employeeNameBox').onchange = function () {
                document.getElementById('employeeName').disabled = this.checked;
            };
        </script>

        <label>Address</label><br>
        <input type="checkbox" id="employeeAddressBox">
        <input type="text" id="employeeAddress" name="employeeAddress"><br>
        <span class="error" id="errorAddress"></span><br>
        <script>
            document.getElementById('employeeAddressBox').onchange = function () {
                document.getElementById('employeeAddress').disabled = this.checked;
            };
        </script>

        <label>Salary</label><br>
        <input type="checkbox" id="employeeSalaryBox">
        <label>£</label>
        <input type="text" id="employeeSalary" name="employeeSalary"><br>
        <span class="error" id="errorSalary"></span><br>
        <script>
            document.getElementById('employeeSalaryBox').onchange = function () {
                document.getElementById('employeeSalary').disabled = this.checked;
            };
        </script>

        <label>Date of Birth</label><br>
        <input type="checkbox" id="employeeDoBBox">
        <input type="date" id="employeeDoB" name="employeeDoB"><br>
        <span class="error" id="errorDoB"></span><br>
        <script>
            document.getElementById('employeeDoBBox').onchange = function () {
                document.getElementById('employeeDoB').disabled = this.checked;
            };
        </script>

        <label>National Insurance Number</label><br>
        <input type="checkbox" id="employeeNiNBox">
        <input type="text" id="employeeNiN" name="employeeNiN"><br>
        <span class="error" id="errorNiN"></span><br>
        <script>
            document.getElementById('employeeNiNBox').onchange = function () {
                document.getElementById('employeeNiN').disabled = this.checked;
            };
        </script>

        <label>Department</label><br>
        <input type="checkbox" id="employeeDepartmentBox">
        <select id="employeeDepartment" name="employeeDepartment">
            <option>------</option>
            <option value="Driver">Driver</option>
            <option value="Packager">Packager</option>
            <option value="HR">Human Resources</option>
            <option value="Manager">Management</option>
        </select><br>
        <span class="error" id="errorDepartment"></span><br>
        <script>
            document.getElementById('employeeDepartmentBox').onchange = function () {
                document.getElementById('employeeDepartment').disabled = this.checked;
            };
        </script>

        <label>Emergency Contact Name</label><br>
        <input type="checkbox" id="employeeEmergencyNameBox">
        <input type="text" id="employeeEmergencyName" name="employeeEmergencyName"><br>
        <span class="error" id="errorEmergencyName"></span><br>
        <script>
            document.getElementById('employeeEmergencyNameBox').onchange = function () {
                document.getElementById('employeeEmergencyName').disabled = this.checked;
            };
        </script>

        <label>Emergency Contact Relationship</label><br>
        <input type="checkbox" id="employeeEmergencyRelationshipBox">
        <input type="text" id="employeeEmergencyRelationship" name="employeeEmergencyRelationship"><br>
        <span class="error" id="errorEmergencyRelationship"></span><br>
        <script>
            document.getElementById('employeeEmergencyRelationshipBox').onchange = function () {
                document.getElementById('employeeEmergencyRelationship').disabled = this.checked;
            };
        </script>

        <label>Emergency Contact Phone Number</label><br>
        <input type="checkbox" id="employeeEmergencyPhoneBox">
        <input type="text" id="employeeEmergencyPhone" name="employeeEmergencyPhone"><br><br>
        <span class="error" id="errorEmergencyPhone"></span><br>
        <script>
            document.getElementById('employeeEmergencyPhoneBox').onchange = function () {
                document.getElementById('employeeEmergencyPhone').disabled = this.checked;
            };
        </script>

        <input type="submit" value="Add Employee">
    </form>
</body>

</html>