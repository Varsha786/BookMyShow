<?php
include_once "connection.php";
$movieid = $_GET['q'];
$deleteQuery = "delete from movies where id ='$movieid'";
echo $deleteQuery;
if (mysqli_query($conn, $deleteQuery)) {
    header("location:viewmovies.php");
} else {
    echo "deletion failed";
}
