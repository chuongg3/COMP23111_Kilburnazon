<?php

print_r($_POST);
showInput();
function showInput()
{
    $eID = $_POST['employeeID'];
    $eName = $_POST['employeeName'];
    $eAddress = $_POST['employeeAddress'];
    $eSalary = $_POST['employeeSalary'];
    $eDoB = $_POST['employeeDoB'];
    $eDepartment = $_POST['employeeDepartment'];
    $eEmergencyName = $_POST['employeeEmergencyName'];
    $eEmergencyRelationship = $_POST['employeeEmergencyRelationship'];
    $eEmergencyPhone = $_POST['employeeEmergencyPhone'];
}

function insertEmployee()
{
    foreach ($_POST as $input_name => $value_input) {
        echo ("Inside $input_name is $value_input<br>");
    }
}
// echo ("hello");


?>