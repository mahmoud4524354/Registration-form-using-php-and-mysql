<?php

$hostname = "localhost" ;
$username = "root" ;
$password = "";
$dbname = "registration";

$conn = mysqli_connect($hostname, $username, $password, $dbname);

if(!$conn){
    die(mysqli_connect_error($conn));
}














