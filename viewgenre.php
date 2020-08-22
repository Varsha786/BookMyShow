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

<body>
<?php
include "adminheader.php";
?>
<table class="table table-bordered">
    <thead>
    <tr>
        <th>Genrename</th>
        <th>Description</th>
        <th>photo</th>
        <th>Delete</th>
        <th>Edit</th>
    </tr>
    </thead>
    <tbody>
    <?php
    include_once "connection.php";
    $selectquery="select *from genre";
    $result=mysqli_query($conn,$selectquery);
    while($row=mysqli_fetch_array($result)){
        ?>
        <tr>
        <td><?php echo $row['genrename']; ?></td>
        <td><?php echo $row['description']; ?></td>
        <td><img src="genre/<?php echo $row['photo']; ?>" width="100"></td>
        <td>
            <a onclick="return confirm('Are You sure to delete ?')"
               href="deletegenre.php?genrename=<?php echo $row['genrename']; ?>">
                <i class="fa fa-trash-alt text-danger"></i></a>
        </td>

        <td>
            <a href="editgenre.php?genrename=<?php echo $row['genrename']; ?>">
                <i class="fa fa-edit text-warning"></i></a>
        </td>

        </tr><?php
    }
    ?>
    </tbody>
</table>


</body>
</html>
<?php
