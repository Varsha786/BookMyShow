<?php
include_once "connection.php";
$showid= $_GET['q'];
$deleteQuery = "delete from showtimings where id ='$showid'";
echo $deleteQuery;
if (mysqli_query($conn, $deleteQuery)) {
    header("location:viewtimings.php");
} else {

    echo "deletion failed";
}

