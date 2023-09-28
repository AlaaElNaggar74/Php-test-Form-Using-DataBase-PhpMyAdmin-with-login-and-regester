


<?php

$serverName = 'localhost';
$userName = 'root';
$password = '';
$dbName = 'fci';


// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

$fnameDb = isset($_POST["fname"]) ? $_POST["fname"] : "";
$lnameDb = isset($_POST["lname"]) ? $_POST["lname"] : "";
$emailDb = isset($_POST["email"]) ? $_POST["email"] : "";
$passwordDb = isset($_POST["password"]) ? $_POST["password"] : "";
$id = isset($_POST["id"]) ? $_POST["id"] : "";



$con = new mysqli($serverName, $userName, $password, $dbName);


if (isset($_POST["add"])) {

    $data = $con->query("select * from student");
$res=$data->fetch_all(MYSQLI_ASSOC);

echo "dddddddddddddddddddd <br>";

echo "<pre>";
print_r($res);
echo "</pre>";
echo count($res);

    if (count($res)  == 0) {
        $con->query(" ALTER TABLE student AUTO_INCREMENT = 1;");
        $con->query("insert into student (fname,lname,email,password) values('$fnameDb','$lnameDb','$emailDb','$passwordDb')");
        header("location:display.php");

    } 

    else {
        echo "<br>";
        $bool = 0;
        foreach ($res as $keyPar => $eachRow) {
                      foreach ($eachRow as $key => $value) {
                if ($emailDb == $value) {
                    $bool = 1;
                    echo "emailDB ".$emailDb ."<br>";
                    echo "value ".$value ."<br>";
                    echo "bool ".$bool ."<br>";
                }
            }
        }
        if (!$bool) {

            $con->query("insert into student (fname,lname,email,password) values('$fnameDb','$lnameDb','$emailDb','$passwordDb')");
            header("location:welcome.php");

        }else{
            header("location:errorPage.php");

        }
    }

    // $con->query("insert into student (fname,lname,email,password) values('$fnameDb','$lnameDb','$emailDb','$passwordDb')");
    // header("location:display.php");

} elseif (isset($_POST["update"])) {
    $con->query("UPDATE student SET fname = '$fnameDb', lname= '$lnameDb', email= '$emailDb', password= '$passwordDb' WHERE id='$id' ");

    header("location:display.php");
}
//  elseif (isset($_POST["login"])) {

//     $resulte = $con->query("select * from student");
//     $data = $resulte->fetch_all(MYSQLI_ASSOC);

//     echo "<pre>";
// print_r($data);
// echo "</pre>";

// echo "***************************************<br>";
// //     echo "<pre>";
// // print_r($_POST);
// // echo "</pre>";

// }






?>

