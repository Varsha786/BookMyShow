<?php
include_once "connection.php";
$tid=$_REQUEST['tid'];
$showid = $_REQUEST['showid'];
$movieid = $_REQUEST['movieid'];
$price=$_REQUEST['price'];
$showtime=$_POST["showtime"];
$audi=$_POST['audi'];
$sql = "UPDATE `showtimings` SET `audi`='$audi',`price`='$price',`showtime`='$showtime',`showid`='$showid' WHERE `id`='$tid'";
mysqli_query($conn, $sql);
echo $sql;

header("location:viewtimings.php");

