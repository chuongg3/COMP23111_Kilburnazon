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
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="../KilburnazonEmployeeManagement.php">
            <h2>Kilburnazon</h2>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>
    <br><br><br><br>
    <?php
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

    echo ("<h2 style = 'margin-left: 20px'>Employees with Birthdays in " . date("F") . ":</h2>");

    // Display the information we fetched
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    echo ("<table border = '1' style = 'margin-left: 20px;'>
                <tr>
                    <th>No.</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>DoB</th>
                </tr>
        ");
    $i = 0;
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
        <button type="button" class="btn btn-secondary"
            style="margin-left: 20px; margin-top: 15px;margin-bottom: 20px;">Return to home
            page</button>
    </a>
</body>

</html>