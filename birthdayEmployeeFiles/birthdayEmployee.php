<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
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

    // Display the information we fetched
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    echo ("<table border = '1'>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>DoB</th>
                </tr>
        ");
    while ($row = $stmt->fetch()) {
        echo ("<tr>");
        foreach ($row as $key => $pair) {
            echo ("<td>" . $pair . "</td>");
        }
        echo ("</tr>");
    }
    echo ("</table>");
    $conn = null;

    ?>
</body>

</html>