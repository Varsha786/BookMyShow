<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php
    include_once "headerfiles.html";
    ?>
</head>
<body>
<?php
include_once "userheader.php";
?>
<div class="container">
    <?php
    include_once "connection.php";
    $select = "SELECT * FROM `booking` INNER JOIN showtimings ON showtimings.id=booking.showtimeid LEFT OUTER JOIN shows ON shows.id=showtimings.showid LEFT OUTER JOIN movies ON movies.id=shows.movieid WHERE `booking`.`useremail`='$email'";
    //echo $select;
    $result = mysqli_query($conn, $select);
    if (mysqli_num_rows($result) > 0) {
        ?>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Sr No</th>
                    <th>Movie</th>
                    <th>Show Date</th>
                    <th>Show Time</th>
                    <th>Seats</th>
                    <th>Price</th>
                    <th>Grand Total</th>
                    <th>Booked On</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $k = 1;
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <td><?php echo $k++; ?>
                        </td>
                        <td><?php echo $row['moviename']; ?></td>
                        <td><?php echo $row['showdate']; ?></td>
                        <td><?php echo $row['showtime']; ?></td>
                        <td><?php echo $row['seats']; ?></td>
                        <td>&#8377; <?php echo $row['price']; ?></td>
                        <td>&#8377; <?php echo $row['grandtotal']; ?></td>
                        <td><?php echo date('d M,Y h:i A', strtotime($row["datetime"])); ?></td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>
        <?php
    } else {
        echo "No Data Found";
    }
    ?>
</div>
<?php
include "footer.php";
?>
</body>
</html>
