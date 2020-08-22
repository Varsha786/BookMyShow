<?php
include_once "connection.php";
$email = $_POST["email"];
$password = $_POST["password"];
$name = $_POST["name"];
$mobile = $_POST["mobile"];
$temppath = $_FILES["photo"]["tmp_name"];
$photo = $_FILES["photo"]["name"];
$actualname = "user/$photo";
$select = "select * from user where  email='$email'";
$result = mysqli_query($conn, $select);
if (mysqli_num_rows($result) > 0) {
    header("location:signup.php?msg=$email already exist");
} else {
    move_uploaded_file($temppath, $actualname);
    $insertQuery = "insert into user values('$email','$password','$name','$mobile','$photo')";
    if (mysqli_query($conn, $insertQuery)) {
        header("location:signup.php?msg=data saved");
    } else {
        header("location:signup.php?msg=insert failed");
    }
}