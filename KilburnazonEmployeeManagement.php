<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Kilburnazon</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/jumbotron/">

    <!-- Bootstrap core CSS -->
    <link href="bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <!-- <link href="jumbotron.css" rel="stylesheet"> -->
</head>

<body>

    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">
            <h2>Kilburnazon</h2>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Dropdown</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div> -->
    </nav>

    <main role="main">

        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">
            <div class="container">
                <h1 class="display-3">Kilburnazon Employee Hub</h1><br>
                This hub allows users to alter Kilburnazon employee's details<br>
                Please select one of the options below

                <!-- <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p> -->
            </div>
        </div>

        <div class="container">
            <!-- Example row of columns -->
            <div class="row">
                <div class="col-md-4">
                    <h2>Add</h2>
                    <p>Add a new employee</p>
                    <p style="position: absolute; bottom: 0px;"><a class="btn btn-secondary"
                            href="./addEmployeeFiles/addEmployee.php" role="button">View
                            details &raquo;</a></p>
                </div>
                <div class="col-md-4">
                    <h2>Update</h2>
                    <p>Update Employee's Information</p>
                    <p style="position: absolute; bottom: 0px;"><a class="btn btn-secondary"
                            href="./updateEmployeeFiles/updateEmployee.php" role="button">View
                            details &raquo;</a></p>
                </div>
                <div class="col-md-4">
                    <h2>Delete</h2>
                    <p>Delete an employee</p>
                    <p style="position: absolute; bottom: 0px;"><a class="btn btn-secondary"
                            href="./deleteEmployeeFiles/deleteEmployee.php" role="button">View
                            details &raquo;</a></p>
                </div>
                <div class="col-md-4">
                    <h2>Filter</h2>
                    <p>Filter all employees using employee's information</p>
                    <p style="position: absolute; bottom: 0px;"><a class="btn btn-secondary"
                            href="./filterEmployeeFiles/filterEmployee.php" role="button">View
                            details &raquo;</a></p>
                </div>
                <div class="col-md-4">
                    <h2>Birthday</h2>
                    <p>Show all employees that have a birthday in the current month</p>
                    <p><a class="btn btn-secondary" href="./birthdayEmployeeFiles/birthdayEmployee.php"
                            role="button">View
                            details &raquo;</a></p>
                </div>
            </div>

            <hr>

        </div> <!-- /container -->

    </main>

    <!-- <footer class="container">
        <p>&copy; Company 2017-2018</p>
    </footer> -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
</body>

</html>

<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kilburnazon Employee Management</title>
    <link rel="stylesheet" type="text/css" href="../bootstrap.css">
</head>

<body>
    <h1>Kilburnazon Employee Manager</h1>
    <h2>Welcome, please choose one of the following options below:</h2><br>
    <a href="./addEmployeeFiles/addEmployee.php">
        <button id='addEmployeeButton' class='homePageButtons'>Add Employee</button>
    </a><br>
    <a href="./updateEmployeeFiles/updateEmployee.php">
        <button id='updateEmployeeButton' class='homePageButtons'>Update Employee Information</button>
    </a><br>
    <a href="./deleteEmployeeFiles/deleteEmployee.php">
        <button id='deleteEmployeeButton' class='homePageButtons'>Delete Employee</button>
    </a><br>
    <a href="./filterEmployeeFiles/filterEmployee.php">
        <button id='filterEmployeeButton' class='homePageButtons'>Filter Employee out by information</button>
    </a><br>
    <a href="./birthdayEmployeeFiles/birthdayEmployee.php">
        <button id='birthdayEmployeeButton' class='homePageButtons'>Get all Employees with birthdays this month</button>
    </a><br>

</body>

</html> -->