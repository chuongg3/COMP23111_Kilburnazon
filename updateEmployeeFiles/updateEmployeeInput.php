<?php

function getEmployeeInformation()
{
    echo ('
    <form id="addEmployeeForm" onsubmit="return validateForm();" method="post" action="newEmployeeInput.php">
        <label>ID</label><br>
        <input type="text" id="employeeID" name="employeeID"><br>
        <span class="error" id="errorID"></span><br>

        <label>Name</label><br>
        <input type="text" id="employeeName" name="employeeName"><br>
        <span class="error" id="errorName"></span><br>

        <label>Address</label><br>
        <input type="text" id="employeeAddress" name="employeeAddress"><br>
        <span class="error" id="errorAddress"></span><br>

        <label>Salary</label><br>
        <label>£</label>
        <input type="text" id="employeeSalary" name="employeeSalary"><br>
        <span class="error" id="errorSalary"></span><br>

        <label>Date of Birth</label><br>
        <input type="date" id="employeeDoB" name="employeeDoB"><br>
        <span class="error" id="errorDoB"></span><br>

        <label>National Insurance Number</label><br>
        <input type="text" id="employeeNiN" name="employeeNiN"><br>
        <span class="error" id="errorNiN"></span><br>

        <label>Department</label><br>
        <select id="employeeDepartment" name="employeeDepartment">
            <option>------</option>
            <option value="Driver">Driver</option>
            <option value="Packager">Packager</option>
            <option value="HR">Human Resources</option>
            <option value="Manager">Management</option>
        </select><br>
        <span class="error" id="errorDepartment"></span><br>

        <label>Emergency Contact Name</label><br>
        <input type="text" id="employeeEmergencyName" name="employeeEmergencyName"><br>
        <span class="error" id="errorEmergencyName"></span><br>

        <label>Emergency Contact Relationship</label><br>
        <input type="text" id="employeeEmergencyRelationship" name="employeeEmergencyRelationship"><br>
        <span class="error" id="errorEmergencyRelationship"></span><br>

        <label>Emergency Contact Phone Number</label><br>
        <input type="text" id="employeeEmergencyPhone" name="employeeEmergencyPhone"><br><br>
        <span class="error" id="errorEmergencyPhone"></span><br>

        <input type="submit" value="Add Employee">
    </form>
    ');
}
?>