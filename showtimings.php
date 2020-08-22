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
    <h2 class="text-center"> Shows Timings</h2>
    <form action="addtimings.php" method="post">
        <div class="form-group">
            <label for=""><b>Select movies</b></label>
            <select name="movieid" id="movieid" onchange="showShows(this.value,'dropdown')" data-rule-required="true"
                    class="form-control">
                <option value="">Select movies</option>
                <?php
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
            <select name="showid" id="showid" data-rule-required="true"
                    class="form-control">
                <option value="">Select Shows</option>
            </select>
        </div>

        <div class="form-group">
            <label for=""><b>Show Timings</b></label>
            <input type="time" name="showtime" id="showtime" data-rule-required="true" class="form-control">
        </div>
        <div class="form-group">
            <label for=""><b>Price</b></label>
            <input type="text" name="price" id="price" data-rule-required="true" class="form-control">
        </div>

        <div class="form-group">
            <label for=""><b>Audi</b></label>
            <select type="text" name="audi" id="audi" data-rule-required="true" class="form-control">
                <option value="">Select Audi</option>
                <option value="Audi1">Audi 1</option>
                <option value="Audi2">Audi 2</option>
                <option value="Audi3">Audi 3</option>
            </select>
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

