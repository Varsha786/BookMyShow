<?php
include_once "connection.php";
$genrename = $_GET['genrename'];
$deleteQuery = "delete from genre where genrename ='$genrename'";
echo $deleteQuery;
if (mysqli_query($conn, $deleteQuery)) {
    header("location:viewgenre.php");
} else {
    echo "deletion failed";
}

