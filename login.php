<?php

include("studentController.php");


$allError = isset($emaError) ? $allError : 0;
$emaError = isset($emaError) ? $emaError : 0;
$pasError = isset($pasError) ? $pasError : 0;

if (isset($_POST["login"])) {

    $resulte = $con->query("select * from student");
    $data = $resulte->fetch_all(MYSQLI_ASSOC);

    // echo "<pre>";
    //  print_r($data);
    // echo "</pre>";

    // echo "***************************************<br>";

    $ema = false;
    $pas = false;
    foreach ($data as $keyPar => $valuePar) {
        foreach ($valuePar as $key => $value) {
            if ($key == "email") {
                if ($value == $_POST["email"]) {
                    // echo "the value Is --  $value <br>";
                    // echo "the POST [email]  Is -- ".$_POST["email"]." <br>";
                    $ema = true;
                }
                # code...
            }
            if ($key == "password") {
                if ($value == $_POST["password"]) {
                    // echo "the value Is --  $value <br>";
                    // echo "the POST [email]  Is -- ".$_POST["email"]." <br>";
                    $pas = true;
                }

            }
        }

    }

    if ($ema) {
        $pasError = 1;
    }
    if ($pas) {
        $emaError = 1;
    }
    if ($ema && $pas) {
        if ( $_POST["email"] == "admin@gmail.com") {
            header("location:display.php");

        }else {
            header("location:register.php");
            
        }
    }
    if (!$ema && !$pas) {
        $allError = 1;
    }

  }


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>login</title>
</head>

<body>
    <div class="bo  min-vh-100 d-flex align-items-center">
        <div class="container  col-10 col-sm-8 col-md-6 col-lg-4 m-auto ">
            <div class="divForm p-3 rounded-3 border border-1 border-black ">
                <h1 class="text-center">3N</h1>
                <h3 class="text-center">Login</h3>
                <?php echo $allError ? "<p id='hid' class=' text-danger'>Your Data Not valid-feedback</p>" : "" ?>
                <form method="POST" action="login.php">

                    <div class="mb-1">
                        <label for="email" class="form-label fw-bold">Email Address </label>
                        <input type="email" name="email" value='<?= isset($_POST["email"]) ? $_POST["email"] : "" ?>' class="form-control" id="email" aria-describedby="fnameHelp" required>
                        <?php echo $emaError ? "<p id='emahid' class=' text-danger'>Your Email Not valid</p>" : "" ?>

                    </div>

                    <div class="mb-1">
                        <label for="exampleInputPassword1" class="form-label fw-bold">Password</label>
                        <input type="password" name="password" value='<?= isset($_POST["password"]) ? $_POST["password"] : "" ?>' class="form-control" id="exampleInputPassword1" required>
                        <?php echo $pasError ? "<p id='passhid' class=' text-danger'>Your Password Not valid</p>" : "" ?>

                    </div>
                    <div class="bt text-center mt-4">
                        <button type="submit" class="btn btn-primary" name="login">SingIN</button>
                    </div>
                    <p class="mt-3 text-center"> if you dont have account ? <a href="register.php">Register</a> </p>
                </form>
            </div>



        </div>
    </div>

    <script src="index.js"></script>

</body>

</html>