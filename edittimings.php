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

$showid = $_GET['q'];
$query = "SELECT * FROM `showtimings` INNER JOIN shows 
ON shows.id=showtimings.showid where showtimings.id='$showid'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);


?>
<div class="container">
    <h2 class="text-center"> Shows Timings</h2>
    <form action="updatetimings.php" method="post">
        <input type="hidden" name="tid" value="<?php echo $row[0]  ?>">
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
                    <option <?php if ($movies_row[0] == $row['movieid']) { ?>selected<?php } ?>
                            value="<?php echo $movies_row[0]; ?>"><?php echo $movies_row['moviename']; ?></option>
                    <?php
                } ?>
            </select>
        </div>

        <div class="form-group">
            <label for=""><b>Select Shows</b></label>
            <select name="showid" id="showid" data-rule-required="true"
                    class="form-control">
                <option value="<?php echo $row['showid'] ?>"><?php echo date('d M,Y', strtotime($row['showdate'])); ?></option>
            </select>
        </div>

        <div class="form-group">
            <label for=""><b>Show Timings</b></label>
            <input type="time" name="showtime" value="<?php echo $row['showtime']; ?>" id="showtime"
                   data-rule-required="true" class="form-control">
        </div>
        <div class="form-group">
            <label for=""><b>Price</b></label>
            <input type="text" name="price" value="<?php echo $row['price']; ?>" id="price" data-rule-required="true"
                   class="form-control">
        </div>

        <div class="form-group">
            <label for=""><b>Audi</b></label>
            <select type="text" name="audi" id="audi" data-rule-required="true" class="form-control">
                <option value="">Select Audi</option>
                <option value="Audi1" <?php if ($row['audi'] == 'Audi1')  { ?>selected<?php } ?>>Audi 1</option>
                <option value="Audi2" <?php if ($row['audi'] == 'Audi2')  { ?>selected<?php } ?>>Audi 2</option>
                <option value="Audi3" <?php if ($row['audi'] == 'Audi3')  { ?>selected<?php } ?>>Audi 3</option>
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

