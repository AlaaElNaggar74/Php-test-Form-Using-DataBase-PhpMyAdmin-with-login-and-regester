<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>Document</title>
</head>

<body>
    <div class="container">
    <div class=" mt-5 d-flex justify-content-end">
            <a class="btn btn-primary " href="login.php">LogOut </a>
        </div>
        <h1 class='text-center mt-5 mb-5 text-success '>Welcome In View Page</h1>
        <div class="bo p-3 rounded-2 border-1 border border-black bg-info bg-opacity-50 py-5">


            <?php

            $serverName = 'localhost';
            $userName = 'root';
            $password = '';
            $dbName = 'fci';
            $id = $_GET["id"];

            $con = new mysqli($serverName, $userName, $password, $dbName);
            if ($con->connect_errno) {
                die("vaild");
            }
            $resulte = $con->query("select * from student where id='$id'");
            $data = $resulte->fetch_assoc();



            echo "<h3>First Name Is : <span class='text-danger'>  {$data["fname"]} </span></h3>";
            echo "<h3>Last Name Is : <span class='text-danger'> {$data["lname"]}  </span></h3>";
            echo "<h3>Email Address Is : <span class='text-danger'>{$data["email"]} </span></h3>";


            ?>
            <div class=" b text-center mt-5">
                <a class="btn btn-danger" href="register.php">Back To Home</a>
                <a class="btn btn-primary" href="display.php">Back To Tables</a>

            </div>
        </div>
    </div>
</body>

</html>