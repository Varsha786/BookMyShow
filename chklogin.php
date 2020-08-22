<?php
include_once "connection.php";
$email = $_POST["email"];
$password = $_POST["password"];
$select = "select * from admin where email='$email' and password='$password'";
$result = mysqli_query($conn, $select);
if (mysqli_num_rows($result) > 0) {
    session_start();
    $_SESSION['admin'] = $email;
    echo "Login success";
    header("Location:home.php");
} else {
    header("Location:adminlogin.php?msg=Invalid Credentials");
}
