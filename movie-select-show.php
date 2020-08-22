<!DOCTYPE html>
<html>
<head>
    <?php
    include_once 'headerfiles.html';
    ?>
</head>
<body>
<?php
@session_start();
if (isset($_SESSION['user'])) {
    include "userheader.php";
} else {
    include "publicheader.php";
}
$movieid = $_REQUEST['q'];
if (isset($_REQUEST['show'])) {
    $show = $_REQUEST['show'];
}
$movie = "select * from movies where id='$movieid'";
$movie_result = mysqli_query($conn, $movie);
$movie_row = mysqli_fetch_array($movie_result);
?>
<!-- AddThis Smart Layers END -->
<?php
include "bookTickets.php";
?>
<div class="now-showing-list">
    <div class="col-md-4 movies-by-category movie-booking">
        <div class="movie-ticket-book">
            <div class="clearfix"></div>
            <img src="movies/<?php echo $movie_row['poster'] ?>" style="width: 300px;height: 400px;" alt=""/>
            <div class="bahubali-details">
                <h4>Movie Name:</h4>
                <p><?php echo $movie_row['moviename'] ?></p>
                <h4>Release Date:</h4>
                <p><?php echo date('M d,Y', strtotime($movie_row['releasedate'])) ?></p>
                <h4>Director:</h4>
                <p><?php echo $movie_row['director'] ?></p>
                <h4>Genre:</h4>
                <p><?php echo $movie_row['genrename'] ?></p><h4>Synopsis:</h4>
                <p><?php echo urldecode($movie_row['synopsis']) ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-8 movies-dates">
        <div class="row">
            <div class="col-md-12">
                <iframe src="<?php echo $movie_row['trailer'] ?>" class="img-fluid img-responsive "
                        style="width: 654px;height: 223px;"></iframe>
            </div>
        </div>
        <?php
        date_default_timezone_set("Asia/Kolkata");
        $allshow = "SELECT * FROM `shows` INNER JOIN movies
 ON movies.id=shows.movieid WHERE shows.movieid='$movieid' 
 AND shows.showdate>=CURRENT_DATE order by shows.showdate ASC";
        $allshow_result = mysqli_query($conn, $allshow);
        while ($allshow_row = mysqli_fetch_array($allshow_result)) {
            ?>
            <div class="movie-date-selection">
                <?php
                if($movie_row['releasedate']<date('Y-m-d')) {
                    ?>
                    <ul>
                        <li class="location">
                            <a href="#"><i class="fa fa-map-marker"></i>INOX: Location
                                (<?php echo date('M d,Y', strtotime($allshow_row[1])) ?>)</a>
                        </li>
                        <?php
                        $shows = "select * from showtimings where showid='$allshow_row[0]' 
ORDER BY showtimings.showtime ASC";
                        $shows_result = mysqli_query($conn, $shows);
                        while ($shows_row = mysqli_fetch_array($shows_result)) {
                            //echo date('H:i:s') . ' ' . $shows_row[3];
                            if ($allshow_row[1] == date('Y-m-d') && $shows_row[3] < date('H:i:s')) {
                                ?>
                                <li class="time text-secondary">
                                    <?php echo date('h:i A', strtotime($shows_row[3])) ?>
                                </li>
                                <?php
                            } else {
                                ?>
                                <li class="time">
                                    <a href="movie-payment.php?q=<?php echo $shows_row[0] ?>"><?php echo date('h:i A', strtotime($shows_row[3])) ?></a>
                                </li>
                                <?php
                            }
                        }
                        ?>
                    </ul>
                    <?php
                }
                ?>
            </div>
            <?php
        }
        ?>
    </div>
    <div class="clearfix"></div>
</div>
</div>
</body>
<?php
include_once 'footer.php';
?></body>
</html>