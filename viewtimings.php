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
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center">View Timings</h2>
            <div class="form-group">
                <label for=""><b>Select movies</b></label>
                <select name="movieid" id="movieid" onchange="showShows(this.value,'dropdown')"
                        data-rule-required="true" class="form-control">
                    <option value="">Select movies</option>
                    <?php
                    include_once "connection.php";


                    $movies = "select * from movies order by id DESC";
                    $movies_result = mysqli_query($conn, $movies);
                    while ($movies_row = mysqli_fetch_array($movies_result)) {
                        ?>
                        <option value="<?php echo $movies_row[0]; ?>"><?php echo $movies_row['moviename']; ?></option>
                        <?php
                    } ?>
                </select>
            </div>
            <div class="form-group">
                <label for=""><b>Select Shows</b></label>
                <select name="showid" id="showid" data-rule-required="true" onchange="showTimings(this.value)"
                        class="form-control">
                    <option value="">Select Shows</option>
                </select>
            </div>

            <div class="row">
                <div id="output"></div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
