<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>Display Data</title>
</head>

<body>

<div class="container">
    <div class=" mt-5 d-flex justify-content-end">
            <a class="btn btn-primary " href="login.php">LogOut </a>
        </div>
    </div>
    <div class="container col-10  col-lg-8 m-auto">

        <h1 class="text-center mt-3 mb-3"> All Register Student </h1>

        <table class="table table-bordered ">
            <thead>
                <tr class="text-center">
                    <th scope="col">#</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email Address</th>
                    <th scope="col">Password</th>
                    <th scope="col">StudView</th>
                    <th scope="col">StudEdit</th>
                    <th scope="col">StudDelete</th>
                </tr>
            </thead>
            <tbody>
       

                <?php

                $serverName = 'localhost';
                $userName = 'root';
                $password = '';
                $dbName = 'fci';
    
                $con = new mysqli($serverName, $userName, $password, $dbName);
                if ($con->connect_errno) {
                    die("vaild");
                }
                $resulte = $con->query("select * from student");

                
                $data = $resulte->fetch_all(MYSQLI_ASSOC);
// echo "<pre>";
// print_r( $data);
// echo "</pre>";

                foreach ($data as $keyPar =>  $eachRow) {
                    echo "<tr class='text-center'>";
                    foreach ($eachRow as $key => $value) {
                       
                           echo "<td>$value</td>";
                     
                    }
                    $id=$data[$keyPar]["id"];
                    echo "<td> <a href='view.php?id=$id' class='btn btn-info'>" . "View" . "</td>";
                    echo "<td> <a href='edit.php?id=$id' class='btn btn-danger'>" . "Edit" . "</td>";
                    echo "<td> <a href='delete.php?id=$id' class='btn btn-danger'>" . "Delete" . "</td>";

                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <div class=" b text-center mt-5">
        <a class="btn btn-primary" href="register.php">Back To Register </a>
    </div>

    </table>

</body>

</html>