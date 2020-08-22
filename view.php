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
<?php include_once "adminheader.php"; ?>
<body>
<table class="table table-bordered">
    <thead>
    <tr>
        <th>Email</th>
        <th>Mobile</th>
        <th>Name</th>
        <th>Delete</th>
        <th>Edit</th>
    </tr>
    </thead>
<tbody>
<?php
include_once "connection.php";
$selectquery="select *from admin";
$result=mysqli_query($conn,$selectquery);
while($row=mysqli_fetch_array($result)){
    ?>
<tr>
    <td><?php echo $row['email']; ?></td>
    <td><?php echo $row['mobile']; ?></td>
    <td><?php echo $row['name']; ?></td>
    <td>
        <a onclick="return confirm('Are You sure to delete ?')"
           href="delete.php?email=<?php echo $row['email']; ?>">
            <i class="fa fa-trash-alt text-danger"></i></a>
    </td>

    <td>
        <a href="edit.php?email=<?php echo $row['email']; ?>">
            <i class="fa fa-edit text-warning"></i></a>
    </td>

    </tr><?php
}
?>
</tbody>
</table>


</body>
</html>
