<?php
//Connect to MySQL
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'reguser';

$con = mysqli_connect($host,$user,$password,$database);

//Checking a connection

if (mysqli_connect_errno()){
    echo 'Failed to connect: ' .mysqli_connect_error();
}

// define variables and set to empty values
$nameErr = $passErr1 = $passErr2 ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    }

    if (empty($_POST["pass1"])) {
        $passErr1 = "Password is required";
    }

    if (empty($_POST["pass2"])) {
        $passErr2 = "Confirm Password is required";
    }
}
?>

