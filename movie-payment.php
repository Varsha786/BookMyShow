<!DOCTYPE html>
<html>
<head>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <?php
    include_once 'headerfiles.html';
    ?>
</head>
<body>
<!-- header-section-starts -->
<?php
@session_start();
if (isset($_SESSION['user'])) {
    include "userheader.php";
} else {
    include "publicheader.php";
    $email = '';
}
$timeid = $_REQUEST['q'];
$sql = "SELECT * FROM `showtimings` INNER JOIN shows ON shows.id=showtimings.showid LEFT OUTER JOIN movies ON movies.id=shows.movieid WHERE showtimings.id=" . $timeid;
$sql_result = mysqli_query($conn, $sql);
$sql_row = mysqli_fetch_array($sql_result);

$booked = "SELECT * FROM `booking` INNER JOIN showtimings ON showtimings.id=booking.showtimeid LEFT OUTER JOIN shows ON shows.id=showtimings.showid WHERE booking.`showtimeid`=" . $timeid;
//echo $booked;
$book_result = mysqli_query($conn, $booked);
$data = '';
while ($book_row = mysqli_fetch_array($book_result)) {
    $data .= $book_row['seats'] . ',';
}
print_r($data);
$arData = explode(',', $data);
function disablSeat($day)
{
    global $arData;
    $rt = "";
    foreach ($arData as $x) {
        if ($x == $day) {
            $rt = true;
        }
    }
    return $rt;
}


date_default_timezone_set("Asia/Kolkata");
include_once "bookTickets.php";
?>
<!-- AddThis Smart Layers END -->
<input type="hidden" name="price" id="price" value="<?php echo $sql_row['price'] ?>">
<input type="hidden" name="audi" id="audi" value="<?php echo $sql_row['audi'] ?>">


<div class="e-payment-section">
    <div class="col-md-8 payment-left">
        <?php
        include_once strtolower($sql_row['audi']) . '.php';
        ?>            </div>
    <div class="col-md-4">
        <div class="payment-right">
            <h3>Ticket Summary</h3>
            <h6><span>Movie-Name:</span><?php echo $sql_row['moviename'] ?></h6>
            <p><span>Audi:</span> <?php echo $sql_row['audi'] ?> </p>
            <p><span>Date:</span> <?php echo date('l d M,Y', strtotime($sql_row['showdate'])) ?></p>
            <p><span>Time:</span> <?php echo date('h:i A', strtotime($sql_row['showtime'])) ?></p>
            <p><span>Seat Info:</span><span id="seatnos"></span></p>
            <p><span>Qty:</span> <span id="ppl"></span></p>
            <h4><span>Total :</span>Rs.
                <small id="mprice"></small>
            </h4>
            <p>+ (Internet handling fees : Rs. 42.00 (incl. of Service Tax))</p>
            <h5>Grand Total :Rs.
                <small id="grandTotal"></small>
            </h5>
            <h5>
                <input type="button" class="btn btn-primary" value="Pay"
                       onclick="pay('<?php echo $email ?>',<?php echo $timeid ?>)">
            </h5>
        </div>
        <div class="ticket-note">
            <h3>Note:</h3>
            <ol>
                <li><p>Registrations/Tickets once booked cannot be exchanged, cancelled or refunded.</p></li>
                <li><p>In case of Credit/Debit Card bookings, the Credit/Debit Card and Card holder must be
                        present at the ticket counter while collecting the ticket(s).</p></li>
            </ol>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
</div>
<div class="clearfix"></div>
</div>
<?php
include "footer.php";
?></body>
</html>