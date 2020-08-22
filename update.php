<?php
if (isset($_POST["email"])) {
//error_reporting(1);
    include_once "connection.php";
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $name=$_POST["name"];
    $insertQuery = "update  admin set mobile='$mobile',name='$name'
where email='$email'";
    if (mysqli_query($conn, $insertQuery)) {
        header("location:edit.php?msg=data saved&email=$email");
    } else {
        header("location:edit.php?msg=insert failed");
    }
} else {
    header("location:view.php");
}