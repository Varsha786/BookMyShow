<?php
include_once "connection.php";
$movieid= $_GET['q'];
$deleteQuery = "delete from shows where id ='$movieid'";
echo $deleteQuery;
if (mysqli_query($conn, $deleteQuery)) {
    header("location:viewshows.php");
} else {

    echo "deletion failed";
}

