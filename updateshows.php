<?php

include_once "connection.php";
$showid = $_REQUEST['showid'];
$movieid = $_REQUEST['movieid'];
$showdate = $_POST["showdate"];
$sql = "UPDATE `shows` SET `showdate`='$showdate',`movieid`='$movieid' WHERE `id`='$showid'";
mysqli_query($conn, $sql);
echo $sql;

header("location:viewshows.php");

