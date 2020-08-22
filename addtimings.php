<?php
include_once "connection.php";
$movieid = $_POST["movieid"];

$showid = $_POST["showid"];
$showtime = date('h:i:s', strtotime($_POST["showtime"]));
$audi = $_POST["audi"];
$price = $_POST['price'];
$select = "SELECT * FROM `showtimings` WHERE `showtime`='$showtime'and `showid`='$showid'";
$result = mysqli_query($conn, $select);
if (mysqli_num_rows($result) > 0) {
    header("location:showtimings.php");
} else {
    $insert = "INSERT INTO `showtimings`(`id`, `audi`, `price`, `showtime`, `showid`)
 VALUES (null ,'$audi','$price','$showtime','$showid')";
    echo $insert;

    if (mysqli_query($conn, $insert)) {
        header("location:showtimings.php?msg=data saved");
    } else {
        header("location:showtimings.php?msg=insert failed");

    }


}