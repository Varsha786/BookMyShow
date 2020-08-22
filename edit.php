<?php
if (isset($_GET["email"])) {
    $email=$_GET["email"];
    include_once "connection.php";
    $query="select * from admin where email='$email'";
    $result=mysqli_query($conn,$query);
    $row=mysqli_fetch_array($result);
} else {
    header("location:view.php");
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
<script>
    $(document).ready(function () {
        $("#formsignup").validate();
    })
</script>
<?php include_once "adminheader.php"; ?>
<body>

<div class="container">
    <form id="formsignup"  action="update.php" method="post">
        <div class="form-group">
            <label for="">Email</label>
            <input type="text" name="email"
                   readonly value="<?php echo $row[0];?>"
                   data-rule-required="true" id="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Mobile</label>
            <input type="text" name="mobile" value="<?php echo $row[2];?>"
                   data-rule-required="true" minlength="10" maxlength="10" id="mobile" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name" value="<?php echo $row[3];?>"
                   data-rule-required="true" id="name" class="form-control">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="view.php" class="btn btn-warning">Cancel</a>
            <?php
            if (isset($_GET["msg"])) {
                echo $_GET["msg"];
            }
            ?>
        </div>
    </form>
</div>
</body>
</html>