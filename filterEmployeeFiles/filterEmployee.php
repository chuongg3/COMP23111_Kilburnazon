<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filter Employee Information</title>

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
    echo ('<h2 class="pageHeading">Filter Employees</h2>');
    echoForm();
    function echoForm()
    {
        echo ('
        <h5 class="pageSubHeading">Please Enter the Filter Parameters </h5>
        <form id="filterEmployeeForm" onsubmit="return validateFilterForm();" method="POST" action="filterEmployeeInput.php"
            class="generalForm">
            <label class="form-label">Employee\'s ID</label><br>
            <input type="hidden" name="employeeIDBox" value="off">
            <input class="form-check-input" type="checkbox" id="employeeIDBox" name="employeeIDBox">
            <input type="text" class="form-control" id="employeeID" name="employeeID" readOnly="readOnly"><br>
            <span class="error" id="errorID"></span><br>
            <script>
                var checkbox = document.getElementById("employeeIDBox");
                checkbox.addEventListener("change", function () {
                    document.getElementById("employeeID").readOnly = !this.checked;
                });
            </script>


            <label class="form-label">Name</label><br>
            <input type="hidden" name="employeeNameBox" value="off">
            <input class="form-check-input" type="checkbox" id="employeeNameBox" name="employeeNameBox">
            <input type="text" class="form-control" id="employeeName" name="employeeName" readOnly="readOnly"><br>
            <span class="error" id="errorName"></span><br>
            <script>
                var checkbox = document.getElementById("employeeNameBox");
                checkbox.addEventListener("change", function () {
                    document.getElementById("employeeName").readOnly = !this.checked;
                });
            </script>

            <label class="form-label">Address</label><br>
            <input type="hidden" name="employeeAddressBox" value="off">
            <input class="form-check-input" type="checkbox" id="employeeAddressBox" name="employeeAddressBox">
            <input type="text" class="form-control" id="employeeAddress" name="employeeAddress" readOnly="readOnly"><br>
            <span class="error" id="errorAddress"></span><br>
            <script>
                var checkbox = document.getElementById("employeeAddressBox");
                checkbox.addEventListener("change", function () {
                    document.getElementById("employeeAddress").readOnly = !this.checked;
                });
            </script>

            <label class="form-label">Salary</label><br>
            <input type="hidden" name="employeeSalaryBox" value="off">
            <input class="form-check-input" style="margin-right: 1%" type="checkbox" id="employeeSalaryBox"
                name="employeeSalaryBox">
            <div class="input-group mb-3">
                <span class="input-group-text" id="poundAddOn">£</span>
                <input type="text" class="form-control" id="employeeSalary" name="employeeSalary" readOnly="readOnly"><br>
            </div>
            <span class="error" id="errorSalary"></span><br>
            <script>
                var checkbox = document.getElementById("employeeSalaryBox");
                checkbox.addEventListener("change", function () {
                    document.getElementById("employeeSalary").readOnly = !this.checked;
                });
            </script>

            <label class="form-label">Date of Birth</label><br>
            <input type="hidden" name="employeeDoBBox" value="off">
            <input class="form-check-input" type="checkbox" id="employeeDoBBox" name="employeeDoBBox">
            <input type="date" class="form-control" id="employeeDoB" name="employeeDoB" value="2000-01-01"
                readOnly="readOnly"><br>
            <span class="error" id="errorDoB"></span><br>
            <script>
                var checkbox = document.getElementById("employeeDoBBox");
                checkbox.addEventListener("change", function () {
                    document.getElementById("employeeDoB").readOnly = !this.checked;
                });
            </script>

            <label class="form-label">National Insurance Number</label><br>
            <input type="hidden" name="employeeNiNBox" value="off">
            <input class="form-check-input" type="checkbox" id="employeeNiNBox" name="employeeNiNBox">
            <input type="text" class="form-control" id="employeeNiN" name="employeeNiN" readOnly="readOnly"><br>
            <span class="error" id="errorNiN"></span><br>
            <script>
                var checkbox = document.getElementById("employeeNiNBox");
                checkbox.addEventListener("change", function () {
                    document.getElementById("employeeNiN").readOnly = !this.checked;
                });
            </script>

            <label class="form-label">Department</label><br>
            <input type="hidden" name="employeeDepartmentBox" value="off">
            <input class="form-check-input" type="checkbox" id="employeeDepartmentBox" name="employeeDepartmentBox">
            <!-- <div class="form-dropDown"> -->
            <select class="form-select" id="employeeDepartment" name="employeeDepartment">
                <option>------</option>
                <option value="Driver">Driver</option>
                <option value="Packager">Packager</option>
                <option value="HR">Human Resources</option>
                <option value="Manager">Management</option>
            </select><br>
            <!-- </div> -->
            <span class="error" id="errorDepartment"></span><br>
            <!-- <script>
                document.getElementById("employeeDepartmentBox").onchange = function () {
                    document.getElementById("employeeDepartment").disabled = this.checked;
                };
            </script> -->

            <label class="form-label">Emergency Contact Name</label><br>
            <input type="hidden" name="employeeEmergencyNameBox" value="off">
            <input class="form-check-input" type="checkbox" id="employeeEmergencyNameBox" name="employeeEmergencyNameBox">
            <input type="text" class="form-control" id="employeeEmergencyName" name="employeeEmergencyName"
                readOnly="readOnly"><br>
            <span class="error" id="errorEmergencyName"></span><br>
            <script>
                var checkbox = document.getElementById("employeeEmergencyNameBox");
                checkbox.addEventListener("change", function () {
                    document.getElementById("employeeEmergencyName").readOnly = !this.checked;
                });
            </script>

            <label class="form-label">Emergency Contact Relationship</label><br>
            <input type="hidden" name="employeeEmergencyRelationshipBox" value="off">
            <input class="form-check-input" type="checkbox" id="employeeEmergencyRelationshipBox"
                name="employeeEmergencyRelationshipBox">
            <input type="text" class="form-control" id="employeeEmergencyRelationship" name="employeeEmergencyRelationship"
                readOnly="readOnly"><br>
            <span class="error" id="errorEmergencyRelationship"></span><br>
            <script>
                var checkbox = document.getElementById("employeeEmergencyRelationshipBox");
                checkbox.addEventListener("change", function () {
                    document.getElementById("employeeEmergencyRelationship").readOnly = !this.checked;
                });
            </script>

            <label class="form-label">Emergency Contact Phone Number</label><br>
            <input type="hidden" name="employeeEmergencyPhoneBox" value="off">
            <input class="form-check-input" type="checkbox" id="employeeEmergencyPhoneBox" name="employeeEmergencyPhoneBox">
            <input type="text" class="form-control" id="employeeEmergencyPhone" name="employeeEmergencyPhone"
                readOnly="readOnly"><br><br>
            <span class="error" id="errorEmergencyPhone"></span>
            <script>
                var checkbox = document.getElementById("employeeEmergencyPhoneBox");
                checkbox.addEventListener("change", function () {
                    document.getElementById("employeeEmergencyPhone").readOnly = !this.checked;
                });
            </script>

            <input type="submit" class="btn btn-secondary" value="Search">
            <a href="../KilburnazonEmployeeManagement.php"><button style="margin-left:1%;" type="button"
                        class="btn btn-secondary">Back</button></a>
        </form><br>
        ');
    }
    ?>

</body>

</html>