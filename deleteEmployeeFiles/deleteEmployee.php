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
    <h2>Please Enter the Employee's ID that you would like to DELETE </h2><br>
    <form id="chooseDeleteEmployeeForm" onsubmit="return validateChooseDeleteEmployee();" method="POST"
        action="deleteEmployeeInput.php">
        <label>Employee's ID</label><br>
        <input type="text" id="deleteEmployeeID" name="deleteEmployeeID"><br>
        <span class="error" id="errorDeleteEmployeeID"></span><br>
        <input type="submit" value="Delete">
    </form>
</body>

</html>