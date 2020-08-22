<?php
if (isset($_POST["genrename"])) {
//error_reporting(1);
    include_once "connection.php";
    $genrename = $_POST["genrename"];
    $description = $_POST["description"];
    if (isset($_FILES["photo"]["name"]) && !empty($_FILES["photo"]["name"])) {
        $temppath = $_FILES["photo"]["tmp_name"];
        $photo = $_FILES["photo"]["name"];
        $actualname = "genre/$photo";
        move_uploaded_file($temppath, $actualname);
        $sql = "UPDATE `genre` SET `description`='$description',`photo`='$photo' 
WHERE `genrename`='$genrename'";
    } else {
        $sql = "UPDATE `genre` SET `description`='$description' 
WHERE `genrename`='$genrename'";
    }
    mysqli_query($conn, $sql);
}
header("location:viewgenre.php");