<?php
$conn=mysqli_connect("localhost","root",null, "okcredit");
if(!$conn){
    echo"connection failed due to".mysqli_connect_error();
}