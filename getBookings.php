<?php
$showid = $_REQUEST['q'];
include_once "connection.php";
//$select="";
$select = "SELECT * FROM `booking` INNER JOIN showtimings ON showtimings.id=booking.showtimeid LEFT OUTER JOIN shows ON shows.id=showtimings.showid WHERE shows.movieid=" . $movieid;
$result = mysqli_query($conn, $select);
if (mysqli_num_rows($result) > 0) {
    ?>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Sr No</th>
            <th>Seats</th>
            <th>Grand Total</th>
            <th>Booked By</th>
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
                <td><?php echo $row['seats']; ?></td>
                <td><?php echo $row['grandtotal']; ?></td>
                <td><?php echo $row['useremail']; ?></td>
                <td><?php echo date('h:i A', strtotime($row["datetime"])); ?></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
    <?php
} else {
    echo "No Data Found";
}
















