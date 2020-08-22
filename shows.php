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
include_once "adminheader.php";
?>
<div class="container">
    <h2 class="text-center">Add Shows</h2>
    <form action="addshows.php" method="post">
        <div class="form-group">
            <label for=""><b>Select movies</b></label>
            <select name="movieid" id="movieid" data-rule-required="true" class="form-control">
                <option value="">Select movies</option>
                <?php
                $movies = "select * from movies order by id DESC";
                $movies_result = mysqli_query($conn, $movies);
                while ($movies_row = mysqli_fetch_array($movies_result)) {
                    /*$releasedate30 = date('Y-m-d', strtotime('+30 days', strtotime($movies_row['releasedate'])));
                    if ($releasedate30 > date('Y-m-d') && $movies_row['releasedate'] < date('Y-m-d')) {
                    */    ?>
                        <option value="<?php echo $movies_row[0]; ?>"><?php echo $movies_row['moviename']; ?></option>
                        <?php
                    //}
                } ?>
            </select>
        </div>

        <div class="form-group">
            <label for=""><b>Show Date</b></label>
            <input type="text" name="showdate" readonly id="showdate" data-rule-required="true" class="form-control">
        </div>


        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
    <?php
    if (isset($_GET["msg"])) {
        echo $_GET["msg"];
    }
    ?>
</div>
</body>
</html>
