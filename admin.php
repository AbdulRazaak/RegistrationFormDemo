<?php include 'database.php'; ?>
<?php
$query = "SELECT * FROM user ORDER BY id";
$results = mysqli_query($con,$query);

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <header>
        <h1>Admin Panel</h1>
    </header>
    <table class="table table-hover">
        <tr>
            <th width="36%">User Name</th>
            <th width="50%">Password</th>
            <th width="50%">Edit/Remove</th>
        </tr>
<?php //Retrieve Data From the user table ?>
<?php while ($RetrieveInfo = mysqli_fetch_array($results)): ?>
        <tr>
            <td><?php echo $RetrieveInfo["name"]; ?></td>
            <td><?php echo $RetrieveInfo["password"]; ?></td>
            <td>
                [<a class="text-danger" href="remove.php?id=<?php echo $RetrieveInfo["id"];?>">Remove</a>]
                [<a href="update.php?id=<?php echo $RetrieveInfo["id"];?>">Edit</a>]
            </td>
        </tr>
<?php endwhile; ?>
    </table>
    <div class="col-sm-offset-0 col-sm-10">
        <a href="adduser.php" class="btn btn-success">Add New User</a>
        <a class='btn btn-danger' href='index.php'>LogOut</a>
    </div>
    <footer>
    </footer>
</div>
