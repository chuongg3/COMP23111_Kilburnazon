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
    <h2>Please Enter the Filter Paramters </h2><br>
    <form id="filterEmployeeForm" onsubmit="return validateFilterForm();" method="POST"
        action="filterEmployeeInput.php">
        <label>ID</label><br>
        <input type="hidden" name="employeeIDBox" value="off">
        <input type="checkbox" id="employeeIDBox" name="employeeIDBox">
        <input type="text" id="employeeID" name="employeeID" readOnly="readOnly"><br>
        <span class="error" id="errorID"></span><br>
        <script>
            var checkbox = document.getElementById('employeeIDBox');
            checkbox.addEventListener('change', function () {
                document.getElementById('employeeID').readOnly = !this.checked;
            });
        </script>


        <label>Name</label><br>
        <input type="hidden" name="employeeNameBox" value="off">
        <input type="checkbox" id="employeeNameBox" name="employeeNameBox">
        <input type="text" id="employeeName" name="employeeName" readOnly="readOnly"><br>
        <span class="error" id="errorName"></span><br>
        <script>
            var checkbox = document.getElementById('employeeNameBox');
            checkbox.addEventListener('change', function () {
                document.getElementById('employeeName').readOnly = !this.checked;
            });
        </script>

        <label>Address</label><br>
        <input type="hidden" name="employeeAddressBox" value="off">
        <input type="checkbox" id="employeeAddressBox" name="employeeAddressBox">
        <input type="text" id="employeeAddress" name="employeeAddress" readOnly="readOnly"><br>
        <span class="error" id="errorAddress"></span><br>
        <script>
            var checkbox = document.getElementById('employeeAddressBox');
            checkbox.addEventListener('change', function () {
                document.getElementById('employeeAddress').readOnly = !this.checked;
            });
        </script>

        <label>Salary</label><br>
        <input type="hidden" name="employeeSalaryBox" value="off">
        <input type="checkbox" id="employeeSalaryBox" name="employeeSalaryBox">
        <label>£</label>
        <input type="text" id="employeeSalary" name="employeeSalary" readOnly="readOnly"><br>
        <span class="error" id="errorSalary"></span><br>
        <script>
            var checkbox = document.getElementById('employeeSalaryBox');
            checkbox.addEventListener('change', function () {
                document.getElementById('employeeSalary').readOnly = !this.checked;
            });
        </script>

        <label>Date of Birth</label><br>
        <input type="hidden" name="employeeDoBBox" value="off">
        <input type="checkbox" id="employeeDoBBox" name="employeeDoBBox">
        <input type="date" id="employeeDoB" name="employeeDoB" value="2000-01-01" readOnly="readOnly"><br>
        <span class="error" id="errorDoB"></span><br>
        <script>
            var checkbox = document.getElementById('employeeDoBBox');
            checkbox.addEventListener('change', function () {
                document.getElementById('employeeDoB').readOnly = !this.checked;
            });
        </script>

        <label>National Insurance Number</label><br>
        <input type="hidden" name="employeeNiNBox" value="off">
        <input type="checkbox" id="employeeNiNBox" name="employeeNiNBox">
        <input type="text" id="employeeNiN" name="employeeNiN" readOnly="readOnly"><br>
        <span class="error" id="errorNiN"></span><br>
        <script>
            var checkbox = document.getElementById('employeeNiNBox');
            checkbox.addEventListener('change', function () {
                document.getElementById('employeeNiN').readOnly = !this.checked;
            });
        </script>

        <label>Department</label><br>
        <input type="hidden" name="employeeDepartmentBox" value="off">
        <input type="checkbox" id="employeeDepartmentBox" name="employeeDepartmentBox">
        <select id="employeeDepartment" name="employeeDepartment">
            <option>------</option>
            <option value="Driver">Driver</option>
            <option value="Packager">Packager</option>
            <option value="HR">Human Resources</option>
            <option value="Manager">Management</option>
        </select><br>
        <span class="error" id="errorDepartment"></span><br>
        <!-- <script>
            document.getElementById('employeeDepartmentBox').onchange = function () {
                document.getElementById('employeeDepartment').disabled = this.checked;
            };
        </script> -->

        <label>Emergency Contact Name</label><br>
        <input type="hidden" name="employeeEmergencyNameBox" value="off">
        <input type="checkbox" id="employeeEmergencyNameBox" name="employeeEmergencyNameBox">
        <input type="text" id="employeeEmergencyName" name="employeeEmergencyName" readOnly="readOnly"><br>
        <span class="error" id="errorEmergencyName"></span><br>
        <script>
            var checkbox = document.getElementById('employeeEmergencyNameBox');
            checkbox.addEventListener('change', function () {
                document.getElementById('employeeEmergencyName').readOnly = !this.checked;
            });
        </script>

        <label>Emergency Contact Relationship</label><br>
        <input type="hidden" name="employeeEmergencyRelationshipBox" value="off">
        <input type="checkbox" id="employeeEmergencyRelationshipBox" name="employeeEmergencyRelationshipBox">
        <input type="text" id="employeeEmergencyRelationship" name="employeeEmergencyRelationship"
            readOnly="readOnly"><br>
        <span class="error" id="errorEmergencyRelationship"></span><br>
        <script>
            var checkbox = document.getElementById('employeeEmergencyRelationshipBox');
            checkbox.addEventListener('change', function () {
                document.getElementById('employeeEmergencyRelationship').readOnly = !this.checked;
            });
        </script>

        <label>Emergency Contact Phone Number</label><br>
        <input type="hidden" name="employeeEmergencyPhoneBox" value="off">
        <input type="checkbox" id="employeeEmergencyPhoneBox" name="employeeEmergencyPhoneBox">
        <input type="text" id="employeeEmergencyPhone" name="employeeEmergencyPhone" readOnly="readOnly"><br><br>
        <span class="error" id="errorEmergencyPhone"></span><br>
        <script>
            var checkbox = document.getElementById('employeeEmergencyPhoneBox');
            checkbox.addEventListener('change', function () {
                document.getElementById('employeeEmergencyPhone').readOnly = !this.checked;
            });
        </script>

        <input type="submit" value="Search Employee(s)">
    </form>
</body>

</html>