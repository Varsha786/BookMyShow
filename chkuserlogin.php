<?php
include_once "connection.php";
$email = $_POST["email"];
$password = $_POST["password"];
$timeid = $_REQUEST['timeid'];
$select = "select * from user where email='$email'and password='$password'";
$result = mysqli_query($conn, $select);
if (mysqli_num_rows($result) > 0) {
    session_start();
    $_SESSION['user'] = $email;
    echo "login success";
    if ($timeid == '') {
        header("location:userhome.php");
    } else {
        header("Location:movie-payment.php?q=" . $timeid);
    }
} else {
    if ($timeid == '') {
        header("location:userlogin.php?msg=Invalid data");
    } else {
        header("location:userlogin.php?msg=Invalid data&q=" . $timeid);
    }

}

