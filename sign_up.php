<?php

include("connect.php");

$success = 0;
$user = 0;



if (($_SERVER["REQUEST_METHOD"] == "POST")) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // $sql = "INSERT INTO `user_data`(`username`, `password`)
    // VALUES ('$username', '$password')";

    // $result = mysqli_query($conn, $sql);

    // if ($result) {
    //     echo "Data inserted successfully";
    // } else {
    //     die(mysqli_error($conn));
    // }

    $sql = "SELECT * FROM `user_data` 
    WHERE username = '$username' ";

    $result = mysqli_query($conn, $sql);

    if ($result) {

        $num = mysqli_num_rows($result);
        // echo $num ;
        if ($num > 0) {
            // echo "User Already Exist";
            $user = 1;
        } else {
            $sql = "INSERT INTO `user_data`(`username`, `password`)
            VALUES ('$username', '$password')";

            $result = mysqli_query($conn, $sql);

            if ($result) {
                // echo "Sign Up successful";
                $success = 1;
            } else {
                die(mysqli_error($conn));
            }
        }
    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
        crossorigin="anonymous">

    <!-- Font Awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Custom stylesheet -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow-lg" style="width: 100%; max-width: 400px;">
            <?php
            if ($user) {
                echo
                '<div class="alert alert-danger" role="alert">
                User Already Exist;
                </div>';
            }
            ?>
            <?php
            if ($success) {
                echo
                '<div class="alert alert-success" role="alert">
                Successful Signed Up;
                </div>';
            }
            ?>

            <!-- card-head -->
            <div class="card-header text-center">
                <h3>Sign Up</h3>
            </div>
            <!-- card-body -->
            <div class="card-body">
                <!-- Username field -->
                <form method="post" action="sign_up.php">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user"></i></span>
                    <input type="text" class="form-control"
                        name="username" autocomplete="off"
                        placeholder="Enter your username" required="required"
                        aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <!-- Password field -->
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
                    <input type="password" class="form-control"
                        name="password" autocomplete="off"
                        placeholder="Enter your password" required="required"
                        aria-label="Password" aria-describedby="basic-addon1">
                </div>
                <!-- Confirm Password field -->
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                    <input type="password" class="form-control"
                        name="confirm_password" autocomplete="off"
                        placeholder="Confirm password" required="required"
                        aria-label="Confirm Password" aria-describedby="basic-addon1">
                </div>
                <!-- Signup button -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary" name="register">Sign Up</button>
                </div>
            </div>
            </form>

            <!-- card-footer -->
            <div class="card-footer text-center">
                Already have an account? <a href="login.php" class="text-decoration-none" name="login">Login</a>
            </div>
        </div>
    </div>

</body>

</html>