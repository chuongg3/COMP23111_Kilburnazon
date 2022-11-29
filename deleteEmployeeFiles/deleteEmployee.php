<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script type="text/javascript" src="../EmployeeValidate.js"></script>
    <link rel="stylesheet" type="text/css" href="../Employee.css">
    <!-- Bootstrap core CSS -->
    <link href="../bootstrap.css" rel="stylesheet">
</head>

<body>
    <?php
    require_once "../Default.php";
    echoHeader();

    if (empty($_POST)) {
        echo ('
            <h2 class="pageHeading">Please Enter the Employee\'s ID that you would like to DELETE </h2>
            <form id="chooseDeleteEmployeeForm" onsubmit="return validateChooseDeleteEmployee();" method="POST"
                action="" class="generalForm">
    
                <label>Your ID</label><br>
                <input type="text" id="employeeID" name="employeeID"><br>
                <span class="error" id="errorEmployeeID"></span><br>
    
                <label>ID to be Deleted</label><br>
                <input type="text" id="deleteEmployeeID" name="deleteEmployeeID"><br>
                <span class="error" id="errorDeleteEmployeeID"></span><br>
    
                <input type="submit" class="btn btn-secondary" value="Delete">
            </form>
        ');
    } else {

    }
    ?>
</body>

</html>