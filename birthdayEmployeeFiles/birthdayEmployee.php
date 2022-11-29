<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Birthday</title>

    <link href="../bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../Employee.css">
</head>

<body>
    <?php
    require_once "../Default.php";
    echoHeader();

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
        // echo "<br>Connected successfully<br>";
    } catch (PDOException $e) {
        echo "ERROR Connection failed: " . $e->getMessage();
    }

    $sql = "CALL getEmployeeBirthdayMonth";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    echo ("<h2 class = 'pageHeading'>Employees with Birthdays in " . date("F") . ":</h2>");

    // Display the information we fetched
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    echo ("<br><table class='table table-light table-striped table-bordered'>
                <tr>
                    <th>No.</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>DoB</th>
                </tr>
        ");
    $i = 1;
    while ($row = $stmt->fetch()) {
        echo ("<tr>");
        echo ("<td>" . $i . "</td>");
        foreach ($row as $key => $pair) {
            echo ("<td>" . $pair . "</td>");
        }
        echo ("</tr>");
        $i++;
    }
    echo ("</table>");
    $conn = null;

    ?>
    <a href="../KilburnazonEmployeeManagement.php">
        <button type="button" class="btn btn-secondary buttonMargin">Return to home
            page</button>
    </a>
    <hr>
</body>

</html>