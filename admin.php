<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <?php
    include_once "headerfiles.html";
    ?>
   </head>
<script>
    $(document).ready(function () {
        $("#formsignup").validate();
    })
</script>
<style>
.error
{
color: red;
}
</style>
<?php include_once "adminheader.php"; ?>
<body>
<div class="container">
    <form id="formsignup" action="addAdmin.php" method="post">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" data-rule-required="true" data-rule-email="true"
                   data-msg-required="Enter email id" class="form-control">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" data-rule-required="true" id="password" class="form-control">
        </div>
        <div class="form-group">
            <label for="conpassword">Confirm Password</label>
            <input type="password" name="conpassword" data-rule-required="true" id="conpassword"
                   data-rule-equalTo="#password" data-msg-equalto="password&conpassword must be same"  class="form-control">
        </div>
        <div class="form-group">
            <label for="mobile">Moblie </label>
            <input type="text" name="mobile" id="mobile" data-rule-number="true" data-rule-required="true"
                   maxlength="10" minlength="10"  class="form-control">
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" data-rule-required class="form-control">
        </div>

        <button type="submit">Submit</button>

    </form>
</div>

</body>
</html><?php