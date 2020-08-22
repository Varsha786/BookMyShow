<?php
include_once "connection.php";
$genrename = $_POST["genrename"];
$description = $_POST["description"];
$temppath = $_FILES["photo"]["tmp_name"];
$photo = $_FILES["photo"]["name"];
$actualname = "genre/$photo";
$select = "select * from genre where  genrename='$genrename'";
$result = mysqli_query($conn, $select);
if (mysqli_num_rows($result) > 0) {
    header("location:genre.php?msg=$genrename already exist");
} else {
    move_uploaded_file($temppath, $actualname);
    $insertQuery = "insert into genre values('$genrename','$description','$photo')";
    if (mysqli_query($conn, $insertQuery)) {
    header("location:genre.php?msg=data saved");
} else {
    header("location:genre.php?msg=insert failed");
}
}