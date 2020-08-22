<?php
if (isset($_GET["genrename"])) {
    $genrename = $_GET["genrename"];
    include_once "connection.php";
    $query = "select * from genre where genrename='$genrename'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
} else {
    header("location:viewgenre.php");
}
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
    <form id="formsignup" action="updategenre.php" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-9"><div class="form-group">
                    <label for="">Genrename</label>
                    <input type="text" name="genrename"
                           readonly value="<?php echo $row[0]; ?>" data-rule-required="true"
                           id="genrename" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <input type="text" name="description" value="<?php echo $row[1]; ?>"
                           data-rule-required="true"
                           id="description" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Photo</label>
                    <input type="file" name="photo" data-rule-required="true"
                           id="photo" class="form-control">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="viewgenre.php" class="btn btn-warning">Cancel</a>
                    <?php
                    if (isset($_GET["msg"])) {
                        echo $_GET["msg"];
                    }
                    ?>
                </div></div>
            <div class="col-md-3">
                <img src="genre/<?php echo $row[2]; ?>" class="img-fluid img-thumbnail">
            </div>
        </div>
    </form>
</div>
</body>
    </html><?php
