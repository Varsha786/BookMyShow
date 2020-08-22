<?php
if (isset($_POST["genrename"])) {
    include_once "connection.php";
    $movieid=$_REQUEST['movieid'];
    $genrename = $_POST["genrename"];
    $moviename = $_POST["moviename"];
    $releasedate = $_POST["releasedate"];
    $director = $_POST["director"];
    $synopsis = $_POST["synopsis"];
    $trailer = $_POST["trailer"];
    if (isset($_FILES["photo"]["name"]) && !empty($_FILES["photo"]["name"])) {
        $temppath = $_FILES["photo"]["tmp_name"];
        $photo = $_FILES["photo"]["name"];
        $actualname = "movies/$photo";
        move_uploaded_file($temppath, $actualname);
        $sql = "UPDATE `movies` SET `moviename`='$moviename',`releasedate`='$releasedate',`director`='$director',`poster`='$photo',`genrename`='$genrename',`synopsis`='$synopsis',`trailer`='$trailer' WHERE `id`='$movieid'";
    } else {
        $sql = "UPDATE `movies` SET `moviename`='$moviename',`releasedate`='$releasedate',`director`='$director',`genrename`='$genrename',`synopsis`='$synopsis',`trailer`='$trailer' WHERE `id`='$movieid'";}
    mysqli_query($conn, $sql);
    echo $sql;
}
header("location:viewmovies.php");
