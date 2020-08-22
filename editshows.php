<?php
$movieid = $_GET['q'];
include_once "connection.php";
$query = "select * from shows where id='$movieid'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);

?>
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
<script>

</script>
<body>
<?php
include_once "adminheader.php";
?>
<div class="container">
    <h2 class="text-center">Edit Shows</h2>
    <form action="updateshows.php" method="post">
        <input type="hidden" name="showid" value="<?php echo $row[0] ?>">
    <div class="form-group">
        <label for=""><b>Movies</b></label>
        <select name="movieid" id="movieid" onchange="showShows(this.value)"  data-rule-required="true" class="form-control">
            <option value="">Select movies</option>
            <?php
            include_once "connection.php";
            $movies = "select * from movies order by id DESC";
            $movies_result = mysqli_query($conn, $movies);
            while ($movies_row = mysqli_fetch_array($movies_result)) {
                $releasedate30 = date('Y-m-d', strtotime('+30 days', strtotime($movies_row['releasedate'])));
                if ($releasedate30 > date('Y-m-d') && $movies_row['releasedate'] < date('Y-m-d')) {
                    ?>
                    <option <?php if ($movies_row[0] == $row['movieid']) { ?>selected<?php } ?>
                            value="<?php echo $movies_row['moviename']; ?>"><?php echo $movies_row['moviename']; ?></option>
                    <?php
                }
            } ?>
        </select>
        <div class="form-group">
            <label for="">Show Date</label>
            <input type="text" name="showdate" readonly value="<?php echo $row['showdate']; ?>"
                   data-rule-required="true"
                   id="showdate" class="form-control">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="viewshows.php" class="btn btn-warning">Cancel</a>
            <?php
            if (isset($_GET["msg"])) {
                echo $_GET["msg"];
            }
            ?>
        </div>
    </div>
</body>
</html>
