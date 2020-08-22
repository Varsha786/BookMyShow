<?php
include "connection.php";
$gd = $_REQUEST['gd'];
$timeid = $_REQUEST['timeid'];
$seats = $_REQUEST['seats'];
$totalseats = $_REQUEST['totalseats'];
@session_start();
if (isset($_SESSION['user'])) {
    $email = $_SESSION['user'];
    $user = "select * from user where email='$email'";
    $user_result = mysqli_query($conn, $user);
    $user_row = mysqli_fetch_array($user_result);

}
$sql = "SELECT * FROM `showtimings` INNER JOIN shows ON shows.id=showtimings.showid LEFT OUTER JOIN movies ON movies.id=shows.movieid WHERE showtimings.id=" . $timeid;
$sql_result = mysqli_query($conn, $sql);
$sql_row = mysqli_fetch_array($sql_result);

$sqlq = "INSERT INTO `booking`(`id`, `showtimeid`, `seats`, `grandtotal`, `noofseats`, `useremail`) 
VALUES (null ,'$timeid','$seats','$gd','$totalseats','$email')";
mysqli_query($conn, $sqlq);
$bookingid = $conn->insert_id;

$msg = "Thank you for Booking with us, You made a Booking with us on " . date('d M,Y') . " , Dear " . $user_row['name'] . " You have Booked " . $sql_row['moviename'] . ". For the Show on " . date('l, d M,Y', strtotime($sql_row['showdate'])) . " at " . date('h:i A', strtotime($sql_row['showtime'])) . " Audi " . $sql_row['audi'] . " Price " . $sql_row['price'] . " No Of Tickets " . $totalseats . " Seats " . $seats . " Amount Payable " . $gd;

$ch = curl_init();
$mobile = $user_row['mobile'];

$message = urlencode($msg);
curl_setopt($ch, CURLOPT_URL, "http://server1.vmm.education/VMMCloudMessaging/AWS_SMS_Sender?");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,
    "username=PHP May 2019&password=UGD5AWRT&message=" . $message . "&phone_numbers=" . $mobile);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//print_r($ch);
$server_output = curl_exec($ch);
curl_close($ch);

header("Location:thanks.php?q=" . $bookingid);