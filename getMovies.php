<?php
$genre = $_REQUEST['q'];
include_once "connection.php";
$selectquery = "select * from movies where genrename='$genre'";
$result = mysqli_query($conn, $selectquery);
if (mysqli_num_rows($result) > 0) {
    ?>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Sr No</th>
            <th>Movies Name</th>
            <th>Release Date</th>
            <th>Director</th>
            <th>Poster</th>
            <th>Synopsis</th>
            <th>Trailer</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $k = 0;
        while ($row = mysqli_fetch_array($result)) {
            ?>
            <tr>
            <td><?php echo $k++; ?>
            </td>
            <td><?php echo $row['moviename']; ?></td>
            <td><?php echo $row['releasedate']; ?></td>
            <td><?php echo $row['director']; ?></td>
            <td><img src="movies/<?php echo $row['poster']; ?>" width="150"></td>
            <td><?php echo urldecode($row['synopsis']); ?></td>
            <td><iframe src="<?php echo $row['trailer']; ?>" width="250"></iframe></td>
            <td>
                <a onclick="return confirm('Are You sure to delete ?')"
                   href="deletemovies.php?q=<?php echo $row[0]; ?>">
                    <i class="fa fa-trash-alt text-danger"></i></a>
            </td>

            <td>
                <a href="editmovies.php?q=<?php echo $row[0]; ?>">
                    <i class="fa fa-edit text-warning"></i></a>
            </td>

            </tr><?php
        }
        ?>


        </tbody>
    </table>
    <?php
} else {
    echo "No Data Found";
}