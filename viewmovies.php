<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<?php
include_once "headerfiles.html";
?>
<body>
<?php
include "adminheader.php";
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for=""><b>Select genre</b></label>
                <select name="genrename" id="genrename" onchange="showMovies(this.value)" data-rule-required="true"
                        class="form-control">
                    <option value="">Select genre</option>
                    <?php
                    include_once "connection.php";
                    $selectgenre = "select * from genre";
                    $resultgenre = mysqli_query($conn, $selectgenre);
                    while ($rowgenre = mysqli_fetch_array($resultgenre)) {
                        ?>
                        <option value="<?php echo $rowgenre[0]; ?>"><?php echo $rowgenre[0]; ?></option>
                        <?php
                    } ?>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div id="output"></div>
    </div>
</div>
</body>
</html>


