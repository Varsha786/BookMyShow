<?php
include_once "adminheader.php";
$email=$_POST["email"];
$oldpassword=$_POST["oldpassword"];
$newpassword=$_POST["newpassword"];
$select="select * from admin where email='$email'and password='$oldpassword'";
$result=mysqli_query($conn,$select);
if(mysqli_num_rows($result)>0){
$update="update admin set password='$newpassword' where email='$email'";
if(mysqli_query($conn,$update)){
echo"password updated";
}else{
echo"invalid old password";
}
}
?>
