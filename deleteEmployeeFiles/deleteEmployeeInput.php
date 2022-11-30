<?php
echo ("<p>Deleting<p>");
deleteEmployee();
function deleteEmployee()
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
        // echo "<br>Connected successfully<br>";
    } catch (PDOException $e) {
        echo "ERROR Connection failed: " . $e->getMessage();
    }

    $eID = $_POST['employeeID'];
    $eDeleteID = $_POST['deleteEmployeeID'];

    $sql = "SELECT COUNT(*) as count
            FROM Employee
            WHERE employee_ID = :eID;
    ";

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'eID' => $eID
        ]);
        echo ("<br>Successfully Counted From DB");
    } catch (PDOException $e) {
        echo ("Error Counting " . $e->getMessage());
    }
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    if ($stmt->fetch()['count'] == 0) {
        echo ("ERROR: Employee ID Does Not Exists");
    } else {
        try {
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                'eID' => $eDeleteID
            ]);
            echo ("<br>Successfully Counted From DB");
        } catch (PDOException $e) {
            echo ("Error Counting " . $e->getMessage());
        }

        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        if ($stmt->fetch()['count'] == 0) {
            echo ("ERROR: Employee To Delete Does Not Exists");
        } else {

            // Now do the due diligence of deleting all the records that the employee could be in
            $sql = "DELETE FROM Driver WHERE employee_ID = :eDeleteID;
                DELETE FROM Packager WHERE employee_ID = :eDeleteID;
                DELETE FROM HR WHERE employee_ID = :eDeleteID;
                DELETE FROM Manager WHERE employee_ID = :eDeleteID;
                -- Delete from each department table  (Driver, Packager, HR, Manager)

                DELETE FROM EmployeeManager WHERE employee_ID = :eDeleteID;
                --Delete from EmployeeManager as an employee
                
                UPDATE DepartmentManager
                SET manager_EmployeeID = (SELECT employee_ID FROM Employee WHERE department_ID = 4 ORDER BY RAND() LIMIT 1)
                WHERE manager_EmployeeID = :eDeleteID;
                -- If DepartmentManager, we set a random manager as new Department Manager
                
                UPDATE EmployeeManager
                SET manager_EmployeeID = (SELECT employee_ID FROM Employee WHERE department_ID = 4 ORDER BY RAND() LIMIT 1)
                WHERE manager_EmployeeID = :eDeleteID;
                -- If department is Management, assign employees EmployeeManager with that manager with new random manager
                
                UPDATE Job
                SET driver_ID = '00-0000000'
                WHERE driver_ID = :eDeleteID;
                -- If department is Driver, in Job set driver ID to '00-0000000'

                UPDATE Complaint
                SET HR_ID = '00-0000000'
                WHERE HR_ID = :eDeleteID;
                -- If department is HR, in Complaint, set HR_ID to '00-0000000'
                -- Delete each file from my life
            ";

            try {
                // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $pdo->prepare($sql);

                $stmt->execute([
                    'eID' => $eID,
                    'eDeleteID' => $eDeleteID,
                ]);
                echo ("<br>Successfully Deleted From DB");
            } catch (PDOException $e) {
                echo ("Error Deleting: " . $e->getMessage());
            }

            $sql = "DELETE FROM Employee WHERE employee_ID = :eDeleteID;
                -- Delete employee from Employee Table

                UPDATE DeleteLog
                SET Deleter = :eID
                WHERE Deleted = :eDeleteID and Delete_Time = NOW() and Delete_Date = CURDATE();
                -- Update DeleteLog to contain Deleter Name
            ";

            try {
                // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $pdo->prepare($sql);

                $stmt->execute([
                    // 'eID' => $eID,
                    'eDeleteID' => $eDeleteID,

                ]);
                echo ("<br>Successfully Deleted From DB");
            } catch (PDOException $e) {
                echo ("Error Deleting: " . $e->getMessage());
            }
        }
    }
    $conn = null;
}
?>