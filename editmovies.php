<?php
    $movieid = $_GET['q'];
    include_once "connection.php";
    $query = "select * from movies where id='$movieid'";
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


<body>
<?php
include "adminheader.php";
?>
<div class="container">
    <form id="formsignup" action="updatemovies.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="movieid" id="movieid" value="<?php echo $row[0] ?>">
        <div class="row">
            <div class="col-md-9">
                <div class="form-group">
                    <label for="">Genre</label>
                    <select name="genrename" id="genrename" onchange="showMovies(this.value)" data-rule-required="true"
                            class="form-control">
                        <option value="">Select genre</option>
                        <?php
                        include_once "connection.php";
                        $selectgenre = "select * from genre";
                        $resultgenre = mysqli_query($conn, $selectgenre);
                        while ($rowgenre = mysqli_fetch_array($resultgenre)) {
                            ?>
                            <option <?php if ($rowgenre[0] == $row['genrename']) { ?>selected<?php } ?>
                                    value="<?php echo $rowgenre[0]; ?>"><?php echo $rowgenre[0]; ?></option>
                            <?php
                        } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Movie Name</label>
                    <input type="text" name="moviename" value="<?php echo $row['moviename']; ?>"
                           data-rule-required="true"
                           id="moviename" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Release Date</label>
                    <input type="text" name="releasedate" readonly value="<?php echo $row['releasedate']; ?>"
                           data-rule-required="true"
                           id="releasedate" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Director</label>
                    <input type="text" name="director" value="<?php echo $row['director']; ?>"
                           data-rule-required="true"
                           id="director" class="form-control">
                </div>

                <div class="form-group">
                    <label for="">Poster</label>
                    <input type="file" name="photo" data-rule-extension="png|jpg|gif|jpeg|PNG|JPG|GIF|JPEG"
                           id="photo" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Synopsis</label>
                    <textarea name="synopsis" data-rule-required="true"
                              id="synopsis" class="form-control"><?php echo urldecode($row['synopsis']); ?></textarea>
                </div>
                <div class="form-group">
                    <label for="">Trailer</label>
                    <textarea name="trailer" data-rule-required="true"
                              id="trailer" class="form-control"><?php echo $row['trailer']; ?></textarea>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="viewmovies.php" class="btn btn-warning">Cancel</a>
                    <?php
                    if (isset($_GET["msg"])) {
                        echo $_GET["msg"];
                    }
                    ?>
                </div>
            </div>
            <div class="col-md-3">
                <img src="movies/<?php echo $row['poster']; ?>" class="img-fluid img-thumbnail">
                <iframe src="<?php echo $row['trailer']; ?>" class="img-fluid img-thumbnail"></iframe>
            </div>
        </div>
    </form>
</div>
</body>
    </html><?php

