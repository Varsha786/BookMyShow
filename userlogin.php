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
include_once "publicheader.php";
if (isset($_REQUEST['q'])) {
    $timeid = $_REQUEST['q'];
} else {
    $timeid = '';
}
?>
<body>
<div class="container">
    <form action="chkuserlogin.php" method="post">
        <input type="hidden" name="timeid" id="timeid" value="<?php echo $timeid ?>">
        <div class="form-group">
            <h2 class="text-center">User Login</h2>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" data-rule-required="true"
                   data-msg-required="Enter email id" class="form-control">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" data-rule-required="true"
                   data-msg-required="Enter password" class="form-control">
        </div>
        <button class="btn btn-primary" type="submit">Submit</button>

    </form>

</div>

</body>
</html>
