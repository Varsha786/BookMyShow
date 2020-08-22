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
include_once "publicheader.php";
?>
<div class="container">
    <h1 class="text-center">Signup</h1>
    <form action="chksignup.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" data-rule-required="true" data-msg-required="Enter email id" class="form-control">
    </div>
        <div class="form-group">
              <label for="password">password </label>
            <input type="password" name="password" id="password" data-rule-required="true" data-msg-required="Enter password" class="form-control">
        </div>
        <div class="form-group">
            <label for="conpassword">Confirm password</label>
            <input type="password" name="conpassword" data-rule-required="true" id="conpassword" data-rule-equalto="#password" data-msg-equalto="password and conpassword must be same" class="form-control">
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" data-rule-required="true">
        </div>
        <div class="form-group">
            <label for="mobile">Mobile</label>
            <input type="text" name="mobile" id="mobile" data-rule-required="true" maxlength="10" minlength="10" class="form-control">
        </div>
        <input type="file" class="form-control" name="photo" id="photo" data-rule-required="true" data-rule-extension="png|jpg|gif|jpeg|PNG|JPG|GIF|JPEG">

        <button class="btn btn-primary" type="submit">Signup</button>
    </form>
</div>
</body>
</html>
