
<?php
if(isset($_POST["email"]))
{
    include_once "connection.php";
$email = $_POST["email"];
$password = $_POST["password"];
$mobile=$_POST["mobile"];
$name=$_POST["name"];
$select = "select * from admin where
 email='$email'";
$result = mysqli_query($conn, $select);
if (mysqli_num_rows($result) > 0) {
    header("location:admin.php?msg=$email already exit");
} else {
     $insertQuery = "insert into admin values('$email','$password','$mobile','$name')";
        if (mysqli_query($conn, $insertQuery)) {
            // Querystring
            header("location:admin.php?msg=data saved");
        } else {
//        echo "";
            header("location:admin.php?msg=insert failed");
        }}}
else {
    header("location:admin.php");
}
