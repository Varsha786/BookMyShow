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
<?php
include_once "userheader.php";
?>
<body>

<div class="container">
    <h2>Change Password</h2>
    <form action="updateuserpassword.php" method="post">
        <div class="form-group">
            <label for="">Email</label>
            <input type="email" name="email"  readonly value="<?php echo $_SESSION["user"];?>" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Current Password</label>
            <input type="password" name="oldpassword" id="oldpassword" class="form-control">
        </div>
        <div class="form-group">
            <label for="">New Password</label>
            <input type="password" name="newpassword" id="newpassword" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Confirm New Password</label>
            <input type="password" name="connewpassword" id="connewpassword" class="form-control">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Update Password</button>
        </div>
    </form>

</div>
<?php
include_once "footer.php";
?>
</body>
</html>
<?php
