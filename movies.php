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
    <h2 class="text-center">Add Movies</h2>
    <form action="addmovies.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for=""><b>Select genre</b></label>
            <select name="genrename" id="genrename" data-rule-required="true" class="form-control">
                <option value="">Select genre</option>
                <?php
                include_once "connection.php";
                $selectgenre="select * from genre";
                $resultgenre=mysqli_query($conn,$selectgenre);
                while ($rowgenre=mysqli_fetch_array($resultgenre)){
                ?>
                <option value="<?php echo $rowgenre[0]; ?>"><?php echo $rowgenre[0]; ?></option>
              <?php
                }?>
            </select>
        </div>
        <div class="form-group">
            <label for=""><b>Movie Name</b></label>
            <input type="text" name="moviename" id="moviename" data-rule-required="true" class="form-control">
        </div>
  <div class="form-group">
    <label for=""><b>Release Date</b></label>
    <input type="text" readonly name="releasedate" id="releasedate" data-rule-required="true" class="form-control">
</div>
        <div class="form-group">
            <label for=""><b>Director</b></label>
            <input type="text" name="director" id="director" data-rule-required="true" class="form-control">
        </div>
        <div class="form-group">
            <label for=""><b>Poster</b></label>
            <input type="file" name="photo" id="photo" data-rule-required="true" data-rule-extension="png|jpg|gif|jpeg|PNG|JPG|GIF|JPEG" class="form-control">
        </div>
        <div class="form-group">
            <label for=""><b>Synopsis</b></label>
            <textarea name="synopsis" id="synopsis" data-rule-required="true" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for=""><b>Trailer</b></label>
            <textarea name="trailer" id="trailer" data-rule-required="true" class="form-control"></textarea>
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
