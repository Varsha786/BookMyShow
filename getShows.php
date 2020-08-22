<?php
$movie = $_REQUEST['q'];
$type = $_REQUEST['type'];
$admin = $_REQUEST['admin'];
include_once "connection.php";
if ($admin == 'admin') {
    $selectquery = "SELECT * FROM `shows` INNER JOIN movies ON movies.id=shows.movieid WHERE shows.movieid='$movie' order by shows.showdate ASC";
} else {
    $selectquery = "SELECT * FROM `shows` INNER JOIN movies ON movies.id=shows.movieid WHERE shows.movieid='$movie' AND shows.showdate>=CURRENT_DATE order by shows.showdate ASC";
}
$result = mysqli_query($conn, $selectquery);
if (mysqli_num_rows($result) > 0) {
    if ($type == "") {
        ?>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Sr No</th>
                <th>Show Date</th>
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
                <td><?php echo date('d M,Y', strtotime($row['showdate'])); ?></td>

                <td>
                    <a onclick="return confirm('Are You sure to delete ?')"
                       href="deleteshows.php?q=<?php echo $row[0]; ?>">
                        <i class="fa fa-trash-alt text-danger"></i></a>
                </td>

                <td>
                    <a href="editshows.php?q=<?php echo $row[0]; ?>">
                        <i class="fa fa-edit text-warning"></i></a>
                </td>

                </tr><?php
            }
            ?>


            </tbody>
        </table>
        <?php
    } else {
        ?>
        <select name="showid" id="showid" data-rule-required="true"
                onchange="showTimings(this.value)"
                class="form-control">
            <option value="">Select Shows</option>
            <?php
            while ($shows_row = mysqli_fetch_array($result)) {
                ?>
                <option value="<?php echo $shows_row[0]; ?>">
                    <?php echo date('d M,Y', strtotime($shows_row['showdate'])); ?></option>
                <?php
            } ?>
        </select>
        <?php
    }
} else {
    echo "No Data Found";
}
