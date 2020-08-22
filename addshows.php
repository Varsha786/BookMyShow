<?php
include_once "connection.php";
$movieid = $_POST["movieid"];
$showdate = $_POST["showdate"];
$select = "SELECT * FROM `shows` WHERE `showdate`='$showdate' and `movieid`='$movieid'";
$result = mysqli_query($conn, $select);
if (mysqli_num_rows($result) > 0) {
    header("location:shows.php?msg=$moviename already exist");
} else {

    $insertquery = "insert into shows values
 (null,'$showdate','$movieid')";
    echo $insertquery;

    if (mysqli_query($conn, $insertquery)) {
       header("location:shows.php?msg=data saved");
    } else {
       header("location:shows.php?msg=insert failed");

    }
}
