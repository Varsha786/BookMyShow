<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <?php
    include_once "headerfiles.html";
    ?>
   </head>
<style>
.error
{
color: red;
}
</style>

<body>
<?php
include "adminheader.php";
?>
<div class="container">
    <form id="formsignup" action="addgenre.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="genrename"><b>Genrename</b></label>
            <input type="text" name="genrename" id="genrename" data-rule-required="true"
                   data-msg-required="Enter name" class="form-control">
        </div>
        <div class="form-group">
            <label for="description"><b>Description</b></label>
            <textarea name="description" id="description" data-rule-required="true" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="photo"><b>Photo</b></label>
            <input type="file" class="form-control" name="photo" id="photo" data-rule-required="true" data-rule-extension="png|jpg|gif|jpeg|PNG|JPG|GIF|JPEG">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>

    </form>
    <?php
    if (isset($_GET["msg"])) {
        echo $_GET["msg"];
    }
    ?>
</div>

</body>
</html><?php
