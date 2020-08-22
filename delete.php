<?php
include_once "connection.php";
$email = $_GET['email'];
$deleteQuery = "delete from admin where email ='$email'";
echo $deleteQuery;
if (mysqli_query($conn, $deleteQuery)) {
    header("location:view.php");
} else {
    echo "deletion failed";
}

