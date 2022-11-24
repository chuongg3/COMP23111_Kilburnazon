<?php

print_r($_POST);
showInput();
connectDB();
function showInput()
{
    foreach ($_POST as $input_name => $value_input) {
        echo ("Inside $input_name is $value_input<br>");
    }
}

function connectDB()
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
        echo "<br>Connected successfully<br>";
        $conn = null;
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}

function insertEmployee()
{
    // Connect to database
    connectDB();

    // Get all values from POST
    $eID = $_POST['employeeID'];
    $eName = $_POST['employeeName'];
    $eAddress = $_POST['employeeAddress'];
    $eSalary = $_POST['employeeSalary'];
    $eDoB = $_POST['employeeDoB'];
    $eDepartment = $_POST['employeeDepartment'];
    $eEmergencyName = $_POST['employeeEmergencyName'];
    $eEmergencyRelationship = $_POST['employeeEmergencyRelationship'];
    $eEmergencyPhone = $_POST['employeeEmergencyPhone'];

    // Count number of records with employeeID, if > 0, then fail

    // Insert employee into database
}
// echo ("hello");


?>