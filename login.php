<?php

include("connect.php");

$login = 0;
$invalid = 0;

if (($_SERVER["REQUEST_METHOD"] == "POST")) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM `user_data` 
    WHERE `username` = '$username' AND `password`='$password'";

    $result = mysqli_query($conn, $sql);

    if ($result) {

        $num = mysqli_num_rows($result);
        // echo $num ;
        if ($num > 0) {
            // echo "Login successful";
            $login = 1;
            session_start();
            $_SESSION["username"] = $username ;
            header("location: home.php") ;
        } else {
            //    echo "Invalid Data";
            $invalid = 1;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
        crossorigin="anonymous">

    <!-- Font Awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>

    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow-lg" style="width: 100%; max-width: 400px;">
            <?php
            if ($invalid) {
                echo
                '<div class="alert alert-danger" role="alert">
                Invalid Username or Password
                </div>';
            }
            ?>
            <?php
            if ($login) {
                echo
                '<div class="alert alert-success" role="alert">
                Successful Login successful
                </div>';
            }
            ?>
            <!-- card-head -->
            <div class="card-header text-center">
                <h3>Login</h3>
            </div>
            <!-- card-body -->
            <div class="card-body">
                <form method="post" action="">
                <!-- Username field -->
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user"></i></span>
                    <input type="text" class="form-control"
                        name="username" autocomplete="off"
                        placeholder="Enter your username" required="required">
                </div>
                <!-- Password field -->
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
                    <input type="password" class="form-control"
                        name="password" autocomplete="off"
                        placeholder="Enter your password" required="required">
                </div>

                <!-- Login button -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary" name="login">Login</button>
                </div>
                </form>

            </div>
            <!-- card-footer -->
            <div class="card-footer text-center">
                Don't have an account? <a href="sign_up.php" class="text-decoration-none">Sign Up</a>
            </div>
        </div>
    </div>

</body>

</html>