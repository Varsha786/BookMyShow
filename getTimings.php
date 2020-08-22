<?php
$showid = $_REQUEST['q'];
$type = $_REQUEST['type'];
include_once "connection.php";
$selectquery = "select * from showtimings where showid='$showid'";
$result = mysqli_query($conn, $selectquery);
if (mysqli_num_rows($result) > 0) {
    if ($type == "bookings") {
        while ($row = mysqli_fetch_array($result)) {
            ?>
            <table class="table table-bordered">
                <tr>
                    <th><h3 class="text-center"><?php echo date('h:i A', strtotime($row["showtime"])); ?></h3></th>
                </tr>
                <?php
                $sql = "SELECT * FROM booking INNER JOIN `showtimings` ON showtimings.id=booking.showtimeid INNER JOIN user ON user.email=booking.useremail WHERE booking.showtimeid='$row[0]'";
                $sql_result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($sql_result) > 0) {
                    ?>
                    <tr>
                        <th>Sr No.</th>
                        <th>Booked By</th>
                        <th>Mobile</th>
                        <th>Booked On</th>
                        <th>Seats</th>
                        <th>Price</th>
                        <th>Grand Total</th>
                    </tr>
                    <?php
                    $k = 0;
                    while ($sql_row = mysqli_fetch_array($sql_result)) {
                        $k++;
                        ?>
                        <tr>
                            <td><?php echo $k; ?></td>
                            <td><?php echo $sql_row['name']; ?> <img src="user/<?php echo $sql_row['photo'] ?>"
                                                                     width="100"></td>
                            <td><?php echo $sql_row['mobile']; ?></td>
                            <td><?php echo $sql_row['datetime']; ?></td>
                            <td><?php echo $sql_row['seats']; ?></td>
                            <td><?php echo $sql_row['price']; ?></td>
                            <td><?php echo $sql_row['grandtotal']; ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                    <?php
                } else {
                    ?>
                    <tr>
                        <td class="text-center">No data Found</td>
                    </tr>
                    <?php
                }
                ?>
            </table>
            <?php
        }
    } else {
        ?>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Sr No</th>
                <th>Show Time</th>
                <th>Price</th>
                <th>Audi</th>
                <th>Delete</th>
                <th>Edit</th>
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
                <!--            <td>--><?php //echo date('d M,Y', strtotime($row['showdate'])); ?><!--</td>-->
                <td><?php echo date('h:i A', strtotime($row["showtime"])); ?></td>

                <td>&#8377;<?php echo $row['price']; ?></td>
                <td><?php echo $row['audi']; ?></td>

                <td>
                    <a onclick="return confirm('Are You sure to delete ?')"
                       href="deletetimings.php?q=<?php echo $row[0]; ?>">
                        <i class="fa fa-trash-alt text-danger"></i></a>
                </td>

                <td>
                    <a href="edittimings.php?q=<?php echo $row[0]; ?>">
                        <i class="fa fa-edit text-warning"></i></a>
                </td>

                </tr><?php
            }
            ?>
            </tbody>
        </table>
        <?php
    }
} else {
    echo "No Data Found";
}
