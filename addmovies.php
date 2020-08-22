<?php
include_once "connection.php";
$genrename=$_POST["genrename"];
$moviename=$_POST["moviename"];
$releasedate=$_POST["releasedate"];
$director=$_POST["director"];
$synopsis=urlencode($_POST["synopsis"]);
$trailer=$_POST["trailer"];
$temppath = $_FILES["photo"]["tmp_name"];
$photo = $_FILES["photo"]["name"];
$actualname = "movies/$photo";
$select = "select * from movies where  moviename ='$moviename'";
$result = mysqli_query($conn, $select);
if (mysqli_num_rows($result) > 0) {
    header("location:movies.php?msg=$moviename already exist");
} else {
    move_uploaded_file($temppath, $actualname);

$insertquery="insert into movies values
 (null,'$moviename','$releasedate','$director','$photo','$genrename','$synopsis','$trailer')";
echo $insertquery;

    if (mysqli_query($conn, $insertquery)) {
        header("location:movies.php?msg=data saved");
    } else {
        header("location:movies.php?msg=insert failed");

}}